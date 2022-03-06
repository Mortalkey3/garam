<?php
$this->breadcrumbs=array(
	'Industries'=>array('index'),
	// $model->id=>array('view','id'=>$model->id),
	'Edit',
);

$this->pageHeader=array(
	'icon'=>'fa fa-tag',
	'title'=>'Industries',
	'subtitle'=>'Data Industries',
);

$this->menu=array(
	array('label'=>'List Industries', 'icon'=>'th-list','url'=>array('index')),
	array('label'=>'Add Industries', 'icon'=>'plus-sign','url'=>array('create')),
	// array('label'=>'View Industries', 'icon'=>'pencil','url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php echo $this->renderPartial('_form',array('model'=>$model, 'modelDesc'=>$modelDesc, 'modelImage'=>$modelImage)); ?>
