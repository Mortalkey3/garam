<div class="clear"></div>
<div class="subpage static_about">

<?php if (isset($_GET['sub']) && $_GET['sub'] == 'profile'): ?>
  <div class="blocks_subpage_banner about ful_imgResp prelatife top_datan_section1-about">
  	<div class="prelatife container">
  		<div class="h172"></div>
  		<div class="clear"></div>
  		<div class="content-text">
  			<h1><?php echo $this->setting['about_hero_title'] ?></h1>
  			<div class="clear height-10"></div>
  			<h2><?php echo nl2br($this->setting['about_hero_sub_title']) ?></h2>
  			<div class="row default prelatife">
  				<div class="col-md-6 col-sm-12">
  					<?php echo $this->setting['about_hero_content'] ?>

  				</div>
  				<div class="col-md-6 col-sm-12">
  					<div class="pictures abs"><img src="<?php echo $this->assetBaseurl ?>picts_about_tp-1.png" alt="" class="img-responsive"></div>
  				</div>
  			</div>
  		</div>
  		<div class="clear height-50"></div><div class="height-25"></div>
  	</div>
  </div>

  <section class="default_sc middle_about_seconds" id="about3">
    <div class="prelatife inBlock_table container">
      <div class="insides text-center content-text">
        <div class="mw995 tengah">
          <h3 class="sub_title"><?php echo $this->setting['develop_title'] ?></h3>
          <?php echo $this->setting['develop_content'] ?>
          <div class="clear"></div>
        </div>

        <div class="clear"></div>
      </div>
    </div>
  </section>
<?php endif ?>

<?php if (isset($_GET['sub']) && $_GET['sub'] == 'history'): ?>
  <section class="default_sc middle_about_first" id="about2">
	<div class="prelatife container">
		<div class="insides text-left content-text">
			<div class="row default">
				<div class="col-md-6 col-lg-7"></div>
				<div class="col-md-6 col-lg-5">
					<h3 class="sub_title"><?php echo $this->setting['history_title'] ?></h3>
					<div class="clear height-10"></div>
					<h2><?php echo nl2br($this->setting['history_sub_title']) ?></h2>
					<div class="clear height-5"></div>
					<?php echo $this->setting['history_content'] ?>

					<div class="clear"></div>
				</div>
			</div>
		</div>
  		<div class="clear"></div>
	</div>
  </section>
<?php endif; ?>  

<?php if (isset($_GET['sub']) && $_GET['sub'] == 'our_value'): ?>
  <section class="default_sc middles_bottomWhite_aboutThirds" id="about4">
  	<div class="prelatife container">
  		<div class="clear height-50"></div>
  		<div class="clear height-50"></div>
  		<div class="content-text text-center">
  			<h3 class="sub_title"><?php echo $this->setting['ourval_title'] ?></h3>
  			<div class="clear height-30"></div>
  			<img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(667,260, '/images/static/'. $this->setting['ourval_picture'] , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="" class="img-responsive center-block">
  			<div class="clear height-45"></div>
  			<div class="lists_blc_values">
  				<div class="row default">
  					<div class="col-md-3 col-sm-6">
  						<div class="items">
  							<?php echo $this->setting['ourval_list_1'] ?>
  						</div>
  					</div>
  					<div class="col-md-3 col-sm-6">
  						<div class="items">
  							<?php echo $this->setting['ourval_list_2'] ?>
  						</div>
  					</div>
  					<div class="col-md-3 col-sm-6">
  						<div class="items">
  							<?php echo $this->setting['ourval_list_3'] ?>
  						</div>
  					</div>
  					<div class="col-md-3 col-sm-6">
  						<div class="items">
  							<?php echo $this->setting['ourval_list_4'] ?>
  						</div>
  					</div>
  				</div>
  			</div>
  			<div class="clear"></div>
  		</div>
  		<div class="clear height-50"></div>
  		<div class="clear height-30"></div>
  		<div class="clear"></div>
  	</div>
  	<div class="blocks_bottomAbout_cntblue">
  		<div class="prelatife container">
  			<div class="clear height-50"></div>
  			<div class="clear height-50"></div>
  			<div class="clear height-5"></div>

  			<div class="text-center content-text">
  				<h3 class="sub_title"><?php echo $this->setting['focus_title'] ?></h3>
  				<div class="clear height-10"></div>
  				<img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(549,549, '/images/static/'. $this->setting['focus_picture'] , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="" class="img-responsive center-block">
  				<div class="clear height-45"></div>

  				<div class="maw840 tengah text-left">
  					<div class="row default">
  						<div class="col-md-4 col-sm-6">
  							<?php echo $this->setting['focus_list_1'] ?>
  						</div>
  						<div class="col-md-4 col-sm-6">
  							<?php echo $this->setting['focus_list_2'] ?>
  						</div>
  						<div class="col-md-4 col-sm-6">
  							<?php echo $this->setting['focus_list_3'] ?>
  						</div>
  					</div>
  					<div class="clear height-20"></div>
  					<div class="row default">
  						<div class="col-md-4 col-sm-6">
  							<?php echo $this->setting['focus_list_4'] ?>
  						</div>
  						<div class="col-md-4 col-sm-6">
  							<?php echo $this->setting['focus_list_5'] ?>
  						</div>
  					</div>
  					<div class="clear"></div>
  				</div>

  				<div class="clear"></div>
  			</div>
  			<div class="clear"></div>
  		</div>
  	</div>
  </section>

  <?php endif; ?>  

  <div class="clear"></div>
</div>
<!-- End subpage static -->