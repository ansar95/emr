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
	$no = 1;
	foreach($hasil as $row) {
		echo "<tr><td align='right'>".$no++.".</td>";
		echo "<td>".tanggaldua($row->tanggal)."</td>";
		echo "<td>".$row->jam."</td>";
		echo "<td>".$row->tindakan."</td>";
		echo "<td align='center'>".$row->qty."</td>";
		echo "<td>".$row->nama_dokter."</td>";
		// echo "<td align='center'>".$row->perawatsaja."</td>";
		if ($row->perawatsaja==1){echo "<td align='center'>PRW</td>";} else {echo "<td align='center'>x</td>";} 
		if ($row->nonasuransi==1){echo "<td align='center'>UMUM</td>";} else {echo "<td align='center'></td>";} 
		echo "<td align='right'>".$row->diskon."</td>";
?>
	<td class="text-center">
		<button onclick="ubahtindakanedit(<?php echo $row->id; ?>)" class="btn btn-sm btn-info "><i class="far fa-edit"></i></button>
		<button onclick="hapusdatatindakan(this, <?php echo $row->id; ?>)" class="btn btn-sm btn-danger "><i class="far fa-trash-alt"></i></button>
	</td>
<?php
		echo "</tr>";
	}
}
?>
