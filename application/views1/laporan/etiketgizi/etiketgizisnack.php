<html>
<head>
	<style type="text/css">
	.style1 {
		font-family: Arial, Helvetica, sans-serif;
		font-size: 9px;
		font-weight: bold;
	}

	.style2 {
		font-family: Arial, Helvetica, sans-serif;
		font-size: 9px;
		font-weight: bold;
	}

	.style3 {
		font-family: Arial, Helvetica, sans-serif;
		font-size: 11px;
		font-weight: bold;
	}

	.style21 {
		font-family: Arial, Helvetica, sans-serif;
		font-size: 9px;
		font-weight: bold;
	}

	@page{margin: 8px 9px}

.style22 {font-size: 14px}
    </style>
</head>
<body>
		<?php
		// $qry2=$this->db->query("SELECT pgizi.no_rm as no_rm, pgizi.pagi as pagi, pgizi.siang as siang, pgizi.malam as malam, pgizi.bentuk as bentuk, pasien.nama_pasien as nama_pasien, pasien.tgl_lahir as tgl_lahir, mkamar.nama_kamar as nama_kamar, mkamar.nama_kelas as nama_kelas FROM pgizi,pasien,mkamar where pgizi.no_rm=pasien.no_rm  and pgizi.kode_kamar=mkamar.kode_kamar and pgizi.id = '$id' LIMIT 1");

		$qry2=$this->db->query("SELECT pgizi.no_rm as no_rm, pgizi.pagi as pagi, pgizi.siang as siang, pgizi.malam as malam, pgizi.bentuk as bentuk, pasien.nama_pasien as nama_pasien, pasien.tgl_lahir as tgl_lahir, mkamar.nama_kamar as nama_kamar, mkamar.nama_kelas as nama_kelas, munit.nama_unit as nama_unit FROM pgizi left join pasien on pgizi.no_rm=pasien.no_rm  left join mkamar on pgizi.kode_kamar=mkamar.kode_kamar left join munit on pgizi.kode_unit=munit.kode_unit where pgizi.id = '$id' LIMIT 1 ");


		if($qry2->num_rows() > 0) {

		foreach ($qry2->result_array() as $brs2) {
					$nama_pasien=$brs2['nama_pasien'];
					$no_rm=$brs2['no_rm'];
					$xtgl_lahir=$brs2['tgl_lahir'];
					$tgl_lahir=substr($xtgl_lahir,8,2).'-'.substr($xtgl_lahir,5,2).'-'.substr($xtgl_lahir,0,4);
					if ($waktu=='PAGI') { $diet= $brs2['pagi'];}
					if ($waktu=='SIANG') { $diet= $brs2['siang'];}
					if ($waktu=='MALAM') { $diet= $brs2['malam'];}
					$bentukmakanan=$brs2['bentuk'];
					// $ruangan=$brs2['nama_kamar'];
					// $kelas=$brs2['nama_kelas'];
					if (is_null($brs2['nama_kamar'])) {
						$ruangan=$brs2['nama_unit'];
						$kelas="";
					} else {
						$ruangan=$brs2['nama_kamar'];
						$kelas=$brs2['nama_kelas'];
					}	
		
				}
		          
		?>
		
		<table width="180" border="0" cellspacing="0" cellpadding="0">
		  <tr>
			  <td width="180"><div align="center"><span class="style3">INSTALASI GIZI  </span></div></td>
		  </tr>
	    </table>

        <table width="180" border="0" cellspacing="1" cellpadding="0">
          <tr>
            <td width="55" class="style1">Nama</td>
            <td width="2" class="style1">:</td>
            <td width="123" class="style1"><?php echo $nama_pasien;?></td>
          </tr>
          
          <tr>
            <td class="style1">No.RM</td>
            <td class="style1">:</td>
            <td class="style1"><?php echo $no_rm;?></td>
          </tr>
          <tr>
            <td class="style1">Tgl. Lahir </td>
            <td class="style1">:</td>
            <td class="style1"><span class="style2"><?php echo $tgl_lahir;?></span></td>
          </tr>
          <tr>
            <td class="style1">Ruangan</td>
            <td class="style1">:</td>
            <td class="style1"><span class="style2"><?php echo $ruangan;?></span></td>
          </tr>
          <tr>
            <td class="style1">Kelas</td>
            <td class="style1">:</td>
            <td class="style1"><?php echo $kelas;?></td>
          </tr>
		  <tr>
            <td colspan="3" class="style1"><div align="center" class="style22">SNACK</div></td>
          </tr>
		</table>

		<table width="180" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td colspan="2" class="style21"><div align="center">SEMOGA LEKAS SEMBUH</div></td>
          </tr>
		</table>

        <?php 
			}
        ?>
</body>
</html>

