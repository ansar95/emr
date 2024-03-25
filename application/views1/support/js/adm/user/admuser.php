<script src="<?php echo base_url();?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="<?php echo base_url();?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script src="<?php echo base_url();?>assets/dist/js/notify.min.js"></script>
<script src="<?php echo base_url();?>assets/dist/js/jquery-confirm.min.js"></script>
<script src="<?php echo base_url();?>assets/dist/js/standalone/selectize.js"></script><!-- 
<script src="<?php echo base_url();?>assets/template_baru/dist/vendors/select2/js/select2.full.min.js"></script>
<script src="<?php echo base_url();?>assets/template_baru/dist/js/select2.script.js"></script> -->

<div class="modal fade" id="formmodal" data-backdrop="static" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false">

<script type="text/javascript">

	var datakirim;
	var datakode;
	var datapage;

	$(function () {
		datakirim = 0;
		$('#unit').select2({ tags :true });
		overform();
	});

	function hapussemua() {
		$('input:checkbox').prop('checked', false);
		$("#nm").val("");
		$("#us").val("");
		$("#ps").val("");
		$('select.selectized,input.selectized').val("")
	}

	$(function() {
		enablepelayanan();
		enableints();
		enableadm();
		$("#toppelayanan").click(enablepelayanan);
		$("#instalasi").click(enableints);
		$("#adm").click(enableadm);
	});

	function enablepelayanan() {
		$('#reg').prop('checked', false);
		$("#reg").prop("disabled", !this.checked);
		$('#fo').prop('checked', false);
		$("#fo").prop("disabled", !this.checked);
		$('#loket').prop('checked', false);
		$("#loket").prop("disabled", !this.checked);
		$('#ugd').prop('checked', false);
		$("#ugd").prop("disabled", !this.checked);
		$('#jalan').prop('checked', false);
		$("#jalan").prop("disabled", !this.checked);
		$('#inap').prop('checked', false);
		$("#inap").prop("disabled", !this.checked);
		$('#master').prop('checked', false);
		$("#master").prop("disabled", !this.checked);
		$('#sep').prop('checked', false);
		$("#sep").prop("disabled", !this.checked);
		$('#amp').prop('checked', false);
		$("#amp").prop("disabled", !this.checked);
		$('#rm').prop('checked', false);
		$("#rm").prop("disabled", !this.checked);
		$('#apotik').prop('checked', false);
		$("#apotik").prop("disabled", !this.checked);
		$('#farmasi').prop('checked', false);
		$("#farmasi").prop("disabled", !this.checked);
		$('#rt').prop('checked', false);
		$("#rt").prop("disabled", !this.checked);
		$('#gizi').prop('checked', false);
		$("#gizi").prop("disabled", !this.checked);
		$('#instalasi').prop('checked', false);
		$("#instalasi").prop("disabled", !this.checked);
		if ($("#instalasi").is(":checked") == true) {
			$("#lab").prop("disabled", !this.checked);
			$("#rad").prop("disabled", !this.checked);
			$("#hem").prop("disabled", !this.checked);
			$("#jen").prop("disabled", !this.checked);
			$("#amb").prop("disabled", !this.checked);
			$("#ibs").prop("disabled", !this.checked);
			$("#kmb").prop("disabled", !this.checked);
		} else if (($("#instalasi").is(":checked") == false) && ($("#toppelayanan").is(":checked") == false)) {
			$('#lab').prop('checked', false);
			$("#lab").prop("disabled", !this.checked);
			$('#rad').prop('checked', false);
			$("#rad").prop("disabled", !this.checked);
			$('#hem').prop('checked', false);
			$("#hem").prop("disabled", !this.checked);
			$('#jen').prop('checked', false);
			$("#jen").prop("disabled", !this.checked);
			$('#amb').prop('checked', false);
			$("#amb").prop("disabled", !this.checked);
			$('#ibs').prop('checked', false);
			$("#ibs").prop("disabled", !this.checked);
			$('#kmb').prop('checked', false);
			$("#kmb").prop("disabled", !this.checked);
		} else if (($("#instalasi").is(":checked") == true) && ($("#toppelayanan").is(":checked") == true)) {
			$("#lab").prop("disabled", !this.checked);
			$("#rad").prop("disabled", !this.checked);
			$("#hem").prop("disabled", !this.checked);
			$("#jen").prop("disabled", !this.checked);
			$("#amb").prop("disabled", !this.checked);
			$("#ibs").prop("disabled", !this.checked);
			$("#kmb").prop("disabled", !this.checked);
		}
	}

	function enablepelayananedit() {
		if ($("#toppelayanan").is(":checked") == true) {
			$("#reg").prop("disabled", false);
			$("#fo").prop("disabled", false);
			$("#loket").prop("disabled", false);
			$("#ugd").prop("disabled", false);
			$("#jalan").prop("disabled", false);
			$("#inap").prop("disabled", false);
			$("#master").prop("disabled", false);
			$("#sep").prop("disabled", false);
			$("#amp").prop("disabled", false);
			$("#rm").prop("disabled", false);
			$("#apotik").prop("disabled", false);
			$("#farmasi").prop("disabled", false);
			$("#rt").prop("disabled", false);
			$("#gizi").prop("disabled", false);
			$("#instalasi").prop("disabled", false);
		} else if ($("#toppelayanan").is(":checked") == false) {
			$('#reg').prop('checked', false);
			$("#reg").prop("disabled", !this.checked);
			$('#fo').prop('checked', false);
			$("#fo").prop("disabled", !this.checked);
			$('#loket').prop('checked', false);
			$("#loket").prop("disabled", !this.checked);
			$('#ugd').prop('checked', false);
			$("#ugd").prop("disabled", !this.checked);
			$('#jalan').prop('checked', false);
			$("#jalan").prop("disabled", !this.checked);
			$('#inap').prop('checked', false);
			$("#inap").prop("disabled", !this.checked);
			$('#master').prop('checked', false);
			$("#master").prop("disabled", !this.checked);
			$('#sep').prop('checked', false);
			$("#sep").prop("disabled", !this.checked);
			$('#amp').prop('checked', false);
			$("#amp").prop("disabled", !this.checked);
			$('#rm').prop('checked', false);
			$("#rm").prop("disabled", !this.checked);
			$('#apotik').prop('checked', false);
			$("#apotik").prop("disabled", !this.checked);
			$('#farmasi').prop('checked', false);
			$("#farmasi").prop("disabled", !this.checked);
			$('#rt').prop('checked', false);
			$("#rt").prop("disabled", !this.checked);
			$('#gizi').prop('checked', false);
			$("#gizi").prop("disabled", !this.checked);
			$('#instalasi').prop('checked', false);
			$("#instalasi").prop("disabled", !this.checked);
		}
		if ($("#instalasi").is(":checked") == false) {
			console.log("false");
			$('#lab').prop('checked', false);
			$("#lab").prop("disabled", !this.checked);
			$('#rad').prop('checked', false);
			$("#rad").prop("disabled", !this.checked);
			$('#hem').prop('checked', false);
			$("#hem").prop("disabled", !this.checked);
			$('#jen').prop('checked', false);
			$("#jen").prop("disabled", !this.checked);
			$('#amb').prop('checked', false);
			$("#amb").prop("disabled", !this.checked);
			$('#ibs').prop('checked', false);
			$("#ibs").prop("disabled", !this.checked);
			$('#kmb').prop('checked', false);
			$("#kmb").prop("disabled", !this.checked);
		} else if ($("#instalasi").is(":checked") == true) {
			$("#lab").prop("disabled", false);
			$("#rad").prop("disabled", false);
			$("#hem").prop("disabled", false);
			$("#jen").prop("disabled", false);
			$("#amb").prop("disabled", false);
			$("#ibs").prop("disabled", false);
			$("#kmb").prop("disabled", false);
		}
	}

	function enableints() {
		if ($("#instalasi").is(":checked") == true) {
			$("#lab").prop("disabled", !this.checked);
			$("#rad").prop("disabled", !this.checked);
			$("#hem").prop("disabled", !this.checked);
			$("#jen").prop("disabled", !this.checked);
			$("#amb").prop("disabled", !this.checked);
			$("#ibs").prop("disabled", !this.checked);
			$("#kmb").prop("disabled", !this.checked);
		} else if (($("#instalasi").is(":checked") == false) && ($("#toppelayanan").is(":checked") == true)) {
			$('#lab').prop('checked', false);
			$("#lab").prop("disabled", !this.checked);
			$('#rad').prop('checked', false);
			$("#rad").prop("disabled", !this.checked);
			$('#hem').prop('checked', false);
			$("#hem").prop("disabled", !this.checked);
			$('#jen').prop('checked', false);
			$("#jen").prop("disabled", !this.checked);
			$('#amb').prop('checked', false);
			$("#amb").prop("disabled", !this.checked);
			$('#ibs').prop('checked', false);
			$("#ibs").prop("disabled", !this.checked);
			$('#kmb').prop('checked', false);
			$("#kmb").prop("disabled", !this.checked);
		} else if (($("#instalasi").is(":checked") == true) && ($("#toppelayanan").is(":checked") == true)) {
			$("#lab").prop("disabled", !this.checked);
			$("#rad").prop("disabled", !this.checked);
			$("#hem").prop("disabled", !this.checked);
			$("#jen").prop("disabled", !this.checked);
			$("#amb").prop("disabled", !this.checked);
			$("#ibs").prop("disabled", !this.checked);
			$("#kmb").prop("disabled", !this.checked);
		}
	}

	function enableadm() {
		if ($("#adm").is(":checked") == false) {
			$('#user').prop('checked', false);
			$("#user").prop("disabled", !this.checked);
		} else if ($("#adm").is(":checked") == true) {
			$("#user").prop("disabled", !this.checked);
		}
	}

	function enableadmedit() {
		if ($("#adm").is(":checked") == false) {
			$('#user').prop('checked', false);
			$("#user").prop("disabled", true);
		} else if ($("#adm").is(":checked") == true) {
			$("#user").prop("disabled", false);
		}
	}

	function load_user(page) {
		modaltable();
		let data = {};
		const nama_user = $('#nmuser').val();
		console.log(nama_user);
		if (nama_user) {
			Object.assign(data,{nama_user});
		}
		$.ajax({
			url:"<?php echo site_url();?>/users/paginationunit/"+page,
			method:"GET",
			dataType:"json",
			data,
			success:function(data) {
				$('#tableuser').html(data.datauser);
				$('#pagination_link').html(data.pagination_link);
				modaltabletutup();
				datapage = page;
			}
		});
	}

	function cariuser (){
		load_user(1);
	}

	$(document).ready(function(){
		load_user(1);

		$(document).on("click", ".pagination li a", function(event){
			event.preventDefault();
			var page = $(this).data("ci-pagination-page");
			load_user(page);
		});
	});

	function ambiledit(id) {
		modaltable();
		datakode = id;
		datakirim = 1;
		$.ajax({
			url:"<?php echo site_url();?>/users/persiapanedit",
			method:"GET",
			data: {
				id: id
			},
			success:function(data) {
				modaltabletutup();
				var t = $.parseJSON(data);
				$("#nm").val(t.dtuser.nama);
				$("#nm").prop("disabled", true);
				$("#us").val(t.dtuser.username);
				$("#us").prop("disabled", true);
				$('#unit').val(t.dtuser.kode_unit).trigger('change');
				$("#unit").prop("disabled", true);

				$('#toppelayanan').prop('checked', parseInt(t.dtuser.PL));
				$('#reg').prop('checked', parseInt(t.dtuser.REGIS));
				$('#fo').prop('checked', parseInt(t.dtuser.FO));
				$('#loket').prop('checked', parseInt(t.dtuser.LP));
				$('#ugd').prop('checked', parseInt(t.dtuser.UGD));
				$('#jalan').prop('checked', parseInt(t.dtuser.RJ));
				$('#inap').prop('checked', parseInt(t.dtuser.RI));
				$('#master').prop('checked', parseInt(t.dtuser.MD));
				$('#sep').prop('checked', parseInt(t.dtuser.SEP));
				$('#amp').prop('checked', parseInt(t.dtuser.AMP));
				$('#rm').prop('checked', parseInt(t.dtuser.RM));
				$('#apotik').prop('checked', parseInt(t.dtuser.APT));
				$('#farmasi').prop('checked', parseInt(t.dtuser.FARM));
				$('#rt').prop('checked', parseInt(t.dtuser.RT));
				$('#gizi').prop('checked', parseInt(t.dtuser.GIZI));
				$('#instalasi').prop('checked', parseInt(t.dtuser.RINS));
				$('#lab').prop('checked', parseInt(t.dtuser.LAB));
				$('#rad').prop('checked', parseInt(t.dtuser.RAD));
				$('#hem').prop('checked', parseInt(t.dtuser.HEM));
				$('#jen').prop('checked', parseInt(t.dtuser.JEN));
				$('#amb').prop('checked', parseInt(t.dtuser.AMB));
				$('#ibs').prop('checked', parseInt(t.dtuser.IBS));
				$('#kmb').prop('checked', parseInt(t.dtuser.KMB));
				$('#info').prop('checked', parseInt(t.dtuser.INFO));
				$('#bo').prop('checked', parseInt(t.dtuser.BO));
				$('#adm').prop('checked', parseInt(t.dtuser.ADM));
				$('#user').prop('checked', parseInt(t.dtuser.USR));
				$('#new').prop('checked', parseInt(t.dtuser.NEW));
				$('#edit').prop('checked', parseInt(t.dtuser.EDIT));
				$('#del').prop('checked', parseInt(t.dtuser.DEL));
				$('#pil').prop('checked', parseInt(t.dtuser.PIL));
				if (t.dtuser.kode_unit != "") {
					var dataUnit = JSON.parse(t.dtuser.kode_unit);
					console.log(dataUnit);

					var $select = $("#select-tools").selectize();
					var selectize = $select[0].selectize;
					selectize.setValue(dataUnit);
				}
				
				enablepelayananedit();
				enableadmedit();
				overformtutup();
			}
		});
	}

	$(document).ready(function () {

		$("#tambahuser").click(function(e) {
			overformtutup();
			hapussemua();
			enablepelayananedit();
			enableadmedit();
			// enableints();
			enableadm();
			$("#nm").prop("disabled", false);
			$("#us").prop("disabled", false);
			$("#unit").prop("disabled", false);
			$("#ps").prop("disabled", false);
			datakirim = 0;
		});

		$("#batalform").click(function(e) {
			overform();
			hapussemua();
			enablepelayananedit();
			enableadmedit();
			enableadm();
		});

		$("#simpanform").click(function(e) {
			overform();
			if (datakirim == 0) {
				kirimsimpan();
			} else if (datakirim == 1) {
				kirimedit();
			}
		});

	});

	function kirimsimpan() {
		var toppelayanan = $("#toppelayanan").is(":checked");
		var reg = $("#reg").is(":checked");
		var fo = $("#fo").is(":checked");
		var loket = $("#loket").is(":checked");
		var ugd = $("#ugd").is(":checked");
		var jalan = $("#jalan").is(":checked");
		var inap = $("#inap").is(":checked");
		var master = $("#master").is(":checked");
		var sep = $("#sep").is(":checked");
		var amp = $("#amp").is(":checked");
		var rm = $("#rm").is(":checked");
		var apotik = $("#apotik").is(":checked");
		var farmasi = $("#farmasi").is(":checked");
		var rt = $("#rt").is(":checked");
		var gizi = $("#gizi").is(":checked");
		var instalasi = $("#instalasi").is(":checked");
		var lab = $("#lab").is(":checked");
		var rad = $("#rad").is(":checked");
		var hem = $("#hem").is(":checked");
		var jen = $("#jen").is(":checked");
		var amb = $("#amb").is(":checked");
		var ibs = $("#ibs").is(":checked");
		var kmb = $("#kmb").is(":checked");
		var info = $("#info").is(":checked");
		var bo = $("#bo").is(":checked");
		var adm = $("#adm").is(":checked");
		var user = $("#user").is(":checked");
		var neww = $("#new").is(":checked");
		var edit = $("#edit").is(":checked");
		var del = $("#del").is(":checked");
		var pil = $("#pil").is(":checked");
		var nm = document.getElementById("nm").value;
		var us = document.getElementById("us").value;
		var ps = document.getElementById("ps").value;
		// var unit = $("#unit").val();
		// var unittext = $("#unit option:selected" ).text();
		var units = JSON.stringify($('select.selectized,input.selectized').val());
		console.log(units);
		$.ajax({
			url:"<?php echo site_url();?>/users/simpandatauser",
			method:"GET",
			data: {
				toppelayanan: toppelayanan,
				reg: reg,
				fo: fo,
				loket: loket,
				ugd: ugd,
				jalan: jalan,
				inap: inap,
				master: master,
				sep: sep,
				amp: amp,
				rm: rm,
				apotik: apotik,
				farmasi: farmasi,
				rt: rt,
				gizi: gizi,
				instalasi: instalasi,
				lab: lab,
				rad: rad,
				hem: hem,
				jen: jen,
				amb: amb,
				user: user,
				info: info,
				bo: bo,
				adm: adm,
				neww: neww,
				edit: edit,
				del: del,
				pil: pil,
				nm: nm,
				us: us,
				ps: ps,
				units: units
			},
			success:function(data) {
				const result = $.parseJSON(data);
				if (result.status === true) {
					suksesalert();
					hapussemua();
					enablepelayananedit();
					enableadmedit();
					overformtutup();
					overform();
					load_user(1);
				} else if (result.status === false) {
					gagalalert();
					overformtutup();
				}
			},
			error : function(request,status,error){
				let response = $.parseJSON(request.responseText)
				gagalalert(response.message);
				// alert(response.message);
			}
		});
	}

	function kirimedit() {
		var toppelayanan = $("#toppelayanan").is(":checked");
		var reg = $("#reg").is(":checked");
		var fo = $("#fo").is(":checked");
		var loket = $("#loket").is(":checked");
		var ugd = $("#ugd").is(":checked");
		var jalan = $("#jalan").is(":checked");
		var inap = $("#inap").is(":checked");
		var master = $("#master").is(":checked");
		var sep = $("#sep").is(":checked");
		var amp = $("#amp").is(":checked");
		var rm = $("#rm").is(":checked");
		var apotik = $("#apotik").is(":checked");
		var farmasi = $("#farmasi").is(":checked");
		var rt = $("#rt").is(":checked");
		var gizi = $("#gizi").is(":checked");
		var instalasi = $("#instalasi").is(":checked");
		var lab = $("#lab").is(":checked");
		var rad = $("#rad").is(":checked");
		var hem = $("#hem").is(":checked");
		var jen = $("#jen").is(":checked");
		var amb = $("#amb").is(":checked");
		var ibs = $("#ibs").is(":checked");
		var kmb = $("#kmb").is(":checked");
		var info = $("#info").is(":checked");
		var bo = $("#bo").is(":checked");
		var adm = $("#adm").is(":checked");
		var user = $("#user").is(":checked");
		var neww = $("#new").is(":checked");
		var edit = $("#edit").is(":checked");
		var del = $("#del").is(":checked");
		var pil = $("#pil").is(":checked");
		var nm = document.getElementById("nm").value;
		var us = document.getElementById("us").value;
		var ps = document.getElementById("ps").value;
		var units = JSON.stringify($('select.selectized,input.selectized').val());
		$.ajax({
			url: "<?php echo site_url();?>/users/editdatauser",
			method: "GET",
			data: {
				toppelayanan: toppelayanan,
				reg: reg,
				fo: fo,
				loket: loket,
				ugd: ugd,
				jalan: jalan,
				inap: inap,
				master: master,
				sep: sep,
				amp: amp,
				rm: rm,
				apotik: apotik,
				farmasi: farmasi,
				rt: rt,
				gizi: gizi,
				instalasi: instalasi,
				lab: lab,
				rad: rad,
				hem: hem,
				jen: jen,
				amb: amb,
				user: user,
				info: info,
				bo: bo,
				adm: adm,
				neww: neww,
				edit: edit,
				del: del,
				pil: pil,
				nm: nm,
				us: us,
				units: units,
				ibs: ibs,
				kmb: kmb,
				id: datakode,
                ps: ps
			},
			success:function(data) {
				var t = $.parseJSON(data);
				// console.log(t);
				if (t.dtsimpan == true) {
					suksesalert();
					hapussemua();
					enablepelayananedit();
					enableadmedit();
					overformtutup();
					overform();
					load_user(1);
				} else if (t.dtsimpan == false) {
					gagalalert();
					overformtutup();
				}
			}
		});
	}

	function overform() {
		$("#kotakform").append('<div class="overlay" id="oform"><i class="fa fa-lock"></i></div>');
	}

	function overformtutup() {
		$("#oform").remove();
	}

	function modaltable() {
		$("#kotaktable").append('<div class="overlay" id="tlist"><i class="fa fa-refresh fa-spin"></i></div>');
	}

	function modaltabletutup() {
		$("#tlist").remove();
	}

	function tutupmodal() {
		$(function () {
			$('#formmodal').modal('toggle');
		});
		suksesalert();
		load_user(1);
	}

	function suksesalert() {
		$.notify("Sukses Input Data", "success");
	}

	function gagalalert(message=null) {
		$.notify(message?message:"Gagal Input Data", "error");
	}

	$('#select-tools').selectize({
		maxItems: null,
		valueField: 'id',
		labelField: 'title',
		searchField: 'title',
		options: [
			<?php
			foreach($dtunit as $row) {
				?>
				{id: '<?php echo $row->kode_unit;?>', title: '<?php echo $row->nama_unit;?>'},
				<?php
			}
			?>
		],
		create: false
	});

	function activate(id) {
		activehandler(id, "Aktifkan Akun?", "Aktifkan", true);
	}

	function nonactivate(id) {
		activehandler(id, "Nonaktifkan Akun?", "Nonaktifkan", false);
	}

	function activehandler(id, titletext, buttontext, status) {
		$.confirm({
			title: titletext,
			buttons: {
				batal: {
					text: 'Batal',
					btnClass: 'btn-red',
					action: function(){
						
					}
				},
				aktif: {
					text: buttontext,
					btnClass: 'btn-blue',
					keys: ['enter'],
					action: function(){
						modaltable();
						$.ajax({
							url: "<?php echo site_url();?>/users/aktifkanuser",
							type: "GET",
							data : {
								id: id, status: status
							},
							success: function (ajaxData){
								var t = $.parseJSON(ajaxData);
								if (t == true) {
									suksesalert();
									modaltabletutup();
									load_user(datapage);
								} else {
									gagalalert();
									modaltabletutup();
								}
							},
							error: function (ajaxData) {
								gagalalert();
								modaltabletutup();
							}
						});
					}
				}
			}
		});
	}
</script>
