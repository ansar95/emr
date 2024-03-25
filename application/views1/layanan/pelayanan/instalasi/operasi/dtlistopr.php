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
						<h4 class="mb-0">Instalasi Kamar Operasi</h4>
						<button class='btn btn-sm btn-success' id="tambahlab">
							<i class='glyphicon glyphicon-plus'></i> &nbsp;Registrasi Baru
						</button>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="form-group col-md-3">
								<label for="inputEmail4">Tanggal</label>
								<input type="text" class="form-control pull-right" id="tgl" name="tgl" required>
							</div>
							<div class="form-group col-md-1 col-2 d-flex align-items-start flex-column mr-5">
								<button class='btn  btn-primary mt-auto' type='button' id="caridata" />Proses</button>
							</div>
							<div class="form-group col-md-3">
								<label for="inputEmail4">Unit</label>
								<input type="text" value="<?php echo $unitinstalasi->kode_unit ?>" id="kdunit" name="kdunit" hidden disabled>
								<input type="text" value="<?php echo $unitinstalasi->nama_unit ?>" class="form-control" id="unit" name="unit" disabled>
							</div>
							<div class="form-group col-md-3">
								<label>No. RM</label>
								<input id="nrp" type="text" class="form-control pull-right">
							</div>
							<div class="form-group col-md-1 col-2  d-flex align-items-start flex-column">
								<button class='btn  btn-primary mt-auto' type='button' id="caridata" />Proses</button>
							</div>
						</div>
						<div class="box-body">
							<table class="table table-bordered table-striped" id="tabellab">
								<thead>
									<tr>
										<th width='5%'>No. RM</th>
										<th>Nama Pasien</th>
										<th width="18%">Dari Unit</th>
										<th width="8%">Golongan</th>
										<th width="18%">Nama Dokter</th>
										<th width="10%">Unit Pelaksana</th>
										<th width="3%">RI/RJ</th>
										<th width="7%">Ruangan</th>
										<th width='15%' class="text-center">Action</th>
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