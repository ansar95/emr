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
        <div class="row spacing-row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">Cari Pasien</h4>
                    </div>
                    <div class="card-body">
                        <div class="row spacing-row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-5 col-form-label text-right">Nama Pasien</label>
                                    <div class="col-sm-7">
                                        <input id="np" type="text" class="form-control" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-5 col-form-label text-right">Tgl. Lahir Pasien</label>
                                    <div class="col-sm-7">
                                        <input id="tgl" type="text" class="form-control" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row spacing-row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-5 col-form-label text-right">Panggilan Pasien</label>
                                    <div class="col-sm-7">
                                        <input id="pp" type="text" class="form-control" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-5 col-form-label text-right">No. Kartu Pasien</label>
                                    <div class="col-sm-7">
                                        <input id="kartu" type="text" class="form-control " autocomplete="off">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row spacing-row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-5 col-form-label text-right">Alamat Pasien</label>
                                    <div class="col-sm-7">
                                        <input id="nap" type="text" class="form-control" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-5 col-form-label text-right">NIK Pasien</label>
                                    <div class="col-sm-7">
                                        <input id="nik" type="text" class="form-control" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row spacing-row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-5 col-form-label text-right">No. RM Pasien</label>
                                    <div class="col-sm-7">
                                        <input id="nrp" type="text" class="form-control" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-12">
                                <button class='btn btn-danger' id="caridata"><i class="fa fa-search"></i> Cari</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row spacing-row">
            <div class="col-12">
                <div class="card mt-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">Data Pasien</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div id="tablepasien">
                                <table class="table table-bordered table-hover" id="barispasien">
                                    <thead>
                                        <tr>
                                            <th width="18%">Nama Lengkap</th>
                                            <th width='7%'>No. RM</th>
                                            <th width="13%">Panggilan</th>
                                            <th>Alamat</th>
                                            <th width="10%">Tlp/HP</th>
                                            <th width="15%">Golongan</th>
                                            <th style="text-align:center" width='15%'>Proses</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td colspan="100%" class="text-center">
                                                Tidak Ada Data
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- <div id="pagination_link" class="d-flex flex-row-reverse"></div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>
<!-- END -->