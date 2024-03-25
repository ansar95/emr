<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=pasienkeluarperpasien".namafiletgl().".xls");
?>
<html>
	<head>
		<link rel="stylesheet" href="<?php echo base_url();?>assets/report/tablereport_dedy.css">
		<link rel="stylesheet" href="<?php echo base_url();?>assets/report/fontreport.css">
	</head>
	<body>
		<b><?php echo ' '.getenv('V_NAMARS'); ?> </b><br>
		<b>LAPORAN PASIEN KELUAR RUMAH SAKIT PER PASIEN</b>
		<hr>
		<?php 
		foreach($l as $baris) {
		?>
		<b><?php echo $baris["unit"]; ?></b>
		<table class="minimalistBlack">
			<thead>
				<tr>
					<th width="13%">TANGGAL KELUAR</th>
					<th width="5%">No.</th>
					<th width="12%">NO RM</th>
					<th width="20%">NAMA PASIEN</th>
					<th width="20%">UMUR</th>
					<th width="20%">JK</th>
					<th width="20%">ALAMAT</th>
					<th width="15%">GOLONGAN</th>
					<th width="15%">KONDISI</th>
				</tr>
			</thead>
			<tbody>
				<?php if ($l == null) {?>
				<tr>
					<td colspan="7">Data Kosong</td>
				</tr>
				<?php } else {
					$i = 1;
					foreach($baris["data"] as $row) {
				?>
				<tr>
					<td><?php echo $row->tgl;?></td>
					<td><?php echo $i;?></td>
					<td><?php echo $row->norm;?></td>
					<td><?php echo $row->nama;?></td>
					<td><?php echo hitungumur($row->tgl_lahir);?></td>
					<td><?php echo $row->sex;?></td>
					<td><?php echo $row->alamat;?></td>
					<td><?php echo $row->golongan;?></td>
					<td><?php echo $row->kondisi;?></td>
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
