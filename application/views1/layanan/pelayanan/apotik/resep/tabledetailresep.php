<table class="table table-bordered">
    <tr>
        <th width="2%">No.</th>
        <th>Nama Produk</th>
        <th width="18%"><div align="left">Catatan dari Unit</div></th>
        <th width="3%"><div align="right">Qty</div></th>
        <th width="5%"> Satuan</th>
        <th width="5%"><div align="right">Harga</div></th>
        <th width="6%"><div align="right">Jumlah</div></th>
        <th width="18%">Dosis Farmasi</th>
        <!-- <th width="4%"><div align="center">Dana</div></th> -->
        <th width="4%"><div align="center">Klaim</div></th>
        <th width="14%"><div align="center"> Action</div></th>
        <th width="4%"><div align="center">Proses</div></th>
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
        $jum = 0;
       
        foreach($hasil as $row) {
            echo "<tr><td>".$nob++.".</td>";
            echo "<td>".$row->namaobat."</td>";
            echo "<td>" . $row->dosis.'<br>'.$row->catatanresep. "</td>";
            echo "<td style='text-align:right'>".$row->qty."</td>";
            echo "<td>".$row->satuanpakai."</td>";
            echo "<td style='text-align:right'>".formatuang($row->hargapakai)."</td>";
            // echo "<td style='text-align:right'>".formatuang($row->tuslag)."</td>";
            echo "<td style='text-align:right'>".formatuang($row->jumlah)."</td>";
            $dosisnya='';
            if ($row->pagi <>'') {$dosisnya=$dosisnya.' Pagi:'.trim($row->pagi).' '.trim($row->takaran).', ';} 
            if ($row->siang <>'') {$dosisnya=$dosisnya.' Siang:'.trim($row->siang).' '.trim($row->takaran).', ';} 
            if ($row->malam <>'') {$dosisnya=$dosisnya.' Malam:'.trim($row->malam).' '.trim($row->takaran).' ';} 
            if ($row->keterangan <>'') {$dosisnya=$dosisnya.trim($row->keterangan).' ';} 
            if ($row->caramakan <>'') {$dosisnya=$dosisnya.trim($row->caramakan).' Makan';} 
            echo "<td>".$dosisnya."</td>";
            // echo "<td>".$row->pendanaan."</td>";
            echo "<td style='text-align:center'>".$row->noninacbg."</td>";
            ?>
            <td class="text-center">
                <button  class="btn-sm btn-primary btn" onclick="panggileditdetail('<?php echo $row->idnoresep?>')"><i class="fa fa-edit"></i></button>
                <button class="btn-sm btn-danger btn" onclick="panggilhapusdetail('<?php echo $row->idnoresep?>')"><i class="fa fa-trash"></i></button>
                <button class="btn-sm btn-warning btn" onclick="panggilcekdetail('<?php echo $row->idnoresep?>')"><i class="fa fa-book"></i></button>
                <button class="btn-sm btn-success btn" onclick="cetaketiketobat('<?php echo $row->idnoresep?>')"><i class="fa fa-print"></i></button>
            </td>
            <?php
             if ($row->proses == 1) {$prosestext='Proses';} else {$prosestext=' ';}
             echo "<td style='text-align:center'>". $prosestext."</td>";
            echo "</tr>";
            $jum = $jum + $row->jumlah;
        }
            echo "<tr>";
            echo "<td colspan='6' align='right' >";
            echo "TOTAL HARGA ";
            echo "</td>";
            echo "<td colspan='1' bgcolor='#C0C011' style='text-align:right'>";
            echo formatuang($jum);
            echo "</td>";
            echo "<td colspan='5'>";
            echo "</td>";
            echo "</tr>";
    }
    ?>
</table>