<style>
	th{
		font-size: 12px;
		padding: 5px !important;
		vertical-align: center;
	}
	td{
		font-size: 11px !important;
		padding: 5px !important;
	}
</style>
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
		<div class="col-12">
			<div class="card">
				<div class="card-header d-flex justify-content-between align-items-center">
					<h4 class="mb-0">Diet Pasien</h4>
				</div>

				<div class="card-body">
					<div class="row">
						<div class="col-sm-5">
							<div class="form-group row col-spacing-row">
								<label class="col-sm-4 control-label">Ruang Perawatan</label>
								<div class="col-sm-8">
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
						</div>
						<div class="col-sm-5">
							<div class="form-group row col-spacing-row">
								<label class="col-sm-4 control-label">Tanggal Permintaan</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" id="tgl" name="tgl"/>
								</div>
								<button class=' btn btn-primary col-sm-3' type='button' onclick="tglmasuk()"/>Tampilkan</button>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="card mt-1" id="kotaktable">
				<div class="card-header with-border d-flex justify-content-between align-items-center">
					<h4 class="mb-0">Detail Pasien</h4>
					<div class="pull-right">
						<button class='text-center btn btn-success pull-right' type='button' onclick="ambildatasebelumnya()"/> <i class='icon-plus'></i> &nbsp; AMBIL DATA SEBELUMNYA</button>
					</div>
				</div>
				<div class="card-body">
						<table class="col-12 table table-bordered table-striped" id="barispasien">
							<thead>
								<tr>
									<th width='2%'>No</th>	
									<th width='11%'>Kamar Perawatan</th>	
									<th width='8%'>Nama Kelas</th>							
									<th width='6%' style="text-align:center">No. RM</th>
									<th>Nama Pasien</th>
									<th width='6%'>Golongan</th>
									<th width="6%">Bentuk</th>
									<th width='8%'>Pagi</th>
									<th width='8%'>Siang</th>
									<th width='8%'>Malam</th>
									<th style="text-align:center" width='5%'>Proses</th>
									<th style="text-align:center" width='5%'>Hapus</th>
									<th style="text-align:center" width='12%'>Cetak Etiket</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td colspan="10" class="text-center">
										Tidak Ada Data
									</td>
								</tr>
							</tbody>
						</table>						
				</div>
				<div class="card-body row col-spacing-row">
					<div class="col-sm-3 ">
						<button class=' btn btn-success col-12' type='button' onclick="cetaketiketgizipagisemua()"/> <i class='fa fa-print'></i>  &nbsp; CETAK SEMUA ETIKET PAGI</button>	
					</div>

					<div class="col-sm-3 text-left">
						<button class='btn btn-warning col-12' type='button' onclick="cetaketiketgizisiangsemua()"/> <i class='fa fa-print'></i> &nbsp; CETAK SEMUA ETIKET SIANG</button>
					</div>

					<div class="col-sm-3">
						<button class='text-center btn btn-info col-12 ' type='button' onclick="cetaketiketgizimalamsemua()"/> <i class='fa fa-print'></i> &nbsp; CETAK SEMUA ETIKET MALAM</button>
					</div>

					<div class="col-sm-3">
						<button class='text-center btn btn-primary col-12 ' type='button' onclick="cetaketiketgizisnacksemua()"/> <i class='fa fa-print'></i >&nbsp;  CETAK SEMUA ETIKET SNACK</button>
					</div>
					
				</div>
			</div>
		</div>

	</div>
</main>

