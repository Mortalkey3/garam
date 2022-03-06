<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'mobil-fitur-form',
    // 'type'=>'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>false,
	),
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>
<?php Yii::import('ext.imperavi-redactor-widget.ImperaviRedactorWidget'); ?>
<?php $this->widget('ImperaviRedactorWidget', array(
    'selector' => '.redactor',
    'options' => array(
        'imageUpload'=> $this->createUrl('/admin/setting/imgUpload', array('type'=>'image')),
        'clipboardUploadUrl'=> $this->createUrl('/admin/setting/imgUpload', array('type'=>'clip')),
    ),
)); ?>
<?php echo $form->errorSummary($model); ?>
<div class="row-fluid">
	<div class="span8">
		<div class="widget">
		<h4 class="widgettitle">Data Fitur Mobil</h4>
			<div class="widgetcontent">
				<?php echo $form->textFieldRow($model,'title',array('class'=>'span12','maxlength'=>225)); ?>

				<?php echo $form->textAreaRow($model,'content',array('rows'=>4, 'class'=>'span5 redactor')); ?>
				<div class="divider15"></div>
			</div>
		</div>
		<div class="divider15"></div>
		<div class="alert">
		  <button type="button" class="close" data-dismiss="alert">×</button>
		  <strong>Warning!</strong> Fields with <span class="required">*</span> are required.
		</div>
	</div>
	<div class="span4">
		<div class="widget">
			<h4 class="widgettitle">Action</h4>
			<div class="widgetcontent">
				<?php $this->widget('bootstrap.widgets.TbButton', array(
					'buttonType'=>'submit',
					'type'=>'primary',
					'label'=>$model->isNewRecord ? 'Add' : 'Save',
				)); ?>
				<?php $this->widget('bootstrap.widgets.TbButton', array(
					// 'buttonType'=>'submit',
					// 'type'=>'info',
					'url'=>CHtml::normalizeUrl(array('index', 'category'=>$_GET['category'])),
					'label'=>'Batal',
				)); ?>
			</div>
		</div>
		<div class="divider15"></div>
		<div class="widgetbox block-rightcontent">                        
			    <div class="headtitle">
			        <h4 class="widgettitle">Main Image</h4>
			    </div>
			    <div class="widgetcontent">
					<?php echo $form->fileFieldRow($model,'image',array(
					'hint'=>'<b>Note:</b> Image size is 651 x 503px. Larger image will be automatically cropped.', 'style'=>"width: 100%")); ?>
					<?php if ($model->scenario == 'update'): ?>
					<img style="width: 100%;" src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(600,600, '/images/fitur_mobil/'.$model->image , array('method' => 'resize', 'quality' => '90')) ?>"/>
					<?php endif; ?>
			    </div>
			</div>
	</div>
</div>

<?php $this->endWidget(); ?>
