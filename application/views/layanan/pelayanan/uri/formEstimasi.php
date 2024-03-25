<div class="modal-dialog">
	<div class="modal-content" >
		<div class="form-horizontal">
			<div class="box box-default box-solid" id="proseskotak">
				<div class="modal-header">
					<h5 class="modal-title">Isi Estimasi Diagnosa dan Biaya</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					
				</div>
				<div class="modal-body">
					<div class="box-body">
						<div class="col-sm-12">
							<input type="text" id="id" value="<?php echo $dtidp?>" hidden disabled/>
							<div class="form-group col-sm-12">
								<label class="col-sm-6 control-label">Estimasi Diagnosa</label>
								<div class="col-sm-12">
									<textarea class="form-control" rows="3" id="diagnosa"><?php echo $dataEstimasi->diag_estimasi; ?></textarea>
								</div>
							</div>
							<div class="form-group col-sm-12">
								<label class="col-sm-4 control-label">Estimasi Biaya</label>
								<div class="col-sm-12">
									<input type="text" class="form-control" id="biaya" value="<?php echo $dataEstimasi->tarif_estimasi; ?>">
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button id="simpanestimasi" class="btn btn-primary">Simpan</button>
				</div>
			</div>
		</div>
	</div>
</div>
<script>

	function modalload() {
		$("#proseskotak").append('<div id="oload" class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
	}

	function modalloadtutup() {
		$("#oload").remove();
	}

	function tutupmodal() {
		$(function () {
			$('#formmodal').modal('toggle');
		});
	}

	function tdsuksesalert() {
		$.notify("Sukses Input Data", "success");
	}

	function tdgagalalert() {
		$.notify("Gagal Input Data", "error");
	}

	$(function () {
		$('#dokterf').select2();
	});

	$(document).ready(function () {
		$("#simpanestimasi").click(function(e) {
			modalload();
			var id = document.getElementById("id").value;
			var unit = document.getElementById("unitselect").value;
			var nrp = document.getElementById("nrp").value;
			var estDiag = document.getElementById("diagnosa").value;
            var estBiaya = document.getElementById("biaya").value;

			$.ajax({
				url: "<?php echo site_url();?>/uri/simpanestimasiregis",
				type: "GET",
				data : {
					id: id,
                    estDiag: estDiag,
                    estBiaya: estBiaya,
					unit: unit,
					nrp: nrp
				},
				success: function (ajaxData){
					var t = $.parseJSON(ajaxData);

					if (t.dtubah == true) {
						tdsuksesalert();
						$("#barispasien tbody tr").remove();
						$("#barispasien tbody").append(t.dtview);
						modalloadtutup();
						tutupmodal();
					} else {
						tdgagalalert();
						modalloadtutup();
					}
				}
			});
		});

	});


</script>
