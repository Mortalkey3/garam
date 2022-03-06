<?php 
	$criteria = new CDbCriteria;
	$criteria->addCondition('t.id = :id');
	$criteria->params[':id'] = $_GET['category'];
	$detailCategory = MasterMobil::model()->find($criteria);
	$titles_subm = $detailCategory->title;
?>
<?php
$this->breadcrumbs=array(
	'Mobil Gallery Exterior',
);

$this->pageHeader=array(
	'icon'=>'fa fa-minus',
	'title'=>'Mobil Gallery Exterior >'. $titles_subm,
	'subtitle'=>'Data Mobil Gallery Exterior',
);

$this->menu=array(
	array('label'=>'Back List Master Mobil', 'icon'=>'th-list','url'=>array('/admin/masterMobil/index')),
	array('label'=>'Add Mobil Gallery Exterior', 'icon'=>'plus-sign','url'=>array('create', 'category'=>$_GET['category'])),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php if(Yii::app()->user->hasFlash('success')): ?>

    <?php $this->widget('bootstrap.widgets.TbAlert', array(
        'alerts'=>array('success'),
    )); ?>

<?php endif; ?>

<div class="row-fluid">
	<div class="span12">
		<div class="widgetbox block-rightcontent">                        
		    <div class="headtitle">
		        <h4 class="widgettitle">Data Gallery Exterior</h4>
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
							<img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(200,150, '/images/mobil_gallery_in/'.$value->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="">
							<div class="clear clearfix divider5"></div>
							<a href="<?php echo CHtml::normalizeUrl(array('update', 'id'=>$value->id, 'category'=>$_GET['category'])); ?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
							<a href="<?php echo CHtml::normalizeUrl(array('delete', 'id'=>$value->id, 'category'=>$_GET['category'])); ?>" class="btn btn-primary delete-product"><i class="fa fa-trash-o"></i></a>
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
