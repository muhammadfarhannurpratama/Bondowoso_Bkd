<?php

$this->load->view('templates/header', $title);
$this->load->view('templates/navbar');
$this->load->view('templates/sidebar_kepala');

?>    
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
                    <h2>Surat Keluar ><small>Detail Surat Keluar</small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                      <div class="profile_title">
                        <div class="col-md-6">
                          <h2>Detail Surat Keluar </h2>
                        </div>
                      </div>
                      <div class="x_content">
                    </div>   
                    <table class="table table-striped">
                      <tbody>
                        <tr>
                          <td width="40%">Tanggal Keluar</td>
                          <td><?= $detail_SK->tanggalkeluar_suratkeluar ?></td>
                        </tr>
                        <tr>
                          <td>Kode Surat</td>
                          <td><?= $detail_SK->kode_suratkeluar ?></td>
                        </tr>
                        <tr>
                          <td>Nomor Surat</td>
                          <td><?= $detail_SK->nomor_suratkeluar ?></td>
                        </tr>
                        <tr>
                          <td>Nama Bagian</td>
                          <td><?= $detail_SK->nama_bagian ?></td>
                        </tr>
                        <tr>
                          <td>Tanggal Surat</td>
                          <td><?= $detail_SK->tanggalsurat_suratkeluar ?></td>
                        </tr>
                        <tr>
                          <td>Kepada</td>
                          <td><?= $detail_SK->kepada_suratkeluar ?></td>
                        </tr>
                        <tr>
                          <td>Perihal</td>
                          <td><?= $detail_SK->perihal_suratkeluar ?></td>
                        </tr>
                        <tr>
                          <td>File</td>
                          <td><a href= "<?= base_url('assets/backend/surat_keluar/'.$detail_SK->file_suratkeluar) ?>"><b>Unduh File</b></a></td>
                        </tr>
                        <tr>
                          <td>Operator</td>
                          <td><?= $detail_SK->operator ?></td>
                        </tr>
                        <tr>
                          <td>Tanggal Entry</td>
                          <td><?= $detail_SK->tanggal_entry ?></td>
                        </tr>
                      </tbody>
                    </table>
                    <div class="text-right">
                   <a href="<?= base_url('kepala/surat_keluar') ?>" class="btn btn-success"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a></div>

                  </div>
                     
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
<?php
  $detail_SKthis->load->view('templates/footer');
?>