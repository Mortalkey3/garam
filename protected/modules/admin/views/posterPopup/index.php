<?php
$this->breadcrumbs=array(
	'Poster Popups',
);

$this->pageHeader=array(
	'icon'=>'fa fa-minus',
	'title'=>'Poster Popup',
	'subtitle'=>'Data Poster Popup',
);

$this->menu=array(
	array('label'=>'Add Poster Popup', 'icon'=>'plus-sign','url'=>array('create')),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php if(Yii::app()->user->hasFlash('success')): ?>

    <?php $this->widget('bootstrap.widgets.TbAlert', array(
        'alerts'=>array('success'),
    )); ?>

<?php endif; ?>
<h1>Poster Popup</h1>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'poster-popup-grid',
	'dataProvider'=>$model->search(),
	// 'filter'=>$model,
	'enableSorting'=>false,
	'summaryText'=>false,
	'type'=>'bordered',
	'columns'=>array(
		// 'id',
		'nama',
		'urutan',
		// 'image',
		// 'aktif',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{update} &nbsp; {delete}',
		),
	),
)); ?>
