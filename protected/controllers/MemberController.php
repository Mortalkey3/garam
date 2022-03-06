<?php

class MemberController extends Controller
{

	public function actionIndex()
	{
		$session = new CHttpSession;
		$session->open();
		if (isset($session['login_member'])) {
			$model = MeMember::model()->findByPk($session['login_member']['id']);
			if(isset($_POST['MeMember'])) {
				$pass = $model->pass;
				$model->attributes = $_POST['MeMember'];
				if ($_POST['MeMember']['passold'] != '') {
					$model->scenario = 'updatePass';
					$model->pass = sha1($model->pass);
					$model->pass2 = sha1($model->pass2);
				}else{
					$model->scenario = 'update';
					$model->pass = $pass;
				}
				if ($model->validate()) {
					if ($_POST['MeMember']['passold'] != '') {
						if (sha1($model->passold) != $pass) {
							$model->addError('passold','Password lama tidak valid');
						}
					}
					if(!$model->hasErrors())
					{
						$model->save();
						$this->redirect(array());
					}
				}
			}

			$model->pass = '';
			$model->pass2 = '';
			$model->passold = '';

			$criteria = new CDbCriteria;
			$criteria->addCondition('email = :email');
			$criteria->order = 'date_modif DESC';
			$criteria->params[':email'] = $session['login_member']['email'];
			$order =  new CActiveDataProvider('OrOrder', array(
				'criteria'=>$criteria,
				'pagination'=>array(
			        'pageSize'=>5,
			    ),
			));
			$this->layout='//layouts/column2';
			$this->render('index2', array(
				'model'=>$model,
				'order'=>$order,
			));	
		}else{
			$model = new MeMember;
			$model->scenario = 'createMember';
			
			$modelLogin = new LoginForm2;

			if(isset($_POST['MeMember']))
			{
				$model->attributes = $_POST['MeMember'];

				if ($model->validate()) {
					$transaction=$model->dbConnection->beginTransaction();
					try
					{
						$model->aktif = 1;
						$pass = $model->pass;
						$model->pass = sha1($model->pass);
						$model->pass2 = sha1($model->pass2);
						$model->save();

						$transaction->commit();

						$mail = $this->renderPartial('//mail/register', array(
							'model' => $model,
						), true);

						$config = array(
							'to'=>array($model->email, $this->setting['email'], $this->setting['contact_email']),
							// 'to'=>array($model->email),
							'subject'=>'['.Yii::app()->name.'] Register '.$model->email,
							'message'=>$mail,
						);
						// kirim email
						Common::mail($config);

						Yii::app()->user->setFlash('success','Registration success');
						$session['login_member'] = $model->attributes;
					    if ($_GET['ret']) {
							$this->redirect(urldecode($_GET['ret']));
					    }else{
							$this->redirect(array('index'));
					    }
					}
					catch(Exception $ce)
					{
					    $transaction->rollback();
					}
				}
			}
			if(isset($_POST['LoginForm2']))
			{
				$modelLogin->attributes=$_POST['LoginForm2'];
				// validate user input and redirect to the previous page if valid
				if($modelLogin->validate()){
					$data = MeMember::model()->find('email = :email', array(':email'=>$modelLogin->username));
					$session['login_member'] = $data->attributes;
				    if ($_GET['ret']) {
						$this->redirect(urldecode($_GET['ret']));
				    }else{
						$this->redirect(array('index'));
				    }
				}
			}

			// $this->pageTitle = 'Login & Register - '.$this->pageTitle;
			// $this->layout='//layouts/home';
			$this->layout='//layouts/column2';
			$this->render('index', array(
				'model'=>$model,
				'modelLogin'=>$modelLogin,
				// 'modelDelivery'=>$modelDelivery,
			));	
		}
	}
	public function actionLogout()
	{
		$session = new CHttpSession;
		$session->open();
		unset($session['login_member']);
		$this->redirect(array('index'));
	}

	public function actionVieworder($nota)
	{
		$session = new CHttpSession;
		$session->open();
		$modelOrder = OrOrder::model()->find('CONCAT(`invoice_prefix`, "-", `invoice_no`) = :nota AND email  = :email ', array(':nota'=>$nota, ':email'=>$session['login_member']['email']));

		if (is_null($modelOrder))
			throw new CHttpException(404,'The requested page does not exist.');

		$data = OrOrderProduct::model()->findAll('order_id = :order_id', array(':order_id'=>$modelOrder->id));

		$this->pageTitle = 'View Order - '.$this->pageTitle;
		$this->layout='//layouts/column2';
		// $this->renderPartial('/mail/cart2', array(
		// 	'data' => $data,
		// 	'modelOrder' => $modelOrder,
		// ));
		$this->render('vieworder', array(
			'data' => $data,
			'modelOrder' => $modelOrder,
		));
	}

	public function actionForgot()
	{
		$modelLogin = new LoginForm2;

		if(isset($_POST['LoginForm2']))
		{
			$modelLogin->attributes=$_POST['LoginForm2'];
			// validate user input and redirect to the previous page if valid
			if ($modelLogin->username != '') {
				$hash = urlencode(base64_encode($modelLogin->username.'|'.rand(1000000,10000000)));
				$mail = $this->renderPartial('//mail/forgotpass', array(
					'hash'=>$hash,
					'email'=>$modelLogin->username,
				), true);
				// echo $mail;
				// exit;

				$config = array(
					'to'=>array($modelLogin->username),
					// 'to'=>array($model->email),
					'subject'=>'['.Yii::app()->name.'] Forgot Password',
					'message'=>$mail,
				);
				// kirim email
				Common::mail($config);
				Yii::app()->user->setFlash('success','Please access your email to reset your password');
				$this->redirect(array('index'));
			}
		}

		// $this->pageTitle = 'Login & Register - '.$this->pageTitle;
		// $this->layout='//layouts/home';
		$this->layout='//layouts/column2';
		$this->render('forgot', array(
			'modelLogin'=>$modelLogin,
			// 'modelDelivery'=>$modelDelivery,
		));	
	}
	public function actionChangepass($hash)
	{
		$email = explode('|', base64_decode(urldecode($hash)));
		$email = $email[0];
		
		$model = MeMember::model()->find('email = :email', array(':email'=>$email));

		if(isset($_POST['MeMember'])) {
			$pass = $model->pass;
			$model->attributes = $_POST['MeMember'];
			if ($_POST['MeMember']['pass'] != '') {
				$model->scenario = 'updatePass';
				$model->pass = sha1($model->pass);
				$model->pass2 = sha1($model->pass2);
			}
			if ($model->validate()) {
				if(!$model->hasErrors())
				{
					$model->save();
					Yii::app()->user->setFlash('success','Your password has been changed , please login');
					$this->redirect(array('index'));
				}
			}
		}
		$model->pass = '';
		$model->pass2 = '';

		// $this->pageTitle = 'Login & Register - '.$this->pageTitle;
		// $this->layout='//layouts/home';
		$this->render('changepass', array(
			'model'=>$model,
			// 'modelDelivery'=>$modelDelivery,
		));	
	}

}
