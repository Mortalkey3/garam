
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/asset/nicepage/product.css">
<style>
   body.modal-open {
    overflow: hidden;
    position:fixed;
    width: 100%;
    overflow-y: scroll;
}
.modal-backdrop
{
    opacity:0.5 !important;
}
img.u-image{
    padding: 0.2rem;
    background-color: #fff;
    -webkit-box-shadow: 0 0 12px 0 rgb(50 50 50 / 60%);
    -moz-box-shadow: 0 0 12px 0 rgba(50,50,50,.6);
    box-shadow: 0 0 12px 0 rgb(50 50 50 / 60%);
}
div.product_detail{
  cursor: pointer;
  opacity:0.6;
}
div.product_detail:hover{
  opacity:1;
}
div.product_detail:focus{
  opacity:1;
}
/* .btns_blcBluek {
        position: absolute;
        bottom: 0;
        right: 0;
    } */
@media only screen and (min-width: 960px) {
  infos {
    height:400px;
  }
}

</style>

<div class="subpage static_about">
  <section style="background-color:#303F7A" autofocus>
    <div class="prelatife container" >
      <div class="insides text-center content-text">
        
      <div class="clear height-50"></div>
      <div class="clear height-50"></div>
      <div class="clear height-50"></div>
        <div class="maw570 tengah">
          <h3 class="sub_title text-primary" ><?php echo nl2br($this->setting['product_hero_title']) ?></h3>
          <div class="clear height-5"></div>
          <div class="text-white"><?php echo $this->setting['product_content'] ?></div>
        </div>
        <div class="clear height-10"></div>
      <div class="clear height-50"></div>
      </div>
    </div>
  </section>
  <!-- <section class="default_sc middle_industry_first" id="industries2"> -->
  <section class="u-align-center-md u-align-center-sm u-align-center-xs u-clearfix u-section-1  bg-light" id="carousel_8d03">
    <div class="prelatife container">
      <?php foreach ($data as $key => $value): ?>
      <div class="u-clearfix u-sheet u-sheet-1" >
        <div class="clear height-50"></div>
        <div class="clear height-10"></div>
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
          
        </div>
        <div class="text-center">
        <h4 class="sub_title  mb-5" style="font-family:Poppins,sans-serif;font-size:25px;font-weight:700;color:#1a3880;line-height:1"><?php echo $strCategory->description->name; ?></h4>
        </div>
        <div class="clear height-10"></div>
        <div class="clear height-10"></div>
        <div class="clear height-10"></div>
        <div class="clear height-10"></div>
        <div class="u-container-style u-expanded-width-md u-expanded-width-sm u-expanded-width-xs u-group u-group-1" >
          <div class="u-container-layout u-container-layout-1" >
            <img id="productImage" class="u-expanded-width-xs u-image u-image-circle u-image-1"  src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(264,264, '/images/product/'. $value[0]->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="" data-image-width="1000" data-image-height="1500">
            <h2 class="u-align-left u-text u-text-1" style="font-size: 0.7rem;">
              <div class="infos" style="height: 400px;">
                <p id="productName" style="font-family:Poppins,sans-serif;font-size:25px;color:#1a3880;line-height:1"><strong><?php echo $value[0]->description->name ?></strong></p>
                <p><strong><?php echo Tt::t('front', 'Specification') ?></strong><br />
                <span id="productDesc" ><?php echo $value[0]->description->desc ?></span></p>
                <p><strong><?php echo Tt::t('front', 'Packing') ?></strong><br />
                <span id="productPacking" ><?php echo $value[0]->description->packing ?></span></p>
                <p><strong><?php echo Tt::t('front', 'Applications') ?></strong><br />
                <span id="productApplication" ><?php echo $value[0]->description->applications ?></span></p>
                <?php if ($value[0]->description->directions): ?>
                  <p id="productDirections"><strong><?php echo Tt::t('front', 'Directions') ?></strong><br />
                  <span  ><?php echo $value[0]->description->directions; ?></span></p>
                <?php endif ?>
                <button type="button" class="btn btn-primary btns_blcBluek pull-right btn-sm" data-toggle="modal" data-target="#myModal" data-image="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(264,264, '/images/product/'. $val->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" data-product="<?php echo strtoupper($val->description->name) ?>">Inquire This Product</button>
                <div class="clear"></div>
              </div>
            </h2>
            
          </div>
        </div>
        <div class="u-expanded-width u-layout-horizontal u-list u-list-2">
          <div class="u-repeater u-repeater-2">
              <?php $numb = 2; $index=0;?>
              <?php foreach ($value as $ke => $val) { ?>
                  <div id="slide-id-<?php echo $index?>" tabindex="-1" class="u-align-center u-container-style u-list-item u-repeater-item product_detail" <?php if($index==0) echo "autofocus";?> 
                    data-name="<?php echo $val->description->name;?>" data-desc="<?php echo $val->description->desc;?>" data-packing="<?php echo $val->description->packing;?>"
                    data-applications="<?php echo $val->description->applications;?>" data-directions="<?php echo $val->description->directions;?>"
                    data-directions_lang="<?php echo Tt::t('front', 'Directions') ?>" data-value="<?php echo $index?>"
                  >
                    <div class="u-container-layout u-similar-container u-valign-bottom u-container-layout-<?php echo $numb;?>" >
                      <img class="u-image u-image-circle u-image-<?php echo $numb;?>" src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(264,264, '/images/product/'. $val->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="" data-image-width="1000" data-image-height="1500">
                      <p class="u-text u-text-<?php echo $numb+1;?>"><?php echo $val->description->name ?></p>
                    </div>
                  </div>
                  
                <?php $numb=$numb+1;$index=$index+1;?>
              <?php } ?>
          </div>
          <a class="u-absolute-vcenter u-gallery-nav u-gallery-nav-prev u-grey-70 u-icon-circle u-opacity u-opacity-70 u-spacing-10 u-text-white u-gallery-nav-1" href="#" role="button">
            <span aria-hidden="true">
              <svg viewBox="0 0 451.847 451.847"><path d="M97.141,225.92c0-8.095,3.091-16.192,9.259-22.366L300.689,9.27c12.359-12.359,32.397-12.359,44.751,0
c12.354,12.354,12.354,32.388,0,44.748L173.525,225.92l171.903,171.909c12.354,12.354,12.354,32.391,0,44.744
c-12.354,12.365-32.386,12.365-44.745,0l-194.29-194.281C100.226,242.115,97.141,234.018,97.141,225.92z"></path></svg>
            </span>
            <span class="sr-only">
              <svg viewBox="0 0 451.847 451.847"><path d="M97.141,225.92c0-8.095,3.091-16.192,9.259-22.366L300.689,9.27c12.359-12.359,32.397-12.359,44.751,0
c12.354,12.354,12.354,32.388,0,44.748L173.525,225.92l171.903,171.909c12.354,12.354,12.354,32.391,0,44.744
c-12.354,12.365-32.386,12.365-44.745,0l-194.29-194.281C100.226,242.115,97.141,234.018,97.141,225.92z"></path></svg>
            </span>
          </a>
          <a class="u-absolute-vcenter u-gallery-nav u-gallery-nav-next u-grey-70 u-icon-circle u-opacity u-opacity-70 u-spacing-10 u-text-white u-gallery-nav-2" href="#" role="button">
            <span aria-hidden="true">
              <svg viewBox="0 0 451.846 451.847"><path d="M345.441,248.292L151.154,442.573c-12.359,12.365-32.397,12.365-44.75,0c-12.354-12.354-12.354-32.391,0-44.744
L278.318,225.92L106.409,54.017c-12.354-12.359-12.354-32.394,0-44.748c12.354-12.359,32.391-12.359,44.75,0l194.287,194.284
c6.177,6.18,9.262,14.271,9.262,22.366C354.708,234.018,351.617,242.115,345.441,248.292z"></path></svg>
            </span>
            <span class="sr-only">
              <svg viewBox="0 0 451.846 451.847"><path d="M345.441,248.292L151.154,442.573c-12.359,12.365-32.397,12.365-44.75,0c-12.354-12.354-12.354-32.391,0-44.744
L278.318,225.92L106.409,54.017c-12.354-12.359-12.354-32.394,0-44.748c12.354-12.359,32.391-12.359,44.75,0l194.287,194.284
c6.177,6.18,9.262,14.271,9.262,22.366C354.708,234.018,351.617,242.115,345.441,248.292z"></path></svg>
            </span>
          </a>
        </div>
        <?php endforeach ?>
      </div>
    </div>
  </section>
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
  $(document).ready(function() {
    
      $(".headers").removeClass("header_active");
    $('.product_detail').on('click', function (e) {
      $('.u-container-layout-1').css("display","none");
      $("#productName").text($(this).data("name"));
      $("#productDesc").text($(this).data("desc")); 
      $("#productPacking").text($(this).data("packing"));
      $("#productApplication").text($(this).data("applications"));
      if($(this).data("directions")!="")  
        $("#productDirections").html("<p id='productDirections'><strong>"+ $(this).data("directions_lang")+"</strong><br /><span>"+$(this).data("directions")+"</span></p>");         
      else
        $("#productDirections").html("<p id='productDirections'><strong>"+ "</strong><br /><span>"+"</span></p>");
      $('.u-container-layout-1').fadeIn(1000);
    });   
  });
</script>
<!-- Modal -->



<div class="modal fade customs_modalPopup" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel"><img src="<?php echo $this->assetBaseurl; ?>lgo_head_resp.jpg" alt="" class="img-responsive"></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        
      </div>
      <div class="modal-body modal-xl">
        <div class="row">
          <div class="col-lg-5">
            <div class="picts">
              <img src="/garam/images/product/.tmb/thumb_ea266-da8f1-product-crude_adaptiveResize_264_264.jpg" alt="" class="img-responsive">
            </div>
          </div>     
          <div class=" col-lg-7">
            <div class="ins_modal">
             <form class="form-horizontal" action="#" method="" onsubmit="javascript:alert('Sorry, is underconstruction'); return false;">
              <div class="tops_title">GARAM SAMUDRA</div>
              <span>INQUIRE THIS PRODUCT</span>
                <div class="form-group row m-2">
                  <label for="inputEmail3" class="col-sm-3 col-form-label">Name</label>
                  <div class="col-sm-9">
                    <input class="form-control" id="inputEmail3" type="text">
                  </div>
                </div>
                <div class="form-group  row m-2">
                  <label for="inputEmail4" class="col-sm-3 control-label">Phone</label>
                  <div class="col-sm-9">
                    <input class="form-control" id="inputEmail4" type="text">
                  </div>
                </div>
                <div class="form-group row m-2">
                  <label for="inputEmail5" class="col-sm-3 control-label">Email</label>
                  <div class="col-sm-9">
                    <input class="form-control" id="inputEmail5" type="text">
                  </div>
                </div>
                <div class="form-group row m-2">
                  <label for="inputEmail6" class="col-sm-3 control-label">Message</label>
                  <div class="col-sm-9">
                    <textarea name="" id="" rows="5" class="form-control"></textarea>
                  </div>
                </div>
                <div class="form-group row m-2">
                  <div class="offset-sm-3 col-sm-9">
                    <div class="g-recaptcha" data-sitekey="6Lf3ti0UAAAAAEKq11Q2RhUwUgF_NxLc2-tvETGp"></div>
                  </div>
                </div>

                <div class="form-group row m-2">
                  <div class="offset-sm-3 col-sm-9">
                    <button type="submit" class="btn btn-primary">INQUIRE THIS PRODUCT</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> 
</div>
<script src='https://www.google.com/recaptcha/api.js'></script>