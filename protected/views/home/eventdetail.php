<div class="blocks_subpage_banner product mah225">
  <div class="container prelatife">
    <div class="clear h70"></div>
    <h3 class="sub_title_p">EVENTS</h3>
    <div class="clear"></div>
    <div class="lines_browns_md tengah"></div>
    <div class="clear height-20"></div>
    <h5><?php echo $detail->description->title ?></h5>
    <div class="clear"></div>
  </div>
</div>

<div class="clear"></div>
<div class="subpage static">
  <div class="prelatife container">
    <div class="clear height-50"></div><div class="height-40"></div>
    
    <div class="maw950 tengah">
        <div class="banner_register_events howto">
            <img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(950,1000, '/images/gallery/'.$detail->image , array('method' => 'resize', 'quality' => '90')) ?>" alt="" class="img-responsive">
            <div class="clear height-50"></div>
            <div class="linesbrown_event tengah"></div>
            <div class="clear height-50"></div>
            <?php echo $detail->description->content ?>
            <div class="clear height-30"></div>
            <div class="linesbrown_event tengah"></div>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
    </div>

    <div class="clear height-40"></div>
    <div class="clear height-40"></div>
  </div>

  <div class="clear"></div>
</div>