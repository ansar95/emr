
								<?php
								if ($dtsoaphistory == NULL) {
								?>
									<tr>
										<td colspan="100%" class="text-center">
											Tidak Ada Data
										</td>
									</tr>
									<?php } else {
										$no = 1;
										$jmlt = 0;
										foreach ($dtsoaphistory as $row) {
										?> 
											<tr>
												<td><button onclick="lihatdatahistorysoap(<?php echo $row->id; ?>)" class="btn btn-sm btn-light">Lihat</button></td>
												<td align='right'><?php echo $no++;?></td>;
												<td align='center'><?php echo tanggaldua($row->tanggal);?></td>;
												<td align='center'><?php echo $row->jam;?></td>;
												<td align='left'><?php echo $row->nama_unit;?></td>;
												<td align='left'><?php echo $row->nama_dokter;?></td>;
											</tr>
										<?php 	
										}
									} ?>	
							</tbody>