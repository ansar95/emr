function modalload() {
	$("#proseskotak").append('<div id="oload" class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
}

function modalloadtutup() {
	$("#oload").remove();
}

function modaltutupproses() {
	$("#proseskotak").remove();
}

function tutupmodal() {
	$(function () {
		$('#formmodal').modal('toggle');
	});
}

function loadproses() {
	$("#proseskotak").append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
}

function loadhapus() {
	$(".overlay").remove();
}

function tdsuksesalert(kode) {
	if (kode == 0) {
		$.notify("Sukses Input Data", "success");
	} else if (kode == 1) {
		$.notify("Sukses Ubah Data", "success");
	} else if (kode == 2) {
		$.notify("Sukses Hapus Data", "success");
	}
}

function tdgagalalert() {
	$.notify("Gagal Memproses Data", "error");
}

function tdgagalalert_diag() {
	$.notify("Belum Mengisi Diagnosa", "error");
}

function kuranglengkap() {
	$.notify("Data Kurang Lengkap", "error");
}

function pkembali() {
	$.notify("Pasien dikembalikan ke Unit sebelumnya", "success");
}

function ppulang() {
	$.notify("Pasien Telah Pulang", "success");
}

function ppindah() {
	$.notify("Pasien Telah Pindah Ruangan, Klik tombol TAMPILKAN untuk refresh data", "success");
}

function kebutuhantindakan() {
	$('#tdtgl').datepicker({
                autoclose: true,
				autoclose: true,
				dateFormat: 'dd-mm-yy',
				changeMonth: true,
				changeYear: true,
				yearRange: "-100:+00"
            }).datepicker("setDate", "0");
	$('#tdwaktu').timepicker({
		showInputs: false,
		minuteStep: 1,
		showMeridian: false
	});
	$('#tddokter').select2();
	$('#tdtindakan').select2();
	$('#pel1').select2();
	$('#pel2').select2();
	$('#diag').select2();
}

function kebutuhanbhp() {
	$('#bhptgl').datepicker({
                autoclose: true,
				autoclose: true,
				dateFormat: 'dd-mm-yy',
				changeMonth: true,
				changeYear: true,
				yearRange: "-100:+00"
            }).datepicker("setDate", "0");
	$('#bhpbhp').select2();
}

function kebutuhanodua() {
	$('#otgl').datepicker({
                autoclose: true,
				autoclose: true,
				dateFormat: 'dd-mm-yy',
				changeMonth: true,
				changeYear: true,
				yearRange: "-100:+00"
            }).datepicker("setDate", "0");
	$('#ojam').timepicker({
		showInputs: false,
		minuteStep: 1,
		showMeridian: false
	});
}

function kebutuhandokter() {
	$('#dtgl').datepicker({
                autoclose: true,
				autoclose: true,
				dateFormat: 'dd-mm-yy',
				changeMonth: true,
				changeYear: true,
				yearRange: "-100:+00"
            }).datepicker("setDate", "0");
	$('#djam').timepicker({
		showInputs: false,
		minuteStep: 1,
		showMeridian: false
	});
	$('#ddokter').select2();
	$('#dvisit').select2();
}

function kebutuhandarah() {
	$('#drtgl').datepicker({
                autoclose: true,
				autoclose: true,
				dateFormat: 'dd-mm-yy',
				changeMonth: true,
				changeYear: true,
				yearRange: "-100:+00"
            }).datepicker("setDate", "0");
	$('#drgol').select2();
}

function kebutuhaninstalasi() {
	$('#iunit').select2();
}

$(function () {
	kebutuhantindakan();
	kebutuhanbhp();
	kebutuhandarah();
	kebutuhandokter();
	kebutuhanodua();
	kebutuhaninstalasi();
	kebutuhanresep();
	kebutuhandokterresep();
	$('#pktgl').datepicker({
                autoclose: true,
				autoclose: true,
				dateFormat: 'dd-mm-yy',
				changeMonth: true,
				changeYear: true,
				yearRange: "-100:+00"
            }).datepicker("setDate", "0");
	$('#pktglrujukan').datepicker({
                autoclose: true,
				autoclose: true,
				dateFormat: 'dd-mm-yy',
				changeMonth: true,
				changeYear: true,
				yearRange: "-100:+00"
            }).datepicker("setDate", "0");
	$('#instgl').datepicker({
                autoclose: true,
				autoclose: true,
				dateFormat: 'dd-mm-yy',
				changeMonth: true,
				changeYear: true,
				yearRange: "-100:+00"
            }).datepicker("setDate", "0");
	$('#pktglobat').datepicker({
                autoclose: true,
				autoclose: true,
				dateFormat: 'dd-mm-yy',
				changeMonth: true,
				changeYear: true,
				yearRange: "-100:+00"
            }).datepicker("setDate", "0");
	$('#pkjam').timepicker({
		showInputs: false,
		minuteStep: 1,
		showMeridian: false
	});
	$('#pkjamrujukan').timepicker({
		showInputs: false,
		minuteStep: 1,
		showMeridian: false
	});
	$('#pkunit').select2();
	$('#pkunitrujukan').select2();
});

function tdtindakan() {
    var tpp = $("#tdtindakan").val();
    $.ajax({
        url: siteURL + "/uri/untukpilihantindakan",
        type: "GET",
        data : {kdt: tpp},
    }).then(function (data) {
        $("#jasa").val('');
        var t = JSON.parse(data);
        $("#jasa").val(t.jasas);
    });
}

function simpandatatindakan() {
	modalload();
	var notrans = document.getElementById("notrans").value;
	var tdtgl = document.getElementById("tdtgl").value;
	var tdjam = document.getElementById("tdwaktu").value;
	var tddokter = $("#tddokter").val();
	var tddoktertext = $("#tddokter option:selected" ).text();
	var tdpel1 = $("#pel1").val();
	var tdpel1text = $("#pel1 option:selected" ).text();
	var tdpel2 = $("#pel2").val();
	var tdpel2text = $("#pel2 option:selected" ).text();
	var tdtindakan = $("#tdtindakan").val();
	var tdtindakantext = $("#tdtindakan option:selected" ).text();
	var unit = $("#unitselect").val();
	var unittext = $("#unitselect option:selected" ).text();
	var tdjml = document.getElementById("tdjml").value;
	var tdrawat = $("#tdperawat").prop('checked');
	var tddiskon = document.getElementById("tddiskon").value;
	var tdumum = $("#tdumum").prop('checked');
	// var catatantindakan = document.getElementById("catatantindakan").value;

	if ((tdtgl == "") || (tdjam == "") || (tddokter == "") || (tdtindakan == "") || (tdjml == "")) {
		modalloadtutup();
		return;
	}
	$.ajax({
		url: siteURL + "/uri/layanantindakan",
		type: "GET",
		data : {
			tdtgl: tdtgl, 
			tdjam: tdjam, 
			tddokter: tddokter, 
			tdpel1: tdpel1,
			tdpel1text: tdpel1text,
			tdpel2: tdpel2,
			tdpel2text: tdpel2text,
			tdtindakan: tdtindakan, 
			tdjml: tdjml, 
			tdrawat: tdrawat, 
			notrans: notrans,
			tddoktertext: tddoktertext,
			tdtindakantext: tdtindakantext,
			unit: unit,
			unittext: unittext,
			tddiskon: tddiskon,
			tdumum: tdumum
			// catatantindakan : catatantindakan
		},
		success: function (ajaxData){
			var t = $.parseJSON(ajaxData);
			
			if (t.stat == true) {
				tdsuksesalert(0);
				$("#tabeltindakan tbody tr").remove();
				$("#tabeltindakan tbody").append(t.dtview);
				modalloadtutup();
			} else {
				tdgagalalert();
				modalloadtutup();
			}
		},
		error: function (ajaxData) {
			tdgagalalert();
			modalloadtutup();
		}
	});
}

function simpandatabhp() {
	modalload();
	var notrans = document.getElementById("notrans").value;
	var bhptgl = document.getElementById("bhptgl").value;
	var bhpbhp = $("#bhpbhp").val();
	var bhpbhptext = $("#bhpbhp option:selected" ).text();
	var unit = $("#unitselect").val();
	var unittext = $("#unitselect option:selected" ).text();
	var bhpqty = document.getElementById("bhpqty").value;
	var bhpstauan = document.getElementById("bhpstauan").value;
	var bhpharga = document.getElementById("bhpharga").value;
	var bhpdiskon = document.getElementById("bhpdiskon").value;
	var bhpumum = $("#bhpumum").prop('checked');
	if ((bhptgl == "") || (bhpbhp == "") || (bhpqty == "") || (bhpstauan == "") || (bhpharga == "")) {
		modalloadtutup();
		kuranglengkap();
		return;
	}
	$.ajax({
		url: siteURL + "/uri/layananbhp",
		type: "GET",
		data : {
			notrans: notrans,
			bhptgl: bhptgl, 
			bhpbhp: bhpbhp,
			bhpbhptext: bhpbhptext,
			unit: unit,
			unittext: unittext,
			bhpqty: bhpqty,
			bhpstauan: bhpstauan,
			bhpharga: bhpharga,
			bhpdiskon : bhpdiskon,
			bhpumum : bhpumum
		},
		success: function (ajaxData){
			var t = $.parseJSON(ajaxData);
			if (t.stat == true) {
				tdsuksesalert(0);
				$("#tabelbhp tbody tr").remove();
				$("#tabelbhp tbody").append(t.dtview);
				modalloadtutup();
			} else {
				tdgagalalert();
				modalloadtutup();
			}
		},
		error: function (ajaxData) {
			tdgagalalert();
			modalloadtutup();
		}
	});
}

function simpandataodua() {
	modalload();
	var notrans = document.getElementById("notrans").value;
	var otgl = document.getElementById("otgl").value;
	var ojam = document.getElementById("ojam").value;
	var unit = $("#unitselect").val();
	var unittext = $("#unitselect option:selected" ).text();
	var ojml = document.getElementById("ojml").value;
	var odiskon = document.getElementById("odiskon").value;
	var oumum = $("#oumum").prop('checked');
	if ((otgl == "") && (ojam == "") && (ojml == "")) {
		modalloadtutup();
		kuranglengkap();
		return;
	}
	$.ajax({
		url: siteURL + "/uri/layananodua",
		type: "GET",
		data : {
			notrans: notrans,
			otgl: otgl,
			ojam: ojam,
			unit: unit,
			unittext: unittext,
			ojml: ojml,
			oumum : oumum,
			odiskon : odiskon
		},
		success: function (ajaxData){
			var t = $.parseJSON(ajaxData);
			if (t.stat == true) {
				tdsuksesalert(0);
				$("#tabelodua tbody tr").remove();
				$("#tabelodua tbody").append(t.dtview);
				modalloadtutup();
			} else {
				tdgagalalert();
				modalloadtutup();
			}
		},
		error: function (ajaxData) {
			tdgagalalert();
			modalloadtutup();
		}
	});
}

function simpandtdokter() {
	modalload();
	var notrans = document.getElementById("notrans").value;
	var dtgl = document.getElementById("dtgl").value;
	var djam = document.getElementById("djam").value;
	var ddokter = $("#ddokter").val();
	var ddoktertext = $("#ddokter option:selected" ).text();
	var unit = $("#unitselect").val();
	var unittext = $("#unitselect option:selected" ).text();
	var dvisit = $("#dvisit").val();
	var drdiskon = document.getElementById("drdiskon").value;
	var drumum = $("#drumum").prop('checked');
	if ((dtgl == "") || (djam == "") || (ddokter == "") || (dvisit == "")) {
		modalloadtutup();
		kuranglengkap();
		return;
	}
	$.ajax({
		url: siteURL + "/uri/layanandokter",
		type: "GET",
		data : {
			notrans: notrans,
			dtgl: dtgl,
			djam: djam,
			ddokter: ddokter,
			ddoktertext: ddoktertext,
			unit: unit,
			unittext: unittext,
			dvisit: dvisit,
			drumum : drumum,
			drdiskon : drdiskon
		},
		success: function (ajaxData){
			var t = $.parseJSON(ajaxData);
			if (t.stat == true) {
				tdsuksesalert(0);
				$("#tabeldokter tbody tr").remove();
				$("#tabeldokter tbody").append(t.dtview);
				modalloadtutup();
			} else {
				tdgagalalert();
				modalloadtutup();
			}
		},
		error: function (ajaxData) {
			tdgagalalert();
			modalloadtutup();
		}
	});
}

function simpankantung() {
	modalload();
	var notrans = document.getElementById("notrans").value;
	var drtgl = document.getElementById("drtgl").value;
	var drjml = document.getElementById("drjml").value;
	var drgol = $("#drgol").val();
	var unit = $("#unitselect").val();
	var unittext = $("#unitselect option:selected").text();
	var drhdiskon = document.getElementById("drhdiskon").value;
	var drhumum = $("#drhumum").prop('checked');
	if ((drtgl == "") || (drjml == "") || (drgol == "")) {
		modalloadtutup();
		kuranglengkap();
		return;
	}
	$.ajax({
		url: siteURL + "/uri/layanandarah",
		type: "GET",
		data : {
			notrans: notrans,
			drtgl: drtgl,
			drjml: drjml,
			drgol: drgol,
			unit: unit,
			unittext: unittext,
			drhdiskon : drhdiskon,
			drhumum : drhumum
		},
		success: function (ajaxData){
			var t = $.parseJSON(ajaxData);
			if (t.stat == true) {
				tdsuksesalert(0);
				$("#tabelkantung tbody tr").remove();
				$("#tabelkantung tbody").append(t.dtview);
				modalloadtutup();
			} else {
				tdgagalalert();
				modalloadtutup();
			}
		},
		error: function (ajaxData) {
			tdgagalalert();
			modalloadtutup();
		}
	});
}

function simpanpindah() {
	modalload();
	var notrans = document.getElementById("notrans").value;
	var pktgl = document.getElementById("pktgl").value;
	var pkjam = document.getElementById("pkjam").value;
	var pkunit = $("#pkunit").val();
	var unit = $("#unit").val();
	var pkunittext = $("#pkunit option:selected").text();
	// var pcatatan = document.getElementById("pcatatan").value;
	if ((pktgl == "") || (pkjam == "") || (pkunit == "")) {
		modalloadtutup();
		kuranglengkap();
		return;
	}
	$.ajax({
		url: siteURL + "/uri/layananpindahkamar",
		type: "GET",
		data : {
			notrans: notrans,
			pktgl: pktgl,
			pkjam: pkjam,
			pkunit: pkunit,
			pkunittext: pkunittext,
			unit : unit
			// pcatatan : pcatatan
		},
		success: function (ajaxData){
			var t = $.parseJSON(ajaxData);
			if (t.stat[0] == true) {
				tdsuksesalert(0);
				// $("#tabelhistory tbody tr").remove();
				// $("#tabelhistory tbody").append(t.dtview);
				// if (t.stat[1] == "1") {
				// 	$('#btnPindahSimpan').attr("oncLick", "");
				// } else {
				// 	$('#btnPindahSimpan').attr("oncLick", "simpanpindah()");
				// }
				
								// ditutup dulu
								// $("#barispasien tbody tr").remove();
								// $("#barispasien tbody").append(t.dtviewuri);

								modalloadtutup();
								// modaltutupproses();
								tutupmodal();
								ppindah();

				// modalloadtutup();
			} else {
				tdgagalalert();
				modalloadtutup();
			}
		},
		error: function (ajaxData) {
			tdgagalalert();
			modalloadtutup();
		}
	});
}

function simpanrujukan() {
	modalload();
	var notrans = document.getElementById("notrans").value;
	var pktgl = document.getElementById("pktglrujukan").value;
	var pkjam = document.getElementById("pkjamrujukan").value;
	var pkunit = $("#pkunitrujukan").val();
	var pkunittext = $("#pkunitrujukan option:selected").text();
	if ((pktgl == "") || (pkjam == "") || (pkunit == "")) {
		modalloadtutup();
		kuranglengkap();
		return;
	}
	$.ajax({
		url: siteURL + "/uri/layananrujukanpoli",
		type: "GET",
		data : {
			notrans: notrans,
			pktgl: pktgl,
			pkjam: pkjam,
			pkunit: pkunit,
			pkunittext: pkunittext
		},
		success: function (ajaxData){
			var t = $.parseJSON(ajaxData);
			console.log(t);
			if (t.stat[0] == true) {
				tdsuksesalert(0);
				$("#tabelrujukan tbody tr").remove();
				$("#tabelrujukan tbody").append(t.dtview);
				modalloadtutup();
			} else {
				tdgagalalert();
				modalloadtutup();
			}
		},
		error: function (ajaxData) {
			console.log("Error: " + ajaxData);
			tdgagalalert();
			modalloadtutup();
		}
	});
}

function ubahtindakan() {
	modalload();
	$.ajax({
		url: siteURL + "/uri/kelolaformtindakan",
		type: "GET",
		success: function (ajaxData){
			$("#formtindakan").html(ajaxData);
			modalloadtutup();
		},
		error: function (ajaxData) {
			modalloadtutup();
		}
	});
}

function ubahtindakanedit(id) {
	modalload();
	$.ajax({
		url: siteURL + "/uri/kelolaformtindakanedit",
		type: "GET",
		data : {id: id},
		success: function (ajaxData){
			$("#formtindakan").html(ajaxData);
			modalloadtutup();
		},
		error: function (ajaxData) {
			modalloadtutup();
		}
	});
}

function ubahdatatindakan(id) {
	modalload();
	var notrans = document.getElementById("notrans").value;
	var tdtgl = document.getElementById("tdtgl").value;
	var tdjam = document.getElementById("tdwaktu").value;
	var tddokter = $("#tddokter").val();
	var tddoktertext = $("#tddokter option:selected" ).text();
	var tdpel1 = $("#pel1").val();
	var tdpel1text = $("#pel1 option:selected" ).text();
	var tdpel2 = $("#pel2").val();
	var tdpel2text = $("#pel2 option:selected" ).text();
	var tdtindakan = $("#tdtindakan").val();
	var tdtindakantext = $("#tdtindakan option:selected" ).text();
	var unit = $("#unitselect").val();
	var unittext = $("#unitselect option:selected" ).text();
	var tdjml = document.getElementById("tdjml").value;
	var tdrawat = $("#tdperawat").prop('checked');
	var tddiskon = document.getElementById("tddiskon").value;
    var tdumum = $("#tdumum").prop('checked');
	if ((tdtgl == "") || (tdjam == "") || (tddokter == "") || (tdtindakan == "") || (tdjml == "")) {
		modalloadtutup();
		return;
	}
	$.ajax({
		url: siteURL + "/uri/layanantindakanubah",
		type: "GET",
		data : {
			id: id,
			tdtgl: tdtgl, 
			tdjam: tdjam, 
			tddokter: tddokter, 
			tdpel1: tdpel1,
			tdpel1text: tdpel1text,
			tdpel2: tdpel2,
			tdpel2text: tdpel2text,
			tdtindakan: tdtindakan, 
			tdjml: tdjml, 
			tdrawat: tdrawat, 
			notrans: notrans,
			tddoktertext: tddoktertext,
			tdtindakantext: tdtindakantext,
			unit: unit,
			unittext: unittext,
			tddiskon: tddiskon,
            tdumum: tdumum
		},
		success: function (ajaxData){
			var t = $.parseJSON(ajaxData);
			
			if (t.stat == true) {
				tdsuksesalert(0);
				$("#tabeltindakan tbody tr").remove();
				$("#tabeltindakan tbody").append(t.dtview);
				$("#formtindakan").html(t.formnya);
				modalloadtutup();
			} else {
				tdgagalalert();
				modalloadtutup();
			}
		},
		error: function (ajaxData) {
			tdgagalalert();
			modalloadtutup();
		}
	});
}

function hapusdatatindakan(e, id) {
	var txt = $(e).parents('tr').find("td:eq(0)").text();
	$.confirm({
		title: 'Hapus Data',
		content: 'Yakin mengahapus data ke-' + txt + '?',
		buttons: {
			batal: {
				text: 'Batal',
				btnClass: 'btn-red',
				action: function(){
					
				}
			},
			hapus: {
				text: 'Hapus',
				btnClass: 'btn-blue',
				keys: ['enter'],
				action: function(){
					var unit = $("#unitselect").val();
					var unittext = $("#unitselect option:selected" ).text();
					var notrans = document.getElementById("notrans").value;
					$.ajax({
						url: siteURL + "/uri/layanantindakanhapus",
						type: "GET",
						data : {
							id: id,
							notrans: notrans,
							unit: unit,
							unittext: unittext
						},
						success: function (ajaxData){
							var t = $.parseJSON(ajaxData);
							if (t.stat == true) {
								tdsuksesalert(2);
								$("#tabeltindakan tbody tr").remove();
								$("#tabeltindakan tbody").append(t.dtview);
								modalloadtutup();
							} else {
								tdgagalalert();
								modalloadtutup();
							}
						},
						error: function (ajaxData) {
							tdgagalalert();
							modalloadtutup();
						}
					});
				}
			}
		}
	});
}

function ubahbhp() {
	modalload();
	$.ajax({
		url: siteURL + "/uri/kelolaformbhp",
		type: "GET",
		success: function (ajaxData){
			$("#formbhp").html(ajaxData);
			modalloadtutup();
		},
		error: function (ajaxData) {
			modalloadtutup();
		}
	});
}

function ubahbhpedit(id) {
	modalload();
	$.ajax({
		url: siteURL + "/uri/kelolaformbhpedit",
		type: "GET",
		data : {id: id},
		success: function (ajaxData){
			$("#formbhp").html(ajaxData);
			modalloadtutup();
		},
		error: function (ajaxData) {
			modalloadtutup();
		}
	});
}

function ubahdatabhp(id) {
	modalload();
	var notrans = document.getElementById("notrans").value;
	var bhptgl = document.getElementById("bhptgl").value;
	var bhpbhp = $("#bhpbhp").val();
	var bhpbhptext = $("#bhpbhp option:selected" ).text();
	var unit = $("#unitselect").val();
	var unittext = $("#unitselect option:selected" ).text();
	var bhpqty = document.getElementById("bhpqty").value;
	var bhpstauan = document.getElementById("bhpstauan").value;
	var bhpharga = document.getElementById("bhpharga").value;
	var bhpdiskon = document.getElementById("bhpdiskon").value;
	var bhpumum = $("#bhpumum").prop('checked');
	if ((bhptgl == "") || (bhpbhp == "") || (bhpqty == "") || (bhpstauan == "") || (bhpharga == "")) {
		modalloadtutup();
		kuranglengkap();
		return;
	}
	$.ajax({
		url: siteURL + "/uri/layananbhpubah",
		type: "GET",
		data : {
			id: id,
			notrans: notrans,
			bhptgl: bhptgl, 
			bhpbhp: bhpbhp,
			bhpbhptext: bhpbhptext,
			unit: unit,
			unittext: unittext,
			bhpqty: bhpqty,
			bhpstauan: bhpstauan,
			bhpharga: bhpharga,
			bhpdiskon : bhpdiskon,
			bhpumum : bhpumum
		},
		success: function (ajaxData){
			var t = $.parseJSON(ajaxData);
			
			if (t.stat == true) {
				tdsuksesalert(1);
				$("#tabelbhp tbody tr").remove();
				$("#tabelbhp tbody").append(t.dtview);
				$("#formbhp").html(t.formnya);
				modalloadtutup();
			} else {
				tdgagalalert();
				modalloadtutup();
			}
		},
		error: function (ajaxData) {
			tdgagalalert();
			modalloadtutup();
		}
	});
}

function hapusdatabhp(e, id) {
	var txt = $(e).parents('tr').find("td:eq(0)").text();
	$.confirm({
		title: 'Hapus Data',
		content: 'Yakin mengahapus data ke-' + txt + '?',
		buttons: {
			batal: {
				text: 'Batal',
				btnClass: 'btn-red',
				action: function(){
					
				}
			},
			hapus: {
				text: 'Hapus',
				btnClass: 'btn-blue',
				keys: ['enter'],
				action: function(){
					var unit = $("#unitselect").val();
					var unittext = $("#unitselect option:selected" ).text();
					var notrans = document.getElementById("notrans").value;
					$.ajax({
						url: siteURL + "/uri/layananbhphapus",
						type: "GET",
						data : {
							id: id,
							notrans: notrans,
							unit: unit,
							unittext: unittext
						},
						success: function (ajaxData){
							var t = $.parseJSON(ajaxData);
							if (t.stat == true) {
								tdsuksesalert(2);
								$("#tabelbhp tbody tr").remove();
								$("#tabelbhp tbody").append(t.dtview);
								modalloadtutup();
							} else {
								tdgagalalert();
								modalloadtutup();
							}
						},
						error: function (ajaxData) {
							tdgagalalert();
							modalloadtutup();
						}
					});
				}
			}
		}
	});
}

function ubahodua() {
	modalload();
	$.ajax({
		url: siteURL + "/uri/kelolaformodua",
		type: "GET",
		success: function (ajaxData){
			$("#formodua").html(ajaxData);
			modalloadtutup();
		},
		error: function (ajaxData) {
			modalloadtutup();
		}
	});
}

function ubahoduaedit(id) {
	modalload();
	$.ajax({
		url: siteURL + "/uri/kelolaformoduaedit",
		type: "GET",
		data : {id: id},
		success: function (ajaxData){
			$("#formodua").html(ajaxData);
			modalloadtutup();
		},
		error: function (ajaxData) {
			modalloadtutup();
		}
	});
}

function ubahdataodua(id) {
	modalload();
	var notrans = document.getElementById("notrans").value;
	var otgl = document.getElementById("otgl").value;
	var ojam = document.getElementById("ojam").value;
	var unit = $("#unitselect").val();
	var unittext = $("#unitselect option:selected" ).text();
	var ojml = document.getElementById("ojml").value;
	var odiskon = document.getElementById("odiskon").value;
	var oumum = $("#oumum").prop('checked');
	if ((otgl == "") || (ojam == "") || (ojml == "")) {
		modalloadtutup();
		kuranglengkap();
		return;
	}
	$.ajax({
		url: siteURL + "/uri/layananoduaubah",
		type: "GET",
		data : {
			id: id,
			notrans: notrans,
			otgl: otgl,
			ojam: ojam,
			unit: unit,
			unittext: unittext,
			ojml: ojml,
			odiskon: odiskon,
			oumum: oumum
		},
		success: function (ajaxData){
			var t = $.parseJSON(ajaxData);
			
			if (t.stat == true) {
				tdsuksesalert(1);
				$("#tabelodua tbody tr").remove();
				$("#tabelodua tbody").append(t.dtview);
				$("#formodua").html(t.formnya);
				modalloadtutup();
			} else {
				tdgagalalert();
				modalloadtutup();
			}
		},
		error: function (ajaxData) {
			tdgagalalert();
			modalloadtutup();
		}
	});
}

function hapusdataodua(e, id) {
	var txt = $(e).parents('tr').find("td:eq(0)").text();
	$.confirm({
		title: 'Hapus Data',
		content: 'Yakin mengahapus data ke-' + txt + '?',
		buttons: {
			batal: {
				text: 'Batal',
				btnClass: 'btn-red',
				action: function(){
					
				}
			},
			hapus: {
				text: 'Hapus',
				btnClass: 'btn-blue',
				keys: ['enter'],
				action: function(){
					var unit = $("#unitselect").val();
					var unittext = $("#unitselect option:selected" ).text();
					var notrans = document.getElementById("notrans").value;
					$.ajax({
						url: siteURL + "/uri/layananoduahapus",
						type: "GET",
						data : {
							id: id,
							notrans: notrans,
							unit: unit,
							unittext: unittext
						},
						success: function (ajaxData){
							var t = $.parseJSON(ajaxData);
							if (t.stat == true) {
								tdsuksesalert(2);
								$("#tabelodua tbody tr").remove();
								$("#tabelodua tbody").append(t.dtview);
								modalloadtutup();
							} else {
								tdgagalalert();
								modalloadtutup();
							}
						},
						error: function (ajaxData) {
							tdgagalalert();
							modalloadtutup();
						}
					});
				}
			}
		}
	});
}

function ubahdokter() {
	modalload();
	$.ajax({
		url: siteURL + "/uri/kelolaformdokter",
		type: "GET",
		success: function (ajaxData){
			$("#formdokter").html(ajaxData);
			modalloadtutup();
		},
		error: function (ajaxData) {
			modalloadtutup();
		}
	});
}

function ubahdokteredit(id) {
	modalload();
	$.ajax({
		url: siteURL + "/uri/kelolaformdokteredit",
		type: "GET",
		data : {id: id},
		success: function (ajaxData){
			$("#formdokter").html(ajaxData);
			modalloadtutup();
		},
		error: function (ajaxData) {
			modalloadtutup();
		}
	});
}

function ubahdatadokter(id) {
	modalload();
	var notrans = document.getElementById("notrans").value;
	var dtgl = document.getElementById("dtgl").value;
	var djam = document.getElementById("djam").value;
	var ddokter = $("#ddokter").val();
	var ddoktertext = $("#ddokter option:selected" ).text();
	var unit = $("#unitselect").val();
	var unittext = $("#unitselect option:selected" ).text();
	var dvisit = $("#dvisit").val();
	var drdiskon = document.getElementById("drdiskon").value;
	var drumum = $("#drumum").prop('checked');
	if ((dtgl == "") || (djam == "") || (ddokter == "") || (dvisit == "")) {
		modalloadtutup();
		kuranglengkap();
		return;
	}
	$.ajax({
		url: siteURL + "/uri/layanandokterubah",
		type: "GET",
		data : {
			id: id,
			notrans: notrans,
			dtgl: dtgl,
			djam: djam,
			ddokter: ddokter,
			ddoktertext: ddoktertext,
			unit: unit,
			unittext: unittext,
			dvisit: dvisit,
			drdiskon: drdiskon,
			drumum:drumum
		},
		success: function (ajaxData){
			var t = $.parseJSON(ajaxData);
			if (t.stat == true) {
				tdsuksesalert(1);
				$("#tabeldokter tbody tr").remove();
				$("#tabeldokter tbody").append(t.dtview);
				$("#formdokter").html(t.formnya);
				modalloadtutup();
			} else {
				tdgagalalert();
				modalloadtutup();
			}
		},
		error: function (ajaxData) {
			tdgagalalert();
			modalloadtutup();
		}
	});
}

function hapusdataodokter(e, id) {
	var txt = $(e).parents('tr').find("td:eq(0)").text();
	$.confirm({
		title: 'Hapus Data',
		content: 'Yakin mengahapus data ke-' + txt + '?',
		buttons: {
			batal: {
				text: 'Batal',
				btnClass: 'btn-red',
				action: function(){
					
				}
			},
			hapus: {
				text: 'Hapus',
				btnClass: 'btn-blue',
				keys: ['enter'],
				action: function(){
					var unit = $("#unitselect").val();
					var unittext = $("#unitselect option:selected" ).text();
					var notrans = document.getElementById("notrans").value;
					$.ajax({
						url: siteURL + "/uri/layanandokterhapus",
						type: "GET",
						data : {
							id: id,
							notrans: notrans,
							unit: unit,
							unittext: unittext
						},
						success: function (ajaxData){
							var t = $.parseJSON(ajaxData);
							if (t.stat == true) {
								tdsuksesalert(2);
								$("#tabeldokter tbody tr").remove();
								$("#tabeldokter tbody").append(t.dtview);
								modalloadtutup();
							} else {
								tdgagalalert();
								modalloadtutup();
							}
						},
						error: function (ajaxData) {
							tdgagalalert();
							modalloadtutup();
						}
					});
				}
			}
		}
	});
}

function ubahdarah() {
	modalload();
	$.ajax({
		url: siteURL + "/uri/kelolaformdarah",
		type: "GET",
		success: function (ajaxData){
			$("#formdarah").html(ajaxData);
			modalloadtutup();
		},
		error: function (ajaxData) {
			modalloadtutup();
		}
	});
}

function ubahdarahedit(id) {
	modalload();
	$.ajax({
		url: siteURL + "/uri/kelolaformdarahedit",
		type: "GET",
		data : {id: id},
		success: function (ajaxData){
			$("#formdarah").html(ajaxData);
			modalloadtutup();
		},
		error: function (ajaxData) {
			modalloadtutup();
		}
	});
}

function ubahdatadarah(id) {
	modalload();
	var notrans = document.getElementById("notrans").value;
	var drtgl = document.getElementById("drtgl").value;
	var drjml = document.getElementById("drjml").value;
	var drgol = $("#drgol").val();
	var unit = $("#unitselect").val();
	var unittext = $("#unitselect option:selected").text();
	var drhdiskon = document.getElementById("drhdiskon").value;
	var drhumum = $("#drhumum").prop('checked');
	if ((drtgl == "") || (drjml == "") || (drgol == "")) {
		modalloadtutup();
		kuranglengkap();
		return;
	}
	$.ajax({
		url: siteURL + "/uri/layanandarahubah",
		type: "GET",
		data : {
			id: id,
			notrans: notrans,
			drtgl: drtgl,
			drjml: drjml,
			drgol: drgol,
			unit: unit,
			unittext: unittext,
			drhdiskon : drhdiskon,
			drhumum : drhumum
		},
		success: function (ajaxData){
			var t = $.parseJSON(ajaxData);
			if (t.stat == true) {
				tdsuksesalert(1);
				$("#tabelkantung tbody tr").remove();
				$("#tabelkantung tbody").append(t.dtview);
				$("#formdarah").html(t.formnya);
				modalloadtutup();
			} else {
				tdgagalalert();
				modalloadtutup();
			}
		},
		error: function (ajaxData) {
			tdgagalalert();
			modalloadtutup();
		}
	});
}

function hapusdatadarah(e, id) {
	var txt = $(e).parents('tr').find("td:eq(0)").text();
	$.confirm({
		title: 'Hapus Data',
		content: 'Yakin mengahapus data ke-' + txt + '?',
		buttons: {
			batal: {
				text: 'Batal',
				btnClass: 'btn-red',
				action: function(){
					
				}
			},
			hapus: {
				text: 'Hapus',
				btnClass: 'btn-blue',
				keys: ['enter'],
				action: function(){
					var unit = $("#unitselect").val();
					var unittext = $("#unitselect option:selected" ).text();
					var notrans = document.getElementById("notrans").value;
					$.ajax({
						url: siteURL + "/uri/layanandarahhapus",
						type: "GET",
						data : {
							id: id,
							notrans: notrans,
							unit: unit,
							unittext: unittext
						},
						success: function (ajaxData){
							var t = $.parseJSON(ajaxData);
							if (t.stat == true) {
								tdsuksesalert(2);
								$("#tabelkantung tbody tr").remove();
								$("#tabelkantung tbody").append(t.dtview);
								modalloadtutup();
							} else {
								tdgagalalert();
								modalloadtutup();
							}
						},
						error: function (ajaxData) {
							tdgagalalert();
							modalloadtutup();
						}
					});
				}
			}
		}
	});
}

function pasienkembali(e, id) {
	var txt = $(e).parents('tr').find("td:eq(1)").text();
	$.confirm({
		title: 'Kembalikan Pasien',
		content: 'Yakin Pasien dari Unit ' + txt + ' Dikembalikan?',
		buttons: {
			batal: {
				text: 'Batal',
				btnClass: 'btn-red',
				action: function(){
					
				}
			},
			kembali: {
				text: 'Kembalikan',
				btnClass: 'btn-blue',
				keys: ['enter'],
				action: function(){
					var unit = $("#unitselect").val();
					var unittext = $("#unitselect option:selected" ).text();
					var notrans = document.getElementById("notrans").value;
					$.ajax({
						url: siteURL + "/kelolapasien/kembalikanpasieninap",
						type: "GET",
						data : {
							id: id,
							notrans: notrans,
							unit: unit,
							unittext: unittext
						},
						success: function (ajaxData){
							var t = $.parseJSON(ajaxData);
							if (t.stat == true) {
								pkembali();
								$("#tabelhistory tbody tr").remove();
								$("#tabelhistory tbody").append(t.dtview);
								modalloadtutup();

								tutupmodal();
								document.getElementById("caridata").click();
							} else {
								$.notify("Pasien tidak dizinkan dikembalikan, karena sudah diberi tindakan", "error");
								modalloadtutup();
							}
						},
						error: function (ajaxData) {
							tdgagalalert();
							modalloadtutup();
						}
					});
				}
			}
		}
	});
}

function pasienpulang(e, id) {
	$.ajax({
		url: siteURL + "/uri/cekdiagnosanya",
		type: "GET",
		data : {
			id: id,			
		},
		success: function (ajaxData){
			// alert('nilai cek diag : '+ ajaxData);
			if (ajaxData == 1) {
				var txt = $(e).parents('tr').find("td:eq(1)").text();
				$.confirm({
					onOpen: function(){
						$('#datepicker').datepicker({
							autoclose: true,
							autoclose: true,
							dateFormat: 'dd-mm-yy',
							changeMonth: true,
							changeYear: true,
							yearRange: "-100:+00"
						}).datepicker("setDate", "0");
						$('#waktu').timepicker({
							showInputs: false,
							minuteStep: 1,
							showMeridian: false
						});
					},
					onClose: function(){
						$("#datepicker").datepicker("destroy");
						
					},
					title: 'Pasien Pulang',
					content: '<form action="">' +
					'<div class="form-group">' +
					'<label col-sm-3 control-label>Tanggal</label>' +
					'<input type="text" class="col-sm-9 form-control" id="datepicker" required />' +
					'</div>' +
					'<div class="form-group">' +
					'<label col-sm-3 control-label>Jam</label>' +
					'<div class="bootstrap-timepicker"><input type="text" class="col-sm-9 form-control" id="waktu" required />' +
					'</div></div>' +
					'<div class="form-group">' +
					'<label col-sm-3 control-label>Kondisi Keluar</label>' +
					'<select name="kk" id="kk" class="col-sm-9 form-control">' +
					kdkeluar +
					'</select>' +
					'</div>' +
					'<div class="form-group">' +
					'<label col-sm-3 control-label>Kondisi Berkas RM</label>' +
					'<select name="rm" id="rm" class="col-sm-9 form-control">' +
					kdkeluarrm +
					'</select>' +
					'</div>' +
					'<div class="form-group">' +
					'<label col-sm-3 control-label>Cara Keluar</label>' +
					'<select name="ck" id="ck" class="col-sm-9 form-control">' +
					crkeluar +
					'</select>' +
					'</div>' +
					'</form>',
					buttons: {
						batal: {
							text: 'Batal',
							btnClass: 'btn-red',
							action: function(){
								
							}
						},
						pulang: {
							text: 'Pulang',
							btnClass: 'btn-blue',
							keys: ['enter'],
							action: function(){
								var unit = $("#unitselect").val();
								var unittext = $("#unitselect option:selected" ).text();
								var notrans = document.getElementById("notrans").value;
								var datepicker = document.getElementById("datepicker").value;
								var waktu = document.getElementById("waktu").value;
								var kk = document.getElementById("kk").value;
								var rm = document.getElementById("rm").value;
								var ck = document.getElementById("ck").value;
								$.ajax({
									url: siteURL + "/kelolapasien/pulangkanpasieninap",
									type: "GET",
									data : {
										id: id,
										notrans: notrans,
										unit: unit,
										unittext: unittext,
										datepicker: datepicker,
										waktu: waktu,
										kk: kk,
										rm: rm,
										ck: ck
									},
									success: function (ajaxData){
										var t = $.parseJSON(ajaxData);
										if (t.stat == true) {
											ppulang();
											$("#tabelhistory tbody tr").remove();
											$("#tabelhistory tbody").append(t.dtview);
			
											$("#barispasien tbody tr").remove();
											$("#barispasien tbody").append(t.dtviewuri);
			
											modalloadtutup();
											// modaltutupproses();
											tutupmodal();
			
										} else {
											tdgagalalert();
											modalloadtutup();
										}
									},
									error: function (ajaxData) {
										tdgagalalert();
										modalloadtutup();
									}
								});
							}
						}
					}
				});
				
			} else {
				// alert('Belum isi Diagnosa');
				tdgagalalert_diag();
				// swal("Belum Isi Diagnosa");
				modalloadtutup();
			}
		},
		error: function (ajaxData) {
			tdgagalalert();
			modalloadtutup();
		}
	});
}

function cekdiagnosa(id) {
	$.ajax({
		url: siteURL + "/uri/cekdiagnosanya",
		type: "GET",
		data : {
			id: id,			
		},
		success: function (ajaxData){
			alert('nilai cek diag : '+ ajaxData);
            if (ajaxData == 1) {
                tdsuksesalert(0);
				
            } else {
				alert('belum isi diag');
				
				tdgagalalert();
				modalloadtutup();
				// return 0;
            }
		},
		error: function (ajaxData) {
			tdgagalalert();
			modalloadtutup();
			// return 0;
		}
	});

}


function pasienrujukanhapus(e, id) {
	var txt = $(e).parents('tr').find("td:eq(1)").text();
	$.confirm({
		title: 'Kembalikan Pasien',
		content: 'Yakin Pasien dari Unit ' + txt + ' Dihapus?',
		buttons: {
			batal: {
				text: 'Batal',
				btnClass: 'btn-red',
				action: function(){

				}
			},
			kembali: {
				text: 'Hapus',
				btnClass: 'btn-blue',
				keys: ['enter'],
				action: function(){
					$.ajax({
						url: siteURL + "/kelolapasien/hapusrujukanpasien",
						type: "GET",
						data : {
							id: id
						},
						success: function (ajaxData){
							var t = $.parseJSON(ajaxData);
							if (t.stat == true) {
								$.notify("Sukses menghapus data", "success");
								$("#tabelrujukan tbody tr").remove();
								$("#tabelrujukan tbody").append(t.dtview);
								modalloadtutup();
							} else {
								$.notify("Data tidak dizinkan dihapus", "error");
								modalloadtutup();
							}
						},
						error: function (ajaxData) {
							tdgagalalert();
							modalloadtutup();
						}
					});
				}
			}
		}
	});
}

function pasienrujukanpulang(e, id) {
	var txt = $(e).parents('tr').find("td:eq(1)").text();
	$.confirm({
		onOpen: function(){
			$('#datepicker').datepicker({
                autoclose: true,
				autoclose: true,
				dateFormat: 'dd-mm-yy',
				changeMonth: true,
				changeYear: true,
				yearRange: "-100:+00"
            }).datepicker("setDate", "0");
			$('#waktu').timepicker({
				showInputs: false,
				minuteStep: 1,
				showMeridian: false
			});
		},
		onClose: function(){
			$("#datepicker").datepicker("destroy");

		},
		title: 'Pasien Pulang',
		content: '<form action="">' +
			'<div class="form-group">' +
			'<label col-sm-3 control-label>Tanggal</label>' +
			'<input type="text" class="col-sm-9 form-control" id="datepicker" required />' +
			'</div>' +
			'<div class="form-group">' +
			'<label col-sm-3 control-label>Jam</label>' +
			'<div class="bootstrap-timepicker"><input type="text" class="col-sm-9 form-control" id="waktu" required />' +
			'</div></div>' +
			'<div class="form-group">' +
			'<label col-sm-3 control-label>Kondisi Keluar</label>' +
			'<select name="kk" id="kk" class="col-sm-9 form-control">' +
			kdkeluar +
			'</select>' +
			'</div>' +
			'<div class="form-group">' +
			'<label col-sm-3 control-label>Kondisi Berkas RM</label>' +
			'<select name="rm" id="rm" class="col-sm-9 form-control">' +
			kdkeluarrm +
			'</select>' +
			'</div>' +
			'<div class="form-group">' +
			'<label col-sm-3 control-label>Cara Keluar</label>' +
			'<select name="ck" id="ck" class="col-sm-9 form-control">' +
			crkeluar +
			'</select>' +
			'</div>' +
			'</form>',
		buttons: {
			batal: {
				text: 'Batal',
				btnClass: 'btn-red',
				action: function(){

				}
			},
			pulang: {
				text: 'Pulang',
				btnClass: 'btn-blue',
				keys: ['enter'],
				action: function(){
					var unit = $("#unitselect").val();
					var unittext = $("#unitselect option:selected" ).text();
					var notrans = document.getElementById("notrans").value;
					var datepicker = document.getElementById("datepicker").value;
					var waktu = document.getElementById("waktu").value;
					var kk = document.getElementById("kk").value;
					var rm = document.getElementById("rm").value;
					var ck = document.getElementById("ck").value;
					$.ajax({
						url: siteURL + "/kelolapasien/pulangkanrujukanpasien",
						type: "GET",
						data : {
							id: id,
							notrans: notrans,
							unit: unit,
							unittext: unittext,
							datepicker: datepicker,
							waktu: waktu,
							kk: kk,
							rm: rm,
							ck: ck
						},
						success: function (ajaxData){
							var t = $.parseJSON(ajaxData);
							if (t.stat == true) {
								ppulang();
								$("#tabelrujukan tbody tr").remove();
								$("#tabelrujukan tbody").append(t.dtview);
								modalloadtutup();
							} else {
								tdgagalalert();
								modalloadtutup();
							}
						},
						error: function (ajaxData) {
							tdgagalalert();
							modalloadtutup();
						}
					});
				}
			}
		}
	});
}

function kirimisntalasi() {
	modalload();
	var irm = document.getElementById("irm").value;
	var inp = document.getElementById("inp").value;
	var notrans = document.getElementById("notrans").value;
    var idokter = document.getElementById("sdhdokterkode").value;
    var idoktertext = document.getElementById("sdhdokter").value;
    var unit = $("#unitselect").val();
    var icatatan = $("#icatatan").val();
    var unittext = $("#unitselect option:selected" ).text();
	var iunit = $("#iunit").val();
	var iunittext = $("#iunit option:selected" ).text();
	var instgl = document.getElementById("instgl").value;

	if ((instgl == "") || (icatatan == "")) {
		modalloadtutup();
		kuranglengkap();
		return;
	}
	$.ajax({
		url: siteURL + "/uri/simpankiriminstalasi",
		type: "GET",
		data : {
			inp: inp,
			irm: irm,
			idokter: idokter, 
			idoktertext: idoktertext, 
			iunit: iunit, 
			iunittext: iunittext, 
			notrans: notrans,
			unit: unit,
			unittext: unittext,
			icatatan: icatatan,
			instgl: instgl
		},
		success: function (ajaxData){
			var t = $.parseJSON(ajaxData);
            if (t.stat == true) {
                tdsuksesalert(0);
                $("#tabelinst tbody tr").remove();
                $("#tabelinst tbody").append(t.dtview);
                modalloadtutup();
            } else {
                $("#tdinfox div").remove();
                tdgagalalert();
                modalloadtutup();
            }
		},
		error: function (ajaxData) {
			tdgagalalert();
			modalloadtutup();
		}
	});
}

function hapusinst(e, id) {
    var txt = $(e).parents('tr').find("td:eq(1)").text();
    $.confirm({
        title: 'Hapus Data',
        content: 'Yakin Pasien dari Unit ' + txt + ' Dihapus?',
        buttons: {
            batal: {
                text: 'Batal',
                btnClass: 'btn-red',
                action: function () {

                }
            },
            kembali: {
                text: 'Hapus',
                btnClass: 'btn-blue',
                keys: ['enter'],
                action: function () {
                    var unit = $("#unitselect").val();
                    var unittext = $("#unitselect option:selected").text();
                    var notrans = document.getElementById("notrans").value;
                    $.ajax({
                        url: siteURL + "/uri/hapuskiriminstalasi",
                        type: "GET",
                        data: {
                            id: id,
                            notrans: notrans,
                            unit: unit,
                            unittext: unittext
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
                        }
                    });
                }
            }
        }
    });
}


//untuk resep

function kebutuhanresep() {
	$('#obattgl').datepicker({
                autoclose: true,
				autoclose: true,
				dateFormat: 'dd-mm-yy',
				changeMonth: true,
				changeYear: true,
				yearRange: "-100:+00"
            }).datepicker("setDate", "0");
	$('#obatobat').select2();
	$('#dosis').select2();

}

function kebutuhandokterresep() {
	// $('#dtgl').datepicker().datepicker("setDate", "0");
	$('#ddokterresep').select2();
}

function simpandataobat() {
	modalload();
	var norep = document.getElementById("norep").value;
	var irm = document.getElementById("irm").value;
	var notrans = document.getElementById("notrans").value;
	var obattgl = document.getElementById("pktglobat").value;
	var unit = $("#unitselect").val();
	var unittext = $("#unitselect option:selected").text();
	// var kode_dokter = document.getElementById("ddokterresep").value;
	// var nama_dokter = document.getElementById("tddokter").value;
	var kode_dokter = $("#ddokterresep").val();
	var nama_dokter = $("#ddokterresep option:selected" ).text();
	var golongan = document.getElementById("tdgolongan").value;
	var nama_umum = document.getElementById("inp").value;
	var obatobat = $("#obatobat").val();
	var obatobattext = $("#obatobat option:selected" ).text();
	var obatqty = document.getElementById("obatqty").value;
	var obatstauan = document.getElementById("obatstauan").value;
	var obatharga = document.getElementById("obatharga").value;
	var dosis = $("#dosis option:selected" ).text();
	var catatanresep = document.getElementById("catatanresep").value;
    // var x = document.getElementById("Btn").value;
    // x.disabled = true;
	if ((obattgl == "") || (obatobat == "") || (obatqty == "") || (obatstauan == "") || (obatharga == "")) {
		modalloadtutup();
		kuranglengkap();
		return;
	}
	$.ajax({
		url: siteURL + "/uri/layananobat",
		type: "GET",
		data : {
			norep : norep,
			irm  : irm,
			notrans: notrans,
			obattgl: obattgl, 
			obatobat: obatobat,
			obatobattext: obatobattext,
			unit: unit,
			unittext: unittext,
			obatqty: obatqty,
			obatstauan: obatstauan,
			obatharga: obatharga,
			dosis : dosis,
			kode_dokter : kode_dokter,
			golongan : golongan,
			nama_dokter : nama_dokter,
			nama_umum : nama_umum,
			catatanresep : catatanresep
		},
		success: function (ajaxData){
			var t = $.parseJSON(ajaxData);
			if (t.stat == true) {
				tdsuksesalert(0);
				$("#tabelobat tbody tr").remove();
				$("#tabelobat tbody").append(t.dtview);
				$("#norep").val(t.noresep);
				modalloadtutup();
			} else {
				tdgagalalert();
				modalloadtutup();
			}
		},
		error: function (ajaxData) {
			tdgagalalert();
			modalloadtutup();
		}
	});
}

function ubahdataobat(){

}

function hapusdataobat(e, id) {
	var txt = $(e).parents('tr').find("td:eq(0)").text();
	// console.log('masuk');
	$.confirm({
		title: 'Hapus Data',
		content: 'Yakin mengahapus data ke-' + txt + '?',
		buttons: {
			batal: {
				text: 'Batal',
				btnClass: 'btn-red',
				action: function(){
					
				}
			},
			hapus: {
				text: 'Hapus',
				btnClass: 'btn-blue',
				keys: ['enter'],
				action: function(){
					var unit = $("#unitselect").val();
					var unittext = $("#unitselect option:selected" ).text();
					var notrans = document.getElementById("notrans").value;
					$.ajax({
						url: siteURL + "/uri/layananobathapus",
						type: "GET",
						data : {
							id: id,
							notrans: notrans,
							unit: unit,
							unittext: unittext
						},
						success: function (ajaxData){
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
						}
					});
				}
			}
		}
	});
}

function kebutuhandiagnosa() {
	$('#diag').select2({
		tags: true
	})
}
