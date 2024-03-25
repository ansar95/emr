<table class="table table-bordered">
    <tr>
        <th width="7%">Resep Unit</th>
        <th width="3%">No.</th>
        <th width="5%">Type</th>
        <th width="5%">No. RM</th>
        <th width="15%">Nama</th>
        <th>Alamat</th>
        <th width="10%">Unit</th>
        <th width="20%">Dokter</th>
        <th width="9%">No. Resep</th>
        <!-- <th width="3%">id.</th> -->
        <th width="12%"><div align="center">Action</div></th>
    </tr>
    <?php
    if ($hasil == null) {
        ?>
        <tr>
            <td colspan="100%" class="text-center">
                Tidak Ada Data
            </td>
        </tr>
        <?php
    } else {
        $nob = 1;
        foreach($hasil as $row) {
            echo "<tr>";
            if ($row->dariunit == 1) {
            ?>
              <td class="text-center">
                <button class="btn-sm btn-danger btn" onclick="bataldariunit('<?php echo $row->idnoresep?>')"><i class="fa fa-minus"></i></button>
            </td>
        <?php
            } else {echo "<td>".""."</td>";}
            echo "<td>".$nob++.".</td>";
            // echo "<td>".$row->type."</td>";
            echo "<td>".$row->golongan."</td>";
            echo "<td>".$row->no_rm."</td>";
            echo "<td>".$row->nama_umum."</td>";
            echo "<td>".$row->alamat."</td>";
            // echo "<td>".$row->telp."</td>";
            // echo "<td>".$row->idnoresep."</td>";
            echo "<td>".$row->nama_unit."</td>";
           
            echo "<td>".$row->nama_dokter."</td>";
            echo "<td>".$row->noresep."</td>";
            ?>
            <td class="text-center">
                <a role="button" class="btn-sm btn-success btn" href="<?php echo site_url(). "/depoapotik/editresepobat/" . $row->idnoresep?>"><i class="fas fa-cog"></i></a>
                <button class="btn-sm btn-danger btn" onclick="panggilhapus('<?php echo $row->idnoresep?>')"><i class="fa fa-trash"></i></button>
                <button class="btn-sm btn-info btn" onclick="selesairesep('<?php echo $row->idnoresep?>')">Diserahkan</button>
            </td>
            <?php
            echo "</tr>";
        }
    }
    ?>
</table>