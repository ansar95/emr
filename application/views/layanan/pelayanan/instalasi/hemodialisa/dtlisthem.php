<div class="content-wrapper">
	<!-- <div class="container"> -->
		<section class="content">
			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title">Hemodialisa</h3>
					<div class="box-tools pull-right">
						<a class='pull-right btn-sm btn-success' id="tambahhem">
							<i class='glyphicon glyphicon-plus'></i> &nbsp;Registrasi Baru
						</a>
					</div>
				</div>
				<div class="box-body">
					<div class="row">
						<div class="col-sm-12">
						<div class="box-body pad table-responsive">
							<table class="table text-left" bordercolor="#ffffff" >
								<tr >
									<td width="20%">
										<label>Tanggal Kunjungan</label>
									</td>
									<td width="10%">
									</td>
									<td width="5%">
									</td>
									<td width="30%">
										<label>Unit</label>
									</td>
									<td width="5%">
									</td>
									<td width="20%">
										<label>No. RM</label>
									</td>
									<td width="10%">
									</td>
								</tr>
								<tr>
									<td width="20%">
										<input type="text" class="form-control pull-right" id="tgl" name="tgl" required>
									</td>
									<td width="10%">
										<button class='text-center btn-sm btn-primary col-sm-12' type='button' id="caridata"/>Proses</button>
									</td>
									<td width="5%">
									</td>
									<td width="30%">
										<input type="text" value="<?php echo $unitinstalasi->kode_unit ; ?>" id="kdunit" name="kdunit" hidden disabled>
										<input type="text" value="<?php echo $unitinstalasi->nama_unit ?>" class="form-control" id="unit" name="unit" disabled>
									</td>
									<td width="5%">
									</td>
									<td width="20%">
										<input id="nrp" type="text" class=" col-sm-12">
									</td>
									<td width="10%">
									<button class='text-center btn-sm btn-primary col-sm-12' type='button' id="caridata"/>Proses</button>
									</td>
								</tr>
							</table>
						</div>
						</div>
					</div>
				</div>
			</div>
			<div class="box" id="kotak">
				<div class="box-header with-border">
					<h3 class="box-title">Data Pasien</h3>
					<div class="box-tools pull-right">

					</div>
				</div>
				<div class="box-body">
					<table class="table table-bordered table-striped" id="tabelhem">
						<thead>
							<tr>								
								<th width='5%'>No. RM</th>
								<th width='10%'>Tanggal</th>
								<th>Nama Pasien</th>
								<th width="15%">Dari Unit</th>
								<th width="10%">Golongan</th>
								<th width="16%">Dokter Instruksi</th>
								<th width="16%">Dokter Penerima</th>
								<th width='20%' class="text-center">Action</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td colspan="7" class="text-center">
									Tidak Ada Data
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</section>
	<!-- </div> -->
</div>
