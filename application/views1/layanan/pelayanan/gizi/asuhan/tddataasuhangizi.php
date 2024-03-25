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
	$i=1;
	foreach($hasil as $row) {
		echo "<tr><td>".$i++."</td>";
		echo "<td>".$row->nama_kamar."</td>";
        echo "<td>".$row->nama_kelas."</td>";
		echo "<td align='center'>".$row->no_rm."</td>";
		echo "<td>".$row->nama_pasien."</td>";
		echo "<td>".$row->golongan."</td>";
		echo "<td>".$row->bentuk."</td>";
		echo "<td>".$row->pagi."</td>";
		echo "<td>".$row->siang."</td>";
		echo "<td>".$row->malam."</td>";
?>
	<td class="text-center">
		<button onclick="prosesgizi(<?php echo $row->id;?>);" class="btn btn-sm btn-primary btn-flat">Proses</button>
	</td>
	<td class="text-center">
		<button onclick="hapuspasien(<?php echo $row->id?>);" class="btn btn-sm btn-danger btn-flat">Hapus</button>
	</td>
	<td class="text-center">
		<button onclick="cetaketiketgizipagi(<?php echo $row->id?>);" class="btn btn-sm btn-success btn-flat">P</button>
		<button onclick="cetaketiketgizisiang(<?php echo $row->id?>);" class="btn btn-sm btn-warning btn-flat">S</button>
		<button onclick="cetaketiketgizimalam(<?php echo $row->id?>);" class="btn btn-sm btn-info btn-flat">M</button>
		<button onclick="cetaketiketgizisnack(<?php echo $row->id?>);" class="btn btn-sm btn-primary btn-flat">K</button>
	</td>
<?php
		echo "</tr>";
	}
}
?>

