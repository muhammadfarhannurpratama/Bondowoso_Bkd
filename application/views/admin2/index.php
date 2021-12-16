<?php

$this->load->view('templates/header', $title);
$this->load->view('templates/navbar');
$this->load->view('templates/sidebar2');

?>
<!-- page content -->
<div class="right_col" role="main">
  <div class="row">
    <div class="col-md-12">
      <div class="">
        <div class="x_content">
          <div class="row">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <br><br>
                <center>
                  <font color="#34495E">
                    <h1><b>Selamat Datang, <?= $this->userdata['nama']; ?></b></h1>
                  </font>
                </center>
                <br><br>
              </div>
            </div>

            <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
              <div class="tile-stats" style="background-color : #1cc88a">
                <div class="icon"><i class="fa fa-inbox" style="color:white"></i>
                </div>
                <div class="count">
                  <font color="white"><?= $surat_registrasi ?>
                </div>
                <h3><a href="<?= base_url('admin2/surat_registrasi') ?>" class="text-decoration-none">
                    <font color="white">Surat Registrasi
                  </a></h3>
                <p>Telah diarsipkan</p>
                </font>
              </div>
            </div>
            <!--
            <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
              <div class="tile-stats">
                <div class="icon"><i class="fa fa-send"></i>
                </div>
                <div class="count"><?= $surat_keluar ?></div>
                <h3><a href="<?= base_url('admin/surat_keluar') ?>" class="text-decoration-none">Surat Keluar</a></h3>
                <p>Telah Diarsipkan</p>
              </div>
            </div>
            <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
              <div class="tile-stats">
                <div class="icon"><i class="fa fa-group (alias)"></i>
                </div>
                -->

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
<!-- /page content -->

<?php
$this->load->view('templates/footer');
?>