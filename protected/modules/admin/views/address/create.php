<?php
$this->breadcrumbs=array(
	'Address'=>array('index'),
	'Add',
);

$this->pageHeader=array(
	'icon'=>'fa fa-bank',
	'title'=>'Address',
	'subtitle'=>'Add Address',
);

$this->menu=array(
	array('label'=>'List Address', 'icon'=>'th-list','url'=>array('index')),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>