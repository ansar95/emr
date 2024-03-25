<style>
    .errorClass {
        border: 1px solid red;
    }

    #image-preview {
        display: block;
        width: 250px;
        height: 300px;
    }
</style>
<div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
        <!-- <div class="box box-default box-solid" id="proseskotak"> -->
        <div class="modal-header p-1 pl-3 align-text-bottom">
            <b class="modal-title" id="exampleModalLabel">Ubah Data Pasien</b>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body pt-n1">
            <form>
                <div class="row spacing-row">
                    <div class="col-md-6">
                        <div class="row form-group">
                            <label class="col-sm-4 col-form-label text-right">NIK *</label>
                            <div class="col-sm-8">
                                <input id="id" name="id" type="text" value="<?php echo $pasien->id; ?>" hidden />
                                <input type="text" class="form-control" maxlength="16" name="nik" id="nik" placeholder="NIK" value="<?php echo $pasien->nik; ?>" autocomplete="off" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row form-group">
                            <label class="col-sm-4 col-form-label text-right">Handphone *</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="hp" id="hp" placeholder="Handphone" value="<?php echo $pasien->hp; ?>" autocomplete="off" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row spacing-row">
                    <div class="col-md-6">
                        <div class="row form-group">
                            <label class="col-sm-4 col-form-label text-right">Title *</label>
                            <div class="col-sm-8">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" name="title" id="title1" value="Tn" <?php if ($pasien->title == "Tn") {
                                                                                                                                echo "checked";
                                                                                                                            } ?>>
                                    <label class="custom-control-label" for="title1">Tn.</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" name="title" id="title2" value="Ny" <?php if ($pasien->title == "Ny") {
                                                                                                                                echo "checked";
                                                                                                                            } ?>>
                                    <label class="custom-control-label" for="title2">Ny.</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" name="title" id="title3" value="Nn" <?php if ($pasien->title == "Nn") {
                                                                                                                                echo "checked";
                                                                                                                            } ?>>
                                    <label class="custom-control-label" for="title3">Nn.</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" name="title" id="title4" value="Anak" <?php if ($pasien->title == "Anak") {
                                                                                                                                echo "checked";
                                                                                                                            } ?>>
                                    <label class="custom-control-label" for="title4">Anak</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" name="title" id="title5" value="Bayi" <?php if ($pasien->title == "Bayi") {
                                                                                                                                echo "checked";
                                                                                                                            } ?>>
                                    <label class="custom-control-label" for="title5">Bayi</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row form-group">
                            <label class="col-sm-4 col-form-label text-right">Pekerjaan Pasien</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="pekerjaan" id="pekerjaan" placeholder="Pekerjaan" value="<?php echo $pasien->pekerjaan; ?>" autocomplete="off" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row spacing-row">
                    <div class="col-md-6">
                        <div class="row form-group">
                            <label class="col-sm-4 col-form-label text-right">No. RM</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="rm" id="rm" placeholder="No. RM" value="<?php echo $pasien->no_rm; ?>" disabled />
                            </div>
                            <!-- <div class="col-sm-4">
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" class="custom-control-input" id="otomatis" name="otomatis" value="otomatis" checked>
                                <label class="custom-control-label" for="otomatis">Otomatis</label>
                            </div>
                        </div> -->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row form-group">
                            <label class="col-sm-4 col-form-label text-right">Golongan Darah </label>
                            <div class="col-sm-8">
                                <select class="form-control" style="width: 100%;" name="goldarah" id="goldarah">
                                    <?php
                                    foreach ($goldarah as $row) {
                                    ?>
                                        <option <?php if ($pasien->goldarah == $row->goldarah) {
                                                    echo "selected";
                                                } ?> value="<?php echo $row->goldarah; ?>"><?php echo $row->goldarah; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row spacing-row">
                    <div class="col-md-6">
                        <div class="row form-group">
                            <label class="col-sm-4 col-form-label text-right">Nama Pasien *</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="nmpas" id="nmpas" placeholder="Nama Pasien" value="<?php echo $pasien->nama_pasien; ?>" autocomplete="off" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row form-group">
                            <label class="col-sm-4 col-form-label text-right">Alamat Pasien*</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" value="<?php echo $pasien->alamat; ?>" autocomplete="off" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row spacing-row">
                    <div class="col-md-6">
                        <div class="row form-group">
                            <label class="col-sm-4 col-form-label text-right">Tanggal Daftar *</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="daftar" name="daftar" value="<?php echo date('d-m-Y', strtotime($pasien->tgl_daftar)); ?>" required autocomplete="off" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row form-group">
                            <label class="col-sm-4 col-form-label text-right">Provinsi *</label>
                            <div class="col-sm-8">
                                <select class="form-control prov" style="width: 100%;" name="prov" id="prov" onchange="propganti(1)">
                                    <option value="-" selected>-Pilih-</option>
                                    <?php
                                    foreach ($prov as $row) {
                                    ?>
                                        <option value="<?php echo $row->id; ?>" <?php if ($pasien->provinsi == $row->name) {
                                                                                    echo "selected";
                                                                                } ?>><?php echo $row->name; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row spacing-row">
                    <div class="col-md-6">
                        <div class="row form-group">
                            <label class="col-sm-4 col-form-label text-right">Nama Panggilan</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="nmp" id="nmp" placeholder="Nama Panggilan" value="<?php echo $pasien->nama_pgl; ?>" autocomplete="off" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row form-group">
                            <label class="col-sm-4 col-form-label text-right">Kabupaten/Kota *</label>
                            <div class="col-sm-8">
                                <select class="form-control" style="width: 100%;" name="provinsi" type="text" id="kab" onchange="kabganti(1)">
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row spacing-row">
                    <div class="col-md-6">
                        <div class="row form-group">
                            <label class="col-sm-4 col-form-label text-right">Tempat Lahir *</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="t4lahir" name="t4lahir" placeholder="Tempat Lahir" value="<?php echo $pasien->tempat_lahir; ?>" required autocomplete="off" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row form-group">
                            <label class="col-sm-4 col-form-label text-right">Kecamatan *</label>
                            <div class="col-sm-8">
                                <select class="form-control" style="width: 100%;" name="provinsi" id="kec" onchange="kecganti(1)">
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row spacing-row">
                    <div class="col-md-6">
                        <div class="row form-group">
                            <label class="col-sm-4 col-form-label text-right">Tanggal Lahir *</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="lahir" name="lahir" value="<?php echo date('d-m-Y', strtotime($pasien->tgl_lahir)); ?>" required autocomplete="off" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row form-group">
                            <label class="col-sm-4 col-form-label text-right">Kelurahan/Desa *</label>
                            <div class="col-sm-8">
                                <select class="form-control" style="width: 100%;" name="provinsi" id="kel">
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row spacing-row">
                    <div class="col-md-6">
                        <div class="row form-group">
                            <label class="col-sm-4 col-form-label text-right">Pendidikan *</label>
                            <div class="col-sm-8">
                                <select class="form-control" style="width: 100%;" name="pendidikan" id="pendidikan">
                                    <?php
                                    foreach ($pendidikan as $row) {
                                    ?>
                                        <option <?php if ($pasien->pendidikan == $row->pendidikan) {
                                                    echo "selected";
                                                } ?> value="<?php echo $row->pendidikan; ?>"><?php echo $row->pendidikan; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row form-group">
                            <label class="col-sm-4 col-form-label text-right">Nama Orang Tua *</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="nmortu" id="nmortu" placeholder="Nama Orang Tua" value="<?php echo $pasien->nama_ortu; ?>" autocomplete="off" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row spacing-row">
                    <div class="col-md-6">
                        <div class="row form-group">
                            <label class="col-sm-4 col-form-label text-right">Status *</label>
                            <div class="col-sm-8">
                                <select class="form-control" style="width: 100%;" name="stat" id="stat">
                                    <?php
                                    foreach ($status as $row) {
                                    ?>
                                        <option <?php if ($pasien->status == $row->status) {
                                                    echo "selected";
                                                } ?> value="<?php echo $row->status; ?>"><?php echo $row->status; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row form-group">
                            <label class="col-sm-4 col-form-label text-right">Pekerjaan *</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="pkrortu" id="pkrortu" placeholder="Pekerjaan Orang Tua" value="<?php echo $pasien->pekerjaan_ayahibu; ?>" autocomplete="off" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row spacing-row">
                    <div class="col-md-6">
                        <div class="row form-group">
                            <label class="col-sm-4 col-form-label text-right">Agama *</label>
                            <div class="col-sm-8">
                                <select class="form-control" style="width: 100%;" name="agama" id="ag">
                                    <?php
                                    foreach ($agama as $row) {
                                    ?>
                                        <option <?php if ($pasien->agama == $row->agama) {
                                                    echo "selected";
                                                } ?> value="<?php echo $row->agama; ?>"><?php echo $row->agama; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row form-group">
                            <label class="col-sm-4 col-form-label text-right">Alamat *</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="pkrsi" id="pkrsi" placeholder="Pekerjaan Suami/Istri" value="<?php echo $pasien->pekerjaan_suamiistri; ?>" autocomplete="off" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row spacing-row">
                    <div class="col-md-6">
                        <div class="row form-group">
                            <label class="col-sm-4 col-form-label text-right">Suku *</label>
                            <div class="col-sm-8">
                                <select class="form-control" style="width: 100%;" name="suku" id="suku">
                                    <?php
                                    foreach ($suku as $row) {
                                    ?>
                                        <option <?php if ($pasien->suku == $row->suku) {
                                                    echo "selected";
                                                } ?> value="<?php echo $row->suku; ?>"><?php echo $row->suku; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row form-group">
                            <label class="col-sm-4 col-form-label text-right">Penanggung Jawab *</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="pj" id="pj" placeholder="Penganggung Jawab" value="<?php echo $pasien->nama_png; ?>" autocomplete="off" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row spacing-row">
                    <div class="col-md-6">
                        <div class="row form-group">
                            <label class="col-sm-4 col-form-label text-right">Jenis Kelamin *</label>
                            <div class="col-sm-8">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" name="jk" id="jkl" value="L" <?php if ($pasien->sex == "L") {
                                                                                                                        echo "checked";
                                                                                                                    } ?>>
                                    <label class="custom-control-label" for="jkl">Laki-laki</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" name="jk" id="jkp" value="P" <?php if ($pasien->sex == "P") {
                                                                                                                        echo "checked";
                                                                                                                    } ?>>
                                    <label class="custom-control-label" for="jkp">Perempuan</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row form-group">
                            <label class="col-sm-4 col-form-label text-right">Telp/HP P. Jawab *</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="telppj" id="telppj" placeholder="Telp/HP Penanggung Jawab" value="<?php echo $pasien->telppj; ?>" autocomplete="off" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row spacing-row">
                    <div class="col-md-6">
                        <div class="row form-group">
                            <label class="col-sm-4 col-form-label text-right">Penjamin *</label>
                            <div class="col-sm-8">
                                <select class="form-control" style="width: 100%;" name="gol" id="gol" onchange="changegol(1);">
                                    <?php
                                    foreach ($golongan as $row) {
                                    ?>
                                        <option <?php if ($pasien->golongan == $row->golongan) {
                                                    echo "selected";
                                                } ?> value="<?php echo $row->golongan; ?>"><?php echo $row->golongan; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row form-group">
                            <label class="col-sm-4 col-form-label text-right">Nama Keluarga</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="nmk" id="nmk" placeholder="Nama Keluarga" value="<?php echo $pasien->nama_klg; ?>" autocomplete="off" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row spacing-row">
                    <div class="col-md-6">
                        <div class="row form-group">
                            <label class="col-sm-4 col-form-label text-right">Kelas Hak *</label>
                            <div class="col-sm-8">
                                <select class="form-control" style="width: 100%;" name="kelashak" id="kh">
                                    <?php
                                    foreach ($kelashak as $row) {
                                    ?>
                                        <option <?php if ($pasien->kelashak == $row->namakelas) {
                                                    echo "selected";
                                                } ?> value="<?php echo $row->namakelas; ?>"><?php echo $row->namakelas; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row form-group">
                            <label class="col-sm-4 col-form-label text-right">Pekerjaan Keluarga</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="telp" id="telp" placeholder="Pekerjaan Keluarga" value="<?php echo $pasien->telp; ?>" autocomplete="off" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row spacing-row">
                    <div class="col-md-6">
                        <div class="row form-group">
                            <label class="col-sm-4 col-form-label text-right">No. Kartu *</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="nokartu" id="nokartu" placeholder="Nomor Kartu" value="<?php echo $pasien->no_askes; ?>" autocomplete="off" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row form-group">
                            <label class="col-sm-4 col-form-label text-right">Alamat Keluarga</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="ak" id="ak" placeholder="Alamat Keluarga" value="<?php echo $pasien->alamat_klg; ?>" autocomplete="off" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row spacing-row">
                    <div class="col-md-6">
                    </div>
                    <div class="col-md-6">
                        <div class="row form-group">
                            <label class="col-sm-4 col-form-label text-right">Negara *</label>
                            <div class="col-sm-8">
                                <select class="form-control prov" style="width: 100%;" name="negara" id="negara">
                                    <?php
                                    foreach ($negara as $row) {
                                    ?>
                                        <option value="<?php echo $row->negara; ?>" <?php if ($pasien->negara == "Indonesia") {
                                                                                        echo "selected";
                                                                                    } ?>><?php echo $row->negara; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12 text-right">
                        <button onclick="ubahpasien();" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
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

    function gagalalert(info = "Gagal Input Data") {
        $.notify(info, "error");
    }

    $(function() {
        $('#lahir').datepicker({
            autoclose: true,
            dateFormat: 'dd-mm-yy',
            changeMonth: true,
            changeYear: true,
            yearRange: "-100:+00"
        });
        $('#daftar').datepicker({
            autoclose: true,
            dateFormat: 'dd-mm-yy',
            changeMonth: true,
            changeYear: true,
            yearRange: "-100:+00"
        });
        $('#prov').select2({
            tags: true
        });
        $('#kab').select2({
            tags: true
        });
        $('#kec').select2({
            tags: true
        });
        $('#kel').select2({
            tags: true
        });
        $('#stat').select2({
            tags: true
        });
        $('#ag').select2({
            tags: true
        });
        $('#gol').select2({
            tags: true
        });
        $('#asp').select2({
            tags: true
        });
        $('#kh').select2({
            tags: true
        });
        $('#negara').select2({
            tags: true
        });
        $('#pendidikan').select2({
            tags: true
        });
        $('#suku').select2({
            tags: true
        });
        $('#goldarah').select2({
            tags: true
        });
        $('#otomatis').change(function() {
            if ($(this).is(":checked")) {
                $('#rm').prop('disabled', true);
                $('#rm').prop('required', false);
            } else {
                $('#rm').prop('disabled', false);
                $('#rm').prop('required', true);
            }
        });
        propganti(0);
        changegol(0);
    });

    function propganti(status) {
        var prov = $("#prov").val();
        $.ajax({
            url: "<?php echo site_url(); ?>/wilayahchain/ambilkabupaten",
            type: "GET",
            data: {
                prov: prov
            },
        }).then(function(data) {
            $("#kab option").remove();
            $("#kec option").remove();
            $("#kel option").remove();
            var t = JSON.parse(data);
            // var op = new Option("-Pilih-", "-", true, true);
            // $('#kab').append(op).trigger('change');
            t.forEach(function(entry) {
                if (status == 0) {
                    if (entry.name == "<?php echo $pasien->kota; ?>") {
                        var option = new Option(entry.name, entry.id, true, true);
                        $('#kab').append(option);
                    } else {
                        var option = new Option(entry.name, entry.id, false, false);
                        $('#kab').append(option);
                    }
                } else {
                    var option = new Option(entry.name, entry.id, false, false);
                    $('#kab').append(option);
                }
            });
            if (status == 0) {
                kabganti(0);
            }
        });
    }

    function kabganti(status) {
        var kab = $("#kab").val();
        $.ajax({
            url: "<?php echo site_url(); ?>/wilayahchain/ambilkecamatan",
            type: "GET",
            data: {
                kab: kab
            },
        }).then(function(data) {
            $("#kec option").remove();
            $("#kel option").remove();
            var t = JSON.parse(data);
            var op = new Option("-Pilih-", "-", true, true);
            // $('#kec').append(op).trigger('change');
            t.forEach(function(entry) {
                if (status == 0) {
                    if (entry.name == "<?php echo $pasien->kecamatan; ?>") {
                        var option = new Option(entry.name, entry.id, true, true);
                        $('#kec').append(option);
                    } else {
                        var option = new Option(entry.name, entry.id, false, false);
                        $('#kec').append(option);
                    }
                } else {
                    var option = new Option(entry.name, entry.id, false, false);
                    $('#kec').append(option);
                }
            });
            if (status == 0) {
                kecganti(0);
            }
        });
    }

    function kecganti(status) {
        var kec = $("#kec").val();
        $.ajax({
            url: "<?php echo site_url(); ?>/wilayahchain/akmbilkelurahan",
            type: "GET",
            data: {
                kec: kec
            },
        }).then(function(data) {
            $("#kel option").remove();
            var t = JSON.parse(data);
            // var op = new Option("-Pilih-", "-", true, true);
            // $('#kel').append(op).trigger('change');
            t.forEach(function(entry) {
                if (status == 0) {
                    if (entry.name == "<?php echo $pasien->desa; ?>") {
                        var option = new Option(entry.name, entry.id, true, true);
                        $('#kel').append(option);
                    } else {
                        var option = new Option(entry.name, entry.id, false, false);
                        $('#kel').append(option);
                    }
                } else {
                    var option = new Option(entry.name, entry.id, false, false);
                    $('#kel').append(option);
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
            $('#asp').empty();
            $('#asp').append('<option value="0">--Pilih--</option>');
            $.each(temp, function(key, obj) {
                if (status == 0) {
                    if (obj.v == "<?php echo $pasien->asuransi; ?>") {
                        $('#asp').append('<option value="' + obj.k + '" selected>' + obj.v + '</option>');
                    } else {
                        $('#asp').append('<option value="' + obj.k + '">' + obj.v + '</option>');
                    }
                } else {
                    $('#asp').append('<option value="' + obj.k + '">' + obj.v + '</option>');
                }
            });
        });
    }

    function ubahpasien() {
        // modalload();
        var otomatis = $("#otomatis").prop('checked');
        var nik = $("input[name='nik']:text").val();
        var title = $("input[name='title']:checked").val();
        var nmpas = $("input[name='nmpas']:text").val();
        var daftar = $("input[name='daftar']:text").val();
        var nmp = $("input[name='nmp']:text").val();
        var t4lahir = $("input[name='t4lahir']:text").val();
        var lahir = $("input[name='lahir']:text").val();
        //var pendidikan = document.getElementById("pendidikan").value;
        var pendidikan = $("#pendidikan").val();
        var pekerjaan = $("input[name='pekerjaan']:text").val();
        var nmortu = $("input[name='nmortu']:text").val();
        var alamat = $("input[name='alamat']:text").val();
        var pkrortu = $("input[name='pkrortu']:text").val();
        var pkrsi = $("input[name='pkrsi']:text").val();
        var prov = $("#prov").val();
        var provtext = $("#prov option:selected").text();
        var kab = $("#kab").val();
        var kabtext = $("#kab option:selected").text();
        var kec = $("#kec").val();
        var kectext = $("#kec option:selected").text();
        var kel = $("#kel").val();
        var keltext = $("#kel option:selected").text();
        var telp = $("input[name='telp']:text").val();
        var hp = $("input[name='hp']:text").val();
        var stat = $("#stat").val();
        var pj = $("input[name='pj']:text").val();
        var telppj = $("input[name='telppj']:text").val();
        var nmk = $("input[name='nmk']:text").val();
        var ak = $("input[name='ak']:text").val();
        var id = $("input[name='id']:text").val();
        var ag = $("#ag").val();
        var jk = $("input[name='jk']:checked").val();
        var gol = $("#gol").val();
        var goldarah = $("#goldarah").val();
        var suku = $("#suku").val();
        var asp = $("#asp").val();
        var kh = $("#kh").val();
        var nokartu = $("input[name='nokartu']:text").val();
        // var foto = $('#foto').val();
        var negara = $("#negara").val();
        var kelashak = $("#kelashak").val();
        var datacek = [title, nmpas, daftar, t4lahir, lahir, pendidikan, nmortu, alamat, prov, kab, kec, kel, hp, stat, pj, telppj, ag, suku, gol, jk, asp, negara, nik];
        
        var dtcek;

        console.log(nik);

        pdaflen = daftar.length;
        if (pdaflen != 10) {
            $.notify("Format Tanggal Daftar Salah", "error");
            return;
        }

        plen = lahir.length;
        if (plen != 10) {
            $.notify("Format Tanggal Lahir Salah", "error");
            return;
        }

        datacek.some(function(item, index) {
            if (item == "") {
                modalloadtutup();
                dtcek = false;
                return;
            }
        });
        if (dtcek == false) {
            $.notify("Data kurang lengkap", "error");
            return;
        }
        var formdata = new FormData();
        formdata.append('id', id);
        formdata.append('nik', nik);
        formdata.append('title', title);
        formdata.append('nmpas', nmpas);
        formdata.append('daftar', daftar);
        formdata.append('nmp', nmp);
        formdata.append('t4lahir', t4lahir);
        formdata.append('lahir', lahir);
        formdata.append('pendidikan', pendidikan);
        formdata.append('pekerjaan', pekerjaan);
        formdata.append('nmortu', nmortu);
        formdata.append('pkrortu', pkrortu);
        formdata.append('pkrsi', pkrsi);
        formdata.append('alamat', alamat);
        formdata.append('prov', prov);
        formdata.append('provtext', provtext);
        formdata.append('kab', kab);
        formdata.append('kabtext', kabtext);
        formdata.append('kec', kec);
        formdata.append('kectext', kectext);
        formdata.append('kel', kel);
        formdata.append('keltext', keltext);
        formdata.append('telp', telp);
        formdata.append('hp', hp);
        formdata.append('stat', stat);
        formdata.append('pj', pj);
        formdata.append('telppj', telppj);
        formdata.append('nmk', nmk);
        formdata.append('ak', ak);
        formdata.append('ag', ag);
        formdata.append('jk', jk);
        formdata.append('gol', gol);
        formdata.append('asp', asp);
        formdata.append('kh', kh);
        formdata.append('nokartu', nokartu);
        formdata.append('negara', negara);
        formdata.append('kelashak', kelashak);
        formdata.append('goldarah', goldarah);
        formdata.append('suku', suku);
        $.ajax({
            url: "<?php echo site_url(); ?>/registrasipasien/prosesubahpasien",
            type: "post",
            cache: false,
            contentType: false,
            processData: false,
            data: formdata,
            success: function(ajaxData) {
                var t = $.parseJSON(ajaxData);

                if (t.dtsukses == true) {
                    suksesalert();
                    modalloadtutup();
                    tutupmodal(t.norm);
                } else {
                    gagalalert(t.norm);
                    // modalloadtutup();
                }
            },
            error: function(ajaxData) {
                gagalalert();
                modalloadtutup();
            }
        });
    }
</script>