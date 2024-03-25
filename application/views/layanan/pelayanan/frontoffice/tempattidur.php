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
                        <h4 class="mb-0">Ketersediaan Tempat Tidur</h4>
                        <button class="btn-sm btn-primary pull-right" onclick="loadkamar()">
                            Refresh
                        </button>
                    </div>
                    <div class="card-body">
                        <div id="kotaktable">
                            <div class="table-responsive">
                                <div id="tablekamar"></div>
                            </div>
                            <div id="pagination_link" class="d-flex flex-row-reverse">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>