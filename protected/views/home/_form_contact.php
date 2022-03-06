<!-- start form c -->
<div class="box-form tl-contact-form">
  <div class="clear height-50"></div>
  <div class="mw665 tengah">
    <div class="text-center">
      <h4>Form Keagenan</h4>    
      <p>Silahkan mengisi form di bawah ini, dan staff perabotplastik.com akan menghubungi anda.</p>
    </div> <div class="clear height-15"></div>

    <div class="clear"></div>
  <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
                  'type'=>'',
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

    <div class="row default">
      <div class="col-md-6 col-sm-6">
        <div class="form-group">
            <label for="exampleInputName">Nama</label>
            <?php echo $form->textField($model, 'name', array('class'=>'form-control')); ?>
        </div>
      </div>
      <div class="col-md-6 col-sm-6">
        
        <div class="form-group">
            <label for="exampleInputEmail">Email</label>
            <?php echo $form->textField($model, 'email', array('class'=>'form-control')); ?>
        </div>
      </div>
    </div>

    <div class="row default">
      <div class="col-md-6 col-sm-6">
        <div class="form-group">
            <label for="exampleInputPhone">Telepon</label>
            <?php echo $form->textField($model, 'phone', array('class'=>'form-control')); ?>
        </div>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="form-group">
            <label for="exampleInputCompany">Perusahaan</label>
            <?php echo $form->textField($model, 'company', array('class'=>'form-control')); ?>
        </div>
      </div>
    </div>

    <div class="row default">
      <div class="col-md-6 col-sm-6">
        <div class="form-group">
            <label for="exampleInputPhone">Alamat</label>
            <?php echo $form->textField($model, 'address', array('class'=>'form-control')); ?>
        </div>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="form-group">
            <label for="exampleInputCompany">Kota</label>
            <?php echo $form->textField($model, 'city', array('class'=>'form-control')); ?>
        </div>
      </div>
    </div>

    <div class="row default">
      <div class="col-md-12 col-sm-12 col-lg-12">
        <div class="form-group">
            <label for="exampleInputMessage">Pesan</label> 
            <div class="clear"></div>
            <?php echo $form->textArea($model, 'body', array('class'=>'form-control', 'rows'=>4)); ?>
        </div>
      </div>
      <div class="clear"></div>

      <div class="col-md-12 col-sm-12 col-lg-12">
        <div class="row default">
          <div class="col-md-6 col-sm-6">
            <div class="fright-inpd">
              <div class="form-group mb-0">
                <div class="fleft">
                  <div class="g-recaptcha" data-sitekey="6LfaqgkUAAAAAJEMAlr1K3EE2INzUfWKjxzaWI3c"></div>
                </div>
                <div class="clear"></div>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-sm-6">
            <div class="fleft">
              <button type="submit" class="btn btn-default btns-submit-bt"></button>
            </div>
          </div>
        </div>

      </div>
    </div>

  <?php $this->endWidget(); ?>
      <div class="clear height-30"></div>
    <div class="clear"></div>
  </div>

  <div class="clear"></div>
</div>

<div class="clear"></div>
<!-- end form c -->
<script src='https://www.google.com/recaptcha/api.js'></script>