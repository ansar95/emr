<div class="content-wrapper">
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Pencatatan Terima Barang</h3>
                <div class="box-tools pull-right">
                    <table class="table ">
                        <tr>
                            <td style="padding-top: 5px;">
                                <div id="updatefaktur">

                                </div>
                            </td>
                            <td style="padding-top: 5px;">
                                <div id="updateheader">

                                </div>
                            </td>
                            <td style="padding-top: 5px;">
                                <div id="deleteheader">

                                </div>
                            </td>
	                        <td style="padding-top: 5px;">
		                        <a class="btn-sm btn-danger pull-right" onclick="prosesfakturbaru()">
			                        <i class='glyphicon glyphicon-plus'></i> &nbsp;Data Baru
		                        </a>
	                        </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="form-horizontal">
                        <div class="col-sm-12">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="col-sm-5 control-label">Tanda Terima/SJ</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" id="sj" name="sj" onkeyup="this.value = this.value.toUpperCase();" required autocomplete="off"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-5 control-label">No. Faktur</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" id="no" name="no" onkeyup="this.value = this.value.toUpperCase();" autocomplete="off"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="col-sm-5 control-label">Tanggal Terima</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" id="terima" name="terima" autocomplete="off"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-5 control-label">Tanggal Faktur</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" id="tgl" name="tgl" autocomplete="off"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Vendor</label>
                                    <div class="col-sm-9">
                                        <select class="form-control prov" style="width: 100%;" name="vendor" id="vendor">
                                            <?php
                                            foreach($dtpbf as $row) {
                                                ?>
                                                <option value="<?php echo $row->id; ?>"><?php echo $row->nama; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label"></label>
                                    <div class="checkbox col-sm-9">
                                        <label>
                                            <input type="checkbox" id="ppn" name="ppn">
                                            PPn Dikenakan
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
	            <hr>
	            <div class="row">
		            <div class="form-horizontal">
			            <div class="col-sm-12">
				            <div class="col-sm-12">
					            <div class="form-group">
						            <label class="col-sm-12"><b>Tanda terima terkait (Optional)</b></label>
					            </div>
				            </div>
				            <div class="col-sm-4">
					            <div class="form-group">
						            <label class="col-sm-5 control-label">Tanda Terima/SJ</label>
						            <div class="col-sm-7">
							            <input type="text" class="form-control" id="tanda" name="tanda" onkeyup="this.value = this.value.toUpperCase();"/>
						            </div>
					            </div>
					            <div class="form-group">
						            <label class="col-sm-5 control-label"></label>
						            <div class="col-sm-7">
							            <a class="btn-sm btn-success" onclick="tambahtanda();">Cari dan daftar</a>
						            </div>
					            </div>
				            </div>
				            <div class="col-sm-8">
					            <table class="table table-bordered" id="tabletandaterima">
						            <thead>
						                <tr>
							                <th width="15%">Tanda terima</th>
							                <th width="15%">Tgl. Terima</th>
							                <th>Vendor</th>
							                <th width="5%">PPn</th>
							                <th width="10%" class="text-center">Aksi</th>
						                </tr>
						            </thead>
						            <tbody>

						            </tbody>
					            </table>
				            </div>
			            </div>
		            </div>
	            </div>
            </div>
	        <div class="box-body">
		        <div class="row">

		        </div>
	        </div>
            <div class="box-footer clearfix">
                <a class="btn-sm btn-primary pull-right" onclick="prosesheader()">Proses</a>
            </div>
        </div>
        <div class="box" id="kotakdetail">
            <div class="box-header with-border">
                <h3 class="box-title">Detail Faktur</h3>
                <div class="box-tools pull-right" style="padding-top: 4px;">
                    <a onclick="addfaktur()" class="btn-sm btn-primary" id="tambahdetail">
                        <i class='glyphicon glyphicon-plus'></i> Tambah Data
                    </a>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-sm-12" id="tabledetailfaktur">
                        <table class="table table-bordered">
                            <tr>
                                <th>No.</th>
                                <th>Kode</th>
                                <th>Nama Barang</th>
                                <th>Satuan Stok</th>
                                <th>QTY (Kemasan)</th>
                                <th>Harga (per Kemasan)</th>
                                <th>% Diskon</th>
                                <th>Pot. Langsung</th>
                                <th>Jumlah Harga</th>
                                <th>Isi Dalam Kemasan</th>
                                <th>Expire Date</th>
                                <th>Batch No.</th>
                                <th>Harga Stok Sementara</th>
                                <th>Harga Stok</th>
                            </tr>
                            <tr>
                                <td colspan="14" class="text-center">
                                    Tidak Ada Data
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
