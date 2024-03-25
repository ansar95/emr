<?php
	if ($brmdata == null) {
	?>
	<tr>
		<td colspan="100%" class="text-center">
			Tidak Ada Data
		</td>
	</tr>
	<?php
	} else {
		foreach($brmdata as $key => $row) {
			echo "<td>".$row->tglsetor."</td>";
			echo "<td>".$row->nama_dokter."</td>";
			echo "<td>".$row->jenislayanan."</td>";
			echo "<td>".tulisankondisistatus($row->kondisistatus)."</td>";
			echo "<td>".tulisankelengkapan($row->lengkap)."</td>";
			echo "<td>".tulisanketepatan($row->waktusetor)."</td>";
			echo "<td>".tulisanoperasi($row->operasi)."</td>";
	?>
		<td class="text-center">
			<button onclick="formeditbrm(<?php echo $row->id;?>);" class="btn btn-sm btn-success ">Isi</button>
		</td>
	<?php
			echo "</tr>";
		}
	}
?>