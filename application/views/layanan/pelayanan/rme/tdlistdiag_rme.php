<?php	
										if ($dtdiag_hariini == null) {
										?>
											<tr>
												<td class="text-center">
													Belum Ada Order
												</td>
											</tr>
										<?php
											} else {
												foreach($dtdiag_hariini as $row) {
										?>			
													<tr onclick="bukaFormDiagx('<?php echo $row->id; ?>')" style="border-bottom: 1px solid #0099CC;">
														<td width="2%">
														</td>
														<td width="98%">
															<?php 
															if ($row->type == 1) {
																echo '<strong style="color: red; font-size: 12px;">' . trim($row->nodaftar) . ' | ' . $row->diagnosa . '</strong><br>';
															} else {
																echo '<strong style="color: dark; font-size: 12px;">' . trim($row->nodaftar) . ' | ' . $row->diagnosa . '</strong><br>';
															}
																echo $row->type == 1 ? 'Diagnosa Utama' : 'Diagnosa Sekunder';
																echo ' | ' . trim($row->tgl_masuk) . ' | ' . $row->notransaksi . ' | ';
																echo "<br>";	
															?>
														</td>	
													</tr>
										<?php			
											}
										}
										?>


<script>
function bukaFormDiagx(id) {
    $.ajax({
			url: "<?php echo site_url(); ?>/rme/panggilFormDiagRme",
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
