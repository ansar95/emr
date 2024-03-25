
<link rel="stylesheet" href="../../assets/template_baru/dist/vendors/icheck/skins/all.css" >
<div class="card">
	<div class="col-12 mt-5">
		<div class="w-sm-100 mr-auto"><h6 class="mb-0" style="color: navy;">CHECK LIST RENCANA PEMULANAN PASIEN</h6></div>
	</div>
	<div class="col-md-12 mt-4">
		<div class="form-check form-check-inline">
			<label class="col-form-label">Tanggal mulai di rawat </label>
			<input type="text" id="keluarga" name="keluarga" class="form-control ml-3" style="width: 200px; border: 1px solid;" disabled>
		</div>
	</div>
	<div class="col-md-12 mt-3">
		<div class="form-check form-check-inline">
			<label> Perkiraan Lama rawat</label>
			<label><input type="radio" class="state iradio_square-red ml-3" id="lamarawat1" name="lamarawat" value="1" <?php if ($dtpulang->lamarawat == 1) {echo "checked";} ?>> < 7 Hari</label>
			<label><input type="radio" class="state iradio_square-red ml-3" id="lamarawat2" name="lamarawat" value="2" <?php if ($dtpulang->lamarawat == 2) {echo "checked";} ?>> > 7 Hari</label>	
		</div>
	</div>
	<div class="col-md-12 mt-3">
		<div class="form-check form-check-inline">
			<label class="col-form-label">Nama Keluarga yang dapat dihubungi </label>
			<input type="text" id="keluarga" name="keluarga" class="form-control ml-3" style="width: 200px; border: 1px solid;" value="<?php echo $dtpulang->keluarga ?>">
			<label class="col-form-label ml-3">Hubungan dengan keluarga</label>
			<input type="text" id="hubungan" name="hubungan" class="form-control ml-3" style="width:200px; border: 1px solid;" value="<?php echo $dtpulang->hubungan ?>">
			<label class="col-form-label ml-3">No. Telp</label>
			<input type="text" id="notelp" name="notelp" class="form-control ml-3" style="width:200px; border: 1px solid;" value="<?php echo $dtpulang->notelp ?>">
		</div>
	</div>
	<div class="col-md-12 mt-3">
		<div class="form-check form-check-inline">
			<label> Kemampuan Komunikasi</label>
			<label><input type="radio" class="state iradio_square-red ml-3" id="komunikasi1" name="komunikasi" value="1" <?php if ($dtpulang->komunikasi == 1) {echo "checked";} ?>> Jelas</label>
			<label><input type="radio" class="state iradio_square-red ml-3" id="komunikasi2" name="komunikasi" value="2" <?php if ($dtpulang->komunikasi == 2) {echo "checked";} ?>> Kurang Jelas</label>	
			<label><input type="radio" class="state iradio_square-red ml-3" id="komunikasi3" name="komunikasi" value="3" <?php if ($dtpulang->komunikasi == 3) {echo "checked";} ?>> Tidak Jelas</label>
			<label><input type="radio" class="state iradio_square-red ml-3" id="komunikasi4" name="komunikasi" value="4" <?php if ($dtpulang->komunikasi == 4) {echo "checked";} ?>> Isyarat</label>	
		</div>
	</div>
	<div class="col-md-12 mt-3">
		<div class="form-check form-check-inline">
			<label> Aktifitas Sehari-hari</label>
			<label><input type="radio" class="state iradio_square-red ml-3" id="aktifitas1" name="aktifitas" value="1" <?php if ($dtpulang->aktifitas == 1) {echo "checked";} ?>> Mandiri</label>
			<label><input type="radio" class="state iradio_square-red ml-3" id="aktifitas2" name="aktifitas" value="2" <?php if ($dtpulang->aktifitas == 2) {echo "checked";} ?>> Perlu bantuan minimal bantuan sedang / bantuan penuh</label>	
		</div>
	</div>
	<div class="col-md-12 mt-3">
		<div class="form-check form-check-inline">
			<label> Pencegahan resiko jatuh</label>
			<label><input type="radio" class="state iradio_square-red ml-3" id="jatuh1" name="jatuh" value="1" <?php if ($dtpulang->jatuh == 1) {echo "checked";} ?>> Tidak Perlu</label>
			<label><input type="radio" class="state iradio_square-red ml-3" id="jatuh2" name="jatuh" value="2" <?php if ($dtpulang->jatuh == 2) {echo "checked";} ?>> Perlu</label>	
		</div>
	</div>
	<div class="col-md-12 mt-3">
		<div class="form-check form-check-inline">
			<label> Alat bantu Gerak</label>
			<label><input type="radio" class="state iradio_square-red ml-3" id="alatgerak1" name="alatgerak" value="1" <?php if ($dtpulang->alatgerak == 1) {echo "checked";} ?>> Tidak Perlu</label>
			<label><input type="radio" class="state iradio_square-red ml-3" id="alatgerak2" name="alatgerak" value="2" <?php if ($dtpulang->alatgerak == 2) {echo "checked";} ?>> Perlu</label>	
		</div>
	</div>
	<div class="col-md-12 mt-3">
		<div class="form-check form-check-inline">
			<label> Alat kesehatan yang di perlukan</label>
			<label><input type="radio" class="state iradio_square-red ml-3" id="alatkesehatan1" name="alatkesehatan" value="1" <?php if ($dtpulang->alatkesehatan == 1) {echo "checked";} ?>> Tidak Perlu</label>
			<label><input type="radio" class="state iradio_square-red ml-3" id="alatkesehatan2" name="alatkesehatan" value="2" <?php if ($dtpulang->alatkesehatan == 2) {echo "checked";} ?>> Perlu : Oksigen / nebulizer / lainnya </label>	
			<input type="text" id="alattext" name="alattext" class="form-control ml-3" style="width: 200px; border: 1px solid;" value="<?php echo $dtpulang->alattext ?>">
		</div>
	</div>
	<div class="col-md-12 mt-3">
		<div class="form-check form-check-inline">
			<label> Fisioterapi</label>
			<label><input type="radio" class="state iradio_square-red ml-3" id="fisio1" name="fisio" value="1" <?php if ($dtpulang->fisio == 1) {echo "checked";} ?>> Tidak Perlu</label>
			<label><input type="radio" class="state iradio_square-red ml-3" id="fisio2" name="fisio" value="2" <?php if ($dtpulang->fisio == 2) {echo "checked";} ?>> Terapi Fisik </label>
			<label><input type="radio" class="state iradio_square-red ml-3" id="fisio3" name="fisio" value="3" <?php if ($dtpulang->fisio == 3) {echo "checked";} ?>> Terapi Wicara </label>
			<label><input type="radio" class="state iradio_square-red ml-3" id="fisio4" name="fisio" value="4" <?php if ($dtpulang->fisio == 4) {echo "checked";} ?>> Terapi Okupasi </label>
			<label><input type="radio" class="state iradio_square-red ml-3" id="fisio2" name="fisio" value="5" <?php if ($dtpulang->fisio == 5) {echo "checked";} ?>> Terapi Lainnya </label>
		</div>
	</div>
	<div class="col-md-12 mt-3">
		<div class="form-check form-check-inline">
			<label> Kondisi BAK / BAB saat pulang</label>
			<label><input type="radio" class="state iradio_square-red ml-3" id="bab1" name="bab" value="1" <?php if ($dtpulang->bab == 1) {echo "checked";} ?>> Normal</label>
			<label><input type="radio" class="state iradio_square-red ml-3" id="bab2" name="bab" value="2" <?php if ($dtpulang->bab == 2) {echo "checked";} ?>> Tidak Normal </label>
			<input type="text" id="babtext" name="babtext" class="form-control ml-3" style="width:200px; border: 1px solid;" value="<?php echo $dtpulang->babtext ?>">
		</div>
	</div>
	<div class="col-md-12 mt-3">
		<div class="form-check form-check-inline">
			<label> Diet yang di butuhkan</label>
			<label><input type="radio" class="state iradio_square-red ml-3" id="diet1" name="diet" value="1" <?php if ($dtpulang->diet == 1) {echo "checked";} ?>> Tidak ada</label>
			<label><input type="radio" class="state iradio_square-red ml-3" id="diet2" name="diet" value="2" <?php if ($dtpulang->diet == 2) {echo "checked";} ?>> Ada </label>
		</div>
	</div>
	<div class="col-md-12 mt-3">
		<div class="form-check form-check-inline">
			<label> Rencana perawata lanjutan di rumah</label>
			<label><input type="radio" class="state iradio_square-red ml-3" id="lanjutrumah1" name="lanjutrumah" value="1" <?php if ($dtpulang->lanjutrumah == 1) {echo "checked";} ?>> Luka</label>
			<label><input type="radio" class="state iradio_square-red ml-3" id="lanjutrumah2" name="lanjutrumah" value="2" <?php if ($dtpulang->lanjutrumah == 2) {echo "checked";} ?>> Ngt </label>
			<label><input type="radio" class="state iradio_square-red ml-3" id="lanjutrumah1" name="lanjutrumah" value="3" <?php if ($dtpulang->lanjutrumah == 3) {echo "checked";} ?>> Cateter</label>
			<label><input type="radio" class="state iradio_square-red ml-3" id="lanjutrumah2" name="lanjutrumah" value="4" <?php if ($dtpulang->lanjutrumah == 4) {echo "checked";} ?>> Lainnya </label>
		</div>
	</div>
	<div class="col-md-12 mt-3">
		<div class="form-check form-check-inline">
			<label> Rencana transportasi pulang</label>
			<label><input type="radio" class="state iradio_square-red ml-3" id="transportasi1" name="transportasi" value="1" <?php if ($dtpulang->transportasi == 1) {echo "checked";} ?>> Ambulans</label>
			<label><input type="radio" class="state iradio_square-red ml-3" id="transportasi2" name="transportasi" value="2" <?php if ($dtpulang->transportasi == 2) {echo "checked";} ?>> Kendaraan Pribadi </label>
			<label><input type="radio" class="state iradio_square-red ml-3" id="transportasi3" name="transportasi" value="3" <?php if ($dtpulang->transportasi == 3) {echo "checked";} ?>> Angkutan Umum</label>
		</div>
	</div>
	<div class="col-md-12 mt-3">
		<div class="form-check form-check-inline">
			<label> Tempat Tujuan Pulang</label>
			<label><input type="radio" class="state iradio_square-red ml-3" id="tujuan1" name="tujuan" value="1" <?php if ($dtpulang->tujuan == 1) {echo "checked";} ?>> Rumah Sendiri</label>
			<label><input type="radio" class="state iradio_square-red ml-3" id="tujuan2" name="tujuan" value="2" <?php if ($dtpulang->tujuan == 2) {echo "checked";} ?>> Rumah Keluarga </label>
			<label><input type="radio" class="state iradio_square-red ml-3" id="tujuan3" name="tujuan" value="3" <?php if ($dtpulang->tujuan == 3) {echo "checked";} ?>> Panti</label>
			<label><input type="radio" class="state iradio_square-red ml-3" id="tujuan4" name="tujuan" value="4" <?php if ($dtpulang->tujuan == 3) {echo "checked";} ?>> Lainnya</label>
		</div>
	</div>
	<div class="col-md-12 mt-3">
		<div class="form-group row col-spacing-row">
			<label class="col-md-1 col-form-label">Alamat pulang</label>
			<div class="col-md-9">
				<input type="text" id="alamat" name="alamat" class="form-control" style="border: 0.5px solid black;" value="<?php echo $dtpulang->alamat ?>">
			</div>
		</div>
	</div>
	<div class="col-md-12 mt-3">
		<div class="form-check form-check-inline">
			<label>Yankes yang terdekat yang bisa dihubungi sebelum ke RS</label>
			<label><input type="radio" class="state iradio_square-red ml-3" id="yankes1" name="yankes" value="1" <?php if ($dtpulang->yankes == 1) {echo "checked";} ?>> PKM </label>
			<label><input type="radio" class="state iradio_square-red ml-3" id="yankes2" name="yankes" value="2" <?php if ($dtpulang->yankes == 2) {echo "checked";} ?>> PUSTU </label>
			<label><input type="radio" class="state iradio_square-red ml-3" id="yankes3" name="yankes" value="3" <?php if ($dtpulang->yankes == 3) {echo "checked";} ?>> Klinik </label>
			<input type="text" id="yankestext" name="yankestext" class="form-control ml-3" style="width:200px; border: 1px solid;" value="<?php echo $dtpulang->yankestext ?>">
		</div>
	</div>
	<div class="col-md-12 mt-3">
		<div class="form-check form-check-inline">
			<label> Hasil Pemeriksaan</label>
			<label><input type="radio" class="state iradio_square-red ml-3" id="hasil1" name="hasil" value="1" <?php if ($dtpulang->hasil == 1) {echo "checked";} ?>> Laboratorium</label>
			<label><input type="radio" class="state iradio_square-red ml-3" id="hasil2" name="hasil" value="2" <?php if ($dtpulang->hasil == 2) {echo "checked";} ?>> Foto </label>
		</div>
	</div>
	<div class="col-md-12 mt-3">
		<div class="form-check form-check-inline">
			<label> Resume Medis</label>
			<label><input type="radio" class="state iradio_square-red ml-3" id="resumemedis1" name="resumemedis" value="1" <?php if ($dtpulang->resumemedis == 1) {echo "checked";} ?>> Ada</label>
			<label><input type="radio" class="state iradio_square-red ml-3" id="resumemedis2" name="resumemedis" value="2" <?php if ($dtpulang->resumemedis == 2) {echo "checked";} ?>> Belum ada </label>
		</div>
	</div>
	<div class="col-md-12 mt-3">
		<div class="form-group row col-spacing-row">
			<label class="col-md-1 col-form-label">Diagnosa Akhir</label>
			<div class="col-md-9">
				<textarea class="form-control" id="diagnosaakhir" name="diagnosaakhir" rows="5" style="border: 0.5px solid;"><?php echo $dtpulang->diagnosaakhir ?></textarea>
			</div>
		</div>
	</div>
	<div class="col-md-12 mt-3">
		<div class="form-check form-check-inline">
			<label>Rencana Kontrol</label>
			<input type="date" id="tglkontrol" name="tglkontrol" class="form-control ml-3" style="width:200px; border: 1px solid;">
		</div>
		<div class="form-check form-check-inline">
			<label>Poli</label>
			<input type="text" id="poli" name="poli" class="form-control ml-3" style="width:200px; border: 1px solid;" value="<?php echo $dtpulang->poli ?>">
		</div>
	</div>
	<div class="col-md-12 mt-3">
		<div class="form-group row col-spacing-row">
			<label class="col-md-1 col-form-label">Terapi</label>
			<div class="col-md-9">
				<textarea class="form-control" id="terapi" name="terapi" rows="7" style="border: 1px solid;"><?php echo $dtpulang->terapi ?></textarea>
			</div>
		</div>
	</div>
	<div class="col-md-12 mb-5 mt-3">
		<button onclick="savepulang()" class="btn btn-primary save-button" data-bs-dismiss="modal">Simpan</button>
	</div>
</div>


<script>


function savepulang() {
		console.log('savefisikranap di tekan');
		var no_rm = document.getElementById("no_rm").value;
		var kode_dokter = document.getElementById("kode_dokter").value;
		var notransaksi = document.getElementById("notransaksi").value;
		
		var lamarawat = $("input[name='lamarawat']:checked").val();
		var keluarga = document.getElementById("keluarga").value;
		var hubungan = document.getElementById("hubungan").value;
		var notelp = document.getElementById("notelp").value;

		var komunikasi = $("input[name='komunikasi']:checked").val();
		var aktifitas = $("input[name='aktifitas']:checked").val();
		var jatuh = $("input[name='jatuh']:checked").val();
		var alatgerak = $("input[name='alatgerak']:checked").val();
		var alatkesehatan = $("input[name='alatkesehatan']:checked").val();
		var alattext = document.getElementById("alattext").value;

		var fisio = $("input[name='fisio']:checked").val();
		var bab = $("input[name='bab']:checked").val();
		var babtext = document.getElementById("babtext").value;

		var diet = $("input[name='diet']:checked").val();
		var lanjutrumah = $("input[name='lanjutrumah']:checked").val();
		var transportasi = $("input[name='transportasi']:checked").val();
		var tujuan = $("input[name='tujuan']:checked").val();
		var alamat = document.getElementById("alamat").value;
		
		var yankes = $("input[name='yankes']:checked").val();
		var yankestext = document.getElementById("yankestext").value;

		var hasil = $("input[name='hasil']:checked").val();
		var resumemedis = $("input[name='resumemedis']:checked").val();
		var diagnosaakhir = document.getElementById("diagnosaakhir").value;
		var tglkontrol = document.getElementById("tglkontrol").value;
		var poli = document.getElementById("poli").value;
		var terapi = document.getElementById("terapi").value;


		$.ajax({
			url: "<?php echo site_url(); ?>/rme/savepulang",
			type: "GET",
			data: {
				no_rm: no_rm,
				kode_dokter: kode_dokter,
				notransaksi: notransaksi,
				lamarawat : lamarawat,
				keluarga  : keluarga,
				hubungan  : hubungan,
				notelp  : notelp,
				komunikasi  : komunikasi,
				aktifitas  : aktifitas,
				jatuh  : jatuh,
				alatgerak  : alatgerak,
				alatkesehatan  : alatkesehatan,
				alattext  : alattext,
				fisio  : fisio,
				bab  : bab,
				babtext  : babtext,
				diet  : diet,
				lanjutrumah  : lanjutrumah,
				transportasi  : transportasi,
				tujuan  : tujuan,
				alamat  : alamat,
				yankes  : yankes,
				yankestext  : yankestext,
				hasil  : hasil,
				resumemedis  : resumemedis,
				diagnosaakhir  : diagnosaakhir,
				tglkontrol  : tglkontrol,
				poli  : poli		
			},
			success: function (ajaxData) {
				console.log('Simpan Data Berhasil');
				swal('Simpan Data Berhasil');
			},
			error: function (ajaxData) {
				swal('Simpan Data Gagal');
			}
		});
		
	}

</script>	