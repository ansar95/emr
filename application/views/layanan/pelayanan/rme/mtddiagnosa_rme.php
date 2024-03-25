<?php
																if ($diagdata == null) {
																?>
																	<tr>
																		<td colspan="6" class="text-center">
																			Tidak Ada Data
																		</td>
																	</tr>
																	<?php
																} else {
																	foreach ($diagdata as $key => $row) {
																		echo "<tr><td>" . ++$key . "</td>";
																		echo "<td>" . $row->icdlatin . "</td>";
																		echo "<td>" . $row->diagnosa . "</td>";
																		echo "<td>" . $row->nodaftar . "</td>";
																		echo "<td>" . $row->nodtd . "</td>";
																		if ($row->type == 1) {
																			echo "<td>" . "Utama" . "</td>";
																		} else {
																			echo "<td>" . "Sekunder" . "</td>";
																		}
																	?>
																		<td class="text-center">
																			<!-- <a onclick="formeditdiagnosa(<?php echo $row->id; ?>);" class="btn-sm btn-info btn-flat"><i class="fa fa-edit"></i></a> -->
																			<a onclick="hapusdiagnosa(<?php echo $row->id; ?>);" class="btn-sm btn-danger btn-flat"><i class="fa fa-trash"></i></a>
																		</td>
																<?php
																		echo "</tr>";
																	}
																}
																?>