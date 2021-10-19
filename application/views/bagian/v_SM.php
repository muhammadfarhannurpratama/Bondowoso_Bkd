<?php

    $this->load->view('templates/header_bagian', $title);
		$this->load->view('templates/navbar_bagian');
    $this->load->view('templates/sidebar_bagian');

?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_right">
                <h2>Surat Masuk > <small>Data Surat Masuk</small></h2>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Data<small>Surat Masuk</small></h2>
                    <div class="clearfix"></div>
                    <div class="mb-2">
                    <?php if ($this->session->flashdata('message')) :
                        echo $this->session->flashdata('message');
                    endif; ?>
                    </div>
                  </div>
                      <form action="downloadlaporan_suratmasuk.php"  name="download_suratmasuk" method="post" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
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
                                for ($tahun=2017;$tahun<=2022;$tahun++)
                                      {
                                       echo  '<option value="'.$tahun.'">'.$tahun.'</option>';
                                      }
                            ?>
                          </select>
                        </div>
                  <button type="submit" class="btn btn-success"><i class="fa fa-download"></i> Unduh Laporan Surat Masuk</button></a>
                  <a href="<?= base_url('bagian/tambahSM')?>"><button type="button" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Surat Masuk</button></a>
                  </form>
                  <div class="x_content">
                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th width="3%">No Urut</th>
                          <th width="10%">Tanggal Masuk</th>
                          <th width="3%">Kode Surat</th>
                          <th width="10%">Tanggal Surat</th>
                          <th width="14%">Pengirim</th>
                          <th width="15%">Nomor Surat</th>
                          <th width="10%">Kepada</th>
                          <th width="25%">Perihal</th>
                          <th width="15%">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php foreach ($surat_masuk as $masuk) :?>
                        <tr>
                            <td><?= $masuk->nomorurut_suratmasuk ?></td>
                            <td><?= $masuk->tanggalmasuk_suratmasuk ?></td>
                            <td><?= $masuk->kode_suratmasuk ?></td>
                            <td><?= $masuk->tanggalsurat_suratmasuk ?></td>
                            <td><?= $masuk->pengirim ?></td>
                            <td><?= $masuk->nomor_suratmasuk ?></td>
                            <td><?= $masuk->kepada_suratmasuk ?></td>
                            <td><?= $masuk->perihal_suratmasuk ?></td>
                            <td style="text-align:center;">
                              <a href="<?= base_url('assets/backend/surat_masuk/'.$masuk->file_suratmasuk) ?>"><button type="button" title="Unduh File" class="btn btn-success btn-xs"><i class="fa fa-download"></i></button></a>
                              <a href="<?= base_url('bagian/unduhDisposisiSM/'.$masuk->id_suratmasuk) ?>"><button type="button" title="Unduh Disposisi" class="btn btn-info btn-xs"><i class="fa fa-download"></i></button></a>
                              <a href="<?= base_url('bagian/detailSM/'.$masuk->id_suratmasuk) ?>"><button type="button" title="Detail Surat Masuk" class="btn btn-info btn-xs"><i class="fa fa-file-image-o"></i></button></a>
                              <a href="<?= base_url('bagian/editSM/'.$masuk->id_suratmasuk) ?>"><button type="button" title="Edit" class="btn btn-default btn-xs"><i class="fa fa-edit"></i></button></a>
                              <a onclick="return konfirmasi()" href="<?= base_url('bagian/hapusSM/'.$masuk->id_suratmasuk) ?>"><button type="button" title="Hapus" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></button></a>
                              </td>
                        </tr>
                      <?php endforeach;?>
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
  $this->load->view('templates/footer_bagian');
?>