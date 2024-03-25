
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
//  $namadepo = 'Semua Depo';
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
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td colspan="4"><span class="style1"><?php echo ' '.getenv('V_NAMARS'); ?>  </span></td>
      </tr>
      <tr>
        <td colspan="4"><span class="style2">INSTALASI FARMASI </span></td>
      </tr>
      <tr>
        <td colspan="4" class="style2">Laporan Rekapitulasi Resep </td>
      </tr>
      <tr>
        <td width="20%" colspan="2"><span class="style3">Unit : <?php echo $namadepo; ?></span></td>
        <td width="59%" colspan="2" class="style3">Tanggal : <?php echo $tglawalcetak; ?></td>
      </tr>
      <!-- <tr>
        <td><span class="style3">Unit : <?php echo $cekunit; ?></span></td>
        <td><span class="style3">golongan : <?php echo $cekgolongan; ?></span></td>
        <td><span class="style3">dana : <?php echo $cekpendanaan; ?></span></td>
      </tr> -->
    </table></td>
  </tr>
</table>
<table width="100%"   cellspacing="0" cellpadding="2">
  <tr>
    <td width="50%"><table width="100%" class="tabelbiasa" cellspacing="0" cellpadding="0">
      <tr>
        <th width="8%" height="15"><div align="center"><span class="style3">No</span></div></th>
        <th width="15%"><span class="style3">Tgl.Resep</span></th>
        <th width="10%"><span class="style3">No.Rm</span></th>
        <th width="32%"><span class="style3">Nama Pasien </span></th>
        <th width="35%"><span class="style3">Dokter</span></th>
      </tr>
    </table></td>
    <td width="50%"><table width="100%" class="tabelbiasa" cellspacing="0" cellpadding="0">
      <tr>
        <th width="49%" height="15"><span class="style3">Nama Obat </span></th>
        <th width="8%"><div align="right"><span class="style3">Qty</span></div></th>
        <th width="13%"><div align="right"><span class="style3">Harga</span></div></th>
        <th width="10%"><div align="right"><span class="style3">Tuslaq </span></div></th>
        <th width="20%"><div align="right"><span class="style3">Jumlah (Rp.) </span></div></th>
      </tr>
    </table></td>
    <?php
      $filterdepo = "";
      $i=1;
      if ($cekunit==1) {$filterdepo = "";} else {$filterdepo=" and kode_depo='$kodedepo' ";} 
      if ($cekgolongan==1) {$filtergolongan = "";} else {$filtergolongan=" and golongan='$golongan' ";} 
      // if ($cekpendanaan==1) {$filterpendanaan = "";} else {$filterpendanaan=" and pendanaan='$pendanaan' ";} 
      
      // $per1="SELECT  no_rm,nama_umum,nama_dokter,tglresep,noresep FROM resep_header where tglresep BETWEEN '$tglawal' AND '$tglakhir' ";
      $per1="SELECT  no_rm,nama_umum,nama_dokter,tglresep,noresep FROM resep_header where tglresep='$tglawal' ";
      // $perintah=$per1.$filterdepo.$filtergolongan.$filterpendanaan;
      $perintah=$per1.$filterdepo.$filtergolongan;
      $qry2=$this->db->query($perintah);
      foreach ($qry2->result_array() as $brs2) {
                    $no_rm=$brs2['no_rm'];
                    $pasien=$brs2['nama_umum'];
                    $dokter=$brs2['nama_dokter'];
                    $tanggal=$brs2['tglresep'];
                    $noresep=$brs2['noresep'];
        ?>
        <!-- cek dulu apakah sudah diproses atau belum sebelum cetak -->
        <?php 
        $q0="SELECT noresep FROM resep_detail where noresep = '$noresep' and proses=1 limit 1";
         $qry0=$this->db->query($q0);
         $hitung_baris=$qry0->num_rows();
         if ($hitung_baris > 0 ){
       ?>
  <tr>
    <td valign="top"><table width="100%"  cellspacing="0" cellpadding="0">
      <tr>
        <td width="8%"><div align="center"><span class="style3"><?php echo $i++; ?></span></div></td>
        <td width="15%"><div align="center"><span class="style3"><?php echo $tanggal; ?></span></div></td>
        <td width="10%"><div align="center"><span class="style3"><?php echo $no_rm; ?></span></div></td>
        <td width="32%"><span class="style3"><?php echo $pasien; ?> </span></td>
        <td width="35%"><span class="style3"><?php echo $dokter; ?></span></td>
      </tr>
    </table></td>
    <td><table width="100%"  cellspacing="0" cellpadding="2">
      <?php    
         $total=0;
         $q3="SELECT namaobat,qty,hargapakai,tuslag FROM resep_detail where noresep = '$noresep' and proses=1";
         $qry3=$this->db->query($q3);
              foreach ($qry3->result_array() as $brs3) {
                // $jumlah=($brs2['hargapakai']*$brs2['qty'])+$brs2['tuslag'];
                $jumlah=$brs3['hargapakai']*$brs3['qty'];
                $total=$total+$jumlah;
                  ?>
            <tr>
              <td width="49%"><div align="left"><span class="style3"><?php echo $brs3['namaobat'];?></span></div></td>
              <td width="8%"><div align="right"><span class="style3"><?php echo $brs3['qty'];?></span></div></td>
              <td width="13%"><div align="right"><span class="style3"><?php echo formatuang($brs3['hargapakai']);?></span></div></td>
              <td width="10%"><div align="right"><span class="style3"><?php echo formatuang($brs3['tuslag']);?> </span></div></td>
              <td width="20%"><div align="right"><span class="style3"><?php echo formatuang($jumlah);?> </span></div></td>
            </tr>
            <?php } ?>
          <tr>
            <td colspan="5"><table width="100%" class="tabelheader" cellspacing="0" cellpadding="2">
              <tr>
                <td width="71%">&nbsp;</td>
                <td width="14%"><div align="center"><span class="style3">Jumlah</span></div></td>
                <td width="15%"><div align="right"><span class="style3"><?php echo formatuang($total);?></span></div></td>
              </tr>
            </table></td>
          </tr>
      
    </table></td>
  </tr>
  <tr>
    <td colspan="2" valign="top" height="5px"><table width="100%" class="tabelheader" cellspacing="0" cellpadding="0">
      <tr>
        <td>&nbsp;</td>
      </tr>
    </table></td>
  </tr>

  <?php }} ?>
</table>
<p>&nbsp;</p>
</body>
</html>
