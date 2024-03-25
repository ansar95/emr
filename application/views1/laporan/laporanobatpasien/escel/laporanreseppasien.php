<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=reseppasienr".namafiletgl().".xls");
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
		<b>DOKTER PEMERIKSA: <?php echo $baris["dokter"]; ?></b>
		<table class="minimalistBlack">
			<thead>
				<tr>
					<th width="5%">NO.</th>
					<th width="15%">KODE</th>
					<th width="15%">NAMA OBAT</th>
					<th width="20%">QTY</th>
					
				</tr>
			</thead>
			<tbody>
				<?php if ($l == null) {?>
				<tr>
					<td colspan="8">Data Kosong</td>
				</tr>
				<?php } else {
					$i = 1;
					foreach($baris["data"] as $row) {
				?>
				<tr>
					<td><?php echo $i;?></td>
					<td><?php echo $row->kodeobat;?></td>
					<td><?php echo $row->obat;?></td>
					<td><?php echo $row->qty;?></td>
				</tr>
				<?php $i++;}} ?>
			</tbody>
		</table>
		<br>
		<?php
		}
		?>
	</body>
</html>
