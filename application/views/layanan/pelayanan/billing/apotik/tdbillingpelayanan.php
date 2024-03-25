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
        echo "<tr><td>".$row->notraksaksi."</td>";
        echo "<td>".$row->no_rm."</td>";
        echo "<td>".$row->nama_pasien."</td>";
        echo "<td>".$row->alamat."</td>";
        echo "<td>".$row->golongan."</td>";
        echo "<td>".$row->tglresep."</td>";
        echo "<td></td>";
        echo "<td></td>";
        ?>
        <td class="text-center">
            <a onclick="panggilbilling('<?php echo $row->idnoresep;?>');" class="btn-sm btn-warning btn-flat">Bayar</i></a>
        </td>
        <?php
        echo "</tr>";
    }
}
?>
