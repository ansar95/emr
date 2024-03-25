<?php

use SebastianBergmann\Environment\Console;

if ($hasil == null) {
?>
<tr>
	<td colspan="17" class="text-center">
		Tidak Ada Data
	</td>
</tr>
<?php
} else {
	$i=1;
	foreach($hasil as $row) {
		
		if ( $row->status==0 ){$warna='#FFFFFF';}	
		if ( $row->pindah==1 ){$warna='#C0C0C0';}	
		if ( $row->pulang==1 ){$warna='#FFFF00';}	

		// echo "<tr><td bgcolor='$warna' >".$i++."</td>";
		var_dump($row);
		echo "<tr><td bgcolor='$warna'>".$row->no_rm."</td>";
		echo "<td bgcolor='$warna'>".$row->title."</td>";
		echo "<td bgcolor='$warna'>".$row->nama_pasien."</td>";
		if($row->kode_kelas_hak != "none"){
			echo "<td bgcolor='$warna'><font color='red'>".$row->nama_kamar."</td>";
		} else {
			echo "<td bgcolor='$warna'>".$row->nama_kamar."</td>";
		}
		
		echo "<td bgcolor='$warna'>".$row->nama_kelas."</td>";
		echo "<td bgcolor='$warna'>".tanggaldua($row->tgl_masuk_kamar)."</td>";
		echo "<td bgcolor='$warna'>".$row->golongan."</td>";		
		echo "<td bgcolor='$warna'>".$row->notransaksi."</td>";
		echo "<td bgcolor='$warna' style='text-align:right;color : #000;' class='".comparebillingestimate($row->tarifbilling, $row->tarif_estimasi)."' >".groupangka($row->tarifbilling)."</td>";
		// echo "<td bgcolor='$warna'>".$row->diag_estimasi."</td>";
		echo "<td bgcolor='$warna' style='text-align:right'>".groupangka($row->tarif_estimasi)."</td>";
?>

	<td class="text-center px-0">
		<button onclick="cetakblling('<?php echo $row->idreg;?>_<?php echo $row->notransaksi;?>');" class="btn-sm btn-danger btn" data-toggle="tooltip" data-placement="right" title="Hitung Billing">B</i></button>
		<button onclick="panggilEstimasi('<?php echo $row->idreg;?>');" class="btn-sm btn-info btn" class="btn-sm btn-danger btn" data-toggle="tooltip" data-placement="right" title="Estimasi Nilai Billing">E</i></a>
		<button onclick="panggildokter('<?php echo $row->id;?>_<?php echo $row->kode_dokter;?>');" class="btn-sm btn-warning btn" data-toggle="tooltip" data-placement="right" title="Pilih Dokter">D</i></button>
        <button onclick="panggilkamar('<?php echo $row->id;?>_<?php echo $row->kode_kamar;?>');" class="btn-sm btn-primary btn" data-toggle="tooltip" data-placement="right" title="Pilih Kamar">K</i></button>
		<button onclick="panggilproses('<?php echo $row->notransaksi;?>_<?php echo $row->kode_dokter;?>_<?php echo $row->nama_kamar;?>');" class="btn-sm btn-success btn text-dark">Proses</i></button>
	</td>
	<td class="text-center bg-white">
		<?php if($row->golongan == "BPJS") { ?>
			<button onclick="buatsurkon(<?php echo $row->id;?>);" class="btn btn-sm btn-primary "><i class="fa fa-pen"></i></button>
        	<button onclick="editsurkon(<?php echo $row->id;?>);" class="btn btn-sm btn-warning "><i class="fa fa-edit"></i></button>
        	<button onclick="hapussurkon(<?php echo $row->id;?>);" class="btn btn-sm btn-danger "><i class="fa fa-edit"></i></button>
		<?php } ?>	
		</td>	
<?php
		echo "</tr>";
	}
}
?>
