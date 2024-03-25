<html>
	<head>
		<link rel="stylesheet" href="<?php echo base_url();?>assets/report/tablereport_dedy.css">
		<link rel="stylesheet" href="<?php echo base_url();?>assets/report/fontreport.css">
	</head>

<style type="text/css">
.style18 {
	font-family: Verdana, Arial, Helvetica, sans-serif; 
	font-size: 11px; 
	font-weight: bold ;
	font-style : italic ;
}
.style17 {
	font-family: Verdana, Arial, Helvetica, sans-serif; 
	font-size: 10px; 
	font-weight: normal ;
}


.style19 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 11px; }
</style>

	<body>

	<?php
		$trxnya=$notransaksiin; 
		$pax="SELECT * from register_instalasi where notransaksi_IN='".$trxnya."' limit 1";
				 $qry=$this->db->query($pax);
				 foreach ($qry->result_array() as $row) {
					$tgldaftar = date('d-m-Y',strtotime($row["tanggal"]));	
					$tglselesai = date('d-m-Y',strtotime($row["tgl_selesai"]));			
					$dokterpengirim = $row["nama_dokter"];			
					$unitasal = $row["nama_unitR"];			
					$nama_pasien = $row["nama_pasien"];			
					$dokterpemeriksa = $row["nama_dokter_periksa"];	
					$no_rm = $row["no_rm"];	
					$analis = $row["nama_analis"];	
				 }
		?>

		<div class="namars"><?php echo ' '.getenv('V_NAMARS'); ?> </div>
		<div class="judul">HASIL PEMERIKSAAN LABORATORIUM</div><br>
		
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td width="13%"><span class="style19">No. Order </span></td>
			<td width="1%"><span class="style19">:</span></td>
			<td width="33%"><span class="style19"><?php echo $trxnya;?></span></td>
			<td width="18%"><span class="style19">Ruang Pengirim </span></td>
			<td width="1%"><span class="style19">:</span></td>
			<td width="34%"><span class="style19"><?php echo $unitasal;?></span></td>
		</tr><br>
		<tr>
			<td><span class="style19">Tanggal Daftar </span></td>
			<td><span class="style19">:</span></td>
			<td><span class="style19"><?php echo $tgldaftar;?></span></td>
			<td><span class="style19">Nama Pasien </span></td>
			<td><span class="style19">:</span></td>
			<td><span class="style19"><?php echo $nama_pasien;?></span></td>
		</tr>
		<tr>
			<td><span class="style19">Tanggal Selesai </span></td>
			<td><span class="style19">:</span></td>
			<td><span class="style19"><?php echo $tglselesai;?></span></td>
			<td><span class="style19">No. RM </span></td>
			<td><span class="style19">:</span></td>
			<td><span class="style19"><?php echo $no_rm;?></span></td>
		</tr>
		<tr>
			<td><span class="style19">Dokter Pengirim </span></td>
			<td><span class="style19">:</span></td>
			<td><span class="style19"><?php echo $dokterpengirim ;?></span></td>
			<td><span class="style19">Dokter Pathologi Klinik </span></td>
			<td><span class="style19">:</span></td>
			<td><span class="style19"><?php echo $dokterpemeriksa;?></span></td>
		</tr>
		<tr>
			<td><span class="style19">Analis </span></td>
			<td><span class="style19">:</span></td>
			<td><span class="style19"><?php echo $analis ;?></span></td>
			<td><span class="style19"></span></td>
			<td><span class="style19"></span></td>
			<td><span class="style19"></span></td>
		</table>
		
		<table class="minimalistBlack3">
			<thead>
				<tr>
					<!-- <th width="25%">JENIS</th> -->
					<th width="40%">ITEM</th>
					<th width="10%"><div align="center">RESULT</div></th>
					<th width="10%"><div align="center">SATUAN</div></th>
					<th width="10%"><div align="center">REFERENSI</div></th>
				</tr>
				<tr>
					<!-- <th width="25%">JENIS</th> -->
					<th width="40%"><hr></th>
					<th width="20%"><hr></th>
					<th width="20%"><hr></th>
					<th width="20%"><hr></th>
				</tr>
			</thead>
			<tbody>
			<?php 
				$i=0;
				// $phasil="SELECT mlab_jenis.nama_labjenis as nama_labjenis, mlab_item.nama_item as nama_item, plab_hasil_lis.hasil as hasil, plab_hasil_lis.id as id, mlab_item.referensi as referensi, mlab_item.unit as unit, plab_hasil_lis.notransaksi_in as notransaksi_in from plab_hasil_lis,mlab_item,mlab_jenis where plab_hasil_lis.kode_labitem = mlab_item.kode_labitem and plab_hasil_lis.kode_labjenis = mlab_jenis.kode_labjenis and plab_hasil_lis.notransaksi_IN='".$trxnya."' order by mlab_jenis.nama_labjenis";
				$phasil="SELECT plab_hasil_lis.hasil as hasil, plab_hasil_lis.id as id, plab_hasil_lis.pemeriksaan as pemeriksaan, plab_hasil_lis.notransaksi_in as notransaksi_in,  plab_hasil_lis.unittes as unittes,  plab_hasil_lis.nilainormal as nilainormal from plab_hasil_lis where  plab_hasil_lis.notransaksi_IN='".$trxnya."'";
				 $qry=$this->db->query($phasil);
				 $jenis='';
				 foreach ($qry->result_array() as $row) {
					//  if ($jenis == $row["nama_labjenis"]) {$jenis='';} else {$jenis=$row["nama_labjenis"];}
					// $jenis=$row["nama_labjenis"];
				?>
				<tr>
					<!-- <td><?php echo $jenis;?></td> -->
					<td><?php echo $row["pemeriksaan"];?></td>
					<td><div align="center"><?php echo $row["hasil"];?></div></td>
					<td><div align="center"><?php echo $row["unittes"];?></div></td>
					<td><div align="center"><?php echo $row["nilainormal"];?></div></td>
				</tr>
				<?php $i++;} ?>
			</tbody>
		</table>
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td height="20" valign="bottom"><span class="style18">Disclaimer : </span></td>
			</tr>
			<tr>
				<td>
				<div class="style17">Cetakan ini adalah untuk keperluan pengecekan pada data SIMRS, sebagai acuan yang valid adalah hasil Laboratorium yang ditandatangani oleh dokter.
				</div></td>
			</tr>
		</table>

	</body>
</html>
