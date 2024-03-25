<?php
if ($hasil == null) {
    ?>
    <tr>
        <td colspan="100%" class="text-center">
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
            // $r = ($row->qty * $row->hargapakai) - $row->diskon;
			$r = ($row->qty * $row->hargapakai) - ($row->qty * $row->hargapakai * $row->diskon /100 );

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
            <button onclick="ubahbhpedit(<?php echo $row->id; ?>)" class="btn btn-sm btn-info "><i class="far fa-edit"></i></button>
            <button onclick="hapusdatabhp(this, <?php echo $row->id; ?>)" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i></button>
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

