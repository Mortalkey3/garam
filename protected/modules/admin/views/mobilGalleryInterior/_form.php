<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'mobil-gallery-interior-form',
    // 'type'=>'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>false,
	),
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

<?php echo $form->errorSummary($model); ?>

<div class="widget">
<h4 class="widgettitle">Data Mobil Gallery Interior</h4>
<div class="widgetcontent">

	<?php echo $form->fileFieldRow($model,'image',array(
	'hint'=>'<b>Note:</b> Image size is 308 x 215px. Larger image will be automatically cropped.', 'style'=>"width: 100%")); ?>
	<?php if ($model->scenario == 'update'): ?>
	<img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(308,215, '/images/mobil_gallery_in/'.$model->image , array('method' => 'resize', 'quality' => '90')) ?>"/>
	<?php endif; ?>
	
	<br>
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
