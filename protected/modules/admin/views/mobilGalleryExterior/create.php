<?php 
	$criteria = new CDbCriteria;
	$criteria->addCondition('t.id = :id');
	$criteria->params[':id'] = $_GET['category'];
	$detailCategory = MasterMobil::model()->find($criteria);
	$titles_subm = $detailCategory->title;
?>
<?php
$this->breadcrumbs=array(
	'Mobil Gallery Exterior'=>array('index'),
	'Add',
);

$this->pageHeader=array(
	'icon'=>'fa fa-minus',
	'title'=>'Mobil Gallery Exterior > '. $titles_subm,
	'subtitle'=>'Add Mobil Gallery Exterior',
);

$this->menu=array(
	array('label'=>'List Mobil Gallery Exterior', 'icon'=>'th-list','url'=>array('index', 'category'=>$_GET['category'])),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>