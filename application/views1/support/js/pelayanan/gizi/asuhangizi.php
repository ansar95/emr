<script src="<?php echo base_url();?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="<?php echo base_url();?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script src="<?php echo base_url();?>assets/dist/js/notify.min.js"></script>
<script src="<?php echo base_url();?>assets/dist/js/jquery-confirm.min.js"></script>

<div class="modal fade" id="formmodal" data-backdrop="static" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false">

<script type="text/javascript">
	function prosesload() {
		$("#kotak").append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
	}

	function hapusload() {
		$(".overlay").remove();
	}

	function tglmasuk() {
        prosesload();
        var tanggal = document.getElementById("tgl").value;
		var kode_unit = document.getElementById("ruang").value;
        $.ajax({
            url: "<?php echo site_url();?>/gizi/caripasiengizi",
            type: "GET",
            data : {
				tanggal : tanggal,
				kode_unit : kode_unit
				},
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

	// $(document).ready(function () {
	// 	tglmasuk();
	// });


	$(document).ready(function(){
			// load_country_data(1);
			$('#tgl').datepicker({ autoclose: true }).datepicker("setDate", "0");
			$("#ruang").select2();
			$('#tgl2').datepicker({ autoclose: true }).datepicker("setDate", "0");
	});


	function modaltable() {
		$("#kotaktable").append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
	}

	function modaltabletutup() {
		$(".overlay").remove();
	}

	function tutupmodalxx() {
		$(function () {
			$('#formmodal').modal('toggle');
		});
		suksesalert(0);
		load_country_data(1);
	}

	function tutupmodal2() {
		$(function () {
			$('#formmodal').modal('toggle');
		});
		suksesalert(0);
		// load_country_data(1);
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

	function ambildatasebelumnya() {
        prosesload();
        var tanggal = document.getElementById("tgl").value;
		var kode_unit = document.getElementById("ruang").value;
        $.ajax({
            url: "<?php echo site_url();?>/gizi/ambildatasebelumnya",
            type: "GET",
            data : {
				tanggal : tanggal,
				kode_unit : kode_unit
				},
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


	function prosesgizi(id) {
		modaltable();
			$.ajax({
				url: "<?php echo site_url();?>/gizi/prosesgizi",
				type: "GET",
				data: {id: id},
				success: function (ajaxData){
					// console.log(id);
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
	

	// function hapuspasien() {

	// }

	function hapuspasien(id) {
        $.confirm({
            title: 'Hapus Data',
            // content: 'Yakin menghapus ' + nmpasien + '?',
            content: 'Yakin menghapus ?',
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
						var tanggal = document.getElementById("tgl").value;
						var kode_unit = document.getElementById("ruang").value;
                        $.ajax({
                            url: "<?php echo site_url();?>/gizi/deletediet",
                            type: "GET",
                            data : {
                                id: id,
								tanggal:tanggal,
								kode_unit:kode_unit
                            },
                            success: function (ajaxData){
								var t = $.parseJSON(ajaxData);
								if (t.dtsimpan == true) {
									// console.log(t.dtview);
									modaltabletutup();
									$("#barispasien tbody tr").remove();
									$("#barispasien tbody").append(t.dtview);
									
								} else {
									tdgagalalert();
									modaltabletutup();
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

 // ================= cetak etiket 
 	function cetaketiketgizipagi(id) {
        var win = window.open("<?php echo site_url();?>/sampul/cetaketiketpagi/" + id, '_blank');
		win.focus();
    }

	function cetaketiketgizisiang(id) {
        var win = window.open("<?php echo site_url();?>/sampul/cetaketiketsiang/" + id, '_blank');
		win.focus();
    }

	function cetaketiketgizimalam(id) {
        var win = window.open("<?php echo site_url();?>/sampul/cetaketiketmalam/" + id, '_blank');
		win.focus();
    }

	function cetaketiketgizipagisemua(ruang,tgl) {
		var ruang = document.getElementById("ruang").value;
		var tgl = document.getElementById("tgl").value;
		var tglx= tgl.substr(6, 4)+'-'+tgl.substr(0, 2)+'-'+tgl.substr(3, 2) 
        var win = window.open("<?php echo site_url();?>/sampul/cetaketiketpagisemua/" + ruang +"/"+ tglx , '_blank');
		win.focus();
    }

	function cetaketiketgizisiangsemua(ruang,tgl) {
		var ruang = document.getElementById("ruang").value;
		var tgl = document.getElementById("tgl").value;
		var tglx= tgl.substr(6, 4)+'-'+tgl.substr(0, 2)+'-'+tgl.substr(3, 2) 
        var win = window.open("<?php echo site_url();?>/sampul/cetaketiketsiangsemua/" + ruang +"/"+ tglx , '_blank');
		win.focus();
    }

	function cetaketiketgizimalamsemua(ruang,tgl) {
		var ruang = document.getElementById("ruang").value;
		var tgl = document.getElementById("tgl").value;
		var tglx= tgl.substr(6, 4)+'-'+tgl.substr(0, 2)+'-'+tgl.substr(3, 2) 
        var win = window.open("<?php echo site_url();?>/sampul/cetaketiketmalamsemua/" + ruang +"/"+ tglx , '_blank');
		win.focus();
    }

	function cetaketiketgizisnack(id) {
        var win = window.open("<?php echo site_url();?>/sampul/cetaketiketsnack/" + id, '_blank');
		win.focus();
    }

	function cetaketiketgizisnacksemua(ruang,tgl) {
		var ruang = document.getElementById("ruang").value;
		var tgl = document.getElementById("tgl").value;
		var tglx= tgl.substr(6, 4)+'-'+tgl.substr(0, 2)+'-'+tgl.substr(3, 2) 
        var win = window.open("<?php echo site_url();?>/sampul/cetaketiketsnacksemua/" + ruang +"/"+ tglx , '_blank');
		win.focus();
    }

// 09/08/2021
// 0123456789

	</script>
