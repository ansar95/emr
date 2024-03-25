<table class="table table-bordered">
    <thead>
        <tr>
            <th colspan="3">Order</th>
            <th colspan="5">Dropping</th>
        </tr>
        <tr>
            <th>Tgl. Order</th>
            <th>Nama Item Obat/BHP</th>
            <th>Qty Ampra</th>
            <th>Qty Drop</th>
            <th>Tgl. Drop</th>
            <th>Batch No.</th>
            <th>Expire</th>
            <th>Harga</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($hasil == null) {
        ?>
            <tr>
                <td colspan="9" class="text-center">
                    Tidak Ada Data
                </td>
            </tr>
        <?php
        } else {
            $nob = 1;
            foreach ($hasil as $row) {
                echo "<tr>";
                echo "<td>" . $row->tglorder . "</td>";
                echo "<td>" . $row->namaobat . "</td>";
                echo "<td>" . $row->qtyampra . "</td>";
                echo "<td>" . $row->qtydrop . "</td>";
                echo "<td>" . $row->tgldrop . "</td>";
                echo "<td>" . $row->batch . "</td>";
                echo "<td>" . $row->expire . "</td>";
                echo "<td>" . $row->harga . "</td>";
                echo '<td>
            <button onclick="panggileditdetail(' . $row->id . ')" class="btn-sm btn-primary btn"><i class="fa fa-edit"></i></button>
            <button onclick="panggilhapusdetail(' . $row->id . ')" class="btn-sm btn-danger btn"><i class="fa fa-trash"></i></button>
                </td>';
                echo "</tr>";
            }
        }
        ?>
    </tbody>
</table>