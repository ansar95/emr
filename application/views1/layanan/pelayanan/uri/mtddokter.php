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
		if ($row->nonasuransi==1){echo "<td align='center'>UMUM</td>";} else {echo "<td align='center'>ASR</td>";} 
		echo "<td align='right'>".$row->diskon."</td>";
	?>
	<td class="text-center">
		<a onclick="ubahdokteredit(<?php echo $row->id; ?>)" class="btn-sm btn-info btn-flat"><i class="fa fa-edit"></i></a>
		<a onclick="hapusdataodokter(this, <?php echo $row->id; ?>)" class="btn-sm btn-danger btn-flat"><i class="fa fa-trash"></i></a>
	</td>
<?php
		echo "</tr>";
	}
}
?>
