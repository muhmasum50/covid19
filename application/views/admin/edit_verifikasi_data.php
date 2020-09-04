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

<form action="" method="post">
    <div class="box box-warning">
        <div class="box-header with-border">
            <h3 class="box-title">Data Pengajuan</h3>
            <button type="submit" class="btn btn-warning btn-sm pull-right"><i class="fa fa-paper-plane"></i> Update</button>
            <a href="<?= site_url('www/verifikasidata') ?>" class="btn btn-primary btn-sm pull-right" style="margin-right:3px;"><i class="fa fa-chevron-left"></i> Kembali</a>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="row bord-bottom ">
                        <label class="col-md-4">Nama Lengkap</label>
                        <div class="col-md-8">
                        <?= $pengajuan->name ?><p class="help-block"><span></span></p>
                        </div>
                    </div>
                    <div class="row bord-bottom ">
                        <label class="col-md-4">No Telp</label>
                        <div class="col-md-8">
                        <?= $pengajuan->no_telp ?><p class="help-block"><span></span></p>
                        </div>
                    </div>
                    <div class="row bord-bottom ">
                        <label class="col-md-4">Alamat Email</label>
                        <div class="col-md-8">
                        <?= $pengajuan->email ?><p class="help-block"><span></span></p>
                        </div>
                    </div>
                    <div class="row bord-bottom ">
                        <label class="col-md-4">Provinsi</label>
                        <div class="col-md-8">
                        <?= $pengajuan->provinsi ?><p class="help-block"><span></span></p>
                        </div>
                    </div>
                    <div class="row bord-bottom ">
                        <label class="col-md-4">Kabupaten</label>
                        <div class="col-md-8">
                        <?= $pengajuan->kabupaten ?><p class="help-block"><span></span></p>
                        </div>
                    </div>
                    <div class="row bord-bottom ">
                        <label class="col-md-4">Agama</label>
                        <div class="col-md-8">
                        <?= $pengajuan->agama ?><p class="help-block"><span></span></p>
                        </div>
                    </div>
                    <div class="row bord-bottom ">
                        <label class="col-md-4">Status Perkawinan</label>
                        <div class="col-md-8">
                        <?= $pengajuan->status ?><p class="help-block"><span></span></p>
                        </div>
                    </div>
                    <div class="row bord-bottom ">
                        <label class="col-md-4">Kecamatan</label>
                        <div class="col-md-8">
                        <?= $pengajuan->kecamatan ?><p class="help-block"><span></span></p>
                        </div>
                    </div>
                    <div class="row bord-bottom ">
                        <label class="col-md-4">Kode Pos</label>
                        <div class="col-md-8">
                        <?= $pengajuan->kodepos ?><p class="help-block"><span></span></p>
                        </div>
                    </div>
                    <div class="row bord-bottom ">
                        <label class="col-md-4">Alamat Lengkap</label>
                        <div class="col-md-8">
                        <?= $pengajuan->alamatlengkap ?><p class="help-block"><span></span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row bord-bottom ">
                        <label class="col-md-4">ID Pengajuan</label>
                        <div class="col-md-8">
                        <?= $pengajuan->id_pengajuan ?><p class="help-block"><span></span></p>
                        </div>
                    </div>
                    <div class="row bord-bottom ">
                        <label class="col-md-4">ID Data Diri</label>
                        <div class="col-md-8">
                        <?= $pengajuan->id_datadiri ?><p class="help-block"><span></span></p>
                        </div>
                    </div>
                    <div class="row bord-bottom ">
                        <label class="col-md-4">NO KTP / SIM</label>
                        <div class="col-md-8">
                        <?= $pengajuan->ktpsim ?><p class="help-block"><span></span></p>
                        </div>
                    </div>
                    <div class="row bord-bottom ">
                        <label class="col-md-4">NO KK</label>
                        <div class="col-md-8">
                        <?= $pengajuan->kk ?><p class="help-block"><span></span></p>
                        </div>
                    </div>
                    <div class="row bord-bottom ">
                        <label class="col-md-4">Pekerjaan</label>
                        <div class="col-md-8">
                        <?= $pengajuan->pekerjaan ?><p class="help-block"><span></span></p>
                        </div>
                    </div>
                    <div class="row bord-bottom ">
                        <label class="col-md-4">Gaji Bulanan</label>
                        <div class="col-md-8">
                        <b>Rp. <?= number_format($pengajuan->gajibulanan) ?></b><p class="help-block"><span></span></p>
                        </div>
                    </div>
                    <div class="row bord-bottom ">
                        <label class="col-md-4">Kondisi Sekarang</label>
                        <div class="col-md-8">
                        <?= $pengajuan->kondisi ?><p class="help-block"><span></span></p>
                        </div>
                    </div>
                    <div class="row bord-bottom">
                        <label class="col-md-4">Status Pengajuan</label>
                        <div class="col-md-8 <?= form_error('isverifikasi') ? 'has-error':null ?>">
                        <select name="isverifikasi" class="form-control">
                            <option value="">-- Pilih --</option>
                            <option value="setuju" <?= set_value('isverifikasi') == 'setuju' ? "selected" : null ?> >Setuju</option>
                            <option value="tolak" <?= set_value('isverifikasi') == 'tolak' ? "selected" : null ?> >Tolak</option>
                        </select>
                        <?= form_error('isverifikasi')?>
                        <p class="help-block"><span></span></p>
                        </div>
                    </div>
                    <div class="row bord-bottom ">
                        <label class="col-md-4">Diajukan Pada</label>
                        <div class="col-md-8">
                        <?= $pengajuan->created_at ?><p class="help-block"><span></span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="box box-warning">
        <div class="box-body">
            <div class="row">
                <div class="col-md-4">
                    <label style="font-size:20px">FOTO</label>
                    <img class="profile-user img-responsive" style="border:3px solid white; border-radius:10px;" 
                    src="<?= site_url('uploads') ?>/fotoprofil/<?=$pengajuan->image_foto ?>" width="300px">
                </div>
                <div class="col-md-8">
                    <label style="font-size:20px">SLIP GAJI</label>
                    <img class="profile-user img-responsive" style="border:3px solid white; border-radius:10px;" 
                    src="<?= site_url('uploads') ?>/dokumenpengajuan/<?=$pengajuan->foto_slipgaji ?>" width="500px">
                </div>
            </div>
        </div>
    </div>
</form>
</section>