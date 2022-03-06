<div class="blocks_subpage_banner product mah152">
  <div class="container prelatife">
    <div class="clear h70"></div>
    <h3 class="sub_title_p">VIEW ORDER</h3>
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
        <li class="active">View Order <?php echo $modelOrder->invoice_prefix ?>-<?php echo $modelOrder->invoice_no ?></li>
      </ol>
      <div class="clear"></div>
    </div>


    <div class="outer-cont-carts"> 
        <div class="clear height-20"></div>



		<div class="inside-content">
			
			<!-- /. Start Content About -->
			<div class="m-ins-content detail-shopcart content-text">
				<!-- <h1 class="title-inside-page">View Order</h1> -->

				<div class="alert alert-success">
					<h4>Order ID: <?php echo $modelOrder->invoice_prefix ?>-<?php echo $modelOrder->invoice_no ?> "<b><?php echo OrOrderStatus::model()->findByPk($modelOrder->order_status_id)->name ?></b>"</h4>
				</div>
				<div class="lines-green"></div>
				<?php /*
				<?php if ($modelOrder->order_status_id == 1 OR $modelOrder->order_status_id == 7): ?>
				<p><b>Pay With</b> <br>
					<a href="<?php echo CHtml::normalizeUrl(array('/paypal/createpayment', 'nota'=>$modelOrder->invoice_prefix.'-'.$modelOrder->invoice_no)); ?>">
						<img src="<?php echo Yii::app()->baseUrl ?>/asset/images/paypal-payments.png" alt="">
					</a>
				</p>
				<?php endif ?>
				*/ ?>
				<div class="row">
					<div class="col-md-4">
						<b>Shipping address</b><br>
						<?php echo $modelOrder->shipping_first_name ?> <?php echo $modelOrder->shipping_last_name ?><br>
						<?php echo $modelOrder->shipping_address_1 ?><br>
						<?php echo City::model()->find('id = :id GROUP BY id', array(':id'=>$modelOrder->shipping_city))->type ?> <?php echo City::model()->find('id = :id GROUP BY id', array(':id'=>$modelOrder->shipping_city))->city_name ?><br>
						<?php echo City::model()->find('province_id = :province_id GROUP BY province_id', array(':province_id'=>$modelOrder->shipping_zone))->province ?><br>
						Mobile phone : <?php echo $modelOrder->phone ?><br>
						</p>
						<div class="height-20"></div>
					</div>
						<?php /*
					<div class="col-md-4">
						<b>Payment address</b><br>
						<?php echo $modelOrder->payment_first_name ?> <?php echo $modelOrder->payment_last_name ?><br>
						<?php echo $modelOrder->payment_address_1 ?><br>
						<?php echo $modelOrder->payment_city ?><br>
						<?php echo City::model()->find('province_id = :province_id GROUP BY province_id', array(':province_id'=>$modelOrder->shipping_zone))->province ?>, <?php echo $modelOrder->payment_postcode ?><br>
						Mobile phone : <?php echo $modelOrder->phone ?><br>
						</p>
						<div class="height-20"></div>
					</div>
						*/ ?>
					<?php
					$qty = 0;
					$berat = 0;
					foreach ($data as $key => $value){
						$qty = $qty + $value->qty;
						$berat = $berat + ($value->qty*$value->berat);
					}
					?>
					<div class="col-md-4">
						<div class="row">
							<div class="col-sm-6">
								<b>Qty Item(s):</b> <br>
								<?php echo $qty ?> Item(s) <br> (<?php echo $berat ?> gram)
							</div>
							<div class="col-sm-6">
								<?php /*
								<b>Delivery Price:</b> <br>
								<?php echo Cart::money($modelOrder->delivery_price, 0) ?> <br>
								*/ ?>
								<b>Total Payment:</b> <br>
								<?php echo Cart::money($modelOrder->total, 0) ?> <br>
							</div>
						</div>
						<div class="height-20"></div>
						<div class="row">
							<div class="col-sm-12">
								<?php /*
								<b>Tracking Code:</b> <br>
								<?php if ($modelOrder->tracking_id != ''): ?>
								<div id="as-root"></div><script>(function(e,t,n){var r,i=e.getElementsByTagName(t)[0];if(e.getElementById(n))return;r=e.createElement(t);r.id=n;r.src="//button.aftership.com/all.js";i.parentNode.insertBefore(r,i)})(document,"script","aftership-jssdk")</script>
								<div data-tracking-number="<?php echo $modelOrder->tracking_id ?>" data-slug="jne" data-size="small" class="as-track-button"></div>
								<?php else: ?>
								Barang belum di kirim
								<?php endif ?>
								*/ ?>
							</div>
						</div>
					</div>
				</div>
				<h4><b>List Product</b></h4>
			    <table class="table table-striped shopcart">
			    	<thead>
			    		<tr>
			    			<td width="20%">Item</td>
			    			<td>&nbsp;</td>
			    			<!-- <td>Option</td> -->
			    			<td width="15%">Quantity</td>
			    			<td width="15%"><b>Total</b></td>
			    		</tr>
			    	</thead>
			    	<tbody>
			    		<?php $total = 0 ?>
			    		<?php foreach ($data as $key => $value): ?>
			    		<?php
			    		$dataSerialize = unserialize($value->data);
			    		?>
			    		<tr>
			    			<td>
			    				<div class="left pic">
			    					<img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(140,140, '/images/product/'.$value['image'] , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="">
			    				</div>
			    			</td>
			    			<td>
			    				<span class="title">
			    					<?php echo $value['name'] ?> @<?php echo Cart::money($value['price']) ?>
			    					<?php if ($dataSerialize['box'] != ''): ?>
			    					<br>With box + <?php echo Cart::money($dataSerialize['box']) ?>
			    					<?php endif ?>
			    					<?php if ($value['attributes_id'] != '0'): ?>
			    					<br>Size: <?php echo $value['attributes_name'] ?>
			    					<?php endif ?>
                                    <?php if ($dataSerialize['grind'] != ''): ?>
                                    <br>Grind: <?php echo $dataSerialize['grind'] ?>
                                    <?php endif ?>
			    				</span>
			    			</td>
			    			<?php /*
			    			<td>
								<?php
								$totalOption = 0;
								$value['option'] = unserialize($value['option']);
								?>
								<?php if (count($value['option']) > 0 AND $value['option'] != ''): ?>
									<?php foreach ($value['option'] as $k => $v): ?>
									<?php
									$dataOption = explode('|', $v);
									?>
									<span class="varian"><?php echo $dataOption[1] ?> $<?php echo number_format($dataOption[2]) ?></span><br>
									<?php $totalOption = $totalOption + $dataOption[2]; ?>
									<?php endforeach ?>
								<?php endif ?>
			    			</td>
			    			*/ ?>
			    			<td>
			    				<form action="<?php echo CHtml::normalizeUrl(array('/product/edit')); ?>" method="post">
			    					<input type="hidden" value="<?php echo $value['id'] ?>" name="product_id">
			    					<?php /*
			    					<input type="hidden" value="<?php echo $value['option'] ?>" name="option">
			    					*/ ?>
				    				<span class="quantity"><?php echo $value['qty'] ?> Item(s)</span>
			    				</form>
			    			</td>
			    			<td>
			    				<b><?php echo Cart::money($subTotal = ($value['total'])) ?>.-</b>
			    			</td>
			    		</tr>
			    		<?php $total = $total + $subTotal ?>
			    		<?php endforeach ?>
			    	</tbody>
				</table>
				<?php /*
				<h4>Total: <b><?php echo Cart::money($total, 0) ?></b></h4>
				<h4>Biaya Pengiriman: <b><?php echo Cart::money($modelOrder->delivery_price, 0) ?></b></h4>
				*/ ?>
				<h4>Total Payment: <b><?php echo Cart::money($modelOrder->total+$modelOrder->delivery_price, 0) ?></b></h4>

				<div class="clear height-25"></div>
				<div class="clear"></div>
			</div>
			<!-- /. End Content About -->

			<div class="clear height-15"></div>


		<div class="clear"></div>
		</div>


        <div class="clear height-50"></div><div class="height-20"></div>
            <div class="clear"></div>
    </div>


    <div class="clear"></div>
  </div>
</div>





