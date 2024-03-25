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
						<h4 class="mb-0">Laporan BRM Rawat Inap</h4>
					</div>
					<div class="card-body">
                            <form target="_blank" action="<?php echo site_url();?>/rm/brminap" method="post">
							<div class="row justify-content-start">
								<div class="col-md-4 col-12">
									<label class="col-form-label">Periode</label>
									<div class="input-group  mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text bg-transparent border-right-0"><i class="icon-calendar"></i></span>
										</div>
                                            <input id="period" type="text" name="period" class="form-control" required autocomplete="off">
									</div>
								</div>
							</div>
							<div class="row justify-content-start">
								<div class="col-md-5 col-12">
									<input type="submit" name="rp" class="btn btn-primary mt-2" value="Analisa BRM Berdasarkan Ruang Perawatan"/>
									<input type="submit" name="dpjp" class="btn btn-primary mt-2" value="Analisa BRM Berdasarkan DPJP"/>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
