<section class="home-middle-content padding-top-50">
        <div class="prelatife container new-width">
			
        <div class="container marketing praltif">
          <div class="clear height-15"></div>

          <div class="box-header-top-breadcumb">
            <div class="row">
              <div class="col-md-9 col-sm-9">
                  <div class="breadcumb"><a href="index.php">HOME</a> &gt; WHOLESALER REGISTRATION </div>
              </div>
              <div class="col-md-3 col-sm-3">
                <div class="sharer">SHARE: &nbsp;<a href="https://twitter.com/home?status=<?php echo urlencode(Yii::app()->request->hostInfo.Yii::app()->request->url) ?>"><i class="icon-twitter-ch"></i></a>&nbsp;
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(Yii::app()->request->hostInfo.Yii::app()->request->url) ?>"><i class="icon-facebook-ch"></i></a>&nbsp;
                        <a href="https://plus.google.com/share?url=<?php echo urlencode(Yii::app()->request->hostInfo.Yii::app()->request->url) ?>"><i class="icon-gplus-ch"></i></a>
                        <!-- <a href="#"><i class="icon-pinterest-ch"></i></a> -->
                    </div>
              </div>
            </div>
          </div>
          
          <div class="clear height-30"></div>
          <div class="d-browser-collection">WHOLESALER REGISTRATION</div>
           <div class="clear height-25"></div>

          <div class="back-brownh7"></div>

          <div class="clear height-45"></div>

            <div class="out-dc-whole">
            <p>If you want to be our partner, please tell us a little about you and what makes you interested in UFO Elektronika.</p>
            </div>
          <div class="box-contact-dcontent">
            <div class="clear height-40"></div>
            <div class="success-form">
                              </div>
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
  'id'=>'input-product-form',
    'type'=>'horizontal',
  'enableAjaxValidation'=>false,
  'clientOptions'=>array(
    'validateOnSubmit'=>false,
  ),
  'htmlOptions' => array('enctype' => 'multipart/form-data', 'class'=>'contact-form'),
)); ?>

                <?php echo $form->errorSummary($model, '', '', array('class'=>'alert alert-danger')); ?>
                <?php if(Yii::app()->user->hasFlash('success')): ?>
                
                    <?php $this->widget('bootstrap.widgets.TbAlert', array(
                        'alerts'=>array('success'),
                    )); ?>
                
                <?php endif; ?>
                <div class="form-group">
                  <label for="inputName" class="col-sm-3 control-label">Name</label>
                  <div class="col-sm-9">
                    <?php echo $form->textField($model,'name',array('class'=>'form-control')); ?>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Email Address</label>
                  <div class="col-sm-9">
                    <?php echo $form->textField($model,'email',array('class'=>'form-control')); ?>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPhone" class="col-sm-3 control-label">Phone</label>
                  <div class="col-sm-9">
                    <?php echo $form->textField($model,'phone',array('class'=>'form-control')); ?>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputStore_Name" class="col-sm-3 control-label">Store Name</label>
                  <div class="col-sm-9">
                    <?php echo $form->textField($model,'store_name',array('class'=>'form-control')); ?>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputStore_Address" class="col-sm-3 control-label">Store Address</label>
                  <div class="col-sm-9">
                    <?php echo $form->textField($model,'address',array('class'=>'form-control')); ?>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputStore_Website" class="col-sm-3 control-label">Store Website</label>
                  <div class="col-sm-9">
                    <?php echo $form->textField($model,'website',array('class'=>'form-control')); ?>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputMessage" class="col-sm-3 control-label">Message</label>
                  <div class="col-sm-9">
                    <?php echo $form->textArea($model,'body',array('class'=>'form-control', 'rows'=>6)); ?>
                  </div>
                </div>

                <div class="clear height-5"></div>
                <div class="clear height-2"></div>
                <div class="form-group">
                  <div class="col-sm-offset-3 col-sm-9">
                    <!-- <img src="inc/captcha/captcha.php" class="mg-captcha" id="captcha">
                    &nbsp;&nbsp;&nbsp;
                    <a class="change-verifiy" onclick="document.getElementById('captcha').src='inc/captcha/captcha.php?'+Math.random();document.getElementById('captcha-form').focus();" id="change-image">Change text.</a> -->
                    <!-- secret key : 6Lfw-RsTAAAAAK6x6zZ_XOOxcYrkrcverKy573LV -->
                    <div class="g-recaptcha" data-sitekey="6Lfhyf8SAAAAAEIoCVTdALU8u4mOtj0o8cGiTedX"></div>
                  </div>
                </div>
                <!-- <div class="clear height-5"></div>
                <div class="clear height-2"></div>
                <div class="form-group">
                  <label for="inputMessage" class="col-sm-3 control-label">Verification Code</label>
                  <div class="col-sm-9">
                    <input type="text" class="validate[required]" name="captcha" id="captcha-form" autocomplete="off">
                  </div>
                </div> -->

                <div class="form-group">
                  <div class="col-sm-offset-3 col-sm-9">
                    <input type="hidden" value="submit" name="b_save_0">
                    <input type="submit" class="btn btn-default" name="submit" value=" ">
                  </div>
                </div>
<?php $this->endWidget(); ?>


          </div>

          
        <div class="clear height-50"></div>
        <div class="clear height-10"></div>
        <div class="clear"></div>
      </div>

        </div>
	<div class="clear"></div>
</section>

<script src='https://www.google.com/recaptcha/api.js'></script>