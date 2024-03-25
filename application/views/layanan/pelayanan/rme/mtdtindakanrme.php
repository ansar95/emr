<?php
if ($dttdtindakan == null) {
?>
<tr>
	<td colspan="8" class="text-center">
		Tidak Ada Data
	</td>
</tr>
<?php
} else {
	$no = 1;
	$jmlt = 0;
	foreach($dttdtindakan as $row) {
		$rt = ($row->qty * $row->jasas) - ($row->qty * $row->jasas * $row->diskon/100);
		echo "<tr><td align='right'>".$no++.".</td>";
		echo "<td>".tanggaldua($row->tanggal)."</td>";
		echo "<td>".$row->jam."</td>";
		echo "<td>".$row->tindakan."</td>";
		echo "<td align='right'>".$row->diskon."</td>";
?>
	<td class="text-center">
		<button onclick="hapusdatatindakan(this, <?php echo $row->id; ?>)" class="btn-sm btn-danger btn"><i class="fa fa-trash"></i></button>
	</td>
<?php
		echo "</tr>";
	}
}
?>
