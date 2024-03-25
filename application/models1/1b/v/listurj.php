<!-- START: Card Data-->
<main>

	<div class="container-fluid site-width">
		<!-- START: Breadcrumbs-->
		<div class="row ">
			<div class="col-12  align-self-center">
				<div class="sub-header mt-1 py-3 align-self-center d-sm-flex w-100 rounded">
					</ol>
				</div>
			</div>
		</div>
		<!-- END: Breadcrumbs-->
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header d-flex justify-content-between align-items-center">
						<h4 class="mb-0">Unit Rawat Jalan</h4>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="form-group col-md-2">
								<label for="inputEmail4">Tanggal</label>
								<input type="text" class="form-control pull-right" id="tglp" name="tglp" required autocomplete='off'>
							</div>
							<div class="form-group col-md-3 pr-0">
								<label for="inputEmail4">Unit</label>
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
							<div class="form-group col-md-2">
								<label for="inputEmail4">Dokter</label>
								<select class="form-control" name="dokter" id="dokter">
									<option value="">Semua</option>
								</select>
								<!-- <input type="text" class="form-control pull-right" id="tglp" name="tglp" required autocomplete='off'> -->
							</div>
							<div class="form-group col-md-2 d-flex align-items-start flex-column">
								<button class='btn  btn-primary mt-auto' type='button' id="caridata" />Tampilkan</button>
							</div>
							<!-- <div class="form-group col-md-1"></div> -->
							<div class="form-group col-md-2 pr-0">
								<label>No. RM</label>
								<input type="text" class="form-control pull-right" id="nrp" name="nrp" required autocomplete='off'>
							</div>
							<div class="form-group col-md-1 d-flex align-items-start flex-column">
								<button class='btn  btn-primary mt-auto' type='button' id="caridata1" />Cari</button>
							</div>
						</div>
						<div class="table-responsive">
							<table class="table table-bordered table-hover" id="barispasien">
								<thead>
									<tr class='bg-success text-black'>
										<th width='3%'>Berkas</th>
										<th width='6%'>No. RM</th>
										<th width="20%">Nama Pasien</th>
										<th width="11%">Unit</th>
										<th width="8%">Tgl. Masuk</th>
										<th width='7%'>Golongan</th>
										<th width='10%'>Rujukan</th>
										<th width='9%'>No. Transaksi</th>
										<th width='6%'>Status</th>
										<th width='15%' class="text-center">Proses</th>
										<!-- <th width='5%'>Dokter</th>
										<th width='5%'>SOAP</th>
										<th width='5%'>Proses</th> -->
										<th width='5%'>Info</th>
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