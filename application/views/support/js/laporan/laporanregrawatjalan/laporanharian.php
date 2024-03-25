<script src="<?php echo base_url(); ?>assets/template_baru/dist/vendors/select2/js/select2.full.min.js"></script>
<script src="<?php echo base_url(); ?>assets/template_baru/dist/js/select2.script.js"></script>
<script src="<?php echo base_url();?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script>
	$(function () {
		$('#awal').datepicker({
			autoclose: true
		})
		$('#akhir').datepicker({
			autoclose: true
		})
		$('select').select2({ tags :true });
	})
</script>
<script>
	// $("#cetak").click(function(){
	// 	$.ajax({
	// 		type: 'post',
	// 		data: 1,       
	// 		url: '<?php echo site_url();?>/rawatjalan/laporanharian',
	// 		success: function (results) {
	// 			$("#results").html(results);          
	// 		}
	// 	});
	// });
</script>
