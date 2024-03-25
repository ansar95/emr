<?php
if ($formpilih == 0) {
    ?>
    <div class="modal-dialog modal-lg">
        <div class="modal-content" >
            
                <div class="card card-default card-solid" id="kotakform">
                    <div class="modal-header">
                        
                        <h5 class="modal-title">Tambah Detail Obat</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                            <div class="col-sm-12">
                                <div class="form-group row col-spacing-row">
                                    <label class="col-sm-3 control-label">Kode</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="kode" id="kode" disabled>
                                    </div>
                                </div>
                                <div class="form-group row col-spacing-row">
                                    <label class="col-sm-3 control-label">Nama Obat/BHP*</label>
                                    <div class="col-sm-7">
                                        <select class="form-control" style="width: 100%;" name="barang" id="barang" onchange="cariobat()">
	                                        <option value="-">-- Pilih --</option>
                                            <?php
                                            foreach($dtobat as $row) {
                                                ?>
                                                <option value="<?php echo $row->kodeobat . "_" . $row->id; ?>"><?php echo $row->namaobat.' | '.$row->satuanpakai.' | Rp. '.formatuang_dec($row->hargastok); ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row col-spacing-row">
                                    <label class="col-sm-3 control-label">Satuan*</label>
                                    <div class="col-sm-7">
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
                                    <label class="col-sm-3 control-label">Qty (kemasan)*</label>
                                    <div class="col-sm-3">
                                        <!-- <input type="number" class="form-control" name="qty" id="qty" value="0"> -->
			                            <input type="text" class="form-control text-right" name="qty" id="qty" onkeyup="javascript:hitungjumlah();" autocomplete="off">

                                    </div>
                                </div>
                                <div class="form-group row col-spacing-row">
                                    <label class="col-sm-3 control-label">Harga (per Kemasan)*</label>
                                    <div class="col-sm-3">
                                        <!-- <input type="number" class="form-control" name="hrg" id="hrg" value="0" /> -->
			                            <input type="text" class="form-control text-right" name="hrg" id="hrg"  onkeyup="javascript:hitungjumlah();" autocomplete="off">

                                    </div>
                                </div>
                                <div class="form-group row col-spacing-row">
                                    <label class="col-sm-3 control-label">% Diskon</label>
                                    <div class="col-sm-3">
                                        <!-- <input type="number" class="form-control" name="disc" id="disc" value="0"> -->
			                            <input type="text" class="form-control text-right" name="disc" id="disc"  onkeyup="javascript:hitungjumlah();" value="0" autocomplete="off">

                                    </div>
                                </div>
                                <div class="form-group row col-spacing-row">
                                    <label class="col-sm-3 control-label">Pot. Langsung (Rp)</label>
                                    <div class="col-sm-3">
                                        <!-- <input type="number" class="form-control" name="pot" id="pot" value="0"> -->
			                            <input type="text" class="form-control text-right" name="pot" id="pot"  onkeyup="javascript:hitungjumlah();" value="0" autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group row col-spacing-row">
                                    <label class="col-sm-3 control-label">Jumlah Harga</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control text-right" name="jum" id="jum" disabled>
                                    </div>
                                    <!-- <div class="col-sm-3">
                                        <button type="button" class="btn-sm btn-default" onclick="hitungjumlah()">Proses</button>
                                    </div> -->
                                </div>
                                <div class="form-group row col-spacing-row">
                                    <label class="col-sm-3 control-label">Isi Dalam Kemasan*</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control text-right" name="isi" id="isi" value="1">
                                    </div>

                                    <label class="col-sm-2 control-label text-right">Harga</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control pull-left" name="hargau" id="hargau" disabled>
                                    </div>

                                    <div class="custom-control custom-checkbox custom-control-inline col-sm-2">
										<input type="checkbox"  class="custom-control-input" name="upharga" id="upharga" >
										<label class="custom-control-label checkbox-primary" for="upharga">Update</label>                                       
									</div>

                                    <!-- <div class="col-sm-2">
                                        <input type="checkbox" name="upharga" id="upharga">&nbsp; Update
                                    </div> -->
                                </div>
                                <div class="form-group row col-spacing-row">
                                    <label class="col-sm-3 control-label">Expire Date*</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="exp" id="exp" >
                                    </div>
                                </div>
                                <div class="form-group row col-spacing-row">
                                    <label class="col-sm-3 control-label">Batch No.*</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="batch" id="batch" onkeyup="this.value = this.value.toUpperCase();" />
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
                url: "<?php echo site_url();?>/faktur/obatcari",
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
                
                // let num = 34.567;
                // console.log(num.toFixed(5)); // 34.56700

            } else {    
                if (disc == "0") {
                    var h = (parseFloat(qty) * parseFloat(hrg)) - parseFloat(pot);
                    $("#jum").val(h);
                } else {
                    var h = parseFloat(qty) * parseFloat(hrg);
                    var d = (h * parseFloat(disc)) / 100;
                    var hs = (h - d) - parseFloat(pot);

                    $("#jum").val(hs.toFixed(2));
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
                var pendanaan = $("#pendanaan").val();
                var status1 = $("#status").val();
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
                var isi = document.getElementById("isi").value;
                var exp = document.getElementById("exp").value;
                var batch = document.getElementById("batch").value;
                var bhp = 0;

                if ((sat == "-") || (qty == "") || (hrg == "") || (isi == "") || (exp == "") || (batch == "")) {
                    kuranglengkap();
                    modalformtutup();
                    return;
                }

                $.ajax({
                    url: "<?php echo site_url();?>/faktur/simpanfaktur",
                    type: "GET",
                    data : {
                        sj: sj,
                        no: no,
                        status : status,
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
                        isi: isi,
                        exp: exp,
                        batch: batch,
                        jum: jum,
                        bhp : bhp,
                        pendanaan : pendanaan,
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
    </script>
    <?php
} else if ($formpilih == 1) { ?>
    <div class="modal-dialog modal-lg">
        <div class="modal-content" >
                <div class="card card-default card-solid" id="kotakform">
                    <div class="modal-header">
                        
                        <h5 class="modal-title">Edit Detail Obat</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                            <div class="col-sm-12">
                                <div class="form-group row col-spacing-row">
                                    <label class="col-sm-3 control-label">Kode</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="kode" id="kode" value="<?php echo $dtdetailfaktur->kodebarang;?>" disabled>
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="iddetail" id="iddetail" value="<?php echo $dtdetailfaktur->id;?>">
                                    </div>
                                </div>
                                <div class="form-group row col-spacing-row">
                                    <label class="col-sm-3 control-label">Nama Obat/BHP*</label>
                                    <div class="col-sm-7">
                                        <select class="form-control" style="width: 100%;" name="barang" id="barang" onchange="cariobat()">
	                                        <option value="-">-- Pilih --</option>
                                            <?php
                                            foreach($dtobat as $row) {
                                                ?>
                                                <option value="<?php echo $row->kodeobat . "_" . $row->id; ?>" <?php echo ($row->kodeobat != $dtdetailfaktur->kodebarang ? "" : "selected");?>><?php echo $row->namaobat.' | '.$row->satuanpakai.' | Rp. '.formatuang_dec($row->hargastok); ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row col-spacing-row">
                                    <label class="col-sm-3 control-label">Satuan*</label>
                                    <div class="col-sm-7">
                                        <select class="form-control" style="width: 100%;" name="sat" id="sat">
	                                        <option value="-">-- Pilih --</option>
                                            <?php
                                            foreach($dtsatuan as $row) {
                                                ?>
                                                <option value="<?php echo $row->satuanobat;?>" <?php echo ($row->satuanobat != $dtdetailfaktur->satuan ? "" : "selected");?> ><?php echo $row->satuanobat; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row col-spacing-row">
                                    <label class="col-sm-3 control-label">Qty (kemasan)*</label>
                                    <div class="col-sm-3">
                                        <!-- <input type="number" class="form-control" name="qty" id="qty" value="0"> -->
			                            <input type="text" class="form-control text-right" name="qty" id="qty" value="<?php echo $dtdetailfaktur->qty;?>" onkeyup="javascript:hitungjumlah();" autocomplete="off">

                                    </div>
                                </div>
                                <div class="form-group row col-spacing-row">
                                    <label class="col-sm-3 control-label">Harga (per Kemasan)*</label>
                                    <div class="col-sm-3">
                                        <!-- <input type="number" class="form-control" name="hrg" id="hrg" value="0" /> -->
			                            <input type="text" class="form-control text-right" name="hrg" id="hrg"  value="<?php echo $dtdetailfaktur->harga;?>" onkeyup="javascript:hitungjumlah();" autocomplete="off">

                                    </div>
                                </div>
                                <div class="form-group row col-spacing-row">
                                    <label class="col-sm-3 control-label">% Diskon</label>
                                    <div class="col-sm-3">
                                        <!-- <input type="number" class="form-control" name="disc" id="disc" value="0"> -->
			                            <input type="text" class="form-control text-right" name="disc" id="disc"  value="<?php echo $dtdetailfaktur->diskon;?>" onkeyup="javascript:hitungjumlah();" value="0" autocomplete="off">

                                    </div>
                                </div>
                                <div class="form-group row col-spacing-row">
                                    <label class="col-sm-3 control-label">Pot. Langsung (Rp)</label>
                                    <div class="col-sm-3">
                                        <!-- <input type="number" class="form-control" name="pot" id="pot" value="0"> -->
			                            <input type="text" class="form-control text-right" name="pot" id="pot"  value="<?php echo $dtdetailfaktur->potlangsung;?>" onkeyup="javascript:hitungjumlah();" value="0" autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group row col-spacing-row">
                                    <label class="col-sm-3 control-label">Jumlah Harga</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control text-right" name="jum" id="jum" value="<?php echo $dtdetailfaktur->bayar;?>" disabled>
                                    </div>
                                    <!-- <div class="col-sm-3">
                                        <button type="button" class="btn-sm btn-default" onclick="hitungjumlah()">Proses</button>
                                    </div> -->
                                </div>
                                <div class="form-group row col-spacing-row">
                                    <label class="col-sm-3 control-label">Isi Dalam Kemasan*</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control text-right" name="isi" id="isi" value="<?php echo $dtdetailfaktur->isisatuan;?>">
                                    </div>

                                    <label class="col-sm-2 control-label text-right">Harga</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control pull-left" name="hargau" id="hargau" disabled>
                                    </div>

                                    <div class="custom-control custom-checkbox custom-control-inline col-sm-2">
										<input type="checkbox"  class="custom-control-input" name="upharga" id="upharga" >
										<label class="custom-control-label checkbox-primary" for="upharga">Update</label>                                       
									</div>

                                    <!-- <div class="col-sm-2">
                                        <input type="checkbox" name="upharga" id="upharga">&nbsp; Update
                                    </div> -->
                                </div>
                                <div class="form-group row col-spacing-row">
                                    <label class="col-sm-3 control-label">Expire Date*</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="exp" id="exp" value="<?php echo $dtdetailfaktur->expire;?>">
                                    </div>
                                </div>
                                <div class="form-group row col-spacing-row">
                                    <label class="col-sm-3 control-label">Batch No.*</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="batch" id="batch" value="<?php echo $dtdetailfaktur->batch;?>" onkeyup="this.value = this.value.toUpperCase();" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button id="update" class="btn btn-success">Update</button>
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
                url: "<?php echo site_url();?>/faktur/obatcari",
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
                
                // let num = 34.567;
                // console.log(num.toFixed(5)); // 34.56700

            } else {    
                if (disc == "0") {
                    var h = (parseFloat(qty) * parseFloat(hrg)) - parseFloat(pot);
                    $("#jum").val(h);
                } else {
                    var h = parseFloat(qty) * parseFloat(hrg);
                    var d = (h * parseFloat(disc)) / 100;
                    var hs = (h - d) - parseFloat(pot);

                    $("#jum").val(hs.toFixed(2));
                }
            }
        }

        $(document).ready(function () {
            $('#barang').select2();
            $('#sat').select2();
            $('#exp').datepicker({ autoclose: true }).datepicker("setDate", "0");

            $("#update").click(function(e) {
                modalform();
                var sj = $("#sj").val();
                var no = $("#no").val();
                var tgl = $("#tgl").val();
                var terima = $("#terima").val();
                var vendor = $("#vendor").val();
                var vendortext = $("#vendor option:selected" ).text();
                // var ppn = $('#ppn').is(":checked");
                var ppn = $("#ppn").val();
                var pendanaan = $("#pendanaan").val();

                var iddetail = document.getElementById("iddetail").value;
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
                var isi = document.getElementById("isi").value;
                var exp = document.getElementById("exp").value;
                var batch = document.getElementById("batch").value;
                var bhp = 0;

                if ((sat == "-") || (qty == "") || (hrg == "") || (isi == "") || (exp == "") || (batch == "")) {
                    kuranglengkap();
                    modalformtutup();
                    return;
                }

                $.ajax({
                    // url: "<?php echo site_url();?>/faktur/simpanfaktur",
                    url: "<?php echo site_url();?>/faktur/simpateditdatafaktur",
                    type: "GET",
                    data : {
                        sj: sj,
                        no: no,
                        tgl: tgl,
                        terima: terima,
                        vendor: vendor,
                        vendortext: vendortext,
                        ppn: ppn,
                        iddetail : iddetail,
                        kode: kode,
                        barang: barang,
                        barangtext: barangtext,
                        sat: sat,
                        qty: qty,
                        hrg: hrg,
                        disc: disc,
                        pot: pot,
                        isi: isi,
                        exp: exp,
                        batch: batch,
                        jum: jum,
                        bhp : bhp,
                        pendanaan : pendanaan,
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
    </script>
<?php
}
?>
