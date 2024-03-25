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
			<!-- <div class="card text-white bg-info"> -->
			<div class="card" style="background-color: #48D1CC;">
				<div class="row spacing-row mb-1">
					<div class="col-md-8">
						<div class="card-body">
							<h5 class="card-title"><?php echo $this->session->userdata("nama"); ?></h5>
							<!-- <p class="card-text">Spesialis ....</p> -->
						</div>
					</div>
					<div class="col-md-4">
						<div class="row spacing-row">
							<div class="col-md-12 mt-3">
								<div class="row form-group">
									<label class="col-sm-3 col-form-label text-right">Tanggal</label>
									<div class="col-sm-5">
										<input type="text" class="form-control pull-right" id="tglp" name="tglp" required autocomplete='off' disabled>
									</div>
								</div>
							</div>
						</div>
					</div>
            	</div>
            </div>
			<div class="card">
			<nav>
				<div class="nav nav-tabs font-weight-bold border-bottom ml-3" id="nav-tab" role="tablist">
					<a class="nav-item nav-link active font-weight-bold mt-2 bg-danger text-light" id="rawatJalanNow" data-toggle="tab" href="#navRawatJalanNow" role="tab" aria-controls="navRawatJalanNow" aria-selected="true" style="font-size: 12px;">Rawat Jalan Hari Ini</a>
					<a class="nav-item nav-link mt-2 bg-info text-light" id="rawatJalanNext" data-toggle="tab" href="#navRawatJalanNext" role="tab" aria-controls="navRawatJalanNext" aria-selected="false" style="color: brown; font-size: 12px;">Rawat Jalan Akan Datang</a>
					<a class="nav-item nav-link mt-2 bg-primary text-light" id="rawatInap" data-toggle="tab" href="#navRawatInap" role="tab" aria-controls="navRawatInap" aria-selected="false" style="color: red; font-size: 12px;">Pasien Rawat Inap</a>
					<a class="nav-item nav-link mt-2 bg-warning text-dark" id="igd" data-toggle="tab" href="#navIGD" role="tab" aria-controls="navIGD" aria-selected="false" style="color: red; font-size: 12px;">Instalasi Gawat Darurat</a>
				</div>
			</nav>

				<!-- ---control nav--- -->
				<div class="tab-content mb-5" id="nav-tabContent">
					<!-- Tab "Rawat Jalan Hari Ini" -->
					<div class="tab-pane fade show active" id="navRawatJalanNow" role="tabpanel" aria-labelledby="rawatJalanNow">
						<div class="col-md-12 mt-3">
							<label class="col-form-label"><span style="color: green;">Pasien Rawat Jalan Hari Ini Tanggal : <?php echo date("d-m-Y"); ?></span></label>
						</div>
						
						<div class="row col-md-12">
							<?php
							foreach ($dataPasienDokter as $row) {
							?>
								<div class="col-md-9 mt-3">
									<div class="card border-danger custom-card" onmouseover="changeBackgroundColor(this, true)" onmouseout="changeBackgroundColor(this, false)" <?php if ($row->status == 1) echo 'style="background-color: #FDF5E6;"'; ?>>
										<div class="card-body">
											<input class="form-control id-input" type="hidden" value="<?php echo $row->id; ?>">
											<input class="form-control notransaksi-input" type="hidden" value="<?php echo $row->notransaksi; ?>">
											<input class="form-control nama-input" type="hidden" value="<?php echo $row->nama_pasien; ?>">
											<input class="form-control no_rm-input" type="hidden" value="<?php echo $row->no_rm; ?>">
											<input class="form-control kode_dokter-input" type="hidden" value="<?php echo $row->kode_dokter; ?>">

											<button class="btn btn-primary float-right" onclick="bukaFormPasien('<?php echo $row->id; ?>', '<?php echo $row->notransaksi; ?>', '<?php echo $row->nama_pasien; ?>', '<?php echo $row->no_rm; ?>', '<?php echo $row->kode_dokter; ?>')"><?php echo $row->no_antrian; ?></button>
											<h6 class="card-title"><?php echo $row->no_rm.' - '.$row->nama_pasien; ?></h6>
											<h7 class="card-title"><?php echo $row->nama_unit.' | '.$row->golongan.' | No. Kartu : '.$row->no_askes.' | NIK : '.$row->nik; ?></h7>
										</div>
									</div>
								</div>
							<?php
							}
							?>
						</div>
					</div>

					
					<!-- Tab "Rawat Jalan Akan Datang" -->
					<div class="tab-pane fade" id="navRawatJalanNext" role="tabpanel" aria-labelledby="rawatJalanNext">
						<!-- Isi untuk "Rawat Jalan Akan Datang" -->
						<div class="col-md-12 mt-3">
							<label class="col-form-label"><span style="color: red;">Pasien Rawat Jalan Akan Datang</span></label>
						</div>
						<div class="row col-md-12">
							<?php
							foreach ($dataPasienNext as $row) {
							?>
								<div class="col-md-4 mt-3">
									<div class="card border-danger custom-card" onmouseover="changeBackgroundColor(this, true)" onmouseout="changeBackgroundColor(this, false)">
										<div class="card-body">
											<input class="form-control id-input" type="hidden" value="<?php echo $row->id;?>">
											<input class="form-control notransaksi-input" type="hidden" value="<?php echo $row->notransaksi;?>">
											<input class="form-control nama-input" type="hidden" value="<?php echo $row->nama_pasien;?>">
											<input class="form-control kode_dokter-input" type="hidden" value="<?php echo $row->kode_dokter;?>">
											<h6 class="card-title"><?php echo $row->no_antrian.' | '.$row->no_rm.' | '.$row->nama_pasien; ?></h6>
											<h7 class="card-title"><?php echo $row->golongan.' | No. Kartu : '.$row->no_askes.' | NIK : '.$row->nik;?></h7>
											<p>
												<span style="display: inline;"><?php echo 'Alamat : ' . $row->alamat ?></span><br>
												<span style="display: inline; color: red;"><?php echo 'Tanggal Pelayanan : ' . $row->tgl_masuk ?></span>
											</p>
										</div>
									</div>
									
								</div>
							<?php
							}
							?>
						</div>
					</div>

					<!-- Tab "Pasien Rawat Inap" -->
					<div class="tab-pane fade" id="navRawatInap" role="tabpanel" aria-labelledby="rawatInap">
						<!-- Isi untuk "Pasien Rawat Inap" -->
						<div class="col-md-4 mt-3">
							<p> "Rawat Inap, Next...".</p>
						</div>
					</div>

					<!-- Tab "Pasien IGD" -->
					<div class="tab-pane fade" id="navIGD" role="tabpanel" aria-labelledby="IGD">
						<!-- Isi untuk "Pasien Rawat Inap" -->
						<div class="col-md-4 mt-3">
							<p> "IGD, Next...".</p>
						</div>
					</div>
				</div>

				<!-- ----end control nav---- -->
			</div>
		</div>
	</div>
</div>	

<script>
function changeBackgroundColor(card, isMouseOver) {
    if (isMouseOver) {
        card.style.backgroundColor = "<?php echo ($row->status == 1) ? '#FDF5E6' : 'lightgray'; ?>"; // Mengubah warna latar belakang saat kursor berada di atas card
        card.style.borderColor = "darkgray"; // Mengubah warna garis tepi saat kursor berada di atas card
    } else {
        card.style.backgroundColor = "<?php echo ($row->status == 1) ? '#FDF5E6' : ''; ?>"; // Menghapus warna latar belakang saat kursor meninggalkan card
        card.style.borderColor = ""; // Menghapus warna garis tepi saat kursor meninggalkan card
    }
}
</script>


</script>

<script>

// function bukaFormPasien(id,notransaksi,nama_pasien) {
//     alert(id+' '+notransaksi+' '+nama_pasien);
// }

function bukaFormPasien(id, notransaksi, nama_pasien, no_rm, kode_dokter) {
    // Mengganti 'your_controller' dengan nama controller yang sesuai
    // var controllerName = 'rme';

    // Membuat URL yang sesuai untuk controller rme_form_pasien
    // var url = '/' + controllerName + '/rme_form_pasien';
	var url= "<?php echo site_url(); ?>/rme/rme_form_pasien";

	
    // Membuat sebuah form dengan metode POST
    var form = document.createElement('form');
    form.method = 'POST';
    form.action = url;

    // Membuat input hidden untuk data yang akan dikirimkan
    var idInput = document.createElement('input');
    idInput.type = 'hidden';
    idInput.name = 'id';
    idInput.value = id;
    form.appendChild(idInput);

    var notransaksiInput = document.createElement('input');
    notransaksiInput.type = 'hidden';
    notransaksiInput.name = 'notransaksi';
    notransaksiInput.value = notransaksi;
    form.appendChild(notransaksiInput);

    var namaInput = document.createElement('input');
    namaInput.type = 'hidden';
    namaInput.name = 'nama';
    namaInput.value = nama_pasien;
    form.appendChild(namaInput);

	var no_rmInput = document.createElement('input');
    no_rmInput.type = 'hidden';
    no_rmInput.name = 'no_rm';
    no_rmInput.value = no_rm;
    form.appendChild(no_rmInput);

	var kode_dokterInput = document.createElement('input');
    kode_dokterInput.type = 'hidden';
    kode_dokterInput.name = 'kode_dokter';
    kode_dokterInput.value = kode_dokter;
    form.appendChild(kode_dokterInput);

    // Menambahkan form ke dalam dokumen dan mengirimkan
    document.body.appendChild(form);
    form.submit();
}


</script>




