
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Bukti Regis IGD</title>
<style type="text/css">
.style6 {font-family: Geneva, Arial, Helvetica, sans-serif; font-size: 12px; }
.style61 {font-family: Geneva, Arial, Helvetica, sans-serif; font-size: 11px; }
.style8 {font-family: "Times New Roman", Times, serif}
.bottom {		border-bottom: 1px dashed black;
}
</style>
</head>

<body>
<?php
		$qry2=$this->db->query("SELECT *,register.golongan as asuransi1,register_detail.nama_unit as nama_unit8, pasien.sex as sex, register_detail.nama_dokter as nama_dokter, pasien.alamat as alamat FROM register INNER JOIN pasien ON register.no_rm = pasien.no_rm INNER JOIN register_detail ON register.notransaksi =register_detail.notransaksi and register.id = '".$id."' LIMIT 1");
		foreach ($qry2->result_array() as $brs2) {
		$xno_rm=$brs2['no_rm'];
		$xnama_pasien=$brs2['nama_pasien'];
		if ($brs2['sex']=='L') { $xsex='Laki-Laki' ;} else { $xsex='Perempuan';};					
		$xperawatan=$brs2['nama_unit8'];
		$xtglm=$brs2['tgl_masuk'];
		$ctanggal=substr($xtglm,8,2).'-'.substr($xtglm,5,2).'-'.substr($xtglm,0,4);
		$xjam_masuk=$brs2['jam_masuk'];
		$xtgl_lahir=$brs2['tgl_lahir'];
		$xasuransi=$brs2['asuransi1'];
		$xnoasuransi=$brs2['no_askes'];
		$xnotransaksi=$brs2['notransaksi'];
		$xnama_dokter=$brs2['nama_dokter'];
		$xalamat=$brs2['alamat'];
		$xhp=$brs2['hp'];
		$xnik=$brs2['nik'];
		if ($brs2['sex']=='L') { $xjk='Laki-laki';} else { $xjk='Perempuan';};					
		if ($brs2['barulama']=='1') { $xkunjungan='Baru' ;} else { $xkunjungan='Lama';};					
		if ($brs2['barulama']=='1') { $xjenisKasus='Baru' ;} else { $xjenisKasus='Lama';};					
		$xcatatan=$brs2['catatan'];

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

		$qry7=$this->db->query("SELECT byregisigd from setup LIMIT 1");
		foreach ($qry7->result_array() as $brs7) { 
			$byregisigd=$brs7['byregisigd'];
		}
	?>
<table width="100%" border="1" cellspacing="0" cellpadding="2">
  <tr>
    <td><table width="100%" border="0" cellspacing="1" cellpadding="4">
      <tr>
        <td width="1%">&nbsp;</td>
        <!-- <td width="14%">&nbsp;</td> -->
        	
			
        <td width="85%"><span style="font-size: 15px;"><b  style="font-size: 18px;">RSUD. KOTA MAKASSAR</b> <br />
            <span class="style8">Jl. Imam Bonjol No. 14, Kabupaten Banggai</span> <br />
          <span class="style8">(0411) 8037252 </span></span></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="4" cellpadding="4">
      <tr>
        <td width="75%"><div align="center"><strong>BUKTI REGISTRASI PENDAFTARAN PASIEN  2<br />
          INSTALASI GAWAT DARURAT</strong></div></td>
        <td width="25%" valign="middle" >No. Rawat <br />
          <?php echo $xnotransaksi; ?></td>
      </tr>
      
    </table></td>
  </tr>
  <tr>
    <td><table  width="100%" border="0" cellspacing="4" cellpadding="3">
      <tr class="">
        <td width="16%">Tanggal </td>
        <td width="41%">: <?php echo $ctanggal.',  Jam : '.$xjam_masuk; ?></td>
        <td width="18%">No. RM </td>
        <td width="25%">: <?php echo $xno_rm; ?> </td>
      </tr>
      <tr class="">
        <td>Nama</td>
        <td>: <?php echo $xnama_pasien; ?></td>
        <td>Jns. Pasien </td>
        <td>: <?php echo $xasuransi; ?> </td>
      </tr>
      <tr class="">
        <td>Tgl. Lahir </td>
        <td>: <?php echo $ctgl_lahir; ?></td>
        <td>No. Peserta </td>
        <td>: <?php echo $xnoasuransi; ?></td>
      </tr>
      <tr class="">
        <td>Umur </td>
        <td>: <?php echo $xusia; ?></td>
        <td>No. KTP/SIM </td>
        <td>: <?php echo $xnik; ?></td>
      </tr>
      <tr class="">
        <td>Jenis Kelamin </td>
        <td>: <?php echo $xjk; ?></td>
        <td >Dokter </td>
        <td colspan="2">: <?php echo $xnama_dokter; ?></td>
      </tr>
      <tr class="">
        <td>No. Telp </td>
        <td>: <?php echo $xhp; ?></td>
        <td>Biaya Registrasi </td>
        <td colspan="2"> : Rp.<?php echo formatuang($byregisigd).',-'; ?></td>
      </tr>
      <tr class="bottom">
        <td>Alamat</td>
        <td colspan="2">: <?php echo $xalamat; ?></td>
      </tr>
    </table></td>
  </tr>

  <tr>
    <td><table width="100%" border="0" cellspacing="2" cellpadding="2">
      <tr>
		<td><div class="style61" align="center">Terima Kasih Atas Kepercayaan Anda Pada Pelayanan <?php echo ' '.getenv('V_NAMARS'); ?>, Semoga Lekas Sembuh</div></td>
      </tr>
    </table></td>
  </tr>

</table>
</body>
</html>