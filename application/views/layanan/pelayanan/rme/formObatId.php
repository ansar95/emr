
 <div class="modal-dialog modal-lg modal-dialog-centered" style="margin: 0 auto;">
    <div class="modal-content">
        <div class="box box-default box-solid" id="kotakform">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?php echo $dtDetailObat->namaobat ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                 <?php
                    if ($dtDetailObat->kodeobat == 'KJHGF1') {
                ?>        

                            <div class="form-group row">
                                <label for="catatanRacikan" class="col-sm-2 col-form-label">Komposisi Racikan</label>
                                <!-- <label for="catatanRacikan">Catatan Racikan:</label> -->
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="catatanRacikan" id="catatanRacikan" rows="5"><?php echo $dtDetailObat->catatanracikan?></textarea>
                                </div>
                            </div>

                <?php    
                    }
                ?>

                <div class="form-group row">
                    <input type="hidden" class="form-control" name="kodeobat" id="kodeobat" value="<?php echo $dtDetailObat->kodeobat?>">
                    <input type="hidden" class="form-control" name="harga" id="harga" value="<?php echo $dtDetailObat->hargapakai?>">
                    <label for="username" class="col-sm-2 col-form-label">Qty</label>
                    <div class="col-sm-2">
                        <input type="number" class="form-control" name="qtypakai" id="qtypakai" value="<?php if ($dtDetailObat->qty == '') {
                                                                                                            echo '0';
                                                                                                        } else {
                                                                                                            echo $dtDetailObat->qty;
                                                                                                        } ?>">
                    </div>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" name="satpakai" id="satpakai" value="<?php echo $dtDetailObat->satuanpakai?>" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="username" class="col-sm-2 col-form-label">Dosis - Pagi</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" name="pagi" id="pagi" maxlength="15" value="<?php echo $dtDetailObat->pagi; ?>">
                    </div>
                    <label for="username" class="col-sm-1 col-form-label">Siang</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" name="siang" id="siang" maxlength="15" value="<?php echo $dtDetailObat->siang; ?>">
                    </div>
                    <label for="username" class="col-sm-1 col-form-label">Malam</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" name="malam" id="malam" maxlength="15" value="<?php echo $dtDetailObat->malam; ?>">
                    </div>
                </div>


                <div class="form-group row">
                    <label for="username" class="col-sm-2 col-form-label">Takaran</label>
                    <div class="col-sm-3">
                        <select class="form-control" style="width: 100%;" name="takaran" id="takaran">
                            <?php
                            foreach ($dttakaran as $row) {
                            ?>
                                <option value="<?php echo $row->takaran; ?>" <?php if ($row->takaran == $dtDetailObat->takaran) echo "selected"; ?>><?php echo $row->takaran; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <label for="username" class="col-sm-1 col-form-label">Cara</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="ket" id="ket" maxlength="20" value="<?php echo $dtDetailObat->keterangan; ?>">
                    </div>
                    <div class="col-sm-3">
                        <select class="form-control" style="width: 100%;" name="caramkn" id="caramkn">
                            <?php
                            foreach ($dtcaramkn as $row) {
                            ?>
                                <option value="<?php echo $row->caramakan; ?>" <?php if ($row->caramakan == $dtDetailObat->caramakan) echo "selected"; ?>><?php echo $row->caramakan; ?></option>
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
                            <button onclick="hapusresep(<?php echo $dtDetailObat->idnoresep; ?>)" class="btn btn-danger">Hapus</button>
                        </div>
                        <div class="col-6 text-right">
                            <button onclick="ubah(<?php echo $dtDetailObat->idnoresep; ?>)" class="btn btn-primary" data-bs-dismiss="modal">Simpan</button>

                        </div>
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
            var no_rm = document.getElementById("no_rm").value;
	        var kode_dokter = document.getElementById("kode_dokter").value;
	        var notransaksi = document.getElementById("notransaksi").value;
            console.log(no_rm);
            console.log(kode_dokter);
            console.log(notransaksi);
            // var norep = document.getElementById("norep").value;
            var kodeobat = $("#kodeobat").val();
            var satpakai = document.getElementById("satpakai").value;
            var qtypakai = document.getElementById("qtypakai").value;
            var harga = document.getElementById("harga").value;
            
            var takaran = $("#takaran").val();
            if (kodeobat=='KJHGF1') {
                var catatanracikan = document.getElementById("catatanRacikan").value;
                var satpakai = $("#takaran").val();
                console.log('takaran fghjk1: '+takaran);

            } else {
                var catatanracikan='';
                var satpakai = document.getElementById("satpakai").value;
                console.log('takaran : '+takaran);

            }
            // var tuslag = document.getElementById("tuslag").value;
            // var dosis = $("#dosis").val();
            // var dosistext = $("#dosis option:selected").text();
            // var noina = $('#noina').is(":checked");
            // if($('#noina').is(":checked")){
            //         var noina=1;
            //     } else {
            //         var noina=0;
            //     }
            var noina=0;     
            var pagi = document.getElementById("pagi").value;
            var siang = document.getElementById("siang").value;
            var malam = document.getElementById("malam").value;
            // var takaran = $("#takaran").val();
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
                url: "<?php echo site_url(); ?>/rme/editObatRme",
                type: "GET",
                data: {
                    id: id,
                    // norep: norep,
                    kodeobat: kodeobat,
                    // produktext: produktext,
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
                    no_rm :no_rm,
                    kode_dokter : kode_dokter,
                     notransaksi : notransaksi,
                    catatanracikan : catatanracikan


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


        function hapusresep(id) {
            modalform();
            var no_rm = document.getElementById("no_rm").value;
	        var kode_dokter = document.getElementById("kode_dokter").value;
	        var notransaksi = document.getElementById("notransaksi").value;
            console.log(no_rm);
            console.log(kode_dokter);
            console.log(notransaksi);
            var kodeobat = $("#kodeobat").val();
            $.ajax({
                url: "<?php echo site_url(); ?>/rme/hapusObatRme",
                type: "GET",
                data: {
                    id: id,
                    kodeobat: kodeobat,
                    no_rm :no_rm,
                    kode_dokter : kode_dokter,
                    notransaksi : notransaksi
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
                    tutupmodal();
                }
            });
        }

    </script>
