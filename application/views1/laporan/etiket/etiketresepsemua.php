<html>
	<head>
	<style type="text/css">
	.style1 {
		font-family: Arial, Helvetica, sans-serif;
		font-size: 11px;
		font-weight: bold;
	}

	.style2 {
		font-family: Arial, Helvetica, sans-serif;
		font-size: 11px;
		font-weight: bold;
	}

	.style21 {
		font-family: Arial, Helvetica, sans-serif;
		font-size: 12px;
		font-weight: bold;
	}

	@page{margin: 8px 30px}

</style>
	</head>
<body>
		<?php

		$qry1=$this->db->query("SELECT noresep from resep_detail where pagi='' and siang='' and malam='' and takaran='' and caramakan='' and keterangan='' and resep_detail.noresep = '$id' ");
		$nbar=$qry1->num_rows();

		$qry2=$this->db->query("SELECT pasien.nama_pasien as nama_pasien, resep_header.no_rm as no_rm, pasien.tgl_lahir as tgl_lahir, resep_header.tglresep, resep_detail.namaobat as namaobat, resep_detail.pagi as pagi, resep_detail.siang as siang, resep_detail.malam as malam, resep_detail.takaran as takaran, resep_detail.caramakan as caramakan, resep_detail.keterangan as keterangan FROM resep_detail,resep_header,pasien where resep_detail.noresep=resep_header.noresep and resep_header.no_rm=pasien.no_rm  and resep_detail.noresep = '$id' ");
		$jumbaris=$qry2->num_rows()-$nbar;
		$i=0;
		foreach ($qry2->result_array() as $brs2) {
			
					$nama_pasien=$brs2['nama_pasien'];
					$no_rm=$brs2['no_rm'];
					$xtgl_lahir=$brs2['tgl_lahir'];
					$tgl_lahir=substr($xtgl_lahir,8,2).'-'.substr($xtgl_lahir,5,2).'-'.substr($xtgl_lahir,0,4);
					$xtglresep=$brs2['tglresep'];
					$tglresep=substr($xtglresep,8,2).'-'.substr($xtglresep,5,2).'-'.substr($xtglresep,0,4);
					$namaobat=$brs2['namaobat'];
					if ($brs2['pagi'] <> "") { $pagi='Pagi : '.trim($brs2['pagi']).' '.trim($brs2['takaran']);} else { $pagi='';}
					if ($brs2['siang'] <> "") { $siang='Siang : '.trim($brs2['siang']).' '.trim($brs2['takaran']);} else { $siang='';}
					if ($brs2['malam'] <> "") { $malam='Malam : '.trim($brs2['malam']).' '.trim($brs2['takaran']);} else { $malam='';}
					// if ($brs2['keterangan'] <> "" ) {$footer=trim($brs2['keterangan']).' '.trim($brs2['caramakan']).' Makan';} else { $footer=''; }
					if (trim($brs2['caramakan']) <> "") { $caramakannya=trim($brs2['caramakan']).' Makan';} else {$caramakannya="";}
					// if ($brs2['keterangan'] <> "" ) {$footer=trim($brs2['keterangan']).' '.$caramakannya;} else { $footer=$caramakannya; }
					$footer=trim($brs2['keterangan']).' '.$caramakannya;

					$cek=trim($brs2['pagi']).trim($brs2['siang']).trim($brs2['malam']).trim($brs2['caramakan']).trim($brs2['takaran']).trim($brs2['keterangan']);
		    if (trim($cek <>"")) {     
				$i++;
		?>
		        
				<table width="180" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td width="180"><div align="center"><span class="style2">INSTALASI FARMASI</span> </div></td>
				</tr>
				<tr>
					<td class="style2"><div align="center">   <?php echo ' '.getenv('V_NAMARS'); ?>    </div></td>
				</tr>
				</table>
				<hr>
				<table width="180" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td width="50" class="style1">Nama</td>
					<td width="130" class="style1">: <?php echo $nama_pasien;?></td>
				</tr>
				<tr>
					<td class="style1">No.RM</td>
					<td class="style1">: <?php echo $no_rm;?></td>
				</tr>
				<tr>
					<td class="style1">Tgl. Lahir </td>
					<td class="style1">: <?php echo $tgl_lahir;?></td>
				</tr>
				<tr>
					<td class="style1">Tgl. Resep </td>
					<td class="style1">: <?php echo $tglresep;?></td>
				</tr>
				<tr>
					<td colspan="2" class="style21"><div align="center"><?php echo strtoupper($namaobat);?></div></td>
				</tr>
				<tr>
					<td colspan="2" class="style1"><div align="center"><?php echo $pagi;?></div></td>
				</tr>
				<tr>
					<td colspan="2" class="style1"><div align="center"><?php echo $siang;?></div></td>
				</tr>
				<tr>
					<td colspan="2" class="style1"><div align="center"><?php echo $malam;?></div></td>
				</tr>
				<tr>
					<!-- <td colspan="2" class="style2"><div align="center"><?php echo $footer.' '.$jumbaris.' '.$i.' '.$nbar;?></div></td> -->
					<td colspan="2" class="style2"><div align="center"><?php echo $footer;?></div></td>
				</tr>
				</table>
				<?php if ($i < $jumbaris) {  ?>
				<div style="page-break-before:always;">
				
        <?php } }
	    } ?>
</body>
</html>
