<?php

$this->load->view('templates/header', $title);
$this->load->view('templates/navbar');
$this->load->view('templates/sidebar2');

?>
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Surat registrasi</h3>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Surat registrasi ><small>Tambah Surat registrasi</small></h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />
            <form action="<?= base_url('admin2/tambah_prosesSR') ?>" name="formsuratregistrasi" method="post" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tanggal registrasi <span class="required">*</span>
                </label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <div class='input-group date' id='myDatepicker4'>
                    <input type='text' id="tanggalmasuk_suratregistrasi" name="tanggalmasuk_suratregistrasi" class="form-control" readonly="readonly" />
                    <span class="input-group-addon">
                      <span class="glyphicon glyphicon-calendar"></span>
                    </span><br>
                    <small class="text-danger">
                      <?= form_error('tanggalmasuk_suratregistrasi') ?>
                    </small>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Kode Surat <span class="required">*</span>
                </label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" onkeyup="validAngka(this)" id="kode_suratregistrasi" name="kode_suratregistrasi" maxlength="7" placeholder="Masukkan Kode Surat" class="form-control col-md-7 col-xs-12">
                  <small class="text-danger">
                    <?= form_error('kode_suratregistrasi') ?>
                  </small>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Nomor Surat <span class="required">*</span>
                </label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" id="nomor_suratregistrasi" name="nomor_suratregistrasi" maxlength="35" placeholder="Masukkan Nomor Surat" class="form-control col-md-7 col-xs-12">
                  <small class="text-danger">
                    <?= form_error('nomor_suratregistrasi') ?>
                  </small>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Bagian <span class="required">*</span>
                </label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" id="nama_bagian" name="nama_bagian" placeholder="Masukkan Tujuan Surat" class="form-control col-md-7 col-xs-12">
                  <small class="text-danger">
                    <?= form_error('nama_bagian') ?>
                  </small>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tanggal Surat <span class="required">*</span>
                </label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <fieldset>
                    <div class="control-group">
                      <div class="controls">
                        <input type="text" class="form-control has-feedback-left" id="single_cal3" name="tanggalsurat_suratregistrasi" placeholder="First Name" aria-describedby="inputSuccess2Status3" readonly="readonly">
                        <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                        <span id="inputSuccess2Status3" class="sr-only">(success)</span>
                      </div>
                    </div>
                  </fieldset>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Kepada <span class="required">*</span>
                </label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" id="kepada_suratregistrasi" name="kepada_suratregistrasi" placeholder="Masukkan Tujuan Surat" class="form-control col-md-7 col-xs-12">
                  <small class="text-danger">
                    <?= form_error('kepada_suratregistrasi') ?>
                  </small>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Perihal <span class="required">*</span>
                </label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <textarea id="perihal_suratregistrasi" name="perihal_suratregistrasi" class="form-control" rows="3" placeholder='Masukkan Perihal Surat'></textarea>
                  <small class="text-danger">
                    <?= form_error('perihal_suratregistrasi') ?>
                  </small>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">File <span class="required">*</span>
                </label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input name="file_suratregistrasi" accept="application/pdf" type="file" id="file_suratregistrasi" class="form-control" autocomplete="off" /> *max 10mb
                </div>
                <?php if (isset($error)) : ?>
                  <div class="invalid-feedback"><?= $error ?></div>
                <?php endif; ?>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Operator </label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input value="<?= $this->userdata['nama']; ?>" type="text" id="operatorregistrasi" name="operatorregistrasi" readonly="readonly" class="form-control col-md-7 col-xs-12">
                  <small class="text-danger">
                    <?= form_error('operatorregistrasi') ?>
                  </small>
                </div>
              </div>
              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <a href="<?= base_url('admin2/surat_registrasi')?>"" class="btn btn-success"><span class="glyphicon glyphicon-arrow-left"></span> Batal</a>
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
<!-- /page content -->


<?php
$this->load->view('templates/footer');
?>