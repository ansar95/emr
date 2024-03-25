<?php
																if ($dtlembarkonsul == NULL) {
																?>
																	<tr>
																		<td colspan="100%" class="text-center">
																			Belum Ada Data
																		</td>
																	</tr>
																	<?php } else {
																	$no = 1;
																	$jmlt = 0;
																	foreach ($dtlembarkonsul as $row) {
																	?>
																		<tr>
																			<td width="2%">
																			</td>
																			<td width="98%">
																				<?php 
																				echo '<span style="color: navy; font-size: 14px; font-weight:1000;">' . tanggaldua($row->tanggal) . '</span><br>';
																				echo '<span style="color: red; font-weight:1000;">'.$row->nama_unit.'</span>';
																				echo '<span style="color: black; font-weight:1000;">'.' | '.'</span>';
																				echo '<span style="color: navi; font-weight:1000;">'.$row->nama_dokter.'</span><br>';
																				echo '<strong style="color: #990000;">'.'ISI KONSUL : '.'</strong>';
																				if  ( trim($kode_unit) == trim($row->kode_unit)) {
																				?>
																					<button onclick="editisiankonsul('<?php echo $row->id;?>')" class="btn btn-sm" id="tomboleditisikonsul" name="tomboleditisikonsul" style="background-color: #FFFFFF; color: #330066;"><i class="far fa-edit"></i></button>
																				<?php 
																				}
																				echo '<div style="margin-left: 15px; margin-top: 2px;"><em>' . $row->konsul . '</em></div>';
																				// echo '&nbsp;&nbsp;&nbsp;'.$row->konsul."<br>";
																				if ( $row->jawaban != null) {
																					echo '<div style="margin-top: 10px;">'.'<strong style="color: #990000;">'.'JAWABAN KONSUL : '."</strong><br>";
																					echo '<span style="color: red; font-weight:1000;">'.$row->nama_unit_tujuan.'</span>';
																					echo '<span style="color: black; font-weight:1000;">'.' | '.'</span>';
																					echo '<span style="color: navi; font-weight:1000;">'.$row->nama_dokter_jawab.'</span><br>';
																					echo '<div style="margin-left: 15px; margin-top: 5px;"><em>' . $row->jawaban . '</em></div><br>';
																				}
																				if  ( trim($kode_unit) == trim($row->kode_unit_tujuan)) {
																				?>
																					<button onclick="jawabkonsul('<?php echo $row->id;?>')" class="btn btn-sm mt-2" id="tomboleditRacikan" name="tomboleditRacikan" style="background-color: #330066; color: #FFFFFF;">Jawab</button><br>
																				<?php } ?>
																				<br><br>
																			</td>
																		<tr>
																	<?php
																		}}
																 ?>