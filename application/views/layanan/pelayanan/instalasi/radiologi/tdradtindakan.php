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
		echo "<td>".tanggaldua($row->tanggal)."</td>";
		echo "<td>".$row->tindakan."</td>";
		echo "<td>".$row->jasas."</td>";
		if ($row->nonasuransi==1){echo "<td>UMUM</td>";} else {echo "<td>ASR</td>";} 
		echo "<td>".$row->diskon."</td>";
	?>
	<td class="text-center">
		<button onclick="ubahtindakanedit(<?php echo $row->id; ?>)" class="btn-sm btn-info btn"><i class="fa fa-edit"></i></button>
		<button onclick="hapusdatatindakan(this, <?php echo $row->id; ?>)" class="btn-sm btn-danger btn"><i class="fa fa-trash"></i></button>
		<a role="button" class='btn-sm btn-success btn' target="blank" href="<?php echo site_url();?>/iradiologi/layananhasilcetak/<?php echo $row->id;?>">Cetak Hasil</a>
	</td>
<?php
		echo "</tr>";
	}
}
?>
