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
	$noo = 1;
	foreach($hasil as $row) {
		echo "<tr><td>".$noo++.".</td>";
		echo "<td>".tanggaldua($row->tgl_pakai)."</td>";
		echo "<td>".$row->jam."</td>";
		echo "<td>".$row->qty."</td>";
	?>
	<td class="text-center">
		<button onclick="ubahoduaedit(<?php echo $row->id; ?>)" class="btn-sm btn-info btn"><i class="fa fa-edit"></i></button>
		<button onclick="hapusdataodua(this, <?php echo $row->id; ?>)" class="btn-sm btn-danger btn"><i class="fa fa-trash"></i></button>
	</td>
<?php
		echo "</tr>";
	}
}
?>
