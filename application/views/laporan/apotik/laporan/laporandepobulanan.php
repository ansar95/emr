
<html>
<head>
<title>Laporan Apotik</title>
<style type="text/css">

@media print {
  @page { margin-top: 1; }
  body { margin-top: 1.6cm; }
}



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

.style31 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
  font-weight: bold;
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

table.tabelgarisbawah {
    border-top: 1px solid #000000;
    border-bottom: 1px solid #000000;
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
 if ($cekunit != 1) {
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
        <td colspan="4" class="style2">Laporan Periode Rekapitulasi Resep </td>
      </tr>
      <tr>
        <td width="20%" colspan="2"><span class="style3">Unit : <?php echo $namadepo; ?></span></td>
        <!-- <td width="59%" colspan="2" class="style3">Tanggal : <?php echo $tglawalcetak.' sampai '.$tglakhircetak; ?></td> -->
        <td width="59%" colspan="2" class="style3">Tanggal : <?php echo $tglawalcetak.' sampai '.$tglakhircetak; ?></td>
      </tr>
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
      $i=1;
      if ($kelompok==0) {
        $filterkelompok = "";
      } else if ($kelompok==1) {
        $filterkelompok = " and noninacbg='0' ";
      } else {
        $filterkelompok=" and noninacbg='1' ";
      } 
      if ($cekunit==1) {$filterdepo = "";} else {$filterdepo=" and kode_depo='$depo' ";} 
      if ($cekgolongan==1) {$filtergolongan = "";} else {$filtergolongan=" and resep_header.golongan='$golongan' ";} 
      
      if ($cekperawatan==3) {
          $filterrawat = " and register.bagian='IGD' and (kode_keluarpada =='IGDD' or kode_keluarpada =='IGDP')";
      } elseif ($cekperawatan==1) {
          $filterrawat= " and (register.bagian='INAP' or (register.bagian='IGD' and kode_keluarpada !='IGDD' and kode_keluarpada !='IGDP') ";
      } elseif ($cekperawatan==2) {
          $filterrawat= " and register.bagian='JALAN' ";
      } else {
          $filterrawat = "";
      }

      $per1="SELECT  resep_header.no_rm as no_rm, resep_header.nama_umum as nama_umum, resep_header.nama_dokter as nama_dokter, resep_header.tglresep as tglresep, resep_header.noresep as noresep, register.bagian as bagian, register.kode_keluarpada as kode_keluarpada, resep_header.notraksaksi as notransaksi FROM resep_header,register where resep_header.notraksaksi=register.notransaksi and tglresep BETWEEN '$tglawal' AND '$tglakhir' ";
      $perintah=$per1.$filterdepo.$filtergolongan.$filterrawat;
      $qry2=$this->db->query($perintah);
      $totaljumlah=0;
      $jumlahitemobat=0;
      foreach ($qry2->result_array() as $brs2) {
                    $no_rm=$brs2['no_rm'];
                    $pasien=$brs2['nama_umum'];
                    $dokter=$brs2['nama_dokter'];
                    $tanggal=$brs2['tglresep'];
                    $noresep=$brs2['noresep'];
                    $bagian=$brs2['bagian'];
                    $kode_keluarpada=$brs2['kode_keluarpada'];
                    $notransaksi=$brs2['notransaksi'];
        ?>
        <!-- cek dulu apakah sudah diproses atau belum sebelum cetak -->
        <?php 

        $q0="SELECT noresep FROM resep_detail where noresep = '$noresep' and proses=1 ".$filterkelompok." limit 1";
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
                  $q3="SELECT namaobat,qty,hargapakai,tuslag FROM resep_detail where noresep = '$noresep' and proses=1 ".$filterkelompok;
                  $qry3=$this->db->query($q3);
                        foreach ($qry3->result_array() as $brs3) {
                          // $jumlah=($brs2['hargapakai']*$brs2['qty'])+$brs2['tuslag'];
                          $jumlah=$brs3['hargapakai']*$brs3['qty'];
                          $total=$total+$jumlah;
                          $totaljumlah=$totaljumlah+$jumlah;
                          $jumlahitemobat++;
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
    <?php 
      } else { ?>  
        <!-- <tr>
                
        <td width="15%"><div align="right"><span class="style3"><?php echo $notransaksi;?></span></div></td>
        <td width="15%"><div align="right"><span class="style3"><?php echo $bagian.' '.$kode_keluarpada;?></span></div></td>

        </tr> -->
    <?php       
      } //selesai uji cetakan
    } 
if ($jumlahitemobat != 0) {
    ?>
<table width="100%" class="tabelgarisbawah">
  <tr>
    <td width="90%" height='30px'><div align="right" ><span class="style31">TOTAL JUMLAH</span></div></td>
    <td width="10%"><div align="right"><span class="style31"><?php echo formatuang($totaljumlah);?></span></div></td>
  </tr>
<table>
<br>
<span class="style31"><?php echo  'Jumlah Item Obat : '.formatuang($jumlahitemobat);?></span>
<p>&nbsp;</p>
<?php } ?>
</body>
</html>
