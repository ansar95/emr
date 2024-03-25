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
		echo "<tr><td>".$row->no_rm."</td>";
		echo "<td>".$row->nama_pasien."</td>";
		echo "<td>".$row->nama_unit."</td>";
		echo "<td>".$row->tgl_masuk."</td>";
		echo "<td>".$row->golongan."</td>";
		echo "<td>".$row->rujukan."</td>";
		echo "<td>".$row->notransaksi."</td>";
		if($row->status == 1) {
			if($row->pindah == 1) {
				$xstatus='Pindah';
				echo "<td>".$xstatus."</td>";
			} else {
				$xstatus='Pulang';
				echo "<td>".$xstatus."</td>";
			}
		} else {
			$xstatus='Menunggu';
			echo "<td>".$xstatus."</td>";
		}

		
?>
	<td class="text-center">
		<a onclick="panggildokter('<?php echo $row->id;?>_<?php echo $row->kode_dokter;?>');" class="btn-sm btn-warning btn-flat">Dokter</i></a>
	</td>
	<td class="text-center">
		<a onclick="panggilproses('<?php echo $row->notransaksi;?>_<?php echo $row->kode_dokter;?>');" class="btn-sm btn-success btn-flat">Proses</i></a>
	</td>

<?php
		if($row->proses == 1) {
			echo "<td>"."Terproses"."</td>";
		} else {
			echo "<td>".""."</td>";	
		} 

		if ($row->status == 0) {  ?>
		<td class="text-center">
			<a onclick="panggilantrian('<?php echo $row->id;?>');" class="btn-sm btn-danger btn-flat"><?php echo $row->no_antrian;?></i></a>
		</td>	
<?php }
		echo "</tr>";
   }
}
?>
