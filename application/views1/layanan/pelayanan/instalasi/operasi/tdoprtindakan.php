<?php
if ($hasil == null) {
?>
<tr>
	<td colspan="9" class="text-center">
		Tidak Ada Data
	</td>
</tr>
<?php
} else {
	$nop = 1;
	foreach($hasil as $row) {
		echo "<tr><td>".$nop++.".</td>";
		echo "<td>".tanggaldua($row->tgl_periksa)."</td>";
		echo "<td>".$row->tindakan."</td>";
		echo "<td>".$row->nama_dokter."</td>";
		echo "<td>".$row->nama_anastesi."</td>";
		echo "<td>".$row->spe_anak."</td>";
		echo "<td>".$row->nama_penata."</td>";
		echo "<td>".$row->nonasuransi."</td>";
		echo "<td>".$row->diskon."</td>";
	?>
	<td class="text-center">
		<button onclick="ubahopredit(<?php echo $row->id; ?>)" class="btn-sm btn-info btn"><i class="fa fa-edit"></i></button>
		<button onclick="hapusdataopr(this, <?php echo $row->id; ?>)" class="btn-sm btn-danger btn"><i class="fa fa-trash"></i></button>
	</td>
<?php
		echo "</tr>";
	}
}
?>
