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
                                <input type="hidden" id="noka" name="noka" value="<?php echo $no_askes?>">
                                <input type="hidden" id="hakkelas" name="hakkelas" value="<?php echo $nokelas?>">
                                <input type="hidden" id="notransaksi" name="notransaksi" value="<?php echo $notransaksi?>">
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
                                    <input type="hidden" class="form-control" name="txtkdpoli" id="txtkdpoli">
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
                            </div>
                        </div>
                    </div>
                    <div class="row spacing-row">
                        <div class="col-md-12">
                            <div class="row form-group">
                                <label class="col-md-2 col-sm-3 col-xs-12 col-form-label"><label style="color:gray;font-size:x-small">(yyyy-mm-dd)</label>  Tgl. SEP</label>
                                <div class="col-md-3 col-sm-3 col-xs-12">
                                    <div class='input-group date'>
                                        <input type='date' class="form-control datepicker" id="txttglsepkode" placeholder="yyyy-MM-dd" maxlength="10" value="<?php echo $txtTanggal?>" onchange="rubahtgl()"/>
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
                                    <input type="hidden" class="form-control" id="txtkddiagnosa">
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
                        <button id="simpansep" target="_blank" class="btn btn-success" text-left>Simpan</button>
                    </div>
                    <div class="col-md-6 text-right">
                        <button id="batalsep"  class="btn btn-danger" text-right>Batal</button>
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

        function tutupmodalform() {
			$(function() {
				$('#formmodal').modal('toggle');
			});
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

        // 12-12-2023
        // 0123456789
        function rubahtgl() {
            var tglsep = document.getElementById("txttglsepkode").value;
            // result = tglsep.substring(6, 4)+'-'+tglsep.substring(3, 2)+'-'+tglsep.substring(0, 2);
            $('#txttglsep').val(tglsep);
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
                    url: "<?php echo site_url(); ?>/bpjs/ambillpoliinsert",
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
                        tgl: '2023-06-09',
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
                var notransaksi = document.getElementById("notransaksi").value;
                var noKartu = document.getElementById("noka").value;
                var tglSep = document.getElementById("txttglsep").value;
                var jnsPelayanan = 2;
                var klsRawatHak = document.getElementById("hakkelas").value;
                var klsRawatNaik = '';
                var pembiayaan = '';
                var penanggungJawab = '';
                var noMR = document.getElementById("txtnomr").value;
                var asalRujukan = 2;
                var tglRujukan = '';
                var noRujukan = '';
                var ppkRujukan = '';
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
                var valuekecelakaan = document.getElementById("valuekecelakaan").value;
                var noLP = document.getElementById("txtnmpoli").value;
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
                // var dpjpLayan = '274105';
                var dpjpLayan = document.getElementById("txtkddpjp").value;
                // var namadpjpLayan = document.getElementById("txtnmdpjp").value;
                var namadpjpLayan = $("#txtnmdpjp option:selected").text();

                var noTelpDPJP = '08114449395';
                var user = 'Coba Ws';
                // alert('mau masuk di bpjs/insertsepigd ...')
                // modalload;
                $.ajax({
                    url: "<?php echo site_url(); ?>/bpjs/insertsepigd",
                    type: "GET",
                    data: {
                         notransaksi : notransaksi,
                         noKartu : noKartu,
                         tglSep :tglSep,
                         klsRawatHak : klsRawatHak,
                         noMR : noMR,
                         catatan : catatan,
                         diagAwal : diagAwal,
                         tujuan :  tujuan,
                         namaTujuan :  namaTujuan,
                        //  ppkPelayanan : ppkPelayanan,
                         jnsPelayanan : jnsPelayanan,
                         klsRawatNaik : klsRawatNaik,
                         pembiayaan : pembiayaan,
                         penanggungJawab : penanggungJawab,
                         asalRujukan : asalRujukan,
                         tglRujukan : tglRujukan,
                         noRujukan : noRujukan,
                         ppkRujukan : ppkRujukan,
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
            });
        });
    </script>


<?php
} else if ($formpilih == 1) {
?>
   <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <!-- <div class="box box-default box-solid" id="proseskotak"> -->
            <div class="modal-header p-1 pl-3 align-text-bottom">
                <b class="modal-title" id="exampleModalLabel"><h5>FORM EDIT SEP</h5></b>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row spacing-row">
                        <div class="col-md-12">
                            <div class="row form-group" id="datahidden">
                                <input type="hidden" id="noka" name="noka" value="<?php echo $dtsep->peserta_no_kartu;?>">
                                <!-- <label>&nbsp s/d &nbsp</label> -->
                                <input type="hidden" id="hakkelas" name="hakkelas" value="<?php echo $nokelas;?>">
                                <input type="hidden" id="notransaksi" name="notransaksi" value="<?php echo $dtsep->notransaksi;?>">
                                <input type="hidden" id="nosep" name="nosep" value="<?php echo $dtsep->no_sep;?>">
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
                                    <select class="form-control" style="width: 100%;" name="txtnmpoli" id="txtnmpoli" onchange="pilihpoli()">
                                        <option value="<?php echo $dtsep->poli;?>" selected="selected"><?php echo $dtsep->nama_poli;?></option>
                                    </select>
                                </div>   
                                <div class="col-md-2">
                                    <input type="hidden" class="form-control" name="txtkdpoli" id="txtkdpoli" value="<?php echo $dtsep->poli;?>">
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
                                        <option value="<?php echo $dtsep->kodedokterbpjs;?>" selected="selected"><?php echo $dtsep->nama_dokter;?></option>
                                    </select>
                                </div>    
                                <div class="col-md-2">
                                    <input type="hidden" class="form-control" name="txtkddpjp" id="txtkddpjp" value="<?php echo $dtsep->kodedokterbpjs;?>">
                                </div>   
                            </div>
                        </div>
                    </div>
                    <div class="row spacing-row">
                        <div class="col-md-12">
                            <div class="row form-group">
                                <label class="col-md-2 col-sm-3 col-xs-12 col-form-label"><label style="color:gray;font-size:x-small">(yyyy-mm-dd)</label>  Tgl. SEP</label>
                                <div class="col-md-3 col-sm-3 col-xs-12">
                                    <div class='input-group date'>
                                        <input type='date' class="form-control datepicker" id="txttglsepkode" placeholder="yyyy-MM-dd" maxlength="10" value="<?php echo $dtsep->tgl_sep;?>" onchange="rubahtgl()"/>
                                        <input type="hidden" id="txttglsep" name="txttglsep" value="<?php echo $dtsep->tgl_sep;?>" />
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
                                        <input type="text" class="form-control" name="txtnomr" id="txtnomr" placeholder="ketik nomor MR" maxlength="10" value="<?php echo $dtsep->peserta_no_mr;?>">
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
                    <?php 
                    $diag=$dtsep->diagnosa;
                    $data = explode("-" , $diag);
                    $kodediag=$data[0];
                    $namadiag=$data[1];
                    ?>
                    <div class="row spacing-row">
                        <div class="col-md-12">
                            <div class="row form-group">
                                <label class="col-md-2 col-sm-3 col-xs-12 col-form-label">Diagnosa <label style="color:red;font-size:small">*</label></label>
                                <div class="col-md-7 col-sm-9 col-xs-12">
                                    <select class="form-control" style="width: 100%;" name="txtnmdiagnosa" id="txtnmdiagnosa"  onchange="pilihdiagnosa()">
                                        <option value="<?php echo $dtsep->diagnosa;?>" selected="selected"><?php echo $dtsep->diagnosa;?></option>
                                    </select>
                                    <label id="lblDxSpesialistik" style="color:red"></label>
                                </div>
                                <div class="col-md-2">
                                    <input type="hidden" class="form-control" id="txtkddiagnosa" value="<?php echo trim($kodediag);?>">
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
                                                                onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="15" value="<?php echo $dtsep->no_hp;?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row spacing-row">
                        <div class="col-md-12">
                            <div class="row form-group">
                                <label class="col-md-2 col-sm-3 col-xs-12 control-label">Catatan</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <textarea class="form-control" id="txtcatatan" name="txtcatatan" rows="2" placeholder="ketik catatan apabila ada"><?php echo $dtsep->catatan;?></textarea>
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
                                        <option <?php if ($dtsep->kecelakaan == 0) { echo 'selected'; }?> value="0" title="Kasus bukan akibat kecelakaan lalu lintas dan kerja">Bukan Kecelakaan</option>
                                        <option <?php if ($dtsep->kecelakaan == 1) { echo 'selected'; }?> value="1" title="Kasus KLL Tidak Berhubungan dengan Pekerjaan">Kecelakaan LaluLintas dan Bukan Kecelakaan Kerja</option>
                                        <option <?php if ($dtsep->kecelakaan == 2) { echo 'selected'; }?> value="2" 
                                                title="1).Kasus KLL Berhubungan dengan Pekerjaan. 2).Kasus KLL Berangkat dari Rumah menuju tempat Kerja. 3).Kasus KLL Berangkat dari tempat Kerja menuju rumah.">Kecelakaan LaluLintas dan Kecelakaan Kerja</option>
                                        <option <?php if ($dtsep->kecelakaan == 3) { echo 'selected'; }?> value="3" 
                                                title="1).Kasus Kecelakaan Berhubungan dengan pekerjaan. 2).Kasus terjadi di tempat kerja.Kasus terjadi pada saat kerja.">Kecelakaan Kerja</option>
                                    </select>                        
                                </div>   
                                <div class="col-md-2">
                                    <input type="hidden" class="form-control" id="valuekecelakaan">
                                </div>                   
                            </div>
                        </div>
                    </div>
                    <div id="divJaminanHistori"></div>
                    <div id="divJaminan"></div>
                </form>
                <div class="row mt-3">
                    <div class="col-md-6 text-left">
                        <button id="simpaneditsep" target="_blank" class="btn btn-success" text-left>Update</button>
                    </div>
                    <div class="col-md-6 text-right">
                        <button id="batalsep"  class="btn btn-danger" text-right>Batal</button>
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

        function tutupmodalform() {
			$(function() {
				$('#formmodal').modal('toggle');
			});
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

        // 12-12-2023
        // 0123456789
        function rubahtgl() {
            var tglsep = document.getElementById("txttglsepkode").value;
            // result = tglsep.substring(6, 4)+'-'+tglsep.substring(3, 2)+'-'+tglsep.substring(0, 2);
            $('#txttglsep').val(tglsep);
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
                    url: "<?php echo site_url(); ?>/bpjs/ambillpoliinsert",
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
                        tgl: '2023-05-22',
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
            
            $("#simpaneditsep").click(function(e) {
                var nosep = document.getElementById("nosep").value;
                var notransaksi = document.getElementById("notransaksi").value;
                var noKartu = document.getElementById("noka").value;
                var tglSep = document.getElementById("txttglsep").value;
                var jnsPelayanan = 2;
                var klsRawatHak = document.getElementById("hakkelas").value;
                var klsRawatNaik = '';
                var pembiayaan = '';
                var penanggungJawab = '';
                var noMR = document.getElementById("txtnomr").value;
                var asalRujukan = 2;
                var tglRujukan = '';
                var noRujukan = '';
                var ppkRujukan = '';
                var catatan = document.getElementById("txtcatatan").value;
                var diagAwal = document.getElementById("txtkddiagnosa").value;

                var tujuan = document.getElementById("txtkdpoli").value;
                var namaTujuan = $("#txtnmpoli option:selected").text();

                var eksekutif = 0;
                var cob = 0;
                var katarak = 0;
                var lakaLantas = document.getElementById("cbstatuskll").value;
                var valuekecelakaan = document.getElementById("valuekecelakaan").value;
                var txtnotelp = document.getElementById("txtnotelp").value;
                if (valuekecelakaan != 0) {
                    var noLP = document.getElementById("txtLP").value;
                    var tglKejadian = document.getElementById("txtTglKejadian").value;
                    var keterangan = document.getElementById("txtketkejadian").value;
                    var suplesi = document.getElementById("txtnmpoli").value;
                    var noSepSuplesi = document.getElementById("nosuplesi").value;
                    var kdPropinsi = document.getElementById("cbkdpropinsi").value;
                    var nmPropinsi = $("#cbkdpropinsi option:selected").text();
                    var kdKabupaten = document.getElementById("cbkdkabupaten").value;
                    var nmKabupaten = $("#cbkdkabupaten option:selected").text();
                    var kdKecamatan = document.getElementById("cbkdkecamatan").value;
                    var nmKecamatan = $("#cbkdkecamatan option:selected").text();
                } else {
                    var noLP = '';
                    var tglKejadian = '';
                    var keterangan = '';
                    var suplesi = '';
                    var noSepSuplesi = '';
                    var kdPropinsi = '';
                    var nmPropinsi = '';
                    var kdKabupaten = '';
                    var nmKabupaten = '';
                    var kdKecamatan = '';
                    var nmKecamatan = '';
                }   
                var tujuanKunj = 0;
                var flagProcedure = '';
                var kdPenunjang = '';
                var assesmentPel = '';
                var noSurat = '';
                var kodeDPJP = '';
                var dpjpLayan = document.getElementById("txtkddpjp").value;
                var namadpjpLayan = $("#txtnmdpjp option:selected").text();
                var noTelpDPJP = '08114449395';
                var user = 'Coba Ws';
                // modalload;
                $.ajax({
                    url: "<?php echo site_url(); ?>/bpjs/saveeditsepigd",
                    type: "GET",
                    data: {
                         notransaksi : notransaksi,
                         nosep : nosep,
                         noKartu : noKartu,
                         tglSep :tglSep,
                         klsRawatHak : klsRawatHak,
                         noMR : noMR,
                         catatan : catatan,
                         diagAwal : diagAwal,
                         tujuan :  tujuan,
                         namaTujuan :  namaTujuan,
                        //  ppkPelayanan : ppkPelayanan,
                         jnsPelayanan : jnsPelayanan,
                         klsRawatNaik : klsRawatNaik,
                         pembiayaan : pembiayaan,
                         penanggungJawab : penanggungJawab,
                         asalRujukan : asalRujukan,
                         tglRujukan : tglRujukan,
                         noRujukan : noRujukan,
                         ppkRujukan : ppkRujukan,
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
                         nmPropinsi : nmPropinsi,
                         kdKabupaten : kdKabupaten,
                         nmKabupaten : nmKabupaten,
                         kdKecamatan : kdKecamatan,
                         nmKecamatan : nmKecamatan,
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
            });
        });
    </script>
<?php
} else if ($formpilih == 2) {
    ?>
       <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <!-- <div class="box box-default box-solid" id="proseskotak"> -->
                <div class="modal-header p-1 pl-3 align-text-bottom">
                    <b class="modal-title" id="exampleModalLabel"><h5>HAPUS SEP</h5></b>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row spacing-row">
                            <div class="col-md-12">
                                <div class="row form-group" id="datahidden">
                                    <input type="hidden" id="noka" name="noka" value="<?php echo $dtsep->peserta_no_kartu;?>">
                                    <!-- <label>&nbsp s/d &nbsp</label> -->
                                    <input type="hidden" id="hakkelas" name="hakkelas" value="<?php echo $nokelas;?>">
                                    <input type="hidden" id="notransaksi" name="notransaksi" value="<?php echo $dtsep->notransaksi;?>">
                                    <input type="hidden" id="nosep" name="nosep" value="<?php echo $dtsep->no_sep;?>">
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
                                        <select class="form-control" style="width: 100%;" name="txtnmpoli" id="txtnmpoli" onchange="pilihpoli()" disabled>
                                            <option value="<?php echo $dtsep->poli;?>" selected="selected"><?php echo $dtsep->nama_poli;?></option>
                                        </select>
                                    </div>   
                                    <div class="col-md-2">
                                        <input type="hidden" class="form-control" name="txtkdpoli" id="txtkdpoli" value="<?php echo $dtsep->poli;?>">
                                    </div>   
                                </div>
                            </div>
                        </div>
                        <div class="row spacing-row">
                            <div class="col-md-12">
                                <div class="row form-group" id="divPoli">
                                    <label class="col-sm-2 col-form-label">DPJP yang Melayani <label style="color:red;font-size:small">*</label></label>  
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" name="txtnmdpjp" id="txtnmdpjp" value="<?php echo $dtsep->nama_dokter;?>" disabled>
                                    </div>    
                                    <div class="col-md-2">
                                        <input type="hidden" class="form-control" name="txtkddpjp" id="txtkddpjp" value="<?php echo $dtsep->kodedokterbpjs;?>">
                                    </div>   
                                </div>
                            </div>
                        </div>
                        <div class="row spacing-row">
                            <div class="col-md-12">
                                <div class="row form-group">
                                    <label class="col-md-2 col-sm-3 col-xs-12 col-form-label"><label style="color:gray;font-size:x-small">(yyyy-mm-dd)</label>  Tgl. SEP</label>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class='input-group date'>
                                            <input type='date' class="form-control datepicker" id="txttglsepkode" placeholder="yyyy-MM-dd" maxlength="10" value="<?php echo $dtsep->tgl_sep;?>" onchange="rubahtgl()" disabled>
                                            <input type="hidden" id="txttglsep" name="txttglsep" value="<?php echo $dtsep->tgl_sep;?>" />
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
                                            <input type="text"  class="form-control" name="txtnomr" id="txtnomr" placeholder="ketik nomor MR" maxlength="10" value="<?php echo $dtsep->peserta_no_mr;?>" disabled>
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
                        <?php 
                        $diag=$dtsep->diagnosa;
                        $data = explode("-" , $diag);
                        $kodediag=$data[0];
                        $namadiag=$data[1];
                        ?>
                        <div class="row spacing-row">
                            <div class="col-md-12">
                                <div class="row form-group">
                                    <label class="col-md-2 col-sm-3 col-xs-12 col-form-label">Diagnosa <label style="color:red;font-size:small">*</label></label>
                                    <div class="col-md-7 col-sm-9 col-xs-12">
                                        <select class="form-control" style="width: 100%;" name="txtnmdiagnosa" id="txtnmdiagnosa"  onchange="pilihdiagnosa()" disabled>
                                            <option value="<?php echo $dtsep->diagnosa;?>" selected="selected"><?php echo $dtsep->diagnosa;?></option>
                                        </select>
                                        <label id="lblDxSpesialistik" style="color:red"></label>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="hidden" class="form-control" id="txtkddiagnosa" value="<?php echo trim($kodediag);?>">
                                    </div> 
                                </div>
                            </div>
                        </div>
                        <div class="row spacing-row">
                            <div class="col-md-12">
                                <div class="row form-group">
                                    <label class="col-md-2 col-sm-3 col-xs-12 col-form-label">No. Telepon <label style="color:red;font-size:small">*</label></label>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <input type="text" disabled class="form-control" id="txtnotelp" name="txtnotelp" placeholder="ketik nomor telepon yang dapat dihubungi"
                                                                    onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="15" value="<?php echo $dtsep->no_hp;?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row spacing-row">
                            <div class="col-md-12">
                                <div class="row form-group">
                                    <label class="col-md-2 col-sm-3 col-xs-12 control-label">Catatan</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <textarea class="form-control" id="txtcatatan" name="txtcatatan" rows="2" placeholder="ketik catatan apabila ada" disabled><?php echo $dtsep->catatan;?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row spacing-row">
                            <div class="col-md-12">
                                <div class="row form-group">
                                    <label class="col-md-2 col-sm-3 col-xs-12 control-label">Status Kecelakaan <label style="color:red;font-size:small">*</label></label>
                                    <div class="col-md-7 col-sm-7 col-xs-9">
                                        <select class="form-control " id="cbstatuskll" name="cbstatuskll" onchange="jaminan()" disabled>
                                            <option value="">-- Silahkan Pilih --</option>
                                            <option <?php if ($dtsep->kecelakaan == 0) { echo 'selected'; }?> value="0" title="Kasus bukan akibat kecelakaan lalu lintas dan kerja">Bukan Kecelakaan</option>
                                            <option <?php if ($dtsep->kecelakaan == 1) { echo 'selected'; }?> value="1" title="Kasus KLL Tidak Berhubungan dengan Pekerjaan">Kecelakaan LaluLintas dan Bukan Kecelakaan Kerja</option>
                                            <option <?php if ($dtsep->kecelakaan == 2) { echo 'selected'; }?> value="2" 
                                                    title="1).Kasus KLL Berhubungan dengan Pekerjaan. 2).Kasus KLL Berangkat dari Rumah menuju tempat Kerja. 3).Kasus KLL Berangkat dari tempat Kerja menuju rumah.">Kecelakaan LaluLintas dan Kecelakaan Kerja</option>
                                            <option <?php if ($dtsep->kecelakaan == 3) { echo 'selected'; }?> value="3" 
                                                    title="1).Kasus Kecelakaan Berhubungan dengan pekerjaan. 2).Kasus terjadi di tempat kerja.Kasus terjadi pada saat kerja.">Kecelakaan Kerja</option>
                                        </select>                        
                                    </div>   
                                    <div class="col-md-2">
                                        <input type="hidden" class="form-control" id="valuekecelakaan">
                                    </div>                   
                                </div>
                            </div>
                        </div>
                        <div id="divJaminanHistori"></div>
                        <div id="divJaminan"></div>
                    </form>
                    <div class="row mt-3">
                        <div class="col-md-6 text-left">
                            <button id="hapussep" target="_blank" class="btn btn-danger" text-left>Hapus</button>
                        </div>
                        <div class="col-md-6 text-right">
                            <button id="batalsep"  class="btn btn-success" text-right>Batal</button>
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
    
            function tutupmodalform() {
                $(function() {
                    $('#formmodal').modal('toggle');
                });
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
    
            // 12-12-2023
            // 0123456789
            function rubahtgl() {
                var tglsep = document.getElementById("txttglsepkode").value;
                // result = tglsep.substring(6, 4)+'-'+tglsep.substring(3, 2)+'-'+tglsep.substring(0, 2);
                $('#txttglsep').val(tglsep);
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
                        url: "<?php echo site_url(); ?>/bpjs/ambillpoliinsert",
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
                            tgl: '2023-05-22',
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
            $("#hapussep_1").click(function(e) {
                swal('Sudah terbit Surat Kontrol');
            });
            $("#hapussep").click(function(e) {
                var nosep1 = document.getElementById("nosep").value;
                var user = 'Coba Ws';
                // alert(nosep1);
                $.ajax({
                    url: "<?php echo site_url(); ?>/bpjs/hapussepigd",
                    type: "GET",
                    data: {
                        nosep1: nosep1,
                    },
                    success: function(ajaxData) {
                        console.log(ajaxData);
                        var t = JSON.parse(ajaxData)
                        if (t.stat == true) {
                            // var t = JSON.parse(ajaxData)
                            var tx='SEP '+t.datasep+' Telah di hapus..';
                            swal(tx);
                            modalloadtutup();
                            tutupmodalform();
                            // var nosepnya=t.datasep.no_sep;
                            // var win = window.open("<?php echo site_url(); ?>/bpjs/cetaksepigd/" + nosepnya, '_blank');
                        } else {
                            console.log(ajaxData);
                            var t = JSON.parse(ajaxData)
                            var tx=t.code+' '+t.message;
                            swal(tx);
                            modalloadtutup();
                        }
                    }
                });
            });
        });
        </script>
<?php 
}else if ($formpilih == 3) {
    ?>
    <script>
    
        function tutupmodalform() {
            $(function() {
                $('#formmodal').modal('toggle');
            });
        }
    
        function modalloadtutup() {
            $(".overlay").remove();
        }
    
        $(document).ready(function() {
            swal('SEP Belum Terbit');
            tutupmodalform()
    
            // modalloadtutup();
        })
    </script>
    
    <?php } ?>
    
<script type="text/javascript" src="<?php echo base_url(); ?>assets/dist/js/alertsweet/salertnew.js"></script>
