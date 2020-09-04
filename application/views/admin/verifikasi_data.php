<section class="content-header">
    <h1>
        Verifikasi Data
        <small> Bantuan</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
</section>

<section class="content">
    <?php 
        // notif sukses tambah edit delete
        $this->load->view('template_backend/messages');
    ?>

<div class="box box-info ">
        <div class="box-header with-border">
            <h3 class="box-title">Data Pengajuan</h3>
        </div>
        <div class="box-body">
            <table class="table table-bordered table-responsive" id="tabelku">
                <thead>
                    <tr>
                        <th>NOMOR PENGAJUAN</th>
                        <th>NAMA</th>
                        <th>ALAMAT</th>
                        <th>TANGGAL PENGAJUAN</th>
                        <th>PEKERJAAN</th>
                        <th>STATUS</th>
                    </tr>
                </thead>
                <tbody>
                <?php if($cekpengajuan > 0) { ?>

                    <?php foreach($pengajuan as $k => $v) : ?>
                    <tr>
                        <td><?= $v->id_pengajuan ?></td>
                        <td><?= $v->name ?></td>
                        <td><?= $v->alamatlengkap.', '.$v->provinsi ?></td>
                        <td><?= $v->created_at ?></td>
                        <td><?= $v->pekerjaan ?></td>
                        <td>
                        
                        <?php if($v->statuspengajuan == 'pending')  { ?>
                            <button class="btn btn-warning btn-xs btn-flat"><?= ucfirst($v->statuspengajuan) ?></button>
                        <?php } 
                        else if($v->statuspengajuan == 'setuju') { ?>
                            <button class="btn btn-success btn-xs btn-flat"><?= ucfirst($v->statuspengajuan) ?></button>
                        <?php } 
                        else if($v->statuspengajuan == 'tolak') {?>   
                            <button class="btn btn-danger btn-xs btn-flat"><?= ucfirst($v->statuspengajuan) ?></button> 
                        <?php } ?>

                            <a href="<?= site_url('www/verifikasidata/edit/'.$v->id_pengajuan) ?>" class="btn btn-primary btn-xs btn-flat"><i class="fa fa-edit"></i></a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                <?php } else { ?>
                    <tr>
                        <td colspan="6"><center>Data Pengajuan Kosong</center></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</section>