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
									<div class="form-group row col-spacing-row">
										<label class="col-md-2 col-form-label">Riwayat Kesehatan Saat Ini</label>
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
							</div> 
						</div> 
					</div> 
					<div class="tab-pane fade" id="imunisasi" role="tabpanel" aria-labelledby="subtabimunisasi">
						<div class="card">
							<div class="card-body">
								<!-- subtabimunisasi -->
								<div class="col-md-3">
									<input class="state icheckbox_square-red" type="checkbox" id="vulnus" name="vulnus"<?php echo ($dtaskepranap->bcg == 1) ? "checked" : ""; ?>> BCG
								</div> 
							</div> 
						</div> 
					</div> 

					<div class="tab-pane fade" id="persalinan" role="tabpanel" aria-labelledby="subtabpersalinan">
						<div class="card">
							<div class="card-body">
								subtabpersalinan
							</div> 
						</div> 
					</div> 

					<div class="tab-pane fade" id="persalinan" role="tabpanel" aria-labelledby="subtabpersalinan">
						<div class="card">
							<div class="card-body">
								subtabpersalinan
							</div> 
						</div> 
					</div> 

					<div class="tab-pane fade" id="fisik" role="tabpanel" aria-labelledby="subtabfisik">
						<div class="card">
							<div class="card-body">
								subtabfisik
							</div> 
						</div> 
					</div> 
					<div class="tab-pane fade" id="alergi" role="tabpanel" aria-labelledby="subtabalergi">
						<div class="card">
							<div class="card-body">
								subtabalergi
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

									