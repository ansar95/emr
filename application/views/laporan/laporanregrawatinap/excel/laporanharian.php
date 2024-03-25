<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=pasienkeluarperpasien".namafiletgl().".xls");
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
		<b>LAPORAN HARIAN PASIEN RAWAT INAP</b>
		<hr>

		<table class="minimalistBlack">
			<thead>
				<tr>
					<!-- <th width="10%">Tanggal</th>
					<th width="5%">No.</th>
					<th width="10%">NO RM</th>
					<th width="20%">NAMA PASIEN</th>
					<th width="5%">UMUR</th>
					<th width="5%">JK</th>
					<th width="20%">ALAMAT</th>
					<th width="15%">GOLONGAN</th>
					<th width="15%">KUNJUNGAN</th>
					<th width="15%">UNIT</th> -->

					<th width="7%"><div align="center">Tanggal</div></th>
					<th width="4%"><div align="center">No.</div></th>
					<th width="7%"><div align="center">NO RM</div></th>
					<th width="15%">NAMA PASIEN</th>
					<th width="4%"><div align="center">UMUR</div></th>
					<th width="3%"><div align="center">JK</div></th>
					<th>ALAMAT</th>
					<th width="8%"><div align="center">GOLONGAN</div></th>
					<th width="8%"><div align="center">KUNJUNGAN</div></th>
					<th width="13%">UNIT MASUK</th>
					<th width="17%">UNIT KELUAR</th>
				</tr>
			</thead>
			<tbody>
				<?php if ($l == null) {?>
				<tr>
					<td colspan="10">Data Kosong</td>
				</tr>
				<?php } else {
					$i = 1;
					foreach($l as $row) {
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
					<td><?php echo barulama($row->barulama);?></td>
					<td><?php echo $row->unit;?></td>
					<td><?php echo $row->unitkeluar;?></td>
				</tr>
				<?php $i++;}} ?>
			</tbody>
		</table>
		<br>
	</body>
</html>
