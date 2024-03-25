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
                                    <label class="col-sm-4 control-label">No. SEP</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="nosep" id="nosep"  disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 control-label">No.Kartu</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="noka" id="noka" disabled/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 control-label">Nama</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="nama" id="nama" disabled disabled/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 control-label">Status Pulang</label>
                                    <div class="col-sm-7">
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
                                
                               <div id="meninggal">
                                    <div class="form-group row">
                                        <label class="col-sm-4 control-label">Tanggal Meninggal</label>
                                        <div class="col-sm-4">
                                            <input type="date" class="form-control" name="tglmeninggal" id="tglmeninggal" onchange="rubahtglmeninggal()" >
                                            <input type="hidden" id="txttglmeninggal" name="txttglmeninggal"/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 control-label">No.Surat Keterangan Meninggal</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="nosurat" id="nosurat" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                        <label class="col-sm-4 control-label">Tanggal Pulang</label>
                                        <div class="col-sm-4">
                                            <input type="date" class="form-control" name="tglpulang" id="tglpulang" onchange="rubahtglpulang()">
                                            <input type="hidden" id="txttglpulang" name="txttglpulang" />
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


  
</script>
