<?php
if ($pilihform == 0) {
?>
	<div class="col-md-6">
		<div class="form-group row col-spacing-row">
			<label class="col-md-3 col-form-label">Tanggal</label>
			<div class="col-md-9">
				<input type="text" class="form-control" name="bhptgl" id="bhptgl">
			</div>
		</div>
		<div class="form-group row col-spacing-row">
			<label class="col-md-3 col-form-label">BHP</label>
			<div class="col-md-9">
				<div class="bootstrap-timepicker">
					<select class="form-control" style="width: 100%;" name="bhpbhp" id="bhpbhp" onchange="bhpbhp()">
						<?php
						foreach ($dtobat as $row) {
						?>
							<option value="<?php echo $row->kodeobat; ?>_<?php echo $row->id; ?>"><?php echo $row->namaobat; ?></option>
						<?php
						}
						?>
					</select>
				</div>
			</div>
		</div>
		<div class="form-group row col-spacing-row">
			<label class="col-md-3 col-form-label">Qty</label>
			<div class="col-md-9">
				<input type="number" class="form-control" name="bhpqty" id="bhpqty">

			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group row col-spacing-row">
			<label class="col-md-3 col-form-label">Satuan Pakai</label>
			<div class="col-md-9">
				<input type="text" class="form-control" name="bhpstauan" id="bhpstauan" disabled>
			</div>
		</div>
		<div class="form-group row col-spacing-row">
			<label class="col-md-3 col-form-label">Harga Satuan</label>
			<div class="col-md-9">
				<input type="text" class="form-control" name="bhpharga" id="bhpharga" disabled>
			</div>
		</div>
	</div>
	<div class="col-md-12 text-right">
		<button onclick="simpandatabhp();" class="btn btn-primary">Simpan</button>
	</div>
<?php
} else if ($pilihform == 1) {
?>
	<div class="col-md-6">
		<div class="form-group row col-spacing-row">
			<label class="col-md-3 col-form-label">Tanggal</label>
			<div class="col-md-9">
				<input type="text" class="form-control" name="bhptgl" id="bhptgl" value="<?php echo $dataedit->tanggal; ?>">
			</div>
		</div>
		<div class="form-group row col-spacing-row">
			<label class="col-md-3 col-form-label">BHP</label>
			<div class="col-md-9">
				<div class="bootstrap-timepicker">
					<select class="form-control" style="width: 100%;" name="bhpbhp" id="bhpbhp">
						<?php
						foreach ($dtobat as $row) {
						?>
							<option value="<?php echo $row->kodeobat; ?>_<?php echo $row->id; ?>" <?php if ($dataedit->kodeobat == $row->kodeobat) {
																										echo "selected";
																									} ?>><?php echo $row->namaobat; ?></option>
						<?php
						}
						?>
					</select>
				</div>
			</div>
		</div>
		<div class="form-group row col-spacing-row">
			<label class="col-md-3 col-form-label">Qty</label>
			<div class="col-md-9">
				<input type="number" class="form-control" name="bhpqty" id="bhpqty" value="<?php echo $dataedit->qty; ?>">
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group row col-spacing-row">
			<label class="col-md-3 col-form-label">Satuan Pakai</label>
			<div class="col-md-9">
				<input type="text" class="form-control" name="bhpstauan" id="bhpstauan" value="<?php echo $dataedit->satuanpakai; ?>" disabled>
			</div>
		</div>
		<div class="form-group row col-spacing-row">
			<label class="col-md-3 col-form-label">Harga Satuan</label>
			<div class="col-md-9">
				<input type="text" class="form-control" name="bhpharga" id="bhpharga" value="<?php echo $dataedit->hargapakai; ?>" disabled>
			</div>
		</div>
	</div>
	<div class="col-md-12 text-right">
		<button onclick="ubahdatabhp(<?php echo $dataedit->id; ?>);" class="btn btn-primary pull-right">Ubah</button>
		<button onclick="ubahbhp();" class="btn btn-danger">Batal</button>
	</div>

<?php
}
?>
<script>
	$(function() {
		kebutuhanbhp();

		<?php
		if ($pilihform == 1) {
		?>
			$('#bhptgl').datepicker({
				autoclose: true
			}).datepicker("setDate", "<?php echo date_format(date_create($dataedit->tanggal), "m/d/Y"); ?>");
		<?php
		}
		?>
	});
</script>