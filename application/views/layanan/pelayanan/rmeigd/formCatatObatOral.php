<style>
.sticky-col {
    position: sticky;
    left: 0;
    background-color: #D7D9DA; /* Tambahkan warna latar belakang yang sesuai */
    z-index: 1; /* Atur z-index untuk memastikan kolom pertama tampil di atas kolom lainnya */
}
</style>

<link rel="stylesheet" href="../../assets/template_baru/dist/vendors/icheck/skins/all.css">
<div class="card">
	<div class="col-12 mt-4 ml-3">
		<!-- <span style="font-size: 16px; font-weight: bold; color: navy;">TRIASE</span> -->
		<div class="w-sm-100 mr-auto"><h6 class="mb-0" style="color: navy;">FORM CATATAN PEMBERIAN OBAT PASIEN RAWAT INAP</h6></div>
	</div>
	<div class="col-12 mt-2 ml-3">
		<div class="card">
			<div class="card-body">
				<div class="form-group row col-spacing-row">
					<div class="col-md-12">
						<button onclick="loaddataobatoral()" class="btn btn-sm" data-bs-dismiss="modal" style="background-color: #B69906; color: #fff;">Load data Resep</button>
						<!-- $jumlahbarisTanggal -->
						
						<?php 
							$lebarint=80+($jumlahbarisTanggal*30);
							$lebar = strval($lebarint);
							$pj="width:".$lebar."%;"; 
						?>

						<div class="table-responsive">
							<!-- <table class="table table-bordered table-hover" id="obatoral" border="1" cellpadding="3" cellspacing="0" style="<?php echo $pj; ?>"> -->
							<table class="table table-bordered table-hover" id="obatoral" border="1" cellpadding="3" cellspacing="0" style="width : 100%">
								<thead>
									<tr style='background-color: #D7D9DA;'>
										<td class="sticky-col" width="20%" rowspan="2" align="center" valign="middle"><strong>Nama Obat</strong></td>
										<td width="11%" rowspan="2" align="center" valign="middle"><strong>Kekuatan, Bentuk Sediaan</strong></td>
										<td width="11%" rowspan="2" align="center" valign="middle"><strong>Rute</strong></td>
										<td width="11%" rowspan="2" align="center" valign="middle"><strong>Frekwensi</strong></td>
										<td width="21%" rowspan="2" align="center" valign="middle"><strong>Dokter</strong></td>
										<?php 
										foreach ($dtcatatobatdetail as $rowdetail) { ?>
											<td colspan="4" align="center" valign="middle"><strong><?php echo $rowdetail->tanggal; ?></strong></td>
										<?php } ?>	
									</tr>
										<tr style='background-color: #D7D9DA;'>
											<?php foreach ($dtcatatobatdetail as $rowdetail) { ?>
												<td width="5%" valign="middle"><strong>Pagi</strong></td>
												<td width="5%" valign="middle"><strong>Siang</strong></td>
												<td width="5%" valign="middle"><strong>Sore</strong></td>
												<td width="5%" valign="middle"><strong>Malam</strong></td>
											<?php } ?>	
										</tr>
								</thead>
								<tbody>
									
									<?php
									if ($dtcatatobat == NULL) {
									?>
										<tr>
											<td colspan="100%" class="text-center">
												Belum Ada Data
											</td>
										</tr>
									<?php } else {
										$no = 1;
										$jmlt = 0;
										foreach ($dtcatatobat as $row) {
									?>
											<tr>
												<td style="font-size: 13px;" height="35px"><?php echo $row->namaobat; ?></td>
												<td style="font-size: 13px;"><?php echo $row->kekuatan; ?></td>
												<td style="font-size: 13px;"><?php echo $row->rute; ?></td>
												<td style="font-size: 13px;"><?php echo $row->frekwensi; ?></td>
												<td style="font-size: 13px;"><?php echo $row->nama_dokter; ?></td>
												<?php foreach ($dtcatatobatdetail as $rowdetail) { ?>

												<?php } ?>	
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

function loaddataobatoral() {
			var no_rm = document.getElementById("no_rm").value;
			var notransaksi = document.getElementById("notransaksi").value;
			console.log(no_rm);
			console.log(notransaksi);
			$.ajax({
				url: "<?php echo site_url(); ?>/rme/loaddataobatoral",
				type: "GET",
				data: {
					no_rm: no_rm,
					notransaksi: notransaksi,
				},
				success: function (ajaxData) {
					console.log(ajaxData);
					var dt = JSON.parse(ajaxData);
					$("#obatoral tbody tr").remove();
					$("#obatoral tbody").append(dt.dtview);
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
				$("#obatoral tbody tr").remove();
				$("#obatoral tbody").append(dt.dtview);
            },
            error: function() {
                // Handle jika terjadi kesalahan pada AJAX request
                alert('Terjadi kesalahan saat mengirim data');
            }
        });
    }
</script>	
