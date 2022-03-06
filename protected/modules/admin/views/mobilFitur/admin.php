<?php
$this->breadcrumbs=array(
	'Mobil Fiturs'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List MobilFitur','url'=>array('index')),
	array('label'=>'Add MobilFitur','url'=>array('create')),
);
?>

<h1>Manage Mobil Fiturs</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'mobil-fitur-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'mobil_id',
		'title',
		'content',
		'image',
		'sort',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
