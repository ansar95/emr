<?php
if ($pilihform == 0) {
?>
	<div class="col-md-6">
		<div class="box box-info">
			<div class="box-body">
				<div class="form-group row col-spacing-row">
					<label for="inputEmail3" class="col-sm-3 control-label">Tanggal</label>
					<div class="col-sm-3">
						<input type="text" class="form-control" name="dtgl" id="dtgl">
					</div>
				</div>
				<div class="bootstrap-timepicker">
					<div class="form-group  row col-spacing-row">
						<label for="inputEmail3" class="col-sm-3 control-label">Jam</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="djam" name="djam">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="box box-info">
			<div class="box-body">
				<div class="form-group row col-spacing-row">
					<label for="inputEmail3" class="col-sm-3 control-label">Dokter</label>
					<div class="col-sm-9">
						<select class="form-control" style="width: 100%;" name="ddokter" id="ddokter">
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
					<label for="inputEmail3" class="col-sm-3 control-label">Type Kunjungan</label>
					<div class="col-sm-5">
						<select class="form-control" style="width: 100%;" type="text" name="dvisit" id="dvisit">
							<option value="VISITE">VISITE</option>
							<option value="KONSUL SPESIALIS">KONSUL SPESIALIS</option>
							<option value="DOKTER UGD">DOKTER UGD</option>
							<option value="DOKTER UMUM">DOKTER UMUM</option>
							<option value="KONSUL CYTO-DOKTER IGD">KONSUL CYTO-DOKTER IGD</option>
							<option value="KONSUL SUB SPESIALIS">KONSUL SUB SPESIALIS</option>
						</select>
					</div>
				</div>
				<div class="form-group  row col-spacing-row">
					<label for="inputEmail3" class="col-sm-3 control-label">% Diskon</label>
					<div class="col-sm-3">
						<input type="number" class="form-control" name="drdiskon" id="drdiskon">
					</div>
					<div class="col-sm-4">
						<div class="custom-control custom-checkbox custom-control-inline">
							<!-- <input type="checkbox" name="drumum" id="drumum"> Berlaku Umum -->
							<input type="checkbox" name="drumum" id="drumum" class="custom-control-input">
							<label class="custom-control-label" for="drumum">Berlaku Umum</label>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-12 text-right">
		<button onclick="simpandtdokter()" class="btn btn-primary pull-right">Simpan</button>
	</div>
<?php
} else if ($pilihform == 1) {
?>
	<div class="col-md-6">
		<div class="box box-info">
			<div class="box-body">
				<div class="form-group row col-spacing-row">
					<label for="inputEmail3" class="col-sm-3 control-label">Tanggal</label>
					<div class="col-sm-3">
						<input type="text" class="form-control" name="dtgl" id="dtgl" value="<?php echo $dataedit->tanggal; ?>">
					</div>
				</div>
				<div class="bootstrap-timepicker">
					<div class="form-group  row col-spacing-row">
						<label for="inputEmail3" class="col-sm-3 control-label">Jam</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="djam" name="djam" value="<?php echo $dataedit->jam; ?>">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="box box-info">
			<div class="box-body">
				<div class="form-group row col-spacing-row">
					<label for="inputEmail3" class="col-sm-3 control-label">Dokter</label>
					<div class="col-sm-9">
						<select class="form-control" style="width: 100%;" name="ddokter" id="ddokter">
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
					<label for="inputEmail3" class="col-sm-3 control-label">Type Kunjungan</label>
					<div class="col-sm-5">
						<select class="form-control" style="width: 100%;" type="text" name="dvisit" id="dvisit">
							<option value="VISITE" <?php if ($dataedit->visite == "VISITE") {
														echo "selected";
													} ?>>VISITE</option>
							<option value="KONSUL SPESIALIS" <?php if ($dataedit->visite == "KONSUL SPESIALIS") {
																	echo "selected";
																} ?>>KONSUL SPESIALIS</option>
							<option value="DOKTER UGD" <?php if ($dataedit->visite == "DOKTER UGD") {
															echo "selected";
														} ?>>DOKTER UGD</option>
							<option value="DOKTER UMUM" <?php if ($dataedit->visite == "DOKTER UMUM") {
															echo "selected";
														} ?>>DOKTER UMUM</option>
							<option value="KONSUL CYTO-DOKTER IGD" <?php if ($dataedit->visite == "KONSUL CYTO-DOKTER IGD") {
																		echo "selected";
																	} ?>>KONSUL CYTO-DOKTER IGD</option>
							<option value="KONSUL SUB SPESIALIS" <?php if ($dataedit->visite == "KONSUL SUB SPESIALIS") {
																		echo "selected";
																	} ?>>KONSUL SUB SPESIALIS</option>
						</select>
					</div>
				</div>
				<div class="form-group row col-spacing-row">
					<label for="inputEmail3" class="col-sm-3 control-label">% Diskon</label>
					<div class="col-sm-3">
						<input type="number" class="form-control" name="drdiskon" id="drdiskon" value="<?php echo $dataedit->diskon; ?>">
					</div>
					<div class="col-sm-4">
						<div class="custom-control custom-checkbox custom-control-inline">
							<!-- <input type="checkbox" name="drumum" id="drumum"> Berlaku Umum -->
							<input type="checkbox" name="drumum" id="drumum" class="custom-control-input" <?php if ($dataedit->nonasuransi == "1") {
																												echo "checked";
																											} ?> />
							<label class="custom-control-label" for="drumum">Berlaku Umum</label>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<button onclick="ubahdokter();" class="btn btn-dark">Batal</button>
	</div>
	<div class="col-md-6 text-right">
		<button onclick="ubahdatadokter(<?php echo $dataedit->id; ?>);" class="btn btn-danger pull-right">Ubah</button>
	</div>
<?php
}
?>
<script>
	$(function() {
		kebutuhandokter();
		<?php
		if ($pilihform == 1) {
		?>
			$('#dtgl').datepicker({
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