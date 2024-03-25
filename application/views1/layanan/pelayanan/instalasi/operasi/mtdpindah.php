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
	foreach($hasil as $row) {
		echo "<tr><td>".$row->kode_unit."</td>";
		echo "<td>".$row->nama_unit."</td>";
		echo "<td>".tanggaldua($row->tgl_masuk_kamar)."</td>";
		echo "<td>".$row->jam_masuk."</td>";
		echo "<td>".tanggaldua($row->tgl_keluar_kamar)."</td>";
		echo "<td>".$row->jam_keluar."</td>";
		if ($row->status == "0") {
			echo '<td class="text-center">';
    	echo '<button onclick="pasienkembali(this, '.$row->id.')" class="btn-sm btn-danger btn">Kembali</button>';
			echo '</td>';
    } else {
      echo "<td></td>";
    }
		echo "</tr>";
	}
} 
?>
