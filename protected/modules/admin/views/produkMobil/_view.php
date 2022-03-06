<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('image1')); ?>:</b>
	<?php echo CHtml::encode($data->image1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('image2')); ?>:</b>
	<?php echo CHtml::encode($data->image2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('image3')); ?>:</b>
	<?php echo CHtml::encode($data->image3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sort')); ?>:</b>
	<?php echo CHtml::encode($data->sort); ?>
	<br />


</div>