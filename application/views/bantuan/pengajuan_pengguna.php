<section class="content-header">
    <h1>
        Pengajuan
        <small> Bantuan</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-file-archive-o"></i> Home</a></li>
        <li class="active">Pengajuan Bantuan</li>
    </ol>
</section>

<section class="content">
    <?php if($cekpengajuan != 1) {?>
    <div class="alert alert-warning" style="height:50px;">
        <h4><i class="fa fa-warning"></i> Kamu belum mengajukan bantuan</h4>
    </div>
    <?php } else { ?>
    <div class="alert alert-info" style="height:50px;">
        <h4>Kamu sudah mengajukan bantuan</h4>
    </div>
    <?php } ?>
    <div class="box box-info ">
        <div class="box-header with-border">
            <h3 class="box-title"></h3>
            <?php if($cekpengajuan != 1) { ?>
            <a href="<?= site_url('www/bantuanmu') ?>" class="btn btn-flat btn-sm btn-warning pull-left"
                ><i class="fa fa-paper-plane-o"></i> Ajukan</a>
            <?php }?>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered">
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
                <?php if($cekpengajuan == 1)  {?>
                <tbody>
                    <tr>
                        <td><?= $pengajuan->id_pengajuan ?></td>
                        <td><?= $user->name ?></td>
                        <td><?= $datadiri->alamatlengkap.', '.$datadiri->provinsi?></td>
                        <td><?= $pengajuan->created_at?></td>
                        <td><?= $pengajuan->pekerjaan?></td>
                        <td>
                            <a class="btn btn-warning btn-xs btn-flat"><?= Ucfirst($pengajuan->statuspengajuan) ?></a>
                            <button class="btn btn-info btn-xs btn-flat"><i class="fa fa-eye"></i></button>
                        </td>
                    </tr>
                </tbody>
                <?php } else { ?>
                <tbody>
                    <tr>
                        <td colspan="6"><center>Data Pengajuan Kosong</center></td>
                    </tr>
                </tbody>
                <?php } ?>
            </table>
        </div>
    </div>
</section>