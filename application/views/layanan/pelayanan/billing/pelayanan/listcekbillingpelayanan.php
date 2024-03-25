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
        <div class="card mt-2">
            <div class="card-body">
                <div class="row">
                    <div class="form-horizontal">
                        <div class="card-header with-border">
                            <h6 class="card-title text-primary">Billing Rawat Inap / Rawat Jalan / IGD</h6>
                        </div>
                        <div class="col-sm-12">
                            <table class="table">
                                <tr>
                                    <td width="25%">
                                         <label class="col-sm-12 control-label col-form-label" style="text-align:left;">BILLING R.INAP / R.JALAN | NO.RM</label>
                                    </td>
                                    <td width="15%">
                                        <input type="text" class="form-control" id="norm" name="norm" placeholder="Input No. RM" autocomplete="off">
                                    </td>
                                    <td width="5%"><button onclick="caridatabilling()" type="button" class="btn btn-sm btn-primary" id="btncari" <?php if ($jumlah > 0) { echo "disabled"; } else { echo ""; }?>>Cari</button></td>
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
        
        <br>
        <!-- apotik -->
        <!-- dihapus krn bayar ada disini -->
    </section>
</div>


</main>
