<?php	
										if ($dtlabheader_hariini == null) {
										?>
											<tr>
												<td class="text-center">
													Belum Ada Order
												</td>
											</tr>
										<?php
											} else {	
												foreach($dtlabheader_hariini as $row) {
											?>			
													<tr>
														<td colspan="2">
															<div class="form-inline">
																<?php
																if ($row->pilihunitlab == '1') {
																	$pilihlab='Lab.Klinik';
																} elseif ($row->pilihunitlab == '2') {
																	$pilihlab='Lab.Anatomi';
																} else if ($row->pilihunitlab == '3') {
																	$pilihlab='Lab.Mikrobiolgi';
																} else {
																	$pilihlab='---';
																}
																echo '<strong style="color: navy; font-size: 12px; height: 20px; display: inline-block; line-height: 20px; margin-left: 5px;">'. tanggaldua($row->tanggal).' | '.$row->notransaksi_IN.' | '.$pilihlab.'</strong><br>';
																?>
																<button onclick="tambahlab('<?php echo $row->notransaksi_IN.'_'.$row->pilihunitlab; ?>')" class="btn btn-sm btn-secondary ml-auto"  id="tambahLabBaru" name="tambahLabBaru" style="background-color: #E9F713; color: black;" >+ P</button>

																<button onclick="EditHeaderLab('<?php echo $row->notransaksi_IN; ?>')" class="btn btn-sm btn-secondary ml-1" id="tombolHapusOrderLab" name="tombolHapusOrderLab" style="background-color: #0AF6F6; color: black;" >E</button>

																<button onclick="hapusHeaderLab('<?php echo $row->notransaksi_IN; ?>')" class="btn btn-sm btn-secondary ml-1" id="tombolHapusOrderLab" name="tombolHapusOrderLab" style="background-color: #E1948C; color: black;" >X</button>

															</div>
															<?php
															echo '<strong style="color: black;font-size: 14px; margin-left: 5px;">'.$row->nama_dokter.'</strong>'.'<br>';
															?>
															<?php
															echo '<strong style="color: black;font-size: 12px; margin-left: 5px;">'.'Diagnosa :'.$row->diagnosa.'</strong>'.'<br>';
															echo '<strong style="color: black;font-size: 12px; margin-left: 5px;">'.'Pemeriksaan : </strong>';
															?>
														<td>	
													</tr>											
											<?php 	
												$vIN= $row->notransaksi_IN;
												$this->db->select("mtindakan.tindakan as namatindakan, ptindakan_instalasi.id as idnya");
												$this->db->from("ptindakan_instalasi");
												$this->db->join("mtindakan", "mtindakan.kode_tindakan = ptindakan_instalasi.tindakan");
												$this->db->where("ptindakan_instalasi.notransaksi_IN", $vIN);
												$this->db->order_by("ptindakan_instalasi.id", 'ASC');
												$query2= $this->db->get();
												$data2 = $query2->result_array();
												$ada=0;
												foreach ($data2 as $row2) {
													$ada=1;
											?>
													<tr onclick="bukaFormLab('<?php echo $row2['idnya']; ?>','<?php echo $vIN; ?>')">

														<td width="10%" style="text-align: center;">
															<?php echo '*'; ?>
														</td>
														<td width="90%">
															<?php
															echo '<span style="color: #D72006; font-size: 12px;">' . $row2['namatindakan'] . '</span>';
															?>
														<td>	
													</tr>
										<?php		
												}
												if ($row->cekitemorder == 1) {	
													
										?>		
												<tr>
													<td colspan="2">
													<button onclick="kirimlab('<?php echo $row->notransaksi_IN; ?>')" class="btn btn-sm btn-secondary ml-3" id="kirimlab" name="kirimlab" style="background-color: #066F42; color: white;">Kirim Order ke Laboratorium</button>
													</td>
												</tr>
										<?php } ?>		
												<tr style="border-bottom: 3px solid #C9CDCD; height: 30px;">
													<td colspan="4">
														<!-- <div style="border-bottom: 10px solid white;"></div> -->
													</td>
												</tr>
										<?php		

											}	
										}
										?>