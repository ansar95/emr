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
	$i=1;
	foreach($hasil as $row) {
		echo "<tr><td>".$i++."</td>";
		echo "<td>".$row->no_rm."</td>";
		echo "<td>".$row->title."</td>";
		echo "<td>".$row->nama_pasien."</td>";
		// echo "<td>".$row->alamat."</td>";
		echo "<td>".$row->nama_unit."</td>";
		echo "<td>".tanggaldua($row->tgl_masuk)."</td>";
		echo "<td>".$row->golongan."</td>";
		echo "<td>".$row->rujukan."</td>";
		echo "<td>".$row->notransaksi."</td>";
?>

<!-- <div id="klik_kanan" oncontextmenu="klik(); return false;" style="background-color:#930; width:100%; height:300px;"></div>????? -->

	<!-- <td class="text-center">
		<button onclick="cetakkarcis(<?php echo $row->id;?>);" class="btn-sm btn-success ">K</i></a>
		<button onclick="cetaktracer(<?php echo $row->id;?>);" class="btn-sm btn-info ">T</i></a>
		<button onclick="cetakmr2(<?php echo $row->id;?>);" class="btn-sm btn-primary ">M</i></a>
		<button onclick="cetakformulir(<?php echo $row->id;?>);" class="btn-sm btn-danger ">F</i></a>
		<button onclick="cetakgelang(<?php echo $row->id;?>);" class="btn-sm btn-warning ">G</i></a>
	</td> -->
	<!-- dirubah pembacaan ke register_detail.id untuk cetakan di erawat inap -->
	<td class="text-center">
		<!-- <button onclick="cetakkarcis(<?php echo $row->iddetail;?>);" class="btn-sm btn-success ">K</i></a>
		<button onclick="cetakmr2(<?php echo $row->iddetail;?>);" class="btn-sm btn-primary ">M</i></a>
		<button onclick="cetakformulir(<?php echo $row->iddetail;?>);" class="btn-sm btn-danger ">F</i></a> -->
		<button onclick="cetaktracer(<?php echo $row->iddetail;?>);" class="btn btn-sm btn-info ">T</button>
		<button onclick="cetakregisranap(<?php echo $row->iddetail;?>);" class="btn btn-sm btn-primary ">Regis</button>
		<!-- <button onclick="cetaksr1(<?php echo $row->iddetail;?>);" class="btn btn-sm btn-primary ">R1.1</button> -->
		<!-- <button onclick="cetaksr2(<?php echo $row->iddetail;?>);" class="btn btn-sm btn-danger ">R1.2</button> -->
		<button onclick="cetakgelang(<?php echo $row->iddetail;?>);" class="btn btn-sm btn-warning ">G</button>
	</td>
	<td class="text-center">
		<!-- <button onclick="sampul(<?php echo $row->id;?>);" class="btn-sm btn-success "><i class="fa fa-print"></button> -->
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
		<button onclick="buatsep(<?php echo $row->id;?>);" class="btn btn-sm btn-success "><i class="fa fa-pen"></i></button>
        <button onclick="editsep(<?php echo $row->id;?>);" class="btn btn-sm btn-secondary "><i class="fa fa-edit"></i></button>
        <button onclick="hapussep(<?php echo $row->id;?>);" class="btn btn-sm btn-danger "><i class="fa fa-trash"></i></button>

		<?php
		}
		?>
	</td>
<?php
		echo "</tr>";
	}
}
?>
