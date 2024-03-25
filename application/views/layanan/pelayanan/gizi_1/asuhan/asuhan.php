<div class="content-wrapper">
	<section class="content">
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">Asuhan Gizi</h3>
			</div>
			<div class="box-body">
				<div class="row">
                    <div class="form-horizontal">
                        <div class="col-sm-12">
							<div class="col-sm-6">
								<div class="form-group">
									<label class="col-sm-3 control-label">Ruang Perawatan</label>
									<div class="col-sm-9">
										<select class="form-control" style="width: 100%;" name="ruang" id="ruang">
											<?php
											foreach($ruang as $row) {
											?>
											<option value="<?php echo $row->kode_kelas; ?>"><?php echo $row->nama_kelas; ?></option>
											<?php
											}
											?>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">No. RM</label>
									<div class="col-sm-3">
										<input type="text" class="form-control" id="rm" name="rm"/>
									</div>
									<div class="col-sm-1 control-label">
										<a class="btn-sm btn-primary ">Cari</a>
									</div>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label class="col-sm-4 control-label">Tanggal Permintaan</label>
									<div class="col-sm-3">
										<input type="text" class="form-control" id="tgl" name="tgl"/>
									</div>
									<div class="col-sm-1 control-label">
										<a class="btn-sm btn-primary">Proses</a>
									</div>
									<div class="col-sm-3 control-label">
										<a class="btn-sm btn-primary">Refresh</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="box" id="kotaktable">
			<div class="box-header with-border">
				<h3 class="box-title">Detail Pasien</h3>
			</div>
			<div class="box-body">
				<div id="tablejenis"></div>
			</div>
			<div class="box-footer clearfix">
				<div align="right" id="pagination_link"></div>
            </div>
		</div>
	</section>
</div>
