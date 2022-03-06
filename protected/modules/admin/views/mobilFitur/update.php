<?php 
	$criteria = new CDbCriteria;
	$criteria->addCondition('t.id = :id');
	$criteria->params[':id'] = $_GET['category'];
	$detailCategory = MasterMobil::model()->find($criteria);
	$titles_subm = $detailCategory->title;
?>
<?php
$this->breadcrumbs=array(
	'Mobil Fiturs'=>array('index'),
	// $model->title=>array('view','id'=>$model->id),
	'Edit > '. $titles_subm
);

$this->pageHeader=array(
	'icon'=>'fa fa-minus',
	'title'=>'MobilFitur',
	'subtitle'=>'Edit MobilFitur',
);

$this->menu=array(
	array('label'=>'List MobilFitur', 'icon'=>'th-list','url'=>array('index', 'category'=>$_GET['category'])),
	array('label'=>'Add MobilFitur', 'icon'=>'plus-sign','url'=>array('create', 'category'=>$_GET['category'])),
	// array('label'=>'View MobilFitur', 'icon'=>'pencil','url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>