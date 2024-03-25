<?php
if ($hasil == null) {
    ?>
    <tr>
        <td colspan="13" class="text-center">
            Tidak Ada Data
        </td>
    </tr>
    <?php
} else {
    foreach($hasil as $row) {
        echo "<tr><td>".$row->notransaksi."</td>";
        echo "<td>".$row->notransaksi_IN."</td>";
        echo "<td>".$row->no_rm."</td>";
        echo "<td>".$row->nama_pasien."</td>";
        echo "<td>".$row->nama_dokter."</td>";
        echo "<td>"."Bayar Umum"."</td>";
        echo "<td class='text-center'>".$row->tanggal."</td>";
        ?>
        <td class="text-center">
            <button onclick="panggilbayarinst('<?php echo $row->notransaksi_IN;?>');" class="btn btn-sm btn-warning btn-flat">Bayar</i></button>
        </td>
        <?php
        echo "</tr>";
    }
}
?>
