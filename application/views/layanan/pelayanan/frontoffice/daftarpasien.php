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
                        <h4 class="mb-0">Daftar Pasien Rawat Inap</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="inputEmail4">Nama</label>
                                <input type="text" class="form-control rounded" id="nm" name="nm" autocomplete="off">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputPassword4">Alamat</label>
                                <input id="al" type="text" class="form-control rounded" name="al" autocomplete="off">
                            </div>
                            <!-- </div> -->
                            <div class="form-group col-md-1 d-flex align-items-end flex-column">
                                <button class='btn  btn-primary mt-auto' type='button' onclick="caridata()" />Cari</button>
                            </div>
                            <div class="form-group col-md-5 d-flex align-items-end flex-column">
                                <button class='btn  btn-primary mt-auto' type='button' onclick="muatulang()" />Refresh</button>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <div id="tablepasien"></div>
                        </div>
                        <div id="pagination_link" class="d-flex flex-row-reverse">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>
<!-- END -->