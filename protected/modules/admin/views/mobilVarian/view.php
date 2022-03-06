<?php
$this->breadcrumbs=array(
	'Mobil Varians'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List MobilVarian', 'icon'=>'th-list','url'=>array('index')),
	array('label'=>'Add MobilVarian', 'icon'=>'plus-sign','url'=>array('create')),
	array('label'=>'Edit MobilVarian', 'icon'=>'pencil','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete MobilVarian', 'icon'=>'trash','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>View MobilVarian #<?php echo $model->id; ?></h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'mobil_id',
		'title',
		'content',
		'image',
		'harga',
		'harga_cicilan',
		'sort',
		'active',
	),
)); ?>
