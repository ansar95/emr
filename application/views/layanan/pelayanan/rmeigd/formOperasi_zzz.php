<link rel="stylesheet" href="../../assets/template_baru/dist/vendors/icheck/skins/all.css">


<div class="card">
	<div class="col-12 mt-4 ml-3">
		<!-- <span style="font-size: 16px; font-weight: bold; color: navy;">TRIASE</span> -->
		<div class="w-sm-100 mr-auto"><h6 class="mb-0" style="color: navy;">OPERASI</h6></div>

	</div>
	<div class="col-12 mt-2 ml-3">
		<div class="tab-pane fade show" id="tabasesmenawalmedis" role="tabpanel">
			<nav>
				<div class="nav nav-tabs" id="subnavaskepranap" role="tablist">
					<a class="nav-item nav-link active" id="subtabasesmen" data-toggle="tab" href="#asesmen" role="tab" aria-controls="subnav1-1" aria-selected="true">Asesmen Pra Operasi</a>
					<a class="nav-item nav-link" id="subtabimunisasi" data-toggle="tab" href="#imunisasi" role="tab" aria-controls="subnav1-7" aria-selected="true">Instruksi Pasca Operasi</a>
					<a class="nav-item nav-link" id="subtabpersalinan" data-toggle="tab" href="#persalinan" role="tab" aria-controls="subnav1-2" aria-selected="false">Laporan Operasi</a>
					<a class="nav-item nav-link" id="subtabfisik" data-toggle="tab" href="#fisik" role="tab" aria-controls="subnav1-4" aria-selected="false">Check List Keselamatan Operasi</a>
					<a class="nav-item nav-link" id="subtabalergi" data-toggle="tab" href="#alergi" role="tab" aria-controls="subnav1-5" aria-selected="false">Asurah Keperawatan Perioperatif</a>
				</div>
				<div class="tab-content" id="subnavaskepranap-content">
					<div class="tab-pane fade show active" id="asesmen" role="tabpanel" aria-labelledby="subtabasesmen">
						<div class="card">
							<div class="card-body">
								<div class="col-md-12">
									<div class="w-sm-100 mr-auto"><h7 class="mb-0" style="color: navy;">Hari / Tanggal : .......</h7></div>
									<div class="form-group row col-spacing-row">
										<label class="col-md-2 col-form-label mt-3">Ringkasan Klinis</label>
										<div class="col-md-12">
											<textarea id="ringkasanklinis" name="ringkasanklinis" rows="5" style="width: 100%;"><?php echo $dtoperasi->ringkasanklinis ?></textarea>
										</div>
									</div>
								</div> 
								<div class="col-md-12">
									<div class="form-group row col-spacing-row">
										<label class="col-md-2 col-form-label">Riwayat Penyakit Sebelumnya</label>
										<div class="col-md-12">
											<textarea id="penyakitdahulu" name="penyakitdahulu" rows="5" style="width: 100%;"><?php echo $dtaskepranap->penyakitdahulu ?></textarea>
										</div>
									</div>
								</div>  
								<div class="col-md-12 mb-5">
									<div class="col-6 text-left">
										<button onclick="saveriwayat()" class="btn btn-primary save-button" data-bs-dismiss="modal" hidden>Simpan</button>
									</div>
								</div>
							</div> 
						</div> 
					</div> 
					 
				</div> 
			</nav>
		</div> 
	</div> 

<script>
	function saveriwayat() {
		console.log('saveriwayat di tekan');
		var no_rm = document.getElementById("no_rm").value;
		var kode_dokter = document.getElementById("kode_dokter").value;
		var notransaksi = document.getElementById("notransaksi").value;

		var riwayatsekarang = document.getElementById("riwayatsekarang").value;
		var penyakitdahulu = document.getElementById("penyakitdahulu").value;
		
		$.ajax({
			url: "<?php echo site_url(); ?>/rme/saveRanapRiwayat",
			type: "GET",
			data: {
				no_rm: no_rm,
				kode_dokter: kode_dokter,
				notransaksi: notransaksi,

				riwayatsekarang : riwayatsekarang,
				penyakitdahulu : penyakitdahulu

			},
			success: function (ajaxData) {
				console.log('Simpan Data riwayat Berhasil');
			},
			error: function (ajaxData) {
				swal('Simpan Data Gagal');
			}
		});
	}
	

	function saveimunisasi() {
		console.log('saveriwayat di tekan');
		var no_rm = document.getElementById("no_rm").value;
		var kode_dokter = document.getElementById("kode_dokter").value;
		var notransaksi = document.getElementById("notransaksi").value;
		var bcg = $("#bcg").prop("checked") ? 1 : 0;
		var polio = $("#polio").prop("checked") ? 1 : 0;
		var dpt = $("#dpt").prop("checked") ? 1 : 0;
		var campak = $("#campak").prop("checked") ? 1 : 0;
		var hepatitisb = $("#hepatitisb").prop("checked") ? 1 : 0;

		$.ajax({
			url: "<?php echo site_url(); ?>/rme/saveRanapImunisasi",
			type: "GET",
			data: {
				no_rm: no_rm,
				kode_dokter: kode_dokter,
				notransaksi: notransaksi,

				bcg : bcg,
				polio : polio,
				dpt : dpt,
				campak : campak,
				hepatitisb : hepatitisb

			},
			success: function (ajaxData) {
				console.log('Simpan Data imunisasi Berhasil');
			},
			error: function (ajaxData) {
				swal('Simpan Data Gagal');
			}
		});
		
	}

	function savepersalinan() {
		console.log('savepersalinan di tekan');
		var no_rm = document.getElementById("no_rm").value;
		var kode_dokter = document.getElementById("kode_dokter").value;
		var notransaksi = document.getElementById("notransaksi").value;

		var caramelahirkan = $("input[name='caramelahirkan']:checked").val();
		var tolongoleh = $("input[name='tolongoleh']:checked").val();
		var bb = document.getElementById("bb").value;
		var pb = document.getElementById("pb").value;
		var menangis = $("input[name='menangis']:checked").val();
		var operasi = $("input[name='operasi']:checked").val();
		var operasitext = document.getElementById("operasitext").value;
		var transfusi = $("input[name='transfusi']:checked").val();
		var transfusitext = document.getElementById("transfusitext").value;

		$.ajax({
			url: "<?php echo site_url(); ?>/rme/savePersalinanRanap",
			type: "GET",
			data: {
				no_rm: no_rm,
				kode_dokter: kode_dokter,
				notransaksi: notransaksi,

				caramelahirkan : caramelahirkan,
				tolongoleh : tolongoleh,
				bb : bb,
				pb : pb,
				menangis : menangis,
				operasi : operasi,
				operasitext : operasitext,
				transfusi : transfusi,
				transfusitext : transfusitext
			},
			success: function (ajaxData) {
				console.log('Simpan Data persalinan Berhasil');
			},
			error: function (ajaxData) {
				swal('Simpan Data Gagal');
			}
		});
		
	}

	function savefisikranap() {
		console.log('savefisikranap di tekan');
		var no_rm = document.getElementById("no_rm").value;
		var kode_dokter = document.getElementById("kode_dokter").value;
		var notransaksi = document.getElementById("notransaksi").value;
		
		var kesadaranfisik = $("input[name='kesadaranfisik']:checked").val();
		var keadaanumum = document.getElementById("keadaanumum").value;
		var beratbadan = document.getElementById("beratbadan").value;
		var td_fisik = document.getElementById("td_fisik").value;
		var hr_fisik = document.getElementById("hr_fisik").value;
		var rr_fisik = document.getElementById("rr_fisik").value;
		var suhu_fisik = document.getElementById("suhu_fisik").value;
		
		var kepala = $("input[name='kepala']:checked").val();
		var kepalatext = document.getElementById("kepalatext").value;

		var mata = $("input[name='mata']:checked").val();
		var matatext = document.getElementById("matatext").value;

		var tht = $("input[name='tht']:checked").val();
		var thttext = document.getElementById("thttext").value;

		var mulut = $("input[name='mulut']:checked").val();
		var muluttext = document.getElementById("muluttext").value;

		var leher = $("input[name='leher']:checked").val();
		var lehertext = document.getElementById("lehertext").value;
		
		var thorax = $("input[name='thorax']:checked").val();
		var thoraxtext = document.getElementById("thoraxtext").value;

		var abdomen = $("input[name='abdomen']:checked").val();
		var abdomentext = document.getElementById("abdomentext").value;

		var kepala = $("input[name='kepala']:checked").val();
		var kepalatext = document.getElementById("kepalatext").value;

		var urogenital = $("input[name='urogenital']:checked").val();
		var urogenitaltext = document.getElementById("urogenitaltext").value;
		
		var ekstermitas = $("input[name='ekstermitas']:checked").val();
		var ekstermitasatas = $("input[name='ekstermitasatas']:checked").val();
		var ekstermitasbawah = $("input[name='ekstermitasbawah']:checked").val();

		var kulit = $("input[name='kulit']:checked").val();
		var kulitturgor = $("input[name='kulitturgor']:checked").val();
		var kulitluka = $("input[name='kulitluka']:checked").val();

		var jantung = $("input[name='jantung']:checked").val();
		var jantungnyeri = $("input[name='jantungnyeri']:checked").val();
		var jantungbunyi = $("input[name='jantungbunyi']:checked").val();

		$.ajax({
			url: "<?php echo site_url(); ?>/rme/savefisikRanap",
			type: "GET",
			data: {
				no_rm: no_rm,
				kode_dokter: kode_dokter,
				notransaksi: notransaksi,

				kesadaranfisik : kesadaranfisik,
				keadaanumum : keadaanumum,
				beratbadan : beratbadan,
				td_fisik : td_fisik,
				hr_fisik : hr_fisik,
				rr_fisik : rr_fisik,
				kepala : kepala,
				kepalatext : kepalatext,
				mata : mata,
				matatext : matatext,
				tht : tht,
				thttext : thttext,
				mulut : mulut,
				muluttext : muluttext,
				leher : leher,
				lehertext : lehertext,
				thorax : thorax,
				thoraxtext : thoraxtext,
				abdomen : abdomen,
				abdomentext : abdomentext,
				kepala : kepala,
				kepalatext : kepalatext,
				urogenital : urogenital,
				urogenitaltext : urogenitaltext,
				ekstermitas : ekstermitas,
				ekstermitasatas : ekstermitasatas,
				ekstermitasbawah : ekstermitasbawah,
				kulit : kulit,
				kulitturgor : kulitturgor,
				kulitluka : kulitluka,
				jantung : jantung,
				jantungnyeri : jantungnyeri,
				jantungbunyi : jantungbunyi
			},
			success: function (ajaxData) {
				console.log('Simpan Data persalinan Berhasil');
			},
			error: function (ajaxData) {
				swal('Simpan Data Gagal');
			}
		});
		
	}
	
</script>

<script>

$(document).ready(function() {
    // Ketika ada perubahan pada radio button
    $('input[name="operasi"]').on('change', function() {
        if ($(this).val() === '2') { // Jika "Ya" dipilih
            $('#operasitext').prop('disabled', false); // Aktifkan textbox
        } else {
            $('#operasitext').prop('disabled', true).val(''); // Nonaktifkan textbox dan kosongkan isinya
        }
    });

    // Saat halaman dimuat, cek nilai radio button
    if ($('input[name="operasi"]:checked').val() === '2') {
        $('#operasitext').prop('disabled', false); // Jika "Ya" dipilih, aktifkan textbox
    } else {
        $('#operasitext').prop('disabled', true).val(''); // Jika tidak, nonaktifkan textbox dan kosongkan isinya
    }
});


$(document).ready(function() {
    // Ketika ada perubahan pada radio button
    $('input[name="transfusi"]').on('change', function() {
        if ($(this).val() === '2') { // Jika "Ya" dipilih
            $('#transfusitext').prop('disabled', false); // Aktifkan textbox
        } else {
            $('#transfusitext').prop('disabled', true).val(''); // Nonaktifkan textbox dan kosongkan isinya
        }
    });

    // Saat halaman dimuat, cek nilai radio button
    if ($('input[name="transfusi"]:checked').val() === '2') {
        $('#transfusitext').prop('disabled', false); // Jika "Ya" dipilih, aktifkan textbox
    } else {
        $('#transfusitext').prop('disabled', true).val(''); // Jika tidak, nonaktifkan textbox dan kosongkan isinya
    }
});


$(document).ready(function() {
    // Atur nilai radio Normal saat halaman dimuat
	$('input[name="ekstermitas"]').on('change', function() {
        $('input[name="ekstermitasbawah"]').not(this).prop('checked', false); // Hanya boleh memilih satu opsi
		$('input[name="ekstermitasatas"]').not(this).prop('checked', false);
    });

    $('input[name="ekstermitasatas"]').on('change', function() {
        $('input[name="ekstermitasatas"]').not(this).prop('checked', false); // Hanya boleh memilih satu opsi
		$('input[name="ekstermitas"]').not(this).prop('checked', false);
    });

    $('input[name="ekstermitasbawah"]').on('change', function() {
        $('input[name="ekstermitasbawah"]').not(this).prop('checked', false); // Hanya boleh memilih satu opsi
		$('input[name="ekstermitas"]').not(this).prop('checked', false);
    });
});

$(document).ready(function() {
    // Atur nilai radio Normal saat halaman dimuat
	$('input[name="kulit"]').on('change', function() {
        $('input[name="kulitturgor"]').not(this).prop('checked', false); // Hanya boleh memilih satu opsi
		$('input[name="kulitluka"]').not(this).prop('checked', false);
    });

    $('input[name="kulitturgor"]').on('change', function() {
        $('input[name="kulitturgor"]').not(this).prop('checked', false); // Hanya boleh memilih satu opsi
		$('input[name="kulit"]').not(this).prop('checked', false);
    });

    $('input[name="kulitluka"]').on('change', function() {
        $('input[name="kulitluka"]').not(this).prop('checked', false); // Hanya boleh memilih satu opsi
		$('input[name="kulit"]').not(this).prop('checked', false);
    });
});

$(document).ready(function() {
    // Atur nilai radio Normal saat halaman dimuat
	$('input[name="jantung"]').on('change', function() {
        $('input[name="jantungnyeri"]').not(this).prop('checked', false); // Hanya boleh memilih satu opsi
		$('input[name="jantungbunyi"]').not(this).prop('checked', false);
    });

    $('input[name="jantungnyeri"]').on('change', function() {
        $('input[name="jantungnyeri"]').not(this).prop('checked', false); // Hanya boleh memilih satu opsi
		$('input[name="jantung"]').not(this).prop('checked', false);
    });

    $('input[name="jantungbunyi"]').on('change', function() {
        $('input[name="jantungbunyi"]').not(this).prop('checked', false); // Hanya boleh memilih satu opsi
		$('input[name="jantung"]').not(this).prop('checked', false);
    });
});


$(document).ready(function() {
    var kepalatextInput = $('#kepalatext');

    // Atur status awal textbox saat halaman dimuat
    if ($('#lainnya').is(':checked')) {
        kepalatextInput.prop('disabled', false);
    } else {
        kepalatextInput.prop('disabled', true).val('');
    }

    // Ketika ada perubahan pada radio button Kepala
    $('input[name="kepala"]').on('change', function() {
        if ($(this).attr('id') === 'lainnya') {
            kepalatextInput.prop('disabled', false);
        } else {
            kepalatextInput.prop('disabled', true).val('');
        }
    });
});

$(document).ready(function() {
    var matatextInput = $('#matatext');

    // Atur status awal textbox saat halaman dimuat
    if ($('#mata-lainnya').is(':checked')) {
        matatextInput.prop('disabled', false);
    } else {
        matatextInput.prop('disabled', true).val('');
    }

    // Ketika ada perubahan pada radio button Mata
    $('input[name="mata"]').on('change', function() {
        if ($(this).attr('id') === 'mata-lainnya') {
            matatextInput.prop('disabled', false);
        } else {
            matatextInput.prop('disabled', true).val('');
        }
    });
});

$(document).ready(function() {
    var thtTextInput = $('#thttext');

    // Atur status awal textbox saat halaman dimuat
    if ($('#tht-lainnya').is(':checked')) {
        thtTextInput.prop('disabled', false);
    } else {
        thtTextInput.prop('disabled', true).val('');
    }

    // Ketika ada perubahan pada radio button THT
    $('input[name="tht"]').on('change', function() {
        if ($(this).attr('id') === 'tht-lainnya') {
            thtTextInput.prop('disabled', false);
        } else {
            thtTextInput.prop('disabled', true).val('');
        }
    });
});

$(document).ready(function() {
    var mulutTextInput = $('#muluttext');

    // Atur status awal textbox saat halaman dimuat
    if ($('#mulut-lainnya').is(':checked')) {
        mulutTextInput.prop('disabled', false);
    } else {
        mulutTextInput.prop('disabled', true).val('');
    }

    // Ketika ada perubahan pada radio button Mulut
    $('input[name="mulut"]').on('change', function() {
        if ($(this).attr('id') === 'mulut-lainnya') {
            mulutTextInput.prop('disabled', false);
        } else {
            mulutTextInput.prop('disabled', true).val('');
        }
    });
});

$(document).ready(function() {
    var leherTextInput = $('#lehertext');

    // Atur status awal textbox saat halaman dimuat
    if ($('#leher-lainnya').is(':checked')) {
        leherTextInput.prop('disabled', false);
    } else {
        leherTextInput.prop('disabled', true).val('');
    }

    // Ketika ada perubahan pada radio button Leher
    $('input[name="leher"]').on('change', function() {
        if ($(this).attr('id') === 'leher-lainnya') {
            leherTextInput.prop('disabled', false);
        } else {
            leherTextInput.prop('disabled', true).val('');
        }
    });
});

$(document).ready(function() {
    // Thorax
    var thoraxText = $('#thoraxtext');
    if ($('#thorax-lainnya').is(':checked')) {
        thoraxText.prop('disabled', false);
    } else {
        thoraxText.prop('disabled', true).val('');
    }

    $('input[name="thorax"]').on('change', function() {
        if ($(this).attr('id') === 'thorax-lainnya') {
            thoraxText.prop('disabled', false);
        } else {
            thoraxText.prop('disabled', true).val('');
        }
    });

    // Abdomen
    var abdomenText = $('#abdomentext');
    if ($('#abdomen4').is(':checked')) {
        abdomenText.prop('disabled', false);
    } else {
        abdomenText.prop('disabled', true).val('');
    }

    $('input[name="abdomen"]').on('change', function() {
        if ($(this).attr('id') === 'abdomen4') {
            abdomenText.prop('disabled', false);
        } else {
            abdomenText.prop('disabled', true).val('');
        }
    });

    // Urogenital
    var urogenitalText = $('#urogenitaltext');
    if ($('#urogenital-lainnya').is(':checked')) {
        urogenitalText.prop('disabled', false);
    } else {
        urogenitalText.prop('disabled', true).val('');
    }

    $('input[name="urogenital"]').on('change', function() {
        if ($(this).attr('id') === 'urogenital-lainnya') {
            urogenitalText.prop('disabled', false);
        } else {
            urogenitalText.prop('disabled', true).val('');
        }
    });
});

</script>


<script>
//mengatur save tabnav======
$(document).ready(function() {
        $('a[data-toggle="tab"]').on('hide.bs.tab', function(e) {
            var tabId = $(e.target).attr('href'); // Dapatkan ID tab yang sedang ditinggalkan
            var saveButton = $(tabId).find('.save-button'); // Cari tombol 'Simpan' di tab yang ditinggalkan
			var editing = document.getElementById("editing").value;
			if (editing > 0) {
				if (saveButton.length > 0) {
					saveButton.click(); // Panggil fungsi klik pada tombol 'Simpan' jika ditemukan di tab yang ditinggalkan
				}
			}	
        });
    });

</script>


<script>
  function savealergiranap() {
    console.log('saveri alergi di tekan');
		var no_rm = document.getElementById("no_rm").value;
		var kode_dokter = document.getElementById("kode_dokter").value;
		var notransaksi = document.getElementById("notransaksi").value;

		var alergi = $("input[name='alergi']:checked").val();
		var obat = document.getElementById("obat").value;
		var makanan = document.getElementById("makanan").value;
		var lainnya = document.getElementById("lainnyaalergi").value;

		$.ajax({
			url: "<?php echo site_url(); ?>/rme/saveRanapAlergi", 
			type: "GET",
			data: {
				no_rm: no_rm,
				kode_dokter: kode_dokter,
				notransaksi: notransaksi,

				alergi : alergi,
				obat : obat,
				makanan : makanan,
				lainnya : lainnya
			},
			success: function (ajaxData) {
				console.log('Simpan Data alergi Berhasil');
			},
			error: function (ajaxData) {
				swal('Simpan Data Gagal');
			}
		});
  }

  $(document).ready(function() {
    // Ketika ada perubahan pada radio button
    $('input[name="alergi"]').on('change', function() {
        if ($(this).val() === '1') { // Jika "Ya" dipilih
            $('#obat').prop('disabled', true); // Aktifkan textbox
            $('#makanan').prop('disabled', true); // Aktifkan textbox
            $('#lainnyaalergi').prop('disabled', true); // Aktifkan textbox
			$('#obat').prop('disabled', true).val(''); // Nonaktifkan textbox dan kosongkan isinya
            $('#makanan').prop('disabled', true).val(''); // Nonaktifkan textbox dan kosongkan isinya
            $('#lainnyaalergi').prop('disabled', true).val(''); // Nonaktifkan textbox dan kosongkan isinya
        } else {
			$('#obat').prop('disabled', false); // Aktifkan textbox
            $('#makanan').prop('disabled', false); // Aktifkan textbox
            $('#lainnyaalergi').prop('disabled', false); // Aktifkan textbox
        }
    });
});

</script>

