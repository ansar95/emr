<link rel="stylesheet" href="../../assets/template_baru/dist/vendors/icheck/skins/all.css">
<div class="card">
	<div class="col-12 mt-4">
		<div class="w-sm-100 mr-auto"><h6 class="mb-0" style="color: red;">INSTRUKSI PASCA OPERASI</h6></div>
	</div>
	<div class="col-md-12">
		<div class="form-group row col-spacing-row mt-4">
			<label class="col-md-1 col-form-label">Tanggal</label>
			<div class="col-md-2">
				<input type="date" id="tglpengisian" name="tglpengisian" class="form-control border-secondary" value="<?php echo $dtinstrusipasca->tglpengisian; ?>">
			</div>
			<label class="col-md-1 col-form-label">Jam</label>
			<div class="col-md-2">
				<input type="time" id="jampengisian" name="jampengisian" class="form-control" value="<?php echo $dtinstrusipasca->jampengisian; ?>">
			</div>
		</div> 
		<div class="form-group row col-spacing-row mt-2">
			<label class="col-md-1 col-form-label">Diag. Post Operasi</label>
			<div class="col-md-9">
				<input type="text" id="diagnosapost" name="diagnosapost" class="form-control border-secondary" value="<?php echo $dtinstrusipasca->diagnosapost; ?>">
			</div>
		</div> 
		<div class="form-group row col-spacing-row mt-2">
			<label class="col-md-1 col-form-label">Rawat Pada</label>
			<div class="col-md-9">
				<label><input type="radio" class="state iradio_square-red" id="rawatdi1" name="rawatdi" value="1" <?php if ($dtinstrusipasca->rawatdi == 1) {echo "checked";} ?>> Perawatan Biasa</label>
				<label><input type="radio" class="state iradio_square-red ml-3" id="rawatdi2" name="rawatdi" value="2" <?php if ($dtinstrusipasca->rawatdi == 2) {echo "checked";} ?>> RR</label>
				<label><input type="radio" class="state iradio_square-red ml-3" id="rawatdi3" name="rawatdi" value="3" <?php if ($dtinstrusipasca->rawatdi == 3) {echo "checked";} ?>> ICU</label>
			</div>
		</div> 
		<div class="form-group row col-spacing-row mt-2">
			<label class="col-md-2 col-form-label">Pemantauan Tanda - tanda Vital</label>
			<label class="col-md-1 col-form-label">Kesadaran, setiap</label>
			<div class="col-md-2">
				<input type="text" id="kesadaran" name="kesadaran" class="form-control border-secondary" value="<?php echo $dtinstrusipasca->kesadaran; ?>">
			</div>
			<label class="col-md-1 col-form-label">menit/jam selama</label>
			<div class="col-md-2">
				<input type="text" id="kesadaranselama" name="kesadaranselama" class="form-control border-secondary" value="<?php echo $dtinstrusipasca->kesadaranselama; ?>">
			</div>
			<label class="col-md-1 col-form-label">Jam/Hari</label>
		</div> 
		<div class="form-group row col-spacing-row mt-2">
			<label class="col-md-2 col-form-label"></label>
			<label class="col-md-1 col-form-label">Tek. Darah, setiap</label>
			<div class="col-md-2">
				<input type="text" id="tekanan" name="tekanan" class="form-control border-secondary" value="<?php echo $dtinstrusipasca->tekanan; ?>">
			</div>
			<label class="col-md-1 col-form-label">menit/jam selama</label>
			<div class="col-md-2">
				<input type="text" id="tekananselama" name="tekananselama" class="form-control border-secondary" value="<?php echo $dtinstrusipasca->tekananselama; ?>">
			</div>
			<label class="col-md-1 col-form-label">Jam/Hari</label>
		</div> 
		<div class="form-group row col-spacing-row mt-2">
			<label class="col-md-2 col-form-label"></label>
			<label class="col-md-1 col-form-label">Nadi, setiap</label>
			<div class="col-md-2">
				<input type="text" id="nadi" name="nadi" class="form-control border-secondary" value="<?php echo $dtinstrusipasca->nadi; ?>">
			</div>
			<label class="col-md-1 col-form-label">menit/jam selama</label>
			<div class="col-md-2">
				<input type="text" id="nadiselama" name="nadiselama" class="form-control border-secondary" value="<?php echo $dtinstrusipasca->nadiselama; ?>">
			</div>
			<label class="col-md-1 col-form-label">Jam/Hari</label>
		</div> 
		<div class="form-group row col-spacing-row mt-2">
			<label class="col-md-2 col-form-label"></label>
			<label class="col-md-1 col-form-label">Pernapasan, setiap</label>
			<div class="col-md-2">
				<input type="text" id="pernapasan" name="pernapasan" class="form-control border-secondary" value="<?php echo $dtinstrusipasca->pernapasan; ?>">
			</div>
			<label class="col-md-1 col-form-label">menit/jam selama</label>
			<div class="col-md-2">
				<input type="text" id="pernapasanselama" name="pernapasanselama" class="form-control border-secondary" value="<?php echo $dtinstrusipasca->pernapasanselama; ?>">
			</div>
			<label class="col-md-1 col-form-label">Jam/Hari</label>
		</div> 
		<div class="form-group row col-spacing-row mt-2">
			<label class="col-md-2 col-form-label"></label>
			<label class="col-md-1 col-form-label">Suhu, setiap</label>
			<div class="col-md-2">
				<input type="text" id="suhu" name="suhu" class="form-control border-secondary" value="<?php echo $dtinstrusipasca->suhu; ?>">
			</div>
			<label class="col-md-1 col-form-label">menit/jam selama</label>
			<div class="col-md-2">
				<input type="text" id="suhuselama" name="suhuselama" class="form-control border-secondary" value="<?php echo $dtinstrusipasca->suhuselama; ?>">
			</div>
			<label class="col-md-1 col-form-label">Jam/Hari</label>
		</div> 
		<div class="form-group row col-spacing-row mt-2">
			<label class="col-md-2 col-form-label"></label>
			<label class="col-md-1 col-form-label">Pendarahan, setiap</label>
			<div class="col-md-2">
				<input type="text" id="darah" name="darah" class="form-control border-secondary" value="<?php echo $dtinstrusipasca->darah; ?>">
			</div>
			<label class="col-md-1 col-form-label">menit/jam selama</label>
			<div class="col-md-2">
				<input type="text" id="darahselama" name="darahselama" class="form-control border-secondary" value="<?php echo $dtinstrusipasca->darahselama; ?>">
			</div>
			<label class="col-md-1 col-form-label">Jam/Hari</label>
		</div> 
		<div class="form-group row col-spacing-row mt-2">
			<label class="col-md-1 col-form-label">Posisi</label>
			<div class="col-md-3">
				<label><input type="radio" class="state iradio_square-red" id="posisi1" name="posisi" value="1" <?php if ($dtinstrusipasca->posisi == 1) {echo "checked";} ?>> Terlentang</label>
				<label><input type="radio" class="state iradio_square-red ml-3" id="posisi2" name="posisi" value="2" <?php if ($dtinstrusipasca->posisi == 2) {echo "checked";} ?>> Head Up</label>
				<label><input type="radio" class="state iradio_square-red ml-3" id="posisi3" name="posisi" value="3" <?php if ($dtinstrusipasca->posisi == 3) {echo "checked";} ?>> Miring</label>
				<label><input type="radio" class="state iradio_square-red ml-3" id="posisi4" name="posisi" value="4" <?php if ($dtinstrusipasca->posisi == 4) {echo "checked";} ?>> Posisi Lain</label>
			</div>
			<div class="col-md-2">
				<input type="text" id="posisilain" name="posisilain" class="form-control border-secondary" value="<?php echo $dtinstrusipasca->posisilain; ?>" disabled>
			</div>
		</div> 
		<div class="form-group row col-spacing-row mt-2">
			<label class="col-md-1 col-form-label">Infus</label>
			<div class="col-md-2">
				<label><input type="radio" class="state iradio_square-red" id="infus1" name="infus" value="1" <?php if ($dtinstrusipasca->infus == 1) {echo "checked";} ?>> Sesuai dokter Anastesi</label>
				<label><input type="radio" class="state iradio_square-red ml-3" id="infus2" name="infus" value="2" <?php if ($dtinstrusipasca->infus == 2) {echo "checked";} ?>> Cairan</label>
			</div>
			<div class="col-md-3">
				<input type="text" id="cairan" name="cairan" class="form-control border-secondary" value="<?php echo $dtinstrusipasca->cairan; ?>" disabled>
			</div>
		</div> 
		<div class="form-group row col-spacing-row mt-2">
			<label class="col-md-1 col-form-label">Minum / Makan</label>
			<label class="col-md-1 col-form-label">Puasa Sampai</label>
			<div class="col-md-4">
				<input type="text" id="puasa" name="puasa" class="form-control border-secondary" value="<?php echo $dtinstrusipasca->puasa; ?>">
			</div>
		</div> 
		<div class="form-group row col-spacing-row mt-2">
			<label class="col-md-1 col-form-label"></label>
			<label class="col-md-1 col-form-label">Boleh minum bila</label>
			<div class="col-md-4">
				<input type="text" id="minum" name="minum" class="form-control border-secondary" value="<?php echo $dtinstrusipasca->minum; ?>">
			</div>
		</div> 
		<div class="form-group row col-spacing-row mt-2">
			<label class="col-md-1 col-form-label"></label>
			<label class="col-md-1 col-form-label">Boleh makan bila</label>
			<div class="col-md-4">
				<input type="text" id="makan" name="makan" class="form-control border-secondary" value="<?php echo $dtinstrusipasca->makan; ?>">
			</div>
		</div> 
		<div class="form-group row col-spacing-row mt-2">
			<label class="col-md-1 col-form-label">Analgetika</label>
			<div class="col-md-9">
				<textarea class="form-control border-secondary" id="analgetika" name="analgetika" rows="3"><?php echo $dtinstrusipasca->analgetika?></textarea>
			</div>
		</div> 
		<div class="form-group row col-spacing-row mt-2">
			<label class="col-md-1 col-form-label">Antibiotika</label>
			<div class="col-md-9">
				<textarea class="form-control border-secondary" id="antibiotika" name="antibiotika" rows="3"><?php echo $dtinstrusipasca->antibiotika?></textarea>
			</div>
		</div> 
		<div class="form-group row col-spacing-row mt-2">
			<label class="col-md-1 col-form-label">Bila mual/muntah</label>
			<div class="col-md-9">
				<textarea class="form-control border-secondary" id="mual" name="mual" rows="3"><?php echo $dtinstrusipasca->mual?></textarea>
			</div>
		</div> 
		<div class="form-group row col-spacing-row mt-2">
			<label class="col-md-1 col-form-label">Obat - obat lain</label>
			<div class="col-md-9">
				<textarea class="form-control border-secondary" id="obat" name="obat" rows="3"><?php echo $dtinstrusipasca->obat?></textarea>
			</div>
		</div> 
		<div class="form-group row col-spacing-row mt-2">
			<label class="col-md-1 col-form-label">Instruksi Lainnya</label>
			<div class="col-md-9">
				<textarea class="form-control border-secondary" id="instruksilain" name="instruksilain" rows="3"><?php echo $dtinstrusipasca->instruksilain?></textarea>
			</div>
		</div> 
	</div> 
	
	<div class="col-md-12 text-left mt-4">
		<button onclick="saveinstruksipasca()" class="btn btn-primary" data-bs-dismiss="modal">Simpan</button>
	</div>
		<br>
		<br>
</div>

<script>
	
function kuranglengkap() {
	$.notify("Data Kurang Lengkap", "error");
}


function saveinstruksipasca() {
		var no_rm = document.getElementById("no_rm").value;
		var notransaksi = document.getElementById("notransaksi").value;
		var notransaksi_IN = document.getElementById("notransaksi_IN").value;
		  
		var tglpengisian = document.getElementById("tglpengisian").value;
		var jampengisian = document.getElementById("jampengisian").value;
		var diagnosapost = document.getElementById("diagnosapost").value;
		var rawatdi = $("input[name='rawatdi']:checked").val();

		var kesadaran = document.getElementById("kesadaran").value;
		var kesadaranselama = document.getElementById("kesadaranselama").value;
		var tekanan = document.getElementById("tekanan").value;
		var tekananselama = document.getElementById("tekananselama").value;

		var nadi = document.getElementById("nadi").value;
		var nadiselama = document.getElementById("nadiselama").value;

		var pernapasan = document.getElementById("pernapasan").value;
		var pernapasanselama = document.getElementById("pernapasanselama").value;

		var suhu = document.getElementById("suhu").value;
		var suhuselama = document.getElementById("suhuselama").value;

		var darah = document.getElementById("darah").value;
		var darahselama = document.getElementById("darahselama").value;

		var posisi = $("input[name='posisi']:checked").val();
		var posisilain = document.getElementById("posisilain").value;

		var infus = $("input[name='infus']:checked").val();

		var cairan = document.getElementById("cairan").value;

		var puasa = document.getElementById("puasa").value;
		var minum = document.getElementById("minum").value;
		var makan = document.getElementById("makan").value;

		var analgetika = document.getElementById("analgetika").value;
		var antibiotika = document.getElementById("antibiotika").value;
		var mual = document.getElementById("mual").value;
		var obat = document.getElementById("obat").value;
		var instruksilain = document.getElementById("instruksilain").value;

		$.ajax({
			url: "<?php echo site_url(); ?>/rme/savepascaoperasi",
			type: "GET",
			data: {
				no_rm: no_rm,
				notransaksi: notransaksi,
				notransaksi_IN: notransaksi_IN,
				tglpengisian: tglpengisian,
				jampengisian: jampengisian,
				diagnosapost: diagnosapost,
				rawatdi: rawatdi,
				kesadaran: kesadaran,
				kesadaranselama: kesadaranselama,
				tekanan: tekanan,
				tekananselama: tekananselama,
				nadi: nadi,
				nadiselama: nadiselama,
				pernapasan: pernapasan,
				pernapasanselama: pernapasanselama,
				suhu: suhu,
				suhuselama: suhuselama,
				darah: darah,
				darahselama: darahselama,
				posisi: posisi,
				posisilain: posisilain,
				infus: infus,
				cairan: cairan,
				puasa: puasa,
				minum: minum,
				makan: makan,
				analgetika: analgetika,
				antibiotika: antibiotika,
				mual: mual,
				obat: obat,
				instruksilain: instruksilain
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

<script>
    // Mengambil elemen radio dengan ID posisi1 sampai posisi4
    var posisi1 = document.getElementById("posisi1");
    var posisi2 = document.getElementById("posisi2");
    var posisi3 = document.getElementById("posisi3");
    var posisi4 = document.getElementById("posisi4");

    // Mengambil elemen input teks dengan ID posisilain
    var posisiLainText = document.getElementById("posisilain");

    // Menambahkan event listener untuk setiap radio button
    posisi1.addEventListener("change", updateInputStatus);
    posisi2.addEventListener("change", updateInputStatus);
    posisi3.addEventListener("change", updateInputStatus);
    posisi4.addEventListener("change", updateInputStatus);

    // Fungsi untuk memperbarui status input teks berdasarkan radio button yang dipilih
    function updateInputStatus() {
        if (posisi1.checked || posisi2.checked || posisi3.checked) {
            posisiLainText.disabled = true;
			posisiLainText.value = '';
        } else if (posisi4.checked) {
            posisiLainText.disabled = false;
        }
    }

    // Memanggil fungsi updateInputStatus saat halaman dimuat ulang
    updateInputStatus();
</script>

<script>
    var infus1 = document.getElementById("infus1");
    var infus2 = document.getElementById("infus2");
    var cairanText = document.getElementById("cairan");

    infus1.addEventListener("change", updateInputStatus);
    infus2.addEventListener("change", updateInputStatus);

    function updateInputStatus() {
        if (infus1.checked) {
            cairanText.disabled = true;
            cairanText.value = ''; // Mengosongkan nilai input teks saat dinonaktifkan
        } else if (infus2.checked) {
            cairanText.disabled = false;
        }
    }

    updateInputStatus();
</script>