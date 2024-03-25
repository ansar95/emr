<?php
if ($pilihform == 0) {
?>
	<div class="col-md-6">
		<div class="box box-info">
			<div class="box-body">
				<div class="form-group row col-spacing-row">
					<label for="inputEmail3" class="col-sm-3 control-label">Tanggal</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="drtgl" id="drtgl">
					</div>
				</div>
				<div class="form-group row col-spacing-row">
					<label for="inputEmail3" class="col-sm-3 control-label">Jumlah Kantung</label>
					<div class="col-sm-4">
						<input type="number" class="form-control" name="drjml" id="drjml">
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="box box-info">
			<div class="box-body">
				<div class="form-group row col-spacing-row">
					<label for="inputEmail3" class="col-sm-3 control-label">Golongan Darah</label>
					<div class="col-sm-3">
						<select class="form-control" style="width: 100%;" name="drgol" id="drgol">
							<option value="A">A</option>
							<option value="A+">A+</option>
							<option value="B">B</option>
							<option value="B+">B+</option>
							<option value="AB">AB</option>
							<option value="AB+">AB+</option>
							<option value="O">O</option>
						</select>
					</div>
				</div>
				<div class="form-group row col-spacing-row">
					<label for="inputEmail3" class="col-sm-3 control-label">% Diskon</label>
					<div class="col-sm-4">
						<input type="number" class="form-control" name="drhdiskon" id="drhdiskon">
					</div>
					<div class="col-sm-5">
						<div class="custom-control custom-checkbox custom-control-inline">
							<input type="checkbox" class="custom-control-input" name="drhdumum" id="drhdumum">
							<label class="custom-control-label" for="drhdumum">Berlaku Umum</label>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-12 text-right">
		<button onclick="simpankantung()" class="btn btn-primary pull-right">Simpan</button>
	</div>
<?php
} else if ($pilihform == 1) {
?>
	<div class="col-md-6">
		<div class="box box-info">
			<div class="box-body">
				<div class="form-group row col-spacing-row">
					<label for="inputEmail3" class="col-sm-3 control-label">Tanggal</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="drtgl" id="drtgl" value="<?php echo $dataedit->tanggal; ?>">
					</div>
				</div>
				<div class="form-group row col-spacing-row">
					<label for="inputEmail3" class="col-sm-3 control-label">Jumlah Kantung</label>
					<div class="col-sm-4">
						<input type="number" class="form-control" name="drjml" id="drjml" value="<?php echo $dataedit->qty; ?>">
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="box box-info">
			<div class="box-body">
				<div class="form-group row col-spacing-row">
					<label for="inputEmail3" class="col-sm-3 control-label">Golongan Darah</label>
					<div class="col-sm-3">
						<select class="form-control" style="width: 100%;" name="drgol" id="drgol">
							<option value="A" <?php if ($dataedit->goldarah == "A") {
													echo "selected";
												} ?>>A</option>
							<option value="A+" <?php if ($dataedit->goldarah == "A+") {
													echo "selected";
												} ?>>A+</option>
							<option value="B" <?php if ($dataedit->goldarah == "B") {
													echo "selected";
												} ?>>B</option>
							<option value="B+" <?php if ($dataedit->goldarah == "B+") {
													echo "selected";
												} ?>>B+</option>
							<option value="AB" <?php if ($dataedit->goldarah == "AB") {
													echo "selected";
												} ?>>AB</option>
							<option value="AB+" <?php if ($dataedit->goldarah == "AB+") {
													echo "selected";
												} ?>>AB+</option>
							<option value="O" <?php if ($dataedit->goldarah == "0") {
													echo "selected";
												} ?>>O</option>
						</select>
					</div>
				</div>
				<div class="form-group row col-spacing-row">
					<label for="inputEmail3" class="col-sm-3 control-label">% Diskon</label>
					<div class="col-sm-4">
						<input type="number" class="form-control" name="drhdiskon" id="drhdiskon" value="<?php echo $dataedit->diskon; ?>">
					</div>

					<div class="col-sm-5">
						<div class="custom-control custom-checkbox custom-control-inline">
							<input type="checkbox" class="custom-control-input" name="drhdumum" id="drhdumum" <?php if ($dataedit->nonasuransi == "1") {
																													echo "checked";
																												} ?>>
							<label class="custom-control-label" for="drhdumum">Berlaku Umum</label>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<button onclick="ubahdarah();" class="btn btn-secondary">Batal</button>
	</div>
	<div class="col-md-6 text-right">
		<button onclick="ubahdatadarah(<?php echo $dataedit->id; ?>);" class="btn btn-danger pull-right">Ubah</button>
	</div>
<?php
}
?>
<script>
	$(function() {
		kebutuhandarah();
		<?php
		if ($pilihform == 1) {
		?>
			$('#drtgl').datepicker({
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