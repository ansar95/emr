<script src="<?php echo base_url();?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="<?php echo base_url();?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script src="<?php echo base_url();?>assets/dist/js/notify.min.js"></script>
<script src="<?php echo base_url();?>assets/dist/js/jquery-confirm.min.js"></script>

<div class="modal fade" id="formmodal" data-backdrop="static" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false">

<script type="text/javascript">
    function untukheader() {
        $('#tglresep').datepicker({ autoclose: true }).datepicker("setDate", "0");
        $('#gol').select2();
        $('#unit').select2();
        $('#dokter').select2();
    }

	$(document).ready(function(){
		untukheader();
        modaldetail();
	});

	function addresep() {
        modaldetail();
        $.ajax({
            url: "<?php echo site_url();?>/depoapotik/tambahobat",
            type: "GET",
            success: function (ajaxData){
                $("#formmodal").html(ajaxData);
                $("#formmodal").modal('show',{backdrop: 'true'});
                modaldetailtutup();
            },
            error: function(data) {
                gagalalert();
                modaldetailtutup();
            }
        });
    }

	function modalheader() {
		$("#kotakheader").append('<div class="overlay" id="headermodal"><i class="fa fa-lock"></i></div>');
	}

	function modalheadertutup() {
		$("#headermodal").remove();
	}

    function modaldetail() {
        $("#kotakdetail").append('<div class="overlay" id="detailmodal"><i class="fa fa-lock"></i></div>');
    }

    function modaldetailtutup() {
        $("#detailmodal").remove();
    }

    function statuspasien(tipe) {
        if (tipe.value == "Umum") {
            $("#nama").prop("disabled", false);
            $("#kartu").prop("disabled", false);
            $.ajax({
                url: "<?php echo site_url();?>/depoapotik/unitheader",
                type: "GET",
            }).then(function (data) {
                $("#unit option").remove();
                var t = JSON.parse(data);
                dataunit = t.dtpasien;

                t.dtunit.forEach(function(entry) {
                    var option = new Option(entry.nama_unit, entry.kode_unit, false, false);
                    $('#unit').append(option).trigger('change');
                });
            }, function (err) {

            });
        } else {
            $("#nama").prop("disabled", true);
            $("#kartu").prop("disabled", true);
        }
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

	function carirm() {
        var norm = $("#norm").val();
        var tipe = $("input[name='tipe']:checked").val();
        console.log(tipe);
        if (tipe == "Umum") {
            return;
        }

        if (norm.length < 6) {
            $("#nama").val("");
            return;
        }
        $.ajax({
            console.log('masuk');
            url: "<?php echo site_url();?>/depoapotik/caridatarm",
            type: "GET",
            data : {rm: norm, tipe: tipe},
        }).then(function (data) {
            // $("#unit option").remove();
            var t = JSON.parse(data);
            dataunit = t.dtpasien;
            $("#nama").val(t.dtpasien[0].nama_pasien);
            $("#sjp").val(t.dtpasien[0].notransaksi);
            $("#kartu").val(t.dtpasien[0].no_askes);
            if (tipe == "Umum") {
                t.dtunit.forEach(function(entry) {
                    var option = new Option(entry.nama_unit, entry.kode_unit, false, false);
                    $('#unit').append(option).trigger('change');
                });
            } else {
                t.dtpasien.forEach(function(entry) {
                    var option = new Option(entry.nama_unit, entry.kode_unit, false, false);
                    $('#unit').append(option).trigger('change');
                });
            }
        }, function (err) {

        });
    }

    $(document).ready(function () {

        // $("#rm").on('input',function(e){
        //
        // });
    });

    function prosesheader() {
        var norm = $("#norm").val();
        var nama = $("#nama").val();
        var kartu = $("#kartu").val();
        var gol = $("#gol").val();
        var tglresep = $("#tglresep").val();
        var unit = $("#unit").val();
        var unittext = $("#unit option:selected" ).text();
        var sjp = $("#sjp").val();
        var dokter = $("#dokter").val();
        var doktertext = $("#dokter option:selected" ).text();
        var racik = $("#racik").val();
        var nonracik = $("#nonracik").val();
        if ((norm == "") || (nama == "") || (gol == "") || (tglresep == "") || (unit == "") || (dokter == "")) {
            kuranglengkap();
            return;
        }
        $("#norm").prop("disabled", true);
        $("#nama").prop("disabled", true);
        $("#kartu").prop("disabled", true);
        $("#gol").prop("disabled", true);
        $("#tglresep").prop("disabled", true);
        $("#unit").prop("disabled", true);
        $("#sjp").prop("disabled", true);
        $("#dokter").prop("disabled", true);
        $("#racik").prop("disabled", true);
        $("#nonracik").prop("disabled", true);
        modaldetailtutup();
    }

	function panggileditdetail(id) {
        modaldetail();
        $.ajax({
            url: "<?php echo site_url();?>/depoapotik/editobat",
            type: "GET",
            data: {
                id: id
            },
            success: function (ajaxData){
                $("#formmodal").html(ajaxData);
                $("#formmodal").modal('show',{backdrop: 'true'});
                modaldetailtutup();
            },
            error: function(data) {
                gagalalert();
                modaldetailtutup();
            }
        });
	}
	
    function panggilnotrans() {
        modalheadertutup();
        modaldetailtutup();
        modalheader();
        modaldetail();
        $.confirm({
            title: 'Resep',
            content: '' +
            '<form action="" class="formName">' +
            '<div class="form-group">' +
            '<label>Input No. Transaksi</label>' +
            '<input type="text" class="name form-control" required />' +
            '</div>' +
            '</form>',
            buttons: {
                formSubmit: {
                    text: 'Kirim',
                    btnClass: 'btn-blue',
                    action: function () {
                        var name = this.$content.find('.name').val();
                        if(!name){
                            $.alert('Data tidak Boleh Kosong');
                            return false;
                        }
                        console.log(name);
                        $.ajax({
                            url: "<?php echo site_url();?>/depoapotik/dataresep",
                            type: "GET",
                            data: {
                                noresep: name
                            },
                            success: function (ajaxData){
                                var dt = JSON.parse(ajaxData);
                                console.log(dt);
                                if (dt.dtstatus == true) {
                                    console.log(dt.dtheader.kode_unit);
                                    $("#norep").val(dt.dtheader.noresep);
                                    $("#norm").val(dt.dtheader.no_rm);
                                    $("#nama").val(dt.dtheader.noresep);
                                    $("#kartu").val(dt.dtheader.nosjp);
                                    $("#gol").val(""+dt.dtheader.idgolongan+"").trigger('change');
                                    $("#tglresep").val(dt.dtheader.tglresep);
                                    $("#unit").val(""+dt.dtheader.kode_unit+"").trigger('change');
                                    $("#sjp").val(dt.dtheader.notraksaksi);
                                    $("#dokter").val(""+dt.dtheader.kode_dokter+"").trigger('change');
                                    $("#racik").val(dt.dtheader.racik);
                                    $("#nonracik").val(dt.dtheader.nonracik);

                                    $("#norm").prop("disabled", true);
                                    $("#nama").prop("disabled", true);
                                    $("#kartu").prop("disabled", true);
                                    $("#gol").prop("disabled", true);
                                    $("#tglresep").prop("disabled", true);
                                    $("#unit").prop("disabled", true);
                                    $("#sjp").prop("disabled", true);
                                    $("#dokter").prop("disabled", true);
                                    $("#racik").prop("disabled", true);
                                    $("#nonracik").prop("disabled", true);
                                    modalheadertutup();
                                    modaldetailtutup();
                                    $("#tabledetailresep").html(dt.dtview);
                                    suksesalert(0);
                                } else {
                                    gagalalert();
                                    modalheadertutup();
                                    modaldetailtutup();
                                    modalheader();
                                    modaldetail();
                                }
                            },
                            error: function(data) {
                                gagalalert();
                                modalheadertutup();
                                modaldetailtutup();
                                modalheader();
                                modaldetail();

                            }
                        });
                    }
                },
                batal: function () {
                    //close
                },
            },
            onContentReady: function () {
                // bind to events
                var jc = this;
                this.$content.find('form').on('submit', function (e) {
                    // if the user submits the form by pressing enter in the field.
                    e.preventDefault();
                    jc.$$formSubmit.trigger('click'); // reference the button and click it
                });
            }
        });
    }

    function panggilhapusdetail(id) {
        var norep = document.getElementById("norep").value;
        $.confirm({
            title: 'Hapus Detail',
            buttons: {
                hapus: {
                    text: 'Hapus',
                    btnClass: 'btn-red',
                    keys: ['enter', 'shift'],
                    action: function(){
                        $.ajax({
                            url: "<?php echo site_url();?>/depoapotik/hapusdepo",
                            type: "GET",
                            data: {
                                id: id,
                                norep: norep
                            },
                            success: function (ajaxData){
                                var dt = JSON.parse(ajaxData);
                                console.log(dt);
                                if (dt.stat == true) {
                                    modalheadertutup();
                                    modaldetailtutup();
                                    $("#tabledetailresep").html(dt.dtview);
                                    suksesalert(2);
                                } else {
                                    gagalalert()
                                }
                            },
                            error: function(data) {
                                gagalalert();
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

    function panggilcekdetail(id) {
        var norep = document.getElementById("norep").value;
        $.confirm({
            title: 'Proses Obat',
            buttons: {
                hapus: {
                    text: 'Hapus',
                    btnClass: 'btn-red',
                    keys: ['enter', 'shift'],
                    action: function(){
                        $.ajax({
                            url: "<?php echo site_url();?>/depoapotik/hapusdepo",
                            type: "GET",
                            data: {
                                id: id,
                                norep: norep
                            },
                            success: function (ajaxData){
                                var dt = JSON.parse(ajaxData);
                                console.log(dt);
                                if (dt.stat == true) {
                                    modalheadertutup();
                                    modaldetailtutup();
                                    $("#tabledetailresep").html(dt.dtview);
                                    suksesalert(2);
                                } else {
                                    gagalalert()
                                }
                            },
                            error: function(data) {
                                gagalalert();
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
</script>
