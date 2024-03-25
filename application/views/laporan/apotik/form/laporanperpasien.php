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
						<h4 class="mb-0">Laporan Resep Pasien</h4>
					</div>
					<div class="card-body">
						<form target="_blank" action="<?php echo site_url(); ?>/depoapotik/panggilcetakperpasien" method="post">
							<div class="row ">
								<div class="col-md-2">
									<label class="col-form-label">No. RM</label>
								</div>
								<div class="col-md-2">
									<div class="input-group  mb-3">
										<input type="text" class="form-control" id="norm" name="norm" oninput="carinamapasien()" maxlength="6" autocomplete="off" />
									</div>
								</div>
								<div class="col-md-4">
									<div class="input-group  mb-3">
									<input type="hidden" class="form-control" id="nama" name="nama" />
										<!-- <input type="text" class="form-control" id="norm" name="norm" oninput="carinamapasien()" maxlength="6" autocomplete="off" /> -->
									</div>
								</div>
							</div>
							<div class="row mb-2">
								<div class="col-md-2">
									<label class="col-form-label">Tanggal Masuk</label>
								</div>
								<div class="col-md-6">
									<div class="input-group  ">
										<div class="input-group-prepend">
											<span class="input-group-text bg-transparent border-right-0"><i class="icon-calendar"></i></span>
										</div>
											<input type="text" class="form-control" id="awal" required name="awal" autocomplete='off' onchange="javascript:isitglawal();">
									</div>
								</div>
							</div>
							<div class="row  mb-2">
								<div class="col-md-2">
									<label class="col-form-label">Perawatan</label>
								</div>
								<div class="col-md-7">
									<div class="custom-control custom-radio custom-control-inline">
										<input type="radio" class="custom-control-input" name="cekperawatan" value="1" id="rawatinap" checked>
										<label class="custom-control-label" for="rawatinap">Rawat Inap</label>
									</div>
									<div class="custom-control custom-radio custom-control-inline">
										<input type="radio" name="cekperawatan" class="custom-control-input" value="2" id="rawatjalan">
										<label class="custom-control-label" for="rawatjalan">Rawat Jalan</label>
									</div>
									<div class="custom-control custom-radio custom-control-inline">
										<input type="radio" name="cekperawatan" class="custom-control-input" value="3" id="igd">
										<label class="custom-control-label" for="igd">IGD</label>
									</div>
								</div>
							</div>
							<div class="row mb-2">
								<div class="col-md-2">
									<label class="col-form-label">Tanggal Resep</label>
								</div>
								<div class="col-md-3">
									<div class="custom-control custom-radio custom-control-inline">
										<input type="radio" class="custom-control-input" name="cektgl" value="1" id="uncektgl" onclick="javascript:tglcek();" checked>
										<label class="custom-control-label" for="uncektgl">Semua</label>
									</div>
									<div class="custom-control custom-radio custom-control-inline">
										<input type="radio" name="cektgl" class="custom-control-input" value="2" id="cektgl" onclick="javascript:tglcek();">
										<label class="custom-control-label" for="cektgl">Pilih tanggal</label>
									</div>
								</div>
								<div class="col-md-2">
									<div class="input-group  ">
										<div class="input-group-prepend">
											<span class="input-group-text bg-transparent border-right-0"><i class="icon-calendar"></i></span>
										</div>
											<input type="text" class="form-control" id="resepawal" required name="resepawal" autocomplete='off' disabled>
									</div>
								</div>
								<label class="col-form-label text-center">s/d</label>
								<div class="col-md-2">
									<div class="input-group  ">
										<div class="input-group-prepend">
											<span class="input-group-text bg-transparent border-right-0"><i class="icon-calendar"></i></span>
										</div>
											<input type="text" class="form-control" id="resepakhir" required name="resepakhir" autocomplete='off' disabled>
									</div>
								</div>
							</div>
							<div class="row  mb-2">
								<div class="col-md-2">
									<label class="col-form-label">Asal Resep</label>
								</div>
								<div class="col-md-3">
									<div class="custom-control custom-radio custom-control-inline">
										<input type="radio" class="custom-control-input" name="cekunitasal" value="1" id="uncekunitasal" onclick="javascript:unitasalcek();" checked>
										<label class="custom-control-label" for="uncekunitasal">Semua</label>
									</div>
									<div class="custom-control custom-radio custom-control-inline">
										<input type="radio" name="cekunitasal" class="custom-control-input" value="2" id="cekunitasal" onclick="javascript:unitasalcek();">
										<label class="custom-control-label" for="cekunitasal">Pilihan</label>
									</div>
								</div>
								<div class="col-md-4">
								<select class="form-control unit2" style="width: 100%;" id="unitasal" name="unitasal" disabled>
											<?php
											foreach ($dtruangan as $row) {
											?>
												<option value="<?php echo $row->kode_unit; ?>"><?php echo $row->nama_unit; ?></option>
											<?php
											}
											?>
										</select>
								</div>
							</div>
							<!-- <div class="row  mb-2">
								<div class="col-md-2">
									<label class="col-form-label">Pendanaan</label>
								</div>
								<div class="col-md-3">
									<div class="custom-control custom-radio custom-control-inline">
										<input type="radio" class="custom-control-input" name="cekpendanaan" value="1" id="uncekpendanaan" onclick="javascript:pendanaancek();" checked>
										<label class="custom-control-label" for="uncekpendanaan">Semua</label>
									</div>
									<div class="custom-control custom-radio custom-control-inline">
										<input type="radio" name="cekpendanaan" class="custom-control-input" value="2" id="cekpendanaan" onclick="javascript:pendanaancek();">
										<label class="custom-control-label" for="cekpendanaan">Pilihan</label>
									</div>
								</div>
								<div class="col-md-4">
									<select class="form-control pendanaan2" style="width: 100%;" id="pendanaan" name="pendanaan" disabled>
										<?php
										foreach ($dtpendanaan as $row) {
										?>
											<option value="<?php echo $row->pendanaan; ?>"><?php echo $row->pendanaan; ?></option>
										<?php
										}
										?>
									</select>
								</div>
							</div> -->
							<div class="row mb-2">
								<div class="col-md-2">
									<label class="col-form-label">Tanggal Cetak</label>
								</div>
								<div class="col-md-7">
									<div class="input-group  ">
										<div class="input-group-prepend">
											<span class="input-group-text bg-transparent border-right-0"><i class="icon-calendar"></i></span>
										</div>
											<input type="text" class="form-control" id="tglcetak" required name="tglcetak" autocomplete='off'>
									</div>
								</div>
							</div>
							<div class="row mb-2">
								<div class="col-md-2">
									<label class="col-form-label">Tanda Tangan</label>
								</div>
								<div class="col-md-7">
								<select class="form-control pendanaan2" style="width: 100%;" id="ttd" name="ttd">
											<?php
											foreach ($dttandatangan as $row) {
											?>
												<option value="<?php echo $row->kode_dokter; ?>"><?php echo $row->nama_dokter; ?></option>
											<?php
											}
											?>
										</select>
								</div>
							</div>
							<div class="row ">
								<div class="col-md-2">
								</div>
								<div class="col-md-7">
									<button type="submit" name="cet" class="btn btn-primary mt-2"><i class="fas fa-print"></i> Cetak</button>
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

<script>
	function unitcek() {
		if (document.getElementById('cekunit').checked) {
			document.getElementById('depo').disabled = false;
		} else
			document.getElementById('depo').disabled = true;
	}

	function tglcek() {
		if (document.getElementById('cektgl').checked) {
			document.getElementById('resepawal').disabled = false;
			document.getElementById('resepakhir').disabled = false;
		} else {
			document.getElementById('resepawal').disabled = true;
			document.getElementById('resepakhir').disabled = true;
		}
	}

	function golongancek() {
		if (document.getElementById('cekgolongan').checked) {
			document.getElementById('golongan').disabled = false;
		} else
			document.getElementById('golongan').disabled = true;
	}

	function pendanaancek() {
		if (document.getElementById('cekpendanaan').checked) {
			document.getElementById('pendanaan').disabled = false;
		} else
			document.getElementById('pendanaan').disabled = true;
	}

	function pasiencek() {
		if (document.getElementById('cekpasien').checked) {
			document.getElementById('norm').disabled = false;
		} else {
			document.getElementById('norm').disabled = true;
			$("#nama").val("");
			$("#norm").val("");
		}
	}

	function unitasalcek() {
		if (document.getElementById('cekunitasal').checked) {
			document.getElementById('unitasal').disabled = false;
		} else
			document.getElementById('unitasal').disabled = true;
	}

	function isitglawal() {
		document.getElementById('resepawal').value = document.getElementById('awal').value;
	}
</script>