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
                    <h2>Surat Masuk ><small>Edit Surat Masuk</small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form action="<?= base_url('bagian/edit_prosesSM')?>"  name="formsuratmasuk" method="post" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                    <input type="hidden" name="id_suratmasuk" value="<?= $surat_masuk->id_suratmasuk ?>">
                    <input type="hidden" name="file_lama" value="<?= $surat_masuk->file_suratmasuk ?>">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tanggal Masuk <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                        <div class='input-group date' id='myDatepicker4'>
                            <input value="<?= date('m-d-Y H:i:s', strtotime($surat_masuk->tanggalmasuk_suratmasuk)) ?>" type='text' id="tanggalmasuk_suratmasuk" name="tanggalmasuk_suratmasuk" class="form-control" readonly="readonly"/>
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
                          <input value="<?= $surat_masuk->kode_suratmasuk ?>" type="text" onkeyup="validAngka(this)" id="kode_suratmasuk" name="kode_suratmasuk" required="required" maxlength="7" placeholder="Masukkan Kode Surat" class="form-control col-md-7 col-xs-12">
                        </div>
                        <small class="text-danger">
                                <?= form_error('kode_suratmasuk') ?>
                        </small>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Nomor Urut <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input value="<?= $surat_masuk->nomorurut_suratmasuk ?>" type="text" onkeyup="validAngka(this)" id="nomorurut_suratmasuk" name="nomorurut_suratmasuk" required="required" maxlength="4" placeholder="Masukkan Nomor Urut Surat" class="form-control col-md-7 col-xs-12">
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
                          <input value="<?= $surat_masuk->nomor_suratmasuk ?>" type="text" id="nomor_suratmasuk" name="nomor_suratmasuk" required="required" maxlength="35" placeholder="Masukkan Nomor Surat" class="form-control col-md-7 col-xs-12">
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
                                <input value="<?= date('m-d-Y', strtotime($surat_masuk->tanggalsurat_suratmasuk)); ?>" type="text" class="form-control has-feedback-left" id="single_cal3" name="tanggalsurat_suratmasuk" placeholder="First Name" aria-describedby="inputSuccess2Status3" required="required" readonly="readonly">
                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                <span id="inputSuccess2Status3" class="sr-only">(success)</span><br>
                                <small class="text-danger">
                                  <?= form_error('tanggalsurat_suratmasuk') ?>
                                </small>
                            </div>
                          </div>
                        </fieldset>
                        </div>
                      </div>
                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Pengirim <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input value="<?= $surat_masuk->pengirim ?>" type="text" id="pengirim" name="pengirim" required="required" placeholder="Masukkan Asal/Pengirim Surat" class="form-control col-md-7 col-xs-12">
                          <small class="text-danger">
                              <?= form_error('pengirim') ?>
                          </small>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Kepada <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input value="<?= $surat_masuk->kepada_suratmasuk ?>" type="text" id="kepada_suratmasuk" name="kepada_suratmasuk" required="required" placeholder="Masukkan Tujuan Surat" class="form-control col-md-7 col-xs-12">
                          <small class="text-danger">
                            <?= form_error('kepada_suratmasuk') ?>
                          </small>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Perihal <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <textarea  id="perihal_suratmasuk" name="perihal_suratmasuk" required="required" class="form-control" rows="3" placeholder='Masukkan Perihal Surat'><?= $surat_masuk->perihal_suratmasuk ?></textarea>
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
                          <p>dokumen sebelumnya : <?= $surat_masuk->file_suratmasuk ?></p>
                        </div>
                        
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Operator </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input value="<?= $surat_masuk->operator ?>" type="text" id="operator" name="operator"  readonly="readonly" class="form-control col-md-7 col-xs-12">
                          <small class="text-danger">
                            <?= form_error('operator') ?>
                          </small>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Disposisi 1 </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <select name="disposisi1" class="select2_single form-control" tabindex="-1">
                            <option value="<?= $surat_masuk->disposisi1 ?>"><?= $surat_masuk->disposisi1 ?></option>
                            <?php foreach($disposisi as $dis) : ?>
                            <option value="<?= $dis->nama_bagian?>"><?= $dis->nama_bagian?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tanggal Disposisi 1 </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                        <div class='input-group date' id='myDatepicker'>
                            <input value="<?= date('m-d-Y H:i:s', strtotime($surat_masuk->tanggal_disposisi1)); ?>" type='text' id="tanggal_disposisi1" name="tanggal_disposisi1" class="form-control"/>
                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                        </div>
                      </div> 
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Disposisi 2 </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <select name="disposisi2" class="select2_single form-control" tabindex="-1">
                              <option value="<?= $surat_masuk->disposisi2 ?>"><?= $surat_masuk->disposisi2 ?></option>
                            <?php foreach($disposisi as $dis) : ?>
                              <option value="<?= $dis->nama_bagian?>"><?= $dis->nama_bagian?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tanggal Disposisi 2</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                        <div class='input-group date' id='datetimepicker6'>
                            <input value="<?= date('m-d-Y H:i:s', strtotime($surat_masuk->tanggal_disposisi2)); ?>" type='text' id="tanggal_disposisi2" name="tanggal_disposisi2" class="form-control"/>
                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Disposisi 3 </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <select name="disposisi3" class="select2_single form-control" tabindex="-1">
                          <option value="<?= $surat_masuk->disposisi3 ?>"><?= $surat_masuk->disposisi3 ?></option>
                            <?php foreach($disposisi as $dis) : ?>
                            <option value="<?= $dis->nama_bagian?>"><?= $dis->nama_bagian?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tanggal Disposisi 3 </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                        <div class='input-group date' id='datetimepicker7'>
                            <input value="<?= date('m-d-Y H:i:s', strtotime($surat_masuk->tanggal_disposisi3)); ?>" type='text' id="tanggal_disposisi3" name="tanggal_disposisi3" class="form-control"/>
                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
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
