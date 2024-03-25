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
                <div class="card-header with-border">
                    <h5 class="card-title">Retur Faktur Pembelian</h5>
                    <div class="card-tools pull-right">
                        <table class="table ">
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
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        
                            <div class="col-sm-12 row col-spacong-row">
                                <div class="col-sm-3">
                                    <div class="form-group row col-spacing-row">
                                        <label class="col-sm-5 control-label">Tanggal Retur </label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="awal" name="awal" autocomplete="off"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group row col-spacing-row">
                                        <label class="col-sm-2 control-label align-center"> s/d </label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="akhir" name="akhir" autocomplete="off"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group row col-spacing-row">
                                        <label class="col-sm-3 control-label">Vendor</label>
                                        <div class="col-sm-9">
                                            <select class="form-control prov" style="width: 100%;" name="vendor" id="vendor">
                                                <?php
                                                foreach($dtpbf as $row) {
                                                    ?>
                                                    <option value="<?php echo $row->kode; ?>"><?php echo $row->nama; ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-1">
                                    <!-- <div class="box-footer clearfix"> -->
                                        <button class="btn btn-sm btn-primary pull-left" onclick="prosesretur()">Proses</button>  
                                        <!-- NEW prosesheaderretur -->
                                    <!-- </div> -->
                                </div>
                            </div>
                        
                    </div>
                </div>

            </div>
            <div class="card" id="kotakdetail">
                <div class="card-header with-border d-flex justify-content-between align-items-center">
                    <h5 class="card-title">Detail Faktur</h5>
                    <div class="card-tools pull-right" style="padding-top: 4px;">
                        <button onclick="addfakturretur()" class="btn btn-sm btn-primary" id="tambahdetail"> 
                        <!-- NEW addfakturretur -->
                            <i class='fa fa-plus'></i> &nbsp; Tambah Data
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered">
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
                                <tr>
                                    <div id="tabledetail_retur"></div>
                                    <!-- <td colspan="14" class="text-center">
                                        Tidak Ada Data
                                    </td> -->
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>

