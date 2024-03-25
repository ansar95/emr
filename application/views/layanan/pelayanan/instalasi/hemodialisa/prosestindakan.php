<?php
if ($pilihform == 0) {
?>
<div class="box box-info">	
	<div class="col-md-6">	
			<div class="box-body">
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-3 control-label">Tindakan</label>
					<div class="col-sm-9">
						<select class="form-control" style="width: 100%;" name="tdtindakan" id="tdtindakan" onchange="tdtindakan();">
							<?php
							foreach($dttindakan as $row) {
							?>
							<option value="<?php echo $row->kode_tindakan; ?>"><?php echo $row->tindakan; ?></option>
							<?php
							}
							?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-3 control-label">Biaya per Jasa</label>
					<div class="col-sm-3">
						<input type="text" class="form-control" id="jasa" name="jasa" disabled>
					</div>
				</div>
			</div>
	</div>

	<div class="col-md-6">				
			<div class="box-body">
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-3 control-label">% Diskon</label>
					<div class="col-sm-2">
						<input type="number" class="form-control" name="tddiskon" id="tddiskon" value="0">
					</div>
					<div class="col-sm-3">
						<input type="checkbox" name="tdumum" id="tdumum"> Berlaku Umum
					</div>
				</div>																
			</div>
	</div>
</div>
<div class="col-md-12">
	<a onclick="simpandatatindakan();" class="btn btn-primary pull-right">Simpan</a>
</div>
<?php
} else if ($pilihform == 1) {
?>
<div class="box box-info">
	<div class="col-md-6">						
			<div class="box-body">
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-3 control-label">Tindakan</label>
					<div class="col-sm-9">
						<select class="form-control" style="width: 100%;" name="tdtindakan" id="tdtindakan" onchange="tdtindakan();">
							<?php
							foreach($dttindakan as $row) {
							?>
							<option value="<?php echo $row->kode_tindakan; ?>" <?php if ($dataedit->kode_tindakan == $row->kode_tindakan) { echo "selected";}?>><?php echo $row->tindakan; ?></option>
							<?php
							}
							?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-3 control-label">Biaya per Jasa</label>
					<div class="col-sm-3">
						<input type="text" class="form-control" id="jasa" name="jasa" value="<?php echo $dataedit->jasas;?>" disabled>
					</div>
				</div>
			</div>		
	</div>

	<div class="col-md-6">						
			<div class="box-body">
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-3 control-label">% Diskon</label>
					<div class="col-sm-2">
						<input type="number" class="form-control" name="tddiskon" id="tddiskon" value="<?php echo $dataedit->diskon;?>">	
					</div>
					<div class="col-sm-3">
						<input type="checkbox" name="tdumum" id="tdumum" <?php if ($dataedit->nonasuransi == "1") { echo "checked";}?>/> Berlaku Umum
					</div>
				</div>																
			</div>		
	</div>
</div>
<div class="col-md-12">
	<a onclick="ubahdatatindakan(<?php echo $dataedit->id;?>);" class="btn btn-primary pull-right">Ubah</a>
	<a onclick="ubahtindakan();"  class="btn btn-danger">Batal</a>
</div>
<?php
}
?>
<script>
	$(function () {
		kebutuhantindakan();
	});
</script>
