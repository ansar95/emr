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

function kuranglengkap() {
	$.notify("Data Tidak Lengkap", "error");
}

function pkembali() {
	$.notify("Pasien dikembalikan ke Unit sebelumnya", "success");
}

function ppulang() {
	$.notify("Pasien Telah Pulang", "success");
}

function kebutuhantindakanbsr() {
	// $("#bsdokter").prop("disabled", true);
	// $("#bsbidan").prop("disabled", true);
	// $('#bstgl').datepicker({ autoclose: true }).datepicker("setDate", "0");
    $("#bstgl").datepicker({autoclose: true,autoclose: true,dateFormat: "dd-mm-yy",changeMonth: true,changeYear: true,yearRange: "-100:+00",}).datepicker("setDate", "0");
	// $('#tindakantgl').datepicker({ autoclose: true }).datepicker("setDate", "0");
    $("#tindakantgl").datepicker({autoclose: true,autoclose: true,dateFormat: "dd-mm-yy",changeMonth: true,changeYear: true,yearRange: "-100:+00",}).datepicker("setDate", "0");

	$('#bstindakan').select2();
	$('#tdtindakanopr').select2();
	$('#bsdokter').select2();
	$('#bsbidan').select2();
	$('#bsspe').select2();
	$('#bsanastesi').select2();
    $('#bsperawat').select2();
}

function kebutuhantindakan() {
	// $('#tdtgl').datepicker({ autoclose: true }).datepicker("setDate", "0");
    $("#tdtgl").datepicker({autoclose: true,autoclose: true,dateFormat: "dd-mm-yy",changeMonth: true,changeYear: true,yearRange: "-100:+00",}).datepicker("setDate", "0");

	$('#tdwaktu').timepicker({
		showInputs: false,
		minuteStep: 1,
		showMeridian: false
	});
    
	$('#tddokter').select2();
	$('#tdtindakan').select2();
    $('#tdperawat').select2();
}

function kebutuhanbhp() {
    $("#bhptgl").datepicker({autoclose: true,autoclose: true,dateFormat: "dd-mm-yy",changeMonth: true,changeYear: true,yearRange: "-100:+00",}).datepicker("setDate", "0");

	$('#bhpbhp').select2();
}

function kebutuhanodua() {
    $("#otgl").datepicker({autoclose: true,autoclose: true,dateFormat: "dd-mm-yy",changeMonth: true,changeYear: true,yearRange: "-100:+00",}).datepicker("setDate", "0");

	$('#ojam').timepicker({
		showInputs: false,
		minuteStep: 1,
		showMeridian: false
	});
}

function kebutuhandokter() {
    $("#dtgl").datepicker({autoclose: true,autoclose: true,dateFormat: "dd-mm-yy",changeMonth: true,changeYear: true,yearRange: "-100:+00",}).datepicker("setDate", "0");

	$('#djam').timepicker({
		showInputs: false,
		minuteStep: 1,
		showMeridian: false
	});
	$('#ddokter').select2();
	$('#dvisit').select2();
}

function kebutuhandarah() {
    $("#drtgl").datepicker({autoclose: true,autoclose: true,dateFormat: "dd-mm-yy",changeMonth: true,changeYear: true,yearRange: "-100:+00",}).datepicker("setDate", "0");

	$('#drgol').select2();
}

function kebutuhanoperasi() {
    $('#tddokteropr').select2();
    $('#tddokterdua').select2();
    $('#tddoktertiga').select2();
    $('#tdspesialis').select2();
    $('#tdanak').select2();
    $('#tdpenata').select2();
    $('#tdperawatsatu').select2();
    $('#tdperawatdua').select2();
}

$(function () {
	kebutuhantindakanbsr();
	kebutuhantindakan();
	kebutuhanbhp();
	kebutuhandarah();
	kebutuhandokter();
	kebutuhanodua();
	kebutuhanresep();
	kebutuhandokterresep();
	kebutuhanoperasi();
    $("#pktgl").datepicker({autoclose: true,autoclose: true,dateFormat: "dd-mm-yy",changeMonth: true,changeYear: true,yearRange: "-100:+00",}).datepicker("setDate", "0");
    $("#pktglobat").datepicker({autoclose: true,autoclose: true,dateFormat: "dd-mm-yy",changeMonth: true,changeYear: true,yearRange: "-100:+00",}).datepicker("setDate", "0");
	$('#pkjam').timepicker({
		showInputs: false,
		minuteStep: 1,
		showMeridian: false
	});
	$('#pkunit').select2();
    $('#kamar').select2();
	// $('#tgllahir').datepicker({ autoclose: true }).datepicker("setDate", "0");
    $("#tgllahir").datepicker({autoclose: true,autoclose: true,dateFormat: "dd-mm-yy",changeMonth: true,changeYear: true,yearRange: "-100:+00",}).datepicker("setDate", "0");

	$('#jamlahir').timepicker({
		showInputs: false,
		minuteStep: 1,
		showMeridian: false
	});
});

function gantibidandokter() {
	var pil = $("input[name='pilihan']:checked").val();
	console.log(pil);
	if (pil == "dokter") {
		$("#bsdokter").prop("disabled", false);
		$("#bsbidan").prop("disabled", true);
	} else if (pil == "bidan") {
		$("#bsdokter").prop("disabled", true);
		$("#bsbidan").prop("disabled", false);
	}
}

function bhpbhp() {
	var tpp = $("#bhpbhp").val();
	$.ajax({
		url: siteURL + "/ibersalin/untukpilihanbihp",
		type: "GET",
		data : {bhp: tpp},
	}).then(function (data) {
		$("#bhpstauan").val('');
		$("#bhpharga").val('');
		var t = JSON.parse(data);
		$("#bhpstauan").val(t.satuanpakai);
		$("#bhpharga").val(t.hargapakai);
	});
}

function simpandatatindakanbersalin() {
	modalload();
	var notrans = document.getElementById("notrans").value;
	var bstgl = document.getElementById("bstgl").value;
	var bstindakan = $("#bstindakan").val();
	var bstindakantext = $("#bstindakan option:selected" ).text();
    var bsdiskon = document.getElementById("bsdiskon").value;
    var bsumum = $("input[name='bsumum']:checked").val();
	var pil = $("input[name='pilihan']:checked").val();
	var bsdokter = $("#bsdokter").val();
	var bsdoktertext = $("#bsdokter option:selected" ).text();
	var bsbidan = $("#bsbidan").val();
	var bsbidantext = $("#bsbidan option:selected" ).text();
	var bsspe = $("#bsspe").val();
	var bsspetext = $("#bsspe option:selected" ).text();
	var bsanastesi = $("#bsanastesi").val();
	var bsanastesitext = $("#bsanastesi option:selected" ).text();
	var unit = $("#unitselect").val();
	var unittext = $("#unitselect option:selected" ).text();
    var bsperawat = $("#bsperawat").val();
    var bsperawattext = $("#bsperawat option:selected" ).text();
    var bscat = $("#bscatatan").val();
	if ((bstgl == "") || (bstindakan == "")) {
		modalloadtutup();
		kuranglengkap();
		return;
	}
	$.ajax({
		url: siteURL + "/ibersalin/layanantindakanbersalin",
		type: "GET",
		data : {
			notrans: notrans, 
			bstgl: bstgl, 
			bstindakan: bstindakan, 
			bstindakantext: bstindakantext,
            bsdiskon: bsdiskon,
            bsumum: bsumum,
			pil: pil, 
			bsdokter: bsdokter, 
			bsdoktertext: bsdoktertext,
			bsbidan: bsbidan,
			bsbidantext: bsbidantext,
			bsspe: bsspe,
			bsspetext: bsspetext,
			bsanastesi: bsanastesi,
			bsanastesitext: bsanastesitext,
			unit: unit,
			unittext: unittext,
            tdperawat: bsperawat,
            tdperawattext: bsperawattext,
            cat: bscat
		},
		success: function (ajaxData){
			var t = $.parseJSON(ajaxData);
			if (t.stat == true) {
				tdsuksesalert();
				$("#tabeltindakanbersalin tbody tr").remove();
				$("#tabeltindakanbersalin tbody").append(t.dtview);
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

function simpandatatindakan() {
	modalload();
	var notrans = document.getElementById("notrans").value;
	var tdtgl = document.getElementById("tdtgl").value;
	var tdjam = document.getElementById("tdwaktu").value;
	var tddokter = $("#tddokter").val();
	var tddoktertext = $("#tddokter option:selected" ).text();
	var tdtindakan = $("#tdtindakan").val();
	var tdtindakantext = $("#tdtindakan option:selected" ).text();
	var unit = $("#unitselect").val();
	var unittext = $("#unitselect option:selected" ).text();
	var tdjml = document.getElementById("tdjml").value;
	var tdrawat = $("#tdperawatsaja").prop('checked');
    var tdperawat = $("#tdperawat").val();
    var tdperawattext = $("#tdperawat option:selected" ).text();
    var cat = $("#catatan").val();
	var tddiskon = document.getElementById("tddiskon").value;
	var tdumum = $("#tdumum").prop('checked');
	if ((tdtgl == "") || (tdjam == "") || (tddokter == "") || (tdtindakan == "") || (tdjml == "")) {
		modalloadtutup();
		kuranglengkap();
		return;
	}
	$.ajax({
		url: siteURL + "/ibersalin/layanantindakan",
		type: "GET",
		data : {
			tdtgl: tdtgl, 
			tdjam: tdjam, 
			tddokter: tddokter, 
			tdtindakan: tdtindakan, 
			tdjml: tdjml, 
			tdrawat: tdrawat, 
			notrans: notrans,
			tddoktertext: tddoktertext,
			tdtindakantext: tdtindakantext,
			unit: unit,
			unittext: unittext,
            tdperawat: tdperawat,
            tdperawattext: tdperawattext,
            cat: cat,
			tddiskon : tddiskon,
			tdumum : tdumum
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

	if ((bhptgl == "") || (bhpbhp == "") || (bhpqty == "") || (bhpstauan == "") || (bhpharga == "")) {
		modalloadtutup();
		kuranglengkap();
		return;
	}
	$.ajax({
		url: siteURL + "/ibersalin/layananbhp",
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
			bhpharga: bhpharga
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
	if ((otgl == "") || (ojam == "") || (ojml == "")) {
		modalloadtutup();
		kuranglengkap();
		return;
	}
	$.ajax({
		url: siteURL + "/ibersalin/layananodua",
		type: "GET",
		data : {
			notrans: notrans,
			otgl: otgl,
			ojam: ojam,
			unit: unit,
			unittext: unittext,
			ojml: ojml
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
	if ((dtgl == "") || (djam == "") || (ddokter == "") || (dvisit == "")) {
		modalloadtutup();
		kuranglengkap();
		return;
	}
	$.ajax({
		url: siteURL + "/ibersalin/layanandokter",
		type: "GET",
		data : {
			notrans: notrans,
			dtgl: dtgl,
			djam: djam,
			ddokter: ddokter,
			ddoktertext: ddoktertext,
			unit: unit,
			unittext: unittext,
			dvisit: dvisit
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
	if ((drtgl == "") || (drjml == "") || (drgol == "")) {
		modalloadtutup();
		kuranglengkap();
		return;
	}
	$.ajax({
		url: siteURL + "/ibersalin/layanandarah",
		type: "GET",
		data : {
			notrans: notrans,
			drtgl: drtgl,
			drjml: drjml,
			drgol: drgol,
			unit: unit,
			unittext: unittext
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
    document.querySelector('#btnPindahSimpan').disabled = true;
    // $('#btnPindahSimpan').disabled = true;
    
	if ((tdtgl == "") || (pkjam == "") || (pkunit == "")) {
		modalloadtutup();
		kuranglengkap();
		return;
	}
	$.ajax({
		url: siteURL + "/ibersalin/layananpindahkamar",
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
				modalloadtutup();
				tutupmodal();
				document.getElementById("caridata").click();
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

function ubahtindakanbsr() {
	modalload();
	$.ajax({
		url: siteURL + "/ibersalin/kelolaformtindakanbsr",
		type: "GET",
		success: function (ajaxData){
			$("#formbsr").html(ajaxData);
			modalloadtutup();
		},
		error: function (ajaxData) {
			modalloadtutup();
		}
	});
}

function ubahtindakanbsredit(id) {
	modalload();
	$.ajax({
		url: siteURL + "/ibersalin/kelolaformtindakanbsredit",
		type: "GET",
		data : {id: id},
		success: function (ajaxData){
			$("#formbsr").html(ajaxData);
			modalloadtutup();
		},
		error: function (ajaxData) {
			modalloadtutup();
		}
	});
}

function ubahdatatindakanbsr(id) {
	modalload();
	var notrans = document.getElementById("notrans").value;
	var bstgl = document.getElementById("bstgl").value;
	var bstindakan = $("#bstindakan").val();
	var bstindakantext = $("#bstindakan option:selected" ).text();
    var bsdiskon = document.getElementById("bsdiskon").value;
    var bsumum = $("input[name='bsumum']:checked").val();
	var pil = $("input[name='pilihan']:checked").val();
	var bsdokter = $("#bsdokter").val();
	var bsdoktertext = $("#bsdokter option:selected" ).text();
	var bsbidan = $("#bsbidan").val();
	var bsbidantext = $("#bsbidan option:selected" ).text();
	var bsspe = $("#bsspe").val();
	var bsspetext = $("#bsspe option:selected" ).text();
	var bsanastesi = $("#bsanastesi").val();
	var bsanastesitext = $("#bsanastesi option:selected" ).text();
	var unit = $("#unitselect").val();
	var unittext = $("#unitselect option:selected" ).text();
    var bsperawat = $("#bsperawat").val();
    var bsperawattext = $("#bsperawat option:selected" ).text();
    var bscat = $("#bscatatan").val();
	if ((bstgl == "") || (bstindakan == "")) {
		modalloadtutup();
		kuranglengkap();
		return;
	}
	$.ajax({
		url: siteURL + "/ibersalin/layanantindakanbsrubah",
		type: "GET",
		data : {
			id: id,
			notrans: notrans, 
			bstgl: bstgl, 
			bstindakan: bstindakan, 
			bstindakantext: bstindakantext,
            bsdiskon: bsdiskon,
            bsumum: bsumum,
			pil: pil, 
			bsdokter: bsdokter, 
			bsdoktertext: bsdoktertext,
			bsbidan: bsbidan,
			bsbidantext: bsbidantext,
			bsspe: bsspe,
			bsspetext: bsspetext,
			bsanastesi: bsanastesi,
			bsanastesitext: bsanastesitext,
			unit: unit,
			unittext: unittext,
            tdperawat: bsperawat,
            tdperawattext: bsperawattext,
            cat: bscat
		},
		success: function (ajaxData){
			console.log(ajaxData);
			var t = $.parseJSON(ajaxData);
			if (t.stat == true) {
				tdsuksesalert(1);
				$("#tabeltindakanbersalin tbody tr").remove();
				$("#tabeltindakanbersalin tbody").append(t.dtview);
				$("#formbsr").html(t.formnya);
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

function hapusdatatindakanbsr(e, id) {
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
						url: siteURL + "/ibersalin/layanantindakanbsrhapus",
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
								$("#tabeltindakanbersalin tbody tr").remove();
								$("#tabeltindakanbersalin tbody").append(t.dtview);
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

function ubahtindakan() {
	modalload();
	$.ajax({
		url: siteURL + "/ibersalin/kelolaformtindakan",
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
		url: siteURL + "/ibersalin/kelolaformtindakanedit",
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
	var tdtindakan = $("#tdtindakan").val();
	var tdtindakantext = $("#tdtindakan option:selected" ).text();
	var unit = $("#unitselect").val();
	var unittext = $("#unitselect option:selected" ).text();
	var tdjml = document.getElementById("tdjml").value;
	var tdrawat = $("#tdperawatsaja").prop('checked');
    var tdperawat = $("#tdperawat").val();
    var tdperawattext = $("#tdperawat option:selected" ).text();
	var tddiskon = document.getElementById("tddiskon").value;
	var tdumum = $("#tdumum").prop('checked');
    var cat = $("#catatan").val();
	if ((tdtgl == "") || (tdjam == "") || (tddokter == "") || (tdtindakan == "") || (tdjml == "")) {
		modalloadtutup();
		kuranglengkap();
		return;
	}
	$.ajax({
		url: siteURL + "/ibersalin/layanantindakanubah",
		type: "GET",
		data : {
			id: id,
			tdtgl: tdtgl, 
			tdjam: tdjam, 
			tddokter: tddokter, 
			tdtindakan: tdtindakan, 
			tdjml: tdjml, 
			tdrawat: tdrawat, 
			notrans: notrans,
			tddoktertext: tddoktertext,
			tdtindakantext: tdtindakantext,
			unit: unit,
			unittext: unittext,
            tdperawat: tdperawat,
            tdperawattext: tdperawattext,
			tddiskon : tddiskon,
			tdumum : tdumum,
            cat: cat
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
						url: siteURL + "/ibersalin/layanantindakanhapus",
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
		url: siteURL + "/ibersalin/kelolaformbhp",
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
		url: siteURL + "/ibersalin/kelolaformbhpedit",
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

	if ((bhptgl == "") || (bhpbhp == "") || (bhpqty == "") || (bhpstauan == "") || (bhpharga == "")) {
		modalloadtutup();
		kuranglengkap();
		return;
	}
	$.ajax({
		url: siteURL + "/ibersalin/layananbhpubah",
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
			bhpharga: bhpharga
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
						url: siteURL + "/ibersalin/layananbhphapus",
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
		url: siteURL + "/ibersalin/kelolaformodua",
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
		url: siteURL + "/ibersalin/kelolaformoduaedit",
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
	if ((otgl == "") || (ojam == "") || (ojml == "")) {
		modalloadtutup();
		kuranglengkap();
		return;
	}
	$.ajax({
		url: siteURL + "/ibersalin/layananoduaubah",
		type: "GET",
		data : {
			id: id,
			notrans: notrans,
			otgl: otgl,
			ojam: ojam,
			unit: unit,
			unittext: unittext,
			ojml: ojml
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
						url: siteURL + "/ibersalin/layananoduahapus",
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
		url: siteURL + "/ibersalin/kelolaformdokter",
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
		url: siteURL + "/ibersalin/kelolaformdokteredit",
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
	if ((dtgl == "") || (djam == "") || (ddokter == "") || (dvisit == "")) {
		modalloadtutup();
		kuranglengkap();
		return;
	}
	$.ajax({
		url: siteURL + "/ibersalin/layanandokterubah",
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
			dvisit: dvisit
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
						url: siteURL + "/ibersalin/layanandokterhapus",
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
		url: siteURL + "/ibersalin/kelolaformdarah",
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
		url: siteURL + "/ibersalin/kelolaformdarahedit",
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
	if ((drtgl == "") || (drjml == "") || (drgol == "")) {
		modalloadtutup();
		kuranglengkap();
		return;
	}
	$.ajax({
		url: siteURL + "/ibersalin/layanandarahubah",
		type: "GET",
		data : {
			id: id,
			notrans: notrans,
			drtgl: drtgl,
			drjml: drjml,
			drgol: drgol,
			unit: unit,
			unittext: unittext
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
						url: siteURL + "/ibersalin/layanandarahhapus",
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

function pasienpulang(e, id) {
	var txt = $(e).parents('tr').find("td:eq(1)").text();
	$.confirm({
		title: 'Pasien Pulang',
		content: 'Yakin data Pasien dari Unit' + txt + ' Pulang?',
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
					$.ajax({
						url: siteURL + "/kelolapasien/pulangkanpasien",
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
}

//---untuk resep

function kebutuhanresep() {
	$('#obattgl').datepicker({ autoclose: true }).datepicker("setDate", "0");
	$('#obatobat').select2();
	$('#dosis').select2();
}

function kebutuhandokterresep() {
	// $('#dtgl').datepicker({ autoclose: true }).datepicker("setDate", "0");
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
	// alert(unit+' '+kode_dokter+' '+obattgl)

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
				$("#norep").val(t.noresep);
				// console.log(norep);
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

function simpanbayi() {
	var notrans = document.getElementById("notrans").value;
	var no_rm = document.getElementById("irm").value;
	var jamlahir = document.getElementById("jamlahir").value;
	var tgllahir = document.getElementById("tgllahir").value;
	var berat = document.getElementById("berat").value;
	var panjang = document.getElementById("panjang").value;
	var jk = $("#jk").val();
	var jktext= $("#jk option:selected" ).text();
	var caralahir = $("#caralahir").val();
	var caralahirtext= $("#caralahir option:selected" ).text();
    var catatanlahir = $("#catatanlahir").val();

	if ((jamlahir == "") || (tgllahir == "") || (berat == "") || (panjang == "") || (jk == "") || (caralahir == "")) {
		modalloadtutup();
		kuranglengkap();
		return;
	}
	$.ajax({
		url: siteURL + "/ibersalin/simpanbayilahir",
		type: "GET",
		data : {
			notrans: notrans,
			no_rm: no_rm, 
			jamlahir: jamlahir, 
			tgllahir: tgllahir, 
			berat: berat, 
			panjang: panjang, 
			jk: jk, 
			jktext: jktext,
			caralahir: caralahir,
			caralahirtext: caralahirtext,
			catatanlahir: catatanlahir
		},
		success: function (ajaxData){
			var t = $.parseJSON(ajaxData);
			if (t.stat == true) {
				tdsuksesalert(1);
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

function tdtindakanopr() {
    var tppopr = $("#tdtindakanopr").val();
    $.ajax({
        url: siteURL +"/Ibersalin/untuktindakanopr",
        type: "GET",
        data: {
            kdt: tppopr
        },
    }).then(function(data) {
        $("#jasaopr").val('');
        $("#tipe").val('');
        var t = JSON.parse(data);
        $("#jasaopr").val(t.jasas);
        $("#tipe").val(t.type);
    });
}
