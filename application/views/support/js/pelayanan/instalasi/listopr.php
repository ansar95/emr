<script src="<?php echo base_url(); ?>assets/template_baru/dist/vendors/select2/js/select2.full.min.js"></script>
<script src="<?php echo base_url(); ?>assets/template_baru/dist/js/select2.script.js"></script>
<script src="<?php echo base_url();?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script src="<?php echo base_url();?>assets/dist/js/notify.min.js"></script>
<script src="<?php echo base_url();?>assets/dist/js/jquery-confirm.min.js"></script>
<script src="<?php echo base_url();?>assets/dist/js/standalone/selectize.js"></script>

<div class="modal fade" id="formmodal" data-backdrop="static" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false">



<script type="text/javascript">

	$(function () {
		$('#tgl').datepicker({ autoclose: true }).datepicker("setDate", "0");
	});

	$(function () {
		$('#unitselect').select2({ tags :true });
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
			var nrp = document.getElementById("nrp").value;
			var kdunit = $("#kdunit").val();
			if ((tgl == "") && (nrp == "")) {
				hapusload();
				return;
			}
			$.ajax({
				url: "<?php echo site_url();?>/ioperasi/caridataopr",
				type: "GET",
				data : {tgl: tgl, nrp: nrp, kdunit: kdunit},
				success: function (ajaxData){
					$("#tabellab tbody tr").remove();
					$("#tabellab tbody").append(ajaxData);
					hapusload();
				}
			});
		});

		$("#tambahlab").click(function(e) {
			$.ajax({
				url: "<?php echo site_url();?>/ioperasi/panggiltambahopr",
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
		$.ajax({
			url: "<?php echo site_url();?>/ioperasi/panggilformprosesopr",
			type: "GET",
			data : {id: id, kdunit: kdunit},
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
        $.ajax({
            url: "<?php echo site_url();?>/ioperasi/panggileditopr",
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
        var nrp = document.getElementById("nrp").value;
        var kdunit = $("#kdunit").val();
        if ((tgl == "") && (nrp == "")) {
            hapusload();
            return;
        }
        $.ajax({
            url: "<?php echo site_url();?>/ioperasi/caridataopr",
            type: "GET",
            data : {tgl: tgl, nrp: nrp, kdunit: kdunit},
            success: function (ajaxData){
                $("#tabellab tbody tr").remove();
                $("#tabellab tbody").append(ajaxData);
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
                        var unit = document.getElementById("kdunit").value ;
                        var unittext = document.getElementById("unit").value;
                        var tgl = document.getElementById("tgl").value;
                        var nrp = document.getElementById("nrp").value;
                        $.ajax({
                            url: "<?php echo site_url();?>/ioperasi/hapusinstalasi",
                            type: "GET",
                            data: {
                                id: id,
                                unit: unit,
                                unittext: unittext,
                                tgl: tgl,
                                nrp: nrp
                            },
                            success: function (ajaxData) {
                                var t = $.parseJSON(ajaxData);
                                if (t.stat == true) {
                                    $.alert(t.info);
                                    $("#tabellab tbody tr").remove();
                                    $("#tabellab tbody").append(t.dtview);
                                    hapusload();
                                } else {
                                    $.alert(t.info);
                                    $("#tabellab tbody tr").remove();
                                    $("#tabellab tbody").append(t.dtview);
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
