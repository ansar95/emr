<?php
																	$no=100;
																	if ($dtobatinfus== NULL) {
																	?>
																		<tr>
																			<td colspan="100%" class="text-left">
																				Belum Ada Data
																			</td>
																		</tr>
																		<?php } else {
																		$no = 100;
																		$jmlt = 0;
																		$warnabackground="#FFFFFF";
																		foreach ($dtobatinfus as $row) {
																		?>	
																			<tr style="background-color: <?php echo $warnabackground;?>;" onclick="openformobatinfus2('<?php echo $row->id;?>')">
																				<td width="2%">
																				</td>
																				<td width="98%">
																					<?php 
																					echo '<strong style="color: Navy; font-size: 13px;">' . tanggaldua($row->tanggal) .' | ' .$row->jam.'</strong><br>';
																						if ($row->namaobat != null) {echo '<span style="color: darkred;">Obat/Infus : </span><strong>' . $row->namaobat . '<br></strong>';} 
																						if ($row->dosis != null) {echo '<span style="color: darkred;">Dosis : </span><strong>'.$row->dosis . "<br></strong>";} 
																						if ($row->oral != null) {echo '<span style="color: darkred;">Oral/IV/IM/IC/SC : </span><strong>'.$row->oral . "<br></strong>";} 
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
function openformobatinfus2(id) {
	var no_rm = document.getElementById("no_rm").value;
	var notransaksi = document.getElementById("kode_dokter").value;
		$.ajax({
			url: "<?php echo site_url();?>/rme/panggilformobatinfus",
			type: "GET",
			data : {
					id : id,
					no_rm : no_rm,
					notransaksi : notransaksi
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