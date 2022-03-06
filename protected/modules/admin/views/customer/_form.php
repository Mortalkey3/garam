<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'cs-customer-form',
    // 'type'=>'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>false,
	),
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>
<?php echo $form->errorSummary($model); ?>
<div class="row-fluid">
	<div class="span8">
		<div class="widget">
		<h4 class="widgettitle">Data Customer</h4>
		<div class="widgetcontent">
			<div class="row-fluid">
				<div class="span4">
					<?php echo $form->textFieldRow($model,'first_name',array('class'=>'span12','maxlength'=>100)); ?>
					<?php echo $form->textFieldRow($model,'last_name',array('class'=>'span12','maxlength'=>100)); ?>
					<?php echo $form->textFieldRow($model,'hp',array('class'=>'span12','maxlength'=>20)); ?>
				</div>
				<div class="span4">
					<?php echo $form->textFieldRow($model,'address',array('class'=>'span12')); ?>
					<?php echo $form->textFieldRow($model,'city',array('class'=>'span12')); ?>
				</div>
				<div class="span4">
					<?php echo $form->textFieldRow($model,'province',array('class'=>'span12')); ?>
					<?php echo $form->textFieldRow($model,'postcode',array('class'=>'span12')); ?>
				</div>
			</div>


		</div>
		</div>

		<div class="alert">
		  <button type="button" class="close" data-dismiss="alert">×</button>
		  <strong>Warning!</strong> Fields with <span class="required">*</span> are required.
		</div>
		
	</div>
	<div class="span4">
		<div class="widgetbox block-rightcontent">                        
		    <div class="headtitle">
		        <h4 class="widgettitle">Action</h4>
		    </div>
		    <div class="widgetcontent">
				<?php $this->widget('bootstrap.widgets.TbButton', array(
					'buttonType'=>'submit',
					'type'=>'primary',
					'label'=>$model->isNewRecord ? 'Simpan dan Tambahkan' : 'Simpan',
					'htmlOptions'=>array('class'=>'btn-large'),
				)); ?>
				<?php $this->widget('bootstrap.widgets.TbButton', array(
					// 'buttonType'=>'submit',
					// 'type'=>'info',
					'url'=>CHtml::normalizeUrl(array('index')),
					'label'=>'Batal',
					'htmlOptions'=>array('class'=>'btn-large'),
				)); ?>
		    </div>
		</div>
		<div class="divider15"></div>
		<div class="widget">
		<h4 class="widgettitle">Data Login</h4>
		<div class="widgetcontent">
			<?php echo $form->textFieldRow($model,'email',array('class'=>'span12','maxlength'=>200)); ?>

			<?php echo $form->passwordFieldRow($model,'pass',array('class'=>'span12','maxlength'=>100)); ?>

			<?php echo $form->passwordFieldRow($model,'pass2',array('class'=>'span12','maxlength'=>100)); ?>

        	<?php echo $form->dropDownListRow($model, 'aktif', array(
        		'1'=>'Aktif',
        		'0'=>'Tidak Aktif',
        	), array('class'=>'span12')); ?>
            <div class="divider5"></div>
			<div class="alert">
			  <button type="button" class="close" data-dismiss="alert">×</button>
			  Kosongkan password jika tidak ingin di ganti
			</div>

		</div>
		</div>
	</div>
</div>


<?php $this->endWidget(); ?>
