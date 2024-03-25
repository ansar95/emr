<div class="container-fluid site-width">
	<!-- START: Breadcrumbs-->
	<div class="row ">
		<div class="col-12  align-self-center">
			<div class="sub-header mt-5 py-3 align-self-center d-sm-flex w-100 rounded">
				</ol>
			</div>
		</div>
	</div>
	<!-- END: Breadcrumbs-->
	<div class="row">
		<div class="col-12">
			<!-- <div class="card" style="background-color: #808000;"> -->
			<div class="row spacing-row">
				<div class="col-md-11">
					<div class="card-body">
						<input class="form-control" id="idnyapasien" type="hidden" value="<?php echo $dataPasien->id; ?>">
						<input class="form-control" id="notransaksi" type="hidden" value="<?php echo $dataPasien->notransaksi; ?>">
						<input class="form-control" id="no_rm" type="hidden" value="<?php echo $dataPasien->no_rm; ?>">
						<input class="form-control" id="no_askes" type="hidden"
							value="<?php echo $dataPasien->no_askes; ?>">
						<input class="form-control" id="kode_dokter" type="hidden"
							value="<?php echo $dataPasien->kode_dokter; ?>">
						<input class="form-control" id="nama_dokter" type="hidden"
							value="<?php echo $dataPasien->nama_dokter; ?>">
						<input class="form-control" id="kode_unit" type="hidden"
							value="<?php echo $dataPasien->kode_unit; ?>">
						<input class="form-control" id="nama_unit" type="hidden"
							value="<?php echo $dataPasien->nama_unit; ?>">
						<input class="form-control" id="golongan" type="hidden"
							value="<?php echo $dataPasien->golongan; ?>">
						<input class="form-control" id="tgl_masuk" type="hidden" value="<?php echo $dataPasien->tgl_masuk; ?>">
						<input class="form-control" id="angkatab" type="hidden" value="<?php echo $angkatab; ?>">

						<input class="form-control" id="kode_kelas" type="hidden" value="<?php echo $dataPasien->kode_kelas; ?>">
							<input class="form-control" id="nama_kelas" type="hidden" value="<?php echo $dataPasien->nama_kelas; ?>">
							<input class="form-control" id="kode_kamar" type="hidden" value="<?php echo $dataPasien->kode_kamar; ?>">
							<input class="form-control" id="tgl_lahir" type="hidden" value="<?php echo $tgl_lahir; ?>">
						<p>

						<div class="w-sm-100 mr-auto">
							<h6 class="mb-0" style="color: #848182;">Pasien</h6>
						</div>
						<div class="w-sm-100 mr-auto">
							<h4 class="mb-0" style="color: #2D076F;">
								<?php echo $dataPasien->no_rm . ' | ' . $nama_pasien; ?>
							</h4>
						</div>
						<span style="display: inline;font-weight: bold; font-size: 14px; color: #4C0428;">
							<?php echo $dataPasien->golongan . ' | No.Kartu : ' . $dataPasien->no_askes . ' | NIK : ' . $dataPasien->nik . ' | Alamat : ' . $dataPasien->alamat . ' | Trx : ' . $dataPasien->notransaksi . ' | No.Antrian : ' . $dataPasien->no_antrian; ?>
						</span><br>
						<span style="display: inline;font-weight: bold; font-size: 14px; color: #4C0428;">
							<?php echo 'Tanggal Lahir : ' . $tgl_lahir . ' | ' . $umur ?>
						</span><br>
						<?php if ($editing == 0) { ?>
							<!-- <span style="display: inline;font-weight: bold; font-size: 20px; color: #9D1305; background-color: yellow;"><?php echo ' History Pemeriksaan Pasien Tanggal : ' . $tglhistori . " "; ?></span><br> -->
							<button class="btn btn-light"
								style="display: inline;font-weight: bold; font-size: 20px; color: #9D1305; background-color: yellow;">
								<?php echo ' History Pemeriksaan Pasien Tanggal : ' . $tglhistori . " "; ?>
							</button>
						<?php } ?>
						</p>
					</div>
				</div>
				<div class="col-md-1">
					<button class="btn btn-light mt-4" onclick="kembaliKeRmeNew()">Kembali</button>
				</div>
			</div>
			<!-- </div> -->

			<div class="tab-pane fade show" id="tabutama" role="tabpanel2">
				<nav>
					<div class="nav nav-tabs" id="subnav12" role="tablist2">
						<div class="nav-item" style="flex: 1;"></div>
						<a class="nav-item nav-link active" id="subtabutamarajal" data-toggle="tab" data-target="#utamarajal" href="#utamarajal" onclick="changeTabStyle(this)"
							role="tab" aria-controls="subnav12-1" aria-selected="true"
							style="background-color: #566573; color: white; border: 1px solid #ABB2B9;">Pelayanan</a>

						<a class="nav-item nav-link" id="subtabawalmedis" data-toggle="tab" data-target="#awalmedis" onclick="changeTabStyle(this)"
							href="#awalmedis" role="tab" aria-controls="subnav12-4" aria-selected="false"
							style="border: 1px solid #ABB2B9;">Asesmen Awal Medis</a>

					 	<?php if ($this->session->userdata("akses_rmefisio")==1) { ?>
						<a class="nav-item nav-link" id="subtabfisio" data-toggle="tab" data-target="#fisio"  onclick="changeTabStyle(this)"
							href="#fisio" role="tab" aria-controls="subnav12-5" aria-selected="false"
							style="border: 1px solid #ABB2B9;">Lembar Fisioterapi</a>
						<?php } ?>
						

						<a class="nav-item nav-link" id="subtabresumemedis" data-toggle="tab" data-target="#resumemedis" onclick="changeTabStyle(this)"
							href="#resumemedis" role="tab" aria-controls="subnav12-11" aria-selected="false"
							style="border: 1px solid #ABB2B9;">Resume Medis</a>

						<a class="nav-item nav-link" id="subuploadfile" data-toggle="tab" data-target="#uploadfile" onclick="changeTabStyle(this)"
							href="#resumemedis" role="tab" aria-controls="subnav12-9" aria-selected="false"
							style="border: 1px solid #ABB2B9;">Upload File</a>

					</div>
					<div class="tab-content" id="subnav12-content">
						<div class="tab-pane fade show active" id="utamarajal" role="tabpanel2" aria-labelledby="subtabutamarajal">
							<!-- ========== halaman utama ======== -->
							<div class="card">
								<div class="col-md-12">
									<div class="row spacing-row">
										<div class="col-md-3 mt-4 mb-5" id="soap">
											<div id="accordion3" class="accordion-alt" role="tablist">
												<div class="mb-2">
													<h6 class="mb-0">
														<a class="collapsed redial-dark d-block border redial-border-light"
															data-toggle="collapse" href="#collapse5" aria-expanded="false"
															aria-controls="collapse5" style="background-color: #D5FAC1;">
															SOAP
														</a>
													</h6>
													<div id="collapse5" class="collapse show" role="tabpanel" data-parent="#accordion3">
														<!-- <div class="card-body"> -->
														<!-- <div class="table-responsive mt-2 table-hover table-scrollable" id="tabeltindakan">
																		-->
														<div class="table-responsive mt-2 table-hover table-scrollable"
															id="tabeltindakan" style="max-height: 600px; overflow-y: auto;">
															<table class="table" id="tabelsoap">
																<tbody>
																	<?php
																	if ($dtsoaphistory == NULL) {
																		?>
																		<tr>
																			<td colspan="100%" class="text-center">
																				Belum Ada Data SOAP
																			</td>
																		</tr>
																	<?php } else {
																		$no = 1;
																		$jmlt = 0;
																		foreach ($dtsoaphistory as $row) {
																			$kode_dokter_psoap = $row->kode_dokter;
																			$kode_dokter_form_periksa = $dataPasien->kode_dokter;
																			if ($kode_dokter_form_periksa == $kode_dokter_psoap) {
																				$warnabackground = "#FFFFFF";
																			} else {
																				$warnabackground = "#B0C4DE";
																			}
																			?>
																			<tr
																				onclick="openSoapForm('<?php echo $row->id; ?>','<?php echo $row->kode_dokter; ?>')">
																				<?php
																				$namabulan3 = substr(nama_bulan($row->tanggal), 0, 3);
																				$tanggal = date('d', strtotime($row->tanggal));
																				$tahun = date('Y', strtotime($row->tanggal));
																				?>
																				<td width="15%" valign="top">
																					<div class="transaction-date text-center rounded p-2"
																						style="border: 1px solid #E9EADD; color: #8E0B37;">
																						<small class="d-block">
																							<?php echo strtoupper($namabulan3); ?>
																						</small>
																						<span class="h6">
																							<?php echo strtoupper($tanggal); ?>
																						</span>
																						<small class="d-block">
																							<?php echo strtoupper($tahun); ?>
																						</small>
																					</div>
																				</td>
																				<td width="85%" valign="top">
																					<?php
																					echo '<strong style="color: Navy; font-size: 13px;">' . tanggaldua($row->tanggal) . '</strong><br>';
																					echo $row->nama_unit."<br>";
																					echo $row->nama_dokter . "<br>";
																					if ($row->keluhanutama != null) {
																						echo '<span style="color: darkred;">Keluhan Utama : </span><strong>' . $row->keluhanutama . '<br></strong>';
																					}
																					if ($row->riwayatsekarang != null) {
																						echo '<span style="color: darkred;">Riwayat Sekarang : </span><strong>' . $row->riwayatsekarang . "<br></strong>";
																					}
																					if ($row->riwayatdahulu != null) {
																						echo '<span style="color: darkred;">Riwayat Dahulu : </span><strong>' . $row->riwayatdahulu . "<br></strong>";
																					}
																					if ($row->alergi != null) {
																						echo '<span style="color: darkred;">Alergi : </span><strong>' . $row->alergi . "<br></strong>";
																					}
																					if ($row->suhu != 0) {
																						echo '<span style="color: darkred;">Suhu : </span><strong>' . $row->suhu . "</strong><br></strong>";
																					}
																					if ($row->tinggi != 0) {
																						echo '<span style="color: darkred;">Tinggi : </span><strong>' . $row->tinggi . "<br></strong>";
																					}
																					if ($row->berat != 0) {
																						echo '<span style="color: darkred;">Berat : </span><strong>' . $row->berat . "<br></strong>";
																					}
																					if ($row->respirasi != 0) {
																						echo '<span style="color: darkred;">Respirasi : </span><strong>' . $row->respirasi . "<br></strong>";
																					}
																					if ($row->nadi != 0) {
																						echo '<span style="color: darkred;">Nadi : </span><strong>' . $row->nadi . "<br></strong>";
																					}
																					if ($row->spo2 != 0) {
																						echo '<span style="color: darkred;">SpO2 : </span><strong>' . $row->spo2 . "<br></strong>";
																					}
																					if ($row->gcs != null) {
																						echo '<span style="color: darkred;">GCS : </span><strong>' . $row->gcs . "<br></strong>";
																					}
																					if ($row->kesadaran != null && $row->kesadaran != '-' && $row->kesadaran != '') {
																						echo '<span style="color: darkred;">Kesadaran : </span><strong>' . $row->kesadaran . "<br>";
																					}
																					if ($row->kesadaranlain != null) {
																						echo '<span style="color: darkred;">Keterangan : </span><strong>' . $row->kesadaranlain . "<br></strong>";
																					}
																					if ($row->objektif != null) {
																						echo '<span style="color: darkred;">Objektif : </span><strong>' . $row->objektif . "<br></strong>";
																					}
																					if ($row->assesment != null) {
																						echo '<span style="color: darkred;">Assesment : </span><strong>' . $row->assesment . "<br></strong>";
																					}
																					if ($row->plan != null) {
																						echo '<span style="color: darkred;">Plan : </span><strong>' . nl2br($row->plan) . "<br></strong>";
																					}
																					if ($row->instruksi != null) {
																						echo '<span style="color: darkred;">Instruksi : </span><strong>' . $row->instruksi . "<br></strong>";
																					}
																					if ($row->evaluasi != null) {
																						echo '<span style="color: darkred;">Evaluasi : </span><strong>' . $row->evaluasi . "<br></strong>";
																					}
																					if ($row->diagnosa != null) {
																						echo '<span style="color: darkred;">Diagnosa : </span><strong>' . $row->diagnosa . "<br></strong>";
																					}
																					echo "<br>";
																					?>
																				</td>
																			<tr>
																				<?php
																		}
																	}
																	?>
																</tbody>
															</table>
														</div>
														<!-- </div> -->
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-3 mt-4" id="order">
											<div id="accordion45" class="accordion-alt" role="tablist">
												<div class="mb-2">
													<h6 class="mb-0">
														<a class="d-block border" data-toggle="collapse" href="#collapse45"
															aria-expanded="true" aria-controls="collapse45"
															style="background-color: #F0E68C;">
															History / Pemesanan Tindakan
														</a>
													</h6>

													<button class="btn"
														style="background-color: #FF5733; color: white; margin-top: 5px;"
														onclick="toggleCollapse('collapseResep')">Resep</button>
													<button class="btn" style="background-color: Olive; color: white; margin-top: 5px;"
														onclick="toggleCollapse('collapseLaboratorium')">Laboratorium</button>
													<button class="btn" style="background-color: Peru; color: white; margin-top: 5px;"
														onclick="toggleCollapse('collapseRadiologi')">Radiologi</button>
													<button class="btn" style="background-color: Teal; color: white; margin-top: 5px;"
														onclick="toggleCollapse('collapseDiagnosa')">Diagnosa</button>
													<div id="collapseResep" class="collapse  mt-3">
														<!-- class="collapse show" -->
														<h7>History Resep</h7>
														<div class="form-inline">
															<label for="cari" class="mr-2"> Cari</label>
															<input type="text" class="form-control" id="cari"
																placeholder="Masukkan kata kunci">
														</div>
														<!-- tabel data resep yang sudah ada sebelumnya -->
														<div class="table-responsive mt-2 table-hover table-scrollable" id="tabeltindakanresep" style="max-height: 600px; overflow-y: auto;">
															<table class="table" id="tabelresep" style="background-color: #FFE4E1;">
																		<tbody>
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
																				$noresep_uji='';
																				$cek=0;
																				foreach ($dtresepdetail as $row) {
																					$kode_dokter_resep=$row->kode_dokter;
																					if ($noresep_uji != $row->noresep){
																				?>		
																						<tr>
																							<td colspan="2">
																							<?php
																								if ($cek != 0) {
																									echo '<br>';
																									$cek=1;
																								}	
																								echo '<strong style="color: navy; font-size: 14px; height: 20px; display: inline-block; line-height: 20px; margin-left: 5px;">'. tanggaldua($row->tglresep).' | '.$row->noresep.'</strong>';
																								echo '<strong style="color: green; font-size: 14px; height: 20px; display: inline-block; line-height: 20px; margin-left: 5px;">';
																								echo ($row->jamselesai !== NULL) ? '&nbsp;&nbsp;&nbsp;==> SELESAI' : '';
																								echo '</strong>';
																								echo '<br>';
																								echo '<strong style="color: black;font-size: 12px; margin-left: 5px;">'.$row->nama_dokter.'</strong>';
																							?>
																							<td>	
																						</tr>
																				<?php		
																						$noresep_uji = $row->noresep;
																					}
																					// if ($editing == 1 && $this->session->userdata("kodedokter")!='XXXXXX') {
																					if ($editing == 1) {
																				?>
																					<tr onclick="addResep('<?php echo $row->id; ?>', '<?php echo $row->kodeobat; ?>')">
																				<?php } else { ?>
																					<tr>
																				<?php } ?>		
																						<td width="5%">
																						</td>
																						<td width="95%">
																							<?php
																							echo '<strong style="color: red; font-size: 12px;">' . $row->namaobat.'</strong>'.'| '.$row->qty.' '.$row->satuanpakai.'<br>';
																							echo 'Aturan Pakai : ';
																							if ($row->pagi != '') {
																								echo "Pagi : ".$row->pagi;
																							}
																							if ($row->siang != '') {
																								echo " Siang : ".$row->siang;
																							}
																							if ($row->malam != '') {
																								echo " Malam : ".$row->malam;
																							}
																							if ($row->keterangan != '') {
																								echo " === ".$row->keterangan;
																							}
																							if ($row->caramakan != '') {
																								echo " ".$row->caramakan.' Makan';
																							}
																							if ($row->catatanracikan != ''  || $row->catatanracikan != NULL ) {
																								echo "<br>".$row->catatanracikan;
																							}	
																							?>
																						<td>	
																					</tr>
																					
																				<?php
																					}}
																			?>
																		</tbody>
															</table>
														</div>
													</div>
													<div id="collapseLaboratorium" class="collapse mt-3">
														<h7>Histori Laboratorium</h7>
														<div class="form-inline">
															<label for="carilab" class="mr-2"> Cari</label>
															<input type="text" class="form-control" id="carilab" placeholder="Masukkan kata kunci">
														</div>
														<!-- tabel data resep yang sudah ada sebelumnya -->
														<div class="table-responsive mt-2 table-hover table-scrollable" id="tabeltindakanlab" style="max-height: 600px; overflow-y: auto;">
															<table class="table" id="tabellab" style="background-color: #FFFF99;">
																		<tbody>
																		<?php	
																		if ($dtlabheader_semua == null) {
																		?>
																			<tr>
																				<td class="text-center">
																					Belum Ada Order
																				</td>
																			</tr>
																		<?php
																			} else {	
																				foreach($dtlabheader_semua as $row) {
																			?>			
																					<tr  onclick="bukaFormHasilLAB('<?php echo $row->notransaksi_IN; ?>','<?php echo $row->pilihunitlab; ?>')" style="border-bottom: 3px solid #C9CDCD; margin-bottom: 20px;">
																						<td colspan="2">
																							<div class="form-inline">
																								<?php
																								if ($row->pilihunitlab == '1') {
																									$pilihlab='Lab.Klinik';
																								} elseif ($row->pilihunitlab == '2') {
																									$pilihlab='Lab.Anatomi';
																								} else if ($row->pilihunitlab == '3') {
																									$pilihlab='Lab.Mikrobiolgi';
																								} else {
																									$pilihlab='---';
																								}
																								echo '<strong style="color: navy; font-size: 13px; height: 20px; display: inline-block; line-height: 20px; margin-left: 5px;">'. tanggaldua($row->tanggal).' | '.$row->notransaksi_IN.' | '.$pilihlab.'</strong><br>';
																								?>
																							</div>
																							<?php
																							echo '<strong style="color: black;font-size: 13px; margin-left: 5px;">'.$row->nama_dokter.' | '.$row->nama_unitR.'</strong>'.'<br>';
																							?>
																							<?php
																							echo '<strong style="color: black;font-size: 11px; margin-left: 5px;">'.'Diagnosa :'.$row->diagnosa.'</strong>'.'<br>';
																							echo '<strong style="color: black;font-size: 11px; margin-left: 5px;">'.'Pemeriksaan : </strong><br>';
																							?>
																							<?php 	
																								$vIN= $row->notransaksi_IN;
																								$this->db->select("mtindakan.tindakan as namatindakan, ptindakan_instalasi.id as idnya");
																								$this->db->from("ptindakan_instalasi");
																								$this->db->join("mtindakan", "mtindakan.kode_tindakan = ptindakan_instalasi.tindakan");
																								$this->db->where("ptindakan_instalasi.notransaksi_IN", $vIN);
																								$this->db->order_by("ptindakan_instalasi.id", 'ASC');
																								$query2= $this->db->get();
																								$data2 = $query2->result_array();
																								$ada=0;
																								foreach ($data2 as $row2) {
																									$ada = 1;
																									echo '<span style="color: #D72006; font-size: 12px;">&nbsp;&nbsp;&nbsp;&nbsp;' . $row2['namatindakan'] . '</span><br>';
																								}
																								echo '<br>';
																							?>		
																						<td>	
																					</tr>		
																		<?php		

																			}	
																		}
																		?>
																		</tbody>
															</table>
														</div>
													</div>
													<div id="collapseRadiologi" class="collapse mt-3">
											<h7>Histori Radiologi</h7>
											<div class="form-inline">
												<label for="carirad" class="mr-2"> Cari</label>
												<input type="text" class="form-control" id="carirad" placeholder="Masukkan kata kunci">
											</div>
											<!-- tabel data resep yang sudah ada sebelumnya -->
											<div class="table-responsive mt-2 table-hover table-scrollable" id="tabeltindakanrad" style="max-height: 600px; overflow-y: auto;">
												<table class="table" id="tabelrad" style="background-color: #FFE4C4;">
												<tbody>
															<?php	
															if ($dtradheader_semua == null) {
															?>
																<tr>
																	<td class="text-center">
																		Belum Ada Order
																	</td>
																</tr>
															<?php
																} else {	
																	foreach($dtradheader_semua as $row) {
																?>			
																		<!-- <tr> -->
																		<tr style="background-color: transparent;" onmouseover="this.style.backgroundColor='transparent';" onmouseout="this.style.backgroundColor='transparent'; ">
																			<td colspan="2">
																				<div class="form-inline">
																					<?php
																					echo '<strong style="color: navy; font-size: 11px; height: 20px; display: inline-block; line-height: 20px; margin-left: 5px;">'. tanggaldua($row->tanggal).' | '.$row->notransaksi_IN.'</strong><br>';
																					?>
																				</div>
																				<?php
																				echo '<strong style="color: red;font-size: 11px; margin-left: 5px;">'.$row->nama_dokter.'</strong>'.'<br>';
																				?>
																				<?php
																				echo '<strong style="color: red;font-size: 11px; margin-left: 5px;">'.'Diagnosa :'.$row->diagnosa.'</strong>'.'<br>';
																				?>
																			</td>	
																		</tr>		
																				<?php 	
																					$vIN= $row->notransaksi_IN;
																					$this->db->select("mtindakan.tindakan as namatindakan, ptindakan_instalasi.id as idnya");
																					$this->db->from("ptindakan_instalasi");
																					$this->db->join("mtindakan", "mtindakan.kode_tindakan = ptindakan_instalasi.tindakan");
																					$this->db->where("ptindakan_instalasi.notransaksi_IN", $vIN);
																					$this->db->order_by("ptindakan_instalasi.id", 'ASC');
																					$query2= $this->db->get();
																					$data2 = $query2->result_array();
																					$ada=0;
																					foreach ($data2 as $row2) {
																						$ada = 1;
																					?>
																						<!-- <tr> -->
																						<tr onclick="bukaFormHasilRAD('<?php echo $row2['idnya']; ?>')">

																							<td>
																					<?php			
																								echo '<span style="color: black; font-size: 14px;">&nbsp;&nbsp;' . $row2['namatindakan'] . '</span><br>';

																								
																					?>
																							<td>	
																						</tr>
																					<?php	
																					}
																					?>
																					<tr style="border-bottom: 3px solid #C9CDCD; margin-bottom: 20px; height: 15px;">
																						<!-- Isi dari baris -->
																					</tr>
															<?php		
																}	
															}
															?>
															</tbody>
												</table>
											</div>
										</div>
													<div id="collapseDiagnosa" class="collapse mt-3">
														<h7>History Diagnosa</h7>
														<div class="form-inline">
															<label for="caridiag" class="mr-2"> Cari</label>
															<input type="text" class="form-control" id="caridiag"
																placeholder="Masukkan kata kunci">
														</div>
														<div class="table-responsive mt-2 table-hover table-scrollable"
															id="tabeldiagnosa" style="max-height: 600px; overflow-y: auto;">
															<table class="table" id="tabeldiag" style="background-color: #66FFCC;">
																<tbody>
																	<?php
																	if ($dthistorydiagnosa == NULL) {
																		?>
																		<tr">
																			<td colspan="100%" class="text-center">
																				Belum Ada Data diagnosa
																			</td>
																			</tr>
																		<?php } else {
																		$no = 1;
																		$jmlt = 0;
																		foreach ($dthistorydiagnosa as $row) {
																			// $kode_dokter_resep=$row->kode_dokter;
																			if ($editing == 1) {
																				?>
																					<tr onclick="addDiag('<?php echo $row->id; ?>')">
																					<?php } else { ?>
																					<tr>
																					<?php } ?>
																					<td width="2%">
																					</td>
																					<td width="98%">
																						<?php
																						if ($row->type == 1) {
																							echo '<strong style="color: red; font-size: 14px;">' . trim($row->nodaftar) . ' | ' . $row->diagnosa . '</strong><br>';
																						} else {
																							echo '<strong style="color: dark; font-size: 14px;">' . trim($row->nodaftar) . ' | ' . $row->diagnosa . '</strong><br>';
																						}
																						echo $row->type == 1 ? 'Diagnosa Utama' : 'Diagnosa Sekunder';
																						echo ' | ' . trim($row->tgl_masuk) . ' | ' . $row->notransaksi . ' | ';
																						echo "<br>";
																						echo "<br>";
																						?>
																					</td>
																				</tr>

																				<?php
																		}
																	}
																	?>
																</tbody>
															</table>
														</div>
													</div>
												</div>
											</div>

											<!-- ======================== -->
											<div id="accordion39" class="accordion-alt" role="tablist">
												<div class="mb-2 mt-4">
													<h6 class="mb-0">
														<a class="collapsed redial-dark d-block border redial-border-light"
															data-toggle="collapse" href="#collapse59" aria-expanded="false"
															aria-controls="collapse59">
															Lembar Konsul
														</a>
													</h6>
													<div id="collapse59" class="collapse show" role="tabpanel" data-parent="#accordion39">
														<div class="col-md-12 mt-1 text-right">
															<button onclick="tambahKonsul()" class="btn btn-sm btn-secondary ml-auto"
																id="tambahObatBaru" name="tambahObatBaru"
																style="background-color: #009933; color: white;">+ Tambah
																Konsul</button>
														</div>
														<div class="table-responsive mt-2 table-hover table-scrollable" id="tabelkonsul"
															style="max-height: 600px; overflow-y: auto;">
															<table class="table" id="tabellembarkonsul">
																<tbody>
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
																					echo '<span style="color: red; font-weight:1000;">' . $row->nama_unit . '</span>';
																					echo '<span style="color: black; font-weight:1000;">' . ' | ' . '</span>';
																					echo '<span style="color: navi; font-weight:1000;">' . $row->nama_dokter . '</span><br>';
																					// echo '<span style="color: black; font-weight:1000;">' . 'Konsul Ke : '.$row->nama_unit_tujuan . '</span><br>';
																					echo '<span style="color: black; font-weight: bold;">' . 'Konsul Ke : '.$row->nama_unit_tujuan . '</span><br>';
																					echo '<strong style="color: #990000;">' . 'ISI KONSUL : ' . '</strong>';
																					if (trim($dataPasien->kode_unit) == trim($row->kode_unit)) {
																						?>
																						<!-- <button onclick="editisiankonsul('<?php echo $row->id; ?>')" class="btn btn-sm icon-pencil" id="tomboleditisikonsul" name="tomboleditisikonsul" style="background-color: #FFFFFF; color: #330066;"></button> -->
																						<button onclick="editisiankonsul('<?php echo $row->id; ?>')"
																							class="btn btn-sm" id="tomboleditisikonsul"
																							name="tomboleditisikonsul"
																							style="background-color: #FFFFFF; color: #330066;"><i
																								class="icon-pencil"
																								style="font-size: 14px;"></i></button>

																						<!-- <a class="text-success edit-task" href="#" data-toggle="modal" data-target="#edittask"><i class="icon-pencil"></i></a> -->
																					<?php
																					}
																					echo '<div style="margin-left: 15px; margin-top: 2px;"><em>' . $row->konsul . '</em></div>';
																					// echo '&nbsp;&nbsp;&nbsp;'.$row->konsul."<br>";
																					if ($row->jawaban != null) {
																						echo '<div style="margin-top: 10px;">' . '<strong style="color: #990000;">' . 'JAWABAN KONSUL : ' . "</strong><br>";
																						echo '<span style="color: red; font-weight:1000;">' . $row->nama_unit_tujuan . '</span>';
																						echo '<span style="color: black; font-weight:1000;">' . ' | ' . '</span>';
																						echo '<span style="color: navi; font-weight:1000;">' . $row->nama_dokter_jawab . '</span><br>';
																						echo '<div style="margin-left: 15px; margin-top: 5px;"><em>' . $row->jawaban . '</em></div><br>';
																					}
																					if (trim($dataPasien->kode_unit) == trim($row->kode_unit_tujuan)) {
																						?>
																						<button onclick="jawabkonsul('<?php echo $row->id; ?>')"
																							class="btn btn-sm mt-2" id="tomboleditRacikan"
																							name="tomboleditRacikan"
																							style="background-color: #330066; color: #FFFFFF;">Jawab</button><br>
																					<?php } ?>
																					<br><br>
																				</td>
																			<tr>
																				<?php
																		}
																	}
																	?>
																</tbody>
															</table>
														</div>
														<!-- </div> -->
													</div>
												</div>
											</div>
											<!-- ======================== -->
										</div>

										<div class="col-md-3 mt-5" id="hasil">
											<div class="form-inline mt-4">
												<label style="font-size: 14px; font-weight: bold; color: black;">+ Diagnosa</label>
												<button onclick="tambahDiag()" class="btn btn-sm btn-secondary ml-auto"
													id="tambahObatBaru" name="tambahObatBaru"
													style="background-color: #FF5733; color: white;">+ Diagnosa</button>
											</div>
											<div class="table-responsive mt-1 table-hover table-scrollable" id="isidiag">
												<table class="table" id="orderdiag" style="background-color: #F0F8FF;">
													<tbody>
														<?php
														if ($dtdiag_hariini == null) {
															?>
															<tr>
																<td class="text-center">
																	Belum Ada Order
																</td>
															</tr>
															<?php
														} else {
															foreach ($dtdiag_hariini as $row) {
																?>
																<tr onclick="bukaFormDiag('<?php echo $row->id; ?>')"
																	style="border-bottom: 1px solid #0099CC;">
																	<td width="2%">
																	</td>
																	<td width="98%">
																		<?php
																		if ($row->type == 1) {
																			echo '<strong style="color: red; font-size: 12px;">' . trim($row->nodaftar) . ' | ' . $row->diagnosa . '</strong><br>';
																		} else {
																			echo '<strong style="color: dark; font-size: 12px;">' . trim($row->nodaftar) . ' | ' . $row->diagnosa . '</strong><br>';
																		}
																		echo $row->type == 1 ? 'Diagnosa Utama' : 'Diagnosa Sekunder';
																		echo ' | ' . trim($row->tgl_masuk) . ' | ' . $row->notransaksi . ' | ';
																		echo "<br>";
																		?>
																	</td>
																</tr>
															<?php
															}
														}
														?>
													</tbody>
												</table>
											</div>
											<br>

											<!-- resep========== -->
											<div class="form-inline mt-3">
												<label style="font-size: 14px; font-weight: bold; color: black;">+ Resep</label>
												<?php if ($editing == 1) { ?>	
													<button onclick="orderResepDPJP()" class="btn btn-sm btn-secondary ml-auto" id="orderResep" name="orderResep" style="background-color: #FF5733; color: white;">+ Order</button>
												<?php } ?>
											</div>

											<div class="table-responsive mt-1 table-hover table-scrollable" id="isiresep">
												<table class="table" id="orderresep" style="background-color: #F0F8FF;">
													<tbody>
													<?php
														if ($dtresepheader_hariini == NULL) {
													?>
														<tr>
															<td colspan="100%" class="text-center">
																Belum Ada Data Resep
															</td>
														</tr>
														<?php } else {
															foreach ($dtresepheader_hariini as $row) {
																$noresep=$row->noresep;
														?>		
																<tr>
																	<td colspan="2">
																		<?php
																		echo '<br>';	
																		?>
																		<div class="form-inline">
																			<?php
																			echo '<strong style="color: navy; font-size: 14px; height: 20px; display: inline-block; line-height: 20px; margin-left: 5px;">'. tanggaldua($row->tglresep).' | '.$row->noresep.'</strong><br>';
																			?>
																			<button onclick="tambahObat('<?php echo $row->noresep; ?>')" class="btn btn-sm btn-secondary ml-auto" data-toggle="tooltip" title="Tambah Obat" id="tambahObatBaru" name="tambahObatBaru" style="background-color: #E9F713; color: black;" >+ O</button>
																			<button onclick="tambahRacik('<?php echo $row->noresep; ?>')" class="btn btn-sm btn-secondary ml-1" data-toggle="tooltip" title="Tambah Obat Racikan" id="tombolLain" name="tombolLain" style="background-color: #49F1F5; color: black;" >+ R</button>
																			<button onclick="hapusresepheader('<?php echo $row->noresep; ?>')" class="btn btn-sm btn-secondary ml-1" data-toggle="tooltip" title="Hapus Resep" id="tombolHapus" name="tombolHapus" style="background-color: #E1948C; color: black;" >X</button>

																		</div>
																		<?php
																		echo '<strong style="color: black;font-size: 14px; margin-left: 5px;">'.$row->nama_dokter.'</strong>';
																		?>
																	<td>	
																</tr>		
																<?php
																	$this->db->from("resep_detail");
																	$this->db->where("resep_detail.noresep", $noresep);
																	$this->db->order_by("resep_detail.idnoresep", 'ASC');
																	$query = $this->db->get();
																	$data = $query->result_array();
																	foreach ($data as $row) {
																?>	
																<?php if ($editing == 1) { ?>
																<tr onclick="bukaFormObat_ranap('<?php echo $row['idnoresep']; ?>')" style="border-bottom: 1px solid #0099CC;">
															<?php } else { ?>	
																<tr style="border-bottom: 1px solid #0099CC;">
															<?php }?>	
																	<td width="10%" style="text-align: center; vertical-align: top">
																		<?php echo '*'; ?>
																	</td>
																	<td width="90%">
																		<?php
																		echo '<strong style="color: red; font-size: 12px;">' . $row['namaobat'].'</strong>'.'| '.$row['qty'].' '.$row['satuanpakai'].'<br>';
																		echo 'Aturan Pakai : ';
																		if ($row['pagi'] != '') {
																			echo "Pagi : ".$row['pagi'];
																		}
																		if ($row['siang'] != '') {
																			echo " Siang : ".$row['siang'];
																		}
																		if ($row['malam'] != '') {
																			echo " Malam : ".$row['malam'];
																		}
																		if ($row['keterangan'] != '') {
																			echo " === ".$row['keterangan'];
																		}
																		if ($row['caramakan'] != '') {
																			echo " ".$row['caramakan'].' Makan';
																		}
																		if ($row['catatanracikan'] != ''  || $row['catatanracikan'] != NULL ) {
																			$text_with_br = nl2br($row['catatanracikan']);
																		?>	
																			<p style="color: #A20498; margin-left: 20px;">
																		<?php 
																			echo $text_with_br;
																		}		
																		?>
																		</p>
																	<td>	
																</tr>
																<?php		
																}
																?>
																<tr>
																<td colspan="2">
																<button onclick="kirimapotik('<?php echo $noresep; ?>')" class="btn btn-sm btn-secondary ml-3" id="kirimapotik" name="kirimapotik" style="background-color: #066F42; color: white;">Kirim Resep ke Apotik</button>
																</td>
																<tr>
																	<td colspan="2">
																	<br>
																	</td>
																</tr>
															</tr>
														<?php
															}
														}
														?>
													</tbody>
												</table>
											</div>
											<!-- ==== ORDER LABORATORIUM ==== -->
											<div class="form-inline mt-3">
												<label style="font-size: 14px; font-weight: bold; color: black; margin-top:20px">+ Order Laboratorium</label>
												<!-- <span class="text-primary font-weight-bold">+ Order Laboratorium</span><br> -->
												<?php if ($editing == 1) { ?>	
													<button onclick="orderLabDPJP()" class="btn btn-sm btn-danger ml-auto" id="orderResep" name="orderResep" >+ Order Lab</button>
												<?php } ?>
											</div>
											<div class="table-responsive table-hover table-scrollable" id="isilab">
												<table class="table" id="orderlab" style="background-color: #F2F9E7;">
													<tbody>
													<?php	
													if ($dtlabheader_hariini == null) {
													?>
														<tr>
															<td class="text-center">
																Belum Ada Order
															</td>
														</tr>
													<?php
														} else {	
															foreach($dtlabheader_hariini as $row) {
														?>			
																<tr>
																	<td colspan="2">
																		<div class="form-inline">
																			<?php
																			if ($row->pilihunitlab == '1') {
																				$pilihlab='Lab.Klinik';
																			} elseif ($row->pilihunitlab == '2') {
																				$pilihlab='Lab.Anatomi';
																			} else if ($row->pilihunitlab == '3') {
																				$pilihlab='Lab.Mikrobiolgi';
																			} else {
																				$pilihlab='---';
																			}
																			echo '<strong style="color: navy; font-size: 12px; height: 20px; display: inline-block; line-height: 20px; margin-left: 5px;">'. tanggaldua($row->tanggal).' | '.$row->notransaksi_IN.' | '.$pilihlab.'</strong><br>';
																			?>
																			<button onclick="tambahlab('<?php echo $row->notransaksi_IN.'_'.$row->pilihunitlab; ?>')" class="btn btn-sm btn-secondary ml-auto"  id="tambahLabBaru" name="tambahLabBaru" style="background-color: #E9F713; color: black;" >+ P</button>

																			<button onclick="EditHeaderLab('<?php echo $row->notransaksi_IN; ?>')" class="btn btn-sm btn-secondary ml-1" id="tombolHapusOrderLab" name="tombolHapusOrderLab" style="background-color: #0AF6F6; color: black;" >E</button>

																			<button onclick="hapusHeaderLab('<?php echo $row->notransaksi_IN; ?>')" class="btn btn-sm btn-secondary ml-1" id="tombolHapusOrderLab" name="tombolHapusOrderLab" style="background-color: #E1948C; color: black;" >X</button>

																		</div>
																		<?php
																		echo '<strong style="color: black;font-size: 14px; margin-left: 5px;">'.$row->nama_dokter.'</strong>'.'<br>';
																		?>
																		<?php
																		echo '<strong style="color: black;font-size: 12px; margin-left: 5px;">'.'Diagnosa :'.$row->diagnosa.'</strong>'.'<br>';
																		echo '<strong style="color: black;font-size: 12px; margin-left: 5px;">'.'Pemeriksaan : </strong>';
																		?>
																	<td>	
																</tr>											
														<?php 	
															$vIN= $row->notransaksi_IN;
															$this->db->select("mtindakan.tindakan as namatindakan, ptindakan_instalasi.id as idnya");
															$this->db->from("ptindakan_instalasi");
															$this->db->join("mtindakan", "mtindakan.kode_tindakan = ptindakan_instalasi.tindakan");
															$this->db->where("ptindakan_instalasi.notransaksi_IN", $vIN);
															$this->db->order_by("ptindakan_instalasi.id", 'ASC');
															$query2= $this->db->get();
															$data2 = $query2->result_array();
															$ada=0;
															foreach ($data2 as $row2) {
																$ada=1;
														?>
																<tr onclick="bukaFormLab('<?php echo $row2['idnya']; ?>','<?php echo $vIN; ?>')">
																	<td width="10%" style="text-align: center;">
																		<?php echo '*'; ?>
																	</td>
																	<td width="90%">
																		<?php
																		// echo '<style="color: red; font-size: 12px;">' . $row2['namatindakan'];
																		echo '<span style="color: #D72006; font-size: 12px;">' . $row2['namatindakan'] . '</span>';
																		?>
																	<td>	
																</tr>

													<?php		
															}
															if ($row->cekitemorder == 1) {	
																
													?>		
															<tr>
																<td colspan="2">
																<button onclick="kirimlab('<?php echo $row->notransaksi_IN; ?>')" class="btn btn-sm btn-secondary ml-3" id="kirimlab" name="kirimlab" style="background-color: #066F42; color: white;">Kirim Order ke Laboratorium</button>
																</td>
															</tr>
													<?php } ?>		
															<tr style="border-bottom: 3px solid #C9CDCD;">
																<td colspan="4">
																	<!-- <div style="border-bottom: 10px solid white;"></div> -->
																</td>
															</tr>
													<?php		

														}	
													}
													?>
													</tbody>
												</table>
											</div>
											<!-- =======ORDER RADIOLOGI====== -->
											<div class="form-inline mt-3">
												<label style="font-size: 14px; font-weight: bold; color: lackk; margin-top: 20px">+ Order Radiologi</label><br>
												<?php if ($editing == 1) { ?>	
													<button onclick="orderRadDPJP()" class="btn btn-sm btn-danger ml-auto" id="orderResep" name="orderResep" >+ Order Rad</button>
												<?php } ?>
											</div>
											<div class="table-responsive table-hover table-scrollable" id="isirad">
												<table class="table" id="orderrad" style="background-color: #F0F8FF;">
												<tbody>
													<?php	
													if ($dtradheader_hariini == null) {
													?>
														<tr>
															<td class="text-center">
																Belum Ada Order
															</td>
														</tr>
													<?php
														} else {	
															foreach($dtradheader_hariini as $row) {
														?>			
																<tr>
																	<td colspan="2">
																		<div class="form-inline">
																			<?php
																			echo '<strong style="color: navy; font-size: 12px; height: 20px; display: inline-block; line-height: 20px; margin-left: 5px;">'. tanggaldua($row->tanggal).' | '.$row->notransaksi_IN.'</strong><br>';
																			?>
																			<button onclick="tambahrad('<?php echo $row->notransaksi_IN.'_'.$row->pilihunitlab; ?>')" class="btn btn-sm btn-secondary ml-auto"  id="tambahRadBaru" name="tambahRadBaru" style="background-color: #E9F713; color: black;" >+ P</button>

																			<button onclick="EditHeaderRad('<?php echo $row->notransaksi_IN; ?>')" class="btn btn-sm btn-secondary ml-1" id="tombolHapusOrderLab" name="tombolHapusOrderLab" style="background-color: #0AF6F6; color: black;" >E</button>

																			<button onclick="hapusHeaderRad('<?php echo $row->notransaksi_IN; ?>')" class="btn btn-sm btn-secondary ml-1" id="tombolHapusOrderLab" name="tombolHapusOrderLab" style="background-color: #E1948C; color: black;" >X</button>

																		</div>
																		<?php
																		echo '<strong style="color: black;font-size: 14px; margin-left: 5px;">'.$row->nama_dokter.'</strong>'.'<br>';
																		?>
																		<?php
																		echo '<strong style="color: black;font-size: 12px; margin-left: 5px;">'.'Diagnosa :'.$row->diagnosa.'</strong>'.'<br>';
																		echo '<strong style="color: black;font-size: 12px; margin-left: 5px;">'.'Pemeriksaan : </strong>';
																		?>
																	<td>	
																</tr>											
														<?php 	
															$vIN= $row->notransaksi_IN;
															$this->db->select("mtindakan.tindakan as namatindakan, ptindakan_instalasi.id as idnya");
															$this->db->from("ptindakan_instalasi");
															$this->db->join("mtindakan", "mtindakan.kode_tindakan = ptindakan_instalasi.tindakan");
															$this->db->where("ptindakan_instalasi.notransaksi_IN", $vIN);
															$this->db->order_by("ptindakan_instalasi.id", 'ASC');
															$query2= $this->db->get();
															$data2 = $query2->result_array();
															$ada=0;
															foreach ($data2 as $row2) {
																$ada=1;
														?>
																<tr onclick="bukaFormRad('<?php echo $row2['idnya']; ?>','<?php echo $vIN; ?>')">
																	<td width="10%" style="text-align: center;">
																		<?php echo '*'; ?>
																	</td>
																	<td width="90%">
																		<?php
																		// echo '<style="color: red; font-size: 12px;">' . $row2['namatindakan'];
																		echo '<span style="color: #D72006; font-size: 12px;">' . $row2['namatindakan'] . '</span>';
																		?>
																	<td>	
																</tr>

													<?php		
															}
															if ($row->cekitemorder == 1) {	
																
													?>		
															<tr>
																<td colspan="2">
																<button onclick="kirimrad('<?php echo $row->notransaksi_IN; ?>')" class="btn btn-sm btn-secondary ml-3" id="kirimrad" name="kirimrad" style="background-color: #034A82; color: white;">Kirim Order ke Radiologi</button>
																</td>
															</tr>
													<?php } ?>		
															<tr style="border-bottom: 3px solid #C9CDCD;">
																<td colspan="4">
																	<!-- <div style="border-bottom: 10px solid white;"></div> -->
																</td>
															</tr>
													<?php		

														}	
													}
													?>
													</tbody>
												</table>
											</div><br>
										</div>

										<div class="col-md-3 mt-4" id="order">
											<div id="accordion47" class="accordion-alt" role="tablist"
												style="background-color: #FFFFFF;">
												<div class="mb-2">
													<h6 class="mb-0">
														<a class="d-block border" data-toggle="collapse" href="#collapse47"
															aria-expanded="true" aria-controls="collapse47" style="color: black;">
															Hasil Pemeriksaan
														</a>
													</h6>

													<label style="font-size: 14px; font-weight: bold; color: black; margin-top:20px">+
														LABORATORIUM</label>
													<div class="table-responsive mt-2 table-hover table-scrollable" id="isihasillab"
														style="max-height: 350px; overflow-y: auto;">
														<div class="table-responsive table-hover table-scrollable" id="isilab">
															<table class="table" id="historylab" style="background-color: #EDF7C4;">
																<tbody>
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
																</tbody>
															</table>
														</div>
													</div>

													<label style="font-size: 14px; font-weight: bold; color: black; margin-top:20px">+
														RADIOLOGI</label>
													<div class="table-responsive mt-1 table-hover table-scrollable" id="isihasillab"
														style="max-height: 350px; overflow-y: auto;">
														<div class="table-responsive table-hover table-scrollable" id="isilab">
															<table class="table" id="historyrad" style="background-color: #D3F9D4;">
																<tbody>
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
																</tbody>
															</table>
														</div>
													</div>
												</div>
											</div>
											<!-- =========== master data ========= -->
											<div id="accordion471" class="accordion-alt" role="tablist"
												style="background-color: #FFFFFF;">
												<div class="mt-4">
													<h6 class="mb-0">
														<a class="d-block border" data-toggle="collapse" href="#collapse471"
															aria-expanded="true" aria-controls="collapse471" style="color: black;">
															Data
														</a>
													</h6>
													<div id="collapse471" class="collapse" role="tabpanel" data-parent="#accordion471">
														<div class="table-responsive mt-2 table-hover table-scrollable"
															id="isidatarambahan">

															<div class="form-inline mt-4">
																<label style="font-size: 14px; font-weight: bold; color: black;">+
																	Master Data Obat Racikan</label>

																<button onclick="tambahMasterRacik()"
																	class="btn btn-sm btn-secondary ml-auto" id="tombolMasterRacikan"
																	name="tombolMasterRacikan"
																	style="background-color: #009933; color: white;">+ Tambah</button>
																<button onclick="refreshTabelMasterRacik()" class="btn btn-sm ml-1"
																	id="tombolMasterRacikan" name="tombolMasterRacikan"
																	style="background-color: #D3D3D3; color: #00008B;"><i
																		class="fas fa-angle-double-down"></i></button>
															</div>
															<div class="table-responsive mt-2 table-hover table-scrollable"
																id="isimasterracik" style="max-height: 300px; overflow-y: auto;">

																<table class="table" id="datamasterracik"
																	style="background-color: #F0F8FF;">
																	<tbody>
																		<?php
																		if ($dtmasterracikdokter == null) {
																			?>
																			<tr>
																				<td class="text-center">
																					Belum Ada Order
																				</td>
																			</tr>
																			<?php
																		} else {
																			$koderaciktampil = '';
																			foreach ($dtmasterracikdokter as $row) {
																				if ($koderaciktampil != $row->kodeobatracikan) {
																					?>
																					<tr>
																						<td colspan="2">
																							<?php
																							echo '<span style="margin-left: 2ch;"></span> <strong style="color: red;font-size: 12px;">' . '> ' . strtoupper($row->nama_racikan) . '</strong>';
																							?>
																							<button
																								onclick="editDataRacik('<?php echo $row->kodeobatracikan; ?>')"
																								class="btn btn-sm ml-1" id="tomboleditRacikan"
																								name="tomboleditRacikan"
																								style="background-color: #330066; color: #FFFFFF;"><i
																									class="far fa-edit"></i></button><br>

																						<td>
																					</tr>
																					<?php
																					$koderaciktampil = $row->kodeobatracikan;
																				}
																				?>
																				<tr onclick="bukaFormRacik('<?php echo $row->idheader; ?>')">
																					<td width="10%">
																					</td>
																					<td width="90%">
																						<?php
																						echo '<strong style="color: #000066; font-size: 12px;">' . trim($row->nama_obat) . '</strong>' . '<br>';
																						echo 'Qty : ' . $row->qty . ' ' . $row->satuan . '<br>';
																						?>
																					</td>
																				</tr>
																			<?php
																			}
																		}
																		?>
																	</tbody>
																</table>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>

									</div>
								</div>
								<br>
								<br>
								<br>
							</div>
							<!-- ========== end of halaman utama ======== -->
						</div>  
						<div class="tab-pane fade" id="awalmedis" role="tabpanel2" aria-labelledby="subtabawalmedis">
							<!-- assesmen awal medis -->
						</div>

						<div class="tab-pane fade" id="fisio" role="tabpanel2" aria-labelledby="subtabfisio">
							<!-- fisio -->
						</div>

						<div class="tab-pane fade" id="resumemedis" role="tabpanel2" aria-labelledby="subtabresumemedis">
							<!-- tampilkan resume medis disini -->
						</div>

						<div class="tab-pane fade" id="uploadfile" role="tabpanel2" aria-labelledby="subuploadfile">
							<!-- =========on progress========== -->
						</div>

					</div>
				</nav>	
			</div>	
		</div>
	</div>

<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>		 -->
<!-- <script src="../assets/jquery_web/jquery-3.6.4.min.js"></script> -->
<script src="<?php echo base_url();?>/assets/jquery_web/jquery-3.6.4.min.js"></script>





	<script>

		var activeCollapse = null; // Untuk melacak collapse yang sedang aktif

		// Fungsi untuk menampilkan atau menyembunyikan collapse
		function toggleCollapse(collapseId) {
			if (activeCollapse === collapseId) {
				// Jika collapse yang sama diklik lagi, sembunyikan collapse tersebut
				$('#' + collapseId).collapse('hide');
				activeCollapse = null;
			} else {
				// Sembunyikan collapse yang sedang aktif (jika ada)
				if (activeCollapse !== null) {
					$('#' + activeCollapse).collapse('hide');
				}
				// Tampilkan collapse yang diklik
				$('#' + collapseId).collapse('show');
				activeCollapse = collapseId;
			}
		}

		function kembaliKeRmeNew() {
			// var url = "<?php echo site_url(); ?>/rme/rme_new";
			var url = "<?php echo site_url(); ?>/rme/rme_new?tabnav=<?php echo $angkatab; ?>";
			window.location.href = url;
		}



		function openSoapForm(id, kodeDokter) {
			var no_rm = document.getElementById("no_rm").value;
			var kode_dokter = document.getElementById("kode_dokter").value;
			if (kode_dokter == kodeDokter) {
				$.ajax({
					url: "<?php echo site_url(); ?>/rme/panggilSoapDokter",
					type: "GET",
					data: {
						id: id,
						kode_dokter: kode_dokter,
						no_rm: no_rm
					},
					success: function (ajaxData) {
						// console.log(ajaxData);
						$("#formmodal").html(ajaxData);
						$("#formmodal").modal('show', {
							backdrop: 'true'
						});
						modaldetailtutup();
					},
					error: function (ajaxData) {
						$.notify("Gagal Memproses Data", "error");
					}
				});
			} else {
				swal({
					// title: "opps",
					text: "Tidak bisa melakukan perubahan SOAP \n dari dokter lain",
					icon: "error",
					button: true
				});
			}
		}


		function bukaFormResep(id) {
			var no_rm = document.getElementById("no_rm").value;
			var kode_dokter = document.getElementById("kode_dokter").value;
			$.ajax({
				url: "<?php echo site_url(); ?>/rme/pilihObatId",
				type: "GET",
				data: {
					id: id,
					no_rm: no_rm,
					kode_dokter: kode_dokter
				},
				success: function (ajaxData) {
					console.log(ajaxData);
					var array_data = JSON.parse(ajaxData);
					console.log(array_data);
				},
				error: function (ajaxData) {
					$.notify("Gagal Memproses Data", "error");
				}
			});

		}

	function addResep(id,kode_obat) {
	var no_rm = document.getElementById("no_rm").value;
	var kode_dokter = document.getElementById("kode_dokter").value;
	var nama_dokter = document.getElementById("nama_dokter").value;
	var notransaksi = document.getElementById("notransaksi").value;
	var kode_unit = document.getElementById("kode_unit").value;

	if (kode_dokter != 'XXXXXX') {
		console.log(no_rm);
		console.log(kode_dokter);
		console.log(notransaksi);
		$.ajax({
				url: "<?php echo site_url(); ?>/rme/pilihObatId_ranap",
				type: "GET",
				data: {
					id: id,
					kode_obat : kode_obat,
					no_rm : no_rm,
					kode_dokter : kode_dokter,
					nama_dokter : nama_dokter,
					notransaksi : notransaksi,
					kode_unit : kode_unit
				},
				success: function(ajaxData) {
					console.log(ajaxData);
					var dt = JSON.parse(ajaxData);
					$("#orderresep tbody tr").remove();
					$("#orderresep tbody").append(dt.dtview);
					$.ajax({
                        url: "<?php echo site_url(); ?>/rme/refreshhistoryresep",
                        method: 'GET', // Atau POST sesuai dengan pengaturan server Anda
                        data: {
                                no_rm: no_rm
                            },
                        success: function(ajaxData2) {
                            console.log('masuk refresh tabel history resep');
                            console.log(ajaxData2);
                            var dt = JSON.parse(ajaxData2);
                            $("#tabelresep tbody tr").remove();
                            $("#tabelresep tbody").append(dt.dtview);
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
				},
				error: function(ajaxData) {
					$.notify("Gagal Memproses Data", "error");
				}
			});
	} else {
		// swal('Order Resep dari History hanya untuk User Dokter')
		swal({
			text: "Order Resep dari History hanya untuk User Dokter",
			icon: "error",
			button: true
		});
	}
}

		function modaldetailtutup() {
			$("#detailmodal").remove();
		}

		function bukaFormObat(id) {
			$.ajax({
				url: "<?php echo site_url(); ?>/rme/panggilFormObat",
				type: "GET",
				data: {
					id: id,
				},
				success: function (ajaxData) {
					$("#formmodal").html(ajaxData);
					$("#formmodal").modal('show', {
						backdrop: 'true'
					});
					modaldetailtutup();
				},
				error: function (ajaxData) {
					$.notify("Gagal Memproses Data", "error");
				}
			});

		}

		function bukaFormObat_ranap(id) {
    $.ajax({
			url: "<?php echo site_url(); ?>/rme/panggilFormObat_ranap",
			type: "GET",
			data: {
				id: id,
			},
			success: function(ajaxData) {
				$("#formmodal").html(ajaxData);
                    $("#formmodal").modal('show', {
                        backdrop: 'true'
                    });
                    modaldetailtutup();
			},
			error: function(ajaxData) {
				$.notify("Gagal Memproses Data", "error");
			}
		});

}

function tambahObat(noresep) {
	var notransaksi = document.getElementById("notransaksi").value;
	console.log(noresep);
    $.ajax({
			url: "<?php echo site_url(); ?>/rme/tambahOrderObat_ranap",
			type: "GET",
			data: {
				noresep: noresep
			},
			success: function(ajaxData) {
				$("#formmodal").html(ajaxData);
                    $("#formmodal").modal('show', {
                        backdrop: 'true'
                    });
                    modaldetailtutup();
			},
			error: function(ajaxData) {
				$.notify("Gagal Memproses Data", "error");
			}
		});

}

function tambahRacik(noresep) {
	var kode_dokter = document.getElementById("kode_dokter").value;
	// alert(kode_dokter);
    $.ajax({
			url: "<?php echo site_url(); ?>/rme/tambahOrderRacikan_ranap",
			type: "GET",
			data: {
				noresep: noresep
			},
			success: function(ajaxData) {
				$("#formmodal").html(ajaxData);
                    $("#formmodal").modal('show', {
                        backdrop: 'true'
                    });
                    modaldetailtutup();
			},
			error: function(ajaxData) {
				$.notify("Gagal Memproses Data", "error");
			}
		});

}

function hapusresepheader(noresep) {
	$.confirm({
		title: "Hapus Data",
		content: "Yakin mengahapus data Resep" + noresep + "?",
		buttons: {
			batal: {
				text: "Batal",
				btnClass: "btn-red",
				action: function () {},
			},
			hapus: {
				text: "Hapus",
				btnClass: "btn-blue",
				keys: ["enter"],
				action: function () {
				var no_rm = document.getElementById("no_rm").value;
				var kode_dokter = document.getElementById("kode_dokter").value;
				var nama_dokter = document.getElementById("nama_dokter").value;
				var notransaksi = document.getElementById("notransaksi").value;
				var kode_unit = document.getElementById("kode_unit").value;

				// alert(kode_dokter);
				$.ajax({
						url: "<?php echo site_url(); ?>/rme/hapusResep_ranap",
						type: "GET",
						data: {
							no_rm : no_rm,
							kode_dokter : kode_dokter,
							nama_dokter : nama_dokter,
							notransaksi : notransaksi,
							kode_unit : kode_unit,
							noresep: noresep
						},
						success: function(ajaxData) {
							console.log(ajaxData);
								var dt = JSON.parse(ajaxData);
								$("#orderresep tbody tr").remove();
								$("#orderresep tbody").append(dt.dtview);
						},
						error: function(ajaxData) {
							$.notify("Gagal Memproses Data", "error");
						}
					});
				}		
			}
		}	
	})
}


function kirimapotik(noresep) {
	$.confirm({
		title: "Kirim Data",
		content: "Resep " + noresep + " di kirim ke apotik ?",
		buttons: {
			batal: {
				text: "Batal",
				btnClass: "btn-red",
				action: function () {},
			},
			kirim: {
				text: "Kirim",
				btnClass: "btn-blue",
				keys: ["enter"],
				action: function () {
				var no_rm = document.getElementById("no_rm").value;
				var kode_dokter = document.getElementById("kode_dokter").value;
				var nama_dokter = document.getElementById("nama_dokter").value;
				var notransaksi = document.getElementById("notransaksi").value;
				var kode_unit = document.getElementById("kode_unit").value;

				// alert(kode_dokter);
				$.ajax({
						url: "<?php echo site_url(); ?>/rme/kirimresepkeapotik",
						type: "GET",
						data: {
							no_rm : no_rm,
							kode_dokter : kode_dokter,
							nama_dokter : nama_dokter,
							notransaksi : notransaksi,
							kode_unit : kode_unit,
							noresep: noresep,
							inapjalanigd : 'JALAN'
						},
						success: function(ajaxData) {
							console.log(ajaxData);
								var dt = JSON.parse(ajaxData);
								$("#orderresep tbody tr").remove();
								$("#orderresep tbody").append(dt.dtview);
						},
						error: function(ajaxData) {
							$.notify("Gagal Memproses Data", "error");
						}
					});
				}		
			}
		}	
	})
}

function orderResepDPJP() {
	var no_rm = document.getElementById("no_rm").value;
	var kode_dokter = document.getElementById("kode_dokter").value;
	var notransaksi = document.getElementById("notransaksi").value;
	var kode_unit = document.getElementById("kode_unit").value;
	var nama_unit = document.getElementById("nama_unit").value;
	console.log(nama_unit);
    $.ajax({
			url: "<?php echo site_url(); ?>/rme/tambahOrderObatHeader",
			type: "GET",
			data: {
				no_rm : no_rm,
				kode_dokter : kode_dokter,
				notransaksi : notransaksi,
				kode_unit : kode_unit
			},
			success: function(ajaxData) {
				$("#formmodal").html(ajaxData);
                    $("#formmodal").modal('show', {
                        backdrop: 'true'
                    });
                    modaldetailtutup();
			},
			error: function(ajaxData) {
				$.notify("Gagal Memproses Data", "error");
			}
		});

}

		function tambahDiag(id) {
			$.ajax({
				url: "<?php echo site_url(); ?>/rme/tambahOrderDiag",
				type: "GET",
				data: {
					id: id,
				},
				success: function (ajaxData) {
					$("#formmodal").html(ajaxData);
					$("#formmodal").modal('show', {
						backdrop: 'true'
					});
					modaldetailtutup();
				},
				error: function (ajaxData) {
					$.notify("Gagal Memproses Data", "error");
				}
			});

		}

		function openAssesmenForm(id) {
			var no_rm = document.getElementById("no_rm").value;
			$.ajax({
				url: "<?php echo site_url(); ?>/rme/panggilAssesmen",
				type: "GET",
				data: {
					id: id,
					no_rm: no_rm
				},
				success: function (ajaxData) {
					// console.log(ajaxData);
					$("#formmodal").html(ajaxData);
					$("#formmodal").modal('show', {
						backdrop: 'true'
					});
					modaldetailtutup();
				},
				error: function (ajaxData) {
					$.notify("Gagal Memproses Data", "error");
				}
			});

		}

		function addLab(id) {
			var no_rm = document.getElementById("no_rm").value;
			var kode_dokter = document.getElementById("kode_dokter").value;
			var nama_dokter = document.getElementById("nama_dokter").value;
			var notransaksi = document.getElementById("notransaksi").value;
			var kode_unit = document.getElementById("kode_unit").value;
			var nama_unit = document.getElementById("nama_unit").value;
			var golongan = document.getElementById("kode_unit").value;
			var tgl_masuk = document.getElementById("tgl_masuk").value;
			// alert(id);
			$.ajax({
				url: "<?php echo site_url(); ?>/rme/pilihLabId",
				type: "GET",
				data: {
					id: id,
					no_rm: no_rm,
					kode_dokter: kode_dokter,
					nama_dokter: nama_dokter,
					notransaksi: notransaksi,
					kode_unit: kode_unit,
					nama_unit: nama_unit,
					golongan: golongan,
					tgl_masuk: tgl_masuk
				},
				success: function (ajaxData) {
					console.log(ajaxData);
					var dt = JSON.parse(ajaxData);
					$("#orderlab tbody tr").remove();
					$("#orderlab tbody").append(dt.dtview);
					// ------ refresh display lab -------
					$.ajax({
						url: "<?php echo site_url(); ?>/rme/refreshFileLab",
						type: "GET",
						data: {
							id: id,
							no_rm: no_rm,
						},
						success: function (ajaxData) {
							console.log(ajaxData);
							var dt = JSON.parse(ajaxData);
							$("#historylab tbody tr").remove();
							$("#historylab tbody").append(dt.dtview);
							
						},
						error: function (ajaxData) {
							$.notify("Gagal Memproses Data", "error");
						}
					});
				},
				error: function (ajaxData) {
					$.notify("Gagal Memproses Data", "error");
				}
			});
		}


		function bukaFormLab(id) {
			$.ajax({
				url: "<?php echo site_url(); ?>/rme/panggilFormLabRme",
				type: "GET",
				data: {
					id: id,
				},
				success: function (ajaxData) {
					$("#formmodal").html(ajaxData);
					$("#formmodal").modal('show', {
						backdrop: 'true'
					});
					modaldetailtutup();
				},
				error: function (ajaxData) {
					$.notify("Gagal Memproses Data", "error");
				}
			});

		}


		function addRad(id) {
			var no_rm = document.getElementById("no_rm").value;
			var kode_dokter = document.getElementById("kode_dokter").value;
			var nama_dokter = document.getElementById("nama_dokter").value;
			var notransaksi = document.getElementById("notransaksi").value;
			var kode_unit = document.getElementById("kode_unit").value;
			var nama_unit = document.getElementById("nama_unit").value;
			var golongan = document.getElementById("kode_unit").value;
			var tgl_masuk = document.getElementById("tgl_masuk").value;
			// alert(id);
			$.ajax({
				url: "<?php echo site_url(); ?>/rme/pilihRadId",
				type: "GET",
				data: {
					id: id,
					no_rm: no_rm,
					kode_dokter: kode_dokter,
					nama_dokter: nama_dokter,
					notransaksi: notransaksi,
					kode_unit: kode_unit,
					nama_unit: nama_unit,
					golongan: golongan,
					tgl_masuk: tgl_masuk
				},
				success: function (ajaxData) {
					console.log(ajaxData);
					var dt = JSON.parse(ajaxData);
					$("#orderrad tbody tr").remove();
					$("#orderrad tbody").append(dt.dtview);
					// ------ refresh display lab -------
					$.ajax({
						url: "<?php echo site_url(); ?>/rme/refreshFileRad",
						type: "GET",
						data: {
							id: id,
							no_rm: no_rm,
						},
						success: function (ajaxData) {
							console.log(ajaxData);
							var dt = JSON.parse(ajaxData);
							$("#historyrad tbody tr").remove();
							$("#historyrad tbody").append(dt.dtview);
							
						},
						error: function (ajaxData) {
							$.notify("Gagal Memproses Data", "error");
						}
					});
				},
				error: function (ajaxData) {
					$.notify("Gagal Memproses Data", "error");
				}
			});
		}


		function bukaFormRad(id) {
			$.ajax({
				url: "<?php echo site_url(); ?>/rme/panggilFormRadRme",
				type: "GET",
				data: {
					id: id,
				},
				success: function (ajaxData) {
					$("#formmodal").html(ajaxData);
					$("#formmodal").modal('show', {
						backdrop: 'true'
					});
					modaldetailtutup();
				},
				error: function (ajaxData) {
					$.notify("Gagal Memproses Data", "error");
				}
			});

		}

		function addDiag(id) {
			var no_rm = document.getElementById("no_rm").value;
			var kode_dokter = document.getElementById("kode_dokter").value;
			var nama_dokter = document.getElementById("nama_dokter").value;
			var notransaksi = document.getElementById("notransaksi").value;
			var kode_unit = document.getElementById("kode_unit").value;
			var nama_unit = document.getElementById("nama_unit").value;
			var golongan = document.getElementById("kode_unit").value;
			var tgl_masuk = document.getElementById("tgl_masuk").value;
			// alert(id);
			$.ajax({
				url: "<?php echo site_url(); ?>/rme/pilihDiagId",
				type: "GET",
				data: {
					id: id,
					no_rm: no_rm,
					kode_dokter: kode_dokter,
					nama_dokter: nama_dokter,
					notransaksi: notransaksi,
					kode_unit: kode_unit,
					nama_unit: nama_unit,
					golongan: golongan,
					tgl_masuk: tgl_masuk
				},
				success: function (ajaxData) {
					console.log(ajaxData);
					var dt = JSON.parse(ajaxData);
					$("#orderdiag tbody tr").remove();
					$("#orderdiag tbody").append(dt.dtview);
				},
				error: function (ajaxData) {
					$.notify("Gagal Memproses Data", "error");
				}
			});
		}

		function bukaFormDiag(id) {
			$.ajax({
				url: "<?php echo site_url(); ?>/rme/panggilFormDiagRme",
				type: "GET",
				data: {
					id: id,
				},
				success: function (ajaxData) {
					$("#formmodal").html(ajaxData);
					$("#formmodal").modal('show', {
						backdrop: 'true'
					});
					modaldetailtutup();
				},
				error: function (ajaxData) {
					$.notify("Gagal Memproses Data", "error");
				}
			});

		}

		function tambahMasterRacik() {
			var kode_dokter = document.getElementById("kode_dokter").value;
			$.ajax({
				url: "<?php echo site_url(); ?>/rme/tambahMasterRacikan",
				type: "GET",
				data: {
					kode_dokter: kode_dokter
				},
				success: function (ajaxData) {
					$("#formmodal").html(ajaxData);
					$("#formmodal").modal('show', {
						backdrop: 'true'
					});
					modaldetailtutup();
				},
				error: function (ajaxData) {
					$.notify("Gagal Memproses Data", "error");
				}
			});

		}

		function refreshTabelMasterRacik() {
			var kode_dokter = document.getElementById("kode_dokter").value;
			$.ajax({
				url: "<?php echo site_url(); ?>/rme/panggilMasterRacikDokter",
				type: "GET",
				data: {
					kode_dokter: kode_dokter
				},
				success: function (ajaxData) {
					console.log(ajaxData);
					var dt = JSON.parse(ajaxData);
					$("#datamasterracik tbody tr").remove();
					$("#datamasterracik tbody").append(dt.dtview);
				},
				error: function (ajaxData) {
					$.notify("Gagal Memproses Data", "error");
				}
			});

		}


		function editDataRacik(kode_racikan) {
			var kode_dokter = document.getElementById("kode_dokter").value;
			$.ajax({
				url: "<?php echo site_url(); ?>/rme/editMasterRacikan",
				type: "GET",
				data: {
					kode_dokter: kode_dokter,
					kode_racikan: kode_racikan
				},
				success: function (ajaxData) {
					$("#formmodal").html(ajaxData);
					$("#formmodal").modal('show', {
						backdrop: 'true'
					});
					modaldetailtutup();
				},
				error: function (ajaxData) {
					$.notify("Gagal Memproses Data", "error");
				}
			});

		}


		function tambahKonsul() {
			var no_rm = document.getElementById("no_rm").value;
			var kode_dokter = document.getElementById("kode_dokter").value;
			var nama_dokter = document.getElementById("nama_dokter").value;
			var notransaksi = document.getElementById("notransaksi").value;
			var kode_unit = document.getElementById("kode_unit").value;
			var nama_unit = document.getElementById("nama_unit").value;
			var golongan = document.getElementById("kode_unit").value;
			var tanggal = document.getElementById("tgl_masuk").value;
			$.ajax({
				url: "<?php echo site_url(); ?>/rme/FormTambahKonsul",
				type: "GET",
				data: {
					no_rm: no_rm,
					kode_dokter: kode_dokter,
					nama_dokter: nama_dokter,
					notransaksi: notransaksi,
					kode_unit: kode_unit,
					nama_unit: nama_unit,
					golongan: golongan,
					tanggal: tanggal
				},
				success: function (ajaxData) {
					$("#formmodal").html(ajaxData);
					$("#formmodal").modal('show', {
						backdrop: 'true'
					});
					modaldetailtutup();
				},
				error: function (ajaxData) {
					$.notify("Gagal Memproses Data", "error");
				}
			});

		}

		function jawabkonsul(id) {
			$.ajax({
				url: "<?php echo site_url(); ?>/rme/jawabkonsul",
				type: "GET",
				data: {
					id: id
				},
				success: function (ajaxData) {
					$("#formmodal").html(ajaxData);
					$("#formmodal").modal('show', {
						backdrop: 'true'
					});
					modaldetailtutup();
				},
				error: function (ajaxData) {
					$.notify("Gagal Memproses Data", "error");
				}
			});

		}



		function editisiankonsul(id) {
			$.ajax({
				url: "<?php echo site_url(); ?>/rme/editisikonsul",
				type: "GET",
				data: {
					id: id
				},
				success: function (ajaxData) {
					$("#formmodal").html(ajaxData);
					$("#formmodal").modal('show', {
						backdrop: 'true'
					});
					modaldetailtutup();
				},
				error: function (ajaxData) {
					$.notify("Gagal Memproses Data", "error");
				}
			});

		}



		function bukaFormHasilRAD(id) {
			// Buat URL untuk cetak berdasarkan ID
			var url = "<?php echo site_url(); ?>/iradiologi/layananhasilcetak_rme/" + id;

			// Buka URL dalam tab atau jendela baru
			window.open(url, '_blank');
		}


		// ========== cari resep ==========
		document.getElementById('cari').addEventListener('input', function () {
			var kataKunci = this.value.toLowerCase(); // Ambil teks input dan ubah menjadi huruf kecil

			var tabel = document.getElementById('tabelresep');
			var tbody = tabel.getElementsByTagName('tbody')[0]; // Dapatkan elemen tbody

			var rows = tbody.getElementsByTagName('tr'); // Dapatkan semua baris dalam tabel

			for (var i = 0; i < rows.length; i++) {
				var row = rows[i];
				var cell = row.getElementsByTagName('td')[1]; // Dapatkan sel kedua (index 1) yang berisi data obat

				if (cell) {
					var dataObat = cell.textContent.toLowerCase(); // Ambil teks dalam sel dan ubah menjadi huruf kecil
					var isVisible = dataObat.indexOf(kataKunci) !== -1; // Cek apakah data obat mengandung kata kunci pencarian

					// Tampilkan atau sembunyikan baris berdasarkan hasil pencarian
					row.style.display = isVisible ? '' : 'none';
				}
			}
		});

		// ========== cari laboratorium==========
		document.getElementById('carilab').addEventListener('input', function () {
			var kataKunci = this.value.toLowerCase(); // Ambil teks input dan ubah menjadi huruf kecil

			var tabel = document.getElementById('tabellab');
			var tbody = tabel.getElementsByTagName('tbody')[0]; // Dapatkan elemen tbody

			var rows = tbody.getElementsByTagName('tr'); // Dapatkan semua baris dalam tabel

			for (var i = 0; i < rows.length; i++) {
				var row = rows[i];
				var cell = row.getElementsByTagName('td')[1]; // Dapatkan sel kedua (index 1) yang berisi data tindakan

				if (cell) {
					var dataTindakan = cell.textContent.toLowerCase(); // Ambil teks dalam sel dan ubah menjadi huruf kecil
					var isVisible = dataTindakan.indexOf(kataKunci) !== -1; // Cek apakah data tindakan mengandung kata kunci pencarian

					// Tampilkan atau sembunyikan baris berdasarkan hasil pencarian
					row.style.display = isVisible ? '' : 'none';
				}
			}
		});

		// ========== cari radiologi ==============
		document.getElementById('carirad').addEventListener('input', function () {
			var kataKunci = this.value.toLowerCase(); // Ambil teks input dan ubah menjadi huruf kecil

			var tabel = document.getElementById('tabelrad');
			var tbody = tabel.getElementsByTagName('tbody')[0]; // Dapatkan elemen tbody

			var rows = tbody.getElementsByTagName('tr'); // Dapatkan semua baris dalam tabel

			for (var i = 0; i < rows.length; i++) {
				var row = rows[i];
				var cell = row.getElementsByTagName('td')[1]; // Dapatkan sel kedua (index 1) yang berisi data tindakan

				if (cell) {
					var dataTindakan = cell.textContent.toLowerCase(); // Ambil teks dalam sel dan ubah menjadi huruf kecil
					var isVisible = dataTindakan.indexOf(kataKunci) !== -1; // Cek apakah data tindakan mengandung kata kunci pencarian

					// Tampilkan atau sembunyikan baris berdasarkan hasil pencarian
					row.style.display = isVisible ? '' : 'none';
				}
			}
		});
</script>


<!-- asesmen keperawatan -->
<script type="text/javascript">
	// Event listener untuk tab "triase"
	$(document).ready(function () {
		$("#subtabawalmedis").on("click", function (e) {
			e.preventDefault(); // Mencegah tab berperilaku standar

			// Panggil fungsi panggilFormTriase saat tab diklik
			var no_rm = document.getElementById("no_rm").value;
			var notransaksi = document.getElementById("notransaksi").value;

			$.ajax({
				url: "<?php echo site_url(); ?>/rme/panggilFormAsesmenRajal",
				type: "GET",
				data: {
					no_rm: no_rm,
					notransaksi: notransaksi
				},
				success: function (ajaxData) {
					console.log(ajaxData);
					$("#awalmedis").html(ajaxData);
				},
				error: function () {
					$.notify("Gagal Memproses Data", "error");
				}
			});
		});
	});
</script>


<script type="text/javascript">
	// Event listener untuk tab "triase"
	$(document).ready(function () {
		$("#subtabfisio").on("click", function (e) {
			e.preventDefault(); // Mencegah tab berperilaku standar

			// Panggil fungsi panggilFormTriase saat tab diklik
			var no_rm = document.getElementById("no_rm").value;
			var notransaksi = document.getElementById("notransaksi").value;

			$.ajax({
				url: "<?php echo site_url(); ?>/rme/panggilFormFisio",
				type: "GET",
				data: {
					no_rm: no_rm,
					notransaksi: notransaksi
				},
				success: function (ajaxData) {
					console.log(ajaxData);
					$("#fisio").html(ajaxData);
				},
				error: function () {
					$.notify("Gagal Memproses Data", "error");
				}
			});
		});
	});
</script>

<script type="text/javascript">
	// Event listener untuk tab "triase"
	$(document).ready(function () {
		$("#subtabresumemedis").on("click", function (e) {
			e.preventDefault(); // Mencegah tab berperilaku standar

			// Panggil fungsi panggilFormTriase saat tab diklik
			var no_rm = document.getElementById("no_rm").value;
			var notransaksi = document.getElementById("notransaksi").value;
			var kode_dokter = document.getElementById("kode_dokter").value;

			$.ajax({
				url: "<?php echo site_url(); ?>/rme/panggilFormResumeMedis",
				type: "GET",
				data: {
					no_rm: no_rm,
					notransaksi: notransaksi,
					kode_dokter : kode_dokter
				},
				success: function (ajaxData) {
					// console.log(ajaxData);
					$("#resumemedis").html(ajaxData);
				},
				error: function () {
					$.notify("Gagal Memproses Data", "error");
				}
			});
		});
	});
</script>

<script>
        function changeTabStyle(tab) {
            // Mendapatkan semua elemen tab
            var tabs = document.getElementsByClassName('nav-link');

            // Mengatur style untuk semua tab menjadi default
            for (var i = 0; i < tabs.length; i++) {
                tabs[i].style.backgroundColor = '';
                tabs[i].style.color = '';
            }

            // Mengatur style untuk tab yang dipilih
            tab.style.backgroundColor = '#566573';  // Warna hitam untuk latar belakang
            tab.style.color = '#ffffff';  // Warna putih untuk teks
        }
    </script>


<script>
    // Fungsi untuk memanggil fungsi refreshhistoryresep() setiap 5 menit
    function refreshData() {
		var no_rm = document.getElementById("no_rm").value;
        $.ajax({
			url: "<?php echo site_url(); ?>/rme/refreshhistoryresep",
            method: 'GET', // Atau POST sesuai dengan pengaturan server Anda
            data: {
					no_rm: no_rm
				},
            success: function(ajaxData) {
                console.log('masuk');
				var dt = JSON.parse(ajaxData);
				$("#tabelresep tbody tr").remove();
				$("#tabelresep tbody").append(dt.dtview);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }

    // Panggil refreshData setiap 5 menit
    setInterval(refreshData, 300000); // 300000 milidetik = 5 menit
</script>


<script type="text/javascript">
	// Event listener untuk tab "triase"
	$(document).ready(function () {
		$("#subuploadfile").on("click", function (e) {
			e.preventDefault(); // Mencegah tab berperilaku standar
			// Panggil fungsi panggilFormTriase saat tab diklik
			var no_rm = document.getElementById("no_rm").value;
			var notransaksi = document.getElementById("notransaksi").value;
					console.log(no_rm);
					console.log(notransaksi);
			$.ajax({
				url: "<?php echo site_url(); ?>/rme/FormUpload",
				type: "GET",
				data: {
					no_rm: no_rm,
					notransaksi: notransaksi
				},
				success: function (ajaxData) {
					// console.log(ajaxData);
					$("#uploadfile").html(ajaxData);
				},
				error: function () {
					$.notify("Gagal Memproses Data", "error");
				}
			});
		});
	});

	function orderLabDPJP() {
	var no_rm = document.getElementById("no_rm").value;
	var kode_dokter = document.getElementById("kode_dokter").value;
	var notransaksi = document.getElementById("notransaksi").value;
	var kode_unit = document.getElementById("kode_unit").value;
	var nama_unit = document.getElementById("nama_unit").value;
	var tgl_masuk = document.getElementById("tgl_masuk").value;
	console.log(nama_unit);
    $.ajax({
			url: "<?php echo site_url(); ?>/rme/tambahOrderLabHeader",
			type: "GET",
			data: {
				no_rm : no_rm,
				kode_dokter : kode_dokter,
				notransaksi : notransaksi,
				kode_unit : kode_unit,
				rirj:'RI',
				tgl_masuk : tgl_masuk
			},
			success: function(ajaxData) {
				$("#formmodal").html(ajaxData);
                    $("#formmodal").modal('show', {
                        backdrop: 'true'
                    });
                    modaldetailtutup();
			},
			error: function(ajaxData) {
				$.notify("Gagal Memproses Data", "error");
			}
		});
}

function orderRadDPJP() {
	var no_rm = document.getElementById("no_rm").value;
	var kode_dokter = document.getElementById("kode_dokter").value;
	var notransaksi = document.getElementById("notransaksi").value;
	var kode_unit = document.getElementById("kode_unit").value;
	var nama_unit = document.getElementById("nama_unit").value;
	var tgl_masuk = document.getElementById("tgl_masuk").value;
	console.log(nama_unit);
    $.ajax({
			url: "<?php echo site_url(); ?>/rme/tambahOrderRadHeader",
			type: "GET",
			data: {
				no_rm : no_rm,
				kode_dokter : kode_dokter,
				notransaksi : notransaksi,
				kode_unit : kode_unit,
				rirj:'RI',
				tgl_masuk : tgl_masuk
			},
			success: function(ajaxData) {
				$("#formmodal").html(ajaxData);
                    $("#formmodal").modal('show', {
                        backdrop: 'true'
                    });
                    modaldetailtutup();
			},
			error: function(ajaxData) {
				$.notify("Gagal Memproses Data", "error");
			}
		});

}

function tambahlab(pilihan) {
	var no_rm = document.getElementById("no_rm").value;
	var notransaksi = document.getElementById("notransaksi").value;

    var hasilPemisahan = pilihan.split("_");
	var notransaksi_IN = hasilPemisahan[0]
	var pilihlab = hasilPemisahan[1]
	// var pilihlab=
	var kode_unit = 'LABS';
	var nama_unit = 'LABORATORIUM';
	console.log(notransaksi_IN);
    $.ajax({
			url: "<?php echo site_url(); ?>/rme/tambahOrderLab",
			type: "GET",
			data: {
				no_rm: no_rm,
				notransaksi: notransaksi,
				notransaksi_IN: notransaksi_IN,
				kode_unit: kode_unit,
				nama_unit: nama_unit,
				pilihlab : pilihlab
			},
			success: function(ajaxData) {
				$("#formmodal").html(ajaxData);
                    $("#formmodal").modal('show', {
                        backdrop: 'true'
                    });
                    modaldetailtutup();
			},
			error: function(ajaxData) {
				$.notify("Gagal Memproses Data", "error");
			}
		});

}

function tambahrad(pilihan) {
	var no_rm = document.getElementById("no_rm").value;
	var notransaksi = document.getElementById("notransaksi").value;

    var hasilPemisahan = pilihan.split("_");
	var notransaksi_IN = hasilPemisahan[0]
	var pilihlab = hasilPemisahan[1]
	// var pilihlab=
	var kode_unit = 'RDGL';
	var nama_unit = 'RADIOLOGI';
	console.log(notransaksi_IN);
    $.ajax({
			url: "<?php echo site_url(); ?>/rme/tambahOrderRad",
			type: "GET",
			data: {
				no_rm: no_rm,
				notransaksi: notransaksi,
				notransaksi_IN: notransaksi_IN,
				kode_unit: kode_unit,
				nama_unit: nama_unit,
				pilihlab : pilihlab
			},
			success: function(ajaxData) {
				$("#formmodal").html(ajaxData);
                    $("#formmodal").modal('show', {
                        backdrop: 'true'
                    });
                    modaldetailtutup();
			},
			error: function(ajaxData) {
				$.notify("Gagal Memproses Data", "error");
			}
		});

	}

function EditHeaderLab(notransaksi_IN) {
	var no_rm = document.getElementById("no_rm").value;
	var notransaksi = document.getElementById("notransaksi").value;
	var kode_unit = 'LABS';
	var nama_unit = 'LABORATORIUM';
	console.log(notransaksi_IN);
    $.ajax({
			url: "<?php echo site_url(); ?>/rme/editOrderLabHeader",
			type: "GET",
			data: {
				no_rm: no_rm,
				notransaksi: notransaksi,
				notransaksi_IN: notransaksi_IN,
			},
			success: function(ajaxData) {
				$("#formmodal").html(ajaxData);
                    $("#formmodal").modal('show', {
                        backdrop: 'true'
                    });
                    modaldetailtutup();
			},
			error: function(ajaxData) {
				$.notify("Gagal Memproses Data", "error");
			}
		});

}

function EditHeaderRad(notransaksi_IN) {
	var no_rm = document.getElementById("no_rm").value;
	var notransaksi = document.getElementById("notransaksi").value;
	var kode_unit = 'RDGL';
	var nama_unit = 'RADIOLOGI';
	console.log(notransaksi_IN);
    $.ajax({
			url: "<?php echo site_url(); ?>/rme/editOrderRadHeader",
			type: "GET",
			data: {
				no_rm: no_rm,
				notransaksi: notransaksi,
				notransaksi_IN: notransaksi_IN,
			},
			success: function(ajaxData) {
				$("#formmodal").html(ajaxData);
                    $("#formmodal").modal('show', {
                        backdrop: 'true'
                    });
                    modaldetailtutup();
			},
			error: function(ajaxData) {
				$.notify("Gagal Memproses Data", "error");
			}
		});

}



	function bukaFormHasilLAB(notransaksi_IN,pilihunitlab) {
    // Buat URL untuk cetak berdasarkan ID
		if (pilihunitlab == 1) {
			var url = "<?php echo site_url(); ?>/rme/hasilLabKlinik_rme/" + notransaksi_IN;
			// Buka URL dalam tab atau jendela baru
			window.open(url, '_blank');
		} 

		if (pilihunitlab == 2) {
			var url = "<?php echo site_url(); ?>/rme/hasilLabKlinik_rme_anatomi/" + notransaksi_IN;
			// Buka URL dalam tab atau jendela baru
			window.open(url, '_blank');
		} 

	}

	function hapusHeaderLab(notransaksi_IN) {
		$.confirm({
			title: "Hapus Data",
			content: "Yakin mengahapus data " + notransaksi_IN + " ?",
			buttons: {
				batal: {
					text: "Batal",
					btnClass: "btn-blue",
					action: function () {},
				},
				hapus: {
					text: "Hapus",
					btnClass: "btn-red",
					keys: ["enter"],
					action: function () {
					var no_rm = document.getElementById("no_rm").value;
					var kode_dokter = document.getElementById("kode_dokter").value;
					var nama_dokter = document.getElementById("nama_dokter").value;
					var notransaksi = document.getElementById("notransaksi").value;
					var kode_unit = document.getElementById("kode_unit").value;
					$.ajax({
							url: "<?php echo site_url(); ?>/rme/hapusLabHeader",
							type: "GET",
							data: {
								no_rm : no_rm,
								kode_dokter : kode_dokter,
								nama_dokter : nama_dokter,
								notransaksi : notransaksi,
								kode_unit : kode_unit,
								notransaksi_IN : notransaksi_IN
							},
							success: function(ajaxData) {
								console.log(ajaxData);
									var dt = JSON.parse(ajaxData);
									$("#orderlab tbody tr").remove();
									$("#orderlab tbody").append(dt.dtview);
							},
							error: function(ajaxData) {
								$.notify("Gagal Memproses Data", "error");
							}
						});
					}		
				}
			}	
		})
}


function hapusHeaderRad(notransaksi_IN) {
		$.confirm({
			title: "Hapus Data",
			content: "Yakin mengahapus data " + notransaksi_IN + " ?",
			buttons: {
				batal: {
					text: "Batal",
					btnClass: "btn-blue",
					action: function () {},
				},
				hapus: {
					text: "Hapus",
					btnClass: "btn-red",
					keys: ["enter"],
					action: function () {
					var no_rm = document.getElementById("no_rm").value;
					var kode_dokter = document.getElementById("kode_dokter").value;
					var nama_dokter = document.getElementById("nama_dokter").value;
					var notransaksi = document.getElementById("notransaksi").value;
					var kode_unit = document.getElementById("kode_unit").value;
					$.ajax({
							url: "<?php echo site_url(); ?>/rme/hapusRadHeader",
							type: "GET",
							data: {
								no_rm : no_rm,
								kode_dokter : kode_dokter,
								nama_dokter : nama_dokter,
								notransaksi : notransaksi,
								kode_unit : kode_unit,
								notransaksi_IN : notransaksi_IN
							},
							success: function(ajaxData) {
								console.log(ajaxData);
									var dt = JSON.parse(ajaxData);
									$("#orderrad tbody tr").remove();
									$("#orderrad tbody").append(dt.dtview);
							},
							error: function(ajaxData) {
								$.notify("Gagal Memproses Data", "error");
							}
						});
					}		
				}
			}	
		})
}

function kirimlab(notransaksi_IN) {
	$.confirm({
		title: "Kirim Data",
		content: "No.Transaksi " + notransaksi_IN + " di kirim ke Laboratorium ?",
		buttons: {
			batal: {
				text: "Batal",
				btnClass: "btn-red",
				action: function () {},
			},
			kirim: {
				text: "Kirim",
				btnClass: "btn-blue",
				keys: ["enter"],
				action: function () {
				var no_rm = document.getElementById("no_rm").value;
				var notransaksi = document.getElementById("notransaksi").value;

				// alert(kode_dokter);
				$.ajax({
						url: "<?php echo site_url(); ?>/rme/kirimkelab",
						type: "GET",
						data: {
							no_rm : no_rm,
							notransaksi : notransaksi,
							notransaksi_IN : notransaksi_IN
						},
						success: function(ajaxData) {
							console.log(ajaxData);
							var dt = JSON.parse(ajaxData);
							$("#orderlab tbody tr").remove();
							$("#orderlab tbody").append(dt.dtview);
							// -------------------
							$.ajax({
									url: "<?php echo site_url(); ?>/rme/refreshTabelHisLab",
									type: "GET",
									data: {
										no_rm : no_rm,
										notransaksi : notransaksi,
										notransaksi_IN : notransaksi_IN
									},
									success: function(ajaxData) {
										console.log(ajaxData);
										var dt = JSON.parse(ajaxData);
										$("#tabellab tbody tr").remove();
										$("#tabellab tbody").append(dt.dtview);
									},
									error: function(ajaxData) {
										$.notify("Gagal Memproses Data", "error");
									}
								});
							
							// -------------------
						},
						error: function(ajaxData) {
							$.notify("Gagal Memproses Data", "error");
						}
					});
				}		
			}
		}	
	})
}

function kirimrad(notransaksi_IN) {
	$.confirm({
		title: "Kirim Data",
		content: "No.Transaksi " + notransaksi_IN + " di kirim ke Laboratorium ?",
		buttons: {
			batal: {
				text: "Batal",
				btnClass: "btn-red",
				action: function () {},
			},
			kirim: {
				text: "Kirim",
				btnClass: "btn-blue",
				keys: ["enter"],
				action: function () {
				var no_rm = document.getElementById("no_rm").value;
				var notransaksi = document.getElementById("notransaksi").value;

				// alert(kode_dokter);
				$.ajax({
						url: "<?php echo site_url(); ?>/rme/kirimkerad",
						type: "GET",
						data: {
							no_rm : no_rm,
							notransaksi : notransaksi,
							notransaksi_IN : notransaksi_IN
						},
						success: function(ajaxData) {
							console.log(ajaxData);
							var dt = JSON.parse(ajaxData);
							$("#orderrad tbody tr").remove();
							$("#orderrad tbody").append(dt.dtview);
							// -------------------
							$.ajax({
									url: "<?php echo site_url(); ?>/rme/refreshTabelHisRad",
									type: "GET",
									data: {
										no_rm : no_rm,
										notransaksi : notransaksi,
										notransaksi_IN : notransaksi_IN
									},
									success: function(ajaxData) {
										console.log(ajaxData);
										var dt = JSON.parse(ajaxData);
										$("#tabelrad tbody tr").remove();
										$("#tabelrad tbody").append(dt.dtview);
									},
									error: function(ajaxData) {
										$.notify("Gagal Memproses Data", "error");
									}
								});
							
							// -------------------
						},
						error: function(ajaxData) {
							$.notify("Gagal Memproses Data", "error");
						}
					});
				}		
			}
		}	
	})
}
</script>