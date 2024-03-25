<div class="content-wrapper">
    <section class="content">
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">Posisi Stok Harian</h3>
				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
					<i class="fa fa-minus"></i></button>
				</div>
			</div>
			<div class="box-body">
				<div class="form-horizontal">
					<div class="box-body">
						<form target="_blank"  action="<?php echo site_url();?>/faktur/cetakposisistok" method="post"> 
							<table class="table table-borderless">
								<tr>
									<td width='10%'>Tanggal</td>
									<td>
										<div class="input-group date">
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
												<input type="text" id="awal" required name="awal" autocomplete='off'>
										</div>
									</td>
									<td width='1%'>	
										s/d
									</td>
									<td width='10%'>	
										<div class="input-group date">
											<div class="input-group-addon">
												<i class="fa fa-calendar"></i>
											</div>
											<input type="text" id="akhir" required name="akhir" autocomplete='off'>
										</div>
									</td>
									<td width='70%'></td>
								</tr>
							</table>
							<table class="table table-borderless">
								<tr>
									<td width='10%' valign="middle" >Jenis</td>
									<td width="7%" valign="middle">
										<input type="radio" name="pilihjenis" value="1" id="pilihjenis" checked> Obat
									</td>
									<td width="7%" valign="middle">
										<input type="radio" name="pilihjenis" value="2" id="pilihjenis" > BHP Medis
									</td>
									<td width='76%'></td>
								</tr>
								<tr>
									<td width='10%' valign="middle" >Filter</td>
									<td width="8%" valign="middle">
										<input type="checkbox" name="cekgen" id="cekgen" onclick="javascript:cekgenerik();"> Generik
									</td>
									<td width="30%">
										<select class="form-control unit2" style="width: 100%;" id="generik" name="generik" disabled>
											<?php
											foreach($dtgen as $row) {
											?>
											<option value="<?php echo $row->jns; ?>"><?php echo $row->jns; ?></option>
											<?php
											}
											?>
										</select>
									</td>
									<td width='52%'></td>
								</tr>
								<tr>
									<td width='10%' valign="middle" ></td>
									<td width="8%" valign="middle">
										<input type="checkbox" name="cekgol" id="cekgol" onclick="javascript:cekgolongan();"> Golongan
									</td>
									<td width="30%">
										<select class="form-control unit2" style="width: 100%;" id="golongan" name="golongan" disabled>
											<?php
											foreach($dtgol as $row) {
											?>
											<option value="<?php echo $row->jns; ?>"><?php echo $row->jns; ?></option>
											<?php
											}
											?>
										</select>
									</td>
									<td width='52%'></td>
								</tr>
								<tr>
									<td width='10%' valign="middle" ></td>
									<td width="8%" valign="middle">
										<input type="checkbox" name="cekklas" id="cekklas" onclick="javascript:cekklasifikasi();"> Klasifikasi
									</td>
									<td width="30%">
										<select class="form-control unit2" style="width: 100%;" id="klasifikasi" name="klasifikasi" disabled>
											<?php
											foreach($dtkla as $row) {
											?>
											<option value="<?php echo $row->jns; ?>"><?php echo $row->jns; ?></option>
											<?php
											}
											?>
										</select>
									</td>
									<td width='52%'></td>
								</tr>
							</table>
							<table class="table table-borderless">
								<tr>
									<td width='10%' valign="middle" >Cetakan</td>
									<td width="8%" valign="middle">
										<input type="checkbox" name="cekprinter" id="cekprinter"> Printer
									</td>
									<td width='82%'></td>
								</tr>
							</table>
							<table class="table table-borderless">
								<tr>
									<td width='9%'></td>
									<td width="25%">
										<div class="input-group col-sm-12">
											<div class="input-group-addon">
												<i class="fa fa-print"></i>
											</div>
											<input class="btn-sm btn-block" type="submit" name="cetposisi" value="Posisi Stok">	
										</div>
									</td>
									<td width='64%'></td>
								</tr>
								<tr>
									<td width='9%'></td>
									<td width="25%">
										<div class="input-group col-sm-12">
											<div class="input-group-addon">
												<i class="fa fa-print"></i>
											</div>
											<input class="btn-sm btn-block" type="submit" name="cetposisiada" value="Posisi Stok Ada Nilainya">	
										</div>
									</td>
									<td width='64%'></td>
								</tr>
							</table>
						</form>
					</div>
				</div>
			</div>
		</div>
    </section>
</div>

<script>
	function cekgenerik() {
		if (document.getElementById('cekgen').checked) {
			document.getElementById('generik').disabled = false;
		} else 
		document.getElementById('generik').disabled = true;
		document.getElementById('generik').value = "";
	}

	function cekgolongan() {
		if (document.getElementById('cekgol').checked) {
			document.getElementById('golongan').disabled = false;
		} else 
		document.getElementById('golongan').disabled = true;
		document.getElementById('golongan').value = "";
	}

	function cekklasifikasi() {
		if (document.getElementById('cekklas').checked) {
			document.getElementById('klasifikasi').disabled = false;
		} else 
		document.getElementById('klasifikasi').disabled = true;
		document.getElementById('klasifikasi').value = "";
	}
</script>
