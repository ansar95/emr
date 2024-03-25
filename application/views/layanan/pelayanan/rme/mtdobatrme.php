<?php
if ($dttdobat == null) {
    ?>
    <tr>
        <td colspan="10" class="text-center">
            Tidak Ada Data
        </td>
    </tr>
    <?php
} else {
    $nob = 1;
    $dty = 0;
    $jml = 0;
    $qty = 0;
    foreach($dttdobat as $row) {
        echo "<tr><td>".$nob++.".</td>";
        echo "<td>".$row->noresep."</td>";
        echo "<td>".$row->namaobat."</td>";
        echo "<td align='right'>".groupangka($row->hargapakai)."</td>";
        echo "<td align='right'>".$row->qty."</td>";
        echo "<td>".$row->satuanpakai."</td>";
        echo "<td>".$row->dosis."</td>";
        echo "<td>" . $row->catatanresep . "</td>";
        ?>
        <td class="text-center">
            <button onclick="hapusdataobat(this, <?php echo $row->idnoresep; ?>)" class="btn-sm btn-danger btn"><i class="fa fa-trash"></i></button>
        </td>
        <?php
        echo "</tr>";
    }
}
?>

