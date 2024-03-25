<!-- START: Card Data-->
<main>
    <div class="container-fluid site-width">
        <!-- START: Breadcrumbs-->
        <div class="row ">
            <div class="col-12  align-self-center">
                <div class="sub-header mt-2 py-3 align-self-center d-sm-flex w-100 rounded">
                    </ol>
                </div>
            </div>
        </div>
        <!-- END: Breadcrumbs-->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-block d-md-flex justify-content-between align-items-center">
                        <h4 class="my-auto">Resep Obat</h4>
                        <form action="<?php echo site_url() ?>/depoapotik/cetakresep" method="POST" target="_blank">
                            <div class=" row">
                                <label for="username" class="col-5 col-md-1 col-form-label">Shift</label>
                                <div class="col-7 col-md-2 mb-2 mb-md-0">
                                    <input class="form-control" type="text" id="shift" name="shift" disabled value="<?php echo $shift ?>" />
                                </div>
                                <label for="username" class="col-5 col-md-1 col-form-label">Depo</label>
                                <div class="col-7 col-md-3 mb-2 mb-md-0">
                                    <input type="text" id="depo" name="depo" disabled hidden value="<?php echo $depo ?>" />
                                    <input class="form-control" type="text" id="depotext" name="depotext" value="<?php echo $depotext ?>" disabled />
                                </div>
                                <label for="username" class="col-5 col-md-2 col-form-label">No. Resep</label>
                                <div class="col-7 col-md-2 mb-2 mb-md-0">
                                    <input class="form-control" type="text" id="norep" name="norep" readonly />
                                </div>
                                <div class="col-12 col-md-1 mb-2 mb-md-0">
                                    <button class="btn btn-sm btn-primary" type="submit"><i class="fas fa-print"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row col-spacing-row">
                                    <label class="col-md-4 col-form-label">Tipe</label>
                                    <div class="col-md-8">
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" name="tipe" value="Umum" id="tipe1" onclick="statuspasien(this)" checked>
                                            <label class="custom-control-label" for="tipe1">Umum</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" name="tipe" value="Jaminan" id="tipe2" onclick="statuspasien(this)" checked>
                                            <label class="custom-control-label" for="tipe2">Jaminan</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row col-spacing-row">
                                    <label class="col-md-4 col-form-label">No. RM</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="norm" name="norm" oninput="carirm()" maxlength="6" autocomplete="off" />
                                    </div>
                                </div>
                                <div class="form-group row col-spacing-row">
                                    <label class="col-md-4 col-form-label">Nama</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="nama" name="nama" autocomplete="off" />
                                    </div>
                                </div>
                                <div class="form-group row col-spacing-row">
                                    <label class="col-md-4 col-form-label">No. Kartu</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="kartu" name="kartu" autocomplete="off" />
                                    </div>
                                </div>
                                <div class="form-group row col-spacing-row">
                                    <label class="col-md-4 col-form-label">Golongan</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="namagolongan" name="namagolongan" autocomplete="off" disabled/>
                                        <input type="text" class="form-control" id="gol" name="gol" autocomplete="off" />
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group row col-spacing-row">
                                    <label class="col-md-4 col-form-label">Tanggal Resep</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="tglresep" name="tglresep" autocomplete="off" />
                                    </div>
                                </div>
                                <div class="form-group row col-spacing-row">
                                    <label class="col-md-4 col-form-label">Unit/Poli</label>
                                    <div class="col-md-8">
                                        <select class="form-control" style="width: 100%;" name="unit" id="unit">
                                            <?php
                                            foreach ($unit as $row) {
                                            ?>
                                                <option value="<?php echo $row->kode_unit; ?>"><?php echo $row->nama_unit; ?></option>
                                            <?php
                                            } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row col-spacing-row">
                                    <label class="col-md-4 col-form-label">No. Transaksi</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="sjp" name="sjp" autocomplete="off" />
                                    </div>
                                </div>
                                <div class="form-group row col-spacing-row">
                                    <label class="col-md-4 col-form-label">Dokter</label>
                                    <div class="col-md-8">
                                        <select class="form-control" style="width: 100%;" name="dokter" id="dokter">
                                            <option value="--">--</option>

                                            <?php
                                            foreach ($dokter as $row) {
                                            ?>
                                                <option value="<?php echo $row->kode_dokter; ?>"><?php echo $row->nama_dokter; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <!-- <div class="form-group row col-spacing-row">
                                    <label class="col-md-4 col-form-label">Racik</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="racik" name="racik" autocomplete="off" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label">Non Racik</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="nonracik" name="nonracik" autocomplete="off" />
                                    </div>
                                </div> -->

                            </div>
                        </div>
                        <div class="row">
                            <div class="col text-right">
                                <button class="btn-sm btn-warning btn pull-right" onclick="javascript:history.back();"><i class="fa fa-arrow-left"></i> Kembali Ke Daftar</button>
                                <button class="btn-sm btn-primary btn pull-right" onclick="prosesheader()"><i class="fas fa-cog"></i> Proses</button>
                            </div>
                        </div>
                        <hr class="border-top-hr my-4 bg-secondary" />
                        <div id="kotakdetail" class="position-relative">
                            <div class="row mb-4">
                                <div class="col">
                                    <div class="d-flex justify-content-between">
                                        <b>Daftar Resep</b>
                                        <button onclick="addresep()" class="btn btn-sm btn-primary" id="tambahruang">
                                            <i class='fas fa-plus'></i> Tambah Data
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive" id="tabledetailresep">
                                <table class="table table-bordered">
                                    <tr>
                                        <th width="3%">No.</th>
                                        <th>Nama Produk</th>
                                        <th width="5%">
                                            <div align="right">Qty</div>
                                        </th>
                                        <th width="6%"> Satuan</th>
                                        <th width="7%">
                                            <div align="right">Harga</div>
                                        </th>
                                        <th width="7%">
                                            <div align="right">Jumlah</div>
                                        </th>
                                        <th width="20%">Dosis</th>
                                        <th width="7%">
                                            <div align="center">Pendanaan</div>
                                        </th>
                                        <th width="5%">
                                            <div align="center">Klaim</div>
                                        </th>
                                        <th width="14%">
                                            <div align="center"> Action</div>
                                        </th>
                                        <th width="5%">
                                            <div align="center">Proses</div>
                                        </th>
                                    </tr>
                                    <tr>
                                        <td colspan="10" class="text-center">
                                            Tidak Ada Data
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-12 ">
                                    <button onclick="cetaketiketsemua()" class="btn btn-sm btn-success" id="cetaketiketnya">
                                        <i class='fas fa-print'></i> Print Semua Etiket
                                    </button>
                                </div>
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