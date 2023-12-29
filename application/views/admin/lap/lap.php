<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preview Laporan Covid</title>
</head>
<style>
    hr {
        border: 3px solid black;
        }
</style>
<body>
    <h3><center> LAPORAN PASIEN COVID-19 <br> RSU FASTABIQ SEHAT PKU MUHAMMADIYAH PATI </center></h3> <p> <center> Jl. Raya Pati-Tayu Km. 03 Tambaharjo, Pati Pati, Jawa Tengah, Indonesia 59151. Phone: (0295) 4199008. Fax: (0295) 4101177. </center></p>
    <hr solid border="5">
    
    <br>
    <div style="page-break-after:always;">
        <?php if($stts == 'confirm'){ ?>
               <p><b>
                Total Pasien Confirm Hingga Saat Ini &nbsp;&nbsp; : <?= $totKonfirm->num_rows()?> </b><br>
                Total Pasien Confirm Sedang Di Rawat &nbsp;&nbsp; : <?= $konRawat->num_rows()?> <br>
                Total Pasien Confirm Di Perbolehkan Pulang &nbsp;&nbsp; : <?= $konbp->num_rows()?> <br>
                Total Pasien Confirm Meninggal &nbsp;&nbsp; : <?= $konmgl->num_rows()?> <br>
                Total Pasien Confirm Di Rujuk &nbsp;&nbsp; : <?= $konrjk->num_rows()?> <br>
                Total Pasien Confirm Isolasi Mandiri &nbsp;&nbsp; : <?= $isoman->num_rows()?> <br>
                Total Pasien Confirm Pulang Permintaan Sendiri &nbsp;&nbsp; : <?= $konaps->num_rows()?> <br>
                Total Pasien Confirm Lanjut Ranap non Isolasi (swab evaluasi negatif) &nbsp;&nbsp; : <?= $noniso->num_rows()?> <br>
                Total Pasien Confirm Yang Isolasi Karantina &nbsp;&nbsp; : <?= $karantina->num_rows()?> <br>
               </p>
        <?php  } elseif ($stts == 'discarded') { ?>
                <p><b>
                Total Pasien Discarded Hingga Saat Ini &nbsp;&nbsp; : <?= $totdis->num_rows()?> </b><br>
                Total Pasien Discarded Di Perbolehkan Pulang &nbsp;&nbsp; : <?= $disbp->num_rows()?> <br>
                Total Pasien Discarded Meninggal &nbsp;&nbsp; : <?= $dismgl->num_rows()?> <br>
                Total Pasien Discarded Di Rujuk &nbsp;&nbsp; : <?= $disrjk->num_rows()?> <br>
                Total Pasien Discarded Pulang Permintaan Sendiri &nbsp;&nbsp; : <?= $disaps->num_rows()?> <br>
                Total Pasien Discarded Isolasi Mandiri &nbsp;&nbsp; : <?= $disisoman->num_rows()?> <br>
                Total Pasien Dinyatakan Discarded, Pindah Ranap Biasa &nbsp;&nbsp; : <?= $disin->num_rows()?> <br>
               </p>
        <?php  } elseif ($stts == 'suspect') { ?>
            <p>
                <b>(Catatan : Pasien yang di suspect kan, hasil swab belum jadi) <br>
                    Total Suspect Baru Hari Ini &nbsp;&nbsp; : <?= $totsus->num_rows()?> <br>
                </b>
                    Total Pasien Suspect Di Rawat Inap Hari Ini &nbsp;&nbsp; : <?= $sustdy->num_rows()?> <br>
                    Total Pasien Suspect Di Rawat Jalan Hari Ini &nbsp;&nbsp; : <?= $susrajal->num_rows()?> <br>
                    Total Pasien Suspect Di Rawat Inap &nbsp;&nbsp; : <?= $susranap->num_rows()?> <br>
                    Total Pasien Suspect Di Rujuk &nbsp;&nbsp; : <?= $susrjk->num_rows()?> <br>
                    Total Pasien Suspect Pulang Atas Permintaan Sendiri &nbsp;&nbsp; : <?= $susaps->num_rows()?> <br>
                    Total Pasien Suspect Isolasi Mandiri &nbsp;&nbsp; : <?= $susisoman->num_rows()?> <br>
            </p>
        <?php }elseif($stts == 'inkonklusif') { ?>   
            <p><b>
                Total Pasien Inkonklusif Hingga Saat Ini &nbsp;&nbsp; : <?= $totin->num_rows()?> </b><br>
                Total Pasien Inkonklusif Meninggal &nbsp;&nbsp; : <?= $insmgl->num_rows()?> <br>
                Total Pasien Inkonklusif Pulang Atas Permintaan Sendiri &nbsp;&nbsp; : <?= $inaps->num_rows()?> <br>
            </p>
        <?php } elseif($stts == ''){ ?>    
            <table width="100%">
                <tr>
                    <td>
                        <p><b>
                            Total Pasien Confirm Hingga Saat Ini &nbsp;&nbsp; : <?= $totKonfirm->num_rows()?> </b><br>
                            Total Pasien Confirm Sedang Di Rawat &nbsp;&nbsp; : <?= $konRawat->num_rows()?> <br>
                            Total Pasien Confirm Di Perbolehkan Pulang &nbsp;&nbsp; : <?= $konbp->num_rows()?> <br>
                            Total Pasien Confirm Meninggal &nbsp;&nbsp; : <?= $konmgl->num_rows()?> <br>
                            Total Pasien Confirm Di Rujuk &nbsp;&nbsp; : <?= $konrjk->num_rows()?> <br>
                            Total Pasien Confirm Isolasi Mandiri &nbsp;&nbsp; : <?= $isoman->num_rows()?> <br>
                            Total Pasien Confirm Pulang Permintaan Sendiri &nbsp;&nbsp; : <?= $konaps->num_rows()?> <br>
                            Total Pasien Confirm Lanjut Ranap non Isolasi (swab evaluasi negatif) &nbsp;&nbsp; : <?= $noniso->num_rows()?> <br>
                            Total Pasien Confirm Yang Isolasi Karantina &nbsp;&nbsp; : <?= $karantina->num_rows()?> <br>
                        </p>
                    </td>
                    <td>
                        <p><b>
                            Total Pasien Discarded Hingga Saat Ini &nbsp;&nbsp; : <?= $totdis->num_rows()?> </b><br>
                            Total Pasien Discarded Di Perbolehkan Pulang &nbsp;&nbsp; : <?= $disbp->num_rows()?> <br>
                            Total Pasien Discarded Meninggal &nbsp;&nbsp; : <?= $dismgl->num_rows()?> <br>
                            Total Pasien Discarded Di Rujuk &nbsp;&nbsp; : <?= $disrjk->num_rows()?> <br>
                            Total Pasien Discarded Pulang Permintaan Sendiri &nbsp;&nbsp; : <?= $disaps->num_rows()?> <br>
                            Total Pasien Discarded Isolasi Mandiri &nbsp;&nbsp; : <?= $disisoman->num_rows()?> <br>
                            Total Pasien Dinyatakan Discarded, Pindah Ranap Biasa &nbsp;&nbsp; : <?= $disin->num_rows()?> <br>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>
                            <b>(Catatan : Pasien yang di suspect kan, hasil swab belum jadi) <br>
                                Total Suspect Baru Hari Ini &nbsp;&nbsp; : <?= $totsus->num_rows()?> <br>
                            </b>
                                Total Pasien Suspect Di Rawat Inap Hari Ini &nbsp;&nbsp; : <?= $sustdy->num_rows()?> <br>
                                Total Pasien Suspect Di Rawat Jalan Hari Ini &nbsp;&nbsp; : <?= $susrajal->num_rows()?> <br>
                                Total Pasien Suspect Di Rawat Inap &nbsp;&nbsp; : <?= $susranap->num_rows()?> <br>
                                Total Pasien Suspect Di Rujuk &nbsp;&nbsp; : <?= $susrjk->num_rows()?> <br>
                                Total Pasien Suspect Pulang Atas Permintaan Sendiri &nbsp;&nbsp; : <?= $susaps->num_rows()?> <br>
                                Total Pasien Suspect Isolasi Mandiri &nbsp;&nbsp; : <?= $susisoman->num_rows()?> <br>
                        </p>
                    </td>
                    <td>
                        <p><b>
                            Total Pasien Inkonklusif Hingga Saat Ini &nbsp;&nbsp; : <?= $totin->num_rows()?> </b><br>
                            Total Pasien Inkonklusif Meninggal &nbsp;&nbsp; : <?= $insmgl->num_rows()?> <br>
                            Total Pasien Inkonklusif Pulang Atas Permintaan Sendiri &nbsp;&nbsp; : <?= $inaps->num_rows()?> <br>
                        </p>
                    </td>
                </tr>
            </table>
        <?php }  ?>    
    </div>
    <p> <center> <b> DATA PASIEN COVID19 </b></center></p>
    <?php if($tglB != ''){ ?>
    <p> <center> Dari Tanggal <?= date_indo($tglA) ?> Sampai <?= date_indo($tglB)?> </center></p> <br>
    <?php }else{?>
        <p> <center>Tanggal <?= date_indo($tglA) ?> </center></p> <br>
    <?php } ?>
    <table width="100%" border="1px" >
        <thead>
            <tr>
                <th>NO. </th>
                <th>TANGGAL</th>
                <th>NAMA</th>
                <th>ALAMAT</th>
                <th>NIK</th>
                <th>NO. TELP</th>
                <th>TANGGAL MASUK</th>
                <th>KET. </th>
                <th>PULANG </th>
                <th>TANGGAL PULANG</th>
                <th>RUJUK EX </th>
            </tr>
        </thead>
        <tbody>
        <?php 
            $no=1;
            foreach ($lapResult as $hasil ) {
        ?>
            <tr>
                <td><?= $no++?></td>
                <td><?= date('d F Y', strtotime($hasil->tgl_masuk))?></td>
                <td><?= $hasil->nm_pasien?></td>
                <td><?= $hasil->almt?></td>
                <td><?= $hasil->no_ktp?></td>
                <td><?= $hasil->no_tlp?></td>
                <td><?= date('d F Y', strtotime($hasil->tgl_masuk))?></td>
                <td><?= $hasil->status_pasien?></td>
                <td><?= $hasil->status_plg?></td>
                <td><?= date('d F Y', strtotime($hasil->tgl_pulang))?></td>
                <td><?= $hasil->nama_rs?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</body>
</html>