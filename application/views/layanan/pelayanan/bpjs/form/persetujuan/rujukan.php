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
                                <label class="col-sm-6 control-label mt-3" style="padding-top: 4px;">RUJUKAN</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group row">
                            <label class="col-md-2 control-label" style="padding-top: 4px;">Masukkan Nomor Transaksi</label>
                            <div class="col-md-3">
                                <input type="text" class="form-control" name="notrx" id="notrx" autocomplete="off" />
                            </div>
                            <div class="col-md-1 my-auto">
                                <button class="btn btn-sm btn-primary" onclick="caridata()">Cari</button>
                            </div>
                            <div class="col-md-6 text-right">
                                <div id="isinorujukan"></div>
                            </div>
                            <div class="col-md-3">
                                <input type="hidden" class="form-control" name="norujukanedit" id="norujukanedit" autocomplete="off" />
                            </div>
                        </div>
                    </div>
                    <div class="card-body position-relative" id="kotakdetail">
                        <div class="row mb-2">
                            <div class="col-12">
                                <div class="d-flex justify-content-between">
                                    <b class="">DATA RUJUKAN</b>
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
                                    <label class="col-sm-2 control-label">No.Kartu</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="noka" id="noka" disabled/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 control-label">Nama</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="nama" id="nama" disabled disabled/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                        <label class="col-sm-2 control-label">Tanggal Rujukan</label>
                                        <div class="col-sm-3">
                                            <input type="date" class="form-control" name="tglrujukan" id="tglrujukan" onchange="rubahtglrujukan()" >
                                            <input type="hidden" id="txttglrujukan" name="txttglrujukan"/>
                                        </div>
                                </div>
                                <div class="form-group row">
                                        <label class="col-sm-2 control-label">Tanggal Kunjungan</label>
                                        <div class="col-sm-3">
                                            <input type="date" class="form-control" name="tglkunjungan" id="tglkunjungan" onchange="rubahtglkunjumgan()" >
                                            <input type="hidden" id="txttglkunjungan" name="txttglkunjungan"/>
                                        </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 control-label">Pelayanan</label>
                                    <div class="col-sm-3">
                                        <select class="form-control" style="width: 100%;" name="pelayanan" id="pelayanan">
                                            <option value="1">Rawat Inap</option>
                                            <option value="2">Rawat Jalan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label class="col-sm-2 col-form-label">Tipe Rujukan </label>
                                    <div class="col-sm-8">
                                        <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" class="custom-control-input" name="title" id="title0" value="0" checked>
                                                <label class="custom-control-label" for="title0">Penuh</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" class="custom-control-input" name="title" id="title1" value="1">
                                                <label class="custom-control-label" for="title1">Partial</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" class="custom-control-input" name="title" id="title2" value="2">
                                                <label class="custom-control-label" for="title2">Rujuk Balik(Non PRB)</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row spacing-row">
                                    <div class="col-md-12">
                                        <div class="row form-group">
                                            <label class="col-md-2 col-sm-3 col-xs-12 col-form-label">Diagnosa <label style="color:red;font-size:small"></label></label>
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
                                            <label class="col-md-2 col-sm-3 col-xs-12 col-form-label">Di Rujuk Ke <label style="color:red;font-size:small"></label></label>
                                            <div class="col-md-7 col-sm-9 col-xs-12">
                                                <select class="form-control" style="width: 100%;" name="ppkdirujuk" id="ppkdirujuk" onchange="pilihfaskes()">
                                                </select>
                                                <label id="lblDxSpesialistik" style="color:red"></label>
                                            </div>
                                            <div class="col-md-2">
                                                <input type="text" class="form-control" id="txtppkdirujuk">
                                            </div> 
                                        </div>
                                    </div>
                                </div>

                                <div class="row form-group" id="divPoli">
                                    <label class="col-sm-2 col-form-label">Spesialis/SubSpesialis</label>
                                    <div class="col-md-7">
                                        <select class="form-control" style="width: 100%;" name="txtnmpoli" id="txtnmpoli" onchange="pilihpoli()">
                                        </select>
                                    </div>   
                                    <div class="col-md-2">
                                        <input type="text" class="form-control" name="txtkdpoli" id="txtkdpoli">
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
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <button id="simpanrujukan" class="btn btn-primary">Simpan</button>
                                        <button id="updaterujukan" class="btn btn-primary" hidden>Update</button>
                                        <button id="editrujukan" class="btn btn-warning" hidden>Edit</button>
                                        <button id="hapusrujukan" class="btn btn-danger" hidden>Hapus</button>
                                        <button id="cetakrujukan" class="btn btn-info" hidden>Cetak</button>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <button id="Batal" class="btn btn-secondary">Batal</button>
                                    </div>
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
    
    function rubahtglrujukan() {
        var tglrujukan = document.getElementById("tglrujukan").value;
        $('#txttglrujukan').val(tglrujukan);
    }

    function rubahtglkunjumgan() {
        var tglkunjungan = document.getElementById("tglkunjungan").value;
        $('#txttglkunjungan').val(tglkunjungan);
    }
    function caridata() {
            var notrx = document.getElementById("notrx").value;
            // alert(notrx);
			$.ajax({
				url: "<?php echo site_url();?>/bpjs/caridatarujukan",
				type: "GET",
				data: {
					notrx: notrx
				},
				success: function (ajaxData){
					console.log(ajaxData);
					var dt = JSON.parse(ajaxData);
					// console.log(dt.nosep);
                    $('#nosep').val(dt.nosepreg);
                    $('#nama').val(dt.nama_pasien);
                    $('#noka').val(dt.noka);
                    $('#tglrujukan').val(dt.tglrujukan);
                    $('#tglkunjungan').val(dt.tglkunjungan);
					$('#pelayanan').val(dt.pelayanan).trigger('change');
                    if (dt.tipe == 0) {  title0.checked = true;}
                    if (dt.tipe == 1) {  title1.checked = true;}
                    if (dt.tipe == 2) {  title2.checked = true;}
					$('#txtnmdiagnosa').val(dt.namadiagnosa).trigger('change');
                    $('#txtkddiagnosa').val(dt.diagnosa);

					$('#ppkdirujuk').val(dt.namars).trigger('change');
                    $('#txtppkdirujuk').val(dt.koders);

                    $('#txtnmpoli').val(dt.namapoli).trigger('change');
                    $('#txtkdpoli').val(dt.poli);

                    $('#txtcatatan').val(dt.catatan);
                    
                    if (dt.norujukan != null) {
                        $('#isinorujukan').html('No. Rujukan :' + dt.norujukan);
                        $('#norujukanedit').val(dt.norujukan);
                        document.getElementById("simpanrujukan").hidden=true;

                        document.getElementById("tglrujukan").disabled=true;
                        document.getElementById("tglkunjungan").disabled=true;
                        document.getElementById("pelayanan").disabled=true;
                        document.getElementById("txtnmdiagnosa").disabled=true;
                        document.getElementById("ppkdirujuk").disabled=true;
                        document.getElementById("txtnmpoli").disabled=true;
                        document.getElementById("txtcatatan").disabled=true;


                        document.getElementById("editrujukan").hidden=false;
                        document.getElementById("hapusrujukan").hidden=false;
                        document.getElementById("cetakrujukan").hidden=false;
                    }    



				},
				error: function(data) {
					// gagalalert();
					// modaldetailtutup();
				}
			});
		}

 

    function pilihdiagnosa(){
            const selectedPackage = $('#txtnmdiagnosa').val();
            $('#txtkddiagnosa').val(selectedPackage);
        }
  
    function pilihfaskes(){
            const selectedPackage = $('#ppkdirujuk').val();
            $('#txtppkdirujuk').val(selectedPackage);
        }

    function pilihpoli(){
            const selectedPackage = $('#txtnmpoli').val();
            $('#txtkdpoli').val(selectedPackage);
        }
</script>
