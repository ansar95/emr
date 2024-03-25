<?php
/**
 * Created by PhpStorm.

 * Time: 12.26
 */
// echo $start_date;
// echo $dcbayarpilih ;

?>
<html>
<head>
<title>Rekap Billing</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">

.style3 {font-family: Arial, Helvetica, sans-serif}
.style5 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
	font-weight: bold;
}
.style7 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 10px;
	font-weight: bold;
}
.style9 {font-family: Arial, Helvetica, sans-serif; font-size: 9px; }

</style>
</head>

<body>
<table width="737" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><table width="737" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td class="style5"><?php echo ' '.getenv('V_NAMARS'); ?>  </td>
      </tr>
      <tr>
        <td class="style7">Laporan Rekapitulasi Billing </td>
      </tr>
      <tr>
        <td class="style7">Periode : <?php echo tanggaldua($start_date).' sampai dengan '.tanggaldua($end_date); ?></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="737" border="1" cellspacing="0" cellpadding="2">
      <tr class="style9">
        <td width="25"><div align="center">No</div></td>
        <td width="57"><div align="center">No Trx </div></td>
        <td width="35"><div align="center">No.RM</div></td>
        <td width="120"><div align="center">Nama Pasien </div></td>
        <td width="50"><div align="center">Cara Bayar </div></td>
        <td width="50"><div align="center">Tgl. Bayar </div></td>
        <td width="57"><div align="right">Nilai</div></td>
        <td width="57"><div align="right">Asuransi</div></td>
        <td width="57"><div align="right">Non Asuransi </div></td>
        <td width="57"><div align="right">Selisih Kelas </div></td>
        <td width="57"><div align="center">Dibayarkan</div></td>
        <td width="57"><div align="center">Kasir</div></td>
      </tr>

      <?php
                    $no=0;
                    $subnilai=0;
                    $totnilai=0;
                    $subasuransi=0;
                    $totasuransi=0;
                    $subnonasuransi=0;
                    $totnonasuransi=0;

                    $totnonasuransi=0;
                    $totselisih=0;
                    $totterbayar=0;
                    
                    $start_date = $this->input->post('tglmulai');
                    $end_date = $this->input->post('tglakhir');
                    $mulai = date("Y-m-d", strtotime($start_date));
                    $sampai = date("Y-m-d", strtotime($end_date));

                    $per1="SELECT billing_rekap.*,billing_rekap.asuransi as nilaias,billing_rekap.user as kasir, pasien.nama_pasien as nama_pasien ";
                    $per2="FROM billing_rekap,pasien where billing_rekap.norm = pasien.no_rm and billing_rekap.tglbayar between '$mulai' and  '$sampai' ";
                   
                    if (trim($duser)=='semua'){ 
                        $filterkasir='';
                    } 
                    else {
                        $filterkasir=" and billing_rekap.user='".$duserpilih."'";
                    }


                    $per=$per1.$per2.$filterkasir;
                    $qry2=$this->db->query($per);

                    foreach ($qry2->result_array() as $brs3) {
                        $no=$no+1;
                        $notrx=$brs3['notrx'];
                        $norm=$brs3['norm'];
                        $nama=$brs3['nama_pasien'];
                        $bagian=$brs3['bagian'];
                        $tglbayar=$brs3['tglbayar'];
                        $nilai=$brs3['nilai'];
                        $asuransi=$brs3['nilaias'];
                        $nonasuransi=$brs3['nonasuransi'];
                        $carabayar='Umum';
                        $selisih=$brs3['selisih'];
                        $terbayar=$brs3['terbayar'];
                        $kasir=$brs3['kasir'];


                        // $subnilai=$subnilai+$nilai;
                        // $totnilai=$totnilai+$nilai;
                        // $subasuransi=$subasuransi+$asuransi;
                        // $totasuransi=$totasuransi+$asuransi;
                        // $subnonasuransi=$subnonasuransi+$nonasuransi;
                        // $totnonasuransi=$totnonasuransi+$nonasuransi;
                        $totnilai=$totnilai+$nilai;
                        $totasuransi=$totasuransi+$asuransi;
                        $totnonasuransi=$totnonasuransi+$nonasuransi;
                        $totselisih=$totselisih+$selisih;
                        $totterbayar=$totterbayar+$terbayar;

                        ?>        

                    <tr class="style9">
                        <td><div align="right"><?php echo $no ;?></div></td>
                        <td><div align="center"><?php echo $notrx ;?></div></td>
                        <td><div align="center"><?php echo $norm ;?></div></td>
                        <td><div align="left"><?php echo $nama ;?></div></td>
                        <td><div align="center"><?php echo $carabayar ;?></div></td>
                        <td><div align="center"><?php echo $tglbayar ;?></div></td>
                        <td><div align="right"><?php echo groupangka($nilai) ;?></div></td>
                        <td><div align="right"><?php echo groupangka($asuransi) ;?></div></td>
                        <td><div align="right"><?php echo groupangka($nonasuransi) ;?></div></td>
                        <td><div align="right"><?php echo groupangka($selisih) ;?></div></td>
                        <td><div align="right"><?php echo groupangka($terbayar) ;?></div></td>
                        <td><div align="center"><?php echo $kasir ;?></div></td>
                    </tr>

                <?php
                    }
                ?>    
    </table></td>
  </tr>
                    
  

  <tr>
    <td><table width="737" border="1" cellspacing="0" cellpadding="2">
      <tr class="style9">
        <td width="357"><div align="right" class="style9"> Total </div></td>
        <td width="57"><div align="right"><?php echo groupangka($totnilai) ;?></div></td>
        <td width="57"><div align="right"><?php echo groupangka($totasuransi) ;?></div></td>
        <td width="57"><div align="right"><?php echo groupangka($totnonasuransi) ;?></div></td>
        <td width="57"><div align="right"><?php echo groupangka($totselisih) ;?></div></td>
        <td width="57"><div align="right"><?php echo groupangka($totterbayar) ;?></div></td>
        <td width="57"><div align="center"></div></td>
      </tr>
    </table>
      <table width="737" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="60">&nbsp;</td>
          <td width="131">&nbsp;</td>
          <td width="124">&nbsp;</td>
          <td width="125">&nbsp;</td>
          <td width="111">&nbsp;</td>
          <td width="116">&nbsp;</td>
          <td width="70">&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td class="style9"><div align="center">Penerima Bagian Keuangan </div></td>
          <td>&nbsp;</td>
          <td><div align="center"><span class="style9">Kepala Ruangan Loket </span></div></td>
          <td>&nbsp;</td>
          <td><div align="center"><span class="style9">Kasir</span></div></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><div align="center">________________</div></td>
          <td>&nbsp;</td>
          <td><div align="center">________________</div></td>
          <td>&nbsp;</td>
          <td><div align="center">________________</div></td>
          <td>&nbsp;</td>
        </tr>
      </table>
    <p>&nbsp;</p></td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>

<!-- <td><div align="right"><?php echo groupangka($nilai) ;?></div></td> -->
                        <!-- <td><div align="right"><?php echo groupangka($asuransi) ;?></div></td>
                        <td><div align="right"><?php echo groupangka($nonasuransi) ;?></div></td>
                        <td><div align="right"><?php echo groupangka($selisih) ;?></div></td>
                        <td><div align="right"><?php echo groupangka($terbayar) ;?></div></td> -->