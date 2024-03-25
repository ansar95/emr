function modalload() {
	$("#proseskotak").append('<div id="oload" class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
}

function modalloadtutup() {
	$("#oload").remove();
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
	$.notify("Belum Isi Diagnosa", "error");
}

function kuranglengkap() {
	$.notify("Data Tidak Lengkap", "error");
}

function pkembali() {
	$.notify("Pasien dikembalikan ke Unit sebelumnya", "success");
}

function ppulang() {
	$.notify("Pasien Telah Pulang", "success");
}

function kebutuhantindakan() {
	//$('#tdtgl').datepicker().datepicker("setDate", "0");
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
	$('#pkunit').select2();
    $('#kamar').select2();
});


function tdtindakan() {
    var tpp = $("#tdtindakan").val();
    $.ajax({
        url: siteURL + "/ugd/untukpilihantindakan",
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

	if ((tdtgl == "") || (tdjam == "") || (tddokter == "") || (tdtindakan == "") || (tdjml == "")) {
		modalloadtutup();
		kuranglengkap();
		return;
	}
	$.ajax({
		url: siteURL + "/ugd/layanantindakan",
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
		},
		success: function (ajaxData){
			var t = $.parseJSON(ajaxData);
			
			if (t.stat == true) {
				$("#tdinfox div").remove();
				tdsuksesalert(0);
				$("#tabeltindakan tbody tr").remove();
				$("#tabeltindakan tbody").append(t.dtview);
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
		url: siteURL + "/ugd/layananbhp",
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
				$("#bhpinfox div").remove();
				tdsuksesalert(0);
				$("#tabelbhp tbody tr").remove();
				$("#tabelbhp tbody").append(t.dtview);
				modalloadtutup();
			} else {
				$("#bhpinfox div").remove();
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

	if ((otgl == "") || (ojam == "") || (ojml == "")) {
		modalloadtutup();
		kuranglengkap();
		return;
	}
	$.ajax({
		url: siteURL + "/ugd/layananodua",
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
				$("#oduainfox div").remove();
				tdsuksesalert(0);
				$("#tabelodua tbody tr").remove();
				$("#tabelodua tbody").append(t.dtview);
				modalloadtutup();
			} else {
				$("#oduainfox div").remove();
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
		url: siteURL + "/ugd/layanandokter",
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
				$("#dinfox div").remove();
				tdsuksesalert(0);
				$("#tabeldokter tbody tr").remove();
				$("#tabeldokter tbody").append(t.dtview);
				modalloadtutup();
			} else {
				$("#dinfox div").remove();
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
		url: siteURL + "/ugd/layanandarah",
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
				$("#kinfox div").remove();
				tdsuksesalert(0);
				$("#tabelkantung tbody tr").remove();
				$("#tabelkantung tbody").append(t.dtview);
				modalloadtutup();
			} else {
				$("#kinfox div").remove();
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
	var pkunittext = $("#pkunit option:selected").text();
    var kamar = $("#kamar").val();
    var kamartext = $("#kamar option:selected").text();
	if ((pktgl == "") || (pkjam == "") || (pkunit == "")) {
		modalloadtutup();
		kuranglengkap();
		return;
	}
	$.ajax({
		url: siteURL + "/ugd/layananpindahkamar",
		type: "GET",
		data : {
			notrans: notrans,
			pktgl: pktgl,
			pkjam: pkjam,
			pkunit: pkunit,
			pkunittext: pkunittext,
            kamar: kamar,
            kamartext: kamartext
		},
		success: function (ajaxData){
			var t = $.parseJSON(ajaxData);
			if (t.stat == true) {
				tdsuksesalert(0);
				$("#tabelhistory tbody tr").remove();
				$("#tabelhistory tbody").append(t.dtview);
				if (t.pindah == "0") {
					$('#btnPindahSimpan').attr("oncLick", "simpandatatindakan()");
				} else {
					$('#btnPindahSimpan').attr("oncLick", "");
					$('#btnPindahSimpan').attr("disabled", "");
				}
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

function ubahtindakan() {
	modalload();
	$.ajax({
		url: siteURL + "/ugd/kelolaformtindakan",
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
		url: siteURL + "/ugd/kelolaformtindakanedit",
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
		kuranglengkap();
		return;
	}
	$.ajax({
		url: siteURL + "/ugd/layanantindakanubah",
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
				tdsuksesalert(1);
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
						url: siteURL + "/ugd/layanantindakanhapus",
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
		url: siteURL + "/ugd/kelolaformbhp",
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
		url: siteURL + "/ugd/kelolaformbhpedit",
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
		url: siteURL + "/ugd/layananbhpubah",
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
						url: siteURL + "/ugd/layananbhphapus",
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
		url: siteURL + "/ugd/kelolaformodua",
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
		url: siteURL + "/ugd/kelolaformoduaedit",
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
		url: siteURL + "/ugd/layananoduaubah",
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
						url: siteURL + "/ugd/layananoduahapus",
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
		url: siteURL + "/ugd/kelolaformdokter",
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
		url: siteURL + "/ugd/kelolaformdokteredit",
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
		url: siteURL + "/ugd/layanandokterubah",
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
						url: siteURL + "/ugd/layanandokterhapus",
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
		url: siteURL + "/ugd/kelolaformdarah",
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
		url: siteURL + "/ugd/kelolaformdarahedit",
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
		url: siteURL + "/ugd/layanandarahubah",
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
						url: siteURL + "/ugd/layanandarahhapus",
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
						url: siteURL + "/kelolapasien/kembalikanpasien",
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
	// alert(id);
	$.ajax({
		url: siteURL + "/urj/cekdiagnosanya",
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
									url: siteURL + "/kelolapasien/pulangkanpasien",
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
			} else {
				// alert('Belum isi Diagnosa');
				// swal("Belum Isi Diagnosa");
				tdgagalalert_diag();
				modalloadtutup();
			}
		},
		error: function (ajaxData) {
			tdgagalalert();
			modalloadtutup();
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
	$.ajax({
		url: siteURL + "/ugd/simpankiriminstalasi",
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

function carikamar() {
    var pkunit = $("#pkunit").val();
    $.ajax({
        url: siteURL + "/ugd/ambilpindahkamar",
        type: "GET",
        data : {pkunit: pkunit},
    }).then(function (data) {
        $("#kamar option").remove();
        var t = JSON.parse(data);
        var op = new Option("-Pilih-", "-", true, true);
        $('#kamar').append(op).trigger('change');
        t.forEach(function(entry) {
            var option = new Option(entry.nama_kamar, entry.kode_kamar, false, false);
            $('#kamar').append(option).trigger('change');
        });
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
                action: function(){

                }
            },
            kembali: {
                text: 'Hapus',
                btnClass: 'btn-blue',
                keys: ['enter'],
                action: function(){
                    var unit = $("#unitselect").val();
                    var unittext = $("#unitselect option:selected" ).text();
                    var notrans = document.getElementById("notrans").value;
                    $.ajax({
                        url: siteURL + "/ugd/hapuskiriminstalasi",
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

//---untuk resep

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
			console.log(t);
			if (t.stat == true) {
				tdsuksesalert(0);
				$("#tabelobat tbody tr").remove();
				$("#tabelobat tbody").append(t.dtview);
				// $("#norep").val('111');
				$("#norep").val(t.noresep);

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
