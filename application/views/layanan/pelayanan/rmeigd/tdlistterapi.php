<?php

if ($dtterapi == NULL) {
	?>
	<tr>
		<td colspan="100%" class="text-center">
			Belum Ada Data
		</td>
	</tr>
<?php } else {
	$no = 1;
	$jmlt = 0;
	foreach ($dtterapi as $row) {
		$kode_dokter_psoap = $row->kode_dokter;
		$kode_dokter_form_periksa = $dataPasien->kode_dokter;
		if ($kode_dokter_form_periksa == $kode_dokter_psoap) {
			$warnabackground = "#FFFFFF";
		} else {
			$warnabackground = "#B0C4DE";
		}
		?>
		<tr onclick="bukaformterapi('<?php echo $row->id; ?>','<?php echo $row->kode_dokter; ?>')">
			<td width="10%" valign="top">
			</td>
			<td width="90%" valign="top">
				<?php
				echo '<strong style="color: Navy; font-size: 13px;">' . tanggaldua($row->tanggal) . ' | ' . $row->jam . '</strong><br>';
				echo $row->nama_dokter . "<br>";
				if ($row->terapi != null) {
					echo '<span style="color: darkred;">Terapi : </span><strong>' . $row->terapi . '<br></strong>';
				}
				if ($row->evaluasi != null) {
					echo '<span style="color: darkred;">Evaluasi : </span><strong>' . $row->evaluasi . "<br></strong>";
				}
				if ($row->oleh != null) {
					echo '<span style="color: darkred;">Instruksi Oleh : </span><strong>' . $row->oleh . "<br></strong>";
				}
				echo "<br>";
				?>
			</td>
		<tr>
			<?php
	}
}
?>