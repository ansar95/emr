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
                        <h4 class="mb-0">Pencatatan Terima Barang</h4>
                        <div class="d-flex">
                            <div id="updateheader"></div>
                            <div id="deleteheader"></div>
                            <button class="btn-sm btn-danger btn" onclick="prosesfakturbaru()">
                                <i class='fas fa-plus'></i> &nbsp;Data Baru
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row spacing-row">
                            <div class="col-md-4">
                                <div class="row form-group">
                                    <label class="col-sm-4 col-form-label text-right">Tanda Terima/SJ</label>
                                    <div class="col-sm-5 pr-0">
                                        <input type="text" class="form-control" id="sj" name="sj" onkeyup="this.value = this.value.toUpperCase();" required autocomplete="off" />
                                    </div>
                                    <div class="col-sm-3">
                                        <button class="btn-sm btn-primary btn" onclick="prosesheader()">Proses</button>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label class="col-sm-4 col-form-label text-right">No. Faktur</label>
                                    <div class="col-sm-5 pr-0">
                                        <input type="text" class="form-control" id="no" name="no" onkeyup="this.value = this.value.toUpperCase();" autocomplete="off" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row form-group">
                                    <label class="col-sm-4 col-form-label text-right">Tanggal Terima</label>
                                    <div class="col-sm-5 pr-0">
                                        <input type="text" class="form-control" id="terima" name="terima" autocomplete="off" />
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label class="col-sm-4 col-form-label text-right"> Tanggal Faktur</label>
                                    <div class="col-sm-5 pr-0">
                                        <input type="text" class="form-control" id="tgl" name="tgl" autocomplete="off" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row form-group">
                                    <label class="col-sm-4 col-form-label text-right">Vendor</label>
                                    <div class="col-sm-5 pr-0">
                                        <select class="form-control prov" style="width: 100%;" name="vendor" id="vendor">
                                            <?php
                                            foreach ($dtpbf as $row) {
                                            ?>
                                                <option value="<?php echo $row->id; ?>"><?php echo $row->nama; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label class="col-sm-4 col-form-label text-right"> PPN</label>
                                    <div class="col-sm-5 pr-0">
                                        <select class="form-control prov" style="width: 100%;" name="ppn" id="ppn">
                                            <?php
                                            foreach ($dtppn as $row) {
                                            ?>
                                                <option value="<?php echo $row->ppn; ?>"><?php echo $row->ppn; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="kotakdetail" class="position-relative">
                            <div class="row mt-5 mb-5">
                                <div class="col-12">
                                    <div class="d-flex justify-content-between">
                                        <b>Detail Faktur</b>
                                        <button id="tambahdetail" onclick="addfaktur()" class="btn-sm btn-primary btn"><i class='fas fa-plus'></i> Isi Detail</button>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive" id="tabledetailfaktur">
                                <table class="table table-bordered table-stripped">
                                    <thead>
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
                                    </thead>
                                    <tbody>
                                        <td colspan="100%" class="text-center">
                                            Tidak Ada Data
                                        </td>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>
<!-- END -->