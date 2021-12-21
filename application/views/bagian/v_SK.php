<?php

$this->load->view('templates/header', $title);
$this->load->view('templates/navbar');
$this->load->view('templates/sidebar');

?>

<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_right">
        <h2>Surat Keluar ><small> Data Surat Keluar</small></h2>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Data<small>Surat Keluar</small></h2>
            <div class="clearfix"></div>
            <div class="mb-2">
              <?php if ($this->session->flashdata('message')) :
                echo $this->session->flashdata('message');
              endif; ?>
            </div>
          </div>
          <div class="x_content">
            <div class="x_content">
              <table id="datatable" class="table table-striped table-bordered" style="background-color: #26B99A;">
                <thead>
                  <tr>
                    <th width="10%">
                      <font color="white">Nomor Surat
                    </th>
                    <th width="10%">
                      <font color="white">Tanggal Keluar
                    </th>
                    <th width="15%">
                      <font color="white">Kode Surat
                    </th>
                    <th width="10%">
                      <font color="white">Tanggal Surat
                    </th>
                    <th width="10%">
                      <font color="white">Bagian
                    </th>
                    <th width="15%">
                      <font color="white">Kepada
                    </th>
                    <th width="15%">
                      <font color="white">Perihal
                    </th>
                    <th width="15%">
                      <font color="white">Aksi</font>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($surat_keluar as $keluar) : ?>
                    <tr>
                      <td><?= $keluar->nomor_suratkeluar ?></td>
                      <td><?= $keluar->tanggalkeluar_suratkeluar ?></td>
                      <td><?= $keluar->kode_suratkeluar ?></td>
                      <td><?= $keluar->tanggalsurat_suratkeluar ?></td>
                      <td><?= $keluar->nama_bagian ?></td>
                      <td><?= $keluar->kepada_suratkeluar ?></td>
                      <td><?= $keluar->perihal_suratkeluar ?></td>
                      <td style="text-align:center;">

                        <?php if ($keluar->file_suratkeluar != ' ') : ?>
                          <a href="<?= base_url('assets/backend/surat_keluar/' . $keluar->file_suratkeluar) ?>"><button type="button" title="Unduh File" class="btn btn-success btn-xs"><i class="fa fa-download"></i></button></a>
                        <?php endif; ?>
                        <a href="<?= base_url('bagian/detailSK/' . $keluar->id_suratkeluar) ?>"><button type="button" title="Detail Surat Keluar" class="btn btn-info btn-xs"><i class="fa fa-file-image-o"></i></button></a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
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