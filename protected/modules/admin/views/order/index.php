<?php
$session = new CHttpSession;
$session->open();


$this->breadcrumbs=array(
	'Order',
);
$this->pageHeader=array(
	'icon'=>'fa fa-fax',
	'title'=>'Order',
	'subtitle'=>'Data Order',
);

?>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php if(Yii::app()->user->hasFlash('success')): ?>

    <?php $this->widget('bootstrap.widgets.TbAlert', array(
        'alerts'=>array('success'),
    )); ?>

<?php endif; ?>
<h1>Users</h1>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'or-order-grid',
	'dataProvider'=>$model->search(),
	// 'filter'=>$model,
	'enableSorting'=>false,
	'summaryText'=>false,
	'type'=>'bordered',
	// 'htmlOptions'=>array('class'=>''),
	'rowCssClassExpression'=>'($data->is_read == 0) ? "row-bold" : ""',
	'columns'=>array(
		array(
			'header'=>'Invoice',
			'type'=>'raw',
			'value'=>'CHtml::link($data->invoice_prefix."-".$data->invoice_no, array("/admin/order/detail", "id"=>$data->id))',
		),
		'email',
		'shipping_first_name',
		array(
			'header'=>'Order Status',
			'type'=>'raw',
			'value'=>'OrOrderStatus::model()->findByPk($data->order_status_id)->name',
		),
		array(
			'header'=>'TOTAL',
			'type'=>'raw',
			'value'=>'Cart::money($data->total)',
		),
		// 'login_terakhir',
		// 'tanggal_input',
		// array(
		// 	'name'=>'aktif',
		// 	'filter'=>array(
		// 		'0'=>'No',
		// 		'1'=>'Yes',
		// 	),
		// 	'value'=>'($data->aktif=="1")? "Yes" : "No" ',
		// ),

		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>($session['login']['group_id'] == 0) ? '{delete} &nbsp; {detail}' : '{detail}',
			'header'=>'Action',
			'buttons'=>array(
				'detail' => array(
				    'label'=>'View',     // text label of the button
				    'url'=>'CHtml::normalizeUrl(array("/admin/order/detail", "id"=>$data->id))',       // a PHP expression for generating the URL of the button
				    'options'=>array('class'=>'btn'),
				),
			)
		),
	),
)); ?>
<style type="text/css">
tr.row-bold{
	font-weight: bold;
}
</style>