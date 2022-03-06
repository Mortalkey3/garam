<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'mobil-varian-form',
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

<div class="widget">
	<div class="row-fluid">
		<div class="span8">
			<div class="widgetbox block-rightcontent">                        
			    <div class="headtitle">
			        <h4 class="widgettitle">Data Mobil Varian</h4>
			    </div>
			    <div class="widgetcontent">
			    <div class="control-group">
				    <?php echo $form->labelEx($model, 'title'); ?>
				    <?php echo $form->textField($model,'title',array('class'=>'span12','maxlength'=>225)); ?>	
			    </div>
			    <div class="control-group">
				    <?php echo $form->labelEx($model, 'content'); ?>
				    <?php echo $form->textArea($model,'content',array('class'=>'redactor','rows'=>4)); ?>	
			    </div>
			<div class="divider10"></div>
			<div class="row-fluid">
				<div class="span6">
					<div class="control-group">
					    <?php echo $form->labelEx($model, 'harga'); ?>
					    <?php echo $form->textField($model,'harga',array('class'=>'span12','maxlength'=>225)); ?>	
				    </div>
			    	<div class="divider10"></div>
			    	<div class="control-group">
			    		<?php echo $form->labelEx($model, 'sort'); ?>
						<?php echo $form->textField($model,'sort',array('class'=>'input-block-level field span12', 'placeholder'=>'Urutan Mobil')); ?>
					</div>
				</div>
				<div class="span6">
					<div class="control-group">
					    <?php echo $form->labelEx($model, 'harga_cicilan'); ?>
					    <?php echo $form->textField($model,'harga_cicilan',array('class'=>'span12','maxlength'=>225)); ?>	
				    </div>
				    <div class="divider10"></div>
				    <div class="control-group">
				    <?php echo $form->labelEx($model, 'active'); ?>
		        	<?php echo $form->dropDownList($model, 'active', array(
		        		'1'=>'Show',
		        		'0'=>'Hide',
		        	), array('class'=>'span12')); ?>
		        	</div>
				</div>
			</div>
			</div>
		</div>
	</div>
		<!-- right content -->
		<div class="span4">
			<div class="widgetbox block-rightcontent">                        
		   		<div class="headtitle">
		        <h4 class="widgettitle">Action</h4>
			    </div>
			    <div class="widgetcontent">
					<?php $this->widget('bootstrap.widgets.TbButton', array(
						'buttonType'=>'submit',
						'type'=>'primary',
						'label'=>$model->isNewRecord ? 'Save And Add Item' : 'Save Item',
						'htmlOptions'=>array('class'=>'btn-large'),
					)); ?>
					<?php $this->widget('bootstrap.widgets.TbButton', array(
						// 'buttonType'=>'submit',
						// 'type'=>'info',
						'url'=>CHtml::normalizeUrl(array('index', 'category'=> $_GET['category'])),
						'label'=>'Cancel',
						'htmlOptions'=>array('class'=>'btn-large'),
					)); ?>
			    </div>
			</div>
			<div class="divider15"></div>
			<div class="widgetbox block-rightcontent">                        
			    <div class="headtitle">
			        <h4 class="widgettitle">Image</h4>
			    </div>
			    <div class="widgetcontent">
					<?php echo $form->fileFieldRow($model,'image',array(
					'hint'=>'<b>Note:</b> Image size is 1388 x 612px. Larger image will be automatically cropped.', 'style'=>"width: 100%")); ?>
					<?php if ($model->scenario == 'update'): ?>
					<img style="width: 100%;" src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(600,600, '/images/mobil_varian/'.$model->image , array('method' => 'resize', 'quality' => '90')) ?>"/>
					<?php endif; ?>
			    </div>
			</div>
			
			<!-- end widgetbox -->
		</div>
	</div>

</div>
<div class="alert">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <strong>Warning!</strong> Fields with <span class="required">*</span> are required.
</div>

<?php $this->endWidget(); ?>
<script type="text/javascript">
if (typeof RedactorPlugins === 'undefined') var RedactorPlugins = {};

RedactorPlugins.advanced = {
    init: function()
    {
        alert(1);
    }
}
jQuery(function( $ ) {
	$('.multilang').multiLang({
	});
})
</script>