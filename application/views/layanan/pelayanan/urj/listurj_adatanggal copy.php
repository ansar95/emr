\
<style>
	td {
		font-size: 12px;
	}
</style>
<div class="content-wrapper">
	<!-- <div class="container"> -->
		<section class="content">
			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title">Unit Rawat Jalan</h3>
				</div>
				<div class="box-body">
					<div class="row">
						<div class="col-sm-12">
						<div class="box-body pad table-responsive">
							<table class="table text-left" bordercolor="#ffffff" >
								<tr >
									<td width="7%">
										<label>Tanggal</label>
									</td>
									<td width="30%">
										<label>Unit</label>
									</td>
									<td width="10%">
									</td>
									<td width="30%">
									</td>
									<td width="7%">
										<label>No. RM</label>
									</td>
									<td width="10%">
									</td>
								</tr>
								<tr>
									<td width="7%">
										<input type="text" class="form-control pull-right" id="tglp" name="tglp" required autocomplete='off'>
									</td>
									<td width="30%">
                                        <?php
                                        $id = $this->session->userdata("idx");
                                        if (ceksess("PIL", $id) == FALSE) {
											$units = json_decode(stripslashes($this->session->userdata("kodeunit")));
                                            ?>
                                            <select class="form-control" style="width: 100%;" name="unit" id="unitselect">
                                                <?php
                                                foreach($unit as $row) {
													foreach($units as $r){
														if ($row->kode_unit == $r) {
															?>
															<option value="<?php echo $row->kode_unit; ?>"><?php echo $row->nama_unit; ?></option>
															<?php
														}
													}
                                                }
                                                ?>
                                            </select>
                                            <?php
                                        } else {
                                            ?>
                                            <select class="form-control" style="width: 100%;" name="unit" id="unitselect">
												<!-- <option value="000">--Semua Unit--</option> -->
                                                <?php
                                                foreach($unit as $row) {
                                                    ?>
                                                    <option value="<?php echo $row->kode_unit; ?>"><?php echo $row->nama_unit; ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                            <?php
                                        }
                                        ?>
									</td>
									<td width="10%">
										<button class='text-center btn-sm btn-primary col-sm-12' type='button' id="caridata"/>Tampilkan</button>
									</td>
									<td width="30%">
									</td>
									<!-- <td width="7%">
										<input id="nrp" type="text" class=" col-sm-12">
									</td> -->
									<td width="7%">
										<input type="text" class="form-control pull-right" id="nrp" name="nrp" required autocomplete='off'>
									</td>
									<td width="10%">
									<button class='text-center btn-sm btn-primary col-sm-12' type='button' id="caridata1"/>Cari</button>
									</td>
								</tr>
							</table>
						</div>
						</div>
					</div>
				</div>
			</div>
			<div class="box" id="kotak">
				<div class="box-header with-border">
					<h3 class="box-title">Data Pasien</h3>
					<div class="box-tools pull-right">

					</div>
				</div>
				<div class="box-body">
					<table class="table table-bordered table-striped" id="barispasien">
						<thead>
							<tr>								
								<th width='5%'>No. RM</th>
								<th width="13%">Nama Pasien</th>
								<th width="15%">Alamat</th>
								<th width="14%">Unit</th>
								<th width="8%">Kelas</th>
								<th width="7%">Tgl. Masuk</th>
								<th width='8%'>Golongan</th>
								<th width='10%'>Rujukan</th>
								<th width='10%'>No. Transaksi</th>
								<th width='5%'>Dokter</th>
								<th width='5%'>Action</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td colspan="11" class="text-center">
									Tidak Ada Data
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</section>
	<!-- </div> -->
</div>
