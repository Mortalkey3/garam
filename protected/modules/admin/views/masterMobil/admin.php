<?php
$this->breadcrumbs=array(
	'Master Mobils'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List MasterMobil','url'=>array('index')),
	array('label'=>'Add MasterMobil','url'=>array('create')),
);
?>

<h1>Manage Master Mobils</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'master-mobil-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'title',
		'content',
		'image',
		'harga',
		'harga_cicilan',
		/*
		'active',
		'sort',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
