<?php
if ($formpilih == 0) {
?>
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<!-- <div class="box box-default box-solid" id="proseskotak"> -->
			<div class="modal-header p-1 pl-3 align-text-bottom">
				<b class="modal-title" id="exampleModalLabel">Tambah Data Master Ruang Perawatan</b>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="box-body">
					<div class="col-sm-12">
						<div class="form-group row">
							<label class="col-sm-4 control-label">Kode Kelas</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="rm" id="kd">
							</div>
						</div>
						<div class="form-group row">
							<label for="inputEmail3" class="col-sm-4 control-label">Nama Kelas</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="nmpas" id="nm">
							</div>
						</div>
						<div class="form-group row">
							<label for="inputEmail3" class="col-sm-4 control-label">Unit</label>
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
							<label class="col-sm-4 control-label">Visite</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="vis" id="vis" value="0">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-4 control-label">Konsul Dokter Spesialis</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="kds" id="kds" value="0">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-4 control-label">Konsul Dokter Umum/Gigi</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="kdu" id="kdu" value="0">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-4 control-label">Konsul Dokter IGD</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="kdi" id="kdi" value="0">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-4 control-label">Konsul CYTO - Dokter IGD</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="kdc" id="kdc" value="0">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-4 control-label">Konsul Dokter Sub Spesialis</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="kdss" id="kdss" value="0">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-4 control-label">Makanan</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="mk" id="mk" value="0">
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
		$(function() {
			$('#unit').select2();
		});

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
				var unit = $("#unit").val();
				var unittext = $("#unit option:selected").text();
				var vis = document.getElementById("vis").value;
				var kds = document.getElementById("kds").value;
				var kdu = document.getElementById("kdu").value;
				var kdi = document.getElementById("kdi").value;
				var kdc = document.getElementById("kdc").value;
				var kdss = document.getElementById("kdss").value;
				var mk = document.getElementById("mk").value;
				$.ajax({
					url: "<?php echo site_url(); ?>/masterdata/simpandataruang",
					type: "GET",
					data: {
						kd: kd,
						nm: nm,
						unit: unit,
						unittext: unittext,
						vis: vis,
						kds: kds,
						kdu: kdu,
						kdi: kdi,
						kdc: kdc,
						kdss: kdss,
						mk: mk
					},
					success: function(ajaxData) {
						// console.log(ajaxData);
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
				<b class="modal-title" id="exampleModalLabel">Edit Data Master Ruang Perawatan</b>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="box-body">
					<div class="col-sm-12">
						<div class="form-group row">
							<label class="col-sm-4 control-label">Kode Kelas</label>
							<div class="col-sm-8">
								<input disabled type="text" class="form-control" name="rm" id="kd" value="<?php echo $dtruang->kode_kelas; ?>">
							</div>
						</div>
						<div class="form-group row">
							<label for="inputEmail3" class="col-sm-4 control-label">Nama Kelas</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="nmpas" id="nm" value="<?php echo $dtruang->nama_kelas; ?>">
							</div>
						</div>
						<div class="form-group row">
							<label for="inputEmail3" class="col-sm-4 control-label">Unit</label>
							<div class="col-sm-8">
								<select class="form-control" style="width: 100%;" name="unit" id="unit">
									<?php
									foreach ($dtunit as $row) {
									?>
										<option value="<?php echo $row->kode_unit; ?>" <?php if ($dtruang->kode_unit == $row->kode_unit) {
																							echo "selected";
																						} ?>><?php echo $row->nama_unit; ?></option>
									<?php
									}
									?>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-4 control-label">Visite</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="vis" id="vis" value="<?php echo $dtruang->vis; ?>">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-4 control-label">Konsul Dokter Spesialis</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="kds" id="kds" value="<?php echo $dtruang->kds; ?>">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-4 control-label">Konsul Dokter Umum/Gigi</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="kdu" id="kdu" value="<?php echo $dtruang->kdu; ?>">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-4 control-label">Konsul Dokter UGD</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="kdi" id="kdi" value="<?php echo $dtruang->kdi; ?>">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-4 control-label">Konsul CYTO - Dokter IGD</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="kdc" id="kdc" value="<?php echo $dtruang->kdc; ?>">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-4 control-label">Konsul Dokter Sub Spesialis</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="kdss" id="kdss" value="<?php echo $dtruang->kdss; ?>">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-4 control-label">Makanan</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="mk" id="mk" value="<?php echo $dtruang->makanan; ?>">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button onclick="editdata(<?php echo $id ?>)" class="btn btn-primary">Ubah</button>
			</div>
		</div>

	</div>
	</div>
	<script>
		$(function() {
			$('#unit').select2();
		});

		function modalform() {
			$("#kotakform").append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
		}

		function modalformtutup() {
			$(".overlay").remove();
		}

		function editdata(id) {
			modalform();
			var kd = document.getElementById("kd").value;
			var nm = document.getElementById("nm").value;
			var unit = $("#unit").val();
			var unittext = $("#unit option:selected").text();
			var vis = document.getElementById("vis").value;
			var kds = document.getElementById("kds").value;
			var kdu = document.getElementById("kdu").value;
			var kdi = document.getElementById("kdi").value;
			var kdc = document.getElementById("kdc").value;
			var kdss = document.getElementById("kdss").value;
			var mk = document.getElementById("mk").value;
			$.ajax({
				url: "<?php echo site_url(); ?>/masterdata/editdataruang",
				type: "GET",
				data: {
					id: id,
					kd: kd,
					nm: nm,
					unit: unit,
					unittext: unittext,
					vis: vis,
					kds: kds,
					kdu: kdu,
					kdi: kdi,
					kdc: kdc,
					kdss: kdss,
					mk: mk
				},
				success: function(ajaxData) {
					// console.log(ajaxData);
					if (ajaxData == "1") {
						modalformtutup();
						tutupmodal(1);
					} else {
						modalformtutup();
						gagalalert();
					}
				},
				error: function(ajaxData) {
					tutupmodal();
					gagalalert();
				}
			});
		}
	</script>
<?php
}
?>