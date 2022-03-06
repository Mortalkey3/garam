<?php
$this->breadcrumbs=array(
	'Slide'=>array('index', 'type'=>$type),
	'Add',
);

$this->pageHeader=array(
	'icon'=>'fa fa-image',
	'title'=>'Slide',
	'subtitle'=>'Data Slide',
);

$this->menu=array(
	array('label'=>'List Slide', 'icon'=>'th-list','url'=>array('index', 'type'=>$type)),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php echo $this->renderPartial('_form', array('model'=>$model, 'modelDesc'=>$modelDesc)); ?>
