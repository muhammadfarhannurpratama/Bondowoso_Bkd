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
                    <h2>Surat Masuk ><small>Ubah Status Surat Masuk</small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form action="<?= base_url('bagian/edit_prosesSMstatus')?>"  name="formsuratmasuk" method="post" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                    <input type="hidden" name="id_suratmasuk" value="<?= $ubah_status->id_suratmasuk ?>">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tanggal Masuk <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                        <div class='input-group date' id='myDatepicker4'>
                            <input value="<?= date('m-d-Y H:i:s', strtotime($ubah_status->tanggalmasuk_suratmasuk)) ?>" type='text' id="tanggalmasuk_suratmasuk" name="tanggalmasuk_suratmasuk" class="form-control" readonly="readonly"/>
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Nomor Surat <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input value="<?= $ubah_status->nomor_suratmasuk ?>" type="text" id="nomor_suratmasuk" name="nomor_suratmasuk" disable readonly maxlength="35" placeholder="Masukkan Nomor Surat" class="form-control col-md-7 col-xs-12">
                          <small class="text-danger">
                                <?= form_error('nomor_suratmasuk') ?>
                            </small>
                        </div>
                        </div>

                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Pengirim <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input value="<?= $ubah_status->pengirim ?>" type="text" id="pengirim" name="pengirim" disable readonly placeholder="Masukkan Asal/Pengirim Surat" class="form-control col-md-7 col-xs-12">
                          <small class="text-danger">
                              <?= form_error('pengirim') ?>
                          </small>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Kepada <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input value="<?= $ubah_status->kepada_suratmasuk ?>" type="text" id="kepada_suratmasuk" name="kepada_suratmasuk" disable readonly placeholder="Masukkan Tujuan Surat" class="form-control col-md-7 col-xs-12">
                          <small class="text-danger">
                            <?= form_error('kepada_suratmasuk') ?>
                          </small>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="status">Status <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <select class="form-control col-md-7 col-xs-12" name="status">
                              <!-- ini belum dikonfirmasi -->
                            <?php if($ubah_status->status === "belumd" ) { ?>
                                <option value="<?= $ubah_status->status ?>"><?= $ubah_status->status ?> Dikonfirmasi</option>
                                <option value="pending">Pending</option>
                                <option value="sudah"> Sudah Dikerjakan</option>
                                <option value="belum">Belum dikerjakan</option>
                            <?php } if ($ubah_status->status === "sudah")  { ?>
                                <option value="<?= $ubah_status->status ?>"><?= $ubah_status->status ?> Dikerjakan</option>
                                <option value="pending">Pending</option>
                                <option value="belumd"> belum Dikonfirmasi</option>
                                <option value="belum">Belum dikerjakan</option>
                            <?php }if ($ubah_status->status === "pending") {?>
                                <option value="<?= $ubah_status->status ?>"><?= $ubah_status->status ?></option>
                                <option value="sudah">Sudah Dikerjakan</option>
                                <option value="belumd"> belum Dikonfirmasi</option>
                                <option value="belum">Belum dikerjakan</option>
                            <?php } if ($ubah_status->status === "belum") {?>
                                <option value="<?= $ubah_status->status ?>"><?= $ubah_status->status ?> Dikerjakan</option>
                                <option value="sudah">Sudah Dikerjakan</option>
                                <option value="belumd"> belum Dikonfirmasi</option>
                                <option value="belum">Pending</option>
                            <?php } ?>
                          </select>
                          <small class="text-danger">
                            <?= form_error('status') ?>
                          </small>
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
        <!-- /page content -->

<?php
  $this->load->view('templates/footer');
?>
