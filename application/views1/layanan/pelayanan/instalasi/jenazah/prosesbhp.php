<?php
if ($pilihform == 0) {
?>
	<div class="col-md-6">
		<div class="form-group row col-spacing-row">
			<label class="col-md-3 col-form-label">BHP</label>
			<div class="col-md-9">
				<select class="form-control" style="width: 100%;" name="bhpbhp" id="bhpbhp" onchange="bhpbhp();">
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
		<div class="form-group row col-spacing-row">
			<label class="col-md-3 col-form-label">% Diskon</label>
			<div class="col-md-5">
				<input type="number" class="form-control" name="bhpdiskon" id="bhpdiskon" value="0">
			</div>
			<div class="col-md-4">
				<div class="custom-control custom-checkbox custom-control-inline">
					<input type="checkbox" class="custom-control-input" name="bhpumum" id="bhpumum">
					<label class="custom-control-label" for="bhpumum">Berlaku Umum</label>
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
			<label class="col-md-3 col-form-label">BHP</label>
			<div class="col-md-9">
				<select class="form-control" style="width: 100%;" name="bhpbhp" id="bhpbhp" onchange="bhpbhp();">
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
		<div class="form-group row col-spacing-row">
			<label class="col-md-3 col-form-label">% Diskon</label>
			<div class="col-md-5">
				<input type="number" class="form-control" name="bhpdiskon" id="bhpdiskon" value="<?php echo $dataedit->diskon; ?>">
			</div>
			<div class="col-md-4">
				<div class="custom-control custom-checkbox custom-control-inline">
					<input type="checkbox" class="custom-control-input" name="bhpumum" id="bhpumum" <?php if ($dataedit->nonasuransi == "1") {
																										echo "checked";
																									} ?>>
					<label class="custom-control-label" for="bhpumum">Berlaku Umum</label>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-12 text-right">
		<button onclick="ubahdatabhp(<?php echo $dataedit->id; ?>);" class="btn btn-primary pull-right">Ubah</button>
		<button onclick="ubahbhp();" class="btn btn-danger">Batal</button>
	</div>

	<div class="box box-info">
		<div class="col-md-6">
			<div class="box-body">
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-3 control-label">BHP</label>
					<div class="col-sm-9">
						<select class="form-control" style="width: 100%;" name="bhpbhp" id="bhpbhp" onchange="bhpbhp();">
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
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-3 control-label">Qty</label>
					<div class="col-sm-3">
						<input type="number" class="form-control" name="bhpqty" id="bhpqty" value="<?php echo $dataedit->qty; ?>">
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="box-body">
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-3 control-label">Satuan Pakai</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" name="bhpstauan" id="bhpstauan" value="<?php echo $dataedit->satuanpakai; ?>" disabled>
					</div>
				</div>
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-3 control-label">Harga Satuan</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" name="bhpharga" id="bhpharga" value="<?php echo $dataedit->hargapakai; ?>" disabled>
					</div>
				</div>
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-3 control-label">% Diskon</label>
					<div class="col-sm-2">
						<input type="number" class="form-control" name="bhpdiskon" id="bhpdiskon" value="<?php echo $dataedit->diskon; ?>">
					</div>
					<div class="col-sm-3">
						<input type="checkbox" name="bhpumum" id="bhpumum" <?php if ($dataedit->nonasuransi == "1") {
																				echo "checked";
																			} ?> /> Berlaku Umum
					</div>
				</div>

			</div>
		</div>
	</div>
	</div>
	<div class="col-md-12">
		<a onclick="ubahdatabhp(<?php echo $dataedit->id; ?>);" class="btn btn-primary pull-right">Ubah</a>
		<a onclick="ubahbhp();" class="btn btn-danger">Batal</a>
	</div>
<?php
}
?>
<script>
	$(function() {
		kebutuhanbhp();
	});
</script>