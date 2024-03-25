<?php
$i=1;
if ($hasil == null) {
?>
<tr>
	<td colspan="10" class="text-center">
		Tidak Ada Data
	</td>
</tr>
<?php
} else {

	foreach ($hasil['list'] as $item) {
        echo '<tr>';
        echo '<td>' . $item['kodeDokter'] . '</td>';
        echo '<td>' . $item['namaDokter'] . '</td>';
        echo '<td>' . $item['jadwalPraktek'] . '</td>';
        echo '<td>' . $item['kapasitas'] . '</td>';
?>
	<td class="text-center">
		<button onclick="ambildokter(<?php echo $item['kodeDokter'];?>);" class="btn btn-sm btn-info ">pilih</button>
	</td>
<?php
		echo "</tr>";
	}
}
?>