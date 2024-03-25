<!doctype html>

<html>
<?php
if ($cekprinternya == 3 ) {
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=laporanstok".namafiletgl().".xls");
}
?>
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
    $kota="";
    foreach ($qryr0->result_array() as $brs01) {
        $kota=$brs01['kota'];
    }
    $perr1="SELECT nama_dokter,nip from mdokter where ttdgudangfarmasi=1 limit 1";
    $qryr1=$this->db->query($perr1);
    $penandatangan="";
    $nip="";
    foreach ($qryr1->result_array() as $brs) {
        $penandatangan=$brs['nama_dokter'];
        $nip=$brs['nip'];
    }

?>
<table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tbody>
    <tr>
          <td style="font-family: Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif; font-style: normal; font-weight: bold; font-size: 11px;"><?php echo ' '.getenv('V_NAMARS'); ?></td>
    </tr>
    <tr>
      <td style="font-family: Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif; font-style: normal; font-weight: bold; font-size: 13px;">INSTALASI FARMASI</td>
    </tr>
    <tr>
      <td style="font-family: 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif; font-size: 11px;">GUDANG OBAT | DAFTAR FAKTUR PEMBELIAN</td>
    </tr>
  </tbody>
</table>

<table width="100%" class="tabelbiasa"  cellpadding="1" cellspacing="1">
  <tbody>
    <tr style="font-family: Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 9px; ">
      <th width="3%" style="text-align: right" >NO</th>
      <th width="6%" >Tanggal</th>
      <th width="8%" style="text-align: left">No.Surat Jalan</th>
      <th width="8%" style="text-align: left">No. Faktur</th>
      <th width="14%" style="text-align: left">Vendor</th>
      <th style="text-align: left">Nama Produk</th>
      <th width="6%" >No.Batch</th>
      <th width="6%" >EXP.</th>
      <th width="4%" style="text-align: right" >Qty</th>
      <th width="6%" style="text-align: right" >Harga</th>
      <th width="7%" style="text-align: right" >Qty*Harga</th>
      <th width="7%" style="text-align: right" >Diskon</th>
      <th width="6%" style="text-align: right" >PPN</th>
      <th width="8%" style="text-align: right" >Jumlah</th>
    </tr>
   
  </tbody>
</table>
<table class="tabelbiasa2" width="100%"  align="left" cellpadding="1" cellspacing="1">
  <tbody>
    <?php
        if ($kondisicekpbf == 1 ) {
            $filterpbf="";
        } else {
            $filterpbf=" and pfakturheader.kodepbf='$idvendor' ";
        }

        if ($namecekobat == 1 ) {
          $filterobat="";
        } else {
          $filterobat=" and pfakturdetail.kodebarang='$obatnya' ";
        }
      
        if ($namecekdana == 1 ) {
          $filterdana="";
        } else {
          $filterdana=" and pfakturheader.pendanaan='$pendanaan' ";
        }


        $filter=$filterpbf.$filterdana;
        $diorder = " order by pfakturheader.tglterima, pfakturheader.id ";
        $totaldiskon=0;
        $totalppn=0;
        $totaljumlah=0;
        $totaljumlahharga=0;
        $per1="SELECT noterima FROM pfakturheader where bhp=0 and (tglterima BETWEEN '$tanggalawal' and '$tanggalakhir') ";

        $perintah1=$per1.$filter.' order by pfakturheader.tglterima,pfakturheader.id';
        $qry1=$this->db->query($perintah1);
        $nourutfaktur=0;
 ?>
       <?php 
        foreach ($qry1->result_array() as $brs1) { 
            $noterima=$brs1['noterima'];
            $per2="SELECT  pfakturheader.tglterima, pfakturheader.noterima, pfakturheader.nofak, pfakturheader.namapbf, pfakturdetail.namabarang, pfakturdetail.batch, pfakturdetail.expire, pfakturdetail.qty, pfakturdetail.harga,  pfakturdetail.diskon,  pfakturdetail.potlangsung, pfakturheader.ppn  FROM pfakturheader,pfakturdetail,mobat where pfakturheader.noterima=pfakturdetail.noterima and pfakturdetail.kodebarang=mobat.kodeobat and  (pfakturheader.tglterima BETWEEN '$tanggalawal' and '$tanggalakhir') and pfakturheader.noterima='$noterima' and pfakturdetail.hapus=0 and mobat.bhp = 0 ";
            $perintah=$per2.$filterpbf.$filterobat.$diorder;
            $qry2=$this->db->query($perintah);
            $nourutfaktur=$nourutfaktur+1;
            $subtotaldiskon=0;
            $subtotalppn=0;
            $subtotaljumlah=0;
            $subjumlahharga=0;

            $awal=0;

            foreach ($qry2->result_array() as $brs2) {    
                $persenppn=$brs2['ppn'];
                $jumlahharga=$brs2['qty'] * $brs2['harga'];
                $diskon=$jumlahharga*$brs2['diskon']/100;
                $diskonnya=$diskon+$brs2['potlangsung'];
                $hargasetelahdiskon=$jumlahharga-$diskonnya;
                $ppnnya=$hargasetelahdiskon*$persenppn/100;
                $jumlahnya=$hargasetelahdiskon+$ppnnya;

                $subtotaldiskon=$subtotaldiskon+$diskonnya;
                $subtotalppn=$subtotalppn+$ppnnya;
                $subtotaljumlah=$subtotaljumlah+$jumlahnya;
                $subjumlahharga=$subjumlahharga+$jumlahharga;

                $totaldiskon=$totaldiskon+$diskonnya;
                $totalppn=$totalppn+$ppnnya;
                $totaljumlah=$totaljumlah+$jumlahnya;
                $totaljumlahharga=$totaljumlahharga+$jumlahharga;
                if ($awal == 0) {
                  $awal=1  
        ?>        
                    <tr style="font-family: Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 9px;">
                    <th width="3%" style="text-align: right" ><?php echo $nourutfaktur; ?></th>
                    <th width="6%" style="text-align: center" ><?php echo tgl_format_indo($brs2['tglterima']); ?></th>
                    <th width="8%" style="text-align: left" ><?php echo $brs2['noterima']; ?></th>
                    <th width="8%" style="text-align: left" ><?php echo $brs2['nofak']; ?></th>
                    <th width="14%" style="text-align: left" ><?php echo $brs2['namapbf']; ?></th>
                <?php } else {?>
                  <tr style="font-family: Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 9px;">
                  <th width="3%" style="text-align: right" ><?php echo ""; ?></th>
                  <th width="6%" style="text-align: center" ><?php echo ""; ?></th>
                  <th width="8%" style="text-align: left" ><?php echo ""; ?></th>
                  <th width="8%" style="text-align: left" ><?php echo ""; ?></th>
                  <th width="14%" style="text-align: left" ><?php echo ""; ?></th>
                <?php }  ?>
                    <th style="text-align: left" ><?php echo $brs2['namabarang']; ?></th>
                    <th width="6%" ><?php echo $brs2['batch']; ?></th>
                    <th width="6%" ><?php echo tgl_format_indo($brs2['expire']); ?></th>
                    <?php if ($cekprinternya == 3 ) { ?>
                      <th width="4%" style="text-align: right" ><?php echo (double)$brs2['qty']; ?></th>
                      <th width="6%" style="text-align: right" ><?php echo (double)$brs2['harga']; ?></th>
                      <th width="7%" style="text-align: right" ><?php echo (double)$jumlahharga; ?></th>
                      <th width="7%" style="text-align: right" ><?php echo (double)$diskonnya; ?></th>
                      <th width="6%" style="text-align: right" ><?php echo (double)$ppnnya; ?></th>
                      <th width="8%" style="text-align: right" ><?php echo (double)$jumlahnya; ?></th>
                    <?php } else { ?>
                      <th width="4%" style="text-align: right" ><?php echo formatuang($brs2['qty']); ?></th>
                      <th width="6%" style="text-align: right" ><?php echo formatuang($brs2['harga']); ?></th>
                      <th width="7%" style="text-align: right" ><?php echo formatuang($jumlahharga); ?></th>
                      <th width="7%" style="text-align: right" ><?php echo formatuang($diskonnya); ?></th>
                      <th width="6%" style="text-align: right" ><?php echo formatuang($ppnnya); ?></th>
                      <th width="8%" style="text-align: right" ><?php echo formatuang($jumlahnya); ?></th>
                    <?php }?>
                    </tr>            
        <?php } 
            if ($subjumlahharga != 0 ) {
        ?>
            <tr class="atas" style="font-family: Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 9px; text-align: center;">
              <th width="3%" style="text-align: right" ><?php echo ""; ?></th>
              <th width="6%" style="text-align: center" ><?php echo ""; ?></th>
              <th width="8%" style="text-align: left" ><?php echo ""; ?></th>
              <th width="8%" style="text-align: left" ><?php echo ""; ?></th>
              <th width="14%" style="text-align: left" ><?php echo ""; ?></th>
              <th style="text-align: left" ><?php echo ""; ?></th>
              <th width="6%" ><?php echo ""; ?></th>
              <th width="6%" ><?php echo ""; ?></th>
              <th class="warna" width="4%" style="text-align: right" ><?php echo ""; ?></th>
              <th class="warna" width="6%" style="text-align: right" ><?php echo "Sub Total"; ?></th>
              <?php if ($cekprinternya == 3 ) { ?>
                <th class="warna" width="7%" style="text-align: right" ><?php echo (double)$subjumlahharga; ?></th>
                <th class="warna" width="7%" style="text-align: right" ><?php echo (double)$subtotaldiskon; ?></th>
                <th class="warna" width="6%" style="text-align: right" ><?php echo (double)$subtotalppn; ?></th>
                <th class="warna" width="8%" style="text-align: right" ><?php echo (double)$subtotaljumlah; ?></th>
              <?php } else { ?>
                <th class="warna" width="7%" style="text-align: right" ><?php echo formatuang($subjumlahharga); ?></th>
                <th class="warna" width="7%" style="text-align: right" ><?php echo formatuang($subtotaldiskon); ?></th>
                <th class="warna" width="6%" style="text-align: right" ><?php echo formatuang($subtotalppn); ?></th>
                <th class="warna" width="8%" style="text-align: right" ><?php echo formatuang($subtotaljumlah); ?></th>
              <?php }?>
            </tr>
              <td style="text-align: center">&nbsp;</td>
            <tr></tr>
      <?php } }?>
  </tbody>
</table>
<?php if ($totaljumlah != 0 ) { ?>

<table width="100%" border="0" cellpadding="1" cellspacing="1">
  <tbody>
    <tr style="font-family: Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 9px; text-align: center;">
      <th style="text-align: right" >TOTAL</th>
      <?php if ($cekprinternya == 3 ) { ?>
        <th width="7%" style="text-align: right" ><?php echo (double)$totaldiskon; ?></th>
        <th width="7%" style="text-align: right" ><?php echo (double)$totalppn; ?></th>
        <th width="8%" style="text-align: right" ><?php echo (double)$totaljumlah; ?></th>
      <?php } else { ?>
        <th width="7%" style="text-align: right" ><?php echo formatuang($totaldiskon); ?></th>
        <th width="7%" style="text-align: right" ><?php echo formatuang($totalppn); ?></th>
        <th width="8%" style="text-align: right" ><?php echo formatuang($totaljumlah); ?></th>
      <?php }?>
    </tr>
  </tbody>
</table>
<table width="100%" border="0" cellspacing="1" cellpadding="1">
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