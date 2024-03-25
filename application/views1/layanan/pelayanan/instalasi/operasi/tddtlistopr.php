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
		echo "<tr><td>".$row->no_rm."</td>";
		echo "<td>".$row->nama_pasien."</td>";
		echo "<td>".$row->nama_unitR."</td>";
		echo "<td>".$row->golongan."</td>";
		echo "<td>".$row->nama_dokter."</td>";
		echo "<td>".$row->nama_unit_pelaksana."</td>";
		echo "<td>".$row->rujukan."</td>";
		echo "<td>".$row->nama_ruang."</td>";
?>
	<td class="text-center">
		<button onclick="hapusinst(this, '<?php echo $row->id;?>');" class="btn-sm btn-danger btn m-1">Hapus</button>
        <button onclick="panggiledit('<?php echo $row->id;?>');" class="btn-sm btn-warning btn m-1">Ubah</button>
		<button onclick="panggilproses('<?php echo $row->id . "_" . $row->notransaksi . "_" . $row->notransaksi_IN . "_" . $row->kode_unit;?>');" class="btn-sm btn-success btn m-1">Proses</button>
	</td>
<?php
		echo "</tr>";
	}
}
?>
