<div class="subpage static_about">

  <section class="default_sc middle_industry_first pg_block_detailIndustry" id="industries2">
	<div class="prelatife container">
      <div class="clear height-50"></div>
      <div class="clear height-25"></div>
  		<div class="insides text-center content-text">
        <h3 class="sub_title"><?php echo $this->setting['industry_hero_title'] ?></h3>
        <div class="clear height-0"></div>
        <h4><?php echo $data->description->title ?></h4>
        <div class="clear height-5"></div>
        <div class="maw570 tengah">
          <?php echo $data->description->content ?>
        </div>

        <div class="clear height-30"></div>

        <?php 
        $othersImage = GalleryImage::model()->findAll('gallery_id = :gallery_id', array(':gallery_id'=>$data->id));
        $jumlah_data = false;
        $jum_other = count($othersImage);
        if ($jum_other == 1) {
          $jumlah_data = 1;
        } else {
          $jumlah_data = false;
        }
        
        ?>
        <!-- Start data industry -->
        <div class="lists_data_nwIndustry">
          <div class="row default">
            <?php foreach ($othersImage as $key => $vals) { ?>
            <?php if ($jumlah_data == 1): ?>
            <div class="col-md-4 col-sm-6"></div>
            <?php endif ?>
            <div class="col-md-4 col-sm-6">
              <div class="items prelatife">
                <img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(362,362, '/images/gallery/'. $vals->image, array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="<?php echo $data->description->title ?>" class="img-responsive center-block">
              </div>
            </div>
            <?php if ($jumlah_data == 1): ?>
            <div class="col-md-4 col-sm-6"></div>
            <?php endif ?>
            <?php } ?>
          </div>
        </div>
        <!-- End data industry -->
        <div class="clear height-30"></div>
        <div class="text-center">
          <a href="<?php echo CHtml::normalizeUrl(array('/home/industry', 'lang'=>Yii::app()->language)); ?>" class="backs_tCountry"><img src="<?php echo $this->assetBaseurl ?>btns_chevron-back.png" alt="" class="img-responsive d-inline"> &nbsp;Back to Industries</a>
          <div class="clear"></div>
        </div>
        <div class="clear height-50"></div>
        <div class="clear height-50"></div>

        <div class="clear"></div>
  		</div>
  		<div class="clear"></div>
	</div>
  </section>

  <div class="clear"></div>
</div>
<!-- End subpage static -->