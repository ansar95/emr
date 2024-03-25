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
		echo "<tr><td>".$row->nama_pasien."</td>";
		echo "<td>".$row->no_rm."</td>";
		echo "<td>".$row->nama_pgl."</td>";
		echo "<td>".$row->alamat."</td>";
		echo "<td>".$row->telp."/".$row->hp."</td>";
		echo "<td>".$row->golongan."</td>";
?>
	<td class="text-center">
		<button onclick="panggillihat(<?php echo $row->no_rm;?>);" class="btn btn-sm btn-info"><i class="fa fa-eye "></i></button>
		<button onclick="panggilinputuri(<?php echo $row->id;?>);" class="btn btn-sm btn-success ">INAP</button>
	</td>
<?php
		echo "</tr>";
	}
}
?>
