<?php
$session = new CHttpSession;
$session->open();
?>
<div class="subpage_product">
  <section class="default_sc blocks_bannerBox_home back-whiteimp" id="block_homesection">
    <div class="clear height-20"></div>
    <div class="prelatife container">
        <div class="bloc_breadcrumb">
          <ol class="breadcrumb">
            <li><a href="<?php echo CHtml::normalizeUrl(array('/home/index')); ?>">Home</a></li>
            <li class="active">My Cart</li>
          </ol>
          <div class="clear"></div>
        </div>
        <div class="clear"></div>
    </div>

    <div class="in_box_product back-white">
      <div class="prelatife container">
        <div class="content-text text-center">
            <div class="clear height-30"></div>
            <h3>MY CART</h3>
        </div>
        <div class="insides padding-top-15 middles_inProduct_detail">

            <!-- Start cont carts -->
            <div class="outer-cont-carts"> 
            <div class="clear height-40"></div>
            <div class="row">
                <div class="col-md-12">
                    <div class="left-conts-tabl-cart content-text">

                        <?php if(Yii::app()->user->hasFlash('success')): ?>
                            <?php $this->widget('bootstrap.widgets.TbAlert', array(
                                'alerts'=>array('success'),
                            )); ?>
                        <?php endif; ?>
                        
                        <div id="cart-shop">
                        <?php if (count($data)>0): ?>
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
                                <?php $total = 0 ?>
                                <?php $weight = 0 ?>
                                <?php foreach ($data as $key => $value): ?>
                                <?php
                                        if ($value['option'] != '') {
                                            $option = PrdProductAttributes::model()->find('id = :id', array(':id'=>$value['option']));
                                            $value['price'] = $option->price;
                                        }
                                        $product = PrdProduct::model()->findByPk($value['id']);
                                        $weightItem = $product->berat;
                                ?>
                                <?php /*
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
                                </tr> */ ?>
                                <tr>
                                    <td>
                                        <div class="left pic">
                                            <img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(70,100, '/images/product/'.$value['image'] , array('method' => 'resize', 'quality' => '90')) ?>" alt="">
                                        </div>
                                        <div class="left nm-descr margin-left-20">
                                            <span class="name"><?php echo $value['name'] ?></span> <div class="clear height-3"></div>
                                            <?php if ($value['optional']['garansi'] != ''): ?>
                                            <?php
                                            $value['optional']['garansi'] =  explode('|', $value['optional']['garansi']);
                                            $value['price'] = $value['optional']['garansi'][0] + $value['price'];
                                            ?>
                                            <span class="cat"><?php echo $value['optional']['garansi'][1] ?></span>
                                            <?php endif ?>
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
                            <a href="<?php echo CHtml::normalizeUrl(array('/cart/shipping')); ?>" class="btn btn-primary">NEXT</a>
                        </div> 
                        <a href="javascript:window.history.go(-1);" class="btn btn-default">Back to Product</a>
                        <?php else: ?>
                        <h2>Inquiry list is empty, continue shopping <a href="<?php echo CHtml::normalizeUrl(array('/product/index')); ?>">here</a></h2>
                        <?php endif; ?>   
                        <div class="clear"></div>
                        </div>
                        <!-- end testing html -->
                        
                    </div>

                </div>
                <!-- end left content -->
            </div>

        <div class="clear height-50"></div><div class="height-20"></div>
            <div class="clear"></div>
    </div>
            <!-- End cont carts -->

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

<script type="text/javascript">
    $('.btn-delete-cart').live('click', function() {
        var nameProd = $(this).parent().parent().find('.name').html();
        if (confirm('Are you sure to delete the product "'+nameProd+'"') == true) {
            var data = $(this).parent().parent().find('form').serialize();
            $.ajax({
                url: url_edit_cart_action,
                data: data+'&ajax=ajax&qty=0',
                dataType: 'html',
                type: 'post',
                success: function(msg){
                    $( ".left-conts-tabl-cart" ).load( baseurl+"/cart/shop #cart-shop" );
                },
                error: function(msg){
                    alert('sending data error, cek your connection');
                    console.log(msg);
                }
            });
        };
        return false;
    })
    $('.select_qty').live('change', function() {
        var data = $(this).parent().parent().parent().find('form').serialize();
        $.ajax({
            url: url_edit_cart_action,
            data: data+'&ajax=ajax',
            dataType: 'html',
            type: 'post',
            success: function(msg){
                $( ".left-conts-tabl-cart" ).load( baseurl+"/cart/shop #cart-shop" );
            },
            error: function(msg){
                alert('sending data error, cek your connection');
                console.log(msg);
            }
        });
        return false;
    })
    $('.btn-edit-cart').live('click', function() {
        var data = $(this).parent().parent().parent().find('form').serialize();
        $.ajax({
            url: url_edit_cart_action,
            data: data+'&ajax=ajax',
            dataType: 'html',
            type: 'post',
            success: function(msg){
                $( ".left-conts-tabl-cart" ).load( baseurl+"/cart/shop #cart-shop" );
            },
            error: function(msg){
                alert('sending data error, cek your connection');
                console.log(msg);
            }
        });
        return false;
    })
</script>