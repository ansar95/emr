<?php
// header("Content-type: application/vnd-ms-excel");
// header("Content-Disposition: attachment; filename=".$nmfile."".namafiletgl().".xls");
?>
<?php
//pengunjung
    $xpengunjunglamapoli=0;
    $xtotalpengunjungpoli=0;
    $xpengunjungbarupoli=0;

//total semua pengunjung - poli
$q2="select count(no_rm) as xjumlah from register where bagian='JALAN' and  MONTH(register.tgl_masuk)='$bulan'  and YEAR(register.tgl_masuk)='$tahun'";
$qry2=$this->db->query($q2);;
foreach ($qry2->result_array() as $d) {
    $xtotalpengunjungpoli=trim($d['xjumlah']);
}

//pengunjung baru - poli
$q3="select count(register.no_rm) as pbaru from register,pasien where register.no_rm=pasien.no_rm and bagian='JALAN' "; $q4="and  MONTH(register.tgl_masuk)='$bulan' and YEAR(register.tgl_masuk)='$tahun'  and  ";
$q5="MONTH(pasien.tgl_daftar)='$bulan' and YEAR(pasien.tgl_daftar)='$tahun'";
$q2=$q3.$q4.$q5;
$qry2=$this->db->query($q2);;
foreach ($qry2->result_array() as $d) {
    $xpengunjungbarupoli=trim($d['pbaru']);
}

//pengunjung lama - poli
$xpengunjunglamapoli=$xtotalpengunjungpoli-$xpengunjungbarupoli;

//pengunjung baru dari rjalan ugd
//total semua pengunjung ugd
$xtotalpengunjungugd=0;
$xpengunjunglamaugd=0; 
$xpengunjungbaruugd=0;

$q2="select count(no_rm) as xjumlah from register where bagian='IGD' and  (kode_keluarpada='IGDD' or kode_keluarpada='IGDP') and MONTH(register.tgl_masuk)='$bulan'";
$qry2=$this->db->query($q2);;
foreach ($qry2->result_array() as $d) {
    $xtotalpengunjungugd=trim($d['xjumlah']);
}

//pengunjung baru dari rjalan ugd
$q2="select count(register.no_rm) as pbaruugd from register,pasien where register.no_rm=pasien.no_rm and bagian='IGD' and  (kode_keluarpada='IGDD' or kode_keluarpada='IGDP') and  MONTH(register.tgl_masuk)='$bulan' and YEAR(register.tgl_masuk)='$tahun'  and  MONTH(pasien.tgl_daftar)='$bulan' and YEAR(pasien.tgl_daftar)='$tahun' ";


$qry2=$this->db->query($q2);;
foreach ($qry2->result_array() as $d) {
    $xpengunjungbaruugd=trim($d['pbaruugd']);
}

//pengunjung lama dari rjalan ugd
$xpengunjunglamaugd= $xtotalpengunjungugd-$xpengunjungbaruugd;
$totalpengunjungbaru=$xpengunjungbarupoli+ $xpengunjungbaruugd;
$totalpengunjunglama=$xpengunjunglamapoli+$xpengunjunglamaugd;
?>


<html>
<head>
<title>RL.51</title>
<style type="text/css">
.style2 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-weight: bold;
	font-size: 16px;
}
.style28 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 12px; }
.style31 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 12px; }
.style33 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
	font-weight: bold;
}
</style>
</head>

<body>
<table width="700" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <!-- <td width="35" rowspan="2"><img src="../rsudpemprov/assets/img/logokes.jpg" width="46" height="61"></td> -->
    <td width="500" valign="bottom"><span class="style33">Formulir RL. 5.1 </span></td>
  </tr>
  <tr>
    <td><span class="style33" valign="top">PENGUNJUNG RUMAH SAKIT </span></td>
  </tr>
</table>
<br>
<table width="550" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="10%"><span class="style28">Kode RS </span></td>
        <td width="89%"><div class="style28">
          <div> : 7202015</div>
        </div></td>
      </tr>
      <tr>
        <td><span class="style28">Nama RS </span></td>
        <td><span class="style28">: <?php echo ' '.getenv('V_NAMARS'); ?> </span></td>
      </tr>
      <tr>
        <td><span class="style28">Bulan</span></td>
        <td><span class="style28">: <?php echo nama_bulan_indonesia($bulan); ?></span></td>
      </tr>
      <tr>
        <td><span class="style28">Tahun</span></td>
        <td><span class="style28">: <?php echo $tahun; ?></span></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="71%"><table width="100%" border="1" cellspacing="0" cellpadding="0">
          <tr>
            <td width="12%" height="22"><div align="center" class="style31">No</div></td>
            <td width="65%"><div align="center" class="style31">JENIS KEGIATAN </div></td>
            <td width="23%"><div align="center" class="style31">JUMLAH</div></td>
          </tr>
          <tr>
            <td height="18" ><div align="center" class="style31">1</div></td>
            <td> <span class="style31">Pengunjung Baru </span></td>
            <td> <div align="center" class="style31"><?php echo $totalpengunjungbaru; ?></div></td>
          </tr>
          <tr>
            <td height="18"><div align="center" class="style31">2</div></td>
            <td><span class="style31">Pengunjung Lama </span></td>
            <td><div align="center" class="style31"><?php echo $totalpengunjunglama; ?></div></td>
          </tr>
        </table></td>
        <td width="29%">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
