<?php 
	$criteria = new CDbCriteria;
	$criteria->addCondition('t.id = :id');
	$criteria->params[':id'] = $_GET['category'];
	$detailCategory = MasterMobil::model()->find($criteria);
	$titles_subm = $detailCategory->title;
?>
<?php
$this->breadcrumbs=array(
	'Mobil Fitur',
);

$this->pageHeader=array(
	'icon'=>'fa fa-minus',
	'title'=>'Mobil Fitur',
	'subtitle'=>'Data Mobil Fitur > '. $titles_subm
);

$this->menu=array(
	array('label'=>'Back List Master Mobil', 'icon'=>'th-list','url'=>array('/admin/masterMobil/index')),
	array('label'=>'Add Mobil Fitur', 'icon'=>'plus-sign','url'=>array('create', 'category'=>$_GET['category'])),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php if(Yii::app()->user->hasFlash('success')): ?>

    <?php $this->widget('bootstrap.widgets.TbAlert', array(
        'alerts'=>array('success'),
    )); ?>

<?php endif; ?>
<h1>Mobil Fitur > <?php echo $titles_subm ?> </h1>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'mobil-fitur-grid',
	'dataProvider'=>$model->search(),
	// 'filter'=>$model,
	'enableSorting'=>false,
	'summaryText'=>false,
	'type'=>'bordered',
	'columns'=>array(
		// 'id',
		// 'mobil_id',
		'title',
		// 'content',
		// 'image',
		// 'sort',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{update} &nbsp; {delete}',
			'deleteButtonUrl'=>'CHtml::normalizeUrl(array("delete", "id"=>$data->id, "category"=>"'.$_GET['category'].'"))',
			'updateButtonUrl'=>'CHtml::normalizeUrl(array("update", "id"=>$data->id, "category"=>"'.$_GET['category'].'"))',
		),
	),
)); ?>
