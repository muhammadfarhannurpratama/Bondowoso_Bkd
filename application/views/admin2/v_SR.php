<?php

$this->load->view('templates/header', $title);
$this->load->view('templates/navbar');
$this->load->view('templates/sidebar2');

?>
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_right">
        <h2>Surat Registrasi > <small>Data Surat Registrasi</small></h2>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Data<small>Surat Registrasi</small></h2>
            <div class="clearfix"></div>
            <div class="mb-2">
              <?php if ($this->session->flashdata('message')) :
                echo $this->session->flashdata('message');
              endif; ?>
            </div>
          </div>
          <!--    <form action="<?= base_url('admin2/downloadlap_SR') ?>" name="download_suratregistrasi" method="post" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
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
            <button type="submit" class="btn btn-success"><i class="fa fa-download"></i> Unduh Laporan Surat Masuk</button></a> -->
          <a href="<?= base_url('admin2/tambahSR') ?>"><button type="button" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Surat Registrasi</button></a>
          </form>
          <div class="x_content">
            <div class="x_content">
              <table id="datatable" class="table table-striped table-bordered" style="background-color: #26B99A;">
                <thead>
                  <tr>
                    <th width="13%">
                      <font color="white">No Surat
                    </th>
                    <th width="10%">
                      <font color="white">Status Surat
                    </th>
                    <th width="10%">
                      <font color="white">Tanggal Registrasi
                    </th>
                    <th width="3%">
                      <font color="white">Kode Surat
                    </th>
                    <th width="10%">
                      <font color="white">Tanggal Surat
                    </th>
                    <th width="14%">
                      <font color="white">Pengirim
                    </th>
                    <th width="10%">
                      <font color="white">Kepada
                    </th>
                    <th width="15%">
                      <font color="white">Perihal
                    </th>
                    <th width="20%">
                      <font color="white">Aksi</font>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($surat_registrasi as $registrasi) : ?>
                    <tr>
                      <td><?= $registrasi->nomor_suratregistrasi ?></td>
                      <td><?php if ($registrasi->status === "belumd") {
                            echo "Belum Dikonfirmasi";
                          }
                          if ($registrasi->status === "belum") {
                            echo "Belum Dikerjakan";
                          }
                          if ($registrasi->status === "pending") {
                            echo "Pending";
                          }
                          if ($registrasi->status === "sudah") {
                            echo "Sudah Dikerjakan";
                          } ?>
                      </td>
                      <td><?= $registrasi->tanggalmasuk_suratregistrasi ?></td>
                      <td><?= $registrasi->kode_suratregistrasi ?></td>
                      <td><?= $registrasi->tanggalsurat_suratregistrasi ?></td>
                      <td><?= $registrasi->nama_bagian ?></td>
                      <td><?= $registrasi->kepada_suratregistrasi ?></td>
                      <td><?= $registrasi->perihal_suratregistrasi ?></td>
                      <td style="text-align:center;">
                        <?php if ($registrasi->file_suratregistrasi != ' ') : ?>
                          <a href="<?= base_url('assets/backend/surat_registrasi/' . $registrasi->file_suratregistrasi) ?>"><button type="button" title="Unduh File" class="btn btn-success btn-xs"><i class="fa fa-download"></i></button></a>
                        <?php endif; ?>

                        <!--     <a href="<?= base_url('admin/unduhDisposisiSR/' . $registrasi->id_suratregistrasi) ?>"><button type="button" title="Unduh Disposisi" class="btn btn-info btn-xs"><i class="fa fa-download"></i></button></a> -->
                        <a href="<?= base_url('admin2/detailSR/' . $registrasi->id_suratregistrasi) ?>"><button type="button" title="Detail Surat Registrasi" class="btn btn-info btn-xs"><i class="fa fa-file-image-o"></i></button></a>

                        <a href="<?= base_url('admin2/editSR/' . $registrasi->id_suratregistrasi) ?>"><button type="button" title="Edit" class="btn btn-default btn-xs"><i class="fa fa-edit"></i></button></a>
                        <a onclick="return konfirmasi()" href="<?= base_url('admin2/hapusSR/' . $registrasi->id_suratregistrasi) ?>"><button type="button" title="Hapus" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></button></a>
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