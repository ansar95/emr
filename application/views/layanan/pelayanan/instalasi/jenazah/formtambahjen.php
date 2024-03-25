<?php
if ($formpilih == 0) {
?>
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <!-- <div class="box box-default box-solid" id="proseskotak"> -->
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Forensik</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row col-spacing-row">
                    <label for="username" class="col-sm-3 col-form-label">No. RM</label>
                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="rm" id="rm" placeholder="No. RM">
                    </div>
                </div>
                <div class="form-group row col-spacing-row">
                    <label for="username" class="col-sm-3 col-form-label">Nama Pasien</label>
                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="nmpas" id="nmpas" disabled>
                    </div>
                </div>
                <div class="form-group row col-spacing-row">
                    <label for="username" class="col-sm-3 col-form-label">Dari Unit</label>
                    <div class="col-sm-9">
                                        <select class="form-control" style="width: 100%;" name="unitdepan" type="text" id="unitdepan">
                        </select>
                    </div>
                </div>
                <div class="form-group row col-spacing-row">
                    <label for="username" class="col-sm-3 col-form-label">Golongan</label>
                    <div class="col-sm-9">
                                        <input type="text" class="form-control pull-right" id="gol" name="gol" disabled>
                    </div>
                </div>
                <div class="form-group row col-spacing-row">
                    <label for="username" class="col-sm-3 col-form-label">Tanggal</label>
                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="instgl" id="instgl">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button id="simpanpasien" class="btn btn-primary">Save changes</button>
            </div>
            <!-- </div> -->
        </div>
    </div>
    <script>
        function modalload() {
            $("#kotakform").append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
        }

        function modalloadtutup() {
            $(".overlay").remove();
        }

        function suksesalert() {
            $.notify("Sukses Input Data", "success");
        }

        function gagalalert() {
            $.notify("Gagal Input Data", "error");
        }

        $(function() {
            $('#unitdepan').select2({
                tags: true
            });
            $('#dpengirim').select2({
                tags: true
            });
            $('#dpemeriksa').select2({
                tags: true
            });
            $('#instgl').datepicker({
                autoclose: true
            }).datepicker("setDate", "0");
        });

        $(document).ready(function() {

            var dataunit;
            var dataadd;

            $("#rm").on('input', function(e) {
                var rm = $("#rm").val();
                $.ajax({
                    url: "<?php echo site_url(); ?>/ijenazah/caridatarm",
                    type: "GET",
                    data: {
                        rm: rm
                    },
                }).then(function(data) {
                    $("#unitdepan option").remove();
                    var t = JSON.parse(data);
                    dataunit = t;
                    $("#nmpas").val(t[0].nama_pasien);
                    t.forEach(function(entry) {
                        var option = new Option(entry.nama_unit, entry.kode_unit, true, true);
                        $('#unitdepan').append(option).trigger('change');
                    });
                });
            });

            $("#unitdepan").change(function(e) {
                var dtunit = $("#unitdepan option:selected").text();
                dataunit.forEach(function(entry) {
                    if (entry.nama_unit == dtunit) {
                        $("#gol").val(entry.golongan);

                        dataadd = [entry.notransaksi, entry.kode_unit, entry.nama_unit];
                    }
                });
            });

            $("#simpanpasien").click(function(e) {
                e.preventDefault();
                // modalload();
                var nmpas = document.getElementById("nmpas").value;
                var rm = document.getElementById("rm").value;
                var gol = document.getElementById("gol").value;

                var kdunit = $("#kdunit").val();
                var unit = $("#kdunit option:selected").text();

                var unitasal = $("#unitdepan").val();
                var unitasaltext = $("#unitdepan option:selected").text();

                var dpengirim = ""; //$("#dpengirim").val();
                var dpengirimtext = ""; //$("#dpengirim option:selected").text();
                var dpemeriksa = ""; //$("#dpemeriksa").val();
                var dpemeriksatext = ""; //$("#dpemeriksa option:selected").text();
                var instgl = document.getElementById("instgl").value;

                // console.log(dataadd);
                // if ((tdtgl == "") && (tdjam == "") && (tddokter == "") && (tdtindakan == "") && (tdjml == "")) {
                // 	modalloadtutup();
                // 	return;
                // }
                $.ajax({
                    url: "<?php echo site_url(); ?>/Ijenazah/simpanregisinstalasijen",
                    type: "GET",
                    data: {
                        nmpas: nmpas,
                        dataadd: dataadd,
                        rm: rm,
                        gol: gol,
                        unitasal: unitasal,
                        unitasaltext: unitasaltext,
                        dpengirim: dpengirim,
                        dpengirimtext: dpengirimtext,
                        dpemeriksa: dpemeriksa,
                        dpemeriksatext: dpemeriksatext,
                        instgl: instgl,
                        kdunit: kdunit,
                        unit: unit
                    },
                    success: function(ajaxData) {
                        var t = $.parseJSON(ajaxData);

                        if (t.stat == true) {
                            suksesalert();
                            modalloadtutup();
                            tutupmodal(t.dtnotrans);
                            document.getElementById("caridata").click();
                        } else {
                            gagalalert();
                            modalloadtutup();
                        }
                    }
                });
            });

        });
    </script>
<?php
} else if ($formpilih == 1) {
?>
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <!-- <div class="box box-default box-solid" id="proseskotak"> -->
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ubah Data Forensik</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><b><?php echo $dt->nama_unit; ?></b></p>
                <div class="form-group row col-spacing-row">
                    <label for="username" class="col-sm-3 col-form-label">No. RM</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="rm" id="rm" placeholder="No. RM" disabled value="<?php echo $dt->no_rm; ?>">
                    </div>
                </div>
                <div class="form-group row col-spacing-row">
                    <label for="username" class="col-sm-3 col-form-label">Nama Pasien</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="nmpas" id="nmpas" disabled value="<?php echo $dt->nama_pasien; ?>">
                    </div>
                </div>
                <div class="form-group row col-spacing-row">
                    <label for="username" class="col-sm-3 col-form-label">Dari Unit</label>
                    <div class="col-sm-9">
                        <select class="form-control" style="width: 100%;" name="unitdepan" disabled type="text" id="unitdepan">
                        </select>
                    </div>
                </div>
                <div class="form-group row col-spacing-row">
                    <label for="username" class="col-sm-3 col-form-label">Golongan</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control pull-right" id="gol" name="gol" disabled value="<?php echo $dt->golongan; ?>">
                    </div>
                </div>
                <div class="form-group row col-spacing-row">
                    <label for="username" class="col-sm-3 col-form-label">Tanggal Masuk</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="tgli" id="tgli" value="<?php echo $dt->tanggal; ?>" autocomplete="OFF">
                    </div>
                </div>
                <div class="form-group row col-spacing-row">
                    <label for="username" class="col-sm-3 col-form-label">Tanggal Keluar</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="tgl_ambil" id="tgl_ambil" value="<?php echo $dt->tgl_ambil; ?>" autocomplete="OFF">
                    </div>
                </div>
                <div class="form-group row col-spacing-row">
                    <label for="username" class="col-sm-3 col-form-label"></label>
                    <div class="col-sm-9">
                        <small>(Jenazah Diambil/Pengambilan Hasil/Pengambilan Surat Keterangan)</small>
                    </div>
                </div>
                <div class="form-group row col-spacing-row">
                    <label for="username" class="col-sm-3 col-form-label">Tanggal Bayar</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="tgl_bayar" id="tgl_bayar" value="<?php echo $dt->tgl_bayar; ?>" autocomplete="OFF">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button onclick="ubahdata(<?php echo $dt->id; ?>)" class="btn btn-primary">Ubah</button>
            </div>
            <!-- </div> -->
        </div>
    </div>

    <script>
        function modalload() {
            $("#kotakform").append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
        }

        function modalloadtutup() {
            $(".overlay").remove();
        }

        function suksesalert() {
            $.notify("Sukses Input Data", "success");
        }

        function gagalalert() {
            $.notify("Gagal Input Data", "error");
        }

        $(function() {
            // $('#tgli').datepicker({ autoclose: true }).datepicker();
            $('#tgli').datepicker({
                autoclose: true
            }).datepicker();
            $('#tgl_ambil').datepicker({
                autoclose: true
            }).datepicker();
            $('#tgl_bayar').datepicker({
                autoclose: true
            }).datepicker();

            // $('#tgli').datepicker({ autoclose: true }).datepicker("setDate", "<?php echo date_format(date_create($dt->tanggal), "m/d/Y"); ?>");
            // $('#tgl_ambil').datepicker({ autoclose: true }).datepicker("setDate", "<?php echo date_format(date_create($dt->tgl_ambil), "m/d/Y"); ?>");
            // $('#tgl_bayar').datepicker({ autoclose: true }).datepicker("setDate", "<?php echo date_format(date_create($dt->tgl_bayar), "m/d/Y"); ?>");

        });

        $(document).ready(function() {

            var dataunit;
            var dataadd;
            //var rm = document.getElementById("rm").value;

            var rm = $("#rm").val();
            $.ajax({
                url: "<?php echo site_url(); ?>/ijenazah/caridatarm",
                type: "GET",
                data: {
                    rm: rm
                },
            }).then(function(data) {
                $("#unitdepan option").remove();
                var t = JSON.parse(data);
                dataunit = t;
                $("#nmpas").val(t[0].nama_pasien);
                t.forEach(function(entry) {
                    var option = new Option(entry.nama_unit, entry.kode_unit, true, true);
                    $('#unitdepan').append(option).trigger('change');
                });
            });

            $("#rm").on('input', function(e) {
                var rm = $("#rm").val();
                $.ajax({
                    url: "<?php echo site_url(); ?>/ijenazah/caridatarm",
                    type: "GET",
                    data: {
                        rm: rm
                    },
                }).then(function(data) {
                    $("#unitdepan option").remove();
                    var t = JSON.parse(data);
                    dataunit = t;
                    $("#nmpas").val(t[0].nama_pasien);
                    t.forEach(function(entry) {
                        var option = new Option(entry.nama_unit, entry.kode_unit, true, true);
                        $('#unitdepan').append(option).trigger('change');
                    });
                });
            });

            $("#unitdepan").change(function(e) {
                var dtunit = $("#unitdepan option:selected").text();
                dataunit.forEach(function(entry) {
                    if (entry.nama_unit == dtunit) {
                        $("#gol").val(entry.golongan);
                        dataadd = [entry.notransaksi, entry.kode_unitR, entry.nama_unitR];
                    }
                });
            });
        });


        function ubahdata(id) {
            var tgli = document.getElementById("tgli").value;
            var tgl_ambil = document.getElementById("tgl_ambil").value;
            var tgl_bayar = document.getElementById("tgl_bayar").value;
            console.log(tgli);
            console.log(tgl_ambil);
            $.ajax({
                url: "<?php echo site_url(); ?>/Ijenazah/ubahregisinstalasijen",
                type: "GET",
                data: {
                    id: id,
                    tgli: tgli,
                    tgl_ambil: tgl_ambil,
                    tgl_bayar: tgl_bayar
                },
                success: function(ajaxData) {
                    console.log(ajaxData);
                    var t = $.parseJSON(ajaxData);
                    if (t.stat == true) {
                        suksesalert();
                        modalloadtutup();
                        suksees();
                        $(function() {
                            $('#formmodal').modal('toggle');
                        });
                        document.getElementById("caridata").click();
                    } else {
                        gagalalert();
                        modalloadtutup();
                    }
                }
            });
        }
    </script>
<?php
}
?>