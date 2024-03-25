<option value="-">-- Pilih --</option>
<?php
foreach($hasil as $row) {
	?>
	<option value="<?php echo $row->kodebarang . "_" . $row->id; ?>"><?php echo $row->namabarang; ?></option>
	<?php
}
?>