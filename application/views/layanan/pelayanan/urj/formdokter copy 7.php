
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
			<!-- <div class="card" style="background-color: #48D1CC;"> -->
				<div class="row spacing-row mb-1">
					<div class="col-md-8">
						<div class="card-body">
							<h4 class="card-title" style="color: #2D076F;"><?php echo $this->session->userdata("nama"); ?></h4>
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
            <!-- </div> -->
			<nav>
				<div class="nav nav-tabs font-weight-bold border-bottom ml-0" id="nav-tab" role="tablist">
					<?php if ($this->session->userdata("akses_rme") == 1) {?>
						<a class="nav-item nav-link  font-weight-bold mt-0 bg-danger text-light" id="rawatJalanNow" data-toggle="tab" href="#navRawatJalanNow" role="tab" aria-controls="navRawatJalanNow" aria-selected="true" style="font-size: 12px; border: 1px ">Rawat Jalan Hari Ini</a>
						<a class="nav-item nav-link mt-0 bg-info text-light" id="rawatJalanNext" data-toggle="tab" href="#navRawatJalanNext" role="tab" aria-controls="navRawatJalanNext" aria-selected="false" style="color: brown; font-size: 12px; border: 1px ">Rawat Jalan Akan Datang</a>
					<?php } ?>
					<?php if ($this->session->userdata("akses_rme_inap") == 1) {?>
						<a class="nav-item nav-link mt-0 bg-primary text-light" id="rawatInap" data-toggle="tab" href="#navRawatInap" role="tab" aria-controls="navRawatInap" aria-selected="false" style="color: red; font-size: 12px;">Pasien Rawat Inap</a>
					<?php } ?>
					<?php if ($this->session->userdata("akses_rmeigd") == 1) {?>
						<a class="nav-item nav-link mt-0 bg-warning text-dark" id="igd" data-toggle="tab" href="#navIGD" role="tab" aria-controls="navIGD" aria-selected="false" style="color: red; font-size: 12px;">Instalasi Gawat Darurat</a>
					<?php } ?>
					<?php if ($this->session->userdata("akses_rmeigdobgyn") == 1) {?>
						<a class="nav-item nav-link mt-0 bg-secondary text-white" id="igdobgyn" data-toggle="tab" href="#navIGDObgyn" role="tab" aria-controls="navIGDObgyn" aria-selected="false" style="color: red; font-size: 12px;">IGD Obgyn</a>
					<?php } ?>
					<?php if ($this->session->userdata("akses_rme") == 1) {?>
						<a class="nav-item nav-link mt-0 text-white" id="rajalOld" data-toggle="tab" href="#navRajalOld" role="tab" aria-controls="navRajalOld" aria-selected="false" style="color: red; font-size: 12px; background-color: #7A8407;">History Pasien</a>
					<?php } ?>
					<?php if ($this->session->userdata("akses_rme_operasi") == 1) {?>
						<a class="nav-item nav-link mt-0 text-white" id="operasi" data-toggle="tab" href="#navOperasi" role="tab" aria-controls="navOperasi" aria-selected="false" style="color: red; font-size: 12px; background-color: #780673;">Operasi</a>
					<?php } ?>
				</div>
			</nav>

			<div class="card">
				<!-- ---control nav--- -->
				<div class="tab-content mb-5" id="nav-tabContent">
					<!-- Tab "Rawat Jalan Hari Ini" -->
					<div class="tab-pane fade <?php echo ($tabnav == 1) ? 'show active' : ''; ?>" id="navRawatJalanNow" role="tabpanel" aria-labelledby="rawatJalanNow">
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
											<input class="form-control nama-input" type="hidden" value="<?php echo addslashes($row->nama_pasien); ?>">
											<input class="form-control no_rm-input" type="hidden" value="<?php echo $row->no_rm; ?>">
											<input class="form-control kode_dokter-input" type="hidden" value="<?php echo $row->kode_dokter; ?>">

											<button class="btn btn-primary float-right" onclick="bukaFormPasien('<?php echo $row->id; ?>', '<?php echo $row->notransaksi; ?>', '<?php echo addslashes($row->nama_pasien); ?>', '<?php echo $row->no_rm; ?>', '<?php echo $row->kode_dokter; ?>',1,1)"><?php echo $row->no_antrian; ?></button>
											<h6 class="card-title"><?php echo $row->no_rm.' - '.addslashes($row->nama_pasien); ?></h6>
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
					<div class="tab-pane fade <?php echo ($tabnav == 2) ? 'show active' : ''; ?>" id="navRawatJalanNext" role="tabpanel" aria-labelledby="rawatJalanNext">
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
											<input class="form-control nama-input" type="hidden" value="<?php echo addslashes($row->nama_pasien);?>">
											<input class="form-control kode_dokter-input" type="hidden" value="<?php echo $row->kode_dokter;?>">
											<h6 class="card-title"><?php echo $row->no_antrian.' | '.$row->no_rm.' | '.addslashes($row->nama_pasien); ?></h6>
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
					<div class="tab-pane fade <?php echo ($tabnav == 3) ? 'show active' : ''; ?>" id="navRawatInap" role="tabpanel" aria-labelledby="rawatInap">
					<!-- <div class="tab-pane fade <?php echo 'show active'; ?>" id="navRawatInap" role="tabpanel" aria-labelledby="rawatInap"> -->
						<!-- Isi untuk "Pasien Rawat Inap" -->
						<div class="col-md-12 mt-3 form-inline">
							<label for="cariInputranap">Cari : </label>
							<input class="form-control" id="cariInputranap" type="text" oninput="filterDataRanap()">
						</div>
						<div class="row col-md-12 mt-3">
							<?php
							foreach ($dataPasienRanap as $row) {
							?>
								<div class="col-md-9">
									<div class="card border-secondary custom-cardranap" style="margin-bottom: 3px;" onmouseover="changeBackgroundColor(this, true)" onmouseout="changeBackgroundColor(this, false)">
										<div class="card-body">
											<input class="form-control id-input" type="hidden" value="<?php echo $row->id; ?>">
											<input class="form-control notransaksi-input" type="hidden" value="<?php echo $row->notransaksi; ?>">
											<input class="form-control nama-input" type="hidden" value="<?php echo addslashes($row->nama_pasien); ?>">
											<input class="form-control no_rm-input" type="hidden" value="<?php echo $row->no_rm; ?>">
											<input class="form-control kode_dokter-input" type="hidden" value="<?php echo $row->kode_dokter; ?>">
											<input class="form-control status-input" type="hidden" value="<?php echo $row->status; ?>">
											
											<button class="btn <?php echo ($row->status == 1) ? 'btn-danger' : 'btn-primary'; ?> float-right" onclick="bukaFormPasienRanap('<?php echo $row->id; ?>', '<?php echo $row->notransaksi; ?>', '<?php echo addslashes($row->nama_pasien); ?>', '<?php echo $row->no_rm; ?>', '<?php echo $row->kode_dokter; ?>','<?php echo $row->status; ?>',3,1)">Buka</button>
											
											<h6 class="card-title"><?php echo $row->no_rm.' - '.addslashes($row->nama_pasien); ?></h6>
											<h7 class="card-title"><?php echo $row->tgl_masuk.' | '.$row->nama_unit.' | '.addslashes($row->nama_dokter).' | '.$row->golongan.' | No. Kartu : '.$row->no_askes.' | NIK : '.$row->nik; ?></h7>

											
										</div>
									</div>
								</div>
							<?php
							}
							if ($kodedokternya != 'XXXXXX') {
								// pasien konsul=======
								foreach ($dataPasienRanapKonsul as $row) {
								?>	
									<div class="col-md-9">
										<div class="card border-danger custom-cardranap"  style="border: 1px solid red; margin-bottom: 3px;" onmouseover="changeBackgroundColor(this, true)" onmouseout="changeBackgroundColor(this, false)">
											<div class="card-body">
												<input class="form-control id-input" type="hidden" value="<?php echo $row->id; ?>">
												<input class="form-control notransaksi-input" type="hidden" value="<?php echo $row->notransaksi; ?>">
												<input class="form-control nama-input" type="hidden" value="<?php echo addslashes($row->nama_pasien); ?>">
												<input class="form-control no_rm-input" type="hidden" value="<?php echo $row->no_rm; ?>">
												<input class="form-control kode_dokter-input" type="hidden" value="<?php echo $row->kode_dokter; ?>">
												<input class="form-control status-input" type="hidden" value="<?php echo $row->status; ?>">
												
												<button class="btn <?php echo ($row->status == 1) ? 'btn-danger' : 'btn-primary'; ?> float-right" onclick="bukaFormPasienRanap('<?php echo $row->id; ?>', '<?php echo $row->notransaksi; ?>', '<?php echo addslashes($row->nama_pasien); ?>', '<?php echo $row->no_rm; ?>', '<?php echo $kodedokternya; ?>','<?php echo $row->status; ?>',3,1)">Buka</button>
												
												<h6 class="card-title"><?php echo $row->no_rm.' - '.addslashes($row->nama_pasien); ?></h6>
												<h7 class="card-title"><?php echo $row->tgl_masuk.' | '.$row->nama_unit.' | '.addslashes($row->nama_dokter).' | '.$row->golongan.' | No. Kartu : '.$row->no_askes.' | NIK : '.$row->nik; ?></h7>
											</div>
										</div>
									</div> 
							<?php
								}
							}	
							?>
						</div>
					</div>

						<div class="tab-pane fade <?php echo ($tabnav == 4) ? 'show active' : ''; ?>" id="navIGD" role="tabpanel" aria-labelledby="IGD">
							<div class="row col-md-12">
								<?php
									foreach ($dataPasienDokter_igd as $row) {
									?>
										<div class="col-md-9 mt-3">
											<div class="card border-danger custom-card" onmouseover="changeBackgroundColor(this, true)" onmouseout="changeBackgroundColor(this, false)" <?php if ($row->status == 1) echo 'style="background-color: #FDF5E6;"'; ?>>
												<div class="card-body">
													<input class="form-control id-input" type="hidden" value="<?php echo $row->id; ?>">
													<input class="form-control notransaksi-input" type="hidden" value="<?php echo $row->notransaksi; ?>">
													<input class="form-control nama-input" type="hidden" value="<?php echo addslashes($row->nama_pasien); ?>">
													<input class="form-control no_rm-input" type="hidden" value="<?php echo $row->no_rm; ?>">
													<input class="form-control kode_dokter-input" type="hidden" value="<?php echo $this->session->userdata("kodedokter"); ?>">

													<button class="btn btn-primary float-right" onclick="bukaFormPasienIgd('<?php echo $row->id; ?>', '<?php echo $row->notransaksi; ?>', '<?php echo addslashes($row->nama_pasien); ?>', '<?php echo $row->no_rm; ?>', '<?php echo $row->kode_dokter; ?>',1,1)"><?php echo 'Buka'; ?></button>
													<h6 class="card-title"><?php echo $row->no_rm.' - '.addslashes($row->nama_pasien); ?></h6>
													<h7 class="card-title"><?php echo $row->golongan.' | No. Kartu : '.$row->no_askes.' | NIK : '.$row->nik; ?></h7>
												</div>
											</div>
										</div>
									<?php
									}
								?>
							</div>
						</div>
					<div class="tab-pane fade <?php echo ($tabnav == 5) ? 'show active' : ''; ?>" id="navIGDObgyn" role="tabpanel" aria-labelledby="IGDObgyn">
						<div class="row col-md-12">
							<?php
							foreach ($dataPasienDokterObgyn as $row) {
							?>
								<div class="col-md-9 mt-3">
									<div class="card border-danger custom-card" onmouseover="changeBackgroundColor(this, true)" onmouseout="changeBackgroundColor(this, false)" <?php if ($row->status == 1) echo 'style="background-color: #FDF5E6;"'; ?>>
										<div class="card-body">
											<input class="form-control id-input" type="hidden" value="<?php echo $row->id; ?>">
											<input class="form-control notransaksi-input" type="hidden" value="<?php echo $row->notransaksi; ?>">
											<input class="form-control nama-input" type="hidden" value="<?php echo addslashes($row->nama_pasien); ?>">
											<input class="form-control no_rm-input" type="hidden" value="<?php echo $row->no_rm; ?>">
											<input class="form-control kode_dokter-input" type="hidden" value="<?php echo $this->session->userdata("kodedokter"); ?>">
											<button class="btn btn-primary float-right" onclick="bukaFormPasienIgd('<?php echo $row->id; ?>', '<?php echo $row->notransaksi; ?>', '<?php echo addslashes($row->nama_pasien); ?>', '<?php echo $row->no_rm; ?>', '<?php echo $row->kode_dokter; ?>',2,1)"><?php echo 'Buka'; ?></button>
											<h6 class="card-title"><?php echo $row->no_rm.' - '.addslashes($row->nama_pasien); ?></h6>
											<h7 class="card-title"><?php echo $row->golongan.' | No. Kartu : '.$row->no_askes.' | NIK : '.$row->nik; ?></h7>
										</div>
									</div>
								</div>
							<?php
							}
							?>
						</div>
					</div>
					<div class="tab-pane fade <?php echo ($tabnav == 6) ? 'show active' : ''; ?>" id="navRajalOld" role="tabpanel" aria-labelledby="rajalOld">
						<div class="col-md-12 mt-3">
							<label class="col-form-label"><span style="color: green;">Histori Pasien</span></label>
						</div>
						<div class="col-md-12 mt-3 form-inline">
                            <label for="nrp">No. RM</label>
							<input type="text" class="form-control ml-4" id="no_rm_histori" style="border: 1px solid;" maxlength="6">
							<button onclick="caridatahistori()" class="btn btn-primary ml-1" id="caridatahistori">Cari</button>
                        </div>
						<div class="col-md-9 mt-3">
							<div id="datahistory"></div>
						</div>
					</div>
					<div class="tab-pane fade <?php echo ($tabnav == 7) ? 'show active' : ''; ?>" id="navOperasi" role="tabpanel" aria-labelledby="operasi">
						<div class="col-md-12 mt-3 form-inline">
                            <label for="nrp">Tanggal</label>
							<input type="date" class="form-control ml-4" id="tgl_operasi" style="border: 1px solid;">
							<label class="form-control ml-4">No.RM</label>
							<input type="text" class="form-control ml-4" id="no_rm_operasi" style="border: 1px solid;" maxlength="6">
							<button onclick="caridataoperasi()" class="btn btn-primary ml-1" id="caridataoperasi">Cari</button>
                        </div>
						<div class="col-md-9 mt-3">
							<div id="datapasienoperasi"></div>
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
        card.style.backgroundColor = '#E9E7E7'; // Mengubah warna latar belakang saat kursor berada di atas card
        card.style.borderColor = "darkgray"; // Mengubah warna garis tepi saat kursor berada di atas card
    } else {
        card.style.backgroundColor ='#FFFFFF'; // Menghapus warna latar belakang saat kursor meninggalkan card
        card.style.borderColor = ""; // Menghapus warna garis tepi saat kursor meninggalkan card
    }
}
</script>

<script>


function bukaFormPasien(id, notransaksi, nama_pasien, no_rm, kode_dokter,angkatab,editing) {

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

	var angkatabInput = document.createElement('input');
    angkatabInput.type = 'hidden';
    angkatabInput.name = 'angkatab';
    angkatabInput.value = angkatab;
    form.appendChild(angkatabInput);

	var editingInput = document.createElement('input');
    editingInput.type = 'hidden';
    editingInput.name = 'editing';
    editingInput.value = editing;
    form.appendChild(editingInput);

    // Menambahkan form ke dalam dokumen dan mengirimkan
    document.body.appendChild(form);
    form.submit();
}

// ========= buka form pasien ranap ===============

function bukaFormPasienRanap(id, notransaksi, nama_pasien, no_rm, kode_dokter,status,angkatab,editing) {

var url= "<?php echo site_url(); ?>/rme/rme_form_pasien_ranap";
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

var statusInput = document.createElement('input');
statusInput.type = 'hidden';
statusInput.name = 'status';
statusInput.value = status;
form.appendChild(statusInput);

var angkatabInput = document.createElement('input');
angkatabInput.type = 'hidden';
angkatabInput.name = 'angkatab';
angkatabInput.value = angkatab;
form.appendChild(angkatabInput);

var editingInput = document.createElement('input');
editingInput.type = 'hidden';
editingInput.name = 'editing';
editingInput.value = editing;
form.appendChild(editingInput);

// Menambahkan form ke dalam dokumen dan mengirimkan
document.body.appendChild(form);
form.submit();
}


    function filterData() {
        var input, filter, cards, card, cardTitle, cardNoRM, cardNama;
        input = document.getElementById("cariInput");
        filter = input.value.toLowerCase();
        cards = document.getElementsByClassName("custom-cardOld");

        for (var i = 0; i < cards.length; i++) {
            card = cards[i];
            cardTitle = card.getElementsByClassName("card-title")[0];
            cardNoRM = card.getElementsByClassName("no_rm-input")[0].value.toLowerCase();
            cardNama = card.getElementsByClassName("nama-input")[0].value.toLowerCase();

            if (cardNoRM.includes(filter) || cardNama.includes(filter)) {
                card.style.display = "";
				card.style.margin = "5px"; // Atur margin ke 5px
            } else {
                card.style.display = "none";
				 card.style.margin = "5px"; // Atur margin kembali ke 0
            }
        }
    }

	document.getElementById("cariInputranap").addEventListener("input", function() {
    filterDataRanap(this.value.toLowerCase());
});

function filterDataRanap(keyword) {
    const cards = document.querySelectorAll('.custom-cardranap');

    cards.forEach(function(card) {
        const cardText = card.textContent.toLowerCase();
        if (cardText.includes(keyword)) {
            card.style.display = "block";
        } else {
            card.style.display = "none";
        }
    });
}

</script>

<script>
function bukaFormPasienIgd(id, notransaksi, nama_pasien, no_rm, kode_dokter,angkatab,editing) {
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

	var angkatabInput = document.createElement('input');
    angkatabInput.type = 'hidden';
    angkatabInput.name = 'angkatab';
    angkatabInput.value = angkatab;
    form.appendChild(angkatabInput);

	var editingInput = document.createElement('input');
    editingInput.type = 'hidden';
    editingInput.name = 'editing';
    editingInput.value = editing;
    form.appendChild(editingInput);

    // Menambahkan form ke dalam dokumen dan mengirimkan
    document.body.appendChild(form);
    form.submit();
}
</script>



<script type="text/javascript">

function caridatahistori() {
	var no_rm_histori = document.getElementById("no_rm_histori").value;
	$.ajax({
		url: "<?php echo site_url(); ?>/rme/cariDataHistori",
		type: "GET",
		data: {
			no_rm_histori: no_rm_histori
		},
		success: function (ajaxData) {
			// console.log(ajaxData);
			var dt = JSON.parse(ajaxData);
			console.log(dt);
			$("#datahistory").html(dt.dtview);
		},
		error: function () {
			$.notify("Gagal Memproses Data", "error");
		}
	});
}

function caridataoperasi() {
	var tgl_operasi = document.getElementById("tgl_operasi").value;
	var no_rm_operasi = document.getElementById("no_rm_operasi").value;
	console.log(tgl_operasi);
	$.ajax({
		url: "<?php echo site_url(); ?>/rme/cariDataPasienOperasi",
		type: "GET",
		data: {
			tgl_operasi: tgl_operasi,
			no_rm_operasi: no_rm_operasi
		},
		success: function (ajaxData) {
			console.log(ajaxData);
			var dt = JSON.parse(ajaxData);
			// console.log(dt);
			$("#datapasienoperasi").html(dt.dtview);
		},
		error: function () {
			$.notify("Gagal Memproses Data", "error");
		}
	});
}
</script>

<script>
    // Fungsi untuk menanggapi klik pada elemen navigasi
    function handleTabClick(tabId, backgroundColor, textColor) {
        // Mendapatkan elemen tab berdasarkan ID
        var tabElement = document.getElementById(tabId);

        // Mengubah warna latar belakang dan warna teks sesuai kondisi
        if (tabElement) {
            tabElement.style.backgroundColor = backgroundColor;
            tabElement.style.color = textColor;
        }
    }

    // Menanggapi peristiwa klik pada elemen-elemen navigasi
    document.getElementById('rawatJalanNow').addEventListener('click', function() {
        handleTabClick('rawatJalanNow', '#7A8407', 'white');
    });

    document.getElementById('rawatJalanNext').addEventListener('click', function() {
        handleTabClick('rawatJalanNext', '#780673', 'white');
    });

    document.getElementById('rawatInap').addEventListener('click', function() {
        handleTabClick('rawatInap', 'white', 'black');
    });

    document.getElementById('igd').addEventListener('click', function() {
        handleTabClick('igd', 'white', 'black');
    });

    document.getElementById('igdobgyn').addEventListener('click', function() {
        handleTabClick('igdobgyn', 'white', 'black');
    });

    document.getElementById('rajalOld').addEventListener('click', function() {
        handleTabClick('rajalOld', '#7A8407', 'white');
    });

    document.getElementById('operasi').addEventListener('click', function() {
        handleTabClick('operasi', '#780673', 'white');
    });
</script>
