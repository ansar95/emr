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
						<h4 class="mb-0">Laporan Pelayanan Depo / Apotik</h4>
					</div>
					<div class="card-body">
						<form target="_blank" action="<?php echo site_url(); ?>/depoapotik/panggilcetak" method="post">
							<div class="row ">
								<div class="col-md-2">
									<label class="col-form-label">Tanggal Resep</label>
								</div>
								<div class="col-md-6">
									<div class="input-group  mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text bg-transparent border-right-0"><i class="icon-calendar"></i></span>
										</div>
										<input type="text" id="awal" class="form-control" required name="awal" autocomplete='off'>

									</div>
								</div>
							</div>
							<div class="row  mb-2">
								<div class="col-md-2">
									<label class="col-form-label">Depo/Apotik</label>
								</div>
								<div class="col-md-3">
									<div class="custom-control custom-radio custom-control-inline">
										<input type="radio" class="custom-control-input" name="unit" value="1" id="uncekunit" onclick="javascript:unitcek();" checked>
										<label class="custom-control-label" for="uncekunit">Semua</label>
									</div>
									<div class="custom-control custom-radio custom-control-inline">
										<input type="radio" name="unit" class="custom-control-input" value="2" id="cekunit" onclick="javascript:unitcek();">
										<label class="custom-control-label" for="cekunit">Pilihan</label>
									</div>
								</div>
								<div class="col-md-3">
									<select class="form-control unit2" style="width: 100%;" id="depo" name="depo" disabled>
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
								<div class="col-md-3">
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
							<div class="row  mb-2">
								<div class="col-md-2">
									<label class="col-form-label">Golongan</label>
								</div>
								<div class="col-md-3">
									<div class="custom-control custom-radio custom-control-inline">
										<input type="radio" class="custom-control-input" name="cekgolongan" value="1" id="uncekgolongan" onclick="javascript:golongancek();" checked>
										<label class="custom-control-label" for="uncekgolongan">Semua</label>
									</div>
									<div class="custom-control custom-radio custom-control-inline">
										<input type="radio" class="custom-control-input" name="cekgolongan" value="2" id="cekgolongan" onclick="javascript:golongancek();">
										<label class="custom-control-label" for="cekgolongan">Pilihan</label>
									</div>
								</div>
								<div class="col-md-3">
									<select class="form-control gol2" style="width: 100%;" id="golongan" name="golongan" disabled>
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
							<div class="row ">
								<div class="col-md-2">
								</div>
								<div class="col-md-6">
									<button type="submit" name="cet" class="btn btn-primary mt-2"><i class="fas fa-print"></i> Cetak Daftar Pasien Rawat Inap</button>
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
</script>