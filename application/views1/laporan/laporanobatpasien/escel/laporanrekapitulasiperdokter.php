<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=resepperdokter".namafiletgl().".xls");
?>
<html>
	<head>
		<link rel="stylesheet" href="<?php echo base_url();?>assets/report/tablereport.css">
		<link rel="stylesheet" href="<?php echo base_url();?>assets/report/fontreport.css">
	</head>
	<body>
		<b><?php echo ' '.getenv('V_NAMARS'); ?> </b><br>
		<b>APOTIK PELAYANAN</b></br>
		<b>REKAPITULASI RESEP PASIEN</b><br>
		<b>Periode: </b>
		<hr>
		<?php 
		foreach($l as $baris) {
		?>
		<b>DOKTER PEMERIKSA: <?php echo $baris["unit"]; ?></b>
		<table class="minimalistBlack">
			<thead>
				<tr>
					<th width="5%">NO.</th>
					<th width="12%">NO RM</th>
					<th width="20%">NAMA PASIEN</th>
					<th width="15%">NAMA OBAT</th>
					<th width="20%">QTY</th>
					<th width="15%">HARGA SATUAN</th>
					<th width="15%">TUSLAG</th>
					<th width="15%">JUMLAH</th>
					<th width="15%">NAMA DOKTER</th>
					<th width="13%">TANGGAL</th>
				</tr>
			</thead>
			<tbody>
				<?php if ($l == null) {?>
				<tr>
					<td colspan="9">Data Kosong</td>
				</tr>
				<?php } else {
					$i = 1;
					$s = 0;
					foreach($baris["data"] as $row) {
						$s += intval($row->jumlah);
				?>
				<tr>
					<td><?php echo $i;?></td>
					<td><?php echo $row->norm;?></td>
					<td><?php echo $row->pasien;?></td>
					<td><?php echo $row->obat;?></td>
					<td><?php echo $row->qty;?></td>
					<td><?php echo $row->hargapakai;?></td>
					<td><?php echo $row->tuslag;?></td>
					<td><?php echo $row->jumlah;?></td>
					<td><?php echo $row->dokter;?></td>
					<td><?php echo $row->tglresep;?></td>
				</tr>
				<?php $i++;}} ?>
				<tr>
					<td colspan="7"><b>Total per Unit Rujuka</b>n</td>
					<td colspan="3"><?php echo $s;?></td>
				</tr>
			</tbody>
		</table>
		<br>
		<?php
		}
		?>
	</body>
</html>
