<link rel="stylesheet" href="../../assets/template_baru/dist/vendors/icheck/skins/all.css">

<div class="card">
	<div class="col-12 mt-4 ml-3">
		<div class="w-sm-100 mr-auto">
			<h6 class="mb-0" style="color: navy;">RESUME MEDIS RAWAT INAP</h6>
		</div>
	</div>
	<div class="col-12 mt-2 ml-3">
		<div class="form-group row col-spacing-row mt-3">
			<div class="col-md-2">
				<label class="col-spacing-row">Alasan Masuk Rumah Sakit</label>
				<button class="btn btn-sm" id="alasantombol" name="alasantombol" style="background-color: #FFFFFF; color: #330066;"><i class="icon-pencil"style="font-size: 14px;"></i></button>
			</div>		
			<div class="col-md-7">
				<textarea rows="5" name="alasan" id="alasan" class="form-control" style="border: 1px solid #ccc;"><?php echo $dtresumeranap->alasan?></textarea>
			</div>
		</div>		
	</div>
	<div class="col-12 mt-2 ml-3">
		<div class="form-group row col-spacing-row mt-3">
			<div class="col-md-2">
				<label class="col-spacing-row">Ringkasan Riwayat Penyakit </label>
				<button class="btn btn-sm" id="riwayattombol" name="riwayattombol" style="background-color: #FFFFFF; color: #330066;"><i class="icon-pencil"style="font-size: 14px;"></i></button>
			</div>		
			<div class="col-md-7">
				<textarea rows="5" name="riwayat" id="riwayat" class="form-control" style="border: 1px solid #ccc;"><?php echo $dtresumeranap->riwayat?></textarea>
			</div>
		</div>		
	</div>
	
	<div class="col-12 mt-2 ml-3">
		<div class="form-group row col-spacing-row mt-3">
			<div class="col-md-2">
				<label class="col-spacing-row">Pemeriksaan Fisik</label>
				<button class="btn btn-sm" id="fisiktombol" name="fisiktombol" style="background-color: #FFFFFF; color: #330066;"><i class="icon-pencil"style="font-size: 14px;"></i></button>
			</div>		
			<div class="col-md-7">
				<textarea rows="5" name="fisik" id="fisik" class="form-control" style="border: 1px solid #ccc;"><?php echo $dtresumeranap->fisik?></textarea>
			</div>
		</div>		
	</div>
	<div class="col-12 mt-2 ml-3">
		<div class="form-group row col-spacing-row mt-3">
			<div class="col-md-2">
				<label class="col-spacing-row">Pemeriksaan Penunjang</label>
				<button class="btn btn-sm" id="penunjangtombol" name="penunjangtombol" style="background-color: #FFFFFF; color: #330066;"><i class="icon-pencil"style="font-size: 14px;"></i></button>
			</div>		
			<div class="col-md-7">
				<textarea rows="5" name="penunjang" id="penunjang" class="form-control" style="border: 1px solid #ccc;"><?php echo $dtresumeranap->penunjang?></textarea>
			</div>
		</div>		
	</div>
	
	<div class="col-12 mt-2 ml-3">
		<div class="form-group row col-spacing-row mt-3">
			<div class="col-md-2">
				<label class="col-spacing-row">Terapi Pengobatan Selama di Rumah Sakit</label>
				<button class="btn btn-sm" id="obatdirstombol" name="obatdirstombol" style="background-color: #FFFFFF; color: #330066;"><i class="icon-pencil"style="font-size: 14px;"></i></button>
			</div>		
			<div class="col-md-7">
				<textarea rows="5" name="obatdirs" id="obatdirs" class="form-control" style="border: 1px solid #ccc;"><?php echo $dtresumeranap->obatdirs?></textarea>
			</div>
		</div>		
	</div>

	<div class="col-12 mt-2 ml-3">
		<div class="form-group row col-spacing-row mt-3">
			<div class="col-md-2">
				<label class="col-spacing-row">Konsul Antar Bagian</label>
				<button class="btn btn-sm" id="konsultombol" name="konsultombol" style="background-color: #FFFFFF; color: #330066;"><i class="icon-pencil"style="font-size: 14px;"></i></button>
			</div>		
			<div class="col-md-7">
				<textarea rows="5" name="konsul" id="konsul" class="form-control" style="border: 1px solid #ccc;"><?php echo $dtresumeranap->konsul?></textarea>
			</div>
		</div>		
	</div>

	<div class="col-12 mt-2 ml-3">
		<div class="form-group row col-spacing-row mt-3">
			<div class="col-md-2">
				<label class="col-spacing-row">Diagnosis Utama</label>
				<button class="btn btn-sm" id="diagnosautamatombol" name="diagnosautamatombol" style="background-color: #FFFFFF; color: #330066;"><i class="icon-pencil"style="font-size: 14px;"></i></button>
			</div>		
			<div class="col-md-7">
				<textarea rows="4" name="diagnosautama" id="diagnosautama" class="form-control" style="border: 1px solid #ccc;"><?php echo $dtresumeranap->diagnosautama?></textarea>
			</div>
		</div>		
	</div>
	<div class="col-12 mt-2 ml-3">
		<div class="form-group row col-spacing-row mt-3">
			<div class="col-md-2">
				<label class="col-spacing-row">Tindakan</label>
				<button class="btn btn-sm" id="tindakantombol" name="tindakantombol" style="background-color: #FFFFFF; color: #330066;"><i class="icon-pencil"style="font-size: 14px;"></i></button>
			</div>		
			<div class="col-md-7">
				<textarea rows="5" name="tindakan" id="tindakan" class="form-control" style="border: 1px solid #ccc;"><?php echo $dtresumeranap->tindakan?></textarea>
			</div>
		</div>		
	</div>

	<div class="col-12 mt-2 ml-3">
		<div class="form-group row col-spacing-row mt-3">
			<div class="col-md-2">
				<label class="col-spacing-row">Diet</label>
				<button class="btn btn-sm" id="diettombol" name="diettombol" style="background-color: #FFFFFF; color: #330066;"><i class="icon-pencil"style="font-size: 14px;"></i></button>
			</div>		
			<div class="col-md-7">
				<textarea rows="5" name="diet" id="diet" class="form-control" style="border: 1px solid #ccc;"><?php echo $dtresumeranap->diet?></textarea>
			</div>
		</div>		
	</div>

	<div class="col-12 mt-2 ml-3">
		<div class="form-group row col-spacing-row mt-3">
			<div class="col-md-2">
				<label class="col-spacing-row">Instruksi Follow Up</label>
				<button class="btn btn-sm" id="followuptombol" name="followuptombol" style="background-color: #FFFFFF; color: #330066;"><i class="icon-pencil"style="font-size: 14px;"></i></button>
			</div>		
			<div class="col-md-7">
				<textarea rows="5" name="followup" id="followup" class="form-control" style="border: 1px solid #ccc;"><?php echo $dtresumeranap->followup?></textarea>
			</div>
		</div>		
	</div>

	<div class="col-12 mt-2 ml-3">
		<div class="form-group row col-spacing-row">
			<label class="col-md-2 col-form-label">Kondisi Pulang</label>
			<div class="col-md-3">
				<select class="form-control" name="kondisipulang" id="kondisipulang" style="border: 1px solid #ccc;">
					<option value="1" <?php echo ($dtresumeranap->kondisipulang == 1) ? "selected" : ""; ?>>Sembuh</option>
					<option value="5" <?php echo ($dtresumeranap->kondisipulang == 5) ? "selected" : ""; ?>>Membaik</option>
					<option value="2" <?php echo ($dtresumeranap->kondisipulang == 2) ? "selected" : ""; ?>>Di Rujuk</option>
					<option value="3" <?php echo ($dtresumeranap->kondisipulang == 3) ? "selected" : ""; ?>>Atas Permintaan Sendiri</option>
					<option value="4" <?php echo ($dtresumeranap->kondisipulang == 4) ? "selected" : ""; ?>>Meninggal</option>

				</select>
			</div>
		</div>
	</div>
	
	
	<div class="col-12 mt-2 ml-3">
		<div class="form-group row col-spacing-row mt-3">
			<div class="col-md-2">
				<label class="col-spacing-row">Tanda Vital Saat pulang</label>
			</div>		
			<div class="col-md-9">
				<div class="form-check form-check-inline">
					<label class="col-form-label">Tensi </label>
					<input type="text" id="tensi" name="tensi" class="form-control ml-3" style="width: 120px; display: inline-block; border: 1px solid;" value="<?php echo $dtresumeranap->tensi ?>">
				</div>
				<div class="form-check form-check-inline">
					<label class="col-form-label ml-5">Suhu </label>
					<input type="text" id="suhu" name="suhu" class="form-control ml-3" style="width: 120px; display: inline-block; border: 1px solid;" value="<?php echo $dtresumeranap->suhu ?>">
				</div>
				<div class="form-check form-check-inline">
					<label class="col-form-label ml-5">Nadi </label>
					<input type="text" id="nadi" name="nadi" class="form-control ml-3" style="width: 120px; display: inline-block; border: 1px solid;" value="<?php echo $dtresumeranap->nadi ?>">
				</div>
			</div>
		</div>		
	</div>
	<div class="col-12 mt-2 ml-3">
		<div class="form-group row col-spacing-row">
			<label class="col-md-2 col-form-label">Pengobatan Dilanjutkan</label>
			<div class="col-md-3">
				<select class="form-control" name="lanjut" id="lanjut" style="border: 1px solid #ccc;">
					<option value="1" <?php echo ($dtresumeranap->lanjut == 1) ? "selected" : ""; ?>>Poliklinik</option>
					<option value="2" <?php echo ($dtresumeranap->lanjut == 2) ? "selected" : ""; ?>>Puskesmas</option>
					<option value="3" <?php echo ($dtresumeranap->lanjut == 3) ? "selected" : ""; ?>>RS. Lain</option>
					<option value="4" <?php echo ($dtresumeranap->lanjut == 4) ? "selected" : ""; ?>>Dokter Lain</option>
				</select>
			</div>
		</div>
	</div>

	<div class="col-12 mt-2 ml-3">
		<div class="form-group row col-spacing-row mt-3">
			<div class="col-md-2">
				<label class="col-spacing-row">Tanggal Kontrol Poliklinik</label>
			</div>		
			<div class="col-md-7">
				<input type="date" class="form-control" name="tglkontrol" id="tglkontrol" style="width: 250px;" value="<?php echo $dtresumeranap->tglkontrol?>">
			</div>
		</div>		
	</div>
	<div class="col-12 mt-2 ml-3">
		<div class="form-group row col-spacing-row mt-3">
			<div class="col-6 text-left">
				<button onclick="saveresumeranap()" class="btn btn-primary" data-bs-dismiss="modal">Simpan</button>
				<button onclick="cetakresumeranap()" class="btn btn-secondary" data-bs-dismiss="modal">Cetak</button>
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

	

	function saveresumeranap() {
		var no_rm = document.getElementById("no_rm").value;
		var notransaksi = document.getElementById("notransaksi").value;
		var kode_dokter = document.getElementById("kode_dokter").value;
		var alasan = document.getElementById("alasan").value;
		var riwayat = document.getElementById("riwayat").value;
		var fisik = document.getElementById("fisik").value;
		var penunjang = document.getElementById("penunjang").value;
		var obatdirs = document.getElementById("obatdirs").value;
		var konsul = document.getElementById("konsul").value;
		var diagnosautama = document.getElementById("diagnosautama").value;
		var tindakan = document.getElementById("tindakan").value;
		var diet = document.getElementById("diet").value;
		var followup = document.getElementById("followup").value;
		var kondisipulang = document.getElementById("kondisipulang").value;
		var tensi = document.getElementById("tensi").value;
		var suhu = document.getElementById("suhu").value;
		var nadi = document.getElementById("nadi").value;
		var lanjut = document.getElementById("lanjut").value;
		var tglkontrol = document.getElementById("tglkontrol").value;


		console.log(no_rm);
		console.log(notransaksi);
		console.log(kode_dokter);
		console.log(penunjang);

		$.ajax({
			url: "<?php echo site_url(); ?>/rme/simpanresumeranap",
			type: "GET",
			data: {
				no_rm: no_rm,
				notransaksi : notransaksi,
				kode_dokter : kode_dokter,
				alasan : alasan,
				riwayat : riwayat,
				fisik : fisik,
				penunjang : penunjang,
				obatdirs : obatdirs,
				konsul : konsul,
				diagnosautama : diagnosautama,
				tindakan : tindakan,
				diet : diet,
				followup : followup,
				kondisipulang : kondisipulang,
				tensi : tensi,
				suhu : suhu,
				nadi : nadi,
				lanjut : lanjut,
				tglkontrol : tglkontrol
			},
			success: function (ajaxData) {
				swal('Simpan Data Resume Berhasil');
				
			},
			error: function (ajaxData) {
				console.log(ajaxData);
			}
		});
	}

	
	function cetakresumeranap() {
		var no_rm = document.getElementById("no_rm").value;
		var notransaksi = document.getElementById("notransaksi").value;
		var kode_dokter = document.getElementById("kode_dokter").value;
        window.open("<?php echo site_url();?>/rme/cetakResumeRanap/"+no_rm+"/"+notransaksi+"/"+kode_dokter+"", '_blank');
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

</script>
