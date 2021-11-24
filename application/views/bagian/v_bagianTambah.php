<?php

    $this->load->view('templates/header', $title);
	  $this->load->view('templates/navbar');
    $this->load->view('templates/sidebar');
    
?>
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>bagian</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>bagian ><small>Tambah Bagian</small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form action="<?= base_url('bagian/bagian_proses_tambah')?>"  method="post" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Nama Bagian <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" id="nama_bagian" name="nama_bagian"  placeholder="Masukkan Nama Bagian" class="form-control col-md-7 col-xs-12">
                            <small class="text-danger">
                                <?= form_error('nama_bagian') ?>
                            </small>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Username bagian Bagian <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" id="username_bagian_bagian" name="username_bagian_bagian" maxlength="50" placeholder="Masukkan Username bagian Bagian" class="form-control col-md-7 col-xs-12">
                            <small class="text-danger">
                                <?= form_error('username_bagian_bagian') ?>
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
                          <input type="text" id="nama_lengkap" name="nama_lengkap" maxlength="70" placeholder="Masukkan Nama Lengkap" class="form-control col-md-7 col-xs-12">
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
                                <input type="text" class="form-control has-feedback-left" id="single_cal3" name="tanggal_lahir_bagian" placeholder="" aria-describedby="inputSuccess2Status3">
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
                          <textarea id="alamat" name="alamat" class="form-control" rows="3" placeholder='Masukkan Alamat'></textarea>
                            <small class="text-danger">
                                <?= form_error('alamat') ?>
                            </small>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">No HP <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" onkeyup="validAngka(this)" id="no_hp_bagian" name="no_hp_bagian" maxlength="12" placeholder="Masukkan Nomor HP" class="form-control col-md-7 col-xs-12">
                            <small class="text-danger">
                                <?= form_error('no_hp_bagian') ?>
                            </small>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Foto <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                         <input name="gambar" accept="image/png,image/jpeg,image/jpg" type="file" id="gambar" class="form-control" autocomplete="off"/> *max 2mb 
                         <?php if (isset($error)) : ?>
                          <div class="invalid-feedback"><?= $error ?></div>
                        <?php endif; ?>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a href="<?= base_url('bagian/bagian')?>"" class="btn btn-success"><span class="glyphicon glyphicon-arrow-left"></span> Batal</a>
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