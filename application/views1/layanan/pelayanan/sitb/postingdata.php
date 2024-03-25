<!-- START: Card Data-->
<main>
    <div class="container-fluid site-width">
        <!-- START: Breadcrumbs-->
        <div class="row ">
            <div class="col-12  align-self-center">
                <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                    </ol>
                </div>
            </div>
        </div>
        <!-- END: Breadcrumbs-->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">Posting Data Ke SITB</h4>
                    </div>
                    <div class="card-body">
						<!-- <form target="_blank" action="<?php echo site_url();?>/sitb/post2sitb" method="post">  -->
                            <table class="table table-borderless">
                                <tr>
									<td width='50%'>Pilih periode data Pelayanan Pasien yg akan di kirim</td>
                                </tr>
                            </table>    
                            <table class="table table-borderless">
								
								<tr>
									<td width='10%'>Tanggal Keluar</td>
									<td width='15%'>
										<div class="input-group date">
												<div class="input-group-prepend">
													<span class="input-group-text bg-transparent border-right-0"><i class="icon-calendar"></i></span>
												</div>
												<input type="text" id="tglmulai" required name="tglmulai" autocomplete='off' class="form-control pull-right">
										</div>
									</td>
									<td width='1%'>	
										s/d
									</td>
									<td width='15%'>	
										<div class="input-group date">
										<div class="input-group-prepend">
													<span class="input-group-text bg-transparent border-right-0"><i class="icon-calendar"></i></span>
												</div>
											<input type="text" id="tglselese" required name="tglselese" autocomplete='off' class="form-control pull-right">
										</div>
									</td>
                                    <td width="20%">
										<div class="input-group col-sm-12">
											<!-- <button class="btn btn-sm btn-primary" type="submit" name="cet" value="Cetak"><i class="fa fa-print"></i> &nbsp; Posting Data ke SITB </button>	 -->
                                            <button class='btn  btn-primary mt-auto' type='submit' onclick="tampilkanprosesposting()">Tampilkan</button>
										</div>
									</td>
									<td width='40%'></td>
								</tr>
							</table>
						<!-- </form> -->
                        <br>
                        <br>
                        <!-- <table class="table table-borderless"> -->

                            <div class="box-body">
                                Rekapitulasi Hasil Posting Unit
                                <div id="tablepasien">
                                    <table class="table table-bordered table-hover" id="barisdata">
                                        <thead>
                                            <tr>
                                                <th width='3%'>No</th>
                                                <th width='7%'>Tgl. Masuk</th>
                                                <th width="7%">Tgl. Keluar</th>
                                                <th width="5%">No. RM</th>
                                                <th width="15%">Nama Pasien</th>
                                                <th width="2%">JK</th>
                                                <th width="13%">Unit Keluar</th>
                                                <th width="19%">Alamat</th>
                                                <th width="4%">ICD</th>
                                                <th width='7%'>Golongan</th>
                                                <th width='13%'>SITB</th>
                                                <th width='5%'>Proses</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td colspan="3" class="text-center">
                                                    Tidak Ada Data
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    </div>
                                </div>
                            </div>
                        <!-- </table>     -->
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>
<!-- END -->