<?php
$this->breadcrumbs=array(
	'Produk Mobils'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List ProdukMobil', 'icon'=>'th-list','url'=>array('index')),
	array('label'=>'Add ProdukMobil', 'icon'=>'plus-sign','url'=>array('create')),
	array('label'=>'Edit ProdukMobil', 'icon'=>'pencil','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete ProdukMobil', 'icon'=>'trash','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>View ProdukMobil #<?php echo $model->id; ?></h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'image1',
		'image2',
		'image3',
		'sort',
	),
)); ?>
