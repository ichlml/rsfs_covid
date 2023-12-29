<section class="section">
    <div class="section-header">
        <h1 class="text-center">DASHBOARD ISOLASI TENDA DARURAT</h1>
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
                                if($value->nama_kamar == $key->nama_kamar ){    
                            ?>
                            
                            <div class="row">
                                    <div class="col-sm">
                                        <button disabled="disabled" class="btn btn-sm btn-warning"><?= $key->no_bed ?></button>
                                        
                                        <?php foreach ($pasien as $p ) { 
                                            if($p->no_bed == $key->no_bed and $p->nama_kamar == $value->nama_kamar){    
                                        ?>
                                                    <?php if($p->jk == 'P' and $p->status_pasien == 'suspect'){ ?>
                                                        <button id="det" data-target="#exampleModal" data-toggle="modal" data-nama="<?= $p->nm_pasien?>" data-almt="<?= $p->alamat?>" class="btn btn-sm btn-primary"><?= $p->jk ?></button>
                                                        <button disabled="disabled" class="btn btn-sm btn-danger"><?= $p->status_pasien ?></button>

                                                    <?php } elseif($p->jk == 'P' and $p->status_pasien == 'confirm'){ ?>
                                                        <button id="det" data-toggle="modal" data-target="#exampleModal" data-nama="<?= $p->nm_pasien?>" data-almt="<?= $p->alamat?>" class="btn btn-sm btn-primary"><?= $p->jk ?></button>
                                                        <button disabled="disabled" class="btn btn-sm btn-success"><?= $p->status_pasien ?></button>

                                                    <?php } elseif($p->jk == 'L' and $p->status_pasien == 'suspect'){?>
                                                        <button id="det" data-target="#exampleModal" data-toggle="modal" data-nama="<?= $p->nm_pasien?>" data-almt="<?= $p->alamat?>" class="btn btn-sm btn-info"><?= $p->jk ?></button>
                                                        <button disabled="disabled" class="btn btn-sm btn-danger"><?= $p->status_pasien ?></button>

                                                    <?php }elseif($p->jk == 'L' and $p->status_pasien == 'confirm'){?>
                                                        <button id="det" data-target="#exampleModal" data-toggle="modal" data-nama="<?= $p->nm_pasien?>" data-almt="<?= $p->alamat?>" class="btn btn-sm btn-info"><?= $p->jk ?></button>
                                                        <button disabled="disabled" class="btn btn-sm btn-success"><?= $p->status_pasien ?></button>

                                                    <?php }elseif($p->status_bed == 0) { ?>
                                                        <button disabled="disabled" class="btn btn-sm btn-light">N/A</button>
                                                    <button disabled="disabled" class="btn btn-sm btn-light">N/A</button>
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

<!-- Modal Detail-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Pasien</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <span>Nama Pasien</span>
            <input type="text" name="nm_pasien" id="nm_pasien" disabled class="form-control">
            <span>Alamat</span>
            <input type="text" name="alamat" id="alamat" disabled class="form-control">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
    $(document).ready(function () {
        $(document).on('click', '#det', function () {
            var nama = $(this).data('nama');
            var alamat = $(this).data('almt');

            $('#nm_pasien').val(nama);
            $('#alamat').val(alamat);
        })
    });
</script>


