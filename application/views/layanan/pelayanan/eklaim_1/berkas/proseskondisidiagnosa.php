<?php
if ($form == 1) {
?>
    <div class="col-md-5">
        <div class="form-group row col-spacing-row">
            <label class="col-md-3 col-form-label">Diagnosa</label>
            <input type="hidden" name="id" id="id" value="<?php echo $ambildata->id; ?>">
            <div class="col-md-9">
                <select class="form-control" style="width: 100%;" name="diag" id="diag" onchange="tampilkandiag();">
                    <option value="">--Pilih--</option>
                    <?php
                    foreach ($diagnosa as $row) {
                        if ($ambildata->diagnosa == $row->sebab2) {
                            // echo '<option value="'.$row->id.'" selected>'.$row->icd_code . " - " . $row->jenis_penyakit_local.'</option>';
                            echo '<option value="' . $row->id . '">' . $row->icd_code . " - " . $row->jenis_penyakit_local . '</option>';
                        } else {
                            echo '<option value="' . $row->id . '" >' . $row->sebab2 . '</option>';
                            // echo '<option value="'.$row->id.'">'.$row->icd_code . " - " . $row->jenis_penyakit_local.'</option>';
                        }
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group row col-spacing-row">
            <label class="col-md-3 col-form-label">Diagnosa(Ind)</label>
            <div class="col-md-9">
                <input type="text" class="form-control" name="latin" id="latin" disabled>
            </div>
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group row col-spacing-row">
            <div class="custom-control custom-checkbox custom-control-inline">
                <input type="checkbox" class="custom-control-input" name="diagutama" id="diagutama" <?php if ($ambildata->type == 1) echo 'checked'; ?> />
                <label class="custom-control-label" for="diagutama">Diagnosa Utama</label>
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="form-group row col-spacing-row">
            <label class="col-md-3 col-form-label">Kode ICD</label>
            <div class="col-md-9">
                <input type="text" class="form-control" id="daftar" name="daftar" disabled>
            </div>
        </div>
        <div class="form-group row col-spacing-row">
            <label class="col-md-3 col-form-label">No. DTD</label>
            <div class="col-md-9">
                <input type="text" class="form-control" id="dtd" name="dtd" disabled>
            </div>
        </div>
    </div>
    <div class="col-md-12 text-right">
        <button onclick="ubahdiag();" class="btn btn-primary" disabled>Ubah</button>
        <button onclick="bataldiagnosa();" class="btn btn-danger" disabled>Batal</button>
    </div>
    <script>
        $(document).ready(function() {
            kebutuhandiagnosa()
            tampilkandiag(1);
        });
    </script>
<?php
} else {
?>
    <div class="col-md-5">
        <div class="form-group row col-spacing-row">
            <label class="col-md-3 col-form-label">Diagnosa</label>
            <div class="col-md-9">
                <select class="form-control" style="width: 100%;" name="diag" id="diag" onchange="tampilkandiag();">
                    <option value="">--Pilih--</option>
                    <?php
                    foreach ($diagnosa as $row) {
                        // echo '<option value="'.$row->id.'">'.$row->sebab2.'</option>';
                        echo '<option value="' . $row->id . '">' . $row->icd_code . " - " . $row->jenis_penyakit_local . '</option>';
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group row col-spacing-row">
            <label class="col-md-3 col-form-label">Diagnosa(Ind)</label>
            <div class="col-md-9">
                <input type="text" class="form-control" name="latin" id="latin" disabled>
            </div>
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group row col-spacing-row">
            <div class="custom-control custom-checkbox custom-control-inline">
                <input type="checkbox" class="custom-control-input" name="diagutama" id="diagutama" />
                <label class="custom-control-label" for="diagutama">Diagnosa Utama</label>
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="form-group row col-spacing-row">
            <label class="col-md-3 col-form-label">Kode ICD</label>
            <div class="col-md-9">
                <input type="text" class="form-control" id="daftar" name="daftar" disabled>
            </div>
        </div>
        <div class="form-group row col-spacing-row">
            <label class="col-md-3 col-form-label">No. DTD</label>
            <div class="col-md-9">
                <input type="text" class="form-control" id="dtd" name="dtd" disabled>
            </div>
        </div>
    </div>
    <div class="col-md-12 text-right">
        <button onclick="simpandiag();" class="btn btn-primary">Simpan</button>
    </div>

    <script>
        $(document).ready(function() {
            kebutuhandiagnosa()
        });
    </script>
<?php
}
?>