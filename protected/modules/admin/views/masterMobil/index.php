<?php
$this->breadcrumbs=array(
	'Master Mobil',
);

$this->pageHeader=array(
	'icon'=>'fa fa-car',
	'title'=>'Master Mobil',
	'subtitle'=>'Data Master Mobil',
);

$this->menu=array(
	array('label'=>'Add Master Mobil', 'icon'=>'plus-sign','url'=>array('create')),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php if(Yii::app()->user->hasFlash('success')): ?>

    <?php $this->widget('bootstrap.widgets.TbAlert', array(
        'alerts'=>array('success'),
    )); ?>

<?php endif; ?>
<h1>Master Mobil</h1>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'master-mobil-grid',
	'dataProvider'=>$model->search(),
	// 'filter'=>$model,
	'enableSorting'=>false,
	'summaryText'=>false,
	'type'=>'bordered',
	'columns'=>array(
		// 'id',
		'title',
		// 'content',
		// 'image',
		'harga',
		'harga_cicilan',
		/*
		'active',
		'sort',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{update} &nbsp; {delete}',
		),
	),
)); ?>
