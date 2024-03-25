<?php
if ($hasil == null) {
?>
	<tr>
		<td colspan="10" class="text-center">
			Tidak Ada Data
		</td>
	</tr>
	<?php


} else {
	$i = 1;
	// <tr bgcolor="#FFA800" align="center">
	foreach ($hasil as $row) {
		if ($row->pindah == 0) {
			echo "<tr><td>" . $i++ . "</td>";
			echo "<td>" . $row->no_rm . "</td>";
			echo "<td>" . $row->nama_pasien . "</td>";
			echo "<td>" . $row->alamat . "</td>";
			echo "<td>" . $row->nama_unit . "</td>";
			echo "<td>" . $row->tgl_masuk . "</td>";
			echo "<td>" . $row->golongan . "</td>";
			echo "<td>" . $row->rujukan . "</td>";
			echo "<td>" . $row->notransaksi . "</td>";
			if ($row->pindah == 1) {
				echo "<td>" . Pindah . "</td>";
			} elseif ($row->pulang == 1) {
				echo "<td>" . Pulang . "</td>";
			} else {
				echo "<td>" . IGD . "</td>";
			}
		} else {
			// echo "<tr><td >".$i++."</td>";
			// echo "<td >".$row->no_rm."</td>";
			// echo "<td >".$row->nama_pasien."</td>";
			// echo "<td >".$row->alamat."</td>";
			// echo "<td >".$row->nama_unit."</td>";
			// echo "<td >".$row->tgl_masuk."</td>";
			// echo "<td >".$row->golongan."</td>";
			// echo "<td >".$row->rujukan."</td>";
			// echo "<td >".$row->notransaksi."</td>";
			// echo "<td >".Pindah."</td>";
			echo "<tr><td bgcolor='#C0C0C0'>" . $i++ . "</td>";
			echo "<td bgcolor='#C0C0C0'>" . $row->no_rm . "</td>";
			echo "<td bgcolor='#C0C0C0'>" . $row->nama_pasien . "</td>";
			echo "<td bgcolor='#C0C0C0'>" . $row->alamat . "</td>";
			echo "<td bgcolor='#C0C0C0'>" . $row->nama_unit . "</td>";
			echo "<td bgcolor='#C0C0C0'>" . $row->tgl_masuk . "</td>";
			echo "<td bgcolor='#C0C0C0'>" . $row->golongan . "</td>";
			echo "<td bgcolor='#C0C0C0'>" . $row->rujukan . "</td>";
			echo "<td bgcolor='#C0C0C0'>" . $row->notransaksi . "</td>";
			echo "<td bgcolor='#C0C0C0'>" . Pindah . "</td>";
		}

	?>
		<td class="text-center">
			<button onclick="panggildokter('<?php echo $row->id; ?>_<?php echo $row->kode_dokter; ?>');" class="btn btn-sm btn-warning">Dokter</i></button>
		</td>
		<td class="text-center">
			<button onclick="panggilproses('<?php echo $row->notransaksi; ?>');" class="btn btn-sm btn-success">Proses</i></button>
		</td>
<?php
		echo "</tr>";
	}
}
?>