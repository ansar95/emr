<?php
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
            echo '<td><button onclick="hapusdata('.$row->id.')" class="btn-sm btn-danger btn"><i class="fa fa-trash"></i></button></td>';
            echo "</tr>";
        }
    
    ?>
