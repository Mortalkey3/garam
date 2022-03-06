<?php
$this->breadcrumbs=array(
	'Filter'=>array('index', 'parent'=>$_GET['parent']),
	// 'Add',
);
$this->pageHeader=array(
	'icon'=>'fa fa-tags',
	'title'=>'Filter',
	'subtitle'=>'Filter Category',
);

$bread = PrdCategory::model()->getBreadcrump($_GET['parent']);
$bread = array_reverse($bread,true);
foreach ($bread as $key => $value) {
	$this->breadcrumbs[$key]=$value;
}
$this->breadcrumbs[]='Add';

$this->menu=array(
	array('label'=>'List Filter', 'icon'=>'th-list','url'=>array('index', 'parent'=>$_GET['parent'])),
);
?>

<div class="row-fluid">
	<div class="span8">

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php echo $this->renderPartial('_form',array('model'=>$model, 'modelDesc'=>$modelDesc)); ?>
	</div>
	<div class="span4">
		<?php $this->renderPartial('_category', array(
			'categoryModel'=>$categoryModel,
			'categoryModelDesc'=>$categoryModelDesc,
			'nestedCategory'=>$nestedCategory,
		)) ?>
	</div>
</div>
