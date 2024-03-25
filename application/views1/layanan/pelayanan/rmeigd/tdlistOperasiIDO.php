<?php
																if ($dtoperasiIDO == NULL) {
																?>
																	<tr>
																		<td colspan="12" class="text-center">
																			Tidak Ada Data
																		</td>
																	</tr>
																	<?php } else {
																	foreach ($dtoperasiIDO as $row) {
																		echo "<tr>";
																		echo "<td style='text-align:center;'>" . $row->tgloperasi . "</td>";
																		echo "<td style='text-align:center;'>" . $row->diagnosa . "</td>";
																		echo "<td style='text-align:center;'>" . $row->nama_operasi . "</td>";
																		echo "<td style='text-align:center;'>" . $row->sifat . "</td>";
																		echo "<td style='text-align:center;'>" . $row->kategori . "</td>";
																		echo "<td style='text-align:center;'>" . $row->durasi . "</td>";
																		echo "<td style='text-align:center;'>" . $row->skorasa . "</td>";
																		echo "<td style='text-align:center;'>" . $row->jenisanastesi . "</td>";
																		echo "<td style='text-align:center;'>" . $row->antibiotik . "</td>";
																		echo "<td style='text-align:center;'>" . $row->waktuberi . "</td>";
																		echo "<td style='text-align:center;'>" . $row->tglido . "</td>";
																		?>
																		<td class="text-center">
																			<button onclick="editoprido(<?php echo $row->id; ?>)" class="btn-sm btn-primary btn">Edit</button>
																			<button onclick="hapusoprido(<?php echo $row->id; ?>)" class="btn-sm btn-danger btn">Hapus</button>
																		</td>
																<?php
																		echo "</tr>";
																	}
																} ?>