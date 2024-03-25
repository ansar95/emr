<html>
	<head>
		<link rel="stylesheet" href="<?php echo base_url();?>assets/report/tablereport_dedy.css">
		<link rel="stylesheet" href="<?php echo base_url();?>assets/report/fontreport.css">
		<style>		
		@media print {
  @page { margin: 0; }
  body { margin: 1.6cm; }
}
</style>

	</head>
	<body>
		<div class="namars"><?php echo ' '.getenv('V_NAMARS'); ?> </div>
		<div class="judul">LAPORAN PASIEN KELUAR RUMAH SAKIT</div>

		<table class="minimalistBlack">
			<thead>
				<tr>
					<th width="6%">TGL KLR</th>
					<th width="6%">TGL MSK</th>
					<th width="3%">NO.</th>
					<th width="5%">NO. RM</th>
					<th width="13%">NAMA PASIEN</th>
					<th width="4%">UMUR</th>
					<th width="1%">JK</th>
					<th width="10%">ALAMAT</th>
					<th width="3%">HARI RWT</th>
					<th width="7%">GOLONGAN</th>
					<th width="10%">UNIT KELUAR</th>
					<th width="10%">DIAGNOSA</th>
					<th >DPJP</th>
					<th width="5%">KONDISI</th>
				</tr>
			</thead>
			<tbody >
				<?php if ($l == null) {?>
				<tr>
					<td colspan="14">Data Kosong</td>
				</tr>
				<?php } else {
					$i = 1;
					foreach($l as $row) {
				?>
				<tr>
					<td><?php echo $row->tglkeluar;?></td>
					<td><?php echo $row->tglmasuk;?></td>
					<td><?php echo $i;?></td>
					<td><?php echo $row->norm;?></td>
					<td><?php echo $row->nama;?></td>
					<td><?php echo hitungumur($row->tgl_lahir);?></td>
					<td><?php echo $row->sex;?></td>
					<td><?php echo $row->alamat;?></td>
					<td><?php echo hitunglamainap($row->tglmasuk, $row->tglkeluar);?></td>
					<td><?php echo $row->golongan;?></td>
					<td><?php echo $row->keluarpada;?></td>
					<td><?php echo $row->diag;?></td>
					<td><?php echo $row->dokter;?></td>
					<td><?php echo $row->kondisi;?></td>
				</tr>
				<?php $i++;}} ?>
			</tbody>
		</table>
		<br>
	</body>
</html>
