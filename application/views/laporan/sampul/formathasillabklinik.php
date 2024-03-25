



<?php 
// echo $notransaksi_IN;

$qry2=$this->db->query("SELECT register_instalasi.tanggal, register_instalasi.no_rm,register_instalasi.nama_pasien, pasien.alamat, pasien.provinsi, pasien.kota, pasien.kecamatan, pasien.desa, register_instalasi.nama_dokter, register_instalasi.nama_unitR, register_instalasi.diagnosa, register_instalasi.no_lab, pasien.tgl_lahir, register_instalasi.jamkirim, register.golongan, pasien.sex FROM register_instalasi INNER JOIN pasien ON register_instalasi.no_rm = pasien.no_rm INNER JOIN register ON register_instalasi.notransaksi =register.notransaksi and register_instalasi.notransaksi_IN = '".$notransaksi_IN."' LIMIT 1");;

foreach ($qry2->result_array() as $brs2) {
    $no_rm=$brs2['no_rm'];
    $nama_pasien=$brs2['nama_pasien'];
    $alamat=$brs2['alamat'];
    $provinsi=$brs2['provinsi'];
    $kota=$brs2['kota'];
    $kecamatan=$brs2['kecamatan'];
    $desa=$brs2['desa'];
    $nama_dokter=$brs2['nama_dokter'];
    $nama_unitR=$brs2['nama_unitR'];
    $diagnosa=$brs2['diagnosa'];
    $no_lab=$brs2['no_lab'];
    $tgl_lahir=$brs2['tgl_lahir'];
    $tanggal=$brs2['tanggal'];
    $sex1=$brs2['sex'];
    if ($sex1 == 'L') {
        $sex='Laki - Laki';
    } else if ($sex1 == 'P') {
        $sex='Perempuan';
    } else {
        $sex='';
    }
    $jamkirim=$brs2['jamkirim'];
    $golongan=$brs2['golongan'];
    //hitung umur
    $tgl_lahir_obj = new DateTime($tgl_lahir);
    $tanggal_obj = new DateTime($tanggal);
    $umur = $tanggal_obj->diff($tgl_lahir_obj)->y;
}  
?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="6" style="font-family: Arial, sans-serif; font-size: 13px;">RSUD KOTA MAKASSAR</td>
  </tr>
  <tr>
    <td colspan="6" style="font-family: Arial, sans-serif; font-size: 14px;">HASIL PEMERIKSAAN LABORATORIUM PATOLOGI KLINIK</td>
  </tr>
  <tr>
    <td colspan="6">&nbsp;</td>
  </tr>
  <tr>
    <td width="13%" style="font-family: Arial, sans-serif; font-size: 11px;">Nama Pasien</td>
    <td colspan="2" style="font-family: Arial, sans-serif; font-size: 11px;">: <?php echo $nama_pasien?></td>
    <td width="16%" style="font-family: Arial, sans-serif; font-size: 11px;">No.Lab</td>
    <td colspan="2" style="font-family: Arial, sans-serif; font-size: 11px;">: <?php echo $no_lab?></td>
    </tr>
    <tr>
    <td style="font-family: Arial, sans-serif; font-size: 11px;">No. RM</td>
    <td colspan="2" style="font-family: Arial, sans-serif; font-size: 11px;">: <?php echo $no_rm?></td>
    <td style="font-family: Arial, sans-serif; font-size: 11px;">Status Pasien</td>
    <td colspan="2" style="font-family: Arial, sans-serif; font-size: 11px;">: <?php echo $golongan?></td>
  </tr>
  <tr>
    <td style="font-family: Arial, sans-serif; font-size: 11px;">Tgl. Lahir</td>
    <td colspan="2" style="font-family: Arial, sans-serif; font-size: 11px;">: <?php echo $tgl_lahir?></td>
    <td style="font-family: Arial, sans-serif; font-size: 11px;">Umur / J.Kelamin</td>
    <td colspan="2" style="font-family: Arial, sans-serif; font-size: 11px;">: <?php echo $umur.'T / '.$sex?></td>
  </tr>
  <tr>
    <td style="font-family: Arial, sans-serif; font-size: 11px;">Alamat</td>
    <td style="font-family: Arial, sans-serif; font-size: 11px;" colspan="2">: <?php echo trim($alamat).' '.trim($desa)?></td>
    <td style="font-family: Arial, sans-serif; font-size: 11px;">Tgl. Order</td>
    <td style="font-family: Arial, sans-serif; font-size: 11px;" colspan="2">: <?php echo trim($jamkirim)?>;</td>
</tr>
<tr>
    <td>&nbsp;</td>
    <td style="font-family: Arial, sans-serif; font-size: 11px;" colspan="2">: <?php echo trim($kecamatan).' '.trim($kota).' '.trim($provinsi)?></td>
    <td style="font-family: Arial, sans-serif; font-size: 11px;">Tgl.Terima</td>
    <td style="font-family: Arial, sans-serif; font-size: 11px;" colspan="2">: <?php echo trim($jamkirim)?></td>
</tr>
<tr>
    <td style="font-family: Arial, sans-serif; font-size: 11px;">Dokter</td>
    <td style="font-family: Arial, sans-serif; font-size: 11px;" colspan="2">: <?php echo trim($nama_dokter)?></td>
    <td style="font-family: Arial, sans-serif; font-size: 11px;">Tgl. Cetak</td>
    <td style="font-family: Arial, sans-serif; font-size: 11px;" colspan="2">: <?php echo date('Y-m-d')?></td>
</tr>
<tr>
    <td style="font-family: Arial, sans-serif; font-size: 11px;">Unit</td>
    <td style="font-family: Arial, sans-serif; font-size: 11px;" colspan="2">: <?php echo trim($nama_unitR)?></td>
    <td>&nbsp;</td>
    <td style="font-family: Arial, sans-serif; font-size: 11px;" colspan="2">&nbsp;</td>
</tr>
<tr>
    <td style="font-family: Arial, sans-serif; font-size: 11px;">Diagnosa</td>
    <td style="font-family: Arial, sans-serif; font-size: 11px;" colspan="2">: <?php echo trim($diagnosa)?></td>
    <td>&nbsp;</td>
    <td colspan="3">&nbsp;</td>
</tr>
  <tr>
    <td>&nbsp;</td>
    <td width="40%">&nbsp;</td>
    <td width="15%">&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td width="23%">&nbsp;</td>
  </tr>
  <tr style="font-family: Arial, sans-serif; font-size: 11px; font-weight: bold; background-color: #EAEAEA; border-bottom: 1px solid black; border-top: 1px solid black;">
    <td colspan="2" align="left" style="font-family: Arial, sans-serif; font-size: 11px; height: 25px;">PARAMETER</td>
    <td style="border-bottom: 1px solid black;">&nbsp;&nbsp;&nbsp;HASIL</td>
    <td colspan="2" style="border-bottom: 1px solid black;">UNIT</td>
    <td style="border-bottom: 1px solid black;">RUJUKAN</td>
</tr>
<?php 
    $spasi1="";
    $qry2=$this->db->query("SELECT TEST_GROUP from resdt where ONO='$notransaksi_IN' group by TEST_GROUP order by DISP_SEQ ");;
    foreach ($qry2->result_array() as $brs2) {
        $spasi1="&nbsp;&nbsp;";
        $test_group=$brs2['TEST_GROUP'];
?>
        <tr style="border-bottom: 1px solid #CACDCF; ">
        <td colspan="2" style="font-family: Arial, sans-serif; font-size: 11px; height: 25px;"><?php echo trim($test_group)?></td>
        <td style="font-family: Arial, sans-serif; font-size: 11px;"></td>
        <td colspan="2" style="font-family: Arial, sans-serif; font-size: 11px;"></td>
        <td style="font-family: Arial, sans-serif; font-size: 11px;"></td>
        </tr>
<?php
        $spasi2="";
        $qry21=$this->db->query("SELECT ITEM_PARENT from resdt where ONO='$notransaksi_IN' and TEST_GROUP='$test_group' group by ITEM_PARENT order by DISP_SEQ ");
        $nama_paket='';
        foreach ($qry21->result_array() as $brs21) {
            $spasi2="&nbsp;&nbsp;&nbsp;";
            $item_parent=$brs21['ITEM_PARENT'];
            //ambil nama item_parent
            $qry212=$this->db->query("SELECT * from mlis where  Kode_Paket='$item_parent' limit 1 ");;
            foreach ($qry212->result_array() as $brs212) {
                $nama_paket=$brs212['Nama_Paket'];
                if ($brs212['Nama_Panjang_Paket'] !='') {
                    $nama_paket=$brs212['Nama_Panjang_Paket'];
                } else {
                    $nama_paket=$brs212['Nama_Paket'];
                }
            }    
            if ($nama_paket != '') {
?>            
            <tr style="border-bottom: 1px solid #CACDCF; ">
            <td colspan="2" style="font-family: Arial, sans-serif; font-size: 11px; height: 25px;"><?php echo $spasi1.trim($nama_paket)?></td>
            <td style="font-family: Arial, sans-serif; font-size: 11px;"></td>
            <td colspan="2" style="font-family: Arial, sans-serif; font-size: 11px;"></td>
            <td style="font-family: Arial, sans-serif; font-size: 11px;"></td>
            </tr>
<?php
            }
            $qry22=$this->db->query("SELECT * from resdt where ONO='$notransaksi_IN' and TEST_GROUP='$test_group' and ITEM_PARENT='$item_parent' and RESULT_VALUE<>'' order by DISP_SEQ ");
            foreach ($qry22->result_array() as $brs22) {
                $parameter=$brs22['TEST_NM'];
                $flag=$brs22['FLAG'];
                if ($flag != 'N') {
                  if(strlen($flag) == 1) {
                    $flag = str_pad($flag, 2, " ", STR_PAD_LEFT);
                  }
                } else {
                  $flag = '&nbsp;&nbsp;&nbsp;';
                }  
                $hasil1=$brs22['RESULT_VALUE'];
                $hasil2=$brs22['RESULT_FT'];
                $unit=$brs22['UNIT'];
                $rujukan=$brs22['REF_RANGE'];
?>
                <tr style="border-bottom: 1px solid #CACDCF; ">
                    <td colspan="2" style="font-family: Arial, sans-serif; font-size: 11px; height: 25px;"><?php echo $spasi1.$spasi2.trim($parameter)?></td>
                    <td style="font-family: Arial, sans-serif; font-size: 11px;"><?php echo '<span style="color: red;">' . $flag . ' </span>' ?><?php echo trim($hasil1)?></td>
                    <td colspan="2" style="font-family: Arial, sans-serif; font-size: 11px;"><?php echo trim($unit)?></td>
                    <td style="font-family: Arial, sans-serif; font-size: 11px;"><?php echo htmlspecialchars(trim($rujukan))?></td>
                </tr>
<?php } 
        }
    }        
?>
<tr>
    <td>&nbsp;</td>
    <td colspan="6">&nbsp;</td>
  </tr>
<?php 
    $qry222=$this->db->query("SELECT * from resdt_text where notransaksi_IN='$notransaksi_IN'");
    $jumlah_baris = $qry222->num_rows();
    if ( $jumlah_baris <= 0) {
        $Eritrosit='';
        $Leukosit='';
        $Trombosit='';
        $Kesan='';
        $Saran='';
    } 
    foreach ($qry222->result_array() as $brs222) {
        $Eritrosit=$brs222['Eritrosit'];
        $Leukosit=$brs222['Leukosit'];
        $Trombosit=$brs222['Trombosit'];
        $Kesan=$brs222['Kesan'];
        $Saran=$brs222['Saran'];
    }
?>

<?php if ($Eritrosit != '') { ?>
  <tr>
    <td colspan="1" style="font-family: Arial, sans-serif; font-size: 11px; font-weight: bold; vertical-align: top;">Eritrosit</td>
    <td colspan="6" style="font-family: Arial, sans-serif; font-size: 11px;"><?php echo nl2br($Eritrosit) ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="5">&nbsp;</td>
  </tr>
<?php } ?>  

<?php if ($Leukosit != '') { ?>
  <tr>
    <td colspan="1" style="font-family: Arial, sans-serif; font-size: 11px; font-weight: bold; vertical-align: top;">Leukosit :</td>
    <td colspan="6" style="font-family: Arial, sans-serif; font-size: 11px;"><?php echo nl2br($Leukosit) ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="5">&nbsp;</td>
  </tr>
<?php } ?>  

<?php if ($Trombosit != '') { ?>
  <tr>
    <td colspan="1" style="font-family: Arial, sans-serif; font-size: 11px; font-weight: bold; vertical-align: top;">Trombosit :</td>
    <td colspan="6" style="font-family: Arial, sans-serif; font-size: 11px;"><?php echo nl2br($Trombosit) ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="5">&nbsp;</td>
  </tr>
<?php } ?>  
  
<?php if ($Kesan != '') { ?>
  <tr>
    <td colspan="1" style="font-family: Arial, sans-serif; font-size: 11px; font-weight: bold; vertical-align: top;">Kesan :</td>
    <td colspan="6" style="font-family: Arial, sans-serif; font-size: 11px;"><?php echo nl2br($Kesan) ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="5">&nbsp;</td>
  </tr>
<?php } ?>  

<?php if ($Saran != '') { ?>
  <tr>
    <td colspan="1" style="font-family: Arial, sans-serif; font-size: 11px; font-weight: bold; vertical-align: top;">Saran :</td>
    <td colspan="6" style="font-family: Arial, sans-serif; font-size: 11px;"><?php echo nl2br($Saran) ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="5">&nbsp;</td>
  </tr>
<?php } ?>  

<tr>
    <td colspan="6" style="font-family: Arial, sans-serif; font-size: 9px; font-style: italic; vertical-align: top;">* Data diatas sudah sesuai dengan hasil dari LIS yang sudah tervalidasi.</td>
  </tr>
  <tr>
    <td colspan="6" style="font-family: Arial, sans-serif; font-size: 9px; font-style: italic; vertical-align: top;">* Hanya untuk kebutuhan melihat hasil laboratorium, bukan untuk cetakan hasil Laboratorium.</td>
  </tr>
</table>