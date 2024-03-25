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
	$i=1;
	foreach($hasil as $row) {
		echo "<tr><td>".$i++."</td>";
		echo "<td>".$row->no_rm."</td>";
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
		<button onclick="panggilsoap('<?php echo $row->notransaksi;?>_<?php echo $row->kode_dokter;?>_<?php echo $row->no_rm;?>');" class="btn-sm btn-success btn">SOAP</i></button>
	</td>
	<td class="text-center">
		<button onclick="panggilproses('<?php echo $row->notransaksi;?>_<?php echo $row->kode_dokter;?>_<?php echo $row->taskid4;?>_<?php echo $row->inap_to_poli;?>');" class="btn-sm btn-primary btn">Proses</i></button>
	</td>

<?php 
		echo "</tr>";
   }
}
?>
