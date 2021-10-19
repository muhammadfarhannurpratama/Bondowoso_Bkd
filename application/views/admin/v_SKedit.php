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
                <h3>Surat Keluar</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Surat Keluar ><small>Edit Surat Keluar</small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form action="<?= base_url('admin/edit_prosesSK')?>"  method="post" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                      <input type="hidden" name="file_lama" value="<?= $surat_keluar->file_suratkeluar?>">
                      <input type="hidden" name="id_suratkeluar" value="<?= $surat_keluar->id_suratkeluar?>">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tanggal Masuk <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                        <div class='input-group date' id='myDatepicker4'>
                            <input value="<?= date('m-d-Y', strtotime($surat_keluar->tanggalkeluar_suratkeluar))?>" type='text' id="tanggalkeluar_suratkeluar" name="tanggalkeluar_suratkeluar"  class="form-control"  readonly="readonly" />
                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span><br>
                            <small class="text-danger">
                                <?= form_error('tanggalkeluar_suratkeluar') ?>
                            </small>
                        </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Kode Surat <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input value="<?= $surat_keluar->kode_suratkeluar?>"  type="text" onkeyup="validAngka(this)" id="kode_suratkeluar" name="kode_suratkeluar"  maxlength="7" placeholder="Masukkan Kode Surat" class="form-control col-md-7 col-xs-12">
                          <br><a href= "<?= base_url('assets/backend/file/kode_klasifikasi_surat.xlsx')?>"><b>Lihat Kode Klasifikasi Surat</b></a></br>
                            <small class="text-danger">
                                <?= form_error('kode_suratkeluar') ?>
                            </small>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Nomor Surat <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input value="<?= $surat_keluar->nomor_suratkeluar ?>" type="text" id="nomor_suratkeluar" name="nomor_suratkeluar"  maxlength="35" placeholder="Masukkan Nomor Urut Surat" class="form-control col-md-7 col-xs-12">
                          <br>Nomor Surat harus 4 Digit (Pastikan Lihat Nomor Sebelumnya)</br>
                          <small class="text-danger">
                            <?= form_error('nomor_suratkeluar') ?>
                          </small>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Bagian </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <select name="nama_bagian" class="select2_single form-control" tabindex="-1">
                          <option value="<?= $surat_keluar->nama_bagian ?>"><?= $surat_keluar->nama_bagian ?></option>
                            <?php foreach($disposisi as $dis) : ?>
                            <option value="<?= $dis->nama_bagian?>"><?= $dis->nama_bagian?></option>
                            <?php endforeach; ?>
                          </select>
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
                                <input value="<?= date('m-d-Y', strtotime($surat_keluar->tanggalsurat_suratkeluar))?>" type="text" class="form-control has-feedback-left" id="single_cal3" name="tanggalsurat_suratkeluar" placeholder="First Name" aria-describedby="inputSuccess2Status3"  readonly="readonly">
                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                <span id="inputSuccess2Status3" class="sr-only">(success)</span>
                            </div>
                          </div>
                        </fieldset>
                        <small class="text-danger">
                            <?= form_error('tanggalsurat_suratkeluar') ?>
                          </small>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Kepada <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input value="<?= $surat_keluar->kepada_suratkeluar ?>" type="text" id="kepada_suratkeluar" name="kepada_suratkeluar"  placeholder="Masukkan Tujuan Surat" class="form-control col-md-7 col-xs-12">
                          <small class="text-danger">
                            <?= form_error('kepada_suratkeluar') ?>
                          </small>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Perihal <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <textarea id="perihal_suratkeluar" name="perihal_suratkeluar"  class="form-control" rows="3" placeholder='Masukkan Perihal Surat'><?= $surat_keluar->perihal_suratkeluar?></textarea>
                          <small class="text-danger">
                            <?= form_error('perihal_suratkeluar') ?>
                          </small>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">File <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                         <input name="file_suratkeluar" accept="application/pdf" type="file" id="file_suratkeluar" class="form-control" autocomplete="off"/> *max 10mb 
                         <p>dokumen sebelumnya : <?= $surat_keluar->file_suratkeluar ?></p>
                        </div>
                        <?php if (isset($error)) : ?>
                          <div class="invalid-feedback"><?= $error ?></div>
                        <?php endif; ?>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Operator </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input value="<?= $surat_keluar->operator?>" type="text" id="operator" name="operator"  readonly="readonly" class="form-control col-md-7 col-xs-12">
                          <small class="text-danger">
                            <?= form_error('operator') ?>
                          </small>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a href="<?= base_url('admin/surat_keluar')?>"" class="btn btn-success"><span class="glyphicon glyphicon-arrow-left"></span> Batal</a>
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
