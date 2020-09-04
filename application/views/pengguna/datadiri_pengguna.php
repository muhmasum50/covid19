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


<?php  ?>

  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Profil Data Diri</h3>

      <?php if($cekdata == 0) {?>
      <a href="<?= site_url('www/datadiri/add') ?>" class="btn btn-info btn-sm pull-right" style="margin-left:3px;"><i class="fa fa-pencil"></i> Edit</a>
      <?php } else { ?>
      <a href="<?= site_url('www/datadiri/edit') ?>" class="btn btn-info btn-sm pull-right"><i class="fa fa-pencil"></i> Edit</a>
      <?php } ?>
    </div>
    <div class="box-body">

      <!-- row -->
      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->

          <?php if($cekdata > 0) { ?>
            <div class="">
              <div class="box-body box-profile">
                <img class="profile-user img-responsive" style="border:3px solid white; border-radius:10px;" 
                src="<?= site_url('uploads') ?>/fotoprofil/<?= $datadiri->image_foto ?>" width="215px">
              </div>
            </div>
          <?php } else { ?>
            <div class="">
              <div class="box-body box-profile">
                <img class="profile-user img-responsive" style="border:3px solid white; border-radius:10px;" 
                src="<?= site_url('uploads') ?>/fotoprofil/<?= $users->image ?>" width="215px">
              </div>
            </div>
          <?php } ?>
        </div>

        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#Profil" data-toggle="tab" aria-expanded="true">Profil</a></li>
            </ul>
            
            <?php 
            // cek apakah datadirinya ada atau belum
            if($cekdata > 0) { ?>
              <div class="tab-content">
                <div class="tab-pane active" id="Profil">
                  <div class="row">
                      <div class="col-md-6">
                          <div class="row bord-bottom ">
                              <label class="col-md-4">Nama Lengkap</label>
                              <div class="col-md-8">
                              <?= $users->name ?><p class="help-block"><span></span></p>
                              </div>
                          </div>
                          <div class="row bord-bottom ">
                              <label class="col-md-4">No Telp</label>
                              <div class="col-md-8">
                              <?= $datadiri->no_telp ?><p class="help-block"><span></span></p>
                              </div>
                          </div>
                          <div class="row bord-bottom ">
                              <label class="col-md-4">Alamat Email</label>
                              <div class="col-md-8">
                              <?= $users->email ?><p class="help-block"><span></span></p>
                              </div>
                          </div>
                          <div class="row bord-bottom ">
                              <label class="col-md-4">Provinsi</label>
                              <div class="col-md-8">
                              <?= $datadiri->provinsi ?><p class="help-block"><span></span></p>
                              </div>
                          </div>
                          <div class="row bord-bottom ">
                              <label class="col-md-4">Kabupaten</label>
                              <div class="col-md-8">
                              <?= $datadiri->kabupaten ?><p class="help-block"><span></span></p>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="row bord-bottom ">
                              <label class="col-md-5">Agama</label>
                              <div class="col-md-7">
                              <?= $datadiri->agama ?><p class="help-block"><span></span></p>
                              </div>
                          </div>
                          <div class="row bord-bottom ">
                              <label class="col-md-5">Status Perkawinan</label>
                              <div class="col-md-7">
                              <?= $datadiri->status ?><p class="help-block"><span></span></p>
                              </div>
                          </div>
                          <div class="row bord-bottom ">
                              <label class="col-md-5">Kecamatan</label>
                              <div class="col-md-7">
                              <?= $datadiri->kecamatan ?><p class="help-block"><span></span></p>
                              </div>
                          </div>
                          <div class="row bord-bottom ">
                              <label class="col-md-5">Kode Pos</label>
                              <div class="col-md-7">
                              <?= $datadiri->kodepos ?><p class="help-block"><span></span></p>
                              </div>
                          </div>
                          <div class="row bord-bottom ">
                              <label class="col-md-5">Alamat Lengkap</label>
                              <div class="col-md-7">
                              <?= $datadiri->alamatlengkap ?><p class="help-block"><span></span></p>
                              </div>
                          </div>
                      </div>
                  </div>
                </div>
              </div>
            <?php } 
             // jika datadirinya kosong
            else { ?> 
              <div class="tab-content">
                <div class="tab-pane active" id="Profil">
                  <div class="row">
                      <div class="col-md-6">
                          <div class="row bord-bottom ">
                              <label class="col-md-4">Nama Lengkap</label>
                              <div class="col-md-8">
                              <p class="help-block"><span></span></p>
                              </div>
                          </div>
                          <div class="row bord-bottom ">
                              <label class="col-md-4">No Telp</label>
                              <div class="col-md-8">
                              <p class="help-block"><span></span></p>
                              </div>
                          </div>
                          <div class="row bord-bottom ">
                              <label class="col-md-4">Alamat Email</label>
                              <div class="col-md-8">
                              <p class="help-block"><span></span></p>
                              </div>
                          </div>
                          <div class="row bord-bottom ">
                              <label class="col-md-4">Provinsi</label>
                              <div class="col-md-8">
                              <p class="help-block"><span></span></p>
                              </div>
                          </div>
                          <div class="row bord-bottom ">
                              <label class="col-md-4">Kabupaten</label>
                              <div class="col-md-8">
                              <p class="help-block"><span></span></p>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="row bord-bottom ">
                              <label class="col-md-5">Agama</label>
                              <div class="col-md-7">
                              <p class="help-block"><span></span></p>
                              </div>
                          </div>
                          <div class="row bord-bottom ">
                              <label class="col-md-5">Status Perkawinan</label>
                              <div class="col-md-7">
                              <p class="help-block"><span></span></p>
                              </div>
                          </div>
                          <div class="row bord-bottom ">
                              <label class="col-md-5">Kecamatan</label>
                              <div class="col-md-7">
                              <p class="help-block"><span></span></p>
                              </div>
                          </div>
                          <div class="row bord-bottom ">
                              <label class="col-md-5">Kode Pos</label>
                              <div class="col-md-7">
                              <p class="help-block"><span></span></p>
                              </div>
                          </div>
                          <div class="row bord-bottom ">
                              <label class="col-md-5">Alamat Lengkap</label>
                              <div class="col-md-7">
                              <p class="help-block"><span></span></p>
                              </div>
                          </div>
                      </div>
                  </div>
                </div>
              </div>
            <?php } ?>

          </div>
        </div>
      </div>

    </div>
  </div>

</section>