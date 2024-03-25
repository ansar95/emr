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
							<input class="form-control" id="notransaksi" type="hidden" value="<?php echo $dataPasien->notransaksi; ?>">
							<input class="form-control" id="no_rm" type="hidden" value="<?php echo $dataPasien->no_rm; ?>">
							<input class="form-control" id="no_askes" type="hidden" value="<?php echo $dataPasien->no_askes; ?>">
							<!-- <input class="form-control" id="kode_dokter" type="text" value="<?php echo $dataPasien->kode_dokter; ?>"> -->
							<!-- <input class="form-control" id="nama_dokter" type="text" value="<?php echo $dataPasien->nama_dokter; ?>"> -->

							<input class="form-control" id="kode_dokter" type="hidden" value="<?php echo $this->session->userdata("kodedokter"); ?>">
							<input class="form-control" id="kode_dokter" type="hidden" value="<?php echo $this->session->userdata("user"); ?>">
							<input class="form-control" id="nama_dokter" type="hidden" value="<?php echo $this->session->userdata("nama"); ?>">
							<input class="form-control" id="username" type="hidden" value="<?php echo $this->session->userdata("nmuser"); ?>">
							<input class="form-control" id="editing" type="hidden" value="<?php echo $editing; ?>">

							
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
            <!-- </div> -->

<br>

			<div class="tab-pane fade show" id="tabutama" role="tabpanel2">
				<nav>
					<div class="nav nav-tabs" id="subnav12" role="tablist2">
						<div class="nav-item" style="flex: 1;"></div>
						<a class="nav-item nav-link active" id="subtabutama" data-toggle="tab" href="#utama" role="tab" aria-controls="subnav12-1" aria-selected="true" style="background-color: #566573; color: white; border: 1px solid #ABB2B9;">Pelayanan</a>

						<a class="nav-item nav-link" id="subtabresume" data-toggle="tab" href="#resume" role="tab" aria-controls="subnav12-10" aria-selected="false" style="border: 1px solid #ABB2B9;">Resume Medis</a>

						<a class="nav-item nav-link" id="subtabringkasan" data-toggle="tab" href="#ringkasan" role="tab" aria-controls="subnav12-2" aria-selected="false" style="border: 1px solid #ABB2B9;">Ringkasan Masuk/Keluar</a>

						<a class="nav-item nav-link" id="subtabrekonobat" data-toggle="tab" href="#rekonobat" role="tab" aria-controls="subnav12-3" aria-selected="false" style="border: 1px solid #ABB2B9;">Rekon.Obat</a>

						<a class="nav-item nav-link" id="subtabawalmedis" data-toggle="tab" href="#awalmedis" role="tab" aria-controls="subnav12-4" aria-selected="false" style="border: 1px solid #ABB2B9;">ASMED</a>

						<a class="nav-item nav-link" id="subtabawalkep" data-toggle="tab" href="#awalkep" role="tab" aria-controls="subnav12-5" aria-selected="false" style="border: 1px solid #ABB2B9;">ASKEP</a>

						<a class="nav-item nav-link" id="subtabjatuh" data-toggle="tab" href="#jatuh" role="tab" aria-controls="subnav12-6" aria-selected="false" style="border: 1px solid #ABB2B9;">Resiko Jatuh</a>

						<a class="nav-item nav-link" id="subtabedukasi" data-toggle="tab" href="#edukasi" role="tab" aria-controls="subnav12-7" aria-selected="false" style="border: 1px solid #ABB2B9;">Edukasi</a>

						<a class="nav-item nav-link" id="subtabpulang" data-toggle="tab" href="#pulang" role="tab" aria-controls="subnav12-8" aria-selected="false" style="border: 1px solid #ABB2B9;">Rencana Pulang</a>
						
						<a class="nav-item nav-link" id="subtabigd" data-toggle="tab" href="#igd" role="tab" aria-controls="subnav12-9" aria-selected="false" style="border: 1px solid #ABB2B9;">Histori IGD</a>
					</div>
					
					<div class="tab-content" id="subnav12-content">
						<div class="tab-pane fade" id="utama" role="tabpanel2" aria-labelledby="subtabutama">
							1111111
						</div>
						<div class="tab-pane fade" id="resume" role="tabpanel2" aria-labelledby="subtabresume">
							2
						</div>
						<div class="tab-pane fade" id="ringkasan" role="tabpanel2" aria-labelledby="subtabringkasan">
							3
						</div>
						<div class="tab-pane fade" id="rekonobat" role="tabpanel2" aria-labelledby="subtabrekonobat">
							4
						</div>
						<div class="tab-pane fade" id="awalmedis" role="tabpanel2" aria-labelledby="subtabawalmedis">
							5
						</div>
						<div class="tab-pane fade" id="awalkep" role="tabpanel2" aria-labelledby="subtabawalkep">
							6
						</div>
						<div class="tab-pane fade" id="jatuh" role="tabpanel2" aria-labelledby="subtabjatuh">
							7
						</div>
						<div class="tab-pane fade" id="edukasi" role="tabpanel2" aria-labelledby="subtabedukasi">
							8
						</div>	
						<div class="tab-pane fade" id="pulang" role="tabpanel2" aria-labelledby="subtabpulang">
							9
						</div>
						<div class="tab-pane fade" id="igd" role="tabpanel2" aria-labelledby="subtabigd">
							10
						</div>
					</div>
				</nav>
			</div>

<br>
<br>
<br>
<br>
<br>
			<div class="card">
				<div class="col-md-12">
					<div class="row spacing-row">
							<div class="col-md-3 mt-4 mb-5" id="soap">
								<div id="accordion2" class="accordion-alt" role="tablist">
										<div class="mb-2">
											<h6 class="mb-0">
												<a class="d-block border" data-toggle="collapse" href="#collapse4" aria-expanded="true" aria-controls="collapse4" style="background-color: #FFFFFF;">
													Form
												</a>
											</h6>
											<div id="collapse4" class="collapse" role="tabpanel" data-parent="#accordion2">
												<div class="table-responsive mt-2 table-hover table-scrollable" id="tabeltindakan" style="max-height: 600px; overflow-y: auto;">
												
													<div class="form-inline mt-2 ml-3">
														<button onclick="panggilFormAsesmenMedisRanap('<?php echo $dataPasien->no_rm; ?>', '<?php echo $dataPasien->notransaksi; ?>')" style="background-color: lightgreen; font-size: 14px;">Asesmen Awal Medis Rawat Inap</button>
													</div>

													<div class="form-inline mt-2 ml-3">
														<button onclick="panggilFormRingkasan('<?php echo $dataPasien->no_rm; ?>', '<?php echo $dataPasien->notransaksi; ?>')" style="background-color: lightgreen; font-size: 14px;">Ringkasan Masuk Kel;uar</button>
													</div>

													<div class="form-inline mt-2 ml-3">
														<!-- <label style="font-size: 14px; font-weight: bold; color: black;">+ Triase</label> -->
														<button onclick="panggilFormTriase('<?php echo $dataPasien->no_rm; ?>', '<?php echo $dataPasien->notransaksi; ?>')">IGD - Triase</button>
													</div>
													<div class="form-inline mt-2 ml-3">
														<!-- <label style="font-size: 14px; font-weight: bold; color: black;">+ Triase</label> -->
														<button onclick="panggilFormAsesmenMedis('<?php echo $dataPasien->no_rm; ?>', '<?php echo $dataPasien->notransaksi; ?>')">IGD - Asesmen Awal Medis</button>
													</div>

													<div class="form-inline mt-2 ml-3">
														<button onclick="panggilFormAsesmenKeperawatan('<?php echo $dataPasien->no_rm; ?>', '<?php echo $dataPasien->notransaksi; ?>')">IGD - Asesmen Awal Keperawatan</button>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div id="accordion3" class="accordion-alt" role="tablist">
										<div class="mb-2">
											<h6 class="mb-0">

												<a class="collapsed redial-dark d-block border redial-border-light" data-toggle="collapse" href="#collapse55" aria-expanded="false" aria-controls="collapse5" style="background-color: #FFFFFF;">
													Catatan Perkembangan Pasien (SOAP)
												</a>
											</h6>
											</h6>
											<div id="collapse5" class="collapse show" role="tabpanel"  data-parent="#accordion3">
												<!-- <div class="card-body"> -->
													<!-- <div class="table-responsive mt-2 table-hover table-scrollable" id="tabeltindakan">
														 -->
														 <button onclick="tambahsoap()" class="btn btn-sm btn-secondary ml-auto mb-2 mt-4" id="tambahsoap" name="tambahsoapbaru" style="background-color: #FF5733; color: white;">+ Tambah</button>

													<div class="table-responsive mt-2 table-hover table-scrollable" id="tabelsoap1" style="max-height: 600px; overflow-y: auto;">
														<table class="table" id="tabelsoap">
															<tbody>
																<?php
																if ($dtsoap == NULL) {
																?>
																	<tr>
																		<td colspan="100%" class="text-center">
																			Belum Ada Data
																		</td>
																	</tr>
																	<?php } else {
																	$no = 1;
																	$jmlt = 0;
																	foreach ($dtsoap as $row) {
																		// $kode_dokter_psoap=$row->kode_dokter;
																		// $kode_dokter_form_periksa=$dataPasien->kode_dokter;
																		// if ($kode_dokter_form_periksa == $kode_dokter_psoap) {
																		// 	$warnabackground="#FFFFFF";
																		// } else {
																		// 	$warnabackground="#B0C4DE";
																		// }
																		?>
																		<tr onclick="bukaformsoap('<?php echo $row->id;?>','<?php echo $row->user;?>')">
																			<td width="10%" valign="top">
																			</td>
																			<td width="90%" valign="top">
																				<?php 
																				echo '<strong style="color: Navy; font-size: 13px;">' . tanggaldua($row->tanggal).' | '.$row->jam.'</strong><br>';
																					if ($row->profesi != null) {echo '<span style="color: darkred;">Profesi : </span><strong>' . $row->profesi . '<br></strong>';} 
																					
																					if ($row->subjek != null) {echo '<span style="color: darkred;">Subjek : </span><strong>' . $row->subjek . '<br></strong>';} 
																					
																					if ($row->objek != null) {echo '<span style="color: darkred;">Objek : </span><strong>'.$row->objek . "<br></strong>";} 

																					if ($row->analisis != null) {echo '<span style="color: darkred;">Analisis : </span><strong>'.$row->analisis . "<br></strong>";} 

																					if ($row->plan != null) {echo '<span style="color: darkred;">Plan : </span><strong>'.$row->plan . "<br></strong>";} 

																					if ($row->instruksi != null) {echo '<span style="color: darkred;">Instruksi : </span><strong>'.$row->instruksi . "<br></strong>";} 

																					if ($row->user != null) {echo '<span style="color: darkred;">User : </span><strong>'.$row->user . "<br></strong>";} 
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
												<a class="collapsed redial-dark d-block border redial-border-light" data-toggle="collapse" href="#collapse55" aria-expanded="false" aria-controls="collapse5" style="background-color: #FFFFFF;">
													Asuhan Keperawatan
												</a>
											</h6>
											<div id="collapse55" class="collapse show" role="tabpanel"  data-parent="#accordion35">
													<button onclick="tambahdataasuhan()" class="btn btn-sm btn-secondary mt-3 ml-auto mb-2" id="tomboltambahdata" name="tomboltambahdata" style="background-color: #FF5733; color: white;">+ Tambah</button>
													
													<div class="table-responsive table-hover table-scrollable" id="tabelasuhan1" style="max-height: 600px; overflow-y: auto;">
															<table class="table" id="tabelasuhan">
																<tbody>
																	<?php
																	$no=100;
																	if ($dtasuhan== NULL) {
																	?>
																		<tr>
																			<td colspan="100%" class="text-left">
																				Belum Ada Data
																			</td>
																		</tr>
																		<?php } else {
																		$no = 100;
																		$jmlt = 0;
																		foreach ($dtasuhan as $row) {
																		?>	
																			<tr onclick="bukaformasuhan('<?php echo $row->id;?>','<?php echo $row->user;?>')">
																				<td width="10%">
																				</td>
																				<td width="90%">
																					<?php 
																					echo '<strong style="color: Navy; font-size: 13px;">' . tanggaldua($row->tanggal) .' | ' .$row->jam.'</strong><br>';
																						if ($row->implementasi != null) {echo '<span style="color: darkred;">Implementasi : </span><strong>' . $row->implementasi . '<br></strong>';} 

																						if ($row->evaluasi != null) {echo '<span style="color: darkred;">Evaluasi : </span><strong>' . $row->evaluasi . '<br></strong>';} 

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
									<div id="accordion3" class="accordion-alt" role="tablist">
										<div class="mb-2 mt-4">
											<h6 class="mb-0">
												<a class="collapsed redial-dark d-block border redial-border-light" data-toggle="collapse" href="#collapse5" aria-expanded="false" aria-controls="collapse5">
													Lembar Konsul
												</a>
											</h6>
											<div id="collapse5" class="collapse show" role="tabpanel"  data-parent="#accordion3">
													<div class="col-md-12 mt-1 text-right">
														<button onclick="tambahKonsul()" class="btn btn-sm btn-secondary ml-auto mt-1" id="tambahObatBaru" name="tambahObatBaru" style="background-color: #009933; color: white;">+ Tambah Konsul</button>
													</div>
													<div class="table-responsive mt-1 table-hover table-scrollable" id="tabellembarkonsul1" style="max-height: 600px; overflow-y: auto;">
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
																				echo '<span style="color: red; font-weight:1000;">'.$row->nama_unit.'</span>';
																				echo '<span style="color: black; font-weight:1000;">'.' | '.'</span>';
																				echo '<span style="color: navi; font-weight:1000;">'.$row->nama_dokter.'</span><br>';
																				echo '<strong style="color: #990000;">'.'ISI KONSUL : '.'</strong>';
																				if  ( trim($dataPasien->kode_dokter) == trim($row->kode_dokter)) {
																				?>
																					<button onclick="editisiankonsul('<?php echo $row->id;?>')" class="btn btn-sm" id="tomboleditisikonsul" name="tomboleditisikonsul" style="background-color: #FFFFFF; color: #330066;"><i class="icon-pencil" style="font-size: 14px;"></i></button>
																				<?php 
																				}
																				echo '<div style="margin-left: 15px; margin-top: 2px;"><em>' . $row->konsul . '</em></div>';
																				echo "<br>";
																				echo '<span style="color: navi; font-weight:1000;">'.'Untuk : '.$row->nama_dokter_jawab.'</span><br>';

																				if ( $row->jawaban != null) {
																					echo '<div style="margin-top: 10px;">'.'<strong style="color: #990000;">'.'JAWABAN KONSUL : '."</strong><br>";
																					// echo '<span style="color: navi; font-weight:1000;">'.$row->nama_dokter_jawab.'</span><br>';
																					echo '<div style="margin-left: 15px; margin-top: 5px;"><em>' . $row->jawaban . '</em></div><br>';
																				}
																				// if  ( trim($dataPasien->kode_dokter) == trim($row->kode_dokter_jawab)) {
																				?>
																					<button onclick="jawabkonsul('<?php echo $row->id;?>')" class="btn btn-sm mt-2" id="tomboleditRacikan" name="tomboleditRacikan" style="background-color: #330066; color: #FFFFFF;">Jawab</button><br>
																				<?php 
																				// } 
																				?>
																				<br><br>
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
								<!-- ======================== -->
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
																		<tr onclick="addDiagranap('<?php echo $row->id; ?>')">
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
											<a class="d-block border" data-toggle="collapse" href="#collapse47" aria-expanded="true" aria-controls="collapse47" style="color: black; background-color: #FFFFFF;">
												 Hasil Pemeriksaan
											</a>
										</h6>
										<div id="collapse47" class="collapse" role="tabpanel" data-parent="#accordion2">

											<label style="font-size: 14px; font-weight: bold; color: black; margin-top:20px">+ LABORATORIUM</label>
											<div class="table-responsive mt-2 table-hover table-scrollable" id="isihasillab1" style="max-height: 350px; overflow-y: auto;">
												<div class="table-responsive table-hover table-scrollable" id="isilab1">
													<table class="table" id="orderlab1" style="background-color: #EDF7C4;">
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
											<div class="table-responsive mt-1 table-hover table-scrollable" id="isihasillab1" style="max-height: 350px; overflow-y: auto;">
												<div class="table-responsive table-hover table-scrollable" id="isilab1">
													<table class="table" id="orderrad1" style="background-color: #D3F9D4;">
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
								<!-- =========== HISTORI IGD ========== -->
								<div id="accordion4712" class="accordion-alt" role="tablist" style="background-color: #FFFFFF;">
									<div class="mt-4">
										<h6 class="mb-0">
											<a class="d-block border" data-toggle="collapse" href="#collapse4712" aria-expanded="true" aria-controls="collapse4712" style="color: black;">
												 Histori IGD 
											</a>
										</h6>
										<div id="collapse4712" class="collapse" role="tabpanel" data-parent="#accordion2">
											<div class="form-inline mt-4">
												<label style="font-size: 14px; font-weight: bold; color: black;">+ Terapi / Tindakan Medis</label>
											</div>
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
																		<tr>
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
											<div class="form-inline mt-4">
												<label style="font-size: 14px; font-weight: bold; color: black;">+ Tindakan Terintegrasi Keperawatan</label>
											</div>


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
																			<tr>
																				<td width="10%">
																				</td>
																				<td width="90%">
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

											<div class="form-inline mt-4">
												<label style="font-size: 14px; font-weight: bold; color: black;">+ Pemberian Obat dan Infus</label>
											</div>
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
																			<tr>
																				<td width="10%">
																				</td>
																				<td width="90%">
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
									<button onclick="tambahDiagranap()" class="btn btn-sm btn-secondary ml-auto" id="tambahDiagBaru" name="tambahDiagBaru" style="background-color: #FF5733; color: white;">+ Diagnosa</button>
								</div>
								<div class="table-responsive mt-1 table-hover table-scrollable" id="isidiag1">
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
											<a class="d-block border" data-toggle="collapse" href="#collapse48" aria-expanded="true" aria-controls="collapse48" style="color: black; background-color: #FFFFFF;">
												Ringkasan Masuk dan Keluar
											</a>
										</h6>
									</div>
									<!-- ======= -->
									<div class="table-responsive mt-2 table-hover table-scrollable" id="tabeltindakan9" style="max-height: 700px; overflow-y: auto;">
														<!-- <table class="table" id="tabelkesimpulan">
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
														</table> -->
													</div>
									<!-- ====== -->
								</div>
							</div>

					</div>
				</div>
				<br>
				<br>
				<br>
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
	var url= "<?php echo site_url(); ?>/rme/rme_new";
    window.location.href = url;
}

function tambahsoap() {
	var no_rm = document.getElementById("no_rm").value;
	var notransaksi = document.getElementById("notransaksi").value;
	var kode_dokter = document.getElementById("kode_dokter").value;
	
		$.ajax({
			url: "<?php echo site_url();?>/rme/addrecordsoap",
			type: "GET",
			data : {
					no_rm : no_rm, 
					notransaksi : notransaksi, 
					kode_dokter : kode_dokter, 
					},
					success: function (ajaxData){
					console.log(ajaxData);
					var dt = JSON.parse(ajaxData);
					$("#tabelsoap tbody tr").remove();
					$("#tabelsoap tbody").append(dt.dtview);
					},
					error: function (ajaxData) {
						console.log(ajaxData);
					}
		}); 	
}

function bukaformsoap(id,user) {
	var no_rm = document.getElementById("no_rm").value;
	var username = document.getElementById("username").value;
	if (username == user) {
		$.ajax({
			url: "<?php echo site_url();?>/rme/panggilformsoap",
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
	} else {
		swal({
			// title: "opps",
			text: "Tidak bisa melakukan perubahan SOAP \n dari user lain",
			icon: "error",
			button: true
		});
	}
}

function bukaformasuhan(id,user) {
	var no_rm = document.getElementById("no_rm").value;
	var username = document.getElementById("username").value;
	if (username == user) {
		$.ajax({
			url: "<?php echo site_url();?>/rme/panggilformasuhan",
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
	} else {
		swal({
			// title: "opps",
			text: "Tidak bisa melakukan perubahan  \n dari user lain",
			icon: "error",
			button: true
		});
	}
}

// function bukaformterapi(id,kodeDokter) {
// 	var no_rm = document.getElementById("no_rm").value;
// 	var notransaksi = document.getElementById("kode_dokter").value;
// 		$.ajax({
// 			url: "<?php echo site_url();?>/rme/panggilformterapi",
// 			type: "GET",
// 			data : {
// 					id : id,
// 					no_rm : no_rm,
// 					notransaksi : notransaksi
// 					},
// 			success : function(ajaxData){
// 				// console.log(ajaxData);
// 				$("#formmodal").html(ajaxData);
//                     $("#formmodal").modal('show', {
//                         backdrop: 'true'
//                     });
//                     modaldetailtutup();
// 			},
// 			error: function(ajaxData) {
// 				$.notify("Gagal Memproses Data", "error");
// 			}
// 		}); 	
// }

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

function tambahDiagranap(id) {
    $.ajax({
			url: "<?php echo site_url(); ?>/rme/tambahOrderDiagranap",
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

function addDiagranap(id) {
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
			url: "<?php echo site_url(); ?>/rme/pilihDiagIdranap",
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
			url: "<?php echo site_url(); ?>/rme/FormTambahKonsulRanap",
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
			url: "<?php echo site_url(); ?>/rme/jawabkonsulranap",
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
			url: "<?php echo site_url(); ?>/rme/editisikonsulranap",
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

function panggilFormAsesmenMedisRanap(no_rm,notransaksi) {
	$.ajax({
			url: "<?php echo site_url(); ?>/rme/panggilFormAsesmenMedisRanap",
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


function tambahdataasuhan() {
	var no_rm = document.getElementById("no_rm").value;
	var notransaksi = document.getElementById("notransaksi").value;
	var kode_dokter = document.getElementById("kode_dokter").value;
	
		$.ajax({
			url: "<?php echo site_url();?>/rme/addrecordasuhan",
			type: "GET",
			data : {
					no_rm : no_rm, 
					notransaksi : notransaksi, 
					kode_dokter : kode_dokter, 
					},
					success: function (ajaxData){
					console.log(ajaxData);
					var dt = JSON.parse(ajaxData);
					$("#tabelasuhan tbody tr").remove();
					$("#tabelasuhan tbody").append(dt.dtview);
					},
					error: function (ajaxData) {
						console.log(ajaxData);
					}
		}); 	
}

</script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    var tabItems = document.querySelectorAll('.nav-item.nav-link');

    tabItems.forEach(function (tabItem) {
      tabItem.addEventListener('click', function () {
        tabItems.forEach(function (item) {
          item.classList.remove('active');
          item.style.backgroundColor = ''; // Hapus latar belakang
          item.style.color = ''; // Hapus warna teks
        });

        tabItem.classList.add('active');
        tabItem.style.backgroundColor = '#566573'; // Atur latar belakang menjadi hitam
        tabItem.style.color = 'white'; // Atur warna teks menjadi putih
      });
    });
  });
</script>