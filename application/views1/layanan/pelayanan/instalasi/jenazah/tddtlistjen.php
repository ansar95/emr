<?php
if ($hasil == null) {
?>
<tr>
	<td colspan="100%" class="text-center">
		Tidak Ada Data
	</td>
</tr>
<?php
} else {
	foreach($hasil as $row) {
		echo "<tr><td>".$row->no_rm."</td>";
		echo "<td>".tanggaldua($row->tanggal)."</td>";
		echo "<td>".$row->nama_pasien."</td>";
		echo "<td>".$row->alamat."</td>";
		echo "<td>".$row->nama_unitR."</td>";
		echo "<td>".$row->golongan."</td>";
		echo "<td>".tanggaldua($row->tgl_ambil)."</td>";
		echo "<td>".tanggaldua($row->tgl_bayar)."</td>";
		// echo "<td>".tanggalblntgl($row->tgl_ambil)."</td>";
		// echo "<td>".tanggalblntgl($row->tgl_bayar)."</td>";
?>
	<td class="text-center">
        <button onclick="hapusinst(this, '<?php echo $row->id;?>');" class="btn-sm btn-danger btn">Hapus</button>
        <button onclick="panggiledit('<?php echo $row->id;?>');" class="btn-sm btn-warning btn">Ubah</button>
		<button onclick="panggilproses('<?php echo $row->id . "_" . $row->notransaksi . "_" . $row->notransaksi_IN . "_" . $row->kode_unit. "_" . $row->tanggal;?>');" class="btn-sm btn-success btn">Proses</button>
        <!-- <a onclick="proseskeluar('<?php echo $row->id;?>');" class="btn-sm btn-primary btn-flat">Keluar</a> -->
	</td>
<?php
		echo "</tr>";
	}
}
?>
