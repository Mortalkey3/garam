<div class="blocks_subpage_banner product mah152">
  <div class="container prelatife">
    <div class="clear h70"></div>
    <h3 class="sub_title_p">FORGOT PASSWORD</h3>
    <div class="clear"></div>
    <div class="lines_browns_md tengah"></div>
    <div class="clear height-20"></div>

    <div class="clear"></div>
  </div>
</div>

<div class="clear"></div>
<div class="subpage product">

  <div class="prelatife container">

    <div class="clear height-45"></div>
    <div class="back_product bloc_breadcrumb">
      <ol class="breadcrumb">
        <li><a href="<?php echo CHtml::normalizeUrl(array('/home/index')); ?>">Home</a></li>
        <li class="active">Forgot Password</li>
      </ol>
      <div class="clear"></div>
    </div>


    <div class="outer-cont-carts"> 
        <div class="clear height-20"></div>


	<!-- /. Start Content About -->
	<div class="inside-content">
		<div class="m-ins-content m-ins-myaccount">
			<?php if(Yii::app()->user->hasFlash('success')): ?>
			
			    <?php $this->widget('bootstrap.widgets.TbAlert', array(
			        'alerts'=>array('success'),
			    )); ?>
			
			<?php endif; ?>
			<div class="margin-15">
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'login-form',
    'type'=>'horizontal',
    // 'action'=>array('index'),
    //'htmlOptions'=>array('class'=>'well'),
	'enableClientValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>false,
	),
)); ?>
					<div class="box-account-history">
						<div class="center">
							<div class="height-50"></div>
							<div class="height-10"></div>
							<p>Enter your email address to recover / reset your forgotten password</p>
							<?php echo CHtml::errorSummary($modelLogin, '', '', array('class'=>'alert alert-danger')); ?>
							<div class="clear height-30"></div>
							<!-- <img src="<?php echo Yii::app()->baseUrl ?>/asset/images/mail.gif" alt=""> -->
					    	<?php echo $form->textField($modelLogin, 'username', array('class'=>'form-control', 'style'=>'display: inline-block; width: auto; height: 30px;')) ?>
					    	<button type="submit" class="btn back-btn-primary-gold">SUBMIT</button>
						</div>
						 

					</div>
<?php $this->endWidget(); ?>

			</div>
			<div class="height-50"></div>
			<div class="height-50"></div>

			<div class="clear"></div>
		</div>
		<div class="clear"></div>
	</div>
	<!-- /. End Content About -->


        <div class="clear height-50"></div><div class="height-20"></div>
            <div class="clear"></div>
    </div>


    <div class="clear"></div>
  </div>
</div>




