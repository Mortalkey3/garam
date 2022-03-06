<section class="outer-inside-middle-content back-white">
  <div class="prelatife container">
    <div class="tops-cont-insidepage back-building" style="background-image: url(<?php echo Yii::app()->baseUrl; ?>/images/static/<?php echo $this->setting['healty_hero_image']; ?>)"> <div class="clear height-50"></div>
        <div class="height-50"></div>
        <div class="height-50"></div>
        <div class="height-25"></div>
        <div class="tengah insd-container text-center content-up">
          <h1 class="title-pages"><?php echo $this->setting['healty_title'] ?></h1> <div class="clear height-10"></div>
          <div class="lines-chld-bgrey tengah"></div> <div class="clear height-25"></div>
          <span class="bigs"><?php echo $this->setting['healty_big_title'] ?></span> <div class="clear"></div>
          <p><?php echo nl2br($this->setting['healty_hero_content']) ?></p>
          <div class="clear"></div>
        </div>
    </div>
    <div class="clear height-50"></div>
    <div class="outers-listing-dat-topcommitments">
        <div class="row">
          <div class="col-md-4">
              <div class="itemss">
                  <div class="pict">
                    <img class="img-responsive pc-center" src="<?php echo Yii::app()->baseUrl; ?>/images/static/<?php echo $this->setting['healty_jargon_image_1']; ?>" alt="">
                  </div> 
                  <div class="clear height-3"></div>
                  <div class="desc">
                    <span class="name"><?php echo ($this->setting['healty_jargon_title_1']) ?></span> 
                    <div class="clear height-10"></div>
                    <p><?php echo nl2br($this->setting['healty_jargon_content_1']) ?></p>
                  </div>
              </div>
          </div>
          <div class="col-md-4">
              <div class="itemss">
                  <div class="pict">
                    <img class="img-responsive pc-center" src="<?php echo Yii::app()->baseUrl; ?>/images/static/<?php echo $this->setting['healty_jargon_image_2']; ?>" alt="">
                  </div> 
                  <div class="clear height-3"></div>
                  <div class="desc">
                    <span class="name"><?php echo ($this->setting['healty_jargon_title_2']) ?></span> 
                    <div class="clear height-10"></div>
                    <p><?php echo nl2br($this->setting['healty_jargon_content_2']) ?></p>
                  </div>
              </div>
          </div>
          <div class="col-md-4">
              <div class="itemss no-border">
                  <div class="pict">
                    <img class="img-responsive pc-center" src="<?php echo Yii::app()->baseUrl; ?>/images/static/<?php echo $this->setting['healty_jargon_image_3']; ?>" alt="">
                  </div> 
                  <div class="clear height-3"></div>
                  <div class="desc">
                    <span class="name"><?php echo ($this->setting['healty_jargon_title_3']) ?></span> 
                    <div class="clear height-10"></div>
                    <p><?php echo nl2br($this->setting['healty_jargon_content_3']) ?></p>
                  </div>
              </div>
          </div>

        </div>
    </div> <div class="clear height-50"></div><div class="height-20"></div>

    <div class="clear"></div>
  </div>

  <div class="back-grey mh500">
    <div class="prelatife container">
        <div class="clear height-50"></div><div class="height-25"></div>
        <div class="mw920 tengah text-center content-text building_cont">
          <div class="ill-pict"><img src="<?php echo Yii::app()->baseUrl; ?>/images/static/<?php echo $this->setting['healty_image']; ?>" alt="" class="img-responsive"></div>
          <div class="clear height-50"></div><div class="height-10"></div>
          <?php echo ($this->setting['healty_content']) ?>
          <div class="clear height-20"></div>
          <div class="shares-text">
                  <span class="inline-t">SHARE</span>&nbsp;&nbsp; / &nbsp;&nbsp;<a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(Yii::app()->request->hostInfo.Yii::app()->request->url) ?>">FACEBOOK</a>&nbsp;&nbsp; / &nbsp;&nbsp;<a target="_blank" href="https://plus.google.com/share?url=<?php echo urlencode(Yii::app()->request->hostInfo.Yii::app()->request->url) ?>">GOOGLE PLUS</a>&nbsp;&nbsp; / &nbsp;&nbsp;<a target="_blank" href="https://twitter.com/home?status=<?php echo urlencode(Yii::app()->request->hostInfo.Yii::app()->request->url) ?>">TWITTER</a>
                </div>


          <div class="clear"></div>
        </div>
      
      <div class="clear"></div> <div class="height-50"></div><div class="height-20"></div>
    </div>
  </div>
</section>