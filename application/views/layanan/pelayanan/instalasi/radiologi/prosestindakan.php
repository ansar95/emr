<?php
if ($pilihform == 0) {
?>
	<div class="col-md-7">
		<div class="form-group row col-spacing-row">
			<label class="col-md-3 col-form-label">Tindakan</label>
			<div class="col-md-9">
				<select class="form-control" style="width: 100%;" name="tdtindakan" id="tdtindakan" onchange="tdtindakan();">
					<option value="">--pilihan--</option>
					<?php
					foreach ($dttindakan as $row) {
					?>
						<option value="<?php echo $row->kode_tindakan; ?>"><?php echo $row->tindakan; ?></option>
					<?php
					}
					?>
				</select>
			</div>
		</div>
		<div class="form-group row col-spacing-row">
			<label class="col-md-3 col-form-label">Biaya per Jasa</label>
			<div class="col-md-9">
				<input type="text" class="form-control" id="jasa" name="jasa" disabled>
			</div>
		</div>
		<div class="form-group row col-spacing-row">
			<label class="col-sm-3 col-form-label">% Diskon</label>
			<div class="col-sm-4">
				<input type="number" class="form-control" name="tddiskon" id="tddiskon" value="0">
			</div>
			<div class="col-sm-5">
				<div class="custom-control custom-checkbox custom-control-inline">
					<input type="checkbox" class="custom-control-input" name="tdumum" id="tdumum">
					<label class="custom-control-label" for="tdumum">Berlaku Umum</label>
				</div>
			</div>
		</div>
		<div class="form-group row col-spacing-row">
			<label class="col-md-3 col-form-label">Hasil Pemeriksaan</label>
			<div class="col-md-9">
				<textarea rows="6" class="form-control" name="hasilperiksa" id="hasilperiksa"></textarea>
			</div>
		</div>
		<div class="form-group row col-spacing-row">
			<label class="col-md-3 col-form-label">Kesan</label>
			<div class="col-md-9">
				<textarea rows="2" class="form-control" name="kesan" id="kesan"></textarea>
			</div>
		</div>
		<br>
		<div class="form-group row col-spacing-row">
			<label class="col-md-3 col-form-label">Template Standart</label>
			<div class="col-md-9">
				<button onclick="templatefoto();" class="btn btn-warning btn-sm mx-1" id="tombolfoto">Template Foto</button>
				<button onclick="templateusg();" class="btn btn-info btn-sm mx-1" id="tombolusg">Template USG</button>
				<button onclick="templatescan();" class="btn btn-danger btn-sm mx-1" id="tombolscan">Template CT Scan</button>
			</div>	
		</div>

	</div>
	<div class="col-md-5">
							<div class="form-group row col-spacing-row">
								<label class="col-md-12 col-form-label">KELENGKAPAN DATA PASIEN</label>
							</div>
							<div class="form-group row col-spacing-row">
								<label class="col-md-3 col-form-label">Jns.Pemeriksaan</label>
								<div class="col-md-9">
									<input type="text" class="form-control" id="jpemeriksaan" name="jpemeriksaan">
								</div>
							</div>
							<div class="form-group row col-spacing-row">
								<label class="col-md-3 col-form-label">No. Foto</label>
								<div class="col-md-9">
									<input type="text" class="form-control" id="nofoto" name="nofoto">
								</div>
							</div>
							<div class="form-group row col-spacing-row">
								<label class="col-md-3 col-form-label">Klinis</label>
								<div class="col-md-9">
									<input type="text" class="form-control" id="klinis" name="klinis">
								</div>
							</div>
						</div>
	<div class="col-md-12 text-right">
		<button onclick="simpandatatindakan();" class="btn btn-primary">Simpan</button>
	</div>
<?php
} else if ($pilihform == 1) {
?>
	<div class="col-md-7">
		<div class="form-group row col-spacing-row">
			<label class="col-md-3 col-form-label">Tindakan</label>
			<div class="col-md-9">
				<select class="form-control" style="width: 100%;" name="tdtindakan" id="tdtindakan" onchange="tdtindakan();">
					<?php
					foreach ($dttindakan as $row) {
					?>
						<option value="<?php echo $row->kode_tindakan; ?>" <?php if ($dataedit->kode_tindakan == $row->kode_tindakan) {
																				echo "selected";
																			} ?>><?php echo $row->tindakan; ?></option>
					<?php
					}
					?>
				</select>
			</div>
		</div>
		<div class="form-group row col-spacing-row">
			<label class="col-md-3 col-form-label">Biaya per Jasa</label>
			<div class="col-md-9">
				<input type="text" class="form-control" id="jasa" name="jasa" value="<?php echo $dataedit->jasas; ?>" disabled>
			</div>
		</div>
		<div class="form-group row col-spacing-row">
			<label class="col-sm-3 col-form-label">% Diskon</label>
			<div class="col-sm-3">
				<input type="number" class="form-control" name="tddiskon" id="tddiskon" value="<?php echo $dataedit->diskon; ?>">
			</div>
			<div class="col-sm-5">
				<div class="custom-control custom-checkbox custom-control-inline">
					<input type="checkbox" class="custom-control-input" name="tdumum" id="tdumum" <?php if ($dataedit->nonasuransi == "1") {
																										echo "checked";
																									} ?>>
					<label class="custom-control-label" for="tdumum">Berlaku Umum</label>
				</div>
			</div>
		</div>
		<div class="form-group row col-spacing-row">
			<label class="col-md-3 col-form-label">Hasil Pemeriksaan</label>
			<div class="col-md-9">
				<textarea rows="6" class="form-control" name="hasilperiksa" id="hasilperiksa"><?php echo $dataedit->hasil_pemeriksaan; ?></textarea>
			</div>
		</div>
		<div class="form-group row col-spacing-row">
			<label class="col-md-3 col-form-label">Kesan</label>
			<div class="col-md-9">
				<textarea rows="2" class="form-control" name="kesan" id="kesan"><?php echo $dataedit->kesan; ?></textarea>
			</div>
		</div>
		<br>
		<div class="form-group row col-spacing-row">
			<label class="col-md-3 col-form-label">Template Standart</label>
			<div class="col-md-9">
				<button onclick="templatefoto();" class="btn btn-warning btn-sm mx-1" id="tombolfoto">Template Foto</button>
				<button onclick="templateusg();" class="btn btn-info btn-sm mx-1" id="tombolusg">Template USG</button>
				<button onclick="templatescan();" class="btn btn-danger btn-sm mx-1" id="tombolscan">Template CT Scan</button>
			</div>	
		</div>
	</div>
	<div class="col-md-5">
							<div class="form-group row col-spacing-row">
								<label class="col-md-12 col-form-label">KELENGKAPAN DATA PASIEN</label>
							</div>
							<div class="form-group row col-spacing-row">
								<label class="col-md-3 col-form-label">Jns.Pemeriksaan</label>
								<div class="col-md-9">
									<input type="text" class="form-control" id="jpemeriksaan" name="jpemeriksaan" value="<?php echo $dataedit->jpemeriksaan; ?>">
								</div>
							</div>
							<div class="form-group row col-spacing-row">
								<label class="col-md-3 col-form-label">No. Foto</label>
								<div class="col-md-9">
									<input type="text" class="form-control" id="nofoto" name="nofoto" value="<?php echo $dataedit->nofoto; ?>">
								</div>
							</div>
							<div class="form-group row col-spacing-row">
								<label class="col-md-3 col-form-label">Klinis</label>
								<div class="col-md-9">
									<input type="text" class="form-control" id="klinis" name="klinis" value="<?php echo $dataedit->klinis; ?>">
								</div>
							</div>
	</div>
	<div class="col-md-6">
		<button onclick="ubahtindakan();" class="btn btn-danger text-left">Batal</button>
	</div>
	<div class="col-md-6 text-right ">
		<button onclick="ubahdatatindakan(<?php echo $dataedit->id; ?>);" class="btn btn-primary pull-right">Simpan</button>
	</div>
<?php
}
?>
<script>
	$(function() {
		kebutuhantindakan();
	});

	function templatefoto() {
		// $("#hasilperiksa").append('asdsadadasdsadads');
		$("#hasilperiksa").load('../assets/img/isi.html');
		$("#kesan").load('../assets/img/kesan.html');
	}
</script>