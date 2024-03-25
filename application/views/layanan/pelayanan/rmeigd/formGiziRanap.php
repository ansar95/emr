
<link rel="stylesheet" href="../../assets/template_baru/dist/vendors/icheck/skins/all.css" >
<div class="card">
	<div class="col-12 mt-4 ml-3">
		<div class="w-sm-100 mr-auto"><h6 class="mb-0" style="color: navy;">FORM ASESMEN GIZI</h6></div>
	</div>

	<div class="col-12 mt-2 ml-3">
		<div class="form-group row col-spacing-row">
			<label class="col-md-2 col-form-label">Resiko Gizi berdasarkan validasi hasil skrining awal, kondisi pasien termasuk kategori</label>
			<div class="col-md-3">
				<select class="form-control" name="resikogizi" id="resikogizi" style="border: 1px solid #ccc;">
					<option value="1" <?php echo ($dtgiziranap->resikogizi == 1) ? "selected" : ""; ?>>Resiko Ringan (Nilai MST 0-1)</option>
					<option value="2" <?php echo ($dtgiziranap->resikogizi == 2) ? "selected" : ""; ?>>Resiko Sedang (Nilai MST 2-3)</option>
					<option value="3" <?php echo ($dtgiziranap->resikogizi == 3) ? "selected" : ""; ?>>Resiko Berat (Nilai MST 4-5)</option>
				</select>
			</div>
			<label class="col-md-2 col-form-label">Pasien Memiliki Kondisi Khusus</label>
			<div class="col-md-3">
				<select class="form-control" name="kondisikhusus" id="kondisikhusus" style="border: 1px solid #ccc;">
					<option value="1" <?php echo ($dtgiziranap->kondisikhusus == 1) ? "selected" : ""; ?>>Ya</option>
					<option value="2" <?php echo ($dtgiziranap->kondisikhusus == 2) ? "selected" : ""; ?>>Tidak</option>
				</select>
			</div>
		</div>
	</div>
	<div class="col-md-12 mt-3 ml-3">
		<h7 style="color: navy;">ASESMEN GIZI</h7>
	</div>
	<div class="col-md-12 ml-3">
		<h7 style="color: black;">Data Antropometri</h7>
	</div>
	<div class="col-12 ml-3">
		<div class="form-group row col-spacing-row">
			<div class="col-md-12 mt-3">
				<div class="form-check form-check-inline">
					<label class="col-form-label">Berat Badan </label>
					<input type="text" id="bb" name="bb" class="form-control ml-3" style="width: 120px; display: inline-block; border: 1px solid;" value="<?php echo $dtgiziranap->bb ?>">
					<label class="col-form-label ml-2" style="display: inline-block;">Kg </label>
				</div>
				<div class="form-check form-check-inline">
					<label class="col-form-label ml-5">Tinggi Badan </label>
					<input type="text" id="tb" name="tb" class="form-control ml-3" style="width: 120px; display: inline-block; border: 1px solid;" value="<?php echo $dtgiziranap->tb ?>">
					<label class="col-form-label ml-2" style="display: inline-block;">Cm </label>
				</div>
				<div class="form-check form-check-inline">
					<label class="col-form-label ml-5">IMT (BB/TB) </label>
					<input type="text" id="imt" name="imt" class="form-control ml-3" style="width: 120px; display: inline-block; border: 1px solid;" value="<?php echo $dtgiziranap->imt ?>">
					<label class="col-form-label ml-2" style="display: inline-block;">Kg/m2 </label>
				</div>
				<div class="form-check form-check-inline">
					<label class="col-form-label ml-5">Jenis Kelamin </label>
					<select id="gender" name="gender" class="form-control ml-3" style="width: 120px; display: inline-block; border: 1px solid;">
						<option value="1" <?php echo ($dtgiziranap->jk == 1) ? "selected" : ""; ?>>Pria</option>
						<option value="2" <?php echo ($dtgiziranap->jk == 2) ? "selected" : ""; ?>>Wanita</option>
					</select>
				</div>
				<div class="form-check form-check-inline">
					<label class="col-form-label ml-5">Berat Badan Ideal </label>
					<input type="text" id="bbi" name="bbi" class="form-control ml-3" style="width: 120px; display: inline-block; border: 1px solid;" value="<?php echo $dtgiziranap->bbi ?>">
					<label class="col-form-label ml-2" style="display: inline-block;">Kg</label>
				</div>

			</div>
		</div>

		<div class="form-group row col-spacing-row">
			<div class="col-md-12 mt-2">
				<div class="form-check form-check-inline">
					<label class="col-form-label">Umur </label>
					<input type="text" id="umur" name="umur" value="<?php echo $dtgiziranap->umur ?>" class="form-control ml-3" style="width: 120px; display: inline-block; border: 1px solid;">
					<label class="col-form-label ml-2" style="display: inline-block;">Tahun </label>
				</div>
				<div class="form-check form-check-inline">
					<label class="col-form-label ml-5">LILA </label>
					<input type="text" id="lila" name="lila" value="<?php echo $dtgiziranap->lila ?>" class="form-control ml-3" style="width: 120px; display: inline-block; border: 1px solid;">
					<label class="col-form-label ml-2" style="display: inline-block;">Cm,   % LILA </label>
					<input type="text" id="lilapersen" name="lilapersen" value="<?php echo $dtgiziranap->lilapersen ?>" class="form-control ml-3" style="width: 120px; display: inline-block; border: 1px solid;">
					<label class="col-form-label ml-2" style="display: inline-block;">%</label>
				</div>
				<div class="form-check form-check-inline">
					<label class="col-form-label ml-5">Penurunan Berat Badan </label>
					<input type="text" id="penurunanbb" name="penurunanbb" value="<?php echo $dtgiziranap->penurunanbb ?>" class="form-control ml-3" style="width: 220px; display: inline-block; border: 1px solid;">
				</div>
				<div class="form-check form-check-inline">
					<label class="col-form-label ml-5">Status Gizi </label>
					<input type="text" id="statusgizi" name="statusgizi" value="<?php echo $dtgiziranap->statusgizi ?>" class="form-control ml-3" style="width: 220px; display: inline-block; border: 1px solid;">
				</div>

			</div>
		</div>
		
	</div>

	<div class="col-12 mt-2">
		<label class="col-md-1 col-form-label">Data Biokimia</label>
	</div>
	<div class="col-12 ml-3">
		<div class="form-group row col-spacing-row">
			<div class="col-md-11">
				<textarea id="databiokimia" name="databiokimia" rows="2" style="width: 100%;"><?php echo $dtgiziranap->databiokimia ?></textarea>
			</div>
		</div>
	</div>

	<div class="col-12 mt-2">
		<label class="col-md-1 col-form-label">Data Fisik / Klinis</label>
	</div>
	<div class="col-12 ml-3">
		<div class="form-group row col-spacing-row">
			<div class="col-md-11">
				<textarea id="datafisik" name="datafisik" rows="2" style="width: 100%;"><?php echo $dtgiziranap->datafisik ?></textarea>
			</div>
		</div>
	</div>
	<div class="col-md-12 mt-3 ml-3">
		<h7 style="color: navy;">Riwayat Gizi</h7>
	</div>
	<div class="col-12 ml-3">
		<div class="form-group row col-spacing-row">
			<label class="col-md-4 col-form-label">Alergi Makanan</label>
			<label class="col-md-4 col-form-label">Kebiasaan Makanan</label>
			<label class="col-md-3 col-form-label">Riwayat Obat-obatan</label>
		</div>
	</div>
	<div class="col-12 ml-3">
		<div class="form-group row col-spacing-row">
			<div class="col-md-4">
				<textarea id="alergimakanan" name="alergimakanan" rows="2" style="width: 100%;"><?php echo $dtgiziranap->alergimakanan ?></textarea>
			</div>
			<div class="col-md-4">
				<textarea id="kebiasaanmakan" name="kebiasaanmakan" rows="2" style="width: 100%;"><?php echo $dtgiziranap->kebiasaanmakan ?></textarea>
			</div>
			<div class="col-md-3">
				<textarea id="riwayatobat" name="riwayatobat" rows="2" style="width: 100%;"><?php echo $dtgiziranap->riwayatobat?></textarea>
			</div>
		</div>
	</div>
	<div class="col-12 mt-2">
		<label class="col-md-6 col-form-label">Hasil Recall 24 Jam</label>
	</div>

	<div class="col-12 ml-3">
		<div class="form-group row col-spacing-row">
			<div class="col-md-12">
				<div class="form-check form-check-inline">
					<label class="col-form-label">Energi</label>
					<input type="text" id="ee" name="ee" value="<?php echo $dtgiziranap->ee?>" class="form-control ml-3" style="width: 120px; display: inline-block; border: 1px solid;">
					<label class="col-form-label ml-2" style="display: inline-block;">kkal/hari </label>
				</div>
				<div class="form-check form-check-inline">
					<label class="col-form-label ml-5">Protein </label>
					<input type="text" id="pp" name="pp" value="<?php echo $dtgiziranap->pp?>" class="form-control ml-3" style="width: 120px; display: inline-block; border: 1px solid;">
					<label class="col-form-label ml-2" style="display: inline-block;">gram/hari </label>
				</div>
				<div class="form-check form-check-inline">
					<label class="col-form-label ml-5">lemak </label>
					<input type="text" id="ll" name="ll" value="<?php echo $dtgiziranap->ll?>" class="form-control ml-3" style="width: 120px; display: inline-block; border: 1px solid;">
					<label class="col-form-label ml-2" style="display: inline-block;">gram/hari </label>
				</div>
				<div class="form-check form-check-inline">
					<label class="col-form-label ml-5">Karbohidrat </label>
					<input type="text" id="kh" name="kh" value="<?php echo $dtgiziranap->kh?>" class="form-control ml-3" style="width: 120px; display: inline-block; border: 1px solid;">
					<label class="col-form-label ml-2" style="display: inline-block;">gram/hari</label>
				</div>
			</div>
		</div>
	</div>

	<div class="col-md-12 mt-3 ml-3">
		<h7 style="color: navy;">Riwayat Personil</h7>
	</div>
	<div class="col-12 ml-3">
		<div class="form-group row col-spacing-row">
			<label class="col-md-6 col-form-label">Riwayat Keluarga</label>
			<label class="col-md-5 col-form-label">Riwayat Penyakit</label>
		</div>
	</div>
	<div class="col-12 ml-3">
		<div class="form-group row col-spacing-row">
			<div class="col-md-6">
				<textarea id="riwayatkeluarga" name="riwayatkeluarga" rows="2" style="width: 100%;"><?php echo $dtgiziranap->riwayatkeluarga?></textarea>
			</div>
			<div class="col-md-5">
				<textarea id="riwayatpenyakit" name="riwayatpenyakit" rows="2" style="width: 100%;"><?php echo $dtgiziranap->riwayatpenyakit?></textarea>
			</div>
		</div>
	</div>
	
	<div class="col-md-12 mt-3 ml-3">
		<h7 style="color: navy;">DIAGNOSA GIZI</h7>
	</div>
	<div class="col-12 ml-3">
		<div class="form-group row col-spacing-row">
			<div class="col-md-11">
				<textarea id="diagnosagizi" name="diagnosagizi" rows="3" style="width: 100%;"><?php echo $dtgiziranap->diagnosagizi?></textarea>
			</div>
		</div>
	</div>

	<div class="col-md-12 mt-3 ml-3">
		<h7 style="color: navy;">INTERVENSI GIZI</h7>
	</div>
	<div class="col-12 ml-3">
		<div class="form-group row col-spacing-row">
			<label class="col-md-2 col-form-label">Pemberian Makanan Via</label>
			<div class="col-md-9">
				<input type="text" id="pemberian" name="pemberian" value="<?php echo $dtgiziranap->pemberian?>" class="form-control" style=" border: 1px solid;">
			</div>
		</div>
		<div class="form-group row col-spacing-row">
			<label class="col-md-2 col-form-label">Konsistensi Makanan </label>
			<div class="col-md-9">
				<input type="text" id="konsistensi" name="konsistensi" value="<?php echo $dtgiziranap->konsistensi?>" class="form-control" style=" border: 1px solid;">
			</div>
		</div>
		<div class="form-group row col-spacing-row">
			<label class="col-md-2 col-form-label">Terapi Diet</label>
			<div class="col-md-9">
				<input type="text" id="terapi" name="terapi" value="<?php echo $dtgiziranap->terapi?>" class="form-control" style=" border: 1px solid;">
			</div>
		</div>
		<div class="form-group row col-spacing-row">
			<div class="col-md-12">
				<div class="form-check form-check-inline">
					<label class="col-form-label">Energi</label>
					<input type="text" id="energi" name="energi" value="<?php echo $dtgiziranap->energi?>" class="form-control ml-3" style="width: 120px; display: inline-block; border: 1px solid;">
					<label class="col-form-label ml-2" style="display: inline-block;">kkal/hari </label>
				</div>
				<div class="form-check form-check-inline">
					<label class="col-form-label ml-5">Protein </label>
					<input type="text" id="protein" name="protein" value="<?php echo $dtgiziranap->protein?> "class="form-control ml-3" style="width: 120px; display: inline-block; border: 1px solid;">
					<label class="col-form-label ml-2" style="display: inline-block;">gram/hari </label>
				</div>
				<div class="form-check form-check-inline">
					<label class="col-form-label ml-5">lemak </label>
					<input type="text" id="lemak" name="lemak" value="<?php echo $dtgiziranap->lemak?>" class="form-control ml-3" style="width: 120px; display: inline-block; border: 1px solid;">
					<label class="col-form-label ml-2" style="display: inline-block;">gram/hari </label>
				</div>
				<div class="form-check form-check-inline">
					<label class="col-form-label ml-5">Karbohidrat </label>
					<input type="text" id="karbo" name="karbo" value="<?php echo $dtgiziranap->karbo?>" class="form-control ml-3" style="width: 120px; display: inline-block; border: 1px solid;">
					<label class="col-form-label ml-2" style="display: inline-block;">gram/hari</label>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 ml-3">
		<div class="form-group row col-spacing-row">
			<label class="col-md-6 col-form-label">Edukasi : Konseling/Penyuluhan Gizi</label>
		</div>
	</div>
	<div class="col-12 ml-3">
		<div class="form-group row col-spacing-row">
			<div class="col-md-11">
				<textarea id="konseling" name="konseling" rows="2" style="width: 100%;"><?php echo $dtgiziranap->konseling?></textarea>
			</div>
		</div>
	</div>
	<div class="col-md-12 mt-3 ml-3">
		<h7 style="color: navy;">MONITORING DAN EVALUASI</h7>
	</div>
	<div class="col-12 ml-3">
		<div class="form-group row col-spacing-row">
			<div class="col-md-11">
				<textarea id="evaluasi" name="evaluasi" rows="2" style="width: 100%;"><?php echo $dtgiziranap->evaluasi?></textarea>
			</div>
		</div>
	</div>
	<div class="col-12 mt-3 ml-3">
		<div class="form-group row col-spacing-row">
			<div class="col-10 text-left">
				<button onclick="savegizi()" id="tombolsavedateresiko" class="btn btn-success" data-bs-dismiss="modal">Simpan Data</button>
			</div>
		</div>
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


		function savegizi() {
			var no_rm = document.getElementById("no_rm").value;
			var notransaksi = document.getElementById("notransaksi").value;

			var resikogizi = document.getElementById("resikogizi").value;
			var kondisikhusus = document.getElementById("kondisikhusus").value;

			var bb = document.getElementById("bb").value;
			var tb = document.getElementById("tb").value;
			var imt = document.getElementById("imt").value;
			var jk = document.getElementById("gender").value;
			var bbi = document.getElementById("bbi").value;
			var umur = document.getElementById("umur").value;
			var lila = document.getElementById("lila").value;
			var lilapersen = document.getElementById("lilapersen").value;
			var penurunanbb = document.getElementById("penurunanbb").value;
			var statusgizi = document.getElementById("statusgizi").value;
			var databiokimia = document.getElementById("databiokimia").value;
			var datafisik = document.getElementById("datafisik").value;
			var alergimakanan = document.getElementById("alergimakanan").value;
			var riwayatobat = document.getElementById("riwayatobat").value;
			var kebiasaanmakan = document.getElementById("kebiasaanmakan").value;
			var ee = document.getElementById("ee").value;
			var pp = document.getElementById("pp").value;
			var ll = document.getElementById("ll").value;
			var kh = document.getElementById("kh").value;
			var riwayatkeluarga = document.getElementById("riwayatkeluarga").value;
			var riwayatpenyakit = document.getElementById("riwayatpenyakit").value;
			var diagnosagizi = document.getElementById("diagnosagizi").value;
			var pemberian = document.getElementById("pemberian").value;
			var konsistensi = document.getElementById("konsistensi").value;
			var terapi = document.getElementById("terapi").value;
			var energi = document.getElementById("energi").value;
			var protein = document.getElementById("protein").value;
			var lemak = document.getElementById("lemak").value;
			var karbo = document.getElementById("karbo").value;
			var konseling = document.getElementById("konseling").value;
			var evaluasi = document.getElementById("evaluasi").value;

			$.ajax({
				url: "<?php echo site_url(); ?>/rme/savegisiranap",
				type: "GET",
				data: {
					no_rm : no_rm,
					notransaksi : notransaksi,
					resikogizi : resikogizi, 
					kondisikhusus : kondisikhusus,
					bb : bb,
					tb : tb,
					imt : imt,
					jk : jk,
					bbi : bbi,
					umur : umur,
					lila : lila,
					lilapersen : lilapersen,
					penurunanbb : penurunanbb,
					statusgizi : statusgizi,
					databiokimia : databiokimia,
					datafisik : datafisik,
					alergimakanan : alergimakanan,
					riwayatobat : riwayatobat,
					kebiasaanmakan : kebiasaanmakan,
					ee : ee,
					pp : pp,
					ll : ll,
					kh : kh,
					riwayatkeluarga : riwayatkeluarga,
					riwayatpenyakit : riwayatpenyakit,
					diagnosagizi : diagnosagizi,
					pemberian : pemberian,
					konsistensi : konsistensi,
					terapi : terapi,
					energi : energi,
					protein : protein,
					lemak : lemak,
					karbo : karbo,
					konseling : konseling,
					evaluasi : evaluasi
				},
				success: function(ajaxData) {
					swal('Simpan Data Berhasil');
					},
				error: function(ajaxData) {
					swal('Simpan Data Gagal');
				}
			});
		}

</script>

<!-- <script>
    document.getElementById('bb').addEventListener('input', calculateIMT);
    document.getElementById('tb').addEventListener('input', calculateIMT);

    function calculateIMT() {
        var berat = parseFloat(document.getElementById('bb').value);
        var tinggi = parseFloat(document.getElementById('tb').value/100);

        if (!isNaN(berat) && !isNaN(tinggi) && tinggi !== 0) {
            var imt = berat / (tinggi * tinggi);
            document.getElementById('imt').value = imt.toFixed(2);
        } else {
            document.getElementById('imt').value = "";
        }
    }
</script> -->

<!-- <script>
	//cara hitung broca
    document.getElementById('bb').addEventListener('input', calculateBBi);
    document.getElementById('tb').addEventListener('input', calculateBBi);
    // document.getElementById('gender').addEventListener('change', calculateBBi);

    function calculateBBi() {
        var berat = parseFloat(document.getElementById('bb').value);
        var tinggi = parseFloat(document.getElementById('tb').value);
        var gender = document.getElementById('gender').value;
        var faktorKoreksi = (gender === 'pria') ? 0 : 0.9;

        if (!isNaN(berat) && !isNaN(tinggi)) {
            var bbi = (tinggi - 100) * faktorKoreksi;

            // Jika berat dan tinggi valid, isi input 'bbi' dengan hasil perhitungan
            document.getElementById('bbi').value = bbi.toFixed(2);
        } else {
            // Jika salah satu atau kedua input tidak valid, kosongkan input 'bbi'
            document.getElementById('bbi').value = "";
        }
    }
</script> -->
<!-- 
<script>
	//cara hitung bmi
    document.getElementById('bb').addEventListener('input', calculateBBi);
    document.getElementById('tb').addEventListener('input', calculateBBi);
    document.getElementById('gender').addEventListener('change', calculateBBi);

    function calculateBBi() {
        var berat = parseFloat(document.getElementById('bb').value);
        var tinggi = parseFloat(document.getElementById('tb').value) / 100; // Konversi tinggi ke meter
        var gender = document.getElementById('gender').value;
        var faktorKoreksi = (gender === 'pria') ? 0 : 0.9;

        if (!isNaN(berat) && !isNaN(tinggi)) {
            var bmi = berat / (tinggi * tinggi);
            var bbi = bmi * (tinggi * tinggi) * faktorKoreksi;

            // Jika berat dan tinggi valid, isi input 'bbi' dengan hasil perhitungan
            document.getElementById('bbi').value = bbi.toFixed(2);
        } else {
            // Jika salah satu atau kedua input tidak valid, kosongkan input 'bbi'
            document.getElementById('bbi').value = "";
        }
    }
</script> -->
