<?php
if ($pilihform == 0) {
?>
	<div class="col-md-6">
		<div class="form-group row col-spacing-row">
			<label class="col-sm-3 col-form-label">Tanggal</label>
			<div class="col-sm-9">
				<input type="text" class="form-control" name="tdtgl" id="tdtgl">
			</div>
		</div>
		<div class="form-group row col-spacing-row">
			<label class="col-sm-3 col-form-label">Jam</label>
			<div class="col-sm-9">
				<input type="time" id="tdwaktu" name="tdwaktu" class="form-control" id="time">
			</div>
		</div>
		<div class="form-group row col-spacing-row">
			<label class="col-sm-3 col-form-label">Dokter</label>
			<div class="col-sm-9">
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
			<label class="col-sm-3 col-form-label">Pelaksana 1</label>
			<div class="col-sm-9">
				<select class="form-control" style="width: 100%;" type="text" name="pel1" id="pel1">
					<option value="">--pilih pelaksana--</option>
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
			<label class="col-sm-3 col-form-label">Pelaksana 2</label>
			<div class="col-sm-9">
				<select class="form-control" style="width: 100%;" type="text" name="pel2" id="pel2">
					<option value="">--pilih pelaksana--</option>
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
			<label class="col-sm-3 col-form-label">Tindakan</label>
			<div class="col-sm-9">
				<select class="form-control" style="width: 100%;" type="text" name="tdtindakan" id="tdtindakan" onchange="tdtindakan()">
					<option value="">--pilih tindakan--</option>
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
			<label class="col-sm-3 col-form-label">Biaya per Jasa</label>
			<div class="col-sm-9">
				<input type="text" class="form-control" id="jasa" name="jasa" disabled>
			</div>
		</div>
		<div class="form-group row col-spacing-row">
			<label class="col-sm-3 col-form-label">Jumlah</label>
			<div class="col-sm-4">
				<input type="number" class="form-control" name="tdjml" id="tdjml" value="1">
			</div>
			<div class="col-sm-5">
				<div class="custom-control custom-checkbox custom-control-inline">
					<input type="checkbox" class="custom-control-input" name="tdperawat" id="tdperawat">
					<label class="custom-control-label" for="tdperawat">Dilakukan oleh perawat</label>
				</div>
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
	</div>
	<div class="col-md-12 text-right">
		<button onclick="simpandatatindakan();" class="btn btn-primary">Simpan</button>
	</div>
<?php
} else if ($pilihform == 1) {
?>
	<div class="col-md-6">
		<div class="form-group row col-spacing-row">
			<label class="col-sm-3 col-form-label">Tanggal</label>
			<div class="col-sm-9">
				<input type="text" class="form-control" name="tdtgl" id="tdtgl" value="<?php echo $dataedit->tanggal; ?>">
			</div>
		</div>
		<div class="form-group row col-spacing-row">
			<label class="col-sm-3 col-form-label">Jam</label>
			<div class="col-sm-9">
				<input type="text" class="form-control" id="tdwaktu" name="tdwaktu" value="<?php echo $dataedit->jam; ?>">
			</div>
		</div>
		<div class="form-group row col-spacing-row">
			<label class="col-sm-3 col-form-label">Dokter</label>
			<div class="col-sm-9">
				<select class="form-control" style="width: 100%;" name="tddokter" id="tddokter">
					<?php
					foreach ($dtdokter as $row) {
					?>
						<option value="<?php echo $row->kode_dokter; ?>" <?php if ($dataedit->nama_dokter == $row->nama_dokter) {
																				echo "selected";
																			} ?>><?php echo $row->nama_dokter; ?></option>
					<?php
					}
					?>
				</select>
			</div>
		</div>
		<div class="form-group row col-spacing-row">
			<label class="col-sm-3 col-form-label">Pelaksana 1</label>
			<div class="col-sm-9">
				<select class="form-control" style="width: 100%;" type="text" name="pel1" id="pel1">
					<option value="">--pilih pelaksana--</option>
					<?php
					foreach ($dtperawat as $row) {
					?>
						<option value="<?php echo $row->kode_dokter; ?>" <?php if ($dataedit->kode_pelaksana_satu == $row->kode_dokter) {
																				echo "selected";
																			} ?>><?php echo $row->nama_dokter; ?></option>
					<?php
					}
					?>
				</select>
			</div>
		</div>
		<div class="form-group row col-spacing-row">
			<label class="col-sm-3 col-form-label">Pelaksana 2</label>
			<div class="col-sm-9">
				<select class="form-control" style="width: 100%;" type="text" name="pel2" id="pel2">
					<option value="">--pilih pelaksana--</option>
					<?php
					foreach ($dtperawat as $row) {
					?>
						<option value="<?php echo $row->kode_dokter; ?>" <?php if ($dataedit->kode_pelaksana_dua == $row->kode_dokter) {
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
			<label class="col-sm-3 col-form-label">Tindakan</label>
			<div class="col-sm-9">
				<select class="form-control" style="width: 100%;" name="tdtindakan" id="tdtindakan" onchange="tdtindakan();">
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
			<label class="col-sm-3 col-form-label">Biaya per Jasa</label>
			<div class="col-sm-9">
				<input type="text" class="form-control" id="jasa" name="jasa" value="<?php echo $dataedit->jasas; ?>" disabled>
			</div>
		</div>
		<div class="form-group row col-spacing-row">
			<label class="col-sm-3 col-form-label">Jumlah</label>
			<div class="col-sm-4">
				<input type="number" class="form-control" name="tdjml" id="tdjml" value="1">
			</div>
			<div class="col-sm-5">
				<div class="custom-control custom-checkbox custom-control-inline">
					<input type="checkbox" class="custom-control-input" name="tdperawat" id="tdperawat" <?php if ($dataedit->perawatsaja == "1") {
																											echo "checked";
																										} ?>>
					<label class="custom-control-label" for="tdperawat">Dilakukan oleh perawat</label>
				</div>
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
	</div>
	<div class="col-md-6">
		<button onclick="ubahtindakan();" class="btn btn-dark">Batal</button>
	</div>
	<div class="col-md-6 text-right">
		<button onclick="ubahdatatindakan(<?php echo $dataedit->id; ?>);" class="btn btn-danger">Ubah</button>
	</div>
<?php
}
?>
<script>
	$(function() {
		kebutuhantindakan();
		<?php
		if ($pilihform == 1) {
		?>
			$('#tdtgl').datepicker({
				autoclose: true,
				dateFormat: 'dd-mm-yy',
				changeMonth: true,
				changeYear: true,
				yearRange: "-100:+00"
			}).datepicker("setDate", "<?php echo date_format(date_create($dataedit->tanggal), "d-m-Y"); ?>");
		<?php
		}
		?>
	});
</script>