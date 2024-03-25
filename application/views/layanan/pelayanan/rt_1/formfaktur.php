<div class="content-wrapper">
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Faktur Pembelian Rumah Tangga</h3>
                <div class="box-tools pull-right">
                    <table class="table ">
                        <tr>
                            <td style="padding-top: 5px;">
                                <a class="btn-sm btn-primary pull-right" onclick="prosesfakturbaru()">
                                    <i class='glyphicon glyphicon-plus'></i> &nbsp;Faktur Baru
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
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">No. Faktur</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" id="no" name="no"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Tanggal Faktur</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" id="tgl" name="tgl"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Tanggal Terima</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" id="terima" name="terima"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Vendor</label>
                                    <div class="col-sm-6">
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
                                <th>Jumlah Harga</th>
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
