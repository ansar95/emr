<div class="modal-dialog modal-xl" style="width:1000px;" >
	<div class="modal-content" >
		<form class="form-horizontal" id="kotakform">
			<div class="box box-default box-solid">
				<div class="modal-header">
                    <h6 class="modal-title">Cek Billing</h6>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="box-body row col-spacing-row">
						<div class="col-sm-6">
							<div class="form-group row col-spacing-row">
								<label for="inputEmail3" class="col-sm-4 control-label">No. Transaksi</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" name="trx" id="trx" value="<?php echo $hasil->notransaksi;?>" disabled>
								</div>
							</div>
                            
                            <div class="form-group row col-spacing-row">
                                <label for="inputEmail3" class="col-sm-4 control-label">No. RM</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="rm" id="rm" value="<?php echo $hasil->no_rm;?>" disabled>
                                </div>
                            </div>
                            <div class="form-group row col-spacing-row">
                                <label for="inputEmail3" class="col-sm-4 control-label">Nama</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="nm" id="nm" disabled value="<?php echo $hasil->nama_pasien;?>">
                                </div>
                            </div>
                            <div class="form-group row col-spacing-row">
                                <label for="inputEmail3" class="col-sm-4 control-label">DPJP</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="dpjp" id="dpjp" disabled value="<?php echo $dokter->nama_dokter;?>">
                                </div>
                            </div>
						</div>
                        <div class="col-sm-6">
                            <div class="form-group row col-spacing-row">
                                <label for="inputEmail3" class="col-sm-5 control-label">Tgl. Masuk</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="tm" id="tm" disabled value="<?php echo tanggaldua($hasil->tgl_masuk);?>">
                                </div>
                            </div>
                            <div class="form-group row col-spacing-row">
                                <label for="inputEmail3" class="col-sm-5 control-label">Tgl. Keluar</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="tk" id="tk" disabled value="<?php echo tanggaldua($hasil->tgl_keluar);?>">
                                </div>
                            </div>
                            <div class="form-group row col-spacing-row">
                                <label for="inputEmail3" class="col-sm-5 control-label">Cara Bayar</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="cb" id="cb" disabled value="<?php echo $hasil->golongan;?>">
                                </div>
                            </div>
                            <div class="form-group row col-spacing-row">
                                <label for="inputEmail3" class="col-sm-5 control-label">Status Pulang</label>
                                <div class="col-sm-7">
                                    <?php
                                       if ($hasil->statuspulang == 1){ $statuspulangnya='PULANG';} else {$statuspulangnya='BELUM PULANG';}
                                    ?>
                                    <input type="text" class="form-control" name="sp" id="sp" disabled value="<?php echo $statuspulangnya;?>">
                                </div>
                            </div>
                        </div>
					</div>
                    <div class="box-body row col-spacing-row">
                        <div class="col-sm-6">
                            <div class="form-group row col-spacing-row">
                                <label class="col-sm-4 control-label">Status Pasien</label>
                                <div class="col-sm-8">
                                    <!-- <div class="custom-control custom-radio custom-control-inline ">
                                        <label class="custom-control-label radio-primary">
                                           
                                            Dalam Perawatan
                                        </label>
                                         <input class="custom-control-input" type="radio" name="st" id="st" value="0" checked>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="st" id="st" value="1">
                                            Selesai Perawatan
                                        </label>
                                    </div> -->

                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" class="custom-control-input" name="st" value="0" id="st" checked disabled>
                                        <label class="custom-control-label" for="st">Dalam Perawatan</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" class="custom-control-input" name="st" value="1" id="st1" disabled>
                                        <label class="custom-control-label" for="st1">Selesai Perawatan</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row col-spacing-row">
                                <label class="col-sm-4 control-label">Masukkan Selisih Kelas</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control text-right"  onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" name="selisihkelas" id="selisihkelas" autocomplete="off" value="<?php echo formatuang($hasil->selisih);?>" disabled>

                                    <!-- <input type="text" class="form-control" name="sbs" id="sbs"  onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" autocomplete="off" value="<?php echo formatuang($jumlahharusdibayarkan);?>"> -->

                                </div>
                            </div>               
                            <div class="form-group row col-spacing-row">
                                <label class="col-sm-4 control-label"></label>
                                <div class="col-sm-8 ">
                                    <button class="btn btn-danger btn-flat" type="button" onclick="postingdata()">POSTING BILLING</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group row col-spacing-row">
                                <label class="col-sm-5 control-label">Nilai Billing</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control text-right"  name="nb" id="nb" disabled>
                                </div>
                            </div>
                            <div class="form-group row col-spacing-row">
                                <label class="col-sm-5 control-label">Ditanggung Asuransi</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control text-right" name="as" id="as" disabled>
                                </div>
                            </div>
                            <div class="form-group row col-spacing-row">
                                <label class="col-sm-5 control-label">Komponen Berlaku Umum</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control text-right" name="sb" id="sb" disabled>
                                </div>
                            </div>
                                      
                        </div>
                    </div>
				</div> 
				<div class="modal-footer">
					<div class="row">
						<div class="col-sm-12">
                            <!-- digabung saja krn kasus di pemprov tidak perlu terbagi -->
                            <!-- <button type="button" onclick="cetakpostingrekapumum()" class="btn btn-warning btn-flat btn-sm">Rekap Billing Umum</button> -->
                            <!-- <button type="button" onclick="cetakpostingumum()" class="btn btn-warning btn-flat btn-sm">Billing Umum</button> -->
                            <button type="button" onclick="cetakpostingrekap()" class="btn btn-primary btn-flat btn-sm">Rekap Billing</button>
                            <button type="button" onclick="cetakposting()" class="btn btn-primary btn-flat btn-sm">Billing Rincian</button>
						</div>
					</div>
				</div>
			</div>
		<form>
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
		$.notify("Sukses Proses Data", "success");
	}

	function gagalalert() {
		$.notify("Gagal Proses Data", "error");
	}

    function belumpulang() {
		$.notify("Pasien Belum Status Pulang", "error");
	}

	$(function () {
        // $('#tglmasuk').datepicker({ autoclose: true }).datepicker("setDate", "0");
        // $('#tglrujuk').datepicker({ autoclose: true }).datepicker("setDate", "0");
        // $('#jammasuk').timepicker({
			// showInputs: false,
			// minuteStep: 1,
			// showMeridian: false
        // })
        // $('#tp').select2({ tags :true });
        // $('#kp').select2({ tags :true });
        // $('#gol').select2({ tags :true });
        // $('#rujukan').select2({ tags :true });
        // $('#jp').select2({ tags :true });
        // $('#icd').select2({ tags :true });
        // $('#dokter').select2({ tags :true });
	});

	function postingdata() {
        var st = $("input[name='st']:checked").val();
        var trx = document.getElementById("trx").value;
        var rm = document.getElementById("rm").value;
        var sp = document.getElementById("sp").value;
        var selisihkelas = document.getElementById("selisihkelas").value;
        
        if (st == 1 && sp == 'BELUM PULANG') {
            belumpulang();}
        else {
        $.ajax({
            url: "<?php echo site_url();?>/billing/prosesbillingposting_cek",
            type: "GET",
            data : {
                rm: rm,
                st: st,
                trx: trx,
                selisihkelas : selisihkelas
            },
            success: function (ajaxData){
                console.log(ajaxData);
                var t = JSON.parse(ajaxData);
                suksesalert();
                document.getElementById("sb").value = tandaPemisahTitik(t.hasil[0])
                document.getElementById("nb").value = tandaPemisahTitik(t.hasil[1])
                document.getElementById("as").value = tandaPemisahTitik(t.hasil[2])
               
            }
        }) };
    }
    
    function cetakposting() {
        var st = $("input[name='st']:checked").val();
        var trx = document.getElementById("trx").value;
        var rm = document.getElementById("rm").value;
        window.open("<?php echo site_url();?>/billing/cetakpostingbilling/"+trx+"/"+rm+"/"+st+"", '_blank');
    }

    function cetakpostingrekap() {
        var st = $("input[name='st']:checked").val();
        var trx = document.getElementById("trx").value;
        var rm = document.getElementById("rm").value;
        window.open("<?php echo site_url();?>/billing/cetakpostingbillingrekap/"+trx+"/"+rm+"/"+st+"", '_blank');
    }

    function cetakpostingumum() {
        var st = $("input[name='st']:checked").val();
        var trx = document.getElementById("trx").value;
        var rm = document.getElementById("rm").value;
        window.open("<?php echo site_url();?>/billing/cetakpostingbillingumum/"+trx+"/"+rm+"/"+st+"", '_blank');
    }

    function cetakpostingrekapumum() {
        var st = $("input[name='st']:checked").val();
        var trx = document.getElementById("trx").value;
        var rm = document.getElementById("rm").value;
        window.open("<?php echo site_url();?>/billing/cetakpostingbillingrekapumum/"+trx+"/"+rm+"/"+st+"", '_blank');
    }

	$(document).ready(function () {

		$("#simpanregis").click(function(e) {
			var rm = document.getElementById("rm").value;
			var tglmasuk = document.getElementById("tglmasuk").value;
			var jammasuk = document.getElementById("jammasuk").value;
			var kunjungan = $("input[name='kunjungan']:checked").val();
			var tp = $("#tp").val();
			var tptext = $("#tp option:selected").text();
			var gol = $("#gol").val();
			var goltext = $("#gol option:selected").text();
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
            var keluhan = $("#keluhan").val();
            var cm = $("#cm").val();
			$.ajax({
				url: "<?php echo site_url();?>/registrasipasien/simpanregisugd",
				type: "GET",
				data : {
					rm: rm,
					tglmasuk: tglmasuk,
					jammasuk: jammasuk,
					kunjungan: kunjungan,
					tp: tp,
					tptext: tptext,
					gol: gol,
					goltext: goltext,
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
                    keluhan: keluhan,
                    cat: cat,
                    cm: cm
				},
				success: function (ajaxData){
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
	

//atur angka

function tandaPemisahTitik(b){
    // var sbs = document.getElementById("sbs").value;
        // document.getElementById("sbs1").value=preg_replace("/[^0-9]/", "", sbs);

        var _minus = false;
        if (b<0) _minus = true;
        b = b.toString();
        b=b.replace(".","");
        b=b.replace("-","");
        c = "";
        panjang = b.length;
        j = 0;
        for (i = panjang; i > 0; i--){
        j = j + 1;
        if (((j % 3) == 1) && (j != 1)){
        c = b.substr(i-1,1) + "." + c;
        } else {
        c = b.substr(i-1,1) + c;
        }
        }
        if (_minus) c = "-" + c ;
        return c;
}


        function numbersonly(ini, e){
        if (e.keyCode>=49){
        if(e.keyCode<=57){
        a = ini.value.toString().replace(".","");
        b = a.replace(/[^\d]/g,"");
        b = (b=="0")?String.fromCharCode(e.keyCode):b + String.fromCharCode(e.keyCode);
        ini.value = tandaPemisahTitik(b);
        return false;
        }
        else if(e.keyCode<=105){
        if(e.keyCode>=96){
        //e.keycode = e.keycode - 47;
        a = ini.value.toString().replace(".","");
        b = a.replace(/[^\d]/g,"");
        b = (b=="0")?String.fromCharCode(e.keyCode-48):b + String.fromCharCode(e.keyCode-48);
        ini.value = tandaPemisahTitik(b);
        //alert(e.keycode);
        return false;
        }
        else {return false;}
        }
        else {
        return false; }
        }else if (e.keyCode==48){
        a = ini.value.replace(".","") + String.fromCharCode(e.keyCode);
        b = a.replace(/[^\d]/g,"");
        if (parseFloat(b)!=0){
        ini.value = tandaPemisahTitik(b);
        return false;
        } else {
        return false;
        }
        }else if (e.keyCode==95){
        a = ini.value.replace(".","") + String.fromCharCode(e.keyCode-48);
        b = a.replace(/[^\d]/g,"");
        if (parseFloat(b)!=0){
        ini.value = tandaPemisahTitik(b);
        return false;
        } else {
        return false;
        }
        }else if (e.keyCode==8 || e.keycode==46){
        a = ini.value.replace(".","");
        b = a.replace(/[^\d]/g,"");
        b = b.substr(0,b.length -1);
        if (tandaPemisahTitik(b)!=""){
        ini.value = tandaPemisahTitik(b);
        } else {
        ini.value = "";
        }

        return false;
        } else if (e.keyCode==9){
        return true;
        } else if (e.keyCode==17){
        return true;
        } else {
        //alert (e.keyCode);
        return false;
        }

     }

</script>

