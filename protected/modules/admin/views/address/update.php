<?php
$this->breadcrumbs=array(
	'Address'=>array('index'),
	// $model->id=>array('view','id'=>$model->id),
	'Edit',
);

$this->pageHeader=array(
	'icon'=>'fa fa-bank',
	'title'=>'Address',
	'subtitle'=>'Edit Address',
);

$this->menu=array(
	array('label'=>'List Address', 'icon'=>'th-list','url'=>array('index')),
	array('label'=>'Add Address', 'icon'=>'plus-sign','url'=>array('create')),
	// array('label'=>'View Address', 'icon'=>'pencil','url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>