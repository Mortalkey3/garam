<?php
$this->breadcrumbs=array(
	'Poster Popups'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List PosterPopup','url'=>array('index')),
	array('label'=>'Add PosterPopup','url'=>array('create')),
);
?>

<h1>Manage Poster Popups</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'poster-popup-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'nama',
		'image',
		'urutan',
		'aktif',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
