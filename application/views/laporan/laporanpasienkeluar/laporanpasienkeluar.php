
<html>
<head>
<title>Laporan</title>
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
<body>
<table width="100%" border="0" cellspacing="1" cellpadding="2">
  <tr>
    <td colspan="9"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><span class="style4"><?php echo ' '.getenv('V_NAMARS'); ?>  </span></td>
      </tr>
      <tr>
        <td><span class="style5"><?php echo "LAPORAN PASIEN KELUAR "; ?></span></td>
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

        $i = 1;
       
        $filterunit="";
        if ($unit == "pilih") {
            $filterunit=" and register.kode_keluarpada='$unitpilih' ";
        }
        if ($bagian == 'IGD') {
            $textbagian='INSTALASI GAWAT DARURAT';
            $filterbagian=" and register.bagian = 'IGD' and (kode_keluarpada='IGDP' or kode_keluarpada='IGDD' or kode_keluarpada='IGDC' or kode_keluarpada='KMBCOV') ";   
        } elseif ( $bagian == 'INAP') {
            $textbagian=' RAWAT INAP';
            $filterbagian=" and register.bagian = 'INAP' and kode_keluarpada!='IGDP' and kode_keluarpada!='IGDD' and kode_keluarpada!='IGDC' and kode_keluarpada!='KMBCOV'";
        } elseif ( $bagian == 'JALAN') {
            $textbagian=' RAWAT JALAN';
            $filterbagian=" and register.bagian = 'JALAN' ";
        }

        $tgl1=date('Y-m-d', strtotime($tglmulai));
        $tgl2=date('Y-m-d', strtotime($tglakhir));

          $selectregister="SELECT register.notransaksi, register.bagian, register.tgl_masuk, register.tgl_keluar, register.no_rm as no_rm, pasien.nama_pasien as nama_pasien, pasien.sex as sex, pasien.alamat, pasien.tgl_lahir, pasien.tgl_daftar, register.golongan as golongan, register.kode_keluarpada, register.keluarpada, register.kondisi_keluar, pdiagnosa.nodaftar, pdiagnosa.diagnosa, pdiagnosa.icdlatin from register left join pasien on  register.no_rm=pasien.no_rm left join pdiagnosa on register.notransaksi=pdiagnosa.notransaksi where  register.tgl_keluar>='$tgl1' and register.tgl_keluar<='$tgl2' and register.pulang=1 ";

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

          $filterdiag="";
          if ($diag == "pilih") {
            $filterdiag=" and pdiagnosa.nodaftar='$diagpilih' ";
          }

          if ($urut == "tanggal") {
            $diorder=" order by register.tgl_keluar, register.jam_keluar ";
          } else {
            $diorder=" order by pdiagnosa.nodaftar, register.tgl_keluar, register.jam_keluar";
          }

          // $perintah=$selectregister.$filterbagian.$filtergol.$filteruser.$filterbarulama.$filterdiag.$diorder;
          $perintah=$selectregister.$filterbagian.$filtergol.$filteruser.$filterbarulama.$diorder;
          // echo $perintah;
          $isi = $this->db->query($perintah);
          if($isi->num_rows()>0) {
      ?>

            <tr>
              <!-- <td colspan="9"><span class="style5"><?php echo $baris['nama_unit'].' ('.trim($baris['kode_unit']).')'; ?></span></td> -->
              <!-- <td colspan="9"><span class="style5"><?php echo $baris['nama_unit']; ?></span></td> -->
            </tr>
            <tr>
            <td colspan="9"><table width="100%"  border="1" cellspacing="0" cellpadding="2">
            <tr>
              <td width="5%"><div align="center"><span class="style3">Tgl. Masuk </span></div></td>
              <td width="5%"><div align="center"><span class="style3">Tgl. Keluar </span></div></td>
              <td width="2%" class="style3"><div align="right">No.</div></td>
              <td width="4%" class="style3"><div align="center">No.RM</div></td>
              <td width="9%" class="style3"><div align="center">Nama Pasien </div></td>
              <td width="2%" class="style3"><div align="center">Umur </div></td>
              <td width="2%" class="style3"><div align="center">JK</div></td>
              <td class="style3">Alamat</td>
              <td width="3%" class="style3"><div align="center">Hari Rwt</div></td>
              <td width="5%" class="style3"><div align="center">Golongan</div></td>
              <td width="5%" class="style3"><div align="center">Jenis</div></td>
              <td width="10%" class="style3"><div align="center">Unit Keluar</div></td>
              <td width="3%" class="style3"><div align="center">ICD 10</div></td>
              <td width="13%" class="style3"><div align="center">Diagnosa</div></td>
              <td width="13%" class="style3"><div align="center">DPJP</div></td>
              <td width="5%" class="style3"><div align="center">Kondisi</div></td>
            </tr>
        <?php
          }
          foreach($isi->result_array() as $row) {
              //cari dpjp dulu
              $notransaksinya=$row['notransaksi'];
              $qryd = $this->db->query("SELECT kode_dokter,nama_dokter FROM register_detail WHERE notransaksi='$notransaksinya' and kamarkeluar=1 LIMIT 1 ");
              $kode_dokter='';
              $nama_dokter='';
              foreach ($qryd->result_array() as $brs9) {
                  $kode_dokter=$brs9['kode_dokter'];
                  $nama_dokter=$brs9['nama_dokter'];
              }

              $noicd=$row['nodaftar'];
              $namadiagnosa=$row['diagnosa'];
              if ($namadiagnosa == '') {
                $namadiagnosa=$row['icdlatin'];
              }

              if ($row['tgl_masuk'] == $row['tgl_daftar']) {
                $barulama='Baru';
              } else {
                $barulama='Lama';
              }

              //hari rawat
              $tgl1 = strtotime($row['tgl_masuk']); 
              $tgl2 = strtotime($row['tgl_keluar']); 
              $jarak = $tgl2 - $tgl1;
              $nhari = $jarak / 60 / 60 / 24;
      
              // $nhari=$tglk-$tglm;
              if ($nhari == 0) { $nhari = 1; }

				?>
              <tr>
                <td class="style3"><div align="center"><?php echo $row['tgl_masuk'];?></td>
                <td class="style3"><div align="center"><?php echo $row['tgl_keluar'];?></td>
                <td class="style3"><div align="right"><?php echo $i;?></td>
                <td class="style3"><div align="center"><?php echo $row['no_rm'];?></td>
                <td class="style3"><?php echo $row['nama_pasien'];?></td>
                <td class="style3"><div align="center"><?php echo hitungumurpelayanan($row['tgl_lahir'],$row['tgl_masuk']);?></td>
                <td class="style3"><div align="center"><?php echo substr($row['sex'],0,1);?></td>
                <td class="style3"><?php echo $row['alamat'];?></td>
                <td class="style3"><div align="center"><?php echo $nhari;?></td>
                <td class="style3"><?php echo $row['golongan'];?></td>
                <td class="style3"><?php echo $barulama;?></td>
                <td class="style3"><?php echo $row['keluarpada'];?></td>
                <td class="style3"><div align="center"><?php echo $noicd;?></td>
                <td class="style3"><div align="left"><?php echo $namadiagnosa;?></td>
                <td class="style3"><div align="left"><?php echo $nama_dokter;?></td>
                <td class="style3"><div align="center"><?php echo $row['kondisi_keluar'];?></td>
              </tr>
				
		  <?php
              if ($row['sex']=='L') {
                $jumlaki++;
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
		?>


    </table></td>
  </tr>
  
  <?php
		
		$jumperempuan= $jumpasien-$jumlaki;
		?>
  <tr>
  
    <td colspan="9"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="10%" class="style31"><strong>REKAPITULASI</strong></td>
        <td width="10%" class="style31"><div align="right">Laki Laki : </div></td>
        <td width="7%" class="style31"><?php echo  $jumlaki; ?></td>
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
