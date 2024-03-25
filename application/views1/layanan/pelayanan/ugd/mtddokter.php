<?php
if ($hasil == null) {
?>
<tr>
	<td colspan="100%" class="text-center">
		Tidak Ada Data
	</td>
</tr>
<?php
} else {
	$nod = 1;
	foreach($hasil as $row) {
		echo "<tr><td align='right'>".$nod++.".</td>";
		echo "<td>".tanggaldua($row->tanggal)."</td>";
		echo "<td>".$row->jam."</td>";
		echo "<td>".$row->nama_dokter."</td>";
		echo "<td>".$row->visite."</td>";
		if ($row->nonasuransi==1){echo "<td align='center'>UMUM</td>";} else {echo "<td align='center'></td>";} 
		echo "<td align='right'>".$row->diskon."</td>";
	?>
	<td class="text-center">
		<button onclick="ubahdokteredit(<?php echo $row->id; ?>)" class="btn btn-sm btn-info"><i class="far fa-edit"></i></button>
		<button onclick="hapusdataodokter(this, <?php echo $row->id; ?>)" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i></button>
	</td>
<?php
		echo "</tr>";
	}
}
?>
