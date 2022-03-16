<section  style="background:#1a3880;">
<div class="row m-3">
  <div class=" container clear height-50"></div>
  <div class=" reveal fade-left col-lg-8 bg-dark mt-n3 mr-n3 info" style="border-radius: 10px;">
    <h2 class="mt-n3 font-medium text-size_9x lg:text-size_12x xl:text-size_13x text-white leading-height_27x lg:leading-height_32x xl:leading-height_36x mb-3 sm:mb-2 lg:mb-3 xl:mb-4 text-light">Cheetham Garam Indonesia</h2>
    <div class="text-container">
      <div class="text-box">
        <p>
          Cheetham Salt, adalah anak perusahaan yang sepenuhnya dimiliki dari CK Life Sciences International. Cheetham Salt adalah Produsen Garam Surya terbesar di Australia. Didirikan oleh Richard Cheetham pada tahun 1888, Tujuan kami adalah untuk membangun produk kami dan menawarkan layanan untuk pasar Australia dan Asia. Dengan bisnis yang didirikan di Indonesia dan kantor penjualan di Jepang, kami memiliki posisi yang baik untuk mendistribusikan produk kami di seluruh wilayah Asia Pasifik.
        </p>
        <div class="row justify-content-end">
          <div class="col-4 text-right">
            <a href="<?php echo CHtml::normalizeUrl(array('/home/about', 'sub'=>'profile', 'lang'=>Yii::app()->language)); ?>">Learn more</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-4"></div>
</div>
</section>

<section style="background:#1a3880;">
  <div  class="col-lg-5 info"></div>
  <div  class="reveal fade-right col-lg-7 bg-dark info" style="border-radius: 10px;">
    <h2 class="font-medium text-size_9x lg:text-size_12x xl:text-size_13x text-white leading-height_27x lg:leading-height_32x xl:leading-height_36x mb-3 sm:mb-2 lg:mb-3 xl:mb-4 text-light">Cheetham Garam Indonesia</h2>
    <div class="text-container">
      <div class="text-box">
        <p>
          Cheetham Salt, adalah anak perusahaan yang sepenuhnya dimiliki dari CK Life Sciences International. Cheetham Salt adalah Produsen Garam Surya terbesar di Australia. Didirikan oleh Richard Cheetham pada tahun 1888, Tujuan kami adalah untuk membangun produk kami dan menawarkan layanan untuk pasar Australia dan Asia. Dengan bisnis yang didirikan di Indonesia dan kantor penjualan di Jepang, kami memiliki posisi yang baik untuk mendistribusikan produk kami di seluruh wilayah Asia Pasifik.
        </p>
        <div class="row justify-content-end">
          <div class="col-4 text-right">
            <a href="<?php echo CHtml::normalizeUrl(array('/home/about', 'sub'=>'profile', 'lang'=>Yii::app()->language)); ?>">Learn more</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class=" container clear height-50"></div>
  </div>
</section>



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
