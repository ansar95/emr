<?php
																if ($dtsoap == NULL) {
																?>
																	<tr>
																		<td colspan="100%" class="text-center">
																			Belum Ada Data
																		</td>
																	</tr>
																	<?php } else {
																	$no = 1;
																	$jmlt = 0;
																	foreach ($dtsoap as $row) {
																		?>
																		<tr onclick="bukaformsoap('<?php echo $row->id;?>','<?php echo $row->user;?>')">
																			<td width="10%" valign="top">
																			</td>
																			<td width="90%" valign="top">
																				<?php 
																					if ($row->sbar == 1) {
																						echo '<strong style="color: Navy; font-size: 13px;">' . tanggaldua($row->tanggal) . ' | ' . $row->jam.'&nbsp;&nbsp;&nbsp;</strong><span style="font-size: 14px; color: red; background-color: yellow;">&nbsp;SBAR&nbsp;</span><br>';
																					} else {
																						echo '<strong style="color: Navy; font-size: 13px;">' . tanggaldua($row->tanggal).' | '.$row->jam.'</strong><br>';
																					}
																					if ($row->profesi != null) {echo '<span style="color: darkred;">Profesi : </span><strong>' . $row->profesi . '<br></strong>';} 
																					if ($row->subjek != null) {echo '<span style="color: darkred;">Subjek : </span><strong>' . $row->subjek . '<br></strong>';} 
																					if ($row->objek != null) {echo '<span style="color: darkred;">Objek : </span><strong>'.$row->objek . "<br></strong>";} 
																					if ($row->analisis != null) {echo '<span style="color: darkred;">Analisis : </span><strong>'.$row->analisis . "<br></strong>";} 
																					if ($row->plan != null) {echo '<span style="color: darkred;">Plan : </span><strong>'.$row->plan . "<br></strong>";} 
																					if ($row->instruksi != null) {echo '<span style="color: darkred;">Instruksi : </span><strong>'.$row->instruksi . "<br></strong>";} 
																					if ($row->user != null) {echo '<span style="color: darkred;">User : </span><strong>'.$row->user . "<br></strong>";} 
																				echo "<br>";	
																				?>
																			</td>
																		<tr>
																	<?php
																		}}
																 ?>


<script>
function bukaformsoap(id,user) {
	var no_rm = document.getElementById("no_rm").value;
	var username = document.getElementById("username").value;
	if (username == user) {
		$.ajax({
			url: "<?php echo site_url();?>/rme/panggilformsoap",
			type: "GET",
			data : {
					id : id, 
					no_rm : no_rm
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
	} else {
		swal({
			// title: "opps",
			text: "Tidak bisa melakukan perubahan SOAP \n dari user lain",
			icon: "error",
			button: true
		});
	}
}

</script>
