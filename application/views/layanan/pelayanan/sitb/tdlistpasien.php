<?php
if ($dtpasientb == null) {
?>
<tr>
	<td colspan="12" class="text-center">
		Tidak Ada Data
	</td>
</tr>
<?php
} else {
	foreach($dtpasientb as $row) {
		echo "<tr><td>".$row->notransaksi."</td>";
		echo "<td>".$row->tgl_masuk."</td>";
        echo "<td>".$row->tgl_keluar."</td>";
        echo "<td>".$row->no_rm."</td>";
		echo "<td>".$row->nama_pasien."</td>";
		echo "<td>".substr($row->sex,0,1)."</td>";
        echo "<td>".$row->keluarpada."</td>";
        echo "<td>".$row->alamat."</td>";
        echo "<td>".$row->icd."</td>";
        echo "<td>".$row->diagnosa."</td>";
		echo "<td>".$row->golongan."</td>";
		echo "<td>".$row->nositb."</td>";

?>
	<!-- <td class="text-center">
		<button onclick="panggilproses(<?php echo $row->id;?>);" class="btn btn-sm btn-success ">Proses</button>
	</td> -->
<?php
		echo "</tr>";
	}
}
?>
