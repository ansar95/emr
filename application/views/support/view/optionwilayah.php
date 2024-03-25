<?php
if ($dt != null) {
	foreach($dt as $row) {
?>
<option value="<?php echo $row->id;?>"><?php echo $row->name;?></option>
<?php
	}
}
?>
