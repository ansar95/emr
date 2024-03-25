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
		<div class="card">
			<div class="card-header with-border  d-flex justify-content-between align-items-center">
				<h5 class="card-title">Laporan Pembelian BHP</h5>
				<div class="card-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
					<i class="fa fa-minus"></i></button>
				</div>
			</div>
			<div class="card-body">
					<div class="card-body">
						<form target="_blank" action="<?php echo site_url();?>/faktur/panggilcetakbhp" method="post"> 
							<table class="table table-borderless">
								<tr>
									<td width='10%'>Tanggal</td>
									<td  width='20%'>
										<div class="input-group date">
											<div class="input-group-prepend">
												<span class="input-group-text bg-transparent border-right-0"><i class="icon-calendar"></i></span>
											</div>
											<input type="text" id="awal" required name="awal" autocomplete='off' class="form-control pull-right">
										</div>
									</td>
									<td width='1%'>	
										s/d
									</td>
									<td width='20%'>	
										<div class="input-group date">
											<div class="input-group-prepend">
													<span class="input-group-text bg-transparent border-right-0"><i class="icon-calendar"></i></span>
												</div>
											<input type="text" id="akhir" required name="akhir" autocomplete='off' class="form-control pull-right">
										</div>
									</td>
									<td width='70%'></td>
								</tr>
							</table>

							<table class="table table-borderless">
								<tr>
									<td width='10%' valign="middle" >Vendor</td>
									<td width="7%" valign="middle">
										<div  class="custom-control custom-radio custom-control-inline">
											<input type="radio" class="custom-control-input" name="namecekpbf" value="1" id="uncekpbf" onclick="javascript:unitcek();" checked> 
											<label for="uncekpbf" class="custom-control-label">Semua</label> 

										</div>
										
									</td>
									<td width="7%" valign="middle">
										<div class="custom-control custom-radio custom-control-inline">
											<input type="radio"  class="custom-control-input" name="namecekpbf" value="2" id="cekpbf" onclick="javascript:unitcek();"> 
											<label for="cekpbf" class="custom-control-label">Pilihan</label> 
										</div>
									</td>
									<td width="30%">
										<select class="form-control unit2" style="width: 100%;" id="vendor" name="vendor" disabled>
											<?php
											foreach($dtpbf as $row) {
											?>
											<option value="<?php echo $row->id; ?>"><?php echo $row->nama; ?></option>
											<?php
											}
											?>
										</select>
									</td>
									
									<td width='46%'></td>
								</tr>
							</table>

							<table class="table table-borderless">
								<tr>
									<td width='10%' valign="middle" >Item BHP</td>
									<td width="7%" valign="middle">
										<div class="custom-control custom-radio custom-control-inline">
											<input type="radio" class="custom-control-input" name="namecekobat" value="1" id="uncekobat" onclick="javascript:obatcek();" checked> 
											<label class="custom-control-label" for="uncekobat">Semua</label>
										</div>
										
									</td>
									<td width="7%" valign="middle">
										<div class="custom-control custom-radio custom-control-inline">
										<input type="radio" name="namecekobat" class="custom-control-input" value="2" id="cekobat" onclick="javascript:obatcek();"> 
										<label class="custom-control-label" for="cekobat">Pilihan</label>
										</div>
										
									</td>
									<td width="30%">
										<select class="form-control" style="width: 100%;" name="obatnya" id="obatnya" disabled>
	                                        <option value="-">-- Pilih --</option>
                                            <?php
                                            foreach($dtobat as $row) {
                                                ?>
                                                <option value="<?php echo $row->kodeobat; ?>"><?php echo $row->namaobat.' | '.$row->satuanpakai.' | Rp. '.formatuang($row->hargastok); ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
									</td>
									
									<td width='46%'></td>
								</tr>
							</table>

							<table class="table table-borderless">
								<tr>
									<td width='10%' valign="middle" >Pendanaan</td>
									<td width="7%" valign="middle">
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" class="custom-control-input" name="namecekdana" value="1" id="uncekdana" onclick="javascript:danacek();" checked>
												<label class="custom-control-label" for="uncekdana">Semua</label>
											</div>
									</td>
									<td width="7%" valign="middle">
										<div class="custom-control custom-radio custom-control-inline">
											<input type="radio" class="custom-control-input" name="namecekdana" value="2" id="cekdana" onclick="javascript:danacek();">
											<label class="custom-control-label" for="cekdana">Pilihan</label>
										</div>
										
									</td>
									<td width="30%">
										<select class="form-control unit2" style="width: 100%;" id="pendanaan" name="pendanaan" disabled>
											<option value="-">-- Pilih --</option>
											<?php
											foreach($dtdana as $row) {
											?>
											<option value="<?php echo $row->pendanaan; ?>"><?php echo $row->pendanaan; ?></option>
											<?php
											}
											?>
										</select>
									</td>
									
									<td width='46%'></td>
								</tr>
							</table>

							<table class="table table-borderless">
								<tr>
									<td width='10%' valign="middle" >Cetakan</td>
									<td width="5%" valign="middle">
										<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" class="custom-control-input" name="cekprinter" value="1" id="cekprinter1" checked>
												<label class="custom-control-label" for="cekprinter1">LAYAR</label>
												
											</div>
									</td>
									<td width="5%" valign="middle">
										<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" class="custom-control-input" name="cekprinter" value="2" id="cekprinter2" >
												<label class="custom-control-label" for="cekprinter2">PDF</label>
												
											</div>
									</td>
									<td width="5%" valign="middle">
										<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" class="custom-control-input" name="cekprinter" value="3" id="cekprinter3" >
												<label class="custom-control-label" for="cekprinter3">XLS</label>
												
											</div>
									</td>
									<td width='75%'></td>
								</tr>
							</table>
							<!-- <table class="table table-borderless">
								<tr>
									<td width='9%' valign="middle" >Pendanaan</td>
									<td width="7%" valign="middle">
										<input type="radio" name="cekpendanaan" value="1" id="uncekpendanaan" onclick="javascript:pendanaancek();" checked> Semua
									</td>
									<td width="7%" valign="middle">
										<input type="radio" name="cekpendanaan" value="2" id="cekpendanaan" onclick="javascript:pendanaancek();"> Pilihan
									</td>
									<td width="30%">
										<select class="form-control pendanaan2" style="width: 100%;" id="pendanaan" name="pendanaan" disabled>
											<?php
											foreach($dtpendanaan as $row) {
											?>
											<option value="<?php echo $row->pendanaan; ?>"><?php echo $row->pendanaan; ?></option>
											<?php
											}
											?>
										</select>
									</td>
									
									<td width='47%'></td>
								</tr>
							</table> -->
							<table class="table table-borderless">
								<tr>
									<td width='9%'></td>
									<td width="15%">
										<div class="input-group col-sm-12">
											
											<button class="btn btn-sm btn-secondary" type="submit" name="cet" value="Cetak">	<i class="fa fa-print"></i> &nbsp; Cetak </button>	
										
										</div>
									</td>
									<td width='74%'></td>
								</tr>
							</table>
						</form>
					</div>
				
			</div>
		</div>
    </section>
</div>
</main>


<script>
	
	function unitcek() {
		if (document.getElementById('cekpbf').checked) {
			document.getElementById('vendor').disabled = false;
		} else 
		document.getElementById('vendor').disabled = true;
	}

	function obatcek() {
		if (document.getElementById('cekobat').checked) {
			document.getElementById('obatnya').disabled = false;
		} else 
		document.getElementById('obatnya').disabled = true;
	}

	function danacek() {
		if (document.getElementById('cekdana').checked) {
			document.getElementById('pendanaan').disabled = false;
		} else 
		document.getElementById('pendanaan').disabled = true;
	}
	
</script>
