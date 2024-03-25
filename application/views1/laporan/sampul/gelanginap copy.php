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
.style4 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 20px; }

@page{margin: 70px 60px}

		</style>			
	</head>

	<body>
	<?php
	$qry2=$this->db->query("SELECT * FROM register INNER JOIN pasien ON register.no_rm = pasien.no_rm INNER JOIN register_detail ON register.notransaksi =register_detail.notransaksi and register.id = '".$id."' LIMIT 1");;
				foreach ($qry2->result_array() as $brs2) {
					$xnama_pasien=$brs2['nama_pasien'];
					$xalamat=$brs2['alamat'];
					$xno_rm=$brs2['no_rm'];
					$xtgl_lahir=$brs2['tgl_lahir'];
					//$ctgl_lahir=substr($xtgl_lahir,9,2).'-'.+substr($xtgl_lahir,6,2).'-'.substr($xtgl_lahir,1,4);
					if ($brs2['sex']=='L') { $xsex='Laki-Laki' ;} else { $xsex='Perempuan';};							
				}
				  //tanggal lahir
					//$birthDt = $xtgl_lahir;
					$ctgl_lahir=substr($xtgl_lahir,8,2).'-'.substr($xtgl_lahir,5,2).'-'.substr($xtgl_lahir,0,4);
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
<table width="350" border="0" cellspacing="0">
  
  <tr>
    <!-- <td width="40" rowspan="4"><img src="assets/img/logogelang.png" width="50" height="50"></td> -->
    <td><span class="style4">No. RM</span></td>
    <td class="style4">: <span class="style1"><?php echo $xno_rm ;?></span></td>
  </tr>
  <tr>
    <td width="40"><span class="style4">Nama</span></td>
    <td width="310" class="style4">: <span class="style1"><?php echo $xnama_pasien ;?></span></td>
  </tr>
  <tr>
    <td class="style4">Umur</td>
    <td class="style4">: <span class="style1"><?php echo $y.' THN' ;?></span></td>
  </tr>
  <tr>
    <td class="style4">Tgl.Lahir</td>
    <td class="style4">: <span class="style1"><?php echo $ctgl_lahir ;?></span></td>
  </tr>
</table>

	</body>
</html>
