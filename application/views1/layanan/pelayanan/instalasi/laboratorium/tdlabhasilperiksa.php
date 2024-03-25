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
	$no = 1;
	foreach($hasil as $row) {
		echo "<tr><td>".$no++.".</td>";
		echo "<td>".$row->nama_labjenis."</td>";
		echo "<td>".$row->nama_item."</td>";
		echo "<td>".$row->result."</td>";
		echo "<td>".$row->referensi."</td>";
	?>
	<td class="text-center">
		<button onclick="ubahhasiledit(<?php echo $row->id; ?>)" class="btn-sm btn-info btn"><i class="fa fa-edit"></i></button>
		<button onclick="hapusdatahasil(this, <?php echo $row->id; ?>)" class="btn-sm btn-danger btn"><i class="fa fa-trash"></i></button>
	</td>
<?php
		echo "</tr>";
	}
}
?>
