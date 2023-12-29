<section class="section">
    <div class="section-header">
        <h1>Data Kamar</h1>
    </div>

    <div class="row">
        <div class="col-lg-4">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Detail Kamar</h4>
                    <div class="card-body">

                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card card-primary">
                <div class="card-header">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Tambah Kamar</button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table1">
                            <thead>
                                <tr>
                                    <th>No. </th>
                                    <th>Nama Kamar</th>
                                    <th>Kpasitas</th>
                                    <th>Tempat</th>
                                    <th> * </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no =1;
                                    foreach ($getKamar as $key) {
                                ?>
                                <tr>
                                    <td><?= $no++?></td>
                                    <td><?= $key->nama_kamar?></td>
                                    <td><?= $key->kapasitas?> Bed</td>
                                    <td><?= $key->tempat?></td>
                                    <td>
                                        <button id="Edit" class="btn btn-icon btn-sm btn-warning" title="Edit Data Kamar"
                                        data-toggle="modal"
                                        data-target="#ModalEdit"
                                        data-id = "<?= $key->id_kamar?>"
                                        data-nama_kamar = "<?= $key->nama_kamar?>"
                                        data-kapasitas = "<?= $key->kapasitas?>"
                                        data-tempat = "<?= $key->tempat?>"
                                        ><i class="far fa-edit"></i></button>
                                        <a href="<?= base_url('ruang/delKamar/'). $key->id_kamar?>" onclick="return confirm('Apa anda yakin menghapus data ini?')" class="btn btn-icon btn-danger btn-sm" title="Hapus Data Kamar"><i class="fas fa-trash"></i></a>
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
                <h5 class="modal-title">Form Tambah Kamar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('ruang/addKamar')?>" method="post">
                    <div class="form-group">
                        <label for="">Nama Kamar</label>
                        <input type="text" name="nama_kamar" id="nama_kamar" class="form-control" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="">Kapasitas</label>
                        <input type="text" name="kapasitas" id="kapasitas" class="form-control" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="">Tempat</label>
                        <input type="text" name="tempat" id="tempat" class="form-control" autocomplete="off" required>
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Tambah Data Kamar</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
</div>
<!-- modal edit -->
<div class="modal fade" tabindex="-1" role="dialog" id="ModalEdit">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Edit Kamar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('ruang/editKamar')?>" method="post">
                    <div class="form-group">
                        <label for="">Kode Kamar</label>
                        <input type="hidden" name="id_kamar" id="id_kamare" class="form-control" autocomplete="off" readonly required>
                    </div>
                    <div class="form-group">
                        <label for="">Nama Kamar</label>
                        <input type="text" name="nama_kamar" id="nama_kamare" class="form-control" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="">Kapasitas</label>
                        <input type="text" name="kapasitas" id="kapasitase" class="form-control" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="">Tempat</label>
                        <input type="text" name="tempat" id="tempate" class="form-control" autocomplete="off" required>
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan Data Kamar</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $(document).on('click','#Edit', function () {
            var id = $(this).data('id');
            var nama_kamar = $(this).data('nama_kamar');
            var kapasitas = $(this).data('kapasitas');
            var tempat = $(this).data('tempat');
            console.log(id);
            $('#id_kamare').val(id);
            $('#nama_kamare').val(nama_kamar);
            $('#kapasitase').val(kapasitas);
            $('#tempate').val(tempat);
        })
    })
</script>