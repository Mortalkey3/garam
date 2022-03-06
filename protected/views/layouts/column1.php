<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<?php echo $this->renderPartial('//layouts/_header', array()); ?>
<div class="clear"></div>
<div class="middles_wrapper_cont tops_home">
    <!-- Start fcs -->
    <div class="fcs-wrapper outers_fcs_wrapper prelatife">
        <div class="prelatife">
        <div id="myCarousel_home" class="carousel homeslide fade">
            <?php
            $criteria=new CDbCriteria;
            $criteria->with = array('description');
            $criteria->addCondition('description.language_id = :language_id');
            $criteria->addCondition('active = 1');
            $criteria->params[':language_id'] = $this->languageID;
            $criteria->group = 't.id';
            $criteria->order = 't.id ASC';
            $slide = Slide::model()->with(array('description'))->findAll($criteria);
            ?>
            <ol class="carousel-indicators">
                <?php foreach ($slide as $key => $value): ?>
                    <li data-target="#myCarousel_home" data-slide-to="<?php echo $key; ?>" <?php if($key == 0){ ?>class="active"<?php } ?> ></li>
                <?php endforeach; ?>
            </ol>
            <div class="carousel-inner">
                <?php foreach ($slide as $key => $value): ?>
                <div class="item <?php echo ($key == 0)? 'active':''; ?>">
                    <div class="hidden-xs <?php if ($value->hide_text == 1): ?>hides_tx<?php endif ?>">
                    <img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(1880,837, '/images/'. $value->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="" class="img-responsive full_img">
                    </div>
                    <div class="visible-xs <?php if ($value->hide_text == 1): ?>hides_tx<?php endif ?>">
                    <img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(774,867, '/images/'. $value->image2 , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="" class="img-responsive">
                    </div>
                    <div class="carousel-caption" style="display: none;">
                        <div class="prelatife container">
                            <div class="blocks_right_inText_fcs">
                                <div class="texts text-left">
                                    <?php echo $value->description->subtitle ?>
                                    <div class="clear height-20"></div>
                                    <div class="lines-grey"></div>
                                    <div class="clear height-20"></div>
                                    <?php echo $value->description->content ?>
                                    <a href="<?php echo $value->description->url ?>" class="btn btn-link btnsl_default2"><?php echo $value->description->url_teks ?></a>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <!-- end wrap fcs -->
        </div>
        <!-- end container fcs -->

        <div class="custom-blockFcs_customs_down">
            <div class="prelatife container">
                <div class="blocks_right_inText_fcs set2">
                    <div class="texts">
                        <h5>We are entrusted to supply the world's most essential mineral, enhancing life for every person, everyday.</h5>
                    </div>
                </div>

                <?php /* <div class="blocks_right_inText_fcs">
                    <div class="texts">
                        <?php echo $this->setting['home_heroslide_title'] ?>
                        <div class="clear height-20"></div>
                        <div class="lines-grey"></div>
                        <div class="clear height-20"></div>
                        <?php echo $this->setting['home_heroslide_content'] ?>
                        <a href="<?php echo $this->setting['home_heroslide_link'] ?>" class="btn btn-link btnsl_default2">Learn More About Cheetham</a>
                    </div>
                </div> */ ?>
                <div class="lists_bannerBottom_fcshn" style="display: none;">
                    <div class="row default">
                        <div class="col-md-4">
                            <div class="items">
                                <a href="<?php echo $this->setting['home_banner_link_1'] ?>"><img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(372,182, '/images/static/'. $this->setting['home_banner_pict_1'] , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="" class="img-responsive"></a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="items">
                                <a href="<?php echo $this->setting['home_banner_link_2'] ?>"><img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(372,182, '/images/static/'. $this->setting['home_banner_pict_2'] , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="" class="img-responsive"></a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="items">
                                <a href="<?php echo $this->setting['home_banner_link_3'] ?>"><img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(372,182, '/images/static/'. $this->setting['home_banner_pict_3'] , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="" class="img-responsive"></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
    <!-- End fcs -->
   
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
<?php $this->endContent(); ?>