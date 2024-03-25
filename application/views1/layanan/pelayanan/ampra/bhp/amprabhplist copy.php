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
                        <?php if ($bhp == 0) { ?>
                            <h4 class="box-title">Form Ampra Obat</h4>
                        <?php } else { ?>
                            <h4 class="box-title">Form Ampra BHP Medis</h4>
                        <?php } ?>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="padding-top: 4px;">Unit</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="unit" id="unit" onchange="gantiunit();">
                                        <?php
                                        foreach ($unit as $row) {
                                        ?>
                                            <option value="<?php echo $row->kode_unit; ?>"><?php echo $row->nama_unit; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-5">
                            <div class="form-group">
                                <label class="col-sm-4 control-label" style="padding-top: 4px;">Periode</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="period" id="period" autocomplete="off" />
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-1 my-auto">
                            <button class="btn btn-sm btn-primary" onclick="lanjutproses()">Lanjut</button>
                        </div>
                    </div>
                    <div class="card-body position-relative" id="kotakdetail">
                        <div class="row mb-2">
                            <div class="col-12">
                                <div class="d-flex justify-content-between">
                                    <b class="">Daftar Ampra</b>
                                    <div class="d-flex">
                                        <?php if ($bhp == 0) { ?>
                                            <button onclick="addampra()" class="btn btn-sm btn-primary" id="tambahruang">
                                            <?php } else { ?>
                                                <button onclick="addamprabhp()" class="btn btn-sm btn-primary" id="tambahruang">
                                                <?php } ?>
                                                Tambah Data
                                                </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-3" id="tabletanggal">
                                <table class="table table-bordered scroll">
                                    <thead>
                                        <tr>
                                            <th>Tanggal Order</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-12 col-md-9" id="tableampra">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th colspan="3">Order</th>
                                            <th colspan="5">Dropping</th>
                                        </tr>
                                        <tr>
                                            <th>Tgl. Order</th>
                                            <th>Nama Item Obat/BHP</th>
                                            <th>Qty Ampra</th>
                                            <th>Qty Drop</th>
                                            <th>Tgl. Drop</th>
                                            <th>Batch No.</th>
                                            <th>Expire</th>
                                            <th>Harga</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td colspan="9" class="text-center">
                                                Tidak Ada Data
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 text-right">
                                <div id="pagination_link"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>