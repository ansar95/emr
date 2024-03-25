<div class="content-wrapper">
    <section class="content">
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">Rekapitulasi Billing</h3>
				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
					<i class="fa fa-minus"></i></button>
				</div>
			</div>
			<div class="box-body">
				<div class="form-horizontal">
					<div class="box-body">
						<form target="_blank" action="<?php echo site_url();?>/billing/panggilcetak" method="post">
						<table class="table table-borderless">
							<tr>
								<td class="text-right" width="30%" ><b>Tanggal yang akan dicetak:<b></td>
								<td colspan="3">
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
                                    <b>Shift:</b>
                                </td>
                                <td width="15%">
                                    <input type="radio" name="shif" value="semua" id="uncekshif" onclick="javascript:shifcek();" checked> Semua
                                </td>
                                <td width="8%">
                                    <input type="radio" name="shif" value="pilih" id="cekshif" onclick="javascript:shifcek();"> Pilihan
                                </td>
                                <td>
                                    <div class="col-sm-6">
                                        <select class="form-control shif2" style="width: 100%;" id="shifyes" disabled name="shifpilih">
                                            <option value="PAGI">PAGI</option>
                                            <option value="SIANG">SIANG</option>
                                            <option value="MALAM">MALAM</option>
                                        </select>
                                    </div>
                                </td>
                            </tr>
							<tr>
								<td class="text-right">
									<b>User:</b>
								</td>
								<td width="15%">
									<input type="radio" name="pengguna" value="semua" id="uncekpengguna" onclick="javascript:penggunacek();" checked> Semua
								</td>
								<td width="8%">
									<input type="radio" name="pengguna" value="pilih" id="cekpengguna" onclick="javascript:penggunacek();"> Pilihan
								</td>
								<td>
									<div class="col-sm-6">
										<select class="form-control pengguna2" style="width: 100%;" id="penggunayes" disabled name="penggunapilih">
										<?php
											foreach($us as $row) {
											?>
											<option value="<?php echo $row->username; ?>"><?php echo $row->username; ?></option>
											<?php
											}
											?>
										</select>
									</div>
								</td>
							</tr>
							<tr>
								<td colspan="4">
									<table class="table table-borderless">
										<tr>
											<td width="30%"></td>
											<td width="20%">
												<div class="input-group col-sm-12">
													<div class="input-group-addon">
														<i class="fa fa-print"></i>
													</div>
													<input class="btn-sm btn-block" type="submit" name="cbil" value="Cetak">
												</div>
											</td>
											<td width="50%">
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
						</form>
						<div class="form-group">
						
						</div>
					</div>
				</div>
			</div>
		</div>
    </section>
</div>
