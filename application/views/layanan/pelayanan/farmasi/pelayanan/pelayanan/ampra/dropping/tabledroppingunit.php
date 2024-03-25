<table class="table table-bordered">
    <thead>
		<tr>
			<th width="5%">No.</th>
			<th>Nama Unit</th>
			<th width="10%">Aksi</th>
		</tr>
    </thead>
    <tbody>
    <?php
    if ($hasil == null) {
        ?>
        <tr>
            <td colspan="3" class="text-center">
                Tidak Ada Data
            </td>
        </tr>
        <?php
    } else {
        $nob = 0;
        foreach($hasil as $row) {
            echo "<tr>";
            echo "<td>".++$nob."</td>";
            echo "<td>".$row->nama_unit."</td>";
            echo '<td>
                <button onclick="prosesambildetail(`'.$row->kode_unit.'`, `'.$row->nama_unit.'`, `'.$row->id.'`)" class="btn-sm btn-primary btn">Proses</button>
                </td>';
            echo "</tr>";
        }
    }
    ?>
    </tbody>
</table>