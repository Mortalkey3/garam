<div class="clear"></div>
<div class="subpage static_about">
  <section class="default_sc top_Grey_block_tpage">
    <div class="prelatife container">
        <div class="row">
          <div class="col-md-9 col-sm-9">
            <div class="out_breadcrumbs">
              <ol class="breadcrumb">
                <li><a href="<?php echo CHtml::normalizeUrl(array('/home/index')); ?>">Home</a></li>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/home/promotion')); ?>">Promotion</a></li>
                <li class="active"><?php echo $dataBlog->description->title ?></li>
              </ol>
            </div>
          </div>
          <div class="col-md-3 col-sm-3">
            <div class="back_tModels"><a href="<?php echo CHtml::normalizeUrl(array('/home/promotion')); ?>"><i class="fa fa-arrow-left"></i> &nbsp;Kembali ke Promotion</a></div>
          </div>
        </div>
      <div class="clear"></div>
    </div>
  </section>

  <section class="default_sc middle_model_First back-white" id="product1">
      <div class="prelatife container">
          <div class="insides mw960 tengah content-text">
            <div class="mw820 tops tengah text-center margin-bottom-50">
                <h2 class="title_sb"><?php echo $dataBlog->description->title ?></h2>
                <div class="clear"></div>
            </div>

            <div class="blocks_info_descPromotions text-center">
              <div class="pictures padding-bottom-40"><img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(960,1000, '/images/blog/'.$dataBlog->image , array('method' => 'resize', 'quality' => '90')) ?>" alt="" class="img-responsive center-block"></div>
              <div class="info tengah">
                <?php echo $dataBlog->description->content ?>
              </div>
              <div class="clear"></div>
            </div>
            <div class="clear"></div>
          </div>
      </div>
  </section>

</div>
<!-- End subpage static -->