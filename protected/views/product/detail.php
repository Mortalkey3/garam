<?php
$session=new CHttpSession;
$session->open();
$login_member = $session['login_member'];
?>
<script src="<?php echo Yii::app()->baseUrl ?>/asset/js/sweetalert/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl ?>/asset/js/sweetalert/sweetalert.css">

<div class="subpage_product">
  <section class="default_sc blocks_bannerBox_home back-whiteimp" id="block_homesection">
    <div class="clear height-25"></div>

    <div class="in_box_product back-white">
      <div class="prelatife container">

        <div class="tops purple text-center">
          <div class="row">
            <div class="col-md-6">
<?php
$bread = PrdCategory::model()->getBreadcrump($data->category_id, $this->languageID);
$bread = array_reverse($bread,true);
$dataCategory = array();
foreach ($bread as $key => $value) {
  // $this->breadcrumbs[$key]=$value;
  array_push($dataCategory, $key);
}
$dataCategory = array_reverse($dataCategory);
?>

              <h3 class="sub_title">Kategori <?php echo implode(' -> ', $dataCategory)//$data->category->parent->description->name; ?></h3>
            </div>
            <div class="col-md-6">
              <div class="t_back_categorys">
                <a href="javascript: window.history.back();">Kembali ke Kategori <?php echo $data->category->parent->description->name; ?> &nbsp;<i class="fa fa-chevron-right"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="insides padding-top-15 middles_inProduct_detail">
          
          <!-- Start Box Products Detail -->
          <div class="box_top_detail_product">
            <div class="row row-eq-height">
              <div class="col-md-9">
              <div class="padding_leftxs">
                  <div class="lg_brand padding-bottom-10">
                    <img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(100,35, '/images/brand/'.$data->brand->image , array('method' => 'resize', 'quality' => '90')) ?>" alt="">
                  </div>
                  <h1 class="titles"><?php echo $data->description->name ?></h1>
                  <div class="clear height-15"></div>
                  <div class="row prelatife">
                    <div class="col-md-7">
                      <div class="picture">
                        <!-- <img src="<?php // echo $this->assetBaseurl ?>ex_big_product.jpg" alt="" class="img-responsive"> -->
                        <img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(400,400, '/images/product/'.$data->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="" class="img-responsive center-block">
                      </div>
                    </div>
                    <div class="col-md-5 h100per">
                      <div class="fright mw285 padding-top-20 info_benefit">
                        <p><b>KEUNGGULAN PRODUK</b><br>
                          <?php echo strip_tags($data->description->subtitle); ?>
                            </p>

                        <div class="clear"></div>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="shares_box">
                            <span class="d-inline padding-right-10 tn">Share this:</span> <!-- Go to www.addthis.com/dashboard to customize your tools --> <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-58f5e4af3ee8fe7e"></script> 
                            <div class="clear"></div>
                            <div class="addthis_inline_share_toolbox"></div>
                          </div>
                    </div>
                  </div>
                  <div class="clear"></div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="rights_box_blue_prdDetail">
                  <div class="b_img_sales">
                     <?php if (1 == $data->terbaru): ?>
                      <img src="<?php echo $this->assetBaseurl ?>backs_con_right_top_products-yellow2-big.png" alt="">  
                      <?php elseif($data->harga_coret > $data->harga): ?>
                      <img src="<?php echo $this->assetBaseurl; ?>backs_con_right_top_products2-big.png" alt="">
                      <?php endif ?>
                  </div>
                  <div class="pn_price paddings">
                    <?php if ($data->harga_coret > $data->harga): ?>
                    <span class="top_price">Harga Normal RP <i><?php echo number_format($data->harga_coret) ?></i></span>
                    <span>Kini RP <b><?php echo number_format($data->harga) ?></b></span>
                    <span class="prc_bottom">Hemat RP <?php echo number_format($data->harga_coret - $data->harga) ?></span>
                    <?php else: ?>
                    <span class="top_price">&nbsp;</span>
                    <span>RP <b><?php echo number_format($data->harga) ?></b></span>
                    <span class="prc_bottom">&nbsp;</span>
                    <?php endif ?>
                    <div class="clear"></div>
                  </div>
                  <div class="clear"></div>
                  <?php $uns_data = unserialize($data->data) ?>
                  <?php if ($uns_data['feature']): ?>
                  <div class="blacks_info paddings mb1">
                    <div class="d-inline fleft">
                      <img src="<?php echo $this->assetBaseurl; ?>bc_icon_stars.png" alt="">
                    </div>
                    <div class="d-inline fleft mw255">
                      <p><b>FREE DELIVERY</b><br>
                        <?php echo $uns_data['feature'] ?></p>
                    </div> <div class="clear"></div>
                  </div>
                  <?php endif ?>
                  <div class="clear"></div>
                  <?php if ($uns_data['qty_pack']): ?>
                  <div class="blacks_info paddings">
                    <div class="d-inline fleft">
                      <img src="<?php echo $this->assetBaseurl; ?>bc_icon_stars.png" alt="">
                    </div>
                    <div class="d-inline fleft mw255">
                      <p><b>PICK UP AT STORE</b><br>
                     <?php echo $uns_data['qty_pack'] ?></p>
                    </div> <div class="clear"></div>
                  </div>
                  <?php endif ?>
                  
                  <div class="clear height-25"></div>
                  <?php if ($data->stock > 0): ?>
                  <div class="paddings">
                    <?php if(Yii::app()->user->hasFlash('success')): ?>

<script type="text/javascript">
swal({
  title: "<?php echo Yii::app()->user->getFlash('success') ?>",
  text: "Do you want to continue shopping?",
  type: "success",
  showCancelButton: true,
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "yes, Continue Shopping",
  cancelButtonText: "Go to Cart",
  // closeOnConfirm: false,
  closeOnCancel: false
},
function(isConfirm){
  if (isConfirm) {
    
  } else {
    window.location.href = '<?php echo CHtml::normalizeUrl(array('/cart/shop')); ?>';
  }
});
</script>
                    <?php /*
                        <?php $this->widget('bootstrap.widgets.TbAlert', array(
                            'alerts'=>array('success'),
                        )); ?>
                    */ ?>
                    <?php endif; ?>

                    <?php if(Yii::app()->user->hasFlash('danger')): ?>
                        <?php $this->widget('bootstrap.widgets.TbAlert', array(
                            'alerts'=>array('danger'),
                        )); ?>
                    <?php endif; ?>
                    <form class="form-inline" action="<?php echo CHtml::normalizeUrl(array('addcart')); ?>" method="post">
                      <div class="form-group">
                        <label for="">Jumlah</label>
                        <input type="number" name="qty" class="form-control" value="1">
                      </div>
                      <input type="hidden" id="price-item" value="<?php echo $data->harga ?>">
                      <input type="hidden" name="id" value="<?php echo $data->id ?>">
                      <button class="btn btn-default btns_submits_red"></button>
                      <?php if ($uns_data['garansi_nilai'] != ''): ?>
                        
                      <div class="height-10"></div>
                      <div class="form-group">
                        <label for="">Garansi</label>
                        <select name="optional[garansi]" id="" class="form-control" style="width: 100%;">
                          <option value="">No, Thank You</option>
                          <option value="<?php echo $uns_data['garansi_nilai'] ?>|<?php echo $uns_data['garansi_teks'] ?>">Yes, <?php echo $uns_data['garansi_teks'] ?></option>
                        </select>
                      </div>
                      <?php endif ?>
                    </form>
                  </div>
                  <div class="clear"></div>
                  <?php else: ?>
                  <div class="blacks_info paddings">
                    <div class="d-inline fleft">
                      <img src="<?php echo $this->assetBaseurl; ?>bc_icon_stars.png" alt="">
                    </div>
                    <div class="d-inline fleft mw255">
                      <p><b>STOCK KOSONG</b><br>
                     Stock saat ini kosong, silahkan menghubungi customer service kami dengan klik <a href="javascript:$zopim.livechat.window.show();">di sini</a></p>
                    </div> <div class="clear"></div>
                  </div>
                  <?php endif ?>
                </div>
              </div>
            </div>
            <div class="clear"></div>
          </div>
          <div class="clear height-10"></div><div class="height-3"></div>
          <div class="bottoms_prdDetail row">
            <div class="col-md-9">
            <div class="box_description_bottomLeft">

                <ul class="nav nav-tabs" role="tablist">
                  <li role="presentation" <?php if (!($model->hasErrors() OR Yii::app()->user->hasFlash('success2'))): ?>class="active"<?php endif ?>><a href="#home" aria-controls="home" role="tab" data-toggle="tab">DESKRIPSI</a></li>
                  <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">SPESIFIKASI</a></li>
                  <li role="presentation" <?php if (($model->hasErrors() OR Yii::app()->user->hasFlash('success2'))): ?>class="active"<?php endif ?>><a href="#review" aria-controls="review" role="tab" data-toggle="tab">REVIEW</a></li>
                </ul>

                <div class="tab-content">
                  <div role="tabpanel" class="tab-pane <?php if (!($model->hasErrors() OR Yii::app()->user->hasFlash('success2'))): ?>active<?php endif ?>" id="home">
                    <?php echo $data->description->desc ?>
                  </div>
                  <div role="tabpanel" class="tab-pane" id="profile">
                    <?php echo $data->description->note ?>
                  </div>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-bar-rating/1.2.2/themes/fontawesome-stars.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-bar-rating/1.2.2/jquery.barrating.min.js"></script>
                  <div role="tabpanel" class="tab-pane <?php if (($model->hasErrors() OR Yii::app()->user->hasFlash('success2'))): ?>active<?php endif ?>" id="review">
                  <?php if (isset($login_member)): ?>
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
                      <?php if(Yii::app()->user->hasFlash('success2')): ?>
                        <div class="alert alert-success">
                          <?php echo Yii::app()->user->getFlash('success2') ?>
                        </div>
                      <?php endif; ?>
                      <div class="row default">
                        <div class="col-md-8">
                          <div class="form-group">
                            <label for="comment">Comment</label>
                            <?php echo $form->textArea($model, 'comment', array('class'=>'form-control', 'rows'=>4)); ?>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="comment">Rating</label>
                            <?php echo $form->dropDownList($model, 'rating', array(
                              '1'=>'1',
                              '2'=>'2',
                              '3'=>'3',
                              '4'=>'4',
                              '5'=>'5',
                            ),array('class'=>'form-control')); ?>
                          </div>
                          <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </div>
                        </div>
                      </div>
  <?php $this->endWidget(); ?>
                  <?php endif ?>
<style type="text/css">
i.fa.fa-star{
  color: #d2d2d2;
}
i.fa.fa-star.selected{
  color: #edb867;
}
</style>
                    <?php if ($rating > 0): ?>
                      
                      <div class="row default">
                        <div class="col-md-8">
                          <h3>Comment
                            &nbsp;&nbsp;&nbsp;

                              
                            <i class="fa fa-star <?php if ($rating >= 1): ?>selected<?php endif ?>"></i>
                            <i class="fa fa-star <?php if ($rating >= 2): ?>selected<?php endif ?>"></i>
                            <i class="fa fa-star <?php if ($rating >= 3): ?>selected<?php endif ?>"></i>
                            <i class="fa fa-star <?php if ($rating >= 4): ?>selected<?php endif ?>"></i>
                            <i class="fa fa-star <?php if ($rating >= 5): ?>selected<?php endif ?>"></i>
                          </h3>
                          <?php foreach ($review->getData() as $key => $value): ?>
                          <h4><?php echo $value->name ?>
                            &nbsp;&nbsp;&nbsp;
                            <i class="fa fa-star <?php if ($value->rating >= 1): ?>selected<?php endif ?>"></i>
                            <i class="fa fa-star <?php if ($value->rating >= 2): ?>selected<?php endif ?>"></i>
                            <i class="fa fa-star <?php if ($value->rating >= 3): ?>selected<?php endif ?>"></i>
                            <i class="fa fa-star <?php if ($value->rating >= 4): ?>selected<?php endif ?>"></i>
                            <i class="fa fa-star <?php if ($value->rating >= 5): ?>selected<?php endif ?>"></i>
                          </h4>
                          <p><?php echo $value->comment ?></p>
                          <hr>
                          <?php endforeach ?>
                        </div>
                      </div>
                    <?php endif ?>
                  </div>
                </div>
<script type="text/javascript">
   $(function() {
      $('#PrdProductReview_rating').barrating({
        theme: 'fontawesome-stars'
      });
   });
</script>
              </div>
              <!-- end contents tab -->
            </div>
            <div class="col-md-3">
              <?php if (count($product) > 0): ?>
              <div class="boxs_wrp_othersProducts">
                <div class="tops"><span>PRODUK LAIN UNTUK ANDA</span></div>
                <div class="middles">
                  <div class="lists_others_product">
                    <?php foreach ($product as $key => $value): ?>
                      
                    <div class="items">
                      <div class="pict"><a href="<?php echo CHtml::normalizeUrl(array('/product/detail', 'id'=>$value->id)); ?>"><img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(94,94, '/images/product/'.$value->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="" class="img-responsive"></a></div>
                      <div class="info">
                        <div class="titles"><a href="<?php echo CHtml::normalizeUrl(array('/product/detail', 'id'=>$value->id)); ?>"><?php echo $value->description->name ?></a></div>
                        <div class="prices">
                          <?php if ($value->harga_coret > $value->harga): ?>
                          <span class="lt">RP <i><?php echo number_format($value->harga_coret) ?></i></span>
                          <?php endif ?>
                          <div class="clear"></div>
                          <span>RP <?php echo number_format($value->harga) ?></span>
                        </div>
                        <div class="clear"></div>
                      </div>
                      <div class="clear"></div>
                    </div>
                    <?php endforeach ?>
                  </div>
                  <div class="celar"></div>
                </div>
                <div class="clear"></div>
              </div>
              <?php endif ?>

            </div>
          </div>
          <!-- End Box Products Detail -->

          <div class="clear height-20"></div>

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









<?php /*
-------------------------------------------------
<?php
$data->data = unserialize($data->data);
?>
<div class="blocks_subpage_banner product mah152">
  <div class="container prelatife">
    <div class="clear h70"></div>
    <h3 class="sub_title_p">BUY COFFEE</h3>
    <div class="clear"></div>
    <div class="lines_browns_md tengah"></div>
    <div class="clear height-20"></div>

    <div class="clear"></div>
  </div>
</div>

<div class="clear"></div>
<div class="subpage product">

  <div class="block_product_category">
    <div class="container text-center prelatife">
      <div class="clear height-20"></div><div class="height-3"></div>
      <ul class="list-inline">
        <?php foreach ($categories as $key => $value): ?>
        <li <?php if ($_GET['category'] == $value->id): ?>class="active"<?php endif ?>><a href="<?php echo CHtml::normalizeUrl(array('/product/list', 'category'=>$value->id)); ?>"><?php echo $value->description->name ?></a></li>
        <?php endforeach ?>
      </ul>
      <div class="clear"></div>
    </div>
  </div>

  <div class="prelatife container">

    <div class="clear height-45"></div>
    <div class="back_product"><a href="#">Back</a></div>
    <div class="clear height-30"></div>

    <div class="detail_product">
        <div class="row">
          <div class="col-md-6">
            <div class="picture"><img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(600,600, '/images/product/'.$data->image , array('method' => 'resize', 'quality' => '90')) ?>" alt="" class="img-responsive"></div>
          </div>
          <div class="col-md-6">
            <div class="desc_right">
              <div class="clear h85"></div>

              <h2 class="title"><?php echo $data->description->name ?></h2>
              <?php if ($data->brand_id > 0): ?>
              <h6><span class="colors <?php echo ($data->brand_id == 1)? 'green':'' ?>"><?php if ($data->brand_id == 1): ?>SINGLE ORIGIN<?php else: ?>BLEND<?php endif ?></span></h6>
              <?php endif ?>
              <?php if ($data->description->subtitle != ''): ?>
              <span><?php echo $data->description->subtitle ?></span>
              <?php endif ?>
              <?php if ($data->data['feature'] != ''): ?>
              <div class="clear height-15"></div>
              <div class="origin">
                <small>ORIGIN</small>
                <div class="clear"></div>
                <?php echo $data->data['feature'] ?>
              </div>
              <?php endif ?>


              <div class="clear height-50"></div>
              <div class="box_order tengah">
                <?php if(Yii::app()->user->hasFlash('success')): ?>
                    <?php $this->widget('bootstrap.widgets.TbAlert', array(
                        'alerts'=>array('success'),
                    )); ?>
                <?php endif; ?>

                <?php if(Yii::app()->user->hasFlash('danger')): ?>
                    <?php $this->widget('bootstrap.widgets.TbAlert', array(
                        'alerts'=>array('danger'),
                    )); ?>
                <?php endif; ?>
                <form class="form-inline" action="<?php echo CHtml::normalizeUrl(array('addcart')); ?>" method="post">
                  <?php if (count($attributes) > 0): ?>
                    
                  <div class="row">
                    <div class="col-xs-5">
                      <div class="form-group">
                        <label for="">SIZE</label>
                        <select name="option" id="select-size" class="form-control w113">
                          <?php foreach ($attributes as $key => $value): ?>
                            <option value="<?php echo $value->id ?>"><?php echo $value->attribute ?></option>
                          <?php endforeach ?>
                        </select>
                      </div>
                    </div>
<?php
$json_array = array();
foreach ($attributes as $key => $value) {
  $json_array[$value->id] = $value->price;
}
?>
<script type="text/javascript">
  var jsonStr = '<?php echo json_encode($json_array) ?>';
  var jsonArray = JSON.parse(jsonStr);
  console.log(jsonArray);
</script>
                    <div class="col-xs-7">
                      <div class="form-group">
                        <label for="">GRIND</label>
                        <select name="optional[grind]" id="" class="form-control w236">
                            <option value="Whole beans">Whole Beans</option>
                            <option value="Espresso machine">Espresso Machine</option>
                            <option value="Filter / Drip">Filter / Drip</option>
                            <option value="Plunger">Plunger</option>
                            <option value="Chemex">Chemex</option>
                        </select>
                        <!-- <input type="text" class="form-control w236" value="<?php echo $data->data['material'] ?>"> -->
                      </div>
                    </div>
                  </div>
                  <div class="clear height-15"></div>


                  <?php endif; ?>

                  <div class="row">
                    <div class="col-xs-5">
                      <div class="form-group">
                        <label for="">QTY&nbsp;</label>
                        <input type="number" id="select-qty" name="qty" value="1" class="form-control">
                      </div>
                    </div>
                    <div class="col-xs-7 prelatife">
                      <div class="form-group">
                        <label for="">PRICE</label>
                        <input type="text" id="price-view" class="form-control wprice" value="<?php echo Cart::money($data->harga) ?>">
                      </div>
                      <input type="hidden" id="price-item" value="<?php echo $data->harga ?>">
                      <input type="hidden" name="id" value="<?php echo $data->id ?>">
                      <button type="submit" class="btn btn-default btns_def_addcart"></button>
                    </div>
                  </div>
                </form>
                <div class="clear"></div>
              </div>

              <div class="clear"></div>
            </div>
          </div>
        </div>
      
      <div class="clear height-40"></div>
      <div class="lines-grey"></div>
      <div class="clear height-45"></div>
      
      <div class="row default description">
        <div class="col-md-6">
          <h5>DESCRIPTION</h5>
          <?php echo $data->description->desc ?>
        </div>
        <div class="col-md-6">
          <h5>TASTING NOTES</h5>
          <?php echo $data->description->note ?>
        </div>
      </div>

      <div class="clear"></div>
    </div>
    <!-- end detail products -->

    <div class="clear height-25"></div>
    <div class="lines-grey"></div>
    <div class="clear height-45"></div>

    <div class="blocks_outers_products_data">
      <h5 class="sub_title text-center">YOU MIGHT ALSO LIKE</h5>
      <div class="clear height-20"></div><div class="height-5"></div><div class="height-3"></div>

<?php if ($product->getTotalItemCount() > 0): ?>
      <div class="lists_product_data">
        <div class="row">
          <?php foreach ($product->getData() as $key => $value): ?>
          <div class="col-md-3 col-sm-6">
            <div class="items">
              <div class="picts"><a href="<?php echo CHtml::normalizeUrl(array('/product/detail', 'id'=>$value->id)); ?>"><img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(300,300, '/images/product/'.$value->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="" class="img-responsive"></a></div>
              <div class="descs padding-top-15">
                <h4><a href="<?php echo CHtml::normalizeUrl(array('/product/detail', 'id'=>$value->id)); ?>"><?php echo $value->description->name ?></a></h4>
                <div class="clear"></div>
                <span class="colors <?php echo ($value->brand_id == 1)? 'green':'' ?>"><?php if ($value->brand_id == 1): ?>SINGLE ORIGIN<?php else: ?>BLEND<?php endif ?></span>
                <div class="clear"></div>
                <span class="desc_1"><?php echo $value->description->subtitle ?></span>
                <div class="clear"></div>
              </div>
            </div>
          </div>
          <?php endforeach ?>
        </div>
        <div class="clear"></div>
      </div>
<?php endif ?>

      <div class="clear height-20"></div>

      <div class="clear"></div>
    </div>

    <div class="clear"></div>
  </div>
</div>

<?php if (count($attributes) > 0): ?>
<script type="text/javascript">
$('#select-size').change(function() {
  var harga = jsonArray[$(this).val()];
  $('#price-view').val("$"+harga);
  $('#price-item').val(harga);
})
$('#select-qty').change(function() {
  var harga = jsonArray[$('#select-size').val()];
  var jmlItem =  $(this).val();
  $('#price-view').val("$"+(Math.round(harga*jmlItem*100) / 100));
})
</script>
<?php else:?>
<script type="text/javascript">
$('#select-qty').change(function() {
  var harga = $('#price-item').val();
  var jmlItem =  $(this).val();
  $('#price-view').val("$"+(Math.round(harga*jmlItem*100) / 100));
})
</script>
<?php endif;?>

*/ ?>