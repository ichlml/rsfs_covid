<section class="section">
    <div class="section-header"> <h1>Rencana Swab</h1> </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-4">
                <div class="card card-primary">
                    <div class="card-header">Form Rencana Swab</div>
                    <div class="card-body">
                        <form action="<?= base_url('pasien/addrenswab')?>" method="post">
                            <div class="form-group">
                                <label for="">No Rekam Medis</label>
                                <input type="text" name="no_rkm_medis" id="no_rkm_medis" class="form-control" autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <label for="">NIK</label>
                                <input type="text" name="nik" id="nike" class="form-control" autocomplete="off" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Nama Pasien</label>
                                <input type="text" name="nm_pasien" id="nm_pasiene" class="form-control" autocomplete="off" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Tempat Lahir</label>
                                <input type="text" name="tmp_lahir" id="tmp_lahire" class="form-control" autocomplete="off" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Tanggal Lahir</label>
                                <input type="date" name="tgl_lahir" id="tgl_lahire" class="form-control" autocomplete="off" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Jenis Kelamin</label>
                                <input type="text" name="jk" id="jke" class="form-control" autocomplete="off" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">No Telp</label>
                                <input type="text" name="no_telp" id="no_telpe" class="form-control" autocomplete="off" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Status Pasien</label>
                                <input type="text" name="stts_pasien" id="stts_pasiene" class="form-control" autocomplete="off" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Tanggal Rencana </label>
                                <input type="date" name="tgl_ren" id="tgl_ren" class="form-control" autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <label for="">Jenis </label>
                                <select name="jns_ren" id="jns_ren" class="form-control" required>
                                    <option value="" disabled selected>-- Pilih Rencana --</option>
                                    <option value="swab">SWAB</option>
                                    <option value="thorax">THORAX</option>
                                </select>
                            </div>
                            <input type="submit" value="Simpan Rencana" class="btn btn-block btn-sm btn-primary">
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
                                        <th>Nama Pasien</th>
                                        <th>Alamat</th>
                                        <th>Status Pasien</th>
                                        <th>Tanggal</th>
                                        <th>Rencana</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $no = 1;
                                    foreach ($rencswab as $key) {
                                ?>
                                    <tr>
                                        <td><?= $no++?></td>
                                        <td><?= $key->nm_pasien?></td>
                                        <td><?= $key->alamat?></td>
                                        <td><?= $key->status_pasien?></td>
                                        <td><?= date_indo($key->tgl_renswab)?></td>
                                        <td><?= $key->jns_ren?></td>
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

<script>
    $(document).ready(function () {
       $('#no_rkm_medis').autocomplete({
           source : "<?= base_url('pasien/getPasiencvd')?>",
           select : function (event, ui) {
            $.ajax({
                url : "<?= base_url('pasien/getDataPasiencvd')?>",
                data: {
                    no_rkm_medis : ui.item.value
                },
                type : 'post',
                dataType : 'json',
                
                success : function (data) 
                {
                    console.log(data);
                    $('#nm_pasiene').val(data.nm_pasien);
                    $('#stts_pasiene').val(data.status_pasien);
                    $('#tmp_lahire').val(data.tmp_lahir);
                    $('#tgl_lahire').val(data.tgl_lahir);
                    $('#jke').val(data.jk);
                    $('#no_ktpe').val(data.no_ktp);
                    $('#no_telpe').val(data.no_tlp);
                }
            });
           }
       }) 
    });
</script>