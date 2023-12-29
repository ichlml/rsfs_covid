<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preview Laporan Covid19 per Bagian</title>
</head>
<style>
    .container{
        font-family : Cambria, Georgia, serif;
        font-size: 12px;
        margin-top: 15px;
    }

    .item{

    }
</style>
<body>
    <h3><center> LAPORAN PASIEN COVID-19 <br> RSU FASTABIQ SEHAT PKU MUHAMMADIYAH PATI </center></h3> <p> <center> Jl. Raya Pati-Tayu Km. 03 Tambaharjo, Pati Pati, Jawa Tengah, Indonesia 59151. Phone: (0295) 4199008. Fax: (0295) 4101177. </center></p>
    <hr solid border="5">
    <p><center>
    Lapor Pergerakan Pasien Suspect Covid 19 / Confirm Covid 19 di 
    <?php if($bag == 'LT1'){
        echo "Lantai 1 (IGD, Tenda Darurat, TB Dosts)";
    }elseif($bag == 'LT4'){
        echo "Lantai 4";
    } elseif($bag == 'LT5'){
        echo "Lantai 5";
    } ?> <br>Pada <?= longdate_indo($tgl) ?></center></p>
    <br>
    <div class="container">
<div style="page-break-after:always;">
    <?php foreach ($data as $key) { 
        if($bag == 'LT1'){
    ?>
       <div class="item"> <p> <b>Kamar <?= $key->nama_kamar?> </b> </p> 
            <?php 
                if($key->tempat == 'IGD'){    
            ?>
                <p>Kapasitas &nbsp;: &nbsp; <?= $kapsigs->tot ?> BED &nbsp;,&nbsp; Terisi &nbsp; : &nbsp; <?= $kapsigs->kosong?> Pasien</p>
            <?php }elseif($key->tempat == 'Tenda Darurat'){ ?>
                <p>Kapasitas &nbsp;: &nbsp; <?= $kapstbd->tot ?> BED &nbsp;,&nbsp; Terisi &nbsp; : &nbsp; <?= $kapstbd->kosong?> Pasien</p>
            <?php }elseif($key->tempat == 'TB DOSTS'){ ?>
                <p>Kapasitas &nbsp;: &nbsp; <?= $tbd->tot ?> BED &nbsp;,&nbsp; Terisi &nbsp; : &nbsp; <?= $tbd->kosong?> Pasien</p>
            <?php } ?>
            <!-- perulangan bed -->
            <?php foreach ($bed as $b) { 
                if($b->nama_kamar == $key->nama_kamar){    
                    ?>
                    <p>BED <b><?=$b->no_bed?> </b> &nbsp; : </p>
                    <!-- perulangan pasien -->
                    <?php foreach ($p as $pp) { 
                        if($pp->id_bed == $b->id_bed and $pp->status_plg == ''){    
                    ?>
                        <p>Nama Pasien &nbsp; :&nbsp; <?= $pp->nm_pasien?></p>
                        <p>No RM &nbsp; :&nbsp; <?= $pp->no_rkm_medis?></p>
                        <p>DX &nbsp; :&nbsp; <?= $pp->diagnosa?></p>
                        <?php } ?>
                    <?php } ?>
                <?php } ?>
            <?php } ?>
        </div>
            <?php   } ?>
    <?php   } 
        if($bag == 'LT4'){
    ?>
        <P><B>REKAP PASIEN BARU DI ISOLASI <?= $bag?></B></P>
        <?php if($pbaru->num_rows() > 0){ ?>
            <?php foreach($pbaru->result() as $new) { 
                if($new->status_plg == null){    
            ?>
                
                <p>
                    Nama : <?= $new->nm_pasien?> <br>
                    Alamat : <?= $new->alamat?> <br>
                    Status : <?= $new->status_pasien?>
                </p>
            <?php } ?>
        <?php } ?>
            <?php }elseif($pbaru->num_rows() < 1){ ?>
                <p>Tidak Ada Pasien Baru</p>
            <?php } ?>
        <p><b>REKAP PASIEN DI RUJUK EXTERNAL</b></p>
            <?php if($lt4rjx->num_rows()> 0){ 
                foreach($lt4rjx->result() as $rjx) {
            ?>
                <p>
                    Nama : <?= $rjx->nm_pasien?> <br>
                    Alamat : <?= $rjx->alamat?> <br>
                    Status : <?= $rjx->status_pasien?>
                </p>
                <?php } ?>  
            <?php }else{ ?>  
                <p>Tidak Ada Pasien Di Rujuk External</p>
            <?php } ?>  
        <p><b>REKAP PASIEN DI PULANG APS</b></p>
            <?php if($lt4aps->num_rows()> 0){ 
                foreach($lt4aps->result() as $aps) {
            ?>
                <p>
                    Nama : <?= $aps->nm_pasien?> <br>
                    Alamat : <?= $aps->alamat?> <br>
                    Status : <?= $aps->status_pasien?>
                </p>
                <?php } ?>  
            <?php }else{?>  
                <p>Tidak Ada Pasien Pulang Aps</p>
            <?php } ?>  
        <p><b>REKAP PASIEN MENINGGAL</b></p>
            <?php if($lt4mng->num_rows()> 0){ 
                foreach($lt4mng->result() as $mng) {
            ?>
                <p>
                    Nama : <?= $mng->nm_pasien?> <br>
                    Alamat : <?= $mng->alamat?> <br>
                    Status : <?= $mng->status_pasien?>
                </p>
                <?php } ?>  
            <?php }else{?>  
                <p>Tidak Ada Pasien Meninggal</p>
            <?php } ?>  
        <p><b>REKAP PASIEN DI PULANGKAN (SEMBUH)</b></p>
            <?php if($lt4blpc->num_rows()> 0){ 
                foreach($lt4blpc->result() as $blpc) {
            ?>
                <p>
                    Nama : <?= $blpc->nm_pasien?> <br>
                    Alamat : <?= $blpc->alamat?> <br>
                    <!-- Status : <?=  $blpc->status_pasien?> -->
                </p>
                <?php } ?>  
            <?php }else{?>  
                <p>Tidak Ada Pasien Di Pulangkan</p>
            <?php } ?>  
        <p><b>REKAP PASIEN ISOLASI MANDIRI</b></p>
            <?php if($lt4isoman->num_rows()> 0){ 
                foreach($lt4isoman->result() as $c) {
            ?>
                <p>
                    Nama : <?= $c->nm_pasien?> <br>
                    Alamat : <?= $c->alamat?> <br>
                    Status : <?= $c->status_pasien?>
                </p>
                <?php } ?>  
            <?php }else{?>  
                <p>Tidak Ada Pasien Yang Isolasi Mandiri</p>
            <?php } ?>  
        
        <p><b>LAPORAN PASIEN PINDAH RUANGAN</b></p>
        <p>Tidak Ada Pasien Di Pulangkan</p>
        
        <p><b>LAPORAN PASIEN RENCANA SWAB PADA <?= date_indo($tgl) ?></b></p>
        <?php if($lt4SWAB->num_rows()> 0){ 
            $no =1;
                foreach($lt4SWAB->result() as $swab) {
            ?>
                <p>
                    <?= $no++?> <?= $swab->nm_pasien?> <br>
                </p>
                <?php } ?>  
            <?php }else{?>  
                <p>Tidak Ada Psaien Rencana Swab</p>
            <?php } ?>
        <p><b>LAPORAN PASIEN RENCANA THORAX PADA <?= date_indo($tgl) ?></b></p>
        <?php if($lt4thx->num_rows()> 0){ 
            $no =1;
                foreach($lt4thx->result() as $thx) {
            ?>
                <p>
                    <?= $no++?> <?= $thx->nm_pasien?> <br>
                </p>
                <?php } ?>  
            <?php }else{?>  
                <p>Tidak Ada Psaien Rencana Thorax</p>
            <?php } ?>

    </div>
    
                <p> <center> UPDATE KETERSEDIAAN BED - RUANG ISOLASI LANTAI 4 PADA <?= strtoupper( longdate_indo($tgl)) ?></center></p>
                <?php foreach ($data as $key) { 
                    if($bag == 'LT4'){
                ?>
                    <div class="item"> <p> <b>Kamar <?= $key->nama_kamar?> </b> </p> 
                        <?php foreach ($bedlt4 as $z ) { 
                            if($z->nama_kamar == $key->nama_kamar) {   
                        ?>
                           <p>Terisi : <?= $z->bed?></p> 
                        <?php } ?>
                        <?php } ?>
                            <!-- perulangan bed -->
                            <?php foreach ($bed as $b) { 
                                if($b->nama_kamar == $key->nama_kamar){    
                                    ?>
                                    <p>BED <b><?=$b->no_bed?> </b> &nbsp; : </p>
                                    <!-- perulangan pasien -->
                                    <?php foreach ($p as $pp) { 
                                        if($pp->id_bed == $b->id_bed and $pp->status_plg == ''){    
                                    ?>
                                        <p>Nama Pasien &nbsp; :&nbsp; <?= $pp->nm_pasien?></p>
                                        <p>DX &nbsp; :&nbsp; <?= $pp->diagnosa?> &nbsp; <b><?= strtoupper($pp->status_pasien)?> COVID</b></p> 
                                        <?php } ?>
                                    <?php } ?>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    <?php } ?>
                <?php } ?>
            <p> <b> Total BED Terisi : <?= $totlt4->t?> </b></p>
            <p> <b> Total BED Kosong : <?= $sisalt4->t?> </b></p>
    <?php }elseif($bag == 'LT5'){ ?>
        <P><B>REKAP PASIEN BARU DI ISOLASI <?= $bag?></B></P>
        <?php if($pbaru->num_rows() > 0){ ?>
            <?php foreach($pbaru->result() as $new) { 
                if($new->status_plg == null){    
            ?>
                
                <p>
                    Nama : <?= $new->nm_pasien?> <br>
                    Alamat : <?= $new->alamat?> <br>
                    Status : <?= $new->status_pasien?>
                </p>
            <?php } ?>
        <?php } ?>
            <?php }elseif($pbaru->num_rows() < 1){ ?>
                <p>Tidak Ada Pasien Baru</p>
            <?php } ?>
        <p><b>REKAP PASIEN DI RUJUK EXTERNAL</b></p>
            <?php if($lt4rjx->num_rows()> 0){ 
                foreach($lt4rjx->result() as $rjx) {
            ?>
                <p>
                    Nama : <?= $rjx->nm_pasien?> <br>
                    Alamat : <?= $rjx->alamat?> <br>
                    Status : <?= $rjx->status_pasien?>
                </p>
                <?php } ?>  
            <?php }else{ ?>  
                <p>Tidak Ada Pasien Di Rujuk External</p>
            <?php } ?>  
        <p><b>REKAP PASIEN DI PULANG APS</b></p>
            <?php if($lt4aps->num_rows()> 0){ 
                foreach($lt4aps->result() as $aps) {
            ?>
                <p>
                    Nama : <?= $aps->nm_pasien?> <br>
                    Alamat : <?= $aps->alamat?> <br>
                    Status : <?= $aps->status_pasien?>
                </p>
                <?php } ?>  
            <?php }else{?>  
                <p>Tidak Ada Pasien Pulang Aps</p>
            <?php } ?>  
        <p><b>REKAP PASIEN MENINGGAL</b></p>
            <?php if($lt4mng->num_rows()> 0){ 
                foreach($lt4mng->result() as $mng) {
            ?>
                <p>
                    Nama : <?= $mng->nm_pasien?> <br>
                    Alamat : <?= $mng->alamat?> <br>
                    Status : <?= $mng->status_pasien?>
                </p>
                <?php } ?>  
            <?php }else{?>  
                <p>Tidak Ada Pasien Meninggal</p>
            <?php } ?>  
        <p><b>REKAP PASIEN DI PULANGKAN (SEMBUH)</b></p>
            <?php if($lt4blpc->num_rows()> 0){ 
                foreach($lt4blpc->result() as $blpc) {
            ?>
                <p>
                    Nama : <?= $blpc->nm_pasien?> <br>
                    Alamat : <?= $blpc->alamat?> <br>
                    <!-- Status : <?= $blpc->status_pasien?> -->
                </p>
                <?php } ?>  
            <?php }else{?>  
                <p>Tidak Ada Pasien Di Pulangkan</p>
            <?php } ?>  
            <p><b>REKAP PASIEN ISOLASI MANDIRI</b></p>
            <?php if($lt4isoman->num_rows()> 0){ 
                foreach($lt4isoman->result() as $c) {
            ?>
                <p>
                    Nama : <?= $c->nm_pasien?> <br>
                    Alamat : <?= $c->alamat?> <br>
                    Status : <?= $c->status_pasien?>
                </p>
                <?php } ?>  
            <?php }else{?>  
                <p>Tidak Ada Pasien Yang Isolasi Mandiri</p>
            <?php } ?>  
        
        <p><b>LAPORAN PASIEN PINDAH RUANGAN</b></p>
        <p>Tidak Ada Pasien Di Pulangkan</p>
        
        <p><b>LAPORAN PASIEN RENCANA SWAB PADA <?= date_indo($tgl) ?></b></p>
        <?php if($lt4SWAB->num_rows()> 0){ 
            $no =1;
                foreach($lt4SWAB->result() as $swab) {
            ?>
                <p>
                    <?= $no++?>. <?= $swab->nm_pasien?> <br>
                </p>
                <?php } ?>  
            <?php }else{?>  
                <p>Tidak Ada Psaien Rencana Swab</p>
            <?php } ?>
        <p><b>LAPORAN PASIEN RENCANA THORAX PADA <?= date_indo($tgl) ?></b></p>
        <?php if($lt4thx->num_rows()> 0){ 
            $no =1;
                foreach($lt4thx->result() as $thx) {
            ?>
                <p>
                    <?= $no++?> <?= $thx->nm_pasien?> <br>
                </p>
                <?php } ?>  
            <?php }else{?>  
                <p>Tidak Ada Psaien Rencana Thorax</p>
            <?php } ?>

    </div>
    
                <p> <center> UPDATE KETERSEDIAAN BED - RUANG ISOLASI LANTAI 4 PADA <?= strtoupper( longdate_indo($tgl)) ?></center></p>
                <?php foreach ($data as $key) { 
                    if($bag == 'LT5'){
                ?>
                    <div class="item"> <p> <b>Kamar <?= $key->nama_kamar?> </b> </p> 
                        <?php foreach ($bedlt4 as $z ) { 
                            if($z->nama_kamar == $key->nama_kamar) {   
                        ?>
                           <p>Terisi : <?= $z->bed?></p> 
                        <?php } ?>
                        <?php } ?>
                            <!-- perulangan bed -->
                            <?php foreach ($bed as $b) { 
                                if($b->nama_kamar == $key->nama_kamar){    
                                    ?>
                                    <p>BED <b><?=$b->no_bed?> </b> &nbsp; : </p>
                                    <!-- perulangan pasien -->
                                    <?php foreach ($p as $pp) { 
                                        if($pp->id_bed == $b->id_bed and $pp->status_plg == ''){    
                                    ?>
                                        <p>Nama Pasien &nbsp; :&nbsp; <?= $pp->nm_pasien?></p>
                                        <p>DX &nbsp; :&nbsp; <?= $pp->diagnosa?> &nbsp; <b><?= strtoupper($pp->status_pasien)?> COVID</b></p> 
                                        <?php } ?>
                                    <?php } ?>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    <?php } ?>
                <?php } ?>
            <p> <b> Total BED Terisi : <?= $totlt4->t?> </b></p>
            <p> <b> Total BED Kosong : <?= $sisalt4->t?> </b></p>
    <?php } ?>
    </div>
</body>
</html>