<head>

        <!-- START: Template CSS-->
        <!-- <link rel="stylesheet" href="../../assets/template_baru/dist/vendors/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../assets/template_baru/dist/vendors/jquery-ui/jquery-ui.min.css">
        <link rel="stylesheet" href="../../assets/template_baru/dist/vendors/jquery-ui/jquery-ui.theme.min.css">
        <link rel="stylesheet" href="../../assets/template_baru/dist/vendors/simple-line-icons/css/simple-line-icons.css">        
        <link rel="stylesheet" href="../../assets/template_baru/dist/vendors/flags-icon/css/flag-icon.min.css">  -->

        <!-- END Template CSS-->  

        <!-- START: Page CSS-->
        <link rel="stylesheet" href="../../assets/template_baru/dist/vendors/icheck/skins/all.css" >
        <!-- END: Page CSS-->

        <!-- START: Custom CSS-->
        <!-- <link rel="stylesheet" href="../../assets/template_baru/dist/css/main.css"> -->
        <!-- END: Custom CSS-->
    </head>
    <!-- END Head-->

    <!-- START: Body-->    
<body class="default">
        <!-- START: Pre Loader-->
        <div class="se-pre-con">
            <div class="loader"></div>
        </div>



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
				<div class="card" style="background-color: #808000;">
					<div class="row spacing-row">
						<div class="col-md-11">
							<div class="card-body">
								<input class="form-control" id="notransaksi" type="hidden" value="<?php echo $dataPasien->notransaksi; ?>">
								<input class="form-control" id="no_rm" type="hidden" value="<?php echo $dataPasien->no_rm; ?>">
								<input class="form-control" id="no_askes" type="hidden" value="<?php echo $dataPasien->no_askes; ?>">
								<input class="form-control" id="kode_dokter" type="hidden" value="<?php echo $dataPasien->kode_dokter; ?>">
								<input class="form-control" id="nama_dokter" type="hidden" value="<?php echo $dataPasien->nama_dokter; ?>">
								<input class="form-control" id="kode_unit" type="hidden" value="<?php echo $dataPasien->kode_unit; ?>">
								<input class="form-control" id="nama_unit" type="hidden" value="<?php echo $dataPasien->nama_unit; ?>">
								<input class="form-control" id="golongan" type="hidden" value="<?php echo $dataPasien->golongan; ?>">
								<input class="form-control" id="tgl_masuk" type="hidden" value="<?php echo $dataPasien->tgl_masuk; ?>">
								<p>
									<span style="display: inline; font-weight: bold; font-size: 20px; color: white;"><?php echo $dataPasien->no_rm.' | '.$nama_pasien; ?></span><br>
									<span style="display: inline;font-weight: bold; font-size: 14px; color: white;"><?php echo $dataPasien->golongan.' | No.Kartu : '.$dataPasien->no_askes.' | NIK : '.$dataPasien->nik.' | Alamat : '.$dataPasien->alamat.' | Trx : '.$dataPasien->notransaksi.' | No.Antrian : '.$dataPasien->no_antrian; ?></span><br>
								</p>
							</div>
						</div>
						<div class="col-md-1">
							<button class="btn btn-light mt-4" onclick="kembaliKeRmeNew()">Kembali</button>
						</div>
					</div>
				</div>
				<nav>
					<div class="nav nav-tabs font-weight-bold border-bottom mt-3" id="nav-tab" role="tablist">

						<a class="nav-item nav-link active" id="tabtriase1" data-toggle="tab" href="#tabtriase" role="tab" aria-controls="nav-home" aria-selected="true" style="background-color: #3366CC; color: white;">TRIASE PASIEN</a>
						<a class="nav-item nav-link" id="tabasesmenawalmedis1" data-toggle="tab" href="#tabasesmenawalmedis" role="tab" aria-controls="nav-profile" aria-selected="false" style="background-color: #66CC33; color: white;">ASESMEN AWAL MEDIS</a>
						<a class="nav-item nav-link" id="tabasesmenawalkeperawatan1" data-toggle="tab" href="#tabasesmenawalkeperawatan" role="tab" aria-controls="nav-contact" aria-selected="false" style="background-color: #FF9933; color: white;">ASESMEN AWAL KEPERAWATAN</a>
						<a class="nav-item nav-link" id="tabpersalinan1" data-toggle="tab" href="#tabpersalinan" role="tab" aria-controls="nav-contact" aria-selected="false" style="background-color: #CC3366; color: white;">PERSALINAN</a>
						<a class="nav-item nav-link" id="tabrekonsoliasiobat1" data-toggle="tab" href="#tabrekonsoliasiobat" role="tab" aria-controls="nav-contact" aria-selected="false" style="background-color: #9933CC; color: white;">REKONSILIASI OBAT</a>
					</div>
					<div class="tab-content mt-3" id="nav-tabContent">
						<!-- ================== triase ====================== -->
						<!-- <div class="tab-pane fade show active" id="tabtriase" role="tabpanel" > -->
						<div class="tab-pane fade show active" id="tabtriase" role="tabpanel" >
						<!-- <table border="1" width="100%"> -->
							<table border="1" width="100%" style="border-color: black;">
								<tr>
									<td rowspan="2"></td>
									<td colspan="2" width="36%" style=" font-size: 15px; text-align: center; background-color: #F25E4C; color: white; height: 30px;">PRIORITAS I</td>
									<td colspan="2" width="36%" style=" font-size: 15px; text-align: center; background-color: yellow; color: black;">PRIORITAS II</td>
									<td style=" font-size: 15px; text-align: center; background-color: green; color: white;">PRIOROTAS III</td>
								</tr>
								
								<tr>
									<td style=" font-size: 13px; height:80px; background-color: #F25E4C; color: white; text-align: center;">
										<input class="state icheckbox_square-red" type="checkbox" id="kategori1" <?php echo ($dttriase->kategori1 == 1) ? "checked" : "";?> > Kategori 1<br> Resusitasi<br> Respon Time : 0
									</td>
									<td style=" font-size: 13px; height:80px; background-color: #F25E4C; color: white; text-align: center;"><input class="state icheckbox_square-red" type="checkbox" id="kategori2" <?php echo ($dttriase->kategori2 == 1) ? "checked" : "";?>> Kategori 2<br>Emergency / Gawat Darurat<br> Respon Time : 1 - 3 Menit</td>
									<td style=" font-size: 13px; height:80px; background-color: yellow; color: black; text-align: center;"><input class="state icheckbox_square-red" type="checkbox" id="kategori3" <?php echo ($dttriase->kategori3 == 1) ? "checked" : "";?>> Kategori 1 <br>Urgen / Darurat<br> Respon Time : 3 - 5 Menit</td>
									<td style=" font-size: 13px; height:80px; background-color: yellow; color: black; text-align: center;"><input class="state icheckbox_square-red" type="checkbox" id="kategori4" <?php echo ($dttriase->kategori4 == 1) ? "checked" : "";?>> Kategori 2<br>Semi Darurat</td>
									<td style=" font-size: 13px; height:80px; background-color: green; color: white; text-align: center;"><input class="state icheckbox_square-red" type="checkbox" id="kategori5" <?php echo ($dttriase->kategori5== 1) ? "checked" : "";?>> Tidak Darurat</td>
								</tr>
								<tr>
									<td width="10%" style=" font-size: 13px; padding-left: 15px; background-color: #CFD1CF; height:90px;">AIRWAY</td>
									<td width="18%" style="font-size: 13px; padding-left: 30px; background-color: #F25E4C; color: white;">
										<div style="margin-bottom: 6px;">
											<input class="state icheckbox_square-red" type="checkbox" id="airway11" <?php echo ($dttriase->airway11 == 1) ? "checked" : "";?> value="total"> Sumbatan Total
										</div>
										<div>
											<input class="state icheckbox_square-red" type="checkbox" id="airway12" value="sebagian"> Sumbatan Sebagian
										</div>
									</td>
									
									<td width="18%" style="font-size: 13px; padding-left: 30px; background-color: #F25E4C; color: white;">
										<div style="margin-bottom: 15px;">
											<input class="state icheckbox_square-red" type="checkbox" id="airway21" <?php echo ($dttriase->airway21 == 1) ? "checked" : ""; ?> value="total" style="font-size: 13px;"> Paten
										</div>
									</td>

									<td width="18%" style="font-size: 13px; padding-left: 30px; background-color: yellow; color: black;">
										<div style="margin-bottom: 15px;">
											<input class="state icheckbox_square-red" type="checkbox" id="airway31" <?php echo ($dttriase->airway31 == 1) ? "checked" : "";?> value="total"> Paten
										</div>
									</td>

									<td width="18%" style="font-size: 13px; padding-left: 30px; background-color: yellow; color: black;">
										<div style="margin-bottom: 15px;">
											<input class="state icheckbox_square-red" type="checkbox" id="airway41" <?php echo ($dttriase->airway41 == 1) ? "checked" : "";?> value="total"> Paten
										</div>
									</td>

									<td width="18%" style="font-size: 13px; padding-left: 30px; background-color: green; color: white;">
										<div style="margin-bottom: 15px;">
											<input class="state icheckbox_square-red" type="checkbox" id="airway51" <?php echo ($dttriase->airway51 == 1) ? "checked" : "";?> value="total"> Paten
										</div>
									</td>


								</tr>
								<tr>
									<td width="10%" style=" font-size: 13px; padding-left: 15px; background-color: #CFD1CF; height:90px;">BREATHING</td>
									
									<td width="18%" style="font-size: 13px; padding-left: 30px; background-color: #F25E4C; color: white; margin-top: 15px;">
										Distres Pernapasan Berat<br>
										<input class="state icheckbox_square-red" type="checkbox" id="breathing11" <?php echo ($dttriase->breathing11 == 1) ? "checked" : "";?> value="total" style="font-size: 13px; margin-bottom: 10px; margin-top: 10px;"> Sumbatan Total
										<br>
										<input class="state icheckbox_square-red" type="checkbox" id="breathing12" <?php echo ($dttriase->breathing12 == 1) ? "checked" : "";?> value="sebagian"> Sumbatan Sebagian
									</td>

									<td width="18%" style="font-size: 13px; padding-left: 30px; background-color: #F25E4C; color: white; margin-top: 15px;">
										Distres Pernapasan Sedang<br>
										<input class="state icheckbox_square-red" type="checkbox" id="breathing21" <?php echo ($dttriase->breathing21 == 1) ? "checked" : "";?> value="total" style="font-size: 13px; margin-bottom: 10px; margin-top: 10px;"> RR > 30x / menit
										<br>
										<input class="state icheckbox_square-red" type="checkbox" id="breathing22" <?php echo ($dttriase->breathing22 == 1) ? "checked" : "";?> value="sebagian"> Penggunaan otot bantu napas
									</td>

									<td width="18%" style="font-size: 13px; padding-left: 30px; background-color: yellow; color: black; margin-top: 15px;">
										Distres Pernapasan Ringan<br>
										<input class="state icheckbox_square-red" type="checkbox" id="breathing31" <?php echo ($dttriase->breathing31 == 1) ? "checked" : "";?> value="total" style="font-size: 13px; margin-bottom: 10px; margin-top: 10px;"> RR > 30x / menit
									</td>

									<td width="18%" style="font-size: 13px; padding-left: 30px; background-color: yellow; color: black; margin-top: 15px;">
										Tidak ada Distres Pernapasan<br>
										<input class="state icheckbox_square-red" type="checkbox" id="breathing41" <?php echo ($dttriase->breathing41 == 1) ? "checked" : "";?> value="total" style="font-size: 13px; margin-bottom: 10px; margin-top: 10px;"> RR > Normal
									</td>

									<td width="18%" style="font-size: 13px; padding-left: 30px; background-color: green; color: white; margin-top: 15px;">
										<br>
										<input class="state icheckbox_square-red" type="checkbox" id="breathing51" <?php echo ($dttriase->breathing51 == 1) ? "checked" : "";?> value="total" style="font-size: 13px; margin-bottom: 10px; margin-top: 10px;"> RR > Normal
									</td>

									
								</tr>
								<tr>
									<td width="10%" style=" font-size: 13px; padding-left: 15px; background-color: #CFD1CF; height:90px;">CIRCULATION</td>
									<td width="18%" style=" font-size: 13px; padding-left: 30px; background-color: #F25E4C; color: white; margin-top: 15px;">Gangguan Hemodinamik Berat<br>
										<input class="state icheckbox_square-red" type="checkbox" id="circulation11" <?php echo ($dttriase->circulation11 == 1) ? "checked" : "";?> value="total" style=" font-size: 13px; margin-bottom: 10px; margin-top: 10px"> Nadi Tidak Teraba
										<br>
										<input class="state icheckbox_square-red" type="checkbox" id="circulation12" <?php echo ($dttriase->circulation12 == 1) ? "checked" : "";?> value="sebagian"> Pendarahan yang tidak terkontrol / pendarahan aktif
									</td>
									<td width="18%" style=" font-size: 13px; padding-left: 30px; background-color: #F25E4C; color: white; margin-top: 15px;">Gangguan Hemodinamik Sedang<br>
										<input class="state icheckbox_square-red" type="checkbox" id="circulation21" <?php echo ($dttriase->circulation21 == 1) ? "checked" : "";?> value="total" style=" font-size: 13px; margin-bottom: 10px; margin-top: 10px"> Nadi Tidak Teraba / Sangat Halus
										<br>
										<input class="state icheckbox_square-red" type="checkbox" id="circulation22" <?php echo ($dttriase->circulation22 == 1) ? "checked" : "";?> value="sebagian"> Pendarahan kapiler > 2 detik
									</td>

									<td width="18%" style=" font-size: 13px; padding-left: 30px; background-color: yellow; color: b;lack margin-top: 15px;">Gangguan Hemodinamik Ringan<br>
										<input class="state icheckbox_square-red" type="checkbox" id="circulation31" <?php echo ($dttriase->circulation31 == 1) ? "checked" : "";?> value="total" style=" font-size: 13px; margin-bottom: 10px; margin-top: 10px"> Nadi Teraba (Lemah - Kuat)
										<br>
										<input class="state icheckbox_square-red" type="checkbox" id="circulation32" <?php echo ($dttriase->circulation32 == 1) ? "checked" : "";?> value="sebagian"> Pendarahan kapiler < 2 detik
									</td>

									<td width="18%" style=" font-size: 13px; padding-left: 30px; background-color: yellow; color: black; margin-top: 15px;">Tidak ada gangguan Gangguan Hemodinamik<br>
										<input class="state icheckbox_square-red" type="checkbox" id="circulation41" <?php echo ($dttriase->circulation41 == 1) ? "checked" : "";?> value="total" style=" font-size: 13px; margin-bottom: 10px; margin-top: 10px"> Nadi Teraba
									</td>
									<td width="18%" style=" font-size: 13px; padding-left: 30px; background-color: green; color: white; margin-top: 15px;">Tidak ada gangguan Gangguan Hemodinamik<br>
										<input class="state icheckbox_square-red" type="checkbox" id="circulation51" <?php echo ($dttriase->circulation51 == 1) ? "checked" : "";?> value="total" style=" font-size: 13px; margin-bottom: 10px; margin-top: 10px"> Nadi Normal
									</td>
								</tr>
								<tr>
									<td width="10%" style=" font-size: 13px; padding-left: 15px; background-color: #CFD1CF; height:90px;">DISABILITY</td>
									<td width="18%" style="font-size: 13px; padding-left: 30px; background-color: #F25E4C; color: white;">
										<input class="state icheckbox_square-red" type="checkbox" id="disability11" <?php echo ($dttriase->disability11 == 1) ? "checked" : "";?> value="total"> GCS &lt; 9
									</td>

									<td width="18%" style="font-size: 13px; padding-left: 30px; background-color: #F25E4C; color: white;">
										<input class="state icheckbox_square-red" type="checkbox" id="disability21" <?php echo ($dttriase->disability21 == 1) ? "checked" : "";?> value="total" > GCS 9 - 12
									</td>

									<td width="18%" style="font-size: 13px; padding-left: 30px; background-color: yellow; color: black;">
										<input class="state icheckbox_square-red" type="checkbox" id="disability31" <?php echo ($dttriase->disability31 == 1) ? "checked" : "";?> value="total"> GCS 12 - 14
									</td>

									<td width="18%" style="font-size: 13px; padding-left: 30px; background-color: yellow; color: black;">
										<input class="state icheckbox_square-red" type="checkbox" id="disability41" <?php echo ($dttriase->disability41 == 1) ? "checked" : "";?> value="total"> GCS 12 - 14
									</td>

									<td width="18%" style="font-size: 13px; padding-left: 30px; background-color: green; color: white;">
										<input class="state icheckbox_square-red" type="checkbox" id="disability51" <?php echo ($dttriase->disability51 == 1) ? "checked" : "";?> value="total"> GCS Normal
									</td>
								</tr>
								<tr>
									<td width="10%" style=" font-size: 13px; padding-left: 15px; background-color: #CFD1CF; height:90px;">CONTOH PASIEN</td>
									<td colspan="2" width="36%" style=" font-size: 13px; padding-left: 30px; background-color: #F25E4C; color: white;"> Syok, Gangguan pernapasan, cidera kepala dengan pupil anisokor<br>Gangguan jantung yang mengancam, luka bakar > 50% di daerah toraks</td>
									<td colspan="2" width="36%" style=" font-size: 13px; padding-left: 30px; background-color: yellow; color: black;"> Korban resiko syok, fraktur multiple, aktur femur, luka bakar</td>
									<td colspan="2" width="18%" style=" font-size: 13px; padding-left: 30px; background-color: green; color: white;"> Fraktur minor, luka minor <br>atau tanpa luka</td>
								</tr>
							</table>
							<br>
							<div class="row">
								<div class="col-6">
									<!-- <button onclick="Batal()" class="btn btn-danger">Batal Save</button> -->
								</div>
								<div class="col-6 text-right">
									<button onclick="savetriase()" class="btn btn-primary" data-bs-dismiss="modal">Simpan</button>

								</div>
							</div>

						</div>
						<!-- ================== asesmen awal medis ====================== -->
						<div class="tab-pane fade" id="tabasesmenawalmedis" role="tabpanel" >		
							<nav>
								<div class="nav nav-tabs" id="subnav1" role="tablist">
									<a class="nav-item nav-link active" id="subtabkondisiawal" data-toggle="tab" href="#kondisiawal" role="tab" aria-controls="subnav1-1" aria-selected="true">Kondisi Awal</a>
									<a class="nav-item nav-link" id="subtabpemeriksaan" data-toggle="tab" href="#pemeriksaan" role="tab" aria-controls="subnav1-2" aria-selected="false">Pemeriksaan<fisik/a>
									<a class="nav-item nav-link" id="subtabnyeri" data-toggle="tab" href="#nyeri" role="tab" aria-controls="subnav1-2" aria-selected="false">Nyeri | Penunjang | Diagnosa kerja</a>
									<a class="nav-item nav-link" id="subtabterapi" data-toggle="tab" href="#terapi" role="tab" aria-controls="subnav1-2" aria-selected="false">Terapi</a>
									<a class="nav-item nav-link" id="subtabkesimpulan" data-toggle="tab" href="#kesimpulan" role="tab" aria-controls="subnav1-2" aria-selected="false">Kesimpulan</a>
									<a class="nav-item nav-link" id="subtabedukasi" data-toggle="tab" href="#edukasi" role="tab" aria-controls="subnav1-2" aria-selected="false">Edukasi dan Kondisi Pulang</a>
								</div>
								<div class="tab-content" id="subnav1-content">
									<div class="tab-pane fade  show active" id="kondisiawal" role="tabpanel" aria-labelledby="subtabkondisiawal">
										<!-- <div class="tab-pane fade show active" id="tabkondisiAwal" role="tabpanel2" >		 -->
											<div class="card">
												<div class="card-body">
													<div class="col-md-12">
														<div class="form-group row col-spacing-row">
															<label class="col-md-1 col-form-label">Cara Masuk</label>
															<div class="col-md-11">
																<input class="state icheckbox_square-red" type="checkbox" id="datangSendiri" <?php echo ($dtassawal->datangsendiri == 1) ? "checked" : "";?> name="caraMasuk"> Datang Sendiri
																<input class="state icheckbox_square-red ml-3" type="checkbox" id="rujukandari" <?php echo ($dtassawal->rujukan == 1) ? "checked" : "";?> name="caraMasuk" class="form-check-input"> Rujukan Dari 
																<div class="form-check form-check-inline ml-2">
																	<input type="text" class="form-control col-form-label" name="isian" id="isian" style="width: 250px;" <?php echo ($dtassawal->rujukan == 1) ? "" : "disabled";?> value="<?php echo $dtassawal->rujukandari ?>">
																</div>
															</div>
														</div>
													</div>

													<div class="col-md-12">
														<div class="form-group row col-spacing-row">
															<label class="col-md-1 col-form-label">Anamnesis</label>
															<div class="col-md-11">
																	<input class="state icheckbox_square-red" type="checkbox" id="Auto" name="anamnesis" <?php echo ($dtassawal->auto == 1) ? "checked" : "";?>> Auto
																	<input class="state icheckbox_square-red ml-3" type="checkbox" id="Allo" name="anamnesis" <?php echo ($dtassawal->allo == 1) ? "checked" : "";?>> Allo
																<div class="form-check form-check-inline">
																	<input type="text" class="form-control col-form-label ml-3"  name="Allotext" id="Allotext" style="width: 250px;" <?php echo ($dtassawal->allo == 1) ? "" : "disabled";?>  value="<?php echo $dtassawal->allotext ?>">
																</div>
															</div>
														</div>
													</div>

													<div class="col-md-12 mt-2">
														<div class="form-group row col-spacing-row">
															<label class="col-md-1 col-form-label">Jenis Pelayanan</label>
															<div class="col-md-11 mt-1">
																	<input class="state icheckbox_square-red" type="checkbox" id="preventif" name="preventif"<?php echo ($dtassawal->preventif == 1) ? "checked" : "";?>> Preventif
																	<input class="state icheckbox_square-red  ml-3" type="checkbox" id="paliatif" name="paliatif"<?php echo ($dtassawal->paliatif == 1) ? "checked" : "";?>> Paliatif
																	<input class="state icheckbox_square-red  ml-3" type="checkbox" id="kuratif" name="kuratif"<?php echo ($dtassawal->kuratif == 1) ? "checked" : "";?>> Kuratif
																	<input class="state icheckbox_square-red  ml-3" type="checkbox" id="rehabilitatip" name="rehabilitatip"<?php echo ($dtassawal->rehabilitatip == 1) ? "checked" : "";?>> Rehabilitatip
															</div>
														</div>
													</div>
													<div class="col-md-12 mt-3">
														<div class="form-group row col-spacing-row">
															<label class="col-md-2 col-form-label">Keluhan Utama</label>
															<div class="col-md-12">
																<div class="form-check form-check-inline">
																	<textarea id="keluhanutama" name="keluhanutama" rows="7" style="width: 1200px;"><?php echo $dtassawal->keluhanutama?></textarea>

																</div>
															</div>
														</div>
													</div>
													<div class="col-md-12 mt-3">
														<div class="form-group row col-spacing-row">
															<label class="col-md-2 col-form-label">Riwayat Penyakit Sekarang</label>
															<div class="col-md-12">
																<div class="form-check form-check-inline">
																	<textarea id="riwayatsekarang" name="riwayatsekarang" rows="7" style="width: 1200px;"><?php echo $dtassawal->riwayatsekarang?></textarea>

																</div>
															</div>
														</div>
													</div>
													<div class="col-md-12">
														<div class="form-group row col-spacing-row">
															<label class="col-md-2 col-form-label">Riwayat Penyakit Dahulu</label>
															<div class="col-md-12">
																<div class="form-check form-check-inline">
																	<textarea id="riwayatdahulu" name="riwayatdahulu" rows="7" style="width: 1200px;"><?php echo $dtassawal->riwayatdahulu?></textarea>
																</div>
															</div>
														</div>
													</div>
													<div class="col-md-12 mt-3">
														<div class="form-group row col-spacing-row">
															<label class="col-md-1 col-form-label">Alergi</label>
															<div class="col-md-11">
																	<input class="state icheckbox_square-red" type="checkbox" id="alergitidak" <?php echo ($dtassawal->alergitidak == 1) ? "checked" : "";?> name="caraMasuk"> Tidak
																	<input class="state icheckbox_square-red ml-3" type="checkbox" id="alergiya" <?php echo ($dtassawal->alergiya == 1) ? "checked" : "";?> name="caraMasuk" > Ya
																<div class="form-check form-check-inline">
																	<input type="text" class="form-control col-form-label ml-3" name="alergitext" id="alergitext" style="width: 250px;" <?php echo ($dtassawal->alergiya == 1) ? "" : "disabled";?> value="<?php echo $dtassawal->alergitext ?>">
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="col-md-12">
													<div class="col-6 text-left">
														<button onclick="savekondisiawal()" class="btn btn-primary" data-bs-dismiss="modal">Simpan</button>
													</div>
													<div class="col-6">
															<!-- <button onclick="Batal()" class="btn btn-danger">Batal Save</button> -->
													</div>
												</div>
											</div>
										<!-- </div> -->
									</div>
									<!-- -------- pemeriksaan--------- -->
									<div class="tab-pane fade" id="pemeriksaan" role="tabpanel" aria-labelledby="subtabpemeriksaan">
										<div class="card">
											<div class="card-body">
												<div class="col-md-12 mt-3">
													<div class="form-group row col-spacing-row">
														<label class="col-md-1">Keadaan Umum</label>
														<div class="col-md-11">
																<input class="state icheckbox_square-red" type="checkbox" id="baik" name="kondisi"<?php echo ($dtassawal->baik == 1) ? "checked" : "";?> onchange="checkKondisi(this)" >
																Baik
																<input class="state icheckbox_square-red ml-3" type="checkbox" id="sakitringan" name="kondisi" class="form-check-input" <?php echo ($dtassawal->sakitringan == 1) ? "checked" : "";?> onchange="checkKondisi(this)">
																Sakit Ringan
																<input class="state icheckbox_square-red ml-3" type="checkbox" id="sakitsedang" name="kondisi" class="form-check-input" <?php echo ($dtassawal->sakitsedang == 1) ? "checked" : "";?> onchange="checkKondisi(this)">
																Sakit Sedang
																<input class="state icheckbox_square-red ml-3" type="checkbox" id="sakitberat" name="kondisi" class="form-check-input" <?php echo ($dtassawal->sakitberat == 1) ? "checked" : "";?> onchange="checkKondisi(this)">
																Sakit Berat
														</div>
													</div>
													<div class="form-group row col-spacing-row mt-3">
														<label class="col-md-1">Kesadaran</label>
														<div class="col-md-11">
																<input class="state icheckbox_square-red" type="checkbox" id="cm" name="kesadaran"<?php echo ($dtassawal->cm == 1) ? "checked" : "";?> onchange="checkKesadaran(this)">
																CM
																<input class="state icheckbox_square-red ml-3" type="checkbox" id="apatis" name="kesadaran"<?php echo ($dtassawal->apatis == 1) ? "checked" : "";?> onchange="checkKesadaran(this)">
																Apatis
																<input class="state icheckbox_square-red ml-3" type="checkbox" id="somnolen" name="kesadaran"<?php echo ($dtassawal->somnolen == 1) ? "checked" : "";?> onchange="checkKesadaran(this)">
																Somnolen
																<input class="state icheckbox_square-red ml-3" type="checkbox" id="sopor" name="kesadaran" <?php echo ($dtassawal->sopor == 1) ? "checked" : "";?> onchange="checkKesadaran(this)">
																Sopor
																<input class="state icheckbox_square-red ml-3" type="checkbox" id="koma" name="kesadaran"<?php echo ($dtassawal->koma == 1) ? "checked" : "";?> onchange="checkKesadaran(this)">
																Koma
														</div>
													</div>
													<div class="form-group row col-spacing-row mt-3">
															<label class="col-md-1 col-form-label">Tanda Vital</label>
															<div class="form-inline col-md-11">
																<label class="col-form-label">TD</label>
																<input type="text" class="form-control col-form-label ml-3" id="ttv_td" value="<?php echo $dtassawal->ttv_td?>">
																<label class="col-form-label ml-3">Nadi</label>
																<input type="text" class="form-control col-form-label ml-3" id="ttv_nadi" value="<?php echo $dtassawal->ttv_nadi?>">
																<label class="col-form-label ml-3">RR</label>
																<input type="text" class="form-control col-form-label ml-3" id="ttv_rr" value="<?php echo $dtassawal->ttv_rr?>">
																<label class="col-form-label ml-3">Suhu</label>
																<input type="text" class="form-control col-form-label ml-3" id="ttv_s" value="<?php echo $dtassawal->ttv_s?>">
															</div>
													</div>
													<div class="form-group row col-spacing-row mt-3">
														<div class="col-md-12">
															<div class="form-group row col-spacing-row">
																<label class="col-md-2 col-form-label">Status Generalis</label>
																<div class="col-md-12">
																	<div class="form-check form-check-inline">
																		<textarea id="generalis" name="generalis" rows="7" style="width: 1200px;"><?php echo $dtassawal->generalis?></textarea>

																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="form-group row col-spacing-row mt-3">
														<div class="col-md-12">
															<div class="form-group row col-spacing-row">
																<label class="col-md-2 col-form-label">Status Lokalis</label>
																<div class="col-md-12">
																	<div class="form-check form-check-inline">
																		<textarea id="lokalis" name="lokalis" rows="7" style="width: 1200px;"><?php echo $dtassawal->lokalis?></textarea>

																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="col-md-12">
												<div class="col-6 text-left">
													<button onclick="savepemeriksaan()" class="btn btn-primary" data-bs-dismiss="modal">Simpan</button>
												</div>
												<div class="col-6">
													<!-- <button onclick="Batal()" class="btn btn-danger">Batal Save</button> -->
												</div>
												<br>
												<br>
											</div>
										</div>
				
									</div>
									<!-- nyeri -->
									<div class="tab-pane fade" id="nyeri" role="tablitabpanelst" aria-labelledby="subtabnyeri">
										<div class="card">
											<div class="card-body">
												<div class="col-md-12">
													<div class="form-group row col-spacing-row mt-3">
														<label class="col-md-1" style="font-size: 13px;">Nyeri</label>
														<div class="col-md-11">
																<input class="state icheckbox_square-red" type="checkbox" id="nyeritidak" name="nyerirasa" class="form-check-input" <?php echo ($dtassawal->nyeritidak == 1) ? "checked" : "";?> onchange="checkNyeri(this)">
																<span style="font-size: 13px;"> Tidak</span>
																<input class="state icheckbox_square-red ml-3" type="checkbox" id="nyeriya" name="nyerirasa" class="form-check-input" <?php echo ($dtassawal->nyeriiya == 1) ? "checked" : "";?>  onchange="checkNyeri(this)">
																<span style="font-size: 13px;"> Ya</span>
														</div>
													</div>
													<div class="form-group row col-spacing-row"> 
														<label class="col-md-1" style="font-size: 13px;">Sifat</label>
														<div class="col-md-11">
																<input class="state icheckbox_square-red" type="checkbox" id="akut" name="sifat" class="form-check-input" <?php echo ($dtassawal->akut == 1) ? "checked" : "";?> onchange="checkSifat(this)"> Akut
																<input class="state icheckbox_square-red ml-3" type="checkbox" id="kronis" name="sifat" class="form-check-input" <?php echo ($dtassawal->kronis == 1) ? "checked" : "";?> onchange="checkSifat(this)"> Kronis
														</div>
													</div>
													<div class="form-group row col-spacing-row">
														<div class="col-md-1">
														</div>
														<div class="col-md-11">
															<img src="../../assets/image/rm/nyeri.png" alt="Gambar Nyeri" style="max-width: 100%;">
														</div>
													</div>
													<br>
													<div class="form-group row col-spacing-row mb-1">
														<label class="col-md-1" style="font-size: 13px;">Kualitas Nyeri</label>
														<div class="col-md-11">
															<input class="state icheckbox_square-red" type="checkbox" id="nyeritumpul" name="kualitasnyeri" class="form-check-input" <?php echo ($dtassawal->nyeritumpul == 1) ? "checked" : "";?>  onchange="kualitasnyeri(this)"> Nyeri Tumpul
															<input class="state icheckbox_square-red ml-3" type="checkbox" id="nyeritajam" name="kualitasnyeri" class="form-check-input" <?php echo ($dtassawal->nyeritajam == 1) ? "checked" : "";?>  onchange="kualitasnyeri(this)"> Nyeri Tajam
															<input class="state icheckbox_square-red ml-3" type="checkbox" id="panasterbakar" name="kualitasnyeri" class="form-check-input" <?php echo ($dtassawal->panasterbakar == 1) ? "checked" : "";?>  onchange="kualitasnyeri(this)"> Panas / Terbakar
														</div>

													</div>
													<div class="form-group row col-spacing-row">
														<label class="col-md-1 mt-1" style="font-size: 13px;">Menjalar</label>
														<div class="col-md-11">
															<input class="state icheckbox_square-red" type="checkbox" id="menjalartidak" name="menjalar" class="form-check-input"  <?php echo ($dtassawal->menjalartidak == 1) ? "checked" : "";?>   onchange="Menjalar(this)"> Tidak
															<input class="state icheckbox_square-red ml-3" type="checkbox" id="menjalarya" name="menjalar" class="form-check-input"  <?php echo ($dtassawal->menjalarya == 1) ? "checked" : "";?>   onchange="Menjalar(this)"> Ya, ke
															<div class="form-check form-check-inline ml-3">
																<input type="text" class="form-control col-form-label" id="menjalarke" style="width: 250px; border: 1px solid" disabled>
															</div>
														</div>
													</div> 
													<div class="form-group row col-spacing-row mt-2">
														<label class="col-md-1 col-form-label">Skor Nyeri</label>
														<div class="col-md-11">
															<input type="text" class="form-control col-form-label" id="skor" style="width: 100px; border: 1px solid;" value="<?php echo $dtassawal->skor?>"> 

														</div>
													</div>
													<div class="form-group row col-spacing-row mt-3">
														<label class="col-md-1">Frekuensi</label>
														<div class="col-md-11">
																<input class="state icheckbox_square-red" type="checkbox" id="jarang" name="frekuensi" class="form-check-input"  <?php echo ($dtassawal->jarang == 1) ? "checked" : "";?> onchange="Frekuensi(this)"> Jarang
																<input class="state icheckbox_square-red ml-3" type="checkbox" id="hilangtimbul" name="frekuensi" class="form-check-input"  <?php echo ($dtassawal->hilangtimbul == 1) ? "checked" : "";?> onchange="Frekuensi(this)"> Hilang Timbul
																<input class="state icheckbox_square-red ml-3" type="checkbox" id="terusmenerus" name="frekuensi" class="form-check-input"  <?php echo ($dtassawal->terusmenerus == 1) ? "checked" : "";?> onchange="Frekuensi(this)"> Terus Menerus
														</div>
													</div>
													<div class="form-group row col-spacing-row mt-3">
														<label class="col-md-1">Mempengaruhi</label>
														<div class="col-md-11">
																<input class="state icheckbox_square-red" type="checkbox" id="tidur" name="kondisi" class="form-check-input" <?php echo ($dtassawal->tidur == 1) ? "checked" : "";?>> Tidur
																<input class="state icheckbox_square-red ml-3" type="checkbox" id="aktif" name="kondisi" class="form-check-input"> <?php echo ($dtassawal->aktiffisik == 1) ? "checked" : "";?> Aktifitas Fisik
																<input class="state icheckbox_square-red ml-3" type="checkbox" id="konsentrasi" name="kondisi" class="form-check-input" <?php echo ($dtassawal->konsentrasi == 1) ? "checked" : "";?>> Konsentrasi
																<input class="state icheckbox_square-red ml-3" type="checkbox" id="nafsumakan" name="kondisi" class="form-check-input" <?php echo ($dtassawal->nafsumakan == 1) ? "checked" : "";?>> Nafsu Makan
														</div>
													</div>
													<div class="form-group row col-spacing-row mt-3">
														<label class="col-md-5 col-form-label" style="font-weight: bold; font-size: 14px; color: #0D0687;">SKALA FLCC untuk Anak < 6 Tahun</label>
													</div>
													<div class="form-group row col-spacing-row">
														<div class="col-md-12">
															<table border="1" style="width: 80%;">
																<tr style="background-color: #ccc;">
																	<th style="width: 15%; text-align: center;" height="30px" >Pengkajian</th>
																	<th style="width: 25%; text-align: center;">0</th>
																	<th style="width: 25%; text-align: center;">1</th>
																	<th style="width: 25%; text-align: center;">2</th>
																	<th style="width: 10%; text-align: center;">Nilai</th>
																</tr>
																<tr>
																	<td>Wajah</td>
																	<td>Tersenyum / Tidak ada Ekspresi Khusus</td>
																	<td>Terkadang Meringis</td>
																	<td>Sering menggetarkan dagu dan mengetupkan rahang</td>
																	<td><input type="text" id="wajah" name="wajah" value="<?php echo $dtassawal->wajah?>"></td>
																</tr>
																<tr>
																	<td>Kaki</td>
																	<td>Gerakan Normal Relaksasi</td>
																	<td>Tidak Tenang/tegang</td>
																	<td>Kaki dibuat menendang / menarik diri</td>
																	<td><input type="text" id="kaki" name="kaki" value="<?php echo $dtassawal->kaki?>"></td>
																<tr>
																	<td>Aktif</td>
																	<td>Tidur, posisi normal, mudah bergerak</td>
																	<td>Gerakan menggeliat, berguling, kaku</td>
																	<td>Melengkunggkan punggu / kaku / menghentak</td>
																	<td><input type="text" id="aktifitas" name="aktifitas" value="<?php echo $dtassawal->aktifitas?>"></td>
																	
																</tr>
																<tr>
																	<td>Menangis</td>
																	<td>Tidak menangis (bangun / Tidur)</td>
																	<td>Mengerang / Merengek</td>
																	<td>Menangis Terus, terisak, menjerit</td>
																	<td><input type="text" id="menangis" name="menangis" value="<?php echo $dtassawal->menangis?>"></td>
																</tr>
																<tr>
																	<td>Bersuara</td>
																	<td>Bersuara Normal, tenang</td>
																	<td>Tenang bila dipeluk, digending, atau diajak bicara</td>
																	<td>Sulit untuk ditenangkan</td>
																	<td><input type="text" id="bersuara" name="bersuara" value="<?php echo $dtassawal->bersuara?>"></td>
																</tr>
															</table>
															<br>
														</div>
													</div>
													<div class="form-group row col-spacing-row">
														<label class="col-md-10 col-form-label">Hasil Skrining</label>
													</div>
													<div class="form-group row col-spacing-row">
														<label class="col-md-2 col-form-label text-right">(P) Faktor Pencetus</label>
														<div class="col-md-6">
															<input type="text" class="form-control col-form-label" style="border: 1px solid;" name="pencetus" id="pencetus" value="<?php echo $dtassawal->pencetus?>">
														</div>
													</div>
													<div class="form-group row col-spacing-row">
														<label class="col-md-2 col-form-label text-right">(Q) Faktor Kualitas</label>
														<div class="col-md-6">
															<input type="text" class="form-control col-form-label" style="border: 1px solid;" name="kualitas" id="kualitas" value="<?php echo $dtassawal->kualitasskrining?>">
														</div>
													</div>
													<div class="form-group row col-spacing-row">
														<label class="col-md-2 col-form-label text-right">(R) Lokasi</label>
														<div class="col-md-6">
															<input type="text" class="form-control col-form-label" style="border: 1px solid;" name="lokasi" id="lokasi" value="<?php echo $dtassawal->lokasi?>">
														</div>
													</div>
													<div class="form-group row col-spacing-row">
														<label class="col-md-2 col-form-label text-right">(S) Skala Nyeri</label>
														<div class="col-md-6">
															<input type="text" class="form-control col-form-label" style="border: 1px solid;" name="skalanyeri" id="skalanyeri" value="<?php echo $dtassawal->skalanyeri?>">
														</div>
													</div>
													<div class="form-group row col-spacing-row">
														<label class="col-md-2 col-form-label text-right">(T) Lama Nyeri</label>
														<div class="col-md-6">
															<input type="text" class="form-control col-form-label" style="border: 1px solid;" name="lamanyeri" id="lamanyeri" value="<?php echo $dtassawal->lamanyeri?>">
														</div>
													</div>
													<div class="form-group row col-spacing-row mt-3">
														<label class="col-md-10 col-form-label">PEMERIKSAAN PENUNJANG</label>
													</div>
													<div class="form-group row col-spacing-row">
														<div class="col-md-10">
        													<input class="state icheckbox_square-red" type="checkbox" id="laboratorium" name="pemeriksaan" class="form-check-input" <?php echo ($dtassawal->lab == 1) ? "checked" : "";?>> Laboratorium
        													<input class="state icheckbox_square-red ml-3" type="checkbox" id="radiologi" name="pemeriksaan" class="form-check-input" <?php echo ($dtassawal->rad == 1) ? "checked" : "";?>> Radiologi
    														<input class="state icheckbox_square-red  ml-3" type="checkbox" id="ekg" name="pemeriksaan" class="form-check-input" <?php echo ($dtassawal->ekg == 1) ? "checked" : "";?>> EKG
															<div class="form-check form-check-inline ml-3">
																<label class="col-form-label">Penunjang Lainnya </label>
																<input type="text" class="form-control col-form-label  ml-3" id="penunjanglain" name="penunjanglain" style="width: 250px; border: 1px solid" value="<?php echo $dtassawal->laintext?>">
															</div>
														</div>
													</div>
													<div class="form-group row col-spacing-row mt-3">
														<label class="col-md-1" >Diagnosa Kerja</label>
														<div class="col-md-11">
															<div class="form-check form-check-inline">
																<textarea id="diagnosakerja" name="diagnosakerja" rows="3" style="width: 1000px;"><?php echo $dtassawal->diagnosakerja?>"</textarea>
															</div>
														</div>
													</div>
													


												</div>
											</div>
											<div class="col-md-12 mb-5">
												<div class="col-6 text-left">
													<button onclick="savenyeri()" class="btn btn-primary" data-bs-dismiss="modal">Simpan</button>
												</div>
												<div class="col-6">
													<!-- <button onclick="Batal()" class="btn btn-danger">Batal Save</button> -->
												</div>>
											</div>
										</div>
									</div>
									<div class="tab-pane fade" id="terapi" role="tabpanel" aria-labelledby="subtabterapi">
										<div class="card">
											<div class="card-body">
												<div class="col-md-8">
													<!-- Terapi -->
													<div class="table-responsive mt-2 table-hover table-scrollable" id="tabeltindakannya" style="max-height: 600px; overflow-y: auto;">
															<button onclick="tambahterapi()" class="btn btn-sm btn-secondary ml-auto mb-2" id="tambahterapi" name="tambahObatBaru" style="background-color: #FF5733; color: white;">+ Terapi / Tindakan</button>
															<br>
															<label style="font-size: 14px; font-weight: bold; color: black;">List Terapi</label>

															<table class="table" id="tableterapi">
																<tbody>
																	<?php
																	if ($dtterapi== NULL) {
																	?>
																		<tr>
																			<td colspan="100%" class="text-left">
																				Belum Ada Data
																			</td>
																		</tr>
																		<?php } else {
																		$no = 1;
																		$jmlt = 0;
																		$warnabackground="FFFFFF";
																		foreach ($dtterapi as $row) {
																		?>	
																			<tr style="background-color: <?php echo $warnabackground;?>;" onclick="bukaformterapi('<?php echo $row->id;?>')">
																				<td width="2%">
																				</td>
																				<td width="98%">
																					<?php 
																					echo '<strong style="color: Navy; font-size: 13px;">' . tanggaldua($row->tanggal) .' | ' .$row->jam.'</strong><br>';
																						if ($row->terapi != null) {echo '<span style="color: darkred;">Terapi : </span><strong>' . $row->terapi . '<br></strong>';} 
																						if ($row->oleh != null) {echo '<span style="color: darkred;">Oleh : </span><strong>'.$row->oleh . "<br></strong>";} 
																						if ($row->evaluasi != null) {echo '<span style="color: darkred;">Evaluasi : </span><strong>'.$row->evaluasi . "<br></strong>";} 
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
													<!-- ______________ -->
												</div>
											</div>
										</div>
									</div>
									<div class="tab-pane fade" id="kesimpulan" role="tabpanel" aria-labelledby="subtabkesimpulan">
										<div class="card">
											<div class="card-body">
												<div class="col-md-12">
													<div class="form-group row col-spacing-row">
														<div class="col-md-11">
															<input class="state icheckbox_square-red" type="checkbox" id="dirawat" name="caraMasuk" class="form-check-input" onchange="ToggleDirawat(this)" <?php echo ($dtassawal->dirawat == 1) ? "checked" : "";?>> Dirawat
															<div class="form-check form-check-inline">
																<label class="col-md-5">Konsul Spesialis</label>
																<input type="text" class="form-control col-form-label" name="konsul" id="konsul" style="width: 250px; border: 1px solid;" value="<?php echo $dtassawal->dirawatkonsul;?>" disabled>
															</div>
														</div>
													</div>
													<div class="form-group row col-spacing-row">
														<div class="col-md-11">
															<input class="state icheckbox_square-red" type="checkbox" id="pulang" name="caraKeluar" class="form-check-input" onchange="TogglePulang(this)" <?php echo ($dtassawal->pulang == 1) ? "checked" : "";?>> Pulang
															<input class="state icheckbox_square-red ml-3" type="checkbox" id="izinDokter" name="caraKeluar" class="form-check-input" <?php echo ($dtassawal->izindokter == 1) ? "checked" : "";?> disabled > Izin Dokter
															<input class="state icheckbox_square-red ml-3" type="checkbox" id="permintaanSendiri" name="caraKeluar" class="form-check-input" <?php echo ($dtassawal->permintaansendiri == 1) ? "checked" : "";?> disabled> Permintaan Sendiri
														</div>
													</div>
													<div class="form-group row col-spacing-row">
														<label class="col-md-2 col-form-label">Terapi Pulang</label>
														<div class="col-md-12">
															<div class="form-check form-check-inline">
																<textarea id="terapipulang" name="terapipulang" rows="7" style="width: 1200px;"><?php echo $dtassawal->terapipulang?></textarea>
															</div>
														</div>
													</div>
													<div class="form-group row col-spacing-row">
														<label class="col-md-6 col-form-label">Kontrol ke Poli / Puskesmas</label>
														<div class="col-md-12">
															<div class="form-check form-check-inline">
																<textarea id="kontrolpoli" name="kontrolpoli" rows="3" style="width: 1200px;"><?php echo $dtassawal->kontrolpoli?></textarea>
															</div>
														</div>
													</div>
													<div class="form-group row col-spacing-row">
														<label class="col-md-6 col-form-label">Tujuan RS Rujuk dan alasan di rujuk</label>
														<div class="col-md-12">
															<div class="form-check form-check-inline">
																<textarea id="rujuk" name="rujuk" rows="3" style="width: 1200px;"><?php echo $dtassawal->rujuk?></textarea>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="col-md-12 mb-4">
												<div class="col-6 text-left">
													<button onclick="savekesimpulan()" class="btn btn-primary" data-bs-dismiss="modal">Simpan</button>
												</div>
												<div class="col-6">
													<!-- <button onclick="Batal()" class="btn btn-danger">Batal Save</button> -->
												</div>
											</div>
										</div>
									</div>
									<div class="tab-pane fade" id="edukasi" role="tabpanel" aria-labelledby="subtabedukasi">
										<div class="card">
											<div class="card-body">
												<div class="col-md-12">
													<div class="form-group row col-spacing-row">
														<label class="col-md-2 col-form-label">Edukasi</label>
														<div class="col-md-12">
															<div class="form-check form-check-inline">
																<textarea id="edukasipulang" name="edukasipulang" rows="7" style="width: 1200px;"><?php echo $dtassawal->edukasi?></textarea>
															</div>
														</div>
													</div> 
													
													<div class="form-group row col-spacing-row mt-3">
														<label class="col-md-8 col-form-label">Edukasi awal disampaikan tentang diagnosis, rencana dan terapi kepada</label>
														<div class="col-md-12">
															<div class="form-check form-check-inline">
																<div class="form-group row col-spacing-row">
																	<div class="col-md-12">
																		<input class="state icheckbox_square-red" type="checkbox" id="pasien" name="hubungan" class="form-check-input" <?php echo ($dtassawal->edukasipasien == 1) ? "checked" : "";?>> Pasien
																		<input class="state icheckbox_square-red ml-3" type="checkbox" id="keluarga" name="hubungan" class="form-check-input" <?php echo ($dtassawal->edukasikeluarga == 1) ? "checked" : "";?>> Keluarga
																		<input class="state icheckbox_square-red ml-3" type="checkbox" id="tidak" name="hubungan" class="form-check-input"> Tidak
																		<div class="form-check form-check-inline" <?php echo ($dtassawal->edukasitidak == 1) ? "checked" : "";?>>
																			<input type="text" class="form-control col-form-label ml-3" name="edukasitidakkarena" id="edukasitidakkarena" style="width: 900px; border: 1px solid;" value="<?php echo $dtassawal->edukasitidakkarena?>">
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="form-group row col-spacing-row">
														<label class="col-md-8 col-form-label">KONDISI SAAT PULANG
														<div class="col-md-12 mt-2">
															<div class="form-check form-check-inline">
																<div class="form-group row col-spacing-row">
																	<div class="col-md-12">
																		<input class="state icheckbox_square-red" type="checkbox" id="membaik" name="kondisi" class="form-check-input" <?php echo ($dtassawal->membaik == 1) ? "checked" : "";?>> Membaik
																		<input class="state icheckbox_square-red ml-3" type="checkbox" id="memburuk" name="kondisi" class="form-check-input" <?php echo ($dtassawal->memburuk == 1) ? "checked" : "";?>> Memburuk
																		<input class="state icheckbox_square-red ml-3" type="checkbox" id="tetapmasihsakit" name="kondisi" class="form-check-input" <?php echo ($dtassawal->tetap == 1) ? "checked" : "";?>> Tetap / Masih Sakit
																		<input class="state icheckbox_square-red ml-3" type="checkbox" id="meninggal" name="kondisi" class="form-check-input"> <?php echo ($dtassawal->meninggal == 1) ? "checked" : "";?> Meninggal
																		<div class="form-check form-check-inline ml-3">
																			<input type="time" id="jammeninggal" name="jammeninggal" class="form-control" style="width: 400; border: 1px solid;" placeholder="Jam Meninggal" value="<?php echo $dtassawal->jammeninggal?>" disabled>
																		</div>
																		<input class="state icheckbox_square-red ml-3" type="checkbox" id="doa" name="kondisi" class="form-check-input" <?php echo ($dtassawal->doa == 1) ? "checked" : "";?>> DOA
																	</div>
																</div>
															</div>
															<div class="form-group row col-spacing-row">
																<label class="col-form-label">Tanda Vital</label>
																<div class="form-inline col-md-12">
																	<label class="col-form-label">Tekanan Darah</label>
																	<input type="text" class="form-control col-form-label ml-3" style="width: 200; border: 1px solid;" id="pulangtd" value="<?php echo $dtassawal->pulangtd?>">
																	<label class="col-form-label ml-3">Nadi</label>
																	<input type="text" class="form-control col-form-label ml-3" id="pulangnadi" style="width: 200; border: 1px solid;" value="<?php echo $dtassawal->pulangnadi?>">
																	<label class="col-form-label ml-3">RR</label>
																	<input type="text" class="form-control col-form-label ml-3" id="pulangrr"  style="width: 200; border: 1px solid;" value="<?php echo $dtassawal->pulangrr?>">
																	<label class="col-form-label ml-3">Suhu</label>
																	<input type="text" class="form-control col-form-label ml-3" id="pulangs"  style="width: 200; border: 1px solid;" value="<?php echo $dtassawal->pulangs?>">
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="col-md-12 mb-5">
												<div class="col-6 text-left">
													<button onclick="saveedukasi()" class="btn btn-primary" data-bs-dismiss="modal">Simpan</button>
												</div>
												<div class="col-6">
													<!-- <button onclick="Batal()" class="btn btn-danger">Batal Save</button> -->
												</div>
											</div>
										</div>
									</div>
								</div>
							</nav>
						</div>

						<!-- ================== asesmen awal keperawatan ====================== -->
						<div class="tab-pane fade" id="tabasesmenawalkeperawatan" role="tabpanel" >
										<div class="card">
											<div class="card-body">
												<button onclick="tambahdata()" class="btn btn-sm btn-secondary ml-auto mb-2" id="tomboltambahdata" name="tomboltambahdata" style="background-color: #FF5733; color: white;">+ Tambah Data</button>
												<br>
												<label style="font-size: 14px; font-weight: bold; color: black;">List Tindakan Terintegrasi</label>
												<div class="col-md-8">
													<!-- Terapi -->
													<?php 
													$warnabackground="#FFFFFF";
													?>
													<div class="table-responsive mt-2 table-hover table-scrollable" id="tabelterapi1" style="max-height: 600px; overflow-y: auto;">
															<br>
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
													<!-- ______________ -->
												</div>
											</div>
										</div>
						</div>
						<!-- ========== nav  persalinan ============ -->
						<div class="tab-pane fade" id="tabpersalinan" role="tabpanel" >
							<div class="card">
								<div class="card-body">
									<div class="col-md-12">
										<table border=1 style="width: 100%;">
											<tr>
												<td width="65%">
													<table style="width: 100%;">
														<tr>
															<td style="font-size: 13px;" width="40%" height="30px">Nama Suami</td>
															<td style="font-size: 13px;" width="60%"><input type="text" id="namasuami" name="namasuami" style="width: 500px;"></td>

														</tr>
														<tr>
															<td style="font-size: 13px;" height="30px">Ibu Masuk Karena</td>
															<td style="font-size: 13px;" width="60%"><input type="text" id="masukkarena" name="masukkarena" style="width: 500px;"></td>

														</tr>
														<tr>
															<td style="font-size: 13px;" height="30px">His Masuk Sejak</td>
															<td style="font-size: 13px;" width="60%"><input type="text" id="hismasuk" name="hismasuk" style="width: 500px;"></td>

														</tr>
														<tr>
															<td style="font-size: 13px;" height="30px">Lendir dan Darah</td>
															<td style="font-size: 13px;" width="60%"><input type="text" id="lendirdarah" name="lendirdarah" style="width: 500px;"></td>

														</tr>
														<tr>
															<td style="font-size: 13px;" height="30px">Ketuban Pecah / Belum</td>
															<td style="font-size: 13px;" width="60%"><input type="text" id="ketuban" name="ketuban" style="width: 500px;"></td>

														</tr>
														<tr>
															<!-- <td style="font-size: 13px;" height="30px">Kesehatan Umum</td> -->
															<td style="font-size: 13px; vertical-align: top;" height="30px">Kesehatan Umum</td>

															<td>
																<table>
																	<tr>
																		<td>Tekanan Darah</td>
																		<td style="font-size: 13px;" width="60%"><input type="text" id="tekanan" name="tekanan" style="width: 250px;"></td>

																	</tr>
																	<tr>
																		<td>Nadi</td>
																		<td style="font-size: 13px;" width="60%"><input type="text" id="nadi" name="nadi" style="width: 250px;"></td>

																	</tr>
																	<tr>
																		<td>Suhu</td>
																		<td style="font-size: 13px;" width="60%"><input type="text" id="suhu" name="suhu" style="width: 250px;"></td>

																	</tr>
																	<tr>
																		<td>Pernapasan</td>
																		<td style="font-size: 13px;" width="60%"><input type="text]" id="nadi" name="pernapasan" style="width: 250px;"></td>

																	</tr>
																	<tr>
																		<td>Oedem</td>
																		<td style="font-size: 13px;" width="60%"><input type="text" id="oedem" name="oedem" style="width: 250px;"></td>

																	</tr>
																</table>
															</td>
														</tr>
														<tr>
															<td style="font-size: 13px;" height="30px">Kesehatan Jantung</td>
															<td style="font-size: 13px;" width="60%"><input type="text" id="jantung" name="jantung" style="width: 500px;"></td>

														</tr>
													</table>
												</td>
												<td width="35%">
													<table>
														<tr>
															<td>Fundusi Uteri</td>
															<td style="font-size: 13px;" width="60%"><input type="text" id="fundusi" name="fundusi" style="width: 350px;"></td>

														</tr>
														<tr>
															<td>Situs Anak</td>
															<td style="font-size: 13px;" width="60%"><input type="text" id="situs" name="situs" style="width: 350px;"></td>

														</tr>
														<tr>
															<td>Posisi Punggung</td>
															<td style="font-size: 13px;" width="60%"><input type="text" id="posisi" name="posisi" style="width: 350px;"></td>

														</tr>
														<tr>
															<td>Bagian Paling Depan</td>
															<td style="font-size: 13px;" width="60%"><input type="text" id="bagiandepan" name="bagiandepan" style="width: 350px;"></td>

														</tr>
														<tr>
															<td>D.D.A</td>
															<td style="font-size: 13px;" width="60%"><input type="text" id="dda" name="dda" style="width: 350px;"></td>

														</tr>
														<tr>
															<td>Gemelli / Tunggal</td>
															<td style="font-size: 13px;" width="60%"><input type="text" id="gemelli" name="gemelli" style="width: 350px;"></td>
														</tr>
														<tr>
															<td>Gerakan Anak</td>
															<td style="font-size: 13px;" width="60%"><input type="text" id="gerakan" name="gerakan" style="width: 350px;"></td>
														</tr>
													</table>

												</td>
											</tr>
												<td style="font-size: 13px; text-align: center; background-color: #ccc;" height="35px">KALA PEMBUKAAN</td>
												<td style="font-size: 13px; text-align: center; background-color: #ccc;" height="35px">PIMPINAN DAN TERAPI</td>
											</tr>
											<tr>
												<td style="font-size: 13px;"><textarea id="pembukaan" rows="5" style="width: 1000px;"></textarea></td>
												<td style="font-size: 13px;"><textarea id="pimpinanpembukaan" rows="5" style="width: 500px;"></textarea></td>
											</tr>
											</tr>
												<td style="font-size: 13px; text-align: center; background-color: #ccc;" height="35px">KALA PENGELUARAN</td>
												<td style="font-size: 13px; text-align: center; background-color: #ccc;" height="35px">PIMPINAN DAN TERAPI</td>
											</tr>
											<tr>
												<td style="font-size: 13px;"><textarea id="pengeluaran" rows="5" style="width: 1000px;"></textarea></td>
												<td style="font-size: 13px;"><textarea id="pimpinanpengeluaran" rows="5" style="width: 500px;"></textarea></td>
											</tr>
											</tr>
												<td style="font-size: 13px; text-align: center; background-color: #ccc;" height="35px">KALA URI</td>
												<td style="font-size: 13px; text-align: center; background-color: #ccc;" height="35px">PIMPINAN DAN TERAPI</td>
											</tr>
											<tr>
												<td style="font-size: 13px;">
													<label for="pendarahan">Pendarahan (cc)</label>
													<input type="text" id="pendarahan" name="pendarahan"><br>

													<label for="sebab">Sebab Pendarahan</label>
													<input type="text" id="sebab" name="sebab"><br>

													<label for="plasenta">Plasenta</label>
													<input type="text" id="plasenta" name="plasenta"><br>

													<label for="talipusat">Tali Pusat</label>
													<input type="text" id="talipusat" name="talipusat"><br>
												</td>
												<td style="font-size: 13px;"><textarea id="pimpinanuri" rows="5" style="width: 500px;"></textarea></td>
											</tr>
											</tr>
												<td style="font-size: 13px; text-align: center; background-color: #ccc;" height="35px">KALA V (sampai 2 jam post partum)</td>
												<td style="font-size: 13px; text-align: center; background-color: #ccc;" height="35px">PIMPINAN DAN TERAPI</td>
											</tr>
											<tr>
												<td style="font-size: 13px;">
													<label for="pendarahan">Pendarahan (cc)</label>
													<input type="text" id="pendarahan" name="pendarahan"><br>

													<label for="jumlahseluruhnya">Jumlah Seluruhnya</label>
													<input type="text" id="jumlahseluruhnya" name="jumlahseluruhnya"><br>

													<label for="robeka">Robeka</label>
													<input type="text" id="robeka" name="robeka"><br>

													<label for="kontransi">Kontraksi Ut</label>
													<input type="text" id="kontransi" name="kontransi"><br>

													<label for="tinggifundus">Tinggi Fundus</label>
													<input type="text" id="tinggifundus" name="tinggifundus"><br>

													<label for="tekanan">Tekanan</label>
													<input type="text" id="tekanan" name="tekanan"><br>

													<label for="nadi">Nadi</label>
													<input type="text" id="nadi" name="nadi"><br>

													<label for="pernapasan">Pernapasan</label>
													<input type="text" id="pernapasan" name="pernapasan"><br>

													<label for="suhu">Suhu</label>
													<input type="text" id="suhu" name="suhu"><br>
												</td>
												<td style="font-size: 13px;"><textarea id="pimpinankala4" rows="5" style="width: 500px;"></textarea></td>
											</tr>
										</table>
									</div>
								</div>
								<div class="col-md-12">
												<div class="col-6 text-left">
													<button onclick="savepersalinan()" class="btn btn-primary" data-bs-dismiss="modal">Simpan</button>
												</div>
												<div class="col-6">
													<!-- <button onclick="Batal()" class="btn btn-danger">Batal Save</button> -->
												</div>
											</div>
								</div>
						</div>
						<div class="tab-pane fade" id="tabrekonsoliasiobat" role="tabpanel" >
							rekonsiliasi obat
						</div>
					</div>
				</nav>
			</div>
		</div>
	</div>	
</body>
<script>

function kembaliKeRmeNew() {
	var url= "<?php echo site_url(); ?>/rme/rme_igd";
    window.location.href = url;
}

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
					no_rm : no_rm,
					kode_dokter : kode_dokter,
					notransaksi : notransaksi,
                    kategori1: kategori1,
                    kategori2: kategori2,
                    kategori3: kategori3,
                    kategori4: kategori4,
                    kategori5: kategori5,
					airway11 : airway11,
					airway12 : airway12,
					airway21 : airway21,
					airway31 : airway31,
					airway41 : airway41,
					airway51 : airway51,
					breathing11 : breathing11,
					breathing12 : breathing12,
					breathing21 : breathing21,
					breathing22 : breathing22,
					breathing31 : breathing31,
					breathing41 : breathing41,
					breathing51 : breathing51,
					circulation11 : circulation11,
					circulation12 : circulation12,
					circulation21 : circulation21,
					circulation22 : circulation22,
					circulation31 : circulation31,
					circulation32 : circulation32,
					circulation41 : circulation41,
					circulation51 : circulation51,
					disability11 : disability11,
					disability21 : disability21,
					disability31 : disability31,
					disability41 : disability41,
					disability51 : disability51
                },
                success: function(ajaxData) {
                    swal('Simpan Data Triase Berhasil');
                    },
                error: function(ajaxData) {
                    swal('Simpan Data Triase Gagal');
                }
            });
        }

function toggleRujukan() {
            var datangSendiriCheckbox = document.getElementById('datangSendiri');
            var rujukanDariCheckbox = document.getElementById('rujukanDari');
            var rujukanDariText = document.getElementById('rujukandaritext');

            if (datangSendiriCheckbox.checked) {
                rujukanDariCheckbox.checked = false;
                rujukanDariText.disabled = true;
            } else if (rujukanDariCheckbox.checked) {
                datangSendiriCheckbox.checked = false;
                rujukanDariText.disabled = false;
            } else {
                rujukanDariText.disabled = true;
            }
        }

function savekondisiawal() {
			var no_rm = document.getElementById("no_rm").value;
			var kode_dokter = document.getElementById("kode_dokter").value;
			var notransaksi = document.getElementById("notransaksi").value;
			var datangsendiri = $("#datangSendiri").prop("checked") ? 1 : 0;
			var rujukan = $("#rujukanDari").prop("checked") ? 1 : 0;
			var rujukandari = document.getElementById("isian").value;
			var auto = $("#Auto").prop("checked") ? 1 : 0;
			var allo = $("#Allo").prop("checked") ? 1 : 0;
			var allotext = document.getElementById("Allotext").value;
			var preventif = $("#preventif").prop("checked") ? 1 : 0;
			var paliatif = $("#paliatif").prop("checked") ? 1 : 0;
			var kuratif = $("#kuratif").prop("checked") ? 1 : 0;
			var rehabilitatip = $("#rehabilitatip").prop("checked") ? 1 : 0;
			var keluhanutama = document.getElementById("keluhanutama").value;
			var riwayatsekarang = document.getElementById("riwayatsekarang").value;
			var riwayatdahulu = document.getElementById("riwayatdahulu").value;
			var alergitidak = $("#alergitidak").prop("checked") ? 1 : 0;
			var alergiya = $("#alergiya").prop("checked") ? 1 : 0;
			var alergitext = document.getElementById("alergitext").value;
			$.ajax({
                url: "<?php echo site_url(); ?>/rme/saveawal",
                type: "GET",
                data: {
					no_rm : no_rm,
					kode_dokter : kode_dokter,
					notransaksi : notransaksi,
                    datangsendiri: datangsendiri,
                    rujukan: rujukan,
                    rujukandari: rujukandari,
                    auto: auto,
                    allo: allo,
					allotext : allotext,
					preventif : preventif,
					paliatif : paliatif,
					kuratif : kuratif,
					rehabilitatip : rehabilitatip,
					keluhanutama : keluhanutama,
					riwayatsekarang : riwayatsekarang,
					riwayatdahulu : riwayatdahulu,
					alergitidak : alergitidak,
					alergiya : alergiya,
					alergitext : alergitext,
                },
                success: function(ajaxData) {
                    swal('Simpan Data Berhasil');
                    },
                error: function(ajaxData) {
                    swal('Simpan Data Gagal');
                }
            });
		}

		function savepemeriksaan() {
			var no_rm = document.getElementById("no_rm").value;
			var kode_dokter = document.getElementById("kode_dokter").value;
			var notransaksi = document.getElementById("notransaksi").value;
			var baik = $("#baik").prop("checked") ? 1 : 0;
			var sakitringan = $("#sakitringan").prop("checked") ? 1 : 0;
			var sakitsedang = $("#sakitsedang").prop("checked") ? 1 : 0;
			var sakitberat = $("#sakitberat").prop("checked") ? 1 : 0;
			var cm = $("#cm").prop("checked") ? 1 : 0;
			var apatis = $("#apatis").prop("checked") ? 1 : 0;
			var somnolen = $("#somnolen").prop("checked") ? 1 : 0;
			var sopor = $("#sopor").prop("checked") ? 1 : 0;
			var koma = $("#koma").prop("checked") ? 1 : 0;
			var ttv_td = document.getElementById("ttv_td").value;
			var ttv_nadi = document.getElementById("ttv_nadi").value;
			var ttv_rr = document.getElementById("ttv_rr").value;
			var ttv_s = document.getElementById("ttv_s").value;
			var generalis = document.getElementById("generalis").value;
			var lokalis = document.getElementById("lokalis").value;
			$.ajax({
                url: "<?php echo site_url(); ?>/rme/savepemeriksaan",
                type: "GET",
                data: {
					no_rm : no_rm,
					notransaksi : notransaksi,
					baik : baik,
                    sakitringan: sakitringan,
                    sakitsedang: sakitsedang,
                    sakitberat: sakitberat,
                    cm: cm,
                    apatis: apatis,
					somnolen : somnolen,
					sopor : sopor,
					koma : koma,
					ttv_td : ttv_td,
					ttv_nadi : ttv_nadi,
					ttv_rr : ttv_rr,
					ttv_s : ttv_s,
					generalis : generalis,
					lokalis : lokalis
                },
                success: function(ajaxData) {
                    swal('Simpan Data Berhasil');
                    },
                error: function(ajaxData) {
                    swal('Simpan Data Gagal');
                }
            });
		}

	function savenyeri() {
			var no_rm = document.getElementById("no_rm").value;
			var kode_dokter = document.getElementById("kode_dokter").value;
			var notransaksi = document.getElementById("notransaksi").value;

			var nyeritidak = $("#nyeritidak").prop("checked") ? 1 : 0;
			var nyeriiya = $("#nyeriiya").prop("checked") ? 1 : 0;
			var akut = $("#akut").prop("checked") ? 1 : 0;
			var kronis = $("#kronis").prop("checked") ? 1 : 0;
			var nyeritumpul = $("#nyeritumpul").prop("checked") ? 1 : 0;
			var nyeritajam = $("#nyeritajam").prop("checked") ? 1 : 0;
			var panasterbakar = $("#panasterbakar").prop("checked") ? 1 : 0;
			var menjalartidak = $("#menjalartidak").prop("checked") ? 1 : 0;
			var menjalarya = $("#menjalarya").prop("checked") ? 1 : 0;
			var menjalarke = document.getElementById("menjalarke").value;
			var skor = document.getElementById("skor").value;
			var jarang = $("#jarang").prop("checked") ? 1 : 0;
			var hilangtimbul = $("#hilangtimbul").prop("checked") ? 1 : 0;
			var terusmenerus = $("#terusmenerus").prop("checked") ? 1 : 0;
			var tidur = $("#tidur").prop("checked") ? 1 : 0;
			var aktif = $("#aktif").prop("checked") ? 1 : 0;
			var konsentrasi = $("#konsentrasi").prop("checked") ? 1 : 0;
			var nafsumakan = $("#nafsumakan").prop("checked") ? 1 : 0;

			var wajah = document.getElementById("wajah").value;
			var kaki = document.getElementById("kaki").value;
			var aktifitas = document.getElementById("aktifitas").value;
			var menangis = document.getElementById("menangis").value;
			var bersuara = document.getElementById("bersuara").value;
			
			var pencetus = document.getElementById("pencetus").value;
			var kualitas = document.getElementById("kualitas").value;
			var lokasi = document.getElementById("lokasi").value;
			var skalanyeri = document.getElementById("skalanyeri").value;
			var lamanyeri = document.getElementById("lamanyeri").value;

			var laboratorium = $("#laboratorium").prop("checked") ? 1 : 0;
			var radiologi = $("#radiologi").prop("checked") ? 1 : 0;
			var ekg = $("#ekg").prop("checked") ? 1 : 0;
			var penunjanglain = document.getElementById("penunjanglain").value;
			var diagnosakerja = document.getElementById("diagnosakerja").value;
			$.ajax({
                url: "<?php echo site_url(); ?>/rme/savenyeri",
                type: "GET",
                data: {
					no_rm : no_rm,
					notransaksi : notransaksi,
					kode_dokter : kode_dokter,
					nyeritidak : nyeritidak,
                    nyeriiya: nyeriiya,
					akut: akut,
					kronis: kronis,
					nyeritumpul: nyeritumpul,
					nyeritajam: nyeritajam,
					panasterbakar : panasterbakar,
					menjalartidak : menjalartidak,
					menjalarya : menjalarya,
					menjalarke : menjalarke,
					skor : skor,
					jarang : jarang,
					hilangtimbul : hilangtimbul,
					terusmenerus : terusmenerus,
					tidur : tidur,
					aktif : aktif,
					konsentrasi : konsentrasi,
					nafsumakan : nafsumakan,
					wajah : wajah,
					kaki : kaki,
					aktifitas : aktifitas,
					menangis : menangis,
					bersuara : bersuara,
					pencetus : pencetus,
					kualitas : kualitas,
					lokasi : lokasi,
					skalanyeri : skalanyeri,
					lamanyeri : lamanyeri,
					laboratorium : laboratorium,
					radiologi : radiologi,
					ekg : ekg,
					penunjanglain : penunjanglain,
					diagnosakerja : diagnosakerja
                },
                success: function(ajaxData) {
                    swal('Simpan Data Berhasil');
                    },
                error: function(ajaxData) {
                    swal('Simpan Data Gagal');
                }
            });
		}

		function savekesimpulan() {
			var no_rm = document.getElementById("no_rm").value;
			var kode_dokter = document.getElementById("kode_dokter").value;
			var notransaksi = document.getElementById("notransaksi").value;

			var dirawat = $("#dirawat").prop("checked") ? 1 : 0;
			var pulang = $("#pulang").prop("checked") ? 1 : 0;
			var izinDokter = $("#izinDokter").prop("checked") ? 1 : 0;
			
			var konsul = document.getElementById("konsul").value;
			var terapipulang = document.getElementById("terapipulang").value;
			var kontrolpoli = document.getElementById("kontrolpoli").value;
			var rujuk = document.getElementById("rujuk").value;

			$.ajax({
                url: "<?php echo site_url(); ?>/rme/savekesimpulan",
                type: "GET",
                data: {
					no_rm : no_rm,
					notransaksi : notransaksi,
					kode_dokter : kode_dokter,
                    dirawat: dirawat,
                    pulang: pulang,
                    izinDokter: izinDokter,
                    konsul: konsul,
                    terapipulang: terapipulang,
					kontrolpoli : kontrolpoli,
					rujuk : rujuk
                },
                success: function(ajaxData) {
                    swal('Simpan Data Berhasil');
                    },
                error: function(ajaxData) {
                    swal('Simpan Data Gagal');
                }
            });
		}


		function saveedukasi() {
			var no_rm = document.getElementById("no_rm").value;
			var kode_dokter = document.getElementById("kode_dokter").value;
			var notransaksi = document.getElementById("notransaksi").value;
			var edukasi = document.getElementById("edukasipulang").value;
			var pasien = $("#pasien").prop("checked") ? 1 : 0;
			var keluarga = $("#keluarga").prop("checked") ? 1 : 0;
			var tidak = $("#tidak").prop("checked") ? 1 : 0;
			var edukasitidakkarena = document.getElementById("edukasitidakkarena").value;
			var membaik = $("#membaik").prop("checked") ? 1 : 0;
			var memburuk = $("#memburuk").prop("checked") ? 1 : 0;
			var tetapmasihsakit = $("#tetapmasihsakit").prop("checked") ? 1 : 0;
			var meninggal = $("#meninggal").prop("checked") ? 1 : 0;
			var jammeninggal = document.getElementById("jammeninggal").value;
			var pulangtd = document.getElementById("pulangtd").value;
			var pulangnadi = document.getElementById("pulangnadi").value;
			var pulangrr = document.getElementById("pulangrr").value;
			var pulangs = document.getElementById("pulangs").value;

			$.ajax({
                url: "<?php echo site_url(); ?>/rme/saveedukasi",
                type: "GET",
                data: {
					no_rm : no_rm,
					notransaksi : notransaksi,
					kode_dokter : kode_dokter,
                    edukasi: edukasi,
                    pasien: pasien,
					keluarga: keluarga,
                    tidak: tidak,
                    edukasitidakkarena: edukasitidakkarena,
                    membaik: membaik,
                    memburuk: memburuk,
                    tetapmasihsakit: tetapmasihsakit,
                    meninggal: meninggal,
                    jammeninggal: jammeninggal,
					pulangtd : pulangtd,
					pulangnadi : pulangnadi,
					pulangrr : pulangrr,
					pulangs : pulangs
                },
                success: function(ajaxData) {
                    swal('Simpan Data Berhasil');
                    },
                error: function(ajaxData) {
                    swal('Simpan Data Gagal');
                }
            });
		}


    const datangSendiriCheckbox = document.getElementById('datangSendiri');
    const rujukanDariCheckbox = document.getElementById('rujukandari');
    const isianText = document.getElementById('isian');

    datangSendiriCheckbox.addEventListener('change', function() {
        if (this.checked) {
            rujukanDariCheckbox.checked = false;
            isianText.disabled = true;
        }
    });

    rujukanDariCheckbox.addEventListener('change', function() {
        if (this.checked) {
            datangSendiriCheckbox.checked = false;
            isianText.disabled = false;
        } else {
            isianText.disabled = true;
        }
    });



    const autoCheckbox = document.getElementById('Auto');
    const alloCheckbox = document.getElementById('Allo');
    const allotextText = document.getElementById('Allotext');

    autoCheckbox.addEventListener('change', function() {
        if (this.checked) {
            alloCheckbox.checked = false;
            allotextText.disabled = true;
        }
    });

    alloCheckbox.addEventListener('change', function() {
        if (this.checked) {
            autoCheckbox.checked = false;
            allotextText.disabled = false;
        } else {
            allotextText.disabled = true;
        }
    });


    const preventifCheckbox = document.getElementById('preventif');
    const paliatifCheckbox = document.getElementById('paliatif');
    const kuratifCheckbox = document.getElementById('kuratif');
    const rehabilitatipCheckbox = document.getElementById('rehabilitatip');

    preventifCheckbox.addEventListener('change', function() {
        if (this.checked) {
            paliatifCheckbox.checked = false;
            kuratifCheckbox.checked = false;
            rehabilitatipCheckbox.checked = false;
        }
    });

    paliatifCheckbox.addEventListener('change', function() {
        if (this.checked) {
            preventifCheckbox.checked = false;
            kuratifCheckbox.checked = false;
            rehabilitatipCheckbox.checked = false;
        }
    });

    kuratifCheckbox.addEventListener('change', function() {
        if (this.checked) {
            preventifCheckbox.checked = false;
            paliatifCheckbox.checked = false;
            rehabilitatipCheckbox.checked = false;
        }
    });

    rehabilitatipCheckbox.addEventListener('change', function() {
        if (this.checked) {
            preventifCheckbox.checked = false;
            paliatifCheckbox.checked = false;
            kuratifCheckbox.checked = false;
        }
    });


	const alergitidakCheckbox = document.getElementById('alergitidak');
    const alergiyaCheckbox = document.getElementById('alergiya');
    const alergitextText = document.getElementById('alergitext');

    alergitidakCheckbox.addEventListener('change', function() {
        if (this.checked) {
            alergiyaCheckbox.checked = false;
            alergitextText.disabled = true;
        }
    });

    alergiyaCheckbox.addEventListener('change', function() {
        if (this.checked) {
            alergitidakCheckbox.checked = false;
            alergitextText.disabled = false;
        } else {
            alergitextText.disabled = true;
        }
    });

	function checkKondisi(clickedCheckbox) {
        var checkboxes = document.querySelectorAll('input[name="kondisi"]');
        
        checkboxes.forEach(function(checkbox) {
            if (checkbox !== clickedCheckbox) {
                checkbox.checked = false;
            }
        });
    }

    function checkKesadaran(clickedCheckbox) {
        var checkboxes = document.querySelectorAll('input[name="kesadaran"]');
        
        checkboxes.forEach(function(checkbox) {
            if (checkbox !== clickedCheckbox) {
                checkbox.checked = false;
            }
        });
    }

	function checkNyeri(clickedCheckbox) {
        var checkboxes = document.querySelectorAll('input[name="nyerirasa"]');
        
        checkboxes.forEach(function(checkbox) {
            if (checkbox !== clickedCheckbox) {
                checkbox.checked = false;
            }
        });
    }

	function checkSifat(clickedCheckbox) {
        var checkboxes = document.querySelectorAll('input[name="sifat"]');
        
        checkboxes.forEach(function(checkbox) {
            if (checkbox !== clickedCheckbox) {
                checkbox.checked = false;
            }
        });
    }

	function kualitasnyeri(clickedCheckbox) {
        var checkboxes = document.querySelectorAll('input[name="kualitasnyeri"]');
        
        checkboxes.forEach(function(checkbox) {
            if (checkbox !== clickedCheckbox) {
                checkbox.checked = false;
            }
        });
    }

	function Frekuensi(clickedCheckbox) {
        var checkboxes = document.querySelectorAll('input[name="frekuensi"]');
        
        checkboxes.forEach(function(checkbox) {
            if (checkbox !== clickedCheckbox) {
                checkbox.checked = false;
            }
        });
    }

	function Menjalar(checkbox) {
		var textInput = document.getElementById('menjalarke');
		var checkboxTidak = document.getElementById('menjalartidak');
		var checkboxYa = document.getElementById('menjalarya');

		if (checkbox.id === 'menjalartidak' && checkbox.checked) {
			textInput.disabled = true;
			checkboxYa.checked = false;
		} else if (checkbox.id === 'menjalarya' && checkbox.checked) {
			textInput.disabled = false;
			checkboxTidak.checked = false;
		} else {
			textInput.disabled = true;
		}
	}

	function ToggleDirawat(checkbox) {
		var konsulInput = document.getElementById('konsul');
		if (checkbox.checked) {
			konsulInput.disabled = false;
		} else {
			konsulInput.value = ""; // Kosongkan nilai input
			konsulInput.disabled = true;
		}
	}

	function TogglePulang(checkbox) {
		var konsulInput = document.getElementById('konsul');
		var izinDokterCheckbox = document.getElementById('izinDokter');
		var permintaanSendiriCheckbox = document.getElementById('permintaanSendiri');
		if (checkbox.checked) {
			izinDokterCheckbox.disabled = false;
			permintaanSendiriCheckbox.disabled = false;
			konsulInput.checked = false; 
		} else {
			izinDokterCheckbox.checked = false; // Uncheck Izin Dokter
			permintaanSendiriCheckbox.checked = false; // Uncheck Permintaan Sendiri
			izinDokterCheckbox.disabled = true;
			permintaanSendiriCheckbox.disabled = true;
		}
	}



	// ==================
	
	const checkboxes = document.querySelectorAll('input[name="kondisi"]');
    const jamMeninggalTextbox = document.getElementById('jammeninggal');

    checkboxes.forEach((checkbox) => {
        checkbox.addEventListener('change', function() {
            checkboxes.forEach((cb) => {
                if (cb !== this) {
                    cb.checked = false;
                }
            });

            if (this.id === 'meninggal') {
                jamMeninggalTextbox.disabled = !this.checked;
            } else {
                jamMeninggalTextbox.disabled = true;
            }
        });
    });

	// ====================== open form =============

	function modaldetailtutup() {
		$("#detailmodal").remove();
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

function tambahterapi() {
	var no_rm = document.getElementById("no_rm").value;
	var notransaksi = document.getElementById("notransaksi").value;
	
		$.ajax({
			url: "<?php echo site_url();?>/rme/addrecordterapi",
			type: "GET",
			data : {
					no_rm : no_rm, 
					notransaksi : notransaksi, 
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

function bukaformterapi(id) {
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

</script>

