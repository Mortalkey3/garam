<div class="blocks_subpage_banner product">
  <div class="container prelatife">
    <div class="clear h70"></div>
    <h3 class="sub_title_p">Error <?php echo $error['code'] ?></h3>
    <div class="clear"></div>
    <div class="lines_browns_md tengah"></div>
    <div class="clear height-20"></div>
    <h5><?php echo $error['message'] ?></h5>

    <div class="clear"></div>
  </div>
</div>

<div class="clear"></div>
<div class="subpage product">
  <div class="prelatife container">
    <div class="block_banner_producttop">
      <div class="row list_banner">
        <?php foreach ($categories as $key => $value): ?>
        <div class="col-md-4">
          <div class="items">
            <div class="pict"><a href="<?php echo CHtml::normalizeUrl(array('/product/list', 'category'=>$value->id)); ?>"><img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(391,333, '/images/category/'.$value->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="" class="img-responsive"></a></div>
            <div class="desc">
              <h4><a href="<?php echo CHtml::normalizeUrl(array('/product/list', 'category'=>$value->id)); ?>"><?php echo $value->description->name ?></a></h4>
              <p><a href="<?php echo CHtml::normalizeUrl(array('/product/list', 'category'=>$value->id)); ?>"><?php echo $value->description->desc ?></a></p>
              <div class="clear"></div>
            </div>
            <div class="clear"></div>
          </div>
        </div>
        <?php endforeach ?>

      </div>
      <div class="clear"></div>
    </div>

    <div class="clear height-40"></div>

    <div class="blocks_outers_products_data">
      <h5 class="sub_title text-center">STUMBLE UPON&rsquo;S FEATURED PRODUCTS</h5>
      <div class="clear height-20"></div><div class="height-3"></div>

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
      <div class="clear height-0"></div>
      <div class="text-center">
        <a href="<?php echo CHtml::normalizeUrl(array('/product/list')); ?>" class="btn btn-default btn_brown_def">VIEW ALL STUMBLE UPON PRODUCTS</a>
        <div class="clear"></div>
      </div>
      <div class="clear height-50"></div>
      <div class="clear height-15"></div>

      <div class="clear"></div>
    </div>

    <div class="clear"></div>
  </div>
</div>



