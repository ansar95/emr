<?php
if ($pilihform == 0) {
?>
	<div class="col-md-6">
		<div class="form-group row col-spacing-row">
			<label class="col-sm-3 col-form-label">Tanggal</label>
			<div class="col-sm-9">
				<input type="text" class="form-control" name="bhptgl" id="bhptgl">
			</div>
		</div>
		<div class="form-group row col-spacing-row">
			<label class="col-sm-3 col-form-label">BHP</label>
			<div class="col-sm-9">
				<select class="form-control" style="width: 100%;" name="bhpbhp" id="bhpbhp" onchange="prosbhp()">
					<option value="">--pilihan--</option>
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
		<div class="form-group row col-spacing-row">
			<label class="col-sm-3 col-form-label">Qty</label>
			<div class="col-sm-4">
				<input type="number" class="form-control" name="bhpqty" id="bhpqty">
			</div>
			<div class="col-sm-5">
				<div class="custom-control custom-checkbox custom-control-inline">
					<input type="checkbox" class="custom-control-input" name="bhpnonbilling" id="bhpnonbilling">
					<label class="custom-control-label" for="bhpnonbilling">BHP / Obat Non Billing</label>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group row col-spacing-row">
			<label class="col-sm-3 col-form-label">Satuan Pakai</label>
			<div class="col-sm-9">
				<input type="text" class="form-control" name="bhpstauan" id="bhpstauan" disabled>
			</div>
		</div>
		<div class="form-group row col-spacing-row">
			<label class="col-sm-3 col-form-label">Harga Satuan</label>
			<div class="col-sm-9">
				<input type="text" class="form-control" name="bhpharga" id="bhpharga" disabled>
			</div>
		</div>
		<div class="form-group row col-spacing-row">
			<label class="col-sm-3 col-form-label">% Diskon</label>
			<div class="col-sm-4">
				<input type="number" class="form-control" name="bhpdiskon" id="bhpdiskon">
			</div>
			<div class="col-sm-5">
				<div class="custom-control custom-checkbox custom-control-inline">
					<input type="checkbox" class="custom-control-input" name="bhpdumum" id="bhpdumum">
					<label class="custom-control-label" for="bhpdumum">Berlaku Umum</label>
				</div>
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
			<label class="col-sm-3 col-form-label">Tanggal</label>
			<div class="col-sm-9">
						<input type="text" class="form-control" name="bhptgl" id="bhptgl" value="<?php echo $dataedit->tanggal; ?>">
			</div>
		</div>
		<div class="form-group row col-spacing-row">
			<label class="col-sm-3 col-form-label">BHP</label>
			<div class="col-sm-9">
			<select class="form-control" style="width: 100%;" name="bhpbhp" id="bhpbhp" onchange="prosbhp()">
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
		<div class="form-group row col-spacing-row">
			<label class="col-sm-3 col-form-label">Qty</label>
			<div class="col-sm-4">
						<input type="number" class="form-control" name="bhpqty" id="bhpqty" value="<?php echo $dataedit->qty; ?>">
			</div>
			<div class="col-sm-5">
				<div class="custom-control custom-checkbox custom-control-inline">
					<input type="checkbox" class="custom-control-input" name="bhpnonbilling" id="bhpnonbilling"  <?php if ($dataedit->nonbill == "1") {
																							echo "checked";
																						} ?>>
					<label class="custom-control-label" for="bhpnonbilling">BHP / Obat Non Billing</label>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group row col-spacing-row">
			<label class="col-sm-3 col-form-label">Satuan Pakai</label>
			<div class="col-sm-9">
						<input type="text" class="form-control" name="bhpstauan" id="bhpstauan" value="<?php echo $dataedit->satuanpakai; ?>" disabled>
			</div>
		</div>
		<div class="form-group row col-spacing-row">
			<label class="col-sm-3 col-form-label">Harga Satuan</label>
			<div class="col-sm-9">
						<input type="text" class="form-control" name="bhpharga" id="bhpharga" value="<?php echo $dataedit->hargapakai; ?>" disabled>
			</div>
		</div>
		<div class="form-group row col-spacing-row">
			<label class="col-sm-3 col-form-label">% Diskon</label>
			<div class="col-sm-4">
						<input type="number" class="form-control" name="bhpdiskon" id="bhpdiskon" value="<?php echo $dataedit->diskon; ?>">
			</div>
			<div class="col-sm-5">
				<div class="custom-control custom-checkbox custom-control-inline">
					<input type="checkbox" class="custom-control-input" name="bhpdumum" id="bhpdumum" <?php if (trim($dataedit->nonasuransi) == "1") {
																											echo "checked";
																										} ?>>
					<label class="custom-control-label" for="bhpdumum">Berlaku Umum</label>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<button onclick="ubahbhp();" class="btn btn-dark">Batal</button>
	</div>
	<div class="col-md-6 text-right">
		<button onclick="ubahdatabhp(<?php echo $dataedit->id; ?>);" class="btn btn-danger">Ubah</button>
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