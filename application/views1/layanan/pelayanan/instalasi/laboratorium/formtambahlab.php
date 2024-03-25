<?php
if ($formpilih == 0) {
?>
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <!-- <div class="box box-default box-solid" id="proseskotak"> -->
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registrasi Pemeriksaan Laboratorium</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row col-spacing-row">
                    <label for="username" class="col-sm-3 col-form-label">Tanggal</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="instgl" id="instgl">
                    </div>
                </div>
                <div class="form-group row col-spacing-row">
                    <label for="username" class="col-sm-3 col-form-label">No. RM</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="rm" id="rm" placeholder="No. RM" autocomplete="off">
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
                        <sselect class="form-control" style="width: 100%;" name="unitdepan" type="text" id="unitdepan">
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
                    <label for="username" class="col-sm-3 col-form-label">Dokter Pengirim</label>
                    <div class="col-sm-9">
                        <select class="form-control prov" style="width: 100%;" name="dpengirim" id="dpengirim">
                            <?php
                            foreach ($dtdokterpengirim as $row) {
                            ?>
                                <option value="<?php echo $row->kode_dokter; ?>"><?php echo $row->nama_dokter; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row col-spacing-row">
                    <label for="username" class="col-sm-3 col-form-label">Dokter Penerima</label>
                    <div class="col-sm-9">
                        <select class="form-control prov" style="width: 100%;" name="dpemeriksa" id="dpemeriksa">
                            <?php
                            foreach ($dtdokterpemeriksa as $row) {
                            ?>
                                <option value="<?php echo $row->kode_dokter; ?>"><?php echo $row->nama_dokter; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row col-spacing-row">
                    <label for="username" class="col-sm-3 col-form-label">Analis</label>
                    <div class="col-sm-9">
                        <select class="form-control prov" style="width: 100%;" name="analis" id="analis">
                            <?php
                            foreach ($dtanalis as $row) {
                            ?>
                                <option value="<?php echo $row->kode_dokter; ?>"><?php echo $row->nama_dokter; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row col-spacing-row">
                    <label for="username" class="col-sm-3 col-form-label">Diagnosa</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="diagnosa" id="diagnosa" placeholder="Diagnosa" autocomplete="off">
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
            $('#analis').select2({
                tags: true
            });
        });

        $(document).ready(function() {

            var dataunit;
            var dataadd;

            $("#rm").on('input', function(e) {
                var rm = $("#rm").val();
                var tgli = $("#instgl").val();
                console.log(rm);
                console.log(tgli);
                // var tgli = document.getElementById("tgli").value;
                $.ajax({
                    url: "<?php echo site_url(); ?>/ilaboratorium/caridatarm",
                    type: "GET",
                    data: {
                        rm: rm,
                        tgli: tgli
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
                var unitdepan = document.getElementById("kdunit").value;
                var unitdepantext = document.getElementById("unit").value;
                var unitasal = $("#unitdepan").val();
                var dpengirim = $("#dpengirim").val();
                var dpengirimtext = $("#dpengirim option:selected").text();
                var dpemeriksa = $("#dpemeriksa").val();
                var dpemeriksatext = $("#dpemeriksa option:selected").text();
                var analis = $("#analis").val();
                var analistext = $("#analis option:selected").text();
                var instgl = document.getElementById("instgl").value;
                var diagnosa = document.getElementById("diagnosa").value;

                // console.log(dataadd);
                // if ((tdtgl == "") && (tdjam == "") && (tddokter == "") && (tdtindakan == "") && (tdjml == "")) {
                // 	modalloadtutup();
                // 	return;
                // }
                $.ajax({
                    url: "<?php echo site_url(); ?>/Ilaboratorium/simpanregisinstalasilab",
                    type: "GET",
                    data: {
                        nmpas: nmpas,
                        dataadd: dataadd,
                        rm: rm,
                        gol: gol,
                        unitdepan: unitdepan,
                        unitdepantext: unitdepantext,
                        dpengirim: dpengirim,
                        dpengirimtext: dpengirimtext,
                        dpemeriksa: dpemeriksa,
                        dpemeriksatext: dpemeriksatext,
                        analis: analis,
                        analistext: analistext,
                        unitasal: unitasal,
                        instgl: instgl,
                        diagnosa: diagnosa
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
                <h5 class="modal-title" id="exampleModalLabel">Edit Pasien Instalasi Laboratorium</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row col-spacing-row">
                    <label for="username" class="col-sm-3 col-form-label">Tanggal</label>
                    <div class="col-sm-9">
                        <!-- <?php $xtglnya = substr($dt->tanggal, 5, 2) . '/' . substr($dt->tanggal, 8, 2) . '/' . substr($dt->tanggal, 0, 4); ?> 
										<input type="text" class="form-control" name="tgli" id="tgli" value="<?php echo $xtglnya; ?>">  -->
                        <input type="text" class="form-control" name="tgli" id="tgli" disabled value="<?php echo $dt->tanggal; ?>">
                    </div>
                </div>
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
                        <select class="form-control" style="width: 100%;" name="unitdepan" type="text" id="unitdepan">
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
                    <label for="username" class="col-sm-3 col-form-label">Dokter Pengirim</label>
                    <div class="col-sm-9">
                        <select class="form-control prov" style="width: 100%;" name="dpengirim" id="dpengirim">
                            <?php
                            foreach ($dtdokterpengirim as $row) {
                            ?>
                                <option value="<?php echo $row->kode_dokter; ?>" <?php if ($dt->kode_dokter == $row->kode_dokter) {
                                                                                        echo "selected";
                                                                                    } ?>><?php echo $row->nama_dokter; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row col-spacing-row">
                    <label for="username" class="col-sm-3 col-form-label">Dokter Penerima</label>
                    <div class="col-sm-9">
                        <select class="form-control prov" style="width: 100%;" name="dpemeriksa" id="dpemeriksa">
                            <?php
                            foreach ($dtdokterpemeriksa as $row) {
                            ?>
                                <option value="<?php echo $row->kode_dokter; ?>" <?php if ($dt->kode_dokter_periksa == $row->kode_dokter) {
                                                                                        echo "selected";
                                                                                    } ?>><?php echo $row->nama_dokter; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row col-spacing-row">
                    <label for="username" class="col-sm-3 col-form-label">Analis</label>
                    <div class="col-sm-9">
                        <select class="form-control prov" style="width: 100%;" name="analis" id="analis">
                            <?php
                            foreach ($dtanalis as $row) {
                            ?>
                                <option value="<?php echo $row->kode_dokter; ?>" <?php if ($dt->kode_analis == $row->kode_dokter) {
                                                                                        echo "selected";
                                                                                    } ?>><?php echo $row->nama_dokter; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row col-spacing-row">
                    <label for="username" class="col-sm-3 col-form-label">Diagnosa</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="diagnosa" id="diagnosa" placeholder="Diagnosa" value="<?php echo $dt->diagnosa; ?>" autocomplete="off">
                    </div>
                </div>
                <div class="form-group row col-spacing-row">
                    <label for="username" class="col-sm-3 col-form-label">Tanggal Selesai</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="instgl_selesai" id="instgl_selesai" value="<?php echo $dt->tgl_selesai; ?>">
                    </div>
                    <label for="username" class="col-sm-3 col-form-label">Jam Selesai</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="tdwaktu_selesai" id="tdwaktu_selesai" value="<?php echo $dt->jam_selesai; ?>">
                    </div>
                </div>
                <div class="form-group row col-spacing-row">
                    <label for="username" class="col-sm-3 col-form-label">Tanggal Ambil Hasil</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="instgl_ambil" id="instgl_ambil" value="<?php echo $dt->tgl_ambil; ?>">
                    </div>
                    <label for="username" class="col-sm-3 col-form-label">Jam Ambil Hasil</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="tdwaktu_ambil" id="tdwaktu_ambil" value="<?php echo $dt->jam_ambil; ?>">
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
            $('#dpengirim').select2({
                tags: true
            });
            $('#dpemeriksa').select2({
                tags: true
            });
            $('#analis').select2({
                tags: true
            });
            $('#tgli').datepicker({
                autoclose: true
            }).datepicker();
            $('#instgl_selesai').datepicker({
                autoclose: true
            }).datepicker();
            $('#tdwaktu_selesai').timepicker({
                showInputs: false,
                minuteStep: 1,
                showMeridian: false
            });
            $('#instgl_ambil').datepicker({
                autoclose: true
            }).datepicker();
            $('#tdwaktu_ambil').timepicker({
                showInputs: false,
                minuteStep: 1,
                showMeridian: false
            });
        });

        $(document).ready(function() {

            var dataunit;
            var dataadd;
            //var rm = document.getElementById("rm").value;

            var rm = $("#rm").val();
            $.ajax({
                url: "<?php echo site_url(); ?>/ilaboratorium/caridatarm",
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
                var tgli = $("#tgli").val();

                console.log(rm);
                console.log(tgli);

                $.ajax({
                    url: "<?php echo site_url(); ?>/ilaboratorium/caridatarm",
                    type: "GET",
                    data: {
                        rm: rm,
                        tgli: tgli
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
            var dpengirim = $("#dpengirim").val();
            var dpengirimtext = $("#dpengirim option:selected").text();
            var dpemeriksa = $("#dpemeriksa").val();
            var dpemeriksatext = $("#dpemeriksa option:selected").text();
            var analis = $("#analis").val();
            var analistext = $("#analis option:selected").text();
            var tgli = document.getElementById("tgli").value;
            var tgl_selesai = document.getElementById("instgl_selesai").value;
            var tgl_ambil = document.getElementById("instgl_ambil").value;
            var jam_selesai = document.getElementById("tdwaktu_selesai").value;
            var jam_ambil = document.getElementById("tdwaktu_ambil").value;
            var diagnosa = document.getElementById("diagnosa").value;


            $.ajax({
                url: "<?php echo site_url(); ?>/Ilaboratorium/ubahregisinstalasilab",
                type: "GET",
                data: {
                    id: id,
                    dpengirim: dpengirim,
                    dpengirimtext: dpengirimtext,
                    dpemeriksa: dpemeriksa,
                    dpemeriksatext: dpemeriksatext,
                    analis: analis,
                    analistext: analistext,
                    tgli: tgli,
                    tgl_selesai: tgl_selesai,
                    tgl_ambil: tgl_ambil,
                    jam_selesai: jam_selesai,
                    jam_ambil: jam_ambil,
                    diagnosa: diagnosa
                },

                success: function(ajaxData) {
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