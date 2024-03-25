<div class="modal-dialog" >
	<div class="modal-content" >
		<div class="form-horizontal">
			<div class="box box-default box-solid" id="kotakform">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title">Tambah Data User</h4>
				</div>
				<div class="modal-body">
					<div class="box-body">
						<div class="col-sm-12">
							<div class="form-group">
								<label class="col-sm-4 control-label">Nama</label>
								<div class="col-sm-3">
									<input type="text" class="form-control" name="rm" id="kd" >
								</div>
							</div>
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-4 control-label">Username</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" name="nmpas" id="nm" >
								</div>
							</div>
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-4 control-label">Ruangan</label>
								<div class="col-sm-8">
									<select class="form-control" style="width: 100%;" name="kelas" id="kelas">
										<?php
										foreach($dtkelas as $row) {
										?>
										<option value="<?php echo $row->kode_kelas; ?>"><?php echo $row->nama_kelas; ?></option>
										<?php
										}
										?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label">Jumlah Tempat Tidur</label>
								<div class="col-sm-3">
									<input type="text" class="form-control" name="jtt" id="jtt" value="0">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label">Jumlah Tempat Tidur Terpakai</label>
								<div class="col-sm-3">
									<input type="text" class="form-control" name="jttt" id="jttt" value="0">
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<a id="simpankamar" class="btn btn-primary">Simpan</a>
				</div>
			</div>
		</div>
	</div>
</div>
<script>

	$(function () {
		$('#unit').select2();
	});

	function modalform() {
		$("#kotakform").append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
	}

	function modalformtutup() {
		$(".overlay").remove();
	}

	$(document).ready(function () {

		$("#simpankamar").click(function(e) {
			modalform();
			var kd = document.getElementById("kd").value;
			var nm = document.getElementById("nm").value;
			var kelas = $("#kelas").val();
			var kelastext = $("#kelas option:selected").text();
			var jtt = document.getElementById("jtt").value;
			var jttt = document.getElementById("jttt").value;
			$.ajax({
				url: "<?php echo site_url();?>/masterdata/simpandatakamar",
				type: "GET",
				data: {
					kd: kd,
					nm: nm,
					kelas: kelas,
					kelastext: kelastext,
					jtt: jtt,
					jttt: jttt
				},
				success: function (ajaxData){
					// console.log(ajaxData);
					if (ajaxData == "1") {
						modalformtutup();
						tutupmodal();
					} else {
						modalformtutup();
						gagalalert();
					}
				}
			});
		});

	});
	
</script>

