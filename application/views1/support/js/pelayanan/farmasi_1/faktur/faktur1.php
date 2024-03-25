<script src="<?php echo base_url();?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="<?php echo base_url();?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script src="<?php echo base_url();?>assets/dist/js/notify.min.js"></script>
<script src="<?php echo base_url();?>assets/dist/js/jquery-confirm.min.js"></script>

<div class="modal fade" id="formmodal" data-backdrop="static" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false">

    <script type="text/javascript">

        function untukheader() {
            $('#tgl').datepicker({ autoclose: true }).datepicker("setDate", "0");
            $('#terima').datepicker({ autoclose: true }).datepicker("setDate", "0");
            $('#vendor').select2();
        }

        $(document).ready(function(){
            modaldetail();
            untukheader();
        });

        function addfaktur() {
            modaldetail();
            $.ajax({
                url: "<?php echo site_url();?>/faktur/tambahfaktur",
                type: "GET",
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

        function modaldetail() {
            $("#kotakdetail").append('<div class="overlay" id="detailmodal"><i class="fa fa-lock"></i></div>');
        }

        function modaldetailtutup() {
            $("#detailmodal").remove();
        }

        function prosesfakturbaru() {
            $("#no").val("");
            $("#tgl").val("");
            $("#terima").val("");
            modaldetailtutup();
            modaldetail();
            $("#no").prop("disabled", false);
            $("#tgl").prop("disabled", false);
            $("#terima").prop("disabled", false);
            $("#vendor").prop("disabled", false);
            $("#ppn").prop("disabled", false);

            $("#tabledetailfaktur").html('<table class="table table-bordered"><tr><th>No.</th>\n' +
                '                                <th>Kode</th>\n' +
                '                                <th>Nama Barang</th>\n' +
                '                                <th>Satuan Stok</th>\n' +
                '                                <th>QTY (Kemasan)</th>\n' +
                '                                <th>Harga (per Kemasan)</th>\n' +
                '                                <th>% Diskon</th>\n' +
                '                                <th>Pot. Langsung</th>\n' +
                '                                <th>Jumlah Harga</th>\n' +
                '                                <th>Isi Dalam Kemasan</th>\n' +
                '                                <th>Expire Date</th>\n' +
                '                                <th>Batch No.</th>\n' +
                '                                <th>Harga Stok Sementara</th>\n' +
                '                                <th>Harga Stok</th><th>Hapus</th></tr><tr><td colspan="15" class="text-center">Tidak Ada Data</td></tr></table>');
        }

        function prosesheader() {
            var no = $("#no").val();
            var tgl = $("#tgl").val();
            var terima = $("#terima").val();
            var vendor = $("#vendor").val();

            if ((no == "") || (tgl == "") || (terima == "") || (vendor == "")) {
                kuranglengkap()
                return;
            }
            $.ajax({
                url: "<?php echo site_url();?>/faktur/simpanfakturheader",
                type: "GET",
                data: {no: no},
                success: function (ajaxData){
                    var dt = JSON.parse(ajaxData);
                    if (dt.stat.sukses == true) {
                        console.log(dt.stat.header);
                        var datetgl = new Date(dt.stat.header.tglbeli);
                        $('#tgl').datepicker({ autoclose: true, dateFormat: 'mm/dd/yy' }).datepicker("setDate", datetgl);
                        var dateterima = new Date(dt.stat.header.tglterima);
                        $('#terima').datepicker({ autoclose: true, dateFormat: 'mm/dd/yy' }).datepicker("setDate", dateterima);
                        if (dt.stat.header.ppn == "1") {
                            $("#ppn").prop("checked", true);
                        } else {
                            $("#ppn").prop("checked", false);
                        }
                        $("#vendor").val(""+dt.stat.header.kodepbf+"").trigger('change');
                    }
                    $("#no").prop("disabled", true);
                    $("#tgl").prop("disabled", true);
                    $("#terima").prop("disabled", true);
                    $("#vendor").prop("disabled", true);
                    $("#ppn").prop("disabled", true);

                    $("#tabledetailfaktur").html(dt.dtview);
                    modaldetailtutup();
                },
                error: function(data) {
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
                    modalloadtutup();
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
                                url: "<?php echo site_url();?>/faktur/deletedetailfaktur",
                                type: "GET",
                                data : {
                                    id: id
                                },
                                success: function (ajaxData){
                                    if (ajaxData == "1") {
                                        suksesalert(2);
                                        prosesheader();
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
