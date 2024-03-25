<?php
if ($pilihform == 0) {
?>
	<div class="col-md-6">
		<div class="form-group row col-spacing-row">
			<label class="col-md-3 col-form-label">Tanggal</label>
			<div class="col-md-9">
				<input type="text" class="form-control" name="dtgl" id="dtgl">
			</div>
		</div>
		<div class="form-group row col-spacing-row">
			<label class="col-md-3 col-form-label">Jam</label>
			<div class="col-md-9">
				<div class="bootstrap-timepicker">
					<input type="text" class="form-control" id="djam" name="djam">
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group row col-spacing-row">
			<label class="col-md-3 col-form-label">Dokter</label>
			<div class="col-md-9">
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
			<label class="col-md-3 col-form-label">Visite/Konsul/Dokter Jaga</label>
			<div class="col-md-9">
				<select class="form-control" style="width: 100%;" type="text" name="dvisit" id="dvisit">
					<option value="VISITE">VISITE</option>
					<option value="KONSUL">KONSUL</option>
					<option value="DOKTER UGD">DOKTER UGD</option>
					<option value="DOKTER UMUM">DOKTER UMUM</option>
				</select>
			</div>
		</div>
	</div>
	<div class="col-md-12 text-right">
		<button onclick="simpandtdokter();" class="btn btn-primary">Simpan</button>
	</div>
<?php
} else if ($pilihform == 1) {
?>
	<div class="col-md-6">
		<div class="form-group row col-spacing-row">
			<label class="col-md-3 col-form-label">Tanggal</label>
			<div class="col-md-9">
				<input type="text" class="form-control" name="dtgl" id="dtgl" value="<?php echo $dataedit->tanggal; ?>">
			</div>
		</div>
		<div class="form-group row col-spacing-row">
			<label class="col-md-3 col-form-label">Jam</label>
			<div class="col-md-9">
				<div class="bootstrap-timepicker">
					<input type="text" class="form-control" id="djam" name="djam" value="<?php echo $dataedit->jam; ?>">
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group row col-spacing-row">
			<label class="col-md-3 col-form-label">Dokter</label>
			<div class="col-md-9">
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
			<label class="col-md-3 col-form-label">Visite/Konsul/Dokter Jaga</label>
			<div class="col-md-9">
				<select class="form-control" style="width: 100%;" type="text" name="dvisit" id="dvisit">
					<option value="VISITE" <?php if ($dataedit->visite == "VISITE") {
												echo "selected";
											} ?>>VISITE</option>
					<option value="KONSUL" <?php if ($dataedit->visite == "KONSUL") {
												echo "selected";
											} ?>>KONSUL</option>
					<option value="DOKTER UGD" <?php if ($dataedit->visite == "DOKTER UGD") {
													echo "selected";
												} ?>>DOKTER UGD</option>
					<option value="DOKTER UMUM" <?php if ($dataedit->visite == "DOKTER UMUM") {
													echo "selected";
												} ?>>DOKTER UMUM</option>
				</select>
			</div>
		</div>
	</div>
	<div class="col-md-12 text-right">
		<button onclick="ubahdatadokter(<?php echo $dataedit->id; ?>);" class="btn btn-primary pull-right">Ubah</button>
		<button onclick="ubahdokter();" class="btn btn-danger">Batal</button>
	</div>
<?php
}
?>
<script>
	$(function() {
		kebutuhandokter();
	});
</script>