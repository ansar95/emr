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
    $qryr0=$this->db->query("SELECT nama_unit from munit where kode_unit='$ruang' limit 1");
    foreach ($qryr0->result_array() as $brs01) {
        $nama_unit=$brs01['nama_unit'];
    }

?>
<table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tbody>
    <tr>
          <td style="font-family: Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif; font-style: normal; font-weight: bold; font-size: 13px;">RUMAH SAKIT UMUM DAERAH LUWUK</td>
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
          <td width="12%">TANGGAL PESANAN </td>
          <td width="1%">:</td>
          <td width="12%"><?php echo $tglx; ?></td>
          <td width="75%">UNIT : <?php echo $nama_unit; ?></td>
        </tr>
        <tr>
          <td>TANGGAL DROPPING </td>
          <td>:</td>
          <td><?php echo $tglx; ?></td>
          <td>&nbsp;</td>
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
      <th width="15%" valign="middle"  style="text-align: center">Satuan</th>
      <th width="15%" valign="middle"  style="text-align: center">Pesanan</th>
      <th width="15%" valign="middle"  style="text-align: center" ><div align="center">Dropping</div></th>
      <th width="15%" valign="middle"  style="text-align: center" ><div align="center">Batch</div></th>
    </tr>
</table>
<table width="80%" class="tabelbiasa2" cellpadding="1" cellspacing="1">
        <?php
        $i=1;
            $qryr0=$this->db->query("SELECT * from ampra_detail where kode_unit='$ruang' and tgldrop='$tglx' and hapus=0 ");
            foreach ($qryr0->result_array() as $brs01) {
        ?>
    <tr style="font-size: 10px; ">
      <td width="5%" style="text-align: center" ><?php echo $i++; ?></td>
      <td style="text-align: left"><?php echo $brs01['namaobat']; ?></td>
      <td width="15%" style="text-align: center"><?php echo $brs01['satuan']; ?></td>
      <td width="15%" style="text-align: center"><?php echo $brs01['qtyampra']; ?></td>
      <td width="15%" style="text-align: center"><?php echo $brs01['qtydrop']; ?></td>
      <td width="15%" style="text-align: center"><?php echo $brs01['batch']; ?></td>
    </tr>
    <?php } ?>
</table>
  </tbody>

<p style="text-align: center">&nbsp;</p>
</body>
</html>
