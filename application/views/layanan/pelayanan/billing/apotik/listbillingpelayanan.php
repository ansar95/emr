<div class="content-wrapper">
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Billing (Apotek)</h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="form-horizontal">
                        <div class="col-sm-12">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">User</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" id="us" name="us" value="<?php echo $this->session->userdata('nmuser')?>" disabled/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Nama </label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" id="nm" name="nm" value="<?php echo $this->session->userdata('nmuser')?>" disabled/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Shift</label>
                                    <div class="col-sm-3">
                                        <select class="form-control prov" style="width: 100%;" name="shif" id="shif">
                                            <option value="PAGI">PAGI</option>
                                            <option value="SIANG">SIANG</option>
                                            <option value="MALAM">MALAM</option>
                                        </select>
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
                <h3 class="box-title">Detail</h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="form-horizontal">
                        <div class="col-sm-12">
                            <table class="table table-bordered">
                                <tr>
                                    <td width="5%">
                                        No. RM
                                    </td>
                                    <td width="15%">
                                        <input type="text" class="col-sm-12" id="no" name="norm" autocomplete="off"/>
                                    </td>
                                    <td width="5%"><button onclick="caridatabilling()" type="button" class="btn-sm btn-primary">Cari</button></td>
                                    <td width="70%"></td>
                                    <td width="5%"><button type="button" class="btn-sm btn-primary">Refresh</button></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-bordered" id="barisbilling">
                            <thead>
                                <tr>
                                    <th>No. Transaksi</th>
                                    <th>No. RM</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Golongan</th>
                                    <th>Tgl. Resep</th>
                                    <th>Nilai</th>
                                    <th>Keterangan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="9" class="text-center">
                                        Tidak Ada Data
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
