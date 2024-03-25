<?php
if ($formpilih == 0) {
?>
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <!-- <div class="box box-default box-solid" id="proseskotak"> -->
            <div class="modal-header p-1 pl-3 align-text-bottom">
                <b class="modal-title" id="exampleModalLabel"><h5>SURAT KONTROL</h5></b>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row spacing-row">
                        <div class="col-md-12">
                            <div class="row form-group" id="datahidden">
                                <input type="hidden" id="idnya" name="idnya" value="<?php echo $id?>">
                                <input type="hidden" id="noka" name="noka" value="<?php echo $no_askes?>">
                                <input type="hidden" id="notransaksi" name="notransaksi" value="<?php echo $notransaksi?>">
                                <!-- <input type="text" id="nosep" name="nosep" value="<?php echo $nosep?>"> -->
                            </div>
                        </div>
                    </div>
                    <!-- <div class="row spacing-row"> -->
                        <!-- <div class="col-md-12"> -->
                            <!-- <b class="modal-title" id="exampleModalLabel"><h6>NO. SEP : <?php echo $nosep?></h6></b> -->
                        <!-- </div> -->
                    <!-- </div> -->
                    <?php
                        if ($nosep != '') {
                            $nosepisi=$nosep;
                        } else {
                            $nosepisi=getenv('V_PPK').'0823V00';
                        }
                    ?>
                    <div class="row spacing-row">
                        <div class="col-md-12">
                            <div class="row form-group">
                                <label class="col-md-2 col-sm-3 col-xs-12 col-form-label" style="color: black; font-size: 16px;">No. SEP</label>
                                <div class="col-md-3 col-sm-3 col-xs-12">
                                    <div class='input-group date'>
                                        <input type='text' class="form-control" id="nosep" maxlength="19" value="<?php echo $nosepisi?>" style="font-size: 16px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row spacing-row mt-3">
                        <div class="col-md-12">
                            <div class="row form-group" id="divPoli">
                                <label class="col-sm-2 col-form-label">Spesialis/SubSpesialis <label style="color:red;font-size:small">*</label></label>
                                <div class="col-md-5">
                                    <!-- <input type="text" class="form-control" name="txtnmpoli" id="txtnmpoli" value='Instalasi Gawat Darurat' disabled> -->
                                    <select class="form-control" style="width: 100%;" name="txtnmpoli" id="txtnmpoli" onchange="pilihpoli()">
                                    </select>
                                </div>   
                                <div class="col-md-5">
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="checkbox" id="chkseluruh" name="chkseluruh">Semua Spesialistik
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <input type="hidden" class="form-control" name="txtkdpoli" id="txtkdpoli">
                                </div>   
                            </div>
                        </div>
                    </div>
                    <div class="row spacing-row">
                        <div class="col-md-12">
                            <div class="row form-group">
                                <label class="col-md-2 col-sm-3 col-xs-12 col-form-label"><label style="color:gray;font-size:x-small"></label>  Tgl. Surat Kontrol</label>
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
                            <div class="row form-group" id="divPoli">
                                <label class="col-sm-2 col-form-label">DPJP yang Melayani <label style="color:red;font-size:small">*</label></label>  
                                <div class="col-md-5">
                                    <select class="form-control" name="txtnmdpjp" id="txtnmdpjp" onchange="pilihdokter()" >
                                    </select>
                                </div>    
                                <div class="col-md-2">
                                    <input type="text" class="form-control" name="txtkddpjp" id="txtkddpjp">
                                </div>   
                            </div>
                        </div>
                    </div>
                </form>
                <div class="row mt-3">
                    <div class="col-md-6 text-left">
                        <button id="simpanspri" target="_blank" class="btn btn-success" text-left>Simpan</button>
                    </div>
                    <div class="col-md-6 text-right">
                        <button id="batalspri"  class="btn btn-danger" text-right>Batal</button>
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


        function rubahtgl() {
            var tglsep = document.getElementById("txttglsepkode").value;
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

            $('#txtnmpoli_spe').select2({
                ajax: {
                    // url: "<?php echo site_url(); ?>/bpjs/ambillpoliinsert",
                    url: "<?php echo site_url(); ?>/bpjs/jadwalpolispesialistik",
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

            // dokter dpjp
            $('#txtnmdpjp').select2({
            placeholder: 'Pilih DPJP',
            minimumInputLength: 3,            
            allowClear: true,
            ajax: {
                url: "<?php echo site_url();?>/bpjs/ambilldpjpinsert_surkon",
                dataType: 'json',
                data: function (params) {
                    var query = {
                        search: params.term,
                        rawat: '2',
                        tgl: document.getElementById("txttglsep").value,
                        kdpoli:  document.getElementById("txtkdpoli").value,
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

            // changegol(0);
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

        function pilihdpjp() {
        }
    

        $(document).ready(function() {
            // var maximumStack = 1000;
            $("#simpanspri").click(function(e) {
                var notransaksi = document.getElementById("notransaksi").value;
                var nosep = document.getElementById("nosep").value;
                var noKartu = document.getElementById("noka").value;
                var tglSep = document.getElementById("txttglsep").value;
                var dpjpLayan = document.getElementById("txtkddpjp").value;
                var namadpjpLayan = $("#txtnmdpjp option:selected").text();
                var tujuan = document.getElementById("txtkdpoli").value;
                var namaTujuan = document.getElementById("txtnmpoli").value;
                $.ajax({
                    url: "<?php echo site_url(); ?>/bpjs/inserSurkon",
                    type: "GET",
                    data: {
                         notransaksi : notransaksi,
                         nosep : nosep,
                         noKartu : noKartu,
                         tglSep :tglSep,
                         tujuan :  tujuan,
                         namaTujuan :  namaTujuan,
                         dpjpLayan : dpjpLayan,
                         namadpjpLayan : namadpjpLayan
                    },
                    success: function(ajaxData) {
                        // console.log(ajaxData);
                        var t = JSON.parse(ajaxData)
                        if (t.stat == true) {
                            modalloadtutup();
                            tutupmodalform();
                            var nospri=t.dataspri.nospri;
                            console.log(nospri);
                            var win = window.open("<?php echo site_url(); ?>/bpjs/cetakspri_surkon/" + nospri, '_blank');
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
                <b class="modal-title" id="exampleModalLabel"><h5>FORM EDIT SURAT KONTROL</h5></b>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row spacing-row">
                        <div class="col-md-12">
                            <div class="row form-group" id="datahidden">
                                <input type="hidden" id="nospri" name="nospri" value="<?php echo $dtspri->nospri?>">
                                <input type="hidden" id="notransaksi" name="notransaksi" value="<?php echo $notransaksi?>">
                                <input type="hidden" id="nosep" name="nosep" value="<?php echo $dtspri->nosep ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row spacing-row">
                        <div class="col-md-12">
                            <b class="modal-title" id="exampleModalLabel"><h6>NO. SEP : <?php echo $nosep?></h6></b>
                        </div>
                    </div>
                    <div class="row spacing-row mt-4">
                        <div class="col-md-12">
                            <div class="row form-group" id="divPoli">
                                <label class="col-sm-2 col-form-label">Spesialis/SubSpesialis <label style="color:red;font-size:small">*</label></label>
                                <div class="col-md-5">
                                    <!-- <input type="text" class="form-control" name="txtnmpoli" id="txtnmpoli" value='Instalasi Gawat Darurat' disabled> -->
                                    <!-- <select class="form-control" style="width: 100%;" name="txtnmpoli" id="txtnmpoli" onchange="pilihpoli()"> -->
                                    <!-- </select> -->
                                    <select class="form-control" style="width: 100%;" name="txtnmpoli" id="txtnmpoli" onchange="pilihpoli()" disabled>
                                        <option value="<?php echo $dtspri->poli;?>" selected="selected"><?php echo $dtspri->nama_poli;?></option>
                                    </select>

                                </div>   
                                <div class="col-md-2">
                                    <input type="hidden" class="form-control" name="txtkdpoli" id="txtkdpoli" value="<?php echo $dtspri->poli;?>">
                                </div>   
                            </div>
                        </div>
                    </div>
                    <div class="row spacing-row">
                        <div class="col-md-12">
                            <div class="row form-group" id="divPoli">
                                <label class="col-sm-2 col-form-label">DPJP yang Melayani <label style="color:red;font-size:small">*</label></label>  
                                <div class="col-md-5">
                                    <!-- <select class="form-control" name="txtnmdpjp" id="txtnmdpjp" onchange="pilihdokter()" > -->
                                    <!-- </select> -->
                                    <select class="form-control" name="txtnmdpjp" id="txtnmdpjp" onchange="pilihdokter()" >
                                        <option value="<?php echo $dtspri->kodedokterbpjs;?>" selected="selected"><?php echo $dtspri->namadokter;?></option>
                                    </select>
                                </div>    
                                <div class="col-md-2">
                                    <input type="hidden" class="form-control" name="txtkddpjp" id="txtkddpjp" value="<?php echo $dtspri->kodedokterbpjs;?>">

                                </div>   
                            </div>
                        </div>
                    </div>
                    <div class="row spacing-row">
                        <div class="col-md-12">
                            <div class="row form-group">
                                <label class="col-md-2 col-sm-3 col-xs-12 col-form-label"><label style="color:gray;font-size:x-small"></label>  Tgl. SPRI</label>
                                <div class="col-md-3 col-sm-3 col-xs-12">
                                    <div class='input-group date'>
                                        <input type='date' class="form-control datepicker" id="txttglsepkode" placeholder="yyyy-MM-dd" maxlength="10" value="<?php echo $dtspri->tglrencanakontrol?>" onchange="rubahtgl()"/>
                                        <input type="hidden" id="txttglsep" name="txttglsep" value="<?php echo $dtspri->tglrencanakontrol?>" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="row mt-3">
                    <div class="col-md-6 text-left">
                        <button id="updatespri" target="_blank" class="btn btn-success" text-left>Update</button>
                    </div>
                    <div class="col-md-6 text-right">
                        <button id="batalspri"  class="btn btn-danger" text-right>Batal</button>
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

        
            // dokter dpjp
            $('#txtnmdpjp').select2({
            placeholder: 'Pilih DPJP',
            minimumInputLength: 3,            
            allowClear: true,
            ajax: {
                url: "<?php echo site_url();?>/bpjs/ambilldpjpinsert_surkon",
                dataType: 'json',
                data: function (params) {
                    var query = {
                        search: params.term,
                        rawat: '2',
                        tgl: '2023-07-28',
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

            // changegol(0);
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

        function pilihdpjp() {
        }
    

        $(document).ready(function() {
            // var maximumStack = 1000;
            $("#updatespri").click(function(e) {
                var nospri = document.getElementById("nospri").value;
                var notransaksi = document.getElementById("notransaksi").value;
                // var noKartu = document.getElementById("noka").value;
                var tglSep = document.getElementById("txttglsep").value;
                var dpjpLayan = document.getElementById("txtkddpjp").value;
                var namadpjpLayan = $("#txtnmdpjp option:selected").text();
                var tujuan = document.getElementById("txtkdpoli").value;
                // var namaTujuan = document.getElementById("txtnmpoli").value;
                var namaTujuan = $("#txtnmpoli option:selected").text();

                $.ajax({
                    url: "<?php echo site_url(); ?>/bpjs/editSPRI",
                    type: "GET",
                    data: {
                        nospri : nospri,
                        notransaksi : notransaksi,
                        tglSep :tglSep,
                        tujuan :  tujuan,
                        namaTujuan :  namaTujuan,
                        dpjpLayan : dpjpLayan,
                        namadpjpLayan : namadpjpLayan
                    },
                    success: function(ajaxData) {
                        console.log(ajaxData);
                        var t = JSON.parse(ajaxData)
                        if (t.stat == true) {
                            modalloadtutup();
                            tutupmodalform();
                            var nospri=t.dataspri.nospri;
                            console.log(nospri);
                            var win = window.open("<?php echo site_url(); ?>/bpjs/cetakspri/" + nospri, '_blank');
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
                <b class="modal-title" id="exampleModalLabel"><h5>HAPUS SURAT KONTROL</h5></b>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row spacing-row">
                        <div class="col-md-12">
                            <div class="row form-group" id="datahidden">
                                <input type="hidden" id="nospri" name="nospri" value="<?php echo $dtspri->nospri?>">
                                <input type="hidden" id="notransaksi" name="notransaksi" value="<?php echo $notransaksi?>">
                                <input type="hidden" id="nosep" name="nosep" value="<?php echo $dtspri->nospri ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row spacing-row">
                        <div class="col-md-12">
                            <div class="row form-group" id="divPoli">
                                <label class="col-sm-2 col-form-label">Spesialis/SubSpesialis <label style="color:red;font-size:small">*</label></label>
                                <div class="col-md-5">
                                    <!-- <input type="text" class="form-control" name="txtnmpoli" id="txtnmpoli" value='Instalasi Gawat Darurat' disabled> -->
                                    <!-- <select class="form-control" style="width: 100%;" name="txtnmpoli" id="txtnmpoli" onchange="pilihpoli()"> -->
                                    <!-- </select> -->
                                    <select class="form-control" style="width: 100%;" name="txtnmpoli" id="txtnmpoli" onchange="pilihpoli()" disabled>
                                        <option value="<?php echo $dtspri->poli;?>" selected="selected"><?php echo $dtspri->nama_poli;?></option>
                                    </select>

                                </div>   
                                <div class="col-md-2">
                                    <input type="hidden" class="form-control" name="txtkdpoli" id="txtkdpoli" value="<?php echo $dtspri->poli;?>">
                                </div>   
                            </div>
                        </div>
                    </div>
                    <div class="row spacing-row">
                        <div class="col-md-12">
                            <div class="row form-group" id="divPoli">
                                <label class="col-sm-2 col-form-label">DPJP yang Melayani <label style="color:red;font-size:small">*</label></label>  
                                <div class="col-md-5">
                                    <!-- <select class="form-control" name="txtnmdpjp" id="txtnmdpjp" onchange="pilihdokter()" > -->
                                    <!-- </select> -->
                                    <select class="form-control" name="txtnmdpjp" id="txtnmdpjp" onchange="pilihdokter()" disabled>
                                        <option value="<?php echo $dtspri->kodedokterbpjs;?>" selected="selected"><?php echo $dtspri->namadokter;?></option>
                                    </select>
                                </div>    
                                <div class="col-md-2">
                                    <input type="hidden" class="form-control" name="txtkddpjp" id="txtkddpjp" value="<?php echo $dtspri->kodedokterbpjs;?>">

                                </div>   
                            </div>
                        </div>
                    </div>
                    <div class="row spacing-row">
                        <div class="col-md-12">
                            <div class="row form-group">
                                <label class="col-md-2 col-sm-3 col-xs-12 col-form-label"><label style="color:gray;font-size:x-small"></label>  Tgl. SPRI</label>
                                <div class="col-md-3 col-sm-3 col-xs-12">
                                    <div class='input-group date'>
                                        <input type='date' class="form-control datepicker" id="txttglsepkode" placeholder="yyyy-MM-dd" maxlength="10" value="<?php echo $dtspri->tglrencanakontrol?>" onchange="rubahtgl()" disabled/>
                                        <input type="hidden" id="txttglsep" name="txttglsep" value="<?php echo $dtspri->tglrencanakontrol?>" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="row mt-3">
                    <div class="col-md-6 text-left">
                        <button id="deletespri" target="_blank" class="btn btn-danger" text-left>Delete</button>
                    </div>
                    <div class="col-md-6 text-right">
                        <button id="batalspri"  class="btn btn-success" text-right>Batal</button>
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
                        tgl: '2023-06-08',
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

            // changegol(0);
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

        function pilihdpjp() {
        }
    

        $(document).ready(function() {
            // var maximumStack = 1000;
            $("#deletespri").click(function(e) {
                var nospri = document.getElementById("nospri").value;
                $.ajax({
                    url: "<?php echo site_url(); ?>/bpjs/hapussurkon",
                    type: "GET",
                    data: {
                        nospri: nospri,
                    },
                    success: function(ajaxData) {
                        console.log(ajaxData);
                        var t = JSON.parse(ajaxData)
                        if (t.stat == true) {
                            // var t = JSON.parse(ajaxData)
                            var tx='SURAT KONTROL '+nospri+' Telah di hapus..';
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
} else if ($formpilih == 3) {
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
            // swal('SURAT KONTROL SUDAH DIGUNAKAN');
            swal('SURAT KONTROL BELUM TERBIT');
            tutupmodalform()
    
            // modalloadtutup();
        })
    </script>
<?php     
} else if ($formpilih == 4) { ?>
<div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <!-- <div class="box box-default box-solid" id="proseskotak"> -->
            <div class="modal-header p-1 pl-3 align-text-bottom">
                <b class="modal-title" id="exampleModalLabel"><h5>JADWAL DOKTER</h5></b>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <div class="row spacing-row">
                        <div class="col-md-12">
                            <div class="row form-group" id="divPoli">
                                <label class="col-sm-2 col-form-label">Spesialis/SubSpesialis <label style="color:red;font-size:small">*</label></label>
                                <div class="col-md-4">
                                    <!-- <input type="text" class="form-control" name="txtnmpoli" id="txtnmpoli" value='Instalasi Gawat Darurat' disabled> -->
                                    <select class="form-control" style="width: 100%;" name="txtnmpoli" id="txtnmpoli" onchange="pilihpoli()">
                                    </select>
                                </div>   
                                <label class="col-md-2 col-form-label"><label style="color:gray;font-size:x-small"></label>  Tgl. Renc.Kontrol</label>
                                <div class="col-md-2">
                                    <div class='input-group date'>
                                        <input type='date' class="form-control datepicker" id="txttglsepkode" placeholder="yyyy-MM-dd" maxlength="10"  onchange="rubahtgl()" />
                                        <input type="hidden" id="txttglsep" name="txttglsep"/>
                                    </div>
                                </div>
                                <div class="col-md-2 text-left">
                                    <button id="carijadwal"  class="btn btn-sm btn-info">Cari Data</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row spacing-row" hidden>
                        <div class="col-md-12">
                            <div class="row form-group" id="divPoli">
                                <label class="col-sm-2 col-form-label">JKontrol <label style="color:red;font-size:small">*</label></label>  
                                <div class="col-md-2">
                                    <input type="text" class="form-control" name="jeniskontrol" id="jeniskontrol" value="2">
                                </div>   
                            </div>
                        </div>
                        <div class="col-md-2">
                            <input type="hidden" class="form-control" name="txtkdpoli" id="txtkdpoli">
                            </div>   
                        </div>
                    <div class="row spacing-row">
                        <div class="col-md-12">
                            <div class="row form-group">
                               
                            </div>
                        </div>
                    </div>
                    <div class="row spacing-row mt-2">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="datajadwaldokter">
                                    <thead>
                                        <tr class='bg-success text-black'>
                                            <th width='10%'>Kode Dokter</th>
                                            <th >Nama Dokter</th>
                                            <th width="20%">Jadwal Praktek</th>
                                            <th width="6%">Kapasitas</th>
                                            <th width='6%'>Pilih</th>
                                        </tr>
                                    </thead>
                                    <tbody id="barisjadwaldokter">
                                        <!-- <tr>
                                            <td colspan="100%" class="text-center">
                                                Tidak Ada Data
                                            </td>
                                        </tr> -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
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
                        tgl: '2023-06-08',
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

            // changegol(0);
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

        function pilihdpjp() {
        }
    

        $(document).ready(function() {
            // var maximumStack = 1000;
            $("#carijadwal").click(function(e) {
                var txtkdpoli = document.getElementById("txtkdpoli").value;
                var txttglsep = document.getElementById("txttglsep").value;
                var jeniskontrol = document.getElementById("jeniskontrol").value;
                $.ajax({
                    url: "<?php echo site_url(); ?>/bpjs/cekjadwaldokter",
                    type: "GET",
                    data: {
                        txtkdpoli: txtkdpoli,
                        txttglsep: txttglsep,
                        jeniskontrol: jeniskontrol
                    },
                    success: function(ajaxData) {
                        console.log(ajaxData);
                        // swal('JADWAL DOKTER');
                        $("#datajadwaldokter tbody tr").remove();
						$("#datajadwaldokter tbody").append(ajaxData);
                    }
                });
            });
        });


</script>

<?php } ?>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/dist/js/alertsweet/salertnew.js"></script>
