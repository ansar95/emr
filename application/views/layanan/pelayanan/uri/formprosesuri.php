<style>
	td {
		font-size: 12px;
	}
</style>
<div class="modal-dialog modal-xl" role="document">
	<div class="modal-content" >
		<div class="form-horizontal" id="kotakform">
			<div class="box box-default box-solid" id="proseskotak">
				<div class="modal-header">
					<h6 class="modal-title">Pelayanan Unit Rawat Inap</h6>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					
				</div>
				<div class="modal-body">
					<div class="box-body">
						<div class="row mb-1">
							<label for="inputEmail3" class="col-sm-2 control-label">No. RM</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="irm" id="irm" value="<?php echo $dtpasien->no_rm;?>" disabled>
							</div>

							<label for="inputEmail3" class="col-sm-2 control-label">Nama Pasien</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="inp" id="inp" value="<?php echo $dtpasien->nama_pasien;?>" disabled>
							</div>
						</div>
						
						<div class="row mb-1">
							<label for="inputEmail3" class="col-sm-2 control-label">No. Transaksi</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="pj" id="notrans" value="<?php echo $dtpasien->notransaksi;?>" disabled>
							</div>

							<label for="inputEmail3" class="col-sm-2 control-label">Nama Dokter</label>
							<div class="col-sm-4">
								<input type="text" name="sdhdokterkode" id="sdhdokterkode" value="<?php echo $dtpasien->kode_dokter;?>" hidden>
								<input type="text" class="form-control" name="sdhdokter" id="sdhdokter" value="<?php echo $dtpasien->nama_dokter;?>" disabled>
							</div>
						</div>

						<div class="row mb-1">
							<label for="inputEmail3" class="col-sm-2 control-label">Golongan</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="tdgolongan" id="tdgolongan" value="<?php echo $dtpasien->golongan;?>" disabled>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<div class="col-sm-12">

						<div class="wizard-tab mb-1 mt-4">
							<ul class="nav nav-tabs d-block d-sm-flex">
								<li class="nav-item mr-auto mb-4">
									<a class="nav-link p-0 active" data-toggle="tab" href="#tab_1">
										<div class="d-flex">
											<div class="media-body font-weight-bold align-self-center mb-1">
												<!-- <h6 class="mb-0 text-uppercase font-weight-bold">Tindakan</h6> -->
												Tindakan
											</div>
										</div>
									</a>
								</li>
								<li class="nav-item mr-auto mb-4">
									<a class="nav-link p-0" data-toggle="tab" href="#tab_2">
										<div class="d-flex">
											<div class="media-body font-weight-bold align-self-center mb-1">
												<!-- <h6 class="mb-0 text-uppercase font-weight-bold">Pemakaian BHP / Obat</h6> -->
												Pemakaian BHP / Obat
											</div>
										</div>
									</a>
								</li>
								<li class="nav-item mr-auto mb-4">
									<a class="nav-link p-0" data-toggle="tab" href="#tab_3">
										<div class="d-flex">
											<div class="media-body font-weight-bold align-self-center mb-1">
												<!-- <h6 class="mb-0 text-uppercase font-weight-bold">Pemakaian O2</h6> -->
												Pemakaian O2
											</div>
										</div>
									</a>
								</li>
								<li class="nav-item mr-auto mb-4">
									<a class="nav-link p-0" data-toggle="tab" href="#tab_4">
										<div class="d-flex">
											<div class="media-body font-weight-bold align-self-center mb-1">
												<!-- <h6 class="mb-0 text-uppercase font-weight-bold">Kantong Darah</h6> -->
												Kunjungan Dokter
											</div>
										</div>
									</a>
								</li>
								<li class="nav-item mr-auto mb-4">
									<a class="nav-link p-0" data-toggle="tab" href="#tab_5">
										<div class="d-flex">
											<div class="media-body font-weight-bold align-self-center mb-1">
												<!-- <h6 class="mb-0 text-uppercase font-weight-bold">Instalasi</h6> -->
												Kantong Darah
											</div>
										</div>
									</a>
								</li>
								<li class="nav-item mr-auto mb-4">
									<a class="nav-link p-0" data-toggle="tab" href="#tab_6">
										<div class="d-flex">
											<div class="media-body font-weight-bold align-self-center mb-1">
												<!-- <h6 class="mb-0 text-uppercase font-weight-bold">Instalasi</h6> -->
												Pindah Kamar
											</div>
										</div>
									</a>
								</li>
								<li class="nav-item mr-auto mb-4">
									<a class="nav-link p-0" data-toggle="tab" href="#tab_7">
										<div class="d-flex">
											<div class="media-body font-weight-bold align-self-center mb-1">
												<!-- <h6 class="mb-0 text-uppercase font-weight-bold">Instalasi</h6> -->
												Instalasi
											</div>
										</div>
									</a>
								</li>
								<li class="nav-item mr-auto mb-4">
									<a class="nav-link p-0" data-toggle="tab" href="#tab_8">
										<div class="d-flex">
											<div class="media-body font-weight-bold align-self-center mb-1">
												<!-- <h6 class="mb-0 text-uppercase font-weight-bold">Instalasi</h6> -->
												Konsul ke Poli
											</div>
										</div>
									</a>
								</li>
								<li class="nav-item mr-auto mb-4">
									<a class="nav-link p-0" data-toggle="tab" href="#tab_9">
										<div class="d-flex">
											<div class="media-body font-weight-bold align-self-center mb-1">
												<!-- <h6 class="mb-0 text-uppercase font-weight-bold">Instalasi</h6> -->
												Penunjang
											</div>
										</div>
									</a>
								</li>
								<li class="nav-item mr-auto mb-4">
									<a class="nav-link p-0" data-toggle="tab" href="#tab_10">
										<div class="d-flex">
											<div class="media-body font-weight-bold align-self-center mb-1">
												<!-- <h6 class="mb-0 text-uppercase font-weight-bold">Instalasi</h6> -->
												Resep
											</div>
										</div>
									</a>
								</li>
								<li class="nav-item mr-auto mb-4">
									<a class="nav-link p-0" data-toggle="tab" href="#tab_11">
										<div class="d-flex">
											<div class="media-body font-weight-bold align-self-center mb-1">
												<!-- <h6 class="mb-0 text-uppercase font-weight-bold">Instalasi</h6> -->
												Diagnosa
											</div>
										</div>
									</a>
								</li>
							</ul>
						</div>
						<hr class="border-top-hr my-2 bg-secondary"/>
						<div class="nav-tabs-custom">
								<div class="tab-content">
									<div class="tab-pane active" id="tab_1">
										<div class="row">
											<div class="col-md-12">
												<div class="col-dm-12" id="tdinfox"></div>
												<div class="box box-default">
													<div class="box-header with-border">
														<h6 class="box-title my-2 mb-4">Tindakan</h6>
													</div>
													<div class="box-body">
														<table class="table table-bordered table-striped" id="tabeltindakan">
															<thead>
																<tr>
																	<th width="3%">No.</th>
																	<th width='9%'>Tanggal</th>
																	<th width="5%">Jam</th>
																	<th>Tindakan</th>
																	<th style="text-align:center" width="5%">Jumlah</th>
																	<th width="20%">Dokter</th>
																	<th style="text-align:center" width="4%">PRW</th>
																	<th style="text-align:center" width="4%">UM/ASR</th>
																	<th style="text-align:right" width="4%">Diskon</th>
																	<th style="text-align:center" width='9%'>Action</th>
																</tr>
															</thead>
															<tbody>
																<?php 
																if($dttdtindakan == NULL) {
																	?>
																	<tr>
																		<td colspan="100%" class="text-center">
																			Tidak Ada Data
																		</td>
																	</tr>
																<?php } else { 
																	$no = 1;
																	foreach($dttdtindakan as $row) {
																		echo "<tr><td align='right'>".$no++.".</td>";
																		echo "<td>".tanggaldua($row->tanggal)."</td>";
																		echo "<td align='center'>".$row->jam."</td>";
																		echo "<td>".$row->tindakan."</td>";
																		echo "<td align='center'>".$row->qty."</td>";
																		echo "<td>".$row->nama_dokter."</td>";
																	// echo "<td align='center'>".$row->perawatsaja."</td>";
																		if ($row->perawatsaja==1){echo "<td align='center'>PRW</td>";} else {echo "<td align='center'>x</td>";} 
																		if ($row->nonasuransi==1){echo "<td align='center'>UMUM</td>";} else {echo "<td align='center'></td>";} 
																		echo "<td align='right'>".$row->diskon."</td>";
																		?>
																		<td class="text-center">
																			<button onclick="ubahtindakanedit(<?php echo $row->id; ?>)" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></button>
																			<button onclick="hapusdatatindakan(this, <?php echo $row->id; ?>)" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
																		</td>
																		<?php
																		echo "</tr>";
																	}} ?>
																</tbody>
															</table>
														</div>
													</div>

													<hr class="border-top-hr my-4 bg-primary"/>

												</div>
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
														<label for="inputEmail3" class="col-sm-3 col-form-label">Dokter</label>
														<div class="col-md-9">
															<select class="form-control" style="width: 100%;" name="tddokter" id="tddokter">
																<?php
																foreach($dtdokter as $row) {
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

										<!--bhp tab-->

										<div class="tab-pane" id="tab_2">
											<div class="row">
												<div class="col-md-12">
													<div class="col-dm-12" id="bhpinfox"></div>
													<div class="box box-default">
														<div class="box-header with-border mx-2 my-2">
															<h6 class="box-title mb-4">Bahan Habis Pakai</h6>
														</div>
														<div class="box-body">
															<table class="table table-bordered table-striped" id="tabelbhp">
																<thead>
																	<tr>
																		<th width="3%">No.</th>								
																		<th width='9%'>Tanggal</th>
																		<th>Nama BHP</th>
																		<th width="8%">Satuan Pakai</th>
																		<th style="text-align:right" width="8%">Harga Satuan</th>
																		<th style="text-align:right" width="8%">Qty</th>
																		<th style="text-align:center" width="5%">UM/ASR</th>
																		<th style="text-align:right" width="5%">Diskon</th>
																		<th style="text-align:right" width="10%">Sub Total</th>
																		<th style="text-align:right" width="8%">Keterangan</th>
																		<th style="text-align:center" width='9%'>Action</th>
																	</tr>
																</thead>
																<tbody>
																	<?php 
																	if($dttdbhp == NULL) {
																		?>
																		<tr>
																			<td colspan="10" class="text-center">
																				Tidak Ada Data
																			</td>
																		</tr>
																	<?php } else {
																		$nob = 1;
																		$dty = 0;
																		$jml = 0;
																		$qty = 0;
																		foreach($dttdbhp as $row) {
																			if ($row->nonbill==1) { $r = 0;} else {
																				$r = ($row->qty * $row->hargapakai) - $row->diskon;
																			}
                                                                        // $r = ($row->qty * $row->hargapakai) - $row->diskon;
																			echo "<tr><td align='right'>".$nob++.".</td>";
																			echo "<td>".tanggaldua($row->tanggal)."</td>";
																			echo "<td>".$row->namaobat."</td>";
																			echo "<td>".$row->satuanpakai."</td>";
																			echo "<td align='right'>".groupangka($row->hargapakai)."</td>";
																			echo "<td align='right'>".$row->qty."</td>";
																			if ($row->nonasuransi==1){echo "<td align='center'>UMUM</td>";} else {echo "<td align='center'></td>";}
																			echo "<td align='right'>".$row->diskon."</td>";
																			echo "<td align='right'>".groupangka($r)."</td>";
																			if ($row->nonbill==1){echo "<td align='center'>Non Billing</td>";} 
																			else {echo "<td align='center'> </td>";
																			$qty = $qty + $row->qty;
																			$jml = $jml + $r;
																		}
																		?>
																		<td class="text-center">
																			<button onclick="ubahbhpedit(<?php echo $row->id; ?>)" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></button>
																			<button onclick="hapusdatabhp(this, <?php echo $row->id; ?>)" class="btn btn-sm btn-danger "><i class="fa fa-trash"></i></button>
																		</td>
																		<?php
																		echo "</tr>";
																	}
																	echo "<tr>";
																	echo "<td colspan='7'>Total</td>";
                                                                    // echo "<td>".$qty."</td>";
                                                                    // echo "<td colspan='2'></td>";
																	echo "<td align='right' colspan='2'>".groupangka($jml)."</td>";
																	echo "</tr>";
																} ?>
															</tbody>
														</table>

														<hr class="border-top-hr my-4 bg-primary"/>
													</div>
												</div>
											</div>
										</div>
										
										<!-- start bhp tab form-->

										<div class="row" id="formbhp">
											<div class="col-md-6">
												<div class="form-group row col-spacing-row">
													<label class="col-md-3 col-form-label">Tanggal</label>
													<div class="col-md-3">
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
													<div class="col-md-3">
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
													<div class="col-md-5">
														<input type="text" class="form-control" name="bhpstauan" id="bhpstauan" disabled>
													</div>
												</div>
												<div class="form-group row col-spacing-row">
													<label class="col-md-3 col-form-label">Harga Satuan</label>
													<div class="col-md-5">
														<input type="text" class="form-control" name="bhpharga" id="bhpharga" disabled>
													</div>
												</div>
												<div class="form-group row col-spacing-row">
													<label class="col-md-3 col-form-label">% Diskon</label>
													<div class="col-md-3">
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
										<!-- end bhp tab form-->

									</div>
									<!-- end bhp tab -->

									<!-- start o2 tab -->
									<div class="tab-pane" id="tab_3">
										<div class="row">
											<div class="col-md-12">
												<div class="col-dm-12" id="oduainfox"></div>
												<div class="box box-default">
													<div class="box-header with-border">
														<h6 class="box-title mb-4">Pemakaian O2</h6>
													</div>
													<div class="box-body">
														<table class="table table-bordered table-striped" id="tabelodua">
															<thead>
																<tr>								
																	<tr>
																		<th width="4%">No.</th>
																		<th style="text-align:center" width="10%">Tanggal</th>
																		<th style="text-align:center" width="10%">Jam</th>
																		<th style="text-align:right" width="6%">Liter</th>
																		<th style="text-align:center" width="6%">UM/ASR</th>
																		<th style="text-align:right" width="6%"> Diskon</th>
																		<th style="text-align:left">Action</th>
																	</tr>
																</tr>
															</thead>
															<tbody>
																<?php 
																if($dttdodua == NULL) {
																	?>
																	<tr>
																		<td colspan="100%" class="text-center">
																			Tidak Ada Data
																		</td>
																	</tr>
																<?php } else { 
																	$noo = 1;
																	foreach($dttdodua as $row) {
																		echo "<tr><td align='right'>".$noo++.".</td>";
																		echo "<td align='center'>".tanggaldua($row->tgl_pakai)."</td>";
																		echo "<td align='center'>".$row->jam."</td>";
																		echo "<td align='right'>".$row->qty."</td>";
																		if ($row->nonasuransi==1){echo "<td align='center'>UMUM</td>";} else {echo "<td align='center'></td>";} 
																		echo "<td align='right'>".$row->diskon."</td>";
																		?>
																		<td class="text-left">
																			<button onclick="ubahoduaedit(<?php echo $row->id; ?>)" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></button>
																			<button onclick="hapusdataodua(this, <?php echo $row->id; ?>)" class="btn btn-sm btn-danger "><i class="fa fa-trash"></i></button>
																		</td>
																		<?php
																		echo "</tr>";
																	}} ?>
																</tbody>
															</table>
															<hr class="border-top-hr my-4 bg-primary"/>
														</div>
													</div>
												</div>
											</div>

											<!-- start bhp o2 form-->
											<div class="row" id="formodua">
												<div class="col-md-6">
													<div class="form-group row col-spacing-row">
														<label class="col-md-3 col-form-label">Tanggal</label>
														<div class="col-md-4">
															<input type="text" class="form-control" name="otgl" id="otgl">
														</div>
													</div>
													<div class="form-group row col-spacing-row">
														<label class="col-md-3 col-form-label">Jam</label>
														<div class="col-md-4">
															<input type="text" class="form-control" name="ojam" id="ojam">
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group row col-spacing-row">
														<label class="col-md-3 col-form-label">Jumlah</label>
														<div class="col-md-4">
															<input type="number" class="form-control" name="ojml" id="ojml">
														</div>
													</div>
													<div class="form-group row col-spacing-row">
														<label class="col-md-3 col-form-label">% Diskon</label>
														<div class="col-md-3">
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
											<!-- end o2 tab form-->
										</div>
										<!-- end o2 tab -->


										<div class="tab-pane" id="tab_4">
											<div class="row">
												<div class="col-md-12">
													<div class="col-dm-12" id="dinfox"></div>
													<div class="box box-default">
														<div class="box-header with-border">
															<h6 class="box-title">Visite Dokter</h6>
														</div>
														<div class="box-body">
															<table class="table table-bordered table-striped" id="tabeldokter">
																<thead>
																	<tr>								
																		<th width="3%">No.</th>								
																		<th width='10%'>Tanggal</th>
																		<th width="6%">Jam</th>
																		<th>Dokter</th>
																		<th width="20%">Type</th>
																		<th style="text-align:center" width="8%">UM/ASR</th>
																		<th style="text-align:right" width="5%">Diskon</th>
																		<th style="text-align:center" width='10%'>Action</th>
																	</tr>
																</thead>
																<tbody>
																	<?php 
																	if($dttdvisite == NULL) {
																		?>
																		<tr>
																			<td colspan="6" class="text-center">
																				Tidak Ada Data
																			</td>
																		</tr>
																	<?php } else { 
																		$nod = 1;
																		foreach($dttdvisite as $row) {
																			echo "<tr><td>".$nod++.".</td>";
																			echo "<td>".tanggaldua($row->tanggal)."</td>";
																			echo "<td>".$row->jam."</td>";
																			echo "<td>".$row->nama_dokter."</td>";
																			echo "<td>".$row->visite."</td>";
																			if ($row->nonasuransi==1){echo "<td align='center'>UMUM</td>";} else {echo "<td align='center'></td>";} 
																			echo "<td align='right'>".$row->diskon."</td>";
																			?>
																			<td class="text-center">
																				<button onclick="ubahdokteredit(<?php echo $row->id; ?>)" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></button>
																				<button onclick="hapusdatadokter(this, <?php echo $row->id; ?>)" class="btn btn-sm btn-danger "><i class="fa fa-trash"></i></button>
																			</td>
																			<?php
																			echo "</tr>";
																		}} ?>
																	</tbody>
																</table>
																<hr class="border-top-hr my-4 bg-primary"/>
														</div>
													</div>
												</div>
											</div>
											<div class="row" id="formdokter">
													<div class="col-md-6">
														<div class="box box-info">				
															<div class="box-body">
																<div class="form-group row col-spacing-row">
																	<label for="inputEmail3" class="col-sm-3 control-label">Tanggal</label>
																	<div class="col-sm-6">
																		<input type="text" class="form-control" name="dtgl" id="dtgl">
																	</div>
																</div>
																<div class="bootstrap-timepicker">
																	<div class="form-group row col-spacing-row">
																		<label for="inputEmail3" class="col-sm-3 control-label">Jam</label>
																		<div class="col-sm-6">
																			<input type="text" class="form-control" id="djam" name="djam">
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="box box-info">				
															<div class="box-body">
																<div class="form-group row col-spacing-row">
																	<label for="inputEmail3" class="col-sm-3 control-label">Dokter</label>
																	<div class="col-sm-9">
																		<select class="form-control" style="width: 100%;" name="ddokter" id="ddokter">
																			<?php
																			foreach($dtdokter as $row) {
																				?>
																				<option value="<?php echo $row->kode_dokter; ?>"><?php echo $row->nama_dokter; ?></option>
																				<?php
																			}
																			?>
																		</select>
																	</div>
																</div>
																<div class="form-group row col-spacing-row">
																	<label for="inputEmail3" class="col-sm-3 control-label">Type Kunjungan</label>
																	<div class="col-sm-5">
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
																	<label for="inputEmail3" class="col-sm-3 control-label">% Diskon</label>
																	<div class="col-sm-3">
																		<input type="number" class="form-control" name="drdiskon" id="drdiskon">
																	</div>
																	<div class="col-sm-4">
																		<div  class="custom-control custom-checkbox custom-control-inline">
																			<!-- <input type="checkbox" name="drumum" id="drumum"> Berlaku Umum -->
																		<input type="checkbox" name="drumum" id="drumum" class="custom-control-input"> 
																		<label class="custom-control-label" for="drumum">Berlaku Umum</label>
																		</div>
																		
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="col-md-12 text-right">
														<button onclick="simpandtdokter();" class="btn btn-primary pull-right">Simpan</button>
													</div>
											</div>
										</div>

											<!--start tab kantong darah-->
											<div class="tab-pane" id="tab_5">
												<div class="row">
													<div class="col-md-12">
														<div class="col-dm-12" id="kinfox"></div>
														<div class="box box-default">
															<div class="box-header with-border">
																<h6 class="box-title mb-4">Pemakaian Kantung Darah</h6>
															</div>
															<div class="box-body">
																<table class="table table-bordered table-striped" id="tabelkantung">
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
																		if($dttddarah == NULL) {
																			?>
																			<tr>
																				<td colspan="100%" class="text-center">
																					Tidak Ada Data
																				</td>
																			</tr>
																		<?php } else { 
																			$nok = 1;
																			foreach($dttddarah as $row) {
																				echo "<tr><td align='right'>".$nok++.".</td>";
																				echo "<td align='center'>".tanggaldua($row->tanggal)."</td>";
																				echo "<td align='right'>".$row->qty."</td>";
																				echo "<td align='center'>".$row->goldarah."</td>";
																				if ($row->nonasuransi==1){echo "<td align='center'>UMUM</td>";} else {echo "<td align='center'></td>";} 
																				echo "<td align='right'>".$row->diskon."</td>";
																				?>
																				<td class="text-left">
																					<button onclick="ubahdarahedit(<?php echo $row->id; ?>)" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></button>
																					<button onclick="hapusdatadarah(this, <?php echo $row->id; ?>)" class="btn btn-sm btn-danger "><i class="fa fa-trash"></i></button>
																				</td>
																				<?php
																				echo "</tr>";
																			}} ?>
																		</tbody>
																	</table>
																	<hr class="border-top-hr my-4 bg-primary"/>
																</div>
															</div>
														</div>
													</div>
													<!--start form kantong darah-->
													<div class="row" id="formdarah">
														<div class="col-md-6">
															<div class="form-group row col-spacing-row">
																<label class="col-md-3 col-form-label">Tanggal</label>
																<div class="col-md-4">
																	<input type="text" class="form-control" name="drtgl" id="drtgl">
																</div>
															</div>
															<div class="form-group row col-spacing-row">
																<label class="col-md-3 col-form-label">Jumlah Kantung</label>
																<div class="col-md-4">
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
													<!--end form kantong darah-->
												</div>
												<!--end tab kantong darah-->

												<div class="tab-pane" id="tab_6">
													<div class="row">
														<div class="col-md-12">
															<div class="box box-default">
																<div class="box-header with-border">
																	<h6 class="box-title mb-4">Pindah Kamar</h6>
																</div>
																<div class="box-body row col-spacing-row">
																	<div class="col-sm-2">
																		<div class="form-group row col-spacing-row">
																			<label for="pktgl" class="col-sm-4 col-form-label">Tanggal</label>
																			<div class="col-sm-8">
																				<input type="text" class="form-control" name="pktgl" id="pktgl">
																			</div>
																		</div>
																	</div>
																	<div class="col-sm-2">
																		<div class="bootstrap-timepicker">
																			<div class="form-group row col-spacing-row">
																				<label for="inputEmail3" class="col-sm-3 col-form-label">Jam</label>
																				<div class="col-sm-8">
																					<input type="text" class="form-control" name="pkjam" id="pkjam">
																				</div>
																			</div>
																		</div>
																	</div>
																	<div class="col-sm-6">
																		<div class="form-group row col-spacing-row">
																			<label for="inputEmail3" class="col-sm-4 col-form-label mb-1 text-right">Unit/Kelas Tujuan</label>
																			<div class="col-sm-8 mb-1">
																				<select class="form-control" style="width: 100%;" name="pkunit" id="pkunit">
																					<?php
																					foreach($dtunit as $row) {
																						?>
																						<option value="<?php echo $row->kode_unit. "_" .$row->kode_kelas. "_" .$row->nama_unit; ?>"><?php echo $row->nama_kelas; ?></option>
																						<?php
																					}
																					?>
																					<option value="<?php echo 'KMBS_KMBS_KAMAR BERSALIN'; ?>"><?php echo 'KAMAR BERSALIN'; ?></option>
																				</select>
																			</div>
																		</div>
																	</div>
																	<div class="col-sm-2">
																		<?php
																		if ($pindah == 0) {
																			?>
																			<button id="btnPindahSimpan" onclick="simpanpindah()" class="btn btn-sm btn-primary">Pindah Kamar</button>
																			<?php
																		} else {
																			?>
																			<button id="btnPindahSimpan" onclick="" class="btn btn-sm btn-primary" disabled>Pindah Kamar</button>
																			<?php
																		}
																		?>
																	</div>
																	<!-- <div class="col-sm-10 text-right">
																		<div class="form-group row col-spacing-row">
																			
																		</div>
																	</div> -->
																</div>
															</div>
														</div>
													</div>
													<hr class="border-top-hr my-4 bg-primary"/>
													<div class="row">
														<div class="col-md-12">
															<div class="box box-default">
																<div class="box-header with-border">
																	<h6 class="box-title mb-4">History</h6>
																</div>
																<div class="box-body">
																	<table class="table table-bordered table-striped" id="tabelhistory">
																		<thead>
																			<tr>								
																				<th width='10%'>Kode Unit</th>
																				<th>Nama Unit</th>
																				<th width="16%">Tgl. Masuk Kamar</th>
																				<th width="16%">Jam Masuk Kamar</th>
																				<th width="16%">Tgl. Keluar Kamar</th>
																				<th width="16%">Jam Keluar Kamar</th>
																				<!-- <th width="5%">Kembali</th> -->
																				<th width="6%">Pulang</th>
																			</tr>
																		</thead>
																		<tbody>
																			<?php 
																			if($dttdhistory == NULL) {
																				?>
																				<tr>
																					<td colspan="100%" class="text-center">
																						Tidak Ada Data
																					</td>
																				</tr>
																			<?php } else { foreach($dttdhistory as $key=>$row) {
																				echo "<tr><td>".$row->kode_unit."</td>";
																				echo "<td>".$row->nama_unit."</td>";
																				echo "<td>".tanggaldua($row->tgl_masuk_kamar)."</td>";
																				echo "<td>".$row->jam_masuk."</td>";
																				echo "<td>".tanggaldua($row->tgl_keluar_kamar)."</td>";
																				echo "<td>".$row->jam_keluar."</td>";
																				if ($row->status == "0") {
																					echo '<td class="text-center">';
																					if ($key == 0) {
																						if ($pindah == 0) {
																							echo '<button onclick="pasienpulang(this, '.$row->id.')" class="btn btn-danger btn-flat">Pulang</button>';
																						}
																					}
																					echo '</td>';
																				} else {
																					echo "<td></td>";
																				}
																				echo "</tr>";
																			}} ?>
																		</tbody>
																	</table>
																	
																</div>
															</div>
														</div>
													</div>
												</div>

												<!--start tab instalasi-->
												<div class="tab-pane" id="tab_7">
													<div class=" box box-header with-border">
														<h6 class="box-title mb-4">Pemeriksaan Instalasi</h6>
													</div>
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
																		foreach($dtkirimins as $row) {
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
													<hr class="border-top-hr my-4 bg-primary"/>
													<h6 class="mb-4">History</h6>
													<div class="table-responsive">
														<table class="table table-bordered table-striped" id="tabelinst">
															<thead>
																<tr>
																	<th width='6%'>Isi</th>
																	<th width='7%'>Tgl. Periksa</th>
																	<th>Nama Unit</th>
																	<th width="15%">Dokter Pengirim</th>
																	<th width="14%">Dokter Pemeriksa</th>
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
																				<button onclick="isitindakan(<?php echo $row->id; ?>)" class="btn-sm btn-info btn">Pemeriksaan</button>
																			</td>
																		<?php
																		} elseif ($row->kode_unit == 'RDLG' || $row->kode_unit == 'RDGL') {
																		?>
																			<td class="text-center">
																				<button onclick="isitindakanrad(<?php echo $row->id; ?>)" class="btn-sm btn-success btn">Pemeriksaan</button>
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
												<!--end tab instalasi-->

												<div class="tab-pane" id="tab_8">
													<div class="row">
														<div class="col-md-12">
															<div class="box box-default">
																<div class="box-header with-border">
																	<h6 class="box-title mb-4">Pemeriksaan ke Poliklinik</h6>
																</div>
																<div class="box-body row col-spacing-row">
																	<div class="col-sm-3">
																		<div class="form-group row col-spacing-row">
																			<label for="inputEmail3" class="col-sm-3 col-form-label">Tanggal</label>
																			<div class="col-sm-9">
																				<input type="text" class="form-control" name="pktglrujukan" id="pktglrujukan">
																			</div>
																		</div>
																	</div>
																	<div class="col-sm-3">
																		<div class="bootstrap-timepicker">
																			<div class="form-group row col-spacing-row">
																				<label for="inputEmail3" class="col-sm-3 col-form-label">Jam</label>
																				<div class="col-sm-9">
																					<input type="text" class="form-control" name="pkjamrujukan" id="pkjamrujukan">
																				</div>
																			</div>
																		</div>
																	</div>
																	<div class="col-sm-6">
																		<div class="form-group row col-spacing-row">
																			<label for="inputEmail3" class="col-sm-3 col-form-label text-right">Poli Tujuan</label>
																			<div class="col-sm-9">
																				<select class="form-control" style="width: 100%;" name="pkunitrujukan" id="pkunitrujukan">
																					<?php
																					foreach($dtunitrujukan as $row) {
																						?>
																						<option value="<?php echo $row->kode_unit. "_" .$row->nama_unit; ?>"><?php echo $row->nama_unit; ?></option>
																						<?php
																					}
																					?>
																				</select>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="row">
														<div class="col-md-12 text-right">
															<button id="btnPindahRujukan" onclick="simpanrujukan()" class="btn btn-primary pull-right">Simpan</button>
														</div>
													</div>
													<hr class="border-top-hr my-4 bg-primary"/>
													<div class="row">
														<div class="col-md-12">
															<div class="box box-default">
																<div class="box-header with-border">
																	<h6 class="box-title mb-4">History</h6>
																</div>
																<div class="box-body">
																	<table class="table table-bordered table-striped" id="tabelrujukan">
																		<thead>
																			<tr>
																				<th width='10%'>Kode Unit</th>
																				<th>Nama Unit</th>
																				<th width="15%">Tgl. Masuk Kamar</th>
																				<th width="15%">Jam Masuk Kamar</th>
																				<th width="15%">Tgl. Keluar Kamar</th>
																				<th width="15%">Jam Keluar Kamar</th>
																				<th width="5%">Hapus</th>
																			</tr>
																		</thead>
																		<tbody>
																			<?php
																			if($dttdhistoryrujukanpoly == NULL) {
																				?>
																				<tr>
																					<td colspan="7" class="text-center">
																						Tidak Ada Data
																					</td>
																				</tr>
																			<?php } else { foreach($dttdhistoryrujukanpoly as $row) {
																				echo "<tr><td>".$row->kode_unit."</td>";
																				echo "<td>".$row->nama_unit."</td>";
																				echo "<td>".tanggaldua($row->tgl_masuk_kamar)."</td>";
																				echo "<td>".$row->jam_masuk."</td>";
																				echo "<td>".tanggaldua($row->tgl_keluar_kamar)."</td>";
																				echo "<td>".$row->jam_keluar."</td>";
																				if ($row->status == "0") {
																					echo '<td class="text-center">';
																					echo '<button onclick="pasienrujukanhapus(this, '.$row->id.')" class="btn btn-sm btn-danger text-light">Hapus</button>';
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
													</div>
												</div>
											</div>
											<div class="tab-pane" id="tab_9">
												<h6 class="mb-4">Hasil Pemeriksaan Penunjang</h6>
												<div class="wizard-tab mt-2">
													<ul class="nav nav-tabs d-block d-sm-flex">
														<li class="nav-item mr-auto mb-4">
															<a class="nav-link p-0 active" data-toggle="tab" href="#hasillab">
																<div class="d-flex">
																	<div class="media-body font-weight-bold align-self-center mb-1">
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

											<div class="tab-pane" id="tab_10">
												<div class="row">
														<div class="col-md-12">
															<div class="col-dm-12" id="obatinfox"></div>
															<div class="box box-default" >
																<div class="box-header with-border">
																	<div class="col-md-12 row col-spacing-row">
																		<div class="col-md-6">
																			<h6 class="box-title">Daftar Resep</h6>
																		</div>
																		<div class="col-md-2 col-form-label text-right">	
																			No.Resep
																		</div>
																		<div class="col-md-2">	
																			<div class="form-group">
																				<input type="text" class="form-control" id="norep" name="norep"/>
																			</div>
																		</div>
																		<div class="col-md-2">	
																			<div class="form-group">
																				<!-- <button class="btn btn-sm btn-danger " id="hapusnoresep">Hapus </i></button> -->
																				<button onclick="hapusnoresep();" class="btn btn-sm btn-light">Resep Baru</button>
																			</div>
																		</div>
																	</div>

																</div>
																<div class="box-body">
																	<table class="table table-bordered table-striped" id="tabelobat">
																		<thead>
																			<tr>								
																				<th style="text-align:right" width="3%">No.</th>
																				<th width='9%'>No.Resep</th>
																				<th width='7%'>Tanggal</th>
																				<th width='23%'>Dokter</th>
																				<th >Nama Obat</th>
																				<th style="text-align:right" width="6%">Harga</th>
																				<th style="text-align:right" width="5%">Qty</th>
																				<th width="7%">Satuan</th>
																				<th width="15%">Dosis</th>
																				<th style="text-align:center" width='5%'>Action</th>
																			</tr>
																		</thead>
																		<tbody>
																			<?php 
																			if($dttdobat == NULL) {
																				?>
																				<tr>
																					<td colspan="12" class="text-center">
																						Tidak Ada Data
																					</td>
																				</tr>
																			<?php } else { 
																				$no = 1;
																				foreach($dttdobat as $row) {
																					echo "<tr><td align='right'>".$no++.".</td>";
																					echo "<td>".$row->noresep."</td>";
																					echo "<td>".$row->tglresep."</td>";
																					echo "<td>".$row->nama_dokter."</td>";
																					echo "<td>".$row->namaobat."</td>";
																					echo "<td align='right' >".groupangka($row->hargapakai)."</td>";
																					echo "<td align='right'>".$row->qty."</td>";
																					echo "<td>".$row->satuanpakai."</td>";
																					echo "<td>".$row->dosis."</td>";
																					?>
																					<td class="text-center">
																						<!-- <a onclick="ubahdataobat(<?php echo $row->idnoresep; ?>)" class="btn-sm btn-info btn-flat"><i class="fa fa-edit"></i></a> -->
																						<button onclick="hapusdataobat(this, <?php echo $row->idnoresep; ?>)" class="btn btn-sm btn-danger "><i class="fa fa-trash"></i></button>
																					</td>
																					<?php
																					echo "</tr>";
																				}} ?>
																			</tbody>
																		</table>
																		<hr class="border-top-hr my-4 bg-primary"/>
																	</div>
																</div>
															</div>
														</div>
														<div class="row" id="formobat">
															<div class="col-md-7">
																<div class="form-group row col-spacing-row">
																	<label for="inputEmail3" class="col-sm-2 col-form-label">Tanggal</label>
																	<div class="col-sm-3">
																		<input type="text" class="form-control" name="pktglobat" id="pktglobat">
																	</div>
																	<label for="inputEmail3" class="col-sm-1 col-form-label">Dokter</label>
																	<div class="col-sm-6">
																		<select class="form-control" style="width: 100%;" name="ddokterresep" id="ddokterresep">
																			<option value="">--pilih dokter--</option>
																			<?php
																			foreach($dtdokter as $row) {
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
																			<option value="puyer">Racikan Puyer</option>
																			<option value="salep">Racikan Salep</option>
																		</select>
																	</div>
																</div>
																<div class="form-group row col-spacing-row">
																	<label class="col-md-2 col-form-label">Qty</label>
																	<div class="col-md-3">
																		<input type="number" class="form-control" name="obatqty" id="obatqty">
																	</div>
																	<label class="col-md-1 col-form-label">Satuan</label>
																	<div class="col-md-2">
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
												<!-- end resep -->

											<!-- start diagnosa-->
									<div class="tab-pane" id="tab_11">
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
					</div>
				</div>
				<script type="text/javascript">
					var siteURL = "<?php echo site_url(); ?>";
					function prosbhp() {
						var tpp = $("#bhpbhp").val();
						$.ajax({
							url: "<?php echo site_url();?>/uri/untukpilihanbihp",
							type: "GET",
							data : {bhp: tpp},
						}).then(function (data) {
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
							url: "<?php echo site_url();?>/uri/untukpilihanbihp",
							type: "GET",
							data : {bhp: tpp},
						}).then(function (data) {
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

					function hapusnoresep() {
						$("#norep").val("");
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
					foreach($carakeluar as $row) {
						?>
						crkeluar = crkeluar + '<option value="<?php echo $row->carakeluar;?>"><?php echo $row->carakeluar;?></option>'
						<?php
					}
					?>
					var kdkeluar = ""
					<?php
					foreach($kondisikeluar as $row) {
						?>
						kdkeluar = kdkeluar + '<option value="<?php echo $row->kondisi;?>"><?php echo $row->kondisi;?></option>'
						<?php
					}
					?>
					var kdkeluarrm = ""
					<?php
					foreach($kondisikeluarrm as $row) {
						?>
						kdkeluarrm = kdkeluarrm + '<option value="<?php echo $row->kondisirm;?>"><?php echo $row->kondisirm;?></option>'
						<?php
					}
					?>

				</script>
				<script type="text/javascript" src="<?php echo base_url();?>assets/dist/js/uri/v1/prosesuri.js"></script>
