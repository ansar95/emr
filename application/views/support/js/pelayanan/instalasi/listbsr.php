<script src="<?php echo base_url(); ?>assets/template_baru/dist/vendors/select2/js/select2.full.min.js"></script>
<script src="<?php echo base_url(); ?>assets/template_baru/dist/js/select2.script.js"></script>
<script src="<?php echo base_url();?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script src="<?php echo base_url();?>assets/dist/js/notify.min.js"></script>
<script src="<?php echo base_url();?>assets/dist/js/jquery-confirm.min.js"></script>

<div class="modal fade" id="formmodal" data-backdrop="static" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false">



<script type="text/javascript">

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
			var kdunit = $("#kdunit").val();
			if ((unit == "") && (nrp == "")) {
				hapusload();
				return;
			}
			$.ajax({
				url: "<?php echo site_url();?>/ibersalin/caripasienbsr",
				type: "GET",
				data : {unit: unit, nrp: nrp, kdunit: kdunit},
				success: function (ajaxData){
					$("#barispasien tbody tr").remove();
					$("#barispasien tbody").append(ajaxData);
					hapusload();
				}
			});

		});
	});

	function panggilproses(id) {
		prosesload();
		var unit = $("#unitselect").val();
		$.ajax({
			url: "<?php echo site_url();?>/ibersalin/panggilbsrform",
			type: "GET",
			data : {notrans: id, unit: unit},
			success: function (ajaxData){
				hapusload();
				$("#formmodal").html(ajaxData);
				$("#formmodal").modal('show',{backdrop: 'true'});
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
                        var unit = document.getElementById("unitselect").value;
                        var nrp = document.getElementById("nrp").value;
                        var kdunit = $("#kdunit").val();
                        $.ajax({
                            url: "<?php echo site_url();?>/ibersalin/hapusinstalasi",
                            type: "GET",
                            data: {
                                id: id,
                                unit: unit,
                                kdunit: kdunit,
                                nrp: nrp
                            },
                            success: function (ajaxData) {
                                var t = $.parseJSON(ajaxData);
                                if (t.stat == true) {
                                    $.alert(t.info);
                                    $("#barispasien tbody tr").remove();
                                    $("#barispasien tbody").append(t.dtview);
                                    hapusload();
                                } else {
                                    $.alert(t.info);
                                    $("#barispasien tbody tr").remove();
                                    $("#barispasien tbody").append(t.dtview);
                                    hapusload();
                                }
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
