<tr style="background-color: #ccc;">
					<th style="width: 6%; text-align: center; font-size: 14px;" height="35px">Tanggal</th>
					<th style="width: 5%; text-align: center; font-size: 14px;">Jam</th>
					<th style="width: 32%; text-align: center; font-size: 14px;">Faktor Resiko</th>
					<th style="width: 4%; text-align: center; font-size: 14px;">Total</th>
					<th style="width: 15%; text-align: center; font-size: 14px;">Hasil Skrining</th>
					<th style="width: 15%; text-align: center; font-size: 14px;">Saran</th>
					<th style="width: 13%; text-align: center; font-size: 14px;">Intervensi</th>
					<th style="width: 10%; text-align: center; font-size: 14px;">#</th>
				</tr>
				<?php
					if ($dtresikojatuh == NULL) {
				?>
				<tr>
					<td colspan="100%" class="text-center">
						Belum Ada Data
					</td>
				</tr>
				<?php } else {
					$no = 1;
					$jmlt = 0;
					foreach ($dtresikojatuh as $row) {
				?>
					<tr>
						<td style="font-size: 13px;" height="35px"><?php echo $row->tanggal; ?></td>
						<td style="font-size: 13px;"><?php echo $row->jam; ?></td>
						<td style="font-size: 13px;">
							<?php if ($row->riwayatjatuh != 0) { $riwayatjatuhtext='Ya (25)'; } else { $riwayatjatuhtext='Tidak (0)';} ?>
							<?php if ($row->diagnosa != 0) { $diagnosatext='Ya (15)'; } else { $diagnosatext='Tidak (0)';} ?>
							<?php if ($row->alatbantu == 0) { 
								$alatbantutext='Tidak ada / kursi roda / perawat / tirah baring (0)'; 
								} else if ($row->alatbantu == 15) {  
									$alatbantutext='Tongkat / Alat Penopang (15)';
								} else {
									$alatbantutext='Berpegangan pada perabot (30)';
								} 
							?>
							<?php if ($row->terpasanginfus != 0) { $terpasanginfustext='Ya (20)'; } else { $terpasanginfustext='Tidak (0)';} ?>
							<?php if ($row->gayaberjalan == 0) { 
									$gayaberjalantext='Normal / tirah baring / immobilisasi(0)'; 
								} else if ($row->gayaberjalan == 10) {  
									$gayaberjalantext='Lemah (10)';
								} else {
									$gayaberjalantext='Terganggu (20)';
								} 
							?>
							<?php if ($row->statusmental != 0) {
								 $statusmentaltext='Sering lupa akan keterbatasan yang dimiliki (20)'; 
								 } else { $statusmentaltext='Sadar akan kemampuan diri sendiri (0)';
								} ?>
							<?php 
								$totalskor=$row->riwayatjatuh+$row->diagnosa+$row->alatbantu+$row->terpasanginfus+$row->gayaberjalan+$row->statusmental;
							?>
							<?php echo 'Riwayat Jatuh 1 Tahun Terakhir '. $riwayatjatuhtext.'<br>';?>
							<?php echo 'Diagnosa Sekunder (>2 Diagnosa Medis) '. $diagnosatext.'<br>';?>
							<?php echo 'Alat Bantu '. $alatbantutext.'<br>';?>
							<?php echo 'Terpasang Infus '. $terpasanginfustext.'<br>';?>
							<?php echo 'Gaya Berjalan '. $gayaberjalantext	.'<br>';?>
							<?php echo 'Status Mental '. $statusmentaltext	.'<br>';?>
						</td>
						<td style="font-size: 15px;"><b><?php echo $totalskor; ?></b></td>
						<td style="font-size: 13px;"><?php echo $row->hasilskrining; ?></td>
						<td style="font-size: 13px;"><?php echo $row->saran; ?></td>
						<td style="font-size: 13px;"><?php echo $row->intervensi; ?></td>
						<td style="font-size: 13px;">
							<button onclick="editresiko('<?php echo $row->id;?>')" class="btn btn-secondary" data-bs-dismiss="modal">Edit</button>
							<button onclick="hapusresiko('<?php echo $row->id;?>')" class="btn btn-danger" data-bs-dismiss="modal">Hapus</button>
							<input type="hidden" id="idnya" style="width: 100%; height: 30px; border: none;" value="<?php echo $row->id; ?>">
						</td>
					</tr>		
				<?php
					}
				}
				?>