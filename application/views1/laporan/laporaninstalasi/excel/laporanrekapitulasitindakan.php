<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=rekapitulasitindakan".namafiletgl().".xls");
?>
<html>
	<head>
		<link rel="stylesheet" href="<?php echo base_url();?>assets/report/tablereport.css">
		<link rel="stylesheet" href="<?php echo base_url();?>assets/report/fontreport.css">
	</head>
	<body>
		<b><?php echo ' '.getenv('V_NAMARS'); ?> </b><br>
		<b>LAPORAN TINDAKAN INSTLASI</b><br>
		<b>Periode: </b><br>
		<b>INSTALASI LABORATORIUM</b>
		<hr>
		<?php 
		foreach($l as $baris) {
		?>
		<table class="minimalistBlack">
			<thead>
				<tr>
					<th width="40%">TINDAKAN</th>
					<th width="40%">GOLONGAN</th>
					<th width="10%">JUMLAH</th>
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
						$s += intval($row->qty);
				?>
				<tr>
					<td><?php echo $row->tindakan;?></td>
					<td><?php echo $row->golongan;?></td>
					<td><?php echo $row->qty;?></td>
				</tr>
				<?php $i++;}} ?>
				<tr>
					<td></td>
					<td><b>Jumlah per Tindakan</b></td>
					<td><?php echo $s;?></td>
				</tr>
			</tbody>
		</table>
		<br>
		<?php
		}
		?>
	</body>
</html>
