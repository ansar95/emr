<?php	
															if ($dtlabheader_semua == null) {
															?>
																<tr>
																	<td class="text-center">
																		Belum Ada Order
																	</td>
																</tr>
															<?php
																} else {	
																	foreach($dtlabheader_semua as $row) {
																?>			
																		<!-- <tr style="border-bottom: 3px solid #C9CDCD; margin-bottom: 20px;"> -->
																		<tr  onclick="bukaFormHasilLAB('<?php echo $row->notransaksi_IN; ?>','<?php echo $row->pilihunitlab; ?>')" style="border-bottom: 3px solid #C9CDCD; margin-bottom: 20px;">
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
																					echo '<strong style="color: navy; font-size: 14px; height: 20px; display: inline-block; line-height: 20px; margin-left: 5px;">'. tanggaldua($row->tanggal).' | '.$row->notransaksi_IN.' | '.$pilihlab.'</strong><br>';
																					?>
																				</div>
																				<?php
																				echo '<strong style="color: black;font-size: 14px; margin-left: 5px;">'.$row->nama_dokter.'</strong>'.'<br>';
																				?>
																				<?php
																				echo '<strong style="color: black;font-size: 12px; margin-left: 5px;">'.'Diagnosa :'.$row->diagnosa.'</strong>'.'<br>';
																				echo '<strong style="color: black;font-size: 12px; margin-left: 5px;">'.'Pemeriksaan : </strong><br>';
																				?>
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
																						$ada = 1;
																						echo '<span style="color: #D72006; font-size: 12px;">&nbsp;&nbsp;&nbsp;&nbsp;' . $row2['namatindakan'] . '</span><br>';
																					}
																					echo '<br>';
																				?>		
																			<td>	
																		</tr>		
															<?php		

																}	
															}
															?>