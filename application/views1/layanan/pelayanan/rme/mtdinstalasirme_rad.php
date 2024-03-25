<?php
if ($dttdinstrad == null) {
    ?>
    <tr>
        <td colspan="7" class="text-center">
            Tidak Ada Data
        </td>
    </tr>
    <?php
} else {
    foreach($dttdinstrad as $row) {
        echo "<tr>";
        ?>
        <td class="text-center">
            <!-- <button onclick="hasil(<?php echo $row->id; ?>)" class="btn-sm btn-light btn">Hasil</button> -->
		    <a role="button" class='btn-sm btn-secondary btn' target="blank" href="<?php echo site_url();?>/iradiologi/layananhasilcetak_rme/<?php echo $row->id;?>">Hasil</a>

        </td>
        <?php 
        echo "<td>".$row->tanggal."</td>";
        echo "<td>".$row->tindakan."</td>";
        echo "<td>".$row->notransaksi_IN."</td>";
        echo "</tr>";
    }
}
?>


																             