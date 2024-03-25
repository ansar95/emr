<?php
if ($formpilih == 0) {
?>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- <div class="box box-default box-solid" id="proseskotak"> -->
            <div class="modal-header p-1 pl-3 align-text-bottom">
                <b class="modal-title" id="exampleModalLabel">Tambah Ampra</b>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group row">
                            <label class="col-sm-4 control-label">Tanggal Order</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="tgl" id="tgl" disabled value="<?php if ($tgl == "") {echo date("m/d/Y");} else {echo $tgl;} ?>">
                            </div>
                            <div class="col-sm-4">
                                <button type="button" class="btn btn-sm btn-default" onclick="tanggalbaru()">Baru</button>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 control-label">Nama Item</label>
                            <div class="col-sm-8">
                                <select class="form-control" style="width: 100%;" name="barang" id="barang">
                                    <option value="">--Pilih--</option>
                                    <?php
                                    foreach ($dtampra as $row) {
                                    ?>
                                        <option value="<?php echo $row->kodeobat . "_" . $row->id; ?>"><?php echo $row->namaobat . ' | ' . $row->satuanpakai; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 control-label">Qty. Ampra</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control text-right" name="qtya" id="qtya" />
                                <input type="hidden" class="form-control text-right" name="kodebhp" id="kodebhp" value="<?php echo $bhp ?>"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 control-label">Satuan</label>
                            <div class="col-sm-8">
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
                        <div class="form-group row" hidden>
                            <label class="col-sm-4 control-label">Pendanaan</label>
                            <div class="col-sm-8">
                                <select class="form-control" style="width: 100%;" name="guna" id="guna">
                                    <option value="-">-- Pilih --</option>
                                    <?php
                                    foreach ($dtdana as $row) {
                                    ?>
                                        <option value="<?php echo $row->pendanaan; ?>"><?php echo $row->pendanaan; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button id="simpan" class="btn btn-primary">Simpan</button>
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

        function tanggalbaru() {
            $("#tgl").prop("disabled", false);
            $('#tgl').datepicker({
                autoclose: true
            }).datepicker("setDate", "0");
        }

        $(document).ready(function() {
            $('#barang').select2();
            $('#sat').select2();
            $('#guna').select2();
            // $('#tgl').datepicker({ autoclose: true }).datepicker("setDate", "0");
            $('#tgla').datepicker({
                autoclose: true
            }).datepicker("setDate", "0");
            $('#tgld').datepicker({
                autoclose: true
            }).datepicker("setDate", "0");

            $("#simpan").click(function(e) {
                modalform();
                var unit = $("#unit").val();
                var unittext = $("#unit option:selected").text();

                var tgl = document.getElementById("tgl").value;
                var barang = $("#barang").val();
                // var barangtext = $("#barang option:selected").text();
                var namabarang = $("#barang option:selected").text();
                var barangtextsplit = namabarang.split(' | ');
                var barangtext = barangtextsplit[0];

                var qtya = document.getElementById("qtya").value;
                var kodebhp = document.getElementById("kodebhp").value; 
                var satuan = $("#sat").val();
                var satuantext = $("#sat option:selected").text();
                var guna = $("#guna").val();
                var gunatext = $("#guna option:selected").text();

                $.ajax({
                    url: "<?php echo site_url(); ?>/ampra/simpanamprabhp",
                    type: "GET",
                    data: {
                        unit: unit,
                        unittext: unittext,
                        tgl: tgl,
                        barang: barang,
                        barangtext: barangtext,
                        qtya: qtya,
                        satuan: satuan,
                        satuantext: satuantext,
                        guna: guna,
                        gunatext: gunatext,
                        kodebhp: kodebhp
                    },
                    success: function(ajaxData) {
                        var dt = JSON.parse(ajaxData);
                        console.log(dt);
                        if (dt.stat.sukses == true) {
                            $("#tableampra").html(dt.dtview);
                            modalformtutup();
                            tutupmodal();
                            tglaktif = tgl;
                            detailbydate();
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
            <div class="modal-header p-1 pl-3 align-text-bottom">
                <b class="modal-title" id="exampleModalLabel">Ubah Ampra</b>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

           
            <!-- <div class="form-horizontal">
                <div class="box box-default box-solid" id="kotakform"> -->
                <div class="modal-body">
                <!-- <div class="row"> -->
                    <div class="col-sm-12">
                                <div class="form-group row">
                                    <label class="col-sm-4 control-label">Tanggal Order</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="tgl" id="tgl" value="<?php echo $dtdetail->tglorder ?>">
                                        <input type="text" class="form-control" name="id" id="id" value="<?php echo $dtdetail->id; ?>" hidden />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 control-label">Nama Item</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" style="width: 100%;" name="barang" id="barang">
                                            <option value="">--Pilih--</option>
                                            <?php
                                            foreach ($dtampra as $row) {
                                            ?>
                                                <option value="<?php echo $row->kodeobat . "_" . $row->id; ?>" <?php if ($row->kodeobat == $dtdetail->kodeobat) echo "selected"; ?>><?php echo $row->namaobat; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 control-label">Qty. Ampra</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control text-right" name="qtya" id="qtya" value="<?php echo $dtdetail->qtyampra; ?>" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 control-label">Satuan</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" style="width: 100%;" name="sat" id="sat">
                                            <option value="-">-- Pilih --</option>
                                            <?php
                                            foreach ($dtsatuan as $row) {
                                            ?>
                                                <option value="<?php echo $row->satuanobat; ?>" <?php if ($row->satuanobat == $dtdetail->satuan) echo "selected"; ?>><?php echo $row->satuanobat; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row" hidden>
                                    <label class="col-sm-4 control-label">Pendanaan</label>
                                    <div class="col-sm-3">
                                        <select class="form-control" style="width: 100%;" name="guna" id="guna">
                                            <option value="">--Pilih--</option>
                                            <option value="BPJS" <?php if ($dtdetail->penggunaan == "BPJS") echo "selected"; ?>>BPJS</option>
                                            <option value="UMUM" <?php if ($dtdetail->penggunaan == "UMUM") echo "selected"; ?>>UMUM</option>
                                            <option value="HIBAH" <?php if ($dtdetail->penggunaan == "HIBAH") echo "selected"; ?>>HIBAH</option>
                                            <option value="LAINNYA" <?php if ($dtdetail->penggunaan == "LAINNYA") echo "selected"; ?>>LAINNYA</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row text-right">
                                    <a id="simpan" class="btn btn-danger text-light">Ubah</a>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div>
            <!-- </div> -->
        <!-- </div>
    </div> -->
    <script>
        function modalform() {
            $("#kotakform").append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
        }

        function modalformtutup() {
            $(".overlay").remove();
        }

        function tanggalbaru() {
            $("#tgl").prop("disabled", false);
            $('#tgl').datepicker({
                autoclose: true
            }).datepicker("setDate", "0");
        }

        $(document).ready(function() {
            $('#barang').select2();
            $('#sat').select2();
            var tgl_order = new Date("<?php echo $dtdetail->tglorder; ?>");
            $('#tgl').datepicker({
                autoclose: true,
                dateFormat: "mm/dd/yyyy"
            }).datepicker("setDate", tgl_order);

            $("#simpan").click(function(e) {
                modalform();
                var id = document.getElementById("id").value;
                var tgl = document.getElementById("tgl").value;
                var barang = $("#barang").val();
                var barangtext = $("#barang option:selected").text();
                var qtya = document.getElementById("qtya").value;
                var satuan = $("#sat").val();
                var satuantext = $("#sat option:selected").text();
                var guna = $("#guna").val();
                var gunatext = $("#guna option:selected").text();

                $.ajax({
                    url: "<?php echo site_url(); ?>/ampra/ubahamprabhp",
                    type: "GET",
                    data: {
                        id: id,
                        tgl: tgl,
                        barang: barang,
                        barangtext: barangtext,
                        qtya: qtya,
                        satuan: satuan,
                        satuantext: satuantext,
                        guna: guna,
                        gunatext: gunatext
                    },
                    success: function(ajaxData) {
                        var dt = JSON.parse(ajaxData);
                        console.log(dt);
                        if (dt.stat.sukses == true) {
                            $("#tableampra").html(dt.dtview);
                            modalformtutup();
                            tutupmodal();
                            tglaktif = tgl;
                            detailbydate();
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
}
?>