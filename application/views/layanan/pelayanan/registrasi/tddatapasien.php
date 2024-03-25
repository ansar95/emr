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
		<button onclick="panggillihat('<?php echo $row->id;?>'');" class="btn btn-sm btn-success"><i class="far fa-eye"></i></button>
		<button onclick="panggileditpasien();" class="btn btn-sm btn-info btn-flat"><i class="far fa-edit"></i></button>
		<button class="btn-sm btn-danger btn-flat"><i class="far fa-trash"></i></button>
	</td>
<?php
		echo "</tr>";
	}
}
?>
