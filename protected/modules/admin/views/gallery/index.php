<?php
$this->breadcrumbs=array(
	'Industries',
);

$this->pageHeader=array(
	'icon'=>'fa fa-tag',
	'title'=>'Industries',
	'subtitle'=>'Data Industries',
);

$this->menu=array(
	array('label'=>'Add Industries', 'icon'=>'plus-sign','url'=>array('create')),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<div class="row-fluid">
	<div class="span12">
		<div class="widgetbox block-rightcontent">                        
		    <div class="headtitle">
		        <h4 class="widgettitle">Data Industries</h4>
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
							<img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(200,150, '/images/gallery/'.$value->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="">
							<h3><?php echo $value->title ?></h3>
							<a href="<?php echo CHtml::normalizeUrl(array('update', 'id'=>$value->id)); ?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
							<a href="<?php echo CHtml::normalizeUrl(array('delete', 'id'=>$value->id)); ?>" class="btn btn-primary delete-product"><i class="fa fa-trash-o"></i></a>
							<a data-id="<?php echo $value->active ?>" href="<?php echo CHtml::normalizeUrl(array('setStatus', 'id'=>$value->id, 'type'=>'active')); ?>" class="btn btn-inverse btn-hide-show"><i class="fa fa-eye"></i></a>
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
		$('.btn-hide-show').setStatusAjax({
				content: '<i class="fa fa-eye-slash"></i>',
				contentOK: '<i class="fa fa-eye"></i>',
				class: 'btn-ok',
				classOK: 'btn-inverse',
			})

		$('.delete-product').deleteAjax({
		})
	})
</script>
