<link rel="stylesheet" href="../../assets/template_baru/dist/vendors/icheck/skins/all.css">

<div class="card">
	<div class="col-12 mt-4 ml-3">
		<div class="w-sm-100 mr-auto">
			<h6 class="mb-0" style="color: navy;">RESUME MEDIS</h6>


		</div>
	</div>
	<div class="col-12 mt-2 ml-3">
		<div class="form-group row col-spacing-row mt-3">
			<div class="col-md-1">
				<label class="col-spacing-row">Anamnesis</label>
				<button class="btn btn-sm" id="tomboleditanamnesis" name="tomboleditanamnesis" style="background-color: #FFFFFF; color: #330066;"><i class="icon-pencil"style="font-size: 14px;"></i></button>
			</div>		
			<div class="col-md-7">
				<textarea rows="5" name="anamnesis" id="anamnesis" class="form-control" style="border: 1px solid #ccc;"><?php echo $dtlambarResumeMedis->anamnesis?></textarea>
			</div>
		</div>		
	</div>
	<div class="col-12 mt-2 ml-3">
		<div class="form-group row col-spacing-row mt-3">
			<div class="col-md-1">
				<label class="col-spacing-row">Hasil Pemeriksaan Fisik</label>
				<button class="btn btn-sm" id="tomboleditfisik" name="tomboleditfisik" style="background-color: #FFFFFF; color: #330066;"><i class="icon-pencil"style="font-size: 14px;"></i></button>
			</div>		
			<div class="col-md-7">
				<textarea rows="5" name="fisik" id="fisik" class="form-control" style="border: 1px solid #ccc;"><?php echo $dtlambarResumeMedis->fisik?></textarea>
			</div>
		</div>		
	</div>
	<div class="col-12 mt-2 ml-3">
		<div class="form-group row col-spacing-row mt-3">
			<div class="col-md-1">
				<label class="col-spacing-row">Pemeriksaan Penunjang</label>
				<!-- <button class="btn btn-sm" id="tomboleditpenunjang" name="tomboleditpenunjang" style="background-color: #FFFFFF; color: #330066;"><i class="icon-pencil"style="font-size: 14px;"></i></button> -->
			</div>		
			<div class="col-md-7">
				<textarea rows="5" name="penunjang" id="penunjang" class="form-control" style="border: 1px solid #ccc;"><?php echo $dtlambarResumeMedis->penunjang?></textarea>
			</div>
		</div>		
	</div>
	<div class="col-12 mt-2 ml-3">
		<div class="form-group row col-spacing-row mt-3">
			<div class="col-md-1">
				<label class="col-spacing-row">Diagnosis</label>
				<button class="btn btn-sm" id="tomboleditdiagnosis" name="tomboleditdiagnosis" style="background-color: #FFFFFF; color: #330066;"><i class="icon-pencil"style="font-size: 14px;"></i></button>
			</div>		
			<div class="col-md-7">
				<textarea rows="4" name="diagnosis" id="diagnosis" class="form-control" style="border: 1px solid #ccc;"><?php echo $dtlambarResumeMedis->diagnosis?></textarea>
			</div>
		</div>		
	</div>
	<div class="col-12 mt-2 ml-3">
		<div class="form-group row col-spacing-row mt-3">
			<div class="col-md-1">
				<label class="col-spacing-row">Terapi</label>
				<button class="btn btn-sm" id="tomboleditterapi" name="tomboleditterapi" style="background-color: #FFFFFF; color: #330066;"><i class="icon-pencil"style="font-size: 14px;"></i></button>
			</div>		
			<div class="col-md-7">
				<textarea rows="5" name="terapi" id="terapi" class="form-control" style="border: 1px solid #ccc;"><?php echo $dtlambarResumeMedis->terapi?></textarea>
			</div>
		</div>		
	</div>
	<div class="col-12 mt-2 ml-3">
		<div class="form-group row col-spacing-row mt-3">
			<div class="col-6 text-left">
				<button onclick="saveresume()" class="btn btn-primary" data-bs-dismiss="modal">Simpan</button>
				<button onclick="cetakresume()" class="btn btn-secondary" data-bs-dismiss="modal">Cetak</button>
			</div>
			<div class="col-6">
				<!-- <button onclick="Batal()" class="btn btn-danger">Cetak</button> -->
			</div>
		</div>	
	</div>	
	<br>
	<br>
	<br>
</div>


<script>

	

	function saveresume() {
		var no_rm = document.getElementById("no_rm").value;
		var notransaksi = document.getElementById("notransaksi").value;
		var kode_dokter = document.getElementById("kode_dokter").value;
		var anamnesis = document.getElementById("anamnesis").value;
		var fisik = document.getElementById("fisik").value;
		var penunjang = document.getElementById("penunjang").value;
		var diagnosis = document.getElementById("diagnosis").value;
		var terapi = document.getElementById("terapi").value;
		console.log(no_rm);
		console.log(notransaksi);
		console.log(kode_dokter);
		console.log(penunjang);
		console.log(terapi);
		$.ajax({
			url: "<?php echo site_url(); ?>/rme/simpanresumerajal",
			type: "GET",
			data: {
				no_rm: no_rm,
				notransaksi : notransaksi,
				kode_dokter : kode_dokter,
				anamnesis : anamnesis,
				fisik : fisik,
				penunjang : penunjang,
				diagnosis : diagnosis,
				terapi : terapi
			},
			success: function (ajaxData) {
				swal('Simpan Data Resume Berhasil');
				
			},
			error: function (ajaxData) {
				console.log(ajaxData);
			}
		});
	}

	
	function cetakresume() {
		var no_rm = document.getElementById("no_rm").value;
		var notransaksi = document.getElementById("notransaksi").value;
		var kode_dokter = document.getElementById("kode_dokter").value;
        window.open("<?php echo site_url();?>/rme/cetakResumeRajal/"+no_rm+"/"+notransaksi+"/"+kode_dokter+"", '_blank');
    }

	function cetakresume_old() {
		var no_rm = document.getElementById("no_rm").value;
		var notransaksi = document.getElementById("notransaksi").value;
		var kode_dokter = document.getElementById("kode_dokter").value;
		var anamnesis = document.getElementById("anamnesis").value;
		var fisik = document.getElementById("fisik").value;
		var penunjang = document.getElementById("penunjang").value;
		var diagnosis = document.getElementById("diagnosis").value;
		var terapi = document.getElementById("terapi").value;
		console.log(no_rm);
		console.log(notransaksi);
		console.log(kode_dokter);
		console.log(penunjang);
		$.ajax({
			url: "<?php echo site_url(); ?>/rme/cetakResumeRajal",
			type: "GET",
			data: {
				no_rm: no_rm,
				notransaksi : notransaksi,
				kode_dokter : kode_dokter,
				anamnesis : anamnesis,
				fisik : fisik,
				penunjang : penunjang,
				diagnosis : diagnosis,
				terapi : terapi
			},
			success: function (ajaxData) {
				// swal('Simpan Data Resume Berhasil');
				
			},
			error: function (ajaxData) {
				console.log(ajaxData);
			}
		});
	}


	$(document).ready(function () {
		$("#tomboleditdiagnosis").on("click", function (e) {
			// Panggil fungsi panggilFormTriase saat tab diklik
			var no_rm = document.getElementById("no_rm").value;
			var notransaksi = document.getElementById("notransaksi").value;
			var kode_dokter = document.getElementById("kode_dokter").value;

			$.ajax({
				url: "<?php echo site_url(); ?>/rme/panggilDiagnosisResume",
				type: "GET",
				data: {
					no_rm: no_rm,
					notransaksi: notransaksi,
					kode_dokter : kode_dokter
				},
				success: function (ajaxData) {
					console.log(ajaxData);

					// Parsing string JSON menjadi objek JavaScript
					var data = JSON.parse(ajaxData);

					// Membuat HTML dari nilai nodaftar dan diagnosa
					var htmlContent = '';
					data.dtdiagnosaresume.forEach(function(item) {
						htmlContent += '' + item.nodaftar + ', Diagnosa: ' + item.diagnosa + '\n';
					});
					htmlContent += '';

					// Menampilkan hasil dalam elemen dengan ID 'diagnosis' menggunakan jQuery
					$("#diagnosis").html(htmlContent);

									},
									error: function () {
										$.notify("Gagal Memproses Data", "error");
									}
								});
							});


	});



	$(document).ready(function () {
		$("#tomboleditanamnesis").on("click", function (e) {
			// Panggil fungsi panggilFormTriase saat tab diklik
			var no_rm = document.getElementById("no_rm").value;
			var notransaksi = document.getElementById("notransaksi").value;
			var kode_dokter = document.getElementById("kode_dokter").value;

			$.ajax({
				url: "<?php echo site_url(); ?>/rme/panggilRiwayat",
				type: "GET",
				data: {
					no_rm: no_rm,
					notransaksi: notransaksi,
					kode_dokter : kode_dokter
				},
				success: function (ajaxData) {
					console.log(ajaxData);

					// Parsing string JSON menjadi objek JavaScript
					var data = JSON.parse(ajaxData);
					console.log(data);

					// Membuat HTML dari nilai nodaftar dan diagnosa
					var htmlContent = '';
					if (data.dtpsoap.keluhanutama != '') {
						htmlContent += '' + 'Keluhan Utama: ' + data.dtpsoap.keluhanutama+ '\n';
					}
					if (data.dtpsoap.riwayatsekarang != '') {
						htmlContent += '' + 'Riwayat Sekarang : ' + data.dtpsoap.riwayatsekarang+ '\n';
					}
					if (data.dtpsoap.riwayatdahulu != '') {
						htmlContent += '' + 'Riwayat Sebelumnya : ' + data.dtpsoap.riwayatdahulu+ '\n';
					}	

					// // Menampilkan hasil dalam elemen dengan ID 'diagnosis' menggunakan jQuery
					$("#anamnesis").html(htmlContent);

									},
									error: function () {
										$.notify("Gagal Memproses Data", "error");
									}
								});
							});

							
	});

	$(document).ready(function () {
		$("#tomboleditterapi").on("click", function (e) {
			// Panggil fungsi panggilFormTriase saat tab diklik
			var no_rm = document.getElementById("no_rm").value;
			var notransaksi = document.getElementById("notransaksi").value;
			var kode_dokter = document.getElementById("kode_dokter").value;

			$.ajax({
				url: "<?php echo site_url(); ?>/rme/panggilTerapiResep",
				type: "GET",
				data: {
					no_rm: no_rm,
					notransaksi: notransaksi,
					kode_dokter : kode_dokter
				},
				success: function (ajaxData) {
					console.log(ajaxData);

					// Parsing string JSON menjadi objek JavaScript
					var data = JSON.parse(ajaxData);

					// Membuat HTML dari nilai
					var htmlContent = '';
					data.dtresepresume.forEach(function(item) {
						htmlContent += '' + item.namaobat.trim() ;
						if ( item.pagi != '') { htmlContent += ', Pagi : ' + item.pagi;};
						if ( item.siang != '') { htmlContent += ', Siang : ' + item.siang;};
						if ( item.malam != '') { htmlContent += ', Malam : ' + item.malam;};
						htmlContent += ' ' + item.takaran ;
						if ( item.keterangan != '') { htmlContent += ' ' + item.keterangan; };
						if ( item.caramakan != '') { htmlContent += '  ' + item.caramakan + ' makan '; };
						htmlContent += '' + '\n';
					});
					htmlContent += '';

					// Menampilkan hasil dalam elemen dengan ID 'diagnosis' menggunakan jQuery
					$("#terapi").html(htmlContent);

									},
									error: function () {
										$.notify("Gagal Memproses Data", "error");
									}
								});
							});


	});

	
	$(document).ready(function () {
		$("#tomboleditfisik").on("click", function (e) {
			// Panggil fungsi panggilFormTriase saat tab diklik
			var no_rm = document.getElementById("no_rm").value;
			var notransaksi = document.getElementById("notransaksi").value;
			var kode_dokter = document.getElementById("kode_dokter").value;

			$.ajax({
				url: "<?php echo site_url(); ?>/rme/panggilRiwayat",
				type: "GET",
				data: {
					no_rm: no_rm,
					notransaksi: notransaksi,
					kode_dokter : kode_dokter
				},
				success: function (ajaxData) {
					console.log(ajaxData);

					// Parsing string JSON menjadi objek JavaScript
					var data = JSON.parse(ajaxData);
					console.log(data);

					// Membuat HTML dari nilai nodaftar dan diagnosa
					var htmlContent = '';
					if (data.dtpsoap.suhu != '') {
						htmlContent += '' + 'Suhu : ' + data.dtpsoap.suhu+ '\n';
					}
					if (data.dtpsoap.tinggi != '') {
						htmlContent += '' + 'Tinggi Badan : ' + data.dtpsoap.tinggi+ '\n';
					}
					if (data.dtpsoap.tensi != '') {
						htmlContent += '' + 'Tensi : ' + data.dtpsoap.tensi+ '\n';
					}	
					if (data.dtpsoap.respirasi != '') {
						htmlContent += '' + 'Respirasi : ' + data.dtpsoap.respirasi+ '\n';
					}	
					if (data.dtpsoap.nadi != '') {
						htmlContent += '' + 'Nadi : ' + data.dtpsoap.nadi+ '\n';
					}	
					if (data.dtpsoap.spo2 != '') {
						htmlContent += '' + 'SPO2 : ' + data.dtpsoap.spo2+ '\n';
					}	
					if (data.dtpsoap.gcs != '') {
						htmlContent += '' + 'GCS : ' + data.dtpsoap.gcs+ '\n';
					}	
					if (data.dtpsoap.kesadaran != '') {
						htmlContent += '' + 'Kesadaran : ' + data.dtpsoap.kesadaran+ '\n';
					}	
					if (data.dtpsoap.kesadaranlain != '') {
						htmlContent += '' + 'Kesadaran : ' + data.dtpsoap.kesadaranlain+ '\n';
					}	
					// // Menampilkan hasil dalam elemen dengan ID 'diagnosis' menggunakan jQuery
					$("#fisik").html(htmlContent);

									},
									error: function () {
										$.notify("Gagal Memproses Data", "error");
									}
								});
							});

							
	});
</script>
