<div class="content-wrapper">
    <section class="content-header">
      	<h1>Faktur <small>Laporan Rekapitulasi Faktur</small></h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Laporan</li>
		</ol>
    </section>
    <section class="content">
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">Laporan Pembelian</h3>
				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
					<i class="fa fa-minus"></i></button>
				</div>
			</div>
			<div class="box-body">
				<div class="form-horizontal">
					<div class="box-body">
						<table class="table table-borderless">
							<tr>
								<td class="text-right" width="20%" ><b>Tanggal Periode:<b></td>
								<td colspan="3">
									<div class="col-sm-3">
										<div class="input-group date">
											<div class="input-group-addon">
												<i class="fa fa-calendar"></i>
											</div>
											<input type="text" class="form-control pull-right" id="awal" name="tglawal" required>
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
									<b>Vendor:</b>
								</td>
								<td width="10%">
									<input type="radio" name="optionsRadios" value="option1" > Semua
								</td>
								<td width="8%">
									<input type="radio" name="optionsRadios" value="option1" > Pilih Vendor
								</td>
								<td>
									<select class="form-control unit2" style="width: 100%;">
										<option selected="selected">Alabama</option>
									</select>
								</td>
							</tr>
							<tr>
								<td class="text-right">
									<b>Pembiayaan:</b>
								</td>
								<td width="10%">
									<input type="radio" name="optionsRadios" value="option1" > APBD
								</td>
								<td width="10%">
									<input type="radio" name="optionsRadios" value="option1" > BLUD
								</td>
							</tr>
							<tr>
								<td class="text-right">
									<b>Urut Data:</b>
								</td>
								<td width="10%">
									<input type="radio" name="optionsRadios" value="option1" > No. RM
								</td>
								<td width="8%" colspan="3">
									<input type="radio" name="optionsRadios" value="option1" > Nomor Resep
								</td>
							</tr>
							<tr>
								<td class="text-right">
									<b>Jenis Rawat: </b>
								</td>
								<td colspan="3">
									<input type="radio" name="optionsRadios" value="option1" > Semua
									<br>
									<input type="radio" name="optionsRadios" value="option1" > EKATALOG
									<br>
									<input type="radio" name="optionsRadios" value="option1" > NON EKATALOG
								</td>
							</tr>
							<tr>
								<td class="text-right">
									<b>Cetak Pada:</b>
								</td>
								<td width="10%">
									<input type="radio" name="optionsRadios" value="option1" > Layar
								</td>
								<td width="10%" colspan="2">
									<input type="radio" name="optionsRadios" value="option1" > Printer
								</td>
							</tr>
						</table>
					</div>
				</div>
			</div>
			<div class="box-footer">
				<table class="table table-borderless">
					<tr>
						<td width="30%"></td>
						<td width="30%">
						</td>
						<td width="40%">
							Ke EXCEL. nama file
						</td>
					</tr>
					<tr>
						<td width="30%"></td>
						<td width="30%">
							<a class="btn-sm btn-block btn-social btn-instagram">
								<i class="fa fa-print"></i> Cetak Rekapitulasi Faktur
							</a>
						</td>
						<td width="40%">
							<div class="input-group margin">
							
								<input type="text" class="form-control">
									<span class="input-group-btn">
									<input type="button" class="btn-xs btn-info btn-flat" value="Excel">
									</span>
								
							</div>
						</td>
					</tr>
				</table>
			</div>
		</div>
    </section>
</div>
