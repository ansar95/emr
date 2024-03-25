<table class="table table-bordered">
    <tr>
        <th width=3% style="text-align:right;">No.</th>
        <th width=7% style="text-align:left;">Kode</th>
        <th>Nama Barang</th>
        <th width=7% style="text-align:left;">Satuan Beli (Kemasan)</th>
        <th width=7% style="text-align:right;">QTY (Kemasan)</th>
        <th width=7% style="text-align:right;">Harga (per Kemasan)</th>
        <th width=7% style="text-align:right;">% Diskon</th>
        <th width=7% style="text-align:right;">Potongan Langsung</th>
        <th width=7% style="text-align:right;">Jumlah Harga</th>
        <th width=7% style="text-align:right;">Isi Dalam Kemasan</th>
        <th width=7% style="text-align:left;">Expire Date</th>
        <th width=7% style="text-align:left;">Batch No.</th>
        <!-- <th>Harga Stok Sementara</th> -->
        <!-- <th>Harga Stok</th> -->
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
        $jumdiskon=0;
        $jumpotlangsung=0;
        $jumbayar=0;
        $persenppn=0;
        foreach($nilaippn as $row1) {
            $persenppn=$row1->ppn/100;
        }
        foreach($hasil as $row) {
            $dis=$row->diskon;
            $diskonnya=($row->qty*$row->harga)*$row->diskon/100;
            echo "<tr><td align='right'>".$nob++.".</td>";
            echo "<td>".$row->kodebarang."</td>";
            echo "<td>".$row->namabarang."</td>";
            echo "<td>".$row->satuan."</td>";
            echo "<td align='right'>".groupangka($row->qty)."</td>";
            echo "<td align='right'>".groupangka($row->harga)."</td>";
            echo "<td align='right'>".$row->diskon."</td>";
            echo "<td align='right'>".groupangka($row->potlangsung)."</td>";
            echo "<td align='right'>".groupangka($row->bayar)."</td>";
            echo "<td align='right'>".$row->isisatuan."</td>";
            echo "<td>".$row->expire."</td>";
            echo "<td>".$row->batch."</td>";
            echo '<td><button onclick="hapusdata(this, '.$row->id.')" class="btn btn-sm btn-danger btn-flat"><i class="fa fa-trash"></i></button></td>';
            echo "</tr>";
            $jumdiskon=$jumdiskon+$diskonnya;
            $jumpotlangsung=$jumpotlangsung+$row->potlangsung;
            $jumbayar=$jumbayar+$row->bayar;
        }
        echo "<tr>";
        echo "<td colspan='6' align='right'><span style='font-weight:bold'>"."JUMLAH "."</span></td>";
        echo "<td align='right'><span style='font-weight:bold'>".groupangka($jumdiskon)."</td>";
        echo "<td align='right'><span style='font-weight:bold'>".groupangka($jumpotlangsung)."</span></td>";
        echo "<td align='right'><span style='font-weight:bold'>".groupangka($jumbayar)."</span></td>";
        echo "<td></td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td colspan='8' align='right'><span style='font-weight:bold'>"."PPN"."</span></td>";
        // echo "<td align='right'><span style='font-weight:bold'>".groupangka($jumdiskon)."</td>";
        // echo "<td align='right'><span style='font-weight:bold'>".groupangka($jumpotlangsung)."</span></td>";
        // $ppnnya=0;
        // $persenppn=0.11;
        $ppnnya=$jumbayar*$persenppn;
        echo "<td align='right'><span style='font-weight:bold'>".groupangka($ppnnya)."</span></td>";
        echo "<td></td>";
        echo "</tr>";
        $totaldibayar=0;
        $totaldibayar=$jumbayar+$ppnnya;
        echo "<tr>";
        echo "<td colspan='8' align='right'><span style='font-weight:bold'>"."TOTAL DIBAYAR"."</span></td>";
        // echo "<td align='right'><span style='font-weight:bold'>".groupangka($jumdiskon)."</td>";
        // echo "<td align='right'><span style='font-weight:bold'>".groupangka($jumpotlangsung)."</span></td>";
        echo "<td align='right'><span style='font-weight:bold'>".groupangka($totaldibayar)."</span></td>";
        echo "<td></td>";
        echo "</tr>";
    }
    ?>
</table>


            

        
