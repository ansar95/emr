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
        echo "<td>".$row->noresep."</td>";
        echo "<td>".$row->no_rm."</td>";
        echo "<td>".$row->nama_umum."</td>";
        echo "<td>".$row->nama_dokter."</td>";
        echo "<td>"."Bayar Umum"."</td>";
        echo "<td class='text-center'>".$row->tglresep."</td>";
        ?>
        <td class="text-center">
            <button onclick="panggilbayarapotik('<?php echo $row->noresep;?>');" class="btn btn-sm btn-warning btn-flat">Bayar</i></button>
        </td>
        <?php
        echo "</tr>";
    }
}
?>
