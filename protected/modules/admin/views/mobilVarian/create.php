<?php
$this->breadcrumbs=array(
	'Mobil Varian'=>array('index'),
	'Add',
);

$this->pageHeader=array(
	'icon'=>'fa fa-minus',
	'title'=>'Mobil Varian',
	'subtitle'=>'Add Mobil Varian',
);

$this->menu=array(
	array('label'=>'List Mobil Varian', 'icon'=>'th-list','url'=>array('index', 'category'=>$_GET['category'])),
);
?>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>