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
	<!-- END: Breadcrumbs-->
	<div class="row">
		<section class="content col-12">
			<div class="card">
				<div class="card-header with-border d-flex justify-content-between align-items-center">
					<h6 class="box-title">Laporan Permintaan Makanan Pasien</h6>
				</div>
				<div class="card-body">
					<div class="card-body">
						<form target="_blank" action="<?php echo site_url();?>/gizi/cetaklaporanpermintaan" method="post"> 
							<div class="form-group row col-spacing-row">
								<label class="col-sm-2 control-label">Tanggal</label>
								<div class="  col-sm-2 ">
									
										<!-- <div class="input-group-addon btn col-1">
											<i class="fa fa-calendar text-center btn btn-dark"></i>
										</div> -->
										<!-- <i class=" input-group-addon fa fa-calendar text-center bg-dark col-2"></i> --><input type="text" class="form-control col-9 pull-right" id="tgl" required name="tgl" autocomplete='off'>
									
								</div>
							</div>
							<div class="form-group row col-spacing-row">
								<label class="col-sm-2 control-label">Unit Perawatan</label>
								<div class="col-sm-4">
									<select class="form-control" style="width: 100%;" name="ruang" id="ruang">
										<?php
										foreach($ruang as $row) {
											?>
											<option value="<?php echo $row->kode_unit; ?>"><?php echo $row->nama_unit; ?></option>
											<?php
										}
										?>
									</select>
								</div>
							</div>
							<div class="form-group row col-spacing-row">
								<label class="col-sm-2 control-label">Waktu</label>
								<div class="col-sm-2">
									<select class="form-control" style="width: 100%;" name="waktu" id="waktu">
										<option value="PAGI">PAGI</option>
										<option value="SIANG">SIANG</option>
										<option value="MALAM">MALAM</option>
									</select>
								</div>
							</div>
							<div class="form-group row col-spacing-row">
								<div class="col-sm-2"></div>
								<!-- <input class="btn-sm btn-block" type="submit" name="cet" value="Cetak">	 -->
								<div class="col-sm-5">
									<button class='text-center btn btn-sm btn-dark col-sm-3 pull-left' type='submit'  name="cet" id="cet" value="Cetak"> <i class='fa fa-print'></i>&nbsp;  CETAK</button>					
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</section>
	</div>

</main>
