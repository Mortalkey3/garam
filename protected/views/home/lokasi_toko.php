<div class="subpage_product">
  <section class="default_sc blocks_bannerBox_home back-whiteimp" id="block_homesection">
    <div class="clear height-25"></div>

    <div class="in_box_product back-white">
      <div class="prelatife container">

        <div class="tops purple text-center hide hidden">
          <div class="row">
            <div class="col-md-12">
              <h3 class="sub_title">Lokasi Toko UFO Elektronika</h3>
            </div>
          </div>
        </div>
        <div class="insides padding-top-15 middles_pgStatic content-text text-center pLocationstore">
          <div class="clear height-30"></div>
          <h3>Lokasi Toko UFO Elektronika</h3>
          <div class="clear height-50"></div>
          <div class="maw610 tengah">
            <p>Pelanggan ufoelektronika.com dapat membeli produk kami dalam jumlah bebas di alamat <br>agen / distributor di bawah ini</p>
            <div class="clear"></div>
          </div>
          <div class="clear height-50"></div>
          <form action="" method="get" class="form-inline">
            <label for="">Pilih Kota</label> <div class="clear height-5"></div>
            <div class="row">
              <div class="col-md-4">
              </div>
              <div class="col-md-4">
              <select name="kota" id="select-kota" class="form-control">
                <option value="">Pilih Kota</option>
                <?php foreach ($listKota as $key => $value): ?>
                  <option value="<?php echo $value->kota ?>"><?php echo $value->kota ?></option>
                <?php endforeach ?>
              </select>
              <script type="text/javascript">
                $('#select-kota').val('<?php echo $_GET['kota'] ?>');
              </script>
              <!-- <div class="height-10"></div> -->
              <button type="submit" class="btn btn-primary">Submit</button>
              </div>
              <div class="col-md-4">
              </div>
            </div>
          </form>
        <div class="clear height-20"></div>

<?php if (count($dataAddress) > 0): ?>
        <div class="list_locaion_defaults_d">
<?php foreach ($dataAddress as $key => $value): ?>
          <div class="items">
            <div class="titles"><?php echo $key ?></div>
            <div class="clear height-20"></div>
<?php
$count_loc = count($value);
$val = array_chunk($value, 3);
?>
          <?php foreach ($val as $data_chunk): ?>
          <div class="row">
            <?php if ($count_loc == 2): ?>
            <div class="col-md-2"></div>
            <div class="col-md-8">
            <?php endif; ?>
            <?php foreach ($data_chunk as $k => $v): ?>
              <?php if ($count_loc == 1): ?>
              <div class="col-md-12 col-sm-12">
              <?php elseif($count_loc == 2): ?>
              <div class="col-md-6 col-sm-6">
              <?php else: ?>
              <div class="col-md-4 col-sm-4">
              <?php endif ?>
                <div class="item">
                  <p><b><?php echo $v->nama ?></b> <br>
                    <?php echo $v->address_1 ?><br />
                    <?php if ($v->address_2 != ''): ?>
                      <?php echo nl2br($v->address_2) ?><br />
                    <?php endif ?>
                  <?php if ($v->telp != ''): ?>
                  P. <?php echo $v->telp ?><br />
                  <?php endif ?>
                  <?php if ($v->fax != ''): ?>
                  F. <?php echo $v->fax ?> <br>
                  <?php endif ?>
                  <?php if ($v->email != ''): ?>
                  E. <?php echo $v->email ?>
                  <?php endif ?>
                  </p>
                  <div class="clear"></div>
                </div>
              </div>


            <?php endforeach ?>
              <?php if ($count_loc == 2): ?>
              </div>
              <div class="col-md-2"></div>
              <?php endif ?>
          </div>
          <?php endforeach ?>
            <div class="clear"></div>
          </div>
<?php endforeach ?>

          <div class="clear"></div>
        </div>
<?php endif ?>
        <!-- end list download item -->

          <div class="clear height-50"></div>

          <div class="clear height-25"></div>
          <div class="clear"></div>
        </div>
        <!-- end insides -->
      </div>
    </div>
    <!-- End sub kategori -->

  </section>
  <div class="clear"></div>
</div>