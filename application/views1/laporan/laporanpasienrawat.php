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
						<h4 class="mb-0">Pasien Sementara Dirawat</h4>
					</div>
					<div class="card-body">
						<form target="_blank" action="<?php echo site_url(); ?>/laporanpasien/panggilcetakdirawat" method="post">
							<div class="row mb-2">
								<div class="col-md-1">
									<label class="col-form-label">Unit</label>
								</div>
								<div class="col-md-2">
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
							<div class="row mb-2">
								<div class="col-md-1">
									<label class="col-form-label">Golongan</label>
								</div>
								<div class="col-md-2">
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
							<div class="row">
								<div class="col-md-1">
								</div>
								<div class="col-md-2">
									<input type="submit" name="cpasien" class="btn btn-primary mt-2" value="Cetak" />
									<input type="submit" name="cpasienexcel" class="btn btn-primary mt-2" value="Excel" />
									<!-- <button type="submit" name="cpasien" class="btn btn-primary mt-2"><i class="fas fa-print"></i> Cetak Daftar Pasien</button>
									<button type="submit" name="cpasienexcel" class="btn btn-primary mt-2"><i class="far fa-file-excel"></i> Excel</button> -->
								</div>
							</div>
						</form>
					</div>

				</div>
			</div>
		</div>
	</div>
</main>