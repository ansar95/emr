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
                        <h4 class="mb-0">Retur Faktur Pembelian</h4>
                    </div>
                    <div class="card-body">
                        <div class="row spacing-row">
                            <div class="col-md-6">
                                <div class="row form-group">
                                    <label class="col-sm-2 col-form-label">Tanggal Retur</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="awal" name="awal" autocomplete="off" />
                                    </div>
                                    <label class="col-2 col-form-label text-center">s/d</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="akhir" name="akhir" autocomplete="off" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row form-group">
                                    <label class="col-sm-3 col-form-label">Vendor</label>
                                    <div class="col-sm-7 pr-0">
                                        <select class="form-control prov" style="width: 100%;" name="vendor" id="vendor">
                                            <?php
                                            foreach ($dtpbf as $row) {
                                            ?>
                                                <option value="<?php echo $row->kode; ?>"><?php echo $row->nama; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <button class="btn-sm btn-primary btn" onclick="prosesretur()">Proses</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="row mt-5 mb-5">
                            <div class="col">
                                <div class="d-flex justify-content-between">
                                    <b>Detail Faktur</b>
                                    <button id="tambahdetail" onclick="addfakturretur()" id="tambahdetail" class="btn-sm btn-primary btn"><i class='fas fa-plus'></i> Isi Detail</button>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-bordered table-stripped">
                                <thead>
                                    <tr>
                                        <th width="4%">No.</th>
                                        <th width="8%">Tanggal</th>
                                        <th width="10%">No.SJ/Faktur</th>
                                        <th width="15%">Nama PBF</th>
                                        <th width="14%">Nama Barang</th>
                                        <th width="5%">Qty</th>
                                        <th width="7%">Satuan</th>
                                        <th width="5%">Isi</th>
                                        <th width="8%">Expire Date</th>
                                        <th width="8%">Batch No.</th>
                                        <th>Sebab</th>
                                        <th width=3% style="text-align:center;">Hapus</th>
                                    </tr>
                                </thead>
                                <tbody id="tabledetail_retur">
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>
<!-- END -->