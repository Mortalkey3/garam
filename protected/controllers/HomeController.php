<?php

class HomeController extends Controller
{

	public $page;
	public $subPage;
	public function actions()
	{
		return array(
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
		);
	}	

	public function actionDummy()
	{
		// Dummy::createDummyProduct();
		// echo '<META http-equiv="refresh" content="0;URL=http://localhost/dv-computers/home/dummy">';
		
		$data = Data::model()->findAll('1 LIMIT '.$_GET['page'].', 30');
		foreach ($data as $key => $value) {
			// 106-large_default.jpg
			$image_name = '';
			if ($value->image != 'http://ufoelektronika.com/img/p/0.jpg') {
				$url = $value->image;
				$url = substr($url, 0, -4).'-large_default.jpg';
				$image_name = Slug::create($value->id.'-'.$value->name).'.jpg';
				$img = Yii::getPathOfAlias('webroot').'/images/product/'.$image_name;
				@file_put_contents($img, file_get_contents($url));
			}

			$model = new PrdProduct;
			$model->kode = $value->reference;
			$model->image = $image_name;
			$model->harga = $value->base_price;
			$model->harga_coret = $value->base_price + ($value->base_price*20/100);
			$model->stock = $value->qty;
			$model->status = $value->status;
			$model->save(false);

			$modelDesc = new PrdProductDescription;
			$modelDesc->product_id = $model->id;
			$modelDesc->language_id = 2;
			$modelDesc->name = $value->name;
			$modelDesc->save(false);
		}
		echo '<a href="'.CHtml::normalizeUrl(array('dummy', 'page'=>$_GET['page']+30)).'">next</a>';

	}

	public function actionIndex()
	{
		$criteria=new CDbCriteria;

		// $criteria->with = array('description', 'category', 'categories');

		// $criteria->order = 'date DESC';

		$criteria->addCondition('status = "1"');
		$criteria->addCondition('description.language_id = :language_id');
		// $criteria->addCondition('categoryView.language_id = :language_id');
		// $criteria->addCondition('categoryTitle.language_id = :language_id');
		$criteria->params[':language_id'] = $this->languageID;

		$criteria->addCondition('categories.category_id = :category');
		$criteria->params['category'] = 1;

		// $pageSize = 12;

		// $product = new CActiveDataProvider('PrdProduct', array(
		// 	'criteria'=>$criteria,
		//     'pagination'=>array(
		//         'pageSize'=>$pageSize,
		//     ),
		// ));

		$model = new ContactForm2;
		$model->scenario = 'insert';

		$this->layout='//layouts/column1';
		$this->page = 'index';
		$this->render('index', array(
			'model'=>$model,
		));
	}

	public function actionCategory()
	{
		$this->layout='//layouts/column2';

		$this->render('category', array(
		));
	}

	public function actionProductDetail()
	{
		$this->pageTitle = 'Product Detail - '. $this->pageTitle;

		$this->render('product_detail', array(
		));
	}

	public function actionPCart()
	{
		$this->layout='//layouts/column3';

		$this->render('carts', array(
		));
	}

	public function actionPCart2()
	{
		$this->layout='//layouts/column3';

		$this->render('carts2', array(
		));
	}

	public function actionPsuccesscart()
	{
		$this->layout='//layouts/column3';

		$this->render('success_cart', array(
		));
	}

	public function actionCaraBelanja()
	{
		$this->layout='//layouts/column2';

		$this->render('cara_belanja', array(
		));
	}

	public function actionInfoPengiriman()
	{
		$this->layout='//layouts/column3';

		$this->render('info_pengiriman', array(
		));
	}

	public function actionSyarat()
	{
		$this->layout='//layouts/column2';

		$this->render('syarat_ketentuan', array(
		));
	}

	public function actionFaq()
	{
		$this->layout='//layouts/column3';

		$this->render('faq', array(
		));
	}

	public function actionPmyaccount()
	{
		$this->layout='//layouts/column3';

		$this->render('mydashboard', array(
		));
	}

	public function actionRequest()
	{
		$this->layout='//layouts/_blank';
		$model = new ContactForm2;
		$model->scenario = 'insert';

		if(isset($_POST['ContactForm2']))
		{
		  $model->attributes=$_POST['ContactForm2'];

		  if($model->validate())
		  {
			  $secret_key = "6LcipigUAAAAAGtfEZKdbKi4yMrf86w0hQvpbM98";
			$response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secret_key."&response=".$_POST['g-recaptcha-response']."&remoteip=".$_SERVER['REMOTE_ADDR']);
			$response = json_decode($response);
			if($response->success==false)
			{
				$model->addError('verifyCode', 'Pastikan anda sudah menyelesaikan captcha');
			}else{
				// config email
				$messaged = $this->renderPartial('//mail/contact2', array(
				'model'=>$model,
				),TRUE);
				$config = array(
				'to'=>array($model->email, $this->setting['email'], $this->setting['contact_email']),
				'subject'=>'['.Yii::app()->name.'] Contact from '.$model->email,
				'message'=>$messaged,
				);
				if ($this->setting['contact_cc']) {
				$config['cc'] = array($this->setting['contact_cc']);
				}
				if ($this->setting['contact_bcc']) {
				$config['bcc'] = array($this->setting['contact_bcc']);
				}
				print_r($config); exit;
				// kirim email
				Common::mail($config);

				Yii::app()->user->setFlash('success_mail','Thank you for contact us. We will respond to you as soon as possible.');
				$this->redirect(array('/home/products'));
			} 
		  }
		}
		else{
			$this->redirect(array('/home/index'));
		}
	}

	public function actionPcontact()
	{
		$model = new ContactForm;
		$model->scenario = 'insert';
		
		if(isset($_POST['ContactForm']))
		{
			if (!isset($_POST['g-recaptcha-response'])) {
				$this->redirect(array('home/career'));
	        }
	        

				$model->attributes=$_POST['ContactForm'];
				if($model->validate())
				{
			        $secret_key = "6Lc5ExQUAAAAAHgV4U_6krEDyf-ykhlx08mEgJek";
			        $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secret_key."&response=".$_POST['g-recaptcha-response']."&remoteip=".$_SERVER['REMOTE_ADDR']);
			        $response = json_decode($response);
			        if($response->success==false)
			        {
			          $model->addError('verifyCode','Pastikan anda sudah menyelesaikan captcha');
			        }else{
						// config email
						$messaged = $this->renderPartial('//mail/contact2',array(
							'model'=>$model,
						),TRUE);
						$config = array(
							'to'=>array($model->email, $this->setting['email'], $this->setting['contact_email']),
							'subject'=>'[UFO Elektronika] Contact from '.$model->email,
							'message'=>$messaged,
						);
						if ($this->setting['contact_cc']) {
							$config['cc'] = array($this->setting['contact_cc']);
						}
						if ($this->setting['contact_bcc']) {
							$config['bcc'] = array($this->setting['contact_bcc']);
						}
						// kirim email
						Common::mail($config);

						Yii::app()->user->setFlash('success','Trimakasih telah mengirimkan pesan kepada kami, kami akan segera membalas pesan anda');
						$this->refresh();
					}
				}


		}

		$this->layout='//layouts/column2';
		$this->pageTitle = 'Contact Us - '.$this->pageTitle;
		$this->render('pcontact', array(
			'model'	=>$model,
		));
	}

	public function actionPsaler()
	{
		
		$model = new ContactForm;
		$model->scenario = 'insert';
		
		if(isset($_POST['ContactForm']))
		{
			if (!isset($_POST['g-recaptcha-response'])) {
				$this->redirect(array('home/career'));
	        }
	        

				$model->attributes=$_POST['ContactForm'];
				if($model->validate())
				{
			        $secret_key = "6Lf3ti0UAAAAAJZqHmxoPxyLAPhkhh_uv8XuX7ip";
			        $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secret_key."&response=".$_POST['g-recaptcha-response']."&remoteip=".$_SERVER['REMOTE_ADDR']);
			        $response = json_decode($response);
			        // print_r($response);
			        // exit;
			        if($response->success==false)
			        {
			          $model->addError('verifyCode','Pastikan anda sudah menyelesaikan captcha');
			        }else{
						// config email
						$messaged = $this->renderPartial('//mail/saler',array(
							'model'=>$model,
						),TRUE);
						$config = array(
							'to'=>array($model->email, $this->setting['email'], $this->setting['contact_email']),
							'subject'=>'Hi, Ada pendaftaran wholesaler '.$model->email,
							'message'=>$messaged,
						);
						if ($this->setting['contact_cc']) {
							$config['cc'] = array($this->setting['contact_cc']);
						}
						if ($this->setting['contact_bcc']) {
							$config['bcc'] = array($this->setting['contact_bcc']);
						}
						// kirim email
						Common::mail($config);

						Yii::app()->user->setFlash('success','Trimakasih telah mengirimkan pesan kepada kami, kami akan segera membalas pesan anda');
						$this->refresh();
					}

				}

		}
		$this->layout='//layouts/column1';
		$this->render('psaler', array(
			'model'	=>$model,
		));
	}

	public function actionSugest()
	{

		if ($_POST['q'] != '') {
			$str = '<p id="searchresults">';
	            $criteria=New CDbCriteria ; 
	            $criteria->addCondition('(name LIKE :q OR tag LIKE :q)');
	            $criteria->params[':q'] = '%'.$_POST['q'].'%';
	            $criteria->addCondition('language_id = :language_id');
	            $criteria->params[':language_id'] = $this->languageID;

	            $criteria->order = 'date_input DESC';
	            $criteria->limit = 5;
	            $list = ViewProduct::model()->findAll($criteria);
	            
				$str .= '<span class="category">Search: '.$_POST['q'].'</span>';
	            foreach($list as $value)
	            {
					$str .= '<a href="'.CHtml::normalizeUrl(array('/product/detail', 'id'=>$value->id)).'">
						<span class="searchheading">'.$value->name.'</span>
					</a>';
				}
			// }
			$str .= '<span class="seperator"><a href="'.CHtml::normalizeUrl(array('/product/index', 'q'=>$_POST['q'])).'" title="Sitemap">See other result for '.$_POST['q'].' &gt;</a></span>
			<br class="break">
			</p>
			';
			echo $str;
		}
	}

	public function actionError()
	{
		$this->layout = '//layouts/error';
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else{

				$criteria=new CDbCriteria;
				$criteria->with = array('description', 'category', 'categories');
				$criteria->order = 'date DESC';
				$criteria->addCondition('status = "1"');
				$criteria->addCondition('terlaris = "1"');
				$criteria->addCondition('description.language_id = :language_id');
				$criteria->params[':language_id'] = $this->languageID;
				$pageSize = 12;
				$criteria->group = 't.id';
				$product = new CActiveDataProvider('PrdProduct', array(
					'criteria'=>$criteria,
				    'pagination'=>array(
				        'pageSize'=>$pageSize,
				    ),
				));


				$criteria = new CDbCriteria;
				$criteria->with = array('description');
				$criteria->addCondition('t.parent_id = :parent_id');
				$criteria->params[':parent_id'] = 0;
				$criteria->addCondition('t.type = :type');
				$criteria->params[':type'] = 'category';
				$criteria->limit = 3;
				$criteria->order = 'sort ASC';
				$categories = PrdCategory::model()->findAll($criteria);

				$this->layout='//layouts/column2';

				$this->pageTitle = 'Error '.$error['code'].': '. $error['message'] .' - '.$this->pageTitle;
				$this->render('error', array(
					'error'=>$error,
					'product'=>$product,
					'categories'=>$categories,
				));
			}
		}

	}

	public function actionAbout()
	{
		$this->pageTitle = 'About Us - '.$this->pageTitle;
		$this->page='about';
		$this->layout='//layouts/column2';

		$this->render('about', array(	
		));
	}

	public function actionCertificate()
	{
		$this->pageTitle = 'Certificates - '.$this->pageTitle;
		$this->page = 'certificate';
		$this->layout='//layouts/column2';

		$this->render('certificate', array(	
		));
	}

	public function actionLocation()
	{
		$this->pageTitle = 'Location - '.$this->pageTitle;
		$this->page='about';
		$this->subPage='location';
		$this->layout='//layouts/column2';

		$this->render('location', array(	
		));
	}

	public function actionIndustry()
	{
		$this->pageTitle = 'Industries - '.$this->pageTitle;
		
		$this->page='industry';
		$this->layout='//layouts/column2';

		$this->render('industry', array(
		));
	}

	public function actionIndustryDetail()
	{
		$this->pageTitle = 'Industries - '.$this->pageTitle;
		$this->layout='//layouts/column2';

		$idsn = $_GET['id'];

		$criteria = new CDbCriteria;
		$criteria->with = array('description');
		$criteria->addCondition('active = "1"');
		$criteria->addCondition('t.id = :ids');
		$criteria->addCondition('description.language_id = :language_id');
		$criteria->params[':language_id'] = $this->languageID;
		$criteria->params[':ids'] = $idsn;
		$dataIndustry = Gallery::model()->find($criteria);

		$this->render('industry_detail', array(
			'data' => $dataIndustry,
		));
	}

	public function actionEvent()
	{
		$this->pageTitle = 'Events - '.$this->pageTitle;
		$this->layout='//layouts/column2';

		$model = new ContactForm;
		$model->scenario = 'insert';

		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];

			if($model->validate())
			{
				// config email
				$messaged = $this->renderPartial('//mail/contact',array(
					'model'=>$model,
				),TRUE);
				$config = array(
					'to'=>array($model->email, $this->setting['email'], $this->setting['contact_email']),
					'subject'=>'[UFO Elektronika] Contact from '.$model->email,
					'message'=>$messaged,
				);
				if ($this->setting['contact_cc']) {
					$config['cc'] = array($this->setting['contact_cc']);
				}
				if ($this->setting['contact_bcc']) {
					$config['bcc'] = array($this->setting['contact_bcc']);
				}
				// kirim email
				Common::mail($config);

				Yii::app()->user->setFlash('success','Thank you for contact us. We will respond to you as soon as possible.');
				$this->refresh();
			}

		}

		$criteria = new CDbCriteria;
		$criteria->with = array('description');
		$criteria->addCondition('active = "1"');
		$criteria->addCondition('description.language_id = :language_id');
		$criteria->params[':language_id'] = $this->languageID;
		$criteria->order = 'date_input DESC';
		$gallery = new CActiveDataProvider('Gallery', array(
			'criteria'=>$criteria,
		    'pagination'=>array(
		        'pageSize'=>6,
		    ),
		));

		$this->render('event', array(
			'model'=>$model,
			'gallery'=>$gallery,
		));
	}

	public function actionEventdetail($id)
	{
		$this->pageTitle = 'Events - '.$this->pageTitle;
		$this->layout='//layouts/column2';

		$criteria = new CDbCriteria;
		$criteria->with = array('description');
		$criteria->addCondition('active = "1"');
		$criteria->addCondition('description.language_id = :language_id');
		$criteria->params[':language_id'] = $this->languageID;
		$criteria->addCondition('t.id = :id');
		$criteria->params[':id'] = $id;
		$criteria->order = 'date_input DESC';
		$detail = Gallery::model()->find($criteria);

		$this->render('eventdetail', array(
			'detail'=>$detail,
		));
	}

	public function actionHowto()
	{
		$this->pageTitle = 'How To Order - '.$this->pageTitle;
		$this->layout='//layouts/column2';

		$this->render('howto', array(	
		));
	}

	public function actionBlogs()
	{
		$this->pageTitle = 'Berita & Artikel - '.$this->pageTitle;
		$this->layout='//layouts/column1';

		$this->render('blogs', array(	
		));
	}

	public function actionBlogDetail()
	{
		$this->pageTitle = 'Berita & Artikel - '.$this->pageTitle;
		$this->layout='//layouts/column1';

		$this->render('blog_detail', array(	
		));
	}

	public function actionProductlanding()
	{
		$this->pageTitle = 'Product - '. $this->pageTitle;

		$this->render('landing_product', array(	
		));
	}

	public function actionLabeling()
	{
		$this->pageTitle = 'Private Label - '. $this->pageTitle;
		$this->layout='//layouts/column2';

		$model = new ContactForm;
		$model->scenario = 'insert';

		if(isset($_POST['ContactForm']))
		{
			if (!isset($_POST['g-recaptcha-response'])) {
				$this->redirect(array('home/contact'));
	        }
	        
	        $secret_key = "6Lf3ti0UAAAAAJZqHmxoPxyLAPhkhh_uv8XuX7ip";
	        $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secret_key."&response=".$_POST['g-recaptcha-response']."&remoteip=".$_SERVER['REMOTE_ADDR']);
	        $response = json_decode($response);
	        if($response->success==false)
	        {
	          $this->redirect(array('home/contact'));
	        }else{
				$model->attributes=$_POST['ContactForm'];

				if($model->validate())
				{
					// config email
					$messaged = $this->renderPartial('//mail/contact',array(
						'model'=>$model,
						'order' => true,
					),TRUE);
					$config = array(
						'to'=>array($model->email, $this->setting['email'], $this->setting['contact_email']),
						'subject'=>'PT. Cheetham Garam Indonesia Order Private Label from '.$model->email,
						'message'=>$messaged,
					);
					if ($this->setting['contact_cc']) {
						$config['cc'] = array($this->setting['contact_cc']);
					}
					if ($this->setting['contact_bcc']) {
						$config['bcc'] = array($this->setting['contact_bcc']);
					}

					// kirim email
					Common::mail($config);

					Yii::app()->user->setFlash('success','Thank you for contact us. We will respond to you as soon as possible.');
					$this->refresh();
				}
			}
		}

		$this->render('labeling', array(
			'model' => $model,
		));
	}
	
	public function actionProducts()
	{
		$this->pageTitle = 'Products - '. $this->pageTitle;
		$this->page='products';
		$this->layout='//layouts/column2';

		// get products
		$criteria = new CDbCriteria;
		$criteria->with = array('description');
		$criteria->addCondition('t.type = :type');
		$criteria->params[':type'] = 'category';
		$criteria->order = 'sort DESC';
		if (isset($_GET['sub']) && $_GET['sub'] == 'industry') {
			$criteria->addCondition('t.id = :ids');
			$criteria->params[':ids'] = 4;
		}
		if (isset($_GET['sub']) && $_GET['sub'] == 'human_salt') {
			$criteria->addCondition('t.id = :ids');
			$criteria->params[':ids'] = 1;
		}
		$strCategory = PrdCategory::model()->findAll($criteria);

		$result = array();
		foreach ($strCategory as $key => $value) {
			$criteria2=new CDbCriteria;
			$criteria2->with = array('description', 'category', 'categories');
			$criteria2->order = 'date ASC';
			$criteria2->addCondition('status = "1"');
			$criteria2->addCondition('description.language_id = :language_id');
			$criteria2->params[':language_id'] = $this->languageID;
			$inArray = PrdProduct::getInArrayCategory($value->id);
			$criteria2->addInCondition('t.category_id', $inArray);

			$pageSize = 1000;
			$criteria2->select = "*";
			$criteria2->group = 't.id';
			$product = new CActiveDataProvider('PrdProduct', array(
				'criteria'=>$criteria2,
			    'pagination'=>array(
			        'pageSize'=>$pageSize,
			    ),
			));
			$result[$value->id] = $product->getData();
		}

		$this->render('product', array(
			'data' => $result,
		));
	}

	public function actionPromotion()
	{
		$this->pageTitle = 'Promotion - '. $this->pageTitle;

		$criteria = new CDbCriteria;
		$criteria->with = array('description');
		$criteria->addCondition('active = "1"');
		$criteria->addCondition('description.language_id = :language_id');
		$criteria->params[':language_id'] = $this->languageID;
		$criteria->order = 'date_input DESC';

		$dataFeatured = new CActiveDataProvider('Blog', array(
			'criteria'=>$criteria,
		    'pagination'=>array(
		        'pageSize'=>2,
		    ),
		));
		$arrayFeatured = array();
		foreach ($dataFeatured->getData() as $key => $value) {
			$arrayFeatured[] = $value->id;
		}
		$criteria->addNotInCondition('t.id', $arrayFeatured);
		$dataBlog = new CActiveDataProvider('Blog', array(
			'criteria'=>$criteria,
		    'pagination'=>array(
		        'pageSize'=>6,
		    ),
		));

		$this->render('promo', array(	
			'dataBlog'=>$dataBlog,
			'dataFeatured'=>$dataFeatured,
		));
	}

	public function actionPromotionDetail($id)
	{
		$this->pageTitle = 'Promotion Name - '. $this->pageTitle;

		$criteria = new CDbCriteria;
		$criteria->with = array('description');
		$criteria->addCondition('active = "1"');
		$criteria->addCondition('description.language_id = :language_id');
		$criteria->params[':language_id'] = $this->languageID;
		$criteria->addCondition('t.id = :id');
		$criteria->params[':id'] = $id;
		$criteria->order = 'date_input DESC';
		$dataBlog = Blog::model()->find($criteria);
		if($dataBlog===null)
			throw new CHttpException(404,'The requested page does not exist.');

		$criteria = new CDbCriteria;
		$criteria->order = 'RAND()';
		$criteria->addCondition('id != :id');
		$criteria->params[':id'] = $dataBlog->id;
		$dataBlogs = new CActiveDataProvider('Blog', array(
			'criteria'=>$criteria,
		    'pagination'=>array(
		        'pageSize'=>10,
		    ),
		));

		$this->pageTitle = $dataBlog->description->title . ' - Promotion - '.$this->pageTitle;

		$this->render('promo_detail', array(
			'dataBlog' => $dataBlog,
			'dataBlogs' => $dataBlogs,
		));
	}

	public function actionListInquiry()
	{
		$this->pageTitle = 'Daftar Inquiry - '. $this->pageTitle;
		$this->layout='//layouts/column1';

		$this->render('inquiry', array(	
		));
	}

	public function actionDetailInquiry()
	{
		$this->pageTitle = 'Daftar Inquiry - '. $this->pageTitle;
		$this->layout='//layouts/column1';

		$this->render('detail_inquiry', array(	
		));
	}

	public function actionJadiagen()
	{
		$this->pageTitle = 'Jadi Agen - '.$this->pageTitle;
		$this->layout='//layouts/column1';

		$model = new ContactForm;
		$model->scenario = 'insert';

		if(isset($_POST['ContactForm']))
		{
			// if (!isset($_POST['g-recaptcha-response'])) {
			// 	$this->redirect(array('/home/jadiagen'));
	  //       }
	        
	        $secret_key = "6LfaqgkUAAAAAEGhdM7GVk6o-jNbidJ9t3xgc0wn";
	        $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secret_key."&response=".$_POST['g-recaptcha-response']."&remoteip=".$_SERVER['REMOTE_ADDR']);
	        $response = json_decode($response);
	        if($response->success==false)
	        {
	          $model->addError('verifyCode', 'Silahkan verifikasi captcha yang tersedia');
	        }

			$model->attributes=$_POST['ContactForm'];
			if(!$model->hasErrors() AND $model->validate())
			{
				// config email
				$messaged = $this->renderPartial('//mail/contact',array(
					'model'=>$model,
				),TRUE);
				$config = array(
					'to'=>array($model->email, $this->setting['email']),
					'subject'=>'Hi, '.$model->email.' Ingin Jadi Agen',
					'message'=>$messaged,
				);
				if ($this->setting['contact_cc']) {
					$config['cc'] = array($this->setting['contact_cc']);
				}
				if ($this->setting['contact_bcc']) {
					$config['bcc'] = array($this->setting['contact_bcc']);
				}
				// kirim email
				Common::mail($config);

				Yii::app()->user->setFlash('success','Terima Kasih Atas Minat Anda Bergabung Bersama kami
Staff dari perabotplastik.com akan menghubungi anda untuk konfirmasi dan penjelasan berbagai langkah selanjutnya untuk secara resmi menjadi agen distribusi produk kami.
');
				$this->refresh();
			}


		}

		$this->render('jadi_agen', array(
			'model' => $model,
		));
	}

	public function actionKatalog()
	{
		$this->pageTitle = 'Katalog - '. $this->pageTitle;

		$this->layout='//layouts/column1';

		$dataPdf = Pdf::model()->findAll();

		$this->render('katalog', array(	
			'dataPdf'=>$dataPdf,
		));
	}

	public function actionLokasitoko()
	{
		$this->pageTitle = 'Lokasi Toko - '. $this->pageTitle;

		$this->layout='//layouts/column2';
		$criteria = new CDbCriteria;
		if ($_GET['kota'] != '') {
			$criteria->addCondition('kota = :kota');
			$criteria->params[':kota'] = $_GET['kota'];
		}
		$dataAddress2 = array();
		if ($_GET['kota'] != '') {
			$dataAddress = Address::model()->findAll($criteria);
			foreach ($dataAddress as $key => $value) {
				$dataAddress2[$value->kota][] = $value;
			}
		}

		$criteria = new CDbCriteria;
		$criteria->group = 'kota';
		$listKota = Address::model()->findAll($criteria);

		$this->render('lokasi_toko', array(	
			'dataAddress'=>$dataAddress2,
			'listKota'=>$listKota,
		));
	}

	public function actionCarabeli()
	{
		$this->pageTitle = 'Cara Membeli - '. $this->pageTitle;

		$this->layout='//layouts/column1';

		$this->render('cara_beli', array(	
		));
	}

	public function actionContactus()
	{
		$this->pageTitle = 'Contact - '.$this->pageTitle;
		$this->layout='//layouts/column2';
		
		$model = new ContactForm;
		$model->scenario = 'insert';

		if(isset($_POST['ContactForm']))
		{
			if (!isset($_POST['g-recaptcha-response'])) {
				$this->redirect(array('/home/contactus'));
	        }
	        
	        $secret_key = "6LfaqgkUAAAAAEGhdM7GVk6o-jNbidJ9t3xgc0wn";
	        $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secret_key."&response=".$_POST['g-recaptcha-response']."&remoteip=".$_SERVER['REMOTE_ADDR']);
	        $response = json_decode($response);
	        if($response->success==false)
	        {
	          $model->addError('verifyCode', 'Silahkan verifikasi captcha yang tersedia');
	        }

			$model->attributes=$_POST['ContactForm'];
			if(!$model->hasErrors() AND $model->validate())
			{
				// config email
				$messaged = $this->renderPartial('//mail/contact',array(
					'model'=>$model,
				),TRUE);
				$config = array(
					'to'=>array($model->email, $this->setting['email']),
					'subject'=>'Hi, Contact from '.$model->email,
					'message'=>$messaged,
				);
				if ($this->setting['contact_cc']) {
					$config['cc'] = array($this->setting['contact_cc']);
				}
				if ($this->setting['contact_bcc']) {
					$config['bcc'] = array($this->setting['contact_bcc']);
				}
				// kirim email
				Common::mail($config);

				Yii::app()->user->setFlash('success','Thank you for sending application career us. We will respond to you as soon as possible.');
				$this->refresh();
			}

		}

		$this->render('contact', array(	
			'model'=>$model,
		));
	}

	public function actionCareer()
	{
	    $this->pageTitle = 'Career - '.$this->pageTitle;
		$this->page = 'contact';
		$this->subPage = 'career';
		$this->layout='//layouts/column2';

		$model = new ContactForm;
		$model->scenario = 'career_form';

		if(isset($_POST['ContactForm']))
		{
			if (!isset($_POST['g-recaptcha-response'])) {
				$this->redirect(array('home/career'));
	        }
	        
	        $secret_key = "6Lf3ti0UAAAAAJZqHmxoPxyLAPhkhh_uv8XuX7ip";
	        $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secret_key."&response=".$_POST['g-recaptcha-response']."&remoteip=".$_SERVER['REMOTE_ADDR']);
	        $response = json_decode($response);
	        if($response->success==false)
	        {
	          $this->redirect(array('home/career'));
	        }else{
				$model->attributes=$_POST['ContactForm'];
				
				$files = CUploadedFile::getInstance($model,'files');
    			if ($files->name != '') {
    				$model->files = substr(md5(time()),0,5).'-'.$files->name;
    			}
    			
				if($model->validate())
				{
				    if ($files->name != '') {
						$files->saveAs(Yii::getPathOfAlias('webroot').'/uploads/doc/'.$model->files);
					}
					$nm_files = Yii::app()->request->hostInfo . Yii::app()->request->baseUrl .'/uploads/doc/'. $model->files;
					
					// config email
					$messaged = $this->renderPartial('//mail/contact_c',array(
						'model'=>$model,
						'attachment' => $nm_files,
					),TRUE);
					
					$config = array(
						'to'=>array('ririn.daswito@cheetham.co.id'),
						'subject'=>'Hi, Career from '.$model->email,
						'message'=>$messaged,
						'attachment' => array(),
					);
					if ($this->setting['contact_cc']) {
						$config['cc'] = array($this->setting['contact_cc']);
					}
					if ($this->setting['contact_bcc']) {
						$config['bcc'] = array($this->setting['contact_bcc']);
					}
					// kirim email
					Common::mail($config);

					Yii::app()->user->setFlash('success','Thank you for sending application career us. We will respond to you as soon as possible.');
					$this->refresh();
				}

			}

		}

		$this->render('career', array(
			'model'	=>$model,
		));
	}

	public function actionNews()
	{
		$this->pageTitle = 'News & Article - '.$this->pageTitle;
		$this->layout='//layouts/column2';

		$this->render('news', array(	
		));
	}

	public function actionNewsDetail()
	{
		$this->pageTitle = 'News & Article - '.$this->pageTitle;
		$this->layout='//layouts/column2';

		$this->render('news_detail', array(	
		));
	}

	public function actionTermsofuse()
	{
		$this->pageTitle = 'Terms of Use - '.$this->pageTitle;

		$this->render('termsofuse', array(	
		));
	}

	public function actionShippinginfo()
	{
		$this->render('shipinfo', array(	
		));
	}

	public function actionCartsuccess()
	{
		$this->render('cartsucess', array(	
		));
	}

	public function actionContact()
	{
		
		$this->page='contact';
		$this->subPage='contact';
		$this->layout='//layouts/column2';

		$this->pageTitle = 'Contact Us - '.$this->pageTitle;

		$model = new ContactForm;
		$model->scenario = 'insert';

		if(isset($_POST['ContactForm']))
		{
			if (!isset($_POST['g-recaptcha-response'])) {
				$this->redirect(array('home/contact'));
	        }
	        
	        $secret_key = "6Lf3ti0UAAAAAJZqHmxoPxyLAPhkhh_uv8XuX7ip";
	        $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secret_key."&response=".$_POST['g-recaptcha-response']."&remoteip=".$_SERVER['REMOTE_ADDR']);
	        $response = json_decode($response);
	        if($response->success==false)
	        {
	          $this->redirect(array('home/contact'));
	        }else{
				$model->attributes=$_POST['ContactForm'];

				if($model->validate())
				{
					// config email
					$messaged = $this->renderPartial('//mail/contact',array(
						'model'=>$model,
						'order' => false,
					),TRUE);
					$config = array(
						'to'=>array($model->email, 'ririn.daswito@cheetham.co.id'),
						'subject'=>'Hi, PT. Cheetham Garam Indonesia Contact from '.$model->email,
						'message'=>$messaged,
						'attachment' => array(),
					);
					if ($this->setting['contact_cc']) {
						$config['cc'] = array($this->setting['contact_cc']);
					}
					if ($this->setting['contact_bcc']) {
						$config['bcc'] = array($this->setting['contact_bcc']);
					}
					// kirim email
					Common::mail($config);

					Yii::app()->user->setFlash('success','Thank you for contact us. We will respond to you as soon as possible.');
					$this->refresh();
				}
			}
		}

		$this->render('contact', array(
			'model'=>$model,
		));
	}

	public function actionContact2()
	{
		$this->layout='//layouts/columnIframe';

		$this->pageTitle = 'Contact Us - '.$this->pageTitle;

		$model = new ContactForm;
		$model->scenario = 'insert';

		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];

			if($model->validate())
			{
				// config email
				$messaged = $this->renderPartial('//mail/contact2',array(
					'model'=>$model,
				),TRUE);
				$config = array(
					'to'=>array($model->email, $this->setting['email'], $this->setting['contact_email'], 'renndh2003@hotmail.com', 'dvcomputers.website@outlook.com'),
					'subject'=>'Hi, UFO Elektronika Contact from '.$model->email,
					'message'=>$messaged,
				);
				if ($this->setting['contact_cc']) {
					$config['cc'] = array($this->setting['contact_cc']);
				}
				if ($this->setting['contact_bcc']) {
					$config['bcc'] = array($this->setting['contact_bcc']);
				}
				// kirim email
				Common::mail($config);

				Yii::app()->user->setFlash('success','Thank you for contact us. We will respond to you as soon as possible.');
				$this->refresh();
			}

		}

		$this->render('contact2', array(
			'model'=>$model,
		));
	}
	public function actionContact3()
	{
		$this->layout='//layouts/columnIframe';

		$this->pageTitle = 'Report Bugs & Error - '.$this->pageTitle;

		$model = new ContactForm2;
		$model->scenario = 'insert';

		if(isset($_POST['ContactForm2']))
		{
			$model->attributes=$_POST['ContactForm2'];

			if($model->validate())
			{
				// config email
				$messaged = $this->renderPartial('//mail/contact3',array(
					'model'=>$model,
				),TRUE);
				$config = array(
					'to'=>array($model->email, $this->setting['email'], $this->setting['contact_email'], 'renndh2003@hotmail.com', 'dvcomputers.website@outlook.com'),
					'subject'=>'Report Bugs & Error from '.$model->email,
					'message'=>$messaged,
				);
				if ($this->setting['contact_cc']) {
					$config['cc'] = array($this->setting['contact_cc']);
				}
				if ($this->setting['contact_bcc']) {
					$config['bcc'] = array($this->setting['contact_bcc']);
				}
				// kirim email
				Common::mail($config);

				Yii::app()->user->setFlash('success','Thank you for contact us. We will respond to you as soon as possible.');
				$this->refresh();
			}

		}

		$this->render('contact3', array(
			'model'=>$model,
		));
	}

}

