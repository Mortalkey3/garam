<?php
$this->breadcrumbs=array(
	'Mobil Varians'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List MobilVarian','url'=>array('index')),
	array('label'=>'Add MobilVarian','url'=>array('create')),
);
?>

<h1>Manage Mobil Varians</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'mobil-varian-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'mobil_id',
		'title',
		'content',
		'image',
		'harga',
		/*
		'harga_cicilan',
		'sort',
		'active',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
