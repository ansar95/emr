<script src="<?php echo base_url();?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="<?php echo base_url();?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script src="<?php echo base_url();?>assets/dist/js/notify.min.js"></script>
<script src="<?php echo base_url();?>assets/dist/js/jquery-confirm.min.js"></script>

<div class="modal fade" id="formmodal" data-backdrop="static" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false">

    <script type="text/javascript">

	    var arrTanda = [];

	    function tambahtanda() {
            var tanda = $("#tanda").val();
            $.ajax({
                url: "<?php echo site_url();?>/rumahtangga/cekdatatandaterima",
                type: "GET",
	            data: {
                    tanda: tanda
	            },
                success: function (ajaxData) {
                    var dt = JSON.parse(ajaxData);
					console.log(dt);
					if (dt == null) {
                        $.notify("Tanda terima tidak ditemukan", "error");
					} else {
                        $.notify("Tanda terima ditemukan", "success");
                        if (arrTanda.indexOf(tanda) === -1) {
                            arrTanda.push(dt.noterima);
                            console.log("kosong");

                            var newRow = $("<tr>");
                            var cols = "";

                            cols += '<td class="terima">' + dt.noterima + '</td>';
                            cols += '<td>' + dt.tglterima + '</td>';
                            cols += '<td>' + dt.namapbf + '</td>';
                            cols += '<td>' + dt.ppn + '</td>';
                            cols += '<td class="text-center"><a onclick="" class="btnDel btn-sm btn-danger btn-flat"><i class="fa fa-trash"></i></a></td>';
                            newRow.append(cols);
                            $("#tabletandaterima").append(newRow);
                            $("#tanda").val("");
                        } else {
                            console.log("ada");
                        }
					}
                },
                error: function (data) {
                    gagalalert();
                }
            });
        }

        function untukheader() {
            $('#tgl').datepicker({ autoclose: true }).datepicker("setDate", "0");
            $('#terima').datepicker({ autoclose: true }).datepicker("setDate", "0");
            $('#vendor').select2();
        }

        function untuklaporanfaktur() {
            $('#awal').datepicker({ autoclose: true }).datepicker("setDate", "0");
            $('#akhir').datepicker({ autoclose: true }).datepicker("setDate", "0");
            $('#vendor').select2();
            $('#idobat').select2();
        }

        $(document).ready(function(){
            modaldetail();
            untukheader();
            untuklaporanfaktur();

            $("#tabletandaterima").on("click", ".btnDel", function (event) {
                var kode = $(this).closest("tr").find(".terima").text();
                console.log(kode);
                var index = arrTanda.indexOf(kode);
                if (index > -1) {
                    arrTanda.splice(index, 1);
                }
                console.log(arrTanda);
                $(this).closest("tr").remove();
            });
        });

        function addfaktur() {
            modaldetail();
            $.ajax({
                url: "<?php echo site_url();?>/rumahtangga/tambahfaktur",
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
            $("#sj").val("");
            $("#no").val("");
            $("#tgl").val("");
            $("#terima").val("");
            $("#tanda").val("");
            modaldetailtutup();
            modaldetail();
            $("#sj").prop("disabled", false);
            $("#no").prop("disabled", false);
            $("#tgl").prop("disabled", false);
            $("#terima").prop("disabled", false);
            $("#vendor").prop("disabled", false);
            $("#ppn").prop("disabled", false);

            $("#tabletandaterima tbody tr").remove();
            arrTanda = [];

            untukheader();
            $("#updatefaktur").html('');
            $("#updateheader").html('');
            $("#deleteheader").html('');

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
            var sj = $("#sj").val();
            var no = $("#no").val();
            var tgl = $("#tgl").val();
            var terima = $("#terima").val();
            var vendor = $("#vendor").val();
            var ppn = $("#ppn").val();

            if ((sj == "") || (terima == "") || (vendor == "")) {
                kuranglengkap()
                return;
            }
            
            $.ajax({
                url: "<?php echo site_url();?>/rumahtangga/simpanfakturheader",
                type: "GET",
                data: {sj: sj},
                success: function (ajaxData){
                    var dt = JSON.parse(ajaxData);
                    if (dt.stat.sukses == true) {
                        var datetgl = new Date(dt.stat.header.tglbeli);
                        $('#tgl').datepicker({ autoclose: true, dateFormat: 'mm/dd/yy' }).datepicker("setDate", datetgl);
                        var dateterima = new Date(dt.stat.header.tglterima);
                        $('#terima').datepicker({ autoclose: true, dateFormat: 'mm/dd/yy' }).datepicker("setDate", dateterima);
                        // if (dt.stat.header.ppn == "1") {
                        //     $("#ppn").prop("checked", true);
                        // } else {
                        //     $("#ppn").prop("checked", false);
                        // }
                        $("#ppn").val(""+dt.stat.header.ppn+"").trigger('change');
                        $("#vendor").val(""+dt.stat.header.kodepbf+"").trigger('change');
                        $("#no").val(""+dt.stat.header.nofak+"");

                        if (dt.stat.header != null) {
                            if ((dt.stat.header.nofak == "") || (dt.stat.header.nofak == null)) {
                                $("#no").prop("disabled", false);
                                $("#updatefaktur").html('<a class="btn-sm btn-info" onclick="updateFaktur()">\n' +
                                    'Update No.Faktur\n' +
                                    '</a>');
                            } else {
                                // $("#no").prop("disabled", true);
                                // $("#updatefaktur").html('');
                                $("#no").prop("disabled", false);
                                $("#updatefaktur").html('<a class="btn-sm btn-info" onclick="updateFaktur()">\n' +
                                    'Update Faktur\n' +
                                    '</a>');
                            }
                        }
                        $("#sj").prop("disabled", true);
                        $("#updateheader").html('<a class="btn-sm btn-success pull-right" onclick="updateinfofaktur()">\n' +
                            '<i class=\'glyphicon glyphicon-edit\'></i> &nbsp;Update Info Faktur\n' +
                            '</a>');
                        $("#deleteheader").html('<a class="btn-sm btn-warning pull-right" onclick="deletefaktur()">\n' +
                            '<i class=\'glyphicon glyphicon-trash\'></i> &nbsp;Hapus Faktur\n' +
                            '</a>');
                        // $("#tgl").prop("disabled", true);
                        // $("#terima").prop("disabled", true);
                        // $("#vendor").prop("disabled", true);
                        // $("#ppn").prop("disabled", true);
                        $("#tabledetailfaktur").html(dt.dtview);
                        modaldetailtutup();
                    } else {
                        // $.notify("Faktur tidak ditemukan","error");
                        modaldetailtutup();
                    }
                },
                error: function(data) {
                    gagalalert();
                    modaldetailtutup();
                }
            });
        }

        function updateFaktur() {
            var no = $("#no").val();
            var sj = $("#sj").val();
            $.ajax({
                url: "<?php echo site_url();?>/rumahtangga/ubahnofaktur",
                type: "GET",
                data: {
                    no: no,
	                terima: sj
                },
                success: function (ajaxData) {
                    if (ajaxData == "true") {
                        $("#no").prop("disabled", true);
                        $.notify("Update No. Faktur Sukses","success")
                    } else {
                        $("#no").prop("disabled", false);
                        $.notify("Update No. Faktur Gagal","error")
                    }
                },
                error: function (data) {
                    gagalalert();
                }
            });
        }

        function updateinfofaktur() {
            var sj = $("#sj").val();
            var tgl = $("#tgl").val();
            var terima = $("#terima").val();
            var vendor = $("#vendor").val();
            var vendortext = $("#vendor option:selected" ).text();
            // var ppn = $('#ppn').is(":checked");
            var ppn = $("#ppn").val();


            if ((sj == "-") || (tgl == "") || (terima == "") || (vendor == "")) {
                kuranglengkap();
                return;
            }

            $.ajax({
                url: "<?php echo site_url();?>/rumahtangga/ubahheaderfaktur",
                type: "GET",
                data: {
                    sj: sj,
                    tgl: tgl,
                    terima: terima,
                    vendor: vendor,
                    vendortext: vendortext,
                    ppn: ppn
                },
                success: function (ajaxData) {
                    if (ajaxData == "true") {
                        $.notify("Update Info Faktur Sukses","success")
                    } else {
                        $.notify("Update Info Faktur Gagal","error")
                    }
                },
                error: function (data) {
                    gagalalert();
                }
            });
        }

        function deletefaktur() {
            var sj = $("#sj").val();

            $.ajax({
                url: "<?php echo site_url();?>/rumahtangga/hapusfaktur",
                type: "GET",
                data: {
                    sj: sj
                },
                success: function (ajaxData) {
                    if (ajaxData == "true") {
                        $.notify("Hapus Faktur Sukses","success");
                        prosesfakturbaru();
                    } else {
                        $.notify("Hapus faktur gagal / tidak diizinkan (Data detail faktur masih ada)","error")
                    }
                },
                error: function (data) {
                    gagalalert();
                }
            });
        }

        function cariheader() {
            var sj = $("#sj").val();
            var no = $("#no").val();
            var tgl = $("#tgl").val();
            var terima = $("#terima").val();
            var vendor = $("#vendor").val();
            var ppn = $("#ppn").val();
            console.log(ppn);
        
            if (sj == ""){
                kuranglengkap()
                return;
            }
            $.ajax({
                url: "<?php echo site_url();?>/rumahtangga/simpanfakturheader",
                type: "GET",
                data: {sj: sj},
                success: function (ajaxData){
                    var dt = JSON.parse(ajaxData);
                    // console.log(dt);
                    if (dt.stat.sukses == true) {
                        // console.log(dt.stat.header);
                        var datetgl = new Date(dt.stat.header.tglbeli);
                        $('#tgl').datepicker({ autoclose: true, dateFormat: 'mm/dd/yy' }).datepicker("setDate", datetgl);
                        var dateterima = new Date(dt.stat.header.tglterima);
                        $('#terima').datepicker({ autoclose: true, dateFormat: 'mm/dd/yy' }).datepicker("setDate", dateterima);
                        // if (dt.stat.header.ppn == "1") {
                        //     $("#ppn").prop("checked", true);
                        // } else {
                        //     $("#ppn").prop("checked", false);
                        // }
                        $("#ppn").val(""+dt.stat.header.ppn+"").trigger('change');
                        $("#vendor").val(""+dt.stat.header.kodepbf+"").trigger('change');
                        $("#no").val(""+dt.stat.header.nofak+"");
                        
                    }
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
                                url: "<?php echo site_url();?>/rumahtangga/deletedetailfaktur",
                                type: "GET",
                                data : {
                                    id: id
                                },
                                success: function (ajaxData){
                                    if (ajaxData == "1") {
                                        suksesalert(2);
                                        prosesheader();
                                    } else {
                                        $.notify("Data tidak diizinkan di hapus", "error");
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

        // kebutuhan retur 
        function prosesretur() {
            var awal = $("#awal").val();
            var akhir = $("#akhir").val();
            var vendor = $("#vendor").val();
            console.log('masuk');
            $.ajax({
                url: "<?php echo site_url();?>/rumahtangga/tampilkanretur",
                type: "GET",
                data: { awal: awal,
                        akhir : akhir,
                        vendor : vendor },
                success: function (ajaxData){
                        console.log(ajaxData);
                        var dt = JSON.parse(ajaxData);
                        console.log(dt);
                        // $("tabledetailfaktur").remove();
                        $("tabledetailfaktur").html(ajaxData);
                        
                    // console.log(ajaxData);
                    // $("#tabledetailfaktur").html(ajaxData);
                    modaldetailtutup();
                },
                error: function(data) {
                    gagalalert();
                    modaldetailtutup();
                }
            });
        }

        function addfakturretur() {
            modaldetail();
            $.ajax({
                url: "<?php echo site_url();?>/rumahtangga/tambahretur",
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
    </script>
