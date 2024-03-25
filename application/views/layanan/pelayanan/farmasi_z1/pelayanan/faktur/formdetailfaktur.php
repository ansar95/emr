<?php
if ($formpilih == 0) {
?>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- <div class="box box-default box-solid" id="proseskotak"> -->
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Faktur</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="username" class="col-md-4 col-form-label">Kode</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="kode" id="kode" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="username" class="col-md-4 col-form-label">Nama Obat/BHP*</label>
                    <div class="col-md-8">
                        <select class="form-control" style="width: 100%;" name="barang" id="barang" onchange="cariobat()">
                            <option value="-">-- Pilih --</option>
                            <?php
                            foreach ($dtobat as $row) {
                            ?>
                                <option value="<?php echo $row->kodeobat . "_" . $row->id; ?>"><?php echo $row->namaobat . ' | ' . $row->satuanpakai . ' | Rp. ' . formatuang($row->hargastok); ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="username" class="col-md-4 col-form-label">Satuan*</label>
                    <div class="col-md-8">
                        <select class="form-control" style="width: 100%;" name="sat" id="sat">
                            <option value="-">-- Pilih --</option>
                            <?php
                            foreach ($dtsatuan as $row) {
                            ?>
                                <option value="<?php echo $row->satuanobat; ?>"><?php echo $row->satuanobat; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="username" class="col-md-4 col-form-label">Qty (kemasan)*</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="qty" id="qty" onkeyup="javascript:hitungjumlah();" autocomplete="off">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="username" class="col-md-4 col-form-label">Harga (per Kemasan)*</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="hrg" id="hrg" onkeyup="javascript:hitungjumlah();" autocomplete="off">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="username" class="col-md-4 col-form-label">% Diskon</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="disc" id="disc" onkeyup="javascript:hitungjumlah();" value="0" autocomplete="off">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="username" class="col-md-4 col-form-label">Pot. Langsung (Rp)</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="pot" id="pot" onkeyup="javascript:hitungjumlah();" value="0" autocomplete="off">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="username" class="col-md-4 col-form-label">Jumlah Harga</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="jum" id="jum" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="username" class="col-md-4 col-form-label">Isi Dalam Kemasan*</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="isi" id="isi" value="1">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="username" class="col-md-4 col-form-label">Expire Date*</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="exp" id="exp">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="username" class="col-md-4 col-form-label">Batch No.*</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="batch" id="batch" onkeyup="this.value = this.value.toUpperCase();" />
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button id="simpan" class="btn btn-primary">Simpan</button>
            </div>
            <!-- </div> -->
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
                url: "<?php echo site_url(); ?>/faktur/obatcari",
                type: "GET",
                data: {
                    produk: produk
                },
                success: function(ajaxData) {
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
            if (qty == "0" || hrg == 0) {
                var hs = 0;
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

        $(document).ready(function() {
            $('#barang').select2();
            $('#sat').select2();
            $('#exp').datepicker({
                autoclose: true
            }).datepicker("setDate", "0");

            $("#simpan").click(function(e) {
                modalform();
                var sj = $("#sj").val();
                var no = $("#no").val();
                var tgl = $("#tgl").val();
                var terima = $("#terima").val();
                var vendor = $("#vendor").val();
                var vendortext = $("#vendor option:selected").text();
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
                var isi = document.getElementById("isi").value;
                var exp = document.getElementById("exp").value;
                var batch = document.getElementById("batch").value;

                if ((sat == "-") || (qty == "") || (hrg == "") || (isi == "") || (exp == "") || (batch == "")) {
                    kuranglengkap();
                    modalformtutup();
                    return;
                }

                $.ajax({
                    url: "<?php echo site_url(); ?>/faktur/simpanfaktur",
                    type: "GET",
                    data: {
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
                        isi: isi,
                        exp: exp,
                        batch: batch,
                        jum: jum,
                        arrtanda: JSON.stringify(arrTanda)
                    },
                    success: function(ajaxData) {
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
<?php
}
?>