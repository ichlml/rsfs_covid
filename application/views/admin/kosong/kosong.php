<section class="section">
    <div class="section-header">
        <h1 class="text-center">DASHBOARD BED KOSONG ISOLASI COVID-19 LANTAI 4</h1>
    </div>
    <div class="row">
            <?php 
                foreach ($row as $value) {
            ?>

            
            <div class="col-lg-3">
                <div class="card card-warning">
                    <div class="card-header"><?= $value->nama_kamar?></div>
                    <div class="card-body">
                            <?php foreach ($bed as $key){ 
                                if($value->nama_kamar == $key->nama_kamar AND $key->status_bed =='0'){    
                            ?>
                            
                            <div class="row">
                                    <div class="col-sm">
                                        <button disabled="disabled" class="btn btn-sm btn-warning"><?= $key->no_bed ?></button>
                                        
                                        <?php foreach ($pasien as $p ) { 
                                            if($p->nama_kamar == $value->nama_kamar){    
                                        ?>
                                                    <?php if($p->jk == 'P' and $p->status_pasien == 'suspect' and $p->status_plg == ''){ ?>
                                                        <?php if($key->status_bed == '0'){ ?>
                                                        <button class="btn btn-sm btn-pink"> P </button>
                                                        <button disabled="disabled" class="btn btn-sm btn-success">Suspect</button>
                                                        <?php } ?>
                                                    <?php } elseif($p->jk == 'P' and $p->status_pasien == 'confirm' and $p->status_plg == ''){ ?>
                                                        <?php if($key->status_bed == '0'){ ?>
                                                        <button id="det" data-toggle="modal" data-target="#exampleModal" data-nama="<?= $p->nm_pasien?>" data-almt="<?= $p->alamat?>" class="btn btn-sm btn-pink"><?= $p->jk ?></button>
                                                        <button disabled="disabled" class="btn btn-sm btn-yt"><?= $p->status_pasien ?></button>
                                                        <?php } ?>
                                                    <?php } elseif($p->jk == 'L' and $p->status_pasien == 'suspect' and $p->status_plg == ''){?>
                                                        <?php if($key->status_bed == '0'){ ?>
                                                        <button id="det" data-target="#exampleModal" data-toggle="modal" data-nama="<?= $p->nm_pasien?>" data-almt="<?= $p->alamat?>" class="btn btn-sm btn-info"><?= $p->jk ?></button>
                                                        <button disabled="disabled" class="btn btn-sm btn-success"><?= $p->status_pasien ?></button>
                                                        <?php } ?>
                                                    <?php }elseif($p->jk == 'L' and $p->status_pasien == 'confirm' and $p->status_plg == ''){?>
                                                        <?php if($key->status_bed == '0'){ ?>
                                                        <button id="det" data-target="#exampleModal" data-toggle="modal" data-nama="<?= $p->nm_pasien?>" data-almt="<?= $p->alamat?>" class="btn btn-sm btn-info"><?= $p->jk ?></button>
                                                        <button disabled="disabled" class="btn btn-sm btn-yt"><?= $p->status_pasien ?></button>
                                                        <?php } ?>

                                                    <?php } ?>
                                            <?php } ?>
                                        <?php } ?>
                                    </div>
                                </div>
                                <br>
                                <?php } ?>
                            <?php } ?>
                        
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</section>


