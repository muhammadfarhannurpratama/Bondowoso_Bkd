<?php

    $this->load->view('templates/header', $title);
	$this->load->view('templates/navbar');
    $this->load->view('templates/sidebar_kepala');

?>
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Bagian</h3>
              </div>
            </div>
            
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Bagian ><small>Detail Bagian</small></h2>
                    <div class="clearfix"></div>
                  </div>
                  
                  <div class="x_content">
                    <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                      <div class="profile_img">
                        <div id="crop-avatar">
                          <!-- Current avatar -->
                          <img class="img-responsive avatar-view" src="<?= base_url('assets/backend/bagian/'.$detail_bagian->gambar) ?>" alt="Avatar">
                        </div>
                      </div>
                      <h3 align="center"><?= $detail_bagian->nama_bagian?></h3>
                      <br />
                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <div class="profile_title">
                        <div class="col-md-6">
                          <h2>Detail Bagian </h2>
                        </div>
                      </div>
                      <div class="x_content">
                    </div>
                    <table class="table table-striped">
                      <tbody>
                        <tr>
                          <td>Nama Bagian</td>
                          <td><?= $detail_bagian->nama_bagian?></td>
                        </tr>
                        <tr>
                          <td>Username Admin Kepala</td>
                          <td><?= $detail_bagian->username_admin_kepala?></td>
                        </tr>
                        <tr>
                          <td>Nama Lengkap</td>
                          <td><?= $detail_bagian->nama_lengkap?></td>
                        </tr>
                        <tr>
                          <td>Tanggal Lahir</td>
                          <td><?= $detail_bagian->tanggal_lahir_bagian?></td>
                        </tr>
                        <tr>
                          <td>Alamat</td>
                          <td><?= $detail_bagian->alamat?></td>
                        </tr>
                           <tr>
                          <td>No HP</td>
                          <td><?= $detail_bagian->no_hp_bagian?></td>
                        </tr>
                      </tbody>
                    </table> 
                    <div class="text-right">
                   <a href="<?= base_url('kepala/bagian')?>" class="btn btn-success"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a></div>
                  </div>
                     
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

<?php
  $this->load->view('templates/footer');
?>