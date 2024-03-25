<?php
																	if ($dtresepdetail == NULL) {
																		?>
																		<tr">
																			<td colspan="100%" class="text-center">
																				Belum Ada Data Resep
																			</td>
																			</tr>
																		<?php } else {
																		$no = 1;
																		$jmlt = 0;
																		$noresep_uji = '';
																		$cek = 0;
																		foreach ($dtresepdetail as $row) {
																			$kode_dokter_resep = $row->kode_dokter;
																			if ($noresep_uji != $row->noresep) {
																				?>
																					<tr>
																						<td colspan="2">
																							<?php
																							if ($cek != 0) {
																								echo '<br>';
																								$cek = 1;
																							}
																							echo '<strong style="color: navy; font-size: 14px; height: 20px; display: inline-block; line-height: 20px; margin-left: 5px;">' . tanggaldua($row->tglresep) . ' | ' . $row->noresep . '</strong><br>';

																							echo '<strong style="color: black;font-size: 12px; margin-left: 5px;">' . $row->nama_dokter . '</strong>';
																							?>
																						<td>
																					</tr>
																					<?php
																					$noresep_uji = $row->noresep;
																			}
																			if ($editing == 1) {
																				?>
																					<tr
																						onclick="addResep('<?php echo $row->id; ?>', '<?php echo $row->kodeobat; ?>')">
																					<?php } else { ?>
																					<tr>
																					<?php } ?>
																					<td width="5%">
																					</td>
																					<td width="95%">
																						<?php
																						echo '<strong style="color: red; font-size: 12px;">' . $row->namaobat . '</strong>' . '| ' . $row->qty . ' ' . $row->satuanpakai . '<br>';
																						echo 'Aturan Pakai : ';
																						if ($row->pagi != '') {
																							echo "Pagi : " . $row->pagi;
																						}
																						if ($row->siang != '') {
																							echo " Siang : " . $row->siang;
																						}
																						if ($row->malam != '') {
																							echo " Malam : " . $row->malam;
																						}
																						if ($row->keterangan != '') {
																							echo " === " . $row->keterangan;
																						}
																						if ($row->caramakan != '') {
																							echo " " . $row->caramakan . ' Makan';
																						}
																						if ($row->catatanracikan != '' || $row->catatanracikan != NULL) {
																							echo "<br>" . $row->catatanracikan;
																						}
																						?>
																					<td>
																				</tr>

																				<?php
																		}
																	}
																	?>