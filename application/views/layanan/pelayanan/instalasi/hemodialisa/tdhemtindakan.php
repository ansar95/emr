<?php
if ($hasil == null) {
?>
<tr>
	<td colspan="4" class="text-center">
		Tidak Ada Data
	</td>
</tr>
<?php
} else {
	$no = 1;
	foreach($hasil as $row) {
		echo "<tr><td>".$no++.".</td>";
		echo "<td>".$row->tindakan."</td>";
		echo "<td>".$row->jasas."</td>";
		if ($row->nonasuransi==1){echo "<td>UMUM</td>";} else {echo "<td>ASR</td>";} 
		echo "<td>".$row->diskon."</td>";
	?>
	<td class="text-center">
		<a onclick="ubahtindakanedit(<?php echo $row->id; ?>)" class="btn-sm btn-info btn-flat"><i class="fa fa-edit"></i></a>
		<a onclick="hapusdatatindakan(this, <?php echo $row->id; ?>)" class="btn-sm btn-danger btn-flat"><i class="fa fa-trash"></i></a>
	</td>
<?php
		echo "</tr>";
	}
}
?>
