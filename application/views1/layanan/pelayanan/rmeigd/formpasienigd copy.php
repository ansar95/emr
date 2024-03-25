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
			<div class="card" style="background-color: #808000;">
				<div class="row spacing-row">
					<div class="col-md-11">
						<div class="card-body">
							<input class="form-control" id="notransaksi" type="hidden" value="<?php echo $dataPasien->notransaksi; ?>">
							<input class="form-control" id="no_rm" type="hidden" value="<?php echo $dataPasien->no_rm; ?>">
							<input class="form-control" id="no_askes" type="hidden" value="<?php echo $dataPasien->no_askes; ?>">
							<input class="form-control" id="kode_dokter" type="hidden" value="<?php echo $dataPasien->kode_dokter; ?>">
							<input class="form-control" id="nama_dokter" type="hidden" value="<?php echo $dataPasien->nama_dokter; ?>">
							<input class="form-control" id="kode_unit" type="hidden" value="<?php echo $dataPasien->kode_unit; ?>">
							<input class="form-control" id="nama_unit" type="hidden" value="<?php echo $dataPasien->nama_unit; ?>">
							<input class="form-control" id="golongan" type="hidden" value="<?php echo $dataPasien->golongan; ?>">
							<input class="form-control" id="tgl_masuk" type="hidden" value="<?php echo $dataPasien->tgl_masuk; ?>">
							<p>
								<span style="display: inline; font-weight: bold; font-size: 20px; color: white;"><?php echo $dataPasien->no_rm.' | '.$nama_pasien; ?></span><br>
								<span style="display: inline;font-weight: bold; font-size: 14px; color: white;"><?php echo $dataPasien->golongan.' | No.Kartu : '.$dataPasien->no_askes.' | NIK : '.$dataPasien->nik.' | Alamat : '.$dataPasien->alamat.' | Trx : '.$dataPasien->notransaksi.' | No.Antrian : '.$dataPasien->no_antrian; ?></span><br>
							</p>
						</div>
					</div>
					<div class="col-md-1">
						<button class="btn btn-light mt-4" onclick="kembaliKeRmeNew()">Kembali</button>
            		</div>
            	</div>
            </div>
			<nav>
                <div class="nav nav-tabs font-weight-bold border-bottom mt-3" id="nav-tab" role="tablist">

					<a class="nav-item nav-link active" id="tabtriase1" data-toggle="tab" href="#tabtriase" role="tab" aria-controls="nav-home" aria-selected="true" style="background-color: #3366CC; color: white;">TRIASE PASIEN</a>
					<a class="nav-item nav-link" id="tabasesmenawalmedis1" data-toggle="tab" href="#tabasesmenawalmedis" role="tab" aria-controls="nav-profile" aria-selected="false" style="background-color: #66CC33; color: white;">ASESMEN AWAL MEDIS</a>
					<a class="nav-item nav-link" id="tabasesmenawalkeperawatan1" data-toggle="tab" href="#tabasesmenawalkeperawatan" role="tab" aria-controls="nav-contact" aria-selected="false" style="background-color: #FF9933; color: white;">ASESMEN AWAL KEPERAWATAN</a>
					<a class="nav-item nav-link" id="tabpersalinan1" data-toggle="tab" href="#tabpersalinan" role="tab" aria-controls="nav-contact" aria-selected="false" style="background-color: #CC3366; color: white;">PERSALINAN</a>
					<a class="nav-item nav-link" id="tabrekonsoliasiobat1" data-toggle="tab" href="#tabrekonsoliasiobat" role="tab" aria-controls="nav-contact" aria-selected="false" style="background-color: #9933CC; color: white;">REKONSILIASI OBAT</a>
                </div>
            </nav>
			<div class="tab-content mt-3" id="nav-tabContent">
				<!-- ================== triase ====================== -->
                <div class="tab-pane fade show active" id="tabtriase" role="tabpanel" >
				<!-- <table border="1" width="100%"> -->
				<table border="1" width="100%" style="border-color: black;">
					<tr>
						<td rowspan="2"></td>
						<!-- <td colspan="2">PRIORITAS I</td> -->
						<td colspan="2" width="36%" style=" font-size: 14px; text-align: center; background-color: #F25E4C; color: white; height: 30px;">PRIORITAS I</td>
						<td colspan="2" width="36%" style=" font-size: 14px; text-align: center; background-color: yellow; color: black;">PRIORITAS II</td>
						<td style=" font-size: 14px; text-align: center; background-color: green; color: white;">PRIOROTAS III</td>
					</tr>
					
					<tr>
						<td style=" font-size: 12px; height:80px; background-color: #F25E4C; color: white; text-align: center;"><input type="checkbox" id="kategori1" value="Kategori1"> Kategori 1<br>Resusitasi<br> Respon Time : 0</td>
						<td style=" font-size: 12px; height:80px; background-color: #F25E4C; color: white; text-align: center;"><input type="checkbox" id="kategori2" value="Kategori2"> Kategori 2<br>Emergency / Gawat Darurat<br> Respon Time : 1 - 3 Menit</td>
						<td style=" font-size: 12px; height:80px; background-color: yellow; color: black; text-align: center;"><input type="checkbox" id="kategori3" value="Kategor3"> Kategori 1<br>Urgen / Darurat<br> Respon Time : 3 - 5 Menit</td>
						<td style=" font-size: 12px; height:80px; background-color: yellow; color: black; text-align: center;"><input type="checkbox" id="kategori4" value="Kategor4"> Kategori 2<br>Semi Darurat</td>
						<td style=" font-size: 12px; height:80px; background-color: green; color: white; text-align: center;"><input type="checkbox" id="kategori5" value="Kategori2"> Kategori 1<br>TIdak Darurat</td>

					</tr>
					<tr>
						<td width="10%" style=" font-size: 12px; padding-left: 15px; background-color: #CFD1CF; height:90px;">AIRWAY</td>
						<td width="18%" style=" font-size: 12px; padding-left: 30px; background-color: #F25E4C; color: white;">
							<input type="checkbox" name="sumbatan" value="total" style=" font-size: 12px; margin-bottom: 15px;"> Sumbatan Total
							<br>
							<input type="checkbox" name="sumbatan" value="sebagian"> Sumbatan Sebagian
						</td>
						<td width="18%" style=" font-size: 12px; padding-left: 30px; background-color: #F25E4C; color: white;">
							<input type="checkbox" name="sumbatan" value="total" style=" font-size: 12px; margin-bottom: 15px;"> Paten
						</td>
						<td width="18%" style=" font-size: 12px; padding-left: 30px; background-color: yellow; color: black;">
							<input type="checkbox" name="sumbatan" value="total" style=" font-size: 12px; margin-bottom: 15px;"> Paten
						</td>
						<td width="18%" style=" font-size: 12px; padding-left: 30px; background-color: yellow; color: black;">
							<input type="checkbox" name="sumbatan" value="total" style=" font-size: 12px; margin-bottom: 15px;"> Paten
						</td>
						<td width="18%" style=" font-size: 12px; padding-left: 30px; background-color: green; color: white;">
							<input type="checkbox" name="sumbatan" value="total" style=" font-size: 12px; margin-bottom: 15px;"> Paten
						</td>
					</tr>
					<tr>
						<td width="10%" style=" font-size: 12px; padding-left: 15px; background-color: #CFD1CF; height:90px;">BREATHING</td>
						<td width="18%" style=" font-size: 12px; padding-left: 30px; background-color: #F25E4C; color: white; margin-top: 15px;">Distres Pernapasan Berat<br>
							<input type="checkbox" name="sumbatan" value="total" style=" font-size: 12px; margin-bottom: 10px; margin-top: 10px"> Sumbatan Total
							<br>
							<input type="checkbox" name="sumbatan" value="sebagian"> Sumbatan Sebagian
						</td>
						<td width="18%" style=" font-size: 12px; padding-left: 30px; background-color: #F25E4C; color: white; margin-top: 15px;">Distres Pernapasan Sedang<br>
							<input type="checkbox" name="sumbatan" value="total" style=" font-size: 12px; margin-bottom: 10px; margin-top: 10px"> RR > 30x / menit
							<br>
							<input type="checkbox" name="sumbatan" value="sebagian"> Penggunaan otot bantu napas
						</td>

						<td width="18%" style=" font-size: 12px; padding-left: 30px; background-color: yellow; color: black; margin-top: 15px;">Distres Pernapasan Ringan<br>
							<input type="checkbox" name="sumbatan" value="total" style=" font-size: 12px; margin-bottom: 10px; margin-top: 10px"> RR > 30x / menit
						</td>
						<td width="18%" style=" font-size: 12px; padding-left: 30px; background-color: yellow; color: black; margin-top: 15px;">Tidak ada Distres Pernapasan<br>
							<input type="checkbox" name="sumbatan" value="total" style=" font-size: 12px; margin-bottom: 10px; margin-top: 10px"> RR > Normal
						</td>
						<td width="18%" style=" font-size: 12px; padding-left: 30px; background-color: green; color: white; margin-top: 15px;"><br>
							<input type="checkbox" name="sumbatan" value="total" style=" font-size: 12px; margin-bottom: 10px; margin-top: 10px"> RR > Normal
						</td>
						
					</tr>
					<tr>
						<td width="10%" style=" font-size: 12px; padding-left: 15px; background-color: #CFD1CF; height:90px;">CIRCULATION</td>
						<td width="18%" style=" font-size: 12px; padding-left: 30px; background-color: #F25E4C; color: white; margin-top: 15px;">Gangguan Hemodinamik Berat<br>
							<input type="checkbox" name="sumbatan" value="total" style=" font-size: 12px; margin-bottom: 10px; margin-top: 10px"> Nadi Tidak Teraba
							<br>
							<input type="checkbox" name="sumbatan" value="sebagian"> Pendarahan yang tidak terkontrol / pendarahan aktif
						</td>
						<td width="18%" style=" font-size: 12px; padding-left: 30px; background-color: #F25E4C; color: white; margin-top: 15px;">Gangguan Hemodinamik Sedang<br>
							<input type="checkbox" name="sumbatan" value="total" style=" font-size: 12px; margin-bottom: 10px; margin-top: 10px"> Nadi Tidak Teraba / Sangat Halus
							<br>
							<input type="checkbox" name="sumbatan" value="sebagian"> Pendarahan kapiler > 2 detik
						</td>

						<td width="18%" style=" font-size: 12px; padding-left: 30px; background-color: yellow; color: b;lack margin-top: 15px;">Gangguan Hemodinamik Ringan<br>
							<input type="checkbox" name="sumbatan" value="total" style=" font-size: 12px; margin-bottom: 10px; margin-top: 10px"> Nadi Teraba (Lemah - Kuat)
							<br>
							<input type="checkbox" name="sumbatan" value="sebagian"> Pendarahan kapiler < 2 detik
						</td>

						<td width="18%" style=" font-size: 12px; padding-left: 30px; background-color: yellow; color: black; margin-top: 15px;">Tidak ada gangguan Gangguan Hemodinamik<br>
							<input type="checkbox" name="sumbatan" value="total" style=" font-size: 12px; margin-bottom: 10px; margin-top: 10px"> Nadi Teraba
						</td>
						<td width="18%" style=" font-size: 12px; padding-left: 30px; background-color: green; color: white; margin-top: 15px;">Tidak ada gangguan Gangguan Hemodinamik<br>
							<input type="checkbox" name="sumbatan" value="total" style=" font-size: 12px; margin-bottom: 10px; margin-top: 10px"> Nadi Normal
						</td>
					</tr>
					<tr>
						<td width="10%" style=" font-size: 12px; padding-left: 15px; background-color: #CFD1CF; height:90px;">DISABILITY</td>
						<td width="18%" style=" font-size: 12px; padding-left: 30px; background-color: #F25E4C; color: white;">
							<input type="checkbox" name="sumbatan" value="total" style=" font-size: 12px; margin-bottom: 15px;"> GCS < 9
						</td>
						<td width="18%" style=" font-size: 12px; padding-left: 30px; background-color: #F25E4C; color: white;">
							<input type="checkbox" name="sumbatan" value="total" style=" font-size: 12px; margin-bottom: 15px;"> GCS 9 - 12
						</td>
						<td width="18%" style=" font-size: 12px; padding-left: 30px; background-color: yellow; color: black;">
							<input type="checkbox" name="sumbatan" value="total" style=" font-size: 12px; margin-bottom: 15px;"> GCS 12 - 14
						</td>
						<td width="18%" style=" font-size: 12px; padding-left: 30px; background-color: yellow; color: black;">
							<input type="checkbox" name="sumbatan" value="total" style=" font-size: 12px; margin-bottom: 15px;"> GCS 12 - 14
						</td>
						<td width="18%" style=" font-size: 12px; padding-left: 30px; background-color: green; color: white;">
							<input type="checkbox" name="sumbatan" value="total" style=" font-size: 12px; margin-bottom: 15px;"> GCS Normal
						</td>
					</tr>
					<tr>
						<td width="10%" style=" font-size: 12px; padding-left: 15px; background-color: #CFD1CF; height:90px;">CONTOH PASIEN</td>
						<td colspan="2" width="36%" style=" font-size: 12px; padding-left: 30px; background-color: #F25E4C; color: white;"> Syok, Gangguan pernapasan, cidera kepala dengan pupil anisokor<br>Gangguan jantung yang mengancam, luka bakar > 50% di daerah toraks</td>
						<td colspan="2" width="36%" style=" font-size: 12px; padding-left: 30px; background-color: yellow; color: black;"> Korban resiko syok, fraktur multiple, aktur femur, luka bakar</td>
						<td colspan="2" width="18%" style=" font-size: 12px; padding-left: 30px; background-color: green; color: white;"> Fraktur minor, luka minor <br>atau tanpa luka</td>

					</tr>
				</table>


				</div>
				<!-- ================== aesmen awal medis ====================== -->
				<div class="tab-pane fade" id="tabasesmenawalmedis" role="tabpanel" >
					aesmen awal medis
				</div>
				<div class="tab-pane fade" id="tabasesmenawalkeperawatan" role="tabpanel" >
					aesmen awal keperawatan
				</div>
				<div class="tab-pane fade" id="tabpersalinan" role="tabpanel" >
					persalinan
				</div>
				<div class="tab-pane fade" id="tabrekonsoliasiobat" role="tabpanel" >
					rekonsiliasi obat
				</div>
			</div>

		</div>
	</div>
</div>	

<script>

function kembaliKeRmeNew() {
	var url= "<?php echo site_url(); ?>/rme/rme_igd";
    window.location.href = url;
}

</script>