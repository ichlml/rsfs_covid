<section class="section">
    <div class="section-header">
        <h1>Laporan Pasien Covid Bulanan</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-danger">
                    <div class="card-header">
                        <h4>Filter Laporan</h4>
                    </div>

                    <div class="card-body">
                        <form action="<?= base_url('laporan/lapBulan')?>" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Tanggal Awal</label>
                                    <input type="date" name="tglA" id="tglA" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Tanggal Akhir</label>
                                    <input type="date" name="tglB" id="tglB" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Status Pasien</label>
                                    <select name="status_pasien" id="status_pasien" class="form-control">
                                        <option value=""  selected> -- Pilih Status Pasien --</option>
                                        <option value="suspect">Suspect</option>
                                        <option value="confirm">Confirm</option>
                                        <option value="discarded">Discarded</option>
                                        <option value="inkonklusif">Inkonklusif</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Status Pulang</label>
                                    <select name="status_plg" id="status_plg" class="form-control">
                                        <option value=""  selected> Pilih Status Pulang</option>
                                        <option value="meninggal">Meninggal</option>
                                        <option value="pulang aps">Pulang APS</option>
                                        <option value="blpc">Pulang Izin Dokter </option>
                                        <option value="rujukex">Rujuk External</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                            
                            <button type="submit"  class="btn btn-block btn-sm btn-danger" target="blank">Cetak Laporan !</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>