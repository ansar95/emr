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
            $r = ($row->qty * $row->hargapakai) - ($row->qty * $row->hargapakai * $row->diskon / 100 );
        }
        echo "<tr><td align='right'>".$nob++.".</td>";
        echo "<td>".tanggaldua($row->tanggal)."</td>";
        echo "<td>".$row->namaobat."</td>";
        echo "<td>".$row->satuanpakai."</td>";
        echo "<td align='right'>".groupangka($row->hargapakai)."</td>";
        echo "<td align='right'>".$row->qty."</td>";
        if ($row->nonasuransi==1){echo "<td align='center'>UMUM</td>";} else {echo "<td align='center'></td>";}
        echo "<td align='right'>".$row->diskon."</td>";
        echo "<td align='right'>".groupangka($r)."</td>";
        if ($row->nonbill==1){echo "<td align='center'>Non Billing</td>";} 
        else {echo "<td align='center'> </td>";
            $qty = $qty + $row->qty;
            $jml = $jml + $r;
        }
        ?>
        <td class="text-center">
            <a onclick="ubahbhpedit(<?php echo $row->id; ?>)" class="btn-sm btn-info btn-flat"><i class="fa fa-edit"></i></a>
            <a onclick="hapusdatabhp(this, <?php echo $row->id; ?>)" class="btn-sm btn-danger btn-flat"><i class="fa fa-trash"></i></a>
        </td>
        <?php
        echo "</tr>";
    }
    echo "<tr>";
    echo "<td colspan='7'>Total</td>";
    // echo "<td>".$qty."</td>";
    // echo "<td colspan='2'></td>";
    echo "<td align='right' colspan='2'>".groupangka($jml)."</td>";
    echo "</tr>";
}
?>

