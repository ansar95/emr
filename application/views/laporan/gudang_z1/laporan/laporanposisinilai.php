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
    $tanggalawal=substr($awal,6,4).'-'.substr($awal,0,2).'-'.substr($awal,3,2);
    $tanggalakhir=substr($akhir,6,4).'-'.substr($akhir,0,2).'-'.substr($akhir,3,2);
    $tanggalberkas=$tanggalakhir;
    // echo $tanggalawal;
    // echo $tanggalakhir;
    // echo $kondisicekpbf;
    // echo $idvendor."<br>";
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

?>
<table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tbody>
    <tr>
          <td style="font-family: Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif; font-style: normal; font-weight: bold; font-size: 13px;"><?php echo ' '.getenv('V_NAMARS'); ?> </td>
    </tr>
    <tr>
      <td style="font-family: Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif; font-style: normal; font-weight: bold; font-size: 11px;">INSTALASI FARMASI</td>
    </tr>
    <tr>
      <td style="font-family: 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif; font-size: 11px;">POSISI STOK HARIAN</td>
    </tr>
  </tbody>
</table>
<table width="80%" class="tabelbiasa"  cellpadding="0" cellspacing="0">
  <tbody>
    <tr style="font-family: Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 10px; ">
      <th width="3%" style="text-align: right" >NO. </th>
      <th width="6%" style="text-align: left">Kode</th>
      <th style="text-align: left">Item</th>
      <th width="8%" style="text-align: left">Satuan</th>
      <th width="8%" style="text-align: right">Sawal</th>
      <th width="8%" style="text-align: right" >Masuk</th>
      <th width="8%" style="text-align: right" >Keluar</th>
      <th width="8%" style="text-align: right" >Revisi</th>
      <th width="8%" style="text-align: right" >Jumlah Stok</th>
      <th width="10%" style="text-align: right" >Harga Dasar</th>
      <th width="10%" style="text-align: right" >Nilai Stok</th>
    </tr>
  </tbody>
</table>
<table class="tabelbiasa2" width="80%"  align="left" cellpadding="0" cellspacing="0">
  <tbody>
    <?php
        if ($pilihjenis == 1 ) {
          $filterobatbhp="";
        } else {
          $filterobatbhp=" and mobat.bhp=1 ";
        }
        $diorder = " order by mobat.namaobat ";
        $no=0;
        $totaljumlah = 0;

        $per1="SELECT * FROM mobat where 1 ";

        $perintah1='SELECT kodeobat,namaobat,satuanpakai,sawal,beli,jual,return_m,return_k,hargastok FROM mobat where 1'.$filterobatbhp;
        $qry1=$this->db->query($perintah1);
 ?>
       <?php 
        foreach ($qry1->result_array() as $brs1) { 
            $no++;
            $kodeobat=$brs1['kodeobat'];
            $namaobat=$brs1['namaobat'];
            $satuanpakai=$brs1['satuanpakai'];
            $sawal=$brs1['sawal'];
            $masuk=$brs1['beli'];
            $keluar=$brs1['jual'];
            $revisi=$brs1['return_m']-$brs1['return_k'];
            $jumlahstok=$brs1['sawal']+$brs1['beli']-$brs1['jual']+$revisi;
            $hargadasar=$brs1['hargastok'];
            $nilaistok=$jumlahstok*$hargadasar;
            $totaljumlah=$totaljumlah+$nilaistok;
            if ($nilaistok <> 0) {
         ?>       
           
            <tr class="tabelbiasa2" style="font-family: Arial; font-size: 11px; text-align: center;">
              <th width="3%" style="text-align: right" ><?php echo $no.'.'; ?></th>
              <th width="6%" style="text-align: left" ><?php echo $kodeobat; ?></th>
              <th style="text-align: left" ><?php echo $namaobat; ?></th>
              <th width="8%" style="text-align: left" ><?php echo $satuanpakai; ?></th>
              <th width="8%" style="text-align: right" ><?php echo formatuang($sawal); ?></th>
              <th width="8%" style="text-align: right" ><?php echo formatuang($masuk); ?></th>
              <th width="8%" style="text-align: right" ><?php echo formatuang($keluar); ?></th>
              <th width="8%" style="text-align: right" ><?php echo formatuang($revisi); ?></th>
              <th width="8%" style="text-align: right" ><?php echo formatuang($jumlahstok); ?></th>
              <th width="10%" style="text-align: right" ><?php echo formatuang($hargadasar); ?></th>
              <th width="10%" style="text-align: right" ><?php echo formatuang($nilaistok); ?></th>
            </tr>
              <!-- <td style="text-align: center">&nbsp;</td> -->
            <!-- <tr></tr> -->
      <?php  }}?>
  </tbody>
</table>

<?php if ($totaljumlah != 0 ) { ?>

<table width="80%" border="0" cellpadding="1" cellspacing="1">
  <tbody>
    <tr style="font-family: Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 11px; text-align: center;">
      <th style="text-align: right" >TOTAL</th>
      <th width="8%" style="text-align: right" ><?php echo formatuang($totaljumlah); ?></th>
    </tr>
  </tbody>
</table>


<table width="80%" border="0" cellspacing="0" cellpadding="1">
  <tbody>
    <tr>
      <th width="72%" style="text-align: center" >&nbsp;</th>
      <th valign=BOTTOM width="28%" style="text-align: center; font-family: Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 11px;" ><?php echo trim($kota).', '.tgl_format_indo_huruf($tanggalberkas); ?>&nbsp;</th>
    </tr>
    <tr>
      <td style="text-align: center">&nbsp;</td>
      <td valign=TOP style="text-align: center; font-family: Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 11px;">Kepala Instalasi Farmasi</td>
    </tr>
    <tr><td style="text-align: center">&nbsp;</td></tr>
    <tr><td style="text-align: center">&nbsp;</td></tr>
    <tr><td style="text-align: center">&nbsp;</td></tr>
    <tr>
      <td style="text-align: center">&nbsp;</td>
	  <td valign=BOTTOM style="text-align: center; font-family: Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 11px;"><u><?php echo $penandatangan; ?></u></td>
    </tr>
    <tr>
      <td style="text-align: center">&nbsp;</td>
      <td valign=TOP style="text-align: center; font-family: Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 11px;">NIP : <?php echo $nip; ?></td>
    </tr>
  </tbody>
</table>
<?php }?>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p style="text-align: center">&nbsp;</p>
</body>
</html>