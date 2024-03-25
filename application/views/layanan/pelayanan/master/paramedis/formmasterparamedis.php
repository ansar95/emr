<?php
if ($formpilih == 0) {
?>
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<!-- <div class="box box-default box-solid" id="proseskotak"> -->
			<div class="modal-header p-1 pl-3 align-text-bottom">
				<b class="modal-title" id="exampleModalLabel">Tambah Data Paramedis</b>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="box-body">
					<div class="col-sm-12">
						<div class="form-group row">
							<label class="col-sm-4 control-label">Kode Paramedis</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="kd" id="kd">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-4 control-label">Nama</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="nm" id="nm">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-4 control-label">Alamat</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="alamat" id="alamat">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-4 control-label">No. HP</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="hp" id="hp">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-4 control-label">Kategori</label>
							<div class="col-sm-8">
								<select class="form-control" style="width: 100%;" name="kategori" id="kategori">
									<?php
									foreach ($dtkategori as $row) {
									?>
										<option value="<?php echo $row->id; ?>"><?php echo $row->kategori; ?></option>
									<?php
									}
									?>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-4 control-label">Bagian</label>
							<div class="col-sm-8">
								<select class="form-control" style="width: 100%;" name="bagian" id="bagian">
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
							<label class="col-sm-4 control-label">Klasifikasi</label>
							<div class="col-sm-8">
								<select class="form-control" style="width: 100%;" name="klasifikasi" id="klasifikasi">
									<?php
									foreach ($dtklasifikasi as $row) {
									?>
										<option value="<?php echo $row->id; ?>"><?php echo $row->klasifikasi; ?></option>
									<?php
									}
									?>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-4 control-label">Status</label>
							<div class="col-sm-8">
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
				<button id="simpankamar" class="btn btn-primary">Simpan</button>
			</div>
		</div>
	</div>
	<script>
		$(function() {
			$('#klasifikasi').select2();
			$('#kategori').select2();
			$('#bagian').select2();
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
				var alamat = document.getElementById("alamat").value;
				var hp = document.getElementById("hp").value;
				var kategori = $("#kategori").val();
				var kategoritext = $("#kategori option:selected").text();
				var bagian = $("#bagian").val();
				var bagiantext = $("#bagian option:selected").text();
				var klasifikasi = $("#klasifikasi").val();
				var klasifikasitext = $("#klasifikasi option:selected").text();
				var stat = $("input[name='stat']:checked").val();
				$.ajax({
					url: "<?php echo site_url(); ?>/masterdata/simpandatamedis",
					type: "GET",
					data: {
						kd: kd,
						nm: nm,
						alamat: alamat,
						hp: hp,
						kategori: kategori,
						kategoritext: kategoritext,
						bagian: bagian,
						bagiantext: bagiantext,
						klasifikasi: klasifikasi,
						klasifikasitext: klasifikasitext,
						stat: stat
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
				<b class="modal-title" id="exampleModalLabel">Edit Data Paramedis</b>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="box-body">
					<div class="col-sm-12">
						<div class="form-group row">
							<label class="col-sm-4 control-label">Kode Paramedis</label>
							<div class="col-sm-8">
								<input disabled type="text" class="form-control" name="kd" id="kd" value="<?php echo $dtdok->kode_dokter; ?>">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-4 control-label">Nama</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="nm" id="nm" value="<?php echo $dtdok->nama_dokter; ?>">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-4 control-label">Alamat</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="alamat" id="alamat" value="<?php echo $dtdok->alamat; ?>">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-4 control-label">No. HP</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="hp" id="hp" value="<?php echo $dtdok->hp; ?>">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-4 control-label">Kategori</label>
							<div class="col-sm-8">
								<select class="form-control" style="width: 100%;" name="kategori" id="kategori">
									<?php
									foreach ($dtkategori as $row) {
									?>
										<option value="<?php echo $row->id; ?>" <?php if ($dtdok->kategori == $row->kategori) {
																					echo "selected";
																				} ?>><?php echo $row->kategori; ?></option>
									<?php
									}
									?>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-4 control-label">Bagian</label>
							<div class="col-sm-8">
								<select class="form-control" style="width: 100%;" name="bagian" id="bagian">
									<?php
									foreach ($dtunit as $row) {
									?>
										<option value="<?php echo $row->kode_unit; ?>" <?php if ($dtdok->bagian == $row->kode_unit) {
																							echo "selected";
																						} ?>><?php echo $row->nama_unit; ?></option>
									<?php
									}
									?>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-4 control-label">Klasifikasi</label>
							<div class="col-sm-8">
								<select class="form-control" style="width: 100%;" name="klasifikasi" id="klasifikasi">
									<?php
									foreach ($dtklasifikasi as $row) {
									?>
										<option value="<?php echo $row->id; ?>" <?php if ($dtdok->idkualifikasi == $row->id) {
																					echo "selected";
																				} ?>><?php echo $row->klasifikasi; ?></option>
									<?php
									}
									?>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-4 control-label">Status</label>
							<div class="col-sm-8">
								<div class="radio">
									<label>
										<input type="radio" name="stat" id="stat" value="1" <?php if ($dtdok->status == "1") {
																								echo "checked";
																							} ?>> Aktif
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="stat" id="stat" value="0" <?php if ($dtdok->status == "0") {
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
				<button onclick="editdata(<?php echo $id; ?>)"  class="btn btn-primary">Ubah</button>
			</div>
		</div>
	</div>
	<script>
		$(function() {
			$('#klasifikasi').select2();
			$('#kategori').select2();
			$('#bagian').select2();
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
			var alamat = document.getElementById("alamat").value;
			var hp = document.getElementById("hp").value;
			var kategori = $("#kategori").val();
			var kategoritext = $("#kategori option:selected").text();
			var bagian = $("#bagian").val();
			var bagiantext = $("#bagian option:selected").text();
			var klasifikasi = $("#klasifikasi").val();
			var klasifikasitext = $("#klasifikasi option:selected").text();
			var stat = $("input[name='stat']:checked").val();
			$.ajax({
				url: "<?php echo site_url(); ?>/masterdata/editdatamedis",
				type: "GET",
				data: {
					id: id,
					kd: kd,
					nm: nm,
					alamat: alamat,
					hp: hp,
					kategori: kategori,
					kategoritext: kategoritext,
					bagian: bagian,
					bagiantext: bagiantext,
					klasifikasi: klasifikasi,
					klasifikasitext: klasifikasitext,
					stat: stat
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
				}
			});
		}
	</script>
<?php
}
?>