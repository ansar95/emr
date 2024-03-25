

<?php
	if ($dtsoaphistory == NULL) {
?>
	<tr>
		<td colspan="100%" class="text-center">
			Belum Ada Data SOAP
		</td>
	</tr>
<?php } else {
		$no = 1;
		$jmlt = 0;
		foreach ($dtsoaphistory as $row) {
			$kode_dokter_psoap=$row->kode_dokter;
?>
			<tr onclick="openSoapFormx('<?php echo $row->id;?>','<?php echo $row->kode_dokter;?>')">
			<?php 
				$namabulan3 = substr(nama_bulan($row->tanggal), 0, 3);
				$tanggal = date('d', strtotime($row->tanggal));
				$tahun = date('Y', strtotime($row->tanggal));
			?>
				<td width="15%" valign="top">
					<div class="transaction-date text-center rounded p-2" style="border: 1px solid #E9EADD; color: #8E0B37;">
						<small class="d-block"><?php echo strtoupper($namabulan3);?></small>
						<span class="h6"><?php echo strtoupper($tanggal);?></span>
						<small class="d-block"><?php echo strtoupper($tahun);?></small>
					</div>
				</td>
				<td width="85%">
				<?php 
					echo '<strong style="color: Navy; font-size: 13px;">' . tanggaldua($row->tanggal) . '</strong><br>';
					echo $row->nama_unit. "<br>";
					echo $row->nama_dokter. "<br>";
					if ($row->keluhanutama != null) {echo '<span style="color: darkred;">Keluhan Utama : </span><strong>' . $row->keluhanutama . '<br></strong>';} 
					if ($row->riwayatsekarang != null) {echo '<span style="color: darkred;">Riwayat Sekarang : </span><strong>'.$row->riwayatsekarang . "<br></strong>";} 
					if ($row->riwayatdahulu != null) {echo '<span style="color: darkred;">Riwayat Dahulu : </span><strong>'.$row->riwayatdahulu . "<br></strong>";} 
					if ($row->alergi != null) {echo '<span style="color: darkred;">Alergi : </span><strong>'.$row->alergi . "<br></strong>";} 
					if ($row->suhu != 0) {echo '<span style="color: darkred;">Suhu : </span><strong>'.$row->suhu . "</strong><br></strong>";} 
					if ($row->tinggi != 0) {echo '<span style="color: darkred;">Tinggi : </span><strong>'.$row->tinggi . "<br></strong>";} 
					if ($row->berat != 0) {echo '<span style="color: darkred;">Berat : </span><strong>'.$row->berat . "<br></strong>";} 
					if ($row->respirasi != 0) {echo '<span style="color: darkred;">Respirasi : </span><strong>'.$row->respirasi . "<br></strong>";} 
					if ($row->nadi != 0) {echo '<span style="color: darkred;">Nadi : </span><strong>'.$row->nadi . "<br></strong>";} 
					if ($row->spo2 != 0) {echo '<span style="color: darkred;">SpO2 : </span><strong>'.$row->spo2 . "<br></strong>";} 
					if ($row->gcs != null) {echo '<span style="color: darkred;">GCS : </span><strong>'.$row->gcs . "<br></strong>";} 
					// if ($row->kesadaran != null) {echo '<span style="color: darkred;">Kesadaran : </span><strong>'.$row->kesadaran . "<br>";} 
					if ($row->kesadaran != null && $row->kesadaran != '-' && $row->kesadaran !='') {echo '<span style="color: darkred;">Kesadaran : </span><strong>'.$row->kesadaran . "<br>";} 
					if ($row->kesadaranlain != null) {echo '<span style="color: darkred;">Keterangan : </span><strong>'.$row->kesadaranlain . "<br></strong>";} 
					if ($row->objektif != null) {echo '<span style="color: darkred;">Objektif : </span><strong>'.$row->objektif . "<br></strong>";} 
					if ($row->assesment != null) {echo '<span style="color: darkred;">Assesment : </span><strong>'.$row->assesment . "<br></strong>";} 
					if ($row->plan != null) {echo '<span style="color: darkred;">Plan : </span><strong>'.$row->plan . "<br></strong>";} 
					if ($row->instruksi != null) {echo '<span style="color: darkred;">Instruksi : </span><strong>'.$row->instruksi . "<br></strong>";} 
					if ($row->evaluasi != null) {echo '<span style="color: darkred;">Evaluasi : </span><strong>'.$row->evaluasi . "<br></strong>";} 
					if ($row->diagnosa != null) {echo '<span style="color: darkred;">Diagnosa : </span><strong>'.$row->diagnosa . "<br></strong>";} 
					if ($row->konsuldokter != null) {echo '<span style="color: darkred;">Catatan Konsul Dokter : </span><strong>'.$row->konsuldokter . "<br></strong>";} 
					echo "<br>";	
				?>
				</td>
			<tr>
<?php
		}
	}
?>



<script>
function openSoapFormx(id,kodeDokter) {
	var no_rm = document.getElementById("no_rm").value;
	var kode_dokter = document.getElementById("kode_dokter").value;
	if (kode_dokter == kodeDokter) {
		$.ajax({
			url: "<?php echo site_url();?>/rme/panggilSoapDokter",
			type: "GET",
			data : {
					id : id, 
					kode_dokter : kode_dokter, 
					no_rm : no_rm
					},
			success : function(ajaxData){
				// console.log(ajaxData);
				$("#formmodal").html(ajaxData);
                    $("#formmodal").modal('show', {
                        backdrop: 'true'
                    });
                    // modaldetailtutup();
			},
			error: function(ajaxData) {
				$.notify("Gagal Memproses Data", "error");
			}
		}); 	
	} else {
		// alert('tidak dapat edit data ini')
		swal({
			// title: "opps",
			text: "Tidak bisa melakukan perubahan SOAP \n dari dokter lain",
			icon: "error",
			button: true
		});
	}
}

</script>
