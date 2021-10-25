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
  <link href="<?= base_url('assets/backend/vendors/bootstrap/dist/css/bootstrap.min.css')?>" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="<?= base_url('assets/backend/vendors/font-awesome/css/font-awesome.min.css')?>" rel="stylesheet">
  <!-- NProgress -->
  <link href="<?= base_url('assets/backend/vendors/nprogress/nprogress.css')?>" rel="stylesheet">
  <!-- Animate.css -->
  <link href="<?= base_url('assets/backend/vendors/animate.css/animate.min.css')?>" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="<?= base_url('assets/backend/build/css/custom.min.css')?>" rel="stylesheet">
  <link rel="shortcut icon" href="<?= base_url('assets/frontend/img/icon.ico')?>">
</head>

<body class="login">
  <div>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
      <div class="animate form login_form">
        <section class="login_content">
          <?php  if ($this->session->flashdata()) : ?>
            <?= $this->session->flashdata('message'); ?>
          <?php endif; ?>
          <form action="<?= base_url('frontend/login')?>" method="post">
            <h1>Login</h1>
            <div class="form-group has-feedback">
              <input type="text" id="username" name="username" class="form-control" autocomplete="off" maxlength="50" placeholder="Username" required="username" autofocus/>
              <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
              <input type="password" id="password" name="password" class="form-control" autocomplete="off" maxlength="50" placeholder="Password" required="password" />
              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div>
              <a href="<?= base_url();?>"><button type="button" class="btn btn-success"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</button></a>
              <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-lock"></span> Masuk</button>
            </div>

            <div class="clearfix"></div>

            <div class="separator">
              <div>
                <h2><i class="fa fa-institution"></i> PEMKOT BONDOWOSO</h2>
                <p>©2021 </p>
              </div>
            </div>
          </form>
        </section>
      </div>
    </div>
  </div>
</body>

</html>