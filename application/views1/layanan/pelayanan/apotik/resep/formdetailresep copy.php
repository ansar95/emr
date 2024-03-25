<?php
if ($formpilih == 0) {
    ?>
    <div class="modal-dialog" >
        <div class="modal-content" >
            <div class="form-horizontal">
                <div class="box box-default box-solid" id="kotakform">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">Pilih Item Obat</h4>
                    </div>
                    <div class="modal-body">
                        <div class="box-body">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Nama Obat</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" style="width: 100%;" name="produk" id="produk" onchange="cariobat()">
                                            <?php
                                            foreach($dtobat as $row) {
                                                ?>
                                                <option value="<?php echo $row->kodeobat . "_" . $row->id; ?>"><?php echo $row->namaobat; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Satuan Pakai</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="satpakai" id="satpakai"  disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Qty (Pakai)</label>
                                    <div class="col-sm-3">
                                        <input type="number" class="form-control" name="qtypakai" id="qtypakai" value="0" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Harga Jual</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="harga" id="harga" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Tuslag</label>
                                    <div class="col-sm-3">
                                        <input type="number" class="form-control" name="tuslag" id="tuslag" value="0" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Dosis</label>
                                    <div class="col-sm-9">
	                                    <select class="form-control" style="width: 100%;" name="dosis" id="dosis">
                                            <?php
                                            foreach($dtdosis as $row) {
                                                ?>
			                                    <option value="<?php echo $row->dosis; ?>"><?php echo $row->dosis; ?></option>
                                                <?php
                                            }
                                            ?>
	                                    </select>
<!--                                        <input type="text" class="form-control" name="dosis" id="dosis" >-->
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label"></label>
                                    <div class="col-sm-3">
                                        <input type="checkbox"  name="noina" id="noina" > &nbsp; Non INACBG
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a id="simpanunit" class="btn btn-primary">Simpan</a>
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
            var produk = $("#produk").val();
            $.ajax({
                url: "<?php echo site_url();?>/depoapotik/obatcari",
                type: "GET",
                data : {produk: produk},
                success: function (ajaxData) {
                    var pr = JSON.parse(ajaxData);
                    $("#satpakai").val(pr.dtapotik.satuanpakai);
                    $("#harga").val(pr.dtapotik.hargapakai);
                }
            });
        }

        $(document).ready(function () {
            $('#produk').select2();

            $("#simpanunit").click(function(e) {
                modalform();
                var tipe = $("input[name='tipe']:checked").val();
                var shift = document.getElementById("shift").value;
                var norep = document.getElementById("norep").value;
                var norm = $("#norm").val();
                var nama = $("#nama").val();
                var kartu = $("#kartu").val();
                var gol = $("#gol").val();
                var goltext = $("#gol option:selected" ).text();
                var tglresep = $("#tglresep").val();
                var unit = $("#unit").val();
                var unittext = $("#unit option:selected" ).text();
                var sjp = $("#sjp").val();
                var dokter = $("#dokter").val();
                var doktertext = $("#dokter option:selected" ).text();
                var racik = $("#racik").val();
                var nonracik = $("#nonracik").val();
                var produk = $("#produk").val();
                var produktext = $("#produk option:selected").text();
                var satpakai = document.getElementById("satpakai").value;
                var qtypakai = document.getElementById("qtypakai").value;
                var harga = document.getElementById("harga").value;
                var tuslag = document.getElementById("tuslag").value;
                var dosis = $("#dosis").val();
                var dosistext = $("#dosis option:selected").text();
                var noina = $('#noina').is(":checked");
                var depo = document.getElementById("depo").value;
                var depotext = document.getElementById("depotext").value;
                if ((produk == "") || (satpakai == "") || (qtypakai == "") || (harga == "") || (dosis == "")) {
                    kuranglengkap();
                    modalformtutup();
                    return;
                }
                $.ajax({
                    url: "<?php echo site_url();?>/depoapotik/simpandepo",
                    type: "GET",
                    data: {
                        tipe: tipe,
                        shift: shift,
                        norep: norep,
                        norm: norm,
                        nama: nama,
                        kartu: kartu,
                        gol: gol,
                        goltext: goltext,
                        tglresep: tglresep,
                        unit: unit,
                        unittext: unittext,
                        sjp: sjp,
                        dokter: dokter,
                        doktertext: doktertext,
                        racik: racik,
                        nonracik: nonracik,
                        produk: produk,
                        produktext: produktext,
                        satpakai: satpakai,
                        qtypakai: qtypakai,
                        harga: harga,
                        tuslag: tuslag,
                        noina: noina,
                        dosis: dosis,
                        dosistext: dosistext,
                        depo: depo,
                        depotext: depotext
                    },
                    success: function (ajaxData){
                        var dt = JSON.parse(ajaxData);
                        console.log(dt);
                        if (dt.stat.sukses == true) {
                            $("#tabledetailresep").html(dt.dtview);
                            $("#norep").val(dt.stat.noresep);
                            suksesalert(0);
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
} else if ($formpilih == 1) {
    ?>
    <div class="modal-dialog" >
        <div class="modal-content" >
            <div class="form-horizontal">
                <div class="box box-default box-solid" id="kotakform">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">Edit Item Obat</h4>
                    </div>
                    <div class="modal-body">
                        <div class="box-body">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Nama Obat</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" style="width: 100%;" name="produk" id="produk" onchange="cariobat()">
                                            <?php
                                            foreach($dtobat as $row) {
                                                ?>
                                                <option value="<?php echo $row->kodeobat . "_" . $row->id; ?>" <?php if ($row->id == $dtedit->idobat) echo "selected";?>><?php echo $row->namaobat; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Satuan Pakai</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="satpakai" id="satpakai" value="<?php echo $dtedit->satuanpakai?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Qty (Pakai)</label>
                                    <div class="col-sm-3">
                                        <input type="number" class="form-control" name="qtypakai" id="qtypakai" value="<?php if ($dtedit->qty == '') { echo '0'; } else { echo $dtedit->qty; }?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Harga Jual</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="harga" id="harga" value="<?php echo $dtedit->hargapakai;?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Tuslag</label>
                                    <div class="col-sm-3">
                                        <input type="number" class="form-control" name="tuslag" id="tuslag" value="<?php if ($dtedit->tuslag == '') { echo '0'; } else { echo $dtedit->tuslag; }?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Dosis</label>
                                    <div class="col-sm-9">
	                                    <select class="form-control" style="width: 100%;" name="dosis" id="dosis">
                                            <?php
                                            foreach($dtdosis as $row) {
                                                ?>
			                                    <option value="<?php echo $row->dosis; ?>" <?php if ($row->dosis == $dtedit->dosis) echo "selected";?>><?php echo $row->dosis; ?></option>
                                                <?php
                                            }
                                            ?>
	                                    </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label"></label>
                                    <div class="col-sm-3">
                                        <input type="checkbox"  name="noina" id="noina" <?php if ($dtedit->noninacbg == "1") { echo "checked";}?>> &nbsp; Non INACBG
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a onclick="ubah(<?php echo $dtedit->idnoresep;?>)" class="btn btn-primary">Ubah</a>
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
            var produk = $("#produk").val();
            $.ajax({
                url: "<?php echo site_url();?>/depoapotik/obatcari",
                type: "GET",
                data : {produk: produk},
                success: function (ajaxData) {
                    var pr = JSON.parse(ajaxData);
                    $("#satpakai").val(pr.dtapotik.satuanpakai);
                    $("#harga").val(pr.dtapotik.hargapakai);
                }
            });
        }

        $(document).ready(function () {
            $('#produk').select2();
        });

        function ubah(id) {
            modalform();
            var norep = document.getElementById("norep").value;
            var produk = $("#produk").val();
            var produktext = $("#produk option:selected").text();
            var satpakai = document.getElementById("satpakai").value;
            var qtypakai = document.getElementById("qtypakai").value;
            var harga = document.getElementById("harga").value;
            var tuslag = document.getElementById("tuslag").value;
            var dosis = $("#dosis").val();
            var dosistext = $("#dosis option:selected").text();
            var noina = $('#noina').is(":checked");
            if ((produk == "") || (satpakai == "") || (qtypakai == "") || (harga == "") || (dosis == "")) {
                kuranglengkap();
                modalformtutup();
                return;
            }
            $.ajax({
                url: "<?php echo site_url();?>/depoapotik/editdepo",
                type: "GET",
                data: {
                    id: id,
                    norep: norep,
                    produk: produk,
                    produktext: produktext,
                    satpakai: satpakai,
                    qtypakai: qtypakai,
                    harga: harga,
                    tuslag: tuslag,
                    noina: noina,
                    dosis: dosis,
	                dosistext: dosistext
                },
                success: function (ajaxData){
                    var dt = JSON.parse(ajaxData);
                    console.log(dt);
                    if (dt.stat.sukses == true) {
                        $("#tabledetailresep").html(dt.dtview);
                        modalformtutup();
                        suksesalert(1);
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
        }
    </script>
    <?php
}
?>
