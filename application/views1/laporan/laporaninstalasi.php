<!-- START: Card Data-->
<main>
	<div class="container-fluid site-width">
		<!-- START: Breadcrumbs-->
		<div class="row ">
			<div class="col-12  align-self-center">
				<div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
					</ol>
				</div>
			</div>
		</div>
		<!-- END: Breadcrumbs-->
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header d-flex justify-content-between align-items-center">
						<h4 class="mb-0">Pasien Instalasi <?php echo $kode; ?></h4>
					</div>
					<div class="card-body">
						<form target="_blank" action="<?php echo site_url(); ?>/<?php echo $tujuan; ?>/panggilcetak" method="post">
							<div class="row justify-content-center">
								<div class="col-md-3">
									<label class="col-form-label">Periode Kunjungan:</label>
								</div>
								<div class="col-md-2">
									<div class="input-group  mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text bg-transparent border-right-0"><i class="icon-calendar"></i></span>
										</div>
										<input type="text" class="form-control pull-right" id="awal" name="tglmulai" required>
									</div>
								</div>
								<div class="col-md-2 text-center">
									<label class="col-form-label">s/d</label>
								</div>
								<div class="col-md-2">
									<div class="input-group  mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text bg-transparent border-right-0"><i class="icon-calendar"></i></span>
										</div>
										<input type="text" class="form-control pull-right" id="akhir" name="tglakhir" required>
									</div>
								</div>
							</div>
							<div class="row justify-content-center mb-2">
								<div class="col-md-3">
									<label class="col-form-label">Unit</label>
								</div>
								<div class="col-md-6">
									<select class="form-control unit2" style="width: 100%;" name="unitpilih">
										<option value="<?php echo $unit->kode_unit; ?>" selected><?php echo $unit->nama_unit; ?></option>
									</select>
								</div>
							</div>
							<div class="row justify-content-center mb-2">
								<div class="col-md-3">
									<label class="col-form-label">Golongan</label>
								</div>
								<div class="col-md-3">
									<div class="custom-control custom-radio custom-control-inline">
										<input type="radio" class="custom-control-input" name="golongan" value="semua" id="uncekgolongan" onclick="javascript:golongancek();" checked>
										<label class="custom-control-label" for="uncekgolongan">Semua</label>
									</div>
									<div class="custom-control custom-radio custom-control-inline">
										<input type="radio" class="custom-control-input" name="golongan" value="pilih" id="cekgolongan" onclick="javascript:golongancek();">
										<label class="custom-control-label" for="cekgolongan">Pilihan</label>
									</div>
								</div>
								<div class="col-md-3">
									<select class="form-control gol2" style="width: 100%;" id="golonganyes" disabled name="golpilih">
										<?php
										foreach ($golongan as $row) {
										?>
											<option value="<?php echo $row->golongan; ?>"><?php echo $row->golongan; ?></option>
										<?php
										}
										?>
									</select>
								</div>
							</div>
							<div class="row justify-content-center mb-2">
								<div class="col-md-3">
									<label class="col-form-label">Rujukan</label>
								</div>
								<div class="col-md-3">
									<div class="custom-control custom-radio custom-control-inline">
										<input type="radio" class="custom-control-input" name="rujuk" value="semua" id="uncekrujuk" onclick="javascript:rujukcek();" checked>
										<label class="custom-control-label" for="uncekrujuk">Semua</label>
									</div>
									<div class="custom-control custom-radio custom-control-inline">
										<input type="radio" class="custom-control-input" name="rujuk" value="pilih" id="cekrujuk" onclick="javascript:rujukcek();">
										<label class="custom-control-label" for="cekrujuk">Pilihan</label>
									</div>
								</div>
								<div class="col-md-3">
									<select class="form-control rujuk2" style="width: 100%;" id="rujukyes" disabled name="rujukpilih">
										<?php
										foreach ($unitrujukan as $row) {
										?>
											<option value="<?php echo $row->rujukan; ?>"><?php echo $row->rujukan; ?></option>
										<?php
										}
										?>
									</select>
								</div>
							</div>
							<div class="row justify-content-center">
								<div class="col-md-3">
								</div>
								<div class="col-md-6">
									<!-- <button type="submit" name="ctindakan" class="btn btn-primary mt-2 w-75"><i class="fas fa-print"></i> Cetak Daftar Tindakan per Pasien</button> -->
									<input type="submit" name="ctindakan" class="btn btn-primary mt-2 w-75" value="Cetak Daftar Tindakan per Pasien" />
									<!-- <input type="submit" name="cet" class="btn btn-primary mt-2" value="Cetak Daftar Pasien Rawat Inap" /> -->
									<input type="submit" name="ctindakanexcel" class="btn btn-primary mt-2" value=" Excel">
								</div>
							</div>
							<div class="row justify-content-center">
								<div class="col-md-3">
								</div>
								<div class="col-md-6">
									<input type="submit" name="cetrekap" class="btn btn-primary mt-2 w-75" value=" Cetak Rekapitulasi Tindakan">
									<input type="submit" name="cetrekapexcel" class="btn btn-primary mt-2" value=" Excel">
								</div>
							</div>
							<div class="row justify-content-center">
								<div class="col-md-3">
								</div>
								<div class="col-md-6">
									<input type="submit" name="cetkunjung" class="btn btn-primary mt-2 w-75" value=" Cetak Rekapitulasi Kunjungan Pasien">
									<input type="submit" name="cetkunjungexcel" class="btn btn-primary mt-2" value=" Excel">
								</div>
							</div>
							<div class="row justify-content-center">
								<div class="col-md-3">
								</div>
								<div class="col-md-6">
									<input type="submit" name="cetpemeriksa" class="btn btn-primary mt-2 w-75" value=" Cetak Daftar Pemeriksa">
									<input type="submit" name="cetpemeriksaexcel" class="btn btn-primary mt-2" value=" Excel">
								</div>
							</div>
							<div class="row justify-content-center mb-4">
								<div class="col-md-3">
								</div>
								<div class="col-md-6">
									<input type="submit" name="cetpengirim" class="btn btn-primary mt-2 w-75" value=" Cetak Dokter Pengirim">
									<input type="submit" name="cetpengirimexcel" class="btn btn-primary mt-2" value=" Excel">
								</div>
							</div>
						</form>
					</div>

				</div>
			</div>
		</div>
	</div>
</main>