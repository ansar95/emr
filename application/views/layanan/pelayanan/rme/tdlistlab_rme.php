<?php
if ($dtlabdetail_hariini == null) {
?>
	<tr>
		<td class="text-center">
			Belum Ada Order
		</td>
	</tr>
<?php
} else {	
	$i=0;
	foreach($dtlabdetail_hariini as $row) {
		if ( $i==0 ) {
?>			
			<tr>
				<td colspan="2">
					<?php
						echo '<span style="margin-left: 2ch;"></span> <strong style="color: red; font-size: 12px;">' . $row->notransaksi_IN.'</strong><br>';
					?>
				<td>	

			</tr>
														
<?php 	
			$i=1;
		} 
?>
			<tr onclick="bukaFormLabx('<?php echo $row->id; ?>')" style="border-bottom: 1px solid #0099CC;">
				<td width="10%" style="text-align: center;">
					<?php echo '*'; ?>
				</td>
				<td width="90%">
<?php
					echo '<style="color: red; font-size: 12px;">' . $row->namatindakan;
?>
				<td>	
			</tr>
<?php			
	}
}
?>
<script>

function bukaFormLabx(id) {
    $.ajax({
			url: "<?php echo site_url(); ?>/rme/panggilFormLabRme",
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
