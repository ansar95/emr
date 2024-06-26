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
						<h4 class="mb-0">Report Mutu Triwulan</h4>
					</div>
					<div class="card-body">
						<form target="_blank" action="" method="post">
							<div class="row">
								<div class="col-md-3">
									<label class="col-form-label">Tahun</label>
								</div>
								<div class="col-md-4">
									<div class="input-group  mb-3">
                                    <select class="form-control unit2 col-6" style="width: 100%;" name="tahun">
											<option value="">Tahun</option>
										</select>
									</div>
								</div>
								<!-- <div class="col-md-2 text-center">
									<label class="col-form-label">Periode</label>
								</div>
								<div class="col-md-4">
									<div class="input-group  mb-3">
                                    <select class="form-control unit2 col-6" style="width: 100%;" name="periodesemester">
											<option value="">Semester</option>
										</select>
									</div>
								</div> -->
							</div>
                            <div class="row ">
								<div class="col-md-3">
									<label class="col-form-label">Periode</label>
								</div>
								<div class="col-md-4">
									<div class="input-group  mb-3">
                                    <select class="form-control unit2 col-6" style="width: 100%;" name="triwulan">
											<option value="">Triwulan 1</option>
                                            <option value="">Triwulan 2</option>
                                            <option value="">Triwulan 3</option>
										</select>
									</div>
								</div>
								<!-- <div class="col-md-2 text-center">
									<label class="col-form-label">Periode</label>
								</div>
								<div class="col-md-4">
									<div class="input-group  mb-3">
                                    <select class="form-control unit2 col-6" style="width: 100%;" name="periodesemester">
											<option value="">Semester</option>
										</select>
									</div>
								</div> -->
							</div>
							<div class="row  mb-2">
								<div class="col-md-3">
									<label class="col-form-label">Unit</label>
								</div>

								<div class="col-md-6">
									<div class="custom-control custom-checkbox custom-control-inline col-12">
											<input type="checkbox"  class="custom-control-input" id="ranap" name="unit[]" value="ranap">
											<label class="custom-control-label checkbox-primary col-5" for="ranap">Rawat Inap</label> 
											<select class="form-control unit2 col-6" style="width: 100%;" name="unitpilih">
											<option value="">Unit</option>
										</select>
										<input type="text" id="kode" name="kode" class="ml-1 form-control pull-right col-3" autocomplete="off" disabled placeholder="KMB">  
									</div>
									<div class="custom-control custom-checkbox custom-control-inline col-12 mt-2">
											<input type="checkbox"  class="custom-control-input" id="ranap" name="unit[]" value="rajal">
											<label class="custom-control-label checkbox-primary col-5" for="rajal">Rawat Jalan</label> 
											<select class="form-control unit2 col-6" style="width: 100%;" name="unitpilih">
											<option value="">Unit</option>
										</select>                                      
									</div>
									<div class="custom-control custom-checkbox custom-control-inline col-12 mt-2">
											<input type="checkbox"  class="custom-control-input" id="ranap" name="unit[]" value="instalasi">
											<label class="custom-control-label checkbox-primary col-5" for="Instalasi">Instalasi</label> 
											<select class="form-control unit2 col-6" style="width: 100%;" name="instalasi">
											<option value="">Unit</option>
										</select>                                      
									</div>
									<div class="custom-control custom-checkbox custom-control-inline col-12 mt-2">
											<input type="checkbox"  class="custom-control-input" id="lainnya" name="unit[]" value="lainnya">
											<label class="custom-control-label checkbox-primary col-5" for="lainnya">Lainnya</label> 
											<select class="form-control unit2 col-6" style="width: 100%;" name="unitpilih">
											<option value="">Unit</option>
										</select>                                      
									</div>
								</div>
							</div>
							<div class="row  mb-2">
								<div class="col-md-3">
									<label class="col-form-label">Indikator</label>
								</div>

								<div class="col-md-6">
									<div class="custom-control custom-control-inline col-12">
											<select class="form-control unit2 col-6" style="width: 100%;" name="indikator">
											<option value="">indikator</option>
										</select>
										<input type="text" id="kodeInd" name="kodeind" class="ml-1 form-control pull-right col-3" autocomplete="off" disabled placeholder="I1K1">  
									</div>
								</div>
							</div>
							<!-- <div class="row justify-content-center mb-2">
								<div class="col-md-3">
									<label class="col-form-label">Nilai Standar</label>
								</div>

								<div class="col-md-6">
									<div class="custom-control custom-checkbox custom-control-inline col-12">
									<input type="text" id="nilai" name="nilai" class="mr-1 form-control pull-right col-3" autocomplete="off" >  
											<select class="form-control unit2 col-6" style="width: 100%;" name="standar">
											<option value="">persen</option>
										</select>
										
									</div>
								</div>
							</div>
							
							
							<div class="row justify-content-center">
								<div class="col-md-3">
									<label class="col-form-label">Numerator</label>
								</div>

								<div class="col-md-6">
									<input type="text" id="num" name="num" class="mr-1 form-control pull-right col-12" autocomplete="off" >  
									</div>
								</div>
							</div> -->
							<!-- <div class="row justify-content-center mb-2">
								<div class="col-md-3">
									<label class="col-form-label">Denumerator</label>
								</div>

								<div class="col-md-6">
									<input type="text" id="dem" name="dem" class="mr-1 form-control pull-right col-12" autocomplete="off" > 
								</div>
							</div> -->

							

							
							<div class="row  mb-4">
								
							<div class="col-md-3">
							</div>
								<div class="col-md-6">
									<button type="submit" name="cetak" class="btn btn-primary mt-2 w-75"><i class="fas fa-print"></i> Cetak</button>
								</div>
							</div>
						</form>
					</div>

				</div>
			</div>
		</div>
	</div>
</main>