<?php
if ($pilihform == 0) {
?>
	<div class="col-md-6">
		<div class="form-group row col-spacing-row">
			<label class="col-md-3 col-form-label">Tanggal</label>
			<div class="col-md-9">
				<input type="text" class="form-control" name="otgl" id="otgl">
			</div>
		</div>
		<div class="form-group row col-spacing-row">
			<label class="col-md-3 col-form-label">Jam</label>
			<div class="col-md-9">
				<div class="bootstrap-timepicker">
					<input type="text" class="form-control" name="ojam" id="ojam">
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group row col-spacing-row">
			<label class="col-md-3 col-form-label">Jumlah</label>
			<div class="col-md-9">
				<input type="number" class="form-control" name="ojml" id="ojml">
			</div>
		</div>
	</div>
	<div class="col-md-12 text-right">
		<button onclick="simpandataodua();" class="btn btn-primary">Simpan</button>
	</div>
<?php
} else if ($pilihform == 1) {
?>
	<div class="col-md-6">
		<div class="form-group row col-spacing-row">
			<label class="col-md-3 col-form-label">Tanggal</label>
			<div class="col-md-9">
				<input type="text" class="form-control" name="otgl" id="otgl" value="<?php echo $dataedit->tgl_pakai; ?>">
			</div>
		</div>
		<div class="form-group row col-spacing-row">
			<label class="col-md-3 col-form-label">Jam</label>
			<div class="col-md-9">
				<div class="bootstrap-timepicker">
					<input type="text" class="form-control" name="ojam" id="ojam" value="<?php echo $dataedit->jam; ?>">
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group row col-spacing-row">
			<label class="col-md-3 col-form-label">Jumlah</label>
			<div class="col-md-9">
				<input type="number" class="form-control" name="ojml" id="ojml" value="<?php echo $dataedit->qty; ?>">
			</div>
		</div>
	</div>
	<div class="col-md-12 text-right">
		<button onclick="ubahdataodua(<?php echo $dataedit->id; ?>);" class="btn btn-primary pull-right">Ubah</button>
		<button onclick="ubahodua();" class="btn btn-danger">Batal</button>
	</div>
<?php
}
?>
<script>
	$(function() {
		kebutuhanodua();
	});
</script>