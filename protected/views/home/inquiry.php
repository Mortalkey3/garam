<section class="default_sc top_inside_pg_default">
  <div class="out_table">
    <div class="in_table">
      <div class="prelatife container">
        <h1 class="sub_titlepage">Daftar Inkuiri</h1>
        <div class="clear"></div>
      </div>
      <div class="clear"></div>
    </div>
  </div>
</section>

<section class="default_sc insides_middleProducts back-white">
  <div class="tops_filters_whitProduct_top">
    <div class="prelatife container">
      <div class="row default">
        <div class="col-md-6">
          <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="<?php echo CHtml::normalizeUrl(array('/home/index')); ?>">Home</a></li>
              <li class="active">Daftar Inkuiri</li>
            </ol>
            <div class="clear"></div>
          </div>
          <!-- end pagination products -->
        </div>
        <div class="col-md-6">&nbsp;</div>
      </div>
      <div class="clear"></div>
    </div>
  </div>
  <!-- end filter product top -->

  <div class="prelatife container">
    <div class="outer-cont-carts"> 
        <div class="clear height-50"></div>
            <div class="row">
                <div class="col-md-12">
                    <div class="left-conts-tabl-cart content-text">
                        
                        <div id="cart-shop">

                                                <div class="table-responsive">
                            <table class="table table-hover shopcart">
                                <thead>
                                    <tr>
                                        <td>ITEM</td>
                                        <td style="width: 24%;">QUANTITY</td>
                                        <td style="width: 20%;">PRICE</td>
                                        <td style="width: 3%;">&nbsp;</td>
                                    </tr>
                                </thead>
                                <tbody>
                                                                                                                                                                <tr>
                                    <td>
                                        <div class="left pic">
                                            <img src="<?php echo $this->assetBaseurl; ?>product-hm_1.jpg" alt="">
                                        </div>
                                        <div class="left nm-descr margin-left-20">
                                            <span class="name">Gayung Hati</span>
                                            <div class="clear height-3"></div>
                                            <span class="cat">Bathroom</span>
                                        </div>
                                    </td>
                                    <td>
                                    <form action="/linette-new/product/edit" method="post">
                                                                                                            QTY &nbsp;&nbsp;&nbsp;&nbsp;<input type="number" class="tranparant-back select_qty" name="qty" value="5">
                                    <button type="submit" class="btn-edit-cart"><i class="fa fa-refresh"></i></button>
                                    <input type="hidden" value="82" name="id">
                                                                                                                    <input type="hidden" value="500" name="optional[berat]">
                                                                                                                </form>
                                    </td>
                                    <td>
                                    <span class="price">Rp 1,495,000</span>
                                    </td>
                                    <td>
                                        <a href="#" class="btn back-btn-primary-blue btn-delete-cart"> <i class="fa fa-trash"></i> </a>
                                    </td>
                                </tr>
                                                                                                                                <tr class="sub_total">
                                    <td>&nbsp;</td>
                                    <td class="text-right"><span class="totl">SUBTOTAL</span></td>
                                    <td><span class="price">Rp 1,495,000</span></td>
                                    <td>&nbsp;</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="text-right fright">
                            <a href="<?php echo CHtml::normalizeUrl(array('/home/detailInquiry')); ?>" class="btn btn-primary">NEXT</a>
                        </div> 
                        <a href="<?php echo CHtml::normalizeUrl(array('/home/products')); ?>" class="btn btn-default">Back to Product</a>
                                                
                        <div class="clear"></div>
                        </div>
                        <!-- end testing html -->
                        
                        <?php /*
                        <div id="cart-shop" style="display:none;">
                        <?php if (count($data)>0): ?>
                        <div class="table-responsive">
                            <table class="table table-hover shopcart">
                                <thead>
                                    <tr>
                                        <td>ITEM</td>
                                        <td style="width: 24%;">ORDER DETAIL</td>
                                        <td style="width: 20%;">PRICE</td>
                                        <td style="width: 3%;">&nbsp;</td>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $total = 0 ?>
                                <?php $weight = 0 ?>
                                <?php foreach ($data as $key => $value): ?>
                                <?php
                                        if ($value['option'] != '') {
                                            $option = PrdProductAttributes::model()->find('id_str = :id_str', array(':id_str'=>$value['option']));
                                            $value['price'] = $option->price;
                                        }
                                        $product = PrdProduct::model()->findByPk($value['id']);
                                        $weightItem = $product->berat;
                                ?>
                                <tr>
                                    <td>
                                        <div class="left pic">
                                            <img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(70,100, '/images/product/'.$value['image'] , array('method' => 'resize', 'quality' => '90')) ?>" alt="">
                                        </div>
                                        <div class="left nm-descr margin-left-20">
                                            <span class="name"><?php echo $value['name'] ?></span> <div class="clear height-3"></div>
                                            <span class="cat"><?php echo ViewCategory::model()->find('id = :id', array(':id'=>$product->category_id))->name ?></span>
                                        </div>
                                    </td>
                                    <td>
                                    <form action="<?php echo CHtml::normalizeUrl(array('/product/edit')); ?>" method="post">
                                    <?php if ($value['option'] != ''): ?>
                                    <?php echo $option->attribute ?> <div class="clear height-5"></div>
                                    <input type="hidden" value="<?php echo $value['option'] ?>" name="option">
                                    <?php endif ?>
                                    <?php if ($value['optional']['box'] != ''): ?>
                                    With box + <?php echo Cart::money($value['optional']['box']) ?> <div class="clear height-5"></div>
                                    <?php
                                    $value['price'] = $value['optional']['box'] + $value['price'];
                                    ?>
                                    <?php endif ?>
                                    QTY &nbsp;&nbsp;&nbsp;&nbsp;<input type="number" class="tranparant-back select_qty" name="qty" value="<?php echo $value['qty'] ?>">
                                    <button type="submit" class="btn-edit-cart"><i class="fa fa-refresh"></i></button>
                                    <input type="hidden" value="<?php echo $value['id'] ?>" name="id">
                                    <?php if (count($value['optional']) > 0 AND $value['optional'] != ''): ?>
                                        <?php foreach ($value['optional'] as $k => $v): ?>
                                        <input type="hidden" value="<?php echo $v ?>" name="optional[<?php echo $k ?>]">
                                        <?php endforeach ?>
                                    <?php endif ?>
                                    </form>
                                    </td>
                                    <td>
                                    <span class="price"><?php echo Cart::money($subTotal = $value['price']*$value['qty']) ?></span>
                                    </td>
                                    <td>
                                        <a href="#" class="btn back-btn-primary-blue btn-delete-cart"> <i class="fa fa-trash"></i> </a>
                                    </td>
                                </tr>
                                <?php $total = $total + $subTotal ?>
                                <?php $weight = ($weightItem*$value['qty']) + $weight ?>
                                <?php endforeach ?>
                                <tr class="sub_total">
                                    <td>&nbsp;</td>
                                    <td class="text-right"><span class="totl">SUBTOTAL</span></td>
                                    <td><span class="price"><?php echo Cart::money($total) ?></span></td>
                                    <td>&nbsp;</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="text-right fright">
                            <a href="<?php echo CHtml::normalizeUrl(array('shipping')); ?>" class="btn btn-primary">NEXT</a>
                        </div> 
                        <a href="<?php echo CHtml::normalizeUrl(array('/product/index')); ?>" class="btn btn-default">Back to Product</a>
                        <?php else: ?>
                        <h3>Shopping cart is empty</h3>
                        <?php endif; ?>
                        
                        <div class="clear"></div>
                        </div>
                        */ ?>
                       
                    </div>

                </div>
                <!-- end left content -->
            </div>

        <div class="clear height-50"></div><div class="height-20"></div>
            <div class="clear"></div>
        </div>

    <div class="clear"></div>
  </div>
</section>
