<section class="default_sc top_inside_pg_default">
  <div class="out_table">
    <div class="in_table">
      <div class="prelatife container">
        <h1 class="sub_titlepage"><?php echo $this->setting['agen_title'] ?></h1>
        <div class="clear"></div>
      </div>
      <div class="clear"></div>
    </div>
  </div>
</section>
<section class="default_sc insides_middleDefaultpages back-white">
  <div class="prelatife container">
    <div class="clear height-50"></div><div class="height-5"></div>
    <div class="content-text text-center">
      <div class="picture_ill"><img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(987,396, '/images/static/'.$this->setting['agen_image'] , array('method' => 'resize', 'quality' => '90')) ?>" alt="" class="img-responsive center-block"></div>
        <div class="clear height-50"></div><div class="height-10"></div>
        <div class="mw820 tengah">
            <?php echo $this->setting['agen_content'] ?>

        <div class="list_howto_buys_c">
          <div class="row default">
            
            <div class="col-md-4 col-sm-6">
              <div class="items">
                <div class="pict padding-bottom-25"><img src="<?php echo $this->assetBaseurl; ?>jadi-agen-1.png" alt="" class="img-responsive center-block"></div>
                <div class="clear"></div>
                <div class="desc">
                  <p>Mendapatkan diskon 10% dari Harga Grosir</p>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-sm-6">
              <div class="items">
                <div class="pict padding-bottom-25"><img src="<?php echo $this->assetBaseurl; ?>jadi-agen-2.png" alt="" class="img-responsive center-block"></div>
                <div class="clear"></div>
                <div class="desc">
                  <p>Mendapatkan free ongkir dan free BS pickup untuk wilayah dalam pulau Jawa, atau free ongkir dan free BS pickup di tempat expedisi Surabaya untuk wilayah luar pulau</p>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-sm-6">
              <div class="items">
                <div class="pict padding-bottom-25"><img src="<?php echo $this->assetBaseurl; ?>jadi-agen-3.png" alt="" class="img-responsive center-block"></div>
                <div class="clear"></div>
                <div class="desc">
                  <p>Mendapatkan Hard Copy Katalog Produk dan Daftar Harga</p>
                </div>
              </div>
            </div>
            <div class="clear"></div>
            <div class="height-15"></div>
            <div class="col-md-4 col-sm-6">
              <div class="items">
                <div class="pict padding-bottom-25"><img src="<?php echo $this->assetBaseurl; ?>jadi-agen-4.png" alt="" class="img-responsive center-block"></div>
                <div class="clear"></div>
                <div class="desc">
                  <p>Mendapatkan free sample Promosi di website kami</p>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-sm-6">
              <div class="items">
                <div class="pict padding-bottom-25"><img src="<?php echo $this->assetBaseurl; ?>jadi-agen-5.png" alt="" class="img-responsive center-block"></div>
                <div class="clear"></div>
                <div class="desc">
                  <p>Mendapatkan informasi Produk Baru dan Promosi</p>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-sm-6">
              <div class="items">
                <div class="pict padding-bottom-25"><img src="<?php echo $this->assetBaseurl; ?>jadi-agen-6.png" alt="" class="img-responsive center-block"></div>
                <div class="clear"></div>
                <div class="desc">
                  <p>Mendapatkan item-item promosi seperti kaos, calendar, sticker, dll</p>
                </div>
              </div>
            </div>

          </div>
        </div>            
          <div class="clear"></div>
        <p><b>Sebelum Anda bergabung dengan jaringan sukses keagenan kami, <br> pastikan anda telah memenuhi beberapa syarat di bawah ini.</b></p>
        <div class="list_howto_buys_c">
          <div class="row default">
            
            <div class="col-md-3 col-sm-6">
              <div class="items">
                <div class="pict padding-bottom-25"><img src="<?php echo $this->assetBaseurl; ?>jadi-agen-7.png" alt="" class="img-responsive center-block"></div>
                <div class="clear"></div>
                <div class="desc">
                  <p>Memiliki toko / gudang distribusi perabot plastik</p>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6">
              <div class="items">
                <div class="pict padding-bottom-25"><img src="<?php echo $this->assetBaseurl; ?>jadi-agen-8.png" alt="" class="img-responsive center-block"></div>
                <div class="clear"></div>
                <div class="desc">
                  <p>Tidak memiliki riwayat gagal bayar dengan perusahaan mana pun</p>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6">
              <div class="items">
                <div class="pict padding-bottom-25"><img src="<?php echo $this->assetBaseurl; ?>jadi-agen-9.png" alt="" class="img-responsive center-block"></div>
                <div class="clear"></div>
                <div class="desc">
                  <p>Berkomitmen untuk melakukan pembelian rutin</p>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6">
              <div class="items">
                <div class="pict padding-bottom-25"><img src="<?php echo $this->assetBaseurl; ?>jadi-agen-10.png" alt="" class="img-responsive center-block"></div>
                <div class="clear"></div>
                <div class="desc">
                  <p>Menyetujui pemasangan atribut dan identitas Jadi Jaya Plasindo di toko anda</p>
                </div>
              </div>
            </div>

          </div>
        </div>

        <p><b>Jika anda telah memenuhi syarat di atas, silahkan mengisi form berikut dan tunggu konfirmasi oleh staf kami melalui telepon atau email.</b></p>            



        </div>
        <div class="clear height-20"></div>
        <div class="lines-grey"></div>
        <div class="clear height-50"></div>

        <?php echo $this->renderPartial('//home/_form_contact', array( 'model'=>$model )); ?>
        <!-- end box form inquiry -->
        <div class="clear height-40"></div>

        <div class="clear height-30"></div>
      <div class="clear"></div>
    </div>

    <div class="clear"></div>
  </div>
</section>