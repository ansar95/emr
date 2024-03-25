
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">

.style3 {font-family: Arial, Helvetica, sans-serif; font-size: 12px;  }
.style4 {font-family: Arial, Helvetica, sans-serif; font-size: 14px; font-weight: bold; }
.style21 {font-family: Arial, Helvetica, sans-serif; font-size: 12; }
.style22 {font-size: 10}
.style25 {font-weight: bold; font-family: Arial, Helvetica, sans-serif;}
.style26 {font-size: 12px; }
.style27 {font-size: 12px; font-family: Arial, Helvetica, sans-serif;}
.style29 {font-family: Arial, Helvetica, sans-serif; font-size: 16px; font-weight: bold; }

body {
    margin-left: 30px;
    margin-right: 30px;
}

</style>
</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="2">
  <tr>
    <td colspan="3"><div align="center" class="style4"><?php echo getenv('V_NAMARS'); ?></div></td>
  </tr>
  <tr>
    <td colspan="3"><div align="center" class="style27"><?php echo getenv('V_ALAMATRS'); ?></div></td>
  </tr>
  <tr>
    <td colspan="3"><div align="center" class="style29">RESUME MEDIS RAWAT JALAN </div></td>
  </tr>
  <tr>
    <td width="30%">&nbsp;</td>
    <td width="38%">&nbsp;</td>
    <td width="32%">&nbsp;</td>
  </tr>
      <!-- $data['dtdiagnosaresume'] = $dtdiagnosaresume; -->
			<!-- $data['no_rm'] = $no_rm; -->
			<!-- $data['notransaksi'] = $notransaksi; -->
			<!-- $data['kode_dokter'] = $kode_dokter; -->
<?php
	$qry2 = $this->db->query("SELECT nama_pasien, tgl_lahir, alamat, provinsi, kota, kecamatan, desa, sex FROM pasien WHERE no_rm = '$no_rm' LIMIT 1");

  foreach ($qry2->result_array() as $brs2) {
      $nama_pasien = $brs2['nama_pasien'];
      $alamat = '';
      // Menambahkan setiap bagian alamat yang tidak kosong ke variabel $alamat
      if (!empty($brs2['alamat'])) {
          $alamat .= $brs2['alamat'];
      }
      if (!empty($brs2['desa'])) {
          $alamat .= (!empty($alamat)) ? ', ' . $brs2['desa'] : $brs2['desa'];
      }
      if (!empty($brs2['kecamatan'])) {
          $alamat .= (!empty($alamat)) ? ', ' . $brs2['kecamatan'] : $brs2['kecamatan'];
      }
      if (!empty($brs2['kota'])) {
          $alamat .= (!empty($alamat)) ? ', ' . $brs2['kota'] : $brs2['kota'];
      }
      if (!empty($brs2['provinsi'])) {
          $alamat .= (!empty($alamat)) ? ', ' . $brs2['provinsi'] : $brs2['provinsi'];
      }
      $tgl_lahir = $brs2['tgl_lahir'];
      $sex = $brs2['sex'];
      $jk = '';

      if (!empty($sex)) {
          $firstChar = strtoupper(substr($sex, 0, 1)); // Mengambil huruf pertama dan mengubahnya menjadi huruf besar
          
          if ($firstChar === 'L') {
              $jk = 'Laki-Laki';
          } elseif ($firstChar === 'P') {
              $jk = 'Perempuan';
          }
          // Jika huruf pertama tidak 'L' atau 'P', maka $jk akan tetap kosong
      }
  }
	$qry2 = $this->db->query("SELECT * FROM register_detail WHERE no_rm = '$no_rm' and notransaksi='$notransaksi' limit 1");
  foreach ($qry2->result_array() as $brs2) {
    $nama_unit = $brs2['nama_unit'];
    $tgl_masuk = $brs2['tgl_masuk'];
  }
  
?>
  <tr>
    <td colspan="3"><table width="100%" border="0" cellspacing="0" cellpadding="3">
      <tr>
        <td class="style3" width="20%">NAMA PASIEN </td>
        <td class="style3" width="1%">:</td>
        <td class="style3" width="49%"> <?php echo $nama_pasien; ?></td>
        <td class="style3" width="11%">NO.RM</td>
        <td class="style3" width="19%">: <?php echo $no_rm; ?></td>
      </tr>
      <tr>
        <td class="style3">TANGGAL LAHIR </td>
        <td class="style3">:</td>
        <td class="style3"><?php echo $tgl_lahir; ?></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td class="style3" valign="top">ALAMAT</td>
        <td class="style3" valign="top">:</td>
        <td class="style3" valign="top"><?php echo $alamat; ?></td>
        <td class="style3" valign="top">J,KELAMIN</td>
        <td class="style3" valign="top">: <?php echo $jk; ?></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="3">
      <table width="100%" border="1" cellspacing="0" cellpadding="3">
        <tr>
          <td width="23%" class="style3"><div align="center" class="style26"><span class="style25">URAIAN</span></div></td>
          <td width="39%" class="style3"><div align="center" class="style26"><span class="style25">POLIKLINIK I (Sesuai Rujukan) </span></div></td>
          <td width="38%" class="style3"><div align="center" class="style26"><span class="style25">POLIKLINIK II </span></div></td>
        </tr>
        <tr>
          <td class="style3"><span class="style21">Poliklinik</span></td>
          <td class="style3"><span class="style22"><?php echo $nama_unit;?></span></td>
          <td class="style3"><span class="style22"></span></td>
        </tr>
        <tr>
          <td class="style3"><span class="style21">Sub Divisi </span></td>
          <td class="style3"><span class="style22"></span></td>
          <td class="style3"><span class="style22"></span></td>
        </tr>
        <tr>
          <td class="style3"><span class="style21">Tanggal Pelayanan </span></td>
          <td class="style3"><span class="style22"><?php echo $tgl_masuk; ?></span></td>
          <td class="style3"><span class="style22"></span></td>
        </tr>
        <tr>
          <td height="60" class="style3" valign="top"><span class="style21">Anamnesis</span></td>
          <td class="style3" valign="top"><span class="style22"><?php echo nl2br($dtdiagnosaresume->anamnesis);?></span></td>
          <td class="style3" valign="top"><span class="style22"></span></td>
        </tr>
        <tr>
          <td height="60" class="style3" valign="top"><span class="style21">Hasil Pemeriksaan Fisik </span></td>
          <td class="style3" valign="top"><span class="style22"><?php echo nl2br($dtdiagnosaresume->fisik);?></span></td>
          <td class="style3" valign="top"><span class="style22"></span></td>
        </tr>
        <tr>
          <td height="60" class="style3" valign="top"><span class="style21">Pemeriksaan Penunjang </span></td>
          <td class="style3" valign="top"><span class="style22"><?php echo $dtdiagnosaresume->penunjang;?></span></td>
          <td class="style3" valign="top"><span class="style22"></span></td>
        </tr>
        <tr>
          <td height="30" class="style3" valign="top" valign="top"><span class="style21">Diagnosis</span></td>
          <td class="style3" valign="top"><span class="style22"><?php echo nl2br($dtdiagnosaresume->diagnosis);?></span></td>
          <td class="style3" valign="top"><span class="style22"></span></td>
        </tr>
        <tr>
          <td height="60" class="style3" valign="top"><span class="style21">Terapi</span></td>
          <td class="style3" valign="top"><span class="style22"><?php echo  nl2br($dtdiagnosaresume->terapi);?></span></td>
          <td class="style3" valign="top"><span class="style22"></span></td>
        </tr>
        <tr>
          <td height="60" class="style3" valign="top"><span class="style21">Nama &amp; TTD Dokter </span></td>
          <td class="style3" valign="top"><span class="style22"></span></td>
          <td class="style3" valign="top"><span class="style22"></span></td>
        </tr>
      </table>
    </td>
  </tr>
</table>
</body>
</html>
