<div class="modal-dialog" role="document">
	<div class="modal-content">
		<!-- <div class="box box-default box-solid" id="proseskotak"> -->
		<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Resep Unit</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			<div class="form-group row">
				<label for="username" class="col-sm-3 col-form-label">No. RM</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" id="nrp" name="nrp" autocomplete="off" />
				</div>
			</div>
			<!-- <div class="form-group row">
				<label for="username" class="col-sm-3 col-form-label">Unit</label>
				<div class="col-sm-9">
					<select class="form-control" style="width: 100%;" name="unitselect" id="unitselect">
						<?php
						foreach ($dtunit as $row) {
						?>
							<option value="<?php echo $row->kode_unit; ?>"><?php echo $row->nama_unit; ?></option>
						<?php
						}
						?>
					</select>
				</div>
			</div> -->
		</div>
		<div class="modal-footer">
			<button id="simpanresepunit" class="btn btn-primary">Tambahkan</button>
		</div>
		<!-- </div> -->
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
		$(function() {
			$('#formmodal').modal('toggle');
		});
	}

	function tdsuksesalert() {
		$.notify("Resep telah di tambahkah", "success");
	}

	function tdgagalalert() {
		$.notify("Resep Sudah ada di Depo Lain", "error");
	}

	$(function() {
		$('#dokterf').select2();
	});

	$(function() {
		$('#unitselect').select2();
	});

	$(document).ready(function() {
		$("#simpanresepunit").click(function(e) {
			modalload();
			var shift = document.getElementById("shift").value;
			var depo = document.getElementById("depo").value;
			// var unit = document.getElementById("unitselect").value;
			var nrp = document.getElementById("nrp").value;
			var tgl = document.getElementById("tgl").value;
			
			$.ajax({
				url: "<?php echo site_url(); ?>/depoapotik/simpanaddresepunit",
				type: "GET",
				data: {
					// unit: unit,
					nrp: nrp,
					depo: depo,
					shift: shift,
					tgl : tgl
				},
				success: function(ajaxData) {
					var t = $.parseJSON(ajaxData);

					if (t.dtubah == true) {
						tdsuksesalert();
						$("#tableresep tbody tr").remove();
						$("#tableresep tbody").append(t.dtview);
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