<script src="<?php echo base_url();?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="<?php echo base_url();?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script src="<?php echo base_url();?>assets/dist/js/notify.min.js"></script>
<script src="<?php echo base_url();?>assets/dist/js/jquery-confirm.min.js"></script>

<div class="modal fade" id="formmodal" data-backdrop="static" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false">

<script type="text/javascript">
    var randomNumber;
	function load_country_data(page) {
		modaltable();
		var key1 = document.getElementById("keyword").value;
		console.log(key1);
		var cari = document.getElementById("cari");
		cari.addEventListener('click', function(){
			var key1 = document.getElementById("keyword").value;
			console.log(key1);
				$.ajax({
					url:"<?php echo site_url();?>/masterdata/paginationunit/"+"1",
					method:"GET",
					data: {key1: key1},
					dataType:"json",
					success:function(data) {
						$('#tableunit').html(data.country_table);
						$('#pagination_link').html(data.pagination_link);
						modaltabletutup();
					},
					error: function(data) {
						gagalalert();
						modaltabletutup();
					}
				});
		})
		$.ajax({
			url:"<?php echo site_url();?>/masterdata/paginationunit/"+page,
			method:"GET",
			data: {key1: key1},
			dataType:"json",
			success:function(data) {
				$('#tableunit').html(data.country_table);
				$('#pagination_link').html(data.pagination_link);
				modaltabletutup();
			},
			error: function(data) {
				gagalalert();
				modaltabletutup();
			}
			
		});
	}

	
	$(document).ready(function(){
	    randomNumber = 1;
		load_country_data(randomNumber);
		$(document).on("click", ".pagination li a", function(event){
			event.preventDefault();
			var page = $(this).data("ci-pagination-page");
			randomNumber = page;
			load_country_data(page);
		});
	});

	$(document).ready(function () {

		$("#tambahunit").click(function(e) {
			modaltable();
			$.ajax({
				url: "<?php echo site_url();?>/masterdata/panggiltambahunit",
				type: "GET",
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
		});

	});

	function modaltable() {
		$("#kotaktable").append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
	}

	function modaltabletutup() {
		$(".overlay").remove();
	}

	function tutupmodal(i) {
		$(function () {
			$('#formmodal').modal('toggle');
		});
		suksesalert(i);
		load_country_data(randomNumber);
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
			url: "<?php echo site_url();?>/masterdata/panggileditunit",
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
                            url: "<?php echo site_url();?>/masterdata/deleteunit",
                            type: "GET",
                            data : {
                                id: id
                            },
                            success: function (ajaxData){
                                if (ajaxData == "1") {
                                    suksesalert(2);
                                    load_country_data(randomNumber);
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
