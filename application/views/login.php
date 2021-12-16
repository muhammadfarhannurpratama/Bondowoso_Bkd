<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Login - Arsip Surat Kabupaten Bondowoso</title>

  <!-- Bootstrap -->
  <link href="<?= base_url('assets/backend/vendors/bootstrap/dist/css/bootstrap.min.css') ?>" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="<?= base_url('assets/backend/vendors/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet">
  <!-- NProgress -->
  <link href="<?= base_url('assets/backend/vendors/nprogress/nprogress.css') ?>" rel="stylesheet">
  <!-- Animate.css -->
  <link href="<?= base_url('assets/backend/vendors/animate.css/animate.min.css') ?>" rel="stylesheet">
  <!-- Custom Theme Style -->
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/frontend/css/custom.css') ?>">
</head>

<body class="login">
  <div class="container">
    <div class="row vertical-offset-100">
      <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-default">
          <div class="panel-heading">
            <?php if ($this->session->flashdata()) : ?>
              <?= $this->session->flashdata('message'); ?>
            <?php endif; ?>
            <form action="<?= base_url('frontend/login') ?>" method="post">
              <center>
                <div class="logo">
                  <img src="<?= base_url('assets/frontend/img/logo2.png') ?>">
                </div>
              </center>
              <div class="form-group has-feedback">
                <input type="text" id="username" name="username" class="form-control" autocomplete="off" maxlength="50" placeholder="Username" required="username" autofocus />
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
              </div>
              <div class="form-group has-feedback">
                <input type="password" id="password" name="password" class="form-control" autocomplete="off" maxlength="50" placeholder="Password" required="password" />
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
              </div><br>
              <div>
                <center>
                  <a href="<?= base_url(); ?>"><button type="button" class="btn btn-success"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</button></a> &nbsp;&nbsp;
                  <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-lock"></span> Masuk</button>
                </center>
              </div><br>

              <div class="clearfix"></div>

              <div class="separator">
                <center>
                  <div>
                    <h4> Badan Kepegawaian Daerah<br>Bondowoso</h4>
                    <p>©2021
                  </div>
                </center>
              </div>
            </form>
            </section>
          </div>
        </div>
      </div>
</body>

</html>