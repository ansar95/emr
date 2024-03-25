
 <div class="modal-dialog modal-lg modal-dialog-centered" style="margin: 0 auto;">
    <div class="modal-content">
        <div class="box box-default box-solid" id="kotakform">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Master Racikan Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group form-inline">
                    <label class="mr-0" style="width: 30%;">Kode / Nama Obat Racikan:</label>
                    <input type="text" class="form-control" style="text-transform: uppercase; width: 15%;" id="koderacikan" placeholder="Kode" maxlength="6">
                    <input type="text" class="form-control" id="namaracikan" style="width: 40%;" placeholder="nama racikan">
                    <select class="form-control" style="width: 15%;" name="satuanracik" id="satuanracik">
                        <?php
                        foreach ($dtsatuan  as $row) {
                        ?>
                            <option value="<?php echo $row->satuanobat; ?>"><?php echo $row->satuanobat; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>


                <table width="100%" class="table table-bordered" id="tabelRacik">
                    <thead>
                        <tr>
                            <th width="67%">Nama Obat</th>
                            <th width="10%" style="text-align: left;">Qty</th>
                            <th width="13%">Satuan</th>
                            <th width="10%">Proses</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Baris-baris yang sudah tersimpan akan ditambahkan di sini -->
                    </tbody>
                </table>
                <br>
                <div class="form-row">
                    <table width="100%" class="table" id="isiracik">
                        <tbody id="tabelBody">
                            <td width="67%">
                                <select class="form-control" style="width: 100%;" name="produk" id="produk" onchange="cariobat()">
                                    <option value=""><?php echo "--- pilih obat ---"; ?></option>
                                    <?php
                                    foreach ($dtmasterobat as $row) {
                                    ?>
                                        <option value="<?php echo $row->kodeobat . "_" . $row->id; ?>"><?php echo $row->namaobat; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </td>
                            <td width="10%" style="text-align: right;"> <input type="number" class="form-control" id="qty" placeholder="Qty"></td>
                            <td width="13%"><input type="text" class="form-control" id="satuanpakai" placeholder="Satuan" disabled></td>
                            <td><input type="hidden" class="form-control" id="hargapakai"></td>
                            <!-- <td width="10%"><button class="btn btn-warning" id="tambahData">Simpan</button></td> -->
                            <td width="10%"><button onclick="SaveDetail()" class="btn btn-primary" data-bs-dismiss="modal">Simpan</button></td>

                         </tbody>
                    </table>
                </div>
            </div>
        </div>
      
    </div>
</div>
    <script>

        $(document).ready(function() {
            $('#produk').select2();
            $('#satuanracik').select2();
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
                    console.log(pr);
                    $("#satuanpakai").val(pr.dtapotik.satuanpakai);
                    $("#hargapakai").val(pr.dtapotik.hargapakai);
                }
            });
        }


        function SaveDetail() {
            // modalform();
            var no_rm = document.getElementById("no_rm").value;
	        var kode_dokter = document.getElementById("kode_dokter").value;
	        var notransaksi = document.getElementById("notransaksi").value;
	        var koderacikan = document.getElementById("koderacikan").value;
	        var namaracikan = document.getElementById("namaracikan").value;
	        var satuanracik = document.getElementById("satuanracik").value;

            var produk = $("#produk").val();
            var hasilPemisahan = produk.split("_");
            var kodeobat = hasilPemisahan[0]; // Bagian pertama (kodeobat)
            var idobat = hasilPemisahan[1];      // Bagian kedua (12)
            var namaobat = $("#produk option:selected").text();
            var satuanpakai = document.getElementById("satuanpakai").value;
            var qty = document.getElementById("qty").value;

            if ((koderacikan == "") || (namaracikan == "") || (kodeobat == "") || (satuanpakai == "") || (qty == "")) {
                kuranglengkap();
                modalloadtutup();
                return;
            }
            $.ajax({ 
                url: "<?php echo site_url(); ?>/rme/saveDetailRacikan",
                type: "GET",
                data: {
                    no_rm :no_rm,
                    kode_dokter : kode_dokter,
                    notransaksi : notransaksi,
                    koderacikan : koderacikan,
                    namaracikan : namaracikan,
                    satuanracik : satuanracik,
                    idobat: idobat,
                    kodeobat: kodeobat,
                    namaobat: namaobat,
                    satuanpakai: satuanpakai,
                    qty: qty
                },
                success: function(ajaxData) {
                    console.log(ajaxData);
				    var dt = JSON.parse(ajaxData);
                    $("#tabelRacik tbody tr").remove();
                    $("#tabelRacik tbody").append(dt.dtview);
                    // modalformtutup();
                    // tutupmodal();
                    },
                error: function(ajaxData) {
                    modalformtutup();
                    // gagalalert();
                }
            });
        }

    </script>
