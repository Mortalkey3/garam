<?php
$this->breadcrumbs=array(
	'Order'=>array('index'),
);
$this->pageHeader=array(
	'icon'=>'fa fa-fax',
	'title'=>'Order',
	'subtitle'=>'Order Number '.$model->invoice_prefix.'-'.$model->invoice_no.' ('.OrOrderStatus::model()->findByPk($model->order_status_id)->name.')',
);
?>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php if(Yii::app()->user->hasFlash('success')): ?>

    <?php $this->widget('bootstrap.widgets.TbAlert', array(
        'alerts'=>array('success'),
    )); ?>

<?php endif; ?>
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'cs-customer-form',
    // 'type'=>'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>false,
	),
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>
<?php echo $form->errorSummary($model); ?>
<h2 class="text-right"><?php echo date( "d F Y", strtotime($model->date_add)); ?></h2>
<div class="clear"></div>
<div class="row-fluid">
	<div class="span8">
		<div class="widget">
		<h4 class="widgettitle">Customer details & Contact</h4>
		<div class="widgetcontent">
			<div class="row-fluid">
				<div class="span6">
					<dl class="dl-horizontal">
	
                        <dt><?php echo CHtml::encode($model->getAttributeLabel('email')); ?>:</dt>
                        <dd><?php echo CHtml::encode($model->email); ?></dd>
                        <dt><?php echo CHtml::encode($model->getAttributeLabel('phone')); ?>:</dt>
                        <dd><?php echo CHtml::encode($model->phone); ?></dd>
                    </dl>
				</div>
				<div class="span6">
						<dl class="dl-horizontal">
	                        <dt><?php echo CHtml::encode($model->getAttributeLabel('shipping_first_name')); ?>:</dt>
	                        <dd><?php echo CHtml::encode($model->shipping_first_name); ?></dd>
	                        <dt><?php echo CHtml::encode($model->getAttributeLabel('shipping_last_name')); ?>:</dt>
	                        <dd><?php echo CHtml::encode($model->shipping_last_name); ?></dd>
	                        <dt><?php echo CHtml::encode($model->getAttributeLabel('shipping_address_1')); ?>:</dt>
	                        <dd><?php echo CHtml::encode($model->shipping_address_1); ?></dd>
	                        <dt><?php echo CHtml::encode($model->getAttributeLabel('shipping_city')); ?>:</dt>
	                        <dd><?php echo CHtml::encode($model->shipping_city); ?></dd>
	                        <dt><?php echo CHtml::encode($model->getAttributeLabel('shipping_postcode')); ?>:</dt>
	                        <dd><?php echo CHtml::encode($model->shipping_postcode); ?></dd>
	                        <dt><?php echo CHtml::encode($model->getAttributeLabel('shipping_zone')); ?>:</dt>
	                        <dd><?php echo City::model()->find('province_id = :province_id GROUP BY province_id', array(':province_id'=>$model->shipping_zone))->province ?></dd>
	                    </dl>
				</div>
			</div>


			</div>
		</div>
		<div class="clear divider15"></div>
		<div class="widgetbox block-rightcontent">                        
		    <div class="headtitle">
		        <h4 class="widgettitle">Total</h4>
		    </div>
		    <div class="widgetcontent">
				<div class="row-fluid">
					<div class="span6">
						<dl class="dl-horizontal">
							<?php /*
						    <dt><?php echo CHtml::encode($model->getAttributeLabel('tax')); ?>:</dt>
						    <dd><?php echo CHtml::encode(Cart::money($model->tax)); ?></dd>
						    <dt><?php echo CHtml::encode($model->getAttributeLabel('delivery_price')); ?>:</dt>
						    <dd><?php echo CHtml::encode(Cart::money($model->delivery_price)); ?></dd>
						    */ ?>
						    <dt><?php echo CHtml::encode($model->getAttributeLabel('total')); ?>:</dt>
						    <dd><h3><?php echo CHtml::encode(Cart::money($model->total + $model->delivery_price)); ?></h3></dd>
	                    </dl>
					</div>
					<div class="span6">
						<dl class="dl-horizontal">
						    <dt><?php echo CHtml::encode($model->getAttributeLabel('delivery_weight')); ?>:</dt>
						    <dd><?php echo CHtml::encode($model->delivery_weight); ?> gram</dd>
	                    </dl>
					</div>
				</div>
			</div>
	    </div>
	    <div class="clear divider15"></div>
		<div class="widgetbox block-rightcontent">                        
		    <div class="headtitle">
		        <h4 class="widgettitle">Data Products</h4>
		    </div>
		    <div class="widgetcontent">
				<?php foreach ($data as $key => $value): ?>
	    		<?php
	    		$dataSerialize = unserialize($value->data);
	    		?>
				<div class="row-fluid">
					<div class="span3" style="text-align: center;">
						<img style="width: 100%; max-width: 200px;" src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(200,200, '/images/product/'.$value->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>"/>
					</div>
					<div class="span9">
						<h3 class="title-product">
							<?php echo ucwords($value->name) ?>
	    					<?php if ($dataSerialize['garansi'][1] != ''): ?>
	    					<br>Garansi: <?php echo $dataSerialize['garansi'][1] ?>
	    					<?php endif ?>
						</h3>
						<div class="row-fluid">
							<div class="span12">
				                <table class="table table-bordered responsive table-slim">
				                	<?php /*
				                    */ ?>
				                	<thead>
				                        <tr>
				                            <th>Item Code</th>
				                            <th>Option</th>
				                            <th>Weight</th>
				                        </tr>
				                	</thead>
				                    <tbody>
				                        <tr>
				                            <td><?php echo $value->kode ?></td>
				                            <td><?php echo $value->attributes_name ?></td>
				                            <td><?php echo $value->berat ?></td>
				                        </tr>
				                    </tbody>
				                	<thead>
				                        <tr>
				                            <th>Qty</th>
				                            <th>Price</th>
				                            <th>Sub Total</th>
				                        </tr>
				                	</thead>
				                    <tbody>
				                        <tr>
				                            <td><?php echo $value->qty ?></td>
				                            <td>
				                            	<?php echo Cart::money($value->price) ?>
						    					<?php if ($dataSerialize['box'] != ''): ?>
						    					+ <?php echo Cart::money($dataSerialize['box']) ?>
						    					<?php endif ?>
				                            </td>
				                            <td><?php echo Cart::money($value->total) ?></td>
				                        </tr>
				                    </tbody>
				                </table>
							</div>
						</div>
					</div>
				</div>
				<hr>
				<?php endforeach ?>
		    </div><!--widgetcontent-->
		</div>
	</div>
	<div class="span4">
		<div class="widgetbox block-rightcontent">                        
		    <div class="headtitle">
		        <h4 class="widgettitle">Action</h4>
		    </div>
		    <div class="widgetcontent">
				<?php $this->widget('bootstrap.widgets.TbButton', array(
					'buttonType'=>'submit',
					'type'=>'primary',
					'label'=>$model->isNewRecord ? 'Simpan dan Tambahkan' : 'Update Status Order',
					'htmlOptions'=>array('class'=>'btn-large'),
				)); ?>
		    	<?php /*
				*/ ?>
				<?php $this->widget('bootstrap.widgets.TbButton', array(
					// 'buttonType'=>'submit',
					// 'type'=>'info',
					'url'=>CHtml::normalizeUrl(array('index')),
					'label'=>'Back',
					'htmlOptions'=>array('class'=>'btn-large'),
				)); ?>
		    </div>
		</div>
		<div class="divider15"></div>
		<div class="widget">
			<h4 class="widgettitle">Change Status</h4>
			<div class="widgetcontent">
	        	<?php echo $form->dropDownListRow($model, 'order_status_id', array(
	        		''=>'Pilih Status',
	        		'1'=>'Pending',
	        		'2'=>'Processing',
	        		'3'=>'Shipped',
	        		'5'=>'Complete',
	        		'7'=>'Canceled',
	        		'14'=>'Expired',
	        		'11'=>'Refunded',
	        	), array('class'=>'span12')); ?>

				<?php echo $form->textAreaRow($model,'comment',array('class'=>'input-block-level',
				'hint'=>'Note: Type your comment')); ?>
		<?php /*
				<?php echo $form->textFieldRow($model,'tracking_id',array('class'=>'input-block-level',
				'hint'=>'Note: Masukkan No Resi')); ?>
		*/ ?>
			</div>
		</div>
	</div>
</div>
<?php $this->endWidget(); ?>
<script type="text/javascript">
jQuery('#OrOrder_order_status_id').on('change', function() {
	// jQuery('#traking-id').hide();
	switch(jQuery(this).val()) {
    case "1":
		jQuery('#OrOrder_comment').html('pending transaction');
        break;
    case "2":
		jQuery('#OrOrder_comment').html('Your order is being processed');
        break;
    case "3":
		jQuery('#OrOrder_comment').html('Your order is being sent');
		// jQuery('#traking-id').show();
        break;
    case "5":
		jQuery('#OrOrder_comment').html('the transaction has been completed');
        break;
    case "7":
		jQuery('#OrOrder_comment').html('transaction is canceled');
        break;
    case "14":
		jQuery('#OrOrder_comment').html('transaction expired');
        break;
    case "11":
		jQuery('#OrOrder_comment').html('Goods in return');
        break;
    default:
		jQuery('#OrOrder_comment').html('');
	} 
})
</script>