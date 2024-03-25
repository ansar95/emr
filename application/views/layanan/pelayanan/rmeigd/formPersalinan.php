<link rel="stylesheet" href="../../assets/template_baru/dist/vendors/icheck/skins/all.css">
<div class="card">
	<div class="col-12 mt-4">
		<div class="w-sm-100 mr-auto"><h6 class="mb-0" style="color: red;">FORM PERSALINAN</h6></div>
	</div>
	<div class="col-12 mt-2">
		<div class="form-group row col-spacing-row">
			<label class="col-md-2 col-form-label">Nama Suami</label>
			<div class="col-md-4"><input type="text" style="border: 1px solid #7C7E7B;" class="form-control" name="namasuami" id="namasuami" maxlength="40" value='<?php echo $dtpersalinan->namasuami;?>'></div>
			<label class="col-md-2 col-form-label">Ibu Masuk Karena</label>
			<div class="col-md-4"><input type="text" style="border: 1px solid #7C7E7B;" class="form-control" name="masukkarena" id="masukkarena" maxlength="50" value='<?php echo $dtpersalinan->masukkarena;?>'></div>
		</div>
		<div class="form-group row col-spacing-row">
			<label class="col-md-2 col-form-label">Masuk Sejak</label>
			<div class="col-md-4"><input type="date" class="form-control" name="masuksejak" id="masuksejak" maxlength="50" value='<?php echo $dtpersalinan->masuksejak;?>'></div>
			<label class="col-md-2 col-form-label">Lendir dan Darah</label>
			<div class="col-md-4"><input type="text" style="border: 1px solid #7C7E7B;" class="form-control" name="lendirdarah" id="lendirdarah" maxlength="50" value='<?php echo $dtpersalinan->lendirdarah;?>'></div>
		</div>
		<div class="form-group row col-spacing-row">
			<label class="col-md-2 col-form-label">Ketuban Pecah / Belum</label>
			<div class="col-md-4"><input type="text" style="border: 1px solid #7C7E7B;" class="form-control" name="ketuban" id="ketuban" maxlength="50" value='<?php echo $dtpersalinan->ketuban;?>'></div>
			<label class="col-md-2 col-form-label">Keadaan Jantung</label>
			<div class="col-md-4"><input type="text" style="border: 1px solid #7C7E7B;" class="form-control" name="jantung" id="jantung" maxlength="50" value='<?php echo $dtpersalinan->jantung;?>'></div>
		</div>
		<div class="form-group row col-spacing-row">
			<label class="col-md-2 col-form-label">Kesehatan Umum</label>
			<label class="col-md-1 col-form-label">Tekanan</label>
			<div class="col-md-1"><input type="text" style="border: 1px solid #7C7E7B;" class="form-control" name="tekanan" id="tekanan" maxlength="10" value='<?php echo $dtpersalinan->tekanan;?>'></div>
			<label class="col-md-1 col-form-label">Nadi</label>
			<div class="col-md-1"><input type="text" style="border: 1px solid #7C7E7B;" class="form-control" name="nadi" id="nadi" maxlength="10" value='<?php echo $dtpersalinan->nadi;?>'></div>
			<label class="col-md-1 col-form-label">Suhu</label>
			<div class="col-md-1"><input type="text" style="border: 1px solid #7C7E7B;" class="form-control" name="suhu" id="suhu" maxlength="10" value='<?php echo $dtpersalinan->suhu;?>'></div>
			<label class="col-md-1 col-form-label">Pernapasan</label>
			<div class="col-md-1"><input type="text" style="border: 1px solid #7C7E7B;" class="form-control" name="pernapasan" id="pernapasan" maxlength="10" value='<?php echo $dtpersalinan->pernapasan;?>'></div>
			<label class="col-md-1 col-form-label">Oedem</label>
			<div class="col-md-1"><input type="text" style="border: 1px solid #7C7E7B;" class="form-control" name="oedem" id="oedem" maxlength="10" value='<?php echo $dtpersalinan->oedem;?>'></div>
		</div>
	</div>

	<div class="col-12 mt-4">
		<div class="w-sm-100 mr-auto"><h7 class="mb-0" style="color: navy;">PEMERIKSAAN LUAR</h7></div>
	</div>
	<div class="col-12 mt-2">
		<div class="form-group row col-spacing-row">
			<label class="col-md-2 col-form-label">Fundusi Uteri</label>
			<div class="col-md-4"><input type="text" style="border: 1px solid #7C7E7B;" class="form-control" name="fundusi" id="fundusi" maxlength="40" value='<?php echo $dtpersalinan->fundusi;?>'></div>
			<label class="col-md-2 col-form-label">Situs Anas</label>
			<div class="col-md-4"><input type="text" style="border: 1px solid #7C7E7B;" class="form-control" name="situsanak" id="situsanak" maxlength="50" value='<?php echo $dtpersalinan->situsanak;?>'></div>
		</div>
		<div class="form-group row col-spacing-row">
			<label class="col-md-2 col-form-label">Posisi Punggung</label>
			<div class="col-md-4"><input type="text" style="border: 1px solid #7C7E7B;" class="form-control" name="posisi" id="posisi" maxlength="40" value='<?php echo $dtpersalinan->posisi;?>'></div>
			<label class="col-md-2 col-form-label">Bagian Paling Depan</label>
			<div class="col-md-4"><input type="text" style="border: 1px solid #7C7E7B;" class="form-control" name="bagiandepan" id="bagiandepan" maxlength="50" value='<?php echo $dtpersalinan->bagiandepan;?>'></div>
		</div>
		<div class="form-group row col-spacing-row">
			<label class="col-md-2 col-form-label">D.D.A</label>
			<div class="col-md-4"><input type="text" style="border: 1px solid #7C7E7B;" class="form-control" name="dda" id="dda" maxlength="40" value='<?php echo $dtpersalinan->dda;?>'></div>
			<label class="col-md-2 col-form-label">Gemeli / Tunggal</label>
			<div class="col-md-4"><input type="text" style="border: 1px solid #7C7E7B;" class="form-control" name="gemeli" id="gemeli" maxlength="50" value='<?php echo $dtpersalinan->gemeli;?>'></div>
		</div>
		<div class="form-group row col-spacing-row">
			<label class="col-md-2 col-form-label">Gerakan Anak</label>
			<div class="col-md-4"><input type="text" style="border: 1px solid #7C7E7B;" class="form-control" name="gerakan" id="gerakan" maxlength="40" value='<?php echo $dtpersalinan->gerakan;?>'></div>
		</div>
	</div>
	<div class="col-12 mt-2">
		<div class="form-group row col-spacing-row">
			<label class="col-md-8 col-form-label" style="font-weight: bold; color: navy;">KALA PEMBUKAAN</label>
			<label class="col-md-4 col-form-label">PIMPINAN dan TERAPI</label>
		</div>
	</div>
	<div class="col-12 mt-2">
		<div class="form-group row col-spacing-row">
			<div class="col-md-8">
				<textarea id="kalapembukaan" name="kalapembukaan" rows="5" style="width: 100%;"><?php echo $dtpersalinan->kalapembukaan ?></textarea>
			</div>
			<div class="col-md-4">
				<textarea id="pimpinanpembukaan" name="pimpinanpembukaan" rows="5" style="width:100%;"><?php echo $dtpersalinan->pimpinanpembukaan ?></textarea>
			</div>
		</div>
	</div>
	<div class="col-12 mt-2">
		<div class="form-group row col-spacing-row">
			<label class="col-md-8 col-form-label" style="font-weight: bold; color: navy;">KALA PENGELUARAN</label>
			<label class="col-md-4 col-form-label">PIMPINAN dan TERAPI</label>
		</div>
	</div>
	<div class="col-12 mt-2">
		<div class="form-group row col-spacing-row">
			<div class="col-md-8">
				<textarea id="kalapengeluaran" name="kalapengeluaran" rows="5" style="width:100%;"><?php echo $dtpersalinan->kalapengeluaran ?></textarea>
			</div>
			<div class="col-md-4">
				<textarea id="pimpinanpengeluaran" name="pimpinanpengeluaran" rows="5" style="width: 100%;"><?php echo $dtpersalinan->pimpinanpengeluaran ?></textarea>
			</div>
		</div>
	</div>
	<div class="col-12 mt-2">
		<div class="form-group row col-spacing-row">
			<div class="col-12 mt-2">
				<div class="form-group row col-spacing-row">
					<label class="col-md-8 col-form-label" style="font-weight: bold; color: navy;">KALA URI</label>
					<label class="col-md-4 col-form-label">PIMPINAN dan TERAPI</label>
				</div>
			</div>
			<div class="col-md-8">
				<div class="form-group row col-spacing-row">
					<label class="col-md-2 col-form-label">Tanggal</label>
					<div class="col-md-4"><input type="date" style="border: 1px solid #7C7E7B;" class="form-control" name="kalauritgl" id="kalauritgl" maxlength="10" value='<?php echo $dtpersalinan->kalauritgl;?>'></div>
					<label class="col-md-1 col-form-label">Jam</label>
					<div class="col-md-5"><input type="time" style="border: 1px solid #7C7E7B;" class="form-control" name="kalaurijam" id="kalaurijam" maxlength="10" value='<?php echo $dtpersalinan->kalaurijam;?>'></div>
				</div>	
				<div class="form-group row col-spacing-row">
					<label class="col-md-2 col-form-label">Pendarahan (CC)</label>
					<div class="col-md-4"><input type="text" style="border: 1px solid #7C7E7B;" class="form-control" name="pendarahan" id="pendarahan" maxlength="10" value='<?php echo $dtpersalinan->pendarahan;?>'></div>
					<label class="col-md-1 col-form-label">Sebab</label>
					<div class="col-md-5"><input type="text" style="border: 1px solid #7C7E7B;" class="form-control" name="sebab" id="sebab" maxlength="10" value='<?php echo $dtpersalinan->sebab;?>'></div>
				</div>	
				<div class="form-group row col-spacing-row">
					<label class="col-md-2 col-form-label">Plasenta</label>
					<div class="col-md-4"><input type="text" style="border: 1px solid #7C7E7B;" class="form-control" name="plasenta" id="plasenta" maxlength="50" value='<?php echo $dtpersalinan->plasenta;?>'></div>
					<label class="col-md-1 col-form-label">Tali Pusat</label>
					<div class="col-md-5"><input type="text" style="border: 1px solid #7C7E7B;" class="form-control" name="talipusat" id="talipusat" maxlength="50" value='<?php echo $dtpersalinan->talipusat;?>'></div>
				</div>
			</div>
			<div class="col-md-4">
				<textarea id="pimpinanuri" name="pimpinanuri" rows="5" style="width: 100%;"><?php echo $dtpersalinan->pimpinanuri ?></textarea>
			</div>
		</div>
	</div>

	<div class="col-12 mt-2">
		<div class="form-group row col-spacing-row">
			<div class="col-12 mt-2">
				<div class="form-group row col-spacing-row">
					<label class="col-md-8 col-form-label" style="font-weight: bold; color: navy;">KALA IV</label>
					<label class="col-md-4 col-form-label">PIMPINAN dan TERAPI</label>
				</div>
			</div>
			<div class="col-md-8">
				<div class="form-group row col-spacing-row">
					<label class="col-md-2 col-form-label">Tanggal</label>
					<div class="col-md-4"><input type="date" style="border: 1px solid #7C7E7B;" class="form-control" name="kala4tgl" id="kala4tgl" maxlength="10" value='<?php echo $dtpersalinan->kala4tgl;?>'></div>
					<label class="col-md-2 col-form-label">Jam</label>
					<div class="col-md-4"><input type="time" style="border: 1px solid #7C7E7B;" class="form-control" name="kala4jam" id="kala4jam" maxlength="10" value='<?php echo $dtpersalinan->kala4jam;?>'></div>
				</div>	
			<!-- </div>	
			<div class="col-md-12"> -->
				<div class="form-group row col-spacing-row">
					<label class="col-md-2 col-form-label">Pendarahan (CC)</label>
					<div class="col-md-4"><input type="text" style="border: 1px solid #7C7E7B;" class="form-control" name="pendarahan4" id="pendarahan4" maxlength="10" value='<?php echo $dtpersalinan->pendarahan4;?>'></div>
					<label class="col-md-2 col-form-label">Jumlah Seluruhnya</label>
					<div class="col-md-4"><input type="text" style="border: 1px solid #7C7E7B;" class="form-control" name="jumlah4" id="jumlah4" maxlength="10" value='<?php echo $dtpersalinan->jumlah4;?>'></div>
				</div>	
				<div class="form-group row col-spacing-row">
					<label class="col-md-2 col-form-label">Robekan</label>
					<div class="col-md-4"><input type="text" style="border: 1px solid #7C7E7B;" class="form-control" name="robekan" id="robekan" maxlength="30" value='<?php echo $dtpersalinan->robekan;?>'></div>
					<label class="col-md-2 col-form-label">Konstraksi</label>
					<div class="col-md-4"><input type="text" style="border: 1px solid #7C7E7B;" class="form-control" name="kontraksi" id="kontraksi" maxlength="30" value='<?php echo $dtpersalinan->kontraksi;?>'></div>
				</div>
				<div class="form-group row col-spacing-row">
					<label class="col-md-2 col-form-label">Tinggi Fundus</label>
					<div class="col-md-4"><input type="text" style="border: 1px solid #7C7E7B;" class="form-control" name="tinggi" id="tinggi" maxlength="30" value='<?php echo $dtpersalinan->tinggi;?>'></div>
				</div>
				<div class="form-group row col-spacing-row">
					<label class="col-md-2 col-form-label">Keadaan Umum</label>
					<label class="col-md-1 col-form-label">Tekanan</label>
					<div class="col-md-1"><input type="text" style="border: 1px solid #7C7E7B;" class="form-control" name="tekanan4" id="tekanan4" maxlength="10" value='<?php echo $dtpersalinan->tekanan4;?>'></div>
					<label class="col-md-1 col-form-label">Nadi</label>
					<div class="col-md-1"><input type="text" style="border: 1px solid #7C7E7B;" class="form-control" name="nadi4" id="nadi4" maxlength="10" value='<?php echo $dtpersalinan->nadi4;?>'></div>
					<label class="col-md-1 col-form-label">Suhu</label>
					<div class="col-md-1"><input type="text" style="border: 1px solid #7C7E7B;" class="form-control" name="suhu4" id="suhu4" maxlength="10" value='<?php echo $dtpersalinan->suhu4;?>'></div>
					<label class="col-md-2 col-form-label">Pernapasan</label>
					<div class="col-md-1"><input type="text" style="border: 1px solid #7C7E7B;" class="form-control" name="pernapasan4" id="pernapasan4" maxlength="10" value='<?php echo $dtpersalinan->pernapasan4;?>'></div>
				</div>
			</div>
			<div class="col-md-4">
				<textarea id="pimpinan4" name="pimpinan4" rows="5" style="width: 100%;"><?php echo $dtpersalinan->pimpinan4 ?></textarea>
			</div>
			<div class="col-md-12">
				<div class="form-group row col-spacing-row">
					<label class="col-md-2 col-form-label">Petugas Persalinan</label>
					<div class="col-md-4"><input type="text" style="border: 1px solid #7C7E7B;" class="form-control" name="petugaspersalinan" id="petugaspersalinan" maxlength="10" value='<?php echo $dtpersalinan->petugaspersalinan;?>'></div>
				</div>	
			</div>	
			<div class="col-md-12 text-left mt-4">
				<button onclick="savepersalinan()" class="btn btn-primary" data-bs-dismiss="modal">Simpan</button>
			</div>
		</div>
		
	</div>
</div>

<script>
	
function kuranglengkap() {
	$.notify("Data Kurang Lengkap", "error");
}


function savepersalinan() {
		var no_rm = document.getElementById("no_rm").value;
		var kode_dokter = document.getElementById("kode_dokter").value;
		var notransaksi = document.getElementById("notransaksi").value;

		var namasuami = document.getElementById("namasuami").value;
		var masukkarena = document.getElementById("masukkarena").value;
		var masuksejak = document.getElementById("masuksejak").value;
		var lendirdarah = document.getElementById("lendirdarah").value;
		var ketuban = document.getElementById("ketuban").value;
		var jantung = document.getElementById("jantung").value;
		var tekanan = document.getElementById("tekanan").value;
		var nadi = document.getElementById("nadi").value;
		var suhu = document.getElementById("suhu").value;
		var pernapasan = document.getElementById("pernapasan").value;
		var oedem = document.getElementById("oedem").value;
		var fundusi = document.getElementById("fundusi").value;
		var situsanak = document.getElementById("situsanak").value;
		var posisi = document.getElementById("posisi").value;
		var bagiandepan = document.getElementById("bagiandepan").value;
		var dda = document.getElementById("dda").value;

		var gemeli = document.getElementById("gemeli").value;
		var gerakan = document.getElementById("gerakan").value;
		var kalapembukaan = document.getElementById("kalapembukaan").value;
		var kalapengeluaran = document.getElementById("kalapengeluaran").value;
		var kalauritgl = document.getElementById("kalauritgl").value;
		var kalaurijam = document.getElementById("kalaurijam").value;
		var pendarahan = document.getElementById("pendarahan").value;
		var sebab = document.getElementById("sebab").value;
		var plasenta = document.getElementById("plasenta").value;
		var talipusat = document.getElementById("talipusat").value;

		var kala4tgl = document.getElementById("kala4tgl").value;
		var kala4jam = document.getElementById("kala4jam").value;
		var pendarahan4 = document.getElementById("pendarahan4").value;
		var jumlah4 = document.getElementById("jumlah4").value;
		var robekan = document.getElementById("robekan").value;
		var kontraksi = document.getElementById("kontraksi").value;
		var tinggi = document.getElementById("tinggi").value;
		var tekanan4 = document.getElementById("tekanan4").value;
		var nadi4 = document.getElementById("nadi4").value;
		var pernapasan4 = document.getElementById("pernapasan4").value;
		var suhu4 = document.getElementById("suhu4").value;
		var petugaspersalinan = document.getElementById("petugaspersalinan").value;

		var pimpinanpembukaan = document.getElementById("pimpinanpembukaan").value;
		var pimpinanpengeluaran = document.getElementById("pimpinanpengeluaran").value;
		var pimpinanuri = document.getElementById("pimpinanuri").value;
		var pimpinan4 = document.getElementById("pimpinan4").value;

		$.ajax({
			url: "<?php echo site_url(); ?>/rme/savepersalinan",
			type: "GET",
			data: {
				no_rm: no_rm,
				kode_dokter: kode_dokter,
				notransaksi: notransaksi,

				namasuami: namasuami,
				masukkarena: masukkarena,
				masuksejak: masuksejak,
				lendirdarah: lendirdarah,
				ketuban: ketuban,

				jantung: jantung,
				tekanan: tekanan,
				nadi: nadi,
				suhu: suhu,
				pernapasan: pernapasan,

				oedem: oedem,
				fundusi: fundusi,
				situsanak: situsanak,
				posisi: posisi,
				bagiandepan: bagiandepan,
				dda: dda,

				gemeli: gemeli,
				gerakan: gerakan,
				kalapembukaan: kalapembukaan,
				kalapengeluaran: kalapengeluaran,
				kalauritgl: kalauritgl,
				kalaurijam: kalaurijam,
				pendarahan: pendarahan,
				sebab: sebab,
				plasenta: plasenta,
				talipusat: talipusat,

				kala4tgl: kala4tgl,
				kala4jam: kala4jam,
				
				pendarahan4: pendarahan4,
				jumlah4: jumlah4,
				robekan: robekan,
				kontraksi: kontraksi,
				tinggi: tinggi,
				tekanan4: tekanan4,
				nadi4: nadi4,
				pernapasan4: pernapasan4,
				suhu4: suhu4,
				petugaspersalinan: petugaspersalinan,

				pimpinanpembukaan : pimpinanpembukaan,
				pimpinanpengeluaran : pimpinanpengeluaran,
				pimpinanuri : pimpinanuri,
				pimpinan4 : pimpinan4

			},
			success: function (ajaxData) {
				swal('Simpan Data Berhasil');
			},
			error: function (ajaxData) {
				swal('Simpan Data Gagal');
			}
		});
	}