<?php
$this->breadcrumbs=array(
	'Master Mobil'=>array('index'),
	// $model->title=>array('view','id'=>$model->id),
	'Edit',
);

$this->pageHeader=array(
	'icon'=>'fa fa-minus',
	'title'=>'Master Mobil',
	'subtitle'=>'Edit Master Mobil',
);

$this->menu=array(
	array('label'=>'List Master Mobil', 'icon'=>'th-list','url'=>array('index')),
	array('label'=>'Add Master Mobil', 'icon'=>'plus-sign','url'=>array('create')),
	// array('label'=>'View Master Mobil', 'icon'=>'pencil','url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>