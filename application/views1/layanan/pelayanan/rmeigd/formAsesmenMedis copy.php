<link rel="stylesheet" href="../../assets/template_baru/dist/vendors/icheck/skins/all.css">
<div class="card">
	<div class="col-12 mt-4 ml-3">
		<!-- <span style="font-size: 16px; font-weight: bold; color: navy;">TRIASE</span> -->
		<div class="w-sm-100 mr-auto"><h6 class="mb-0" style="color: navy;">FORM ASESMEN AWAL MEDIS</h6></div>

	</div>
	<div class="col-12 mt-2 ml-3">
						<!-- ================== asesmen awal medis ====================== -->
						<div class="tab-pane fade show" id="tabasesmenawalmedis" role="tabpanel" >		
							<nav>
								<!-- <div id="tab-group-1" class="nav nav-tabs" id="subnav1" role="tablist">
									<a class="nav-item nav-link active" id="subtabkondisiawal" data-toggle="tab" href="#kondisiawal" role="tab" aria-controls="subnav1-1" aria-selected="true" style="border: 2px solid #ccc; background-color: #fff; color: #000;">Kondisi Awal</a>
									<a class="nav-item nav-link" id="subtabpemeriksaan" data-toggle="tab" href="#pemeriksaan" role="tab" aria-controls="subnav1-2" aria-selected="false" style="border: 2px solid #ccc; background-color: #fff; color: #000;">Pemeriksaan</a>
									<a class="nav-item nav-link" id="subtabnyeri" data-toggle="tab" href="#nyeri" role="tab" aria-controls="subnav1-2" aria-selected="false" style="border: 2px solid #ccc; background-color: #fff; color: #000;">Nyeri | Penunjang | Diagnosa kerja</a>
									<a class="nav-item nav-link" id="subtabkesimpulan" data-toggle="tab" href="#kesimpulan" role="tab" aria-controls="subnav1-2" aria-selected="false" style="border: 2px solid #ccc; background-color: #fff; color: #000;">Kesimpulan</a>
									<a class="nav-item nav-link" id="subtabedukasi" data-toggle="tab" href="#edukasi" role="tab" aria-controls="subnav1-2" aria-selected="false" style="border: 2px solid #ccc; background-color: #fff; color: #000;">Edukasi dan Kondisi Pulang</a>
								</div> -->

								<div id="tab-group-1" class="nav nav-tabs" id="subnav1" role="tablist">
									<a class="nav-item nav-link active" id="subtabkondisiawal" data-toggle="tab" href="#kondisiawal" role="tab" aria-controls="subnav1-1" aria-selected="true" style="color: #843905;">Kondisi Awal</a>

									<a class="nav-item nav-link" id="subtabpemeriksaan" data-toggle="tab" href="#pemeriksaan" role="tab" aria-controls="subnav1-2" aria-selected="false" style="color: #5C8405;">Pemeriksaan</a>

									<a class="nav-item nav-link" id="subtabnyeri" data-toggle="tab" href="#nyeri" role="tab" aria-controls="subnav1-2" aria-selected="false" style="color: #083DA9;">Nyeri | Penunjang | Diagnosa kerja</a>

									<a class="nav-item nav-link" id="subtabkesimpulan" data-toggle="tab" href="#kesimpulan" role="tab" aria-controls="subnav1-2" aria-selected="false" style="color: #083DA9;">Kesimpulan</a>
									<a class="nav-item nav-link" id="subtabedukasi" data-toggle="tab" href="#edukasi" role="tab" aria-controls="subnav1-2" aria-selected="false" style="color: #E2074A;">Edukasi dan Kondisi Pulang</a>
								</div>
								
								<div class="tab-content" id="subnav1-content">
									<div class="tab-pane fade  show active" id="kondisiawal" role="tabpanel" aria-labelledby="subtabkondisiawal">
										<!-- <div class="tab-pane fade show active" id="tabkondisiAwal" role="tabpanel2" >		 -->
											<div class="card">
												<div class="card-body">
													<div class="col-md-12">
														<div class="form-group row col-spacing-row">
															<label class="col-md-1 col-form-label">Cara Masuk</label>
															<div class="col-md-11">
																<input class="state icheckbox_square-red" type="checkbox" id="datangSendiri" <?php echo ($dtassawal->datangsendiri == 1) ? "checked" : ""; ?> name="caraMasuk"> Datang Sendiri
																<input class="state icheckbox_square-red ml-3" type="checkbox" id="rujukandari" <?php echo ($dtassawal->rujukan == 1) ? "checked" : ""; ?> name="caraMasuk" class="form-check-input"> Rujukan Dari 
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
																	<input class="state icheckbox_square-red" type="checkbox" id="alergitidak" <?php echo ($dtassawal->alergitidak == 1) ? "checked" : ""; ?> name="caraMasuk"> Tidak
																	<input class="state icheckbox_square-red ml-3" type="checkbox" id="alergiya" <?php echo ($dtassawal->alergiya == 1) ? "checked" : ""; ?> name="caraMasuk" > Ya
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
										<!-- </div> -->
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
														<div class="col-md-7">
															<!-- ========= -->
															<div class="form-group row col-spacing-row mt-3">
																<div class="col-md-12">
																	<div class="form-group row col-spacing-row">
																		<label class="col-md-2 col-form-label">Status Generalis</label>
																		<div class="col-md-12">
																			<div class="form-check form-check-inline">
																				<textarea id="generalis" name="generalis" rows="7" style="width: 900px;"><?php echo $dtassawal->generalis ?></textarea>

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
																				<textarea id="lokalis" name="lokalis" rows="7" style="width: 900px;"><?php echo $dtassawal->lokalis ?></textarea>

																			</div>
																		</div>
																	</div>
																</div>
															</div>

														<!-- ======== -->
														</div>
														<div class="col-md-3">
															<img src="../../assets/image/rm/bodyfull.jpeg" alt="Gambar" style="max-width: 100%;">
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
														<label class="col-md-1" style="font-size: 13px;">Nyeri</label>
														<div class="col-md-11">
																<input class="state icheckbox_square-red" type="checkbox" id="nyeritidak" name="nyerirasa" class="form-check-input" <?php echo ($dtassawal->nyeritidak == 1) ? "checked" : ""; ?> onchange="checkNyeri(this)">
																<span style="font-size: 13px;"> Tidak</span>
																
																<input class="state icheckbox_square-red ml-3" type="checkbox" id="nyeriya" name="nyerirasa" class="form-check-input" <?php echo ($dtassawal->nyeriiya == 1) ? "checked" : ""; ?>  onchange="checkNyeri(this)">
																<span style="font-size: 13px;"> Ya</span>
														</div>
													</div>
													<div class="form-group row col-spacing-row"> 
														<label class="col-md-1" style="font-size: 13px;">Sifat</label>
														<div class="col-md-11">
																<input class="state icheckbox_square-red" type="checkbox" id="akut" name="sifat" class="form-check-input" <?php echo ($dtassawal->akut == 1) ? "checked" : ""; ?> onchange="checkSifat(this)"> Akut
																<input class="state icheckbox_square-red ml-3" type="checkbox" id="kronis" name="sifat" class="form-check-input" <?php echo ($dtassawal->kronis == 1) ? "checked" : ""; ?> onchange="checkSifat(this)"> Kronis
														</div>
													</div>
													<div class="form-group row col-spacing-row">
														<div class="col-md-1">
														</div>
														<div class="col-md-11">
															<img src="../../assets/image/rm/nyeri.png" alt="Gambar Nyeri" style="max-width: 100%;">
														</div>
													</div>
													<br>
													<div class="form-group row col-spacing-row mb-1">
														<label class="col-md-1" style="font-size: 13px;">Kualitas Nyeri</label>
														<div class="col-md-11">
															<input class="state icheckbox_square-red" type="checkbox" id="nyeritumpul" name="kualitasnyeri" class="form-check-input" <?php echo ($dtassawal->nyeritumpul == 1) ? "checked" : ""; ?>  onchange="kualitasnyeri(this)"> Nyeri Tumpul
															<input class="state icheckbox_square-red ml-3" type="checkbox" id="nyeritajam" name="kualitasnyeri" class="form-check-input" <?php echo ($dtassawal->nyeritajam == 1) ? "checked" : ""; ?>  onchange="kualitasnyeri(this)"> Nyeri Tajam
															<input class="state icheckbox_square-red ml-3" type="checkbox" id="panasterbakar" name="kualitasnyeri" class="form-check-input" <?php echo ($dtassawal->panasterbakar == 1) ? "checked" : ""; ?>  onchange="kualitasnyeri(this)"> Panas / Terbakar
														</div>

													</div>
													<div class="form-group row col-spacing-row">
														<label class="col-md-1 mt-1" style="font-size: 13px;">Menjalar</label>
														<div class="col-md-11">
															<input class="state icheckbox_square-red" type="checkbox" id="menjalartidak" name="menjalar" class="form-check-input"  <?php echo ($dtassawal->menjalartidak == 1) ? "checked" : ""; ?>   onchange="Menjalar(this)"> Tidak
															<input class="state icheckbox_square-red ml-3" type="checkbox" id="menjalarya" name="menjalar" class="form-check-input"  <?php echo ($dtassawal->menjalarya == 1) ? "checked" : ""; ?>   onchange="Menjalar(this)"> Ya, ke
															<div class="form-check form-check-inline ml-3">
																<input type="text" class="form-control col-form-label" id="menjalarke" style="width: 250px; border: 1px solid" disabled>
															</div>
														</div>
													</div> 
													<div class="form-group row col-spacing-row mt-2">
														<label class="col-md-1 col-form-label">Skor Nyeri</label>
														<div class="col-md-11">
															<input type="text" class="form-control col-form-label" id="skor" style="width: 100px; border: 1px solid;" value="<?php echo $dtassawal->skor ?>"> 

														</div>
													</div>
													<div class="form-group row col-spacing-row mt-3">
														<label class="col-md-1">Frekuensi</label>
														<div class="col-md-11">
																<input class="state icheckbox_square-red" type="checkbox" id="jarang" name="frekuensi" class="form-check-input"  <?php echo ($dtassawal->jarang == 1) ? "checked" : ""; ?> onchange="Frekuensi(this)"> Jarang
																<input class="state icheckbox_square-red ml-3" type="checkbox" id="hilangtimbul" name="frekuensi" class="form-check-input"  <?php echo ($dtassawal->hilangtimbul == 1) ? "checked" : ""; ?> onchange="Frekuensi(this)"> Hilang Timbul
																<input class="state icheckbox_square-red ml-3" type="checkbox" id="terusmenerus" name="frekuensi" class="form-check-input"  <?php echo ($dtassawal->terusmenerus == 1) ? "checked" : ""; ?> onchange="Frekuensi(this)"> Terus Menerus
														</div>
													</div>
													<div class="form-group row col-spacing-row mt-3">
														<label class="col-md-1">Mempengaruhi</label>
														<div class="col-md-11">
																<input class="state icheckbox_square-red" type="checkbox" id="tidur" name="kondisi" class="form-check-input" <?php echo ($dtassawal->tidur == 1) ? "checked" : ""; ?>> Tidur
																<input class="state icheckbox_square-red ml-3" type="checkbox" id="aktif" name="kondisi" class="form-check-input"> <?php echo ($dtassawal->aktiffisik == 1) ? "checked" : ""; ?> Aktifitas Fisik
																<input class="state icheckbox_square-red ml-3" type="checkbox" id="konsentrasi" name="kondisi" class="form-check-input" <?php echo ($dtassawal->konsentrasi == 1) ? "checked" : ""; ?>> Konsentrasi
																<input class="state icheckbox_square-red ml-3" type="checkbox" id="nafsumakan" name="kondisi" class="form-check-input" <?php echo ($dtassawal->nafsumakan == 1) ? "checked" : ""; ?>> Nafsu Makan
														</div>
													</div>
													<div class="form-group row col-spacing-row mt-3">
														<label class="col-md-5 col-form-label" style="font-weight: bold; font-size: 14px; color: #0D0687;">SKALA FLCC untuk Anak < 6 Tahun</label>
													</div>
													<div class="form-group row col-spacing-row">
														<div class="col-md-12">
															<table border="1" style="width: 80%;">
																<tr style="background-color: #ccc;">
																	<th style="width: 15%; text-align: center;" height="30px" >Pengkajian</th>
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
																	<td><input type="text" id="wajah" name="wajah" value="<?php echo $dtassawal->wajah ?>"></td>
																</tr>
																<tr>
																	<td>Kaki</td>
																	<td>Gerakan Normal Relaksasi</td>
																	<td>Tidak Tenang/tegang</td>
																	<td>Kaki dibuat menendang / menarik diri</td>
																	<td><input type="text" id="kaki" name="kaki" value="<?php echo $dtassawal->kaki ?>"></td>
																<tr>
																	<td>Aktif</td>
																	<td>Tidur, posisi normal, mudah bergerak</td>
																	<td>Gerakan menggeliat, berguling, kaku</td>
																	<td>Melengkunggkan punggu / kaku / menghentak</td>
																	<td><input type="text" id="aktifitas" name="aktifitas" value="<?php echo $dtassawal->aktifitas ?>"></td>
																	
																</tr>
																<tr>
																	<td>Menangis</td>
																	<td>Tidak menangis (bangun / Tidur)</td>
																	<td>Mengerang / Merengek</td>
																	<td>Menangis Terus, terisak, menjerit</td>
																	<td><input type="text" id="menangis" name="menangis" value="<?php echo $dtassawal->menangis ?>"></td>
																</tr>
																<tr>
																	<td>Bersuara</td>
																	<td>Bersuara Normal, tenang</td>
																	<td>Tenang bila dipeluk, digending, atau diajak bicara</td>
																	<td>Sulit untuk ditenangkan</td>
																	<td><input type="text" id="bersuara" name="bersuara" value="<?php echo $dtassawal->bersuara ?>"></td>
																</tr>
															</table>
															<br>
														</div>
													</div>
													<div class="form-group row col-spacing-row">
														<label class="col-md-10 col-form-label">Hasil Skrining</label>
													</div>
													<div class="form-group row col-spacing-row">
														<label class="col-md-2 col-form-label text-right">(P) Faktor Pencetus</label>
														<div class="col-md-6">
															<input type="text" class="form-control col-form-label" style="border: 1px solid;" name="pencetus" id="pencetus" value="<?php echo $dtassawal->pencetus ?>">
														</div>
													</div>
													<div class="form-group row col-spacing-row">
														<label class="col-md-2 col-form-label text-right">(Q) Faktor Kualitas</label>
														<div class="col-md-6">
															<input type="text" class="form-control col-form-label" style="border: 1px solid;" name="kualitas" id="kualitas" value="<?php echo $dtassawal->kualitasskrining ?>">
														</div>
													</div>
													<div class="form-group row col-spacing-row">
														<label class="col-md-2 col-form-label text-right">(R) Lokasi</label>
														<div class="col-md-6">
															<input type="text" class="form-control col-form-label" style="border: 1px solid;" name="lokasi" id="lokasi" value="<?php echo $dtassawal->lokasi ?>">
														</div>
													</div>
													<div class="form-group row col-spacing-row">
														<label class="col-md-2 col-form-label text-right">(S) Skala Nyeri</label>
														<div class="col-md-6">
															<input type="text" class="form-control col-form-label" style="border: 1px solid;" name="skalanyeri" id="skalanyeri" value="<?php echo $dtassawal->skalanyeri ?>">
														</div>
													</div>
													<div class="form-group row col-spacing-row">
														<label class="col-md-2 col-form-label text-right">(T) Lama Nyeri</label>
														<div class="col-md-6">
															<input type="text" class="form-control col-form-label" style="border: 1px solid;" name="lamanyeri" id="lamanyeri" value="<?php echo $dtassawal->lamanyeri ?>">
														</div>
													</div>
													<div class="form-group row col-spacing-row mt-3">
														<label class="col-md-10 col-form-label">PEMERIKSAAN PENUNJANG</label>
													</div>
													<div class="form-group row col-spacing-row">
														<div class="col-md-10">
															<input class="state icheckbox_square-red" type="checkbox" id="laboratorium" name="pemeriksaan" class="form-check-input" <?php echo ($dtassawal->lab == 1) ? "checked" : ""; ?>> Laboratorium
															<input class="state icheckbox_square-red ml-3" type="checkbox" id="radiologi" name="pemeriksaan" class="form-check-input" <?php echo ($dtassawal->rad == 1) ? "checked" : ""; ?>> Radiologi
															<input class="state icheckbox_square-red  ml-3" type="checkbox" id="ekg" name="pemeriksaan" class="form-check-input" <?php echo ($dtassawal->ekg == 1) ? "checked" : ""; ?>> EKG
															<div class="form-check form-check-inline ml-3">
																<label class="col-form-label">Penunjang Lainnya </label>
																<input type="text" class="form-control col-form-label  ml-3" id="penunjanglain" name="penunjanglain" style="width: 250px; border: 1px solid" value="<?php echo $dtassawal->laintext ?>">
															</div>
														</div>
													</div>
													<div class="form-group row col-spacing-row mt-3">
														<label class="col-md-1" >Diagnosa Kerja</label>
														<div class="col-md-11">
															<div class="form-check form-check-inline">
																<textarea id="diagnosakerja" name="diagnosakerja" rows="3" style="width: 1000px;"><?php echo $dtassawal->diagnosakerja ?>"</textarea>
															</div>
														</div>
													</div>
													


												</div>
											</div>
											<div class="col-md-12 mb-5">
												<div class="col-6 text-left">
													<button onclick="savenyeri()" class="btn btn-primary" data-bs-dismiss="modal">Simpan</button>
												</div>
												<div class="col-6">
													<!-- <button onclick="Batal()" class="btn btn-danger">Batal Save</button> -->
												</div>>
											</div>
										</div>
									</div>
									<div class="tab-pane fade" id="kesimpulan" role="tabpanel" aria-labelledby="subtabkesimpulan">
										<div class="card">
											<div class="card-body">
												<div class="col-md-12">
													<div class="form-group row col-spacing-row">
														<div class="col-md-11">
															<input class="state icheckbox_square-red" type="checkbox" id="dirawat" name="caraMasuk" class="form-check-input" onchange="ToggleDirawat(this)" <?php echo ($dtassawal->dirawat == 1) ? "checked" : ""; ?>> Dirawat
															<div class="form-check form-check-inline">
																<label class="col-md-5">Konsul Spesialis</label>
																<input type="text" class="form-control col-form-label" name="konsul" id="konsul" style="width: 250px; border: 1px solid;" value="<?php echo $dtassawal->dirawatkonsul; ?>" disabled>
															</div>
														</div>
													</div>
													<div class="form-group row col-spacing-row">
														<div class="col-md-11">
															<input class="state icheckbox_square-red" type="checkbox" id="pulang" name="caraKeluar" class="form-check-input" onchange="TogglePulang(this)" <?php echo ($dtassawal->pulang == 1) ? "checked" : ""; ?>> Pulang
															<input class="state icheckbox_square-red ml-3" type="checkbox" id="izinDokter" name="caraKeluar" class="form-check-input" <?php echo ($dtassawal->izindokter == 1) ? "checked" : ""; ?> disabled > Izin Dokter
															<input class="state icheckbox_square-red ml-3" type="checkbox" id="permintaanSendiri" name="caraKeluar" class="form-check-input" <?php echo ($dtassawal->permintaansendiri == 1) ? "checked" : ""; ?> disabled> Permintaan Sendiri
														</div>
													</div>
													<div class="form-group row col-spacing-row">
														<label class="col-md-2 col-form-label">Terapi Pulang</label>
														<div class="col-md-12">
															<div class="form-check form-check-inline">
																<textarea id="terapipulang" name="terapipulang" rows="7" style="width: 1200px;"><?php echo $dtassawal->terapipulang ?></textarea>
															</div>
														</div>
													</div>
													<div class="form-group row col-spacing-row">
														<label class="col-md-6 col-form-label">Kontrol ke Poli / Puskesmas</label>
														<div class="col-md-12">
															<div class="form-check form-check-inline">
																<textarea id="kontrolpoli" name="kontrolpoli" rows="3" style="width: 1200px;"><?php echo $dtassawal->kontrolpoli ?></textarea>
															</div>
														</div>
													</div>
													<div class="form-group row col-spacing-row">
														<label class="col-md-6 col-form-label">Tujuan RS Rujuk dan alasan di rujuk</label>
														<div class="col-md-12">
															<div class="form-check form-check-inline">
																<textarea id="rujuk" name="rujuk" rows="3" style="width: 1200px;"><?php echo $dtassawal->rujuk ?></textarea>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="col-md-12 mb-4">
												<div class="col-6 text-left">
													<button onclick="savekesimpulan()" class="btn btn-primary" data-bs-dismiss="modal">Simpan</button>
												</div>
												<div class="col-6">
													<!-- <button onclick="Batal()" class="btn btn-danger">Batal Save</button> -->
												</div>
											</div>
										</div>
									</div>
									<div class="tab-pane fade" id="edukasi" role="tabpanel" aria-labelledby="subtabedukasi">
										<div class="card">
											<div class="card-body">
												<div class="col-md-12">
													<div class="form-group row col-spacing-row">
														<label class="col-md-2 col-form-label">Edukasi</label>
														<div class="col-md-12">
															<div class="form-check form-check-inline">
																<textarea id="edukasipulang" name="edukasipulang" rows="7" style="width: 1200px;"><?php echo $dtassawal->edukasi ?></textarea>
															</div>
														</div>
													</div> 
													
													<div class="form-group row col-spacing-row mt-3">
														<label class="col-md-8 col-form-label">Edukasi awal disampaikan tentang diagnosis, rencana dan terapi kepada</label>
														<div class="col-md-12">
															<div class="form-check form-check-inline">
																<div class="form-group row col-spacing-row">
																	<div class="col-md-12">
																		<input class="state icheckbox_square-red" type="checkbox" id="pasien" name="hubungan" class="form-check-input" <?php echo ($dtassawal->edukasipasien == 1) ? "checked" : ""; ?>> Pasien
																		<input class="state icheckbox_square-red ml-3" type="checkbox" id="keluarga" name="hubungan" class="form-check-input" <?php echo ($dtassawal->edukasikeluarga == 1) ? "checked" : ""; ?>> Keluarga
																		<input class="state icheckbox_square-red ml-3" type="checkbox" id="tidak" name="hubungan" class="form-check-input"> Tidak
																		<div class="form-check form-check-inline" <?php echo ($dtassawal->edukasitidak == 1) ? "checked" : ""; ?>>
																			<input type="text" class="form-control col-form-label ml-3" name="edukasitidakkarena" id="edukasitidakkarena" style="width: 900px; border: 1px solid;" value="<?php echo $dtassawal->edukasitidakkarena ?>">
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="form-group row col-spacing-row">
														<label class="col-md-8 col-form-label">KONDISI SAAT PULANG
														<div class="col-md-12 mt-2">
															<div class="form-check form-check-inline">
																<div class="form-group row col-spacing-row">
																	<div class="col-md-12">
																		<input class="state icheckbox_square-red" type="checkbox" id="membaik" name="kondisi" class="form-check-input" <?php echo ($dtassawal->membaik == 1) ? "checked" : ""; ?>> Membaik
																		<input class="state icheckbox_square-red ml-3" type="checkbox" id="memburuk" name="kondisi" class="form-check-input" <?php echo ($dtassawal->memburuk == 1) ? "checked" : ""; ?>> Memburuk
																		<input class="state icheckbox_square-red ml-3" type="checkbox" id="tetapmasihsakit" name="kondisi" class="form-check-input" <?php echo ($dtassawal->tetap == 1) ? "checked" : ""; ?>> Tetap / Masih Sakit
																		<input class="state icheckbox_square-red ml-3" type="checkbox" id="meninggal" name="kondisi" class="form-check-input"> <?php echo ($dtassawal->meninggal == 1) ? "checked" : ""; ?> Meninggal
																		<div class="form-check form-check-inline ml-3">
																			<input type="time" id="jammeninggal" name="jammeninggal" class="form-control" style="width: 400; border: 1px solid;" placeholder="Jam Meninggal" value="<?php echo $dtassawal->jammeninggal ?>" disabled>
																		</div>
																		<input class="state icheckbox_square-red ml-3" type="checkbox" id="doa" name="kondisi" class="form-check-input" <?php echo ($dtassawal->doa == 1) ? "checked" : ""; ?>> DOA
																	</div>
																</div>
															</div>
															<div class="form-group row col-spacing-row">
																<label class="col-form-label">Tanda Vital</label>
																<div class="form-inline col-md-12">
																	<label class="col-form-label">Tekanan Darah</label>
																	<input type="text" class="form-control col-form-label ml-3" style="width: 200; border: 1px solid;" id="pulangtd" value="<?php echo $dtassawal->pulangtd ?>">
																	<label class="col-form-label ml-3">Nadi</label>
																	<input type="text" class="form-control col-form-label ml-3" id="pulangnadi" style="width: 200; border: 1px solid;" value="<?php echo $dtassawal->pulangnadi ?>">
																</div>	
																<div class="form-inline col-md-12 mt-3">
																	<label class="col-form-label ml-3">RR</label>
																	<input type="text" class="form-control col-form-label ml-3" id="pulangrr"  style="width: 200; border: 1px solid;" value="<?php echo $dtassawal->pulangrr ?>">
																	<label class="col-form-label ml-3">Suhu</label>
																	<input type="text" class="form-control col-form-label ml-3" id="pulangs"  style="width: 200; border: 1px solid;" value="<?php echo $dtassawal->pulangs ?>">
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="col-md-12 mb-5">
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
						<!-- =========== -->
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
				url: "<?php echo site_url(); ?>/rme/saveawal",
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
				url: "<?php echo site_url(); ?>/rme/savepemeriksaan",
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

	function savenyeri() {
			var no_rm = document.getElementById("no_rm").value;
			var kode_dokter = document.getElementById("kode_dokter").value;
			var notransaksi = document.getElementById("notransaksi").value;

			var nyeritidak = $("#nyeritidak").prop("checked") ? 1 : 0;
			var nyeriiya = $("#nyeriiya").prop("checked") ? 1 : 0;
			var akut = $("#akut").prop("checked") ? 1 : 0;
			var kronis = $("#kronis").prop("checked") ? 1 : 0;
			var nyeritumpul = $("#nyeritumpul").prop("checked") ? 1 : 0;
			var nyeritajam = $("#nyeritajam").prop("checked") ? 1 : 0;
			var panasterbakar = $("#panasterbakar").prop("checked") ? 1 : 0;
			var menjalartidak = $("#menjalartidak").prop("checked") ? 1 : 0;
			var menjalarya = $("#menjalarya").prop("checked") ? 1 : 0;
			var menjalarke = document.getElementById("menjalarke").value;
			var skor = document.getElementById("skor").value;
			var jarang = $("#jarang").prop("checked") ? 1 : 0;
			var hilangtimbul = $("#hilangtimbul").prop("checked") ? 1 : 0;
			var terusmenerus = $("#terusmenerus").prop("checked") ? 1 : 0;
			var tidur = $("#tidur").prop("checked") ? 1 : 0;
			var aktif = $("#aktif").prop("checked") ? 1 : 0;
			var konsentrasi = $("#konsentrasi").prop("checked") ? 1 : 0;
			var nafsumakan = $("#nafsumakan").prop("checked") ? 1 : 0;

			var wajah = document.getElementById("wajah").value;
			var kaki = document.getElementById("kaki").value;
			var aktifitas = document.getElementById("aktifitas").value;
			var menangis = document.getElementById("menangis").value;
			var bersuara = document.getElementById("bersuara").value;
			
			var pencetus = document.getElementById("pencetus").value;
			var kualitas = document.getElementById("kualitas").value;
			var lokasi = document.getElementById("lokasi").value;
			var skalanyeri = document.getElementById("skalanyeri").value;
			var lamanyeri = document.getElementById("lamanyeri").value;

			var laboratorium = $("#laboratorium").prop("checked") ? 1 : 0;
			var radiologi = $("#radiologi").prop("checked") ? 1 : 0;
			var ekg = $("#ekg").prop("checked") ? 1 : 0;
			var penunjanglain = document.getElementById("penunjanglain").value;
			var diagnosakerja = document.getElementById("diagnosakerja").value;
			$.ajax({
				url: "<?php echo site_url(); ?>/rme/savenyeri",
				type: "GET",
				data: {
					no_rm : no_rm,
					notransaksi : notransaksi,
					kode_dokter : kode_dokter,
					nyeritidak : nyeritidak,
					nyeriiya: nyeriiya,
					akut: akut,
					kronis: kronis,
					nyeritumpul: nyeritumpul,
					nyeritajam: nyeritajam,
					panasterbakar : panasterbakar,
					menjalartidak : menjalartidak,
					menjalarya : menjalarya,
					menjalarke : menjalarke,
					skor : skor,
					jarang : jarang,
					hilangtimbul : hilangtimbul,
					terusmenerus : terusmenerus,
					tidur : tidur,
					aktif : aktif,
					konsentrasi : konsentrasi,
					nafsumakan : nafsumakan,
					wajah : wajah,
					kaki : kaki,
					aktifitas : aktifitas,
					menangis : menangis,
					bersuara : bersuara,
					pencetus : pencetus,
					kualitas : kualitas,
					lokasi : lokasi,
					skalanyeri : skalanyeri,
					lamanyeri : lamanyeri,
					laboratorium : laboratorium,
					radiologi : radiologi,
					ekg : ekg,
					penunjanglain : penunjanglain,
					diagnosakerja : diagnosakerja
				},
				success: function(ajaxData) {
					swal('Simpan Data Berhasil');
					},
				error: function(ajaxData) {
					swal('Simpan Data Gagal');
				}
			});
		}

		function savekesimpulan() {
			var no_rm = document.getElementById("no_rm").value;
			var kode_dokter = document.getElementById("kode_dokter").value;
			var notransaksi = document.getElementById("notransaksi").value;

			var dirawat = $("#dirawat").prop("checked") ? 1 : 0;
			var pulang = $("#pulang").prop("checked") ? 1 : 0;
			var izinDokter = $("#izinDokter").prop("checked") ? 1 : 0;
			
			var konsul = document.getElementById("konsul").value;
			var terapipulang = document.getElementById("terapipulang").value;
			var kontrolpoli = document.getElementById("kontrolpoli").value;
			var rujuk = document.getElementById("rujuk").value;

			$.ajax({
				url: "<?php echo site_url(); ?>/rme/savekesimpulan",
				type: "GET",
				data: {
					no_rm : no_rm,
					notransaksi : notransaksi,
					kode_dokter : kode_dokter,
					dirawat: dirawat,
					pulang: pulang,
					izinDokter: izinDokter,
					konsul: konsul,
					terapipulang: terapipulang,
					kontrolpoli : kontrolpoli,
					rujuk : rujuk
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
			var edukasi = document.getElementById("edukasipulang").value;
			var pasien = $("#pasien").prop("checked") ? 1 : 0;
			var keluarga = $("#keluarga").prop("checked") ? 1 : 0;
			var tidak = $("#tidak").prop("checked") ? 1 : 0;
			var edukasitidakkarena = document.getElementById("edukasitidakkarena").value;
			var membaik = $("#membaik").prop("checked") ? 1 : 0;
			var memburuk = $("#memburuk").prop("checked") ? 1 : 0;
			var tetapmasihsakit = $("#tetapmasihsakit").prop("checked") ? 1 : 0;
			var meninggal = $("#meninggal").prop("checked") ? 1 : 0;
			var jammeninggal = document.getElementById("jammeninggal").value;
			var pulangtd = document.getElementById("pulangtd").value;
			var pulangnadi = document.getElementById("pulangnadi").value;
			var pulangrr = document.getElementById("pulangrr").value;
			var pulangs = document.getElementById("pulangs").value;

			$.ajax({
				url: "<?php echo site_url(); ?>/rme/saveedukasi",
				type: "GET",
				data: {
					no_rm : no_rm,
					notransaksi : notransaksi,
					kode_dokter : kode_dokter,
					edukasi: edukasi,
					pasien: pasien,
					keluarga: keluarga,
					tidak: tidak,
					edukasitidakkarena: edukasitidakkarena,
					membaik: membaik,
					memburuk: memburuk,
					tetapmasihsakit: tetapmasihsakit,
					meninggal: meninggal,
					jammeninggal: jammeninggal,
					pulangtd : pulangtd,
					pulangnadi : pulangnadi,
					pulangrr : pulangrr,
					pulangs : pulangs
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
	const rujukanDariCheckbox = document.getElementById('rujukandari');
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

			if (this.id === 'meninggal') {
				jamMeninggalTextbox.disabled = !this.checked;
			} else {
				jamMeninggalTextbox.disabled = true;
			}
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


<script>
    document.addEventListener("DOMContentLoaded", function() {
        const tabKondisiAwal = document.querySelector("#subtabkondisiawal");
        tabKondisiAwal.addEventListener("click", function(event) {
            event.preventDefault();

            tabKondisiAwal.style.backgroundColor = "red"; // Latar belakang merah
            tabKondisiAwal.style.color = "white"; // Teks putih
        });
    });
</script>
