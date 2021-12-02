<?php

$this->load->view('templates/header', $title);
$this->load->view('templates/navbar');
$this->load->view('templates/sidebar_kepala');

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
    <div class="mb-2">
      <?php if ($this->session->flashdata('message')) :
        echo $this->session->flashdata('message');
      endif; ?>
    </div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Data<small>Surat Keluar</small></h2>
            <div class="clearfix"></div>
          </div>
          <form action="<?= base_url('kepala/downloadlap_SK') ?>" name="download_suratkeluar" method="post" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
            <!-- <form action=""  name="download_suratkeluar" method="post" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"> -->
            <div class="col-md-2 col-sm-2 col-xs-6">
              <select name="bulan" class="select2_single form-control" tabindex="-1">
                <option>Pilih Bulan</option>
                <option value="01">Januari</option>
                <option value="02">Februari</option>
                <option value="03">Maret</option>
                <option value="04">April</option>
                <option value="05">Mei</option>
                <option value="06">Juni</option>
                <option value="07">Juli</option>
                <option value="08">Agustus</option>
                <option value="09">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
              </select>
            </div>
            <div class="col-md-2 col-sm-2 col-xs-6">
              <select name="tahun" class="select2_single form-control" tabindex="-1">
                <option>Pilih Tahun</option>
                <?php
                for ($tahun = 2021; $tahun <= 2030; $tahun++) {
                  echo  '<option value="' . $tahun . '">' . $tahun . '</option>';
                }
                ?>
              </select>
            </div>
            <button type="submit" class="btn btn-success"><i class="fa fa-download"></i> Unduh Laporan Surat Keluar</button></a>
            <!--<a href="<?= base_url('kepala/tambahSK') ?>"><button type="button" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Surat Keluar</button></a>
                  -->
          </form>
          <div class="x_content">
            <div class="x_content">
              <table id="datatable" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th width="15%">Nomor Surat</th>
                    <th width="10%">Tanggal Keluar</th>
                    <th width="5%">Kode Surat</th>
                    <th width="10%">Tanggal Surat</th>
                    <th width="10%">Bagian</th>
                    <th width="15%">Kepada</th>
                    <th width="21%">Perihal</th>
                    <th width="14%">Aksi</th>
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
                        <!--      <a href="<?= base_url('kepala/unduhDisposisiSK/' . $keluar->id_suratkeluar) ?>"><button type="button" title="Unduh Disposisi" class="btn btn-info btn-xs"><i class="fa fa-download"></i></button></a> -->
                        <a href="<?= base_url('kepala/detailSK/' . $keluar->id_suratkeluar) ?>"><button type="button" title="Detail Surat Keluar" class="btn btn-info btn-xs"><i class="fa fa-file-image-o"></i></button></a>
                        <!--         <a href="<?= base_url('kepala/editSK/' . $keluar->id_suratkeluar) ?>"><button type="button" title="Edit" class="btn btn-default btn-xs"><i class="fa fa-edit"></i></button></a> -->
                        <a onclick="return konfirmasi()" href="<?= base_url('kepala/hapusSK/' . $keluar->id_suratkeluar) ?>"><button type="button" title="Hapus" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></button></a>
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