<?php
if ($hasilpindah == null) {
?>
<tr>
	<td colspan="8" class="text-center">
		Tidak Ada Data
	</td>
</tr>
<?php
} else {
	foreach($hasilpindah as $key => $row) {
		echo "<tr><td>".$row->kode_unit."</td>";
		echo "<td>".$row->nama_unit."</td>";
		echo "<td>".tanggaldua($row->tgl_masuk_kamar)."</td>";
		echo "<td>".$row->jam_masuk."</td>";
		echo "<td>".tanggaldua($row->tgl_keluar_kamar)."</td>";
		echo "<td>".$row->jam_keluar."</td>";
		if ($row->status == "0") {
			echo '<td class="text-center">';
			if ($key == 0) {
				if ($pindah == 0) {
					if (count($hasilpindah) != 1) {
						echo '<a onclick="pasienkembali(this, '.$row->id.')" class="btn-sm btn-info btn-flat">Kembali</a>';
					}
				}
			}
			echo '</td>';
			echo '<td class="text-center">';
			if ($key == 0) {
				if ($pindah == 0) {
					echo '<a onclick="pasienpulang(this, '.$row->id.')" class="btn-sm btn-danger btn-flat">Pulang</a>';
				}
			}
			echo '</td>';
		} else {
			echo "<td></td>";
			echo "<td></td>";
		}
		echo "</tr>";
	}
} 
?>

