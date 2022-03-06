<?php
$this->breadcrumbs=array(
	'setting'=>array('/admin/setting/index'),
	'About Us Edit',
);

$this->pageHeader=array(
	'icon'=>'fa fa-home',
	'title'=>'About Us',
	'subtitle'=>'About Us Edit',
);
?>
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'setting-form',
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
        'imageUpload'=> $this->createUrl('admin/setting/uploadimage', array('type'=>'image')),
        'clipboardUploadUrl'=> $this->createUrl('admin/setting/uploadimage', array('type'=>'clip')),
    ),
    'plugins' => array(
        'clips' => array(
        ),
    ),
)); ?>

<div class="row-fluid">
	<div class="span12">
		<div class="widget">
		<h4 class="widgettitle">Section 1</h4>
		<div class="widgetcontent">
			<div class="multilang pj-form-langbar">
				<?php foreach (Language::model()->getLanguage() as $key => $value): ?>
				<a href="#" data-index="<?php echo $value->id ?>" data-abbr="<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$value->code.'.png' ?>" class="pj-form-langbar-item <?php if ($value->code==$this->setting['lang_deff']): ?>pj-form-langbar-item-active<?php endif ?>"><abbr style="background-image: url(<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$value->code.'.png' ?>);"></abbr></a>
				<?php endforeach ?>
			</div>
			<div class="divider5"></div>

				<?php if(Yii::app()->user->hasFlash('success')): ?>
				
				    <?php $this->widget('bootstrap.widgets.TbAlert', array(
				        'alerts'=>array('success'),
				    )); ?>
				
				<?php endif; ?>

				<div class="row-fluid">
					<div class="span12">
					<?php $type = 'about_hero_title'; ?>
						<?php Common::createSetting($type, 'Title', 'text', 'y') ?>
						<?php foreach (Language::model()->getLanguage() as $key => $value): ?>
							<div class="pj-multilang-wrap myLanguage control-group" style="display: <?php if ($value->code==$this->setting['lang_deff']): ?>block<?php else: ?>none<?php endif ?>;" data-id="<?php echo $value->id ?>">
								<label class="control-label required" for="Setting_<?php echo $type ?>_<?php echo $value->code ?>"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
								<input value="<?php echo $model[$type]['desc'][$value->code]->value ?>" type="text" id="Setting_<?php echo $type ?>_<?php echo $value->code ?>" name="Setting[<?php echo $type ?>][<?php echo $value->code ?>]" class="span10">

							    <span class="pj-multilang-input"><img src="<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$value->code.'.png' ?>"></span>
							    <span class="help-inline _em_" style="display: none;">Please correct the error</span>
							</div>
						<?php endforeach ?>
					</div>
				</div>
				<div class="divider5"></div>
				<div class="row-fluid">
					<div class="span12">
						<?php $type = 'about_hero_sub_title'; ?>
						<?php Common::createSetting($type, 'Sub Title', 'text', 'y') ?>
						<?php foreach (Language::model()->getLanguage() as $key => $value): ?>
							<div class="pj-multilang-wrap myLanguage control-group" style="display: <?php if ($value->code==$this->setting['lang_deff']): ?>block<?php else: ?>none<?php endif ?>;" data-id="<?php echo $value->id ?>">
								<label class="control-label required" for="Setting_<?php echo $type ?>_<?php echo $value->code ?>"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
								<textarea id="Setting_<?php echo $type ?>_<?php echo $value->code ?>" name="Setting[<?php echo $type ?>][<?php echo $value->code ?>]" class="span10"><?php echo $model[$type]['desc'][$value->code]->value ?></textarea>

							    <span class="pj-multilang-input"><img src="<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$value->code.'.png' ?>"></span>
							    <span class="help-inline _em_" style="display: none;">Please correct the error</span>
							</div>
						<?php endforeach ?>
					</div>
				</div>
				<div class="divider5"></div>
				<div class="row-fluid">
					<div class="span12">
						<?php $type = 'about_hero_content'; ?>
						<?php Common::createSetting($type, 'Content', 'text', 'y') ?>
						<?php foreach (Language::model()->getLanguage() as $key => $value): ?>
							<div class="pj-multilang-wrap myLanguage control-group" style="display: <?php if ($value->code==$this->setting['lang_deff']): ?>block<?php else: ?>none<?php endif ?>;" data-id="<?php echo $value->id ?>">
								<label class="control-label required" for="Setting_<?php echo $type ?>_<?php echo $value->code ?>"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
								<textarea id="Setting_<?php echo $type ?>_<?php echo $value->code ?>" name="Setting[<?php echo $type ?>][<?php echo $value->code ?>]" class="span5 redactor"><?php echo $model[$type]['desc'][$value->code]->value ?></textarea>

							    <span class="pj-multilang-input"><img src="<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$value->code.'.png' ?>"></span>
							    <span class="help-inline _em_" style="display: none;">Please correct the error</span>
							</div>
						<?php endforeach ?>
					</div>
				</div>

				<?php $this->widget('bootstrap.widgets.TbButton', array(
					'buttonType'=>'submit',
					'type'=>'primary',
					'label'=>'Save',
				)); ?>
		</div>
		</div>

		<div class="widget">
			<h4 class="widgettitle">Section History</h4>
			<div class="widgetcontent">
				<div class="row-fluid">
					<div class="span12">
					<?php $type = 'history_title'; ?>
						<?php Common::createSetting($type, 'Title', 'text', 'y') ?>
						<?php foreach (Language::model()->getLanguage() as $key => $value): ?>
							<div class="pj-multilang-wrap myLanguage control-group" style="display: <?php if ($value->code==$this->setting['lang_deff']): ?>block<?php else: ?>none<?php endif ?>;" data-id="<?php echo $value->id ?>">
								<label class="control-label required" for="Setting_<?php echo $type ?>_<?php echo $value->code ?>"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
								<input value="<?php echo $model[$type]['desc'][$value->code]->value ?>" type="text" id="Setting_<?php echo $type ?>_<?php echo $value->code ?>" name="Setting[<?php echo $type ?>][<?php echo $value->code ?>]" class="span10">

							    <span class="pj-multilang-input"><img src="<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$value->code.'.png' ?>"></span>
							    <span class="help-inline _em_" style="display: none;">Please correct the error</span>
							</div>
						<?php endforeach ?>
					</div>
				</div>
				<div class="divider5"></div>
				<div class="row-fluid">
					<div class="span12">
						<?php $type = 'history_sub_title'; ?>
						<?php Common::createSetting($type, 'Sub Title', 'text', 'y') ?>
						<?php foreach (Language::model()->getLanguage() as $key => $value): ?>
							<div class="pj-multilang-wrap myLanguage control-group" style="display: <?php if ($value->code==$this->setting['lang_deff']): ?>block<?php else: ?>none<?php endif ?>;" data-id="<?php echo $value->id ?>">
								<label class="control-label required" for="Setting_<?php echo $type ?>_<?php echo $value->code ?>"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
								<textarea id="Setting_<?php echo $type ?>_<?php echo $value->code ?>" name="Setting[<?php echo $type ?>][<?php echo $value->code ?>]" class="span10"><?php echo $model[$type]['desc'][$value->code]->value ?></textarea>

							    <span class="pj-multilang-input"><img src="<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$value->code.'.png' ?>"></span>
							    <span class="help-inline _em_" style="display: none;">Please correct the error</span>
							</div>
						<?php endforeach ?>
					</div>
				</div>
				<div class="divider5"></div>
				<div class="row-fluid">
					<div class="span12">
						<?php $type = 'history_content'; ?>
						<?php Common::createSetting($type, 'Content', 'text', 'y') ?>
						<?php foreach (Language::model()->getLanguage() as $key => $value): ?>
							<div class="pj-multilang-wrap myLanguage control-group" style="display: <?php if ($value->code==$this->setting['lang_deff']): ?>block<?php else: ?>none<?php endif ?>;" data-id="<?php echo $value->id ?>">
								<label class="control-label required" for="Setting_<?php echo $type ?>_<?php echo $value->code ?>"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
								<textarea id="Setting_<?php echo $type ?>_<?php echo $value->code ?>" name="Setting[<?php echo $type ?>][<?php echo $value->code ?>]" class="span5 redactor"><?php echo $model[$type]['desc'][$value->code]->value ?></textarea>

							    <span class="pj-multilang-input"><img src="<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$value->code.'.png' ?>"></span>
							    <span class="help-inline _em_" style="display: none;">Please correct the error</span>
							</div>
						<?php endforeach ?>
					</div>
				</div>
				<?php $this->widget('bootstrap.widgets.TbButton', array(
					'buttonType'=>'submit',
					'type'=>'primary',
					'label'=>'Save',
				)); ?>
			</div>
		</div>

		<div class="widget">
			<h4 class="widgettitle">Section Development</h4>
			<div class="widgetcontent">
				<div class="row-fluid">
					<div class="span12">
					<?php $type = 'develop_title'; ?>
						<?php Common::createSetting($type, 'Title', 'text', 'y') ?>
						<?php foreach (Language::model()->getLanguage() as $key => $value): ?>
							<div class="pj-multilang-wrap myLanguage control-group" style="display: <?php if ($value->code==$this->setting['lang_deff']): ?>block<?php else: ?>none<?php endif ?>;" data-id="<?php echo $value->id ?>">
								<label class="control-label required" for="Setting_<?php echo $type ?>_<?php echo $value->code ?>"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
								<input value="<?php echo $model[$type]['desc'][$value->code]->value ?>" type="text" id="Setting_<?php echo $type ?>_<?php echo $value->code ?>" name="Setting[<?php echo $type ?>][<?php echo $value->code ?>]" class="span10">

							    <span class="pj-multilang-input"><img src="<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$value->code.'.png' ?>"></span>
							    <span class="help-inline _em_" style="display: none;">Please correct the error</span>
							</div>
						<?php endforeach ?>
					</div>
				</div>
				<div class="divider5"></div>
				<div class="row-fluid">
					<div class="span12">
						<?php $type = 'develop_content'; ?>
						<?php Common::createSetting($type, 'Content', 'text', 'y') ?>
						<?php foreach (Language::model()->getLanguage() as $key => $value): ?>
							<div class="pj-multilang-wrap myLanguage control-group" style="display: <?php if ($value->code==$this->setting['lang_deff']): ?>block<?php else: ?>none<?php endif ?>;" data-id="<?php echo $value->id ?>">
								<label class="control-label required" for="Setting_<?php echo $type ?>_<?php echo $value->code ?>"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
								<textarea id="Setting_<?php echo $type ?>_<?php echo $value->code ?>" name="Setting[<?php echo $type ?>][<?php echo $value->code ?>]" class="span5 redactor"><?php echo $model[$type]['desc'][$value->code]->value ?></textarea>

							    <span class="pj-multilang-input"><img src="<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$value->code.'.png' ?>"></span>
							    <span class="help-inline _em_" style="display: none;">Please correct the error</span>
							</div>
						<?php endforeach ?>
					</div>
				</div>
				<?php $this->widget('bootstrap.widgets.TbButton', array(
					'buttonType'=>'submit',
					'type'=>'primary',
					'label'=>'Save',
				)); ?>
			</div>
		</div>

		<div class="widget">
		<h4 class="widgettitle">Section Our Value</h4>
			<div class="widgetcontent">
				<div class="row-fluid">
					<div class="span12">
					<?php $type = 'ourval_title'; ?>
						<?php Common::createSetting($type, 'Title', 'text', 'y') ?>
						<?php foreach (Language::model()->getLanguage() as $key => $value): ?>
							<div class="pj-multilang-wrap myLanguage control-group" style="display: <?php if ($value->code==$this->setting['lang_deff']): ?>block<?php else: ?>none<?php endif ?>;" data-id="<?php echo $value->id ?>">
								<label class="control-label required" for="Setting_<?php echo $type ?>_<?php echo $value->code ?>"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
								<input value="<?php echo $model[$type]['desc'][$value->code]->value ?>" type="text" id="Setting_<?php echo $type ?>_<?php echo $value->code ?>" name="Setting[<?php echo $type ?>][<?php echo $value->code ?>]" class="span10">

							    <span class="pj-multilang-input"><img src="<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$value->code.'.png' ?>"></span>
							    <span class="help-inline _em_" style="display: none;">Please correct the error</span>
							</div>
						<?php endforeach ?>
					</div>
				</div>
				<div class="divider5"></div>
				<div class="row-fluid">
					<div class="span12">
					<?php $type = 'ourval_picture'; ?>
						<?php Common::createSetting($type, 'Image Banner', 'image', 'n') ?>
						<label for="Setting_<?php echo $model[$type]['data']->name ?>" class="control-label required"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
						<?php echo CHtml::fileField('Setting['.$model[$type]['data']->name.']', $model[$type]['data']->value, array('class'=>'span12')) ?>
						<p class="help-block">NOTE: Picture size 667 x 260px, Larger image will be automatically cropped.</p>
						<?php if ($model[$type]['data']->value): ?>
							<div style="">
								<img style="height: auto; max-width: 300px;" src="<?php echo Yii::app()->baseUrl; ?>/images/static/<?php echo $model[$type]['data']->value; ?>" alt="">
							</div>
							<div class="clearfix" style="height: 15px;"></div>
							<div class="clearfix" style="height: 1px;"></div>
						<?php endif ?>
					</div>
				</div>
				<div class="divider5"></div>
				<div class="row-fluid lists_cont">
					<?php for ($i=1; $i < 5; $i++) { ?>
					<div class="span6">
					<?php $type = 'ourval_list_'.$i; ?>
					<?php Common::createSetting($type, 'List Content', 'text', 'y') ?>
					<?php foreach (Language::model()->getLanguage() as $key => $value): ?>
						<div class="pj-multilang-wrap myLanguage control-group" style="display: <?php if ($value->code==$this->setting['lang_deff']): ?>block<?php else: ?>none<?php endif ?>;" data-id="<?php echo $value->id ?>">
							<label class="control-label required" for="Setting_<?php echo $type ?>_<?php echo $value->code ?>"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
							<textarea id="Setting_<?php echo $type ?>_<?php echo $value->code ?>" name="Setting[<?php echo $type ?>][<?php echo $value->code ?>]" class="span11 redactor"><?php echo $model[$type]['desc'][$value->code]->value ?></textarea>

						    <span class="pj-multilang-input"><img src="<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$value->code.'.png' ?>"></span>
						    <span class="help-inline _em_" style="display: none;">Please correct the error</span>
						</div>
					<?php endforeach ?>
					</div>
					<?php } ?>
				</div>
				<?php $this->widget('bootstrap.widgets.TbButton', array(
					'buttonType'=>'submit',
					'type'=>'primary',
					'label'=>'Save',
				)); ?>
			</div>
		</div>

		<div class="widget">
		<h4 class="widgettitle">Section Key Focus</h4>
			<div class="widgetcontent">
				<div class="row-fluid">
					<div class="span12">
					<?php $type = 'focus_title'; ?>
						<?php Common::createSetting($type, 'Title', 'text', 'y') ?>
						<?php foreach (Language::model()->getLanguage() as $key => $value): ?>
							<div class="pj-multilang-wrap myLanguage control-group" style="display: <?php if ($value->code==$this->setting['lang_deff']): ?>block<?php else: ?>none<?php endif ?>;" data-id="<?php echo $value->id ?>">
								<label class="control-label required" for="Setting_<?php echo $type ?>_<?php echo $value->code ?>"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
								<input value="<?php echo $model[$type]['desc'][$value->code]->value ?>" type="text" id="Setting_<?php echo $type ?>_<?php echo $value->code ?>" name="Setting[<?php echo $type ?>][<?php echo $value->code ?>]" class="span10">

							    <span class="pj-multilang-input"><img src="<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$value->code.'.png' ?>"></span>
							    <span class="help-inline _em_" style="display: none;">Please correct the error</span>
							</div>
						<?php endforeach ?>
					</div>
				</div>
				<div class="divider5"></div>
				<div class="row-fluid">
					<div class="span12">
					<?php $type = 'focus_picture'; ?>
						<?php Common::createSetting($type, 'Image Banner', 'image', 'n') ?>
						<label for="Setting_<?php echo $model[$type]['data']->name ?>" class="control-label required"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
						<?php echo CHtml::fileField('Setting['.$model[$type]['data']->name.']', $model[$type]['data']->value, array('class'=>'span12')) ?>
						<p class="help-block">NOTE: Picture size 549 x 549px, Larger image will be automatically cropped.</p>
						<?php if ($model[$type]['data']->value): ?>
							<div style="">
								<img style="height: auto; max-width: 300px;" src="<?php echo Yii::app()->baseUrl; ?>/images/static/<?php echo $model[$type]['data']->value; ?>" alt="">
							</div>
							<div class="clearfix" style="height: 15px;"></div>
							<div class="clearfix" style="height: 1px;"></div>
						<?php endif ?>
					</div>
				</div>
				<div class="divider5"></div>
				<div class="row-fluid lists_cont">
					<?php for($i=1; $i <= 5; $i++){ ?>
					<div class="span6">
					<?php $type = 'focus_list_'.$i; ?>
					<?php Common::createSetting($type, 'List Content', 'text', 'y') ?>
					<?php foreach (Language::model()->getLanguage() as $key => $value): ?>
						<div class="pj-multilang-wrap myLanguage control-group" style="display: <?php if ($value->code==$this->setting['lang_deff']): ?>block<?php else: ?>none<?php endif ?>;" data-id="<?php echo $value->id ?>">
							<label class="control-label required" for="Setting_<?php echo $type ?>_<?php echo $value->code ?>"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
							<textarea id="Setting_<?php echo $type ?>_<?php echo $value->code ?>" name="Setting[<?php echo $type ?>][<?php echo $value->code ?>]" class="span11 redactor"><?php echo $model[$type]['desc'][$value->code]->value ?></textarea>

						    <span class="pj-multilang-input"><img src="<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$value->code.'.png' ?>"></span>
						    <span class="help-inline _em_" style="display: none;">Please correct the error</span>
						</div>
					<?php endforeach ?>
					</div>
					<?php } ?>
				</div>
				<?php $this->widget('bootstrap.widgets.TbButton', array(
					'buttonType'=>'submit',
					'type'=>'primary',
					'label'=>'Save',
				)); ?>
			</div>
		</div>
		<!-- end section key focus -->
	</div>
</div>

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
<?php $this->endWidget(); ?>
<style type="text/css">
	.row-fluid.lists_cont{
		width: 100%;
		margin: 0 -1em; display: block;
	}
	.row-fluid.lists_cont .span6,
	.row-fluid.lists_cont .span4{
		width: 33%; padding: 0 1em; margin: 0; margin-left: 0;
		float: none; display: inline-block;
	}
	.row-fluid.lists_cont .span6{
		width: 48%;
	}
</style>