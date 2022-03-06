<?php
$this->breadcrumbs=array(
	'Produk Mobils'=>array('index'),
	'Add',
);

$this->pageHeader=array(
	'icon'=>'fa fa-minus',
	'title'=>'ProdukMobil',
	'subtitle'=>'Add ProdukMobil',
);

$this->menu=array(
	array('label'=>'List ProdukMobil', 'icon'=>'th-list','url'=>array('index')),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>