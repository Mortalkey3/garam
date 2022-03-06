<div class="subpage static_about">

  <section class="default_sc middle_industry_first" id="industries2">
  <div class="prelatife container">
      <div class="clear height-50"></div>
      <div class="clear height-25"></div>
      <div class="insides text-center content-text">
        <h3 class="sub_title"><?php echo Tt::t('front', 'NEWS') ?></h3>
        <div class="clear height-30"></div>

        <div class="block_sl_banner_Content home_down lists_data_newsDef">
          <div class="row">

          <?php if ($dataFeatured->getTotalItemCount() > 0): ?>
            <?php foreach ($dataFeatured->getData() as $key => $value): ?>
            <div class="col-md-6">
              <div class="items featured">
                <div class="picture"><a href="<?php echo CHtml::normalizeUrl(array('detail', 'id'=>$value->id, 'lang'=>Yii::app()->language)); ?>"><img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(562,288, '/images/blog/'.$value->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="" class="img-responsive center-block"></a></div>
                <div class="info">
                  <div class="titles"><a href="<?php echo CHtml::normalizeUrl(array('detail', 'id'=>$value->id, 'lang'=>Yii::app()->language)); ?>"><?php echo $value->description->title ?></a></div>
                  <div class="clear"></div>
                  <span class="date"><?php echo date('d F Y', strtotime($value->date_input)) ?></span>
                  <div class="clear"></div>
                  <?php echo substr($value->description->content, 0, 90) ?>
                  <div class="clear"></div>
                  <a href="<?php echo CHtml::normalizeUrl(array('detail', 'id'=>$value->id, 'lang'=>Yii::app()->language)); ?>" class="btn btn-link bt_more">Read More</a>
                  <div class="clear"></div>
                </div>
              </div>
            </div>
            <?php endforeach ?>
            <?php else: ?>
            <h3>No data news</h3>
            <?php endif ?>

          <?php if ($dataBlog->getTotalItemCount() > 0): ?>
            <?php foreach ($dataBlog->getData() as $key => $value): ?>
            <div class="col-md-4 col-sm-6">
              <div class="items">
                <div class="picture"><a href="<?php echo CHtml::normalizeUrl(array('detail', 'id'=>$value->id, 'lang'=>Yii::app()->language)); ?>"><img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(372,190, '/images/blog/'.$value->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="" class="img-responsive center-block"></a></div>
                <div class="info">
                  <div class="titles"><a href="<?php echo CHtml::normalizeUrl(array('detail', 'id'=>$value->id, 'lang'=>Yii::app()->language)); ?>"><?php echo $value->description->title ?></a></div>
                  <div class="clear"></div>
                  <span class="date"><?php echo date('d F Y', strtotime($value->date_input)) ?></span>
                  <div class="clear"></div>
                  <a href="<?php echo CHtml::normalizeUrl(array('detail', 'id'=>$value->id, 'lang'=>Yii::app()->language)); ?>" class="btn btn-link bt_more">Read More</a>
                  <div class="clear"></div>
                </div>
              </div>
            </div>
            <?php endforeach ?>
          <?php endif ?>
          </div>
          <div class="clear"></div>
        </div>
        <!-- End sl banner content -->
        <?php $this->widget('CLinkPager', array(
          'pages' => $dataBlog->getPagination(),
          'header' => '',
          'htmlOptions' => array('class' => 'pagination'),
        )) ?>
        
        <div class="clear height-50"></div>
        <div class="clear height-30"></div>
        <div class="clear"></div>
      </div>
      <div class="clear"></div>
  </div>
  </section>

  <div class="clear"></div>
</div>
<!-- End subpage static -->