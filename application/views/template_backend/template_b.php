
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Cek Bantuan Mu</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?= site_url('assets/back_end') ?>/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= site_url('assets/back_end') ?>/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?= site_url('assets/back_end') ?>/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="<?= site_url('assets/back_end') ?>/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?= site_url('assets/back_end') ?>/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link rel="stylesheet" href="<?= site_url('assets/back_end') ?>/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="shortcut icon" type="image/png" href="<?=site_url('uploads/images') ?>/faviconku.ico"/>
</head>

<?php 
$role = $this->libraryku->getData()->role_id;
if($role == 1) {
    $css = 'skin-blue';
} 
else if($role == 2) {
    $css = 'skin-black-light';
}?>

<body class="hold-transition <?=$css?> sidebar-mini">

<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?= site_url('www/dashboard') ?>" class="logo">
      <span class="logo-mini"><b>C</b>BM</span>
      <span class="logo-lg"><b>Cek Bantuan</b> MU</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <?php
                // jika rolenya adalah admin
                if($this->libraryku->getData()->role_id == 1) { ?>
                  <img src="<?= site_url('assets/back_end') ?>/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                <?php } 
                // jika rolenya bukan admin
                else { ?>

                    <?php
                      // jika datadiri = 0 
                      if($cekdatadiri == 0) { ?> 
                      <img src="<?= site_url('assets/back_end') ?>/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                      <?php }
                      
                      //jika datadiri = 1
                      else { ?> 
                        <img src="<?= site_url('uploads') ?>/fotoprofil/<?= $avatar->image_foto ?>" class="user-image" alt="User Image">
                    <?php } ?>
            <?php } ?>
              <span class="hidden-xs"><?= $this->libraryku->getData()->name ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
              <?php
                // jika rolenya adalah admin
                if($this->libraryku->getData()->role_id == 1) { ?>
                  <img src="<?= site_url('assets/back_end') ?>/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                <?php } 
                // jika rolenya bukan admin
                else { ?>

                    <?php
                      // jika datadiri = 0 
                      if($cekdatadiri == 0) { ?> 
                      <img src="<?= site_url('assets/back_end') ?>/dist/img/user2-160x160.jpg" width="160px" class="img-circle" alt="User Image">
                      <?php }
                      
                      //jika datadiri = 1
                      else { ?> 
                        <img src="<?= site_url('uploads') ?>/fotoprofil/<?= $avatar->image_foto ?>" width="160px" class="img-circle" alt="User Image">
                    <?php }
                    
                    ?>
              
              
              <?php } ?>

                <p>
                <?= $this->libraryku->getData()->email ?>
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
             
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?=site_url('www/auth/logout') ?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
         
        </ul>
      </div>
    </nav>
  </header>

  <aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
        <?php
          // jika rolenya adalah admin
          if($this->libraryku->getData()->role_id == 1) { ?>
            <img src="<?= site_url('assets/back_end') ?>/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
          <?php } 
          // jika rolenya bukan admin
          else { ?>

              <?php
                // jika datadiri = 0 
                if($cekdatadiri == 0) { ?> 
                <img src="<?= site_url('assets/back_end') ?>/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                <?php }
                
                //jika datadiri = 1
                else { ?> 
                  <img src="<?= site_url('uploads') ?>/fotoprofil/<?= $avatar->image_foto ?>" width="auto" class="img-circle" alt="User Image">
              <?php }
              
              ?>
        
        
        <?php } ?>
        </div>
        <div class="pull-left info">
          <p><?= $this->libraryku->getData()->name ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- SIDEBAR -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li <?= $this->uri->segment(2) == 'dashboard' || $this->uri->segment(1) == '' ? 'class="active"' : '' ?>>
          <a href="<?= site_url('www/dashboard')  ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>

        <?php if($this->libraryku->getData()->role_id == 1) { ?>
        <li <?= $this->uri->segment(2) == 'verifikasidata' ? 'class="active"' : '' ?>>
          <a href="<?=site_url('www/verifikasidata')?>">
            <i class="fa fa-user"></i> <span>Verifikasi Data</span>

            <?php if($notif > 0)  { ?>
            <span class="pull-right-container">
              <small class="label pull-right bg-red"><?= $notif ?></small>
            </span>
            <?php } ?>
          </a>
        </li>
        <?php } ?>

        <?php if($this->libraryku->getData()->role_id == 2) { ?>
        <li <?= $this->uri->segment(2) == 'datadiri' ? 'class="active"' : '' ?>>
          <a href="<?=site_url('www/datadiri')?>">
            <i class="fa fa-user"></i> <span>Data Diri</span> 
          </a>
        </li>

        <li <?= $this->uri->segment(2) == 'pengajuan' ? 'class="active"' : '' ?>>
          <a href="<?=site_url('www/pengajuan')?>">
            <i class="fa fa-file-archive-o"></i> <span>Pengajuan</span>
          </a>
        </li>

        <?php }?>

    
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>



  <div class="content-wrapper">
    <?php echo $contents ?>
  </div>

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong>Created by<a href="https://instagram.com/auldeyy61"> Ma'sum</a>. </strong> All rights
    reserved.
  </footer>

  <div class="control-sidebar-bg"></div>
</div>


<!-- jQuery 3 -->
<script src="<?= site_url('assets/back_end') ?>/bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?= site_url('assets/back_end') ?>/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?= site_url('assets/back_end') ?>/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="<?= site_url('assets/back_end') ?>/bower_components/fastclick/lib/fastclick.js"></script>
<script src="<?= site_url('assets/back_end') ?>/dist/js/adminlte.min.js"></script>
<script src="<?= site_url('assets/back_end') ?>/dist/js/demo.js"></script>
<!-- DataTables -->
<script src="<?= site_url('assets/back_end') ?>/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= site_url('assets/back_end') ?>/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })

  $(document).ready( function () {
    $('#tabelku').DataTable();
  });
</script>
</body>
</html>
