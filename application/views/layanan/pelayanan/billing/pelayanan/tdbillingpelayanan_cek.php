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
        echo "<td>".$row->no_rm."</td>";
        echo "<td>".$row->nama_pasien."</td>";
        echo "<td>".$row->alamat."</td>";
        echo "<td>".$row->golongan."</td>";
        echo "<td>".$row->keluarpada."</td>";
        echo "<td align='center'>".tanggaldua($row->tgl_masuk)."</td>";
        echo "<td align='center'>".tanggaldua($row->tgl_keluar)."</td>";
        echo "<td align='right'>".groupangka($row->totalbayar)."</td>";
        // echo "<td align='right'>".groupangka($row->selisih)."</td>";
        // echo "<td></td>";
        // echo "<td>".$row->ket_keluar."</td>";
        ?>
        <td class="text-center">
            <button onclick="panggilbilling('<?php echo $row->id;?>');" class="btn btn-sm btn-warning btn-flat">Billing</button>
            <!-- <button onclick="panggilbayar('<?php echo $row->id;?>');" class="btn btn-sm btn-danger btn-flat" >Bayar</button> -->

            <?php
            // if ($row->golongan == 'UMUM') {
            ?>    
	            <!-- <a onclick="panggilbayar('<?php echo $row->id;?>');" class="btn-sm btn-danger btn-flat" >Bayar</a> -->
            <?php
            // }
            ?>

        </td>
        <?php
        echo "</tr>";
    }
}
?>
