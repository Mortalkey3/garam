<?php

class PdfController extends ControllerAdmin
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layoutsAdmin/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			//'accessControl', // perform access control for CRUD operations
			array('admin.filter.AuthFilter', 
				'params'=>array(
					// 'actionAllowOnLogin'=>array('upload'),
				)
			),
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			(!Yii::app()->user->isGuest)?
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('delete','index','view','create','update'),
				'users'=>array(Yii::app()->user->name),
			):array(),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Pdf;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Pdf']))
		{
			$model->attributes=$_POST['Pdf'];

			$file = CUploadedFile::getInstance($model,'file');
			$model->file = $file->name;
			$model->size = $file->size;
			$checkDataPdf = Pdf::model()->find('file = :file', array(':file'=>$model->file));
			if ($checkDataPdf != null) {
				$model->addError('file','Ganti nama file anda, dan upload kembali, nama file ada yang sama');
			}

			$image = CUploadedFile::getInstance($model,'image');
			$model->image = substr(md5(time()),0,5).'-'.$image->name;			

			if(!$model->hasErrors() AND $model->validate()){
				$transaction=$model->dbConnection->beginTransaction();
				try
				{
					$file->saveAs(Yii::getPathOfAlias('webroot').'/images/pdf/'.$model->file);
					$image->saveAs(Yii::getPathOfAlias('webroot').'/images/pdf/'.$model->image);
					
					$model->save();
					Log::createLog("PdfController Create $model->id");
					Yii::app()->user->setFlash('success','Data has been inserted');
				    $transaction->commit();
					$this->redirect(array('index'));
				}
				catch(Exception $ce)
				{
				    $transaction->rollback();
				}
			}
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Pdf']))
		{
			$file = $model->file;//mengamankan nama file
			$image = $model->image;//mengamankan nama file
			$model->attributes=$_POST['Pdf'];//setting semua nilai
			$model->file = $file;//mengembalikan nama file
			$model->image = $image;//mengembalikan nama file

			$file = CUploadedFile::getInstance($model,'file');
			if ($file->name != '') {
				$model->file = $file->name;
				$model->size = $file->size;
				$checkDataPdf = Pdf::model()->find('file = :file', array(':file'=>$model->file));
				if ($checkDataPdf != null) {
					$model->addError('file','Ganti nama file anda, dan upload kembali, nama file ada yang sama');
				}
			}

			$image = CUploadedFile::getInstance($model,'image');
			if ($image->name != '') {
				$model->image = substr(md5(time()),0,5).'-'.$image->name;
			}			

			if(!$model->hasErrors() AND $model->validate()){
				$transaction=$model->dbConnection->beginTransaction();
				try
				{
					if ($file->name != '') {
						$file->saveAs(Yii::getPathOfAlias('webroot').'/images/pdf/'.$model->file);
					}
					if ($image->name != '') {
						$image->saveAs(Yii::getPathOfAlias('webroot').'/images/pdf/'.$model->image);
					}

					$model->save();
					Log::createLog("PdfController Update $model->id");
					Yii::app()->user->setFlash('success','Data Edited');
				    $transaction->commit();
					$this->redirect(array('index', 'category'=>$category));
				}
				catch(Exception $ce)
				{
				    $transaction->rollback();
				}
			}
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
			// we only allow deletion via POST request
			$model = $this->loadModel($id);
			@unlink(Yii::getPathOfAlias('webroot').'/images/pdf/'.$model->file);
			$model->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			$this->redirect(array('index'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model=new Pdf('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Pdf']))
			$model->attributes=$_GET['Pdf'];
		
		$dataProvider=new CActiveDataProvider('Pdf');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Pdf::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='bank-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
