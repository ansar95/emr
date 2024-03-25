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
					<div class="card-header d-flex">
						<h4 class="mb-0">Laporan Ampra</h4>
					</div>
					<div class="card-body">
						<form target="_blank" action="<?php echo site_url(); ?>/fakturpelayanan/panggilcetak" method="post">
							<div class="row">
								<div class="col-md-3">
									<label class="col-form-label">Tanggal</label>
								</div>
								<div class="col-md-2">
									<div class="input-group  mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text bg-transparent border-right-0"><i class="icon-calendar"></i></span>
										</div>
										<input type="text" id="awal" class="form-control" required name="awal" autocomplete='off'>
									</div>
								</div>
								<div class="col-md-1 text-center">
									<label class="col-form-label">s/d</label>
								</div>
								<div class="col-md-2">
									<div class="input-group  mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text bg-transparent border-right-0"><i class="icon-calendar"></i></span>
										</div>
										<input type="text" class="form-control pull-right" id="akhir" name="akhir" require autocomplete='off'>
									</div>
								</div>
							</div>
							<div class="row mb-2">
								<div class="col-md-3">
									<label class="col-form-label">Jenis</label>
								</div>
								<div class="col-md-3">
									<div class="custom-control custom-radio custom-control-inline">
										<input type="radio" class="custom-control-input" name="pilihjenis" value="1" id="pilihjenis1" onclick="javascript:unitcek();" checked>
										<label class="custom-control-label" for="pilihjenis1">Obat</label>
									</div>
									<div class="custom-control custom-radio custom-control-inline">
										<input type="radio" name="pilihjenis" class="custom-control-input" value="2" id="pilihjenis2" onclick="javascript:unitcek();">
										<label class="custom-control-label" for="pilihjenis2">BHP Medis</label>
									</div>
								</div>
							</div>
							<div class="row mb-2">
								<div class="col-md-3">
									<label class="col-form-label">Unit</label>
								</div>
								<div class="col-md-3">
									<div class="custom-control custom-radio custom-control-inline">
										<input type="radio" class="custom-control-input" name="namecekpbf" value="1" id="uncekpbf" onclick="javascript:unitcek();" checked>
										<label class="custom-control-label" for="uncekpbf">Semua</label>
									</div>
									<div class="custom-control custom-radio custom-control-inline">
										<input type="radio" name="namecekpbf" class="custom-control-input" value="2" id="cekpbf" onclick="javascript:unitcek();">
										<label class="custom-control-label" for="cekpbf">Pilihan</label>
									</div>
								</div>
								<div class="col-md-3">
									<select class="form-control unit2" style="width: 100%;" id="vendor" name="vendor" disabled>
										<?php
										foreach ($dtunit as $row) {
										?>
											<option value="<?php echo $row->kode_unit; ?>"><?php echo $row->nama_unit; ?></option>
										<?php
										}
										?>
									</select>
								</div>
							</div>
							<div class="row">
								<div class="col-md-3">
								</div>
								<div class="col-md-6">
									<button type="submit" name="cet" class="btn btn-primary mt-2"><i class="fas fa-print"></i> Cetak</button>
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
	function unitcek() {
		if (document.getElementById('cekpbf').checked) {
			document.getElementById('vendor').disabled = false;
		} else
			document.getElementById('vendor').disabled = true;
	}
</script>