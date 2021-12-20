<?php

$this->load->view('templates/header', $title);
$this->load->view('templates/navbar');
$this->load->view('templates/sidebar');

?>
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Profil Admin</h3>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Admin ><small>Detail Admin</small></h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
              <div class="profile_img">
                <div id="crop-avatar">
                  <!-- Current avatar -->
                  <img class="img-responsive avatar-view" src="<?= base_url('assets/backend/') ?>images/<?= $this->userdata['jenis']; ?>/<?= $this->userdata['gambar']; ?>" alt="Avatar" title="Change the avatar">
                </div>
              </div>
              <h3 align="center"><?= $profil->nama_admin; ?></h3>

              <a href="<?= base_url('admin/editprofil') ?>"><button type="button" class="btn btn-success"><i class="fa fa-edit m-right-xs"></i> Edit Profil</button></a>
              <br />
            </div>
            <div class="col-md-9 col-sm-9 col-xs-12">
              <div class="profile_title">
                <div class="col-md-6">
                  <h2>Detail Admin </h2>
                </div>
              </div>
              <div class="x_content">
              </div>
              <table class="table table-striped">
                <tbody>
                  <tr>
                    <td>ID</td>
                    <td><?= $profil->id_admin; ?></td>
                  </tr>
                  <tr>
                    <td>Nama Admin</td>
                    <td><?= $profil->nama_admin; ?></td>
                  </tr>
                  <tr>
                    <td>Username Admin</td>
                    <td><?= $profil->username_admin; ?></td>
                  </tr>
                </tbody>
              </table>

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