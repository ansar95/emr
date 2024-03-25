<script src="<?php echo base_url();?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="<?php echo base_url();?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script src="<?php echo base_url();?>assets/dist/js/notify.min.js"></script>
<script src="<?php echo base_url();?>assets/dist/js/jquery-confirm.min.js"></script>

<div class="modal fade" id="formmodal" data-backdrop="static" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false">

    <script type="text/javascript">

        var kodedrop = "";
        var kodeunit = "";
        var unit = "";
        var idampra = "";

        function untukheader() {
            $('#tgl').datepicker({ autoclose: true }).datepicker("setDate", "0");
        }

        $(document).ready(function(){
            modaldetail();
            modalunit();
            untukheader();
        });

        function modalunit() {
            $("#kotakunit").append('<div class="overlay" id="unitmodal"><i class="fa fa-lock"></i></div>');
        }

        function modalunittutup() {
            $("#unitmodal").remove();
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

        function prosescari() {
            var tgl = $("#tgl").val();

            if (tgl == "") {
                kuranglengkap()
                return;
            }
            
            $.ajax({
                url: "<?php echo site_url();?>/fakturpelayanan/cariunitbydate",
                type: "GET",
                data: {tgl: tgl},
                success: function (ajaxData){
                    var dt = JSON.parse(ajaxData);
                    if (dt.stat == true) {
                        $("#tablenamaunit").html(dt.dtview);
                        $("#kotakdetail").html("");
                        modaldetailtutup();
                        modaldetail();
                        modalunittutup();
                    } else {
                        $.notify("Data tidak ditemukan","error");
                        $("#tablenamaunit tbody").html('<tr><td colspan="3" class="text-center">Tidak Ada Data</td></tr>');
                        $("#kotakdetail").html("");
                        modaldetailtutup();
                        modaldetail();
                        modalunittutup();
                        modalunit();
                    }
                },
                error: function(data) {
                    gagalalert();
                    modalunittutup();
                }
            });
        }

        function prosesambildetail(kode, nama, ampra) {
            var tgl = $("#tgl").val();

            if (tgl == "") {
                kuranglengkap()
                return;
            }

            kodeunit = kode;
            unit = nama;
            idampra = ampra;
            
            $.ajax({
                url: "<?php echo site_url();?>/fakturpelayanan/ambildetailunit",
                type: "GET",
                data: {tgl: tgl, kode: kode, unit: unit},
                success: function (ajaxData){
                    var dt = JSON.parse(ajaxData);
                    if (dt.stat == true) {
                        $("#kotakdetail").html(dt.dtview);
                        modaldetailtutup();
                    } else {
                        $.notify("Data tidak ditemukan","error");
                        modaldetailtutup();
                    }
                },
                error: function(data) {
                    gagalalert();
                    modaldetailtutup();
                }
            });
        }

        function panggildrop(id) {
            modaldetail();
            kodedrop = id;
            $.ajax({
                url: "<?php echo site_url();?>/fakturpelayanan/tambahdetaildropping",
                type: "GET",
                data: {id: id},
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

        function panggiltambahdrop() {
            modaldetail();
            $.ajax({
                url: "<?php echo site_url();?>/fakturpelayanan/panggiltambahdetaildropping",
                type: "GET",
                // data: {id: id},
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

        function panggilhapusdropping(id) {
            var tgl = $("#tgl").val();
            $.confirm({
                title: 'Hapus Detail Dropping',
                buttons: {
                    hapus: {
                        text: 'Hapus',
                        btnClass: 'btn-red',
                        keys: ['enter', 'shift'],
                        action: function(){
                            $.ajax({
                                url: "<?php echo site_url();?>/fakturpelayanan/hapusdropping",
                                type: "GET",
                                data: {
                                    id: id,
                                    kode: kodeunit,
                                    tgl: tgl
                                },
                                success: function (ajaxData){
                                    var dt = JSON.parse(ajaxData);
                                    if (dt.stat == true) {
                                        $("#kotakdetail").html(dt.dtview);
                                        modaldetailtutup();
                                    } else {
                                        $.notify("Data tidak dapat diproses", "error");
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
