<div class="blocks_subpage_banner product mah152">
  <div class="container prelatife">
    <div class="clear h70"></div>
    <h3 class="sub_title_p">BUY COFFEE</h3>
    <div class="clear"></div>
    <div class="lines_browns_md tengah"></div>
    <div class="clear height-20"></div>

    <div class="clear"></div>
  </div>
</div>

<div class="clear"></div>
<div class="subpage product">

  <div class="block_product_category">
    <div class="container text-center prelatife">
      <div class="clear height-20"></div><div class="height-3"></div>
      <ul class="list-inline">
        <?php foreach ($categories as $key => $value): ?>
        <li <?php if ($_GET['category'] == $value->id): ?>class="active"<?php endif ?>><a href="<?php echo CHtml::normalizeUrl(array('/product/list', 'category'=>$value->id)); ?>"><?php echo $value->description->name ?></a></li>
        <?php endforeach ?>
      </ul>
      <div class="clear"></div>
    </div>
  </div>

  <div class="prelatife container">

    <div class="clear height-35"></div><div class="height-2"></div>
    <div class="filter_product">
      <div class="row">
        <div class="col-md-6 txt">
          Showing <?php echo $product->getTotalItemCount() ?> products
        </div>
        <div class="col-md-6 txt">
          <form action="<?php echo CHtml::normalizeUrl(array('/product/list')); ?>" class="form-inline" id="form-sort">
            <div class="form-group">
              <label for="">SORT BY</label>
              <?php foreach ($_GET as $key => $value): ?>
              <?php if ($key != 'order'): ?>
              <input type="hidden" name="<?php echo $key ?>" value="<?php echo $value ?>">
              <?php endif ?>
              <?php endforeach ?>
              <select name="order" id="change-sort" class="form-control">
                <option value="new-old">LATEST PRODUCTS</option>
                <option value="low-hight">PRICE LOW TO HIGH</option>
                <option value="hight-low">PRICE HIGH TO LOW</option>
              </select>
            </div>
          </form>
          <script type="text/javascript">
          $('#change-sort').change(function() {
            $('#form-sort').submit();
          })

          <?php if ($_GET['order']): ?>
          $('#change-sort').val('<?php echo $_GET['order'] ?>');
          <?php endif ?>
          </script>
        </div>
      </div>
    </div>
    <div class="clear height-30"></div>

    <div class="blocks_outers_products_data">

<?php if ($product->getTotalItemCount() > 0): ?>
      <div class="lists_product_data">
        <div class="row">
          <?php foreach ($product->getData() as $key => $value): ?>
          <div class="col-md-3 col-sm-6">
            <div class="items">
              <div class="picts"><a href="<?php echo CHtml::normalizeUrl(array('/product/detail', 'id'=>$value->id)); ?>"><img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(300,300, '/images/product/'.$value->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="" class="img-responsive"></a></div>
              <div class="descs padding-top-15">
                <h4><a href="<?php echo CHtml::normalizeUrl(array('/product/detail', 'id'=>$value->id)); ?>"><?php echo $value->description->name ?></a></h4>
                <div class="clear"></div>
                <span class="colors <?php echo ($value->brand_id == 1)? 'green':'' ?>"><?php if ($value->brand_id == 1): ?>SINGLE ORIGIN<?php else: ?>BLEND<?php endif ?></span>
                <div class="clear"></div>
                <span class="desc_1"><?php echo $value->description->subtitle ?></span>
                <div class="clear"></div>
              </div>
            </div>
          </div>
          <?php endforeach ?>
        </div>
        <div class="clear"></div>
      </div>
<?php endif ?>
      <div class="clear height-0"></div>

      <div class="text-center t_pagination">
        <?php $this->widget('CLinkPager', array(
          'pages' => $product->getPagination(),
          'header'=>'',
          'selectedPageCssClass'=>'active',
          'htmlOptions'=>array('class'=>'pagination'),
        )) ?>
        <div class="clear"></div>
      </div>

      <div class="clear height-40"></div>
      <div class="clear height-15"></div>

      <div class="clear"></div>
    </div>

    <div class="clear"></div>
  </div>
</div>