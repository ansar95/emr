<!-- START: Card Data-->
<div class="container-fluid site-width">
	<!-- START: Breadcrumbs-->
	<div class="row ">
		<div class="col-12  align-self-center">
			<div class="sub-header mt-5 py-3 align-self-center d-sm-flex w-100 rounded">
				</ol>
			</div>
		</div>
	</div>
	<!-- END: Breadcrumbs-->
	<div class="row">
		<div class="col-3">
			<div class="card">
				<div class="card-header d-flex justify-content-between align-items-center" style="background-color: #b3e0ff;">
					<h4 class="mb-0">Pasien</h4>
				</div>
					<div class="card-body">
						<div class="row spacing-row">
							<div class="col-md-12">
								<div class="row form-group">
									<label class="col-sm-3 col-form-label">Tanggal</label>
									<div class="col-sm-5">
										<input type="text" class="form-control pull-right" id="tglp" name="tglp" required autocomplete='off' >
									</div>
								</div>
							</div>
						</div>
						<div class="row spacing-row">
							<div class="col-md-12">
								<div class="row form-group">
									<label class="col-sm-3 col-form-label">Unit</label>
									<div class="col-sm-9">
										<?php
										$id = $this->session->userdata("idx");
										if (ceksess("PIL", $id) == FALSE) {
											$units = json_decode(stripslashes($this->session->userdata("kodeunit")));
										?>
											<select class="form-control" style="width: 100%;" name="unit" id="unitselect">
												<?php
												foreach ($unit as $row) {
													foreach ($units as $r) {
														if ($row->kode_unit == $r) {
												?>
															<option value="<?php echo $row->kode_unit; ?>"><?php echo $row->nama_unit; ?></option>
												<?php
														}
													}
												}
												?>
											</select>
										<?php
										} else {
										?>
											<select class="form-control" style="width: 100%;" name="unit" id="unitselect">
												<!-- <option value="000">--Semua Unit--</option> -->
												<?php
												foreach ($unit as $row) {
												?>
													<option value="<?php echo $row->kode_unit; ?>"><?php echo $row->nama_unit; ?></option>
												<?php
												}
												?>
											</select>
										<?php
										}
										?>
									</div>
								</div>
							</div>
						</div>
						<div class="row spacing-row">
							<div class="col-md-12">
								<div class="row form-group">
									<label class="col-sm-3 col-form-label">Dokter</label>
									<div class="col-sm-9">
										<select class="form-control" name="dokter" id="dokter">
											<option value="">Semua</option>
										</select>
									</div>
								</div>
							</div>
						</div>
						<div class="row spacing-row mt-3">
							<div class="col-md-12">
								<div class="row form-group">
									<div class="col-sm-9">
										<button class='btn  btn-primary mt-auto' type='button' id="caridata" />Tampilkan</button>
									</div>
								</div>
							</div>
						</div>
						<div class="table-responsive table-scrollable-x">
							<table class="table table-bordered table-hover" id="barispasien" style="width:100%">
								<thead>
									<tr>
										<th width='15%'>No.RM</th>
										<th >Nama Pasien</th>
										<th width='15%'>Status</th>
										<th style="text-align:center" width='20%'>Proses</th>
										<th width='4%'></th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td colspan="100%" class="text-center">
											Tidak Ada Data
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
			</div>
			<!-- <div class="card mt-1">
					<div class="card-header d-flex justify-content-between align-items-center" style="background-color: #e0ebeb;">
						<h4 class="mb-0">History</h4>
					</div>
					<div class="card-body">
						<div class="table-responsive table-scrollable-x">
							<table class="table table-bordered table-striped" id="barishistory" style="width:100%">
								<thead>
									<tr>
										<th width='15%'>Tanggal</th>
										<th >Unit</th>
										<th style="text-align:center" width='10%'></th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td colspan="100%" class="text-center">
											Tidak Ada Data
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>	
			</div> -->
		</div>
		
		<div class="col-9">
			<div class="card">
				<div class="card-header d-flex justify-content-between align-items-center" style="background-color: #e6e6e6;">
					<h4 class="mb-0"><div id="rmpasien"><h4 class="mb-0"></h4></div></h4>
					<h4 class="mb-0">Pelayanan</h4>
				</div>	
				<div class="card-body">
					<div class="row spacing-row">
						<input type="text" class="form-control" name="irm" id="irm" hidden>
						<input type="text" class="form-control" name="inp" id="inp" hidden>
						<input type="text" class="form-control" name="notrans" id="notrans" hidden>
						<input type="text" class="form-control" name="tdgolongan" id="tdgolongan" hidden>
						<input type="text" class="form-control" name="tddokterkode" id="tddokterkode" hidden>
						<input type="text" class="form-control" name="tddokter" id="tddokter" hidden>
						<input type="text" class="form-control" name="tglperiksa" id="tglperiksa" hidden>
						<input type="text" class="form-control" name="idnya" id="idnya" hidden>
					</div>
					<div class="row spacing-row mb-3 mt-3">
						<div class="col-md-12 text-right">
							<button onclick="profilrekammedis();" class="btn btn-info">Profil Rekam Medis</button>
						</div>
					</div>
					<div class="row spacing-row mb-3 mt-3">
						<div class="col-md-12">
							<h6>SOAP</h6>
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
										<!-- <div class="col-md-1">
											<input type="text" class="form-control" disabled name="idnya" id="idnya" hidden>
										</div> -->
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

							<div class="row mt-3 mb-4">
								<div class="col-md-6 text-left">
									<button onclick="updatesoap();" class="btn btn-primary" id="tombolupdate">Update</button>
									<button onclick="simpansoap();" class="btn btn-warning" id="tombolsimpan">Simpan</button>
								</div>
							</div>
						</div>
					</div>

						<div id="accordion_soap">
							<div d="soap_his">
								<h6 class="mb-0">
									<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwosoap" aria-expanded="false" aria-controls="collapseTwosoap">
									History SOAP
									</button>
								</65>
							</div>
							<div id="collapseTwosoap" class="collapse" aria-labelledby="soap_his" data-parent="#accordion_soap">
								<div class="card-body">
									<!-- tabel soap -->
									
									<div class="table-responsive mt-2 table-hover table-scrollable" style="max-height: 200px;" id="tabelsoap">
										<table class="table" id="tabelsoaphistory">
											<thead class="position-relative z-0" >
												<tr>
													Tabel SOAP
												</tr>
												<tr>
													<th style="text-align:center" width='8%'></th>
													<th style="text-align:right" width="3%">No.</th>
													<th style="text-align:center" width='8%'>Tanggal</th>
													<th style="text-align:center" width="5%">Jam</th>
													<th style="text-align:left" width="15%">Unit</th>
													<th style="text-align:left" width="22%">Dokter</th>
													<th></th>
													<th style="text-align:center" width='8%'></th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td colspan="100%" class="text-center">
														Tidak Ada Data
													</td>
												</tr>
											</tbody>
										</table>
									</div>
								
									<!-- ====== rincian soap -->
									<div class="row spacing-row mb-3 mt-3">
										<div class="col-md-1">
										</div>
										<div class="col-md-11">
											<h6>Rincian History Soap</h6>
											<h6 class="mb-0"><div id="hrmpasien"><h6 class="mb-0"></h6></div></h6>

											<div class="row">
												<div class="col-md-12 mt-3">
													<div>
														<div class="form-group row col-spacing-row">
															<label class="col-md-1 col-form-label">Suhu(C)</label>
															<div class="col-md-2">
																<input type="text" class="form-control" disabled name="hsuhu" id="hsuhu" >
															</div>
															<label class="pl-0 col-md-1 col-form-label">Tinggi(Cm)</label>
															<div class="col-md-2">
																<input type="text" class="form-control" disabled name="htinggi" id="htinggi" >
															</div>
															<label class="col-md-1 col-form-label">Berat(Kg)</label>
															<div class="col-md-2">
																<input type="text" class="form-control" disabled name="hberat" id="hberat" >
															</div>
															<label class="col-md-1 col-form-label">Tensi</label>
															<div class="col-md-2">
																<input type="text" class="form-control" disabled name="htensi" id="htensi" >
															</div>
														</div>
														<div class="form-group row col-spacing-row">
															<label class="col-md-1 col-form-label">Nadi(/mnt)</label>
															<div class="col-md-2">
																<input type="text" class="form-control" disabled name="hnadi" id="hnadi" >
															</div>
															<label class="pl-0 col-md-1 col-form-label">Respirasi(mnt)</label>
															<div class="col-md-2">
																<input type="text" class="form-control" disabled name="hrespirasi" id="hrespirasi" >
															</div>
															<label class="col-md-1 col-form-label">SpO2(%)</label>
															<div class="col-md-2">
																<input type="text" class="form-control" disabled name="hspo2" id="hspo2" >
															</div>
															<label class="col-md-1 col-form-label">GCS(E,V,M)</label>
															<div class="col-md-2">
																<input type="text" class="form-control" disabled name="ghcs" id="hgcs" >
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
															<select class="form-control" disabled style="width: 100%;" name="hkesadaran" id="hkesadaran" > 
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
															<input type="text" class="form-control"  name="hkesadaranlainnya" id="hkesadaranlainnya" disabled>
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
															<textarea rows="3" name="hkeluhanutama" id="hkeluhanutama" class="form-control" disabled></textarea>
														</div>
														<div class="col-md-6">
															<textarea rows="3" name="hriwayatsekarang" id="hriwayatsekarang" class="form-control" disabled></textarea>
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
															<textarea rows="3" name="hriwayatdahulu" id="hriwayatdahulu" class="form-control" disabled></textarea>
														</div>
														<div class="col-md-6">
															<textarea rows="3" name="halergi" id="halergi" class="form-control" disabled></textarea>
														</div>
														<!-- <div class="col-md-1">
															<input type="text" class="form-control" disabled name="idnya" id="idnya" hidden>
														</div> -->
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
															<textarea rows="3" name="hobjektif" id="hobjektif" class="form-control" disabled></textarea>
														</div>
														<div class="col-md-6">
															<textarea rows="3" name="hassesment" id="hassesment" class="form-control" disabled></textarea>
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
															<textarea rows="3" name="hplan" id="hplan" class="form-control" disabled></textarea>
														</div>
														<div class="col-md-6">
															<textarea rows="3" name="hinstruksi" id="hinstruksi" class="form-control" disabled></textarea>
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
															<textarea rows="3" name="hevaluasi" id="hevaluasi" class="form-control" disabled></textarea>
														</div>
														<div class="col-md-6">
															<!-- <textarea rows="3" name="instruksi" id="instruksi" class="form-control" disabled></textarea> -->
														</div>
													</div>
												</div>
											</div>	
										</div>
									</div>
									<!-- ===== -->
								<!-- end of tabel soap -->
								</div>
							</div>
						</div>
					
					
					<!-- =================== -->
					<!-- =================== -->
					<!-- =================== -->
					<!-- =================== -->
					<!-- =================== -->
					<div id="accordion">
						<div class="card">
							<div class="card-header" id="headingTwo">
								<h6 class="mb-0">
									<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#tindakan" aria-expanded="true" aria-controls="collapseTwo">
									Konsultasi / Tindakan
									</button>
								</h6>
							</div>
							<div id="tindakan" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
								<div class="card-body">
									<div class="row spacing-row mb-3 mt-3">
										<div class="col-md-12">
											<div class="form-group row col-spacing-row">
												<div class="col-md-4">
													<select class="form-control" style="width: 100%;" type="text" name="tdtindakan" id="tdtindakan" onchange="tdtindakan()">
														<option value="">--pilih tindakan--</option>
															<?php
															foreach ($dttindakan as $row) {
															?>
																<option value="<?php echo $row->kode_tindakan; ?>"><?php echo $row->tindakan; ?></option>
															<?php
																}
															?>
													</select>
												</div>
												<label class="col-md-1 col-form-label">% Diskon</label>
												<div class="col-md-1">
													<input type="number" class="form-control" name="tddiskon" id="tddiskon" value="0">
												</div>
												<label class="col-md-1 col-form-label">Tgl/Jam</label>
												<div class="col-md-2">
													<input type="text" class="form-control" name="tdtgl" id="tdtgl">
												</div>
												<div class="col-md-2">
													<input type="time" id="tdwaktu" name="tdwaktu" class="form-control" id="time">
												</div>
												<div class="col-md-1 text-right">
													<button onclick="simpandatatindakan();" class="btn btn-primary">Simpan</button>
												</div>
											</div>
											<div class="col-md-7">
													<div class="form-group row col-spacing-row" hidden>
																	<label class="col-md-3 col-form-label">Pelaksana 1</label>
																	<div class="col-md-9">
																		<select class="form-control" style="width: 100%;" type="text" name="pel1" id="pel1">
																			<option value="">--pilih pelaksana--</option>
																			<?php
																			foreach ($dtperawat as $row) {
																			?>
																				<option value="<?php echo $row->kode_dokter; ?>"><?php echo $row->nama_dokter; ?></option>
																			<?php
																			}
																			?>
																		</select>
																	</div>
													</div>
													<div class="form-group row col-spacing-row" hidden>
																	<label class="col-md-3 col-form-label">Pelaksana 2</label>
																	<div class="col-md-9">
																		<select class="form-control" style="width: 100%;" type="text" name="pel2" id="pel2">
																			<option value="">--pilih pelaksana--</option>
																			<?php
																			foreach ($dtperawat as $row) {
																			?>
																				<option value="<?php echo $row->kode_dokter; ?>"><?php echo $row->nama_dokter; ?></option>
																			<?php
																			}
																			?>
																		</select>
																	</div>
																</div>
												</div>
													<div class="col-md-7">
																<div class="form-group row col-spacing-row" hidden>
																	<label class="col-md-3 col-form-label">Tarip</label>
																	<div class="col-md-9">
																		<input type="text" class="form-control" id="jasa" name="jasa" disabled>
																	</div>
																</div>
																<div class="form-group row col-spacing-row" hidden>
																	<label class="col-md-3 col-form-label">Jumlah</label>
																	<div class="col-md-4">
																		<input type="number" class="form-control" name="tdjml" id="tdjml" value="1">
																	</div>
																	<div class="col-md-5">
																		<div class="custom-control custom-checkbox custom-control-inline">
																			<input type="checkbox" class="custom-control-input" name="tdperawat" id="tdperawat">
																			<label class="custom-control-label" for="tdperawat">Dilakukan oleh perawat</label>
																		</div>
																	</div>
													</div>
													<div class="form-group row col-spacing-row" hidden>
														<div class="col-md-5">
															<div class="custom-control custom-checkbox custom-control-inline">
															<input type="checkbox" class="custom-control-input" name="tdumum" id="tdumum">
															<label class="custom-control-label" for="tdumum">Berlaku Umum</label>
														</div>
													</div>
												</div>
											</div>
										</div>	
										<div class="col-md-12">
											<div class="table-responsive">
												<table class="table table-hover" id="tabeltindakan">
													<thead>
														<tr>
															<th width="3%">No.</th>
															<th width='8%'>Tanggal</th>
															<th width="5%">Jam</th>
															<th>Tindakan</th>
															<th style="text-align:right" width="4%">%Disk</th>
															<th style="text-align:center" width='8%'>Proses</th>
														</tr>
													</thead>
													<tbody id="tabeltindakan"></tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="card">
							<div class="card-header" id="headingThree">
								<h6 class="mb-0">
									<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
									Pemeriksaan Instalasi Penunjang
									</button>
								</h6>
							</div>
							<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
								<div class="card-body">
									<div class="row spacing-row mb-3 mt-3">
										<div class="col-md-12">
											<div class="form-group row col-spacing-row">
												<div class="col-md-6">
													<div class="form-group row col-spacing-row">
														<label class="col-md-3 col-form-label">Tanggal</label>
														<div class="col-md-3">
															<input type="text" class="form-control" name="instgl" id="instgl">
														</div>
													</div>
													<div class="form-group row col-spacing-row">
														<label class="col-md-3 col-form-label">Instalasi Tujuan</label>
														<div class="col-md-9">
															<select class="form-control" style="width: 100%;" name="iunit" id="iunit">
																<?php
																	foreach ($dtkirimins as $row) {
																?>
																		<option value="<?php echo $row->kode_unit; ?>"><?php echo $row->nama_unit; ?></option>
																<?php
																	}
																?>
															</select>
														</div>
													</div>
												</div>
												<div class="col-md-5">
													<div class="form-group row col-spacing-row">
														<label class="col-md-3 col-form-label">Catatan Pemeriksaan</label>
														<div class="col-md-9">
															<textarea rows="3" name="icatatan" id="icatatan" class="form-control"></textarea>
														</div>
													</div>
												</div>
												<div class="col-md-1">
													<button onclick="kirimisntalasi()" class="btn btn-info">Kirim</button>
												</div>
												
											</div>
											
											<h7 class="mb-4 text-danger">Daftar Pesanan</h7>
											<div class="table-responsive">
												<table class="table table-bordered table-hover" id="tabelinst">
													<thead>
														<tr>
															<th width='5%'>Isi</th>
															<th width='7%'>Tgl. Periksa</th>
															<th>Nama Unit</th>
															<th width="15%">Dokter Pengirim</th>
															<th width="15%">Dokter Pemeriksa</th>
															<th width="15%">Unit Rujuk</th>
															<th width="8%">Trx Instalasi</th>
															<th width="17%">Catatan</th>
														</tr>
													</thead>
													<tbody id="hisrujuk">
													</tbody>
												</table>
											</div>
											<div class="modal" id="myModal2" data-backdrop="static">
											</div>
										</div>
									</div>
								</div>
	<!-- --------------- -->
								<div class="row spacing-row mb-3 mt-2">				
									<div class="col-md-12">
										<div class="col-md-2">
										</div>
										<div class="col-md-10">							
											<div id="accordion_lab">
												<div d="lab_his">
													<h6 class="mb-0">
														<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwolab" aria-expanded="true" aria-controls="collapseTwolab">
														History Laboratorium
														</button>
													</65>
												</div>
												<div id="collapseTwolab" class="collapse" aria-labelledby="lab_his" data-parent="#accordion_lab">
													<div class="card-body">
														<!-- tabel history lab  -->
														<div class="table-responsive">
															<table class="table table-bordered table-hover" id="tabelinstlab">
																<thead>
																	<tr>
																		<th width='10%'>Hasil</th>
																		<th width='10%'>Tgl. Periksa</th>
																		<th>Dokter Pengirim</th>
																		<th width="20%">Unit Pengirim</th>
																		<th width="10%">Trx Instalasi</th>
																	</tr>
																</thead>
																<tbody id="hisrujuklab">
																</tbody>
															</table>
														</div>
													
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="row spacing-row mb-3 mt-2">				
									<div class="col-md-12">
										<div class="col-md-2">
										</div>
										<div class="col-md-10">							
											<div id="accordion_rad">
												<div d="rad_his">
													<h6 class="mb-0">
														<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTworad" aria-expanded="true" aria-controls="collapseTworad">
														History Radiologi
														</button>
													</65>
												</div>
												<div id="collapseTworad" class="collapse" aria-labelledby="rad_his" data-parent="#accordion_rad">
													<div class="card-body">
														<!-- tabel history rad  -->
														<div class="table-responsive">
															<table class="table table-bordered table-hover" id="tabelinstrad">
																<thead>
																	<tr>
																		<th width='10%'>Hasil</th>
																		<th width='10%'>Tgl. Periksa</th>
																		<th>Pemeriksaan</th>
																		<th width="10%">Trx Instalasi</th>
																	</tr>
																</thead>
																<tbody id="hisrujukrad">
																</tbody>
															</table>
														</div>
													
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="card">
							<div class="card-header" id="headingTworesep">
							<h6 class="mb-0">
								<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTworesep" aria-expanded="false" aria-controls="collapseTworesep">
								Resep Apotik
								</button>
							</h6>
							</div>
							<div id="collapseTworesep" class="collapse" aria-labelledby="headingTworesep" data-parent="#accordion">
							<div class="card-body">
								<!-- ---resep--- -->
								<div class="row spacing-row">
									<div class="col-md-6">
									</div>
									<div class="col-md-6" hidden>
										<div class="form-group row justify-content-end">
											<label class="col-md-3 col-form-label">No.Resep :</label>
											<div class="col-md-6">
												<input type="text" class="form-control" id="norep" name="norep" disabled />
											</div>
										</div>
									</div>
								</div>

								<div class="table-responsive">
									<table class="table table-bordered table-hover" id="tabelobat">
										<thead>
											<tr>
												<th style="text-align:right" width="3%">No.</th>
												<th width='10%'>No.Resep</th>
												<th>Nama Obat</th>
												<th style="text-align:right" width="8%">Harga</th>
												<th style="text-align:right" width="4%">Qty</th>
												<th width="8%">Satuan</th>
												<th width="15%">Dosis/Racikan</th>
												<th width="22%">Catatan</th>
												<th style="text-align:center" width='5%'>Action</th>
											</tr>
										</thead>
										<tbody id="tabelobatxt">
										</tbody>
									</table>
								</div>
								<br>
								<div class="row" id="formobat">
									<div class="col-md-7">
										<div class="form-group row col-spacing-row">
											<label class="col-md-2 col-form-label">Obat/Bhp</label>
											<div class="col-md-10">
												<select class="form-control" style="width: 100%;" name="obatobat" id="obatobat" onchange="prosbhp1()">
													<option value="">--pilih obat--</option>
													<?php
													foreach ($dtobat as $row) {
													?>
														<option value="<?php echo $row->kodeobat; ?>_<?php echo $row->id; ?>"><?php echo $row->namaobat." | Stok Depo : 0 "; ?></option>
													<?php
													}
													?>
													<!-- <option value="puyer">Racikan Puyer</option> -->
													<!-- <option value="salep">Racikan Salep</option> -->
												</select>
											</div>
										</div>
										<div class="form-group row col-spacing-row">
											<label class="col-md-2 col-form-label">Qty</label>
											<div class="col-md-2">
												<input type="number" class="form-control" name="obatqty" id="obatqty">
											</div>
											<label class="col-md-1 col-form-label">Satuan</label>
											<div class="col-md-3">
												<input type="text" class="form-control" name="obatstauan" id="obatstauan" disabled>
											</div>
											<label class="col-md-1 col-form-label">Harga</label>
											<div class="col-md-3">
												<input type="text" class="form-control" name="obatharga" id="obatharga" disabled>
											</div>

										</div>
									</div>
									<div class="col-md-5">
										<div class="form-group row col-spacing-row">
											<label class="col-md-3 col-form-label">Satuan/Racikan</label>
											<div class="col-md-9">
												<select class="form-control" style="width: 100%;" type="text" name="dosis" id="dosis">
													<option value="">--pilih--</option>
													<?php
													foreach ($dtdosis as $row) {
													?>
														<option value="<?php echo $row->dosis; ?>"><?php echo $row->dosis; ?></option>
													<?php
													}
													?>
												</select>
											</div>
										</div>
										<div class="form-group row col-spacing-row">
											<label class="col-md-3 col-form-label">Catatan / Komposisi Racik</label>
											<div class="col-md-9">
												<textarea rows="4" name="catatanresep" id="catatanresep" class="form-control"></textarea>
											</div>

										</div>
									</div>
									<div class="col-md-12 text-right">
										<button onclick="simpandataobat();" class="btn btn-primary">Simpan</button>
									</div>
								</div>
								<br>
								<div class="row spacing-row mb-3 mt-2">				
									<div class="col-md-12">
										<div class="col-md-2">
										</div>
										<div class="col-md-10">							
											<div id="accordion_lab">
												<div d="lab_his">
													<h6 class="mb-0">
														<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwolab" aria-expanded="true" aria-controls="collapseTwolab">
														History Resep
														</button>
													</65>
												</div>
												<div id="collapseTwolab" class="collapse show" aria-labelledby="lab_his" data-parent="#accordion_lab">
													<div class="card-body">
														<!-- tabel history lab  -->
														<div class="table-responsive">
															<table class="table table-bordered table-hover" id="tabelhisresep">
																<thead>
																	<tr>
																		<th width='10%'>Cetak</th>
																		<th width='10%'>Tgl. Resep</th>
																		<th>Dokter</th>
																		<th width="20%">Unit Pengirim</th>
																		<th width="10%">No.Resep</th>
																	</tr>
																</thead>
																<tbody id="tabelhisreseptxt">
																</tbody>
															</table>
														</div>
													
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- ---end of hidtory resep-------- -->
							</div>
							</div>
						</div>
						<!-- =======diagnosa============ -->
						<div id="accordiondiag">
							<div class="card">
								<div class="card-header" id="headingOnediag">
									<h6 class="mb-0">
										<button class="btn btn-link" data-toggle="collapse" data-target="#collapseOnediag" aria-expanded="false" aria-controls="collapseOnediag">
										Diagnosa
										</button>
									</h6>
								</div>
								<div id="collapseOnediag" class="collapse show" aria-labelledby="headingOnediag" data-parent="#accordiondiag">
									<div class="card-body">
								<!-- ----------detail diagnosa------------- -->
										<div class="row" id="formobat">


																			<div class="col-md-12">
																				<div class="col-dm-12" id="ddig"></div>
																				<div class="box box-default">
																					<div class="box-body">
																						<table class="table table-bordered table-hover" id="tabeldiag">
																							<thead>
																								<tr>								
																									<tr>
																										<th width="3%">No.</th>
																										<th width=35%">Diagnosa</th>
																										<th>Diagnosa Ind</th>
																										<th width="7%">Kode ICD</th>
																										<th width="7%">No. DTD</th>
																										<th width="7%">Type</th>
																										<th width='5%'>Action</th>
																									</tr>
																								</tr>
																							</thead>
																							<tbody></tbody>
																						</table>
																						<hr class="border-top-hr my-4 bg-primary"/>
																						</div>
																					</div>
																				</div>
																			</div>

																			<div class="row" id="formdiagnosa">
																				<div class="col-md-5">
																					<div class="form-group row col-spacing-row">
																						<label class="col-md-3 col-form-label">Diagnosa</label>
																						<div class="col-md-9">
																							<select class="form-control" style="width: 100%;" name="diag" id="diag" onchange="tampilkandiag();">
																								<option value="">--Pilih--</option>
																								<?php
																								foreach ($diagnosa as $row) {
																									// echo '<option value="'.$row->id.'">'.$row->sebab2.'</option>';
																									echo '<option value="' . $row->id . '">' . $row->icd_code . " - " . $row->jenis_penyakit_local . '</option>';
																								}
																								?>
																							</select>
																						</div>
																					</div>
																					<div class="form-group row col-spacing-row">
																						<label class="col-md-3 col-form-label">Diagnosa(Ind)</label>
																						<div class="col-md-9">
																							<input type="text" class="form-control" name="latin" id="latin" disabled>
																						</div>
																					</div>
																				</div>
																				<div class="col-md-2">
																					<div class="form-group row col-spacing-row">
																						<div class="custom-control custom-checkbox custom-control-inline">
																							<input type="checkbox" class="custom-control-input" name="diagutama" id="diagutama" />
																							<label class="custom-control-label" for="diagutama">Diagnosa Utama</label>
																						</div>
																					</div>
																				</div>
																				<div class="col-md-5">
																					<div class="form-group row col-spacing-row">
																						<label class="col-md-3 col-form-label">Kode ICD</label>
																						<div class="col-md-9">
																							<input type="text" class="form-control" id="daftar" name="daftar" disabled>
																						</div>
																					</div>
																					<div class="form-group row col-spacing-row">
																						<label class="col-md-3 col-form-label">No. DTD</label>
																						<div class="col-md-9">
																							<input type="text" class="form-control" id="dtd" name="dtd" disabled>
																						</div>
																					</div>
																				</div>
																				<div class="col-md-12 text-right">
																					<button onclick="simpandiag();" class="btn btn-primary">Simpan</button>
																				</div>
																			</div>
																			<!-- end diagnosa tab form-->


								<!-- ----------end of detail  diagnosa------------- -->
									
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- ============end of diagnosa ========== -->

						<!-- ======= mulai vclaim ========= -->

						<div id="accordionvclaim">
							<div class="card">
								<div class="card-header" id="headingOnevclaim">
									<h6 class="mb-0">
										<button class="btn btn-link" data-toggle="collapse" data-target="#collapseOnevclaim" aria-expanded="true" aria-controls="collapseOnevclaim">
										SEP dan Kartu Kontrol
										</button>
									</h6>
								</div>

								<div id="collapseOnevclaim" class="collapse show" aria-labelledby="headingOnevclaim" data-parent="#accordionvclaim">
									<div class="card-body">
										<div class="col-md-12 text-left">
											<button onclick="ceksep();" class="btn btn-success">Lihat SEP Pasien</button>
											<button onclick="kartukontrol();" class="btn btn-primary"> Buat Kartu Kontrol</button>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- ========end of vclaim ======== -->

						<!-- resume medik------ -->
							<div id="accordionresume">
								<div class="card">
									<div class="card-header" id="headingOneresume">
										<h6 class="mb-0">
											<button class="btn btn-link" data-toggle="collapse" data-target="#collapseOneresume" aria-expanded="true" aria-controls="collapseOneresume">
											RESUME MEDIK
											</button>
										</h6>
									</div>

									<div id="collapseOneresume" class="collapse show" aria-labelledby="headingOneresume" data-parent="#accordionresume">
										<div class="card-body">
											<div class="col-md-12 text-left">
												<button onclick="resumemedik();" class="btn btn-danger">Resume Medik</button>

											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- selesia pelayanan------>
							<div id="accordionselesai">
								<div class="card">
									<div class="card-header" id="headingOneselesai">
										<h6 class="mb-0">
											<button class="btn btn-link" data-toggle="collapse" data-target="#collapseOneselesai" aria-expanded="true" aria-controls="collapseOneselesai">
											SELESAI PELAYANAN
											</button>
										</h6>
									</div>

									<div id="collapseOneselesai" class="collapse show" aria-labelledby="headingOneselesai" data-parent="#accordionselesai">
										<div class="card-body">
											<div class="col-md-12 text-left">
												<button onclick="selesaipelayanan();" class="btn btn-secondary">Selesai Pelayanan</button>

											</div>
										</div>
									</div>
								</div>
							</div>
						<br>
						<br>
						<br>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<!-- END FORM -->

<script>
	var siteURL = "<?php echo site_url(); ?>";

	// $(function() {
	// 		$('tdtindakan').select2();
	// 	});

	function modalload() {
	$("#proseskotak").append(
		'<div id="oload" class="overlay"><i class="fa fa-refresh fa-spin"></i></div>'
	);
}

function loadhapus() {
		$(".overlay").remove();
	}

	function loadproses() {
		$("#proseskotak").append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
	}

	
	function kebutuhandiagnosa() {
		$('#diag').select2({
			tags: true
		})
	}

function modalloadtutup() {
	$("#oload").remove();
}

function tutupmodal() {
	$(function () {
		$("#formmodal").modal("toggle");
	});
}

function tdsuksesalert(kode) {
	if (kode == 0) {
		$.notify("Sukses Input Data", "success");
	} else if (kode == 1) {
		$.notify("Sukses Ubah Data", "success");
	} else if (kode == 2) {
		$.notify("Sukses Hapus Data", "success");
	}
}

function tdgagalalert() {
	$.notify("Gagal Memproses Data", "error");
}

function kuranglengkap() {
	$.notify("Data Kurang Lengkap", "error");
}


function tdtindakan() {
	var tpp = $("#tdtindakan").val();
	$.ajax({
		url: siteURL + "/urj/untukpilihantindakan",
		type: "GET",
		data: { kdt: tpp },
	}).then(function (data) {
		$("#jasa").val("");
		var t = JSON.parse(data);
		$("#jasa").val(t.jasas);
	});
}

function updatesoap(){
	aktif();
}

function simpansoap(){
	nonaktif();
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
	// alert(nadi);
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
			console.log('sukses');
			// console.log(ajaxData);
		},
		error: function (ajaxData) {
			// modalloadtutup();
			console.log('error');

			console.log(ajaxData);
		}
	});	
}


function lihatdatahistorysoap(id) {
			$.ajax({
				url: "<?php echo site_url(); ?>/rme/isihistorysoappasien",
				type: "GET",
				data: {
					id: id
				},
				success: function(ajaxData) {
					console.log(ajaxData);
					var t = JSON.parse(ajaxData);
					console.log(t.dtpasien);
					console.log(t.dtdetailsoaphistory);
					isi=t.dtpasien.tanggal+' | '+t.dtpasien.nama_unit+' | '+t.dtpasien.nama_dokter+' | '+t.dtpasien.notransaksi;
					$("#hrmpasien").html(isi);
					// $("#irm").val(t.dtpasien.no_rm);
					// $("#notrans").val(t.dtpasien.notransaksi);
					// $("#tdgolongan").val(t.dtpasien.golongan);
					// $("#tddokterkode").val(t.dtpasien.kode_dokter);
					// $("#tddokter").val(t.dtpasien.nama_dokter);
					// $("#tglperiksa").val(t.dtpasien.tgl_masuk);
					$("#hsuhu").val(t.dtdetailsoaphistory.suhu);
					$("#htinggi").val(t.dtdetailsoaphistory.tinggi);
					$("#hberat").val(t.dtdetailsoaphistory.berat);
					$("#htensi").val(t.dtdetailsoaphistory.tensi);
					$("#hnadi").val(t.dtdetailsoaphistory.nadi);
					$("#hrespirasi").val(t.dtdetailsoaphistory.respirasi);
					$("#hspo2").val(t.dtdetailsoaphistory.spo2);
					$("#hgcs").val(t.dtdetailsoaphistory.gcs);

					$('#hkesadaran').val(t.dtdetailsoaphistory.kesadaran).trigger('change');

					$("#hkesadaranlainnya").val(t.dtdetailsoaphistory.kesadaranlain);
					$("#hkeluhanutama").val(t.dtdetailsoaphistory.keluhanutama);
					$("#hriwayatdahulu").val(t.dtdetailsoaphistory.riwayatdahulu);
					$("#hriwayatsekarang").val(t.dtdetailsoaphistory.riwayatsekarang);
					$("#halergi").val(t.dtdetailsoaphistory.alergi);
					$("#hobjektif").val(t.dtdetailsoaphistory.objektif);
					$("#hassesment").val(t.dtdetailsoaphistory.assesment);
					$("#hplan").val(t.dtdetailsoaphistory.plan);
					$("#hinstruksi").val(t.dtdetailsoaphistory.instruksi);
					$("#hevaluasi").val(t.dtdetailsoaphistory.evaluasi);
					$("#hidnya").val(t.dtdetailsoaphistory.id);
					
				}
			});
		}

		function simpandatatindakan() {
			modalload();
			var notrans = document.getElementById("notrans").value;
			var tdtgl = document.getElementById("tdtgl").value;
			var tdjam = document.getElementById("tdwaktu").value;
			var tddokter = document.getElementById("tddokterkode").value;
			var tddoktertext = document.getElementById("tddokter").value;
			var tdpel1 = '';
			var tdpel1text = '';
			var tdpel2 = '';
			var tdpel2text ='';
			var tdtindakan = $("#tdtindakan").val();
			var tdtindakantext = $("#tdtindakan option:selected").text();
			var unit = $("#unitselect").val();
			var unittext = $("#unitselect option:selected").text();
			var tdjml = document.getElementById("tdjml").value;
			var tdrawat = 0;
			var tddiskon = document.getElementById("tddiskon").value;
			var tdumum = 0;
			if (
				tdtgl == "" ||
				tdjam == "" ||
				tddokter == "" ||
				tdtindakan == "" ||
				tdjml == ""
			) {
				modalloadtutup();
				kuranglengkap();
				return;
			}
			$.ajax({
				url: siteURL + "/rme/layanantindakan",
				type: "GET",
				data: {
					tdtgl: tdtgl,
					tdjam: tdjam,
					tddokter: tddokter,
					tdtindakan: tdtindakan,
					tdjml: tdjml,
					tdrawat: tdrawat,
					notrans: notrans,
					tdpel1: tdpel1,
					tdpel1text: tdpel1text,
					tdpel2: tdpel2,
					tdpel2text: tdpel2text,
					tddoktertext: tddoktertext,
					tdtindakantext: tdtindakantext,
					unit: unit,
					unittext: unittext,
					tddiskon: tddiskon,
					tdumum: tdumum,
				},
				success: function (ajaxData) {
					var t = $.parseJSON(ajaxData);
					if (t.stat == true) {
						tdsuksesalert(0);
						$("#tabeltindakan tbody tr").remove();
						$("#tabeltindakan tbody").append(t.dtview);
						modalloadtutup();
					} else {
						tdgagalalert();
						modalloadtutup();
					}
				},
				error: function (ajaxData) {
					tdgagalalert();
					modalloadtutup();
				},
			});
		}

		function hapusdatatindakan(e, id) {
			var txt = $(e).parents("tr").find("td:eq(0)").text();
			$.confirm({
				title: "Hapus Data",
				content: "Yakin mengahapus data ke-" + txt + "?",
				buttons: {
					batal: {
						text: "Batal",
						btnClass: "btn-red",
						action: function () {},
					},
					hapus: {
						text: "Hapus",
						btnClass: "btn-blue",
						keys: ["enter"],
						action: function () {
							var unit = $("#unitselect").val();
							var unittext = $("#unitselect option:selected").text();
							var notrans = document.getElementById("notrans").value;
							// alert(id);
							$.ajax({
								url: siteURL + "/rme/layanantindakanhapus",
								type: "GET",
								data: {
									id: id,
									notrans: notrans,
									unit: unit,
									unittext: unittext,
								},
								success: function (ajaxData) {
									var t = $.parseJSON(ajaxData);
									if (t.stat == true) {
										tdsuksesalert(2);
										$("#tabeltindakan tbody tr").remove();
										$("#tabeltindakan tbody").append(t.dtview);
										modalloadtutup();
									} else {
										tdgagalalert();
										modalloadtutup();
									}
								},
								error: function (ajaxData) {
									tdgagalalert();
									modalloadtutup();
								},
							});
						},
					},
				},
			});
		}

function kirimisntalasi() {
	modalload();
	var irm = document.getElementById("irm").value;  //ok
	var inp = document.getElementById("inp").value; //ok
	var notrans = document.getElementById("notrans").value;  //ok
	var idokter = document.getElementById("tddokterkode").value; //ok
	var idoktertext = document.getElementById("tddokter").value; //ok
	var unit = $("#unitselect").val(); //ok unit poli
	var unittext = $("#unitselect option:selected").text(); //oknama unit poli
	var icatatan = $("#icatatan").val(); //ok
	var iunit = $("#iunit").val(); //ok instalasi tujuan
	var iunittext = $("#iunit option:selected").text();  //ok nama instalasi tujuan
	var instgl = document.getElementById("instgl").value; //ok
	var nama_umum = document.getElementById("inp").value; //ok
	$.ajax({
		url: siteURL + "/rme/simpankiriminstalasi",
		type: "GET",
		data: {
			inp: inp,
			irm: irm,
			idokter: idokter,
			idoktertext: idoktertext,
			iunit: iunit,
			iunittext: iunittext,
			notrans: notrans,
			unit: unit,
			unittext: unittext,
			icatatan: icatatan,
			instgl: instgl,
			nama_umum: nama_umum,
		},
		success: function (ajaxData) {
			var t = $.parseJSON(ajaxData);
			if (t.stat == true) {
				tdsuksesalert(0);
				$("#tabelinst tbody tr").remove();
				$("#tabelinst tbody").append(t.dtview);
				modalloadtutup();
			} else {
				$("#tdinfox div").remove();
				tdgagalalert();
				modalloadtutup();
			}
		},
		error: function (ajaxData) {
			tdgagalalert();
			modalloadtutup();
		},
	});


	function isitindakan(idx) {
		// prosesload();
		var irm = $("#irm").val();
		var id = idx;
		console.log(id);
		$.ajax({
			url: "<?php echo site_url(); ?>/urj/panggilformlab",
			type: "GET",
			data: {
				id: id,
				irm: irm
			},
			success: function(ajaxData) {
				// hapusload();
				// console.log(ajaxData);

				$("#myModal2").html(ajaxData);
				$("#myModal2").modal('show', {
					backdrop: 'true'
				});
			}
		});
	}

	//kebutuhan tindakan radiologi

	function isitindakanrad(idx) {
		// prosesload();
		var irm = $("#irm").val();
		var id = idx;
		console.log(id);
		$.ajax({
			url: "<?php echo site_url(); ?>/urj/panggilformrad",
			type: "GET",
			data: {
				id: id,
				irm: irm
			},
			success: function(ajaxData) {
				// hapusload();
				// console.log(ajaxData);
				$("#myModal2").html(ajaxData);
				$("#myModal2").modal('show', {
					backdrop: 'true'
				});
			}
		});
	}
}


function tampilkandiag(stat = 0) {
						loadproses();
						var diagnosa = $("#diag").val();
						$.ajax({
							url: "<?php echo site_url(); ?>/uri/tampilkanpilihandiagnosa",
							type: "GET",
							data: {
								diagnosa: diagnosa
							},
							success: function(ajaxData) {
								var dt = JSON.parse(ajaxData);
								if (dt.stat == true) {
									$("#latin").val(dt.data.jenis_penyakit);
									$("#dtd").val(dt.data.dtd);
									$("#daftar").val(dt.data.icd_code);
									if (stat == 1) {
										console.log('piu')
										$("#btndiagubah").removeAttr("disabled");
										$("#btndiagbatal").removeAttr("disabled");
									}
								} else {

								}
								loadhapus();
							},
							error: function(ajaxData) {
								loadhapus();
							}
						});
					}
</script>

