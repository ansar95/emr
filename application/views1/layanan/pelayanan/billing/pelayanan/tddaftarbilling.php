<?php
if ($hasil == null) {
    ?>
    <tr>
        <td colspan="14" class="text-center">
            Tidak Ada Data
        </td>
    </tr>
    <?php
} else {
	$no = 1;
    foreach($hasil as $row) {
    	$totalbayar = (int)$row->nonasuransi + (int)$row->selisih;
        echo "<tr>";
        echo "<td>".$no++.".</td>";
        echo "<td>".$row->nokwi."</td>";
        echo "<td>".$row->notrx."</td>";
        echo "<td>".$row->norm."</td>";
        echo "<td>".$row->nama_pasien."</td>";
        echo "<td>".$row->bagian."</td>";
        echo "<td>".tanggaldua($row->tglbiling)."</td>";
        echo "<td>".tanggaldua($row->tglbayar)."</td>";
        echo "<td>".$row->nilai."</td>";
        echo "<td>".$row->asuransi."</td>";
        echo "<td>".$row->selisih."</td>";
        echo "<td>".$totalbayar."</td>";
        echo "<td>".$row->catatan."</td>";
        echo "</tr>";
    }
}
?>
