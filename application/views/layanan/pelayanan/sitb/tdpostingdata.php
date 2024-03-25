<?php
if ($dtpasientb == null) {
?>
<tr>
	<td colspan="12" class="text-center">
		Tidak Ada Data
	</td>
</tr>
<?php
} else {
	$i=1;
	foreach($dtpasientb as $row) {
		echo "<tr><td>".$i++."</td>";
		echo "<td>".$row->tgl_masuk."</td>";
        echo "<td>".$row->tgl_keluar."</td>";
        echo "<td>".$row->no_rm."</td>";
		echo "<td>".$row->nama_pasien."</td>";
		echo "<td>".substr($row->sex,0,1)."</td>";
        echo "<td>".$row->keluarpada."</td>";
        echo "<td>".$row->alamat."</td>";
        echo "<td>".$row->icd."</td>";
		echo "<td>".$row->golongan."</td>";
		echo "<td>".$row->nositb."</td>";
if ($row->flag == 0) {
?>
	<td class="text-center">
		<button onclick="post2sitb(<?php echo $row->id;?>);" class="btn btn-sm btn-danger ">Posting</button>
	</td>
<?php 
} else {
?>
	<td class="text-center">
		<button onclick="post2sitb(<?php echo $row->id;?>);" class="btn btn-sm btn-secondary ">Posting</button>
	</td>
<?php
	}
		echo "</tr>";
	}
}
?>
