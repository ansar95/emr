<?php
if ($dttdinst == null) {
    ?>
    <tr>
        <td colspan="7" class="text-center">
            Tidak Ada Data
        </td>
    </tr>
    <?php
} else {
    foreach($dttdinst as $row) {
        echo "<tr>";
        if ( $row->kode_unit == 'LABS' ) {
        ?>
        <td class="text-center">
            <button onclick="isitindakan(<?php echo $row->id; ?>)" class="btn-sm btn-primary btn">Tindakan</button>
        </td>
        <?php 
		} elseif ($row->kode_unit == 'RDGL' || $row->kode_unit == 'RDLG') {
	    ?>	
		<td class="text-center">
            <button onclick="isitindakanrad(<?php echo $row->id; ?>)" class="btn-sm btn-success btn">Tindakan</button>
        </td>
		<?php
		} else {
		?>
			<td class="text-center">
        </td>
		<?php 
		}
        echo "<td>".$row->tanggal."</td>";
        echo "<td>".$row->nama_unit."</td>";
        echo "<td>".$row->nama_dokter."</td>";
        echo "<td>".$row->nama_dokter_periksa."</td>";
        echo "<td>".$row->nama_unitR."</td>";
        echo "<td>".$row->notransaksi_IN."</td>";
        echo "<td>".$row->catatan."</td>";
        ?>
        <td class="text-center">
            <button onclick="hapusinst(this, <?php echo $row->id; ?>)" class="btn-sm btn-danger btn">Hapus</button>
        </td>
        <?php
        echo "</tr>";
    }
}
?>

