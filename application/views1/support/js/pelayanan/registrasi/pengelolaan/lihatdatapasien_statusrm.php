<script src="<?php echo base_url(); ?>assets/template_baru/dist/vendors/select2/js/select2.full.min.js"></script>
<script src="<?php echo base_url(); ?>assets/template_baru/dist/js/select2.script.js"></script>
<script src="<?php echo base_url();?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script src="<?php echo base_url();?>assets/dist/js/notify.min.js"></script>
<script src="<?php echo base_url();?>assets/dist/js/jquery-confirm.min.js"></script>

<div class="modal fade" id="formmodal" data-backdrop="static" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false">

<script type="text/javascript">

	function prosesload() {
		$("#kotak").append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
	}

	function prosesloadhist() {
		$("#kotakhistory").append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
	}

	function hapusload() {
		$(".overlay").remove();
	}

	function tutupmodal() {
		$(function () {
			$('#formmodal').modal('toggle');
		});
	}

    function filterrm() {
        var rm = document.getElementById("rm").value;
        if ((rm == "") || (rm == null)) {
            $.notify("No. RM Kosong", "error");
            return;
        }
        $("#unit").val("-");
        $('#unit').select2().trigger('change');
        load_data(1);
    }

    function filterrm_all() {
        var rm = document.getElementById("rm_all").value;
        if ((rm == "") || (rm == null)) {
            $.notify("No. RM Kosong", "error");
            return;
        }
        // $("#unit").val("-");
        // $('#unit').select2().trigger('change');
        load_data_all(1);
    }

    function filterunit() {
        var unit = $("#unit").val();
        if ((unit == "") || (unit == null)) {
            $.notify("Pilih Unit terlebih dahulu", "error");
            return;
        }
        $("#rm").val("");
        load_data(1);
    }

    function filternon() {
        $("#rm").val("");
        $("#unit").val("---------");
        $('#unit').select2().trigger('change');
        load_data(1);
    }

	function load_data(page) {
		prosesload();
		var nrm = document.getElementById("rm").value;
		var kodeunit = $("#unit").val();
		$.ajax({
			url:"<?php echo site_url();?>/registrasipasien/paginationpengelolaanstatusrm/"+page,
			method:"GET",
			dataType:"json",
			data : {nrm: nrm, kodeunit: kodeunit},
			success:function(data) {
				hapusload();
				$('#tablepasien').html(data.pasien);
				$('#pagination_link').html(data.pagination_link);
			}
		});
	}

    function load_data_all(page) {
		prosesload();
		var nrm = document.getElementById("rm_all").value;
		var kodeunit = $("#unit").val();
		$.ajax({
			url:"<?php echo site_url();?>/registrasipasien/paginationpengelolaanstatusrm_all/"+page,
			method:"GET",
			dataType:"json",
			data : {nrm: nrm, kodeunit: kodeunit},
			success:function(data) {
				hapusload();
				$('#tablepasien_all').html(data.pasien);
				$('#pagination_link_all').html(data.pagination_link_all);
			}
		});
	}

	$(document).ready(function () {
        $('#tgl').datepicker({ autoclose: true });
		// $("#unit").select2();
		load_data(1);
		$(document).on("click", "#dtpasien li a", function(event){
			event.preventDefault();
			var page = $(this).data("ci-pagination-page");
			load_data(page);
		});
	});

	var dataid = "";

	function panggilpindahkamar(id) {
        dataid = id;
        $.ajax({
            url: "<?php echo site_url();?>/registrasipasien/pengelolaanpindahkamar",
            type: "GET",
            data: {id: id},
            success: function (ajaxData) {
                // console.log(ajaxdata);
                $("#formmodal").html(ajaxData);
                $("#formmodal").modal('show', {backdrop: 'true'});
            }
        });
    }

    function pasienkembali(e, id) {
        var txt = $(e).parents('tr').find("td:eq(5)").text();
        $.confirm({
            title: 'Kembalikan Pasien',
            content: 'Yakin Pasien dari Unit ' + txt + ' Dikembalikan?',
            buttons: {
                batal: {
                    text: 'Batal',
                    btnClass: 'btn-red',
                    action: function(){

                    }
                },
                kembali: {
                    text: 'Kembalikan',
                    btnClass: 'btn-blue',
                    keys: ['enter'],
                    action: function(){
						prosesload();
                        $.ajax({
                            url: "<?php echo site_url();?>/kelolapasien/kembalikanpasieninap",
                            type: "GET",
                            data : {
                                id: id
                            },
                            success: function (ajaxData){
                                var t = $.parseJSON(ajaxData);
                                if (t.stat == true) {
                                    hapusload();
                                    load_data(1);
                                } else {
                                    $.notify("Pasien tidak dizinkan dikembalikan, karena sudah diberi tindakan", "error");
                                    hapusload();
                                }
                            },
                            error: function (ajaxData) {
                                $.notify("Terjasdi Kesalahan", "error");
                                hapusload();
                            }
                        });
                    }
                }
            }
        });
    }

	function panggillihat(id) {
		dataid = id;
		$.ajax({
			url: "<?php echo site_url();?>/registrasipasien/lihatdatapasien",
			type: "GET",
			data: {id: id},
			success: function (ajaxData){
				// console.log(ajaxdata);
				$("#formmodal").html(ajaxData);
				$("#formmodal").modal('show',{backdrop: 'true'});
			}
		});
	}

	function panggileditpasien(id) {
	    console.log(id);
        $.ajax({
            url: "<?php echo site_url();?>/registrasipasien/formubahpasien",
            type: "GET",
	        data: {
                dataid: id
	        },
            success: function (ajaxData){
                // console.log(ajaxdata);
                $("#formmodal").html(ajaxData);
                $("#formmodal").modal('show',{backdrop: 'true'});
            }
        });
    }

    function hapuspasien(id) {
        $.confirm({
            title: 'Hapus Data',
            content: 'Yakin Data Pasien Dihapus?',
            buttons: {
                batal: {
                    text: 'Batal',
                    btnClass: 'btn-red',
                    action: function(){

                    }
                },
                kembali: {
                    text: 'Hapus',
                    btnClass: 'btn-blue',
                    keys: ['enter'],
                    action: function(){
                        $.ajax({
                            url: "<?php echo site_url();?>/registrasipasien/prosesdeletedatapasien",
                            type: "GET",
                            data : {
                                id: id
                            },
                            success: function (ajaxData){
                                var t = $.parseJSON(ajaxData);
                                if (t == true) {
                                    $.alert("Sukses Menghapus Data");
                                    load_data(1);
                                } else {
                                    $.alert("Gagal Menghapus Data");
                                }
                            },
                            error: function (ajaxData) {
                                $.alert("Terjadi Kesalahan");
                            }
                        });
                    }
                }
            }
        });
    }

    function tracer(id) {
        var win = window.open("<?php echo site_url();?>/registrasipasien/tracerstatusrm/" + id, '_blank');
		win.focus();
    }
        
    function kirim(id) {
		dataid = id;
		console.log(id);

		$.ajax({
			url: "<?php echo site_url();?>/registrasipasien/kirimberkas",
			type: "GET",
			data: {id: dataid},
			success: function (ajaxData){
                load_data(1);
                // var page = $(this).data("ci-pagination-page");
			    // load_data(page);
				// $("#formmodal").html(ajaxData);
				// $("#formmodal").modal('show',{backdrop: 'true'});
			}
		});
	}

    function tidakada(id) {
		dataid = id;
		$.ajax({
			url: "<?php echo site_url();?>/registrasipasien/tidakadaberkas",
			type: "GET",
			data: {id: dataid},
			success: function (ajaxData){
                load_data(1);
			}
		});
	}

    function rinap(id) {
		dataid = id;
		$.ajax({
			url: "<?php echo site_url();?>/registrasipasien/kerawatinap",
			type: "GET",
			data: {id: dataid},
			success: function (ajaxData){
                load_data(1);
			}
		});
	}

    function kembali(id) {
		dataid = id;
		$.ajax({
			url: "<?php echo site_url();?>/registrasipasien/kembaliberkas",
			type: "GET",
			data: {id: dataid},
			success: function (ajaxData){
                load_data(1);
			}
		});
	}

   
</script>

