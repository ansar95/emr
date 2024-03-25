<div class="content-wrapper">

    <section class="content">
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">Kartu Stok</h3>
				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
					<i class="fa fa-minus"></i></button>
				</div>
			</div>
			<div class="box-body">
				<div class="form-horizontal">
					<div class="box-body">
						<form target="_blank" action="<?php echo site_url();?>/Masterrtangga/cetakkartustok" method="post"> 
							<table class="table table-borderless">
								<tr>
									<td width='10%'>Tanggal Mulai</td>
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
							</table>

							<table class="table table-borderless">
								<tr>
									<td width='10%' valign="middle" >Nama Obat/BHP</td>
									<!-- <td width="7%" valign="middle">
										<input type="radio" name="namecekpbf" value="1" id="uncekpbf" onclick="javascript:unitcek();" checked> Semua
									</td>
									<td width="7%" valign="middle">
										<input type="radio" name="namecekpbf" value="2" id="cekpbf" onclick="javascript:unitcek();"> Pilihan
									</td> -->
									<td width="30%">
										<select class="form-control unit2" style="width: 100%;" id="idobat" name="idobat">
											<?php
											foreach($dtobat as $row) {
											?>
											<option value="<?php echo $row->id; ?>"><?php echo $row->namaobat.' | '.$row->satuanpakai.' | Rp. '.formatuang($row->hargapakai); ?></option>
											<?php
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
											<div class="input-group-addon">
												<i class="fa fa-print"></i>
											</div>
											<input class="btn-sm btn-block" type="submit" name="cet" value="Cetak">	
										</div>
									</td>
									<td width='74%'></td>
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
	
	function unitcek() {
		if (document.getElementById('cekpbf').checked) {
			document.getElementById('vendor').disabled = false;
		} else 
		document.getElementById('vendor').disabled = true;
	}

</script>
