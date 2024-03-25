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
			<!-- <div class="card" style="background-color: #808000;"> -->
			<div class="row spacing-row">
				<div class="col-md-11">
					<div class="card-body">
						<input class="form-control" id="notransaksi" type="hidden"
							value="<?php echo $dataPasien->notransaksi; ?>">
						<input class="form-control" id="no_rm" type="hidden" value="<?php echo $dataPasien->no_rm; ?>">
						<input class="form-control" id="no_askes" type="hidden"
							value="<?php echo $dataPasien->no_askes; ?>">
						<!-- <input class="form-control" id="kode_dokter" type="hidden" value="<?php echo $dataPasien->kode_dokter; ?>"> -->
						<!-- <input class="form-control" id="nama_dokter" type="hidden" value="<?php echo $dataPasien->nama_dokter; ?>"> -->
						<!-- <input class="form-control" id="kode_unit" type="hidden" value="<?php echo $dataPasien->kode_unit; ?>"> -->
						<!-- <input class="form-control" id="nama_unit" type="hidden" value="<?php echo $dataPasien->nama_unit; ?>"> -->
						<input class="form-control" id="golongan" type="hidden"
							value="<?php echo $dataPasien->golongan; ?>">
						<input class="form-control" id="tgl_masuk" type="hidden"
							value="<?php echo $dataPasien->tgl_masuk; ?>">
						<p>

						<div class="w-sm-100 mr-auto">
							<h6 class="mb-0" style="color: #848182;">Pasien</h6>
						</div>
						<div class="w-sm-100 mr-auto">
							<h4 class="mb-0" style="color: #2D076F;">
								<?php echo $dataPasien->no_rm . ' | ' . $nama_pasien; ?>
							</h4>
						</div>
						<span style="display: inline;font-weight: bold; font-size: 14px; color: #4C0428;">
							<?php echo $dataPasien->golongan . ' | No.Kartu : ' . $dataPasien->no_askes . ' | NIK : ' . $dataPasien->nik . ' | Alamat : ' . $dataPasien->alamat . ' | Trx : ' . $dataPasien->notransaksi . ' | No.Antrian : ' . $dataPasien->no_antrian; ?>
						</span><br>
						<span style="display: inline;font-weight: bold; font-size: 14px; color: #4C0428;">
							<?php echo 'Tanggal Lahir : ' . $tgl_lahir . ' | ' . $umur ?>
						</span><br>
						<!-- <?php if ($editing == 0) { ?> -->
							<!-- <button class="btn btn-light" -->
								<!-- style="display: inline;font-weight: bold; font-size: 20px; color: #9D1305; background-color: yellow;"> -->
								<!-- <?php echo ' History Pemeriksaan Pasien Tanggal : ' . $tglhistori . " "; ?> -->
							<!-- </button> -->
						<!-- <?php } ?> -->
						</p>
					</div>
				</div>
				<div class="col-md-1">
					<button class="btn btn-light mt-4" onclick="kembaliKeRmeNew()">Kembali</button>
				</div>
			</div>
			<!-- </div> -->

			<div class="tab-pane fade show" id="tabutama" role="tabpanel2">
				<nav>
					<div class="nav nav-tabs" id="subnavaskepranap" role="tablist">
						<a class="nav-item nav-link active" id="subtabasesmen" data-toggle="tab" href="#asesmen" role="tab" aria-controls="subnav1-1" aria-selected="true">Asesmen Pra Operasi</a>
						<a class="nav-item nav-link" id="subtabinstruksi" data-toggle="tab" href="#instruksi" role="tab" aria-controls="subnav1-7" aria-selected="true">Instruksi Pasca Operasi</a>
						<a class="nav-item nav-link" id="subtablaporan" data-toggle="tab" href="#laporan" role="tab" aria-controls="subnav1-2" aria-selected="false">Laporan Operasi</a>
						<a class="nav-item nav-link" id="subtabkeselamatan" data-toggle="tab" href="#keselamatan" role="tab" aria-controls="subnav1-4" aria-selected="false">Check List Keselamatan Operasi</a>
						<a class="nav-item nav-link" id="subtabasuhan" data-toggle="tab" href="#asuhan" role="tab" aria-controls="subnav1-5" aria-selected="false">Asuhan Keperawatan Perioperatif</a>
					</div>
					<div class="tab-content" id="subnav12-content">
						<div class="tab-pane fade show active" id="asesmen" role="tabpanel2" aria-labelledby="subtabasesmen">
							assesmen
						</div>
						<div class="tab-pane fade" id="instruksi" role="tabpanel2" aria-labelledby="subtabinstruksi">
							<!-- assesmen awal medis -->
							instruksi
						</div>

						<div class="tab-pane fade" id="laporan" role="tabpanel2" aria-labelledby="subtablaporan">
							<!-- fisio -->
							laporan
						</div>

						<div class="tab-pane fade" id="keselamatan" role="tabpanel2" aria-labelledby="subtabkeselamatan">
							<!-- tampilkan resume medis disini -->
							keselamatan
						</div>
						<div class="tab-pane fade" id="asuhan" role="tabpanel2" aria-labelledby="subtabasuhan">
							<!-- tampilkan resume medis disini -->
							asuhan
						</div>
					</div>
				</nav>	
			</div>	
		</div>
	</div>

<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>		 -->
<!-- <script src="../assets/jquery_web/jquery-3.6.4.min.js"></script> -->
<script src="<?php echo base_url();?>/assets/jquery_web/jquery-3.6.4.min.js"></script>





	<script>

		var activeCollapse = null; // Untuk melacak collapse yang sedang aktif

		// Fungsi untuk menampilkan atau menyembunyikan collapse
		function toggleCollapse(collapseId) {
			if (activeCollapse === collapseId) {
				// Jika collapse yang sama diklik lagi, sembunyikan collapse tersebut
				$('#' + collapseId).collapse('hide');
				activeCollapse = null;
			} else {
				// Sembunyikan collapse yang sedang aktif (jika ada)
				if (activeCollapse !== null) {
					$('#' + activeCollapse).collapse('hide');
				}
				// Tampilkan collapse yang diklik
				$('#' + collapseId).collapse('show');
				activeCollapse = collapseId;
			}
		}

		function kembaliKeRmeNew() {
			var url = "<?php echo site_url(); ?>/rme/rme_new";
			window.location.href = url;
		}



		function openSoapForm(id, kodeDokter) {
			var no_rm = document.getElementById("no_rm").value;
			var kode_dokter = document.getElementById("kode_dokter").value;
			if (kode_dokter == kodeDokter) {
				$.ajax({
					url: "<?php echo site_url(); ?>/rme/panggilSoapDokter",
					type: "GET",
					data: {
						id: id,
						kode_dokter: kode_dokter,
						no_rm: no_rm
					},
					success: function (ajaxData) {
						// console.log(ajaxData);
						$("#formmodal").html(ajaxData);
						$("#formmodal").modal('show', {
							backdrop: 'true'
						});
						modaldetailtutup();
					},
					error: function (ajaxData) {
						$.notify("Gagal Memproses Data", "error");
					}
				});
			} else {
				swal({
					// title: "opps",
					text: "Tidak bisa melakukan perubahan SOAP \n dari dokter lain",
					icon: "error",
					button: true
				});
			}
		}


		function bukaFormResep(id) {
			var no_rm = document.getElementById("no_rm").value;
			var kode_dokter = document.getElementById("kode_dokter").value;
			$.ajax({
				url: "<?php echo site_url(); ?>/rme/pilihObatId",
				type: "GET",
				data: {
					id: id,
					no_rm: no_rm,
					kode_dokter: kode_dokter
				},
				success: function (ajaxData) {
					console.log(ajaxData);
					var array_data = JSON.parse(ajaxData);
					console.log(array_data);
				},
				error: function (ajaxData) {
					$.notify("Gagal Memproses Data", "error");
				}
			});

		}

		function addResep(id, kode_obat) {
			var no_rm = document.getElementById("no_rm").value;
			var kode_dokter = document.getElementById("kode_dokter").value;
			var notransaksi = document.getElementById("notransaksi").value;
			var kode_unit = document.getElementById("kode_unit").value;
			console.log(no_rm);
			console.log(kode_dokter);
			console.log(notransaksi);
			$.ajax({
				url: "<?php echo site_url(); ?>/rme/pilihObatId",
				type: "GET",
				data: {
					id: id,
					kode_obat: kode_obat,
					no_rm: no_rm,
					kode_dokter: kode_dokter,
					notransaksi: notransaksi,
					kode_unit: kode_unit
				},
				success: function (ajaxData) {
					console.log(ajaxData);
					var dt = JSON.parse(ajaxData);
					$("#orderresep tbody tr").remove();
					$("#orderresep tbody").append(dt.dtview);
				},
				error: function (ajaxData) {
					$.notify("Gagal Memproses Data", "error");
				}
			});
		}

		function modaldetailtutup() {
			$("#detailmodal").remove();
		}

		function bukaFormObat(id) {
			$.ajax({
				url: "<?php echo site_url(); ?>/rme/panggilFormObat",
				type: "GET",
				data: {
					id: id,
				},
				success: function (ajaxData) {
					$("#formmodal").html(ajaxData);
					$("#formmodal").modal('show', {
						backdrop: 'true'
					});
					modaldetailtutup();
				},
				error: function (ajaxData) {
					$.notify("Gagal Memproses Data", "error");
				}
			});

		}

		function tambahObat(id) {
			$.ajax({
				url: "<?php echo site_url(); ?>/rme/tambahOrderObat",
				type: "GET",
				data: {
					id: id,
				},
				success: function (ajaxData) {
					$("#formmodal").html(ajaxData);
					$("#formmodal").modal('show', {
						backdrop: 'true'
					});
					modaldetailtutup();
				},
				error: function (ajaxData) {
					$.notify("Gagal Memproses Data", "error");
				}
			});

		}

		function tambahRacik(id) {
			var kode_dokter = document.getElementById("kode_dokter").value;
			// alert(kode_dokter);
			$.ajax({
				url: "<?php echo site_url(); ?>/rme/tambahOrderRacikan",
				type: "GET",
				data: {
					id: id,
					kode_dokter: kode_dokter
				},
				success: function (ajaxData) {
					$("#formmodal").html(ajaxData);
					$("#formmodal").modal('show', {
						backdrop: 'true'
					});
					modaldetailtutup();
				},
				error: function (ajaxData) {
					$.notify("Gagal Memproses Data", "error");
				}
			});

		}

		function tambahDiag(id) {
			$.ajax({
				url: "<?php echo site_url(); ?>/rme/tambahOrderDiag",
				type: "GET",
				data: {
					id: id,
				},
				success: function (ajaxData) {
					$("#formmodal").html(ajaxData);
					$("#formmodal").modal('show', {
						backdrop: 'true'
					});
					modaldetailtutup();
				},
				error: function (ajaxData) {
					$.notify("Gagal Memproses Data", "error");
				}
			});

		}

		function openAssesmenForm(id) {
			var no_rm = document.getElementById("no_rm").value;
			$.ajax({
				url: "<?php echo site_url(); ?>/rme/panggilAssesmen",
				type: "GET",
				data: {
					id: id,
					no_rm: no_rm
				},
				success: function (ajaxData) {
					// console.log(ajaxData);
					$("#formmodal").html(ajaxData);
					$("#formmodal").modal('show', {
						backdrop: 'true'
					});
					modaldetailtutup();
				},
				error: function (ajaxData) {
					$.notify("Gagal Memproses Data", "error");
				}
			});

		}

		function addLab(id) {
			var no_rm = document.getElementById("no_rm").value;
			var kode_dokter = document.getElementById("kode_dokter").value;
			var nama_dokter = document.getElementById("nama_dokter").value;
			var notransaksi = document.getElementById("notransaksi").value;
			var kode_unit = document.getElementById("kode_unit").value;
			var nama_unit = document.getElementById("nama_unit").value;
			var golongan = document.getElementById("kode_unit").value;
			var tgl_masuk = document.getElementById("tgl_masuk").value;
			// alert(id);
			$.ajax({
				url: "<?php echo site_url(); ?>/rme/pilihLabId",
				type: "GET",
				data: {
					id: id,
					no_rm: no_rm,
					kode_dokter: kode_dokter,
					nama_dokter: nama_dokter,
					notransaksi: notransaksi,
					kode_unit: kode_unit,
					nama_unit: nama_unit,
					golongan: golongan,
					tgl_masuk: tgl_masuk
				},
				success: function (ajaxData) {
					console.log(ajaxData);
					var dt = JSON.parse(ajaxData);
					$("#orderlab tbody tr").remove();
					$("#orderlab tbody").append(dt.dtview);
				},
				error: function (ajaxData) {
					$.notify("Gagal Memproses Data", "error");
				}
			});
		}


		function bukaFormLab(id) {
			$.ajax({
				url: "<?php echo site_url(); ?>/rme/panggilFormLabRme",
				type: "GET",
				data: {
					id: id,
				},
				success: function (ajaxData) {
					$("#formmodal").html(ajaxData);
					$("#formmodal").modal('show', {
						backdrop: 'true'
					});
					modaldetailtutup();
				},
				error: function (ajaxData) {
					$.notify("Gagal Memproses Data", "error");
				}
			});

		}


		function addRad(id) {
			var no_rm = document.getElementById("no_rm").value;
			var kode_dokter = document.getElementById("kode_dokter").value;
			var nama_dokter = document.getElementById("nama_dokter").value;
			var notransaksi = document.getElementById("notransaksi").value;
			var kode_unit = document.getElementById("kode_unit").value;
			var nama_unit = document.getElementById("nama_unit").value;
			var golongan = document.getElementById("kode_unit").value;
			var tgl_masuk = document.getElementById("tgl_masuk").value;
			// alert(id);
			$.ajax({
				url: "<?php echo site_url(); ?>/rme/pilihRadId",
				type: "GET",
				data: {
					id: id,
					no_rm: no_rm,
					kode_dokter: kode_dokter,
					nama_dokter: nama_dokter,
					notransaksi: notransaksi,
					kode_unit: kode_unit,
					nama_unit: nama_unit,
					golongan: golongan,
					tgl_masuk: tgl_masuk
				},
				success: function (ajaxData) {
					console.log(ajaxData);
					var dt = JSON.parse(ajaxData);
					$("#orderrad tbody tr").remove();
					$("#orderrad tbody").append(dt.dtview);
				},
				error: function (ajaxData) {
					$.notify("Gagal Memproses Data", "error");
				}
			});
		}


		function bukaFormRad(id) {
			$.ajax({
				url: "<?php echo site_url(); ?>/rme/panggilFormRadRme",
				type: "GET",
				data: {
					id: id,
				},
				success: function (ajaxData) {
					$("#formmodal").html(ajaxData);
					$("#formmodal").modal('show', {
						backdrop: 'true'
					});
					modaldetailtutup();
				},
				error: function (ajaxData) {
					$.notify("Gagal Memproses Data", "error");
				}
			});

		}

		function addDiag(id) {
			var no_rm = document.getElementById("no_rm").value;
			var kode_dokter = document.getElementById("kode_dokter").value;
			var nama_dokter = document.getElementById("nama_dokter").value;
			var notransaksi = document.getElementById("notransaksi").value;
			var kode_unit = document.getElementById("kode_unit").value;
			var nama_unit = document.getElementById("nama_unit").value;
			var golongan = document.getElementById("kode_unit").value;
			var tgl_masuk = document.getElementById("tgl_masuk").value;
			// alert(id);
			$.ajax({
				url: "<?php echo site_url(); ?>/rme/pilihDiagId",
				type: "GET",
				data: {
					id: id,
					no_rm: no_rm,
					kode_dokter: kode_dokter,
					nama_dokter: nama_dokter,
					notransaksi: notransaksi,
					kode_unit: kode_unit,
					nama_unit: nama_unit,
					golongan: golongan,
					tgl_masuk: tgl_masuk
				},
				success: function (ajaxData) {
					console.log(ajaxData);
					var dt = JSON.parse(ajaxData);
					$("#orderdiag tbody tr").remove();
					$("#orderdiag tbody").append(dt.dtview);
				},
				error: function (ajaxData) {
					$.notify("Gagal Memproses Data", "error");
				}
			});
		}

		function bukaFormDiag(id) {
			$.ajax({
				url: "<?php echo site_url(); ?>/rme/panggilFormDiagRme",
				type: "GET",
				data: {
					id: id,
				},
				success: function (ajaxData) {
					$("#formmodal").html(ajaxData);
					$("#formmodal").modal('show', {
						backdrop: 'true'
					});
					modaldetailtutup();
				},
				error: function (ajaxData) {
					$.notify("Gagal Memproses Data", "error");
				}
			});

		}

		function tambahMasterRacik() {
			var kode_dokter = document.getElementById("kode_dokter").value;
			$.ajax({
				url: "<?php echo site_url(); ?>/rme/tambahMasterRacikan",
				type: "GET",
				data: {
					kode_dokter: kode_dokter
				},
				success: function (ajaxData) {
					$("#formmodal").html(ajaxData);
					$("#formmodal").modal('show', {
						backdrop: 'true'
					});
					modaldetailtutup();
				},
				error: function (ajaxData) {
					$.notify("Gagal Memproses Data", "error");
				}
			});

		}

		function refreshTabelMasterRacik() {
			var kode_dokter = document.getElementById("kode_dokter").value;
			$.ajax({
				url: "<?php echo site_url(); ?>/rme/panggilMasterRacikDokter",
				type: "GET",
				data: {
					kode_dokter: kode_dokter
				},
				success: function (ajaxData) {
					console.log(ajaxData);
					var dt = JSON.parse(ajaxData);
					$("#datamasterracik tbody tr").remove();
					$("#datamasterracik tbody").append(dt.dtview);
				},
				error: function (ajaxData) {
					$.notify("Gagal Memproses Data", "error");
				}
			});

		}


		function editDataRacik(kode_racikan) {
			var kode_dokter = document.getElementById("kode_dokter").value;
			$.ajax({
				url: "<?php echo site_url(); ?>/rme/editMasterRacikan",
				type: "GET",
				data: {
					kode_dokter: kode_dokter,
					kode_racikan: kode_racikan
				},
				success: function (ajaxData) {
					$("#formmodal").html(ajaxData);
					$("#formmodal").modal('show', {
						backdrop: 'true'
					});
					modaldetailtutup();
				},
				error: function (ajaxData) {
					$.notify("Gagal Memproses Data", "error");
				}
			});

		}


		function tambahKonsul() {
			var no_rm = document.getElementById("no_rm").value;
			var kode_dokter = document.getElementById("kode_dokter").value;
			var nama_dokter = document.getElementById("nama_dokter").value;
			var notransaksi = document.getElementById("notransaksi").value;
			var kode_unit = document.getElementById("kode_unit").value;
			var nama_unit = document.getElementById("nama_unit").value;
			var golongan = document.getElementById("kode_unit").value;
			var tanggal = document.getElementById("tgl_masuk").value;
			$.ajax({
				url: "<?php echo site_url(); ?>/rme/FormTambahKonsul",
				type: "GET",
				data: {
					no_rm: no_rm,
					kode_dokter: kode_dokter,
					nama_dokter: nama_dokter,
					notransaksi: notransaksi,
					kode_unit: kode_unit,
					nama_unit: nama_unit,
					golongan: golongan,
					tanggal: tanggal
				},
				success: function (ajaxData) {
					$("#formmodal").html(ajaxData);
					$("#formmodal").modal('show', {
						backdrop: 'true'
					});
					modaldetailtutup();
				},
				error: function (ajaxData) {
					$.notify("Gagal Memproses Data", "error");
				}
			});

		}

		function jawabkonsul(id) {
			$.ajax({
				url: "<?php echo site_url(); ?>/rme/jawabkonsul",
				type: "GET",
				data: {
					id: id
				},
				success: function (ajaxData) {
					$("#formmodal").html(ajaxData);
					$("#formmodal").modal('show', {
						backdrop: 'true'
					});
					modaldetailtutup();
				},
				error: function (ajaxData) {
					$.notify("Gagal Memproses Data", "error");
				}
			});

		}



		function editisiankonsul(id) {
			$.ajax({
				url: "<?php echo site_url(); ?>/rme/editisikonsul",
				type: "GET",
				data: {
					id: id
				},
				success: function (ajaxData) {
					$("#formmodal").html(ajaxData);
					$("#formmodal").modal('show', {
						backdrop: 'true'
					});
					modaldetailtutup();
				},
				error: function (ajaxData) {
					$.notify("Gagal Memproses Data", "error");
				}
			});

		}



		function bukaFormHasilRAD(id) {
			// Buat URL untuk cetak berdasarkan ID
			var url = "<?php echo site_url(); ?>/iradiologi/layananhasilcetak_rme/" + id;

			// Buka URL dalam tab atau jendela baru
			window.open(url, '_blank');
		}


		// ========== cari resep ==========
		document.getElementById('cari').addEventListener('input', function () {
			var kataKunci = this.value.toLowerCase(); // Ambil teks input dan ubah menjadi huruf kecil

			var tabel = document.getElementById('tabelresep');
			var tbody = tabel.getElementsByTagName('tbody')[0]; // Dapatkan elemen tbody

			var rows = tbody.getElementsByTagName('tr'); // Dapatkan semua baris dalam tabel

			for (var i = 0; i < rows.length; i++) {
				var row = rows[i];
				var cell = row.getElementsByTagName('td')[1]; // Dapatkan sel kedua (index 1) yang berisi data obat

				if (cell) {
					var dataObat = cell.textContent.toLowerCase(); // Ambil teks dalam sel dan ubah menjadi huruf kecil
					var isVisible = dataObat.indexOf(kataKunci) !== -1; // Cek apakah data obat mengandung kata kunci pencarian

					// Tampilkan atau sembunyikan baris berdasarkan hasil pencarian
					row.style.display = isVisible ? '' : 'none';
				}
			}
		});

		// ========== cari laboratorium==========
		document.getElementById('carilab').addEventListener('input', function () {
			var kataKunci = this.value.toLowerCase(); // Ambil teks input dan ubah menjadi huruf kecil

			var tabel = document.getElementById('tabellab');
			var tbody = tabel.getElementsByTagName('tbody')[0]; // Dapatkan elemen tbody

			var rows = tbody.getElementsByTagName('tr'); // Dapatkan semua baris dalam tabel

			for (var i = 0; i < rows.length; i++) {
				var row = rows[i];
				var cell = row.getElementsByTagName('td')[1]; // Dapatkan sel kedua (index 1) yang berisi data tindakan

				if (cell) {
					var dataTindakan = cell.textContent.toLowerCase(); // Ambil teks dalam sel dan ubah menjadi huruf kecil
					var isVisible = dataTindakan.indexOf(kataKunci) !== -1; // Cek apakah data tindakan mengandung kata kunci pencarian

					// Tampilkan atau sembunyikan baris berdasarkan hasil pencarian
					row.style.display = isVisible ? '' : 'none';
				}
			}
		});

		// ========== cari radiologi ==============
		document.getElementById('carirad').addEventListener('input', function () {
			var kataKunci = this.value.toLowerCase(); // Ambil teks input dan ubah menjadi huruf kecil

			var tabel = document.getElementById('tabelrad');
			var tbody = tabel.getElementsByTagName('tbody')[0]; // Dapatkan elemen tbody

			var rows = tbody.getElementsByTagName('tr'); // Dapatkan semua baris dalam tabel

			for (var i = 0; i < rows.length; i++) {
				var row = rows[i];
				var cell = row.getElementsByTagName('td')[1]; // Dapatkan sel kedua (index 1) yang berisi data tindakan

				if (cell) {
					var dataTindakan = cell.textContent.toLowerCase(); // Ambil teks dalam sel dan ubah menjadi huruf kecil
					var isVisible = dataTindakan.indexOf(kataKunci) !== -1; // Cek apakah data tindakan mengandung kata kunci pencarian

					// Tampilkan atau sembunyikan baris berdasarkan hasil pencarian
					row.style.display = isVisible ? '' : 'none';
				}
			}
		});
</script>


<!-- asesmen keperawatan -->
<script type="text/javascript">
	// Event listener untuk tab "triase"
	$(document).ready(function () {
		$("#subtabawalmedis").on("click", function (e) {
			e.preventDefault(); // Mencegah tab berperilaku standar

			// Panggil fungsi panggilFormTriase saat tab diklik
			var no_rm = document.getElementById("no_rm").value;
			var notransaksi = document.getElementById("notransaksi").value;

			$.ajax({
				url: "<?php echo site_url(); ?>/rme/panggilFormAsesmenRajal",
				type: "GET",
				data: {
					no_rm: no_rm,
					notransaksi: notransaksi
				},
				success: function (ajaxData) {
					console.log(ajaxData);
					$("#awalmedis").html(ajaxData);
				},
				error: function () {
					$.notify("Gagal Memproses Data", "error");
				}
			});
		});
	});
</script>


<script type="text/javascript">
	// Event listener untuk tab "triase"
	$(document).ready(function () {
		$("#subtabfisio").on("click", function (e) {
			e.preventDefault(); // Mencegah tab berperilaku standar

			// Panggil fungsi panggilFormTriase saat tab diklik
			var no_rm = document.getElementById("no_rm").value;
			var notransaksi = document.getElementById("notransaksi").value;

			$.ajax({
				url: "<?php echo site_url(); ?>/rme/panggilFormFisio",
				type: "GET",
				data: {
					no_rm: no_rm,
					notransaksi: notransaksi
				},
				success: function (ajaxData) {
					console.log(ajaxData);
					$("#fisio").html(ajaxData);
				},
				error: function () {
					$.notify("Gagal Memproses Data", "error");
				}
			});
		});
	});
</script>

<script type="text/javascript">
	// Event listener untuk tab "triase"
	$(document).ready(function () {
		$("#subtabresumemedis").on("click", function (e) {
			e.preventDefault(); // Mencegah tab berperilaku standar

			// Panggil fungsi panggilFormTriase saat tab diklik
			var no_rm = document.getElementById("no_rm").value;
			var notransaksi = document.getElementById("notransaksi").value;
			var kode_dokter = document.getElementById("kode_dokter").value;

			$.ajax({
				url: "<?php echo site_url(); ?>/rme/panggilFormResumeMedis",
				type: "GET",
				data: {
					no_rm: no_rm,
					notransaksi: notransaksi,
					kode_dokter : kode_dokter
				},
				success: function (ajaxData) {
					console.log(ajaxData);
					$("#resumemedis").html(ajaxData);
				},
				error: function () {
					$.notify("Gagal Memproses Data", "error");
				}
			});
		});
	});
</script>

<script>
        function changeTabStyle(tab) {
            // Mendapatkan semua elemen tab
            var tabs = document.getElementsByClassName('nav-link');

            // Mengatur style untuk semua tab menjadi default
            for (var i = 0; i < tabs.length; i++) {
                tabs[i].style.backgroundColor = '';
                tabs[i].style.color = '';
            }

            // Mengatur style untuk tab yang dipilih
            tab.style.backgroundColor = '#566573';  // Warna hitam untuk latar belakang
            tab.style.color = '#ffffff';  // Warna putih untuk teks
        }
    </script>