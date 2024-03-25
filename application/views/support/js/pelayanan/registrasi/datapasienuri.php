<script src="<?php echo base_url(); ?>assets/template_baru/dist/vendors/select2/js/select2.full.min.js"></script>
<script src="<?php echo base_url(); ?>assets/template_baru/dist/js/select2.script.js"></script>
<script src="<?php echo base_url();?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script src="<?php echo base_url();?>assets/dist/js/notify.min.js"></script>
<script src="<?php echo base_url();?>assets/dist/js/jquery-confirm.min.js"></script>


<div class="modal fade" id="formmodal" data-backdrop="static" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false">



<script type="text/javascript">
    $.fn.datepicker.noConflict();
    $(function() {
        $('#tglregis').datepicker({
            autoclose: true,
            dateFormat: 'dd-mm-yy',
            changeMonth: true,
            changeYear: true,
            yearRange: "-10:+00"
        }).datepicker("setDate", "0");
    });


	function prosesload() {
		$("#kotak").append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
	}

	function hapusload() {
		$(".overlay").remove();
	}

	$(document).ready(function () {
		$("#tambahdata").click(function(e) {
			$.ajax({
				url: "<?php echo site_url();?>/registrasipasien/inputpasien",
				type: "GET",
				success: function (ajaxData){
					// console.log(ajaxdata);
					$("#formmodal").html(ajaxData);
					$("#formmodal").modal('show',{backdrop: 'true'});
				}
			});
		});
	});
	
	function tglmasuk() {
        prosesload();
        var tglp = document.getElementById("tglregis").value;
        $("#nrp").val("");
        $.ajax({
            url: "<?php echo site_url();?>/registrasipasien/caripasienuri",
            type: "GET",
            data : {tglp: tglp},
            success: function (ajaxData){
                $("#barispasien tbody tr").remove();
                $("#barispasien tbody").append(ajaxData);
                hapusload();
            },
            error: function (ajaxData) {
                hapusload();
            }
        });
    }
    
    function caridatarm() {
        prosesload();
        var tglp = document.getElementById("tglregis").value;
        var nrp = document.getElementById("nrp").value;
        $.ajax({
            url: "<?php echo site_url();?>/registrasipasien/caripasienuri",
            type: "GET",
            data : {tglp: tglp, nrp: nrp},
            success: function (ajaxData){
                $("#barispasien tbody tr").remove();
                $("#barispasien tbody").append(ajaxData);
                hapusload();
            },
            error: function (ajaxData) {
                hapusload();
            }
        });
    }

	$(document).ready(function () {
		tglmasuk();
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

	function sampul(id) {
		$.confirm({
			closeIcon: true,
			title: 'Cetakan',
			content: '',
			buttons: {
				formKarcis: {
					text: 'Karcis',
					btnClass: 'btn-blue',
					action: function () {
						var win = window.open("<?php echo site_url();?>/sampul/karcisunitinap/" + id, '_blank');
						win.focus();
					}
				},
				formTracer: {
					text: 'Tracer',
					btnClass: 'btn-blue',
					action: function () {
						var win = window.open("<?php echo site_url();?>/sampul/tracerunitinap/" + id, '_blank');
						win.focus();
					}
				},
				formMrdua: {
					text: 'MR 2',
					btnClass: 'btn-blue',
					action: function () {
						var win = window.open("<?php echo site_url();?>/sampul/mrduaunitinap/" + id, '_blank');
						win.focus();
					}
				},
				formFormulir: {
					text: 'Formulir',
					btnClass: 'btn-blue',
					action: function () {
						var win = window.open("<?php echo site_url();?>/sampul/formulirunitinap/" + id, '_blank');
						win.focus();
					}
				},
				formGelang: {
					text: 'Gelang',
					btnClass: 'btn-blue',
					action: function () {
						var win = window.open("<?php echo site_url();?>/sampul/gelangunitinap/" + id, '_blank');
						win.focus();
					}
				},
			},
		});
	}

    function panggilhapusregis(id) {
        $.confirm({
            title: 'Hapus Registrasi',
            buttons: {
                hapus: {
                    text: 'Hapus',
                    btnClass: 'btn btn-danger',
                    keys: ['enter', 'shift'],
                    action: function(){
                        prosesload();
                        var tglp = document.getElementById("tglregis").value;
                        var nrp = document.getElementById("nrp").value;
                        $.ajax({
                            url: "<?php echo site_url();?>/registrasipasien/hapusregisuri",
                            type: "GET",
                            data: {
                                id: id,
                                tglp: tglp,
                                nrp: nrp
                            },
                            success: function (ajaxData){
                                var dt = JSON.parse(ajaxData);
                                console.log(dt);
                                if (dt.stat == true) {
                                    hapusload()
                                    $("#barispasien tbody tr").remove();
                                    $("#barispasien tbody").append(dt.dtview);
                                    $.notify("Berhasil Menghapus Data", "success");
                                } else {
                                    $.notify("Data tidak dapat dihapus, sudah ada proses pelayanan", "error");
                                    hapusload();
                                }
                            },
                            error: function(data) {
                                $.notify("Gagal Memproses Data", "error");
                                hapusload();
                            }
                        });
                    }
                },
                batal: {
                    text: 'Batal',
                    btnClass: 'btn btn-primary',
                    action: function(){
                    }
                }
            }
        });
    }

    function panggileditregis(id) {
        prosesload();
        $.ajax({
            url: "<?php echo site_url();?>/registrasipasien/editregisuri",
            type: "GET",
            data: {
                id: id
            },
            success: function (ajaxData){
                $("#formmodal").html(ajaxData);
                $("#formmodal").modal('show',{backdrop: 'true'});
                hapusload();
            },
            error: function(data) {
                hapusload();
            }
        });
    }


    function cetakkarcis(id) {
        var win = window.open("<?php echo site_url();?>/sampul/karcisunitinap/" + id, '_blank');
		win.focus();
    }

    function cetaktracer(id) {
        var win = window.open("<?php echo site_url();?>/sampul/tracerunitinap/" + id, '_blank');
		win.focus();
    }

    function cetakmr2(id) {
        var win = window.open("<?php echo site_url();?>/sampul/mrduaunitinap/" + id, '_blank');
		win.focus();
    }

    function cetakformulir(id) {
        var win = window.open("<?php echo site_url();?>/sampul/formulirunitinap/" + id, '_blank');
		win.focus();
    }

    function cetakgelang(id) {
        var win = window.open("<?php echo site_url();?>/sampul/gelangunitinap/" + id, '_blank');
		win.focus();
    }

    function cetaksr1(id) {
        var win = window.open("<?php echo site_url();?>/sampul/cetakr11_inap/" + id, '_blank');
		win.focus();
    }

    function cetaksr2(id) {
        var win = window.open("<?php echo site_url();?>/sampul/cetakr12_inap/" + id, '_blank');
		win.focus();
    }

    function cetakregisranap(id) {
        var win = window.open("<?php echo site_url();?>/sampul/printbuktirinap/" + id, '_blank');
		win.focus();
    }

   // ========BPJS========
   function buatsep(id) {
        prosesload();
        $.ajax({
            url: "<?php echo site_url(); ?>/registrasipasien/formsepiri",
            type: "GET",
            data: {
                id: id
            },
            success: function(ajaxData) {
                $("#formmodal").html(ajaxData);
                $("#formmodal").modal('show', {
                    backdrop: 'true'
                });
                hapusload();
            },
            error: function(data) {
                hapusload();
            }
        });
    }

    function editsep(id) {
        prosesload();
        $.ajax({
            url: "<?php echo site_url(); ?>/registrasipasien/formsepiriedit",
            type: "GET",
            data: {
                id: id
            },
            success: function(ajaxData) {
                $("#formmodal").html(ajaxData);
                $("#formmodal").modal('show', {
                    backdrop: 'true'
                });
                hapusload();
            },
            error: function(data) {
                hapusload();
            }
        });
    }
		
    function hapussep(id) {
        prosesload();
        $.ajax({
            url: "<?php echo site_url(); ?>/registrasipasien/formsepirihapus",
            type: "GET",
            data: {
                id: id
            },
            success: function(ajaxData) {
                $("#formmodal").html(ajaxData);
                $("#formmodal").modal('show', {
                    backdrop: 'true'
                });
                hapusload();
            },
            error: function(data) {
                hapusload();
            }
        });
    }

</script>    