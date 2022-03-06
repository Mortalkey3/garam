<div class="blocks_subpage_banner product mah225">
  <div class="container prelatife">
    <div class="clear h70"></div>
    <h3 class="sub_title_p">EVENTS</h3>
    <div class="clear"></div>
    <div class="lines_browns_md tengah"></div>
    <div class="clear height-20"></div>
    <h5>Don&rsquo;t miss the show!</h5>
    <div class="clear"></div>
  </div>
</div>

<div class="clear"></div>
<div class="subpage static">
  <div class="prelatife container">
  	<div class="clear height-50"></div><div class="height-40"></div>
	
	<div class="box_event_list">
		<div class="row">
			<?php foreach ($gallery->getData() as $key => $value): ?>
				
			<div class="col-md-4">
				<div class="items">
					<div class="pict"><a href="<?php echo CHtml::normalizeUrl(array('/home/eventdetail', 'id'=>$value->id)); ?>"><img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(393,209, '/images/gallery/'.$value->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="" class="img-responsive"></a></div>
					<div class="descs text-center">
						<span class="nm"><?php echo $value->description->title ?></span>
						<div class="clear"></div>
						<span class="green"><?php echo $value->description->sub_title ?></span>
						<div class="clear"></div>
						<span class="date"><?php echo date('F j, Y',strtoupper($value->date_input)) ?></span>
					</div>
				</div>
			</div>
			<?php endforeach ?>

		</div>

		<div class="clear"></div>
	</div>
	<div class="clear height-50"></div><div class="height-25"></div>

	<div class="banner_register_events">
		<div class="linesbrown_event tengah"></div>
		<div class="clear height-50"></div>
		<p>To keep up with these regular events, register your contact details below</p>
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'type'=>'inline',
		'enableAjaxValidation'=>false,
		'clientOptions'=>array(
		'validateOnSubmit'=>false,
	),
	'htmlOptions' => array(
		'enctype' => 'multipart/form-data',
	),
)); ?>			
   <?php echo $form->errorSummary($model, '', '', array('class'=>'alert alert-danger')); ?>
    <?php if(Yii::app()->user->hasFlash('success')): ?>
        <?php $this->widget('bootstrap.widgets.TbAlert', array(
            'alerts'=>array('success'),
        )); ?>
    <?php endif; ?>
			<div class="form-group">
				<?php echo $form->textField($model, 'name', array('class'=>'form-control', 'placeholder'=>"NAME")); ?>
			</div>
			<div class="form-group">
				<?php echo $form->textField($model, 'email', array('class'=>'form-control', 'placeholder'=>"EMAIL")); ?>
			</div>
			<div class="form-group">
				<?php echo $form->textField($model, 'phone', array('class'=>'form-control', 'placeholder'=>"MOBILE PHONE")); ?>
			</div>
			<button type="submit" class="btn btn-default btns_submit_browns">SUBMIT</button>
<?php $this->endWidget(); ?>
		<div class="clear height-50"></div>
		<div class="linesbrown_event tengah"></div>
		<div class="clear"></div>
	</div>

    <div class="clear height-40"></div>
    <div class="clear height-40"></div>
  </div>

  <div class="clear"></div>
</div>