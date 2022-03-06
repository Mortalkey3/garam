<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>

<?php echo $this->renderPartial('//layouts/_header', array()); ?>

<div class="prelatife container">
    <div class="outers_cont_box1_top mins_heightHeader">
        <div class="insides">
            <?php echo $this->renderPartial('//layouts/_theader', array('')); ?>
            <div class="clear"></div>   
        </div>
    </div>
</div>

<?php echo $content ?>

<?php echo $this->renderPartial('//layouts/_footer', array()); ?>
<?php $this->endContent(); ?>