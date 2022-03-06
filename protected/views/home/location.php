<div class="clear"></div>
<div class="subpage static_about">

  <section class="default_sc middle_location_first" id="location2">
  	<div class="prelatife container">
  		<div class="insides text-left content-text text-center">
  					<h3 class="sub_title"><?php echo $this->setting['location_hero_title'] ?></h3>
            <div class="clear height-50"></div>
  					<div class="clear height-30"></div>
  					<div class="maw840 tengah">
              <div class="row default">
                <div class="col-md-4 col-sm-4">
                  <div class="items">
                    <p><strong><?php echo strtoupper($this->setting['location1_name']); ?></strong></p>
                    <p><?php echo nl2br($this->setting['location1_address']) ?></p>
                    <p><strong><a target="_blank" href="<?php echo $this->setting['location1_map'] ?>"><i class="fa fa-map-marker"></i>&nbsp; View Location</a></strong></p>
                    <?php if ($this->setting['location1_phone']): ?>
                    <p><strong>Phone.</strong><br />
                    <?php echo $this->setting['location1_phone'] ?></p>
                    <?php endif ?>
                    <?php if ($this->setting['location1_fax']): ?>
                    <p><strong>Fax.</strong><br />
                    <?php echo $this->setting['location1_fax'] ?></p>
                    <?php endif ?>
                  </div>
                </div>
                <div class="col-md-4 col-sm-4">
                  <div class="items">
                    <p><strong><?php echo strtoupper($this->setting['location2_name']); ?></strong></p>
                    <p><?php echo nl2br($this->setting['location2_address']) ?></p>
                    <p><strong><a target="_blank" href="<?php echo $this->setting['location2_map'] ?>"><i class="fa fa-map-marker"></i>&nbsp; View Location</a></strong></p>
                    <?php if ($this->setting['location2_phone']): ?>
                    <p><strong>Phone.</strong><br />
                    <?php echo $this->setting['location2_phone'] ?></p>
                    <?php endif ?>
                    <?php if ($this->setting['location2_fax']): ?>
                    <p><strong>Fax.</strong><br />
                    <?php echo $this->setting['location2_fax'] ?></p>
                    <?php endif ?>
                  </div>
                </div>
                <div class="col-md-4 col-sm-4">
                  <div class="items">
                    <p><strong><?php echo strtoupper($this->setting['location3_name']); ?></strong></p>
                    <p><?php echo nl2br($this->setting['location3_address']) ?></p>
                    <p><strong><a target="_blank" href="<?php echo $this->setting['location3_map'] ?>"><i class="fa fa-map-marker"></i>&nbsp; View Location</a></strong></p>
                    <?php if ($this->setting['location3_phone']): ?>
                    <p><strong>Phone.</strong><br />
                    <?php echo $this->setting['location3_phone'] ?></p>
                    <?php endif ?>
                    <?php if ($this->setting['location3_fax']): ?>
                    <p><strong>Fax.</strong><br />
                    <?php echo $this->setting['location3_fax'] ?></p>
                    <?php endif ?>
                  </div>
                </div>
              </div>
              <div class="clear height-35"></div>
              <div class="row default">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                  <div class="items">
                    <p><strong>Email.</strong><br /><a href="mailto:<?php echo $this->setting['contact_email'] ?>"><?php echo $this->setting['contact_email'] ?></a></p>
                  </div>
                </div>
                <div class="col-md-4"></div>
              </div>

              <div class="clear"></div>     
            </div>

  					<div class="clear"></div>
  		</div>
    		<div class="clear"></div>
  	</div>
  </section>

  <div class="clear"></div>
</div>
<!-- End subpage static -->