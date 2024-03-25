<link rel="stylesheet" href="../../assets/template_baru/dist/vendors/icheck/skins/all.css">


<div class="card">
	<div class="col-12 mt-4 ml-3">
		<!-- <span style="font-size: 16px; font-weight: bold; color: navy;">TRIASE</span> -->
		<div class="w-sm-100 mr-auto"><h6 class="mb-0" style="color: navy;">FORM ASESMEN AWAL KEPERAWATAN RAWAT INAP</h6></div>
	</div>
	<div class="col-12 mt-2 ml-3">
		<div class="tab-pane fade show" id="tabasesmenawalmedis" role="tabpanel">
			<nav>
				<div class="nav nav-tabs" id="subnavaskepranap" role="tablist">
					<a class="nav-item nav-link active" id="subtabriwayat" data-toggle="tab" href="#riwayat" role="tab" aria-controls="subnav1-1" aria-selected="true">Riwayat Kesehatan</a>
					<a class="nav-item nav-link" id="subtabimunisasi" data-toggle="tab" href="#imunisasi" role="tab" aria-controls="subnav1-7" aria-selected="true">Riwayawat Imunisasi</a>
					<a class="nav-item nav-link" id="subtabpersalinan" data-toggle="tab" href="#persalinan" role="tab" aria-controls="subnav1-2" aria-selected="false">Riwayat Persalinan</a>
					<a class="nav-item nav-link" id="subtabfisik" data-toggle="tab" href="#fisik" role="tab" aria-controls="subnav1-4" aria-selected="false">Pemeriksaan Fisik</a>
					<a class="nav-item nav-link" id="subtabalergi" data-toggle="tab" href="#alergi" role="tab" aria-controls="subnav1-5" aria-selected="false">Riwayat Alergi</a>
					<a class="nav-item nav-link" id="subtabnyeri" data-toggle="tab" href="#nyeri" role="tab" aria-controls="subnav1-9" aria-selected="false">Asesmen Nyeri</a>
					<a class="nav-item nav-link" id="subtabskrinninggizi" data-toggle="tab" href="#skrinninggizi" role="tab" aria-controls="subnav1-3" aria-selected="false">Skrining Gizi</a>
					<a class="nav-item nav-link" id="subtabjatuhanak" data-toggle="tab" href="#jatuhanak" role="tab" aria-controls="subnav1-10" aria-selected="false">Resiko Jatuh Anak</a>

				</div>
				<div class="tab-content" id="subnavaskepranap-content">
					<div class="tab-pane fade show active" id="riwayat" role="tabpanel" aria-labelledby="subtabriwayat">
						<div class="card">
							<div class="card-body">
								<div class="col-md-12">
									<div class="w-sm-100 mr-auto"><h7 class="mb-0" style="color: navy;">RIWAYAT KESEHATAN</h7></div>
									<div class="form-group row col-spacing-row">
										<label class="col-md-2 col-form-label mt-3">Riwayat Kesehatan Saat Ini</label>
										<div class="col-md-12">
											<textarea id="riwayatsekarang" name="riwayatsekarang" rows="5" style="width: 100%;"><?php echo $dtaskepranap->riwayatsekarang ?></textarea>
										</div>
									</div>
								</div> 
								<div class="col-md-12">
									<div class="form-group row col-spacing-row">
										<label class="col-md-2 col-form-label">Riwayat Penyakit Sebelumnya</label>
										<div class="col-md-12">
											<textarea id="penyakitdahulu" name="penyakitdahulu" rows="5" style="width: 100%;"><?php echo $dtaskepranap->penyakitdahulu ?></textarea>
										</div>
									</div>
								</div>  
								<div class="col-md-12 mb-5 mt-3">
									<!-- <div class="col-6 text-left"> -->
										<button onclick="saveriwayat()" class="btn btn-primary save-button" data-bs-dismiss="modal">Simpan</button>
									<!-- </div> -->
								</div>
							</div> 
						</div> 
					</div> 
					<div class="tab-pane fade" id="imunisasi" role="tabpanel" aria-labelledby="subtabimunisasi">
						<div class="card">
							<div class="card-body">
								<!-- subtabimunisasi -->
								<div class="w-sm-100 mr-auto"><h7 class="mb-0" style="color: navy;">RIWAYAT IMUNISASI</h7></div>
								<div class="row mt-3">
									<div class="col-md-2">
										<input class="state icheckbox_square-red" type="checkbox" id="bcg" name="bcg"<?php echo ($dtaskepranap->bcg == 1) ? "checked" : ""; ?>> BCG
									</div> 
									<div class="col-md-2">
										<input class="state icheckbox_square-red" type="checkbox" id="polio" name="polio"<?php echo ($dtaskepranap->polio == 1) ? "checked" : ""; ?>> Polio
									</div> 
									<div class="col-md-2">
										<input class="state icheckbox_square-red" type="checkbox" id="dpt" name="dpt"<?php echo ($dtaskepranap->dpt == 1) ? "checked" : ""; ?>> DPT
									</div> 
									<div class="col-md-2">
										<input class="state icheckbox_square-red" type="checkbox" id="campak" name="campak"<?php echo ($dtaskepranap->campak == 1) ? "checked" : ""; ?>> Campak
									</div> 
									<div class="col-md-2">
										<input class="state icheckbox_square-red" type="checkbox" id="hepatitisb" name="hepatitisb"<?php echo ($dtaskepranap->hepatitisb == 1) ? "checked" : ""; ?>> Hepatitis B
									</div> 
								</div> 
								<div class="col-md-12 mb-5 mt-3">
									<button onclick="saveimunisasi()" class="btn btn-primary save-button" data-bs-dismiss="modal">Simpan</button>
								</div>
							</div> 
						</div> 
					</div> 

					<div class="tab-pane fade" id="persalinan" role="tabpanel" aria-labelledby="subtabpersalinan">
						<div class="card">
							<div class="card-body">
								<!-- subtabpersalinan -->
								<div class="col-md-12 mb-5">
									<div class="w-sm-100 mr-auto"><h7 class="mb-0" style="color: navy;">RIWAYAT PERSALINAN</h7></div>
									<div class="row mt-2">
										<div class="col-md-12 mt-2">
											<label> Cara Melahirkan</label>
											<label><input type="radio" class="state iradio_square-red ml-3" id="spontan" name="caramelahirkan" value="1" <?php if ($dtaskepranap->caramelahirkan == 1) {echo "checked";} ?>> Spontan</label>
											<label><input type="radio" class="state iradio_square-red ml-3" id="vacum" name="caramelahirkan" value="2" <?php if ($dtaskepranap->caramelahirkan == 2) {echo "checked";} ?>> Vacum</label>
											<label><input type="radio" class="state iradio_square-red ml-3" id="forceps" name="caramelahirkan" value="3" <?php if ($dtaskepranap->caramelahirkan == 3) {echo "checked";} ?>> Forceps</label>
											<label><input type="radio" class="state iradio_square-red ml-3" id="sc" name="caramelahirkan" value="4" <?php if ($dtaskepranap->caramelahirkan == 4) {echo "checked";} ?>> SC</label>			
										</div>
									</div>
									<div class="row mt-2">
										<div class="col-md-12 mt-2">
											<label> Ditolong Oleh</label>
											<label><input type="radio" class="state iradio_square-red ml-3" id="dokter" name="tolongoleh" value="1" <?php if ($dtaskepranap->tolongoleh == 1) {echo "checked";} ?>> Dokter</label>
											<label><input type="radio" class="state iradio_square-red ml-3" id="bidan" name="tolongoleh" value="2" <?php if ($dtaskepranap->tolongoleh == 2) {echo "checked";} ?>> Bidan</label>
										</div>
									</div>
									
									<div class="row mt-1">
										<label class="col-md-2 col-form-label">Berat Badan (Gram)</label>
										<div class="col-md-2">
											<input class="form-control" type="text" id="bb" name="bb" value="<?php echo $dtaskepranap->bb ?>" style="border: 1px solid #000;">
										</div> 
										<label class="col-md-2 col-form-label">Panjang Badan (Cm)</label>
										<div class="col-md-2">
											<input class="form-control" type="text" id="pb" name="pb" value="<?php echo $dtaskepranap->pb ?>" style="border: 1px solid #000;">
										</div> 
									</div> 
									<div class="row mt-2">
										<div class="col-md-12 mt-2">
											<label> Keadaan Saat Lahir</label>
											<label><input type="radio" class="state iradio_square-red ml-3" id="menangis" name="menangis" value="1" <?php if ($dtaskepranap->menangis == 1) {echo "checked";} ?>> Segera Menangis</label>
											<label><input type="radio" class="state iradio_square-red ml-3" id="tdkmenangis" name="menangis" value="2" <?php if ($dtaskepranap->menangis == 2) {echo "checked";} ?>> Tidak Segera Menangis</label>
										</div>
									</div>

									<div class="row mt-2">
										<div class="col-md-1">
											<label for="operasi">Operasi</label>
										</div>
										<div class="col-md-1">
											<label><input type="radio" class="state iradio_square-red ml-3" id="operasiya" name="operasi" value="1" <?php if ($dtaskepranap->operasi == 1) {echo "checked";} ?>> Tidak</label>
										</div>
										<div class="col-md-1">
											<label><input type="radio" class="state iradio_square-red ml-3" id="operasitidak" name="operasi" value="2" <?php if ($dtaskepranap->operasi == 2) {echo "checked";} ?>> Ya</label>
										</div>
										<div class="col-md-6">
											<input class="form-control" type="text" id="operasitext" name="operasitext" value="<?php echo $dtaskepranap->operasitext ?>" style="border: 1px solid #000;">
										</div>
									</div>

									<div class="row mt-2">
										<div class="col-md-1">
											<label for="operasi">Transfusi</label>
										</div>
										<div class="col-md-1">
											<label><input type="radio" class="state iradio_square-red ml-3" id="transfusiya" name="transfusi" value="1" <?php if ($dtaskepranap->transfusi == 1) {echo "checked";} ?>> Tidak</label>
										</div>
										<div class="col-md-1">
											<label><input type="radio" class="state iradio_square-red ml-3" id="transfusitidak" name="transfusi" value="2" <?php if ($dtaskepranap->transfusi == 2) {echo "checked";} ?>> Ya</label>
										</div>
										<div class="col-md-6">
											<input class="form-control" type="text" id="transfusitext" name="transfusitext" value="<?php echo $dtaskepranap->transfusitext ?>" style="border: 1px solid #000;">
										</div>
									</div>
								</div>
								<div class="col-md-12 mb-5 mt-3">
									<button onclick="savepersalinan()" class="btn btn-primary save-button" data-bs-dismiss="modal">Simpan</button>
								</div>
							</div> 
						</div> 
					</div> 
					<div class="tab-pane fade" id="fisik" role="tabpanel" aria-labelledby="subtabfisik">
						<div class="card">
							<div class="card-body">
								<!-- subtabfisik -->
								<div class="col-md-12 mt-3">
											<div class="form-group row col-spacing-row">
												<div class="col-md-12">
													<label class="col-form-label"
														style="font-weight: bold; font-size: 14px; color: #090773;">PEMERIKSAAN FISIK</label>
												</div>
												<div class="col-md-12">
													<label class="col-form-label">Kesadaran </label>
													<label>
														<input type="radio" class="state iradio_square-red ml-3"
															id="composmentis" name="kesadaranfisik" value="1" <?php if ($dtaskepranap->kesadaranfisik == 1) {echo "checked";} ?>> Composmentis
													</label>
													<label>
														<input type="radio" class="state iradio_square-red ml-3"
															id="apatis" name="kesadaranfisik" value="2" <?php if ($dtaskepranap->kesadaranfisik == 2) {echo "checked";} ?>> Apatis
													</label>
													<label>
														<input type="radio" class="state iradio_square-red ml-3"
															id="somnolen" name="kesadaranfisik" value="3" <?php if ($dtaskepranap->kesadaranfisik == 3) {echo "checked";} ?>> Somnolen
													</label>
													<label>
														<input type="radio" class="state iradio_square-red ml-3"
															id="soporokoma" name="kesadaranfisik" value="4" <?php if ($dtaskepranap->kesadaranfisik == 4) {echo "checked";} ?>> Soporokoma
													</label>
													<label>
														<input type="radio" class="state iradio_square-red ml-3"
															id="coma" name="kesadaranfisik" value="5" <?php if ($dtaskepranap->kesadaranfisik == 5) {echo "checked";} ?>> Coma
													</label>
												</div>
												<div class="col-md-12">
													<div class="form-check form-check-inline">
														<label class="col-form-label">Keadaan Umum </label>
														<input type="text" id="keadaanumum" name="keadaanumum"
															class="form-control ml-3"
															style="width: 200px; border: 1px solid;" value="<?php echo $dtaskepranap->keadaanumum; ?>">

														<label class="col-form-label ml-3">Berat Badan (kg)</label>
														<input type="text" id="beratbadan" name="beratbadan"
															class="form-control ml-3"
															style="width:100px; border: 1px solid;" value="<?php echo $dtaskepranap->beratbadan; ?>">
													</div>

													<div class="form-check form-check-inline mt-2">
														<label class="col-form-label">Tanda Tanda Vital </label>
														<label class="col-form-label ml-2">TD </label>
														<input type="text" id="td_fisik" name="td_fisik"
															class="form-control ml-3"
															style="width: 100px; border: 1px solid;" value="<?php echo $dtaskepranap->td_fisik; ?>">

														<label class="col-form-label ml-3">HR (x/m)</label>
														<input type="text" id="hr_fisik" name="hr_fisik" class="form-control ml-3"
															style="width:100px; border: 1px solid;" value="<?php echo $dtaskepranap->hr_fisik; ?>">
														
															<label class="col-form-label ml-3">RR (x/m)</label>
														<input type="text" id="rr_fisik" name="rr_fisik" class="form-control ml-3"
															style="width:100px; border: 1px solid;" value="<?php echo $dtaskepranap->rr_fisik; ?>">
														
															<label class="col-form-label ml-3">Suhu</label>
														<input type="text" id="suhu_fisik" name="suhu_fisik"
															class="form-control ml-3"
															style="width:100px; border: 1px solid;" value="<?php echo $dtaskepranap->suhu_fisik; ?>">
															
														<label class="col-form-label ml-3">SPO2</label>
														<input type="text" id="spo2_fisik" name="spo2_fisik"
															class="form-control ml-3"
															style="width:100px; border: 1px solid;" value="<?php echo $dtaskepranap->spo2_fisik; ?>">
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
																		name="kepala" value="1" <?php if ($dtaskepranap->kepala == 1) {echo "checked";} ?>> Normal</label>
																<label><input type="radio"
																		class="state iradio_square-red ml-3"
																		id="benjolan" name="kepala" value="2" <?php if ($dtaskepranap->kepala == 2) {echo "checked";} ?>>
																	Benjolan</label>
																<label><input type="radio"
																		class="state iradio_square-red ml-3" id="luka"
																		name="kepala" value="3" <?php if ($dtaskepranap->kepala == 3) {echo "checked";} ?>> Luka</label>
																<label><input type="radio"
																		class="state iradio_square-red ml-3"
																		id="lainnya" name="kepala" value="4" <?php if ($dtaskepranap->kepala == 4) {echo "checked";} ?>>
																	Lainnya</label>
																<div class="form-check form-check-inline ml-3">
																	<input type="text" id="kepalatext" name="kepalatext"
																		class="form-control"
																		style="width: 800; border: 1px solid;" value="<?php echo $dtaskepranap->kepalatext; ?>" disabled>
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
																		name="mata" value="1" <?php if ($dtaskepranap->mata == 1) {echo "checked";} ?>> Normal</label>
																<label class="col-form-label ml-5">Pupil : </label>
																<label><input type="radio"
																		class="state iradio_square-red ml-3" id="isokor"
																		name="mata" value="2" <?php if ($dtaskepranap->mata == 2) {echo "checked";} ?>> Isokor</label>
																<label><input type="radio"
																		class="state iradio_square-red ml-3"
																		id="anisokor" name="mata" value="3" <?php if ($dtaskepranap->mata == 3) {echo "checked";} ?>>
																	Anisokor</label>
																<label><input type="radio"
																		class="state iradio_square-red ml-3"
																		id="mata-lainnya" name="mata" value="4" <?php if ($dtaskepranap->mata == 4) {echo "checked";} ?>>
																	Lainnya</label>
																<div class="form-check form-check-inline ml-3">
																	<input type="text" id="matatext" name="matatext"
																		class="form-control"
																		style="width: 800; border: 1px solid;" value="<?php echo $dtaskepranap->matatext; ?>">
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
																		name="tht" value="1" <?php if ($dtaskepranap->tht == 1) {echo "checked";} ?>> Normal</label>
																<label><input type="radio"
																		class="state iradio_square-red ml-3"
																		id="tht-luka" name="tht" value="2" <?php if ($dtaskepranap->tht == 2) {echo "checked";} ?>>
																	Luka</label>
																<label><input type="radio"
																		class="state iradio_square-red ml-3"
																		id="tht-sumbatan" name="tht" value="3" <?php if ($dtaskepranap->tht == 3) {echo "checked";} ?>>
																	Sumbatan</label>
																<label><input type="radio"
																		class="state iradio_square-red ml-3"
																		id="tht-lainnya" name="tht" value="4" <?php if ($dtaskepranap->tht == 4) {echo "checked";} ?>>
																	Lainnya</label>
																<div class="form-check form-check-inline ml-3">
																	<input type="text" id="thttext" name="thttext"
																		class="form-control"
																		style="width: 800; border: 1px solid;"  value="<?php echo $dtaskepranap->thttext; ?>">
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
																		id="mulut-normal" name="mulut" value="1" <?php if ($dtaskepranap->mulut == 1) {echo "checked";} ?>>
																	Normal</label>
																<label><input type="radio"
																		class="state iradio_square-red ml-3"
																		id="mulut-luka" name="mulut" value="2" <?php if ($dtaskepranap->mulut == 2) {echo "checked";} ?>>
																	Luka</label>
																<label><input type="radio"
																		class="state iradio_square-red ml-3"
																		id="mulut-benjolan" name="mulut"
																		value="3" <?php if ($dtaskepranap->mulut == 3) {echo "checked";} ?>> Benjolan</label>
																<label><input type="radio"
																		class="state iradio_square-red ml-3"
																		id="mulut-lainnya" name="mulut" value="4" <?php if ($dtaskepranap->mulut == 4) {echo "checked";} ?>>
																	Lainnya</label>
																<div class="form-check form-check-inline ml-3">
																	<input type="text" id="muluttext" name="muluttext"
																		class="form-control"
																		style="width: 800; border: 1px solid;" value="<?php echo $dtaskepranap->muluttext; ?>">
																</div>
															</div>
														</div>
													</div>
												<!-- savefisikranap -->

													<div class="col-md-12 mt-3">
														<div class="form-group row col-spacing-row">
															<label class="col-md-1 col-form-label">Leher</label>
															<div class="col-md-11">
																<label><input type="radio"
																		class="state iradio_square-red"
																		id="leher-normal" name="leher" value="1" <?php if ($dtaskepranap->leher == 1) {echo "checked";} ?>>
																	Normal</label>
																<label><input type="radio"
																		class="state iradio_square-red ml-3"
																		id="leher-luka" name="leher" value="2" <?php if ($dtaskepranap->leher == 2) {echo "checked";} ?> >
																	Luka</label>
																<label><input type="radio"
																		class="state iradio_square-red ml-3"
																		id="leher-benjolan" name="3"
																		value="Benjolan" <?php if ($dtaskepranap->leher == 3) {echo "checked";} ?>> Benjolan</label>
																<label><input type="radio"
																		class="state iradio_square-red ml-3"
																		id="leher-lainnya" name="leher" value="4" <?php if ($dtaskepranap->leher == 4) {echo "checked";} ?>>
																	Lainnya</label>
																<div class="form-check form-check-inline ml-3">
																	<input type="text" id="lehertext" name="lehertext-text"
																		class="form-control"
																		style="width: 800; border: 1px solid;" value="<?php echo $dtaskepranap->lehertext; ?>">
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
																		id="thorax-normal" name="thorax" value="1" <?php if ($dtaskepranap->thorax == 1) {echo "checked";} ?>>
																	Normal</label>
																<label><input type="radio"
																		class="state iradio_square-red ml-3"
																		id="thorax-luka" name="thorax" value="2" <?php if ($dtaskepranap->thorax == 2) {echo "checked";} ?>>
																	Luka</label>
																<label><input type="radio"
																		class="state iradio_square-red ml-3"
																		id="thorax-benjolan" name="thorax"
																		value="3" <?php if ($dtaskepranap->thorax == 3) {echo "checked";} ?>> Benjolan</label>
																<label><input type="radio"
																		class="state iradio_square-red ml-3"
																		id="thorax-lainnya" name="thorax"
																		value="4" <?php if ($dtaskepranap->thorax == 4) {echo "checked";} ?>> Lainnya</label>
																<div class="form-check form-check-inline ml-3">
																	<input type="text" id="thoraxtext"
																		name="thoraxtext" class="form-control"
																		style="width: 800; border: 1px solid;" value="<?php echo $dtaskepranap->thoraxtext; ?>">
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
																		id="abdomen1" name="abdomen" value="1" <?php if ($dtaskepranap->abdomen == 1) {echo "checked";} ?>>
																	Normal</label>
																<label><input type="radio"
																		class="state iradio_square-red ml-3"
																		id="abdomen2" name="abdomen" value="2" <?php if ($dtaskepranap->abdomen == 2) {echo "checked";} ?>>
																	Asistesis</label>
																<label><input type="radio"
																		class="state iradio_square-red ml-3"
																		id="abdomen3" name="abdomen"
																		value="3" <?php if ($dtaskepranap->abdomen == 3) {echo "checked";} ?>> Tegang</label>
																<label><input type="radio"
																		class="state iradio_square-red ml-3"
																		id="abdomen4" name="abdomen"
																		value="4" <?php if ($dtaskepranap->abdomen == 4) {echo "checked";} ?>> Lainnya</label>
																<div class="form-check form-check-inline ml-3">
																	<input type="text" id="abdomentext"
																		name="abdomentext" class="form-control"
																		style="width: 800; border: 1px solid;" value="<?php echo $dtaskepranap->abdomentext; ?>">
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
																		value="1" <?php if ($dtaskepranap->urogenital == 1) {echo "checked";} ?>> Normal</label>
																<label><input type="radio"
																		class="state iradio_square-red ml-3"
																		id="urogenital-tidak-normal" name="urogenital"
																		value="2" <?php if ($dtaskepranap->urogenital == 2) {echo "checked";} ?>> Tidak Normal</label>
																<label><input type="radio"
																		class="state iradio_square-red ml-3"
																		id="urogenital-lainnya" name="urogenital"
																		value="3" <?php if ($dtaskepranap->urogenital == 3) {echo "checked";} ?>> Lainnya</label>
																<div class="form-check form-check-inline ml-3">
																	<input type="text" id="urogenitaltext"
																		name="urogenitaltext" class="form-control"
																		style="width: 800; border: 1px solid;" value="<?php echo $dtaskepranap->urogenitaltext; ?>">
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
																		value="1" <?php if ($dtaskepranap->ekstermitas == 1) {echo "checked";} ?>> Normal</label>
																<label class="col-form-label ml-5">Atas : </label>
																<label><input type="radio"
																		class="state iradio_square-red ml-3"
																		id="ekstermitas-atas" name="ekstermitasatas"
																		value="1" <?php if ($dtaskepranap->ekstermitasatas == 1) {echo "checked";} ?>> Kuat</label>
																<label><input type="radio"
																		class="state iradio_square-red ml-3"
																		id="ekstermitas-atas" name="ekstermitasatas"
																		value="2" <?php if ($dtaskepranap->ekstermitasatas == 2) {echo "checked";} ?>> Lemah</label>
																<label class="col-form-label ml-5">Bawah : </label>
																<label><input type="radio"
																		class="state iradio_square-red ml-3"
																		id="ekstermitas-bawah" name="ekstermitasbawah"
																		value="1" <?php if ($dtaskepranap->ekstermitas == 1) {echo "checked";} ?>> Kuat</label>
																<label><input type="radio"
																		class="state iradio_square-red ml-3"
																		id="ekstermitas-bawah" name="ekstermitasbawah"
																		value="2" <?php if ($dtaskepranap->ekstermitas == 2) {echo "checked";} ?>> Lemah</label>
															</div>
														</div>
													</div>
													<div class="col-md-12 mt-3">
														<div class="form-group row col-spacing-row">
															<label class="col-md-1 col-form-label">Kulit</label>
															<div class="col-md-11">
																<label><input type="radio"
																		class="state iradio_square-red"
																		id="kulit-normal" name="kulit"
																		value="1" <?php if ($dtaskepranap->kulit == 1) {echo "checked";} ?>> Normal</label>
																<label class="col-form-label ml-5">Turgor : </label>
																<label><input type="radio"
																		class="state iradio_square-red ml-3"
																		id="kulitturgor-atas" name="kulitturgor"
																		value="1" <?php if ($dtaskepranap->kulitturgor == 1) {echo "checked";} ?>> Baik</label>
																<label><input type="radio"
																		class="state iradio_square-red ml-3"
																		id="kulitturgor-bawah" name="kulitturgor"
																		value="2" <?php if ($dtaskepranap->kulitturgor == 2) {echo "checked";} ?>> Dehidrasi</label>
																<label class="col-form-label ml-5">Luka : </label>
																<label><input type="radio"
																		class="state iradio_square-red ml-3"
																		id="kulitluka-atas" name="kulitluka"
																		value="1" <?php if ($dtaskepranap->kulitluka == 1) {echo "checked";} ?>> Ya</label>
																<label><input type="radio"
																		class="state iradio_square-red ml-3"
																		id="kulitluka-bawah" name="kulitluka"
																		value="2" <?php if ($dtaskepranap->kulitluka == 2) {echo "checked";} ?>> Tidak</label>
															</div>
														</div>
													</div>
													<div class="col-md-12 mt-3">
														<div class="form-group row col-spacing-row">
															<label class="col-md-1 col-form-label">Jantung</label>
															<div class="col-md-11">
																<label><input type="radio"
																		class="state iradio_square-red"
																		id="kulit-normal" name="jantung"
																		value="1" <?php if ($dtaskepranap->jantung == 1) {echo "checked";} ?>> Normal</label>
																<label class="col-form-label ml-5">Nyeri Dada : </label>
																<label><input type="radio"
																		class="state iradio_square-red ml-3"
																		id="jantungnyeri-atas" name="jantungnyeri"
																		value="1" <?php if ($dtaskepranap->jantungnyeri == 1) {echo "checked";} ?>> Ya</label>
																<label><input type="radio"
																		class="state iradio_square-red ml-3"
																		id="jantungnyeri-bawah" name="jantungnyeri"
																		value="2" <?php if ($dtaskepranap->jantungnyeri == 2) {echo "checked";} ?>> Tidak</label>
																<label class="col-form-label ml-5">Bunyi Jantung : </label>
																<label><input type="radio"
																		class="state iradio_square-red ml-3"
																		id="jantungbunyi-atas" name="jantungbunyi"
																		value="1" <?php if ($dtaskepranap->jantungbunyi == 1) {echo "checked";} ?>> Murmur</label>
																<label><input type="radio"
																		class="state iradio_square-red ml-3"
																		id="jantungbunyi-bawah" name="jantungbunyi"
																		value="2" <?php if ($dtaskepranap->jantungbunyi == 2) {echo "checked";} ?>> Gallop</label>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="col-6 text-left mt-4">
											<button onclick="savefisikranap()" class="btn btn-primary save-button" data-bs-dismiss="modal">Simpan</button>
										</div>
							</div> 
						</div> 
					</div> 
					<div class="tab-pane fade" id="alergi" role="tabpanel" aria-labelledby="subtabalergi">
						<div class="card">
							<div class="card-body">
								<!-- subtabalergi -->
								<div class="row mt-2">
									<div class="col-md-12 mt-2">
										<label> Riwayat Alergi</label>
										<label><input type="radio" class="state iradio_square-red ml-4" id="tidak" name="alergi" value="1" <?php if ($dtaskepranap->alergi == 1) {echo "checked";} ?>> Tidak</label>
										<label><input type="radio" class="state iradio_square-red ml-4" id="ya" name="alergi" value="2" <?php if ($dtaskepranap->alergi == 2) {echo "checked";} ?>> Ya</label>
									</div>
									<div class="col-md-12">
										<div class="form-group row col-spacing-row">
											<label class="col-md-1 col-form-label ">Obat</label>
											<div class="col-md-10">
												<textarea id="obat" name="obat" rows="5" style="width: 100%;"  <?php if ($dtaskepranap->alergi == 1) { echo "disabled";}?>><?php echo $dtaskepranap->obat ?></textarea>
											</div>
										</div>
									</div> 
									<div class="col-md-12">
										<div class="form-group row col-spacing-row">
											<label class="col-md-1 col-form-label">Makanan</label>
											<div class="col-md-10">
												<textarea id="makanan" name="makanan" rows="5" style="width: 100%;" <?php if ($dtaskepranap->alergi == 1) { echo "disabled";}?>><?php echo $dtaskepranap->makanan ?></textarea>
											</div>
										</div>
									</div>  
									<div class="col-md-12">
										<div class="form-group row col-spacing-row">
											<label class="col-md-1 col-form-label">Lainnya</label>
											<div class="col-md-10">
												<textarea id="lainnyaalergi" name="lainnyaalergi" rows="5" style="width: 100%;" <?php if ($dtaskepranap->alergi == 1) { echo "disabled";}?>><?php echo $dtaskepranap->lainnya ?></textarea>
											</div>
										</div>
									</div>  
									<div class="col-md-12">
										<div class="form-group row col-spacing-row">
											<label class="col-md-12 col-form-label" style="color: red;">Jika Ada Alergi Pasang Gelang Warna Merah</label>
										</div>
									</div>  
									<div class="col-6 text-left mt-3">
										<button onclick="savealergiranap()" class="btn btn-primary save-button" data-bs-dismiss="modal">Simpan</button>
									</div>
								</div>
							</div> 
						</div> 
					</div> 
					<div class="tab-pane fade" id="nyeri" role="tabpanel" aria-labelledby="subtabnyeri">
						<div class="card">
							<div class="card-body">
								<div class="col-md-12 mt-3">
									<div class="form-group row col-spacing-row">
										<div class="col-md-12">
											<label class="col-form-label" style="font-weight: bold; font-size: 14px; color: #090773;">ASESMEN NYERI</label>
										</div>
									</div>
									<div class="form-group row col-spacing-row mt-3">
										<label class="col-md-5 col-form-label" style="font-weight: bold; font-size: 14px; color: #0D0687;"> 1. Metode FLCC Scale (untuk Usia 3 Bulan -  6 Tahun)</label>
									</div>
									<div class="form-group row col-spacing-row">
										<div class="col-md-12">
											<table border="1" style="width: 80%;">
												<tr style="background-color: #ccc;">
													<th style="width: 15%; text-align: center;" height="30px"> Kategori</th>
													<th style="width: 25%; text-align: center;">0</th>
													<th style="width: 25%; text-align: center;">1</th>
													<th style="width: 25%; text-align: center;">2</th>
													<th style="width: 10%; text-align: center;">Nilai</th>
												</tr>
												<tr>
													<td>Face(Wajah)</td>
													<td>Tidak ada Ekspresi Khusus, Senyum</td>
													<td>Menyeringai, mengerutkan dahi, mtampak tak tetarik(Kadang-kadang)</td>
													<td>Dagu gemetar, gerutu berualang(sering)</td>
													<td><input type="text" id="face" name="face" value="<?php echo $dtaskepranap->face ?>"></td>
												</tr>
												<tr>
													<td>Leg(Kaki)</td>
													<td>Posisi Normal atau Santai</td>
													<td>Gelisah / Tegang</td>
													<td>Menendang, Kaki tertekuk</td>
													<td><input type="text" id="leg" name="leg" value="<?php echo $dtaskepranap->leg ?>"></td>
												<tr>
													<td>Activity</td>
													<td>Berbaring tenang, posisi normal gerakan mudah</td>
													<td>Menggeliat, tidak bisa diam. tegang</td>
													<td>Kaku atau Tegang</td>
													<td><input type="text" id="activity" name="activity" value="<?php echo $dtaskepranap->activity ?>"></td>
												</tr>
												<tr>
													<td>Cry(Menangis)</td>
													<td>Tidak menangis</td>
													<td>Merintih, merengek, kadang-kadang mengeluh</td>
													<td>Menangis Terus, terisak, menjerit</td>
													<td><input type="text" id="cry" name="cry" value="<?php echo $dtaskepranap->cry ?>"></td>
												</tr>
												<tr>
													<td>Consolability</td>
													<td>Rilekc</td>
													<td>dapat di tenangkan dengan sentuhan, pelukan, bujukan, dapat dialihkan</td>
													<td>Sering memgeluh, sulit di bujuk</td>
													<td><input type="text" id="consol" name="consol" value="<?php echo $dtaskepranap->consol ?>"></td>
												</tr>
												<tr>
													<td colspan="3"> Skala 0 = Nyaman, Skala 1-3 = Kurang Nyaman, Skala 4-6 = Nyeri Sedang, Skala 7-10 = Nyeri hebat</td>
													<td>TOTAL SCORE</td>
													<td><input type="text" id="totalscore" name="totalscore" disabled></td>
												</tr>
											</table>
											<br>
										</div>
									</div>
									<div class="form-group row col-spacing-row">
										<label class="col-md-1 col-form-label">Hasil Skrinning</label>
										<div class="col-md-9">
											<input type="text" id="skrining" name="skrining" class="form-control ml-3" style="border: 1px solid;" value="<?php echo $dtaskepranap->skrining?>">
										</div>
									</div>
									<div class="form-group row col-spacing-row">
										<label class="col-md-1 col-form-label">Saran / Tndakan</label>
										<div class="col-md-9">
											<input type="text" id="saran" name="saran" class="form-control ml-3" style="border: 1px solid;" value="<?php echo $dtaskepranap->saran?>">
										</div>
									</div>
									<div class="form-group row col-spacing-row"> 
										<label class="col-md-10 col-form-label">Bila usia >6 - 18 tahun menggunakan Numeric Scale (lihat panduan pengkajian ngeri)</label>
									</div>
									<div class="form-group row col-spacing-row mt-4">
										<label class="col-md-5 col-form-label" style="font-weight: bold; font-size: 14px; color: #0D0687;"> 2. Metode Wong Braker Paint dan Numeric Point Scale (Untuk usia > 6 tahun)</label>
									</div>
									<div class="form-group row col-spacing-row mt-3">
												<label class="col-md-1" style="font-size: 13px;">Nyeri</label>
												<div class="col-md-11">
													<label><input type="radio" class="state iradio_square-red" id="nyeri21" name="nyeri2" value="1" <?php if ($dtaskepranap->nyeri2 == 1) {echo "checked";} ?>> Tidak</label>
													<label><input type="radio" class="state iradio_square-red ml-3" id="nyeri22" name="nyeri2" value="2" <?php if ($dtaskepranap->nyeri2 == 2) {echo "checked";} ?>> Ya</label>
												</div>
											</div>	
											<br>
											<div class="form-group row col-spacing-row">
												<label class="col-md-1" style="font-size: 13px;">Sifat</label>
												<div class="col-md-11">
													<label><input type="radio" class="state iradio_square-red" id="sifat21" name="sifat2" value="1" <?php if ($dtaskepranap->sifat2 == 1) {echo "checked";} ?>> Akut</label>
													<label><input type="radio" class="state iradio_square-red ml-3" id="sifat22" name="sifat2" value="2" <?php if ($dtaskepranap->sifat2 == 2) {echo "checked";} ?>> Kronis</label>
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
													<label><input type="radio" class="state iradio_square-red" id="kualitasnyeri21" name="kualitasnyeri2" value="1" <?php if ($dtaskepranap->kualitasnyeri2 == 1) {echo "checked";} ?>> Akut</label>
													<label><input type="radio" class="state iradio_square-red ml-3" id="kualitasnyeri22" name="kualitasnyeri2" value="2" <?php if ($dtaskepranap->kualitasnyeri2 == 2) {echo "checked";} ?>> Kronis</label>
													<label><input type="radio" class="state iradio_square-red ml-3" id="kualitasnyeri23" name="kualitasnyeri2" value="3" <?php if ($dtaskepranap->kualitasnyeri2 == 3) {echo "checked";} ?>> Kronis</label>
												</div>
											</div>
											<div class="form-group row col-spacing-row">
												<label class="col-md-1 mt-1" style="font-size: 13px;">Menjalar</label>
												<div class="col-md-11">
													<label><input type="radio" class="state iradio_square-red" id="menjalar21" name="menjalar2" value="1" <?php if ($dtaskepranap->menjalar2 == 1) {echo "checked";} ?>> Tidak </label>
													<label><input type="radio" class="state iradio_square-red ml-3" id="menjalar22" name="menjalar2" value="2" <?php if ($dtaskepranap->menjalar2 == 2) {echo "checked";} ?>> Ya, ke </label>
													<div class="form-check form-check-inline ml-3"> <input type="text" class="form-control col-form-label" id="menjalartext2" style="width: 250px; border: 1px solid" value="<?php echo $dtaskepranap->menjalartext2 ?>">
													</div>
												</div>
											</div>
											<div class="form-group row col-spacing-row mt-2">
												<label class="col-md-1 col-form-label">Skor Nyeri</label>
												<div class="col-md-11">
													<input type="text" class="form-control col-form-label" id="skornyeri2" style="width: 100px; border: 1px solid;" value="<?php echo $dtaskepranap->skornyeri2 ?>">
												</div>
											</div> 
											<div class="form-group row col-spacing-row mt-3">
												<label class="col-md-1">Frekuensi</label>
												<div class="col-md-11">
													<label><input type="radio" class="state iradio_square-red" id="frekuensi21" name="frekuensi2" value="1" <?php if ($dtaskepranap->frekuensi2 == 1) {echo "checked";} ?>> Akut</label>
													<label><input type="radio" class="state iradio_square-red ml-3" id="frekuensi22" name="frekuensi2" value="2" <?php if ($dtaskepranap->frekuensi2 == 2) {echo "checked";} ?>> Kronis</label>
													<label><input type="radio" class="state iradio_square-red ml-3" id="frekuensi23" name="frekuensi2" value="3" <?php if ($dtaskepranap->frekuensi2 == 3) {echo "checked";} ?>> Kronis</label>
												</div>
											</div>
											<div class="form-group row mt-3">
												<label class="col-md-1">Lama Nyeri</label>
												<div class="col-md-2">
													<input type="text" class="form-control col-form-label" id="lamanyeri2" style="border: 1px solid;" value="<?php echo $dtaskepranap->lamanyeri2 ?>">
												</div>
											</div>
											<div class="form-group row mt-3">
												<label class="col-md-1">Lokasi Nyeri</label>
												<div class="col-md-2">
													<input type="text" class="form-control col-form-label" id="lokasi2" style="border: 1px solid;" value="<?php echo $dtaskepranap->lokasi2 ?>">
												</div>
											</div>
											<div class="form-group row col-spacing-row mt-4">
												<label class="col-md-5 col-form-label" style="font-weight: bold; font-size: 14px; color: #0D0687;"> 3. Metode Wong Braker Paint dan Numeric Point Scale (untuk pasien Dewasa)</label>
											</div>
									<div class="form-group row col-spacing-row mt-3">
												<label class="col-md-1" style="font-size: 13px;">Nyeri</label>
												<div class="col-md-11">
													<label><input type="radio" class="state iradio_square-red" id="nyeri31" name="nyeri3" value="1" <?php if ($dtaskepranap->nyeri3 == 1) {echo "checked";} ?>> Tidak</label>
													<label><input type="radio" class="state iradio_square-red ml-3" id="nyeri32" name="nyeri3" value="2" <?php if ($dtaskepranap->nyeri3 == 2) {echo "checked";} ?>> Ya</label>
												</div>
											</div>	
											<br>
											<div class="form-group row col-spacing-row">
												<label class="col-md-1" style="font-size: 13px;">Sifat</label>
												<div class="col-md-11">
													<label><input type="radio" class="state iradio_square-red" id="sifat31" name="sifat3" value="1" <?php if ($dtaskepranap->sifat3 == 1) {echo "checked";} ?>> Akut</label>
													<label><input type="radio" class="state iradio_square-red ml-3" id="sifat32" name="sifat3" value="2" <?php if ($dtaskepranap->sifat3 == 2) {echo "checked";} ?>> Kronis</label>
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
													<label><input type="radio" class="state iradio_square-red" id="kualitasnyeri31" name="kualitasnyeri3" value="1" <?php if ($dtaskepranap->kualitasnyeri3 == 1) {echo "checked";} ?>> Akut</label>
													<label><input type="radio" class="state iradio_square-red ml-3" id="kualitasnyeri32" name="kualitasnyeri3" value="2" <?php if ($dtaskepranap->kualitasnyeri3 == 2) {echo "checked";} ?>> Kronis</label>
													<label><input type="radio" class="state iradio_square-red ml-3" id="kualitasnyeri33" name="kualitasnyeri3" value="3" <?php if ($dtaskepranap->kualitasnyeri3 == 3) {echo "checked";} ?>> Kronis</label>
												</div>
											</div>
											<div class="form-group row col-spacing-row">
												<label class="col-md-1 mt-1" style="font-size: 13px;">Menjalar</label>
												<div class="col-md-11">
												<label><input type="radio" class="state iradio_square-red" id="menjalar31" name="menjalar3" value="1" <?php if ($dtaskepranap->menjalar3 == 1) {echo "checked";} ?>> Tidak </label>
													<label><input type="radio" class="state iradio_square-red ml-3" id="menjalar32" name="menjalar3" value="2" <?php if ($dtaskepranap->menjalar3 == 2) {echo "checked";} ?>> Ya, ke </label>
													<div class="form-check form-check-inline ml-3">
														<input type="text" class="form-control col-form-label"
															id="menjalartext3" style="width: 250px; border: 1px solid"
															value="<?php echo $dtaskepranap->menjalartext3 ?>">
													</div>
												</div>
											</div>
											<div class="form-group row col-spacing-row mt-2">
												<label class="col-md-1 col-form-label">Skor Nyeri</label>
												<div class="col-md-11">
													<input type="text" class="form-control col-form-label" id="skornyeri3" style="width: 100px; border: 1px solid;" value="<?php echo $dtaskepranap->skornyeri3 ?>">
												</div>
											</div>
											<div class="form-group row col-spacing-row mt-3"> 
												<label class="col-md-1">Frekuensi</label>
												<div class="col-md-11">
													<label><input type="radio" class="state iradio_square-red" id="frekuensi31" name="frekuensi3" value="1" <?php if ($dtaskepranap->frekuensi3 == 1) {echo "checked";} ?>> Akut</label>
													<label><input type="radio" class="state iradio_square-red ml-3" id="frekuensi32" name="frekuensi3" value="2" <?php if ($dtaskepranap->frekuensi3 == 2) {echo "checked";} ?>> Kronis</label>
													<label><input type="radio" class="state iradio_square-red ml-3" id="frekuensi33" name="frekuensi3" value="3" <?php if ($dtaskepranap->frekuensi3 == 3) {echo "checked";} ?>> Kronis</label>
												</div>
											</div>
											<div class="form-group row mt-3">
												<label class="col-md-1">Lama Nyeri</label>
												<div class="col-md-2">
													<input type="text" class="form-control col-form-label" id="lamanyeri3" style="border: 1px solid;" value="<?php echo $dtaskepranap->lamanyeri3 ?>">
												</div>
											</div>
											<div class="form-group row mt-3">
												<label class="col-md-1">Lokasi Nyeri</label>
												<div class="col-md-2">
													<input type="text" class="form-control col-form-label" id="lokasi3" style="border: 1px solid;" value="<?php echo $dtaskepranap->lokasi3 ?>">
												</div>
											</div>		
											<div class="form-group row mt-3">
												<label class="col-md-2">Faktor faktor Pemicu / yang memperberat</label>
												<div class="col-md-8">
													<input type="text" class="form-control col-form-label" id="pemicu3" style="border: 1px solid;" value="<?php echo $dtaskepranap->pemicu3 ?>">
												</div>
											</div>		
											<div class="form-group row mt-3">
												<label class="col-md-2">Faktor faktor yang mengurangi / menghilangkan nyeri</label>
												<div class="col-md-8">
													<input type="text" class="form-control col-form-label" id="hilang3" style="border: 1px solid;" value="<?php echo $dtaskepranap->hilang3 ?>">
												</div>
											</div>		
											<div class="form-group row mt-3">
												<label class="col-md-1">Hasil Skrinning</label>
												<div class="col-md-9">
													<input type="text" class="form-control col-form-label" id="skrining3" style="border: 1px solid;" value="<?php echo $dtaskepranap->skrining3 ?>">
												</div>
											</div>		
											<div class="form-group row mt-3">
												<label class="col-md-1">Saran / Tindakan</label>
												<div class="col-md-9">
													<input type="text" class="form-control col-form-label" id="saran3" style="border: 1px solid;" value="<?php echo $dtaskepranap->saran3 ?>">
												</div>
											</div>	
								</div>
								<div class="col-6 text-left mt-3">
									<button onclick="savenyeriaskep()" class="btn btn-primary save-button" data-bs-dismiss="modal">Simpan</button>
								</div>	
							</div> 
						</div> 
					</div> 

					<div class="tab-pane fade" id="skrinninggizi" role="tabpanel" aria-labelledby="subtabskrinninggizi">
						<div class="card">
							<div class="card-body">
								<div class="col-md-12 mt-3">
									<div class="form-group row col-spacing-row">
										<div class="col-md-12">
											<label class="col-form-label" style="font-weight: bold; font-size: 14px; color: #090773;">SKRINING GIZI</label>
										</div>
									</div>
									<div class="form-group row col-spacing-row mt-1">
										<label class="col-md-8 col-form-label" style="font-weight: bold; font-size: 12px; color: #FF0000;"> ANAK (Berdasarkan Malnutrition Screening Tool/MST)</label>
									</div>
									<div class="form-group row col-spacing-row">
										<label class="col-md-8 col-form-label" style="font-weight: bold; font-size: 12px; color: #000000;"> Bila skor Lebih besar atau sama dengan 2 dan atau pasien diagnosa khusus dilakukan perngkajian lanjut oleh dietesien</label>
									</div>
									<div class="form-group row col-spacing-row">
										<label class="col-md-8 col-form-label" style="font-weight: bold; font-size: 12px; color: #000000;"> Apakah pasien mengalami penurunan berat badan yang tidak di rencanakan/tidak diinginkan dalam 6 bulan terakhir</label>
									</div>
									<div class="form-group row col-spacing-row"> 
										<div class="col-md-11">
											<label><input type="radio" class="state iradio_square-red" id="turunbbanak1" name="turunbbanak" value="1" <?php if ($dtaskepranap->turunbbanak == 1) {echo "checked";} ?>> Tidak</label>
											<label><input type="radio" class="state iradio_square-red ml-3" id="turunbbanak2" name="turunbbanak" value="2" <?php if ($dtaskepranap->turunbbanak == 2) {echo "checked";} ?>> Tidak Yakin / Tidak tahu / Terasa baju lebih longgar</label>
											<label><input type="radio" class="state iradio_square-red ml-3" id="turunbbanak3" name="turunbbanak" value="3" <?php if ($dtaskepranap->turunbbanak == 3) {echo "checked";} ?>> Penurunan 1 - 5 Kg</label>
											<label><input type="radio" class="state iradio_square-red ml-3" id="turunbbanak4" name="turunbbanak" value="4" <?php if ($dtaskepranap->turunbbanak == 4) {echo "checked";} ?>> Penurunan 6 - 10 Kg</label>
											<label><input type="radio" class="state iradio_square-red ml-3" id="turunbbanak5" name="turunbbanak" value="5" <?php if ($dtaskepranap->turunbbanak == 5) {echo "checked";} ?>> Penurunan 11 - 15 Kg</label>
											<label><input type="radio" class="state iradio_square-red ml-3" id="turunbbanak6" name="turunbbanak" value="6" <?php if ($dtaskepranap->turunbbanak == 6) {echo "checked";} ?>> Penurunan > 15 Kg</label>
										</div>
									</div>
									<div class="form-group row col-spacing-row">
										<label class="col-md-4" style="font-weight: bold; font-size: 12px; color: #000000;"> Apakah asupan makan berkurang karena tidak ada nafsu makan</label>
										<div class="col-md-8">
											<label><input type="radio" class="state iradio_square-red" id="asupananak1" name="asupananak" value="1" <?php if ($dtaskepranap->asupananak == 1) {echo "checked";} ?>> Tidak</label>
											<label><input type="radio" class="state iradio_square-red ml-3" id="asupananak2" name="asupananak" value="2" <?php if ($dtaskepranap->asupananak == 2) {echo "checked";} ?>> Ya</label>
										</div>
									</div>
									<div class="form-group row col-spacing-row"> 
										<label class="col-md-1 col-form-label" id="labelskoranak" style="font-weight: bold; font-size: 14px; color: #000000;"><u>NILAI SKOR</u></label>
										<div class="col-md-1">
											<input type="text" class="form-control" id="skorhasilgizianak" style="font-size: 14px; border: 1px solid;" disabled>
										</div>
									</div>
									<div class="form-group row col-spacing-row mt-3">
										<label class="col-md-2" style="font-weight: bold; font-size: 12px; color: #000000;"> Pasien dengan diagnosa khusus</label>
										<div class="col-md-2">
											<label><input type="radio" class="state iradio_square-red" id="diagkhususanak1" name="diagkhususanak" value="1" <?php if ($dtaskepranap->diagkhususanak == 1) {echo "checked";} ?>> Tidak</label>
											<label><input type="radio" class="state iradio_square-red ml-3" id="diagkhususanak2" name="diagkhususanak" value="2" <?php if ($dtaskepranap->diagkhususanak == 2) {echo "checked";} ?>> Ya</label>
										</div>
										<label class="col-md-1" style="font-weight: bold; font-size: 12px; color: #000000;"> Sebutkan</label>
										<div class="col-md-3">
											<input type="text" class="form-control" id="diagkhusustextanak" style="border: 1px solid;" value="<?php echo $dtaskepranap->diagkhusustextanak ?>">
										</div>
									</div>
									<div class="form-group row col-spacing-row"> 
										<label class="col-md-2" style="font-weight: bold; font-size: 12px; color: #000000;"> Apakah sudah dibaca oleh dietesien</label>
										<div class="col-md-2">
											<label><input type="radio" class="state iradio_square-red" id="bacadietanak1" name="bacadietanak" value="1" <?php if ($dtaskepranap->bacadietanak == 1) {echo "checked";} ?>> Belum</label>
											<label><input type="radio" class="state iradio_square-red ml-3" id="bacadietanak2" name="bacadietanak" value="2" <?php if ($dtaskepranap->bacadietanak == 2) {echo "checked";} ?>> Ya, Jam</label>
										</div>
										<div class="col-md-1">
											<input type="time" class="form-control" id="bacadietjamanak" style="border: 1px solid;" value="<?php echo $dtaskepranap->bacadietjamanak ?>">
										</div>
									</div>
									<!-- dewasa---- -->
									<div class="form-group row col-spacing-row mt-3">
										<label class="col-md-8 col-form-label" style="font-weight: bold; font-size: 12px; color: #FF0000;"> DEWASA (Berdasarkan Malnutrition Screening Tool/MST)</label>
									</div>
									<div class="form-group row col-spacing-row">
										<label class="col-md-8 col-form-label" style="font-weight: bold; font-size: 12px; color: #000000;"> Bila skor Lebih besar atau sama dengan 2 dan atau pasien diagnosa khusus dilakukan perngkajian lanjut oleh dietesien</label>
									</div>
									<div class="form-group row col-spacing-row">
										<label class="col-md-8 col-form-label" style="font-weight: bold; font-size: 12px; color: #000000;"> Apakah pasien mengalami penurunan berat badan yang tidak di rencanakan/tidak diinginkan dalam 6 bulan terakhir</label>
									</div>
									<div class="form-group row col-spacing-row"> 
										<div class="col-md-11">
											<label><input type="radio" class="state iradio_square-red" id="turunbb1" name="turunbb" value="1" <?php if ($dtaskepranap->turunbb == 1) {echo "checked";} ?>> Tidak</label>
											<label><input type="radio" class="state iradio_square-red ml-3" id="turunbb2" name="turunbb" value="2" <?php if ($dtaskepranap->turunbb == 2) {echo "checked";} ?>> Tidak Yakin / Tidak tahu / Terasa baju lebih longgar</label>
											<label><input type="radio" class="state iradio_square-red ml-3" id="turunbb3" name="turunbb" value="3" <?php if ($dtaskepranap->turunbb == 3) {echo "checked";} ?>> Penurunan 1 - 5 Kg</label>
											<label><input type="radio" class="state iradio_square-red ml-3" id="turunbb4" name="turunbb" value="4" <?php if ($dtaskepranap->turunbb == 4) {echo "checked";} ?>> Penurunan 6 - 10 Kg</label>
											<label><input type="radio" class="state iradio_square-red ml-3" id="turunbb5" name="turunbb" value="5" <?php if ($dtaskepranap->turunbb == 5) {echo "checked";} ?>> Penurunan 11 - 15 Kg</label>
											<label><input type="radio" class="state iradio_square-red ml-3" id="turunbb6" name="turunbb" value="6" <?php if ($dtaskepranap->turunbb == 6) {echo "checked";} ?>> Penurunan > 15 Kg</label>
										</div>
									</div>
									<div class="form-group row col-spacing-row">
										<label class="col-md-4" style="font-weight: bold; font-size: 12px; color: #000000;"> Apakah asupan makan berkurang karena tidak ada nafsu makan</label>
										<div class="col-md-8">
											<label><input type="radio" class="state iradio_square-red" id="asupan1" name="asupan" value="1" <?php if ($dtaskepranap->asupan == 1) {echo "checked";} ?>> Tidak</label>
											<label><input type="radio" class="state iradio_square-red ml-3" id="asupan2" name="asupan" value="2" <?php if ($dtaskepranap->asupan == 2) {echo "checked";} ?>> Ya</label>
										</div>
									</div>
									<div class="form-group row col-spacing-row"> 
										<label class="col-md-1 col-form-label" id="labelskor" style="font-weight: bold; font-size: 14px; color: #000000;"><u>NILAI SKOR</u></label>
										<div class="col-md-1">
											<input type="text" class="form-control" id="skorhasilgizi" style="font-size: 14px; border: 1px solid;" disabled>
										</div>
									</div>
									<div class="form-group row col-spacing-row mt-3">
										<label class="col-md-2" style="font-weight: bold; font-size: 12px; color: #000000;"> Pasien dengan diagnosa khusus</label>
										<div class="col-md-2">
											<label><input type="radio" class="state iradio_square-red" id="diagkhusus1" name="diagkhusus" value="1" <?php if ($dtaskepranap->diagkhusus == 1) {echo "checked";} ?>> Tidak</label>
											<label><input type="radio" class="state iradio_square-red ml-3" id="diagkhusus2" name="diagkhusus" value="2" <?php if ($dtaskepranap->diagkhusus == 2) {echo "checked";} ?>> Ya</label>
										</div>
										<label class="col-md-1" style="font-weight: bold; font-size: 12px; color: #000000;"> Sebutkan</label>
										<div class="col-md-3">
											<input type="text" class="form-control" id="diagkhusustext" style="border: 1px solid;" value="<?php echo $dtaskepranap->diagkhusustext ?>">
										</div>
									</div>
									<div class="form-group row col-spacing-row"> 
										<label class="col-md-2" style="font-weight: bold; font-size: 12px; color: #000000;"> Apakah sudah dibaca oleh dietesien</label>
										<div class="col-md-2">
											<label><input type="radio" class="state iradio_square-red" id="bacadiet1" name="bacadiet" value="1" <?php if ($dtaskepranap->bacadiet == 1) {echo "checked";} ?>> Belum</label>
											<label><input type="radio" class="state iradio_square-red ml-3" id="bacadiet2" name="bacadiet" value="2" <?php if ($dtaskepranap->bacadiet == 2) {echo "checked";} ?>> Ya, Jam</label>
										</div>
										<div class="col-md-1">
											<input type="time" class="form-control" id="bacadietjam" style="border: 1px solid;" value="<?php echo $dtaskepranap->bacadietjam ?>">
										</div>
									</div>
									<!-- geriatri---- -->
									<div class="form-group row col-spacing-row mt-3">
										<label class="col-md-8 col-form-label" style="font-weight: bold; font-size: 12px; color: #FF0000;"> GERIATRI (Berdasarkan MNA-SF)</label>
									</div>
									<div class="form-group row col-spacing-row">
										<label class="col-md-10 col-form-label" style="font-weight: bold; font-size: 12px; color: #000000;"> Apakah asupan makanan berkurang selama 3 bulan terakhir karena kehilangan nafsu makan, gangguan percernaan kesulitan mengunyah atau menelan</label>
									</div>
									<div class="form-group row col-spacing-row">
										<label><input type="radio" class="state iradio_square-red ml-3" id="geriasupan1" name="geriasupan" value="1" <?php if ($dtaskepranap->geriasupan == 1) {echo "checked";} ?>> Asupan makanan sangat berkurang</label>
										<label><input type="radio" class="state iradio_square-red ml-3" id="geriasupan2" name="geriasupan" value="2" <?php if ($dtaskepranap->geriasupan == 2) {echo "checked";} ?>> Asupan makanan agak berkurang</label>
										<label><input type="radio" class="state iradio_square-red ml-3" id="geriasupan3" name="geriasupan" value="3" <?php if ($dtaskepranap->geriasupan == 3) {echo "checked";} ?>> Asupan makanan tidak berkurang</label>
									</div>
									<div class="form-group row col-spacing-row">
										<label class="col-md-10 col-form-label" style="font-weight: bold; font-size: 12px; color: #000000;"> Penurunan berat badan selama 3 bulan terakhir</label>
									</div>
									<div class="form-group row col-spacing-row">
										<label><input type="radio" class="state iradio_square-red ml-3" id="geribb1" name="geribb" value="1" <?php if ($dtaskepranap->geribb == 1) {echo "checked";} ?>> Penurunan berat badan lebih dari 3 Kg</label>
										<label><input type="radio" class="state iradio_square-red ml-3" id="geribb2" name="geribb" value="2" <?php if ($dtaskepranap->geribb == 2) {echo "checked";} ?>> Tidak tahu</label>
										<label><input type="radio" class="state iradio_square-red ml-3" id="geribb3" name="geribb" value="3" <?php if ($dtaskepranap->geribb == 3) {echo "checked";} ?>> Penurunan berat badan antara 1 hingga 3 Kg</label>
										<label><input type="radio" class="state iradio_square-red ml-3" id="geribb4" name="geribb" value="4" <?php if ($dtaskepranap->geribb == 4) {echo "checked";} ?>> Tidka ada penurunan berat badan</label>
									</div>
									<div class="form-group row col-spacing-row">
										<label class="col-md-10 col-form-label" style="font-weight: bold; font-size: 12px; color: #000000;"> Mobilitas</label>
									</div>
									<div class="form-group row col-spacing-row">
										<label><input type="radio" class="state iradio_square-red ml-3" id="gerimobilitas1" name="gerimobilitas" value="1" <?php if ($dtaskepranap->gerimobilitas == 1) {echo "checked";} ?>> Terbatas pada tempat tidur</label>
										<label><input type="radio" class="state iradio_square-red ml-3" id="gerimobilitas2" name="gerimobilitas" value="2" <?php if ($dtaskepranap->gerimobilitas == 2) {echo "checked";} ?>> Mampu bangun dari tempat tidur / kursi tetapi tidak berpergian keluar rumah</label>
										<label><input type="radio" class="state iradio_square-red ml-3" id="gerimobilitas3" name="gerimobilitas" value="3" <?php if ($dtaskepranap->gerimobilitas == 3) {echo "checked";} ?>> Dapat berpergian keluar rumah</label>
									</div>
									<div class="form-group row col-spacing-row">
										<label class="col-md-10 col-form-label" style="font-weight: bold; font-size: 12px; color: #000000;"> Menderita tekanan psikologis atau penyakit yang berat dalam 3 bulan terakhir</label>
									</div>
									<div class="form-group row col-spacing-row">
										<label><input type="radio" class="state iradio_square-red ml-3" id="geritekanan1" name="geritekanan" value="1" <?php if ($dtaskepranap->geritekanan == 1) {echo "checked";} ?>> Ya</label>
										<label><input type="radio" class="state iradio_square-red ml-3" id="geritekanan2" name="geritekanan" value="2" <?php if ($dtaskepranap->geritekanan == 2) {echo "checked";} ?>> Tidak</label>
									</div>
									<div class="form-group row col-spacing-row"> 
										<label class="col-md-10 col-form-label" style="font-weight: bold; font-size: 12px; color: #000000;"> Gangguan Neuropsikologis</label>
									</div>
									<div class="form-group row col-spacing-row">
										<label><input type="radio" class="state iradio_square-red ml-3" id="gerigangguan1" name="gerigangguan" value="1" <?php if ($dtaskepranap->gerigangguan == 1) {echo "checked";} ?>> Depresi</label>
										<label><input type="radio" class="state iradio_square-red ml-3" id="gerigangguan2" name="gerigangguan" value="2" <?php if ($dtaskepranap->gerigangguan == 2) {echo "checked";} ?>> Kepikunan Ringan</label>
										<label><input type="radio" class="state iradio_square-red ml-3" id="gerigangguan3" name="gerigangguan" value="3" <?php if ($dtaskepranap->gerigangguan == 3) {echo "checked";} ?>> Tidak ada gangguan Psikologis</label>
									</div>
									<div class="form-group row col-spacing-row">
										<label class="col-md-10 col-form-label" style="font-weight: bold; font-size: 12px; color: #000000;"> Indeks Masa Tubuh(IMT)</label>
									</div>
									<div class="form-group row col-spacing-row">
										<label><input type="radio" class="state iradio_square-red ml-3" id="geriindeks1" name="geriindeks" value="1" <?php if ($dtaskepranap->geriindeks == 1) {echo "checked";} ?>> IMT kurang dari 19</label>
										<label><input type="radio" class="state iradio_square-red ml-3" id="geriindeks2" name="geriindeks" value="2" <?php if ($dtaskepranap->geriindeks == 2) {echo "checked";} ?>> IMT 19 sampai kurang dari 21</label>
										<label><input type="radio" class="state iradio_square-red ml-3" id="geriindeks3" name="geriindeks" value="3" <?php if ($dtaskepranap->geriindeks == 3) {echo "checked";} ?>> IMT 21 sampai kurang dari 23</label>
										<label><input type="radio" class="state iradio_square-red ml-3" id="geriindeks4" name="geriindeks" value="4" <?php if ($dtaskepranap->geriindeks == 4) {echo "checked";} ?>> IMT 23 atau lebih</label>
									</div>
									<div class="form-group row col-spacing-row">
										<label class="col-md-10 col-form-label" style="font-weight: bold; font-size: 12px; color: #000000;"> BILA DATA IMT TIDAK ADA MAKA GANTI PERTANYAAN IMT DIATAS DENGAN :</label>
									</div>
									<div class="form-group row col-spacing-row">
										<label class="col-md-10 col-form-label" style="font-weight: bold; font-size: 12px; color: #000000;"> Lingkar Betis</label>
									</div>
									<div class="form-group row col-spacing-row">
										<label><input type="radio" class="state iradio_square-red ml-3" id="geriindeks5" name="geriindeks" value="1" <?php if ($dtaskepranap->geriindeks == 5) {echo "checked";} ?>> Lingkar betis kurang dari 31</label>
										<label><input type="radio" class="state iradio_square-red ml-3" id="geriindeks6" name="geriindeks" value="2" <?php if ($dtaskepranap->geriindeks == 6) {echo "checked";} ?>> Lingkar betis sama dengan 31 atau lebih</label>
									</div>
									<div class="form-group row col-spacing-row mt-3">
										<label class="col-md-2 col-form-label" style="font-weight: bold; font-size: 12px; color: #000000;"> Skor 12 - 14 : Status Gizi Normal</label>
										<label class="col-md-2 col-form-label" style="font-weight: bold; font-size: 12px; color: #000000;"> Skor 8 - 11 : Beresiko Mal nutrisi</label>
										<label class="col-md-2 col-form-label" style="font-weight: bold; font-size: 12px; color: #000000;"> Skor 0 - 7 : Mal nutrisi</label>
										<label class="col-md-1 col-form-label text-right" id="labelskorgeri" style="font-weight: bold; font-size: 14px; color: #000000;"><u>NILAI SKOR</u></label>
										<div class="col-md-1">
											<input type="text" class="form-control" id="skorgeri" style="font-size: 14px; border: 1px solid;" disabled>
										</div>
									</div>
								</div>
								<div class="col-6 text-left mt-3">
									<button onclick="saveaksepgigiranap()" class="btn btn-primary save-button" data-bs-dismiss="modal">Simpan</button>
								</div>	
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="jatuhanak" role="tabpanel" aria-labelledby="subtabjatuhanak">
						<!-- Penilaian Resiko Jatuh Anak -->
						<div class="card">
							<div class="card-body">
								<div class="col-md-12 mt-3">
									<div class="form-group row col-spacing-row">
										<div class="col-md-12">
											<label class="col-form-label" style="font-weight: bold; font-size: 14px; color: #090773;">RESIKO JATUH (ANAK)</label>
										</div>
									</div>
									<div class="form-group row col-spacing-row">
										<label class="col-md-1" style="font-weight: bold; font-size: 12px; color: #000000;"> Usia</label>
										<div class="col-md-10">
											<div class="form-group row col-spacing-row">
											<label><input type="radio" class="state iradio_square-red ml-3" id="anakusia1" name="anakusia" value="4" <?php if ($dtaskepranap->anakusia == 4) {echo "checked";} ?>> Dibawah 3 Tahun</label>
											<label><input type="radio" class="state iradio_square-red ml-3" id="anakusia2" name="anakusia" value="3" <?php if ($dtaskepranap->anakusia == 3) {echo "checked";} ?>> 3 s/d  dibawah 7 Tahun</label>
											<label><input type="radio" class="state iradio_square-red ml-3" id="anakusia3" name="anakusia" value="2" <?php if ($dtaskepranap->anakusia == 2) {echo "checked";} ?>> 7 s/d dibawah 13 Tahun</label>
											<label><input type="radio" class="state iradio_square-red ml-3" id="anakusia4" name="anakusia" value="1" <?php if ($dtaskepranap->anakusia == 1) {echo "checked";} ?>> 13 Tahun keatas</label>
											</div>
										</div>
									</div>
									<div class="form-group row col-spacing-row">
										<label class="col-md-1" style="font-weight: bold; font-size: 12px; color: #000000;"> Jenis Kelamin</label>
										<div class="col-md-10">
											<div class="form-group row col-spacing-row">
											<label><input type="radio" class="state iradio_square-red ml-3" id="kelamin1" name="kelamin" value="2" <?php if ($dtaskepranap->kelamin == 2) {echo "checked";} ?>> Laki - Laki</label>
											<label><input type="radio" class="state iradio_square-red ml-3" id="kelamin2" name="kelamin" value="1" <?php if ($dtaskepranap->kelamin == 1) {echo "checked";} ?>> Perempuan</label>
											</div>
										</div>
									</div>
									<div class="form-group row col-spacing-row">
										<label class="col-md-1" style="font-weight: bold; font-size: 12px; color: #000000;"> Diagnosis</label>
										<div class="col-md-10">
											<div class="form-group row col-spacing-row">
											<label><input type="radio" class="state iradio_square-red ml-3" id="diagnosis1" name="diagnosis" value="4" <?php if ($dtaskepranap->diagnosis == 4) {echo "checked";} ?>> Diagnosis terkait neurologis</label>
											<label><input type="radio" class="state iradio_square-red ml-3" id="diagnosis2" name="diagnosis" value="3" <?php if ($dtaskepranap->diagnosis == 3) {echo "checked";} ?>> Perubahan dalam oksigenisasi (masalah salurah nafas, dehidrasi, anomia, anoroxia, sinkop/sakit kepala dll)</label>
											<label><input type="radio" class="state iradio_square-red ml-3" id="diagnosis3" name="diagnosis" value="2" <?php if ($dtaskepranap->diagnosis == 2) {echo "checked";} ?>> Gangguan tingkah laku dan kejiwaan</label>
											<label><input type="radio" class="state iradio_square-red ml-3" id="diagnosis4" name="diagnosis" value="2" <?php if ($dtaskepranap->diagnosis == 1) {echo "checked";} ?>> Diagnosis Lain</label>
											</div>
										</div>
									</div> 
									<div class="form-group row col-spacing-row">
										<label class="col-md-1" style="font-weight: bold; font-size: 12px; color: #000000;"> Gangguan Kognitif</label>
										<div class="col-md-10">
											<div class="form-group row col-spacing-row">
												<label><input type="radio" class="state iradio_square-red ml-3" id="gangguan1" name="gangguan" value="3" <?php if ($dtaskepranap->gangguan == 3) {echo "checked";} ?>> Tidak sadar terhadap keterbatasan</label>
												<label><input type="radio" class="state iradio_square-red ml-3" id="gangguan2" name="gangguan" value="2" <?php if ($dtaskepranap->gangguan == 2) {echo "checked";} ?>> Lupa Keterbatasan</label>
												<label><input type="radio" class="state iradio_square-red ml-3" id="gangguan3" name="gangguan" value="1" <?php if ($dtaskepranap->gangguan == 1) {echo "checked";} ?>> Mengetahui kemampuan diri</label>
											</div>	
										</div>
									</div>
									<div class="form-group row col-spacing-row">
										<label class="col-md-1" style="font-weight: bold; font-size: 12px; color: #000000;"> Faktor Lingkungan</label>
										<div class="col-md-10">
											<div class="form-group row col-spacing-row">
												<label><input type="radio" class="state iradio_square-red ml-3" id="lingkungan1" name="lingkungan" value="4" <?php if ($dtaskepranap->lingkungan == 4) {echo "checked";} ?>> Riwayat Jatuh dari tempat tidur saat bayi/anak, Bayi(kurang dari 1 bulan) atau balita (umur sampai 3 tahun) yang menggunakan tempat tidur besar</label>
												<label><input type="radio" class="state iradio_square-red ml-3" id="lingkungan2" name="lingkungan" value="3" <?php if ($dtaskepranap->lingkungan == 3) {echo "checked";} ?>> Pasien menggunakan alat bantu, bayi (kurang dari 1 bulan) atau balita (Umur sampai  3 Tahun) yang menggunakan box</label>
											</div>
										</div>
									</div>
									<div class="form-group row col-spacing-row">
										<label class="col-md-1" style="font-weight: bold; font-size: 12px; color: #000000;"> </label>
										<div class="col-md-10">
											<div class="form-group row col-spacing-row">
												<label class="col-md-3" style="font-weight: bold; font-size: 12px; color: #000000;">Furniture atau pencahayaan yang kurang baik</label>
												<label><input type="radio" class="state iradio_square-red ml-3" id="lingkungan3" name="lingkungan" value="2" <?php if ($dtaskepranap->lingkungan == 2) {echo "checked";} ?>> Pasien berada di tempat tidur</label>
												<label><input type="radio" class="state iradio_square-red ml-3" id="lingkungan4" name="lingkungan" value="1" <?php if ($dtaskepranap->lingkungan == 1) {echo "checked";} ?>> Area Rawat Jalan</label>
											</div>
										</div>
									</div> 
									<div class="form-group row col-spacing-row">
										<label class="col-md-1" style="font-weight: bold; font-size: 12px; color: #000000;">Respon tubuh terhadap sedasi, anastesi, bedah</label>
										<div class="col-md-10">
											<div class="form-group row col-spacing-row">
												<label><input type="radio" class="state iradio_square-red ml-3" id="respon1" name="respon" value="3" <?php if ($dtaskepranap->respon == 3) {echo "checked";} ?>> Dalam 24 Jam</label>
												<label><input type="radio" class="state iradio_square-red ml-3" id="respon2" name="respon" value="2" <?php if ($dtaskepranap->respon == 2) {echo "checked";} ?>> Dalam 48 Jam</label>
												<label><input type="radio" class="state iradio_square-red ml-3" id="respon3" name="respon" value="1" <?php if ($dtaskepranap->respon == 1) {echo "checked";} ?>> > 24 Jam</label>
											</div>
										</div>
									</div>
									<div class="form-group row col-spacing-row">
										<label class="col-md-1" style="font-weight: bold; font-size: 12px; color: #000000;">Penggunaan Obat</label>
										<div class="col-md-10">
											<div class="form-group row col-spacing-row">
												<label><input type="radio" class="state iradio_square-red ml-3" id="penggunaanobat1" name="penggunaanobat" value="3" <?php if ($dtaskepranap->penggunaanobat == 3) {echo "checked";} ?>> Bermacam-macam obat yang di gunakan (kecuali pasien ICU, yang menggunakan sedasi dan paralisis) hipnotik, fenotiazi, antidesan, narkotik </label>
												<label><input type="radio" class="state iradio_square-red ml-3" id="penggunaanobat2" name="penggunaanobat" value="2" <?php if ($dtaskepranap->penggunaanobat == 2) {echo "checked";} ?>> Salah satu dari obat diatas</label>
												<label><input type="radio" class="state iradio_square-red ml-3" id="penggunaanobat3" name="penggunaanobat" value="1" <?php if ($dtaskepranap->penggunaanobat == 1) {echo "checked";} ?>> Pengobatan lain</label>
											</div>
										</div>
									</div>
									<div class="form-group row col-spacing-row">
										<label class="col-md-1 col-form-label" id="labelskorobat" style="font-weight: bold; font-size: 14px; color: #000000;"><u>TOTAL SKOR</u></label>
										<div class="col-md-1">
											<input type="text" class="form-control" id="skorjatuhanak"  style="font-size: 14px; border: 1px solid;" value="<?php echo $dtaskepranap->skorjatuhanak ?>" disabled>
										</div>
										<div class="col-md-8">
											<label class="col-md-6 col-form-label">Skor 7 - 11 : Resiko rendah untuk jatuh</label>
											<label class="col-md-6 col-form-label">Skor 12 atau lebih besar : Resiko tinggi untuk jatuh</label>
										</div>
									</div>
								</div> 
								<div class="col-6 text-left mt-3">
									<button onclick="savejatuhanak()" class="btn btn-primary save-button" data-bs-dismiss="modal">Simpan</button>
								</div>	
							</div> 
						</div> 
					</div> 
				</div> 
			</nav>
		</div> 
	</div> 

<script>
	function saveriwayat() {
		console.log('saveriwayat di tekan');
		var no_rm = document.getElementById("no_rm").value;
		var kode_dokter = document.getElementById("kode_dokter").value;
		var notransaksi = document.getElementById("notransaksi").value;

		var riwayatsekarang = document.getElementById("riwayatsekarang").value;
		var penyakitdahulu = document.getElementById("penyakitdahulu").value;
		
		$.ajax({
			url: "<?php echo site_url(); ?>/rme/saveRanapRiwayat",
			type: "GET",
			data: {
				no_rm: no_rm,
				kode_dokter: kode_dokter,
				notransaksi: notransaksi,

				riwayatsekarang : riwayatsekarang,
				penyakitdahulu : penyakitdahulu

			},
			success: function (ajaxData) {
				console.log('Simpan Data riwayat Berhasil');
				swal('Simpan Data Berhasil');

			},
			error: function (ajaxData) {
				swal('Simpan Data Gagal');
			}
		});
	}
	

	function saveimunisasi() {
		console.log('saveriwayat di tekan');
		var no_rm = document.getElementById("no_rm").value;
		var kode_dokter = document.getElementById("kode_dokter").value;
		var notransaksi = document.getElementById("notransaksi").value;
		var bcg = $("#bcg").prop("checked") ? 1 : 0;
		var polio = $("#polio").prop("checked") ? 1 : 0;
		var dpt = $("#dpt").prop("checked") ? 1 : 0;
		var campak = $("#campak").prop("checked") ? 1 : 0;
		var hepatitisb = $("#hepatitisb").prop("checked") ? 1 : 0;

		$.ajax({
			url: "<?php echo site_url(); ?>/rme/saveRanapImunisasi",
			type: "GET",
			data: {
				no_rm: no_rm,
				kode_dokter: kode_dokter,
				notransaksi: notransaksi,

				bcg : bcg,
				polio : polio,
				dpt : dpt,
				campak : campak,
				hepatitisb : hepatitisb

			},
			success: function (ajaxData) {
				console.log('Simpan Data imunisasi Berhasil');
				swal('Simpan Data Berhasil');
			},
			error: function (ajaxData) {
				swal('Simpan Data Gagal');
			}
		});
		
	}

	function savepersalinan() {
		console.log('savepersalinan di tekan');
		var no_rm = document.getElementById("no_rm").value;
		var kode_dokter = document.getElementById("kode_dokter").value;
		var notransaksi = document.getElementById("notransaksi").value;

		var caramelahirkan = $("input[name='caramelahirkan']:checked").val();
		var tolongoleh = $("input[name='tolongoleh']:checked").val();
		var bb = document.getElementById("bb").value;
		var pb = document.getElementById("pb").value;
		var menangis = $("input[name='menangis']:checked").val();
		var operasi = $("input[name='operasi']:checked").val();
		var operasitext = document.getElementById("operasitext").value;
		var transfusi = $("input[name='transfusi']:checked").val();
		var transfusitext = document.getElementById("transfusitext").value;

		$.ajax({
			url: "<?php echo site_url(); ?>/rme/savePersalinanRanap",
			type: "GET",
			data: {
				no_rm: no_rm,
				kode_dokter: kode_dokter,
				notransaksi: notransaksi,

				caramelahirkan : caramelahirkan,
				tolongoleh : tolongoleh,
				bb : bb,
				pb : pb,
				menangis : menangis,
				operasi : operasi,
				operasitext : operasitext,
				transfusi : transfusi,
				transfusitext : transfusitext
			},
			success: function (ajaxData) {
				console.log('Simpan Data persalinan Berhasil');
				swal('Simpan Data Berhasil');
			},
			error: function (ajaxData) {
				swal('Simpan Data Gagal');
			}
		});
		
	}

	function savefisikranap() {
		console.log('savefisikranap di tekan');
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
		var spo2_fisik = document.getElementById("spo2_fisik").value;
		
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

		var abdomen = $("input[name='abdomen']:checked").val();
		var abdomentext = document.getElementById("abdomentext").value;

		var kepala = $("input[name='kepala']:checked").val();
		var kepalatext = document.getElementById("kepalatext").value;

		var urogenital = $("input[name='urogenital']:checked").val();
		var urogenitaltext = document.getElementById("urogenitaltext").value;
		
		var ekstermitas = $("input[name='ekstermitas']:checked").val();
		var ekstermitasatas = $("input[name='ekstermitasatas']:checked").val();
		var ekstermitasbawah = $("input[name='ekstermitasbawah']:checked").val();

		var kulit = $("input[name='kulit']:checked").val();
		var kulitturgor = $("input[name='kulitturgor']:checked").val();
		var kulitluka = $("input[name='kulitluka']:checked").val();

		var jantung = $("input[name='jantung']:checked").val();
		var jantungnyeri = $("input[name='jantungnyeri']:checked").val();
		var jantungbunyi = $("input[name='jantungbunyi']:checked").val();

		$.ajax({
			url: "<?php echo site_url(); ?>/rme/savefisikRanap",
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
				spo2_fisik : spo2_fisik,

				kepala : kepala,
				kepalatext : kepalatext,
				mata : mata,
				matatext : matatext,
				tht : tht,
				thttext : thttext,
				mulut : mulut,
				muluttext : muluttext,
				leher : leher,
				lehertext : lehertext,
				thorax : thorax,
				thoraxtext : thoraxtext,
				abdomen : abdomen,
				abdomentext : abdomentext,
				kepala : kepala,
				kepalatext : kepalatext,
				urogenital : urogenital,
				urogenitaltext : urogenitaltext,
				ekstermitas : ekstermitas,
				ekstermitasatas : ekstermitasatas,
				ekstermitasbawah : ekstermitasbawah,
				kulit : kulit,
				kulitturgor : kulitturgor,
				kulitluka : kulitluka,
				jantung : jantung,
				jantungnyeri : jantungnyeri,
				jantungbunyi : jantungbunyi
			},
			success: function (ajaxData) {
				console.log('Simpan Data persalinan Berhasil');
				swal('Simpan Data berhasil');
			},
			error: function (ajaxData) {
				swal('Simpan Data Gagal');
			}
		});
		
	}
	
	function savenyeriaskep() {
		console.log('savenyeriaskep di tekan');
		var no_rm = document.getElementById("no_rm").value;
		var kode_dokter = document.getElementById("kode_dokter").value;
		var notransaksi = document.getElementById("notransaksi").value;

		var face = document.getElementById("face").value;
		var leg = document.getElementById("leg").value;
		var activity = document.getElementById("activity").value;
		var cry = document.getElementById("cry").value;
		var consol = document.getElementById("consol").value;
		var skrining = document.getElementById("skrining").value;
		var saran = document.getElementById("saran").value;
		 
		var nyeri2 = $("input[name='nyeri2']:checked").val();
		var sifat2 = $("input[name='sifat2']:checked").val();
		var kualitasnyeri2 = $("input[name='kualitasnyeri2']:checked").val();
		var menjalar2 = $("input[name='menjalar2']:checked").val();
		var skornyeri2 = document.getElementById("skornyeri2").value;
		var frekuensi2 = $("input[name='frekuensi2']:checked").val();
		var lamanyeri2 = document.getElementById("lamanyeri2").value;
		var lokasi2 = document.getElementById("lokasi2").value;
		var nyeri3 = $("input[name='nyeri3']:checked").val();
		var sifat3 = $("input[name='sifat3']:checked").val();
		var kualitasnyeri3 = $("input[name='kualitasnyeri3']:checked").val();
		var menjalar3 = $("input[name='menjalar3']:checked").val();
		var menjalartext3 = document.getElementById("menjalartext3").value;
		var skornyeri3 = $("input[name='skornyeri3']:checked").val();
		var frekuensi3 = $("input[name='frekuensi3']:checked").val();
		var lamanyeri3 = document.getElementById("lamanyeri3").value;
		var lokasi3 = document.getElementById("lokasi3").value;
		var pemicu3 = document.getElementById("pemicu3").value;
		var hilang3 = document.getElementById("hilang3").value;
		var skrining3 = document.getElementById("skrining3").value;
		var saran3 = document.getElementById("saran3").value;

		$.ajax({
			url: "<?php echo site_url(); ?>/rme/saveNyeriAssRanap",
			type: "GET",
			data: {
				no_rm: no_rm,
				kode_dokter: kode_dokter,
				notransaksi: notransaksi,
				face : face,
				leg : leg,
				activity : activity,
				cry : cry,
				consol : consol,
				skrining : skrining,
				saran : saran,
				nyeri2 : nyeri2,
				sifat2 : sifat2,
				kualitasnyeri2 : kualitasnyeri2,
				menjalar2 : menjalar2,
				skornyeri2 : skornyeri2,
				frekuensi2 : frekuensi2,
				lamanyeri2 : lamanyeri2,
				lokasi2 : lokasi2,
				nyeri3 : nyeri3,
				sifat3 : sifat3,
				kualitasnyeri3 : kualitasnyeri3,
				menjalar3 : menjalar3,
				menjalartext3 : menjalartext3,
				skornyeri3 : skornyeri3,
				frekuensi3 : frekuensi3,
				lamanyeri3 : lamanyeri3,
				lokasi3 : lokasi3,
				pemicu3 : pemicu3,
				hilang3 : hilang3,
				skrining3 : skrining3,
				saran3 : saran3
			},
			success: function (ajaxData) {
				console.log('Simpan Data assesmen nyeri Berhasil');
				swal('Simpan Data Berhasil');

			},
			error: function (ajaxData) {
				swal('Simpan Data Gagal');
			}
		});
	}

	function saveaksepgigiranap() {
		console.log('saveaksepgigiranap di tekan');
		var no_rm = document.getElementById("no_rm").value;
		var kode_dokter = document.getElementById("kode_dokter").value;
		var notransaksi = document.getElementById("notransaksi").value;

		var turunbbanak = $("input[name='turunbbanak']:checked").val();
		var asupananak = $("input[name='asupananak']:checked").val();
		var diagkhususanak = $("input[name='diagkhususanak']:checked").val();
		var diagkhusustextanak = document.getElementById("diagkhusustextanak").value;
		var bacadietanak = $("input[name='bacadietanak']:checked").val();
		var bacadietjamanak = document.getElementById("bacadietjamanak").value;

		var turunbb = $("input[name='turunbb']:checked").val();
		var asupan = $("input[name='asupan']:checked").val();
		var diagkhusus = $("input[name='diagkhusus']:checked").val();
		var diagkhusustext = document.getElementById("diagkhusustext").value;
		var bacadiet = $("input[name='bacadiet']:checked").val();
		var bacadietjam = document.getElementById("bacadietjam").value;

		var geriasupan = $("input[name='geriasupan']:checked").val();
		var geribb = $("input[name='geribb']:checked").val();
		var gerimobilitas = $("input[name='gerimobilitas']:checked").val();
		var geritekanan = $("input[name='geritekanan']:checked").val();
		var gerigangguan = $("input[name='gerigangguan']:checked").val();
		var geriindeks = $("input[name='geriindeks']:checked").val();

		$.ajax({
			url: "<?php echo site_url(); ?>/rme/saveAskepGiziRanap",
			type: "GET",
			data: {
				no_rm: no_rm,
				kode_dokter: kode_dokter,
				notransaksi: notransaksi,
				turunbbanak: turunbbanak,
				asupananak: asupananak,
				diagkhususanak: diagkhususanak,
				diagkhusustextanak: diagkhusustextanak,
				bacadietanak: bacadietanak,
				bacadietjamanak: bacadietjamanak,
				turunbb: turunbb,
				asupan: asupan,
				diagkhusus: diagkhusus,
				diagkhusustext: diagkhusustext,
				bacadiet: bacadiet,
				bacadietjam: bacadietjam,
				geriasupan: geriasupan,
				geribb: geribb,
				gerimobilitas: gerimobilitas,
				geritekanan: geritekanan,
				gerigangguan: gerigangguan,
				geriindeks: geriindeks
			},
			success: function (ajaxData) {
				console.log('Simpan Data saveaksepgigiranap Berhasil');
				swal('Simpan Data Berhasil');

			},
			error: function (ajaxData) {
				swal('Simpan Data Gagal');
			}
		});
	}


	function savejatuhanak() {
		console.log('savejatuhanak di tekan');
		var no_rm = document.getElementById("no_rm").value;
		var kode_dokter = document.getElementById("kode_dokter").value;
		var notransaksi = document.getElementById("notransaksi").value;

		var anakusia = $("input[name='anakusia']:checked").val();
		var kelamin = $("input[name='kelamin']:checked").val();
		var diagnosis = $("input[name='diagnosis']:checked").val();
		var gangguan = $("input[name='gangguan']:checked").val();
		var lingkungan = $("input[name='lingkungan']:checked").val();
		var respon = $("input[name='respon']:checked").val();
		var penggunaanobat = $("input[name='penggunaanobat']:checked").val();
		var skorjatuhanak = document.getElementById("skorjatuhanak").value;


		$.ajax({
			url: "<?php echo site_url(); ?>/rme/saveJatuhAnak",
			type: "GET",
			data: {
				no_rm: no_rm,
				kode_dokter: kode_dokter,
				notransaksi: notransaksi,
				anakusia: anakusia,
				kelamin: kelamin,
				diagnosis: diagnosis,
				gangguan: gangguan,
				lingkungan: lingkungan,
				respon: respon,
				penggunaanobat: penggunaanobat,
				skorjatuhanak: skorjatuhanak

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

<script>

$(document).ready(function() {
    // Ketika ada perubahan pada radio button
    $('input[name="operasi"]').on('change', function() {
        if ($(this).val() === '2') { // Jika "Ya" dipilih
            $('#operasitext').prop('disabled', false); // Aktifkan textbox
        } else {
            $('#operasitext').prop('disabled', true).val(''); // Nonaktifkan textbox dan kosongkan isinya
        }
    });

    // Saat halaman dimuat, cek nilai radio button
    if ($('input[name="operasi"]:checked').val() === '2') {
        $('#operasitext').prop('disabled', false); // Jika "Ya" dipilih, aktifkan textbox
    } else {
        $('#operasitext').prop('disabled', true).val(''); // Jika tidak, nonaktifkan textbox dan kosongkan isinya
    }
});


$(document).ready(function() {
    // Ketika ada perubahan pada radio button
    $('input[name="transfusi"]').on('change', function() {
        if ($(this).val() === '2') { // Jika "Ya" dipilih
            $('#transfusitext').prop('disabled', false); // Aktifkan textbox
        } else {
            $('#transfusitext').prop('disabled', true).val(''); // Nonaktifkan textbox dan kosongkan isinya
        }
    });

    // Saat halaman dimuat, cek nilai radio button
    if ($('input[name="transfusi"]:checked').val() === '2') {
        $('#transfusitext').prop('disabled', false); // Jika "Ya" dipilih, aktifkan textbox
    } else {
        $('#transfusitext').prop('disabled', true).val(''); // Jika tidak, nonaktifkan textbox dan kosongkan isinya
    }
});


$(document).ready(function() {
    // Atur nilai radio Normal saat halaman dimuat
	$('input[name="ekstermitas"]').on('change', function() {
        $('input[name="ekstermitasbawah"]').not(this).prop('checked', false); // Hanya boleh memilih satu opsi
		$('input[name="ekstermitasatas"]').not(this).prop('checked', false);
    });

    $('input[name="ekstermitasatas"]').on('change', function() {
        $('input[name="ekstermitasatas"]').not(this).prop('checked', false); // Hanya boleh memilih satu opsi
		$('input[name="ekstermitas"]').not(this).prop('checked', false);
    });

    $('input[name="ekstermitasbawah"]').on('change', function() {
        $('input[name="ekstermitasbawah"]').not(this).prop('checked', false); // Hanya boleh memilih satu opsi
		$('input[name="ekstermitas"]').not(this).prop('checked', false);
    });
});

$(document).ready(function() {
    // Atur nilai radio Normal saat halaman dimuat
	$('input[name="kulit"]').on('change', function() {
        $('input[name="kulitturgor"]').not(this).prop('checked', false); // Hanya boleh memilih satu opsi
		$('input[name="kulitluka"]').not(this).prop('checked', false);
    });

    $('input[name="kulitturgor"]').on('change', function() {
        $('input[name="kulitturgor"]').not(this).prop('checked', false); // Hanya boleh memilih satu opsi
		$('input[name="kulit"]').not(this).prop('checked', false);
    });

    $('input[name="kulitluka"]').on('change', function() {
        $('input[name="kulitluka"]').not(this).prop('checked', false); // Hanya boleh memilih satu opsi
		$('input[name="kulit"]').not(this).prop('checked', false);
    });
});

$(document).ready(function() {
    // Atur nilai radio Normal saat halaman dimuat
	$('input[name="jantung"]').on('change', function() {
        $('input[name="jantungnyeri"]').not(this).prop('checked', false); // Hanya boleh memilih satu opsi
		$('input[name="jantungbunyi"]').not(this).prop('checked', false);
    });

    $('input[name="jantungnyeri"]').on('change', function() {
        $('input[name="jantungnyeri"]').not(this).prop('checked', false); // Hanya boleh memilih satu opsi
		$('input[name="jantung"]').not(this).prop('checked', false);
    });

    $('input[name="jantungbunyi"]').on('change', function() {
        $('input[name="jantungbunyi"]').not(this).prop('checked', false); // Hanya boleh memilih satu opsi
		$('input[name="jantung"]').not(this).prop('checked', false);
    });
});


$(document).ready(function() {
    var kepalatextInput = $('#kepalatext');

    // Atur status awal textbox saat halaman dimuat
    if ($('#lainnya').is(':checked')) {
        kepalatextInput.prop('disabled', false);
    } else {
        kepalatextInput.prop('disabled', true).val('');
    }

    // Ketika ada perubahan pada radio button Kepala
    $('input[name="kepala"]').on('change', function() {
        if ($(this).attr('id') === 'lainnya') {
            kepalatextInput.prop('disabled', false);
        } else {
            kepalatextInput.prop('disabled', true).val('');
        }
    });
});

$(document).ready(function() {
    var matatextInput = $('#matatext');

    // Atur status awal textbox saat halaman dimuat
    if ($('#mata-lainnya').is(':checked')) {
        matatextInput.prop('disabled', false);
    } else {
        matatextInput.prop('disabled', true).val('');
    }

    // Ketika ada perubahan pada radio button Mata
    $('input[name="mata"]').on('change', function() {
        if ($(this).attr('id') === 'mata-lainnya') {
            matatextInput.prop('disabled', false);
        } else {
            matatextInput.prop('disabled', true).val('');
        }
    });
});

$(document).ready(function() {
    var thtTextInput = $('#thttext');

    // Atur status awal textbox saat halaman dimuat
    if ($('#tht-lainnya').is(':checked')) {
        thtTextInput.prop('disabled', false);
    } else {
        thtTextInput.prop('disabled', true).val('');
    }

    // Ketika ada perubahan pada radio button THT
    $('input[name="tht"]').on('change', function() {
        if ($(this).attr('id') === 'tht-lainnya') {
            thtTextInput.prop('disabled', false);
        } else {
            thtTextInput.prop('disabled', true).val('');
        }
    });
});

$(document).ready(function() {
    var mulutTextInput = $('#muluttext');

    // Atur status awal textbox saat halaman dimuat
    if ($('#mulut-lainnya').is(':checked')) {
        mulutTextInput.prop('disabled', false);
    } else {
        mulutTextInput.prop('disabled', true).val('');
    }

    // Ketika ada perubahan pada radio button Mulut
    $('input[name="mulut"]').on('change', function() {
        if ($(this).attr('id') === 'mulut-lainnya') {
            mulutTextInput.prop('disabled', false);
        } else {
            mulutTextInput.prop('disabled', true).val('');
        }
    });
});

$(document).ready(function() {
    var leherTextInput = $('#lehertext');

    // Atur status awal textbox saat halaman dimuat
    if ($('#leher-lainnya').is(':checked')) {
        leherTextInput.prop('disabled', false);
    } else {
        leherTextInput.prop('disabled', true).val('');
    }

    // Ketika ada perubahan pada radio button Leher
    $('input[name="leher"]').on('change', function() {
        if ($(this).attr('id') === 'leher-lainnya') {
            leherTextInput.prop('disabled', false);
        } else {
            leherTextInput.prop('disabled', true).val('');
        }
    });
});

$(document).ready(function() {
    // Thorax
    var thoraxText = $('#thoraxtext');
    if ($('#thorax-lainnya').is(':checked')) {
        thoraxText.prop('disabled', false);
    } else {
        thoraxText.prop('disabled', true).val('');
    }

    $('input[name="thorax"]').on('change', function() {
        if ($(this).attr('id') === 'thorax-lainnya') {
            thoraxText.prop('disabled', false);
        } else {
            thoraxText.prop('disabled', true).val('');
        }
    });

    // Abdomen
    var abdomenText = $('#abdomentext');
    if ($('#abdomen4').is(':checked')) {
        abdomenText.prop('disabled', false);
    } else {
        abdomenText.prop('disabled', true).val('');
    }

    $('input[name="abdomen"]').on('change', function() {
        if ($(this).attr('id') === 'abdomen4') {
            abdomenText.prop('disabled', false);
        } else {
            abdomenText.prop('disabled', true).val('');
        }
    });

    // Urogenital
    var urogenitalText = $('#urogenitaltext');
    if ($('#urogenital-lainnya').is(':checked')) {
        urogenitalText.prop('disabled', false);
    } else {
        urogenitalText.prop('disabled', true).val('');
    }

    $('input[name="urogenital"]').on('change', function() {
        if ($(this).attr('id') === 'urogenital-lainnya') {
            urogenitalText.prop('disabled', false);
        } else {
            urogenitalText.prop('disabled', true).val('');
        }
    });
});

</script>


<script>
//mengatur save tabnav====== SAVE OTOMATIS DISINI
// $(document).ready(function() {
//         $('a[data-toggle="tab"]').on('hide.bs.tab', function(e) {
//             var tabId = $(e.target).attr('href'); // Dapatkan ID tab yang sedang ditinggalkan
//             var saveButton = $(tabId).find('.save-button'); // Cari tombol 'Simpan' di tab yang ditinggalkan
// 			var editing = document.getElementById("editing").value;
// 			if (editing > 0) {
// 				if (saveButton.length > 0) {
// 					saveButton.click(); // Panggil fungsi klik pada tombol 'Simpan' jika ditemukan di tab yang ditinggalkan
// 				}
// 			}	
//         });
//     });

</script>


<script>
  function savealergiranap() {
    console.log('saveri alergi di tekan');
		var no_rm = document.getElementById("no_rm").value;
		var kode_dokter = document.getElementById("kode_dokter").value;
		var notransaksi = document.getElementById("notransaksi").value;

		var alergi = $("input[name='alergi']:checked").val();
		var obat = document.getElementById("obat").value;
		var makanan = document.getElementById("makanan").value;
		var lainnya = document.getElementById("lainnyaalergi").value;

		$.ajax({
			url: "<?php echo site_url(); ?>/rme/saveRanapAlergi", 
			type: "GET",
			data: {
				no_rm: no_rm,
				kode_dokter: kode_dokter,
				notransaksi: notransaksi,

				alergi : alergi,
				obat : obat,
				makanan : makanan,
				lainnya : lainnya
			},
			success: function (ajaxData) {
				console.log('Simpan Data alergi Berhasil');
				swal('Simpan Data Berhasil');
			},
			error: function (ajaxData) {
				swal('Simpan Data Gagal');
			}
		});
  }

  $(document).ready(function() {
    // Ketika ada perubahan pada radio button
    $('input[name="alergi"]').on('change', function() {
        if ($(this).val() === '1') { // Jika "Ya" dipilih
            $('#obat').prop('disabled', true); // Aktifkan textbox
            $('#makanan').prop('disabled', true); // Aktifkan textbox
            $('#lainnyaalergi').prop('disabled', true); // Aktifkan textbox
			$('#obat').prop('disabled', true).val(''); // Nonaktifkan textbox dan kosongkan isinya
            $('#makanan').prop('disabled', true).val(''); // Nonaktifkan textbox dan kosongkan isinya
            $('#lainnyaalergi').prop('disabled', true).val(''); // Nonaktifkan textbox dan kosongkan isinya
        } else {
			$('#obat').prop('disabled', false); // Aktifkan textbox
            $('#makanan').prop('disabled', false); // Aktifkan textbox
            $('#lainnyaalergi').prop('disabled', false); // Aktifkan textbox
        }
    });
});

</script>

<script>
  // Ambil referensi ke input-nilai yang akan dijumlahkan
  var faceInput = document.getElementById("face");
  var legInput = document.getElementById("leg");
  var activityInput = document.getElementById("activity");
  var cryInput = document.getElementById("cry");
  var consolInput = document.getElementById("consol");

  // Ambil referensi ke input tempat hasil akan ditampilkan
  var totalScoreInput = document.getElementById("totalscore");

  // Fungsi untuk menjumlahkan nilai dan menampilkannya
  function hitungTotal() {
    // Ambil nilai dari setiap input dan konversi ke angka (gunakan parseFloat atau parseInt)
    var face = parseFloat(faceInput.value) || 0;
    var leg = parseFloat(legInput.value) || 0;
    var activity = parseFloat(activityInput.value) || 0;
    var cry = parseFloat(cryInput.value) || 0;
    var consol = parseFloat(consolInput.value) || 0;

    // Jumlahkan nilai-nilai tersebut
    var total = face + leg + activity + cry + consol;

    // Tampilkan hasil penjumlahan di input dengan ID "totalscore"
    totalScoreInput.value = total;
  }

  // Panggil fungsi hitungTotal() saat nilai input berubah
  faceInput.addEventListener("input", hitungTotal);
  legInput.addEventListener("input", hitungTotal);
  activityInput.addEventListener("input", hitungTotal);
  cryInput.addEventListener("input", hitungTotal);
  consolInput.addEventListener("input", hitungTotal);

  // Hitung total awal saat halaman dimuat
  hitungTotal();
  </script>

<script>
  // Ambil referensi ke semua radio button
  var radioButtons = document.querySelectorAll("input[type='radio']");

  // Ambil referensi ke input tempat hasil akan ditampilkan
  var skorhasilgiziInput = document.getElementById("skorhasilgizi");

  // Fungsi untuk menghitung skor hasil gizi
  function hitungSkorHasilGizi() {
    var nilai = 0;

    // Cek nilai yang dipilih pada radio button dan tambahkan nilai sesuai kondisi
    if (document.getElementById("turunbb1").checked) nilai += 0;
    else if (document.getElementById("turunbb2").checked) nilai += 2;
    else if (document.getElementById("turunbb3").checked) nilai += 1;
    else if (document.getElementById("turunbb4").checked) nilai += 2;
    else if (document.getElementById("turunbb5").checked) nilai += 3;
    else if (document.getElementById("turunbb6").checked) nilai += 4;

    if (document.getElementById("asupan1").checked) nilai += 0;
    else if (document.getElementById("asupan2").checked) nilai += 1;

    // Isi nilai pada input skorhasilgizi
    skorhasilgiziInput.value = nilai;
  }

  // Panggil fungsi hitungSkorHasilGizi() saat radio button berubah
  radioButtons.forEach(function(radioButton) {
    radioButton.addEventListener("change", hitungSkorHasilGizi);
  });

  // Hitung nilai awal saat halaman dimuat
  hitungSkorHasilGizi();
</script>


<script>
  // Ambil referensi ke semua radio button
  var radioButtons1 = document.querySelectorAll("input[type='radio']");

  // Ambil referensi ke input tempat hasil akan ditampilkan
  var skorhasilgiziInputAnak = document.getElementById("skorhasilgizianak");

  // Fungsi untuk menghitung skor hasil gizi
  function hitungSkorHasilGiziAnak() {
    var nilai = 0;

    // Cek nilai yang dipilih pada radio button dan tambahkan nilai sesuai kondisi
    if (document.getElementById("turunbbanak1").checked) nilai += 0;
    else if (document.getElementById("turunbbanak2").checked) nilai += 2;
    else if (document.getElementById("turunbbanak3").checked) nilai += 1;
    else if (document.getElementById("turunbbanak4").checked) nilai += 2;
    else if (document.getElementById("turunbbanak5").checked) nilai += 3;
    else if (document.getElementById("turunbbanak6").checked) nilai += 4;

    if (document.getElementById("asupananak1").checked) nilai += 0;
    else if (document.getElementById("asupananak2").checked) nilai += 1;

    // Isi nilai pada input skorhasilgizi
    skorhasilgiziInputAnak.value = nilai;
  }

  // Panggil fungsi hitungSkorHasilGizi() saat radio button berubah
  radioButtons1.forEach(function(radioButton1) {
    radioButton1.addEventListener("change", hitungSkorHasilGiziAnak);
  });

  // Hitung nilai awal saat halaman dimuat
  hitungSkorHasilGiziAnak();
</script>

<script>
    document.getElementById("skorhasilgizianak").addEventListener("input", function() {
        var skorInput = this.value;
        if (skorInput === "") {
            // Setel nilai semua radio button menjadi 0 jika nilai input kosong
            document.getElementById("turunbbanak1").checked = false;
            document.getElementById("turunbbanak2").checked = false;
            document.getElementById("turunbbanak3").checked = false;
            document.getElementById("turunbbanak4").checked = false;
            document.getElementById("turunbbanak5").checked = false;
            document.getElementById("turunbbanak6").checked = false;
            
            document.getElementById("asupananak1").checked = false;
            document.getElementById("asupananak2").checked = false;
        }
    });
</script>


<script>
    document.getElementById("labelskoranak").addEventListener("click", function() {
        // Setel nilai semua radio button menjadi 0
        document.getElementById("turunbbanak1").checked = false;
        document.getElementById("turunbbanak2").checked = false;
        document.getElementById("turunbbanak3").checked = false;
        document.getElementById("turunbbanak4").checked = false;
        document.getElementById("turunbbanak5").checked = false;
        document.getElementById("turunbbanak6").checked = false;
        document.getElementById("asupananak1").checked = false;
        document.getElementById("asupananak2").checked = false;
        document.getElementById("diagkhususanak1").checked = false;
        document.getElementById("diagkhususanak2").checked = false;
        document.getElementById("bacadietanak1").checked = false;
        document.getElementById("bacadietanak2").checked = false;
		
        // Setel nilai input text menjadi kosong
        document.getElementById("diagkhusustextanak").value = "";
        document.getElementById("skorhasilgizianak").value = "";
        
        // Setel nilai input time menjadi 00:00
        document.getElementById("bacadietjamanak").value = "00:00";
    });
</script>

<script>
    document.getElementById("labelskor").addEventListener("click", function() {
        // Setel nilai semua radio button menjadi 0
        document.getElementById("turunbb1").checked = false;
        document.getElementById("turunbb2").checked = false;
        document.getElementById("turunbb3").checked = false;
        document.getElementById("turunbb4").checked = false;
        document.getElementById("turunbb5").checked = false;
        document.getElementById("turunbb6").checked = false;
        document.getElementById("asupan1").checked = false;
        document.getElementById("asupan2").checked = false;
        document.getElementById("diagkhusus1").checked = false;
        document.getElementById("diagkhusus2").checked = false;
        document.getElementById("bacadiet1").checked = false;
        document.getElementById("bacadiet2").checked = false;

        // Setel nilai input text menjadi kosong
        document.getElementById("diagkhusustext").value = "";
        document.getElementById("skorhasilgizi").value = "";

        
        // Setel nilai input time menjadi 00:00
        document.getElementById("bacadietjam").value = "00:00";
    });
</script>

<script>
// Mengambil semua elemen radio dengan nama yang sesuai
var radioElements = document.querySelectorAll('input[type="radio"][name^="geri"]');

// Memasukkan total nilai ke dalam input dengan ID "skorgeri"
function updateTotalScore() {
    var totalScore = 0;
    radioElements.forEach(function (radio) {
        if (radio.checked) {
            totalScore += parseInt(radio.value) - 1;
        }
    });

    // Memasukkan total nilai ke dalam input dengan ID "skorgeri"
    document.getElementById('skorgeri').value = totalScore;
}

// Menambahkan event listener untuk setiap elemen radio
radioElements.forEach(function (radio) {
    radio.addEventListener('change', updateTotalScore);
});

// Memanggil fungsi updateTotalScore untuk menginisialisasi nilai awal
updateTotalScore();


</script>

<script>
    document.getElementById("labelskorgeri").addEventListener("click", function() {
        // Setel nilai semua radio button menjadi 0
        document.getElementById("geriasupan1").checked = false;
        document.getElementById("geriasupan2").checked = false;
        document.getElementById("geriasupan3").checked = false;

        document.getElementById("geribb1").checked = false;
        document.getElementById("geribb2").checked = false;
        document.getElementById("geribb3").checked = false;
        document.getElementById("geribb4").checked = false;

        document.getElementById("gerimobilitas1").checked = false;
        document.getElementById("gerimobilitas2").checked = false;
        document.getElementById("gerimobilitas3").checked = false;

        document.getElementById("geritekanan1").checked = false;
        document.getElementById("geritekanan2").checked = false;

        document.getElementById("gerigangguan1").checked = false;
        document.getElementById("gerigangguan2").checked = false;
        document.getElementById("gerigangguan3").checked = false;

        document.getElementById("geriindeks1").checked = false;
        document.getElementById("geriindeks2").checked = false;
        document.getElementById("geriindeks3").checked = false;
        document.getElementById("geriindeks4").checked = false;
        document.getElementById("geriindeks5").checked = false;
        document.getElementById("geriindeks6").checked = false;
        document.getElementById("skorgeri").value = "";

    });
</script>

<script>
    // Function to calculate and update the total score
    function updateTotalScore() {
        // Define the scores for each radio button
        var scores = {
            'anakusia': {'4': 4, '3': 3, '2': 2, '1': 1},
            'kelamin': {'2': 2, '1': 1},
            'diagnosis': {'4': 4, '3': 3, '2': 2, '1': 1},
            'gangguan': {'3': 3, '2': 2, '1': 1},
            'lingkungan': {'4': 4, '3': 3, '2': 2, '1': 1},
            'respon': {'3': 3, '2': 2, '1': 1},
            'penggunaanobat': {'3': 3, '2': 2, '1': 1}
        };

        // Calculate the total score
        var totalScore = 0;
        for (var group in scores) {
            var selectedValue = document.querySelector('input[name="' + group + '"]:checked');
            if (selectedValue) {
                totalScore += scores[group][selectedValue.value];
            }
        }

        // Update the input field with the total score
		// if ( totalScore != 0 || totalScore != '') {
        document.getElementById('skorjatuhanak').value = totalScore;
		// }
    }

    // Attach the updateTotalScore function to the change event of radio buttons
    var radioGroups = ['anakusia', 'kelamin', 'diagnosis', 'gangguan', 'lingkungan', 'respon', 'penggunaanobat'];
    radioGroups.forEach(function(group) {
        var radioButtons = document.getElementsByName(group);
        radioButtons.forEach(function(radio) {
            radio.addEventListener('change', updateTotalScore);
        });
    });
</script>
