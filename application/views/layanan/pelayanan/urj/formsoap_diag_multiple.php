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
			<div class="row spacing-row">
				<div class="col-md-12">
					<div class="form-group row col-spacing-row">
						<?php

						?>
						<label class="col-md-5 col-form-label text-primary"><h6><p class="font-weight-bold"><?php echo $dtpasien->nama_pasien.' | '.$dtpasien->no_rm; ?></p></h6></label>
						<label class="col-md-7 col-form-label text-right"><h7><p class="font-weight-bold"><?php echo $dtpasien->golongan.' | '.$dtpasien->tgl_masuk.' | Trx : '.$dtpasien->notransaksi.' | '.$dtpasien->nama_dokter.' '; ?></p></h7></label>
					</div>
				</div>
			</div>
					<div class="form-group row col-spacing-row">
						<div class="col-md-12">
							<input type="text" class="form-control" name="irm" id="irm" value="<?php echo $dtpasien->no_rm; ?>" disabled hidden>
							<input type="text" class="form-control" name="pj" id="notrans" value="<?php echo $dtpasien->notransaksi; ?>" disabled hidden>
							<input type="text" class="form-control" name="tdgolongan" id="tdgolongan" value="<?php echo $dtpasien->golongan; ?>" disabled hidden>
							<input type="text" class="form-control" name="inp" id="inp" value="<?php echo $dtpasien->nama_pasien; ?>" disabled hidden>
							<input type="text" class="form-control" name="tddokter" id="tddokter" value="<?php echo $dtpasien->nama_dokter; ?>" disabled hidden>
							<input type="text" class="form-control" name="tglperiksa" id="tglperiksa" value="<?php echo $dtpasien->tgl_masuk; ?>" disabled hidden>
						</div>
					</div>

					<div class="table-responsive mt-2 table-hover table-scrollable" style="max-height: 200px;" id="tabeltindakan">
						<table class="table" id="tabeltindakan">
							<thead class="position-relative z-0" >
								<tr>
									<th style="text-align:center" width='8%'></th>
									<th width="3%">No.</th>
									<th width='8%'>Tanggal</th>
									<th width="5%">Jam</th>
									<th width="15%">Unit</th>
									<th width="22%">Dokter</th>
									<th></th>
									<th style="text-align:center" width='8%'></th>
								</tr>
							</thead>
							<tbody>
								<?php
								if ($dtsoap == NULL) {
								?>
									<tr>
										<td colspan="100%" class="text-center">
											Tidak Ada Data
										</td>
									</tr>
									<?php } else {
									$no = 1;
									$jmlt = 0;
									foreach ($dtsoap as $row) {
										$kode_dokter_psoap=$row->kode_dokter;
										echo "<tr>";
									?>
										<td class="text-center">
											<button onclick="lihatdata(<?php echo $row->id; ?>)" class="btn btn-sm btn-light">Lihat</button>
										</td>
									<?php	
										echo "<td align='right'>" . $no++ . ".</td>";
										echo "<td>" . tanggaldua($row->tanggal) . "</td>";
										echo "<td>" . $row->jam . "</td>";
										echo "<td>" . $row->nama_unit . "</td>";
										echo "<td>" . $row->nama_dokter . "</td>";
										// echo "<td>".$row->instruksi."</td>";
										echo "<td>".''."</td>";
										if ($dtpasien->kode_dokter == $row->kode_dokter) {
										?>
										<td class="text-center">
											<button onclick="prosesdatasoap(<?php echo $row->id; ?>)" class="btn btn-sm btn-primary">Update</button>
										</td>
										<?php
										} else {
										?>	
											<td class="text-center">
											<button onclick="prosesdatasoap(<?php echo $row->id; ?>)" class="btn btn-sm btn-primary" disabled>Update</button>
										</td>

								<?php
									}}
								} ?>
							</tbody>
						</table>
					</div>
					<div id="pagination_link" class="d-flex flex-row-reverse">
                        </div>


			<div class="wizard-tab mt-3 ">
				<div class="wizard-tab mb-1 mt-1">
				<ul class="nav nav-tabs d-block d-sm-flex">
					<li class="nav-item mr-4 mb-2">
						<a class="nav-link p-0 active" data-toggle="tab" href="#tab_1">
							<div class="d-flex">
								<div class="media-body font-weight-bold">Data SOAP</div>
							</div>
						</a>
					</li>
				</ul>
			</div>
			<div class="tab-content">
				<div class="tab-pane fade active show" id="tab_1">
					<div class="row spacing-row">
						<div class="col-12">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group row col-spacing-row">
										<label class="col-md-1 col-form-label">Dokter</label>
										<div class="col-md-9">
											<!-- <textarea name="namadokter" id="namadokter" class="form-control" disabled></textarea> -->
											<input type="text" class="form-control" name="namadokter" id="namadokter" disabled>

										</div>

									</div>
								</div>
							</div>	
							<div class="row">
								<div class="col-md-12">
									<div class="form-group row col-spacing-row">
										<label class="col-md-3 col-form-label">Keluhan Utama</label>
										<label class="col-md-3 col-form-label">Riwayat Penyakit Sekarang</label>
										<label class="col-md-3 col-form-label">Riwayat Penyakit Dahulu</label>
										<label class="col-md-3 col-form-label">Alergi</label>
									</div>
								</div>
							</div>			
							<div class="row">
								<div class="col-md-12">
									<div class="form-group row col-spacing-row">
										<div class="col-md-3">
											<textarea rows="2" name="keluhanutama" id="keluhanutama" class="form-control" disabled></textarea>
										</div>
										<div class="col-md-3">
											<textarea rows="2" name="riwayatsekarang" id="riwayatsekarang" class="form-control" disabled></textarea>
										</div>
										<div class="col-md-3">
											<textarea rows="2" name="riwayatdahulu" id="riwayatdahulu" class="form-control" disabled></textarea>
										</div>
										<div class="col-md-3">
											<textarea rows="2" name="alergi" id="alergi" class="form-control" disabled></textarea>
										</div>
										<div class="col-md-1">
											<input type="text" class="form-control" disabled name="idnya" id="idnya" hidden>
										</div>
									</div>
								</div>
							</div>	
							<div class="row">
								<div class="col-md-3">
									<div class="form-group row col-spacing-row">
										<label class="col-md-3 col-form-label">Objektif</label>
									</div>
									<div>
										<textarea rows="3" name="objektif" id="objektif" class="form-control" disabled ></textarea>
									</div>
								</div>
								<div class="col-md-9">
									<div class="form-group row col-spacing-row">
										<label class="col-md-3 col-form-label">.</label>
									</div>
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
											<label class="pl-0 col-md-1 col-form-label">Respirasi(/mnt)</label>
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
							
							<div class="row form-group col-spacing-row">
                                <label class="col-sm-1 col-form-label">Diagnosa</label>
                                <div class="col-sm-11">
									<select class="form-control" disabled style="width: 100%;" name="icd[]" id="icd" multiple="multiple">
										<?php
										foreach ($dticd as $row) {
										?>
											<option value="<?php echo $row->icd_code; ?>"><?php echo $row->icd_code . " - " . $row->jenis_penyakit_local; ?></option>
										<?php
										}
										?>
									</select>
								</div>
							</div>

							<div class="row">
								<div class="col-md-12">
									<div class="form-group row col-spacing-row">
										<label class="col-md-3 col-form-label">Assesment</label>
										<label class="col-md-3 col-form-label">Plan</label>
										<label class="col-md-3 col-form-label">Instruksi</label>
										<label class="col-md-3 col-form-label">Evaluasi</label>
									</div>
								</div>
							</div>		

							<div class="row">
								<div class="col-md-12">
									<div class="form-group row col-spacing-row">
										<div class="col-md-3">
											<textarea rows="2" name="assesment" id="assesment" class="form-control" disabled></textarea>
										</div>
										<div class="col-md-3">
											<textarea rows="2" name="plan" id="plan" class="form-control" disabled></textarea>
										</div>
										<div class="col-md-3">
											<textarea rows="2" name="instruksi" id="instruksi" class="form-control" disabled></textarea>
										</div>
										<div class="col-md-3">
											<textarea rows="2" name="evaluasi" id="evaluasi" class="form-control" disabled></textarea>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group row col-spacing-row">
								<div class="col-md-12 text-right">
									<button onclick="lihatdata(<?php echo $row->id; ?>);" name="tombolbatal" id="tombolbatal" class="btn btn-primary" disabled>Batal</button>
									<button onclick="savesoap();" name="tombolsave" id="tombolsave" class="btn btn-danger" disabled>Simpan</button>
									<!-- <button onclick="savesoap(<?php echo $row->id; ?>);" name="tombolsave" id="tombolsave" class="btn btn-danger" disabled>Update</button> -->
								</div>
							</div>

						</div>
					</div>
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
	$('#icd').prop('disabled', false);
	$.ajax({
		url: siteURL + "/urj/panggildatasoap",
		type: "GET",
		data : {id: id},
		success: function (ajaxData){
			t = JSON.parse(ajaxData);
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
			$("#idnya").val(t.id);
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
	var diagnosa = $("#icd").val();
	var icd = diagnosa.join(";");
	// var icd = 'icd';

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
				evaluasi : evaluasi,
				icd
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
	$.ajax({
		url: siteURL + "/urj/panggildatasoap",
		type: "GET",
		data : {id: id},
		success: function (ajaxData){
			t = JSON.parse(ajaxData);
			// 2022-07-20
			// 0123456789
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

		// 	function load_data_soap(page) {
		// 	$.ajax({
		// 		url: "<?php echo site_url(); ?>/urj/paginationsoap/" + page,
		// 		method: "GET",
		// 		dataType: "json",
		// 		data: {
		// 			id: id
		// 		},

				
		// 		success: function(data) {
		// 			hapusload();
		// 			$('#tabletindakan').html(data.psoap);
		// 			$('#pagination_link').html(data.pagination_link);
		// 		}
		// 	});
		// }
		// $(document).ready(function() {
		// 	load_data_soap(1);
		// 	console.log("jalan");
		// 	$(document).on("click", "#idsoap li a", function(event) {
		// 		event.preventDefault();
		// 		var page = $(this).data("ci-pagination-page");
		// 		load_data_soap(page);
		// 	});

		// });

	
</script>
