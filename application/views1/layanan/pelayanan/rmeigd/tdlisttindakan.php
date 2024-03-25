

																<?php
																if ($dtintegrasi== NULL) {
																?>
																	<tr>
																		<td colspan="100%" class="text-left">
																			Belum Ada Data
																		</td>
																	</tr>
																	<?php } else {
																	$no = 1;
																	$jmlt = 0;
												                    $warnabackground="#FFFFFF";
																	foreach ($dtintegrasi as $row) {
                                                                        $no++;
																	?>	
																		<tr style="background-color: <?php echo $warnabackground;?>;" onclick="openform('<?php echo $row->id;?>')">
																			<td width="2%">
																			</td>
																			<td width="98%">
																				<?php 
																				echo '<strong style="color: Navy; font-size: 13px;">' . tanggaldua($row->tanggal) .' | ' .$row->jam.'</strong><br>';
																					if ($row->tindakan != null) {echo '<span style="color: darkred;">Terapi : </span><strong>' . $row->tindakan . '<br></strong>';} 
																					if ($row->oleh != null) {echo '<span style="color: darkred;">Oleh : </span><strong>'.$row->oleh . "<br></strong>";} 
																					if ($row->user2 != null) {echo '<span style="color: darkred;">User : </span>'.$row->user2 ."<br>";} 
																				echo "<br>";	
																				?>
																			</td>
																		<tr>
																	<?php
																	}
																}
																 ?>




<script>
    function openformx(id) {
	var no_rm = document.getElementById("no_rm").value;
	var notransaksi = document.getElementById("kode_dokter").value;
		$.ajax({
			url: "<?php echo site_url();?>/rme/panggilformtindakan",
			type: "GET",
			data : {
					id : id
					},
			success : function(ajaxData){
				// console.log(ajaxData);
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