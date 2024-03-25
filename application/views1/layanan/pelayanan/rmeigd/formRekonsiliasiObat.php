<link rel="stylesheet" href="../../assets/template_baru/dist/vendors/icheck/skins/all.css">
<div class="card">
	<div class="col-12 mt-4 ml-3">
		<!-- <span style="font-size: 16px; font-weight: bold; color: navy;">TRIASE</span> -->
		<div class="w-sm-100 mr-auto"><h6 class="mb-0" style="color: navy;">FORM REKONSILIASI OBAT</h6></div>
	</div>
	<div class="col-12 mt-2 ml-3">
						<!-- ================== asesmen awal medis ====================== -->
						<div class="tab-pane fade show" id="tabasesmenawalmedis" role="tabpanel" >		
							<nav>
								<div id="tab-group-1" class="nav nav-tabs" id="subnav1" role="tablist">
									<a class="nav-item nav-link active" id="subtabsaatadmisi" data-toggle="tab" href="#saatadmisi" role="tab" aria-controls="subnav1-1" aria-selected="true" style="color: #843905;">Saat Admisi</a>

									<a class="nav-item nav-link" id="subtabsaattransfer" data-toggle="tab" href="#saattransfer" role="tab" aria-controls="subnav1-2" aria-selected="false" style="color: #5C8405;">Saat Transfer</a>

									<a class="nav-item nav-link" id="subtabsaatpulang" data-toggle="tab" href="#saatpulang" role="tab" aria-controls="subnav1-2" aria-selected="false" style="color: #083DA9;">Saat Discharge</a>

								</div>
								
								<div class="tab-content" id="subnav1-content">
									<div class="tab-pane fade  show active" id="saatadmisi" role="tabpanel" aria-labelledby="subtabsaatadmisi">
										<div class="card">
											<div class="card-body">
												<div class="form-group row col-spacing-row">
													<div class="col-md-12">
													<div class="w-sm-100 mr-auto"><h6 class="mb-2" style="color: #940A06;">Saat Admisi</h6></div>

													TAMBAH DATA

													<table border="1" cellpadding="1" cellspacing="0" style="width: 80%; style= font-size: 16px;">
															<tr>
																<td style="font-size: 13px; width: 25%;" height="35px">
																	<input type="text" id="namaobat" style="width: 100%; height: 30px; border: none;" placeholder="Masukkan Nama Obat">
																</td>
																<td style="font-size: 13px; width: 24%;" height="35px">
																	<input type="text" id="aturanpakai" style="width: 100%; height: 30px; border: none;" placeholder="Masukkan Aturan Pakai">
																</td>
																<td style="font-size: 13px; width: 24%;" height="35px">
																	<select id="tindaklanjut" style="width: 100%; height: 30px; border: none;">
																		<option value="0" style="border: none;">-- Tindak Lanjut --</option>
																		<option value="1" style="border: none;">Lanjut aturan pakai yang sama</option>
																		<option value="2" style="border: none;">Lanjut dengan aturan pakai berubah</option>
																		<option value="3" style="border: none;">Stop</option>
																	</select>
																</td>
																<td style="font-size: 13px; width: 24%;" height="35px">
																	<input type="text" id="perubahan" style="width: 100%; height: 30px; border: none;" placeholder="Perubahan Aturan Pakai">
																</td>
																<td style="font-size: 13px; width: 3%;  text-align: center;" height="35px">
																	<button onclick="saveobatmasuk()" class="btn btn-success" data-bs-dismiss="modal">Simpan</button>
																</td>
															</tr>	
														</table>	
														<br>
														<table class="table table-bordered table-hover" id="obatmasuk" border="1" cellpadding="3" cellspacing="0" style="width: 80%; style= font-size: 16px;" class="hover-table">
															<tbody>
																<tr style="background-color: #ccc;">
																	<th style="width: 25%; text-align: center; font-size: 14px;" height="35px">Nama Obat</th>
																	<th style="width: 24%; text-align: center; font-size: 14px;">Aturan Pakai</th>
																	<th style="width: 24%; text-align: center; font-size: 14px;">Tindak Lanjut</th>
																	<th style="width: 24%; text-align: center; font-size: 14px;">Perubahan Aturan Pakai</th>
																	<th style="width: 3%; text-align: center; font-size: 14px;">#</th>
																</tr>
																<?php
																	if ($dtobatmasuk == NULL) {
																		?>
																		<tr>
																			<td colspan="100%" class="text-center">
																				Belum Ada Data
																			</td>
																		</tr>
																	<?php } else {
																		$no = 1;
																		$jmlt = 0;
																		foreach ($dtobatmasuk as $row) {
																			?>
																			<tr>
																				<td style="font-size: 13px;" height="35px"><?php echo $row->nama_obat; ?></td>
																				<td style="font-size: 13px;"><?php echo $row->aturanpakai; ?></td>
																				<td style="font-size: 13px;"><?php echo $row->tindaklanjut; ?></td>
																				<td style="font-size: 13px;"><?php echo $row->perubahan; ?></td>
																				<td style="font-size: 13px;"><button onclick="hapusobatmasuk(<?php echo $row->id; ?>)" class="btn btn-danger"
																					data-bs-dismiss="modal">Hapus</button></td>
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
									<!-- -------- pemeriksaan--------- -->
									<div class="tab-pane fade" id="saattransfer" role="tabpanel" aria-labelledby="subtabsaattransfer">
										<div class="card">
											<div class="card-body">
												<div class="w-sm-100 mr-auto"><h6 class="mb-2" style="color: #940A06;">Saat Transfer</h6></div>
												<div class="form-group row col-spacing-row">
													<div class="col-md-12">
														<table  border="0" cellpadding="3" cellspacing="0" style="width: 80%;">
															<tr style="text-align: right;">
   																<td>
																	<button onclick="loaddataobat()" class="btn btn-sm" data-bs-dismiss="modal" 
																	style="background-color: #B69906; color: #fff;">Load data Resep</button>
																</td>
															</tr>
														</table>
														<br>
														<table id="obatpindah" border="1" cellpadding="3" cellspacing="0" style="width: 80%;">
															<tbody>
																<tr style="background-color: #ccc;">
																	<th style="width: 25%; text-align: center; font-size: 14px;" height="35px">Nama Obat</th>
																	<th style="width: 23%; text-align: center; font-size: 14px;">Aturan Pakai</th>
																	<th style="width: 23%; text-align: center; font-size: 14px;">Tindak Lanjut</th>
																	<th style="width: 23%; text-align: center; font-size: 14px;">Perubahan Aturan Pakai</th>
																	<th style="width: 6%; text-align: center; font-size: 14px;">#</th>
																</tr>
																<?php
																	if ($dtobatpindah == NULL) {
																		?>
																		<tr>
																			<td colspan="100%" class="text-center">
																				Belum Ada Data
																			</td>
																		</tr>
																	<?php } else {
																		$no = 1;
																		$jmlt = 0;
																		foreach ($dtobatpindah as $row) {
																			?>
																			<tr>
																				<td style="font-size: 13px;" height="35px"><?php echo $row->nama_obat; ?></td>
																				<td style="font-size: 13px;"><?php echo $row->aturanpakai; ?></td>
																				<td style="font-size: 14px;">
																					<select id="tindaklanjut_<?php echo $row->id; ?>" style="width: 100%; height: 30px; border: none;">
																						<option value="0" style="border: none;" <?php if ($row->tindaklanjut == 0) echo 'selected'; ?>></option>
																						<option value="1" style="border: none;" <?php if ($row->tindaklanjut == 1) echo 'selected'; ?>>Lanjut aturan pakai yang sama</option>
																						<option value="2" style="border: none;" <?php if ($row->tindaklanjut == 2) echo 'selected'; ?>>Lanjut dengan aturan pakai berubah</option>
																						<option value="3" style="border: none;" <?php if ($row->tindaklanjut == 3) echo 'selected'; ?>>Stop</option>
																					</select>
																				</td>
																				<!-- <td style="font-size: 13px;"><?php echo $row->perubahan; ?></td> -->
																				<td style="font-size: 13px;"><input type="text" id="perubahan_<?php echo $row->id; ?>" style="width: 100%; height: 30px; border: none;" value="<?php echo $row->perubahan; ?>"></td>
																				<td style="font-size: 13px;">
																					<button onclick="saveperubahan('<?php echo $row->id;?>')" class="btn btn-success" data-bs-dismiss="modal">s</button>
																					<button onclick="hapusobatpindah('<?php echo $row->id;?>')" class="btn btn-danger" data-bs-dismiss="modal">x</button>
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
											</div>
										</div>
									</div>
									<!-- nyeri -->
									<div class="tab-pane fade" id="saatpulang" role="tablitabpanelst" aria-labelledby="subtabsaatpulang">
									<div class="card">
											<div class="card-body">
												<div class="w-sm-100 mr-auto"><h6 style="color: #940A06;">Saat Discharge</h6></div>
												<div class="form-group row col-spacing-row">
													<div class="col-md-12">
														<table  border="0" cellpadding="3" cellspacing="0" style="width: 80%;">
															<tr style="text-align: right;">
   																<td>
																	<button onclick="loaddataobatpulang()" class="btn btn-sm" data-bs-dismiss="modal" 
																	style="background-color: #B69906; color: #fff;">Load data Resep</button>
																</td>
															</tr>
														</table>
														<br>
														<table id="obatpulang" border="1" cellpadding="3" cellspacing="0" style="width: 80%;">
															<tbody>
																<tr style="background-color: #ccc;">
																	<th style="width: 25%; text-align: center; font-size: 14px;" height="35px">Nama Obat</th>
																	<th style="width: 19%; text-align: center; font-size: 14px;">Aturan Pakai</th>
																	<th style="width: 19%; text-align: center; font-size: 14px;">Tindak Lanjut</th>
																	<th style="width: 19%; text-align: center; font-size: 14px;">Aturan Pakai Obat Saat Pulang</th>
																	<th style="width: 12%; text-align: center; font-size: 14px;">Rute</th>
																	<th style="width: 6%; text-align: center; font-size: 14px;">#</th>
																</tr>
																<?php
																	if ($dtobatpulang == NULL) {
																		?>
																		<tr>
																			<td colspan="100%" class="text-center">
																				Belum Ada Data
																			</td>
																		</tr>
																	<?php } else {
																		$no = 1;
																		$jmlt = 0;
																		foreach ($dtobatpulang as $row) {
																			?>
																			<tr>
																				<td style="font-size: 13px;" height="35px"><?php echo $row->nama_obat; ?></td>
																				<td style="font-size: 13px;"><?php echo $row->aturanpakai; ?></td>
																				<td style="font-size: 14px;">
																					<select id="tindaklanjut_<?php echo $row->id; ?>" style="width: 100%; height: 30px; border: none;">
																						<option value="0" style="border: none;" <?php if ($row->tindaklanjut == 0) echo 'selected'; ?>></option>
																						<option value="1" style="border: none;" <?php if ($row->tindaklanjut == 1) echo 'selected'; ?>>Lanjut aturan pakai yang sama</option>
																						<option value="2" style="border: none;" <?php if ($row->tindaklanjut == 2) echo 'selected'; ?>>Lanjut dengan aturan pakai berubah</option>
																						<option value="3" style="border: none;" <?php if ($row->tindaklanjut == 3) echo 'selected'; ?>>Stop</option>
																					</select>
																				</td>
																				<!-- <td style="font-size: 13px;"><?php echo $row->perubahan; ?></td> -->
																				<td style="font-size: 13px;"><input type="text" id="perubahan_<?php echo $row->id; ?>" style="width: 100%; height: 30px; border: none;" value="<?php echo $row->perubahan; ?>"></td>
																				<td style="font-size: 14px;">
																					<select id="rute_<?php echo $row->id; ?>" style="width: 100%; height: 30px; border: none;">
																						<option value="0" style="border: none;" <?php if ($row->rute == 0) echo 'selected'; ?>></option>
																						<option value="1" style="border: none;" <?php if ($row->rute == 1) echo 'selected'; ?>>Oral</option>
																						<option value="2" style="border: none;" <?php if ($row->rute == 2) echo 'selected'; ?>>Parenteral</option>
																						<option value="3" style="border: none;" <?php if ($row->rute == 3) echo 'selected'; ?>>Topikal</option>
																						<option value="4" style="border: none;" <?php if ($row->rute == 4) echo 'selected'; ?>>Supositoria</option>
																						<option value="5" style="border: none;" <?php if ($row->rute == 5) echo 'selected'; ?>>Sublingual</option>
																						<option value="6" style="border: none;" <?php if ($row->rute == 6) echo 'selected'; ?>>Bukal</option>
																						<option value="7" style="border: none;" <?php if ($row->rute == 8) echo 'selected'; ?>>Lainnya</option>
																					</select>
																				</td>
																				<td style="font-size: 13px;">
																					<button onclick="saveperubahanpulang('<?php echo $row->id;?>')" class="btn btn-success" data-bs-dismiss="modal">s</button>
																					<button onclick="hapusobatpulang('<?php echo $row->id;?>')" class="btn btn-danger" data-bs-dismiss="modal">x</button>
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
											</div>
										</div>
									</div>
								</div>
							</nav>
						</div>
						<!-- =========== -->
	</div>
</div>

<script>
	
function kuranglengkap() {
	$.notify("Data Kurang Lengkap", "error");
}

function loaddataobat() {
			var no_rm = document.getElementById("no_rm").value;
			var notransaksi = document.getElementById("notransaksi").value;
			console.log(no_rm);
			console.log(notransaksi);
			$.ajax({
				url: "<?php echo site_url(); ?>/rme/loaddataobat",
				type: "GET",
				data: {
					no_rm: no_rm,
					notransaksi: notransaksi,
				},
				success: function (ajaxData) {
					console.log(ajaxData);
					var dt = JSON.parse(ajaxData);
					$("#obatpindah tbody tr").remove();
					$("#obatpindah tbody").append(dt.dtview);
				},
				error: function (ajaxData) {
					$.notify("Gagal Memproses Data", "error");
				}
			});
}

function loaddataobatpulang() {
			var no_rm = document.getElementById("no_rm").value;
			var notransaksi = document.getElementById("notransaksi").value;
			console.log(no_rm);
			console.log(notransaksi);
			$.ajax({
				url: "<?php echo site_url(); ?>/rme/loaddataobatpulang",
				type: "GET",
				data: {
					no_rm: no_rm,
					notransaksi: notransaksi,
				},
				success: function (ajaxData) {
					console.log(ajaxData);
					var dt = JSON.parse(ajaxData);
					$("#obatpulang tbody tr").remove();
					$("#obatpulang tbody").append(dt.dtview);
				},
				error: function (ajaxData) {
					$.notify("Gagal Memproses Data", "error");
				}
			});
}

function saveperubahan(id) {
		var tindaklanjut = document.getElementById('tindaklanjut_' + id).value;
		var perubahan = document.getElementById('perubahan_' + id).value;
		var rute='';
        // Kirim data menggunakan AJAX
        $.ajax({
			url: "<?php echo site_url(); ?>/rme/updateData",
            method: 'POST',
            dataType: 'json',
            data: {
                id: id,
                tindaklanjut: tindaklanjut,
                perubahan: perubahan,
				rute : rute
            },
            success: function(response) {
                if (response.success) {
                    // alert('Data berhasil diperbarui');
                } else {
                    // alert('Gagal memperbarui data');
                }
            },
            error: function() {
                // Handle jika terjadi kesalahan pada AJAX request
                alert('Terjadi kesalahan saat mengirim data');
            }
        });
    }

	function saveperubahanpulang(id) {
		var tindaklanjut = document.getElementById('tindaklanjut_' + id).value;
		var tindaklanjuttext = $("#tindaklanjut option:selected").text();
		var perubahan = document.getElementById('perubahan_' + id).value;
		var perubahantext = $("#perubahan option:selected").text();
		var rute = document.getElementById('rute_' + id).value;
		var rutetext = $("#rute option:selected").text();

        // Kirim data menggunakan AJAX
        $.ajax({
			url: "<?php echo site_url(); ?>/rme/updateData",
            method: 'POST',
            dataType: 'json',
            data: {
                id: id,
                tindaklanjut: tindaklanjut,
                tindaklanjuttext: tindaklanjuttext,
                perubahan: perubahan,
                perubahantext: perubahantext,
                rute: rute,
                rutetext: rutetext
            },
            success: function(response) {
                if (response.success) {
                    // alert('Data berhasil diperbarui');
                } else {
                    // alert('Gagal memperbarui data');
                }
            },
            error: function() {
                // Handle jika terjadi kesalahan pada AJAX request
                alert('Terjadi kesalahan saat mengirim data');
            }
        });
    }



	function saveobatmasuk() {
		var no_rm = document.getElementById('no_rm').value;
		var notransaksi = document.getElementById('notransaksi').value;
		var namaobat = document.getElementById('namaobat').value;
		var aturanpakai = document.getElementById('aturanpakai').value;
		var tindaklanjut = document.getElementById('tindaklanjut').value;
		var tindaklanjuttext = $("#tindaklanjut option:selected").text();
		var perubahan = document.getElementById('perubahan').value;
        // Kirim data menggunakan AJAX
        $.ajax({
			url: "<?php echo site_url(); ?>/rme/simpanobatmasuk",
            method: 'GET',
            data: {
                no_rm: no_rm,
                notransaksi: notransaksi,
                namaobat: namaobat,
                aturanpakai: aturanpakai,
                tindaklanjut: tindaklanjut,
                tindaklanjuttext: tindaklanjuttext,
                perubahan: perubahan
            },
            success: function(ajaxData) {
				$("#namaobat").val("");
				$("#aturanpakai").val("");
				$("#tindaklanjut").val("0");
				$("#perubahan").val("");
				console.log(ajaxData);
					var dt = JSON.parse(ajaxData);
					$("#obatmasuk tbody tr").remove();
					$("#obatmasuk tbody").append(dt.dtview);
            },
            error: function() {
                // Handle jika terjadi kesalahan pada AJAX request
                alert('Terjadi kesalahan saat mengirim data');
            }
        });
    }

	function hapusobatmasuk(id) {
		var no_rm = document.getElementById('no_rm').value;
		var notransaksi = document.getElementById('notransaksi').value;
        $.ajax({
			url: "<?php echo site_url(); ?>/rme/hapusobatmasuk",
            method: 'GET',
            data: {
				id : id,
                no_rm: no_rm,
                notransaksi: notransaksi
            },
            success: function(ajaxData) {
				$("#namaobat").val("");
				$("#aturanpakai").val("");
				$("#tindaklanjut").val("0");
				$("#perubahan").val("");
				console.log(ajaxData);
					var dt = JSON.parse(ajaxData);
					$("#obatmasuk tbody tr").remove();
					$("#obatmasuk tbody").append(dt.dtview);
            },
            error: function() {
                // Handle jika terjadi kesalahan pada AJAX request
                alert('Terjadi kesalahan saat mengirim data');
            }
        });
    }

	function hapusobatpindah(id) {
		var no_rm = document.getElementById('no_rm').value;
		var notransaksi = document.getElementById('notransaksi').value;
        $.ajax({
			url: "<?php echo site_url(); ?>/rme/hapusobatpindah",
            method: 'GET',
            data: {
				id : id,
                no_rm: no_rm,
                notransaksi: notransaksi
            },
            success: function(ajaxData) {
				console.log(ajaxData);
				var dt = JSON.parse(ajaxData);
				$("#obatpindah tbody tr").remove();
				$("#obatpindah tbody").append(dt.dtview);
            },
            error: function() {
                // Handle jika terjadi kesalahan pada AJAX request
                alert('Terjadi kesalahan saat mengirim data');
            }
        });
    }

	function hapusobatpulang(id) {
		var no_rm = document.getElementById('no_rm').value;
		var notransaksi = document.getElementById('notransaksi').value;
        $.ajax({
			url: "<?php echo site_url(); ?>/rme/hapusobatpulang",
            method: 'GET',
            data: {
				id : id,
                no_rm: no_rm,
                notransaksi: notransaksi
            },
            success: function(ajaxData) {
				console.log(ajaxData);
				var dt = JSON.parse(ajaxData);
				$("#obatpulang tbody tr").remove();
				$("#obatpulang tbody").append(dt.dtview);
            },
            error: function() {
                // Handle jika terjadi kesalahan pada AJAX request
                alert('Terjadi kesalahan saat mengirim data');
            }
        });
    }
</script>	
