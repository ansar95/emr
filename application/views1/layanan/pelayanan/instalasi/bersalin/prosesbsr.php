<?php
if ($pilihform == 0) {
?>
	<div class="col-md-6">
		<div class="form-group row col-spacing-row">
			<label class="col-md-3 col-form-label">Tanggal</label>
			<div class="col-md-9">
				<input type="text" class="form-control" name="bstgl" id="bstgl">
			</div>
		</div>
		<div class="form-group row col-spacing-row">
			<label class="col-md-3 col-form-label">Tindakan</label>
			<div class="col-md-9">
				<select class="form-control" style="width: 100%;" type="text" name="bstindakan" id="bstindakan" onchange="bstindakan()">
					<option value="">--pilih Tindakan--</option>
					<?php
					foreach ($dttindakan as $row) {
						if ($row->lahir == "1") {
					?>
							<option value="<?php echo $row->kode_tindakan; ?>"><?php echo $row->tindakan; ?></option>
					<?php
						}
					}
					?>
				</select>
			</div>
		</div>
		<div class="form-group row col-spacing-row">
			<label class="col-md-3 col-form-label">Biaya Jasa</label>
			<div class="col-md-9">
				<input type="text" class="form-control" id="jasa" name="jasa" disabled>
			</div>
		</div>
		<div class="form-group row col-spacing-row">
			<div class="col-md-3">
				<div class="custom-control custom-radio custom-control-inline">
					<input type="radio" class="custom-control-input" name="pilihan" id="pilihan1">
					<label class="custom-control-label" for="pilihan1">Dokter</label>
				</div>
			</div>
			<div class="col-md-9">
				<select class="form-control" style="width: 100%;" value="dokter" name="bsdokter" id="bsdokter">
					<option value="">--pilih Dokter--</option>
					<?php
					foreach ($dtbsrdokter as $row) {
					?>
						<option value="<?php echo $row->kode_dokter; ?>"><?php echo $row->nama_dokter; ?></option>
					<?php
					}
					?>
				</select>
			</div>
		</div>
		<div class="form-group row col-spacing-row">
			<div class="col-md-3">
				<div class="custom-control custom-radio custom-control-inline">
					<input type="radio" class="custom-control-input" value="bidan" name="pilihan" id="pilihan2">
					<label class="custom-control-label" for="pilihan2">Bidan</label>
				</div>
			</div>
			<div class="col-md-9">
				<select class="form-control" style="width: 100%;" name="bsbidan" id="bsbidan">
					<option value="">--pilih Bidan--</option>
					<?php
					foreach ($dtbsrbidan as $row) {
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
			<label class="col-md-3 col-form-label">Spesialis Anak</label>
			<div class="col-md-9">
				<select class="form-control" style="width: 100%;" name="bsspe" id="bsspe">
					<option value="">--pilih Spesialis Anak--</option>
					<?php
					foreach ($dtbsrdokter as $row) {
					?>
						<option value="<?php echo $row->kode_dokter; ?>"><?php echo $row->nama_dokter; ?></option>
					<?php
					}
					?>
				</select>
			</div>
		</div>
		<div class="form-group row col-spacing-row">
			<label class="col-md-3 col-form-label">Dokter Anastesi</label>
			<div class="col-md-9">
				<select class="form-control" style="width: 100%;" name="bsperawat" id="bsperawat">
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
			<label class="col-md-3 col-form-label">Perawat</label>
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
			<label class="col-md-3 col-form-label">% Diskon</label>
			<div class="col-md-5">
				<input type="number" class="form-control" name="bsdiskon" id="bsdiskon">
			</div>
			<div class="col-md-4">
				<div class="custom-control custom-checkbox custom-control-inline">
					<input type="checkbox" class="custom-control-input" name="bsumum" id="bsumum">
					<label class="custom-control-label" for="bsumum">Berlaku Umum</label>
				</div>
			</div>
		</div>
		<div class="form-group row col-spacing-row">
			<label class="col-md-3 col-form-label">Catatan</label>
			<div class="col-md-9">
				<textarea class="form-control col-sm-12" rows="3" id="bscatatan" name="bscatatan"></textarea>
			</div>
		</div>
	</div>
	<div class="col-md-12 text-right">
		<button onclick="simpandatatindakanbersalin();" class="btn btn-primary">Simpan</button>
	</div>
<?php
} else if ($pilihform == 1) {
?>
	<div class="col-md-6">
		<div class="form-group row col-spacing-row">
			<label class="col-md-3 col-form-label">Tanggal</label>
			<div class="col-md-9">
				<input type="text" class="form-control" name="bstgl" id="bstgl" value="<?php echo $dataedit->tanggal; ?>">
			</div>
		</div>
		<div class="form-group row col-spacing-row">
			<label class="col-md-3 col-form-label">Tindakan</label>
			<div class="col-md-9">
				<select class="form-control" style="width: 100%;" type="text" name="bstindakan" id="bstindakan" onchange="bstindakan()">
					<option value="" <?php if ($dataedit->tindakan == "") {
											echo "selected";
										} ?>>--pilih tindakan--</option>
					<?php
					foreach ($dttindakan as $row) {
						if ($row->lahir == "1") {
					?>
							<option value="<?php echo $row->kode_tindakan; ?>" <?php if ($dataedit->kode_tindakan == $row->kode_tindakan) {
																					echo "selected";
																				} ?>><?php echo $row->tindakan; ?></option>
					<?php
						}
					}
					?>
				</select>
			</div>
		</div>
		<div class="form-group row col-spacing-row">
			<label class="col-md-3 col-form-label">Biaya Jasa</label>
			<div class="col-md-9">
				<input type="text" class="form-control" id="jasa" name="jasa" disabled value="<?php echo $dataedit->jasas; ?>">
			</div>
		</div>
		<div class="form-group row col-spacing-row">
			<div class="col-md-3">
				<div class="custom-control custom-radio custom-control-inline">
					<input type="radio" class="custom-control-input" value="dokter" name="pilihan" id="pilihan1" <?php if ($dataedit->kode_dokter != "") {
																														echo "checked";
																													} ?>>
					<label class="custom-control-label" for="pilihan1">Dokter</label>
				</div>
			</div>
			<div class="col-md-9">
				<select class="form-control" style="width: 100%;" name="bsdokter" id="bsdokter">
					<option value="" <?php if ($dataedit->kode_dokter == "") {
											echo "selected";
										} ?>>--pilih Dokter--</option>
					<?php
					foreach ($dtbsrdokter as $row) {
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
			<div class="col-md-3">
				<div class="custom-control custom-radio custom-control-inline">
					<input type="radio" class="custom-control-input" value="bidan" name="pilihan" id="pilihan2" <?php if ($dataedit->kode_bidan != "") {
																													echo "checked";
																												} ?>>
					<label class="custom-control-label" for="pilihan2">Bidan</label>
				</div>
			</div>
			<div class="col-md-9">
				<select class="form-control" style="width: 100%;" name="bsbidan" id="bsbidan">
					<option value="" <?php if ($dataedit->kode_bidan == "") {
											echo "selected";
										} ?>>--pilih Bidan--</option>
					<?php
					foreach ($dtbsrbidan as $row) {
					?>
						<option value="<?php echo $row->kode_dokter; ?>" <?php if ($dataedit->kode_bidan == $row->kode_dokter) {
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
			<label class="col-md-3 col-form-label">Spesialis Anak</label>
			<div class="col-md-9">
				<select class="form-control" style="width: 100%;" name="bsspe" id="bsspe">
					<option value="" <?php if ($dataedit->kode_spe_anak == "") {
											echo "selected";
										} ?>>--pilih Spesialis Anak--</option>
					<?php
					foreach ($dtbsrdokter as $row) {
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
			<label class="col-md-3 col-form-label">Dokter Anastesi</label>
			<div class="col-md-9">
				<select class="form-control" style="width: 100%;" name="bsanastesi" id="bsanastesi">
					<option value="" <?php if ($dataedit->kode_dokanastesi == "") {
											echo "selected";
										} ?>>--pilih Dokter Anastesi--</option>
					<?php
					foreach ($dtbsrdokter as $row) {
					?>
						<option value="<?php echo $row->kode_dokter; ?>" <?php if ($dataedit->kode_dokanastesi == $row->kode_dokter) {
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
				<select class="form-control" style="width: 100%;" name="bsperawat" id="bsperawat">
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
			<label class="col-md-3 col-form-label">% Diskon</label>
			<div class="col-md-5">
				<input type="number" class="form-control" name="bsdiskon" id="bsdiskon" value="<?php echo $dataedit->diskon; ?>">
			</div>
			<div class="col-md-4">
				<div class="custom-control custom-checkbox custom-control-inline">
					<input type="checkbox" class="custom-control-input" name="bsumum" id="bsumum" <?php if ($dataedit->nonasuransi == "1") {
																										echo "checked";
																									} ?>>
					<label class="custom-control-label" for="bsumum">Berlaku Umum</label>
				</div>
			</div>
		</div>
		<div class="form-group row col-spacing-row">
			<label class="col-md-3 col-form-label">Catatan</label>
			<div class="col-md-9">
				<textarea class="form-control col-sm-12" rows="3" id="bscatatan" name="bscatatan"><?php echo $dataedit->catatan; ?></textarea>
			</div>
		</div>
	</div>
	<div class="col-md-12 text-right">
		<button onclick="ubahdatatindakanbsr(<?php echo $dataedit->id; ?>);" class="btn btn-primary pull-right">Ubah</button>
		<button onclick="ubahtindakanbsr();" class="btn btn-danger">Batal</button>
	</div>

<?php
}
?>
<script>
	$(function() {
		kebutuhantindakanbsr();
	});
</script>