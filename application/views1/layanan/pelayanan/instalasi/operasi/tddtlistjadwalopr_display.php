<?php
if ($hasil == null) {
?>
<tr>
	<td colspan="7" class="text-center">
		Tidak Ada Data
	</td>
</tr>
<?php
} else {
	$no=1;
	foreach($hasil as $row) { 
		echo "<tr><td>".$no++."</td>";
		echo "<td>".$row->kodebooking."</td>";
		echo "<td>".$row->no_rm."</td>";
		echo "<td>".$row->nama_pasien."</td>";
		echo "<td>".$row->no_askes."</td>";
		echo "<td>".$row->tanggaloperasi."</td>";
		echo "<td>".$row->namapoli."</td>";
		echo "<td>".$row->nama_dokter."</td>";
		echo "<td>".$row->tindakan."</td>";
		echo "<td>".($row->terlaksana == 1 ? "Terlaksana" : "Belum")."</td>";
		echo "</tr>";
	}
}
?>
