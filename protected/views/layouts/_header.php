<?php 
    $e_activemenu = $this->action->id;
    $controllers_ac = $this->id;
    $session=new CHttpSession;
    $session->open();
    $login_member = $session['login_member'];

    $active_menu_pg = $controllers_ac.'/'.$e_activemenu;

$criteria = new CDbCriteria;
$criteria->with = array('description');
$criteria->addCondition('parent_id = 0');
$criteria->addCondition('type = "category"');
$criteria->addCondition('description.language_id = :language_id');
$criteria->params[':language_id'] = $this->languageID;
$criteria->order = 'sort ASC';
$dataCategory = PrdCategory::model()->findAll($criteria);
?>

<div class="outers_back_headers">
  <header class="head">
    <div class="visible-lg visible-md">
      <div class="top_header">
        <div class="prelatife container">
          <div class="clear height-20"></div>
          <div class="row">
            <div class="col-lg-8 col-md-8">
              <div class="d-inline lgo_webHeaders_cheetham">
                <a href="<?php echo CHtml::normalizeUrl(array('/home/index', 'lang'=>Yii::app()->language)); ?>"><img src="<?php echo $this->assetBaseurl ?>lgo_wb_headers-cheetham.jpg" alt="" class="img-responsive"></a>
              </div>
            </div>
            <div class="col-lg-4 col-md-4">
              <div class="text-right rights_block_topRght_menu">
                <a target="_blank" href="http://www.cheethamsalt.com.au">CHEETHAMSALT.COM.AU</a>
                <div class="clear"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="bottoms_headr">
        <div class="prelatife container">
          <div class="row">
            <div class="col-md-9">
              <div class="top-menu">
                <ul class="list-inline">
                  <li><a href="<?php echo CHtml::normalizeUrl(array('/home/index', 'lang'=>Yii::app()->language)); ?>"><?php echo Tt::t('front', 'HOME') ?></a></li>

                  <li class="dropdown">
                    <a href="#" role="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><?php echo Tt::t('front', 'products') ?> <span class="caret"></span></a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                      <li><a href="<?php echo CHtml::normalizeUrl(array('/home/products', 'sub'=>'industry', 'lang'=>Yii::app()->language)); ?>"><?php echo Tt::t('front', 'Industry') ?></a></li>
                      <li><a href="<?php echo CHtml::normalizeUrl(array('/home/products', 'sub'=>'human_salt', 'lang'=>Yii::app()->language)); ?>"><?php echo Tt::t('front', 'Human Salt Comsumption') ?></a></li>
                      <li><a href="<?php echo CHtml::normalizeUrl(array('/home/labeling', 'lang'=>Yii::app()->language)); ?>"><?php echo Tt::t('front', 'private label') ?></a></li>
                    </ul>
                  </li>

                  <li class="dropdown">
                    <a href="#" role="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><?php echo Tt::t('front', 'about us') ?> <span class="caret"></span></a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                      <li><a href="<?php echo CHtml::normalizeUrl(array('/home/about', 'sub'=>'profile', 'lang'=>Yii::app()->language)); ?>"><?php echo Tt::t('front', 'Corporate Profile') ?></a></li>
                      <li><a href="<?php echo CHtml::normalizeUrl(array('/home/about', 'sub'=>'history', 'lang'=>Yii::app()->language)); ?>"><?php echo Tt::t('front', 'Cheetham History') ?></a></li>
                      <li><a href="<?php echo CHtml::normalizeUrl(array('/home/about', 'sub'=>'our_value', 'lang'=>Yii::app()->language)); ?>"><?php echo Tt::t('front', 'Our Value') ?></a></li>
                      <li><a href="<?php echo CHtml::normalizeUrl(array('/home/location', 'lang'=>Yii::app()->language)); ?>"><?php echo Tt::t('front', 'our location') ?></a></li>
                    </ul>
                  </li>

                  <li><a href="<?php echo CHtml::normalizeUrl(array('/home/industry', 'lang'=>Yii::app()->language)); ?>"><?php echo Tt::t('front', 'industries') ?></a></li>

                  <li class="dropdown">
                    <a href="#" role="button" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><?php echo Tt::t('front', 'certificate') ?> <span class="caret"></span></a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu3">
                      <li><a href="<?php echo CHtml::normalizeUrl(array('/home/certificate', 'sub'=>'tech_info', 'lang'=>Yii::app()->language)); ?>"><?php echo Tt::t('front', 'Quality Assurance') ?></a></li>
                      <li><a href="<?php echo CHtml::normalizeUrl(array('/home/certificate', 'sub'=>'awards', 'lang'=>Yii::app()->language)); ?>"><?php echo Tt::t('front', 'Award') ?></a></li>
                    </ul>
                  </li>
                  
                  <li><a href="<?php echo CHtml::normalizeUrl(array('/blog/index', 'lang'=>Yii::app()->language)); ?>"><?php echo Tt::t('front', 'news') ?></a></li>

                  <li class="dropdown">
                    <a href="#" type="button" id="dropdownMenu4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><?php echo Tt::t('front', 'contact us') ?> <span class="caret"></span></a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu4">
                      <li><a href="<?php echo CHtml::normalizeUrl(array('/home/contact', 'lang'=>Yii::app()->language)); ?>"><?php echo Tt::t('front', 'Inquiry') ?></a></li>
                      <li><a href="<?php echo CHtml::normalizeUrl(array('/home/career', 'lang'=>Yii::app()->language)); ?>"><?php echo Tt::t('front', 'CAREERS') ?></a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            
            </div>
            <div class="col-md-3 text-right">
              <div class="thn_languages">
                <span>Language</span> &nbsp;&nbsp;
                <?php
                $get = $_GET;
                $get['lang'] = 'en';
                ?>
                <a <?php echo (Yii::app()->language == 'en')? 'class="active"':''; ?> href="<?php echo $this->createUrl($this->route, $get) ?>">ENG</a> &nbsp;&nbsp;|&nbsp;&nbsp;
                <?php
                $get['lang'] = 'id';
                ?>
                <a <?php echo (Yii::app()->language == 'id')? 'class="active"':''; ?> href="<?php echo $this->createUrl($this->route, $get) ?>">IND</a>
              </div>
              <div class="clear"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
      <div class="visible-sm visible-xs">
        <nav class="navbar navbar-default">
          <div class="container-fluid">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="<?php echo CHtml::normalizeUrl(array('/home/index', 'lang'=>Yii::app()->language)); ?>">
                <img src="<?php echo $this->assetBaseurl; ?>lgo_head_resp.jpg" alt="" class="img-responsive">
              </a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav navbar-right">
               <li><a href="<?php echo CHtml::normalizeUrl(array('/home/index', 'lang'=>Yii::app()->language)); ?>"><?php echo Tt::t('front', 'HOME') ?></a></li>

                  <li class="dropdown">
                    <a href="#" role="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><?php echo Tt::t('front', 'products') ?> <span class="caret"></span></a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                      <li><a href="<?php echo CHtml::normalizeUrl(array('/home/products', 'sub'=>'industry', 'lang'=>Yii::app()->language)); ?>"><?php echo Tt::t('front', 'Industry') ?></a></li>
                      <li><a href="<?php echo CHtml::normalizeUrl(array('/home/products', 'sub'=>'human_salt', 'lang'=>Yii::app()->language)); ?>"><?php echo Tt::t('front', 'Human Salt Comsumption') ?></a></li>
                      <li><a href="<?php echo CHtml::normalizeUrl(array('/home/labeling', 'lang'=>Yii::app()->language)); ?>"><?php echo Tt::t('front', 'private label') ?></a></li>
                    </ul>
                  </li>

                  <li class="dropdown">
                    <a href="#" role="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><?php echo Tt::t('front', 'about us') ?> <span class="caret"></span></a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                      <li><a href="<?php echo CHtml::normalizeUrl(array('/home/about', 'sub'=>'profile', 'lang'=>Yii::app()->language)); ?>"><?php echo Tt::t('front', 'Corporate Profile') ?></a></li>
                      <li><a href="<?php echo CHtml::normalizeUrl(array('/home/about', 'sub'=>'history', 'lang'=>Yii::app()->language)); ?>"><?php echo Tt::t('front', 'Cheetham History') ?></a></li>
                      <li><a href="<?php echo CHtml::normalizeUrl(array('/home/about', 'sub'=>'our_value', 'lang'=>Yii::app()->language)); ?>"><?php echo Tt::t('front', 'Our Value') ?></a></li>
                      <li><a href="<?php echo CHtml::normalizeUrl(array('/home/location', 'lang'=>Yii::app()->language)); ?>"><?php echo Tt::t('front', 'our location') ?></a></li>
                    </ul>
                  </li>

                  <li><a href="<?php echo CHtml::normalizeUrl(array('/home/industry', 'lang'=>Yii::app()->language)); ?>"><?php echo Tt::t('front', 'industries') ?></a></li>

                  <li class="dropdown">
                    <a href="#" role="button" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><?php echo Tt::t('front', 'certificate') ?> <span class="caret"></span></a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu3">
                      <li><a href="<?php echo CHtml::normalizeUrl(array('/home/certificate', 'sub'=>'tech_info', 'lang'=>Yii::app()->language)); ?>"><?php echo Tt::t('front', 'Quality Assurance') ?></a></li>
                      <li><a href="<?php echo CHtml::normalizeUrl(array('/home/certificate', 'sub'=>'awards', 'lang'=>Yii::app()->language)); ?>"><?php echo Tt::t('front', 'Award') ?></a></li>
                    </ul>
                  </li>
                  
                  <li><a href="<?php echo CHtml::normalizeUrl(array('/blog/index', 'lang'=>Yii::app()->language)); ?>"><?php echo Tt::t('front', 'news') ?></a></li>

                  <li class="dropdown">
                    <a href="#" type="button" id="dropdownMenu4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><?php echo Tt::t('front', 'contact us') ?> <span class="caret"></span></a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu4">
                      <li><a href="<?php echo CHtml::normalizeUrl(array('/home/contact', 'lang'=>Yii::app()->language)); ?>"><?php echo Tt::t('front', 'Inquiry') ?></a></li>
                      <li><a href="<?php echo CHtml::normalizeUrl(array('/home/certificate', 'lang'=>Yii::app()->language)); ?>"><?php echo Tt::t('front', 'CAREERS') ?></a></li>
                    </ul>
                  </li>
              </ul>
              <div class="clear height-10"></div>
              <div class="list d-inline tx_language">
                <?php
                $get = $_GET;
                $get['lang'] = 'en';
                ?>
                <a href="<?php echo $this->createUrl($this->route, $get) ?>">ENG</a>
                &nbsp;&nbsp;|&nbsp;&nbsp;
                <?php
                $get['lang'] = 'id';
                ?>
                <a href="<?php echo $this->createUrl($this->route, $get) ?>">IND</a>
                </div>
                <div class="clear height-10"></div>
            </div>
          </div>
        </nav>
        <div class="clear"></div>
      </div>
      
    <div class="clear"></div>
  </header>
</div>


<script type="text/javascript">
    $(function(){
      var widths = $(window).width();
      if (widths > 1024){
        $('#myAffix').affix({
          offset: {
            top: 300
          }
        });
      }else{
        $('section#myAffix').hide();
      }

    });
  </script>

<section id="myAffix" class="header-affixs affix-top">
  <div class="clear height-5"></div>
  <div class="prelatife container">
    <div class="row">
      <div class="col-md-3 col-sm-3">
        <div class="lgo-web-web_affix">
          <a href="<?php echo CHtml::normalizeUrl(array('/home/index')); ?>">
            <img src="<?php echo $this->assetBaseurl ?>lgo_wb_headers-cheetham.jpg" alt="" class="img-responsive d-inline">
          </a>
        </div>
      </div>
      <div class="col-md-9 col-sm-9">
        <div class="text-right"> 
          <div class="clear height-20"></div>
          <div class="menu-taffix">
            <ul class="list-inline">
              <li><a href="<?php echo CHtml::normalizeUrl(array('/home/index', 'lang'=>Yii::app()->language)); ?>"><?php echo Tt::t('front', 'HOME') ?></a></li>

                  <li class="dropdown">
                    <a href="#" role="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><?php echo Tt::t('front', 'products') ?> <span class="caret"></span></a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                      <li><a href="<?php echo CHtml::normalizeUrl(array('/home/products', 'sub'=>'industry', 'lang'=>Yii::app()->language)); ?>"><?php echo Tt::t('front', 'Industry') ?></a></li>
                      <li><a href="<?php echo CHtml::normalizeUrl(array('/home/products', 'sub'=>'human_salt', 'lang'=>Yii::app()->language)); ?>"><?php echo Tt::t('front', 'Human Salt Comsumption') ?></a></li>
                      <li><a href="<?php echo CHtml::normalizeUrl(array('/home/labeling', 'lang'=>Yii::app()->language)); ?>"><?php echo Tt::t('front', 'private label') ?></a></li>
                    </ul>
                  </li>

                  <li class="dropdown">
                    <a href="#" role="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><?php echo Tt::t('front', 'about us') ?> <span class="caret"></span></a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                      <li><a href="<?php echo CHtml::normalizeUrl(array('/home/about', 'sub'=>'profile', 'lang'=>Yii::app()->language)); ?>"><?php echo Tt::t('front', 'Corporate Profile') ?></a></li>
                      <li><a href="<?php echo CHtml::normalizeUrl(array('/home/about', 'sub'=>'history', 'lang'=>Yii::app()->language)); ?>"><?php echo Tt::t('front', 'Cheetham History') ?></a></li>
                      <li><a href="<?php echo CHtml::normalizeUrl(array('/home/about', 'sub'=>'our_value', 'lang'=>Yii::app()->language)); ?>"><?php echo Tt::t('front', 'Our Value') ?></a></li>
                      <li><a href="<?php echo CHtml::normalizeUrl(array('/home/location', 'lang'=>Yii::app()->language)); ?>"><?php echo Tt::t('front', 'our location') ?></a></li>
                    </ul>
                  </li>

                  <li><a href="<?php echo CHtml::normalizeUrl(array('/home/industry', 'lang'=>Yii::app()->language)); ?>"><?php echo Tt::t('front', 'industries') ?></a></li>

                  <li class="dropdown">
                    <a href="#" role="button" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><?php echo Tt::t('front', 'certificate') ?> <span class="caret"></span></a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu3">
                      <li><a href="<?php echo CHtml::normalizeUrl(array('/home/certificate', 'sub'=>'tech_info', 'lang'=>Yii::app()->language)); ?>"><?php echo Tt::t('front', 'Quality Assurance') ?></a></li>
                      <li><a href="<?php echo CHtml::normalizeUrl(array('/home/certificate', 'sub'=>'awards', 'lang'=>Yii::app()->language)); ?>"><?php echo Tt::t('front', 'Award') ?></a></li>
                    </ul>
                  </li>
                  
                  <li><a href="<?php echo CHtml::normalizeUrl(array('/blog/index', 'lang'=>Yii::app()->language)); ?>"><?php echo Tt::t('front', 'news') ?></a></li>

                  <li class="dropdown">
                    <a href="#" type="button" id="dropdownMenu4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><?php echo Tt::t('front', 'contact us') ?> <span class="caret"></span></a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu4">
                      <li><a href="<?php echo CHtml::normalizeUrl(array('/home/contact', 'lang'=>Yii::app()->language)); ?>"><?php echo Tt::t('front', 'Inquiry') ?></a></li>
                      <li><a href="<?php echo CHtml::normalizeUrl(array('/home/certificate', 'lang'=>Yii::app()->language)); ?>"><?php echo Tt::t('front', 'CAREERS') ?></a></li>
                    </ul>
                  </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="clear"></div>
  </div>
</section>