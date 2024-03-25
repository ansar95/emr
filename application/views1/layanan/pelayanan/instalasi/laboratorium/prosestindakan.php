<?php
if ($pilihform == 0) {
?>
<div class="box box-info">	
	<div class="col-md-12">	
														<div class="box-body">
															<div class="form-group">
																<label for="inputEmail3" class="col-sm-1 control-label">Tindakan</label>
																<div class="col-sm-4">
																	<select class="form-control" style="width: 100%;" name="tdtindakan" id="tdtindakan" onchange="tdtindakan();">
																		<option value="">--pilih tindakan--</option>
																		<?php
																		foreach($dttindakan as $row) {
																		?>
																		<option value="<?php echo $row->kode_tindakan; ?>"><?php echo $row->tindakan; ?></option>
																		<?php
																		}
																		?>
																	</select>
																</div>
																<label for="inputEmail3" class="col-sm-1 control-label">Harga</label>
																<div class="col-sm-1">
																	<input type="text" class="form-control" id="jasa" name="jasa" disabled>
																</div>
																<label for="inputEmail3" class="col-sm-1 control-label">% Diskon</label>
																<div class="col-sm-1">
																	<input type="number" class="form-control" name="tddiskon" id="tddiskon" value="0">
																</div>
																<div class="col-sm-3">
																	<input type="checkbox" name="tdumum" id="tdumum"> Berlaku Umum
																	<!-- <input type="checkbox" name="tdumum" id="tdumum" <?php if (trim($dtproseslab->golongan) == "UMUM") { echo "checked";} ?>/> Berlaku Umum -->
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
	<div class="col-md-12">						
			<div class="box-body">
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-1 control-label">Tindakan</label>
					<div class="col-sm-4">
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
					<label for="inputEmail3" class="col-sm-1 control-label">Harga</label>
					<div class="col-sm-1">
						<input type="text" class="form-control" id="jasa" name="jasa" value="<?php echo $dataedit->jasas;?>" disabled>
					</div>
			
					<label for="inputEmail3" class="col-sm-1 control-label">% Diskon</label>
					<div class="col-sm-1">
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


