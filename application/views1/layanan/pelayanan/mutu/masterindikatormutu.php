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
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title mb-0">Master Data Indikator Mutu</h4>
                        <div id="loader" style="display: none;">
                            <div class="spinner-border text-primary spinner-border-sm" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div>
                        <button onclick="tambah()" class="btn btn-primary d-flex ">Tambah Data</button>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 d-flex">
                                <label class="col-form-label mr-3 col-3">Cari Indikator Mutu</label>
                                <input type="text" class="form-control" name="cariIndikator" id="cariIndikator"
                                    placeholder="Masukkan Indikator" autocomplete="off">
                            </div>

                            <div class="col-md-2">
                                <button id="caridata" class="btn btn-primary d-flex ">Cari</button>
                            </div>

                        </div>
                    </div>
                    <div>
                        <div class="card-body">
                            <div id="tabledata">
                            </div>
                            <div id="pagination_link" class="d-flex flex-row-reverse">
        
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--modal tambah-->

        <div class="modal fade" id="indikatorModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <input type="hidden" id="id" name="id" value="">
                    <input type="hidden" id="type" name="type" value="">
                    <form id="formIndikatorMutu" method="POST" action="<?php echo site_url();?>/mutu/store">
                        <input type="hidden" value="" name="id" id="idindikator">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Data Indikator Mutu</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group row col-spacing-row">
                                <label for="" class="col-12 col-md-3 col-form-label">Kode</label>
                                <div class="col-12 col-md-9">
                                    <div class="input-group">
                                        <input type="text" id="kode" name="kode" class="form-control pull-right"
                                            autocomplete="off">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row col-spacing-row">
                                <label for="" class="col-12 col-md-3 col-form-label">Jenis</label>
                                <div class="col-12 col-md-9">
                                    <div class="input-group  ">
                                        <select id="jenis" name="jenis" data-allow-clear="1" class="col-12 form-control"
                                            style="width:100% !important; border-color: 1px #485e9029 !important;">
                                            <?php foreach ($jenis_indikator as $item) { ?>
                                                <option value="<?= $item->nama ?>"><?= ucwords($item->nama) ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row col-spacing-row">
                                <label for="" class="col-12 col-md-3 col-form-label">Pelaksana</label>
                                <div class="col-12 col-md-9">
                                    <div class="input-group ">
                                        <select id="id_pelaksana" multiple data-allow-clear="1"
                                            class="col-12 form-control"
                                            style="width:100% !important; border-color: 1px #485e9029 !important;"
                                            name="pelaksana[] multiple"
                                            >
                                            <!-- <optgroup label="Group A">
                                                <option>A1</option>
                                                <option>A2</option>
                                                <option>A3</option>
                                            </optgroup>
                                            <optgroup label="Group B">
                                                <option>B1</option>
                                                <option>B2</option>
                                                <option>B3</option>
                                            </optgroup> -->
                                            <?php foreach ($unit as $index => $item) { ?>
                                                <optgroup label="<?= $index ?>">
                                                    <?php foreach ($item as $unit) { ?>
                                                        <option value="<?= $unit->idunit ?>"><?= $unit->nama_unit ?> </option>
                                                    <?php } ?>
                                                </optgroup>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row col-spacing-row">
                                <label for="" class="col-12 col-md-3 col-form-label">Nilai Standar</label>
                                <div class="col-3 col-md-3">
                                    <div class="input-group">
                                        <input type="number" min="0" id="nilai" name="nilai"
                                            class="form-control pull-right" autocomplete="off">
                                    </div>
                                </div>
                                <label for="" class="col-form-label">Ukuran</label>
                                <div class="col-3 col-md-3">
                                    <div class="input-group">
                                        <select id="ukuran" name="ukuran" data-allow-clear="1"
                                            class="col-12 form-control"
                                            style="width:100% !important; border-color: 1px #485e9029 !important;">
                                                <option>persen</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row col-spacing-row">
                                <label for="" class="col-12 col-md-3 col-form-label">Indikator</label>
                                <div class="col-12 col-md-9">
                                    <div class="input-group  ">
                                        <textarea id="indikator" name="indikator"
                                            class="form-control pull-right"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row col-spacing-row">
                                <label for="" class="col-12 col-md-3 col-form-label">Indikator Penilaian Mutu</label>
                                <div class="col-12 col-md-9">
                                    <div class="input-group  ">
                                        <textarea id="indikator_penilaian_mutu" name="indikator_penilaian_mutu"
                                            class="form-control pull-right"></textarea>
                                    </div>
                                </div>
                            </div>

                            <!-- <div class="form-group row col-spacing-row">
                                <label for="" class="col-12 col-md-3 col-form-label"></label>
                                <div class="col-12 col-md-9">
                                    <div class="custom-control custom-checkbox custom-control-inline">
                                        <input type="checkbox"  class="custom-control-input" id="rawat_inap" name="rawat_inap">
                                        <label class="custom-control-label checkbox-primary" for="rawat_inap">Rawat Inap</label>                                       
                                    </div>
                                    <div class="custom-control custom-checkbox custom-control-inline">
                                        <input type="checkbox"  class="custom-control-input" id="rawat_jalan" name="rawat_jalan">
                                        <label class="custom-control-label checkbox-primary" for="rawat_jalan">Rawat Jalan</label>                                       
                                    </div>
                                    <div class="custom-control custom-checkbox custom-control-inline">
                                        <input type="checkbox"  class="custom-control-input" id="instalasi" name="instalasi" >
                                        <label class="custom-control-label checkbox-primary" for="instalasi">Instalasi</label>                                       
                                    </div>
                                    <div class="custom-control custom-checkbox custom-control-inline">
                                        <input type="checkbox"  class="custom-control-input" id="bagian_lainnya" name="bagian_lainnya">
                                        <label class="custom-control-label checkbox-primary" for="bagian_lainnya">Bagian Lainnya</label>                                       
                                    </div>
                                </div>
                            </div> -->

                            <div class="form-group row col-spacing-row">
                                <label for="" class="col-12 col-md-3 col-form-label">Numerator</label>
                                <div class="col-12 col-md-9">
                                    <div class="input-group  ">
                                        <textarea id="numerator" name="numerator"
                                            class="form-control pull-right"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row col-spacing-row">
                                <label for="" class="col-12 col-md-3 col-form-label">Denominator</label>
                                <div class="col-12 col-md-9">
                                    <div class="input-group">
                                        <textarea id="denominator" name="denominator"
                                            class="form-control pull-right"></textarea>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>