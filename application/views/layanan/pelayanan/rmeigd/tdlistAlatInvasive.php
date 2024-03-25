<?php
																if ($dttindakaninvasive == NULL) {
																?>
																	<tr>
																		<td colspan="13" class="text-center">
																			Tidak Ada Data
																		</td>
																	</tr>
																	<?php } else {
																	foreach ($dttindakaninvasive as $row) {
																		echo "<tr>";
																		echo "<td>" . $row->nama_unit . "</td>";
																		echo "<td>" . $row->nama_tindakan . "</td>";
																		echo "<td style='text-align:center;'>" . $row->tglpasang . "</td>";
																		echo "<td style='text-align:center;'>" . $row->tgllepas . "</td>";
																		echo "<td style='text-align:center;'>" . $row->hari . "</td>";
																		echo "<td style='text-align:center;'>" . $row->t1 . "</td>";
																		echo "<td style='text-align:center;'>" . $row->t2 . "</td>";
																		echo "<td style='text-align:center;'>" . $row->t3 . "</td>";
																		echo "<td style='text-align:center;'>" . $row->t4 . "</td>";
																		echo "<td style='text-align:center;'>" . $row->t5 . "</td>";
																		echo "<td style='text-align:center;'>" . $row->tglinfeksi . "</td>";

																		echo "<td>" . $row->keterangan . "</td>";
																		?>
																		<td class="text-center">
																			<button onclick="editinfeksi(<?php echo $row->id; ?>)" class="btn-sm btn-primary btn">Edit</button>
																			<button onclick="hapusinfeksi(<?php echo $row->id; ?>)" class="btn-sm btn-danger btn">Hapus</button>
																		</td>
																<?php
																		echo "</tr>";
																	}
																} ?>