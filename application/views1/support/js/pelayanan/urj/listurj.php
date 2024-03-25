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
			$('#tglp').datepicker({
				autoclose: true,
				dateFormat: 'dd-mm-yy',
				changeMonth: true,
				changeYear: true,
				yearRange: "-100:+00"
			}).datepicker("setDate", "0");
		});

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
				var tglp1 = document.getElementById("tglp").value;
				var dokter = document.getElementById("dokter").value;
				// console.log(dokter);
				if ((unit == "") && (nrp == "")) {
					hapusload();
					return;
				}
				$.ajax({
					url: "<?php echo site_url(); ?>/urj/caripasienurj",
					type: "GET",
					data: {
						unit: unit,
						nrp: nrp,
						tglp1: tglp1,
						dokter
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
				var dokter = document.getElementById("dokter").value;
				var tglp = document.getElementById("tglp").value;
				console.log(dokter);

				if ((unit == "") && (nrp == "")) {
					hapusload();
					return;
				}
				$.ajax({
					url: "<?php echo site_url(); ?>/urj/caripasienurj",
					type: "GET",
					data: {
						unit: unit,
						nrp: nrp,
						dokter : dokter,
						tglp1 : tglp
					},
					success: function(ajaxData) {
						$("#barispasien tbody tr").remove();
						$("#barispasien tbody").append(ajaxData);
						hapusload();
					}
				});

			});
		});


		function panggilproses(id) {
			var dt = id.split("_");

			if (dt[1] == "") {
				$.alert({
					title: 'Rawat Jalan',
					content: "Isi Nama Dokter Terlebih Dahulu",
				})
				return;
			}

			if (dt[3] == "1") {
				//lewati krn data dari perawatan
			} else {
				if (dt[2] != 1) {
					$.alert({
						title: 'ANTRIAN POLI',
						content: "Pasien ini belum dipanggil pada Antrian Poli",
					})
					return;
				}
			}
			prosesload();
			var unit = $("#unitselect").val();
			$.ajax({
				url: "<?php echo site_url(); ?>/urj/panggilurjform",
				type: "GET",
				data: {
					notrans: dt[0],
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

		function panggildokter(id) {
			prosesload();
			var unit = $("#unitselect").val();
			$.ajax({
				url: "<?php echo site_url(); ?>/urj/panggilurjdokterform",
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

		function panggilantrian(id) {
			var dt = id.split("_");
			var noantriannya = dt[1];
			var namanya = dt[2];
			var idnya = dt[0];

			var unit = $("#unitselect").val();
			var tglp1 = document.getElementById("tglp").value;

			$.ajax({
				url: "<?php echo site_url(); ?>/urj/prosesantrian",
				type: "GET",
				data: {
					id: id,
					unit: unit,
					idnya: idnya,
					tglp1: tglp1
				},
				success: function(ajaxData) {
					swal("Anda Memanggil Antrian " + noantriannya, namanya);
					$("#barispasien tbody tr").remove();
					$("#barispasien tbody").append(ajaxData);
				}
			});
		}

		function cekproses(id) {
			$.ajax({
				url: "<?php echo site_url(); ?>/urj/panggilurjdokterform",
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

		function berkassampai(id) {
			var dt = id.split("_");
			var idreg = dt[0];
			var namanya = dt[1];
			// var unit = document.getElementById("unit").value;
			var unit = document.getElementById("unitselect").value;
			var tglp = document.getElementById("tglp").value;
			$.ajax({
				url: "<?php echo site_url(); ?>/urj/berkassampaipoli",
				type: "GET",
				data: {
					idreg: idreg,
					nama_pasien: namanya,
					unit: unit,
					tglp1 : tglp
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
			var tglp = document.getElementById("tglp").value;
			$.ajax({
				url: "<?php echo site_url(); ?>/urj/berkaskembalikerm",
				type: "GET",
				data: {
					idreg: idreg,
					nama_pasien: namanya,
					unit: unit,
					tglp1 : tglp
				},
				success: function(ajaxData) {
					swal("Berkas " + namanya, "dikembalikan...");
					$("#barispasien tbody tr").remove();
					$("#barispasien tbody").append(ajaxData);
				}
			});
		}

		//SOAP
		function panggilsoap(id) {
			var dt = id.split("_");
			if (dt[1] == "") {
				$.alert({
					title: 'Rawat Jalan',
					content: "Isi Nama Dokter Terlebih Dahulu",
				})
				return;
			}

			prosesload();
			var unit = $("#unitselect").val();
			$.ajax({
				url: "<?php echo site_url(); ?>/urj/panggilsoap",
				type: "GET",
				data: {
					notrans: dt[0],
					unit: unit,
					no_rm: dt[2]
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

		//proses data soap

		function getDokterPoli(kodePoli, cb = () => {}) {
			$.ajax({
				url: "<?php echo site_url(); ?>/urj/dokterPoli",
				type: "GET",
				data: {
					kodePoli
				},
				success: function(result) {
					hapusload();
					cb(null, JSON.parse(result))
				},
				error: function(error) {
					console.log('Error : ', error);
					cb(error, null)
				}
			});
		}

		function setDropdownDokter(selector, data) {
			if (Array.isArray(data)) {
				$(selector).find('option:not(:first)').remove();
				data.forEach((item) => {
					$(selector).append(
						$("<option>").val(item.kode_dokter).html(`${item.nama_dokter}`)
					)
				})
			}
		}

		$('#unitselect').on('change', function() {
			const unit = $('#unitselect').val();
			getDokterPoli(unit, function(error, data) {
				setDropdownDokter('#dokter', data)
			})
		})

		$(document).ready(function() {
			const unit = $('#unitselect').val();
			getDokterPoli(unit, function(error, data) {
				setDropdownDokter('#dokter', data)
			})
		});


		function buatsurkon(id) {
        prosesload();
        $.ajax({
            url: "<?php echo site_url(); ?>/registrasipasien/formsurkon",
            type: "GET",
            data: {
                id: id
            },
            success: function(ajaxData) {
                $("#formmodal").html(ajaxData);
                $("#formmodal").modal('show', {
                    backdrop: 'true'
                });
                hapusload();
            },
            error: function(data) {
                hapusload();
            }
        });
    }

	function editsurkon(id) {
        prosesload();
        $.ajax({
            url: "<?php echo site_url(); ?>/registrasipasien/formsurkonedit",
            type: "GET",
            data: {
                id: id
            },
            success: function(ajaxData) {
                $("#formmodal").html(ajaxData);
                $("#formmodal").modal('show', {
                    backdrop: 'true'
                });
                hapusload();
            },
            error: function(data) {
                hapusload();
            }
        });
    }

	function hapussurkon(id) {
        prosesload();
        $.ajax({
            url: "<?php echo site_url(); ?>/registrasipasien/formsurkonhapus",
            type: "GET",
            data: {
                id: id
            },
            success: function(ajaxData) {
                $("#formmodal").html(ajaxData);
                $("#formmodal").modal('show', {
                    backdrop: 'true'
                });
                hapusload();
            },
            error: function(data) {
                hapusload();
            }
        });
    }



	function jadwaldokter(id) {
        prosesload();
        $.ajax({
            url: "<?php echo site_url(); ?>/registrasipasien/jadwaldokter",
            type: "GET",
            data: {
                id: id
            },
            success: function(ajaxData) {
                $("#formmodal").html(ajaxData);
                $("#formmodal").modal('show', {
                    backdrop: 'true'
                });
                hapusload();
            },
            error: function(data) {
                hapusload();
            }
        });
    }

	</script>