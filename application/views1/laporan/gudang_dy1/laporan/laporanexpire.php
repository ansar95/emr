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
    $periodeawal=substr($awal,3,2).'-'.substr($awal,0,2).'-'.substr($awal,6,4);
    $periodeakhir=substr($akhir,3,2).'-'.substr($akhir,0,2).'-'.substr($akhir,6,4);

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
          <td style="font-family: Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif; font-style: normal; font-weight: bold; font-size: 11px;">RUMAH SAKIT UMUM DAERAH LUWUK</td>
    </tr>
    <tr>
      <td style="font-family: Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif; font-style: normal; font-weight: bold; font-size: 13px;">INSTALASI FARMASI</td>
    </tr>
    <tr>
      <td style="font-family: 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif; font-size: 11px;">DAFTAR OBAT/BHP EXPIRE, PERIODE : <?php echo $periodeawal." s/d ".$periodeakhir ; ?></td>
    </tr>
  </tbody>
</table>

<table width="100%" class="tabelbiasa"  cellpadding="1" cellspacing="1">
  <tbody>
    <tr style="font-family: Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 11px; ">
      <th width="3%" style="text-align: right" >No.</th>
      <th width="25%" style="text-align: left">Nama Obat/ BHP</th>
      <th width="6%" style="text-align: right" >Qty</th>
      <th width="8%" style="text-align: left" >Satuan</th>
      <th width="10%" style="text-align: left">No.Batch</th>
      <th width="8%" style="text-align: left">EXP.</th>
      <th width="8%" style="text-align: left" >Tgl.Beli</th>
      <th width="12%" style="text-align: left" >No.Faktur</th>
      <th width="20%" style="text-align: left" >PBF</th>
    </tr>
  </tbody>
</table>
<table class="tabelbiasa2" width="100%"  align="left" cellpadding="1" cellspacing="1">
  <tbody>
    <?php
        if ($jenis == 1 ) {
            $filterjenis=" and pfakturdetail.bhp=0";
        } else {
            $filterjenis=" and pfakturdetail.bhp=1 ";
        }
        $diorder = " order by pfakturdetail.expire, pfakturdetail.kodebarang, pfakturheader.tglbeli ";

        $per1="SELECT pfakturdetail.namabarang, pfakturdetail.qty, pfakturdetail.keluar, pfakturdetail.satuan, pfakturdetail.batch, pfakturdetail.expire, pfakturheader.tglbeli, pfakturheader.namapbf,pfakturheader.nofak FROM pfakturdetail,pfakturheader where pfakturdetail.noterima=pfakturheader.noterima and (pfakturdetail.expire BETWEEN '$tanggalawal' and '$tanggalakhir' and hapus=0 ) ";
        $perintah1=$per1.$filterjenis.$diorder;
        $qry1=$this->db->query($perintah1);

 ?>
       <?php 
       $i=1;
        foreach ($qry1->result_array() as $brs1) { 
       ?>   
          <tr style="font-family: Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 11px; ">
            <td width="3%" style="text-align: right" ><?php echo $i++.'.'; ?></th>
            <td width="25%" style="text-align: left"><?php echo $brs1['namabarang']; ?></th>
            <td width="6%" style="text-align: right" ><?php echo formatuang($brs1['qty']-$brs1['keluar']); ?></th>
            <td width="8%" style="text-align: left" ><?php echo $brs1['satuan']; ?></th>
            <td width="10%" style="text-align: left"><?php echo $brs1['batch']; ?></th>
            <td width="8%" style="text-align: left"><?php echo tgl_format_indo($brs1['expire']); ?></th>
            <td width="8%" style="text-align: left" ><?php echo tgl_format_indo($brs1['tglbeli']); ?></th>
            <td width="12%" style="text-align: left" ><?php echo $brs1['nofak']; ?></th>
            <td width="20%" style="text-align: left" ><?php echo $brs1['namapbf']; ?></th>
          </tr>
        <?php } 
        ?>
          
  </tbody>
</table>
</body>
</html>