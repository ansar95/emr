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
	
	function diagcek() {
		if (document.getElementById('cekdiag').checked) {
			document.getElementById('diagyes').disabled = false;
		} else 
		document.getElementById('diagyes').disabled = true;
	}
	
</script>
