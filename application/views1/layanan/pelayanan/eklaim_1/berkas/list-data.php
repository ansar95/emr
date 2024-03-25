<?php
$revert = array('%21'=>'!', '%2A'=>'*', '%27'=>"'", '%28'=>'(', '%29'=>')');
if ($hasil == null) {
?>
<tr>
	<td colspan="10" class="text-center">
		Tidak Ada Data
	</td>
</tr>
<?php
} else {
	
	
	foreach($hasil as $row) {
		echo "<tr>";
		echo "<td>".$row->tgl_masuk."</td>";
        echo "<td>".$row->tgl_keluar."</td>";
        echo "<td>".$row->no_rm."</td>";
		echo "<td>".$row->nama."</td>";
        echo "<td>".$row->keluarpada."</td>";
        echo "<td>".$row->nama_dokter."</td>";
		echo "<td>".$row->golongan."</td>";
		echo "<td>".$row->nosep."</td>";
?>
	<td class="text-center">
		<button data-json="<?= strtr(rawurlencode(json_encode($row)), $revert);?>" onclick="klaim_bpjs(this);" class="btn btn-sm btn-success ">Kirim</button>
	</td>
<?php
		echo "</tr>";
	}
}
?>

