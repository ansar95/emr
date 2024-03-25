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
	$no = 0;
	foreach($hasil as $row) {
		echo "<tr><td>".$no++.".</td>";
		echo "<td>".tanggaldua($row->tanggal)."</td>";
		echo "<td>".$row->jam."</td>";
		echo "<td>".$row->namatindakan."</td>";
		echo "<td>".$row->qty."</td>";
		echo "<td>".$row->nama_dokter."</td>";
		echo "<td>".$row->perawatsaja."</td>";
?>
	<td class="text-center">
		<button onclick="ubahtindakanedit(<?php echo $row->id; ?>)" class="btn-sm btn-info btn"><i class="fa fa-edit"></i></button>
		<button onclick="hapusdatatindakan(this, <?php echo $row->id; ?>)" class="btn-sm btn-danger btn"><i class="fa fa-trash"></i></button>
	</td>
<?php
		echo "</tr>";
	}
}
?>
