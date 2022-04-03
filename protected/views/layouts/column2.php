<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>

<div class="preloader">
    <div class="loading">
    <div class="spinner-border" role="status">
        <span class="sr-only">Loading...</span>
    </div>
    </div>
</div>

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
<style type="text/css">
    .preloader {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 9999;
        background-color: #fff;
    }
    .loading {
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%,-50%);
        font: 14px arial;
    }
</style>
<script>
  $(window).on('load', function() {
    $(".preloader").fadeOut("slow");
    window.scrollTo(0, 0);
    
  });
  // $(document).ready(function(){
  //   $(this).scrollTop(0);
  // });
</script>
<?php $this->endContent(); ?>


