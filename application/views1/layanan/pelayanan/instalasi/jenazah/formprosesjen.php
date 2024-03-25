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
							<input type="text" class="form-control" name="no_rm" id="no_rm" value="<?php echo $dtprosesjen->no_rm; ?>" disabled>
						</div>
					</div>
					<div class="form-group row col-spacing-row">
						<label class="col-md-3 col-form-label">No. Transaksi</label>
						<div class="col-md-9">
							<input type="text" name="notransin" id="notransin" value="<?php echo $dtprosesjen->notransaksi_IN; ?>" hidden disabled>
							<input type="text" class="form-control" name="notrans" id="notrans" value="<?php echo $dtprosesjen->notransaksi; ?>" disabled>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group row col-spacing-row">
						<label class="col-md-3 col-form-label">Nama Pasien</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="nama_pasien" id="nama_pasien" value="<?php echo $dtprosesjen->nama_pasien; ?>" disabled>
						</div>
					</div>
					<div class="form-group row col-spacing-row">
						<label class="col-md-3 col-form-label">Tanggal</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="jentgl" id="jentgl" value="<?php echo tanggaldua($dtprosesjen->tanggal); ?>" disabled>
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
									Tindakan atau Pemeriksaan
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
					<li class="nav-item mr-auto mb-4 w-50">
					</li>
				</ul>
			</div>
			<div class="tab-content">
				<div class="tab-pane fade active show" id="tab_1">
					<b class="my-4">Tindakan</b>
					<div class="table-responsive">
						<table class="table table-striped" id="tabeltindakan">
							<thead>
								<tr>
									<th width="5%">No.</th>
									<th>Tindakan</th>
									<th width="30%">Dokter</th>
									<th width="10%" align='right'>Harga</th>
									<th width="5%">UM/ASR</th>
									<th width="5%">Diskon</th>
									<th width='10%'>Action</th>
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
									foreach ($datatindakaninstalasi as $row) {
										echo "<tr><td>" . $no++ . ".</td>";
										echo "<td>" . $row->tindakan . "</td>";
										echo "<td>" . $row->nama_dokter . "</td>";
										echo "<td>" . $row->jasas . "</td>";
										if ($row->nonasuransi == 1) {
											echo "<td>UMUM</td>";
										} else {
											echo "<td>ASR</td>";
										}
										echo "<td>" . $row->diskon . "</td>";
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
									<input type="text" class="form-control" name="tgljen" id="tgljen">
								</div>
							</div>
							<div class="form-group row col-spacing-row">
								<label class="col-md-3 col-form-label">Tindakan</label>
								<div class="col-md-9">
									<select class="form-control" style="width: 100%;" name="tdtindakan" id="tdtindakan" onchange="tdtindakan();">
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
								<div class="col-md-2">
									<input type="text" class="form-control" id="jasa" name="jasa" disabled>
								</div>
								<label class="col-md-2 col-form-label text-right">% Diskon</label>
								<div class="col-md-2">
									<input type="number" class="form-control" name="tddiskon" id="tddiskon" value="0">
								</div>
								<div class="col-md-3">
									<div class="custom-control custom-checkbox custom-control-inline">
										<input type="checkbox" class="custom-control-input" name="tdumum" id="tdumum">
										<label class="custom-control-label" for="tdumum">Berlaku Umum</label>
									</div>
								</div>
							</div>
							<div class="form-group row col-spacing-row">
								<label class="col-md-3 col-form-label">Catatan</label>
								<div class="col-md-9">
									<textarea rows="2" name="catatanresep" id="catatanresep" class="form-control"></textarea>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group row col-spacing-row">
								<label class="col-md-3 col-form-label">Dokter</label>
								<div class="col-md-9">
									<select class="form-control" style="width: 100%;" name="tddokter" id="tddokter">
										<option value="">--Pilih--</option>
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
								<label class="col-md-3 col-form-label">Asisten/Perawat</label>
								<div class="col-md-9">
									<select class="form-control" style="width: 100%;" name="tdperawat1" id="tdperawat1">
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
								<label class="col-md-3 col-form-label">Asisten/Perawat</label>
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
								<label class="col-md-3 col-form-label">Asisten/Perawat</label>
								<div class="col-md-9">
									<select class="form-control" style="width: 100%;" name="tdperawat3" id="tdperawat3">
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
											<button onclick="ubahbhpedit(<?php echo $row->id; ?>)" class="btn-sm btn-info btn"><i class="fa fa-edit"></i></button>
											<button onclick="hapusdatabhp(this, <?php echo $row->id; ?>)" class="btn-sm btn-danger btn"><i class="fa fa-trash"></i></button>
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
							<div class="form-group row col-spacing-row">
								<label class="col-md-3 col-form-label">% Diskon</label>
								<div class="col-md-5">
									<input type="number" class="form-control" name="bhpdiskon" id="bhpdiskon" value="0">
								</div>
								<div class="col-md-4">
									<div class="custom-control custom-checkbox custom-control-inline">
										<input type="checkbox" class="custom-control-input" name="bhpumum" id="bhpumum">
										<label class="custom-control-label" for="bhpumum">Berlaku Umum</label>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-12 text-right">
							<button onclick="simpandatabhp();" class="btn btn-primary">Simpan</button>
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
		$("#tddokter").select2();
		$("#tdperawat1").select2();
		$("#tdperawat2").select2();
		$("#tdperawat3").select2();
		$('#tgljen').datepicker({
			autoclose: true
		}).datepicker("setDate", "0");
	}

	function kebutuhanbhp() {
		$('#bhpbhp').select2();
	}

	$(function() {
		kebutuhantindakan();
		kebutuhanbhp();
	});

	function tdtindakan() {
		var tpp = $("#tdtindakan").val();
		$.ajax({
			url: "<?php echo site_url(); ?>/ijenazah/untukpilihantindakan",
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
			url: "<?php echo site_url(); ?>/ijenazah/untukpilihanbihp",
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
		var kdunit = document.getElementById("kdunit").value;
		var unit = $("#kdunit option:selected").text();
		var no_rm = document.getElementById("no_rm").value;
		var tgljen = document.getElementById("tgljen").value;
		var tdtindakan = $("#tdtindakan").val();
		var tdtindakantext = $("#tdtindakan option:selected").text();
		var kddokter = document.getElementById("tddokter").value;
		var nmdokter = $("#tddokter option:selected").text();
		var kdperawat1 = document.getElementById("tdperawat1").value;
		var nmperawat1 = $("#tdperawat1 option:selected").text();
		var kdperawat2 = document.getElementById("tdperawat2").value;
		var nmperawat2 = $("#tdperawat2 option:selected").text();
		var kdperawat3 = document.getElementById("tdperawat3").value;
		var nmperawat3 = $("#tdperawat3 option:selected").text();
		var notrans = document.getElementById("notrans").value;
		var notransin = document.getElementById("notransin").value;
		var tddiskon = document.getElementById("tddiskon").value;
		var tdumum = $("#tdumum").prop('checked');

		if ((tdtindakan == "")) {
			modalloadtutup();
			kuranglengkap();
			return;
		}
		$.ajax({
			url: "<?php echo site_url(); ?>/ijenazah/layanantindakan",
			type: "GET",
			data: {
				unit: unit,
				kdunit: kdunit,
				no_rm: no_rm,
				tgljen: tgljen,
				tdtindakan: tdtindakan,
				tdtindakantext: tdtindakantext,
				kddokter: kddokter,
				nmdokter: nmdokter,
				kdperawat1: kdperawat1,
				nmperawat1: nmperawat1,
				kdperawat2: kdperawat2,
				nmperawat2: nmperawat2,
				kdperawat3: kdperawat3,
				nmperawat3: nmperawat3,
				notrans: notrans,
				notransin: notransin,
				tddiskon: tddiskon,
				tdumum: tdumum
			},
			success: function(ajaxData) {
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
		var unit = $("#kdunit option:selected").text();
		var bhpqty = document.getElementById("bhpqty").value;
		var bhpstauan = document.getElementById("bhpstauan").value;
		var bhpharga = document.getElementById("bhpharga").value;
		var bhpdiskon = document.getElementById("bhpdiskon").value;
		var bhpumum = $("#bhpumum").prop('checked');
		var jentgl = document.getElementById("jentgl").value;
		if ((bhpbhp == "") || (bhpqty == "") || (bhpstauan == "") || (bhpharga == "")) {
			modalloadtutup();
			kuranglengkap();
			return;
		}
		$.ajax({
			url: "<?php echo site_url(); ?>/ijenazah/layananbhp",
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
				jentgl: jentgl
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
			url: "<?php echo site_url(); ?>/ijenazah/kelolaformtindakan",
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
		var kdunit = document.getElementById("kdunit").value;
		var unit = $("#kdunit option:selected").text();
		$.ajax({
			url: "<?php echo site_url(); ?>/ijenazah/kelolaformtindakanedit",
			type: "GET",
			data: {
				id: id,
				kdunit: kdunit,
				unit: unit
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
		var unit = $("#kdunit option:selected").text();
		var tddiskon = document.getElementById("tddiskon").value;
		var tdumum = $("#tdumum").prop('checked');
		var jentgl = document.getElementById("jentgl").value;
		var kddokter = document.getElementById("tddokter").value;
		var nmdokter = $("#tddokter option:selected").text();
		var kdperawat1 = document.getElementById("tdperawat1").value;
		var nmperawat1 = $("#tdperawat1 option:selected").text();
		var kdperawat2 = document.getElementById("tdperawat2").value;
		var nmperawat2 = $("#tdperawat2 option:selected").text();
		var kdperawat3 = document.getElementById("tdperawat3").value;
		var nmperawat3 = $("#tdperawat3 option:selected").text();

		if ((tdtindakan == "")) {
			modalloadtutup();
			kuranglengkap();
			return;
		}
		$.ajax({
			url: "<?php echo site_url(); ?>/ijenazah/layanantindakanubah",
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
				jentgl: jentgl,
				kddokter: kddokter,
				nmdokter: nmdokter,
				kdperawat1: kdperawat1,
				nmperawat1: nmperawat1,
				kdperawat2: kdperawat2,
				nmperawat2: nmperawat2,
				kdperawat3: kdperawat3,
				nmperawat3: nmperawat3,
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
						var unit = $("#kdunit option:selected").text();
						var notrans = document.getElementById("notrans").value;
						var notransin = document.getElementById("notransin").value;
						$.ajax({
							url: "<?php echo site_url(); ?>/ijenazah/layanantindakanhapus",
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
			url: "<?php echo site_url(); ?>/ijenazah/kelolaformbhp",
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
			url: "<?php echo site_url(); ?>/ijenazah/kelolaformbhpedit",
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
		var unit = $("#kdunit option:selected").text();
		var bhpqty = document.getElementById("bhpqty").value;
		var bhpstauan = document.getElementById("bhpstauan").value;
		var bhpharga = document.getElementById("bhpharga").value;
		var bhpdiskon = document.getElementById("bhpdiskon").value;
		var bhpumum = $("#bhpumum").prop('checked');
		var jentgl = document.getElementById("jentgl").value;
		if ((bhpbhp == "") || (bhpqty == "") || (bhpstauan == "") || (bhpharga == "")) {
			modalloadtutup();
			kuranglengkap();
			return;
		}
		$.ajax({
			url: "<?php echo site_url(); ?>/ijenazah/layananbhpubah",
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
				jentgl: jentgl
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
						var unit = $("#kdunit option:selected").text();
						var notrans = document.getElementById("notrans").value;
						$.ajax({
							url: "<?php echo site_url(); ?>/ijenazah/layananbhphapus",
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
</script>