<?php
if ($formpilih == 0) {
?>
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <!-- <div class="box box-default box-solid" id="proseskotak"> -->
            <div class="modal-header p-1 pl-3 align-text-bottom">
                <b class="modal-title" id="exampleModalLabel"><h5>FORM INSERT SEP R.INAP</h5></b>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div>
                        <label style="color:red;font-size:small">* Wajib Diisi</label>
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
                                <div class="col-md-9 col-sm-9 col-xs-12">
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
                                <div class="col-md-9 col-sm-9 col-xs-12">
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
                        tgl: '2023-04-20',
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

            $("#simpanregis").click(function(e) {
                var rm = document.getElementById("rm").value;
                var tglmasuk = document.getElementById("tglmasuk").value;
                var jammasuk = document.getElementById("jammasuk").value;
                // var kunjungan = $("input[name='kunjungan']:checked").val();
                var kunjungan = 0;
                var tp = $("#tp").val();
                var tptext = $("#tp option:selected").text();
                var gol = $("#gol").val();
                var goltext = $("#gol option:selected").text();
                var goldet = $("#goldet").val();
                var goldettext = $("#goldet option:selected").text();
                var rujukan = $("#rujukan").val();
                var rujukantext = $("#rujukan option:selected").text();
                var tglrujuk = document.getElementById("tglrujuk").value;
                var sep = document.getElementById("sep").value;
                var jp = $("#jp").val();
                var jptext = $("#jp option:selected").text();
                var icd = $("#icd").val();
                var icdtext = $("#icd option:selected").text();
                var cat = $("#cat").val();
                var dokter = $("#dokter").val();
                var doktertext = $("#dokter option:selected").text();
                var dokterluar = $("#dokterluar").val();
                var dokterluartext = $("#dokterluar option:selected").text();
                var keluhan = $("#keluhan").val();
                var cm = $("#cm").val();
                if ((gol == '') || (gol == null) || (goldet == '') || (goldet == null)) {
                    kuranglengkap;
                    return;
                }
                modalload;
                $.ajax({
                    url: "<?php echo site_url(); ?>/registrasipasien/simpanregisugd",
                    type: "GET",
                    data: {
                        rm: rm,
                        tglmasuk: tglmasuk,
                        jammasuk: jammasuk,
                        kunjungan: kunjungan,
                        tp: tp,
                        tptext: tptext,
                        gol: gol,
                        goltext: goltext,
                        goldet: goldet,
                        goldettext: goldettext,
                        rujukan: rujukan,
                        rujukantext: rujukantext,
                        tglrujuk: tglrujuk,
                        sep: sep,
                        jp: jp,
                        jptext: jptext,
                        icd: icd,
                        icdtext: icdtext,
                        dokter: dokter,
                        doktertext: doktertext,
                        dokterluar: dokterluar,
                        dokterluartext: dokterluartext,
                        keluhan: keluhan,
                        cat: cat,
                        cm: cm
                    },
                    success: function(ajaxData) {
                        var t = JSON.parse(ajaxData);
                        if (t.stat == true) {
                            suksesalert();
                            modalloadtutup();
                            tutupmodal(t.dtnotrans);
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