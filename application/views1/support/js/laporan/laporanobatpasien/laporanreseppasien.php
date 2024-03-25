<script src="<?php echo base_url();?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="<?php echo base_url();?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script>
	$(function () {
		$('#awal').datepicker({
			autoclose: true
		})
		$('#akhir').datepicker({
			autoclose: true
		})
		$('.unit2').select2()
		$('.gol2').select2()
	})
</script>
<script>
	function unitcek() {
		if (document.getElementById('cekunit').checked) {
			document.getElementById('unityes').disabled = false;
		} else 
		document.getElementById('unityes').disabled = true;
	}
	function golongancek() {
		if (document.getElementById('cekgolongan').checked) {
			document.getElementById('golonganyes').disabled = false;
		} else 
		document.getElementById('golonganyes').disabled = true;
	}
</script>
