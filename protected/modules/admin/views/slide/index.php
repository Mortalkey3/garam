<?php
$this->breadcrumbs=array(
	'Slide',
);

$this->pageHeader=array(
	'icon'=>'fa fa-image',
	'title'=>'Slide',
	'subtitle'=>'Data Slide',
);

$this->menu=array(
	array('label'=>'Add Slide', 'icon'=>'plus-sign','url'=>array('create', 'type'=>$type)),
);
if ($type != 0) {
	array_push($this->menu, 
		array('label'=>'Back', 'icon'=>'plus-sign','url'=>array('/admin/category/update', 'type'=>$type))
	);
}
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<div class="row-fluid">
	<div class="span12">
		<div class="widgetbox block-rightcontent">                        
		    <div class="headtitle">
		        <h4 class="widgettitle">Data Slide</h4>
		    </div>
		    <div class="widgetcontent">
				<ul class="thumbnails">
				<?php
				$search = $model->search($this->languageID);
				$data = $search->getData();
				?>
				<?php foreach ($data as $key => $value): ?>
					<li class="span2">
						<div class="thumbnail">
							<img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(200,150, '/images/'.$value->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="">
							<h3><?php echo $value->title ?></h3>
							<a href="<?php echo CHtml::normalizeUrl(array('update', 'id'=>$value->id)); ?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
							<a href="<?php echo CHtml::normalizeUrl(array('delete', 'id'=>$value->id)); ?>" class="btn btn-primary delete-product"><i class="fa fa-trash-o"></i></a>
							<?php // echo SortOrder::sortButton($value,$this->id,"Slide") ?>
						</div>
					</li>
				<?php endforeach ?>
				</ul>
		    </div><!--widgetcontent-->
		</div>
	</div>
</div>
<script type="text/javascript">
	jQuery(function ( $ ) {
		$('.delete-product').deleteAjax({
		})
	})
</script>
