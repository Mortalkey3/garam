    <div class="outers-middle-contents">
        <section class="back-cream-middle mh450 padding-bottom-30 border-top-insidespage">
            <div class="prelatife container content-text"> <div class="clear height-50"></div><div class="height-40"></div>
            <div class="text-center">
                <h1 class="title-pages wow fadeInUp">TRIPS</h1>
            </div>
            <div class="clear height-40"></div><div class="height-40"></div>
            <div class="list-dts-triss text-center">
              <div class="bulk">
                <div class="title-years wow fadeInUp">2016</div>
                <div class="clear height-25"></div>
                <div class="lines-grey"></div> <div class="clear height-50"></div>
                <div class="list-data-yearstrips wow fadeInUp">
                    <div class="row">
                      <?php
                        $month_name = array();
                        for ($i = 1; $i < 13; $i++) {
                            $month_name[] = date("F", mktime(null, null, null, $i));
                        }
                      ?>
                      <?php for ($i=0; $i < 12; $i++) { ?>
                      <div class="col-md-3 col-sm-6">
                          <div class="itemss"> 
                            <div class="clear height-30"></div>
                            <span class="month"><?php echo strtoupper($month_name[$i]); ?></span>
                            <div class="clear height-30"></div>
                            <p>10-19 <br>
                            <b>BALI</b></p>

                            <p>21-26 <br>
                            <b>LOMBOK</b></p>

                            <p>29-31 <br>
                            <b>SINGAPORE</b></p>
                            <div class="clear height-50"></div><div class="height-50"></div><div class="height-20"></div>
                          </div>
                      </div>
                      <?php } ?>
                    </div>
                    <div class="clear"></div>
                </div>

                <div class="clear"></div>
              </div>
            </div>


                <div class="clear"></div>
            </div>
        </section>

        <section class="back-white mh383">
            <div class="prelatife container">
              <div class="clear height-50"></div>
              <div class="outers-cont-ginstagram">

                <div class="text-center tops">
                  <img src="<?php echo $this->assetBaseurl; ?>icons-instagram.png" alt="">
                  <div class="clear height-15"></div><div class="height-4"></div>
                  <h5 class="titles">FROM OUR INSTAGRAM @SYMPICTURES</h5>
                </div> <div class="clear"></div>
                <div class="clear height-10"></div>
                <div class="middles">
                  <div id="instafeed"></div>
                </div>
                <div class="clear"></div>
              </div>
              <!-- end cont instagram -->
              
              <div class="clear"></div>
            </div>
        </section>

       
        <div class="clear"></div>
    </div>
<script type="text/javascript">
    var feed = new Instafeed({
        get: 'user',
        userId: 2157781237,
        accessToken: '2291354346.1677ed0.d0e72faf47c54ecdbea660d33164f118',
        target: 'instafeed',
        limit: 8,
        // resolution : 'thumbnail',
        template: '<div class="items"><a href="{{link}}" target="_blank"><img class="img-responsive" src="{{image}}" /></a></div>',
        after: function(){
             // $("#instafeed").owlCarousel();
             // var isidataGal =  $('#instafeed').html();
             // var owl = $("#owl-example").html(isidataGal);
              $('#instafeed').html();
 
              // owl.owlCarousel({
              //     items : 6, 
              //     itemsDesktop : [1000,5], 
              //     itemsDesktopSmall : [900,3], 
              //     itemsTablet: [600,2], 
              //     pagination: false,
              //     itemsMobile : false, 
              // });

               // Custom Navigation Events
              $(".customNavigation a.arrow-right").click(function(){
                  // owl.trigger('owl.next');
              });

              $(".customNavigation a.arrow-left").click(function(){
                  // owl.trigger('owl.prev');
              });

            },
    });
  feed.run();

</script>