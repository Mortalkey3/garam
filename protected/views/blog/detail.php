<div class="subpage static_about">

  <section class="default_sc middle_industry_first pg_block_detailIndustry" id="industries2">
  <div class="prelatife container">
      <div class="clear height-50"></div>
      <div class="clear height-25"></div>

      <div class="insides text-center content-text">
        <h3 class="sub_title"><?php echo Tt::t('front', 'NEWS') ?></h3>
        <div class="clear height-30"></div>

        <div class="row blocks_newsDetail">
          <div class="col-md-9 col-sm-8">
            <div class="lefts_cont">
              <img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(980,1000, '/images/blog/'.$data->image , array('method' => 'resize', 'quality' => '90')) ?>" class="img-responsive" alt="<?php echo $data->description->title ?>">
              <div class="clear height-25"></div>
              <h4><?php echo $data->description->title; ?></h4>
              <div class="clear height-15"></div>
              <span class="dates"><?php echo date('d F Y', strtotime($data->date_input)) ?></span>
              <div class="clear height-25"></div>
              <?php echo $data->description->content; ?>
              <div class="clear height-10"></div>

            <div class="clear height-20"></div>
            <!-- End data industry -->
            <div class="text-left">
              <a href="<?php echo CHtml::normalizeUrl(array('/blog/index', 'lang'=>Yii::app()->language)); ?>" class="backs_tCountry"><img src="<?php echo $this->assetBaseurl ?>btns_chevron-back.png" alt="" class="img-responsive d-inline"> &nbsp;Back to News</a>
              <div class="clear"></div>
            </div>
              
              <div class="clear"></div>
            </div>
            <!-- End left content -->
          </div>
          <div class="col-md-3 col-sm-4">
            <div class="rights_cont">
              <div class="block_sl_banner_Content home_down lists_data_newsDef">
              <div class="row">
              <?php if ($dataBlogs->getTotalItemCount() > 0): ?>
                <?php foreach ($dataBlogs->getData() as $key => $value): ?>
                <div class="col-md-12 col-sm-12">
                  <div class="items">
                    <div class="picture"><a href="<?php echo CHtml::normalizeUrl(array('detail', 'id'=>$value->id, 'lang'=>Yii::app()->language)); ?>"><img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(372,190, '/images/blog/'.$value->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="" class="img-responsive center-block"></a></div>
                    <div class="info">
                      <div class="titles"><a href="<?php echo CHtml::normalizeUrl(array('detail', 'id'=>$value->id, 'lang'=>Yii::app()->language)); ?>"><?php echo $value->description->title ?></a></div>
                      <div class="clear"></div>
                      <span class="date"><?php echo date('d F Y', strtotime($value->date_input)) ?></span>
                      <div class="clear"></div>
                      <a href="<?php echo CHtml::normalizeUrl(array('detail', 'id'=>$value->id, 'lang'=>Yii::app()->language)); ?>" class="btn btn-link bt_more">Read More</a>
                      <div class="clear"></div>
                    </div>
                  </div>
                </div>
                <?php endforeach ?>
              <?php endif ?>
              </div>
              <div class="clear"></div>
            </div>
              <div class="clear"></div>
            </div>
            <!-- End Right content -->
          </div>
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