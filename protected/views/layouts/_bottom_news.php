<?php
$criteria = new CDbCriteria;
$criteria->with = array('description');
$criteria->addCondition('active = "1"');
$criteria->addCondition('description.language_id = :language_id');
$criteria->params[':language_id'] = $this->languageID;
$criteria->order = 'date_input DESC';
$criteria->limit = 3;

$dataBlog = Blog::model()->findAll($criteria);
?>
<section class="default_sc back-white mh400">
    <div class="prelatife container">
        <div class="clear height-40"></div>

        <div class="outers_listing_newshome">
            <div class="row default">
                <?php foreach ($dataBlog as $key => $value): ?>
                <div class="col-md-4 col-sm-4">
                    <div class="items">
                        <div class="pict"><a href="<?php echo CHtml::normalizeUrl(array('/blog/detail', 'id'=>$value->id)); ?>"><img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(313,204, '/images/blog/'.$value->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="" class="img-responsive"></a></div>
                        <div class="desc">
                            <div class="titles"><a href="<?php echo CHtml::normalizeUrl(array('/blog/detail', 'id'=>$value->id)); ?>"><?php echo $value->description->title ?></a></div>
                            <div class="clear"></div>
                            <span class="dates"><?php echo date('d F Y', strtotime($value->date_input)) ?></span>
                            <div class="clear"></div>
                            <a href="<?php echo CHtml::normalizeUrl(array('/blog/detail', 'id'=>$value->id)); ?>" class="btn btn-default btns_news_default">BACA</a>
                        </div>
                    </div>
                </div>
                <?php endforeach ?>
            </div>
            <div class="clear height-25"></div>

            <div class="text-center bts_viewAll_blogs">
                <a href="<?php echo CHtml::normalizeUrl(array('/blog/index')); ?>"><i class="fa fa-th-list"></i> &nbsp;Lihat Semua Artikel</a>
            </div>
            <div class="clear"></div>
        </div>

        <div class="clear height-30"></div>
        <div class="clear"></div>
    </div>
</section>