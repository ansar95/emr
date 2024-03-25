<div class="content-wrapper">
	<!-- <div class="container"> -->
		<section class="content">
			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title">Kamar Bersalin</h3>
				</div>
				<div class="box-body">
					<div class="row">
						<div class="col-sm-12">
						<div class="box-body pad table-responsive">
							<table class="table text-left" bordercolor="#ffffff" >
								<tr >
									<td width="30%">
										<label>Unit Perawatan</label>
									</td>
									<td width="10%">
									</td>
									<td width="30%">
									</td>
									<td width="20%">
										<label>No. RM</label>
									</td>
									<td width="10%">
									</td>
								</tr>
								<tr>
									<td width="30%">
										<select class="form-control" style="width: 100%;" name="unit" id="unitselect">
											<?php
											foreach($unit as $row) {
											?>
											<option value="<?php echo $row->kode_unit; ?>"><?php echo $row->nama_unit; ?></option>
											<?php
											}
											?>
										</select>
									</td>
									<td width="10%">
										<button class='text-center btn-sm btn-primary col-sm-12' type='button' id="caridata"/>Proses</button>
									</td>
									<td width="30%">
									</td>
									<td width="20%">
										<input id="nrp" type="text" class=" col-sm-12">
									</td>
									<td width="10%">
									<button class='text-center btn-sm btn-primary col-sm-12' type='button' id="caridata"/>Proses</button>
									</td>
								</tr>
							</table>
						</div>
						</div>
					</div>
				</div>
			</div>
			<div class="box" id="kotak">
				<div class="box-header with-border">
					<h3 class="box-title">Data Pasien</h3>
					<div class="box-tools pull-right">

					</div>
				</div>
				<div class="box-body">
					<table class="table table-bordered table-striped" id="barispasien">
						<thead>
							<tr>								
								<th width='8%'>No. RM</th>
								<th>Nama Pasien</th>
								<th width="15%">Unit Sebelumnya</th>
								<th width="10%">Tgl. Masuk</th>
								<th width='10%'>Golongan</th>
								<th width='15%'>Dokter Pengirim</th>
								<th width='10%'>No. Transaksi</th>
								<th width='12%'>Action</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td colspan="11" class="text-center">
									Tidak Ada Data
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</section>
	<!-- </div> -->
</div>
