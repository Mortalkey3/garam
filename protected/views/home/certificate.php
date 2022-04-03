<div class="subpage static_about" >

  <section class="default_sc middle_industry_first" id="industries2" style="background-color:#303F7A" >
  <div class="prelatife container" >
      <div class="clear height-50"></div>
      <div class="clear height-50"></div>
      <div class="clear height-25"></div>
      <div class="insides text-center">
        <div class="content-text">
        <h3 class="sub_title"><?php echo Tt::t('front', 'certificate'); ?></h3>
        </div>
        <div class="clear height-50"></div>

      <div class="lists_data_certificates">
        
        <?php if (isset($_GET['sub']) && $_GET['sub'] == 'tech_info'): ?>
        <!-- Start data industry -->
          <h5><?php echo Tt::t('front', 'Quality Assurance') ?></h5>
          <?php 
            $criteria = new CDbCriteria;
            $criteria->addCondition('category_id = 1');
            $criteria->order = 't.sort ASC';
            $dataSertifikat = new CActiveDataProvider('Pdf', array(
              'criteria'=>$criteria,
                'pagination'=>array(
                    'pageSize'=> 10000,
                ),
            ));
          ?>
          <div class="row default">
            <?php foreach ($dataSertifikat->getData() as $key => $value) { ?>
            <div class="col-md-3 col-sm-4">
              <div class="items prelatife">
                <div class="pictures">
                  <a download href="<?php echo Yii::app()->baseUrl ?>/images/pdf/<?php echo $value->file ?>">
                    <img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(266,266, '/images/pdf/'. $value->image, array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="<?php echo $value->nama ?>" class="img-responsive center-block">
                  </a>
                </div>
                <div class="info_d padding-top-15">
                  <h6 class="sub_title"><a download href="<?php echo Yii::app()->baseUrl ?>/images/pdf/<?php echo $value->file ?>"><?php echo $value->nama ?></a></h6>
                </div>
              </div>
            </div>
            <?php } ?>
          </div>
        <?php endif ?>

        <?php if (isset($_GET['sub']) && $_GET['sub'] == 'awards'): ?>
          <h5>Awards</h5>
          <?php 
            $criteria = new CDbCriteria;
            $criteria->addCondition('category_id = 2');
            $criteria->order = 't.sort ASC';
            $dataSertifikat = new CActiveDataProvider('Pdf', array(
              'criteria'=>$criteria,
                'pagination'=>array(
                    'pageSize'=> 10000,
                ),
            ));
          ?>
          <div class="row default">
            <?php foreach ($dataSertifikat->getData() as $key => $value) { ?>
            <div class="col-md-3 col-sm-4">
              <div class="items prelatife">
                <div class="pictures">
                  <a download href="<?php echo Yii::app()->baseUrl ?>/images/pdf/<?php echo $value->file ?>">
                    <img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(266,266, '/images/pdf/'. $value->image, array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="<?php echo $value->nama ?>" class="img-responsive center-block">
                  </a>
                </div>
                <div class="info_d padding-top-15">
                  <h6 class="sub_title"><a download href="<?php echo Yii::app()->baseUrl ?>/images/pdf/<?php echo $value->file ?>"><?php echo $value->nama ?></a></h6>
                </div>
              </div>
            </div>
            <?php } ?>
          </div>
        <!-- End data industry -->
        <?php endif ?>
        
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