<script src="<?php echo base_url(); ?>assets/template_baru/dist/vendors/select2/js/select2.full.min.js"></script>
<script src="<?php echo base_url(); ?>assets/template_baru/dist/js/select2.script.js"></script>
<script src="<?php echo base_url();?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url();?>assets/dist/js/notify.min.js"></script>
<script src="<?php echo base_url();?>assets/dist/js/jquery-confirm.min.js"></script>


<div class="modal fade" id="formmodal" data-backdrop="static" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false">



<script type="text/javascript">

	$(function () {
		$('#tglmulai').datepicker({ autoclose: true }).datepicker("setDate", "0");
		$('#tglselese').datepicker({ autoclose: true }).datepicker("setDate", "0");
		$('select').select2({ tags: true });
	});

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
            url: "<?php echo site_url();?>/rm/tampilkanrekammedik",
            type: "GET",
            data : {
				tglmulai: tglmulai,
				tglselese: tglselese,
				pelayanan: pelayanan
			},
            success: function (ajaxData){
                $("#barisdata tbody tr").remove();
                $("#barisdata tbody").append(ajaxData);
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
		if (rm == "") {
			$.notify("No. RM Kosong", "error");
			return;
		}
		prosesload();
        $.ajax({
            url: "<?php echo site_url();?>/rm/carirekammedik",
            type: "GET",
            data : {
				tglmulai: tglmulai,
				tglselese: tglselese,
				pelayanan: pelayanan,
				rm: rm
			},
            success: function (ajaxData){
                $("#barisdata tbody tr").remove();
                $("#barisdata tbody").append(ajaxData);
                hapusload();
            },
            error: function (ajaxData) {
                hapusload();
            }
        });
    }

	function panggilproses(id) {
		$.ajax({
			url: "<?php echo site_url();?>/rm/prosesrm",
			type: "GET",
			data: {id: id},
			success: function (ajaxData){
				// console.log(ajaxdata);
				$("#formmodal").html(ajaxData);
				$("#formmodal").modal('show',{backdrop: 'true'});
			}
		});
	}

	$(document).ready(function () {
		
	});
	

</script>
