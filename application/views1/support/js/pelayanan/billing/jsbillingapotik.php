<script src="<?php echo base_url();?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="<?php echo base_url();?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url();?>assets/dist/js/notify.min.js"></script>
<script src="<?php echo base_url();?>assets/dist/js/jquery-confirm.min.js"></script>


<div class="modal fade" id="formmodal" data-backdrop="static" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false">



<script type="text/javascript">

	$(function () {
		$('#tglregis').datepicker({ autoclose: true }).datepicker("setDate", "0");
	});

	function prosesload() {
		$("#kotak").append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
	}
    
	function prosesheader() {
        
    }

	function hapusload() {
		$(".overlay").remove();
	}

	$(document).ready(function () {

	});

	function panggilbilling(id) {
        $.ajax({
            url: "<?php echo site_url();?>/billing/prosesbillingapotik",
            type: "GET",
            data: {id: id},
            success: function (ajaxData){
                // console.log(ajaxdata);
                $("#formmodal").html(ajaxData);
                $("#formmodal").modal('show',{backdrop: 'true'});
            }
        });
    }
    
    function caridatabilling() {
        prosesload();
        var norm = document.getElementById("norm").value;
        $.ajax({
            url: "<?php echo site_url();?>/billing/caribillingpasienapotik",
            type: "GET",
            data : {norm: norm},
            success: function (ajaxData){
                $("#barisbilling tbody tr").remove();
                $("#barisbilling tbody").append(ajaxData);
                hapusload();
            },
            error: function (ajaxData) {
                hapusload();
            }
        });
    }

	$(document).ready(function () {
		// tglmasuk();
	});

	var dataid = "";

	function panggillihat(id) {
		dataid = id;
		$.ajax({
			url: "<?php echo site_url();?>/registrasipasien/lihatdatapasien",
			type: "GET",
			data: {id : id},
			success: function (ajaxData){
				// console.log(ajaxdata);
				$("#formmodal").html(ajaxData);
				$("#formmodal").modal('show',{backdrop: 'true'});
			}
		});
	}
</script>
