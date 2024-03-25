<!doctype html>
<html>
<head>
<style type="text/css">

table.tabelbiasa {
    border-top: 1px solid #000000;
    border-bottom: 1px solid #000000;
    border-left: 0px solid #000000;
    border-right: 0px solid #000000;
    /* padding: 5px 4px; */
}
</style>

</head>

<body>
<?php 
    $tanggalawal=substr($awal,6,4).'-'.substr($awal,0,2).'-'.substr($awal,3,2);
    $tanggalakhir=substr($akhir,6,4).'-'.substr($akhir,0,2).'-'.substr($akhir,3,2);

    // echo $tanggalawal;
    // echo $tanggalakhir;
    // echo $kondisicekpbf;
    // echo $idvendor."<br>";

?>
<table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tbody>
    <tr>
      <th align="left" ><div>
        <div><?php echo getenv('V_NAMARS'); ?></div>
      </div></th>
    </tr>
    <tr>
      <td style="font-family: Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif; font-style: normal; font-weight: normal; font-size: 11px;">INSTALASI FARMASI</td>
    </tr>
    <tr>
      <td style="font-family: 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif; font-size: 11px;">DAFTAR FAKTUR PEMBELIAN</td>
    </tr>
  </tbody>
</table>
<table width="100%" class="tabelbiasa"  cellpadding="1" cellspacing="1">
  <tbody>
    <tr style="font-family: Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 9px; ">
      <th width="3%" style="text-align: right" >NO</th>
      <th width="6%" >Tanggal</th>
      <th width="10%" style="text-align: left">No.Surat Jalan</th>
      <th width="10%" style="text-align: left">No. Faktur</th>
      <th width="15%" style="text-align: left">Vendor</th>
      <th style="text-align: left">Nama Produk</th>
      <th width="8%" >No.Batch</th>
      <th width="6%" >EXP.</th>
      <th width="5%" style="text-align: right" >QTY</th>
      <th width="7%" style="text-align: right" >Harga</th>
      <th width="7%" style="text-align: right" >Diskon</th>
      <th width="7%" style="text-align: right" >PPN</th>
      <th width="8%" style="text-align: right" >Jumlah</th>
    </tr>
  </tbody>
</table>
<table width="100%"  align="left" cellpadding="1" cellspacing="1">
  <tbody>
    <?php
        if ($kondisicekpbf == 1 ) {
            $filterpbf="";
        } else {
            $filterpbf=" and pfakturheader.kodepbf='$idvendor' ";
        }    
        $per1="SELECT  pfakturheader.tglbeli, pfakturheader.noterima, pfakturheader.nofak, pfakturheader.namapbf, pfakturdetail.namabarang, pfakturdetail.batch, pfakturdetail.expire, pfakturdetail.qty, pfakturdetail.harga,  pfakturdetail.diskon,  pfakturdetail.potlangsung, pfakturheader.ppn  FROM pfakturheader,pfakturdetail where pfakturheader.noterima=pfakturdetail.noterima and  (pfakturheader.tglbeli BETWEEN '$tanggalawal' and '$tanggalakhir') order by  pfakturheader.tglbeli, pfakturheader.id";
        $perintah=$per1.$filterpbf;
        $qry2=$this->db->query($perintah);
        $nourutfaktur=1;

        $totaldiskon=0;
        $totalppn=0;
        $totaljumlah=0;

        $subtotaldiskon=0;
        $subtotalppn=0;
        $subtotaljumlah=0;

        $persenppn=10;
        $nosjlama='xxxxx';
        $nocek='ccc';
        $awal=0;
        foreach ($qry2->result_array() as $brs2) {    
            if ($nosjlama != $brs2['noterima']) {
                $awal=1;
        ?>
                <tr style="font-family: Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 9px; text-align: center;">
                    <th style="text-align: right" >SUB TOTAL</th>
                    <th width="7%" style="text-align: right" ><?php echo formatuang($subtotaldiskon); ?></th>
                    <th width="7%" style="text-align: right" ><?php echo formatuang($subtotalppn); ?></th>
                    <th width="8%" style="text-align: right" ><?php echo formatuang($subtotaljumlah); ?></th>
                    </tr>
                    <?php
                        $subtotaldiskon=0;
                        $subtotalppn=0;
                        $subtotaljumlah=0;
            }    

            $jumlahharga=$brs2['qty'] * $brs2['harga'];
            $diskon=$jumlahharga*$brs2['diskon']/100;
            $diskonnya=$diskon+$brs2['potlangsung'];
            $hargasetelahdiskon=$jumlahharga-$diskonnya;
            $ppnnya=$hargasetelahdiskon*$persenppn/100;
            $jumlahnya=$hargasetelahdiskon+$ppnnya;

            $subtotaldiskon=$subtotaldiskon+$diskonnya;
            $subtotalppn=$subtotalppn+$ppnnya;
            $subtotaljumlah=$subtotaljumlah+$jumlahnya;

            $totaldiskon=$totaldiskon+$diskonnya;
            $totalppn=$totalppn+$ppnnya;
            $totaljumlah=$totaljumlah+$jumlahnya;
    ?>        
    <?php
            if ($nosjlama != $brs2['noterima']) {
                $nosjlama=$brs2['noterima'];
    ?>          
                    
                <tr style="font-family: Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 9px;">
                <th width="3%" style="text-align: right" ><?php echo $nourutfaktur++; ?></th>
                <th width="6%" style="text-align: center" ><?php echo $brs2['tglbeli']; ?></th>
                <th width="10%" style="text-align: left" ><?php echo $brs2['noterima']; ?></th>
                <th width="10%" style="text-align: left" ><?php echo $brs2['nofak']; ?></th>
                <th width="15%" style="text-align: left" ><?php echo $brs2['namapbf']; ?></th>
            <?php } else {
            ?>
                <tr style="font-family: Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 9px;">
                <th width="3%" style="text-align: right" ><?php echo ""; ?></th>
                <th width="6%" ><?php echo ""; ?></th>
                <th width="10%" ><?php echo ""; ?></th>
                <th width="10%" ><?php echo ""; ?></th>
                <th width="15%" ><?php echo ""; ?></th>
            <?php }?>
            <th style="text-align: left" ><?php echo $brs2['namabarang']; ?></th>
            <th width="8%" ><?php echo $brs2['batch']; ?></th>
            <th width="6%" ><?php echo $brs2['expire']; ?></th>
            <th width="5%" style="text-align: right" ><?php echo formatuang($brs2['qty']); ?></th>
            <th width="7%" style="text-align: right" ><?php echo formatuang($brs2['harga']); ?></th>
            <th width="7%" style="text-align: right" ><?php echo formatuang($diskonnya); ?></th>
            <th width="7%" style="text-align: right" ><?php echo formatuang($ppnnya); ?></th>
            <th width="8%" style="text-align: right" ><?php echo formatuang($jumlahnya); ?></th>
            </tr>            
    <?php } ?>



  </tbody>
</table>
<table width="100%" border="0" cellpadding="1" cellspacing="1">
  <tbody>
    <tr style="font-family: Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 9px; text-align: center;">
      <th style="text-align: right" >TOTAL</th>
      <th width="7%" style="text-align: right" ><?php echo formatuang($totaldiskon); ?></th>
      <th width="7%" style="text-align: right" ><?php echo formatuang($totalppn); ?></th>
      <th width="8%" style="text-align: right" ><?php echo formatuang($totaljumlah); ?></th>
    </tr>
  </tbody>
</table>


<table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tbody>
    <tr>
      <th width="72%" style="text-align: center" >&nbsp;</th>
      <th width="28%" style="text-align: center; font-family: Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 11px;" ><?php echo trim($kota).', '.$tanggalberkas; ?>&nbsp;</th>
    </tr>
    <tr>
      <td style="text-align: center">&nbsp;</td>
      <td style="text-align: center; font-family: Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 11px;">Kepala Instalasi Farmasi</td>
    </tr>
    <tr>
      <td style="text-align: center">&nbsp;</td>
      <td style="text-align: center">&nbsp;</td>
    </tr>
    <tr>
      <td style="text-align: center">&nbsp;</td>
	  <td style="text-align: center; font-family: Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif;"><u></u><?php echo $namakepalafarmasi; ?></u></td>
    </tr>
    <tr>
      <td style="text-align: center">&nbsp;</td>
      <td style="text-align: center; font-family: Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 11px;">NIP : <?php echo $nipkepalafarmasi; ?></td>
    </tr>
  </tbody>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p style="text-align: center">&nbsp;</p>
</body>
</html>