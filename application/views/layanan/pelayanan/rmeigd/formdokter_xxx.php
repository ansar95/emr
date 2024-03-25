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
						<a class="nav-item nav-link mt-2 bg-warning text-dark" id="igd" data-toggle="tab" href="#navIGD" role="tab" aria-controls="navIGD" aria-selected="false" style="color: red; font-size: 12px;">IGD Gawat Darurat</a>
						<a class="nav-item nav-link mt-2 bg-secondary text-white" id="igdobgyn" data-toggle="tab" href="#navIGDObgyn" role="tab" aria-controls="navIGDObgyn" aria-selected="false" style="color: red; font-size: 12px;">IGD Obgyn</a>
				</div>
			</nav>

				<!-- ---control nav--- -->
				<div class="tab-content mb-5" id="nav-tabContent">
					<div class="tab-pane fade show active" id="navIGD" role="tabpanel" aria-labelledby="IGD">
						
						</div>
					</div>
					<!-- Tab "Pasien IGD Obgyn" -->
					<div class="tab-pane fade " id="navIGDObgyn" role="tabpanel" aria-labelledby="IGDObgyn">
						<div class="row col-md-12">
							<?php
							foreach ($dataPasienDokterObgyn as $row) {
							?>
								<div class="col-md-9 mt-3">
									<div class="card border-danger custom-card" onmouseover="changeBackgroundColor(this, true)" onmouseout="changeBackgroundColor(this, false)" <?php if ($row->status == 1) echo 'style="background-color: #FDF5E6;"'; ?>>
										<div class="card-body">
											<input class="form-control id-input" type="hidden" value="<?php echo $row->id; ?>">
											<input class="form-control notransaksi-input" type="hidden" value="<?php echo $row->notransaksi; ?>">
											<input class="form-control nama-input" type="hidden" value="<?php echo $row->nama_pasien; ?>">
											<input class="form-control no_rm-input" type="hidden" value="<?php echo $row->no_rm; ?>">
											<input class="form-control kode_dokter-input" type="hidden" value="<?php echo $row->kode_dokter; ?>">

											<button class="btn btn-primary float-right" onclick="bukaFormPasienIgd('<?php echo $row->id; ?>', '<?php echo $row->notransaksi; ?>', '<?php echo $row->nama_pasien; ?>', '<?php echo $row->no_rm; ?>', '<?php echo $row->kode_dokter; ?>')"><?php echo 'P'; ?></button>
											<h6 class="card-title"><?php echo $row->no_rm.' - '.$row->nama_pasien; ?></h6>
											<h7 class="card-title"><?php echo $row->golongan.' | No. Kartu : '.$row->no_askes.' | NIK : '.$row->nik; ?></h7>
										</div>
									</div>
								</div>
							<?php
							}
							?>
						</div>
					</div>
					
					<!-- --------$_COOKIE
					$data["dataPasienDokter"] = $this->rmeigdmdl->caripasienigd('IGDD');
			$data["dataPasienDokterObgyn"] = $this->rmeigdmdl->caripasienigd('IGDP'); -->
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

function bukaFormPasienIgd(id, notransaksi, nama_pasien, no_rm, kode_dokter) {
    // Mengganti 'your_controller' dengan nama controller yang sesuai
    // var controllerName = 'rme';

    // Membuat URL yang sesuai untuk controller rme_form_pasien
    // var url = '/' + controllerName + '/rme_form_pasien';
	var url= "<?php echo site_url(); ?>/rme/rme_form_pasien_igd";

	
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
