<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
  <div class="head_subpage">
    <?php echo $this->renderPartial('//layouts/_header', array(
      'page'=>$this->page,
      'subPage'=>$this->subPage
    )); ?>
  </div>
  <div class="clear"></div>
  <div class="middles_wrapper_cont tops_home">
   
    <?php echo $content ?>

    <?php echo $this->renderPartial('//layouts/_footer', array()); ?>
   <div class="clear"></div>
</div>
<?php $this->endContent(); ?>


