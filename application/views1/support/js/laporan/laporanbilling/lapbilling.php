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
		$('.shif2').select2()
		$('.pengguna2').select2()
		$('.cbayar2').select2()
	})
</script>
<script>
	function penggunacek() {
		if (document.getElementById('cekpengguna').checked) {
			document.getElementById('penggunayes').disabled = false;
		} else 
		document.getElementById('penggunayes').disabled = true;
	}
	function shifcek() {
		if (document.getElementById('cekshif').checked) {
			document.getElementById('shifyes').disabled = false;
		} else 
		document.getElementById('shifyes').disabled = true;
	}
	function cbayarcek() {
		if (document.getElementById('cekcbayar').checked) {
			document.getElementById('cbayaryes').disabled = false;
		} else 
		document.getElementById('cbayaryes').disabled = true;
	}
</script>

