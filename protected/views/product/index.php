<div class="subpage_product">
  <section class="default_sc blocks_bannerBox_home back-whiteimp" id="block_homesection">
    <div class="clear height-25"></div>

    <div class="in_box_product back-white">
      <div class="prelatife container">

        <div class="tops purple text-center">
          <div class="row">
            <div class="col-md-6">
              <?php if ($strCategory != null): ?>

<?php
$bread = PrdCategory::model()->getBreadcrump($_GET['category'], $this->languageID);
$bread = array_reverse($bread,true);
$dataCategory = array();
foreach ($bread as $key => $value) {
  // $this->breadcrumbs[$key]=$value;
  array_push($dataCategory, $key);
}
$dataCategory = array_reverse($dataCategory);
?>

                <?php if ($_GET['q'] != ''): ?>
                <h3 class="sub_title">Cari "<?php echo $_GET['q'] ?>" di kategori <?php echo implode(' -> ', $dataCategory) ?></h3>
                <?php else: ?>
                <h3 class="sub_title">Kategori <?php echo implode(' -> ', $dataCategory) ?></h3>
                <?php endif ?>
                <?php /*
                <?php if ($_GET['q'] != ''): ?>
                <h3 class="sub_title">Cari "<?php echo $_GET['q'] ?>" di kategori <?php echo $strCategory->description->name ?><?php if ($strParentCategory != null): ?> - <?php echo $strParentCategory->description->name ?><?php endif ?></h3>
                <?php else: ?>
                <h3 class="sub_title">Kategori <?php echo $strCategory->description->name ?><?php if ($strParentCategory != null): ?> - <?php echo $strParentCategory->description->name ?><?php endif ?></h3>
                <?php endif ?>
                */ ?>
              <?php elseif($_GET['q'] != ''): ?>
              <h3 class="sub_title">Cari "<?php echo $_GET['q'] ?>" di kategori <?php echo $strCategory->description->name ?><?php if ($strParentCategory != null): ?> - <?php echo $strParentCategory->description->name ?><?php endif ?></h3>
              <?php else: ?>
              <h3 class="sub_title">Cari Semua Produk</h3>
              <?php endif ?>
            </div>
            <div class="col-md-6">
              <div class="t_back_categorys">
                <?php if ($strParentCategory != null): ?>
                <a href="<?php echo CHtml::normalizeUrl(array('/product/landing', 'category'=>$strParentCategory->id)); ?>">Kembali ke Kategori <?php echo $strParentCategory->description->name ?> &nbsp;<i class="fa fa-chevron-right"></i></a>
                <?php endif ?>
              </div>
            </div>
          </div>
        </div>
        <div class="insides padding-top-15 middles_inProduct">
<?php
$get = array();
if ($_GET['category'] != '') {
  $get['category'] = $_GET['category'];
}
?>
          
          <!-- Start inside product l -->
          <div class="row">
            <div class="col-md-3">
              <div class="lefts_product">
                <div class="tops">
                  <div class="row">
                    <div class="col-xs-8">
                      <span>FILTERS</span>
                    </div>
                    <div class="col-xs-4">
                      <a href="<?php echo $this->createUrl('/product/index', $get) ?>">RESET</a>
                    </div>
                  </div>
                </div>
                <div class="middles">
                  <form action="<?php echo $this->createUrl('/product/index', $get) ?>" method="get" id="form-filter">
                  <?php if ($strParentCategory != null): ?>
                  <?php foreach ($typeLabel as $key => $value): ?>
                  <div class="sub_list">
                    <span><?php echo $value['data']->description->name ?></span>
                    <div class="clear height-2"></div>
                      <?php foreach ($value['child'] as $val): ?>
                      <div class="form-group">
                        <div class="checkbox">
                          <label>
                            <input class="select-filter" type="checkbox" name="<?php echo $value['data']->kode ?>[]" value="<?php echo $val->kode ?>" <?php if (isset($_GET[$value['data']->kode]) AND in_array($val->kode, $_GET[$value['data']->kode])): ?>checked<?php endif ?>>
                            <?php echo $val->description->name ?>
                          </label>
                        </div>
                      </div>
                      <?php endforeach ?>
                  </div>
                  <?php endforeach ?>
                  <div class="sub_list">
                    <span>BRAND</span>
                    <div class="clear height-2"></div>
                      <?php foreach ($dataBrand as $key => $value): ?>
                      <div class="form-group">
                        <div class="checkbox">
                          <label>
                            <input class="select-filter" type="checkbox" name="brand[]" value="<?php echo $value->kode ?>" <?php if (isset($_GET['brand']) AND in_array($value->kode, $_GET['brand'])): ?>checked<?php endif ?>>
                            <?php echo $value->description->title ?>
                          </label>
                        </div>
                      </div>
                      <?php endforeach ?>

                  </div>
                  <?php endif ?>
                  <div class="sub_list">
                    <span>PRICE</span>
                    <div class="clear height-2"></div>
                      <div class="form-group">
                        <div class="radio">
                          <label>
                            <input class="select-filter" type="radio" name="order" value="low-hight" <?php if ($_GET['order'] == 'low-hight' OR $_GET['order'] == ''): ?>checked<?php endif ?>>
                            low to high
                          </label>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="radio">
                          <label>
                            <input class="select-filter" type="radio" name="order" value="hight-low" <?php if ($_GET['order'] == 'hight-low'): ?>checked<?php endif ?>>
                            high to low
                          </label>
                        </div>
                      </div>
                  </div>
                  </form>

                  <div class="clear"></div>
                </div>
              </div>
            </div>
            <div class="col-md-9">
              <div class="rights_product padding-left-15">
<?php
$data = $product->getData();
?>
                <div class="h38 tops_info">
                  <span>Showing <?php echo $product->pagination->offset+1 ?> - <?php echo $product->pagination->offset+$product->itemCount ?> of <?php echo $product->totalItemCount ?> item(s)</span>
                </div>

                <?php if ($product->getTotalItemCount() > 0): ?>

                <!-- start product data -->
                <div class="lists_product_data">
                  <?php foreach ($data as $key => $value): ?>
                    <div class="items prelatife">
                      <div class="t_info prelatife">
                        <div class="row">
                          <div class="col-xs-4 lgo_brands">
                            <img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(100,35, '/images/brand/'.$value->brand->image , array('method' => 'resize', 'quality' => '90')) ?>" alt="">
                          </div>
                          <div class="col-xs-8">
                            <div class="blocks_recom">
                              <?php if (1 == $value->terbaru): ?>
                              <img src="<?php echo $this->assetBaseurl ?>backs_con_right_top_products-yellow2.png" alt="">  
                              <?php elseif($value->harga_coret > $value->harga): ?>
                              <img src="<?php echo $this->assetBaseurl ?>backs_con_right_top_products2.png" alt="">
                              <?php endif ?>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="b_titles">
                        <?php echo $value->description->name ?>
                      </div>
                      <div class="picture">
                        <a href="<?php echo CHtml::normalizeUrl(array('/product/detail', 'id'=>$value->id)); ?>">
                        <img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(250,250, '/images/product/'.$value->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="" class="img-responsive center-block">
                        </a>
                      </div>
                      <div class="bloc_bottom">
                        <div class="row">
                          <div class="col-xs-9">
                            <div class="prices">
                              <?php if ($value->harga_coret > $value->harga): ?>
                              <span class="through">Harga Normal <i><?php echo Cart::money($value->harga_coret) ?></i></span>
                              <span>Kini <b><?php echo Cart::money($value->harga) ?></b></span>
                              <small>Hemat <?php echo Cart::money($value->harga_coret - $value->harga) ?></small>
                              <?php else: ?>
                              <span class="through">&nbsp;</span>
                              <span><b><?php echo Cart::money($value->harga) ?></b></span>
                              <small>&nbsp;</small>
                              <?php endif ?>
                            </div>
                          </div>
                          <div class="col-xs-3 text-right">
                            <?php
                            $dataSerial = unserialize($value->data);
                            ?>
                            <?php if ($dataSerial['feature'] != ''): ?>
                            <i class="infree_shipping"></i>
                            <?php endif ?>
                            <div class="clear"></div>
                            <a href="<?php echo CHtml::normalizeUrl(array('/product/detail', 'id'=>$value->id)); ?>" class="btn btn-link btns_blueProducts"><i class="fa fa-search"></i></a>
                          </div>
                        </div>
                      </div>
                      <div class="clear"></div>
                    </div>
                  <?php endforeach ?>
                </div>
                <!-- end product data -->
                <?php else: ?>
                <h3 class="text-center">No Data</h3>
                <?php endif ?>
                <div class="clear height-5"></div>
                <div class="ln_paginations">
                  <nav>
                  <?php $this->widget('CLinkPager', array(
                      'pages' => $product->getPagination(),
                      'header' => '',
                      'htmlOptions' => array('class'=>'pagination'),
                      'selectedPageCssClass' => 'active',
                  )) ?>
                  </nav>
                  <div class="clear"></div>
                </div>

                <div class="clear"></div>
              </div>
            </div>
          </div>
          <!-- End inside product l -->
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

<script type="text/javascript">
$('.select-filter').on('change', function() {
  $('#form-filter').submit();
})
</script>









