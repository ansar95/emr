<?php
if ($formpilih == 0) {
?>
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<!-- <div class="box box-default box-solid" id="proseskotak"> -->
			<div class="modal-header p-1 pl-3 align-text-bottom">
				<b class="modal-title" id="exampleModalLabel">Tambah Data Master Dokter Luar</b>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="box-body">
					<div class="col-sm-12">
						<div class="form-group row">
							<label class="col-sm-4 control-label">Kode Dokter</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="kd" id="kd">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-4 control-label">Nama Dokter</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="nm" id="nm">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-4 control-label">Spesialis</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="spe" id="spe">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button  id="simpandokter"  class="btn btn-primary">Simpan</button>
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

			$("#simpandokter").click(function(e) {
				modalform();
				var kd = document.getElementById("kd").value;
				var nm = document.getElementById("nm").value;
				var spe = document.getElementById("spe").value;
				$.ajax({
					url: "<?php echo site_url(); ?>/masterdata/simpandokterluar",
					type: "GET",
					data: {
						kd: kd,
						nm: nm,
						spe: spe
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
				<b class="modal-title" id="exampleModalLabel">Edit Data Master Dokter Luar</b>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="box-body">
					<div class="col-sm-12">
						<div class="form-group row">
							<label class="col-sm-4 control-label">Kode Dokter</label>
							<div class="col-sm-3">
								<input disabled type="text" class="form-control" name="kd" id="kd" value="<?php echo $dtdok->kode; ?>">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-4 control-label">Nama Dokter</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="nm" id="nm" value="<?php echo $dtdok->nama; ?>">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-4 control-label">Spesialis</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="spe" id="spe" value="<?php echo $dtdok->spesialis; ?>">
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
			var spe = document.getElementById("spe").value;
			$.ajax({
				url: "<?php echo site_url(); ?>/masterdata/editdokterluar",
				type: "GET",
				data: {
					id: id,
					kd: kd,
					nm: nm,
					spe: spe
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