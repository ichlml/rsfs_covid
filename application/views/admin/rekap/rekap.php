<section class="section">
    <div class="section-header">
        <h1 class="text-center">REKAP BED ISOLASI COVID 19</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <?php foreach ($GroupBed as $b ) { ?>
                <div class="col-md-4">
                    <div class="card card-primary">
                        <div class="card-header"><b><center><i class="far fa-hospital"></i> <?= strtoupper($b->tempat)?></center></b></div>
                        <div class="card-body">
                            <?php foreach ($ResBed as $r) { 
                                if($b->tempat == $r->tempat){    
                            ?>
                                <table>
                                    <tr>
                                        <td> <b> Bed Terisi </b></td>
                                        <td> : </td>
                                        <td><?=$r->Terisi?> Bed</td>
                                    </tr>
                                    <tr>
                                        <td> <b> Bed Kosong </b></td>
                                        <td> : </td>
                                        <td><?=$r->Kosong?> Bed</td>
                                    </tr>
                                    <tr>
                                        <td> <b> Pasien Laki-laki </b></td>
                                        <td> : </td>
                                        <td><?=$r->L?> Orang</td>
                                    </tr>
                                    <tr>
                                        <td> <b> Pasien Perempuan </b></td>
                                        <td> : </td>
                                        <td><?=$r->P?> Orang</td>
                                    </tr>
                                    <tr>
                                        <td> <b> Pasien Suspect </b></td>
                                        <td> : </td>
                                        <td><?=$r->S?> Orang</td>
                                    </tr>
                                    <tr>
                                        <td> <b> Pasien Confirm </b></td>
                                        <td> : </td>
                                        <td><?=$r->C?> Orang</td>
                                    </tr>
                                </table>
                            <?php } ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>