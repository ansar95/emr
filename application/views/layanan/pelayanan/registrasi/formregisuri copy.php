<?php
if ($formpilih == 0) {
?>
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <!-- <div class="box box-default box-solid" id="proseskotak"> -->
            <div class="modal-header p-1 pl-3 align-text-bottom">
                <b class="modal-title" id="exampleModalLabel">Registrasi Unit Rawat Inap</b>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <b class="card-title mb-3">Data Pasien</b>
                <form>
                    <div class="row spacing-row">
                        <div class="col-md-4">
                            <div class="row form-group">
                                <label class="col-sm-4 col-form-label text-right">No. RM</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="rm" id="rm" value="<?php echo $dtpasien->no_rm; ?>" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row form-group">
                                <label class="col-sm-4 col-form-label text-right">Golongan</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" value="<?php echo $dtpasien->golongan; ?>" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row form-group">
                                <label class="col-sm-4 col-form-label text-right">No. Kartu*</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" value="<?php echo $dtpasien->no_askes; ?>" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row spacing-row">
                        <div class="col-md-4">
                            <div class="row form-group">
                                <label class="col-sm-4 col-form-label text-right">Nama</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" value="<?php echo $dtpasien->nama_pasien; ?>" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row form-group">
                                <label class="col-sm-4 col-form-label text-right">Asuransi</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" value="<?php echo $dtpasien->asuransi; ?>" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row spacing-row">
                        <div class="col-md-4">
                            <div class="row form-group">
                                <label class="col-sm-4 col-form-label text-right">Alamat</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" value="<?php echo $dtpasien->alamat; ?>" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row form-group">
                                <label class="col-sm-4 col-form-label text-right">Hak Kelas</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" value="<?php echo $dtpasien->kelashak; ?>" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">

                        </div>
                    </div>
                </form>
                <br>
                <b class="card-title mt-2 mb-3">Registrasi</b>
                <form>
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="row form-group col-spacing-row">
                                <label class="col-sm-3 col-form-label">Tgl. Masuk</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="tglmasuk" id="tglmasuk">
                                </div>
                            </div>
                            <div class="row form-group col-spacing-row">
                                <label class="col-sm-3 col-form-label">Jam Masuk</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="jammasuk" id="jammasuk">
                                </div>
                            </div>
                            <!-- <div class="row form-group col-spacing-row">
                                <label class="col-sm-3 col-form-label">Kunjungan</label>
                                <div class="col-sm-9">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" class="custom-control-input" name="kunjungan" id="kunjungan1" value="2" checked>
                                        <label class="custom-control-label" for="kunjungan1">Lama</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" class="custom-control-input" name="kunjungan" id="kunjungan2" value="1">
                                        <label class="custom-control-label" for="kunjungan2">Baru</label>
                                    </div>
                                </div>
                            </div> -->
                            <div class="row form-group col-spacing-row">
                                <label class="col-sm-3 col-form-label">Tujuan Rawat</label>
                                <div class="col-sm-9">
                                    <select class="form-control" style="width: 100%;" name="tp" id="tp">
                                        <option value="-">-- pilih --</option>
                                        <?php
                                        foreach ($tujuanperawatan as $row) {
                                        ?>
                                            <option value="<?php echo $row->kode_unit; ?>"><?php echo $row->nama_unit; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group col-spacing-row">
                                <label class="col-sm-3 col-form-label">Kamar Rawat</label>
                                <div class="col-sm-9">
                                    <select class="form-control" style="width: 100%;" name="kp" id="kp">
                                        <?php
                                        foreach ($kamarperawatan as $row) {
                                        ?>
                                            <option value="<?php echo $row->kode_unit; ?>"><?php echo $row->nama_unit; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group col-spacing-row">
                                <label class="col-sm-3 col-form-label">Penjamin</label>
                                <div class="col-sm-9">
                                    <select class="form-control" style="width: 100%;" name="gol" id="gol" onchange="changegol(1);">
                                        <?php
                                        foreach ($golongan as $row) {
                                        ?>
                                            <option value="<?php echo $row->golongan; ?>" <?php if ($dtpasien->golongan == $row->golongan) {
                                                                                                echo "selected";
                                                                                            } ?>><?php echo $row->golongan; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group col-spacing-row">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    <select class="form-control" style="width: 100%;" name="goldet" id="goldet">
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group col-spacing-row">
                                <label class="col-sm-3 col-form-label">Rujukan</label>
                                <div class="col-sm-9">
                                    <select class="form-control" style="width: 100%;" name="rujukan" id="rujukan">
                                        <?php
                                        foreach ($rujukan as $row) {
                                        ?>
                                            <option value="<?php echo $row->rujukan; ?>"><?php echo $row->rujukan; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group col-spacing-row">
                                <label class="col-sm-3 col-form-label">Faskes</label>
                                <div class="col-sm-9">
                                    <select class="form-control" style="width: 100%;" name="faskes" id="faskes">
                                        <?php
                                        foreach ($dtfaskes as $row) {
                                        ?>
                                            <option value="<?php echo $row->kode_faskes; ?>"><?php echo $row->faskes; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group col-spacing-row">
                                <label class="col-sm-3 col-form-label">Cara Masuk</label>
                                <div class="col-sm-9">
                                    <select class="form-control" style="width: 100%;" name="cm" id="cm">
                                        <option value="LOKET">LOKET</option>
                                        <option value="POLI">POLI</option>
                                        <option value="UGD">UGD</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group col-spacing-row">
                                <label class="col-sm-3 col-form-label">Rujukan Dokter</label>
                                <div class="col-sm-9">
                                    <select class="form-control" style="width: 100%;" name="dokterluar" id="dokterluar">
                                        <?php
                                        foreach ($dtdokterluar as $row) {
                                        ?>
                                            <option value="<?php echo $row->kode; ?>"><?php echo $row->nama; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="row form-group col-spacing-row">
                                <label class="col-sm-3 col-form-label">Tgl. Rujukan</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="tglrujuk" id="tglrujuk">
                                </div>
                            </div>
                            <div class="row form-group col-spacing-row">
                                <label class="col-sm-3 col-form-label">Keluhan Awal</label>
                                <div class="col-sm-9">
                                    <textarea rows="3" class="form-control" name="keluhan" id="keluhan"></textarea>
                                </div>
                            </div>
                            <div class="row form-group col-spacing-row">
                                <label class="col-sm-3 col-form-label">Jenis Pelayanan</label>
                                <div class="col-sm-9">
                                    <select class="form-control" style="width: 100%;" name="jp" id="jp">
                                        <?php
                                        foreach ($jnspelayanan as $row) {
                                        ?>
                                            <option value="<?php echo $row->jenislayanan; ?>"><?php echo $row->jenislayanan; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group col-spacing-row">
                                <label class="col-sm-3 col-form-label">Diagnosa</label>
                                <div class="col-sm-9">
                                    <select class="form-control" style="width: 100%;" name="icd" id="icd">
                                        <?php
                                        foreach ($dticd as $row) {
                                        ?>
                                            <option value="<?php echo $row->icd_code; ?>"><?php echo $row->icd_code . " - " . $row->jenis_penyakit_local; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group col-spacing-row">
                                <label class="col-sm-3 col-form-label">No. SEP</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="sep" id="sep">
                                </div>
                            </div>
                            <div class="row form-group col-spacing-row">
                                <label class="col-sm-3 col-form-label">DPJP</label>
                                <div class="col-sm-9">
                                    <select class="form-control" style="width: 100%;" name="dokter" id="dokter">
                                        <?php
                                        foreach ($dtdokter as $row) {
                                        ?>
                                            <option value="<?php echo $row->kode_dokter; ?>"><?php echo $row->nama_dokter; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group col-spacing-row">
                                <label class="col-sm-3 col-form-label">Catatan</label>
                                <div class="col-sm-9">
                                    <textarea rows="3" class="form-control" name="cat" id="cat"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <div class="col-12 text-right">
                        <button id="simpanregis" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
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
            $.notify("Gagal Proses Data", "error");
        }

        function kuranglengkap() {
            $.notify("Data Kurang Lengkap", "error");
        }

        $(function() {
            $('select').select2({
                tags: true
            });
            $('#tglmasuk').datepicker({
                autoclose: true,
                dateFormat: 'dd-mm-yy',
                changeMonth: true,
                changeYear: true,
                yearRange: "-100:+00"
            }).datepicker("setDate", "0");
            $('#tglrujuk').datepicker({
                autoclose: true,
                dateFormat: 'dd-mm-yy',
                changeMonth: true,
                changeYear: true,
                yearRange: "-100:+00"
            }).datepicker("setDate", "0");
            $('#jammasuk').timepicker({
                showInputs: false,
                minuteStep: 1,
                showMeridian: false
            })
            $('#tp').select2({
                tags: true
            });
            $('#kp').select2({
                tags: true
            });
            // $('#gol').select2({ tags :true });
            // $('#rujukan').select2({ tags :true });
            $('#jp').select2({
                tags: true
            });
            $('#icd').select2({
                placeholder: 'Enter ICD',
                minimumInputLength: 3,
                allowClear: true,
                ajax: {
                    url: "<?php echo site_url(); ?>/registrasipasien/cariicd",
                    dataType: 'json',
                    data: function(params) {
                        var query = {
                            search: params.term,
                            type: 'public'
                        }
                        return query;
                    },
                    processResults: function(data) {
                        return {
                            results: data.items
                        };
                    }
                }
            });
            $('#dokter').select2({
                tags: true
            });
            // $('#gol').select2({ tags :true });
            // $('#asp').select2({ tags :true });
            // $('#kh').select2({ tags :true });
            $('#dokterluar').select2({
                tags: true
            });

            changegol(0);
        });

        function changegol(status) {
            $.getJSON('<?php echo site_url(); ?>/registrasipasien/cariasuransi/' + $("#gol").val(), function(data) {
                var temp = [];
                $.each(data, function(key, value) {
                    temp.push({
                        v: value,
                        k: key
                    });
                });
                temp.sort(function(a, b) {
                    if (a.v > b.v) {
                        return 1
                    }
                    if (a.v < b.v) {
                        return -1
                    }
                    return 0;
                });
                $('#goldet').empty();
                $('#goldet').append('<option value="0">--Pilih--</option>');
                $.each(temp, function(key, obj) {
                    if (status == 0) {
                        $('#goldet').append('<option value="' + obj.k + '">' + obj.v + '</option>');
                    } else {
                        $('#goldet').append('<option value="' + obj.k + '">' + obj.v + '</option>');
                    }
                });
            });
        }

        $(document).ready(function() {
            $("#tp").change(function(e) {
                var tp = $("#tp").val();
                $.ajax({
                    url: "<?php echo site_url(); ?>/registrasipasien/ambilkelasdariunit",
                    type: "GET",
                    data: {
                        unit: tp
                    },
                }).then(function(data) {
                    $("#kp option").remove();
                    var t = JSON.parse(data);
                    t.forEach(function(entry) {
                        var option = new Option(entry.nama_kamar, entry.kode_kamar, true, true);
                        $('#kp').append(option).trigger('change');
                    });
                });
            });

            $("#simpanregis").click(function(e) {
                var rm = document.getElementById("rm").value;
                var tglmasuk = document.getElementById("tglmasuk").value;
                var jammasuk = document.getElementById("jammasuk").value;
                // var kunjungan = $("input[name='kunjungan']:checked").val();
                var kunjungan = 0;
                var tp = $("#tp").val();
                var tptext = $("#tp option:selected").text();
                var kp = $("#kp").val();
                var kptext = $("#kp option:selected").text();
                var gol = $("#gol").val();
                var goltext = $("#gol option:selected").text();
                var goldet = $("#goldet").val();
                var goldettext = $("#goldet option:selected").text();
                var rujukan = $("#rujukan").val();
                var rujukantext = $("#rujukan option:selected").text();
                var tglrujuk = document.getElementById("tglrujuk").value;
                var sep = document.getElementById("sep").value;
                var jp = $("#jp").val();
                var jptext = $("#jp option:selected").text();
                var icd = $("#icd").val();
                var icdtext = $("#icd option:selected").text();
                var cat = $("#cat").val();
                var dokter = $("#dokter").val();
                var doktertext = $("#dokter option:selected").text();
                var dokterluar = $("#dokterluar").val();
                var dokterluartext = $("#dokterluar option:selected").text();
                var keluhan = $("#keluhan").val();
                var cm = $("#cm").val();
                if ((gol == '') || (gol == null) || (goldet == '') || (goldet == null)) {
                    kuranglengkap;
                    return;
                }
                modalload;
                $.ajax({
                    url: "<?php echo site_url(); ?>/registrasipasien/simpanregisuri",
                    type: "GET",
                    data: {
                        rm: rm,
                        tglmasuk: tglmasuk,
                        jammasuk: jammasuk,
                        kunjungan: kunjungan,
                        tp: tp,
                        tptext: tptext,
                        kp: kp,
                        kptext: kptext,
                        gol: gol,
                        goltext: goltext,
                        goldet: goldet,
                        goldettext: goldettext,
                        rujukan: rujukan,
                        rujukantext: rujukantext,
                        tglrujuk: tglrujuk,
                        sep: sep,
                        jp: jp,
                        jptext: jptext,
                        icd: icd,
                        icdtext: icdtext,
                        dokter: dokter,
                        doktertext: doktertext,
                        dokterluar: dokterluar,
                        dokterluartext: dokterluartext,
                        keluhan: keluhan,
                        cat: cat,
                        cm: cm
                    },
                    success: function(ajaxData) {
                        var t = JSON.parse(ajaxData);
                        if (t.stat == true) {
                            suksesalert();
                            modalloadtutup();
                            tutupmodal(t.dtnotrans);
                        } else if (t.stat == "ada") {
                            gagalalert();
                            modalloadtutup();
                            tutupmodalada();
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
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <!-- <div class="box box-default box-solid" id="proseskotak"> -->
            <div class="modal-header p-1 pl-3 align-text-bottom">
                <b class="modal-title" id="exampleModalLabel">Edit Registrasi Unit Rawat Inap</b>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <b class="card-title mb-3">Data Pasien</b>
                <form>
                    <div class="row spacing-row">
                        <div class="col-md-4">
                            <div class="row form-group">
                                <label class="col-sm-4 col-form-label text-right">No. RM</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="rm" id="rm" value="<?php echo $dtpasien->no_rm; ?>" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row form-group">
                                <label class="col-sm-4 col-form-label text-right">Golongan</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" value="<?php echo $dtpasien->golongan; ?>" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row form-group">
                                <label class="col-sm-4 col-form-label text-right">No. Kartu*</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" value="<?php echo $dtpasien->no_askes; ?>" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row spacing-row">
                        <div class="col-md-4">
                            <div class="row form-group">
                                <label class="col-sm-4 col-form-label text-right">Nama</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" value="<?php echo $dtpasien->nama_pasien; ?>" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row form-group">
                                <label class="col-sm-4 col-form-label text-right">Asuransi</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" value="<?php echo $dtpasien->asuransi; ?>" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row spacing-row">
                        <div class="col-md-4">
                            <div class="row form-group">
                                <label class="col-sm-4 col-form-label text-right">Alamat</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" value="<?php echo $dtpasien->alamat; ?>" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row form-group">
                                <label class="col-sm-4 col-form-label text-right">Hak Kelas</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" value="<?php echo $dtpasien->kelashak; ?>" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">

                        </div>
                    </div>
                </form>
                <br>
                <b class="card-title mt-2 mb-3">Registrasi</b>
                <form>
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="row form-group col-spacing-row">
                                <label class="col-sm-3 col-form-label">Tgl. Masuk</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="tglmasuk" id="tglmasuk" value="<?php echo date('d-m-Y', strtotime($regis->tgl_masuk)); ?>">
                                </div>
                            </div>
                            <div class="row form-group col-spacing-row">
                                <label class="col-sm-3 col-form-label">Jam Masuk</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="jammasuk" id="jammasuk" value="<?php echo $regis->jam_masuk; ?>">
                                </div>
                            </div>
                            <div class="row form-group col-spacing-row">
                                <label class="col-sm-3 col-form-label">Tujuan Rawat</label>
                                <div class="col-sm-9">
                                    <select class="form-control" style="width: 100%;" name="tp" id="tp">
                                        <?php
                                        foreach ($tujuanperawatan as $row) {
                                        ?>
                                            <option value="<?php echo $row->kode_unit; ?>" <?php if ($regisdetail->kode_unit == $row->kode_unit) echo 'selected'; ?>><?php echo $row->nama_unit; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group col-spacing-row">
                                <label class="col-sm-3 col-form-label">Kamar Rawat</label>
                                <div class="col-sm-9">
                                    <select class="form-control" style="width: 100%;" name="kp" id="kp">
                                        <?php
                                        foreach ($dtkamar as $row) {
                                        ?>
                                            <option value="<?php echo $row->kode_kamar; ?>" <?php if ($regisdetail->kode_kamar == $row->kode_kamar) echo "selected"; ?>><?php echo $row->nama_kamar; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group col-spacing-row">
                                <label class="col-sm-3 col-form-label">Penjamin</label>
                                <div class="col-sm-9">
                                    <select class="form-control" style="width: 100%;" name="gol" id="gol" onchange="changegol(1);">
                                        <option value="">--Pilih--</option>
                                        <?php
                                        foreach ($golongan as $row) {
                                        ?>
                                            <option value="<?php echo $row->golongan; ?>" <?php if ($regis->golongan == $row->golongan) echo "selected"; ?>><?php echo $row->golongan; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group col-spacing-row">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    <select class="form-control" style="width: 100%;" name="goldet" id="goldet">
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group col-spacing-row">
                                <label class="col-sm-3 col-form-label">Rujukan</label>
                                <div class="col-sm-9">
                                    <select class="form-control" style="width: 100%;" name="rujukan" id="rujukan">
                                        <?php
                                        foreach ($rujukan as $row) {
                                        ?>
                                            <option value="<?php echo $row->rujukan; ?>" <?php if ($regis->rujukan == $row->rujukan) echo 'selected'; ?>><?php echo $row->rujukan; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group col-spacing-row">
                                <label class="col-sm-3 col-form-label">Faskes</label>
                                <div class="col-sm-9">
                                    <select class="form-control" style="width: 100%;" name="faskes" id="faskes">
                                        <?php
                                        foreach ($dtfaskes as $row) {
                                        ?>
                                            <option value="<?php echo $row->kode_faskes; ?>" <?php if ($regis->ppkrujukan == $row->kode_faskes) echo 'selected'; ?>><?php echo $row->faskes; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group col-spacing-row">
                                <label class="col-sm-3 col-form-label">Cara Masuk</label>
                                <div class="col-sm-9">
                                    <select class="form-control" style="width: 100%;" name="cm" id="cm">
                                        <option value="LOKET" <?php if ($regis->cara_masuk == "LOKET") echo 'selected'; ?>>LOKET</option>
                                        <option value="POLI" <?php if ($regis->cara_masuk == "POLI") echo 'selected'; ?>>POLI</option>
                                        <option value="UGD" <?php if ($regis->cara_masuk == "UGD") echo 'selected'; ?>>UGD</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group col-spacing-row">
                                <label class="col-sm-3 col-form-label">Rujukan Dokter</label>
                                <div class="col-sm-9">
                                    <select class="form-control" style="width: 100%;" name="dokterluar" id="dokterluar">
                                        <?php
                                        foreach ($dtdokterluar as $row) {
                                        ?>
                                            <option value="<?php echo $row->kode; ?>" <?php if ($regis->kode_dokter_luar == $row->kode) echo 'selected'; ?>><?php echo $row->nama; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="row form-group col-spacing-row">
                                <label class="col-sm-3 col-form-label">Tgl. Rujukan</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="tglrujuk" id="tglrujuk">
                                </div>
                            </div>
                            <div class="row form-group col-spacing-row">
                                <label class="col-sm-3 col-form-label">Keluhan Awal</label>
                                <div class="col-sm-9">
                                    <textarea rows="3" class="form-control" name="keluhan" id="keluhan"><?php echo $regis->keluhanawal; ?></textarea>
                                </div>
                            </div>
                            <div class="row form-group col-spacing-row">
                                <label class="col-sm-3 col-form-label">Jenis Pelayanan</label>
                                <div class="col-sm-9">
                                    <select class="form-control" style="width: 100%;" name="jp" id="jp">
                                        <?php
                                        foreach ($jnspelayanan as $row) {
                                        ?>
                                            <option value="<?php echo $row->jenislayanan; ?>" <?php if ($regis->jenislayanan == $row->jenislayanan) echo 'selected'; ?>><?php echo $row->jenislayanan; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group col-spacing-row">
                                <label class="col-sm-3 col-form-label">Diagnosa</label>
                                <div class="col-sm-9">
                                    <select class="form-control" style="width: 100%;" name="icd" id="icd">
                                        <?php
                                        foreach ($dticd as $row) {
                                        ?>
                                            <option value="<?php echo $row->icd_code; ?>" <?php if ($regis->diagawal == $row->icd_code) echo 'selected'; ?>><?php echo $row->icd_code . " - " . $row->jenis_penyakit_local; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group col-spacing-row">
                                <label class="col-sm-3 col-form-label">No. SEP</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="sep" id="sep" disabled value="<?php echo $regis->nosep ?>">
                                </div>
                            </div>
                            <div class="row form-group col-spacing-row">
                                <label class="col-sm-3 col-form-label">DPJP</label>
                                <div class="col-sm-9">
                                    <select class="form-control" style="width: 100%;" name="dokter" id="dokter">
                                        <?php
                                        foreach ($dtdokter as $row) {
                                        ?>
                                            <option value="<?php echo $row->kode_dokter; ?>" <?php if ($regis->kode_dokter == $row->kode_dokter) echo 'selected'; ?>><?php echo $row->nama_dokter; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group col-spacing-row">
                                <label class="col-sm-3 col-form-label">Catatan</label>
                                <div class="col-sm-9">
                                    <textarea rows="3" class="form-control" name="cat" id="cat"><?php echo $regis->catatan; ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <div class="col-12 text-right">
                        <button onclick="ubah(<?php echo $regis->id ?>)" class="btn btn-primary">Ubah</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var datadetail = "<?php echo $regisdetail->id; ?>"

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
            $.notify("Gagal Proses Data", "error");
        }
        $(function() {
            $('select').select2({
                tags: true
            });
            $('#tglmasuk').datepicker({
                autoclose: true,
                dateFormat: 'dd-mm-yy',
                changeMonth: true,
                changeYear: true,
                yearRange: "-100:+00"
            }).datepicker("setDate", "0");
            $('#tglrujuk').datepicker({
                autoclose: true,
                dateFormat: 'dd-mm-yy',
                changeMonth: true,
                changeYear: true,
                yearRange: "-100:+00"
            }).datepicker("setDate", "0");
            $('#jammasuk').timepicker({
                showInputs: false,
                minuteStep: 1,
                showMeridian: false
            })
            $('#tp').select2({
                tags: true
            });
            $('#kp').select2({
                tags: true
            });
            // $('#gol').select2({ tags :true });
            // $('#rujukan').select2({ tags :true });
            $('#jp').select2({
                tags: true
            });
            $('#icd').select2({
                placeholder: 'Enter ICD',
                minimumInputLength: 3,
                allowClear: true,
                ajax: {
                    url: "<?php echo site_url(); ?>/registrasipasien/cariicd",
                    dataType: 'json',
                    data: function(params) {
                        var query = {
                            search: params.term,
                            type: 'public'
                        }
                        return query;
                    },
                    processResults: function(data) {
                        return {
                            results: data.items
                        };
                    }
                }
            });
            $('#dokter').select2({
                tags: true
            });
            // $('#gol').select2({ tags :true });
            // $('#asp').select2({ tags :true });
            // $('#kh').select2({ tags :true });
            $('#tglmasuk').datepicker({
                autoclose: true,
                dateFormat: 'dd-mm-yy',
                changeMonth: true,
                changeYear: true,
                yearRange: "-100:+00"
            }).datepicker("setDate", "<?php echo date_format(date_create($regis->tgl_masuk), "d-m-Y"); ?>");
            $('#tglrujuk').datepicker({
                autoclose: true,
                dateFormat: 'dd-mm-yy',
                changeMonth: true,
                changeYear: true,
                yearRange: "-100:+00"
            }).datepicker("setDate", "<?php echo date_format(date_create($regis->tglrujukan), "d-m-Y"); ?>");

            changegol(0);
        });

        function changegol(status) {
            $.getJSON('<?php echo site_url(); ?>/registrasipasien/cariasuransi/' + $("#gol").val(), function(data) {
                var temp = [];
                $.each(data, function(key, value) {
                    temp.push({
                        v: value,
                        k: key
                    });
                });
                temp.sort(function(a, b) {
                    if (a.v > b.v) {
                        return 1
                    }
                    if (a.v < b.v) {
                        return -1
                    }
                    return 0;
                });
                $('#goldet').empty();
                $('#goldet').append('<option value="0">--Pilih--</option>');
                $.each(temp, function(key, obj) {
                    if (status == 0) {
                        if (obj.k == "<?php echo $regis->asuransi; ?>") {
                            $('#goldet').append('<option value="' + obj.k + '" selected>' + obj.v + '</option>');
                        } else {
                            $('#goldet').append('<option value="' + obj.k + '">' + obj.v + '</option>');
                        }
                    } else {
                        $('#goldet').append('<option value="' + obj.k + '">' + obj.v + '</option>');
                    }
                });
            });
        }


        $("#tp").on("change", function() {
            var tp = $("#tp").val();
            $.ajax({
                url: "<?php echo site_url(); ?>/registrasipasien/ambilkelasdariunit",
                type: "GET",
                data: {
                    unit: tp
                },
            }).then(function(data) {
                $("#kp option").remove();
                var t = JSON.parse(data);
                t.forEach(function(entry) {
                    var option = new Option(entry.nama_kamar, entry.kode_kamar, true, true);
                    $('#kp').append(option).trigger('change');
                });
            });
        });

        $('#tp').trigger('change')

        function ubah(id) {
            var rm = document.getElementById("rm").value;
            var tglmasuk = document.getElementById("tglmasuk").value;
            var jammasuk = document.getElementById("jammasuk").value;
            // var kunjungan = $("input[name='kunjungan']:checked").val();
            var kunjungan = 0;
            var tp = $("#tp").val();
            var tptext = $("#tp option:selected").text();
            var kp = $("#kp").val();
            var kptext = $("#kp option:selected").text();
            var gol = $("#gol").val();
            var goltext = $("#gol option:selected").text();
            var goldet = $("#goldet").val();
            var goldettext = $("#goldet option:selected").text();
            var rujukan = $("#rujukan").val();
            var rujukantext = $("#rujukan option:selected").text();
            var tglrujuk = document.getElementById("tglrujuk").value;
            var sep = document.getElementById("sep").value;
            var jp = $("#jp").val();
            var jptext = $("#jp option:selected").text();
            var icd = $("#icd").val();
            var icdtext = $("#icd option:selected").text();
            var cat = $("#cat").val();
            var dokter = $("#dokter").val();
            var doktertext = $("#dokter option:selected").text();
            var dokterluar = $("#dokterluar").val();
            var dokterluartext = $("#dokterluar option:selected").text();
            var faskes = $("#faskes").val();
            var faskestext = $("#faskes option:selected").text();
            var keluhan = $("#keluhan").val();
            var cm = $("#cm").val();
            var tglp = document.getElementById("tglregis").value;
            var nrp = document.getElementById("nrp").value;
            $.ajax({
                url: "<?php echo site_url(); ?>/registrasipasien/prosesubahregisuri",
                type: "GET",
                data: {
                    id: id,
                    rm: rm,
                    tglmasuk: tglmasuk,
                    jammasuk: jammasuk,
                    kunjungan: kunjungan,
                    tp: tp,
                    tptext: tptext,
                    kp: kp,
                    kptext: kptext,
                    gol: gol,
                    goltext: goltext,
                    goldet: goldet,
                    goldettext: goldettext,
                    rujukan: rujukan,
                    rujukantext: rujukantext,
                    tglrujuk: tglrujuk,
                    sep: sep,
                    jp: jp,
                    jptext: jptext,
                    icd: icd,
                    icdtext: icdtext,
                    dokter: dokter,
                    doktertext: doktertext,
                    dokterluar: dokterluar,
                    dokterluartext: dokterluartext,
                    faskes: faskes,
                    faskestext: faskestext,
                    keluhan: keluhan,
                    cat: cat,
                    cm: cm,
                    tglp: tglp,
                    nrp: nrp,
                    datadetail
                },
                success: function(ajaxData) {
                    var dt = JSON.parse(ajaxData);
                    if (dt.stat == true) {
                        suksesalert();
                        modalloadtutup();
                        $("#barispasien tbody tr").remove();
                        $("#barispasien tbody").append(dt.dtview);
                        $('#formmodal').modal('toggle');
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