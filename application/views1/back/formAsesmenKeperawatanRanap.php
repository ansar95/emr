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
								<div class="col-md-12 mb-5">
									<div class="col-6 text-left">
										<button onclick="saveriwayat()" class="btn btn-primary save-button" data-bs-dismiss="modal" hidden>Simpan</button>
									</div>
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
								<div class="col-md-12 mb-5">
									<div class="col-6 text-left">
										<button onclick="saveimunisasi()" class="btn btn-primary save-button" data-bs-dismiss="modal" hidden>Simpan</button>
									</div>
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

									<div class="col-6 text-left">
										<button onclick="savepersalinan()" class="btn btn-primary save-button" data-bs-dismiss="modal" hidden>Simpan</button>
									</div>
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
										<div class="col-6 text-left">
											<button onclick="savefisikranap()" class="btn btn-primary save-button" data-bs-dismiss="modal" hidden>Simpan</button>
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
									<div class="col-6 text-left">
										<button onclick="savealergiranap()" class="btn btn-primary save-button" data-bs-dismiss="modal" hidden>Simpan</button>
									</div>
								</div>
							</div> 
						</div> 
					</div> 
					<div class="tab-pane fade" id="nyeri" role="tabpanel" aria-labelledby="subtabnyeri">
						<div class="card">
							<div class="card-body">
								subtabnyeri
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
//mengatur save tabnav======
$(document).ready(function() {
        $('a[data-toggle="tab"]').on('hide.bs.tab', function(e) {
            var tabId = $(e.target).attr('href'); // Dapatkan ID tab yang sedang ditinggalkan
            var saveButton = $(tabId).find('.save-button'); // Cari tombol 'Simpan' di tab yang ditinggalkan
			var editing = document.getElementById("editing").value;
			if (editing > 0) {
				if (saveButton.length > 0) {
					saveButton.click(); // Panggil fungsi klik pada tombol 'Simpan' jika ditemukan di tab yang ditinggalkan
				}
			}	
        });
    });

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

