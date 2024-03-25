<?php
if ($pilihform == 0) {
?>
	<div class="col-md-6">
		<div class="form-group row col-spacing-row">
			<label class="col-md-3 col-form-label">Tanggal</label>
			<div class="col-md-9">
				<input type="text" class="form-control" name="tdtgl" id="tdtgl">
			</div>
		</div>
		<div class="form-group row col-spacing-row">
			<label class="col-md-3 col-form-label">Jam</label>
			<div class="col-md-9">
				<div class="bootstrap-timepicker">
					<input type="text" class="form-control" id="tdwaktu" name="tdwaktu">
				</div>
			</div>
		</div>
		<div class="form-group row col-spacing-row">
			<label class="col-md-3 col-form-label">Dokter</label>
			<div class="col-md-9">
				<select class="form-control" style="width: 100%;" name="tddokter" id="tddokter">
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
			<label class="col-md-3 col-form-label">Perawat</label>
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
	</div>
	<div class="col-md-6">
		<div class="form-group row col-spacing-row">
			<label class="col-md-3 col-form-label">Tindakan</label>
			<div class="col-md-9">
				<select class="form-control" style="width: 100%;" type="text" name="tdtindakan" id="tdtindakan">
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
			<label class="col-md-3 col-form-label">% Diskon</label>
			<div class="col-md-5">
				<input type="number" class="form-control" name="tddiskon" id="tddiskon">
			</div>
			<div class="col-md-4">
				<div class="custom-control custom-checkbox custom-control-inline">
					<input type="checkbox" class="custom-control-input" name="tdumum" id="tdumum">
					<label class="custom-control-label" for="tdumum">Berlaku Umum</label>
				</div>
			</div>
		</div>
		<div class="form-group row col-spacing-row">
			<label class="col-md-3 col-form-label">Jumlah</label>
			<div class="col-md-9">
				<input type="number" class="form-control" name="tdjml" id="tdjml">
			</div>
		</div>
		<div class="form-group row col-spacing-row">
			<label class="col-md-3 col-form-label"></label>
			<div class="col-md-9">
				<div class="custom-control custom-checkbox custom-control-inline">
					<input type="checkbox" class="custom-control-input" name="tdperawatsaja" id="tdperawatsaja">
					<label class="custom-control-label" for="tdperawatsaja">Dilakukan oleh Perawat</label>
				</div>
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
				<input type="text" class="form-control" name="tdtgl" id="tdtgl" value="<?php echo $dataedit->tanggal; ?>">
			</div>
		</div>
		<div class="form-group row col-spacing-row">
			<label class="col-md-3 col-form-label">Jam</label>
			<div class="col-md-9">
				<div class="bootstrap-timepicker">
					<input type="text" class="form-control" id="tdwaktu" name="tdwaktu" value="<?php echo $dataedit->jam; ?>">
				</div>
			</div>
		</div>
		<div class="form-group row col-spacing-row">
			<label class="col-md-3 col-form-label">Dokter</label>
			<div class="col-md-9">
				<select class="form-control" style="width: 100%;" name="tddokter" id="tddokter">
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
		</div>
		<div class="form-group row col-spacing-row">
			<label class="col-md-3 col-form-label">Perawat</label>
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
	</div>
	<div class="col-md-6">
		<div class="form-group row col-spacing-row">
			<label class="col-md-3 col-form-label">Tindakan</label>
			<div class="col-md-9">
				<select class="form-control" style="width: 100%;" type="text" name="tdtindakan" id="tdtindakan">
					<?php
					foreach ($dttindakan as $row) {
					?>
						<option value="<?php echo $row->kode_tindakan; ?>" <?php if ($dataedit->kode_tindakan == $row->kode_tindakan) {
																				echo "selected";
																			} ?>><?php echo $row->tindakan; ?></option>
					<?php
					}
					?>
				</select>
			</div>
		</div>
		<div class="form-group row col-spacing-row">
			<label class="col-md-3 col-form-label">% Diskon</label>
			<div class="col-md-5">
				<input type="number" class="form-control" name="tddiskon" id="tddiskon" value="<?php echo $dataedit->diskon; ?>">
			</div>
			<div class="col-md-4">
				<div class="custom-control custom-checkbox custom-control-inline">
					<input type="checkbox" class="custom-control-input" name="tdumum" id="tdumum" <?php if ($dataedit->nonasuransi == "1") {
																										echo "checked";
																									} ?>>
					<label class="custom-control-label" for="tdumum">Berlaku Umum</label>
				</div>
			</div>
		</div>
		<div class="form-group row col-spacing-row">
			<label class="col-md-3 col-form-label">Jumlah</label>
			<div class="col-md-9">
				<input type="number" class="form-control" name="tdjml" id="tdjml" value="<?php echo $dataedit->qty; ?>">
			</div>
		</div>
		<div class="form-group row col-spacing-row">
			<label class="col-md-3 col-form-label"></label>
			<div class="col-md-9">
				<div class="custom-control custom-checkbox custom-control-inline">
					<input type="checkbox" class="custom-control-input" name="tdperawatsaja" id="tdperawatsaja" <?php if ($dataedit->perawatsaja == "1") {
																													echo "checked";
																												} ?>>
					<label class="custom-control-label" for="tdperawatsaja">Dilakukan oleh Perawat</label>
				</div>
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
		<button onclick="ubahdatatindakan(<?php echo $dataedit->id; ?>);" class="btn btn-primary pull-right">Ubah</button>
		<button onclick="ubahtindakan();" class="btn btn-danger">Batal</button>
	</div>

<?php
}
?>
<script>
	$(function() {
		kebutuhantindakan();
	});
</script>