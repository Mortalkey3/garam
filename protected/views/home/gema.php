<section class="outer-inside-middle-content back-white">
  <div class="prelatife container">
    <div class="tops-cont-insidepage back-pgema"> <div class="clear height-50"></div>
        <div class="height-50"></div>
        <div class="height-50"></div>
        <div class="height-25"></div>
        <div class="tengah insd-container mw930 text-center content-up hidden-xs">
          <?php if ($this->setting['gema_hide'] == 0): ?>
          <h1 class="title-pages">GE-MA</h1> <div class="clear height-10"></div>
          <div class="lines-chld-bgrey tengah"></div> <div class="clear height-25"></div>
          <?php endif ?>
          <span class="bigs">EMPOWER THE GENERATION</span> <div class="clear"></div>
          <div class="insd-container tengah text-center">
            <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ut nibh ullamcorper, vulputate velit et, condimentum libero. Curabitur vitae erat vel ex blandit lobortis. Cras efficitur ex vitae augue vehicula, sed elementum libero facilisis. Aenean eget diam eget libero blandit lacinia. Vivamus et augue nec mi consectetur accumsan sit amet ut metus. Mauris tempor ex eu felis maximus, vel auctor diam tempus. Sed pretium ligula non lacus maximus semper.</p> -->
            <p><?php echo nl2br($this->setting['gema_hero_content']) ?></p>
          </div>
          <div class="clear"></div>
        </div>
    </div>
    <div class='pindahan_text-heroimage visible-xs'>
      <?php if ($this->setting['gema_hide'] == 0): ?>
          <h1 class="title-pages">GE-MA</h1> <div class="clear height-10"></div>
          <div class="lines-chld-bgrey tengah"></div> <div class="clear height-25"></div>
          <?php endif ?>
          <span class="bigs">EMPOWER THE GENERATION</span> <div class="clear"></div>
          <div class="insd-container tengah text-center">
            <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ut nibh ullamcorper, vulputate velit et, condimentum libero. Curabitur vitae erat vel ex blandit lobortis. Cras efficitur ex vitae augue vehicula, sed elementum libero facilisis. Aenean eget diam eget libero blandit lacinia. Vivamus et augue nec mi consectetur accumsan sit amet ut metus. Mauris tempor ex eu felis maximus, vel auctor diam tempus. Sed pretium ligula non lacus maximus semper.</p> -->
            <p><?php echo nl2br($this->setting['gema_hero_content']) ?></p>
          </div>
          <div class="clear"></div>
    </div>
    <div class="clear"></div>
  </div>

  <div class="back-grey mh500">
    <div class="prelatife container">
        <div class="clear height-50"></div>
          <div class="height-45"></div>
          <div class="middles">
            
            <div class="mw920 tengah text-center content-text">
                <h5><?php echo $this->setting['gema_title_content'] ?></h5> <div class="clear height-30"></div>
                <?php echo ($this->setting['gema_content_1']) ?>
                <div class="clear height-50"></div>
                <div class="clear height-10"></div>
            </div>
          </div>
        </div>
  </div>
                
            <div class="ill-abouts gemafull"><img src="<?php echo $this->assetBaseurl; ?>ill-gema.jpg" alt="" class="img-responsive"></div>
  <div class="back-grey mh500">
    <div class="prelatife container">
          <div class="middles">

            <div class="mw920 tengah text-center content-text">
                <div class="clear height-40"></div>
                <div class="height-10"></div>
                <div class="height-10"></div>
                <?php echo ($this->setting['gema_content_2']) ?>

                <div class="clear height-40"></div>
                <div class="shares-text">
                  <span class="inline-t">SHARE</span>&nbsp;&nbsp; / &nbsp;&nbsp;<a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(Yii::app()->request->hostInfo.Yii::app()->request->url) ?>">FACEBOOK</a>&nbsp;&nbsp; / &nbsp;&nbsp;<a target="_blank" href="https://plus.google.com/share?url=<?php echo urlencode(Yii::app()->request->hostInfo.Yii::app()->request->url) ?>">GOOGLE PLUS</a>&nbsp;&nbsp; / &nbsp;&nbsp;<a target="_blank" href="https://twitter.com/home?status=<?php echo urlencode(Yii::app()->request->hostInfo.Yii::app()->request->url) ?>">TWITTER</a>
                </div>

                <div class="clear"></div>
            </div>

            <div class="clear"></div>
          </div>

          <div class="clear"></div>
        </div>
      
      <div class="clear"></div> <div class="height-50"></div><div class="height-20"></div>
    </div>
  </div>
</section>