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
		echo "<tr><td align='right'>".$noo++.".</td>";
		echo "<td align='center'>".tanggaldua($row->tgl_pakai)."</td>";
		echo "<td align='center'>".$row->jam."</td>";
		echo "<td align='right'>".$row->qty."</td>";
		if ($row->nonasuransi==1){echo "<td align='center'>UMUM</td>";} else {echo "<td align='center'></td>";} 
		echo "<td align='right'>".$row->diskon."</td>";
	?>
	<td class="text-left">
		<button onclick="ubahoduaedit(<?php echo $row->id; ?>)" class="btn btn-sm btn-info"><i class="far fa-edit"></i></button>
		<button onclick="hapusdataodua(this, <?php echo $row->id; ?>)" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i></button>
	</td>
<?php
		echo "</tr>";
	}
}
?>
