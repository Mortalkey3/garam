<div class="clear"></div>
<div class="subpage static_about">
  <section class="default_sc middle_model_First back-white" id="product1">
      <div class="prelatife container">
          <div class="insides mw960 tengah content-text">
            <div class="mw820 tops tengah text-center margin-bottom-50">
                <h2 class="title_sb">Promotion</h2> <div class="clear"></div>
                <h3>Limited Offer</h3> <div class="clear"></div>
                <h4>Hubungi kami untuk pertanyaan produk Daihatsu atau Booking service.</h4>
                <div class="clear"></div>
            </div>

            <div class="lists_bloc_thumProduct promotion">
                <div class="row default">
                  <?php if ($dataFeatured->getTotalItemCount() > 0): ?>
                    <?php foreach ($dataFeatured->getData() as $key => $value){ ?>
                    <div class="col-md-6 col-sm-6">
                        <div class="items">
                            <div class="pict"><a href="<?php echo CHtml::normalizeUrl(array('/home/promotionDetail', 'id'=>$value->id)); ?>"><img src="https://placehold.it/475x229" alt="" class="img-responsive"></a></div>
                            <div class="info text-center padding-top-20">
                                <p><strong><?php echo $value->description->title ?></strong></p>
                                <a href="<?php echo CHtml::normalizeUrl(array('/home/promotionDetail', 'id'=>$value->id)); ?>" class="btn btn-default btns_red">LEBIH DETIL</a>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                  <?php endif; ?>

                </div>
            </div>
            <div class="clear"></div>
          </div>
      </div>
  </section>

</div>
<!-- End subpage static -->