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
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-md-flex justify-content-between align-items-center">
                        <h4 class="mb-0">Dropping Ampra</h4>
                        <div class="d-flex">
                            <div class="d-flex mr-2">
                                <div class="text-pre d-flex flex-column"><span class="my-auto"> Tanggal Order </span></div>
                                <input type="text" class="form-control" id="tgl" name="tgl" required autocomplete="off" />
                                <input type="hidden" class="form-control" id="bhpkode" name="bhpkode" value=<?php echo $bhp; ?>>
                            </div>
                            <div class=" d-flex align-items-end flex-column">
                                <button class='btn  btn-primary mt-auto' type='button' onclick="prosescari(<?php echo $bhp; ?>);">Tampilkan</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-4">
                                <div class="box" id="kotakunit">
                                    <div class="box-header with-border">
                                        <b class="box-title">Data Unit</b>
                                    </div>
                                    <div class="box-body">
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
                            <div class="col-12 col-md-8">
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