
<link rel="stylesheet" href="../../assets/template_baru/dist/vendors/icheck/skins/all.css" >
<div class="card">
	<div class="col-12 mt-4 ml-3">
		<!-- <span style="font-size: 16px; font-weight: bold; color: navy;">TRIASE</span> -->
		<div class="w-sm-100 mr-auto"><h6 class="mb-0" style="color: navy;">FORM ASESMEN AWAL MEDIS RAWAT INAP</h6></div>

	</div>
	<div class="col-12 mt-2 ml-3">

						<div class="tab-pane fade show" id="tabasesmenawalmedis" role="tabpanel" >		
							<nav>
								<div class="nav nav-tabs" id="subnav1" role="tablist">
									<!-- <div class="nav-item" style="flex: 1;"></div> Elemen dummy sebelah kiri -->
									<!-- <div class="nav-item"></div>  -->

									<a class="nav-item nav-link active" id="subtabkondisiawal" data-toggle="tab" href="#kondisiawal" role="tab" aria-controls="subnav1-1" aria-selected="true">Kondisi Awal</a>
									<a class="nav-item nav-link" id="subtabpemeriksaan" data-toggle="tab" href="#pemeriksaan" role="tab" aria-controls="subnav1-2" aria-selected="false">Pemeriksaan Fisik</a>
									<a class="nav-item nav-link" id="subtabnyeri" data-toggle="tab" href="#nyeri" role="tab" aria-controls="subnav1-2" aria-selected="false">Penunjang | Diagnosa </a>
									<a class="nav-item nav-link" id="subtabkesimpulan" data-toggle="tab" href="#kesimpulan" role="tab" aria-controls="subnav1-2" aria-selected="false">Edukasi</a>
									<!-- <a class="nav-item nav-link" style="background-color: #F2F4F4;" id="subtabkesimpulan" data-toggle="tab" href="#kesimpulan" role="tab" aria-controls="subnav1-2" aria-selected="false">Edukasi</a> -->
									<!-- <div class="nav-item" style="flex: 1;"></div> Elemen dummy sebelah kanan -->
								</div>
								<div class="tab-content" id="subnav1-content">
									<div class="tab-pane fade  show active" id="kondisiawal" role="tabpanel" aria-labelledby="subtabkondisiawal">
											<div class="card">
												<div class="card-body">
													<div class="col-md-12">
														<div class="form-group row col-spacing-row">
															<label class="col-md-1 col-form-label">Cara Masuk</label>
															<div class="col-md-11">
																<input class="state icheckbox_square-red" type="checkbox" id="datangSendiri" <?php echo ($dtassawal->datangsendiri == 1) ? "checked" : ""; ?> name="caraMasuk"> Datang Sendiri
																<input class="state icheckbox_square-red ml-3" type="checkbox" id="rujukanDari" <?php echo ($dtassawal->rujukan == 1) ? "checked" : ""; ?> name="caraMasuk" class="form-check-input"> Rujukan Dari 
																<div class="form-check form-check-inline ml-2">
																	<input type="text" class="form-control col-form-label" name="isian" id="isian" style="width: 250px;" <?php echo ($dtassawal->rujukan == 1) ? "" : "disabled"; ?> value="<?php echo $dtassawal->rujukandari ?>">
																</div>
															</div>
														</div>
													</div>
													<div class="col-md-12">
														<div class="form-group row col-spacing-row">
															<label class="col-md-1 col-form-label">Anamnesis</label>
															<div class="col-md-11">
																	<input class="state icheckbox_square-red" type="checkbox" id="Auto" name="anamnesis" <?php echo ($dtassawal->auto == 1) ? "checked" : ""; ?>> Auto
																	<input class="state icheckbox_square-red ml-3" type="checkbox" id="Allo" name="anamnesis" <?php echo ($dtassawal->allo == 1) ? "checked" : ""; ?>> Allo
																<div class="form-check form-check-inline">
																	<input type="text" class="form-control col-form-label ml-3"  name="Allotext" id="Allotext" style="width: 250px;" <?php echo ($dtassawal->allo == 1) ? "" : "disabled"; ?>  value="<?php echo $dtassawal->allotext ?>">
																</div>
															</div>
														</div>
													</div>
													<div class="col-md-12 mt-2">
														<div class="form-group row col-spacing-row">
															<label class="col-md-1 col-form-label">Jenis Pelayanan</label>
															<div class="col-md-11 mt-1">
																	<input class="state icheckbox_square-red" type="checkbox" id="preventif" name="preventif"<?php echo ($dtassawal->preventif == 1) ? "checked" : ""; ?>> Preventif
																	<input class="state icheckbox_square-red  ml-3" type="checkbox" id="paliatif" name="paliatif"<?php echo ($dtassawal->paliatif == 1) ? "checked" : ""; ?>> Paliatif
																	<input class="state icheckbox_square-red  ml-3" type="checkbox" id="kuratif" name="kuratif"<?php echo ($dtassawal->kuratif == 1) ? "checked" : ""; ?>> Kuratif
																	<input class="state icheckbox_square-red  ml-3" type="checkbox" id="rehabilitatip" name="rehabilitatip"<?php echo ($dtassawal->rehabilitatip == 1) ? "checked" : ""; ?>> Rehabilitatip
															</div>
														</div>
													</div>
													<div class="col-md-12 mt-3">
														<div class="form-group row col-spacing-row">
															<label class="col-md-2 col-form-label">Keluhan Utama</label>
															<div class="col-md-12">
																<div class="form-check form-check-inline">
																	<textarea id="keluhanutama" name="keluhanutama" rows="7" style="width: 1200px;"><?php echo $dtassawal->keluhanutama ?></textarea>

																</div>
															</div>
														</div>
													</div>
													<div class="col-md-12 mt-3">
														<div class="form-group row col-spacing-row">
															<label class="col-md-2 col-form-label">Riwayat Penyakit Sekarang</label>
															<div class="col-md-12">
																<div class="form-check form-check-inline">
																	<textarea id="riwayatsekarang" name="riwayatsekarang" rows="7" style="width: 1200px;"><?php echo $dtassawal->riwayatsekarang ?></textarea>

																</div>
															</div>
														</div>
													</div>
													<div class="col-md-12">
														<div class="form-group row col-spacing-row">
															<label class="col-md-2 col-form-label">Riwayat Penyakit Dahulu</label>
															<div class="col-md-12">
																<div class="form-check form-check-inline">
																	<textarea id="riwayatdahulu" name="riwayatdahulu" rows="7" style="width: 1200px;"><?php echo $dtassawal->riwayatdahulu ?></textarea>
																</div>
															</div>
														</div>
													</div>
													<div class="col-md-12 mt-3">
														<div class="form-group row col-spacing-row">
															<label class="col-md-1 col-form-label">Alergi</label>
															<div class="col-md-11">
																	<input class="state icheckbox_square-red" type="checkbox" id="alergitidak" <?php echo ($dtassawal->alergitidak == 1) ? "checked" : ""; ?> name="aleri"> Tidak
																	<input class="state icheckbox_square-red ml-3" type="checkbox" id="alergiya" <?php echo ($dtassawal->alergiya == 1) ? "checked" : ""; ?> name="aleri" > Ya
																<div class="form-check form-check-inline">
																	<input type="text" class="form-control col-form-label ml-3" name="alergitext" id="alergitext" style="width: 250px;" <?php echo ($dtassawal->alergiya == 1) ? "" : "disabled"; ?> value="<?php echo $dtassawal->alergitext ?>">
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="col-md-12">
													<div class="col-6 text-left">
														<button onclick="savekondisiawal()" class="btn btn-primary" data-bs-dismiss="modal">Simpan</button>
													</div>
													<div class="col-6">
															<!-- <button onclick="Batal()" class="btn btn-danger">Batal Save</button> -->
													</div>
												</div>
											</div>

									</div>
									<!-- -------- pemeriksaan--------- -->
									<div class="tab-pane fade" id="pemeriksaan" role="tabpanel" aria-labelledby="subtabpemeriksaan">
										<div class="card">
											<div class="card-body">
												<div class="col-md-12 mt-3">
													<div class="form-group row col-spacing-row">
														<label class="col-md-1">Keadaan Umum</label>
														<div class="col-md-11">
																<input class="state icheckbox_square-red" type="checkbox" id="baik" name="kondisi"<?php echo ($dtassawal->baik == 1) ? "checked" : ""; ?> onchange="checkKondisi(this)" >
																Baik
																<input class="state icheckbox_square-red ml-3" type="checkbox" id="sakitringan" name="kondisi" class="form-check-input" <?php echo ($dtassawal->sakitringan == 1) ? "checked" : ""; ?> onchange="checkKondisi(this)">
																Sakit Ringan
																<input class="state icheckbox_square-red ml-3" type="checkbox" id="sakitsedang" name="kondisi" class="form-check-input" <?php echo ($dtassawal->sakitsedang == 1) ? "checked" : ""; ?> onchange="checkKondisi(this)">
																Sakit Sedang
																<input class="state icheckbox_square-red ml-3" type="checkbox" id="sakitberat" name="kondisi" class="form-check-input" <?php echo ($dtassawal->sakitberat == 1) ? "checked" : ""; ?> onchange="checkKondisi(this)">
																Sakit Berat
														</div>
													</div>
													<div class="form-group row col-spacing-row mt-3">
														<label class="col-md-1">Kesadaran</label>
														<div class="col-md-11">
																<input class="state icheckbox_square-red" type="checkbox" id="cm" name="kesadaran"<?php echo ($dtassawal->cm == 1) ? "checked" : ""; ?> onchange="checkKesadaran(this)">
																CM
																<input class="state icheckbox_square-red ml-3" type="checkbox" id="apatis" name="kesadaran"<?php echo ($dtassawal->apatis == 1) ? "checked" : ""; ?> onchange="checkKesadaran(this)">
																Apatis
																<input class="state icheckbox_square-red ml-3" type="checkbox" id="somnolen" name="kesadaran"<?php echo ($dtassawal->somnolen == 1) ? "checked" : ""; ?> onchange="checkKesadaran(this)">
																Somnolen
																<input class="state icheckbox_square-red ml-3" type="checkbox" id="sopor" name="kesadaran" <?php echo ($dtassawal->sopor == 1) ? "checked" : ""; ?> onchange="checkKesadaran(this)">
																Sopor
																<input class="state icheckbox_square-red ml-3" type="checkbox" id="koma" name="kesadaran"<?php echo ($dtassawal->koma == 1) ? "checked" : ""; ?> onchange="checkKesadaran(this)">
																Koma
														</div>
													</div>
													<div class="form-group row col-spacing-row mt-3">
															<label class="col-md-1 col-form-label">Tanda Vital</label>
															<div class="form-inline col-md-11">
																<label class="col-form-label">TD</label>
																<input type="text" class="form-control col-form-label ml-3" id="ttv_td" value="<?php echo $dtassawal->ttv_td ?>">
																<label class="col-form-label ml-3">Nadi</label>
																<input type="text" class="form-control col-form-label ml-3" id="ttv_nadi" value="<?php echo $dtassawal->ttv_nadi ?>">
																<label class="col-form-label ml-3">RR</label>
																<input type="text" class="form-control col-form-label ml-3" id="ttv_rr" value="<?php echo $dtassawal->ttv_rr ?>">
																<label class="col-form-label ml-3">Suhu</label>
																<input type="text" class="form-control col-form-label ml-3" id="ttv_s" value="<?php echo $dtassawal->ttv_s ?>">
															</div>
													</div>
													<div class="form-group row col-spacing-row mt-3">
														<div class="col-md-12">
															<div class="form-group row col-spacing-row">
																<label class="col-md-2 col-form-label">Status Generalis</label>
																<div class="col-md-12">
																	<div class="form-check form-check-inline">
																		<textarea id="generalis" name="generalis" rows="7" style="width: 1200px;"><?php echo $dtassawal->generalis ?></textarea>

																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="form-group row col-spacing-row mt-3">
														<div class="col-md-12">
															<div class="form-group row col-spacing-row">
																<label class="col-md-2 col-form-label">Status Lokalis</label>
																<div class="col-md-12">
																	<div class="form-check form-check-inline">
																		<textarea id="lokalis" name="lokalis" rows="7" style="width: 1200px;"><?php echo $dtassawal->lokalis ?></textarea>

																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="col-md-12">
												<div class="col-6 text-left">
													<button onclick="savepemeriksaan()" class="btn btn-primary" data-bs-dismiss="modal">Simpan</button>
												</div>
												<div class="col-6">
													<!-- <button onclick="Batal()" class="btn btn-danger">Batal Save</button> -->
												</div>
												<br>
												<br>
											</div>
										</div>
				
									</div>
									<!-- nyeri -->
									<div class="tab-pane fade" id="nyeri" role="tablitabpanelst" aria-labelledby="subtabnyeri">
										<div class="card">
											<div class="card-body">
												<div class="col-md-12">
													<div class="form-group row col-spacing-row mt-3">
														<div class="col-md-12">
															<div class="form-group row col-spacing-row">
																<label class="col-md-2 col-form-label">LABORATORIUM</label>
																<div class="col-md-12">
																	<div class="form-check form-check-inline">
																		<textarea id="lab" name="lab" rows="5" style="width: 1200px;"><?php echo $dtassawal->lab ?></textarea>
																	</div>
																</div>
															</div>
															<div class="form-group row col-spacing-row">
																<label class="col-md-2 col-form-label">RADIOLOGI</label>
																<div class="col-md-12">
																	<div class="form-check form-check-inline">
																		<textarea id="rad" name="rad" rows="5" style="width: 1200px;"><?php echo $dtassawal->rad ?></textarea>
																	</div>
																</div>
															</div>
															<div class="form-group row col-spacing-row">
																<label class="col-md-2 col-form-label">PENUNJANG LAINNYA</label>
																<div class="col-md-12">
																	<div class="form-check form-check-inline">
																		<textarea id="lain" name="lain" rows="5" style="width: 1200px;"><?php echo $dtassawal->lain ?></textarea>
																	</div>
																</div>
															</div>
															<div class="form-group row col-spacing-row mt-2">
																<label class="col-md-2 col-form-label">DIAGNOSIS</label><br>
															</div>
															<div class="form-group row col-spacing-row">
																<label class="col-md-2 col-form-label">Diagnosis</label>
																<div class="col-md-12">
																	<div class="form-check form-check-inline">
																		<textarea id="diagnosakerja" name="diagnosakerja" rows="5" style="width: 1200px;"><?php echo $dtassawal->diagnosakerja ?></textarea>
																	</div>
																</div>
															</div>
															<div class="form-group row col-spacing-row mt-2">
																<label class="col-md-2 col-form-label">Diagnosis Banding</label>
																<div class="col-md-12">
																	<div class="form-check form-check-inline">
																		<textarea id="diagnosabanding" name="diagnosabanding" rows="5" style="width: 1200px;"><?php echo $dtassawal->diagnosabanding ?></textarea>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="col-md-12 mb-4">
												<div class="col-6 text-left">
													<button onclick="savepenunjang()" class="btn btn-primary" data-bs-dismiss="modal">Simpan</button>
												</div>
												<div class="col-6">
													<!-- <button onclick="Batal()" class="btn btn-danger">Batal Save</button> -->
												</div>
											</div>
										</div>
									</div>
									<div class="tab-pane fade" id="kesimpulan" role="tabpanel" aria-labelledby="subtabkesimpulan">
										<div class="card">
											<div class="card-body">
												<div class="col-md-12">
													<div class="form-group row col-spacing-row">
														<label class="col-md-2 col-form-label">Edukasi</label>
														<div class="col-md-12">
															<div class="form-check form-check-inline">
																<textarea id="edukasi" name="edukasi" rows="5" style="width: 1200px;"><?php echo $dtassawal->edukasi ?></textarea>
															</div>
														</div>
													</div>
													<div class="form-group row col-spacing-row">
														<label class="col-md-6 col-form-label">Anjuran Pemeriksaan Penunjang</label>
														<div class="col-md-12">
															<div class="form-check form-check-inline">
																<textarea id="anjuran" name="anjuran" rows="3" style="width: 1200px;"><?php echo $dtassawal->anjuran ?></textarea>
															</div>
														</div>
													</div>
													<div class="form-group row col-spacing-row">
														<label class="col-md-6 col-form-label">Terapi / Tindakan</label>
														<div class="col-md-12">
															<div class="form-check form-check-inline">
																<textarea id="terapi" name="terapi" rows="3" style="width: 1200px;"><?php echo $dtassawal->terapi ?></textarea>
															</div>
														</div>
													</div>
													<div class="form-group row col-spacing-row mt-3">
														<div class="col-md-12">
															<label>Sudah dilakukan rekonsiliasi terhadap obat yang sedang digunakan saat ini</label>
															<input class="state icheckbox_square-red ml-2" type="checkbox" id="rekonobatya" name="kondisi"<?php echo ($dtassawal->rekonobatya == 1) ? "checked" : ""; ?>> Ya
															<input class="state icheckbox_square-red ml-2" type="checkbox" id="rekonobattidak" name="kondisi"<?php echo ($dtassawal->rekonobattidak == 1) ? "checked" : ""; ?>> Tidak

														</div>
													</div>
													<div class="form-group row col-spacing-row">
														<label class="col-md-6 col-form-label">Kriteria Pulang</label>
														<div class="col-md-12">
															<div class="form-check form-check-inline">
																<textarea id="kriteria" name="kriteria" rows="3" style="width: 1200px;"><?php echo $dtassawal->kriteria ?></textarea>
															</div>
														</div>
													</div>
													<div class="form-group row col-spacing-row">
														<label class="col-md-6 col-form-label">Konsul</label>
														<div class="col-md-12">
															<div class="form-check form-check-inline">
																<textarea id="konsul" name="konsul" rows="3" style="width: 1200px;"><?php echo $dtassawal->konsul ?></textarea>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="col-md-12 mb-4">
												<div class="col-6 text-left">
													<button onclick="saveedukasi()" class="btn btn-primary" data-bs-dismiss="modal">Simpan</button>
												</div>
												<div class="col-6">
													<!-- <button onclick="Batal()" class="btn btn-danger">Batal Save</button> -->
												</div>
											</div>
										</div>
									</div>
								</div>
							</nav>
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

		function kuranglengkap() {
			$.notify("Data Kurang Lengkap", "error");
		}

		function toggleRujukan() {
			var datangSendiriCheckbox = document.getElementById('datangSendiri');
			var rujukanDariCheckbox = document.getElementById('rujukanDari');
			var rujukanDariText = document.getElementById('rujukandaritext');

			if (datangSendiriCheckbox.checked) {
				rujukanDariCheckbox.checked = false;
				rujukanDariText.disabled = true;
			} else if (rujukanDariCheckbox.checked) {
				datangSendiriCheckbox.checked = false;
				rujukanDariText.disabled = false;
			} else {
				rujukanDariText.disabled = true;
			}
		}

function savekondisiawal() {
			var no_rm = document.getElementById("no_rm").value;
			var kode_dokter = document.getElementById("kode_dokter").value;
			var notransaksi = document.getElementById("notransaksi").value;
			var datangsendiri = $("#datangSendiri").prop("checked") ? 1 : 0;
			var rujukan = $("#rujukanDari").prop("checked") ? 1 : 0;
			var rujukandari = document.getElementById("isian").value;
			var auto = $("#Auto").prop("checked") ? 1 : 0;
			var allo = $("#Allo").prop("checked") ? 1 : 0;
			var allotext = document.getElementById("Allotext").value;
			var preventif = $("#preventif").prop("checked") ? 1 : 0;
			var paliatif = $("#paliatif").prop("checked") ? 1 : 0;
			var kuratif = $("#kuratif").prop("checked") ? 1 : 0;
			var rehabilitatip = $("#rehabilitatip").prop("checked") ? 1 : 0;
			var keluhanutama = document.getElementById("keluhanutama").value;
			var riwayatsekarang = document.getElementById("riwayatsekarang").value;
			var riwayatdahulu = document.getElementById("riwayatdahulu").value;
			var alergitidak = $("#alergitidak").prop("checked") ? 1 : 0;
			var alergiya = $("#alergiya").prop("checked") ? 1 : 0;
			var alergitext = document.getElementById("alergitext").value;
			$.ajax({
				url: "<?php echo site_url(); ?>/rme/saveawalranap",
				type: "GET",
				data: {
					no_rm : no_rm,
					kode_dokter : kode_dokter,
					notransaksi : notransaksi,
					datangsendiri: datangsendiri,
					rujukan: rujukan,
					rujukandari: rujukandari,
					auto: auto,
					allo: allo,
					allotext : allotext,
					preventif : preventif,
					paliatif : paliatif,
					kuratif : kuratif,
					rehabilitatip : rehabilitatip,
					keluhanutama : keluhanutama,
					riwayatsekarang : riwayatsekarang,
					riwayatdahulu : riwayatdahulu,
					alergitidak : alergitidak,
					alergiya : alergiya,
					alergitext : alergitext,
				},
				success: function(ajaxData) {
					swal('Simpan Data Berhasil');
					},
				error: function(ajaxData) {
					swal('Simpan Data Gagal');
				}
			});
		}

		function savepemeriksaan() {
			var no_rm = document.getElementById("no_rm").value;
			var kode_dokter = document.getElementById("kode_dokter").value;
			var notransaksi = document.getElementById("notransaksi").value;
			var baik = $("#baik").prop("checked") ? 1 : 0;
			var sakitringan = $("#sakitringan").prop("checked") ? 1 : 0;
			var sakitsedang = $("#sakitsedang").prop("checked") ? 1 : 0;
			var sakitberat = $("#sakitberat").prop("checked") ? 1 : 0;
			var cm = $("#cm").prop("checked") ? 1 : 0;
			var apatis = $("#apatis").prop("checked") ? 1 : 0;
			var somnolen = $("#somnolen").prop("checked") ? 1 : 0;
			var sopor = $("#sopor").prop("checked") ? 1 : 0;
			var koma = $("#koma").prop("checked") ? 1 : 0;
			var ttv_td = document.getElementById("ttv_td").value;
			var ttv_nadi = document.getElementById("ttv_nadi").value;
			var ttv_rr = document.getElementById("ttv_rr").value;
			var ttv_s = document.getElementById("ttv_s").value;
			var generalis = document.getElementById("generalis").value;
			var lokalis = document.getElementById("lokalis").value;
			$.ajax({
				url: "<?php echo site_url(); ?>/rme/savepemeriksaanranap",
				type: "GET",
				data: {
					no_rm : no_rm,
					notransaksi : notransaksi,
					baik : baik,
					sakitringan: sakitringan,
					sakitsedang: sakitsedang,
					sakitberat: sakitberat,
					cm: cm,
					apatis: apatis,
					somnolen : somnolen,
					sopor : sopor,
					koma : koma,
					ttv_td : ttv_td,
					ttv_nadi : ttv_nadi,
					ttv_rr : ttv_rr,
					ttv_s : ttv_s,
					generalis : generalis,
					lokalis : lokalis
				},
				success: function(ajaxData) {
					swal('Simpan Data Berhasil');
					},
				error: function(ajaxData) {
					swal('Simpan Data Gagal');
				}
			});
		}

	function savepenunjang() {
			var no_rm = document.getElementById("no_rm").value;
			var kode_dokter = document.getElementById("kode_dokter").value;
			var notransaksi = document.getElementById("notransaksi").value;
			
			var lab = document.getElementById("lab").value;
			var rad = document.getElementById("rad").value;
			var lain = document.getElementById("lain").value;
			var diagnosakerja = document.getElementById("diagnosakerja").value;
			var diagnosabanding = document.getElementById("diagnosabanding").value;
			

			$.ajax({
				url: "<?php echo site_url(); ?>/rme/savepenunjangranap",
				type: "GET",
				data: {
					no_rm : no_rm,
					notransaksi : notransaksi,
					kode_dokter : kode_dokter,
					lab : lab,
					rad : rad,
					lain : lain,
					diagnosakerja : diagnosakerja,
					diagnosabanding : diagnosabanding
				},
				success: function(ajaxData) {
					swal('Simpan Data Berhasil');
					},
				error: function(ajaxData) {
					swal('Simpan Data Gagal');
				}
			});
		}


		function saveedukasi() {
			var no_rm = document.getElementById("no_rm").value;
			var kode_dokter = document.getElementById("kode_dokter").value;
			var notransaksi = document.getElementById("notransaksi").value;
			var edukasi = document.getElementById("edukasi").value;
			var anjuran = document.getElementById("anjuran").value;
			var terapi = document.getElementById("terapi").value;
			var kriteria = document.getElementById("kriteria").value;
			var konsul = document.getElementById("konsul").value;

			var rekonobatya = $("#rekonobatya").prop("checked") ? 1 : 0;
			var rekonobattidak = $("#rekonobattidak").prop("checked") ? 1 : 0;

			$.ajax({
				url: "<?php echo site_url(); ?>/rme/saveedukasiranap",
				type: "GET",
				data: {
					no_rm : no_rm,
					notransaksi : notransaksi,
					kode_dokter : kode_dokter,
					edukasi: edukasi,
					anjuran: anjuran,
					terapi: terapi,
					kriteria: kriteria,
					konsul: konsul,
					rekonobatya: rekonobatya,
					rekonobattidak: rekonobattidak
				},
				success: function(ajaxData) {
					swal('Simpan Data Berhasil');
					},
				error: function(ajaxData) {
					swal('Simpan Data Gagal');
				}
			});
		}


	const datangSendiriCheckbox = document.getElementById('datangSendiri');
	const rujukanDariCheckbox = document.getElementById('rujukanDari');
	const isianText = document.getElementById('isian');

	datangSendiriCheckbox.addEventListener('change', function() {
		if (this.checked) {
			rujukanDariCheckbox.checked = false;
			isianText.disabled = true;
		}
	});

	rujukanDariCheckbox.addEventListener('change', function() {
		if (this.checked) {
			datangSendiriCheckbox.checked = false;
			isianText.disabled = false;
		} else {
			isianText.disabled = true;
		}
	});



	const autoCheckbox = document.getElementById('Auto');
	const alloCheckbox = document.getElementById('Allo');
	const allotextText = document.getElementById('Allotext');

	autoCheckbox.addEventListener('change', function() {
		if (this.checked) {
			alloCheckbox.checked = false;
			allotextText.disabled = true;
		}
	});

	alloCheckbox.addEventListener('change', function() {
		if (this.checked) {
			autoCheckbox.checked = false;
			allotextText.disabled = false;
		} else {
			allotextText.disabled = true;
		}
	});


	const preventifCheckbox = document.getElementById('preventif');
	const paliatifCheckbox = document.getElementById('paliatif');
	const kuratifCheckbox = document.getElementById('kuratif');
	const rehabilitatipCheckbox = document.getElementById('rehabilitatip');

	preventifCheckbox.addEventListener('change', function() {
		if (this.checked) {
			paliatifCheckbox.checked = false;
			kuratifCheckbox.checked = false;
			rehabilitatipCheckbox.checked = false;
		}
	});

	paliatifCheckbox.addEventListener('change', function() {
		if (this.checked) {
			preventifCheckbox.checked = false;
			kuratifCheckbox.checked = false;
			rehabilitatipCheckbox.checked = false;
		}
	});

	kuratifCheckbox.addEventListener('change', function() {
		if (this.checked) {
			preventifCheckbox.checked = false;
			paliatifCheckbox.checked = false;
			rehabilitatipCheckbox.checked = false;
		}
	});

	rehabilitatipCheckbox.addEventListener('change', function() {
		if (this.checked) {
			preventifCheckbox.checked = false;
			paliatifCheckbox.checked = false;
			kuratifCheckbox.checked = false;
		}
	});


	const alergitidakCheckbox = document.getElementById('alergitidak');
	const alergiyaCheckbox = document.getElementById('alergiya');
	const alergitextText = document.getElementById('alergitext');

	alergitidakCheckbox.addEventListener('change', function() {
		if (this.checked) {
			alergiyaCheckbox.checked = false;
			alergitextText.disabled = true;
		}
	});

	alergiyaCheckbox.addEventListener('change', function() {
		if (this.checked) {
			alergitidakCheckbox.checked = false;
			alergitextText.disabled = false;
		} else {
			alergitextText.disabled = true;
		}
	});

	function checkKondisi(clickedCheckbox) {
		var checkboxes = document.querySelectorAll('input[name="kondisi"]');
		
		checkboxes.forEach(function(checkbox) {
			if (checkbox !== clickedCheckbox) {
				checkbox.checked = false;
			}
		});
	}

	function checkKesadaran(clickedCheckbox) {
		var checkboxes = document.querySelectorAll('input[name="kesadaran"]');
		
		checkboxes.forEach(function(checkbox) {
			if (checkbox !== clickedCheckbox) {
				checkbox.checked = false;
			}
		});
	}

	function checkNyeri(clickedCheckbox) {
		var checkboxes = document.querySelectorAll('input[name="nyerirasa"]');
		
		checkboxes.forEach(function(checkbox) {
			if (checkbox !== clickedCheckbox) {
				checkbox.checked = false;
			}
		});
	}

	function checkSifat(clickedCheckbox) {
		var checkboxes = document.querySelectorAll('input[name="sifat"]');
		
		checkboxes.forEach(function(checkbox) {
			if (checkbox !== clickedCheckbox) {
				checkbox.checked = false;
			}
		});
	}

	function kualitasnyeri(clickedCheckbox) {
		var checkboxes = document.querySelectorAll('input[name="kualitasnyeri"]');
		
		checkboxes.forEach(function(checkbox) {
			if (checkbox !== clickedCheckbox) {
				checkbox.checked = false;
			}
		});
	}

	function Frekuensi(clickedCheckbox) {
		var checkboxes = document.querySelectorAll('input[name="frekuensi"]');
		
		checkboxes.forEach(function(checkbox) {
			if (checkbox !== clickedCheckbox) {
				checkbox.checked = false;
			}
		});
	}

	function Menjalar(checkbox) {
		var textInput = document.getElementById('menjalarke');
		var checkboxTidak = document.getElementById('menjalartidak');
		var checkboxYa = document.getElementById('menjalarya');

		if (checkbox.id === 'menjalartidak' && checkbox.checked) {
			textInput.disabled = true;
			checkboxYa.checked = false;
		} else if (checkbox.id === 'menjalarya' && checkbox.checked) {
			textInput.disabled = false;
			checkboxTidak.checked = false;
		} else {
			textInput.disabled = true;
		}
	}

	function ToggleDirawat(checkbox) {
		var konsulInput = document.getElementById('konsul');
		if (checkbox.checked) {
			konsulInput.disabled = false;
		} else {
			konsulInput.value = ""; // Kosongkan nilai input
			konsulInput.disabled = true;
		}
	}

	function TogglePulang(checkbox) {
		var konsulInput = document.getElementById('konsul');
		var izinDokterCheckbox = document.getElementById('izinDokter');
		var permintaanSendiriCheckbox = document.getElementById('permintaanSendiri');
		if (checkbox.checked) {
			izinDokterCheckbox.disabled = false;
			permintaanSendiriCheckbox.disabled = false;
			konsulInput.checked = false; 
		} else {
			izinDokterCheckbox.checked = false; // Uncheck Izin Dokter
			permintaanSendiriCheckbox.checked = false; // Uncheck Permintaan Sendiri
			izinDokterCheckbox.disabled = true;
			permintaanSendiriCheckbox.disabled = true;
		}
	}



	// ==================
	
	const checkboxes = document.querySelectorAll('input[name="kondisi"]');
	const jamMeninggalTextbox = document.getElementById('jammeninggal');

	checkboxes.forEach((checkbox) => {
		checkbox.addEventListener('change', function() {
			checkboxes.forEach((cb) => {
				if (cb !== this) {
					cb.checked = false;
				}
			});

		});
	});

// 	function tambahterapi() {
// 	var no_rm = document.getElementById("no_rm").value;
// 	var notransaksi = document.getElementById("notransaksi").value;
	
// 		$.ajax({
// 			url: "<?php echo site_url(); ?>/rme/addrecordterapi",
// 			type: "GET",
// 			data : {
// 					no_rm : no_rm, 
// 					notransaksi : notransaksi, 
// 					},
// 					success: function (ajaxData){
// 					console.log(ajaxData);
// 					var dt = JSON.parse(ajaxData);
// 					$("#tabelterapi tbody tr").remove();
// 					$("#tabelterapi tbody").append(dt.dtview);
// 					},
// 					error: function (ajaxData) {
// 						console.log(ajaxData);
// 					}
// 		}); 	
// }

// function bukaformterapi(id) {
// 	var no_rm = document.getElementById("no_rm").value;
// 	var notransaksi = document.getElementById("kode_dokter").value;
// 		$.ajax({
// 			url: "<?php echo site_url(); ?>/rme/panggilformterapi",
// 			type: "GET",
// 			data : {
// 					id : id,
// 					no_rm : no_rm,
// 					notransaksi : notransaksi
// 					},
// 			success : function(ajaxData){
// 				// console.log(ajaxData);
// 				$("#formmodal").html(ajaxData);
//                     $("#formmodal").modal('show', {
//                         backdrop: 'true'
//                     });
//                     modaldetailtutup();
// 			},
// 			error: function(ajaxData) {
// 				$.notify("Gagal Memproses Data", "error");
// 			}
// 		}); 	
// }


	</script>


