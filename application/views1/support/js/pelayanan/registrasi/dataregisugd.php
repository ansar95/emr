<script src="<?php echo base_url(); ?>assets/template_baru/dist/vendors/select2/js/select2.full.min.js"></script>
<script src="<?php echo base_url(); ?>assets/template_baru/dist/js/select2.script.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/notify.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/jquery-confirm.min.js"></script>


<div class="modal fade" id="formmodal" data-backdrop="static" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false">



	<script type="text/javascript">
		function prosesload() {
			$("#kotak").append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
		}

		function hapusload() {
			$(".overlay").remove();
		}

		function tutupmodal(id) {
			$(function() {
				$('#formmodal').modal('toggle');
			});
			panggilrmview(id);
		}

		function tutupmodalform() {
			$(function() {
				$('#formmodal').modal('toggle');
			});
		}

		function tutupmodalada() {
			$(function() {
				$('#formmodal').modal('toggle');
			});
			$.alert({
				title: 'Register',
				content: 'Pasien masih terdaftar',
			});
		}

		function pesanalert(isititle,isicontent) {
			$.alert({
				title: isititle,
				content: isicontent,
			});
		}

		function pesanvclaim(isititle,isicontent) {
			$.alert({
				title: isititle,
				content: isicontent,
			});
		}

		$.fn.datepicker.noConflict();
		$(document).ready(function() {
			$('#tgl').datepicker({
				autoclose: true,
				dateFormat: 'dd-mm-yy',
				changeMonth: true,
				changeYear: true,
				yearRange: "-100:+00"
			})
			$("#tambahdata").click(function(e) {
				$.ajax({
					url: "<?php echo site_url(); ?>/registrasipasien/inputpasien",
					type: "GET",
					success: function(ajaxData) {
						// console.log(ajaxdata);
						$("#formmodal").html(ajaxData);
						$("#formmodal").modal('show', {
							backdrop: 'true'
						});
					}
				});
			});
		});

		
		


		$(document).ready(function() {
			$("#caridata").click(function(e) {
				prosesload();
				var np = document.getElementById("np").value;
				var pp = document.getElementById("pp").value;
				var nap = document.getElementById("nap").value;
				var nrp = document.getElementById("nrp").value;
				var tgl = document.getElementById("tgl").value;
				var kartu = document.getElementById("kartu").value;
				var nik = document.getElementById("nik").value;
				if ((np == "") && (pp == "") && (nap == "") && (nrp == "") && (tgl == "") && (kartu == "") && (nik == "")) {
					hapusload();
					return;
				}
				$.ajax({
					url: "<?php echo site_url(); ?>/registrasipasien/caripasienregisugd",
					type: "GET",
					data: {
						np: np,
						pp: pp,
						nap: nap,
						nrp: nrp,
						tgl: tgl,
						kartu: kartu,
						nik: nik
					},
					success: function(ajaxData) {
						$("#barispasien tbody tr").remove();
						$("#barispasien tbody").append(ajaxData);
						hapusload();
					}
				});

			});
		});

		var dataid = "";

		function panggillihat(id) {
			dataid = id;
			$.ajax({
				url: "<?php echo site_url(); ?>/registrasipasien/lihatdatapasien",
				type: "GET",
				data: {
					id: id
				},
				success: function(ajaxData) {
					// console.log(ajaxdata);
					$("#formmodal").html(ajaxData);
					$("#formmodal").modal('show', {
						backdrop: 'true'
					});
				}
			});
		}

		function panggilinputugd(id) {
			$.ajax({
				method: "GET",
				dataType: 'json',
				url: "<?php echo site_url(); ?>/registrasipasien/cekdataada",
				data: {
					id: id
				},
				success: function(result) {
					console.log(result);
					if (result == 3) {
						$.alert({
							title: 'NIK belum tercatat',
							content: 'Edit data pasien',
						});
					} else if (result == 0) {
						$.ajax({
							url: "<?php echo site_url(); ?>/registrasipasien/inputregisugd",
							type: "GET",
							data: {
								id: id
							},
							success: function(ajaxData) {
								// console.log(ajaxdata);
								$("#formmodal").html(ajaxData);
								$("#formmodal").modal('show', {
									backdrop: 'true'
								});
							}
						});
					} else {
						$.alert({
							title: 'Register',
							content: 'Pasien masih terdaftar',
						});
					}
				}
			});
		}

		function panggilinputugd_old(id) {
			$.ajax({
				url: "<?php echo site_url(); ?>/registrasipasien/inputregisugd",
				type: "GET",
				data: {
					id: id
				},
				success: function(ajaxData) {
					// console.log(ajaxdata);
					$("#formmodal").html(ajaxData);
					$("#formmodal").modal('show', {
						backdrop: 'true'
					});
				}
			});
		}


		function panggilrmview(id) {
			$.confirm({
				title: 'No. Transaksi',
				content: id,
				buttons: {
					somethingElse: {
						text: 'Tutup',
						btnClass: 'btn-blue',
						keys: ['enter', 'shift'],
						action: function() {
							window.location.href = "<?php echo site_url(); ?>/registrasipasien/dataregistrasiugd";
						}
					}
				}
			});
		}
	</script>