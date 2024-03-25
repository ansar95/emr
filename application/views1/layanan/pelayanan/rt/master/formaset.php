<?php
if ($formpilih == 0) {
    ?>
    <div class="modal-dialog modal-xl" style="width:1200px;">
        <div class="modal-content" >
            <div class="form-horizontal">
                <div class="box box-default box-solid" id="kotakform">
                    <div class="modal-header">
                        <h6 class="modal-title">Tambah Data Barang</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="box-body">
                            <div class="col-sm-12 row col-spacing-row">
                                <div class="col-sm-6">
                                    <div class="form-group row col-spacing-row">
                                        <label class="col-sm-3 control-label">Kode</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" name="rm" id="kd" >
                                        </div>
                                    </div>
                                    <div class="form-group row col-spacing-row">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Nama Produk</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="nm" id="nm" >
                                        </div>
                                    </div>
                                    <div class="form-group row col-spacing-row">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Jenis</label>
                                        <div class="col-sm-3">
                                            <select class="form-control prov" style="width: 100%;" name="jenis" id="jenis">
                                                <?php
                                                foreach($dtjenis as $row) {
                                                    ?>
                                                    <option value="<?php echo $row->idjns; ?>"><?php echo $row->jns; ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row col-spacing-row">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Satuan Stok</label>
                                        <div class="col-sm-3">
                                            <select class="form-control prov" style="width: 100%;" name="satuanstok" id="satuanstok">
                                                <?php
                                                foreach($dtsatuan as $row) {
                                                    ?>
                                                    <option value="<?php echo $row->id; ?>"><?php echo $row->satuanobat; ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row col-spacing-row">
                                        <label class="col-sm-3 control-label">Isi Satuan</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" name="isipakai" id="isipakai" value="0">
                                        </div>
                                    </div>
                                    <div class="form-group row col-spacing-row">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Satuan Pakai</label>
                                        <div class="col-sm-3">
                                            <select class="form-control prov" style="width: 100%;" name="satuanpakai" id="satuanpakai">
                                                <?php
                                                foreach($dtsatuan as $row) {
                                                    ?>
                                                    <option value="<?php echo $row->id; ?>"><?php echo $row->satuanobat; ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group row col-spacing-row">
                                        <label class="col-sm-3 control-label">Harga Dasar</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" name="hrgdasar" id="hrgdasar" value="0">
                                        </div>
                                    </div>
                                    <div class="form-group row col-spacing-row">
                                        <label class="col-sm-3 control-label">Harga Umum</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" name="hrgumum" id="hrgumum" value="0">
                                        </div>
                                    </div>
                                    <div class="form-group row col-spacing-row">
                                        <label class="col-sm-3 control-label">Saldo Minimum</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" name="saldo" id="saldo" value="0">
                                        </div>
                                    </div>
                                    <div class="form-group row col-spacing-row">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Vendor</label>
                                        <div class="col-sm-6">
                                            <select class="form-control prov" style="width: 100%;" name="pbf" id="pbf">
                                                <?php
                                                foreach($dtpbf as $row) {
                                                    ?>
                                                    <option value="<?php echo $row->id; ?>"><?php echo $row->nama; ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button id="simpanunit" class="btn btn-primary">Simpan</button>
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

        $(document).ready(function () {
            $("#satuanpakai").select2();
            $("#jenis").select2();
            $("#satuanstok").select2();
            $("#gen").select2();
            $("#kla").select2();
            $("#gol").select2();
            $("#merk").select2();
            $("#pbf").select2();
            $("#simpanunit").click(function(e) {
                modalform();
                var kd = document.getElementById("kd").value;
                var nm = document.getElementById("nm").value;
                var jenis = $("#jenis").val();
                var jenistext = $("#jenis option:selected").text();
                var satuanstok = $("#satuanstok").val();
                var satuanstoktext = $("#satuanstok option:selected").text();
                var isipakai = document.getElementById("isipakai").value;
                var satuanpakai = $("#satuanpakai").val();
                var satuanpakaitext = $("#satuanpakai option:selected").text();
                var hrgdasar = document.getElementById("hrgdasar").value;
                var hrgumum = document.getElementById("hrgumum").value;
                var saldo = document.getElementById("saldo").value;
                var pbf = $("#pbf").val();
                var pbftext = $("#pbf option:selected").text();
                $.ajax({
                    url: "<?php echo site_url();?>/masterrtangga/simpandataobat",
                    type: "GET",
                    data: {
                        kd: kd,
                        nm: nm,
                        jenis: jenis,
                        jenistext: jenistext,
                        satuanstoktext: satuanstoktext,
                        satuanstok: satuanstok,
                        satuanstoktext: satuanstoktext,
                        isipakai: isipakai,
                        satuanpakai: satuanpakai,
                        satuanpakaitext: satuanpakaitext,
                        hrgdasar: hrgdasar,
                        hrgumum: hrgumum,
                        saldo: saldo,
                        pbf: pbf,
                        pbftext: pbftext
                    },
                    success: function (ajaxData){
                        if (ajaxData == "1") {
                            modalformtutup();
                            tutupmodal();
                        } else {
                            modalformtutup();
                            gagalalert();
                        }
                    }
                });
            });
        });
    </script>
    <?php
} else if ($formpilih == 1) {
    ?>
    <div class="modal-dialog modal-xl" style="width:1200px;">
        <div class="modal-content" >
            <div class="form-horizontal">
                <div class="box box-default box-solid" id="kotakform">
                    <div class="modal-header">
                        <h6 class="modal-title">Edit Data Barang</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="box-body">
                            <div class="col-sm-12 row col-spacing-row">
                                <div class="col-sm-6">
                                    <div class="form-group row col-spacing-row">
                                        <label class="col-sm-3 control-label">Kode</label>
                                        <div class="col-sm-3">
                                            <input disabled type="text" class="form-control" name="rm" id="kd" value="<?php echo $dtobat->kodeobat?>">
                                        </div>
                                    </div>
                                    <div class="form-group row col-spacing-row">
                                        <label class="col-sm-3 control-label">Nama Produk</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="nm" id="nm" value="<?php echo $dtobat->namaobat?>">
                                        </div>
                                    </div>
                                    <div class="form-group row col-spacing-row">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Jenis</label>
                                        <div class="col-sm-3">
                                            <select class="form-control prov" style="width: 100%;" name="jenis" id="jenis">
                                                <?php
                                                foreach($dtjenis as $row) {
                                                    ?>
                                                    <option value="<?php echo $row->idjns; ?>" <?php if($dtobat->jenisobat == $row->jns) { echo "selected";}?>><?php echo $row->jns; ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row col-spacing-row">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Satuan Stok</label>
                                        <div class="col-sm-3">
                                            <select class="form-control prov" style="width: 100%;" name="satuanstok" id="satuanstok">
                                                <?php
                                                foreach($dtsatuan as $row) {
                                                    ?>
                                                    <option value="<?php echo $row->id; ?>" <?php if($dtobat->satuanstok == $row->satuanobat) { echo "selected";}?>><?php echo $row->satuanobat; ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row col-spacing-row">
                                        <label class="col-sm-3 control-label">Isi Satuan</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" name="isipakai" id="isipakai" value="<?php echo $dtobat->qtysatuan?>">
                                        </div>
                                    </div>
                                    <div class="form-group row col-spacing-row">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Satuan Pakai</label>
                                        <div class="col-sm-3">
                                            <select class="form-control prov" style="width: 100%;" name="satuanpakai" id="satuanpakai">
                                                <?php
                                                foreach($dtsatuan as $row) {
                                                    ?>
                                                    <option value="<?php echo $row->id; ?>" <?php if($dtobat->satuanpakai == $row->satuanobat) { echo "selected";}?>><?php echo $row->satuanobat; ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group row col-spacing-row">
                                        <label class="col-sm-3 control-label">harga Dasar</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" name="hrgdasar" id="hrgdasar" value="<?php echo $dtobat->hargadasar?>">
                                        </div>
                                    </div>
                                    <div class="form-group row col-spacing-row">
                                        <label class="col-sm-3 control-label">Harga Umum</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" name="hrgumum" id="hrgumum" value="<?php echo $dtobat->hargapakai?>">
                                        </div>
                                    </div>
                                    <div class="form-group row col-spacing-row">
                                        <label class="col-sm-3 control-label">Saldo Minimum</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" name="saldo" id="saldo" value="<?php echo $dtobat->saldomin?>">
                                        </div>
                                    </div>
                                    <div class="form-group row col-spacing-row">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Vendor</label>
                                        <div class="col-sm-6">
                                            <select class="form-control prov" style="width: 100%;" name="pbf" id="pbf">
                                                <?php
                                                foreach($dtpbf as $row) {
                                                    ?>
                                                    <option value="<?php echo $row->id; ?>" <?php if($dtobat->idvendor == $row->id) { echo "selected";}?>><?php echo $row->nama; ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button onclick="editdata(<?php echo $id?>)" class="btn btn-primary">Ubah</button>
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

        function editdata(id) {
            modalform();
            var kd = document.getElementById("kd").value;
            var nm = document.getElementById("nm").value;
            var jenis = $("#jenis").val();
            var jenistext = $("#jenis option:selected").text();
            var satuanstok = $("#satuanstok").val();
            var satuanstoktext = $("#satuanstok option:selected").text();
            var isipakai = document.getElementById("isipakai").value;
            var satuanpakai = $("#satuanpakai").val();
            var satuanpakaitext = $("#satuanpakai option:selected").text();
            var hrgdasar = document.getElementById("hrgdasar").value;
            var hrgumum = document.getElementById("hrgumum").value;
            var saldo = document.getElementById("saldo").value;
            var pbf = $("#pbf").val();
            var pbftext = $("#pbf option:selected").text();
            $.ajax({
                url: "<?php echo site_url();?>/masterrtangga/editdataobat",
                type: "GET",
                data: {
                    id: id,
                    kd: kd,
                    nm: nm,
                    jenis: jenis,
                    jenistext: jenistext,
                    satuanstoktext: satuanstoktext,
                    satuanstok: satuanstok,
                    satuanstoktext: satuanstoktext,
                    isipakai: isipakai,
                    satuanpakai: satuanpakai,
                    satuanpakaitext: satuanpakaitext,
                    hrgdasar: hrgdasar,
                    hrgumum: hrgumum,
                    saldo: saldo,
                    pbf: pbf,
                    pbftext: pbftext
                },
                success: function (ajaxData){
                    if (ajaxData == "1") {
                        modalformtutup();
                        tutupmodal();
                    } else {
                        modalformtutup();
                        gagalalert();
                    }
                }
            });
        }

        $(document).ready(function () {

            $("#satuanpakai").select2();
            $("#jenis").select2();
            $("#satuanstok").select2();
            $("#gen").select2();
            $("#kla").select2();
            $("#gol").select2();
            $("#merk").select2();
            $("#pbf").select2();

        });
    </script>
    <?php
}
?>
