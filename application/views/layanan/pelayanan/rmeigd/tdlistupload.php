<?php
						if ($dtfile == NULL) {
						?>
							<tr>
								<td width="3%">
								</td>
								<td width="4%">
								</td>
								<td width="80%">
									Belum Ada Data
								</td>
								<td width="13%">
								</td>
							</tr>
						<?php } else {
							foreach ($dtfile as $row) {
						?>
								<tr>
									<td width="3%">
									</td>
									<td width="4%">
										<?php if ($row->type == 'application/pdf') { ?>
											<img src="<?php echo base_url();?>/assets/image/logogambar/logopdf.jpeg" alt="Logo Gambar" style="max-width: 70%; height: auto;">
										<?php } else if ($row->type == 'image/jpeg') { ?>
											<img src="<?php echo base_url();?>/assets/image/logogambar/logojpeg.jpeg" alt="Logo Gambar" style="max-width: 70%; height: auto;">
										<?php } else if ($row->type == 'video/mp4') { ?>
											<img src="<?php echo base_url();?>/assets/image/logogambar/logomp4.jpeg" alt="Logo Gambar" style="max-width: 70%; height: auto;">
										<?php } else  { ?>
											<img src="<?php echo base_url();?>/assets/image/logogambar/logokosong.jpeg" alt="Logo Gambar" style="max-width: 70%; height: auto;">
										<?php } ?>
									</td>
									<td width="80%" style="font-size: 14px; vertical-align:  bottom;" onclick="redirectToFile('<?php echo $row->namafile; ?>')">
										<?php
										echo '<br>';
										echo '<strong>' . $row->keterangan . '<br></strong>';
										echo "<br>";
										?>
									</td>
									<td width="13%">
										<button onclick="hapusfileupload('<?php echo $row->id;?>')" class="btn btn-sm" id="hapusfileupload" name="hapusfileupload" style="background-color: #FFFFFF; color: #330066;"><i class="fa fa-trash" style="font-size: 14px;"></i></button>
									</td>
								</tr>
						<?php
							}
						}
						?>