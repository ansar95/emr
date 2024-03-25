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
		<b>INSTALASI LABORATORIUM</b>
		<hr>
		<?php 
		foreach($l as $baris) {
		?>
		<b><?php echo $baris["unit"]; ?></b>
		<table class="minimalistBlack">
			<thead>
				<tr>
					<th width="7%">TANGGAL</th>
					<th width="3%">No.</th>
					<th width="7%">NO RM</th>
					<th width="15%">NAMA PASIEN</th>
					<th width="7%">GOLONGAN</th>
					<th width="15%">DOKTER PENGIRIM</th>
					<th width="15%">DOKTER PEMERIKSA</th>
					<th width="17%">TINDAKAN</th>
					<th width="7%"><div align="right">JUMLAH</div></th>
					<th width="8%">trx</th>
				</tr>
			</thead>
			<tbody>
				<?php if ($l == null) {?>
				<tr>
					<td colspan="9">Data Kosong</td>
				</tr>
				<?php } else {
					$i = 1;
					$notransaksi_IN_lama="";
					$jumlah=0;
					foreach($baris["data"] as $row) {
						$notransaksi_IN=$row->notransaksi_IN;
						$no_rm = $row->no_rm;
						$pasien = $row->pasien;
						$kirim = $row->kirim;
						$periksa = $row->periksa;
						$notransaksi = $row->notransaksi;
						$golongan = $row->golongan;
						$tanggal = $row->tanggal;

						$qry1=$this->db->query("SELECT mtindakan.tindakan as tindakan, ptindakan_instalasi.jasas as jasas,ptindakan_instalasi.qty as qty from ptindakan_instalasi,mtindakan WHERE ptindakan_instalasi.tindakan=mtindakan.kode_tindakan and  ptindakan_instalasi.notransaksi_IN='$notransaksi_IN'");

						foreach ($qry1->result_array() as $brs1) {
							$jumlah=$jumlah+$brs1['qty'] * $brs1['jasas'];
							?>			
							<tr>
							<?php if ($notransaksi_IN_lama == $row->notransaksi_IN) { ?>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							<?php } else {	?>
								<td><?php echo $tanggal;?></td>
								<td><?php echo $i++;?></td>
								<td><?php echo $no_rm;?></td>
								<td><?php echo $pasien?></td>
								<td><?php echo $golongan;?></td>
								<td><?php echo $kirim;?></td>
								<td><?php echo $periksa;?></td>
							<?php }?>
							<td><?php echo $brs1['tindakan'];?></td>
							<td><div align="right"><?php echo formatuang($brs1['qty'] * $brs1['jasas']);?></div></td>
							<td><?php echo $notransaksi_IN;?></td>
						</tr>		
				<?php
							if ( $notransaksi_IN_lama != $row->notransaksi_IN) {
								$notransaksi_IN_lama=$row->notransaksi_IN;
							}
						}
				?>
				
				<?php 
					
				} ?>
				<td colspan="8"><div align="right"><?php echo 'JUMLAH ';?></div></td>
				<td><div align="right"><?php echo formatuang($jumlah);?></div></td>
				<?php } ?>
			</tbody>
		</table>
		<br>
		<?php
		}
		?>
	</body>
</html>

