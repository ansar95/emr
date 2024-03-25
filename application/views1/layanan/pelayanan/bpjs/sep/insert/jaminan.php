<div class="text-muted well well-sm no-shadow">
    <div class="row spacing-row">
        <div class="col-md-12">
            <div class="row form-group">
                <label class="col-md-2 col-sm-3 col-xs-12 control-label col-form-label">Tanggal Kejadian</label>
                <div class="col-md-3">
                    <input type='date' class="form-control datepicker" id="isitxtTglKejadian" name="isitxtTglKejadian" maxlength="10" onchange="rubahtglkecelakaan()"/>
                    <input type='hidden' class="form-control" id="txtTglKejadian" name="txtTglKejadian" placeholder="yyyy-MM-dd" maxlength="10"/>
                </div>    
                <div class="col-md-2">
                    <span class="input-group-addon">
                        <label class="form-control col-form-label"><input type="checkbox" id="chksuplesi" name="chksuplesi" disabled> Suplesi</label>
                    </span>
                </div>    
                <label class="col-md-2 col-sm-3 col-xs-12 control-label text-right col-form-label">No Suplesi</label>
                <div class="col-md-2">
                    <input type="text" class="form-control" name="nosuplesi" id="nosuplesi" readonly>
                </div> 
            </div>
        </div>
    </div>
    <div class="row spacing-row">
        <div class="col-md-12">
            <div class="row form-group">
                <label class="col-md-2 col-sm-3 col-xs-12 control-label col-form-label">Laporan Polisi</label>
                <div class="col-md-3">
                    <input type='text' class="form-control datepicker" id="txtLP" name="txtLP"/>
                </div>    
            </div>
        </div>
    </div>
    <div class="row spacing-row">
        <div class="col-md-12">
            <div class="row form-group">
                <label class="col-md-2 col-sm-3 col-xs-12 control-label">Lokasi Kejadian</label>
                <div class="col-md-5 col-sm-7 col-xs-12">
                    <select class="form-control" id="cbpropinsi" name="cbpropinsi" onchange="pilihprov()"></select>
                </div>
                <div class="col-md-2">
                    <input type="hidden" class="form-control col-form-label" name="cbkdpropinsi" id="cbkdpropinsi" >
                </div>   
            </div>
        </div>
    </div>
    <div class="row spacing-row">
        <div class="col-md-12">
            <div class="row form-group">
                <label class="col-md-2 col-sm-3 col-xs-12 control-label"></label>
                <div class="col-md-5 col-sm-7 col-xs-12">
                    <select class="form-control col-form-label" id="cbkabupaten" name="cbkabupaten" onchange="pilihkab()"></select>
                </div>
                <div class="col-md-2">
                    <input type="hidden" class="form-control" name="cbkdkabupaten" id="cbkdkabupaten">
                </div>  
            </div>
        </div>
    </div>
    <div class="row spacing-row">
        <div class="col-md-12">
            <div class="row form-group">
                <label class="col-md-2 col-sm-3 col-xs-12 control-label"></label>
                <div class="col-md-5 col-sm-7 col-xs-12">
                    <select class="form-control" id="cbkecamatan" name="cbkecamatan" onchange="pilihkec()"></select>
                </div>
                <div class="col-md-2">
                    <input type="hidden" class="form-control" name="cbkdkecamatan" id="cbkdkecamatan">
                </div> 
            </div>
        </div>
    </div>

    <div class="row spacing-row">
        <div class="col-md-12">
            <div class="row form-group">
                <label class="col-md-2 col-sm-3 col-xs-12 control-label col-form-label">Keterangan Kejadian</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                    <textarea class="form-control" id="txtketkejadian" name="txtketkejadian" rows="2" placeholder="ketik keterangan kejadian"></textarea>
                </div>
            </div>
        </div>
    </div>                          
</div>

<script>
     // ---provinsi
     $('#cbpropinsi').select2({
            placeholder: 'pilih provinsi',
            minimumInputLength: 3,            
            allowClear: true,
            ajax: {
                url: "<?php echo site_url();?>/bpjs/ambillprovinsiinsert",
                dataType: 'json',
                data: function (params) {
                    var query = {
                        search: params.term,
                        type: 'public'
                    }
                    return query;
                },
                processResults: function (data) {
                    console.log(data);
                    return {
                        results: data.items
                    };
                }
            }
    });

    function pilihprov(){
            const selectedPackage = $('#cbpropinsi').val();
            $('#cbkdpropinsi').val(selectedPackage);
    }

    $('#cbkabupaten').select2({
            placeholder: 'pilih kabupaten',
            minimumInputLength: 3,            
            allowClear: true,
            ajax: {
                url: "<?php echo site_url();?>/bpjs/ambillinsertkabupaten",
                dataType: 'json',
                data: function (params) {
                    var query = {
                        search: params.term,
                        provinsi: $("#cbkdpropinsi").val(),
                        // provinsi: "25",
                        type: 'public'
                    }
                    return query;
                },
                processResults: function (data) {
                    console.log(data);
                    return {
                        results: data.items
                    };
                }
            }
    });

    $('#cbkecamatan').select2({
            placeholder: 'pilih kecamatan',
            minimumInputLength: 3,            
            allowClear: true,
            ajax: {
                url: "<?php echo site_url();?>/bpjs/ambillinsertkecamatan",
                dataType: 'json',
                data: function (params) {
                    var query = {
                        search: params.term,
                        kabupaten: $("#cbkdkabupaten").val(),
                        type: 'public'
                    }
                    return query;
                },
                processResults: function (data) {
                    console.log(data);
                    return {
                        results: data.items
                    };
                }
            }
    });
    
    function pilihkab(){
            const selectedPackage = $('#cbkabupaten').val();
            $('#cbkdkabupaten').val(selectedPackage);
    }

    function pilihkec(){
            const selectedPackage = $('#cbkecamatan').val();
            $('#cbkdkecamatan').val(selectedPackage);
    }

    function rubahtglkecelakaan() {
            var tglkec = document.getElementById("isitxtTglKejadian").value;
            // result = tglsep.substring(6, 4)+'-'+tglsep.substring(3, 2)+'-'+tglsep.substring(0, 2);
            $('#txtTglKejadian').val(tglkec);
        }

</script>