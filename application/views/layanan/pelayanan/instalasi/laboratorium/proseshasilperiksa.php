<?php
if ($pilihform == 0) {
?>
<div class="box box-info">						
	<div class="col-md-6">																	
		<div class="box-body">
			<div class="form-group">
				<label class="col-sm-3 control-label">Jenis Lab</label>
				<div class="col-sm-5">
					<select class="form-control" style="width: 100%;" name="hsjenis" id="hsjenis" onchange="changejenislab()">
						<option value="">--Pilih Jenis--</option>
						<?php
						foreach($dtjenislab as $row) {
						?>
						<option value="<?php echo $row->kode_labjenis; ?>"><?php echo $row->nama_labjenis; ?></option>
						<?php
						}
						?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Item Lab</label>
				<div class="col-sm-5">
					<select class="form-control" style="width: 100%;" name="hsitem" id="hsitem" >
					</select>
				</div>
			</div>
		</div>													
	</div>
	<div class="col-md-6">															
		<div class="box-body">
			<div class="form-group">
				<label class="col-sm-3 control-label">Result</label>
				<div class="col-sm-9">
					<textarea rows="3" class="form-control" name="resul" id="resul"></textarea>
				</div>
			</div>
		</div>
	</div>							
</div>
<div class="col-md-12">
	<a onclick="simpandatahasil();" class="btn btn-primary pull-right">Simpan</a>
</div>
<?php
} else if ($pilihform == 1) {
?>
<div class="box box-info">						
	<div class="col-md-6">																	
		<div class="box-body">
			<div class="form-group">
				<label class="col-sm-3 control-label">Jenis Lab</label>
				<div class="col-sm-5">
					<select class="form-control" style="width: 100%;" name="hsjenis" id="hsjenis" onchange="changejenislab()">
						<option value="">--Pilih Jenis--</option>
						<?php
						foreach($dtjenislab as $row) {
						?>
						<option value="<?php echo $row->kode_labjenis; ?>" <?php if ($dataedit->kode_labjenis == $row->kode_labjenis) { echo "selected";}?> ><?php echo $row->nama_labjenis; ?></option>
						<?php
						}
						?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Item Lab</label>
				<div class="col-sm-5">
					<select class="form-control" style="width: 100%;" name="hsitem" id="hsitem" >
					</select>
				</div>
			</div>
		</div>													
	</div>
	<div class="col-md-6">															
		<div class="box-body">
			<div class="form-group">
				<label class="col-sm-3 control-label">Result</label>
				<div class="col-sm-9">
					<textarea rows="3" class="form-control" name="resul" id="resul"><?php echo $dataedit->result;?></textarea>
				</div>
			</div>
		</div>
	</div>							
</div>
<div class="col-md-12">
	<a onclick="ubahdatahasil(<?php echo $dataedit->id;?>);" class="btn btn-primary pull-right">Ubah</a>
	<a onclick="ubahhasil();"  class="btn btn-danger">Batal</a>
</div>
<script>
	var kodehasilitem = "<?php echo $dataedit->kode_labitem; ?>"
	$(function () {
		kebutuhanhasil();
		changejenislab(0);
	});
</script>
<?php
}
?>
<script>
	$(function () {
		kebutuhanhasil();
	});
</script>
