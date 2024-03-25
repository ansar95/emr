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
		<div class="col-12">
			<!-- <div class="card text-white bg-info"> -->
			<div class="card">
				<div class="row spacing-row mb-3">
					<div class="col-md-8">
						<div class="card-body">
							<h5 class="card-title"><?php echo $this->session->userdata("nama"); ?></h5>
							<p class="card-text">Spesialis ....</p>
						</div>
					</div>
					<div class="col-md-4">
						<div class="row spacing-row">
							<div class="col-md-12 mt-3">
								<div class="row form-group">
									<label class="col-sm-3 col-form-label text-right">Tanggal</label>
									<div class="col-sm-5">
										<input type="text" class="form-control pull-right" id="tglp" name="tglp" required autocomplete='off' disabled>
									</div>
								</div>
							</div>
						</div>
					</div>
            	</div>
            </div>
			<div class="card">
			<nav>
				<div class="nav nav-tabs font-weight-bold border-bottom ml-3" id="nav-tab" role="tablist">
					<a class="nav-item nav-link active font-weight-bold mt-2 bg-light text-green" id="rawatJalanNow" data-toggle="tab" href="#navRawatJalanNow" role="tab" aria-controls="navRawatJalanNow" aria-selected="true" style="font-size: 12px;">Rawat Jalan Hari Ini</a>
					<a class="nav-item nav-link mt-2 bg-light text-dark" id="rawatJalanNext" data-toggle="tab" href="#navRawatJalanNext" role="tab" aria-controls="navRawatJalanNext" aria-selected="false" style="color: brown; font-size: 12px;">Rawat Jalan Akan Datang</a>
					<a class="nav-item nav-link mt-2 bg-light text-danger" id="rawatInap" data-toggle="tab" href="#navRawatInap" role="tab" aria-controls="navRawatInap" aria-selected="false" style="color: red; font-size: 12px;">Pasien Rawat Inap</a>
				</div>
			</nav>

				<!-- ---control nav--- -->
				<div class="tab-content mb-5" id="nav-tabContent">
					<!-- Tab "Rawat Jalan Hari Ini" -->
					<div class="tab-pane fade show active" id="navRawatJalanNow" role="tabpanel" aria-labelledby="rawatJalanNow">

					<div class="col-md-12 mt-3">
						<div class="row spacing-row">
							<div class="col-md-12">
								<div class="row form-group">
									<label class="col-form-label ml-3">Unit</label>
									<div class="col-3">
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
									<!-- --tombol-- -->
									<button class='btn  btn-primary mt-auto' type='button' id="caridata" />Tampilkan</button>
								</div>
							</div>
						</div>
						<label class="col-form-label">isi card pasien di sini</label>
						<div id="datapasien"></div>						
					</div>



					</div>

					<!-- Tab "Rawat Jalan Akan Datang" -->
					<div class="tab-pane fade" id="navRawatJalanNext" role="tabpanel" aria-labelledby="rawatJalanNext">
						<!-- Isi untuk "Rawat Jalan Akan Datang" -->
						<p>"Rawat Jalan Akan Datang".</p>
					</div>

					<!-- Tab "Pasien Rawat Inap" -->
					<div class="tab-pane fade" id="navRawatInap" role="tabpanel" aria-labelledby="rawatInap">
						<!-- Isi untuk "Pasien Rawat Inap" -->
						<p> "Pasien Rawat Inap".</p>
					</div>
				</div>

				<!-- ----end control nav---- -->
			</div>
		</div>
	</div>
</div>	