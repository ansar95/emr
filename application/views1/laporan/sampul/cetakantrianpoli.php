<html>

<head>
  <style type="text/css">
    .style1 {
      font-family: Verdana, Arial, Helvetica, sans-serif;
      font-size: 14px;
    }
    .style3 {
      font-family: Verdana, Arial, Helvetica, sans-serif;
      font-size: 11px;
    }
    @page {
      margin: 20px 15px 10px 30px
    }

    .style2 {
      font-size: 12px
    }
    .style4 {
      font-size: 30px
    }
  </style>
</head>

<body>
  <?php
  $qry2 = $this->db->query("SELECT pasien.nama_pasien as nama_pasien, pasien.no_askes as no_askes, register.no_rm as no_rm,register.tgl_masuk as tgl_masuk, register.jam_masuk as jam_masuk, register_detail.nama_unit as nama_unit, register_detail.kode_unit as kode_unit, register_detail.no_antrian as no_antrian, pasien.sex as sex, pasien.alamat as alamat, pasien.hp as hp, register.golongan as asuransi, register.user2 as user2, pasien.umur as umur, pasien.tgl_lahir as tgl_lahir FROM register INNER JOIN pasien ON register.no_rm = pasien.no_rm INNER JOIN register_detail ON register.notransaksi =register_detail.notransaksi and register.id = '" . $id . "' LIMIT 1");;
  foreach ($qry2->result_array() as $brs2) {
    $xnama_pasien = $brs2['nama_pasien'];
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
    if ( $xasuransi == 'BPJS') { 
      $xno_askes = $brs2['no_askes'];
    } else {
      $xno_askes = '-';
    }  
  }

  // umur
  // $tanggal = new DateTime($xtgl_lahir);
  // $today = new DateTime('today');
  // $y = $today->diff($tanggal)->y;
  // $m = $today->diff($tanggal)->m;
  // $d = $today->diff($tanggal)->d;
  // $xumur=$y . " tahun " . $m . " bulan " . $d . " hari";
  $xumur=umur($xtgl_lahir);

  $ctgl_masuk = substr($xtgl_masuk, 8, 2) . '-' . substr($xtgl_masuk, 5, 2) . '-' . substr($xtgl_masuk, 0, 4);
  $qry4 = $this->db->query("SELECT * FROM register where no_rm='$xno_rm' and tgl_masuk='$xtgl_masuk'  LIMIT 1");;
  foreach ($qry4->result_array() as $brs4) {
    $notransaksi = $brs4['notransaksi'];
  }
  $qry5 = $this->db->query("SELECT * FROM register_detail where notransaksi='$notransaksi' and kode_unit='$xkode_unit'  LIMIT 1");;
  foreach ($qry5->result_array() as $brs5) {
    $dokter = $brs4['nama_dokter'];
    $kode_dokternya = $brs4['kode_dokter'];
  }
  //cari kode hurup poli
  // $qry3 = $this->db->query("SELECT huruppoli FROM munit where kode_unit='$xkode_unit' LIMIT 1");;
  $qry3 = $this->db->query("SELECT huruf_poli FROM munit_rj where kode_dokter='$kode_dokternya' LIMIT 1");;

  foreach ($qry3->result_array() as $brs3) {
    $huruppoli = $brs3['huruf_poli'];
  }
  
  
  ?>
  <table width="250" border="0" cellspacing="2">
    <tbody>
      <tr>
        <td colspan="2" class="style1" align="center">RSUD. KOTA MAKASSAR</td>
      </tr>
      <tr>
        <td colspan="2" class="style1"  align="center">Jl. Imam Bonjol No. 14, Kabupaten Banggai</td>
      </tr>
      <tr>
        <td colspan="2" class="style1" align="center">(0411) 8037252</td>
      </tr>
      <tr>
        <td colspan="2" class="style3" align="center"><hr style="border: none; border-top: dashed 1.5px;"/></td>
      </tr>
      <tr>
        <td colspan="2" class="style1" align="center">BUKTI REGISTER PENDAFTARAN</td>
      </tr>
      <tr class="style1">
        <td width="27%">Tanggal</td>
        <td>: <?php echo $ctgl_masuk.',  Jam : '.$xjam_masuk ?></td>
      </tr>
      <tr class="style1">
        <td width="27%">No. Rawat</td>
        <td>: <?php echo $notransaksi?></td>
      </tr>
      <!-- <tr class="style1">
        <td width="27%">No. Antri Poli</td>
        <td>: <?php echo $huruppoli . $xnomor_antrian; ?></td>
      </tr> -->
      <tr class="style1">
        <td width="27%">Nama</td>
        <td>: <?php echo $xnama_pasien?></td>
      </tr>
      <tr class="style1">
        <td width="27%">No. RM</td>
        <td>: <?php echo $xno_rm?></td>
      </tr>
      <tr class="style1">
        <td width="27%">No. Kartu</td>
        <td>: <?php echo $xno_askes?></td>
      </tr>
      <tr class="style1">
        <td width="27%">JK</td>
        <!-- <td>: <?php echo $xsex?></td> -->
        <td>: <?php echo $xsex=='L' ? 'Laki-Laki' : 'Perempuan' ?></td>
      </tr>
      <tr class="style1">
        <td width="27%">Alamat</td>
        <td>: <?php echo $xalamat?></td>
      </tr>
      <tr class="style1">
        <td width="27%">Umur</td>
        <td>: <?php echo $xumur?></td>
      </tr>
      <tr class="style1">
        <td width="27%">No. Telp</td>
        <td>: <?php echo $xhp?></td>
      </tr>
      <tr class="style1">
        <td width="27%">Jns. Pasien</td>
        <td>: <?php echo $xasuransi ?></td>
      </tr>
      <tr class="style1">
        <td width="27%">Ruang</td>
        <td>: <?php echo $xnama_unit ?></td>
      </tr>
      <tr class="style1">
        <td width="27%">Dokter</td>
        <td>: <?php echo $dokter ?></td>

      </tr>
      <tr class="style3">
        <td colspan="2" align="center"><hr style="border: none; border-top: dashed 1.5px;"/></td>
      </tr>
      <tr >
        <td width="27%" class="style3">Antrian Klinik</td>
        <td class="style4"><?php echo $huruppoli . $xnomor_antrian;?></td>
      </tr>
      <tr class="style3">
        <td colspan="2" align="center"><hr style="border: none; border-top: dashed 1.5px;"/></td>
      </tr>
      <tr class="style2">
        <td colspan="2" align="center"><i>Terima Kasih Atas Kepercayaan Anda</i><br />Bawalah Kartu Berobat Setiap Berkunjung</td>
      </tr>
      <tr>
      </tr>
      <tr class="style2">
        <td><?php echo '-- user : '.trim($xuser2).' --' ;?></td>
      </tr>

    

    </tbody>
  </table>
</body>

</html>