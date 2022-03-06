<?php
$this->breadcrumbs=array(
	'News'=>array('index'),
	'Add',
);

$this->pageHeader=array(
	'icon'=>'fa fa-book',
	'title'=>'News',
	'subtitle'=>'Data News',
);

$this->menu=array(
	array('label'=>'List News', 'icon'=>'th-list','url'=>array('index')),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<div class="row-fluid">
	<div class="span8">
		<h1>Add News</h1>
		<?php echo $this->renderPartial('_form', array('model'=>$model, 'modelDesc'=>$modelDesc)); ?>
	</div>
	<div class="span4">
		<?php //$this->renderPartial('/setting/page_menu') ?>
	</div>
</div>
