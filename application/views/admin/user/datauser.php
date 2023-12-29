<section class="section">
    <div class="section-header">
        <h1>Data User</h1>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Tambah User</button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table1">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama </th>
                                    <th>Jenis Kelamin</th>
                                    <th>Username</th>
                                    <th>Level</th>
                                    <th> * </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $no = 1;

                                    foreach ($user as $key) {
                                ?>
                                <tr>
                                    <td><?= $no++?></td>
                                    <td><?= $key->nama_user?></td>
                                    <td><?= $key->jkel?></td>
                                    <td><?= $key->user?></td>
                                    <td><?= $key->level?></td>
                                    <td>
                                        <button id="Edit" class="btn btn-sm btn-icon btn-warning btn-block" title="Edit Data"
                                        data-toggle ="modal"
                                        data-target="#ModalEdit"
                                        data-id = "<?= $key->id_user?>"
                                        data-nama_user = "<?= $key->nama_user?>"
                                        data-jkel = "<?= $key->jkel?>"
                                        data-user = "<?= $key->user?>"
                                        data-pass = "<?= $key->pass?>"
                                        data-level = "<?= $key->level?>"
                                        ><i class="far fa-edit"></i></button>
                                        <a href="<?= base_url('user/delUser/'). $key->id_user?>"  onclick="return confirm('Anda yakin mau menghapus data ini ?')" title="Hapus Data" class="btn btn-icon btn-sm btn-danger btn-block remove"><i class="fas fa-trash"></i></a>
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
                <h5 class="modal-title">Form Tambah User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('user/addUser')?>" method="post">
                    <div class="form-group">
                        <label for="">Nama User</label>
                        <input type="text" name="nama_user" id="nama_user" class="form-control" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="">Jenis Kelamin</label>
                        <select name="jkel" id="jkel" class="form-control" autocomplete="off" required>
                            <option value="" disabled selected> -- Pilih Jenis Kelamin --</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Username</label>
                        <input type="text" name="user" id="user" class="form-control" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="pass" id="pass" class="form-control" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <select name="level" id="level" class="form-control" autocomplete="off" required>
                            <option value="" disabled selected> -- Pilih Level User --</option>
                            <option value="superuser">Super User</option>
                            <option value="admin">Admin</option>
                            <option value="kepala">Kepala</option>
                            <option value="direksi">Direksi</option>
                        </select>
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Tambah Data User</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
</div>
<!-- modal Edit -->
<div class="modal fade" tabindex="-1" role="dialog" id="ModalEdit">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Edit User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('user/editUser')?>" method="post">
                    <div class="form-group">
                        <label for="">Nama User</label>
                        <input type="text" name="nama_user" id="nama_usere" class="form-control" autocomplete="off" required>
                        <input type="hidden" name="id_user" id="id_usere" class="form-control" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="">Jenis Kelamin</label>
                        <select name="jkel" id="jkele" class="form-control" autocomplete="off" required>
                            <option value="" disabled selected> -- Pilih Jenis Kelamin --</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Username</label>
                        <input type="text" name="user" id="usere" class="form-control" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="pass" id="passe" class="form-control" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <select name="level" id="levele" class="form-control" autocomplete="off" required>
                            <option value="" disabled selected> -- Pilih Level User --</option>
                            <option value="superuser">Super User</option>
                            <option value="admin">Admin</option>
                            <option value="kepala">Kepala</option>
                        </select>
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
        $(document).on('click', '#Edit', function() {
            var id = $(this).data('id');
            var nama_user = $(this).data('nama_user');
            var jkel = $(this).data('jkel');
            var user = $(this).data('user');
            var pass = $(this).data('pass');
            var level = $(this).data('level');
            console.log(id);
            $('#id_usere').val(id);
            $('#nama_usere').val(nama_user);
            $('#jkele').val(jkel);
            $('#usere').val(user);
            $('#passe').val(pass);
            $('#levele').val(level);
        })
    })
</script>

