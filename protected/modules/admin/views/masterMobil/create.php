<?php
$this->breadcrumbs=array(
	'Master Mobil'=>array('index'),
	'Add',
);

$this->pageHeader=array(
	'icon'=>'fa fa-minus',
	'title'=>'Master Mobil',
	'subtitle'=>'Add Master Mobil',
);

$this->menu=array(
	array('label'=>'List Master Mobil', 'icon'=>'th-list','url'=>array('index')),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>