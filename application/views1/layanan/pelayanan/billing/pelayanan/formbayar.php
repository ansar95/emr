
<div class="modal-dialog modal-xl" style="width:1000px;" >
	<div class="modal-content" >
		<form class="form-horizontal" id="kotakform">
			<div class="box box-default box-solid">
                <h6 class="modal-title">Pembayaran</h6>
				<div class="modal-header">
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
                            <!-- <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label">DPJP</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="dpjp" id="dpjp" disabled value="<?php echo $hasil->nama_dokter;?>">
                                </div>
                            </div> -->
						</div>
                        <div class="col-sm-6">
                            <div class="form-group row col-spacing-row">
                                <label for="inputEmail3" class="col-sm-6 control-label">Tgl. Masuk</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="tm" id="tm" disabled value="<?php echo tgl_format_indo($hasil->tgl_masuk);?>">
                                </div>
                            </div>
                            <div class="form-group row col-spacing-row">
                                <label for="inputEmail3" class="col-sm-6 control-label">Tgl. Keluar</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="tk" id="tk" disabled value="<?php echo tgl_format_indo($hasil->tgl_keluar);?>">
                                </div>
                            </div>
                            <div class="form-group row col-spacing-row">
                                <label for="inputEmail3" class="col-sm-6 control-label">Cara Bayar</label>
                                <div class="col-sm-6">
                                    <input type="text"  class="form-control" name="cb" id="cb" disabled value="<?php echo $hasil->golongan;?>">
                                </div>
                            </div>
	                        <div class="form-group row col-spacing-row">
		                        <label for="inputEmail3" class="col-sm-6 control-label">Nama Asuransi</label>
		                        <div class="col-sm-6">
			                        <input type="text" class="form-control" name="na" id="na" disabled value="<?php echo $hasil->asuransi;?>">
		                        </div>
	                        </div>
                        </div>
					</div>
                    <div class="box-body row col-spacing-row">
                        <div class="col-sm-6">
                            <div class="form-group row col-spacing-row">
                                <label class="col-sm-4 control-label">Catatan</label>
                                <div class="col-sm-8">
                                    <textarea rows="3" class="form-control" id="cat" name="cat"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group row col-spacing-row">
                                <label class="col-sm-6 control-label">Nilai Billing</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control text-right" name="nb1" id="nb1" disabled value="<?php echo formatuang($bayar[1]);?>">
                                    <input type="text" name="nb" id="nb"  value="<?php echo $bayar[1];?>" hidden>
                                </div>
                            </div>
                            
                            <div class="form-group row col-spacing-row">
                                <label class="col-sm-6 control-label">Ditanggung Asuransi</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control text-right" name="as1"  disabled id="as1" value="<?php echo formatuang($bayar[2]);?>">
                                    <input type="text" name="as" id="as" value="<?php echo $bayar[2];?>" hidden>
                                </div>
                            </div>
                            <div class="form-group row col-spacing-row">
		                        <label class="col-sm-6 control-label">Komponen Berlaku Umum</label>
		                        <div class="col-sm-3">
			                        <input type="text" class="form-control text-right"  disabled name="pb1" id="pb1" value="<?php echo formatuang($bayar[0]);?>">
                                    <input type="text" name="pb" id="pb" value="<?php echo $bayar[0];?>" hidden>
		                        </div>
	                        </div>
                            <div class="form-group row col-spacing-row">
                                <label class="col-sm-6 control-label">Selisih Naik Kelas</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control text-right" disabled name="sb1" id="sb1" value="<?php echo formatuang($bayar[3]);?>">
                                    <input type="text" name="sb" id="sb" value="<?php echo $bayar[3];?>" hidden>
                                </div>
                            </div>	      
                            <div class="form-group row col-spacing-row">
                                <label class="col-sm-6 control-label">Sudah Terbayar</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control text-right"  disabled name="st1" id="st1" value="<?php echo formatuang($bayar[6]);?>">
                                    <input type="text" name="st" id="st" value="<?php echo $bayar[6];?>" hidden>
                                </div>
                            </div>	                  
                            <?php
                                $jumlahharusdibayarkan= $bayar[0]+$bayar[3]-$bayar[6];
                            ?>
                            <div class="form-group row col-spacing-row">
                                <label class="col-sm-6 control-label">Jumlah Harus Dibayar</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control text-right" disabled name="jhd1" id="jhd1" value="<?php echo formatuang($jumlahharusdibayarkan);?>">
                                    <input type="text" name="jhd" id="jhd" value="$jumlahharusdibayarkan" hidden>
		                        </div>
	                        </div>

	                        <div class="form-group row col-spacing-row">
		                        <label class="col-sm-6 control-label">Pembayaran</label>
		                        <div class="col-sm-3">
			                        <input type="text" class="form-control text-right" name="sbs" id="sbs"  onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" autocomplete="off" value="<?php echo formatuang($jumlahharusdibayarkan);?>">
		                        </div>
	                        </div>
                            
                        </div>
                    </div>
				</div>
                
				<div class="modal-footer">
					<div class="row">
						<div class="col-sm-12">
                            <?php if ($bayar[4]) {?>
                                
                            <?php } ?>
                            <!-- <button type="button" onclick="callkwitansi();" class="btn btn-primary btn-flat" style= "float: left;">Kwitansi</button> -->
                            <button type="button" onclick="aksibayarpelayanan();" class="btn btn-primary btn-flat">Bayar</button>
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
        $.ajax({
            url: "<?php echo site_url();?>/billing/prosesbillingposting",
            type: "GET",
            data : {
                rm: rm,
                st: st,
                trx: trx
            },
            success: function (ajaxData){
                console.log(ajaxData);
                var t = JSON.parse(ajaxData);
                suksesalert();
                document.getElementById("sb").value = t.hasil[0]
                document.getElementById("nb").value = t.hasil[1]
                document.getElementById("as").value = t.hasil[2]
               
            }
        });
    }

    function hitungsisah() {
	    var sb = document.getElementById("sb").value;
        var pb = document.getElementById("pb").value;
        var st = document.getElementById("st").value;
        var hs = parseInt(sb) + parseInt(pb) - parseInt(st) ;
        document.getElementById("jhd1").value = hs;
        document.getElementById("jhd").value = hs;
    }

    function hitungbayarselanjutnya() {
	    var jhd = document.getElementById("jhd").value;
        var sbs = document.getElementById("sbs").value;
        var hs = parseInt(jhd) - parseInt(sbs);
        document.getElementById("sisa").value = hs;
    }

    function aksibayarpelayanan() {
        modalload();
        var shift = $("#shif").val();
        var shifttext = $("#shif option:selected").text();
        var trx = document.getElementById("trx").value;
        var rm = document.getElementById("rm").value;
        var ps = $("input[name='ps']:checked").val();
        var nb = document.getElementById("nb").value;
        var as = document.getElementById("as").value;
        var pb = document.getElementById("pb").value;
        var sb = document.getElementById("sb").value;
        var st = document.getElementById("st").value;
        var sbs = document.getElementById("sbs").value;
        var jhd = document.getElementById("jhd").value;
        var cat = document.getElementById("cat").value;
        var sisa = 0;

        $.ajax({
            url: "<?php echo site_url();?>/billing/aksibayarpelyanan",
            type: "GET",
            data : {
                rm: rm,
                shift: shift,
                shifttext: shifttext,
                trx: trx,
                ps: ps,
                nb: nb,
                as: as,
                pb: pb,
                sbs: sbs,
                cat: cat,
                sisa: sisa,
                sb: sb,
                st: st,
                jhd : jhd
            },
            success: function (ajaxData){
                var t = JSON.parse(ajaxData);
                if (t.stat == true) {
                    // $("#baristerbilling tbody tr").remove();
                    // $("#baristerbilling tbody").append(t.dtview);
                    // document.getElementById("total").innerHTML = t.total;
                    load_data(1);
                    suksesalert();
                    modalloadtutup();
                } else {
                    gagalalert();
                    modalloadtutup();
                }
            },
            error: function (ajaxData) {
                hapusload();
            }
        });
    }

	$(document).ready(function () {

	});

    function callkwitansi() {
        var trx = document.getElementById("trx").value;
        var rm = document.getElementById("rm").value;
        window.open("<?php echo site_url();?>/billing/cetakbayarkwitansi/"+trx+"/"+rm+"", '_blank');
    }
	
    

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

