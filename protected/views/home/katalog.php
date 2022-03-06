<section class="default_sc top_inside_pg_default">
  <div class="out_table">
    <div class="in_table">
      <div class="prelatife container">
        <h1 class="sub_titlepage">Download Katalog</h1>
        <div class="clear"></div>
      </div>
      <div class="clear"></div>
    </div>
  </div>
</section>
<section class="default_sc insides_middleDefaultpages back-white">
  <div class="prelatife container">
    <div class="clear height-50"></div><div class="height-5"></div>
    <div class="content-text text-center">
        <p>Katalog versi online dapat diunduh di bawah ini untuk kenyamanan para pelanggan perabotplastik.com</p>
        <div class="clear height-15"></div>
        <div class="list_downloads_item">
          <ul class="list-inline">
            <?php foreach ($dataPdf as $key => $value): ?>
              
            <li>
              <div class="items">
                <div class="picts"><a href="<?php echo Yii::app()->baseUrl ?>/images/pdf/<?php echo $value->file ?>" class="" download><img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(233,295, '/images/pdf/'.$value->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="" class="img-responsive"></a></div>
                <div class="clear height-15"></div>
                <div class="desc">
                  <span class="names"><?php echo $value->nama ?></span>
                  <div class="clear"></div>
                  <a href="<?php echo Yii::app()->baseUrl ?>/images/pdf/<?php echo $value->file ?>" class="download btn btn-link" download><img src="<?php echo $this->assetBaseurl; ?>icon-katalog_pdf-download.png" alt="" class="inline-pict"> &nbsp;&nbsp;Download</a>
                  <div class="clear"></div>
                </div>
              </div>
            </li>
            <?php endforeach ?>
          </ul>
          <div class="clear"></div>
        </div>
        <!-- end list download item -->
        <div class="clear height-40"></div>

        <div class="clear height-30"></div>
      <div class="clear"></div>
    </div>

    <div class="clear"></div>
  </div>
</section>