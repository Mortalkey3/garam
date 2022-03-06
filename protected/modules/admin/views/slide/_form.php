<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'slide-form',
    // 'type'=>'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>false,
	),
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>
<div class="row-fluid">
	<div class="span8">
	<?php if ($model->scenario == 'update'): ?>
	<h1>Edit Slide</h1>
	<?php else: ?>
	<h1>Add Slide</h1>
	<?php endif ?>
	<div class="widget">
		<!-- <h4 class="widgettitle">Data Pages</h4> -->
		<div class="widgetcontent">

			<div class="multilang pj-form-langbar">
				<?php foreach (Language::model()->getLanguage() as $key => $value): ?>
				<a href="#" data-index="<?php echo $value->id ?>" data-abbr="<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$value->code.'.png' ?>" class="pj-form-langbar-item <?php if ($value->code==$this->setting['lang_deff']): ?>pj-form-langbar-item-active<?php endif ?>"><abbr style="background-image: url(<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$value->code.'.png' ?>);"></abbr></a>
				<?php endforeach ?>
			</div>
			<div class="divider5"></div>

			<?php echo $form->errorSummary($model); ?>
			<?php echo $form->errorSummary($modelDesc, 'Please fix the following input errors:', 'Periksa di semua bahasa'); ?>
			<?php if(Yii::app()->user->hasFlash('success')): ?>
			
			    <?php $this->widget('bootstrap.widgets.TbAlert', array(
			        'alerts'=>array('success'),
			    )); ?>
			
			<?php endif; ?>

			<?php Yii::import('ext.imperavi-redactor-widget.ImperaviRedactorWidget'); ?>
			<?php $this->widget('ImperaviRedactorWidget', array(
			    'selector' => '.redactor',
			    'options' => array(
			        'imageUpload'=> $this->createUrl('/admin/setting/imgUpload', array('type'=>'image')),
			        'clipboardUploadUrl'=> $this->createUrl('/admin/setting/imgUpload', array('type'=>'clip')),
			    ),
			    'plugins' => array(
			        'clips' => array(
			        ),
			    ),
			)); ?>
<?php
$criteria2=new CDbCriteria;
$criteria2->with = array('description');
$criteria2->order = 'date DESC';
$criteria2->addCondition('status = "1"');
$criteria2->addCondition('description.language_id = :language_id');
$criteria2->params[':language_id'] = 2;
// $criteria2->select = "t.id, description.name";
$criteria2->group = 't.id';
$dataProduct = PrdProduct::model()->findAll($criteria2);
$dataArray = array();
foreach ($dataProduct as $key => $value) {
	$dataArray[$value->id] = $value->description->name;
}
?>

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
			<?php /*<div class="row-fluid">
				<div class="span6">
		        	<?php 
		        	// echo $form->dropDownListRow($model, 'type', array(
		        	// 	'0'=>'Image',
		        	// 	'1'=>'Product',
		        	// ), array('class'=>'span11'));
		        	 ?>
				</div>
				<div class="span6">
					<?php // echo $form->dropDownListRow($model, 'product_id', $dataArray, array('class'=>'span11')); ?>
				</div>
			</div>
			<div class="divider10"></div>*/ ?>
        	
<script type="text/javascript">
  jQuery('select').select2();
</script>
			<?php
			foreach ($modelDesc as $key => $value) {
				$lang = Language::model()->getName($key);
				?>
				<div class="pj-multilang-wrap myLanguage control-group" style="display: <?php if ($key==$this->setting['lang_deff']): ?>block<?php else: ?>none<?php endif ?>;" data-id="<?php echo $lang->id ?>">

				<?php
				echo $form->labelEx($value, '['.$lang->code.']title');
			    echo $form->textField($value,'['.$lang->code.']title',array('class'=>'span8'));
			    ?>
			    <span class="pj-multilang-input"><img src="<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$lang->code.'.png' ?>"></span>
			    <span class="help-inline _em_" style="display: none;">Please correct the error</span>
				</div>
				
				
				<div class="pj-multilang-wrap myLanguage control-group" style="display: <?php if ($key==$this->setting['lang_deff']): ?>block<?php else: ?>none<?php endif ?>;" data-id="<?php echo $lang->id ?>">

				<?php
				echo $form->labelEx($value, '['.$lang->code.']subtitle');
			    echo $form->textArea($value,'['.$lang->code.']subtitle',array('class'=>'span10 redactor'));
			    ?>
			    <span class="pj-multilang-input"><img src="<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$lang->code.'.png' ?>"></span>
			    <span class="help-inline _em_" style="display: none;">Please correct the error</span>
				</div>

				<div class="pj-multilang-wrap myLanguage control-group" style="display: <?php if ($key==$this->setting['lang_deff']): ?>block<?php else: ?>none<?php endif ?>;" data-id="<?php echo $lang->id ?>">
				
				<?php
				echo $form->labelEx($value, '['.$lang->code.']content');
			    echo $form->textArea($value,'['.$lang->code.']content',array('class'=>'span10 redactor'));
			    ?>
			    <span class="pj-multilang-input"><img src="<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$lang->code.'.png' ?>"></span>
			    <span class="help-inline _em_" style="display: none;">Please correct the error</span>
				</div>

				<div class="pj-multilang-wrap myLanguage control-group" style="display: <?php if ($key==$this->setting['lang_deff']): ?>block<?php else: ?>none<?php endif ?>;" data-id="<?php echo $lang->id ?>">

				<?php
				echo $form->labelEx($value, '['.$lang->code.']url_teks');
			    echo $form->textField($value,'['.$lang->code.']url_teks',array('class'=>'span8'));
			    ?>
			    <span class="pj-multilang-input"><img src="<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$lang->code.'.png' ?>"></span>
			    <span class="help-inline _em_" style="display: none;">Please correct the error</span>
				</div>
				<?php /*(
				*/ ?>

				<div class="pj-multilang-wrap myLanguage control-group" style="display: <?php if ($key==$this->setting['lang_deff']): ?>block<?php else: ?>none<?php endif ?>;" data-id="<?php echo $lang->id ?>">

				<?php
				echo $form->labelEx($value, '['.$lang->code.']url');
			    echo $form->textField($value,'['.$lang->code.']url',array('class'=>'span8'));
			    ?>
			    <span class="pj-multilang-input"><img src="<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$lang->code.'.png' ?>"></span>
			    <span class="help-inline _em_" style="display: none;">Please correct the error</span>
				</div>
			    <?php
			}
			?>
        	<?php echo $form->dropDownListRow($model, 'hide_text', array(
        		0=>'Tampil',
        		1=>'Sembunyikan',
        	)); ?>

        	<?php echo $form->dropDownListRow($model, 'active', array(
        		'1'=>'Di Tampilkan',
        		'0'=>'Di Sembunyikan',
        	)); ?>
		</div>
	<!-- span 12 -->
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
				<?php /*<?php if ($model->scenario == 'update'): ?>
				<?php $this->widget('bootstrap.widgets.TbButton', array(
					// 'buttonType'=>'submit',
					// 'type'=>'info',
					'url'=>CHtml::normalizeUrl(array('create', 'copy'=>$model->id)),
					'label'=>'Copy',
					'htmlOptions'=>array('class'=>'btn-large'),
				)); ?>
				<?php endif ?>*/?>
		    </div>
		</div>
		<div class="divider15"></div>
		<div class="widgetbox block-rightcontent">                        
		    <div class="headtitle">
		        <h4 class="widgettitle">Gambar</h4>
		    </div>
		    <div class="widgetcontent">
				<?php echo $form->fileFieldRow($model,'image',array(
				'hint'=>'<b>Note:</b> Image size is 1497 x 720px. Larger image will be automatically cropped.', 'style'=>"width: 100%")); ?>
				<?php if ($model->scenario == 'update'): ?>
				<img style="width: 100%;" src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(1497,720, '/images/'.$model->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>"/>
				<?php endif; ?>
		    </div>
		</div>

		<div class="divider15"></div>
		<div class="widgetbox block-rightcontent">                        
		    <div class="headtitle">
		        <h4 class="widgettitle">Gambar Mobile</h4>
		    </div>
		    <div class="widgetcontent">
				<?php echo $form->fileFieldRow($model,'image2',array(
				'hint'=>'<b>Note:</b> Image size is 774 x 867px. Larger image will be automatically cropped.', 'style'=>"width: 100%")); ?>
				<?php if ($model->scenario == 'update'): ?>
				<img style="width: 100%;" src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(774,867, '/images/'.$model->image2 , array('method' => 'adaptiveResize', 'quality' => '90')) ?>"/>
				<?php endif; ?>
		    </div>
		</div>

	</div>
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
