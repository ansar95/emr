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
		echo "<td>".$row->title."</td>";
		echo "<td>".$row->nama_pasien."</td>";
		// echo "<td>".$row->alamat."</td>";
		echo "<td>".$row->nama_unit."</td>";
		echo "<td>".tanggaldua($row->tgl_masuk)."</td>";
		echo "<td>".$row->golongan."</td>";
		echo "<td>".$row->notransaksi."</td>";
		echo "<td>".$row->nosep."</td>";
?>
	<td class="text-center">
		<!-- <button onclick="cetakkarcis(<?php echo $row->id;?>);" class="btn-sm btn-success ">K</i></a>
		<button onclick="cetaktracer(<?php echo $row->id;?>);" class="btn-sm btn-info ">T</i></a>
		<button onclick="cetakopd(<?php echo $row->id;?>);" class="btn-sm btn-primary ">O</i></a>
		<button onclick="cetaksjp(<?php echo $row->id;?>);" class="btn-sm btn-danger ">S</i></a> -->		
		<!-- <button onclick="cetaktracer(<?php echo $row->id;?>);" class="btn btn-sm btn-info ">T</button> -->
		<?php if ($row->golongan == 'KECELAKAAN') { ?>
			<button onclick="cetakregis_sjp(<?php echo $row->id;?>);" class="btn btn-sm btn-primary ">SJP</button>
		<?php } else { ?>
			<!-- <button onclick="cetakregis(<?php echo $row->id;?>);" class="btn btn-sm btn-primary ">Regis</button> -->
		<?php } ?>
		<!-- <button onclick="cetaksr1(<?php echo $row->id;?>);" class="btn btn-sm btn-primary ">R1.1</button>
		<button onclick="cetaksr2(<?php echo $row->id;?>);" class="btn btn-sm btn-danger ">R1.2</button> -->
		<!-- <button onclick="cetakgelang(<?php echo $row->id;?>);" class="btn btn-sm btn-warning ">Gelang</button> -->
	</td>

	<td class="text-center">
		<?php 
		if ($row->billing == 0) {
		?>
		<button onclick="panggileditregis(<?php echo $row->id;?>);" class="btn btn-sm btn-info "><i class="fa fa-edit"></i></button>
        <button onclick="panggilhapusregis(<?php echo $row->id;?>);" class="btn btn-sm btn-danger "><i class="fa fa-trash"></i></button>
		<?php
		}
		?>
	</td>
	<td class="text-center">
		<?php 
		if ($row->billing == 0) {
		?>
		<button onclick="buatsep(<?php echo $row->id;?>);" class="btn btn-sm btn-success "><i class="fa fa-file"></i></button>
        <button onclick="editsep(<?php echo $row->id;?>);" class="btn btn-sm btn-secondary "><i class="fa fa-edit"></i></button>
        <button onclick="hapussep(<?php echo $row->id;?>);" class="btn btn-sm btn-secondary "><i class="fa fa-trash"></i></button>
		<?php
		}
		?>
	</td>
	<td class="text-center">
		<?php 
		if ($row->billing == 0) {
		?>
		<button onclick="buatspri(<?php echo $row->id;?>);" class="btn btn-sm btn-primary "><i class="fa fa-pen"></i></button>
        <button onclick="editspri(<?php echo $row->id;?>);" class="btn btn-sm btn-warning "><i class="fa fa-edit"></i></button>
        <button onclick="hapusspri(<?php echo $row->id;?>);" class="btn btn-sm btn-secondary "><i class="fa fa-trash"></i></button>

		<?php
		}
		?>
	</td>
<?php
		echo "</tr>";
	}
}
?>
