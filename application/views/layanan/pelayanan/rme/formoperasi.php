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
						<input class="form-control" id="notransaksi" type="hidden" value="<?php echo $notransaksi; ?>">
						<input class="form-control" id="notransaksi_IN" type="hidden" value="<?php echo $notransaksi_IN; ?>">
						<input class="form-control" id="no_rm" type="hidden" value="<?php echo $no_rm; ?>">
						<input class="form-control" id="no_askes" type="hidden"
							value="<?php echo $dataPasien->no_askes; ?>">
						<input class="form-control" id="golongan" type="hidden"
							value="<?php echo $dataPasien->golongan; ?>">
						<input class="form-control" id="tgl_masuk" type="hidden"
							value="<?php echo $dataPasien->tgl_masuk; ?>">

						<p>
						<div class="w-sm-100 mr-auto">
							<h6 class="mb-0" style="color: #848182;">OPERASI</h6>
						</div>
						<div class="w-sm-100 mr-auto">
							<h4 class="mb-0" style="color: #2D076F;">
								<?php echo $no_rm . ' | ' . $nama_pasien; ?>
							</h4>
						</div>
						<span style="display: inline;font-weight: bold; font-size: 14px; color: #4C0428;">
							<?php echo $dataPasien->golongan . ' | No.Kartu : ' . $dataPasien->no_askes . ' | NIK : ' . $dataPasien->nik . ' | Alamat : ' . $dataPasien->alamat . ' | Trx : ' . $notransaksi .' | Trx Instalasi: ' . $notransaksi_IN ?>
						</span><br>
						<span style="display: inline;font-weight: bold; font-size: 14px; color: #4C0428;">
							<?php echo 'Tanggal Lahir : ' . $tgl_lahir . ' | ' . $umur ?>
						</span><br>
						</p>
					</div>
				</div>
				<div class="col-md-1">
					<button class="btn btn-light mt-4" onclick="kembaliKeRmeNew()">Kembali</button>
				</div>
			</div>
			<div class="tab-pane fade show" id="tabutama" role="tabpanel2">
				<nav>
					<div class="nav nav-tabs" id="subnav12" role="tablist2">
						<div class="nav-item" style="flex: 1;"></div>
						<a class="nav-item nav-link active" id="subtabasesmen" data-toggle="tab" data-target="#asesmen" href="#asesmen" onclick="changeTabStyle(this)"
							role="tab" aria-controls="subnav12-1" aria-selected="true"
							style="background-color: #566573; color: white; border: 1px solid #ABB2B9;">Asesmen Pra Operasi</a>

						<a class="nav-item nav-link" id="subtabinstruksi" data-toggle="tab" data-target="#instruksi" onclick="changeTabStyle(this)"
							href="#instruksi" role="tab" aria-controls="subnav12-4" aria-selected="false"
							style="border: 1px solid #ABB2B9;">Instruksi Pasca Operasi</a>


						<a class="nav-item nav-link" id="subtablaporan" data-toggle="tab" data-target="#laporan"  onclick="changeTabStyle(this)"
							href="#laporan" role="tab" aria-controls="subnav12-5" aria-selected="false"
							style="border: 1px solid #ABB2B9;">Laporan Operasi</a>
						

						<a class="nav-item nav-link" id="subtabkeselamatan" data-toggle="tab" data-target="#keselamatan" onclick="changeTabStyle(this)"
							href="#keselamatan" role="tab" aria-controls="subnav12-11" aria-selected="false"
							style="border: 1px solid #ABB2B9;">Check List Keselamatan Operasi</a>

						<a class="nav-item nav-link" id="subtabasuhan" data-toggle="tab" data-target="#asuhan" onclick="changeTabStyle(this)"
							href="#asuhan" role="tab" aria-controls="subnav12-11" aria-selected="false"
							style="border: 1px solid #ABB2B9;">Asuhan Keperawatan Perioperatif</a>

						<a class="nav-item nav-link" id="subtabfile" data-toggle="tab" data-target="#file" onclick="changeTabStyle(this)"
							href="#file" role="tab" aria-controls="subnav12-11" aria-selected="false"
							style="border: 1px solid #ABB2B9;">File</a>
					</div>

					<div class="tab-content" id="subnav12-content">
						<div class="tab-pane fade show active" id="asesmen" role="tabpanel2" aria-labelledby="subtabasesmen">
							<!-- asesmen -->
							<div class="card">
								<div class="card-body">
									<div class="col-md-12">
										<label class="col-md-2 col-form-label">Ringkasan Klinik</label>
										<div class="col-md-10">
											<textarea class="form-control border-secondary" id="ringkasan" name="ringkasan" rows="5"><?php echo $dtasesopr->ringkasan?></textarea>
										</div>
									</div> 
									<div class="col-md-12">
										<label class="col-md-2 col-form-label">Pemeriksaan Fisik</label>
										<div class="col-md-10">
											<textarea class="form-control border-secondary" id="fisik" name="fisik" rows="5"><?php echo $dtasesopr->fisik?></textarea>
										</div>
									</div> 
									<div class="col-md-12">
										<label class="col-md-2 col-form-label">Pemeriksaan Diagnostik</label>
										<div class="col-md-10">
											<textarea class="form-control border-secondary" id="diagnostik" name="diagnostik" rows="5"><?php echo $dtasesopr->diagnostik?></textarea>
										</div>
									</div> 
									<div class="col-md-12">
										<label class="col-md-2 col-form-label">Diagnosa Pre Operasi</label>
										<div class="col-md-10">
											<textarea class="form-control border-secondary" id="diagpreoperasi" name="diagpreoperasi" rows="5"><?php echo $dtasesopr->diagpreoperasi?></textarea>
										</div>
									</div> 
									<div class="col-md-12">
										<label class="col-md-2 col-form-label">Rencana Tindakan Bedah</label>
										<div class="col-md-10">
											<textarea class="form-control border-secondary" id="rencana" name="rencana" rows="5"><?php echo $dtasesopr->rencana?></textarea>
										</div>
									</div> 
									<div class="col-md-12">
										<label class="col-md-2 col-form-label">Hal-hal yang perlu di persiapkan</label>
										<div class="col-md-10">
											<textarea class="form-control border-secondary" id="hal" name="hal" rows="5"><?php echo $dtasesopr->hal?></textarea>
										</div>
									</div> 
									<div class="col-md-12">
										<label class="col-md-2 col-form-label">Terapi Pre Operasi</label>
										<div class="col-md-10">
											<textarea class="form-control border-secondary" id="terapi" name="terapi" rows="5"><?php echo $dtasesopr->terapi?></textarea>
										</div>
									</div> 
									<div class="col-12 mt-3 ml-3">
										<div class="form-group row col-spacing-row">
											<div class="col-10 text-left">
												<button onclick="saveasespraopr()" id="tombolsaveass" class="btn btn-success" data-bs-dismiss="modal">Simpan</button>
											</div>
										</div>
									</div>
								</div> 
							</div> 
						</div>  
						<div class="tab-pane fade" id="instruksi" role="tabpanel2" aria-labelledby="subtabinstruksi">
							<!-- instruksi -->
						</div>

						<div class="tab-pane fade" id="laporan" role="tabpanel2" aria-labelledby="subtablaporan">
							<!-- laporan -->
						</div>

						<div class="tab-pane fade" id="keselamatan" role="tabpanel2" aria-labelledby="subtabkeselamatan">
							keselamatan
						</div>

						<div class="tab-pane fade" id="asuhan" role="tabpanel2" aria-labelledby="subtabasuhan">
							asuhan
						</div>

						<div class="tab-pane fade" id="file" role="tabpanel2" aria-labelledby="subtabfile">
							<div class="card">
								<div class="card-body">
									<div class="col-md-12">
										<button onclick="uploadfile()" id="uploadfile" class="btn btn-secondary" data-bs-dismiss="modal">Upload File</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</nav>	
			</div>	
		</div>
	</div>

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
			// var url = "<?php echo site_url(); ?>/rme/rme_new";
			var url= "<?php echo site_url(); ?>/rme/rme_new?tabnav=7";
			window.location.href = url;
		}
</script>

<script>
function saveasespraopr() {
            var no_rm = document.getElementById("no_rm").value;
            var notransaksi = document.getElementById("notransaksi").value;
            var notransaksi_IN = document.getElementById("notransaksi_IN").value;
            var ringkasan = document.getElementById("ringkasan").value;
            var fisik = document.getElementById("fisik").value;
            var diagnostik = document.getElementById("diagnostik").value;
            var diagpreoperasi = document.getElementById("diagpreoperasi").value;
            var rencana = document.getElementById("rencana").value;
            var hal = document.getElementById("hal").value;
            var terapi = document.getElementById("terapi").value;

            // var id = document.getElementById("idnya").value;
            // var kode_dokter_tujuan = $("#kode_dokter_tujuan").val();
			// var nama_dokter_tujuan = $("#kode_dokter_tujuan option:selected").text();
            $.ajax({
                url: "<?php echo site_url(); ?>/rme/saveassopr",
                type: "GET",
                data: {
                    no_rm : no_rm,
                    notransaksi : notransaksi,
                    notransaksi_IN : notransaksi_IN,
                    ringkasan : ringkasan,
                    fisik : fisik,
                    diagnostik : diagnostik,
                    diagpreoperasi : diagpreoperasi,
                    rencana : rencana,
                    hal : hal,
					terapi : terapi
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

<script type="text/javascript">
	$(document).ready(function () {
		$("#subtabinstruksi").on("click", function (e) {
			e.preventDefault(); // Mencegah tab berperilaku standar

			// Panggil fungsi panggilFormTriase saat tab diklik
			var no_rm = document.getElementById("no_rm").value;
			var notransaksi = document.getElementById("notransaksi").value;
			var notransaksi_IN = document.getElementById("notransaksi_IN").value;

			$.ajax({
				url: "<?php echo site_url(); ?>/rme/panggilFormInstruksiPascaOperasi",
				type: "GET",
				data: {
					no_rm: no_rm,
					notransaksi: notransaksi,
					notransaksi_IN: notransaksi_IN
				},
				success: function (ajaxData) {
					// console.log(ajaxData);
					$("#instruksi").html(ajaxData);
				},
				error: function () {
					$.notify("Gagal Memproses Data", "error");
				}
			});
		});
	});


	function saveasespraopr() {
            var no_rm = document.getElementById("no_rm").value;
            var notransaksi = document.getElementById("notransaksi").value;
            var notransaksi_IN = document.getElementById("notransaksi_IN").value;
            var ringkasan = document.getElementById("ringkasan").value;
            var fisik = document.getElementById("fisik").value;
            var diagnostik = document.getElementById("diagnostik").value;
            var diagpreoperasi = document.getElementById("diagpreoperasi").value;
            var rencana = document.getElementById("rencana").value;
            var hal = document.getElementById("hal").value;
            var terapi = document.getElementById("terapi").value;

            // var id = document.getElementById("idnya").value;
            // var kode_dokter_tujuan = $("#kode_dokter_tujuan").val();
			// var nama_dokter_tujuan = $("#kode_dokter_tujuan option:selected").text();
            $.ajax({
                url: "<?php echo site_url(); ?>/rme/saveassopr",
                type: "GET",
                data: {
                    no_rm : no_rm,
                    notransaksi : notransaksi,
                    notransaksi_IN : notransaksi_IN,
                    ringkasan : ringkasan,
                    fisik : fisik,
                    diagnostik : diagnostik,
                    diagpreoperasi : diagpreoperasi,
                    rencana : rencana,
                    hal : hal,
					terapi : terapi
				},
				success: function (ajaxData) {
					swal('Simpan Data Berhasil');
				},
				error: function (ajaxData) {
					swal('Simpan Data Gagal');
				}
            });
        }

		$(document).ready(function () {
		$("#subtablaporan").on("click", function (e) {
			e.preventDefault(); // Mencegah tab berperilaku standar

			// Panggil fungsi panggilFormTriase saat tab diklik
			var no_rm = document.getElementById("no_rm").value;
			var notransaksi = document.getElementById("notransaksi").value;
			var notransaksi_IN = document.getElementById("notransaksi_IN").value;

			$.ajax({
				url: "<?php echo site_url(); ?>/rme/panggilFormLaporanOperasi",
				type: "GET",
				data: {
					no_rm: no_rm,
					notransaksi: notransaksi,
					notransaksi_IN: notransaksi_IN
				},
				success: function (ajaxData) {
					// console.log(ajaxData);
					$("#laporan").html(ajaxData);
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