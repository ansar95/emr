<?php
if ($hasil == null) {
?>
<tr>
	<td colspan="5" class="text-center">
		Tidak Ada Data
	</td>
</tr>
<?php
} else {
	$nok = 1;
	foreach($hasil as $row) {
		echo "<tr><td>".$nok++.".</td>";
		echo "<td>".tanggaldua($row->tanggal)."</td>";
		echo "<td>".$row->qty."</td>";
		echo "<td>".$row->goldarah."</td>";
	?>
	<td class="text-center">
		<button onclick="ubahdarahedit(<?php echo $row->id; ?>)" class="btn-sm btn-info btn"><i class="fa fa-edit"></i></button>
		<button onclick="hapusdatadarah(this, <?php echo $row->id; ?>)" class="btn-sm btn-danger btn"><i class="fa fa-trash"></i></button>
	</td>
<?php
		echo "</tr>";
	}
}
?>
