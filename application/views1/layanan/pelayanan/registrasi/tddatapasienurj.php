<?php
$i=1;
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
		echo "<tr><td style='text-align:center'>".$i++."</td>";
		echo "<td>".$row->no_rm."</td>";
		echo "<td>".$row->title."</td>";
		echo "<td>".$row->nama_pasien."</td>";
		// echo "<td>".$row->alamat."</td>";
		echo "<td>".$row->nama_unit."</td>";
		echo "<td>".tanggaldua($row->tgl_masuk)."</td>";
		echo "<td>".$row->golongan."</td>";
		echo "<td>".$row->rujukan."</td>";
		echo "<td>".$row->notransaksi."</td>";
		echo "<td>".$row->user2."</td>";
?>
	<td class="text-center">
		<!-- <a onclick="cetakkarcis(<?php echo $row->id;?>);" class="btn-sm btn-success btn-flat">K</a>
		<a onclick="cetakopd(<?php echo $row->id;?>);" class="btn-sm btn-primary btn-flat">O</a>
		<a onclick="cetaksjp(<?php echo $row->id;?>);" class="btn-sm btn-danger btn-flat">S</a> -->
		<button onclick="cetakantrian(<?php echo $row->id;?>);" class="btn btn-sm btn-primary  ">T</button>
		<!-- <button onclick="cetaktracer(<?php echo $row->id;?>);" class="btn btn-sm btn-primary  ">T</button>
		<button onclick="cetaksr1(<?php echo $row->id;?>);" class="btn btn-sm btn-danger  ">R1.1</button> 
		<button onclick="cetaksr2(<?php echo $row->id;?>);" class="btn btn-sm btn-danger  ">R1.2</button>  -->
		<!-- <?php if (TRIM($row->nama_unit) == 'HEMODIALISA') { ?> -->
		<!-- <button onclick="cetakgelang(<?php echo $row->id;?>);" class="btn btn-sm btn-warning  ">G</button> -->
		<!-- <?php } else { ?> -->
		<!-- <button onclick="" class="btn btn-sm btn-dark btn-flat  ">.</button> -->
		<!-- <?php } ?> -->
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
		if ($row->golongan == 'BPJS') {
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
