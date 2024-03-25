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
		echo "<tr><td align='right'>".$nok++.".</td>";
		echo "<td align='center'>".tanggaldua($row->tanggal)."</td>";
		echo "<td align='right'>".$row->qty."</td>";
		echo "<td align='center'>".$row->goldarah."</td>";
		if ($row->nonasuransi==1){echo "<td align='center'>UMUM</td>";} else {echo "<td align='center'></td>";} 
		echo "<td align='right'>".$row->diskon."</td>";
		
	?>
	<td class="text-left">
		<a onclick="ubahdarahedit(<?php echo $row->id; ?>)" class="btn-sm btn-info btn-flat"><i class="fa fa-edit"></i></a>
		<a onclick="hapusdatadarah(this, <?php echo $row->id; ?>)" class="btn-sm btn-danger btn-flat"><i class="fa fa-trash"></i></a>
	</td>
<?php
		echo "</tr>";
	}
}
?>
