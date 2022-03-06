<?php
$this->breadcrumbs=array(
	'Certificates',
);

$this->pageHeader=array(
	'icon'=>'fa fa-bank',
	'title'=>'Certificates',
	'subtitle'=>'Data Certificates',
);

$this->menu=array(
	array('label'=>'Add Certificates', 'icon'=>'plus-sign','url'=>array('create')),
);
?>
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
<div class="row-fluid">
		<div class="span4">
			<label class="required" for="Pdf_category_id">Category</label>
			<select id="Pdf_category_id" name="Pdf[category_id]" class="input-block-level span12">
				<option value="">--- Choose Category ---</option>
				<option value="1" <?php if (isset($_GET['Pdf']['category_id']) AND $_GET['Pdf']['category_id'] == 1): ?>selected="selected"<?php endif ?>>Technical Info</option>
				<option value="2" <?php if (isset($_GET['Pdf']['category_id']) AND $_GET['Pdf']['category_id'] == 2): ?>selected="selected"<?php endif ?>>Awards</option>
			</select>
		</div>
		<div class="span4">
			<label>&nbsp;</label>
			<?php $this->widget('bootstrap.widgets.TbButton', array(
				'buttonType'=>'submit',
				'type'=>'primary',
				'label'=>'Search',
			)); ?>
			<?php $this->widget('bootstrap.widgets.TbButton', array(
				// 'buttonType'=>'button',
				'type'=>'primary',
				'label'=>'Reset',
				'url'=>Yii::app()->createUrl($this->route),
			)); ?>
		</div>
	</div>
<?php $this->endWidget(); ?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php if(Yii::app()->user->hasFlash('success')): ?>
    <?php $this->widget('bootstrap.widgets.TbAlert', array(
        'alerts'=>array('success'),
    )); ?>
<?php endif; ?>
<div class="row-fluid">
	<div class="span8">
<h1>PDF</h1>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'bank-grid',
	'dataProvider'=>$model->search(),
	// 'filter'=>$model,
	'enableSorting'=>false,
	'summaryText'=>false,
	'type'=>'bordered',
	'columns'=>array(
		// 'id',
		array(
			'header'=> 'Kategori',
			'type'=> 'raw',
			'value'=> '($data->category_id == 1)?"Technical Info" :"Awards"',
		),
		'nama',
		'sort',
		'file',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{update} &nbsp; {delete}',
			// 'deleteButtonUrl'=>'CHtml::normalizeUrl(array("delete", "id"=>$data->id, "category"=>"'.$_GET['category'].'"))',
			// 'updateButtonUrl'=>'CHtml::normalizeUrl(array("update", "id"=>$data->id, "category"=>"'.$_GET['category'].'"))',
		),
	),
)); ?>
</div>
	<div class="span4">
		<?php $this->renderPartial('/setting/page_menu') ?>
	</div>
</div>