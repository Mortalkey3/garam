<?php
$this->breadcrumbs=array(
	'Produk Mobils'=>array('index'),
	// $model->title=>array('view','id'=>$model->id),
	'Edit',
);

$this->pageHeader=array(
	'icon'=>'fa fa-minus',
	'title'=>'ProdukMobil',
	'subtitle'=>'Edit ProdukMobil',
);

$this->menu=array(
	array('label'=>'List ProdukMobil', 'icon'=>'th-list','url'=>array('index')),
	array('label'=>'Add ProdukMobil', 'icon'=>'plus-sign','url'=>array('create')),
	// array('label'=>'View ProdukMobil', 'icon'=>'pencil','url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>