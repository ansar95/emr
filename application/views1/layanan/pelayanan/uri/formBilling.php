<div class="modal-dialog">
	<div class="modal-content" >
		<div class="form-horizontal">
			<div class="box box-default box-solid" id="proseskotak">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title">Proses Billing</h4>
				</div>
				<div class="modal-body">
					<div class="box-body">
						<div class="col-sm-12">
							<input type="text" id="id" value="<?php echo $dtidp?>" hidden disabled/>
							<input type="text" id="notrans" value="<?php echo $dtnotrans?>" hidden disabled/>
							<div class="form-group">
								<div class="col-sm-12 text-center">
									<input type="text" class="form-control" style="text-align: center;" value="<?php echo $databilling->billing;?>" disabled/>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<a id="prosesbilling" class="btn btn-primary pull-left">Billing</a>
					<!-- <a id="simpanbilling" class="btn btn-success pull-left">Simpan</a> -->
					<a id="cetak Umum" class="btn btn-danger pull-right">Cetak Billing Umum</a>
					<a id="cetak Terjamin" class="btn btn-warning pull-right">Cetak Billing Terjamin</a>
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
		$("#prosesbilling").click(function(e) {
			modalload();
			var id = document.getElementById("id").value;
			var notrans = document.getElementById("notrans").value;
			var unit = document.getElementById("unitselect").value;
			var nrp = document.getElementById("nrp").value;
			$.ajax({
				url: "<?php echo site_url();?>/uri/prosesbillinglisturi",
				type: "GET",
				data : {
					id: id,
                    notrans: notrans,
					unit: unit, 
					nrp: nrp
				},
				success: function (ajaxData){
					var t = $.parseJSON(ajaxData);
                    tutupmodal();
					alert(ajaxData);
					// if (t.dtubah == true) {
					// 	tdsuksesalert();
					// 	$("#barispasien tbody tr").remove();
					// 	$("#barispasien tbody").append(t.dtview);
					// 	modalloadtutup();
					// 	tutupmodal();
					// } else {
					// 	tdgagalalert();
					// 	modalloadtutup();
					// }
				}
			});
		});

	});


</script>
