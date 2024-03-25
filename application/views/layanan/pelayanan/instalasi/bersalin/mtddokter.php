<?php
if ($hasil == null) {
?>
<tr>
	<td colspan="6" class="text-center">
		Tidak Ada Data
	</td>
</tr>
<?php
} else {
	$nod = 1;
	foreach($hasil as $row) {
		echo "<tr><td>".$nod++.".</td>";
		echo "<td>".tanggaldua($row->tanggal)."</td>";
		echo "<td>".$row->jam."</td>";
		echo "<td>".$row->nama_dokter."</td>";
		echo "<td>".$row->visite."</td>";
	?>
	<td class="text-center">
		<button onclick="ubahdokteredit(<?php echo $row->id; ?>)" class="btn-sm btn-info btn"><i class="fa fa-edit"></i></button>
		<button onclick="hapusdataodokter(this, <?php echo $row->id; ?>)" class="btn-sm btn-danger btn"><i class="fa fa-trash"></i></button>
	</td>
<?php
		echo "</tr>";
	}
}
?>
