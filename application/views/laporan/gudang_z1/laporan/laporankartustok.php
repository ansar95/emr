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

    $qryr0=$this->db->query("SELECT kodeobat,namaobat,satuanpakai from mobat where id=$idobat limit 1");
    foreach ($qryr0->result_array() as $brs01) {
        $kodeobat=$brs01['kodeobat'];
        $namaobat=$brs01['namaobat'];
        $satuanpakai=$brs01['satuanpakai'];
    }

    $perr1="SELECT nama_dokter,nip from mdokter where ttdgudangfarmasi=1 limit 1";
    $qryr1=$this->db->query($perr1);
    foreach ($qryr1->result_array() as $brs) {
        $penandatangan=$brs['nama_dokter'];
        $nip=$brs['nip'];
    }

?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
          <td style="font-family: Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif; font-style: normal; font-weight: bold; font-size: 11px;">INSTALASI FARMASI <?php echo ' '.getenv('V_NAMARS'); ?> </td>
    </tr>
    <tr>
      <td style="font-family: 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif; font-weight: bold; font-size: 14px;">KARTU STOK</td>
    </tr>
    <tr>
      <td style="font-family: 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif; font-weight: bold; font-size: 11px;"><?php echo 'Nama Obat : '.$namaobat.' | '.$satuanpakai; ?></td>
    </tr>
  </tbody>
</table>

<table width="100%" class="tabelbiasa"  cellpadding="1" cellspacing="1">
  <tbody>
    <tr style="font-family: Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 9px; ">
      <th width="10%" style="text-align: left">TANGGAL</th>
      <th style="text-align: left">URAIAN</th>
      <th width="10%" style="text-align: right">REVISI</th>
      <th width="10%" style="text-align: right">MASUK</th>
      <th width="10%" style="text-align: right" >KELUAR</th>
      <th width="10%" style="text-align: right" >SALDO</th>
    </tr>
  </tbody>
</table>
<table class="tabelbiasa2" width="100%"  align="left" cellpadding="1" cellspacing="1">
  <tbody>
    <?php
        //hitung dulu stok awal 
        $per1="SELECT sum(masuk-keluar-returk+returm) as saldoawal FROM kartustok_gudang where tanggal<'$tanggalawal'";
        $qry1=$this->db->query($per1);
        $saldoawal=0;
        foreach ($qry1->result_array() as $brs1) { 
            $saldoawal=$brs1['saldoawal'] ;
        }  
        $saldo=$saldoawal;
        //cetak saldo awal
?>
            <tr style="font-family: Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 9px;">
            <td width="10%" style="text-align: left" ><?php echo ''; ?></td>
            <td style="text-align: left" ><?php echo 'SISA STOK / SALDO AWAL'; ?></td>
            <td width="10%" style="text-align: right" ><?php echo ''; ?></td>
            <td width="10%" style="text-align: right" ><?php echo ''; ?></td>
            <td width="10%" style="text-align: right" ><?php echo ''; ?></td>
            <td width="10%" style="text-align: right" ><?php echo formatuang($saldo); ?></td>
            </tr>
<?php
        $per2="SELECT * FROM kartustok_gudang where (tanggal BETWEEN '$tanggalawal' and '$tanggalakhir') and kodeobat='$kodeobat' order by tanggal,id ";
        $qry2=$this->db->query($per2);
        $jumlahrevisi=0;
        $jumlahmasuk=0;
        $jumlahkeluar=0;
        foreach ($qry2->result_array() as $brs2) { 
            $tanggal=$brs2['tanggal'];
            $kodeobat=$brs2['kodeobat'];
            $kode_gudang=$brs2['kode_gudang'];
            $kode_unit=$brs2['kode_unit'];
            $qry4=$this->db->query("SELECT nama_unit from munit where kode_unit='$kode_unit' limit 1");
            foreach ($qry4->result_array() as $brs4) {
                $nama_unit=$brs4['nama_unit'];
            }
            $noterima=$brs2['noterima'];
            $batch=$brs2['batch'];
            $uraian=$brs2['uraian'];
            $expire=$brs2['expire'];
            $harga=$brs2['harga'];
            $masuk=$brs2['masuk'];
            $keluar=$brs2['keluar'];
            $returm=$brs2['returm'];
            $returk=$brs2['returk'];
            $user=$brs2['user'];
            $masuknya=$masuk+$returm;
            $keluarnya=$keluar+$returk;
            $saldo=$saldo+$masuk-$keluar-$returk+$returm;
            $uraiannya=trim($uraian).' '.trim($nama_unit).' | ('.$batch.')';
            $jumlahrevisi=0;
            $jumlahmasuk=$jumlahmasuk+$masuknya;
            $jumlahkeluar=$jumlahkeluar+$keluarnya;
        ?>        
            <tr style="font-family: Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 9px;">
            <td width="10%" style="text-align: left" ><?php echo tgl_format_indo($brs2['tanggal']); ?></td>
            <td style="text-align: left" ><?php echo $uraiannya; ?></td>
            <td width="10%" style="text-align: right" ><?php echo '0'; ?></td>
            <td width="10%" style="text-align: right" ><?php echo formatuang($masuknya); ?></td>
            <td width="10%" style="text-align: right" ><?php echo formatuang($keluarnya); ?></td>
            <td width="10%" style="text-align: right" ><?php echo formatuang($saldo); ?></td>
            </tr>
        <?php } ?>
  </tbody>
</table>
<table class="tabelbiasa2" width="100%"  align="left" cellpadding="1" cellspacing="1">

            <tr style="font-family: Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 9px;">
            <th width="10%" style="text-align: left" ><?php echo ''; ?></th>
            <th style="text-align: right" ><?php echo 'Jumlah'; ?></th>
            <th width="10%" style="text-align: right" ><?php echo formatuang($jumlahrevisi);; ?></th>
            <th width="10%" style="text-align: right" ><?php echo formatuang($jumlahmasuk); ?></th>
            <th width="10%" style="text-align: right" ><?php echo formatuang($jumlahkeluar); ?></th>
            <th width="10%" style="text-align: right" ><?php echo ''; ?></th>
            </tr>
</table>
<p>&nbsp;</p>
</body>
</html>