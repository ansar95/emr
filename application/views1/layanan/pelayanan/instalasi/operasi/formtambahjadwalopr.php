<?php
if ($formpilih == 0) {
?>
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<!-- <div class="box box-default box-solid" id="proseskotak"> -->
			<div class="modal-header p-1 pl-3 align-text-bottom">
				<b class="modal-title" id="exampleModalLabel">Tambah Data Jadwal Operasi</b>
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
					<label for="username" class="col-sm-3 col-form-label">NO. BPJS</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="nokartu" id="nokartu" disabled>
					</div>
				</div>
				<div class="form-group row col-spacing-row">
					<label for="username" class="col-sm-3 col-form-label">Golongan</label>
					<div class="col-sm-9">
						<select class="form-control prov" style="width: 100%;" name="dgolongan" id="dgolongan">
							<?php
							foreach ($dtgolongan as $row) {
							?>
								<option value="<?php echo $row->golongan; ?>"><?php echo $row->golongan; ?></option>
							<?php
							}
							?>
						</select>
					</div>
				</div>
				<div class="form-group row col-spacing-row">
					<label for="username" class="col-sm-3 col-form-label">Dari Unit</label>
					<div class="col-sm-9">
						<select class="form-control prov" style="width: 100%;" name="unitasal" id="unitasal">
							<?php
							foreach ($dtunitpemesan as $row) {
							?>
								<option value="<?php echo $row->kode_unit; ?>"><?php echo $row->nama_unit; ?></option>
							<?php
							}
							?>
						</select>
					</div>
				</div>
				<div class="form-group row col-spacing-row">
					<label for="username" class="col-sm-3 col-form-label">Tanggal Operasi</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="instgl" id="instgl">
					</div>
				</div>
				<div class="form-group row col-spacing-row">
					<label for="username" class="col-sm-3 col-form-label">Dokter Pengirim</label>
					<div class="col-sm-9">
						<select class="form-control prov" style="width: 100%;" name="dpengirim" id="dpengirim">
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
					<label for="username" class="col-sm-3 col-form-label">Jenis Tindakan</label>
					<div class="col-sm-9">
						<select class="form-control prov" style="width: 100%;" name="dtindakan" id="dtindakan">
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
			</div>
			<div class="modal-footer">
				<button id="simpanpasien" class="btn btn-primary">Save</button>
			</div>
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
			$('#unitasal').select2({
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
			$('#dtindakan').select2({
				tags: true
			});
			$('#dgolongan').select2({
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
					url: "<?php echo site_url(); ?>/ioperasi/caridatarmjadwalopr",
					type: "GET",
					data: {
						rm: rm
					},
				}).then(function(data) {
					var t = JSON.parse(data);
					dataunit = t.dtpasien;
					$("#nmpas").val(t.dtpasien[0].nama_pasien);
					$("#nokartu").val(t.dtpasien[0].no_askes);
					// var option = new Option(t.dtunit.nama_unit, t.dtunit.kode_unit, true, true);
					// $('#unitdepan').append(option).trigger('change');
				});
			});

			$("#simpanpasien").click(function(e) {
				e.preventDefault();
				var rujuk = $("#rujuk").val();
				// var rujuk = document.getElementById("rujuk").value;
				var nmpas = document.getElementById("nmpas").value;
				var nokartu = document.getElementById("nokartu").value;
				var rm = document.getElementById("rm").value;
				var gol = document.getElementById("dgolongan").value;
				var unitasal = $("#unitasal").val();
				var unitasaltext = $("#unitasal option:selected").text();
				var dpengirim = $("#dpengirim").val();
				var dpengirimtext = $("#dpengirim option:selected").text();
				var instgl = document.getElementById("instgl").value;
				var tindakan = document.getElementById("dtindakan").value;
				var tindakantext = $("#dtindakan option:selected").text();
				var unitpelaksana = $("#unitpelaksana").val();
				var unitpelaksanatext = $("#unitpelaksana option:selected").text();

				$.ajax({
					url: "<?php echo site_url(); ?>/ioperasi/simpanjadwaloperasi",
					type: "GET",
					data: {
						rujuk: rujuk,
						rm: rm,
						nmpas: nmpas,
						nokartu: nokartu,
						gol: gol,
						unitasal: unitasal,
						unitasaltext: unitasaltext,
						dpengirim: dpengirim,
						dpengirimtext: dpengirimtext,
						instgl: instgl,
						tindakan: tindakan,
						tindakantext: tindakantext,
						unitpelaksana: unitpelaksana,
						unitpelaksanatext: unitpelaksanatext
					},
					success: function(ajaxData) {
						var t = $.parseJSON(ajaxData);
						// console.log(ajaxData);
						// var tdata=json_encode(t.dtjadwal);
						// console.log(tdata);
						// var hasil=JSON.stringify(t.dtjadwal);
						var kdunit = 'IBSS';
						// console.log(isi);
						if (t.stat == true) {
							suksesalert();
							modalloadtutup();
							tutupmodal(t.dtnotrans);
							// $("#tabellab tbody tr").remove();
							// $("#tabellab tbody").append(t.dtjadwal);

							// document.getElementById("caridata").click();
							$.ajax({
								url: "<?php echo site_url(); ?>/ioperasi/caridatajadwalopr",
								type: "GET",
								data: {
									kdunit: kdunit
								},
								success: function(ajaxData) {
									$("#tabellab tbody tr").remove();
									$("#tabellab tbody").append(ajaxData);
									hapusload();
								}
							});

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
			<div class="modal-header p-1 pl-3 align-text-bottom">
				<b class="modal-title" id="exampleModalLabel">Ubah Data Jadwal Operasi</b>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group row col-spacing-row">
					<label for="username" class="col-sm-3 col-form-label">Rujukan</label>
					<div class="col-sm-9">
						<select class="form-control prov" style="width: 100%;" name="rujuk" id="rujuk">
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
					<label for="username" class="col-sm-3 col-form-label">NO. BPJS</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="nokartu" id="nokartu" value="<?php echo $dt->no_askes; ?>" disabled>
					</div>
				</div>
				<div class="form-group row col-spacing-row">
					<label for="username" class="col-sm-3 col-form-label">Dari Unit</label>
					<div class="col-sm-9">
						<select class="form-control prov" style="width: 100%;" name="unitasal" id="unitasal">
							<?php
							foreach ($dtunitpemesan as $row) {
							?>
								<option value="<?php echo $row->kode_unit; ?>" <?php if ($dt->kodepoli == $row->kode_unit) {
																					echo "selected";
																				} ?>><?php echo $row->nama_unit; ?></option>
							<?php
							}
							?>
						</select>
					</div>
				</div>
				<div class="form-group row col-spacing-row">
					<label for="username" class="col-sm-3 col-form-label">Golongan</label>
					<div class="col-sm-9">
						<select class="form-control prov" style="width: 100%;" name="dgolongan" id="dgolongan">
							<?php
							foreach ($dtgolongan as $row) {
							?>
 -->
								<option value="<?php echo $row->golongan; ?>" <?php if ($dt->golongan == $row->golongan) {
																					echo "selected";
																				} ?>><?php echo $row->golongan; ?></option>

							<?php
							}
							?>
						</select>
					</div>
				</div>
				<div class="form-group row col-spacing-row">
					<label for="username" class="col-sm-3 col-form-label">Tanggal Operasi</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="tgli" id="tgli" value="<?php echo tglind2($dt->tanggaloperasi); ?>">
					</div>
				</div>
				<div class="form-group row col-spacing-row">
					<label for="username" class="col-sm-3 col-form-label">Dokter Pengirim</label>
					<div class="col-sm-9">
						<select class="form-control prov" style="width: 100%;" name="dpengirim" id="dpengirim">
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
					<label for="username" class="col-sm-3 col-form-label">Jenis Tindakan</label>
					<div class="col-sm-9">
						<select class="form-control prov" style="width: 100%;" name="dtindakan" id="dtindakan">
							<?php
							foreach ($dttindakan as $row) {
							?>
								<option value="<?php echo $row->tindakan; ?>" <?php if ($dt->tindakan == $row->tindakan) {
																					echo "selected";
																				} ?>><?php echo $row->tindakan; ?></option>
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
			</div>
			<div class="modal-footer">
				<button onclick="ubahdata(<?php echo $dt->id; ?>)" class="btn btn-primary">Save changes</buttonyy>
			</div>
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

		function sukseseditalert() {
			$.notify("Sukses Edit Data", "success");
		}


		function gagalalert() {
			$.notify("Gagal Input Data", "error");
		}

		$(function() {
			$('#rujuk').select2({
				tags: true
			});
			$('#unitasal').select2({
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
			$('#dtindakan').select2({
				tags: true
			});
			$('#unitpelaksana').select2({
				tags: true
			});
			$('#dgolongan').select2({
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
					url: "<?php echo site_url(); ?>/ioperasi/caridatarmjadwalopr",
					type: "GET",
					data: {
						rm: rm
					},
				}).then(function(data) {
					var t = JSON.parse(data);
					dataunit = t.dtpasien;
					$("#nmpas").val(t.dtpasien[0].nama_pasien);
					$("#nokartu").val(t.dtpasien[0].no_askes);
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
			var rujuk = $("#rujuk").val();
			var nmpas = document.getElementById("nmpas").value;
			var nokartu = document.getElementById("nokartu").value;
			var rm = document.getElementById("rm").value;
			var gol = document.getElementById("dgolongan").value;
			var unitasal = $("#unitasal").val();
			var unitasaltext = $("#unitasal option:selected").text();
			var dpengirim = $("#dpengirim").val();
			var dpengirimtext = $("#dpengirim option:selected").text();
			var tgli = document.getElementById("tgli").value;
			var tindakan = document.getElementById("dtindakan").value;
			var tindakantext = $("#dtindakan option:selected").text();
			var unitpelaksana = $("#unitpelaksana").val();
			var unitpelaksanatext = $("#unitpelaksana option:selected").text();
			$.ajax({
				url: "<?php echo site_url(); ?>/ioperasi/ubahjadwalopr",
				type: "GET",
				data: {
					id: id,
					rujuk: rujuk,
					rm: rm,
					nmpas: nmpas,
					nokartu: nokartu,
					gol: gol,
					unitasal: unitasal,
					unitasaltext: unitasaltext,
					dpengirim: dpengirim,
					dpengirimtext: dpengirimtext,
					tgli: tgli,
					tindakan: tindakan,
					tindakantext: tindakantext,
					unitpelaksana: unitpelaksana,
					unitpelaksanatext: unitpelaksanatext
				},
				success: function(ajaxData) {
					console.log(ajaxData);

					var t = $.parseJSON(ajaxData);
					var kdunit = 'IBSS';
					if (t.stat == true) {
						sukseseditalert();
						modalloadtutup();
						tutupmodal();
						$.ajax({
							url: "<?php echo site_url(); ?>/ioperasi/caridatajadwalopr",
							type: "GET",
							data: {
								kdunit: kdunit
							},
							success: function(ajaxData) {
								$("#tabellab tbody tr").remove();
								$("#tabellab tbody").append(ajaxData);
								hapusload();
							}
						});
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