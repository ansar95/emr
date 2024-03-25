<style>
	.table {
		margin-bottom: 0px;
		
	}

	#select-tools {
		padding: 0px;
		margin: 0;
	}

	td{
		font-size: 10px;
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

	<div class="row">
		<section class="content col-12">
			<div class="card" id="kotaktable">
				<div class="card-header with-border d-flex justify-content-between align-items-center">
					<h5 class="card-title">Data User</h5>
					<div class="card-tools pull-right">
						<button class="btn btn-primary" id="tambahuser">
							<i class='icon-plus'></i> &nbsp;Tambah User
						</button>
					</div>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-sm-12 row col-spacing-row">
							<div class="col-sm-5">
								<div class="card" id="kotaktable">
									<div class="card-header with-border">
										<h5 class="card-title">Users</h5>
									</div>
									<div class="col-12 mt-2">
										<div class="form-group row">
											<label class="col-md-3 col-12 col-form-label">Nama User</label>
											<div class="col-sm-6">
												<input id="nmuser" type="text" class="form-control" autocomplete="off">
											</div>
											<div class="col-3">
												<button class='btn btn-danger' id="cariuser" onclick="cariuser()">
												<!-- <i class="fa fa-search"></i>  -->
												Cari</button>
											</div>
										</div>
									</div>
									<div class="card-body">
										<div id="tableuser"></div>
									</div>
									<div class="card-footer clearfix">
										<div align="right" id="pagination_link"></div>
									</div>
								</div>
							</div>
							<div class="col-sm-7">
								<div class="card pr-2" id="kotakform">
									<div class="card-body with-border">
										<div class="row">
											<div class="col-sm-12 mb-1">
												<div class="form-group row col-spacing-row">
													<label class="col-sm-3 control-label">
														Nama
													</label>
													<input id="nm" type="text" class="form-control col-sm-9">
												</div>
											</div>

											<div class="col-sm-12">
												<div class="form-group row col-spacing-row">
													<label class="col-3 control-label">
														Username
													</label>
													<input id="us" type="text" class="form-control col-sm-4">
													<label class="col-sm-2 control-label">
														Password
													</label>
													<input id="ps" type="text" class="form-control col-sm-3">
												</div>
											</div>

											<div class="col-sm-12">
												<div class="form-group row col-spacing-row">
													<label for="select-tools" class=" col-sm-2">Unit </label>
													<div class="col-sm-12">
														<select id="select-tools" multiple data-allow-clear="1">
															
														</select>
													</div>
												</div>
											</div>
										</div>
									</div>
									
									<div class="card-body mt-n4">
										<table class="table table-bordered" width="100%">
											<tr>
												<th colspan="3">
													<div class="custom-control custom-checkbox custom-control-inline">
														<input type="checkbox"  class="custom-control-input" id="toppelayanan">
														<label class="custom-control-label checkbox-primary" for="toppelayanan">PELAYANAN</label>                                       
													</div>
												</th>
											</tr>
											<tr>
												<td>
													<div class="custom-control custom-checkbox custom-control-inline">
														<input type="checkbox"  class="custom-control-input" id="reg">
														<label class="custom-control-label checkbox-primary" for="reg">MODUL REGISTER</label>                                       
													</div>
												</td>
												<td>
													<div class="custom-control custom-checkbox custom-control-inline">
														<input type="checkbox"  class="custom-control-input" id="fo">
														<label class="custom-control-label checkbox-primary" for="fo">MODUL FRONT OFFICE</label>                                       
													</div>
												</td>
												<td>
													<div class="custom-control custom-checkbox custom-control-inline">
														<input type="checkbox"  class="custom-control-input" id="loket">
														<label class="custom-control-label checkbox-primary" for="loket">MODUL LOKET PEMBAYARAN</label>                                       
													</div>
												</td>
											</tr>
											<tr>
												<td>
													<div class="custom-control custom-checkbox custom-control-inline">
														<input type="checkbox"  class="custom-control-input" id="ugd">
														<label class="custom-control-label checkbox-primary" for="ugd">MODUL UGD</label>                                       
													</div>
												</td>
												<td>
													<div class="custom-control custom-checkbox custom-control-inline">
														<input type="checkbox"  class="custom-control-input" id="jalan">
														<label class="custom-control-label checkbox-primary" for="jalan">MODUL RAWAT JALAN</label>                                       
													</div>
												</td>
												<td>
													<div class="custom-control custom-checkbox custom-control-inline">
														<input type="checkbox"  class="custom-control-input" id="inap">
														<label class="custom-control-label checkbox-primary" for="inap">MODUL RAWAT INAP</label>                                       
													</div>
												</td>
											</tr>
											<tr>
												<td>
													<div class="custom-control custom-checkbox custom-control-inline">
														<input type="checkbox"  class="custom-control-input" id="master">
														<label class="custom-control-label checkbox-primary" for="master">MODUL MASTER DATA</label>                                       
													</div>
												</td>
												<td>
													<div class="custom-control custom-checkbox custom-control-inline">
														<input type="checkbox"  class="custom-control-input" id="sep">
														<label class="custom-control-label checkbox-primary" for="sep">MODUL BRIDGING SIMRS-SEP BPJS</label>                                       
													</div>
												</td>
												<td>
													<div class="custom-control custom-checkbox custom-control-inline">
														<input type="checkbox"  class="custom-control-input" id="amp">
														<label class="custom-control-label checkbox-primary" for="amp">MODUL AMPRA UNIT</label>                                       
													</div>
												</td>
											</tr>
											<tr>
												<td>
													<div class="custom-control custom-checkbox custom-control-inline">
														<input type="checkbox"  class="custom-control-input" id="rm">
														<label class="custom-control-label checkbox-primary" for="rm">MODUL REKAM MEDIK</label>                                       
													</div>
												</td>
												<td>
													<div class="custom-control custom-checkbox custom-control-inline">
														<input type="checkbox"  class="custom-control-input" id="apotik">
														<label class="custom-control-label checkbox-primary" for="apotik">MODUL APOTIK PELAYANAN</label>                                       
													</div>
												</td>
												<td>
													<div class="custom-control custom-checkbox custom-control-inline">
														<input type="checkbox"  class="custom-control-input" id="farmasi">
														<label class="custom-control-label checkbox-primary" for="farmasi">MODUL GUDANG FARMASI</label>                                       
													</div>
												</td>
											</tr>
											<tr>
												<td>
													<div class="custom-control custom-checkbox custom-control-inline">
														<input type="checkbox"  class="custom-control-input" id="rt">
														<label class="custom-control-label checkbox-primary" for="rt">MODUL RUMAH TANGGA</label>                                       
													</div>
												</td>
												<td>
													<div class="custom-control custom-checkbox custom-control-inline">
														<input type="checkbox"  class="custom-control-input" id="gizi">
														<label class="custom-control-label checkbox-primary" for="gizi">MODUL GIZI</label>                                       
													</div>
												</td>
												<td>
													<div class="custom-control custom-checkbox custom-control-inline">
														<input type="checkbox"  class="custom-control-input" id="instalasi">
														<label class="custom-control-label checkbox-primary" for="instalasi">MODUL RAWAT INSTALASI</label>                                       
													</div>
													<table class="table table-bordered">
														<tr>
															<td>
																<div class="custom-control custom-checkbox custom-control-inline">
																	<input type="checkbox"  class="custom-control-input" id="lab">
																	<label class="custom-control-label checkbox-primary" for="lab">LABORATORIUM</label>                                       
																</div>
															</td>
														</tr>
														<tr>
															<td>
																<div class="custom-control custom-checkbox custom-control-inline">
																	<input type="checkbox"  class="custom-control-input" id="rad">
																	<label class="custom-control-label checkbox-primary" for="rad">RADIOLOGI</label>                                       
																</div>
															</td>
														</tr>
														<tr>
															<td>
																<div class="custom-control custom-checkbox custom-control-inline">
																	<input type="checkbox"  class="custom-control-input" id="hem">
																	<label class="custom-control-label checkbox-primary" for="hem">HEMADIALISA</label>                                       
																</div>
															</td>
														</tr>
														<tr>
															<td>
																<div class="custom-control custom-checkbox custom-control-inline">
																	<input type="checkbox"  class="custom-control-input" id="jen">
																	<label class="custom-control-label checkbox-primary" for="jen">Forensik</label>                                       
																</div>
															</td>
														</tr>
														<tr>
															<td>
																<div class="custom-control custom-checkbox custom-control-inline">
																	<input type="checkbox"  class="custom-control-input" id="amb">
																	<label class="custom-control-label checkbox-primary" for="amb">AMBULAN</label>                                       
																</div>
															</td>
														</tr>
														<tr>
															<td>
																<div class="custom-control custom-checkbox custom-control-inline">
																	<input type="checkbox"  class="custom-control-input" id="ibs">
																	<label class="custom-control-label checkbox-primary" for="ibs">KAMAR OPERASI</label>                                       
																</div>
															</td>
														</tr>
														<tr>
															<td>
																<div class="custom-control custom-checkbox custom-control-inline">
																	<input type="checkbox"  class="custom-control-input" id="kmb">
																	<label class="custom-control-label checkbox-primary" for="kmb">KAMAR BERSALIN</label>                                       
																</div>
															</td>
														</tr>
													</table>
												</td>
											</tr>
											<tr>
												<th colspan="3">
													<div class="custom-control custom-checkbox custom-control-inline">
														<input type="checkbox"  class="custom-control-input" id="info">
														<label class="custom-control-label checkbox-primary" for="info">INFORMASI</label>                                       
													</div>
												</th>
											</tr>
											<tr>
												<th colspan="3">
													<div class="custom-control custom-checkbox custom-control-inline">
														<input type="checkbox"  class="custom-control-input" id="bo">
														<label class="custom-control-label checkbox-primary" for="bo">BACK OFFICE</label>                                       
													</div>
												</th>
											</tr>
											<tr>
												<th colspan="3">
													<div class="custom-control custom-checkbox custom-control-inline">
														<input type="checkbox"  class="custom-control-input" id="adm">
														<label class="custom-control-label checkbox-primary" for="adm">ADMINISTRASI</label>                                       
													</div>
												</th>
											</tr>
											<tr>
												<td colspan="3">
													<div class="custom-control custom-checkbox custom-control-inline">
														<input type="checkbox"  class="custom-control-input" id="user">
														<label class="custom-control-label checkbox-primary" for="user">MODUL USER</label>                                       
													</div>
												</td>
												<td>
													&nbsp;
												</td>
												<td>
													&nbsp;
												</td>
											</tr>
											<tr>
												<th colspan="3">
													Action Filter
												</th>
											</tr>
											<tr>
												<td colspan="3">
													<div class="custom-control custom-checkbox custom-control-inline">
														<input type="checkbox"  class="custom-control-input" id="new">
														<label class="custom-control-label checkbox-primary" for="new">Membuat Data Baru</label>                                       
													</div>
												</td>
											</tr>
											<tr>
												<td colspan="3">
													<div class="custom-control custom-checkbox custom-control-inline">
														<input type="checkbox"  class="custom-control-input" id="edit">
														<label class="custom-control-label checkbox-primary" for="edit">Mengedit Data yang divalidasi</label>                                       
													</div>
												</td>
											</tr>
											<tr>
												<td colspan="3">
													<div class="custom-control custom-checkbox custom-control-inline">
														<input type="checkbox"  class="custom-control-input" id="del">
														<label class="custom-control-label checkbox-primary" for="del">Menghapus Data yang divalidasi</label>                                       
													</div>
												</td>
											</tr>
											<tr>
												<td colspan="3">
													<div class="custom-control custom-checkbox custom-control-inline">
														<input type="checkbox"  class="custom-control-input" id="pil">
														<label class="custom-control-label checkbox-primary" for="pil">Memilih Unit pada Form</label>                                       
													</div>
												</td>
											</tr>
											<tr>
												<td class="mt-3" colspan="3" align="right">
													<button id="batalform" class="my-2 btn btn-sm btn-danger">Batal</button>&nbsp;
													<button id="simpanform" class="my-2 btn btn-sm btn-primary">Simpan</button>
													
												</td>
											</tr>
										</table>
									</div>	


										<!--
										
										-->
									</div>
									<div class="card-footer clearfix pull-right">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>

</main>
