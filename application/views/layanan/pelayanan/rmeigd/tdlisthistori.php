<?php
// echo $dtnama_pasien;
// echo $dtnik;
foreach ($dthistoripasien as $row) {
	?>
	<div class="col-md-12 mt-2">
		<div class="card border-secondary">
			<div class="card-body">
				<input class="form-control id-input" type="hidden" value="<?php echo $row->id; ?>">
				<input class="form-control notransaksi-input" type="hidden" value="<?php echo $row->notransaksi; ?>">
				<input class="form-control nama-input" type="hidden" value="<?php echo $row->nama_pasien; ?>">
				<input class="form-control no_rm-input" type="hidden" value="<?php echo $row->no_rm; ?>">
				<input class="form-control kode_dokter-input" type="hidden" value="<?php echo $row->kode_dokter; ?>">

				<?php 
					$xkode_unit=$row->kode_unit;
					$qry24 = $this->db->query("SELECT kelompok_unit from munit WHERE kode_unit = '".$xkode_unit."' LIMIT 1");
					$qry24row = $qry24->row();
                    $jumlahRecord = $qry24->num_rows();
                    if ($jumlahRecord > 0) {
					    $kelompok_unit = $qry24row->kelompok_unit;
                    } else {
					    $kelompok_unit = '';
                    }    
				?>

                <?php if ($kelompok_unit  == '') { ?>
				<?php } ?>

				<?php if ($kelompok_unit  =='POLI') { ?>
					<button class="btn btn-primary float-right" onclick="bukaFormPasien('<?php echo $row->id; ?>', '<?php echo $row->notransaksi; ?>', '<?php echo addslashes($row->nama_pasien); ?>', '<?php echo $row->no_rm; ?>', '<?php echo $row->kode_dokter; ?>',6,0)"><?php echo 'Poli'; ?></button>
				<?php } ?>

				<?php if ($kelompok_unit  == 'RUANGAN') { ?>
					<!-- bukaFormPasienRanap(id, notransaksi, nama_pasien, no_rm, kode_dokter,status,angkatab,editing) -->
					<button class="btn btn-primary float-right" onclick="bukaFormPasienRanap('<?php echo $row->id; ?>', '<?php echo $row->notransaksi; ?>', '<?php echo addslashes($row->nama_pasien); ?>', '<?php echo $row->no_rm; ?>', '<?php echo $row->kode_dokter; ?>',6,0)"><?php echo 'Perawatan'; ?></button>
				<?php } ?>

				<?php if ($kelompok_unit  == 'IGD') { ?>
					<button class="btn btn-primary float-right" onclick="bukaFormPasienIgd('<?php echo $row->id; ?>', '<?php echo $row->notransaksi; ?>', '<?php echo addslashes($row->nama_pasien); ?>', '<?php echo $row->no_rm; ?>', '<?php echo $row->kode_dokter; ?>',6,0)"><?php echo 'IGD'; ?></button>
				<?php } ?>

				<h6 class="card-title"><?php echo $kelompok_unit.' | '.$row->nama_unit.' | '.$row->golongan.' | Tanggal Kunjungan : '.$row->tgl_masuk ?></h6>
				<h7 class="card-title"><?php echo $row->no_rm.' - '.$row->nama_pasien.' - NIK : '.$row->nik;; ?></h7>
			</div>
		</div>
	</div>
<?php
	}
?>	

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
