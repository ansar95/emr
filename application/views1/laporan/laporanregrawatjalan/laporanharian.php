
<html>
<head>
<title>Lap.Reg.RJ</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">

.style3 {font-family: Arial, Helvetica, sans-serif; font-size: 9px; }
.style31 {font-family: Arial, Helvetica, sans-serif; font-size: 11px; }
.style32 {font-family: Arial, Helvetica, sans-serif; font-size: 11px;font-weight: bold; }
.style4 {
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
	font-size: 14px;
}
.style5 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-weight: bold;
}

</style>
</head>
<?php
if ($bagian == 'IGD') {
    $textbagian='INSTALASI GAWAT DARURAT';
    $filter_aloket=" and register_detail.kode_unitR='ALOKET' ";
    $filterbagian=" and register.bagian = 'IGD' ";
    $filterunit="";
    if ($unit == "pilih") {
        $filterunit=" and munit.kode_unit='$unitpilih' ";
    }
    $selectunit="SELECT kode_unit,nama_unit from munit where igd=1 and hapus=0".$filterunit." order by nama_unit";
} elseif ( $bagian == 'JALAN') {
    $textbagian=' RAWAT JALAN';
    $filter_aloket=" and register_detail.kode_unitR='ALOKET' ";
    $filterbagian=" and register.bagian = 'JALAN' ";
    $filterunit="";
    if ($unit == "pilih") {
        $filterunit=" and munit.kode_unit='$unitpilih' ";
    }
    $selectunit="SELECT kode_unit,nama_unit from munit where jalan=1 and instalasi=0 and hapus=0".$filterunit." order by nama_unit";
} elseif ( $bagian == 'INAP') {

    $textbagian=' RAWAT INAP';
    //jika semua igd dan rinap masuk
    $filter_aloket="";
    $filterbagian=" and (register.bagian = 'INAP' or (register.bagian = 'IGD' and (register_detail.kode_unitR='IGDD' or register_detail.kode_unitR='IGDP' or register_detail.kode_unitR='IGDC' or register_detail.kode_unitR='KMBCOV')))";
    $filterunit="";
    if ($unit == "pilih") {
        $filterunit=" and munit.kode_unit='$unitpilih' ";
    }
    $selectunit="SELECT kode_unit,nama_unit from munit where (inap=1 or igd=1) and hapus=0".$filterunit." order by nama_unit";
}

$tgl1=date('Y-m-d', strtotime($tglmulai));
$tgl2=date('Y-m-d', strtotime($tglakhir));

?>

<body>
<table width="100%" border="0" cellspacing="1" cellpadding="2">
  <tr>
    <td colspan="9"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><span class="style4"><?php echo ' '.getenv('V_NAMARS'); ?>  </span></td>
      </tr>
      <tr>
        <td><span class="style5"><?php echo "LAPORAN REGISTER PASIEN ".$textbagian; ?></span></td>
      </tr>
      <tr>
        <td><span class="style5"><?php echo "Periode : ".$tglmulai.' s/d '.$tglakhir; ?></span></td>
      </tr>
    </table></td>
  </tr>
  <?php 		
					  $jumlaki=0;
					  $jumpasien=0;
					  $jumbaru=0;
            $umum=0;
            $jamkesda=0;
            $inhealt=0;
            $bpjs=0;
            $jasaraharja=0;
            $lainlain=0;
            $l = $this->db->query($selectunit);

		foreach($l->result_array() as $baris) {
		?>
      

    <?php 
        $i = 1; 
        if ($l == null) {?>
				<tr>
					<td colspan="7">Data Tidak ada</td>
				</tr>
				<?php } else {
       
          $kode_unitnya=$baris['kode_unit'];
          $selectregister="SELECT register.bagian, register.user1 as user, register.bagian, register.kode_keluarpada, register.bagian, register.tgl_masuk as tgl, register.no_rm, pasien.nama_pasien as nama_pasien, pasien.sex as sex, pasien.alamat, register.golongan as golongan, register.barulama as barulama, register.notransaksi, register_detail.nama_unit, register_detail.kode_unit, register_detail.nama_unit, pasien.tgl_daftar, register_detail.nama_unitR as nama_unitR from register_detail, register, pasien where register_detail.notransaksi=register.notransaksi and register_detail.no_rm=pasien.no_rm and register.tgl_masuk>='$tgl1' and register.tgl_masuk<='$tgl2' and register_detail.kode_unit='$kode_unitnya' and register_detail.pindah = 0";


          $filtergol="";
          if ($golongan == "pilih") {
            $filtergol=" and register.golongan='$golpilih' ";
          }

          $filteruser="";
          if ($user == "pilih") {
            $filteruser=" and register.user1='$userpilih' ";
          }

          $filterbarulama="";
          if ($kunjungan == "0") {
            $filterbarulama=" and register.tgl_masuk != pasien.tgl_daftar ";
          } elseif ($kunjungan == "1") {
            $filterbarulama=" and register.tgl_masuk = pasien.tgl_daftar ";
          } else {
            $filterbarulama="";
          }
          
          $diorder=" order by register.tgl_masuk, register.jam_masuk ";
          $perintah=$selectregister.$filterbagian.$filter_aloket.$filtergol.$filteruser.$filterbarulama.$diorder;
          // echo $perintah;
          $isi = $this->db->query($perintah);
          if($isi->num_rows()>0) {
      ?>

            <tr>
              <td colspan="9"><span class="style5"><?php echo $baris['nama_unit']; ?></span></td>
            </tr>
            <tr>
            <td colspan="9"><table width="100%"  border="1" cellspacing="0" cellpadding="2">
            <tr>
              <td width="7%"><div align="center"><span class="style3">Tgl. Kunjungan </span></div></td>
              <td width="3%" class="style3"><div align="right">No.</div></td>
              <td width="5%" class="style3"><div align="center">No.RM</div></td>
              <td width="18%" class="style3"><div align="center">Nama Pasien </div></td>
              <td width="2%" class="style3"><div align="center">JK</div></td>
              <td class="style3">Alamat</td>
              <td width="6%" class="style3"><div align="center">Golongan</div></td>
              <td width="5%" class="style3"><div align="center">Kunjungan</div></td>
              <td width="7%" class="style3"><div align="center">Trx</div></td>
              <td width="5%" class="style3"><div align="center">Unit Keluar</div></td>
              <td width="7%" class="style3"><div align="center">SO / Bagian</div></td>
              <td width="3%" class="style3"><div align="center">Petugas</div></td>
            </tr>
        <?php
          }
          foreach($isi->result_array() as $row) {
              //cari diagnosa dulu
              $notransaksinya=$row['notransaksi'];
              $qryd = $this->db->query("SELECT nodaftar,diagnosa,icdlatin FROM pdiagnosa WHERE notransaksi='$notransaksinya' and type=1 LIMIT 1 ");
              $noicd='';
              $namadiagnosa='';
              foreach ($qryd->result_array() as $brs9) {
                  $noicd=$brs9['nodaftar'];
                  $namadiagnosa=$brs9['diagnosa'];
                  if ($namadiagnosa == '') {
                    $namadiagnosa=$brs9['icdlatin'];
                  }
              }
				?>
              <tr>
                <td class="style3"><div align="center"><?php echo $row['tgl'];?></td>
                <td class="style3"><div align="right"><?php echo $i;?></td>
                <td class="style3"><div align="center"><?php echo $row['no_rm'];?></td>
                <td class="style3"><?php echo $row['nama_pasien'];?></td>
                <td class="style3"><div align="center"><?php echo substr($row['sex'],0,1);?></td>
                <td class="style3"><?php echo $row['alamat'];?></td>
                <!-- <td class="style3"><div align="center"><?php echo $noicd;?></td> -->
                <!-- <td class="style3"><div align="left"><?php echo $namadiagnosa;?></td> -->
                <td class="style3"><?php echo $row['golongan'];?></td>
                <?php if ($row['tgl']==$row['tgl_daftar']){$cbl='Baru';} else {$cbl='Lama';} ?>
                <td class="style3"><div align="center"><?php echo $cbl;?></td>
                <td class="style3"><div align="center"><?php echo $row['notransaksi'];?></td>
                <td class="style3"><div align="center"><?php echo $row['kode_keluarpada'];?></td>
                <td class="style3"><div align="left"><?php echo $row['bagian'];?></td>
                <td class="style3"><div align="center"><?php echo $row['user'];?></td>
              </tr>
				
		  <?php
              if ($row['sex']=='L') {
                $jumlaki++;
              }

              if ($row['tgl'] == $row['tgl_daftar']) {
                  $jumbaru++;
              }

              $jumpasien++;
              $i++;

              if( $row['golongan'] == 'UMUM') {
                $umum++;
              } elseif($row['golongan'] == 'JAMKESDA') {
                $jamkesda++;
              } elseif($row['golongan'] == 'INHEALT' || $row['golongan'] == 'IOM') {
                $inhealt++;
              } elseif($row['golongan'] == 'BPJS') {
                $bpjs++;
              } elseif($row['golongan'] == 'JS.RAHARJA') {
                $jasaraharja++;
              } else {  
                $lainlain++;
              }
        }
      }  
		?>


    </table></td>
  </tr>
  
  <?php
		}
		$jumperempuan= $jumpasien-$jumlaki;
		$jumlama=$jumpasien-$jumbaru;
		?>
  <tr>
  
    <td colspan="9"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="10%" class="style31"><strong>REKAPITULASI</strong></td>
        <td width="10%" class="style31"><div align="right">Laki Laki : </div></td>
        <td width="7%" class="style31"><?php echo  $jumlaki; ?></td>
        <td width="10%" class="style31"><div align="right">Pasien Baru :</div></td>
        <td width="7%" class="style31"><?php echo $jumbaru; ?></td>
        <td width="10%" class="style31"><div align="right">BPJS :</div></td>
        <td width="7%" class="style31"><?php echo $bpjs; ?></td>
        <td width="10%" class="style31"><div align="right">UMUM :</div></td>
        <td width="7%" class="style31"><?php echo $umum; ?></td>
        <td width="10%" class="style31"><div align="right">JAMKESDA :</div></td>
        <td width="7%" class="style31"><?php echo $jamkesda; ?></td>
        <td >&nbsp;</td>
      </tr>
      <tr>
        <td class="style31">&nbsp;</td>
        <td class="style31"><div align="right">Perempuan : </div></td>
        <td class="style31"><?php echo $jumperempuan; ?></td>
        <td class="style31"><div align="right">Pasien Lama :</div></td>
        <td class="style31"><?php echo $jumlama; ?></td>
        <td class="style31"><div align="right">IOM/INHEALT :</div></td>
        <td class="style31"><?php echo $inhealt; ?></td>
        <td class="style31"><div align="right">JS.Raharja :</div></td>
        <td class="style31"><?php echo $jasaraharja; ?></td>
        <td class="style31"><div align="right">Lainnya :</div></td>
        <td class="style31"><?php echo $lainlain; ?></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td class="style32">&nbsp;</td>
        <td class="style32"><div align="right">Jumlah Pasien : </div></td>
        <td class="style32"><?php echo $jumpasien; ?></td>
        <td>&nbsp;</td>
      </tr>
    </table></td>
  </tr>

</table>
<table width="100%"  border="0" cellspacing="1" cellpadding="1">
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
