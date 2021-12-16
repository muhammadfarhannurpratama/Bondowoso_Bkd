<?php

$this->load->view('templates/header', $title);
$this->load->view('templates/navbar');
$this->load->view('templates/sidebar_kepala');

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
                  <h1><b>Selamat Datang, <?= $this->userdata['nama']; ?></b></h1>
                </center>
                <br><br>
              </div>
            </div>
            <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12 ">
              <div class="tile-stats " style="background-color : #1cc88a">
                <div class="icon"><i class="fa fa-inbox" style="color:white"></i>
                </div>
                <div class="count">
                  <font color="white"><?= $surat_masuk ?>
                </div>
                <h3><a href="<?= base_url('kepala/surat_masuk') ?>" class="text-decoration-none">
                    <font color="white"> Surat Masuk
                  </a></h3>
                <p>Telah diarsipkan</p>
                </font>
              </div>
            </div>

            <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
              <div class="tile-stats" style="background-color : #36b9cc">
                <div class="icon"><i class="fa fa-send" style="color:white"></i>
                </div>
                <div class="count"><?= $surat_keluar ?></div>
                <h3><a href="<?= base_url('kepala/surat_keluar') ?>" class="text-decoration-none">
                    <font color="white">Surat Keluar
                  </a></h3>
                <p>Telah Diarsipkan</p>
                </font>
              </div>
            </div>
            <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
              <div class="tile-stats" style="background-color : #f6c23e">
                <div class="icon"><i class="fa fa-inbox" style="color:white"></i>
                </div>
                <div class="count"><?= $surat_masuk ?></div>
                <h3><a href="<?= base_url('kepala/surat_registrasi') ?>" class="text-decoration-none">
                    <font color="white">Surat Registrasi
                  </a></h3>
                </p>
                <p>Telah Diarsipkan</p>
                </font>
              </div>
            </div>
            <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
              <div class="tile-stats" style="background-color : #e74a3b">
                <div class="icon"><i class="fa fa-group (alias)" style="color:white"></i>
                </div>
                <div class="count"><?= $bagian ?></div>
                <h3><a href="<?= base_url('kepala/bagian') ?>" class="text-decoration-none">
                    <font color="white">Bagian
                  </a></h3>
                <p>Telah Didaftarkan</p>
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