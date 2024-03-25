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
	foreach($hasil as $row) {
		echo "<tr><td>".$row->no_rm."</td>";
		echo "<td>".tanggaldua($row->tanggal)."</td>";
		echo "<td>".$row->nama_pasien."</td>";
		echo "<td>".$row->nama_unitR."</td>";
		echo "<td>".$row->golongan."</td>";
		echo "<td>".$row->nama_dokter."</td>";
		echo "<td>".$row->nama_dokter_periksa."</td>";
		echo "<td>".$row->no_lab."</td>";
?>
	<td class="text-center">
        <button onclick="hapusinst(this, '<?php echo $row->id;?>');" class="btn-sm m-1 btn-danger btn">Hapus</button>
        <button onclick="panggiledit('<?php echo $row->id;?>');" class="btn-sm m-1 btn-warning btn">Ubah</button>
		<button onclick="panggilproses('<?php echo $row->id . "_" . $row->notransaksi . "_" . $row->notransaksi_IN . "_" . $row->kode_unit. "_" . $row->tanggal;?>');" class="btn m-1 btn-sm btn-success">Proses</button>
		<!-- <button onclick="send2lis(this, '<?php echo $row->id;?>');" class="btn-sm btn-danger btn-flat">SEND</a> -->
	</td>
<?php
		echo "</tr>";
	}
}
?>
