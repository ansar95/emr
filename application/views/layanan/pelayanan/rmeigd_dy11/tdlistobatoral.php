<?php
																	$no=100;
																	if ($dtobatoral== NULL) {
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
																		foreach ($dtobatoral as $row) {
																		?>	
																			<tr style="background-color: <?php echo $warnabackground;?>;" onclick="openformobatoral2('<?php echo $row->id;?>')">
																				<td width="2%">
																				</td>
																				<td width="98%">
																					<?php 
																					echo '<strong style="color: Navy; font-size: 13px;">' . tanggaldua($row->tanggal) .' | ' .$row->jam.'</strong><br>';
																						if ($row->namaobat != null) {echo '<span style="color: darkred;">Nama Obat : </span><strong>' . $row->namaobat . '<br></strong>';} 
																						if ($row->kekuatan != null) {echo '<span style="color: darkred;">Kekuatan/Sediaan : </span><strong>'.$row->kekuatan . "<br></strong>";} 
																						if ($row->rute != null) {echo '<span style="color: darkred;">Rute : </span><strong>'.$row->rute . "<br></strong>";} 
																						if ($row->frekwensi != null) {echo '<span style="color: darkred;">frekwensi : </span><strong>'.$row->frekwensi . "<br></strong>";} 
																						if ($row->nama_dokter != null) {echo '<span style="color: darkred;">Dokter Penulis : </span><strong>'.$row->nama_dokter . "<br></strong>";} 
																						if ($row->petugas != null) {echo '<span style="color: darkred;">Petugas : </span><strong>'.$row->petugas . "<br></strong>";} 
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
function openformobatoral2(id) {
	var no_rm = document.getElementById("no_rm").value;
	var notransaksi = document.getElementById("kode_dokter").value;
		$.ajax({
			url: "<?php echo site_url();?>/rme/panggilformobatoral",
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