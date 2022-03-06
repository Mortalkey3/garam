<?php
$this->breadcrumbs=array(
	'Product'=>array('index'),
	// $model->id=>array('view','id'=>$model->id),
	'Review',
);
$this->pageHeader=array(
	'icon'=>'fa fa-life-ring',
	'title'=>'Product',
	'subtitle'=>'Review Product',
);

$this->menu=array(
	array('label'=>'List Product', 'icon'=>'th-list','url'=>array('index')),
	array('label'=>'Add Product', 'icon'=>'plus-sign','url'=>array('create')),
	array('label'=>'Review Product', 'icon'=>'star','url'=>array('review')),
	// array('label'=>'View Product', 'icon'=>'pencil','url'=>array('view','id'=>$model->id)),
);
?>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<style type="text/css">
i.fa.fa-star{
  color: #d2d2d2;
}
i.fa.fa-star.selected{
  color: #edb867;
}
</style>
<div class="row-fluid">
	<div class="span8">
		<div class="widgetbox block-rightcontent">                        
		    <div class="headtitle">
		        <h4 class="widgettitle">Review Product</h4>
		    </div>
		    <div class="widgetcontent">
	            <?php foreach ($review->getData() as $key => $value): ?>
	            <div class="row-fluid">
	            	<div class="span11">
			            <h4><?php echo $value->name ?>
			              &nbsp;&nbsp;&nbsp;
			              <i class="fa fa-star <?php if ($value->rating >= 1): ?>selected<?php endif ?>"></i>
			              <i class="fa fa-star <?php if ($value->rating >= 2): ?>selected<?php endif ?>"></i>
			              <i class="fa fa-star <?php if ($value->rating >= 3): ?>selected<?php endif ?>"></i>
			              <i class="fa fa-star <?php if ($value->rating >= 4): ?>selected<?php endif ?>"></i>
			              <i class="fa fa-star <?php if ($value->rating >= 5): ?>selected<?php endif ?>"></i>
			            </h4>
			            <p><?php echo $value->comment ?></p>
	            	</div>
	            	<div class="span1">
	            		<a data-id="<?php echo $value->status ?>" href="<?php echo CHtml::normalizeUrl(array('setReview', 'id'=>$value->id, 'type'=>'status')); ?>" class="btn btn-inverse btn-hide-show"><i class="fa fa-eye"></i></a>
	            	</div>
	            </div>
	            <hr>
	            <?php endforeach ?>
	            <div class="divider10"></div>
				<?php $this->widget('CLinkPager', array(
				    'pages' => $review->getPagination(),
				)) ?>
	            <script type="text/javascript">
            		jQuery(function ( $ ) {
						$('.btn-hide-show').setStatusAjax({
							content: '<i class="fa fa-eye-slash"></i>',
							contentOK: '<i class="fa fa-eye"></i>',
							class: 'btn-ok',
							classOK: 'btn-inverse',
						})
					})
				</script>
			</div>
	    </div>
    </div>
</div>
