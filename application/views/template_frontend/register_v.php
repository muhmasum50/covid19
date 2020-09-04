
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Registration Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="<?= site_url('assets/front_end') ?>/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="<?= site_url('assets/front_end') ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="<?= site_url('assets/front_end') ?>/dist/css/adminlte.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="shortcut icon" type="image/png" href="<?=site_url('uploads/images') ?>/faviconku.ico"/>
</head>
<body class="hold-transition login-page">
<div class="box" style="margin-top:40px;">
  <div class="register-logo">
    <a href="<?= site_url() ?>"><b>Daftar</b> Aplikasi</a>
    <p style="font-size:20px" class="login-box-msg">Aplikasi Penerima Bantuan Covid 19</p>
  </div>

  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg"></p>

      <form action="<?=base_url()?>auth/register" method="post">
          <div class="form-group">
            <label>Nama Lengkap : </label>
            <input type="text" class="form-control" placeholder="Masukkan nama kamu" name="fullname" value="<?= set_value('fullname') ?>">
            <?= form_error('fullname','<small class="text-danger pl-2">','</small>') ?>
          </div>
          <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
              <label>Tempat Lahir : </label>
              <input type="text" class="form-control" name="tempatlahir" placeholder="Tempat lahir kamu"  value="<?= set_value('tempatlahir') ?>">
              <?= form_error('tempatlahir','<small class="text-danger pl-2">','</small>') ?>
            </div>
            <div class="col-sm-6">
              <label>Tanggal Lahir : </label>
              <input type="date" class="form-control" name="tanggallahir" placeholder="Tanggal Lahir"  value="<?= set_value('tanggallahir') ?>">
              <?= form_error('tanggallahir','<small class="text-danger pl-2">','</small>') ?>
            </div>
          </div>
          <div class="form-group">
            <label>Email : </label>
            <input type="email" class="form-control" placeholder="Email kamu" name="email" value="<?= set_value('email') ?>">
            <?= form_error('email','<small class="text-danger pl-2">','</small>') ?>
          </div>
          <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
            <label>Password : </label>
              <input type="password" class="form-control" placeholder="Password" name="password">
              <?= form_error('password','<small class="text-danger pl-2">','</small>') ?>
            </div>
            <div class="col-sm-6">
              <label>Konfirmasi Password : </label>
              <input type="password" class="form-control" placeholder="Konfirmasi Password" name="passconf">
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-sm btn-block">Daftar</button>
        </form>

      <div class="social-auth-links text-center">
      </div>

      <div class="social-auth-links text-center mb-3">
        <a href="<?= site_url()?>www/auth/login" class="text-center">I already have a membership</a>
      </div>
    </div>
  </div>
</div>

<script src="<?= site_url('assets/front_end') ?>/plugins/jquery/jquery.min.js"></script>
<script src="<?= site_url('assets/front_end') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= site_url('assets/front_end') ?>/dist/js/adminlte.min.js"></script>
</body>
</html>
