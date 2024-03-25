<?php
if ($formpilih == 0) {
?>
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<!-- <div class="box box-default box-solid" id="proseskotak"> -->
			<div class="modal-header p-1 pl-3 align-text-bottom">
				<b class="modal-title" id="exampleModalLabel">Tambah Data Master Unit</b>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="box-body">
					<div class="col-sm-12">
						<div class="form-group row">
							<label class="col-sm-3 control-label">Kode Unit</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="rm" id="kd">
							</div>
						</div>
						<div class="form-group row">
							<label for="inputEmail3" class="col-sm-3 control-label">Nama Unit</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="nmpas" id="nm">
							</div>
						</div>
						<div class="form-group row">
							<label for="inputEmail3" class="col-sm-3 control-label">Kelompok</label>
							<div class="col-sm-6">
								<select class="form-control prov" style="width: 100%;" name="kelompok" id="kelompok">
									<option value="ADM">ADM</option>
									<option value="RUANGAN">RUANGAN</option>
									<option value="POLI">POLI</option>
									<option value="PENUNJANG">PENUNJANG</option>
									<option value="APOTIK">APOTIK</option>
									<option value="KEUANGAN">KEUANGAN</option>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label for="inputEmail3" class="col-sm-3 control-label">Kode Poli SEP</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="nmpas" id="kdsep">
							</div>
						</div>
						<div class="form-group row">
							<label for="inputEmail3" class="col-sm-3 control-label">Nama Poli SEP</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="nmpas" id="sep">
							</div>
						</div>
						<div class="form-group row">
							<label for="inputEmail3" class="col-sm-3 control-label">Bagian</label>
							<div class="col-sm-9">
								<table class="table table-borderless">
									<tr>
										<td><input type="checkbox" name="ibs" id="ibs" />&nbsp;Kamar Operasi</td>
										<td><input type="checkbox" name="ilahir" id="ilahir" />&nbsp;Kamar Bersalin</td>
										<td><input type="checkbox" name="igd" id="igd" />&nbsp;IGD</td>
										<td><input type="checkbox" name="penunjang" id="penunjang" />&nbsp;Penunjang</td>
									</tr>
									<tr>
										<td><input type="checkbox" name="instalasi" id="instalasi" />&nbsp;Instalasi</td>
										<td><input type="checkbox" name="pendaftaran" id="pendaftaran" />&nbsp;Pendaftaran</td>
										<td><input type="checkbox" name="apotik" id="apotik" />&nbsp;Apotik</td>
										<td><input type="checkbox" name="adm" id="adm" />&nbsp;Administrasi</td>
									</tr>
									<tr>
										<td><input type="checkbox" name="jalan" id="jalan" />&nbsp;Rawat Jalan</td>
										<td><input type="checkbox" name="inap" id="inap" />&nbsp;Rawat Inap</td>
										<td><input type="checkbox" name="rujuk" id="rujuk" />&nbsp;Rujukan</td>
										<td><input type="checkbox" name="lab" id="lab" />&nbsp;Laboratorium</td>
									</tr>
									<tr>
										<td><input type="checkbox" name="rad" id="rad" />&nbsp;Radiologi</td>
										<td><input type="checkbox" name="hem" id="hem" />&nbsp;Hemodialisa</td>
										<td><input type="checkbox" name="jen" id="jen" />&nbsp;Forensik</td>
										<td><input type="checkbox" name="amb" id="amb" />&nbsp;Ambulan</td>
									</tr>
								</table>
							</div>
						</div>
						<div class="form-group row">
							<label for="inputEmail3" class="col-sm-3 control-label">Status</label>
							<div class="col-sm-9">
								<div class="radio">
									<label>
										<input type="radio" name="stat" id="stat" value="1" checked> Aktif
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="stat" id="stat" value="0"> Tidak Aktif
									</label>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button id="simpanunit" class="btn btn-primary">Simpan</button>
			</div>
		</div>
	</div>

	<script>
		function modalform() {
			$("#kotakform").append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
		}

		function modalformtutup() {
			$(".overlay").remove();
		}

		$(document).ready(function() {

			$("#simpanunit").click(function(e) {
				modalform();
				var kd = document.getElementById("kd").value;
				var nm = document.getElementById("nm").value;
				var kelompok = $("#kelompok").val();
				var kelompoktext = $("#kelompok option:selected").text();
				var kdsep = document.getElementById("kdsep").value;
				var sep = document.getElementById("sep").value;
				var ibs = $('#ibs').is(":checked");
				var ilahir = $('#ilahir').is(":checked");
				var igd = $('#igd').is(":checked");
				var penunjang = $('#penunjang').is(":checked");
				var instalasi = $('#instalasi').is(":checked");
				var pendaftaran = $('#pendaftaran').is(":checked");
				var apotik = $('#apotik').is(":checked");
				var adm = $('#adm').is(":checked");
				var jalan = $('#jalan').is(":checked");
				var inap = $('#inap').is(":checked");
				var rujuk = $('#rujuk').is(":checked");
				var lab = $('#lab').is(":checked");
				var rad = $('#rad').is(":checked");
				var hem = $('#hem').is(":checked");
				var jen = $('#jen').is(":checked");
				var amb = $('#amb').is(":checked");
				var stat = $("input[name='stat']:checked").val();
				$.ajax({
					url: "<?php echo site_url(); ?>/masterdata/simpandataunit",
					type: "GET",
					data: {
						kd: kd,
						nm: nm,
						kelompok: kelompok,
						kelompoktext: kelompoktext,
						kdsep: kdsep,
						sep: sep,
						ibs: ibs,
						ilahir: ilahir,
						igd: igd,
						penunjang: penunjang,
						instalasi: instalasi,
						pendaftaran: pendaftaran,
						apotik: apotik,
						adm: adm,
						jalan: jalan,
						inap: inap,
						rujuk: rujuk,
						lab: lab,
						rad: rad,
						hem: hem,
						jen: jen,
						amb: amb,
						stat: stat
					},
					success: function(ajaxData) {
						if (ajaxData == "1") {
							modalformtutup();
							tutupmodal(0);
						} else {
							modalformtutup();
							gagalalert();
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
				<b class="modal-title" id="exampleModalLabel">Edit Data Master Unit</b>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="box-body">
					<div class="col-sm-12">
						<div class="form-group row">
							<label class="col-sm-3 control-label">Kode Unit</label>
							<div class="col-sm-9">
								<input disabled type="text" class="form-control" name="rm" id="kd" value="<?php echo $dtunit->kode_unit; ?>">
							</div>
						</div>
						<div class="form-group row">
							<label for="inputEmail3" class="col-sm-3 control-label">Nama Unit</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="nmpas" id="nm" value="<?php echo $dtunit->nama_unit; ?>">
							</div>
						</div>
						<div class="form-group row">
							<label for="inputEmail3" class="col-sm-3 control-label">Kelompok</label>
							<div class="col-sm-9">
								<select class="form-control" style="width: 100%;" name="kelompok" id="kelompok">
									<option value="ADM" <?php if ($dtunit->kelompok_unit == "ADM") {
															echo "selected";
														} ?>>ADM</option>
									<option value="RUANGAN" <?php if ($dtunit->kelompok_unit == "RUANGAN") {
																echo "selected";
															} ?>>RUANGAN</option>
									<option value="POLI" <?php if ($dtunit->kelompok_unit == "POLI") {
																echo "selected";
															} ?>>POLI</option>
									<option value="PENUNJANG"> <?php if ($dtunit->kelompok_unit == "PENUNJANG") {
																	echo "selected";
																} ?>>PENUNJANG</option>
									<option value="APOTIK" <?php if ($dtunit->kelompok_unit == "APOTIK") {
																echo "selected";
															} ?>>APOTIK</option>
									<option value="KEUANGAN" <?php if ($dtunit->kelompok_unit == "KEUANGAN") {
																	echo "selected";
																} ?>>KEUANGAN</option>

								</select>
							</div>
						</div>
						<div class="form-group row">
							<label for="inputEmail3" class="col-sm-3 control-label">Kode Poli SEP</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="nmpas" id="kdsep" value="<?php echo $dtunit->kode_unit; ?>">
							</div>
						</div>
						<div class="form-group row">
							<label for="inputEmail3" class="col-sm-3 control-label">Nama Poli SEP</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="nmpas" id="sep" value="<?php echo $dtunit->nama_unit; ?>">
							</div>
						</div>
						<div class="form-group row">
							<label for="inputEmail3" class="col-sm-3 control-label">Bagian</label>
							<div class="col-sm-9">
								<table class="table table-borderless">
									<tr>
										<td><input type="checkbox" name="ibs" id="ibs" <?php if ($dtunit->IBS == "1") {
																							echo "checked";
																						} ?> />&nbsp;Kamar Operasi</td>
										<td><input type="checkbox" name="ilahir" id="ilahir" <?php if ($dtunit->ILAHIR == "1") {
																									echo "checked";
																								} ?> />&nbsp;Kamar Bersalin</td>
										<td><input type="checkbox" name="igd" id="igd" <?php if ($dtunit->IGD == "1") {
																							echo "checked";
																						} ?> />&nbsp;IGD</td>
										<td><input type="checkbox" name="penunjang" id="penunjang" <?php if ($dtunit->penunjang == "1") {
																										echo "checked";
																									} ?> />&nbsp;Penunjang</td>
									</tr>
									<tr>
										<td><input type="checkbox" name="instalasi" id="instalasi" <?php if ($dtunit->instalasi == "1") {
																										echo "checked";
																									} ?> />&nbsp;Instalasi</td>
										<td><input type="checkbox" name="pendaftaran" id="pendaftaran" <?php if ($dtunit->pendaftaran == "1") {
																											echo "checked";
																										} ?> />&nbsp;Pendaftaran</td>
										<td><input type="checkbox" name="apotik" id="apotik" <?php if ($dtunit->apotik == "1") {
																									echo "checked";
																								} ?> />&nbsp;Apotik</td>
										<td><input type="checkbox" name="adm" id="adm" <?php if ($dtunit->adm == "1") {
																							echo "checked";
																						} ?> />&nbsp;Administrasi</td>
									</tr>
									<tr>
										<td><input type="checkbox" name="jalan" id="jalan" <?php if ($dtunit->jalan == "1") {
																								echo "checked";
																							} ?> />&nbsp;Rawat Jalan</td>
										<td><input type="checkbox" name="inap" id="inap" <?php if ($dtunit->inap == "1") {
																								echo "checked";
																							} ?> />&nbsp;Rawat Inap</td>
										<td><input type="checkbox" name="rujuk" id="rujuk" <?php if ($dtunit->rujukan == "1") {
																								echo "checked";
																							} ?> />&nbsp;Rujukan</td>
										<td><input type="checkbox" name="lab" id="lab" <?php if ($dtunit->lab == "1") {
																							echo "checked";
																						} ?> />&nbsp;Laboratorium</td>
									</tr>
									<tr>
										<td><input type="checkbox" name="rad" id="rad" <?php if ($dtunit->rad == "1") {
																							echo "checked";
																						} ?> />&nbsp;Radiologi</td>
										<td><input type="checkbox" name="hem" id="hem" <?php if ($dtunit->hem == "1") {
																							echo "checked";
																						} ?> />&nbsp;Hemodialisa</td>
										<td><input type="checkbox" name="jen" id="jen" <?php if ($dtunit->jen == "1") {
																							echo "checked";
																						} ?> />&nbsp;Forensik</td>
										<td><input type="checkbox" name="amb" id="amb" <?php if ($dtunit->amb == "1") {
																							echo "checked";
																						} ?> />&nbsp;Ambulan</td>
									</tr>
								</table>
							</div>
						</div>
						<div class="form-group row">
							<label for="inputEmail3" class="col-sm-3 control-label">Status</label>
							<div class="col-sm-9">
								<div class="radio">
									<label>
										<input type="radio" name="stat" id="stat" value="0" <?php if ($dtunit->hapus == "0") {
																								echo "checked";
																							} ?>> Aktif
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="stat" id="stat" value="1" <?php if ($dtunit->hapus == "1") {
																								echo "checked";
																							} ?>> Tidak Aktif
									</label>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button onclick="ubahdata(<?php echo $id; ?>)" class="btn btn-primary">Simpan</button>
			</div>
		</div>
	</div>
	<script>
		function modalform() {
			$("#kotakform").append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
		}

		function modalformtutup() {
			$(".overlay").remove();
		}

		function ubahdata(id) {
			modalform();
			var kd = document.getElementById("kd").value;
			var nm = document.getElementById("nm").value;
			var kelompok = $("#kelompok").val();
			var kelompoktext = $("#kelompok option:selected").text();
			var kdsep = document.getElementById("kdsep").value;
			var sep = document.getElementById("sep").value;
			var ibs = $('#ibs').is(":checked");
			var ilahir = $('#ilahir').is(":checked");
			var igd = $('#igd').is(":checked");
			var penunjang = $('#penunjang').is(":checked");
			var instalasi = $('#instalasi').is(":checked");
			var pendaftaran = $('#pendaftaran').is(":checked");
			var apotik = $('#apotik').is(":checked");
			var adm = $('#adm').is(":checked");
			var jalan = $('#jalan').is(":checked");
			var inap = $('#inap').is(":checked");
			var rujuk = $('#rujuk').is(":checked");
			var lab = $('#lab').is(":checked");
			var rad = $('#rad').is(":checked");
			var hem = $('#hem').is(":checked");
			var jen = $('#jen').is(":checked");
			var amb = $('#amb').is(":checked");
			var stat = $("input[name='stat']:checked").val();
			$.ajax({
				url: "<?php echo site_url(); ?>/masterdata/editdataunit",
				type: "GET",
				data: {
					id: id,
					kd: kd,
					nm: nm,
					kelompok: kelompok,
					kelompoktext: kelompoktext,
					kdsep: kdsep,
					sep: sep,
					ibs: ibs,
					ilahir: ilahir,
					igd: igd,
					penunjang: penunjang,
					instalasi: instalasi,
					pendaftaran: pendaftaran,
					apotik: apotik,
					adm: adm,
					jalan: jalan,
					inap: inap,
					rujuk: rujuk,
					lab: lab,
					rad: rad,
					hem: hem,
					jen: jen,
					amb: amb,
					stat: stat
				},
				success: function(ajaxData) {
					if (ajaxData == "1") {
						modalformtutup();
						tutupmodal(1);
					} else {
						modalformtutup();
						gagalalert();
					}
				}
			});
		}
	</script>
<?php
}
?>