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
        <h2>Bagian > <small>Data Bagian</small></h2>
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
            <h2>Data ><small> Bagian</small> </h2>
            <div class="clearfix"></div>
          </div>
          <a href="<?= base_url('admin/bagian_tambah') ?>"><button type="button" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Bagian</button></a>
          <div class="x_content">
            <div class="x_content">
              <table id="datatable" class="table table-striped table-bordered" style="background-color: #26B99A;">
                <thead>
                  <tr>
                    <th width="15%">
                      <font color="white">Nama Bagian
                    </th>
                    <th width="10%">
                      <font color="white">Username Admin
                    </th>
                    <th width="15%">
                      <font color="white">Nama
                    </th>
                    <th width="10%">
                      <font color="white">Tanggal Lahir
                    </th>
                    <th width="20%">
                      <font color="white">Alamat
                    </th>
                    <th width="10%">
                      <font color="white">No HP
                    </th>
                    <th width="15%">
                      <font color="white">Aksi</font>
                    </th>
                  </tr>
                </thead>

                <tbody>
                  <?php foreach ($data_bagian as $bagian) : ?>
                    <tr>
                      <td><?= $bagian->nama_bagian ?></td>
                      <td><?= $bagian->username_admin_bagian ?></td>
                      <td><?= $bagian->nama_lengkap ?></td>
                      <td><?= $bagian->tanggal_lahir_bagian ?></td>
                      <td><?= $bagian->alamat ?></td>
                      <td><?= $bagian->no_hp_bagian ?></td>
                      <td style="text-align:center;">
                        <a href="<?= base_url('admin/detailBagian/' . $bagian->id_bagian) ?>"><button type="button" title="Detail Bagian" class="btn btn-info btn-xs"><i class="fa fa-file-image-o"></i></button></a>
                        <a href="<?= base_url('admin/editBagian/' . $bagian->id_bagian) ?>"><button type="button" title="Edit" class="btn btn-default btn-xs"><i class="fa fa-edit"></i></button></a>
                        <a onclick="return konfirmasi()" href="<?= base_url('admin/hapusBagian/' . $bagian->id_bagian) ?>"><button type="button" title="Hapus" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></button></a>
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