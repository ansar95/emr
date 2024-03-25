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
					<div class="card-header d-flex">
						<h4 class="mb-0">Kamar Bersalin</h4>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="form-group col-md-3">
								<label for="inputEmail4">Unit Perawatan</label>
								<select class="form-control" style="width: 100%;" name="unit" id="unitselect">
									<?php
									foreach ($unit as $row) {
									?>
										<option value="<?php echo $row->kode_unit; ?>"><?php echo $row->nama_unit; ?></option>
									<?php
									}
									?>
								</select>
							</div>
							<div class="form-group col-md-1 col-2 d-flex align-items-start flex-column mr-5">
								<button class='btn  btn-primary mt-auto' type='button' id="caridata" />Proses</button>
							</div>
							<div class="form-group col-md-3">
								<label>No. RM</label>
								<input id="nrp" type="text" class="form-control" autocomplete="off">
							</div>
							<div class="form-group col-md-1 col-2  d-flex align-items-start flex-column">
								<button class='btn  btn-primary mt-auto' type='button' id="caridata" />Proses</button>
							</div>
						</div>
						<div class="box-body">
							<p><small>Background Abu-abu : pasien pindah ruangan | kuning : pasien pulang</small></p>
							<table class="table table-bordered table-striped" id="barispasien">
								<thead>
									<tr>
										<th width='4%'>No</th>
										<th width='8%'>No. RM</th>
										<th>Nama Pasien</th>
										<th width="14%">Unit Sebelumnya</th>
										<th width="10%">Tgl. Masuk</th>
										<th width='10%'>Golongan</th>
										<!-- <th width='15%'>Dokter Pengirim</th> -->
										<th width='13%'>No. Transaksi</th>
										<th width='7%'>Keterangan</th>
										<th width='15%'>Action</th>
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
			</div>
		</div>
	</div>

</main>
<!-- END -->