<?php 
      $criteria = new CDbCriteria;
      $criteria->with = array('description');
      $criteria->addCondition('active = "1"');
      $criteria->addCondition('description.language_id = :language_id');
      $criteria->params[':language_id'] = $this->languageID;
      $criteria->order = 't.id ASC';

      $dataIndustry = new CActiveDataProvider('Gallery', array(
        'criteria'=>$criteria,
          'pagination'=>array(
              'pageSize'=> 10000,
          ),
      ));
?>
<div class="subpage static_about">

  <section class="default_sc middle_industry_first" id="industries2">
	<div class="prelatife container">
      <div class="clear height-50"></div>
      <div class="clear height-25"></div>
  		<div class="insides text-center content-text">
        <h3 class="sub_title"><?php echo $this->setting['industry_hero_title'] ?></h3>
        <div class="clear height-0"></div>
        <div class="maw610 tengah">
          <?php echo $this->setting['industry_hero_content'] ?>
        </div>

        <div class="clear height-30"></div>

        <!-- Start data industry -->
        <div class="lists_data_nwIndustry">
          <div class="row default">
            <?php foreach ($dataIndustry->getData() as $key => $value) { ?>
            <div class="col-md-4 col-sm-6">
              <div class="items prelatife">
                <a href="<?php echo CHtml::normalizeUrl(array('/home/industryDetail', 'id'=> $value->id, 'lang'=>Yii::app()->language)); ?>"><img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(362,362, '/images/gallery/'. $value->image, array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="<?php echo $value->description->title ?>" class="img-responsive center-block"></a>
                <div class="info_d">
                  <h4 class="sub_title"><a href="<?php echo CHtml::normalizeUrl(array('/home/industryDetail', 'id'=> $value->id, 'lang'=>Yii::app()->language)); ?>"><?php echo $value->description->title ?></a></h4>
                </div>
              </div>
            </div>
            <?php } ?>
          </div>
        </div>
        <!-- End data industry -->
        
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