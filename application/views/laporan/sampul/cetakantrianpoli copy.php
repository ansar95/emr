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

    .style4 {
      font-family: Verdana, Arial, Helvetica, sans-serif;
      font-size: 10px;
    }

    @page {
      margin: 25px 15px 10px 10px
    }

    .style6 {
      font-size: 60px;
      font-weight: bold;
    }

    .style7 {
      font-size: 10px
    }
  </style>
</head>

<body>
  <?php
  $qry2 = $this->db->query("SELECT * FROM register INNER JOIN pasien ON register.no_rm = pasien.no_rm INNER JOIN register_detail ON register.notransaksi =register_detail.notransaksi and register.id = '" . $id . "' LIMIT 1");;
  foreach ($qry2->result_array() as $brs2) {
    $xnama_pasien = $brs2['nama_pasien'];
    $xno_rm = $brs2['no_rm'];
    $xtgl_masuk = $brs2['tgl_masuk'];
    $xnama_unit = $brs2['nama_unit'];
    $xkode_unit = $brs2['kode_unit'];
    $xnomor_antrian = $brs2['no_antrian'];
  }
  $ctgl_masuk = substr($xtgl_masuk, 8, 2) . '-' . substr($xtgl_masuk, 5, 2) . '-' . substr($xtgl_masuk, 0, 4);
  //cari kode hurup poli
  $qry3 = $this->db->query("SELECT huruppoli FROM munit where kode_unit='$xkode_unit' LIMIT 1");;
  foreach ($qry3->result_array() as $brs3) {
    $huruppoli = $brs3['huruppoli'];
  }
  ?>
  <table width="183" border="0" cellspacing="2">
    <tr>
      <td colspan="2">
        <div align="center"><span class="style1"><?php echo ' '.getenv('V_NAMARS'); ?></span></div>
      </td>
    </tr>
    <tr>
      <td colspan="2">
        <div align="center"><span class="style2">ANTRIAN POLI</span></div>
      </td>
    </tr>
    <tr>
      <td colspan="2" class="style4">
        <div align="center"><span class="style1"><?php echo $xnama_unit . '|' . $ctgl_masuk; ?></span></div>
      </td>
    </tr>
    <tr>
      <td colspan="2">
        <div align="center"><span class="style6"><?php echo $huruppoli . $xnomor_antrian; ?></span></div>
      </td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2">
        <div align="center"><span class="style1"><span class="style1"><?php echo $xno_rm . ' ' . $xnama_pasien; ?></span></span></div>
      </td>
    </tr>
    <tr>
      <td colspan="2">
        <div align="center" class="style7">silahkan menunggu antrian anda dipanggil </div>
      </td>
    </tr>
  </table>
</body>

</html>