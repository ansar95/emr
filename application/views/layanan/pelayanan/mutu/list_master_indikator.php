<?php
    if ($result == null) {
?>
    <tr>
        <td colspan="18" class="text-center">
            Tidak Ada Data
        </td>
    </tr>
<?php
    } else {
        // function convertInteger($data)
        // {
        //     if ($data == '1') {
        //         return 'Ya';
        //     }
        //     return 'Tidak';
        // }
        $class ='text-black';
        $i=1;
        foreach($result as $row) {
            echo "<tr>"; 
            echo "<td class='$class'>".$i."</td>";
            echo "<td class='$class'>".$row->kode."</td>";
            echo "<td class='$class'>".$row->jenis."</td>";
            echo "<td class='$class'>".$row->indikator."</td>";
            echo "<td class='$class'>".$row->indikator_penilaian_mutu."</td>";
            echo "<td class='$class'>".$row->nilai_standar."</td>";
            echo "<td class='$class'>".$row->ukuran."</td>";
            echo "<td class='$class'>".$row->pelaksana."</td>";
?>
            <!-- kolom proses -->
            <td class="text-center">
                
                <button onclick="edit(<?=$row->id?>)" class="btn-sm btn-primary btn"><i class="far fa-edit"></i></button>
                <button onclick="hapus(<?=$row->id?>)" class="btn-sm btn-danger btn"><i class="far fa-trash-alt"></i></button>
            </td>
<?php
            $i++;
		}
		echo "</tr>";
    }

?>

