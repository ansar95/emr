<?php
																	if ($dthasilinstalasiRAD == NULL) {
																		?>
																		<tr>
																			<td colspan="100%" class="text-center">
																				Belum Ada Data
																			</td>
																		</tr>
																	<?php } else {
																		$no = 1;
																		$jmlt = 0;
																		foreach ($dthasilinstalasiRAD as $row) {
																			// $kode_dokter_resep=$row->kode_dokter;
																			?>
																			<tr onclick="bukaFormHasilRAD('<?php echo $row->id; ?>')"
																				style="border-bottom: 1px solid #0099CC;">
																				<td>
																					<?php
																					echo '<strong style="color: red; font-size: 11px;">' . tanggaldua($row->tanggal) . '</strong><br>';
																					echo '<strong style="color: black; font-size: 14px;">' . $row->namatindakan . '</strong><br>';
																					echo 'Unit Pemesan : ' . $row->nama_unit_pemesan . '<br>';
																					echo 'Dokter Pemesan : ' . $row->nama_dokter . '<br>';

																					echo "<br>";
																					?>
																				</td>


																				<?php
																		}
																	}
																	?>