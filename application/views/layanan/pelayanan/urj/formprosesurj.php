<div class="modal-dialog modal-xl" role="document">
	<div class="modal-content">
		<!-- <div class="box box-default box-solid" id="proseskotak"> -->
		<div class="modal-header p-1 pl-3 align-text-bottom">
			<b class="modal-title" id="exampleModalLabel">Pelayanan Unit Rawat Jalan</b>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			<div class="row spacing-row">
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
							<input type="text" name="tddokterkode" id="tddokterkode" value="<?php echo $dtpasien->kode_dokter; ?>" hidden>
							<input type="text" class="form-control" name="tddokter" id="tddokter" value="<?php echo $dtpasien->nama_dokter; ?>" disabled>
						</div>
					</div>
					<div class="form-group row col-spacing-row">
						<label class="col-md-3 col-form-label">Tanggal Periksa</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="tglperiksa" id="tglperiksa" value="<?php echo $dtpasien->tgl_masuk; ?>" disabled>
						</div>
					</div>
				</div>
			</div>
			<div class="wizard-tab mb-1 mr-auto mt-5">
				<ul class="nav nav-tabs d-block d-sm-flex">
					<li class="nav-item mr-auto mb-4">
						<a class="nav-link p-0 active" data-toggle="tab" href="#tab_1">
							<div class="d-flex">
								<!-- <div class="media-body font-weight-bold align-self-center mb-1"> -->
								<div class="media-body font-weight-bold mr-auto mb-1 text-danger">
									TINDAKAN
								</div>
							</div>
						</a>
					</li>
					<li class="nav-item mr-auto mb-4">
						<a class="nav-link p-0" data-toggle="tab" href="#tab_2">
							<div class="d-flex">
								<!-- <div class="media-body font-weight-bold align-self-center mb-1"> -->
								<div class="media-body font-weight-bold mr-auto mb-1 text-primary">
									PEMAKAIAN BHP
								</div>
							</div>
						</a>
					</li>
					<li class="nav-item mr-auto mb-4">
						<a class="nav-link p-0" data-toggle="tab" href="#tab_3">
							<div class="d-flex">
								<!-- <div class="media-body font-weight-bold align-self-center mb-1"> -->
									<!-- <h6 class="mb-0 text-uppercase font-weight-bold">Pemakaian O2</h6> -->
								<div class="media-body font-weight-bold mr-auto mb-1 text-info">
									PEMAKAIAN O2
								</div>
							</div>
						</a>
					</li>
					<li class="nav-item mr-auto mb-4">
						<a class="nav-link p-0" data-toggle="tab" href="#tab_5">
							<div class="d-flex">
								<div class="media-body font-weight-bold mr-auto mb-1 text-dark">
									<!-- <h6 class="mb-0 text-uppercase font-weight-bold">Kantong Darah</h6> -->
									KANTONG DARAH
								</div>
							</div>
						</a>
					</li>
					<li class="nav-item mr-auto mb-4">
						<a class="nav-link p-0" data-toggle="tab" href="#tab_6">
							<div class="d-flex">
								<div class="media-body font-weight-bold mr-auto mb-1 text-danger">
									RUJUKAN POLI
								</div>
							</div>
						</a>
					</li>
					<li class="nav-item mr-auto mb-4">
						<a class="nav-link p-0" data-toggle="tab" href="#tab_7">
							<div class="d-flex">
								<div class="media-body font-weight-bold mr-auto mb-1 text-primary">
									INSTALASI
								</div>
							</div>
						</a>
					</li>
					<li class="nav-item mr-auto mb-4">
						<a class="nav-link p-0" data-toggle="tab" href="#tab_8">
							<div class="d-flex">
								<div class="media-body font-weight-bold mr-auto mb-1 text-info">
									<!-- <h6 class="mb-0 text-uppercase font-weight-bold">Instalasi</h6> -->
									PENUNJANG
								</div>
							</div>
						</a>
					</li>
					<li class="nav-item mr-auto mb-4">
						<a class="nav-link p-0" data-toggle="tab" href="#tab_9">
							<div class="d-flex">
								<div class="media-body font-weight-bold mr-auto mb-1 text-dark">
									<!-- <h6 class="mb-0 text-uppercase font-weight-bold">Instalasi</h6> -->
									e-RESEP
								</div>
							</div>
						</a>
					</li>
					<li class="nav-item mr-auto mb-4">
									<a class="nav-link p-0" data-toggle="tab" href="#tab_10">
										<div class="d-flex">
											<div class="media-body font-weight-bold align-self-center mb-1">
												<!-- <h6 class="mb-0 text-uppercase font-weight-bold">Instalasi</h6> -->
												DIAGNOSA
											</div>
										</div>
									</a>
					</li>
				</ul>
			</div>
			<div class="tab-content">
				<div class="tab-pane fade active show" id="tab_1">
					<h6 class="mb-4">Tindakan</h6>
					<div class="table-responsive">
						<table class="table table-striped" id="tabeltindakan">
							<thead>
								<tr>
									<th width="3%">No.</th>
									<th width='8%'>Tanggal</th>
									<th width="5%">Jam</th>
									<th>Tindakan</th>
									<th style="text-align:center" width="5%">Qty</th>
									<th width="22%">Dokter</th>
									<th style="text-align:center" width="4%">PRWT</th>
									<th style="text-align:center" width="4%">UM/ASR</th>
									<th style="text-align:center" width="4%">Tarip</th>
									<th style="text-align:right" width="4%">%Disk</th>
									<th style="text-align:right" width="4%">Jumlah</th>
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
									$jmlt = 0;
									foreach ($dttdtindakan as $row) {
										$rt = ($row->qty * $row->jasas) - ($row->qty * $row->jasas * $row->diskon / 100);
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
										if ($row->nonasuransi==1){echo "<td align='center'>UMUM</td>";} else {echo "<td align='center'></td>";}	
										echo "<td align='right'>".groupangka($row->jasas)."</td>";
										echo "<td align='right'>" . $row->diskon . "</td>";
										echo "<td align='right'>".groupangka($rt)."</td>";
										$jmlt = $jmlt + $rt;
									?>
										<td class="text-center">
											<button onclick="ubahtindakanedit(<?php echo $row->id; ?>)" class="btn btn-sm btn-info"><i class="far fa-edit"></i></button>
											<button onclick="hapusdatatindakan(this, <?php echo $row->id; ?>)" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i></button>
										</td>
								<?php
										echo "</tr>";
										echo "</tr>";
									}
									echo "<tr>";
									echo "<td colspan='10' align='right'>Total</td>";
									echo "<td colspan='1' align='right'>".groupangka($jmlt)."</td>";
									echo "</tr>";
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
								<label class="col-md-3 col-form-label">Tarip</label>
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
										<input type="checkbox" class="custom-control-input" name="tdumum" id="tdumum">
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
					<h6 class="mb-4">Bahan Habis Pakai</h6>
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
									<th style="text-align:right" width="5%">%Disk</th>
									<th style="text-align:right" width="10%">Sub Total</th>
									<th style="text-align:right" width="8%">Keterangan</th>
									<th style="text-align:center" width="5%">UM/ASR</th>
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
											$r = ($row->qty * $row->hargapakai) - ($row->qty * $row->hargapakai * $row->diskon / 100);
										}
										echo "<tr><td align='right'>" . $nob++ . ".</td>";
										echo "<td>" . tanggaldua($row->tanggal) . "</td>";
										echo "<td>" . $row->namaobat . "</td>";
										echo "<td>" . $row->satuanpakai . "</td>";
										echo "<td align='right'>" . groupangka($row->hargapakai) . "</td>";
										echo "<td align='right'>" . $row->qty . "</td>";
										echo "<td align='right'>" . $row->diskon . "</td>";
										echo "<td align='right'>" . groupangka($r) . "</td>";
										if ($row->nonbill == 1) {
											echo "<td align='center'>Non Billing</td>";
										} else {
											echo "<td align='center'> </td>";
											$qty = $qty + $row->qty;
											$jml = $jml + $r;
										}
										if ($row->nonasuransi==1){echo "<td align='center'>UMUM</td>";} else {echo "<td align='center'></td>";}

									?>
										<td class="text-center">
											<button onclick="ubahbhpedit(<?php echo $row->id; ?>)" class="btn btn-sm btn-info"><i class="far fa-edit"></i></a>
												<button onclick="hapusdatabhp(this, <?php echo $row->id; ?>)" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i></a>
										</td>
								<?php
										echo "</tr>";
									}
									echo "<tr>";
									echo "<td colspan='7' align='right'>Total</td>";
									echo "<td align='right' colspan='1'>" . groupangka($jml) . "</td>";
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
										<label class="custom-control-label" for="bhpnonbilling">BHP Non Billing</label>
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
										<input type="checkbox" class="custom-control-input" name="bhpdumum" id="bhpdumum">
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
									<th width="3%">No.</th>
									<th style="text-align:center" width="10%">Tanggal</th>
									<th style="text-align:center" width="5%">Jam</th>
									<th style="text-align:right" width="10%"> Jumlah Liter</th>
									<th style="text-align:right" width="10%">% Diskon</th>
									<th style="text-align:center" width="10%">UM/ASR</th>
									<th style="text-align:left ">Action</th>
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
										echo "<td align='right'>" . $row->diskon . "</td>";
										if ($row->nonasuransi==1){echo "<td align='center'>UMUM</td>";} else {echo "<td align='center'></td>";}
									?>
										<td class="text-left">
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
										<input type="checkbox" class="custom-control-input" name="oumum" id="oumum">
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
				<div class="tab-pane fade" id="tab_5">
					<h6 class="mb-4">Pemakaian Kantong Darah</h6>
					<div class="table-responsive">
						<table class="table table-striped" id="tabelkantung">
							<thead>
								<tr>
									<th width="3%">No.</th>
									<th style="text-align:center" width="10%">Tanggal</th>
									<th style="text-align:right" width="6%">Jumlah</th>
									<th style="text-align:center" width="10%">Gol.</th>
									<th style="text-align:right" width="7%">%Diskon</th>
									<th style="text-align:center" width="10%">UM/ASR</th>
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
										echo "<td align='right'>" . $row->diskon . "</td>";
										if ($row->nonasuransi==1){echo "<td align='center'>UMUM</td>";} else {echo "<td align='center'></td>";}
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
										<input type="checkbox" class="custom-control-input" name="drhdumum" id="drhdumum">
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
					<h6 class="mb-4">Rujukan ke Poli</h6>
					<div class="row spacing-row">
						<div class="col-md-3">
							<div class="row form-group">
								<label class="col-md-4 col-form-label">Tanggal</label>
								<div class="col-md-8">
									<input type="text" class="form-control" name="pktgl" id="pktgl">
								</div>
							</div>
						</div>
						<div class="col-md-2">
							<div class="row form-group">
								<label class="col-md-4 col-form-label">Jam</label>
								<div class="col-md-8">
									<input type="text" class="form-control" name="pkjam" id="pkjam">
								</div>
							</div>
						</div>
						<div class="col-md-5">
							<div class="row form-group">
								<label class="col-md-4 col-form-label text-right">Unit Tujuan</label>
								<div class="col-md-8">
									<select class="form-control" style="width: 100%;" name="pkunit" id="pkunit">
										<option value="">--pilih poli--</option>
										<?php
										foreach ($dtunit as $row) {
										?>
											<option value="<?php echo $row->kode_unit . "_" . $row->nama_unit; ?>"><?php echo $row->nama_unit; ?></option>
										<?php
										}
										?>
									</select>
								</div>
							</div>
						</div>
						<div class="col-md-2 text-right">
							<?php
							if ($dtpasien->status == 0) {
								if ($dtpasien->inap_to_poli == 1) {
									echo '<button onclick="pesandarirujukinap()" class="btn btn-sm btn-primary ">Kirim ke Poli Lainnya</button>';
								} else {
									echo '<button onclick="simpanpindah()" class="btn btn-sm btn-primary">Kirim ke Poli Lainnya</button>';
								}
							} else {
								if ($dtpasien->kode_unitnya == 'U0025') {
									echo '<button onclick="simpanpindah()" class="btn btn-sm btn-primary">Kirim ke Poli Lainnya</button>';
								}
							}	
							?>
						</div>
					</div>

					<h6 class="mb-4 mt-4">History</h6>
					<div class="table-responsive">
						<table class="table table-bordered table-striped" id="tabelhistory">
							<thead>
								<tr>
									<th width='10%'>Kode Unit</th>
									<th>Nama Unit</th>
									<th width="10%">Tgl. Periksa</th>
									<th width="8%">Jam Periksa </th>
									<th width="10%">Tgl. Selesai</th>
									<th width="8%">Jam Selesai</th>
									<th style="text-align:center" width="15%">Selesai</th>
								</tr>
							</thead>
							<tbody>
								<?php
								if ($dttdhistory == NULL) {
								?>
									<tr>
										<td colspan="7" class="text-center">
											Tidak Ada Data
										</td>
									</tr>
								<?php } else {
									foreach ($dttdhistory as $key => $row) {
										echo "<tr><td>" . $row->id . "</td>";
										// echo "<tr><td>" . $row->kode_unit . "</td>";
										echo "<td>" . $row->nama_unit . "</td>";
										echo "<td>" . tanggaldua($row->tgl_masuk_kamar) . "</td>";
										echo "<td>" . $row->jam_masuk . "</td>";
										echo "<td>" . tanggaldua($row->tgl_keluar_kamar) . "</td>";
										echo "<td>" . $row->jam_keluar . "</td>";
										if ($row->status == "0") {
											echo '<td class="text-center">';
											if ($key == 0) {
												if ($pindah == 0) {
													if ($inap_to_poli == 0) {
														echo '<button onclick="pasienpulang(this, ' . $row->id . ')" class="btn btn-small btn-danger">Pasien Pulang</button>';
													}
												}
											}
											echo '</td>';
										} else {
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
					<h6 class="mb-4">Pemeriksaan Ke Instalasi</h6>
					<div class="row ">
						<div class="col-md-6">
							<div class="form-group row col-spacing-row">
								<label class="col-md-3 col-form-label">Tanggal</label>
								<div class="col-md-9">
									<input type="text" class="form-control" name="instgl" id="instgl">
								</div>
							</div>
							<div class="form-group row col-spacing-row">
								<label class="col-md-3 col-form-label">Unit Tujuan</label>
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
						<div class="col-md-6">
							<div class="form-group row col-spacing-row">
								<label class="col-md-3 col-form-label">Catatan Pemeriksaan</label>
								<div class="col-md-9">
									<textarea rows="3" name="icatatan" id="icatatan" class="form-control"></textarea>
								</div>
							</div>
						</div>
					</div>
					<div class="row spacing-row">
						<div class="col-md-12 text-right">
							<button onclick="kirimisntalasi()" class="btn btn-primary">Simpan</button>
						</div>
					</div>
					<h6 class="mb-4">History</h6>
					<div class="table-responsive">
						<table class="table table-bordered table-striped" id="tabelinst">
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
										echo "<tr>";
										if ($row->kode_unit == 'LABS') {
									?>
											<td class="text-center">
												<button onclick="isitindakan(<?php echo $row->id; ?>)" class="btn-sm btn-info btn">Tindakan</button>
											</td>
										<?php
										} elseif ($row->kode_unit == 'RDLG') {
										?>
											<td class="text-center">
												<button onclick="isitindakanrad(<?php echo $row->id; ?>)" class="btn-sm btn-success btn">Tindakan</button>
											</td>
										<?php
										} else {
										?>
											<td class="text-center">
											</td>
										<?php
										}
										echo "<td>" . $row->tanggal . "</td>";
										echo "<td>" . $row->nama_unit . "</td>";
										echo "<td>" . $row->nama_dokter . "</td>";
										echo "<td>" . $row->nama_dokter_periksa . "</td>";
										echo "<td>" . $row->nama_unitR . "</td>";
										echo "<td>" . $row->notransaksi_IN . "</td>";
										echo "<td>" . $row->catatan . "</td>";
										?>
										<td class="text-center">
											<button onclick="hapusinst(this, <?php echo $row->id; ?>)" class="btn-sm btn-danger btn">Hapus</button>
										</td>
								<?php
										echo "</tr>";
									}
								} ?>
							</tbody>
						</table>
					</div>
					<div class="modal" id="myModal2" data-backdrop="static">
					</div>
				</div>
				<div class="tab-pane fade" id="tab_8">
					<!-- START: Card Data-->
					<h6 class="mb-4">Hasil Pemeriksaan Penunjang</h6>
					<div class="wizard-tab mt-2">
						<ul class="nav nav-tabs d-block d-sm-flex">
							<li class="nav-item mr-auto mb-4">
								<a class="nav-link p-0 active" data-toggle="tab" href="#hasillab">
									<div class="d-flex">
										<div class="media-body font-weight-bold align-self-center mb-1 text-primary">
											<!-- <h6 class="mb-0 text-uppercase font-weight-bold">Tindakan</h6> -->
											Laboratorium
										</div>
									</div>
								</a>
							</li>
							<li class="nav-item mr-auto mb-4">
								<a class="nav-link p-0" data-toggle="tab" href="#hasilrad">
									<div class="d-flex">
										<div class="media-body font-weight-bold align-self-center mb-1">
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
					<div class="row spacing-row">

						<div class="col-md-6">
							<h6 class="mb-4">Resep</h6>
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
										echo "<td>" . $row->namaobat . "</td>";
										echo "<td align='right' >" . $row->hargapakai . "</td>";
										echo "<td align='right'>" . $row->qty . "</td>";
										echo "<td>" . $row->satuanpakai . "</td>";
										echo "<td>" . $row->dosis . "</td>";
										echo "<td>" . $row->catatanresep . "</td>";
									?>
										<td class="text-center">
											<!-- <a onclick="ubahdataobat(<?php echo $row->idnoresep; ?>)" class="btn-sm btn-info btn-flat"><i class="fa fa-edit"></i></a> -->
											<button onclick="hapusdataobat(this, <?php echo $row->idnoresep; ?>)" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
										</td>
								<?php
										echo "</tr>";
									}
								} ?>
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
				</div>
				<div class="tab-pane" id="tab_10">
										<div class="row">
											<div class="col-md-12">
												<div class="col-dm-12" id="oduainfox"></div>
												<div class="box box-default">
													<div class="box-header with-border">
														<h6 class="box-title mb-4">Diagnosa</h6>
													</div>
													<div class="box-body">
														<table class="table table-bordered table-striped" id="tabeldiag">
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
															<tbody>
																<?php
																if ($diagdata == null) {
																?>
																	<tr>
																		<td colspan="6" class="text-center">
																			Tidak Ada Data
																		</td>
																	</tr>
																	<?php
																} else {
																	foreach ($diagdata as $key => $row) {
																		echo "<tr><td>" . ++$key . "</td>";
																		echo "<td>" . $row->icdlatin . "</td>";
																		echo "<td>" . $row->diagnosa . "</td>";
																		echo "<td>" . $row->nodaftar . "</td>";
																		echo "<td>" . $row->nodtd . "</td>";
																		if ($row->type == 1) {
																			echo "<td>" . "Utama" . "</td>";
																		} else {
																			echo "<td>" . "Sekunder" . "</td>";
																		}
																	?>
																		<td class="text-center">
																			<!-- <a onclick="formeditdiagnosa(<?php echo $row->id; ?>);" class="btn-sm btn-info btn-flat"><i class="fa fa-edit"></i></a> -->
																			<a onclick="hapusdiagnosa(<?php echo $row->id; ?>);" class="btn-sm btn-danger btn-flat"><i class="fa fa-trash"></i></a>
																		</td>
																<?php
																		echo "</tr>";
																	}
																}
																?>
															</tbody>
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
										</div>
										<!-- end diagnosa tab -->

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
			url: "<?php echo site_url(); ?>/urj/untukpilihanbihp",
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

	var siteURL = "<?php echo site_url(); ?>";

	function prosbhp1() {
		var tpp = $("#obatobat").val();
		$.ajax({
			url: "<?php echo site_url(); ?>/urj/untukpilihanbihp",
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


	//kebutuhan tindakan laboratorium

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
				console.log(ajaxData);

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
				console.log(ajaxData);
				$("#myModal2").html(ajaxData);
				$("#myModal2").modal('show', {
					backdrop: 'true'
				});
			}
		});
	}

	function tampilkandiag(stat = 0) {
						loadproses()
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
								loadhapus()
							},
							error: function(ajaxData) {
								loadhapus();
							}
						});
					}

	function simpandiag() {
	var irm = document.getElementById("irm").value;
	var inp = document.getElementById("inp").value;
	var notrans = document.getElementById("notrans").value;
	var latin = document.getElementById("latin").value;
	var dtd = document.getElementById("dtd").value;

	var diag = $("#diag").val();
	var utama = $("#diagutama").prop('checked');
	if (diag == "") {
		$.notify("Data belum lengkap", "error");
		return;
	}
	loadproses()
	$.ajax({
		url: "<?php echo site_url(); ?>/uri/prosessimpandiagnosa",
		type: "GET",
		data: {
			irm: irm,
			inp: inp,
			notrans: notrans,
			diag: diag,
			utama: utama,
			latin : latin,
			dtd : dtd

		},
		success: function(ajaxData) {
			var dt = JSON.parse(ajaxData);
			if (dt.stat == true) {
				$("#tabeldiag tbody tr").remove();
				$("#tabeldiag tbody").append(dt.dtview);
				$("#formdiagnosa").html(dt.dtform);
				$.notify("Berhasil Menginput Data", "success");
			} else {
				$.notify("Gagal Memproses Data", "error");
			}
			loadhapus()
		},
		error: function(ajaxData) {
			loadhapus();
			$.notify("Gagal Memproses Data", "error");
		}
	});
}

function hapusdiagnosa(id) {
	$.confirm({
		title: 'Hapus Diagnosa?',
		buttons: {
			hapus: {
				text: 'Hapus',
				btnClass: 'btn-red',
				keys: ['enter', 'shift'],
				action: function() {
					var notrans = document.getElementById("notrans").value;
					loadproses();
					$.ajax({
						url: "<?php echo site_url(); ?>/uri/proseshapusdiagnosa",
						type: "GET",
						data: {
							id: id,
							notrans: notrans
						},
						success: function(ajaxData) {
							var dt = JSON.parse(ajaxData);
							console.log(dt);
							if (dt.stat == true) {
								loadhapus()
								$("#tabeldiag tbody tr").remove();
								$("#tabeldiag tbody").append(dt.dtview);
								$.notify("Berhasil Menghapus Data", "success");
							} else {
								$.notify("Data tidak dapat dihapus", "error");
								loadhapus();
							}
						},
						error: function(data) {
							$.notify("Gagal Memproses Data", "error");
							loadhapus();
						}
					});
				}
			},
			batal: {
				text: 'Batal',
				action: function() {}
			}
		}
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
<script type="text/javascript" src="<?php echo base_url(); ?>assets/dist/js/urj/v1/prosesurj.js"></script>