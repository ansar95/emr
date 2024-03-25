<script src="<?php echo base_url(); ?>assets/template_baru/dist/vendors/select2/js/select2.full.min.js"></script>
<script src="<?php echo base_url(); ?>assets/template_baru/dist/js/select2.script.js"></script>
<script src="<?php echo base_url();?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script src="<?php echo base_url();?>assets/dist/js/notify.min.js"></script>
<script src="<?php echo base_url();?>assets/dist/js/jquery-confirm.min.js"></script>

<div class="modal fade" id="formmodal" data-backdrop="static" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false">



<script type="text/javascript">
		$.fn.datepicker.noConflict()
	$(function () {
		$('#unitselect').select2({ tags :true });
	});

	function prosesload() {
		$("#kotak").append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
	}

	function hapusload() {
		$(".overlay").remove();
	}

	$(document).ready(function () {
		$("#caridata").click(function(e) {
			prosesload();
			var unit = document.getElementById("unitselect").value;
			var nrp = document.getElementById("nrp").value;
			if ((unit == "") && (nrp == "")) {
				hapusload();
				return;
			}
			$.ajax({
				url: "<?php echo site_url();?>/uri/caripasienuri",
				type: "GET",
				data : {unit: unit, nrp: nrp},
				success: function (ajaxData){
					$("#barispasien tbody tr").remove();
					$("#barispasien tbody").append(ajaxData);
					hapusload();
				}
			});

		});
	});

	$(document).ready(function () {
		$("#caridata1").click(function(e) {
			prosesload();
			var unit = document.getElementById("unitselect").value;
			var nrp = document.getElementById("nrp").value;
			if ((unit == "") && (nrp == "")) {
				hapusload();
				return;
			}
			$.ajax({
				url: "<?php echo site_url();?>/uri/caripasienuri",
				type: "GET",
				data : {unit: unit, nrp: nrp},
				success: function (ajaxData){
					$("#barispasien tbody tr").remove();
					$("#barispasien tbody").append(ajaxData);
					hapusload();
				}
			});

		});
	});

	function panggilproses(id) {
		var dt = id.split("_");
		if (dt[1] == "" || dt[1] =="-") {
			$.alert({
				title: 'Rawat Inap',
				content: "Isi Nama Dokter Terlebih Dahulu",
			})
			return;
		}
		
		if (dt[2] == "" || dt[2] =="-") {
			$.alert({
				title: 'Rawat Inap',
				content: "Pilih Kamar Terlebih Dahulu",
			})
			return;
		}
		prosesload();
		var unit = $("#unitselect").val();
		$.ajax({
			url: "<?php echo site_url();?>/uri/panggiluriform",
			type: "GET",
			data : {notrans: dt[0], unit: unit},
			success: function (ajaxData){
				hapusload();
				$("#formmodal").html(ajaxData);
				$("#formmodal").modal('show',{backdrop: 'true'});
			}
		});
	}

    function panggilBilling(id) {
        prosesload();
        var unit = $("#unitselect").val();
        $.ajax({
            url: "<?php echo site_url();?>/uri/panggiluribillingform",
            type: "GET",
            data : {id: id, unit: unit},
            success: function (ajaxData){
                hapusload();
                $("#formmodal").html(ajaxData);
                $("#formmodal").modal('show',{backdrop: 'true'});
            }
        });
    }

    function panggilEstimasi(id) {
        prosesload();
        var unit = $("#unitselect").val();
        $.ajax({
            url: "<?php echo site_url();?>/uri/panggilurjestimasiform",
            type: "GET",
            data : {id: id, unit: unit},
            success: function (ajaxData){
                hapusload();
                $("#formmodal").html(ajaxData);
                $("#formmodal").modal('show',{backdrop: 'true'});
            }
        });
    }

	function panggildokter(id) {
		prosesload();
		var unit = $("#unitselect").val();
		$.ajax({
			url: "<?php echo site_url();?>/uri/panggilurjdokterform",
			type: "GET",
			data : {id: id, unit: unit},
			success: function (ajaxData){
				hapusload();
				$("#formmodal").html(ajaxData);
				$("#formmodal").modal('show',{backdrop: 'true'});
			}
		});
	}

    function panggilkamar(id) {
        prosesload();
        var unit = $("#unitselect").val();
        $.ajax({
            url: "<?php echo site_url();?>/uri/panggilurjkamarform",
            type: "GET",
            data : {id: id, unit: unit},
            success: function (ajaxData){
                hapusload();
                $("#formmodal").html(ajaxData);
                $("#formmodal").modal('show',{backdrop: 'true'});
            }
        });
    }




    function tarikdata() {
        prosesload();
        var unit = $("#unitselect").val();
        $.ajax({
            url: "<?php echo site_url();?>/uri/panggiltarikdata",
            type: "GET",
            data : {unit: unit},
            success: function (ajaxData){
                hapusload();
                $("#formmodal").html(ajaxData);
                $("#formmodal").modal('show',{backdrop: 'true'});
            }
        });
    }

	  // ================= cetak gelang pasien 
	  function cetakblling(id) {
        var win = window.open("<?php echo site_url();?>/sampul/billinginap/" + id, '_blank');
		win.focus();
    }

// klik kanan
function klik(){
document.getElementById("klik_kanan").innerHTML="<div class='menu'>File</div>";
}

</script>
