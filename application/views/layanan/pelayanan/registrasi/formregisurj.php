<?php
if ($formpilih == 0) {
?>
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <!-- <div class="box box-default box-solid" id="proseskotak"> -->
            <div class="modal-header p-1 pl-3 align-text-bottom">
                <b class="modal-title" id="exampleModalLabel">Registrasi Unit Rawat Jalan</b>
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
                        <div class="col-md-3">
                            <div class="row form-group">
                                <label class="col-sm-4 col-form-label text-right">Golongan</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" value="<?php echo $dtpasien->golongan; ?>" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="row form-group">
                                <label class="col-sm-4 col-form-label text-right">No. Kartu*</label>
                                <div class="col-sm-5">
                                    <input type="text" maxlength="13" class="form-control" name="nokartu" id="nokartu" value="<?php echo $dtpasien->no_askes; ?>" autocomplete="off" disabled>
                                </div>
                                <div class="col-sm-3">
                                    <div class="custom-control custom-checkbox custom-control-inline">
                                        <input type="checkbox" class="custom-control-input" name="ceknokartu" id="ceknokartu">
                                        <label class="custom-control-label" for="ceknokartu">Isi</label>
                                    </div>
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
                        <div class="col-md-3">
                            <div class="row form-group">
                                <label class="col-sm-4 col-form-label text-right">Asuransi</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" value="<?php echo $dtpasien->asuransi; ?>" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="row form-group">
                                <label class="col-sm-4 col-form-label text-right">NIK*</label>
                                <div class="col-sm-5">
                                    <input type="text" maxlength="16" class="form-control" name="cnik" id="cnik" value="<?php echo $dtpasien->nik; ?>" autocomplete="off" disabled>
                                </div>
                                <div class="col-sm-3">
                                    <div class="custom-control custom-checkbox custom-control-inline">
                                        <input type="checkbox" class="custom-control-input" name="ceknik" id="ceknik">
                                        <label class="custom-control-label" for="ceknik">Isi</label>
                                    </div>
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
                        <div class="col-md-3">
                            <div class="row form-group">
                                <label class="col-sm-4 col-form-label text-right">Hak Kelas</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" value="<?php echo $dtpasien->kelashak; ?>" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="row form-group">
                                <label class="col-sm-4 col-form-label text-right"></label>
                                <div class="col-sm-5">
                                    <div class="custom-control custom-checkbox custom-control-inline">
                                        <input type="checkbox" class="custom-control-input" id="internet" name="internet" value="1" checked>
                                        <label class="custom-control-label" for="internet">Internet on</label>
                                    </div>
                                </div>
                            </div>
							
						</div>
                    </div>
                </form>
                <hr class="border-top-hr my-4 bg-secondary"/>
                <b class="card-title mt-2 mb-3">Registrasi</b>
                <form>
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="row form-group col-spacing-row">
                                <label class="col-sm-4 col-form-label text-right">Nomor Antrian Admisi*</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" name="noantrianloket" id="noantrianloket" onchange="ceknoantrian()" autocomplete="off">
                                </div>
                            </div>
                            <div class="row form-group col-spacing-row">
                                <label class="col-sm-4 col-form-label text-right">Tgl. Masuk</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="tglmasuk" id="tglmasuk">
                                </div>
                            </div>
                            <div class="row form-group col-spacing-row">
                                <label class="col-sm-4 col-form-label text-right">Jam Masuk</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="jammasuk" id="jammasuk">
                                </div>
                            </div>
                            <!-- <div class="row form-group col-spacing-row">
                                <label class="col-sm-4 col-form-label text-right">Kunjungan</label>
                                <div class="col-sm-8">
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
                                <label class="col-sm-4 col-form-label text-right">Tujuan Perawatan</label>
                                <div class="col-sm-8">
                                    <select class="form-control" style="width: 100%;" name="tp" id="tp" onchange="filterdokter(1)">
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
                                <label class="col-sm-4 col-form-label text-right">Penjamin</label>
                                <div class="col-sm-8">
                                    <select class="form-control" style="width: 100%;" name="gol" id="gol" onchange="changegol(1);">
                                        <option value="">--Pilih--</option>
                                        <?php
                                        foreach ($golongan as $row) {
                                        ?>
                                            <option value="<?php echo $row->golongan; ?>" <?php if ($dtpasien->golongan == $row->golongan) {
                                                                                                echo "selected";
                                                                                            } ?>> <?php echo $row->golongan; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group col-spacing-row">
                                <label class="col-sm-4 col-form-label text-right"></label>
                                <div class="col-sm-8">
                                    <select class="form-control" style="width: 100%;" name="goldet" id="goldet">
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group col-spacing-row">
                                <label class="col-sm-4 col-form-label text-right">Rujukan*</label>
                                <div class="col-sm-8">
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
                            <!-- <div class="row form-group col-spacing-row">
                                <label class="col-sm-4 col-form-label text-right">Faskes</label>
                                <div class="col-sm-8">
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
                            </div> -->
                            <div class="row form-group col-spacing-row">
                                <label class="col-sm-4 col-form-label text-right">Cara Masuk</label>
                                <div class="col-sm-8">
                                    <select class="form-control" style="width: 100%;" name="cm" id="cm">
                                        <option value="LOKET">LOKET</option>
                                        <option value="POLI">POLI</option>
                                        <option value="UGD">UGD</option>
                                    </select>
                                </div>
                            </div>
                            <!-- <div class="row form-group col-spacing-row">
                                <label class="col-sm-4 col-form-label text-right">Rujukan Dokter</label>
                                <div class="col-sm-8">
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
                            </div> -->

                        </div>
                        <div class="col-md-6 col-12">
                            <div class="row form-group col-spacing-row">
                                <label class="col-sm-4 col-form-label text-right">Tgl. Rujukan</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="tglrujuk" id="tglrujuk">
                                </div>
                            </div>
                            <div class="row form-group col-spacing-row">
                                <label class="col-sm-4 col-form-label text-right">No. Rujukan*</label>
                                <div class="col-sm-8">
                                    <input type="text" maxlength="19" class="form-control" name="norujukan" id="norujukan">
                                </div>
                            </div>
                            <!-- <div class="row form-group col-spacing-row">
                                <label class="col-sm-4 col-form-label text-right">Keluhan Awal</label>
                                <div class="col-sm-8">
                                    <textarea rows="3" class="form-control" name="keluhan" id="keluhan"></textarea>
                                </div>
                            </div> -->
                            <div class="row form-group col-spacing-row">
                                <label class="col-sm-4 col-form-label text-right">Jenis Pelayanan</label>
                                <div class="col-sm-8">
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
                                <label class="col-sm-4 col-form-label text-right">Diagnosa</label>
                                <div class="col-sm-8">
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
                                <label class="col-sm-4 col-form-label text-right">No. SEP</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="sep" id="sep">
                                </div>
                            </div>
                            <div class="row form-group col-spacing-row">
                                <label class="col-sm-4 col-form-label text-right">DPJP*</label>
                                <div class="col-sm-8">
                                    <select class="form-control" style="width: 100%;" name="dokter" id="dokter">

                                    </select>
                                </div>
                            </div>
                            <div class="row form-group col-spacing-row">
                                <label class="col-sm-4 col-form-label text-right">Catatan</label>
                                <div class="col-sm-8">
                                    <!--                                    <input type="text" class="form-control" name="cat" id="cat">-->
                                    <textarea rows="3" class="form-control" name="cat" id="cat"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row spacing-row">
                        <div class="col-md-6">

                        </div>
                    </div>
                </form>
                <div class="row">
                    <div class="col-12 text-right mt-4">
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

        function kuranglengkapnorujukan() {
            $.notify("No.Rujukan Belum diisi", "error");
        }

        function kuranglengkapnik() {
            $.notify("NO.KARTU NIK belum ada", "error");
        }

        function kuranglengkapnoantrian() {
            $.notify("Nomor Antrian Belum diisi", "error");
        }

        function kurangdigitkartu() {
            $.notify("Nomor Kartu harus 13 DIGIT", "error");
        }

        function kurangdigitnik() {
            $.notify("NIK harus 16 DIGIT", "error");
        }

        function kurangdigitrujukan() {
            $.notify("Nomor Rujukan harus 19 DIGIT", "error");
        }

        $(function() {
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
            $('select').select2({
                tags: true
            });
            $('#kp').select2({
                tags: true
            });

            $('#ceknokartu').change(function() {
                if ($(this).is(":checked")) {
                    $('#nokartu').prop('disabled', false);
                    $('#nokartu').prop('required', true);
                } else {
                    $('#nokartu').prop('disabled', true);
                    $('#nokartu').prop('required', false);
                }
            });

            $('#ceknik').change(function() {
                if ($(this).is(":checked")) {
                    $('#cnik').prop('disabled', false);
                    $('#cnik').prop('required', true);
                } else {
                    $('#cnik').prop('disabled', true);
                    $('#cnik').prop('required', false);
                }
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
            $('#dokterluar').select2({
                tags: true
            });
            $('#faskes').select2({
                tags: true
            });

            changegol(0);
            filterdokter(0);
        });

        function filterdokter(status) {
            $.getJSON('<?php echo site_url(); ?>/registrasipasien/caridokter/' + $("#tp").val(), function(data) {
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
                $('#dokter').empty();
                $('#dokter').append('<option value="0">--Pilih--</option>');
                $.each(temp, function(key, obj) {
                    if (status == 0) {
                        $('#dokter').append('<option value="' + obj.k + '">' + obj.v + '</option>');
                    } else {
                        $('#dokter').append('<option value="' + obj.k + '">' + obj.v + '</option>');
                    }
                });
            });
        }

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

            $("#simpanregis").click(function(e) {
                var nokartu = document.getElementById("nokartu").value;
                var nik = document.getElementById("cnik").value;
                var norujukan = document.getElementById("norujukan").value;
                var noantrianloket = document.getElementById("noantrianloket").value;
                var rm = document.getElementById("rm").value;
                var tglmasuk = document.getElementById("tglmasuk").value;
                var jammasuk = document.getElementById("jammasuk").value;
                // var kunjungan = $("input[name='kunjungan']:checked").val();
                //diisikan 0 tetapi di simpan data ada pengecekan terlebih dahulu sbg pasien lama/baru 
                var kunjungan = 0; 
                var tp = $("#tp").val();
                var tptext = $("#tp option:selected").text();
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
                var dokterluar = '';
                var dokterluartext = '';
                var faskes = '';
                var faskestext = '';
                var keluhan = '';
                var cm = $("#cm").val();
                var ceknokartu = $("#ceknokartu").prop('checked');
                var ceknik = $("#ceknik").prop('checked');

                    // if ((tp == 'HMDL') || (tp == 'RDLG') || (tp == 'LABS') || (tp == 'ANST') || (tp == 'MDRO') || (tp == 'REME') || (tp == 'NARKO') || (tp == 'VISUM') || (tp == 'MCUU')) {

                    //     //lanjut saja
                    // } else {
                    //     //cek dulu apakah nomor antrian terisi
                    //     if ((noantrianloket.trim() == '') || (noantrianloket == null)) {
                    //         kuranglengkapnoantrian();
                    //         return;
                    //     }
                    // }

                console.log(gol);
                console.log(goltext);

                if ((nokartu.trim() == '') || (nik.trim() == '')) {
                    console.log(nokartu);
                    console.log('nik :' + nik);
                    kuranglengkapnik();
                    return;
                }

                if (nokartu.length != 13) {
                    kurangdigitkartu();
                    return;
                }

                if (nik.length != 16) {
                    kurangdigitnik();
                    return;
                }
                //jika bpjs di cek no rujukan
                if (gol.trim() == 'BPJS') {
                    if (norujukan.trim() == '') {
                        kuranglengkapnorujukan();
                        return;
                    }
                    if (norujukan.length != 19) {
                        kurangdigitrujukan();
                        return;
                    }
                }

                

                if ((gol == '') || (gol == null) || (goldet == '') || (goldet == null)) {
                    console.log('tidak lengkap datanya');
                    kuranglengkap();
                    return;
                }
                modalload;
                $.ajax({
                    url: "<?php echo site_url(); ?>/registrasipasien/simpanregisurj",
                    type: "GET",
                    data: {
                        nokartu: nokartu,
                        nik: nik,
                        noantrianloket,
                        rm: rm,
                        tglmasuk: tglmasuk,
                        jammasuk: jammasuk,
                        kunjungan: kunjungan,
                        tp: tp,
                        tptext: tptext,
                        gol: gol,
                        goltext: goltext,
                        goldet: goldet,
                        goldettext: goldettext,
                        rujukan: rujukan,
                        rujukantext: rujukantext,
                        tglrujuk: tglrujuk,
                        norujukan: norujukan,
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
                        ceknokartu: ceknokartu,
                        ceknik: ceknik
                    },

                    success: function(ajaxData) {
                        console.log(ajaxData);
                        var tx = JSON.parse(ajaxData);
                        if (tx.stat == true) {
                            suksesalert();
                            modalloadtutup();
                            tutupmodal(tx.dtnotrans);

                        } else if (tx.stat == "ada") {
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
                <b class="modal-title" id="exampleModalLabel">Edit Registrasi Unit Rawat Jalan</b>
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
                                <div class="col-sm-5">
                                    <input type="text" maxlength="13" class="form-control" name="nokartu" id="nokartu" value="<?php echo $dtpasien->no_askes; ?>" autocomplete="off" disabled>
                                </div>
                                <div class="col-sm-3">
                                    <div class="custom-control custom-checkbox custom-control-inline">
                                        <input type="checkbox" class="custom-control-input" name="ceknokartu" id="ceknokartu">
                                        <label class="custom-control-label" for="ceknokartu">Isi</label>
                                    </div>
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
                        <div class="col-md-4">
                            <div class="row form-group">
                                <label class="col-sm-4 col-form-label text-right">NIK*</label>
                                <div class="col-sm-5">
                                    <input type="text" maxlength="16" class="form-control" name="cnik" id="cnik" value="<?php echo $dtpasien->nik; ?>" autocomplete="off" disabled>
                                </div>
                                <div class="col-sm-3">
                                    <div class="custom-control custom-checkbox custom-control-inline">
                                        <input type="checkbox" class="custom-control-input" name="ceknik" id="ceknik">
                                        <label class="custom-control-label" for="ceknik">Isi</label>
                                    </div>
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
                                <label class="col-sm-4 col-form-label text-right">Nomor Antrian Admisi*</label>
                                <div class="col-sm-2">
                                    <!-- <input type="text" class="form-control" name="noantrianloket" id="noantrianloket" value="<?php echo $regis->noantrianloket; ?>" onchange="ceknoantrian()" autocomplete="off"> -->
                                    <input type="text" class="form-control" name="noantrianloket" id="noantrianloket" value="<?php echo $regis->noantrianloket; ?>" disabled>
                                </div>
                                <label class="col-sm-4 col-form-label text-right">Nomor Antrian Poli</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" name="noantrianpolilama" id="noantrianpolilama" value="<?php echo $dtnoantrianlama->no_antrian; ?>" disabled>
                                </div>
                            </div>
                            <div class="row form-group col-spacing-row">
                                <label class="col-sm-4 col-form-label text-right">Tgl. Masuk</label>
                                <div class="col-sm-8">
                                    <!-- <input type="text" class="form-control" name="tglmasuk" id="tglmasuk" value="<?php echo date('d-m-Y', strtotime($regis->tgl_masuk)); ?>"> -->
                                    <input type="text" class="form-control" name="tglmasuk" id="tglmasuk" value="<?php echo date('d-m-Y', strtotime($regis->tgl_masuk)); ?>">
                                </div>
                            </div>
                            <div class="row form-group col-spacing-row">
                                <label class="col-sm-4 col-form-label text-right">Jam Masuk</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="jammasuk" id="jammasuk" value="<?php echo $regis->jam_masuk; ?>">
                                </div>
                            </div>
                            <!-- <div class="row form-group col-spacing-row">
                                <label class="col-sm-4 col-form-label text-right">Kunjungan</label>
                                <div class="col-sm-8">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" class="custom-control-input" name="kunjungan" id="kunjungan1" value="2" <?php if ($regis->barulama == 2) echo 'checked'; ?>>
                                        <label class="custom-control-label" for="kunjungan1">Lama</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" class="custom-control-input" name="kunjungan" id="kunjungan2" value="1" <?php if ($regis->barulama == 1) echo 'checked'; ?>>
                                        <label class="custom-control-label" for="kunjungan2">Baru</label>
                                    </div>

                                </div>
                            </div> -->
                            <div class="row form-group col-spacing-row">
                                <label class="col-sm-4 col-form-label text-right">Tujuan Perawatan</label>
                                <div class="col-sm-8">
                                    <!-- <select class="form-control" style="width: 100%;" name="tp" id="tp" onchange="filterdokter(1);"> -->
                                    <select class="form-control" style="width: 100%;" name="tp" id="tp">
                                        <?php
                                        foreach ($tujuanperawatan as $row) {
                                        ?>
                                            <option value="<?php echo $row->kode_unit; ?>" <?php if ($kode_unit_regisdetail->kode_unit == $row->kode_unit) echo 'selected'; ?>><?php echo $row->nama_unit; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <input type="text"  class="form-control" name="tplama" id="tplama" value="<?php echo $kode_unit_regisdetail->kode_unit; ?>" hidden>
                                </div>
                            </div>
                            <div class="row form-group col-spacing-row">
                                <label class="col-sm-4 col-form-label text-right">Penjamin</label>
                                <div class="col-sm-8">
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
                                <label class="col-sm-4 col-form-label text-right"></label>
                                <div class="col-sm-8">
                                    <select class="form-control" style="width: 100%;" name="goldet" id="goldet">
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group col-spacing-row">
                                <label class="col-sm-4 col-form-label text-right">Rujukan</label>
                                <div class="col-sm-8">
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
                                <label class="col-sm-4 col-form-label text-right">Faskes</label>
                                <div class="col-sm-8">
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
                                <label class="col-sm-4 col-form-label text-right">Cara Masuk</label>
                                <div class="col-sm-8">
                                    <select class="form-control" style="width: 100%;" name="cm" id="cm">
                                        <option value="LOKET" <?php if ($regis->cara_masuk == "LOKET") echo 'selected'; ?>>LOKET</option>
                                        <option value="POLI" <?php if ($regis->cara_masuk == "POLI") echo 'selected'; ?>>POLI</option>
                                        <option value="UGD" <?php if ($regis->cara_masuk == "UGD") echo 'selected'; ?>>UGD</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group col-spacing-row">
                                <label class="col-sm-4 col-form-label text-right">Rujukan Dokter</label>
                                <div class="col-sm-8">
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
                                <label class="col-sm-4 col-form-label text-right">Tgl. Rujukan</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="tglrujuk" id="tglrujuk" value="<?php echo $regis->tglrujukan; ?>">
                                </div>
                            </div>
                            <div class="row form-group col-spacing-row">
                                <label class="col-sm-4 col-form-label text-right">No. Rujukan*</label>
                                <div class="col-sm-8">
                                    <input type="text" maxlength="19" class="form-control" name="norujukan" id="norujukan" value="<?php echo $regis->norujukan; ?>">
                                </div>
                            </div>
                            <div class="row form-group col-spacing-row">
                                <label class="col-sm-4 col-form-label text-right">Keluhan Awal</label>
                                <div class="col-sm-8">
                                    <textarea rows="3" class="form-control" name="keluhan" id="keluhan"><?php echo $regis->keluhanawal; ?></textarea>
                                </div>
                            </div>
                            <div class="row form-group col-spacing-row">
                                <label class="col-sm-4 col-form-label text-right">Jenis Pelayanan</label>
                                <div class="col-sm-8">
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
                                <label class="col-sm-4 col-form-label text-right">Diagnosa</label>
                                <div class="col-sm-8">
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
                                <label class="col-sm-4 col-form-label text-right">No. SEP</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="sep" id="sep" disabled value="<?php echo $regis->nosep ?>">
                                </div>
                            </div>
                            <div class="row form-group col-spacing-row">
                                <label class="col-sm-4 col-form-label text-right">DPJP</label>
                                <div class="col-sm-8">
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
                                <label class="col-sm-4 col-form-label text-right">Catatan</label>
                                <div class="col-sm-8">
                                    <textarea rows="3" class="form-control" name="cat" id="cat"><?php echo $regis->catatan; ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <div class="col-12 text-right">
                        <button onclick="ubah(<?php echo $regis->id ?>)" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
            <!-- </div> -->
        </div>
    </div>


    <script>
        // var datadetail = "<?php echo $regisdetail->kode_unit; ?>"
        var datadetail = "<?php echo $regisdetail->id; ?>"

        $(document).ready(function() {
            tglmasuk();
        });

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

        function gagalalert() {
            $.notify("Gagal Proses Data", "error");
        }

        function kuranglengkap() {
            $.notify("Data Kurang Lengkap", "error");
        }

        function kuranglengkapnorujukan() {
            $.notify("No.Rujukan Belum diisi", "error");
        }

        function kuranglengkapnik() {
            $.notify("NO.KARTU NIK belum ada", "error");
        }

        function kuranglengkapnoantrian() {
            $.notify("Nomor Antrian Belum diisi", "error");
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
            });
            $('#tglrujuk').datepicker({
                autoclose: true,
				dateFormat: 'dd-mm-yy',
				changeMonth: true,
				changeYear: true,
				yearRange: "-100:+00"
            });
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

            $('#ceknokartu').change(function() {
                if ($(this).is(":checked")) {
                    $('#nokartu').prop('disabled', false);
                    $('#nokartu').prop('required', true);
                } else {
                    $('#nokartu').prop('disabled', true);
                    $('#nokartu').prop('required', false);
                }
            });

            $('#ceknik').change(function() {
                if ($(this).is(":checked")) {
                    $('#cnik').prop('disabled', false);
                    $('#cnik').prop('required', true);
                } else {
                    $('#cnik').prop('disabled', true);
                    $('#cnik').prop('required', false);
                }
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
            $('#faskes').select2({
                tags: true
            });
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
            // filterdokter(1);
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

        function ubah(id) {
            var nokartu = document.getElementById("nokartu").value;
            var nik = document.getElementById("cnik").value;
            var norujukan = document.getElementById("norujukan").value;
            var noantrianloket = document.getElementById("noantrianloket").value;
            var rm = document.getElementById("rm").value;
            var tglmasuk = document.getElementById("tglmasuk").value;
            var jammasuk = document.getElementById("jammasuk").value;
            // var kunjungan = $("input[name='kunjungan']:checked").val();
            var kunjungan = 0;
            var tp = $("#tp").val();
            var tplama = $("#tplama").val();
            var tptext = $("#tp option:selected").text();
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

            var ceknokartu = $("#ceknokartu").prop('checked');
            var ceknik = $("#ceknik").prop('checked');

            var tglp = document.getElementById("tglregis").value;
            var nrp = document.getElementById("nrp").value;
            var noantrianpolilama = document.getElementById("noantrianpolilama").value;

            // if ((tp == 'HMDL') || (tp == 'RDLG') || (tp == 'LABS') || (tp == 'ANST') || (tp == 'MDRO') || (tp == 'REME') || (tp == 'NARKO') || (tp == 'VISUM') || (tp == 'MCUU')) {
            //     //lanjut saja
            // } else {
            //     //cek dulu apakah nomor antrian terisi
            //     if ((noantrianloket == '') || (noantrianloket == null)) {
            //         kuranglengkapnoantrian();
            //         return;
            //     }
            // }
            if ((nokartu.trim() == '') || (nik.trim() == '')) {
                console.log(nokartu);
                console.log('nik :' + nik);
                kuranglengkapnik();
                return;
            }
            // if ((gol == '') || (gol == null) || (goldet == '') || (goldet == null) ) {
            if (gol.trim() == 'BPJS') {
                if (norujukan.trim() == '') {
                    kuranglengkapnorujukan();
                    return;
                }
            }    
            if ((gol == '') || (gol == null) || (goldet == '') || (goldet == null)) {
                console.log('tidak lengkap datanya');
                console.log(nokartu);
                console.log('nik :' + nik);

                kuranglengkap();
                return;
            }
            modalload;
            $.ajax({
                url: "<?php echo site_url(); ?>/registrasipasien/prosesubahregisurj",
                type: "GET",
                data: {
                    id: id,
                    noantrianloket: noantrianloket,
                    noantrianpolilama: noantrianpolilama,
                    rm: rm,
                    tglmasuk: tglmasuk,
                    jammasuk: jammasuk,
                    kunjungan: kunjungan,
                    tp: tp,
                    tplama: tplama,
                    tptext: tptext,
                    gol: gol,
                    goltext: goltext,
                    goldet: goldet,
                    goldettext: goldettext,
                    rujukan: rujukan,
                    rujukantext: rujukantext,
                    tglrujuk: tglrujuk,
                    norujukan: norujukan,
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
                    console.log(ajaxData);
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

        // func ceknoantrian ada jg di js dataregisurj  
        function ceknoantrian() {
            var noantrianloket = $("#noantrianloket").val();
            var tglmasuk = $("#tglmasuk").val();
            var rm = $("#rm").val();
            $.ajax({
                url: "<?php echo site_url(); ?>/registrasipasien/caridatanoantrian",
                type: "GET",
                data: {
                    noantrianloket: noantrianloket,
                    tglmasuk: tglmasuk,
                    rm: rm
                },
                success: function(result) {
                    console.log(result);
                    if (result == 1) {
                        //data ada / bisa dipakai
                    } else {
                        $.alert({
                            title: 'No Antrian ' + noantrianloket.toUpperCase(),
                            // content: 'Nomor antrian tidak dikenal'
                            // content: 'Nomor antrian '+noantrianloket.toUpperCase()+' tidak dikenal / sudah digunakan pasien lain'
                            content: 'Tidak terdaftar / Sudah digunakan Pasien lainnya'
                        });
                        document.getElementById("noantrianloket").value = '';
                    }
                }
            });
        }
    </script>
<?php
}
?>