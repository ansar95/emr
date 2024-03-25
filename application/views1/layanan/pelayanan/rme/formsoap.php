 
 <div class="modal-dialog modal-xl modal-dialog-centered" style="margin: 0 auto;">
    <div class="modal-content">
        <div class="box box-default box-solid" id="kotakform">
			<div class="modal-header p-1 pl-3 align-text-bottom">
				<h6><span style="color: blue; font-weight: bold;">SOAP</span></h6>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
							<input type="hidden" class="form-control" disabled name="idnya" id="idnya" value="<?php echo $dtsoap->id; ?>">
							<input type="hidden" class="form-control" disabled name="no_rm" id="no_rm" value="<?php echo $dtsoap->no_rm; ?>">
							<div>
										<div class="form-group row col-spacing-row">
											<label class="col-md-1 col-form-label">Suhu(C)</label>
											<div class="col-md-2">
												<input type="text" class="form-control" disabled name="suhu" id="suhu" value="<?php echo $dtsoap->suhu; ?>">
											</div>
											<label class="pl-0 col-md-1 col-form-label">Tinggi(Cm)</label>
											<div class="col-md-2">
												<input type="text" class="form-control" disabled name="tinggi" id="tinggi" value="<?php echo $dtsoap->tinggi; ?>">
											</div>
											<label class="col-md-1 col-form-label">Berat(Kg)</label>
											<div class="col-md-2">
												<input type="text" class="form-control" disabled name="berat" id="berat" value="<?php echo $dtsoap->berat; ?>">
											</div>
											<label class="col-md-1 col-form-label">Tensi</label>
											<div class="col-md-2">
												<input type="text" class="form-control" disabled name="tensi" id="tensi" value="<?php echo $dtsoap->tensi; ?>">
											</div>
										</div>
										<div class="form-group row col-spacing-row">
											<label class="col-md-1 col-form-label">Nadi(/mnt)</label>
											<div class="col-md-2">
												<input type="text" class="form-control" disabled name="nadi" id="nadi" value="<?php echo $dtsoap->nadi; ?>">
											</div>
											<label class="pl-0 col-md-1 col-form-label">Respirasi(mnt)</label>
											<div class="col-md-2">
												<input type="text" class="form-control" disabled name="respirasi" id="respirasi" value="<?php echo $dtsoap->respirasi; ?>">
											</div>
											<label class="col-md-1 col-form-label">SpO2(%)</label>
											<div class="col-md-2">
												<input type="text" class="form-control" disabled name="spo2" id="spo2" value="<?php echo $dtsoap->spo2; ?>">
											</div>
											<label class="col-md-1 col-form-label">GCS(E,V,M)</label>
											<div class="col-md-2">
												<input type="text" class="form-control" disabled name="gcs" id="gcs" value="<?php echo $dtsoap->gcs; ?>">
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
												<option value="Compos Mentis" <?php echo ($dtsoap->kesadaran === "Compos Mentis") ? 'selected' : ''; ?>>Compos Mentis</option>
												<option value="Apatis" <?php echo ($dtsoap->kesadaran === "Apatis") ? 'selected' : ''; ?>>Apatis</option>
												<option value="Delirium" <?php echo ($dtsoap->kesadaran === "Delirium") ? 'selected' : ''; ?>>Delirium</option>
												<option value="Somnolen" <?php echo ($dtsoap->kesadaran === "Somnolen") ? 'selected' : ''; ?>>Somnolen</option>
												<option value="Sopor" <?php echo ($dtsoap->kesadaran === "Sopor") ? 'selected' : ''; ?>>Sopor</option>
												<option value="Semi Koma" <?php echo ($dtsoap->kesadaran === "Semi Koma") ? 'selected' : ''; ?>>Semi Koma</option>
											</select>
										</div>
										<div class="col-md-8">
											<input type="text" class="form-control" disabled name="kesadaranlainnya" id="kesadaranlainnya" value="<?php echo $dtsoap->kesadaranlain;?>">
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
											<textarea rows="3" name="keluhanutama" id="keluhanutama" class="form-control" disabled><?php echo $dtsoap->keluhanutama; ?></textarea>
										</div>
										<div class="col-md-6">
											<textarea rows="3" name="riwayatsekarang" id="riwayatsekarang" class="form-control" disabled><?php echo $dtsoap->riwayatsekarang; ?></textarea>
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
											<textarea rows="3" name="riwayatdahulu" id="riwayatdahulu" class="form-control" disabled><?php echo $dtsoap->riwayatdahulu; ?></textarea>
										</div>
										<div class="col-md-6">
											<textarea rows="3" name="alergi" id="alergi" class="form-control" disabled><?php echo $dtsoap->gcs; ?></textarea>
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
											<textarea rows="3" name="objektif" id="objektif" class="form-control" disabled><?php echo $dtsoap->objektif; ?></textarea>
										</div>
										<div class="col-md-6">
											<textarea rows="3" name="assesment" id="assesment" class="form-control" disabled><?php echo $dtsoap->assesment; ?></textarea>
										</div>
									</div>
								</div>
							</div>	
							<div class="row">
								<div class="col-md-12">
									<div class="form-group row col-spacing-row">
										<label class="col-md-6 col-form-label">Plan
										<button class="btn btn-sm" id="ambildariresep" name="ambildariresep" style="background-color: #FFFFFF; color: #330066; float: right;" data-toggle="tooltip" data-placement="left" title="Ambil dari Resep"><i class="icon-pencil" style="font-size: 14px;"></i></button>
										</label>
										<label class="col-md-6 col-form-label">Instruksi</label>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-12">
									<div class="form-group row col-spacing-row">
										<div class="col-md-6">
											<textarea rows="3" name="plan" id="plan" class="form-control"  disabled><?php echo $dtsoap->plan; ?></textarea>
										</div>
										<div class="col-md-6">
											<textarea rows="3" name="instruksi" id="instruksi" class="form-control" disabled><?php echo $dtsoap->instruksi; ?></textarea>
										</div>
									</div>
								</div>
							</div>	
							<div class="row">
								<div class="col-md-12">
									<div class="form-group row col-spacing-row">
										<label class="col-md-6 col-form-label">Evaluasi</label>
										<label class="col-md-6 col-form-label">Catatan Konsul Dokter</label>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-12">
									<div class="form-group row col-spacing-row">
										<div class="col-md-6">
											<textarea rows="3" name="evaluasi" id="evaluasi" class="form-control"  disabled><?php echo $dtsoap->evaluasi; ?></textarea>
										</div>
										<div class="col-md-6">
											<textarea rows="3" name="konsuldokter" id="konsuldokter" class="form-control" disabled><?php echo $dtsoap->konsuldokter; ?></textarea>
										</div>
									</div>
								</div>

							</div>	
 					<?php
					$tglHariIni=date("Y-m-d"); 
					// if ($tglHariIni == $dtsoap->tanggal ){?>
						<div class="row mt-3 mb-1">
							<div class="col-md-6 text-left">
								<button onclick="updatesoap();" class="btn btn-primary" id="tombolupdate">Update</button>
								<!-- <button onclick="simpansoap();" class="btn btn-warning" id="tombolsimpan" disabled>Simpan</button> -->
							</div>
							<div class="col-md-6 text-right">
								<!-- <button onclick="updatesoap();" class="btn btn-primary" id="tombolupdate">Update</button> -->
								<button onclick="simpansoap();" class="btn btn-warning" id="tombolsimpan" disabled>Simpan</button>
							</div>
						</div>
 					<?php 
						// } 
					?>
				</div>
			</div>
		</div>
	</div>
</div>

<script>

function modalform() {
            $("#kotakform").append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
        }

function modalformtutup() {
            $(".overlay").remove();
        }

function tutupmodal() {
            $(function () {
                $("#formmodal").modal("toggle");
            });
        }

function updatesoap(id) {
	$('#tombolupdate').prop('disabled', true);
	$('#tombolsimpan').prop('disabled', false);
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
	$('#konsuldokter').prop('disabled', false);
	
}


function simpansoap() {
	modalform();

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
	$('#konsuldokter').prop('disabled', true);

	var no_rm = document.getElementById("no_rm").value;
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
	var konsuldokter = document.getElementById("konsuldokter").value;
	// var diagnosa = $("#icd").val(); //multiple buka
	// var icd = diagnosa.join(";"); //multiple buka
	var diagnosa = $("#icd").val();
	var diagnosatext = $("#icd option:selected").text();

	$('#diagnosa').val(diagnosatext);
	


	$.ajax({
		url: "<?php echo site_url();?>/rme/simpandatasoap",
		type: "GET",
		data : {id: id,
				no_rm : no_rm,
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
				evaluasi : evaluasi,
				konsuldokter : konsuldokter
				// diagnosa : diagnosa,
				// diagnosatext : diagnosatext
				},
		success: function (ajaxData){
			console.log(ajaxData);
			 var dt = JSON.parse(ajaxData);
                    $("#tabelsoap tbody tr").remove();
                    $("#tabelsoap tbody").append(dt.dtview);
                    modalformtutup();
                    tutupmodal();
		},
		error: function (ajaxData) {
			// modalloadtutup();
			console.log(ajaxData);
		}
	});	
	}



$(document).ready(function () {
		$("#ambildariresep").on("click", function (e) {
			// Panggil fungsi panggilFormTriase saat tab diklik
			var no_rm = document.getElementById("no_rm").value;
			var notransaksi = document.getElementById("notransaksi").value;
			var kode_dokter = document.getElementById("kode_dokter").value;
			
			$.ajax({
				url: "<?php echo site_url(); ?>/rme/panggilObatSoap",
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
					data.dtresepobat.forEach(function(item) {
						htmlContent += '' + item.namaobat.trim() + ' ' + item.qty+ ' ' + item.satuanpakai.trim()+', Aturan Pakai, ';
						if (item.pagi !== undefined && item.pagi.trim() !== '') {
    					htmlContent += ' Pagi : ' + item.pagi +'\n';
						}
						if (item.siang !== undefined && item.siang.trim() !== '') {
    					htmlContent += ' Siang : ' + item.siang +'\n';
						}
						if (item.malam !== undefined && item.malam.trim() !== '') {
    					htmlContent += ' Malam : ' + item.malam +'\n';
						}
						if (item.racikan == 1) {
						// htmlContent += '\n';
    					htmlContent += 'Item Racikan : ';
    					htmlContent += item.catatanracikan.replace(/\n/g, ', ') + '\n';
    					// htmlContent += item.catatanracikan + '\n';
						}
					});
					htmlContent += '';


					// Menampilkan hasil dalam elemen dengan ID 'diagnosis' menggunakan jQuery
					$("#plan").html(htmlContent);

									},
									error: function () {
										$.notify("Gagal Memproses Data", "error");
									}
			});
		});
	});

</script>