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
			$('#tdtgl').datepicker({
				autoclose: true,
				dateFormat: 'dd-mm-yy',
				changeMonth: true,
				changeYear: true,
				yearRange: "-100:+00"
			}).datepicker("setDate", "0");
			$('#instgl').datepicker({
				autoclose: true,
				dateFormat: 'dd-mm-yy',
				changeMonth: true,
				changeYear: true,
				yearRange: "-100:+00"
			}).datepicker("setDate", "0");
			$("#tdwaktu").timepicker({
				showInputs: false,
				minuteStep: 1,
				showMeridian: false,
			});
		});

		$('select').select2({
                tags: true
            });

		$(function() {
			$('tdtindakan').select2();
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
				// var nrp = document.getElementById("nrp").value;
				var tglp1 = document.getElementById("tglp").value;
				var dokter = document.getElementById("dokter").value;
				// console.log(dokter);
				if ((unit == "") && (nrp == "")) {
					hapusload();
					return;
				}
				$.ajax({
					url: "<?php echo site_url(); ?>/rme/caripasienurj",
					type: "GET",
					data: {
						unit: unit,
						// nrp: nrp,
						tglp1: tglp1,
						dokter
					},
					success: function(ajaxData) {
						// console.log(ajaxData);
						$("#barispasien tbody tr").remove();
						$("#barispasien tbody").append(ajaxData);
						// $("#textnorm").val("13123");

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
			// prosesload();
			var unit = $("#unitselect").val();
			
			$.ajax({
				url: "<?php echo site_url(); ?>/rme/panggilurjform_dokter",
				type: "GET",
				data: {
					notrans: dt[0],
					unit: unit
				},
				success: function(ajaxData) {
					aktif();
					var t = JSON.parse(ajaxData);
					// console.log(t.dtpasien);
					// console.log(t.dtsoap);
					// console.log(t.dtview);
					console.log(t.dtview8);
					isi=t.dtpasien.no_rm+' | '+t.dtpasien.nama_pasien+' | '+t.dtpasien.golongan+' | '+t.dtpasien.notransaksi;
					$("#rmpasien").html(isi);
					$("#irm").val(t.dtpasien.no_rm);
					$("#inp").val(t.dtpasien.nama_pasien);
					$("#notrans").val(t.dtpasien.notransaksi);
					$("#tdgolongan").val(t.dtpasien.golongan);
					$("#tddokterkode").val(t.dtpasien.kode_dokter);
					$("#tddokter").val(t.dtpasien.nama_dokter);
					$("#tglperiksa").val(t.dtpasien.tgl_masuk);
					$("#suhu").val(t.dtsoap.suhu);
					$("#tinggi").val(t.dtsoap.tinggi);
					$("#berat").val(t.dtsoap.berat);
					$("#tensi").val(t.dtsoap.tensi);
					$("#nadi").val(t.dtsoap.nadi);
					$("#respirasi").val(t.dtsoap.respirasi);
					$("#spo2").val(t.dtsoap.spo2);
					$("#gcs").val(t.dtsoap.gcs);

					$('#kesadaran').val(t.dtsoap.kesadaran).trigger('change');

					$("#kesadaranlainnya").val(t.dtsoap.kesadaranlain);
					$("#keluhanutama").val(t.dtsoap.keluhanutama);
					$("#riwayatdahulu").val(t.dtsoap.riwayatdahulu);
					$("#riwayatsekarang").val(t.dtsoap.riwayatsekarang);
					$("#alergi").val(t.dtsoap.alergi);
					$("#objektif").val(t.dtsoap.objektif);
					$("#assesment").val(t.dtsoap.assesment);
					$("#plan").val(t.dtsoap.plan);
					$("#instruksi").val(t.dtsoap.instruksi);
					$("#evaluasi").val(t.dtsoap.evaluasi);
					$("#idnya").val(t.dtsoap.id);
					
					$("#tabelsoaphistory tbody tr").remove();
					$("#tabelsoaphistory tbody").append(t.dtview);

					$("#tabeltindakan tbody tr").remove();
					$("#tabeltindakan tbody").append(t.dtview2);

					$("#tabelinst tbody tr").remove();
					$("#tabelinst tbody").append(t.dtview3);

					$("#tabelinstlab tbody tr").remove();
					$("#tabelinstlab tbody").append(t.dtview4);

					$("#tabelinstrad tbody tr").remove();
					$("#tabelinstrad tbody").append(t.dtview5);

					$("#tabelobat tbody tr").remove();
					$("#tabelobat tbody").append(t.dtview6);

					
					$("#tabelhisresep tbody tr").remove();
					$("#tabelhisresep tbody").append(t.dtview7);

					$("#tabeldiag tbody tr").remove();
					$("#tabeldiag tbody").append(t.dtview8);

					hapusload();
					
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
				url: "<?php echo site_url(); ?>/rme/prosesantrian",
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



function aktif(){
	$('#suhu').prop('disabled', false);
	$('#tinggi').prop('disabled', false);
	$('#berat').prop('disabled', false);
	$('#tensi').prop('disabled', false);
	$('#respirasi').prop('disabled', false);
	$('#nadi').prop('disabled', false);
	$('#spo2').prop('disabled', false);
	$('#gcs').prop('disabled', false);
	$('#kesadaran').prop('disabled', false);
	$('#kesadaranlainnya').prop('disabled', false);
	$('#keluhanutama').prop('disabled', false);
	$('#riwayatsekarang').prop('disabled', false);
	$('#riwayatdahulu').prop('disabled', false);
	$('#alergi').prop('disabled', false);
	
	$('#objektif').prop('disabled', false);
	$('#assesment').prop('disabled', false);
	$('#plan').prop('disabled', false);
	$('#instruksi').prop('disabled', false);
	$('#evaluasi').prop('disabled', false);
	$('#icd').prop('disabled', false);
	$('#tombolupdate').prop('disabled', true);
	$('#tombolsimpan').prop('disabled', false);
}

function nonaktif(){
	$('#suhu').prop('disabled', true);
	$('#tinggi').prop('disabled', true);
	$('#berat').prop('disabled', true);
	$('#tensi').prop('disabled', true);
	$('#respirasi').prop('disabled', true);
	$('#nadi').prop('disabled', true);
	$('#spo2').prop('disabled', true);
	$('#gcs').prop('disabled', true);
	$('#kesadaran').prop('disabled', true);
	$('#kesadaranlainnya').prop('disabled', true);
	$('#keluhanutama').prop('disabled', true);
	$('#riwayatsekarang').prop('disabled', true);
	$('#riwayatdahulu').prop('disabled', true);
	$('#alergi').prop('disabled', true);
	
	$('#objektif').prop('disabled', true);
	$('#assesment').prop('disabled', true);
	$('#plan').prop('disabled', true);
	$('#instruksi').prop('disabled', true);
	$('#evaluasi').prop('disabled', true);
	$('#icd').prop('disabled', true);
	$('#tombolupdate').prop('disabled', false);
	$('#tombolsimpan').prop('disabled', true);
}


function isitindakan(idx) {
		// prosesload();
		var irm = $("#irm").val();
		var id = idx;
		console.log(id);
		$.ajax({
			url: "<?php echo site_url(); ?>/urj/panggilformlab",
			type: "GET",
			data: {
				id: id,
				irm: irm
			},
			success: function(ajaxData) {
				// hapusload();
				console.log(ajaxData);

				$("#myModal2").html(ajaxData);
				$("#myModal2").modal('show', {
					backdrop: 'true'
				});
			}
		});
	}

	//kebutuhan tindakan radiologi

	function isitindakanrad(idx) {
		// prosesload();
		var irm = $("#irm").val();
		var id = idx;
		console.log(id);
		$.ajax({
			url: "<?php echo site_url(); ?>/urj/panggilformrad",
			type: "GET",
			data: {
				id: id,
				irm: irm
			},
			success: function(ajaxData) {
				// hapusload();
				console.log(ajaxData);
				$("#myModal2").html(ajaxData);
				$("#myModal2").modal('show', {
					backdrop: 'true'
				});
			}
		});
	}
	
	function hapusinst(e, id) {
	var txt = $(e).parents("tr").find("td:eq(1)").text();
	$.confirm({
		title: "Hapus Data",
		content: "Yakin Pasien dari Unit " + txt + " Dihapus?",
		buttons: {
			batal: {
				text: "Batal",
				btnClass: "btn-red",
				action: function () {},
			},
			kembali: {
				text: "Hapus",
				btnClass: "btn-blue",
				keys: ["enter"],
				action: function () {
					var unit = $("#unitselect").val();
					var unittext = $("#unitselect option:selected").text();
					var notrans = document.getElementById("notrans").value;
					$.ajax({
						url: siteURL + "/urj/hapuskiriminstalasi",
						type: "GET",
						data: {
							id: id,
							notrans: notrans,
							unit: unit,
							unittext: unittext,
						},
						success: function (ajaxData) {
							var t = $.parseJSON(ajaxData);
							if (t.stat == true) {
								$.alert(t.info);
								$("#tabelinst tbody tr").remove();
								$("#tabelinst tbody").append(t.dtview);
								modalloadtutup();
							} else {
								$.alert(t.info);
								$("#tabelinst tbody tr").remove();
								$("#tabelinst tbody").append(t.dtview);
								modalloadtutup();
							}
						},
						error: function (ajaxData) {
							tdgagalalert();
							modalloadtutup();
						},
					});
				},
			},
		},
	});
}


function prosbhp1() {
		var tpp = $("#obatobat").val();
		$.ajax({
			url: "<?php echo site_url(); ?>/urj/untukpilihanbihp",
			type: "GET",
			data: {
				bhp: tpp
			},
		}).then(function(data) {
			$("#obatstauan").val('');
			$("#obatharga").val('');
			var t = JSON.parse(data);
			$("#obatstauan").val(t.satuanpakai);
			$("#obatharga").val(t.hargapakai);
		});
	}


function simpandataobat() {
		modalload();
		var norep = document.getElementById("norep").value;
		var irm = document.getElementById("irm").value;
		var notrans = document.getElementById("notrans").value;
		var obattgl = document.getElementById("tglperiksa").value;
		var unit = $("#unitselect").val();
		var unittext = $("#unitselect option:selected").text();
		var kode_dokter = document.getElementById("tddokterkode").value;
		var nama_dokter = document.getElementById("tddokter").value;
		var golongan = document.getElementById("tdgolongan").value;
		var nama_umum = document.getElementById("inp").value;
		
		var obatobat = $("#obatobat").val();
		var string = $("#obatobat option:selected").text();
		var letak = string.indexOf("|");

		var obatobattext1 = $("#obatobat option:selected").text();
		var obatobattext = obatobattext1.substring(0, letak);

		var obatqty = document.getElementById("obatqty").value;
		var obatstauan = document.getElementById("obatstauan").value;
		var obatharga = document.getElementById("obatharga").value;
		// var dosis = $("#dosis option:selected").text();
		var dosis = document.getElementById("dosis").value;
		var catatanresep = document.getElementById("catatanresep").value;
		// var x = document.getElementById("Btn").value;
		// x.disabled = true;
		if (
			obattgl == "" ||
			obatobat == "" ||
			obatqty == "" ||
			obatstauan == "" ||
			obatharga == ""
		) {
			modalloadtutup();
			kuranglengkap();
			return;
		}
		$.ajax({
			url: siteURL + "/urj/layananobat",
			type: "GET",
			data: {
				norep: norep,
				irm: irm,
				notrans: notrans,
				obattgl: obattgl,
				obatobat: obatobat,
				obatobattext: obatobattext,
				unit: unit,
				unittext: unittext,
				obatqty: obatqty,
				obatstauan: obatstauan,
				obatharga: obatharga,
				dosis: dosis,
				kode_dokter: kode_dokter,
				golongan: golongan,
				nama_dokter: nama_dokter,
				nama_umum: nama_umum,
				catatanresep: catatanresep,
			},
			success: function (ajaxData) {
				var t = $.parseJSON(ajaxData);
				console.log(t);
				if (t.stat == true) {
					tdsuksesalert(0);
					$("#tabelobat tbody tr").remove();
					$("#tabelobat tbody").append(t.dtview);
					// $("#norep").val('111');
					console.log(norep);
					modalloadtutup();
				} else {
					tdgagalalert();
					modalloadtutup();
				}
			},
			error: function (ajaxData) {
				tdgagalalert();
				modalloadtutup();
			},
		});
}


function hapusdataobat(e, id) {
	var txt = $(e).parents("tr").find("td:eq(0)").text();
	// console.log('masuk');
	$.confirm({
		title: "Hapus Data",
		content: "Yakin mengahapus data ke-" + txt + "?",
		buttons: {
			batal: {
				text: "Batal",
				btnClass: "btn-red",
				action: function () {},
			},
			hapus: {
				text: "Hapus",
				btnClass: "btn-blue",
				keys: ["enter"],
				action: function () {
					var unit = $("#unitselect").val();
					var unittext = $("#unitselect option:selected").text();
					var notrans = document.getElementById("notrans").value;
					$.ajax({
						url: siteURL + "/urj/layananobathapus",
						type: "GET",
						data: {
							id: id,
							notrans: notrans,
							unit: unit,
							unittext: unittext,
						},
						success: function (ajaxData) {
							var t = $.parseJSON(ajaxData);
							// console.log('llllll');
							if (t.stat == true) {
								tdsuksesalert(2);
								$("#tabelobat tbody tr").remove();
								$("#tabelobat tbody").append(t.dtview);
								modalloadtutup();
							} else {
								tdgagalalert();
								modalloadtutup();
							}
						},
						error: function (ajaxData) {
							tdgagalalert();
							modalloadtutup();
						},
					});
				},
			},
		},
	});
}


// diagnosa------


	function simpandiag() {
	var irm = document.getElementById("irm").value;
	var inp = document.getElementById("inp").value;
	var notrans = document.getElementById("notrans").value;
	var latin = document.getElementById("latin").value;
	var dtd = document.getElementById("dtd").value;

	var diag = $("#diag").val();
	var utama = $("#diagutama").prop('checked');
	if (diag == "") {
		$.notify("Data belum lengkap", "error");
		return;
	}
	loadproses()
	$.ajax({
		url: "<?php echo site_url(); ?>/uri/prosessimpandiagnosa",
		type: "GET",
		data: {
			irm: irm,
			inp: inp,
			notrans: notrans,
			diag: diag,
			utama: utama,
			latin : latin,
			dtd : dtd

		},
		success: function(ajaxData) {
			var dt = JSON.parse(ajaxData);
			if (dt.stat == true) {
				$("#tabeldiag tbody tr").remove();
				$("#tabeldiag tbody").append(dt.dtview);
				$("#formdiagnosa").html(dt.dtform);
				$.notify("Berhasil Menginput Data", "success");
			} else {
				$.notify("Gagal Memproses Data", "error");
			}
			loadhapus()
		},
		error: function(ajaxData) {
			loadhapus();
			$.notify("Gagal Memproses Data", "error");
		}
	});
}

function hapusdiagnosa(id) {
	$.confirm({
		title: 'Hapus Diagnosa?',
		buttons: {
			hapus: {
				text: 'Hapus',
				btnClass: 'btn-red',
				keys: ['enter', 'shift'],
				action: function() {
					var notrans = document.getElementById("notrans").value;
					loadproses();
					$.ajax({
						url: "<?php echo site_url(); ?>/uri/proseshapusdiagnosa",
						type: "GET",
						data: {
							id: id,
							notrans: notrans
						},
						success: function(ajaxData) {
							var dt = JSON.parse(ajaxData);
							console.log(dt);
							if (dt.stat == true) {
								loadhapus()
								$("#tabeldiag tbody tr").remove();
								$("#tabeldiag tbody").append(dt.dtview);
								$.notify("Berhasil Menghapus Data", "success");
							} else {
								$.notify("Data tidak dapat dihapus", "error");
								loadhapus();
							}
						},
						error: function(data) {
							$.notify("Gagal Memproses Data", "error");
							loadhapus();
						}
					});
				}
			},
			batal: {
				text: 'Batal',
				action: function() {}
			}
		}
	});
}


function bukaFormObat(id) {
    // alert("ID yang dipilih: " + id);
	
    $.ajax({
			url: "<?php echo site_url(); ?>/rme/panggilFormObat",
			type: "GET",
			data: {
				id: id,
			},
			success: function(ajaxData) {
				$("#formmodal").html(ajaxData);
                    $("#formmodal").modal('show', {
                        backdrop: 'true'
                    });
                    modaldetailtutup();
			},
			error: function(ajaxData) {
				$.notify("Gagal Memproses Data", "error");
			}
		});

}

	</script>