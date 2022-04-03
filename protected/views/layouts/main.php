<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="language" content="<?php echo Yii::app()->language ?>" />

    <meta name="keywords" content="<?php echo CHtml::encode($this->metaKey); ?>">
    <meta name="description" content="<?php echo CHtml::encode($this->metaDesc); ?>">
    
    <link rel="Shortcut Icon" href="<?php echo Yii::app()->baseUrl.Yii::app()->theme->baseUrl; ?>/asset/images/favicon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo Yii::app()->baseUrl.'/asset/images/'; ?>favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo Yii::app()->baseUrl.'/asset/images/'; ?>favicon-16x16.png">
    <link rel="icon" type="image/ico" href="<?php echo Yii::app()->baseUrl.Yii::app()->theme->baseUrl; ?>/asset/images/favicon.png" />
    <link rel="icon" type="image/x-icon" href="<?php echo Yii::app()->baseUrl.Yii::app()->theme->baseUrl; ?>/asset/images/favicon.png" />

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl.Yii::app()->theme->baseUrl; ?>/asset/css/screen.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl.Yii::app()->theme->baseUrl; ?>/asset/css/comon.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl.Yii::app()->theme->baseUrl; ?>/asset/css/font-awesome-4.2.0/css/font-awesome.min.css" />
    
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>

    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl.Yii::app()->theme->baseUrl; ?>/asset/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl.Yii::app()->theme->baseUrl; ?>/asset/css/styles.css?rand=<?php echo mt_rand(10, 1000); ?>" />
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,600,700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/asset/css/fonts/icomoon/style.css">

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/asset/css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/asset/nicepage/nicepage.css">
    
    
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/asset/css/style_custom.css">    
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/asset/js/jquery-3.3.1.min.js"></script>
    <?php Yii::app()->clientScript->registerCoreScript('jquery.ui'); ?>
    
   
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/asset/nicepage/nicepage.js"></script>
    
    <?php echo $this->setting['google_tools_webmaster']; ?>
    <?php echo $this->setting['google_tools_analytic']; ?>
    <?php if ($this->setting['purechat_status'] == '1'): ?>
    <?php echo $this->setting['purechat_code'] ?>
    <?php endif ?>

    <!-- Css -->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl.Yii::app()->theme->baseUrl; ?>/asset/css/style.deory.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl.Yii::app()->theme->baseUrl; ?>/asset/css/pager.css" />
    <!-- Css Responsive -->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl.Yii::app()->theme->baseUrl; ?>/asset/css/media.style.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl.Yii::app()->theme->baseUrl; ?>/asset/css/animate.css">
    
    <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl.Yii::app()->theme->baseUrl; ?>/asset/css/font-awesome-4.2.0/css/font-awesome.min.css">
    <style>
        .header_active {
            background-color: rgba(34,34,34,0.8);
        }
        #sec-7f8c {
  top: 0;
  width: 100%;
  position: fixed;
  transition: all 0.3s ease;
  z-index: 100;
}
#sec-7f8c.hide {
  top: -56px;
}
Original Answer
I've needed this and after some research I came up with this (jQuery needed):

First, right after the <body> tag add this:

<div id="loading">
  <img id="loading-image" src="path/to/ajax-loader.gif" alt="Loading..." />
</div>
Then add the style class for the div and image to your CSS:

#loading {
  position: fixed;
  display: block;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  text-align: center;
  opacity: 0.7;
  background-color: #fff;
  z-index: 99;
}
    </style>
    
  </head>
<body class="u-body u-overlap u-overlap-contrast u-overlap-transparent u-xl-mode">
    <?php echo $content ?>
    
    <div id="back-top" class="t-backtop">
    <div class="clear height-5"></div>
        <a href="#top"><i class="fa fa-chevron-up"></i></a>
    </div>
    
    <script>
        (function(){

    var doc = document.documentElement;
    var w   = window;

    /*
    define four variables: curScroll, prevScroll, curDirection, prevDirection
    */

    var curScroll;
    var prevScroll = w.scrollY || doc.scrollTop;
    var curDirection = 0;
    var prevDirection = 0;

    /*
    how it works:
    -------------
    create a scroll event listener
    create function to check scroll position on each scroll event,
    compare curScroll and prevScroll values to find the scroll direction
    scroll up - 1, scroll down - 2, initial - 0
    then set the direction value to curDirection
    compare curDirection and prevDirection
    if it is different, call a function to show or hide the header
    example:
    step 1: user scrolls down: curDirection 2, prevDirection 0 > hide header
    step 2: user scrolls down again: curDirection 2, prevDirection 2 > already hidden, do nothing
    step 3: user scrolls up: curDirection 1, prevDirection 2 > show header
    */

    var header = document.getElementById('sec-7f8c');
    var toggled;
    var threshold = 50;

    var checkScroll = function() {
        
        
        curScroll = w.scrollY || doc.scrollTop;
        if(curScroll == 0) {
            
			$(".headers").removeClass("header_active");
        }
        if(curScroll > prevScroll) {
            // scrolled down
            curDirection = 2;
        }
        else {
            //scrolled up
            curDirection = 1;
        }
		
        if(curDirection !== prevDirection) {
            toggled = toggleHeader();
        }

        prevScroll = curScroll;
        if(toggled) {
            prevDirection = curDirection;
        }
    };

    var toggleHeader = function() { 
        toggled = true;
        if(curDirection === 2 && curScroll > threshold) {
            header.classList.add('hide');
			$(".headers").removeClass("header_active");
        }
        else if (curDirection === 1) {
            header.classList.remove('hide');
            $(".headers").addClass("header_active");
            
        }
        else {
            toggled = false;
        }
        return toggled;
    };

    window.addEventListener('scroll', checkScroll);

})();


        $(window).load(function(){
        $('.t-backtop').hide();
        });
        $(function(){
            $('.t-backtop, .block_to_top a').click(function () {
                
                    $('body,html').animate({
                        scrollTop: 0
                    }, 800,{complete: function(){
            alert('end ani');
          }});
                    return false;
                });

            var $win = $(window);
                     $win.scroll(function () {
                         if ($win.scrollTop() == 0)
                         $('.t-backtop').hide();
                         else if ($win.height() + $win.scrollTop() != $(document).height() || $win.height() + $win.scrollTop() > 500) {
                         $('.t-backtop').show();
                         }
                     });
        });
        
        $('.maps').click(function () {
            $('.maps iframe').css("pointer-events", "auto");
        });

        $( ".maps" ).mouseleave(function() {
        $('.maps iframe').css("pointer-events", "none"); 
        });
    </script>
    
      <!-- Histats.com  START  (aync)--> 
    <script type="text/javascript">var _Hasync= _Hasync|| [];
    _Hasync.push(['Histats.start', '1,3894290,4,0,0,0,00010000']);
    _Hasync.push(['Histats.fasi', '1']);
    _Hasync.push(['Histats.track_hits', '']);
    (function() {
    var hs = document.createElement('script'); hs.type = 'text/javascript'; hs.async = true;
    hs.src = ('//s10.histats.com/js15_as.js');
    (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(hs);
    })();</script>
    
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/asset/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/asset/js/jquery.sticky.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/asset/js/main.js"></script>
    
    <noscript><a href="/" target="_blank"><img  src="//sstatic1.histats.com/0.gif?3894290&101" alt="unique visitors counter" border="0"></a></noscript>
    <!-- Histats.com  END  -->
</body>
</html>