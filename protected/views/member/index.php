<div class="subpage_product">
  <section class="default_sc blocks_bannerBox_home back-whiteimp" id="block_homesection">
    <div class="clear height-20"></div>
    <div class="prelatife container">
	    <div class="bloc_breadcrumb">
	      <ol class="breadcrumb">
	        <li><a href="<?php echo CHtml::normalizeUrl(array('/home/index')); ?>">Home</a></li>
	        <li class="active">Member Login</li>
	      </ol>
	      <div class="clear"></div>
	    </div>
	    <div class="clear"></div>
    </div>

    <div class="in_box_product back-white">
      <div class="prelatife container">
        <div class="insides padding-top-15 middles_inProduct_detail">
        	<!-- /. Start Content About -->
	<div class="inside-content">
		<div class="m-ins-content m-ins-myaccount">
	        <div class="content-text text-center">
	            <div class="clear height-30"></div>
	            <h3>Member Login</h3>
	            <div class="clear height-30"></div>
	        </div>
			<?php if(Yii::app()->user->hasFlash('success')): ?>
			
			    <?php $this->widget('bootstrap.widgets.TbAlert', array(
			        'alerts'=>array('success'),
			    )); ?>
			
			<?php endif; ?>
			<div class="margin-15">
			<div class="row">
				<div class="col-md-6">
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'login-form',
    'type'=>'horizontal',
    //'htmlOptions'=>array('class'=>'well'),
	'enableClientValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>false,
	),
)); ?>
					<div class="box-account-history">
						<h1 class="title">Login / My Account</h1>
						<div class="clear height-30"></div>
						
						<div class="basic-information form-horizontal">
						<?php echo CHtml::errorSummary($modelLogin, '', '', array('class'=>'alert alert-danger')); ?>
						<div class="form-group">
							<?php echo $form->labelEx($modelLogin, 'username', array('class'=>'control-label col-sm-4')) ?>
						    <div class="col-sm-6">
						    	<?php echo $form->textField($modelLogin, 'username', array('class'=>'form-control')) ?>
						    </div>
						</div>
						<div class="form-group">
							<?php echo $form->labelEx($modelLogin, 'password', array('class'=>'control-label col-sm-4')) ?>
						    <div class="col-sm-6">
						    	<?php echo $form->passwordField($modelLogin, 'password', array('class'=>'form-control')) ?>
						    </div>
						</div>
					 
					    <div class="form-group">
						    <label class="col-sm-4 control-label" for="input"></label>
						    <div class="col-sm-8">
						    	<button type="submit" class="btn btn-primary">LOGIN</button>
						    	&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo CHtml::normalizeUrl(array('forgot')); ?>" class="forgot-password">Forgot Password?</a>
						    </div>
					    </div>
						 

						 </div>
					</div>
<?php $this->endWidget(); ?>
				</div>
				<div class="col-md-6">
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'daftar-form',
    // 'type'=>'horizontal',
	'enableClientValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>false,
	),
)); ?>
					<div class="box-infomation-account border-left-brown padding-left-50">
						<div class="basic-information form-horizontal">
						<h1 class="title">New Customer Sign Up</h1>
						<div class="clear height-30"></div>
								
								<?php echo CHtml::errorSummary($model, '', '', array('class'=>'alert alert-danger')); ?>

								
								<div class="form-group">
									<?php echo $form->labelEx($model, 'email', array('class'=>'control-label col-sm-4')) ?>
								    <div class="col-sm-6">
								    	<?php echo $form->textField($model, 'email', array('class'=>'form-control')) ?>
								    </div>
								</div>
								<div class="form-group">
									<?php echo $form->labelEx($model, 'pass', array('class'=>'control-label col-sm-4')) ?>
								    <div class="col-sm-6">
								    	<?php echo $form->passwordField($model, 'pass', array('class'=>'form-control')) ?>
								    </div>
								</div>
								<div class="form-group">
									<?php echo $form->labelEx($model, 'pass2', array('class'=>'control-label col-sm-4')) ?>
								    <div class="col-sm-6">
								    	<?php echo $form->passwordField($model, 'pass2', array('class'=>'form-control')) ?>
								    </div>
								</div>

						 </div>

						 <div class="clear height-0"></div>
						 <div class="lines-grey"></div>
						 <div class="clear height-20"></div>
						 <div class="height-2"></div>

						 <div class="basic-information form-horizontal">
						 	<h4>DELIVERY INFORMATION</h4>
						 	<div class="clear height-25"></div>


								<div class="form-group">
									<?php echo $form->labelEx($model, 'first_name', array('class'=>'control-label col-sm-4')) ?>
								    <div class="col-sm-6">
								    	<?php echo $form->textField($model, 'first_name', array('class'=>'form-control')) ?>
								    </div>
								</div>
								<div class="form-group">
									<?php echo $form->labelEx($model, 'hp', array('class'=>'control-label col-sm-4')) ?>
								    <div class="col-sm-6">
								    	<?php echo $form->textField($model, 'hp', array('class'=>'form-control')) ?>
								    </div>
								</div>
								<div class="form-group">
									<?php echo $form->labelEx($model, 'address', array('class'=>'control-label col-sm-4')) ?>
								    <div class="col-sm-6">
								    	<?php echo $form->textField($model, 'address', array('class'=>'form-control')) ?>
								    </div>
								</div>
								<div class="form-group">
									<?php echo $form->labelEx($model, 'province', array('class'=>'control-label col-sm-4')) ?>
								    <div class="col-sm-6">
								    	<?php echo $form->textField($model, 'province', array('class'=>'form-control')) ?>
								    	<?php //echo $form->dropDownList($model, 'province',CHtml::listData(City::model()->findAll('1 GROUP BY province_id'),'province_id', 'province'), array('class'=>'form-control', 'empty'=>'Select State')) ?>
								    </div>
								</div>
								<div class="form-group">
									<?php echo $form->labelEx($model, 'city', array('class'=>'control-label col-sm-4')) ?>
								    <div class="col-sm-6">
								    	<?php echo $form->textField($model, 'city', array('class'=>'form-control')) ?>
								    	<?php //echo $form->dropDownList($model, 'city', array(), array('class'=>'form-control', 'empty'=>'Select City')) ?>
								    </div>
								</div>





							    <div class="form-group">
								    <label class="col-sm-4 control-label" for="input"></label>
								    <div class="col-sm-6">
								    	<button type="submit" class="btn btn-primary">SIGN UP</button>
								    </div>
							    </div>

						 </div>

					</div>
<?php $this->endWidget(); ?>
				</div>
			</div>
			</div>
			<div class="height-30"></div>

			<div class="clear"></div>
		</div>
		<div class="clear"></div>
	</div>
	<!-- /. End Content About -->
        	<!-- End content login member -->

          <div class="clear height-25"></div>
          <div class="clear"></div>
        </div>
        <!-- end insides -->
      </div>
    </div>
    <!-- End sub kategori -->

  </section>
  <div class="clear"></div>
</div>

