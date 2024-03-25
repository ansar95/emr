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
						<h4 class="mb-0">Forensik</h4>
						<button class='btn btn-sm btn-success' id="tambahjen">
							<i class='glyphicon glyphicon-plus'></i> &nbsp;Registrasi Baru
						</button>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="form-group col-md-3">
								<label for="inputEmail4">Tanggal</label>
								<input type="text" class="form-control pull-right" id="tgl" name="tgl" required>
							</div>
							<div class="form-group col-md-3">
								<label for="inputEmail4">Unit</label>
								<select class="form-control" style="width: 100%;" name="kdunit" id="kdunit">
									<!-- <?php
											foreach ($unitinstalasi as $row) {
											?>
                                                <option value="<?php echo $row->kode_unit; ?>"><?php echo $row->nama_unit; ?></option>
                                            <?php
											}
											?> -->
									<option value="JENA">KAMAR JENAZAH</option>
									<option value="NARKO">NARKOBA</option>
									<option value="VISUM">VISUM</option>

								</select>
							</div>
							<div class="form-group col-md-1 col-2  d-flex align-items-start flex-column">
								<button class='btn  btn-primary mt-auto' type='button' id="caridata" />Tampilkan</button>
							</div>
						</div>
						<div class="box-body">
							<table class="table table-bordered table-striped" id="tabeljen">
								<thead>
									<tr>
										<th width='8%'>No. RM</th>
										<th width='7%'>Tanggal</th>
										<th width='14%'>Nama Pasien</th>
										<th>Alamat</th>
										<th width="10%">Dari Unit</th>
										<th width="8%">Golongan</th>
										<th width="10%">Tgl Diambil</th>
										<th width="10%">Tgl Dibayar</th>
										<th width='18%' class="text-center">Action</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td colspan="100%" class="text-center">
											Tidak Ada Data
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</main>
<!-- END -->