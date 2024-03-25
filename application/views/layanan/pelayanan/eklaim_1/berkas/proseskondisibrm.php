<div class="col-md-5">
    <div class="form-group row col-spacing-row">
        <label class="col-md-3 col-form-label">Tanggal Setor</label>
        <div class="col-md-9">
            <input type="text" class="form-control" name="tglsetor" id="tglsetor" onchange="cekjumlahharisetor();">
        </div>
    </div>
    <div class="form-group row col-spacing-row">
        <label class="col-md-3 col-form-label"></label>
        <div class="col-md-9">
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" name="ts" id="tw" <?php if ($ambildata->waktusetor == 1) echo "checked"; ?> value="1" disabled />
                <label class="custom-control-label" for="tw">Tepat Waktu</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" name="ts" id="tw2" <?php if ($ambildata->waktusetor == 2) echo "checked"; ?> value="2" disabled />
                <label class="custom-control-label" for="tw"> 2 - 14 Hari</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" name="ts" id="tw3" <?php if ($ambildata->waktusetor == 3) echo "checked"; ?> value="3" disabled />
                <label class="custom-control-label" for="tw"> > 14 Hari</label>
            </div>
        </div>
    </div>
    <div class="form-group row col-spacing-row">
        <label class="col-md-3 col-form-label">Kondisi/Status</label>
        <div class="col-md-9">
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" name="ks" id="ks1" value="1" <?php if ($ambildata->kondisistatus == 1) echo "checked"; ?> />
                <label class="custom-control-label" for="ks1">Map</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" name="ks" id="ks2" value="2" <?php if ($ambildata->kondisistatus == 1) echo "checked"; ?> />
                <label class="custom-control-label" for="ks2"> Lembaran</label>
            </div>
        </div>
    </div>
    <div class="form-group row col-spacing-row">
        <label class="col-md-3 col-form-label">DPJP</label>
        <div class="col-md-9">
            <select class="form-control" style="width: 100%;" name="dokter" id="dokter">
                <?php
                foreach ($dtdokter as $row) {
                ?>
                    <option value="<?php echo $row->kode_dokter; ?>" <?php if ($ambildata->kode_dokter == $row->kode_dokter) echo 'selected'; ?>><?php echo $row->nama_dokter; ?></option>
                <?php
                }
                ?>
            </select>
        </div>
    </div>
    <div class="form-group row col-spacing-row">
        <label class="col-md-3 col-form-label">Jenis Pelayanan</label>
        <div class="col-md-9">
            <select class="form-control" style="width: 100%;" name="jp" id="jp">
                <?php
                foreach ($jnspelayanan as $row) {
                ?>
                    <option value="<?php echo $row->jenislayanan; ?>" <?php if ($ambildata->jenislayanan == $row->jenislayanan) echo 'selected'; ?>><?php echo $row->jenislayanan; ?></option>ßßß
                <?php
                }
                ?>
            </select>
        </div>
    </div>
</div>
<div class="col-md-3">
    <div class="form-group row col-spacing-row">
        <label class="col-sm-4 control-label">Kelengkapan Berkas</label>
        <input type="hidden" value="<?php echo $ambildata->id; ?>" id="id" name="id" />
        <div class="col-sm-8">
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" name="kb" id="kb1" onclick="lengkapberkastoggle(true)" value="1" <?php if ($ambildata->lengkap == 1) echo "checked"; ?> />
                <label class="custom-control-label" for="kb1">Lengkap</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" name="kb" id="kb2" onclick="lengkapberkastoggle(false)" value="2" <?php if ($ambildata->lengkap == 2) echo "checked"; ?> />
                <label class="custom-control-label" for="kb2"> Tidak Lengkap</label>
            </div>
        </div>
    </div>
    <div class="form-group row col-spacing-row">
        <!-- <label class="col-sm-6 control-label"></label> -->
        <label class="col-sm-12 control-label"> <small>(Tandai yang ada saja)</small></label>
    </div>
    <div class="form-group row col-spacing-row">
        <label class="col-sm-4 control-label">Operasi</label>
        <div class="col-sm-8">
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" name="op" id="op1" onclick="operasitoggle(true)" value="1" <?php if ($ambildata->operasi == 1) echo "checked"; ?>>
                <label class="custom-control-label" for="op1">Tidak Ada</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" name="op" id="op2" onclick="operasitoggle(false)" value="2" <?php if ($ambildata->operasi == 2) echo "checked"; ?>>
                <label class="custom-control-label" for="op2"> Ada</label>
            </div>
        </div>
    </div>
    <div class="form-group row ml-auto">
        <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" name="lapo" id="lapo" <?php if ($ambildata->laporanoperasi == 1) echo "checked"; ?> />
            <label class="custom-control-label" for="lapo">Laporan Operasi</label>
        </div>
        <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" name="lapa" id="lapa" <?php if ($ambildata->laporananastesi == 1) echo "checked"; ?> />
            <label class="custom-control-label" for="lapa">Laporan Anastesi</label>
        </div>
        <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" name="pero" id="pero" <?php if ($ambildata->persetujuanoperasi == 1) echo "checked"; ?> />
            <label class="custom-control-label" for="pero">Persetujuan Operasi</label>
        </div>

    </div>
</div>
<div class="col-md-2">
    <div class="form-group row">
        <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" name="idtfrs" id="idtfrs" <?php if ($ambildata->identitastfrs == 1) echo "checked"; ?> />
            <label class="custom-control-label" for="idtfrs">Identitas TFRS</label>
        </div>
        <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" name="diagu" id="diagu" <?php if ($ambildata->diagnosautama == 1) echo "checked"; ?> />
            <label class="custom-control-label" for="diagu">Diagnosa Utama</label>
        </div>
        <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" name="lapor" id="lapor" <?php if ($ambildata->laporanpenting == 1) echo "checked"; ?> />
            <label class="custom-control-label" for="lapor">Laporan Penting</label>
        </div>
        <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" name="resume" id="resume" <?php if ($ambildata->resume == 1) echo "checked"; ?> />
            <label class="custom-control-label" for="resume">Resume</label>
        </div>
    </div>
</div>
<div class="col-md-2">
    <div class="form-group row">
        <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" name="aut" id="aut" <?php if ($ambildata->autentifikasi == 1) echo "checked"; ?> />
            <label class="custom-control-label" for="aut">Autentikasi</label>
        </div>
        <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" name="nd" id="nd" <?php if ($ambildata->ceknamadokter == 1) echo "checked"; ?> />
            <label class="custom-control-label" for="nd">Nama Dokter</label>
        </div>
        <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" name="pb" id="pb" <?php if ($ambildata->pencatatanbaik == 1) echo "checked"; ?> />
            <label class="custom-control-label" for="pb">Pencatatan Baik</label>
        </div>
        <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" name="ttd" id="ttd" <?php if ($ambildata->cekttddokter == 1) echo "checked"; ?> />
            <label class="custom-control-label" for="ttd">TTD Dokter</label>
        </div>
    </div>
</div>
<div class="col-md-12 text-right">
    <button onclick="simpanbrm()" class="btn btn-primary pull-right">Simpan</button>
    <button onclick="batalformeditbrm();" class="btn btn-danger" id="btndiagbatal">Batal</button>
</div>

<script>
    $(document).ready(function() {
        kebutuhanbrm();
        <?php
        if ($ambildata->operasi == 2) {
            echo "operasitoggle(false)";
        } else {
            echo "operasitoggle(true)";
        }
        echo "\n";
        if ($ambildata->lengkap == 2) {
            echo "lengkapberkastoggle(false)";
        } else {
            echo "lengkapberkastoggle(true)";
        }
        echo "\n";
        ?>
        <?php
        try {
            if ($ambildata->tglsetor == "0000-00-00") {
                $tanggalSetor = "0";
            } else {
                $tanggalSetor = date_format(date_create($ambildata->tglsetor), "m/d/Y");
            }
        } catch (Exception $e) {
            $tanggalSetor = "0";
        }
        ?>
        $('#tglsetor').datepicker({
            autoclose: true
        }).datepicker("setDate", "<?php echo $tanggalSetor; ?>");
        cekjumlahharisetor();
    });


    function kebutuhanbrm() {
        $('#dokter').select2({
            tags: true
        })
        $('#jp').select2({
            tags: true
        })
    }

    function cekjumlahharisetor() {
        var notrans = document.getElementById("notrans").value;
        var tglsetor = document.getElementById("tglsetor").value;
        loadproses()
        $.ajax({
            url: "<?php echo site_url(); ?>/rm/statustglsetor",
            type: "GET",
            data: {
                notrans: notrans,
                tglsetor: tglsetor
            },
            success: function(ajaxData) {
                var dt = JSON.parse(ajaxData);
                if (dt.stat == true) {
                    if (parseInt(dt.hasil.d) < 2) {
                        document.getElementById("tw").checked = true
                    } else if ((parseInt(dt.hasil.d) >= 2) && (parseInt(dt.hasil.d) < 14)) {
                        document.getElementById("tw2").checked = true
                    } else if (parseInt(dt.hasil.d) >= 14) {
                        document.getElementById("tw3").checked = true
                    }
                } else {
                    $.notify("Gagal Memproses Data", "error");
                }
                loadhapus()
            },
            error: function(ajaxData) {
                loadhapus();
                $.notify("Gagal Memproses Data", "error");
            }
        });
    }
</script>