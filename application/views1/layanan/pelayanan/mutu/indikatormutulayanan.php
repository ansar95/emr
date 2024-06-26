<main class="px-2">
    <div class="container">
        <!-- START: Breadcrumbs-->
        <div class="row">
            <div class="col-12  align-self-center">
                <div class="sub-header mt-3 py-3 px-3 align-self-center d-sm-flex w-100 rounded">
                    </ol>
                </div>
            </div>
        </div>

        <div class="row col-spacing-row">
            <div class="card col-12">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0">Input Data Indikator Mutu</h4>
                    <!-- <button onclick="pilihindikator()" class="btn btn-primary d-flex ">Pilih Indikator</button> -->
                </div>
                <div class="card-body">
                    <div class="alert alert-info">
                        Silahkan memilih unit dan indikator terlebih dahulu
                    </div>
                    <div class="row">
                        <div class="col-md-12 d-flex">
                            <label class="col-form-label col-2">Unit</label>
                            <div class="input-group col-10">
                                <select data-allow-clear="1"
                                    class="col-12 form-control"
                                    style="width:100% !important; border-color: 1px #485e9029 !important;"
                                    name="unit"
                                    id="unit"
                                    >
                                    <?php foreach ($unit as $index => $item) { ?>
                                        <optgroup label="<?= $index ?>">
                                            <?php foreach ($item as $unit) { ?>
                                                <option value="<?= $unit->idunit ?>"><strong><?= $unit->kode_unit ?></strong> - <?= $unit->nama_unit ?> </option>
                                            <?php } ?>
                                        </optgroup>
                                    <?php } ?>
                                </select>
                                <!-- <input type="text" class="form-control ml-2 col-2" name="kmb" id="kmb"
                                    autocomplete="off" disabled placeholder="KMB">
                                <input type="text" class="form-control ml-2 col-2" name="ruangan" id="ruangan"
                                    autocomplete="off" disabled placeholder="Ruangan"> -->
                            </div>
                        </div>
                        <div class="col-md-12 d-flex mt-2">
                            <label class="col-form-label col-2">Indikator</label>
                            <div class="input-group col-12">
                                <select id="indikator" name="indikator" data-allow-clear="1" class="col-10 form-control"
                                    style="width:100% !important; border-color: 1px #485e9029 !important;">
                                    <option value="">-- Pilih --</option>
                                </select>
                                <!-- <input type="text" class="form-control ml-2 col-2" name="kodeInd" id="kodeInd"
                                    autocomplete="off" disabled placeholder="IMA103"> -->

                            </div>
                        </div>
                        <div class="col-md-12 d-flex mt-2">
                            <label class="col-form-label col-2">Denumerator</label>
                            <div class="input-group col-10">

                                <input type="textarea" class="form-control" name="denumerator" id="denumerator" autocomplete="off"
                                    disabled>
                            </div>
                        </div>
                        <div class="col-md-12 d-flex mt-2">
                            <label class="col-form-label col-2">Numerator</label>
                            <div class="input-group col-10">

                                <input type="textarea" class="form-control" name="numerator" id="numerator" autocomplete="off"
                                    disabled>
                            </div>
                        </div>
                        <div class="col-md-12 d-flex mt-2">
                            <label class="col-form-label col-2">Nilai Standar</label>
                            <div class="input-group col-10">
                                <input type="text" class="form-control  col-4" name="nilai" id="nilai"
                                    autocomplete="off" disabled>
                                <!-- <select id="standar" name="standar" data-allow-clear="1" class="col-3 ml-2 form-control"
                                    style="width:100% !important; border-color: 1px #485e9029 !important;" disabled>
                                    <option value="persen" disabled>Persen</option>
                                </select> -->
                                <input type="text" class="form-control  col-4" name="ukuran" id="ukuran"
                                    autocomplete="off" disabled>
                            </div>
                        </div>
                        <div class="col-md-12 d-flex mt-2">
                            <label class="col-form-label col-2">Bulan / Tahun</label>
                            <div class="input-group col-10">
                                <select id="bulan" name="bulan" data-allow-clear="1" class="col-3  form-control"
                                    style="width:100% !important; border-color: 1px #485e9029 !important;" >
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                </select>
                                <select id="tahun" name="tahun" data-allow-clear="1" class="col-3 ml-2 form-control"
                                    style="width:100% !important; border-color: 1px #485e9029 !important;" >
                                    <option value="2021" >2021</option>
                                    <option value="2022" >2022</option>
                                    <option value="2023" >2023</option>
                                    <option value="2024" >2024</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 d-flex mt-2 align-right">
                            <button class="ml-3 btn btn-primary pull-right" id="proses">Proses</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mt-2 col-12 p-2">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h6 class="card-title mb-0">Data Harian</h6>
                    <div id="loader" style="display: none;">
                        <div class="spinner-border text-primary spinner-border-sm" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>

                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped" id="editable">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Numerator</th>
                                <th>Nilai</th>
                                <th>Denumorator</th>
                                <th>Nilai</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="tbody">
                            <tr id="firstTr">
                                <td class="text-center" colspan="6">Data Tidak Tersedia</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- <div class="card-body">
                    <div class="table-responsive">
                        <div id="jsGrid"></div>
                    </div>
                </div> -->
            </div>

            <!-- <button class="btn btn-secondary" onclick="rekapitulasi()">Lihat Rekapitulasi</button> -->
        </div>
    </div>
    <div class="modal fade" id="indikatorModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <input type="hidden" id="id" name="id" value="">
                    <input type="hidden" id="type" name="type" value="">
                    <form id="formIndikatorMutu" method="POST">
                        <input type="hidden" id="idPenilaian" value="">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Data Penilaian Mutu</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group row col-spacing-row">
                                <label for="" class="col-12 col-md-3 col-form-label">Tanggal</label>
                                <div class="col-12 col-md-9">
                                    <div class="input-group">
                                        <input type="text" id="tanggal" name="tanggal" class="form-control pull-right"
                                            autocomplete="off" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row col-spacing-row">
                                <label for="" class="col-12 col-md-3 col-form-label">Numerator</label>
                                <div class="col-12 col-md-9">
                                    <div class="input-group">
                                        <input type="text" id="numeratorModal" name="numeratorModal" class="form-control pull-right"
                                            autocomplete="off" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row col-spacing-row">
                                <label for="" class="col-12 col-md-3 col-form-label">Nilai Numerator</label>
                                <div class="col-12 col-md-9">
                                    <div class="input-group">
                                        <input type="number" id="nilaiNumeratorModal" name="nilaiNumeratorModal" class="form-control pull-right"
                                            autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row col-spacing-row">
                                <label for="" class="col-12 col-md-3 col-form-label">Denumerator</label>
                                <div class="col-12 col-md-9">
                                    <div class="input-group">
                                        <input type="text" id="denumeratorModal" name="denumeratorModal" class="form-control pull-right"
                                            autocomplete="off" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row col-spacing-row">
                                <label for="" class="col-12 col-md-3 col-form-label">Nilai Denumerator</label>
                                <div class="col-12 col-md-9">
                                    <div class="input-group">
                                        <input type="number" id="nilaiDenumeratorModal" name="nilaiDenumeratorModal" class="form-control pull-right"
                                            autocomplete="off">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" onclick="update()">Simpan</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>