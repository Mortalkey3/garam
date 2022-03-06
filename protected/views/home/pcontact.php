<?php
$this->pageTitle = $this->setting['contact_title'].' - '.$this->pageTitle;
?>
<div class="clear height-10"></div>
<div class="prelatife container">
  
  <div class="blocks_border_defaults pb15">
    <div class="ins text-center">
      <div class="top">
        <h3><?php echo $this->setting['contact_title'] ?></h3>
      </div>
      <div class="middle content-text text-center tx_contact">
        <div class="clear height-25"></div>
        
        <div class="mw750 tengah">
          <?php echo $this->setting['contact_content'] ?>
          <div class="clear height-10"></div>
          <div class="lines-grey"></div>
          <div class="clear height-40"></div>

          <?php echo $this->renderPartial('//home/_form_contact2', array( 'model'=>$model )); ?>

          <div class="clear"></div>
        </div>

        <div class="clear height-20"></div>

        <div class="clear"></div>
      </div>
    </div>
  </div>

  <div class="clear"></div>
</div>
<div class="clear height-50"></div>