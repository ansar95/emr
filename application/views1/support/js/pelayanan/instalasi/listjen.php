<script src="<?php echo base_url(); ?>assets/template_baru/dist/vendors/select2/js/select2.full.min.js"></script>
<script src="<?php echo base_url(); ?>assets/template_baru/dist/js/select2.script.js"></script>
<script src="<?php echo base_url();?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script src="<?php echo base_url();?>assets/dist/js/notify.min.js"></script>
<script src="<?php echo base_url();?>assets/dist/js/jquery-confirm.min.js"></script>

<div class="modal fade" id="formmodal" data-backdrop="static" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false">



<script type="text/javascript">

	$(function () {
		$('#tgl').datepicker({ autoclose: true }).datepicker("setDate", "0");
        $('#kdunit').select2();
	});

   

	function prosesload() {
		$("#kotak").append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
	}

	function hapusload() {
		$(".overlay").remove();
	}

	function tutupmodal(id) {
		$(function () {
			$('#formmodal').modal('toggle');
		});
		panggilrmview(id);
	}

	$(document).ready(function () {

		$("#caridata").click(function(e) {
			prosesload();
			var tgl = document.getElementById("tgl").value;
			// var nrp = document.getElementById("nrp").value;
			var kdunit = $("#kdunit").val();
            // var kdunit = document.getElementById("kdunit").value;
		    var unit = $("#kdunit option:selected" ).text();
            console.log(kdunit);
			if (tgl == "") {
				hapusload();
				return;
			}
			$.ajax({
				url: "<?php echo site_url();?>/ijenazah/caridatajen",
				type: "GET",
				data : {tgl: tgl, kdunit: kdunit, unit : unit },
				success: function (ajaxData){
					$("#tabeljen tbody tr").remove();
					$("#tabeljen tbody").append(ajaxData);
					hapusload();
				}
			});
		});

		$("#tambahjen").click(function(e) {
			var kdunit = $("#kdunit").val();
            // var kdunit = document.getElementById("kdunit").value;
		    var unit = $("#kdunit option:selected" ).text();
            console.log(kdunit);
			$.ajax({
				url: "<?php echo site_url();?>/ijenazah/panggiltambahjen",
				type: "GET",
				success: function (ajaxData){
					hapusload();
					$("#formmodal").html(ajaxData);
					$("#formmodal").modal('show',{backdrop: 'true'});
				}
			});
		});

	});

	function panggilproses(id) {
		prosesload();
		var kdunit = $("#kdunit").val();
		var unit = $("#kdunit option:selected" ).text();

        console.log('.....'+kdunit);
		$.ajax({
			url: "<?php echo site_url();?>/ijenazah/panggilformprosesjen",
			type: "GET",
			data : {id: id, kdunit: kdunit, unit:unit},
			success: function (ajaxData){
				hapusload();
				$("#formmodal").html(ajaxData);
				$("#formmodal").modal('show',{backdrop: 'true'});
			}
		});
	}

    function panggiledit(id) {
        prosesload();
        var kdunit = $("#kdunit").val();
		    var unit = $("#kdunit option:selected" ).text();
        $.ajax({
            url: "<?php echo site_url();?>/ijenazah/panggileditjen",
            type: "GET",
            data : {id: id, kdunit: kdunit},
            success: function (ajaxData){
                hapusload();
                $("#formmodal").html(ajaxData);
                $("#formmodal").modal('show',{backdrop: 'true'});
            }
        });
    }

	function panggilrmview(id) {
		$.alert({
			title: 'No. Transaksi',
			content: id,
		})
	}

	function suksees() {
        prosesload();
        var tgl = document.getElementById("tgl").value;
        // var nrp = document.getElementById("nrp").value;
        var kdunit = $("#kdunit").val();
        if (tgl == "")  {
            hapusload();
            return;
        }
        $.ajax({
            url: "<?php echo site_url();?>/ijenazah/caridatajen",
            type: "GET",
            data : {tgl: tgl, kdunit: kdunit},
            success: function (ajaxData){
                $("#tabeljen tbody tr").remove();
                $("#tabeljen tbody").append(ajaxData);
                hapusload();
            }
        });
    }

    function hapusinst(e, id) {
        var rm = $(e).parents('tr').find("td:eq(0)").text();
        var tgl = $(e).parents('tr').find("td:eq(1)").text();
        $.confirm({
            title: 'Hapus Data',
            content: 'Yakin Pasien dengan no RM ' + rm + ' tanggal ' + tgl + ' Dihapus?',
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
                        prosesload();
                        var kdunit = document.getElementById("kdunit").value ;
		                var unit = $("#kdunit option:selected" ).text();
                        var tgl = document.getElementById("tgl").value;
                        // var nrp = document.getElementById("nrp").value;
                        $.ajax({
                            url: "<?php echo site_url();?>/ijenazah/hapusinstalasi",
                            type: "GET",
                            data: {
                                id: id,
                                unit: unit,
                                kdunit: kdunit,
                                tgl: tgl
                                // nrp: nrp
                            },
                            success: function (ajaxData) {
                                var t = $.parseJSON(ajaxData);
                                if (t.stat == true) {
                                    $.alert(t.info);
                                    $("#tabeljen tbody tr").remove();
                                    $("#tabeljen tbody").append(t.dtview);
                                    hapusload();
                                } else {
                                    $.alert(t.info);
                                    $("#tabeljen tbody tr").remove();
                                    $("#tabeljen tbody").append(t.dtview);
                                    hapusload();
                                }
                                document.getElementById("caridata").click();
                            },
                            error: function (ajaxData) {
                                hapusload();
                            }
                        });
                    }
                }
            }
        });
    }
</script>
