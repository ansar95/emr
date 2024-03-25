
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

.style31 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
  font-weight: bold;
	font-size: 10px;
}

.style32 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
  font-weight: bold;
	font-size: 11px;
}

.style321 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
  font-weight: bold;
  text-decoration: underline;
	font-size: 11px;
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
    border-bottom: 1px solid #000000;
    border-left: 0px solid #000000;
    border-right: 0px solid #000000;
    /* padding: 5px 4px; */
}

table.tabelheader2 {
    border-top: 0px solid #000000;
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
  $tglc=strtotime($tglcetak);
  $tglawal=date('Y-m-d',$aw);
  $tglakhir=date('Y-m-d',$ak);

  $resepaw=strtotime($resepawal);
  $resepak=strtotime($resepakhir);
  $resepawal=date('Y-m-d',$resepaw);
  $resepakhir=date('Y-m-d',$resepak);

  $tglawalcetak=date('d-m-Y',$aw);
  $tglakhircetak=date('d-m-Y',$ak);
  $tglcetak=date('Y-m-d',$tglc);
  $tglcetaknya=tgl_format_indo_huruf($tglcetak);
  $qryr0=$this->db->query("SELECT kota from setup where 1 limit 1");
  foreach ($qryr0->result_array() as $brs01) {
      $kota=$brs01['kota'];
  }

  $perr1="SELECT nama_dokter,nip from mdokter where kode_dokter='$ttd' limit 1";
   $qryr1=$this->db->query($perr1);
   foreach ($qryr1->result_array() as $brs) {
       $penandatangan=$brs['nama_dokter'];
       $nip=$brs['nip'];
   }
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
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td colspan="4"><span class="style1"><?php echo ' '.getenv('V_NAMARS'); ?> </span></td>
      </tr>
      <tr>
        <td colspan="4"><span class="style2">INSTALASI FARMASI </span></td>
      </tr>
      <tr>
        <td colspan="4" class="style2">Laporan Resep Pasien</td>
      </tr>
      <tr>
        <td colspan="3" class="style2">No. RM : <span class="style31"><?php echo $norm; ?></span></td>
        <td width="86%" class="style2">Nama Pasien : <span class="style31"><?php echo $nama; ?></span> </td>
      </tr>
      
      </table>
    </td>
  </tr>
</table>
<table width="100%"   cellspacing="0" cellpadding="2">
  <tr>
    <td width="50%"><table width="100%" class="tabelbiasa" cellspacing="0" cellpadding="2">
      <tr>
        <th width="8%" height="15"><div align="center"><span class="style3">No</span></div></th>
        <th width="15%"><span class="style3">Tgl.Resep</span></th>
        <th width="24%"><span class="style3">No.Resep</span></th>
        <th width="53%"><span class="style3">Dokter</span></th>
      </tr>
    </table></td>
    <td width="50%"><table width="100%" class="tabelbiasa" cellspacing="0" cellpadding="2">
      <tr>
        <th width="49%" height="15"><span class="style3">Nama Obat </span></th>
        <th width="8%"><div align="right"><span class="style3">Qty</span></div></th>
        <th width="13%"><div align="right"><span class="style3">Harga</span></div></th>
        <th width="10%"><div align="right"><span class="style3">Tuslaq </span></div></th>
        <th width="20%"><div align="right"><span class="style3">Jumlah (Rp.) </span></div></th>
      </tr>
      
    </table></td>
</table>  
<table width="100%"   cellspacing="0" cellpadding="2">

    <?php
      $i=1;
      $totalall=0;
      if ($cekunitasal==1) {$filterunitasal = "";} else {$filterunitasal=" and kode_unit='$unitasal' ";} 
      // if ($cekpendanaan==1) {$filterpendanaan = "";} else {$filterpendanaan=" and pendanaan='$pendanaan' ";} 
      
      if ($cekperawatan==1) { 
        $r1="SELECT notransaksi FROM register where tgl_masuk='$tglawal' and no_rm='$norm' and bagian<>'JALAN' limit 1";
      } elseif ($cekperawatan==2) {
        $r1="SELECT notransaksi FROM register where tgl_masuk='$tglawal' and no_rm='$norm' and bagian='JALAN' limit 1";
      } else {
        $r1="SELECT notransaksi FROM register where tgl_masuk='$tglawal' and no_rm='$norm' and bagian='IGD' limit 1";
      }  

      $reg=$this->db->query($r1);
      foreach ($reg->result_array() as $brsreg) {
        $notransaksi=$brsreg['notransaksi'];

      if ($cektgl == 1) {
        $filtertgl="";
      } else {
        $filtertgl=" and tglresep>='$resepawal' and tglresep<='$resepakhir' ";
      }
      $per1="SELECT no_rm,nama_umum,nama_dokter,tglresep,noresep FROM resep_header where notraksaksi='$notransaksi' ";
      $perintah=$per1.$filtertgl.$filterunitasal;
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
        $q0="SELECT noresep FROM resep_detail where noresep = '$noresep' and proses=1 ";
        // $q01=$q0.$filterpendanaan;
        $q01=$q0;
         $qry0=$this->db->query($q01);
         $hitung_baris=$qry0->num_rows();
         if ($hitung_baris > 0 ){
       ?>
          <tr>
            <td valign="top" width="50%">
              <table width="100%"  cellspacing="0" cellpadding="0">
              <tr>
                <td width="8%"><div align="center"><span class="style3"><?php echo $i++; ?></span></div></td>
                <td width="15%"><div align="left"><span class="style3"><?php echo $tanggal; ?></span></div></td>
                <td width="24%"><div align="left"><span class="style3"><?php echo $noresep; ?></span></div></td>
                <td width="53%"><span class="style3"><?php echo $dokter; ?></span></td>
              </tr>
              </table>
            </td>

            <td width="50%">
              <table width="100%"  cellspacing="0" cellpadding="2">
                <?php    
                $total=0;
                $q3="SELECT namaobat,qty,hargapakai,qty,tuslag FROM resep_detail where noresep = '$noresep' and proses=1";
                // $q31=$q3.$filterpendanaan;
                $q31=$q3;
                $qry3=$this->db->query($q31);
                      foreach ($qry3->result_array() as $brs3) {
                        // $jumlah=($brs2['hargapakai']*$brs2['qty'])+$brs2['tuslag'];
                        $jumlah=$brs3['hargapakai']*$brs3['qty'];
                        $total=$total+$jumlah;
                        $totalall=$totalall+$jumlah;
                          ?>
                    <tr>
                      <td width="49%"><div align="left"><span class="style3"><?php echo $brs3['namaobat'];?></span></div></td>
                      <td width="8%"><div align="right"><span class="style3"><?php echo $brs3['qty'];?></span></div></td>
                      <td width="13%"><div align="right"><span class="style3"><?php echo formatuang($brs3['hargapakai']);?></span></div></td>
                      <td width="10%"><div align="right"><span class="style3"><?php echo formatuang($brs3['tuslag']);?> </span></div></td>
                      <td width="20%"><div align="right"><span class="style3"><?php echo formatuang($jumlah);?> </span></div></td>
                    </tr>
                    <?php } ?>
              </table>
            </td>
          </tr>
</table>
<table width="100%" cellspacing="0" cellpadding="2">
          <tr>
            <td colspan="2" valign="top"><table width="100%" class="tabelheader" cellspacing="0" cellpadding="4">
              <tr>
                <td width="85%">&nbsp;</td>
                <td width="5%"><div align="center"><span class="style31">Jumlah</span></div></td>
                <td width="10%"><div align="right"><span class="style31"><?php echo formatuang($total);?></span></div></td>
              </tr>
            </table></td>
          </tr>

<?php }} }?>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="2">
  <tr>
    <td><table width="100%" class="tabelheader2" cellspacing="0" cellpadding="4">
      <tr>
        <td valign="middle"><div align="right"><span class="style32">TOTAL RESEP PASIEN </span></div></td>
        <td width="10%" valign="middle"><div align="right"><span class="style32"><?php echo formatuang($totalall);?></span></div></td>
      </tr>
    </table></td>
  </tr>
</table>

<p>&nbsp;</p>
</body>
</html>
