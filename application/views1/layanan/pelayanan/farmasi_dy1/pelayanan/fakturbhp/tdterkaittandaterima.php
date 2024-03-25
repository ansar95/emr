<table class="table table-bordered">
    <tr>
        <th width="7%">No.</th>
        <th width="15%">Tanda terima</th>
        <th width="15%">Tgl. Terima</th>
        <th>Vendor</th>
        <th width="5%">PPn</th>
        <th width="10%" class="text-center">Aksi</th>
    </tr>
    <?php
    if ($hasil == null) {
        ?>
        <tr>
            <td colspan="6" class="text-center">
                Tidak Ada Data
            </td>
        </tr>
        <?php
    } else {
        $nob = 1;
        foreach($hasil as $row) {
            echo "<tr><td>".$nob++.".</td>";
            echo "<td>".$row->noterima."</td>";
            echo "<td>".$row->tglterima."</td>";
            echo "<td>".$row->namapbf."</td>";
            echo "<td>".$row->ppn."</td>";
            echo '<td><button onclick="" class="btn btn-sm btn-danger btn-flat"><i class="fa fa-trash"></i></button></td>';
            echo "</tr>";
        }
    }
    ?>
</table>