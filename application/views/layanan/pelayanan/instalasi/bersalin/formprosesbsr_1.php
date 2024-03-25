<style>
	.input-group {
		padding-bottom: 5px;
	}
</style>
<div class="modal-dialog" style="width:1200px;" >
	<div class="modal-content" >
		<div class="form-horizontal" id="kotakform">
			<div class="box box-default box-solid" id="proseskotak">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title">Instalasi Kamar Bersalin</h4>
				</div>
				<div class="modal-body">
					<div class="box-body">
						<div class="col-sm-3">
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-3 control-label">No. RM</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="pj" value="<?php echo $dtpasien->no_rm;?>" disabled>
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-3 control-label">Nama Pasien</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="pj" value="<?php echo $dtpasien->nama_pasien;?>" disabled>
								</div>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-5 control-label">No. Transaksi</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" name="pj" id="notrans" value="<?php echo $dtpasien->notransaksi;?>" disabled>
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
									<li class="active"><a href="#tab_0" data-toggle="tab">Tindakan Persalinan</a></li>
									<li><a href="#tab_1" data-toggle="tab">Tindakan Perawatan</a></li>
									<li><a href="#tab_2" data-toggle="tab">Pemakaian BHP</a></li>
									<li><a href="#tab_3" data-toggle="tab">Pemakaian O2</a></li>
									<li><a href="#tab_4" data-toggle="tab">Kunjungan Dokter</a></li>
									<li><a href="#tab_5" data-toggle="tab">Kantong Darah</a></li>
									<li><a href="#tab_6" data-toggle="tab">Pindah Kamar</a></li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane active" id="tab_0">
										<div class="row">
											<div class="col-md-12">
												<div class="col-dm-12" id="tdinfox"></div>
												<div class="box box-default">
													<div class="box-header with-border">
														<h3 class="box-title">Tindakan Keperawatan</h3>
													</div>
													<div class="box-body">
														<table class="table table-bordered table-striped" id="tabeltindakanbersalin">
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
																	<th width='10%'>Action</th>
																</tr>
															</thead>
															<tbody>
																<?php 
																if($dttdbersalin == NULL) {
																?>
																<tr>
																	<td colspan="10" class="text-center">
																		Tidak Ada Data
																	</td>
																</tr>
																<?php } else { 
																	$nos = 1;
																	foreach($dttdbersalin as $row) {
																	echo "<tr><td>".$nos++.".</td>";
																	echo "<td>".tanggaldua($row->tanggal)."</td>";
																	echo "<td>".$row->tindakan."</td>";
																	echo "<td>".$row->jasas."</td>";
																	echo "<td>".$row->jasap."</td>";
																	echo "<td>".$row->nama_dokter."</td>";
																	echo "<td>".$row->spe_anak."</td>";
																	echo "<td>".$row->nama_bidan."</td>";
																	echo "<td>".$row->dokanastesi."</td>";
																?>
																<td class="text-center">
																	<a onclick="ubahtindakanbsredit(<?php echo $row->id; ?>)" class="btn-sm btn-info btn-flat"><i class="fa fa-edit"></i></a>
																	<a onclick="hapusdatatindakanbsr(this, <?php echo $row->id; ?>)" class="btn-sm btn-danger btn-flat"><i class="fa fa-trash"></i></a>
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
										<div class="row" id="formbsr">
											<div class="col-md-6">
												<div class="box box-info">				
													<div class="box-body">
                                                        <div class="box-body">
                                                            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <b>Tanggal</b>
                                                                </span>
                                                                <input type="text" class="form-control" name="bstgl" id="bstgl">
                                                            </div>
                                                            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <b>Tindakan</b>
                                                                </span>
                                                                <select class="form-control" style="width: 100%;" type="text" name="bstindakan" id="bstindakan" onchange="bstindakan()">
                                                                    <?php
                                                                    foreach($dttindakan as $row) {
                                                                        if ($row->lahir == "1") {
                                                                            ?>
                                                                            <option value="<?php echo $row->kode_tindakan; ?>"><?php echo $row->tindakan; ?></option>
                                                                            <?php
                                                                        }}
                                                                    ?>
                                                                </select>
                                                            </div>
                                                            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <b>Biaya Jasa</b>
                                                                </span>
                                                                <input type="text" class="form-control" id="jasa" name="jasa" disabled>
                                                            </div>
                                                            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <input type="radio" value="dokter" name="pilihan" id="pilihan"/> &nbsp; <b>Dokter</b>
                                                                </span>
                                                                <select class="form-control" style="width: 100%;" name="bsdokter" id="bsdokter">
                                                                    <option value="">--pilih Dokter--</option>
                                                                    <?php
                                                                    foreach($dtbsrdokter as $row) {
                                                                        ?>
                                                                        <option value="<?php echo $row->kode_dokter; ?>"><?php echo $row->nama_dokter; ?></option>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <input type="radio" value="bidan" name="pilihan" id="pilihan"/> &nbsp; <b>Bidan</b>
                                                                </span>
                                                                <select class="form-control" style="width: 100%;" name="bsbidan" id="bsbidan">
                                                                    <option value="">--pilih Bidan--</option>
                                                                    <?php
                                                                    foreach($dtbsrbidan as $row) {
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
														<div class="input-group">
															<span class="input-group-addon">
																<b>Spesialis Anak</b>
															</span>
															<select class="form-control" style="width: 100%;" name="bsspe" id="bsspe">
                                                                <option value="">--pilih Spesialis Anak--</option>
																<?php
																foreach($dtbsrdokter as $row) {
																?>
																<option value="<?php echo $row->kode_dokter; ?>"><?php echo $row->nama_dokter; ?></option>
																<?php
																}
																?>
															</select>
														</div>
														<div class="input-group">
															<span class="input-group-addon">
																<b>Dokter Anastesi</b>
															</span>
															<select class="form-control" style="width: 100%;" name="bsanastesi" id="bsanastesi">
                                                                <option value="">--pilih Dokter Anastesi--</option>
																<?php
																foreach($dtbsrdokter as $row) {
																?>
																<option value="<?php echo $row->kode_dokter; ?>"><?php echo $row->nama_dokter; ?></option>
																<?php
																}
																?>
															</select>
														</div>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
																<b>Perawat</b>
															</span>
                                                            <select class="form-control" style="width: 100%;" name="bsperawat" id="bsperawat">
                                                                <option value="">--Pilih--</option>
                                                                <?php
                                                                foreach($dtperawat as $row) {
                                                                    ?>
                                                                    <option value="<?php echo $row->kode_dokter; ?>"><?php echo $row->nama_dokter; ?></option>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
																<b>% Diskon</b>
															</span>
                                                            <input type="number" class="form-control" name="bsdiskon" id="bsdiskon" value="0">
                                                            <input type="checkbox" name="bsumum" id="bsumum" > Berlaku Umum
                                                        </div>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
																<b>Catatan</b>
															</span>
                                                            <textarea class="form-control col-sm-12" rows="3" id="bscatatan" name="bscatatan"></textarea>
                                                        </div>
													</div>
												</div>
											</div>
											<div class="col-md-12">
												<a onclick="simpandatatindakanbersalin();" class="btn btn-primary pull-right">Simpan</a>
											</div>
										</div>
									</div>
									<div class="tab-pane" id="tab_1">
										<div class="row">
											<div class="col-md-12">
												<div class="col-dm-12" id="tdinfox"></div>
												<div class="box box-default">
													<div class="box-header with-border">
														<h3 class="box-title">Tindakan Keperawatan</h3>
													</div>
													<div class="box-body">
														<table class="table table-bordered table-striped" id="tabeltindakan">
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
																if($dttdtindakan == NULL) {
																?>
																<tr>
																	<td colspan="8" class="text-center">
																		Tidak Ada Data
																	</td>
																</tr>
																<?php } else { 
																	$no = 1;
																	foreach($dttdtindakan as $row) {
																	echo "<tr><td>".$no++.".</td>";
																	echo "<td>".tanggaldua($row->tanggal)."</td>";
																	echo "<td>".$row->jam."</td>";
																	echo "<td>".$row->namatindakan."</td>";
																	echo "<td>".$row->qty."</td>";
																	echo "<td>".$row->nama_dokter."</td>";
																	echo "<td>".$row->perawatsaja."</td>";
																?>
																<td class="text-center">
																	<a onclick="ubahtindakanedit(<?php echo $row->id; ?>)" class="btn-sm btn-info btn-flat"><i class="fa fa-edit"></i></a>
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
															<label for="inputEmail3" class="col-sm-3 control-label">Dokter</label>
															<div class="col-sm-9">
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
                                                        <div class="form-group">
                                                            <label for="inputEmail3" class="col-sm-3 control-label">Perawat</label>
                                                            <div class="col-sm-9">
                                                                <select class="form-control" style="width: 100%;" name="tdperawat" id="tdperawat">
                                                                    <option value="">--Pilih--</option>
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
																<select class="form-control" style="width: 100%;" type="text" name="tdtindakan" id="tdtindakan">
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
                                                            <label for="inputEmail3" class="col-sm-3 control-label">% Diskon</label>
                                                            <div class="col-sm-2">
                                                                <input type="number" class="form-control" name="tddiskon" id="tddiskon" >
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <input type="checkbox" name="tdumum" id="tdumum" > Berlaku Umum
                                                            </div>
                                                        </div>
														<div class="form-group">
															<label for="inputEmail3" class="col-sm-3 control-label">Jumlah</label>
															<div class="col-sm-3">
																<input type="number" class="form-control" name="tdjml" id="tdjml">
															</div>
														</div>
														<div class="form-group">
															<label for="inputEmail3" class="col-sm-3 control-label"></label>
															<div class="col-sm-9">
																<input type="checkbox" name="tdperawat" id="tdperawat"> Dilakukan oleh Perawat
															</div>
														</div>
                                                        <div class="form-group">
                                                            <label for="inputEmail3" class="col-sm-3 control-label">Catatan</label>
                                                            <div class="col-sm-9">
                                                                <textarea class="form-control col-sm-12" rows="3" id="catatan" name="catatan"></textarea>
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
														<h3 class="box-title">Bahan Habis Pakai</h3>
													</div>
													<div class="box-body">
														<table class="table table-bordered table-striped" id="tabelbhp">
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
																if($dttdbhp == NULL) {
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
                                                                    foreach($dttdbhp as $row) {
                                                                        $r = $row->qty * $row->hargapakai;
                                                                        echo "<tr><td>".$nob++.".</td>";
                                                                        echo "<td>".tanggaldua($row->tanggal)."</td>";
                                                                        echo "<td>".$row->namaobat."</td>";
                                                                        echo "<td>".$row->satuanpakai."</td>";
                                                                        echo "<td>".$row->hargapakai."</td>";
                                                                        echo "<td>".$row->qty."</td>";
                                                                        echo "<td>".$r."</td>";
                                                                        $qty = $qty + $row->qty;
                                                                        $jml = $jml + $r;
                                                                        ?>
                                                                        <td class="text-center">
                                                                            <a onclick="ubahbhpedit(<?php echo $row->id; ?>)" class="btn-sm btn-info btn-flat"><i class="fa fa-edit"></i></a>
                                                                            <a onclick="hapusdatabhp(this, <?php echo $row->id; ?>)" class="btn-sm btn-danger btn-flat"><i class="fa fa-trash"></i></a>
                                                                        </td>
                                                                        <?php
                                                                        echo "</tr>";
                                                                    }
                                                                    echo "<tr>";
                                                                    echo "<td colspan='5'>Total</td>";
                                                                    echo "<td>".$qty."</td>";
                                                                    echo "<td colspan='2'>".$jml."</td>";
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
																<select class="form-control" style="width: 100%;" name="bhpbhp" id="bhpbhp" onchange="bhpbhp()">
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
																	<th width="5%">No.</th>								
																	<th width='10%'>Tanggal</th>
																	<th width="5%">Jam</th>
																	<th>Jumlah Liter</th>
																	<th width='10%'>Action</th>
																</tr>
															</thead>
															<tbody>
																<?php 
																if($dttdodua == NULL) {
																?>
																<tr>
																	<td colspan="4" class="text-center">
																		Tidak Ada Data
																	</td>
																</tr>
																<?php } else { 
																	$noo = 1;
																	foreach($dttdodua as $row) {
																	echo "<tr><td>".$noo++.".</td>";
																	echo "<td>".tanggaldua($row->tgl_pakai)."</td>";
																	echo "<td>".$row->jam."</td>";
																	echo "<td>".$row->qty."</td>";
																?>
																<td class="text-center">
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
													</div>
												</div>
											</div>
											<div class="col-md-12">
												<a onclick="simpandataodua()" class="btn btn-primary pull-right">Simpan</a>
											</div>
										</div>
									</div>
									<div class="tab-pane" id="tab_4">
										<div class="row">
											<div class="col-md-12">
												<div class="col-dm-12" id="dinfox"></div>
												<div class="box box-default">
													<div class="box-header with-border">
														<h3 class="box-title">Visite Dokter</h3>
													</div>
													<div class="box-body">
														<table class="table table-bordered table-striped" id="tabeldokter">
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
																?>
																<td class="text-center">
																	<a onclick="ubahdokteredit(<?php echo $row->id; ?>)" class="btn-sm btn-info btn-flat"><i class="fa fa-edit"></i></a>
																	<a onclick="hapusdataodokter(this, <?php echo $row->id; ?>)" class="btn-sm btn-danger btn-flat"><i class="fa fa-trash"></i></a>
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
										<div class="row" id="formdokter">
											<div class="col-md-6">
												<div class="box box-info">				
													<div class="box-body">
														<div class="form-group">
															<label for="inputEmail3" class="col-sm-3 control-label">Tanggal</label>
															<div class="col-sm-3">
																<input type="text" class="form-control" name="dtgl" id="dtgl">
															</div>
														</div>
														<div class="bootstrap-timepicker">
															<div class="form-group">
																<label for="inputEmail3" class="col-sm-3 control-label">Jam</label>
																<div class="col-sm-3">
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
														<div class="form-group">
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
														<div class="form-group">
															<label for="inputEmail3" class="col-sm-3 control-label">Visite/Konsul/Dokter Jaga</label>
															<div class="col-sm-5">
																<select class="form-control" style="width: 100%;" type="text" name="dvisit" id="dvisit">
																	<option value="VISITE">VISITE</option>
																	<option value="KONSUL">KONSUL</option>
																	<option value="DOKTER UGD">DOKTER UGD</option>
																	<option value="DOKTER UMUM">DOKTER UMUM</option>
																</select>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="col-md-12">
												<a onclick="simpandtdokter()" class="btn btn-primary pull-right">Simpan</a>
											</div>
										</div>
									</div>
									<div class="tab-pane" id="tab_5">
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
																	<th width='5%'>No.</th>
																	<th width='10%'>Tanggal</th>
																	<th width="20%">Jumlah</th>
																	<th>Golongan Darah</th>
																	<th width='10%'>Action</th>
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
																	echo "<tr><td>".$nok++.".</td>";
																	echo "<td>".tanggaldua($row->tanggal)."</td>";
																	echo "<td>".$row->qty."</td>";
																	echo "<td>".$row->goldarah."</td>";
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
													</div>
												</div>
											</div>
											<div class="col-md-12">
												<a onclick="simpankantung()" class="btn btn-primary pull-right">Simpan</a>
											</div>
										</div>
									</div>
									<div class="tab-pane" id="tab_6">
										<div class="row">
											<div class="col-md-12">
												<div class="box box-default">
													<div class="box-header with-border">
														<h3 class="box-title">Pindah Kamar</h3>
													</div>
                                                    <div class="box-body">
                                                        <div class="col-sm-2">
                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label">Tanggal</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" class="form-control" name="pktgl" id="pktgl">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <div class="bootstrap-timepicker">
                                                                <div class="form-group">
                                                                    <label for="inputEmail3" class="col-sm-3 control-label">Jam</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control" name="pkjam" id="pkjam">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <label for="inputEmail3" class="col-sm-4 control-label">Unit/Kelas Tujuan</label>
                                                                <div class="col-sm-8">
                                                                    <select class="form-control" style="width: 100%;" name="pkunit" id="pkunit" onchange="carikamar()">
                                                                        <option value="">--pilihan--</option>
                                                                        <?php
                                                                        foreach($dtunit as $row) {
                                                                            ?>
                                                                            <option value="<?php echo $row->kode_unit. "_" .$row->kode_kelas. "_" .$row->nama_unit; ?>"><?php echo $row->nama_kelas; ?></option>
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                        <option value="<?php echo '0249'. "_" .''. "_" .'KAMAR BERSALIN'; ?>"><?php echo 'KAMAR BERSALIN'; ?></option>

                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <label for="inputEmail3" class="col-sm-3 control-label">Kamar</label>
                                                                <div class="col-sm-5">
                                                                    <select class="form-control" style="width: 100%;" name="kamar" type="text" id="kamar">
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<a onclick="simpanpindah()" class="btn btn-primary pull-right">Simpan</a>
											</div>
										</div>
										<br><br>
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
																<?php } else { foreach($dttdhistory as $row) {
																	echo "<tr><td>".$row->kode_unit."</td>";
																	echo "<td>".$row->nama_unit."</td>";
																	echo "<td>".tanggaldua($row->tgl_masuk_kamar)."</td>";
																	echo "<td>".$row->jam_masuk."</td>";
																	echo "<td>".tanggaldua($row->tgl_keluar_kamar)."</td>";
																	echo "<td>".$row->jam_keluar."</td>";
																?>
																<td class="text-center">
																	<a onclick="pasienkembali(this, <?php echo $row->id; ?>)" class="btn-sm btn-info btn-flat">Kembali</a>
																</td>
																<td class="text-center">
																	<a onclick="pasienpulang(this, <?php echo $row->id; ?>)" class="btn-sm btn-danger btn-flat">Pulang</a>
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
</script>
<script type="text/javascript" src="<?php echo base_url();?>assets/dist/js/instalasi/bersalin/v1/prosesbsr.js"></script>
<script>
    function carikamar() {
        var pkunit = $("#pkunit").val();
        $.ajax({
            url: "<?php echo site_url();?>/ioperasi/ambilpindahkamar",
            type: "GET",
            data : {pkunit: pkunit},
        }).then(function (data) {
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
            url: "<?php echo site_url();?>/Ibersalin/untukpilihantindakan",
            type: "GET",
            data : {kdt: tpp},
        }).then(function (data) {
            $("#jasa").val('');
            var t = JSON.parse(data);
            $("#jasa").val(t.jasas);
        });
    }
</script>

