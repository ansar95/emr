<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=rekapitulasikunjungan".namafiletgl().".xls");
?>
<html>
	<head>
		<link rel="stylesheet" href="<?php echo base_url();?>assets/report/tablereport.css">
		<link rel="stylesheet" href="<?php echo base_url();?>assets/report/fontreport.css">
	</head>
	<body>
		<b><?php echo ' '.getenv('V_NAMARS'); ?> </b><br>
		<b>LAPORAN REKAPITULASI KUNJUNGAN PASIEN</b><br>
		<b>Periode: </b><br>
		<b>INSTALASI LABORATORIUM</b>
		<hr>
		<table class="minimalistBlack">
			<thead>
				<tr>
					<th width="70%">GOLONGAN</th>
					<th width="30%">JUMLAH</th>
				</tr>
			</thead>
			<tbody>
				<?php if ($l == null) {?>
				<tr>
					<td colspan="9">Data Kosong</td>
				</tr>
				<?php } else {
					$i = 1;
					foreach($l as $row) {
				?>
				<tr>
					<td><?php echo $row["golongan"];?></td>
					<td><?php echo $row["data"];?></td>
				</tr>
				<?php $i++;}} ?>
			</tbody>
		</table>
		<br>
	</body>
</html>
