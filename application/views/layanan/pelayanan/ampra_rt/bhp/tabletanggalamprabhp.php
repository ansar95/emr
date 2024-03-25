<table class="table table-bordered scroll">
    <thead>
    <tr>
        <th>Tanggal Order</th>
    </tr>
    </thead>
    <tbody>
    <?php
    if ($hasil == null) {
        ?>
        <tr>
            <td class="text-center">
                Tidak Ada Data
            </td>
        </tr>
        <?php
    } else {
        $nob = 1;
        foreach($hasil as $key => $row) {
            echo "<tr>";
            echo "<td>".$row->tgl_order."</td>";
            echo "</tr>";
        }
    }
    ?>
    </tbody>
</table>
<script type="text/javascript">
    untukscroll();
</script>