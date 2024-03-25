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
	$nob = 1;
    $qty = 0;
	$jml = 0;
	foreach($hasil as $row) {
	    $r = $row->qty * $row->hargapakai;
		echo "<tr><td>".$nob++.".</td>";
		echo "<td>".tanggaldua($row->tanggal)."</td>";
		echo "<td>".$row->namaobat."</td>";
		echo "<td>".$row->satuanpakai."</td>";
		echo "<td>".$row->hargapakai."</td>";
		echo "<td>".$row->qty."</td>";
        echo "<td>".$r."</td>";
        $qty = $qty + $row->qty;
        $jml = $jml + $r;
	?>
	<td class="text-center">
		<button onclick="ubahbhpedit(<?php echo $row->id; ?>)" class="btn-sm btn-info btn"><i class="fa fa-edit"></i></button>
		<button onclick="hapusdatabhp(this, <?php echo $row->id; ?>)" class="btn-sm btn-danger btn"><i class="fa fa-trash"></i></button>
	</td>
<?php
		echo "</tr>";
	}
    echo "<tr>";
    echo "<td colspan='5'>Total</td>";
    echo "<td>".$qty."</td>";
    echo "<td colspan='2'>".$jml."</td>";
    echo "</tr>";
}
?>
