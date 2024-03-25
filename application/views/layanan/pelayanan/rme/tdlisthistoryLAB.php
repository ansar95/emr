<?php
																	if ($dthasilinstalasiLAB == NULL) {
																		?>
																		<tr>
																			<td colspan="100%" class="text-center">
																				Belum Ada Data
																			</td>
																		</tr>
																	<?php } else {
																		$no = 1;
																		$jmlt = 0;
																		foreach ($dthasilinstalasiLAB as $row) {
																			// $kode_dokter_resep=$row->kode_dokter;
																			?>
																			<tr onclick="bukaFormHasil('<?php echo $row->id; ?>','<?php echo $row->kode_unit; ?>')"
																				style="border-bottom: 1px solid #0099CC;">
																				<td>
																					<?php
																					echo '<strong style="color: red; font-size: 11px;">' . tanggaldua($row->tanggal) . '</strong><br>';
																					echo 'Unit Pemesan : ' . $row->nama_unit_pemesan . '<br>';
																					echo 'Dokter Pemesan : ' . $row->nama_dokter . '<br>';

																					echo "<br>";
																					?>
																				</td>


																				<?php
																		}
																	}
																	?>