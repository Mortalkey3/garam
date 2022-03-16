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
    <!-- <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl.Yii::app()->theme->baseUrl; ?>/asset/js/bootstrap-3/css/bootstrap.min.css" /> -->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl.Yii::app()->theme->baseUrl; ?>/asset/css/styles.css?rand=<?php echo mt_rand(10, 1000); ?>" />
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,600,700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/asset/css/fonts/icomoon/style.css">

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/asset/css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/asset/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/asset/css/style_custom.css">
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/asset/js/jquery-3.3.1.min.js"></script>
    <?php Yii::app()->clientScript->registerCoreScript('jquery.ui'); ?>
   
    
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
  </head>
<body>
    <?php echo $content ?>
    
    <div id="back-top" class="t-backtop">
    <div class="clear height-5"></div>
        <a href="#top"><i class="fa fa-chevron-up"></i></a>
    </div>
    <script type="text/javascript">
        $(window).load(function(){
        $('.t-backtop').hide();
        });
        $(function(){
            $('.t-backtop, .block_to_top a').click(function () {
                    $('body,html').animate({
                        scrollTop: 0
                    }, 800);
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
    
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/asset/js/popper.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/asset/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/asset/js/jquery.sticky.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/asset/js/main.js"></script>
    
    <noscript><a href="/" target="_blank"><img  src="//sstatic1.histats.com/0.gif?3894290&101" alt="unique visitors counter" border="0"></a></noscript>
    <!-- Histats.com  END  -->
</body>
</html>