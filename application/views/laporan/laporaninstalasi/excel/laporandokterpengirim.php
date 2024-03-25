<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=dokterpengirim".namafiletgl().".xls");
?>
<html>
	<head>
		<link rel="stylesheet" href="<?php echo base_url();?>assets/report/tablereport.css">
		<link rel="stylesheet" href="<?php echo base_url();?>assets/report/fontreport.css">
		<!-- <link href="https://fonts.googleapis.com/css?family=Shadows+Into+Light" rel="stylesheet"> -->
		<!-- <link href="https://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700" rel="stylesheet"> -->
	</head>
	<body>
		<b><?php echo ' '.getenv('V_NAMARS'); ?> </b><br>
		<b>LAPORAN TINDAKAN INSTALASI</b><br>
		<b>Periode: </b><br>
		<b>INSTALASI LABORATORIUM</b>
		<hr>
		<?php 
		foreach($l as $baris) {
		?>
		<b>DOKTER PENGIRIM: <?php echo $baris["kirim"]; ?></b>
		<table class="minimalistBlack">
			<thead>
				<tr>
					<th width="13%">TANGGAL</th>
					<th width="5%">NO.</th>
					<th width="12%">NO RM</th>
					<th width="20%">NAMA PASIEN</th>
					<th width="15%">GOLONGAN</th>
					<th width="20%">TINDAKAN</th>
					<th width="15%">JUMLAH</th>
					<th width="15%">DOKTER PEMERIKSA</th>
					<th width="15%">UNIT</th>
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
						$s += intval($row->qty * $row->jasas);
				?>
				<tr>
					<td><?php echo $row->tgl;?></td>
					<td><?php echo $i;?></td>
					<td><?php echo $row->no_rm;?></td>
					<td><?php echo $row->pasien;?></td>
					<td><?php echo $row->golongan;?></td>
					<td><?php echo $row->tindakan;?></td>
					<td><?php echo $row->qty * $row->jasas;?></td>
					<td><?php echo $row->periksa;?></td>
					<td><?php echo $row->unit;?></td>
				</tr>
				<?php $i++;}} ?>
				<tr>
					<td colspan="6"><b>Total per Unit Rujuka</b>n</td>
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

