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

<div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->
    
    
    <div class="site-navbar-wrap">
      <div class="site-navbar site-navbar-target js-sticky-header">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-2">
              <h1 class="my-0 site-logo"><a href="index.html">Brand</a></h1>
            </div>
            <div class="col-10">
              <nav class="site-navigation text-right" role="navigation">
                <div class="container">
                  <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-white"><span class="icon-menu h3"></span></a></div>

                  <ul class="site-menu main-menu js-clone-nav d-none d-lg-block">
                    <li><a <?php echo ($page == 'index')? 'class="active"':''; ?> href="<?php echo CHtml::normalizeUrl(array('/home/index', 'lang'=>Yii::app()->language)); ?>"><?php echo Tt::t('front', 'HOME') ?></a></li>
                  
                    <li class="has-children">
                      <a href="#" class="nav-link <?php echo ($page == 'about')? 'active':''; ?>"  ><?php echo Tt::t('front', 'about us') ?></a>
                      <ul class="dropdown arrow-top" >
                        <li><a class="nav-link <?php echo (isset($_GET['sub']) && $_GET['sub'] == 'profile')? 'active':''; ?>"   href="<?php echo CHtml::normalizeUrl(array('/home/about', 'sub'=>'profile', 'lang'=>Yii::app()->language)); ?>"><?php echo Tt::t('front', 'Corporate Profile') ?></a></li>
                        <li><a class="nav-link <?php echo (isset($_GET['sub']) && $_GET['sub'] == 'history')? 'active':''; ?>" href="<?php echo CHtml::normalizeUrl(array('/home/about', 'sub'=>'history', 'lang'=>Yii::app()->language)); ?>"><?php echo Tt::t('front', 'Cheetham History') ?></a></li>
                        <li><a class="nav-link <?php echo (isset($_GET['sub']) && $_GET['sub'] == 'our_value')? 'active':''; ?>" href="<?php echo CHtml::normalizeUrl(array('/home/about', 'sub'=>'our_value', 'lang'=>Yii::app()->language)); ?>"><?php echo Tt::t('front', 'Our Value') ?></a></li>
                        <li><a class="nav-link <?php echo ($subPage == 'location')? 'active':''; ?>" href="<?php echo CHtml::normalizeUrl(array('/home/location', 'lang'=>Yii::app()->language)); ?>"><?php echo Tt::t('front', 'our location') ?></a></li>
                      </ul>
                    </li>
                    
                    <li><a <?php echo ($page == 'industry')? 'class="active"':''; ?> href="<?php echo CHtml::normalizeUrl(array('/home/industry', 'lang'=>Yii::app()->language)); ?>"><?php echo Tt::t('front', 'industries') ?></a></li>

                    <li class="has-children">
                      <a href="#" <?php echo ($page == 'products')? 'class="active"':''; ?> role="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><?php echo Tt::t('front', 'products') ?> <span class="caret"></span></a>
                      <ul class="dropdown arrow-top" aria-labelledby="dropdownMenu1">
                        <li><a <?php echo (isset($_GET['sub']) && $_GET['sub'] == 'industry')? 'class="active"':''; ?> href="<?php echo CHtml::normalizeUrl(array('/home/products', 'sub'=>'industry', 'lang'=>Yii::app()->language)); ?>"><?php echo Tt::t('front', 'Industry') ?></a></li>
                        <li><a <?php echo (isset($_GET['sub']) && $_GET['sub'] == 'human_salt')? 'class="active"':''; ?> href="<?php echo CHtml::normalizeUrl(array('/home/products', 'sub'=>'human_salt', 'lang'=>Yii::app()->language)); ?>"><?php echo Tt::t('front', 'Human Salt Comsumption') ?></a></li>
                        <li><a <?php echo ($subPage == 'labeling')? 'class="active"':''; ?> href="<?php echo CHtml::normalizeUrl(array('/home/labeling', 'lang'=>Yii::app()->language)); ?>"><?php echo Tt::t('front', 'private label') ?></a></li>
                      </ul>
                    </li>

                    <li class="has-children">
                      <a <?php echo ($page == 'certificate')? 'class="active"':''; ?>  href="#" role="button" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><?php echo Tt::t('front', 'certificate') ?> <span class="caret"></span></a>
                      <ul class="dropdown arrow-top" aria-labelledby="dropdownMenu3">
                        <li><a <?php echo (isset($_GET['sub']) && $_GET['sub'] == 'tech_info')? 'class="active"':''; ?> href="<?php echo CHtml::normalizeUrl(array('/home/certificate', 'sub'=>'tech_info', 'lang'=>Yii::app()->language)); ?>"><?php echo Tt::t('front', 'Quality Assurance') ?></a></li>
                        <li><a <?php echo (isset($_GET['sub']) && $_GET['sub'] == 'awards')? 'class="active"':''; ?> href="<?php echo CHtml::normalizeUrl(array('/home/certificate', 'sub'=>'awards', 'lang'=>Yii::app()->language)); ?>"><?php echo Tt::t('front', 'Award') ?></a></li>
                      </ul>
                    </li>
                    
                    <li><a <?php echo ($page == 'blog')? 'class="active"':''; ?> href="<?php echo CHtml::normalizeUrl(array('/blog/index', 'lang'=>Yii::app()->language)); ?>"><?php echo Tt::t('front', 'NEWS') ?></a></li>

                    <li class="has-children">
                      <a href="#" <?php echo ($page == 'contact')? 'class="active"':''; ?>  type="button" id="dropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><?php echo Tt::t('front', 'contact us') ?> <span class="caret"></span></a>
                      <ul class="dropdown arrow-top" aria-labelledby="dropdownMenu4">
                        <li><a <?php echo ($subPage == 'contact')? 'class="active"':''; ?> href="<?php echo CHtml::normalizeUrl(array('/home/contact', 'lang'=>Yii::app()->language)); ?>"><?php echo Tt::t('front', 'Inquiry') ?></a></li>
                        <li><a <?php echo ($subPage == 'career')? 'class="active"':''; ?> href="<?php echo CHtml::normalizeUrl(array('/home/career', 'lang'=>Yii::app()->language)); ?>"><?php echo Tt::t('front', 'CAREERS') ?></a></li>
                      </ul>
                    </li>

                    <li class="has-children">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-translate" viewBox="0 0 16 16">
                        <path d="M4.545 6.714 4.11 8H3l1.862-5h1.284L8 8H6.833l-.435-1.286H4.545zm1.634-.736L5.5 3.956h-.049l-.679 2.022H6.18z"/>
                        <path d="M0 2a2 2 0 0 1 2-2h7a2 2 0 0 1 2 2v3h3a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2v-3H2a2 2 0 0 1-2-2V2zm2-1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H2zm7.138 9.995c.193.301.402.583.63.846-.748.575-1.673 1.001-2.768 1.292.178.217.451.635.555.867 1.125-.359 2.08-.844 2.886-1.494.777.665 1.739 1.165 2.93 1.472.133-.254.414-.673.629-.89-1.125-.253-2.057-.694-2.82-1.284.681-.747 1.222-1.651 1.621-2.757H14V8h-3v1.047h.765c-.318.844-.74 1.546-1.272 2.13a6.066 6.066 0 0 1-.415-.492 1.988 1.988 0 0 1-.94.31z"/>
                      </svg>
                      <a href="#"><?php echo Tt::t('front', 'Lang') ?></a>
                      <ul class="dropdown arrow-top" aria-labelledby="dropdownMenu4">
                        <li>
                          <?php $get = $_GET;$get['lang'] = 'id';?>
                          <a <?php echo (Yii::app()->language == 'id')? 'class="active"':''; ?> href="<?php echo $this->createUrl($this->route, $get) ?>">Bahasa Indonesia</a>
                        </li>
                        <li>
                          <?php $get['lang'] = 'en';?>
                          <a <?php echo (Yii::app()->language == 'en')? 'class="active"':''; ?> href="<?php echo $this->createUrl($this->route, $get) ?>">English</a>
                        </li>
                      </ul>
                    </li>
                  </ul>
                </div>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>