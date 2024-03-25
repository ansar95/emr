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
                        <h4 class="modal-title">Detail Faktur</h4>
                    </div>
                    <div class="modal-body">
                        <div class="box-body">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Kode</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="kode" id="kode" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Nama Barang</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" style="width: 100%;" name="barang" id="barang" onchange="cariobat()">
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
                                    <label class="col-sm-4 control-label">Satuan</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="sat" id="sat" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Qty (kemasan)</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="qty" id="qty" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Harga (per Kemasan)</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="hrg" id="hrg" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">% Diskon</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="disc" id="disc" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Pot. Langsung (Rp)</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="pot" id="pot" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Jumlah Harga</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="jum" id="jum" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Isi Dalam Kemasan</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="isi" id="isi" >
                                    </div>
                                </div>                            
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a id="simpan" class="btn btn-primary">Simpan</a>
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
                url: "<?php echo site_url();?>/rt/obatcari",
                type: "GET",
                data : {produk: produk},
                success: function (ajaxData) {
                    var pr = JSON.parse(ajaxData);
                    $("#sat").val(pr.dtapotik.satuanpakai);
                    $("#hrg").val(pr.dtapotik.hargapakai);
                    $("#kode").val(pr.dtapotik.kodeobat);
                }
            });
        }

        $(document).ready(function () {
            $('#barang').select2();
            $('#exp').datepicker({ autoclose: true }).datepicker("setDate", "0");

            $("#simpan").click(function(e) {
                modalform();
                var no = $("#no").val();
                var tgl = $("#tgl").val();
                var terima = $("#terima").val();
                var vendor = $("#govendorl").val();
                var vendortext = $("#vendor option:selected" ).text();
                var ppn = $('#ppn').is(":checked");

                var kode = document.getElementById("kode").value;
                var barang = $("#barang").val();
                var barangtext = $("#barang option:selected").text();
                var sat = document.getElementById("sat").value;
                var qty = document.getElementById("qty").value;
                var hrg = document.getElementById("hrg").value;
                var disc = document.getElementById("disc").value;
                var pot = document.getElementById("pot").value;
                var jum = document.getElementById("jum").value;
                var isi = document.getElementById("isi").value;
                var exp = document.getElementById("exp").value;
                var batch = document.getElementById("batch").value;

                console.log(noina);
                $.ajax({
                    url: "<?php echo site_url();?>/faktur/simpanfaktur",
                    type: "GET",
                    data: {
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
                        jum: jum
                    },
                    success: function (ajaxData){
                        var dt = JSON.parse(ajaxData);
                        console.log(dt);
                        if (dt.stat.sukses == true) {
                            $("#tabledetailresep").html(dt.dtview);
                            $("#norep").val(dt.stat.noresep);
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
    <?php
}
?>
