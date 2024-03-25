<main>
    <div class="container-fluid site-width">        
<!-- START: Breadcrumbs-->
        <div class="row">
            <div class="col-12  align-self-center">
                <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                    </ol>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card mx-2">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">Refrensi Tindakan</h4>
                        <button class="btn btn-primary" onclick="tambahdatatindakan()"><i class="fa fa-plus"></i> Tambah Data</button>

                    </div>
                    <div class="card-body">
                        <div class="sort-panel">
                            <div class="form-group row ">
                                <!-- <label for="sortingField" class="col-sm-2 col-form-label">Cari Nama Pasien</label>
                                <div class="col-sm-3 d-flex">
                                    <input type="text" name="crnama" id="crnama" class="form-control">
                                    <button type="button" class="btn btn-primary ml-2" onclick="load_data_uri()" id="sort">Cari</button>

                                </div> -->
                            </div>
                        </div>

                        <div class="table-responsive mt-2 table-scrollable" style="max-height: 520px;">
                            <table id="tabletindakan" class="display table dataTable table-bordered">
                                <thead>
                                    <tr>
                                       
                                        <th>Jenis Tindakan</th>
                                        <th>Kode Tindakan</th>
                                        <th>Parameter</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   
                                </tbody>
                            </table>
                        </div>
                        <!-- <button class="btn btn-secondary" onclick="rekapitulasi()">Lihat Rekapitulasi</button> -->
                    </div>
                </div>
            </div>

        </div>
        

        <!--modal tambah-->

        <div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="tambahRefrensi">
                            <div class="form-group row col-spacing-row">
                                <label for="" class="col-12 col-md-3 col-form-label">Jenis Tindakan</label>
                                <div class="col-12 col-md-9">
                                    <select id= "jenistindakan" name="jenistindakan" class="form-control unit2" style="width: 100%;">
                                       
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group row col-spacing-row">
                                <label for="" class="col-12 col-md-3 col-form-label">Kode Tindakan</label>
                                <div class="col-12 col-md-9">
                                    <div class="input-group">
                                        <input type="text" id="kdTindakan" name="tmt" class="form-control pull-right" autocomplete="off" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row col-spacing-row">
                                <label for="" class="col-12 col-md-3 col-form-label">DPJP Wajib</label>
                                <div class="col-9" id="dpjp_utama">
                                </div>
                            </div>
                            
                            
                            

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" onclick="simpandatatindakan()">Simpan</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>


         <!--modal edit-->
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="editRefrensi">
                            <div class="form-group row col-spacing-row">
                                <label for="" class="col-12 col-md-3 col-form-label">Jenis Tindakan</label>
                                <div class="col-12 col-md-9">
                                    <select id= "jenistindakanedit" name="jenistindakan" class="form-control unit2" style="width: 100%;">
                                       
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group row col-spacing-row">
                                <label for="" class="col-12 col-md-3 col-form-label">Kode Tindakan</label>
                                <div class="col-12 col-md-9">
                                    <div class="input-group">
                                        <input type="text" id="kdTindakanEdit" name="tmt" class="form-control pull-right" autocomplete="off" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row col-spacing-row">
                                <label for="" class="col-12 col-md-3 col-form-label">DPJP Wajib</label>
                                <div class="col-9" id="dpjp_utamaedit">
                                </div>
                            </div>
                            
                            
                            

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" onclick="simpanTindakan()">Simpan</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
</div>
</main>
