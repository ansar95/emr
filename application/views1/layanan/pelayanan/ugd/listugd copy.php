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
						<h4 class="mb-0">Unit Gawat Darurat</h4>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="form-group col-md-3 pr-0">
								<label for="inputEmail4">Unit Pelayanan</label>
								<?php
								$id = $this->session->userdata("idx");
								if (ceksess("PIL", $id) == FALSE) {
									$units = json_decode(stripslashes($this->session->userdata("kodeunit")));
								?>
									<select class="form-control" name="unit" id="unitselect">
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
									<select class="form-control" name="unit" id="unitselect">
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
							<div class="form-group col-md-2 d-flex align-items-start flex-column">
								<button class='btn  btn-primary mt-auto' type='button' id="caridata" />Tampilkan</button>
							</div>
							<div class="form-group col-md-2"></div>
							<div class="form-group col-md-3 pr-0">
								<label>No. RM</label>
								<input id="nrp" type="text" class="form-control" autocomplete="off">
							</div>
							<div class="form-group col-md-2 d-flex align-items-start flex-column">
								<button class='btn  btn-primary mt-auto' type='button' id="caridata1" />Proses</button>
							</div>
						</div>
						<div class="box-body">
							<table class="table table-bordered table-striped" id="barispasien">
								<thead>
									<tr>
										<th width='3%'>No.</th>
										<th width='5%'>No. RM</th>
										<th width="15%">Nama Pasien</th>
										<th width="16%">Alamat</th>
										<th width="12%">Unit</th>
										<!-- <th width="8%">Kelas</th> -->
										<th width="9%">Tgl. Masuk</th>
										<th width='8%'>Golongan</th>
										<th width='8%'>Rujukan</th>
										<th width='9%'>No. Transaksi</th>
										<th width='8%'>Status</th>
										<th width='5%'>DPJP</th>
										<th width='5%'>Action</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td colspan="12" class="text-center">
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