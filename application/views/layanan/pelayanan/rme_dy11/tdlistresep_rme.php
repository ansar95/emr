

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
    <tr onclick="bukaFormObatx('<?php echo $row->id; ?>')" style="border-bottom: 1px solid #0099CC;">
		<td width="10%" style="text-align: center;">
			<?php echo '*'; ?>
		</td>
		<td width="90%">
			<?php
				echo '<strong style="color: red; font-size: 12px;">' . $row->namaobat.'</strong>'.'| '.$row->qty.' '.$row->satuanpakai.'<br>';
				echo 'Aturan Pakai : ';
				if ($row->pagi != '') {
					echo "Pagi : ".$row->pagi;
				}
				if ($row->siang != '') {
					echo " Siang : ".$row->siang;
				}
				if ($row->malam != '') {
					echo " Malam : ".$row->malam;
				}
				if ($row->keterangan != '') {
					echo " === ".$row->keterangan;
				}
				if ($row->caramakan != '') {
					echo " ".$row->caramakan.' Makan';
			    }			
				if ($row->catatanracikan != ''  || $row->catatanracikan != NULL ) {
					$text_with_br = nl2br($row->catatanracikan);
			?>	
					<p style="color: #A20498; margin-left: 20px;">
				<?php 
					echo $text_with_br;
				}		
				?>
				</p>							
		<td>	
	</tr>
<?php    
   }
}
?>

<script>
function bukaFormObatx(id) {
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
