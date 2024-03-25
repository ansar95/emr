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
                        <h4 class="mb-0">RL 4A</h4>
                    </div>
                    <div class="card-body">
                            <form target="_blank" action="<?php echo site_url();?>/laporanpasien/panggilcetakrl4" method="post">
                            <div class="row mb-2">
                                <div class="col-md-2">
                                    <label class="col-form-label">Periode:</label>
                                </div>
                                <div class="col-md-4">
                                    <input id="period" type="text" name="period" class=" form-control" required autocomplete="off">
                                </div>

                            </div>
                            <div class="row mb-2">
                                <div class="col-md-2">
                                    <label class="col-form-label">Nama File:</label>
                                </div>
                                <div class="col-md-4">
                                    <input id="nm" type="text" name="nm" class="form-control" required autocomplete="off">
                                </div>
                            </div>
                            <div class="row  mb-2">
                                <div class="col-md-2">
                                </div>
                                <div class="col-md-4">
                                    <button class="btn btn-sm btn-primary w-100" type="submit" name="rl4a">RL. 4A Penyakit Rawat Inap</button>
                                </div>
                            </div>
                            <div class="row  mb-2">
                                <div class="col-md-2">
                                </div>
                                <div class="col-md-4">
                                    <button class="btn btn-sm btn-primary w-100" type="submit" name="rl4akec">RL. 4A Penyakit Rawat Inap (Kecelakaan)</button>
                                </div>
                            </div>
                            <div class="row  mb-2">
                                <div class="col-md-2">
                                </div>
                                <div class="col-md-4">
                                    <button class="btn btn-sm btn-primary w-100" type="submit" name="rl4b">RL. 4A Penyakit Rawat Jalan</button>
                                </div>
                            </div>
                            <div class="row  mb-2">
                                <div class="col-md-2">
                                </div>
                                <div class="col-md-4">
                                    <button class="btn btn-sm btn-primary w-100" type="submit" name="rl4bkec">RL. 4A Penyakit Rawat Jalan (Kecelakaan)</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

</main>

