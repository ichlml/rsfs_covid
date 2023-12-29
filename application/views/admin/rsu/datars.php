<section class="section">
    <div class="section-header">
        <h1>Data Rumah Sakit Rujukan Covid19</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-lg-4">
                <div class="card card-primary">
                    <div class="card-header">Form Rumah Sakit</div>
                    <div class="card-body">
                        <form action="<?= base_url('rumahsakit/addRs')?>" method="post">
                            <div class="form-group">
                                <label for="">Kode Rumah Sakit</label>
                                <input type="text" name="id_rs" id="id_rs" class="form-control form-control-sm" autocomplete="off" >
                            </div>
                            <div class="form-group">
                                <label for="">Nama Rumah Sakit</label>
                                <input type="text" name="nama_rs" id="nama_rs" class="form-control form-control-sm" autocomplete="off" >
                            </div>
                            <div class="form-group">
                                <label for="">Alamat</label>
                                <input type="text" name="alamat" id="alamat" class="form-control form-control-sm" autocomplete="off" >
                            </div>
                            <div class="form-group">
                                <label for="">email</label>
                                <input type="email" name="email" id="email" class="form-control form-control-sm" autocomplete="off" >
                            </div>
                            <div class="form-group">
                                <label for="">Telp</label>
                                <input type="text" name="telp" id="telp" class="form-control form-control-sm" autocomplete="off" >
                            </div>
                            <input type="submit" value="Simpan Data Rumah Sakit" class="btn btn-block btn-sm btn-danger">
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card card-primary">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>No. </th>
                                        <th>Rumah Sakit</th>
                                        <th>Alamat</th>
                                        <th>Email</th>
                                        <th>Telp</th>
                                        <th> * </th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $no =1;
                                foreach ($rsu as $key) { ?>
                                    <tr>
                                        <td><?= $no++?></td>
                                        <td><?= $key->nama_rs?></td>
                                        <td><?= $key->alamat?></td>
                                        <td><?= $key->email?></td>
                                        <td><?= $key->telp?></td>
                                        <td>
                                            <button id="edit" class="btn btn-sm btn-warning btn-block" data-toggle="modal" 
                                            data-target="#modalEdit"
                                            data-id = "<?= $key->id_rs?>"
                                            data-nama_rs = "<?= $key->nama_rs?>"
                                            data-alamat = "<?= $key->alamat?>"
                                            data-email = "<?= $key->email?>"
                                            data-telp = "<?= $key->telp?>"
                                            title="Edit Data Rumah Sakit"><i class="fas fa-edit"></i></button>
                                            <a href="<?= base_url('rumahsakit/delrs/'). $key->id_rs?>" onclick="return confirm('Apa anda yakin menghapus data ini?')" class="btn btn-icon btn-danger btn-sm btn-block" title="Hapus Data Rumah Sakit"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php } ?> 
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- modal Update -->
<div class="modal fade" tabindex="-1" role="dialog" id="modalEdit">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ubah Data Rumah Sakit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('rumahsakit/UpRs')?>" method="post">
                    <div class="form-group">
                        <label for="">Kode Rumah Sakit</label>
                        <input type="text" name="id_rs" id="id_rse" class="form-control form-control-sm" autocomplete="off" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Nama Rumah Sakit</label>
                        <input type="text" name="nama_rs" id="nama_rse" class="form-control form-control-sm" autocomplete="off" >
                    </div>
                    <div class="form-group">
                        <label for="">Alamat</label>
                        <input type="text" name="alamat" id="alamate" class="form-control form-control-sm" autocomplete="off" >
                    </div>
                    <div class="form-group">
                        <label for="">email</label>
                        <input type="email" name="email" id="emaile" class="form-control form-control-sm" autocomplete="off" >
                    </div>
                    <div class="form-group">
                        <label for="">Telp</label>
                        <input type="text" name="telp" id="telpe" class="form-control form-control-sm" autocomplete="off" >
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan Data</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
       $(document).on('click', '#edit', function () {
           var id = $(this).data('id');
           var nama_rs = $(this).data('nama_rs');
           var alamat = $(this).data('alamat');
           var email = $(this).data('email');
           var telp = $(this).data('telp');
           $('#id_rse').val(id);
           $('#nama_rse').val(nama_rs);
           $('#alamate').val(alamat);
           $('#emaile').val(email);
           $('#telpe').val(telp);
       }) ;
    });
</script>