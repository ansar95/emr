<script src="<?php echo base_url();?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="<?php echo base_url();?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script src="<?php echo base_url();?>assets/dist/js/notify.min.js"></script>
<script src="<?php echo base_url();?>assets/dist/js/jquery-confirm.min.js"></script>

<div class="modal fade" id="formmodal" data-backdrop="static" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false">

<script type="text/javascript">

    $(function() {
        // $('#period').datepicker( {
        //     format: "MM yyyy",
        //     viewMode: "months",
        //     minViewMode: "months",
        //     autoclose: true,
            // beforeShow: function (input) {
            //     $(input).css({
            //         "position": "relative",
            //         "z-index": 999999
            //     });
            // },
            // onClose: function () { $('.ui-datepicker').css({ 'z-index': 0  } ); }
        // });
        // $('#unit').select2();
        // modaldetail();
    });

    function modaldetail() {
        $("#kotakdetail").append('<div class="overlay" id="detailmodal"><i class="fa fa-lock"></i></div>');
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

    function panggilform() {
        // modaltable();
        $.ajax({
            url: "<?php echo site_url();?>/keuangan/panggiltambahanggaran",
            type: "GET",
            success: function (ajaxData){
                $("#formmodal").html(ajaxData);
                $("#formmodal").modal('show',{backdrop: 'true'});
                // modaltabletutup();
            },
            error: function(data) {
                gagalalert();
                // modalloadtutup();
            }
        });
    }

    function lanjutproses() {
        var period = $("#period").val();
        var unit = $("#unit").val();
        var unittext = $("#unit option:selected" ).text();
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

</script>
