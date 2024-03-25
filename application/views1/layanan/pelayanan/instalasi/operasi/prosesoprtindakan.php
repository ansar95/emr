<?php
if ($pilihform == 0) {
?>
    <div class="col-md-6">
        <div class="form-group row col-spacing-row">
            <label class="col-md-3 col-form-label">Tanggal</label>
            <div class="col-md-9">
                <input type="text" class="form-control" name="tindakantgl" id="tindakantgl">
            </div>
        </div>
        <div class="form-group row col-spacing-row">
            <label class="col-md-3 col-form-label">Tindakan</label>
            <div class="col-md-9">
                <select class="form-control" style="width: 100%;" name="tdtindakan" id="tdtindakan" onchange="tdtindakan()">
                    <option value="">--Pilih--</option>
                    <?php
                    foreach ($dttindakan as $row) {
                    ?>
                        <option value="<?php echo $row->kode_tindakan; ?>"><?php echo $row->tindakan; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group row col-spacing-row">
            <label class="col-md-3 col-form-label">Biaya per Jasa</label>
            <div class="col-md-3">
                <input type="text" class="form-control" id="jasa" name="jasa" disabled>
            </div>
            <label class="col-md-3 col-form-label text-right">Tipe</label>
            <div class="col-md-3">
                <input type="text" class="form-control" id="tipe" name="tipe" disabled>
            </div>
        </div>
        <div class="form-group row col-spacing-row">
            <label class="col-sm-3 col-form-label">% Diskon</label>
            <div class="col-sm-4">
                <input type="number" class="form-control" name="tddiskon" id="tddiskon" value="0">
            </div>
            <div class="col-sm-5">
                <div class="custom-control custom-checkbox custom-control-inline">
                    <input type="checkbox" class="custom-control-input" name="tdumum" id="tdumum">
                    <label class="custom-control-label" for="tdumum">Berlaku Umum</label>
                </div>
            </div>
        </div>
        <div class="form-group row col-spacing-row">
            <label class="col-md-3 col-form-label">Dokter Operasi</label>
            <div class="col-md-6">
                <select class="form-control" style="width: 100%;" name="tddokter" id="tddokter">
                    <option value="">--Pilih--</option>
                    <?php
                    foreach ($dtdokter as $row) {
                    ?>
                        <option value="<?php echo $row->kode_dokter; ?>"><?php echo $row->nama_dokter; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="col-md-3">
                <input class="form-control" id="disc1" name="disc1" type="number" placeholder="Diskon">
            </div>
        </div>
        <div class="form-group row col-spacing-row">
            <label class="col-md-3 col-form-label">Asisten Operasi 1</label>
            <div class="col-md-6">
                <select class="form-control" style="width: 100%;" name="tddokterdua" id="tddokterdua">
                    <option value="">--Pilih--</option>
                    <?php
                    foreach ($dtdokterasisten as $row) {
                    ?>
                        <option value="<?php echo $row->kode_dokter; ?>"><?php echo $row->nama_dokter; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="col-md-3">
                <input class="form-control" id="disc2" name="disc2" type="number" placeholder="Diskon">
            </div>
        </div>
        <div class="form-group row col-spacing-row">
            <label class="col-md-3 col-form-label">Asisten Operasi 2</label>
            <div class="col-md-6">
                <select class="form-control" style="width: 100%;" name="tddoktertiga" id="tddoktertiga">
                    <option value="">--Pilih--</option>
                    <?php
                    foreach ($dtdokterasisten as $row) {
                    ?>
                        <option value="<?php echo $row->kode_dokter; ?>"><?php echo $row->nama_dokter; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="col-md-3">
                <input class="form-control" id="disc3" name="disc3" type="number" placeholder="Diskon">
            </div>
        </div>

    </div>
    <div class="col-md-6">
        <div class="form-group row col-spacing-row">
            <label class="col-md-3 col-form-label">Dokter Anastesi</label>
            <div class="col-md-9">
                <select class="form-control" style="width: 100%;" name="tdspesialis" id="tdspesialis">
                    <option value="">--Pilih--</option>
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
        <div class="form-group row col-spacing-row">
            <label class="col-md-3 col-form-label">Spesialis Anak</label>
            <div class="col-md-9">
                <select class="form-control" style="width: 100%;" name="tdanak" id="tdanak">
                    <option value="">--Pilih--</option>
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
        <div class="form-group row col-spacing-row">
            <label class="col-md-3 col-form-label">Penata Anastesi</label>
            <div class="col-md-9">
                <select class="form-control" style="width: 100%;" name="tdpenata" id="tdpenata">
                    <option value="">--Pilih--</option>
                    <?php
                    foreach ($dtpenata as $row) {
                    ?>
                        <option value="<?php echo $row->kode_dokter; ?>"><?php echo $row->nama_dokter; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group row col-spacing-row">
            <label class="col-md-3 col-form-label">Prw.Instrumen 1</label>
            <div class="col-md-9">
                <select class="form-control" style="width: 100%;" name="tdperawat" id="tdperawat">
                    <option value="">--Pilih--</option>
                    <?php
                    foreach ($dtperawat as $row) {
                    ?>
                        <option value="<?php echo $row->kode_dokter; ?>"><?php echo $row->nama_dokter; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group row col-spacing-row">
            <label class="col-md-3 col-form-label">Prw.Instrumen 2</label>
            <div class="col-md-9">
                <select class="form-control" style="width: 100%;" name="tdperawat2" id="tdperawat2">
                    <option value="">--Pilih--</option>
                    <?php
                    foreach ($dtperawat as $row) {
                    ?>
                        <option value="<?php echo $row->kode_dokter; ?>"><?php echo $row->nama_dokter; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group row col-spacing-row">
            <label class="col-md-3 col-form-label">Catatan</label>
            <div class="col-md-9">
                <textarea class="form-control col-sm-12" rows="3" id="catatan" name="catatan"></textarea>
            </div>
        </div>
    </div>
    <div class="col-md-12 text-right">
        <button onclick="simpandatatindakan();" class="btn btn-primary">Simpan</button>
    </div>
<?php
} else if ($pilihform == 1) {
?>

    <div class="col-md-6">
        <div class="form-group row col-spacing-row">
            <label class="col-md-3 col-form-label">Tanggal</label>
            <div class="col-md-9">
                <input type="text" class="form-control" name="tindakantgl" id="tindakantgl">
            </div>
        </div>
        <div class="form-group row col-spacing-row">
            <label class="col-md-3 col-form-label">Tindakan</label>
            <div class="col-md-9">
                <select class="form-control" style="width: 100%;" name="tdtindakan" id="tdtindakan" onchange="tdtindakan()">
                    <option value="">--Pilih--</option>
                    <?php
                    foreach ($dttindakan as $row) {
                    ?>
                        <option value="<?php echo $row->kode_tindakan; ?>" <?php if ($dataedit->tind == $row->kode_tindakan) {
                                                                                echo "selected";
                                                                            } ?>><?php echo $row->tindakan; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group row col-spacing-row">
            <label class="col-md-3 col-form-label">Biaya per Jasa</label>
            <div class="col-md-3">
                <input type="text" class="form-control" id="jasa" name="jasa" disabled value="<?php echo $dataedit->jasas; ?>">
            </div>
            <label class="col-md-3 col-form-label text-right">Tipe</label>
            <div class="col-md-3">
                <input type="text" class="form-control" id="tipe" name="tipe" disabled>
            </div>
        </div>
        <div class="form-group row col-spacing-row">
            <label class="col-sm-3 col-form-label">% Diskon</label>
            <div class="col-sm-4">
                <input type="number" class="form-control" name="tddiskon" id="tddiskon" value="<?php echo $dataedit->diskon; ?>">
            </div>
            <div class="col-sm-5">
                <div class="custom-control custom-checkbox custom-control-inline">
                    <input type="checkbox" class="custom-control-input" name="tdumum" id="tdumum" <?php if ($dataedit->nonasuransi == "1") {
                                                                                                        echo "checked";
                                                                                                    } ?>>
                    <label class="custom-control-label" for="tdumum">Berlaku Umum</label>
                </div>
            </div>
        </div>
        <div class="form-group row col-spacing-row">
            <label class="col-md-3 col-form-label">Dokter Operasi</label>
            <div class="col-md-6">
                <select class="form-control" style="width: 100%;" name="tddokter" id="tddokter">
                    <option value="">--Pilih--</option>
                    <?php
                    foreach ($dtdokter as $row) {
                    ?>
                        <option value="<?php echo $row->kode_dokter; ?>" <?php if ($dataedit->kode_dokter == $row->kode_dokter) {
                                                                                echo "selected";
                                                                            } ?>><?php echo $row->nama_dokter; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="col-md-3">
                <input class="form-control" id="disc1" name="disc1" type="number" placeholder="Diskon" value="<?php echo $dataedit->disc1; ?>">
            </div>
        </div>
        <div class="form-group row col-spacing-row">
            <label class="col-md-3 col-form-label">Asisten Operasi 1</label>
            <div class="col-md-6">
                <select class="form-control" style="width: 100%;" name="tddokterdua" id="tddokterdua">
                    <option value="">--Pilih--</option>
                    <?php
                    foreach ($dtdokterasisten as $row) {
                    ?>
                        <option value="<?php echo $row->kode_dokter; ?>" <?php if ($dataedit->kode_dokter2 == $row->kode_dokter) {
                                                                                echo "selected";
                                                                            } ?>><?php echo $row->nama_dokter; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="col-md-3">
                <input class="form-control" id="disc2" name="disc2" type="number" placeholder="Diskon" value="<?php echo $dataedit->disc2; ?>">
            </div>
        </div>
        <div class="form-group row col-spacing-row">
            <label class="col-md-3 col-form-label">Asisten Operasi 2</label>
            <div class="col-md-6">
                <select class="form-control" style="width: 100%;" name="tddoktertiga" id="tddoktertiga">
                    <option value="">--Pilih--</option>
                    <?php
                    foreach ($dtdokterasisten as $row) {
                    ?>
                        <option value="<?php echo $row->kode_dokter; ?>" <?php if ($dataedit->kode_dokter3 == $row->kode_dokter) {
                                                                                echo "selected";
                                                                            } ?>><?php echo $row->nama_dokter; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="col-md-3">
                <input class="form-control" id="disc3" name="disc3" type="number" placeholder="Diskon" value="<?php echo $dataedit->disc3; ?>">
            </div>
        </div>

    </div>
    <div class="col-md-6">
        <div class="form-group row col-spacing-row">
            <label class="col-md-3 col-form-label">Dokter Anastesi</label>
            <div class="col-md-9">
                <select class="form-control" style="width: 100%;" name="tdspesialis" id="tdspesialis">
                    <option value="">--Pilih--</option>
                    <?php
                    foreach ($dtdokter as $row) {
                    ?>
                        <option value="<?php echo $row->kode_dokter; ?>" <?php if ($dataedit->kode_anastesi == $row->kode_dokter) {
                                                                                echo "selected";
                                                                            } ?>><?php echo $row->nama_dokter; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group row col-spacing-row">
            <label class="col-md-3 col-form-label">Spesialis Anak</label>
            <div class="col-md-9">
                <select class="form-control" style="width: 100%;" name="tdanak" id="tdanak">
                    <option value="">--Pilih--</option>
                    <?php
                    foreach ($dtdokter as $row) {
                    ?>
                        <option value="<?php echo $row->kode_dokter; ?>" <?php if ($dataedit->kode_spe_anak == $row->kode_dokter) {
                                                                                echo "selected";
                                                                            } ?>><?php echo $row->nama_dokter; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group row col-spacing-row">
            <label class="col-md-3 col-form-label">Penata Anastesi</label>
            <div class="col-md-9">
                <select class="form-control" style="width: 100%;" name="tdpenata" id="tdpenata">
                    <option value="">--Pilih--</option>
                    <?php
                    foreach ($dtpenata as $row) {
                    ?>
                        <option value="<?php echo $row->kode_dokter; ?>" <?php if ($dataedit->kode_penata == $row->kode_dokter) {
                                                                                echo "selected";
                                                                            } ?>><?php echo $row->nama_dokter; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group row col-spacing-row">
            <label class="col-md-3 col-form-label">Prw.Instrumen 1</label>
            <div class="col-md-9">
                <select class="form-control" style="width: 100%;" name="tdperawat" id="tdperawat">
                    <option value="">--Pilih--</option>
                    <?php
                    foreach ($dtperawat as $row) {
                    ?>
                        <option value="<?php echo $row->kode_dokter; ?>" <?php if ($dataedit->kode_perawat == $row->kode_dokter) {
                                                                                echo "selected";
                                                                            } ?>><?php echo $row->nama_dokter; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group row col-spacing-row">
            <label class="col-md-3 col-form-label">Prw.Instrumen 2</label>
            <div class="col-md-9">
                <select class="form-control" style="width: 100%;" name="tdperawat2" id="tdperawat2">
                    <option value="">--Pilih--</option>
                    <?php
                    foreach ($dtperawat as $row) {
                    ?>
                        <option value="<?php echo $row->kode_dokter; ?>" <?php if ($dataedit->kode_perawat2 == $row->kode_dokter) {
                                                                                echo "selected";
                                                                            } ?>><?php echo $row->nama_dokter; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group row col-spacing-row">
            <label class="col-md-3 col-form-label">Catatan</label>
            <div class="col-md-9">
                <textarea class="form-control col-sm-12" rows="3" id="catatan" name="catatan"><?php echo $dataedit->catatan; ?></textarea>
            </div>
        </div>
    </div>
    <div class="col-md-12 text-right">
        <button onclick="ubahdataopr(<?php echo $dataedit->id; ?>);" class="btn btn-primary pull-right">Ubah</button>
        <button onclick="ubahopr();" class="btn btn-danger">Batal</button>
    </div>
<?php
}
?>
<script>
    $(function() {
        kebutuhanopr();
        tdtindakan();
    });
</script>