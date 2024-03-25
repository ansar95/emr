<!-- <script src="<?php echo base_url(); ?>assets/bower_components/select2/dist/js/select2.full.min.js"></script> -->
<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url(); ?>assets/template_baru/dist/vendors/select2/js/select2.full.min.js"></script>
<script src="<?php echo base_url(); ?>assets/template_baru/dist/js/select2.script.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/notify.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/jquery-confirm.min.js"></script>


<div class="modal fade" id="formmodal" data-backdrop="static" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false">


	<script type="text/javascript">
		function prosesload() {
			$("#kotak").append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
		}

		function prosesloadhist() {
			$("#kotakhistory").append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
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

		function tutupmodalfoto(id) {
			$(function() {
				$('#formmodal').modal('toggle');
			});
			$.alert({
				title: 'Foto',
				content: id,
			})
		}

		function load_data(page) {
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
				url: "<?php echo site_url(); ?>/registrasipasien/paginationpasien/" + page,
				method: "GET",
				dataType: "json",
				data: {
					np: np,
					pp: pp,
					nap: nap,
					nrp: nrp,
					tgl: tgl,
					kartu: kartu,
					nik: nik
				},
				success: function(data) {
					hapusload();
					$('#tablepasien').html(data.pasien);
					$('#pagination_link').html(data.pagination_link);
				}
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

			$("#caridata").click(function(e) {
				load_data(1);
				// var np = document.getElementById("np").value;
				// var pp = document.getElementById("pp").value;
				// var nap = document.getElementById("nap").value;
				// var nrp = document.getElementById("nrp").value;
				// if ((np == "") && (pp == "") && (nap == "") && (nrp == "")) {
				// 	hapusload();
				// 	return;
				// }
				// $.ajax({
				// 	url: "<?php echo site_url(); ?>/registrasipasien/caripasien",
				// 	type: "GET",
				// 	data : {np: np, pp: pp, nap: nap, nrp: nrp},
				// 	success: function (ajaxData){
				// 		$("#barispasien tbody tr").remove();
				// 		$("#barispasien tbody").append(ajaxData);
				// 		hapusload();
				// 	}
				// });
			});

			$(document).on("click", "#dtpasien li a", function(event) {
				event.preventDefault();
				var page = $(this).data("ci-pagination-page");
				load_data(page);
			});

		});

		var dataid = "";

		function panggillihat(id) {
			console.log(id);
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

		function panggilrmview(id) {
			$.alert({
				title: 'No. RM',
				content: id,
			})
		}

		function panggileditpasien(id) {
			console.log(id);
			$.ajax({
				url: "<?php echo site_url(); ?>/registrasipasien/formubahpasien",
				type: "GET",
				data: {
					dataid: id
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

		function panggileditpasienfoto(id) {
			console.log(id);
			$.ajax({
				url: "<?php echo site_url(); ?>/registrasipasien/formubahpasienfoto",
				type: "GET",
				data: {
					dataid: id
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

		function hapuspasien(id) {
			$.confirm({
				title: 'Hapus Data',
				content: 'Yakin Data Pasien Dihapus?',
				buttons: {
					batal: {
						text: 'Batal',
						btnClass: 'btn btn-danger',
						action: function() {

						}
					},
					kembali: {
						text: 'Hapus',
						btnClass: 'btn btn-primary',
						keys: ['enter'],
						action: function() {
							$.ajax({
								url: "<?php echo site_url(); ?>/registrasipasien/prosesdeletedatapasien",
								type: "GET",
								data: {
									id: id
								},
								success: function(ajaxData) {
									var t = $.parseJSON(ajaxData);
									if (t == true) {
										$.alert("Sukses Menghapus Data");
										load_data(1);
									} else {
										$.alert("Hapus data tidak dizinkan, pasien sudah di proses / Data pasien tidak ditemukan");
									}
								},
								error: function(ajaxData) {
									$.alert("Terjadi Kesalahan");
								}
							});
						}
					}
				}
			});
		}
	</script>