<?php
if ($pilihform == 0) {
?>
	<div class="col-md-6">
		<div class="form-group row col-spacing-row">
			<label class="col-md-3 col-form-label">Tanggal</label>
			<div class="col-md-9">
				<input type="text" class="form-control" name="drtgl" id="drtgl">
			</div>
		</div>
		<div class="form-group row col-spacing-row">
			<label class="col-md-3 col-form-label">Jumlah Kantung</label>
			<div class="col-md-9">
				<input type="number" class="form-control" name="drjml" id="drjml">
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group row col-spacing-row">
			<label class="col-md-3 col-form-label">Golongan Darah</label>
			<div class="col-md-9">
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
	</div>
	<div class="col-md-12 text-right">
		<button onclick="simpankantung();" class="btn btn-primary">Simpan</button>
	</div>
<?php
} else if ($pilihform == 1) {
?>
	<div class="col-md-6">
		<div class="form-group row col-spacing-row">
			<label class="col-md-3 col-form-label">Tanggal</label>
			<div class="col-md-9">
				<input type="text" class="form-control" name="drtgl" id="drtgl" value="<?php echo $dataedit->tanggal; ?>">
			</div>
		</div>
		<div class="form-group row col-spacing-row">
			<label class="col-md-3 col-form-label">Jumlah Kantung</label>
			<div class="col-md-9">
				<input type="number" class="form-control" name="drjml" id="drjml" value="<?php echo $dataedit->qty; ?>">
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group row col-spacing-row">
			<label class="col-md-3 col-form-label">Golongan Darah</label>
			<div class="col-md-9">
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
	</div>
	<div class="col-md-12 text-right">
		<button onclick="ubahdatadarah(<?php echo $dataedit->id; ?>);" class="btn btn-primary pull-right">Ubah</button>
		<button onclick="ubahdarah();" class="btn btn-danger">Batal</button>
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
				autoclose: true
			}).datepicker("setDate", "<?php echo date_format(date_create($dataedit->tanggal), "m/d/Y"); ?>");
		<?php
		}
		?>
	});
</script>