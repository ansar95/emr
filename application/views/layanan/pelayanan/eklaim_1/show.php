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
                        <h4 class="mb-0">Data Rekam Medik</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-2">
                                <label for="inputEmail4">Tanggal Keluar</label>
                                <input id="tglmulai" class="form-control" type="text" class=" col-sm-5">
                            </div>
                            <div class="form-group col-md-1 mt-4 d-flex text-center align-items-center">
                                s/d
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputEmail4"></label>
                                <input id="tglselese" class="mt-2 form-control" type="text" class=" col-sm-5">
                            </div>
                            <div class="form-group col-md-2 pr-0">
                                <label for="inputEmail4">Pelayanan</label>
                                <select style="width: 100%;" class="form-control" id="pelayanan">
                                    <option value="JALAN">Rawat Jalan</option>
                                    <option value="INAP">Rawat Inap</option>
                                    <option value="UGD">UGD</option>
                                </select>
                            </div>
                            <div class="form-group col-2 col-md-1 d-flex align-items-start flex-column">
                                <button class='btn  btn-danger mt-auto' type='button' onclick="tampilkan()">Tampilkan</button>
                            </div>
                            <!-- <div class="form-group col-md-1"></div> -->
                            <div class="form-group col-md-2 pl-5 pr-0">
                                <label>No. RM Pasien</label>
                                <input type="text" class="form-control pull-right" id="nrp" autocomplete='off'>
                            </div>
                            <div class="form-group col-2 col-md-1  d-flex align-items-start flex-column">
                                <button class='btn  btn-primary mt-auto' type='button' onclick="cari()">Cari</button>
                            </div>
                        </div>
                        <div class="box-body">
                            <div id="tablepasien">
                                <table class="table table-bordered table-striped" id="barisdata">
                                    <thead>
                                        <tr>
                                            <th width='10%'>Tgl. Masuk</th>
                                            <th width="10%">Tgl. Pulang</th>
                                            <th width="10%">No. RM</th>
                                            <th width="10%">Nama Pasien</th>
                                            <th width="15%">Unit Keluar</th>
                                            <th width="10%">DPJP</th>
                                            <th width="10%">Golongan</th>
                                            <th width="10%">No. Sep</th>
                                            <th width='5%'>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td colspan="10" class="text-center">
                                                Tidak Ada Data
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div id="pagination_link" class="d-flex flex-row-reverse">
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