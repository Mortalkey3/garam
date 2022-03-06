<div class="row-fluid">
	<div class="span8">
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'bank-form',
    // 'type'=>'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>false,
	),
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

<?php echo $form->errorSummary($model); ?>

<div class="widget">
<h4 class="widgettitle">Data Address</h4>
<div class="widgetcontent">

	<div class="row-fluid">
		<div class="span8">
					<?php /*
			<?php echo $form->labelEx($model, 'category_id'); ?>
			<div class="controls">
				<select id="category_id" name="Address[category_id]" class="input-block-level">
					<?php 
					$dataCategory = (PrdCategory::model()->categoryTree('addresscat', $this->languageID));
					?>
					<option value="">---- Choose Category ----</option>
					<?php echo PrdCategory::model()->createOption($dataCategory) ?>
					<option value="">---- Choose Category ----</option>
					<?php foreach ($dataCategory as $key => $value): ?>
						<?php if (count($value['children']) > 0): ?>
						<optgroup label="<?php echo $value['title'] ?>">
							<?php foreach ($value['children'] as $k => $v): ?>
							<option value="<?php echo $v['id'] ?>"><?php echo $v['title'] ?></option>
							<?php endforeach ?>
						</optgroup>
						<?php else: ?>
						<option value="<?php echo $value['id'] ?>"><?php echo $value['title'] ?></option>
						<?php endif ?>
					<?php endforeach ?>
				</select>
			</div>
			<script type="text/javascript">
			jQuery('#category_id').val('<?php echo $model->category_id ?>');
			</script>
					*/ ?>

			<?php echo $form->textFieldRow($model,'kota',array('class'=>'span12')); ?>
			
			<?php echo $form->textFieldRow($model,'nama',array('class'=>'span12')); ?>

			<?php echo $form->textFieldRow($model,'address_1',array('class'=>'span12')); ?>

			<?php echo $form->textFieldRow($model,'address_2',array('class'=>'span12')); ?>

			<?php echo $form->textFieldRow($model,'telp',array('class'=>'span12')); ?>

			<?php echo $form->textFieldRow($model,'fax',array('class'=>'span12')); ?>

			<?php echo $form->textFieldRow($model,'email',array('class'=>'span12')); ?>

		</div>
		<div class="span4">
			<?php /*
			<?php echo $form->fileFieldRow($model,'image',array(
			'hint'=>'<b>Note:</b> Image size is 509 x 458px. Larger image will be automatically cropped.', 'style'=>"width: 100%")); ?>
			<?php if ($model->scenario == 'update'): ?>
			<img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(307,150, '/images/address/'.$model->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>"/>
			<?php endif; ?>
			<br>
			*/ ?>
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
</div>
	<div class="span4">
		<?php $this->renderPartial('/setting/page_menu') ?>
	</div>
</div>