
<div class="subpage static_about">
  
  <section class="default_sc middle_industry_first pg_cheetham_privateLabel" id="industries2">
  <div class="prelatife container">
      <div class="clear height-50"></div>
      <div class="clear height-25"></div>
      <div class="insides text-center content-text">
        <div class="maw760 tengah">
          <h3 class="sub_title"><?php echo nl2br($this->setting['labeling_hero_title']) ?></h3>
          <div class="clear height-35"></div>
          <img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(760,2500, '/images/static/'. $this->setting['labeling_picture'] , array('method' => 'resize', 'quality' => '90')) ?>" alt="" class="img-responsive center-block">
          <div class="clear height-30"></div>
          <h4 class="sub_title"><?php echo $this->setting['labeling_sub_title'] ?></h4>
          <div class="clear height-15"></div>
          <?php echo $this->setting['labeling_content'] ?>
          <div class="clear height-50"></div>
          <?php echo $this->renderPartial('//home/_form_contact2', array('model'=>$model)); ?>
          <div class="clear"></div>
        </div>

        <div class="clear height-50"></div>
        <div class="clear height-30"></div>
        <div class="clear"></div>
      </div>
      <div class="clear"></div>
  </div>
  </section>

  <div class="clear"></div>
</div>
<!-- End subpage static -->