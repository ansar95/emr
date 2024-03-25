<script src="<?php echo base_url();?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="<?php echo base_url();?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script src="<?php echo base_url();?>assets/dist/js/notify.min.js"></script>
<script src="<?php echo base_url();?>assets/dist/js/jquery-confirm.min.js"></script>

<div class="modal fade" id="formmodal" data-backdrop="static" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false">

<script type="text/javascript">

    var tglaktif = "";

    $(function() {
        $('#period').datepicker( {
            format: "MM yyyy",
            viewMode: "months",
            minViewMode: "months",
            autoclose: true
        });

        $('#period').on('dp.hide', function(event){
            setTimeout(function(){
                // $('#period').data('DateTimePicker').viewMode('months').format("MM yyyy");
                $('#period').datepicker( {
                    format: "MM yyyy",
                    viewMode: "months",
                    minViewMode: "months",
                    autoclose: true
                });
            },1);
        });
        $('#unit').select2();
        modaldetail();
    });

    function modaldetail() {
        $("#kotakdetail").append('<div class="overlay" id="detailmodal"><div class="d-flex justify-content-center py-5"><i class="fa fa-lock"></i></div>');
    }

    function modaldetailtutup() {
        $("#detailmodal").remove();
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

    function lanjutproses() {
        var period = $("#period").val();
        var unit = $("#unit").val();
        var unittext = $("#unit option:selected" ).text();
        if (period == "" ) {
            kuranglengkap();
            return;
        }
        $.ajax({
            url: "<?php echo site_url();?>/ampra/caritglorder",
            type: "GET",
            data: {
                unit: unit,
                unittext: unittext,
                period: period
            },
            success: function (ajaxData){
                var dt = JSON.parse(ajaxData);
                $("#tabletanggal").html(dt.dtview);
                $("#tableampra tbody").html('<tr><td colspan="9" class="text-center">Tidak Ada Data</td></tr>');
                modaldetailtutup();
            },
            error: function(data) {
                gagalalert();
                modaldetailtutup();
            }
        });
    }

    function gantiunit() {
        modaldetailtutup();
        modaldetail();
    }

    function untukscroll() {
        // Change the selector if needed
        var $table = $('table.scroll'),
            $bodyCells = $table.find('tbody tr:first').children(),
            colWidth;

        // Adjust the width of thead cells when window resizes
        $(window).resize(function() {
            // Get the tbody columns width array
            colWidth = $bodyCells.map(function() {
                return $(this).width();
            }).get();

            // Set the width of thead columns
            $table.find('thead tr').children().each(function(i, v) {
                $(v).width(colWidth[i]);
            });
        }).resize(); // Trigger resize handler

        $("table.scroll tr").click(function(){
            $(this).addClass('selected').siblings().removeClass('selected');
            var value=$(this).find('td:first').html();
            tglaktif = value;
            detailbydate();
        });
    }

    function detailbydate() {
        var unit = $("#unit").val();
        $.ajax({
            url: "<?php echo site_url();?>/ampra/ambildatatanggalamprabhp",
            type: "GET",
            data: {
                tgl: tglaktif,
                unit:unit
            },
            success: function (ajaxData){
                var dt = JSON.parse(ajaxData);
                $("#tableampra").html(dt.dtview);
                modaldetailtutup();
            },
            error: function(data) {
                gagalalert();
                modaldetailtutup();
            }
        });
    }

    function addampra() {
        modaldetail();
        $.ajax({
            url: "<?php echo site_url();?>/ampra/tambahampra",
            type: "GET",
            data: {
                tgl: tglaktif,
                bhp : 0
            },
            success: function (ajaxData) {
                $("#formmodal").html(ajaxData);
                $("#formmodal").modal('show', {backdrop: 'true'});
                modaldetailtutup();
            },
            error: function (data) {
                gagalalert();
                modaldetailtutup();
            }
        });
    }

    function addamprabhp() {
        modaldetail();
        $.ajax({
            url: "<?php echo site_url();?>/ampra/tambahampra",
            type: "GET",
            data: {
                tgl: tglaktif,
                bhp : 1
            },
            success: function (ajaxData) {
                $("#formmodal").html(ajaxData);
                $("#formmodal").modal('show', {backdrop: 'true'});
                modaldetailtutup();
            },
            error: function (data) {
                gagalalert();
                modaldetailtutup();
            }
        });
    }

    function tutupmodal() {
        $(function () {
            $('#formmodal').modal('toggle');
        });
        suksesalert(0);
    }

    function panggileditdetail(id) {
        modaldetail();
        $.ajax({
            url: "<?php echo site_url();?>/ampra/editamprabhp",
            type: "GET",
            data: {
                id: id,
                tgl: tglaktif
            },
            success: function (ajaxData){
                if (ajaxData == "") {
                    $.notify("Data tidak diizinkan diubah, Qty Drop sudah terisi", "error");
                    modaldetailtutup();
                } else {
                    $("#formmodal").html(ajaxData);
                    $("#formmodal").modal('show',{backdrop: 'true'});
                    modaldetailtutup();
                }
            },
            error: function(data) {
                gagalalert();
                modaldetailtutup();
            }
        });
	}

    function panggilhapusdetail(id) {
        $.confirm({
            title: 'Hapus Detail',
            buttons: {
                hapus: {
                    text: 'Hapus',
                    btnClass: 'btn-red',
                    keys: ['enter', 'shift'],
                    action: function(){
                        $.ajax({
                            url: "<?php echo site_url();?>/ampra/hapusamprabhp",
                            type: "GET",
                            data: {
                                id: id
                            },
                            success: function (ajaxData){
                                var dt = JSON.parse(ajaxData);
                                
                                if (dt.stat == true) {
                                    $("#tableampra").html(dt.dtview);
                                    modaldetailtutup();
                                } else {
                                    $.notify("Data tidak diizinkan diubah, Qty Drop sudah terisi", "error");
                                    modaldetailtutup();
                                }
                            },
                            error: function(data) {
                                gagalalert();
                                modaldetailtutup();
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
