<?php
if ($hasil == null) {
?>
<tr>
	<td colspan="6" class="text-center">
		Tidak Ada Data
	</td>
</tr>
<?php
} else {
	$no = 1;
	foreach($hasil as $row) {
		echo "<tr><td align='center'>".$no++.".</td>";
		echo "<td>".$row->pemeriksaan."</td>";
		if (trim($row->kritis) =="") {
			if (trim($row->flag) =="") {
				echo "<td align='center'>".$row->hasil."</td>";
			} else {
				echo "<td bgcolor='yellow' align='center'>".$row->hasil."</td>";
			}	
		} else {
			echo "<td bgcolor='red' align='center'><font color='#fff'>".$row->hasil."</font></td>";
		}
		echo "<td align='center'>".$row->unittes."</td>";
		echo "<td align='center'>".$row->nilainormal."</td>";
		echo "<td></td>";
	?>
	<!-- <td class="text-center">
		<a onclick="ubahhasiledit(<?php echo $row->id; ?>)" class="btn-sm btn-info btn-flat"><i class="fa fa-edit"></i></a>
		<a onclick="hapusdatahasil(this, <?php echo $row->id; ?>)" class="btn-sm btn-danger btn-flat"><i class="fa fa-trash"></i></a>
	</td> -->
<?php
		echo "</tr>";
	}
}
?>
