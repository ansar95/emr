
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

.style53 {	font-family: Arial, Helvetica, sans-serif;
	font-size: 16px;
	font-weight: bold; }

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
                   if ($brs2['bagian']=='IGD') {
                    if ($brs2['kode_keluarpada']=='IGDD' or $brs2['kode_keluarpada']=='IGDP') {
                      $xjenispelayanan='IGD';
                    } else { 
                      $xjenispelayanan='RAWAT INAP';
                    }
                  } elseif ($brs2['bagian']=='INAP') {
                      $xjenispelayanan='RAWAT INAP'; 
                  } else {$xjenispelayanan='RAWAT JALAN';} 
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


  if ($xasuransi == 'JS.RAHARJA') {
    $xasuransi='JASA RAHARJA';
  }
  
  $nonas=0;

 ?>
 <table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
      <td width="4%"><img src="data:image/jpeg;base64,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uoXT/qFcdNNS7K6gu1Ae/HIwl1PW05JEdTTyEDxIn7HY7AghzXBrmuaOCrIj6rulDTzqv0+fimWRNoL3QB8thv0MQdUW2oIG/G48SF+zRJESA4AEFr2se2C2tWiuoXT/AKhXHTTUuyuoLtQHvxyMJdT1tOSRHU08hA8SJ+x2OwIIc1wa5rmibMdJdcFREWNEREBc9yTXfV7L9NMf0eyXPbpX4fi8jpLXapXjw4SeGhxA70gYN2xh5cI2uc1ndBIXAkQEREBERARF6A6Pej3O+rTO/em0iW1YnapGOv8Af3Rd6OljPIiiB4kneAe6z2ek7YDkHR70e551aZ3702kS2rE7XIx1+v74u9HSxnkRRA8STvG/dZ7PSds0c3i0p0owTRPBLZpxpxYorVZLXH3Y428yTSH05pX+ckryN3OPn9AAAaU6UYJongls0404sUVqslrj7scbeZJpD6c0r/OSV5G7nHz+gAAcuVSIt0REWpEREBERAREQEREBERAREQEREBERAREQEREBERAXSXVd0oaedV+nz8UyyNtBeqAPlsN+hiDqi21DgN+Nx4kL9miSIkBwAILXtY9vdqIS4xqdatFdQtANQrjppqXZXUF2oD345GEup62nJIjqaeQgeJE/Y7HYEEOa4Nc1zRwVZEfVf0oae9WGnr8TyuMUF7oA+aw36GIPqLbUEDfjceJC/ZokiJAcACC17WPbBbWrRXULQDUK46aal2V1BdqA9+ORhLqetpySI6mnk2HiRP2Ox2BBDmuDXNc0TjpLrgqIixoiIgIiICIvQHR90e551aZ2LTaRLasTtcjHX6/vi3jpYzyIogeJJ3jfus9npO2aOQdH3R7nnVpnfvTaRLasTtUjHX6/vi3jpYzyIogeJJ3jfus9npO2aObx6U6U4Jongls0404sUVqslqj7scbeZJpDt35pX+ckryN3OPn9AAA+aU6UYHongls0403sUVqslrZ3Y428yTSHbvzSv85JXkbucfP6AABy5VIi3RERakREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQF0l1X9KGnvVhp6/FMrjbQXugD5bDfoog6ottQ4DfjceJC/ZokiJAcACC17WPb3aiEuManWrRXULp/1CuOmmpdldQXagPfjkYS6nrackiOpp5CB4kT9jsdgQQ5rg1zXNHBVkR9V/Shp71YaevxTK420F7oA+Ww36KIOqLbUOA343HiQv2aJIiQHAAgte1j2wW1p0W1C0A1CuOmmpdldQXagPfjkbu6nrackiOpp5CB4kT9jsdgQQ5rg1zXNE2Y6S64KiIsaIi9AdH3R7nnVpnfvTaBLasUtUjHX6/vi70dLGeRFEDxJO8A91ns9J2zRyHzo+6Ps76tM8FotIltWKWt7H3+/ui70dLGeRFHvxJO8b91ns9J2zQrx6UaUYHongls0403sUVqslrj7scbeZJpDt35pX+ckryN3OPn5cAABpRpRgmieCWzTjTixRWqyWqPuxxt5kmkPpzSv85JXkbucfP6AABy5VIi3RERakREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERAXSXVf0oae9WGnr8UyuNtvvdAHzWG/wwh9Rbaggb8bjxIX7NEkRIDgAQWvax7e7UQ8Y1OtOiuoWgGoVx001LsrqC7UB78cjCXU9bTkkR1NPJsPEifsdjsCCHNcGua5o4KsiPqv6UNPerDT1+KZXG2gvdAHy2G/RRB1RbahwG/G48SF+zRJESA4AEFr2se2S2k/Zp6/Zpr5cNH81sk+N2jHJWSXrI/CMlG+kcT4b6N5AFQ6UA9xvBbs7xAwsc0TjpLrgvR90e551aZ2LTaBLasUtcjHX6/vi70dLGeRFEDxJO8eiz2ek7ZoV4tKNKMD0TwS2acab2KK1WS1s7scbeZJpD6c0r/OSV5G7nHz8uAAA0o0owPRPBLZpxpvYorVZLWzuxxt5kmkPpzSv85JXkbucfPy4AAHLlsibdERFqRERAREQEREBERAREQEREBERAREQf//Z" alt="ss" width="50" height="50" /></td>
      <td width="40%"><span class="style53"><?php echo ' '.getenv('V_NAMARS'); ?></span></td>
  </tr>
</table>
<br>
<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
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

if ($xjenispelayanan=='RAWAT INAP') {
?>
  <table width="100%" border="0" cellspacing="0" cellpadding="1">
    <tr>
      <td width="555%" height="15" colspan="7" valign="bottom"><div align="left"><span class="style3">AKOMODASI KAMAR </span></div></td>
    </tr>
  </table>
  <div class="garispinggir">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="49%" height="10" valign="middle"><div align="left"><span class="style21">Unit</span></div></td>
        <td width="28%" height="10" valign="middle"><div align="left"><span class="style21">Tanggal</span></div></td>
        <td width="10%" height="10" valign="middle"><div align="right"><span class="style21">Harga/Hari </span></div></td>
        <td width="7%" height="10" valign="middle"><div align="right"><span class="style21">Hari</span></div></td>
        <td width="12%" height="10" valign="middle"><div align="right"><span class="style21">Jumlah Harga </span></div></td>
      </tr>
    </table>
  </div>
<?php } ?> 
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
            $xnama_kelas=$brs1['nama_kelas'];
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
              <td width="49%"><span class="style2"><?php echo $xnama_kelas.' - '.$xnama_kamar?></span></td>
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
          if ($xjenispelayanan=='RAWAT INAP') {
        ?>       
          <div class="garispinggir">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="88%" colspan="2" valign="middle"  height="10"><div align="right"><span class="style15">sub total</span></div></td>
                <td width="12%"><div align="right"><span class="style3"><?php echo groupangka($xjumharga);?></span></div></td>
              </tr>
            </table>
          </div>    
        <?php } ?>
     <!-- -------------------akhir dari if umum untuk cetakan kamar perawatan -->    
<!-- -------------------visite -->
<?php
$qry3=$this->db->query("select * from t_visite where notransaksi='$xnotransaksi'  ");
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

                    // $qry31=$this->db->query("SELECT * FROM mkelas WHERE kode_kelas = '$zkode_kelas' LIMIT 1");
                    // foreach ($qry31->result_array() as $brs31) {
                    //     //$xnama_kamar=$brs31['nama_kamar'];
                    //     $xvis=$brs31['vis'];
                    //     $xkds=$brs31['kds'];
                    //     $xkdu=$brs31['kdu'];
                    //     $xkdc=$brs31['kdc'];
                    //     $xkdss=$brs31['kdss'];
                    //     $xkdi=$brs31['kdi'];
                    // }

                    if ($zkode_unit == 'IGDD' or $zkode_unit == 'IGDP') {
                      $qry31=$this->db->query("SELECT * FROM mkelas WHERE kode_kelas = 'IGD1' LIMIT 1");
                      foreach ($qry31->result_array() as $brs31) {
                          //$xnama_kamar=$brs31['nama_kamar'];
                          $xvis=$brs31['vis'];
                          $xkds=$brs31['kds'];
                          $xkdu=$brs31['kdu'];
                          $xkdc=$brs31['kdc'];
                          $xkdss=$brs31['kdss'];
                          $xkdi=$brs31['kdi'];
                      }
                    } else {
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
<?php
if ($xjenispelayanan !='RAWAT JALAN') {
  $file="ptindakanperawat"; 
} else {
  $file="ptindakan"; 
}
?>
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
            $qry4=$this->db->query("select nama_unit as nama_unit, sum(jasas*qty) as qtyjasas, sum(jasas*qty*diskon/100) as diskon from ".$file." where notransaksi='$xnotransaksi' group by kode_unit order by kode_unit");
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
$qry19=$this->db->query("SELECT no_transaksi_secondary FROM register_detail where notransaksi='$xnotransaksi'");
foreach ($qry19->result_array() as $brs19) {
  $xno_transaksi_secondary=$brs19['no_transaksi_secondary'];
}
    $qry7=$this->db->query("select * from ptindakan_instalasi where (notransaksi='$xnotransaksi' or notransaksi='$xno_transaksi_secondary') and kode_unit='$kode_unit_inst'  order by tanggal");
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
       
        $qry7=$this->db->query("select * from ptindakan_instalasi where (notransaksi='$xnotransaksi' or notransaksi='$xno_transaksi_secondary') and kode_unit='$kode_unit_inst'    order by tanggal");
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
<!-- radiologi --> 
<!-- cari kode unit radiologi di munit -->
<?php
$qry=$this->db->query("select kode_unit from munit where rad=1 and hapus=0 limit 1");
foreach ($qry->result_array() as $brs) {
  $kode_unit_inst=$brs['kode_unit'];
}


$qry7=$this->db->query("select * from ptindakan_instalasi where (notransaksi='$xnotransaksi' or notransaksi='$xno_transaksi_secondary') and kode_unit='$kode_unit_inst'    order by tanggal");
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
        $qry7=$this->db->query("select * from ptindakan_instalasi where (notransaksi='$xnotransaksi' or notransaksi='$xno_transaksi_secondary') and kode_unit='$kode_unit_inst'   order by tanggal");
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
          
          $qry7=$this->db->query("select * from ptindakan where notransaksi='$zno_transaksi_secondary'  and kode_unit='$kode_unit_inst' order by tanggal");
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

          $qry7=$this->db->query("select nama_unit as nama_unitnya, sum(jasas*qty) as jasasnya, sum(jasas*qty*diskon/100) as diskonnya from ptindakan where notransaksi='$zno_transaksi_secondary'  and kode_unit='$zkode_unit'  group by kode_unit order by kode_unit ");
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

$qry4=$this->db->query("select * from po2 where notransaksi='$xnotransaksi' order by tgl_pakai,id");
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
            $qry4=$this->db->query("select nama_unit as nama_unitnya, sum(qty) as qtynya, diskon as diskonnya from po2 where notransaksi='$xnotransaksi'  group by kode_unit order by kode_unit ");
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
 $qry4=$this->db->query("select * from pdarah where notransaksi='$xnotransaksi'  order by tanggal,id");
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
            $qry4=$this->db->query("select nama_unit as nama_unitnya, sum(qty) as qtynya, diskon as diskonnya from pdarah where notransaksi='$xnotransaksi'  group by kode_unit order by kode_unit");
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
$qry7=$this->db->query("select * from ptindakanopr where notransaksi='$xnotransaksi'  order by tgl_periksa");
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
        $qry7=$this->db->query("select * from ptindakanopr where notransaksi='$xnotransaksi'  order by tgl_periksa");
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
$qry7=$this->db->query("select * from ptindakanlahir where notransaksi='$xnotransaksi'  order by tanggal");
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
        $qry7=$this->db->query("select * from ptindakanlahir where notransaksi='$xnotransaksi'  order by tanggal");
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


<!-- ===========penutup if umum=============== -->
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
