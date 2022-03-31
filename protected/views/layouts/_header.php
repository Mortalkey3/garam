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

<header class="u-clearfix u-header u-header u-sticky u-sticky-da8c" id="sec-7f8c">
  <div class="headers" id="headers">
  <div class="u-clearfix u-sheet u-sheet-1">
      <div class="u-image u-image-circle u-preserve-proportions u-image-1" alt="" data-image-width="256" data-image-height="256" style="background-image:url('<?php echo Yii::app()->baseUrl.'/asset/images/'; ?>favicon-32x32.png');"></div>
        <p class="u-hidden-md u-hidden-sm u-hidden-xs u-text u-text-default u-text-white u-text-1">English | Bahasa Indonesia</p>
        <p class="u-hidden-md u-hidden-sm u-hidden-xs u-text u-text-default u-text-white u-text-2">www.cheethamsalt.com.au</p>
        <p class="u-enable-responsive u-hidden-md u-hidden-sm u-hidden-xs u-text u-text-white u-text-3"> PT. Cheetham Garam Indonesia</p>
        <p class="u-hidden-md u-hidden-sm u-hidden-xs u-text u-text-default u-text-white u-text-4"> Subsidiary Cheetham Salt Ltd. - Australia </p>
      
      
        <nav class="u-dropdown-icon u-menu u-menu-dropdown u-offcanvas u-menu-1">
          <div class="menu-collapse" style="font-size: 1rem; letter-spacing: 0px; font-weight: 700; text-transform: uppercase;">
            <a class="u-button-style u-custom-active-border-color u-custom-border u-custom-border-color u-custom-borders u-custom-hover-border-color u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-text-color u-custom-text-hover-color u-custom-top-bottom-menu-spacing u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="#" style="padding: 7px 12px; font-size: calc(1em + 14px);">
              <svg class="u-svg-link" viewBox="0 0 24 24"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-hamburger"></use></svg>
              <svg class="u-svg-content" version="1.1" id="menu-hamburger" viewBox="0 0 16 16" x="0px" y="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg"><g><rect y="1" width="16" height="2"></rect><rect y="7" width="16" height="2"></rect><rect y="13" width="16" height="2"></rect>
</g></svg>
            </a>
          </div>
          <div class="u-custom-menu u-nav-container">
            <ul class="u-nav u-spacing-30 u-unstyled u-nav-1">
              <li class="u-nav-item">
                <a class="u-border-2 u-border-active-palette-1-base u-border-hover-palette-1-base u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-1-base u-text-white <?php echo ($page == 'index')? 'active':''; ?>" href="<?php echo CHtml::normalizeUrl(array('/home/index', 'lang'=>Yii::app()->language)); ?>" style="padding: 10px 0px;"><?php echo Tt::t('front', 'HOME') ?></a>
              </li>
              <li class="u-nav-item">
                <a class="<?php echo ($page == 'about')? 'active':''; ?> u-border-2 u-border-active-palette-1-base u-border-hover-palette-1-base u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-1-base u-text-white" href="#" style="padding: 10px 0px;"><?php echo Tt::t('front', 'about us') ?></a>
                <div class="u-nav-popup">
                  <ul class="u-h-spacing-20 u-nav u-unstyled u-v-spacing-10 u-nav-2" style="cursor: pointer;border-radius: 15px;">
                    <li class="u-nav-item">
                      <a  href="<?php echo CHtml::normalizeUrl(array('/home/about', 'sub'=>'profile', 'lang'=>Yii::app()->language)); ?>" class="<?php echo (isset($_GET['sub']) && $_GET['sub'] == 'profile')? 'active':''; ?> u-button-style u-nav-link u-white" style="border-top-right-radius: 15px;border-top-left-radius: 15px"><?php echo Tt::t('front', 'Corporate Profile') ?></a>
                    </li>
                    <li class="u-nav-item" >
                      <a href="<?php echo CHtml::normalizeUrl(array('/home/about', 'sub'=>'history', 'lang'=>Yii::app()->language)); ?>" class="<?php echo (isset($_GET['sub']) && $_GET['sub'] == 'history')? 'active':''; ?> u-button-style u-nav-link u-white "><?php echo Tt::t('front', 'Cheetham History') ?></a>
                    </li>
                    <li class="u-nav-item" >
                      <a href="<?php echo CHtml::normalizeUrl(array('/home/about', 'sub'=>'our_value', 'lang'=>Yii::app()->language)); ?>" class="<?php echo (isset($_GET['sub']) && $_GET['sub'] == 'our_value')? 'active':''; ?> u-button-style u-nav-link u-white "><?php echo Tt::t('front', 'Our Value') ?></a>
                    </li>
                    <li class="u-nav-item" >
                      <a href="<?php echo CHtml::normalizeUrl(array('/home/location', 'lang'=>Yii::app()->language)); ?>" class="<?php echo ($subPage == 'location')? 'active':''; ?> u-button-style u-nav-link u-white" style="border-bottom-right-radius: 15px;border-bottom-left-radius: 15px"><?php echo Tt::t('front', 'our location') ?></a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="u-nav-item">
                <a class="<?php echo ($page == 'industry')? 'class="active"':''; ?> u-border-2 u-border-active-palette-1-base u-border-hover-palette-1-base u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-1-base u-text-white <?php echo ($page == 'industry')? 'active':''; ?>" href="<?php echo CHtml::normalizeUrl(array('/home/industry', 'lang'=>Yii::app()->language)); ?>" style="padding: 10px 0px;"><?php echo Tt::t('front', 'industries') ?></a>
              </li>
              <li class="u-nav-item">
                <a class="<?php echo ($page == 'products')? 'active':''; ?> u-border-2 u-border-active-palette-1-base u-border-hover-palette-1-base u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-1-base u-text-white" href="#" style="padding: 10px 0px;"><?php echo Tt::t('front', 'products') ?></a>
                <div class="u-nav-popup ">
                  <ul class="u-h-spacing-20 u-nav u-unstyled u-v-spacing-10 u-nav-2" style="cursor: pointer;border-radius: 15px;">
                    <li class="u-nav-item ">
                      <a style="border-top-right-radius: 15px;border-top-left-radius: 15px" href="<?php echo CHtml::normalizeUrl(array('/home/products', 'sub'=>'industry', 'lang'=>Yii::app()->language)); ?>" class="<?php echo (isset($_GET['sub']) && $_GET['sub'] == 'industry')? 'active':''; ?> u-button-style u-nav-link u-white"><?php echo Tt::t('front', 'Industry') ?></a>
                    </li>
                    <li class="u-nav-item" >
                      <a href="<?php echo CHtml::normalizeUrl(array('/home/products', 'sub'=>'human_salt', 'lang'=>Yii::app()->language)); ?>" class="<?php echo (isset($_GET['sub']) && $_GET['sub'] == 'human_salt')? 'active':''; ?> u-button-style u-nav-link u-white "><?php echo Tt::t('front', 'Human Salt Comsumption') ?></a>
                    </li>
                    <li class="u-nav-item" >
                      <a style="border-bottom-right-radius: 15px;border-bottom-left-radius: 15px" href="<?php echo CHtml::normalizeUrl(array('/home/labeling', 'lang'=>Yii::app()->language)); ?>" class="u-button-style u-nav-link u-white <?php echo ($subPage == 'labeling')? 'active':''; ?>"><?php echo Tt::t('front', 'private label') ?></a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="u-nav-item">
                <a class="<?php echo ($page == 'certificate')? 'active':''; ?> u-border-2 u-border-active-palette-1-base u-border-hover-palette-1-base u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-1-base u-text-white" href="#" style="padding: 10px 0px;"><?php echo Tt::t('front', 'certificate') ?></a>
                <div class="u-nav-popup ">
                  <ul class="u-h-spacing-20 u-nav u-unstyled u-v-spacing-10 u-nav-2" style="cursor: pointer;border-radius: 15px;">
                    <li class="u-nav-item">
                      <a style="border-top-right-radius: 15px;border-top-left-radius: 15px" href="<?php echo CHtml::normalizeUrl(array('/home/certificate', 'sub'=>'tech_info', 'lang'=>Yii::app()->language)); ?>" class="<?php echo (isset($_GET['sub']) && $_GET['sub'] == 'tech_info')? 'active':''; ?> u-button-style u-nav-link u-white"><?php echo Tt::t('front', 'Quality Assurance') ?></a>
                    </li>
                    <li class="u-nav-item" >
                      <a style="border-bottom-right-radius: 15px;border-bottom-left-radius: 15px" href="<?php echo CHtml::normalizeUrl(array('/home/certificate', 'sub'=>'awards', 'lang'=>Yii::app()->language)); ?>" class="<?php echo (isset($_GET['sub']) && $_GET['sub'] == 'awards')? 'active':''; ?> u-button-style u-nav-link u-white "><?php echo Tt::t('front', 'Award') ?></a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="u-nav-item">
                <a class="<?php echo ($page == 'contact')? 'active':''; ?> u-border-2 u-border-active-palette-1-base u-border-hover-palette-1-base u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-1-base u-text-white" href="#" style="padding: 10px 0px;"><?php echo Tt::t('front', 'contact us') ?></a>
                <div class="u-nav-popup">
                  <ul class="u-h-spacing-20 u-nav u-unstyled u-v-spacing-10 u-nav-2" style="cursor: pointer;border-radius: 15px;">
                    <li class="u-nav-item">
                      <a style="border-top-right-radius: 15px;border-top-left-radius: 15px" href="<?php echo CHtml::normalizeUrl(array('/home/contact',  'lang'=>Yii::app()->language)); ?>" class="<?php echo ($subPage == 'contact')? 'active':''; ?> u-button-style u-nav-link u-white"><?php echo Tt::t('front', 'Inquiry') ?></a>
                    </li>
                    <li class="u-nav-item" >
                      <a style="border-bottom-right-radius: 15px;border-bottom-left-radius: 15px" href="<?php echo CHtml::normalizeUrl(array('/home/career',  'lang'=>Yii::app()->language)); ?>" class="<?php echo ($subPage == 'career')? 'active':''; ?> u-button-style u-nav-link u-white "><?php echo Tt::t('front', 'CAREERS') ?></a>
                    </li>
                  </ul>
                </div>
              </li>
            </ul>
          </div>

          <div class="u-custom-menu u-nav-container-collapse">
            <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
              <div class="u-inner-container-layout u-sidenav-overflow">
                <div class="u-menu-close"></div>
                 
                <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-3">
                  <li class="u-nav-item"><a class="u-button-style u-nav-link <?php echo ($page == 'index')? 'active':''; ?>" href="<?php echo CHtml::normalizeUrl(array('/home/index', 'lang'=>Yii::app()->language)); ?>" style="padding: 10px 0px;"><?php echo Tt::t('front', 'HOME') ?></a></li>
                 
                  <div class="p-10">
                    <li class="u-nav-item"><a class="text-white u-button-style dropdown-toggle <?php echo ($page == 'about')? 'active':''; ?>" data-toggle="collapse" href="#about" role="button" aria-expanded="false" aria-controls="about"  style="padding: 10px 0px;display:block"><?php echo Tt::t('front', 'about us') ?></a>
                      
                      <div class=" collapse" id="about">
                        <ul class="u-h-spacing-20 u-nav u-unstyled u-v-spacing-10 u-nav-4">
                          <li class="u-nav-item"><a class="u-button-style u-nav-link <?php echo (isset($_GET['sub']) && $_GET['sub'] == 'profile')? 'active':''; ?>" href="<?php echo CHtml::normalizeUrl(array('/home/about', 'sub'=>'profile', 'lang'=>Yii::app()->language)); ?>"><?php echo Tt::t('front', 'Corporate Profile') ?></a></li>
                          <li class="u-nav-item"><a class="u-button-style u-nav-link <?php echo (isset($_GET['sub']) && $_GET['sub'] == 'history')? 'active':''; ?>" href="<?php echo CHtml::normalizeUrl(array('/home/about', 'sub'=>'history', 'lang'=>Yii::app()->language)); ?>"><?php echo Tt::t('front', 'Cheetham History') ?></a></li>
                          <li class="u-nav-item"><a class="u-button-style u-nav-link <?php echo (isset($_GET['sub']) && $_GET['sub'] == 'our_value')? 'active':''; ?>" href="<?php echo CHtml::normalizeUrl(array('/home/about', 'sub'=>'our_value', 'lang'=>Yii::app()->language)); ?>"><?php echo Tt::t('front', 'Our Value') ?></a></li>
                          <li class="u-nav-item"><a class="u-button-style u-nav-link <?php echo ($subPage == 'location')? 'active':''; ?>" href="<?php echo CHtml::normalizeUrl(array('/home/location', 'lang'=>Yii::app()->language)); ?>"><?php echo Tt::t('front', 'our location') ?></a></li>
                        </ul>
                      </div>
                    </li>
                  </div>
                  <li class="u-nav-item"><a class="u-button-style u-nav-link <?php echo ($page == 'industry')? 'class="active"':''; ?>" href="<?php echo CHtml::normalizeUrl(array('/home/industry', 'lang'=>Yii::app()->language)); ?>" style="padding: 10px 0px;"><?php echo Tt::t('front', 'industries') ?></a></li>
                  <div class="p-10">
                    <li class="u-nav-item"><a class="u-button-style text-white dropdown-toggle <?php echo ($page == 'certificate')? 'active':''; ?>" data-toggle="collapse" href="#certificate" role="button" aria-expanded="false" aria-controls="certificate" style="padding: 10px 0px;display:block"><?php echo Tt::t('front', 'certificate') ?></a>
                      <div class=" collapse" id="certificate">
                        <ul class="u-h-spacing-20 u-nav u-unstyled u-v-spacing-10 u-nav-4">
                          <li class="u-nav-item"><a class="u-button-style u-nav-link <?php echo (isset($_GET['sub']) && $_GET['sub'] == 'tech_info')? 'active':''; ?>" href="<?php echo CHtml::normalizeUrl(array('/home/certificate', 'sub'=>'tech_info', 'lang'=>Yii::app()->language)); ?>"><?php echo Tt::t('front', 'Quality Assurance') ?></a></li>
                          <li class="u-nav-item"><a class="u-button-style u-nav-link <?php echo (isset($_GET['sub']) && $_GET['sub'] == 'awards')? 'active':''; ?>" href="<?php echo CHtml::normalizeUrl(array('/home/certificate', 'sub'=>'awards', 'lang'=>Yii::app()->language)); ?>"><?php echo Tt::t('front', 'Award') ?></a></li>
                        </ul>
                      </div>
                    </li>
                  </div>
                    <li class="u-nav-item"><a class="u-button-style text-white dropdown-toggle <?php echo ($page == 'contact')? 'active':''; ?>" data-toggle="collapse" href="#contact" role="button" aria-expanded="false" aria-controls="contact" style="padding: 10px 0px;display:block"><?php echo Tt::t('front', 'contact us') ?></a>
                      <div class=" collapse" id="contact">
                        <ul class="u-h-spacing-20 u-nav u-unstyled u-v-spacing-10 u-nav-4">
                          <li class="u-nav-item"><a class="u-button-style u-nav-link <?php echo ($subPage == 'contact')? 'active':''; ?>" href="<?php echo CHtml::normalizeUrl(array('/home/contact',  'lang'=>Yii::app()->language)); ?>"><?php echo Tt::t('front', 'Inquiry') ?></a></li>
                          <li class="u-nav-item"><a class="u-button-style u-nav-link <?php echo ($subPage == 'career')? 'active':''; ?>" href="<?php echo CHtml::normalizeUrl(array('/home/career',  'lang'=>Yii::app()->language)); ?>"><?php echo Tt::t('front', 'CAREERS') ?></a></li>
                        </ul>
                      </div>
                    </li>
                </ul>
              </div>
            </div>
            <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
          </div>
        </nav>
      </div>
      </div>
    </header>