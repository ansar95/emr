<link rel="stylesheet" href="../../assets/template_baru/dist/vendors/icheck/skins/all.css">

<div class="card">
	<div class="col-12 mt-4 ml-3">
		<div class="w-sm-100 mr-auto"><h6 class="mb-0" style="color: navy;">FORM ASESMEN AWAL RAWAT JALAN</h6></div>
	</div>
	<div class="col-12 mt-2 ml-3">
		<div class="tab-pane fade show" id="tabasesmenawalmedis" role="tabpanel">
			<nav>
				<div class="nav nav-tabs" id="subnav1" role="tablist">
					<a class="nav-item nav-link active" id="subtabanamnesist" data-toggle="tab" href="#anamnesis"
								role="tab" aria-controls="subnav1-1" aria-selected="true">Anamnesis dan Pemeriksaan Fisik</a>
								
					<a class="nav-item nav-link" id="subtabstatus" data-toggle="tab" href="#status"
								role="tab" aria-controls="subnav1-7" aria-selected="true">Status</a>

					<a class="nav-item nav-link" id="subtabnyeri" data-toggle="tab" href="#nyeri" role="tab"
								aria-controls="subnav1-4" aria-selected="false">Nyeri</a>

					<a class="nav-item nav-link" id="subtabresiko" data-toggle="tab" href="#resiko" role="tab"
								aria-controls="subnav1-5" aria-selected="false">Resiko Jatuh</a>

					<a class="nav-item nav-link" id="subtabgizi" data-toggle="tab" href="#gizi" role="tab"
								aria-controls="subnav1-9" aria-selected="false">Gizi</a>

					<a class="nav-item nav-link" id="subtabfungsional" data-toggle="tab" href="#fungsional" role="tab"
								aria-controls="subnav1-8" aria-selected="false">Asesmen Fungsional</a>

					<a class="nav-item nav-link" id="subtabkajianmedis" data-toggle="tab" href="#kajianmedis" role="tab"
								aria-controls="subnav1-6" aria-selected="false">Pengkajian Medis</a>
				</div>
				<div class="tab-content" id="subnav1-content">
					<div class="tab-pane fade show active" id="anamnesis" role="tabpanel" aria-labelledby="subtabanamnesis">
						<!-- anamnesis -->
						<div class="card">
							<div class="card-body">
								<div class="col-md-12 mt-2">
									<div class="form-group row col-spacing-row">
										<label class="col-md-4 col-spacing-row" style="color: red; font-size: 14px; font-weight: bold;">ANAMNESIS</label>
									</div>			
									<div class="form-group row col-spacing-row">
										<label class="col-md-4 col-spacing-row">Keluhan Utama</label>
										<label class="col-md-4 col-spacing-row">Riwayat Penyakit Sekarang</label>
										<label class="col-md-4 col-spacing-row">Riwayat Penyakit Dahulu</label>
									</div>			
									<div class="form-group row col-spacing-row">
										<div class="col-md-4">
											<textarea rows="3" name="keluhanutama" id="keluhanutama" class="form-control" ><?php echo $dtasawalrajal->keluhanutama;?></textarea>
										</div>
										<div class="col-md-4">
											<textarea rows="3" name="keluhansekarang" id="keluhansekarang" class="form-control" ><?php echo $dtasawalrajal->keluhansekarang;?></textarea>
										</div>
										<div class="col-md-4">
											<textarea rows="3" name="riwayatdahulu" id="riwayatdahulu" class="form-control" ><?php echo $dtasawalrajal->riwayatdahulu;?></textarea>
										</div>
									</div>	
									<div class="form-group row col-spacing-row mt-4">
										<div class="col-md-12">
											<label>Alergi</label>
											<label><input type="radio" class="state iradio_square-red ml-3" id="alergi-tidak" name="alergi" value="1"  <?php if ($dtasawalrajal->alergi == 1) {echo "checked";} ?>> Tidak</label>
											<label><input type="radio" class="state iradio_square-red" id="alergi-ya" name="alergi" value="2" <?php if ($dtasawalrajal->alergi == 2) {echo "checked";} ?>> Ya</label>
											<div class="form-check form-check-inline ml-3"> 
												<textarea id="alergitext" name="alergitext" rows="3" style="width: 800px;"></textarea>
											</div>
										</div>
									</div>
									<div class="form-group row col-spacing-row mt-4">
										<label class="col-md-4 col-spacing-row" style="color: red; font-size: 14px; font-weight: bold;">PEMERIKSAAN FISIK</label>
									</div>	
									<div class="form-group row col-spacing-row mt-2">
										<div class="col-md-12">
											<label class="col-form-label">Kesadaran </label>
											<label>
												<input type="radio" class="state iradio_square-red ml-3"
															id="composmentis" name="kesadaran" value="1"  <?php if ($dtasawalrajal->kesadaran == 1) {echo "checked";} ?>> Composmentis
											</label>
											<label>
												<input type="radio" class="state iradio_square-red ml-3"
															id="apatis" name="kesadaran" value="2" <?php if ($dtasawalrajal->kesadaran == 2) {echo "checked";} ?>> Apatis
											</label>
											<label>
												<input type="radio" class="state iradio_square-red ml-3"
															id="somnolen" name="kesadaran" value="3" <?php if ($dtasawalrajal->kesadaran == 3) {echo "checked";} ?>> Somnolen
											</label>
											<label>
												<input type="radio" class="state iradio_square-red ml-3"
															id="soporokoma" name="kesadaran" value="4" <?php if ($dtasawalrajal->kesadaran == 4) {echo "checked";} ?>> Soporous / koma
											</label>
											<label>
												<input type="radio" class="state iradio_square-red ml-3"
													id="lainnya" name="kesadaran" value="4" <?php if ($dtasawalrajal->kesadaran == 5) {echo "checked";} ?>> Lainnya
											</label>
											<div class="form-check form-check-inline ml-3"> 
												<input type="text" class="form-control"  name="kesadarantext" id="kesadarantext" value="<?php echo $dtasawalrajal->kesadarantext;?>">
											</div>
										</div>
									</div>
									<div class="form-group row col-spacing-row">
										<div class="col-md-12">
											<label>Keadaan Umum</label>
											<div class="form-check form-check-inline ml-3"> 
												<input type="text" class="form-control"  name="keadaanumum" id="keadaanumum" value="<?php echo $dtasawalrajal->keadaanumum;?>">
											</div>
											<div class="form-check form-check-inline ml-3">
												<label>Berat Badan (Kg)</label>
											</div>
											<div class="form-check form-check-inline ml-3"> 
												<input type="text" class="form-control"  name="bb" id="bb" value="<?php echo $dtasawalrajal->bb;?>">
											</div>
										</div>
									</div>
									<div class="form-group row col-spacing-row">
										<div class="col-md-12">
											<label>Tanda-Tanda Vital</label>
											<div class="form-check form-check-inline ml-3"> 
												<label>TD (mmHg)</label>
											</div>
											<div class="form-check form-check-inline ml-3"> 
												<input type="text" class="form-control"  name="td" id="td" value="<?php echo $dtasawalrajal->td;?>">
											</div>
											<div class="form-check form-check-inline ml-3"> 
												<label>HR (x/m)</label>
											</div>
											<div class="form-check form-check-inline ml-3"> 
												<input type="text" class="form-control"  name="hr" id="hr" value="<?php echo $dtasawalrajal->hr;?>">
											</div>
											<div class="form-check form-check-inline ml-3"> 
												<label><input type="radio" class="state iradio_square-red ml-3" id="teratur" name="teratur" value="1"  <?php if ($dtasawalrajal->hrteratur == 1) {echo "checked";} ?>> Teratur</label>
												<label><input type="radio" class="state iradio_square-red ml-3" id="tidakteratur" name="teratur" value="2" <?php if ($dtasawalrajal->hrteratur == 2) {echo "checked";} ?>> Tidak Teratur</label>
											</div>
											<div class="form-check form-check-inline ml-3"> 
												<label>RR (x/m)</label>
											</div>
											<div class="form-check form-check-inline ml-3"> 
												<input type="text" class="form-control"  name="rr" id="rr" value="<?php echo $dtasawalrajal->rr;?>">
											</div>
											<div class="form-check form-check-inline ml-3"> 
												<label>Suhu</label>
											</div>
											<div class="form-check form-check-inline ml-3"> 
												<input type="text" class="form-control"  name="suhu" id="suhu" value="<?php echo $dtasawalrajal->suhu;?>">
											</div>
										</div>
									</div>
									<div class="form-group row col-spacing-row mt-3">
										<div class="col-6 text-left">
											<button onclick="saveriwayat()" class="btn btn-primary" data-bs-dismiss="modal">Simpan</button>
										</div>
										<div class="col-6">
											<!-- <button onclick="Batal()" class="btn btn-danger">Batal Save</button> -->
										</div>
									</div>	
								</div>	
							</div>		
						</div>		
					</div>		
					
					<div class="tab-pane fade" id="status" role="tabpanel" aria-labelledby="subtabstatus">
						<div class="card">
							<div class="card-body">
								<div class="col-md-12 mt-2">
									<div class="form-group row col-spacing-row">
										<div class="col-md-12">
											<label>Saudara</label>
											<div class="form-check form-check-inline ml-3"> 
												<label>Kandung, Jumlah</label>
											</div>
											<div class="form-check form-check-inline ml-3"> 
												<input type="number" class="form-control"  name="kandung" id="kandung" style="border: 1px solid black;" value="<?php echo $dtasawalrajal->kandung;?>">
											</div>
											<div class="form-check form-check-inline ml-3"> 
												<label>Tiri, Jumlah</label>
											</div>
											<div class="form-check form-check-inline ml-3"> 
												<input type="number" class="form-control"  name="tiri" id="tiri" style="border: 1px solid black;" value="<?php echo $dtasawalrajal->tiri;?>">
											</div>
										</div>	
										<div class="col-md-12 mt-3">
											<label>Tinggal Bersama</label>
											<div class="form-check form-check-inline ml-3"> 
												<label>Orang Tua</label>
											</div>
											<div class="form-check form-check-inline ml-3"> 
												<label><input type="radio" class="state iradio_square-red ml-3" id="tinggal" name="tinggal" value="1"  style="border: 1px solid black;" <?php if ($dtasawalrajal->tinggal == 1) {echo "checked";} ?>> Orang Tua</label>
												<label><input type="radio" class="state iradio_square-red ml-3" id="tinggallain" name="tinggal" value="2" style="border: 1px solid black;" <?php if ($dtasawalrajal->tinggal == 2) {echo "checked";} ?>> Lainnya</label>
											</div>
											<div class="form-check form-check-inline ml-3"> 
												<input type="text" class="form-control" name="tinggaltext" id="tinggaltext" value="<?php echo $dtasawalrajal->tinggaltext;?>" style="border: 1px solid black;">
											</div>
										</div>	
										<div class="col-md-12 mt-3">
											<div class="form-check form-check-inline"> 
												<label>Bicara</label>
											</div>
											<div class="form-check form-check-inline ml-3"> 
												<label><input type="radio" class="state iradio_square-red ml-3" id="bicara1" name="bicara" value="1"  style="border: 1px solid black;" <?php if ($dtasawalrajal->bicara == 1) {echo "checked";} ?>> Jelas</label>
												<label><input type="radio" class="state iradio_square-red ml-3" id="bicara2" name="bicara" value="2" style="border: 1px solid black;" <?php if ($dtasawalrajal->bicara == 2) {echo "checked";} ?>> Tidak dapat Dimengerti</label>
											</div>
										</div>	
										<div class="col-md-12 mt-3">
											<div class="form-check form-check-inline"> 
												<label>Komunikasi</label>
											</div>
											<div class="form-check form-check-inline ml-3"> 
												<label><input type="radio" class="state iradio_square-red ml-3" id="komunikasi1" name="komunikasi" value="1"  style="border: 1px solid black;" <?php if ($dtasawalrajal->komunikasi == 1) {echo "checked";} ?>> Verbal</label>
												<label><input type="radio" class="state iradio_square-red ml-3" id="komunikasi2" name="komunikasi" value="2" style="border: 1px solid black;" <?php if ($dtasawalrajal->komunikasi == 2) {echo "checked";} ?>> Non Verbal</label>
											</div>
										</div>	
										<div class="col-md-12 mt-3">
											<div class="form-check form-check-inline"> 
												<label>Status Emosional</label>
											</div>
											<div class="form-check form-check-inline ml-3"> 
												<label><input type="radio" class="state iradio_square-red ml-3" id="emosional1" name="emosional" value="1"  style="border: 1px solid black;" <?php if ($dtasawalrajal->emosional == 1) {echo "checked";} ?>> Stabil</label>
												<label><input type="radio" class="state iradio_square-red ml-3" id="emosional2" name="emosional" value="2" style="border: 1px solid black;" <?php if ($dtasawalrajal->emosional == 2) {echo "checked";} ?>> Tenang</label>
												<label><input type="radio" class="state iradio_square-red ml-3" id="emosional3" name="emosional" value="3" style="border: 1px solid black;" <?php if ($dtasawalrajal->emosional == 3) {echo "checked";} ?>> Cemas</label>
												<label><input type="radio" class="state iradio_square-red ml-3" id="emosional4" name="emosional" value="4" style="border: 1px solid black;" <?php if ($dtasawalrajal->emosional == 4) {echo "checked";} ?>> Takut</label>
											</div>
										</div>	
										<div class="col-md-12 mt-3">
											<div class="form-check form-check-inline"> 
												<label>Riwayat Gangguan Jiwa</label>
											</div>
											<div class="form-check form-check-inline ml-3"> 
												<label><input type="radio" class="state iradio_square-red ml-3" id="jiwa1" name="jiwa" value="1"  style="border: 1px solid black;" <?php if ($dtasawalrajal->jiwa == 1) {echo "checked";} ?>> Tidak</label>
												<label><input type="radio" class="state iradio_square-red ml-3" id="jiwa2" name="jiwa" value="2" style="border: 1px solid black;" <?php if ($dtasawalrajal->jiwa == 2) {echo "checked";} ?>> Ya, Tahun</label>
											</div>
											<div class="form-check form-check-inline ml-3"> 
												<input type="number" class="form-control"  name="jiwatahun" id="jiwatahun" style="border: 1px solid black;" value="<?php echo $dtasawalrajal->jiwatahun;?>">
											</div>
										</div>	
										<div class="col-md-12 mt-3">
											<div class="form-check form-check-inline"> 
												<label>Riwayat Trauma</label>
											</div>
											<div class="form-check form-check-inline ml-3"> 
												<label><input type="radio" class="state iradio_square-red ml-3" id="trauma1" name="trauma" value="1"  style="border: 1px solid black;" <?php if ($dtasawalrajal->trauma == 1) {echo "checked";} ?>> Tidak ada</label>
												<label><input type="radio" class="state iradio_square-red ml-3" id="trauma2" name="trauma" value="2" style="border: 1px solid black;" <?php if ($dtasawalrajal->trauma == 2) {echo "checked";} ?>> Aniaya Fisik</label>
												<label><input type="radio" class="state iradio_square-red ml-3" id="traumq3" name="trauma" value="3" style="border: 1px solid black;" <?php if ($dtasawalrajal->trauma == 3) {echo "checked";} ?>> Psikologis</label>
												<label><input type="radio" class="state iradio_square-red ml-3" id="trauma4" name="trauma" value="4" style="border: 1px solid black;" <?php if ($dtasawalrajal->trauma == 4) {echo "checked";} ?>> KDRT</label>
												<label><input type="radio" class="state iradio_square-red ml-3" id="trauma5" name="trauma" value="5" style="border: 1px solid black;" <?php if ($dtasawalrajal->trauma == 4) {echo "checked";} ?>> Aniaya Sex / Perkosaan</label>
												<label><input type="radio" class="state iradio_square-red ml-3" id="trauma6" name="trauma" value="6" style="border: 1px solid black;" <?php if ($dtasawalrajal->trauma == 4) {echo "checked";} ?>> Tindakan Kriminal, sebutkan </label>
											</div>
											<div class="form-check form-check-inline ml-3"> 	
												<input type="text" class="form-control"  name="traumatext" id="traumatext" style="border: 1px solid black;" value="<?php echo $dtasawalrajal->traumatext;?>">
											</div>
										</div>	
										<div class="col-md-12 mt-3">
											<div class="form-check form-check-inline"> 
												<label>Alam Perasaan</label>
											</div>
											<div class="form-check form-check-inline ml-3"> 
												<label><input type="radio" class="state iradio_square-red ml-3" id="perasaan1" name="perasaan" value="1"  style="border: 1px solid black;" <?php if ($dtasawalrajal->perasaan == 1) {echo "checked";} ?>> Sedih</label>
												<label><input type="radio" class="state iradio_square-red ml-3" id="perasaan2" name="perasaan" value="2" style="border: 1px solid black;" <?php if ($dtasawalrajal->perasaan == 2) {echo "checked";} ?>> Putus Asa</label>
												<label><input type="radio" class="state iradio_square-red ml-3" id="perasaan3" name="perasaan" value="3" style="border: 1px solid black;" <?php if ($dtasawalrajal->perasaan == 3) {echo "checked";} ?>> Ketakutan</label>
												<label><input type="radio" class="state iradio_square-red ml-3" id="perasaan4" name="perasaan" value="4" style="border: 1px solid black;" <?php if ($dtasawalrajal->perasaan == 4) {echo "checked";} ?>> Gembira berlebihan</label>
											</div>
										</div>	
										<div class="col-md-12 mt-3">
											<div class="form-check form-check-inline"> 
												<label>Interaksi Selama Wawancara</label>
											</div>
											<div class="form-check form-check-inline ml-3"> 
												<label><input type="radio" class="state iradio_square-red ml-3" id="interaksi1" name="interaksi" value="1" style="border: 1px solid black;" <?php if ($dtasawalrajal->interaksi == 1) {echo "checked";} ?>> Kooperatif</label>
												<label><input type="radio" class="state iradio_square-red ml-3" id="interaksi2" name="interaksi" value="2" style="border: 1px solid black;" <?php if ($dtasawalrajal->interaksi == 2) {echo "checked";} ?>> Bermusuhan</label>
												<label><input type="radio" class="state iradio_square-red ml-3" id="interaksi3" name="interaksi" value="3" style="border: 1px solid black;" <?php if ($dtasawalrajal->interaksi == 3) {echo "checked";} ?>> Tidak Kooperatif</label>
												<label><input type="radio" class="state iradio_square-red ml-3" id="interaksi4" name="interaksi" value="4" style="border: 1px solid black;" <?php if ($dtasawalrajal->interaksi == 4) {echo "checked";} ?>> Mudah Tersinggung</label>
												<label><input type="radio" class="state iradio_square-red ml-3" id="interaksi5" name="interaksi" value="5" style="border: 1px solid black;" <?php if ($dtasawalrajal->interaksi == 5) {echo "checked";} ?>> Kontak Mata Kurang</label>
											</div>
										</div>	
										<div class="col-md-12 mt-3">
											<div class="form-check form-check-inline"> 
												<label>Kebutuhan Spiritual Pasien</label>
											</div>
											<div class="form-check form-check-inline ml-3"> 
												<label><input type="radio" class="state iradio_square-red ml-3" id="spiritual1" name="spiritual" value="1" style="border: 1px solid black;" <?php if ($dtasawalrajal->spiritual == 1) {echo "checked";} ?>> Baik</label>
												<label><input type="radio" class="state iradio_square-red ml-3" id="spiritual2" name="spiritual" value="2" style="border: 1px solid black;" <?php if ($dtasawalrajal->spiritual == 2) {echo "checked";} ?>> Tidak</label>
											</div>
											<div class="form-check form-check-inline ml-3"> 	
												<input type="text" class="form-control"  name="spiritualtext" id="spiritualtext" style="border: 1px solid black;" value="<?php echo $dtasawalrajal->spiritualtext;?>">
											</div>
										</div>	
										<div class="col-md-12 mt-3">
											<div class="form-check form-check-inline"> 
												<label>Pasien Membutuhkan Spiritual Agama </label>
											</div>
											<div class="form-check form-check-inline ml-3"> 
												<label><input type="radio" class="state iradio_square-red ml-3" id="spiritualagama1" name="spiritualagama" value="1" style="border: 1px solid black;" <?php if ($dtasawalrajal->spiritualagama == 1) {echo "checked";} ?>> Tidak</label>
												<label><input type="radio" class="state iradio_square-red ml-3" id="spiritualagama2" name="spiritualagama" value="2" style="border: 1px solid black;" <?php if ($dtasawalrajal->spiritualagama == 2) {echo "checked";} ?>> Ya</label>
											</div>
											<div class="form-check form-check-inline ml-3"> 	
												<input type="text" class="form-control"  name="spiritualagamatext" id="spiritualagamatext" style="border: 1px solid black;" value="<?php echo $dtasawalrajal->spiritualagamatext;?>">
											</div>
										</div>	
										<div class="col-md-12 mt-3">
											<div class="form-check form-check-inline"> 
												<label>Pasien Membutuhkan Bantuan Dalam Menjalankan Ibadah </label>
											</div>
											<div class="form-check form-check-inline ml-3"> 
												<label><input type="radio" class="state iradio_square-red ml-3" id="ibadah1" name="ibadah" value="1" style="border: 1px solid black;" <?php if ($dtasawalrajal->ibadah == 1) {echo "checked";} ?>> Ya</label>
												<label><input type="radio" class="state iradio_square-red ml-3" id="ibadah2" name="ibadah" value="2" style="border: 1px solid black;" <?php if ($dtasawalrajal->ibadah == 2) {echo "checked";} ?>> Tidak</label>
											</div>
										</div>	
									</div>	
									<div class="form-group row col-spacing-row mt-3">
										<div class="col-6 text-left">
											<button onclick="savestatus()" class="btn btn-primary" data-bs-dismiss="modal">Simpan</button>
										</div>
										<div class="col-6">
											<!-- <button onclick="Batal()" class="btn btn-danger">Batal Save</button> -->
										</div>
									</div>	
								</div>	
							</div>	
						</div>	
					</div>	
					<div class="tab-pane fade" id="nyeri" role="tabpanel" aria-labelledby="subtabnyeri">
						<div class="card">
							<div class="card-body">
								<div class="col-md-12">
									<div class="form-group row col-spacing-row mt-3">
										<label class="col-md-1" style="font-size: 13px;">Nyeri</label>
										<div class="col-md-11">
											<label><input type="radio" class="state iradio_square-red ml-3" id="nyeri1" name="nyeri" value="1" <?php if ($dtasawalrajal->nyeri == 1) {echo "checked";} ?>> Tidak</label>
											<label><input type="radio" class="state iradio_square-red ml-3" id="nyeri2" name="nyeri" value="2" <?php if ($dtasawalrajal->nyeri == 2) {echo "checked";} ?>> Ya</label>
										</div>
									</div>	
									<div class="form-group row col-spacing-row mt-3">
										<label class="col-md-1" style="font-size: 13px;">Sifat</label>
										<div class="col-md-11">
											<label><input type="radio" class="state iradio_square-red ml-3" id="sifat1" name="sifat" value="1" <?php if ($dtasawalrajal->sifat == 1) {echo "checked";} ?>> Akut</label>
											<label><input type="radio" class="state iradio_square-red ml-3" id="sifat2" name="sifat" value="2" <?php if ($dtasawalrajal->sifat == 2) {echo "checked";} ?>> Kronis</label>
										</div>
									</div>
									<div class="form-group row col-spacing-row mt-3">
										<div class="col-md-1">
										</div>
										<div class="col-md-11">
											<img src="../../assets/image/rm/nyeri.png" alt="Gambar Nyeri" style="max-width: 100%;">
										</div>
									</div>
									<div class="form-group row col-spacing-row mt-3">
										<label class="col-md-1" style="font-size: 13px;">Kualitas Nyeri</label>
										<div class="col-md-11">
											<label><input type="radio" class="state iradio_square-red ml-3" id="kualitasnyeri1" name="kualitasnyeri" value="1" <?php if ($dtasawalrajal->kualitasnyeri == 1) {echo "checked";} ?>> Akut</label>
											<label><input type="radio" class="state iradio_square-red ml-3" id="kualitasnyeri2" name="kualitasnyeri" value="2" <?php if ($dtasawalrajal->kualitasnyeri == 2) {echo "checked";} ?>> Kronis</label>
											<label><input type="radio" class="state iradio_square-red ml-3" id="kualitasnyeri3" name="kualitasnyeri" value="3" <?php if ($dtasawalrajal->kualitasnyeri == 3) {echo "checked";} ?>> Kronis</label>
										</div>
									</div>
									<div class="form-group row col-spacing-row">
										<label class="col-md-1 mt-1" style="font-size: 13px;">Menjalar</label>
										<div class="col-md-11">
											<label><input type="radio" class="state iradio_square-red ml-3" id="menjalar1" name="menjalar" value="1" <?php if ($dtasawalrajal->menjalar == 1) {echo "checked";} ?>> Tidak </label>
											<label><input type="radio" class="state iradio_square-red ml-3" id="menjalar2" name="menjalar" value="2" <?php if ($dtasawalrajal->menjalar == 2) {echo "checked";} ?>> Ya, ke </label>
											<div class="form-check form-check-inline ml-3">
												<input type="text" class="form-control col-form-label" id="menjalartext" style="width: 250px; border: 1px solid" value="<?php echo $dtasawalrajal->menjalartext;?>">
											</div>
										</div>
									</div>
									<div class="form-group row col-spacing-row mt-2">
										<label class="col-md-1 col-form-label">Skor Nyeri</label>
										<div class="col-md-11">
											<input type="text" class="form-control col-form-label" id="skornyeri"
														style="width: 100px; border: 1px solid;"
														value="<?php echo $dtasawalrajal->skornyeri ?>">

										</div>
									</div>
									<div class="form-group row col-spacing-row mt-3">
										<label class="col-md-1">Frekuensi</label>
										<div class="col-md-11">
											<label><input type="radio" class="state iradio_square-red ml-3" id="frekuensi1" name="frekuensi" value="1" <?php if ($dtasawalrajal->frekuensi == 1) {echo "checked";} ?>> Jarang</label>
											<label><input type="radio" class="state iradio_square-red ml-3" id="frekuensi2" name="frekuensi" value="2" <?php if ($dtasawalrajal->frekuensi == 2) {echo "checked";} ?>> Hilang Timbul</label>
											<label><input type="radio" class="state iradio_square-red ml-3" id="frekuensi3" name="frekuensi" value="3" <?php if ($dtasawalrajal->frekuensi == 3) {echo "checked";} ?>> Terus Menerus</label>
										</div>
									</div>
									<div class="form-group row col-spacing-row mt-3">
										<label class="col-md-1">Mempengaruhi</label>
										<div class="col-md-11">
											<label><input type="radio" class="state iradio_square-red ml-3" id="mempengaruhi1" name="mempengaruhi" value="1" <?php if ($dtasawalrajal->mempengaruhi == 1) {echo "checked";} ?>> Tidur</label>
											<label><input type="radio" class="state iradio_square-red ml-3" id="mempengaruhi2" name="mempengaruhi" value="2" <?php if ($dtasawalrajal->mempengaruhi == 2) {echo "checked";} ?>> Aktifitas Fisik</label>
											<label><input type="radio" class="state iradio_square-red ml-3" id="mempengaruhi3" name="mempengaruhi" value="3" <?php if ($dtasawalrajal->mempengaruhi == 3) {echo "checked";} ?>> Konsentrasi</label>
											<label><input type="radio" class="state iradio_square-red ml-3" id="mempengaruhi4" name="mempengaruhi" value="4" <?php if ($dtasawalrajal->mempengaruhi == 4) {echo "checked";} ?>> Emosi</label>
											<label><input type="radio" class="state iradio_square-red ml-3" id="mempengaruhi5" name="mempengaruhi" value="5" <?php if ($dtasawalrajal->mempengaruhi == 5) {echo "checked";} ?>> Nafsu Makan</label>
										</div>
									</div>
									<div class="form-group row col-spacing-row mt-4">
										<div class="col-md-12">
											<label>Saran</label>
											<div class="form-check form-check-inline ml-3"> 
												<textarea id="saran" name="saran" rows="3" style="width: 800px;"><?php echo $dtasawalrajal->saran;?></textarea>
											</div>
										</div>
									</div>
								</div>	
								<div class="col-md-12 mt-5 mb-5">
									<div class="col-6 text-left">
										<button onclick="savenyeri()" class="btn btn-primary"
												data-bs-dismiss="modal">Simpan</button>
									</div>
									<div class="col-6">
										<!-- <button onclick="Batal()" class="btn btn-danger">Batal Save</button> -->
									</div>
								</div>
							</div>	
						</div>	
					</div>	
					<div class="tab-pane fade" id="resiko" role="tabpanel" aria-labelledby="subtabresiko">
						<!-- =============== -->
						<div class="card">
							<div class="card-body">
								<div class="col-md-12 mt-3">
									<label class="col-form-label" style="font-size: 14px; color: blue;">Penilaian Resiko Jatuh</label>
									<br>
									a. Perhatikan cara berjalan pasien saat hendak duduk di kursi, apakah tampak tidak seimbang
									<br>
									b. Apakah pasien memegang pinggiran kursi atau meja atau benda lain sebagai penopang saat akan duduk
									<br>
									HASIL :
								</div>
								<div class="col-md-12 mt-3">
									<div class="form-group row col-spacing-row">
										<div class="col-md-11">
											<label><input type="radio" class="state iradio_square-red"
												id="resiko-resikojatuh1" name="resikojatuh" value="1" <?php if ($dtasawalrajal->resikojatuh == 1) {echo "checked";} ?>>
												Tidak Beresiko (Tidak ditemukan a dan b)</label>
											<label><input type="radio" class="state iradio_square-red ml-3"
												id="resiko-resikojatuh2" name="resikojatuh" value="2" <?php if ($dtasawalrajal->resikojatuh == 2) {echo "checked";} ?>>
												Resiko Rendah (Ditemukan a atau b)</label>
											<label><input type="radio" class="state iradio_square-red ml-3"
												id="resiko-resikojatuh3" name="resikojatuh" value="3" <?php if ($dtasawalrajal->resikojatuh == 3) {echo "checked";} ?>>
												Resiko Tinggi (Ditemukan a dan b)</label>
										</div>
									</div>

								</div>
								<div class="form-group row col-spacing-row mt-3">
									<label class="col-md-1">Hasil Skrinning</label>
									<div class="col-md-11">
										<div class="form-check form-check-inline">
											<textarea id="hasilskrinning" name="hasilskrinning" rows="2"
															style="width: 800px;"><?php echo $dtasawalrajal->hasilskrinning ?></textarea>
										</div>
									</div>
								</div>
								<div class="form-group row col-spacing-row mt-3">
									<label class="col-md-1">Saran</label>
									<div class="col-md-11">
										<div class="form-check form-check-inline">
											<textarea id="jatuhsaran" name="jatuhsaran" rows="3" style="width: 800px;"><?php echo $dtasawalrajal->jatuhsaran ?></textarea>
										</div>
									</div>
								</div>	
							</div>
							<div class="col-md-12 mb-5">
									<div class="col-6 text-left">
										<button onclick="savejatuh()" class="btn btn-primary" data-bs-dismiss="modal">Simpan</button>
									</div>
									<div class="col-6">
										<!-- <button onclick="Batal()" class="btn btn-danger">Batal Save</button> -->
									</div>
							</div>
						</div>
						<!-- =============== -->
					</div>	
					<div class="tab-pane fade" id="gizi" role="tabpanel" aria-labelledby="subtabgizi">
						<div class="card">
							<div class="card-body">
								<div class="col-md-12 mt-3">
									<div class="form-check form-check-inline">
												<label class="col-form-label">Berat Badan </label>
												<input type="number" id="bbgizi" name="bbgizi" class="form-control ml-3"
													style="width: 100; border: 1px solid;" value="<?php echo $dtasawalrajal->bbgizi ?>">
									</div>
									<div class="form-check form-check-inline">
												<label class="col-form-label">Tinggi Badan </label>
												<input type="number" id="tbgizi" name="tbgizi" class="form-control ml-3"
													style="width: 100; border: 1px solid;" value="<?php echo $dtasawalrajal->tbgizi ?>">
									</div>
									<div class="form-check form-check-inline">
												<label class="col-form-label">IMT (BB/TB) </label>
												<input type="number" id="imtgizi" name="imimtgizit" class="form-control ml-3"
													style="width: 100; border: 1px solid;" value="<?php echo $dtasawalrajal->imtgizi ?>">
									</div>
								</div>
								<div class="col-md-12 mt-3">
									<div class="form-check form-check-inline">
												<label>Apakah Pasien Tampak Kurus ? </label>
												<label><input type="radio" class="state iradio_square-red ml-3"
														id="kurusgizi1" name="kurusgizi" value="1" <?php if ($dtasawalrajal->kurusgizi == 1) {echo "checked";} ?>> Ya</label>
												<label><input type="radio" class="state iradio_square-red ml-3"
														id="kurusgizi2" name="kurusgizi" value="2" <?php if ($dtasawalrajal->kurusgizi == 2) {echo "checked";} ?>> Tidak</label>
									</div>
								</div>
								<div class="col-md-12 mt-3">
									<div class="form-check form-check-inline">
												<label>Apakah Terjadi Kenaikan dan penurunan berat badan 1 bulan
													terakhir ? </label>
												<label><input type="radio" class="state iradio_square-red ml-3"
														id="naikturunberatgizi1" name="naikturunberatgizi" value="1" <?php if ($dtasawalrajal->naikturunberatgizi == 1) {echo "checked";} ?>> Ya</label>
												<label><input type="radio" class="state iradio_square-red ml-3"
														id="naikturunberatgizi2" name="naikturunberatgizi" value="2" <?php if ($dtasawalrajal->naikturunberatgizi == 2) {echo "checked";} ?>> Tidak</label>
									</div>
								</div>
								<div class="col-md-12 mt-3">
									<div class="form-check form-check-inline">
												<label>Apakah Asupan makanan menurun yang dikarenakan penurunan nafsu
													makan ? </label>
												<label><input type="radio" class="state iradio_square-red ml-3"
														id="asupangizi1" name="asupangizi" value="1" <?php if ($dtasawalrajal->asupangizi == 1) {echo "checked";} ?>> Ya</label>
												<label><input type="radio" class="state iradio_square-red ml-3"
														id="asupangizi2" name="asupangizi" value="2" <?php if ($dtasawalrajal->asupangizi == 2) {echo "checked";} ?>> Tidak</label>
									</div>
								</div>
								<div class="col-md-12 mt-3">
									<div class="form-group row col-spacing-row mt-3">
										<label class="col-md-1">Hasil Skrinning</label>
										<div class="col-md-11">
											<div class="form-check form-check-inline">
												<textarea id="hasilgizi" name="hasilgizi" rows="2" style="width: 800px;"><?php echo $dtasawalrajal->hasilgizi ?></textarea>
											</div>
										</div>
									</div>
								</div>
								<div class="form-group row col-spacing-row mt-3">
									<label class="col-md-1">Saran</label>
									<div class="col-md-11">
										<div class="form-check form-check-inline">
											<textarea id="sarangizi" name="sarangizi" rows="3" style="width: 800px;"><?php echo $dtasawalrajal->sarangizi ?></textarea>
										</div>
									</div>
								</div>
							</div>	
							<div class="col-md-12 mb-5">
								<div class="col-6 text-left">
									<button onclick="savegizi()" class="btn btn-primary" data-bs-dismiss="modal">Simpan</button>
								</div>
								<div class="col-6">
									<!-- <button onclick="Batal()" class="btn btn-danger">Batal Save</button> -->
								</div>
							</div>
						</div>	
					</div>

					<div class="tab-pane fade" id="fungsional" role="tabpanel" aria-labelledby="subtabfungsional">
						<div class="card">
							<div class="card-body">
										<div class="col-md-12 mt-3">
											<label class="col-form-label"
												style="font-size: 14px; color: blue;">PENGKAJIAN FUNGSI</label>
											<br>
										</div>
										<div class="col-md-12">
											<div class="form-group row col-spacing-row mt-3">
												<label class="col-md-1">SENSORIK</label>
												<label class="col-md-1">Penglihatan</label>
												<div class="col-md-10">
													<label><input type="radio" class="state iradio_square-red"
															id="penglihatan-normal" name="penglihatan" value="1"  <?php if ($dtasawalrajal->penglihatan == 1) {echo "checked";} ?>>
														Normal</label>
													<label><input type="radio" class="state iradio_square-red ml-3"
															id="penglihatan-kabur" name="penglihatan" value="2"  <?php if ($dtasawalrajal->penglihatan == 2) {echo "checked";} ?>>
														Kabur</label>
													<label><input type="radio" class="state iradio_square-red ml-3"
															id="penglihatan-kacamata" name="penglihatan"
															value="3">  <?php if ($dtasawalrajal->penglihatan == 3) {echo "checked";} ?> Kacamata</label>
													<label><input type="radio" class="state iradio_square-red ml-3"
															id="penglihatan-lensa" name="penglihatan"
															value="4"  <?php if ($dtasawalrajal->penglihatan == 4) {echo "checked";} ?>> Lensa Kontak</label>
												</div>
											</div>
										</div>
										<div class="col-md-12 mt-1">
											<div class="form-group row col-spacing-row">
												<label class="col-md-1"></label>
												<label class="col-md-1">Penciuman</label>
												<div class="col-md-10">
													<label><input type="radio" class="state iradio_square-red"
															id="penciuman-normal" name="penciuman" value="1"  <?php if ($dtasawalrajal->penciuman == 1) {echo "checked";} ?>>
														Normal</label>
													<label><input type="radio" class="state iradio_square-red ml-3"
															id="penciuman-tidak" name="penciuman" value="2" <?php if ($dtasawalrajal->penciuman == 2) {echo "checked";} ?>>
														Tidak</label>
												</div>
											</div>
										</div>
										<div class="col-md-12 mt-1">
											<div class="form-group row col-spacing-row">
												<label class="col-md-1"></label>
												<label class="col-md-1">Pendengaran</label>
												<div class="col-md-10">
													<label><input type="radio" class="state iradio_square-red"
															id="pendengaran-normal" name="pendengaran" value="1"  <?php if ($dtasawalrajal->pendengaran == 2) {echo "checked";} ?>>
														Normal</label>
													<label><input type="radio" class="state iradio_square-red ml-3"
															id="pendengaran-tuli" name="pendengaran"
															value="2"  <?php if ($dtasawalrajal->pendengaran == 2) {echo "checked";} ?>> Tuli Kanan / Kiri</label>
													<label><input type="radio" class="state iradio_square-red ml-3"
															id="pendengaran-alatbantu" name="pendengaran"
															value="3"  <?php if ($dtasawalrajal->pendengaran == 3) {echo "checked";} ?>> Alat Bantu Dengar
														Kanan / Kiri</label>
												</div>
											</div>
										</div>
										<div class="col-md-12 mt-1">
											<div class="form-group row col-spacing-row">
												<label class="col-md-1">KOGNITIF</label>
												<div class="col-md-10">
													<label><input type="radio" class="state iradio_square-red"
															id="statusKesadaran-normal" name="kognitif"
															value="1"  <?php if ($dtasawalrajal->kognitif == 1) {echo "checked";} ?>> Normal</label>
													<label><input type="radio" class="state iradio_square-red ml-3"
															id="statusKesadaran-pelupa" name="kognitif"
															value="2" <?php if ($dtasawalrajal->kognitif == 2) {echo "checked";} ?>> Pelupa</label>
													<label><input type="radio" class="state iradio_square-red ml-3"
															id="statusKesadaran-bingung" name="kognitif"
															value="3" <?php if ($dtasawalrajal->kognitif == 3) {echo "checked";} ?>> Bingung</label>
													<label><input type="radio" class="state iradio_square-red ml-3"
															id="statusKesadaran-tdkdimengerti" name="kognitif"
															value="4" <?php if ($dtasawalrajal->kognitif == 4) {echo "checked";} ?>> Tidak dapat
														dimengerti</label>
												</div>
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group row col-spacing-row mt-3">
												<label class="col-md-1">MOTORIK</label>
												<label class="col-md-2">Aktifitas Sehari - hari</label>
												<div class="col-md-9">
													<label><input type="radio" class="state iradio_square-red"
															id="aktifitasharian1" name="aktifitasharian"
															value="1" <?php if ($dtasawalrajal->aktifitasharian == 1) {echo "checked";} ?>> Mandiri</label>
													<label><input type="radio" class="state iradio_square-red ml-3"
															id="aktifitasharian2" name="aktifitasharian"
															value="2" <?php if ($dtasawalrajal->aktifitasharian == 2) {echo "checked";} ?>> Bantuan Minimal</label>
													<label><input type="radio" class="state iradio_square-red ml-3"
															id="aktifitasharian3" name="aktifitasharian"
															value="3" <?php if ($dtasawalrajal->aktifitasharian == 3) {echo "checked";} ?>> Bantuan</label>
													<label><input type="radio" class="state iradio_square-red ml-3"
															id="aktifitasharian4" name="aktifitasharian" 
															value="4" <?php if ($dtasawalrajal->aktifitasharian == 4) {echo "checked";} ?>> Ketergantungan Total</label>
												</div>
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group row col-spacing-row mt-3">
												<label class="col-md-1"></label>
												<label class="col-md-1">Berjalan</label>
												<div class="col-md-10">
													<label><input type="radio" class="state iradio_square-red"
															id="aktivitasBerjalan-tidakKesulitan"
															name="aktivitasBerjalan" value="1" <?php if ($dtasawalrajal->berjalan == 1) {echo "checked";} ?>> Tidak
														ada kesulitan</label>
													<label><input type="radio" class="state iradio_square-red ml-3"
															id="aktivitasBerjalan-perluBantuan" name="berjalan"
															value="2"  <?php if ($dtasawalrajal->berjalan == 2) {echo "checked";} ?>> Perlu Bantuan</label>
													<label><input type="radio" class="state iradio_square-red ml-3"
															id="aktivitasBerjalan-seringJatuh" name="berjalan"
															value="3"  <?php if ($dtasawalrajal->berjalan == 3) {echo "checked";} ?>> Sering Jatuh</label>
													<label><input type="radio" class="state iradio_square-red ml-3"
															id="aktivitasBerjalan-kelumpuhan" name="berjalan"
															value="4"  <?php if ($dtasawalrajal->berjalan == 4) {echo "checked";} ?>> Kelumpuhan</label>
												</div>
											</div>
										</div>

										<div class="col-md-12 mt-3">
											<label class="col-form-label"
												style="font-size: 14px; color: blue;">DISCHARGE PLANNING</label>
											<br>
											<label class="col-form-label"
												style="font-size: 12px; color: black;">SARAN</label>
										</div>
										<div class="col-md-12 mt-1">
											<label for="homecere">Pasien perlu pelayanan Home Care : </label>
											<label><input type="radio" class="state iradio_square-red ml-3"
													id="homecare1" name="homecare" value="1"  <?php if ($dtasawalrajal->homecare == 1) {echo "checked";} ?>> Ya</label>
											<label><input type="radio" class="state iradio_square-red ml-3"
													id="homecare2" name="homecare" value="2" <?php if ($dtasawalrajal->homecare == 2) {echo "checked";} ?>> Tidak</label>
										</div>
										<div class="col-md-12 mt-1">
											<label for="homeCare">Pasien perlu pemasangan Implan : </label>
											<label><input type="radio" class="state iradio_square-red ml-3"
													id="implan1" name="implan" value="1" <?php if ($dtasawalrajal->implan == 1) {echo "checked";} ?>> Ya</label>
											<label><input type="radio" class="state iradio_square-red ml-3"
													id="implan2" name="implan" value="2" <?php if ($dtasawalrajal->implan == 2) {echo "checked";} ?>> Tidak</label>
										</div>
										<div class="col-md-12 mt-1">
											<label for="homeCare">Apakah pasien ketika pulang perlu perawatan di rumah :
											</label>
											<label><input type="radio" class="state iradio_square-red ml-3"
													id="rawatdirumah1" name="rawatdirumah" value="1" <?php if ($dtasawalrajal->rawatdirumah == 1) {echo "checked";} ?>> Ya</label>
											<label><input type="radio" class="state iradio_square-red ml-3"
													id="rawatdirumah2" name="rawatdirumah" value="2" <?php if ($dtasawalrajal->rawatdirumah == 2) {echo "checked";} ?>> Tidak</label>
										</div>
										<div class="col-md-12 mt-2">
											<div class="form-group row col-spacing-row mt-3">
												<label class="col-md-1">Hasil Skrinning</label>
												<div class="col-md-11">
													<div class="form-check form-check-inline">
														<textarea id="hasilplanning" name="hasilplanning" rows="2"
															style="width: 800px;"><?php echo $dtasawalrajal->hasilplanning ?></textarea>
													</div>
												</div>
											</div>
											<div class="form-group row col-spacing-row mt-3">
												<label class="col-md-1">Saran</label>
												<div class="col-md-11">
													<div class="form-check form-check-inline">
														<textarea id="saranplanning" name="saranplanning" rows="3"
															style="width: 800px;"><?php echo $dtasawalrajal->saranplanning ?></textarea>
													</div>
												</div>
											</div>
										</div>

									</div>
									<div class="col-md-12 mb-5">
										<div class="col-6 text-left">
											<button onclick="savefungsi()" class="btn btn-primary"
												data-bs-dismiss="modal">Simpan</button>
										</div>
										<div class="col-6">
											<!-- <button onclick="Batal()" class="btn btn-danger">Batal Save</button> -->
										</div>
									</div>
						</div>	
					</div>	
					<div class="tab-pane fade" id="kajianmedis" role="tabpanel" aria-labelledby="subtabkajianmedis">
						<div class="card">
							<div class="card-body">
								 <!-- ===================== -->
								 <label class="col-form-label" style="font-size: 14px; color: blue;">PENGKAJIAN MEDIS</label>
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
													<textarea rows="3" name="statusgeneralis" id="statusgeneralis" class="form-control" ><?php echo $dtasawalrajal->statusgeneralis ?></textarea>
												</div>
												<div class="col-md-6">
													<textarea rows="3" name="statuslokalis" id="statuslokalis" class="form-control" ><?php echo $dtasawalrajal->statuslokalis ?></textarea>
												</div>
											</div>
										</div>
									</div>	

									<div class="row">
										<div class="col-md-6">
											<div class="form-group row col-spacing-row mt-3">
												<div class="form-check form-check-inline ml-3"> 
													<label>Diagnosa</label>
												</div>
												<div class="form-check form-check-inline ml-3"> 
													<input type="text" class="form-control" id="diagnosa" name="diagnosa" placeholder="Masukkan Diagnosa" style="width: 600px;" value="<?php echo $dtasawalrajal->diagnosa;?>">
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group row col-spacing-row mt-3">
												<div class="form-check form-check-inline ml-3"> 
													<label>Diagnosa Banding</label>
												</div>
												<div class="form-check form-check-inline ml-3"> 
													<input type="text" class="form-control" id="diagnosabanding" name="diagnosabanding" placeholder="Masukkan Diagnosa Banding" style="width: 600px;" value="<?php echo $dtasawalrajal->diagnosabanding;?>">
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
													<textarea rows="3" name="penunjang" id="penunjang" class="form-control" ><?php echo $dtasawalrajal->penunjang;?></textarea>
												</div>
												<div class="col-md-6">
													<textarea rows="3" name="terapi" id="terapi" class="form-control" ><?php echo $dtasawalrajal->terapi;?></textarea>
												</div>
											</div>
										</div>
									</div>	
									<label class="col-form-label mt-4" style="font-size: 14px; color: blue;">RENCANA TINDAK LANJUT</label>
									<div class="col-md-12 mt-2">
										<div class="form-group row col-spacing-row">
											<div class="form-check form-check-inline"> 
												<label>Kontrol Ulang </label>
											</div>
											<div class="form-check form-check-inline ml-3"> 
												<label><input type="radio" class="state iradio_square-red ml-3" id="kontrolulang1" name="kontrolulang" value="1" style="border: 1px solid black;" <?php if ($dtasawalrajal->kontrolulang == 1) {echo "checked";} ?>> Ya</label>
												<label><input type="radio" class="state iradio_square-red ml-3" id="kontrolulang2" name="kontrolulang" value="2" style="border: 1px solid black;" <?php if ($dtasawalrajal->kontrolulang == 2) {echo "checked";} ?>> Tidak</label>
											</div>
										</div>
									</div>
									<div class="col-md-12 mt-2">
										<div class="form-group row col-spacing-row">
											<div class="form-check form-check-inline"> 
												<label>Rujuk Ke  </label>
											</div>
											<div class="form-check form-check-inline ml-3"> 
												<label><input type="radio" class="state iradio_square-red ml-3" id="rujukke1" name="rujukke" value="1" style="border: 1px solid black;" <?php if ($dtasawalrajal->rujukke == 1) {echo "checked";} ?>> Rumah Sakit</label>
												<label><input type="radio" class="state iradio_square-red ml-3" id="rujukke2" name="rujukke" value="2" style="border: 1px solid black;" <?php if ($dtasawalrajal->rujukke == 2) {echo "checked";} ?>> Puskesmas</label>
												<label><input type="radio" class="state iradio_square-red ml-3" id="rujukke3" name="rujukke" value="3" style="border: 1px solid black;" <?php if ($dtasawalrajal->rujukke == 3) {echo "checked";} ?>> Dokter</label>
											</div>
											<div class="form-check form-check-inline ml-3"> 
												<input type="text" class="form-control" id="rujukketext" name="rujukketext" placeholder="Masukkan detail rujukan" value="<?php echo $dtasawalrajal->rujukketext;?>" style="width: 600px; border: 1px solid black;">
											</div>
										</div>
									</div>

									<label class="col-form-label mt-3" style="font-size: 14px; color: blue;">EDUKASI PASIEN</label>
									<div class="col-md-12 mt-2">
										<div class="form-group row col-spacing-row">
											<div class="form-check form-check-inline"> 
												<label>Edukasi awal disampaikan tentang diagnosis, rencana dan tujuan terapi kepada :  </label>
											</div>
											<div class="form-check form-check-inline ml-3"> 
												<label><input type="radio" class="state iradio_square-red ml-3" id="edukasi1" name="edukasi" value="1" style="border: 1px solid black;" <?php if ($dtasawalrajal->edukasi == 1) {echo "checked";} ?>> Pasien</label>
												<label><input type="radio" class="state iradio_square-red ml-3" id="edukasi2" name="edukasi" value="2" style="border: 1px solid black;" <?php if ($dtasawalrajal->edukasi == 2) {echo "checked";} ?>> Keluarga</label>
												<label><input type="radio" class="state iradio_square-red ml-3" id="edukasi3" name="edukasi" value="3" style="border: 1px solid black;" <?php if ($dtasawalrajal->edukasi == 3) {echo "checked";} ?>> Tidak diberikan edukasi karena :</label>
											</div>
											<div class="form-check form-check-inline ml-3"> 
												<!-- <input type="text" class="form-control" id="edukasitext" name="edukasitext" value="<?php echo $dtasawalrajal->edukasitext;?>"> -->
												<input type="text" class="form-control" id="edukasitext" name="edukasitext" value="<?php echo $dtasawalrajal->edukasitext;?>" style="width: 600px; border: 1px solid black;">
											</div>
										</div>
									</div>

								 <!-- ===================== -->
							</div>	
						</div>	
						<div class="col-md-12 mb-5">
							<div class="col-6 text-left">
								<!-- <button onclick="simpanassesmen()" class="btn btn-primary" data-bs-dismiss="modal">Simpan</button> -->
								<button onclick="savepengkajianmedis()" class="btn btn-primary" data-bs-dismiss="modal">Simpan</button>
							</div>
							<div class="col-6">
								<!-- <button onclick="Batal()" class="btn btn-danger">Batal Save</button> -->
							</div>
						</div>
					</div>	
				</div>	
			</nav>
		</div>
	</div>
</div>


<script>

	function kuranglengkap() {
		$.notify("Data Kurang Lengkap", "error");
	}


// ==================================== baru diatas
// ==================================== lama di bawah

	function saveriwayat() {
		var no_rm = document.getElementById("no_rm").value;
		var kode_dokter = document.getElementById("kode_dokter").value;
		var notransaksi = document.getElementById("notransaksi").value;

		var keluhanutama = document.getElementById("keluhanutama").value;
		var keluhansekarang = document.getElementById("keluhansekarang").value;
		var riwayatdahulu = document.getElementById("riwayatdahulu").value;

		var alergi = $("input[name='alergi']:checked").val();
		var alergitext = document.getElementById("alergitext").value;

		var kesadaran = $("input[name='kesadaran']:checked").val();
		var kesadarantext = document.getElementById("kesadarantext").value;
		var keadaanumum = document.getElementById("keadaanumum").value;
		
		var bb = document.getElementById("bb").value;
		var td = document.getElementById("td").value;
		var hr = document.getElementById("hr").value;

		var hrteratur = $("input[name='hrteratur']:checked").val();
		var rr = document.getElementById("rr").value;
		var suhu = document.getElementById("suhu").value;

		$.ajax({
			url: "<?php echo site_url(); ?>/rme/saveriwayat",
			type: "GET",
			data: {
				no_rm: no_rm,
				kode_dokter: kode_dokter,
				notransaksi: notransaksi,
				keluhanutama : keluhanutama,
				keluhansekarang : keluhansekarang,
				riwayatdahulu : riwayatdahulu,
				alergi : alergi,
				alergitext : alergitext,
				kesadaran : kesadaran,
				kesadarantext : kesadarantext,
				keadaanumum : keadaanumum,
				bb : bb,
				td : td,
				hr : hr,
				hrteratur : hrteratur,
				rr : rr,
				suhu : suhu
			},
			success: function (ajaxData) {
				swal('Simpan Data Berhasil');
			},
			error: function (ajaxData) {
				swal('Simpan Data Gagal');
			}
		});
	}
	
	function savestatus() {
		var no_rm = document.getElementById("no_rm").value;
		var kode_dokter = document.getElementById("kode_dokter").value;
		var notransaksi = document.getElementById("notransaksi").value;

		var kandung = document.getElementById("kandung").value;
		var tiri = document.getElementById("tiri").value;
		var tinggal = $("input[name='tinggal']:checked").val();
		var tinggaltext = document.getElementById("tinggaltext").value;

		var bicara = $("input[name='bicara']:checked").val();
		var komunikasi = $("input[name='komunikasi']:checked").val();
		var emosional = $("input[name='emosional']:checked").val();
		var jiwa = $("input[name='jiwa']:checked").val();
		var jiwatahun = document.getElementById("jiwatahun").value;

		var trauma = $("input[name='trauma']:checked").val();
		var traumatext = document.getElementById("traumatext").value;
		
		var perasaan = $("input[name='perasaan']:checked").val();
		var interaksi = $("input[name='interaksi']:checked").val();
		var spiritual = $("input[name='spiritual']:checked").val();
		var spiritualtext = document.getElementById("spiritualtext").value;

		var spiritualagama = $("input[name='spiritualagama']:checked").val();
		var spiritualagamatext = document.getElementById("spiritualagamatext").value;

		var ibadah = $("input[name='ibadah']:checked").val();

		$.ajax({
			url: "<?php echo site_url(); ?>/rme/savestatus",
			type: "GET",
			data: {
				no_rm: no_rm,
				kode_dokter: kode_dokter,
				notransaksi: notransaksi,

				kandung : kandung,
				tiri : tiri,
				tinggal : tinggal,
				tinggaltext : tinggaltext,
				bicara : bicara,
				komunikasi : komunikasi,
				emosional : emosional,
				jiwa : jiwa,
				jiwatahun : jiwatahun,
				trauma : trauma,
				traumatext : traumatext,
				perasaan : perasaan,
				interaksi : interaksi,
				spiritual : spiritual,
				spiritualtext : spiritualtext,
				spiritualagama : spiritualagama,
				spiritualagamatext : spiritualagamatext,
				ibadah : ibadah
			},
			success: function (ajaxData) {
				swal('Simpan Data Berhasil');
			},
			error: function (ajaxData) {
				swal('Simpan Data Gagal');
			}
		});
	}

	function savenyeri() {
		var no_rm = document.getElementById("no_rm").value;
		var kode_dokter = document.getElementById("kode_dokter").value;
		var notransaksi = document.getElementById("notransaksi").value;

		var nyeri = $("input[name='nyeri']:checked").val();
		var sifat = $("input[name='sifat']:checked").val();
		var kualitasnyeri = $("input[name='kualitasnyeri']:checked").val();
		var menjalar = $("input[name='menjalar']:checked").val();
		var menjalartext = document.getElementById("menjalartext").value;
		var skornyeri = document.getElementById("skornyeri").value;

		var frekuensi = $("input[name='frekuensi']:checked").val();
		var mempengaruhi = $("input[name='mempengaruhi']:checked").val();
		var saran = document.getElementById("saran").value;

		$.ajax({
			url: "<?php echo site_url(); ?>/rme/savenyerirajal",
			type: "GET",
			data: {
				no_rm: no_rm,
				kode_dokter: kode_dokter,
				notransaksi: notransaksi,
				nyeri : nyeri,
				sifat : sifat,
				kualitasnyeri : kualitasnyeri,
				menjalar : menjalar,
				menjalartext : menjalartext,
				skornyeri : skornyeri,
				frekuensi : frekuensi,
				mempengaruhi : mempengaruhi,
				saran : saran
			},
			success: function (ajaxData) {
				swal('Simpan Data Berhasil');
			},
			error: function (ajaxData) {
				swal('Simpan Data Gagal');
			}
		});
	}

	function savejatuh() {
		var no_rm = document.getElementById("no_rm").value;
		var kode_dokter = document.getElementById("kode_dokter").value;
		var notransaksi = document.getElementById("notransaksi").value;


		var resikojatuh = $("input[name='resikojatuh']:checked").val();
		var hasilskrinning = document.getElementById("hasilskrinning").value;
		var jatuhsaran = document.getElementById("jatuhsaran").value;

	

		$.ajax({
			url: "<?php echo site_url(); ?>/rme/savejatuhrajal",
			type: "GET",
			data: {
				no_rm: no_rm,
				kode_dokter: kode_dokter,
				notransaksi: notransaksi,

				resikojatuh : resikojatuh,
				hasilskrinning : hasilskrinning,
				jatuhsaran : jatuhsaran,


			},
			success: function (ajaxData) {
				swal('Simpan Data Berhasil');
			},
			error: function (ajaxData) {
				swal('Simpan Data Gagal');
			}
		});
	}

	function savegizi() {
		var no_rm = document.getElementById("no_rm").value;
		var kode_dokter = document.getElementById("kode_dokter").value;
		var notransaksi = document.getElementById("notransaksi").value;


		var bbgizi = document.getElementById("bbgizi").value;
		var tbgizi = document.getElementById("tbgizi").value;
		var imtgizi = document.getElementById("imtgizi").value;


		var kurusgizi = $("input[name='kurusgizi']:checked").val();
		var naikturunberatgizi = $("input[name='naikturunberatgizi']:checked").val();
		var asupangizi = $("input[name='asupangizi']:checked").val();


		var hasilgizi = document.getElementById("hasilgizi").value;
		var sarangizi = document.getElementById("sarangizi").value;

	
		$.ajax({
			url: "<?php echo site_url(); ?>/rme/savegizirajal",
			type: "GET",
			data: {
				no_rm: no_rm,
				kode_dokter: kode_dokter,
				notransaksi: notransaksi,

				bbgizi : bbgizi,
				tbgizi : tbgizi,
				imtgizi : imtgizi,
				kurusgizi : kurusgizi,
				naikturunberatgizi : naikturunberatgizi,
				asupangizi : asupangizi,
				hasilgizi : hasilgizi,
				sarangizi : sarangizi,
			},
			success: function (ajaxData) {
				swal('Simpan Data Berhasil');
			},
			error: function (ajaxData) {
				swal('Simpan Data Gagal');
			}
		});
	}

	function savefungsi() {
		var no_rm = document.getElementById("no_rm").value;
		var kode_dokter = document.getElementById("kode_dokter").value;
		var notransaksi = document.getElementById("notransaksi").value;

		var penglihatan = $("input[name='penglihatan']:checked").val();
		var penciuman = $("input[name='penciuman']:checked").val();
		var pendengaran = $("input[name='pendengaran']:checked").val();

		var kognitif = $("input[name='kognitif']:checked").val();
		var aktifitasharian = $("input[name='aktifitasharian']:checked").val();
		var berjalan = $("input[name='berjalan']:checked").val();
		var homecare = $("input[name='homecare']:checked").val();
		var rawatdirumah = $("input[name='rawatdirumah']:checked").val();


		var hasilplanning = document.getElementById("hasilplanning").value;
		var saranplanning = document.getElementById("saranplanning").value;

	

		$.ajax({
			url: "<?php echo site_url(); ?>/rme/savefungsirajal",
			type: "GET",
			data: {
				no_rm: no_rm,
				kode_dokter: kode_dokter,
				notransaksi: notransaksi,

				penglihatan : penglihatan,
				penciuman : penciuman,
				pendengaran : pendengaran,
				kognitif : kognitif,
				aktifitasharian : aktifitasharian,

				berjalan : berjalan,
				homecare : homecare,
				rawatdirumah : rawatdirumah,

				hasilplanning : hasilplanning,
				saranplanning : saranplanning,
			},
			success: function (ajaxData) {
				swal('Simpan Data Berhasil');
			},
			error: function (ajaxData) {
				swal('Simpan Data Gagal');
			}
		});
	}	

	function savepengkajianmedis() {
		var no_rm = document.getElementById("no_rm").value;
		var kode_dokter = document.getElementById("kode_dokter").value;
		var notransaksi = document.getElementById("notransaksi").value;

		var statusgeneralis = document.getElementById("statusgeneralis").value;
		var statuslokalis = document.getElementById("statuslokalis").value;
		var diagnosa = document.getElementById("diagnosa").value;
		var diagnosabanding = document.getElementById("diagnosabanding").value;

		var penunjang = document.getElementById("penunjang").value;
		var terapi = document.getElementById("terapi").value;

		var kontrolulang = $("input[name='kontrolulang']:checked").val();
		var rujukke = $("input[name='rujukke']:checked").val();

		var rujukketext = document.getElementById("rujukketext").value;

		var edukasi = $("input[name='edukasi']:checked").val();
		var edukasitext = document.getElementById("edukasitext").value;	

		$.ajax({
			url: "<?php echo site_url(); ?>/rme/savepengkajianmedis",
			type: "GET",
			data: {
				no_rm: no_rm,
				kode_dokter: kode_dokter,
				notransaksi: notransaksi,

				statusgeneralis : statusgeneralis,
				statuslokalis : statuslokalis,
				diagnosa : diagnosa,
				diagnosabanding : diagnosabanding,

				penunjang : penunjang,
				terapi : terapi,
				kontrolulang : kontrolulang,

				rujukke : rujukke,
				rujukketext : rujukketext,
				edukasi : edukasi,
				edukasitext : edukasitext
			},
			success: function (ajaxData) {
				swal('Simpan Data Berhasil');
			},
			error: function (ajaxData) {
				swal('Simpan Data Gagal');
			}
		});
	}
</script>


