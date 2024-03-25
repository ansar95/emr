<div class="content-wrapper">
    <section class="content">
        <div class="box" id="kotakdetail">
            <div class="box-header with-border">
                <h3 class="box-title">Form Pembayaran / Kwitansi</h3>
                <div class="box-tools pull-right" style="padding-top: 4px;">
                    <a onclick="panggilform()" class="btn-sm btn-primary" id="tambahruang">
                        <i class='glyphicon glyphicon-plus'></i> Tambah Data
                    </a>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-sm-12" id="tableanggran">
                        <div class="form form-horizontal">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">No. Kwitansi</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="kwitansi" id="kwitansi">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Tanggal</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="tgl" id="tgl">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Perusahaan</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" style="width: 100%;" name="pbf" id="pbf" >
                                            <?php
                                            foreach($pbf as $row) {
                                                ?>
                                                <option value="<?php echo $row->kode; ?>"><?php echo $row->nama; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Penerima</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="pb" id="pb">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">ID</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="pb" id="pb">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Kode Rekening</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" style="width: 100%;" name="koderek" id="koderek" >
                                            <?php
                                            foreach($koderek as $row) {
                                                ?>
                                                <option value="<?php echo $row->id; ?>"><?php echo $row->koderekening; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Kode Rekening Akuntansi</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" style="width: 100%;" name="rekakun" id="rekakun" >
                                            <?php
                                            foreach($rekakuntansi as $row) {
                                                ?>
                                                <option value="<?php echo $row->kode; ?>"><?php echo $row->rekening; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Kode Rekening LRA</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" style="width: 100%;" name="lra" id="lra" >
                                            <?php
                                            foreach($reklra as $row) {
                                                ?>
                                                <option value="<?php echo $row->kodeanggaran; ?>"><?php echo $row->namaanggaran; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Faktur</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" style="width: 100%;" name="faktur" id="faktur" >
                                            <option value="Farmasi">Farmasi</option>
                                            <option value="Apotik">Apotik</option>
                                            <option value="Rumah Tangga">Rumah Tangga</option>
                                            <option value="Gizi">Gizi</option>
                                            <option value="Umum">Umum</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Keterangan</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="pb" id="pb">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label"></label>
                                    <div class="col-sm-8 ">
                                        <button class="btn-sm btn-danger" type="button" >Proses</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="box" id="kotakdetail">
            <div class="box-header with-border">
                <h3 class="box-title">Realisasi Anggaran</h3>
                <div class="box-tools pull-right" style="padding-top: 4px;">
                    <a onclick="panggilform()" class="btn-sm btn-primary" id="tambahruang">
                        <i class='glyphicon glyphicon-plus'></i> Tambah Data
                    </a>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-sm-12" id="tableanggran">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>No. Faktur / Bukti</th>
                                <th>Tanggal</th>
                                <th>Nilai Kwitansi</th>
                                <th>Nilai PPN</th>
                                <th>%PPN</th>
                                <th>Nilai PPH</th>
                                <th>Nilai Dibayarkan</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td colspan="7" class="text-center">Data Kosong</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="box-footer clearfix">
                <div align="right" id="pagination_link"></div>
            </div>
        </div>
    </section>
</div>
