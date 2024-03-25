<?php 
if ($pilihform == 0) {
?>
<div class="col-md-6">
	<div class="box box-info">				
		<div class="box-body">
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-3 control-label">Tanggal</label>
				<div class="col-sm-3">
					<input type="text" class="form-control" name="tdtgl" id="tdtgl">
				</div>
			</div>
			<div class="bootstrap-timepicker">
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-3 control-label">Jam</label>
					<div class="col-sm-3">
						<input type="text" class="form-control" id="tdwaktu" name="tdwaktu">
					</div>
				</div>
			</div>
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-3 control-label">Dokter</label>
				<div class="col-sm-9">
					<select class="form-control" style="width: 100%;" name="tddokter" id="tddokter">
						<?php
						foreach($dtdokter as $row) {
						?>
						<option value="<?php echo $row->kode_dokter; ?>"><?php echo $row->nama_dokter; ?></option>
						<?php
						}
						?>
					</select>
				</div>
			</div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Perawat</label>
                <div class="col-sm-9">
                    <select class="form-control" style="width: 100%;" name="tdperawat" id="tdperawat">
                        <option value="">--Pilih--</option>
                        <?php
                        foreach($dtperawat as $row) {
                            ?>
                            <option value="<?php echo $row->kode_dokter; ?>"><?php echo $row->nama_dokter; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
		</div>
	</div>
</div>
<div class="col-md-6">
	<div class="box box-info">				
		<div class="box-body">
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-3 control-label">Tindakan</label>
				<div class="col-sm-9">
					<select class="form-control" style="width: 100%;" type="text" name="tdtindakan" id="tdtindakan">
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
				<label for="inputEmail3" class="col-sm-3 control-label">Jumlah</label>
				<div class="col-sm-3">
					<input type="number" class="form-control" name="tdjml" id="tdjml">
				</div>
			</div>
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-3 control-label"></label>
				<div class="col-sm-9">
					<input type="checkbox" name="tdperawat" id="tdperawat"> Dilakukan oleh Perawat
				</div>
			</div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Catatan</label>
                <div class="col-sm-9">
                    <textarea class="form-control col-sm-12" rows="3" id="catatan" name="catatan"></textarea>
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
<div class="col-md-6">
	<div class="box box-info">				
		<div class="box-body">
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-3 control-label">Tanggal</label>
				<div class="col-sm-3">
					<input type="text" class="form-control" name="tdtgl" id="tdtgl" value="<?php echo $dataedit->tanggal;?>">
				</div>
			</div>
			<div class="bootstrap-timepicker">
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-3 control-label">Jam</label>
					<div class="col-sm-3">
						<input type="text" class="form-control" id="tdwaktu" name="tdwaktu" value="<?php echo $dataedit->jam;?>">
					</div>
				</div>
			</div>
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-3 control-label">Dokter</label>
				<div class="col-sm-9">
					<select class="form-control" style="width: 100%;" name="tddokter" id="tddokter">
						<?php
						foreach($dtdokter as $row) {
						?>
						<option value="<?php echo $row->kode_dokter; ?>" <?php if ($dataedit->kode_dokter == $row->kode_dokter) { echo "selected";}?>><?php echo $row->nama_dokter; ?></option>
						<?php
						}
						?>
					</select>
				</div>
			</div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Perawat</label>
                <div class="col-sm-9">
                    <select class="form-control" style="width: 100%;" name="tdperawat" id="tdperawat">
                        <option value="">--Pilih--</option>
                        <?php
                        foreach($dtperawat as $row) {
                            ?>
                            <option value="<?php echo $row->kode_dokter; ?>" <?php if ($dataedit->kode_perawat == $row->kode_dokter) { echo "selected";}?>><?php echo $row->nama_dokter; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
		</div>
	</div>
</div>
<div class="col-md-6">
	<div class="box box-info">				
		<div class="box-body">
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-3 control-label">Tindakan</label>
				<div class="col-sm-9">
					<select class="form-control" style="width: 100%;" type="text" name="tdtindakan" id="tdtindakan">
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
				<label for="inputEmail3" class="col-sm-3 control-label">Jumlah</label>
				<div class="col-sm-3">
					<input type="number" class="form-control" name="tdjml" id="tdjml" value="<?php echo $dataedit->qty;?>">
				</div>
			</div>
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-3 control-label"></label>
				<div class="col-sm-9">
					<input type="checkbox" name="tdperawat" id="tdperawat" <?php if ($dataedit->perawatsaja == "1") { echo "checked";}?>/> Dilakukan oleh Perawat
				</div>
			</div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Catatan</label>
                <div class="col-sm-9">
                    <textarea class="form-control col-sm-12" rows="3" id="catatan" name="catatan"><?php echo $dataedit->catatan;?></textarea>
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
