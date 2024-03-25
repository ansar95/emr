<?php
											if ($dtresepheader_hariini == NULL) {
										?>
											<tr>
												<td colspan="100%" class="text-center">
													Belum Ada Data Resep
												</td>
											</tr>
											<?php } else {
												foreach ($dtresepheader_hariini as $row) {
													$noresep=$row->noresep;
											?>		
													<tr>
														<td colspan="2">
															<?php
															echo '<br>';	
															?>
															<div class="form-inline">
																<?php
																echo '<strong style="color: navy; font-size: 14px; height: 20px; display: inline-block; line-height: 20px; margin-left: 5px;">'. tanggaldua($row->tglresep).' | '.$row->noresep.'</strong><br>';
																?>
																<button onclick="tambahObat('<?php echo $row->noresep; ?>')" class="btn btn-sm btn-secondary ml-auto" data-toggle="tooltip" title="Tambah Obat" id="tambahObatBaru" name="tambahObatBaru" style="background-color: #E9F713; color: black;" >+ O</button>
																<button onclick="tambahRacik('<?php echo $row->noresep; ?>')" class="btn btn-sm btn-secondary ml-1" data-toggle="tooltip" title="Tambah Obat Racikan" id="tombolLain" name="tombolLain" style="background-color: #49F1F5; color: black;" >+ R</button>
																<button onclick="hapusresepheader('<?php echo $row->noresep; ?>')" class="btn btn-sm btn-secondary ml-1" data-toggle="tooltip" title="Hapus Resep" id="tombolLain" name="tombolLain" style="background-color: #E1948C; color: black;" >X</button>
															</div>
															<?php
															echo '<strong style="color: black;font-size: 14px; margin-left: 5px;">'.$row->nama_dokter.'</strong>';
															?>
														<td>	
													</tr>		
													<?php
														$this->db->from("resep_detail");
														$this->db->where("resep_detail.noresep", $noresep);
														$this->db->order_by("resep_detail.idnoresep", 'ASC');
														$query = $this->db->get();
														$data = $query->result_array();
														foreach ($data as $row) {
													?>	
													<!-- <?php if ($editing == 1) { ?>
														<tr onclick="bukaFormObat_ranap2('<?php echo $row['idnoresep']; ?>')" style="border-bottom: 1px solid #0099CC;">
													<?php } else { ?>	
														<tr style="border-bottom: 1px solid #0099CC;">
													<?php }?>	 -->
													<tr onclick="bukaFormObat_ranap2('<?php echo $row['idnoresep']; ?>')" style="border-bottom: 1px solid #0099CC;">

														<td width="10%" style="text-align: center; vertical-align: top">
															<?php echo '*'; ?>
														</td>
														<td width="90%">
															<?php
															echo '<strong style="color: red; font-size: 12px;">' . $row['namaobat'].'</strong>'.'| '.$row['qty'].' '.$row['satuanpakai'].'<br>';
															echo 'Aturan Pakai : ';
															if ($row['pagi'] != '') {
																echo "Pagi : ".$row['pagi'];
															}
															if ($row['siang'] != '') {
																echo " Siang : ".$row['siang'];
															}
															if ($row['malam'] != '') {
																echo " Malam : ".$row['malam'];
															}
															if ($row['keterangan'] != '') {
																echo " === ".$row['keterangan'];
															}
															if ($row['caramakan'] != '') {
																echo " ".$row['caramakan'].' Makan';
															}
															if ($row['catatanracikan'] != ''  || $row['catatanracikan'] != NULL ) {
																$text_with_br = nl2br($row['catatanracikan']);
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
													?>
													<tr>
													<td colspan="2">
													<button onclick="kirimapotik('<?php echo $noresep; ?>')" class="btn btn-sm btn-secondary ml-3" id="kirimapotik" name="kirimapotik" style="background-color: #066F42; color: white;">Kirim Resep ke Apotik</button>

													</td>
													<tr>
														<td colspan="2">
														<br>
														</td>
													</tr>
												</tr>
											<?php
												}
											}
											?>

<script>
										
function bukaFormObat_ranap2(id) {
    $.ajax({
			url: "<?php echo site_url(); ?>/rme/panggilFormObat_ranap",
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
