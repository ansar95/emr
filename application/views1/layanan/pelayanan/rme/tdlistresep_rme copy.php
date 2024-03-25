<?php
if ($dtresepdetail_hariini == null) {
?>
<tr>
	<td colspan="10" class="text-center">
		Tidak Ada Data
	</td>
</tr>
<?php
} else {
	foreach($dtresepdetail_hariini as $row) {
?>        
        <tr onclick="bukaFormObat('<?php echo $row->id; ?>')">
        <td width="10%" style="text-align: center;">
            <?php echo '*'; ?>
        </td>
        <td width="90%">
            <?php
            echo '<strong style="color: red; font-size: 12px;">' . $row->namaobat . '</strong><br>';
            echo $row->qty.' '.$row->satuanpakai.' '.$row->takaran.'<br>';
            ?>
        <td>	
    </tr>
<?php    
   }
}
?>

<script>
function bukaFormObat(id) {
    // alert("ID yang dipilih: " + id);
	
    $.ajax({
			url: "<?php echo site_url(); ?>/rme/panggilFormObat",
			type: "GET",
			data: {
				id: id,
			},
			success: function(ajaxData) {
				$("#formmodal").html(ajaxData);
                    $("#formmodal").modal('show', {
                        backdrop: 'true'
                    });
                    modaldetailtutup();
			},
			error: function(ajaxData) {
				$.notify("Gagal Memproses Data", "error");
			}
		});

}

</script>
