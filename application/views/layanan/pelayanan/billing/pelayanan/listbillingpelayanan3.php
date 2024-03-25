<div class="content-wrapper">
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Billing</h3>
            </div>
            <div class="box-body" id="kotakheader">
                <!-- tes -->
                <div class="row">
                    <div class="form-horizontal">
                        <div class="col-sm-12">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-sm-1 control-label" style="text-align:left;">User</label>
                                    <div class="col-sm-3">
                                        <input style="text-align:left; type="text" class="form-control" id="us" name="us" value="<?php echo $this->session->userdata("nmuser")?>" disabled/>
                                    </div>

                                    <label class="col-sm-1 control-label" style="text-align:left;">Nama </label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" id="nm" name="nm" value="<?php echo $this->session->userdata("nmuser")?>" disabled/>
                                    </div>
                                </div>

                            </div>
                            <div class="col-sm-6" >
                                <div class="form-group">
                                    <label class="col-sm-1 control-label" style="text-align:left;">Shift</label>
                                    <div class="col-sm-3" >
                                        <select style="text-align:left;" class="form-control" style="width: 100%;" name="shif" id="shif">
                                            <option value="PAGI">PAGI</option>
                                            <option value="SIANG">SIANG</option>
                                            <option value="MALAM">MALAM</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-1" >
                                        <a class="btn-sm btn-primary pull-left" onclick="prosesheader()" id="btnproses" <?php if ($jumlah > 0) { echo "disabled"; } else { echo ""; }?>>Proses</a>
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
        <div class="box" id="kotakdetail">
            <!-- <div class="box-header with-border">
                <h3 class="box-title">Detail Pelayanan</h3>
            </div> -->
            <div class="box-body">
                <div class="row">
                    <div class="form-horizontal">
                        <div class="col-sm-12">
                            <table class="table">
                                <tr>
                                    <td width="16%">
                                         <label class="col-sm-12 control-label" style="text-align:left;">BILLING R.INAP / R.JALAN | NO.RM</label>
                                    </td>
                                    <td width="12%">
                                        <input type="text" class="form-control" id="norm" name="norm" autocomplete="off">
                                    </td>
                                    <td width="5%"><button onclick="caridatabilling()" type="button" class="btn-sm btn-primary" id="btncari" <?php if ($jumlah > 0) { echo "disabled"; } else { echo ""; }?>>Cari</button></td>
                                    <td width="67%"></td>
                                    <!--  <td width="5%"><button type="button" class="btn-sm btn-primary">Refresh</button></td>-->
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table " id="barisbilling">
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
        <div class="box" id="kotakdetailapotik">
          
            <div class="box-body">
                <div class="row">
                    <div class="form-horizontal">
                        <div class="col-sm-12">
                            <table class="table">
                                <tr>
                                    <td width="10%">
                                         <label class="col-sm-12 control-label" style="text-align:left;">APOTIK | NO.RESEP</label>
                                    </td>
                                    <td width="12%">
                                        <input type="text" class="form-control" class="col-sm-12" id="noresep" name="noresep" autocomplete="off"/>
                                    </td>
                                    <td width="5%"><button onclick="caridatabillingapotik()" type="button" class="btn-sm btn-primary">Cari</button></td>
                                    <td width="10%">
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
                                    <td width="7%">
                                        <input type="text" class="form-control" class="col-sm-12" id="norminst" name="norminst" placeholder="Input No. RM" autocomplete="off"/>
                                    </td>
                                    <td width="7%">
                                        <input type="text" class="form-control" class="col-sm-12" id="tglinst" name="tglinst" autocomplete="off"/>
                                    </td>
                                    <td width="5%"><button onclick="caridatabillinginst()" type="button" class="btn-sm btn-primary">Cari</button></td>
                                    <td width="23%"></td>
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


	    <div class="box" id="kotakterbilling">
		    <di
            >
		    <div class="box-body">
			    <div id="pagebillings">
		    </div>
		    <div class="box-footer clearfix" id="kotakhitung">
			    <div class="row">
				    <div align="right" id="pagination_link"></div><br>
			    </div>
			    <hr>
			    <div class="row">
				    <a class="btn-sm btn-danger pull-right" onclick="prosestutuprekap();">Tutup Billing</a>
			    </div>
		    </div>
	    </div>
    </section>
</div>

