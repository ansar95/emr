<?php
if ($hasil == null) {
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
    foreach($hasil as $row) {
        if ($row->nonbill==1) { $r = 0;} else {
            $r = ($row->qty * $row->hargapakai) - ($row->qty * $row->hargapakai * $row->diskon / 100);
        }
        echo "<tr><td>".$nob++.".</td>";
        echo "<td>".tanggaldua($row->tanggal)."</td>";
        echo "<td>".$row->namaobat."</td>";
        echo "<td>".$row->satuanpakai."</td>";
        echo "<td align='right'>".groupangka($row->hargapakai)."</td>";
        echo "<td align='right'>".$row->qty."</td>";
        echo "<td align='right'>".$row->diskon."</td>";
        echo "<td align='right'>".groupangka($r)."</td>";
        if ($row->nonbill==1){echo "<td align='center'>Non Billing</td>";} 
        else {echo "<td align='center'> </td>";
            $qty = $qty + $row->qty;
            $jml = $jml + $r;
        }
        if ($row->nonasuransi==1){echo "<td align='center'>UMUM</td>";} else {echo "<td align='center'></td>";}
        ?>
        <td class="text-center">
            <button onclick="ubahbhpedit(<?php echo $row->id; ?>)" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></button>
            <button onclick="hapusdatabhp(this, <?php echo $row->id; ?>)" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
        </td>
        <?php
        echo "</tr>";
    }
    echo "<tr>";
    echo "<td colspan='7' align='right'>Total</td>";
    // echo "<td >".' '."</td>";
    // echo "<td colspan='2'></td>";
    echo "<td colspan='1' align='right'>".groupangka($jml)."</td>";
    echo "</tr>";
}
?>

