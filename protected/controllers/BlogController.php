<?php

class BlogController extends Controller
{

	// public function actionD_index()
	// {
	// 	$this->pageTitle = 'Berita & Artikel - '.$this->pageTitle;
	// 	$this->layout='//layouts/column1';

	// 	$this->render('//blog/d_index', array(	
	// 	));
	// }

	// public function actionD_detail()
	// {
	// 	$this->pageTitle = 'Title News' . ' - News & Articles - '.$this->pageTitle;
	// 	$this->layout='//layouts/column1';

	// 	$this->render('//blog/d_detail', array(	
	// 	));
	// }

	public function actionIndex()
	{

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

		$this->layout='//layouts/column2';
		$this->pageTitle = 'News - '.$this->pageTitle;
		$this->render('index', array(
			'dataBlog'=>$dataBlog,
			'dataFeatured'=>$dataFeatured,
		));
	}
	
	public function actionDetail($id)
	{
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

		$this->pageTitle = $dataBlog->description->title . ' - News - '.$this->pageTitle;
		$this->layout='//layouts/column2';
		$this->render('detail', array(
			'data' => $dataBlog,
			'dataBlogs' => $dataBlogs,
			// 'menu'=>$menu,
			// 'data'=> $konten,
			// 'subMenu'=>$subMenu,
			// 'categoryData'=>$categoryData,
			// 'terbaru'=>$terbaru,
			// 'categoryName'=>$categoryName,
		));
	}

	public function actionList()
	{

		$this->layout='//layouts/home';

		// convert to list item menu
		$categoryName = Product::model()->getCategoryName();

		$konten = Blog::model()->getAllData(10, false, $this->languageID);

		$this->pageTitle = $konten['pageTitle'].' - ' . $this->pageTitle;
		if ($_GET['topik'] == 'topik-panduan-pemula') {
		$this->render('panduan', array(
			'categoryName'=>$categoryName,
			'data'=> $konten,
		));
		}elseif($_GET['topik'] == 'topik-workout-list'){
		$this->render('workout', array(
			'categoryName'=>$categoryName,
			'data'=> $konten,
		));
		}else{
		$this->render('list', array(
			'categoryName'=>$categoryName,
			'data'=> $konten,
		));
		}
	}
	public function actionCalculator()
	{

		$this->layout='//layouts/home';
		$this->pageTitle = 'Fitness Calculator | ' . $this->pageTitle;
		$this->render('calculator', array(
		));
	}
	public function actionCalc($type)
	{
		switch ($type) {
			case 'bmi':
				$tampilan = 'calc-bmi';
				break;
			
			case 'bmr':
				$tampilan = 'calc-bmr';
				break;
			
			case 'kalori':
				$tampilan = 'calc-kalori';
				break;
			
			case 'minum':
				$tampilan = 'calc-minum';
				break;
			
			case 'nutrisi':
				$tampilan = 'calc-nutrisi';
				break;
			
			default:
				$tampilan = 'calc-bmi';
				break;
		}

		$this->layout='//layoutsAdmin/mainKosong';
		$this->pageTitle = 'Fitness Calculator | ' . $this->pageTitle;
		$this->render($tampilan, array(
		));
	}

	// public function actionPanduan()
	// {

	// 	$this->layout='//layouts/home';
	// 	$this->pageTitle = 'Panduan Fitness untuk Pemula | ' . $this->pageTitle;
	// 	$this->render('panduan', array(
	// 	));
	// }
	// public function actionWorkout()
	// {

	// 	$this->layout='//layouts/home';
	// 	$this->pageTitle = 'Workout List Fitness | ' . $this->pageTitle;
	// 	$this->render('workout', array(
	// 	));
	// }
}