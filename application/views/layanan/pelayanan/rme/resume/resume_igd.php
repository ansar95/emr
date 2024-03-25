
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Resume Medis</title>
<style type="text/css">

.style4 {font-family: Arial, Helvetica, sans-serif; font-size: 16px; font-weight: bold; }
.style27 {font-size: 12px; font-family: Arial, Helvetica, sans-serif;}
.style29 {font-family: Arial, Helvetica, sans-serif; font-size: 18px; font-weight: bold; }
.style39 {font-size: 11px; font-family: Arial, Helvetica, sans-serif; }
.style44 {font-size: 12; font-family: Arial, Helvetica, sans-serif; font-weight: bold; }
.style47 {
	font-size: 14px;
	font-weight: bold;
	font-family: Arial, Helvetica, sans-serif;
}

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
    <td colspan="3"><div align="center" class="style29">RESUME MEDIS INSTALASI GAWAT DARURAT </div></td>
  </tr>
  <tr>
    <td width="30%">&nbsp;</td>
    <td width="38%">&nbsp;</td>
    <td width="32%">&nbsp;</td>
  </tr>

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
	$qry2 = $this->db->query("SELECT * FROM register_detail WHERE no_rm = '$no_rm' and notransaksi='$notransaksi' and kode_unit != 'IGDD' and kode_unit != 'IGDP'  order by id limit 1");
  foreach ($qry2->result_array() as $brs2) {
    $nama_unit = $brs2['nama_unit'];
    $tgl_masuk = $brs2['tgl_masuk'];
    $nama_dokter_detail = $brs2['nama_dokter'];
  }

  $qry2 = $this->db->query("SELECT * FROM register WHERE no_rm = '$no_rm' and notransaksi='$notransaksi' limit 1");
  foreach ($qry2->result_array() as $brs2) {
    $tgl_keluar = $brs2['tgl_keluar'];
  }

  if ($tgl_keluar == '0000-00-00') {
    $tgl_keluar =  date("Y-m-d");
  }

  $nama_dokter='';
  $qry2 = $this->db->query("SELECT nama_dokter FROM mdokter WHERE kode_dokter = '$kode_dokter' limit 1");
  foreach ($qry2->result_array() as $brs2) {
    $nama_dokter = $brs2['nama_dokter'];
  }

  if ( $nama_dokter == '') {
    $nama_dokter = $nama_dokter_detail;
  }
  
?>
  <tr>
    <td colspan="3"><table width="100%" border="1" cellspacing="0" cellpadding="3">
      <tr>
        <td width="20%" class="style39">NAMA PASIEN </span></td>
        <td width="50%" class="style39"><span class="style44"><?php echo $nama_pasien; ?></td>
        <td width="11%" class="style39">NO.RM</span></td>
        <td width="19%" class="style39"><span class="style44"><?php echo $no_rm; ?> </span></td>
      </tr>
      <tr>
        <td class="style39">TANGGAL LAHIR </span></td>
        <td class="style39"><span class="style44"><?php echo $tgl_lahir; ?> </td>
        <td class="style39">J,KELAMIN</span></td>
        <td class="style39"><span class="style44"><?php echo $jk; ?></span></td>
      </tr>
      <tr>
        <td class="style39">ALAMAT</span></td>
        <td class="style39"><span class="style44"><?php echo $alamat; ?></td>
        <td class="style39">TGL.MASUK</span></td>
        <td class="style39"><span class="style44"><?php echo tgl_format_indo_huruf($tgl_masuk); ?></span></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="3"><table width="100%" border="1" cellspacing="0" cellpadding="0">
      <tr>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="4">
          <tr>
            <td width="20%" valign="top" class="style27"><span class="style39">Alasan Masuk Rumah Sakit </span></td>
            <td width="1%" valign="top" class="style27"><span class="style39">:</span></td>
            <td width="79%" valign="top" class="style39"><?php echo nl2br($dtdiagnosaresume->alasan);?></td>
          </tr>
          <tr>
            <td valign="top" class="style27"><span class="style39">Ringkasan Masuk </span></td>
            <td valign="top" class="style27"><span class="style39">:</span></td>
            <td valign="top" class="style39"><?php echo nl2br($dtdiagnosaresume->riwayat);?></td>
          </tr>
          <tr>
            <td valign="top" class="style27"><span class="style39">Pemeriksaan Fisik </span></td>
            <td valign="top" class="style27"><span class="style39">:</span></td>
            <td valign="top" class="style39"><?php echo nl2br($dtdiagnosaresume->fisik);?></td>
          </tr>
          <tr>
            <td valign="top" class="style27"><span class="style39">Pemeriksaan Penunjang </span></td>
            <td valign="top" class="style27"><span class="style39">:</span></td>
            <td valign="top" class="style39"><?php echo nl2br($dtdiagnosaresume->penunjang);?></td>
          </tr>
          <tr>
            <td valign="top" class="style27"><span class="style39">Terapi pengobatan selama d Rumah Sakit </span></td>
            <td valign="top" class="style27"><span class="style39">:</span></td>
            <td valign="top" class="style39"><?php echo nl2br($dtdiagnosaresume->obatdirs);?></td>
          </tr>
          <tr>
            <td valign="top" class="style27"><span class="style39">Konsul antar bagian </span></td>
            <td valign="top" class="style27"><span class="style39">:</span></td>
            <td valign="top" class="style39"><?php echo nl2br($dtdiagnosaresume->konsul);?></td>
          </tr>
          <tr>
            <td valign="top" class="style27"><span class="style39">Diagosa Utama </span></td>
            <td valign="top" class="style27"><span class="style39">:</span></td>
            <td valign="top" class="style39"><?php echo nl2br($dtdiagnosaresume->diagnosautama);?></td>
          </tr>
          <tr>
            <td valign="top" class="style27"><span class="style39">Diagnosa Sekunder </span></td>
            <td valign="top" class="style27"><span class="style39">:</span></td>
            <td valign="top" class="style39"><?php echo nl2br($dtdiagnosaresume->diagnosasekunder);?></td>
          </tr>
          <tr>
            <td valign="top" class="style27"><span class="style39">Tindakan</span></td>
            <td valign="top" class="style27"><span class="style39">:</span></td>
            <td valign="top" class="style39"><?php echo nl2br($dtdiagnosaresume->tindakan);?></td>
          </tr>
          <tr>
            <td valign="top" class="style27"><span class="style39">Diet</span></td>
            <td valign="top" class="style27"><span class="style39">:</span></td>
            <td valign="top" class="style39"><?php echo nl2br($dtdiagnosaresume->diet);?></td>
          </tr>
          <tr>
            <td valign="top" class="style27"><span class="style39">Instruksi Follow up </span></td>
            <td valign="top" class="style27"><span class="style39">:</span></td>
            <td valign="top" class="style39"><?php echo nl2br($dtdiagnosaresume->followup);?></td>
          </tr>
          <tr>
            <td valign="top" class="style27"><span class="style39">Kondisi Pulang </span></td>
            <td valign="top" class="style27"><span class="style39">:</span></td>
            <?php if ($dtdiagnosaresume->kondisipulang == 1) { ?> <td valign="top" class="style39"><?php echo 'Sembuh';?></td><?php } ?>
            <?php if ($dtdiagnosaresume->kondisipulang == 2) { ?> <td valign="top" class="style39"><?php echo 'Di Rujuk';?></td><?php } ?>
            <?php if ($dtdiagnosaresume->kondisipulang == 3) { ?> <td valign="top" class="style39"><?php echo 'Pulang Atas Permintaan Sendiri';?></td><?php } ?>
            <?php if ($dtdiagnosaresume->kondisipulang == 4) { ?> <td valign="top" class="style39"><?php echo 'Meninggal';?></td><?php } ?>
          </tr>
          <tr>
            <td valign="top" class="style27"><span class="style39">Tanda Vital saat Pulang </span></td>
            <td valign="top" class="style27"><span class="style39">:</span></td>
            <td valign="top" class="style39"><?php echo 'Tensi ; '.$dtdiagnosaresume->tensi.'  Suhu : '.$dtdiagnosaresume->suhu.'  Nadi : '.$dtdiagnosaresume->nadi;?></td>
          </tr>
          <tr>
            <td valign="top" class="style27"><span class="style39">Pengobatan dilanjutkan pada </span></td>
            <td valign="top" class="style27"><span class="style39">:</span></td>
            <?php if ($dtdiagnosaresume->lanjut	 == 1) { ?> <td valign="top" class="style39"><?php echo 'Poliklinik';?></td><?php } ?>
            <?php if ($dtdiagnosaresume->lanjut	 == 2) { ?> <td valign="top" class="style39"><?php echo 'Puskesmas';?></td><?php } ?>
            <?php if ($dtdiagnosaresume->lanjut	 == 3) { ?> <td valign="top" class="style39"><?php echo 'Rumah Sakit Lain';?></td><?php } ?>
            <?php if ($dtdiagnosaresume->lanjut	 == 4) { ?> <td valign="top" class="style39"><?php echo 'Dokter Lain';?></td><?php } ?>
          </tr>
          <tr>
            <td valign="top" class="style27"><span class="style39">Tanggal Kontrol Poli </span></td>
            <td valign="top" class="style27"><span class="style39">:</span></td>
            <td valign="top" class="style39"><?php echo $dtdiagnosaresume->tglkontrol;?></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><div align="center" class="style47">TERAPI PULANG </div></td>
      </tr>
      <tr>
        <td><table width="100%" border="1" cellspacing="0" cellpadding="3">
          <tr>
            <td width="35%" valign="middle" class="style39"><div align="center"><strong>Nama Obat </strong></div></td>
            <td width="10%" valign="middle" class="style39"><div align="center"><strong>Jumlah</strong></div></td>
            <td width="40%" valign="middle" class="style39"><div align="center"><strong>Dosis</strong></div></td>
            <td width="15%" valign="middle" class="style39"><div align="center"><strong>Cara Pemberian </strong></div></td>
          </tr>
          <?php
          $qry2 = $this->db->query("SELECT * FROM  emr_rekonsiliasiobat WHERE no_rm = '$no_rm' and notransaksi='$notransaksi' and jenis=3");
          $rute='';
          foreach ($qry2->result_array() as $brs2) {
            if ($brs2['rute']==1) { $rute = 'Oral';}
            if ($brs2['rute']==2) { $rute = 'Parenteral';}
            if ($brs2['rute']==3) { $rute = 'Topikal';}
            if ($brs2['rute']==4) { $rute = 'Supositoria';}
            if ($brs2['rute']==5) { $rute = 'Sublingual';}
            if ($brs2['rute']==6) { $rute = 'Bukal';}
            if ($brs2['rute']==7) { $rute = 'Lainnya';}
					?>
            <tr>
              <td class="style39"><?php echo $brs2['nama_obat']; ?></td>
              <td class="style39"><?php echo '' ?></td>
              <td class="style39"><?php echo $brs2['perubahan']; ?></td>
              <td class="style39"><?php echo $rute; ?></td>
            </tr>												
					<?php
						}
          ?>              
        </table></td>
      </tr>
      <tr>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td colspan="5" class="style39"><div align="center"><?php echo 'Makassar' ;?>,<?php echo " ".tgl_format_indo_huruf($tgl_keluar); ?></div></td>
            </tr>
          <tr>
            <td width="6%">&nbsp;</td>
            <td width="34%" class="style27"><div align="center">Tanda Tangan Pasien/Keluarga</div></td>
            <td width="20%" class="style27">&nbsp;</td>
            <td width="33%" class="style27"><div align="center">Dokter Penanggung Jawab Pelayanan </div></td>
            <td width="7%">&nbsp;</td>
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
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><div align="center">_______________________________</div></td>
            <td>&nbsp;</td>
            <td class="style39"><div align="center"><?php echo $nama_dokter;?></div></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr> <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
