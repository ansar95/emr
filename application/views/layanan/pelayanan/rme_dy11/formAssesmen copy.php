 <div class="modal-dialog modal-xl modal-dialog-centered" style="margin: 0 auto;">
    <div class="modal-content">
        <div class="box box-default box-solid" id="kotakform">
			<div class="modal-header p-1 pl-3 align-text-bottom">
				<br>
				<h6><span style="color: red; font-weight: bold;">Assesmen Awal Rawat Jalan</span></h6>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<input type="hidden" class="form-control" disabled name="idnya" id="idnya" value="<?php echo $dtsoap->id; ?>">
						<input type="hidden" class="form-control" disabled name="no_rm" id="no_rm" value="<?php echo $dtsoap->no_rm; ?>">	
							<!-- =========mulai assesment ====== -->
							<form id="myForm">
									<div class="col-md-12">
									<!-- <h6><span style="color: red;">ASSESMEN AWAL RAWAT JALAN</span></h6> -->
									<div class="row mt-1 mb-1">
										<div class="col-md-6 text-left">
											<button type="button" id="disableButton" class="btn btn-primary">Update</button>
										</div>
									</div>
									
									<div class="row">
										<div class="col-md-12">
											<div class="form-group row col-spacing-row">
												<label class="col-md-6 col-spacing-row">Keluhan Utama</label>
												<label class="col-md-6 col-spacing-row">Riwayat Penyakit Sekarang</label>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group row col-spacing-row">
												<div class="col-md-6">
													<textarea rows="3" name="assKeluhanutama" id="assKeluhanutama" class="form-control" ></textarea>
												</div>
												<div class="col-md-6">
													<textarea rows="3" name="assRiwayatsekarang" id="assRiwayatsekarang" class="form-control" ></textarea>
												</div>
											</div>
										</div>
									</div>	

									<div class="row">
										<div class="col-md-12">
											<div class="form-group row col-spacing-row">
												<label class="col-md-6 col-spacing-row">Riwayat Penyakit Dahulu</label>
												<label class="col-md-1 col-spacing-row">Alergi</label>
												<div class="col-md-5">
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="assalergi" id="assalergiTidak" value="1" >
														<label class="form-check-label" for="assalergiTidak">Tidak</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="assalergi" id="assalergiYa" value="2" >
														<label class="form-check-label" for="assalergiYa">Ya</label>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group row col-spacing-row">
												<div class="col-md-6">
													<textarea rows="3" name="assRiwayatdahulu" id="assRiwayatdahulu" class="form-control" ></textarea>
												</div>
												<div class="col-md-6">
													<textarea rows="3" name="assAlergi" id="assAlergi" class="form-control" ></textarea>
												</div>
											</div>
										</div>
									</div>
									
									<div class="mt-3">
										<h6><span style="color: black; font-style: italic;">Pemeriksaan Fisik</span></h6>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group row col-spacing-row">
												<label class="col-md-2 col-form-label">Kesadaran</label>
												<div class="col-md-3">
													<select class="form-control"  style="width: 100%;" name="assKesadaran" id="assKesadaran" > 
														<option value="-">--- pilih ---</option>
														<option value="Compos Mentis">Compos Mentis</option>
														<option value="Apatis">Apatis</option>
														<option value="Delirium">Delirium</option>
														<option value="Somnolen">Somnolen</option>
														<option value="Sopor">Sopor</option>
														<option value="Semi Koma">Semi Koma</option>
													</select>
												</div>
												<div class="col-md-7">
													<input type="text" class="form-control"  name="assKesadaranlainnya" id="assKesadaranlainnya" >
												</div>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-md-12">
											<div class="form-group row col-spacing-row">
												<label class="col-md-2 col-form-label">Kesadaran Umum</label>
												<div class="col-md-10">
													<input type="text" class="form-control"  name="assKesadaranumum" id="assKesadaranumum" >
												</div>
											</div>
										</div>
									</div>
									
									<div class="row">
										<div class="col-md-12">
											<div>
												<div class="form-group row col-spacing-row">
													<label class="col-md-1 col-form-label">Suhu(C)</label>
													<div class="col-md-2">
														<input type="text" class="form-control"  name="assSuhu" id="assSuhu" >
													</div>
													<label class="pl-0 col-md-1 col-form-label">Tinggi(Cm)</label>
													<div class="col-md-2">
														<input type="text" class="form-control"  name="assTinggi" id="assTinggi" >
													</div>
													<label class="col-md-1 col-form-label">Berat(Kg)</label>
													<div class="col-md-2">
														<input type="text" class="form-control"  name="aasBerat" id="aasBerat" >
													</div>
													<label class="col-md-1 col-form-label">Tensi</label>
													<div class="col-md-2">
														<input type="text" class="form-control"  name="assTensi" id="assTensi" >
													</div>
												</div>
												<div class="form-group row col-spacing-row">
													<label class="col-md-1 col-form-label">Nadi(mnt)</label>
													<div class="col-md-2">
														<input type="text" class="form-control"  name="aasNadi" id="aasNadi" >
													</div>
													<label class="pl-0 col-md-1 col-form-label">Respirasi(mnt)</label>
													<div class="col-md-2">
														<input type="text" class="form-control"  name="assRespirasi" id="assRespirasi" >
													</div>
													<label class="col-md-1 col-form-label">SpO2(%)</label>
													<div class="col-md-2">
														<input type="text" class="form-control"  name="assSpo2" id="assSpo2" >
													</div>
													<label class="col-md-1 col-form-label">GCS(EVM)</label>
													<div class="col-md-2">
														<input type="text" class="form-control"  name="assGcs" id="assGcs" >
													</div>
												</div>
											</div>
										</div>
									</div>
										
									<div class="mt-3">
										<h6><span style="color: black; font-style: italic;">Status Psikologis, Sosial dan Spiritual</span></h6>
									</div>

									<div class="row">
										<div class="col-md-12">
											<div class="form-group row col-spacing-row">
												<label class="col-md-2 col-form-label">Saudara</label>
												<div class="col-md-10">
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="saudara" id="kandungRadio" value="1" >
														<label class="form-check-label" for="kandungRadio">Kandung</label>
													</div>
													<div class="form-check form-check-inline">
														<input type="text" class="form-control col-form-label"  name="jumlahkandung" id="jumlahkandung" >
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="saudara" id="tiriRadio" value="2" >
														<label class="form-check-label" for="tiriRadio">Tiri</label>
													</div>
													<div class="form-check form-check-inline">
														<input type="text" class="form-control col-form-label"  name="jumlahtiri" id="jumlahtiri" >
													</div>
												</div>
											</div>
										</div>
									</div>
									
									<div class="row">
										<div class="col-md-12">
											<div class="form-group row col-spacing-row">
												<label class="col-md-2 col-form-label">Tinggal Bersama</label>
												<div class="col-md-10">
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="tinggalBersama" id="orangTuaRadio" value="1">
														<label class="form-check-label" for="orangTuaRadio">Orang Tua</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="tinggalBersama" id="lainnyaRadio" value="2">
														<label class="form-check-label" for="lainnyaRadio">Lainnya</label>
													</div>
													<div class="form-check form-check-inline">
														<input type="text" class="form-control col-form-label"  name="jumlahLainnya" id="jumlahLainnya" >

													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-md-12">
											<div class="form-group row col-spacing-row">
												<label class="col-md-2 col-form-label">Bicara</label>
												<div class="col-md-10">
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="bicara" id="jelasRadio" value="1">
														<label class="form-check-label" for="jelasRadio">Jelas</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="bicara" id="tidakDimengertiRadio" value="2">
														<label class="form-check-label" for="tidakDimengertiRadio">Tidak Dapat Dimengerti</label>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-md-12">
											<div class="form-group row col-spacing-row">
												<label class="col-md-2 col-form-label">Komunikasi</label>
												<div class="col-md-10">
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="komunikasi" id="verbalRadio" value="1">
														<label class="form-check-label" for="verbalRadio">Verbal</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="komunikasi" id="nonVerbalRadio" value="2">
														<label class="form-check-label" for="nonVerbalRadio">Non Verbal</label>
													</div>
												</div>
											</div>
										</div>
									</div>

									
									<div class="row">
										<div class="col-md-12">
											<div class="form-group row col-spacing-row">
												<label class="col-md-2 col-form-label">Status Emosional</label>
												<div class="col-md-10">
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="statusEmosional" id="stabilRadio" value="1">
														<label class="form-check-label" for="stabilRadio">Stabil</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="statusEmosional" id="tenangRadio" value="2">
														<label class="form-check-label" for="tenangRadio">Tenang</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="statusEmosional" id="cemasRadio" value="3">
														<label class="form-check-label" for="cemasRadio">Cemas</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="statusEmosional" id="takutRadio" value="4">
														<label class="form-check-label" for="takutRadio">Takut</label>
													</div>
												</div>
											</div>
										</div>
									</div>


									<div class="row">
										<div class="col-md-12">
											<div class="form-group row col-spacing-row">
												<label class="col-md-3 col-form-label">Pernah Mengalami Gangguan Jiwa</label>
												<div class="col-md-9">
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="riwayatGangguanJiwa" id="tidakRadio" value="1">
														<label class="form-check-label" for="tidakRadio">Tidak</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="riwayatGangguanJiwa" id="yaRadio" value="2">
														<label class="form-check-label" for="yaRadio">Ya</label>
													</div>
													<div class="form-check form-check-inline">
														<input type="text" class="form-control" id="idtahun" name="idtahun" placeholder="Tahun" >
													</div>
												</div>
											</div>
										</div>
									</div>
									
									<div class="row">
										<div class="col-md-12">
											<div class="form-group row col-spacing-row">
												<label class="col-md-2 col-form-label">Riwayat Trauma</label>
												<div class="col-md-10">
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="riwayatTrauma" id="tidakAdaRadio" value="1">
														<label class="form-check-label" for="tidakAdaRadio">Tidak ada</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="riwayatTrauma" id="aniayaFisikRadio" value="2">
														<label class="form-check-label" for="aniayaFisikRadio">Aniaya Fisik</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="riwayatTrauma" id="psikologisRadio" value="3">
														<label class="form-check-label" for="psikologisRadio">Psikologis</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="riwayatTrauma" id="kdrtRadio" value="4">
														<label class="form-check-label" for="kdrtRadio">KDRT</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="riwayatTrauma" id="aniayaSexRadio" value="5">
														<label class="form-check-label" for="aniayaSexRadio">Aniaya Sex/Perkosaan</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="riwayatTrauma" id="tindakanKriminalRadio" value="6">
														<label class="form-check-label" for="tindakanKriminalRadio">Tindakan Kriminal</label>
													</div>
													<div class="form-check form-check-inline">
														<input type="text" class="form-control" id="idkriminaltext" name="idkriminaltext" placeholder="Keterangan" >
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-md-12">
											<div class="form-group row col-spacing-row">
												<label class="col-md-2 col-form-label">Alam Perasaan</label>
												<div class="col-md-10">
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="alamPerasaan" id="sedihRadio" value="1">
														<label class="form-check-label" for="sedihRadio">Sedih</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="alamPerasaan" id="putusAsaRadio" value="2">
														<label class="form-check-label" for="putusAsaRadio">Putus Asa</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="alamPerasaan" id="ketakutanRadio" value="3">
														<label class="form-check-label" for="ketakutanRadio">Ketakutan</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="alamPerasaan" id="gembiraBerlebihanRadio" value="4">
														<label class="form-check-label" for="gembiraBerlebihanRadio">Gembira Berlebihan</label>
													</div>
												</div>
											</div>
										</div>
									</div>
									
									<div class="row">
										<div class="col-md-12">
											<div class="form-group row col-spacing-row">
												<label class="col-md-3 col-form-label">Interaksi Selama Wawancara</label>
												<div class="col-md-9">
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="interaksiWawancara" id="kooperatifRadio" value="1">
														<label class="form-check-label" for="kooperatifRadio">Kooperatif</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="interaksiWawancara" id="bermusuhanRadio" value="2">
														<label class="form-check-label" for="bermusuhanRadio">Bermusuhan</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="interaksiWawancara" id="tidakKooperatifRadio" value="3">
														<label class="form-check-label" for="tidakKooperatifRadio">Tidak Kooperatif</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="interaksiWawancara" id="mudahTersinggungRadio" value="4">
														<label class="form-check-label" for="mudahTersinggungRadio">Mudah Tersinggung</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="interaksiWawancara" id="kontakMataKurangRadio" value="5">
														<label class="form-check-label" for="kontakMataKurangRadio">Kontak Mata Kurang</label>
													</div>
												</div>
											</div>
										</div>
									</div>
									
									<div class="row">
										<div class="col-md-12">
											<div class="form-group row col-spacing-row">
												<label class="col-md-3 col-form-label">Kebutuhan Spiritual Pasien</label>
												<div class="col-md-9">
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="kebutuhanSpiritual" id="baikSpiritualRadio" value="1">
														<label class="form-check-label" for="baikSpiritualRadio">Baik</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="kebutuhanSpiritual" id="tidakSpiritualRadio" value="2">
														<label class="form-check-label" for="tidakSpiritualRadio">Tidak</label>
													</div>
													<div class="form-check form-check-inline">
														<input type="text" class="form-control" id="spiritualText" name="spiritualText" placeholder="Keterangan" >
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-md-12">
											<div class="form-group row col-spacing-row">
												<label class="col-md-3 col-form-label">Pasien Membutuhkan Spiritual Agama</label>
												<div class="col-md-9">
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="butuhAgama" id="tidakAgamaRadio" value="1">
														<label class="form-check-label" for="tidakAgamaRadio">Tidak</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="butuhAgama" id="yaAgamaRadio" value="2">
														<label class="form-check-label" for="yaAgamaRadio">Ya</label>
													</div>
													<div class="form-check form-check-inline">
														<input type="text" class="form-control" id="agamaText" name="agamaText" placeholder="Agama" >
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-md-12">
											<div class="form-group row col-spacing-row">
												<label class="col-md-3 col-form-label">Pasien Membutuhkan Bantuan dalam Menjalankan Ibadah</label>
												<div class="col-md-9">
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="butuhBantuanIbadah" id="yaBantuanIbadahRadio" value="1">
														<label class="form-check-label" for="yaBantuanIbadahRadio">Ya</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="butuhBantuanIbadah" id="tidakBantuanIbadahRadio" value="2">
														<label class="form-check-label" for="tidakBantuanIbadahRadio">Tidak</label>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="mt-3">
										<h6><span style="color: black; font-style: italic;">Status Ekonomi</span></h6>
									</div>

									<div class="row">
										<div class="col-md-12">
											<div class="form-group row col-spacing-row">
												<label class="col-md-2 col-form-label">Status Pernikahan</label>
												<div class="col-md-10">
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="statusPernikahan" id="belumMenikahRadio" value="1">
														<label class="form-check-label" for="belumMenikahRadio">Belum Menikah</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="statusPernikahan" id="menikahRadio" value="2">
														<label class="form-check-label" for="menikahRadio">Menikah</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="statusPernikahan" id="jandaDudaRadio" value="3">
														<label class="form-check-label" for="jandaDudaRadio">Janda / Duda</label>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-md-12">
											<div class="form-group row col-spacing-row">
												<label class="col-md-2 col-form-label">Pekerjaan</label>
												<div class="col-md-10">
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="pekerjaan" id="pnsRadio" value="1">
														<label class="form-check-label" for="pnsRadio">PNS</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="pekerjaan" id="swastaRadio" value="2">
														<label class="form-check-label" for="swastaRadio">Swasta</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="pekerjaan" id="tniPolriRadio" value="3">
														<label class="form-check-label" for="tniPolriRadio">TNI/POLRI</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="pekerjaan" id="lainnyakerjaRadio" value="4">
														<label class="form-check-label" for="lainnyakerjaRadio">Lainnya</label>
													</div>
													<div class="form-check form-check-inline">
														<input type="text" class="form-control" id="pekerjaanLainnyaText" name="pekerjaanLainnyaText" placeholder="Pekerjaan Lainnya" >
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-md-12">
											<div class="form-group row col-spacing-row">
												<label class="col-md-2 col-form-label">Nyeri</label>
												<div class="col-md-10">
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="nyeri" id="tidakNyeriRadio" value="1">
														<label class="form-check-label" for="tidakNyeriRadio">Tidak</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="nyeri" id="yaNyeriRadio" value="2">
														<label class="form-check-label" for="yaNyeriRadio">Ya</label>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-md-12">
											<div class="form-group row col-spacing-row">
												<label class="col-md-2 col-form-label">Sifat Nyeri</label>
												<div class="col-md-10">
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="sifatNyeri" id="akutRadio" value="1">
														<label class="form-check-label" for="akutRadio">Akut</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="sifatNyeri" id="kronisRadio" value="2">
														<label class="form-check-label" for="kronisRadio">Kronis</label>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<img src="../assets/image/rm/nyeri.png" alt="Gambar Nyeri" style="max-width: 100%;">
											<!-- <?php echo site_url();?>/../assets/image/fisio/hasil_awal.png' -->
										</div>
									</div>

									<div class="row">
										<div class="col-md-12 mt-2">
											<div class="form-group row col-spacing-row">
												<label class="col-md-2 col-form-label">Kualitas Nyeri</label>
												<div class="col-md-10">
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="kualitasNyeri" id="nyeriTumpulRadio" value="1">
														<label class="form-check-label" for="nyeriTumpulRadio">Nyeri Tumpul</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="kualitasNyeri" id="nyeriTajamRadio" value="2">
														<label class="form-check-label" for="nyeriTajamRadio">Nyeri Tajam</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="kualitasNyeri" id="panasTerbakarRadio" value="3">
														<label class="form-check-label" for="panasTerbakarRadio">Panas/Terbakar</label>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-md-12">
											<div class="form-group row col-spacing-row">
												<label class="col-md-2 col-form-label">Menjalar</label>
												<div class="col-md-10">
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="menjalar" id="tidakMenjalarRadio" value="1">
														<label class="form-check-label" for="tidakMenjalarRadio">Tidak</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="menjalar" id="yaMenjalarRadio" value="2">
														<label class="form-check-label" for="yaMenjalarRadio">Ya, menjalar ke</label>
													</div>
													<div class="form-check form-check-inline">
														<input type="text" class="form-control" id="menjalarKeText" name="menjalarKeText" placeholder="Lokasi Menjalar" >
													</div>
												</div>
											</div>
										</div>
									</div>


									<div class="row">
										<div class="col-md-12">
											<div class="form-group row col-spacing-row">
												<label class="col-md-2 col-form-label">Skor Nyeri</label>
												<div class="col-md-1">
													<input type="number" class="form-control" id="skorNyeri" name="skorNyeri" min="0" max="10" placeholder="(0-10)">
												</div>
											</div>
										</div>
									</div>


									<div class="row">
										<div class="col-md-12">
											<div class="form-group row col-spacing-row">
												<label class="col-md-2 col-form-label">Frekuensi Nyeri</label>
												<div class="col-md-10">
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="frekuensiNyeri" id="jarangRadio" value="1">
														<label class="form-check-label" for="jarangRadio">Jarang</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="frekuensiNyeri" id="hilangTimbulRadio" value="2">
														<label class="form-check-label" for="hilangTimbulRadio">Hilang Timbul</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="frekuensiNyeri" id="terusMenerusRadio" value="3">
														<label class="form-check-label" for="terusMenerusRadio">Terus Menerus</label>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-md-12">
											<div class="form-group row col-spacing-row">
												<label class="col-md-2 col-form-label">Nyeri Mempengaruhi</label>
												<div class="col-md-10">
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="nyeriMempengaruhi" id="tidurRadio" value="1">
														<label class="form-check-label" for="tidurRadio">Tidur</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="nyeriMempengaruhi" id="aktifFisikRadio" value="2">
														<label class="form-check-label" for="aktifFisikRadio">Aktif/Fisik</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="nyeriMempengaruhi" id="konsentrasiRadio" value="3">
														<label class="form-check-label" for="konsentrasiRadio">Konsentrasi</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="nyeriMempengaruhi" id="emosiRadio" value="4">
														<label class="form-check-label" for="emosiRadio">Emosi</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="nyeriMempengaruhi" id="nafsuMakanRadio" value="5">
														<label class="form-check-label" for="nafsuMakanRadio">Nafsu Makan</label>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-md-12">
											<div class="form-group row col-spacing-row">
												<label class="col-md-2 col-form-label">Saran</label>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group row col-spacing-row">
												<div class="col-md-12">
												<textarea rows="3" name="saran" id="saran" class="form-control" ></textarea>
												</div>
											</div>
										</div>
									</div>

									<div class="mt-3">
										<h6><span style="color: black; font-style: italic;">Pengkajian Resiko jatuh</span></h6>
									</div>

									<div class="row">
										<div class="col-md-12">
											<div class="form-group row col-spacing-row">
												<div class="col-md-12">
													<div class="form-check form-check-inline">
														<label class="col-form-label">Perhatikan cara berjalan pasien saat duduk di kursi, Apakah pasien tampak tidak seimbang/sempoyongan </label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="resikoJatuhA" id="yaresikojatuhA" value="1">
														<label class="form-check-label" for="yaresikojatuhA">Ya</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="resikoJatuhA" id="tidakresikojatuhA" value="2">
														<label class="form-check-label" for="tidakresikojatuhA">Tidak</label>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-md-12">
											<div class="form-group row col-spacing-row">
												<div class="col-md-12">
													<div class="form-check form-check-inline">
														<label class="col-form-label">Apakah pasien memegang pinggiran kursi atau meja atau benda lainnya sebagai penopang saat akan duduk </label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="resikoJatuhB" id="yaresikoJatuhB" value="1">
														<label class="form-check-label" for="yaresikoJatuhB">Ya</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="resikoJatuhB" id="tidakresikoJatuhB" value="2">
														<label class="form-check-label" for="tidakresikoJatuhB">Tidak</label>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-md-12">
											<div class="form-group row col-spacing-row">
												<label class="col-md-1 col-form-label">Hasil</label>
												<div class="col-md-11">
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="hasil" id="tidakBeresikoRadio" value="1">
														<label class="form-check-label" for="tidakBeresikoRadio">Tidak Beresiko (tidak ditemukan a dan b)</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="hasil" id="resikoRendahRadio" value="2">
														<label class="form-check-label" for="resikoRendahRadio">Resiko Rendah (ditemukan a atau b)</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="hasil" id="resikoTinggiRadio" value="3">
														<label class="form-check-label" for="resikoTinggiRadio">Resiko Tinggi (ditemukan a dan b)</label>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-md-12">
											<div class="form-group row col-spacing-row">
												<label class="col-md-2 col-form-label">Info Dokter</label>
												<div class="col-md-10">
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="infoDokter" id="yaJamRadio" value="1">
														<label class="form-check-label" for="yaJamRadio">Ya, Jam</label>
														<input type="text" class="form-control" id="jamInfoDokter" name="jamInfoDokter" placeholder="Masukkan jam" >

													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="infoDokter" id="tidakJamRadio" value="2">
														<label class="form-check-label" for="tidakJamRadio">Tidak</label>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-md-12">
											<div class="form-group row col-spacing-row">
												<label class="col-md-2 col-form-label">Hasil Skrening</label>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group row col-spacing-row">
												<div class="col-md-12">
												<textarea rows="3" name="hasilSkrining" id="hasilSkrining" class="form-control" ></textarea>
												</div>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-md-12">
											<div class="form-group row col-spacing-row">
												<label class="col-md-2 col-form-label">Saran</label>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group row col-spacing-row">
												<div class="col-md-12">
												<textarea rows="3" name="resikoJatuhSaran" id="resikoJatuhSaran" class="form-control" ></textarea>
												</div>
											</div>
										</div>
									</div>
									<div class="mt-3">
										<h6><span style="color: black; font-style: italic;">Skrening Gizi</span></h6>
									</div>
									
									<div class="row">
										<div class="col-md-12">
											<div class="form-group row col-spacing-row">
												<label class="col-md-1 col-form-label">BB</label>
												<div class="col-md-1">
													<input type="text" class="form-control" id="bb" name="bb" placeholder="Kg">
												</div>
												<label class="col-md-1 col-form-label">PB/TB</label>
												<div class="col-md-1">
													<input type="text" class="form-control" id="pbtb" name="pbtb" placeholder="cm">
												</div>
												<label class="col-md-1 col-form-label">IMT</label>
												<div class="col-md-1">
													<input type="text" class="form-control" id="imt" name="imt" placeholder="BB/TB(M)">
												</div>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-md-12">
											<div class="form-group row col-spacing-row">
												<div class="col-md-12">
													<div class="form-check form-check-inline">
														<label class="col-form-label">Apakah pasien tampak kurus </label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="kurus" id="yakurus" value="1">
														<label class="form-check-label" for="yakurus">Ya</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="kurus" id="tidakkurus" value="2">
														<label class="form-check-label" for="tidakkurus">Tidak</label>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group row col-spacing-row">
												<div class="col-md-12">
													<div class="form-check form-check-inline">
														<label class="col-form-label">Apakah terjadi kenaikan atau penurunan berat badan 1 bulan terakhir </label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="turunBB" id="yaturunBB" value="1">
														<label class="form-check-label" for="yaturunBB">Ya</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="turunBB" id="tidakturunBB" value="2">
														<label class="form-check-label" for="tidakturunBB">Tidak</label>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-md-12">
											<div class="form-group row col-spacing-row">
												<div class="col-md-12">
													<div class="form-check form-check-inline">
														<label class="col-form-label">Apakah tasupan makanan menurun yang dikarenakan penurunan nafsu makan </label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="turunNafsuMakan" id="yaturunNafsuMakan" value="1">
														<label class="form-check-label" for="yaturunNafsuMakan">Ya</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="turunNafsuMakan" id="tidakturunNafsuMakan" value="2">
														<label class="form-check-label" for="tidakturunNafsuMakan">Tidak</label>
													</div>
												</div>
											</div>
										</div>
									</div>


									<div class="row">
										<div class="col-md-12">
											<div class="form-group row col-spacing-row">
												<label class="col-md-2 col-form-label">Hasil Skrening</label>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group row col-spacing-row">
												<div class="col-md-12">
												<textarea rows="3" name="giziSkriing" id="giziSkriing" class="form-control" ></textarea>
												</div>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-md-12">
											<div class="form-group row col-spacing-row">
												<label class="col-md-2 col-form-label">Saran</label>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group row col-spacing-row">
												<div class="col-md-12">
												<textarea rows="3" name="giziSaran" id="giziSaran" class="form-control" ></textarea>
												</div>
											</div>
										</div>
									</div>

									<div class="mt-3">
										<h6><span style="color: black; font-style: italic;">Assesmen Fungsional - Pengkajian Fungsi</span></h6>
									</div>
									<div>
										<h7><span style="color: black; font-style: italic;">Sensorik</span></h7>
									</div>

									<div class="row">
										<div class="col-md-4">
											<div class="form-group row col-spacing-row">
												<label class="col-md-4 col-form-label">Penglihatan</label>
												<div class="col-md-8">
													<select class="form-select" id="penglihatan" name="penglihatan" >
														<option value="1">Normal</option>
														<option value="2">Kabur</option>
														<option value="3">Kacamata</option>
														<option value="4">Lensa Kontak</option>
													</select>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group row col-spacing-row">
												<label class="col-md-4 col-form-label">Penciuman</label>
												<div class="col-md-8">
													<select class="form-select" id="penciuman" name="penciuman" >
														<option value="1">Normal</option>
														<option value="2">Tidak Normal</option>
													</select>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group row col-spacing-row">
												<label class="col-md-4 col-form-label">Pendengaran</label>
												<div class="col-md-8">
													<select class="form-select" id="pendengaran" name="pendengaran" >
														<option value="1">Normal</option>
														<option value="2">Tuli Kanan/Kiri</option>
														<option value="3">Alat Bantu Dengan Kanan/Kiri</option>
													</select>
												</div>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-md-4">
											<div class="form-group row col-spacing-row">
												<label class="col-md-4 col-form-label"><span style="color: black; font-style: italic;">Kognitif</span></label>
												<div class="col-md-8">
													<select class="form-select" id="kognitif" name="kognitif" >
														<option value="1">Normal</option>
														<option value="2">Pelupa</option>
														<option value="3">Bingung</option>
														<option value="4">Tidak dapat dimengerti</option>
													</select>
												</div>
											</div>
										</div>
									</div>
									<div>
										<h7><span style="color: black; font-style: italic;">Motorik</span></h7>
									</div>
									<div class="row">
										<div class="col-md-4">
											<div class="form-group row col-spacing-row">
												<label class="col-md-5 col-form-label">Aktifitas Sehari hari</label>
												<div class="col-md-7">
													<select class="form-select" id="aktifSeharihari" name="aktifSeharihari" >
														<option value="1">Mandiri</option>
														<option value="2">Bantuan Minimal</option>
														<option value="3">Bantuan</option>
														<option value="4">Ketergantungan Total</option>
													</select>
												</div>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-md-4">
											<div class="form-group row col-spacing-row">
												<label class="col-md-5 col-form-label">Berjalan</label>
												<div class="col-md-7">
													<select class="form-select" id="berjalan" name="berjalan" >
														<option value="1">Tidak ada kesulitan</option>
														<option value="2">Perlu Bantuan</option>
														<option value="3">Sering Jatuh</option>
														<option value="4">Kelumpuhan</option>
													</select>
												</div>
											</div>
										</div>
									</div>

									<div class="mt-3">
										<h6><span style="color: black; font-style: italic;">Discharge Planing</span></h6>
									</div>
									<div>
										<h7><span style="color: black; font-style: italic;">Saran</span></h7>
									</div>

									<div class="row">
										<div class="col-md-12">
											<div class="form-group row col-spacing-row">
												<label class="col-md-3 col-form-label">Pasien perlu pelayanan Home Care</label>
												<div class="col-md-9">
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="homeCare" id="homeCareYa" value="1">
														<label class="form-check-label" for="homeCareYa">Ya</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="homeCare" id="homeCareTidak" value="2">
														<label class="form-check-label" for="homeCareTidak">Tidak</label>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-md-12">
											<div class="form-group row col-spacing-row">
												<label class="col-md-3 col-form-label">Pasien perlu Pemasangan Implan</label>
												<div class="col-md-9">
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="implan" id="implanYa" value="1">
														<label class="form-check-label" for="implanYa">Ya</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="implan" id="implanTidak" value="2">
														<label class="form-check-label" for="implanTidak">Tidak</label>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group row col-spacing-row">
												<label class="col-md-4 col-form-label">Pasien ketika pulang perlu Perawatan di rumah</label>
												<div class="col-md-8">
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="perawatan" id="perawatanYa" value="1">
														<label class="form-check-label" for="perawatanYa">Ya</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="perawatan" id="perawatanTidak" value="2">
														<label class="form-check-label" for="perawatanTidak">Tidak</label>
													</div>
												</div>
											</div>
										</div>
									</div>


									<div class="row">
										<div class="col-md-12">
											<div class="form-group row col-spacing-row">
												<label class="col-md-2 col-form-label">Hasil Skrening</label>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group row col-spacing-row">
												<div class="col-md-12">
												<textarea rows="3" name="planningSkrining" id="planningSkrining" class="form-control" ></textarea>
												</div>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-md-12">
											<div class="form-group row col-spacing-row">
												<label class="col-md-2 col-form-label">Saran</label>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group row col-spacing-row">
												<div class="col-md-12">
												<textarea rows="3" name="planningSaran" id="planningSaran" class="form-control" ></textarea>
												</div>
											</div>
										</div>
									</div>

									<div class="mt-3">
										<h6><span style="color: black; font-style: italic;">Riwayat Penggunaan Obat</span></h6>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group row col-spacing-row">
												<label class="col-md-12 col-form-label">Isikan nama obat, jumlah, aturan pakai, tanggal mulai minum obat  dan keterangan lainnya</label>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group row col-spacing-row">
												<div class="col-md-12">
												<textarea rows="3" name="penggunaanObat" id="penggunaanObat" class="form-control" ></textarea>
												</div>
											</div>
										</div>
									</div>
									<div class="mt-3">
										<h6><span style="color: black; font-style: italic;">Pengkajian Medis</span></h6>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group row col-spacing-row">
												<label class="col-md-6 col-spacing-row">Status Generalis</label>
												<label class="col-md-6 col-spacing-row">Status Lokalis</label>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group row col-spacing-row">
												<div class="col-md-6">
													<textarea rows="3" name="statusGeneralis" id="statusGeneralis" class="form-control" ></textarea>
												</div>
												<div class="col-md-6">
													<textarea rows="3" name="statusLokalis" id="statusLokalis" class="form-control" ></textarea>
												</div>
											</div>
										</div>
									</div>	
									
									<div class="row">
										<div class="col-md-12">
											<div class="form-group row col-spacing-row">
												<label class="col-md-1 col-form-label" for="diagnosa">Diagnosa</label>
												<div class="col-md-5">
													<input type="text" class="form-control" id="diagnosa" name="diagnosa" placeholder="Masukkan Diagnosa">
												</div>
												<label class="col-md-2 col-form-label" for="diagnosaBanding">Diagnosa Banding</label>
												<div class="col-md-4">
													<input type="text" class="form-control" id="diagnosaBanding" name="diagnosaBanding" placeholder="Masukkan Diagnosa Banding">
												</div>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-md-12">
											<div class="form-group row col-spacing-row">
												<label class="col-md-6 col-spacing-row">Pemeriksaan Penunjang</label>
												<label class="col-md-6 col-spacing-row">Terapi</label>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group row col-spacing-row">
												<div class="col-md-6">
													<textarea rows="3" name="penunjang" id="penunjang" class="form-control" ></textarea>
												</div>
												<div class="col-md-6">
													<textarea rows="3" name="terapi" id="terapi" class="form-control" ></textarea>
												</div>
											</div>
										</div>
									</div>	

									<div class="mt-3">
										<h6><span style="color: black; font-style: italic;">Rencana Tindak Lanjut</span></h6>
									</div>

									<div class="row">
										<div class="col-md-12">
											<div class="form-group row col-spacing-row">
												<label class="col-md-2 col-form-label">Kontrol Ulang</label>
												<div class="col-md-10">
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="kontrolulang" id="kontrolulangYa" value="1">
														<label class="form-check-label" for="kontrolulangYa">Ya</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="kontrolulang" id="kontrolulangTidak" value="2">
														<label class="form-check-label" for="kontrolulangTidak">Tidak</label>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-md-12">
											<div class="form-group row col-spacing-row">
												<label class="col-md-2 col-form-label" for="rujukKe">Rujuk ke</label>
												<div class="col-md-2">
													<select class="form-control form-select" id="rujukKe" name="rujukKe">
														<option value="1">Rumah Sakit</option>
														<option value="2">Puskesmas</option>
														<option value="3">Klinik</option>
														<option value="4">Dokter Praktek</option>
													</select>
												</div>
												<div class="col-md-4">
													<input type="text" class="form-control" id="rujukke" name="rujukke" placeholder="Masukkan detail rujukan">
												</div>
											</div>
										</div>
									</div>

									<div class="mt-3">
										<h6><span style="color: black; font-style: italic;">Edukasi Pasien</span></h6>
										<h7><span style="color: black;">Edukasi awal disampaikan tentang diagnosis, rencana dan tujuan terapi kepada :</span></h7>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group row col-spacing-row">
												<div class="col-md-3">
													<select class="form-control form-select" id="edukasi" name="edukasi">
														<option value="1">Pasien</option>
														<option value="2">Tidak dapat memberikan edukasi</option>
														<option value="3">Keluarga</option>
													</select>
												</div>
												<div class="col-md-9">
													<input type="text" class="form-control" id="keteranganEdukasi" name="keteranganEdukasi" placeholder="Masukkan keterangan edukasi">
												</div>
											</div>
										</div>
									</div>

									<div class="row mt-4 mb-1">
										<div class="col-md-6 text-left">
											<button onclick="simpanassesmen();" class="btn btn-warning" id="tombolsimpan">Simpan</button>
										</div>
									</div>
								</form>

							<!-- selesai assesmen -->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>

function modalform() {
            $("#kotakform").append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
        }

function modalformtutup() {
            $(".overlay").remove();
        }

function tutupmodal() {
            $(function () {
                $("#formmodal").modal("toggle");
            });
        }

function updatesoap(id) {
	$('#tombolupdate').prop('disabled', true);
	$('#tombolsimpan').prop('disabled', false);
	$('#keluhanutama').prop('disabled', false);
	$('#riwayatsekarang').prop('disabled', false);
	$('#riwayatdahulu').prop('disabled', false);
	$('#alergi').prop('disabled', false);
	$('#suhu').prop('disabled', false);
	$('#tinggi').prop('disabled', false);
	$('#berat').prop('disabled', false);
	$('#tensi').prop('disabled', false);
	$('#respirasi').prop('disabled', false);
	$('#nadi').prop('disabled', false);
	$('#spo2').prop('disabled', false);
	$('#gcs').prop('disabled', false);
	$('#kesadaran').prop('disabled', false);
	$('#kesadaranlainnya').prop('disabled', false);
	$('#objektif').prop('disabled', false);
	$('#assesment').prop('disabled', false);
	$('#plan').prop('disabled', false);
	$('#instruksi').prop('disabled', false);
	$('#evaluasi').prop('disabled', false);
}


function simpansoap() {
	modalform();

	$('#keluhanutama').prop('disabled', true);
	$('#riwayatsekarang').prop('disabled', true);
	$('#riwayatdahulu').prop('disabled', true);
	$('#alergi').prop('disabled', true);
	$('#suhu').prop('disabled', true);
	$('#tinggi').prop('disabled', true);
	$('#berat').prop('disabled', true);
	$('#tensi').prop('disabled', true);
	$('#respirasi').prop('disabled', true);
	$('#nadi').prop('disabled', true);
	$('#spo2').prop('disabled', true);
	$('#gcs').prop('disabled', true);
	$('#kesadaran').prop('disabled', true);
	$('#kesadaranlainnya').prop('disabled', true);
	$('#objektif').prop('disabled', true);
	$('#assesment').prop('disabled', true);
	$('#plan').prop('disabled', true);
	$('#instruksi').prop('disabled', true);
	$('#evaluasi').prop('disabled', true);
	$('#icd').prop('disabled', true);
	$('#tombolbatal').prop('disabled', true);
	$('#tombolsave').prop('disabled', true);
	var no_rm = document.getElementById("no_rm").value;
	var id = document.getElementById("idnya").value;
	var keluhanutama = document.getElementById("keluhanutama").value;
	var riwayatsekarang = document.getElementById("riwayatsekarang").value;
	var riwayatdahulu = document.getElementById("riwayatdahulu").value;
	var alergi = document.getElementById("alergi").value;
	var suhu = document.getElementById("suhu").value;
	var tinggi = document.getElementById("tinggi").value;
	var berat = document.getElementById("berat").value;
	var tensi = document.getElementById("tensi").value;
	var respirasi = document.getElementById("respirasi").value;
	var nadi = document.getElementById("nadi").value;
	var spo2 = document.getElementById("spo2").value;
	var gcs = document.getElementById("gcs").value;
	var kesadaran = document.getElementById("kesadaran").value;
	var kesadaranlainnya = document.getElementById("kesadaranlainnya").value;
	var objektif = document.getElementById("objektif").value;
	var assesment = document.getElementById("assesment").value;
	var plan = document.getElementById("plan").value;
	var instruksi = document.getElementById("instruksi").value;
	var evaluasi = document.getElementById("evaluasi").value;
	// var diagnosa = $("#icd").val(); //multiple buka
	// var icd = diagnosa.join(";"); //multiple buka
	var diagnosa = $("#icd").val();
	var diagnosatext = $("#icd option:selected").text();

	$('#diagnosa').val(diagnosatext);
	


	$.ajax({
		url: "<?php echo site_url();?>/rme/simpandatasoap",
		type: "GET",
		data : {id: id,
				no_rm : no_rm,
				keluhanutama : keluhanutama,
				riwayatsekarang : riwayatsekarang,
				riwayatdahulu : riwayatdahulu,
				alergi : alergi,
				suhu : suhu,
				tinggi : tinggi,
				berat : berat,
				tensi : tensi,
				respirasi : respirasi,
				nadi : nadi,
				spo2 : spo2,
				gcs : gcs,
				kesadaran : kesadaran,
				kesadaranlainnya : kesadaranlainnya,
				objektif : objektif,
				assesment : assesment,
				plan : plan,
				instruksi : instruksi,
				evaluasi : evaluasi
				// diagnosa : diagnosa,
				// diagnosatext : diagnosatext
				},
		success: function (ajaxData){
			console.log(ajaxData);
			 var dt = JSON.parse(ajaxData);
                    $("#tabelsoap tbody tr").remove();
                    $("#tabelsoap tbody").append(dt.dtview);
                    modalformtutup();
                    tutupmodal();
		},
		error: function (ajaxData) {
			// modalloadtutup();
			console.log(ajaxData);
		}
	});	
	}

</script>
