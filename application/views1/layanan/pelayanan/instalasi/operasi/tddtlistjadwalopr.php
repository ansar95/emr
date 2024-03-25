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
?>
	<td class="text-center">
		<button onclick="hapusinst(this, '<?php echo $row->id;?>');" class="btn-sm btn-danger btn">Hapus</button>
        <button onclick="panggiledit('<?php echo $row->id;?>');" class="btn-sm btn-warning btn">Ubah</button>
	</td>
<?php
		echo "</tr>";
	}
}
?>
