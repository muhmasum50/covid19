<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $title ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?= site_url() ?>assets/front_end/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="<?= site_url() ?>assets/front_end/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="<?= site_url() ?>assets/front_end/dist/css/adminlte.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="shortcut icon" type="image/png" href="<?=site_url('uploads/images') ?>/faviconku.ico"/>
</head>
<body class="hold-transition login-page">
<div class="login-box" style="border-radius:3px;">
  <div class="login-logo">
    <a href="<?= site_url() ?>assets/front_end/index2.html"><b>Login</b> Aplikasi</a>
    <p style="font-size:20px;" class="login-box-msg">Aplikasi Bantuan Pandemi Covid 19</p>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg"></p>
      <?= $this->session->flashdata('status'); ?>
      
      <form action="<?= site_url() ?>auth/login" method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email_user" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input id="password" type="password" class="form-control" name="password_user" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock" id="tombolshow" onclick="ShowPassword()" style="cursor:pointer"></span>
            </div>
          </div>
        </div>
        
        <button type="submit" class="btn btn-primary btn-sm btn-block">Sign In</button>
      </form>

      <div class="social-auth-links text-center mb-3">
        
      </div>

      <p class="mb-1">
        <!-- <a href="forgot-password.html">Lupa Password?</a> -->
      </p>
      <p class="mb-0">
        <a href="<?= site_url('www/auth/register')?>" class="text-center">Belum Punya Akun?</a>
      </p>
    </div>
  </div>
</div>

<script src="<?= site_url() ?>assets/front_end/plugins/jquery/jquery.min.js"></script>
<script src="<?= site_url() ?>assets/front_end/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= site_url() ?>assets/front_end/dist/js/adminlte.min.js"></script>

<script>
    function ShowPassword() {
      if (document.getElementById("password").type == 'password') {
          document.getElementById("password").type = 'text';
          document.getElementById("tombolshow").classList.remove('fa-lock');
          document.getElementById("tombolshow").classList.add('fa-unlock');
      } 
      else {
          document.getElementById("password").type = 'password';
          document.getElementById("tombolshow").classList.remove('fa-unlock');
          document.getElementById("tombolshow").classList.add('fa-lock');
      }
    }
</script>

</body>
</html>
