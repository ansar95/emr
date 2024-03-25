<!doctype html>
<html>
<head>
<style type="text/css">

table.tabelbiasa {
    border-top: 1px solid #000000;
    border-bottom: 1px solid #000000;
    border-left: 0px solid #000000;
    border-right: 0px solid #000000;
    background-color:lightgray;
    /* height: 25px; */

    /* padding: 5px 4px; */
}

table.tabelbiasa2 {
    border-top: 0px solid #000000;
    border-bottom: 1px solid #000000;
    border-left: 0px solid #000000;
    border-right: 0px solid #000000;
    /* padding: 5px 4px; */
}

table.tabelbiasa2 th.warna {
  /* background-color:lightblue; */
  /* border-top: 1px solid #111111; */
  /* border-bottom: 1px solid #000000; */
  border-top: 1px solid #000000;
    border-bottom: 1px solid #000000;

} 
</style>

</head>

<body>
<?php 
// echo $tglx;
// echo $ruang;
    $tanggal=substr($tglx,6,4).'-'.substr($tglx,0,2).'-'.substr($tglx,3,2);
    $tanggalberkas=$tanggal;
    $qryr0=$this->db->query("SELECT kota from setup where 1 limit 1");
    foreach ($qryr0->result_array() as $brs01) {
        $kota=$brs01['kota'];
    }
    $perr1="SELECT nama_dokter,nip from mdokter where ttdgudangfarmasi=1 limit 1";
    $qryr1=$this->db->query($perr1);
    foreach ($qryr1->result_array() as $brs) {
        $penandatangan=$brs['nama_dokter'];
        $nip=$brs['nip'];
    }
    // $nama_unit='';
    // $qryr0=$this->db->query("SELECT nama_unit from munit where kode_unit='$ruang' limit 1");
    // foreach ($qryr0->result_array() as $brs01) {
    //     $nama_unit=$brs01['nama_unit'];
    // }
      $namaunitpanggil1=str_replace("%20"," ",$namaunitpanggil);
?>
<table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tbody>
    <tr>
          <td style="font-family: Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif; font-style: normal; font-weight: bold; font-size: 13px;"><?php echo getenv('V_NAMARS'); ?></td>
    </tr>
    <tr>
      <td style="font-family: Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif; font-style: normal; font-weight: bold; font-size: 11px;">INSTALASI FARMASI</td>
    </tr>
    <tr>
      <td style="font-family: 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif; font-size: 11px;">DAFTAR PERMINTAAN</td>
    </tr>
    <tr>
      <td style="font-family: 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif; font-size: 9px;"><table width="100%" border="0">
        <tr>
          <td width="10%">TANGGAL PESANAN </td>
          <td width="1%">:</td>
          <td width="10%"><?php echo $tglx; ?></td>
          <td width="10%">TANGGAL DROPPING </td>
          <td width="1%">:</td>
          <td width="10%"><?php echo $tglx; ?></td>
          <td width="58%">UNIT : <?php echo trim($namaunitpanggil1); ?></td>
        </tr>
      </table></td>
    </tr>
  </tbody>
</table>
<table width="80%" class="tabelbiasa"  cellpadding="1" cellspacing="1">
  <tbody>
    <tr style="font-family: Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 9px; ">
      <th width="5%" valign="middle" style="text-align: center" >NO</th>
      <th valign="middle"  style="text-align: left">Nama Produk</th>
      <th width="10%" valign="middle"  style="text-align: left">Satuan</th>
      <th width="10%" valign="middle"  style="text-align: center">Pesanan</th>
      <th width="10%" valign="middle"  style="text-align: center" ><div align="center">Dropping</div></th>
      <th width="10%" valign="middle"  style="text-align: left" ><div align="left">Batch</div></th>
      <th width="10%" valign="middle"  style="text-align: left" ><div align="left">Pendanaan</div></th>
    </tr>
</table>
<table width="80%" class="tabelbiasa2" cellpadding="1" cellspacing="1">
        <?php
        $i=1;
            // $qryr0=$this->db->query("SELECT * from ampra_detail where kode_unit='$ruang' and tgldrop='$tglx' and hapus=0 and idampra='$idampra' ");
            $qryr0=$this->db->query("SELECT * from ampra_detail where hapus=0 and idampra='$idampra' ");
            foreach ($qryr0->result_array() as $brs01) {
        ?>
    <tr style="font-size: 10px; ">
      <td width="5%" style="text-align: center" ><?php echo $i++; ?></td>
      <td style="text-align: left"><?php echo $brs01['namaobat']; ?></td>
      <td width="10%" style="text-align: left"><?php echo $brs01['satuan']; ?></td>
      <td width="10%" style="text-align: center"><?php echo $brs01['qtyampra']; ?></td>
      <td width="10%" style="text-align: center"><?php echo $brs01['qtydrop']; ?></td>
      <td width="10%" style="text-align: left"><?php echo $brs01['batch']; ?></td>
      <td width="10%" style="text-align: left"><?php echo $brs01['penggunaan']; ?></td>
    </tr>
    <?php } ?>

</table>
  </tbody>

  <table width="80%" border="0" cellspacing="3" cellpadding="1">
  <tbody>
    <!-- <tr>
      <th width="72%" style="text-align: center" >&nbsp;</th>
      <th valign=BOTTOM width="28%" style="text-align: center; font-family: Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 11px;" ><?php echo trim($kota).', '.tgl_format_indo_huruf($tglx); ?>&nbsp;</th>
    </tr> -->
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td width="10">&nbsp;</td>
      <td width="30" valign=TOP style="text-align: center; font-family: Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 11px;">Yang Menerima</td>
      <td width="20">&nbsp;</td>
      <td width="30" valign=TOP style="text-align: center; font-family: Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 11px;">Yang Menyerahkan</td>
      <td width="10">&nbsp;</td>
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
      <td width="10">&nbsp;</td>
      <td width="30" valign=TOP style="text-align: center; font-family: Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 11px;">__________________</td>
      <td width="20">&nbsp;</td>
      <td width="30" valign=TOP style="text-align: center; font-family: Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 11px;">__________________</td>
      <td width="10">&nbsp;</td>
    </tr>
  </tbody>
</table>

<p style="text-align: center">&nbsp;</p>
</body>
</html>
