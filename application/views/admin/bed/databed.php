<section class="section">
    <div class="section-header">
        <h1>Data Bed / Kamar</h1>
    </div>

    <div class="row">
        <div class="col-lg-4">
            <div class="card card-primary">
                <div class="card-header justify-content-center">
                    <h4>INFO</h4>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled list-unstyled-border">
                        <li class="media">
                          <img class="mr-3 rounded" width="55" src="<?= base_url('assets/dashboard')?>/assets/img/avatar/avatar-5.png" alt="avatar">
                          <div class="media-body">
                            <div class="float-right"><div class="font-weight-600 text-muted text-small"><?= $countLT4 ?>  Pasien</div></div>
                            <div class="media-title">Lantai 4</div>
                            <div class="mt-1">
                                <div class="budget-price">
                                    <div class="budget-price-square bg-primary" data-width="64%"></div>
                                    <div class="budget-price-label">$68,714</div>
                                </div>
                                <div class="budget-price">
                                    <div class="budget-price-square bg-danger" data-width="43%"></div>
                                    <div class="budget-price-label">$38,700</div>
                                </div>
                            </div>
                          </div>
                        </li>
                        <li class="media">
                          <img class="mr-3 rounded" width="55" src="<?= base_url('assets/dashboard')?>/assets/img/avatar/avatar-4.png" alt="avatar">
                          <div class="media-body">
                            <div class="float-right"><div class="font-weight-600 text-muted text-small"><?= $countigd ?> Pasien</div></div>
                            <div class="media-title">IGD</div>
                            <div class="mt-1">
                              <div class="budget-price">
                                <div class="budget-price-square bg-danger" data-width="<?= $sigd ?>"></div>
                                <div class="budget-price-label"><?= $sigd ?></div>
                              </div>
                              <div class="budget-price">
                                <div class="budget-price-square bg-success" data-width="<?= $cigd ?>"></div>
                                <div class="budget-price-label"><?= $cigd ?></div>
                              </div>
                            </div>
                          </div>
                        </li>
                        <li class="media">
                          <img class="mr-3 rounded" width="55" src="<?= base_url('assets/dashboard')?>/assets/img/avatar/avatar-3.png" alt="avatar">
                          <div class="media-body">
                            <div class="float-right"><div class="font-weight-600 text-muted text-small"><?= $counttd ?> Pasien</div></div>
                            <div class="media-title">Tenda Darurat</div>
                            <div class="mt-1">
                              <div class="budget-price">
                                <div class="budget-price-square bg-danger" data-width="<?= $std ?>"></div>
                                <div class="budget-price-label"><?= $std ?></div>
                              </div>
                              <div class="budget-price">
                                <div class="budget-price-square bg-success" data-width="<?= $ctd ?>"></div>
                                <div class="budget-price-label"><?= $ctd ?></div>
                              </div>
                            </div>
                          </div>
                        </li>
                        <li class="media">
                          <img class="mr-3 rounded" width="55" src="<?= base_url('assets/dashboard')?>/assets/img/avatar/avatar-2.png" alt="avatar">
                          <div class="media-body">
                            <div class="float-right"><div class="font-weight-600 text-muted text-small"><?= $counttb?> Pasien</div></div>
                            <div class="media-title">TB Dosts</div>
                            <div class="mt-1">
                              <div class="budget-price">
                                <div class="budget-price-square bg-danger" data-width="<?= $stb?>"></div>
                                <div class="budget-price-label"><?= $stb?></div>
                              </div>
                              <div class="budget-price">
                                <div class="budget-price-square bg-success" data-width="<?= $ctb?>"></div>
                                <div class="budget-price-label"><?= $ctb?></div>
                              </div>
                            </div>
                          </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Tambah Bed</button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table1">
                            <thead>
                                <tr>
                                    <th>No. </th>
                                    <th>No Bed</th>
                                    <th>Nama Kamar</th>
                                    <th>Tempat</th>
                                    <th>Status Bed</th>
                                    <th> * </th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <?php 
                                    $no = 1;
                                    foreach ($bed as $key) {
                                ?>
                                    <tr>
                                        <td><?= $no++?></td>
                                        <td><?= $key->no_bed?></td>
                                        <td><?= $key->nama_kamar?></td>
                                        <td><?= $key->tempat?></td>
                                        <td><?php
                                            if($key->status_bed == '0'){
                                                echo "Kosong";
                                            }else{
                                                echo "Terisi";
                                            }
                                        ?></td>
                                        <td>
                                            <button id="Edit" class="btn btn-sm btn-icon btn-warning" title="Edit Data Bed" data-toggle="modal" 
                                            data-target="#modalEdit"
                                            data-id = "<?= $key->id_bed?>"
                                            data-no_bed = "<?= $key->no_bed?>"
                                            data-id_kamar = "<?= $key->id_kamar?>"
                                            ><i class="fas fa-edit"></i></button>
                                            <a href="<?= base_url('ruang/delBed/'). $key->id_bed?>" onclick="return confirm('Apa anda yakin menghapus data ini?')" class="btn btn-icon btn-danger btn-sm tombol-hapus" title="Hapus Data Bed"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php
                                    }
                                ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- modal tambah -->
<div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Tambah BED</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('ruang/addBed')?>" method="post">
                    <div class="form-group">
                        <label for="">NO BED</label>
                        <input type="text" name="no_bed" id="no_bed" class="form-control" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="">Nama Kamar</label>
                        <select name="id_kamar" id="id_kamar" class="form-control">
                            <option value="" selected disabled> -- PIlih Kamar --</option>
                            <?php 
                                foreach ($dataKamar as $key):
                            ?>
                            <option value="<?= $key->id_kamar?>" ><?=$key->nama_kamar?></option>
                            <?php 
                                endforeach;
                            ?>
                        </select>
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Tambah Data BED</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
</div>
<!-- modal tambah -->
<div class="modal fade" tabindex="-1" role="dialog" id="modalEdit">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Ubah BED</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('ruang/editBed')?>" method="post">
                    <div class="form-group">
                        <label for="">NO BED</label>
                        <input type="hidden" name="id_bed" readonly id="id_bede" class="form-control" autocomplete="off" required>
                        <input type="text" name="no_bed" id="no_bede" class="form-control" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="">Nama Kamar</label>
                        <select name="id_kamar" id="id_kamare" class="form-control">
                            <option value="" selected disabled> -- PIlih Kamar --</option>
                            <?php 
                                foreach ($dataKamar as $key):
                            ?>
                            <option value="<?= $key->id_kamar?>" ><?=$key->nama_kamar?></option>
                            <?php 
                                endforeach;
                            ?>
                        </select>
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Tambah Data BED</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function () {
    $(document).on('click', '#Edit', function () {
       var id = $(this).data('id'); 
       var no_bed = $(this).data('no_bed'); 
       var id_kamar = $(this).data('id_kamar'); 
        // console.log('no_bed');
       $('#id_bede').val(id);
       $('#no_bede').val(no_bed);
       $('#id_kamare').val(id_kamar);
    });

});
</script>