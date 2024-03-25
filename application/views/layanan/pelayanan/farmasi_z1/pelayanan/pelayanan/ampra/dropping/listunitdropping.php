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
                        <h4 class="mb-0">Dropping Ampra</h4>

                    </div>
                    <div class="card-body">
                        <div class="row">
                            <label class="col-sm-2 control-label">Tanggal Order</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="tgl" name="tgl" required autocomplete="off" />
                            </div>
                            <div class="col-sm-2 pl-0">
                                <button class="btn btn-primary" onclick="prosescari();">Tampilkan</button>
                            </div>
                        </div>
                        <div class="row mt-5 mb-3">
                            <div class="col">
                                <div class="d-flex justify-content-between">
                                    <b>Data Unit</b>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div id="tablenamaunit">
                                    <table class="table table-bordered table-stripped">
                                        <thead>
                                            <tr>
                                                <th width="10%">No.</th>
                                                <th>Nama Unit</th>
                                                <th width="15%">Aksi</th>
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
                            <div class="col-md-8">
                                <div class="box" id="kotakdetail">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- END -->