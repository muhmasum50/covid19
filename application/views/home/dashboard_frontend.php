<div class="row">
    <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h7><?=$positif['name']?></h7>
                <h3> <?= $positif['value'] ?></h3>
                <sup style="font-size: 17px"> ORANG</sup>
			</div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-primary">
            <div class="inner">
                <h7><?=$sembuh['name']?></h7>
                <h3> <?= $sembuh['value'] ?><sup style="font-size: 20px"> </sup></h3>
                <sup style="font-size: 17px"> ORANG</sup>
            </div>
            <div class="icon">
            <i class="ion ion-stats-bars"></i>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-warning">
            <div class="inner">
                <h7><?=$meninggal['name']?></h7>
                <h3> <?= $meninggal['value'] ?><sup style="font-size: 20px"> </sup></h3>
                <sup style="font-size: 17px"> ORANG</sup>
            </div>
            <div class="icon">
            <i class="ion ion-person-add"></i>
            </div>     
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-danger">
            <div class="inner">
                <h3> <?= $ina[0]['name'] ?><sup style="font-size: 20px"> </sup></h3>
                <sup style="font-size: 14px"> <?= $ina[0]['positif'].' POSITIF, '.' '.$ina[0]['sembuh'] ?></sup><br>
                <sup style="font-size:14px"> <?= 'SEMBUH, '.' '.$ina[0]['meninggal'].' MENINGGAL' ?></sup>
            </div>
            <div class="icon">
            <i class="ion ion-pie-graph"></i>
            </div>
            
        </div>
    </div>

</div>

<div class="row">
    <div class="col-md-12">
        <div class="card card-info card-outline">
            <div class="card-header">
                <h3 class="card-title">Data Kasus Coronavirus di Indonesia Berdasarkan Provinsi</h3>
            </div>
            <div class="card-body table-responsive table-sm table-primary">
                <table class="table table-bordered" id="tabelku">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>KODE PROVINSI</th>
                            <th>PROVINSI</th>
                            <th>POSITIF</th>
                            <th>SEMBUH</th>
                            <th>MENINGGAL</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; 
                        foreach($provinsi as $r) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?=$r['attributes']['Kode_Provi']?></td>
                            <td><?=$r['attributes']['Provinsi']?></td>
                            <td><?=number_format($r['attributes']['Kasus_Posi'])?></td>
                            <td><?=number_format($r['attributes']['Kasus_Semb'])?></td>
                            <td><?=number_format($r['attributes']['Kasus_Meni'])?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card card-info card-outline">
            <div class="card-header">
                <h3 class="card-title">Kasus Corona Virus Global</h3>
            </div>
            <div class="card-body table-responsive table-sm table-primary">
                <table class="table table-borderless" id="tabelcorona">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>NEGARA</th>
                            <th>POSITIF</th>
                            <th>SEMBUH</th>
                            <th>MENINGGAL</th>
                            <th>AKTIF</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; 
                        foreach($global as $r) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?=$r['attributes']['Country_Region']?></td>
                            <td><?=number_format($r['attributes']['Confirmed'])?></td>
                            <td><?=number_format($r['attributes']['Recovered'])?></td>
                            <td><?=number_format($r['attributes']['Deaths'])?></td>
                            <td><?=number_format($r['attributes']['Active'])?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <a href="https://www.unicef.org/indonesia/id/coronavirus">
            <div class="small-box bg-success">
                <div class="inner">
                    <br>
                    <center><h5>Novel coronavirus (COVID-19): Hal-hal Yang Perlu Anda Ketahui</h5></center>
                    <center><sup style="font-size: 16px">Unicef Indonesia</sup></center>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-6">
        <a href="https://www.kompas.com/tren/read/2020/03/03/183500265/infografik-daftar-100-rumah-sakit-rujukan-penanganan-virus-corona">
            <div class="small-box bg-info">
                <div class="inner">
                    <br>
                    <center><h5>Daftar 100 Rumah Sakit Rujukan Penanganan Virus Corona</h5></center>
                    <center><sup style="font-size: 16px">Kompas</sup></center>
                </div>
            </div>
        </a>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <a href="https://infeksiemerging.kemkes.go.id/">
            <div class="small-box bg-danger">
                <div class="inner">
                    <br>
                    <center><h5>Wilayah Transmisi Lokal Kasus COVID-19</h5></center>
                    <center><sup style="font-size: 16px">Kementrian Kesehatan</sup></center>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-6">
        <a href="https://www.who.int/emergencies/diseases/novel-coronavirus-2019/advice-for-public">
            <div class="small-box bg-warning">
                <div class="inner">
                    <br>
                    <center><h5>Coronavirus Disease (COVID-19) Advice For The Public</h5></center>
                    <center><sup style="font-size: 16px">WHO</sup></center>
                </div>
            </div>
        </a>
    </div>
</div>

