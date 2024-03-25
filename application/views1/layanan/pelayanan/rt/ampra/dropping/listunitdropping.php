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
                    <h6 class="card-title">Dropping Ampra BHP Non Medis</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="form-horizontal">
                            <div class="col-sm-12 ">
                                <div class="form-group row col-spacing-row">
                                    <label class="col-sm-4 control-label">Tanggal Order</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="tgl" name="tgl" required autocomplete="off"/>
                                    </div>
                                    <div class="col-sm-2">
                                        <button class="btn btn-primary" onclick="prosescarirt();">Tampilkan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-2 row col-spacing-row">
                <div class="col-sm-5">
                    <div class="card"> <!--id : kotakunit-->
                        <div class="card-header with-border">
                            <h6 class="card-title">Data Unit</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12" id="tablenamaunit">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th width="10%">No.</th>
                                                <th>Nama Unit</th>
                                                <th width="15%">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td colspan="3" class="text-center">
                                                    Tidak Ada Data
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="card" id="kotakdetail"> <!--id : kotakdetail-->

                    </div>
                </div>
            </div>

        </section>
    </div>

</main>

