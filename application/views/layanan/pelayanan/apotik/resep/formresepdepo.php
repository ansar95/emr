<!-- START: Card Data-->
<main>
    <div class="container-fluid site-width">
        <!-- START: Breadcrumbs-->
        <div class="row ">
            <div class="col-12  align-self-center">
                <div class="sub-header mt-2 py-3 align-self-center d-sm-flex w-100 rounded">
                    </ol>
                </div>
            </div>
        </div>
        <!-- END: Breadcrumbs-->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-block d-md-flex justify-content-between align-items-center">
                        <h4 class="my-auto">Resep Obat</h4>
                        <form action="<?php echo site_url() ?>/depoapotik/cetakresep" method="POST" target="_blank">
                            <div class=" row">
                                <label for="username" class="col-5 col-md-1 col-form-label">Shift</label>
                                <div class="col-7 col-md-2 mb-2 mb-md-0">
                                    <input class="form-control" type="text" id="shift" name="shift" disabled value="<?php echo $shift ?>" />
                                </div>
                                <label for="username" class="col-5 col-md-1 col-form-label">Depo</label>
                                <div class="col-7 col-md-3 mb-2 mb-md-0">
                                    <input type="text" id="depo" name="depo" disabled hidden value="<?php echo $depo ?>" />
                                    <input class="form-control" type="text" id="depotext" name="depotext" value="<?php echo $depotext ?>" disabled />
                                </div>
                                <label for="username" class="col-5 col-md-2 col-form-label">No. Resep</label>
                                <div class="col-7 col-md-2 mb-2 mb-md-0">
                                    <input class="form-control" type="text" id="norep" name="norep" readonly />
                                </div>
                                <div class="col-12 col-md-1 mb-2 mb-md-0">
                                    <button class="btn btn-sm btn-primary" type="submit"><i class="fas fa-print"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row col-spacing-row">
                                    <label class="col-md-4 col-form-label">Tipe</label>
                                    <div class="col-md-8">
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" name="tipe" value="Umum" id="tipe1" onclick="statuspasien(this)" checked>
                                            <label class="custom-control-label" for="tipe1">Umum</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" name="tipe" value="Jaminan" id="tipe2" onclick="statuspasien(this)" checked>
                                            <label class="custom-control-label" for="tipe2">Jaminan</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row col-spacing-row">
                                    <label class="col-md-4 col-form-label">No. RM</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="norm" name="norm" oninput="carirm()" maxlength="6" autocomplete="off" />
                                    </div>
                                </div>
                                <div class="form-group row col-spacing-row">
                                    <label class="col-md-4 col-form-label">Nama</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="nama" name="nama" autocomplete="off" />
                                    </div>
                                </div>
                                <div class="form-group row col-spacing-row">
                                    <label class="col-md-4 col-form-label">No. Kartu</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="kartu" name="kartu" autocomplete="off" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label">Pelayanan</label>
                                    <div class="col-md-8">
                                        <select class="form-control" style="width: 100%;" name="gol" id="gol">
                                            <?php
                                            foreach ($golongan as $row) {
                                            ?>
                                                <option value="<?php echo $row->idgolongan; ?>"><?php echo $row->golongan; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <!-- div menampilkan data potongan  -->
                                <div class="form-group row mb-4">
                                    <label class="col-md-4 col-form-label">Potongan</label>
                                    <div class="col-md-8">
                                        <select class="form-control" style="width: 100%;" name="potongan" id="potongan">
                                            <option value="">--</option>
                                        <?php foreach ($potongan as $row) : ?>
                                            <option value="<?php echo $row->id; ?>"><?php echo $row->nama_potongan; ?> (<?php echo $row->persentase_potongan ?>%)</option>
                                        <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <!--  -->

                            </div>
                            <div class="col-md-6">
                                <div class="form-group row col-spacing-row">
                                    <label class="col-md-4 col-form-label">Tanggal Resep</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="tglresep" name="tglresep" autocomplete="off" />
                                    </div>
                                </div>
                                <div class="form-group row col-spacing-row">
                                    <label class="col-md-4 col-form-label">Unit/Poli</label>
                                    <div class="col-md-8">
                                        <select class="form-control" style="width: 100%;" name="unit" id="unit">
                                            <?php
                                            foreach ($unit as $row) {
                                            ?>
                                                <option value="<?php echo $row->kode_unit; ?>"><?php echo $row->nama_unit; ?></option>
                                            <?php
                                            } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row col-spacing-row">
                                    <label class="col-md-4 col-form-label">No. Transaksi</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="sjp" name="sjp" autocomplete="off" />
                                    </div>
                                </div>
                                <div class="form-group row col-spacing-row">
                                    <label class="col-md-4 col-form-label">Dokter</label>
                                    <div class="col-md-8">
                                        <select class="form-control" style="width: 100%;" name="dokter" id="dokter">
                                            <?php
                                            foreach ($dokter as $row) {
                                            ?>
                                                <option value="<?php echo $row->kode_dokter; ?>"><?php echo $row->nama_dokter; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row col-spacing-row">
                                    <label class="col-md-4 col-form-label">Racik</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="racik" name="racik" autocomplete="off" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label">Non Racik</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="nonracik" name="nonracik" autocomplete="off" />
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col text-right">
                                <button class="btn-sm btn-warning btn pull-right" onclick="javascript:history.back();"><i class="fa fa-arrow-left"></i> Kembali Ke Daftar</button>
                                <button class="btn-sm btn-primary btn pull-right" onclick="prosesheaderpotongan()"><i class="fas fa-cog"></i> Proses</button>
                            </div>
                        </div>
                        <hr class="border-top-hr my-4 bg-secondary" />
                        <div id="kotakdetail" class="position-relative">
                            <div class="row mb-4">
                                <div class="col">
                                    <div class="d-flex justify-content-between">
                                        <b>Daftar Resep</b>
                                        <button onclick="addreseppotongan()" class="btn btn-sm btn-primary" id="tambahruang">
                                            <i class='fas fa-plus'></i> Tambah Data
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive" id="tabledetailresep">
                                <table class="table table-bordered">
                                    <tr>
                                        <th width="3%">No.</th>
                                        <th>Nama Produk</th>
                                        <th width="5%">
                                            <div align="right">Qty</div>
                                        </th>
                                        <th width="6%"> Satuan</th>
                                        <th width="7%">
                                            <div align="right">Harga</div>
                                        </th>
                                        <th width="7%">
                                            <div align="right">Jumlah</div>
                                        </th>
                                        <th width="20%">Dosis</th>
                                        <th width="7%">
                                            <div align="center">Pendanaan</div>
                                        </th>
                                        <th width="5%">
                                            <div align="center">Klaim</div>
                                        </th>
                                        <th width="14%">
                                            <div align="center"> Action</div>
                                        </th>
                                        <th width="5%">
                                            <div align="center">Proses</div>
                                        </th>
                                    </tr>
                                    <tr>
                                        <td colspan="10" class="text-center">
                                            Tidak Ada Data
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-12 ">
                                    <button onclick="cetaketiketsemua()" class="btn btn-sm btn-success" id="cetaketiketnya">
                                        <i class='fas fa-print'></i> Print Semua Etiket
                                    </button>
                                </div>
                            </div>
                            <div id="pagination_link" class="d-flex flex-row-reverse">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</main>
<!-- END -->
<script type="text/javascript">
    function prosesheaderpotongan() {
        var norm = $("#norm").val();
        var nama = $("#nama").val();
        var kartu = $("#kartu").val();
        var gol = $("#gol").val();
        var tglresep = $("#tglresep").val();
        var unit = $("#unit").val();
        var unittext = $("#unit option:selected" ).text();
        var sjp = $("#sjp").val();
        var dokter = $("#dokter").val();
        var doktertext = $("#dokter option:selected" ).text();
        var racik = $("#racik").val();
        var nonracik = $("#nonracik").val();
        if ((norm == "") || (nama == "") || (gol == "") || (tglresep == "") || (unit == "") || (dokter == "")) {
            kuranglengkap();
            return;
        }
        $("#norm").prop("disabled", true);
        $("#nama").prop("disabled", true);
        $("#kartu").prop("disabled", true);
        $("#gol").prop("disabled", true);
        $("#potongan").prop("disabled", true);
        $("#tglresep").prop("disabled", true);
        $("#unit").prop("disabled", true);
        $("#sjp").prop("disabled", true);
        $("#dokter").prop("disabled", true);
        $("#racik").prop("disabled", true);
        $("#nonracik").prop("disabled", true);
         modaldetailtutup();
        console.log('luarresep input baru');
    }

    function addreseppotongan() {
        modaldetail();
        $.ajax({
            url: "<?php echo site_url();?>/depoapotikresep/tambahobat",
            type: "GET",
            success: function (ajaxData){
                $("#formmodal").html(ajaxData);
                $("#formmodal").modal('show',{backdrop: 'true'});
                modaldetailtutup();
            },
            error: function(data) {
                gagalalert();
                modaldetailtutup();
            }
        });
    }

    function panggileditdetailpotongan(id) {
        modaldetail();
        $.ajax({
            url: "<?php echo site_url();?>/depoapotikresep/editobat",
            type: "GET",
            data: {
                id: id
            },
            success: function (ajaxData){
                $("#formmodal").html(ajaxData);
                $("#formmodal").modal('show',{backdrop: 'true'});
                modaldetailtutup();
            },
            error: function(data) {
                gagalalert();
                modaldetailtutup();
            }
        });
	}

    function panggilhapusdetailpotongan(id) {
        var norep = document.getElementById("norep").value;
        $.confirm({
            title: 'Hapus Detail',
            buttons: {
                hapus: {
                    text: 'Hapus',
                    btnClass: 'btn btn-danger',
                    keys: ['enter', 'shift'],
                    action: function(){
                        $.ajax({
                            url: "<?php echo site_url();?>/depoapotikresep/hapusdepo",
                            type: "GET",
                            data: {
                                id: id,
                                norep: norep
                            },
                            success: function (ajaxData){
                                var dt = JSON.parse(ajaxData);
                                console.log(dt);
                                if (dt.stat == true) {
                                    modalheadertutup();
                                    modaldetailtutup();
                                    $("#tabledetailresep").html(dt.dtview);
                                    suksesalert(2);
                                } else {
                                    gagalalert()
                                }
                            },
                            error: function(data) {
                                gagalalert();
                            }
                        });
                    }
                },
                batal: {
                    text: 'Batal',
                    action: function(){

                    }
                }
            }
        });
    }
</script>