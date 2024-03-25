<?php
if ($dttdinstlab == null) {
    ?>
    <tr>
        <td colspan="7" class="text-center">
            Tidak Ada Data
        </td>
    </tr>
    <?php
} else {
    foreach($dttdinstlab as $row) {
        echo "<tr>";
        ?>
        <td class="text-center">
            <button onclick="hasil(<?php echo $row->id; ?>)" class="btn-sm btn-secondary btn">Hasil</button>
        </td>
        <?php 
        echo "<td>".$row->tanggal."</td>";
        echo "<td>".$row->nama_dokter."</td>";
        echo "<td>".$row->nama_unitR."</td>";
        echo "<td>".$row->notransaksi_IN."</td>";
        echo "</tr>";
    }
}
?>

                                                         