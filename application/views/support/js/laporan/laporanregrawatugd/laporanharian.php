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
	function usercek() {
		if (document.getElementById('cekuser').checked) {
			document.getElementById('useryes').disabled = false;
		} else 
		document.getElementById('useryes').disabled = true;
	}

	async function getUser() {
		const URL ='<?=site_url("/ugd/get_user")?>';
		const result =await(await fetch(URL)).json();
		console.log('result ', result);
	}
	$(document).ready(async function(){
		await getUser();
	});

</script>
