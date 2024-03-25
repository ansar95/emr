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
    <!-- END: Breadcrumbs-->

    <div class="row">
    <section class="content col-12">
        <div class="card">
            <div class="card-header with-border">
                <h5 class="card-title">Billing</h5>
            </div>
            <div class="card-body" id="kotakheader">
                <!-- tes -->
                <div class="row">
                    <div class="form-horizontal">
                        <div class="col-sm-12 row col-spacing-row">
                            <div class="col-sm-7">
                                <div class="form-group row col-spacing-row">
                                    <label class="col-sm-2 control-label" style="text-align:left;">User</label>
                                    <div class="col-sm-3">
                                        <input style="text-align:left;" type="text" class="form-control" id="us" name="us" value="<?php echo $this->session->userdata("nmuser")?>" disabled/>
                                    </div>

                                    <label class="col-sm-3 control-label" style="text-align:left;">Nama </label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="nm" name="nm" value="<?php echo $this->session->userdata("nmuser")?>" disabled/>
                                    </div>
                                </div>

                            </div>
                            <div class="col-sm-5" >
                                <div class="form-group row col-spacing-row">
                                    <label class="col-sm-3 control-label" style="text-align:left;">Shift</label>
                                    <div class="col-sm-5" >
                                        <select style="text-align:left;" class="form-control" style="width: 100%;" name="shif" id="shif">
                                            <option value="PAGI">PAGI</option>
                                            <option value="SIANG">SIANG</option>
                                            <option value="MALAM">MALAM</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-1" >
                                        <button class="btn btn-sm btn-primary pull-left" onclick="prosesheader()" id="btnproses" <?php if ($jumlah > 0) { echo "disabled"; } else { echo ""; }?>>Proses</button>
                                    </div>
                                </div>
                                
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="box-footer clearfix">
                <a class="btn-sm btn-primary pull-right" onclick="prosesheader()" id="btnproses" <?php if ($jumlah > 0) { echo "disabled"; } else { echo ""; }?>>Proses</a>
            </div> -->
        </div>
        <div class="card mt-2" id="kotakdetail">
            <!-- <div class="box-header with-border">
                <h3 class="box-title">Detail Pelayanan</h3>
            </div> -->
            <div class="card-body">
                <div class="row">
                    <div class="form-horizontal">
                        <div class="col-sm-12">
                            <table class="table">
                                <tr>
                                    <td width="25%">
                                         <label class="col-sm-12 control-label" style="text-align:left;">BILLING R.INAP / R.JALAN | NO.RM</label>
                                    </td>
                                    <td width="15%">
                                        <input type="text" class="form-control" id="norm" name="norm" placeholder="Input No. RM" autocomplete="off">
                                    </td>
                                    <td width="5%"><button onclick="caridatabilling()" type="button" class="btn btn-sm btn-primary" id="btncari" <?php if ($jumlah > 0) { echo "disabled"; } else { echo ""; }?>>Cari</button></td>
                                    <!-- <td width="67%"></td> -->
                                    <!--  <td width="5%"><button type="button" class="btn-sm btn-primary">Refresh</button></td>-->
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table table-bordered table-striped" id="barisbilling">
                            <thead>
                                <tr>
                                    <th width=8%>No. Transaksi</th>
                                    <th width=6%>No. RM</th>
                                    <th width=13%>Nama</th>
                                    <th>Alamat</th>
                                    <th width=6%>Golongan</th>
                                    <th width=14%>Unit Keluar</th>
                                    <th width=7%>Tgl. Masuk</th>
                                    <th width=7%>Tgl. Keluar</th>
                                    <th width=10% style="text-align:right;">Jumlah Harga</th>
                                    <!-- <th width=7% style="text-align:right;">Terbayar</th> -->
                                    <!-- <th width=7% style="text-align:right;">Sisa</th> -->
                                    <!-- <th width=9%>Keterangan</th> -->
                                    <th width=12% style="text-align:center;">Proses</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="13" class="text-center">
                                        Tidak Ada Data
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- apotik -->
        <div class="card mt-2" id="kotakdetailapotik">
          
            <div class="card-body">
                <div class="row">
                    <div class="form-horizontal">
                        <div class="col-sm-12">
                            <table class="table">
                                <tr>
                                    <td width="15%">
                                         <label class="col-sm-12 control-label" style="text-align:left;">APOTIK | NO.RESEP</label>
                                    </td>
                                    <td width="15%">
                                        <input type="text" class="form-control" class="col-sm-12" id="noresep" name="noresep" placeholder="Input No. Resep" autocomplete="off"/>
                                    </td>
                                    <td width="5%"><button onclick="caridatabillingapotik()" type="button" class="btn btn-sm btn-primary">Cari</button></td>
                                    <td width="15%">
                                         <label class="col-sm-12 control-label" style="text-align:right;">INSTALASI / NO.RM / TGL</label>
                                    </td>
                                    <td width="13%">
                                        <div class="col-sm-12">
                                            <select class="form-control" style="width: 100%;" name="inst" id="inst">
                                                <option value="">--- pilih Instalasi --</option>
                                                <?php
                                                foreach($instalasi as $row) {
                                                    ?>
                                                    <option value="<?php echo $row->kode_unit; ?>"><?php echo $row->nama_unit; ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </td>    
                                    <td width="10%">
                                        <input type="text" class="form-control" class="col-sm-12" id="norminst" name="norminst" placeholder="Input No. RM" autocomplete="off"/>
                                    </td>
                                    <td width="10%">
                                        <input type="text" class="form-control" class="col-sm-12" id="tglinst" name="tglinst" autocomplete="off"/>
                                    </td>
                                    <td width="5%"><button onclick="caridatabillinginst()" type="button" class="btn btn-sm btn-primary">Cari</button></td>
                                    
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-bordered" id="barisbillingapotik">
                            <thead>
                                <tr>
                                    <th width=8%>No.Transaksi</th>
                                    <th width=8%>No.Trx Inst.</th>
                                    <th width=7%>No. RM</th>
                                    <th>Nama</th>
                                    <th width=20%>Dokter</th>
                                    <th width=8%>Golongan</th>
                                    <th width=8% style="text-align:center;">Tanggal</th>
                                    <th width=10% style="text-align:center;">Proses</th>
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


        <div class="card mt-2" id="kotakterbilling">
            <div class="card-body">
                <div id="pagebillings">
            </div>
            <div class="card-footer clearfix" id="kotakhitung">
                <div class="row">
                    <div align="right" id="pagination_link"></div><br>
                </div>
                <hr>
                <div class="row"  style="float: right;">
                    <button class="btn btn-sm btn-danger pull-right" onclick="prosestutuprekap();">Tutup Billing</button>
                </div>
            </div>
        </div>
    </section>
</div>


</main>
