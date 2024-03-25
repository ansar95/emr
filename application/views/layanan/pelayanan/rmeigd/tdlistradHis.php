<?php	
															if ($dtradheader_semua == null) {
															?>
																<tr>
																	<td class="text-center">
																		Belum Ada Order
																	</td>
																</tr>
															<?php
																} else {	
																	foreach($dtradheader_semua as $row) {
																?>			
																		<!-- <tr> -->
																		<tr style="background-color: transparent;" onmouseover="this.style.backgroundColor='transparent';" onmouseout="this.style.backgroundColor='transparent'; ">
																			<td colspan="2">
																				<div class="form-inline">
																					<?php
																					echo '<strong style="color: navy; font-size: 11px; height: 20px; display: inline-block; line-height: 20px; margin-left: 5px;">'. tanggaldua($row->tanggal).' | '.$row->notransaksi_IN.'</strong><br>';
																					?>
																				</div>
																				<?php
																				echo '<strong style="color: red;font-size: 11px; margin-left: 5px;">'.$row->nama_dokter.'</strong>'.'<br>';
																				?>
																				<?php
																				echo '<strong style="color: red;font-size: 11px; margin-left: 5px;">'.'Diagnosa :'.$row->diagnosa.'</strong>'.'<br>';
																				?>
																			</td>	
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
																						$ada = 1;
																					?>
																						<!-- <tr> -->
																						<tr onclick="bukaFormHasilRAD('<?php echo $row2['idnya']; ?>')">

																							<td>
																					<?php			
																								echo '<span style="color: black; font-size: 14px;">&nbsp;&nbsp;' . $row2['namatindakan'] . '</span><br>';

																								
																					?>
																							<td>	
																						</tr>
																					<?php	
																					}
																					?>
																					<tr style="border-bottom: 3px solid #C9CDCD; margin-bottom: 20px; height: 15px;">
																						<!-- Isi dari baris -->
																					</tr>
															<?php		
																}	
															}
															?>