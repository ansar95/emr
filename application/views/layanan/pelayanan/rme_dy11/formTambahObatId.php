
 <div class="modal-dialog modal-lg modal-dialog-centered" style="margin: 0 auto;">
    <div class="modal-content">
        <div class="box box-default box-solid" id="kotakform">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Obat Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="username" class="col-sm-2 col-form-label">Item</label>
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
                    <input type="hidden" class="form-control" name="harga" id="harga" >
                    <label for="username" class="col-sm-2 col-form-label">Qty</label>
                    <div class="col-sm-2">
                        <input type="number" class="form-control" name="qtypakai" id="qtypakai">
                    </div>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" name="satpakai" id="satpakai" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="username" class="col-sm-2 col-form-label">Dosis - Pagi</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" name="pagi" id="pagi" maxlength="15">
                    </div>
                    <label for="username" class="col-sm-1 col-form-label">Siang</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" name="siang" id="siang" maxlength="15">
                    </div>
                    <label for="username" class="col-sm-1 col-form-label">Malam</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" name="malam" id="malam" maxlength="15">
                    </div>
                </div>


                <div class="form-group row">
                    <label for="username" class="col-sm-2 col-form-label">Takaran</label>
                    <div class="col-sm-3">
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
                    <label for="username" class="col-sm-1 col-form-label">Cara</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="ket" id="ket" maxlength="20">
                    </div>
                    <div class="col-sm-3">
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
                </div>
                <div class="form-group row">
                   
                    
                   
                </div>
                    <br>
                    <div class="row">
                        <div class="col-6">
                            <!-- <button onclick="Batal()" class="btn btn-danger">Batal Save</button> -->
                        </div>
                        <div class="col-6 text-right">
                            <button onclick="SaveDetail()" class="btn btn-primary" data-bs-dismiss="modal">Simpan</button>

                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
    <script>

        $(document).ready(function() {
            $('#produk').select2();
        });

        function modalform() {
            $("#kotakform").append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
        }

        function modalformtutup() {
            $(".overlay").remove();
        }

        function tutupmodal() {
            $(function () {
                $("#formmodal").modal("toggle");
            });
        }

        function kuranglengkap() {
            $.notify("Data Kurang Lengkap", "error");
        }

        function cariobat() {
            var produk = $("#produk").val();
            $.ajax({
                url: "<?php echo site_url(); ?>/rme/obatcari",
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


        function SaveDetail() {
            modalform();
	        var no_rm = document.getElementById("no_rm").value;
	        var noresep = document.getElementById("noresepnya").value;
            console.log(noresep);

            var produk = $("#produk").val();
            var hasilPemisahan = produk.split("_");
            var kodeobat = hasilPemisahan[0]; // Bagian pertama (kodeobat)
            var idobat = hasilPemisahan[1];      // Bagian kedua (12)

            var namaobat = $("#produk option:selected").text();
        
            var satpakai = document.getElementById("satpakai").value;
            var qtypakai = document.getElementById("qtypakai").value;
            var harga = document.getElementById("harga").value;
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
            var pendanaan = '';
            var keterangan = document.getElementById("ket").value;

            console.log(takaran);
            console.log(caramakan);
            console.log(pagi);
            console.log(siang);
            console.log(malam);
            console.log(keterangan);
            // console.log(norep);
            console.log(kodeobat);
            // console.log(produktext);
            console.log(satpakai);
            console.log(qtypakai);
            console.log(harga);
            console.log(noina);

            if (kodeobat == "" || satpakai == "" || qtypakai == "" || (pagi == "" && siang == "" && malam == "") ) {
                modalformtutup();
                kuranglengkap();
                return;
            }
            $.ajax({
                url: "<?php echo site_url(); ?>/rme/saveObatRme",
                type: "GET",
                data: {
                    no_rm: no_rm,
                    idobat: idobat,
                    kodeobat: kodeobat,
                    namaobat: namaobat,
                    satpakai: satpakai,
                    qtypakai: qtypakai,
                    harga: harga,
                    noina: noina,
                    pagi: pagi,
                    siang: siang,
                    malam: malam,
                    takaran: takaran,
                    caramakan: caramakan,
                    keterangan: keterangan,
                    noresep : noresep,
                    racikan : 0
                },
                success: function(ajaxData) {
                    console.log(ajaxData);
				    var dt = JSON.parse(ajaxData);
                    $("#orderresep tbody tr").remove();
                    $("#orderresep tbody").append(dt.dtview);
                    modalformtutup();
                    tutupmodal();


                    },
                error: function(ajaxData) {
                    modalformtutup();
                    // gagalalert();
                }
            });
        }

    </script>
