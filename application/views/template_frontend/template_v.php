<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title><?= $title ?></title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?= base_url()?>assets/back_end/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?= base_url()?>assets/front_end/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="shortcut icon" type="image/png" href="<?=site_url('uploads/images') ?>/faviconku.ico"/>

  <link rel="stylesheet" href="<?= base_url()?>assets/front_end/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url()?>assets/front_end/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="<?= base_url()?>" class="navbar-brand">
        <img src="<?= base_url()?>uploads/images/logopersegipanjang.png" class="brand-image img-circle elevation-3"
             style="opacity: .8">
      </a>
      
      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
          <!-- <ul class="navbar-nav">
            <li class="nav-item">
              <a href="index3.html" class="nav-link">Home</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">Contact</a>
            </li>
          </ul> -->


      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('www/auth/login') ?>" role="button"><i
              class="fa fa-sign-in"></i> Masuk
          </a>
        </li>
      </ul>
    </div>
  </nav>


  <div class="content-wrapper">
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h1 class="m-0 text-dark"> Top Navigation <small>Example 3.0</small></h1> -->
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Layout</a></li>
              <li class="breadcrumb-item active">Top Navigation</li>
            </ol> -->
          </div>
        </div>
      </div>
    </div>


    <!-- konten -->
    <div class="content">
      <div class="container">
        <br>
        <br>
        <?= $contents ?>
      </div>
    </div>
  </div>


  <!-- Main Footer -->
  <footer class="main-footer">
    <center>Created By <a href="https://www.instagram.com/auldeyy61">Ma'sum.</a></center> 
    <center>All rights reserved.</center>
  </footer>
</div>

<!-- jQuery -->
<script src="<?= base_url()?>assets/front_end/plugins/jquery/jquery.min.js"></script>
<script src="<?= base_url()?>assets/front_end/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url()?>assets/front_end/dist/js/adminlte.min.js"></script>

<!-- DataTables -->
<script src="<?= base_url()?>assets/front_end/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url()?>assets/front_end/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url()?>assets/front_end/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url()?>assets/front_end/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<script>
  $(document).ready( function () {
    $('#tabelku').DataTable();
  });

  $(document).ready( function () {
    $('#tabelcorona').DataTable();
  });
</script>

</body>
</html>
