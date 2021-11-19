<?php

$this->load->view('templates/header', $title);
$this->load->view('templates/navbar');
$this->load->view('templates/sidebar');

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
            <h2>Admin ><small>Edit Bagian</small></h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />
            <form action="<?= base_url('admin/bagian_proses_edit') ?>" method="post" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
              <input type="hidden" name="id_bagian" value="<?= $bagian->id_bagian ?>">
              <input type="hidden" name="file_lama" value="<?= $bagian->gambar ?>">
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Nama Bagian <span class="required">*</span>
                </label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input value="<?= $bagian->nama_bagian ?>" type="text" id="nama_bagian" name="nama_bagian" placeholder="Masukkan Nama Bagian" class="form-control col-md-7 col-xs-12">
                  <small class="text-danger">
                    <?= form_error('nama_bagian') ?>
                  </small>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Username Admin Bagian <span class="required">*</span>
                </label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input value="<?= $bagian->username_admin_bagian ?>" type="text" id="username_admin_bagian" name="username_admin_bagian" maxlength="50" placeholder="Masukkan Username Admin Bagian" class="form-control col-md-7 col-xs-12">
                  <small class="text-danger">
                    <?= form_error('username_admin_bagian') ?>
                  </small>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Password Bagian <span class="required">*</span>
                </label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="password" id="password_bagian" name="password_bagian" maxlength="50" placeholder="Masukkan Password Bagian" class="form-control col-md-7 col-xs-12">
                  <small class="text-danger">
                    <?= form_error('password_bagian') ?>
                  </small>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Nama Lengkap <span class="required">*</span>
                </label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input value="<?= $bagian->nama_lengkap ?>" type="text" id="nama_lengkap" name="nama_lengkap" maxlength="70" placeholder="Masukkan Nama Lengkap" class="form-control col-md-7 col-xs-12">
                  <small class="text-danger">
                    <?= form_error('nama_lengkap') ?>
                  </small>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tanggal Lahir <span class="required">*</span>
                </label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <fieldset>
                    <div class="control-group">
                      <div class="controls">
                        <input value="<?= date('m-d-Y', strtotime($bagian->tanggal_lahir_bagian)) ?>" type="text" class="form-control has-feedback-left" id="single_cal3" name="tanggal_lahir_bagian" placeholder="" aria-describedby="inputSuccess2Status3">
                        <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                        <span id="inputSuccess2Status3" class="sr-only">(success)</span>
                        <small class="text-danger">
                          <?= form_error('tanggal_lahir_bagian') ?>
                        </small>
                      </div>
                    </div>
                  </fieldset>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Alamat <span class="required">*</span>
                </label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <textarea id="alamat" name="alamat" class="form-control" rows="3" placeholder='Masukkan Alamat'><?= $bagian->alamat ?></textarea>
                  <small class="text-danger">
                    <?= form_error('alamat') ?>
                  </small>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">No HP <span class="required">*</span>
                </label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input value="<?= $bagian->no_hp_bagian ?>" type="text" onkeyup="validAngka(this)" id="no_hp_bagian" name="no_hp_bagian" maxlength="12" placeholder="Masukkan Nomor HP" class="form-control col-md-7 col-xs-12">
                  <small class="text-danger">
                    <?= form_error('no_hp_bagian') ?>
                  </small>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Foto <span class="required">*</span>
                </label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input name="gambar" accept="image/png,image/jpeg,image/jpg" type="file" id="gambar" class="form-control" autocomplete="off" /> *max 2mb
                  <?php if (isset($error)) : ?>
                    <div class="invalid-feedback"><?= $error ?></div>
                  <?php endif; ?>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Foto Sebelumnya <span class="required">*</span>
                </label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <img src="<?= base_url('assets/backend/bagian/' . $bagian->gambar) ?>" class="img-circle" height="80" width="80" style="border: 2px solid #666666;" />
                </div>
              </div>
              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <a href="<?= base_url('admin/bagian') ?>" class="btn btn-success"><span class="glyphicon glyphicon-arrow-left"></span> Batal</a>
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