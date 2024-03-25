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
                    <h5 class="card-title">Pencatatan Penerimaan Obat</h5>
                    <div class="card-tools pull-right">
                        <table class="table">
                            <tr>
                                <td style="padding-top: 5px;">
                                    <!-- <div id="updatefaktur">
                                    </div> -->
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
                                    <button class="btn btn-sm btn-danger pull-right" onclick="prosesfakturbaru()">
                                        <i class='glyphicon glyphicon-plus'></i> &nbsp;Data Baru
                                    </button>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12 row col-spacing-row">
                            <div class="col-sm-5">
                                <div class="form-group row">
                                    <label class="col-sm-3 control-label">Tanda Terima/SJ</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="sj" name="sj" onkeyup="this.value = this.value.toUpperCase();" required autocomplete="off"/>
                                    </div>
                                    <div class="col-sm-3">
                                        <button class="btn btn-sm btn-primary" onclick="prosesheader()">Proses</button>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 control-label">No. Faktur</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="no" name="no" onkeyup="this.value = this.value.toUpperCase();" autocomplete="off"/>
                                    </div>
                                    <div class="col-sm-3">
                                        <div id="updatefaktur"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group row">
                                    <label class="col-sm-5 control-label">Tgl Terima</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="terima" name="terima" autocomplete="off"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-5 control-label">Tanggal Faktur</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="tgl" name="tgl" autocomplete="off"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group row">
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
                                <div class="form-group row">
                                    <label class="col-sm-3 control-label">% PPN</label>
                                    <div class="col-sm-3">
                                        <select class="form-control prov" style="width: 100%;" name="ppn" id="ppn">
                                            <?php
                                            foreach($dtppn as $row) {
                                            ?>
                                                <option value="<?php echo $row->ppn; ?>"><?php echo $row->ppn; ?></option>
                                                <?php
                                                }
                                                ?>
                                        </select>
                                    </div>
                                    <label class="col-sm-3 control-label">Pendanaan</label>
                                    <div class="col-sm-3">
                                        <select class="form-control prov" style="width: 100%;" name="pendanaan" id="pendanaan">
                                            <?php
                                            foreach($dtdana as $row) {
                                            ?>
                                            <option value="<?php echo $row->pendanaan; ?>"><?php echo $row->pendanaan; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                     </div>
                </div>
            </div>
            <div class="card" id="kotakdetail">
                <div class="card-header with-border d-flex justify-content-between align-items-center">
                    <h5 class="card-title">Detail Faktur</h5>
                    <div class="card-tools pull-right" style="padding-top: 4px;">
                        <button onclick="addfaktur()" class="btn btn-sm btn-primary" id="tambahdetail">
                            <i class='glyphicon glyphicon-plus'></i> Tambah Data
                        </button>
                    </div>
                </div>
                <div class="card-body">
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
</main>