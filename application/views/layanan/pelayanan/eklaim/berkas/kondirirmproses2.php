<div class="modal-dialog modal-xl" role="document">
	<div class="modal-content">
		<!-- <div class="box box-default box-solid" id="proseskotak"> -->
		<div class="modal-header p-1 pl-3 align-text-bottom">
			<b class="modal-title" id="exampleModalLabel">Berkas Rekam Medik</b>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			<div class="row  spacing-row">
				<div class="col-md-4">
					<div class="form-group row col-spacing-row">
						<label class="col-md-4 col-form-label">No. RM</label>
						<div class="col-md-8">
							<input type="text" class="form-control" name="irm" id="irm" value="<?php echo $datahead->no_rm; ?>" disabled>
						</div>
					</div>
					<div class="form-group row col-spacing-row">
						<label class="col-md-4 col-form-label">Nama Pasien</label>
						<div class="col-md-8">
							<input type="text" class="form-control" name="inp" id="inp" value="<?php echo $datahead->nama; ?>" disabled>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group row col-spacing-row">
						<label class="col-md-4 col-form-label">No. Transaksi</label>
						<div class="col-md-8">
							<input type="text" class="form-control" name="notrans" id="notrans" value="<?php echo $datahead->notransaksi; ?>" disabled>
						</div>
					</div>
					<div class="form-group row col-spacing-row">
						<label class="col-md-4 col-form-label">Tanggal Masuk</label>
						<div class="col-md-8">
							<input type="text" class="form-control" name="tglm" id="tglm" value="<?php echo $datahead->tgl_masuk; ?>" disabled>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group row col-spacing-row">
						<label class="col-md-4 col-form-label">Tanggal Keluar</label>
						<div class="col-md-8">
							<input type="text" class="form-control" name="tglk" id="tglk" value="<?php echo $datahead->tgl_keluar; ?>" disabled>
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
									Diagnosa
								</div>
							</div>
						</a>
					</li>
					<li class="nav-item mr-auto mb-4">
						<a class="nav-link p-0" data-toggle="tab" href="#tab_2">
							<div class="d-flex">
								<div class="media-body font-weight-bold align-self-center mb-3">
									<!-- <h6 class="mb-0 text-uppercase font-weight-bold">Pemakaian BHP / Obat</h6> -->
									BRM
								</div>
							</div>
						</a>
					</li>
					<li class="nav-item mr-auto mb-4" style="width: 900px;">
					</li>
				</ul>
			</div>
			<div class="tab-content">
				<div class="tab-pane fade active show" id="tab_1">
					<h6 class="mb-4">Diagnosa</h6>
					<div class="table-responsive">
						<table class="table table-bordered table-striped" id="tabeldiag">
							<thead>
								<tr>
									<th width="3%">No.</th>
									<th width=35%">Diagnosa</th>
									<th>Diagnosa Ind</th>
									<th width="7%">Kode ICD</th>
									<th width="7%">No. DTD</th>
									<th width="7%">Type</th>
									<th width='5%'>Action</th>
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
				</div>
				<div class="tab-pane fade" id="tab_2">
					<h6 class="mb-4">Berkas Rekam Medik</h6>
					<div class="table-responsive">
						<table class="table table-striped" id="tabelbhp">
							<thead>
								<tr>
									<th width='7%'>Tgl. Setor</th>
									<th>DPJP</th>
									<th width='12%'>Jenis Layanan</th>
									<th width='10%'>Kondisi Status</th>
									<th width="10%">Kelengkapan</th>
									<th width="10%">Ketepatan</th>
									<th width="10%">Operasi</th>
									<th width='5%'>Proses</th>
								</tr>
							</thead>
							<tbody>
								<?php
								if ($brmdata == null) {
								?>
									<tr>
										<td colspan="7" class="text-center">
											Tidak Ada Data
										</td>
									</tr>
									<?php
								} else {
									foreach ($brmdata as $key => $row) {
										echo "<td>" . $row->tglsetor . "</td>";
										echo "<td>" . $row->nama_dokter . "</td>";
										echo "<td>" . $row->jenislayanan . "</td>";
										echo "<td>" . tulisankondisistatus($row->kondisistatus) . "</td>";
										echo "<td>" . tulisankelengkapan($row->lengkap) . "</td>";
										echo "<td>" . tulisanketepatan($row->waktusetor) . "</td>";
										echo "<td>" . tulisanoperasi($row->operasi) . "</td>";
									?>
										<td class="text-center">
											<a onclick="formeditbrm(<?php echo $row->id; ?>);" class="btn-sm btn-info btn-flat">Isi</a>
										</td>
								<?php
										echo "</tr>";
									}
								}
								?>
							</tbody>
						</table>
					</div>
					<div class="row" id="formbrm">

					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<script>
	$(document).ready(function() {
		kebutuhandiagnosa()
	});

	function loadproses() {
		$("#proseskotak").append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
	}

	function loadhapus() {
		$(".overlay").remove();
	}

	function kebutuhandiagnosa() {
		$('#diag').select2({
			tags: true
		})
	}

	function kebutuhanbrm() {
		lengkapberkastoggle(true)
		operasitoggle(true)
	}

	function lengkapberkastoggle(stat) {
		$("#idtfrs").prop("disabled", stat);
		$("#diagu").prop("disabled", stat);
		$("#lapor").prop("disabled", stat);
		$("#resume").prop("disabled", stat);
		$("#aut").prop("disabled", stat);
		$("#nd").prop("disabled", stat);
		$("#pb").prop("disabled", stat);
		$("#ttd").prop("disabled", stat);
	}

	function operasitoggle(stat) {
		$("#lapo").prop("disabled", stat);
		$("#lapa").prop("disabled", stat);
		$("#pero").prop("disabled", stat);
	}

	function tampilkandiag(stat = 0) {
		loadproses()
		var diagnosa = $("#diag").val();
		$.ajax({
			url: "<?php echo site_url(); ?>/rm/tampilkanpilihandiagnosa",
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
		var tglm = document.getElementById("tglm").value;
		var tglk = document.getElementById("tglk").value;
		var diag = $("#diag").val();
		var utama = $("#diagutama").prop('checked');

		var $diagindonesia=$this->input->get("latin");

		if (diag == "") {
			$.notify("Data belum lengkap", "error");
			return;
		}
		loadproses()
		$.ajax({
			url: "<?php echo site_url(); ?>/rm/prosessimpandiagnosa",
			type: "GET",
			data: {
				irm: irm,
				inp: inp,
				notrans: notrans,
				tglm: tglm,
				tglk: tglk,
				diag: diag,
				utama: utama,
				diagindonesia : diagindonesia
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

	function formeditdiagnosa(id) {
		loadproses()
		$.ajax({
			url: "<?php echo site_url(); ?>/rm/panggilubahdiagnosa",
			type: "GET",
			data: {
				id: id
			},
			success: function(ajaxData) {
				var dt = JSON.parse(ajaxData);
				if (dt.stat == true) {
					$("#formdiagnosa").html(dt.dtform);
				} else {

				}
				loadhapus()
			},
			error: function(ajaxData) {
				loadhapus();
			}
		});
	}

	function bataldiagnosa() {
		loadproses()
		$.ajax({
			url: "<?php echo site_url(); ?>/rm/bataldiagnosa",
			type: "GET",
			data: {

			},
			success: function(ajaxData) {
				var dt = JSON.parse(ajaxData);
				if (dt.stat == true) {
					$("#formdiagnosa").html(dt.dtform);
				} else {

				}
				loadhapus()
			},
			error: function(ajaxData) {
				loadhapus();
			}
		});
	}

	function ubahdiag() {
		var id = document.getElementById("id").value;
		var irm = document.getElementById("irm").value;
		var inp = document.getElementById("inp").value;
		var notrans = document.getElementById("notrans").value;
		var tglm = document.getElementById("tglm").value;
		var tglk = document.getElementById("tglk").value;
		var diag = $("#diag").val();
		var utama = $("#diagutama").prop('checked');
		if (diag == "") {
			$.notify("Data belum lengkap", "error");
			return;
		}
		loadproses()
		$.ajax({
			url: "<?php echo site_url(); ?>/rm/prosesubahdiagnosa",
			type: "GET",
			data: {
				id: id,
				irm: irm,
				inp: inp,
				notrans: notrans,
				tglm: tglm,
				tglk: tglk,
				diag: diag,
				utama: utama
			},
			success: function(ajaxData) {
				var dt = JSON.parse(ajaxData);
				if (dt.stat == true) {
					$("#tabeldiag tbody tr").remove();
					$("#tabeldiag tbody").append(dt.dtview);
					$("#formdiagnosa").html(dt.dtform);
					$.notify("Berhasil Mengubah Data", "success");
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
							url: "<?php echo site_url(); ?>/rm/proseshapusdiagnosa",
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

	function formeditbrm(id) {
		loadproses()
		$.ajax({
			url: "<?php echo site_url(); ?>/rm/panggilubahbrm",
			type: "GET",
			data: {
				id: id
			},
			success: function(ajaxData) {
				var dt = JSON.parse(ajaxData);
				if (dt.stat == true) {
					$("#formbrm").html(dt.dtform);
				} else {

				}
				loadhapus()
			},
			error: function(ajaxData) {
				loadhapus();
			}
		});
	}

	function batalformeditbrm() {
		$("#formbrm").html("");
	}

	function simpanbrm() {
		var id = document.getElementById("id").value;
		var irm = document.getElementById("irm").value;
		var inp = document.getElementById("inp").value;
		var notrans = document.getElementById("notrans").value;
		var tglm = document.getElementById("tglm").value;
		var tglk = document.getElementById("tglk").value;

		var kode_dokter = document.getElementById("dokter").value;
		var nama_dokter = $("#dokter option:selected").text();

		var jp = $("#jp").val();
		var jptext = $("#jp option:selected").text();


		var tglsetor = $("input[name=tglsetor]").val();
		var ts = $("input[name=ts]:checked").val();
		var ks = $("input[name=ks]:checked").val();
		var kb = $("input[name=kb]:checked").val();

		var idtfrs = $("#idtfrs").prop('checked');
		var diagu = $("#diagu").prop('checked');
		var lapor = $("#lapor").prop('checked');
		var resume = $("#resume").prop('checked');
		var aut = $("#aut").prop('checked');
		var nd = $("#nd").prop('checked');
		var pb = $("#pb").prop('checked');
		var ttd = $("#ttd").prop('checked');

		var op = $("input[name=op]:checked").val();

		var lapo = $("#lapo").prop('checked');
		var lapa = $("#lapa").prop('checked');
		var pero = $("#pero").prop('checked');

		if ((tglsetor == "") || (ks == "") || (kb == "") || (op == "")) {
			$.notify("Data belum lengkap", "error")
			return
		}

		loadproses()
		$.ajax({
			url: "<?php echo site_url(); ?>/rm/prosesubahbrm",
			type: "GET",
			data: {
				id: id,
				irm: irm,
				inp: inp,
				notrans: notrans,
				tglm: tglm,
				tglk: tglk,
				tglsetor: tglsetor,
				ts: ts,
				ks: ks,
				kb: kb,
				idtfrs: idtfrs,
				diagu: diagu,
				lapor: lapor,
				resume: resume,
				aut: aut,
				nd: nd,
				pb: pb,
				ttd: ttd,
				op: op,
				lapo: lapo,
				lapa: lapa,
				pero: pero,
				kode_dokter: kode_dokter,
				nama_dokter: nama_dokter,
				jp: jp,
				jptext: jptext
			},
			success: function(ajaxData) {
				var dt = JSON.parse(ajaxData);
				if (dt.stat == true) {
					$("#tabelbrm tbody tr").remove();
					$("#tabelbrm tbody").append(dt.dtview);
					$("#formbrm").html('');
					$.notify("Berhasil Mengubah Data", "success");
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
</script>