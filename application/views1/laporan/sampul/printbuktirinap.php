<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Bukti Regis Ranap</title>
<style type="text/css">
.style6 {font-family: Geneva, Arial, Helvetica, sans-serif; font-size: 12px; }
.style61 {font-family: Geneva, Arial, Helvetica, sans-serif; font-size: 13px; }
.style7 {font-family: Geneva, Arial, Helvetica, sans-serif; font-size: 14px; font-weight: bold;}
.style8 {font-family: Geneva, Arial, Helvetica, sans-serif; font-size: 12x; font-weight: bold;}


.style10 {
	font-size: 15px;
	font-family: Geneva, Arial, Helvetica, sans-serif;
	font-weight: bold;
}
.style11 {
	font-family: Geneva, Arial, Helvetica, sans-serif;
	font-weight: bold;
	font-size: 16px;
}
</style>
</head>

<body>

<?php
  $qry2 = $this->db->query("SELECT pasien.nama_pasien as nama_pasien, pasien.no_askes as no_askes, register.no_rm as no_rm,register.tgl_masuk as tgl_masuk, register.jam_masuk as jam_masuk, register_detail.nama_unit as nama_unit, register_detail.kode_unit as kode_unit, register_detail.no_antrian as no_antrian, pasien.sex as sex, pasien.alamat as alamat, pasien.hp as hp, register.golongan as asuransi, register.user2 as user2, pasien.umur as umur, pasien.tgl_lahir as tgl_lahir, register_detail.notransaksi as notransaksi, pasien.no_askes as no_askes, pasien.nik as nik, pasien.sex as sex, pasien.nama_ortu as nama_ortu, pasien.nama_png as nama_png, pasien.pekerjaan_suamiistri as pekerjaan_suamiistri, pasien.telppj as telppj, register_detail.nama_kelas as nama_ruang_rawat,register.bagian as bagian, register.kode_keluarpada as kode_keluarpada, register_detail.tgl_masuk_kamar as tgl_regis_inap, register_detail.jam_masuk as jam_masuk_inap, register_detail.kode_kamar as kode_kamar FROM register_detail INNER JOIN pasien ON register_detail.no_rm = pasien.no_rm INNER JOIN register ON register_detail.notransaksi =register.notransaksi where register_detail.id = '" . $id . "' LIMIT 1");;
  foreach ($qry2->result_array() as $brs2) {
    $xnama_pasien = $brs2['nama_pasien'];
    $xnotransaksi = $brs2['notransaksi'];
    $xno_rm = $brs2['no_rm'];
    $xtgl_masuk = $brs2['tgl_masuk'];
    $xjam_masuk = $brs2['jam_masuk'];
    $xnama_unit = $brs2['nama_unit'];
    $xkode_unit = $brs2['kode_unit'];
    $xnomor_antrian = $brs2['no_antrian'];
    $xsex = $brs2['sex'];
    $xalamat = $brs2['alamat'];
    // $xumur = $brs2['umur'];
    $xhp = $brs2['hp'];
    $xasuransi = $brs2['asuransi'];
    $xuser2 = $brs2['user2'];
    $xtgl_lahir = $brs2['tgl_lahir'];
    $xno_askes = $brs2['no_askes'];
    $xnik = $brs2['nik'];
    $xsex = $brs2['sex'];
    $xnama_keluarga = $brs2['nama_ortu'];
    $xnama_pjawab = $brs2['nama_png'];
    $xalamat_pjawab = $brs2['pekerjaan_suamiistri']; //pindah field
    $xtelp_pjawab = $brs2['telppj'];
    $xnama_ruang_rawat = $brs2['nama_ruang_rawat'];
    $xbagian = $brs2['bagian'];
    $xkode_keluarpada = $brs2['kode_keluarpada'];
    $xtgl_regis_inap = $brs2['tgl_regis_inap'];
    $xjam_masuk_inap = $brs2['jam_masuk_inap'];

    $xkode_kamar = $brs2['kode_kamar'];
    $xnama_kamar="";
    $qry3 = $this->db->query("SELECT nama_kamar  FROM mkamar where kode_kamar = '" . $xkode_kamar . "' LIMIT 1");
    foreach ($qry3->result_array() as $brs3) {
        $xnama_kamar=$brs3['nama_kamar'];
    }
    // $xtgl_lahir = '2019-10-10';
    if ( $xasuransi == 'BPJS') { 
      $xno_askes = $brs2['no_askes'];
    } else {
      $xno_askes = '-';
    }  
  }

  $xumur=umur($xtgl_lahir);

  if ( $xbagian !='JALAN' and $xkode_keluarpada =='') {

?>

<table width="100%" border="1" cellspacing="0" cellpadding="2">
  <tr>
    <td><table width="100%" border="0" cellspacing="3" cellpadding="3">
        
        <td valign="bottom"><div class="style10"><?php echo ' '.getenv('V_NAMARS'); ?> </div></td>
      </tr>
      <tr>
        <td valign="middle"><div><span class="style6">Jl. Imam Bonjol No. 14, Kabupaten Banggai </span></div></td>
      </tr>
      <tr>
        <td valign="top"><div><span class="style6">(0411) 8037252</span></div></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td style="height: 30px;"><div align="center" class="style11">FORMULIR PENERIMAAN PASIEN RAWAT INAP </div></td>
  </tr>
  
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="20%" class="style6">No. Register </td>
        <td width="1%">:</td>
        <td colspan="4"><table width="100%" border="0" cellspacing="1" cellpadding="2">
          <tr>
            <td width="38%" class="style6"><?php echo $xnotransaksi ;?></td>
            <td width="62%" class="style6">Tanggal / Jam Masuk :<?php echo $xtgl_regis_inap.' / '.$xjam_masuk_inap ;?> </td>
          </tr>
        </table></td>
        </tr>
      <tr>
        <td height="20" class="style6">Nomor Rekam Medik </td>
        <td>:</td>
        <td colspan="4"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="20%" class="style8"><?php echo $xno_rm ;?></td>
          </tr>
        </table></td>
        </tr>
      <tr>
        <td><span class="style6">Nama Pasien </span></td>
        <td>:</td>
        <td width="35%" class="style8"><?php echo $xnama_pasien ;?></td>
        <td width="15%" class="style6">Cara Bayar </td>
        <td width="1%">:</td>
        <td width="22%" class="style6"><?php echo $xasuransi ;?></td>
      </tr>
      <tr>
        <td><span class="style6">Ruang Rawat </span></td>
        <td>:</td>
        <td width="35%" class="style6"><?php echo $xnama_ruang_rawat ;?></td>
        <td width="15%" class="style6">Kamar </td>
        <td width="1%">:</td>
        <td width="22%" class="style6"><?php echo $xnama_kamar ;?></td>
      </tr>
      <tr>
        <td rowspan="2"><p class="style6">No. Identitas</p>          </td>
        <td rowspan="2">:</td>
        <td rowspan="2" class="style7"><?php echo $xnik ;?></td>
        <td class="style6">No.Peserta</td>
        <td>:</td>
        <td class="style8"><?php echo $xno_askes ;?></td>
      </tr>
      <tr>
        <td class="style6">Jenis Kelamin </td>
        <td>:</td>
        <td class="style6"><?php echo $xsex ;?></td>
      </tr>
      <tr>
        <td><span class="style6">Alamat</span></td>
        <td>:</td>
        <td class="style6"><?php echo $xalamat ;?></td>
        <td class="style6">Umur</td>
        <td>:</td>
        <td class="style6"><?php echo $xumur ;?></td>
      </tr>
      <tr>
        <td class="style6">Nama Keluarga </td>
        <td>:</td>
        <td class="style6"><?php echo $xnama_keluarga ;?></td>
        <td class="style6">Tanggal Lahir </td>
        <td>:</td>
        <td class="style6"><?php echo $xtgl_lahir ;?></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="24%" rowspan="2" class="style6" style="vertical-align:top">Penanggung Jawab Pasien,  </td>
        <td width="15%" class="style6" style="vertical-align:top">Nama</td>
        <td width="1%" class="style6" style="vertical-align:top">:</td>
        <td width="60%" class="style6" style="vertical-align:top"><?php echo $xnama_pjawab ;?></td>
      </tr>

      <tr>
        <td class="style6" style="vertical-align:top">Alamat/Telp/Hp</td>
        <td class="style6" style="vertical-align:top">:</td>
        <td class="style6" style="vertical-align:top"><?php echo $xalamat_pjawab.' / '.$xtelp_pjawab ;?></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="1" cellpadding="2">
      <tr>
	  	<td width="7%">&nbsp;</td>
        <td width="30%" class="style6"><div align="center">Penanggung Jawab Pasien </div></td>
        <td width="23%">&nbsp;</td>
        <td width="30%" class="style6"><div align="center">Petugas</div></td>
        <td width="10%">&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
	  	<td>&nbsp;</td>
        <td><div align="center">____________________________</div></td>
        <td>&nbsp;</td>
        <td><div align="center">____________________________</div></td>
        <td>&nbsp;</td>
      </tr>
    </table></td>
  </tr>
</table>

<?php   
} 
?>
</body>
</html>

<!-- editing tgl 25 ok -->