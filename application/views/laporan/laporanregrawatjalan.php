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
						<h4 class="mb-0">Laporan Register Pasien Rawat Jalan</h4>
					</div>
					<div class="card-body">
						<form target="_blank" action="<?php echo site_url(); ?>/urj/panggilcetak" method="post">
							<div class="row justify-content-center">
								<div class="col-md-3">
									<label class="col-form-label">Tanggal kunjungan :</label>
								</div>
								<div class="col-md-2">
									<div class="input-group  mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text bg-transparent border-right-0"><i class="icon-calendar"></i></span>
										</div>
										<input type="text" class="form-control pull-right" id="awal" name="tglmulai" required autocomplete='off'>
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
										<input type="text" class="form-control pull-right" id="akhir" name="tglakhir" require autocomplete='off'>
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
									<label class="col-form-label">User</label>
								</div>
								<div class="col-md-3">
									<div class="custom-control custom-radio custom-control-inline">
										<input type="radio" class="custom-control-input" name="user" value="semua" id="uncekuser" onclick="javascript:usercek();" checked>
										<label class="custom-control-label" for="uncekuser">Semua</label>
									</div>
									<div class="custom-control custom-radio custom-control-inline">
										<input type="radio" class="custom-control-input" name="user" value="pilih" id="cekuser" onclick="javascript:usercek();">
										<label class="custom-control-label" for="cekuser">Pilihan</label>
									</div>
								</div>
								<div class="col-md-3">
									<select class="form-control gol2" style="width: 100%;" id="useryes" disabled name="userpilih">
										<?php
										foreach ($user as $row) {
										?>
											<option value="<?php echo $row->nama; ?>"><?php echo $row->nama; ?></option>
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
											<input type="radio" class="custom-control-input" name="kunjungan" id="kunjungan0" value="0" checked>
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

								<div class="row justify-content-center mt-2">
									<div class="col-md-3">
										<label class="col-form-label">Diagnosa</label>
									</div>
									<div class="col-md-3">
										<div class="custom-control custom-radio custom-control-inline">
											<input type="radio" class="custom-control-input" name="diag" value="semua" id="uncekdiag" onclick="javascript:diagcek();" checked>
											<label class="custom-control-label" for="uncekdiag">Semua</label>
										</div>
										<div class="custom-control custom-radio custom-control-inline">
											<input type="radio" class="custom-control-input" name="diag" value="pilih" id="cekdiag" onclick="javascript:diagcek();">
											<label class="custom-control-label" for="cekdiag">Pilihan</label>
										</div>
									</div>
									<div class="col-md-3">
										<select class="form-control gol2" style="width: 100%;" id="diagyes" disabled name="diagpilih">
											<?php
											foreach ($diagnosa as $row) {
											?>
												<option value="<?php echo $row->icd_code; ?>"><?php echo $row->icd_code.' - '.$row->jenis_penyakit_local; ?></option>
											<?php
											}
											?>
										</select>
									</div>
								</div>

								<div class="row justify-content-center mt-2">
									<div class="col-md-3">
										<label class="col-form-label">Urut Berdasarkan</label>
									</div>
									<div class="col-md-3">
										<div class="custom-control custom-radio custom-control-inline">
											<input type="radio" class="custom-control-input" name="urut" value="semua" id="uncekurut" checked>
											<label class="custom-control-label" for="uncekurut">Tanggal</label>
										</div>
										<div class="custom-control custom-radio custom-control-inline">
											<input type="radio" class="custom-control-input" name="urut" value="pilih" id="cekurut">
											<label class="custom-control-label" for="cekurut">Diagnosa</label>
										</div>
									</div>
									<div class="col-md-3">
									</div>
								</div>

							<div class="row justify-content-center mt-5">
								<div class="col-md-3">
								</div>
								<div class="col-md-6">
									<input type="submit" name="cet" class="btn btn-primary mt-2" value="Cetak Daftar Pasien Rawat Jalan" />
									<input type="submit" name="cete" class="btn btn-primary mt-2" value="Excel" />
								</div>
							</div>
						</form>
					</div>

				</div>
			</div>
		</div>
	</div>
</main>

<!-- 
<script>
	function unitcek() {
		if (document.getElementById('cekunit').checked) {
			document.getElementById('unityes').disabled = false;
		} else 
		document.getElementById('unityes').disabled = true;
	}
	function golongancek() {
		if (document.getElementById('cekgolongan').checked) {
			document.getElementById('golonganyes').disabled = false;
		} else 
		document.getElementById('golonganyes').disabled = true;
	}
	
	function usercek() {
		if (document.getElementById('cekuser').checked) {
			document.getElementById('useryes').disabled = false;
		} else 
		document.getElementById('useryes').disabled = true;
	}
	
	function diagcek() {
		if (document.getElementById('cekdiag').checked) {
			document.getElementById('diagyes').disabled = false;
		} else 
		document.getElementById('diagyes').disabled = true;
	}
	
</script> -->
