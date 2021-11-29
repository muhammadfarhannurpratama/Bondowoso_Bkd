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
                                <center><h1><b>Selamat Datang,  <?= $this->userdata['nama'];?></b></h1></center>
                            <br><br>  
                        </div>
                      </div>
        
                      <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                          <div class="icon"><i class="fa fa-inbox"></i>
                          </div>
                          <div class="count"><?= $surat_masuk?></div>
                          <h3><a href="<?= base_url('kepala/surat_masuk') ?>" class="text-decoration-none">Surat Masuk</a></h3>
                          <p>Telah diarsipkan</p>
                        </div>
                      </div>
                                
                      <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                          <div class="icon"><i class="fa fa-send"></i>
                          </div>
                          <div class="count"><?= $surat_keluar?></div>
                          <h3><a href="<?= base_url('kepala/surat_keluar') ?>" class="text-decoration-none">Surat Keluar</a></h3>
                          <p>Telah Diarsipkan</p>
                        </div>
                      </div>
                      <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                          <div class="icon"><i class="fa fa-group (alias)"></i>
                          </div>
                          <div class="count"><?= $bagian?></div>
                          <h3><a href="<?= base_url('kepala/bagian') ?>" class="text-decoration-none">Bagian</a></h3>
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
