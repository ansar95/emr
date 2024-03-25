<div class="content-wrapper">
    <section class="content-header">
      	<h1>Resep <small>Laporan Rekapitulasi Resep</small></h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Laporan</li>
		</ol>
    </section>
    <section class="content">
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">Laporan Obat Pasien</h3>
				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
					<i class="fa fa-minus"></i></button>
				</div>
			</div>
			<div class="box-body">
				<div class="form-horizontal">
					<div class="box-body">
						<form target="_blank" action="<?php echo site_url();?>/reseppasien/panggilcetak" method="post"> 
						<table class="table table-borderless">
							<tr>
								<td class="text-right">
									<b>Unit:</b>
								</td>
								<td width="10%">
									<input type="radio" name="unit" value="semua" id="uncekunit" onclick="javascript:unitcek();" checked > Semua
								</td>
								<td width="10%">
									<input type="radio" name="unit" value="igd" id="uncekunit" onclick="javascript:unitcek();" > IGD
								</td>
								<td width="8%">
									<input type="radio" name="unit" value="semua" id="cekunit" onclick="javascript:unitcek();" > Pilihan
								</td>
								<td>
									<select class="form-control unit2" style="width: 100%;" id="unityes" disabled name="unitpilih">
										<?php
										foreach($unit as $row) {
										?>
										<option value="<?php echo $row->kode_unit; ?>"><?php echo $row->nama_unit; ?></option>
										<?php
										}
										?>
									</select>
								</td>
							</tr>
							<tr>
								<td class="text-right">
									<b>Golongan:</b>
								</td>
								<td width="10%">
									<input type="radio" name="golongan" value="semua" id="uncekgolongan" onclick="javascript:golongancek();" checked> Semua
								</td>
								<td width="8%">
									<input type="radio" name="golongan" value="pilih" id="cekgolongan" onclick="javascript:golongancek();"> Pilihan
								</td>
								<td colspan="2">
									<select class="form-control gol2" style="width: 100%;" id="golonganyes" disabled name="golpilih">
									<?php
										foreach($golongan as $row) {
										?>
										<option value="<?php echo $row->golongan; ?>"><?php echo $row->golongan; ?></option>
										<?php
										}
										?>
									</select>
								</td>
							</tr>
							<tr>
								<td class="text-right">
									<b>Urut Data:</b>
								</td>
								<td width="10%">
									<input type="radio" name="urutdata" value="option1" > No. RM
								</td>
								<td width="8%" colspan="3">
									<input type="radio" name="urutdata" value="option1" > Nomor Resep
								</td>
							</tr>
							<tr>
								<td class="text-right" width="20%" ><b>Tanggal Periode:<b></td>
								<td colspan="4">
									<div class="col-sm-3">
										<div class="input-group date">
											<div class="input-group-addon">
												<i class="fa fa-calendar"></i>
											</div>
											<input type="text" class="form-control pull-right" id="awal" name="tglmulai" required> 
										</div>
									</div>
									<div class="col-sm-1 text-center">
									s/d
									</div>
									<div class="col-sm-3">
										<div class="input-group date">
											<div class="input-group-addon">
												<i class="fa fa-calendar"></i>
											</div>
											<input type="text" class="form-control pull-right" id="akhir" name="tglakhir" required>
										</div>
									</div>
								</td>
							</tr>
							<tr>
								<td class="text-right">
									<b>Jenis Rawat: </b>
								</td>
								<td colspan="4">
									<input type="radio" name="jenisrawat" value="option1" > Semua
									<br>
									<input type="radio" name="jenisrawat" value="option1" > Rawat Inap
									<br>
									<input type="radio" name="jenisrawat" value="option1" > Rawat Jalan
									<br>
									<input type="checkbox" name="jenisrawatrm" value="option1" > No. RM Tertentu &nbsp;
									<input type="text" name="jenisrawatrmtext" > 
								</td>
							</tr>
							<tr>
								<td class="text-right">
									<b>Obat/Alkes/BHP: </b>
								</td>
								<td colspan="4">
									<input type="radio" name="obat" value="option1" > Semua
									<br>
									<input type="radio" name="obat" value="option1" > Obat
									<br>
									<input type="radio" name="obat" value="option1" > Alkes/BHP
								</td>
							</tr>
							<td colspan="5">
									<table class="table table-bordered">
										<tr>
											<td width="30%"></td>
											<td width="30%">
												<div class="input-group col-sm-12">
													<div class="input-group-addon">
														<i class="fa fa-print"></i>
													</div>
													<input class="btn-sm btn-block" type="submit" name="cresep" value="Cetak Daftar Resep Pasien">	
												</div>
											</td>
											<td width="40%">
												<div class="input-group margin col-sm-12">
													<div class="input-group-addon">
														<i class="fa fa-file-excel-o"></i>
													</div>
													<input class="btn-sm btn-block" type="submit" name="cresepexcel" value="Excel">
												</div>
											</td>
										</tr>
										<tr>
											<td width="30%"></td>
											<td width="30%">
												<div class="input-group col-sm-12">
													<div class="input-group-addon">
														<i class="fa fa-print"></i>
													</div>
													<input class="btn-sm btn-block" type="submit" name="perobat" value="Cetak Daftar Rekapitulasi per-Obat">	
												</div>
											</td>
											<td width="40%">
												<div class="input-group margin col-sm-12">
													<div class="input-group-addon">
														<i class="fa fa-file-excel-o"></i>
													</div>
													<input class="btn-sm btn-block" type="submit" name="perobatexcel" value="Excel">
												</div>
											</td>
										</tr>
										<tr>
											<td width="30%"></td>
											<td width="30%">
												<div class="input-group col-sm-12">
													<div class="input-group-addon">
														<i class="fa fa-print"></i>
													</div>
													<input class="btn-sm btn-block" type="submit" name="cdokter" value="Cetak Daftar Rekapitulasi Dokter">	
												</div>
											</td>
											<td width="40%">
												<div class="input-group margin col-sm-12">
													<div class="input-group-addon">
														<i class="fa fa-file-excel-o"></i>
													</div>
													<input class="btn-sm btn-block" type="submit" name="cdokterexcel" value="Excel">
												</div>
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
						</form>
					</div>
				</div>
			</div>
		</div>
    </section>
</div>
