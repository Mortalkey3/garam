<?php
$this->breadcrumbs=array(
	'Poster Popups'=>array('index'),
	// $model->id=>array('view','id'=>$model->id),
	'Edit',
);

$this->pageHeader=array(
	'icon'=>'fa fa-minus',
	'title'=>'PosterPopup',
	'subtitle'=>'Edit PosterPopup',
);

$this->menu=array(
	array('label'=>'List PosterPopup', 'icon'=>'th-list','url'=>array('index')),
	array('label'=>'Add PosterPopup', 'icon'=>'plus-sign','url'=>array('create')),
	// array('label'=>'View PosterPopup', 'icon'=>'pencil','url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>