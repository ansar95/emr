<div class="modal-dialog modal-xl" role="document">
	<div class="modal-content">
		<!-- <div class="box box-default box-solid" id="proseskotak"> -->
		<div class="modal-header p-1 pl-3 align-text-bottom">
			<!-- <b class="modal-title" id="exampleModalLabel">Pelayanan Unit Rawat Jalan</b> -->
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			
		<h6><span style="color: blue; font-weight: bold;">SOAP</span></h6>
							<div class="row">
								<div class="col-md-12">
									<div>
										<div class="form-group row col-spacing-row">
											<label class="col-md-1 col-form-label">Suhu(C)</label>
											<div class="col-md-2">
												<input type="text" class="form-control" disabled name="suhu" id="suhu" >
											</div>
											<label class="pl-0 col-md-1 col-form-label">Tinggi(Cm)</label>
											<div class="col-md-2">
												<input type="text" class="form-control" disabled name="tinggi" id="tinggi" >
											</div>
											<label class="col-md-1 col-form-label">Berat(Kg)</label>
											<div class="col-md-2">
												<input type="text" class="form-control" disabled name="berat" id="berat" >
											</div>
											<label class="col-md-1 col-form-label">Tensi</label>
											<div class="col-md-2">
												<input type="text" class="form-control" disabled name="tensi" id="tensi" >
											</div>
										</div>
										<div class="form-group row col-spacing-row">
											<label class="col-md-1 col-form-label">Nadi(/mnt)</label>
											<div class="col-md-2">
												<input type="text" class="form-control" disabled name="nadi" id="nadi" >
											</div>
											<label class="pl-0 col-md-1 col-form-label">Respirasi(mnt)</label>
											<div class="col-md-2">
												<input type="text" class="form-control" disabled name="respirasi" id="respirasi" >
											</div>
											<label class="col-md-1 col-form-label">SpO2(%)</label>
											<div class="col-md-2">
												<input type="text" class="form-control" disabled name="spo2" id="spo2" >
											</div>
											<label class="col-md-1 col-form-label">GCS(E,V,M)</label>
											<div class="col-md-2">
												<input type="text" class="form-control" disabled name="gcs" id="gcs" >
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group row col-spacing-row">
										<label class="col-md-1 col-form-label">Kesadaran</label>
										<div class="col-md-3">
											<select class="form-control" disabled style="width: 100%;" name="kesadaran" id="kesadaran" > 
												<option value="-">--- pilih ---</option>
												<option value="Compos Mentis">Compos Mentis</option>
												<option value="Apatis">Apatis</option>
												<option value="Delirium">Delirium</option>
												<option value="Somnolen">Somnolen</option>
												<option value="Sopor">Sopor</option>
												<option value="Semi Koma">Semi Koma</option>
											</select>
										</div>
										<div class="col-md-8">
											<input type="text" class="form-control" disabled name="kesadaranlainnya" id="kesadaranlainnya" >
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group row col-spacing-row">
										<label class="col-md-6 col-form-label">Keluhan Utama</label>
										<label class="col-md-6 col-form-label">Riwayat Penyakit Sekarang</label>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group row col-spacing-row">
										<div class="col-md-6">
											<textarea rows="3" name="keluhanutama" id="keluhanutama" class="form-control" disabled></textarea>
										</div>
										<div class="col-md-6">
											<textarea rows="3" name="riwayatsekarang" id="riwayatsekarang" class="form-control" disabled></textarea>
										</div>
									</div>
								</div>
							</div>	
							<div class="row">
								<div class="col-md-12">
									<div class="form-group row col-spacing-row">
										<label class="col-md-6 col-form-label">Riwayat Penyakit Dahulu</label>
										<label class="col-md-6 col-form-label">Alergi</label>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group row col-spacing-row">
										<div class="col-md-6">
											<textarea rows="3" name="riwayatdahulu" id="riwayatdahulu" class="form-control" disabled></textarea>
										</div>
										<div class="col-md-6">
											<textarea rows="3" name="alergi" id="alergi" class="form-control" disabled></textarea>
										</div>
									</div>
								</div>
							</div>	
							<div class="row">
								<div class="col-md-12">
									<div class="form-group row col-spacing-row">
										<label class="col-md-6 col-form-label">Objektif</label>
										<label class="col-md-6 col-form-label">Assesment</label>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-12">
									<div class="form-group row col-spacing-row">
										<div class="col-md-6">
											<textarea rows="3" name="objektif" id="objektif" class="form-control" disabled></textarea>
										</div>
										<div class="col-md-6">
											<textarea rows="3" name="assesment" id="assesment" class="form-control" disabled></textarea>
										</div>
									</div>
								</div>
							</div>	
							<div class="row">
								<div class="col-md-12">
									<div class="form-group row col-spacing-row">
										<label class="col-md-6 col-form-label">Plan</label>
										<label class="col-md-6 col-form-label">Instruksi</label>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-12">
									<div class="form-group row col-spacing-row">
										<div class="col-md-6">
											<textarea rows="3" name="plan" id="plan" class="form-control" disabled></textarea>
										</div>
										<div class="col-md-6">
											<textarea rows="3" name="instruksi" id="instruksi" class="form-control" disabled></textarea>
										</div>
									</div>
								</div>
							</div>	
							<div class="row">
								<div class="col-md-12">
									<div class="form-group row col-spacing-row">
										<label class="col-md-6 col-form-label">Evaluasi</label>
										<!-- <label class="col-md-6 col-form-label">Instruksi</label> -->
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-12">
									<div class="form-group row col-spacing-row">
										<div class="col-md-6">
											<textarea rows="3" name="evaluasi" id="evaluasi" class="form-control" disabled></textarea>
										</div>
										<div class="col-md-6">
											<!-- <textarea rows="3" name="instruksi" id="instruksi" class="form-control" disabled></textarea> -->
										</div>
									</div>
								</div>
							</div>	

							<div class="row mt-3 mb-1">
								<div class="col-md-6 text-left">
									<button onclick="updatesoap();" class="btn btn-primary" id="tombolupdate">Update</button>
									<button onclick="simpansoap();" class="btn btn-warning" id="tombolsimpan">Simpan</button>
								</div>
							</div>
						</div>

		</div>
	</div>
</div>


<script type="text/javascript">

	var siteURL = "<?php echo site_url(); ?>";

	function prosesdatasoap(id) {
	$('#tombolbatal').prop('disabled', false);
	$('#tombolsave').prop('disabled', false);
	$('#keluhanutama').prop('disabled', false);
	$('#riwayatsekarang').prop('disabled', false);
	$('#riwayatdahulu').prop('disabled', false);
	$('#alergi').prop('disabled', false);
	$('#suhu').prop('disabled', false);
	$('#tinggi').prop('disabled', false);
	$('#berat').prop('disabled', false);
	$('#tensi').prop('disabled', false);
	$('#respirasi').prop('disabled', false);
	$('#nadi').prop('disabled', false);
	$('#spo2').prop('disabled', false);
	$('#gcs').prop('disabled', false);
	$('#kesadaran').prop('disabled', false);
	$('#kesadaranlainnya').prop('disabled', false);
	$('#objektif').prop('disabled', false);
	$('#assesment').prop('disabled', false);
	$('#plan').prop('disabled', false);
	$('#instruksi').prop('disabled', false);
	$('#evaluasi').prop('disabled', false);
	// $('#diagnosa').prop('disabled', false);
	// $('#icd').prop('disabled', false);
	$.ajax({
		url: siteURL + "/urj/panggildatasoap",
		type: "GET",
		data : {id: id},
		success: function (ajaxData){
			t = JSON.parse(ajaxData);
			// alert(t);
			$("#namadokter").val(t.nama_dokter+' | '+t.nama_unit+' | Tanggal : '+t.tanggal.substr(8,2)+'-'+t.tanggal.substr(5,2)+'-'+t.tanggal.substr(0,4));
			$("#namadokter2").val(t.nama_dokter+' | '+t.nama_unit+' | Tanggal : '+t.tanggal.substr(8,2)+'-'+t.tanggal.substr(5,2)+'-'+t.tanggal.substr(0,4));
			$("#keluhanutama").val(t.keluhanutama);
			$("#riwayatsekarang").val(t.riwayatsekarang);
			$("#riwayatdahulu").val(t.riwayatdahulu);
			$("#alergi").val(t.alergi);
			$("#suhu").val(t.suhu);
			$("#tinggi").val(t.tinggi);
			$("#berat").val(t.berat);
			$("#tensi").val(t.tensi);
			$("#respirasi").val(t.respirasi);
			$("#nadi").val(t.nadi);
			$("#spo2").val(t.spo2);
			$("#gcs").val(t.gcs);
			$("#kesadaran").val(t.kesadaran);
			$("#kesadaranlainnya").val(t.kesadaranlain);
			$("#objektif").val(t.objektif);
			$("#assesment").val(t.assesment);
			$("#plan").val(t.plan);
			$("#instruksi").val(t.instruksi);
			$("#evaluasi").val(t.evaluasi);
			// $("#diagnosa").val(t.diagnosatext);
			// $("#idnya").val(t.id);
			// alert("mau masuk");
			//panggil diagnosa
			var notrans = document.getElementById("notrans").value;
			// alert(notrans);
			$.ajax({
				url: siteURL + "/urj/panggildiagnosa",
				type: "GET",
				data : {notrans: notrans},
				success: function (ajaxData){
					// alert(ajaxData);
					// u = JSON.parse(ajaxData);
					// $("#diagpasien").val(u.diagnosa);
					
					// t = JSON.parse(ajaxData);
					// isi disini data diagnosanya
				},
				error: function (ajaxData) {
				// modalloadtutup();
				// alert("tdk masuk");
				console.log(ajaxData);

		}
			});		
			// -----------------end of diagnosa
		},
		error: function (ajaxData) {
			// modalloadtutup();
			console.log(ajaxData);

		}
	});
	}

	
	function savesoap() {
	$('#keluhanutama').prop('disabled', true);
	$('#riwayatsekarang').prop('disabled', true);
	$('#riwayatdahulu').prop('disabled', true);
	$('#alergi').prop('disabled', true);
	$('#suhu').prop('disabled', true);
	$('#tinggi').prop('disabled', true);
	$('#berat').prop('disabled', true);
	$('#tensi').prop('disabled', true);
	$('#respirasi').prop('disabled', true);
	$('#nadi').prop('disabled', true);
	$('#spo2').prop('disabled', true);
	$('#gcs').prop('disabled', true);
	$('#kesadaran').prop('disabled', true);
	$('#kesadaranlainnya').prop('disabled', true);
	$('#objektif').prop('disabled', true);
	$('#assesment').prop('disabled', true);
	$('#plan').prop('disabled', true);
	$('#instruksi').prop('disabled', true);
	$('#evaluasi').prop('disabled', true);
	$('#icd').prop('disabled', true);
	$('#tombolbatal').prop('disabled', true);
	$('#tombolsave').prop('disabled', true);
	
	var id = document.getElementById("idnya").value;
	var keluhanutama = document.getElementById("keluhanutama").value;
	var riwayatsekarang = document.getElementById("riwayatsekarang").value;
	var riwayatdahulu = document.getElementById("riwayatdahulu").value;
	var alergi = document.getElementById("alergi").value;
	var suhu = document.getElementById("suhu").value;
	var tinggi = document.getElementById("tinggi").value;
	var berat = document.getElementById("berat").value;
	var tensi = document.getElementById("tensi").value;
	var respirasi = document.getElementById("respirasi").value;
	var nadi = document.getElementById("nadi").value;
	var spo2 = document.getElementById("spo2").value;
	var gcs = document.getElementById("gcs").value;
	var kesadaran = document.getElementById("kesadaran").value;
	var kesadaranlainnya = document.getElementById("kesadaranlainnya").value;
	var objektif = document.getElementById("objektif").value;
	var assesment = document.getElementById("assesment").value;
	var plan = document.getElementById("plan").value;
	var instruksi = document.getElementById("instruksi").value;
	var evaluasi = document.getElementById("evaluasi").value;
	// var diagnosa = $("#icd").val(); //multiple buka
	// var icd = diagnosa.join(";"); //multiple buka
	var diagnosa = $("#icd").val();
	var diagnosatext = $("#icd option:selected").text();

	$('#diagnosa').val(diagnosatext);
	


	$.ajax({
		url: siteURL + "/urj/simpandatasoap",
		type: "GET",
		data : {id: id,
				keluhanutama : keluhanutama,
				riwayatsekarang : riwayatsekarang,
				riwayatdahulu : riwayatdahulu,
				alergi : alergi,
				suhu : suhu,
				tinggi : tinggi,
				berat : berat,
				tensi : tensi,
				respirasi : respirasi,
				nadi : nadi,
				spo2 : spo2,
				gcs : gcs,
				kesadaran : kesadaran,
				kesadaranlainnya : kesadaranlainnya,
				objektif : objektif,
				assesment : assesment,
				plan : plan,
				instruksi : instruksi,
				evaluasi : evaluasi
				// diagnosa : diagnosa,
				// diagnosatext : diagnosatext
				},
		success: function (ajaxData){
			console.log(keluhanutama);
		},
		error: function (ajaxData) {
			// modalloadtutup();
			console.log(ajaxData);
		}
	});	
	}

	function lihatdata(id) {
	// document.getElementById("myURL").readOnly = true;
	$('#keluhanutama').prop('disabled', true);
	$('#riwayatsekarang').prop('disabled', true);
	$('#riwayatdahulu').prop('disabled', true);
	$('#alergi').prop('disabled', true);
	$('#suhu').prop('disabled', true);
	$('#tinggi').prop('disabled', true);
	$('#berat').prop('disabled', true);
	$('#tensi').prop('disabled', true);
	$('#respirasi').prop('disabled', true);
	$('#nadi').prop('disabled', true);
	$('#spo2').prop('disabled', true);
	$('#gcs').prop('disabled', true);
	$('#kesadaran').prop('disabled', true);
	$('#kesadaranlainnya').prop('disabled', true);
	$('#objektif').prop('disabled', true);
	$('#assesment').prop('disabled', true);
	$('#plan').prop('disabled', true);
	$('#instruksi').prop('disabled', true);
	$('#evaluasi').prop('disabled', true);
	$('#icd').prop('disabled', true);
	$('#tombolbatal').prop('disabled', true);
	$('#tombolsave').prop('disabled', true);
	$('#tombolbatal').prop('disabled', true);
	$('#tombolsave').prop('disabled', true);
	$("#icd").prop("disabled", true);

	$.ajax({
		url: siteURL + "/urj/panggildatasoap",
		type: "GET",
		data : {id: id},
		success: function (ajaxData){
			t = JSON.parse(ajaxData);
			// alert(ajaxData);
			$("#namadokter").val(t.nama_dokter+' | '+t.nama_unit+' | Tanggal : '+t.tanggal.substr(8,2)+'-'+t.tanggal.substr(5,2)+'-'+t.tanggal.substr(0,4));
			// $("#namadokter2").val(t.nama_dokter+' | '+t.nama_unit+' | Tanggal : '+t.tanggal.substr(8,2)+'-'+t.tanggal.substr(5,2)+'-'+t.tanggal.substr(0,4));
			$("#keluhanutama").val(t.keluhanutama);
			$("#riwayatsekarang").val(t.riwayatsekarang);
			$("#riwayatdahulu").val(t.riwayatdahulu);
			$("#alergi").val(t.alergi);
			$("#suhu").val(t.suhu);
			$("#tinggi").val(t.tinggi);
			$("#berat").val(t.berat);
			$("#tensi").val(t.tensi);
			$("#respirasi").val(t.respirasi);
			$("#nadi").val(t.nadi);
			$("#spo2").val(t.spo2);
			$("#gcs").val(t.gcs);
			$("#kesadaran").val(t.kesadaran);
			$("#kesadaranlainnya").val(t.kesadaranlain);
			$("#objektif").val(t.objektif);
			$("#assesment").val(t.assesment);
			$("#plan").val(t.plan);
			$("#instruksi").val(t.instruksi);
			$("#evaluasi").val(t.evaluasi);
			$("#idnya").val(t.id);
			$("#diagnosa").val(t.diagnosatext);
			$('#icd').val(t.diagnosa).trigger('change');
		},
		error: function (ajaxData) {
			// modalloadtutup();
			console.log(ajaxData);
		}
	});
	}

	$('#icd').select2({
                placeholder: 'Enter ICD',
                minimumInputLength: 3,
                allowClear: true,
                ajax: {
                    url: "<?php echo site_url(); ?>/registrasipasien/cariicd",
                    dataType: 'json',
                    data: function(params) {
                        var query = {
                            search: params.term,
                            type: 'public'
                        }
                        return query;
                    },
                    processResults: function(data) {
                        return {
                            results: data.items
                        };
                    }
                }
            });
	// $('#icd').select2();
		
	
	function isidiagnosa(nilai) {
		var diagnosatext = $("#icd option:selected").text();
		$("#diagnosa").val(diagnosatext);
	}
</script>
