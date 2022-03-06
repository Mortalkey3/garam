<?php
$this->breadcrumbs=array(
	'Poster Popups'=>array('index'),
	'Add',
);

$this->pageHeader=array(
	'icon'=>'fa fa-minus',
	'title'=>'Poster Popup',
	'subtitle'=>'Add Poster Popup',
);

$this->menu=array(
	array('label'=>'List Poster Popup', 'icon'=>'th-list','url'=>array('index')),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>