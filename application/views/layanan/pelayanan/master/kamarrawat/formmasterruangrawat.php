<?php
if ($formpilih == 0) {
?>
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<!-- <div class="box box-default box-solid" id="proseskotak"> -->
			<div class="modal-header p-1 pl-3 align-text-bottom">
				<b class="modal-title" id="exampleModalLabel">Tambah Data Master Kamar</b>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="box-body">
					<div class="col-sm-12">
						<div class="form-group row">
							<label class="col-sm-4 control-label">Kode Kamar</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="rm" id="kd">
							</div>
						</div>
						<div class="form-group row">
							<label for="inputEmail3" class="col-sm-4 control-label">Nama Kamar</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="nmpas" id="nm">
							</div>
						</div>
						<div class="form-group row">
							<label for="inputEmail3" class="col-sm-4 control-label">Ruangan/Kelas</label>
							<div class="col-sm-8">
								<select class="form-control" style="width: 100%;" name="kelas" id="kelas">
									<?php
									foreach ($dtkelas as $row) {
									?>
										<option value="<?php echo $row->kode_kelas; ?>"><?php echo $row->nama_kelas; ?></option>
									<?php
									}
									?>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-4 control-label">Jumlah Tempat Tidur</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="jtt" id="jtt" value="0">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-4 control-label">Harga</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="hrg" id="hrg" value="0">
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
				var kelas = $("#kelas").val();
				var kelastext = $("#kelas option:selected").text();
				var jtt = document.getElementById("jtt").value;
				var hrg = document.getElementById("hrg").value;
				$.ajax({
					url: "<?php echo site_url(); ?>/masterdata/simpandatakamar",
					type: "GET",
					data: {
						kd: kd,
						nm: nm,
						kelas: kelas,
						kelastext: kelastext,
						jtt: jtt,
						hrg: hrg
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
				<b class="modal-title" id="exampleModalLabel">Edit Data Master Kamar</b>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="box-body">
					<div class="col-sm-12">
						<div class="form-group row">
							<label class="col-sm-4 control-label">Kode Kamar</label>
							<div class="col-sm-8">
								<input disabled type="text" class="form-control" name="rm" id="kd" value="<?php echo $dtkamar->kode_kamar; ?>">
							</div>
						</div>
						<div class="form-group row">
							<label for="inputEmail3" class="col-sm-4 control-label">Nama Kamar</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="nmpas" id="nm" value="<?php echo $dtkamar->nama_kamar; ?>">
							</div>
						</div>
						<div class="form-group row">
							<label for="inputEmail3" class="col-sm-4 control-label">Ruangan</label>
							<div class="col-sm-8">
								<select class="form-control" style="width: 100%;" name="kelas" id="kelas">
									<?php
									foreach ($dtkelas as $row) {
									?>
										<option value="<?php echo $row->kode_kelas; ?>" <?php if ($dtkamar->kode_kelas == $row->kode_kelas) {
																							echo "selected";
																						} ?>><?php echo $row->nama_kelas; ?></option>
									<?php
									}
									?>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-4 control-label">Jumlah Tempat Tidur</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="jtt" id="jtt" value="<?php echo $dtkamar->t4tidur; ?>">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-4 control-label">Harga</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="hrg" id="hrg" value="<?php echo $dtkamar->harga; ?>">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button onclick="editdata(<?php echo $id; ?>)" class="btn btn-primary">Ubah</button>
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
			var kelas = $("#kelas").val();
			var kelastext = $("#kelas option:selected").text();
			var jtt = document.getElementById("jtt").value;
			var hrg = document.getElementById("hrg").value;
			$.ajax({
				url: "<?php echo site_url(); ?>/masterdata/editdatakamar",
				type: "GET",
				data: {
					id: id,
					kd: kd,
					nm: nm,
					kelas: kelas,
					kelastext: kelastext,
					jtt: jtt,
					hrg: hrg
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