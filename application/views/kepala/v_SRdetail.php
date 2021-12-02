<?php

$this->load->view('templates/header', $title);
$this->load->view('templates/navbar');
$this->load->view('templates/sidebar_kepala');

?>
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
            <h2>Surat Masuk ><small>Detail Surat Masuk</small></h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="profile_title">
                <div class="col-md-6">
                  <h2>Detail Surat Masuk </h2>
                </div>
              </div>
              <div class="x_content">
              </div>
              <table class="table table-striped">
                <tbody>
                  <tr>
                    <td width="40%">Tanggal Registrasi</td>
                    <td><?= $detail_SR->tanggalmasuk_suratregistrasi ?></td>
                  </tr>
                  <tr>
                    <td>Kode Surat</td>
                    <td><?= $detail_SR->kode_suratregistrasi ?></td>
                  </tr>
                  <tr>
                    <td>Nomor Surat</td>
                    <td><?= $detail_SR->nomor_suratregistrasi ?></td>
                  </tr>
                  <tr>
                    <td>Tanggal Surat</td>
                    <td><?= $detail_SR->tanggalsurat_suratregistrasi ?></td>
                  </tr>
                  <tr>
                    <td>Nama Bagian</td>
                    <td><?= $detail_SR->nama_bagian ?></td>
                  </tr>
                  <tr>
                    <td>Kepada</td>
                    <td><?= $detail_SR->kepada_suratregistrasi ?></td>
                  </tr>
                  <tr>
                    <td>Perihal</td>
                    <td><?= $detail_SR->perihal_suratregistrasi ?></td>
                  </tr>
                  <tr>
                    <td>Operator</td>
                    <td><?= $detail_SR->operatorregistrasi ?></td>
                  </tr>
                  <tr>
                    <td>Tanggal Entry</td>
                    <td><?= $detail_SR->tanggal_entry ?></td>
                  </tr>
     
                </tbody>
              </table>
              <div class="text-right">
                <a href="<?= base_url('kepala/surat_registrasi') ?>" class="btn btn-success"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
              </div>

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