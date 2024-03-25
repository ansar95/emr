<?php
if ($formpilih == 0) {
?>
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<!-- <div class="box box-default box-solid" id="proseskotak"> -->
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Data Pasien Kamar Operasi</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group row col-spacing-row">
					<label for="username" class="col-sm-3 col-form-label">Rujukan</label>
					<div class="col-sm-9">
						<select class="form-control prov" style="width: 100%;" name="rujuk" id="rujuk">
							<option value="RI">RI</option>
							<option value="RJ">RJ</option>
							<option value="UM">UM</option>
						</select>
					</div>
				</div>
				<div class="form-group row col-spacing-row">
					<label for="username" class="col-sm-3 col-form-label">No. RM</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="rm" id="rm" placeholder="No. RM" autocomplete="off">
					</div>
				</div>
				<div class="form-group row col-spacing-row">
					<label for="username" class="col-sm-3 col-form-label">Nama Pasien</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="nmpas" id="nmpas" disabled>
					</div>
				</div>
				<div class="form-group row col-spacing-row">
					<label for="username" class="col-sm-3 col-form-label">Dari Unit</label>
					<div class="col-sm-9">
						<select class="form-control" style="width: 100%;" name="unitdepan" type="text" id="unitdepan">
						</select>
					</div>
				</div>
				<div class="form-group row col-spacing-row">
					<label for="username" class="col-sm-3 col-form-label">Dari Kelas Perawatan</label>
					<div class="col-sm-9">
					<select class="form-control" style="width: 100%;" name="kelasdepan" type="text" id="kelasdepan">
										</select>
					</div>
				</div>
				<div class="form-group row col-spacing-row">
					<label for="username" class="col-sm-3 col-form-label">Golongan</label>
					<div class="col-sm-9">
										<input type="text" class="form-control pull-right" id="gol" name="gol" disabled>
					</div>
				</div>
				<div class="form-group row col-spacing-row">
					<label for="username" class="col-sm-3 col-form-label">Tanggal</label>
					<div class="col-sm-9">
										<input type="text" class="form-control" name="instgl" id="instgl">
					</div>
				</div>
				<div class="form-group row col-spacing-row">
					<label for="username" class="col-sm-3 col-form-label">Dokter Pengirim</label>
					<div class="col-sm-9">
					<select class="form-control prov" style="width: 100%;" name="provinsi" id="dpengirim">
											<?php
											foreach ($dtdokterpengirim as $row) {
											?>
												<option value="<?php echo $row->kode_dokter; ?>"><?php echo $row->nama_dokter; ?></option>
											<?php
											}
											?>
										</select>
					</div>
				</div>
				<div class="form-group row col-spacing-row">
					<label for="username" class="col-sm-3 col-form-label">Unit Pelaksana</label>
					<div class="col-sm-9">
					<select class="form-control prov" style="width: 100%;" name="unitpelaksana" id="unitpelaksana">
											<?php
											foreach ($dtunitpelaksana as $row) {
											?>
												<option value="<?php echo $row->kode_unit; ?>"><?php echo $row->nama_unit; ?></option>
											<?php
											}
											?>
										</select>
					</div>
				</div>
				<div class="form-group row col-spacing-row">
					<label for="username" class="col-sm-3 col-form-label">Ruangan Operasi</label>
					<div class="col-sm-9">
					<select class="form-control prov" style="width: 100%;" name="ruangoperasi" id="ruangoperasi">
											<?php
											foreach ($dtruang_operasi as $row) {
											?>
												<option value="<?php echo $row->kode_ruang; ?>"><?php echo $row->nama_ruang; ?></option>
											<?php
											}
											?>
										</select>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button id="simpanpasien" class="btn btn-primary">Save</button>
			</div>
			<!-- </div> -->
		</div>
	</div>
	<script>
		function modalload() {
			$("#kotakform").append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
		}

		function modalloadtutup() {
			$(".overlay").remove();
		}

		function suksesalert() {
			$.notify("Sukses Input Data", "success");
		}

		function gagalalert() {
			$.notify("Gagal Input Data", "error");
		}

		$(function() {
			$('#rujuk').select2({
				tags: true
			});
			$('#unitdepan').select2({
				tags: true
			});
			$('#kelasdepan').select2({
				tags: true
			});
			$('#dpengirim').select2({
				tags: true
			});
			$('#dpemeriksa').select2({
				tags: true
			});
			$('#unitpelaksana').select2({
				tags: true
			});
			$('#ruangoperasi').select2({
				tags: true
			});
			$('#instgl').datepicker({
				autoclose: true
			}).datepicker("setDate", "0");
		});

		$(document).ready(function() {

			var dataunit;
			var dataadd;

			$("#rujuk").change(function(e) {
				$("#rm").val("");
				$("#nmpas").val("");
				$("#unitdepan option").remove();
				$("#kelasdepan option").remove();
				$("#gol").val("");
			});

			$("#rm").on('input', function(e) {
				var rm = $("#rm").val();
				var rujuk = $("#rujuk").val();
				$.ajax({
					url: "<?php echo site_url(); ?>/ioperasi/caridatarm",
					type: "GET",
					data: {
						rm: rm,
						rujuk: rujuk
					},
				}).then(function(data) {
					$("#unitdepan option").remove();
					var t = JSON.parse(data);
					dataunit = t.dtpasien;
					$("#nmpas").val(t.dtpasien[0].nama_pasien);
					if (rujuk == "UM") {
						var option = new Option(t.dtunit.nama_unit, t.dtunit.kode_unit, true, true);
						$('#unitdepan').append(option).trigger('change');
					} else {
						t.dtpasien.forEach(function(entry) {
							var option = new Option(entry.nama_unit, entry.kode_unit, true, true);
							$('#unitdepan').append(option).trigger('change');
						});
					}
				});
			});

			$("#unitdepan").change(function(e) {
				var dtunit = $("#unitdepan option:selected").text();
				var kodedtunit = $("#unitdepan").val();
				dataunit.forEach(function(entry) {
					if (entry.nama_unit == dtunit) {
						$("#gol").val(entry.golongan);

						dataadd = [entry.notransaksi, entry.kode_unit, entry.nama_unit];
					}
				});
				$.ajax({
					url: "<?php echo site_url(); ?>/ioperasi/kelaspilih",
					type: "GET",
					data: {
						dtunit: kodedtunit
					},
				}).then(function(data) {
					$("#kelasdepan option").remove();
					var t = JSON.parse(data);
					t.forEach(function(entry) {
						var option = new Option(entry.nama_kelas, entry.kode_kelas, true, true);
						$('#kelasdepan').append(option).trigger('change');
					});
				});
			});


			$("#simpanpasien").click(function(e) {
				e.preventDefault();
				// var rujuk = $("#rujuk").val();
				var rujuk = document.getElementById("rujuk").value;
				var nmpas = document.getElementById("nmpas").value;
				var rm = document.getElementById("rm").value;
				var gol = document.getElementById("gol").value;
				var unitdepan = document.getElementById("kdunit").value;
				var unitdepantext = document.getElementById("unit").value;
				var unitasal = $("#unitdepan").val();
				var dpengirim = $("#dpengirim").val();
				var dpengirimtext = $("#dpengirim option:selected").text();
				var kelasdepan = $("#kelasdepan").val();
				var kelasdepantext = $("#kelasdepan option:selected").text();
				var instgl = document.getElementById("instgl").value;
				var unitpelaksana = $("#unitpelaksana").val();
				var unitpelaksanatext = $("#unitpelaksana option:selected").text();
				var kode_ruang = $("#ruangoperasi").val();
				var nama_ruang = $("#ruangoperasi option:selected").text();
				$.ajax({
					url: "<?php echo site_url(); ?>/ioperasi/simpanregisinstalasiopr",
					type: "GET",
					data: {
						rujuk: rujuk,
						nmpas: nmpas,
						dataadd: dataadd,
						rm: rm,
						gol: gol,
						unitdepan: unitdepan,
						unitdepantext: unitdepantext,
						dpengirim: dpengirim,
						dpengirimtext: dpengirimtext,
						kelasdepan: kelasdepan,
						kelasdepantext: kelasdepantext,
						unitasal: unitasal,
						instgl: instgl,
						unitpelaksana: unitpelaksana,
						unitpelaksanatext: unitpelaksanatext,
						kode_ruang : kode_ruang,
						nama_ruang : nama_ruang
					},
					success: function(ajaxData) {
						var t = $.parseJSON(ajaxData);

						if (t.stat == true) {
							suksesalert();
							modalloadtutup();
							tutupmodal(t.dtnotrans);
							document.getElementById("caridata").click();
						} else {
							gagalalert();
							modalloadtutup();
						}
					}
				});
			});

		});
	</script>
<?php
} else if ($formpilih == 1) {
?>
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<!-- <div class="box box-default box-solid" id="proseskotak"> -->
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Ubah Data Pasien Kamar Operasi</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group row col-spacing-row">
					<label for="username" class="col-sm-3 col-form-label">Rujukan</label>
					<div class="col-sm-9">
						<select class="form-control prov" style="width: 100%;" name="rujuk" id="rujuk" disabled>
							<option value="RI" <?php if ($dt->rujukan == "RI") {
													echo "selected";
												} ?>>RI</option>
							<option value="RJ" <?php if ($dt->rujukan == "RJ") {
													echo "selected";
												} ?>>RJ</option>
							<option value="UM" <?php if ($dt->rujukan == "UM") {
													echo "selected";
												} ?>>UM</option>
							<!-- <option value="UM" <?php if (($dt->rujukan != "RI") || ($dt->rujukan != "RJ")) {
														echo "selected";
													} ?>>UM</option> -->
						</select>
					</div>
				</div>
				<div class="form-group row col-spacing-row">
					<label for="username" class="col-sm-3 col-form-label">No. RM</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="rm" id="rm" placeholder="No. RM" value="<?php echo $dt->no_rm; ?>" disabled>
					</div>
				</div>
				<div class="form-group row col-spacing-row">
					<label for="username" class="col-sm-3 col-form-label">Nama Pasien</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="nmpas" id="nmpas" value="<?php echo $dt->nama_pasien; ?>" disabled>
					</div>
				</div>
				<div class="form-group row col-spacing-row">
					<label for="username" class="col-sm-3 col-form-label">Dari Unit</label>
					<div class="col-sm-9">
						<select class="form-control" style="width: 100%;" name="unitdepan" type="text" id="unitdepan" disabled>
						</select>
					</div>
				</div>
				<div class="form-group row col-spacing-row">
					<label for="username" class="col-sm-3 col-form-label">Dari Kelas Perawatan</label>
					<div class="col-sm-9">
						<select class="form-control" style="width: 100%;" name="kelasdepan" type="text" id="kelasdepan" disabled>
						</select>
					</div>
				</div>
				<div class="form-group row col-spacing-row">
					<label for="username" class="col-sm-3 col-form-label">Golongan</label>
					<div class="col-sm-9">
						<input type="text" class="form-control pull-right" id="gol" name="gol" value="<?php echo $dt->golongan; ?>" disabled>
					</div>
				</div>
				<div class="form-group row col-spacing-row">
					<label for="username" class="col-sm-3 col-form-label">Tanggal</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="tgli" id="tgli" disabled value="<?php echo $dt->tanggal; ?>">
					</div>
				</div>
				<div class="form-group row col-spacing-row">
					<label for="username" class="col-sm-3 col-form-label">Dokter Pengirim</label>
					<div class="col-sm-9">
						<select class="form-control prov" style="width: 100%;" name="provinsi" id="dpengirim">
							<?php
							foreach ($dtdokterpengirim as $row) {
							?>
								<option value="<?php echo $row->kode_dokter; ?>" <?php if ($dt->kode_dokter == $row->kode_dokter) {
																						echo "selected";
																					} ?>><?php echo $row->nama_dokter; ?></option>
							<?php
							}
							?>
						</select>
					</div>
				</div>
				<div class="form-group row col-spacing-row">
					<label for="username" class="col-sm-3 col-form-label">Unit Pelaksana</label>
					<div class="col-sm-9">
						<select class="form-control prov" style="width: 100%;" name="unitpelaksana" id="unitpelaksana">
							<?php
							foreach ($dtunitpelaksana as $row) {
							?>
								<option value="<?php echo $row->kode_unit; ?>" <?php if ($dt->kode_unit_pelaksana == $row->kode_unit) {
																					echo "selected";
																				} ?>><?php echo $row->nama_unit; ?></option>
							<?php
							}
							?>
						</select>
					</div>
				</div>
				<div class="form-group row col-spacing-row">
					<label for="username" class="col-sm-3 col-form-label">Ruangan</label>
					<div class="col-sm-9">
						<select class="form-control prov" style="width: 100%;" name="ruangoperasi" id="ruangoperasi">
							<?php
							foreach ($dtruang_operasi as $row) {
							?>
								<option value="<?php echo $row->kode_ruang; ?>" <?php if ($dt->kode_ruang == $row->kode_ruang) {
																					echo "selected";
																				} ?>><?php echo $row->nama_ruang; ?></option>
							<?php
							}
							?>
						</select>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button onclick="ubahdata(<?php echo $dt->id; ?>)" class="btn btn-primary">Save changes</button>
			</div>
			<!-- </div> -->
		</div>
	</div>
	<script>
		function modalload() {
			$("#kotakform").append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
		}

		function modalloadtutup() {
			$(".overlay").remove();
		}

		function suksesalert() {
			$.notify("Sukses Input Data", "success");
		}

		function gagalalert() {
			$.notify("Gagal Input Data", "error");
		}

		$(function() {
			$('#rujuk').select2({
				tags: true
			});
			$('#unitdepan').select2({
				tags: true
			});
			$('#kelasdepan').select2({
				tags: true
			});
			$('#dpengirim').select2({
				tags: true
			});
			$('#dpemeriksa').select2({
				tags: true
			});
			$('#unitpelaksana').select2({
				tags: true
			});
			$('#tgli').datepicker({
				autoclose: true
			}).datepicker();
			$('#instgl_selesai').datepicker({
				autoclose: true
			}).datepicker();
		});

		$(document).ready(function() {

			var dataunit;
			var dataadd;

			var rm = $("#rm").val();
			var rujuk = $("#rujuk").val();
			$.ajax({
				url: "<?php echo site_url(); ?>/ioperasi/caridatarm",
				type: "GET",
				data: {
					rm: rm,
					rujuk: rujuk
				},
			}).then(function(data) {
				$("#unitdepan option").remove();
				var t = JSON.parse(data);
				dataunit = t.dtpasien;
				$("#nmpas").val(t.dtpasien[0].nama_pasien);
				if (rujuk == "UM") {
					var option = new Option(t.dtunit.nama_unit, t.dtunit.kode_unit, true, true);
					$('#unitdepan').append(option).trigger('change');
				} else {
					t.dtpasien.forEach(function(entry) {
						var option = new Option(entry.nama_unit, entry.kode_unit, true, true);
						$('#unitdepan').append(option).trigger('change');
					});
				}
			});

			$("#rujuk").change(function(e) {
				$("#rm").val("");
				$("#nmpas").val("");
				$("#unitdepan option").remove();
				$("#kelasdepan option").remove();
				$("#gol").val("");
			});

			$("#rm").on('input', function(e) {
				var rm = $("#rm").val();
				var rujuk = $("#rujuk").val();
				$.ajax({
					url: "<?php echo site_url(); ?>/ioperasi/caridatarm",
					type: "GET",
					data: {
						rm: rm,
						rujuk: rujuk
					},
				}).then(function(data) {
					$("#unitdepan option").remove();
					var t = JSON.parse(data);
					dataunit = t.dtpasien;
					$("#nmpas").val(t.dtpasien[0].nama_pasien);
					if (rujuk == "UM") {
						var option = new Option(t.dtunit.nama_unit, t.dtunit.kode_unit, true, true);
						$('#unitdepan').append(option).trigger('change');
					} else {
						t.dtpasien.forEach(function(entry) {
							var option = new Option(entry.nama_unit, entry.kode_unit, true, true);
							$('#unitdepan').append(option).trigger('change');
						});
					}
				});
			});

			$("#unitdepan").change(function(e) {
				var dtunit = $("#unitdepan option:selected").text();
				var kodedtunit = $("#unitdepan").val();
				dataunit.forEach(function(entry) {
					if (entry.nama_unit == dtunit) {
						$("#gol").val(entry.golongan);

						dataadd = [entry.notransaksi, entry.kode_unit, entry.nama_unit];
					}
				});
				$.ajax({
					url: "<?php echo site_url(); ?>/ioperasi/kelaspilih",
					type: "GET",
					data: {
						dtunit: kodedtunit
					},
				}).then(function(data) {
					$("#kelasdepan option").remove();
					var t = JSON.parse(data);
					t.forEach(function(entry) {
						var option = new Option(entry.nama_kelas, entry.kode_kelas, true, true);
						$('#kelasdepan').append(option).trigger('change');
					});
				});
			});

		});

		function ubahdata(id) {
			var dpengirim = $("#dpengirim").val();
			var dpengirimtext = $("#dpengirim option:selected").text();
			var kode_unit_pelaksana = $("#unitpelaksana").val();
			var nama_unit_pelaksana = $("#unitpelaksana option:selected").text();
			var kode_ruang = $("#ruangoperasi").val();
			var nama_ruang = $("#ruangoperasi option:selected").text();
			$.ajax({
				url: "<?php echo site_url(); ?>/ioperasi/ubahregisinstalasiopr",
				type: "GET",
				data: {
					id: id,
					dpengirim: dpengirim,
					dpengirimtext: dpengirimtext,
					kode_unit_pelaksana : kode_unit_pelaksana,
					nama_unit_pelaksana : nama_unit_pelaksana,
					kode_ruang : kode_ruang,
					nama_ruang : nama_ruang
				},
				success: function(ajaxData) {
					var t = $.parseJSON(ajaxData);
					if (t.stat == true) {
						suksesalert();
						modalloadtutup();
						suksees();
						$(function() {
							$('#formmodal').modal('toggle');
						});
						document.getElementById("caridata").click();
					} else {
						gagalalert();
						modalloadtutup();
					}
				}
			});
		}
	</script>

<?php
}
?>