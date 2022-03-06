
<?php
$e_activemenu = $this->action->id;
$controllers_ac = $this->id;
$session=new CHttpSession;
$session->open();
$login_member = $session['login_member'];

$active_menu_pg = $controllers_ac.'/'.$e_activemenu;
/*    $model = new ContactForm;
    $model->scenario = 'insert';

    if(isset($_POST['ContactForm']))
    {
      $model->attributes=$_POST['ContactForm'];

      if($model->validate())
      {
        // config email
        $messaged = $this->renderPartial('//mail/contact2',array(
          'model'=>$model,
        ),TRUE);
        $config = array(
          'to'=>array($model->email, $this->setting['email'], $this->setting['contact_email']),
          'subject'=>'['.Yii::app()->name.'] Contact from '.$model->email,
          'message'=>$messaged,
        );
        if ($this->setting['contact_cc']) {
          $config['cc'] = array($this->setting['contact_cc']);
        }
        if ($this->setting['contact_bcc']) {
          $config['bcc'] = array($this->setting['contact_bcc']);
        }

        // kirim email
        Common::mail($config);

        Yii::app()->user->setFlash('success_mail','Thank you for contact us. We will respond to you as soon as possible.');
        $this->refresh();
      }

    }*/
?>

<footer class="foot">
	<div class="prelatife container"> 
		<div class="clear height-35"></div>

		<div class="insides_footer">
			<h6 class="blc_title_footer">Cheetham Garam Indonesia - <?php echo Tt::t('front', 'Office & Plant') ?></h6>
			<div class="clear height-30"></div>
			<div class="row">
				<div class="col-md-10">
					<div class="bloc_address">
						<div class="row">
							<div class="col-md-3 col-sm-3">
								<div class="bc_address">
									<p><b><?php echo strtoupper($this->setting['location1_city']); ?></b></p>
									<address>
									<?php if ($this->setting['location1_phone']): ?>
									Phone. <?php echo $this->setting['location1_phone'] ?><br />
									<?php endif ?>
									<?php if ($this->setting['location1_fax']): ?>
									Fax. <?php echo $this->setting['location1_fax']; ?><br />
									<?php endif ?>
									<br />
									<?php echo nl2br($this->setting['location1_address']) ?>
									</address>
								</div>
							</div>
							<div class="col-md-3 col-sm-3">
								<div class="bc_address">
									<p><b><?php echo strtoupper($this->setting['location2_city']); ?></b></p>
									<address>
									<?php if ($this->setting['location2_phone']): ?>
									Phone. <?php echo $this->setting['location2_phone'] ?><br />
									<?php endif ?>
									<?php if ($this->setting['location2_fax']): ?>
									Fax. <?php echo $this->setting['location2_fax']; ?><br /><br />
									<?php endif ?>
									<?php echo nl2br($this->setting['location2_address']) ?>
									</address>
								</div>
							</div>
							<div class="col-md-3 col-sm-3">
								<div class="bc_address">
									<p><b><?php echo strtoupper($this->setting['location3_city']); ?></b></p>
									<address>
									<?php if ($this->setting['location3_phone']): ?>
									Phone. <?php echo $this->setting['location3_phone'] ?><br />
									<?php endif ?>
									<?php if ($this->setting['location3_fax']): ?>
									Fax. <?php echo $this->setting['location3_fax']; ?><br /><br />
									<?php endif ?>
									<?php echo nl2br($this->setting['location3_address']) ?>
									</address>
								</div>
							</div>
							<div class="col-md-3 col-sm-3">
								<div class="bc_address">
									<p><b><?php echo strtoupper($this->setting['location4_city']); ?></b></p>
									<address>
									<?php if ($this->setting['location4_phone']): ?>
									Phone. <?php echo $this->setting['location4_phone'] ?><br />
									<?php endif ?>
									<?php if ($this->setting['location4_fax']): ?>
									Fax. <?php echo $this->setting['location4_fax']; ?><br /><br />
									<?php endif ?>
									<?php echo nl2br($this->setting['location4_address']) ?>
									</address>
								</div>
							</div>
							
						</div>
					</div>
				</div>
				<div class="col-md-2">
						<div class="socmed_footer text-right">
							<p><b>Connect With Us</b></p><div class="clear"></div>
							<!-- <a href="#"><i class="fa fa-twitter"></i></a>&nbsp;&nbsp; -->
							<a target="_blank" href="https://www.facebook.com/pages/PT-Cheetham-Garam-Indonesia/218119828360865"><i class="fa fa-facebook-square"></i></a>&nbsp;&nbsp;
							<a target="_blank" href="https://www.instagram.com/"><i class="fa fa-instagram"></i></a>&nbsp;&nbsp;
							<!-- <a href="#"><i class="fa fa-linkedin"></i></a> -->
						</div>
				</div>
			</div>
			<div class="clear height-15"></div>
			<div class="clear"></div>
		</div>
	</div>

	<div class="back-cream">
			<div class="lines_grey"></div>
			<div class="clear height-20"></div>

		<div class="prelatife container">
			<div class="row">
				<div class="col-md-8 col-sm-8">
					<div class="t-copyrights">Copyright &copy; Cheetham Salt Indonesia - Cheetham Garam Indonesia 2017
					<br>Trademarks are proprietary to Cheetham Garam Indonesia - Cheetham Salt International or their respective owners.
					</div>
				</div>
				<!-- <div class="col-md-4 col-sm-4">
					<div class="t-copyrights text-right">
					Website design by <a target="_blank" title="Website Design Surabaya" href="http://www.markdesign.net/">Mark Design.</a>
					</div>
				</div> -->
			</div>
		</div>
	</div>
</footer>

<section class="live-chat d-none d-sm-block">
    <div class="row">
        <div class="col-md-60">
            <div class="live">
                <a href="https://wa.me/6281210009192">
                    <img src="<?php echo Yii::app()->baseUrl.'/asset/images/'; ?>icon-whatsapp-float.svg" class="img img-fluid" alt="">
                </a>
            </div>
        </div>
    </div>
</section>
<style>
    section.live-chat {
        position: fixed;
        right: 0;
        top: 60%;
        z-index: 30;
    }
    .live-chat .live img {
        max-width: 175px;
    }
</style>
<style>
	img[src^="https://um.simpli.fi/"],img[src^="https://i.liadm.com/"]{display:none}
</style>