<!doctype html>
<?php
if ($cekprinternya == 3 ) {
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=laporanstok".namafiletgl().".xls");
}
?>

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

table.tabelbiasa tr{
  { height: 20px; }
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
    border-bottom: 1px solid #111111;

}

table.tabelbiasa2 {
  /* background-color:lightblue; */
  /* border-top: 1px solid #111111; */
  /* border-bottom: 1px solid #000000; */
    border-top: 1px solid #000000;
    border-bottom: 1px solid #111111;

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

    // $pilihjenisnya=$this->input->post("pilihjenis");

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
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
          <td style="font-family: Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif; font-style: normal; font-weight: bold; font-size: 11px;"><?php echo ' '.getenv('V_NAMARS'); ?></td>
    </tr>
    <tr>
      <td style="font-family: Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif; font-style: normal; font-weight: bold; font-size: 14px;">INSTALASI FARMASI</td>
    </tr>
    <tr>
      <td style="font-family: 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif; font-size: 11px;">POSISI STOK PERIODE : <?php echo $periodeawal." s/d ".$periodeakhir ; ?></td>
    </tr>
    <tr>
      <!-- <?php echo $cekgen;?> -->
    </tr>  
  </tbody>
</table>
<table width="100%" class="tabelbiasa"  cellpadding="3" cellspacing="1">
  <tbody>
    <tr style="font-family: Arial, sans-serif; font-size: 12px;  ">
      <th width="3%" style="text-align: right" >No. </th>
      <!-- <th width="6%" style="text-align: left">Kode</th> -->
      <th style="text-align: left">Item</th>
      <th width="8%" style="text-align: left">Satuan</th>
      <th width="8%" style="text-align: right">S.Awal</th>
      <th width="8%" style="text-align: right" >Masuk</th>
      <th width="8%" style="text-align: right" >Keluar</th>
      <!-- <th width="8%" style="text-align: right" >Revisi</th> -->
      <th width="8%" style="text-align: right" >Jumlah Stok</th>
      <th width="10%" style="text-align: right" >Harga Dasar</th>
      <th width="12%" style="text-align: right" >Nilai Stok</th>
    </tr>
  </tbody>
</table>
<table class="tabelbiasa2" width=100%  align="left" cellpadding="3" cellspacing="1">
  <tbody>
    <?php
        if ($cekgen == "on" ) {
          $filtergen=" and mobat.generik='$generik' ";
        } else {
          $filtergen="";
        }

        if ($cekgol == "on" ) {
          $filtergol=" and mobat.generik='$golongan' ";
        } else {
          $filtergol="";
        }

        if ($cekklas == "on" ) {
          $filterklas=" and mobat.generik='$klasifikasi' ";
        } else {
          $filterklas="";
        }
        
        if ($pilihjenisnya == 1 ) {
            $filterjenis=" and mobat.bhp=0";
        } else {
            $filterjenis=" and mobat.bhp=1";
        }
        $filter=$filtergen.$filtergol.$filterklas.$filterjenis;
        

        $diorder = " order by mobat.namaobat,kartustok_gudang.tanggal ";
        $no=0;
        $baris=0;
        $hal=0;
        $totaljumlah = 0;
        $subtotal=0;

        $per="SELECT kartustok_gudang.kodeobat as kodeobat,mobat.namaobat as namaobat, mobat.satuanpakai as satuanpakai, kartustok_gudang.harga as harga, kartustok_gudang.masuk as masuk, kartustok_gudang.keluar as keluar, kartustok_gudang.returm as returm, kartustok_gudang.returk as returk FROM kartustok_gudang,mobat WHERE kartustok_gudang.kodeobat=mobat.kodeobat and (kartustok_gudang.masuk<>0 or kartustok_gudang.keluar<>0 or kartustok_gudang.returm<>0 or kartustok_gudang.returk<>0) ".$filter." group by kartustok_gudang.kodeobat, kartustok_gudang.harga order by mobat.namaobat";
        $qry=$this->db->query($per);
 ?>
       <?php 
       $i=0;
        foreach ($qry->result_array() as $brs) {
            $i++;
            $kodeobat=$brs['kodeobat'];
            $namaobat=$brs['namaobat'];
            $satuanpakai=$brs['satuanpakai'];
            $masuk=$brs['masuk'];
            $keluar=$brs['keluar'];
            $harga=$brs['harga'];

            //saldo awal
            $sawal=0;
            $perintah1="SELECT  sum(masuk-keluar+returm-returk) as sawal FROM kartustok_gudang where kodeobat='$kodeobat' and tanggal<'$tanggalawal' and harga='$harga' group by kodeobat, harga";
            $qry1=$this->db->query($perintah1);
            foreach ($qry1->result_array() as $brs1) {
              $sawal=$brs1['sawal'];
            }
            //panggil data berikutnya
            $perintah2="SELECT * FROM kartustok_gudang where kodeobat='$kodeobat' and tanggal>='$tanggalawal' and tanggal<='$tanggalakhir' and harga='$harga' group by kodeobat, harga";
            $qry2=$this->db->query($perintah2);
            $jumlahstok=$sawal+$masuk-$keluar;
            $nilaistok=$jumlahstok*$harga;
            foreach ($qry2->result_array() as $brs2) {
                $masuk=$brs2['masuk']+$brs2['returm'];
                $keluar=$brs2['keluar']+$brs2['returk'];
                $jumlahstok=$sawal+$masuk-$keluar;
                $nilaistok=$jumlahstok*$harga;
                $subtotal=$subtotal+$nilaistok;
            }
            $totaljumlah=$totaljumlah+$nilaistok;

         ?>  
              
            <tr style="font-family: Arial; font-size: 11px; text-align: center;">
              <th width="3%" style="text-align: right" ><?php echo $i.'.'; ?></th>
              <!-- <th width="6%" style="text-align: left" ><?php echo $kodeobat; ?></th> -->
              <th style="text-align: left" ><?php echo $namaobat; ?></th>
              <th width="8%" style="text-align: left" ><?php echo $satuanpakai; ?></th>
              <th width="8%" style="text-align: right" ><?php echo formatuang($sawal); ?></th>
              <th width="8%" style="text-align: right" ><?php echo formatuang($masuk); ?></th>
              <th width="8%" style="text-align: right" ><?php echo formatuang($keluar); ?></th>
              <th width="8%" style="text-align: right" ><?php echo formatuang($jumlahstok); ?></th>
              <th width="10%" style="text-align: right" ><?php echo formatuang($harga); ?></th>
              <th width="12%" style="text-align: right" ><?php echo formatuang($nilaistok); ?></th>
            </tr>
          <?php
        }
        ?>  
  </tbody>
</table>

<?php if ($totaljumlah != 0 ) { ?>

<table width="100%" border="0" cellpadding="3" cellspacing="1">
  <tbody>
    <tr style="font-family: Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 11px; text-align: center;">
      <th style="text-align: right" >TOTAL</th>
      <th width="8%" style="text-align: right" ><?php echo formatuang($totaljumlah); ?></th>
    </tr>
  </tbody>
</table>

<table width="100%" border="0" cellspacing="3" cellpadding="1">
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