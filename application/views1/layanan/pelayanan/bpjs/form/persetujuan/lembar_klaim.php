<!-- START: Card Data-->
<main>
    <div class="container-fluid site-width">
        <!-- START: Breadcrumbs-->
        <div class="row ">
            <div class="col-12  align-self-center">
                <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                    </ol>
                </div>
            </div>
        </div>
        <!-- END: Breadcrumbs-->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="row">
                        <div class="col-12 col-md-5">
                            <div class="form-group">
                                <label class="col-sm-6 control-label mt-3" style="padding-top: 4px;">Masukkan Nomor Transaksi</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="notrx" id="notrx" autocomplete="off" />
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-1 my-auto">
                            <button class="btn btn-sm btn-primary" onclick="caridata()">Cari</button>
                        </div>
                    </div>
                    <div class="card-body position-relative" id="kotakdetail">
                        <div class="row mb-2">
                            <div class="col-12">
                                <div class="d-flex justify-content-between">
                                    <b class="">Data Pelayanan</b>
                                </div>
                            </div>
                        </div>
                       <!-- ========== -->
                       <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <label class="col-sm-2 control-label">No. SEP</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="nosep" id="nosep"  disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 control-label">Tanggal Masuk</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" name="tglmasuk" id="tglmasuk" disabled/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 control-label">Tanggal Keluar</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" name="tglkeluar" id="tglkeluar" disabled/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 control-label">No.Kartu</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="noka" id="noka" disabled/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 control-label">Nama</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="nama" id="nama" disabled disabled/>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <label class="col-md-2 col-sm-3 col-xs-12 col-form-label">Ruang Rawat <label style="color:red;font-size:small">*</label></label>
                                    <div class="col-md-7 col-sm-9 col-xs-12">
                                        <select class="form-control" style="width: 100%;" name="txtnmruangrawat" id="txtnmruangrawat" onchange="pilihprocedure()">
                                        </select>
                                        <label id="lblDxSpesialistik3" style="color:red"></label>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="hidden" class="form-control" id="txtkdruangrawat">
                                    </div> 
                                </div>

                                <div class="row form-group">
                                    <label class="col-md-2 col-sm-3 col-xs-12 col-form-label">Kelas Rawat <label style="color:red;font-size:small">*</label></label>
                                    <div class="col-md-7 col-sm-9 col-xs-12">
                                        <select class="form-control" style="width: 100%;" name="txtnmkelasrawat" id="txtnmkelasrawat" onchange="pilihprocedure()">
                                        </select>
                                        <label id="lblDxSpesialistik3" style="color:red"></label>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="hidden" class="form-control" id="txtkdkelasrawat">
                                    </div> 
                                </div>

                                <div class="row form-group">
                                    <label class="col-md-2 col-sm-3 col-xs-12 col-form-label">Spesialistik <label style="color:red;font-size:small">*</label></label>
                                    <div class="col-md-7 col-sm-9 col-xs-12">
                                        <select class="form-control" style="width: 100%;" name="txtnmspesialistik" id="txtnmspesialistik" onchange="pilihprocedure()">
                                        </select>
                                        <label id="lblDxSpesialistik3" style="color:red"></label>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="hidden" class="form-control" id="txtkdspesialistik">
                                    </div> 
                                </div>

                                <div class="row form-group">
                                    <label class="col-md-2 col-sm-3 col-xs-12 col-form-label">Dokter Spesialis <label style="color:red;font-size:small">*</label></label>
                                    <div class="col-md-7 col-sm-9 col-xs-12">
                                        <select class="form-control" style="width: 100%;" name="txtnmdokter" id="txtnmdokter" onchange="pilihprocedure()">
                                        </select>
                                        <label id="lblDxSpesialistik3" style="color:red"></label>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="hidden" class="form-control" id="txtkddokter">
                                    </div> 
                                </div>

                                <div class="row form-group">
                                    <label class="col-md-2 col-sm-3 col-xs-12 col-form-label">Cara Keluar <label style="color:red;font-size:small">*</label></label>
                                    <div class="col-md-7 col-sm-9 col-xs-12">
                                        <select class="form-control" style="width: 100%;" name="txtnmcarakeluar" id="txtnmcarakeluar" onchange="pilihprocedure()">
                                        </select>
                                        <label id="lblDxSpesialistik3" style="color:red"></label>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="hidden" class="form-control" id="txtkdcarakeluar">
                                    </div> 
                                </div>

                                <div class="row form-group">
                                    <label class="col-md-2 col-sm-3 col-xs-12 col-form-label">Kondisi Pulang <label style="color:red;font-size:small">*</label></label>
                                    <div class="col-md-7 col-sm-9 col-xs-12">
                                        <select class="form-control" style="width: 100%;" name="txtnmkondisipulang" id="txtnmkondisipulang" onchange="pilihprocedure()">
                                        </select>
                                        <label id="lblDxSpesialistik3" style="color:red"></label>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="hidden" class="form-control" id="txtkdkondisipulang">
                                    </div> 
                                </div>

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

                                <div class="row form-group">
                                    <label class="col-md-2 col-sm-3 col-xs-12 col-form-label">Procedure <label style="color:red;font-size:small">*</label></label>
                                    <div class="col-md-7 col-sm-9 col-xs-12">
                                        <select class="form-control" style="width: 100%;" name="txtnmprocedure" id="txtnmprocedure" onchange="pilihprocedure()">
                                        </select>
                                        <label id="lblDxSpesialistik2" style="color:red"></label>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="hidden" class="form-control" id="txtkdprocedure">
                                    </div> 
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 control-label">Status Pulang</label>
                                    <div class="col-sm-4">
                                        <select class="form-control" style="width: 100%;" name="pelayanan" id="pelayanan" onchange="pilihpelayanan()">
                                            <option value="1">Atas Persetujuan Dokter</option>
                                            <option value="3">Atas Permintaan Sendiri</option>
                                            <option value="4">Meninggal</option>
                                            <option value="5">Lain-lain</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-1">
                                            <input type="text" class="form-control" name="txtpelayanan" id="txtpelayanan" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <button id="simpantglpulang" class="btn btn-primary">Simpan</button>
                            </div>
                            <div class="col-md-6 text-right">
                                <button id="Batal" class="btn btn-secondary">Batal</button>
                            </div>
                        </div>
                    </div>
                   
                       <!-- ====
                       ===== -->
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>


<script>

    function modalloadtutup() {
            $(".overlay").remove();
    }

    function tutupmodalform() {
			$(function() {
				$('#formmodal').modal('toggle');
			});
	}
    
    function rubahtglmeninggal() {
        var tglmeninggal = document.getElementById("tglmeninggal").value;
        $('#txttglmeninggal').val(tglmeninggal);
    }

    function rubahtglpulang() {
        var tglpulang = document.getElementById("tglpulang").value;
        $('#txttglpulang').val(tglpulang);
    }


    function caridata() {
            var notrx = document.getElementById("notrx").value;
            // alert(notrx);
			$.ajax({
				url: "<?php echo site_url();?>/bpjs/caridatapulang",
				type: "GET",
				data: {
					notrx: notrx
				},
				success: function (ajaxData){
					console.log(ajaxData);
					var dt = JSON.parse(ajaxData);
					console.log(dt.nosep);
                    $('#nosep').val(dt.nosep);
                    $('#nama').val(dt.nama_pasien);
                    $('#noka').val(dt.noka);
                    $('#tglmeninggal').val(dt.tglmeninggal);
                    $('#nosurat').val(dt.nosurat);
                    $('#tglpulang').val(dt.tglpulang);


                    
					
				},
				error: function(data) {
					// gagalalert();
					// modaldetailtutup();
				}
			});
		}

    function pilihpelayanan() {
        var cek = $("#pelayanan").val();
        document.getElementById("txtpelayanan").value=cek;

        // alert(cek);
        if( cek != 3) {
            // alert( 'benar');
            document.getElementById("meningggal").hidden=false;
        } else {
            // alert( 'salah');
            document.getElementById("meningggal").hidden=true;
        }	
    }

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
  
   
</script>
