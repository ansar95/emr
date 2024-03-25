<?php
if ($formpilih == 0) {
?>
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<!-- <div class="box box-default box-solid" id="proseskotak"> -->
			<div class="modal-header p-1 pl-3 align-text-bottom">
				<b class="modal-title" id="exampleModalLabel">Tambah Data Master Tindakan</b>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="box-body">
					<div class="col-sm-12">
						<div class="form-group row">
							<label class="col-sm-4 control-label">Kode Tindakan</label>
							<div class="col-sm-3">
								<input type="text" class="form-control" name="rm" id="kd">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-4 control-label">Nama Tindakan</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="nmpas" id="nm">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-4 control-label">Unit</label>
							<div class="col-sm-8">
								<select class="form-control" style="width: 100%;" name="unit" id="unit">
									<?php
									foreach ($dtunit as $row) {
									?>
										<option value="<?php echo $row->kode_unit; ?>"><?php echo $row->nama_unit; ?></option>
									<?php
									}
									?>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-4 control-label">Jenis Tindakan</label>
							<div class="col-sm-8">
								<select class="form-control" style="width: 100%;" name="jenis" id="jenis">
									<?php
									foreach ($dtjenis as $row) {
									?>
										<option value="<?php echo $row->id; ?>"><?php echo $row->jenis; ?></option>
									<?php
									}
									?>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-4 control-label">jasas</label>
							<div class="col-sm-3">
								<input type="text" class="form-control" name="jasas" id="jasas" value="0">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-4 control-label">jasap</label>
							<div class="col-sm-3">
								<input type="text" class="form-control" name="jasap" id="jasap" value="0">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-4 control-label">jasam</label>
							<div class="col-sm-3">
								<input type="text" class="form-control" name="jasam" id="jasam" value="0">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-4 control-label">jasams</label>
							<div class="col-sm-3">
								<input type="text" class="form-control" name="jasams" id="jasams" value="0">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-4 control-label">Bagian</label>
							<div class="col-sm-8">
								<table class="table table-borderless">
									<tr>
										<td><input type="checkbox" name="jalan" id="jalan" />&nbsp;Rawat Jalan</td>
										<td><input type="checkbox" name="inap" id="inap" />&nbsp;Rawat Inap</td>
										<td><input type="checkbox" name="instalasi" id="instalasi" />&nbsp;Instalasi</td>
										<td><input type="checkbox" name="lahir" id="lahir" />&nbsp;Lahir</td>
									</tr>
									<tr>
										<td><input type="checkbox" name="operasi" id="operasi" />&nbsp;Operasi</td>
										<td><input type="checkbox" name="darah" id="darah" />&nbsp;Darah</td>
										<td><input type="checkbox" name="hd" id="hd" />&nbsp;HD</td>
										<td></td>
									</tr>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button id="simpankamar" class="btn btn-primary">Simpan</button>
			</div>
		</div>
	</div>

	<script>
		$(function() {
			$('#unit').select2();
			$('#jenis').select2();
		});

		function modalform() {
			$("#kotakform").append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
		}

		function modalformtutup() {
			$(".overlay").remove();
		}

		$(document).ready(function() {

			$("#simpankamar").click(function(e) {
				modalform();
				var kd = document.getElementById("kd").value;
				var nm = document.getElementById("nm").value;
				var unit = $("#unit").val();
				var unittext = $("#unit option:selected").text();
				var jenis = $("#jenis").val();
				var jenistext = $("#jenis option:selected").text();
				var jasas = document.getElementById("jasas").value;
				var jasap = document.getElementById("jasap").value;
				var jasam = document.getElementById("jasam").value;
				var jasams = document.getElementById("jasams").value;
				var jalan = $('#jalan').is(":checked");
				var inap = $('#inap').is(":checked");
				var instalasi = $('#instalasi').is(":checked");
				var lahir = $('#lahir').is(":checked");
				var operasi = $('#operasi').is(":checked");
				var darah = $('#darah').is(":checked");
				var hd = $('#hd').is(":checked");
				$.ajax({
					url: "<?php echo site_url(); ?>/masterdata/simpandatatindakan",
					type: "GET",
					data: {
						kd: kd,
						nm: nm,
						unit: unit,
						unittext: unittext,
						jenis: jenis,
						jenistext: jenistext,
						jasas: jasas,
						jasap: jasap,
						jasam: jasam,
						jasams: jasams,
						jalan: jalan,
						inap: inap,
						instalasi: instalasi,
						lahir: lahir,
						operasi: operasi,
						darah: darah,
						hd: hd
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
				<b class="modal-title" id="exampleModalLabel">Edit Data Master Tindakan</b>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="box-body">
					<div class="col-sm-12">
						<div class="form-group row">
							<label class="col-sm-4 control-label">Kode Tindakan</label>
							<div class="col-sm-3">
								<input disabled type="text" class="form-control" name="rm" id="kd" value="<?php echo $dttind->kode_tindakan; ?>">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-4 control-label">Nama Tindakan</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="nmpas" id="nm" value="<?php echo $dttind->tindakan; ?>">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-4 control-label">Unit</label>
							<div class="col-sm-8">
								<select class="form-control" style="width: 100%;" name="unit" id="unit">
									<?php
									foreach ($dtunit as $row) {
									?>
										<option value="<?php echo $row->kode_unit; ?>" <?php if ($dttind->kode_unit == $row->kode_unit) {
																							echo "selected";
																						} ?>><?php echo $row->nama_unit; ?></option>
									<?php
									}
									?>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-4 control-label">Jenis Tindakan</label>
							<div class="col-sm-8">
								<select class="form-control" style="width: 100%;" name="jenis" id="jenis">
									<?php
									foreach ($dtjenis as $row) {
									?>
										<option value="<?php echo $row->id; ?>" <?php if ($dttind->type == $row->jenis) {
																					echo "selected";
																				} ?>><?php echo $row->jenis; ?></option>
									<?php
									}
									?>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-4 control-label">jasas</label>
							<div class="col-sm-3">
								<input type="text" class="form-control" name="jasas" id="jasas" value="<?php echo $dttind->jasas; ?>">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-4 control-label">jasap</label>
							<div class="col-sm-3">
								<input type="text" class="form-control" name="jasap" id="jasap" value="<?php echo $dttind->jasap; ?>">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-4 control-label">jasam</label>
							<div class="col-sm-3">
								<input type="text" class="form-control" name="jasam" id="jasam" value="<?php echo $dttind->jasam; ?>">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-4 control-label">jasams</label>
							<div class="col-sm-3">
								<input type="text" class="form-control" name="jasams" id="jasams" value="<?php echo $dttind->jasams; ?>">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-4 control-label">Bagian</label>
							<div class="col-sm-8">
								<table class="table table-borderless">
									<tr>
										<td><input type="checkbox" name="jalan" id="jalan" <?php if ($dttind->jalan == "1") {
																								echo "checked";
																							} ?> />&nbsp;Rawat Jalan</td>
										<td><input type="checkbox" name="inap" id="inap" <?php if ($dttind->inap == "1") {
																								echo "checked";
																							} ?> />&nbsp;Rawat Inap</td>
										<td><input type="checkbox" name="instalasi" id="instalasi" <?php if ($dttind->instalasi == "1") {
																										echo "checked";
																									} ?> />&nbsp;Instalasi</td>
										<td><input type="checkbox" name="lahir" id="lahir" <?php if ($dttind->lahir == "1") {
																								echo "checked";
																							} ?> />&nbsp;Lahir</td>
									</tr>
									<tr>
										<td><input type="checkbox" name="operasi" id="operasi" <?php if ($dttind->operasi == "1") {
																									echo "checked";
																								} ?> />&nbsp;Operasi</td>
										<td><input type="checkbox" name="darah" id="darah" <?php if ($dttind->darah == "1") {
																								echo "checked";
																							} ?> />&nbsp;Darah</td>
										<td><input type="checkbox" name="hd" id="hd" <?php if ($dttind->hd == "1") {
																							echo "checked";
																						} ?> />&nbsp;HD</td>
										<td></td>
									</tr>
								</table>
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
		$(function() {
			$('#unit').select2();
			$('#jenis').select2();
		});

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
			var unit = $("#unit").val();
			var unittext = $("#unit option:selected").text();
			var jenis = $("#jenis").val();
			var jenistext = $("#jenis option:selected").text();
			var jasas = document.getElementById("jasas").value;
			var jasap = document.getElementById("jasap").value;
			var jasam = document.getElementById("jasam").value;
			var jasams = document.getElementById("jasams").value;
			var jalan = $('#jalan').is(":checked");
			var inap = $('#inap').is(":checked");
			var instalasi = $('#instalasi').is(":checked");
			var lahir = $('#lahir').is(":checked");
			var operasi = $('#operasi').is(":checked");
			var darah = $('#darah').is(":checked");
			var hd = $('#hd').is(":checked");
			$.ajax({
				url: "<?php echo site_url(); ?>/masterdata/editdatatindakan",
				type: "GET",
				data: {
					id: id,
					kd: kd,
					nm: nm,
					unit: unit,
					unittext: unittext,
					jenis: jenis,
					jenistext: jenistext,
					jasas: jasas,
					jasap: jasap,
					jasam: jasam,
					jasams: jasams,
					jalan: jalan,
					inap: inap,
					instalasi: instalasi,
					lahir: lahir,
					operasi: operasi,
					darah: darah,
					hd: hd
				},
				success: function(ajaxData) {
					if (ajaxData == "1") {
						modalformtutup();
						tutupmodal(1);
					} else {
						modalformtutup();
						gagalalert();
					}
				},
				alert: function(ajaxData) {
					gagalalert();
					tutupmodal();
				}
			});
		}
	</script>
<?php
}
?>