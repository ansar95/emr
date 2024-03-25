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
                        <h4 class="mb-0">Pasien Diagnosa TB</h4>
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
                            <!-- <div class="form-group col-md-2 pr-0">
                                <label for="inputEmail4">Pelayanan</label>
                                <select style="width: 100%;" class="form-control" id="pelayanan">
                                    <option value="SEMUA">Semua Data</option>
                                    <option value="JALAN">Rawat Jalan</option>
                                    <option value="INAP">Rawat Inap</option>
                                    <option value="UGD">UGD</option>
                                </select>
                            </div> -->
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
                                            <th width="8%">No. Transaksi</th>
                                            <th width='7%'>Tgl. Masuk</th>
                                            <th width="7%">Tgl. Keluar</th>
                                            <th width="6%">No. RM</th>
                                            <th width="13%">Nama Pasien</th>
                                            <th width="2%">JK</th>
                                            <th width="12%">Unit Keluar</th>
                                            <th width="13%">Alamat</th>
                                            <th width="3%">ICD</th>
                                            <th width="13%">Diagnosa</th>
                                            <th width='7%'>Golongan</th>
                                            <th width='9%'>SITB</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td colspan="12" class="text-center">
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
            </div>
        </div>
    </div>

</main>
<!-- END -->