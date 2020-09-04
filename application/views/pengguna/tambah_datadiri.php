<section class="content-header">
    <h1>
        Data Diri
        <small> Detail Data Diri</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i> Home</a></li>
        <li class="active">Data Diri</li>
    </ol>
</section>

<section class="content">

    <?php 
        // notif sukses tambah edit delete
        $this->load->view('template_backend/messages');
    ?>

    <form action="<?=site_url('datadiri/tambah')?>" method="post" enctype="multipart/form-data">
        <div class="box box-primary">
            <div class="box-header with-border">
            <h3 class="box-title">Profil Data Diri</h3>
            <button type="submit" class="btn btn-success btn-sm pull-right"><i class="fa fa-paper-plane"></i> Simpan</button>
            <a href="<?= site_url('www/datadiri') ?>" class="btn btn-primary btn-sm pull-right" style="margin-right:3px;"><i class="fa fa-chevron-left"></i> Kembali</a>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="text" class="form-control" value="<?= $users->name ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Foto Profil</label>
                            <input type="file" class="form-control" name="image">
                        </div>
                        <div class="form-group <?= form_error('provinsi') ? 'has-error':null ?>">
                            <label>Provinsi *</label>
                            <input type="text" class="form-control"  name="provinsi" value="<?= set_value('provinsi')?>">
                            <?= form_error('provinsi')?>
                        </div>
                        <div class="form-group <?= form_error('kabupaten') ? 'has-error':null ?>">
                            <label>Kabupaten *</label>
                            <input type="text" class="form-control" name="kabupaten" value="<?= set_value('kabupaten')?>">
                            <?= form_error('kabupaten')?>
                        </div>
                        <div class="form-group <?= form_error('kecamatan') ? 'has-error':null ?>">
                            <label>Kecamatan *</label>
                            <input type="text" class="form-control" name="kecamatan" value="<?= set_value('kecamatan')?>">
                            <?= form_error('kecamatan')?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <div class="col-lg-6 mb-3 mb-sm-0 <?= form_error('agama') ? 'has-error':null ?>">
                                <label>Agama </label>
                                <select name="agama" id="" class="form-control">
                                    <option value="">-- Pilih --</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Katholik">Katholik</option>
                                    <option value="Budha">Budha</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Konghucu">Konghucu</option>
                                </select>
                                <?= form_error('agama')?>
                            </div>
                            <div class="col-lg-6 <?= form_error('status') ? 'has-error':null ?>">
                                <label>Status Perkawinan</label>
                                <select name="status" id="" class="form-control">
                                    <option value="">-- Pilih --</option>
                                    <option value="Belum Kawin">Belum Kawin</option>
                                    <option value="Kawin">Kawin</option>
                                    <option value="Cerai">Cerai</option>
                                </select>
                                <?= form_error('status')?>
                            </div>
                        </div>
                        <div class="form-group <?= form_error('no_telp') ? 'has-error':null ?>">
                            <label>No Telp</label>
                            <input type="number" class="form-control" name="no_telp" value="<?= set_value('no_telp')?>">
                            <?= form_error('no_telp')?>
                        </div>
                        <div class="form-group <?= form_error('kodepos') ? 'has-error':null ?>">
                            <label>Kode Pos *</label>
                            <input type="text" class="form-control" name="kodepos" value="<?= set_value('kodepos')?>">
                            <?= form_error('kodepos')?>
                        </div>
                        <div class="form-group <?= form_error('alamatlengkap') ? 'has-error':null ?>">
                            <label>Jalan / Alamat Lengkap</label>
                            <textarea name="alamatlengkap" class="form-control" cols="30" rows="4"></textarea>
                            <?= form_error('alamatlengkap')?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

</section>