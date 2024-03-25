<link rel="stylesheet" href="../../assets/template_baru/dist/vendors/icheck/skins/all.css">


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
			<!-- <----- row ---- -->
				<div class="row spacing-row">
					<div class="col-md-11">
						<div class="card-body">
							<input class="form-control" id="notransaksi" type="hidden" value="<?php echo $dataPasien->notransaksi; ?>">
							<input class="form-control" id="no_rm" type="hidden" value="<?php echo $dataPasien->no_rm; ?>">
							<input class="form-control" id="no_askes" type="hidden" value="<?php echo $dataPasien->no_askes; ?>">


							<input class="form-control" id="kode_dokter" type="hidden" value="<?php echo $this->session->userdata("kodedokter"); ?>">
							<input class="form-control" id="nama_dokter" type="hidden" value="<?php echo $this->session->userdata("nama"); ?>">
							<input class="form-control" id="nama_dokter" type="hidden" value="<?php echo $editing; ?>">

							
							<input class="form-control" id="kode_unit" type="hidden" value="<?php echo $dataPasien->kode_unit; ?>">
							<input class="form-control" id="nama_unit" type="hidden" value="<?php echo $dataPasien->nama_unit; ?>">
							<input class="form-control" id="golongan" type="hidden" value="<?php echo $dataPasien->golongan; ?>">
							<input class="form-control" id="tgl_masuk" type="hidden" value="<?php echo $dataPasien->tgl_masuk; ?>">
							<p>

                            	<div class="w-sm-100 mr-auto"><h6 class="mb-0" style="color: #848182;">Pasien</h6></div>
                            	<div class="w-sm-100 mr-auto"><h4 class="mb-0" style="color: #2D076F;"><?php echo $dataPasien->no_rm.' | '.$nama_pasien; ?></h4></div>
								<span style="display: inline;font-weight: bold; font-size: 14px; color: #4C0428;"><?php echo $dataPasien->golongan.' | No.Kartu : '.$dataPasien->no_askes.' | NIK : '.$dataPasien->nik.' | Alamat : '.$dataPasien->alamat.' | Trx : '.$dataPasien->notransaksi?></span><br>
								<span style="display: inline;font-weight: bold; font-size: 14px; color: #4C0428;"><?php echo 'Tanggal Lahir : '.$tgl_lahir.' | '.$umur.' | Agama : '.$dataPasien->agama ?></span><br>
								<?php if ($editing == 0) { ?>
									<button class="btn btn-light" style="display: inline;font-weight: bold; font-size: 20px; color: #9D1305; background-color: yellow;">
    									<!-- <?php echo ' History Pemeriksaan Pasien Tanggal : ' . $tglhistori." "; ?> -->
									</button>
								<?php } ?>	
							</p>
						</div>
					</div>
					<div class="col-md-1">
						<button class="btn btn-light mt-4" onclick="kembaliKeRmeNew()">Kembali</button>
            		</div>
            	</div>

				<!-- =========tab nan new ======= -->
				<div class="tab-pane fade show" id="tabutama" role="tabpanel2">
					<nav>
						<div class="nav nav-tabs" id="subnav12" role="tablist2">
							<div class="nav-item" style="flex: 1;"></div>
							<a class="nav-item nav-link active" id="subtabutamaigd" data-toggle="tab" href="#utamaigd" role="tab" aria-controls="subnav12-1" aria-selected="true" style="background-color: #566573; color: white; border: 1px solid #ABB2B9;">Pelayanan</a>
							<a class="nav-item nav-link" id="subtabtriase" data-toggle="tab" href="#triase" role="tab" aria-controls="subnav12-10" aria-selected="false" style="border: 1px solid #ABB2B9;">Triase</a>
							<a class="nav-item nav-link" id="subtabawalmedis" data-toggle="tab" href="#awalmedis" role="tab" aria-controls="subnav12-4" aria-selected="false" style="border: 1px solid #ABB2B9;">Asesmen Medis</a>
							<a class="nav-item nav-link" id="subtabawalkep" data-toggle="tab" href="#awalkep" role="tab" aria-controls="subnav12-5" aria-selected="false" style="border: 1px solid #ABB2B9;">Asesmen Keperawatan</a>
							<a class="nav-item nav-link" id="subtabrekonobat" data-toggle="tab" href="#rekonobat" role="tab" aria-controls="subnav12-3" aria-selected="false" style="border: 1px solid #ABB2B9;">Rekonsiliasi Obat</a>
						</div>

						<div class="tab-content" id="subnav12-content">
							<div class="tab-pane fade show active" id="utamaigd" role="tabpanel2" aria-labelledby="subtabutamaigd">
								<div class="card">
									<div class="col-md-12">
									<div class="row spacing-row">
											<div class="col-md-3 mt-4 mb-5" id="soap">
												<div id="accordion2" class="accordion-alt" role="tablist">
														<div class="mb-2">
															<h6 class="mb-0">
																<a class="d-block border" data-toggle="collapse" href="#collapse4" aria-expanded="true" aria-controls="collapse4" style="background-color: #DDDAF3;">
																	Form
																</a>
															</h6>
															<div id="collapse4" class="collapse" role="tabpanel" data-parent="#accordion2">
																<div class="table-responsive mt-2 table-hover table-scrollable" id="tabeltindakan" style="max-height: 600px; overflow-y: auto;">
																	<div class="form-inline mt-2 ml-3">
																		<!-- <label style="font-size: 14px; font-weight: bold; color: black;">+ Triase</label> -->
																		<button onclick="panggilFormTriase('<?php echo $dataPasien->no_rm; ?>', '<?php echo $dataPasien->notransaksi; ?>')">Triase</button>
																	</div>
																	<div class="form-inline mt-2 ml-3">
																		<!-- <label style="font-size: 14px; font-weight: bold; color: black;">+ Triase</label> -->
																		<button onclick="panggilFormAsesmenMedis('<?php echo $dataPasien->no_rm; ?>', '<?php echo $dataPasien->notransaksi; ?>')">Asesmen Awal Medis</button>
																	</div>

																	<div class="form-inline mt-2 ml-3">
																		<button onclick="panggilFormAsesmenKeperawatan('<?php echo $dataPasien->no_rm; ?>', '<?php echo $dataPasien->notransaksi; ?>')">Asesmen Awal Keperawatan</button>

																	</div>
																</div>
															</div>
														</div>
													</div>
													<div id="accordion3" class="accordion-alt" role="tablist">
														<div class="mb-2">
															<h6 class="mb-0">
																<a class="collapsed redial-dark d-block border redial-border-light" data-toggle="collapse" href="#collapse5" aria-expanded="false" aria-controls="collapse5" style="background-color: #D5FAC1;">
																	Terapi / Tindakan Medis
																</a>
															</h6>
															<div id="collapse5" class="collapse show" role="tabpanel"  data-parent="#accordion3">
																<!-- <div class="card-body"> -->
																	<!-- <div class="table-responsive mt-2 table-hover table-scrollable" id="tabeltindakan">
																		-->
																		<button onclick="tambahterapi()" class="btn btn-sm btn-secondary ml-auto mb-2 mt-4" id="tambahterapi" name="tambahObatBaru" style="background-color: #FF5733; color: white;">+ Terapi / Tindakan</button>

																	<div class="table-responsive mt-2 table-hover table-scrollable" id="tabeltindakanterapi" style="max-height: 400px; overflow-y: auto;">
																		<table class="table" id="tabelterapi">
																			<tbody>
																				<?php
																				if ($dtterapi == NULL) {
																				?>
																					<tr>
																						<td colspan="100%" class="text-center">
																							Belum Ada Data
																						</td>
																					</tr>
																					<?php } else {
																					$no = 1;
																					$jmlt = 0;
																					foreach ($dtterapi as $row) {
																						$kode_dokter_psoap=$row->kode_dokter;
																						$kode_dokter_form_periksa=$dataPasien->kode_dokter;
																						if ($kode_dokter_form_periksa == $kode_dokter_psoap) {
																							$warnabackground="#FFFFFF";
																						} else {
																							$warnabackground="#B0C4DE";
																						}
																						?>
																						<tr onclick="bukaformterapi('<?php echo $row->id;?>','<?php echo $row->kode_dokter;?>')">
																							<td width="10%" valign="top">
																							</td>
																							<td width="90%" valign="top">
																								<?php 
																								echo '<strong style="color: Navy; font-size: 13px;">' . tanggaldua($row->tanggal).' | '.$row->jam.'</strong><br>';
																								echo $row->nama_dokter. "<br>";
																									if ($row->terapi != null) {echo '<span style="color: darkred;">Terapi : </span><strong>' . $row->terapi . '<br></strong>';} 
																									if ($row->evaluasi != null) {echo '<span style="color: darkred;">Evaluasi : </span><strong>'.$row->evaluasi . "<br></strong>";} 
																									if ($row->oleh != null) {echo '<span style="color: darkred;">Instruksi Oleh : </span><strong>'.$row->oleh . "<br></strong>";} 
																								echo "<br>";	
																								?>
																							</td>
																						<tr>
																					<?php
																						}}
																				?>
																			</tbody>
																		</table>
																	</div>
																<!-- </div> -->
															</div>
														</div>
													</div>

													<!-- tindakan terintegrasi keperawatan -->
													<div id="accordion35" class="accordion-alt" role="tablist">
														<div class="mb-2 mt-3">
															<h6 class="mb-0">
																<a class="collapsed redial-dark d-block border redial-border-light" data-toggle="collapse" href="#collapse55" aria-expanded="false" aria-controls="collapse5" style="background-color: #D5FAC1;">
																	Tindakan Terintegrasi (Keperawatan)
																</a>
															</h6>
															<div id="collapse55" class="collapse show" role="tabpanel"  data-parent="#accordion35">
																	<button onclick="tambahdata()" class="btn btn-sm btn-secondary mt-3 ml-auto mb-2" id="tomboltambahdata" name="tomboltambahdata" style="background-color: #FF5733; color: white;">+ Tindakan</button>
																	

																	<!-- <div class="table-responsive mt-2 table-hover table-scrollable" id="tabeltindakanterapi" style="max-height: 400px; overflow-y: auto;"> -->


																	<div class="table-responsive table-hover table-scrollable" id="tabelterapi1" style="max-height: 600px; overflow-y: auto;">
																			<table class="table" id="tabeltindakan">
																				<tbody>
																					<?php
																					$no=100;
																					if ($dtintegrasi== NULL) {
																					?>
																						<tr>
																							<td colspan="100%" class="text-left">
																								Belum Ada Data
																							</td>
																						</tr>
																						<?php } else {
																						$no = 100;
																						$jmlt = 0;
																						foreach ($dtintegrasi as $row) {
																						?>	
																							<tr style="background-color: <?php echo $warnabackground;?>;" onclick="openform('<?php echo $row->id;?>')">
																								<td width="2%">
																								</td>
																								<td width="98%">
																									<?php 
																									echo '<strong style="color: Navy; font-size: 13px;">' . tanggaldua($row->tanggal) .' | ' .$row->jam.'</strong><br>';
																										if ($row->tindakan != null) {echo '<span style="color: darkred;">Terapi : </span><strong>' . $row->tindakan . '<br></strong>';} 
																										if ($row->oleh != null) {echo '<span style="color: darkred;">Oleh : </span><strong>'.$row->oleh . "<br></strong>";} 
																										if ($row->user2 != null) {echo '<span style="color: darkred;">User : </span>'.$row->user2 ."<br>";} 
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
															</div>
														</div>
													</div>
													
													<!-- tindakan terintegrasi keperawatan -->
													<div id="accordion37" class="accordion-alt" role="tablist">
														<div class="mb-2 mt-3">
															<h6 class="mb-0">
																<a class="collapsed redial-dark d-block border redial-border-light" data-toggle="collapse" href="#collapse57" aria-expanded="false" aria-controls="collapse5" style="background-color: #D5FAC1;">
																	Pemberian Obat / Inpus (Terintegrasi)
																</a>
															</h6>
															<div id="collapse57" class="collapse show" role="tabpanel"  data-parent="#accordion37">
																	<button onclick="tambahdataobat()" class="btn btn-sm btn-secondary mt-3 ml-auto mb-2" id="tomboltambahdata" name="tomboltambahdata" style="background-color: #FF5733; color: white;">+ Obat / Infus</button>
																	

																	<!-- <div class="table-responsive mt-2 table-hover table-scrollable" id="tabeltindakanterapi" style="max-height: 400px; overflow-y: auto;"> -->


																	<div class="table-responsive table-hover table-scrollable" id="tabelobatinfus1" style="max-height: 600px; overflow-y: auto;">
																			<table class="table" id="tabelobatinfus">
																				<tbody>
																					<?php
																					$no=100;
																					if ($dtobatinfus== NULL) {
																					?>
																						<tr>
																							<td colspan="100%" class="text-left">
																								Belum Ada Data
																							</td>
																						</tr>
																						<?php } else {
																						$no = 100;
																						$jmlt = 0;
																						$warnabackground="#FFFFFF";
																						foreach ($dtobatinfus as $row) {
																						?>	
																							<tr style="background-color: <?php echo $warnabackground;?>;" onclick="openformobatinfus('<?php echo $row->id;?>')">
																								<td width="2%">
																								</td>
																								<td width="98%">
																									<?php 
																									echo '<strong style="color: Navy; font-size: 13px;">' . tanggaldua($row->tanggal) .' | ' .$row->jam.'</strong><br>';
																										if ($row->namaobat != null) {echo '<span style="color: darkred;">Obat/Infus : </span><strong>' . $row->namaobat . '<br></strong>';} 
																										if ($row->dosis != null) {echo '<span style="color: darkred;">Dosis : </span><strong>'.$row->dosis . "<br></strong>";} 
																										if ($row->oral != null) {echo '<span style="color: darkred;">Oral/IV/IM/IC/SC : </span><strong>'.$row->oral . "<br></strong>";} 
																										if ($row->user2 != null) {echo '<span style="color: darkred;">User : </span>'.$row->user2 ."<br>";} 
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
															</div>
														</div>
													</div>
											</div>
											<div class="col-md-3 mt-4" id="order">
												<div id="accordion45" class="accordion-alt" role="tablist">
													<div class="mb-2">
														<h6 class="mb-0">
															<a class="d-block border" data-toggle="collapse" href="#collapse45" aria-expanded="true" aria-controls="collapse45" style="background-color: #F0E68C;">
																History / Pemesanan Tindakan
															</a>
														</h6>

														<button class="btn" style="background-color: #FF5733; color: white; margin-top: 5px;" onclick="toggleCollapse('collapseResep')">Resep</button>
														<button class="btn" style="background-color: Olive; color: white; margin-top: 5px;" onclick="toggleCollapse('collapseLaboratorium')">Laboratorium</button>
														<button class="btn" style="background-color: Peru; color: white; margin-top: 5px;" onclick="toggleCollapse('collapseRadiologi')">Radiologi</button>
														<button class="btn" style="background-color: Teal; color: white; margin-top: 5px;" onclick="toggleCollapse('collapseDiagnosa')">Diagnosa</button>

														<!-- <button class="btn" style="background-color: #FAE4EC; color: #FF5733; margin-top: 5px;" onclick="toggleCollapse('collapseResep')">RESEP</button>
														<button class="btn" style="background-color: #F6FACC; color: Olive; margin-top: 5px;" onclick="toggleCollapse('collapseLaboratorium')">LABORATORIUM</button>
														<button class="btn" style="background-color: #FAF2D9; color: Peru; margin-top: 5px;" onclick="toggleCollapse('collapseRadiologi')">RADIOLOGI</button>
														<button class="btn" style="background-color: #E5FACD; color: Teal; margin-top: 5px;" onclick="toggleCollapse('collapseDiagnosa')">DIAGNOSA</button> -->


														<div id="collapseResep" class="collapse  mt-3">
															<!-- class="collapse show" -->
															<h7>History Resep</h7>
															<div class="form-inline">
																<label for="cari" class="mr-2"> Cari</label>
																<input type="text" class="form-control" id="cari" placeholder="Masukkan kata kunci">
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
																									echo '<strong style="color: navy; font-size: 14px; height: 20px; display: inline-block; line-height: 20px; margin-left: 5px;">'. tanggaldua($row->tglresep).' | '.$row->noresep.'</strong><br>';

																									echo '<strong style="color: black;font-size: 12px; margin-left: 5px;">'.$row->nama_dokter.'</strong>';
																								?>
																								<td>	
																							</tr>
																					<?php		
																							$noresep_uji = $row->noresep;
																						}
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
															<h7>Daftar Tindakan Laboratorium</h7>
															<div class="form-inline">
																<label for="carilab" class="mr-2"> Cari</label>
																<input type="text" class="form-control" id="carilab" placeholder="Masukkan kata kunci">
															</div>
															<!-- tabel data resep yang sudah ada sebelumnya -->
															<div class="table-responsive mt-2 table-hover table-scrollable" id="tabeltindakanlab" style="max-height: 600px; overflow-y: auto;">
																<table class="table" id="tabellab" style="background-color: #FFFF99;">
																			<tbody>
																				<?php
																				if ($dttindakanlab == NULL) {
																				?>
																					<tr>
																						<td colspan="100%" class="text-center">
																							Belum Ada Data
																						</td>
																					</tr>
																					<?php } else {
																					$no = 1;
																					$jmlt = 0;
																					foreach ($dttindakanlab as $row) {
																						// $kode_dokter_resep=$row->kode_dokter;
																						if ($editing == 1) {
																					?>
																						<tr onclick="addLab('<?php echo $row->id; ?>')">
																					<?php } else {
																					?>	
																						<tr>
																					<?php } ?>	
																							<td width="2%" style="height: 40px;"></td>
																							<td width="98%">
																								<?php 
																								echo '<strong style="color: black; font-size: 14px;">' . $row->tindakan . '</strong>';
																								?>
																							</td>
																						</tr>	
																					<?php
																						}}
																				?>
																			</tbody>
																</table>
															</div>
														</div>
														<div id="collapseRadiologi" class="collapse mt-3">
															<h7>Daftar Tindakan Radiologi</h7>
															<div class="form-inline">
																<label for="carirad" class="mr-2"> Cari</label>
																<input type="text" class="form-control" id="carirad" placeholder="Masukkan kata kunci">
															</div>
															<!-- tabel data resep yang sudah ada sebelumnya -->
															<div class="table-responsive mt-2 table-hover table-scrollable" id="tabeltindakanrad" style="max-height: 600px; overflow-y: auto;">
																<table class="table" id="tabelrad" style="background-color: #FFE4C4;">
																	<tbody>
																				<?php
																				if ($dttindakanrad == NULL) {
																				?>
																					<tr>
																						<td colspan="100%" class="text-center">
																							Belum Ada Data
																						</td>
																					</tr>
																					<?php } else {
																					$no = 1;
																					$jmlt = 0;
																					foreach ($dttindakanrad as $row) {
																						if ($editing == 1) {
																					?>
																							<tr onclick="addRad('<?php echo $row->id; ?>')">
																					<?php } else {
																					?>	
																							<tr>
																					<?php } ?>	
																							<td width="2%" style="height: 40px;"></td>
																							<td width="98%">
																								<?php 
																								echo '<strong style="color: black; font-size: 14px;">' . $row->tindakan . '</strong>';
																								?>
																							</td>
																						</tr>	
																					<?php
																						}}
																				?>
																		</tbody>
																</table>
															</div>
														</div>
														<div id="collapseDiagnosa" class="collapse mt-3">
															<h7>History Diagnosa</h7>
															<div class="form-inline">
																<label for="caridiag" class="mr-2"> Cari</label>
																<input type="text" class="form-control" id="caridiag" placeholder="Masukkan kata kunci">
															</div>
															<div class="table-responsive mt-2 table-hover table-scrollable" id="tabeldiagnosa" style="max-height: 600px; overflow-y: auto;">
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
																						}}
																				?>
																			</tbody>
																</table>
															</div>
														</div>
													</div>
												</div>
												<!-- ============================= -->
												<br>
												<br>
												<br>
												<div id="accordion47" class="accordion-alt" role="tablist" style="background-color: #FFFFFF;">
													<div class="mb-2">
														<h6 class="mb-0">
															<a class="d-block border" data-toggle="collapse" href="#collapse47" aria-expanded="true" aria-controls="collapse47" style="color: black; background-color: yellow;">
																Hasil Pemeriksaan
															</a>
														</h6>
														<div id="collapse47" class="collapse" role="tabpanel" data-parent="#accordion2">

															<label style="font-size: 14px; font-weight: bold; color: black; margin-top:20px">+ LABORATORIUM</label>
															<div class="table-responsive mt-2 table-hover table-scrollable" id="isihasillab" style="max-height: 350px; overflow-y: auto;">
																<div class="table-responsive table-hover table-scrollable" id="isilab">
																	<table class="table" id="orderlab" style="background-color: #EDF7C4;">
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
																							<tr onclick="bukaFormHasil('<?php echo $row->id; ?>','<?php echo $row->kode_unit; ?>')" style="border-bottom: 1px solid #0099CC;">
																								<td>
																									<?php 
																									echo '<strong style="color: red; font-size: 11px;">' . tanggaldua($row->tanggal) .'</strong><br>';
																									echo 'Unit Pemesan : '.$row->nama_unit_pemesan.'<br>';
																									echo 'Dokter Pemesan : '.$row->nama_dokter.'<br>';

																									echo "<br>";	
																									?>
																								</td>

																							
																						<?php
																							}}
																					?>
																				</tbody>
																	</table>
																</div>	
															</div>

															<label style="font-size: 14px; font-weight: bold; color: black; margin-top:20px">+ RADIOLOGI</label>
															<div class="table-responsive mt-1 table-hover table-scrollable" id="isihasillab" style="max-height: 350px; overflow-y: auto;">
																<div class="table-responsive table-hover table-scrollable" id="isilab">
																	<table class="table" id="orderlab" style="background-color: #D3F9D4;">
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
																							<tr onclick="bukaFormHasilRAD('<?php echo $row->id; ?>')" style="border-bottom: 1px solid #0099CC;">
																								<td>
																									<?php 
																									echo '<strong style="color: red; font-size: 11px;">' . tanggaldua($row->tanggal) .'</strong><br>';
																									echo '<strong style="color: black; font-size: 14px;">'.$row->namatindakan.'</strong><br>';
																									echo 'Unit Pemesan : '.$row->nama_unit_pemesan.'<br>';
																									echo 'Dokter Pemesan : '.$row->nama_dokter.'<br>';

																									echo "<br>";	
																									?>
																								</td>

																							
																						<?php
																							}}
																					?>
																				</tbody>
																	</table>
																</div>	
															</div>
														</div>
													</div>
												</div>
												<!-- =========== master data ========= -->
												<div id="accordion471" class="accordion-alt" role="tablist" style="background-color: #FFFFFF;">
													<div class="mt-4">
														<h6 class="mb-0">
															<a class="d-block border" data-toggle="collapse" href="#collapse471" aria-expanded="true" aria-controls="collapse471" style="color: black;">
																Data 
															</a>
														</h6>
														<div id="collapse471" class="collapse" role="tabpanel" data-parent="#accordion2">

															<div class="table-responsive mt-2 table-hover table-scrollable" id="isidatarambahan">
																
																<div class="form-inline mt-4">
																	<label style="font-size: 14px; font-weight: bold; color: black;">+ Master Data Obat Racikan</label>

																	<button onclick="tambahMasterRacik()" class="btn btn-sm btn-secondary ml-auto" id="tombolMasterRacikan" name="tombolMasterRacikan" style="background-color: #009933; color: white;">+ Tambah</button>
																	<button onclick="refreshTabelMasterRacik()" class="btn btn-sm ml-1" id="tombolMasterRacikan" name="tombolMasterRacikan" style="background-color: #D3D3D3; color: #00008B;"><i class="fas fa-angle-double-down"></i></button>
																</div>
																<div class="table-responsive mt-2 table-hover table-scrollable" id="isimasterracik" style="max-height: 300px; overflow-y: auto;">

																<table class="table" id="datamasterracik" style="background-color: #F0F8FF;">
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
																				$koderaciktampil='';
																				foreach($dtmasterracikdokter as $row) {
																					if ( $koderaciktampil != $row->kodeobatracikan ) {
																		?>			
																						<tr>
																							<td colspan="2">
																								<?php
																									echo '<span style="margin-left: 2ch;"></span> <strong style="color: red;font-size: 12px;">'.'> ' . strtoupper($row->nama_racikan).'</strong>';
																								?>
																								<button onclick="editDataRacik('<?php echo $row->kodeobatracikan;?>')" class="btn btn-sm ml-1" id="tomboleditRacikan" name="tomboleditRacikan" style="background-color: #330066; color: #FFFFFF;"><i class="far fa-edit"></i></button><br>
																								
																							<td>	
																						</tr>
																		<?php 	
																						$koderaciktampil=$row->kodeobatracikan;
																					} 
																		?>
																					<tr onclick="bukaFormRacik('<?php echo $row->idheader; ?>')">
																						<td width="10%">
																						</td>
																						<td width="90%">
																							<?php 
																								echo '<strong style="color: #000066; font-size: 12px;">' . trim($row->nama_obat).'</strong>'.'<br>';
																								echo 'Qty : '.$row->qty .' '. $row->satuan.'<br>';
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
												<!-- end master data racik======== -->
											</div>

											<div class="col-md-3 mt-5" id="hasil">
												<div class="form-inline mt-4">
													<label style="font-size: 14px; font-weight: bold; color: black;">+ Diagnosa</label>
													<button onclick="tambahDiag()" class="btn btn-sm btn-secondary ml-auto" id="tambahObatBaru" name="tambahObatBaru" style="background-color: #FF5733; color: white;">+ Diagnosa</button>
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
																foreach($dtdiag_hariini as $row) {
														?>			
																	<tr onclick="bukaFormDiag('<?php echo $row->id; ?>')" style="border-bottom: 1px solid #0099CC;">
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
												<div class="form-inline mt-3">
													<label style="font-size: 14px; font-weight: bold; color: black;">+ Order RESEP</label>
													<?php if ($editing == 1) { ?>
													<button onclick="tambahObat()" class="btn btn-sm btn-secondary ml-auto" id="tambahObatBaru" name="tambahObatBaru" style="background-color: #FF5733; color: white;">+ Obat</button>
													<button onclick="tambahRacik()" class="btn btn-sm btn-secondary ml-2" id="tombolLain" name="tombolLain" style="background-color: #000033; color: white;">+ Racikan</button>
													<?php } ?>
												</div>

												<div class="table-responsive mt-1 table-hover table-scrollable" id="isiresep">
													<table class="table" id="orderresep" style="background-color: #F0F8FF;">
														<tbody>
														<?php	
														if ($dtresepdetail_hariini == null) {
														?>
															<tr>
																<td class="text-center">
																	Belum Ada Order
																</td>
															</tr>
														<?php
															} else {
																foreach($dtresepdetail_hariini as $row) {
														?>			
																<?php if ($editing == 1) { ?>
																	<tr onclick="bukaFormObat('<?php echo $row->id; ?>')" style="border-bottom: 1px solid #0099CC;">
																<?php } else { ?>	
																	<tr style="border-bottom: 1px solid #0099CC;">
																<?php }?>	
																		<td width="10%" style="text-align: center; vertical-align: top">
																			<?php echo '*'; ?>
																		</td>
																		<td width="90%">
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
																				$text_with_br = nl2br($row->catatanracikan);
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
														}
														?>
														</tbody>
													</table>
												</div>
												<!-- ==== ORDER LABORATORIUM ==== -->
												<label style="font-size: 14px; font-weight: bold; color: black; margin-top:20px">+ Order Laboratorium</label>
												<div class="table-responsive table-hover table-scrollable" id="isilab">
													<table class="table" id="orderlab" style="background-color: #F0F8FF;">
														<tbody>
														<?php	
														if ($dtlabdetail_hariini == null) {
														?>
															<tr>
																<td class="text-center">
																	Belum Ada Order
																</td>
															</tr>
														<?php
															} else {	
																$i=0;
																foreach($dtlabdetail_hariini as $row) {
																	if ( $i==0 ) {
															?>			
																		<tr>
																			<td colspan="2">
																				<?php
																					echo '<span style="margin-left: 2ch;"></span> <strong style="color: red; font-size: 12px;">' . $row->notransaksi_IN.'</strong><br>';
																				?>
																			<td>	
															
																		</tr>
																													
															<?php 	
																		$i=1;
																	} 
															?>
																	<tr onclick="bukaFormLab('<?php echo $row->id; ?>')" style="border-bottom: 1px solid #0099CC;">
																		<td width="10%" style="text-align: center;">
																			<?php echo '*'; ?>
																		</td>
																		<td width="90%">
																			<?php
																			echo '<style="color: red; font-size: 12px;">' . $row->namatindakan;
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
												<label style="font-size: 14px; font-weight: bold; color: lackk; margin-top: 20px">+ Order Radiologi</label><br>
												<div class="table-responsive table-hover table-scrollable" id="isirad">
													<table class="table" id="orderrad" style="background-color: #F0F8FF;">
														<tbody>
														<?php	
														if ($dtraddetail_hariini == null) {
														?>
															<tr>
																<td class="text-center">
																	Belum Ada Order
																</td>
															</tr>
														<?php
															} else {	
																$i=0;
																foreach($dtraddetail_hariini as $row) {
																	if ( $i==0 ) {
														?>			
																		<tr>
																			<td colspan="2">
																				<?php
																					echo '<span style="margin-left: 2ch;"></span> <strong style="color: red; font-size: 12px;">' . $row->notransaksi_IN.'</strong><br>';
																				?>
																			<td>	
																		</tr>
																		
																<?php 	
																		$i=1;
																	} 
																?>
																	<tr onclick="bukaFormRad('<?php echo $row->id; ?>')" style="border-bottom: 1px solid #0099CC;">
																		<td width="10%" style="text-align: center;">
																			<?php echo '*'; ?>
																		</td>
																		<td width="90%">
																			<?php
																			echo '<style="color: red; font-size: 12px;">' . $row->namatindakan;
																			?>
																		<td>	
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
												<div id="accordion48" class="accordion-alt" role="tablist" style="background-color: #FFFFFF;">
													<div class="mb-2">
														<h6 class="mb-0">
															<a class="d-block border" data-toggle="collapse" href="#collapse48" aria-expanded="true" aria-controls="collapse48" style="color: black; background-color: yellow;">
																Kesimpulan Akhir
															</a>
														</h6>
													</div>
													<!-- ======= -->
													<div class="table-responsive mt-2 table-hover table-scrollable" id="tabeltindakan9" style="max-height: 700px; overflow-y: auto;">
																		<table class="table" id="tabelkesimpulan">
																			<tbody>
																				<?php
																				if ($dtpulang == NULL) {
																				?>
																					<tr>
																						<td colspan="100%" class="text-center">
																							Belum Ada Data
																						</td>
																					</tr>
																					<?php } else {
																					$no = 1;
																					$jmlt = 0;
																					foreach ($dtpulang as $row) {
																					?>
																						<tr>
																							<td width="5%" valign="top">
																							</td>
																							<td width="95%" valign="top">
																								<?php 
																									if ($row->dirawat == '1') {
																										// echo '<span style="color: darkred; font-size: 14px;">Dirawat, konsul ke Spesialis: <strong>' . $row->dirawatkonsul . '</strong><br></span>';
																										echo '<span style="color: darkred; font-size: 14px;">Dirawat, konsul ke Spesialis: <strong><span style="color: black;">' . $row->dirawatkonsul . '</span></strong><br></span>';

																									}
																									if ($row->pulang == '1') {
																										if ($row->izindokter == '1') {
																											echo '<span style="color: darkred; font-size: 14px;"><strong><span style="color: black;">Pulang dengan Izin Dokter</strong><br></span>';
																										} else {
																											echo '<span style="color: darkred; font-size: 14px;">Pulang, <strong><span style="color: black;"> Atas permintaan sendiri</strong><br></span>';
																										}
																										if ($row->terapipulang != NULL) {
																										echo '<br>';

																											echo '<span style="color: darkred; font-size: 14px;">Terapi Pulang<strong>'.'</strong><br></span>';
																											echo '<span style="color: darkred; font-size: 14px;"<span style="color: black;">' . $row->terapipulang . '<br></span>';
																										}
																									}	
																									if ($row->kontrolpoli != NULL) {
																										echo '<br>';

																										echo '<span style="color: darkred; font-size: 14px;">Kontrol ke Poli / Puskesmas <strong>'.'</strong><br></span>';
																										echo '<span style="color: darkred; font-size: 14px;">' . $row->kontrolpoli . '<br></span>';
																									}
																									if ($row->rujuk != NULL) {
																										echo '<br>';

																										echo '<span style="color: darkred; font-size: 14px;">Rujuk<strong>'.'</strong><br></span>';
																										echo '<span style="color: darkred; font-size: 14px;">' . $row->rujuk . '<br></span>';
																									}
																									if ($row->edukasi != NULL) {
																										echo '<br>';
																										echo '<span style="color: darkred; font-size: 14px;">Edukasi<strong>'.'</strong><br></span>';
																										echo '<span style="color: darkred; font-size: 14px;">' . $row->edukasi . '<br></span>';
																									}
																									if ($row->edukasi != NULL) {
																										if ($row->edukasipasien == '1') {
																											echo '<span style="color: darkred; font-size: 14px;">Edukasi diberikan kepada pasien</strong><br></span>';
																										}
																										if ($row->edukasikeluarga == '1') {
																											echo '<span style="color: darkred; font-size: 14px;">Edukasi diberikan kepada keluarga</strong><br></span>';
																										}
																										if ($row->edukasitidak == '1') {
																											echo '<span style="color: darkred; font-size: 14px;">Edukasi tidak diberikan, karena </strong></span>';
																											echo '<span style="color: darkred; font-size: 14px;">' . $row->edukasitidakkarena . '<br></span>';
																											
																										}
																									}

																									echo '<br>';
																									echo '<span style="color: darkred; font-size: 14px;">Kondisi Pulang</strong><br></span>';

																									if ($row->membaik == 1) {
																										echo '<span style="color: darkred; font-size: 14px;">Membaik</strong><br></span>';
																									}
																									if ($row->memburuk == 1) {
																										echo '<span style="color: darkred; font-size: 14px;">Memburuk</strong><br></span>';
																									}
																									if ($row->tetap == 1) {
																										echo '<span style="color: darkred; font-size: 14px;">Tetap, Sama saat Masuk RS</strong><br></span>';
																									}
																									if ($row->meninggal == 1) {
																										// echo '<span style="color: darkred; font-size: 14px;">Meninggal</strong><br></span>';
																										echo '<span style="color: darkred; font-size: 14px;"> Meninggal, pada jam :' . $row->jammeninggal . '<br></span>';
																									}
																									if ($row->doa == 1) {
																										echo '<span style="color: darkred; font-size: 14px;">Death On Arrival</strong><br></span>';
																									}
																									echo '<br>';
																									echo '<span style="color: darkred; font-size: 14px;">Tanda Vital</strong><br></span>';
																									echo '<span style="color: darkred; font-size: 14px;"> Tekanan Darah :' . $row->pulangtd . '<br></span>';
																									echo '<span style="color: darkred; font-size: 14px;"> Nadi :' . $row->pulangnadi . '<br></span>';
																									echo '<span style="color: darkred; font-size: 14px;"> RR :' . $row->pulangrr . '<br></span>';
																									echo '<span style="color: darkred; font-size: 14px;"> Suhu :' . $row->pulangs . '<br></span>';
																								echo "<br>";	
																								?>
																							</td>
																						<tr>
																					<?php
																						}}
																				?>
																			</tbody>
																		</table>
																	</div>
													<!-- ====== -->
												</div>
											</div>
									</div>
								</div>
								</div>

							</div>
							<div class="tab-pane fade" id="triase" role="tabpanel2" aria-labelledby="subtabtriase">
								<!-- <table border="1" width="100%"> -->
								<div class="card">
								<div class="col-12 ml-3">
									<label style="font-size: 14px; font-weight: bold; color: black; margin-top:20px">TRIASE</label>
									<table border="1" width="90%" style="border-color: black;">
										<tr>
											<td rowspan="2"></td>
											<td colspan="2" width="36%"
												style=" font-size: 15px; text-align: center; background-color: #F25E4C; color: white; height: 30px;">
												PRIORITAS I</td>
											<td colspan="2" width="36%"
												style=" font-size: 15px; text-align: center; background-color: yellow; color: black;">
												PRIORITAS II</td>
											<td style=" font-size: 15px; text-align: center; background-color: green; color: white;">
												PRIOROTAS III</td>
										</tr>

										<tr>
											<td
												style=" font-size: 13px; height:80px; background-color: #F25E4C; color: white; text-align: center;">
												<input class="state icheckbox_square-red" type="checkbox" id="kategori1" <?php echo ($dttriase->kategori1 == 1) ? "checked" : ""; ?>> Kategori 1<br> Resusitasi<br> Respon
												Time : 0
											</td>
											<td
												style=" font-size: 13px; height:80px; background-color: #F25E4C; color: white; text-align: center;">
												<input class="state icheckbox_square-red" type="checkbox" id="kategori2" <?php echo ($dttriase->kategori2 == 1) ? "checked" : ""; ?>> Kategori 2<br>Emergency / Gawat
												Darurat<br> Respon Time : 1 - 3 Menit</td>
											<td
												style=" font-size: 13px; height:80px; background-color: yellow; color: black; text-align: center;">
												<input class="state icheckbox_square-red" type="checkbox" id="kategori3" <?php echo ($dttriase->kategori3 == 1) ? "checked" : ""; ?>> Kategori 1 <br>Urgen / Darurat<br>
												Respon Time : 3 - 5 Menit</td>
											<td
												style=" font-size: 13px; height:80px; background-color: yellow; color: black; text-align: center;">
												<input class="state icheckbox_square-red" type="checkbox" id="kategori4" <?php echo ($dttriase->kategori4 == 1) ? "checked" : ""; ?>> Kategori 2<br>Semi Darurat</td>
											<td
												style=" font-size: 13px; height:80px; background-color: green; color: white; text-align: center;">
												<input class="state icheckbox_square-red" type="checkbox" id="kategori5" <?php echo ($dttriase->kategori5 == 1) ? "checked" : ""; ?>> Tidak Darurat</td>
										</tr>
										<tr>
											<td width="10%"
												style=" font-size: 13px; padding-left: 15px; background-color: #CFD1CF; height:90px;">
												AIRWAY</td>
											<td width="18%"
												style="font-size: 13px; padding-left: 30px; background-color: #F25E4C; color: white;">
												<div style="margin-bottom: 6px;">
													<input class="state icheckbox_square-red" type="checkbox" id="airway11" <?php echo ($dttriase->airway11 == 1) ? "checked" : ""; ?> value="total"> Sumbatan Total
												</div>
												<div>
													<input class="state icheckbox_square-red" type="checkbox" id="airway12" <?php echo ($dttriase->airway12 == 1) ? "checked" : ""; ?> value="sebagian"> Sumbatan Sebagian
												</div>
											</td>

											<td width="18%"
												style="font-size: 13px; padding-left: 30px; background-color: #F25E4C; color: white;">
												<div style="margin-bottom: 15px;">
													<input class="state icheckbox_square-red" type="checkbox" id="airway21" <?php echo ($dttriase->airway21 == 1) ? "checked" : ""; ?> value="total"
														style="font-size: 13px;"> Paten
												</div>
											</td>

											<td width="18%"
												style="font-size: 13px; padding-left: 30px; background-color: yellow; color: black;">
												<div style="margin-bottom: 15px;">
													<input class="state icheckbox_square-red" type="checkbox" id="airway31" <?php echo ($dttriase->airway31 == 1) ? "checked" : ""; ?> value="total"> Paten
												</div>
											</td>

											<td width="18%"
												style="font-size: 13px; padding-left: 30px; background-color: yellow; color: black;">
												<div style="margin-bottom: 15px;">
													<input class="state icheckbox_square-red" type="checkbox" id="airway41" <?php echo ($dttriase->airway41 == 1) ? "checked" : ""; ?> value="total"> Paten
												</div>
											</td>

											<td width="18%"
												style="font-size: 13px; padding-left: 30px; background-color: green; color: white;">
												<div style="margin-bottom: 15px;">
													<input class="state icheckbox_square-red" type="checkbox" id="airway51" <?php echo ($dttriase->airway51 == 1) ? "checked" : ""; ?> value="total"> Paten
												</div>
											</td>


										</tr>
										<tr>
											<td width="10%"
												style=" font-size: 13px; padding-left: 15px; background-color: #CFD1CF; height:90px;">
												BREATHING</td>

											<td width="18%"
												style="font-size: 13px; padding-left: 30px; background-color: #F25E4C; color: white; margin-top: 15px;">
												Distres Pernapasan Berat<br>
												<input class="state icheckbox_square-red" type="checkbox" id="breathing11" <?php echo ($dttriase->breathing11 == 1) ? "checked" : ""; ?> value="total"
													style="font-size: 13px; margin-bottom: 10px; margin-top: 10px;"> Sumbatan Total
												<br>
												<input class="state icheckbox_square-red" type="checkbox" id="breathing12" <?php echo ($dttriase->breathing12 == 1) ? "checked" : ""; ?> value="sebagian"> Sumbatan Sebagian
											</td>

											<td width="18%"
												style="font-size: 13px; padding-left: 30px; background-color: #F25E4C; color: white; margin-top: 15px;">
												Distres Pernapasan Sedang<br>
												<input class="state icheckbox_square-red" type="checkbox" id="breathing21" <?php echo ($dttriase->breathing21 == 1) ? "checked" : ""; ?> value="total"
													style="font-size: 13px; margin-bottom: 10px; margin-top: 10px;"> RR > 30x / menit
												<br>
												<input class="state icheckbox_square-red" type="checkbox" id="breathing22" <?php echo ($dttriase->breathing22 == 1) ? "checked" : ""; ?> value="sebagian"> Penggunaan otot
												bantu napas
											</td>

											<td width="18%"
												style="font-size: 13px; padding-left: 30px; background-color: yellow; color: black; margin-top: 15px;">
												Distres Pernapasan Ringan<br>
												<input class="state icheckbox_square-red" type="checkbox" id="breathing31" <?php echo ($dttriase->breathing31 == 1) ? "checked" : ""; ?> value="total"
													style="font-size: 13px; margin-bottom: 10px; margin-top: 10px;"> RR > 30x / menit
											</td>

											<td width="18%"
												style="font-size: 13px; padding-left: 30px; background-color: yellow; color: black; margin-top: 15px;">
												Tidak ada Distres Pernapasan<br>
												<input class="state icheckbox_square-red" type="checkbox" id="breathing41" <?php echo ($dttriase->breathing41 == 1) ? "checked" : ""; ?> value="total"
													style="font-size: 13px; margin-bottom: 10px; margin-top: 10px;"> RR > Normal
											</td>

											<td width="18%"
												style="font-size: 13px; padding-left: 30px; background-color: green; color: white; margin-top: 15px;">
												<br>
												<input class="state icheckbox_square-red" type="checkbox" id="breathing51" <?php echo ($dttriase->breathing51 == 1) ? "checked" : ""; ?> value="total"
													style="font-size: 13px; margin-bottom: 10px; margin-top: 10px;"> RR > Normal
											</td>


										</tr>
										<tr>
											<td width="10%"
												style=" font-size: 13px; padding-left: 15px; background-color: #CFD1CF; height:90px;">
												CIRCULATION</td>
											<td width="18%"
												style=" font-size: 13px; padding-left: 30px; background-color: #F25E4C; color: white; margin-top: 15px;">
												Gangguan Hemodinamik Berat<br>
												<input class="state icheckbox_square-red" type="checkbox" id="circulation11" <?php echo ($dttriase->circulation11 == 1) ? "checked" : ""; ?> value="total"
													style=" font-size: 13px; margin-bottom: 10px; margin-top: 10px"> Nadi Tidak Teraba
												<br>
												<input class="state icheckbox_square-red" type="checkbox" id="circulation12" <?php echo ($dttriase->circulation12 == 1) ? "checked" : ""; ?> value="sebagian"> Pendarahan yang
												tidak terkontrol / pendarahan aktif
											</td>
											<td width="18%"
												style=" font-size: 13px; padding-left: 30px; background-color: #F25E4C; color: white; margin-top: 15px;">
												Gangguan Hemodinamik Sedang<br>
												<input class="state icheckbox_square-red" type="checkbox" id="circulation21" <?php echo ($dttriase->circulation21 == 1) ? "checked" : ""; ?> value="total"
													style=" font-size: 13px; margin-bottom: 10px; margin-top: 10px"> Nadi Tidak Teraba /
												Sangat Halus
												<br>
												<input class="state icheckbox_square-red" type="checkbox" id="circulation22" <?php echo ($dttriase->circulation22 == 1) ? "checked" : ""; ?> value="sebagian"> Pendarahan
												kapiler > 2 detik
											</td>

											<td width="18%"
												style=" font-size: 13px; padding-left: 30px; background-color: yellow; color: b;lack margin-top: 15px;">
												Gangguan Hemodinamik Ringan<br>
												<input class="state icheckbox_square-red" type="checkbox" id="circulation31" <?php echo ($dttriase->circulation31 == 1) ? "checked" : ""; ?> value="total"
													style=" font-size: 13px; margin-bottom: 10px; margin-top: 10px"> Nadi Teraba (Lemah
												- Kuat)
												<br>
												<input class="state icheckbox_square-red" type="checkbox" id="circulation32" <?php echo ($dttriase->circulation32 == 1) ? "checked" : ""; ?> value="sebagian"> Pendarahan
												kapiler < 2 detik </td>

											<td width="18%"
												style=" font-size: 13px; padding-left: 30px; background-color: yellow; color: black; margin-top: 15px;">
												Tidak ada gangguan Gangguan Hemodinamik<br>
												<input class="state icheckbox_square-red" type="checkbox" id="circulation41" <?php echo ($dttriase->circulation41 == 1) ? "checked" : ""; ?> value="total"
													style=" font-size: 13px; margin-bottom: 10px; margin-top: 10px"> Nadi Teraba
											</td>
											<td width="18%"
												style=" font-size: 13px; padding-left: 30px; background-color: green; color: white; margin-top: 15px;">
												Tidak ada gangguan Gangguan Hemodinamik<br>
												<input class="state icheckbox_square-red" type="checkbox" id="circulation51" <?php echo ($dttriase->circulation51 == 1) ? "checked" : ""; ?> value="total"
													style=" font-size: 13px; margin-bottom: 10px; margin-top: 10px"> Nadi Normal
											</td>
										</tr>
										<tr>
											<td width="10%"
												style=" font-size: 13px; padding-left: 15px; background-color: #CFD1CF; height:90px;">
												DISABILITY</td>
											<td width="18%"
												style="font-size: 13px; padding-left: 30px; background-color: #F25E4C; color: white;">
												<input class="state icheckbox_square-red" type="checkbox" id="disability11" <?php echo ($dttriase->disability11 == 1) ? "checked" : ""; ?> value="total"> GCS &lt; 9
											</td>

											<td width="18%"
												style="font-size: 13px; padding-left: 30px; background-color: #F25E4C; color: white;">
												<input class="state icheckbox_square-red" type="checkbox" id="disability21" <?php echo ($dttriase->disability21 == 1) ? "checked" : ""; ?> value="total"> GCS 9 - 12
											</td>

											<td width="18%"
												style="font-size: 13px; padding-left: 30px; background-color: yellow; color: black;">
												<input class="state icheckbox_square-red" type="checkbox" id="disability31" <?php echo ($dttriase->disability31 == 1) ? "checked" : ""; ?> value="total"> GCS 12 - 14
											</td>

											<td width="18%"
												style="font-size: 13px; padding-left: 30px; background-color: yellow; color: black;">
												<input class="state icheckbox_square-red" type="checkbox" id="disability41" <?php echo ($dttriase->disability41 == 1) ? "checked" : ""; ?> value="total"> GCS 12 - 14
											</td>

											<td width="18%"
												style="font-size: 13px; padding-left: 30px; background-color: green; color: white;">
												<input class="state icheckbox_square-red" type="checkbox" id="disability51" <?php echo ($dttriase->disability51 == 1) ? "checked" : ""; ?> value="total"> GCS Normal
											</td>
										</tr>
										<tr>
											<td width="10%"
												style=" font-size: 13px; padding-left: 15px; background-color: #CFD1CF; height:90px;">
												CONTOH PASIEN</td>
											<td colspan="2" width="36%"
												style=" font-size: 13px; padding-left: 30px; background-color: #F25E4C; color: white;">
												Syok, Gangguan pernapasan, cidera kepala dengan pupil anisokor<br>Gangguan jantung yang
												mengancam, luka bakar > 50% di daerah toraks</td>
											<td colspan="2" width="36%"
												style=" font-size: 13px; padding-left: 30px; background-color: yellow; color: black;">
												Korban resiko syok, fraktur multiple, aktur femur, luka bakar</td>
											<td colspan="2" width="18%"
												style=" font-size: 13px; padding-left: 30px; background-color: green; color: white;">
												Fraktur minor, luka minor <br>atau tanpa luka</td>
										</tr>
									</table>
									<br>
									<div class="row">
										<div class="col-6 text-left">
											<button onclick="savetriase()" class="btn btn-primary"
												data-bs-dismiss="modal">Simpan</button>

										</div>
										<div class="col-6">
											<!-- <button onclick="Batal()" class="btn btn-danger">Batal Save</button> -->
										</div>
									</div>
									<br>
									<br>
									<br>
								</div> 
								<!-- col-12 -->
								</div>
							</div>

							<!-- assesmen awal medis -->
							<div class="tab-pane fade" id="awalmedis" role="tabpanel2" aria-labelledby="subtabawalmedis">
								<div class="card">
									<div class="col-12 ml-3">
										subtab awal medis
									</div>
								</div>
							</div>

							<div class="tab-pane fade" id="awalkep" role="tabpanel2" aria-labelledby="subtabawalkep">
								assesmen awal keperawatan
							</div>

							<div class="tab-pane fade" id="rekonobat" role="tabpanel2" aria-labelledby="subtabrekonobat">
								rekonsiliasi obat
							</div>
						</div>
					</nav>	
				</div>	
				<!-- ======= end tab nav new ========== -->
			<div>
				<!-- hanya untuk meratakan saja -->
			</div>
		</div>
	</div>
</div>	

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
	var url= "<?php echo site_url(); ?>/rme/rme_igd";
    window.location.href = url;
}

function tambahterapi() {
	var no_rm = document.getElementById("no_rm").value;
	var notransaksi = document.getElementById("notransaksi").value;
	var kode_dokter = document.getElementById("kode_dokter").value;
	
		$.ajax({
			url: "<?php echo site_url();?>/rme/addrecordterapi",
			type: "GET",
			data : {
					no_rm : no_rm, 
					notransaksi : notransaksi, 
					kode_dokter : kode_dokter, 
					},
					success: function (ajaxData){
					console.log(ajaxData);
					var dt = JSON.parse(ajaxData);
					$("#tabelterapi tbody tr").remove();
					$("#tabelterapi tbody").append(dt.dtview);
					},
					error: function (ajaxData) {
						console.log(ajaxData);
					}
		}); 	
}

function bukaformterapi(id,kodeDokter) {
	var no_rm = document.getElementById("no_rm").value;
	var kode_dokter = document.getElementById("kode_dokter").value;
	if (kode_dokter == kodeDokter) {
		$.ajax({
			url: "<?php echo site_url();?>/rme/panggilformterapi",
			type: "GET",
			data : {
					id : id, 
					kode_dokter : kode_dokter, 
					no_rm : no_rm
					},
			success : function(ajaxData){
				// console.log(ajaxData);
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
	} else {
		swal({
			// title: "opps",
			text: "Tidak bisa melakukan perubahan SOAP \n dari dokter lain",
			icon: "error",
			button: true
		});
	}
}

function bukaformterapi(id,kodeDokter) {
	var no_rm = document.getElementById("no_rm").value;
	var notransaksi = document.getElementById("kode_dokter").value;
		$.ajax({
			url: "<?php echo site_url();?>/rme/panggilformterapi",
			type: "GET",
			data : {
					id : id,
					no_rm : no_rm,
					notransaksi : notransaksi
					},
			success : function(ajaxData){
				// console.log(ajaxData);
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

function bukaFormResep(id) {
	var no_rm = document.getElementById("no_rm").value;
	var kode_dokter = document.getElementById("kode_dokter").value;
    $.ajax({
			url: "<?php echo site_url(); ?>/rme/pilihObatId",
			type: "GET",
			data: {
				id: id,
				no_rm : no_rm,
				kode_dokter : kode_dokter
			},
			success: function(ajaxData) {
				console.log(ajaxData);
				var array_data = JSON.parse(ajaxData);
				console.log(array_data);
			},
			error: function(ajaxData) {
				$.notify("Gagal Memproses Data", "error");
			}
	});

}

function addResep(id,kode_obat) {
	var no_rm = document.getElementById("no_rm").value;
	var kode_dokter = document.getElementById("kode_dokter").value;
	var notransaksi = document.getElementById("notransaksi").value;
	var kode_unit = document.getElementById("kode_unit").value;
	console.log(no_rm);
	console.log(kode_dokter);
	console.log(notransaksi);
    $.ajax({
			url: "<?php echo site_url(); ?>/rme/pilihObatId",
			type: "GET",
			data: {
				id: id,
				kode_obat : kode_obat,
				no_rm : no_rm,
				kode_dokter : kode_dokter,
				notransaksi : notransaksi,
				kode_unit : kode_unit
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

function tambahObat(id) {
    $.ajax({
			url: "<?php echo site_url(); ?>/rme/tambahOrderObat",
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

function tambahRacik(id) {
	var kode_dokter = document.getElementById("kode_dokter").value;
	// alert(kode_dokter);
    $.ajax({
			url: "<?php echo site_url(); ?>/rme/tambahOrderRacikan",
			type: "GET",
			data: {
				id: id,
				kode_dokter : kode_dokter
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

function openAssesmenForm(id) {
	var no_rm = document.getElementById("no_rm").value;
		$.ajax({
			url: "<?php echo site_url();?>/rme/panggilAssesmen",
			type: "GET",
			data : {
					id : id, 
					no_rm : no_rm
					},
			success : function(ajaxData){
				// console.log(ajaxData);
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
				no_rm : no_rm,
				kode_dokter : kode_dokter,
				nama_dokter : nama_dokter,
				notransaksi : notransaksi,
				kode_unit : kode_unit,
				nama_unit : nama_unit,
				golongan : golongan,
				tgl_masuk : tgl_masuk
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


function bukaFormLab(id) {
    $.ajax({
			url: "<?php echo site_url(); ?>/rme/panggilFormLabRme",
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
				no_rm : no_rm,
				kode_dokter : kode_dokter,
				nama_dokter : nama_dokter,
				notransaksi : notransaksi,
				kode_unit : kode_unit,
				nama_unit : nama_unit,
				golongan : golongan,
				tgl_masuk : tgl_masuk
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


function bukaFormRad(id) {
    $.ajax({
			url: "<?php echo site_url(); ?>/rme/panggilFormRadRme",
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
				no_rm : no_rm,
				kode_dokter : kode_dokter,
				nama_dokter : nama_dokter,
				notransaksi : notransaksi,
				kode_unit : kode_unit,
				nama_unit : nama_unit,
				golongan : golongan,
				tgl_masuk : tgl_masuk
			},
			success: function(ajaxData) {
				console.log(ajaxData);
				var dt = JSON.parse(ajaxData);
				$("#orderdiag tbody tr").remove();
				$("#orderdiag tbody").append(dt.dtview);
			},
			error: function(ajaxData) {
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

function tambahMasterRacik() {
	var kode_dokter = document.getElementById("kode_dokter").value;
    $.ajax({
			url: "<?php echo site_url(); ?>/rme/tambahMasterRacikan",
			type: "GET",
			data: {
				kode_dokter : kode_dokter
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

function refreshTabelMasterRacik() {
	var kode_dokter = document.getElementById("kode_dokter").value;
    $.ajax({
			url: "<?php echo site_url(); ?>/rme/panggilMasterRacikDokter",
			type: "GET",
			data: {
				kode_dokter : kode_dokter
			},
			success: function(ajaxData) {
				console.log(ajaxData);
				    var dt = JSON.parse(ajaxData);
                    $("#datamasterracik tbody tr").remove();
                    $("#datamasterracik tbody").append(dt.dtview);
			},
			error: function(ajaxData) {
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
				kode_dokter : kode_dokter,
				kode_racikan : kode_racikan
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
				no_rm : no_rm,
				kode_dokter : kode_dokter,
				nama_dokter : nama_dokter,
				notransaksi : notransaksi,
				kode_unit : kode_unit,
				nama_unit : nama_unit,
				golongan : golongan,
				tanggal : tanggal
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

function jawabkonsul(id) {
    $.ajax({
			url: "<?php echo site_url(); ?>/rme/jawabkonsul",
			type: "GET",
			data: {
				id : id
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



function editisiankonsul(id) {
    $.ajax({
			url: "<?php echo site_url(); ?>/rme/editisikonsul",
			type: "GET",
			data: {
				id : id
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



function bukaFormHasilRAD(id) {
    // Buat URL untuk cetak berdasarkan ID
    var url = "<?php echo site_url(); ?>/iradiologi/layananhasilcetak_rme/" + id;

    // Buka URL dalam tab atau jendela baru
    window.open(url, '_blank');
}


// ========== cari resep ==========
document.getElementById('cari').addEventListener('input', function() {
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
document.getElementById('carilab').addEventListener('input', function() {
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
document.getElementById('carirad').addEventListener('input', function() {
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

<script>
function panggilFormTriase(no_rm,notransaksi) {
	$.ajax({
			url: "<?php echo site_url(); ?>/rme/panggilFormTriase",
			type: "GET",
			data: {
				no_rm : no_rm,
				notransaksi : notransaksi
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

function panggilFormAsesmenMedis(no_rm,notransaksi) {
	$.ajax({
			url: "<?php echo site_url(); ?>/rme/panggilFormAsesmenMedis",
			type: "GET",
			data: {
				no_rm : no_rm,
				notransaksi : notransaksi
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

function panggilFormAsesmenKeperawatan(no_rm,notransaksi) {
	$.ajax({
			url: "<?php echo site_url(); ?>/rme/panggilFormAsesmenKeperawatan",
			type: "GET",
			data: {
				no_rm : no_rm,
				notransaksi : notransaksi
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


function tambahdata() {
	var no_rm = document.getElementById("no_rm").value;
	var notransaksi = document.getElementById("notransaksi").value;
	
		$.ajax({
			url: "<?php echo site_url();?>/rme/addrecordtindakan",
			type: "GET",
			data : {
					no_rm : no_rm, 
					notransaksi : notransaksi, 
					},
					success: function (ajaxData){
					console.log(ajaxData);
					var dt = JSON.parse(ajaxData);
					$("#tabeltindakan tbody tr").remove();
					$("#tabeltindakan tbody").append(dt.dtview);
					},
					error: function (ajaxData) {
						console.log(ajaxData);
					}
		}); 	
}

function tambahdataobat() {
	var no_rm = document.getElementById("no_rm").value;
	var notransaksi = document.getElementById("notransaksi").value;
	
		$.ajax({
			url: "<?php echo site_url();?>/rme/addrecordobat",
			type: "GET",
			data : {
					no_rm : no_rm, 
					notransaksi : notransaksi, 
					},
					success: function (ajaxData){
					console.log(ajaxData);
					var dt = JSON.parse(ajaxData);
					$("#tabelobatinfus tbody tr").remove();
					$("#tabelobatinfus tbody").append(dt.dtview);
					},
					error: function (ajaxData) {
						console.log(ajaxData);
					}
		}); 	
}

function openform(id) {
	var no_rm = document.getElementById("no_rm").value;
	var notransaksi = document.getElementById("kode_dokter").value;
		$.ajax({
			url: "<?php echo site_url();?>/rme/panggilformtindakan",
			type: "GET",
			data : {
					id : id,
					no_rm : no_rm,
					notransaksi : notransaksi
					},
			success : function(ajaxData){
				// console.log(ajaxData);
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

function openformobatinfus(id) {
	var no_rm = document.getElementById("no_rm").value;
	var notransaksi = document.getElementById("kode_dokter").value;
		$.ajax({
			url: "<?php echo site_url();?>/rme/panggilformobatinfus",
			type: "GET",
			data : {
					id : id,
					no_rm : no_rm,
					notransaksi : notransaksi
					},
			success : function(ajaxData){
				// console.log(ajaxData);
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


</script>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Ambil semua elemen tab dengan class "nav-link"
        const tabs = document.querySelectorAll(".nav-link");

        // Tambahkan event click pada setiap elemen tab
        tabs.forEach(tab => {
            tab.addEventListener("click", function(event) {
                // Hentikan aksi default agar tab tidak mengarahkan ke halaman lain
                event.preventDefault();

                // Hapus class "active" dari semua tab terlebih dahulu
                tabs.forEach(t => t.classList.remove("active"));

                // Tambahkan class "active" ke tab yang sedang diklik
                tab.classList.add("active");

                // Ambil ID tab yang sedang aktif
                const activeTabId = tab.getAttribute("href").substring(1);

                // Ambil semua konten tab
                const tabContents = document.querySelectorAll(".tab-content .tab-pane");

                // Sembunyikan semua konten tab terlebih dahulu
                tabContents.forEach(content => content.classList.remove("show", "active"));

                // Tampilkan konten tab yang sesuai dengan tab yang sedang aktif
                document.getElementById(activeTabId).classList.add("show", "active");

                // Reset warna latar belakang dan warna teks untuk semua tab
                tabs.forEach(t => {
                    t.style.backgroundColor = "";
                    t.style.color = "";
                });

                // Atur warna latar belakang dan warna teks untuk tab yang sedang diklik
                if (tab.classList.contains("active")) {
                    tab.style.backgroundColor = "#566573";
                    tab.style.color = "#fff";
                }
            });
        });
    });
</script>



<script>
    function savetriase() {
        var no_rm = document.getElementById("no_rm").value;
        var kode_dokter = document.getElementById("kode_dokter").value;
        var notransaksi = document.getElementById("notransaksi").value;

        var kategori1 = $("#kategori1").prop("checked") ? 1 : 0;
        var kategori2 = $("#kategori2").prop("checked") ? 1 : 0;
        var kategori3 = $("#kategori3").prop("checked") ? 1 : 0;
        var kategori4 = $("#kategori4").prop("checked") ? 1 : 0;
        var kategori5 = $("#kategori5").prop("checked") ? 1 : 0;
        var airway11 = $("#airway11").prop("checked") ? 1 : 0;
        var airway12 = $("#airway12").prop("checked") ? 1 : 0;
        var airway21 = $("#airway21").prop("checked") ? 1 : 0;
        var airway31 = $("#airway31").prop("checked") ? 1 : 0;
        var airway41 = $("#airway41").prop("checked") ? 1 : 0;
        var airway51 = $("#airway51").prop("checked") ? 1 : 0;
        var breathing11 = $("#breathing11").prop("checked") ? 1 : 0;
        var breathing12 = $("#breathing12").prop("checked") ? 1 : 0;
        var breathing21 = $("#breathing21").prop("checked") ? 1 : 0;
        var breathing22 = $("#breathing22").prop("checked") ? 1 : 0;
        var breathing31 = $("#breathing31").prop("checked") ? 1 : 0;
        var breathing41 = $("#breathing41").prop("checked") ? 1 : 0;
        var breathing51 = $("#breathing51").prop("checked") ? 1 : 0;
        var circulation11 = $("#circulation11").prop("checked") ? 1 : 0;
        var circulation12 = $("#circulation12").prop("checked") ? 1 : 0;
        var circulation21 = $("#circulation21").prop("checked") ? 1 : 0;
        var circulation22 = $("#circulation22").prop("checked") ? 1 : 0;
        var circulation31 = $("#circulation31").prop("checked") ? 1 : 0;
        var circulation32 = $("#circulation32").prop("checked") ? 1 : 0;
        var circulation41 = $("#circulation41").prop("checked") ? 1 : 0;
        var circulation51 = $("#circulation51").prop("checked") ? 1 : 0;
        var disability11 = $("#disability11").prop("checked") ? 1 : 0;
        var disability21 = $("#disability21").prop("checked") ? 1 : 0;
        var disability31 = $("#disability31").prop("checked") ? 1 : 0;
        var disability41 = $("#disability41").prop("checked") ? 1 : 0;
        var disability51 = $("#disability51").prop("checked") ? 1 : 0;
        $.ajax({
            url: "<?php echo site_url(); ?>/rme/savetriase",
            type: "GET",
            data: {
                no_rm: no_rm,
                kode_dokter: kode_dokter,
                notransaksi: notransaksi,
                kategori1: kategori1,
                kategori2: kategori2,
                kategori3: kategori3,
                kategori4: kategori4,
                kategori5: kategori5,
                airway11: airway11,
                airway12: airway12,
                airway21: airway21,
                airway31: airway31,
                airway41: airway41,
                airway51: airway51,
                breathing11: breathing11,
                breathing12: breathing12,
                breathing21: breathing21,
                breathing22: breathing22,
                breathing31: breathing31,
                breathing41: breathing41,
                breathing51: breathing51,
                circulation11: circulation11,
                circulation12: circulation12,
                circulation21: circulation21,
                circulation22: circulation22,
                circulation31: circulation31,
                circulation32: circulation32,
                circulation41: circulation41,
                circulation51: circulation51,
                disability11: disability11,
                disability21: disability21,
                disability31: disability31,
                disability41: disability41,
                disability51: disability51
            },
            success: function (ajaxData) {
                swal('Simpan Data Triase Berhasil');
            },
            error: function (ajaxData) {
                swal('Simpan Data Triase Gagal');
            }
        });
    }

</script>