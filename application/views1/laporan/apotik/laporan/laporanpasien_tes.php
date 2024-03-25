
<html>
<head>
<title>Laporan Apotik</title>
<style type="text/css">

.style1 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-weight: bold;
	font-size: 11px;
}
.style2 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
}
.style3 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 9px;
}

table.tabelbiasa {
    border-top: 1px solid #000000;
    border-bottom: 1px solid #000000;
    border-left: 0px solid #000000;
    border-right: 0px solid #000000;
    /* padding: 5px 4px; */
}

table.tabelheader {
    border-top: 1px solid #000000;
    border-bottom: 0px solid #000000;
    border-left: 0px solid #000000;
    border-right: 0px solid #000000;
    /* padding: 5px 4px; */
}

.style7 {
    font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 9px;
    border-top: 1px solid #000000;
    border-bottom: 0px solid #000000;
    border-left: 0px solid #000000;
    border-right: 0px solid #000000;
    /* padding: 5px 4px; */ */
    height : 15px;
}
</style>
</head>
<?php
 $aw=strtotime($awal);
 $ak=strtotime($akhir);
 $tglawal=date('Y-m-d',$aw);
 $tglakhir=date('Y-m-d',$ak);
 $tglawalcetak=date('d-m-Y',$aw);
 $tglakhircetak=date('d-m-Y',$ak);
 $namadepo = 'Semua Depo';
 if ($cekunit==1) {$namadepo = 'Semua Depo';} 
 else {
   $perintah="SELECT nama_unit from munit where kode_unit='$depo' limit 1";
   $qry=$this->db->query($perintah);
   foreach ($qry->result_array() as $brs) {
       $namadepo=$brs['nama_unit'];
   }
 } 
if ($cekunit==1) {$kodedepo = '';} else {$kodedepo=$depo;} 

?>
<body>
<?php

      echo $norm;
      echo "<br>"; 
      echo $nama;
      echo "<br>"; 
      echo $tglawalcetak." s/d ".$tglakhircetak; 
      echo "<br>"; 
      echo $tglawal;
      echo "<br>"; 
      echo $norm; 

      $i=1;
      if ($cekpasien==1) {$filterpasien = "";} else {$filterpasien=" and no_rm='$norm' ";}
      if ($cekunit==1) {$filterdepo = "";} else {$filterdepo=" and kode_depo='$kodedepo' ";} 
      if ($cekunitasal==1) {$filterunitasal = "";} else {$filterunitasal=" and kode_unit='$unitasal' ";} 
      // if ($cekgolongan==1) {$filtergolongan = "";} else {$filtergolongan=" and golongan='$golongan' ";} 
      if ($cekpendanaan==1) {$filterpendanaan = "";} else {$filterpendaan=" and pendanaan='$pendanaan' ";} 

      //cek dulu tgl masuk dan tgl keluarnya di register
    //   $per="SELECT tgl_masuk , tgl_keluar, no_rm  FROM register where tgl_keluar BETWEEN '$tglawal' AND '$tglakhir' ";
      $per="SELECT tgl_masuk , tgl_keluar, no_rm  FROM register where tgl_keluar>='$tglawal' AND tgl_keluar<='$tglakhir' ";

    //   echo $per."<br>";
      $perintah0=$per.$filterpasien;
      echo "<br>".$perintah0."<br>";
      $qry0=$this->db->query($perintah0);
      foreach ($qry0->result_array() as $brs0) {
            $tglm=$brs0['tgl_masuk'];
            $tglk=$brs0['tgl_keluar'];
            $normregister=$brs0['no_rm'];
            $per1="SELECT * FROM resep_header where tglresep>='$tglm' and tglresep<='$tglk' and no_rm='$normregister'";
            // $per1="SELECT * FROM resep_header where tglresep BETWEEN '$tglm' AND '$tglk' and no_rm='$normregister'";
           
            $perintah=$per1.$filterdepo.$filterpendanaan.$filterunitasal;
            echo "<br>".$perintah." ....1";
            $qry2=$this->db->query($perintah);
            foreach ($qry2->result_array() as $brs2) {
                          $no_rm=$brs2['no_rm'];
                          $pasien=$brs2['nama_umum'];
                          $dokter=$brs2['nama_dokter'];
                          $tanggal=$brs2['tglresep'];
                          $noresep=$brs2['noresep'];
                          echo "<br>".$noresep;
              ?>
              <!-- cek dulu apakah sudah diproses atau belum sebelum cetak -->
              <?php 
              $q0="SELECT * FROM resep_detail where noresep = '$noresep' and proses=1 limit 1";
              echo "<br>".$q0;
              $qry0=$this->db->query($q0);
              $hitung_baris=$qry0->num_rows();
              // var_dump($hitung_baris);

              if ($hitung_baris > 0 ){
                echo "<br>"."ada ";
            ?>
            <?php    
              $total=0;
              $q3="SELECT * FROM resep_detail where noresep = '$noresep' and proses=1";
              echo "<br>".$q3;
              $qry3=$this->db->query($q3);
                    foreach ($qry3->result_array() as $brs3) {
                      // $jumlah=($brs2['hargapakai']*$brs2['qty'])+$brs2['tuslag'];
                      $jumlah=$brs3['hargapakai']*$brs3['qty'];
                      $total=$total+$jumlah;
                  } 
                  echo "<br>".$total;
                  ?>
                   
      <?php }}} ?>

</body>
</html>
