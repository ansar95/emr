<tr>
								<th width="10%" style="background-color: #ddd; border-bottom: 1px solid #ddd; padding: 8px; text-align: left;"></th>
								<th width="20%" style="background-color: #ddd; border-bottom: 1px solid #ddd; padding: 8px; text-align: left;">Tanggal</th>
								<th width="40%" style="background-color: #ddd; border-bottom: 1px solid #ddd; padding: 8px; text-align: left;">Jenis Pemeriksaan</th>
								<th width="30%" style="background-color: #ddd; border-bottom: 1px solid #ddd; padding: 8px; text-align: left;">Terapi</th>
							</tr>
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
											onclick="bukafisioperiksa('<?php echo $row->id; ?>')">
											<td width="10%" valign="top">
											</td>
											<td width="20%" valign="top" style="vertical-align: top;">
												<?php
												echo '<strong style="color: Navy; font-size: 13px; border-bottom: 1px solid #ddd">' . tanggaldua($row->tglperiksa) . '</strong>';
												?>
											</td>
											<td width="40%" valign="top" style="vertical-align: top;">
												<?php
												echo '<strong style="color: Navy; font-size: 13px;">' . str_replace("\n", '<br>', $row->jenis) . '</strong>';
												?>
											</td>
											<td width="30%" valign="top" style="vertical-align: top;">
												<?php
												echo '<strong style="color: Navy; font-size: 13px;">' . str_replace("\n", '<br>', $row->terapi) . '</strong>';
												?>
											</td>
										<tr>
											<?php
									}
								}
								?>