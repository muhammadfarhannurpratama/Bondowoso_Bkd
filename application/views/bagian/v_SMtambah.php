<?php

    $this->load->view('templates/header', $title);
		$this->load->view('templates/navbar');
    $this->load->view('templates/sidebar');

?>
 <!-- page content -->
 <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Surat Masuk</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Surat Masuk ><small>Tambah Surat Masuk</small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form action="<?= base_url('bagian/tambah_prosesSM')?>"  name="formsuratmasuk" method="post" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tanggal Masuk <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                        <div class='input-group date' id='myDatepicker4'>
                            <input type='text' id="tanggalmasuk_suratmasuk" name="tanggalmasuk_suratmasuk"  class="form-control"  readonly="readonly" />
                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span><br>
                            <small class="text-danger">
                                <?= form_error('tanggalmasuk_suratmasuk') ?>
                            </small>
                        </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Kode Surat <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" onkeyup="validAngka(this)" id="kode_suratmasuk" name="kode_suratmasuk"  maxlength="7" placeholder="Masukkan Kode Surat" class="form-control col-md-7 col-xs-12">
                            <small class="text-danger">
                                <?= form_error('kode_suratmasuk') ?>
                            </small>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Nomor Urut <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input value="<?= $nomorurut_suratmasuk ?>" type="text" onkeyup="validAngka(this)" id="nomorurut_suratmasuk" name="nomorurut_suratmasuk"  maxlength="4" placeholder="Masukkan Nomor Urut Surat" class="form-control col-md-7 col-xs-12">
                          <br>Nomor Urut harus 4 Digit (Pastikan Lihat Nomor Sebelumnya)</br>
                          <small class="text-danger">
                            <?= form_error('nomorurut_suratmasuk') ?>
                          </small>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Nomor Surat <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" id="nomor_suratmasuk" name="nomor_suratmasuk"  maxlength="35" placeholder="Masukkan Nomor Surat" class="form-control col-md-7 col-xs-12">
                          <small class="text-danger">
                            <?= form_error('nomor_suratmasuk') ?>
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
                                <input type="text" class="form-control has-feedback-left" id="single_cal3" name="tanggalsurat_suratmasuk" placeholder="First Name" aria-describedby="inputSuccess2Status3"  readonly="readonly">
                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                <span id="inputSuccess2Status3" class="sr-only">(success)</span>
                            </div>
                          </div>
                        </fieldset>
                        </div>
                      </div>
                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Pengirim <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" id="pengirim" name="pengirim"  placeholder="Masukkan Asal/Pengirim Surat" class="form-control col-md-7 col-xs-12">
                          <small class="text-danger">
                            <?= form_error('pengirim') ?>
                          </small>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Kepada <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" id="kepada_suratmasuk" name="kepada_suratmasuk"  placeholder="Masukkan Tujuan Surat" class="form-control col-md-7 col-xs-12">
                          <small class="text-danger">
                            <?= form_error('kepada_suratmasuk') ?>
                          </small>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Perihal <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <textarea id="perihal_suratmasuk" name="perihal_suratmasuk"  class="form-control" rows="3" placeholder='Masukkan Perihal Surat'></textarea>
                          <small class="text-danger">
                            <?= form_error('perihal_suratmasuk') ?>
                          </small>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">File <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                         <input name="file_suratmasuk" accept="application/pdf" type="file" id="file_suratmasuk" class="form-control" autocomplete="off"/> *max 10mb 
                        </div>
                        <?php if (isset($error)) : ?>
                          <div class="invalid-feedback"><?= $error ?></div>
                        <?php endif; ?>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Operator </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input value="<?= $this->userdata['nama'];?>" type="text" id="operator" name="operator"  readonly="readonly" class="form-control col-md-7 col-xs-12">
                          <small class="text-danger">
                            <?= form_error('operator') ?>
                          </small>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Disposisi  </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <select name="disposisi1" class="select2_single form-control" tabindex="-1">
                            <option></option>
                            <?php foreach($disposisi as $dis) : ?>
                            <option value="<?= $dis->nama_bagian?>"><?= $dis->nama_bagian?></option>
                            <?php endforeach; ?>
                          </select>
                          <small class="text-danger">
                            <?= form_error('disposisi1') ?>
                          </small>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tanggal Disposisi  </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                        <div class='input-group date' id='myDatepicker'>
                            <input type='text' id="tanggal_disposisi1" name="tanggal_disposisi1" class="form-control"/>
                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span><br>
                            <small class="text-danger">
                              <?= form_error('tanggal_disposisi1') ?>
                            </small>
                        </div>
                        </div>
                      </div> 
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a href="<?= base_url('bagian/surat_masuk')?>"" class="btn btn-success"><span class="glyphicon glyphicon-arrow-left"></span> Batal</a>
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
