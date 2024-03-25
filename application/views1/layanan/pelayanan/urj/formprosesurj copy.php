<div class="modal-dialog" style="width:1200px;" >
	<div class="modal-content" >
		<div class="form-horizontal" id="kotakform">
			<div class="box box-default box-solid" id="proseskotak">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title">Pelayanan Unit Rawat Jalan</h4>
				</div>
				<div class="modal-body"> 
					<div class="box-body">
						<div class="col-sm-6">
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-3 control-label">No. RM</label>
								<div class="col-sm-3">
									<input type="text" class="form-control" name="irm" id="irm" value="<?php echo $dtpasien->no_rm;?>" disabled>
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-3 control-label">Nama Pasien</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="inp" id="inp" value="<?php echo $dtpasien->nama_pasien;?>" disabled>
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-3 control-label">No. Transaksi</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" name="pj" id="notrans" value="<?php echo $dtpasien->notransaksi;?>" disabled>
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-3 control-label">Nama Dokter</label>
								<div class="col-sm-9">
									<input type="text" name="tddokterkode" id="tddokterkode" value="<?php echo $dtpasien->kode_dokter;?>" hidden>
									<input type="text" class="form-control" name="tddokter" id="tddokter" value="<?php echo $dtpasien->nama_dokter;?>" disabled>
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-3 control-label">Golongan</label>
								<div class="col-sm-3">
									<input type="text" class="form-control" name="tdgolongan" id="tdgolongan" value="<?php echo $dtpasien->golongan;?>" disabled>
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-3 control-label">Tanggal Periksa</label>
								<div class="col-sm-3">
									<input type="text" class="form-control" name="tglperiksa" id="tglperiksa" value="<?php echo $dtpasien->tgl_masuk;?>" disabled>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<div class="row text-left">
						<div class="col-sm-12">
							<div class="nav-tabs-custom">
								<ul class="nav nav-tabs">
									<li class="active"><a href="#tab_1" data-toggle="tab">Tindakan</a></li>
									<li><a href="#tab_2" data-toggle="tab">Pemakaian BHP / Obat</a></li>
									<li><a href="#tab_3" data-toggle="tab">Pemakaian O2</a></li>
									<li><a href="#tab_4" data-toggle="tab">Kantong Darah</a></li>
									<li><a href="#tab_5" data-toggle="tab">Rujukan Poli</a></li>
									<li><a href="#tab_6" data-toggle="tab">Instalasi</a></li>
                                    <li><a href="#tab_7" data-toggle="tab">Penunjang</a></li>
									<li><a href="#tab_8" data-toggle="tab">Resep</a></li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane active" id="tab_1">
										<div class="row">
											<div class="col-md-12">
												<div class="col-dm-12" id="tdinfox"></div>
												<div class="box box-default">
													<div class="box-header with-border">
														<h3 class="box-title">Tindakan</h3>
													</div>
													<div class="box-body">
														<table class="table table-bordered table-striped" id="tabeltindakan">
															<thead>
																<tr>								
																	<th width="3%">No.</th>
																	<th width='8%'>Tanggal</th>
																	<th width="5%">Jam</th>
																	<th >Tindakan</th>
																	<th style="text-align:right" width="5%">QTY</th>
																	<th width="22%">Dokter</th>
																	<th style="text-align:center"width="4%">PRW</th>
																	<th width="4%">UM/ASR</th>
																	<th style="text-align:right" width="4%">Diskon</th>
																	<th style="text-align:center" width='8%'>Action</th>
																</tr>
															</thead>
															<tbody>
																<?php 
																if($dttdtindakan == NULL) {
																?>
																<tr>
																	<td colspan="12" class="text-center">
																		Tidak Ada Data
																	</td>
																</tr>
																<?php } else { 
																	$no = 1;
																	foreach($dttdtindakan as $row) {
																	echo "<tr><td align='right'>".$no++.".</td>";
																	echo "<td>".tanggaldua($row->tanggal)."</td>";
																	echo "<td>".$row->jam."</td>";
																	echo "<td>".$row->tindakan."</td>";
																	echo "<td align='right'>".$row->qty."</td>";
																	echo "<td>".$row->nama_dokter."</td>";
																	// echo "<td align='center'>".$row->perawatsaja."</td>";
																	if ($row->perawatsaja==1){echo "<td align='center'>PRW</td>";} else {echo "<td align='center'>x</td>";} 
																	//echo "<td>".$row->nonasuransi."</td>";
																	if ($row->nonasuransi==1){echo "<td align='center'>UMUM</td>";} else {echo "<td align='center'>ASR</td>";} 
																	echo "<td align='right'>".$row->diskon."</td>";
																	
																?>
																<td class="text-center">
																	<a onclick="
																	(<?php echo $row->id; ?>)" class="btn-sm btn-info btn-flat"><i class="fa fa-edit"></i></a>
																	<a onclick="hapusdatatindakan(this, <?php echo $row->id; ?>)" class="btn-sm btn-danger btn-flat"><i class="fa fa-trash"></i></a>
																</td>
																<?php
																	echo "</tr>";
																}} ?>
															</tbody>
														</table>
													</div>
												</div>
											</div>
										</div>
										<div class="row" id="formtindakan">
											<div class="col-md-6">
												<div class="box box-info">				
													<div class="box-body">
														<div class="form-group">
															<label for="inputEmail3" class="col-sm-3 control-label">Tanggal</label>
															<div class="col-sm-3">
																<input type="text" class="form-control" name="tdtgl" id="tdtgl">
															</div>
														</div>
														<div class="bootstrap-timepicker">
															<div class="form-group">
																<label for="inputEmail3" class="col-sm-3 control-label">Jam</label>
																<div class="col-sm-3">
																	<input type="text" class="form-control" id="tdwaktu" name="tdwaktu">
																</div>
															</div>
														</div>
														<div class="form-group">
                                                            <label for="inputEmail3" class="col-sm-3 control-label">Pelaksana 1</label>
                                                            <div class="col-sm-9">
                                                                <select class="form-control" style="width: 100%;" type="text" name="pel1" id="pel1">
                                                                    <option value="">--pilih pelaksana--</option>
                                                                    <?php
                                                                    foreach($dtperawat as $row) {
                                                                        ?>
                                                                        <option value="<?php echo $row->kode_dokter; ?>"><?php echo $row->nama_dokter; ?></option>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
														<div class="form-group">
                                                            <label for="inputEmail3" class="col-sm-3 control-label">Pelaksana 2</label>
                                                            <div class="col-sm-9">
                                                                <select class="form-control" style="width: 100%;" type="text" name="pel2" id="pel2">
                                                                    <option value="">--pilih pelaksana--</option>
                                                                    <?php
                                                                    foreach($dtperawat as $row) {
                                                                        ?>
                                                                        <option value="<?php echo $row->kode_dokter; ?>"><?php echo $row->nama_dokter; ?></option>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="box box-info">				
													<div class="box-body">
														<div class="form-group">
                                                            <label for="inputEmail3" class="col-sm-3 control-label">Tindakan</label>
                                                            <div class="col-sm-9">
                                                                <select class="form-control" style="width: 100%;" type="text" name="tdtindakan" id="tdtindakan" onchange="tdtindakan()">
                                                                    <option value="">--pilih tindakan--</option>
                                                                    <?php
                                                                    foreach($dttindakan as $row) {
                                                                        ?>
                                                                        <option value="<?php echo $row->kode_tindakan; ?>"><?php echo $row->tindakan; ?></option>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputEmail3" class="col-sm-3 control-label">Biaya per Jasa</label>
                                                            <div class="col-sm-3">
                                                                <input type="text" class="form-control" id="jasa" name="jasa" value="0" disabled>
                                                            </div>
                                                        </div>
														<div class="form-group">
															<label for="inputEmail3" class="col-sm-3 control-label">Jumlah </label>
															<div class="col-sm-2">
																<input type="number" class="form-control" name="tdjml" id="tdjml" value="1">
															</div>
															<div class="col-sm-4">
																<input type="checkbox" name="tdperawat" id="tdperawat"> Dilakukan oleh Perawat
															</div>
															<div class="col-sm-3">
																<!-- <input type="checkbox" name="tdumum" id="tdumum"> Berlaku Umum -->
																<input type="checkbox" name="tdumum" id="tdumum" <?php if (trim($dtpasien->golongan) == "UMUM") { echo "checked";} ?>/> Berlaku Umum
															</div>
														</div>
														<div class="form-group">
															<label for="inputEmail3" class="col-sm-3 control-label">% Diskon</label>
															<div class="col-sm-2">
																<input type="number" class="form-control" name="tddiskon" id="tddiskon" value="0">
															</div>
														</div>							
													</div>
												</div>
											</div>
											<div class="col-md-12">
												<a onclick="simpandatatindakan();" class="btn btn-primary pull-right">Simpan</a>
											</div>
										</div>
									</div>
									<div class="tab-pane" id="tab_2">
										<div class="row">
											<div class="col-md-12">
												<div class="col-dm-12" id="bhpinfox"></div>
												<div class="box box-default">
													<div class="box-header with-border">
														<h3 class="box-title">Bahan Habis Pakai / Obat</h3>
													</div>
													<div class="box-body">
														<table class="table table-bordered table-striped" id="tabelbhp">
															<thead>
																<tr>								
																	<th width="3%">No.</th>
																	<th width='8%'>Tanggal</th>
																	<th>Nama BHP</th>
																	<th width="8%">Satuan Pakai</th>
																	<th style="text-align:right" width="9%">Harga Satuan</th>
																	<th style="text-align:right" width="7%">Qty</th>
																	<th width="5%">UM/ASR</th>
																	<th style="text-align:right" width="5%">Diskon</th>
                                                                    <th style="text-align:right" width="8%">Sub Total</th>
																	<th style="text-align:right" width="8%">Keterangan</th>
																	<th style="text-align:center" width='8%'>Action</th>
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
                                                                        echo "<tr><td align='right'>".$nob++.".</td>";
                                                                        echo "<td>".tanggaldua($row->tanggal)."</td>";
                                                                        echo "<td>".$row->namaobat."</td>";
                                                                        echo "<td>".$row->satuanpakai."</td>";
                                                                        echo "<td  align='right'>".groupangka($row->hargapakai)."</td>";
                                                                        echo "<td  align='right'>".groupangka($row->qty)."</td>";
                                                                        if ($row->nonasuransi==1){echo "<td align='center'>UMUM</td>";} else {echo "<td align='center'>ASR</td>";}
                                                                        echo "<td  align='right'>".$row->diskon."</td>";
                                                                        echo "<td  align='right'>".groupangka($r)."</td>";
																		if ($row->nonbill==1){echo "<td align='center'>Non Billing</td>";} 
																			else {echo "<td align='center'> </td>";
																			$qty = $qty + $row->qty;
																			$jml = $jml + $r;
																		}
																		?>
                                                                        <td class="text-center">
                                                                            <a onclick="ubahbhpedit(<?php echo $row->id; ?>)" class="btn-sm btn-info btn-flat"><i class="fa fa-edit"></i></a>
                                                                            <a onclick="hapusdatabhp(this, <?php echo $row->id; ?>)" class="btn-sm btn-danger btn-flat"><i class="fa fa-trash"></i></a>
                                                                        </td>
                                                                        <?php
                                                                        echo "</tr>";
                                                                    }
                                                                    echo "<tr>";
                                                                    echo "<td colspan='7'>Total</td>";
																	// echo "<td>".$qty."</td>";
																	
                                                                    // echo "<td colspan='2'></td>";
                                                                    echo "<td colspan='2' align='right'>".groupangka($jml)."</td>";
																	echo "</tr>";
																	


																} ?>
															</tbody>
														</table>
													</div>
												</div> 
											</div>
										</div>
										<div class="row" id="formbhp">
											<div class="col-md-6">
												<div class="box box-info">				
													<div class="box-body">
														<div class="form-group">
															<label for="inputEmail3" class="col-sm-3 control-label">Tanggal</label>
															<div class="col-sm-3">
																<input type="text" class="form-control" name="bhptgl" id="bhptgl">
															</div>
														</div>
														<div class="form-group">
															<label for="inputEmail3" class="col-sm-3 control-label">BHP</label>
															<div class="col-sm-9">
																<select class="form-control" style="width: 100%;" name="bhpbhp" id="bhpbhp" onchange="prosbhp()">
																	<?php
																	foreach($dtobat as $row) {
																	?>
																	<option value="<?php echo $row->kodeobat; ?>_<?php echo $row->id; ?>"><?php echo $row->namaobat; ?></option>
																	<?php
																	}
																	?>
																</select>
															</div>
														</div>
														<div class="form-group">
															<label for="inputEmail3" class="col-sm-3 control-label">Qty</label>
															<div class="col-sm-3">
																<input type="number" class="form-control" name="bhpqty" id="bhpqty">
															</div>
															<div class="col-sm-6">
																<input type="checkbox" name="bhpnonbilling" id="bhpnonbilling"> BHP / Obat Non Billing
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="box box-info">				
													<div class="box-body">
														<div class="form-group">
															<label for="inputEmail3" class="col-sm-3 control-label">Satuan Pakai</label>
															<div class="col-sm-5">
																<input type="text" class="form-control" name="bhpstauan" id="bhpstauan" disabled>
															</div>
														</div>
														<div class="form-group">
															<label for="inputEmail3" class="col-sm-3 control-label">Harga Satuan</label>
															<div class="col-sm-5">
																<input type="text" class="form-control" name="bhpharga" id="bhpharga" disabled>
															</div>
														</div>
														<div class="form-group">
															<label for="inputEmail3" class="col-sm-3 control-label">% Diskon</label>
															<div class="col-sm-2">
																<input type="number" class="form-control" name="bhpdiskon" id="bhpdiskon">
															</div>
															<div class="col-sm-3">
																<!-- <input type="checkbox" name="bhpdumum" id="bhpumum"> Berlaku Umum -->
																<input type="checkbox" name="bhpdumum" id="bhpdumum" <?php if (trim($dtpasien->golongan) == "UMUM") { echo "checked";} ?>/> Berlaku Umum
																
															</div>
														</div>						

													</div>
												</div>
											</div>
											<div class="col-md-12">
												<a onclick="simpandatabhp();" class="btn btn-primary pull-right">Simpan</a>
											</div>
										</div>
									</div>
									<div class="tab-pane" id="tab_3">
										<div class="row">
											<div class="col-md-12">
												<div class="col-dm-12" id="oduainfox"></div>
												<div class="box box-default">
													<div class="box-header with-border">
														<h3 class="box-title">Pemakaian O2</h3>
													</div>
													<div class="box-body">
														<table class="table table-bordered table-striped" id="tabelodua">
															<thead>
																<tr>								
																	<th width="3%">No.</th>
																	<th style="text-align:center" width="10%">Tanggal</th>
																	<th style="text-align:center" width="5%">Jam</th>
																	<th style="text-align:right" width="10%"> Jumlah Liter</th>
																	<th style="text-align:center" width="10%">UM/ASR</th>
																	<th style="text-align:right" width="10%">Diskon</th>
																	<th style="text-align:left ">Action</th>
																</tr>
															</thead>
															<tbody>
																<?php 
																if($dttdodua == NULL) {
																?>
																<tr>
																	<td colspan="5" class="text-center">
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
																	if ($row->nonasuransi==1){echo "<td align='center'>UMUM</td>";} else {echo "<td align='center'>ASR</td>";} 
																	echo "<td align='right'>".$row->diskon."</td>";
																?>
																<td class="text-left">
																	<a onclick="ubahoduaedit(<?php echo $row->id; ?>)" class="btn-sm btn-info btn-flat"><i class="fa fa-edit"></i></a>
																	<a onclick="hapusdataodua(this, <?php echo $row->id; ?>)" class="btn-sm btn-danger btn-flat"><i class="fa fa-trash"></i></a>
																</td>
																<?php
																	echo "</tr>";
																}} ?>
															</tbody>
														</table>
													</div>
												</div>
											</div>
										</div>
										<div class="row" id="formodua">
											<div class="col-md-6">
												<div class="box box-info">				
													<div class="box-body">
														<div class="form-group">
															<label for="inputEmail3" class="col-sm-3 control-label">Tanggal</label>
															<div class="col-sm-3">
																<input type="text" class="form-control" name="otgl" id="otgl">
															</div>
														</div>
														<div class="bootstrap-timepicker">
															<div class="form-group">
																<label for="inputEmail3" class="col-sm-3 control-label">Jam</label>
																<div class="col-sm-3">
																	<input type="text" class="form-control" name="ojam" id="ojam">
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="box box-info">				
													<div class="box-body">
														<div class="form-group">
															<label for="inputEmail3" class="col-sm-3 control-label">Jumlah</label>
															<div class="col-sm-3">
																<input type="number" class="form-control" name="ojml" id="ojml">
															</div>
														</div>
														<div class="form-group">
															<label for="inputEmail3" class="col-sm-3 control-label">% Diskon</label>
															<div class="col-sm-2">
																<input type="number" class="form-control" name="odiskon" id="odiskon" value="<?php echo '0';?>">
															</div>
															<div class="col-sm-3">
																<!-- <input type="checkbox" name="oumum" id="oumum"> Berlaku Umum -->
																<input type="checkbox" name="oumum" id="oumum" <?php if (trim($dtpasien->golongan) == "UMUM") { echo "checked";} ?>/> Berlaku Umum
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="col-md-12">
												<a onclick="simpandataodua();" class="btn btn-primary pull-right">Simpan</a>
											</div>
										</div>
									</div>
									<div class="tab-pane" id="tab_4">
										<div class="row">
											<div class="col-md-12">
												<div class="col-dm-12" id="kinfox"></div>
												<div class="box box-default">
													<div class="box-header with-border">
														<h3 class="box-title">Pemakaian Kantung Darah</h3>
													</div>
													<div class="box-body">
														<table class="table table-bordered table-striped" id="tabelkantung">
															<thead>
																<tr>								
																	<th width="3%">No.</th>
																	<th style="text-align:center" width='10%'>Tanggal</th>
																	<th style="text-align:right" width="5%">Jumlah</th>
																	<th>Golongan Darah</th>
																	<th style="text-align:center" width="5%">UM/ASR</th>
																	<th style="text-align:right" width="5%">Diskon</th>
																	<th style="text-align:center" width='10%'>Action</th>
																</tr>
															</thead>
															<tbody>
																<?php 
																if($dttddarah == NULL) {
																?>
																<tr>
																	<td colspan="5" class="text-center">
																		Tidak Ada Data
																	</td>
																</tr>
																<?php } else { 
																	$nok = 1;
																	foreach($dttddarah as $row) {
																	echo "<tr><td align='right'>".$nok++.".</td>";
																	echo "<td align='center'>".tanggaldua($row->tanggal)."</td>";
																	echo "<td align='right'>".$row->qty."</td>";
																	echo "<td>".$row->goldarah."</td>";
																	if ($row->nonasuransi==1){echo "<td align='center'>UMUM</td>";} else {echo "<td align='center'>ASR</td>";} 
																	echo "<td align='right'>".$row->diskon."</td>";
																	
																?>
																<td class="text-center">
																	<a onclick="ubahdarahedit(<?php echo $row->id; ?>)" class="btn-sm btn-info btn-flat"><i class="fa fa-edit"></i></a>
																	<a onclick="hapusdatadarah(this, <?php echo $row->id; ?>)" class="btn-sm btn-danger btn-flat"><i class="fa fa-trash"></i></a>
																</td>
																<?php
																	echo "</tr>";
																}} ?>
															</tbody>
														</table>
													</div>
												</div>
											</div>
										</div>
										<div class="row" id="formdarah">
											<div class="col-md-6">
												<div class="box box-info">				
													<div class="box-body">
														<div class="form-group">
															<label for="inputEmail3" class="col-sm-3 control-label">Tanggal</label>
															<div class="col-sm-3">
																<input type="text" class="form-control" name="drtgl" id="drtgl">
															</div>
														</div>
														<div class="form-group">
															<label for="inputEmail3" class="col-sm-3 control-label">Jumlah Kantung</label>
															<div class="col-sm-3">
																<input type="number" class="form-control" name="drjml" id="drjml">
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="box box-info">				
													<div class="box-body">
														<div class="form-group">
															<label for="inputEmail3" class="col-sm-3 control-label">Golongan Darah</label>
															<div class="col-sm-3">
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
														<div class="form-group">
															<label for="inputEmail3" class="col-sm-3 control-label">% Diskon</label>
															<div class="col-sm-2">
																<input type="number" class="form-control" name="drhdiskon" id="drhdiskon">
															</div>
															<div class="col-sm-3">
																<!-- <input type="checkbox" name="drhumum" id="drhumum"> Berlaku Umum -->
																<input type="checkbox" name="drhumum" id="drhumum" <?php if (trim($dtpasien->golongan) == "UMUM") { echo "checked";} ?>/> Berlaku Umum
															</div>
														</div>		
													</div>
												</div>
											</div>
											
											<div class="col-md-12">
												<a onclick="simpankantung();" class="btn btn-primary pull-right">Simpan</a>
											</div>
										</div>
									</div>
									<div class="tab-pane" id="tab_5">
										<div class="row">
											<div class="col-md-12">
												<div class="box box-default">
													<div class="box-header with-border">
														<h3 class="box-title">Rujukan ke Poli</h3>
													</div>
													<div class="box-body">
														<div class="col-sm-2">
															<div class="form-group">
																<label for="inputEmail3" class="col-sm-4 control-label">Tanggal</label>
																<div class="col-sm-8">
																	<input type="text" class="form-control" name="pktgl" id="pktgl">
																</div>
															</div>
														</div>
														<div class="col-sm-2">
															<div class="bootstrap-timepicker">
																<div class="form-group">
																	<label for="inputEmail3" class="col-sm-4 control-label">Jam</label>
																	<div class="col-sm-8">
																		<input type="text" class="form-control" name="pkjam" id="pkjam">
																	</div>
																</div>
															</div>
														</div>
														<div class="col-sm-7">
															<div class="form-group">
																<label for="inputEmail3" class="col-sm-3 control-label">Unit Tujuan</label>
																<div class="col-sm-9">
																	<select class="form-control" style="width: 100%;" name="pkunit" id="pkunit">
																		<?php
																		foreach($dtunit as $row) {
																		?>
																		<option value="<?php echo $row->kode_unit. "_" .$row->nama_unit; ?>"><?php echo $row->nama_unit; ?></option>
																		<?php
																		}
																		?>
																	</select>
																</div>
															</div>
														</div>
														<div class="col-md-1">	
															<?php
																if ($dtpasien->inap_to_poli == 1) {
																	echo '<a onclick="pesandarirujukinap()" class="btn btn-primary pull-right">Simpan</a>';
																} else {
																	echo '<a onclick="simpanpindah()" class="btn btn-primary pull-right">Simpan</a>';
																}
															?>
														</div>
													</div>
												</div>
											</div>
										</div>
										<!-- <div class="row">
											<div class="col-md-12">
												<a onclick="simpanpindah()" class="btn btn-primary pull-right">Simpan</a>
											</div>
										</div> 
										<br><br> -->
										<div class="row">
											<div class="col-md-12">
												<div class="box box-default">
													<div class="box-header with-border">
														<h3 class="box-title">History</h3>
													</div>
													<div class="box-body">
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
																if($dttdhistory == NULL) {
																?>
																<tr>
																	<td colspan="6" class="text-center">
																		Tidak Ada Data
																	</td>
																</tr>
																<?php } else { foreach($dttdhistory as $key => $row) {
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
																				if (count($dttdhistory) != 1) {
																					echo '<a onclick="pasienkembali(this, '.$row->id.')" class="btn-sm btn-info btn-flat">Kembali</a>';
																				}
																			}
																		}
																		echo '</td>';
																		echo '<td class="text-center">';
																		if ($key == 0) {
																			if ($pindah == 0) {
																				if ($inap_to_poli == 0) {
																					echo '<a onclick="pasienpulang(this, '.$row->id.')" class="btn-sm btn-danger btn-flat">Pulang</a>';
																				}
																			}
																		}
																		echo '</td>';
																	} else {
																		echo "<td></td>";
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
									<div class="tab-pane" id="tab_6">
										<div class="row">
											<div class="col-md-12">
												<div class="box box-default">
													<div class="box-header with-border">
                                                        <h3 class="box-title">Pemeriksaan Ke Instalasi</h3>
													</div>

													<div class="box-body">
														
														<div class="col-sm-4">
															<div class="form-group">
																<label for="inputEmail3" class="col-sm-3 control-label">Tanggal</label>
																<div class="col-sm-4">
																		<input type="text" class="form-control" name="instgl" id="instgl">
																</div>
															</div>
															<div class="form-group">
																<label for="inputEmail3" class="col-sm-3 control-label">Unit Tujuan</label>
																<div class="col-sm-8">
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
														
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <div class="form-group">
                                                                    <label for="inputEmail3" class="col-sm-3 control-label">Catatan Pemeriksaan</label>
                                                                    <div class="col-sm-9">
                                                                        <textarea rows="3" name="icatatan" id="icatatan" class="form-control"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
														<div class="col-md-2">
															<a onclick="kirimisntalasi()" class="btn btn-primary pull-right">Simpan</a>
														</div>
													</div>

												</div>
											</div>
										</div>
										<!-- <div class="row">
											<div class="col-md-12">
												<a onclick="kirimisntalasi()" class="btn btn-primary pull-right">Simpan</a>
											</div>
										</div> -->
					
										<div class="row">
											<div class="col-md-12">
												<div class="box box-default">
													<div class="box-header with-border">
														<h3 class="box-title">History</h3>
													</div>
													<div class="box-body">
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
																</tr>
															</thead>
															<tbody>
																<?php 
																if($dttdinst == NULL) {
																?>
																<tr>
																	<td colspan="7" class="text-center">
																		Tidak Ada Data
																	</td>
																</tr>
																<?php } else { foreach($dttdinst as $row) {
																	echo "<tr><td>".$row->tanggal."</td>";
																	echo "<td>".$row->nama_unit."</td>";
																	echo "<td>".$row->nama_dokter."</td>";
																	echo "<td>".$row->nama_dokter_periksa."</td>";
																	echo "<td>".$row->nama_unitR."</td>";
																	echo "<td>".$row->notransaksi_IN."</td>";
																	echo "<td>".$row->catatan."</td>";
                                                                    ?>
                                                                    <td class="text-center">
                                                                        <a onclick="hapusinst(this, <?php echo $row->id; ?>)" class="btn-sm btn-danger btn-flat">Hapus</a>
                                                                    </td>
                                                                    <?php
																	echo "</tr>";
																}} ?>
															</tbody>
														</table>
													</div>
												</div>
											</div>
										</div>
									</div>
                                    <div class="tab-pane" id="tab_7">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="box box-default">
                                                    <div class="box-header with-border">
                                                        <h3 class="box-title">Penunjang</h3>
                                                    </div>
                                                    <div class="box-body">
                                                        <div class="nav-tabs-custom">
                                                            <div class="col-md-2">
                                                                <ul class="nav nav-tabs tabs-left">
                                                                    <li class="active"><a href="#inst_1" data-toggle="tab">Laboratorium</a></li>
                                                                    <li><a href="#inst_2" data-toggle="tab">Radiologi</a></li>
                                                                    <li><a href="#inst_3" data-toggle="tab">Hemodialisa</a></li>
                                                                    <li><a href="#inst_4" data-toggle="tab">Kamar Operasi</a></li>
                                                                    <li><a href="#inst_5" data-toggle="tab">Kamar Bersalin</a></li>
                                                                </ul>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <div class="tab-content">
                                                                    <div class="tab-pane active" id="inst_1">
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <table class="table table-bordered table-striped">
                                                                                    <thead>
                                                                                    <tr>
                                                                                        <th width="3%">No.</th>
																						<th width="7%">Tanggal</th>
                                                                                        <th>Dokter Pemesan</th>
                                                                                        <th width="30%">Dokter Pemeriksa</th>
                                                                                        <th width="20%">Unit</th>
																						<th width="3%">Hasil</th>
                                                                                        
                                                                                    </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                    <?php
                                                                                    if($tindakanlab == NULL) {
                                                                                        ?>
                                                                                        <tr>
                                                                                            <td colspan="6" class="text-center">
                                                                                                Tidak Ada Data
                                                                                            </td>
                                                                                        </tr>
                                                                                    <?php } else {
                                                                                        $no = 1;
                                                                                        foreach($tindakanlab as $row) {
                                                                                            echo "<tr><td>".$no++.".</td>";
                                                                                            echo "<td>".$row->tanggal."</td>";
                                                                                            echo "<td>".$row->nama_dokter."</td>";
																							echo "<td>".$row->nama_dokter_periksa."</td>";
                                                                                            echo "<td>".$row->nama_unitR."</td>";
																							?>
																							<td class="text-center">
																								<a onclick="hasillab(this, <?php echo $row->id; ?>)" class="btn-sm btn-success btn-flat">Hasil</a>
																							</td>

																							<?php
                                                                                            echo "</tr>";
                                                                                        }} ?>

																					<!-- $this->db->select("tanggal,nama_dokter, nama_dokter_periksa, nama_unitR"); -->

                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="tab-pane" id="inst_2">
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <table class="table table-bordered table-striped" >
                                                                                    <thead>
                                                                                    <tr>
                                                                                        <th width="5%">No.</th>
                                                                                        <th width="10%">Tanggal</th>
                                                                                        <th>Tindakan</th>
                                                                                        <th width="10%">Harga</th>
                                                                                        <th width="5%">UM/ASR</th>
                                                                                        <th width="5%">Diskon</th>
                                                                                    </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                    <?php
                                                                                    if($tindakanrad == NULL) {
                                                                                        ?>
                                                                                        <tr>
                                                                                            <td colspan="6" class="text-center">
                                                                                                Tidak Ada Data
                                                                                            </td>
                                                                                        </tr>
                                                                                    <?php } else {
                                                                                        $no = 1;
                                                                                        foreach($tindakanrad as $row) {
                                                                                            echo "<tr><td>".$no++.".</td>";
                                                                                            echo "<td>".tanggaldua($row->tanggal).".</td>";
                                                                                            echo "<td>".$row->tindakan."</td>";
                                                                                            echo "<td>".$row->jasas."</td>";
                                                                                            if ($row->nonasuransi==1){echo "<td>UMUM</td>";} else {echo "<td>ASR</td>";}
                                                                                            echo "<td>".$row->diskon."</td>";
                                                                                            echo "</tr>";
                                                                                        }} ?>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="tab-pane" id="inst_3">
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <table class="table table-bordered table-striped" >
                                                                                    <thead>
                                                                                    <tr>
                                                                                        <th width="5%">No.</th>
                                                                                        <th>Tindakan</th>
                                                                                        <th width="30%">Harga</th>
                                                                                        <th width="5%">UM/ASR</th>
                                                                                        <th width="5%">Diskon</th>
                                                                                    </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                    <?php
                                                                                    if($tindakanhem == NULL) {
                                                                                        ?>
                                                                                        <tr>
                                                                                            <td colspan="5" class="text-center">
                                                                                                Tidak Ada Data
                                                                                            </td>
                                                                                        </tr>
                                                                                    <?php } else {
                                                                                        $no = 1;
                                                                                        foreach($tindakanhem as $row) {
                                                                                            echo "<tr><td>".$no++.".</td>";
                                                                                            echo "<td>".$row->tindakan."</td>";
                                                                                            echo "<td>".$row->jasas."</td>";
                                                                                            if ($row->nonasuransi==1){echo "<td>UMUM</td>";} else {echo "<td>ASR</td>";}
                                                                                            echo "<td>".$row->diskon."</td>";
                                                                                            echo "</tr>";
                                                                                        }} ?>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="tab-pane" id="inst_4">
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <table class="table table-bordered table-striped" >
                                                                                    <thead>
                                                                                    <tr>
                                                                                        <th width="3%">No.</th>
                                                                                        <th width="6%">Tanggal</th>
                                                                                        <th>Tindakan</th>
                                                                                        <th width="12%">Dokter Operasi</th>
                                                                                        <th width="12%">Spesialis Anastesi</th>
                                                                                        <th width="12%">Spesialis Anak</th>
                                                                                        <th width="12%">Penata Anastesi</th>
                                                                                        <th width="3%">UM/ASR</th>
                                                                                        <th width="3%">Diskon</th>
                                                                                    </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                    <?php
                                                                                    if($tindakanopr == NULL) {
                                                                                        ?>
                                                                                        <tr>
                                                                                            <td colspan="9" class="text-center">
                                                                                                Tidak Ada Data
                                                                                            </td>
                                                                                        </tr>
                                                                                    <?php } else {
                                                                                        $nop = 1;
                                                                                        foreach($tindakanopr as $row) {
                                                                                            echo "<tr><td>".$nop++.".</td>";
                                                                                            echo "<td>".tanggaldua($row->tgl_periksa)."</td>";
                                                                                            echo "<td>".$row->tindakan."</td>";
                                                                                            echo "<td>".$row->nama_dokter."</td>";
                                                                                            echo "<td>".$row->nama_anastesi."</td>";
                                                                                            echo "<td>".$row->spe_anak."</td>";
                                                                                            echo "<td>".$row->nama_penata."</td>";
                                                                                            echo "<td>".$row->nonasuransi."</td>";
                                                                                            echo "<td>".$row->diskon."</td>";
                                                                                            echo "</tr>";
                                                                                        }} ?>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="tab-pane" id="inst_5">
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <table class="table table-bordered table-striped" >
                                                                                    <thead>
                                                                                    <tr>
                                                                                        <th width='5%'>No.</th>
                                                                                        <th width='10%'>Tanggal</th>
                                                                                        <th>Tindakan</th>
                                                                                        <th width="5%">Jasa Sarana</th>
                                                                                        <th width="5%">Jasa Pelayanan</th>
                                                                                        <th width="15%">Nama Dokter</th>
                                                                                        <th width="15%">Spesialis Anak</th>
                                                                                        <th width="15%">Bidan</th>
                                                                                        <th width="15%">Dokter Anastesi</th>
                                                                                    </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                    <?php
                                                                                    if($tindakanbsr == NULL) {
                                                                                        ?>
                                                                                        <tr>
                                                                                            <td colspan="9" class="text-center">
                                                                                                Tidak Ada Data
                                                                                            </td>
                                                                                        </tr>
                                                                                    <?php } else {
                                                                                        $nos = 1;
                                                                                        foreach($tindakanbsr as $row) {
                                                                                            echo "<tr><td>".$nos++.".</td>";
                                                                                            echo "<td>".tanggaldua($row->tanggal)."</td>";
                                                                                            echo "<td>".$row->tindakan."</td>";
                                                                                            echo "<td>".$row->jasas."</td>";
                                                                                            echo "<td>".$row->jasap."</td>";
                                                                                            echo "<td>".$row->nama_dokter."</td>";
                                                                                            echo "<td>".$row->spe_anak."</td>";
                                                                                            echo "<td>".$row->nama_bidan."</td>";
                                                                                            echo "<td>".$row->dokanastesi."</td>";
                                                                                            echo "</tr>";
                                                                                        }} ?>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
									<div class="tab-pane" id="tab_8">
										<div class="row">
											<div class="col-md-12">
												<div class="col-dm-12" id="obatinfox"></div>
												<div class="box box-default" >
												<div class="box-header with-border">
														<div class="col-md-12">
															<div class="col-md-9">
																<h3 class="box-title">Daftar Resep</h3>
															</div>
															<div class="col-md-1">	
																No.Resep :
															</div>
															<div class="col-md-2">	
																<div class="form-group">
																	<input type="text" class="form-control" id="norep" name="norep" disabled/>
																</div>
															</div>
														</div>
													</div>
													<div class="box-body">
														<table class="table table-bordered table-striped" id="tabelobat">
															<thead>
																<tr>								
																	<th style="text-align:right" width="3%">No.</th>
																	<th width='10%'>No.Resep</th>
																	<th >Nama Obat</th>
																	<th style="text-align:right" width="10%">Harga</th>
																	<th style="text-align:right" width="7%">Qty</th>
																	<th width="10%">Satuan Pakai</th>
																	<th width="25%">Dosis</th>
																	<th style="text-align:center" width='10%'>Action</th>
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
																	echo "<td>".$row->namaobat."</td>";
																	echo "<td align='right' >".$row->hargapakai."</td>";
																	echo "<td align='right'>".$row->qty."</td>";
																	echo "<td>".$row->satuanpakai."</td>";
																	echo "<td>".$row->dosis."</td>";
																?>
																<td class="text-center">
																	<!-- <a onclick="ubahheaseredit(<?php echo $row->idnoresep; ?>)" class="btn-sm btn-info btn-flat">Proses</a> -->
																	<a onclick="hapusdataobat(this, <?php echo $row->idnoresep; ?>)" class="btn-sm btn-danger btn-flat"><i class="fa fa-trash"></i></a>
																</td>
																<?php
																	echo "</tr>";
																}} ?>
															</tbody>
														</table>
													</div>
												</div>
											</div>
										</div>
										<div class="row" id="formobat">
											<div class="col-md-6">
												<div class="box box-info">				
													<div class="box-body">
														<div class="form-group">
															<label for="inputEmail3" class="col-sm-2 control-label">Obat</label>
															<div class="col-sm-9">
																<select class="form-control" style="width: 100%;" name="obatobat" id="obatobat" onchange="prosbhp1()">
																	<option value="">--pilih obat--</option>
																	<?php
																	foreach($dtobat as $row) {
																	?>
																	<option value="<?php echo $row->kodeobat; ?>_<?php echo $row->id; ?>"><?php echo $row->namaobat; ?></option>
																	<?php
																	}
																	?>
																</select>
															</div>
														</div>
														<div class="form-group">
															<label for="inputEmail3" class="col-sm-2 control-label">Qty</label>
															<div class="col-sm-2">
																<input type="number" class="form-control" name="obatqty" id="obatqty">
															</div>
															<label for="inputEmail3" class="col-sm-1 control-label">Satuan</label>
															<div class="col-sm-2">
																<input type="text" class="form-control" name="obatstauan" id="obatstauan" disabled>
															</div>
															<label for="inputEmail3" class="col-sm-1 control-label">Harga</label>
															<div class="col-sm-2">
																<input type="text" class="form-control" name="obatharga" id="obatharga" disabled>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="box box-info">				
													<div class="box-body">
														<div class="form-group">
															<div class="form-group">
																<label for="dosis" class="col-sm-3 control-label">Dosis</label>
																<div class="col-sm-6">
																	<select class="form-control" style="width: 100%;" type="text" name="dosis" id="dosis">
																		<option value="">--pilih dosis--</option>
																		<?php
																		foreach($ambildosis as $row) {
																			?>
																			<option value="<?php echo $row->dosis; ?>"><?php echo $row->dosis; ?></option>
																			<?php
																		}
																		?>
																	</select>
																</div>
															</div>
															<!-- <div class="form-group">
                                                                <div class="form-group">
                                                                    <label for="iracik" class="col-sm-3 control-label">Obat Racik</label>
                                                                    <div class="col-sm-6">
                                                                        <textarea rows="3" name="iracik" id="iracik" class="form-control"></textarea>
                                                                    </div>
																	
                                                                </div>
                                                            </div>
															<div class="form-group">
                                                                <div class="form-group">
                                                                    <label for="iracik" class="col-sm-3 control-label">Obat Racik</label>
                                                                    <div class="col-sm-6">
                                                                        <textarea rows="3" name="iracik" id="iracik" class="form-control"></textarea>
                                                                    </div>
																	
                                                                </div>
                                                            </div> -->
														</div>						

													</div>
												</div>
											</div>
											<div class="col-md-12">
												<a onclick="simpandataobat();" class="btn btn-primary pull-right" id="btn">Simpan</a>
											</div>
										</div>
									</div>
								</div>
							</div>
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
        url: "<?php echo site_url();?>/urj/untukpilihanbihp",
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

var siteURL = "<?php echo site_url(); ?>";

function prosbhp1() {
    var tpp = $("#obatobat").val();
    $.ajax({
        url: "<?php echo site_url();?>/urj/untukpilihanbihp",
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
<script type="text/javascript" src="<?php echo base_url();?>assets/dist/js/urj/v1/prosesurj.js"></script>

