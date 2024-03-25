<?php
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
		echo "<tr><td>".$row->no_rm."</td>";
		echo "<td>".$row->nama_pasien."</td>";
		echo "<td>".$row->alamat."</td>";
		echo "<td>".$row->nama_unit."</td>";
		echo "<td>".tanggaldua($row->tgl_masuk)."</td>";
		echo "<td>".$row->golongan."</td>";
		echo "<td>".$row->rujukan."</td>";
		echo "<td>".$row->notransaksi."</td>";
?>
	<td class="text-center">
		<!-- <a onclick="cetakkarcis(<?php echo $row->id;?>);" class="btn-sm btn-success btn-flat">K</i></a>
		<a onclick="cetakopd(<?php echo $row->id;?>);" class="btn-sm btn-primary btn-flat">O</i></a>
		<a onclick="cetaksjp(<?php echo $row->id;?>);" class="btn-sm btn-danger btn-flat">S</i></a> -->
		<a onclick="cetakantrian(<?php echo $row->id;?>);" class="btn-sm btn-success btn-flat">A</i></a>
		<a onclick="cetaktracer(<?php echo $row->id;?>);" class="btn-sm btn-info btn-flat">T</i></a>
		<a onclick="cetaksr1(<?php echo $row->id;?>);" class="btn-sm btn-danger btn-flat">R1.1</i></a> 
		<a onclick="cetaksr2(<?php echo $row->id;?>);" class="btn-sm btn-danger btn-flat">R1.2</i></a> 
		<a onclick="cetakgelang(<?php echo $row->id;?>);" class="btn-sm btn-warning btn-flat">G</i></a>
	</td>
	<td class="text-center">
		<?php 
		if ($row->billing == 0) {
		?>
		<a onclick="panggileditregis(<?php echo $row->id;?>);" class="btn-sm btn-info btn-flat"><i class="fa fa-edit"></i></a>
		<a onclick="panggilhapusregis(<?php echo $row->id;?>);" class="btn-sm btn-danger btn-flat"><i class="fa fa-trash"></i></a>
		<?php
		}
		?>
	</td>
<?php
		echo "</tr>";
	}
}
?>
