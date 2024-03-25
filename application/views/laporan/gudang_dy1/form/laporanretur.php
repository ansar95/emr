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
				<h5 class="card-title">Laporan Retur Pembelian</h5>
				<div class="card-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
					<i class="fa fa-minus"></i></button>
				</div>
			</div>
			<div class="card-body">
				
					<div class="card-body">
						<form target="_blank" action="<?php echo site_url();?>/faktur/panggilcetak" method="post"> 
							<table class="table table-borderless">
								<tr>
									<td width='10%'>Tanggal Surat Jalan</td>
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
											<input type="text" id="akhir" required name="akhir" autocomplete='off' class="form-control pull-right">
										</div>
									</td>
									<td width='70%'></td>
								</tr>
							</table>
							<table class="table table-borderless">
								<tr>
									<td width='10%' valign="middle" >Jenis</td>
									<td width="7%" valign="middle">
										<div class="custom-control custom-radio custom-control-inline">
											<input type="radio" class="custom-control-input"  name="pilihjenis" value="1" id="pilihjenis1" checked >
											<label for="pilihjenis1" class="custom-control-label">Obat</label> 
										</div>
										
									</td>
									<td width="10%" valign="middle">
										<div class="custom-control custom-radio custom-control-inline">
										<input type="radio"  class="custom-control-input" name="pilihjenis" value="2" id="pilihjenis2">
										<label for="pilihjenis2" class="custom-control-label"> BHP Medis</label> 
							
										</div>
										
									</td>
									<td width='76%'></td>
								</tr>
							</table>

							<table class="table table-borderless">
								<tr>
									<td width='10%' valign="middle" >PBF / Vendor</td>
									<td width="7%" valign="middle">
									<div  class="custom-control custom-radio custom-control-inline" >
											<input type="radio"  class="custom-control-input" name="namecekpbf" value="1" id="uncekpbf" onclick="javascript:unitcek();" checked> 
											<label class="custom-control-label" for="uncekpbf">Semua</label>
											</div>
									</td>
									<td width="7%" valign="middle">
										<div class="custom-control custom-radio custom-control-inline">
											<input type="radio" class="custom-control-input" name="namecekpbf" value="2" id="cekpbf" onclick="javascript:unitcek();"> 
											<label class="custom-control-label" for="cekpbf">Pilihan</label>
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
											
											<button class="btn btn-sm btn-secondary" type="submit" name="cet" value="Cetak"><i class="fa fa-print"></i>&nbsp; Cetak	</button>
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
		document.getElementById('vemdor').disabled = true;
	}

</script>
