
<link rel="stylesheet" href="../../assets/template_baru/dist/vendors/icheck/skins/all.css" >
<div class="card">
	<div class="col-12 mt-4 ml-3">
		<div class="w-sm-100 mr-auto"><h6 class="mb-0" style="color: navy;">FORM INFEKSI</h6></div>
	</div>
	<div class="tab-pane fade show mt-2 ml-3" id="tabasesmenawalmedis" role="tabpanel" >		
		<nav>
			<div id="tab-group-1" class="nav nav-tabs" id="subnav1" role="tablist">
				<a class="nav-item nav-link active" id="subtabalat" data-toggle="tab" href="#alat" role="tab" aria-controls="subnav1-1" aria-selected="true" style="color: #843905;">Penggunaan Alat Invasive</a>

				<a class="nav-item nav-link" id="subtaboperasi" data-toggle="tab" href="#operasi" role="tab" aria-controls="subnav1-2" aria-selected="false" style="color: #5C8405;">Procedure Operasi</a>

				<a class="nav-item nav-link" id="subtabkultur" data-toggle="tab" href="#kultur" role="tab" aria-controls="subnav1-2" aria-selected="false" style="color: #083DA9;">Pemeriksaan Kultur</a>

				<a class="nav-item nav-link" id="subtabdiagnosa" data-toggle="tab" href="#diagnosa" role="tab" aria-controls="subnav1-2" aria-selected="false" style="color: #083DA9;">Diagnosa HAIs</a>
			</div>
								
			<div class="tab-content" id="subnav1-content">
				<div class="tab-pane fade  show active" id="alat" role="tabpanel" aria-labelledby="subtabalat">
					<div class="card">
						<div class="card-body">
							<input type="hidden" id="tambahedit" name="tambahedit" class="form-control" >

							<div class="col-12 mt-3 ml-3">
								<div class="form-group row col-spacing-row">
									<div class="col-10 text-right">
										<button onclick="tambahresiko()" id="tambahinvasive" class="btn btn-primary" data-bs-dismiss="modal">Tambah Data</button>
									</div>
								</div>
							</div>
							<div class="form-group row col-spacing-row mt-3">
								<label class="col-md-1 col-form-label">Unit</label>
								<div class="col-md-4">
									<select class="form-control" valign="center" style="width: 100%;" name="unitselect" id="unitselect" disabled >
                                        <option value="000">--Pilih Unit--</option>
                                        <?php
                                        foreach ($unit as $row) {
                                        ?>
                                            <option value="<?php echo $row->kode_unit; ?>"><?php echo $row->nama_unit; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
								</div>
								<label class="col-md-1 col-form-label">Tindakan</label>
								<div class="col-md-4">
									<select class="form-control" name="tindakan" id="tindakan" style="border: 1px solid #ccc;" disabled>
										<option value="0">-- Pilih Tindakan--</option>
										<option value="1">Perifer Line (Infus)</option>
										<option value="2">Central Line (CVL)</option>
										<option value="3">Catheter Urine</option>
									</select>
								</div>
							</div>
							<div class="form-group row col-spacing-row mt-2">
								<label class="col-md-1 col-form-label">Tanggal Pasang</label>
								<div class="col-md-4">
									<input type="date" id="tglpasang" name="tglpasang" class="form-control" disabled>
								</div>
								<label class="col-md-1 col-form-label">Tanggal Lepas</label>
								<div class="col-md-4">
									<input type="date" id="tgllepas" name="tgllepas" class="form-control" disabled>
								</div>
							</div> 
							<div class="form-group row col-spacing-row mt-2">
								<label class="col-md-1 col-form-label">Infeksi</label>
								<div class="col-md-4">
									<select class="form-control" name="jenisinfeksi" id="jenisinfeksi" style="border: 1px solid #ccc;" onchange="pilihinfeksi()" disabled>
										<option value="0">-- Pilih Jenis Infeksi--</option>
										<option value="1" >Phlebitis</option>
										<option value="2" >I S K</option>
									</select>
								</div>
								<label class="col-md-1 col-form-label">Tanggal Infeksi</label>
								<div class="col-md-4">
									<input type="date" id="tglinfeksi" name="tglinfeksi" class="form-control" disabled>
								</div>
							</div> 
							<div class="form-group row col-spacing-row mt-3" id="pilphlebitis" hidden>
								<label class="col-md-1">Tanda Phlebitis</label>
								<div class="col-md-9">
									<input class="state icheckbox_square-red" type="checkbox" id="satup" name="tanda"> Merah
									<input class="state icheckbox_square-red ml-3" type="checkbox" id="duap" name="tanda"> Panas (rasa Seperti terbakar)
									<input class="state icheckbox_square-red ml-3" type="checkbox" id="tigap" name="tanda"> Bengkak
									<input class="state icheckbox_square-red ml-3" type="checkbox" id="empatp" name="tanda"> Sakit bila di tekan
									<input class="state icheckbox_square-red ml-3" type="checkbox" id="limap" name="tanda"> Keluar cairan bila di tekan
								</div> 
							</div>
							<div class="form-group row col-spacing-row mt-3" id="infeksidewasa" hidden>
								<label class="col-md-1">Tanda Infeksi</label>
								<div class="col-md-9">
									<input class="state icheckbox_square-red" type="checkbox" id="satud" name="tanda"> Demam > 38 Derajat Celcius
									<input class="state icheckbox_square-red ml-3" type="checkbox" id="duad" name="tanda"> Panas (rasa Seperti terbakar)
									<input class="state icheckbox_square-red ml-3" type="checkbox" id="tigad" name="tanda"> Nyeri Supra Publik
									<input class="state icheckbox_square-red ml-3" type="checkbox" id="empatd" name="tanda"> Dokter mendiagnosa sebagai ISK
									<input class="state icheckbox_square-red ml-3" type="checkbox" id="limad" name="tanda"> Dokter memberikan terapi ISK
								</div>
							</div>
							<div class="form-group row col-spacing-row mt-3" id="infeksianak" hidden>
								<label class="col-md-1">Tanda Infeksi (anak)</label>
								<div class="col-md-9">
									<input class="state icheckbox_square-red" type="checkbox" id="satua" name="tanda"> Hipotensi < 37 Derajat Celcius
									<input class="state icheckbox_square-red ml-3" type="checkbox" id="duaa" name="tanda"> Apnea
									<input class="state icheckbox_square-red ml-3" type="checkbox" id="tigaa" name="tanda"> Bradikardia
									<input class="state icheckbox_square-red ml-3" type="checkbox" id="empata" name="tanda"> Letargia
									<input class="state icheckbox_square-red ml-3" type="checkbox" id="limaa" name="tanda"> Muntah - muntah
								</div>
							</div>
							<div class="form-group row col-spacing-row mt-3">
								<label class="col-md-1 col-form-label">Keterangan</label>
								<div class="col-md-4">
									<input type="text" id="keterangan" name="keterangan" class="form-control" disabled>
								</div> 
							</div>
							<div class="form-group row col-spacing-row mt-2">
									<div class="col-5 text-left">
										<button onclick="saveinfeksi()" id="tombolsavedateresiko" class="btn btn-info" data-bs-dismiss="modal" disabled>Simpan Data</button>
									</div>
									<div class="col-5 text-right">
										<button onclick="batalinfeksi()" id="tombolbatalinfeksi" class="btn btn-danger" data-bs-dismiss="modal" disabled>Batal</button>
									</div>
							</div>

							<div class="table-responsive">
								<table class="table table-bordered table-hover" id="tabelalatinvasive">
									<thead>
										<tr>
											<th style='text-align:center; background-color:#100573; color:white;'>Nama Unit</th>
											<th style='text-align:center; background-color:#100573; color:white;' width='15%'>Tindakan</th>
											<th style='text-align:center; background-color:#100573; color:white;' width="8%">Tgl Pasang</th>
											<th style='text-align:center; background-color:#100573; color:white;' width="8%">Tgl Lepas</th>
											<th style='text-align:center; background-color:#100573; color:white;' width="4%">Hari</th>
											<th style='text-align:center; background-color:#100573; color:white;' width="4%">1</th>
											<th style='text-align:center; background-color:#100573; color:white;' width="4%">2</th>
											<th style='text-align:center; background-color:#100573; color:white;' width="4%">3</th>
											<th style='text-align:center; background-color:#100573; color:white;' width="4%">4</th>
											<th style='text-align:center; background-color:#100573; color:white;' width="4%">5</th>
											<th style='text-align:center; background-color:#100573; color:white;' width="8%">Tgl Infeksi</th>
											<th style='text-align:center; background-color:#100573; color:white;' width="10%">Keterangan</th>
											<th style='text-align:center; background-color:#100573; color:white;' width="8%">#</th>

										</tr>
									</thead>
									<tbody>
																<?php
																if ($dttindakaninvasive == NULL) {
																?>
																	<tr>
																		<td colspan="13" class="text-center">
																			Tidak Ada Data
																		</td>
																	</tr>
																	<?php } else {
																	foreach ($dttindakaninvasive as $row) {
																		echo "<td>" . $row->nama_unit . "</td>";
																		echo "<td>" . $row->nama_tindakan . "</td>";
																		echo "<td style='text-align:center;'>" . $row->tglpasang . "</td>";
																		echo "<td style='text-align:center;'>" . $row->tgllepas . "</td>";
																		echo "<td style='text-align:center;'>" . $row->hari . "</td>";
																		echo "<td style='text-align:center;'>" . $row->t1 . "</td>";
																		echo "<td style='text-align:center;'>" . $row->t2 . "</td>";
																		echo "<td style='text-align:center;'>" . $row->t3 . "</td>";
																		echo "<td style='text-align:center;'>" . $row->t4 . "</td>";
																		echo "<td style='text-align:center;'>" . $row->t5 . "</td>";
																		echo "<td style='text-align:center;'>" . $row->tglinfeksi . "</td>";

																		echo "<td>" . $row->keterangan . "</td>";
																		?>
																		<td class="text-center">
																			<button onclick="editinfeksi(<?php echo $row->id; ?>)" class="btn-sm btn-primary btn">Edit</button>
																			<button onclick="hapusinfeksi(<?php echo $row->id; ?>)" class="btn-sm btn-danger btn">Hapus</button>
																		</td>
																<?php
																		echo "</tr>";
																	}
																} ?>
									</tbody>
								</table>		
							</div>

							<div class="form-group row col-spacing-row mt-4 ml-2" style="color: #555555;">
								<label style='font-size: 13px;'>Tanda dan Gejala Phlebitis : </label>
								<label class="ml-3" style='font-size: 13px;'>1. Merah</label>
								<label class="ml-3" style='font-size: 13px;'>2. Panas (Rasa seperti terbakar)</label>
								<label class="ml-3" style='font-size: 13px;'>3. Bengkak</label>
								<label class="ml-3" style='font-size: 13px;'>4. Sakit bila di tekan</label>
								<label class="ml-3" style='font-size: 13px;'>5. Mengeluarkan cairan bila di tekan</label>
							</div>


							<div class="form-group row col-spacing-row ml-2">
								<label style='font-size: 13px;'>Tanda dan Gelaja ISK : </label>
								<label class="ml-3" style='font-size: 13px;'>1. Demam > 38 derajat Celcius</label>
								<label class="ml-3" style='font-size: 13px;'>2. Panas / Rasa seperti terbakar</label>
								<label class="ml-3" style='font-size: 13px;'>3. Disuria / Nyeri supra public</label>
								<label class="ml-3" style='font-size: 13px;'>4. Dokter mengdiagnosis sebagai ISK</label>
								<label class="ml-3" style='font-size: 13px;'>5. Dokter memberikan Terapi yang sesuai ISK</label>
							</div>

							<div class="form-group row col-spacing-row ml-2">
								<label style='font-size: 13px;'>Tanda dan Gelaja ISK anak usia 1 tahun kebawah : </label>
								<label class="ml-3" style='font-size: 13px;'>1. Hipotensi < 37 Derajat Celsius</label>
								<label class="ml-3" style='font-size: 13px;'>2. Apnea</label>
								<label class="ml-3" style='font-size: 13px;'>3. Brandikardia</label>
								<label class="ml-3" style='font-size: 13px;'>4. Letargia</label>
								<label class="ml-3" style='font-size: 13px;'>5. Muntah - muntah</label>
							</div>

						</div>
					</div>
				</div>
			

				<div class="tab-pane fade" id="operasi" role="tabpanel" aria-labelledby="subtaboperasi">
					<div class="card">
						<div class="card-body">
							<div class="col-12 mt-3 ml-3">
								<div class="form-group row col-spacing-row">
									<div class="col-10 text-right">
										<button onclick="tambahoperasi()" id="tambahopr" class="btn btn-primary" data-bs-dismiss="modal">Tambah Data</button>
									</div>
								</div>
							</div>
							<div class="form-group row col-spacing-row mt-3">
								<label class="col-md-2 col-form-label">Tanggal Operasi</label>
								<div class="col-md-3">
									<input type="date" id="tgloperasi" name="tgloperasi" class="form-control" disabled>
								</div>
								<label class="col-md-2 col-form-label">Nama Operasi</label>
								<div class="col-md-3">
									<input type="text" id="namaoperasi" name="namaoperasi" class="form-control" disabled>
								</div>
							</div> 
							<div class="form-group row col-spacing-row mt-2">
								<label class="col-md-2 col-form-label">Sifat Operasi</label>
								<div class="col-md-3">
									<select class="form-control" name="sifat" id="sifat" style="border: 1px solid #ccc;" disabled>
										<option value="0">-- Pilih --</option>
										<option value="1" >Elektive</option>
										<option value="2" >Live Saving (cito)</option>
									</select>
								</div>
								<label class="col-md-2 col-form-label">Diagnosa Pra Operasi</label>
								<div class="col-md-3">
									<input type="text" id="diagpraopr" name="diagpraopr" class="form-control" disabled>
								</div>
							</div> 

							<div class="form-group row col-spacing-row mt-2">
								<label class="col-md-2 col-form-label">Kategori Operasi</label>
								<div class="col-md-3">
									<select class="form-control" name="kategoriopr" id="kategoriopr" style="border: 1px solid #ccc;" disabled>
										<option value="0">-- Pilih --</option>
										<option value="1" >Bersih</option>
										<option value="2" >Bersih Tercemar</option>
										<option value="3" >Tercemar</option>
										<option value="4" >Kotor</option>
									</select>
								</div>
								<label class="col-md-2 col-form-label">Durasi Operasi</label>
								<div class="col-md-3">
									<select class="form-control" name="durasiopr" id="durasiopr" style="border: 1px solid #ccc;" disabled>
										<option value="0">-- Pilih --</option>
										<option value="1" >Sesuai Waktu yang di tentukan</option>
										<option value="2" >Lebih dari Waktu yang ditentukan</option>
									</select>
								</div> 
							</div>
							<div class="form-group row col-spacing-row mt-3">
								<label class="col-md-2">Skor Asa</label>
								<div class="col-md-3">
									<select class="form-control" name="skorasa" id="skorasa" style="border: 1px solid #ccc;" disabled>
										<option value="0">-- Pilih --</option>
										<option value="1" >Pasien Sehat</option>
										<option value="2" >Pasien dengan gangguan sistemik ringan-sedang</option>
										<option value="3" >Pasien dengan gangguan sistemik berat</option>
										<option value="4" >Pasien dengan gangguan sistemik berat yang mengancam kehidupan</option>
										<option value="5" >Pasien tidak diharapkan hidup walau dioperasi atau tidak</option>
									</select>
								</div>
								<label class="col-md-2">Jenis Anastesi</label>
								<div class="col-md-3">
									<input type="text" id="anastesi" name="anastesi" class="form-control" disabled>
								</div>
							</div>
							<div class="form-group row col-spacing-row mt-3" >
								<label class="col-md-2">Anti Biotik</label>
								<div class="col-md-3">
									<input type="text" id="antibiotik" name="antibiotik" class="form-control" disabled>
								</div>
								<label class="col-md-2 col-form-label">Waktu Pemberian</label>
								<div class="col-md-3">
									<input type="text" id="waktuberi" name="waktuberi" class="form-control" disabled>
								</div>
							</div> 
							<div class="form-group row col-spacing-row mt-3" >
								<label class="col-md-2">Jika terjadi IDO, sebutkan tanggal</label>
								<div class="col-md-3">
									<input type="date" id="tglido" name="tglido" class="form-control" disabled>
								</div>
								
							</div> 
							<div class="form-group row col-spacing-row mt-2">
								<div class="col-5 text-left">
									<button onclick="saveoperasi()" id="saveopr" class="btn btn-info" data-bs-dismiss="modal" disabled>Simpan Data</button>
								</div>
								<div class="col-5 text-right">
									<button onclick="bataloperasi()" id="batalopr" class="btn btn-danger" data-bs-dismiss="modal" disabled>Batal</button>
								</div>	
							</div>

							<div class="table-responsive">
								<table class="table table-bordered table-hover mt-3" id="tabeloperasiido">
									<thead>
										<tr>
											<th style='text-align:center; background-color:#100573; color:white;' width="7%">Tgl Operasi</th>
											<th style='text-align:center; background-color:#100573; color:white;' >Diagnosa</th>
											<th style='text-align:center; background-color:#100573; color:white;' width="15%">Nama Operasi</th>
											<th style='text-align:center; background-color:#100573; color:white;' width="10%">Sifat</th>
											<th style='text-align:center; background-color:#100573; color:white;' width="8%">Kategori</th>
											<th style='text-align:center; background-color:#100573; color:white;' width="2%">Durasi</th>
											<th style='text-align:center; background-color:#100573; color:white;' width="2%">ASA</th>
											<th style='text-align:center; background-color:#100573; color:white;' width="10%">Anastesi</th>
											<th style='text-align:center; background-color:#100573; color:white;' width="10%">Antibiotik</th>
											<th style='text-align:center; background-color:#100573; color:white;' width="4%">Jam</th>
											<th style='text-align:center; background-color:#100573; color:white;' width="7%">Tgl IDO</th>
											<th style='text-align:center; background-color:#100573; color:white;' width="8%">#</th>
										</tr>
									</thead>
									<tbody>
																<?php
																if ($dtoperasiIDO == NULL) {
																?>
																	<tr>
																		<td colspan="12" class="text-center">
																			Tidak Ada Data
																		</td>
																	</tr>
																	<?php } else {
																	foreach ($dtoperasiIDO as $row) {
																		echo "<td style='text-align:center;'>" . $row->tgloperasi . "</td>";
																		echo "<td style='text-align:center;'>" . $row->diagnosa . "</td>";
																		echo "<td style='text-align:center;'>" . $row->nama_operasi . "</td>";
																		echo "<td style='text-align:center;'>" . $row->sifat . "</td>";
																		echo "<td style='text-align:center;'>" . $row->kategori . "</td>";
																		echo "<td style='text-align:center;'>" . $row->durasi . "</td>";
																		echo "<td style='text-align:center;'>" . $row->skorasa . "</td>";
																		echo "<td style='text-align:center;'>" . $row->jenisanastesi . "</td>";
																		echo "<td style='text-align:center;'>" . $row->antibiotik . "</td>";
																		echo "<td style='text-align:center;'>" . $row->waktuberi . "</td>";
																		echo "<td style='text-align:center;'>" . $row->tglido . "</td>";
																		?>
																		<td class="text-center">
																			<button onclick="editoprido(<?php echo $row->id; ?>)" class="btn-sm btn-primary btn">Edit</button>
																			<button onclick="hapusoprido(<?php echo $row->id; ?>)" class="btn-sm btn-danger btn">Hapus</button>
																		</td>
																<?php
																		echo "</tr>";
																	}
																} ?>
									</tbody>
								</table>							
							</div>
						</div>
					</div>
				</div>
			
				<div class="tab-pane fade" id="kultur" role="tabpanel" aria-labelledby="subtabkultur">
					kultur
				</div>
			
				<div class="tab-pane fade" id="diagnosa" role="tabpanel" aria-labelledby="subtabdiagnosa">
					diagnosa
				</div>
			</div>

		</nav>
	</div>
</div>


<script>	
		function kuranglengkap() {
			$.notify("Data Kurang Lengkap", "error");
		}
		$('#unitselect').select2({tags: true});
		$('#tindakan').select2({tags: true});
		$('#jenisinfeksi').select2({tags: true});

		function tambahresiko() {
			// Mengaktifkan elemen-elemen yang memiliki atribut disabled
			document.getElementById('unitselect').disabled = false;
			document.getElementById('tindakan').disabled = false;
			document.getElementById('tglpasang').disabled = false;
			document.getElementById('tgllepas').disabled = false;
			document.getElementById('jenisinfeksi').disabled = false;
			document.getElementById('tglinfeksi').disabled = false;
			document.getElementById('keterangan').disabled = false;
			document.getElementById('tombolsavedateresiko').disabled = false;
			document.getElementById('tombolbatalinfeksi').disabled = false;
			document.getElementById('tambahinvasive').disabled = true;
			$("#tambahedit").val(0);
			$("#tglpasang").val('');
			$("#tgllepas").val('');
			$("#tglinfeksi").val('');
			$("#keterangan").val('');
			$('#tindakan').val(0).trigger('change');
			$('#unitselect').val('000').trigger('change');
			$('#jenisinfeksi').val(0).trigger('change');
			$('#satup').prop('checked', false)
			$('#duap').prop('checked', false)
			$('#tigap').prop('checked', false)
			$('#empatp').prop('checked', false)
			$('#limap').prop('checked', false)
			$('#satud').prop('checked', false)
			$('#duad').prop('checked', false)
			$('#tigad').prop('checked', false)
			$('#empatd').prop('checked', false)
			$('#limad').prop('checked', false)
			$('#satua').prop('checked', false)
			$('#duaa').prop('checked', false)
			$('#tigaa').prop('checked', false)
			$('#empata').prop('checked', false)
			$('#limaa').prop('checked', false)
		}

		

		function batalinfeksi() {
			// Mengaktifkan elemen-elemen yang memiliki atribut disabled
			document.getElementById('unitselect').disabled = true;
			document.getElementById('tindakan').disabled = true;
			document.getElementById('tglpasang').disabled = true;
			document.getElementById('tgllepas').disabled = true;
			document.getElementById('jenisinfeksi').disabled = true;
			document.getElementById('tglinfeksi').disabled = true;
			document.getElementById('keterangan').disabled = true;
			document.getElementById('tombolsavedateresiko').disabled = true;
			document.getElementById('tombolbatalinfeksi').disabled = true;
			document.getElementById('tambahinvasive').disabled = false;

		}
		
		function saveinfeksi() {
			var no_rm = document.getElementById("no_rm").value;
			var notransaksi = document.getElementById("notransaksi").value;
			var unitselect = document.getElementById("unitselect").value;
			var nama_unit = $("#unitselect option:selected").text();
			var tindakan = $("#tindakan").val();
			var nama_tindakan = $("#tindakan option:selected").text();
			var tglpasang = document.getElementById("tglpasang").value;
			var tgllepas = document.getElementById("tgllepas").value;
			var tglPasang1 = new Date(tglpasang);
    		var tglLepas1 = new Date(tgllepas);
    		var selisihMilidetik = tglLepas1 - tglPasang1;
    		var satuHari = 1000 * 60 * 60 * 24; // Milidetik dalam satu hari
    		var hari = selisihMilidetik / satuHari;
			var jenisinfeksi = document.getElementById("jenisinfeksi").value;
			var tglinfeksi = document.getElementById("tglinfeksi").value;
			var umurtahun = document.getElementById("umurtahun").value;
			var tambahedit = document.getElementById("tambahedit").value;
			
			if (tindakan == 1) {
				var satu = $("#satup").prop("checked") ? 1 : 0;
				var dua = $("#duap").prop("checked") ? 1 : 0;
				var tiga = $("#tigap").prop("checked") ? 1 : 0;
				var empat = $("#empatp").prop("checked") ? 1 : 0;
				var lima = $("#limap").prop("checked") ? 1 : 0;
			} else {
				if (umurtahun > 17) {
					var satu = $("#satud").prop("checked") ? 1 : 0;
					var dua = $("#duad").prop("checked") ? 1 : 0;
					var tiga = $("#tigad").prop("checked") ? 1 : 0;
					var empat = $("#empatd").prop("checked") ? 1 : 0;
					var lima = $("#limad").prop("checked") ? 1 : 0;
				} else {
					var satu = $("#satua").prop("checked") ? 1 : 0;
					var dua = $("#duaa").prop("checked") ? 1 : 0;
					var tiga = $("#tigaa").prop("checked") ? 1 : 0;
					var empat = $("#empata").prop("checked") ? 1 : 0;
					var lima = $("#limaa").prop("checked") ? 1 : 0;
				}	
			}
			var keterangan = document.getElementById("keterangan").value;

			$.ajax({
				url: "<?php echo site_url(); ?>/rme/saveDataInfeksi",
				type: "GET",
				data: {
					no_rm : no_rm,
					notransaksi : notransaksi,
					unitselect : unitselect, 
					nama_unit : nama_unit,
					tglpasang : tglpasang,
					tgllepas : tgllepas,
					jenisinfeksi : jenisinfeksi,
					tglinfeksi : tglinfeksi,
					tindakan : tindakan,
					nama_tindakan : nama_tindakan,
					hari : hari,
					satu : satu,
					dua : dua,
					tiga : tiga,
					empat : empat,
					lima : lima,
					keterangan : keterangan,
					umurtahun : umurtahun,
					tambahedit : tambahedit
				},
				success: function(ajaxData) {
					// console.log(ajaxData);
					var dt = JSON.parse(ajaxData);
					$("#tabelalatinvasive tbody tr").remove();
					$("#tabelalatinvasive tbody").append(dt.dtview);
					batalinfeksi()
					},
				error: function(ajaxData) {
					swal('Simpan Data Gagal');
				}
			});
		}


		function hapusinfeksi(id) {
			var no_rm = document.getElementById("no_rm").value;
			var notransaksi = document.getElementById("notransaksi").value;

			$.ajax({
				url: "<?php echo site_url(); ?>/rme/hapusDataInf",
				type: "GET",
				data: {
					id : id,
					no_rm : no_rm,
					notransaksi : notransaksi
				},
				success: function(ajaxData) {
					console.log(ajaxData);
					var dt = JSON.parse(ajaxData);
					$("#tabelalatinvasive tbody tr").remove();
					$("#tabelalatinvasive tbody").append(dt.dtview);
					// swal('Simpan Data Berhasil');
					},
				error: function(ajaxData) {
					swal('Hapus Data Gagal');
				}
			});
		}


		function editinfeksi(id) {
			$("#tambahedit").val(id);
			document.getElementById('unitselect').disabled = false;
			document.getElementById('tindakan').disabled = false;
			document.getElementById('tglpasang').disabled = false;
			document.getElementById('tgllepas').disabled = false;
			document.getElementById('jenisinfeksi').disabled = false;
			document.getElementById('tglinfeksi').disabled = false;
			document.getElementById('keterangan').disabled = false;
			document.getElementById('tombolsavedateresiko').disabled = false;
			document.getElementById('tombolbatalinfeksi').disabled = false;
			document.getElementById('tambahinvasive').disabled = true;

			$.ajax({
				url: "<?php echo site_url(); ?>/rme/ambilDataAlatInvasive",
				type: "GET",
				data: {
					id : id,
				},
				success: function(ajaxData) {
					console.log(ajaxData);
					var dt = JSON.parse(ajaxData);
					$("#tglpasang").val(dt.dtinvasiveid.tglpasang);
					$("#tgllepas").val(dt.dtinvasiveid.tgllepas);
					$("#tglinfeksi").val(dt.dtinvasiveid.tglinfeksi);
					$("#keterangan").val(dt.dtinvasiveid.keterangan);
					$('#tindakan').val(dt.dtinvasiveid.tindakan).trigger('change');
					$('#unitselect').val(dt.dtinvasiveid.kode_unit).trigger('change');
					$('#jenisinfeksi').val(dt.dtinvasiveid.tindakan).trigger('change');
					// alert(dt.dtinvasiveid.tindakan);
					if (dt.dtinvasiveid.tindakan == 1) {
    					if (dt.dtinvasiveid.t1==1) {$('#satup').prop('checked', true);} else { $('#satup').prop('checked', false) } 
    					if (dt.dtinvasiveid.t2==1) {$('#duap').prop('checked', true);} else { $('#duap').prop('checked', false) } 
    					if (dt.dtinvasiveid.t3==1) {$('#tigap').prop('checked', true);} else { $('#tigap').prop('checked', false) } 
    					if (dt.dtinvasiveid.t4==1) {$('#empatp').prop('checked', true);} else { $('#empatp').prop('checked', false) } 
    					if (dt.dtinvasiveid.t5==1) {$('#limap').prop('checked', true);} else { $('#limap').prop('checked', false) } 
					} else {
						if (dt.dtinvasiveid.umur > 17) {
							if (dt.dtinvasiveid.t1==1) {$('#satud').prop('checked', true);} else { $('#satud').prop('checked', false) } 
							if (dt.dtinvasiveid.t2==1) {$('#duad').prop('checked', true);} else { $('#duad').prop('checked', false) } 
							if (dt.dtinvasiveid.t3==1) {$('#tigad').prop('checked', true);} else { $('#tigad').prop('checked', false) } 
							if (dt.dtinvasiveid.t4==1) {$('#empatd').prop('checked', true);} else { $('#empatd').prop('checked', false) } 
							if (dt.dtinvasiveid.t5==1) {$('#limad').prop('checked', true);} else { $('#limad').prop('checked', false) } 
						} else {
							if (dt.dtinvasiveid.t1==1) {$('#satua').prop('checked', true);} else { $('#satua').prop('checked', false) } 
							if (dt.dtinvasiveid.t2==1) {$('#duaa').prop('checked', true);} else { $('#duaa').prop('checked', false) } 
							if (dt.dtinvasiveid.t3==1) {$('#tigaa').prop('checked', true);} else { $('#tigaa').prop('checked', false) } 
							if (dt.dtinvasiveid.t4==1) {$('#empata').prop('checked', true);} else { $('#empata').prop('checked', false) } 
							if (dt.dtinvasiveid.t5==1) {$('#limaa').prop('checked', true);} else { $('#limaa').prop('checked', false) } 
						}
					}
				},
				error: function(ajaxData) {
					swal('Simpan Data Gagal');
				}
			});

		}


    function pilihinfeksi() {
        var selectedValue = document.getElementById('jenisinfeksi').value;
        var pilphlebitis = document.getElementById('pilphlebitis');
        var infeksidewasa = document.getElementById('infeksidewasa');
        var infeksianak = document.getElementById('infeksianak');

        // Sembunyikan semua elemen terlebih dahulu
        pilphlebitis.hidden = true;
        infeksidewasa.hidden = true;
        infeksianak.hidden = true;

        // Tampilkan elemen berdasarkan pilihan yang dipilih
        if (selectedValue === '1') {
            pilphlebitis.hidden = false;
        } else if (selectedValue === '2') {
            infeksidewasa.hidden = false;
            infeksianak.hidden = false;
        }
    }

	function tambahoperasi() {
			document.getElementById('tgloperasi').disabled = false;
			document.getElementById('namaoperasi').disabled = false;
			document.getElementById('sifat').disabled = false;
			document.getElementById('diagpraopr').disabled = false;
			document.getElementById('kategoriopr').disabled = false;
			document.getElementById('durasiopr').disabled = false;
			document.getElementById('skorasa').disabled = false;
			document.getElementById('anastesi').disabled = false;
			document.getElementById('antibiotik').disabled = false;
			document.getElementById('waktuberi').disabled = false;
			document.getElementById('tglido').disabled = false;
			document.getElementById('saveopr').disabled = false;
			document.getElementById('batalopr').disabled = false;
			document.getElementById('tambahopr').disabled = true;
			
	}

	function bataloperasi() {
			document.getElementById('tgloperasi').disabled = true;
			document.getElementById('namaoperasi').disabled = true;
			document.getElementById('sifat').disabled = true;
			document.getElementById('diagpraopr').disabled = true;
			document.getElementById('kategoriopr').disabled = true;
			document.getElementById('durasiopr').disabled = true;
			document.getElementById('skorasa').disabled = true;
			document.getElementById('anastesi').disabled = true;
			document.getElementById('antibiotik').disabled = true;
			document.getElementById('waktuberi').disabled = true;
			document.getElementById('tglido').disabled = true;
			document.getElementById('saveopr').disabled = true;
			document.getElementById('batalopr').disabled = true;
			document.getElementById('tambahopr').disabled = false;
	}

	function saveoperasi() {
		var no_rm = document.getElementById("no_rm").value;
		var notransaksi = document.getElementById("notransaksi").value;
		var tgloperasi = document.getElementById("tgloperasi").value;
		var namaoperasi = document.getElementById("namaoperasi").value;
		var sifat = document.getElementById("sifat").value;
		var sifattext = $("#sifat option:selected").text();
		var diagpraopr = document.getElementById("diagpraopr").value;
		var kategoriopr = document.getElementById("kategoriopr").value;
		var kategoritext = $("#kategoriopr option:selected").text();
		var durasiopr = document.getElementById("durasiopr").value;
		var durasitext = $("#durasiopr option:selected").text();
		var skorasa = document.getElementById("skorasa").value;
		var skorasatext = $("#skorasa option:selected").text();
		var anastesi = document.getElementById("anastesi").value;
		var antibiotik = document.getElementById("antibiotik").value;
		var waktuberi = document.getElementById("waktuberi").value;
		var tglido = document.getElementById("tglido").value;
		var tambahedit = document.getElementById("tambahedit").value;

		$.ajax({
				url: "<?php echo site_url(); ?>/rme/saveDataIDO",
				type: "GET",
				data: {
					no_rm : no_rm,
					notransaksi : notransaksi,
					tgloperasi : tgloperasi,
					nama_operasi : namaoperasi,
					sifat : sifat,
					sifattext : sifattext,
					diagnosa : diagpraopr,
					kategori : kategoriopr,
					kategoritext : kategoritext,
					durasi : durasiopr,
					durasitext : durasitext,
					skorasa : skorasa,
					skorasatext : skorasatext,
					jenisanastesi : anastesi,
					antibiotik : antibiotik,
					waktuberi : waktuberi,
					tglido : tglido,
					tambahedit : tambahedit
				},
				success: function(ajaxData) {
					console.log(ajaxData);
					var dt = JSON.parse(ajaxData);
					$("#tabeloperasiido tbody tr").remove();
					$("#tabeloperasiido tbody").append(dt.dtview);
					bataloperasi()
					},
				error: function(ajaxData) {
					swal('Simpan Data Gagal');
				}
			});

	}		
	
	function hapusoprido(id) {
			var no_rm = document.getElementById("no_rm").value;
			var notransaksi = document.getElementById("notransaksi").value;

			$.ajax({
				url: "<?php echo site_url(); ?>/rme/hapusDataOprIdo",
				type: "GET",
				data: {
					id : id,
					no_rm : no_rm,
					notransaksi : notransaksi
				},
				success: function(ajaxData) {
					console.log(ajaxData);
					var dt = JSON.parse(ajaxData);
					$("#tabeloperasiido tbody tr").remove();
					$("#tabeloperasiido tbody").append(dt.dtview);
					// swal('Simpan Data Berhasil');
					},
				error: function(ajaxData) {
					swal('Hapus Data Gagal');
				}
			});
		}
</script>

