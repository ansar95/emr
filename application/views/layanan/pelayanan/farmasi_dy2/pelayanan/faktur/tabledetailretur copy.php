<table class="table table-bordered">
    <tr>
        <th width="4%">No.</th>
        <th width="8%">Tanggal</th>
        <th width="10%">No.SJ/Faktur</th>
        <th width="15%">Nama PBF</th>
        <th width="14%">Nama Barang</th>
        <th width="5%">Qty</th>
        <th width="7%">Satuan</th>
        <th width="5%">Isi</th>
        <th width="8%">Expire Date</th>
        <th width="8%">Batch No.</th>
        <th>Sebab</th>
        <th width=3% style="text-align:center;">Hapus</th>
    </tr>
    <?php
    if ($hasil == null) {
        ?>
        <tr>
            <td colspan="14" class="text-center">
                Tidak Ada Data
            </td>
        </tr>
        <?php
    } else {
        $nob = 1;
        foreach($hasil as $row) {
            echo "<tr><td align='right'>".$nob++.".</td>";
            echo "<td>".$row->tglretur."</td>";
            echo "<td>".$row->nosj."</td>";
            echo "<td>".$row->kodevendor."</td>";
            echo "<td>".$row->kodebarang."</td>";
            echo "<td align='right'>".groupangka($row->qty)."</td>";
            echo "<td>".$row->satuan."</td>";
            echo "<td>".$row->isi."</td>";
            echo "<td>".$row->expire."</td>";
            echo "<td>".$row->batch."</td>";
            echo "<td>".$row->sebab."</td>";
            echo '<td><button onclick="hapusdata(this, '.$row->id.')" class="btn btn-sm btn-danger btn-flat"><i class="fa fa-trash"></i></button></td>';
            echo "</tr>";
        }
    }
    ?>
</table>