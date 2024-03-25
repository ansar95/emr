<?php
if ($formpilih == 0) {
?>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- <div class="box box-default box-solid" id="proseskotak"> -->
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Item Retur Faktur</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="username" class="col-md-4 col-form-label">Tanggal</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="tglretur" id="tglretur">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="username" class="col-md-4 col-form-label">NO.SJ/Faktur</label>
                    <div class="col-md-8">
                    <input type="text" class="form-control" name="nosj" id="nosj" onkeyup="this.value = this.value.toUpperCase(); carifaktur()">  </div>
                </div>
                <div class="form-group row">
                    <label for="username" class="col-md-4 col-form-label">Vendor</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="detailvendor" id="detailvendor" disabled>
                    </div>
                </div>
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
                                <option value="<?php echo $row->kodeobat . "_" . $row->id; ?>"><?php echo $row->namaobat; ?></option>
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
                    <label for="username" class="col-md-4 col-form-label">Qty*</label>
                    <div class="col-md-8">
                        <input type="number" class="form-control" name="qty" id="qty" value="0">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="username" class="col-md-4 col-form-label">Isi Dalam Kemasan*</label>
                    <div class="col-md-8">
                        <input type="number" class="form-control" name="isi" id="isi" value="1">
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
                <div class="form-group row">
                    <label for="username" class="col-md-4 col-form-label">Sebab</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="sebab" id="sebab" />
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

        function carifaktur() {
            var nosj = $("#nosj").val();
            console.log(nosj);

            $.ajax({
                url: "<?php echo site_url(); ?>/faktur/carifaktur",
                type: "GET",
                data: {
                    nosj: nosj
                },
                success: function(ajaxData) {
                    var pr = JSON.parse(ajaxData);
                    console.log(pr);
                    // $("#sat").val(pr.dtapotik.satuanpakai);
                    // $("#hrg").val(pr.dtapotik.hargapakai);
                    $("#detailvendor").val(pr.dtvendor.namapbf);
                }
            });
        }

        function hitungjumlah() {
            var qty = $("#qty").val();
            var hrg = $("#hrg").val();
            var disc = $("#disc").val();
            var pot = $("#pot").val();
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

        $(document).ready(function() {
            $('#barang').select2();
            $('#sat').select2();
            $('#exp').datepicker({
                autoclose: true
            }).datepicker("setDate", "0");
            $('#tglretur').datepicker({
                autoclose: true
            }).datepicker("setDate", "0");

            $("#simpan").click(function(e) {
                modalform();
                var nosj = $("#nosj").val();
                var tglretur = $("#tglretur").val();
                var detailvendor = $("#detailvendor").val();
                var detailvendortext = $("#detailvendor option:selected").text();
                var kode = document.getElementById("kode").value;
                var barang = $("#barang").val();
                var barangtext = $("#barang option:selected").text();
                var sat = $("#sat").val();
                var qty = document.getElementById("qty").value;
                var isi = document.getElementById("isi").value;
                var exp = document.getElementById("exp").value;
                var batch = document.getElementById("batch").value;
                var sebab = document.getElementById("sebab").value;

                if ((nosj == "-") || (tglretur == "") || (detailvendor == "") || (kode == "") || (barang == "") || (sat == "") || (qty == "") || (isi == "") || (exp == "") || (batch == "") || (sebab == "")) {
                    kuranglengkap();
                    modalformtutup();
                    return;
                }

                $.ajax({
                    url: "<?php echo site_url(); ?>/faktur/simpanretur",
                    type: "GET",
                    data: {
                        nosj: nosj,
                        tglretur: tglretur,
                        detailvendor: detailvendor,
                        detailvendortext: detailvendortext,
                        kode: kode,
                        barang: barang,
                        barangtext: barangtext,
                        sat: sat,
                        qty: qty,
                        isi: isi,
                        exp: exp,
                        batch: batch,
                        sebab: sebab,
                        arrtanda: JSON.stringify(arrTanda)
                    },
                    success: function(ajaxData) {
                        var dt = JSON.parse(ajaxData);
                        console.log(dt.stat);
                        if (dt.stat == true) {
                            $("#tabledetailretur").html(dt.dtview);
                            modalformtutup();
                            tutupmodal();
                            prosesretur()
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