<?php
$this->breadcrumbs=array(
	'Mobil Fiturs'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List MobilFitur', 'icon'=>'th-list','url'=>array('index')),
	array('label'=>'Add MobilFitur', 'icon'=>'plus-sign','url'=>array('create')),
	array('label'=>'Edit MobilFitur', 'icon'=>'pencil','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete MobilFitur', 'icon'=>'trash','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>View MobilFitur #<?php echo $model->id; ?></h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'mobil_id',
		'title',
		'content',
		'image',
		'sort',
	),
)); ?>
