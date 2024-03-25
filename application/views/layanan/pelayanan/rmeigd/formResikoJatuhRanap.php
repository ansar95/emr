
<link rel="stylesheet" href="../../assets/template_baru/dist/vendors/icheck/skins/all.css" >
<div class="card">
	<div class="col-12 mt-4 ml-3">
		<div class="w-sm-100 mr-auto"><h6 class="mb-0" style="color: navy;">FORM ASESMEN RESIKO JATUH</h6></div>
	</div>
	<div class="col-12 mt-3 ml-3">
		<div class="form-group row col-spacing-row">
			<div class="col-10 text-right">
				<button onclick="tambahresiko()" class="btn btn-primary" data-bs-dismiss="modal">Tambah Data</button>
			</div>
		</div>
	</div>
	<div class="col-12 mt-2 ml-3">
		<div class="form-group row col-spacing-row">
			<label class="col-md-2 col-form-label">Tanggal</label>
			<div class="col-md-3"><input type="date" class="form-control" name="tanggal" id="tanggal" disabled></div>
			<label class="col-md-2 col-form-label">Jam</label>
			<div class="col-md-3"><input type="time" class="form-control" name="jam" id="jam" disabled></div>
			<div class="col-md-2"><input type="hidden" class="form-control" name="id" id="id"></div>
		</div>
		<div class="form-group row col-spacing-row">
			<label class="col-md-2 col-form-label">Riwayat Jatuh 1 Tahun Terakhir</label>
			<div class="col-md-3">
				<select class="form-control" name="riwayatjatuh" id="riwayatjatuh" style="border: 1px solid #ccc;" disabled>
					<option value="25">Ya</option>
					<option value="0" selected>Tidak</option>
				</select>
			</div>
			<label class="col-md-2 col-form-label">Diagnosa Sekunder > 2</label>
			<div class="col-md-3">
				<select class="form-control" name="diagnosa" id="diagnosa" style="border: 1px solid #ccc;" disabled>
					<option value="15">Ya</option>
					<option value="0" selected>Tidak</option>
				</select>
			</div>
		</div>
		<div class="form-group row col-spacing-row">
			<label class="col-md-2 col-form-label">Alat Bantu</label>
			<div class="col-md-3">
				<select class="form-control" name="alatbantu" id="alatbantu" style="border: 1px solid #ccc;" disabled>
					<option value="30">Berpegangan pada perabot</option>
					<option value="15">Tongkat / Alat Penopang</option>
					<option value="0" selected>Tidak ada / kursi roda / perawat / tirah baring</option>
				</select>
			</div>
			<label class="col-md-2 col-form-label">Terpasang Infus</label>
			<div class="col-md-3">
				<select class="form-control" name="terpasanginfus" id="terpasanginfus" style="border: 1px solid #ccc;" disabled>
					<option value="20">Ya</option>
					<option value="0" selected>Tidak</option>
				</select>
			</div>
		</div>
		<div class="form-group row col-spacing-row">
			<label class="col-md-2 col-form-label">Gaya Berjalan</label>
			<div class="col-md-3">
				<select class="form-control" name="gayaberjalan" id="gayaberjalan" style="border: 1px solid #ccc;" disabled>
					<option value="20">Terganggu</option>
					<option value="10">Lemah</option>
					<option value="0" selected>Normal / tirah baring / immobilisasi</option>
				</select>
			</div>
			<label class="col-md-2 col-form-label">Status Mental</label>
			<div class="col-md-3">
				<select class="form-control" name="statusmental" id="statusmental" style="border: 1px solid #ccc;" disabled>
					<option value="15">Sering lupa</option>
					<option value="0" selected>Sadar akan kemampuan diri sendiri</option>
				</select>
			</div>
		</div>
		<div class="form-group row col-spacing-row">
			<label class="col-md-2 col-form-label">Hasil Skrining</label>
			<div class="col-md-3">
				<div class="form-check form-check-inline">
					<textarea id="hasilskrining" name="hasilskrining" rows="4" style="width: 412px;" disabled></textarea>
				</div>
			</div>
			<label class="col-md-2 col-form-label">Saran</label>
			<div class="col-md-3">
				<div class="form-check form-check-inline">
					<textarea id="saran" name="saran" rows="4" style="width: 412px;" disabled></textarea>
				</div>
			</div>
		</div>
		<div class="form-group row col-spacing-row">
			<label class="col-md-2 col-form-label">Interversi</label>
			<div class="col-md-6">
				<div class="form-check form-check-inline">
					<textarea id="intervensi" name="intervensi" rows="2" style="width: 1150px;" disabled></textarea>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 mt-3 ml-3">
		<div class="form-group row col-spacing-row">
			<div class="col-10 text-left">
				<button onclick="savedataresiko()" id="tombolsavedateresiko" class="btn btn-success" data-bs-dismiss="modal" disabled>Simpan Data</button>
			</div>
		</div>
	</div>
	<div class="col-12 mt-3 ml-3">
		<table id="resikojatuhtabel" border="1" cellpadding="3" cellspacing="0" style="width: 83%;">
			<tbody>
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
			</tbody>
		</table>	
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

		function kuranglengkap() {
			$.notify("Data Kurang Lengkap", "error");
		}

		function tambahresiko() {
			var disabledElements = document.querySelectorAll('[disabled]'); // Mendapatkan semua elemen yang memiliki atribut disabled
			disabledElements.forEach(function(element) {
				element.disabled = false; // Mengubah atribut disabled menjadi false (enabled)
			});
			document.getElementById('id').value = 0;
		}

		function savedataresiko() {
			var idnya = document.getElementById("id").value;
			var no_rm = document.getElementById("no_rm").value;
			var kode_dokter = document.getElementById("kode_dokter").value;
			var notransaksi = document.getElementById("notransaksi").value;

			var tanggal = document.getElementById("tanggal").value;
			var jam = document.getElementById("jam").value;
			
			var riwayatjatuh = document.getElementById("riwayatjatuh").value;
			var diagnosa = document.getElementById("diagnosa").value;
			var alatbantu = document.getElementById("alatbantu").value;
			var terpasanginfus = document.getElementById("terpasanginfus").value;
			var gayaberjalan = document.getElementById("gayaberjalan").value;
			var statusmental = document.getElementById("statusmental").value;

			var hasilskrining = document.getElementById("hasilskrining").value;
			var saran = document.getElementById("saran").value;
			var intervensi = document.getElementById("intervensi").value;
			

			$.ajax({
				url: "<?php echo site_url(); ?>/rme/saveresikojatuhranap",
				type: "GET",
				data: {
					idnya : idnya,
					no_rm : no_rm,
					notransaksi : notransaksi,
					kode_dokter : kode_dokter,
					tanggal : tanggal,
					jam : jam,
					riwayatjatuh : riwayatjatuh,
					diagnosa : diagnosa,
					alatbantu : alatbantu,
					terpasanginfus : terpasanginfus,
					gayaberjalan : gayaberjalan,
					statusmental : statusmental,
					hasilskrining : hasilskrining,
					saran : saran,
					intervensi : intervensi
				},
				success: function(ajaxData) {
					document.getElementById('tanggal').disabled = true;
					document.getElementById('jam').disabled = true;
					document.getElementById('riwayatjatuh').disabled = true;
					document.getElementById('diagnosa').disabled = true;
					document.getElementById('alatbantu').disabled = true;
					document.getElementById('terpasanginfus').disabled = true;
					document.getElementById('gayaberjalan').disabled = true;
					document.getElementById('statusmental').disabled = true;
					document.getElementById('hasilskrining').disabled = true;
					document.getElementById('saran').disabled = true;
					document.getElementById('intervensi').disabled = true;
					document.getElementById('tombolsavedateresiko').disabled = true;
					console.log(ajaxData);
					var dt = JSON.parse(ajaxData);
					$("#resikojatuhtabel tbody tr").remove();
					$("#resikojatuhtabel tbody").append(dt.dtview);

					// swal('Simpan Data Berhasil');
					},
				error: function(ajaxData) {
					swal('Simpan Data Gagal');
				}
			});
		}

		function hapusresiko(id) {
		var no_rm = document.getElementById('no_rm').value;
		var notransaksi = document.getElementById('notransaksi').value;
        $.ajax({
			// url: "<?php echo site_url(); ?>/rme/hapusobatmasuk",
			url: "<?php echo site_url(); ?>/rme/hapusresikojatuhranap",
            method: 'GET',
            data: {
				id : id,
                no_rm: no_rm,
                notransaksi: notransaksi
            },
            success: function(ajaxData) {
				console.log(ajaxData);
					var dt = JSON.parse(ajaxData);
					$("#resikojatuhtabel tbody tr").remove();
					$("#resikojatuhtabel tbody").append(dt.dtview);
            },
            error: function() {
                // Handle jika terjadi kesalahan pada AJAX request
                alert('Terjadi kesalahan saat menghapus data');
            }
        });
	}
		function editresiko(id) {
		tambahresiko();
		var no_rm = document.getElementById('no_rm').value;
		var notransaksi = document.getElementById('notransaksi').value;
		// document.getElementById('tanggal').value = '2023-12-12';
		document.getElementById('id').value = id;

        $.ajax({
			url: "<?php echo site_url(); ?>/rme/ambildataresiko",
            method: 'GET',
            data: {
				id : id,
                no_rm: no_rm,
                notransaksi: notransaksi
            },

            success: function(ajaxData) {
				// console.log(ajaxData);
				var dt = JSON.parse(ajaxData);
				tanggal= dt.dtresiko.tanggal;
				jam= dt.dtresiko.jam;
				riwayatjatuh= dt.dtresiko.riwayatjatuh;
				diagnosa= dt.dtresiko.diagnosa;
				alatbantu= dt.dtresiko.alatbantu;
				terpasanginfus= dt.dtresiko.terpasanginfus;
				gayaberjalan= dt.dtresiko.gayaberjalan;
				statusmental= dt.dtresiko.statusmental;
				hasilskrining= dt.dtresiko.hasilskrining;
				saran= dt.dtresiko.saran;
				intervensi= dt.dtresiko.intervensi;
				

				document.getElementById('tanggal').value = tanggal;
				document.getElementById('jam').value = jam;
				document.getElementById('riwayatjatuh').value = riwayatjatuh;
				document.getElementById('diagnosa').value = diagnosa;
				document.getElementById('alatbantu').value = alatbantu;
				document.getElementById('terpasanginfus').value = terpasanginfus;
				document.getElementById('gayaberjalan').value = gayaberjalan;
				document.getElementById('statusmental').value = statusmental;
				document.getElementById('hasilskrining').value = hasilskrining;
				document.getElementById('saran').value = saran;
				document.getElementById('intervensi').value = intervensi;

				// console.log(dt);
				
            },
            error: function() {
                // Handle jika terjadi kesalahan pada AJAX request
                alert('Terjadi kesalahan saat menghapus data');
            }
        });
    }

</script>
