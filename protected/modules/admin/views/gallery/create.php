<?php
$this->breadcrumbs=array(
	'Industries'=>array('index'),
	'Add',
);

$this->pageHeader=array(
	'icon'=>'fa fa-tag',
	'title'=>'Industries',
	'subtitle'=>'Data Industries',
);

$this->menu=array(
	array('label'=>'List Industries', 'icon'=>'th-list','url'=>array('index')),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php echo $this->renderPartial('_form', array('model'=>$model, 'modelDesc'=>$modelDesc, 'modelImage'=>$modelImage)); ?>
