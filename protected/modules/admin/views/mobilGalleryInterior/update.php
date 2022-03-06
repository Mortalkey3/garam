<?php 
	$criteria = new CDbCriteria;
	$criteria->addCondition('t.id = :id');
	$criteria->params[':id'] = $_GET['category'];
	$detailCategory = MasterMobil::model()->find($criteria);
	$titles_subm = $detailCategory->title;
?>
<?php
$this->breadcrumbs=array(
	'Mobil Gallery Interior'=>array('index'),
	// $model->id=>array('view','id'=>$model->id),
	'Edit',
);

$this->pageHeader=array(
	'icon'=>'fa fa-minus',
	'title'=>'Mobil Gallery Interior > '. $titles_subm,
	'subtitle'=>'Edit Mobil Gallery Interior',
);

$this->menu=array(
	array('label'=>'List Mobil Gallery Interior', 'icon'=>'th-list','url'=>array('index', 'category'=>$_GET['category'])),
	array('label'=>'Add Mobil Gallery Interior', 'icon'=>'plus-sign','url'=>array('create', 'category'=>$_GET['category'])),
	// array('label'=>'View Mobil Gallery Interior', 'icon'=>'pencil','url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>