<table class="table table-bordered">
    <tr>
        <th>No.</th>
        <th>Nama Produk</th>
        <th>Satuan Pakai</th>
        <th>Qty(Pakai)</th>
        <th>Harga Jual</th>
        <th>Tuslag</th>
        <th>Jumlah</th>
        <th>Dosis</th>
        <th>Klaim</th>
        <th>Action</th>
    </tr>
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
        foreach($hasil as $row) {
            echo "<tr><td>".$nob++.".</td>";
            echo "<td>".$row->namaobat."</td>";
            echo "<td>".$row->satuanpakai."</td>";
            echo "<td>".$row->hargapakai."</td>";
            echo "<td>".$row->tuslag."</td>";
            echo "<td>".$row->qty."</td>";
            echo "<td>".$row->jumlah."</td>";
            echo "<td>".$row->dosis."</td>";
            echo "<td>".$row->noninacbg."</td>";
            ?>
            <td class="text-center">

            </td>
            <?php
            echo "</tr>";
        }
    }
    ?>
</table>