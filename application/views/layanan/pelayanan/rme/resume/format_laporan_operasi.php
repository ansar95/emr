
<html>
<head>
<title>Laporan Operasi</title>
<style type="text/css">

.style4 {font-family: Arial, Helvetica, sans-serif; font-size: 16px; font-weight: bold; }
.style27 {font-size: 12px; font-family: Arial, Helvetica, sans-serif;}
.style29 {font-family: Arial, Helvetica, sans-serif; font-size: 18px; font-weight: bold; }
.style39 {font-size: 11px; font-family: Arial, Helvetica, sans-serif; }
.style44 {font-size: 13px; font-family: Arial, Helvetica, sans-serif; }
.style47 {
	font-size: 14px;
	font-weight: bold;
	font-family: Arial, Helvetica, sans-serif;
}

<?php 
  $qry2 = $this->db->query("SELECT tgl_lahir,nama_pasien FROM pasien WHERE no_rm='$no_rm' limit 1");
  foreach ($qry2->result_array() as $brs2) {
    $tgl_lahir = $brs2['tgl_lahir'];
    $nama_pasien = $brs2['nama_pasien'];
  }  

  // $qry2 = $this->db->query("SELECT * FROM  emr_operasi_asesmen WHERE notransaksi_IN='$notransaksi_IN' limit 1");
  // foreach ($qry2->result_array() as $brs2) {
  //   $nama_dokter_opr = $brs2['nama_dokter_opr'];
  //   $nama_asisten = $brs2['nama_asisten'];
  //   $nama_perawat = $brs2['nama_perawat'];
  //   $nama_omlop = $brs2['nama_omlop'];
  //   $nama_anastesi = $brs2['nama_anastesi'];
  //   $nama_penata = $brs2['nama_penata'];
  //   $jenis_anastesi = $brs2['jenis_anastesi'];
  //   $jenis_operasi = $brs2['jenis_operasi'];
  //   $jaringan = $brs2['jaringan'];
  //   $pa = $brs2['pa'];
  //   $tindakan = $brs2['tindakan'];
  //   $tgloperasi = $brs2['tgloperasi'];
  //   $jamoperasimulai = $brs2['jamoperasimulai'];
  //   $jamoperasiselesai = $brs2['jamoperasiselesai'];
  //   $laporanoperasi = $brs2['laporanoperasi'];
  // }
  if ($dtlapoperasi->jenis_operasi == '1') {
      $jenis_operasi='Besar';
  } else if ($dtlapoperasi->jenis_operasi == '2') {
    $jenis_operasi='Sedang';
  } else if ($dtlapoperasi->jenis_operasi == '3') {
    $jenis_operasi='Kecil';
  } else if ($dtlapoperasi->jenis_operasi == '4') {
    $jenis_operasi='Khusus';
  } else if ($dtlapoperasi->jenis_operasi == '5') {
    $jenis_operasi='Emergency';
  } else {
    $jenis_operasi='';
  }
 
// Menghitung selisih waktu antara tanggal kelahiran dan hari ini
$selisih_waktu = date_diff(date_create($tgl_lahir), date_create($dtlapoperasi->tgloperasi));
$umur_tahun = $selisih_waktu->y;
$umur_bulan = $selisih_waktu->m;
$umur_hari = $selisih_waktu->d;
$umurnya=$umur_tahun.'  tahun '.$umur_bulan.' bulan '.$umur_hari.' hari';

?>
</style>
</head>
<body>
<table width="100%" border="0" cellspacing="0" cellpadding="2">
  <tr>
    <td colspan="3"><div align="center" class="style4"><?php echo ' '.getenv('V_NAMARS'); ?></div></td>
  </tr>
  <tr>
    <td colspan="3"><div align="center" class="style27"><?php echo ' '.getenv('V_ALAMATRS'); ?></div></td>
  </tr>
  <tr>
    <td colspan="3"><div align="center" class="style29">LAPORAN OPERASI </div></td>
  </tr>
  <tr>
    <td width="30%">&nbsp;</td>
    <td width="38%">&nbsp;</td>
    <td width="32%">&nbsp;</td>
  </tr>
</table>  
<table width="100%" border="1" cellpadding="3" cellspacing="0">
  <tr>
    <td width="21%" valign="middle" class="style27">Nama</td>
    <td width="32%" valign="middle" class="style27"><?php echo $nama_pasien; ?></td>
    <td width="15%" valign="middle" class="style27">No.RM</td>
    <td width="32%" valign="middle" class="style27"><?php echo $no_rm; ?></td>
  </tr>
  <tr>
    <td valign="middle" class="style27">Umur</td>
    <td valign="middle" class="style27"><?php echo $umurnya; ?></td>
    <td valign="middle" class="style27">Ruangan</td>
    <td valign="middle" class="style27">&nbsp;</td>
  </tr>
  <tr>
    <td valign="middle" class="style27">Ahli Bedah</td>
    <td valign="middle" class="style27"><?php echo $dtlapoperasi->nama_dokter_opr != '--Pilih--' ? $dtlapoperasi->nama_dokter_opr : ''; ?></td>
    <td valign="middle" class="style27"> Asisten</td>
    <td valign="middle" class="style27"><?php echo $dtlapoperasi->nama_asisten != '--Pilih--' ? $dtlapoperasi->nama_asisten : ''; ?></td>

  </tr>
  <tr>
    <td valign="middle" class="style27">Ahli Anastesi</td>
    <td valign="middle" class="style27"><?php echo $dtlapoperasi->nama_anastesi != '--Pilih--' ? $dtlapoperasi->nama_anastesi : ''; ?></td>
    <td valign="middle" class="style27">Omlop</td>
    <td valign="middle" class="style27"><?php echo $dtlapoperasi->nama_omlop != '--Pilih--' ? $dtlapoperasi->nama_omlop : ''; ?></td>
  </tr>
  <tr>
    <td valign="middle" class="style27">Penata Anastesi</td>
    <td valign="middle" class="style27"><?php echo $dtlapoperasi->nama_penata != '--Pilih--' ? $dtlapoperasi->nama_penata : ''; ?></td>

    <td valign="middle" class="style27">Jenis Anastesi</td>
    <td valign="middle" class="style27"><?php echo $dtlapoperasi->jenis_anastesi; ?></td>

  </tr>
  <tr>
    <td valign="middle" class="style27">Jenis Operasi</td>
    <td colspan="3" valign="middle" class="style27"><?php echo $jenis_operasi; ?></td>
  </tr>
  <tr>
    <td valign="middle" class="style27">Diagnosis Pre-Operatif</td>
    <td colspan="3" valign="middle" class="style27"><?php echo $dtlapoperasi->diagpreoperasi; ?></td>
  </tr>
  <tr>
    <td valign="middle" class="style27">Diagnosis Post-Operatif</td>
    <td colspan="3" valign="middle" class="style27"><?php echo $dtlapoperasi->diagnosapost; ?></td>
  </tr>
  <tr>
    <td valign="middle" class="style27">Jaringan yang di-eksisi / Insisi</td>
    <td valign="middle" class="style27"><?php echo $dtlapoperasi->jaringan; ?></td>
    <td valign="middle" class="style27">Dikirim ke Lab PA</td>
    <td valign="middle" class="style27"><?php echo $dtlapoperasi->pa == 1 ? "Ya" : "Tidak" ; ?></td>
  </tr>
  <tr>
    <td valign="middle" class="style27">Nama Tindakan</td>
    <td colspan="3" valign="middle" class="style27"><?php echo $dtlapoperasi->tindakan; ?></td>
  </tr>
  <tr>
    <td valign="middle" class="style27">Tanggal Operasi</td>
    <td colspan="3" valign="middle" class="style27"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td><?php echo $dtlapoperasi->tgloperasi; ?></td>
        <td>Jam Mulai :<?php echo $dtlapoperasi->jamoperasimulai;?></td>
        <td>Jam Selesai :<?php echo $dtlapoperasi->jamoperasiselesai;?></td>
        <?php
          $sel=strtotime($dtlapoperasi->jamoperasiselesai)-strtotime($dtlapoperasi->jamoperasimulai);
          $jam = floor($sel / (60 * 60));
          $menit = floor(($sel % (60 * 60)) / 60);
          $detik = $sel % 60;
        ?>
        <td>Lama Operasi : <?php echo $jam.' Jam '.$menit.' menit';?></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="4" valign="top" class="style44"><p>LAPORAN OPERASI</p>
    <p><?php echo nl2br($dtlapoperasi->laporanoperasi);?></p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>Tanda Tangan Ahli Bedah</p>
    <p>&nbsp;</p></td>
  </tr>
</table>
</body>
</html>