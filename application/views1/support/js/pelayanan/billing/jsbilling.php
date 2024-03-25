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

	function hapusload() {
		$(".overlay").remove();
	}

	function lockhitung() {
        $("#kotakdetail").append('<div class="overlay"><i class="fa fa-lock"></i></div>');
        $("#kotakdetailapotik").append('<div class="overlay"><i class="fa fa-lock"></i></div>');
        $("#kotakterbilling").append('<div class="overlay"><i class="fa fa-lock"></i></div>');
        // $("#kotakterheader").append('<div class="overlay"><i class="fa fa-lock"></i></div>');
	}

	function unlockhitung() {
        $(".overlay").remove();
	}

	$(document).ready(function () {

	});

	function panggilbilling(id) {
        $.ajax({
            url: "<?php echo site_url();?>/billing/prosesbilling",
            type: "GET",
            data: {id: id},
            success: function (ajaxData){
                // console.log(ajaxdata);
                $("#formmodal").html(ajaxData);
                $("#formmodal").modal('show',{backdrop: 'true'});
            }
        });
    }

	function panggilbillingapotik(id) {
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

    function panggilbayar(id) {
        $.ajax({
            url: "<?php echo site_url();?>/billing/prosesbayarpelayanan",
            type: "GET",
            data: {id: id},
            success: function (ajaxData){
                // console.log(ajaxdata);
                $("#formmodal").html(ajaxData);
                $("#formmodal").modal('show',{backdrop: 'true'});
            }
        });
    }

    function panggilbayarapotik(noresep) {
        $.ajax({
            url: "<?php echo site_url();?>/billing/prosesbayarapotik",
            type: "GET",
            data: {noresep: noresep},
            success: function (ajaxData){
                // console.log(ajaxdata);
                $("#formmodal").html(ajaxData);
                $("#formmodal").modal('show',{backdrop: 'true'});
            }
        });
    }
    

    function panggilbayarinst(notrx_IN) {
        $.ajax({
            url: "<?php echo site_url();?>/billing/prosesbayarinst",
            type: "GET",
            data: {notrx_IN: notrx_IN},
            success: function (ajaxData){
                // console.log(ajaxdata);
                $("#formmodal").html(ajaxData);
                $("#formmodal").modal('show',{backdrop: 'true'});
            }
        });
    }
    
    function bayarpanjar(id) {
        $.ajax({
            url: "<?php echo site_url();?>/billing/prosesbayarpelayanan",
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
            url: "<?php echo site_url();?>/billing/caribillingpasien",
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

    function caridatabillingapotik() {
            prosesload();
            var noresep = document.getElementById("noresep").value;
            $.ajax({
                url: "<?php echo site_url();?>/billing/caribillingpasienapotik",
                type: "GET",
                data : {noresep: noresep},
                success: function (ajaxData){
                    $("#barisbillingapotik tbody tr").remove();
                    $("#barisbillingapotik tbody").append(ajaxData);
                    hapusload();
                },
                error: function (ajaxData) {
                    hapusload();
                }
            });
    }


// BARU SAMPAI SINI, BELUM KE CONTROLL LAGO UNTUK PANGGIL
    function caridatabillinginst() {
            prosesload();
            var kode_unit = document.getElementById("inst").value;
            var norminst = document.getElementById("norminst").value;
            var tglinst = document.getElementById("tglinst").value;
            $.ajax({
                url: "<?php echo site_url();?>/billing/caribillingpasieninst",
                type: "GET",
                data : { kode_unit : kode_unit,
                        norminst: norminst,
                        tglinst : tglinst
                        },
                success: function (ajaxData){
                    $("#barisbillingapotik tbody tr").remove();
                    $("#barisbillingapotik tbody").append(ajaxData);
                    hapusload();
                },
                error: function (ajaxData) {
                    hapusload();
                }
            });
    }

    var randomNumber;
    function load_data(page) {
        var shift = document.getElementById("shif").value;
        $.ajax({
            url:"<?php echo site_url();?>/billing/paginationrekapbilling/"+page,
            method:"GET",
	        data: {
                shift: shift
	        },
            dataType:"json",
            success:function(data) {
                $('#pagebillings').html(data.rekap_table);
                $('#pagination_link').html(data.pagination_link);
            }
        });
    }

    $(document).ready(function(){
        lockhitung();

        randomNumber = 1;
        load_data(randomNumber);
        $(document).on("click", ".pagination li a", function(event){
            event.preventDefault();
            var page = $(this).data("ci-pagination-page");
            randomNumber = page;
            load_data(page);
        });
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

	function prosesheader() {
        load_data(1);
		unlockhitung();
    }

    function prosestutuprekap() {
        $.ajax({
            url: "<?php echo site_url();?>/billing/tutuprekap",
            type: "GET",
            success: function (ajaxData){
                var t = JSON.parse(ajaxData);
                if (t.jumlah > 0) {
                    $("#btncari").prop("disabled", true);
                    $("#btnproses").prop("disabled", true);
                } else {
					$("#btncari").prop("disabled", false);
                    $("#btnproses").prop("disabled", false);
                }
                hapusload();
                lockhitung();
            },
            error: function (ajaxData) {
                hapusload();
            }
        });

    }


    $(document).ready(function () {
        $('#tglinst').datepicker({ autoclose: true }).datepicker("setDate", "0");
        $('#inst').select2();
    });

</script>
