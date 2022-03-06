<?php
$session = new CHttpSession;
$session->open();
?>
<div class="blocks_subpage_banner product mah152">
  <div class="container prelatife">
    <div class="clear h70"></div>
    <h3 class="sub_title_p">Payment Accepted</h3>
    <div class="clear"></div>
    <div class="lines_browns_md tengah"></div>
    <div class="clear height-20"></div>

    <div class="clear"></div>
  </div>
</div>

<div class="clear"></div>
<div class="subpage product">

  <div class="prelatife container">

    <div class="clear height-45"></div>
    <div class="back_product bloc_breadcrumb">
      <ol class="breadcrumb">
        <li><a href="<?php echo CHtml::normalizeUrl(array('/home/index')); ?>">Home</a></li>
        <li class="active">Payment Accepted</li>
      </ol>
      <div class="clear"></div>
    </div>


    <div class="outer-cont-carts"> 
        <div class="clear height-20"></div>

		<div class="blocks_border_defaults pb15">
			<div class="ins text-center">
				<div class="top">
					<h3>Your payment has been received</h3>
				</div>
				<div class="middle content-text">
					<div class="clear height-25"></div>
					<p>And please confirm your transfer via SMS / Phone number 29 563 081 230 <br>
						or email to info@stumbleuponcoffee.com.au with mentioning your invoice number.</p>

					<p>We will deliver the goods as soon as possible.</p>

					<h4><a href="<?php echo CHtml::normalizeUrl(array('/member/vieworder', 'nota'=>$_GET['nota'])); ?>">See your order here</a></h4>
					<div class="clear"></div>
				</div>
			</div>
		</div>
        <div class="clear height-50"></div><div class="height-20"></div>
            <div class="clear"></div>
    </div>


    <div class="clear"></div>
  </div>
</div>







