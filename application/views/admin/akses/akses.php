<section class="section">
    <div class="section-header">
        <h1>Akses Bed</h1>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-4">
                <div class="card card-danger">
                    <div class="card-header justify-content-center"> <b>Panel Akses Full Bed</b>  </div>
                    <div class="card-body">
                        <form action="<?= base_url('ruang/actAkses')?>" method="post">
                            <div class="from-group">
                                <input type="hidden" name="id_akses" value="<?= $akses->id_akses ?>">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status_akses" id="status_akses1" value="0" <?php if($akses->status_akses == '0') { echo 'checked'; } ?>>
                                        <label class="form-check-label" for="status_akses1">
                                            Tidak Aktif
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status_akses" id="status_akses2" value="1" <?php if($akses->status_akses == '1') { echo 'checked'; } ?>>
                                        <label class="form-check-label" for="status_akses2">
                                            Aktif
                                        </label>
                                    </div>
                            </div>
                            <br>
                                <input type="submit" value="Ubah Akses !" class="btn btn-block btn-danger btn-sm">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>