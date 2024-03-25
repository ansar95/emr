<script src="<?php echo base_url(); ?>assets/template_baru/dist/vendors/select2/js/select2.full.min.js"></script>
<script src="<?php echo base_url(); ?>assets/template_baru/dist/js/select2.script.js"></script>
<script src="<?php echo base_url();?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url();?>assets/dist/js/notify.min.js"></script>
<script src="<?php echo base_url();?>assets/dist/js/jquery-confirm.min.js"></script>


<div class="modal fade" id="formmodal" data-backdrop="static" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false">



<script type="text/javascript">

$.fn.datepicker.noConflict();
        $(function() {
            $('#tglmulai').datepicker({
                autoclose: true,
                dateFormat: 'dd-mm-yy',
                changeMonth: true,
                changeYear: true,
                yearRange: "-10:+00"
            }).datepicker("setDate", "0");
			$('#tglselese').datepicker({
                autoclose: true,
                dateFormat: 'dd-mm-yy',
                changeMonth: true,
                changeYear: true,
                yearRange: "-10:+00"
            }).datepicker("setDate", "0");
		$('select').select2({ tags: true });

        });

	// $(function () {
	// 	$('#tglmulai').datepicker({ autoclose: true }).datepicker("setDate", "0");
	// 	$('#tglselese').datepicker({ autoclose: true }).datepicker("setDate", "0");
	// 	$('select').select2({ tags: true });
	// });

	function prosesload() {
		$("#kotak").append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
	}

	function hapusload() {
		$(".overlay").remove();
	}

	function tampilkan() {
        prosesload();
        var tglmulai = document.getElementById("tglmulai").value;
		var tglselese = document.getElementById("tglselese").value;
		var pelayanan = $("#pelayanan").val();
		console.log(pelayanan);
        $.ajax({
            url: "<?php echo site_url();?>/sitb/tampilkandata",
            type: "GET",
            data : {
				tglmulai: tglmulai,
				tglselese: tglselese,
				pelayanan: pelayanan
			},
            success: function (ajaxData){
                $("#tablepasien tbody tr").remove();
                $("#tablepasien tbody").append(ajaxData);
                hapusload();
            },
            error: function (ajaxData) {
                hapusload();
            }
        });
    }

	function cari() {
        var tglmulai = document.getElementById("tglmulai").value;
		var tglselese = document.getElementById("tglselese").value;
		var pelayanan = $("#pelayanan").val();
		var rm = document.getElementById("nrp").value;
		// alert(rm);
		if (rm == "") {
			$.notify("No. RM Kosong", "error");
			return;
		}
		prosesload();
        $.ajax({
            url: "<?php echo site_url();?>/sitb/tampilkandata_rm",
            type: "GET",
            data : {
				tglmulai: tglmulai,
				tglselese: tglselese,
				pelayanan: pelayanan,
				rm : rm
			},
            success: function (ajaxData){
				// alert(ajaxData);
                $("#tablepasien tbody tr").remove();
                $("#tablepasien tbody").append(ajaxData);
                hapusload();
            },
            error: function (ajaxData) {
				// alert('error');
				// alert(rm);
                hapusload();
            }
        });
    }

	function tampilkanprosesposting() {
        prosesload();
        var tglmulai = document.getElementById("tglmulai").value;
		var tglselese = document.getElementById("tglselese").value;
		var pelayanan = $("#pelayanan").val();
		console.log(pelayanan);
        $.ajax({
            url: "<?php echo site_url();?>/sitb/tampilkandataposting",
            type: "GET",
            data : {
				tglmulai: tglmulai,
				tglselese: tglselese,
				pelayanan: pelayanan
			},
            success: function (ajaxData){
                $("#tablepasien tbody tr").remove();
                $("#tablepasien tbody").append(ajaxData);
                hapusload();
            },
            error: function (ajaxData) {
                hapusload();
            }
        });
    }
	
	function post2sitb($id) {
		var idpdiag=$id;
		var tglmulai = document.getElementById("tglmulai").value;
		var tglselese = document.getElementById("tglselese").value;
		var pelayanan = $("#pelayanan").val();
        prosesload();
        $.ajax({
            url: "<?php echo site_url();?>/sitb/post2sitb",
            type: "GET",
            data : {
				tglmulai: tglmulai,
				tglselese: tglselese,
				pelayanan: pelayanan,
				idpdiag: idpdiag
			},
            success: function (ajaxData){
                $("#tablepasien tbody tr").remove();
                $("#tablepasien tbody").append(ajaxData);
                hapusload();
            },
            error: function (ajaxData) {
                hapusload();
            }
        });
    }


	$(document).ready(function () {
		
	});
	
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

</script>


