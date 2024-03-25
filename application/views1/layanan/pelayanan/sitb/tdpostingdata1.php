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
	$i=1;
	foreach($dtpasientb as $row) {
		echo "<tr><td>".$i++."</td>";
		echo "<td>".$row->nama_unit."</td>";
        echo "<td>".$row->jumlah."</td>";

?>
	<!-- <td class="text-center">
		<button onclick="panggilproses(<?php echo $row->id;?>);" class="btn btn-sm btn-success ">Proses</button>
	</td> -->
<?php
		echo "</tr>";
	}
}
?>
