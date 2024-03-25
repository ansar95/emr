
<html>
<head>
<title>Laporan Rekap Apotik</title>
<style type="text/css">

/* table { page-break-inside:auto }
tr    { page-break-inside:avoid; page-break-after:auto }
thead { display:table-header-group }
tfoot { display:table-footer-group }     */

.style1 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-weight: bold;
	font-size: 12px;
}
.style2 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
}
.style3 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
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
 
if ($cekunit == 1) {
  $namadepo = 'Semua Depo';
} 
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
        <td colspan="4"><span class="style1"><?php echo ' '.getenv('V_NAMARS'); ?>  </span></td>
      </tr>
      <tr>
        <td colspan="4"><span class="style2">INSTALASI FARMASI </span></td>
      </tr>
      <tr>
        <td colspan="4" class="style2">Laporan Rekapitulasi Penjualan Obat</td>
      </tr>
      <tr>
        <td width="15%" colspan="2"><span class="style3">Unit : <?php echo $namadepo; ?></span></td>
        <td width="59%" colspan="2" class="style3">Periode : <?php echo $tglawalcetak." s/d ".$tglakhircetak; ?></td>
        <!-- <td width="30%" colspan="2" class="style3">Periode : <?php echo $tglawalcetak; ?></td> -->
      </tr>
    </table>
    <table width="60%" border="1" cellspacing="0" cellpadding="3">
      <tr>
        <td width="5%" height="23" valign="middle" bgcolor="#CCCCCC"><div align="center"><span class="style3">No</span></div></td>
        <td width="85%" valign="middle" bgcolor="#CCCCCC" class="style3">Item </td>
        <td width="10%" valign="middle" bgcolor="#CCCCCC" class="style3"><div align="right">Qty</div></td>
      </tr>
      <?php
          if ($cekunit==1) {$filterdepo = "";} else {$filterdepo=" and resep_header.kode_depo='$kodedepo' ";} 
          if ($cekpendanaan==1) {$filterpendanaan = "";} else {$filterpendanaan=" and resep_detail.pendanaan='$pendanaan' ";} 
          $q1="SELECT resep_detail.namaobat,sum(resep_detail.qty) as qty FROM resep_detail,resep_header where resep_header.tglresep>='$tglawal' AND resep_header.tglresep<='$tglakhir' and resep_detail.noresep=resep_header.noresep and resep_detail.proses=1 ";
          $order=" group by resep_detail.namaobat order by resep_detail.namaobat ";
          // $perintah=$q1.$filterdepo.$filterpendanaan.$order;
          $perintah=$q1.$filterdepo.$order;
          $qry3=$this->db->query($perintah);
          $i=0;
          $hal=1;
          $brs=0;
          foreach ($qry3->result_array() as $brs3) {
           $i++;
           $namaobat=$brs3['namaobat'];
           $qty=$brs3['qty'];
      ?>
      <tr>
        <td width="5%"><div align="center" class="style3"><?php echo $i.'.'; ?></div></td>
        <td width="85%"><span class="style3"><?php echo $namaobat; ?></span></td>
        <td width="10%"><div align="right" class="style3"><?php echo $qty; ?>
        </div>
        <div align="right"></div></td>
      </tr>
      <?php } ?>
    </table>
<p>&nbsp;</p>
</body>
</html>
