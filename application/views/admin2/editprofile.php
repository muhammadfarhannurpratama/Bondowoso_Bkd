<?php

$this->load->view('templates/header', $title);
$this->load->view('templates/navbar');
$this->load->view('templates/sidebar2');

?>
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Admin</h3>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Admin ><small>Edit Profile</small></h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />
            <form action="<?= base_url('admin2/proses_editprofile') ?>" method="post" enctype="multipart/form-data" name="updateadmin" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
              <input type="hidden" name="id_admin2" value="<?= $profil->id_admin2; ?>">
              <input type="hidden" name="file_lama" value="<?= $profil->gambar; ?>">
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Nama Lengkap <span class="required">*</span>
                </label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input value="<?= $profil->nama_admin2; ?>" type="text" id="nama_admin2" name="nama_admin2" required="required" maxlength="70" placeholder="Masukkan Nama Lengkap" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Username Admin <span class="required">*</span>
                </label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input value="<?= $profil->username_admin2; ?>" type="text" id="username_admin2" name="username_admin2" required="required" maxlength="50" placeholder="Masukkan Username Admin" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Password <span class="required">*</span>
                </label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="password" id="password" name="password" required="required" maxlength="50" placeholder="Masukkan Password" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Foto <span class="required">*</span>
                </label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input name="gambar" accept="image/png,image/jpeg,image/jpg,image" type="file" id="gambar" class="form-control" autocomplete="off" /> *max 2mb
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Foto Sebelumnya <span class="required">*</span>
                </label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <img src="<?= base_url('assets/backend/') ?>images/<?= $this->userdata['jenis']; ?>/<?= $profil->gambar; ?>" class="img-circle" height="80" width="80" style="border: 2px solid #666666;" />
                </div>
              </div>
              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <a href="<?= base_url('admin2/profil') ?>" class="btn btn-success"><span class="glyphicon glyphicon-arrow-left"></span> Batal</a>
                  <button type="submit" name="input" value="Simpan" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Simpan</button>
                </div>
              </div>

            </form>
          </div>
        </div>


      </div>
    </div>
  </div>
</div>
<?php
$this->load->view('templates/footer');
?>