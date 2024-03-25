<div class="modal-dialog modal-xl" role="document">
	<div class="modal-content">
		<!-- <div class="box box-default box-solid" id="proseskotak"> -->
		<div class="modal-header p-1 pl-3 align-text-bottom">
			<b class="modal-title" id="exampleModalLabel">Tambah Data Pasien</b>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body pt-n1">
			<div class="row p-1 mt-n2">
				<div class="col-12">
					<span class="danger">* Wajib diisi</span>
				</div>
			</div>
			<div class="row spacing-row">
				<div class="col-md-6">
					<div class="row form-group">
						<label class="col-sm-4 col-form-label text-right">NIK *</label>
						<div class="col-sm-8">
							<input type="text" maxlength="16" class="form-control" name="nik7" id="nik7" placeholder="NIK" autocomplete="off">
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="row form-group">
						<label class="col-sm-4 col-form-label text-right">Handphone *</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="hp" id="hp" placeholder="Handphone" autocomplete="off">
						</div>
					</div>
				</div>
			</div>
			<div class="row spacing-row">
				<div class="col-md-6">
					<div class="row form-group">
						<label class="col-sm-4 col-form-label text-right">Title *</label>
						<div class="col-sm-8">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" name="title" id="title1" value="Tn">
								<label class="custom-control-label" for="title1">Tn.</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" name="title" id="title2" value="Ny">
								<label class="custom-control-label" for="title2">Ny.</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" name="title" id="title3" value="Nn">
								<label class="custom-control-label" for="title3">Nn.</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" name="title" id="title4" value="Anak">
								<label class="custom-control-label" for="title4">Anak</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" name="title" id="title5" value="Bayi">
								<label class="custom-control-label" for="title5">Bayi</label>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="row form-group">
						<label class="col-sm-4 col-form-label text-right">Pekerjaan Pasien</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="pekerjaan" id="pekerjaan" placeholder="Pekerjaan" autocomplete="off">
						</div>
					</div>
				</div>
			</div>
			<div class="row spacing-row">
				<div class="col-md-6">
					<div class="row form-group">
						<label class="col-sm-4 col-form-label text-right">No. RM</label>
						<div class="col-sm-4">
							<input type="text" maxlength="6" class="form-control" name="rm" id="rm" placeholder="No. RM" onkeypress="return hanyaAngka(event)" disabled autocomplete="off">
						</div>
						<div class="col-sm-4">
							<div class="custom-control custom-checkbox custom-control-inline">
								<input type="checkbox" class="custom-control-input" id="otomatis" name="otomatis" value="otomatis" checked>
								<label class="custom-control-label" for="otomatis">Otomatis</label>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="row form-group">
						<label class="col-sm-4 col-form-label text-right">Golongan Darah </label>
						<div class="col-sm-8">
							<select class="form-control" style="width: 100%;" name="goldarah" id="goldarah">
								<option value="-" selected>--pilih--</option>
								<?php
								foreach ($goldarah as $row) {
								?>
									<option value="<?php echo $row->goldarah; ?>"><?php echo $row->goldarah; ?></option>
								<?php
								}
								?>
							</select>
						</div>
					</div>
				</div>
			</div>
			<div class="row spacing-row">
				<div class="col-md-6">
					<div class="row form-group">
						<label class="col-sm-4 col-form-label text-right">Nama Pasien *</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="nmpas" id="nmpas" placeholder="Nama Pasien" autocomplete="off" required>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="row form-group">
						<label class="col-sm-4 col-form-label text-right">Alamat Pasien*</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" autocomplete="off">
						</div>
					</div>
				</div>
			</div>
			<div class="row spacing-row">
				<div class="col-md-6">
					<div class="row form-group">
						<label class="col-sm-4 col-form-label text-right">Tanggal Daftar *</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="daftar" name="tgldaftar" autocomplete="off" required>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="row form-group">
						<label class="col-sm-4 col-form-label text-right">Provinsi *</label>
						<div class="col-sm-8">
							<select class="form-control prov" style="width: 100%;" name="provinsi" id="prov" onchange="propganti()">
								<option value="-" selected>--pilih--</option>
								<?php
								foreach ($prov as $row) {
								?>
									<option value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>
								<?php
								}
								?>
							</select>
						</div>
					</div>
				</div>
			</div>
			<div class="row spacing-row">
				<div class="col-md-6">
					<div class="row form-group">
						<label class="col-sm-4 col-form-label text-right">Nama Panggilan</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="nmp" id="nmp" placeholder="Nama Panggilan" autocomplete="off">
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="row form-group">
						<label class="col-sm-4 col-form-label text-right">Kabupaten/Kota *</label>
						<div class="col-sm-8">
							<select class="form-control" style="width: 100%;" name="provinsi" type="text" id="kab" onchange="kabganti()">
							</select>
						</div>
					</div>
				</div>
			</div>
			<div class="row spacing-row">
				<div class="col-md-6">
					<div class="row form-group">
						<label class="col-sm-4 col-form-label text-right">Tempat Lahir *</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="t4lahir" name="t4lahir" placeholder="Tempat Lahir" autocomplete="off" required>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="row form-group">
						<label class="col-sm-4 col-form-label text-right">Kecamatan *</label>
						<div class="col-sm-8">
							<select class="form-control" style="width: 100%;" name="provinsi" id="kec" onchange="kecganti()">
							</select>
						</div>
					</div>
				</div>
			</div>
			<div class="row spacing-row">
				<div class="col-md-6">
					<div class="row form-group">
						<label class="col-sm-4 col-form-label text-right">Tanggal Lahir *</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="lahir" name="tgllahir" autocomplete="off" required>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="row form-group">
						<label class="col-sm-4 col-form-label text-right">Kelurahan/Desa *</label>
						<div class="col-sm-8">
							<select class="form-control" style="width: 100%;" name="provinsi" id="kel">
							</select>
						</div>
					</div>
				</div>
			</div>
			<div class="row spacing-row">
				<div class="col-md-6">
					<div class="row form-group">
						<label class="col-sm-4 col-form-label text-right">Pendidikan *</label>
						<div class="col-sm-8">
							<select class="form-control" style="width: 100%;" name="pendidikan" id="pendidikan" placeholder="Pendidikan">
								<?php
								foreach ($pendidikan as $row) {
								?>
									<option value="<?php echo $row->pendidikan; ?>"><?php echo $row->pendidikan; ?></option>
								<?php
								}
								?>
							</select>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="row form-group">
						<label class="col-sm-4 col-form-label text-right">Nama Ibu Kandung *</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="nmortu" id="nmortu" placeholder="Nama Ibu Kandung" autocomplete="off">
						</div>
					</div>
				</div>
			</div>
			<div class="row spacing-row">
				<div class="col-md-6">
					<div class="row form-group">
						<label class="col-sm-4 col-form-label text-right">Status *</label>
						<div class="col-sm-8">
							<select class="form-control" style="width: 100%;" name="stat" id="stat">
								<?php
								foreach ($status as $row) {
								?>
									<option value="<?php echo $row->status; ?>"><?php echo $row->status; ?></option>
								<?php
								}
								?>
							</select>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="row form-group">
						<label class="col-sm-4 col-form-label text-right">Pekerjaan *</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="pkrortu" id="pkrortu" placeholder="Pekerjaan Orang Tua" autocomplete="off">
						</div>
					</div>
				</div>
			</div>
			<div class="row spacing-row">
				<div class="col-md-6">
					<div class="row form-group">
						<label class="col-sm-4 col-form-label text-right">Agama *</label>
						<div class="col-sm-8">
							<select class="form-control" style="width: 100%;" name="agama" id="ag">
								<?php
								foreach ($agama as $row) {
								?>
									<option value="<?php echo $row->agama; ?>"><?php echo $row->agama; ?></option>
								<?php
								}
								?>
							</select>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="row form-group">
						<label class="col-sm-4 col-form-label text-right">Penanggung Jawab *</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="pj" id="pj" placeholder="Penganggung Jawab" autocomplete="off">
						</div>
					</div>
				</div>
			</div>
			<div class="row spacing-row">
				<div class="col-md-6">
					<div class="row form-group">
						<label class="col-sm-4 col-form-label text-right">Suku *</label>
						<div class="col-sm-8">
							<select class="form-control" style="width: 100%;" name="suku" id="suku">
								<?php
								foreach ($suku as $row) {
								?>
									<option value="<?php echo $row->suku; ?>"><?php echo $row->suku; ?></option>
								<?php
								}
								?>
							</select>
						</div>
					</div>
				</div>
				
				<div class="col-md-6">
					<div class="row form-group">
						<label class="col-sm-4 col-form-label text-right">Alamat P.Jawab*</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="pkrsi" id="pkrsi" placeholder="Alamat Penanggung Jawab" autocomplete="off">
						</div>
					</div>
				</div>
			</div>
			<div class="row spacing-row">
				<div class="col-md-6">
					<div class="row form-group">
						<label class="col-sm-4 col-form-label text-right">Jenis Kelamin *</label>
						<div class="col-sm-8">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" name="jk" id="jkl" value="L">
								<label class="custom-control-label" for="jkl">Laki-laki</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" name="jk" id="jkp" value="P">
								<label class="custom-control-label" for="jkp">Perempuan</label>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="row form-group">
						<label class="col-sm-4 col-form-label text-right">Telp/HP P. Jawab *</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="telppj" id="telppj" placeholder="Telp/HP Penanggung Jawab" autocomplete="off">
						</div>
					</div>
				</div>
			</div>
			<div class="row spacing-row">
				<div class="col-md-6">
					<div class="row form-group">
						<label class="col-sm-4 col-form-label text-right">Penjamin *</label>
						<div class="col-sm-8">
							<select class="form-control" style="width: 100%;" name="gol" id="gol" onchange="changegol(1);">
								<option value="-" selected>--pilih--</option>
								<?php
								foreach ($golongan as $row) {
								?>
									<option value="<?php echo $row->golongan; ?>"><?php echo $row->golongan; ?></option>
								<?php
								}
								?>
							</select>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="row form-group">
						<label class="col-sm-4 col-form-label text-right">Nama Keluarga</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="nmk" id="nmk" placeholder="Nama Keluarga" autocomplete="off">
						</div>
					</div>
				</div>
			</div>
			<div class="row spacing-row">
				<div class="col-md-6">
					<div class="row form-group">
						<label class="col-sm-4 col-form-label text-right">Kelas Hak *</label>
						<div class="col-sm-8">
							<select class="form-control" style="width: 100%;" name="kelashak" id="kh">
								<option value="0">--pilih--</option>
								<?php
								foreach ($kelashak as $row) {
								?>
									<option value="<?php echo $row->namakelas; ?>"><?php echo $row->namakelas; ?></option>
								<?php
								}
								?>
							</select>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="row form-group">
						<label class="col-sm-4 col-form-label text-right">Pekerjaan Keluarga</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="telp" id="telp" placeholder="Pekerjaan Keluarga" autocomplete="off">
						</div>
					</div>
				</div>
			</div>
			<div class="row spacing-row">
				<div class="col-md-6">
					<div class="row form-group">
						<label class="col-sm-4 col-form-label text-right">No. Kartu *</label>
						<div class="col-sm-8">
							<input type="text" maxlength="13" class="form-control" name="nokartu" id="nokartu" placeholder="Nomor Kartu" autocomplete="off">
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="row form-group">
						<label class="col-sm-4 col-form-label text-right">Alamat Keluarga</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="ak" id="ak" placeholder="Alamat Keluarga" autocomplete="off">
						</div>
					</div>
				</div>
			</div>
			<div class="row spacing-row">
				<div class="col-md-6">
				</div>
				<div class="col-md-6">
					<div class="row form-group">
						<label class="col-sm-4 col-form-label text-right">Negara *</label>
						<div class="col-sm-8">
							<select class="form-control prov" style="width: 100%;" name="negara" id="negara">
								<?php
								foreach ($negara as $row) {
								?>
									<option value="<?php echo $row->negara; ?>" <?php if ($row->negara == "Indonesia") {
																					echo "selected";
																				} ?>><?php echo $row->negara; ?></option>
								<?php
								}
								?>
							</select>
						</div>
					</div>
				</div>
			</div>
			<div class="row mt-3">
				<div class="col-12 text-right">
					<button id="simpanpasien" class="btn btn btn-primary">Save</button>
				</div>
			</div>
		</div>
		<!-- </div> -->
	</div>
</div>
<script>
	function hanyaAngka(evt) {
		var charCode = (evt.which) ? evt.which : event.keyCode
		if (charCode > 31 && (charCode < 48 || charCode > 57))

			return false;
		return true;
	}

	function modalload() {
		$("#kotakform").append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
	}

	function modalloadtutup() {
		$(".overlay").remove();
	}

	function suksesalert() {
		$.notify("Sukses Input Data", "success");
	}

	function gagalalert(info = "Gagal Input Data / Ulangi Save Kembali") {
		$.notify(info, "error");
	}

	$(function() {
		$('#lahir').datepicker({
			autoclose: true,
			dateFormat: 'dd-mm-yy',
			changeMonth: true,
			changeYear: true,
			yearRange: "-100:+00"
		});
		$('#daftar').datepicker({
			autoclose: true,
			dateFormat: 'dd-mm-yy',
			changeMonth: true,
			changeYear: true,
			yearRange: "-100:+00"
		}).datepicker("setDate", "0");
		$('#prov').select2({
			tags: true
		});
		$('#kab').select2({
			tags: true
		});
		$('#kec').select2({
			tags: true
		});
		$('#kel').select2({
			tags: true
		});
		$('#stat').select2({
			tags: true
		});
		$('#ag').select2({
			tags: true
		});
		$('#gol').select2({
			tags: true
		});
		$('#asp').select2({
			tags: true
		});
		$('#kh').select2({
			tags: true
		});
		$('#pendidikan').select2({
			tags: true
		});
		$('#suku').select2({
			tags: true
		});
		$('#goldarah').select2({
			tags: true
		});
		$('#negara').select2({
			tags: true
		});
		$('#otomatis').change(function() {
			if ($(this).is(":checked")) {
				$('#rm').prop('disabled', true);
				$('#rm').prop('required', false);
			} else {
				$('#rm').prop('disabled', false);
				$('#rm').prop('required', true);
			}
		});
	});

	function propganti() {
		var prov = $("#prov").val();
		$.ajax({
			url: "<?php echo site_url(); ?>/wilayahchain/ambilkabupaten",
			type: "GET",
			data: {
				prov: prov
			},
		}).then(function(data) {
			$("#kab option").remove();
			$("#kec option").remove();
			$("#kel option").remove();
			var t = JSON.parse(data);
			var op = new Option("-Pilih-", "-", true, true);
			$('#kab').append(op);
			t.forEach(function(entry) {
				var option = new Option(entry.name, entry.id, false, false);
				$('#kab').append(option);
			});
		});
	}

	function kabganti() {
		var kab = $("#kab").val();
		$.ajax({
			url: "<?php echo site_url(); ?>/wilayahchain/ambilkecamatan",
			type: "GET",
			data: {
				kab: kab
			},
		}).then(function(data) {
			$("#kec option").remove();
			$("#kel option").remove();
			var t = JSON.parse(data);
			var op = new Option("-Pilih-", "-", true, true);
			$('#kec').append(op);
			t.forEach(function(entry) {
				var option = new Option(entry.name, entry.id, false, false);
				$('#kec').append(option);
			});
		});
	}

	function kecganti() {
		var kec = $("#kec").val();
		$.ajax({
			url: "<?php echo site_url(); ?>/wilayahchain/akmbilkelurahan",
			type: "GET",
			data: {
				kec: kec
			},
		}).then(function(data) {
			$("#kel option").remove();
			var t = JSON.parse(data);
			var op = new Option("-Pilih-", "-", true, true);
			$('#kel').append(op);
			t.forEach(function(entry) {
				var option = new Option(entry.name, entry.id, false, false);
				$('#kel').append(option);
			});
		});
	}

	function changegol(status) {
		$.getJSON('<?php echo site_url(); ?>/registrasipasien/cariasuransi/' + $("#gol").val(), function(data) {
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
			$('#asp').empty();
			$('#asp').append('<option value="0">--Pilih--</option>');
			$.each(temp, function(key, obj) {
				if (status == 0) {
					$('#asp').append('<option value="' + obj.k + '">' + obj.v + '</option>');
				} else {
					$('#asp').append('<option value="' + obj.k + '">' + obj.v + '</option>');
				}
			});
		});
	}

	function previewImage() {
		document.getElementById("image-preview").style.display = "block";
		var oFReader = new FileReader();
		oFReader.readAsDataURL(document.getElementById("foto").files[0]);

		oFReader.onload = function(oFREvent) {
			document.getElementById("image-preview").src = oFREvent.target.result;
		};
	};

	$(document).ready(function() {
		$("#simpanpasien").click(function(e) {
			e.preventDefault();
			// modalload();
			var rm = document.getElementById("rm").value;
			var otomatis = $("#otomatis").prop('checked');
			var nik7 = document.getElementById("nik7").value;
			var title = $("input[name='title']:checked").val();
			var nmpas = document.getElementById("nmpas").value;
			var daftar = document.getElementById("daftar").value;
			var nmp = document.getElementById("nmp").value;
			var t4lahir = document.getElementById("t4lahir").value;
			var lahir = document.getElementById("lahir").value;
			//var pendidikan = document.getElementById("pendidikan").value;
			var pendidikan = $("#pendidikan").val();
			var pekerjaan = document.getElementById("pekerjaan").value;
			var nmortu = document.getElementById("nmortu").value;
			var alamat = document.getElementById("alamat").value;
			var pkrortu = document.getElementById("pkrortu").value;
			var pkrsi = document.getElementById("pkrsi").value;
			var prov = $("#prov").val();
			var provtext = $("#prov option:selected").text();
			var kab = $("#kab").val();
			var kabtext = $("#kab option:selected").text();
			var kec = $("#kec").val();
			var kectext = $("#kec option:selected").text();
			var kel = $("#kel").val();
			var keltext = $("#kel option:selected").text();
			var telp = document.getElementById("telp").value;
			var hp = document.getElementById("hp").value;
			var stat = $("#stat").val();
			var pj = document.getElementById("pj").value;
			var telppj = document.getElementById("telppj").value;
			var nmk = document.getElementById("nmk").value;
			var ak = document.getElementById("ak").value;
			var ag = $("#ag").val();
			var jk = $("input[name='jk']:checked").val();
			var gol = $("#gol").val();
			var goldarah = $("#goldarah").val();
			var suku = $("#suku").val();
			var asp = $("#asp").val();
			var kh = $("#kh").val();
			var nokartu = document.getElementById("nokartu").value;
			var foto = $('#foto').val();
			var negara = $("#negara").val();
			var kelashak = $("#kelashak").val();
			var datacek = [title, nmpas, daftar, t4lahir, lahir, pendidikan, nmortu, alamat, prov, kab, kec, kel, hp, stat, pj, telppj, ag, suku, gol, jk, asp, negara, nik7];
			var dtcek;

			pdaflen = daftar.length;
			if (pdaflen != 10) {
				$.notify("Format Tanggal Daftar Salah", "error");
				return;
			}

			plen = lahir.length;
			if (plen != 10) {
				$.notify("Format Tanggal Lahir Salah", "error");
				return;
			}
			datacek.some(function(item, index) {
				if (item == "") {
					modalloadtutup();
					dtcek = false;
					return;
				}
			});
			if (dtcek == false) {
				$.notify("Data kurang lengkap", "error");
				return;
			}


			//simpan data
			var formdata = new FormData();
			formdata.append('nik7', nik7);
			formdata.append('rm', rm);
			formdata.append('otomatis', otomatis);
			formdata.append('title', title);
			formdata.append('nmpas', nmpas);
			formdata.append('daftar', daftar);
			formdata.append('nmp', nmp);
			formdata.append('t4lahir', t4lahir);
			formdata.append('lahir', lahir);
			formdata.append('pendidikan', pendidikan);
			formdata.append('pekerjaan', pekerjaan);
			formdata.append('nmortu', nmortu);
			formdata.append('pkrortu', pkrortu);
			formdata.append('pkrsi', pkrsi);
			formdata.append('alamat', alamat);
			formdata.append('prov', prov);
			formdata.append('provtext', provtext);
			formdata.append('kab', kab);
			formdata.append('kabtext', kabtext);
			formdata.append('kec', kec);
			formdata.append('kectext', kectext);
			formdata.append('kel', kel);
			formdata.append('keltext', keltext);
			formdata.append('telp', telp);
			formdata.append('hp', hp);
			formdata.append('stat', stat);
			formdata.append('pj', pj);
			formdata.append('telppj', telppj);
			formdata.append('nmk', nmk);
			formdata.append('ak', ak);
			formdata.append('ag', ag);
			formdata.append('jk', jk);
			formdata.append('gol', gol);
			formdata.append('goldarah', goldarah);
			formdata.append('suku', suku);
			formdata.append('asp', asp);
			formdata.append('kh', kh);
			formdata.append('nokartu', nokartu);
			formdata.append('negara', negara);
			formdata.append('kelashak', kelashak);
			$.ajax({
				url: "<?php echo site_url(); ?>/registrasipasien/simpanpasien",
				dataType: 'text',
				cache: false,
				contentType: false,
				processData: false,
				data: formdata,
				type: "post",
				success: function(ajaxData) {
					var t = $.parseJSON(ajaxData);

					if (t.dtsukses == true) {
						suksesalert();
						modalloadtutup();
						formattedString = String(t.norm).padStart(6, '0');
						tutupmodal(formattedString);
					} else {
						gagalalert(t.norm);
						// modalloadtutup();
					}
				},
				error: function(ajaxData) {
					gagalalert();
					modalloadtutup();
				}
			});
		});

	});
</script>