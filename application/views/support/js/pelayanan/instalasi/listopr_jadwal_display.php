<script src="<?php echo base_url(); ?>assets/template_baru/dist/vendors/select2/js/select2.full.min.js"></script>
<script src="<?php echo base_url(); ?>assets/template_baru/dist/js/select2.script.js"></script>
<script src="<?php echo base_url();?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script src="<?php echo base_url();?>assets/dist/js/notify.min.js"></script>
<script src="<?php echo base_url();?>assets/dist/js/jquery-confirm.min.js"></script>
<script src="<?php echo base_url();?>assets/dist/js/standalone/selectize.js"></script>

<div class="modal fade" id="formmodal" data-backdrop="static" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false">



<script type="text/javascript">

	$(function () {
		$('#tgl').datepicker({ autoclose: true }).datepicker("setDate", "0");
	});

	$(function () {
		$('#unitselect').select2({ tags :true });
	});

	function prosesload() {
		$("#kotak").append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
	}

	function hapusload() {
		$(".overlay").remove();
	}

	function tutupmodal(id) {
		$(function () {
			$('#formmodal').modal('toggle');
		});
		// panggilrmview(id);
	}

	$(document).ready(function () {
		prosesload();
			var kdunit = 'IBSS';
			$.ajax({
				url: "<?php echo site_url();?>/tv_jadwaloperasi/caridatajadwalopr_display",
				type: "GET",
				data : {kdunit: kdunit},
				success: function (ajaxData){
					$("#tabellab tbody tr").remove();
					$("#tabellab tbody").append(ajaxData);
					hapusload();
				}
			});

		window.setInterval(function () {
			prosesload();
			var kdunit = 'IBSS';
			$.ajax({
				url: "<?php echo site_url();?>/tv_jadwaloperasi/caridatajadwalopr_display",
				type: "GET",
				data : {kdunit: kdunit},
				success: function (ajaxData){
					$("#tabellab tbody tr").remove();
					$("#tabellab tbody").append(ajaxData);
					hapusload();
				}
			});
		}, 60000);
	});
	

</script>
