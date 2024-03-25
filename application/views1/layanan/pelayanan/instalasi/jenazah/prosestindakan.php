<?php
if ($pilihform == 0) {
?>
	<div class="col-md-6">
		<div class="form-group row col-spacing-row">
			<label class="col-md-3 col-form-label">Tanggal</label>
			<div class="col-md-9">
				<input type="text" class="form-control" name="tgljen" id="tgljen">
			</div>
		</div>
		<div class="form-group row col-spacing-row">
			<label class="col-md-3 col-form-label">Tindakan</label>
			<div class="col-md-9">
				<select class="form-control" style="width: 100%;" name="tdtindakan" id="tdtindakan" onchange="tdtindakan();">
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
			<label class="col-md-3 col-form-label">Biaya per Jasa</label>
			<div class="col-md-2">
				<input type="text" class="form-control" id="jasa" name="jasa" disabled>
			</div>
			<label class="col-md-2 col-form-label text-right">% Diskon</label>
			<div class="col-md-2">
				<input type="number" class="form-control" name="tddiskon" id="tddiskon" value="0">
			</div>
			<div class="col-md-3">
				<div class="custom-control custom-checkbox custom-control-inline">
					<input type="checkbox" class="custom-control-input" name="tdumum" id="tdumum">
					<label class="custom-control-label" for="tdumum">Berlaku Umum</label>
				</div>
			</div>
		</div>
		<div class="form-group row col-spacing-row">
			<label class="col-md-3 col-form-label">Catatan</label>
			<div class="col-md-9">
				<textarea rows="2" name="catatanresep" id="catatanresep" class="form-control"></textarea>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group row col-spacing-row">
			<label class="col-md-3 col-form-label">Dokter</label>
			<div class="col-md-9">
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
		</div>
		<div class="form-group row col-spacing-row">
			<label class="col-md-3 col-form-label">Asisten/Perawat</label>
			<div class="col-md-9">
				<select class="form-control" style="width: 100%;" name="tdperawat1" id="tdperawat1">
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
			<label class="col-md-3 col-form-label">Asisten/Perawat</label>
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
			<label class="col-md-3 col-form-label">Asisten/Perawat</label>
			<div class="col-md-9">
				<select class="form-control" style="width: 100%;" name="tdperawat3" id="tdperawat3">
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
				<input type="text" class="form-control" name="tgljen" id="tgljen">
			</div>
		</div>
		<div class="form-group row col-spacing-row">
			<label class="col-md-3 col-form-label">Tindakan</label>
			<div class="col-md-9">
				<select class="form-control" style="width: 100%;" name="tdtindakan" id="tdtindakan" onchange="tdtindakan();">
					<option value="">--pilih tindakan--</option>
					<?php
					foreach ($dttindakan as $row) {
					?>
						<!-- <option value="<?php echo $row->kode_tindakan; ?>"><?php echo $row->tindakan; ?></option> -->
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
			<label class="col-md-3 col-form-label">Biaya</label>
			<div class="col-md-2">
				<input type="text" class="form-control" id="jasa" name="jasa" value="<?php echo $dataedit->jasas; ?>" disabled>
			</div>
			<label class="col-md-2 col-form-label text-right">% Diskon</label>
			<div class="col-md-2">
				<input type="number" class="form-control" name="tddiskon" id="tddiskon" value="<?php echo $dataedit->diskon; ?>">
			</div>
			<div class="col-md-3">
				<div class="custom-control custom-checkbox custom-control-inline">
					<input type="checkbox" class="custom-control-input" name="tdumum" id="tdumum" <?php if ($dataedit->nonasuransi == "1") {
																										echo "checked";
																									} ?>>
					<label class="custom-control-label" for="tdumum">Berlaku Umum</label>
				</div>
			</div>
		</div>
		<div class="form-group row col-spacing-row">
			<label class="col-md-3 col-form-label">Catatan</label>
			<div class="col-md-9">
				<textarea rows="2" name="catatanresep" id="catatanresep" class="form-control"></textarea>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group row col-spacing-row">
			<label class="col-md-3 col-form-label">Dokter</label>
			<div class="col-md-9">
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
		</div>
		<div class="form-group row col-spacing-row">
			<label class="col-md-3 col-form-label">Asisten/Perawat</label>
			<div class="col-md-9">
				<select class="form-control" style="width: 100%;" name="tdperawat1" id="tdperawat1">
					<option value="">--Pilih--</option>
					<?php
					foreach ($dtperawat as $row) {
					?>
						<option value="<?php echo $row->kode_dokter; ?>" <?php if ($dataedit->kode_perawat1 == $row->kode_dokter) {
																				echo "selected";
																			} ?>><?php echo $row->nama_dokter; ?></option>
					<?php
					}
					?>
				</select>
			</div>

		</div>
		<div class="form-group row col-spacing-row">
			<label class="col-md-3 col-form-label">Asisten/Perawat</label>
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
			<label class="col-md-3 col-form-label">Asisten/Perawat</label>
			<div class="col-md-9">
				<select class="form-control" style="width: 100%;" name="tdperawat3" id="tdperawat3">
					<option value="">--Pilih--</option>
					<?php
					foreach ($dtperawat as $row) {
					?>
						<option value="<?php echo $row->kode_dokter; ?>" <?php if ($dataedit->kode_perawat3 == $row->kode_dokter) {
																				echo "selected";
																			} ?>><?php echo $row->nama_dokter; ?></option>
					<?php
					}
					?>
				</select>
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