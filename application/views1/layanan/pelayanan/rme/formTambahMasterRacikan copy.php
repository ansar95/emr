
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
                    <label for="namaracikan" class="mr-2">Kode / Nama Obat Racikan:</label>
                    <!-- <input type="text" class="form-control w-10" id="koderacikan" placeholder="kode"  maxlength="6"> -->
                    <input type="text" class="form-control w-10" style="text-transform: uppercase;" id="koderacikan" placeholder="Kode" maxlength="6">
                    <input type="text" class="form-control w-50 ml-1" id="namaracikan" placeholder="nama racikan">
                </div>


                <table width="100%" class="table table-bordered" id="dataTabel">
                    <thead>
                        <tr>
                            <th width="67%">Nama Obat</th>
                            <th width="10%" style="text-align: left;">Qty</th>
                            <th width="13%">Satuan</th>
                            <th width="10%">Proses</th>
                        </tr>
                    </thead>
                    <tbody id="tabelBody">
                        <!-- Baris-baris yang sudah tersimpan akan ditambahkan di sini -->
                    </tbody>
                </table>
                <br>
                <br>
                <div class="form-row">
                    <table width="100%" class="table" id="dataisiTabel">
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
                            <td width="10%"><button class="btn btn-warning" id="tambahData">Simpan</button></th>
                         </tbody>
                    </table>
                </div>
                <br>
        <br>
        <br>
        <div class="row">
            <div class="col-6">
                <button class="btn btn-primary" id="simpanDatabase text-right">Simpan ke Database</button>
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
                    console.log(pr);
                    $("#satuanpakai").val(pr.dtapotik.satuanpakai);
                    $("#hargapakai").val(pr.dtapotik.hargapakai);
                }
            });
        }


        function SaveDetail() {
            modalform();
            var no_rm = document.getElementById("no_rm").value;
	        var kode_dokter = document.getElementById("kode_dokter").value;
	        var notransaksi = document.getElementById("notransaksi").value;
            console.log(no_rm);
            console.log(kode_dokter);
            console.log(notransaksi);

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

            if ((kodeobat == "") || (satpakai == "") || (qtypakai == "")) {
                kuranglengkap();
                modalloadtutup();
                return;
            }
            $.ajax({
                url: "<?php echo site_url(); ?>/rme/saveObatRme",
                type: "GET",
                data: {
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
                    no_rm :no_rm,
                    kode_dokter : kode_dokter,
                    notransaksi : notransaksi,
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

<script>
        // Fungsi untuk menambahkan baris baru ke dalam tabel
        function tambahBaris(namaObat, qty, satuan) {
            var tableBody = document.getElementById('tabelBody');
            var newRow = tableBody.insertRow();
            var cell1 = newRow.insertCell(0);
            var cell2 = newRow.insertCell(1);
            var cell3 = newRow.insertCell(2);
            var cell4 = newRow.insertCell(3);

            cell1.innerHTML = namaObat;
            cell2.innerHTML = qty;
            cell3.innerHTML = satuan;
            cell4.innerHTML = '<button class="btn btn-danger btn-sm" onclick="hapusBaris(this)">Hapus</button>';
        }

        // Tombol "Tambah Data" diklik
        document.getElementById('tambahData').addEventListener('click', function() {
            // var namaObat = document.getElementById('namaObat').value;
            var produk = $("#produk").val();
            var hasilPemisahan = produk.split("_");
            var kodeobat = hasilPemisahan[0]; // Bagian pertama (kodeobat)
            var idobat = hasilPemisahan[1];      // Bagian kedua (12)
            var namaObat = $("#produk option:selected").text();

            var qty = document.getElementById('qty').value;
            var satuan = document.getElementById('satuanpakai').value;

            if (namaObat === "" || qty === "" || satuan === "") {
                alert("Silakan isi semua field!");
                return;
            }

            tambahBaris(namaObat, qty, satuan);

            // document.getElementById('produk').value = "";
            $("#produk").val("");
            document.getElementById('qty').value = "";
            document.getElementById('satuanpakai').value = "";
        });

        // Fungsi untuk menghapus baris
        function hapusBaris(button) {
            var row = button.parentNode.parentNode;
            row.parentNode.removeChild(row);
        }

    </script>