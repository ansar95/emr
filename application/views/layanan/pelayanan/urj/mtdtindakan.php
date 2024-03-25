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
	$jmlt = 0;
	foreach($hasil as $row) {
		$rt = ($row->qty * $row->jasas) - ($row->qty * $row->jasas * $row->diskon/100);
		echo "<tr><td align='right'>".$no++.".</td>";
		echo "<td>".tanggaldua($row->tanggal)."</td>";
		echo "<td>".$row->jam."</td>";
		echo "<td>".$row->tindakan."</td>";
		echo "<td align='center'>" . $row->qty . "</td>";
		echo "<td>".$row->nama_dokter."</td>";
		if ($row->perawatsaja==1){echo "<td align='center'>PRW</td>";} else {echo "<td align='center'>x</td>";} 
		if ($row->nonasuransi==1){echo "<td align='center'>UMUM</td>";} else {echo "<td align='center'></td>";}	
		echo "<td align='right'>".groupangka($row->jasas)."</td>";
		echo "<td align='right'>".$row->diskon."</td>";
		echo "<td align='right'>".groupangka($rt)."</td>";
		$jmlt = $jmlt + $rt;
?>
	<td class="text-center">
		<button onclick="ubahtindakanedit(<?php echo $row->id; ?>)" class="btn-sm btn-info btn"><i class="fa fa-edit"></i></button>
		<button onclick="hapusdatatindakan(this, <?php echo $row->id; ?>)" class="btn-sm btn-danger btn"><i class="fa fa-trash"></i></button>
	</td>
<?php
		echo "</tr>";
	}
	echo "<tr>";
    echo "<td colspan='10' align='right'>Total</td>";
    echo "<td colspan='1' align='right'>".groupangka($jmlt)."</td>";
    echo "</tr>";
}
?>
