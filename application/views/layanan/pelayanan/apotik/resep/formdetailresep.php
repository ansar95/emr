<?php
if ($formpilih == 0) {
?>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- <div class="box box-default box-solid" id="proseskotak"> -->
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pilih Item Obat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="username" class="col-sm-3 col-form-label">Item</label>
                    <div class="col-sm-9">
                        <select class="form-control" style="width: 100%;" name="produk" id="produk" onchange="cariobat()">
                            <option value=""><?php echo "--- pilih obat ---"; ?></option>
                            <?php
                            foreach ($dtobat as $row) {
                            ?>
                                <option value="<?php echo $row->kodeobat . "_" . $row->id; ?>"><?php echo $row->namaobat; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="username" class="col-sm-3 col-form-label">Satuan Jual</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="satpakai" id="satpakai" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="username" class="col-sm-3 col-form-label">Qty (Pakai)</label>
                    <div class="col-sm-3">
                        <input type="number" class="form-control" name="qtypakai" id="qtypakai">
                    </div>
                    <div class="col-sm-5">
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" class="custom-control-input" name="noina" id="noina">
                            <label class="custom-control-label" for="noina">Obat 23 Hari</label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="username" class="col-sm-3 col-form-label">Harga Jual</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="harga" id="harga" autocomplete="off">
                    </div>
                </div>
                <!-- <div class="form-group row">
                    <label for="username" class="col-sm-3 col-form-label">Pendanaan</label>
                    <div class="col-sm-9">
                        <select class="form-control" style="width: 100%;" name="pendanaan" id="pendanaan">
                            <?php
                            foreach ($dtpendanaan as $row) {
                            ?>
                                <option value="<?php echo $row->pendanaan; ?>"><?php echo $row->pendanaan; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div> -->
                <div class="form-group row">
                    <label for="username" class="col-sm-3 col-form-label">Dosis - Pagi</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="pagi" id="pagi" maxlength="15">

                    </div>
                </div>
                <div class="form-group row">
                    <label for="username" class="col-sm-3 col-form-label">Siang</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="siang" id="siang" maxlength="15">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="username" class="col-sm-3 col-form-label">Malam</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="malam" id="malam" maxlength="15">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="username" class="col-sm-3 col-form-label">Takaran</label>
                    <div class="col-sm-9">
                        <select class="form-control" style="width: 100%;" name="takaran" id="takaran">
                            <?php
                            foreach ($dttakaran as $row) {
                            ?>
                                <option value="<?php echo $row->takaran; ?>"><?php echo $row->takaran; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="username" class="col-sm-3 col-form-label">Cara</label>
                    <div class="col-sm-4">
                        <select class="form-control" style="width: 100%;" name="caramkn" id="caramkn">
                            <?php
                            foreach ($dtcaramkn as $row) {
                            ?>
                                <option value="<?php echo $row->caramakan; ?>"><?php echo $row->caramakan; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="ket" id="ket" maxlength="20">
                    </div>
                </div>
                <!-- <div class="form-group row">
                    <label for="username" class="col-sm-3 col-form-label"></label>
                    <div class="col-sm-9">
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" class="custom-control-input" name="noina" id="noina">
                            <label class="custom-control-label" for="noina">Obat 23 Hari</label>
                        </div>
                    </div>
                </div> -->
                <div class="modal-footer">
                    <button id="simpanunit" class="btn btn-primary">Simpan</button>
                </div>
                <!-- </div> -->
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
                url: "<?php echo site_url(); ?>/depoapotik/obatcari",
                type: "GET",
                data: {
                    produk: produk
                },
                success: function(ajaxData) {
                    var pr = JSON.parse(ajaxData);
                    $("#satpakai").val(pr.dtapotik.satuanpakai);
                    $("#harga").val(pr.dtapotik.hargapakai);
                }
            });
        }

        $(document).ready(function() {
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
                var goltext = $("#namagolongan").val();
                // var goltext = $("#gol option:selected").text();
                var tglresep = $("#tglresep").val();
                var unit = $("#unit").val();
                var unittext = $("#unit option:selected").text();
                var sjp = $("#sjp").val();
                var dokter = $("#dokter").val();
                var doktertext = $("#dokter option:selected").text();
                // var racik = $("#racik").val();
                // var nonracik = $("#nonracik").val();
                var racik = 0;
                var nonracik = 0;
                var produk = $("#produk").val();
                var produktext = $("#produk option:selected").text();
                var satpakai = document.getElementById("satpakai").value;
                var qtypakai = document.getElementById("qtypakai").value;
                var harga = document.getElementById("harga").value;
                // var tuslag = document.getElementById("tuslag").value;
                // var dosis = $("#dosis").val();
                // var dosistext = $("#dosis option:selected").text();
                
                // var noina = $('#noina').is(":checked"); diganti
                if($('#noina').is(":checked")){
                    var noina=1;
                } else {
                    var noina=0;
                }
                console.log(noina);
                var depo = document.getElementById("depo").value;
                var depotext = document.getElementById("depotext").value;
                var pagi = document.getElementById("pagi").value;
                var siang = document.getElementById("siang").value;
                var malam = document.getElementById("malam").value;
                var takaran = document.getElementById("takaran").value;
                var caramakan = document.getElementById("caramkn").value;
                // var pendanaan = document.getElementById("pendanaan").value;
                var pendanaan = '';
                var keterangan = document.getElementById("ket").value;

                if ((produk == "") || (satpakai == "") || (qtypakai == "") || (harga == "")) {
                    kuranglengkap();
                    modalformtutup();
                    return;
                }
                $.ajax({
                    url: "<?php echo site_url(); ?>/depoapotik/simpandepo",
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
                        // tuslag: tuslag,
                        noina: noina,
                        // dosis: dosis,
                        // dosistext: dosistext,
                        depo: depo,
                        depotext: depotext,
                        pagi: pagi,
                        siang: siang,
                        malam: malam,
                        takaran: takaran,
                        caramakan: caramakan,
                        pendanaan: pendanaan,
                        keterangan: keterangan
                    },
                    success: function(ajaxData) {
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
                    error: function(ajaxData) {
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
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- <div class="box box-default box-solid" id="proseskotak"> -->
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Item Obat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="username" class="col-sm-3 col-form-label">Nama Obat</label>
                    <div class="col-sm-9">
                        <select class="form-control" style="width: 100%;" name="produk" id="produk" onchange="cariobat()">
                            <?php
                            foreach ($dtobat as $row) {
                            ?>
                                <option value="<?php echo $row->kodeobat . "_" . $row->id; ?>" <?php if ($row->id == $dtedit->idobat) echo "selected"; ?>><?php echo $row->namaobat; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="username" class="col-sm-3 col-form-label">Satuan Jual</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="satpakai" id="satpakai" value="<?php echo $dtedit->satuanpakai ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="username" class="col-sm-3 col-form-label">Qty (Pakai)</label>
                    <div class="col-sm-3">
                        <input type="number" class="form-control" name="qtypakai" id="qtypakai" value="<?php if ($dtedit->qty == '') {
                                                                                                            echo '0';
                                                                                                        } else {
                                                                                                            echo $dtedit->qty;
                                                                                                        } ?>">
                    </div>
                    <div class="col-sm-5">
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" class="custom-control-input" name="noina" id="noina" <?php if ($dtedit->noninacbg == "1") {
                                                                                                            echo "checked";
                                                                                                        } ?>>
                            <label class="custom-control-label" for="noina">Obat 23 Hari</label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="username" class="col-sm-3 col-form-label">Harga Jual</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="harga" id="harga" value="<?php echo $dtedit->hargapakai; ?>">
                    </div>
                </div>
                <!-- <div class="form-group row">
                    <label for="username" class="col-sm-3 col-form-label">Pendanaan</label>
                    <div class="col-sm-9">
                        <select class="form-control" style="width: 100%;" name="pendanaan" id="pendanaan">
                            <?php
                            foreach ($dtpendanaan as $row) {
                            ?>
                                <option value="<?php echo $row->pendanaan; ?>" <?php if ($row->pendanaan == $dtedit->pendanaan) echo "selected"; ?>><?php echo $row->pendanaan; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div> -->
                <div class="form-group row">
                    <label for="username" class="col-sm-3 col-form-label">Dosis - Pagi</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="pagi" id="pagi" maxlength="15" value="<?php echo $dtedit->pagi; ?>">

                    </div>
                </div>
                <div class="form-group row">
                    <label for="username" class="col-sm-3 col-form-label">Siang</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="siang" id="siang" maxlength="15" value="<?php echo $dtedit->siang; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="username" class="col-sm-3 col-form-label">Malam</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="malam" id="malam" maxlength="15" value="<?php echo $dtedit->malam; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="username" class="col-sm-3 col-form-label">Takaran</label>
                    <div class="col-sm-9">
                        <select class="form-control" style="width: 100%;" name="takaran" id="takaran">
                            <?php
                            foreach ($dttakaran as $row) {
                            ?>
                                <option value="<?php echo $row->takaran; ?>" <?php if ($row->takaran == $dtedit->takaran) echo "selected"; ?>><?php echo $row->takaran; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="username" class="col-sm-3 col-form-label">Cara</label>
                    <div class="col-sm-4">
                        <select class="form-control" style="width: 100%;" name="caramkn" id="caramkn">
                            <?php
                            foreach ($dtcaramkn as $row) {
                            ?>
                                <option value="<?php echo $row->caramakan; ?>" <?php if ($row->caramakan == $dtedit->caramakan) echo "selected"; ?>><?php echo $row->caramakan; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="ket" id="ket" maxlength="20" value="<?php echo $dtedit->keterangan; ?>">
                    </div>
                </div>
                <!-- <div class="form-group row">
                    <label for="username" class="col-sm-3 col-form-label"></label>
                    <div class="col-sm-9">
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" class="custom-control-input" name="noina" id="noina" <?php if ($dtedit->noninacbg == "1") {
                                                                                                            echo "checked";
                                                                                                        } ?>>
                            <label class="custom-control-label" for="noina">Obat 23 Hari</label>
                        </div>
                    </div>
                </div> -->
                <div class="modal-footer">
                    <button onclick="ubah(<?php echo $dtedit->idnoresep; ?>)" class="btn btn-primary">ubah</button>
                </div>
                <!-- </div> -->
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
                url: "<?php echo site_url(); ?>/depoapotik/obatcari",
                type: "GET",
                data: {
                    produk: produk
                },
                success: function(ajaxData) {
                    var pr = JSON.parse(ajaxData);
                    $("#satpakai").val(pr.dtapotik.satuanpakai);
                    $("#harga").val(pr.dtapotik.hargapakai);
                }
            });
        }

        $(document).ready(function() {
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
            // var tuslag = document.getElementById("tuslag").value;
            // var dosis = $("#dosis").val();
            // var dosistext = $("#dosis option:selected").text();
            // var noina = $('#noina').is(":checked");
            if($('#noina').is(":checked")){
                    var noina=1;
                } else {
                    var noina=0;
                }
            var pagi = document.getElementById("pagi").value;
            var siang = document.getElementById("siang").value;
            var malam = document.getElementById("malam").value;
            var takaran = $("#takaran").val();
            var caramakan = $("#caramkn").val();
            var pendanaan = $("#pendanaan").val();
            var keterangan = document.getElementById("ket").value;

            console.log(takaran);
            console.log(caramakan);
            console.log(pagi);
            console.log(siang);
            console.log(malam);
            console.log(keterangan);
            console.log(norep);
            console.log(produk);
            console.log(produktext);
            console.log(satpakai);
            console.log(qtypakai);
            console.log(harga);
            console.log(noina);

            if ((produk == "") || (satpakai == "") || (qtypakai == "") || (harga == "")) {
                kuranglengkap();
                modalformtutup();
                return;
            }
            $.ajax({
                url: "<?php echo site_url(); ?>/depoapotik/editdepo",
                type: "GET",
                data: {
                    id: id,
                    norep: norep,
                    produk: produk,
                    produktext: produktext,
                    satpakai: satpakai,
                    qtypakai: qtypakai,
                    harga: harga,
                    noina: noina,
                    pagi: pagi,
                    siang: siang,
                    malam: malam,
                    takaran: takaran,
                    caramakan: caramakan,
                    pendanaan: pendanaan,
                    keterangan: keterangan
                },
                success: function(ajaxData) {
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
                error: function(ajaxData) {
                    modalformtutup();
                    gagalalert();
                }
            });
        }
    </script>
<?php
}
?>