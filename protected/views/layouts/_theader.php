<div class="tops_set">

	<div class="menu_ins">
		<ul class="list-inline">
			<li class="home"><a href="<?php echo CHtml::normalizeUrl(array('/home/index')); ?>"><span class="sr-only"></span></a></li>
<?php
$criteria = new CDbCriteria;
$criteria->with = array('description');
$criteria->order = 'sort ASC';
$criteria->limit = 8;
$data = PrdCategory::model()->findAll($criteria);
?>
<?php foreach ($data as $key => $value): ?>
			<li class="mnu_<?php echo $key+1 ?>"><a href="<?php echo CHtml::normalizeUrl(array('/product/index', 'category'=>$value->id)); ?>"><img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(190,135, '/images/category/'.$value->image , array('method' => 'resize', 'quality' => '90')) ?>" alt="" class="img-responsive center-block"><span><?php echo $value->description->name ?></span></a></li>
<?php endforeach ?>
		</ul>
		<div class="clear"></div>
	</div>

	<div class="clear"></div>
</div>