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
                    <div class="row">
                        <div class="col-12 col-md-5">
                            <div class="form-group">
                                <label class="col-sm-4 control-label" style="padding-top: 4px;">Poli</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="kdpoli" id="kdpoli" autocomplete="off" />
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-1 my-auto">
                            <button class="btn btn-sm btn-primary" onclick="lanjutproses()">Lanjut</button>
                        </div>
                    </div>
                    <div class="card-body position-relative" id="kotakdetail">
                        <div class="row mb-2">
                            <div class="col-12">
                                <div class="d-flex justify-content-between">
                                    <b class="">Daftar Persetujuan</b>
                                    <div class="d-flex">
                                            <button onclick="addpersetujuan()" class="btn btn-sm btn-success" id="tambahruang">
                                                Tambah Data
                                                </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-12" id="tableampra">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>No.Kartu</th>
                                            <th>Nama Peserta</th>
                                            <th>Tgl. SEP</th>
                                            <th>RI/RJ</th>
                                            <th>Persetujuan</th>
                                            <th>Status</th>
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
                        <div class="row">
                            <div class="col-12 text-right">
                                <div id="pagination_link"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>
