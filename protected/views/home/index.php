<!-- <section class="default_sc back-cream_home middles1_contHome">
	<div class="prelatife container">
		<div class="row">
			<div class="col-md-6">
				<div class="leftsn_description">
					<h3>
						echo nl2br($this->setting['home_middle_title']); 
					</h3>
					<div class="clear"></div>
					echo $this->setting['home_middle_content'] 

					<div class="clear height-20"></div>
					<div class="bxsn_form">
						<form>
							<div class="row default">
								<div class="col-sm-6">
									<div class="form-group">
									    <label for="exampleInputEmail1">Your Name</label>
									    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="">
									  </div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
									    <label for="exampleInputEmail1">Your Company</label>
									    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="">
									  </div>
								</div>
							</div>
							<div class="row default">
								<div class="col-sm-6">
									<div class="form-group">
									    <label for="exampleInputEmail1">Email</label>
									    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="">
									  </div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
									    <label for="exampleInputEmail1">Phone</label>
									    <div class="clear"></div>
									    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="">
									  </div>
								</div>
							</div>
							<div class="fright">
							<button type="submit" class="btn btn-link">SUBMIT</button>
							</div>
						</form>
					</div>
				</div>
				<div class="clear"></div>
			</div>
			<div class="col-md-6"></div>
		</div>
		<div class="backs_trucks_rightHome"></div>
	</div>
</section> -->

<section id="block_home2" class="default_sc back-cream_middle_cont_home prelatife" >
	<div class="prelatife container">
		<div class="inside text-center">
			<div class="clear height-50"></div>

			<?php 
			$criteria = new CDbCriteria;
			$criteria->with = array('description');
			$criteria->addCondition('active = "1"');
			$criteria->addCondition('description.language_id = :language_id');
			$criteria->params[':language_id'] = $this->languageID;
			$criteria->order = 'date_input DESC';

			$dataFeatured = new CActiveDataProvider('Blog', array(
				'criteria'=>$criteria,
			    'pagination'=>array(
			        'pageSize'=> 10000,
			    ),
			));
			?>
			<div class="block_sl_banner_Content home_down">
	    		<div class="row owl-carousel owl-theme">
	    			<?php foreach ($dataFeatured->getData() as $key => $value){ ?>
	    			<div class="col-md-12 item">
	    				<div class="items">
	    					<div class="picture">
	    					<a href="<?php echo CHtml::normalizeUrl(array('/blog/detail', 'id'=> $value->id, 'lang'=>Yii::app()->language)); ?>">
	    					<img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(324,171, '/images/blog/'. $value->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="<?php echo $value->description->title ?>" class="img-responsive center-block">
	    					</a>
	    					</div>
	    					<div class="info">
	    						<div class="titles"><a href="<?php echo CHtml::normalizeUrl(array('/blog/detail', 'id'=> $value->id, 'lang'=>Yii::app()->language)); ?>"><?php echo $value->description->title ?></a></div>
	    						<div class="clear"></div>
	    						<span class="date"><?php echo date("d F Y", strtotime($value->date_input)) ?></span>
	    						<div class="clear"></div>
	    						<a href="<?php echo CHtml::normalizeUrl(array('/blog/detail', 'id'=> $value->id, 'lang'=>Yii::app()->language)); ?>" class="btn btn-link bt_more">Read More</a>
	    						<div class="clear"></div>
	    					</div>
	    				</div>
	    			</div>
	    			<?php } ?>

	    		</div>
	    		<div class="clear"></div>
	    	</div>
	    	<!-- End sl banner content -->
	    	<div class="clear height-40"></div>

			<div class="clear"></div>
		</div>
	</div>
</section>

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.carousel.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.theme.default.min.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
  $('.owl-carousel').owlCarousel({
    loop: true,
    margin: 10,
    dots: false,
    nav: true,
  	navText: ["<img src='<?php echo $this->assetBaseurl ?>chevr-bannerproducts_home_left.png'>","<img src='<?php echo $this->assetBaseurl ?>chevr-bannerproducts_home_right.png'>"],

    responsiveClass: true,
    responsive: {
      0: {
        items: 1,
        nav: true
      },
      600: {
        items: 2,
        nav: false
      },
      1000: {
        items: 3,
        nav: true,
        loop: false
      }
    }
  })
})
</script>

<?php 
$mod_gallery = PosterPopup::model()->findAll('t.aktif = "1" order by urutan asc')
?>
<?php if (count($mod_gallery) > 0): ?>
<script type="text/javascript">
$(document).ready(function () {
	$.fancybox([
				<?php foreach ($mod_gallery as $key => $value): ?>
	      '<?php echo Yii::app()->baseUrl.'/images/poster/'. $value->image; ?>', 
				<?php endforeach ?>
		  ],{
		   // fancybox options 
		   'type': 'image' // etc.
		 });
});
</script>
<?php endif ?>