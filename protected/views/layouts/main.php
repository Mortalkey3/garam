<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<meta name="language" content="<?php echo Yii::app()->language ?>" />

	<meta name="keywords" content="<?php echo CHtml::encode($this->metaKey); ?>">
	<meta name="description" content="<?php echo CHtml::encode($this->metaDesc); ?>">
	
	<link rel="Shortcut Icon" href="<?php echo Yii::app()->baseUrl.Yii::app()->theme->baseUrl; ?>/asset/images/favicon.png" />
	<link rel="icon" type="image/ico" href="<?php echo Yii::app()->baseUrl.Yii::app()->theme->baseUrl; ?>/asset/images/favicon.png" />
	<link rel="icon" type="image/x-icon" href="<?php echo Yii::app()->baseUrl.Yii::app()->theme->baseUrl; ?>/asset/images/favicon.png" />

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl.Yii::app()->theme->baseUrl; ?>/asset/css/screen.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl.Yii::app()->theme->baseUrl; ?>/asset/css/comon.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl.Yii::app()->theme->baseUrl; ?>/asset/css/font-awesome-4.2.0/css/font-awesome.min.css" />
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>

    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl.Yii::app()->theme->baseUrl; ?>/asset/js/bootstrap-3/css/bootstrap.min.css" />
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl.Yii::app()->theme->baseUrl; ?>/asset/js/bootstrap-3/js/bootstrap.js"></script>  

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
    <?php Yii::app()->clientScript->registerCoreScript('jquery.ui'); ?>
    <?php $this->widget('application.extensions.fancyapps.EFancyApps', array(
        'target'=>'',
        'config'=>array(),
        )
    ); ?>
   
    <!-- All JS -->
    <script type="text/javascript">
        var baseurl = "<?php echo CHtml::normalizeUrl(array('/')); ?>";
        var url_add_cart_action = "<?php echo CHtml::normalizeUrl(array('/product/addCart')); ?>";
        var url_edit_cart_action = "<?php echo CHtml::normalizeUrl(array('/product/edit')); ?>";
    </script>
    <script src="<?php echo Yii::app()->baseUrl.Yii::app()->theme->baseUrl; ?>/asset/js/all.js"></script>

    <?php echo $this->setting['google_tools_webmaster']; ?>
    <?php echo $this->setting['google_tools_analytic']; ?>
    <?php if ($this->setting['purechat_status'] == '1'): ?>
    <?php echo $this->setting['purechat_code'] ?>
    <?php endif ?>

    <!-- Css -->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl.Yii::app()->theme->baseUrl; ?>/asset/css/styles.css?rand=<?php echo mt_rand(10, 1000); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl.Yii::app()->theme->baseUrl; ?>/asset/css/style.deory.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl.Yii::app()->theme->baseUrl; ?>/asset/css/pager.css" />
    <!-- Css Responsive -->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl.Yii::app()->theme->baseUrl; ?>/asset/css/media.style.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl.Yii::app()->theme->baseUrl; ?>/asset/css/animate.css">
    
    <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl.Yii::app()->theme->baseUrl; ?>/asset/css/font-awesome-4.2.0/css/font-awesome.min.css">
    </head>
<body>
<?php 
/*
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=578821772130895";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<!-- Place this tag after the last +1 button tag. -->
<script type="text/javascript">
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/platform.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>
*/
 ?>
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

    <script type="text/javascript">
        // $(function(){
        //         // pindah tulisan hero image
        //         var fullw = $(window).width();
        //         if (fullw <= 767) {
        //             $('.tops-cont-insidepage .insd-container.content-up').addClass('hidden-xs');
        //             var copyText = $('.tops-cont-insidepage .insd-container.content-up').html();
        //             $( ".outer-inside-middle-content.back-white .tops-cont-insidepage" ).after( "<div class='pindahan_text-heroimage'></div>" );
        //             $('.pindahan_text-heroimage').append(copyText);
        //         };
        // });       
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
    <noscript><a href="/" target="_blank"><img  src="//sstatic1.histats.com/0.gif?3894290&101" alt="unique visitors counter" border="0"></a></noscript>
    <!-- Histats.com  END  -->
</body>
</html>