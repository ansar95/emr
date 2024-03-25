<script src="<?php echo base_url();?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="<?php echo base_url();?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script src="<?php echo base_url();?>assets/dist/js/notify.min.js"></script>
<script src="<?php echo base_url();?>assets/dist/js/jquery-confirm.min.js"></script>

<div class="modal fade" id="formmodal" data-backdrop="static" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false">

<script type="text/javascript">
	function load_country_data(page) {
		modaltable();
		$.ajax({
			url:"<?php echo site_url();?>/masterdata/paginationunit/"+page,
			method:"GET",
			dataType:"json",
			success:function(data) {
				$('#tableunit').html(data.country_table);
				$('#pagination_link').html(data.pagination_link);
				modaltabletutup();
			},
			error: function(data) {
				gagalalert();
				modalloadtutup();
			}
		});
	}

	function untukshiftdepo() {
        $('#shift').select2();
        $('#depo').select2();
        $('#tgl').datepicker({ autoclose: true }).datepicker("setDate", "0");
        ambildata();
    }

	$(document).ready(function(){
		// load_country_data(1);
        untukshiftdepo();
		$(document).on("click", ".pagination li a", function(event){
			event.preventDefault();
			var page = $(this).data("ci-pagination-page");
			load_country_data(page);
		});
	});

	function addresep() {
	    var shift = $('#shift').val();
        var depo = $('#depo').val();
        var depotext = $("#depo option:selected" ).text();
        window.open('<?php echo site_url()?>/depoapotik/resepobat' + '/' + shift + '/' + depo + '/' + depotext + '', '_self');
    }

    function modaldetail() {
        $("#kotakdetail").append('<div class="overlay" id="detailmodal"><i class="fa fa-lock"></i></div>');
    }

    function modaldetailtutup() {
        $("#detailmodal").remove();
    }

	function tutupmodal() {
		$(function () {
			$('#formmodal').modal('toggle');
		});
		suksesalert(0);
	}

	function suksesalert(kode) {
		if (kode == 0) {
			$.notify("Sukses Input Data", "success");
		} else if (kode == 1) {
			$.notify("Sukses Ubah Data", "success");
		} else if (kode == 2) {
			$.notify("Sukses Hapus Data", "success");
		}
	}

	function gagalalert() {
		$.notify("Gagal Memproses Data", "error");
	}

	function kuranglengkap() {
		$.notify("Data Kurang Lengkap", "error");
	}

	function ambildata() {
		modaldetail();
        var shift = $('#shift').val();
        var depo = $('#depo').val();
        var tgl = document.getElementById("tgl").value;
        $.ajax({
            url: "<?php echo site_url();?>/depoapotik/datalistresep",
            type: "GET",
            data: {
                shift: shift,
                depo: depo,
	            tgl: tgl
            },
            success: function (ajaxData){
                var dt = JSON.parse(ajaxData);
                modaldetailtutup();
                $("#tableresep").html(dt.dtview);
                $.notify("Sukses Proses Data", "success");
            },
            error: function(data) {
                gagalalert();
                modaldetailtutup();
            }
        });
    }

	function panggilhapus(id) {
        $.confirm({
            title: 'Hapus Resep?',
            buttons: {
                hapus: {
                    text: 'Hapus',
                    btnClass: 'btn-red',
                    keys: ['enter', 'shift'],
                    action: function(){
						modaldetail()
                        $.ajax({
                            url: "<?php echo site_url();?>/depoapotik/hapusresep",
                            type: "GET",
                            data: {
                                id: id
                            },
                            success: function (ajaxData){
                                var dt = JSON.parse(ajaxData);
                                if (dt == true) {
									modaldetailtutup();
                                    $.notify("Sukses Proses Data", "success");
									ambildata();
                                } else {
									$.notify("Data tidak dizinkan dihapus, karena sudah diproses", "error");
                                    modaldetailtutup();
                                }
                            },
                            error: function(data) {
                                modaldetailtutup();
								$.notify("Gagal Proses Dataa", "error");
                            }
                        });
                    }
                },
                batal: {
                    text: 'Batal',
                    action: function(){

                    }
                }
            }
        });
    }
    function prosesdetailresep(id) {

    }
    

</script>
