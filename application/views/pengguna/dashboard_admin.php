<section class="content-header">
    <h1>
        Dashboard
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
</section>

<section class="content">

    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
            <div class="inner">
            <h3><?= count($this->libraryku->jumlah_verifikasi()); ?><sup style="font-size: 20px"> Verifikasi</sup></h3>
    
                <p>Pengajuan Bantuan</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
            <div class="inner">
                <h3><?= count($this->libraryku->jumlah_user_login()); ?><sup style="font-size: 20px"> User</sup></h3>
    
                <p>Login Hari ini</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
            <div class="inner">
                <h3><?= count($this->libraryku->jumlah_login()); ?><sup style="font-size: 20px"> User</sup></h3>
    
                <p>Jumlah Login</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
            <div class="inner">
                <h3><?= count($this->libraryku->jumlah_logout()); ?><sup style="font-size: 20px"> User</sup></h3>
    
                <p>Jumlah Logout</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
    
    </div>

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Log Aktifitas Pengguna</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive">
            <table class="table table-borderless">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Waktu</th>
                        <th>Pengguna</th>
                        <th>Alamat Ip</th>
                        <th>Aktifitas</th>
                        <th>Keterangan</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; 
                    foreach($log as $k => $v): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= date("d F Y, H:i", strtotime($v->waktu)) ?></td>
                        <td><?= $v->name ?></td>
                        <td><?= $v->ip_address ?></td>
                        <td><?= $v->aktifitas ?></td>
                        <td><?= $v->os .' '.$v->browser ?></td>
                        <td><?= $v->role ?></td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
            <?= $this->pagination->create_links(); ?>
        </div>
    </div>

    <?php
    $x = GenerateToken(50);
    debug($x);
    ?>

</section>
