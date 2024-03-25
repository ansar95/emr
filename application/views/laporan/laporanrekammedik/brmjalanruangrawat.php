

<html >
<head>
<style type="text/css">

.style1 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 10px;
}
.style8 {font-family: Georgia, "Times New Roman", Times, serif; font-size: 14px; font-weight: bold; }
</style>
</head>
<body>
<?php
    $nomor_bulan = $bulan; // Ganti dengan nomor bulan yang Anda inginkan
    $tglakhir = date("Y-m-t", mktime(0, 0, 0, $nomor_bulan, 1));

    $tglawal=date("$tahun".'-'."$bulan".'-'."01");
    // $tglakhir=date("$tahun".'-'."$bulan".'-'."t");


    $bulannya=date('m', strtotime($tglawal));
    $monthList = array('01' => 'Januari','02' => 'Februari','03' => 'Maret','04' => 'April','05' => 'Mei',
        '06' => 'Juni','07' => 'Juli','08' => 'Agustus','09' => 'September','10' => 'Oktober','11' => 'November','12' => 'Desember');
    $periodenya=$monthList[$bulannya].' '.$tahun;    
   
?>
<table width="90%" border="0" align="center" cellspacing="0">
  <!-- <tr>
    <td><div align="center" class="style8"><img src="assets/img/kopsurat.jpg" width="544" height="60" /></div></td>
  </tr> -->
  <tr>
    <td><span class="style8"><?php echo ' '.getenv('V_NAMARS'); ?></span></td>
  </tr>
  <tr>
    <td><span class="style8">ANALISA KELENGKAPAN DAN KETEPATAN WAKTU SETOR BRM RAWAT JALAN</span></td>
  </tr>
  <tr>
    <td><span class="style8">BERDASARKAN TUJUAN POLIKLINIK </span></td>
  </tr>
  <tr>
    <td><span class="style8">PERIODE : <?php echo $periodenya ;?></span></td>
  </tr>
  <tr>
    <td><table width="100%" border="1" cellspacing="0">
      <tr>
        <td width="4%" rowspan="2"><div align="center"><span class="style1">NO</span></div></td>
        <td width="36%" rowspan="2"><div align="center"><span class="style1">NAMA UNIT </span></div></td>
        <td colspan="3"><div align="center"><span class="style1">JUMLAH PASIEN KELUAR </span></div></td>
        <td colspan="3"><div align="center"><span class="style1">PRESENTASE</span></div></td>
        <td colspan="3"><div align="center"><span class="style1">JUMLAH PASIEN KELUAR </span></div></td>
        <td colspan="3"><div align="center"><span class="style1">PRESENTASE</span></div></td>
        </tr>
      <tr>
        <td width="5%"><div align="center"><span class="style1">LENGKAP</span></div></td>
        <td width="5%"><div align="center"><span class="style1">TIDAK LENGKAP</span></div></td>
        <td width="5%"><div align="center"><span class="style1">JUMLAH</span></div></td>
        <td width="5%"><div align="center"><span class="style1">LENGKAP</span></div></td>
        <td width="5%"><div align="center"><span class="style1">TIDAK LENGKAP</span></div></td>
        <td width="5%"><div align="center"><span class="style1">JUMLAH</span></div></td>
        <td width="5%"><div align="center"><span class="style1">TEPAT WAKTU </span></div></td>
        <td width="5%"><div align="center"><span class="style1">TIDAK TEPAT WAKTU</span></div></td>
        <td width="5%"><div align="center"><span class="style1">JUMLAH</span></div></td>
        <td width="5%"><div align="center"><span class="style1">TEPAT WAKTU </span></div></td>
        <td width="5%"><div align="center"><span class="style1">TIDAK TEPAT WAKTU</span></div></td>
        <td width="5%"><div align="center"><span class="style1">JUMLAH</span></div></td>
      </tr>
      
      <?php
            $xnomor=0;
            $xkeluarpadaawal="";
            $xlengkap=0;
            $xtidaklengkap=0;
            $xtepatwaktu=0;
            $xtidaktepatwaktu=0;
            $xtotlengkap=0;
            $xtottidaklengkap=0;
            $xtottepatwaktu=0;
            $xtottidaktepatwaktu=0;
             $qry1=$this->db->query("SELECT kode_keluarpada FROM register where tglsetor>='".$tglawal."' and tglsetor<='".$tglakhir."' and bagian='JALAN' group by kode_keluarpada order by kode_keluarpada ");
            foreach ($qry1->result_array() as $brs1) {
              $xnomor++;
              $xkode_keluarpada=$brs1['kode_keluarpada'];  
              $qry2=$this->db->query("SELECT keluarpada,lengkap,waktusetor FROM register where tglsetor>='".$tglawal."' and tglsetor<='".$tglakhir."' and bagian='JALAN' and kode_keluarpada='".$xkode_keluarpada."'order by kode_keluarpada");
              foreach ($qry2->result_array() as $brs2) {
                $xkeluarpada=$brs2['keluarpada'];
                if ($brs2['lengkap']=='1') { $xlengkap++;} else { $xtidaklengkap++;};					
                if ($brs2['waktusetor']=='1') { $xtepatwaktu++;} else { $xtidaktepatwaktu++;};					
                if ($brs2['lengkap']=='1') { $xtotlengkap++;} else { $xtottidaklengkap++;};					
                if ($brs2['waktusetor']=='1') { $xtottepatwaktu++;} else { $xtottidaktepatwaktu++;};	
                } ?>
             
                <!--cetak daftar-->
                 
                  <tr>                       
                      <td><div align="center"><span class="style1"><?php echo $xnomor ;?></span></div></td>
                      <td><table width="100%" border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td><span class="style1"><?php echo $xkeluarpada ;?></span></td>
                        </tr>
                      </table>
                      <div align="left"></div></td>
                      <td><div align="center"><span class="style1"><?php echo groupangka($xlengkap) ;?></span></div></td>
                      <td><div align="center"><span class="style1"><?php echo groupangka($xtidaklengkap) ;?></span></div></td>
                      <td><div align="center"><span class="style1"><?php $xjum1=$xlengkap+$xtidaklengkap; echo groupangka($xjum1) ;?></span></div></td>
                      <td><div align="center"><span class="style1"><?php $xper1=($xlengkap/$xjum1)*100; echo groupangka($xper1);?></span></div></td>
                      <td><div align="center"><span class="style1"><?php $xper2=100-$xper1; echo groupangka($xper2) ;?></span></div></td>
                      <td><div align="center"><span class="style1"><?php echo "100" ;?></span></div></td>
                      <td><div align="center"><span class="style1"><?php echo groupangka($xtepatwaktu) ;?></span></div></td>
                      <td><div align="center"><span class="style1"><?php echo groupangka($xtidaktepatwaktu) ;?></span></div></td>
                      <td><div align="center"><span class="style1"><?php $xjum2=$xtepatwaktu+$xtidaktepatwaktu; echo groupangka($xjum2) ;?></span></div></td>                      
                      <td><div align="center"><span class="style1"><?php $xper3=($xtepatwaktu/$xjum2)*100; echo groupangka($xper3) ;?></span></div></td>
                      <td><div align="center"><span class="style1"><?php $xper4=100-$xper3; echo groupangka($xper4) ;?></span></div></td>
                      <td><div align="center"><span class="style1"><?php echo "100" ;?></span></div></td>
                    </tr>      
                <?php                    
            } 
            ?>


      <tr>
        <td colspan="2"><div align="center"><span class="style1">JUMLAH</span></div></td>
        <td width="5%"><div align="center"><span class="style1"><?php echo groupangka($xtotlengkap) ;?></span></div></td>
        <td width="5%"><div align="center"><span class="style1"><?php echo groupangka($xtottidaklengkap) ;?></span></div></td>
        <td width="5%"><div align="center"><span class="style1"><?php $xjumtot1=$xtotlengkap+$xtottidaklengkap;echo groupangka($xjumtot1) ;?></span></div></td>
        <td width="5%"><div align="center"><span class="style1"><?php $xtotper1=($xtotlengkap/$xjumtot1)*100; echo groupangka($xtotper1) ;?></span></div></td>
        <td width="5%"><div align="center"><span class="style1"><?php $xtotper2=100-$xtotper1; echo groupangka($xtotper2) ;?></span></div></td>
        <td width="5%"><div align="center"><span class="style1"><?php echo "100" ;?></span></div></td>
        <td width="5%"><div align="center"><span class="style1"><?php echo ($xtottepatwaktu) ;?></span></div></td>
        <td width="5%"><div align="center"><span class="style1"><?php echo ($xtottidaktepatwaktu) ;?></span></div></td>
        <td width="5%"><div align="center"><span class="style1"><?php $xjumtot3=$xtottepatwaktu+$xtottidaktepatwaktu;echo groupangka($xjumtot3) ;?></span></div></td>
        <td width="5%"><div align="center"><span class="style1"><?php $xtotper3=($xtottepatwaktu/$xjumtot3)*100; echo groupangka($xtotper3) ;?></span></div></td>
        <td width="5%"><div align="center"><span class="style1"><?php $xtotper4=100-$xtotper3; echo groupangka($xtotper4) ;?></span></div></td>
        <td width="5%"><div align="center"><span class="style1"><?php echo "100" ;?></span></div></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>

