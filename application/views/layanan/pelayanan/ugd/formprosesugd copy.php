<div class="modal-dialog modal-xl" role="document">
	<div class="modal-content">
		<!-- <div class="box box-default box-solid" id="proseskotak"> -->
		<div class="modal-header p-1 pl-3 align-text-bottom">
			<b class="modal-title" id="exampleModalLabel">Pelayanan Unit gawat Darurat</b>
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
					<div class="form-group row col-spacing-row">
						<label class="col-md-3 col-form-label">Golongan</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="tdgolongan" id="tdgolongan" value="<?php echo $dtpasien->golongan; ?>" disabled>
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
						<label class="col-md-3 col-form-label">Nama Dokter</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="tdgolongan" id="tdgolongan" value="<?php echo $dtpasien->golongan; ?>" disabled>
						</div>
					</div>
				</div>
			</div>
			<div class="wizard-tab mb-1 mt-5">
				<ul class="nav nav-tabs d-block d-sm-flex">
					<li class="nav-item mr-auto mb-4">
						<a class="nav-link p-0 active" data-toggle="tab" href="#tab_1">
							<div class="d-flex">
								<div class="media-body font-weight-bold align-self-center mb-3 mb-3">
									<!-- <h6 class="mb-0 text-uppercase font-weight-bold">Tindakan</h6> -->
									Tindakan
								</div>
							</div>
						</a>
					</li>
					<li class="nav-item mr-auto mb-4">
						<a class="nav-link p-0" data-toggle="tab" href="#tab_2">
							<div class="d-flex">
								<div class="media-body font-weight-bold align-self-center mb-3">
									<!-- <h6 class="mb-0 text-uppercase font-weight-bold">Pemakaian BHP / Obat</h6> -->
									Pemakaian BHP / Obat
								</div>
							</div>
						</a>
					</li>
					<li class="nav-item mr-auto mb-4">
						<a class="nav-link p-0" data-toggle="tab" href="#tab_3">
							<div class="d-flex">
								<div class="media-body font-weight-bold align-self-center mb-3">
									<!-- <h6 class="mb-0 text-uppercase font-weight-bold">Pemakaian O2</h6> -->
									Pemakaian O2
								</div>
							</div>
						</a>
					</li>
					<li class="nav-item mr-auto mb-4">
						<a class="nav-link p-0" data-toggle="tab" href="#tab_4">
							<div class="d-flex">
								<div class="media-body font-weight-bold align-self-center mb-3">
									<!-- <h6 class="mb-0 text-uppercase font-weight-bold">Kunjungan Dokter</h6> -->
									Kunjungan Dokter
								</div>
							</div>
						</a>
					</li>
					<li class="nav-item mr-auto mb-4">
						<a class="nav-link p-0" data-toggle="tab" href="#tab_5">
							<div class="d-flex">
								<div class="media-body font-weight-bold align-self-center mb-3">
									<!-- <h6 class="mb-0 text-uppercase font-weight-bold">Kantong Darah</h6> -->
									Kantong Darah
								</div>
							</div>
						</a>
					</li>
					<li class="nav-item mr-auto mb-4">
						<a class="nav-link p-0" data-toggle="tab" href="#tab_6">
							<div class="d-flex">
								<div class="media-body font-weight-bold align-self-center mb-3">
									<!-- <h6 class="mb-0 text-uppercase font-weight-bold">Pindah Kamar</h6> -->
									Pindah Kamar
								</div>
							</div>
						</a>
					</li>
					<li class="nav-item mr-auto mb-4">
						<a class="nav-link p-0" data-toggle="tab" href="#tab_7">
							<div class="d-flex">
								<div class="media-body font-weight-bold align-self-center mb-3">
									<!-- <h6 class="mb-0 text-uppercase font-weight-bold">Instalasi</h6> -->
									Instalasi
								</div>
							</div>
						</a>
					</li>
					<li class="nav-item mr-auto mb-4">
						<a class="nav-link p-0" data-toggle="tab" href="#tab_8">
							<div class="d-flex">
								<div class="media-body font-weight-bold align-self-center mb-3">
									<!-- <h6 class="mb-0 text-uppercase font-weight-bold">Instalasi</h6> -->
									Penunjang
								</div>
							</div>
						</a>
					</li>
					<li class="nav-item mr-auto mb-4">
						<a class="nav-link p-0" data-toggle="tab" href="#tab_9">
							<div class="d-flex">
								<div class="media-body font-weight-bold align-self-center mb-3">
									<!-- <h6 class="mb-0 text-uppercase font-weight-bold">Instalasi</h6> -->
									Resep
								</div>
							</div>
						</a>
					</li>
					<li class="nav-item mr-auto mb-4">
						<a class="nav-link p-0" data-toggle="tab" href="#tab_10">
							<div class="d-flex">
								<div class="media-body font-weight-bold align-self-center mb-3">
									<!-- <h6 class="mb-0 text-uppercase font-weight-bold">Instalasi</h6> -->
									Pemeriksaan Awal
								</div>
							</div>
						</a>
					</li>
				</ul>
			</div>
			<div class="tab-content">
				<div class="tab-pane fade active show" id="tab_1">
					<h6 class="mb-4">Tindakan Keperawatan</h6>
					<div class="table-responsive">
						<table class="table table-striped" id="tabeltindakan">
							<thead>
								<tr>
									<th width="3%">No.</th>
									<th width='8%'>Tanggal</th>
									<th width="5%">Jam</th>
									<th>Tindakan</th>
									<th style="text-align:center" width="5%">Jumlah</th>
									<th width="22%">Dokter</th>
									<th style="text-align:center" width="4%">PRWT</th>
									<th style="text-align:center" width="4%">UM/ASR</th>
									<th style="text-align:right" width="4%">Diskon</th>
									<th style="text-align:center" width='8%'>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
								if ($dttdtindakan == NULL) {
								?>
									<tr>
										<td colspan="100%" class="text-center">
											Tidak Ada Data
										</td>
									</tr>
									<?php } else {
									$no = 1;
									foreach ($dttdtindakan as $row) {
										echo "<tr><td align='right'>" . $no++ . ".</td>";
										echo "<td>" . tanggaldua($row->tanggal) . "</td>";
										echo "<td>" . $row->jam . "</td>";
										echo "<td>" . $row->tindakan . "</td>";
										echo "<td align='center'>" . $row->qty . "</td>";
										echo "<td>" . $row->nama_dokter . "</td>";
										// echo "<td align='center'>".$row->perawatsaja."</td>";
										if ($row->perawatsaja == 1) {
											echo "<td align='center'>PRW</td>";
										} else {
											echo "<td align='center'>x</td>";
										}
										if ($row->nonasuransi == 1) {
											echo "<td align='center'>UMUM</td>";
										} else {
											echo "<td align='center'>ASR</td>";
										}
										echo "<td align='right'>" . $row->diskon . "</td>";
									?>
										<td class="text-center">
											<button onclick="ubahtindakanedit(<?php echo $row->id; ?>)" class="btn btn-sm btn-info"><i class="far fa-edit"></i></button>
											<button onclick="hapusdatatindakan(this, <?php echo $row->id; ?>)" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i></button>
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
									<input type="time" id="tdwaktu" name="tdwaktu" class="form-control" id="time">
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
							<div class="form-group row col-spacing-row">
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
						<div class="col-md-6">
							<div class="form-group row col-spacing-row">
								<label class="col-md-3 col-form-label">Tindakan</label>
								<div class="col-md-9">
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
							</div>
							<div class="form-group row col-spacing-row">
								<label class="col-md-3 col-form-label">Biaya per Jasa</label>
								<div class="col-md-9">
									<input type="text" class="form-control" id="jasa" name="jasa" disabled>
								</div>
							</div>
							<div class="form-group row col-spacing-row">
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
							<div class="form-group row col-spacing-row">
								<label class="col-md-3 col-form-label">% Diskon</label>
								<div class="col-md-4">
									<input type="number" class="form-control" name="tddiskon" id="tddiskon" value="0">
								</div>
								<div class="col-md-5">
									<div class="custom-control custom-checkbox custom-control-inline">
										<input type="checkbox" class="custom-control-input" name="tdumum" id="tdumum" <?php if (trim($dtpasien->golongan) == "UMUM") {
																															echo "checked";
																														} ?>>
										<label class="custom-control-label" for="tdumum">Berlaku Umum</label>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-12 text-right">
							<button onclick="simpandatatindakan();" class="btn btn-primary">Simpan</button>
						</div>
					</div>
				</div>
				<div class="tab-pane fade" id="tab_2">
					<h6 class="mb-4">Bahan Habis Pakai / Obat</h6>
					<div class="table-responsive">
						<table class="table table-striped" id="tabelbhp">
							<thead>
								<tr>
									<th width="3%">No.</th>
									<th width='8%'>Tanggal</th>
									<th>Nama BHP</th>
									<th width="9%">Satuan Pakai</th>
									<th style="text-align:right" width="9%">Harga Satuan</th>
									<th style="text-align:right" width="5%">Qty</th>
									<th style="text-align:center" width="5%">UM/ASR</th>
									<th style="text-align:right" width="5%">Diskon</th>
									<th style="text-align:right" width="10%">Sub Total</th>
									<th style="text-align:right" width="8%">Keterangan</th>
									<th style="text-align:center" width='9%'>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
								if ($dttdbhp == NULL) {
								?>
									<tr>
										<td colspan="100%" class="text-center">
											Tidak Ada Data
										</td>
									</tr>
									<?php } else {
									$nob = 1;
									$dty = 0;
									$jml = 0;
									$qty = 0;
									foreach ($dttdbhp as $row) {
										if ($row->nonbill == 1) {
											$r = 0;
										} else {
											$r = ($row->qty * $row->hargapakai) - $row->diskon;
										}
										echo "<tr><td align='right'>" . $nob++ . ".</td>";
										echo "<td>" . tanggaldua($row->tanggal) . "</td>";
										echo "<td>" . $row->namaobat . "</td>";
										echo "<td>" . $row->satuanpakai . "</td>";
										echo "<td align='right'>" . groupangka($row->hargapakai) . "</td>";
										echo "<td align='right'>" . $row->qty . "</td>";
										if ($row->nonasuransi == 1) {
											echo "<td align='center'>UMUM</td>";
										} else {
											echo "<td align='center'>ASR</td>";
										}
										echo "<td align='right'>" . $row->diskon . "</td>";
										echo "<td align='right'>" . groupangka($r) . "</td>";
										if ($row->nonbill == 1) {
											echo "<td align='center'>Non Billing</td>";
										} else {
											echo "<td align='center'> </td>";
											$qty = $qty + $row->qty;
											$jml = $jml + $r;
										}
									?>
										<td class="text-center">
											<button onclick="ubahbhpedit(<?php echo $row->id; ?>)" class="btn btn-sm btn-info"><i class="far fa-edit"></i></a>
												<button onclick="hapusdatabhp(this, <?php echo $row->id; ?>)" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i></a>
										</td>
								<?php
										echo "</tr>";
									}
									echo "<tr>";
									echo "<td colspan='7'>Total</td>";
									// echo "<td>".$qty."</td>";
									// echo "<td colspan='2'></td>";
									echo "<td align='right' colspan='2'>" . groupangka($jml) . "</td>";
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
									<select class="form-control" style="width: 100%;" name="bhpbhp" id="bhpbhp" onchange="prosbhp()">
										<option value="">--pilihan--</option>
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
							<div class="form-group row col-spacing-row">
								<label class="col-md-3 col-form-label">Qty</label>
								<div class="col-md-4">
									<input type="number" class="form-control" name="bhpqty" id="bhpqty">
								</div>
								<div class="col-md-5">
									<div class="custom-control custom-checkbox custom-control-inline">
										<input type="checkbox" class="custom-control-input" name="bhpnonbilling" id="bhpnonbilling">
										<label class="custom-control-label" for="bhpnonbilling">BHP / Obat Non Billing</label>
									</div>
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
							<div class="form-group row col-spacing-row">
								<label class="col-md-3 col-form-label">% Diskon</label>
								<div class="col-md-4">
									<input type="number" class="form-control" name="bhpdiskon" id="bhpdiskon">
								</div>
								<div class="col-md-5">
									<div class="custom-control custom-checkbox custom-control-inline">
										<input type="checkbox" class="custom-control-input" name="bhpdumum" id="bhpdumum" <?php if (trim($dtpasien->golongan) == "UMUM") {
																																echo "checked";
																															} ?>>
										<label class="custom-control-label" for="bhpdumum">Berlaku Umum</label>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-12 text-right">
							<button onclick="simpandatabhp();" class="btn btn-primary">Simpan</button>
						</div>
					</div>
				</div>
				<div class="tab-pane fade" id="tab_3">
					<h6 class="mb-4">Pemakaian O2</h6>
					<div class="table-responsive">
						<table class="table  table-striped" id="tabelodua">
							<thead>
								<tr>
									<th width="4%">No.</th>
									<th style="text-align:center">Tanggal</th>
									<th style="text-align:center">Jam</th>
									<th style="text-align:right">Jumlah Liter</th>
									<th style="text-align:center">UM/ASR</th>
									<th style="text-align:right">Diskon</th>
									<th style="text-align:left">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
								if ($dttdodua == NULL) {
								?>
									<tr>
										<td colspan="100%" class="text-center">
											Tidak Ada Data
										</td>
									</tr>
									<?php } else {
									$noo = 1;
									foreach ($dttdodua as $row) {
										echo "<tr><td align='right'>" . $noo++ . ".</td>";
										echo "<td align='center'>" . tanggaldua($row->tgl_pakai) . "</td>";
										echo "<td align='center'>" . $row->jam . "</td>";
										echo "<td align='right'>" . $row->qty . "</td>";
										if ($row->nonasuransi == 1) {
											echo "<td align='center'>UMUM</td>";
										} else {
											echo "<td align='center'>ASR</td>";
										}
										echo "<td align='right'>" . $row->diskon . "</td>";
									?>
										<td class="text-left">
											<a onclick="ubahoduaedit(<?php echo $row->id; ?>)" class="btn-sm btn-info btn-flat"><i class="fa fa-edit"></i></a>
											<a onclick="hapusdataodua(this, <?php echo $row->id; ?>)" class="btn-sm btn-danger btn-flat"><i class="fa fa-trash"></i></a>
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
									<input type="text" class="form-control" name="ojam" id="ojam">
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
							<div class="form-group row col-spacing-row">
								<label class="col-md-3 col-form-label">% Diskon</label>
								<div class="col-md-4">
									<input type="number" class="form-control" name="odiskon" id="odiskon">
								</div>
								<div class="col-md-5">
									<div class="custom-control custom-checkbox custom-control-inline">
										<input type="checkbox" class="custom-control-input" name="oumum" id="oumum" <?php if (trim($dtpasien->golongan) == "UMUM") {
																														echo "checked";
																													} ?>>
										<label class="custom-control-label" for="oumum">Berlaku Umum</label>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-12 text-right">
							<button onclick="simpandataodua();" class="btn btn-primary">Simpan</button>
						</div>
					</div>
				</div>
				<div class="tab-pane fade" id="tab_4">
					<h6 class="mb-4">Visite Dokter</h6>
					<div class="table-responsive">
						<table class="table  table-striped" id="tabeldokter">
							<thead>
								<tr>
									<th width="5%">No.</th>
									<th>Tanggal</th>
									<th>Jam</th>
									<th>Dokter</th>
									<th>Type</th>
									<th style="text-align:center">UM/ASR</th>
									<th style="text-align:right">Diskon</th>
									<th style="text-align:center">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
								if ($dttdvisite == NULL) {
								?>
									<tr>
										<td colspan="100%" class="text-center">
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
										if ($row->nonasuransi == 1) {
											echo "<td align='center'>UMUM</td>";
										} else {
											echo "<td align='center'>ASR</td>";
										}
										echo "<td align='right'>" . $row->diskon . "</td>";
									?>
										<td class="text-center">
											<button onclick="ubahdokteredit(<?php echo $row->id; ?>)" class="btn btn-sm btn-info "><i class="far fa-edit"></i></button>
											<button onclick="hapusdataodokter(this, <?php echo $row->id; ?>)" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i></button>
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
									<input type="text" class="form-control" id="djam" name="djam">
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
								<label class="col-md-3 col-form-label">Type</label>
								<div class="col-md-9">
									<select class="form-control" style="width: 100%;" type="text" name="dvisit" id="dvisit">
										<option value="VISITE">VISITE</option>
										<option value="KONSUL SPESIALIS">KONSUL SPESIALIS</option>
										<option value="DOKTER UGD">DOKTER UGD</option>
										<option value="DOKTER UMUM">DOKTER UMUM</option>
										<option value="KONSUL CYTO-DOKTER IGD">KONSUL CYTO-DOKTER IGD</option>
										<option value="KONSUL SUB SPESIALIS">KONSUL SUB SPESIALIS</option>
									</select>
								</div>

							</div>
							<div class="form-group row col-spacing-row">
								<label class="col-md-3 col-form-label">% Diskon</label>
								<div class="col-md-4">
									<input type="number" class="form-control" name="drdiskon" id="drdiskon">
								</div>
								<div class="col-md-5">
									<div class="custom-control custom-checkbox custom-control-inline">
										<input type="checkbox" class="custom-control-input" name="drumum" id="drumum" <?php if (trim($dtpasien->golongan) == "UMUM") {
																															echo "checked";
																														} ?>>
										<label class="custom-control-label" for="drumum">Berlaku Umum</label>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-12 text-right">
							<button onclick="simpandtdokter();" class="btn btn-primary">Simpan</button>
						</div>
					</div>
				</div>
				<div class="tab-pane fade" id="tab_5">
					<h6 class="mb-4">Pemakaian Kantong Darah</h6>
					<div class="table-responsive">
						<table class="table table-striped" id="tabelkantung">
							<thead>
								<tr>
									<th width="4%">No.</th>
									<th style="text-align:center">Tanggal</th>
									<th style="text-align:right">Jumlah</th>
									<th style="text-align:center">Golongan Darah</th>
									<th style="text-align:center">UM/ASR</th>
									<th style="text-align:right">Diskon</th>
									<th style="text-align:left">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
								if ($dttddarah == NULL) {
								?>
									<tr>
										<td colspan="100%" class="text-center">
											Tidak Ada Data
										</td>
									</tr>
									<?php } else {
									$nok = 1;
									foreach ($dttddarah as $row) {
										echo "<tr><td align='right'>" . $nok++ . ".</td>";
										echo "<td align='center'>" . tanggaldua($row->tanggal) . "</td>";
										echo "<td align='right'>" . $row->qty . "</td>";
										echo "<td align='center'>" . $row->goldarah . "</td>";
										if ($row->nonasuransi == 1) {
											echo "<td align='center'>UMUM</td>";
										} else {
											echo "<td align='center'>ASR</td>";
										}
										echo "<td align='right'>" . $row->diskon . "</td>";

									?>
										<td class="text-left">
											<button onclick="ubahdarahedit(<?php echo $row->id; ?>)" class="btn btn-sm btn-info "><i class="far fa-edit"></i></button>
											<button onclick="hapusdatadarah(this, <?php echo $row->id; ?>)" class="btn btn-sm btn-danger "><i class="far fa-trash-alt"></i></button>
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
							<div class="form-group row col-spacing-row">
								<label class="col-md-3 col-form-label">% Diskon</label>
								<div class="col-md-4">
									<input type="number" class="form-control" name="drhdiskon" id="drhdiskon" value="<?php echo 0; ?>">
								</div>
								<div class="col-md-5">
									<div class="custom-control custom-checkbox custom-control-inline">
										<input type="checkbox" class="custom-control-input" name="drhdumum" id="drhdumum" <?php if (trim($dtpasien->golongan) == "UMUM") {
																																echo "checked";
																															} ?>>
										<label class="custom-control-label" for="drhdumum">Berlaku Umum</label>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-12 text-right">
							<button onclick="simpankantung();" class="btn btn-primary">Simpan</button>
						</div>
					</div>
				</div>
				<div class="tab-pane fade" id="tab_6">
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
										<option value="<?php echo 'KMBS' . "_" . '' . "_" . 'KAMAR BERSALIN'; ?>"><?php echo 'KAMAR BERSALIN'; ?></option>
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
									<th>Kembali</th>
									<th>Pulang</th>
								</tr>
							</thead>
							<tbody>
								<?php
								if ($dttdhistory == NULL) {
								?>
									<tr>
										<td colspan="8" class="text-center">
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
														echo '<a onclick="pasienkembali(this, ' . $row->id . ')" class="btn-sm btn-info btn-flat">Kembali</a>';
													}
												}
											}
											echo '</td>';
											echo '<td class="text-center">';
											if ($key == 0) {
												if ($pindah == 0) {
													echo '<button onclick="pasienpulang(this, ' . $row->id . ')" class="btn btn-sm btn-danger">Pulang</btn>';
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
				<div class="tab-pane fade" id="tab_7">
					<h6 class="mb-4">Kirim Ke Instalasi</h6>
					<div class="row ">
						<div class="col-md-6">
							<div class="form-group row col-spacing-row">
								<label class="col-md-3 col-form-label">Tanggal</label>
								<div class="col-md-9">
									<input type="text" class="form-control" name="instgl" id="instgl">
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
								<label class="col-md-3 col-form-label">Catatan Pemeriksaan</label>
								<div class="col-md-9">
									<textarea rows="3" name="icatatan" id="icatatan" class="form-control"></textarea>
								</div>
							</div>
						</div>
					</div>
					<div class="row  spacing-row">
						<div class="col-md-12 text-right">
							<button onclick="kirimisntalasi()" class="btn btn-primary">Simpan</button>
						</div>
					</div>
					<h6 class="mb-4">History</h6>
					<div class="table-responsive">
						<table class="table table-bordered table-striped" id="tabelinst">
							<thead>
								<tr>
									<th width='10%'>Tgl. Periksa</th>
									<th>Nama Unit</th>
									<th width="15%">Dokter Pengirim</th>
									<th width="15%">Dokter Pemeriksa</th>
									<th width="15%">Unit Rujuk</th>
									<th width="15%">No. Transaksi Instalasi</th>
									<th width="10%">Catatan</th>
									<th width="5%">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
								if ($dttdinst == NULL) {
								?>
									<tr>
										<td colspan="7" class="text-center">
											Tidak Ada Data
										</td>
									</tr>
									<?php } else {
									foreach ($dttdinst as $row) {
										echo "<tr><td>" . tanggalsatu($row->tanggal) . "</td>";
										echo "<td>" . $row->nama_unit . "</td>";
										echo "<td>" . $row->nama_dokter . "</td>";
										echo "<td>" . $row->nama_dokter_periksa . "</td>";
										echo "<td>" . $row->nama_unitR . "</td>";
										echo "<td>" . $row->notransaksi_IN . "</td>";
										echo "<td>" . $row->catatan . "</td>";
									?>
										<td class="text-center">
											<button onclick="hapusinst(this, <?php echo $row->id; ?>)" class="btn btn-sm btn-danger">Hapus</button>
										</td>
								<?php
										echo "</tr>";
									}
								} ?>
							</tbody>
						</table>
					</div>

				</div>
				<div class="tab-pane fade" id="tab_8">
					<h6 class="mb-4">Hasil Pemeriksaan Penunjang</h6>
					<div class="wizard-tab mt-2">
						<ul class="nav nav-tabs d-block d-sm-flex">
							<li class="nav-item mr-auto mb-4">
								<a class="nav-link p-0 active" data-toggle="tab" href="#hasillab">
									<div class="d-flex">
										<div class="media-body font-weight-bold align-self-center mb-3 mb-3">
											<!-- <h6 class="mb-0 text-uppercase font-weight-bold">Tindakan</h6> -->
											Laboratorium
										</div>
									</div>
								</a>
							</li>
							<li class="nav-item mr-auto mb-4">
								<a class="nav-link p-0" data-toggle="tab" href="#hasilrad">
									<div class="d-flex">
										<div class="media-body font-weight-bold align-self-center mb-3">
											<!-- <h6 class="mb-0 text-uppercase font-weight-bold">Pemakaian BHP / Obat</h6> -->
											Radiologi
										</div>
									</div>
								</a>
							</li>
							<li class="nav-item mr-auto mb-4 w-75">
							</li>
						</ul>
					</div>
					<div class="tab-content">
						<div class="tab-pane fade active show" id="hasillab">
							<span>Pemeriksaan Laboratorium Pasien selama mendapat pelayanan kesehatan</span>
							<div class="row mt-3">
								<div class="col-md-12">
									<table class="table table-bordered table-striped">
										<thead>
											<tr>
												<th width="3%">No.</th>
												<th width="7%">Tanggal</th>
												<th>Dokter Pemesan</th>
												<th width="25%">Dokter Pemeriksa</th>
												<th width="20%">Unit</th>
												<th width="13%">Pemeriksaan</th>
												<th width="3%">Hasil</th>

											</tr>
										</thead>
										<tbody>
											<?php
											if ($tindakanlab == NULL) {
											?>
												<tr>
													<td colspan="6" class="text-center">
														Tidak Ada Data
													</td>
												</tr>
												<?php } else {
												$no = 1;
												foreach ($tindakanlab as $row) {
													echo "<tr><td>" . $no++ . ".</td>";
													echo "<td>" . $row->tanggal . "</td>";
													echo "<td>" . $row->nama_dokter . "</td>";
													echo "<td>" . $row->nama_dokter_periksa . "</td>";
													echo "<td>" . $row->nama_unitR . "</td>";
													echo "<td>" . $row->nama_unit . "</td>";
												?>
													<td class="text-center">
														<button onclick="hasillab(this, <?php echo $row->id; ?>)" class="btn-sm btn-success btn">Hasil</button>
													</td>
											<?php
													echo "</tr>";
												}
											} ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="hasilrad">
							<span>Pemeriksaan Radiologi Pasien selama mendapat pelayanan kesehatan</span>
							<div class="row mt-3">
								<div class="col-md-12">
									<table class="table table-bordered table-striped">
										<thead>
											<tr>
												<th width="3%">No.</th>
												<th width="7%">Tanggal</th>
												<th>Dokter Pemesan</th>
												<th width="25%">Dokter Pemeriksa</th>
												<th width="20%">Unit</th>
												<th width="25%">Tindakan</th>
												<th width="3%">Hasil</th>

											</tr>
										</thead>
										<tbody>
											<?php
											if ($tindakanrad == NULL) {
											?>
												<tr>
													<td colspan="6" class="text-center">
														Tidak Ada Data
													</td>
												</tr>
												<?php } else {
												$no = 1;
												foreach ($tindakanrad as $row) {
													echo "<tr><td>" . $no++ . ".</td>";
													echo "<td>" . $row->tanggal . "</td>";
													echo "<td>" . $row->nama_dokter . "</td>";
													echo "<td>" . $row->nama_dokter_periksa . "</td>";
													echo "<td>" . $row->nama_unitR . "</td>";
													echo "<td>" . $row->tindakan . "</td>";
												?>
													<td class="text-center">
														<button onclick="hasilrad(this, <?php echo $row->id; ?>)" class="btn-sm btn-success btn">Hasil</button>
													</td>

											<?php
													echo "</tr>";
												}
											} ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="tab-pane fade" id="tab_9">
					<div class="row ">
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
										<td colspan="100%" class="text-center">
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
											<button onclick="hapusdataobat(this, <?php echo $row->idnoresep; ?>)" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i></button>
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
				<div class="tab-pane fade" id="tab_10">
					<h6 class="mb-4">Catatan Pemeriksaan</h6>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group row col-spacing-row">
								<label class="col-md-2 col-form-label">Subjek</label>
								<div class="col-md-10">
									<textarea rows="3" name="subjek" id="subjek" class="form-control"></textarea>
								</div>
							</div>
							<div class="form-group row col-spacing-row">
								<label class="col-md-2 col-form-label">Objek</label>
								<div class="col-md-10">
									<textarea rows="3" name="objek" id="objek" class="form-control"></textarea>
								</div>
							</div>
							<div class="form-group row col-spacing-row">
								<label class="col-md-2 col-form-label">Suhu(C)</label>
								<div class="col-md-2">
									<input type="text" class="form-control" name="suhu" id="suhu">
								</div>
								<label class="pl-0 col-md-2 col-form-label">Tinggi(Cm)</label>
								<div class="col-md-2">
									<input type="text" class="form-control" name="tinggi" id="tinggi">
								</div>
								<label class="col-md-2 col-form-label">Berat(Kg)</label>
								<div class="col-md-2">
									<input type="text" class="form-control" name="berat" id="berat">
								</div>
							</div>
							<div class="form-group row col-spacing-row">
								<label class="col-md-2 col-form-label">Tensi</label>
								<div class="col-md-2">
									<input type="text" class="form-control" name="tensi" id="tensi">
								</div>
								<label class="pl-0 col-md-2 col-form-label">Respirasi(/mnt)</label>
								<div class="col-md-2">
									<input type="text" class="form-control" name="respirasi" id="respirasi">
								</div>
								<label class="col-md-2 col-form-label">Nadi(/mnt)</label>
								<div class="col-md-2">
									<input type="text" class="form-control" name="nadi" id="nadi">
								</div>
							</div>
							<div class="form-group row col-spacing-row justify-content-between">
								<label class="col-md-2 col-form-label">SpO2(%)</label>
								<div class="col-md-4">
									<input type="text" class="form-control" name="spo2" id="spo2">
								</div>
								<label class="col-md-2 col-form-label">GCS(E,V,M)</label>
								<div class="col-md-4">
									<input type="text" class="form-control" name="gcs" id="gcs">
								</div>
							</div>
							<div class="form-group row col-spacing-row ">
								<label class="col-md-2 col-form-label">Kesadaran</label>
								<div class="col-md-10">
									<select class="form-control" style="width: 100%;" name="kesadaran" id="kesadaran">
										<option value="Compos Mentis">Compos Mentis</option>
										<option value="Apatis">Apatis</option>
										<option value="Delirium">Delirium</option>
										<option value="Somnolen">Somnolen</option>
										<option value="Sopor">Sopor</option>
										<option value="Semi Koma">Semi Koma</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group row col-spacing-row">
								<label class="col-md-3 col-form-label">Assesment</label>
								<div class="col-md-9">
									<textarea rows="3" name="assesment" id="assesment" class="form-control"></textarea>
								</div>
							</div>
							<div class="form-group row col-spacing-row">
								<label class="col-md-3 col-form-label">Plan</label>
								<div class="col-md-9">
									<textarea rows="3" name="plan" id="plan" class="form-control"></textarea>
								</div>
							</div>
							<div class="form-group row col-spacing-row">
								<label class="col-md-3 col-form-label">Instruksi</label>
								<div class="col-md-9">
									<textarea rows="3" name="instruksi" id="instruksi" class="form-control"></textarea>
								</div>
							</div>
							<div class="form-group row col-spacing-row">
								<label class="col-md-3 col-form-label">Evaluasi</label>
								<div class="col-md-9">
									<textarea rows="3" name="evaluasi" id="evaluasi" class="form-control"></textarea>
								</div>
							</div>
						</div>
						<div class="col-md-12 text-right">
							<button onclick="savesoap();" class="btn btn-primary">Simpan</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	var siteURL = "<?php echo site_url(); ?>";

	function prosbhp() {
		var tpp = $("#bhpbhp").val();
		$.ajax({
			url: "<?php echo site_url(); ?>/ugd/untukpilihanbihp",
			type: "GET",
			data: {
				bhp: tpp
			},
		}).then(function(data) {
			$("#bhpstauan").val('');
			$("#bhpharga").val('');
			var t = JSON.parse(data);
			$("#bhpstauan").val(t.satuanpakai);
			$("#bhpharga").val(t.hargapakai);
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


	var crkeluar = ""
	<?php
	foreach ($carakeluar as $row) {
	?>
		crkeluar = crkeluar + '<option value="<?php echo $row->carakeluar; ?>"><?php echo $row->carakeluar; ?></option>'
	<?php
	}
	?>
	var kdkeluar = ""
	<?php
	foreach ($kondisikeluar as $row) {
	?>
		kdkeluar = kdkeluar + '<option value="<?php echo $row->kondisi; ?>"><?php echo $row->kondisi; ?></option>'
	<?php
	}
	?>
	var kdkeluarrm = ""
	<?php
	foreach ($kondisikeluarrm as $row) {
	?>
		kdkeluarrm = kdkeluarrm + '<option value="<?php echo $row->kondisirm; ?>"><?php echo $row->kondisirm; ?></option>'
	<?php
	}
	?>
</script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/dist/js/ugd/v1/prosesigd.js"></script>