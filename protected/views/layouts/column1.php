<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<?php echo $this->renderPartial('//layouts/_header', array(
			'page'=>$this->page)); ?>

<header>

  <!-- This div is  intentionally blank. It creates the transparent black overlay over the video which you can modify in the CSS -->
  <div class="overlay"></div>

  <!-- The HTML5 video element that will create the background video on the header -->
  <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
    <source src="https://seasalt.com/bundles/saltworkstheme/saltworks/images/demo/hero-video-720.mp4" type="video/mp4" id="izs5-2">
        
  </video>
  
  <!-- <img src="<?php echo Yii::app()->baseUrl; ?>/asset/images/Mound of Salt.jpg" /> -->

  <!-- The header content -->
  <div class="container h-100">
    <div class="d-flex h-100 text-center align-items-center">
      <div class="w-100 text-white">
        <p class="lead mb-0">We are entrusted to supply the world's most essential mineral, enhancing life for every person, everyday.</p>
      </div>
    </div>
  </div>
</header>

<div class="middles_wrapper_cont tops_home">
    <!-- Start fcs -->
    
   
<?php echo $content ?>

<?php echo $this->renderPartial('//layouts/_footer', array()); ?>
   <div class="clear"></div>
</div>
<script type="text/javascript">
    $(function(){
        // $('#myCarousel_home.homeslide').on('slid.bs.carousel', function (e){
        //     $('.blocks_right_inText_fcs').show();
        //     var slideFrom = $(this).find('.active').index();
        //     if ( $(this).find('.active').find('.hidden-xs').hasClass('hides_tx') )
        //     {
        //         $('.blocks_right_inText_fcs').hide();
        //     }

        // });

        // if ( $('#myCarousel_home.homeslide .item').eq(0).find('.hidden-xs').hasClass('hides_tx') )
        // {
        //     $('.blocks_right_inText_fcs').hide();
        // }

        var windw_full = $(window).width();

        if (windw_full >= 768){
            var $item = $('.carousel.homeslide .item');
            var $wHeight = $(window).height();
            $item.eq(0).addClass('active');
            $item.height($wHeight); 
            $item.addClass('full-screen');

            $('.carousel.homeslide img.full_img').each(function() {
              var $src = $(this).attr('src');
              var $color = $(this).attr('data-color');
              $(this).parent().parent().css({
                'background-image' : 'url(' + $src + ')',
                'background-color' : $color
              });
              
              $(this).remove();
            });

            $(window).on('resize', function (){
              $wHeight = $(window).height();
              $item.height($wHeight);
            });

            $('.carousel.homeslide').carousel({
              interval: 6000,
              pause: "true"
            });
        }
    });
</script>
<style>
    .custom-blockFcs_customs_down,
    .outers_fcs_wrapper .carousel-caption{
        /*display: none;*/
    }
</style>
<style>
    header {
  position: relative;
  background-color: black;
  height: 90vh;
  min-height: 25rem;
  width: 100%;
  overflow: hidden;
}

header video {
  position: absolute;
  top: 50%;
  left: 50%;
  min-width: 100%;
  min-height: 100%;
  width: auto;
  height: auto;
  z-index: 0;
  -ms-transform: translateX(-50%) translateY(-50%);
  -moz-transform: translateX(-50%) translateY(-50%);
  -webkit-transform: translateX(-50%) translateY(-50%);
  transform: translateX(-50%) translateY(-50%);
}

header .container {
  position: relative;
  z-index: 2;
}

header .overlay {
  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
  width: 100%;
  background-color: black;
  opacity: 0.5;
  z-index: 1;
}

/* Media Query for devices withi coarse pointers and no hover functionality */

/* This will use a fallback image instead of a video for devices that commonly do not support the HTML5 video element */

@media (pointer: coarse) and (hover: none) {
  header {
    background: url('https://source.unsplash.com/XT5OInaElMw/1600x900') black no-repeat center center scroll;
  }

  header video {
    display: none;
  }
}
</style>
<?php $this->endContent(); ?>