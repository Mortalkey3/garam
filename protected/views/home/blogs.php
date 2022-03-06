<section class="default_sc top_inside_pg_default">
  <div class="out_table">
    <div class="in_table">
      <div class="prelatife container">
        <h1 class="sub_titlepage">Berita & Artikel</h1>
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
      
      <div class="outers_listing_newshome defaults_t">
            <div class="row default">
                <?php for ($j=1; $j < 4; $j++) { ?>
                  <?php for ($i=1; $i < 4; $i++) { ?>
                    <div class="col-md-4 col-sm-4">
                        <div class="items">
                            <div class="pict"><img src="<?php echo $this->assetBaseurl; ?>blog_home_news-<?php echo $i ?>.jpg" alt="" class="img-responsive"></div>
                            <div class="desc">
                                <div class="titles">Dunia merekomendasikan plastik untuk penggunaan barang houseware</div>
                                <div class="clear"></div>
                                <span class="dates">18 May 2016</span>
                                <div class="clear"></div>
                                <a href="<?php echo CHtml::normalizeUrl(array('/home/blogDetail')); ?>" class="btn btn-default btns_news_default">BACA</a>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                <?php } ?>
            </div>
            <div class="clear"></div>
        </div>
        <!-- end listing news -->
        <div class="clear height-10"></div>
      <div class="clear"></div>
    </div>
    <!-- end content berita artikel -->
    <div class="text-center bgs_paginations">
          <ul class="pagination">
            <li>
              <a href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
              </a>
            </li>
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li>
              <a href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
              </a>
            </li>
          </ul>
        </div>
    <div class="clear height-20"></div>

    <div class="clear"></div>
  </div>
</section>