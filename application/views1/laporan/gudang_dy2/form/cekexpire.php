<main>
	<div class="container-fluid site-width">
		<!-- START: Breadcrumbs-->
		<div class="row">
			<div class="col-12  align-self-center">
				<div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
				</ol>
			</div>
		</div>
	</div>

	<div class="row">
		<section class="content col-12">
			<div class="card">
				<div class="card-header with-border d-flex justify-content-between align-items-center">
					<h5 class="card-title">Cek Data Obat Expire</h5>
					<div class="card-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
						<i class="fa fa-minus"></i></button>
					</div>
				</div>
				<div class="card-body">
					
						<div class="card-body">
							<form target="_blank"  action="<?php echo site_url();?>/faktur/panggilcetakexpire" method="post"> 
								<table class="table table-borderless">
									<tr>
										<td width='10%'>Periode Expire</td>
										<td width='20%'>
											<div class="input-group date">
												<div class="input-group-prepend">
													<span class="input-group-text bg-transparent border-right-0"><i class="icon-calendar"></i></span>
												</div>
												<input type="text" id="awal" required name="awal" autocomplete='off' class="form-control pull-right">
											</div>
										</td>
										<td width='1%'>	
											s/d
										</td>
										<td width='20%'>	
											<div class="input-group date">
												<div class="input-group-prepend">
													<span class="input-group-text bg-transparent border-right-0"><i class="icon-calendar"></i></span>
												</div>
												<input type="text" id="akhir" required name="akhir" autocomplete='off' class="form-control pull-right">
											</div>
										</td>
										<td width='70%'></td>
									</tr>
									<input type="text" id="jenis" required name="jenis" value=<?php echo $pilihjenis;?> hidden>
								</table>
								<table class="table table-borderless">
									<tr>
										<td width='10%' valign="middle" >Cetakan</td>
										<td width="5%" valign="middle">
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" class="custom-control-input" name="cekprinter" value="1" id="cekprinter1" checked>
												<label class="custom-control-label" for="cekprinter1">LAYAR</label>
												
											</div>
											
										</td>
										<td width="5%" valign="middle">
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" class="custom-control-input" name="cekprinter" value="2" id="cekprinter2" >
												<label class="custom-control-label" for="cekprinter2">PDF</label>
												
											</div>
										</td>
										<td width="5%" valign="middle">
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" class="custom-control-input" name="cekprinter" value="3" id="cekprinter3" >
												<label class="custom-control-label" for="cekprinter3">XLS</label>
												
											</div>
										</td>
										<td width='75%'></td>
									</tr>
								</table>
								<table class="table table-borderless">
									<tr>
										<td width='9%'></td>
										<td width="20%">
											<div class="input-group col-sm-12">
												<button class="btn btn-sm btn-secondary" type="submit" name="cetposisi" value="Cetak">	<i class="fa fa-print"></i> &nbsp; Cetak</button>
											</div>
										</td>
										<td width='79%'></td>
									</tr>
								</table>
							</form>
						</div>
					
				</div>
			</div>
		</section>
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
