<?php

$this->load->view('templates/header_bagian', $title);
$this->load->view('templates/navbar_bagian');
$this->load->view('templates/sidebar_bagian');

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
                          <td width="40%">Tanggal Masuk</td>
                          <td><?= $detail_SM->tanggalmasuk_suratmasuk ?></td>
                        </tr>
                        <tr>
                          <td>Kode Surat</td>
                          <td><?= $detail_SM->kode_suratmasuk ?></td>
                        </tr>
                        <tr>
                          <td>Nomor Urut</td>
                          <td><?= $detail_SM->nomorurut_suratmasuk ?></td>
                        </tr>
                        <tr>
                          <td>Nomor Surat</td>
                          <td><?= $detail_SM->nomor_suratmasuk ?></td>
                        </tr>
                        <tr>
                          <td>Tanggal Surat</td>
                          <td><?= $detail_SM->tanggalsurat_suratmasuk ?></td>
                        </tr>
                        <tr>
                          <td>Pengirim</td>
                          <td><?= $detail_SM->pengirim ?></td>
                        </tr>
                        <tr>
                          <td>Kepada</td>
                          <td><?= $detail_SM->kepada_suratmasuk ?></td>
                        </tr>
                        <tr>
                          <td>Perihal</td>
                          <td><?= $detail_SM->perihal_suratmasuk ?></td>
                        </tr>
                        <tr>
                          <td>File</td>
                          <td><a href= "<?= base_url('assets/backend/surat_masuk/'.$detail_SM->file_suratmasuk) ?>"><b>Unduh File</b></a></td>
                        </tr>
                        <tr>
                          <td>Operator</td>
                          <td><?= $detail_SM->operator ?></td>
                        </tr>
                        <tr>
                          <td>Tanggal Entry</td>
                          <td><?= $detail_SM->tanggal_entry ?></td>
                        </tr>
                        <tr>
                          <td>Disposisi 1</td>
                          <td><?= $detail_SM->disposisi1 ?></td>
                        </tr>
                        <tr>
                          <td>Tanggal Disposisi 1</td>
                          <td><?= $detail_SM->tanggal_disposisi1 ?></td>
                        </tr>
                        <tr>
                          <td>Disposisi 2</td>
                          <td><?= $detail_SM->disposisi2 ?></td>
                        </tr>
                        <tr>
                          <td>Tanggal Disposisi 2</td>
                          <td><?= $detail_SM->tanggal_disposisi2 ?></td>
                        </tr>
                         <tr>
                          <td>Disposisi 3</td>
                          <td><?= $detail_SM->disposisi3 ?></td>
                        </tr>
                        <tr>
                          <td>Tanggal Disposisi 3</td>
                          <td><?= $detail_SM->tanggal_disposisi3 ?></td>
                        </tr>

                        
                      </div>
                      </div>

                      </tbody>
                    </table>
                    <div class="text-right">
                   <a href="<?= base_url('bagian/surat_masuk') ?>" class="btn btn-success"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a></div>
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