<?php 
if ($pilihform == 0) {
?>
<div class="col-md-6">
	<div class="box box-info">				
		<div class="box-body">
            <div class="input-group">
                <span class="input-group-addon">
                    <b>Tanggal</b>
                </span>
                <input type="text" class="form-control" name="bstgl" id="bstgl">
            </div>
            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <b>Tindakan</b>
                                                                </span>
                <select class="form-control" style="width: 100%;" type="text" name="bstindakan" id="bstindakan" onchange="bstindakan()">
                    <?php
                    foreach($dttindakan as $row) {
                        if ($row->lahir == "1") {
                            ?>
                            <option value="<?php echo $row->kode_tindakan; ?>"><?php echo $row->tindakan; ?></option>
                            <?php
                        }}
                    ?>
                </select>
            </div>
            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <b>Biaya Jasa</b>
                                                                </span>
                <input type="text" class="form-control" id="jasa" name="jasa" disabled>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">% Diskon</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control" name="tddiskon" id="tddiskon" >
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="tdumum" id="tdumum" > Berlaku Umum
                </div>
            </div>
            <div class="input-group">
                <span class="input-group-addon">
                    <input type="radio" value="dokter" name="pilihan" id="pilihan"/> &nbsp; <b>Dokter</b>
                </span>
                <select class="form-control" style="width: 100%;" name="bsdokter" id="bsdokter">
                    <option value="">--pilih Dokter--</option>
                    <?php
                    foreach($dtbsrdokter as $row) {
                        ?>
                        <option value="<?php echo $row->kode_dokter; ?>"><?php echo $row->nama_dokter; ?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
            <div class="input-group">
                <span class="input-group-addon">
                    <input type="radio" value="bidan" name="pilihan" id="pilihan"/> &nbsp; <b>Bidan</b>
                </span>
                <select class="form-control" style="width: 100%;" name="bsbidan" id="bsbidan">
                    <option value="">--pilih Bidan--</option>
                    <?php
                    foreach($dtbsrbidan as $row) {
                        ?>
                        <option value="<?php echo $row->kode_dokter; ?>"><?php echo $row->nama_dokter; ?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
		</div>
	</div>
</div>
<div class="col-md-6">
	<div class="box box-info">				
		<div class="box-body">
            <div class="input-group">
                <span class="input-group-addon">
                    <b>Spesialis Anak</b>
                </span>
                <select class="form-control" style="width: 100%;" name="bsspe" id="bsspe">
                    <option value="">--pilih Spesialis Anak--</option>
                    <?php
                    foreach($dtbsrdokter as $row) {
                        ?>
                        <option value="<?php echo $row->kode_dokter; ?>"><?php echo $row->nama_dokter; ?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
            <div class="input-group">
                <span class="input-group-addon">
                    <b>Dokter Anastesi</b>
                </span>
                <select class="form-control" style="width: 100%;" name="bsanastesi" id="bsanastesi">
                    <option value="">--pilih Dokter Anastesi--</option>
                    <?php
                    foreach($dtbsrdokter as $row) {
                        ?>
                        <option value="<?php echo $row->kode_dokter; ?>"><?php echo $row->nama_dokter; ?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
            <div class="input-group">
                <span class="input-group-addon">
                    <b>Perawat</b>
                </span>
                <select class="form-control" style="width: 100%;" name="tdperawat" id="tdperawat">
                    <option value="">--Pilih--</option>
                    <?php
                    foreach($dtperawat as $row) {
                        ?>
                        <option value="<?php echo $row->kode_dokter; ?>"><?php echo $row->nama_dokter; ?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
            <div class="input-group">
                <span class="input-group-addon">
                    <b>Catatan</b>
                </span>
                <textarea class="form-control col-sm-12" rows="3" id="catatan" name="catatan"></textarea>
            </div>
		</div>
	</div>
</div>
<div class="col-md-12">
	<a onclick="simpandatatindakanbersalin();" class="btn btn-primary pull-right">Simpan</a>
</div>
<?php
} else if ($pilihform == 1) {
?>
<div class="col-md-6">
	<div class="box box-info">				
		<div class="box-body">
            <div class="input-group">
                <span class="input-group-addon">
                    <b>Tanggal</b>
                </span>
                <input type="text" class="form-control" name="bstgl" id="bstgl" value="<?php echo $dataedit->tanggal;?>">
            </div>
            <div class="input-group">
                <span class="input-group-addon">
                    <b>Tindakan</b>
                </span>
                <select class="form-control" style="width: 100%;" type="text" name="bstindakan" id="bstindakan">
                    <option value="" <?php if ($dataedit->tindakan == "") { echo "selected";}?>>--pilih tindakan--</option>
                    <?php
                    foreach($dttindakan as $row) {
                        if ($row->lahir == "1") {
                            ?>
                            <option value="<?php echo $row->kode_tindakan; ?>" <?php if ($dataedit->kode_tindakan == $row->kode_tindakan) { echo "selected";}?>><?php echo $row->tindakan; ?></option>
                            <?php
                        }}
                    ?>
                </select>
            </div>
            <div class="input-group">
                <span class="input-group-addon">
                    <b>Biaya Jasa</b>
                </span>
                <input type="text" class="form-control" id="jasa" name="jasa" disabled value="<?php echo $dataedit->jasas; ?>">
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">% Diskon</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control" name="tddiskon" id="tddiskon" value="<?php echo $dataedit->diskon; ?>">
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="tdumum" id="tdumum" <?php if ($dataedit->nonasuransi == "1") { echo "checked"; }?>> Berlaku Umum
                </div>
            </div>
            <div class="input-group">
				<span class="input-group-addon">
					<input type="radio" value="dokter" name="pilihan" id="pilihan" <?php if ($dataedit->kode_dokter != "") { echo "checked";}?>/> &nbsp; <b>Dokter</b>
				</span>
                <select class="form-control" style="width: 100%;" name="bsdokter" id="bsdokter">
                    <option value="" <?php if ($dataedit->kode_dokter == "") { echo "selected";}?>>--pilih Dokter--</option>
                    <?php
                    foreach($dtbsrdokter as $row) {
                        ?>
                        <option value="<?php echo $row->kode_dokter; ?>" <?php if ($dataedit->kode_dokter == $row->kode_dokter) { echo "selected";}?>><?php echo $row->nama_dokter; ?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
            <div class="input-group">
				<span class="input-group-addon">
					<input type="radio" value="bidan" name="pilihan" id="pilihan" <?php if ($dataedit->kode_bidan != "") { echo "checked";}?>/> &nbsp; <b>Bidan</b>
				</span>
                <select class="form-control" style="width: 100%;" name="bsbidan" id="bsbidan">
                    <option value="" <?php if ($dataedit->kode_bidan == "") { echo "selected";}?>>--pilih Bidan--</option>
                    <?php
                    foreach($dtbsrbidan as $row) {
                        ?>
                        <option value="<?php echo $row->kode_dokter; ?>" <?php if ($dataedit->kode_bidan == $row->kode_dokter) { echo "selected";}?>><?php echo $row->nama_dokter; ?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
		</div>
	</div>
</div>
<div class="col-md-6">
	<div class="box box-info">				
		<div class="box-body">
			<div class="input-group">
				<span class="input-group-addon">
					<b>Spesialis Anak</b>
				</span>
				<select class="form-control" style="width: 100%;" name="bsspe" id="bsspe">
                    <option value="" <?php if ($dataedit->kode_spe_anak == "") { echo "selected";}?>>--pilih Spesialis Anak--</option>
					<?php
					foreach($dtbsrdokter as $row) {
					?>
					<option value="<?php echo $row->kode_dokter; ?>" <?php if ($dataedit->kode_spe_anak == $row->kode_dokter) { echo "selected";}?>><?php echo $row->nama_dokter; ?></option>
					<?php
					}
					?>
				</select>
			</div>
			<div class="input-group">
				<span class="input-group-addon">
					<b>Dokter Anastesi</b>
				</span>
				<select class="form-control" style="width: 100%;" name="bsanastesi" id="bsanastesi">
                    <option value="" <?php if ($dataedit->kode_dokanastesi == "") { echo "selected";}?>>--pilih Dokter Anastesi--</option>
					<?php
					foreach($dtbsrdokter as $row) {
					?>
					<option value="<?php echo $row->kode_dokter; ?>" <?php if ($dataedit->kode_dokanastesi == $row->kode_dokter) { echo "selected";}?>><?php echo $row->nama_dokter; ?></option>
					<?php
					}
					?>
				</select>
			</div>
            <div class="input-group">
                <span class="input-group-addon">
                    <b>Perawat</b>
                </span>
                <select class="form-control" style="width: 100%;" name="bsperawat" id="bsperawat">
                    <option value="">--Pilih--</option>
                    <?php
                    foreach($dtperawat as $row) {
                        ?>
                        <option value="<?php echo $row->kode_dokter; ?>" <?php if ($dataedit->kode_perawat == $row->kode_dokter) { echo "selected";}?>><?php echo $row->nama_dokter; ?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
            <div class="input-group">
                <span class="input-group-addon">
                    <b>Catatan</b>
                </span>
                <textarea class="form-control col-sm-12" rows="3" id="bscatatan" name="bscatatan"><?php echo $dataedit->catatan;?></textarea>
            </div>
		</div>
	</div>
</div>
<div class="col-md-12">
	<a onclick="ubahdatatindakanbsr(<?php echo $dataedit->id;?>);" class="btn btn-primary pull-right">Ubah</a>
	<a onclick="ubahtindakanbsr();"  class="btn btn-danger">Batal</a>
</div>
<?php
}
?>
<script>
	$(function () {
		kebutuhantindakanbsr();
	});
</script>
