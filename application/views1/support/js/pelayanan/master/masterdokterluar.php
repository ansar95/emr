<script src="<?php echo base_url();?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="<?php echo base_url();?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script src="<?php echo base_url();?>assets/dist/js/notify.min.js"></script>
<script src="<?php echo base_url();?>assets/dist/js/jquery-confirm.min.js"></script>

<div class="modal fade" id="formmodal" data-backdrop="static" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false">

<script type="text/javascript">
    var randomNumber;
	function load_data(page) {
		$.ajax({
			url:"<?php echo site_url();?>/masterdata/paginationdokterluar/"+"1",
			method:"GET",
			dataType:"json",
			success:function(data) {
				$('#tablemedis').html(data.country_table);
				$('#pagination_link').html(data.pagination_link);
			}
		});
	}

	$(document).ready(function(){
        randomNumber = 1;
        load_data(randomNumber);
		$(document).on("click", ".pagination li a", function(event){
			event.preventDefault();
			var page = $(this).data("ci-pagination-page");
            randomNumber = page;
			load_data(page);
		});
	});

	$(document).ready(function () {

		$("#tambahmedis").click(function(e) {
			modaltable();
			$.ajax({
				url: "<?php echo site_url();?>/masterdata/panggiltambahdokterluar",
				type: "GET",
				success: function (ajaxData){
					$("#formmodal").html(ajaxData);
					$("#formmodal").modal('show',{backdrop: 'true'});
					modaltabletutup();
				}
			});
		});

	});

	function modaltable() {
		$("#kotaktable").append('<div class="overlayt"><i class="fa fa-refresh fa-spin"></i></div>');
	}

	function modaltabletutup() {
		$(".overlayt").remove();
	}

	function tutupmodal(i) {
		$(function () {
			$('#formmodal').modal('toggle');
		});
		suksesalert(i);
		load_data(randomNumber);
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

    function panggiledit(id) {
        modaltable();
        $.ajax({
            url: "<?php echo site_url();?>/masterdata/panggileditdokterluar",
            type: "GET",
            data: {id: id},
            success: function (ajaxData){
                $("#formmodal").html(ajaxData);
                $("#formmodal").modal('show',{backdrop: 'true'});
                modaltabletutup();
            },
            error: function(data) {
                gagalalert();
                modaltabletutup();
            }
        });
    }

    function hapusdata(e, id) {
        var txt = $(e).parents('tr').find("td:eq(2)").text();
        $.confirm({
            title: 'Hapus Data',
            content: 'Yakin menghapus ' + txt + '?',
            buttons: {
                batal: {
                    text: 'Batal',
                    btnClass: 'btn-red',
                    action: function(){

                    }
                },
                hapus: {
                    text: 'Hapus',
                    btnClass: 'btn-blue',
                    keys: ['enter'],
                    action: function(){
                        $.ajax({
                            url: "<?php echo site_url();?>/masterdata/deletedokterluar",
                            type: "GET",
                            data : {
                                id: id
                            },
                            success: function (ajaxData){
                                if (ajaxData == "1") {
                                    suksesalert(2);
                                    load_data(randomNumber);
                                } else {
                                    gagalalert();
                                }
                            },
                            error: function (ajaxData) {
                                gagalalert();
                            }
                        });
                    }
                }
            }
        });
    }
</script>
