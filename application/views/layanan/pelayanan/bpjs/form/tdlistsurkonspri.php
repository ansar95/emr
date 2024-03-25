
   

<?php
$i=1;
if ($hasil == null) {
?>
<tr>
	<td colspan="12" class="text-center">
		Tidak Ada Data
	</td>
</tr>
<?php
} else {
	foreach ($hasil['list'] as $item) {
        echo '<tr>';
        echo '<td>' . $item['noKartu'] . '</td>';
        echo '<td>' . $item['nama'] . '</td>';
        echo '<td>' . $item['noSuratKontrol'] . '</td>';
        echo '<td>' . $item['namaJnsKontrol'] . '</td>';
        echo '<td>' . $item['jnsPelayanan'] . '</td>';
        echo '<td>' . $item['tglRencanaKontrol'] . '</td>';
        echo '<td>' . $item['tglTerbitKontrol'] . '</td>';
        echo '<td>' . $item['noSepAsalKontrol'] . '</td>';
        echo '<td>' . $item['tglSEP'] . '</td>';
        echo '<td>' . $item['namaPoliAsal'] . '</td>';
        echo '<td>' . $item['namaPoliTujuan'] . '</td>';
        echo '<td>' . $item['namaDokter'] . '</td>';

?>
	<td class="text-center">
		<button onclick="ambildokter(<?php echo $item['kodeDokter'];?>);" class="btn btn-sm btn-info ">pilih</button>
	</td>
<?php
		echo "</tr>";
	}
}
?>
   

