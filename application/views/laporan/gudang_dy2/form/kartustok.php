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
			<div class="card-header with-border d-flex justify-content-between align-items-center">
				<h5 class="card-title">Kartu Stok</h5>
				<div class="card-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
					<i class="fa fa-minus"></i></button>
				</div>
			</div>
			<div class="card-body">
				
					<div class="card-body">
						<form target="_blank" action="<?php echo site_url();?>/faktur/cetakkartustok" method="post"> 
							<table class="table table-borderless">
								<tr>
									<td width='10%'>Tanggal Mulai</td>
									<td width='20%'>
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
											<input type="text" id="akhir" required name="akhir" autocomplete='off'  class="form-control pull-right">
										</div>
									</td>
									<td width='70%'></td>
								</tr>
							</table>
							<table class="table table-borderless">
								<tr>
									<td width='10%' valign="middle" >Jenis</td>
									<?php
									if ($pilihjenis == 1) {
									?>
										<td width="7%" valign="middle">
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" class="custom-control-input" name="pilihjenis" value="1" id="pilihjenis1" checked>
												<label class="custom-control-label" for="pilihjenis1">Obat</label>
											</div>
											
										</td>
										<td width="10%" valign="middle">
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" class="custom-control-input" name="pilihjenis" value="2" id="pilihjenis2" disabled>
												<label  class="custom-control-label" for="pilihjenis2">BHP Medis</label> 
											</div>
											
										</td>
									<?php } else {?>
										<td width="7%" valign="middle">
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" class="custom-control-input"  name="pilihjenis" value="1" id="pilihjenis1" disabled> 
												<label  class="custom-control-label" for="pilihjenis1"> Obat</label>
											</div>
										</td>
										<td width="10%" valign="middle">
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" class="custom-control-input" name="pilihjenis" value="2" id="pilihjenis2" checked> 
												<label  class="custom-control-label"  for="pilihjenis2">BHP Medis</label>

											</div>
											
										</td>
									<?php } ?>	
									<td width='76%'></td>
								</tr>
							</table>

							<table class="table table-borderless">
								<tr>
									<td width='10%' valign="middle" >Pendanaan</td>
									<td width="10%">
										<select class="form-control prov" style="width: 100%;" name="pendanaan" id="pendanaan">
                                            <?php
                                            foreach($dtdana as $row) {
                                            ?>
                                            <option value="<?php echo $row->pendanaan; ?>"><?php echo $row->pendanaan; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
									</td>
									
									<td width='80%'></td>
								</tr>
							</table>

							<table class="table table-borderless">
								<tr>
									<td width='10%' valign="middle" >Nama Obat/BHP</td>
									<td width="30%">
										<select class="form-control unit2" style="width: 100%;" id="idobat" name="idobat">
											<?php
											foreach($dtobat as $row) {
												if ( $pilihjenis == 1 and $row->bhp == 0 ) { 
											?>
													<option value="<?php echo $row->id; ?>"><?php echo $row->namaobat.' | '.$row->satuanpakai.' | Rp. '.formatuang($row->hargapakai); ?></option>
											<?php
												} else {
												if ( $pilihjenis == 2 and $row->bhp == 1 ) { 
												?>
													<option value="<?php echo $row->id; ?>"><?php echo $row->namaobat.' | '.$row->satuanpakai.' | Rp. '.formatuang($row->hargapakai); ?></option>
												<?php
													} 
												}
											}
											?>
										</select>
									</td>
									
									<td width='60%'></td>
								</tr>
							</table>
							
							

							<table class="table table-borderless">
								<tr>
									<td width='9%'></td>
									<td width="15%">
										<div class="input-group col-sm-12">
											
											<button class="btn btn-sm btn-secondary" type="submit" name="cet" value="Cetak"><i class="fa fa-print"></i>&nbsp; Cetak </button>	
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

</script>
