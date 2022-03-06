<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'produk-mobil-form',
    'type'=>'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>false,
	),
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

<?php echo $form->errorSummary($model); ?>

<div class="widget">
<h4 class="widgettitle">Data ProdukMobil</h4>
<div class="widgetcontent">


	<?php echo $form->textFieldRow($model,'title',array('class'=>'span5','maxlength'=>225)); ?>
	
	<?php echo $form->textFieldRow($model,'thumb',array('class'=>'span5','maxlength'=>225)); ?>
	
	<?php echo $form->textFieldRow($model,'varian',array('class'=>'span5','maxlength'=>225)); ?>

	<?php echo $form->textFieldRow($model,'image1',array('class'=>'span5','maxlength'=>225)); ?>

	<?php echo $form->textFieldRow($model,'image2',array('class'=>'span5','maxlength'=>225)); ?>

	<?php echo $form->textFieldRow($model,'image3',array('class'=>'span5','maxlength'=>225)); ?>

	<?php echo $form->textFieldRow($model,'sort',array('class'=>'span5')); ?>

		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Add' : 'Save',
		)); ?>
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			// 'buttonType'=>'submit',
			// 'type'=>'info',
			'url'=>CHtml::normalizeUrl(array('index')),
			'label'=>'Batal',
		)); ?>
</div>
</div>
<div class="alert">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <strong>Warning!</strong> Fields with <span class="required">*</span> are required.
</div>

<?php $this->endWidget(); ?>
