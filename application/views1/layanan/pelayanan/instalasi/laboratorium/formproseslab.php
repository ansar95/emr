<div class="modal-dialog modal-xl" role="document">
	<div class="modal-content">
		<!-- <div class="box box-default box-solid" id="proseskotak"> -->
		<div class="modal-header p-1 pl-3 align-text-bottom">
			<b class="modal-title" id="exampleModalLabel">Pelayanan Instalasi Laboratorium</b>
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
							<input type="text" class="form-control" name="nrm" id="nrm" value="<?php echo $dtproseslab->no_rm; ?>" disabled>
						</div>
					</div>
					<div class="form-group row col-spacing-row">
						<label class="col-md-3 col-form-label">No. Transaksi</label>
						<div class="col-md-9">
							<input type="text" name="notransin" id="notransin" value="<?php echo $dtproseslab->notransaksi_IN; ?>" hidden disabled>
							<input type="text" class="form-control" name="notrans" id="notrans" value="<?php echo $dtproseslab->notransaksi; ?>" disabled>
						</div>
					</div>
					<div class="form-group row col-spacing-row">
						<label class="col-md-3 col-form-label">Golongan</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="tdgolongan" id="tdgolongan" value="<?php echo $dtproseslab->golongan; ?>" disabled>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group row col-spacing-row">
						<label class="col-md-3 col-form-label">Nama</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="pj" value="<?php echo $dtproseslab->nama_pasien; ?>" disabled>
						</div>
					</div>
					<div class="form-group row col-spacing-row">
						<label class="col-md-3 col-form-label">Tanggal</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="labtgl" id="labtgl" value="<?php echo tanggaldua($dtproseslab->tanggal); ?>" disabled>
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
									Pemeriksaan
								</div>
							</div>
						</a>
					</li>
					<li class="nav-item mr-auto mb-4">
						<a class="nav-link p-0" data-toggle="tab" href="#tab_2">
							<div class="d-flex">
								<div class="media-body font-weight-bold align-self-center mb-3">
									<!-- <h6 class="mb-0 text-uppercase font-weight-bold">Pemakaian BHP / Obat</h6> -->
									Pemakaian BHP
								</div>
							</div>
						</a>
					</li>
					<li class="nav-item mr-auto mb-4">
						<a class="nav-link p-0" data-toggle="tab" href="#hasiltab">
							<div class="d-flex">
								<div class="media-body font-weight-bold align-self-center mb-3">
									<!-- <h6 class="mb-0 text-uppercase font-weight-bold">Pemakaian O2</h6> -->
									Hasil Pemeriksaan
								</div>
							</div>
						</a>
					</li>
					<li class="nav-item mr-auto mb-4 w-50">
					</li>
				</ul>
			</div>
			<div class="tab-content">
				<div class="tab-pane fade active show" id="tab_1">
					<div class="d-flex justify-content-between mb-4">
						<button class="btn btn-sm btn-secondary" type="button" data-toggle="collapse" data-target="#collapseTab1" aria-expanded="false" aria-controls="collapseExample">
							Tampilkan pemeriksaan
						</button>
						<button onclick="kirimorder()" type="button" class="btn btn-sm btn-danger"><i class="fas fa-paper-plane"></i> &nbsp;KIRIM ke LIS</button>
					</div>
					<div class="collapse" id="collapseTab1">
						<div class="table-responsive">
							<table class="table table-striped" id="tabeltindakan">
								<thead>
									<tr>
										<th width="3%">No.</th>
										<th>Pemeriksaan</th>
										<th width="15%">
											<div align="right">Harga</div>
										</th>
										<!-- <th width="5%">UM/ASR</th> -->
										<th width="10%">
											<div align="center">IdPaketLIS</div>
										</th>
										<th width='5%'>Action</th>
										<!-- <th width='45%'></th> -->
									</tr>
								</thead>
								<tbody>
									<?php
									if ($datatindakaninstalasi == NULL) {
									?>
										<tr>
											<td colspan="100%" class="text-center">
												Tidak Ada Data
											</td>
										</tr>
										<?php } else {
										$no = 1;
										$totalharga = 0;
										foreach ($datatindakaninstalasi as $row) {
											echo "<tr><td>" . $no++ . ".</td>";
											echo "<td>" . $row->tindakan . "</td>";
											echo "<td align='right'>" . formatuang($row->jasas) . "</td>";
											// if ($row->nonasuransi==1){echo "<td>UMUM</td>";} else {echo "<td>ASR</td>";} 
											echo "<td align='center'>" . $row->idlis . "</td>";
											$totalharga = $totalharga + $row->jasas;
										?>
											<td class="text-center">
												<!-- <a onclick="ubahtindakanedit(<?php echo $row->id; ?>)" class="btn-sm btn-info btn-flat"><i class="fa fa-edit"></i></a> -->
												<button onclick="hapusdatatindakan(this, <?php echo $row->id; ?>)" class="btn-sm btn-danger btn"><i class="fa fa-trash"></i></button>
											</td>
									<?php
											echo "</tr>";
										}
										echo "<td>" . "" . "</td>";
										echo "<td align='right'>" . "Total Harga" . "</td>";
										echo "<td align='right' style='background-color: lightblue;'>" . formatuang($totalharga) . "</td>";
									} ?>
								</tbody>
							</table>
						</div>
					</div>
					<b class="my-4">Pemeriksaan</b>
					<div class="row" id="formtindakan">
						<?php
						foreach ($dttindakan as $row) {
							$checkedStatus = "";
							$dtchecklabArr = explode(",", $dtpilihantind);
							if (in_array($row->kode_tindakan, $dtchecklabArr)) {
								$checkedStatus = "checked";
							}
						?>
							<div class="col-md-3">
								<div class="custom-control custom-checkbox custom-control-inline">
									<input type="checkbox" class="custom-control-input" name="tnd" id="<?php echo $row->kode_tindakan; ?>" <?php echo $checkedStatus; ?> value="<?php echo $row->kode_tindakan; ?>">
									<label class="custom-control-label" for="<?php echo $row->kode_tindakan; ?>"><?php echo $row->tindakan; ?></label>
								</div>
							</div>
						<?php
						}
						?>
					</div>
					<div class="col-md-12 text-right">
						<button onclick="simpandatatindakan();" class="btn btn-primary">Simpan</button>
					</div>
				</div>
				<div class="tab-pane fade" id="tab_2">
					<h6 class="mb-4">Bahan Habis Pakai</h6>
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
									<th width="5%">UM/ASR</th>
									<th width="5%">Diskon</th>
									<th width="10%">Sub Total</th>
									<th width='10%'>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
								if ($databhpinstalasi == NULL) {
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
									foreach ($databhpinstalasi as $row) {
										$r = ($row->qty * $row->hargapakai) - $row->diskon;
										echo "<tr><td>" . $nob++ . ".</td>";
										echo "<td>" . tanggaldua($row->tanggal) . "</td>";
										echo "<td>" . $row->namaobat . "</td>";
										echo "<td>" . $row->satuanpakai . "</td>";
										echo "<td>" . $row->hargapakai . "</td>";
										echo "<td>" . $row->qty . "</td>";
										if ($row->nonasuransi == 1) {
											echo "<td>UMUM</td>";
										} else {
											echo "<td>ASR</td>";
										}
										echo "<td>" . $row->diskon . "</td>";
										echo "<td>" . $r . "</td>";
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
									echo "<td>" . $qty . "</td>";
									echo "<td colspan='2'></td>";
									echo "<td colspan='2'>" . $jml . "</td>";
									echo "</tr>";
								} ?>
							</tbody>
						</table>
					</div>
					<div class="row" id="formbhp">
						<div class="col-md-6">
							<div class="form-group row col-spacing-row">
								<label class="col-md-3 col-form-label">BHP</label>
								<div class="col-md-9">
									<select class="form-control" style="width: 100%;" name="bhpbhp" id="bhpbhp" onchange="bhpbhp();">
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
								<div class="col-md-9">
									<input type="number" class="form-control" name="bhpqty" id="bhpqty" value="0">
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
										<input type="checkbox" class="custom-control-input" name="bhpdumum" id="bhpdumum" <?php if (trim($dtproseslab->golongan) == "UMUM") {
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
				<div class="tab-pane fade" id="hasiltab">
					<div class="d-flex justify-content-between mb-4">
						<h6>Hasil Pemeriksaan</h6>
						<button onclick="gethasil();" class="btn btn-sm btn-success pull-right"><i class='fas fa-download'></i> Ambil Data LIS</button>
					</div>
					<div class="table-responsive">
						<table class="table table-striped" id="tabelhasil">
							<thead>
								<tr>
									<th width="5%">
										<div align="center">No.</div>
									</th>
									<th>Pemeriksaan</th>
									<th width="12%">
										<div align="center">Hasil</div>
									</th>
									<th width="15%">
										<div align="center">Unit Tes</div>
									</th>
									<th width="20%">
										<div align="center">Nilai Normal</div>
									<th width="28%"></th>
								</tr>
							</thead>
							<tbody>
								<?php
								if ($datahasilperiksa == NULL) {
								?>
									<tr>
										<td colspan="6" class="text-center">
											Tidak Ada Data
										</td>
									</tr>
									<?php } else {
									$no = 1;
									foreach ($datahasilperiksa as $row) {
										echo "<tr><td align='center'>" . $no++ . ".</td>";
										echo "<td>" . $row->pemeriksaan . "</td>";

										if (trim($row->kritis) == "") {
											if (trim($row->flag) == "") {
												echo "<td align='center'>" . $row->hasil . "</td>";
											} else {
												echo "<td bgcolor='yellow' align='center'>" . $row->hasil . "</td>";
											}
										} else {
											echo "<td bgcolor='red' align='center'><font color='#fff'>" . $row->hasil . "</font></td>";
										}

										echo "<td align='center'>" . $row->unittes . "</td>";
										echo "<td align='center'>" . $row->nilainormal . "</td>";
										echo "<td></td>";
									?>
										<!-- <td class="text-center">
																	<a onclick="ubahhasiledit(<?php echo $row->id; ?>)" class="btn-sm btn-info btn-flat"><i class="fa fa-edit"></i></a>
																	<a onclick="hapusdatahasil(this, <?php echo $row->id; ?>)" class="btn-sm btn-danger btn-flat"><i class="fa fa-trash"></i></a>
																</td> -->
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
</div>


<script>
	function modalload() {
		$("#proseskotak").append('<div id="oload" class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
	}

	function modalloadtutup() {
		$("#oload").remove();
	}

	function tutupmodal() {
		$(function() {
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
		} else if (kode == 3) {
			$.notify("Sukses Tarik Data LIS", "success");
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
		$('#tdsampel').select2();
	}

	function kebutuhanbhp() {
		$('#bhpbhp').select2();
	}

	function kebutuhanhasil() {
		$('#hsjenis').select2();
		$('#hsitem').select2();
	}

	$(function() {
		kebutuhantindakan();
		kebutuhanbhp();
		kebutuhanhasil();
	});

	function tdtindakan() {
		var tpp = $("#tdtindakan").val();
		$.ajax({
			url: "<?php echo site_url(); ?>/ilaboratorium/untukpilihantindakan",
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

	function bhpbhp() {
		var tpp = $("#bhpbhp").val();
		$.ajax({
			url: "<?php echo site_url(); ?>/ilaboratorium/untukpilihanbihp",
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

	function simpandatatindakan() {
		modalload();
		var notrans = document.getElementById("notrans").value;
		var notransin = document.getElementById("notransin").value;
		var norm = document.getElementById("nrm").value;
		var kdunit = document.getElementById("kdunit").value;
		var unit = document.getElementById("unit").value;
		var labtgl = document.getElementById("labtgl").value;
		var nrm = document.getElementById("nrm").value;

		var markedCheckbox = document.getElementsByName('tnd');
		var hasil = '';
		for (var checkbox of markedCheckbox) {
			if (checkbox.checked) {
				document.body.append(checkbox.value + ' ');
				hasil = hasil + (checkbox.value + '_');
			}
		}
		console.log(hasil);

		if ((hasil == '')) {
			modalloadtutup();
			kuranglengkap();
			return;
		}

		$.ajax({
			url: "<?php echo site_url(); ?>/ilaboratorium/layanantindakan_new",
			type: "GET",
			data: {
				notrans: notrans,
				notransin: notransin,
				unit: unit,
				kdunit: kdunit,
				nrm: nrm,
				labtgl: labtgl,
				hasil: hasil
			},
			success: function(ajaxData) {
				console.log(ajaxData);
				var t = $.parseJSON(ajaxData);
				// if (t.stat == true) {
				tdsuksesalert(0);
				$("#tabeltindakan tbody tr").remove();
				$("#tabeltindakan tbody").append(t.dtview);
				modalloadtutup();
				// } else {
				// tdgagalalert();
				// modalloadtutup();
				// }
			},
			error: function(ajaxData) {
				tdgagalalert();
				modalloadtutup();
			}
		});
	}

	function simpandatabhp() {
		modalload();
		var notrans = document.getElementById("notrans").value;
		var bhpbhp = $("#bhpbhp").val();
		var bhpbhptext = $("#bhpbhp option:selected").text();
		var kdunit = document.getElementById("kdunit").value;
		var unit = document.getElementById("unit").value;
		var bhpqty = document.getElementById("bhpqty").value;
		var bhpstauan = document.getElementById("bhpstauan").value;
		var bhpharga = document.getElementById("bhpharga").value;
		var bhpdiskon = document.getElementById("bhpdiskon").value;
		var bhpumum = $("#bhpumum").prop('checked');
		var labtgl = document.getElementById("labtgl").value;
		if ((bhpbhp == "") || (bhpqty == "") || (bhpstauan == "") || (bhpharga == "")) {
			modalloadtutup();
			kuranglengkap();
			return;
		}
		$.ajax({
			url: "<?php echo site_url(); ?>/ilaboratorium/layananbhp",
			type: "GET",
			data: {
				notrans: notrans,
				bhpbhp: bhpbhp,
				bhpbhptext: bhpbhptext,
				unit: unit,
				kdunit: kdunit,
				bhpqty: bhpqty,
				bhpstauan: bhpstauan,
				bhpharga: bhpharga,
				bhpdiskon: bhpdiskon,
				bhpumum: bhpumum,
				labtgl: labtgl
			},
			success: function(ajaxData) {
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
			error: function(ajaxData) {
				tdgagalalert();
				modalloadtutup();
			}
		});
	}

	function ubahtindakan() {
		modalload();
		$.ajax({
			url: "<?php echo site_url(); ?>/ilaboratorium/kelolaformtindakan",
			type: "GET",
			success: function(ajaxData) {
				$("#formtindakan").html(ajaxData);
				modalloadtutup();
			},
			error: function(ajaxData) {
				modalloadtutup();
			}
		});
	}

	function ubahtindakanedit(id) {
		modalload();
		$.ajax({
			url: "<?php echo site_url(); ?>/ilaboratorium/kelolaformtindakanedit",
			type: "GET",
			data: {
				id: id
			},
			success: function(ajaxData) {
				$("#formtindakan").html(ajaxData);
				modalloadtutup();
			},
			error: function(ajaxData) {
				modalloadtutup();
			}
		});
	}

	function ubahdatatindakan(id) {
		modalload();
		var notrans = document.getElementById("notrans").value;
		var notransin = document.getElementById("notransin").value;
		var tdtindakan = $("#tdtindakan").val();
		var tdtindakantext = $("#tdtindakan option:selected").text();
		var kdunit = document.getElementById("kdunit").value;
		var unit = document.getElementById("unit").value;
		var tddiskon = document.getElementById("tddiskon").value;
		var tdumum = $("#tdumum").prop('checked');
		var labtgl = document.getElementById("labtgl").value;
		// var tdsampel = $("#tdsampel option:selected" ).text();
		// var tddiag = document.getElementById("tddiag").value;

		if ((tdtindakan == "")) {
			modalloadtutup();
			kuranglengkap();
			return;
		}
		$.ajax({
			url: "<?php echo site_url(); ?>/ilaboratorium/layanantindakanubah",
			type: "GET",
			data: {
				id: id,
				tdtindakan: tdtindakan,
				tdtindakantext: tdtindakantext,
				notrans: notrans,
				notransin: notransin,
				unit: unit,
				kdunit: kdunit,
				tddiskon: tddiskon,
				tdumum: tdumum,
				labtgl: labtgl
				// tdsampel : tdsampel,
				// tddiag : tddiag
			},
			success: function(ajaxData) {
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
			error: function(ajaxData) {
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
					action: function() {

					}
				},
				hapus: {
					text: 'Hapus',
					btnClass: 'btn-blue',
					keys: ['enter'],
					action: function() {
						var kdunit = document.getElementById("kdunit").value;
						var unit = document.getElementById("unit").value;
						var notrans = document.getElementById("notrans").value;
						var notransin = document.getElementById("notransin").value;
						$.ajax({
							url: "<?php echo site_url(); ?>/ilaboratorium/layanantindakanhapus",
							type: "GET",
							data: {
								id: id,
								notrans: notrans,
								notransin: notransin,
								unit: unit,
								kdunit: kdunit
							},
							success: function(ajaxData) {
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
							error: function(ajaxData) {
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
			url: "<?php echo site_url(); ?>/ilaboratorium/kelolaformbhp",
			type: "GET",
			success: function(ajaxData) {
				$("#formbhp").html(ajaxData);
				modalloadtutup();
			},
			error: function(ajaxData) {
				modalloadtutup();
			}
		});
	}

	function ubahbhpedit(id) {
		modalload();
		$.ajax({
			url: "<?php echo site_url(); ?>/ilaboratorium/kelolaformbhpedit",
			type: "GET",
			data: {
				id: id
			},
			success: function(ajaxData) {
				$("#formbhp").html(ajaxData);
				modalloadtutup();
			},
			error: function(ajaxData) {
				modalloadtutup();
			}
		});
	}

	function ubahdatabhp(id) {
		modalload();
		var notrans = document.getElementById("notrans").value;
		var bhpbhp = $("#bhpbhp").val();
		var bhpbhptext = $("#bhpbhp option:selected").text();
		var kdunit = document.getElementById("kdunit").value;
		var unit = document.getElementById("unit").value;
		var bhpqty = document.getElementById("bhpqty").value;
		var bhpstauan = document.getElementById("bhpstauan").value;
		var bhpharga = document.getElementById("bhpharga").value;
		var bhpdiskon = document.getElementById("bhpdiskon").value;
		var bhpumum = $("#bhpumum").prop('checked');
		var labtgl = document.getElementById("labtgl").value;
		if ((bhpbhp == "") || (bhpqty == "") || (bhpstauan == "") || (bhpharga == "")) {
			modalloadtutup();
			kuranglengkap();
			return;
		}
		$.ajax({
			url: "<?php echo site_url(); ?>/ilaboratorium/layananbhpubah",
			type: "GET",
			data: {
				id: id,
				notrans: notrans,
				bhpbhp: bhpbhp,
				bhpbhptext: bhpbhptext,
				unit: unit,
				kdunit: kdunit,
				bhpqty: bhpqty,
				bhpstauan: bhpstauan,
				bhpharga: bhpharga,
				bhpdiskon: bhpdiskon,
				bhpumum: bhpumum,
				labtgl: labtgl
			},
			success: function(ajaxData) {
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
			error: function(ajaxData) {
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
					action: function() {}
				},
				hapus: {
					text: 'Hapus',
					btnClass: 'btn-blue',
					keys: ['enter'],
					action: function() {
						var kdunit = document.getElementById("kdunit").value;
						var unit = document.getElementById("unit").value;
						var notrans = document.getElementById("notrans").value;
						$.ajax({
							url: "<?php echo site_url(); ?>/ilaboratorium/layananbhphapus",
							type: "GET",
							data: {
								id: id,
								notrans: notrans,
								unit: unit,
								kdunit: kdunit
							},
							success: function(ajaxData) {
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
							error: function(ajaxData) {
								tdgagalalert();
								modalloadtutup();
							}
						});
					}
				}
			}
		});
	}

	function changejenislab(status) {
		$.getJSON('<?php echo site_url(); ?>/ilaboratorium/carijenislab/' + $("#hsjenis").val(), function(data) {
			var temp = [];
			$.each(data, function(key, value) {
				temp.push({
					v: value,
					k: key
				});
			});
			temp.sort(function(a, b) {
				if (a.v > b.v) {
					return 1
				}
				if (a.v < b.v) {
					return -1
				}
				return 0;
			});
			$('#hsitem').empty();
			$('#hsitem').append('<option value="0">--Pilih--</option>');
			$.each(temp, function(key, obj) {
				if (status == 0) {
					if (obj.k == kodehasilitem) {
						$('#hsitem').append('<option value="' + obj.k + '" selected>' + obj.v + '</option>');
					} else {
						$('#hsitem').append('<option value="' + obj.k + '">' + obj.v + '</option>');
					}
				} else {
					$('#hsitem').append('<option value="' + obj.k + '">' + obj.v + '</option>');
				}
			});
		});
	}

	function simpandatahasil() {
		modalload();
		var notrans = document.getElementById("notrans").value;
		var notransin = document.getElementById("notransin").value;
		var hsjenis = $("#hsjenis").val();
		var hsjenistext = $("#hsjenis option:selected").text();
		var hsitem = $("#hsitem").val();
		var hsitemtext = $("#hsitem option:selected").text();
		var resul = $.trim($("#resul").val());
		var kdunit = document.getElementById("kdunit").value;
		var unit = document.getElementById("unit").value;
		var labtgl = document.getElementById("labtgl").value;
		if ((hsjenis == "") || (hsitem == "") || (resul == "")) {
			modalloadtutup();
			kuranglengkap();
			return;
		}
		$.ajax({
			url: "<?php echo site_url(); ?>/ilaboratorium/layananhasil",
			type: "GET",
			data: {
				notrans: notrans,
				notransin: notransin,
				hsjenis: hsjenis,
				hsjenistext: hsjenistext,
				hsitem: hsitem,
				hsitemtext: hsitemtext,
				resul: resul,
				kdunit: kdunit,
				unit: unit,
				labtgl: labtgl
			},
			success: function(ajaxData) {
				var t = $.parseJSON(ajaxData);

				if (t.stat == true) {
					tdsuksesalert(0);
					$("#tabelhasil tbody tr").remove();
					$("#tabelhasil tbody").append(t.dtview);
					modalloadtutup();
				} else {
					tdgagalalert();
					modalloadtutup();
				}
			},
			error: function(ajaxData) {
				tdgagalalert();
				modalloadtutup();
			}
		});
	}

	function ubahhasil() {
		modalload();
		$.ajax({
			url: "<?php echo site_url(); ?>/ilaboratorium/kelolaformhasil",
			type: "GET",
			success: function(ajaxData) {
				$("#formhasil").html(ajaxData);
				modalloadtutup();
			},
			error: function(ajaxData) {
				modalloadtutup();
			}
		});
	}

	function ubahhasiledit(id) {
		modalload();
		$.ajax({
			url: "<?php echo site_url(); ?>/ilaboratorium/kelolaformhasiledit",
			type: "GET",
			data: {
				id: id
			},
			success: function(ajaxData) {
				$("#formhasil").html(ajaxData);
				modalloadtutup();
			},
			error: function(ajaxData) {
				modalloadtutup();
			}
		});
	}

	function ubahdatahasil(id) {
		modalload();
		var notrans = document.getElementById("notrans").value;
		var notransin = document.getElementById("notransin").value;
		var hsjenis = $("#hsjenis").val();
		var hsjenistext = $("#hsjenis option:selected").text();
		var hsitem = $("#hsitem").val();
		var hsitemtext = $("#hsitem option:selected").text();
		var resul = $.trim($("#resul").val());
		// var kdunit = document.getElementById("kdunit").value;
		// var unit = document.getElementById("unit").value;
		// var labtgl = document.getElementById("labtgl").value;
		if ((hsjenis == "") || (hsitem == "") || (hsjenis == null) || (hsitem == null) || (resul == "")) {
			modalloadtutup();
			kuranglengkap();
			return;
		}
		console.log(hsitem);
		$.ajax({
			url: "<?php echo site_url(); ?>/ilaboratorium/layananhasilubah",
			type: "GET",
			data: {
				id: id,
				notrans: notrans,
				notransin: notransin,
				hsjenis: hsjenis,
				hsjenistext: hsjenistext,
				hsitem: hsitem,
				hsitemtext: hsitemtext,
				resul: resul
			},
			processData: true,
			contentType: false,
			success: function(ajaxData) {
				var t = $.parseJSON(ajaxData);

				if (t.stat == true) {
					tdsuksesalert(1);
					$("#tabelhasil tbody tr").remove();
					$("#tabelhasil tbody").append(t.dtview);
					$("#formhasil").html(t.formnya);
					modalloadtutup();
				} else {
					tdgagalalert();
					modalloadtutup();
				}
			},
			error: function(ajaxData) {
				tdgagalalert();
				modalloadtutup();
			}
		});
	}

	function hapusdatahasil(e, id) {
		var txt = $(e).parents('tr').find("td:eq(0)").text();
		$.confirm({
			title: 'Hapus Data',
			content: 'Yakin menghapus data ke-' + txt + '?',
			buttons: {
				batal: {
					text: 'Batal',
					btnClass: 'btn-red',
					action: function() {

					}
				},
				hapus: {
					text: 'Hapus',
					btnClass: 'btn-blue',
					keys: ['enter'],
					action: function() {
						var kdunit = document.getElementById("kdunit").value;
						var unit = document.getElementById("unit").value;
						var notrans = document.getElementById("notrans").value;
						var notransin = document.getElementById("notransin").value;
						$.ajax({
							url: "<?php echo site_url(); ?>/ilaboratorium/layananhasilhapus",
							type: "GET",
							data: {
								id: id,
								notrans: notrans,
								notransin: notransin,
								unit: unit,
								kdunit: kdunit
							},
							success: function(ajaxData) {
								var t = $.parseJSON(ajaxData);
								if (t.stat == true) {
									tdsuksesalert(2);
									$("#tabelhasil tbody tr").remove();
									$("#tabelhasil tbody").append(t.dtview);
									modalloadtutup();
								} else {
									tdgagalalert();
									modalloadtutup();
								}
							},
							error: function(ajaxData) {
								tdgagalalert();
								modalloadtutup();
							}
						});
					}
				}
			}
		});
	}

	function kirimkelis() {
		$.ajax({
			url: "<?php echo site_url(); ?>/ilaboratorium/kirim_ke_lis",
			type: "GET",
			data: {
				// status : status
			},
			success: function(ajaxData) {
				var t = $.parseJSON(ajaxData);
				console.log('ok');
				console.log(t.status);
				console.log(t.token);
				// alert('token berhasil');
				// $("#token").val(t.token);

			}
		});
	}

	function kirimorder() {
		var unit = document.getElementById("unit").value;
		var notrans = document.getElementById("notrans").value;
		var notransin = document.getElementById("notransin").value;
		$.ajax({
			url: "<?php echo site_url(); ?>/ilaboratorium/kirim_order_ambiltoken",
			type: "GET",
			data: {
				notransin: notransin,
				notrans: notrans
			},
			success: function(ajaxData) {
				console.log(notransin);
				// console.log(notrans);
				var t = JSON.parse(ajaxData);
				console.log(ajaxData);
				// console.log(t.status);
				// console.log(t.token);
				token = t.token;
				$.ajax({
					url: "<?php echo site_url(); ?>/ilaboratorium/kirim_order",
					type: "GET",
					data: {
						token: token,
						notransin: notransin
					},
					success: function(ajaxData1) {
						console.log(ajaxData1);
					},
					error: function(ajaxData1) {
						tdgagalalert();
					}
				});
			},
			error: function(ajaxData) {
				tdgagalalert();
			}
		});
	}


	function gethasil() {
		var unit = document.getElementById("unit").value;
		var notrans = document.getElementById("notrans").value;
		var notransin = document.getElementById("notransin").value;
		$.ajax({
			url: "<?php echo site_url(); ?>/ilaboratorium/kirim_order_ambiltoken",
			type: "GET",
			data: {
				notransin: notransin,
				notrans: notrans
			},
			success: function(ajaxData) {
				console.log(notransin);
				// console.log(notrans);
				var t = JSON.parse(ajaxData);
				console.log(ajaxData);
				// console.log(t.status);
				// console.log(t.token);
				token = t.token;
				$.ajax({
					url: "<?php echo site_url(); ?>/ilaboratorium/get_hasil",
					type: "GET",
					data: {
						token: token,
						notransin: notransin,
						notrans: notrans
					},
					success: function(ajaxData1) {
						console.log(ajaxData1);

						var t = $.parseJSON(ajaxData1);
						if (t.stat == true) {
							tdsuksesalert(3);
							$("#tabelhasil tbody tr").remove();
							$("#tabelhasil tbody").append(t.dtview);
							modalloadtutup();
						} else {
							tdgagalalert();
							modalloadtutup();
						}

					},
					error: function(ajaxData1) {
						tdgagalalert();
					}
				});
			},
			error: function(ajaxData) {
				tdgagalalert();
			}
		});
	}


	function gethasil_old() {
		var unit = document.getElementById("unit").value;
		var notrans = document.getElementById("notrans").value;
		var notransin = document.getElementById("notransin").value;
		$.ajax({
			url: "<?php echo site_url(); ?>/ilaboratorium/get_hasil",
			type: "GET",
			data: {
				notransin: notransin,
				notrans: notrans
			},
			success: function(ajaxData) {
				var t = JSON.parse(ajaxData);
				console.log('ok');
				console.log(t.pemeriksaan.hasil);
			},
			error: function(ajaxData) {
				tdgagalalert();
			}
		});
	}
</script>