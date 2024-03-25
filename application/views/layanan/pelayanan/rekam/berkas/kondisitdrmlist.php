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
		echo "<tr><td>".$row->tglsetor."</td>";
		echo "<td>".$row->tgl_masuk."</td>";
        echo "<td>".$row->tgl_keluar."</td>";
        echo "<td>".$row->no_rm."</td>";
		echo "<td>".$row->nama."</td>";
        echo "<td>".$row->keluarpada."</td>";
        echo "<td>".$row->nama_dokter."</td>";
		echo "<td>".$row->golongan."</td>";
		echo "<td>".$row->notransaksi."</td>";
?>
	<td class="text-center">
		<button onclick="panggilproses(<?php echo $row->id;?>);" class="btn btn-sm btn-success ">Proses</button>
	</td>
<?php
		echo "</tr>";
	}
}
?>
