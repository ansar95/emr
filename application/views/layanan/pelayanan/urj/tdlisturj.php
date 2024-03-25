<?php
if ($hasil == null) {
?>
<tr>
	<td colspan="10" class="text-center">
		Tidak Ada Data
	</td>
</tr>
<?php
} else {
	foreach($hasil as $row) {
		echo "<tr>"; 
		if ($row->berkas == 1) {?>
			<td class="text-center">
				<button onclick="berkassampai('<?php echo $row->idregister;?>_<?php echo $row->nama_pasien;?>');" class="btn-sm btn-secondary btn"><?php echo 'o';?></i></button>
			</td>
<?php
		} elseif ($row->berkas == 3) {
?>
			<td class="text-center">
				<button class="btn-sm btn-danger btn"><?php echo 'X';?></i></button>
			</td>
<?php
		} elseif ($row->berkas == 5) {
?>
			<td class="text-center">
				<button class="btn-sm btn-dark btn"><?php echo 'R';?></i></button>
			</td>
<?php	
		} elseif ($row->berkas == 2) {
?>	
		<td class="text-center">
			<button onclick="berkaskembali('<?php echo $row->idregister;?>_<?php echo $row->nama_pasien;?>');" class="btn-sm btn-info btn"><?php echo 'K';?></i></button>
		</td>
<?php
		} else {
?>			
		<td class="text-center">
			<!-- <button class="btn-sm btn-dark btn"><?php echo 'R';?></i></button> -->
			<!-- <button class="btn-sm btn-dark btn"><?php echo 'R';?></i></button> -->
		</td> 
<?php	
		}	
		
		if ($row->status == 1) {
			$class='text-danger';
		} else {
			$class='text-black';
		}
		echo "<td class='$class'>".$row->no_rm."</td>";
		echo "<td class='$class'>".$row->nama_pasien."</td>";
		echo "<td class='$class'>".$row->nama_unit."</td>";
		echo "<td class='$class'>".$row->tgl_masuk."</td>";
		echo "<td class='$class'>".$row->golongan."</td>";
		// echo "<td class='$class'>".$row->rujukan."</td>";
		echo "<td class='$class'>".$row->notransaksi."</td>";
		if($row->status == 1) {
			if($row->pindah == 1) {
				$xstatus='Pindah';
				echo "<td class='$class'>".$xstatus."</td>";
			} else {
				$xstatus='Pulang';
				echo "<td class='$class'>".$xstatus."</td>";
			}
		} else {
			$xstatus='Menunggu';
			echo "<td class='$class'>".$xstatus."</td>";
		}
?>
	<td class="text-center">
		<button onclick="panggildokter('<?php echo $row->id;?>_<?php echo $row->kode_dokter;?>');" class="btn-sm btn-warning btn">Dokter</i></button>
		<button onclick="panggilsoap('<?php echo $row->notransaksi;?>_<?php echo $row->kode_dokter;?>_<?php echo $row->no_rm;?>');" class="btn-sm btn-success btn">SOAP</i></button>
		<button onclick="panggilproses('<?php echo $row->notransaksi;?>_<?php echo $row->kode_dokter;?>_<?php echo $row->taskid4;?>_<?php echo $row->inap_to_poli;?>');" class="btn-sm btn-primary btn">Proses</i></button>
		<!-- <button onclick="detailUrj()" class="btn-sm btn-info btn">Detail</datagrid></button> -->
	</td>

<?php
		if($row->proses == 1) {
			echo "<td>"."Terproses"."</td>";
		} else {
			echo "<td>".""."</td>";	
		} 

		if ($row->status == 0) {  ?>
			<td class="text-center bg-white">
			<button onclick="panggilantrian('<?php echo $row->id;?>_<?php echo $row->no_antrian;?>_<?php echo $row->nama_pasien;?>');" class="btn-sm btn-danger btn"><?php echo $row->no_antrian;?></i></button>
			</td>	
		<?php } else {?>
			<td></td>
		<?php } ?>
		<td class="text-center bg-white">
		<?php if($row->golongan == "BPJS") { ?>
			<button onclick="buatsurkon(<?php echo $row->id;?>);" class="btn btn-sm btn-primary "><i class="fa fa-pen"></i></button>
        	<button onclick="editsurkon(<?php echo $row->id;?>);" class="btn btn-sm btn-warning "><i class="fa fa-edit"></i></button>
        	<button onclick="hapussurkon(<?php echo $row->id;?>);" class="btn btn-sm btn-danger "><i class="fa fa-edit"></i></button>
		<?php } ?>	
        	<button onclick="jadwaldokter(<?php echo $row->id;?>);" class="btn btn-sm btn-info ">Jad.Dokter</button>
		</td>	
<?php		
		echo "</tr>";
   }
}
?>
