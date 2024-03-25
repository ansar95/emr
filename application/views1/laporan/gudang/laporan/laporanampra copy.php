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
<table width="100%" border="0" cellspacing="1" cellpadding="2">
  <tbody>
    <tr>
          <td style="font-family: Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif; font-style: normal; font-weight: bold; font-size: 13px;"><?php echo getenv('V_NAMARS'); ?></td>
    </tr>
    <tr>
      <td style="font-family: Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif; font-style: normal; font-weight: bold; font-size: 11px;">INSTALASI FARMASI</td>
    </tr>
    <tr>
      <td style="font-family: 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif; font-size: 11px;">LAPORAN AMPRA UNIT</td>
    </tr>
  </tbody>
</table>

<table width="80%" class="tabelbiasa"  cellpadding="2" cellspacing="1">
  <tbody>
    <tr style="font-family: Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 9px; ">
      <th width="3%" style="text-align: right">NO</th>
      <th width="15%" style="text-align: left">Unit</th>
      <th width="8%" style="text-align: left">Tgl.Order</th>
      <th width="8%" style="text-align: left">Tgl.Drop</th>
      <th width="24%" style="text-align: left">Nama Produk</th>
       <th width="7%" style="text-align: right">Qty Ampra</th>
       <th width="7%" style="text-align: right">Qty Drop</th>
      <th width="7%" style="text-align: right">Harga</th>
      <th width="8%" style="text-align: right">Jumlah</th>
      <th width="7%" style="text-align: left">No.Batch</th>
      <th width="8%" style="text-align: left">EXP.</th>
    </tr>
  </tbody>
</table>
<table class="tabelbiasa2" width="80%"  align="left" cellpadding="2" cellspacing="1">
  <tbody>
    <?php
        if ($kondisicekpbf == 1 ) {
            $filterunit="";
        } else {
            $filterunit=" and ampra_detail.kode_unit='$idvendor' ";
        }
        
        if ($pilihjenis == 1 ) {
          $filterobatbhp="";
        } else {
          $filterobatbhp=" and mobat.bhp=1 ";
        }
        $diorder = " order by ampra_detail.tgldrop, ampra_detail.kode_unit, ampra_detail.id ";
        $totaldiskon=0;
        $totalppn=0;
        $totaljumlah=0;
        $totaljumlahharga=0;
        $nourut=0;
 ?>
       <?php 
            $per2="SELECT  ampra_detail.*, mobat.bhp FROM ampra_detail,mobat where ampra_detail.kodeobat=mobat.kodeobat and (ampra_detail.tgldrop BETWEEN '$tanggalawal' and '$tanggalakhir') and ampra_detail.hapus=0 ";
            $perintah=$per2.$filterunit.$filterobatbhp.$diorder;
            $qry2=$this->db->query($perintah);
            $nourutfaktur=$nourut+1;
            $kode_unitcek='';
            $subjumlahharga=0;
            foreach ($qry2->result_array() as $brs2) {    
                $kode_unit=$brs2['kode_unit'];
                $nama_unit=$brs2['nama_unit'];
                if ($kode_unit !=  $kode_unitcek) { 
                  $nourut++;
                  $kode_unitcek=$kode_unit;
                  $jumlahharga=$brs2['qtydrop']*$brs2['harga'];
                  $subjumlahharga=$subjumlahharga+$jumlahharga;
                  $totaljumlah=$totaljumlah+$jumlahharga;
        ?>        
                    <tr style="font-family: Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 9px;">
                    <th width="3%" style="text-align: right" ><?php echo $nourut; ?></th>
                    <th width="15%" style="text-align: left" ><?php echo $nama_unit; ?></th>
                    <th width="8%" style="text-align: left" ><?php echo tgl_format_indo($brs2['tglorder']); ?></th>
                    <th width="8%" style="text-align: left" ><?php echo tgl_format_indo($brs2['tgldrop']); ?></th>
                <?php } else {?>
                  <tr style="font-family: Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 9px;">
                  <th width="3%" style="text-align: left" ><?php echo ""; ?></th>
                  <th width="15%" style="text-align: left" ><?php echo ""; ?></th>
                  <th width="8%" style="text-align: right" ><?php echo ""; ?></th>
                  <th width="8%" style="text-align: right" ><?php echo ""; ?></th>
                <?php }  ?>
                    <th width="24%" style="text-align: left" ><?php echo $brs2['namaobat']; ?></th>
                    <th width="7%" style="text-align: right" ><?php echo formatuang($brs2['qtyampra']); ?></th>
                    <th width="7%" style="text-align: right" ><?php echo formatuang($brs2['qtydrop']); ?></th>
                    <th width="7%" style="text-align: right" ><?php echo formatuang($brs2['harga']); ?></th>
                    <th width="8%" style="text-align: right" ><?php echo formatuang($jumlahharga); ?></th>
                    <th width="7%" style="text-align: left"><?php echo $brs2['batch']; ?></th>
                    <th width="8%" style="text-align: left"><?php echo tgl_format_indo($brs2['expire']); ?></th>
                    </tr>            
        <?php } 
            if ($subjumlahharga != 0 ) {
        ?>
            <tr class="atas" style="font-family: Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 9px; text-align: center;">
              <th width="3%" style="text-align: right" ><?php echo ""; ?></th>
              <th width="6%" style="text-align: center" ><?php echo ""; ?></th>
              <th width="8%" style="text-align: left" ><?php echo ""; ?></th>
              <th width="8%" style="text-align: left" ><?php echo ""; ?></th>
              <th class="warna" width="4%" style="text-align: right" ><?php echo ""; ?></th>
              <th class="warna" width="6%" style="text-align: right" ><?php echo "Sub Total"; ?></th>
              <th class="warna" width="7%" style="text-align: right" ><?php echo formatuang($subjumlahharga); ?></th>
            </tr>
              <td style="text-align: center">&nbsp;</td>
            <tr></tr>
          <?php } ?>  
  </tbody>
</table>
<?php if ($totaljumlah != 0 ) { ?>

<table width="80%" border="0" cellpadding="2" cellspacing="1">
  <tbody>
    <tr style="font-family: Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 9px; text-align: center;">
      <th style="text-align: right" >TOTAL</th>
      <th width="8%" style="text-align: right" ><?php echo formatuang($totaljumlah); ?></th>

    </tr>
  </tbody>
</table>
<table width="80%" border="0" cellspacing="1" cellpadding="1">
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
<?php } else { echo "Data tidak ada..."; }?>
<p>&nbsp;</p>
</body>
</html>