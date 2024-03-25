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
    $periodeawal=substr($awal,3,2).'-'.substr($awal,0,2).'-'.substr($awal,6,4);
    $periodeakhir=substr($akhir,3,2).'-'.substr($akhir,0,2).'-'.substr($akhir,6,4);
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
          <td style="font-family: Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif; font-style: normal; font-weight: bold; font-size: 11px;"><?php echo ' '.getenv('V_NAMARS'); ?></td>
    </tr>
    <tr>
      <td style="font-family: Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif; font-style: normal; font-weight: bold; font-size: 13px;">INSTALASI FARMASI</td>
    </tr>
    <tr>
      <td style="font-family: 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif; font-size: 11px;">POSISI STOK PERIODE : <?php echo $periodeawal." s/d ".$periodeakhir ; ?></td>
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
        // if ($pilihjenis == 1 ) {
        //   $filterobatbhp="";
        // } else {
        //   $filterobatbhp=" and mobat.bhp=1 ";
        // }
        $diorder = " order by mobat.namaobat ";
        $no=0;
        $totaljumlah = 0;


        $perobat="SELECT * FROM mobat where hapus=0 ".$filterobatbhp.$diorder;
        $qryobat=$this->db->query($perobat);
        //cek jumlah baris ada atau tidak
        
        foreach ($qryobat->result_array() as $brsobat) { 
          $kodeobat=$brsobat['kodeobat'];
          //ambil nilai masuk keluar dsesuai harga
          $perintah1="SELECT sum(masuk+returm) as masuk FROM kartustok_gudang where kodeobat='$kodeobat' and tanggal>='$tanggalawal group by kodeobat, harga";
          $qry1=$this->db->query($perintah1);
          foreach ($qry1->result_array() as $brs1) { 
              $no++;
              $harga=$brs1['harga'];

              // cek saldo awal
              $perintahsawal="SELECT sum(masuk-keluar+returm-returk) as sawalnya from kartustok_gudang where kodeobat='$kodeobat' and tanggal<'$tanggalawal' and harga='$harga' ";
              $qrysawal=$this->db->query($perintahsawal);
              $sawal=0;
              foreach ($qrysawal->result_array() as $brssawal) { 
                $sawal=$brssawal['sawalnya'];
              }
              $masuk=$brs1['masuk']+$brs1['returm'];
              $keluar=$brs1['keluar']+$brs1['returk'];
              $revisi=0;
              $jumlahstok=$sawal+$masuk-$keluar+$revisi;
              $nilaistok=$jumlahstok*$harga;
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
                <th width="10%" style="text-align: right" ><?php echo formatuang($harga); ?></th>
                <th width="10%" style="text-align: right" ><?php echo formatuang($nilaistok); ?></th>
              </tr>
                <!-- <td style="text-align: center">&nbsp;</td> -->
              <!-- <tr></tr> -->
        <?php  }} 
        }?>
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