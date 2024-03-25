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
							<input type="text" class="form-control" name="rm" id="rm" value="<?php echo $dtprosesopr->no_rm; ?>" disabled>
						</div>
					</div>
					<div class="form-group row col-spacing-row">
						<label class="col-md-3 col-form-label">No. Transaksi</label>
						<div class="col-md-9">
							<input type="text" name="notransin" id="notransin" value="<?php echo $dtprosesopr->notransaksi_IN; ?>" hidden disabled>
							<input type="text" class="form-control" name="notrans" id="notrans" value="<?php echo $dtprosesopr->notransaksi; ?>" disabled>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group row col-spacing-row">
						<label class="col-md-3 col-form-label">Nama Pasien</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="inp" id="inp" value="<?php echo $dtprosesopr->nama_pasien; ?>" disabled>
						</div>
					</div>
					<div class="form-group row col-spacing-row">
						<label class="col-md-3 col-form-label">Golongan</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="tdgolongan" id="tdgolongan" value="<?php echo $dtprosesopr->golongan; ?>" disabled>
						</div>
					</div>

					<div class="form-group row col-spacing-row">
						<label class="col-md-3 col-form-label">Jam Mulai</label>
						<div class="col-md-3">
							<input type="time" class="form-control" name="jammulai" id="jammulai" value="<?php echo $dtprosesopr->jammulai; ?>">
						</div>
						<label class="col-md-3 col-form-label">Jam selesai</label>
						<div class="col-md-3">
							<input type="time" class="form-control" name="jamselesai" id="jamselesai" value="<?php echo $dtprosesopr->jamselesai; ?>" >
						</div>
					</div>
				</div>
			</div>
			<br>
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
					<li class="nav-item mr-auto mb-4">
						<a class="nav-link p-0" data-toggle="tab" href="#tab_3">
							<div class="d-flex">
								<div class="media-body font-weight-bold align-self-center mb-3">
									<!-- <h6 class="mb-0 text-uppercase font-weight-bold">Pemakaian BHP / Obat</h6> -->
									Pemakaian O2
								</div>
							</div>
						</a>
					</li>
					<li class="nav-item mr-auto mb-4">
						<a class="nav-link p-0" data-toggle="tab" href="#tab_4">
							<div class="d-flex">
								<div class="media-body font-weight-bold align-self-center mb-3">
									<!-- <h6 class="mb-0 text-uppercase font-weight-bold">Pemakaian BHP / Obat</h6> -->
									Ke Ruang Perawatan
								</div>
							</div>
						</a>
					</li>
					<li class="nav-item mr-auto mb-4 w-25">
					</li>
				</ul>
			</div>
			<div class="tab-content">
				<div class="tab-pane fade active show" id="tab_1">
					<h6 class="my-4">Pemeriksaan</h6>
					<div class="table-responsive">
						<table class="table table-striped" id="tabeltindakan">
							<thead>
								<tr>
									<th width="3%">No.</th>
									<th width="6%">Tanggal</th>
									<th>Tindakan</th>
									<th width="13%">Dokter Operasi</th>
									<th width="11%">Spesialis Anastesi</th>
									<th width="11%">Spesialis Anak</th>
									<th width="11%">Penata Anastesi</th>
									<th width="3%">UM/ASR</th>
									<th width="3%">Diskon</th>
									<th width='10%'>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
								if ($datatindakaninstalasi == NULL) {
								?>
									<tr>
										<td colspan="9" class="text-center">
											Tidak Ada Data
										</td>
									</tr>
									<?php } else {
									$nop = 1;
									foreach ($datatindakaninstalasi as $row) {
										echo "<tr><td>" . $nop++ . ".</td>";
										echo "<td>" . tanggaldua($row->tgl_periksa) . "</td>";
										echo "<td>" . $row->tindakan . "</td>";
										echo "<td>" . $row->nama_dokter . "</td>";
										echo "<td>" . $row->nama_anastesi . "</td>";
										echo "<td>" . $row->spe_anak . "</td>";
										echo "<td>" . $row->nama_penata . "</td>";
										echo "<td>" . $row->nonasuransi . "</td>";
										echo "<td>" . $row->diskon . "</td>";
									?>
										<td class="text-center">
											<button onclick="ubahopredit(<?php echo $row->id; ?>)" class="btn-sm btn-info btn"><i class="fa fa-edit"></i></button>
											<button onclick="hapusdataopr(this, <?php echo $row->id; ?>)" class="btn-sm btn-danger btn"><i class="fa fa-trash"></i></button>
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
					<div class="row" id="formopr">
						<div class="col-md-6">
							<div class="form-group row col-spacing-row">
								<label class="col-md-3 col-form-label">Tanggal</label>
								<div class="col-md-9">
									<input type="text" class="form-control" name="tindakantgl" id="tindakantgl">
								</div>
							</div>
							<div class="form-group row col-spacing-row">
								<label class="col-md-3 col-form-label">Tindakan</label>
								<div class="col-md-9">
									<select class="form-control" style="width: 100%;" name="tdtindakan" id="tdtindakan" onchange="tdtindakan()">
										<option value="">--Pilih--</option>
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
								<div class="col-md-3">
									<input type="text" class="form-control" id="jasa" name="jasa" disabled>
								</div>
								<label class="col-md-3 col-form-label text-right">Tipe</label>
								<div class="col-md-3">
									<input type="text" class="form-control" id="tipe" name="tipe" disabled>
								</div>
							</div>
							<div class="form-group row col-spacing-row">
								<label class="col-sm-3 col-form-label">% Diskon</label>
								<div class="col-sm-4">
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
								<label class="col-md-3 col-form-label">Dokter Operasi</label>
								<div class="col-md-6">
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
								<div class="col-md-3">
									<input class="form-control" id="disc1" name="disc1" type="number" placeholder="Diskon">
								</div>
							</div>
							<div class="form-group row col-spacing-row">
								<label class="col-md-3 col-form-label">Asisten Operasi 1</label>
								<div class="col-md-6">
									<select class="form-control" style="width: 100%;" name="tddokterdua" id="tddokterdua">
										<option value="">--Pilih--</option>
										<?php
										foreach ($dtdokterasisten as $row) {
										?>
											<option value="<?php echo $row->kode_dokter; ?>"><?php echo $row->nama_dokter; ?></option>
										<?php
										}
										?>
									</select>
								</div>
								<div class="col-md-3">
									<input class="form-control" id="disc2" name="disc2" type="number" placeholder="Diskon">
								</div>
							</div>
							<div class="form-group row col-spacing-row">
								<label class="col-md-3 col-form-label">Asisten Operasi 2</label>
								<div class="col-md-6">
									<select class="form-control" style="width: 100%;" name="tddoktertiga" id="tddoktertiga">
										<option value="">--Pilih--</option>
										<?php
										foreach ($dtdokterasisten as $row) {
										?>
											<option value="<?php echo $row->kode_dokter; ?>"><?php echo $row->nama_dokter; ?></option>
										<?php
										}
										?>
									</select>
								</div>
								<div class="col-md-3">
									<input class="form-control" id="disc3" name="disc3" type="number" placeholder="Diskon">
								</div>
							</div>

						</div>
						<div class="col-md-6">
							<div class="form-group row col-spacing-row">
								<label class="col-md-3 col-form-label">Dokter Anastesi</label>
								<div class="col-md-9">
									<select class="form-control" style="width: 100%;" name="tdspesialis" id="tdspesialis">
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
								<label class="col-md-3 col-form-label">Spesialis Anak</label>
								<div class="col-md-9">
									<select class="form-control" style="width: 100%;" name="tdanak" id="tdanak">
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
								<label class="col-md-3 col-form-label">Penata Anastesi</label>
								<div class="col-md-9">
									<select class="form-control" style="width: 100%;" name="tdpenata" id="tdpenata">
										<option value="">--Pilih--</option>
										<?php
										foreach ($dtpenata as $row) {
										?>
											<option value="<?php echo $row->kode_dokter; ?>"><?php echo $row->nama_dokter; ?></option>
										<?php
										}
										?>
									</select>
								</div>
							</div>
							<div class="form-group row col-spacing-row">
								<label class="col-md-3 col-form-label">Prw.Instrumen 1</label>
								<div class="col-md-9">
									<select class="form-control" style="width: 100%;" name="tdperawat" id="tdperawat">
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
								<label class="col-md-3 col-form-label">Prw.Instrumen 2</label>
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
								<label class="col-md-3 col-form-label">Catatan</label>
								<div class="col-md-9">
									<textarea class="form-control col-sm-12" rows="3" id="catatan" name="catatan"></textarea>
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
									<th width="10%">Sub Total</th>
									<th width='10%'>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
								if ($databhpinstalasi == NULL) {
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
									foreach ($databhpinstalasi as $row) {
										$r = $row->qty * $row->hargapakai;
										echo "<tr><td>" . $nob++ . ".</td>";
										echo "<td>" . tanggaldua($row->tanggal) . "</td>";
										echo "<td>" . $row->namaobat . "</td>";
										echo "<td>" . $row->satuanpakai . "</td>";
										echo "<td>" . $row->hargapakai . "</td>";
										echo "<td>" . $row->qty . "</td>";
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
									echo "<td colspan='2'>" . $jml . "</td>";
									echo "</tr>";
								} ?>
							</tbody>
						</table>
					</div>
					<br>
					<br>
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
									<select class="form-control" style="width: 100%;" name="bhpbhp" id="bhpbhp" onchange="bhpbhp()">
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
						</div>
						<div class="col-md-12 text-right">
							<button onclick="simpandatabhp();" class="btn btn-primary">Simpan</button>
						</div>
					</div>
				</div>
				<div class="tab-pane fade" id="tab_3">
					<h6 class="mb-4">Pemakaian O2</h6>
					<div class="table-responsive">
						<table class="table table-striped" id="tabelodua">
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
								if ($dttdodua == NULL) {
								?>
									<tr>
										<td colspan="4" class="text-center">
											Tidak Ada Data
										</td>
									</tr>
									<?php } else {
									$noo = 1;
									foreach ($dttdodua as $row) {
										echo "<tr><td>" . $noo++ . ".</td>";
										echo "<td>" . tanggaldua($row->tgl_pakai) . "</td>";
										echo "<td>" . $row->jam . "</td>";
										echo "<td>" . $row->qty . "</td>";
									?>
										<td class="text-center">
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
					<br>
					<br>
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
									<div class="bootstrap-timepicker">
										<input type="text" class="form-control" name="ojam" id="ojam">
									</div>
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
						</div>
						<div class="col-md-12 text-right">
							<button onclick="simpandataodua();" class="btn btn-primary">Simpan</button>
						</div>
					</div>
				</div>
				<div class="tab-pane fade" id="tab_4">
					<h6 class="mb-4">Pindah Kamar</h6>
					<p>Untuk proses pindah kamar ke kamar perawatan setelah operasi, tidak lagi dipindahkan dari kamar operasi tetapi proses pindah kamar dilakukan oleh ruang perawatan sebelum operasi.
						Silahkan menghubungi kamar perawatan sebelumnya untuk proses pindah kamar ke kamar perawatan selanjutnya.
						Jika Setelah operasi pasien kembali ke ruang semula (ruangan sebelum operasi) maka tidak perlu melakukan proses pindah kamar.</p>
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

	function pkembali() {
		$.notify("Pasien dikembalikan ke Unit sebelumnya", "success");
	}

	function ppulang() {
		$.notify("Pasien Telah Pulang", "success");
	}

	function kebutuhanopr() {
		$('#tdtindakan').select2();
		$('#tddokter').select2();
		$('#tddokterdua').select2();
		$('#tddoktertiga').select2();
		$('#tdspesialis').select2();
		$('#tdanak').select2();
		$('#tdpenata').select2();
		$('#tdperawat').select2();
		$('#tdperawat2').select2();
		$('#tindakantgl').datepicker({
			autoclose: true
		}).datepicker("setDate", "0");
	}

	function kebutuhanbhp() {
		$('#bhptgl').datepicker({
			autoclose: true
		}).datepicker("setDate", "0");
		$('#bhpbhp').select2();
	}

	function kebutuhanodua() {
		$('#otgl').datepicker({
			autoclose: true
		}).datepicker("setDate", "0");
		$('#ojam').timepicker({
			showInputs: false,
			minuteStep: 1,
			showMeridian: false
		});
	}

	$(function() {
		kebutuhanbhp();
		kebutuhanodua();
		kebutuhanopr();

		$('#pktgl').datepicker({
			autoclose: true
		}).datepicker("setDate", "0");
		$('#instgl').datepicker({
			autoclose: true
		}).datepicker("setDate", "0");

		$('#pkjam').timepicker({
			showInputs: false,
			minuteStep: 1,
			showMeridian: false
		});
		$('#pkunit').select2();
		$('#kamar').select2();
	});

	function tdtindakan() {
		var tpp = $("#tdtindakan").val();
		$.ajax({
			url: "<?php echo site_url(); ?>/ioperasi/untukpilihantindakan",
			type: "GET",
			data: {
				kdt: tpp
			},
		}).then(function(data) {
			$("#jasa").val('');
			$("#tipe").val('');
			var t = JSON.parse(data);
			$("#jasa").val(t.jasas);
			$("#tipe").val(t.type);
		});
	}

	function bhpbhp() {
		var tpp = $("#bhpbhp").val();
		$.ajax({
			url: "<?php echo site_url(); ?>/ioperasi/untukpilihanbihp",
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
		var tindakantgl = document.getElementById("tindakantgl").value;
		var notrans = document.getElementById("notrans").value;
		var rm = document.getElementById("rm").value;
		var notransin = document.getElementById("notransin").value;
		var tdtindakan = $("#tdtindakan").val();
		var tdtindakantext = $("#tdtindakan option:selected").text();
		var tddokter = $("#tddokter").val();
		var tddoktertext = $("#tddokter option:selected").text();
		var tddokterdua = $("#tddokterdua").val();
		var tddokterduatext = $("#tddokterdua option:selected").text();
		var tddoktertiga = $("#tddoktertiga").val();
		var tddoktertigatext = $("#tddoktertiga option:selected").text();
		var tdspesialis = $("#tdspesialis").val();
		var tdspesialistext = $("#tdspesialis option:selected").text();
		var tdanak = $("#tdanak").val();
		var tdanaktext = $("#tdanak option:selected").text();
		var tdperawat = $("#tdperawat").val();
		var tdperawattext = $("#tdperawat option:selected").text();
		var tdperawat2 = $("#tdperawat2").val();
		var tdperawattext2 = $("#tdperawat2 option:selected").text();
		var tdpenata = $("#tdpenata").val();
		var tdpenatatext = $("#tdpenata option:selected").text();
		var kdunit = $("#kdunit").val();
		var unit = document.getElementById("unit").value;
		var tddiskon = document.getElementById("tddiskon").value;
		var tdumum = $("#tdumum").prop('checked');
		var cat = $("#catatan").val();
		var disc1 = document.getElementById("disc1").value;
		var disc2 = document.getElementById("disc2").value;
		var disc3 = document.getElementById("disc3").value;
		var jammulai = document.getElementById("jammulai").value;
		var jamselesai = document.getElementById("jamselesai").value;
		if ((tdtindakan == "" || jammulai=="")) {
			modalloadtutup();
			kuranglengkap();
			return;
		}
		$.ajax({
			url: "<?php echo site_url(); ?>/ioperasi/layanantindakan",
			type: "GET",
			data: {
				tindakantgl: tindakantgl,
				rm: rm,
				tdtindakan: tdtindakan,
				tdtindakantext: tdtindakantext,
				notrans: notrans,
				notransin: notransin,
				unit: unit,
				kdunit: kdunit,
				tddokter: tddokter,
				tddoktertext: tddoktertext,
				tddokterdua: tddokterdua,
				tddokterduatext: tddokterduatext,
				tddoktertiga: tddoktertiga,
				tddoktertigatext: tddoktertigatext,
				tdspesialis: tdspesialis,
				tdspesialistext: tdspesialistext,
				tdanak: tdanak,
				tdanaktext: tdanaktext,
				tdpenata: tdpenata,
				tdpenatatext: tdpenatatext,
				tdperawat: tdperawat,
				tdperawattext: tdperawattext,
				tdperawat2: tdperawat2,
				tdperawattext2: tdperawattext2,
				tddiskon: tddiskon,
				tdumum: tdumum,
				cat: cat,
				disc1: disc1,
				disc2: disc2,
				disc3: disc3,
				jammulai : jammulai,
				jamselesai : jamselesai
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

	function simpandataodua() {
		modalload();
		var notrans = document.getElementById("notrans").value;
		var otgl = document.getElementById("otgl").value;
		var ojam = document.getElementById("ojam").value;
		var kdunit = document.getElementById("kdunit").value;
		var unit = document.getElementById("unit").value;
		var ojml = document.getElementById("ojml").value;
		if ((otgl == "") || (ojam == "") || (ojml == "")) {
			modalloadtutup();
			kuranglengkap();
			return;
		}
		$.ajax({
			url: "<?php echo site_url(); ?>/ioperasi/layananodua",
			type: "GET",
			data: {
				notrans: notrans,
				otgl: otgl,
				ojam: ojam,
				unit: unit,
				kdunit: kdunit,
				ojml: ojml
			},
			success: function(ajaxData) {
				var t = $.parseJSON(ajaxData);

				if (t.stat == true) {
					$("#oduainfox div").remove();
					tdsuksesalert(0);
					$("#tabelodua tbody tr").remove();
					$("#tabelodua tbody").append(t.dtview);
					modalloadtutup();
				} else {
					$("#oduainfox div").remove();
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
		var bhptgl = document.getElementById("bhptgl").value;
		var notrans = document.getElementById("notrans").value;
		var bhpbhp = $("#bhpbhp").val();
		var bhpbhptext = $("#bhpbhp option:selected").text();
		var kdunit = document.getElementById("kdunit").value;
		var unit = document.getElementById("unit").value;
		var bhpqty = document.getElementById("bhpqty").value;
		var bhpstauan = document.getElementById("bhpstauan").value;
		var bhpharga = document.getElementById("bhpharga").value;

		if ((bhpbhp == "") || (bhpqty == "") || (bhpstauan == "") || (bhpharga == "")) {
			modalloadtutup();
			kuranglengkap();
			return;
		}
		$.ajax({
			url: "<?php echo site_url(); ?>/ioperasi/layananbhp",
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
				bhptgl: bhptgl
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

	function ubahopr() {
		modalload();
		$.ajax({
			url: "<?php echo site_url(); ?>/ioperasi/kelolaformopr",
			type: "GET",
			success: function(ajaxData) {
				$("#formopr").html(ajaxData);
				modalloadtutup();
			},
			error: function(ajaxData) {
				modalloadtutup();
			}
		});
	}

	function ubahopredit(id) {
		modalload();
		$.ajax({
			url: "<?php echo site_url(); ?>/ioperasi/kelolaformopredit",
			type: "GET",
			data: {
				id: id
			},
			success: function(ajaxData) {
				$("#formopr").html(ajaxData);
				modalloadtutup();
			},
			error: function(ajaxData) {
				modalloadtutup();
			}
		});
	}

	function ubahdataopr(id) {
		modalload();
		var notrans = document.getElementById("notrans").value;
		var rm = document.getElementById("rm").value;
		var notransin = document.getElementById("notransin").value;
		var tdtindakan = $("#tdtindakan").val();
		var tdtindakantext = $("#tdtindakan option:selected").text();
		var tddokter = $("#tddokter").val();
		var tddoktertext = $("#tddokter option:selected").text();
		var tddokterdua = $("#tddokterdua").val();
		var tddokterduatext = $("#tddokterdua option:selected").text();
		var tddoktertiga = $("#tddoktertiga").val();
		var tddoktertigatext = $("#tddoktertiga option:selected").text();
		var tdspesialis = $("#tdspesialis").val();
		var tdspesialistext = $("#tdspesialis option:selected").text();
		var tdanak = $("#tdanak").val();
		var tdanaktext = $("#tdanak option:selected").text();
		var tdpenata = $("#tdpenata").val();
		var tdpenatatext = $("#tdpenata option:selected").text();
		var tdperawat = $("#tdperawat").val();
		var tdperawattext = $("#tdperawat option:selected").text();
		var tdperawat2 = $("#tdperawat2").val();
		var tdperawattext2 = $("#tdperawat2 option:selected").text();
		var kdunit = document.getElementById("kdunit").value;
		var unit = document.getElementById("unit").value;
		var tddiskon = document.getElementById("tddiskon").value;
		var tdumum = $("#tdumum").prop('checked');
		var cat = $("#catatan").val();
		var disc1 = document.getElementById("disc1").value;
		var disc2 = document.getElementById("disc2").value;
		var disc3 = document.getElementById("disc3").value;
		var tindakantgl = document.getElementById("tindakantgl").value;
		var jammulai = document.getElementById("jammulai").value;
		var jamselesai = document.getElementById("jamselesai").value;
		if ((tdtindakan == "")) {
			modalloadtutup();
			kuranglengkap();
			return;
		}
		$.ajax({
			url: "<?php echo site_url(); ?>/ioperasi/layananoprubah",
			type: "GET",
			data: {
				id: id,
				rm: rm,
				tdtindakan: tdtindakan,
				tdtindakantext: tdtindakantext,
				notrans: notrans,
				notransin: notransin,
				unit: unit,
				kdunit: kdunit,
				tddokter: tddokter,
				tddoktertext: tddoktertext,
				tddokterdua: tddokterdua,
				tddokterduatext: tddokterduatext,
				tddoktertiga: tddoktertiga,
				tddoktertigatext: tddoktertigatext,
				tdspesialis: tdspesialis,
				tdspesialistext: tdspesialistext,
				tdanak: tdanak,
				tdanaktext: tdanaktext,
				tdpenata: tdpenata,
				tdpenatatext: tdpenatatext,
				tdperawat: tdperawat,
				tdperawattext: tdperawattext,
				tdperawat2: tdperawat2,
				tdperawattext2: tdperawattext2,
				tddiskon: tddiskon,
				tdumum: tdumum,
				cat: cat,
				disc1: disc1,
				disc2: disc2,
				disc3: disc3,
				tindakantgl: tindakantgl,
				jammulai : jammulai,
				jamselesai : jamselesai
			},
			success: function(ajaxData) {
				console.log(ajaxData);
				var t = $.parseJSON(ajaxData);

				if (t.stat == true) {
					tdsuksesalert(1);
					$("#tabeltindakan tbody tr").remove();
					$("#tabeltindakan tbody").append(t.dtview);
					$("#formopr").html(t.formnya);
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

	function hapusdataopr(e, id) {
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
						var unit = $("#kdunit").val();
						var unittext = $("#unitselect option:selected").text();
						var notrans = document.getElementById("notrans").value;
						$.ajax({
							url: "<?php echo site_url(); ?>/ioperasi/layananoprhapus",
							type: "GET",
							data: {
								id: id,
								notrans: notrans,
								kdunit: unit,
								unittext: unittext
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
			url: "<?php echo site_url(); ?>/ioperasi/kelolaformbhp",
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
			url: "<?php echo site_url(); ?>/ioperasi/kelolaformbhpedit",
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
		var bhptgl = document.getElementById("bhptgl").value;
		var bhpbhp = $("#bhpbhp").val();
		var bhpbhptext = $("#bhpbhp option:selected").text();
		var unit = $("#kdunit").val();
		var kdunit = document.getElementById("kdunit").value;
		var unittext = $("#unitselect option:selected").text();
		var bhpqty = document.getElementById("bhpqty").value;
		var bhpstauan = document.getElementById("bhpstauan").value;
		var bhpharga = document.getElementById("bhpharga").value;

		if ((bhptgl == "") || (bhpbhp == "") || (bhpqty == "") || (bhpstauan == "") || (bhpharga == "")) {
			modalloadtutup();
			kuranglengkap();
			return;
		}
		$.ajax({
			url: "<?php echo site_url(); ?>/ioperasi/layananbhpubah",
			type: "GET",
			data: {
				id: id,
				notrans: notrans,
				kdunit: kdunit,
				bhptgl: bhptgl,
				bhpbhp: bhpbhp,
				bhpbhptext: bhpbhptext,
				unit: unit,
				unittext: unittext,
				bhpqty: bhpqty,
				bhpstauan: bhpstauan,
				bhpharga: bhpharga
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
						var unit = $("#kdunit").val();
						var unittext = $("#unitselect option:selected").text();
						var notrans = document.getElementById("notrans").value;
						var kdunit = document.getElementById("kdunit").value;
						$.ajax({
							url: "<?php echo site_url(); ?>/ioperasi/layananbhphapus",
							type: "GET",
							data: {
								id: id,
								notrans: notrans,
								unit: unit,
								unittext: unittext,
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

	function ubahodua() {
		modalload();
		$.ajax({
			url: "<?php echo site_url(); ?>/ioperasi/kelolaformodua",
			type: "GET",
			success: function(ajaxData) {
				$("#formodua").html(ajaxData);
				modalloadtutup();
			},
			error: function(ajaxData) {
				modalloadtutup();
			}
		});
	}

	function ubahoduaedit(id) {
		modalload();
		$.ajax({
			url: "<?php echo site_url(); ?>/ioperasi/kelolaformoduaedit",
			type: "GET",
			data: {
				id: id
			},
			success: function(ajaxData) {
				$("#formodua").html(ajaxData);
				modalloadtutup();
			},
			error: function(ajaxData) {
				modalloadtutup();
			}
		});
	}

	function ubahdataodua(id) {
		modalload();
		var notrans = document.getElementById("notrans").value;
		var otgl = document.getElementById("otgl").value;
		var ojam = document.getElementById("ojam").value;
		var unit = $("#kdunit").val();
		var unittext = $("#unitselect option:selected").text();
		var kdunit = document.getElementById("kdunit").value;
		var ojml = document.getElementById("ojml").value;
		if ((otgl == "") || (ojam == "") || (ojml == "")) {
			modalloadtutup();
			kuranglengkap();
			return;
		}
		$.ajax({
			url: "<?php echo site_url(); ?>/ioperasi/layananoduaubah",
			type: "GET",
			data: {
				id: id,
				notrans: notrans,
				otgl: otgl,
				ojam: ojam,
				unit: unit,
				unittext: unittext,
				ojml: ojml,
				kdunit: kdunit
			},
			success: function(ajaxData) {
				var t = $.parseJSON(ajaxData);

				if (t.stat == true) {
					tdsuksesalert(1);
					$("#tabelodua tbody tr").remove();
					$("#tabelodua tbody").append(t.dtview);
					$("#formodua").html(t.formnya);
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

	function hapusdataodua(e, id) {
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
						var unit = $("#kdunit").val();
						var unittext = $("#unitselect option:selected").text();
						var notrans = document.getElementById("notrans").value;
						var kdunit = document.getElementById("kdunit").value;
						$.ajax({
							url: "<?php echo site_url(); ?>/ioperasi/layananoduahapus",
							type: "GET",
							data: {
								id: id,
								notrans: notrans,
								unit: unit,
								unittext: unittext,
								kdunit: kdunit
							},
							success: function(ajaxData) {
								var t = $.parseJSON(ajaxData);
								if (t.stat == true) {
									tdsuksesalert(2);
									$("#tabelodua tbody tr").remove();
									$("#tabelodua tbody").append(t.dtview);
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

	function simpanpindah() {
		modalload();
		var notrans = document.getElementById("notrans").value;
		var pktgl = document.getElementById("pktgl").value;
		var pkjam = document.getElementById("pkjam").value;
		var pkunit = $("#pkunit").val();
		var pkunittext = $("#pkunit option:selected").text();
		var kamar = $("#kamar").val();
		var kamartext = $("#kamar option:selected").text();
		if ((pktgl == "") || (pkjam == "") || (pkunit == "")) {
			modalloadtutup();
			kuranglengkap();
			return;
		}
		$.ajax({
			url: "<?php echo site_url(); ?>/ioperasi/layananpindahkamar",
			type: "GET",
			data: {
				notrans: notrans,
				pktgl: pktgl,
				pkjam: pkjam,
				pkunit: pkunit,
				pkunittext: pkunittext,
				kamar: kamar,
				kamartext: kamartext
			},
			success: function(ajaxData) {
				var t = $.parseJSON(ajaxData);
				if (t.stat == true) {
					tdsuksesalert(0);
					$("#tabelhistory tbody tr").remove();
					$("#tabelhistory tbody").append(t.dtview);
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

	function pasienkembali(e, id) {
		var txt = $(e).parents('tr').find("td:eq(1)").text();
		$.confirm({
			title: 'Kembalikan Pasien',
			content: 'Yakin Pasien dari Unit ' + txt + ' Dikembalikan?',
			buttons: {
				batal: {
					text: 'Batal',
					btnClass: 'btn-red',
					action: function() {

					}
				},
				kembali: {
					text: 'Kembalikan',
					btnClass: 'btn-blue',
					keys: ['enter'],
					action: function() {
						var unit = $("#kdunit").val();
						var unittext = $("#unitselect option:selected").text();
						var notrans = document.getElementById("notrans").value;
						$.ajax({
							url: "<?php echo site_url(); ?>/kelolapasien/kembalikanpasienopr",
							type: "GET",
							data: {
								id: id,
								notrans: notrans,
								unit: unit,
								unittext: unittext
							},
							success: function(ajaxData) {
								var t = $.parseJSON(ajaxData);
								if (t.stat == true) {
									pkembali();
									$("#tabelhistory tbody tr").remove();
									$("#tabelhistory tbody").append(t.dtview);
									modalloadtutup();
								} else {
									$.notify("Pasien tidak dizinkan dikembalikan, karena sudah diberi tindakan", "error");
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

	function pasienpulang(e, id) {
		var txt = $(e).parents('tr').find("td:eq(1)").text();
		$.confirm({
			onOpen: function() {
				$('#datepicker').datepicker({
					autoclose: true
				}).datepicker("setDate", "0");
				$('#waktu').timepicker({
					showInputs: false,
					minuteStep: 1,
					showMeridian: false
				});
			},
			onClose: function() {
				$("#datepicker").datepicker("destroy");

			},
			title: 'Pasien Pulang',
			content: '<form action="">' +
				'<div class="form-group">' +
				'<label col-sm-3 control-label>Tanggal</label>' +
				'<input type="text" class="col-sm-9 form-control" id="datepicker" required />' +
				'</div>' +
				'<div class="form-group">' +
				'<label col-sm-3 control-label>Jam</label>' +
				'<div class="bootstrap-timepicker"><input type="text" class="col-sm-9 form-control" id="waktu" required />' +
				'</div></div>' +
				'<div class="form-group">' +
				'<label col-sm-3 control-label>Kondisi Keluar</label>' +
				'<select name="kk" id="kk" class="col-sm-9 form-control">' +
				kdkeluar +
				'</select>' +
				'</div>' +
				'<div class="form-group">' +
				'<label col-sm-3 control-label>Kondisi Berkas RM</label>' +
				'<select name="rm" id="rm" class="col-sm-9 form-control">' +
				kdkeluarrm +
				'</select>' +
				'</div>' +
				'<div class="form-group">' +
				'<label col-sm-3 control-label>Cara Keluar</label>' +
				'<select name="ck" id="ck" class="col-sm-9 form-control">' +
				crkeluar +
				'</select>' +
				'</div>' +
				'</form>',
			buttons: {
				batal: {
					text: 'Batal',
					btnClass: 'btn-red',
					action: function() {

					}
				},
				pulang: {
					text: 'Pulang',
					btnClass: 'btn-blue',
					keys: ['enter'],
					action: function() {
						var unit = $("#kdunit").val();
						var unittext = $("#unitselect option:selected").text();
						var notrans = document.getElementById("notrans").value;
						var datepicker = document.getElementById("datepicker").value;
						var waktu = document.getElementById("waktu").value;
						var kk = document.getElementById("kk").value;
						var rm = document.getElementById("rm").value;
						var ck = document.getElementById("ck").value;
						$.ajax({
							url: "<?php echo site_url(); ?>/kelolapasien/pulangkanpasien",
							type: "GET",
							data: {
								id: id,
								notrans: notrans,
								unit: unit,
								unittext: unittext,
								datepicker: datepicker,
								waktu: waktu,
								kk: kk,
								rm: rm,
								ck: ck
							},
							success: function(ajaxData) {
								var t = $.parseJSON(ajaxData);
								if (t.stat == true) {
									ppulang();
									$("#tabelhistory tbody tr").remove();
									$("#tabelhistory tbody").append(t.dtview);
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

	function carikamar() {
		var pkunit = $("#pkunit").val();
		$.ajax({
			url: "<?php echo site_url(); ?>/ioperasi/ambilpindahkamar",
			type: "GET",
			data: {
				pkunit: pkunit
			},
		}).then(function(data) {
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
</script>