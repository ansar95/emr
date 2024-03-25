<!-- START: Card Data-->
<main>
	<div class="container-fluid site-width">
		<!-- START: Breadcrumbs-->
		<div class="row ">
			<div class="col-12  align-self-center">
				<div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
					</ol>
				</div>
			</div>
		</div>
		<!-- END: Breadcrumbs-->
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header d-flex justify-content-between align-items-center">
						<h4 class="mb-0">Registrasi Pelayanan Rawat Inap</h4>
						<button class='btn btn-sm btn-success' onclick="location.href='<?php echo site_url(); ?>/registrasipasien/dataregistrasibaruuri'">
							<i class='fas fa-plus-square'></i> &nbsp;Registrasi Baru
						</button>
					</div>
					<div class="card-body">
						<div class="form-row">
							<div class="form-group col-md-3">
								<label>Tanggal Registrasi</label>
								<input type="text" class="form-control " id="tglregis" name="tglp" required autocomplete='off'>
							</div>
							<div class="form-group col-md-1 d-flex align-items-start flex-column">
								<button class='btn btn btn-primary mt-auto' type='button' onclick="tglmasuk()" />Proses</button>
							</div>
							<div class="form-group col-md-4"></div>
							<div class="form-group col-md-3 ">
								<label>No. RM</label>
								<input id="nrp" type="text" class="form-control" utocomplete='off'>
							</div>
							<div class="form-group col-md-1 d-flex align-items-start flex-column">
								<button class='btn btn btn-primary mt-auto' type='button' onclick="caridatarm()" />Cari</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-12">
				<div class="card mt-4">
					<div class="card-header d-flex justify-content-between align-items-center">
						<h4 class="mb-0">Data Pasien</h4>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<div id="tablepasien">
								<table class="table table-bordered table-hover" id="barispasien">
									<thead>
										<tr>
											<th width='2%'>No.</th>
											<th width='5%'>No. RM</th>
											<th width="3%">Ttl</th>
											<th width="14%">Nama Pasien</th>
											<!-- <th>Alamat</th> -->
											<th>Ruang Perawatan</th>
											<th width="7%">Tgl. Masuk</th>
											<th width='8%'>Golongan</th>
											<th width='11%'>No. SEP</th>
											<th width='10%'>No. Transaksi</th>
											<th style="text-align:center" width='11%'>Cetak</th>
											<th style="text-align:center" width='6%'>Proses</th>
											<th style="text-align:center" width='9%'>SEP</th>
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
						<!-- <div id="pagination_link" class="d-flex flex-row-reverse"></div> -->
					</div>
				</div>
			</div>
		</div>
	</div>

</main>
<!-- END -->