<section class="section">
    <div class="section-header"> <h1>Laporan Bagian</h1> </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-5">
                <div class="card card-danger">
                    <div class="card-header">Filter Laporan Bagian</div>
                    <div class="card-body">
                        <form action="<?= base_url('laporan/ctHari')?>" method="post">
                            <div class="form-group">
                                <label for="">Tanggal</label>
                                <input type="date" name="tgl_masuk" id="tgl_masuk" class="form-control" autocomplete>
                            </div>
                            <div class="form-group">
                                <label for="">Bagian</label>
                                <select name="bagian" id="bagian" class="form-control">
                                    <option value="" selected disabled>-- pilih bagian --</option>
                                    <option value="LT1">Lantai 1</option>
                                    <option value="LT4">Lantai 4</option>
                                    <option value="LT5">Lantai 5</option>=
                                </select>
                            </div>
                            <input type="submit" value="Cetak Laporan!" class="btn btn-block btn-danger btn-sm">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>