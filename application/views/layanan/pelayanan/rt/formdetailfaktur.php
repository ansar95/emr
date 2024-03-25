<?php
if ($formpilih == 0) {
    ?>
    <div class="modal-dialog" >
        <div class="modal-content" >
            <div class="form-horizontal">
                <div class="box box-default box-solid" id="kotakform">
                    <div class="modal-header">
                        <h6 class="modal-title">Tambah Faktur</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        
                    </div>
                    <div class="modal-body">
                        <div class="box-body">
                            <div class="col-sm-12">
                                <div class="form-group row col-spacing-row">
                                    <label class="col-sm-4 control-label">Kode</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="kode" id="kode" disabled>
                                    </div>
                                </div>

                                <div class="form-group row col-spacing-row">
                                    <label class="col-sm-4 control-label">Nama Obat/BHP*</label>

                                    <div class="col-sm-8">
                                        <select class="form-control" style="width: 100%;" name="barang" id="barang" onchange="cariobat()">
	                                        <option value="-">-- Pilih --</option>
                                            <?php
                                            foreach($dtobat as $row) {
                                                ?>
                                                <option value="<?php echo $row->kodeobat . "_" . $row->id; ?>"><?php echo $row->namaobat.' | '.$row->satuanpakai.' | Rp. '.formatuang($row->hargastok); ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row col-spacing-row">
                                    <label class="col-sm-4 control-label">Satuan*</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" style="width: 100%;" name="sat" id="sat">
	                                        <option value="-">-- Pilih --</option>
                                            <?php
                                            foreach($dtsatuan as $row) {
                                                ?>
                                                <option value="<?php echo $row->satuanobat; ?>"><?php echo $row->satuanobat; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row col-spacing-row">
                                    <label class="col-sm-4 control-label">Qty*</label>
                                    <div class="col-sm-3">
			                            <input type="text" class="form-control text-right" name="qty" id="qty" onkeyup="javascript:hitungjumlah();" autocomplete="off">
                                    </div>
                                </div>

                                <div class="form-group row col-spacing-row">
                                    <label class="col-sm-4 control-label">Harga*</label>
                                    <div class="col-sm-3">
			                            <input type="text" class="form-control text-right" name="hrg" id="hrg"  onkeyup="javascript:hitungjumlah();" autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group row col-spacing-row">
                                    <label class="col-sm-4 control-label">% Diskon</label>
                                    <div class="col-sm-3">
                                        <!-- <input type="number" class="form-control" name="disc" id="disc" value="0"> -->
			                            <input type="text" class="form-control text-right" name="disc" id="disc"  onkeyup="javascript:hitungjumlah();" value="0" autocomplete="off">

                                    </div>
                                </div>
                                <div class="form-group row col-spacing-row">
                                    <label class="col-sm-4 control-label">Pot. Langsung (Rp)</label>
                                    <div class="col-sm-3">
                                        <!-- <input type="number" class="form-control" name="pot" id="pot" value="0" onkeyup="hitungjumlah()"> -->
			                            <input type="text" class="form-control text-right" name="pot" id="pot"  onkeyup="javascript:hitungjumlah();" value="0" autocomplete="off">

                                    </div>
                                </div>
                                <div class="form-group row col-spacing-row">
                                    <label class="col-sm-4 control-label">Jumlah Harga</label>
                                    <div class="col-sm-3">
			                            <input type="text" class="form-control text-right" name="jum" id="jum"  disabled>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button id="simpan" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>

        function modalform() {
            $("#kotakform").append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
        }

        function modalformtutup() {
            $(".overlay").remove();
        }

        function cariobat() {
            var produk = $("#barang").val();
            $.ajax({
                url: "<?php echo site_url();?>/rumahtangga/obatcari",
                type: "GET",
                data : {produk: produk},
                success: function (ajaxData) {
                    var pr = JSON.parse(ajaxData);
                    // $("#sat").val(pr.dtapotik.satuanpakai);
                    // $("#hrg").val(pr.dtapotik.hargapakai);
                    $("#kode").val(pr.dtapotik.kodeobat);
                }
            });
        }

        function hitungjumlah() {
            var qty = $("#qty").val();
            var hrg = $("#hrg").val();
            var disc = $("#disc").val();
            var pot = $("#pot").val();
            if (qty == "0" || hrg==0) {
                var hs=0;
                $("#jum").val(hs);
            } else {    
                if (disc == "0") {
                    var h = (parseFloat(qty) * parseFloat(hrg)) - parseFloat(pot);
                    $("#jum").val(h);
                } else {
                    var h = parseFloat(qty) * parseFloat(hrg);
                    var d = (h * parseFloat(disc)) / 100;
                    var hs = (h - d) - parseFloat(pot);
                    $("#jum").val(hs);
                }
            }
        }

        $(document).ready(function () {
            $('#barang').select2();
            $('#sat').select2();
            $('#exp').datepicker({ autoclose: true }).datepicker("setDate", "0");

            $("#simpan").click(function(e) {
                modalform();
                var sj = $("#sj").val();
                var no = $("#no").val();
                var tgl = $("#tgl").val();
                var terima = $("#terima").val();
                var vendor = $("#vendor").val();
                var vendortext = $("#vendor option:selected" ).text();
                // var ppn = $('#ppn').is(":checked");
                var ppn = $("#ppn").val();

                var kode = document.getElementById("kode").value;
                var barang = $("#barang").val();

                var namabarang = $("#barang option:selected").text();
                var barangtextsplit = namabarang.split(' | ');
                var barangtext = barangtextsplit[0];

                var sat = $("#sat").val();
                var qty = document.getElementById("qty").value;
                var hrg = document.getElementById("hrg").value;
                var disc = document.getElementById("disc").value;
                var pot = document.getElementById("pot").value;
                var jum = document.getElementById("jum").value;


                if ((sat == "-") || (qty == "") || (hrg == "")) {
                    kuranglengkap();
                    modalformtutup();
                    return;
                }

                $.ajax({
                    url: "<?php echo site_url();?>/rumahtangga/simpanfaktur",
                    type: "GET",
                    data : {
                        sj: sj,
                        no: no,
                        tgl: tgl,
                        terima: terima,
                        vendor: vendor,
                        vendortext: vendortext,
                        ppn: ppn,
                        kode: kode,
                        barang: barang,
                        barangtext: barangtext,
                        sat: sat,
                        qty: qty,
                        hrg: hrg,
                        disc: disc,
                        pot: pot,
                        jum: jum,
	                    arrtanda: JSON.stringify(arrTanda)
                    },
                    success: function (ajaxData){
                        var dt = JSON.parse(ajaxData);
                        console.log(dt);
                        if (dt.stat.sukses == true) {
                            $("#tabledetailfaktur").html(dt.dtview);
                            modalformtutup();
                            tutupmodal();
                        } else {
                            modalformtutup();
                            gagalalert();
                        }
                    },
                    error: function (ajaxData) {
                        modalformtutup();
                        gagalalert();
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
    <?php
} else if ($formpilih == 1) {
    ?>
    <?php
}
?>
