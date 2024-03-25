<!-- START: Card Data-->
<main>
	<div class="container-fluid site-width">
		<!-- START: Breadcrumbs-->
		<div class="row spacing-row">
			<div class="col-12  align-self-center">
				<div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
					</ol>
				</div>
			</div>
		</div>
		<!-- END: Breadcrumbs-->
		<div class="row spacing-row">
			<div class="col-12">
				<div class="card">
					
				</div>
			</div>
		</div>
		<div class="row spacing-row">
			<div class="col-12">
				<div class="card mt-4">
					<div class="card-header d-flex justify-content-between align-items-center bg-info text-white">
						<h4 class="mb-0">Data Pasien Registrasi Hari ini</h4>
					</div>
					<!-- <div class="card-header d-flex justify-content-between align-items-center">
						<h4 class="mb-0">Pengecekan Status RM</h4>
					</div> -->
					<div class="card-body">
						<div class="row">
							<div class="col-md-12">
								<div class="row form-group">
									<label class="col-sm-1 col-form-label">No. RM</label>
									<div class="col-md-2 pr-0">
										<input id="rm" name="rm" type="text" class="form-control" autocomplete="off">
									</div>
									<div class="col-md-1">
										<button class='btn btn-warning' onclick="filterrm();"><i class="fa fa-search mr-1"></i></button>
									</div>
									<label class="col-md-1 col-form-label text-right">Unit</label>
									<div class="col-md-4 pr-0">
										<select name="unit" id="unit">
											<option value="JALAN">Rawat Jalan</option>
											<option value="INAP">Rawat Inap</option>
											<option value="IGD">IGD</option>
											<option value="-">-</option>
											<!-- <?php
													foreach ($dtunit as $row) {
													?>
													<option value="<?php echo $row->kode_unit; ?>"><?php echo $row->nama_unit; ?></option>
													<?php
													}
													?> -->
										</select>
									</div>
									<div class="col-md-1">
										<button class=' btn btn-primary' onclick="filterunit();"><i class="fa fa-search mr-1"></i></button>
									</div>
									<div class="col-md-2">
										<button class=' btn btn-success' onclick="filternon();"><i class="fa fa-search mr-1"></i> Tampilkan Semua</button>
									</div>
								</div>
							</div>
						</div>
					<!-- </div>
					<div class="card-body"> -->
						<div class="table-responsive">
							<div id="tablepasien">
								<table class="table table-bordered table-striped" id="barispasien">
									<thead>
										<tr>
											<th width='10%'>No. RM</th>
											<th>Nama Lengkap</th>
											<th width="10%">Tgl. Masuk RS</th>
											<th width="5%">Jam</th>
											<th width="8%">Asuransi</th>
											<th width="10%">Unit Perawatan</th>
											<th width='10%'>Kamar</th>
											<th width='10%'>Tgl. Masuk Kamar</th>
											<th width='5%'>Jam</th>
											<th style="text-align:center" width='20%'>Proses</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td colspan="10" class="text-center">
												Tidak Ada Data
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
						<div id="pagination_link" class="d-flex flex-row-reverse"></div>
					</div>
				</div>
			</div>
		</div>
		<br><br>
		<div class="row spacing-row">
			<div class="col-12">
				<div class="card mt-4">
					<div class="card-header d-flex justify-content-between align-items-center bg-success">
						<h4 class="mb-0">Cek Berkas Pasien Lainnya</h4>
					</div>
					<div class="card-body">
						<div class="row form-group">
							<label class="col-sm-1 col-form-label">No. RM</label>
							<div class="col-md-2 pr-0">
								<input id="rm_all" name="rm_all" type="text" class="form-control" autocomplete="off">
							</div>
							<div class="col-md-1">
								<button class='btn btn-secondary text-white' onclick="filterrm_all();"><i class="fa fa-search mr-1"></i></button>
							</div>
						</div>
					<!-- </div>
					<div class="card-body"> -->
						<div class="table-responsive">
							<div id="tablepasien_all">
								<table class="table table-bordered table-striped" id="barispasien">
									<thead>
										<tr>
											<th width='6%'>No. RM</th>
											<th>Nama Lengkap</th>
											<th width="30%">Alamat</th>
											<th width="12%">Nik</th>
											<th width="10%">Asuransi</th>
											<th width="12%">No. kartu</th>
											<th style="text-align:center" width='6%'>Proses</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td colspan="10" class="text-center">
												Tidak Ada Data
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
						<div id="pagination_link_all" class="d-flex flex-row-reverse"></div>
					</div>
				</div>
			</div>
		</div>
</main>
<!-- END -->