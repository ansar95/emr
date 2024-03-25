<?php
if ($pilihform == 0) {
?>
	<div class="col-md-6">
		<div class="form-group row col-spacing-row">
			<label class="col-sm-3 col-form-label">Tanggal</label>
			<div class="col-sm-9">
				<input type="text" class="form-control" name="otgl" id="otgl">
			</div>
		</div>
		<div class="form-group row col-spacing-row">
			<label class="col-sm-3 col-form-label">Jam</label>
			<div class="col-sm-9">
				<input type="text" class="form-control" name="ojam" id="ojam">
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group row col-spacing-row">
			<label class="col-sm-3 col-form-label">Jumlah</label>
			<div class="col-sm-9">
				<input type="number" class="form-control" name="ojml" id="ojml">
			</div>
		</div>
		<div class="form-group row col-spacing-row">
			<label class="col-sm-3 col-form-label">% Diskon</label>
			<div class="col-sm-4">
				<input type="number" class="form-control" name="odiskon" id="odiskon">
			</div>
			<div class="col-sm-5">
				<div class="custom-control custom-checkbox custom-control-inline">
					<input type="checkbox" class="custom-control-input" name="oumum" id="oumum">
					<label class="custom-control-label" for="oumum">Berlaku Umum</label>
				</div>
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
			<label class="col-sm-3 col-form-label">Tanggal</label>
			<div class="col-sm-9">
				<input type="text" class="form-control" name="otgl" id="otgl" value="<?php echo $dataedit->tgl_pakai;?>">
			</div>
		</div>
		<div class="form-group row col-spacing-row">
			<label class="col-sm-3 col-form-label">Jam</label>
			<div class="col-sm-9">
				<!-- <input type="text" class="form-control" name="ojam" id="ojam"> -->
				<input type="text" class="form-control" name="ojam" id="ojam" value="<?php echo $dataedit->jam;?>">

			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group row col-spacing-row">
			<label class="col-sm-3 col-form-label">Jumlah</label>
			<div class="col-sm-9">
				<!-- <input type="number" class="form-control" name="ojml" id="ojml"> -->
				<input type="number" class="form-control" name="ojml" id="ojml" value="<?php echo $dataedit->qty;?>">
			</div>
		</div>
		<div class="form-group row col-spacing-row">
			<label class="col-sm-3 col-form-label">% Diskon</label>
			<div class="col-sm-4">
				<!-- <input type="number" class="form-control" name="odiskon" id="odiskon"> -->
				<input type="number" class="form-control" name="odiskon" id="odiskon" value="<?php echo $dataedit->diskon;?>" >
			</div>
			<div class="col-sm-5">
				<div class="custom-control custom-checkbox custom-control-inline">
					<input type="checkbox" name="oumum" id="oumum" <?php if ($dataedit->nonasuransi == "1") { echo "checked";}?>/>
					<label class="custom-control-label" for="oumum">Berlaku Umum</label>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<button onclick="ubahodua();" class="btn btn-dark">Batal</button>
	</div>
	<div class="col-md-6 text-right">
		<button onclick="ubahdataodua(<?php echo $dataedit->id; ?>);" class="btn btn-danger">Ubah</button>
	</div>
<?php
}
?>
<script>
	$(function() {
		kebutuhanodua();
		<?php
		if ($pilihform == 1) {
		?>
			$('#otgl').datepicker({
				autoclose: true,
				dateFormat: 'dd-mm-yy',
				changeMonth: true,
				changeYear: true,
				yearRange: "-100:+00"
			}).datepicker("setDate", "<?php echo date_format(date_create($dataedit->tgl_pakai), "d-m-Y"); ?>");
		<?php
		}
		?>
	});
</script>