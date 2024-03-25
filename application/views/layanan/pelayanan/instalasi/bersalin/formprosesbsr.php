<div class="modal-dialog modal-xl" role="document">
	<div class="modal-content">
		<!-- <div class="box box-default box-solid" id="proseskotak"> -->
		<div class="modal-header p-1 pl-3 align-text-bottom">
			<b class="modal-title" id="exampleModalLabel">Pelayanan Instalasi Kamar Operasi</b>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			<div class="row  spacing-row">
				<div class="col-md-6">
					<div class="form-group row col-spacing-row">
						<label class="col-md-3 col-form-label">No. RM</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="irm" id="irm" value="<?php echo $dtpasien->no_rm; ?>" disabled>
						</div>
					</div>
					<div class="form-group row col-spacing-row">
						<label class="col-md-3 col-form-label">No. Transaksi</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="pj" id="notrans" value="<?php echo $dtpasien->notransaksi; ?>" disabled>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group row col-spacing-row">
						<label class="col-md-3 col-form-label">Nama Pasien</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="inp" id="inp" value="<?php echo $dtpasien->nama_pasien; ?>" disabled>
						</div>
					</div>
					<div class="form-group row col-spacing-row">
						<label class="col-md-3 col-form-label">Golongan</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="tdgolongan" id="tdgolongan" value="<?php echo $dtpasien->golongan; ?>" disabled>
						</div>
					</div>
				</div>
			</div>
			<div class="wizard-tab mb-1 mt-4">
				<ul class="nav nav-tabs d-block d-sm-flex">
					<li class="nav-item mr-auto mb-4">
						<a class="nav-link p-0 active" data-toggle="tab" href="#tab_1">
							<div class="d-flex">
								<div class="media-body font-weight-bold align-self-center mb-3 mb-3">
									<!-- <h6 class="mb-0 text-uppercase font-weight-bold">Tindakan</h6> -->
									Tindakan Persalinan
								</div>
							</div>
						</a>
					</li>
					<li class="nav-item mr-auto mb-4">
						<a class="nav-link p-0" data-toggle="tab" href="#tab_2">
							<div class="d-flex">
								<div class="media-body font-weight-bold align-self-center mb-3">
									<!-- <h6 class="mb-0 text-uppercase font-weight-bold">Pemakaian BHP / Obat</h6> -->
									Tindakan Perawatan
								</div>
							</div>
						</a>
					</li>
					<li class="nav-item mr-auto mb-4">
						<a class="nav-link p-0" data-toggle="tab" href="#tab_3">
							<div class="d-flex">
								<div class="media-body font-weight-bold align-self-center mb-3">
									<!-- <h6 class="mb-0 text-uppercase font-weight-bold">Pemakaian BHP / Obat</h6> -->
									Pemakaian BHP
								</div>
							</div>
						</a>
					</li>
					<li class="nav-item mr-auto mb-4">
						<a class="nav-link p-0" data-toggle="tab" href="#tab_4">
							<div class="d-flex">
								<div class="media-body font-weight-bold align-self-center mb-3">
									<!-- <h6 class="mb-0 text-uppercase font-weight-bold">Pemakaian BHP / Obat</h6> -->
									Pemakaian O2
								</div>
							</div>
						</a>
					</li>
					<li class="nav-item mr-auto mb-4">
						<a class="nav-link p-0" data-toggle="tab" href="#tab_5">
							<div class="d-flex">
								<div class="media-body font-weight-bold align-self-center mb-3">
									<!-- <h6 class="mb-0 text-uppercase font-weight-bold">Pemakaian BHP / Obat</h6> -->
									Kunjungan Dokter
								</div>
							</div>
						</a>
					</li>
					<li class="nav-item mr-auto mb-4">
						<a class="nav-link p-0" data-toggle="tab" href="#tab_6">
							<div class="d-flex">
								<div class="media-body font-weight-bold align-self-center mb-3">
									<!-- <h6 class="mb-0 text-uppercase font-weight-bold">Pemakaian BHP / Obat</h6> -->
									Kantong Darah
								</div>
							</div>
						</a>
					</li>
					<li class="nav-item mr-auto mb-4">
						<a class="nav-link p-0" data-toggle="tab" href="#tab_7">
							<div class="d-flex">
								<div class="media-body font-weight-bold align-self-center mb-3">
									<!-- <h6 class="mb-0 text-uppercase font-weight-bold">Pemakaian BHP / Obat</h6> -->
									Pindah Kamar
								</div>
							</div>
						</a>
					</li>
					<li class="nav-item mr-auto mb-4">
						<a class="nav-link p-0" data-toggle="tab" href="#tab_8">
							<div class="d-flex">
								<div class="media-body font-weight-bold align-self-center mb-3">
									<!-- <h6 class="mb-0 text-uppercase font-weight-bold">Pemakaian BHP / Obat</h6> -->
									Resep
								</div>
							</div>
						</a>
					</li>
					<li class="nav-item mr-auto mb-4">
						<a class="nav-link p-0" data-toggle="tab" href="#tab_9">
							<div class="d-flex">
								<div class="media-body font-weight-bold align-self-center mb-3">
									<!-- <h6 class="mb-0 text-uppercase font-weight-bold">Pemakaian BHP / Obat</h6> -->
									Kelahiran
								</div>
							</div>
						</a>
					</li>
				</ul>
			</div>
			<div class="tab-content">
				<div class="tab-pane fade active show" id="tab_1">
					<b class="my-4">Tindakan Keperawatan</b>
					<div class="table-responsive">
						<table class="table table-striped" id="tabeltindakanbersalin">
							<thead>
								<tr>
									<th width='3%'>No.</th>
									<th width='7%'>Tanggal</th>
									<th>Tindakan</th>
									<th width="5%">Harga</th>
									<th width="15%">Nama Dokter</th>
									<th width="15%">Spesialis Anak</th>
									<th width="15%">Bidan</th>
									<th width="15%">Dokter Anastesi</th>
									<th width='10%'>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
								if ($dttdbersalin == NULL) {
								?>
									<tr>
										<td colspan="10" class="text-center">
											Tidak Ada Data
										</td>
									</tr>
									<?php } else {
									$nos = 1;
									foreach ($dttdbersalin as $row) {
										echo "<tr><td>" . $nos++ . ".</td>";
										echo "<td>" . tanggaldua($row->tanggal) . "</td>";
										echo "<td>" . $row->tindakan . "</td>";
										echo "<td>" . $row->jasas . "</td>";
										echo "<td>" . $row->nama_dokter . "</td>";
										echo "<td>" . $row->spe_anak . "</td>";
										echo "<td>" . $row->nama_bidan . "</td>";
										echo "<td>" . $row->dokanastesi . "</td>";
									?>
										<td class="text-center">
											<button onclick="ubahtindakanbsredit(<?php echo $row->id; ?>)" class="btn-sm btn-info btn"><i class="fa fa-edit"></i></button>
											<button onclick="hapusdatatindakanbsr(this, <?php echo $row->id; ?>)" class="btn-sm btn-danger btn"><i class="fa fa-trash"></i></button>
										</td>
								<?php
										echo "</tr>";
									}
								} ?>
							</tbody>
						</table>
					</div>
					<div class="row" id="formbsr">
						<div class="col-md-6">
							<div class="form-group row col-spacing-row">
								<label class="col-md-3 col-form-label">Tanggal</label>
								<div class="col-md-9">
									<input type="text" class="form-control" name="bstgl" id="bstgl">
								</div>
							</div>
							<div class="form-group row col-spacing-row">
								<label class="col-md-3 col-form-label">Tindakan</label>
								<div class="col-md-9">
									<select class="form-control" style="width: 100%;" type="text" name="bstindakan" id="bstindakan" onchange="bstindakan()">
										<option value="">--pilih Tindakan--</option>
										<?php
										foreach ($dttindakan as $row) {
											if ($row->lahir == "1") {
										?>
												<option value="<?php echo $row->kode_tindakan; ?>"><?php echo $row->tindakan; ?></option>
										<?php
											}
										}
										?>
									</select>
								</div>
							</div>
							<div class="form-group row col-spacing-row">
								<label class="col-md-3 col-form-label">Biaya Jasa</label>
								<div class="col-md-9">
									<input type="text" class="form-control" id="jasa" name="jasa" disabled>
								</div>
							</div>
							<div class="form-group row col-spacing-row">
								<div class="col-md-3">
									<div class="custom-control custom-radio custom-control-inline">
										<input type="radio" class="custom-control-input" name="pilihan" id="pilihan1">
										<label class="custom-control-label" for="pilihan1">Dokter</label>
									</div>
								</div>
								<div class="col-md-9">
									<select class="form-control" style="width: 100%;" value="dokter" name="bsdokter" id="bsdokter">
										<option value="">--pilih Dokter--</option>
										<?php
										foreach ($dtbsrdokter as $row) {
										?>
											<option value="<?php echo $row->kode_dokter; ?>"><?php echo $row->nama_dokter; ?></option>
										<?php
										}
										?>
									</select>
								</div>
							</div>
							<div class="form-group row col-spacing-row">
								<div class="col-md-3">
									<div class="custom-control custom-radio custom-control-inline">
										<input type="radio" class="custom-control-input" value="bidan" name="pilihan" id="pilihan2">
										<label class="custom-control-label" for="pilihan2">Bidan</label>
									</div>
								</div>
								<div class="col-md-9">
									<select class="form-control" style="width: 100%;" name="bsbidan" id="bsbidan">
										<option value="">--pilih Bidan--</option>
										<?php
										foreach ($dtbsrbidan as $row) {
										?>
											<option value="<?php echo $row->kode_dokter; ?>"><?php echo $row->nama_dokter; ?></option>
										<?php
										}
										?>
									</select>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group row col-spacing-row">
								<label class="col-md-3 col-form-label">Spesialis Anak</label>
								<div class="col-md-9">
									<select class="form-control" style="width: 100%;" name="bsspe" id="bsspe">
										<option value="">--pilih Spesialis Anak--</option>
										<?php
										foreach ($dtbsrdokter as $row) {
										?>
											<option value="<?php echo $row->kode_dokter; ?>"><?php echo $row->nama_dokter; ?></option>
										<?php
										}
										?>
									</select>
								</div>
							</div>
							<div class="form-group row col-spacing-row">
								<label class="col-md-3 col-form-label">Dokter Anastesi</label>
								<div class="col-md-9">
									<select class="form-control" style="width: 100%;" name="bsperawat" id="bsperawat">
										<option value="">--Pilih--</option>
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
							<div class="form-group row col-spacing-row">
								<label class="col-md-3 col-form-label">Perawat</label>
								<div class="col-md-9">
									<select class="form-control" style="width: 100%;" name="tdperawat2" id="tdperawat2">
										<option value="">--Pilih--</option>
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
							<div class="form-group row col-spacing-row">
								<label class="col-md-3 col-form-label">% Diskon</label>
								<div class="col-md-5">
									<input type="number" class="form-control" name="bsdiskon" id="bsdiskon">
								</div>
								<div class="col-md-4">
									<div class="custom-control custom-checkbox custom-control-inline">
										<input type="checkbox" class="custom-control-input" name="bsumum" id="bsumum">
										<label class="custom-control-label" for="bsumum">Berlaku Umum</label>
									</div>
								</div>
							</div>
							<div class="form-group row col-spacing-row">
								<label class="col-md-3 col-form-label">Catatan</label>
								<div class="col-md-9">
									<textarea class="form-control col-sm-12" rows="3" id="bscatatan" name="bscatatan"></textarea>
								</div>
							</div>
						</div>
						<div class="col-md-12 text-right">
							<button onclick="simpandatatindakanbersalin();" class="btn btn-primary">Simpan</button>
						</div>
					</div>
				</div>
				<div class="tab-pane fade" id="tab_2">
					<b class="mb-4">Tindakan Keperawatan</b>
					<div class="table-responsive">
						<table class="table table-striped" id="tabeltindakan">
							<thead>
								<tr>
									<th width="5%">No.</th>
									<th width='10%'>Tanggal</th>
									<th width="5%">Jam</th>
									<th>Tindakan</th>
									<th width="10%">Jumlah</th>
									<th width="20%">Dokter</th>
									<th width="5%">Perawat</th>
									<th width='10%'>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
								if ($dttdtindakan == NULL) {
								?>
									<tr>
										<td colspan="8" class="text-center">
											Tidak Ada Data
										</td>
									</tr>
									<?php } else {
									$no = 1;
									foreach ($dttdtindakan as $row) {
										echo "<tr><td>" . $no++ . ".</td>";
										echo "<td>" . tanggaldua($row->tanggal) . "</td>";
										echo "<td>" . $row->jam . "</td>";
										echo "<td>" . $row->namatindakan . "</td>";
										echo "<td>" . $row->qty . "</td>";
										echo "<td>" . $row->nama_dokter . "</td>";
										echo "<td>" . $row->perawatsaja . "</td>";
									?>
										<td class="text-center">
											<button onclick="ubahtindakanedit(<?php echo $row->id; ?>)" class="btn-sm btn-info btn"><i class="fa fa-edit"></i></button>
											<button onclick="hapusdatatindakan(this, <?php echo $row->id; ?>)" class="btn-sm btn-danger btn"><i class="fa fa-trash"></i></button>
										</td>
								<?php
										echo "</tr>";
									}
								} ?>
							</tbody>
						</table>
					</div>
					<div class="row" id="formtindakan">
						<div class="col-md-6">
							<div class="form-group row col-spacing-row">
								<label class="col-md-3 col-form-label">Tanggal</label>
								<div class="col-md-9">
									<input type="text" class="form-control" name="tdtgl" id="tdtgl">
								</div>
							</div>
							<div class="form-group row col-spacing-row">
								<label class="col-md-3 col-form-label">Jam</label>
								<div class="col-md-9">
									<div class="bootstrap-timepicker">
										<input type="text" class="form-control" id="tdwaktu" name="tdwaktu">
									</div>
								</div>
							</div>
							<div class="form-group row col-spacing-row">
								<label class="col-md-3 col-form-label">Dokter</label>
								<div class="col-md-9">
									<select class="form-control" style="width: 100%;" name="tddokter" id="tddokter">
										<?php
										foreach ($dtdokter as $row) {
										?>
											<option value="<?php echo $row->kode_dokter; ?>"><?php echo $row->nama_dokter; ?></option>
										<?php
										}
										?>
									</select>
								</div>
							</div>
							<div class="form-group row col-spacing-row">
								<label class="col-md-3 col-form-label">Perawat</label>
								<div class="col-md-9">
									<select class="form-control" style="width: 100%;" name="tdperawat" id="tdperawat">
										<option value="">--Pilih--</option>
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
						<div class="col-md-6">
							<div class="form-group row col-spacing-row">
								<label class="col-md-3 col-form-label">Tindakan</label>
								<div class="col-md-9">
									<select class="form-control" style="width: 100%;" type="text" name="tdtindakan" id="tdtindakan">
										<?php
										foreach ($dttindakan as $row) {
										?>
											<option value="<?php echo $row->kode_tindakan; ?>"><?php echo $row->tindakan; ?></option>
										<?php
										}
										?>
									</select>
								</div>
							</div>
							<div class="form-group row col-spacing-row">
								<label class="col-md-3 col-form-label">% Diskon</label>
								<div class="col-md-5">
									<input type="number" class="form-control" name="tddiskon" id="tddiskon">
								</div>
								<div class="col-md-4">
									<div class="custom-control custom-checkbox custom-control-inline">
										<input type="checkbox" class="custom-control-input" name="tdumum" id="tdumum">
										<label class="custom-control-label" for="tdumum">Berlaku Umum</label>
									</div>
								</div>
							</div>
							<div class="form-group row col-spacing-row">
								<label class="col-md-3 col-form-label">Jumlah</label>
								<div class="col-md-9">
									<input type="number" class="form-control" name="tdjml" id="tdjml">
								</div>
							</div>
							<div class="form-group row col-spacing-row">
								<label class="col-md-3 col-form-label"></label>
								<div class="col-md-9">
									<div class="custom-control custom-checkbox custom-control-inline">
										<input type="checkbox" class="custom-control-input" name="tdperawatsaja" id="tdperawatsaja">
										<label class="custom-control-label" for="tdperawatsaja">Dilakukan oleh Perawat</label>
									</div>
								</div>
							</div>
							<div class="form-group row col-spacing-row">
								<label class="col-md-3 col-form-label">Catatan</label>
								<div class="col-md-9">
									<textarea class="form-control col-sm-12" rows="3" id="catatan" name="catatan"></textarea>
								</div>
							</div>
						</div>
						<div class="col-md-12 text-right">
							<button onclick="simpandatatindakan();" class="btn btn-primary">Simpan</button>
						</div>
					</div>
				</div>
				<div class="tab-pane fade" id="tab_3">
					<b class="mb-4">Bahan Habis Pakai</b>
					<div class="table-responsive">
						<table class="table table-striped" id="tabelbhp">
							<thead>
								<tr>
									<th width="5%">No.</th>
									<th width='10%'>Tanggal</th>
									<th>Nama BHP</th>
									<th width="10%">Satuan Pakai</th>
									<th width="10%">Harga Satuan</th>
									<th width="10%">Qty</th>
									<th width="10%">Sub Total</th>
									<th width='10%'>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
								if ($dttdbhp == NULL) {
								?>
									<tr>
										<td colspan="8" class="text-center">
											Tidak Ada Data
										</td>
									</tr>
									<?php } else {
									$nob = 1;
									$qty = 0;
									$jml = 0;
									foreach ($dttdbhp as $row) {
										$r = $row->qty * $row->hargapakai;
										echo "<tr><td>" . $nob++ . ".</td>";
										echo "<td>" . tanggaldua($row->tanggal) . "</td>";
										echo "<td>" . $row->namaobat . "</td>";
										echo "<td>" . $row->satuanpakai . "</td>";
										echo "<td>" . $row->hargapakai . "</td>";
										echo "<td>" . $row->qty . "</td>";
										echo "<td>" . $r . "</td>";
										$qty = $qty + $row->qty;
										$jml = $jml + $r;
									?>
										<td class="text-center">
											<button onclick="ubahbhpedit(<?php echo $row->id; ?>)" class="btn-sm btn-info btn"><i class="fa fa-edit"></i></button>
											<button onclick="hapusdatabhp(this, <?php echo $row->id; ?>)" class="btn-sm btn-danger btn"><i class="fa fa-trash"></i></button>
										</td>
								<?php
										echo "</tr>";
									}
									echo "<tr>";
									echo "<td colspan='5'>Total</td>";
									echo "<td>" . $qty . "</td>";
									echo "<td colspan='2'>" . $jml . "</td>";
									echo "</tr>";
								} ?>
							</tbody>
						</table>
					</div>
					<div class="row" id="formbhp">
						<div class="col-md-6">
							<div class="form-group row col-spacing-row">
								<label class="col-md-3 col-form-label">Tanggal</label>
								<div class="col-md-9">
									<input type="text" class="form-control" name="bhptgl" id="bhptgl">
								</div>
							</div>
							<div class="form-group row col-spacing-row">
								<label class="col-md-3 col-form-label">BHP</label>
								<div class="col-md-9">
									<div class="bootstrap-timepicker">
										<select class="form-control" style="width: 100%;" name="bhpbhp" id="bhpbhp" onchange="bhpbhp()">
											<?php
											foreach ($dtobat as $row) {
											?>
												<option value="<?php echo $row->kodeobat; ?>_<?php echo $row->id; ?>"><?php echo $row->namaobat; ?></option>
											<?php
											}
											?>
										</select>
									</div>
								</div>
							</div>
							<div class="form-group row col-spacing-row">
								<label class="col-md-3 col-form-label">Qty</label>
								<div class="col-md-9">
									<input type="number" class="form-control" name="bhpqty" id="bhpqty">

								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group row col-spacing-row">
								<label class="col-md-3 col-form-label">Satuan Pakai</label>
								<div class="col-md-9">
									<input type="text" class="form-control" name="bhpstauan" id="bhpstauan" disabled>
								</div>
							</div>
							<div class="form-group row col-spacing-row">
								<label class="col-md-3 col-form-label">Harga Satuan</label>
								<div class="col-md-9">
									<input type="text" class="form-control" name="bhpharga" id="bhpharga" disabled>
								</div>
							</div>
						</div>
						<div class="col-md-12 text-right">
							<button onclick="simpandatabhp();" class="btn btn-primary">Simpan</button>
						</div>
					</div>
				</div>
				<div class="tab-pane fade" id="tab_4">
					<b class="mb-4">Pemakaian O2</b>
					<div class="table-responsive">
						<table class="table table-striped" id="tabeltindakan">
							<thead>
								<tr>
									<th width="5%">No.</th>
									<th>Tanggal</th>
									<th width="5%">Jam</th>
									<th>Jumlah Liter</th>
									<th width='10%'>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
								if ($dttdodua == NULL) {
								?>
									<tr>
										<td colspan="4" class="text-center">
											Tidak Ada Data
										</td>
									</tr>
									<?php } else {
									$noo = 1;
									foreach ($dttdodua as $row) {
										echo "<tr><td>" . $noo++ . ".</td>";
										echo "<td>" . tanggaldua($row->tgl_pakai) . "</td>";
										echo "<td>" . $row->jam . "</td>";
										echo "<td>" . $row->qty . "</td>";
									?>
										<td class="text-center">
											<button onclick="ubahoduaedit(<?php echo $row->id; ?>)" class="btn-sm btn-info btn"><i class="fa fa-edit"></i></button>
											<button onclick="hapusdataodua(this, <?php echo $row->id; ?>)" class="btn-sm btn-danger btn"><i class="fa fa-trash"></i></button>
										</td>
								<?php
										echo "</tr>";
									}
								} ?>
							</tbody>
						</table>
					</div>
					<div class="row" id="formodua">
						<div class="col-md-6">
							<div class="form-group row col-spacing-row">
								<label class="col-md-3 col-form-label">Tanggal</label>
								<div class="col-md-9">
									<input type="text" class="form-control" name="otgl" id="otgl">
								</div>
							</div>
							<div class="form-group row col-spacing-row">
								<label class="col-md-3 col-form-label">Jam</label>
								<div class="col-md-9">
									<div class="bootstrap-timepicker">
										<input type="text" class="form-control" name="ojam" id="ojam">
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group row col-spacing-row">
								<label class="col-md-3 col-form-label">Jumlah</label>
								<div class="col-md-9">
									<input type="number" class="form-control" name="ojml" id="ojml">
								</div>
							</div>
						</div>
						<div class="col-md-12 text-right">
							<button onclick="simpandataodua();" class="btn btn-primary">Simpan</button>
						</div>
					</div>
				</div>
				<div class="tab-pane fade" id="tab_5">
					<b class="mb-4">Visite Dokter</b>
					<div class="table-responsive">
						<table class="table table-striped" id="tabeldokter">
							<thead>
								<tr>
									<th width="5%">No.</th>
									<th width='10%'>Tanggal</th>
									<th width="5%">Jam</th>
									<th>Dokter</th>
									<th width="20%">Visite/Konsul/Dokter Jaga</th>
									<th width='10%'>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
								if ($dttdvisite == NULL) {
								?>
									<tr>
										<td colspan="6" class="text-center">
											Tidak Ada Data
										</td>
									</tr>
									<?php } else {
									$nod = 1;
									foreach ($dttdvisite as $row) {
										echo "<tr><td>" . $nod++ . ".</td>";
										echo "<td>" . tanggaldua($row->tanggal) . "</td>";
										echo "<td>" . $row->jam . "</td>";
										echo "<td>" . $row->nama_dokter . "</td>";
										echo "<td>" . $row->visite . "</td>";
									?>
										<td class="text-center">
											<button onclick="ubahdokteredit(<?php echo $row->id; ?>)" class="btn-sm btn-info btn"><i class="fa fa-edit"></i></button>
											<button onclick="hapusdataodokter(this, <?php echo $row->id; ?>)" class="btn-sm btn-danger btn"><i class="fa fa-trash"></i></button>
										</td>
								<?php
										echo "</tr>";
									}
								} ?>
							</tbody>
						</table>
					</div>
					<div class="row" id="formdokter">
						<div class="col-md-6">
							<div class="form-group row col-spacing-row">
								<label class="col-md-3 col-form-label">Tanggal</label>
								<div class="col-md-9">
									<input type="text" class="form-control" name="dtgl" id="dtgl">
								</div>
							</div>
							<div class="form-group row col-spacing-row">
								<label class="col-md-3 col-form-label">Jam</label>
								<div class="col-md-9">
									<div class="bootstrap-timepicker">
										<input type="text" class="form-control" id="djam" name="djam">
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group row col-spacing-row">
								<label class="col-md-3 col-form-label">Dokter</label>
								<div class="col-md-9">
									<select class="form-control" style="width: 100%;" name="ddokter" id="ddokter">
										<?php
										foreach ($dtdokter as $row) {
										?>
											<option value="<?php echo $row->kode_dokter; ?>"><?php echo $row->nama_dokter; ?></option>
										<?php
										}
										?>
									</select>
								</div>
							</div>
							<div class="form-group row col-spacing-row">
								<label class="col-md-3 col-form-label">Visite/Konsul/Dokter Jaga</label>
								<div class="col-md-9">
									<select class="form-control" style="width: 100%;" type="text" name="dvisit" id="dvisit">
										<option value="VISITE">VISITE</option>
										<option value="KONSUL">KONSUL</option>
										<option value="DOKTER UGD">DOKTER UGD</option>
										<option value="DOKTER UMUM">DOKTER UMUM</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-md-12 text-right">
							<button onclick="simpandtdokter();" class="btn btn-primary">Simpan</button>
						</div>
					</div>
				</div>
				<div class="tab-pane fade" id="tab_6">
					<b class="mb-4">Pemakaian Kantung Darah</b>
					<div class="table-responsive">
						<table class="table table-striped" id="tabelkantung">
							<thead>
								<tr>
									<th width='5%'>No.</th>
									<th width='10%'>Tanggal</th>
									<th width="20%">Jumlah</th>
									<th>Golongan Darah</th>
									<th width='10%'>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
								if ($dttddarah == NULL) {
								?>
									<tr>
										<td colspan="5" class="text-center">
											Tidak Ada Data
										</td>
									</tr>
									<?php } else {
									$nok = 1;
									foreach ($dttddarah as $row) {
										echo "<tr><td>" . $nok++ . ".</td>";
										echo "<td>" . tanggaldua($row->tanggal) . "</td>";
										echo "<td>" . $row->qty . "</td>";
										echo "<td>" . $row->goldarah . "</td>";
									?>
										<td class="text-center">
											<button onclick="ubahdarahedit(<?php echo $row->id; ?>)" class="btn-sm btn-info btn"><i class="fa fa-edit"></i></button>
											<button onclick="hapusdatadarah(this, <?php echo $row->id; ?>)" class="btn-sm btn-danger btn"><i class="fa fa-trash"></i></button>
										</td>
								<?php
										echo "</tr>";
									}
								} ?>
							</tbody>
						</table>
					</div>
					<div class="row" id="formdarah">
						<div class="col-md-6">
							<div class="form-group row col-spacing-row">
								<label class="col-md-3 col-form-label">Tanggal</label>
								<div class="col-md-9">
									<input type="text" class="form-control" name="drtgl" id="drtgl">
								</div>
							</div>
							<div class="form-group row col-spacing-row">
								<label class="col-md-3 col-form-label">Jumlah Kantung</label>
								<div class="col-md-9">
									<input type="number" class="form-control" name="drjml" id="drjml">
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group row col-spacing-row">
								<label class="col-md-3 col-form-label">Golongan Darah</label>
								<div class="col-md-9">
									<select class="form-control" style="width: 100%;" name="drgol" id="drgol">
										<option value="A">A</option>
										<option value="A+">A+</option>
										<option value="B">B</option>
										<option value="B+">B+</option>
										<option value="AB">AB</option>
										<option value="AB+">AB+</option>
										<option value="O">O</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-md-12 text-right">
							<button onclick="simpankantung();" class="btn btn-primary">Simpan</button>
						</div>
					</div>
				</div>
				<div class="tab-pane fade" id="tab_7">
					<h6 class="mb-4">Pindah Kamar</h6>
					<div class="row  spacing-row">
						<div class="col-md-3">
							<div class="row form-group">
								<label class="col-md-4 col-form-label">Tanggal</label>
								<div class="col-md-8">
									<input type="text" class="form-control" name="pktgl" id="pktgl">
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="row form-group">
								<label class="col-md-4 col-form-label">Jam</label>
								<div class="col-md-8">
									<input type="text" class="form-control" name="pkjam" id="pkjam">
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="row form-group">
								<label class="col-md-4 ">Unit/Kelas Tujuan</label>
								<div class="col-md-8">
									<select class="form-control" style="width: 100%;" name="pkunit" id="pkunit" onchange="carikamar()">
										<option value="">--pilihan--</option>
										<?php
										foreach ($dtunit as $row) {
										?>
											<option value="<?php echo $row->kode_unit . "_" . $row->kode_kelas . "_" . $row->nama_unit; ?>"><?php echo $row->nama_kelas; ?></option>
										<?php
										}
										?>
										<!-- <option value="<?php echo '0249' . "_" . '' . "_" . 'KAMAR BERSALIN'; ?>"><?php echo 'KAMAR BERSALIN'; ?></option> -->

									</select>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="row form-group">
								<label class="col-md-4 col-form-label">Kamar</label>
								<div class="col-md-8">
									<select class="form-control" style="width: 100%;" name="kamar" type="text" id="kamar">
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="row  spacing-row">
						<div class="col-md-12 text-right">
							<?php
							if ($pindah == 0) {
							?>
								<button id="btnPindahSimpan" onclick="simpanpindah()" class="btn btn-primary">Simpan</button>
							<?php
							} else {
							?>
								<button id="btnPindahSimpan" onclick="" class="btn btn-primary" disabled>Simpan</button>
							<?php
							}
							?>
						</div>
					</div>
					<h6 class="mb-4">History</h6>
					<div class="table-responsive">
						<table class="table table-bordered table-striped" id="tabelhistory">
							<thead>
								<tr>
									<th width='10%'>Kode Unit</th>
									<th>Nama Unit</th>
									<th width="15%">Tgl. Masuk Kamar</th>
									<th width="15%">Jam Masuk Kamar</th>
									<th width="15%">Tgl. Keluar Kamar</th>
									<th width="15%">Jam Keluar Kamar</th>
									<th width="5%">Kembali</th>
									<th width="5%">Pulang</th>
								</tr>
							</thead>
							<tbody>
								<?php
								if ($dttdhistory == NULL) {
								?>
									<tr>
										<td colspan="6" class="text-center">
											Tidak Ada Data
										</td>
									</tr>
								<?php } else {
									foreach ($dttdhistory as $key => $row) {
										echo "<tr><td>" . $row->kode_unit . "</td>";
										echo "<td>" . $row->nama_unit . "</td>";
										echo "<td>" . tanggaldua($row->tgl_masuk_kamar) . "</td>";
										echo "<td>" . $row->jam_masuk . "</td>";
										echo "<td>" . tanggaldua($row->tgl_keluar_kamar) . "</td>";
										echo "<td>" . $row->jam_keluar . "</td>";
										if ($row->status == "0") {
											echo '<td class="text-center">';
											if ($key == 0) {
												if ($pindah == 0) {
													if (count($dttdhistory) != 1) {
														echo '<button onclick="pasienkembali(this, ' . $row->id . ')" class="btn-sm btn-info btn">Kembali</button>';
													}
												}
											}
											echo '</td>';
											echo '<td class="text-center">';
											if ($key == 0) {
												if ($pindah == 0) {
													echo '<button onclick="pasienpulang(this, ' . $row->id . ')" class="btn-sm btn-danger btn">Pulang</button>';
												}
											}
											echo '</td>';
										} else {
											echo "<td></td>";
											echo "<td></td>";
										}
										echo "</tr>";
									}
								} ?>
							</tbody>
						</table>
					</div>

				</div>
				<div class="tab-pane fade" id="tab_8">
					<div class="row  ">
						<div class="col-md-6">
							<h6 class="mb-4">Daftar Resep</h6>
						</div>
						<div class="col-md-6">
							<div class="form-group row justify-content-end">
								<label class="col-md-3 col-form-label">No.Resep :</label>
								<div class="col-md-6">
									<input type="text" class="form-control" id="norep" name="norep" disabled />
								</div>
							</div>
						</div>
					</div>

					<div class="table-responsive">
						<table class="table table-bordered table-striped" id="tabelobat">
							<thead>
								<tr>
									<th style="text-align:right" width="3%">No.</th>
									<th width='9%'>No.Resep</th>
									<th width='7%'>Tanggal</th>
									<th width='20%'>Dokter</th>
									<th>Nama Obat</th>
									<th style="text-align:right" width="6%">Harga</th>
									<th style="text-align:right" width="5%">Qty</th>
									<th width="7%">Satuan</th>
									<th width="15%">Dosis</th>
									<th style="text-align:center" width='10%'>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
								if ($dttdobat == NULL) {
								?>
									<tr>
										<td colspan="12" class="text-center">
											Tidak Ada Data
										</td>
									</tr>
									<?php } else {
									$no = 1;
									foreach ($dttdobat as $row) {
										echo "<tr><td align='right'>" . $no++ . ".</td>";
										echo "<td>" . $row->noresep . "</td>";
										echo "<td>" . $row->tglresep . "</td>";
										echo "<td>" . $row->nama_dokter . "</td>";
										echo "<td>" . $row->namaobat . "</td>";
										echo "<td align='right' >" . groupangka($row->hargapakai) . "</td>";
										echo "<td align='right'>" . $row->qty . "</td>";
										echo "<td>" . $row->satuanpakai . "</td>";
										echo "<td>" . $row->dosis . "</td>";
									?>
										<td class="text-center">
											<!-- <a onclick="ubahdataobat(<?php echo $row->idnoresep; ?>)" class="btn-sm btn-info btn-flat"><i class="fa fa-edit"></i></a> -->
											<button onclick="hapusdataobat(this, <?php echo $row->idnoresep; ?>)" class="btn-sm btn-danger btn"><i class="fa fa-trash"></i></button>
										</td>
								<?php
										echo "</tr>";
									}
								} ?>
							</tbody>
						</table>
					</div>
					<div class="row" id="formobat">
						<div class="col-md-7">
							<div class="form-group row col-spacing-row">
								<label class="col-md-2 col-form-label">Tanggal</label>
								<div class="col-md-4">
									<input type="text" class="form-control" name="pktglobat" id="pktglobat">
								</div>
								<label class="col-md-2 col-form-label">Dokter</label>
								<div class="col-md-4">
									<select class="form-control" style="width: 100%;" name="ddokterresep" id="ddokterresep">
										<option value="">--pilih dokter--</option>
										<?php
										foreach ($dtdokter as $row) {
										?>
											<option value="<?php echo $row->kode_dokter; ?>"><?php echo $row->nama_dokter; ?></option>
										<?php
										}
										?>
									</select>
								</div>

							</div>
							<div class="form-group row col-spacing-row">
								<label class="col-md-2 col-form-label">Obat</label>
								<div class="col-md-10">
									<select class="form-control" style="width: 100%;" name="obatobat" id="obatobat" onchange="prosbhp1()">
										<option value="">--pilih obat--</option>
										<?php
										foreach ($dtobat as $row) {
										?>
											<option value="<?php echo $row->kodeobat; ?>_<?php echo $row->id; ?>"><?php echo $row->namaobat; ?></option>
										<?php
										}
										?>
									</select>
								</div>
							</div>
							<div class=" row ">
								<label class="col-md-1 col-form-label">Qty</label>
								<div class="col-md-3">
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
								<label class="col-md-3 col-form-label">Dosis</label>
								<div class="col-md-9">
									<select class="form-control" style="width: 100%;" type="text" name="dosis" id="dosis">
										<option value="">--pilih dosis--</option>
										<?php
										foreach ($ambildosis as $row) {
										?>
											<option value="<?php echo $row->dosis; ?>"><?php echo $row->dosis; ?></option>
										<?php
										}
										?>
									</select>
								</div>
							</div>
							<div class="form-group row col-spacing-row">
								<label class="col-md-3 col-form-label">Catatan</label>
								<div class="col-md-9">
									<textarea rows="4" name="catatanresep" id="catatanresep" class="form-control"></textarea>
								</div>

							</div>
						</div>
						<div class="col-md-12 text-right">
							<button onclick="simpandataobat();" class="btn btn-primary">Simpan</button>
						</div>
					</div>
				</div>
				<div class="tab-pane fade" id="tab_9">
					<b class="mb-4">Pencatatan Kelahiran Bayi</b>
					<div class="row mt-4">
						<div class="col-md-6">
							<div class="form-group row col-spacing-row">
								<label class="col-md-3 col-form-label">Tanggal Kelahiran</label>
								<div class="col-md-3">
									<input type="text" class="form-control" name="tgllahir" id="tgllahir" value="<?php echo $dtpasien->tgllahirbayi; ?>">
								</div>
								<label class="col-md-3 col-form-label">Jam</label>
								<div class="col-md-3">
									<div class="bootstrap-timepicker">
										<input type="text" class="form-control" name="jamlahir" id="jamlahir" value="<?php echo $dtpasien->jamlahir; ?>">
									</div>
								</div>
							</div>
							<div class="form-group row col-spacing-row">
								<label class="col-md-3 col-form-label">Berat Badan (kg)</label>
								<div class="col-md-3">
									<input type="text" class="form-control" name="berat" id="berat" value="<?php echo $dtpasien->berat; ?>">
								</div>
								<label class="col-md-3 col-form-label">Panjang (cm)</label>
								<div class="col-md-3">
									<input type="text" class="form-control" name="panjang" id="panjang" value="<?php echo $dtpasien->panjang; ?>">
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group row col-spacing-row">
								<label class="col-md-3 col-form-label">Jenis Kelamin</label>
								<div class="col-md-3">
									<select class="form-control" style="width: 100%;" name="jk" id="jk">
										<option value="L" <?php if ($dtpasien->jkbayi == "L") {
																echo "selected";
															} ?>>Laki-Laki</option>
										<option value="P" <?php if ($dtpasien->jkbayi == "P") {
																echo "selected";
															} ?>>Perempuan</option>
									</select>
								</div>
								<label class="col-md-3 col-form-label">Cara Melahirkan</label>
								<div class="col-md-3">
									<select class="form-control" style="width: 100%;" name="caralahir" id="caralahir">
										<option value="N" <?php if ($dtpasien->caralahir == "N") {
																echo "selected";
															} ?>>Normal</option>
										<option value="O" <?php if ($dtpasien->caralahir == "O") {
																echo "selected";
															} ?>>Operasi</option>
									</select>
								</div>
							</div>
							<div class="form-group row col-spacing-row">
								<label class="col-md-3 col-form-label">Catatan</label>
								<div class="col-md-9">
									<input type="text" class="form-control" name="catatanlahir" id="catatanlahir" value="<?php echo $dtpasien->catatanlahir; ?>">

								</div>
							</div>
						</div>
						<div class="col-md-12 text-right">
							<button id="btnPindahSimpan" onclick="simpanbayi()" class="btn btn-primary">Simpan</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	var siteURL = "<?php echo site_url(); ?>";
</script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/dist/js/instalasi/bersalin/v1/prosesbsr.js"></script>
<script>
	function carikamar() {
		var pkunit = $("#pkunit").val();
		$.ajax({
			url: "<?php echo site_url(); ?>/ioperasi/ambilpindahkamar",
			type: "GET",
			data: {
				pkunit: pkunit
			},
		}).then(function(data) {
			$("#kamar option").remove();
			var t = JSON.parse(data);
			var op = new Option("-Pilih-", "-", true, true);
			$('#kamar').append(op).trigger('change');
			t.forEach(function(entry) {
				var option = new Option(entry.nama_kamar, entry.kode_kamar, false, false);
				$('#kamar').append(option).trigger('change');
			});
		});
	}

	function bstindakan() {
		var tpp = $("#bstindakan").val();
		$.ajax({
			url: "<?php echo site_url(); ?>/Ibersalin/untukpilihantindakan",
			type: "GET",
			data: {
				kdt: tpp
			},
		}).then(function(data) {
			$("#jasa").val('');
			var t = JSON.parse(data);
			$("#jasa").val(t.jasas);
		});
	}

	function prosbhp1() {
		var tpp = $("#obatobat").val();
		$.ajax({
			url: "<?php echo site_url(); ?>/uri/untukpilihanbihp",
			type: "GET",
			data: {
				bhp: tpp
			},
		}).then(function(data) {
			$("#obatstauan").val('');
			$("#obatharga").val('');
			var t = JSON.parse(data);
			$("#obatstauan").val(t.satuanpakai);
			$("#obatharga").val(t.hargapakai);
		});
	}
</script>