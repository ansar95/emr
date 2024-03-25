<script src="<?php echo base_url(); ?>assets/template_baru/dist/vendors/select2/js/select2.full.min.js"></script>
<script src="<?php echo base_url(); ?>assets/template_baru/dist/js/select2.script.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/notify.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/jquery-confirm.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/salert.js"></script>
<div class="modal fade" id="formmodal" data-backdrop="static" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false">



	<script type="text/javascript">
		$.fn.datepicker.noConflict()
		$(function() {
			$('select').select2({
				tags: true
			});
		});

		function prosesload() {
			$("#kotak").append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
		}

		function hapusload() {
			$(".overlay").remove();
		}

		$(document).ready(function() {
			$("#caridata").click(function(e) {
				prosesload();
				var unit = document.getElementById("unitselect").value;
				var nrp = document.getElementById("nrp").value;
				if ((unit == "") && (nrp == "")) {
					hapusload();
					return;
				}
				$.ajax({
					url: "<?php echo site_url(); ?>/ugd/caripasienugd",
					type: "GET",
					data: {
						unit: unit,
						nrp: nrp
					},
					success: function(ajaxData) {
						$("#barispasien tbody tr").remove();
						$("#barispasien tbody").append(ajaxData);
						hapusload();
					}
				});

			});
		});

		$(document).ready(function() {
			$("#caridata1").click(function(e) {
				prosesload();
				var unit = document.getElementById("unitselect").value;
				var nrp = document.getElementById("nrp").value;
				if ((unit == "") && (nrp == "")) {
					hapusload();
					return;
				}
				$.ajax({
					url: "<?php echo site_url(); ?>/ugd/caripasienugd",
					type: "GET",
					data: {
						unit: unit,
						nrp: nrp
					},
					success: function(ajaxData) {
						$("#barispasien tbody tr").remove();
						$("#barispasien tbody").append(ajaxData);
						hapusload();
					}
				});

			});
		});

		function panggildokter(id) {
			prosesload();
			var unit = $("#unitselect").val();
			$.ajax({
				url: "<?php echo site_url(); ?>/ugd/panggilurjdokterform",
				type: "GET",
				data: {
					id: id,
					unit: unit
				},
				success: function(ajaxData) {
					hapusload();
					$("#formmodal").html(ajaxData);
					$("#formmodal").modal('show', {
						backdrop: 'true'
					});
				}
			});
		}

		function panggilproses(id) {
			prosesload();
			var unit = $("#unitselect").val();
			$.ajax({
				url: "<?php echo site_url(); ?>/ugd/panggilugdform",
				type: "GET",
				data: {
					notrans: id,
					unit: unit
				},
				success: function(ajaxData) {
					hapusload();
					$("#formmodal").html(ajaxData);
					$("#formmodal").modal('show', {
						backdrop: 'true'
					});
				}
			});
		}

		//proses berkas
		function berkassampai(id) {
			var dt = id.split("_");
			var idreg = dt[0];
			var namanya = dt[1];
			// var unit = document.getElementById("unit").value;
			var unit = document.getElementById("unitselect").value;
			$.ajax({
				url: "<?php echo site_url(); ?>/ugd/berkassampaipoli",
				type: "GET",
				data: {
					idreg: idreg,
					nama_pasien: namanya,
					unit: unit
				},
				success: function(ajaxData) {
					swal("Berkas " + namanya, "sudah diterima poli...");
					$("#barispasien tbody tr").remove();
					$("#barispasien tbody").append(ajaxData);
				}
			});
		}

		function berkaskembali(id) {
			var dt = id.split("_");
			var idreg = dt[0];
			var namanya = dt[1];
			var unit = document.getElementById("unitselect").value;
			$.ajax({
				url: "<?php echo site_url(); ?>/ugd/berkaskembalikerm",
				type: "GET",
				data: {
					idreg: idreg,
					nama_pasien: namanya,
					unit: unit
				},
				success: function(ajaxData) {
					swal("Berkas " + namanya, "dikembalikan...");
					$("#barispasien tbody tr").remove();
					$("#barispasien tbody").append(ajaxData);
				}
			});
		}
	</script>