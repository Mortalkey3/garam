    <section id="filter-flyproduct" class="back-white h62 affix">
        <div class="prelatife container new-width outers-cont-filterproduct">
            <div class="row">
                <div class="col-md-6">
                    <div class="outers-breadcumb">
                        <ol class="breadcrumb">
                          <li><a href="#">COLLECTION</a></li>
                          <li><a href="#">BAGS</a></li>
                          <li class="active">MAJORE BATIK</li>
                        </ol>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="text-right">
                        <a href="#"><img src="<?php echo $this->assetBaseurl ?>t-back-toproducts.png" alt=""></a>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </section>
    <section class="home-middle-content">
        <div class="prelatife container new-width">
            <!-- start box detail product -->
            <div class="cont-detail-product">
                <div class="row">
                    <div class="col-md-6">

                        <div id="slider1" class="sliderwrapper">
                            <div class="contentdiv">
                                <img class="img-responsive" src="<?php echo $this->assetBaseurl ?>ex-pict-detail-big.jpg" alt="#">
                            </div>
                             <div class="clear"></div>
                        </div> 
                        <div class="clear height-25"></div>
                        <div class="box-thumb-pd-detail">
                            <div class="row" id="paginate-slider1" class="pagination">
                              <ul>
                                  <li class="item">
                                    <a href="#" class="toc img-hover">
                                        <img src="<?php echo $this->assetBaseurl ?>ex-pict-thumb-prod.jpg" alt="">    
                                    </a>
                                  </li>
                                  <li class="item">
                                    <a href="#" class="toc img-hover">
                                        <img src="<?php echo $this->assetBaseurl ?>ex-pict-thumb-prod.jpg" alt="">    
                                    </a>
                                  </li>
                                </ul>
                            </div>

                          </div>

                    </div>
                    <div class="col-md-6">
                        <div class="description">
                            <div class="row">
                                <div class="col-md-7">
                                    <span class="catr">BAGS</span>
                                    <div class="clear height-5"></div>
                                    <h3 class="title">Majore Batik</h3>
                                    <div class="clear height-5"></div><div class="height-2"></div>
                                    <span class="price">Rp 2,500,000</span>
                                </div>
                                <div class="col-md-5">
                                    <div class="clear height-50"></div><div class="height-5"></div>
                                    <form class="form-inline">
                                      <div class="form-group">
                                        <input type="number" class="form-control" value="1">
                                      </div>
                                      <button type="submit" class="btn btn-link btns-addcart"></button>
                                    </form>
                                </div>
                            </div>
                            <div class="clear height-35"></div>
                            <p>Ever wanted a weave / wicker bag for both casual and formal? Worry no more! This cotton weave hybrid is somewhat richer in texture giving the feel of extraordinary elegance. Feeling the elegant? Yes, this bag is highlighted with leathers, making it the perfect companion for all environment and occasions.</p>
                            <div class="clear height-10"></div>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <tr>
                                        <td>SIZE / DIMENSIONS</td>
                                        <td><b>21 X 18 X 33 cm</b></td>
                                    </tr>
                                    <tr>
                                        <td>WEIGHT</td>
                                        <td><b>299 gr</b></td>
                                    </tr>
                                    <tr>
                                        <td>PACKING</td>
                                        <td><b>Dust bag & Shoping Bag</b></td>
                                    </tr>
                                    <tr>
                                        <td>RETURN</td>
                                        <td><b>According to shop&rsquo;s policy (contact customer service for info)</b></td>
                                    </tr>
                                    <tr>
                                        <td>SHIPPING</td>
                                        <td><b>By JNE regular or YES</b></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="clear height-50"></div><div class="height-10"></div>
                            <div class="share-text">
                                SHARE THIS &nbsp;&nbsp;&nbsp;
                                <a href="#"><i class="fa fa-twitter"></i></a>&nbsp;&nbsp;
                                <a href="#"><i class="fa fa-facebook-square"></i></a>&nbsp;&nbsp;
                                <a href="#"><i class="fa fa-google-plus"></i></a>&nbsp;&nbsp;
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                            </div>

                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
            <!-- End box detail product -->
        </div>

        <div class="clear"></div>
    </section>

    <script>
    $('#myCarousel_home').carousel({
        interval: 5000, //changes the speed
    });

    $.getScript('//cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.min.js',function(){
        $('.list-product-default .img-responsive').lazyload({});
    });

    var wnw = $(window).width();

    if (wnw > 1025){
        $('#filter-flyproduct').affix({
          offset: {
            top: 150,
          }
        });
    };
    </script>