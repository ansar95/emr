
<html>
<head>
<style type="text/css">

.style1 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-weight: bold;
}  

.style3 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-weight: bold;
}  

.style21 {	font-family: Arial, Helvetica, sans-serif;
	/* font-size: 8px; */
  font-size: 12px;
}

.style2 {	font-family: Arial, Helvetica, sans-serif;
	/* font-size: 8px; */
  font-size: 12px;
}

.style8 {	font-family: Arial, Helvetica, sans-serif;
	/* font-size: 8px; */
  font-size: 12px;
}

.style15 {	font-family: Arial, Helvetica, sans-serif;
	/* font-size: 8px; */
  font-size: 12px;
}

.style12 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-weight: bold;
}

.style13 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 10px;
}

.style14 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 10px;
	font-style: italic;
  font-weight: bold;
}

.garispinggir {
        border-width: 0.5px;
        border-top-style: solid;
        border-bottom-style: solid;
        border-left-style: none;
        border-right-style: none;
    }

.garisbawah {
        border-width: 1px;
        border-top-style: none;
        border-bottom-style: solid;
        border-left-style: none;
        border-right-style: none;
    }
.garisbawahtebal {
        border-width: 1.5px;
        border-top-style: none;
        border-bottom-style: solid;
        border-left-style: none;
        border-right-style: none;
    }    


.style14 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 10px;
	font-style: italic;
  font-weight: bold;
}
.style51 {	font-family: Arial, Helvetica, sans-serif;
	font-size: 15px;
	font-weight: bold;
}
.style52 {	font-family: Arial, Helvetica, sans-serif;
	font-size: 10px;
}

</style>
</head>

<body>
<?php
  
 
   $qry2=$this->db->query("SELECT *,register.golongan as golongannya FROM register INNER JOIN pasien ON register.no_rm = pasien.no_rm INNER JOIN register_detail ON register.notransaksi =register_detail.notransaksi and register.notransaksi = '$notrx' LIMIT 1");
   foreach ($qry2->result_array() as $brs2) {
                   $xnotransaksi=$brs2['notransaksi'];
                   $xnama_pasien=$brs2['nama_pasien'];
                   $xno_rm=$brs2['no_rm'];
                   $xalamat=$brs2['alamat'];
                   if ($brs2['sex']=='L'){$xsex='Laki-Laki';} else {$xsex='Perempuan';};
                   if ($brs2['bagian']=='UGD' and $brs2['kode_keluar']=='UGD')
                       { $xjenispelayanan='Rawat Inap';}
                       else {$xjenispelayanan='Rawat Jalan';} 
                   $xtgl1=$brs2['tgl_masuk'];
                   $xtgl_masuk=substr($xtgl1,8,2).'-'.substr($xtgl1,5,2).'-'.substr($xtgl1,0,4);
                   $xunit=$brs2['keluarpada'];
                   $xasuransi=$brs2['golongannya'];
                   $xnoasuransi=$brs2['no_askes'];
                   $xkelurahan=$brs2['desa'];
                   $xkecamatan=$brs2['kecamatan'];
                   $xkota=$brs2['kota'];
                   $xtgl2=$brs2['tgl_keluar'];
                   $xtgl_keluar=substr($xtgl2,8,2).'-'.substr($xtgl2,5,2).'-'.substr($xtgl2,0,4);
                   $nama_dokter=$brs2['nama_dokter']; //salah jika ambilnya di register
                   $xnilaiselisih=$brs2['selisih'];
   }              

   $qry2=$this->db->query("SELECT nama_dokter as nama_dokternya FROM register_detail where notransaksi = '$notrx' and kode_kelas<>'' order by id DESC LIMIT 1");
   foreach ($qry2->result_array() as $brs2) {
                   $nama_dokter=$brs2['nama_dokternya']; 
   }       

if ($xasuransi <> 'UMUM') {

  if ($xasuransi == 'JS.RAHARJA') {
    $xasuransi='JASA RAHARJA';
  }
  
  $nonas=0;

 ?>
<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
      <td><img src="../rsudpemprov/assets/img/logosurat.jpg" alt="ss" width="700" height="105" /></td>
  </tr>
    <td><div align="left"><span class="style51">BILLING </span><span class="style52">| <?php echo $xasuransi;?></span></div></td>
  </tr>  
</table>
<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
 
    <td><table width="100%"  border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="1" colspan="9">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="9">	
		    <table width="100%"  border="0" cellspacing="0" cellpadding="0">
				  <td><span class="style1">DATA PASIEN</span></td>
			    </tr>
		    </table>
		    </td>
      </tr>
      <tr>
        <td width="10%" height="5"><span class="style2">No.Registrasi </span></td>
        <td width="1%" height="5"><span class="style2">:</span></td>
        <td width="19%" height="5"><span class="style2"><?php echo $xnotransaksi;?></span></td>
        <td width="10%" height="5"><span class="style2">Nama</span></td>
        <td width="1%" height="5"><span class="style2">:</span></td>
        <td width="33%" height="5"><span class="style2"><?php echo $xnama_pasien;?></span></td>
        <td width="13%" height="5"><span class="style2">Pelayanan</span></td>
        <td width="1%" height="5"><span class="style2">:</span></td>
        <td width="12%" height="5"><span class="style2"><?php echo $xjenispelayanan;?></span></td>
      </tr>
      <tr>
        <td height="5"><span class="style2">No. RM </span></td>
        <td height="5"><span class="style2">:</span></td>
        <td height="5"><span class="style2"><?php echo $xno_rm;?></span></td>
        <td height="5"><span class="style2">Alamat</span></td>
        <td height="5"><span class="style2">:</span></td>
        <td height="5"><span class="style2"><?php echo $xalamat;?></span></td>
        <td width="10%" height="5"><span class="style2">Tanggal Masuk</span></td>
        <td height="5"><span class="style2">:</span></td>
        <td height="5"><span class="style2"><?php echo $xtgl_masuk;?></span></td>
      </tr>
      <tr>
        <td width="10%" height="5"><span class="style2">Asuransi</span></td>
        <td height="5"><span class="style2">:</span></td>
        <td height="5"><span class="style2"><?php echo $xasuransi;?></span></td>
        <td height="5"><span class="style2">DPJP</span></td>
        <td height="5"><span class="style2">:</span></td>
        <td height="5"><span class="style2"><?php echo $nama_dokter;?></span></td>
        <td height="5"><span class="style2">Tanggal Keluar</span></td>
        <td height="5"><span class="style2">:</span></td>
        <td height="5"><span class="style2"><?php echo $xtgl_keluar;?></span></td>
      </tr>
     
    </table></td>
    </tr>
    <tr>
  <td><hr /></td>
  </tr>
</table>

<?php
 $xtotaltarip=0;
 
//kamar perawatan
$xjumharga=0;
if ($xasuransi <> 'UMUM') {
?>
<table width="100%" border="0" cellspacing="0" cellpadding="1">
  <tr>
    <td width="555%" height="15" colspan="7" valign="bottom"><div align="left"><span class="style3">AKOMODASI KAMAR </span></div></td>
  </tr>
</table>
<div class="garispinggir">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="45%" height="10" valign="middle"><div align="left"><span class="style21">Unit</span></div></td>
      <td width="28%" height="10" valign="middle"><div align="left"><span class="style21">Tanggal</span></div></td>
      <td width="10%" height="10" valign="middle"><div align="right"><span class="style21">Harga/Hari </span></div></td>
      <td width="7%" height="10" valign="middle"><div align="right"><span class="style21">Hari</span></div></td>
      <td width="12%" height="10" valign="middle"><div align="right"><span class="style21">Jumlah Harga </span></div></td>
    </tr>
  </table>
</div>

<?php
// $qry1=$this->db->query("SELECT *, register_detail.id as idnya, register_detail.status as xstatusnya,register.bagian as bagian FROM register_detail INNER JOIN pasien ON register_detail.no_rm=pasien.no_rm INNER JOIN register ON register.notransaksi = register_detail.notransaksi WHERE register_detail.notransaksi='$xnotransaksi' AND register_detail.no_rm='$xno_rm' and register_detail.kode_unit<>'IGDD' and register_detail.kode_unit<>'IGDP' and register_detail.kode_unit<>'KMBS' ORDER BY register_detail.tgl_keluar_kamar ASC, register_detail.id ASC");

$qry1=$this->db->query("SELECT *, register_detail.id as idnya, register_detail.status as xstatusnya,register.bagian as bagian FROM register_detail INNER JOIN pasien ON register_detail.no_rm=pasien.no_rm INNER JOIN register ON register.notransaksi = register_detail.notransaksi WHERE register_detail.notransaksi='$xnotransaksi' AND register_detail.no_rm='$xno_rm' ORDER BY register_detail.tgl_keluar_kamar ASC, register_detail.id ASC");

        foreach ($qry1->result_array() as $brs1) {
            $xkode_kamar=$brs1['kode_kamar'];
            $xtglmsk=$brs1['tgl_masuk_kamar'];
            $pecahkan = explode('-', $xtglmsk);
            $xtglmsk1=$pecahkan[0] . '-' . $pecahkan[1] . '-' . $pecahkan[2];
            $xtglklr=$brs1['tgl_keluar_kamar'];
            $pecahkan1 = explode('-', $xtglklr);
            $xtglklr1=$pecahkan1[0] . '-' . $pecahkan1[1] . '-' . $pecahkan1[2];

            $xkode_unit=$brs1['kode_unit'];
            $xkode_kelas=$brs1['kode_kelas'];
            $xno_rm1=$brs1['no_rm'];
            $xregisterdetailstatus=$brs1['xstatusnya'];
            $xidnya=$brs1['idnya'];

            //coba ambil ini $brs1['bagian'] dari register
            $xpelayanannya=$brs1['bagian'];

            if ($xpelayanannya=='JALAN'){
                $xtglklr=$brs1['tgl_masuk_kamar'];
                $pecahkan = explode('-', $xtglklr);
                $xtglklr1=$pecahkan[0] . '-' . $pecahkan[1] . '-' . $pecahkan[2];
                
            }
            
            if ($xtglklr1=='0000-00-00') {
                $xtglklr=date("Y-m-d");
                $pecahkan = explode('-', $xtglklr);
                $xtglklr1=$pecahkan[0] . '-' . $pecahkan[1] . '-' . $pecahkan[2];
            }

            $ztgl_keluar=$xtglklr1;

            $xnama_pasien = "";
            $xnama_unit = "";

            $xnotransaksi=$brs1['notransaksi'];
            $xno_transaksi_secondary=$brs1['no_transaksi_secondary'];

            //=======RAWAT INAP======= yg ditampilkan hanya yg bagian<>jalan
            if ($xpelayanannya<>'JALAN' and $xnotransaksi==$xno_transaksi_secondary) {
                //*-------------------kamar perawatan
                $xjasas=0;
                $qry2=$this->db->query("SELECT * FROM mkamar WHERE kode_kamar = '".$xkode_kamar."' LIMIT 1");               
                foreach ($qry2->result_array() as $brs2) {
                    $xnama_kamar=$brs2['nama_kamar'];
                    $xjasas=$brs2['harga'];
                }
                $qry31=$this->db->query("SELECT * FROM munit WHERE kode_unit = '". $xkode_unit."' LIMIT 1");               
                foreach ($qry31->result_array() as $brs31) {
                    $xilahir=$brs31['ILAHIR'];
                    $xigd=$brs31['IGD'];
                }

                $xnotransaksi=$brs1['notransaksi'];
                $xnama_pasien=$brs1['nama_pasien'];
                $xtanggal=$brs1['tgl_masuk'];
                

                $xtgl_masuknya=$brs1['tgl_masuk_kamar'];

                if ($xregisterdetailstatus <> 0){
                    $qry19=$this->db->query("SELECT tgl_keluar_kamar,tgl_masuk_kamar FROM register_detail WHERE id='".$xidnya."'");
                    foreach ($qry19->result_array() as $brs19) {
                      $tglm=new DateTime($brs19['tgl_masuk_kamar']);
                      $tglk=new DateTime($brs19['tgl_keluar_kamar']);
                      $xqty = $tglk->diff($tglm)->days ;
                      $xtgl_keluarnya=$brs19['tgl_keluar_kamar'];                       
                    }  
                } else {    
                  $qry19=$this->db->query("SELECT tgl_keluar_kamar,tgl_masuk_kamar FROM register_detail WHERE id='".$xidnya."'");;
                    foreach ($qry19->result_array() as $brs19) {
                      $tglm=new DateTime($brs19['tgl_masuk_kamar']);
                      $tglk=new DateTime(date("Y-m-d"));
                      $xqty = $tglk->diff($tglm)->days ;
                      $xtgl_keluarnya=date("Y-m-d");
                    }
                }
                
                $xket1=substr($xtgl_masuknya,8,2).'-'.substr($xtgl_masuknya,5,2).'-'.substr($xtgl_masuknya,0,4).' s/d '.substr($xtgl_keluarnya,8,2).'-'.substr($xtgl_keluarnya,5,2).'-'.substr($xtgl_keluarnya,0,4);

                if (($xilahir<>'1' or $xigd<>'1') and  $xqty==0) {$xqty=1;} 
                $xket2='Hari';
                $xkode=0;
                $xrincian='KAMAR PERAWATAN';
                $xnama_unit=$brs1['nama_unit'];
                $xhargaqty=$xjasas*$xqty;
                $xjumharga=$xjumharga+$xhargaqty;
                if ($xhargaqty > 0) {
                
       ?>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="45%"><span class="style21"><?php echo $xnama_unit?></span></td>
              <td width="28%"><span class="style21"><?php echo $xket1;?></span></td>
              <td width="10%"><div align="right"><span class="style21"><?php echo groupangka($xjasas);?></span></div></td>
              <td width="7%"><div align="right"><span class="style21"><?php echo groupangka($xqty);?></span></div></td>
              <td width="12%"><div align="right"><span class="style21"><?php echo groupangka($xhargaqty);?></span></div></td>
            </tr>
              <?php  
                }    }
               
              ?>
            </table>
        <?php      
            }    
            $xtotaltarip=$xtotaltarip+$xjumharga;
        ?>       
        <div class="garispinggir">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="88%" colspan="2" valign="middle"  height="10"><div align="right"><span class="style15">sub total</span></div></td>
               <td width="12%"><div align="right"><span class="style3"><?php echo groupangka($xjumharga);?></span></div></td>
             </tr>
          </table>
        </div>    

<?php } ?>      <!-- -------------------akhir dari if umum untuk cetakan kamar perawatan -->    
<!-- -------------------visite -->
<?php
$qry3=$this->db->query("select * from t_visite where notransaksi='$xnotransaksi' and nonasuransi='$nonas' ");
if($qry3->num_rows()>0) {
?>
        <table width="100%" border="0" cellspacing="0" cellpadding="1">
        <tr>
          <td width="555%" height="15" colspan="7" valign="bottom"><div align="left"><span class="style3">KUNJUNGAN / VISITE DOKTER</span></div></td>
        </tr>
        </table>
        <div class="garispinggir">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="35%" height="10" valign="middle"><div align="left"><span class="style8">Dokter</span></div></td>
              <td width="36%" height="10" valign="middle"><div align="left"><span class="style8">Unit</span></div></td>
              <!-- <td width="11%" height="10" valign="middle"><div align="left"><span class="style8">Uraian</span></div></td> -->
              <td width="10%" height="10" valign="middle"><div align="right"><span class="style8">Harga Item</span></div></td>
              <td width="7%" height="10" valign="middle"><div align="right"><span class="style8">QTY</span></div></td>
              <td width="12%" height="10" valign="middle"><div align="right"><span class="style8">Jumlah Harga</span></div></td>
            </tr>
          </table>
        </div>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">

<?php

        $qry1=$this->db->query("SELECT kode_unit,kode_kelas,nama_unit from register_detail WHERE notransaksi='$xnotransaksi' AND no_rm='$xno_rm' ORDER BY id ASC");
        $xjumharga=0;
        foreach ($qry1->result_array() as $brs1) {
          $zkode_unit=$brs1['kode_unit'];
          $zkode_kelas=$brs1['kode_kelas'];
          $znama_unit=$brs1['nama_unit'];

            $qry3=$this->db->query("select count(no_rm) as qtynya, nama_dokter as nama_dokter,visite as visite from t_visite where notransaksi='$xnotransaksi' and kode_unit='$zkode_unit' group by kode_dokter, visite");
                foreach ($qry3->result_array() as $brs3) {
                    $xket1=$brs3['visite'];
                    $xtindakan=$brs3['visite'];
                    $xqty=$brs3['qtynya'];;
                    $xdokter=$brs3['nama_dokter'];
                  
                    //mencari nilai dari kunjungan dokter
                    $xvis=0;
                    $xkds=0;
                    $xkdu=0;
                    $xkdc=0;
                    $xkdss=0;
                    $xkdi=0;

                    $qry31=$this->db->query("SELECT * FROM mkelas WHERE kode_kelas = '$zkode_kelas' LIMIT 1");
                    foreach ($qry31->result_array() as $brs31) {
                        //$xnama_kamar=$brs31['nama_kamar'];
                        $xvis=$brs31['vis'];
                        $xkds=$brs31['kds'];
                        $xkdu=$brs31['kdu'];
                        $xkdc=$brs31['kdc'];
                        $xkdss=$brs31['kdss'];
                        $xkdi=$brs31['kdi'];
                    }

                    //cari nilai kunjungan dokter...
                    
                    $xjasas=0;
                    
                    if($xket1=='VISITE') {$xjasas=$xvis;}
                    if($xket1=='KONSUL SPESIALIS') {$xjasas=$xkds;}
                    if($xket1=='DOKTER UGD') {$xjasas=$xkdi;}
                    if($xket1=='DOKTER UMUM') {$xjasas=$xkdu;}
                    if($xket1=='KONSUL SUB SPESIALIS') {$xjasas=$xkdss;}
                    if($xket1=='KONSUL CYTO-DOKTER IGD') {$xjasas=$xkdc;}
                    $xhargaqty=$xjasas*$xqty;
                    $xjumharga=$xjumharga+$xhargaqty;
              ?>  
                    <tr>
                    <td width="35%" height="5"><span class="style2"><?php echo $xdokter;?></span></td>
                    <td width="36%" height="5"><span class="style2"><?php echo $znama_unit;?></span></td>
                    <!-- <td width="11%" height="5"><span class="style2"><?php echo $xtindakan;?></span></td> -->
                
                    <td width="10%" height="5"><div align="right"><span class="style2"><?php echo groupangka($xjasas);?></span></div></td>
                    <td width="7%" height="5"><div align="right"><span class="style2"><?php echo $xqty;?></span></div></td>
                    <td width="12%" height="5"><div align="right"><span class="style2"><?php echo groupangka($xhargaqty);?></span></div></td>
                  </tr>
              <?php     
              }
             
            }     
            $xtotaltarip=$xtotaltarip+$xjumharga;
              ?>
      </table>
      <div class="garispinggir">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="88%" colspan="2" valign="middle"  height="10"><div align="right"><span class="style15">sub total</span></div></td>
               <td width="12%"><div align="right"><span class="style3"><?php echo groupangka($xjumharga);?></span></div></td>
             </tr>
          </table>
      </div>    
<?php
}
?>
<!-- tindakan KEPERAWATAN -->

      <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="555%" height="15" colspan="7" valign="bottom"><div align="left"><span class="style3">TINDAKAN</span></div></td>
          </tr>
        </table>

      <div class="garispinggir">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="88%" height="10" valign="middle"><div align="left"><span class="style21">Unit</span></div></td>
            <td width="12%" height="10" valign="middle"><div align="right"><span class="style21">Jumlah Harga</span></div></td>
          </tr>
        </table>
      </div> 

      <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <?php
            $xjumharga=0;
            $qry4=$this->db->query("select nama_unit as nama_unit, sum(jasas*qty) as qtyjasas, sum(jasas*qty*diskon/100) as diskon from ptindakanperawat where notransaksi='$xnotransaksi'  and nonasuransi='$nonas'  group by kode_unit order by kode_unit");
                foreach ($qry4->result_array() as $brs4) {
                    $xunit=$brs4['nama_unit'];
                    $xhargaqty=$brs4['qtyjasas']-$brs4['diskon'];
                    $xjumharga=$xjumharga+$xhargaqty;
             ?>       
                    <tr>
                      <td width="88%" height="5"><span class="style21"><?php echo $xunit;?></span></td>
                      <td width="12%" height="5"><div align="right"><span class="style21"><?php echo groupangka($xhargaqty);?></span></div></td>
                    </tr>


             <?php       
                }
                $xtotaltarip=$xtotaltarip+$xjumharga;  
             ?>   

          </table>
          <div class="garispinggir">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="88%" height="10"><div align="right"><span class="style15">sub total</span></div></td>
              <td width="12%" valign="middle"><div align="right"><span class="style3"><?php echo groupangka($xjumharga);?></span></div></td>
            </tr>
          </table>
          </div>

<!-- Laboratorium --> 
<!-- cari kode unit Laboratorium di munit -->
<?php
$qry=$this->db->query("select kode_unit from munit where lab=1 and hapus=0 limit 1");
foreach ($qry->result_array() as $brs) {
  $kode_unit_inst=$brs['kode_unit'];
}
// $qry1=$this->db->query("SELECT no_transaksi_secondary FROM register_detail notransaksi='$xnotransaksi'");
// foreach ($qry->result_array() as $brs) {
//   $xno_transaksi_secondary=$brs['no_transaksi_secondary'];

    $qry7=$this->db->query("select * from ptindakan_instalasi where (notransaksi='$xnotransaksi' or notransaksi='$xno_transaksi_secondary') and kode_unit='$kode_unit_inst' and nonasuransi='$nonas' order by tanggal");
    if($qry7->num_rows()>0) {
    ?>        
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="555%" height="15" colspan="7" valign="bottom"><div align="left"><span class="style3">LABORATORIUM</span></div></td>
          </tr>
        </table>
        <div class="garispinggir">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <!-- <td width="10%" height="10" valign="middle"><div align="left"><span class="style8">Tanggal</span></div></td> -->
              <td width="41%" height="10" valign="middle"><div align="left"><span class="style8">Unit Pemesan</span></div></td>
              <td width="30%" height="10" valign="middle"><div align="left"><span class="style8">Uraian</span></div></td>
              <td width="10%" height="10" valign="middle"><div align="right"><span class="style8">Harga Item</span></div></td>
              <td width="7%" height="10" valign="middle"><div align="right"><span class="style8">QTY</span></div></td>
              <td width="12%" height="10" valign="middle"><div align="right"><span class="style8">Jumlah Harga</span></div></td>
            </tr>
          </table>
        </div>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <?php
        $xjumharga=0;
       
        $qry7=$this->db->query("select * from ptindakan_instalasi where (notransaksi='$xnotransaksi' or notransaksi='$xno_transaksi_secondary') and kode_unit='$kode_unit_inst'  and nonasuransi='$nonas'  order by tanggal");
        foreach ($qry7->result_array() as $brs7) {
            $xnotransaksi_IN=$brs7['notransaksi_IN'];
            $xtanggal=$brs7['tanggal'];
            $xkode_tindakan=$brs7['tindakan'];
            $qry21=$this->db->query("SELECT * FROM mtindakan WHERE kode_tindakan = '".$xkode_tindakan."' LIMIT 1");
            foreach ($qry21->result_array() as $brs21) {
                $xtindakan=$brs21['tindakan'];
            }
            $nama_dokter_periksa1='';
            $qry22=$this->db->query("SELECT * FROM register_instalasi WHERE notransaksi_IN = '".$xnotransaksi_IN."' LIMIT 1");
            foreach ($qry22->result_array() as $brs22) {
                $nama_dokter_periksa1=$brs22['nama_dokter_periksa'];
                $nama_dokter_pemesan=$brs22['nama_dokter'];
                $nama_unit_pemesan=$brs22['nama_unitR'];
            }

            $xqty=$brs7['qty'];
            $xjasas=$brs7['jasas'];
            if ($brs7['diskon'] >0 ) { $xdiskon=$brs7['diskon']; } else { $xdiskon=0;}
            $xhargaqty=($xjasas*$xqty)-($xjasas*$xqty*$xdiskon/100);
            $xjumharga=$xjumharga+$xhargaqty;
      ?>
      <tr>
        <!-- <td width="10%" height="5"><div align="left"><span class="style2"><?php echo $xtanggal;?></span></div></td> -->
        <td width="41%" height="5"><span class="style2"><?php echo $nama_unit_pemesan;?></span></td>
        <td width="30%" height="5"><span class="style2"><?php echo $xtindakan;?></span></td>
        <td width="10%" height="5"><div align="right"><span class="style2"><?php echo groupangka($xjasas);?></span></div></td>
        <td width="7%" height="5"><div align="right"><span class="style2"><?php echo $xqty;?></span></div></td>
        <td width="12%" height="5"><div align="right"><span class="style2"><?php echo groupangka($xhargaqty);?></span></div></td>
      </tr>
       <?php       
          }
          $xtotaltarip=$xtotaltarip+$xjumharga;  
       ?>
    
    </table>

    <?php
    }
    ?>         

          <div class="garispinggir">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="88%" height="10"><div align="right"><span class="style15">sub total</span></div></td>
              <td width="12%" valign="middle"><div align="right"><span class="style3"><?php echo groupangka($xjumharga);?></span></div></td>
            </tr>
          </table>
          </div>

<!-- radiologi --> 
<!-- cari kode unit radiologi di munit -->
<?php
$qry=$this->db->query("select kode_unit from munit where rad=1 and hapus=0 limit 1");
foreach ($qry->result_array() as $brs) {
  $kode_unit_inst=$brs['kode_unit'];
}


$qry7=$this->db->query("select * from ptindakan_instalasi where (notransaksi='$xnotransaksi' or notransaksi='$xno_transaksi_secondary') and kode_unit='$kode_unit_inst'  and nonasuransi='$nonas'  order by tanggal");
if($qry7->num_rows()>0) {
 
?>        
        
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="555%" height="15" colspan="7" valign="bottom"><div align="left"><span class="style3">RADIOLOGI</span></div></td>
        </tr>
      </table>
      <div class="garispinggir">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="10%" height="10" valign="middle"><div align="left"><span class="style8">Tanggal</span></div></td>
            <td width="31%" height="10" valign="middle"><div align="left"><span class="style8">Unit Pemesan</span></div></td>
            <td width="30%" height="10" valign="middle"><div align="left"><span class="style8">Uraian</span></div></td>
            <td width="10%" height="10" valign="middle"><div align="right"><span class="style8">Harga Item</span></div></td>
            <td width="7%" height="10" valign="middle"><div align="right"><span class="style8">QTY</span></div></td>
            <td width="12%" height="10" valign="middle"><div align="right"><span class="style8">Jumlah Harga</span></div></td>
          </tr>
        </table>
      </div>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
<?php
        $xjumharga=0;
        $qry7=$this->db->query("select * from ptindakan_instalasi where (notransaksi='$xnotransaksi' or notransaksi='$xno_transaksi_secondary') and kode_unit='$kode_unit_inst' and nonasuransi='$nonas'  order by tanggal");
        foreach ($qry7->result_array() as $brs7) {
            $xnotransaksi_IN=$brs7['notransaksi_IN'];
            $xtanggal=$brs7['tanggal'];
            $xkode_tindakan=$brs7['tindakan'];
            $qry21=$this->db->query("SELECT * FROM mtindakan WHERE kode_tindakan = '".$xkode_tindakan."' LIMIT 1");
            foreach ($qry21->result_array() as $brs21) {
                $xtindakan=$brs21['tindakan'];
            }
            $nama_dokter_periksa1='';
            $qry22=$this->db->query("SELECT * FROM register_instalasi WHERE notransaksi_IN = '".$xnotransaksi_IN."' LIMIT 1");
            foreach ($qry22->result_array() as $brs22) {
                $nama_dokter_periksa1=$brs22['nama_dokter_periksa'];
                $nama_dokter_pemesan=$brs22['nama_dokter'];
                $nama_unit_pemesan=$brs22['nama_unitR'];
            }

            $xqty=$brs7['qty'];
            $xjasas=$brs7['jasas'];
            if ($brs7['diskon'] >0 ) { $xdiskon=$brs7['diskon']; } else { $xdiskon=0;}
            $xhargaqty=($xjasas*$xqty)-($xjasas*$xqty*$xdiskon/100);
            $xjumharga=$xjumharga+$xhargaqty;
      ?>
      <tr>
        <td width="10%" height="5"><div align="left"><span class="style2"><?php echo $xtanggal;?></span></div></td>
        <td width="31%" height="5"><span class="style2"><?php echo $nama_unit_pemesan;?></span></td>
        <td width="30%" height="5"><span class="style2"><?php echo $xtindakan;?></span></td>
        <td width="10%" height="5"><div align="right"><span class="style2"><?php echo groupangka($xjasas);?></span></div></td>
        <td width="7%" height="5"><div align="right"><span class="style2"><?php echo $xqty;?></span></div></td>
        <td width="12%" height="5"><div align="right"><span class="style2"><?php echo groupangka($xhargaqty);?></span></div></td>
      </tr>
       <?php       
          }
          $xtotaltarip=$xtotaltarip+$xjumharga;  
       ?>
    
    </table>
          <div class="garispinggir">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="91%" height="10"><div align="right"><span class="style15">sub total</span></div></td>
                <td width="9%" valign="middle"><div align="right"><span class="style3"><?php echo groupangka($xjumharga);?></span></div></td>
              </tr>
            </table>
          </div>
<?php
}
?>   
  
<!-- hemodialisa --> 
<?php
$qry=$this->db->query("select kode_unit from munit where hem=1 and hapus=0 limit 1");
foreach ($qry->result_array() as $brs) {
  $kode_unit_inst=$brs['kode_unit'];
}
$qry=$this->db->query("select no_transaksi_secondary from register_detail where notransaksi='$xnotransaksi' and kode_unit='$kode_unit_inst'  order by tgl_masuk_kamar");
if($qry->num_rows()>0) {
?>  
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="555%" height="15" colspan="7" valign="bottom"><div align="left"><span class="style3">HEMODIALISA</span></div></td>
          </tr>
        </table>
        <div class="garispinggir">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="10%" height="10" valign="middle"><div align="left"><span class="style8">Tanggal</span></div></td>
              <td width="61%" height="10" valign="middle"><div align="left"><span class="style8">Uraian</span></div></td>
              <td width="10%" height="10" valign="middle"><div align="right"><span class="style8">Harga Item</span></div></td>
              <td width="7%" height="10" valign="middle"><div align="right"><span class="style8">QTY</span></div></td>
              <td width="12%" height="10" valign="middle"><div align="right"><span class="style8">Jumlah Harga</span></div></td>
            </tr>
          </table>
        </div>

        <table width="100%" border="0" cellspacing="0" cellpadding="0">
<?php
        $xjumharga=0;
        $qry=$this->db->query("select no_transaksi_secondary from register_detail where notransaksi='$xnotransaksi' and kode_unit='$kode_unit_inst' order by tgl_masuk_kamar");
        foreach ($qry->result_array() as $brs) {
          $zno_transaksi_secondary=$brs['no_transaksi_secondary'];
          
          $qry7=$this->db->query("select * from ptindakan where notransaksi='$zno_transaksi_secondary'  and kode_unit='$kode_unit_inst' and  nonasuransi='$nonas' order by tanggal");
          foreach ($qry7->result_array() as $brs7) 
          {
              $xtanggal=$brs7['tanggal'];
              $xunit='HEMODIALISA';
              $xtindakan=$brs7['tindakan'];
              $xnama_dokter=$brs7['nama_dokter'];
              $xqty=$brs7['qty'];
              $xjasas=$brs7['jasas'];
              if ($brs7['diskon'] >0 ) { $xdiskon=$brs7['diskon']; } else { $xdiskon=0;}
              $xhargaqty=($xjasas*$xqty)-($xjasas*$xqty*$xdiskon/100);
              $xjumharga=$xjumharga+$xhargaqty;
              ?>
              <tr>
                <td width="10%" height="5"><div align="left"><span class="style2"><?php echo $xtanggal;?></span></div></td>
                <td width="61%" height="5"><span class="style2"><?php echo $xtindakan;?></span></td>
                <td width="10%" height="5"><div align="right"><span class="style2"><?php echo groupangka($xjasas);?></span></div></td>
                <td width="7%" height="5"><div align="right"><span class="style2"><?php echo $xqty;?></span></div></td>
                <td width="12%" height="5"><div align="right"><span class="style2"><?php echo groupangka($xhargaqty);?></span></div></td>
              </tr>

        <?php       
            }
        }  
          $xtotaltarip=$xtotaltarip+$xjumharga;  
       ?>
    
    </table>
          <div class="garispinggir">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="88%" height="10"><div align="right"><span class="style15">sub total</span></div></td>
              <td width="12%" valign="middle"><div align="right"><span class="style3"><?php echo groupangka($xjumharga);?></span></div></td>
            </tr>
          </table>
          </div>
<?php
}
?>   
<!-- RUJUKAN KONSUL ke POLI --> 
<?php
         $qry=$this->db->query("select kode_unit from munit where hem=1 and hapus=0 limit 1");
         foreach ($qry->result_array() as $brs) {
           $kode_unit_hem=$brs['kode_unit'];
         }
         $qry=$this->db->query("select kode_unit from munit where rad=1 and hapus=0 limit 1");
         foreach ($qry->result_array() as $brs) {
           $kode_unit_rad=$brs['kode_unit'];
         }
         $qry=$this->db->query("select kode_unit from munit where lab=1 and hapus=0 limit 1");
         foreach ($qry->result_array() as $brs) {
           $kode_unit_lab=$brs['kode_unit'];
         }
         $qry=$this->db->query("select no_transaksi_secondary,kode_unit from register_detail where notransaksi='$xnotransaksi' and kode_unit<>'$kode_unit_hem' and kode_unit<>'$kode_unit_lab' and kode_unit<>'$kode_unit_rad' and inap_to_poli=1 order by tgl_masuk_kamar");
if($qry->num_rows()>0) {
?>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="555%" height="15" colspan="7" valign="bottom"><div align="left"><span class="style3">TINDAKAN / KONSUL POLIKLINIK</span></div></td>
          </tr>
        </table>
        <div class="garispinggir">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="88%" height="10" valign="middle"><div align="left"><span class="style8">Unit</span></div></td>
              <td width="12%" height="10" valign="middle"><div align="right"><span class="style8">Jumlah Harga</span></div></td>
            </tr>
          </table>
        </div>

        <table width="100%" border="0" cellspacing="0" cellpadding="0">
<?php
        $xjumharga=0;
        $qry=$this->db->query("select no_transaksi_secondary,kode_unit from register_detail where notransaksi='$xnotransaksi' and kode_unit<>'$kode_unit_hem' and kode_unit<>'$kode_unit_lab' and kode_unit<>'$kode_unit_rad' and inap_to_poli=1 order by tgl_masuk_kamar");
        foreach ($qry->result_array() as $brs) {
          $zno_transaksi_secondary=$brs['no_transaksi_secondary'];
          $zkode_unit=$brs['kode_unit'];

          $qry7=$this->db->query("select nama_unit as nama_unitnya, sum(jasas*qty) as jasasnya, sum(jasas*qty*diskon/100) as diskonnya from ptindakan where notransaksi='$zno_transaksi_secondary'  and kode_unit='$zkode_unit' and nonasuransi='$nonas' group by kode_unit order by kode_unit ");
          foreach ($qry7->result_array() as $brs7) 
          {
              $xunit=$brs7['nama_unitnya'];
              $xjasas=$brs7['jasasnya'];
              $xdiskon=$brs7['diskonnya'];
              $xhargaqty= $xjasas-$xdiskon;
              $xjumharga=$xjumharga+$xhargaqty;
              ?>
              <tr>
                <td width="88%" height="5"><span class="style2"><?php echo $xunit;?></span></td>
                <td width="12%" height="5"><div align="right"><span class="style2"><?php echo groupangka($xhargaqty);?></span></div></td>
              </tr>

        <?php       
            }
        }  
          $xtotaltarip=$xtotaltarip+$xjumharga;  
       ?>
    
    </table>
          <div class="garispinggir">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="88%" height="10"><div align="right"><span class="style15">sub total</span></div></td>
              <td width="12%" valign="middle"><div align="right"><span class="style3"><?php echo groupangka($xjumharga);?></span></div></td>
            </tr>
          </table>
          </div>
<?php
}
?>
          
<!-- O2 -->
<?php

$qry4=$this->db->query("select * from po2 where notransaksi='$xnotransaksi' and  nonasuransi='$nonas' order by tgl_pakai,id");
if($qry4->num_rows()>0) {

?> 
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="555%" height="15" colspan="7" valign="bottom"><div align="left"><span class="style3">PEMAKAIAN O2</span></div></td>
          </tr>
        </table>

      <div class="garispinggir">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="71%" height="10" valign="middle"><div align="left"><span class="style8">Unit</span></div></td>
            <td width="10%" height="10" valign="middle"><div align="right"><span class="style8">Harga/liter</span></div></td>
            <td width="7%" height="10" valign="middle"><div align="right"><span class="style8">Liter</span></div></td>
            <td width="12%" height="10" valign="middle"><div align="right"><span class="style8">Jumlah Harga</span></div></td>
          </tr>
        </table>
      </div> 

      <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <?php
            // cek dulu harga o2 perliter
            $qry=$this->db->query("select * from mharga02 limit 1");
            foreach ($qry->result_array() as $brs) {
              $hargao2=$brs['liter'];
            }

            $xjumharga=0;
            $qry4=$this->db->query("select nama_unit as nama_unitnya, sum(qty) as qtynya, diskon as diskonnya from po2 where notransaksi='$xnotransaksi' and nonasuransi='$nonas' group by kode_unit order by kode_unit ");
                foreach ($qry4->result_array() as $brs4) {
                    $xunit=$brs4['nama_unitnya'];
                    $xqty=$brs4['qtynya'];
                    $xjasas= $hargao2;
                    $xdiskon=$brs4['diskonnya'];
                    $xhargaqty=($xjasas*$xqty)-($xjasas*$xqty*$xdiskon/100);
                    $xjumharga=$xjumharga+$xhargaqty;
             ?>       
                    <tr>
                    <td width="71%" height="5"><span class="style2"><?php echo $xunit;?></span></td>
                    <td width="10%" height="5"><div align="right"><span class="style2"><?php echo groupangka($xjasas);?></span></div></td>
                    <td width="7%" height="5"><div align="right"><span class="style2"><?php echo $xqty;?></span></div></td>
                    <td width="12%" height="5"><div align="right"><span class="style2"><?php echo groupangka($xhargaqty);?></span></div></td>
                  </tr>


             <?php       
                }
                $xtotaltarip=$xtotaltarip+$xjumharga;  
             ?>   

          </table>
          <div class="garispinggir">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="88%" height="10"><div align="right"><span class="style15">sub total</span></div></td>
              <td width="12%" valign="middle"><div align="right"><span class="style3"><?php echo groupangka($xjumharga);?></span></div></td>
            </tr>
          </table>
          </div>
<?php
}
?>
<!-- KANTONG DARAH -->
<?php
 $qry4=$this->db->query("select * from pdarah where notransaksi='$xnotransaksi' and nonasuransi='$nonas' order by tanggal,id");
 if($qry4->num_rows()>0) {
?>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="555%" height="15" colspan="7" valign="bottom"><div align="left"><span class="style3">PEMAKAIAN KANTONG DARAH</span></div></td>
          </tr>
        </table>

      <div class="garispinggir">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="71%" height="10" valign="middle"><div align="left"><span class="style8">Unit</span></div></td>
            <td width="10%" height="10" valign="middle"><div align="right"><span class="style8">Harga</span></div></td>
            <td width="7%" height="10" valign="middle"><div align="right"><span class="style8">Qty</span></div></td>
            <td width="12%" height="10" valign="middle"><div align="right"><span class="style8">Jumlah Harga</span></div></td>
          </tr>
        </table>
      </div> 

      <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <?php
            // cek dulu harga kantong darah
            $qry=$this->db->query("select * from mhargadarah limit 1");
            foreach ($qry->result_array() as $brs) {
              $hargadarah=$brs['hargadarah'];
            }

            $xjumharga=0;
            $qry4=$this->db->query("select nama_unit as nama_unitnya, sum(qty) as qtynya, diskon as diskonnya from pdarah where notransaksi='$xnotransaksi' and nonasuransi='$nonas' group by kode_unit order by kode_unit");
                foreach ($qry4->result_array() as $brs4) {
                  $xunit=$brs4['nama_unitnya'];
                  $xqty=$brs4['qtynya'];
                  $xjasas= $hargadarah;
                  $xdiskon=$brs4['diskonnya'];
                  $xhargaqty=($xjasas*$xqty)-($xjasas*$xqty*$xdiskon/100);
                  $xjumharga=$xjumharga+$xhargaqty;
             ?>       
                    <tr>
                    <td width="71%" height="5"><span class="style2"><?php echo $xunit;?></span></td>
                    <td width="10%" height="5"><div align="right"><span class="style2"><?php echo groupangka($xjasas);?></span></div></td>
                    <td width="7%" height="5"><div align="right"><span class="style2"><?php echo $xqty;?></span></div></td>
                    <td width="12%" height="5"><div align="right"><span class="style2"><?php echo groupangka($xhargaqty);?></span></div></td>
                  </tr>


             <?php       
                }
                $xtotaltarip=$xtotaltarip+$xjumharga;  
             ?>   

          </table>
          <div class="garispinggir">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="88%" height="10"><div align="right"><span class="style15">sub total</span></div></td>
              <td width="12%" valign="middle"><div align="right"><span class="style3"><?php echo groupangka($xjumharga);?></span></div></td>
            </tr>
          </table>
          </div>
<?php
 }
?>

<!-- kamar operasi --> 
<?php
$qry7=$this->db->query("select * from ptindakanopr where notransaksi='$xnotransaksi' and nonasuransi='$nonas' order by tgl_periksa");
if($qry7->num_rows()>0) {
?>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="555%" height="15" colspan="7" valign="bottom"><div align="left"><span class="style3">KAMAR OPERASI</span></div></td>
          </tr>
        </table>
        <div class="garispinggir">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="10%" height="10" valign="middle"><div align="left"><span class="style8">Tanggal</span></div></td>
              <td width="61%" height="10" valign="middle"><div align="left"><span class="style8">Uraian</span></div></td>
              <td width="10%" height="10" valign="middle"><div align="right"><span class="style8">Harga Item</span></div></td>
              <td width="7%" height="10" valign="middle"><div align="right"><span class="style8">QTY</span></div></td>
              <td width="12%" height="10" valign="middle"><div align="right"><span class="style8">Jumlah Harga</span></div></td>
            </tr>
          </table>
        </div>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
<?php
        $xjumharga=0;
        $qry7=$this->db->query("select * from ptindakanopr where notransaksi='$xnotransaksi' and nonasuransi='$nonas' order by tgl_periksa");
        foreach ($qry7->result_array() as $brs7) {
            $xtanggal=$brs7['tgl_periksa'];
            $xkode_tindakan=$brs7['tindakan'];
            $qry21=$this->db->query("SELECT * FROM mtindakan WHERE kode_tindakan = '".$xkode_tindakan."' LIMIT 1");
            foreach ($qry21->result_array() as $brs21) {
                $xtindakan=$brs21['tindakan'];
            }
            $xqty=1;
            $xjasas=$brs7['jasas'];
            if ($brs7['diskon'] >0 ) { $xdiskon=$brs7['diskon']; } else { $xdiskon=0;}
            $xhargaqty=($xjasas*$xqty)-($xjasas*$xqty*$xdiskon/100);

            $xjumharga=$xjumharga+$xhargaqty;
      ?>
      <tr>
        <td width="10%" height="5"><div align="left"><span class="style2"><?php echo $xtanggal;?></span></div></td>
        <td width="61%" height="5"><span class="style2"><?php echo $xtindakan;?></span></td>
        <td width="10%" height="5"><div align="right"><span class="style2"><?php echo groupangka($xjasas);?></span></div></td>
        <td width="7%" height="5"><div align="right"><span class="style2"><?php echo $xqty;?></span></div></td>
        <td width="12%" height="5"><div align="right"><span class="style2"><?php echo groupangka($xhargaqty);?></span></div></td>
      </tr>
       <?php       
          }
          $xtotaltarip=$xtotaltarip+$xjumharga;  
       ?>
    
    </table>
          <div class="garispinggir">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="88%" height="10"><div align="right"><span class="style15">sub total</span></div></td>
                <td width="12%" valign="middle"><div align="right"><span class="style3"><?php echo groupangka($xjumharga);?></span></div></td>
              </tr>
            </table>
          </div>
<?php
}
?>

<!-- kamar bersalin --> 
<?php
$qry7=$this->db->query("select * from ptindakanlahir where notransaksi='$xnotransaksi' and nonasuransi='$nonas' order by tanggal");
if($qry7->num_rows()>0) {
?>

        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="555%" height="15" colspan="7" valign="bottom"><div align="left"><span class="style3">KAMAR BERSALIN / PERSALINAN</span></div></td>
          </tr>
        </table>
        <div class="garispinggir">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="10%" height="10" valign="middle"><div align="left"><span class="style8">Tanggal</span></div></td>
              <td width="61%" height="10" valign="middle"><div align="left"><span class="style8">Uraian</span></div></td>
              <td width="10%" height="10" valign="middle"><div align="right"><span class="style8">Harga Item</span></div></td>
              <td width="7%" height="10" valign="middle"><div align="right"><span class="style8">QTY</span></div></td>
              <td width="12%" height="10" valign="middle"><div align="right"><span class="style8">Jumlah Harga</span></div></td>
            </tr>
          </table>
        </div>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
<?php
        $xjumharga=0;
        $qry7=$this->db->query("select * from ptindakanlahir where notransaksi='$xnotransaksi' and nonasuransi='$nonas' order by tanggal");
        foreach ($qry7->result_array() as $brs7) {
            $xtanggal=$brs7['tanggal'];
            $xtindakan=$brs7['tindakan'];
            $xqty=1;
            $xjasas=$brs7['jasas'];
            if ($brs7['diskon'] >0 ) { $xdiskon=$brs7['diskon']; } else { $xdiskon=0;}
            $xhargaqty=($xjasas*$xqty)-($xjasas*$xqty*$xdiskon/100);
            $xjumharga=$xjumharga+$xhargaqty;
      ?>
      <tr>
        <td width="10%" height="5"><div align="left"><span class="style2"><?php echo $xtanggal;?></span></div></td>
        <td width="61%" height="5"><span class="style2"><?php echo $xtindakan;?></span></td>
        <td width="10%" height="5"><div align="right"><span class="style2"><?php echo groupangka($xjasas);?></span></div></td>
        <td width="7%" height="5"><div align="right"><span class="style2"><?php echo $xqty;?></span></div></td>
        <td width="12%" height="5"><div align="right"><span class="style2"><?php echo groupangka($xhargaqty);?></span></div></td>
      </tr>
       <?php       
          }
          $xtotaltarip=$xtotaltarip+$xjumharga;  
       ?>
    
    </table>
          <div class="garispinggir">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="88%" height="10"><div align="right"><span class="style15">sub total</span></div></td>
                <td width="12%" valign="middle"><div align="right"><span class="style3"><?php echo groupangka($xjumharga);?></span></div></td>
              </tr>
            </table>
          </div>
<?php
}
?>

<?php
//MAKANAN/DIET
            $qry8=$this->db->query("select * from pgizi where notransaksi='$xnotransaksi' order by tanggal");
            if($qry8->num_rows()>0) {
?>

        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="555%" height="15" colspan="7" valign="bottom"><div align="left"><span class="style3">MAKANAN / DIET</span></div></td>
          </tr>
        </table>
        <div class="garispinggir">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <!-- <td width="8%" height="10" valign="middle"><div align="left"><span class="style8">Tanggal</span></div></td> -->
              <td width="71%" height="10" valign="middle"><div align="left"><span class="style8">Uraian</span></div></td>
              <td width="10%" height="10" valign="middle"><div align="right"><span class="style8">Harga Item</span></div></td>
              <td width="7%" height="10" valign="middle"><div align="right"><span class="style8">QTY</span></div></td>
              <td width="12%" height="10" valign="middle"><div align="right"><span class="style8">Jumlah Harga</span></div></td>
            </tr>
          </table>
        </div>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">

<?php
                    $xjumharga=0;
                    $qry8=$this->db->query("select count(pgizi.kdpagi) as jumlahnya, pgizi.kdpagi, pgizi.kode_kamar,mgizi_makanan.nama_makanan, mgizi_makanan.harga from pgizi,mgizi_makanan where pgizi.kdpagi=mgizi_makanan.kode_makanan and notransaksi='$xnotransaksi' group by pgizi.kdpagi,pgizi.kode_kamar order by pgizi.kdpagi ");
                    foreach ($qry8->result_array() as $brs8) {
                        $xqty=$brs8['jumlahnya'];
                        $xkdpagi=$brs8['kdpagi'];
                        $xnama_makanan=$brs8['nama_makanan'];
                        $harga=0;
                        if ($xkdpagi == 'MB') {
                            //cari harga makanan, liat kelasnya
                            $xkode_kamar=$brs8['kode_kamar'];
                            $qry9=$this->db->query("select mkelas.makanan as harga from mkamar,mkelas where mkamar.kode_kelas=mkelas.kode_kelas and mkamar.kode_kamar='$xkode_kamar' limit 1");
                            foreach ($qry9->result_array() as $brs9) {
                                $harga=$brs9['harga'];
                            }
                        } else {
                            $harga=$brs8['harga'];
                        }
                        $xhargaqty=$harga*$xqty;
                        $xjumharga=$xjumharga+$xhargaqty;
                      ?>
                        <tr>
                        <td width="71%" height="5"><span class="style2"><?php echo $xnama_makanan;?></span></td>
                        <td width="10%" height="5"><div align="right"><span class="style2"><?php echo groupangka($harga);?></span></div></td>
                        <td width="7%" height="5"><div align="right"><span class="style2"><?php echo $xqty;?></span></div></td>
                        <td width="12%" height="5"><div align="right"><span class="style2"><?php echo groupangka($xhargaqty);?></span></div></td>
                      </tr>

                    <?php  
                    }
                    $xtotaltarip=$xtotaltarip+$xjumharga;  
                    ?>
          </table>
          <div class="garispinggir">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="88%" height="10"><div align="right"><span class="style15">sub total</span></div></td>
                <td width="12%" valign="middle"><div align="right"><span class="style3"><?php echo groupangka($xjumharga);?></span></div></td>
              </tr>
            </table>
          </div>

<?php
            } 

?>

<!-- RESEP -->
<?php
if ($xasuransi <> 'UMUM') {
  // $qry8=$this->db->query("select resep_header.noresep from resep_header,resep_detail where resep_header.noresep=resep_detail.noresep and resep_header.notraksaksi='$xnotransaksi' and resep_detail.proses=1 order by tglresep,noresep ");
  $qry8=$this->db->query("select * from resep_header where notraksaksi='$xnotransaksi' and kode_depo<>'' order by tglresep,noresep ");
  
  if($qry8->num_rows()>0) {
?>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="555%" height="15" colspan="7" valign="bottom"><div align="left"><span class="style3">RESEP APOTIK </span></div></td>
          </tr>
        </table>
        <div class="garispinggir">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="10%" height="10" valign="middle"><div align="left"><span class="style8">Tanggal</span></div></td>
              <td width="15%" height="10" valign="middle"><div align="left"><span class="style8">No.Resep</span></div></td>
              <td width="27%" height="10" valign="middle"><div align="left"><span class="style8">Depo/Apotik</span></div></td>
              <td width="30%" height="10" valign="middle"><div align="left"><span class="style8">Dokter</span></div></td>
              <td width="18%" height="10" valign="middle"><div align="right"><span class="style8">Jumlah Harga</span></div></td>
            </tr>
          </table>
        </div>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
<?php
        $xjumharga=0;
        $qry8=$this->db->query("select * from resep_header where notraksaksi='$xnotransaksi' and kode_depo<>''order by tglresep,noresep ");
        // $qry8=$this->db->query("select resep_header.noresep,resep_header.tglresep, resep_header.nama_dokter, resep_header.nama_depo from resep_header,resep_detail where resep_header.noresep=resep_detail.noresep and resep_header.notraksaksi='$xnotransaksi' and resep_detail.proses=1 order by tglresep,noresep ");

        foreach ($qry8->result_array() as $brs8) {
            $xnoresep=$brs8['noresep'];
            $xtanggal=$brs8['tglresep'];
            $xnama_dokter=$brs8['nama_dokter'];
            $xnama_depo=$brs8['nama_depo'];
            // $xnama_unit_resep=$brs8['nama_unit'];

            //--cari di resep_detail
            $qry24=$this->db->query("SELECT sum(qty*hargapakai) as xjumhrg FROM resep_detail WHERE noresep = '$xnoresep' and proses=1 group by noresep ");
            foreach ($qry24->result_array() as $brs24) {
                $xjasas=$brs24['xjumhrg'];
            }
            $xjumharga=$xjumharga+$xjasas;
            ?>
            <tr>
              <td width="10%"><div align="left"><span class="style2"><?php echo $xtanggal;?></span></div></td>
              <td width="15%"><div align="left"><span class="style2"><?php echo $xnoresep;?></span></div></td>
              <td width="27%"><span class="style2"><?php echo $xnama_depo;?></span></td>
              <td width="30%"><span class="style2"><?php echo $xnama_dokter;?></span></td>
              <td width="18%"><div align="right"><span class="style2"><?php echo groupangka($xjasas);?></span></div></td>
            </tr>
            <?php  
                     }    
                    
                     $xtotaltarip=$xtotaltarip+$xjumharga;
                  ?>
          </table>
          <div class="garispinggir">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="91%" colspan="4"><div align="right"><span class="style15">sub total</span></div></td>
              <td width="9%"><div align="right"><span class="style3"><?php echo groupangka($xjumharga);?></span></div></td>
            </tr>
          </table>
          </div>
<?php
} }
?>



<!-- FORENSIK -->
<?php 
if ($xasuransi <> 'UMUM') {
?>
 <!-------------------Administrasi Loket --> 
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="555%" height="15" colspan="7" valign="bottom"><div align="left"><span class="style3">BIAYA ADMINISTRASI </span></div></td>
  </tr>
</table>
<div class="garispinggir">
  
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <?php
        $xjumharga=0;
        if ($xpelayanannya=='JALAN'){ $xid=2; } else  { $xid=1; }

        $qry27=$this->db->query("SELECT * FROM madminloket where id=".$xid." Limit 1");
        foreach ($qry27->result_array() as $brs27) {
            $xtarifloket=$brs27['tarif'];
        }        
        $xjasas=$xtarifloket;
        $xhargaqty=$xjasas;
        $xjumharga=$xjumharga+$xjasas;
        $xtotaltarip=$xtotaltarip+$xjumharga;
  ?>
  <tr>
    <td width="88%"><span class="style2"><?php echo 'Administrasi Loket';?></span></td>
    <td width="12%"><div align="right"><span class="style2"><?php echo groupangka($xhargaqty);?></span></div></td>
  </tr>

</table>
</div>
<div class="garisbawah">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="88%" height="10"><div align="right"><span class="style15">sub total</span></div></td>
      <td width="12%" valign="middle"><div align="right"><span class="style3"><?php echo groupangka($xjumharga);?></span></div></td>
    </tr>
  </table>
</div>   
<?php } ?>

<!-- ====TOTAL BILLING=== -->

<div class="garisbawahtebal">
<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="87%" height="15"><div align="right"><span class="style12">Dijamin oleh Asuransi, TOTAL (Rp.)</span></div></td>
    <td width="13%"><div align="right"><span class="style12"><?php echo groupangka($xtotaltarip);?></span></div></td>
  </tr>
  <?php
    if ($xnilaiselisih != 0) {
      $xterbilangnya=$xnilaiselisih;
  ?>
  <tr>
    <td width="87%" height="15"><div align="right"><span class="style12">Pembayaran Selisih Naik Kelas (Rp.)</span></div></td>
    <td width="13%"><div align="right"><span class="style12"><?php echo groupangka($xnilaiselisih);?></span></div></td>
  </tr>
  <?php } else {$xterbilangnya=$xtotaltarip;} ?>
</table>
</div>
<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr class="style13">
    <td width="8%"><span class="style13">Terbilang : </span></td>
    <td width="92%" class="style14"><?php echo terbilang($xterbilangnya).' rupiah***';?></td>

  </tr>
</table>


<!-- masukkan kedalam database pasien -->
<?php 
$this->db->query("update register set tarifbilling='$xtotaltarip' where notransaksi='$xnotransaksi' limit 1 ");

?>

<?php } ?> <!-- ===========penutup if umum=============== -->
<!-- ===========FUNCTION=============== -->
<?php
function kata($x) {
    $x = abs($x);
    $angka = array("", "satu", "dua", "tiga", "empat", "lima",
    "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
    $temp = "";
    if ($x <12) {
        $temp = " ". $angka[$x];
    } else if ($x <20) {
        $temp = kata($x - 10). " belas";
    } else if ($x <100) {
        $temp = kata($x/10)." puluh". kata($x % 10);
    } else if ($x <200) {
        $temp = " seratus" . kata($x - 100);
    } else if ($x <1000) {
        $temp = kata($x/100) . " ratus" . kata($x % 100);
    } else if ($x <2000) {
        $temp = " seribu" . kata($x - 1000);
    } else if ($x <1000000) {
        $temp = kata($x/1000) . " ribu" . kata($x % 1000);
    } else if ($x <1000000000) {
        $temp = kata($x/1000000) . " juta" . kata($x % 1000000);
    } else if ($x <1000000000000) {
        $temp = kata($x/1000000000) . " milyar" . kata(fmod($x,1000000000));
    } else if ($x <1000000000000000) {
        $temp = kata($x/1000000000000) . " trilyun" . kata(fmod($x,1000000000000));
    }     
        return $temp;
}

function terbilang($x, $style=3) {
    if($x<0) {
        $hasil = "minus ". trim(kata($x));
    } else {
        $hasil = trim(kata($x));
    }     
    switch ($style) {
        case 1:
            // mengubah semua karakter menjadi huruf besar
            $hasil = strtoupper($hasil);
            break;
        case 2:
            // mengubah karakter pertama dari setiap kata menjadi huruf besar
            $hasil = ucwords($hasil);
            break;
        case 3:
            // mengubah karakter pertama menjadi huruf besar
            $hasil = ucfirst($hasil);
            break;
    }     
    return $hasil;
}

?>
