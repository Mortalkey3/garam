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
<script type="text/javascript">
    /*$(function(){
        var $item = $('.carousel .item'); 
        var $wHeight = $(window).height();
        $item.eq(0).addClass('active');
        $item.height($wHeight); 
        $item.addClass('full-screen');

        $('.carousel img').each(function() {
          var $src = $(this).attr('src');
          var $color = $(this).attr('data-color');
          $(this).parent().css({
            'background-image' : 'url(' + $src + ')',
            'background-color' : $color
          });
          $(this).remove();
        });

        $(window).on('resize', function (){
          $wHeight = $(window).height();
          $item.height($wHeight);
        });

        $('.carousel').carousel({
          interval: 4000,
          pause: "false"
        });
    })*/
</script>
<?php $this->endContent(); ?>





<?php /* @var $this Controller  ?>
<?php $this->beginContent('//layouts/main'); ?>

<?php echo $this->renderPartial('//layouts/_header', array()); ?>
<div class="clear"></div>
<?php echo $content ?>

<?php echo $this->renderPartial('//layouts/_footer', array()); ?>
<?php $this->endContent();*/ ?>