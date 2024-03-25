<option value="-">-- Pilih --</option>
<?php
foreach($hasil as $row) {
	?>
	<!-- <option value="<?php echo $row->kodebarang . "_" . $row->id; ?>"><?php echo $row->namabarang; ?></option> -->
	<option value="<?php echo $row->kodebarang . "_" . $row->id; ?>"><?php echo $row->namabarang.' | '.$row->satuan.' | '.$row->batch.' | '.$row->expire.' | '.($row->qty*$row->isisatuan-$row->keluar).' ('.$row->pendanaan.')'; ?></option>

	<?php
}
?>