<div class="modal-dialog modal-xl" role="document">
	<div class="modal-content">
		<!-- <div class="box box-default box-solid" id="proseskotak"> -->
		<div class="modal-header p-1 pl-3 align-text-bottom">
			<b class="modal-title" id="exampleModalLabel">Pelayanan Instalasi Radiologi</b>
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
							<input type="text" class="form-control" name="pj" value="<?php echo $dtprosesrad->no_rm; ?>" disabled>
						</div>
					</div>
					<div class="form-group row col-spacing-row">
						<label class="col-md-3 col-form-label">No. Transaksi</label>
						<div class="col-md-9">
							<input type="text" name="notransin" id="notransin" value="<?php echo $dtprosesrad->notransaksi_IN; ?>" hidden disabled>
							<input type="text" class="form-control" name="notrans" id="notrans" value="<?php echo $dtprosesrad->notransaksi; ?>" disabled>
						</div>
					</div>
					<div class="form-group row col-spacing-row">
						<label class="col-md-3 col-form-label">Golongan</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="tdgolongan" id="tdgolongan" value="<?php echo $dtprosesrad->golongan; ?>" disabled>
						</div>
					</div>
					<div class="form-group row col-spacing-row">
						<label class="col-md-3 col-form-label">Alamat</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="alamat" id="alamat" value="<?php echo $dtprosesrad->alamat; ?>" disabled>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group row col-spacing-row">
						<label class="col-md-3 col-form-label">Nama Pasien</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="pj" value="<?php echo $dtprosesrad->nama_pasien; ?>" disabled>
						</div>
					</div>
					<div class="form-group row col-spacing-row">
						<label class="col-md-3 col-form-label">Tanggal</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="radtgl" id="radtgl" value="<?php echo tanggaldua($dtprosesrad->tanggal); ?>" disabled>
						</div>
					</div>
					<div class="form-group row col-spacing-row">
						<label class="col-md-3 col-form-label">Jenis Kelamin</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="sex" id="sex" value="<?php echo (substr($dtprosesrad->sex,0,1)=='L' ? 'Laki-laki' : 'Perempuan');?>" disabled>
						</div>
					</div>
					<div class="form-group row col-spacing-row">
						<label class="col-md-3 col-form-label">Umur</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="radtgl" id="radtgl" value="<?php echo umur($dtprosesrad->tgl_lahir); ?>" disabled>
						</div>
					</div>
				</div>
			</div>
			<div class="wizard-tab mb-1 mt-5">
				<ul class="nav nav-tabs d-block d-sm-flex">
					<li class="nav-item mr-auto mb-4">
						<a class="nav-link p-0 active" data-toggle="tab" href="#tab_1">
							<div class="d-flex">
								<!-- <div class="media-body font-weight-bold align-self-center mb-3 mb-3"> -->
								<div class="media-body font-weight-bold mr-auto mb-1 text-danger">

									<!-- <h6 class="mb-0 text-uppercase font-weight-bold">Tindakan</h6> -->
									Tindakan atau Pemeriksaan
								</div>
							</div>
						</a>
					</li>
					<li class="nav-item mr-auto mb-4">
						<a class="nav-link p-0" data-toggle="tab" href="#tab_2">
							<div class="d-flex">
								<!-- <div class="media-body font-weight-bold align-self-center mb-3"> -->
								<div class="media-body font-weight-bold mr-auto mb-1 text-info">

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
					<h6>Pemeriksaan</h6>
					<div class="table-responsive">
						<table class="table table-striped" id="tabeltindakan">
							<thead>
								<tr>
									<th width="5%">No.</th>
									<th width="10%">Tanggal</th>
									<th>Tindakan</th>
									<th width="10%">Harga</th>
									<th width="5%">UM/ASR</th>
									<th width="5%">Diskon</th>
									<th width='20%'>
										<div align="center">Action</div>
									</th>
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
										echo "<td>" . tanggaldua($row->tanggal) . ".</td>";
										echo "<td>" . $row->tindakan . "</td>";
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
											<!-- <a onclick="cetakhasil(this, <?php echo $row->id; ?>)" class="btn-sm btn-success btn-flat"><i class="fa fa-trash"></i>Cetak Hasil</a> -->
											<a class='btn-sm btn-success btn' target="blank" role="button" href="<?php echo site_url(); ?>/iradiologi/layananhasilcetak/<?php echo $row->id; ?>">Cetak Hasil</a>
										</td>
								<?php
										echo "</tr>";
									}
								} ?>
							</tbody>
						</table>
					</div>
					<br>
					<br>
					<b class="my-4">Isian Data Pemeriksaan</b>
					<div class="row" id="formtindakan">
						<div class="col-md-7">
							<div class="form-group row col-spacing-row">
								<label class="col-md-3 col-form-label">Tindakan</label>
								<div class="col-md-9">
									<select class="form-control" style="width: 100%;" name="tdtindakan" id="tdtindakan" onchange="tdtindakan();">
										<option value="">--pilihan--</option>
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
								<label class="col-sm-3 col-form-label">% Diskon</label>
								<div class="col-sm-3">
									<input type="number" class="form-control" name="tddiskon" id="tddiskon" value="0">
								</div>
								<div class="col-sm-5">
									<div class="custom-control custom-checkbox custom-control-inline">
										<input type="checkbox" class="custom-control-input" name="tdumum" id="tdumum">
										<label class="custom-control-label" for="tdumum">Berlaku Umum</label>
									</div>
								</div>
							</div>
							<div class="form-group row col-spacing-row">
								<label class="col-md-3 col-form-label">Hasil Pemeriksaan</label>
								<div class="col-md-9">
									<textarea rows="6" class="form-control" name="hasilperiksa" id="hasilperiksa"></textarea>
								</div>
							</div>
							<div class="form-group row col-spacing-row">
								<label class="col-md-3 col-form-label">Kesan</label>
								<div class="col-md-9">
									<textarea rows="2" class="form-control" name="kesan" id="kesan"></textarea>
								</div>
							</div>
							<br>
							<div class="form-group row col-spacing-row">
								<label class="col-md-3 col-form-label">Template Standart</label>
								<div class="col-md-9">
									<button onclick="templatefoto();" class="btn btn-warning btn-sm mx-1" id="tombolfoto">Template Foto</button>
									<button onclick="templateusg();" class="btn btn-info btn-sm mx-1" id="tombolusg">Template USG</button>
									<button onclick="templatescan();" class="btn btn-danger btn-sm mx-1" id="tombolscan">Template CT Scan</button>
								</div>	
							</div>
						</div>
						<div class="col-md-5">
							<div class="form-group row col-spacing-row">
								<label class="col-md-12 col-form-label">KELENGKAPAN DATA PASIEN</label>
							</div>
							<div class="form-group row col-spacing-row">
								<label class="col-md-3 col-form-label">Jns.Pemeriksaan</label>
								<div class="col-md-9">
									<input type="text" class="form-control" id="jpemeriksaan" name="jpemeriksaan">
								</div>
							</div>
							<div class="form-group row col-spacing-row">
								<label class="col-md-3 col-form-label">No. Foto</label>
								<div class="col-md-9">
									<input type="text" class="form-control" id="nofoto" name="nofoto">
								</div>
							</div>
							<div class="form-group row col-spacing-row">
								<label class="col-md-3 col-form-label">Klinis</label>
								<div class="col-md-9">
									<input type="text" class="form-control" id="klinis" name="klinis">
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
									<th width='4%'>No</th>
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
										<td colspan="100%" class="text-center">
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
					<br>
					<br>
					<b class="my-4">Isian Data BHP</b>
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
								<div class="col-md-4">
									<input type="number" class="form-control" name="bhpdiskon" id="bhpdiskon">
								</div>
								<div class="col-md-5">
									<div class="custom-control custom-checkbox custom-control-inline">
										<input type="checkbox" class="custom-control-input" name="bhpdumum" id="bhpdumum" <?php if (trim($dtprosesrad->golongan) == "UMUM") {
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
			</div>
		</div>
	</div>
</div>

<script>
	//funtion untuk isi template
	function templatefoto() {
		// $("#hasilperiksa").append('asdsadadasdsadads');
		$("#hasilperiksa").load('../assets/img/isi.txt');
		$("#kesan").load('../assets/img/kesan.txt');
	}

	function templateusg() {
		$("#hasilperiksa").load('../assets/img/isi_usg.txt');
		$("#kesan").load('../assets/img/kesan_usg.txt');
	}

	function templatescan() {

	}

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
			url: "<?php echo site_url(); ?>/iradiologi/untukpilihantindakan",
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
			url: "<?php echo site_url(); ?>/iradiologi/untukpilihanbihp",
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
		var tdtindakan = $("#tdtindakan").val();
		var tdtindakantext = $("#tdtindakan option:selected").text();
		var kdunit = document.getElementById("kdunit").value;
		var unit = document.getElementById("unit").value;
		var tddiskon = document.getElementById("tddiskon").value;
		var tdumum = $("#tdumum").prop('checked');
		var radtgl = document.getElementById("radtgl").value;
		var hasilperiksa = $.trim($("#hasilperiksa").val());
		var kesan = $.trim($("#kesan").val());

		var jpemeriksaan = document.getElementById("jpemeriksaan").value;
		var nofoto = document.getElementById("nofoto").value;
		var klinis = document.getElementById("klinis").value;

		if ((tdtindakan == "")) {
			modalloadtutup();
			kuranglengkap();
			return;
		}
		$.ajax({
			url: "<?php echo site_url(); ?>/iradiologi/layanantindakan",
			type: "GET",
			data: {
				tdtindakan: tdtindakan,
				tdtindakantext: tdtindakantext,
				notrans: notrans,
				notransin: notransin,
				unit: unit,
				kdunit: kdunit,
				tddiskon: tddiskon,
				tdumum: tdumum,
				radtgl: radtgl,
				hasilperiksa: hasilperiksa,
				kesan: kesan,
				jpemeriksaan : jpemeriksaan,
				nofoto : nofoto,
				klinis : klinis
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
		var unit = document.getElementById("unit").value;
		var bhpqty = document.getElementById("bhpqty").value;
		var bhpstauan = document.getElementById("bhpstauan").value;
		var bhpharga = document.getElementById("bhpharga").value;
		var bhpdiskon = document.getElementById("bhpdiskon").value;
		var bhpumum = $("#bhpumum").prop('checked');
		var radtgl = document.getElementById("radtgl").value;
		if ((bhpbhp == "") || (bhpqty == "") || (bhpstauan == "") || (bhpharga == "")) {
			modalloadtutup();
			kuranglengkap();
			return;
		}
		$.ajax({
			url: "<?php echo site_url(); ?>/iradiologi/layananbhp",
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
				radtgl: radtgl
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
			url: "<?php echo site_url(); ?>/iradiologi/kelolaformtindakan",
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
			url: "<?php echo site_url(); ?>/iradiologi/kelolaformtindakanedit",
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
		var radtgl = document.getElementById("radtgl").value;
		var hasilperiksa = $.trim($("#hasilperiksa").val());
		var kesan = $.trim($("#kesan").val());
		if ((tdtindakan == "")) {
			modalloadtutup();
			kuranglengkap();
			return;
		}
		$.ajax({
			url: "<?php echo site_url(); ?>/iradiologi/layanantindakanubah",
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
				radtgl: radtgl,
				hasilperiksa: hasilperiksa,
				kesan: kesan
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
							url: "<?php echo site_url(); ?>/iradiologi/layanantindakanhapus",
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
			url: "<?php echo site_url(); ?>/iradiologi/kelolaformbhp",
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
			url: "<?php echo site_url(); ?>/iradiologi/kelolaformbhpedit",
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
		var radtgl = document.getElementById("radtgl").value;
		if ((bhpbhp == "") || (bhpqty == "") || (bhpstauan == "") || (bhpharga == "")) {
			modalloadtutup();
			kuranglengkap();
			return;
		}
		$.ajax({
			url: "<?php echo site_url(); ?>/iradiologi/layananbhpubah",
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
				radtgl: radtgl
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
						$.ajax({
							url: "<?php echo site_url(); ?>/iradiologi/layananbhphapus",
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