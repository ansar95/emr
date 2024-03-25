<?php
if ($dtlistresep == null) {
    ?>
    <tr>
        <td colspan="7" class="text-center">
            Tidak Ada Data
        </td>
    </tr>
    <?php
} else {
    foreach($dtlistresep as $row) {
        echo "<tr>";
        ?>
        <td class="text-center">
            <!-- <button onclick="cetakdetailresep(<?php echo $row->noresep; ?>)" class="btn-sm btn-secondary btn">Lihat</button> -->
		    <a role="button" class='btn-sm btn-secondary btn' target="blank" href="<?php echo site_url();?>/rme/cetaklistresep/<?php echo $row->noresep;?>">Lihat</a>
        </td>
        <?php 
        echo "<td>".$row->tglresep."</td>";
        echo "<td>".$row->nama_dokter."</td>";
        echo "<td>".$row->nama_unit."</td>";
        echo "<td>".$row->noresep."</td>";
        echo "</tr>";
    }
}
?>