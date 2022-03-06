<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'poster-popup-form',
    'type'=>'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>false,
	),
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

<?php echo $form->errorSummary($model); ?>

<div class="widget">
<h4 class="widgettitle">Data PosterPopup</h4>
<div class="widgetcontent">
	<?php echo $form->textFieldRow($model,'nama',array('class'=>'span5','maxlength'=>225)); ?>

	<?php echo $form->textFieldRow($model,'urutan',array('class'=>'span5', 'hint'=> '*) Note mulai dari angka kecil ke besar, examp. 1, 3, 5, 7 ...')); ?>

	<?php echo $form->dropDownListRow($model, 'aktif', array(
												        		'1'=>'Di Tampilkan',
												        		'0'=>'Di Sembunyikan',
												        	)); ?>
<?php if ($model->scenario == 'update'): ?>
	<?php echo $form->fileFieldRow($model,'image',array(
		'hint'=>'<b>Note:</b> Image size is 768 x 768px. Larger image will be automatically cropped.', 'style'=>"width: 100%")); ?>
<?php else: ?>
	<?php echo $form->fileFieldRow($model,'image',array(
		'hint'=>'<b>Note:</b> Image size is 768 x 768px. Larger image will be automatically cropped.', 'style'=>"width: 100%", 'required'=>'required')); ?>
<?php endif ?>
		<div class="control-group">
			<div class="controls">
				<?php if ($model->scenario == 'update'): ?>
				<img style="width: 100%; max-width: 250px;" src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(768,768, '/images/poster/'.$model->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>"/>
				<?php endif; ?>
			</div>
		</div>


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
