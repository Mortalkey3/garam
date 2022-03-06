<?php
$this->breadcrumbs=array(
	'Produk Mobils'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List ProdukMobil','url'=>array('index')),
	array('label'=>'Add ProdukMobil','url'=>array('create')),
);
?>

<h1>Manage Produk Mobils</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'produk-mobil-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'title',
		'image1',
		'image2',
		'image3',
		'sort',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
