<script src="<?php echo base_url();?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="<?php echo base_url();?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url();?>assets/dist/js/notify.min.js"></script>
<script src="<?php echo base_url();?>assets/dist/js/jquery-confirm.min.js"></script>


<div class="modal fade" id="formmodal" data-backdrop="static" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false">



<script type="text/javascript">

    var jenForm = "";
    var _1tglSep = "";
    var _1asalRujukan = "";
    var _1noRujukan = "";
    var _2pelayanan = "2";
    var _2tglPelayanan = "2023-06-25";
    var _2ppk = "";
    var _2ppkText = "";
    var _2nomor = "";
    var _2kartu = "";

    function bagiandetailinsert() {
        // $('#txttglrujukan').datepicker({ autoclose: true }).datepicker("setDate", "0");

        $('#txtnmdiagnosa').select2({
            placeholder: 'Enter Diagnosa',
            minimumInputLength: 3,            
            allowClear: true,
            ajax: {
                url: "<?php echo site_url();?>/bpjs/ambilldiagnosainsert",
                dataType: 'json',
                data: function (params) {
                    var query = {
                        search: params.term,
                        type: 'public'
                    }
                    return query;
                },
                processResults: function (data) {
                    return {
                        results: data.items
                    };
                }
            }
        });

        $('#txtnmpoli').select2({
            placeholder: 'Enter Poli',
            minimumInputLength: 3,            
            allowClear: true,
            ajax: {
                url: "<?php echo site_url();?>/bpjs/ambillpoliinsert",
                dataType: 'json',
                data: function (params) {
                    var query = {
                        search: params.term,
                        type: 'public'
                    }
                    return query;
                },
                processResults: function (data) {
                    return {
                        results: data.items
                    };
                }
            }
        });

        $('#txtnmdpjp-OLD').select2({
            placeholder: 'Enter DPJP',
            minimumInputLength: 3,            
            allowClear: true,
            ajax: {
                url: "<?php echo site_url();?>/bpjs/ambilldpjpinsert",
                dataType: 'json',
                data: function (params) {
                    var query = {
                        search: params.term,
                        rawat: '2',
                        tgl: '2023-06-24',
                        type: 'public'
                    }
                    return query;
                },
                processResults: function (data) {
                    return {
                        results: data.items
                    };
                }
            }
        });

        $('#txtnmdpjp').select2({
            placeholder: 'Pilih DPJP',
            minimumInputLength: 3,            
            allowClear: true,
            ajax: {
                url: "<?php echo site_url();?>/bpjs/ambilldpjpinsert",
                dataType: 'json',
                data: function (params) {
                    var query = {
                        search: params.term,
                        rawat: '1',
                        tgl: '2023-06-24',
                        type: 'public'
                    }
                    return query;
                },
                processResults: function (data) {
                    console.log(data.items);
                    return {
                        results: data.items
                    };
                }
            }
            });


    }

    $(document).ready(function(){

        bagiandetailinsert()
        $('#txtTanggal_0').datepicker({ autoclose: true }).datepicker("setDate", "0");
        $('#txtTanggal').datepicker({ autoclose: true }).datepicker("setDate", "0");

        pilihform();
        $('#txtppkasalrujukan_OL').select2({
            placeholder: 'Enter PPK',
            minimumInputLength: 3,            
            allowClear: true,
            ajax: {
                url: "<?php echo site_url();?>/bpjs/ambillppk",
                dataType: 'json',
                data: function (params) {
                    var query = {
                        search: params.term,
                        // param: $("#cbpelayanan_1").val(),
                        param: 2,
                        type: 'public'
                    }
                    return query;
                },
                // data : {search : 'FAUZ', param: 2},
                processResults: function (data) {
                    
                    return {
                        results: data.items
                    };
                }
            }
        });
    });

    function pilihform() {
        var x = document.getElementsByName("rdpilih");
        var x1 = document.getElementById("divCariRujukan");
        var x2 = document.getElementById("divCarikartu");
        for (var i = 0, length = x.length; i < length; i++) {
            if (x[i].checked) {
                if (x[i].value == "0") {
                    x1.style.display = "none"
                    x2.style.display = "block"
                    jenForm = "0"
                } else if (x[i].value == "2") {
                    x1.style.display = "block"
                    x2.style.display = "none"
                    jenForm = "2"
                } else {
                    x1.style.display = "none"
                    x2.style.display = "none"
                    jenForm = ""
                }
                break;
            }
        }
    }

    $('#formsearch').submit(function(e){
        _1tglSep = $("#txtTanggal_0").val()
        _1asalRujukan = $("#cbasalrujukan_0").val()
        _1noRujukan = $("#txtNoRujukan_0").val()
        _2pelayanan = $("#cbpelayanan_1").val()
        _2tglPelayanan = $("#txtTanggal").val()
        _2ppk = $("#txtppkasalrujukan_OL").val()
        _2ppkText = $("#txtppkasalrujukan_OL option:selected").text();
        _2nomor = $("#txtNokartu").val()
        _2kartu = $("input[name=rbnomor]:checked").val()

        e.preventDefault();
        $form = $(this)
        var formData = new FormData();
        formData.append("_2ppkText", _2ppkText)
        $.each($form.serializeArray(),function(key,input){
            // $.notify('' + input.name + ' kosong', 'error');
            // return false
            formData.append(input.name,input.value);
        });
        // alert('masuk');
        $.ajax({
            url: "<?php echo site_url();?>/bpjs/ambildetail",
            type: "POST",
            data: formData,
            success: function (ajaxData){
                var dt = JSON.parse(ajaxData);
                if (dt.stat == true) {
                    $("#insert").html(dt.dtview);
                } else {
                }
            },
            error: function(data) {
                
            },
            cache: false,
            contentType: false,
            processData: false
        });
    });

    function jaminan() {
        var valu = $("#cbstatuskll").val();
        $.ajax({
            url: "<?php echo site_url();?>/bpjs/getjaminan?statusjaminan="+valu+"",
            type: "GET",
            success: function (ajaxData){
                var dt = JSON.parse(ajaxData);
                if (dt.stat == true) {
                    $("#divJaminan").html(dt.dtview);
                } else {
                }
            },
            error: function(data) {
                
            }
        });
    }

    function submitinsertSEP() {
        // var notransaksi = document.getElementById("notransaksi").value;
                var noKartu = document.getElementById("lblnokartubapel").value;
                var tglSep = document.getElementById("txttglsep").value;
                // var ppkPelayanan = document.getElementById("txtnmpoli").value;
                var jnsPelayanan = 2;
                //-----rawat inap
                var klsRawatHak = document.getElementById("txtkdklspst").value;
                var klsRawatNaik = '';
                var pembiayaan = '';
                var penanggungJawab = '';
                //-----
                var noMR = document.getElementById("txtnomr").value;
                var asalRujukan = document.getElementById("cbasalrujukan").value;;
                var tglRujukan = document.getElementById("txttglrujukan").value;
                var noRujukan = document.getElementById("txtnorujukan").value;
                var ppkRujukan = document.getElementById("txtppkasalrujukan").value;
                var namappkRujukan = document.getElementById("txtppkasalrujukantxt").value;

                var catatan = document.getElementById("txtcatatan").value;
                var diagAwal = document.getElementById("txtkddiagnosa").value;
                var tujuan = document.getElementById("txtkdpoli").value;
                var namaTujuan = $("#txtnmpoli option:selected").text();
                // var eksekutif = document.getElementById("txtnmpoli").value;
                var eksekutif = 0;
                // var cob = document.getElementById("txtnmpoli").value;
                var cob = 0;
                // var katarak = document.getElementById("txtnmpoli").value;
                var katarak = 0;
                var lakaLantas = document.getElementById("cbstatuskll").value;
                var valuekecelakaan = document.getElementById("cbstatuskll").value;
                // var noLP = document.getElementById("txtnmpoli").value;
                var txtnotelp = document.getElementById("txtnotelp").value;
                if (valuekecelakaan != 0) {
                    var noLP = document.getElementById("txtLP").value;
                    var tglKejadian = document.getElementById("txtTglKejadian").value;
                    var keterangan = document.getElementById("txtketkejadian").value;
                    var suplesi = document.getElementById("txtnmpoli").value;
                    // var noSepSuplesi = document.getElementById("txtnmpoli").value;
                    var noSepSuplesi = '';
                    var kdPropinsi = document.getElementById("cbkdpropinsi").value;
                    var kdKabupaten = document.getElementById("cbkdkabupaten").value;
                    var kdKecamatan = document.getElementById("cbkdkecamatan").value;
                } else {
                    var noLP = '';
                    var tglKejadian = '';
                    var keterangan = '';
                    var suplesi = '';
                    // var noSepSuplesi = document.getElementById("txtnmpoli").value;
                    var noSepSuplesi = '';
                    var kdPropinsi = '';
                    var kdKabupaten = '';
                    var kdKecamatan = '';
                }   
                var tujuanKunj = '0';
                var flagProcedure = '';
                var kdPenunjang = '';
                var assesmentPel = '';

                var noSurat = '';
                var kodeDPJP = '';

                var dpjpLayan = document.getElementById("txtkddpjp").value;
                var namadpjpLayan = $("#txtnmdpjp option:selected").text();

                var noTelpDPJP = '08114449395';
                var user = 'Coba Ws';

                $.ajax({
                    url: "<?php echo site_url(); ?>/bpjs/insertnonjamkordat",
                    type: "GET",
                    data: {
                        //  notransaksi : notransaksi,
                         noKartu : noKartu,
                         tglSep :tglSep,
                         klsRawatHak : klsRawatHak,
                         noMR : noMR,
                         catatan : catatan,
                         diagAwal : diagAwal,
                         tujuan :  tujuan,
                         namaTujuan :  namaTujuan,
                         jnsPelayanan : jnsPelayanan,
                         klsRawatNaik : klsRawatNaik,
                         pembiayaan : pembiayaan,
                         penanggungJawab : penanggungJawab,
                         asalRujukan : asalRujukan,
                         tglRujukan : tglRujukan,
                         noRujukan : noRujukan,
                         ppkRujukan : ppkRujukan,
                         namappkRujukan : namappkRujukan,
                         eksekutif : eksekutif,
                         cob : cob,
                         katarak : katarak,
                         lakaLantas : lakaLantas,
                         noLP : noLP,
                         tglKejadian : tglKejadian,
                         keterangan : keterangan,
                         suplesi : suplesi,
                         noSepSuplesi : noSepSuplesi,
                         kdPropinsi : kdPropinsi,
                         kdKabupaten : kdKabupaten,
                         kdKecamatan : kdKecamatan,
                         tujuanKunj : tujuanKunj,
                         flagProcedure : flagProcedure,
                         kdPenunjang : kdPenunjang,
                         assesmentPel : assesmentPel,
                         noSurat : noSurat,
                         kodeDPJP : kodeDPJP,
                         dpjpLayan : dpjpLayan,
                         namadpjpLayan : namadpjpLayan,
                         noTelpDPJP : noTelpDPJP,
                         noHp : txtnotelp
                    },
                    success: function(ajaxData) {
                        console.log(ajaxData);
                        var t = JSON.parse(ajaxData)
                        if (t.stat == true) {
                            modalloadtutup();
                            tutupmodalform();
                            var nosepnya=t.datasep.no_sep;
                            var win = window.open("<?php echo site_url(); ?>/bpjs/cetaksepigd/" + nosepnya, '_blank');
                        } else {
                            console.log(ajaxData);
                            var t = JSON.parse(ajaxData)
                            var tx=t.code+' '+t.message;
                            swal(tx);
                            modalloadtutup();
                        }
                    }
                });
      

        // $.ajax({
        //     url: "<?php echo site_url();?>/bpjs/postinsertsep",
        //     type: "POST",
        //     data: formData,
        //     success: function (ajaxData){
        //         var dt = JSON.parse(ajaxData);
        //         if (dt.stat == true) {
        //             $.notify(dt.message, 'success')
        //             callCetakanSEP(dt.link);
        //             setTimeout(function() {
        //                 location.reload();
        //             }, 2000);
        //         } else {
        //             $.notify(dt.message, 'error')
        //         }
        //     },
        //     error: function(data) {
        //         $.notify('Server Error', 'error')                
        //     },
        //     cache: false,
        //     contentType: false,
        //     processData: false
        // });
    }

    function callCetakanSEP(url) {
        newwindow = window.open(url,'Cetakan SEP','height=1000,width=800');
        if (window.focus) {newwindow.focus()}
        return false;
    }
	
</script>
