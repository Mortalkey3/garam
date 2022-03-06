<?php
$this->breadcrumbs=array(
	'Mobil Gallery Interiors'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List MobilGalleryInterior','url'=>array('index')),
	array('label'=>'Add MobilGalleryInterior','url'=>array('create')),
);
?>

<h1>Manage Mobil Gallery Interiors</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'mobil-gallery-interior-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'mobil_id',
		'images',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
