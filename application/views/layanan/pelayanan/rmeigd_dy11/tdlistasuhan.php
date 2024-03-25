<?php
																	$no=100;
																	if ($dtasuhan== NULL) {
																	?>
																		<tr>
																			<td colspan="100%" class="text-left">
																				Belum Ada Data
																			</td>
																		</tr>
																		<?php } else {
																		$no = 100;
																		$jmlt = 0;
																		foreach ($dtasuhan as $row) {
																		?>	
																			<!-- <tr onclick="bukaformasuhan('<?php echo $row->id;?>','<?php echo $row->user;?>')"> -->
																			<tr onclick="bukaformasuhan('<?php echo $row->id;?>','<?php echo addslashes($row->user);?>')">


																				<td width="10%">
																				</td>
																				<td width="90%">
																					<?php 
																					echo '<strong style="color: Navy; font-size: 13px;">' . tanggaldua($row->tanggal) .' | ' .$row->jam.'</strong><br>';
																						if ($row->implementasi != null) {echo '<span style="color: darkred;">Implementasi : </span><strong>' . $row->implementasi . '<br></strong>';} 

																						if ($row->evaluasi != null) {echo '<span style="color: darkred;">Evaluasi : </span><strong>' . $row->evaluasi . '<br></strong>';} 

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
	function bukaformasuhan(id,user) {
	var no_rm = document.getElementById("no_rm").value;
	var username = document.getElementById("username").value;
	if (username == user) {
		$.ajax({
			url: "<?php echo site_url();?>/rme/panggilformasuhan",
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
			text: "Tidak bisa melakukan perubahan  \n dari user lain",
			icon: "error",
			button: true
		});
	}
}
</script>