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
                        <h4 class="mb-0">Data BHP</h4>
                        <button class="btn btn-primary" id="tambahbhp">
                            <i class='fas fa-plus'></i> &nbsp;Tambah Data
                        </button>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <input type="text" class="form-control" placeholder="Cari..." name="keyword" id="keyword" autocomplete="off">
                                </div>
                                <div class="form-group col-md-1 d-flex align-items-end flex-column">
                                    <button type="button" class="btn-sm btn-primary" name="cari" id="cari">Tampilkan</button>
                                </div>
                            </div>
                        </form>
                        <div class="table-responsive">
                            <div id="tablebhp"></div>
                        </div>
                        <div id="pagination_link" class="d-flex flex-row-reverse">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>