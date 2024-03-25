<?php
echo var_dump($hasil);
if ($hasil == null) {
?>
<tr>
	<td colspan="7" class="text-center">
		Tidak Ada Data
	</td>
</tr>
<?php
} else {
		echo "<tr><td>#</td>";
		echo "<td>".$hasil[1]['noSep']."</td>";
		echo "<td>".$hasil[1]['peserta']['nama']."</td>";
		echo "<td>".$hasil[1]['peserta']['noMr']."</td>";
		echo "<td>".$hasil[1]['peserta']['noKartu']."</td>";
		echo "<td>".$hasil[1]['tglSep']."</td>";
?>
	<td class="text-center">
		<a onclick="panggilDetailSep('<?php echo $hasil[1]['noSep'];?>');" class="btn-sm btn-info btn-flat">Detail</a>
		<a onclick="panggilUbahSep('<?php echo $hasil[1]['noSep'];?>');" class="btn-sm btn-warning btn-flat">Ubah</i></a>
		<a onclick="panggilHapusSep('<?php echo $hasil[1]['noSep'];?>');" class="btn-sm btn-danger btn-flat">Hapus</i></a>
		<a onclick="panggilPulangSep('<?php echo $hasil[1]['noSep'];?>');" class="btn-sm btn-success btn-flat">Pulang</i></a>
	</td>
<?php
		echo "</tr>";
}
?>
