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
						<h4 class="mb-0">Laporan Pasien Keluar</h4>
					</div>
					<div class="card-body">
						<form target="_blank" action="<?php echo site_url(); ?>/laporanpasien/panggilcetakpasienkeluar" method="post">
							<div class="row justify-content-center">
								<div class="col-md-3">
									<label class="col-form-label">Tanggal keluar yang akan dicetak:</label>
								</div>
								<div class="col-md-2">
									<div class="input-group  mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text bg-transparent border-right-0"><i class="icon-calendar"></i></span>
										</div>
										<input type="text" class="form-control pull-right" id="awal" required name="tglmulai" autocomplete='off'>

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
										<input type="text" class="form-control pull-right" id="akhir" required name="tglakhir" autocomplete='off'>

									</div>
								</div>
							</div>
							<div class="row justify-content-center mb-2">
								<div class="col-md-3">
									<label class="col-form-label">Unit</label>
								</div>
								<div class="col-md-3">
									<div class="custom-control custom-radio custom-control-inline">
										<input type="radio" class="custom-control-input" name="unit" value="semua" id="uncekunit" onclick="javascript:unitcek();" checked>
										<label class="custom-control-label" for="uncekunit">Semua</label>
									</div>
									<div class="custom-control custom-radio custom-control-inline">
										<input type="radio" name="unit" class="custom-control-input" value="pilih" id="cekunit" onclick="javascript:unitcek();">
										<label class="custom-control-label" for="cekunit">Pilihan</label>
									</div>
								</div>
								<div class="col-md-3">
									<select class="form-control unit2" style="width: 100%;" id="unityes" disabled name="unitpilih">
										<?php
										foreach ($unit as $row) {
										?>
											<option value="<?php echo $row->kode_unit; ?>"><?php echo $row->nama_unit; ?></option>
										<?php
										}
										?>
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
									<label class="col-form-label">Kondisi Saat Keluar</label>
								</div>
								<div class="col-md-3">
									<div class="custom-control custom-radio custom-control-inline">
										<input type="radio" class="custom-control-input" name="kond" value="semua" id="uncekkond" onclick="javascript:kondcek();" checked>
										<label class="custom-control-label" for="uncekkond">Semua</label>
									</div>
									<div class="custom-control custom-radio custom-control-inline">
										<input type="radio" class="custom-control-input" name="kond" value="pilih" id="cekkond" onclick="javascript:kondcek();"> 
										<input type="radio" class="custom-control-input" name="golongan" value="pilih" id="cekgolongan" onclick="javascript:golongancek();">
										<label class="custom-control-label" for="cekkond">Pilihan</label>
									</div>
								</div>
								<div class="col-md-3">
									<select class="form-control kond2" style="width: 100%;" id="kondyes" disabled name="kondpilih">
										<?php
										foreach ($kondisi as $row) {
										?>
											<option value="<?php echo $row->kondisi; ?>"><?php echo $row->kondisi; ?></option>
										<?php
										}
										?>
									</select>
								</div>
							</div>
							<div class="row justify-content-center">
								<div class="col-md-3">
									<label class="col-form-label">Kunjungan Pasien</label>
								</div>
								<div class="col-md-3">
									<div class="form-row pl-1">
										<div class="custom-control custom-radio custom-control-inline mb-2 ">
											<input type="radio" class="custom-control-input" name="kunjungan" id="kunjungan0" value="0"" checked>
										<label class=" custom-control-label" for="kunjungan0">Pasien Lama</label>
										</div>
									</div>
									<div class="form-row pl-1">
										<div class="custom-control custom-radio custom-control-inline mb-2">
											<input type="radio" class="custom-control-input" name="kunjungan" id="kunjungan1" value="1" checked>
											<label class="custom-control-label" for="kunjungan1">Pasien Baru</label>
										</div>
									</div>
									<div class="form-row pl-1">
										<div class="custom-control custom-radio custom-control-inline mb-2">
											<input type="radio" class="custom-control-input" name="kunjungan" id="kunjungan2" value="2" checked>
											<label class="custom-control-label" for="kunjungan2">Semua Pasien</label>
										</div>
									</div>
								</div>
								<div class="col-md-3"></div>

							</div>
							<div class="row justify-content-center">
								<div class="col-md-3">
								</div>
								<div class="col-md-6">
									<button type="submit" name="cpasien" class="btn btn-primary mt-2"><i class="fas fa-print"></i> Cetak Daftar Pasien</button>
									<button type="submit" name="cpasienexcel" class="btn btn-primary mt-2"><i class="far fa-file-excel"></i> Excel</button>
								</div>
							</div>
							<div class="row justify-content-center">
								<div class="col-md-3">
								</div>
								<div class="col-md-6">
									<button type="submit" name="cruang" class="btn btn-primary mt-2"><i class="fas fa-print"></i> Cetak Daftar Pasien Keluar per Ruangan</button>
									<button type="submit" name="cruangexcel" class="btn btn-primary mt-2"><i class="far fa-file-excel"></i> Excel</button>
								</div>
							</div>
						</form>
					</div>

				</div>
			</div>
		</div>
	</div>
	</div>

</main>
