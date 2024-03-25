<link rel="stylesheet" href="../../assets/template_baru/dist/vendors/icheck/skins/all.css">


<div class="card">
	<div class="col-12 mt-4 ml-3">
		<!-- <span style="font-size: 16px; font-weight: bold; color: navy;">TRIASE</span> -->
		<div class="w-sm-100 mr-auto"><h6 class="mb-0" style="color: navy;">FORM ASESMEN AWAL KEPERAWATAN</h6></div>

	</div>
	<div class="col-12 mt-2 ml-3">
			<!-- =========== -->
				<div class="tab-pane fade show" id="tabasesmenawalmedis" role="tabpanel">
					<nav>
						<div class="nav nav-tabs" id="subnav1" role="tablist">
							<a class="nav-item nav-link active" id="subtabriwayat" data-toggle="tab" href="#riwayat"
								role="tab" aria-controls="subnav1-1" aria-selected="true">Riwayat Kesehatan</a>
								
								<a class="nav-item nav-link" id="subtabdissability" data-toggle="tab" href="#dissability"
								role="tab" aria-controls="subnav1-7" aria-selected="true">Dissability / Neurologi</a>

							<a class="nav-item nav-link" id="subtabpemeriksaan" data-toggle="tab" href="#pemeriksaan"
								role="tab" aria-controls="subnav1-2" aria-selected="false">Pemeriksaan Fisik</a>

						

							<!-- <a class="nav-item nav-link" id="subtabkebidanan" data-toggle="tab" href="#kebidanan" -->
								<!-- role="tab" aria-controls="subnav1-8" aria-selected="true">Kebidanan dan Anak</a> -->

							<!-- <a class="nav-item nav-link" id="subtabalergi" data-toggle="tab" href="#alergi" role="tab"
								aria-controls="subnav1-3" aria-selected="false">Status | Alergi</a> -->

							<a class="nav-item nav-link" id="subtabnyeri" data-toggle="tab" href="#nyeri" role="tab"
								aria-controls="subnav1-4" aria-selected="false">Nyeri</a>
							<a class="nav-item nav-link" id="subtabresiko" data-toggle="tab" href="#resiko" role="tab"
								aria-controls="subnav1-5" aria-selected="false">Resiko Jatuh</a>
							<a class="nav-item nav-link" id="subtabgizi" data-toggle="tab" href="#gizi" role="tab"
								aria-controls="subnav1-9" aria-selected="false">Gizi</a>
							<a class="nav-item nav-link" id="subtabasesmen" data-toggle="tab" href="#asesmen" role="tab"
								aria-controls="subnav1-6" aria-selected="false">Asesmen Fungsional | Discharge
								Planning</a>
						</div>
						<div class="tab-content" id="subnav1-content">
							<!-- --------------- Konten Riwayat Kesehatan ------------- -->
							<div class="tab-pane fade show active" id="riwayat" role="tabpanel"
								aria-labelledby="subtabriwayat">
								<div class="card">
									<div class="card-body">
										<div class="col-md-12 mt-3">
											<div class="form-group row col-spacing-row">
												<label class="col-md-1">Hambatan</label>
												<div class="col-md-11">
													<label><input type="radio" class="state iradio_square-red"
															id="tidakada" name="hambatan" value="1" <?php if ($dtaskep->hambatan == 1) {echo "checked";} ?>> Tidak Ada</label>
													<label><input type="radio" class="state iradio_square-red ml-3"
															id="ada" name="hambatan" value="2" <?php if ($dtaskep->hambatan == 2) {echo "checked";} ?>> Ada</label>
													<label><input type="radio" class="state iradio_square-red ml-3"
															id="bahasa" name="hambatan" value="3" <?php if ($dtaskep->hambatan == 3) {echo "checked";} ?>> Bahasa</label>
													<label><input type="radio" class="state iradio_square-red ml-3"
															id="fisik" name="hambatan" value="4" <?php if ($dtaskep->hambatan == 4) {echo "checked";} ?>> Fisik</label>
													<label><input type="radio" class="state iradio_square-red ml-3"
															id="tuli" name="hambatan" value="5" <?php if ($dtaskep->hambatan == 5) {echo "checked";} ?>> Tuli</label>
													<label><input type="radio" class="state iradio_square-red ml-3"
															id="bisu" name="hambatan" value="6" <?php if ($dtaskep->hambatan == 6) {echo "checked";} ?>> Bisu</label>
													<label><input type="radio" class="state iradio_square-red ml-3"
															id="buta" name="hambatan" value="7" <?php if ($dtaskep->hambatan == 7) {echo "checked";} ?>> Buta</label>
													<label><input type="radio" class="state iradio_square-red ml-3"
															id="lainnya" name="hambatan" value="8" <?php if ($dtaskep->hambatan == 8) {echo "checked";} ?>> Lainnya</label>
												</div>
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group row col-spacing-row">
												<label class="col-md-2 col-form-label">Keluhan Utama</label>
												<div class="col-md-12">
													<div class="form-check form-check-inline">
														<textarea id="keluhanutama" name="keluhanutama" rows="7"
															style="width: 1200px;"><?php echo $dtaskep->keluhanutama ?></textarea>
													</div>
												</div>
											</div>
										</div> 
										<div class="col-md-12 mt-3">
											<div class="form-group row col-spacing-row">
												<label class="col-md-1 col-form-label">Airway</label>
												<div class="col-md-11">
													<label><input type="radio" class="state iradio_square-red"
															id="bebas" name="airway" value="1" <?php if ($dtaskep->airway == 1) {echo "checked";} ?>> Bebas</label>
													<label><input type="radio" class="state iradio_square-red ml-3"
															id="hidung" name="airway" value="2" <?php if ($dtaskep->airway == 2) {echo "checked";} ?>> Hidung/Mulut
														Kotor</label>
													<label><input type="radio" class="state iradio_square-red ml-3"
															id="pangkal" name="airway" value="3" <?php if ($dtaskep->airway == 3) {echo "checked";} ?>> Pangkal Lidah
														Jatuh</label>
													<label><input type="radio" class="state iradio_square-red ml-3"
															id="lainnya" name="airway" value="4" <?php if ($dtaskep->airway == 4) {echo "checked";} ?>> Lainnya,
														Sebutkan</label>
													<div class="form-check form-check-inline ml-3" <?php if ($dtaskep->airway == 5) {echo "checked";} ?>>
														<input type="text" id="airwaylain" name="airwaylain"
															class="form-control"
															style="width: 300px; border: 1px solid;" value="<?php echo $dtaskep->airwaylain ?>">
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-12 mt-2">
											<div class="form-group row col-spacing-row">
												<label class="col-md-1 col-form-label">Breating</label>
												<div class="col-md-11">
													<label><input type="radio" class="state iradio_square-red"
															id="normal" name="breating" value="1" <?php if ($dtaskep->breating == 1) {echo "checked";} ?>> Normal</label>
													<label><input type="radio" class="state iradio_square-red ml-3"
															id="apnoe" name="breating" value="2"  <?php if ($dtaskep->breating == 2) {echo "checked";} ?>> Apnoe</label>
													<label><input type="radio" class="state iradio_square-red ml-3"
															id="dispnea" name="breating" value="3"  <?php if ($dtaskep->breating == 3) {echo "checked";} ?>>
														Dispnea</label>
													<label><input type="radio" class="state iradio_square-red ml-3"
															id="retraksi" name="breating" value="4"  <?php if ($dtaskep->breating == 4) {echo "checked";} ?>>
														Retraksi Dada</label>
													<label><input type="radio" class="state iradio_square-red ml-3"
															id="lainnyabreating" name="breating" value="5"  <?php if ($dtaskep->breating == 5) {echo "checked";} ?>>
														Lainnya, Sebutkan</label>
													<div class="form-check form-check-inline ml-3">
														<input type="text" id="breatinglain"
															name="breatinglain" class="form-control"
															style="width: 300px; border: 1px solid;" value="<?php echo $dtaskep->breatinglain ?>">
													</div>
													<br> 
													<div class="form-check form-check-inline">
														<label class="col-form-label">RR </label>
														<input type="text" id="rr"
															name="rr" class="form-control ml-3"
															style="width: 800; border: 1px solid;" value="<?php echo $dtaskep->rr ?>">
													</div>
													<label class="col-form-label ml-5">Pola Pernapasan </label>
													<label><input type="radio" class="state iradio_square-red ml-3"
															id="normal" name="polapernapasan" value="1"  <?php if ($dtaskep->pola == 1) {echo "checked";} ?>>
														Normal</label>
													<label><input type="radio" class="state iradio_square-red ml-3"
															id="tidak" name="polapernapasan" value="2"  <?php if ($dtaskep->pola == 2) {echo "checked";} ?>>
														Tidak</label>
													<div class="form-check form-check-inline">
														<label class="col-form-label">Jelaskan </label>
														<input type="text" id="polapernapasantext"
															name="polapernapasantext" class="form-control ml-3"
															style="width: 300px; border: 1px solid;" value="<?php echo $dtaskep->polalain ?>">
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-12 mt-2">
											<div class="form-group row col-spacing-row">
												<label class="col-md-1 col-form-label">Circulation</label>
												<div class="col-md-11">
													<div class="form-check form-check-inline">
														<label class="col-form-label">TD </label>
														<input type="text" id="td" name="td" class="form-control ml-3"
															style="width: 800; border: 1px solid;" value="<?php echo $dtaskep->td ?>">
													</div>
													<div class="form-check form-check-inline">
														<label class="col-form-label">Nadi </label>
														<input type="text" id="nadi" name="nadi"
															class="form-control ml-3"
															style="width: 800; border: 1px solid;" value="<?php echo $dtaskep->nadi ;?>">
													</div>
													<label><input type="radio" class="state iradio_square-red ml-3"
															id="teratur" name="naditeratur" value="1" <?php if ($dtaskep->naditeratur == 1) {echo "checked";} ?>>
														Teratur</label>
													<label><input type="radio" class="state iradio_square-red ml-3"
															id="tidakteratur" name="naditeratur"
															value="2"  <?php if ($dtaskep->naditeratur == 2) {echo "checked";} ?>> Tidak Teratur</label>
													<br>

													<div class="form-check form-check-inline">
														<label class="col-form-label">Suhu </label>
														<input type="text" id="suhu" name="suhu"
															class="form-control ml-3"
															style="width: 800; border: 1px solid;" value="<?php echo $dtaskep->suhu ;?>">
													</div>
													<label class="col-form-label ml-5">Akral </label>
													<label><input type="radio" class="state iradio_square-red ml-3"
															id="hangat" name="akral" value="1" <?php if ($dtaskep->akral == 1) {echo "checked";} ?>> Hangat</label>
													<label><input type="radio" class="state iradio_square-red ml-3"
															id="dingin" name="akral" value="1" <?php if ($dtaskep->akral == 2) {echo "checked";} ?>>
														Dingin</label>
													<br>
													<label class="col-form-label">Pendarahan / Kehilangan Cairan
													</label>
													<label><input type="radio" class="state iradio_square-red ml-3"
															id="pendarahanada" name="pendarahan" value="1" <?php if ($dtaskep->pendarahan == 1) {echo "checked";} ?>>
														Tidak</label>
													<label><input type="radio" class="state iradio_square-red ml-3"
															id="pendarahantdkada" name="pendarahan" value="2" <?php if ($dtaskep->pendarahan == 2) {echo "checked";} ?>> Ada
													</label>
													<div class="form-check form-check-inline">
														<label class="col-form-label">Jelaskan </label>
														<input type="text" id="pendarahantext" name="pendarahantext"
															class="form-control ml-3"
															style="width: 400px; border: 1px solid;" value="<?php echo $dtaskep->pendarahantext; ?>">
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-12 mt-2">
											<div class="form-group row col-spacing-row">
												<label class="col-md-1 col-form-label">Luka Bakar</label>
												<div class="col-md-11">
													<div class="form-check form-check-inline">
														<input type="text" id="lukabakar" name="lukabakar" class="form-control ml-3"
															style="width: 200%; border: 1px solid;"  value="<?php echo $dtaskep->lukabakar; ?>">
													</div>
													<label class="col-form-label">%</label>
												</div>
											</div>
											<div class="form-group row col-spacing-row">
												<div class="col-md-12">
													<label class="col-form-label">CRT </label>
													<label><input type="radio" class="state iradio_square-red ml-3"
															id="crt1" name="crt" value="1" <?php if ($dtaskep->crt == 1) {echo "checked";} ?>>
														< 2 Detik</label>
															<label><input type="radio"
																	class="state iradio_square-red ml-3"
																	id="crt2" name="crt"
																	value="2" <?php if ($dtaskep->pendarahan == 2) {echo "checked";} ?>> >2 Detik </label>

															<label class="col-form-label ml-5">Kulit </label>
															<label><input type="radio"
																	class="state iradio_square-red ml-2"
																	id="kulitkering" name="kulit" value="1" <?php if ($dtaskep->kulit == 1) {echo "checked";} ?>>
																Kering</label>
															<label><input type="radio"
																	class="state iradio_square-red ml-2"
																	id="kulitlambab" name="kulit" value="2" <?php if ($dtaskep->kulit == 2) {echo "checked";} ?>>
																Lembab </label>

															<label class="col-form-label ml-5">Akral </label>
															<label><input type="radio"
																	class="state iradio_square-red ml-2"
																	id="akralluka1" name="akralluka" value="1" <?php if ($dtaskep->akralluka == 1) {echo "checked";} ?>>
																Hangat</label>
															<label><input type="radio"
																	class="state iradio_square-red ml-2"
																	id="akralluka2" name="akralluka" value="2" <?php if ($dtaskep->akralluka == 2) {echo "checked";} ?>>
																Dingin </label>
															<label><input type="radio"
																	class="state iradio_square-red ml-2"
																	id="akralluka3" name="akralluka" value="3" <?php if ($dtaskep->akralluka == 3) {echo "checked";} ?>>
																Edemia </label>

															<label class="col-form-label ml-5">Turgor </label>
															<label><input type="radio"
																	class="state iradio_square-red ml-2" id="turgornormal"
																	name="Turgor" value="1" <?php if ($dtaskep->turgor == 1) {echo "checked";} ?>> Normal</label>
															<label><input type="radio"
																	class="state iradio_square-red ml-2"
																	id="turgorsedang" name="Turgor" value="2" <?php if ($dtaskep->turgor == 2) {echo "checked";} ?>>
																Sedang </label>
															<label><input type="radio"
																	class="state iradio_square-red ml-2"
																	id="turgorkurang" name="Turgor" value="3" <?php if ($dtaskep->turgor == 2) {echo "checked";} ?>>
																Kurang </label>
												</div>
											</div>
										</div>

										<div class="col-md-12 mt-3">
											<div class="form-group row col-spacing-row">
												<label class="col-md-1">Alergi</label>
												<div class="col-md-11">
													<label><input type="radio" class="state iradio_square-red ml-3"
															id="alergi-tidak" name="alergi" value="1" <?php if ($dtaskep->alergi == 1) {echo "checked";} ?>> Tidak</label>
													<label><input type="radio" class="state iradio_square-red"
															id="alergi-ya" name="alergi" value="2" <?php if ($dtaskep->alergi == 2) {echo "checked";} ?>> Ya</label>

													<div class="form-check form-check-inline ml-3">
														<textarea id="alergitext" name="alergitext" rows="4"
															style="width: 800px;"><?php echo $dtaskep->alergitext; ?></textarea>

													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-12 mb-5">
										<div class="col-6 text-left">
											<button onclick="saveriwayat()" class="btn btn-primary"
												data-bs-dismiss="modal">Simpan</button>
										</div>
										<div class="col-6">
											<!-- <button onclick="Batal()" class="btn btn-danger">Batal Save</button> -->
										</div>
									</div>
								</div>
							</div>

							<div class="tab-pane fade" id="dissability" role="tabpanel"
								aria-labelledby="subtabdissability">
								<div class="card">
									<div class="card-body">
										<div class="col-md-12 mt-3">
											<div class="form-group row col-spacing-row">
												<div class="col-md-12">
													<label class="col-form-label">BUKA MATA </label>
													<label>
														<input type="radio" class="state iradio_square-red ml-3"
															id="spontan" name="bukamata" value="4"  <?php if ($dtaskep->bukamata == 4) {echo "checked";} ?>> Spontan
													</label>
													<label>
														<input type="radio" class="state iradio_square-red ml-3"
															id="denganperintah" name="bukamata" value="3" <?php if ($dtaskep->bukamata == 3) {echo "checked";} ?> > Dengan
														Perintah
													</label>
													<label>
														<input type="radio" class="state iradio_square-red ml-3"
															id="padanyeri" name="bukamata" value="2" <?php if ($dtaskep->bukamata == 2) {echo "checked";} ?>> Pada Nyeri
													</label>
													<label>
														<input type="radio" class="state iradio_square-red ml-3"
															id="tidakada" name="bukamata" value="1" <?php if ($dtaskep->bukamata == 1) {echo "checked";} ?>> Tidak Ada
													</label>
												</div>
											</div>
										</div>
										<div class="col-md-12 mt-3">
											<div class="form-group row col-spacing-row">
												<div class="col-md-12">
													<label class="col-form-label">RESPON MOTORIK </label>
													<label>
														<input type="radio" class="state iradio_square-red ml-3"
															id="menurutperintah" name="responmotorik" value="6" <?php if ($dtaskep->responmotorik == 6) {echo "checked";} ?>> Menurut
														pada perintah
													</label>
													<label>
														<input type="radio" class="state iradio_square-red ml-3"
															id="padarangsangnyeri" name="responmotorik" value="5" <?php if ($dtaskep->responmotorik == 5) {echo "checked";} ?>> Pada
														Rangsang Nyeri
													</label>
													<label>
														<input type="radio" class="state iradio_square-red ml-3"
															id="fleksimenarik" name="responmotorik" value="4" <?php if ($dtaskep->responmotorik == 4) {echo "checked";} ?>> Fleksi
														Menarik
													</label>
													<label>
														<input type="radio" class="state iradio_square-red ml-3"
															id="fleksiabnormal" name="responmotorik" value="3" <?php if ($dtaskep->responmotorik == 3) {echo "checked";} ?>> Fleksi
														Abnormal
													</label>
													<label>
														<input type="radio" class="state iradio_square-red ml-3"
															id="ekstensi" name="responmotorik" value="2" <?php if ($dtaskep->responmotorik == 2) {echo "checked";} ?>> Ekstensi
													</label>
													<label>
														<input type="radio" class="state iradio_square-red ml-3"
															id="tanparespon" name="responmotorik" value="1" <?php if ($dtaskep->responmotorik == 1) {echo "checked";} ?>> Tanpa
														Respon
													</label>
												</div>
											</div>
										</div>
										<div class="col-md-12 mt-3">
											<div class="form-group row col-spacing-row">
												<div class="col-md-12">
													<label class="col-form-label">RESPON VERBAL </label>
													<label>
														<input type="radio" class="state iradio_square-red ml-3"
															id="orientasibaik" name="responverbal" value="5" <?php if ($dtaskep->responverbal == 5) {echo "checked";} ?>> Orientasi Baik
													</label>
													<label>
														<input type="radio" class="state iradio_square-red ml-3"
															id="orientasiburuk" name="responverbal" value="4" <?php if ($dtaskep->responverbal == 4) {echo "checked";} ?>> Orientasi
														Buruk
													</label>
													<label>
														<input type="radio" class="state iradio_square-red ml-3"
															id="bicarangacau" name="responverbal" value="3" <?php if ($dtaskep->responverbal == 3) {echo "checked";} ?>> Bicara Ngacau
													</label>
													<label>
														<input type="radio" class="state iradio_square-red ml-3"
															id="tanpaarti" name="responverbal" value="2" <?php if ($dtaskep->responverbal == 2) {echo "checked";} ?>> Tanpa Arti
													</label>
													<label>
														<input type="radio" class="state iradio_square-red ml-3"
															id="tanparespon" name="responverbal" value="1" <?php if ($dtaskep->responverbal == 1) {echo "checked";} ?>> Tanpa Respon
													</label>

												</div>
											</div>
										</div>
										<div class="col-md-12 mt-3">
											<div class="form-group row col-spacing-row">
												<div class="col-md-12">
													<label class="col-form-label">Hasil Nilai GCS </label>
													<div class="form-check form-check-inline">
														<label class="col-form-label ml-5">E </label>
														<input type="text" id="gcs_e" name="gcs_e" class="form-control ml-3"
															style="width: 100px; border: 1px solid;" value="<?php echo $dtaskep->gcs_e; ?>">
													</div>
													<div class="form-check form-check-inline">
														<label class="col-form-label">M </label>
														<input type="text" id="gcs_m" name="gcs_m"
															class="form-control ml-3"
															style="width: 100px; border: 1px solid;" value="<?php echo $dtaskep->gcs_m; ?>">
													</div>
													<div class="form-check form-check-inline">
														<label class="col-form-label">V </label>
														<input type="text" id="gcs_v" name="gcs_v"
															class="form-control ml-3"
															style="width: 100px; border: 1px solid;" value="<?php echo $dtaskep->gcs_v; ?>">
													</div>
												</div>
											</div>
										</div>

										<div class="col-md-12 mt-3">
											<div class="form-group row col-spacing-row">
												<div class="col-md-12">
													<label class="col-form-label">Kesadaran </label>
													<label>
														<input type="radio" class="state iradio_square-red ml-3"
															id="composmentis" name="kesadaran" value="1"  <?php if ($dtaskep->kesadaran == 1) {echo "checked";} ?>> Composmentis
													</label>
													<label>
														<input type="radio" class="state iradio_square-red ml-3"
															id="apatis" name="kesadaran" value="2" <?php if ($dtaskep->kesadaran == 2) {echo "checked";} ?>> Apatis
													</label>
													<label>
														<input type="radio" class="state iradio_square-red ml-3"
															id="somnolen" name="kesadaran" value="3" <?php if ($dtaskep->kesadaran == 3) {echo "checked";} ?>> Somnolen
													</label>
													<label>
														<input type="radio" class="state iradio_square-red ml-3"
															id="soporokoma" name="kesadaran" value="4" <?php if ($dtaskep->kesadaran == 4) {echo "checked";} ?>> Soporokoma
													</label>
													<label>
														<input type="radio" class="state iradio_square-red ml-3"
															id="coma" name="kesadaran" value="5" <?php if ($dtaskep->kesadaran == 5) {echo "checked";} ?>> Coma
													</label>


													<div class="form-check form-check-inline">
														<label class="col-form-label ml-5">Pupil, Diameter Pupil
														</label>
														<input type="text" id="pupiltext" name="pupiltext"
															class="form-control ml-3"
															style="width: 100px; border: 1px solid;" value="<?php echo $dtaskep->pupiltext; ?>">
														<br>
														<label>
															<input type="radio" class="state iradio_square-red ml-3"
																id="isokor" name="pupil" value="1" <?php if ($dtaskep->pupil == 1) {echo "checked";} ?>> Isokor
														</label>
														<label>
															<input type="radio" class="state iradio_square-red ml-3"
																id="miosis" name="pupil" value="2"  <?php if ($dtaskep->pupil == 2) {echo "checked";} ?>> Miosis
														</label>
														<label>
															<input type="radio" class="state iradio_square-red ml-3"
																id="anisokor" name="pupil" value="3"  <?php if ($dtaskep->pupil == 3) {echo "checked";} ?>>
															Anisokor
														</label>
														<label>
															<input type="radio" class="state iradio_square-red ml-3"
																id="midriasis" name="pupil" value="4"  <?php if ($dtaskep->pupil == 4) {echo "checked";} ?>>
															Midriasis
														</label>
													</div>

												</div>
											</div>
										</div>
										
										<div class="col-md-12 mt-3">
											<div class="form-group row col-spacing-row">
												<div class="col-md-12">
													<label class="col-form-label">Reflek Cahaya </label>
													<label>
														<input type="radio" class="state iradio_square-red ml-3"
															id="negatif" name="cahaya" value="1" <?php if ($dtaskep->cahaya == 1) {echo "checked";} ?> > Negatif
													</label>
													<label>
														<input type="radio" class="state iradio_square-red ml-3"
															id="positif" name="cahaya" value="2" <?php if ($dtaskep->cahaya == 2) {echo "checked";} ?>> Positif
													</label>
													<label class="col-form-label ml-5">Kekuatan otot : </label>
													<div class="form-check form-check-inline">
														<label class="col-form-label ml-2">Ekstreamitas atas </label>
														<input type="text" id="ototatas" name="ototatas"
															class="form-control ml-3"
															style="width: 100px; border: 1px solid;" value="<?php echo $dtaskep->ototatas; ?>">
													</div>
													<div class="form-check form-check-inline">
														<label class="col-form-label ml-2">Ekstreamitas bawah </label>
														<input type="text" id="ototbawah"
															name="ototbawah" class="form-control ml-3"
															style="width: 100px; border: 1px solid;" value="<?php echo $dtaskep->ototbawah; ?>">
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-12 mt-5">
											<div class="form-group row col-spacing-row">
												<!-- <div class="col-md-3" style="border: 1px solid #000;">
													EKSPLOSURE
													<br>
													<br>
													<img src="../../assets/image/rm/bodyfull.jpeg" alt="Gambar" style="max-width: 100%;">
												</div> -->
												<div class="col-md-4 mb-2" style="border: 1px solid #000;">
													<canvas id="myCanvas" width="500" height="300" ></canvas>
													<button onclick="undo()">Undo</button>
													<button onclick="saveCanvasToDatabase()">Save</button>
												</div>
												<div class="col-md-6 mt-4 ml-5">
													<div class="form-group row col-spacing-row">
														<input class="state icheckbox_square-red" type="checkbox" id="vulnus" name="vulnus"<?php echo ($dtaskep->vulnus == 1) ? "checked" : ""; ?>> Vulnus
														<input class="state icheckbox_square-red ml-3" type="checkbox" id="dislokasi" name="dislokasi" class="form-check-input" <?php echo ($dtaskep->dislokasi == 1) ? "checked" : ""; ?>> Dislokasi

														<input class="state icheckbox_square-red ml-3" type="checkbox" id="fraktur" name="fraktur" class="form-check-input" <?php echo ($dtaskep->fraktur == 1) ? "checked" : ""; ?>> Fraktur

														<input class="state icheckbox_square-red ml-3" type="checkbox" id="ekimosis" name="ekimosis" class="form-check-input" <?php echo ($dtaskep->ekimosis == 1) ? "checked" : ""; ?>> Ekimosis

														<input class="state icheckbox_square-red ml-3" type="checkbox" id="ekskoriase" name="ekskoriase" class="form-check-input" <?php echo ($dtaskep->ekskoriase == 1) ? "checked" : ""; ?>> Ekskoriase

														<input class="state icheckbox_square-red ml-3" type="checkbox" id="hematoma" name="hematoma" class="form-check-input" <?php echo ($dtaskep->hematoma == 1) ? "checked" : ""; ?>> Hematoma

														<input class="state icheckbox_square-red ml-3" type="checkbox" id="contusio" name="contusio" class="form-check-input" <?php echo ($dtaskep->contusio == 1) ? "checked" : ""; ?>> Contusio
													</div>	
													<div class="form-group row col-spacing-row mt-1">
														Tandai (x) gangguna tersebut di gambar anatomi
													</div>
													<div class="form-group row col-spacing-row mt-3">
														<input class="state icheckbox_square-red" type="checkbox" id="doa" name="doa"<?php echo ($dtaskep->doa == 1) ? "checked" : ""; ?>> Death on Arival
													</div>

													<div class="form-group row col-spacing-row mt-2">
														Tanda Kehidupan
													</div>
													<div class="form-group row col-spacing-row mt-3">
														<input class="state icheckbox_square-red" type="checkbox" id="denyutnadi" name="denyutnadi"<?php echo ($dtaskep->denyutnadi == 1) ? "checked" : ""; ?>> Denyut Nadi (-)
													</div>
													<div class="form-group row col-spacing-row mt-3">
														<input class="state icheckbox_square-red" type="checkbox" id="reflekcahaya" name="reflekcahaya"<?php echo ($dtaskep->reflekcahaya == 1) ? "checked" : ""; ?>> Reflek Cahaya (-)
													</div>
													<div class="form-group row col-spacing-row mt-3">
														<input class="state icheckbox_square-red" type="checkbox" id="ekgasystole" name="ekgasystole"<?php echo ($dtaskep->ekgasystole == 1) ? "checked" : ""; ?>> EKG Asystole
													</div>
													<div class="form-check form-check-inline mt-2">
														<label class="col-form-label">Jam Penentuan Kematian </label>
														<input type="time" id="jammati" name="jammati"
															class="form-control ml-3"
															style="width: 100px; border: 1px solid;" value="<?php echo $dtaskep->gcs_m; ?>">
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-12 mb-5">
										<div class="col-6 text-left">
											<button onclick="savedissability()" class="btn btn-primary" data-bs-dismiss="modal">Simpan</button>
										</div>
										<div class="col-6">
											<!-- <button onclick="Batal()" class="btn btn-danger">Batal Save</button> -->
										</div>
									</div>
								</div>
							</div>

							<!-- Kebidanan dan anak -->
							<div class="tab-pane fade" id="kebidanan" role="tabpanel" aria-labelledby="subtabkebidanan">
								Kebidanan dan anak
							</div>

							<!-- savepemeriksaanfisik -->
							<!-- Konten Pemeriksaan Fisik -->
							<div class="tab-pane fade" id="pemeriksaan" role="tabpanel"
								aria-labelledby="subtabpemeriksaan">
								<div class="card">
									<div class="card-body">
										<div class="col-md-12 mt-3">
											<div class="form-group row col-spacing-row">
												<div class="col-md-12">
													<label class="col-form-label"
														style="font-weight: bold; font-size: 14px; color: #090773;">PEMERIKSAAN
														FISIK</label>
												</div>
												<div class="col-md-12">
													<label class="col-form-label">Kesadaran </label>
													<label>
														<input type="radio" class="state iradio_square-red ml-3"
															id="composmentis" name="kesadaranfisik" value="1" <?php if ($dtaskep->kesadaranfisik == 1) {echo "checked";} ?>> Composmentis
													</label>
													<label>
														<input type="radio" class="state iradio_square-red ml-3"
															id="apatis" name="kesadaranfisik" value="2" <?php if ($dtaskep->kesadaranfisik == 2) {echo "checked";} ?>> Apatis
													</label>
													<label>
														<input type="radio" class="state iradio_square-red ml-3"
															id="somnolen" name="kesadaranfisik" value="3" <?php if ($dtaskep->kesadaranfisik == 3) {echo "checked";} ?>> Somnolen
													</label>
													<label>
														<input type="radio" class="state iradio_square-red ml-3"
															id="soporokoma" name="kesadaranfisik" value="4" <?php if ($dtaskep->kesadaranfisik == 4) {echo "checked";} ?>> Soporokoma
													</label>
													<label>
														<input type="radio" class="state iradio_square-red ml-3"
															id="coma" name="kesadaranfisik" value="5" <?php if ($dtaskep->kesadaranfisik == 5) {echo "checked";} ?>> Coma
													</label>
												</div>
												<div class="col-md-12">
													<div class="form-check form-check-inline">
														<label class="col-form-label">Keadaan Umum </label>
														<input type="text" id="keadaanumum" name="keadaanumum"
															class="form-control ml-3"
															style="width: 200px; border: 1px solid;" value="<?php echo $dtaskep->keadaanumum; ?>">

														<label class="col-form-label ml-3">Berat Badan (kg)</label>
														<input type="text" id="beratbadan" name="beratbadan"
															class="form-control ml-3"
															style="width:100px; border: 1px solid;" value="<?php echo $dtaskep->beratbadan; ?>">
													</div>

													<div class="form-check form-check-inline mt-2">
														<label class="col-form-label">Tanda Tanda Vital </label>
														<label class="col-form-label ml-2">TD </label>
														<input type="text" id="td_fisik" name="td_fisik"
															class="form-control ml-3"
															style="width: 100px; border: 1px solid;" value="<?php echo $dtaskep->td_fisik; ?>">

														<label class="col-form-label ml-3">HR (x/m)</label>
														<input type="text" id="hr_fisik" name="hr_fisik" class="form-control ml-3"
															style="width:100px; border: 1px solid;" value="<?php echo $dtaskep->hr_fisik; ?>">
														
															<label class="col-form-label ml-3">RR (x/m)</label>
														<input type="text" id="rr_fisik" name="rr_fisik" class="form-control ml-3"
															style="width:100px; border: 1px solid;" value="<?php echo $dtaskep->rr_fisik; ?>">
														
															<label class="col-form-label ml-3">Suhu</label>
														<input type="text" id="suhu_fisik" name="suhu_fisik"
															class="form-control ml-3"
															style="width:100px; border: 1px solid;" value="<?php echo $dtaskep->suhu_fisik; ?>">
													</div>
												</div>
												<br>
												<br>
												<div class="col-md-12 mt-3">
													<label class="col-form-label"
														style="font-weight: bold; font-size: 14px; color: #090773;">URAIAN</label>
													<div class="col-md-12 mt-3">
														<div class="form-group row col-spacing-row">
															<label class="col-md-1 col-form-label">Kepala</label>
															<div class="col-md-11">
																<label><input type="radio"
																		class="state iradio_square-red" id="normal"
																		name="kepala" value="1" <?php if ($dtaskep->kepala == 1) {echo "checked";} ?>> Normal</label>
																<label><input type="radio"
																		class="state iradio_square-red ml-3"
																		id="benjolan" name="kepala" value="2" <?php if ($dtaskep->kepala == 2) {echo "checked";} ?>>
																	Benjolan</label>
																<label><input type="radio"
																		class="state iradio_square-red ml-3" id="luka"
																		name="kepala" value="3" <?php if ($dtaskep->kepala == 3) {echo "checked";} ?>> Luka</label>
																<label><input type="radio"
																		class="state iradio_square-red ml-3"
																		id="lainnya" name="kepala" value="4" <?php if ($dtaskep->kepala == 4) {echo "checked";} ?>>
																	Lainnya</label>
																<div class="form-check form-check-inline ml-3">
																	<input type="text" id="kepalatext" name="kepalatext"
																		class="form-control"
																		style="width: 800; border: 1px solid;" value="<?php echo $dtaskep->kepalatext; ?>">
																</div>
															</div>
														</div>
													</div>
													<div class="col-md-12 mt-2">
														<div class="form-group row col-spacing-row">
															<label class="col-md-1 col-form-label">Mata</label>
															<div class="col-md-11">
																<label><input type="radio"
																		class="state iradio_square-red" id="mata-normal"
																		name="mata" value="1" <?php if ($dtaskep->mata == 1) {echo "checked";} ?>> Normal</label>
																<label class="col-form-label ml-5">Pupil : </label>
																<label><input type="radio"
																		class="state iradio_square-red ml-3" id="isokor"
																		name="mata" value="2" <?php if ($dtaskep->mata == 2) {echo "checked";} ?>> Isokor</label>
																<label><input type="radio"
																		class="state iradio_square-red ml-3"
																		id="anisokor" name="mata" value="3" <?php if ($dtaskep->mata == 3) {echo "checked";} ?>>
																	Anisokor</label>
																<label><input type="radio"
																		class="state iradio_square-red ml-3"
																		id="mata-lainnya" name="mata" value="4" <?php if ($dtaskep->mata == 4) {echo "checked";} ?>>
																	Lainnya</label>
																<div class="form-check form-check-inline ml-3">
																	<input type="text" id="matatext" name="matatext"
																		class="form-control"
																		style="width: 800; border: 1px solid;" value="<?php echo $dtaskep->matatext; ?>">
																</div>
															</div>
														</div>
													</div>
													<div class="col-md-12 mt-3">
														<div class="form-group row col-spacing-row">
															<label class="col-md-1 col-form-label">THT</label>
															<div class="col-md-11">
																<label><input type="radio"
																		class="state iradio_square-red" id="tht-normal"
																		name="tht" value="1" <?php if ($dtaskep->tht == 1) {echo "checked";} ?>> Normal</label>
																<label><input type="radio"
																		class="state iradio_square-red ml-3"
																		id="tht-luka" name="tht" value="2" <?php if ($dtaskep->tht == 2) {echo "checked";} ?>>
																	Luka</label>
																<label><input type="radio"
																		class="state iradio_square-red ml-3"
																		id="tht-sumbatan" name="tht" value="3" <?php if ($dtaskep->tht == 3) {echo "checked";} ?>>
																	Sumbatan</label>
																<label><input type="radio"
																		class="state iradio_square-red ml-3"
																		id="tht-lainnya" name="tht" value="4" <?php if ($dtaskep->tht == 4) {echo "checked";} ?>>
																	Lainnya</label>
																<div class="form-check form-check-inline ml-3">
																	<input type="text" id="thttext" name="thttext"
																		class="form-control"
																		style="width: 800; border: 1px solid;"  value="<?php echo $dtaskep->thttext; ?>">
																</div>
															</div>
														</div>
													</div>
													<div class="col-md-12 mt-3">
														<div class="form-group row col-spacing-row">
															<label class="col-md-1 col-form-label">Mulut</label>
															<div class="col-md-11">
																<label><input type="radio"
																		class="state iradio_square-red"
																		id="mulut-normal" name="mulut" value="1" <?php if ($dtaskep->mulut == 1) {echo "checked";} ?>>
																	Normal</label>
																<label><input type="radio"
																		class="state iradio_square-red ml-3"
																		id="mulut-luka" name="mulut" value="2" <?php if ($dtaskep->mulut == 2) {echo "checked";} ?>>
																	Luka</label>
																<label><input type="radio"
																		class="state iradio_square-red ml-3"
																		id="mulut-benjolan" name="mulut"
																		value="3" <?php if ($dtaskep->mulut == 3) {echo "checked";} ?>> Benjolan</label>
																<label><input type="radio"
																		class="state iradio_square-red ml-3"
																		id="mulut-lainnya" name="mulut" value="4" <?php if ($dtaskep->mulut == 4) {echo "checked";} ?>>
																	Lainnya</label>
																<div class="form-check form-check-inline ml-3">
																	<input type="text" id="muluttext" name="muluttext"
																		class="form-control"
																		style="width: 800; border: 1px solid;" value="<?php echo $dtaskep->muluttext; ?>">
																</div>
															</div>
														</div>
													</div>
													<div class="col-md-12 mt-3">
														<div class="form-group row col-spacing-row">
															<label class="col-md-1 col-form-label">Leher</label>
															<div class="col-md-11">
																<label><input type="radio"
																		class="state iradio_square-red"
																		id="leher-normal" name="leher" value="1" <?php if ($dtaskep->leher == 1) {echo "checked";} ?>>
																	Normal</label>
																<label><input type="radio"
																		class="state iradio_square-red ml-3"
																		id="leher-luka" name="leher" value="2" <?php if ($dtaskep->leher == 2) {echo "checked";} ?> >
																	Luka</label>
																<label><input type="radio"
																		class="state iradio_square-red ml-3"
																		id="leher-benjolan" name="3"
																		value="Benjolan" <?php if ($dtaskep->leher == 3) {echo "checked";} ?>> Benjolan</label>
																<label><input type="radio"
																		class="state iradio_square-red ml-3"
																		id="leher-lainnya" name="leher" value="4" <?php if ($dtaskep->leher == 4) {echo "checked";} ?>>
																	Lainnya</label>
																<div class="form-check form-check-inline ml-3">
																	<input type="text" id="lehertext" name="lehertext-text"
																		class="form-control"
																		style="width: 800; border: 1px solid;" value="<?php echo $dtaskep->lehertext; ?>">
																</div>
															</div>
														</div>
													</div>
													<div class="col-md-12 mt-3">
														<div class="form-group row col-spacing-row">
															<label class="col-md-1 col-form-label">Thorax</label>
															<div class="col-md-11">
																<label><input type="radio"
																		class="state iradio_square-red"
																		id="thorax-normal" name="thorax" value="1" <?php if ($dtaskep->thorax == 1) {echo "checked";} ?>>
																	Normal</label>
																<label><input type="radio"
																		class="state iradio_square-red ml-3"
																		id="thorax-luka" name="thorax" value="2" <?php if ($dtaskep->thorax == 2) {echo "checked";} ?>>
																	Luka</label>
																<label><input type="radio"
																		class="state iradio_square-red ml-3"
																		id="thorax-benjolan" name="thorax"
																		value="3" <?php if ($dtaskep->thorax == 3) {echo "checked";} ?>> Benjolan</label>
																<label><input type="radio"
																		class="state iradio_square-red ml-3"
																		id="thorax-lainnya" name="thorax"
																		value="4" <?php if ($dtaskep->thorax == 4) {echo "checked";} ?>> Lainnya</label>
																<div class="form-check form-check-inline ml-3">
																	<input type="text" id="thoraxtext"
																		name="thoraxtext" class="form-control"
																		style="width: 800; border: 1px solid;" value="<?php echo $dtaskep->thoraxtext; ?>">
																</div>
															</div>
														</div>
													</div>
													<div class="col-md-12 mt-3">
														<div class="form-group row col-spacing-row">
															<label class="col-md-1 col-form-label">Payudara</label>
															<div class="col-md-11">
																<label><input type="radio"
																		class="state iradio_square-red"
																		id="payudara-normal" name="payudara" value="1" <?php if ($dtaskep->payudara == 1) {echo "checked";} ?>>
																	Normal</label>
																<label><input type="radio"
																		class="state iradio_square-red ml-3"
																		id="payudara-luka" name="payudara" value="2" <?php if ($dtaskep->payudara == 2) {echo "checked";} ?>>
																	Luka</label>
																<label><input type="radio"
																		class="state iradio_square-red ml-3"
																		id="payudara-benjolan" name="payudara"
																		value="3" <?php if ($dtaskep->payudara == 3) {echo "checked";} ?>> Benjolan</label>
																<label><input type="radio"
																		class="state iradio_square-red ml-3"
																		id="payudara-lainnya" name="payudara"
																		value="4" <?php if ($dtaskep->payudara == 4) {echo "checked";} ?>> Lainnya</label>
																<div class="form-check form-check-inline ml-3">
																	<input type="text" id="payudaratext"
																		name="payudaratext" class="form-control"
																		style="width: 800; border: 1px solid;" value="<?php echo $dtaskep->payudaratext; ?>">
																</div>
															</div>
														</div>
													</div>
													<div class="col-md-12 mt-3">
														<div class="form-group row col-spacing-row">
															<label class="col-md-1 col-form-label">Abdomen</label>
															<div class="col-md-11">
																<label><input type="radio"
																		class="state iradio_square-red"
																		id="abdomen-normal" name="abdomen"
																		value="1" <?php if ($dtaskep->abdomen == 1) {echo "checked";} ?>> Normal</label>
																<label><input type="radio"
																		class="state iradio_square-red ml-3"
																		id="abdomen-asistes" name="abdomen"
																		value="2" <?php if ($dtaskep->abdomen == 2) {echo "checked";} ?>> Asistes</label>
																<label><input type="radio"
																		class="state iradio_square-red ml-3"
																		id="abdomen-tegang" name="abdomen"
																		value="3" <?php if ($dtaskep->abdomen == 3) {echo "checked";} ?>> Tegang</label>
																<label><input type="radio"
																		class="state iradio_square-red ml-3"
																		id="abdomen-masa" name="abdomen" value="4" <?php if ($dtaskep->abdomen == 4) {echo "checked";} ?>>
																	Masa</label>
																<label><input type="radio"
																		class="state iradio_square-red ml-3"
																		id="abdomen-lainnya" name="abdomen"
																		value="5" <?php if ($dtaskep->abdomen == 5) {echo "checked";} ?>> Lainnya</label>
																<div class="form-check form-check-inline ml-3">
																	<input type="text" id="abdomentext"
																		name="abdomentext" class="form-control"
																		style="width: 800; border: 1px solid;" value="<?php echo $dtaskep->abdomentext; ?>">
																</div>
															</div>
														</div>
													</div>
													<div class="col-md-12 mt-3">
														<div class="form-group row col-spacing-row">
															<label class="col-md-1 col-form-label">Urogenital</label>
															<div class="col-md-11">
																<label><input type="radio"
																		class="state iradio_square-red"
																		id="urogenital-normal" name="urogenital"
																		value="1" <?php if ($dtaskep->urogenital == 1) {echo "checked";} ?>> Normal</label>
																<label><input type="radio"
																		class="state iradio_square-red ml-3"
																		id="urogenital-tidak-normal" name="urogenital"
																		value="2" <?php if ($dtaskep->urogenital == 2) {echo "checked";} ?>> Tidak Normal</label>
																<label><input type="radio"
																		class="state iradio_square-red ml-3"
																		id="urogenital-lainnya" name="urogenital"
																		value="3" <?php if ($dtaskep->urogenital == 3) {echo "checked";} ?>> Lainnya</label>
																<div class="form-check form-check-inline ml-3">
																	<input type="text" id="urogenitaltext"
																		name="urogenitaltext" class="form-control"
																		style="width: 800; border: 1px solid;" value="<?php echo $dtaskep->urogenitaltext; ?>">
																</div>
															</div>
														</div>
													</div>
													<div class="col-md-12 mt-3">
														<div class="form-group row col-spacing-row">
															<label class="col-md-1 col-form-label">Ekstermitas</label>
															<div class="col-md-11">
																<label><input type="radio"
																		class="state iradio_square-red"
																		id="ekstermitas-normal" name="ekstermitas"
																		value="1" <?php if ($dtaskep->ekstermitas == 1) {echo "checked";} ?>> Normal</label>
																<label class="col-form-label ml-5">Atas : </label>
																<label><input type="radio"
																		class="state iradio_square-red ml-3"
																		id="ekstermitas-atas" name="ekstermitas"
																		value="2" <?php if ($dtaskep->ekstermitas == 2) {echo "checked";} ?>> Kuat</label>
																<label><input type="radio"
																		class="state iradio_square-red ml-3"
																		id="ekstermitas-atas" name="ekstermitas"
																		value="3" <?php if ($dtaskep->ekstermitas == 3) {echo "checked";} ?>> Lemah</label>
																<label class="col-form-label ml-5">Bawah : </label>
																<label><input type="radio"
																		class="state iradio_square-red ml-3"
																		id="ekstermitas-bawah" name="ekstermitas"
																		value="4" <?php if ($dtaskep->ekstermitas == 4) {echo "checked";} ?>> Kuat</label>
																<label><input type="radio"
																		class="state iradio_square-red ml-3"
																		id="ekstermitas-bawah" name="ekstermitas"
																		value="5" <?php if ($dtaskep->ekstermitas == 5) {echo "checked";} ?>> Lemah</label>
															</div>
														</div>
													</div>

												</div>
											</div>
										</div>
									</div>
									<div class="col-md-12 mb-5">
										<div class="col-6 text-left">
											<button onclick="savepemeriksaanfisik()" class="btn btn-primary"
												data-bs-dismiss="modal">Simpan</button>
										</div>
										<div class="col-6">
											<!-- <button onclick="Batal()" class="btn btn-danger">Batal Save</button> -->
										</div>
									</div>
								</div>
							</div>

							<div class="tab-pane fade" id="alergi" role="tabpanel" aria-labelledby="subtabalergi">
								Konten Status | Alergi 
								<!-- //tidak dibuat -->
							</div>

							<!-- savenyeri -->
							<div class="tab-pane fade" id="nyeri" role="tabpanel" aria-labelledby="subtabnyeri">
								<div class="card">
									<div class="card-body">
										<div class="col-md-12">
											<div class="form-group row col-spacing-row mt-3">
												<label class="col-md-1" style="font-size: 13px;">Nyeri</label>
												<div class="col-md-11">
													<label><input type="radio" class="state iradio_square-red ml-3" id="nyeri1" name="nyeri" value="1" <?php if ($dtaskep->nyeri == 1) {echo "checked";} ?>> Tidak</label>
													<label><input type="radio" class="state iradio_square-red ml-3" id="nyeri2" name="nyeri" value="2" <?php if ($dtaskep->nyeri == 2) {echo "checked";} ?>> Ya</label>
												</div>
											</div>	
											<br>
											<div class="form-group row col-spacing-row">
												<label class="col-md-1" style="font-size: 13px;">Sifat</label>
												<div class="col-md-11">
													<label><input type="radio" class="state iradio_square-red ml-3" id="sifat1" name="sifat" value="1" <?php if ($dtaskep->sifat == 1) {echo "checked";} ?>> Akut</label>
													<label><input type="radio" class="state iradio_square-red ml-3" id="sifat2" name="sifat" value="2" <?php if ($dtaskep->sifat == 2) {echo "checked";} ?>> Kronis</label>
												</div>
											</div>
											<br>
											<div class="form-group row col-spacing-row">
												<div class="col-md-1">
												</div>
												<div class="col-md-11">
													<img src="../../assets/image/rm/nyeri.png" alt="Gambar Nyeri"
														style="max-width: 100%;">
												</div>
											</div>
											<br>
											<div class="form-group row col-spacing-row mb-1">
												<label class="col-md-1" style="font-size: 13px;">Kualitas Nyeri</label>
												<div class="col-md-11">
													<label><input type="radio" class="state iradio_square-red ml-3" id="kualitasnyeri1" name="kualitasnyeri" value="1" <?php if ($dtaskep->kualitasnyeri == 1) {echo "checked";} ?>> Akut</label>
													<label><input type="radio" class="state iradio_square-red ml-3" id="kualitasnyeri2" name="kualitasnyeri" value="2" <?php if ($dtaskep->kualitasnyeri == 2) {echo "checked";} ?>> Kronis</label>
													<label><input type="radio" class="state iradio_square-red ml-3" id="kualitasnyeri3" name="kualitasnyeri" value="3" <?php if ($dtaskep->kualitasnyeri == 3) {echo "checked";} ?>> Kronis</label>
												</div>
											</div>
											<div class="form-group row col-spacing-row">
												<label class="col-md-1 mt-1" style="font-size: 13px;">Menjalar</label>
												<div class="col-md-11">
												<label><input type="radio" class="state iradio_square-red ml-3" id="menjalar1" name="menjalar" value="1" <?php if ($dtaskep->menjalar == 1) {echo "checked";} ?>> Tidak </label>
													<label><input type="radio" class="state iradio_square-red ml-3" id="menjalar2" name="menjalar" value="2" <?php if ($dtaskep->menjalar == 2) {echo "checked";} ?>> Ya, ke </label>
													<div class="form-check form-check-inline ml-3">
														<input type="text" class="form-control col-form-label"
															id="menjalartextaksep" style="width: 250px; border: 1px solid">
													</div>
												</div>
											</div>
											<div class="form-group row col-spacing-row mt-2">
												<label class="col-md-1 col-form-label">Skor Nyeri</label>
												<div class="col-md-11">
													<input type="text" class="form-control col-form-label" id="skornyeri"
														style="width: 100px; border: 1px solid;"
														value="<?php echo $dtaskep->skornyeri ?>">

												</div>
											</div>
											<div class="form-group row col-spacing-row mt-3">
												<label class="col-md-1">Frekuensi</label>
												<div class="col-md-11">
													<label><input type="radio" class="state iradio_square-red ml-3" id="frekuensi1" name="frekuensi" value="1" <?php if ($dtaskep->frekuensi == 1) {echo "checked";} ?>> Akut</label>
													<label><input type="radio" class="state iradio_square-red ml-3" id="frekuensi2" name="frekuensi" value="2" <?php if ($dtaskep->frekuensi == 2) {echo "checked";} ?>> Kronis</label>
													<label><input type="radio" class="state iradio_square-red ml-3" id="frekuensi3" name="frekuensi" value="3" <?php if ($dtaskep->frekuensi == 3) {echo "checked";} ?>> Kronis</label>
												</div>
											</div>
											<div class="form-group row col-spacing-row mt-3">
												<label class="col-md-1">Mempengaruhi</label>
												<div class="col-md-11">
													<label><input type="radio" class="state iradio_square-red ml-3" id="mempengaruhi1" name="mempengaruhi" value="1" <?php if ($dtaskep->mempengaruhi == 1) {echo "checked";} ?>> Tidur</label>
													<label><input type="radio" class="state iradio_square-red ml-3" id="mempengaruhi2" name="mempengaruhi" value="2" <?php if ($dtaskep->mempengaruhi == 2) {echo "checked";} ?>> Aktifitas Fisik</label>
													<label><input type="radio" class="state iradio_square-red ml-3" id="mempengaruhi3" name="mempengaruhi" value="3" <?php if ($dtaskep->mempengaruhi == 3) {echo "checked";} ?>> Konsentrasi</label>
													<label><input type="radio" class="state iradio_square-red ml-3" id="mempengaruhi4" name="mempengaruhi" value="4" <?php if ($dtaskep->mempengaruhi == 4) {echo "checked";} ?>> Emosi</label>
													<label><input type="radio" class="state iradio_square-red ml-3" id="mempengaruhi5" name="mempengaruhi" value="5" <?php if ($dtaskep->mempengaruhi == 5) {echo "checked";} ?>> Nafsu Makan</label>
												</div>
											</div>
											<div class="form-group row col-spacing-row mt-3">
												<label class="col-md-5 col-form-label"
													style="font-weight: bold; font-size: 14px; color: #0D0687;">SKALA
													FLCC untuk Anak < 6 Tahun</label>
											</div>
											<div class="form-group row col-spacing-row">
												<div class="col-md-12">
													<table border="1" style="width: 80%;">
														<tr style="background-color: #ccc;">
															<th style="width: 15%; text-align: center;" height="30px">
																Pengkajian</th>
															<th style="width: 25%; text-align: center;">0</th>
															<th style="width: 25%; text-align: center;">1</th>
															<th style="width: 25%; text-align: center;">2</th>
															<th style="width: 10%; text-align: center;">Nilai</th>
														</tr>
														<tr>
															<td>Wajah</td>
															<td>Tersenyum / Tidak ada Ekspresi Khusus</td>
															<td>Terkadang Meringis</td>
															<td>Sering menggetarkan dagu dan mengetupkan rahang</td>
															<td><input type="text" id="wajah" name="wajah"
																	value="<?php echo $dtaskep->wajah ?>"></td>
														</tr>
														<tr>
															<td>Kaki</td>
															<td>Gerakan Normal Relaksasi</td>
															<td>Tidak Tenang/tegang</td>
															<td>Kaki dibuat menendang / menarik diri</td>
															<td><input type="text" id="kaki" name="kaki"
																	value="<?php echo $dtaskep->kaki ?>"></td>
														<tr>
															<td>Aktif</td>
															<td>Tidur, posisi normal, mudah bergerak</td>
															<td>Gerakan menggeliat, berguling, kaku</td>
															<td>Melengkunggkan punggu / kaku / menghentak</td>
															<td><input type="text" id="aktifitas" name="aktifitas"
																	value="<?php echo $dtaskep->aktifitas ?>"></td>

														</tr>
														<tr>
															<td>Menangis</td>
															<td>Tidak menangis (bangun / Tidur)</td>
															<td>Mengerang / Merengek</td>
															<td>Menangis Terus, terisak, menjerit</td>
															<td><input type="text" id="menangis" name="menangis"
																	value="<?php echo $dtaskep->menangis ?>"></td>
														</tr>
														<tr>
															<td>Bersuara</td>
															<td>Bersuara Normal, tenang</td>
															<td>Tenang bila dipeluk, digending, atau diajak bicara</td>
															<td>Sulit untuk ditenangkan</td>
															<td><input type="text" id="bersuara" name="bersuara"
																	value="<?php echo $dtaskep->bersuara ?>"></td>
														</tr>
													</table>
													<br>
												</div>
											</div>
											<div class="form-group row col-spacing-row">
												<label class="col-md-10 col-form-label">Hasil Skrining</label>
											</div>
											<div class="form-group row col-spacing-row">
												<label class="col-md-2 col-form-label text-right">(P) Faktor
													Pencetus</label>
												<div class="col-md-6">
													<input type="text" class="form-control col-form-label"
														style="border: 1px solid;" name="pencetus" id="pencetus"
														value="<?php echo $dtaskep->pencetus ?>">
												</div>
											</div>
											<div class="form-group row col-spacing-row">
												<label class="col-md-2 col-form-label text-right">(Q) Faktor
													Kualitas</label>
												<div class="col-md-6">
													<input type="text" class="form-control col-form-label"
														style="border: 1px solid;" name="kualitasskrining" id="kualitasskrining"
														value="<?php echo $dtaskep->kualitasskrining ?>">
												</div>
											</div>
											<div class="form-group row col-spacing-row">
												<label class="col-md-2 col-form-label text-right">(R) Lokasi</label>
												<div class="col-md-6">
													<input type="text" class="form-control col-form-label"
														style="border: 1px solid;" name="lokasi" id="lokasi"
														value="<?php echo $dtaskep->lokasi ?>">
												</div>
											</div>
											<div class="form-group row col-spacing-row">
												<label class="col-md-2 col-form-label text-right">(S) Skala
													Nyeri</label>
												<div class="col-md-6">
													<input type="text" class="form-control col-form-label"
														style="border: 1px solid;" name="skalanyeri" id="skalanyeri"
														value="<?php echo $dtaskep->skalanyeri ?>">
												</div>
											</div>
											<div class="form-group row col-spacing-row">
												<label class="col-md-2 col-form-label text-right">(T) Lama Nyeri</label>
												<div class="col-md-6">
													<input type="text" class="form-control col-form-label"
														style="border: 1px solid;" name="lamanyeri" id="lamanyeri"
														value="<?php echo $dtaskep->lamanyeri ?>">
												</div>
											</div>
											<div class="form-group row col-spacing-row mt-3">
												<label class="col-md-10 col-form-label">PEMERIKSAAN PENUNJANG</label>
											</div>
											<div class="form-group row col-spacing-row">
												<div class="col-md-10">
													<input class="state icheckbox_square-red" type="checkbox"
														id="lab" name="lab" class="form-check-input"
														<?php echo ($dtaskep->lab == 1) ? "checked" : ""; ?>>
													Laboratorium
													<input class="state icheckbox_square-red ml-3" type="checkbox"
														id="rad" name="rad" class="form-check-input" <?php echo ($dtaskep->rad == 1) ? "checked" : ""; ?>> Radiologi
													<input class="state icheckbox_square-red  ml-3" type="checkbox"
														id="ekg" name="ekg" class="form-check-input" <?php echo ($dtaskep->ekg == 1) ? "checked" : ""; ?>> EKG
													<div class="form-check form-check-inline ml-3">
														<label class="col-form-label">Penunjang Lainnya </label>
														<input type="text" class="form-control col-form-label  ml-3"
															id="penunjanglain" name="penunjanglain"
															style="width: 250px; border: 1px solid"
															value="<?php echo $dtaskep->penunjanglain ?>">
													</div>
												</div>
											</div>
											<div class="form-group row col-spacing-row mt-3">
												<label class="col-md-1">Diagnosa Kerja</label>
												<div class="col-md-11">
													<div class="form-check form-check-inline">
														<textarea id="diagnosakerja" name="diagnosakerja" rows="3"
															style="width: 1000px;"><?php echo $dtaskep->diagnosakerja ?>"</textarea>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-12 mb-5">
										<div class="col-6 text-left">
											<button onclick="savenyeri()" class="btn btn-primary"
												data-bs-dismiss="modal">Simpan</button>
										</div>
										<div class="col-6">
											<!-- <button onclick="Batal()" class="btn btn-danger">Batal Save</button> -->
										</div>>
									</div>
								</div>
							</div>
							<!-- resiko jatuh ========= -->
							<!-- savejatuh -->
							<div class="tab-pane fade" id="resiko" role="tabpanel" aria-labelledby="subtabresiko">
								<div class="card">
									<div class="card-body">
										<div class="col-md-12 mt-3">
											<label class="col-form-label"
												style="font-size: 14px; color: blue;">Penilaian Resiko Jatuh (Pasien
												Dewasa)</label>
											<br>
											a. Perhatikan cara berjalan pasien saat hendak duduk di kursi, apakah tampak
											tidak seimbang
											<br>
											b. Apakah pasien memegang pinggiran kursi atau meja atau benda lain sebagai
											penopang saat akan duduk
											<br>
											HASIL :
										</div>
										<div class="col-md-12 mt-3">
											<div class="form-group row col-spacing-row">
												<div class="col-md-11">
													<label><input type="radio" class="state iradio_square-red"
															id="resiko-resikojatuhdewasa1" name="resikojatuhdewasa" value="1" <?php if ($dtaskep->resikojatuhdewasa == 1) {echo "checked";} ?>>
														Tidak Beresiko (Tidak ditemukan a dan b)</label>
													<label><input type="radio" class="state iradio_square-red ml-3"
															id="resiko-resikojatuhdewasa2" name="resikojatuhdewasa" value="2" <?php if ($dtaskep->resikojatuhdewasa == 2) {echo "checked";} ?>>
														Resiko Rendah (Ditemukan a atau b)</label>
													<label><input type="radio" class="state iradio_square-red ml-3"
															id="resiko-resikojatuhdewasa3" name="resikojatuhdewasa" value="3" <?php if ($dtaskep->resikojatuhdewasa == 3) {echo "checked";} ?>>
														Resiko Tinggi (Ditemukan a dan b)</label>
												</div>
											</div>
										</div>
										<div class="col-md-12 mt-3">
											<label class="col-form-label"
												style="font-size: 14px; color: blue;">Penilaian Resiko Jatuh (Pasien
												Anak)</label>
											<br>
											a. Apakah ada riwayat jatuh dari tempat tidur
											<br>
											b. Apakah pasien menggunakan obat penenang
											<br>
											HASIL :
										</div>
										<div class="col-md-12 mt-3">
											<div class="form-group row col-spacing-row">
												<div class="col-md-11">
													<label><input type="radio" class="state iradio_square-red"
															id="resikojatuhanak1" name="resikojatuhanak" value="1" <?php if ($dtaskep->resikojatuhanak == 1) {echo "checked";} ?>>
														Tidak Beresiko</label>
													<label><input type="radio" class="state iradio_square-red ml-3"
															id="resikojatuhanak2" name="resikojatuhanak" value="2" <?php if ($dtaskep->resikojatuhanak == 2) {echo "checked";} ?>>
														Resiko Rendah</label>
													<label><input type="radio" class="state iradio_square-red ml-3"
															id="resikojatuhanak3" name="resikojatuhanak" value="3" <?php if ($dtaskep->resikojatuhanak == 3) {echo "checked";} ?>>
														Resiko Tinggi</label>
												</div>
											</div>
											<div class="form-group row col-spacing-row mt-3">
												<label class="col-md-1">Hasil Skrinning</label>
												<div class="col-md-11">
													<div class="form-check form-check-inline">
														<textarea id="hasilskrinning" name="hasilskrinning" rows="2"
															style="width: 800px;"><?php echo $dtaskep->hasilskrinning ?></textarea>
													</div>
												</div>
											</div>
											<div class="form-group row col-spacing-row mt-3">
												<label class="col-md-1">Saran</label>
												<div class="col-md-11">
													<div class="form-check form-check-inline">
														<textarea id="saran" name="saran" rows="3"
															style="width: 800px;"><?php echo $dtaskep->saran ?></textarea>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-12 mb-5">
									<div class="col-6 text-left">
										<button onclick="savejatuh()" class="btn btn-primary"
											data-bs-dismiss="modal">Simpan</button>
									</div>
									<div class="col-6">
										<!-- <button onclick="Batal()" class="btn btn-danger">Batal Save</button> -->
									</div>
								</div>
							</div>
							<div class="tab-pane fade" id="gizi" role="tabpanel" aria-labelledby="subtabgizi">
								<div class="card">
									<div class="card-body">
										<div class="col-md-12 mt-3">
											<div class="form-check form-check-inline">
												<label class="col-form-label">Berat Badan </label>
												<input type="text" id="bbgizi" name="bbgizi" class="form-control ml-3"
													style="width: 100; border: 1px solid;" value="<?php echo $dtaskep->bbgizi ?>">
											</div>
											<div class="form-check form-check-inline">
												<label class="col-form-label">Tinggi Badan </label>
												<input type="text" id="tbgizi" name="tbgizi" class="form-control ml-3"
													style="width: 100; border: 1px solid;" value="<?php echo $dtaskep->tbgizi ?>">
											</div>
											<div class="form-check form-check-inline">
												<label class="col-form-label">IMT (BB/TB) </label>
												<input type="text" id="imtgizi" name="imimtgizit" class="form-control ml-3"
													style="width: 100; border: 1px solid;" value="<?php echo $dtaskep->imtgizi ?>">
											</div>
										</div>
										<div class="col-md-12 mt-3">
											<div class="form-check form-check-inline">
												<label>Apakah Pasien Tampak Kurus ? </label>
												<label><input type="radio" class="state iradio_square-red ml-3"
														id="kurusgizi1" name="kurusgizi" value="1" <?php if ($dtaskep->kurusgizi == 1) {echo "checked";} ?>> Ya</label>
												<label><input type="radio" class="state iradio_square-red ml-3"
														id="kurusgizi2" name="kurusgizi" value="2" <?php if ($dtaskep->kurusgizi == 2) {echo "checked";} ?>> Tidak</label>
											</div>
										</div>
										<div class="col-md-12 mt-3">
											<div class="form-check form-check-inline">
												<label>Apakah Terjadi Kenaikan dan penurunan berat badan 1 bulan
													terakhir ? </label>
												<label><input type="radio" class="state iradio_square-red ml-3"
														id="naikturunberatgizi1" name="naikturunberatgizi" value="1" <?php if ($dtaskep->naikturunberatgizi == 1) {echo "checked";} ?>> Ya</label>
												<label><input type="radio" class="state iradio_square-red ml-3"
														id="naikturunberatgizi2" name="naikturunberatgizi" value="2" <?php if ($dtaskep->naikturunberatgizi == 2) {echo "checked";} ?>> Tidak</label>
											</div>
										</div>
										<div class="col-md-12 mt-3">
											<div class="form-check form-check-inline">
												<label>Apakah Asupan makanan menurun yang dikarenakan penurunan nafsu
													makan ? </label>
												<label><input type="radio" class="state iradio_square-red ml-3"
														id="asupangizi1" name="asupangizi" value="1" <?php if ($dtaskep->asupangizi == 1) {echo "checked";} ?>> Ya</label>
												<label><input type="radio" class="state iradio_square-red ml-3"
														id="asupangizi2" name="asupangizi" value="2" <?php if ($dtaskep->asupangizi == 2) {echo "checked";} ?>> Tidak</label>
											</div>
										</div>
										<div class="col-md-12 mt-3">
											<div class="form-group row col-spacing-row mt-3">
												<label class="col-md-1">Hasil Skrinning</label>
												<div class="col-md-11">
													<div class="form-check form-check-inline">
														<textarea id="hasilgizi" name="hasilgizi" rows="2"
															style="width: 800px;"><?php echo $dtaskep->hasilgizi ?></textarea>
													</div>
												</div>
											</div>
											<div class="form-group row col-spacing-row mt-3">
												<label class="col-md-1">Saran</label>
												<div class="col-md-11">
													<div class="form-check form-check-inline">
														<textarea id="sarangizi" name="sarangizi" rows="3"
															style="width: 800px;"><?php echo $dtaskep->sarangizi ?></textarea>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-12 mb-5">
									<div class="col-6 text-left">
										<button onclick="savegizi()" class="btn btn-primary"
											data-bs-dismiss="modal">Simpan</button>
									</div>
									<div class="col-6">
										<!-- <button onclick="Batal()" class="btn btn-danger">Batal Save</button> -->
									</div>
								</div>
							</div>
							<!-- Konten Asesmen Fungsional | Discharge Planning -->
							<div class="tab-pane fade" id="asesmen" role="tabpanel" aria-labelledby="subtabasesmen">
								<div class="card">
									<div class="card-body">
										<div class="col-md-12 mt-3">
											<label class="col-form-label"
												style="font-size: 14px; color: blue;">PENGKAJIAN FUNGSI</label>
											<br>
										</div>
										<div class="col-md-12">
											<div class="form-group row col-spacing-row mt-3">
												<label class="col-md-1">SENSORIK</label>
												<label class="col-md-1">Penglihatan</label>
												<div class="col-md-10">
													<label><input type="radio" class="state iradio_square-red"
															id="penglihatan-normal" name="penglihatan" value="1"  <?php if ($dtaskep->penglihatan == 1) {echo "checked";} ?>>
														Normal</label>
													<label><input type="radio" class="state iradio_square-red ml-3"
															id="penglihatan-kabur" name="penglihatan" value="2"  <?php if ($dtaskep->penglihatan == 2) {echo "checked";} ?>>
														Kabur</label>
													<label><input type="radio" class="state iradio_square-red ml-3"
															id="penglihatan-kacamata" name="penglihatan"
															value="3">  <?php if ($dtaskep->penglihatan == 3) {echo "checked";} ?> Kacamata</label>
													<label><input type="radio" class="state iradio_square-red ml-3"
															id="penglihatan-lensa" name="penglihatan"
															value="4"  <?php if ($dtaskep->penglihatan == 4) {echo "checked";} ?>> Lensa Kontak</label>
												</div>
											</div>
										</div>
										<div class="col-md-12 mt-1">
											<div class="form-group row col-spacing-row">
												<label class="col-md-1"></label>
												<label class="col-md-1">Penciuman</label>
												<div class="col-md-10">
													<label><input type="radio" class="state iradio_square-red"
															id="penciuman-normal" name="penciuman" value="1"  <?php if ($dtaskep->penciuman == 1) {echo "checked";} ?>>
														Normal</label>
													<label><input type="radio" class="state iradio_square-red ml-3"
															id="penciuman-tidak" name="penciuman" value="2" <?php if ($dtaskep->penciuman == 2) {echo "checked";} ?>>
														Tidak</label>
												</div>
											</div>
										</div>
										<div class="col-md-12 mt-1">
											<div class="form-group row col-spacing-row">
												<label class="col-md-1"></label>
												<label class="col-md-1">Pendengaran</label>
												<div class="col-md-10">
													<label><input type="radio" class="state iradio_square-red"
															id="pendengaran-normal" name="pendengaran" value="1"  <?php if ($dtaskep->pendengaran == 2) {echo "checked";} ?>>
														Normal</label>
													<label><input type="radio" class="state iradio_square-red ml-3"
															id="pendengaran-tuli" name="pendengaran"
															value="2"  <?php if ($dtaskep->pendengaran == 2) {echo "checked";} ?>> Tuli Kanan / Kiri</label>
													<label><input type="radio" class="state iradio_square-red ml-3"
															id="pendengaran-alatbantu" name="pendengaran"
															value="3"  <?php if ($dtaskep->pendengaran == 3) {echo "checked";} ?>> Alat Bantu Dengar
														Kanan / Kiri</label>
												</div>
											</div>
										</div>
										<div class="col-md-12 mt-1">
											<div class="form-group row col-spacing-row">
												<label class="col-md-1">KOGNITIF</label>
												<div class="col-md-10">
													<label><input type="radio" class="state iradio_square-red"
															id="statusKesadaran-normal" name="kognitif"
															value="1"  <?php if ($dtaskep->kognitif == 1) {echo "checked";} ?>> Normal</label>
													<label><input type="radio" class="state iradio_square-red ml-3"
															id="statusKesadaran-pelupa" name="kognitif"
															value="2" <?php if ($dtaskep->kognitif == 2) {echo "checked";} ?>> Pelupa</label>
													<label><input type="radio" class="state iradio_square-red ml-3"
															id="statusKesadaran-bingung" name="kognitif"
															value="3" <?php if ($dtaskep->kognitif == 3) {echo "checked";} ?>> Bingung</label>
													<label><input type="radio" class="state iradio_square-red ml-3"
															id="statusKesadaran-tdkdimengerti" name="kognitif"
															value="4" <?php if ($dtaskep->kognitif == 4) {echo "checked";} ?>> Tidak dapat
														dimengerti</label>
												</div>
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group row col-spacing-row mt-3">
												<label class="col-md-1">MOTORIK</label>
												<label class="col-md-2">Aktifitas Sehari - hari</label>
												<div class="col-md-9">
													<label><input type="radio" class="state iradio_square-red"
															id="aktivitasHarian1" name="aktifitasharian"
															value="1" <?php if ($dtaskep->aktifitasharian == 1) {echo "checked";} ?>> Mandiri</label>
													<label><input type="radio" class="state iradio_square-red ml-3"
															id="aktivitasHarian2" name="aktivitasHarian"
															value="2" <?php if ($dtaskep->aktifitasharian == 2) {echo "checked";} ?>> Bantuan Minimal</label>
													<label><input type="radio" class="state iradio_square-red ml-3"
															id="aktivitasHarian3" name="aktivitasHarian"
															value="3" <?php if ($dtaskep->aktifitasharian == 3) {echo "checked";} ?>> Bantuan</label>
													<label><input type="radio" class="state iradio_square-red ml-3"
															id="aktivitasHarian4" name="aktivitasHarian" 
															value="4" <?php if ($dtaskep->aktifitasharian == 4) {echo "checked";} ?>> Ketergantungan Total</label>
												</div>
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group row col-spacing-row mt-3">
												<label class="col-md-1"></label>
												<label class="col-md-1">Berjalan</label>
												<div class="col-md-10">
													<label><input type="radio" class="state iradio_square-red"
															id="aktivitasBerjalan-tidakKesulitan"
															name="aktivitasBerjalan" value="1" <?php if ($dtaskep->berjalan == 1) {echo "checked";} ?>> Tidak
														ada kesulitan</label>
													<label><input type="radio" class="state iradio_square-red ml-3"
															id="aktivitasBerjalan-perluBantuan" name="berjalan"
															value="2"  <?php if ($dtaskep->berjalan == 2) {echo "checked";} ?>> Perlu Bantuan</label>
													<label><input type="radio" class="state iradio_square-red ml-3"
															id="aktivitasBerjalan-seringJatuh" name="berjalan"
															value="3"  <?php if ($dtaskep->berjalan == 3) {echo "checked";} ?>> Sering Jatuh</label>
													<label><input type="radio" class="state iradio_square-red ml-3"
															id="aktivitasBerjalan-kelumpuhan" name="berjalan"
															value="4"  <?php if ($dtaskep->berjalan == 4) {echo "checked";} ?>> Kelumpuhan</label>
												</div>
											</div>
										</div>

										<div class="col-md-12 mt-3">
											<label class="col-form-label"
												style="font-size: 14px; color: blue;">DISCHARGE PLANNING</label>
											<br>
											<label class="col-form-label"
												style="font-size: 12px; color: black;">SARAN</label>
										</div>
										<div class="col-md-12 mt-1">
											<label for="homecere">Pasien perlu pelayanan Home Care : </label>
											<label><input type="radio" class="state iradio_square-red ml-3"
													id="homecare1" name="homecare" value="1"  <?php if ($dtaskep->homecare == 1) {echo "checked";} ?>> Ya</label>
											<label><input type="radio" class="state iradio_square-red ml-3"
													id="homecare2" name="homecare" value="2" <?php if ($dtaskep->homecare == 2) {echo "checked";} ?>> Tidak</label>
										</div>
										<div class="col-md-12 mt-1">
											<label for="homeCare">Pasien perlu pemasangan Implan : </label>
											<label><input type="radio" class="state iradio_square-red ml-3"
													id="implan1" name="implan" value="1" <?php if ($dtaskep->implan == 1) {echo "checked";} ?>> Ya</label>
											<label><input type="radio" class="state iradio_square-red ml-3"
													id="implan2" name="implan" value="2" <?php if ($dtaskep->implan == 2) {echo "checked";} ?>> Tidak</label>
										</div>
										<div class="col-md-12 mt-1">
											<label for="homeCare">Apakah pasien ketika pulang perlu perawatan di rumah :
											</label>
											<label><input type="radio" class="state iradio_square-red ml-3"
													id="rawatdirumah1" name="rawatdirumah" value="1" <?php if ($dtaskep->rawatdirumah == 1) {echo "checked";} ?>> Ya</label>
											<label><input type="radio" class="state iradio_square-red ml-3"
													id="rawatdirumah2" name="rawatdirumah" value="2" <?php if ($dtaskep->rawatdirumah == 2) {echo "checked";} ?>> Tidak</label>
										</div>
										<div class="col-md-12 mt-2">
											<div class="form-group row col-spacing-row mt-3">
												<label class="col-md-1">Hasil Skrinning</label>
												<div class="col-md-11">
													<div class="form-check form-check-inline">
														<textarea id="hasilplanning" name="hasilplanning" rows="2"
															style="width: 800px;"><?php echo $dtaskep->hasilplanning ?></textarea>
													</div>
												</div>
											</div>
											<div class="form-group row col-spacing-row mt-3">
												<label class="col-md-1">Saran</label>
												<div class="col-md-11">
													<div class="form-check form-check-inline">
														<textarea id="saranplanning" name="saranplanning" rows="3"
															style="width: 800px;"><?php echo $dtaskep->saranplanning ?></textarea>
													</div>
												</div>
											</div>
										</div>

									</div>
									<div class="col-md-12 mb-5">
										<div class="col-6 text-left">
											<button onclick="savefungsi()" class="btn btn-primary"
												data-bs-dismiss="modal">Simpan</button>
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
			<!-- =========== -->
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

	function saveriwayat() {
		var no_rm = document.getElementById("no_rm").value;
		var kode_dokter = document.getElementById("kode_dokter").value;
		var notransaksi = document.getElementById("notransaksi").value;
		var hambatan = $("input[name='hambatan']:checked").val();
		var keluhanutama = document.getElementById("keluhanutama").value;
		var airway = $("input[name='airway']:checked").val();
		var airwaylain = document.getElementById("airwaylain").value

		var breating = $("input[name='breating']:checked").val();
		var breatinglain = document.getElementById("breatinglain").value
		var rr = document.getElementById("rr").value
		var polapernapasan = $("input[name='polapernapasan']:checked").val();
		var polapernapasantext = document.getElementById("polapernapasantext").value

		var td = document.getElementById("td").value
		var nadi = document.getElementById("nadi").value
		var naditeratur = $("input[name='naditeratur']:checked").val();

		var suhu = document.getElementById("suhu").value
		var akral = $("input[name='akral']:checked").val();
		var pendarahan = $("input[name='pendarahan']:checked").val();
		var pendarahantext = document.getElementById("pendarahantext").value
		var lukabakar = document.getElementById("lukabakar").value

		var crt = $("input[name='crt']:checked").val();
		var kulit = $("input[name='kulit']:checked").val();
		var akralluka = $("input[name='akralluka']:checked").val();
		var turgor = $("input[name='turgor']:checked").val();

		var alergi = $("input[name='alergi']:checked").val();
		var alergitext = document.getElementById("alergitext").value



		$.ajax({
			url: "<?php echo site_url(); ?>/rme/askep_saveriwayat",
			type: "GET",
			data: {
				no_rm: no_rm,
				kode_dokter: kode_dokter,
				notransaksi: notransaksi,
				hambatan : hambatan,
				keluhanutama : keluhanutama,
				airway : airway,
				airwaylain : airwaylain,
				breating : breating,
				breatinglain : breatinglain,
				rr : rr,
				polapernapasan : polapernapasan,
				polapernapasantext : polapernapasantext,
				td : td,
				nadi : nadi,
				naditeratur : naditeratur,
				suhu : suhu,
				akral : akral,
				pendarahan : pendarahan,
				pendarahantext : pendarahantext,

				lukabakar : lukabakar,
				crt : crt,
				kulit : kulit,
				akralluka : akralluka,
				turgor : turgor,

				alergi : alergi,
				alergitext : alergitext,

				// bukamata : bukamata,
				// responmotorik : responmotorik,
				// responverbal : responverbal,
				
				// gcs_e : gcs_e,
				// gcs_m : gcs_m,
				// gcs_v : gcs_v,

			},
			success: function (ajaxData) {
				swal('Simpan Data Berhasil');
			},
			error: function (ajaxData) {
				swal('Simpan Data Gagal');
			}
		});
	}


	function savedissability() {
		var no_rm = document.getElementById("no_rm").value;
		var kode_dokter = document.getElementById("kode_dokter").value;
		var notransaksi = document.getElementById("notransaksi").value;

		var bukamata = $("input[name='bukamata']:checked").val();
		var responmotorik = $("input[name='responmotorik']:checked").val();
		var responverbal = $("input[name='responverbal']:checked").val();

		var gcs_e = document.getElementById("gcs_e").value;
		var gcs_m = document.getElementById("gcs_m").value;
		var gcs_v = document.getElementById("gcs_v").value;

		var kesadaran = $("input[name='kesadaran']:checked").val();
		var pupiltext = document.getElementById("pupiltext").value;
		var pupil = $("input[name='pupil']:checked").val();
		var cahaya = $("input[name='cahaya']:checked").val();

		var ototatas = document.getElementById("ototatas").value;
		var ototbawah = document.getElementById("ototbawah").value;
		
		$.ajax({
			url: "<?php echo site_url(); ?>/rme/askep_savedissability",
			type: "GET",
			data: {
				no_rm: no_rm,
				kode_dokter: kode_dokter,
				notransaksi: notransaksi,

				bukamata : bukamata,
				responmotorik : responmotorik,
				responverbal : responverbal,
				
				gcs_e : gcs_e,
				gcs_m : gcs_m,
				gcs_v : gcs_v,

				kesadaran : kesadaran,
				pupiltext : pupiltext,
				pupil : pupil,
				cahaya : cahaya,
				ototatas : ototatas,
				ototbawah : ototbawah,

			},
			success: function (ajaxData) {
				swal('Simpan Data Berhasil');
			},
			error: function (ajaxData) {
				swal('Simpan Data Gagal');
			}
		});
	}
	
	function savepemeriksaanfisik() {
		var no_rm = document.getElementById("no_rm").value;
		var kode_dokter = document.getElementById("kode_dokter").value;
		var notransaksi = document.getElementById("notransaksi").value;

		var kesadaranfisik = $("input[name='kesadaranfisik']:checked").val();
		var keadaanumum = document.getElementById("keadaanumum").value;
		var beratbadan = document.getElementById("beratbadan").value;

		var td_fisik = document.getElementById("td_fisik").value;
		var hr_fisik = document.getElementById("hr_fisik").value;
		var rr_fisik = document.getElementById("rr_fisik").value;
		var suhu_fisik = document.getElementById("suhu_fisik").value;

		var kepala = $("input[name='kepala']:checked").val();
		var kepalatext = document.getElementById("kepalatext").value;

		var mata = $("input[name='mata']:checked").val();
		var matatext = document.getElementById("matatext").value;
		
		var tht = $("input[name='tht']:checked").val();
		var thttext = document.getElementById("thttext").value;
		
		var mulut = $("input[name='mulut']:checked").val();
		var muluttext = document.getElementById("muluttext").value;
		
		var leher = $("input[name='leher']:checked").val();
		var lehertext = document.getElementById("lehertext").value;
		
		var thorax = $("input[name='thorax']:checked").val();
		var thoraxtext = document.getElementById("thoraxtext").value;
		
		var payudara = $("input[name='payudara']:checked").val();
		var payudaratext = document.getElementById("payudaratext").value;
		
		var abdomen = $("input[name='abdomen']:checked").val();
		var abdomentext = document.getElementById("abdomentext").value;


		var abdomen = $("input[name='abdomen']:checked").val();
		var abdomentext = document.getElementById("abdomentext").value;


		var urogenital = $("input[name='urogenital']:checked").val();
		var urogenitaltext = document.getElementById("urogenitaltext").value;

		var ekstermitas = $("input[name='ekstermitas']:checked").val();


		
		$.ajax({
			url: "<?php echo site_url(); ?>/rme/askep_savepemeriksaanfisik",
			type: "GET",
			data: {
				no_rm: no_rm,
				kode_dokter: kode_dokter,
				notransaksi: notransaksi,

				kesadaranfisik : kesadaranfisik,
				keadaanumum : keadaanumum,
				beratbadan : beratbadan,

				td_fisik : td_fisik,
				hr_fisik : hr_fisik,
				rr_fisik : rr_fisik,
				suhu_fisik : suhu_fisik,

				kepala : kepala,
				kepalatext : kepalatext,
				mata : mata,
				matatext : matatext,
				tht : tht,
				mulut : mulut,
				muluttext : muluttext,
				leher : leher,
				lehertext : lehertext,

				thorax : thorax,
				thoraxtext : thoraxtext,

				payudara : payudara,
				payudaratext : payudaratext,
				abdomen : abdomen,
				abdomentext : abdomentext,

				urogenital : urogenital,
				urogenitaltext : urogenitaltext,
				ekstermitas : ekstermitas,
			},
			success: function (ajaxData) {
				swal('Simpan Data Berhasil');
			},
			error: function (ajaxData) {
				swal('Simpan Data Gagal');
			}
		});
	}
	

	function savenyeri() {
		var no_rm = document.getElementById("no_rm").value;
		var kode_dokter = document.getElementById("kode_dokter").value;
		var notransaksi = document.getElementById("notransaksi").value;

		var nyeri = $("input[name='nyeri']:checked").val();
		var sifat = $("input[name='sifat']:checked").val();
		var kualitasnyeri = $("input[name='kualitasnyeri']:checked").val();
		var menjalar = $("input[name='menjalar']:checked").val();
		var menjalartext = document.getElementById("menjalartextaksep").value;

		var skornyeri = document.getElementById("skornyeri").value;
		
		var frekuensi = $("input[name='frekuensi']:checked").val();
		var mempengaruhi = $("input[name='mempengaruhi']:checked").val();
		var kesadaranfisik = $("input[name='kesadaranfisik']:checked").val();

		var wajah = document.getElementById("wajah").value;
		var kaki = document.getElementById("kaki").value;
		var aktifitas = document.getElementById("aktifitas").value;
		var menangis = document.getElementById("menangis").value;
		var bersuara = document.getElementById("bersuara").value;

		var pencetus = document.getElementById("pencetus").value;
		var kualitasskrining = document.getElementById("kualitasskrining").value;
		var lokasi = document.getElementById("lokasi").value;
		var skalanyeri = document.getElementById("skalanyeri").value;
		var lamanyeri = document.getElementById("lamanyeri").value;

        var lab = $("#lab").prop("checked") ? 1 : 0;
        var rad = $("#rad").prop("checked") ? 1 : 0;
        var ekg = $("#ekg").prop("checked") ? 1 : 0;

		var penunjanglain = document.getElementById("penunjanglain").value;
		var diagnosakerja = document.getElementById("diagnosakerja").value;
		

		$.ajax({
			url: "<?php echo site_url(); ?>/rme/askep_savenyeri",
			type: "GET",
			data: {
				no_rm: no_rm,
				kode_dokter: kode_dokter,
				notransaksi: notransaksi,

				nyeri : nyeri,
				sifat : sifat,
				kualitasnyeri : kualitasnyeri,
				menjalar : menjalar,
				menjalartext : menjalartext,
				skornyeri : skornyeri,
				frekuensi : frekuensi,
				mempengaruhi : mempengaruhi,
				kesadaranfisik : kesadaranfisik,

				wajah : wajah,
				kaki : kaki,
				aktifitas : aktifitas,
				menangis : menangis,
				bersuara : bersuara,

				pencetus : pencetus,
				kualitasskrining : kualitasskrining,
				lokasi : lokasi,
				skalanyeri : skalanyeri,
				lamanyeri : skalanyeri,

				lab : lab,
				rad : rad,
				ekg : ekg,
				penunjanglain : penunjanglain,
				diagnosakerja : diagnosakerja,


			},
			success: function (ajaxData) {
				swal('Simpan Data Berhasil');
			},
			error: function (ajaxData) {
				swal('Simpan Data Gagal');
			}
		});
	}


	function savejatuh() {
		var no_rm = document.getElementById("no_rm").value;
		var kode_dokter = document.getElementById("kode_dokter").value;
		var notransaksi = document.getElementById("notransaksi").value;


		var resikojatuhdewasa = $("input[name='resikojatuhdewasa']:checked").val();
		var resikojatuhanak = $("input[name='resikojatuhanak']:checked").val();
		var hasilskrinning = document.getElementById("hasilskrinning").value;
		var saran = document.getElementById("saran").value;

	

		$.ajax({
			url: "<?php echo site_url(); ?>/rme/askep_savejatuh",
			type: "GET",
			data: {
				no_rm: no_rm,
				kode_dokter: kode_dokter,
				notransaksi: notransaksi,

				resikojatuhdewasa : resikojatuhdewasa,
				resikojatuhanak : resikojatuhanak,
				hasilskrinning : hasilskrinning,
				saran : saran,


			},
			success: function (ajaxData) {
				swal('Simpan Data Berhasil');
			},
			error: function (ajaxData) {
				swal('Simpan Data Gagal');
			}
		});
	}
	
	function savegizi() {
		var no_rm = document.getElementById("no_rm").value;
		var kode_dokter = document.getElementById("kode_dokter").value;
		var notransaksi = document.getElementById("notransaksi").value;


		var bbgizi = document.getElementById("bbgizi").value;
		var tbgizi = document.getElementById("tbgizi").value;
		var imtgizi = document.getElementById("imtgizi").value;


		var kurusgizi = $("input[name='kurusgizi']:checked").val();
		var naikturunberatgizi = $("input[name='naikturunberatgizi']:checked").val();
		var asupangizi = $("input[name='asupangizi']:checked").val();


		var hasilgizi = document.getElementById("hasilgizi").value;
		var sarangizi = document.getElementById("sarangizi").value;

	

		$.ajax({
			url: "<?php echo site_url(); ?>/rme/askep_savegizi",
			type: "GET",
			data: {
				no_rm: no_rm,
				kode_dokter: kode_dokter,
				notransaksi: notransaksi,

				bbgizi : bbgizi,
				tbgizi : tbgizi,
				imtgizi : imtgizi,
				kurusgizi : kurusgizi,
				naikturunberatgizi : naikturunberatgizi,
				asupangizi : asupangizi,
				hasilgizi : hasilgizi,
				sarangizi : sarangizi,
			},
			success: function (ajaxData) {
				swal('Simpan Data Berhasil');
			},
			error: function (ajaxData) {
				swal('Simpan Data Gagal');
			}
		});
	}


	function savefungsi() {
		var no_rm = document.getElementById("no_rm").value;
		var kode_dokter = document.getElementById("kode_dokter").value;
		var notransaksi = document.getElementById("notransaksi").value;

		var penglihatan = $("input[name='penglihatan']:checked").val();
		var penciuman = $("input[name='penciuman']:checked").val();
		var pendengaran = $("input[name='pendengaran']:checked").val();

		var kognitif = $("input[name='kognitif']:checked").val();
		var aktifitasharian = $("input[name='aktifitasharian']:checked").val();
		var berjalan = $("input[name='berjalan']:checked").val();
		var homecare = $("input[name='homecare']:checked").val();
		var rawatdirumah = $("input[name='rawatdirumah']:checked").val();


		var hasilplanning = document.getElementById("hasilplanning").value;
		var saranplanning = document.getElementById("saranplanning").value;

	

		$.ajax({
			url: "<?php echo site_url(); ?>/rme/askep_savefungsi",
			type: "GET",
			data: {
				no_rm: no_rm,
				kode_dokter: kode_dokter,
				notransaksi: notransaksi,

				penglihatan : penglihatan,
				penciuman : penciuman,
				pendengaran : pendengaran,
				kognitif : kognitif,
				aktifitasharian : aktifitasharian,

				berjalan : berjalan,
				homecare : homecare,
				rawatdirumah : rawatdirumah,

				hasilplanning : hasilplanning,
				saranplanning : saranplanning,
			},
			success: function (ajaxData) {
				swal('Simpan Data Berhasil');
			},
			error: function (ajaxData) {
				swal('Simpan Data Gagal');
			}
		});
	}	
</script>
<!-- 

<script>
  var canvas = document.getElementById("myCanvas");
  var ctx = canvas.getContext("2d");
  var painting = false;
  var backgroundImg = new Image();
  var strokes = []; // Array untuk menyimpan setiap langkah coretan

  backgroundImg.onload = function () {
    ctx.drawImage(backgroundImg, 0, 0, canvas.width, canvas.height);
  };

  backgroundImg.src = "../../assets/image/rm/bodyfull.jpeg";

  canvas.addEventListener("mousedown", function (e) {
    painting = true;
    draw(e);
  });

  canvas.addEventListener("mouseup", function () {
    painting = false;
    ctx.beginPath();
    saveStroke(); // Menyimpan langkah setiap kali mouse diangkat
  });

  canvas.addEventListener("mousemove", function (e) {
    if (!painting) return;
    draw(e);
  });

  function draw(e) {
    ctx.lineWidth = 5;
    ctx.lineCap = "round";
    ctx.strokeStyle = "red";

    ctx.lineTo(e.clientX - canvas.getBoundingClientRect().left, e.clientY - canvas.getBoundingClientRect().top);
    ctx.stroke();
    ctx.beginPath();
    ctx.moveTo(e.clientX - canvas.getBoundingClientRect().left, e.clientY - canvas.getBoundingClientRect().top);
  }

  function saveStroke() {
    // Menyimpan langkah coretan pada array
    var imageData = ctx.getImageData(0, 0, canvas.width, canvas.height);
    strokes.push(imageData);
  }

  function undo() {
    // Menghapus langkah terakhir dan menggambar kembali dari array
    if (strokes.length > 1) {
      strokes.pop(); // Menghapus langkah terakhir
      ctx.putImageData(strokes[strokes.length - 1], 0, 0); // Menggambar kembali dari array
    } else if (strokes.length === 1) {
      // Jika hanya ada satu langkah tersisa, hapus semua coretan
      ctx.clearRect(0, 0, canvas.width, canvas.height);
      ctx.drawImage(backgroundImg, 0, 0, canvas.width, canvas.height);
      strokes = [];
    }
  }
</script> -->


<script>
  var canvas = document.getElementById("myCanvas");
  var ctx = canvas.getContext("2d");
  var painting = false;
  var backgroundImg = new Image();
  var strokes = [];

  backgroundImg.onload = function () {
    ctx.drawImage(backgroundImg, 0, 0, canvas.width, canvas.height);
  };

  backgroundImg.src = "../../assets/image/rm/bodyfull.jpeg";

  canvas.addEventListener("mousedown", function (e) {
    painting = true;
    draw(e);
  });

  canvas.addEventListener("mouseup", function () {
    painting = false;
    ctx.beginPath();
    saveStroke();
  });

  canvas.addEventListener("mousemove", function (e) {
    if (!painting) return;
    draw(e);
  });

  function draw(e) {
    ctx.lineWidth = 5;
    ctx.lineCap = "round";
    ctx.strokeStyle = "red";

    ctx.lineTo(e.clientX - canvas.getBoundingClientRect().left, e.clientY - canvas.getBoundingClientRect().top);
    ctx.stroke();
    ctx.beginPath();
    ctx.moveTo(e.clientX - canvas.getBoundingClientRect().left, e.clientY - canvas.getBoundingClientRect().top);
  }

  function saveStroke() {
    var imageData = ctx.getImageData(0, 0, canvas.width, canvas.height);
    strokes.push(imageData);
  }

  function undo() {
    if (strokes.length > 1) {
      strokes.pop();
      ctx.putImageData(strokes[strokes.length - 1], 0, 0);
    } else if (strokes.length === 1) {
      ctx.clearRect(0, 0, canvas.width, canvas.height);
      ctx.drawImage(backgroundImg, 0, 0, canvas.width, canvas.height);
      strokes = [];
    }
  }

//   url: "<?php echo site_url(); ?>/rme/askep_savefungsi",

function saveCanvasToDatabase() {
    var notransaksi = document.getElementById("notransaksi").value;
    var canvasData = canvas.toDataURL();

    fetch('<?php echo site_url("rme/saveCanvas"); ?>', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'canvasData=' + encodeURIComponent(canvasData) + '&notransaksi=' + encodeURIComponent(notransaksi),
    })
    .then(response => response.json())
    .then(data => {
        console.log('Data berhasil disimpan ke database:', data);
    })
    .catch(error => {
        console.error('Gagal menyimpan data ke database:', error);
    });
}

</script>
