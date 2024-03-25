<?php
if ($hasil == null) {
?>
<tr>
	<td colspan="8" class="text-center">
		Tidak Ada Data
	</td>
</tr>
<?php
} else {
	foreach($hasil as $row) {
		echo "<tr><td>".$row->kode_unit."</td>";
		echo "<td>".$row->nama_unit."</td>";
		echo "<td>".tanggaldua($row->tgl_masuk_kamar)."</td>";
		echo "<td>".$row->jam_masuk."</td>";
		echo "<td>".tanggaldua($row->tgl_keluar_kamar)."</td>";
		echo "<td>".$row->jam_keluar."</td>";
?>
	<td class="text-center">
		<button onclick="pasienkembali(this, <?php echo $row->id; ?>)" class="btn-sm btn-info btn">Kembali</i></button>
	</td>
	<td class="text-center">
		<button onclick="pasienpulang(this, <?php echo $row->id; ?>)" class="btn-sm btn-danger btn">Pulang</i></button>
	</td>
<?php
		echo "</tr>";
	}
} 
?>
