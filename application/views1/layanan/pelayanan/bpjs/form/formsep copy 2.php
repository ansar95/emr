<?php
if ($formpilih == 0) {
?>
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <!-- <div class="box box-default box-solid" id="proseskotak"> -->
            <div class="modal-header p-1 pl-3 align-text-bottom">
                <b class="modal-title" id="exampleModalLabel"><h5>FORM INSERT SEP</h5></b>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row spacing-row">
                        <div class="col-md-12">
                            <div class="row form-group" id="datahidden">
                                <input type="text" id="noka" name="noka" value="<?php echo $no_askes?>">
                                <input type="text" id="hakkelas" name="hakkelas" value="<?php echo $nokelas?>">
                            </div>
                        </div>
                    </div>
                    <div class="row spacing-row">
                        <div class="col-md-12">
                            <div class="row form-group" id="divPoli">
                                <label class="col-sm-2 col-form-label">Spesialis/SubSpesialis <label style="color:red;font-size:small">*</label></label>
                                <div class="col-md-2  col-form-label ">
                                    <input type="checkbox" id="chkpoliesekutif" name="chkpoliesekutif" disabled> Eksekutif
                                </div>    
                                <div class="col-md-5">
                                    <!-- <input type="text" class="form-control" name="txtnmpoli" id="txtnmpoli" value='Instalasi Gawat Darurat' disabled> -->
                                    <select class="form-control" style="width: 100%;" name="txtnmpoli" id="txtnmpoli" onchange="pilihpoli()">
                                    </select>
                                </div>   
                                <div class="col-md-2">
                                    <input type="text" class="form-control" name="txtkdpoli" id="txtkdpoli">
                                </div>   
                            </div>
                        </div>
                    </div>
                    <div class="row spacing-row">
                        <div class="col-md-12">
                            <div class="row form-group" id="divPoli">
                                <label class="col-sm-2 col-form-label">DPJP yang Melayani <label style="color:red;font-size:small">*</label></label>  
                                <div class="col-md-7">
                                    <select class="form-control" name="txtnmdpjp" id="txtnmdpjp" onchange="pilihdokter()" >
                                    </select>
                                </div>    
                                <div class="col-md-2">
                                    <input type="text" class="form-control" name="txtkddpjp" id="txtkddpjp">
                                </div>   
                                <!-- <input type="hidden" class="form-control" id="txtkddpjp"> -->
                            </div>
                        </div>
                    </div>
                    <div class="row spacing-row">
                        <div class="col-md-12">
                            <div class="row form-group">
                                <label class="col-md-2 col-sm-3 col-xs-12 col-form-label"><label style="color:gray;font-size:x-small">(yyyy-mm-dd)</label>  Tgl. SEP</label>
                                <div class="col-md-3 col-sm-3 col-xs-12">
                                    <div class='input-group date'>
                                        <input type='text' class="form-control datepicker" id="txttglsepkode" placeholder="yyyy-MM-dd" maxlength="10" value="<?php echo $txtTanggal?>" disabled />
                                        <input type="hidden" id="txttglsep" name="txttglsep" value="<?php echo $txtTanggal?>" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row spacing-row">
                        <div class="col-md-12">
                            <div class="row form-group">
                                <label class="col-md-2 col-sm-3 col-xs-12 col-form-label">No. MR <label style="color:red;font-size:small">*</label></label>
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="txtnomr" id="txtnomr" placeholder="ketik nomor MR" maxlength="10" value="<?php echo $txtno_rm?>">
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                                <label class="form-control" col-form-label><input type="checkbox" id="chkCOB" name="chkCOB" disabled> Peserta COB</label>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row spacing-row">
                        <div class="col-md-12">
                            <div class="row form-group">
                                <label class="col-md-2 col-sm-3 col-xs-12 col-form-label">Diagnosa <label style="color:red;font-size:small">*</label></label>
                                <div class="col-md-7 col-sm-9 col-xs-12">
                                    <select class="form-control" style="width: 100%;" name="txtnmdiagnosa" id="txtnmdiagnosa" onchange="pilihdiagnosa()">
                                    </select>
                                    <label id="lblDxSpesialistik" style="color:red"></label>
                                </div>
                                <div class="col-md-2">
                                    <input type="text" class="form-control" id="txtkddiagnosa">
                                </div> 
                            </div>
                        </div>
                    </div>
                    <div class="row spacing-row">
                        <div class="col-md-12">
                            <div class="row form-group">
                                <label class="col-md-2 col-sm-3 col-xs-12 col-form-label">No. Telepon <label style="color:red;font-size:small">*</label></label>
                                <div class="col-md-3 col-sm-4 col-xs-6">
                                    <input type="text" class="form-control" id="txtnotelp" name="txtnotelp" placeholder="ketik nomor telepon yang dapat dihubungi"
                                                                onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="15" value="<?php echo $notelp?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row spacing-row">
                        <div class="col-md-12">
                            <div class="row form-group">
                                <label class="col-md-2 col-sm-3 col-xs-12 control-label">Catatan</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <textarea class="form-control" id="txtcatatan" name="txtcatatan" rows="2" placeholder="ketik catatan apabila ada"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row spacing-row">
                        <div class="col-md-12">
                            <div class="row form-group">
                                <label class="col-md-2 col-sm-3 col-xs-12 control-label">Status Kecelakaan <label style="color:red;font-size:small">*</label></label>
                                <div class="col-md-7 col-sm-7 col-xs-9">
                                    <select class="form-control " id="cbstatuskll" name="cbstatuskll" onchange="jaminan()">
                                        <option value="">-- Silahkan Pilih --</option>
                                        <option value="0" title="Kasus bukan akibat kecelakaan lalu lintas dan kerja">Bukan Kecelakaan</option>
                                        <option value="1" title="Kasus KLL Tidak Berhubungan dengan Pekerjaan">Kecelakaan LaluLintas dan Bukan Kecelakaan Kerja</option>
                                        <option value="2" 
                                                title="1).Kasus KLL Berhubungan dengan Pekerjaan. 2).Kasus KLL Berangkat dari Rumah menuju tempat Kerja. 3).Kasus KLL Berangkat dari tempat Kerja menuju rumah.">Kecelakaan LaluLintas dan Kecelakaan Kerja</option>
                                        <option value="3" 
                                                title="1).Kasus Kecelakaan Berhubungan dengan pekerjaan. 2).Kasus terjadi di tempat kerja.Kasus terjadi pada saat kerja.">Kecelakaan Kerja</option>
                                    </select>                        
                                </div>   
                                <div class="col-md-2">
                                    <input type="text" class="form-control" id="valuekecelakaan">
                                </div>                   
                            </div>
                        </div>
                    </div>
                    <div id="divJaminanHistori"></div>
                    <div id="divJaminan"></div>
                </form>
                <div class="row mt-3">
                    <div class="col-md-6 text-left">
                        <button id="simpansep" class="btn btn-success" text-left>Simpan</button>
                    </div>
                    <div class="col-md-6 text-right">
                        <button id="batalsep" class="btn btn-danger" text-right>Batal</button>
                    </div>
                </div>
            </div>
            <!-- </div> -->
        </div>
    </div>
    <script>
        function modalload() {
            $("#kotakform").append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
        }

        function modalloadtutup() {
            $(".overlay").remove();
        }

        function suksesalert() {
            $.notify("Sukses Input Data", "success");
        }

        function gagalalert() {
            $.notify("Gagal Proses Data", "error");
        }

        function kuranglengkap() {
            $.notify("Data Kurang Lengkap", "error");
        }

        $(function() {
            $('#tglmasuk').datepicker({
                autoclose: true,
                dateFormat: 'dd-mm-yy',
                changeMonth: true,
                changeYear: true,
                yearRange: "-100:+00"
            }).datepicker("setDate", "0");

            $('#tglrujuk').datepicker({
                autoclose: true,
                dateFormat: 'dd-mm-yy',
                changeMonth: true,
                changeYear: true,
                yearRange: "-100:+00"
            }).datepicker("setDate", "0");

            $('#jammasuk').timepicker({
                showInputs: false,
                minuteStep: 1,
                showMeridian: false
            })
            $('select').select2({
                tags: true
            });

            
            $('#txtnmpoli').select2({
                placeholder: 'pilih poli',
                minimumInputLength: 3,
                allowClear: true,
                ajax: {
                    url: "<?php echo site_url(); ?>/registrasipasien/caripoli",
                    dataType: 'json',
                    data: function(params) {
                        var query = {
                            search: params.term,
                            type: 'public'
                        }
                        return query;
                    },
                    processResults: function(data) {
                        return {
                            results: data.items
                        };
                    }
                }
            });

            $('#icd').select2({
                placeholder: 'polih ICD 10',
                minimumInputLength: 3,
                allowClear: true,
                ajax: {
                    url: "<?php echo site_url(); ?>/registrasipasien/cariicd",
                    dataType: 'json',
                    data: function(params) {
                        var query = {
                            search: params.term,
                            type: 'public'
                        }
                        return query;
                    },
                    processResults: function(data) {
                        return {
                            results: data.items
                        };
                    }
                }
            });
            
            $('#txtnmdiagnosa').select2({
            placeholder: 'Pilih Diagnosa',
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

            // dokter dpjp
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
                        tgl: '2023-05-17',
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

            changegol(0);
        });

        function pilihdokter(){
            const selectedPackage = $('#txtnmdpjp').val();
            $('#txtkddpjp').val(selectedPackage);
        }

        function pilihdiagnosa(){
            const selectedPackage = $('#txtnmdiagnosa').val();
            $('#txtkddiagnosa').val(selectedPackage);
        }

        function pilihpoli(){
            const selectedPackage = $('#txtnmpoli').val();
            $('#txtkdpoli').val(selectedPackage);
        }

        function jaminan() {
        var valu = $("#cbstatuskll").val();
        $("#valuekecelakaan").val(valu);
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
        function pilihdpjp() {
        }
    }


        function changegol(status) {
            $.getJSON('<?php echo site_url(); ?>/registrasipasien/cariasuransi/' + $("#gol").val(), function(data) {
                var temp = [];
                $.each(data, function(key, value) {
                    temp.push({
                        v: value,
                        k: key
                    });
                });
                temp.sort(function(a, b) {
                    if (a.v > b.v) {
                        return 1
                    }
                    if (a.v < b.v) {
                        return -1
                    }
                    return 0;
                });
                $('#goldet').empty();
                $('#goldet').append('<option value="0">--Pilih--</option>');
                $.each(temp, function(key, obj) {
                    if (status == 0) {
                        $('#goldet').append('<option value="' + obj.k + '">' + obj.v + '</option>');
                    } else {
                        $('#goldet').append('<option value="' + obj.k + '">' + obj.v + '</option>');
                    }
                });
            });
        }

        $(document).ready(function() {
            // var maximumStack = 1000;
            $("#simpansep").click(function(e) {
                // var noKartu = document.getElementById("noka").value;
                // var tglSep = document.getElementById("txttglsep").value;
                // // var ppkPelayanan = document.getElementById("txtnmpoli").value;
                // var jnsPelayanan = 2;
                // var klsRawatHak = document.getElementById("hakkelas").value;
                // var klsRawatNaik = '';
                // var pembiayaan = '';
                // var penanggungJawab = '';
                // var noMR = document.getElementById("txtnomr").value;
                // var asalRujukan = 2;
                // var tglRujukan = '';
                // var noRujukan = '';
                // var ppkRujukan = '';
                // var catatan = document.getElementById("txtcatatan").value;
                // var diagAwal = document.getElementById("txtkddiagnosa").value;
                // var tujuan = document.getElementById("txtkdpoli").value;
                // var namaTujuan = document.getElementById("txtnmpoli").value;
                // // var eksekutif = document.getElementById("txtnmpoli").value;
                // var eksekutif = 0;
                // // var cob = document.getElementById("txtnmpoli").value;
                // var cob = 0;
                // // var katarak = document.getElementById("txtnmpoli").value;
                // var katarak = 0;
                // var lakaLantas = document.getElementById("cbstatuskll").value;
                // var valuekecelakaan = document.getElementById("valuekecelakaan").value;
                // var noLP = document.getElementById("txtnmpoli").value;
                // if (valuekecelakaan != 0) {
                //     var noLP = document.getElementById("txtLP").value;
                //     var tglKejadian = document.getElementById("txtTglKejadian").value;
                //     var keterangan = document.getElementById("txtketkejadian").value;
                //     var suplesi = document.getElementById("txtnmpoli").value;
                //     // var noSepSuplesi = document.getElementById("txtnmpoli").value;
                //     var noSepSuplesi = '';
                //     var kdPropinsi = document.getElementById("cbkdpropinsi").value;
                //     var kdKabupaten = document.getElementById("cbkdkabupaten").value;
                //     var kdKecamatan = document.getElementById("cbkdkecamatan").value;
                // } else {
                    // var noLP = '';
                    // var tglKejadian = '';
                    // var keterangan = '';
                    // var suplesi = '';
                    // // var noSepSuplesi = document.getElementById("txtnmpoli").value;
                    // var noSepSuplesi = '';
                    // var kdPropinsi = '';
                    // var kdKabupaten = '';
                    // var kdKecamatan = '';
                // }   
                // var tujuanKunj = '';
                // var flagProcedure = '';
                // var kdPenunjang = '';
                // var assesmentPel = '';
                // var noSurat = '';
                // var kodeDPJP = '';
                // var dpjpLayan = '290142';
                // var noTelpDPJP = '08114449395';
                // var user = 'Coba Ws';

                // modalload;
                $.ajax({
                    url: "<?php echo site_url(); ?>/bpjs/insertsepigd",
                    type: "GET",
                    data: {
                        //  noKartu : noKartu,
                        //  tglSep :tglSep,
                        // //  ppkPelayanan : ppkPelayanan,
                        //  jnsPelayanan : jnsPelayanan,
                        //  klsRawatHak : klsRawatHak,
                        //  klsRawatNaik : klsRawatNaik,
                        //  pembiayaan : pembiayaan,
                        //  penanggungJawab : penanggungJawab,
                        //  noMR : noMR,
                        //  asalRujukan : asalRujukan,
                        //  tglRujukan : tglRujukan,
                        //  noRujukan : noRujukan,
                        //  ppkRujukan : ppkRujukan,
                        //  catatan : catatan,
                        //  diagAwal : diagAwal,
                        //  tujuan :  tujuan,
                        //  namaTujuan :  namaTujuan,
                        //  eksekutif : eksekutif,
                        //  cob : cob,
                        //  katarak : katarak,
                        //  lakaLantas : lakaLantas,
                        //  noLP : noLP,
                        //  tglKejadian : tglKejadian,
                        //  keterangan : keterangan,
                        //  suplesi : suplesi,
                        //  noSepSuplesi : noSepSuplesi,
                        //  kdPropinsi : kdPropinsi,
                        //  kdKabupaten : kdKabupaten,
                        //  kdKecamatan : kdKecamatan,
                        //  tujuanKunj : tujuanKunj,
                        //  flagProcedure : flagProcedure,
                        //  kdPenunjang : kdPenunjang,
                        //  assesmentPel : assesmentPel,
                        //  noSurat : noSurat,
                        //  kodeDPJP : kodeDPJP,
                        //  dpjpLayan : dpjpLayan,
                        //  noTelpDPJP : noTelpDPJP,
                        //  user : user,
                        //  noHp : txtnotelp
                    },
                    success: function(ajaxData) {
                        // alert('masuk dapat sep');
                        console.log(ajaxData);
                        var t=ajaxData['stat'];
                        alert(t);

                      
                        // var t = JSON.parse(ajaxData);
                        if (t.stat == true) {
                            suksesalert();
                            modalloadtutup();
                            var nosepnya=t.datasep.no_sep;
                            $.ajax({
                                url: "<?php echo site_url();?>/bpjs/cetaksepigd",
                                type: "GET",
                                data: { nosepnya : nosepnya 
                                    },
                                success: function (ajaxData){
                                    alert('sdh cetak sep');
                                },
                                error: function(data) {
                                }
                            });
                        } else if (t.stat == "ada") {
                            gagalalert();
                            modalloadtutup();
                            tutupmodalada();
                        } else {
                            gagalalert();
                            modalloadtutup();
                        }
                    }
                });
            });
        });
    </script>


<?php
} else if ($formpilih == 1) {
?>

<?php
}
?>