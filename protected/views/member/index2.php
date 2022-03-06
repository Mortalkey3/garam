<div class="blocks_subpage_banner product mah152">
  <div class="container prelatife">
    <div class="clear h70"></div>
    <h3 class="sub_title_p">MEMBER DASHBOARD</h3>
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
        <li class="active">Member Dashboard</li>
      </ol>
      <div class="clear"></div>
    </div>


    <div class="outer-cont-carts"> 
        <div class="clear height-20"></div>



    <div class="inside-content">
        <!-- /. Start Content About -->
        <div class="m-ins-content m-ins-myaccount">
            <?php if(Yii::app()->user->hasFlash('success')): ?>
            
                <?php $this->widget('bootstrap.widgets.TbAlert', array(
                    'alerts'=>array('success'),
                )); ?>
            
            <?php endif; ?>
            
            <div class="margin-15">
            <div class="row">
                <div class="col-xs-6">
                    <div class="padding-right-40">
                        <div class="box-account-history w519">
                            <h1 class="title-inside-page">Order History</h1>
                            <div class="clear height-30"></div>
                            
                                <table class="table table-striped tb-history-account">
                                    <?php foreach ($order->getData() as $key => $value): ?>
                                    <tr>
                                        <td>
                                            <b><?php echo $value->invoice_prefix.'-'.$value->invoice_no ?> (<?php echo OrOrderStatus::model()->findByPk($value->order_status_id)->name ?>)</b> <br>
                                            Tanggal Transaksi: <b><?php echo date('d F Y', strtotime($value->date_add)) ?></b> <br>
                                            Total: <b><?php echo Cart::money($value->total+$value->delivery_price, 0) ?></b>
                                        </td>
                                        <td><a href="<?php echo CHtml::normalizeUrl(array('/member/vieworder', 'nota'=>$value->invoice_prefix.'-'.$value->invoice_no)); ?>"><i class="fa fa-search fa-2x"></i></a></td>
                                    </tr>
                                    <?php endforeach ?>
                                </table>
                                <?php $this->widget('CLinkPager', array(
                                    'pages' => $order->getPagination(),
                                )) ?>

                        </div>
                    </div>
                </div>
                <div class="col-xs-6">
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'user-form',
    'type'=>'horizontal',
    //'htmlOptions'=>array('class'=>'well'),
    'enableClientValidation'=>false,
    'clientOptions'=>array(
        'validateOnSubmit'=>false,
    ),
)); ?>
                    <div class="box-infomation-account w358">
                        <h1 class="title-inside-page">Account Information</h1>
                        <div class="clear height-30"></div>
                        
                        <div class="basic-information">

                                <?php echo CHtml::errorSummary($model, '', '', array('class'=>'alert alert-danger')); ?>


                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'passold', array('class'=>'col-sm-4 control-label')); ?>
                                    <div class="col-sm-5">
                                    <?php echo $form->passwordField($model, 'passold', array('class'=>'form-control')); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'pass', array('class'=>'col-sm-4 control-label')); ?>
                                    <div class="col-sm-5">
                                    <?php echo $form->passwordField($model, 'pass', array('class'=>'form-control')); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'pass2', array('class'=>'col-sm-4 control-label')); ?>
                                    <div class="col-sm-5">
                                    <?php echo $form->passwordField($model, 'pass2', array('class'=>'form-control')); ?>
                                    </div>
                                </div>

                         </div>

                         <div class="clear height-0"></div>
                         <div class="lines-grey"></div>
                         <div class="clear height-20"></div>
                         <div class="height-2"></div>

                         <div class="basic-information">
                            <h1 class="title-inside-page">Delivery Information</h1>
                            <div class="clear height-25"></div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'first_name', array('class'=>'control-label col-sm-4')) ?>
                                    <div class="col-sm-5">
                                        <?php echo $form->textField($model, 'first_name', array('class'=>'form-control')) ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'last_name', array('class'=>'control-label col-sm-4')) ?>
                                    <div class="col-sm-5">
                                        <?php echo $form->textField($model, 'last_name', array('class'=>'form-control')) ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'hp', array('class'=>'control-label col-sm-4')) ?>
                                    <div class="col-sm-5">
                                        <?php echo $form->textField($model, 'hp', array('class'=>'form-control')) ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'address', array('class'=>'control-label col-sm-4')) ?>
                                    <div class="col-sm-5">
                                        <?php echo $form->textField($model, 'address', array('class'=>'form-control')) ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'province', array('class'=>'control-label col-sm-4')) ?>
                                    <div class="col-sm-5">
                                        <?php echo $form->textField($model, 'province', array('class'=>'form-control')) ?>
                                        <?php //echo $form->dropDownList($model, 'province',CHtml::listData(City::model()->findAll('1 GROUP BY province_id'),'province_id', 'province'), array('class'=>'form-control', 'empty'=>'Select State')) ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'city', array('class'=>'control-label col-sm-4')) ?>
                                    <div class="col-sm-5">
                                        <?php echo $form->textField($model, 'city', array('class'=>'form-control')) ?>
                                        <?php //echo $form->dropDownList($model, 'city', array(), array('class'=>'form-control', 'empty'=>'Select City')) ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-4 control-label" for="input"></label>
                                    <div class="col-sm-5">
                                        <button type="submit" class="btn btn-primary">EDIT</button>
                                    </div>
                                </div>


                         </div>

                    </div>
<?php $this->endWidget(); ?>
                </div>
            </div>
            </div>

            <div class="clear height-25"></div>

            <div class="clear"></div>
        </div>
        <!-- /. End Content About -->



        <div class="clear height-50"></div><div class="height-20"></div>
            <div class="clear"></div>
    </div>


    <div class="clear"></div>
  </div>
</div>





