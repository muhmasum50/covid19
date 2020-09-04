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
            <div class="small-box bg-primary">
            <div class="inner">
                <center>
                    <h4><?= $data_positif['name'] ?></h4>
                    <h3 style="margin-top:-10px"><?= $data_positif['value'] ?></h3>
                    <h4 style="margin-top:-8px">Orang</h4>
                </center>
            </div>
            <div class="icon">
            </div>
            
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
            <div class="inner">
                <center>
                    <h4><?= $data_sembuh['name'] ?></h4>
                    <h3 style="margin-top:-10px"><?= $data_sembuh['value'] ?></h3>
                    <h4 style="margin-top:-8px">Orang</h4>
                </center>
            </div>
            <div class="icon">
            </div>

            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
            <div class="inner">
                <center>
                    <h4><?= $data_dead['name'] ?></h4>
                    <h3 style="margin-top:-10px"><?= $data_dead['value'] ?></h3>
                    <h4 style="margin-top:-8px">Orang</h4>
                </center>
            </div>
            <div class="icon">
            
            </div>
            
            </div>
        </div>

        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-yellow">
            <div class="inner">
                <center>
                    <h3><?= $data_ina[0]['name'] ?></h3>
                    <h4 style="margin-top:0px"><?= $data_ina[0]['positif'].'<b> POSITIF </b>, '.' '.$data_ina[0]['sembuh'] ?></h4>
                    <h4 style="margin-top:-8px"><?= '<b>SEMBUH</b>, '.' '.$data_ina[0]['meninggal'].' <b>MENINGGAL</b>' ?></h4>
                </center>
            </div>
            <div class="icon">
            
            </div>
            
            </div>
        </div>
    </div>

</section>
