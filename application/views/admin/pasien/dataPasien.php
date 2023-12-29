<section class="section">
    <div class="section-header">
        <h1>Data Pasien COVID19</h1>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="card card-danger">
                <div class="card-header">
                    <h4>Form Tambah Pasien COVID19</h4>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('pasien/addPasien')?>" method="post">
                        <div class="form-group">
                            <label for="">No RM</label>
                            <input type="text" name="no_rkm_medis" id="no_rkm_medis" class="form-control form-control-sm" autocomplete="off" >
                        </div>
                        <div class="form-group">
                            <label for="">NIK</label>
                            <input type="text" name="no_ktp" id="no_ktpe" class="form-control form-control-sm" autocomplete="off" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Nama Pasien</label>
                            <input type="text" name="nm_pasien" id="nm_pasiene" class="form-control form-control-sm" autocomplete="off" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Alamat</label>
                            <input type="text" name="alamat" id="alamate" class="form-control form-control-sm" autocomplete="off" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Tempat Lahir</label>
                            <input type="text" name="tmp_lahir" id="tmp_lahire" class="form-control form-control-sm" autocomplete="off" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Lahir</label>
                            <input type="date" name="tgl_lahir" id="tgl_lahire" class="form-control form-control-sm" autocomplete="off" readonly>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="tgl_masuk" id="tgl_masuk" class="form-control form-control-sm" value="<?= date('Y-m-d H:i:s')?>" readonly>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="jns_pr" id="jns_pr" class="form-control form-control-sm" value="ranap" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">No Telp</label>
                            <input type="text" name="no_telp" id="no_telpe" class="form-control form-control-sm" autocomplete="off" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Jenis Kelamin</label>
                            <input type="text" name="jk" id="jke" class="form-control form-control-sm" autocomplete="off" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Rujukan</label>
                            <select name="rujukan" id="rujukan" class="form-control">
                                <option value="" disabled selected >-- Pilih Rujukan --</option>
                                <option value="datang sendiri">Datang Sendiri</option>
                                <option value="rujuk internal">Rujuk Internal</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Status Pasien</label>
                            <select name="status_pasien" id="status_pasien" class="form-control form-control-sm" required>
                                <option value="" selected disabled> -- pilih status pasien --</option>
                                <option value="suspect">Suspect</option>
                                <option value="confirm">Confirm</option>
                                <option value="probable">Probable</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Ruangan</label>
                            <select name="id_kamar" id="id_kamar" class="form-control js-example-basic-single" >
                                <option value="" disabled selected> -- Pilih Kamar --</option>
                               
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">BED</label>
                            <select name="id_bed" id="id_bed" class="form-control js-example-basic-single">
                                    <option value=""> -- pilih bed --</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Diagnosa</label>
                            <input type="text" name="diagnosa" id="diagnosa" class="form-control form-control-sm" autocomplete="off" required>
                        </div>
                        
                        <input type="submit" value="Simpan Data Pasien" class="btn btn-sm btn-danger btn-block">
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card card-danger">
                <!-- <div class="card-header"> -->
                    <!-- <a href="<?= base_url()?>pasien/addPasien" class="btn btn-primary btn-sm"><i class="far fa-plus-square"></i> Tambah Pasien Covid19</a> -->
                <!-- </div> -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table1" >
                            <thead>
                                <tr>
                                    <th>No. </th>
                                    <th>No. RM</th>
                                    <th>Nama Pasien</th>
                                    <th>Alamat</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Jenis Klamin</th>
                                    <th>Status</th>
                                    <th>*</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no=1;
                                    foreach($dataPasien as $key) {
                                ?>
                                <tr>
                                    <td><?= $no++?>. </td>
                                    <td><?= $key->no_rkm_medis ?></td>
                                    <td><?= $key->nm_pasien ?></td>
                                    <td><?= $key->alamat ?></td>
                                    <td><?= date_indo($key->tgl_lahir) ?></td>
                                    <td><?php if($key->jk == 'P'){
                                        echo "Perempuan";
                                    }else {
                                        echo "Laki-laki";
                                    }
                                    
                                    ?></td>
                                    <td><?php
                                        if($key->status_pasien == 'suspect'){
                                        ?>
                                            <button id="upSuspect"  class="btn btn-success btn-block btn-sm" data-toggle ="modal"
                                            data-target="#ModalSuscpect"
                                            data-id="<?= $key->no_rkm_medis?>"
                                            data-status_pasien="<?= $key->status_pasien?>"
                                            data-idbed="<?= $key->id_bed?>"
                                            data-tglm="<?= $key->tgl_masuk?>"
                                            >Suspect</button>
                                        <?php
                                        }elseif($key->status_pasien == 'confirm'){ ?>
                                        <button id="upSuspect"  class="btn btn-danger btn-block btn-sm" data-toggle ="modal"
                                            data-target="#ModalSuscpect"
                                            data-id="<?= $key->no_rkm_medis?>"
                                            data-idbed="<?= $key->id_bed?>"
                                            data-tglm="<?= $key->tgl_masuk?>"
                                            data-status_pasien="<?= $key->status_pasien?>">Confirm</button>
                                        <?php
                                        }elseif($key->status_pasien == 'pulang'){ ?>
                                        <button  class="btn btn-info btn-block btn-sm">Pulang</button>
                                        <?php
                                            }elseif($key->status_pasien == 'discarded'){
                                        ?>
                                            <button  class="btn btn-info btn-block btn-sm">Discarded </button>
                                        <?php
                                            }elseif($key->status_pasien == 'probable'){
                                        ?>
                                            <button  class="btn btn-dark btn-block btn-sm">Probable </button>
                                        <?php
                                            }elseif($key->status_pasien == 'inkonklusif'){
                                        ?>
                                            <button  class="btn btn-dark btn-block btn-sm">Inkonklusif </button>
                                        <?php
                                            }
                                        ?>
                                    </td>
                                    <td>
                                            <button id="pindah" class="btn btn-sm btn-warning" title="Pidah Kamar" data-toggle="modal" data-target="#PindahKamar"
                                            data-id="<?= $key->no_rkm_medis?>"
                                            data-idbed="<?= $key->id_bed?>"
                                            data-status_pasien="<?= $key->status_pasien?>"
                                            data-jk="<?= $key->jk?>"
                                            ><i class="fas fa-procedures"></i></button>
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
</section>

<!-- modal Update -->
<div class="modal fade" tabindex="-1" role="dialog" id="ModalSuscpect">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Status Pasien</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('pasien/upPasien')?>" method="post">
                        <input type="hidden" name="no_rkm_medis" id="no_rkm_medisS" class="form-control" autocomplete="off" required>
                        <input type="hidden" name="tgl_confirm" id="tgl_confirm" class="form-control" value="<?= date('Y-m-d H:i:s')?>" autocomplete="off" required>
                        <input type="hidden" name="tgl_masuk" id="tgl_masukS" class="form-control" value="" autocomplete="off" required>
                        <input type="hidden" name="idbed" id="idbedS" class="form-control"  autocomplete="off" required>
                    <div class="form-group" id="sp">
                        <label for="">Status Pasien</label>
                        <select name="status_pasien" id="status_pasienS" class="form-control form-control-sm">
                            <option value="" selected disabled> -- pilih status pasien --</option>
                            <option value="suspect">Suspect</option>
                            <option value="confirm">Confirm</option>
                            <option value="inkonklusif">Inkonklusif</option>
                            <option value="discarded">Discarded</option>
                        </select>
                    </div>
                    <div id="ink">
                        <label for="">Status Pulang</label>
                            <select name="status_plg_ink" id="status_plg_ink" class="form-control">
                                <option value="" disabled selected> -- Pilih Status Pulang --</option>
                                <option value="meninggal">Meninggal</option>
                                <option value="pulang aps">Pulang APS</option>
                            </select>                
                    </div>
                    <div id="ket">
                        <div class="form-group">
                            <label for="">Keterangan Discarded</label>
                            <input type="text" name="ket_discarded" id="ket_discarded" class="form-control form-control-sm" autocomplete="off">
                        </div>
                    </div>
                    <div id="puls">
                        <label for="">Status Pulang</label>
                        <select name="status_plg" id="status_plg" class="form-control">
                            <option value="" selected> -- Pilih Status Pulang --</option>
                            <option value="meninggal">Meninggal</option>
                            <option value="pulang aps">Pulang APS</option>
                            <option value="blpc">Pulang Izin Dokter </option>
                            <option value="rujukex">Rujuk External</option>
                            <option value="isomandiri">Isolasi Mandiri (Rumah)</option>
                            <option value="ranap non iso">Ranap Non Iso</option>
                            <option value="isoex">Isolasi External</option>
                        </select>
                    </div>
                    <div id="pulss">
                        <label for="">Status Pulang</label>
                        <select name="status_plgs" id="status_plgs" class="form-control">
                            <option value="" selected> -- Pilih Status Pulang --</option>
                            <option value="meninggal">Meninggal</option>
                            <option value="pulang aps">Pulang APS</option>
                            <option value="rujukex">Rujuk External</option>
                            <option value="isomandiri">Isolasi Mandiri (Rumah)</option>
                            <option value="ranap non iso">Ranap Non Iso</option>
                        </select>
                    </div>
                    <div id="pulsd">
                        <label for="">Status Pulang</label>
                        <select name="status_plgd" id="status_plgd" class="form-control">
                            <option value="" selected> -- Pilih Status Pulang --</option>
                            <option value="meninggal">Meninggal</option>
                            <option value="pulang aps">Pulang APS</option>
                            <option value="blpc">Pulang Izin Dokter </option>
                            <option value="rujukex">Rujuk External</option>
                            <option value="isomandiri">Isolasi Mandiri (Rumah)</option>
                            <option value="ranap non iso">Ranap Non Iso</option>
                            <option value="rujukin">Rujuk Internal</option>
                            <option value="isoex">Isolasi External</option>
                        </select>
                    </div>
                    <div id="rujuk">
                        <label for="">Rumah Sakit</label>
                        <select name="rujuk_ex" id="rujuk_ex" class="form-control">
                            <option value="" disabled selected> -- Pilih Rumah Sakit Rujukan --</option>
                            <?php
                                foreach ($rsu as $rs) {
                            ?>
                                <option value="<?= $rs->id_rs?>" > <?= $rs->nama_rs?> </option>
                            <?php } ?>
                            <option value="lain" > Lain Lain </option>
                        </select>
                    </div>
                    <div id="lain">
                        <div class="form-group">
                            <label for="">Rujukan Lain</label>
                            <input type="text" name="rujuk_lain" id="rujuk_lain" class="form-control form-control-sm" autocomplete="off">
                        </div>
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Update Status Pasien</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
</div>

<!-- modal pindah kamar -->

<!-- Modal -->
<div class="modal fade" id="PindahKamar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pindah Kamar Pasien Covid19</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('pasien/pindahKamar')?>" method="post">
                            <input type="hidden" name="no_rkm_medis" id="no_rkm_medis_upd">
                            <input type="hidden" name="id_bed_lama" id="id_bed_lama">
                            <input type="hidden" name="jk_upd" id="jk_upd">
                            <input type="hidden" name="status_pasien_upd" id="status_pasien_upd">
            <div class="form-group">
                <label for="">Ruangan</label>
                <select name="id_kamar_upd" id="id_kamar_upd" class=" js-example-basic-single" >
                    <option value="" disabled selected> -- Pilih Kamar --</option>
                    
                </select>
            </div>
            <div class="form-group">
                <label for="">BED</label>
                <select name="id_bed_upd" id="id_bed_upd" class=" js-example-basic-single">
                        <option value=""> -- pilih bed --</option>
                </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>


<script>
    // $('#id_bed').hide();
    $(document).ready(function () {
       $('#no_rkm_medis').autocomplete({
           source : "<?= base_url('pasien/getNoRm');?>",
           select : function (event, ui) {
            $.ajax({
                url : "<?= base_url('pasien/getDataPasien')?>",
                data: {
                    no_rkm_medis : ui.item.value
                },
                type : 'post',
                dataType : 'json',
                
                success : function (data) 
                {
                    console.log(data);
                    $('#nm_pasiene').val(data.nm_pasien);
                    $('#alamate').val(data.alamat);
                    $('#tmp_lahire').val(data.tmp_lahir);
                    $('#tgl_lahire').val(data.tgl_lahir);
                    $('#jke').val(data.jk);
                    $('#no_ktpe').val(data.no_ktp);
                    $('#no_telpe').val(data.no_tlp);
                }
            });
           }
       });
       
    //    chained dropdown
       $('#status_pasien').change(function() {
           var id = $(this).val();
           var jk = $('#jke').val();
           $.ajax({
                url : "<?= base_url('pasien/getKamar')?>",
                method : "post",
                data : {id : id, jk: jk},
                dataType : "json",
                success: function (res) {
                    // console.log(res);
                    var html = '';
                    var i;
                    for(i=0; i< res.length; i++ ){
                        html +='<option value="'+ res[i].id_kamar+'">'+res[i].nama_kamar+'</option>';
                    }
                    $('#id_kamar').html(html);
                }

           });
       });

       $('#id_kamar').change(function () {
          var id_kamar = $(this).val(); 
        //   console.log(id_kamar);
            $.ajax({
                method : "post",
                url: "<?= base_url('pasien/getBed')?>",
                data :{id_kamar:id_kamar},
                dataType: "json",
                success: function (ress) {
                    console.log(ress);
                    var html = '';
                    var i;
                    for(i=0; i< ress.length; i++ ){
                        html +='<option value="'+ ress[i].id_bed+'">'+ress[i].no_bed+'</option>';
                    }
                    $('#id_bed').html(html);
                }


            });
       });

       //chained pindah kamar
       $('#id_kamar_upd').change(function () {
          var id_kamar = $(this).val(); 
        //   console.log(id_kamar);
            $.ajax({
                method : "post",
                url: "<?= base_url('pasien/getBed')?>",
                data :{id_kamar:id_kamar},
                dataType: "json",
                success: function (ress) {
                    console.log(ress);
                    var html = '';
                    var i;
                    for(i=0; i< ress.length; i++ ){
                        html +='<option value="'+ ress[i].id_bed+'">'+ress[i].no_bed+'</option>';
                    }
                    $('#id_bed_upd').html(html);
                }


            });
       });

       //end chaied
        $(document).on('click', '#upSuspect', function () {
            var id = $(this).data('id');    
            var status_pasien = $(this).data('status_pasien');    
            var idbed = $(this).data('idbed');    
            var tglm = $(this).data('tglm');    
            console.log(id);
            $('#no_rkm_medisS').val(id);
            $('#no_rkm_medisS').val(id);
            $('#idbedS').val(idbed);
            $('#tgl_masukS').val(tglm);
        });

        $(document).on('click', '#upConfirm', function () {
            var id = $(this).data('id');    
            var status_pasien = $(this).data('status_pasien');    
            var id_bed = $(this).data('idbed');    
            console.log(id);
            $('#no_rkm_medisC').val(id);
            $('#idbedC').val(id_bed);
            $('#status_pasienC').val(status_pasien);
        });

        $(document).on('click', '#pindah', function () {
            var id = $(this).data('id');    
            var status_pasien = $(this).data('status_pasien');    
            var id_bed = $(this).data('idbed');    
            var jk = $(this).data('jk');    
            // console.log(id);
            $('#no_rkm_medis_upd').val(id);
            $('#id_bed_lama').val(id_bed);
            $('#status_pasien_upd').val(status_pasien);
            $('#jk_upd').val(jk);

            $.ajax({
                url : "<?= base_url('pasien/getKamar')?>",
                method : "post",
                data : {id : status_pasien, jk: jk},
                dataType : "json",
                success: function (res) {
                        console.log(res);
                        var html = '';
                        var i;
                        for(i=0; i< res.length; i++ ){
                            html +='<option value="'+ res[i].id_kamar+'">'+res[i].nama_kamar+'</option>';
                        }
                        $('#id_kamar_upd').html(html);
                    }

            });
        });

        $('#ket').hide();
        $('#puls').hide();
        $('#pulss').hide();
        $('#pulsd').hide();
        $('#rujuk').hide();
        $('#lain').hide();
        $('#ink').hide();
        
        $('#pulss').hide();

        $('#status_pasienS').change(function () {
            if($('#status_pasienS').val() == 'discarded')
            {
                $('#ket').hide();
                $('#puls').hide();
                $('#pulss').hide();
                $('#pulsd').show();
                $('#rujuk').hide();
                $('#lain').hide();
                $('#ink').hide();
            }
        });

        $('#status_pasienS').change(function () {
            if($('#status_pasienS').val() == 'confirm')
            {
                $('#ket').hide();
                $('#puls').show();
                $('#pulss').hide();
                $('#pulsd').hide();
                $('#rujuk').hide();
                $('#lain').hide();
                $('#ink').hide();
            }
        });

        $('#status_pasienS').change(function () {
            if($('#status_pasienS').val() == 'suspect')
            {
                $('#ket').hide();
                $('#pulc').hide();
                $('#pulss').show();
                $('#pulsd').hide();
                $('#rujuk').hide();
                $('#lain').hide();
                $('#ink').hide();
            }
        });

        $('#status_pasienS').change(function () {
            if($('#status_pasienS').val() == 'inkonklusif')
            {
                $('#ket').hide();
                $('#puls').hide();
                $('#pulss').hide();
                $('#pulsd').hide();
                $('#rujuk').hide();
                $('#lain').hide();
                $('#ink').show();
            }
        });

        $('#status_pasienS').change(function () {
            if($('#status_pasienS').val() == 'pulang')
            {
                $('#pulsd').show();
                $('#puls').hide();
                $('#ket').hide();
                $('#rujuk').hide();
                $('#lain').hide();
                $('#ink').hide();
            }
        });

        $('#status_plg').change(function () {
            if($('#status_plg').val() == 'rujukex')
            {
                $('#rujuk').show();
                $('#lain').hide();
            }else{
                $('#rujuk').hide();
                $('#lain').hide();
            }
        })

        $('#status_plgd').change(function () {
            if($('#status_plgd').val() == 'rujukex')
            {
                $('#rujuk').show();
                $('#lain').hide();
            }else{
                $('#rujuk').hide();
                $('#lain').hide();
            }
        })
        $('#status_plgs').change(function () {
            if($('#status_plgs').val() == 'rujukex')
            {
                $('#rujuk').show();
                $('#lain').hide();
            }else{
                $('#rujuk').hide();
                $('#lain').hide();
            }
        })

        $('#status_plgd').change(function () {
            if($('#status_plgd').val() == 'rujukin')
            {
                $('#ket').show();
            }else{
                $('#ket').hide();
            }
        })

        $('#rujuk_ex').change(function () {
            if($('#rujuk_ex').val() == 'lain')
            {
               $('#lain').show();
            }
        })
        
    });
</script>