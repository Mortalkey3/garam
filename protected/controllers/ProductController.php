<?php

class ProductController extends Controller
{

	public $product, $category;

	public function actionIndex()
	{
		$criteria2=new CDbCriteria;
		$criteria2->with = array('description', 'category', 'categories');
		$criteria2->order = 'date DESC';
		$criteria2->addCondition('status = "1"');
		$criteria2->addCondition('description.language_id = :language_id');
		$criteria2->params[':language_id'] = $this->languageID;
		if ($_GET['q'] != '') {
			$criteria2->addCondition('t.filter LIKE :q OR description.name LIKE :q OR description.desc LIKE :q');
			$criteria2->params[':q'] = '%'.$_GET['q'].'%';
		}

		if ($_GET['category']) {
			$criteria = new CDbCriteria;
			$criteria->with = array('description');
			$criteria->addCondition('t.id = :id');
			$criteria->params[':id'] = $_GET['category'];
			$criteria->addCondition('t.type = :type');
			$criteria->params[':type'] = 'category';
			// $criteria->limit = 3;
			$criteria->order = 'sort ASC';
			$strCategory = PrdCategory::model()->find($criteria);

			$inArray = PrdProduct::getInArrayCategory($_GET['category']);
			$criteria2->addInCondition('t.category_id', $inArray);

		}
		if ($strCategory !== null) {
			if ($strCategory->parent_id > 0) {
				$criteria = new CDbCriteria;
				$criteria->with = array('description');
				$criteria->addCondition('t.id = :id');
				$criteria->params[':id'] = $strCategory->parent_id;
				$criteria->addCondition('t.type = :type');
				$criteria->params[':type'] = 'category';
				// $criteria->limit = 3;
				$criteria->order = 'sort ASC';
				$strParentCategory = PrdCategory::model()->find($criteria);

				// Filter By Category
				// $criteria2->addCondition('t.category_id = :category_id');
				// $criteria2->params[':category_id'] = $_GET['category'];
			}else{
				// Filter By Parent
				// $criteria2->addCondition('category.parent_id = :parent_id');
				// $criteria2->params[':parent_id'] = $_GET['category'];
			}
		}

		$criteria3 = $criteria2;
		$criteria3->select = "t.id, t.brand_id";
		$criteria3->group = 't.id';
		$listProductId = PrdProduct::model()->findAll($criteria3);
		
		$idBrand = array();
		foreach ($listProductId as $key => $value) {
			array_push($idBrand, $value->brand_id);
		}
		$idBrand = array_unique($idBrand);
		$criteria4 = new CDbCriteria;
		$criteria4->with = array('description');
		$criteria4->addCondition('active = "1"');
		$criteria4->addCondition('description.language_id = :language_id');
		$criteria4->params[':language_id'] = $this->languageID;
		$criteria4->addInCondition('t.id', $idBrand);
		$dataBrand = Brand::model()->findAll($criteria4);

		$idProduct = array();
		foreach ($listProductId as $key => $value) {
			array_push($idProduct, $value->id);
		}
		$idProduct = array_unique($idProduct);
		$typeLabel = PrdCategory::typeList($idProduct, $this->languageID);

		// ------------------ FILTER --------------------------
		$get = $_GET;
		unset($get['order']);
		unset($get['category']);
		$no = 1;
		foreach ($get as $key => $val) {
			$sql = array();
			if (is_array($get[$key])) {
				foreach ($get[$key] as $value) {
					$sql[] = 't.filter LIKE :filter'.$no;
					$criteria2->params[':filter'.$no] = '%'.$key.'='.$value.'%';
					$no++;
				}
				$criteria2->addCondition(implode(' OR ', $sql));
			}
		}


		// ------------------ ORDER ---------------------------
		switch ($_GET['order']) {
			case 'low-hight':
				$criteria2->order = 't.harga ASC';
				break;

			case 'hight-low':
				$criteria2->order = 't.harga DESC';
				break;
			
			default:
				$criteria2->order = 't.harga ASC';
				break;
		}
		

		$pageSize = 12;
		$criteria2->select = "*";
		$criteria2->group = 't.id';
		$product = new CActiveDataProvider('PrdProduct', array(
			'criteria'=>$criteria2,
		    'pagination'=>array(
		        'pageSize'=>$pageSize,
		    ),
		));

		$this->layout='//layouts/column2';
		$this->pageTitle = $strCategory->description->name. (($strParentCategory != null) ? ' - '.$strParentCategory->description->name : '' ) .' - '.$this->pageTitle;
		$this->render('index', array(
			'product'=>$product,
			'strCategory'=>$strCategory,
			'strParentCategory'=>$strParentCategory,
			'dataBrand'=>$dataBrand,
			'typeLabel'=>$typeLabel,
		)); 
	}	

	public function actionLanding($category)
	{
		$criteria = new CDbCriteria;
		$criteria->with = array('description');
		$criteria->addCondition('t.id = :id');
		$criteria->params[':id'] = $category;
		$criteria->addCondition('t.type = :type');
		$criteria->params[':type'] = 'category';
		$criteria->addCondition('description.language_id = :language_id');
		$criteria->params[':language_id'] = $this->languageID;
		// $criteria->limit = 3;
		// $criteria->order = 'sort ASC';
		$strCategory = PrdCategory::model()->find($criteria);
		if($strCategory===null)
			throw new CHttpException(404,'The requested page does not exist.');

		$inArray = PrdProduct::getInArrayCategory($category);

		$criteria = new CDbCriteria;
		$criteria->with = array('description');
		$criteria->addCondition('t.parent_id = :parent_id');
		$criteria->params[':parent_id'] = $category;
		$criteria->addCondition('t.type = :type');
		$criteria->params[':type'] = 'category';
		$criteria->addCondition('description.language_id = :language_id');
		$criteria->params[':language_id'] = $this->languageID;
		// $criteria->limit = 3;
		$criteria->order = 'sort ASC';
		$subCategory = PrdCategory::model()->findAll($criteria);

		// filter product list
		$criteria=new CDbCriteria;
		$criteria->with = array('description', 'category', 'brand');
		$criteria->addCondition('status = "1"');
		$criteria->addCondition('description.language_id = :language_id');
		$criteria->params[':language_id'] = $this->languageID;
		$criteria->addInCondition('t.category_id', $inArray);
		// $criteria->addCondition('category.parent_id = :parent_id');
		// $criteria->params[':parent_id'] = $category;
		$pageSize = 16;
		$criteria->order = 'date DESC';
		$criteria->group = 't.id';
		$product = new CActiveDataProvider('PrdProduct', array(
			'criteria'=>$criteria,
		    'pagination'=>array(
		        'pageSize'=>$pageSize,
		    ),
		));

		// print_r($product->getData());
		// exit;

		$this->layout='//layouts/column2';
		$this->pageTitle = $strCategory->description->name .' - '.$this->pageTitle;
		$this->render('landing', array(
			'subCategory'=>$subCategory,
			'strCategory'=>$strCategory,
			'product'=>$product,
		)); 
	}	
	public function actionList()
	{
		$criteria=new CDbCriteria;

		$criteria->with = array('description', 'category', 'categories');

		// Mengatur Order
		if ($_GET['order'] == 'new-old') {
			$criteria->order = 'date DESC';
		} elseif($_GET['order'] == 'old-new') {
			$criteria->order = 'date ASC';
		} elseif($_GET['order'] == 'hight-low') {
			$criteria->order = 'harga DESC';
		} elseif($_GET['order'] == 'low-hight') {
			$criteria->order = 'harga ASC';
		} elseif($_GET['order'] == 'a-z') {
			$criteria->order = 'description.title ASC';
		} elseif($_GET['order'] == 'z-a') {
			$criteria->order = 'description.title DESC';
		} else {
			$criteria->order = 'date DESC';
		}
		

		$criteria->addCondition('status = "1"');
		$criteria->addCondition('terlaris = "1"');
		$criteria->addCondition('description.language_id = :language_id');
		// $criteria->addCondition('categoryView.language_id = :language_id');
		// $criteria->addCondition('categoryTitle.language_id = :language_id');
		$criteria->params[':language_id'] = $this->languageID;
	
		if ($_GET['category'] != '') {
			// $criteria2 = new CDbCriteria;
			// $criteria2->addCondition('t.parent_id = :parent_id');
			// $criteria2->params[':parent_id'] = $_GET['category'];
			// $dataCategory = PrdCategory::model()->findAll($criteria2);

			// $dataIdCat = array();
			// foreach ($dataCategory as $key => $value) {
			// 	$dataIdCat[] = $value->id;
			// }

			$criteria->addCondition('categories.category_id = :category');
			$criteria->params['category'] = $_GET['category'];
		}else{
			$category = null;
		}
		if ($_GET['subcat'] != '') {
			$criteria->addCondition('categories.category_id = :category');
			$criteria->params[':category'] = $_GET['subcat'];
		}
		// if ($_GET['special'] != '') {
		// 	$criteria->addCondition('t.terbaru = :terbaru');
		// 	$criteria->params[':terbaru'] = 1;
		// }
		if ($_GET['q'] != '') {
            $criteria->addCondition('(description.name LIKE :q OR t.tag LIKE :q)');
            $criteria->params[':q'] = '%'.$_GET['q'].'%';
		}

        $criteria->group = 't.id';
		if ($_GET['pagesize'] != '') {
			$pageSize = $_GET['pagesize'];
		} else {
			$pageSize = 12;
		}
		$product = new CActiveDataProvider('PrdProduct', array(
			'criteria'=>$criteria,
		    'pagination'=>array(
		        'pageSize'=>$pageSize,
		    ),
		));

		$this->product = $product;
		$this->category = $category;

		$criteria = new CDbCriteria;
		$criteria->with = array('description');
		$criteria->addCondition('t.parent_id = :parent_id');
		$criteria->params[':parent_id'] = 0;
		$criteria->addCondition('t.type = :type');
		$criteria->params[':type'] = 'category';
		$criteria->limit = 10;
		$criteria->order = 'sort ASC';
		$categories = PrdCategory::model()->findAll($criteria);

		$this->layout='//layouts/column2';
		$this->render('list', array(
			'product'=>$product,
			'categories'=>$categories,
			'category'=>$category,
		)); 
	}	
	public function actionDetail($id)
	{

		$criteria=new CDbCriteria;
		$criteria->with = array('description', 'category');
		$criteria->addCondition('status = "1"');
		$criteria->addCondition('description.language_id = :language_id');
		$criteria->params[':language_id'] = $this->languageID;
		$criteria->addCondition('t.id = :id');
		$criteria->params[':id'] = $id;
		$data = PrdProduct::model()->find($criteria);
		if($data===null)
			throw new CHttpException(404,'The requested page does not exist.');

		$criteria=new CDbCriteria;
		$criteria->addCondition('t.product_id = :product_id');
		$criteria->params[':product_id'] = $data->id;
		$criteria->order = 'id ASC';
		$attributes = PrdProductAttributes::model()->findAll($criteria);

		// $criteria=new CDbCriteria;
		// $criteria->with = array('description', 'category', 'categories');
		// $criteria->order = 'RAND()';
		// $criteria->addCondition('status = "1"');
		// $criteria->addCondition('description.language_id = :language_id');
		// $criteria->params[':language_id'] = $this->languageID;
		// $product = new CActiveDataProvider('PrdProduct', array(
		// 	'criteria'=>$criteria,
		//     'pagination'=>array(
		//         'pageSize'=>4,
		//     ),
		// ));

		$criteria = new CDbCriteria;
		$criteria->with = array('description');
		$criteria->addCondition('t.parent_id = :parent_id');
		$criteria->params[':parent_id'] = 0;
		$criteria->addCondition('t.type = :type');
		$criteria->params[':type'] = 'category';
		$criteria->limit = 3;
		$criteria->order = 'sort ASC';
		$categories = PrdCategory::model()->findAll($criteria);

		$criteria=new CDbCriteria;
		$criteria->with = array('description', 'category', 'categories');
		$criteria->order = 'date DESC';
		$criteria->addCondition('status = "1"');
		$criteria->addCondition('description.language_id = :language_id');
		$criteria->params[':language_id'] = $this->languageID;
		$criteria->addCondition('t.category_id = :category');
		$criteria->params[':category'] = $data->category_id;
		$criteria->addCondition('t.id != :id');
		$criteria->params[':id'] = $data->id;
		$criteria->limit = 4;
		$product = PrdProduct::model()->findAll($criteria);

	    $session=new CHttpSession;
	    $session->open();
	    $login_member = $session['login_member'];

		$model= new PrdProductReview;
	    
	    if (isset($login_member)) {
			if(isset($_POST['PrdProductReview']))
			{
				$model->attributes=$_POST['PrdProductReview'];
				$model->product_id = $id;
				$model->member_id = $login_member['id'];
				$model->name = $login_member['first_name'].' '.$login_member['last_name'];
				$model->date = date("Y-m-d H:i:s");
				$model->status = 0;

				if($model->validate()){
					$transaction=$model->dbConnection->beginTransaction();
					try
					{
						$model->save();
						Yii::app()->user->setFlash('success2','Review anda telah kami terima, kami akan mempublish komentar anda');
					    $transaction->commit();
						$this->refresh();
					}
					catch(Exception $ce)
					{
						echo $ce;
						exit;
					    $transaction->rollback();
					}
				}
			}
	    }

		$criteria = new CDbCriteria;
		$criteria->select = 'SUM(rating) as rating';
		$criteria->addCondition('product_id = :product_id');
		$criteria->params[':product_id'] = $id;
		$criteria->addCondition('status = :status');
		$criteria->params[':status'] = 1;
		// $criteria->order = 'date DESC';
		// $criteria->group = 'product_id';
		$sumRating = PrdProductReview::model()->find($criteria)->rating;

		$criteria = new CDbCriteria;
		$criteria->addCondition('product_id = :product_id');
		$criteria->params[':product_id'] = $id;
		$criteria->addCondition('status = :status');
		$criteria->params[':status'] = 1;
		$criteria->order = 'date DESC';
		$review = new CActiveDataProvider('PrdProductReview', array(
			'criteria'=>$criteria,
		    'pagination'=>array(
		        'pageSize'=>10,
		    ),
		));
		if ($review->getTotalItemCount() > 0) {
			# code...
			$rating = round($sumRating/$review->getTotalItemCount());
		}else{
			$rating = 0;
		}

		$this->pageTitle = $data->description->name.' | '.$this->pageTitle;
		$this->layout='//layouts/column2';
		$this->render('detail', array(	
			'data' => $data,
			'model' => $model,
			'review' => $review,
			'rating' => $rating,
			'product' => $product,
			'attributes' => $attributes,
			'categories' => $categories,
		));
	}
	
	public function actionAddcart()
	{
		if ($_POST['id'] != '') {
			if ( ! $_POST['id'])
				throw new CHttpException(404,'The requested page does not exist.');

			if ($_POST['qty'] < 1){
				Yii::app()->user->setFlash('danger','Item can not be less than 1');
				$this->redirect(array('/product/detail', 'id'=>$_POST['id']));
			}

			if ($_POST['option'] != '') {
				$id = $_POST['id'].'-'.$_POST['option'];
			}else{
				$id = $_POST['id'];
			}
			$qty = $_POST['qty'];
			$optional = $_POST['optional'];
			$option = $_POST['option'];

			$model = new Cart;

			$data = PrdProduct::model()->findByPk($id);

			if (is_null($data))
				throw new CHttpException(404,'The requested page does not exist.');

			$model->addCart($id, $qty, $data->harga, $option, $optional);
			
			Yii::app()->user->setFlash('addcart',$qty);
			Yii::app()->user->setFlash('success','The item has been added to the shopping cart');
			Yii::app()->user->setFlash('openpop','1');
			$this->redirect(array('/product/detail', 'id'=>$_POST['id']));
		}else{
			$criteria=new CDbCriteria;
			$criteria->with = array('description');
			$criteria->addCondition('status = "1"');
			$criteria->addCondition('description.language_id = :language_id');
			$criteria->params[':language_id'] = $this->languageID;
			$criteria->addCondition('t.id = :id');
			$criteria->params[':id'] = $_GET['id'];
			$data = PrdProduct::model()->find($criteria);
			if($data===null)
				throw new CHttpException(404,'The requested page does not exist.');
			
			$model = new Cart;
			$cart = $model->viewCart($this->languageID);

			$this->render('addcart', array(	
				'data' => $data,
				'cart' => $cart[$_GET['id']],
			));
		}
	}

	public function actionAddcart2()
	{
		if ( ! $_GET['id'])
			throw new CHttpException(404,'The requested page does not exist.');

		$id = $_GET['id'];
		$qty = 1;
		$optional = $_POST['optional'];
		$option = $_POST['option'];

		$model = new Cart;

		$data = PrdProduct::model()->findByPk($id);

		if (is_null($data))
			throw new CHttpException(404,'The requested page does not exist.');

		$model->addCart($id, $qty, $data->harga, $option, $optional);
		
		Yii::app()->user->setFlash('addcart',$qty);
		$this->redirect(array('/product/addcart', 'id'=>$data->id));
	}

	public function actionEdit()
	{
		if ( ! $_POST['id'])
			throw new CHttpException(404,'The requested page does not exist.');

		$id = $_POST['id'];
		$qty = $_POST['qty'];
		$optional = $_POST['optional'];
		$option = $_POST['option'];

		$model = new Cart;

		$data = PrdProduct::model()->findByPk($id);

		if (is_null($data))
			throw new CHttpException(404,'The requested page does not exist.');

		$model->addCart($id, $qty, $data->harga, $option, $optional, 'edit');

		// $this->redirect(CHtml::normalizeUrl(array('/cart/shop')));
	}
	
	public function actionDestroy()
	{
		$model = new Cart;
		$model->destroyCart();
	}
	public function actionAddcompare($id)
	{
		$model = new Cart;
		$model->addCompare($id);
	}
	public function actionDeletecompare()
	{
		$model = new Cart;
		$model->deleteCompare($id);
		$this->redirect(CHtml::normalizeUrl(array('/product/index')));
	}
	public function actionViewcompare()
	{
		$model = new Cart;
		$data = $model->viewCompare($id);

		$this->layout='//layoutsAdmin/mainKosong';

		$categoryName = Product::model()->getCategoryName();

		$this->render('viewcompare', array(
			'data'=>$data,
			'categoryName'=>$categoryName,
		));
	}

	public function actionData()
	{


	$data = array(
		'Audio Video'=>array(
		'Television'=>array(
		    'LED TV',
		    'QLED TV',
		),
		'Media Player'=>array(
		    'Alarm Clock',
		    'CD Player',
		    'DVD Player',
		),
		'Home Audio System'=>array(
		    'Active Home Theater In The Box Packages',
		    'Compact Hi-Fi',
		    'Home Theater In The Box',
		    'Karaoke Packages',
		    'Micro Hi-Fi',
		    'Mini Compo',
		    'Mini Hi-Fi',
		),
		'Portable Audio'=>array(
		    'DVD Portable',
		    'Headphone',
		    'MP3 Player',
		    'Multi Media Portable Speaker',
		),
		'Speaker'=>array(
		    'Active Speaker',
		    'Bookshelf/Surround Speaker',
		    'Ceiling Speaker',
		    'Center Speaker',
		    'Floor Stand',
		    'Karaoke Speaker',
		    'Main Speaker',
		    'Multimedia Speaker',
		    'Outdoor Speaker',
		    'Passive Home Theater Packages',
		    'Sound Bar',
		    'Subwoofer',
		),
		'Home Audio Component'=>array(
		    'Amplifier',
		    'Bluray Player',
		    'Multi Channel Amplifier',
		    'Receiver',
		),
		'Stand & Mounting'=>array(
		    'Audio Mounts',
		    'TV Mounts',
		),
		'Video Accessories'=>array(
		    'Antenna',
		    'Transmitter & Receiver',
		    'Video Accessories',
		    'Video Cable',
		),
		),
		'Home Appliances'=>array(
		'Air Cooling'=>array(
		    'Air Cooler',
		    'Auto Fan',
		    'Box Fan',
		    'Ceiling Fan',
		    'Desk Fan',
		    'Industrial Fan',
		    'Stand Fan',
		    'Tower Fan',
		    'Wall Fan',
		),
		'Air Quality'=>array(
		    'Air Dehumidifier',
		    'Air Humidifier',
		    'Air Purifier',
		    'Air Quality Accessories',
		    'Exhaust Fan',
		),
		'Vacuum & Floor Care'=>array(
		    'Canister Vacuum Cleaner',
		    'Cyclone Vacuum Cleaner',
		    'Drum Vacuum Cleaner',
		    'Handheld Vacuum Cleaner',
		    'High Pressure Accessories',
		    'High Pressure Washer',
		    'Robotic Vacuum Cleaner',
		    'Steam Cleaner',
		    'Upright Vacuum Cleaner',
		    'Vacuum Cleaner Accessories',
		),
		'Water Dispenser'=>array(
		    'Portable Dispenser',
		    'Standing Dispenser',
		    'Water Dispenser Accessories',
		),
		'Water Heater'=>array(
		    'Electric Water Heater',
		    'Gas Water Heater',
		),
		'Water Pump'=>array(
		    'Booster Water Pump',
		    'Jet Water Pump',
		    'Shallow Water Pump',
		),
		'Lighting Device'=>array(
		    'Emergency Lamp',
		),
		'Sewing Machine'=>array(
		    'Embroidery Machine',
		    'Sewing Machine',
		),
		'Garment Care'=>array(
		    'Flatiron',
		    'Steam Iron',
		    'Vertical Steam Iron',
		),
		),
		'White Goods'=>array(
		'Air Conditioner'=>array(
		    'Floor Standing',
		    'Portable Air Conditioner',
		    'Single Split',
		),
		'Refrigerator'=>array(
		    'Big 2 Door',
		    'Compact',
		    'Multi Door',
		    'One Door',
		    'Side By Side',
		    'Small 2 Door',
		),
		'Washer'=>array(
		    'Electric Dryer',
		    'Front Loading Washer',
		    'Portable Washer',
		    'Semi Auto Washer',
		    'Top Loading Washer',
		),
		'Display Cooler'=>array(
		    'Showcase',
		    'Undercounter Chiller',
		),
		'Freezer'=>array(
		    'Chest Freezer',
		    'Upright Freezer',
		),
		'White Goods Accessories'=>array(
		    'Refrigerator & Washer Stand',
		    'Washer Accessories',
		),
		),
		'Kitchen Appliances'=>array(
		'Major Kitchen Appliances'=>array(
		    'Cooker Hood',
		    'Kitchen Fixtures',
		    'Kitchen Range',
		    'Micro & Oven',
		    'Portable Stove',
		    'Wall Micro & Oven',
		    'Washer & Dryer',
		),
		'Kitchen & Dining'=>array(
		    'Bakeware',
		    'Baking Mould',
		    'Baking Ring',
		    'Baking Tools',
		    'Cookware',
		    'Cutlery',
		    'Dining & Entertaining',
		    'Kitchen Tools',
		    'Speciality Product',
		    'Storage & Organization',
		    'Sugar Craft & Icing',
		    'Thermoses Container',
		),
		'Small Kitchen Appliances'=>array(
		    'Blender',
		    'Coffee Maker',
		    'Electric Cooker',
		    'Food Preparation',
		    'Juicer',
		    'Kettle',
		    'Mixer',
		    'Toaster',
		    'Speciality Appliance',
		),
		),
		'Smart Phones'=>array(
		'Smart Phone'=>array(
		    'Android',
		    'IOS',
		),
		'Smart Watch'=>array(
		    'Smart Watch',
		),
		'Smart Headset'=>array(
		    'Smart Headset',
		),
		'Tablet'=>array(
		    'Tablet Android',
		),
		'Personal Audio'=>array(
		    'Personal Earphone',
		    'Personal Headphone',
		    'Personal Speaker',
		),
		'Accessories'=>array(
		    'Bluetooth Handsfree',
		    'Car Dock',
		    'Home Charger',
		    'Mobile Bag & Case',
		    'Mobile Charger',
		    'Mobile Earphone',
		    'Mobile Headset',
		    'Wireless Charger',
		    'Wireless Speaker',
		),
		),
		'Computer'=>array(
		'Laptop'=>array(
		    '2 in 1 Notebook',
		    'Basic Notebook',
		    'Gaming Notebook',
		    'Performance Notebook',
		    'Ultrabook',
		),
		'Desktop'=>array(
		    'All In One PC',
		    'Mini PC',
		),
		'Accessories'=>array(
		    'Cable Converter',
		    'Cable Keyboard',
		    'Cable Mouse',
		    'Card Reader',
		    'Combo Cable Keyboard',
		    'Combo Wireless Keyboard',
		    'Cooling Pad',
		    'IT Active Speaker',
		    'Multimedia Headphone',
		    'Notebook Backpack',
		    'Portable Speaker',
		    'Presenter',
		    'USB Hub',
		    'Webcam',
		    'Wireless Keyboard',
		    'Wireless Mouse',
		),
		'Networking'=>array(
		    'Modem',
		    'Switch Hub',
		    'Wireless Router',
		),
		'Software'=>array(
		    'Software Office App',
		),
		),
		'Digital Imaging'=>array(
		'Camera'=>array(
		    'Camcorder',
		    'Compact Camera',
		    'DSLR Camera',
		    'Mirrorless Camera',
		    'Prosumer Camera',
		    'Sport & Action Camera',
		),
		'Lens'=>array(
		    'Fixed Lens',
		    'Macro Lens',
		    'Tele Lens',
		    'Wide Lens',
		),
		'Photo Printer'=>array(
		    'Profesional Photo Printer',
		    'Photo Paper',
		),
		'Pod & Mounting'=>array(
		    'Head Ball',
		    'Flexiblepod',
		    'Monopod',
		),
		'Digital Imaging Bag & Case'=>array(
		    'Backpack',
		    'Camera Pouch',
		    'Hard & Waterproof Case',
		    'Shoulder Bag',
		    'Sling Bag',
		),
		'Digital Imaging Lighting'=>array(
		    'Flash',
		),
		'Digital Imaging Accessories'=>array(
		    'Battery',
		    'Camerastrap & Sling',
		    'Drybox',
		    'Lens Cap',
		    'Lens Filter',
		    'Lens Hood',
		),
		'Photoprinter'=>array(
		    'Prof Photoprinter',
		),
		),
		'Office Equipment'=>array(
			'Fixed Phone'=>array(
			    'Corded Phone',
			    'Cordless Phone',
			    'Faximile',
			),
			'Projector'=>array(
			    '3D Projector',
			    'LCD Projector',
			),
			'Printer'=>array(
			    'Multifunction Ink Jet',
			    'Multifunction Laser Printer',
			    'Single Ink Jet',
			    'Single Laser Printer',
			),
			'Calculator'=>array(
			    'Desktop Calculator',
			    'Printing Calculator',
			    'Scientific',
			),
			'Monitor'=>array(
			    'LED Monitor',
			    'Touchscreen Monitor',
			    'MTV',
			),
			'Scanner'=>array(
			    'Single Scanner',
			    'Barcode Scanner',
			),
			'Office Electronic'=>array(
			    'Cash Register',
			    'Face ID',
			    'Fingerprint',
			    'Laminating',
			    'Paper Shredder',
			    'Time Clock',
			    'Type Writer',
			),
			'Printer Supplies'=>array(
			    'Catridge',
			),
			'Safe & Deposit Equipment'=>array(
			    'Safe Box',
			    'Money Counter',
			    'Cash Box',
			    'Money Detector',
			),
			'Security Devices'=>array(
			    'Digital CCTV',
			),
			'Stationary'=>array(
			    'Paper Cutter',
			    'Binding Machine',
			    'Clipcase',
			    'Heavyduty Paperpunch',
			),
		),
		'Hardware And Tools'=>array(
		'Hand Tools'=>array(
		    'Blade',
		    'Tape',
		    'Tool Bag',
		    'Tool Kit',
		    'Pliers',
		    'Hammer',
		    'Hex Key Set',
		    'Glue Mini Gun',
		    'Spark Testing',
		),
		'Drill Bit'=>array(
		    'Drill Bit Black',
		    'Drill Bit Set',
		    'Drill Spade Set',
		    'Drill Bitblack',
		    'Masory Drill Bit',
		),
		'Laser Tools'=>array(
		    'Laser Measurement',
		),
		'Electronic Hardware'=>array(
		    'Cordless Hammer Drill',
		    'String Timmer',
		    'Screwdriver',
		    'Hammer Drill',
		    'Speed Blower',
		    'Cordless Drill',
		    'Cordless Hammer Dril',
		    'String Trimmer',
		    'Grinder',
		    'Sprayer',
		    'Jigsaw',
		    'Heat Gun',
		    'Rebating Planer',
		    'Sander',
		),
		'Mechanical Tools'=>array(
		    'Wrenches',
		),
		'Jigsaw Blade'=>array(
		    'Jigsaw Blade',
		),
		),
		'Personal Care'=>array(
		'Beauty Care'=>array(
		    'Esthetic Care',
		    'Hair Curler',
		    'Hair Dryer',
		    'Hair Styler',
		),
		'Health Care'=>array(
		    'Electric Toothbrush',
		),
		'Shaver & Trimmer'=>array(
		    'Electric Shaver',
		    'Epilator',
		    'Hair Clipper',
		    'Nose Trimmer',
		),
		),
		'Recording Media & Equipment'=>array(
		'Energy'=>array(
		    'Power Bank',
		),
		'Recording Media'=>array(
		    'Flashdisk',
		    'HDD',
		    'MicroSD Card',
		    'SD Card',
		),
		),
	);
		// $deleteData = PrdCategory::model()->findAll('type = "category"');
		// foreach ($deleteData as $key => $value) {
		// 	PrdCategoryDescription::model()->find('category_id = :category_id', array(':category_id'=>$value->id))->delete();
		// 	$value->delete();
		// }
		// $urutan = 1;
		// foreach ($data as $parent => $child1) {
		// 	$model = new PrdCategory;
		// 	$model->type = 'category';
		// 	$model->parent_id = 0;
		// 	$model->sort = $urutan;
		// 	$model->save(false);

		// 	$modelDesc = new PrdCategoryDescription;
		// 	$modelDesc->category_id = $model->id;
		// 	$modelDesc->language_id = 2;
		// 	$modelDesc->name = $parent;
		// 	$modelDesc->save(false);
		// 	$urutan++;
		// 	$urutan2 = 1;
		// 	foreach ($child1 as $level2 => $child2) {
		// 		$model2 = new PrdCategory;
		// 		$model2->type = 'category';
		// 		$model2->parent_id = $model->id;
		// 		$model2->sort = $urutan2;
		// 		$model2->save(false);
				
		// 		$modelDesc2 = new PrdCategoryDescription;
		// 		$modelDesc2->category_id = $model2->id;
		// 		$modelDesc2->language_id = 2;
		// 		$modelDesc2->name = $level2;
		// 		$modelDesc2->save(false);
		// 		$urutan2++;
		// 		$urutan3 = 1;
		// 		foreach ($child2 as $level3) {
		// 			$model3 = new PrdCategory;
		// 			$model3->type = 'category';
		// 			$model3->parent_id = $model2->id;
		// 			$model3->sort = $urutan3;
		// 			$model3->save(false);
					
		// 			$modelDesc3 = new PrdCategoryDescription;
		// 			$modelDesc3->category_id = $model3->id;
		// 			$modelDesc3->language_id = 2;
		// 			$modelDesc3->name = $level3;
		// 			$modelDesc3->save(false);
		// 			$urutan3++;
		// 		}
		// 	}
		// }


        


	}

}