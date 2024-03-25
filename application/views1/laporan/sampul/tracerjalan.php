<html>
	<head>
	<style type="text/css">
.style1 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 11px;
}
.style2 {
	font-size: 16px;
	font-weight: bold;
}
.style4 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 10px; }

@page{margin: 20px 40px}

	</style>
	</head>
	<body>
		<?php
		$qry2=$this->db->query("SELECT * FROM register INNER JOIN pasien ON register.no_rm = pasien.no_rm INNER JOIN register_detail ON register.notransaksi =register_detail.notransaksi and register.id = '".$id."' LIMIT 1");;
					foreach ($qry2->result_array() as $brs2) {
						$xnama_pasien=$brs2['nama_pasien'];
						$xalamat=$brs2['alamat'];
						$xno_rm=$brs2['no_rm'];
						$xtgl_masuk=$brs2['tgl_masuk'];
						$xasuransi=$brs2['golongan'];
						$xtgl_lahir=$brs2['tgl_lahir'];
						$xnama_unit=$brs2['nama_unit'];
						
						//$ctgl_lahir=substr($xtgl_lahir,9,2).'-'.+substr($xtgl_lahir,6,2).'-'.substr($xtgl_lahir,1,4);
						if ($brs2['sex']=='L') { $xsex='Laki-Laki' ;} else { $xsex='Perempuan';};	
						if ($brs2['barulama']==1) { $xperawatan='Rawat Jalan / Baru' ;} else { $xperawatan='Rawat Jalan / Lama';};						
					}
					//tanggal lahir
						//$birthDt = $xtgl_lahir;
						$ctgl_masuk=substr($xtgl_masuk,8,2).'-'.substr($xtgl_masuk,5,2).'-'.substr($xtgl_masuk,0,4);
						
						$birthDt = new DateTime($xtgl_lahir);
						//tanggal hari ini
						$today = new DateTime('today');
						//tahun
						$y = $today->diff($birthDt)->y;
						//bulan
						$m = $today->diff($birthDt)->m;
						//hari
						$d = $today->diff($birthDt)->d; 
						$xusia =  $y . " Tahun " . $m . " Bulan " . $d . " Hari";
		?>
<table width="183" border="0" cellspacing="2">
  <tr>
    <td colspan="2"><span class="style1">TRACER</span></td>
  </tr>
  <tr>
    <td colspan="2"><div align="center"><span class="style1">No. MR. <span class="style2"><?php echo $xno_rm ;?></span></span></div></td>
  </tr>
  <tr>
    <td width="50"><span class="style4">Nama Pasien</span></td>
    <td width="118" class="style4">: <span class="style1"><?php echo $xnama_pasien ;?></span></td>
  </tr>
  <tr>
    <td class="style4">Umur</td>
    <td class="style4">: <span class="style1"><?php echo $y.' THN' ;?></span></td>
  </tr>
  <tr>
    <td class="style4">Perawatan</td>
    <td class="style4">: <span class="style1"><?php echo $xperawatan ;?></span></td>
  </tr>
  <tr>
    <td class="style4">Unit Perawatan </td>
    <td class="style4">: <span class="style1"><?php echo $xnama_unit ;?></span></td>
  </tr>
  <tr>
    <td class="style4">Tanggal Masuk </td>
    <td class="style4">: <span class="style1"><?php echo $ctgl_masuk ;?></span></td>
  </tr>
  <tr>
    <td class="style4">Asuransi</td>
    <td class="style4">: <span class="style1"><?php echo $xasuransi ;?></span></td>
  </tr>
</table>
	</body>
</html>
