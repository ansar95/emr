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
	$nos = 1;
	foreach($hasil as $row) {
		echo "<tr><td>".$nos++.".</td>";
		echo "<td>".tanggaldua($row->tanggal)."</td>";
		echo "<td>".$row->tindakan."</td>";
		echo "<td>".$row->jasas."</td>";
		echo "<td>".$row->nama_dokter."</td>";
		echo "<td>".$row->spe_anak."</td>";
		echo "<td>".$row->nama_bidan."</td>";
		echo "<td>".$row->dokanastesi."</td>";
?>
	<td class="text-center">
		<button onclick="ubahtindakanbsredit(<?php echo $row->id; ?>)" class="btn-sm btn-info btn"><i class="fa fa-edit"></i></button>
		<button onclick="hapusdatatindakanbsr(this, <?php echo $row->id; ?>)" class="btn-sm btn-danger btn"><i class="fa fa-trash"></i></button>
	</td>
<?php
		echo "</tr>";
	}
}
?>
