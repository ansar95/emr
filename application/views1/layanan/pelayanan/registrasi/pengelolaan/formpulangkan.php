<div class="modal-dialog " role="document">
	<div class="modal-content">
		<!-- <div class="box box-default box-solid" id="proseskotak"> -->
		<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Pulangkan Pasien</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			<div class="row">
				<div class="col-md-12">
					<div class="row form-group">
						<label class="col-sm-4 col-form-label">Tanggal</label>
						<div class="col-sm-8">
							<input type="text" name="notrans" id="notrans" hidden value="<?php echo $id; ?>">
							<input type="text" class="form-control" name="pktgl" id="pktgl">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="row form-group">
						<label class="col-sm-4 col-form-label">Jam</label>
						<div class="col-sm-8">
							<input type="text" class="form-control bootstrap-timepicker" name="pkjam" id="pkjam">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12 text-right">
					<button onclick="simpanpulang();" class="btn btn-primary">Pulangkan</button>
				</div>
			</div>
		</div>
		<!-- </div> -->
	</div>
</div>
<script>
	function modalload() {
		$("#kotakform").append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
	}

	function modalloadtutup() {
		$(".overlay").remove();
	}

	function suksesalert() {
		$.notify("Sukses Input Data", "success");
	}

	function gagalalert(info = "Gagal Input Data") {
		$.notify(info, "error");
	}

	function carikamar() {
		var pkunit = $("#pkunit").val();
		$.ajax({
			url: "<?php echo site_url(); ?>/registrasipasien/ambilpindahkamar",
			type: "GET",
			data: {
				pkunit: pkunit
			},
		}).then(function(data) {
			$("#kamar option").remove();
			var t = JSON.parse(data);
			var op = new Option("--Pilih--", "-", true, true);
			$('#kamar').append(op).trigger('change');
			t.forEach(function(entry) {
				var option = new Option(entry.nama_kamar, entry.kode_kamar, false, false);
				$('#kamar').append(option).trigger('change');
			});
		});
	}

	$(function() {
		$("#pkunit").select2();
		// $("#kamar").select2();
		$('#pktgl').datepicker({
			autoclose: true
		}).datepicker("setDate", "0");
		$('#pkjam').timepicker({
			showInputs: false,
			minuteStep: 1,
			showMeridian: false
		});
	});

	//pulangkan pasien
	function simpanpulang() {
		modalload();
		var notrans = document.getElementById("notrans").value;
		var pktgl = document.getElementById("pktgl").value;
		var pkjam = document.getElementById("pkjam").value;
		if ((pktgl == "") || (pkjam == "")) {
			modalloadtutup();
			kuranglengkap();
			return;
		}
		$.ajax({
			// url: "<?php echo site_url(); ?>/registrasipasien/layananpindahkamar",
			url: "<?php echo site_url(); ?>/registrasipasien/layananpulangkanpasien",
			type: "GET",
			data: {
				notrans: notrans,
				pktgl: pktgl,
				pkjam: pkjam
			},
			success: function(ajaxData) {
				var t = $.parseJSON(ajaxData);
				if (ajaxData == "true") {
					suksesalert();
					load_data(1);
					modalloadtutup();
					tutupmodal();
				} else {
					gagalalert();
					modalloadtutup();
				}
			},
			error: function(ajaxData) {
				gagalalert();
				modalloadtutup();
			}
		});
	}
</script>