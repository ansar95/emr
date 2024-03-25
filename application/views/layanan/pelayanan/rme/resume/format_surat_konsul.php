
<title>Surat Konsul</title>
</head>
<body>
<p>
  <?php
$no_rm=$dtkonsulranap->no_rm;
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
?>  
</p>
<table width="100%" border="0" cellpadding="3" cellspacing="0">
  <tr align="center">
    <td colspan="6"><span style="font-size: 18px;"><?php echo getenv('V_NAMARS'); ?></span></td>
  </tr>
  <tr>
    <td colspan="6" align="center"><span style="font-size: 14px;"><?php echo getenv('V_ALAMATRS1'); ?></span></td>
  </tr>
  <tr align="center">
    <td colspan="6" align="center"><span style="font-size: 14px;"><?php echo getenv('V_ALAMATRS2'); ?></span></td>
  </tr>
  <tr>
    <td colspan="6" align="center"><span style="font-weight: bold; font-size: 20px;">SURAT KONSUL DOKTER</span></td>
  </tr>
  <tr>
    <td width="16%"><span style="font-size: 13px;">Nama Pasien</span></td>
    <td width="1%">:</td>
    <td width="40%" style="font-size: 13px;"><?php echo $nama_pasien;?></td>
    <td width="9%" style="font-size: 13px;">No.RM</td>
    <td width="1%">:</td>
    <td width="33%" style="font-size: 13px;"><?php echo $dtkonsulranap->no_rm;?></td>
  </tr>
  <tr>
    <td width="16%" style="font-size: 13px;">Dari Dokter</td>
    <td width="1%">:</td>
    <td width="40%" style="font-size: 13px;"><?php echo $dtkonsulranap->nama_dokter;?></td>
    <td width="9%" style="font-size: 13px;"></td>
    <td width="1%"></td>
    <td width="33%" style="font-size: 13px;">&nbsp;</td>
  </tr>
  <tr>
    <td style="font-size: 13px;">Untuk Dokter</td>
    <td>:</td>
    <td style="font-size: 13px;"><?php echo $dtkonsulranap->nama_dokter_jawab;?></td>
    <td style="font-size: 13px;"></td>
    <td></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td style="font-size: 13px;">Tanggal</td>
    <td>:</td>
    <td style="font-size: 13px;"><?php echo $dtkonsulranap->tanggal;?></td>
    <td style="font-size: 13px;">Jam</td>
    <td>:</td>
    <td style="font-size: 13px;"><?php echo $dtkonsulranap->jam;?></td>
  </tr>
  <tr>
    <td style="font-size: 13px;">&nbsp;</td>
    <td>&nbsp;</td>
    <td style="font-size: 1px;">&nbsp;</td>
    <td style="font-size: 13px;">&nbsp;</td>
    <td>&nbsp;</td>
    <td style="font-size: 13px;">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="6" style="font-size: 13px;"><span style="font-size: 13px; ">Isi Konsul</span></td>
  </tr>
  <tr>
    <td colspan="6" style="font-size: 13px;"><span style="font-size: 16px; font-style: italic;"><?php echo nl2br($dtkonsulranap->konsul);?></span></td>
  </tr>
  <tr>
    <td colspan="6" style="font-size: 13px;">&nbsp;</td>
  </tr>
  <tr>
    <td style="font-size: 13px;">&nbsp;</td>
    <td>&nbsp;</td>
    <td style="font-size: 1px;">&nbsp;</td>
    <td style="font-size: 13px;">&nbsp;</td>
    <td>&nbsp;</td>
    <td style="font-size: 13px;">Tanda Tangan Dokter</td>
  </tr>
  <tr>
    <td style="font-size: 13px;">&nbsp;</td>
    <td>&nbsp;</td>
    <td style="font-size: 1px;">&nbsp;</td>
    <td style="font-size: 13px;">&nbsp;</td>
    <td>&nbsp;</td>
    <td style="font-size: 13px;">&nbsp;</td>
  </tr>
  <tr>
    <td style="font-size: 13px;">&nbsp;</td>
    <td>&nbsp;</td>
    <td style="font-size: 1px;">&nbsp;</td>
    <td style="font-size: 13px;">&nbsp;</td>
    <td>&nbsp;</td>
    <td style="font-size: 13px;">&nbsp;</td>
  </tr>
  <tr>
    <td style="font-size: 13px;">&nbsp;</td>
    <td>&nbsp;</td>
    <td style="font-size: 1px;">&nbsp;</td>
    <td style="font-size: 13px;">&nbsp;</td>
    <td>&nbsp;</td>
    <td style="font-size: 13px;">_________________</td>
  </tr>
  <tr>
    <td style="font-size: 13px;">&nbsp;</td>
    <td>&nbsp;</td>
    <td style="font-size: 1px;">&nbsp;</td>
    <td style="font-size: 13px;">&nbsp;</td>
    <td>&nbsp;</td>
    <td style="font-size: 13px;">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="6" align="center" style="font-size: 13px;"><span style="font-weight: bold; font-size: 20px;">JAWABAN KONSUL</span></td>
  </tr>
  <tr>
    <td width="16%" style="font-size: 13px;">Pasien.</td>
    <td width="1%">:</td>
    <td width="40%" style="font-size: 13px;"><?php echo $nama_pasien.' ('.$no_rm.')';?></td>
    <td width="9%">&nbsp;</td>
    <td>&nbsp;</td>
    <td style="font-size: 13px;">&nbsp;</td>
  </tr>
  <tr>
    <td style="font-size: 13px;">Tanggal</td>
    <td>:</td>
    <td style="font-size: 13px;"><?php echo $dtkonsulranap->tanggaljawab;?></td>
    <td style="font-size: 13px;">Jam</td>
    <td>:</td>
    <td style="font-size: 13px;"><?php echo $dtkonsulranap->jamjawab;?></td>
  </tr>
  <tr>
    <td colspan="6" style="font-size: 13px;">&nbsp;</td>
  </tr>
  <?php
  // Misalnya, $dtkonsulranap->jawaban adalah teks dari field yang ingin diubah
  $textFromField = $dtkonsulranap->jawaban;

  // Mengonversi teks menjadi array per baris
  $arrayPerBaris = explode("\n", $textFromField);

  // Menampilkan setiap elemen array dengan foreach
  foreach ($arrayPerBaris as $baris) {
  ?>  
    <tr>
      <td colspan="6" style="font-size: 13px;"><span style="font-size: 16px; font-style: italic;"><?php echo $baris.'<br>';?></span></td>
    </tr>
  <?php 
  }
  ?>
  <tr>
    <td style="font-size: 13px;">&nbsp;</td>
    <td>&nbsp;</td>
    <td style="font-size: 1px;">&nbsp;</td>
    <td style="font-size: 13px;">&nbsp;</td>
    <td>&nbsp;</td>
    <td style="font-size: 13px;">&nbsp;</td>
  </tr>
  <tr>
    <td style="font-size: 13px;">&nbsp;</td>
    <td>&nbsp;</td>
    <td style="font-size: 1px;">&nbsp;</td>
    <td style="font-size: 13px;">&nbsp;</td>
    <td>&nbsp;</td>
    <td style="font-size: 13px;">Tanda Tangan Dokter</td>
  </tr>
  <tr>
    <td style="font-size: 13px;">&nbsp;</td>
    <td>&nbsp;</td>
    <td style="font-size: 1px;">&nbsp;</td>
    <td style="font-size: 13px;">&nbsp;</td>
    <td>&nbsp;</td>
    <td style="font-size: 13px;">&nbsp;</td>
  </tr>
  <tr>
    <td style="font-size: 13px;">&nbsp;</td>
    <td>&nbsp;</td>
    <td style="font-size: 1px;">&nbsp;</td>
    <td style="font-size: 13px;">&nbsp;</td>
    <td>&nbsp;</td>
    <td style="font-size: 13px;">&nbsp;</td>
  </tr>
  <tr>
    <td style="font-size: 13px;">&nbsp;</td>
    <td>&nbsp;</td>
    <td style="font-size: 1px;">&nbsp;</td>
    <td style="font-size: 13px;">&nbsp;</td>
    <td>&nbsp;</td>
    <td style="font-size: 13px;">_________________</td>
  </tr>
</table>
<p>&nbsp;</p>
<footer>
    <p style="font-size: 9px;"><?php echo '--- '.$nama_pasien.' ('.$no_rm.')';?></p>
</footer>
</body>
</html>