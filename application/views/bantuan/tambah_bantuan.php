<section class="content-header">
<h1>
        Data Pengajuan
        <small> Bantuan</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-file-archive-o"></i> Home</a></li>
        <li class="active">Pengajuan Bantuan</li>
    </ol>
</section>

<section class="content">

    <?php 
        // notif sukses tambah edit delete
        $this->load->view('template_backend/messages');
    ?>

    <form action="" method="post" enctype="multipart/form-data">
        <div class="box box-primary">
            <div class="box-header with-border">
            <button type="submit" class="btn btn-success btn-sm pull-right"><i class="fa fa-paper-plane"></i> Simpan</button>
            <a href="<?= site_url('www/pengajuan') ?>" class="btn btn-info btn-sm pull-right" style="margin-right:3px;"><i class="fa fa-chevron-left"></i> Kembali</a>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="hidden" class="form-control"  name="id_datadiri" value="<?= $datadiri->id_datadiri?>">
                        </div>
                        <div class="form-group <?= form_error('pekerjaan') ? 'has-error':null ?>">
                            <label>Pekerjaan *</label>
                            <input type="text" class="form-control"  name="pekerjaan" value="<?= set_value('pekerjaan')?>">
                            <?= form_error('pekerjaan')?>
                        </div>
                        <div class="form-group <?= form_error('noktp') ? 'has-error':null ?>">
                            <label>NO KTP / SIM *</label>
                            <input type="text" class="form-control" name="noktp" value="<?= set_value('noktp')?>">
                            <?= form_error('noktp')?>
                        </div>
                        <div class="form-group <?= form_error('nokk') ? 'has-error':null ?>">
                            <label>NO KK *</label>
                            <input type="text" class="form-control" name="nokk" value="<?= set_value('nokk')?>">
                            <?= form_error('nokk')?>
                        </div>
                        <div class="form-group <?= form_error('gajibulanan') ? 'has-error':null ?>">
                            <label>Gaji Bulanan *</label>
                            <input type="number" class="form-control" name="gajibulanan" value="<?= set_value('gajibulanan')?>">
                            <?= form_error('gajibulanan')?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group <?= form_error('kondisi') ? 'has-error':null ?>">
                            <label>Kondisi Saat Ini</label>
                            <textarea name="kondisi" class="form-control" cols="30" rows="4"></textarea>
                            <?= form_error('kondisi')?>
                        </div>
                        <div class="form-group">
                            <label>UPLOAD SLIP GAJI</label>
                            <input type="file" class="form-control" name="fotoslipgaji" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

</section>