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
						<h4 class="mb-0">Posisi Stok Harian</h4>
					</div>
					<div class="card-body">
						<form target="_blank" action="<?php echo site_url(); ?>/faktur/cetakposisistok" method="post">
							<div class="row ">
								<div class="col-md-2">
									<label class="col-form-label">Tanggal</label>
								</div>
								<div class="col-md-2">
									<div class="input-group  mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text bg-transparent border-right-0"><i class="icon-calendar"></i></span>
										</div>
										<input type="text" class="form-control pull-right" id="awal" name="awal" autocomplete="off" required>
									</div>
								</div>
								<label class="col-form-label">s/d</label>
								<div class="col-md-2">
									<div class="input-group  mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text bg-transparent border-right-0"><i class="icon-calendar"></i></span>
										</div>
										<input type="text" class="form-control pull-right" id="akhir" name="akhir" autocomplete="off" required>
									</div>
								</div>
							</div>
							<div class="row  mb-2">
								<div class="col-md-2">
									<label class="col-form-label">Jenis</label>
								</div>
								<div class="col-md-6">
									<div class="custom-control custom-radio custom-control-inline">
										<input type="radio" class="custom-control-input" name="pilihjenis" value="1" id="pilihjenis1" checked>
										<label class="custom-control-label" for="pilihjenis1">Obat</label>
									</div>
									<div class="custom-control custom-radio custom-control-inline">
										<input type="radio" class="custom-control-input" name="pilihjenis" value="2" id="pilihjenis2">
										<label class="custom-control-label" for="pilihjenis2">BHP Medis</label>
									</div>
								</div>

							</div>
							<div class="row  mb-2">
								<div class="col-md-2">
									<label class="col-form-label">Filter</label>
								</div>
								<div class="col-md-2">
									<div class="custom-control custom-checkbox custom-control-inline">
										<input type="checkbox" class="custom-control-input" name="cekgen" id="cekgen" onclick="javascript:cekgenerik();">
										<label class="custom-control-label" for="cekgen">Generik</label>
									</div>
								</div>
								<div class="col-md-3">
									<select class="form-control unit2" style="width: 100%;" id="generik" name="generik" disabled>
										<?php
										foreach ($dtgen as $row) {
										?>
											<option value="<?php echo $row->jns; ?>"><?php echo $row->jns; ?></option>
										<?php
										}
										?>
									</select>
								</div>
							</div>
							<div class="row  mb-2">
								<div class="col-md-2">
									<label class="col-form-label"></label>
								</div>
								<div class="col-md-2">
									<div class="custom-control custom-checkbox custom-control-inline">
										<input type="checkbox" class="custom-control-input" name="cekgol" id="cekgol" onclick="javascript:cekgolongan();">
										<label class="custom-control-label" for="cekgol">Golongan</label>
									</div>
								</div>
								<div class="col-md-3">
									<select class="form-control unit2" style="width: 100%;" id="golongan" name="golongan" disabled>
										<?php
										foreach ($dtgol as $row) {
										?>
											<option value="<?php echo $row->jns; ?>"><?php echo $row->jns; ?></option>
										<?php
										}
										?>
									</select>
								</div>
							</div>
							<div class="row  mb-2">
								<div class="col-md-2">
									<label class="col-form-label"></label>
								</div>
								<div class="col-md-2">
									<div class="custom-control custom-checkbox custom-control-inline">
										<input type="checkbox" class="custom-control-input" name="cekklas" id="cekklas" onclick="javascript:cekklasifikasi();">
										<label class="custom-control-label" for="cekklas">Klasifikasi</label>
									</div>
								</div>
								<div class="col-md-3">
									<select class="form-control unit2" style="width: 100%;" id="klasifikasi" name="klasifikasi" disabled>
										<?php
										foreach ($dtkla as $row) {
										?>
											<option value="<?php echo $row->jns; ?>"><?php echo $row->jns; ?></option>
										<?php
										}
										?>
									</select>
								</div>
							</div>
							<div class="row  mb-2">
								<div class="col-md-2">
									<label class="col-form-label">Cetakan</label>
								</div>
								<div class="col-md-5">
									<div class="custom-control custom-checkbox custom-control-inline">
										<input type="checkbox" class="custom-control-input" name="cekprinter" id="cekprinter">
										<label class="custom-control-label" for="cekprinter">Printer</label>
									</div>
								</div>
							</div>

							<div class="row mb-2">
								<div class="col-md-2">
								</div>
								<div class="col-md-6">
									<button type="submit" name="cetposisiada" class="btn btn-primary"><i class="fas fa-print"></i> Posisi Stok Ada Nilainya</button>
									<button type="submit" name="cetposisi" class="btn btn-primary"><i class="fas fa-print"></i> Posisi Stok</button> 
								</div>
							</div>

						</form>
					</div>

				</div>
			</div>
		</div>
	</div>
</main>

<script>
	function cekgenerik() {
		if (document.getElementById('cekgen').checked) {
			document.getElementById('generik').disabled = false;
		} else
			document.getElementById('generik').disabled = true;
		document.getElementById('generik').value = "";
	}

	function cekgolongan() {
		if (document.getElementById('cekgol').checked) {
			document.getElementById('golongan').disabled = false;
		} else
			document.getElementById('golongan').disabled = true;
		document.getElementById('golongan').value = "";
	}

	function cekklasifikasi() {
		if (document.getElementById('cekklas').checked) {
			document.getElementById('klasifikasi').disabled = false;
		} else
			document.getElementById('klasifikasi').disabled = true;
		document.getElementById('klasifikasi').value = "";
	}
</script>