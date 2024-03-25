<?php
if ($hasil == null) {
?>
<tr>
	<td colspan="100%" class="text-center">
		Tidak Ada Data
	</td>
</tr>
<?php
} else {
	$i=1;
	foreach($hasil as $row) {
		if ( $row->status==0 ){$warna='#FFFFFF';}	
		if ( $row->pindah==1 ){$warna='#C0C0C0';}	
		if ( $row->pulang==1 ){$warna='#FFFF00';}	
		echo "<tr><td bgcolor='$warna'>".$i++."</td>";
		echo "<td bgcolor='$warna'>".$row->no_rm."</td>";
		echo "<td bgcolor='$warna'>".$row->nama_pasien."</td>";
		echo "<td bgcolor='$warna'>".$row->nama_unit."</td>";
		echo "<td bgcolor='$warna'>".tanggaldua($row->tgl_masuk)."</td>";
		echo "<td bgcolor='$warna'>".$row->golongan."</td>";
		echo "<td bgcolor='$warna'>".$row->notransaksi."</td>";
		// echo "<td bgcolor='$warna'>".$row->pindah."</td>";
		if($row->pulang==1) {
			echo "<td bgcolor='$warna'>".Pulang."</td>";
			} elseif($row->pindah==1) {
				echo "<td bgcolor='$warna'>".Pindah."</td>";
			} else {
				echo "<td bgcolor='$warna'>".KMB."</td>";
			}
?>
	<td class="text-center">
        <button onclick="hapusinst(this, '<?php echo $row->id;?>');" class="btn-sm btn-danger btn">Hapus</button>
        <button onclick="panggilproses('<?php echo $row->notransaksi;?>');" class="btn-sm btn-success btn">Proses</i></button>
	</td>
<?php
		echo "</tr>";
	}
}
?>
