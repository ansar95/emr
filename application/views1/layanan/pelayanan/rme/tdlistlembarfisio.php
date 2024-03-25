<?php
								if ($dtlambarfisio == NULL) {
									?>
									<tr>
										<td colspan="100%" class="text-center">
											Belum Ada Data
										</td>
									</tr>
								<?php } else {
									$no = 1;
									$jmlt = 0;
									foreach ($dtlambarfisio as $row) {
										?>
										<tr
											onclick="bukalembarfisio_nolembar('<?php echo $row->nolembar; ?>')">
											<td width="10%" valign="top">
											</td>
											<td width="90%" valign="top">
												<?php
												echo '<strong style="color: Navy; font-size: 13px;">' . tanggaldua($row->tgllembar) . ' | ' . $row->nolembar . '</strong><br>';
												?>
											</td>
										<tr>
											<?php
									}
								}
								?>