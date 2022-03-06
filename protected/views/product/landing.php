<!-- Start fcs -->
<div class="fcs-wrapper outers_fcs_wrapper prelatife">
    <div id="myCarousel_home" class="carousel fade" data-ride="carousel">
        <?php
        $criteria=new CDbCriteria;
        $criteria->with = array('description');
        $criteria->addCondition('description.language_id = :language_id');
        $criteria->params[':language_id'] = $this->languageID;
        $criteria->group = 't.id';
        $criteria->order = 't.id ASC';
        $slide = Slide::model()->with(array('description'))->findAll($criteria);
        ?>
        <ol class="carousel-indicators">
            <?php foreach ($slide as $key => $value): ?>
                <li data-target="#myCarousel_home" data-slide-to="<?php echo $key; ?>" <?php if($key == 0){ ?>class="active"><?php } ?></li>
            <?php endforeach; ?>
        </ol>
        <div class="carousel-inner">
            <?php foreach ($slide as $key => $value): ?>
            <div class="item active<?php //if ($key == 0): ?><?php //endif ?>">
                <img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(1600,583, '/images/slide/'.$value->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="" class="img-responsive">
                <?php /*<div class="carousel-caption">
                	<div class="bxsl_tx_fcs">
                		<h3><?php echo $value->description->title ?></h3>
                		<span><?php echo $value->description->subtitle ?></span>
                		<p><?php echo nl2br($value->description->content) ?></p>
                		<div class="clear height-5"></div>
                        <?php if ($value->description->url != ''): ?>
                		<a href="<?php echo $value->description->url ?>" class="btn btn-default btn_brown_def"><?php echo $value->description->url_teks ?></a>
                        <?php endif ?>
                		<div class="clear"></div>
                	</div>
                </div>*/ ?>
            </div>
            <?php endforeach ?>
        </div>

    </div>
    <div class="clear"></div>
</div>
<!-- End fcs -->

<!-- conts box top -->
<section class="default_sc blocks_bannerBox_home" id="block_homesection">
	<div class="in_box_product back-white">
		<div class="tops blue text-center">
			<h3 class="sub_title">Kategori <?php echo $strCategory->description->name ?></h3>
		</div>
		<div class="prelatife container">
			<div class="insides padding-top-15">

				<ul class="list-inline text-center lists_subCategory_data">
					<?php foreach ($subCategory as $key => $value): ?>
					<li>
						<div class="items">
							<div class="pict"><a href="<?php echo CHtml::normalizeUrl(array('/product/index', 'category'=>$value->id)); ?>"><img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(190,190, '/images/category/'.$value->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="" class="img-responsive"></a></div>
							<div class="clear"></div>
							<div class="names"><a href="<?php echo CHtml::normalizeUrl(array('/product/index', 'category'=>$value->id)); ?>"><?php echo $value->description->name ?></a></div>
						</div>
					</li>
					<?php endforeach ?>
				</ul>

				<div class="clear height-25"></div>
				<div class="clear"></div>
			</div>
		</div>
	</div>
	<!-- End sub kategori -->

	<div class="in_box_product back-white">
		<div class="tops yellow text-center">
			<h3 class="sub_title">Penawaran Istimewa & Terbatas di <?php echo $strCategory->description->name ?>!</h3>
		</div>
		<div class="prelatife container">
			<div class="insides padding-top-15">
				<?php if ($product->getTotalItemCount() > 0): ?>
					
				<div class="lists_product_data">
					<?php foreach ($product->getData() as $key => $value): ?>
						<div class="items prelatife">
							<div class="t_info prelatife">
								<div class="row">
									<div class="col-xs-4 lgo_brands">
										<img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(100,35, '/images/brand/'.$value->brand->image , array('method' => 'resize', 'quality' => '90')) ?>" alt="">
									</div>
									<div class="col-xs-8">
										<div class="blocks_recom">
											<?php if (1 == $value->terbaru): ?>
											<img src="<?php echo $this->assetBaseurl ?>backs_con_right_top_products-yellow2.png" alt="">	
											<?php elseif($value->harga_coret > $value->harga): ?>
											<img src="<?php echo $this->assetBaseurl ?>backs_con_right_top_products2.png" alt="">
											<?php endif ?>
										</div>
									</div>
								</div>
							</div>
							<div class="b_titles">
								<?php echo $value->description->name ?>
							</div>
							<div class="picture">
								<a href="<?php echo CHtml::normalizeUrl(array('/product/detail', 'id'=>$value->id)); ?>">
								<img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(250,250, '/images/product/'.$value->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="" class="img-responsive center-block">
								</a>
							</div>
							<div class="bloc_bottom">
								<div class="row">
									<div class="col-xs-9">
										<div class="prices">
											<?php if ($value->harga_coret > $value->harga): ?>
											<span class="through">Harga Normal <i><?php echo Cart::money($value->harga_coret) ?></i></span>
											<span>Kini <b><?php echo Cart::money($value->harga) ?></b></span>
											<small>Hemat <?php echo Cart::money($value->harga_coret - $value->harga) ?></small>
											<?php else: ?>
											<span class="through">&nbsp;</span>
											<span><b><?php echo Cart::money($value->harga) ?></b></span>
											<small>&nbsp;</small>
											<?php endif ?>
										</div>
									</div>
									<div class="col-xs-3 text-right">
										<?php
										$dataSerial = unserialize($value->data);
										?>
										<?php if ($dataSerial['feature'] != ''): ?>
										<i class="infree_shipping"></i>
										<?php endif ?>
										<div class="clear"></div>
										<a href="<?php echo CHtml::normalizeUrl(array('/product/detail', 'id'=>$value->id)); ?>" class="btn btn-link btns_blueProducts"><i class="fa fa-search"></i></a>
									</div>
								</div>
							</div>
							<div class="clear"></div>
						</div>
					<?php endforeach ?>
				</div>
				<!-- end list product data -->
				<?php else: ?>
				<h3 class="text-center">No Data</h3>
				<?php endif ?>
                <div class="clear height-5"></div>
                <div class="ln_paginations">
                  <nav>
                  <?php $this->widget('CLinkPager', array(
                      'pages' => $product->getPagination(),
                      'header' => '',
                      'htmlOptions' => array('class'=>'pagination'),
                      'selectedPageCssClass' => 'active',
                  )) ?>
                  </nav>
                  <div class="clear"></div>
                </div>
				<?php /*
				<div class="text-center bs_bottom_pagin">
					<p>Halaman 1 dari 3</p>
				</div>
				*/ ?>
				<div class="clear height-50"></div>
				<div class="clear"></div>
			</div>
		</div>
	</div>

</section>
