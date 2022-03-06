<?php
$this->breadcrumbs=array(
	'Produk Mobils',
);

$this->pageHeader=array(
	'icon'=>'fa fa-minus',
	'title'=>'ProdukMobil',
	'subtitle'=>'Data ProdukMobil',
);

$this->menu=array(
	array('label'=>'Add ProdukMobil', 'icon'=>'th-list','url'=>array('create')),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php if(Yii::app()->user->hasFlash('success')): ?>

    <?php $this->widget('bootstrap.widgets.TbAlert', array(
        'alerts'=>array('success'),
    )); ?>

<?php endif; ?>
<h1>ProdukMobil</h1>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'produk-mobil-grid',
	'dataProvider'=>$model->search(),
	// 'filter'=>$model,
	'enableSorting'=>false,
	'summaryText'=>false,
	'type'=>'bordered',
	'columns'=>array(
		// 'id',
		'title',
		// 'image1',
		// 'image2',
		// 'image3',
		'sort',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{update} &nbsp; {delete}',
		),
	),
)); ?>
