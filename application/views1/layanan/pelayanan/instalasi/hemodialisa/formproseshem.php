<div class="modal-dialog" style="width:1200px;" >
	<div class="modal-content" >
		<div class="form-horizontal" id="kotakform">
			<div class="box box-default box-solid" id="proseskotak">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title">Pelayanan Hemodialisa</h4>
				</div>
				<div class="modal-body">
					<div class="box-body">
						<div class="col-sm-2">
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-5 control-label">No. RM</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" name="pj" value="<?php echo $dtproseshem->no_rm;?>" disabled>
								</div>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-3 control-label">Nama</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="pj" value="<?php echo $dtproseshem->nama_pasien;?>" disabled>
								</div>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-5 control-label">No. Transaksi</label>
								<div class="col-sm-7">
									<input type="text" name="notransin" id="notransin" value="<?php echo $dtproseshem->notransaksi_IN;?>" hidden disabled>
									<input type="text" class="form-control" name="notrans" id="notrans" value="<?php echo $dtproseshem->notransaksi;?>" disabled>
								</div>
							</div>
						</div>
						<div class="col-sm-2">
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-5 control-label">Tanggal</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" name="hemtgl" id="hemtgl" value="<?php echo tanggaldua($dtproseshem->tanggal);?>" disabled>
									
								</div>
							</div>
						</div>
						<div class="col-sm-2">
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-5 control-label">Golongan</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" name="tdgolongan" id="tdgolongan" value="<?php echo $dtproseshem->golongan;?>" disabled>
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
									<li class="active"><a href="#tab_1" data-toggle="tab">Tindakan atau Pemeriksaan</a></li>
									<li><a href="#tab_2" data-toggle="tab">Pemakaian BHP</a></li>
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
																	<th width="5%">No.</th>
																	<th>Tindakan</th>
																	<th width="10%">Harga</th>
																	<th width="7%">UM/ASR</th>
																	<th width="7%">Diskon</th>
																	<th width='10%'>Action</th>
																</tr>
															</thead>
															<tbody>
																<?php 
																if($datatindakaninstalasi == NULL) {
																?>
																<tr>
																	<td colspan="7" class="text-center">
																		Tidak Ada Data
																	</td>
																</tr>
																<?php } else { 
																	$no = 1;
																	foreach($datatindakaninstalasi as $row) {
																	echo "<tr><td>".$no++.".</td>";
																	echo "<td>".$row->tindakan."</td>";
																	echo "<td>".$row->jasas."</td>";
																	if ($row->nonasuransi==1){echo "<td>UMUM</td>";} else {echo "<td>ASR</td>";} 
																	echo "<td>".$row->diskon."</td>";
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
											<div class="box box-info">						
												<div class="col-md-6">																	
														<div class="box-body">
															<div class="form-group">
																<label for="inputEmail3" class="col-sm-3 control-label">Tindakan</label>
																<div class="col-sm-9">
																	<select class="form-control" style="width: 100%;" name="tdtindakan" id="tdtindakan" onchange="tdtindakan();">
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
																	<input type="text" class="form-control" id="jasa" name="jasa" disabled>
																</div>
															</div>
															
														</div>													
												</div>
												<div class="col-md-6">															
													<div class="box-body">
														<div class="form-group">
																<label for="inputEmail3" class="col-sm-3 control-label">% Diskon</label>
																<div class="col-sm-2">
																	<input type="number" class="form-control" name="tddiskon" id="tddiskon" value="0">
																</div>
																<div class="col-sm-3">
																	<!-- <input type="checkbox" name="tdumum" id="tdumum"> Berlaku Umum -->
																	<input type="checkbox" name="tdumum" id="tdumum" <?php if (trim($dtproseshem->golongan) == "UMUM") { echo "checked";} ?>/> Berlaku Umum
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
																<th width="3%">No.</th>								
																	<th width='7%'>Tanggal</th>
																	<th>Nama BHP</th>
																	<th width="7%">Satuan Pakai</th>
																	<th width="7%">Harga Satuan</th>
																	<th width="5%">Qty</th>
																	<th width="5%">UM/ASR</th>
																	<th width="7%">Pemakaian</th>
																	<th width="5%">Diskon</th>
                                                                    <th width="10%">Sub Total</th>
																	<th width='10%'>Action</th>
																</tr>
															</thead>
															<tbody>
																<?php 
																if($databhpinstalasi == NULL) {
																?>
																<tr>
																	<td colspan="10" class="text-center">
																		Tidak Ada Data
																	</td>
																</tr>
																<?php } else {
                                                                    $nob = 1;
                                                                    $qty = 0;
                                                                    $jml = 0;
                                                                    foreach($databhpinstalasi as $row) {
                                                                        $r = ($row->qty * $row->hargapakai) - $row->diskon;
                                                                        echo "<tr><td>".$nob++.".</td>";
                                                                        echo "<td>".tanggaldua($row->tanggal)."</td>";
                                                                        echo "<td>".$row->namaobat."</td>";
                                                                        echo "<td>".$row->satuanpakai."</td>";
                                                                        echo "<td>".$row->hargapakai."</td>";
                                                                        echo "<td>".$row->qty."</td>";
																		if ($row->nonasuransi==1){echo "<td>UMUM</td>";} else {echo "<td>ASR</td>";}
																		if ($row->pakai_ulang==1){echo "<td>BARU</td>";} else {echo "<td>LAMA</td>";}
                                                                        echo "<td>".$row->diskon."</td>";
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
                                                                    echo "<td colspan='6'>Total</td>";
                                                                    // echo "<td>".$qty."</td>";
                                                                    echo "<td colspan='3'></td>";
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
											<div class="box box-info">
												<div class="col-md-6">															
														<div class="box-body">
															<div class="form-group">
																<label for="inputEmail3" class="col-sm-3 control-label">BHP</label>
																<div class="col-sm-9">
																	<select class="form-control" style="width: 100%;" name="bhpbhp" id="bhpbhp" onchange="bhpbhp();">
																		<option value="">--pilihan--</option>
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
																<div class="col-sm-3">
																	<input type="checkbox" name="bhpdulang" id="bhpulang"> Pemakaian Ulang
																</div>
															</div>
														</div>												
												</div>
												<div class="col-md-6">																
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
																<input type="checkbox" name="bhpdumum" id="bhpdumum" <?php if (trim($dtproseshem->golongan) == "UMUM") { echo "checked";} ?>/> Berlaku Umum
															</div>
														</div>																	
												</div>
											</div>
											<div class="col-md-12">
												<a onclick="simpandatabhp();" class="btn btn-primary pull-right">Simpan</a>
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
<script>

	function modalload() {
		$("#proseskotak").append('<div id="oload" class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
	}

	function modalloadtutup() {
		$("#oload").remove();
	}

	function tutupmodal() {
		$(function () {
			$('#formmodal').modal('toggle');
		});
	}

	function tdsuksesalert(kode) {
		if (kode == 0) {
			$.notify("Sukses Input Data", "success");
		} else if (kode == 1) {
			$.notify("Sukses Ubah Data", "success");
		} else if (kode == 2) {
			$.notify("Sukses Hapus Data", "success");
		}
	}
	
	function tdgagalalert() {
		$.notify("Gagal Memproses Data", "error");
	}
	
	function kuranglengkap() {
		$.notify("Data Tidak Lengkap", "error");
	}

	function kebutuhantindakan() {
		$('#tdtindakan').select2();
	}

	function kebutuhanbhp() {
		$('#bhpbhp').select2();
	}

	$(function () {
		kebutuhantindakan();
		kebutuhanbhp();
	});

	function tdtindakan() {
		var tpp = $("#tdtindakan").val();
		$.ajax({
			url: "<?php echo site_url();?>/ihemodialisa/untukpilihantindakan",
			type: "GET",
			data : {kdt: tpp},
		}).then(function (data) {
			$("#jasa").val('');
			var t = JSON.parse(data);
			$("#jasa").val(t.jasas);
		});
	}

	function bhpbhp() {
		var tpp = $("#bhpbhp").val();
		$.ajax({
			url: "<?php echo site_url();?>/ihemodialisa/untukpilihanbihp",
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

	function simpandatatindakan() {
		modalload();
		var notrans = document.getElementById("notrans").value;
		var notransin = document.getElementById("notransin").value;
		var tdtindakan = $("#tdtindakan").val();
		var tdtindakantext = $("#tdtindakan option:selected" ).text();
		var kdunit = document.getElementById("kdunit").value;
		var unit = document.getElementById("unit").value;
		var tddiskon = document.getElementById("tddiskon").value;
		var tdumum = $("#tdumum").prop('checked');
		var hemtgl = document.getElementById("hemtgl").value;
		if ((tdtindakan == "")) {
			modalloadtutup();
			kuranglengkap();
			return;
		}
		$.ajax({
			url: "<?php echo site_url();?>/ihemodialisa/layanantindakan",
			type: "GET",
			data : {
				tdtindakan: tdtindakan, 
				tdtindakantext: tdtindakantext,
				notrans: notrans,
				notransin: notransin,
				unit: unit,
				kdunit: kdunit,
				tddiskon: tddiskon,
				tdumum: tdumum,
				hemtgl: hemtgl
			},
			success: function (ajaxData){
				var t = $.parseJSON(ajaxData);
				
				if (t.stat == true) {
					tdsuksesalert(0);
					$("#tabeltindakan tbody tr").remove();
					$("#tabeltindakan tbody").append(t.dtview);
					modalloadtutup();
				} else {
					tdgagalalert();
					modalloadtutup();
				}
			},
			error: function (ajaxData) {
				tdgagalalert();
				modalloadtutup();
			}
		});
	}

	function simpandatabhp() {
		modalload();
		var notrans = document.getElementById("notrans").value;
		var bhpbhp = $("#bhpbhp").val();
		var bhpbhptext = $("#bhpbhp option:selected" ).text();
		var kdunit = document.getElementById("kdunit").value;
		var unit = document.getElementById("unit").value;
		var bhpqty = document.getElementById("bhpqty").value;
		var bhpstauan = document.getElementById("bhpstauan").value;
		var bhpharga = document.getElementById("bhpharga").value;
		var bhpdiskon = document.getElementById("bhpdiskon").value;
		var bhpumum = $("#bhpumum").prop('checked');
		var bhpulang = $("#bhpulang").prop('checked');
		var hemtgl = document.getElementById("hemtgl").value;
		if ((bhpbhp == "") || (bhpqty == "") || (bhpstauan == "") || (bhpharga == "")) {
			modalloadtutup();
			kuranglengkap();
			return;
		}
		$.ajax({
			url: "<?php echo site_url();?>/ihemodialisa/layananbhp",
			type: "GET",
			data : {
				notrans: notrans,
				bhpbhp: bhpbhp,
				bhpbhptext: bhpbhptext,
				unit: unit,
				kdunit: kdunit,
				bhpqty: bhpqty,
				bhpstauan: bhpstauan,
				bhpharga: bhpharga,
				bhpdiskon : bhpdiskon,
				bhpumum : bhpumum,
				bhpulang : bhpulang,
				hemtgl: hemtgl
			},
			success: function (ajaxData){
				var t = $.parseJSON(ajaxData);
				
				if (t.stat == true) {
					tdsuksesalert(0);
					$("#tabelbhp tbody tr").remove();
					$("#tabelbhp tbody").append(t.dtview);
					modalloadtutup();
				} else {
					tdgagalalert();
					modalloadtutup();
				}
			},
			error: function (ajaxData) {
				tdgagalalert();
				modalloadtutup();
			}
		});
	}

	function ubahtindakan() {
		modalload();
		$.ajax({
			url: "<?php echo site_url();?>/ihemodialisa/kelolaformtindakan",
			type: "GET",
			success: function (ajaxData){
				$("#formtindakan").html(ajaxData);
				modalloadtutup();
			},
			error: function (ajaxData) {
				modalloadtutup();
			}
		});
	}

	function ubahtindakanedit(id) {
		modalload();
		$.ajax({
			url: "<?php echo site_url();?>/ihemodialisa/kelolaformtindakanedit",
			type: "GET",
			data : {id: id},
			success: function (ajaxData){
				$("#formtindakan").html(ajaxData);
				modalloadtutup();
			},
			error: function (ajaxData) {
				modalloadtutup();
			}
		});
	}

	function ubahdatatindakan(id) {
		modalload();
		var notrans = document.getElementById("notrans").value;
		var notransin = document.getElementById("notransin").value;
		var tdtindakan = $("#tdtindakan").val();
		var tdtindakantext = $("#tdtindakan option:selected" ).text();
		var kdunit = document.getElementById("kdunit").value;
		var unit = document.getElementById("unit").value;
		var tddiskon = document.getElementById("tddiskon").value;
		var tdumum = $("#tdumum").prop('checked');
		var hemtgl = document.getElementById("hemtgl").value;
		if ((tdtindakan == "")) {
			modalloadtutup();
			kuranglengkap();
			return;
		}
		$.ajax({
			url: "<?php echo site_url();?>/ihemodialisa/layanantindakanubah",
			type: "GET",
			data : {
				id: id,
				tdtindakan: tdtindakan, 
				tdtindakantext: tdtindakantext,
				notrans: notrans,
				notransin: notransin,
				unit: unit,
				kdunit: kdunit,
				tddiskon: tddiskon,
				tdumum: tdumum,
				hemtgl: hemtgl
			},
			success: function (ajaxData){
				var t = $.parseJSON(ajaxData);
				
				if (t.stat == true) {
					tdsuksesalert(1);
					$("#tabeltindakan tbody tr").remove();
					$("#tabeltindakan tbody").append(t.dtview);
					$("#formtindakan").html(t.formnya);
					modalloadtutup();
				} else {
					tdgagalalert();
					modalloadtutup();
				}
			},
			error: function (ajaxData) {
				tdgagalalert();
				modalloadtutup();
			}
		});
	}

	function hapusdatatindakan(e, id) {
		var txt = $(e).parents('tr').find("td:eq(0)").text();
		$.confirm({
			title: 'Hapus Data',
			content: 'Yakin mengahapus data ke-' + txt + '?',
			buttons: {
				batal: {
					text: 'Batal',
					btnClass: 'btn-red',
					action: function(){
						
					}
				},
				hapus: {
					text: 'Hapus',
					btnClass: 'btn-blue',
					keys: ['enter'],
					action: function(){
						var kdunit = document.getElementById("kdunit").value;
						var unit = document.getElementById("unit").value;
						var notrans = document.getElementById("notrans").value;
						var notransin = document.getElementById("notransin").value;
						$.ajax({
							url: "<?php echo site_url();?>/ihemodialisa/layanantindakanhapus",
							type: "GET",
							data : {
								id: id,
								notrans: notrans,
								notransin: notransin,
								unit: unit,
								kdunit: kdunit
							},
							success: function (ajaxData){
								var t = $.parseJSON(ajaxData);
								if (t.stat == true) {
									tdsuksesalert(2);
									$("#tabeltindakan tbody tr").remove();
									$("#tabeltindakan tbody").append(t.dtview);
									modalloadtutup();
								} else {
									tdgagalalert();
									modalloadtutup();
								}
							},
							error: function (ajaxData) {
								tdgagalalert();
								modalloadtutup();
							}
						});
					}
				}
			}
		});
	}

	function ubahbhp() {
		modalload();
		$.ajax({
			url: "<?php echo site_url();?>/ihemodialisa/kelolaformbhp",
			type: "GET",
			success: function (ajaxData){
				$("#formbhp").html(ajaxData);
				modalloadtutup();
			},
			error: function (ajaxData) {
				modalloadtutup();
			}
		});
	}

	function ubahbhpedit(id) {
		modalload();
		$.ajax({
			url: "<?php echo site_url();?>/ihemodialisa/kelolaformbhpedit",
			type: "GET",
			data : {id: id},
			success: function (ajaxData){
				$("#formbhp").html(ajaxData);
				modalloadtutup();
			},
			error: function (ajaxData) {
				modalloadtutup();
			}
		});
	}

	function ubahdatabhp(id) {
		modalload();
		var notrans = document.getElementById("notrans").value;
		var bhpbhp = $("#bhpbhp").val();
		var bhpbhptext = $("#bhpbhp option:selected" ).text();
		var kdunit = document.getElementById("kdunit").value;
		var unit = document.getElementById("unit").value;
		var bhpqty = document.getElementById("bhpqty").value;
		var bhpstauan = document.getElementById("bhpstauan").value;
		var bhpharga = document.getElementById("bhpharga").value;
		var bhpdiskon = document.getElementById("bhpdiskon").value;
		var bhpumum = $("#bhpumum").prop('checked');
		var bhpulang = $("#bhpulang").prop('checked');
		var hemtgl = document.getElementById("hemtgl").value;
		if ((bhpbhp == "") || (bhpqty == "") || (bhpstauan == "") || (bhpharga == "")) {
			modalloadtutup();
			kuranglengkap();
			return;
		}
		$.ajax({
			url: "<?php echo site_url();?>/ihemodialisa/layananbhpubah",
			type: "GET",
			data : {
				id: id,
				notrans: notrans,
				bhpbhp: bhpbhp,
				bhpbhptext: bhpbhptext,
				unit: unit,
				kdunit: kdunit,
				bhpqty: bhpqty,
				bhpstauan: bhpstauan,
				bhpharga: bhpharga,
				bhpdiskon : bhpdiskon,
				bhpumum : bhpumum,
				bhpulang : bhpulang,
				hemtgl: hemtgl
			},
			success: function (ajaxData){
				var t = $.parseJSON(ajaxData);
				
				if (t.stat == true) {
					tdsuksesalert(1);
					$("#tabelbhp tbody tr").remove();
					$("#tabelbhp tbody").append(t.dtview);
					$("#formbhp").html(t.formnya);
					modalloadtutup();
				} else {
					tdgagalalert();
					modalloadtutup();
				}
			},
			error: function (ajaxData) {
				tdgagalalert();
				modalloadtutup();
			}
		});
	}

	function hapusdatabhp(e, id) {
		var txt = $(e).parents('tr').find("td:eq(0)").text();
		$.confirm({
			title: 'Hapus Data',
			content: 'Yakin mengahapus data ke-' + txt + '?',
			buttons: {
				batal: {
					text: 'Batal',
					btnClass: 'btn-red',
					action: function(){
					}
				},
				hapus: {
					text: 'Hapus',
					btnClass: 'btn-blue',
					keys: ['enter'],
					action: function(){
						var kdunit = document.getElementById("kdunit").value;
						var unit = document.getElementById("unit").value;
						var notrans = document.getElementById("notrans").value;
						$.ajax({
							url: "<?php echo site_url();?>/ihemodialisa/layananbhphapus",
							type: "GET",
							data : {
								id: id,
								notrans: notrans,
								unit: unit,
								kdunit: kdunit
							},
							success: function (ajaxData){
								var t = $.parseJSON(ajaxData);
								if (t.stat == true) {
									tdsuksesalert(2);
									$("#tabelbhp tbody tr").remove();
									$("#tabelbhp tbody").append(t.dtview);
									modalloadtutup();
								} else {
									tdgagalalert();
									modalloadtutup();
								}
							},
							error: function (ajaxData) {
								tdgagalalert();
								modalloadtutup();
							}
						});
					}
				}
			}
		});
	}


</script>

