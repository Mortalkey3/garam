<div class="subpage static_about">
  
  <section class="default_sc middle_industry_first" id="industries2">
  <div class="prelatife container">
      <div class="clear height-50"></div>
      <div class="clear height-25"></div>
      <div class="insides text-center content-text">
        <div class="maw570 tengah">
          <h3 class="sub_title"><?php echo nl2br($this->setting['product_hero_title']) ?></h3>
          <div class="clear height-5"></div>
          <?php echo $this->setting['product_content'] ?>
        </div>
        <div class="clear height-10"></div>

        
        <!-- End block products -->
        <div class="blocks_wrap_products text-left">
          <?php foreach ($data as $key => $value): ?>
          <div class="category_list_block type_<?php echo $key ?>" data-id="<?php echo $key ?>">
            <div class="clear height-50"></div>
            <div class="text-center">
              <?php 
              $criteriac = new CDbCriteria;
              $criteriac->with = array('description');
              $criteriac->addCondition('t.type = :type');
              $criteriac->addCondition('t.id = :ids');
              $criteriac->params[':type'] = 'category';
              $criteriac->params[':ids'] = $key;

              $criteriac->addCondition('description.language_id = :language_id');
              $criteriac->params[':language_id'] = $this->languageID;

              $strCategory = PrdCategory::model()->find($criteriac);
              ?>
              <h4 class="sub_title"><?php echo $strCategory->description->name; ?></h3>
            </div>
              <div class="clear height-50"></div>
              <div class="clear height-10"></div>
              <div class="lists_product_data">
                <div class="row default">
                  <?php $numb = 1; ?>
                  <?php foreach ($value as $ke => $val) { ?>
                  <div class="col-md-6">
                    <div class="items">
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="picture"><img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(264,264, '/images/product/'. $val->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="<?php echo $val->description->name; ?>" class="img-responsive center-block"></div>
                        </div>
                        <div class="col-sm-6">
                          <div class="infos">
                            <span class="names"><?php echo $val->description->name ?></span>
                            <p><strong><?php echo Tt::t('front', 'Specification') ?></strong><br />
                            <?php echo $val->description->desc ?></p>
                            <p><strong><?php echo Tt::t('front', 'Packing') ?></strong><br />
                            <?php echo $val->description->packing ?></p>
                            <p><strong><?php echo Tt::t('front', 'Applications') ?></strong><br />
                            <?php echo $val->description->applications ?></p>
                            <?php if ($val->description->directions): ?>
                              <p><strong><?php echo Tt::t('front', 'Directions') ?></strong><br />
                              <?php echo $val->description->directions; ?></p>
                            <?php endif ?>
                            <button type="button" class="btn btn-default btns_blcBluek" data-toggle="modal" data-target="#myModal" data-image="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(264,264, '/images/product/'. $val->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" data-product="<?php echo strtoupper($val->description->name) ?>">Inquire This Product</button>
                            <div class="clear"></div>
                          </div>
                        </div>
                      </div>
                      <div class="clear"></div>
                    </div>
                  </div>
                  <?php if ( ($numb % 2) == 0): ?>
                    <?php if ($key != 1): ?>
                      <div class="clear height-10"></div>
                      <div class="lines_d"></div>
                      <div class="clear height-50"></div>
                    <?php endif ?>
                  <?php endif ?>
                  <?php $numb++; ?>
                  <?php } ?>
                </div>
              </div>
            <!-- End list product data -->
            <div class="clear"></div>
          </div>
          <?php endforeach ?>
        </div>


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

<script type="text/javascript">
  $(function(){

    $('button.btns_blcBluek').live('click', function () {
      var at_image = $(this).attr('data-image');
      var at_product = $(this).attr('data-product');

      $('.customs_modalPopup .ins_modal .picts img').attr('src', at_image);
      $('.customs_modalPopup .ins_modal .tops_title').text(at_product);
    });

  });
</script>
<!-- Modal -->
<div class="modal fade customs_modalPopup" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><img src="<?php echo $this->assetBaseurl; ?>lgo_head_resp.jpg" alt="" class="img-responsive"></h4>
      </div>
      <div class="modal-body">
        <div class="ins_modal">
          <div class="row">
            <div class="col-md-5 col-sm-5">
              <div class="picts">
                <img src="https://placehold.it/301x214" alt="" class="img-responsive">
              </div>
              <div class="clear"></div>
            </div>
            <div class="col-md-7 col-sm-7">
              <div class="tops_title">GARAM SAMUDRA</div>
              <span>INQUIRE THIS PRODUCT</span>
              <div class="clear"></div>
              <form class="form-horizontal" action="#" method="" onsubmit="javascript:alert('Sorry, is underconstruction'); return false;">
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">Name</label>
              <div class="col-sm-9">
                <input class="form-control" id="inputEmail3" type="text">
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail4" class="col-sm-3 control-label">Phone</label>
              <div class="col-sm-9">
                <input class="form-control" id="inputEmail4" type="text">
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail5" class="col-sm-3 control-label">Email</label>
              <div class="col-sm-9">
                <input class="form-control" id="inputEmail5" type="text">
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail6" class="col-sm-3 control-label">Message</label>
              <div class="col-sm-9">
                <textarea name="" id="" rows="5" class="form-control"></textarea>
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail6" class="col-sm-3 control-label">&nbsp;</label>
              <div class="col-sm-9">
                <div class="g-recaptcha" data-sitekey="6Lf3ti0UAAAAAEKq11Q2RhUwUgF_NxLc2-tvETGp"></div>
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-offset-3 col-sm-9">
                <button type="submit" class="btn btn-default">INQUIRE THIS PRODUCT</button>
              </div>
            </div>
          </form>
              <div class="clear"></div>
            </div>
          </div>
          <div class="clear"></div>
        </div>
        <!-- end modal body -->
      </div>
    </div>
  </div>
</div>
<script src='https://www.google.com/recaptcha/api.js'></script>